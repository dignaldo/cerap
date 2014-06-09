<?php
/************************************************************************/
/*                                WEBSHARE                              */
/************************************************************************/
//
// Copyright (c) 2009 by Virginie Vivancos
// http://www.webshare.fr
//
// This program is free software. You can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation; either version 2 of the License.
//
// =======================================================================
// Fonction : Enregistre les modifications sur un fichier édité
// Nom      : modifier.php
// Version  : 0.8.2
// Date     : 30/06/08
// =======================================================================
header ("Content-type: text/html; charset=utf-8");
session_start();
include_once "auth.php";
include_once "fonctions.php";
$l_mysql = new class_mysql();
$l_mysql->connect();

$nomSrv = $_SESSION["ws"]["serveurActif"];
$chemin = $_SESSION["ws"]["$nomSrv"]["rootServeur"]."/".$_SESSION["ws"]["$nomSrv"]["repServeur"]."/";
$typeSrv= $_SESSION["ws"]["$nomSrv"]["typeServeur"];


// L'utilisateur ne peut pas effectuer d'opération au dessus de sa racine virtuelle
verifie($_REQUEST["nomElement"]);

// L'utilisateur doit être autorisé à effectuer l'opération
if ($_SESSION["ws"]["auth3"]=="on") {
  if (empty($_REQUEST["editContent"])) $_REQUEST["editContent"]=$_REQUEST["editImproved"];

// Test du contenu des variables
if (!empty($_REQUEST["nomElement"])&&!empty($_REQUEST["editContent"])) {
  if (preg_match($_SESSION["ws"]["varsUser"], $_REQUEST["nomElement"])==1) { echo $_SESSION["ws"]["dia"]["noPermission"];
    $tabLog= array("19","-1",$_SESSION["ws"]["dia"]["noPermission"],$_SESSION["ws"]["nomUser"],$_SESSION["ws"]["dossierActif"],$_REQUEST["nomElement"],"");
    $l_mysql->logAction($tabLog);
    exit; }

// Construction des chemins
  $chemin=utf8_encode($chemin);
  $nomElement=$_REQUEST["nomElement"];
  $cheminElement=stripslashes(blindeChemin($chemin."/".$nomElement));
  $_REQUEST["editContent"]= str_replace("wstextarea","textarea",$_REQUEST["editContent"]);

// Création du dossier
  if ($typeSrv=="1") {
  // En local
    if (($handle=@fopen($cheminElement, "w+"))===false) {
      $message= $_SESSION["ws"]["dia"]["endEdit"]." ".$nomElement.". ".$_SESSION["ws"]["dia"]["savingDocument"]." ".$_SESSION["ws"]["dia"]["hasFailed"].". ";
    } else {
      $message= $_SESSION["ws"]["dia"]["endEdit"]." ".$nomElement.". ".$_SESSION["ws"]["dia"]["savingDocument"]." ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["successful"].". ";
      fwrite ($handle,stripslashes($_REQUEST["editContent"]));
      fclose ($handle);
    }
  } else {
    // En FTP
    $_SESSION["ws"]["$nomSrv"]["connexion"]=connexionFTP($nomSrv);
    $nomElement=basename($nomElement);
    $cheminTxt=stripslashes(blindeChemin($chemin."/".$nomElement.".txt"));
    $cheminTmp=stripslashes(blindeChemin($_SESSION["ws"]["tempDir"]."/".$nomElement.".txt"));

    // Créer le fichier texte en local puis copie sur le FTP et suppression en local
    if (($newtxt = fopen(utf8_decode($cheminTmp), "x+")) === FALSE) {
         $message= $_SESSION["ws"]["dia"]["txtCreate"]." '".$nomElement."' ".$_SESSION["ws"]["dia"]["hasFailed"].". ".$erreur;
    } else {
         fclose($newtxt);
         @ftp_put($_SESSION["ws"]["$nomSrv"]["connexion"],utf8_decode($cheminTxt),utf8_decode($cheminTmp), FTP_BINARY);
         $message= $_SESSION["ws"]["dia"]["theNewTxt"]." '".$nomElement."' ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["created"]." ".$_SESSION["ws"]["dia"]["withSuccess"];
         @unlink(utf8_decode($cheminTmp));
    }
  }

} else { $message= $_SESSION["ws"]["dia"]["prohibited"]; }

} else { $message= $_SESSION["ws"]["dia"]["prohibited"]; }

 echo $message;
 $tabLog= array("19","1",$message,$_SESSION["ws"]["nomUser"],$nomElement,basename($_REQUEST["nomElement"]),$nomElement);
 $l_mysql->logAction($tabLog);
 $l_mysql->disconnect();
 ?>
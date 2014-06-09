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
// Fonction : Créer un nouveau document texte vide
// Nom      : crea_txt.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
header ("Content-type: text/html; charset=utf-8");
session_start();
include_once "auth.php";
include_once "fonctions.php";
$l_mysql = new class_mysql();
$l_mysql->connect();

$nomSrv = $_SESSION["ws"]["serveurActif"];
$chemin = $_SESSION["ws"]["$nomSrv"]["rootServeur"]."/".$_SESSION["ws"]["$nomSrv"]["repServeur"]."/".$_SESSION["ws"]["dossierActif"]."/";
$typeSrv= $_SESSION["ws"]["$nomSrv"]["typeServeur"];

// L'utilisateur ne peut pas effectuer d'opération au dessus de sa racine virtuelle
verifie($_REQUEST["nomElement"]);

// L'utilisateur doit être autorisé à effectuer l'opération
if ($_SESSION["ws"]["auth2"]=="on") {

// Test du contenu des variables
if (!empty($_REQUEST["nomElement"])) {
  if (preg_match($_SESSION["ws"]["varsUser"], $_REQUEST["nomElement"])==1) { echo $_SESSION["ws"]["dia"]["noPermission"];
    $tabLog= array("9","-1",$_SESSION["ws"]["dia"]["noPermission"],$_SESSION["ws"]["nomUser"],$_SESSION["ws"]["dossierActif"],$_REQUEST["nomElement"],"");
    $l_mysql->logAction($tabLog);
    exit; }

// Construction des chemins
  $chemin=utf8_encode($chemin);
  $nomElement = convCar(urldecode(trim($_REQUEST["nomElement"])));
  $typeElement= (!empty($_REQUEST["typeElement"])?convCar(urldecode(trim($_REQUEST["typeElement"]))):"txt");

// Création du fichier
  if ($typeSrv=="1") {
  // En local
    $cheminTxt=stripslashes(blindeChemin($chemin."/".$nomElement.".".$typeElement));
    if (($newtxt = fopen(utf8_decode($cheminTxt), "x+")) === FALSE) {
         $message= $_SESSION["ws"]["dia"]["txtCreate"]." '".$nomElement."' ".$_SESSION["ws"]["dia"]["hasFailed"].". ".$erreur;
         }
    else $message= $_SESSION["ws"]["dia"]["theNewTxt"]." '".$nomElement."' ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["created"]." ".$_SESSION["ws"]["dia"]["withSuccess"];
    fclose($newtxt);    
  } else {
    // En FTP
    $_SESSION["ws"]["$nomSrv"]["connexion"]=connexionFTP($nomSrv);
    $cheminTxt=stripslashes(blindeChemin($chemin."/".$nomElement.".".$typeElement));
    $cheminTmp=stripslashes(blindeChemin($_SESSION["ws"]["tempDir"]."/".$nomElement.".".$typeElement));
    
    // Créer fichier vide en local puis copier sur le FTP puis suppression en local
    if (($newtxt = fopen(utf8_decode($cheminTmp), "x+")) === FALSE) {
         $message= $_SESSION["ws"]["dia"]["txtCreate"]." '".$nomElement."' ".$_SESSION["ws"]["dia"]["hasFailed"].". ".$erreur;
    } else {
         fclose($newtxt);
         @ftp_put($_SESSION["ws"]["$nomSrv"]["connexion"],utf8_decode($cheminTxt),utf8_decode($cheminTmp), FTP_BINARY);
         $message= $_SESSION["ws"]["dia"]["theNewTxt"]." '".$nomElement."' ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["created"]." ".$_SESSION["ws"]["dia"]["withSuccess"];
         @unlink(utf8_decode($cheminTmp));
    }
  }

}

} else { $message= $_SESSION["ws"]["dia"]["prohibited"]; }

echo $message;
$tabLog= array("9","1",$message,$_SESSION["ws"]["nomUser"],$_SESSION["ws"]["dossierActif"],$nomElement,"");
$l_mysql->logAction($tabLog);
$l_mysql->disconnect();
?>
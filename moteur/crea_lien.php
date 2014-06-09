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
// Fonction : Ajoute un nouveau lien dans le répertoire courant
// Nom      : crea_lien.php
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
    $tabLog= array("8","-1",$_SESSION["ws"]["dia"]["noPermission"],$_SESSION["ws"]["nomUser"],$_SESSION["ws"]["dossierActif"],$_REQUEST["nomElement"],"");
    $l_mysql->logAction($tabLog);
    exit; }

// Construction des chemins
  $nomLien=convCar(urldecode(trim($_REQUEST["nomElement"])));
  $adrLien=trim($_REQUEST["adrElement"]);
  if (substr($adrLien,0,7)!="http://") $adrLien="http://".$adrLien;

  $chemin=utf8_encode($chemin);
  $cheminLien=stripslashes(blindeChemin($chemin.$nomLien.".url"));

// Création du lien
  if ($typeSrv=="1") {
  // En local
    if (($dest = fopen(utf8_decode($cheminLien), "w+")) !== FALSE) {
     fwrite ($dest, "[DEFAULT]\nBASEURL=".$adrLien."\n[InternetShortcut]\nURL=".$adrLien);
     fclose ($dest);
           $message= $_SESSION["ws"]["dia"]["theNewLink"]." '".$nomLien."' ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["created"]." ".$_SESSION["ws"]["dia"]["withSuccess"];
    } else $message= $_SESSION["ws"]["dia"]["linkCreate"]." '".$nomLien."' ".$_SESSION["ws"]["dia"]["hasFailed"].". $erreur";
  } else {
    // En FTP
    $_SESSION["ws"]["$nomSrv"]["connexion"]=connexionFTP($nomSrv);
    $cheminTmp=stripslashes(blindeChemin($_SESSION["ws"]["tempDir"]."/".$nomLien.".url"));
    
    if (($dest = fopen(utf8_decode($cheminTmp), "w+")) !== FALSE) {
     fwrite ($dest, "[DEFAULT]\nBASEURL=".$adrLien."\n[InternetShortcut]\nURL=".$adrLien);
     fclose ($dest);
     @ftp_put($_SESSION["ws"]["$nomSrv"]["connexion"],utf8_decode($cheminLien),utf8_decode($cheminTmp), FTP_BINARY);
     @unlink(utf8_decode($cheminTmp));
           $message= $_SESSION["ws"]["dia"]["theNewLink"]." '".$nomLien."' ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["created"]." ".$_SESSION["ws"]["dia"]["withSuccess"];
    } else $message= $_SESSION["ws"]["dia"]["linkCreate"]." '".$nomLien."' ".$_SESSION["ws"]["dia"]["hasFailed"].". $erreur";

  }
}

} else { $message= $_SESSION["ws"]["dia"]["prohibited"]; }

echo $message;
$tabLog= array("8","1",$message,$_SESSION["ws"]["nomUser"],$_SESSION["ws"]["dossierActif"],$adrLien,"");
$l_mysql->logAction($tabLog);
$l_mysql->disconnect();
?>
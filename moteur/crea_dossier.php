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
// Fonction : Créer un nouveau dossier
// Nom      : crea_dossier.php
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
    $tabLog= array("7","-1",$_SESSION["ws"]["dia"]["noPermission"],$_SESSION["ws"]["nomUser"],$_SESSION["ws"]["dossierActif"],$_REQUEST["nomElement"],"");
    $l_mysql->logAction($tabLog);
    exit; }

// Construction des chemins
  $chemin=utf8_encode($chemin);
  $nomdossier=convCar(urldecode(trim($_REQUEST["nomElement"])));
  $chemindossier=stripslashes(blindeChemin($chemin.$nomdossier));

// Création du dossier
  if ($typeSrv=="1") {
  // En local
    if (@mkdir(utf8_decode($chemindossier))===false)
           $message= $_SESSION["ws"]["dia"]["dirCreate"]." '".$nomdossier."' ".$_SESSION["ws"]["dia"]["hasFailed"].". ".$erreur;
    else { $message= $_SESSION["ws"]["dia"]["theNewDir"]." '".$nomdossier."' ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["created"]." ".$_SESSION["ws"]["dia"]["withSuccess"];
             chmod (utf8_decode($chemindossier),0777);
           }
  } else {
    // En FTP
    $_SESSION["ws"]["$nomSrv"]["connexion"]=connexionFTP($nomSrv);
    if (@ftp_mkdir($_SESSION["ws"]["$nomSrv"]["connexion"],utf8_decode($chemindossier))===false)
           $message= $_SESSION["ws"]["dia"]["dirCreate"]." '".$nomdossier."' ".$_SESSION["ws"]["dia"]["hasFailed"].". ".$erreur;
    else { $message= $_SESSION["ws"]["dia"]["theNewDir"]." '".$nomdossier."' ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["created"]." ".$_SESSION["ws"]["dia"]["withSuccess"];
             ftp_chmod ($_SESSION["ws"]["$nomSrv"]["connexion"], 0777, utf8_decode($chemindossier));
           }

  }
}

} else { $message= $_SESSION["ws"]["dia"]["prohibited"]; }

echo $message;
$tabLog= array("7","1",$message,$_SESSION["ws"]["nomUser"],$_SESSION["ws"]["dossierActif"],$nomdossier,"");
$l_mysql->logAction($tabLog);
$l_mysql->disconnect();
?>
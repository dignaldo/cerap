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
// Fonction : Renomme un dossier ou un fichier
// Nom      : renommer.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
header ("Content-type: text/html; charset=utf-8");
session_start();
include_once "auth.php";
include_once "fonctions.php";
$l_mysql = new class_mysql();
$l_mysql->connect();

// Récupération des informations serveurs
if (!empty($_REQUEST["nomSrv"])) $nomSrv= $_REQUEST["nomSrv"];
                            else $nomSrv= $_SESSION["ws"]["serveurActif"];
                                 $nomPro= $_REQUEST["nomPro"];
                $typeSrv= $_SESSION["ws"]["$nomSrv"]["typeServeur"];
$chemin = blindeChemin($_SESSION["ws"]["$nomSrv"]["rootServeur"]."/".$_SESSION["ws"]["$nomSrv"]["repServeur"]."/");

// L'utilisateur ne peut pas effectuer d'opération au dessus de sa racine virtuelle
verifie($_REQUEST["nomElement"]);

// L'utilisateur doit être autorisé à effectuer l'opération
if ($_SESSION["ws"]["auth2"]=="on") {

// Construction des chemins
  $nomLien      =stripslashes(urldecode(trim($_REQUEST["nomLien"])));
  $cheminElement=stripslashes(blindeChemin(utf8_encode($chemin).$nomLien));
  $nomElement   =stripslashes(urldecode(trim($_REQUEST["nomElement"])));
  $cheminDestin =dirname($cheminElement);

// Test du contenu des variables
if (!empty($_REQUEST["nomElement"])) {
  if (preg_match($_SESSION["ws"]["varsUser"], $nomLien)==1) { echo $_SESSION["ws"]["dia"]["noPermission"];
    $tabLog= array("16","-1",$_SESSION["ws"]["dia"]["noPermission"],$_SESSION["ws"]["nomUser"],$cheminElement,$nomElement,"");
    $l_mysql->logAction($tabLog);
    exit; }


  // Dezippage de l'archive
  if ($typeSrv=="1") {
    // En Local
    if (@dezipper($cheminElement,$cheminDestin)===false)
           $message= $_SESSION["ws"]["dia"]["theFile"]." '".$nomElement."' ".$_SESSION["ws"]["dia"]["hasNotBeen"]." ".$_SESSION["ws"]["dia"]["dezipped"]." ".$erreur;
      else $message= $_SESSION["ws"]["dia"]["theFile"]." '".$nomElement."' ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["dezipped"]." ".$_SESSION["ws"]["dia"]["withSuccess"];
  } else {
    // En FTP
    $message= $_SESSION["ws"]["dia"]["notActiv"];
  }
}

}
echo $message;
$tabLog= array("16","1",$message,$_SESSION["ws"]["nomUser"],$cheminElement,$nomElement,"");
$l_mysql->logAction($tabLog);
$l_mysql->disconnect();
?>
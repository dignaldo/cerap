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
// Fonction : Modifie les droits sur un dossier ou un fichier
// Nom      : autoriser.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
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
$message= $_SESSION["ws"]["dia"]["prohibited"];

// L'utilisateur ne peut pas effectuer d'opération au dessus de sa racine virtuelle
verifie($_REQUEST["nomElement"]);

// L'utilisateur doit être autorisé à effectuer l'opération
if ($_SESSION["ws"]["auth6"]=="on") {

// Construction des chemins
  $nomLien      =stripslashes(urldecode(trim($_REQUEST["nomLien"])));
  $cheminDossier=stripslashes(blindeChemin(utf8_encode($chemin)));
  $cheminElement=stripslashes(blindeChemin(utf8_encode($chemin).$nomLien));
  $nomElement   =stripslashes(urldecode(trim($_REQUEST["nomElement"])));

// Test du contenu des variables
  if (preg_match($_SESSION["ws"]["varsUser"], $nomLien)==1) { echo $_SESSION["ws"]["dia"]["noPermission"];
  $tabLog= array("10","-1",$_SESSION["ws"]["dia"]["noPermission"],$_SESSION["ws"]["nomUser"],$cheminElement,$nomElement,"");
  $l_mysql->logAction($tabLog);
  exit; }

// Récupération des droits
  if (!empty($_REQUEST["infoDroit"])) {
    if ($typeSrv=="1") {
    // En Local
      echo @fileperms(utf8_decode($cheminElement)); exit;
    } else {
      // En FTP
      $_SESSION["ws"]["$nomSrv"]["connexion"]=connexionFTP($nomSrv);      
      $droitsC = array("rwx", "rw-", "r-x", "r--", "-wx", "-w-", "--x", "---", "d");
      $droitsN = array("7",   "6",   "5",   "4",   "3",   "2",   "1",   "0",   "0");
      $cheminScan= dirname(utf8_decode($cheminElement));
      $filename= basename(utf8_decode($cheminElement));

      if (($contents = ftp_rawlist($_SESSION["ws"]["$nomSrv"]["connexion"], $cheminScan))!==FALSE) 
        foreach($contents as $file) {
          if (preg_match("/$filename/", $file)==1) { 
            $fileperms = substr($file, 0, 10);
            $droits= intval(str_replace($droitsC, $droitsN, $fileperms));   
            echo octdec($droits); exit;
          }
        }
      exit;
    }
  }

// Modification des droits
  if (!empty($_REQUEST["valeurDroit"])) {
    $message= $_SESSION["ws"]["dia"]["fileAttributes"]." '".basename($nomLien)."' ";
    if ($typeSrv=="1") {
    // En Local
      $valeur= sprintf("%04s", $_REQUEST["valeurDroit"]);
      if (@chmod(utf8_decode($cheminElement),octdec($valeur))===false) $message.=$_SESSION["ws"]["dia"]["cantModify"];
                                                                  else $message.=$_SESSION["ws"]["dia"]["modify"];
    } else {
    // En FTP
      $_SESSION["ws"]["$nomSrv"]["connexion"]=connexionFTP($nomSrv);      
      $valeur= sprintf("%04s", $_REQUEST["valeurDroit"]);
      if (@ftp_chmod ($_SESSION["ws"]["$nomSrv"]["connexion"], octdec($valeur), utf8_decode($cheminElement))===false)
                                                          $message.=$_SESSION["ws"]["dia"]["cantModify"];
                                                     else $message.=$_SESSION["ws"]["dia"]["modify"];
    }
  } else $message= $_SESSION["ws"]["dia"]["noPermission"];

}
echo $message;
$tabLog= array("10","1",$message,$_SESSION["ws"]["nomUser"],$cheminElement,$nomElement,"");
$l_mysql->logAction($tabLog);
$l_mysql->disconnect();
?>
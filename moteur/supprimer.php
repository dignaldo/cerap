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
// Fonction : Supprimer un dossier ou un fichier
// Nom      : supprimer.php
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
$chemin=  blindeChemin($_SESSION["ws"]["$nomSrv"]["rootServeur"]."/".$_SESSION["ws"]["$nomSrv"]["repServeur"]."/");

if ($_REQUEST["nomSrv"]==$_SESSION["ws"]["dia"]["corbeille"]) {
  if ($_REQUEST["supdef"]!=1) exit;
  $typeSrv=1;
  $chemin= $_SESSION["ws"]["repCorbeille"];
  if (empty($_SESSION["ws"]["repCorbeille"])) exit;
}
if ($_REQUEST["emptybin"]==1) {
  $typeSrv=3; 
  if (empty($_SESSION["ws"]["repCorbeille"])) exit;
}

// L'utilisateur ne peut pas effectuer d'opération au dessus de sa racine virtuelle
if ($_REQUEST["emptybin"]!=1) verifie($_REQUEST["nomLien"]);

  // Fonction de suppression récursive
    function removeScandir($dir) {
      if ($handle=opendir(blindeChemin("$dir"))) {
         while ( ($file = readdir($handle)) !== false ) {
             if (preg_match("/^[.]{2}$|^[.]{1}$/", $file)==0) {
               $_SESSION["ws"]["progress"]=$file;
               if (is_dir("$dir/$file")) removeScandir("$dir/$file");
                 else @unlink ("$dir/$file");
             }
         }
         closedir($handle);
         @rmdir("$dir/");
      } else return false;
         return true;
    }

  // Fonction de suppression récursive sur le FTP
    function removeScandirFTP($dir) {
      global $nomSrv;    
      if (($contents = ftp_rawlist($_SESSION["ws"]["$nomSrv"]["connexion"], $dir))!==FALSE) {
         foreach($contents as $file) {    
       
           if (preg_match("/^[.]{2}$|^[.]{1}$/", $file)==0) {

             $info = array();
             $vinfo = preg_split("/[\s]+/", $file, 9);
             if ($vinfo[0] !== "total") {
               $fileperms     = $vinfo[0];
               $filename      = $vinfo[8];
             }
             $_SESSION["ws"]["progress"]=$filename;
             if (strpos($fileperms,"d")!==FALSE) removeScandirFTP("$dir/$filename");
             else @ftp_delete($_SESSION["ws"]["$nomSrv"]["connexion"],"$dir/$filename");

           }
         }
         @ftp_rmdir($_SESSION["ws"]["$nomSrv"]["connexion"],"$dir/");
      } else return false;
      return true;
    }


// L'utilisateur doit être autorisé à effectuer l'opération
if ($_SESSION["ws"]["auth5"]=="on") {

// Le nom doit être rempli obligatoirement
if (!empty($_REQUEST["nomLien"])) {

// Construction des chemins
  $nomLien      =stripslashes(urldecode(trim($_REQUEST["nomLien"])));
  $cheminElement=stripslashes(blindeChemin(utf8_encode($chemin).$nomLien));
  $cheminMini   =stripslashes(blindeChemin(utf8_encode($chemin)."wsminis/".$nomLien));
  $nomElement   =stripslashes(urldecode(trim($_REQUEST["nomElement"])));
  $_SESSION["ws"]["progress"]=$nomElement;

// Test du contenu des variables
  if (preg_match($_SESSION["ws"]["varsUser"], $nomLien)==1) { echo $_SESSION["ws"]["dia"]["noPermission"];
    $tabLog= array("13","-1",$_SESSION["ws"]["dia"]["noPermission"],$_SESSION["ws"]["nomUser"],$cheminElement,$nomElement,"");
    exit; }

// Renommage du ou des éléments
  if ($typeSrv=="1") {
  // En local
    if ($_REQUEST["nomPro"]=="dossier") {
      
      if (removeScandir(utf8_decode($cheminElement))===false)
           $message= $_SESSION["ws"]["dia"]["theRemove"]." ".$_SESSION["ws"]["dia"]["ofDir"]." '".$nomElement."' ".$_SESSION["ws"]["dia"]["hasFailed"].". ".$erreur;
      else $message= $_SESSION["ws"]["dia"]["theDir"]." '".$nomElement."' ".$_SESSION["ws"]["dia"]["hasBeen"]."  ".$_SESSION["ws"]["dia"]["deleted"]." ".$_SESSION["ws"]["dia"]["withSuccess"];

    } else {

      if (@unlink(utf8_decode($cheminElement))===false)
           $message= $_SESSION["ws"]["dia"]["theRemove"]." ".$_SESSION["ws"]["dia"]["ofFile"]." '".$nomElement."' ".$_SESSION["ws"]["dia"]["hasFailed"].". ".$erreur;
      else $message= $_SESSION["ws"]["dia"]["theFile"]." '".$nomElement."' ".$_SESSION["ws"]["dia"]["hasBeen"]."  ".$_SESSION["ws"]["dia"]["deleted"]." ".$_SESSION["ws"]["dia"]["withSuccess"];
      $point= strrpos($nomLien, "."); $extension= substr($nomLien,intval($point)+1);
      if (preg_match($typeImgReco,$extension)==1) @unlink(utf8_decode($cheminMini));
    }
  }
  if ($typeSrv=="2") {
    // En FTP
    $_SESSION["ws"]["$nomSrv"]["connexion"]=connexionFTP($nomSrv);

    if ($_REQUEST["nomPro"]=="dossier") {
      
      if (removeScandirFTP(utf8_decode($cheminElement))===false)
           $message= $_SESSION["ws"]["dia"]["theRemove"]." ".$_SESSION["ws"]["dia"]["ofDir"]." '".$nomElement."' ".$_SESSION["ws"]["dia"]["hasFailed"].". ".$erreur;
      else $message= $_SESSION["ws"]["dia"]["theDir"]." '".$nomElement."' ".$_SESSION["ws"]["dia"]["hasBeen"]."  ".$_SESSION["ws"]["dia"]["deleted"]." ".$_SESSION["ws"]["dia"]["withSuccess"];

    } else {

      if (@ftp_delete($_SESSION["ws"]["$nomSrv"]["connexion"],utf8_decode($cheminElement))===false)
           $message= $_SESSION["ws"]["dia"]["theRemove"]." ".$_SESSION["ws"]["dia"]["ofFile"]." '".$nomElement."' ".$_SESSION["ws"]["dia"]["hasFailed"].". ".$erreur;
      else $message= $_SESSION["ws"]["dia"]["theFile"]." '".$nomElement."' ".$_SESSION["ws"]["dia"]["hasBeen"]."  ".$_SESSION["ws"]["dia"]["deleted"]." ".$_SESSION["ws"]["dia"]["withSuccess"];
      $point= strrpos($nomLien, "."); $extension= substr($nomLien,intval($point)+1);
      if (preg_match($typeImgReco,$extension)==1) @ftp_delete($_SESSION["ws"]["$nomSrv"]["connexion"],utf8_decode($cheminMini));
    }
  }
}

  if ($typeSrv=="3") {
  // Vidage de la corbeille
    if (removeScandir(utf8_decode($_SESSION["ws"]["repCorbeille"]))!==false) {
      mkdir (utf8_decode($_SESSION["ws"]["repCorbeille"]));
      chmod (utf8_decode($_SESSION["ws"]["repCorbeille"]),0777);
      $message= $_SESSION["ws"]["dia"]["emptyBinResult"];
    } else $message=$_SESSION["ws"]["dia"]["identProblem2"];
  }
  
}  else { $message= $_SESSION["ws"]["dia"]["prohibited"]; }

echo $message;
$_SESSION["ws"]["progress"]="";
$tabLog= array("13","1",$message,$_SESSION["ws"]["nomUser"],$cheminElement,$nomElement,"");
$l_mysql->logAction($tabLog);
$l_mysql->disconnect();

?>
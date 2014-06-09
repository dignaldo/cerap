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
// Fonction : Enregistre le fichier sélectionné
// Nom      : enregistrer.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
session_start();
include_once "auth.php";
include_once "fonctions.php";
$l_mysql = new class_mysql();
$l_mysql->connect();

include_once "zip.lib.php";
$nomSrv= $_SESSION["ws"]["serveurActif"];
$chemin= stripslashes($_SESSION["ws"]["cheminActif"]."/".$_SESSION["ws"]["dossierActif"]."/");
$all= intval($_REQUEST["all"]);


if (!empty($_REQUEST["ok"])) {

  $zipfile = new zipfile();
  $zipfilename   = basename($_SESSION["ws"]["$nomSrv"]["repServeur"]."/".$_SESSION["ws"]["dossierActif"]."_archive").'.zip';
  $zip_subfolder = 'Webshare_Fichiers';
  
  function saveScandir($ad_dir,$path) {
    global $all,$zipfile;
    if ($handle = opendir($ad_dir)) {
    
     while (false !== ($file = readdir($handle))) {
       if (!is_dir("$ad_dir/$file")) {
       
        if (preg_match($_SESSION["ws"]["varsUser"], $file)==0) {
         $f_tmp = @fopen($ad_dir . '/' . $file, 'r');
         if($f_tmp){
           $dump_buffer=fread( $f_tmp, filesize($ad_dir . '/' . $file));
           $zipfile -> addFile($dump_buffer, convCar(utf8_encode($path . (!empty($path)?'/':'') . $file)));
           fclose($f_tmp);
         }
       }
       
      } else {
        if ((preg_match($_SESSION["ws"]["varsUser"], $file)==0)&&($all==1)) {
          saveScandir($ad_dir . '/' . $file, $path . (!empty($path)?'/':'') . $file);
        }
      }
     }

   }
  }

  saveScandir(blindeChemin($chemin),"");
  
  $dump_buffer = $zipfile -> file();
  header('Pragma: public');
  header('Content-type: application/zip;');
  header('Content-length: ' . strlen($dump_buffer));
  header('Content-Disposition: attachment; filename="'.str_replace(" ","",urldecode($zipfilename)).'"');
  flush();
  $tabLog= array("14","1",$_SESSION["ws"]["dia"]["savingDirContent"].$_SESSION["ws"]["dossierActif"],$_SESSION["ws"]["nomUser"],$_SESSION["ws"]["dossierActif"],$zipfilename,"");
  $l_mysql->logAction($tabLog);
  $l_mysql->disconnect();
  echo $dump_buffer;
  }


?>
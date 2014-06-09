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
// Fonction : Récupère la progression de l'upload
// Nom      : upload_progress.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================

include_once "auth.php";
include_once "fonctions.php";
$l_mysql = new class_mysql();
$l_mysql->connect();

$nomSrv= $_SESSION["ws"]["serveurActif"];
$chemin= $_SESSION["ws"]["cheminActif"]."/".$_SESSION["ws"]["dossierActif"]."/";

if (isset($_GET["filename"])) {
  $_SESSION["ws"]["dl"]    = 0;
  $_SESSION["ws"]["finDl"] = 0;
  $_SESSION["ws"]["typeZip"]    = $_GET["typeZip"];
  $_SESSION["ws"]["typeAction"] = $_GET["typeAction"];
  $_SESSION["ws"]["fileName"]   = convertUTF8($_GET["filename"]);
  $_SESSION["ws"]["nomEncode"]  = utf8_decode(convCar(urldecode(stripslashes(basename(blindeChemin($_GET["nomEncode"]))))));
  if (empty($_SESSION["ws"]["nomEncode"]))  $_SESSION["ws"]["nomEncode"] = $_SESSION["ws"]["fileName"];
} 
$nomEnvoi= preg_replace("/%u([0-9ABCDEFabcdef]{3,5})/e", 'html_to_utf8("\\1")', $_SESSION["ws"]["nomEncode"]);
$statFile= $_SESSION["ws"]["tempDir"]."stats_".$_SESSION["ws"]["sid"].".txt";
$statInfo= @file_get_contents($statFile);

if (isset($statInfo)&&(strlen($statInfo)!=0)) {
  $etat="D"; $_SESSION["ws"]["dl"]=1;
  $pourcent= substr($statInfo,0,strpos($statInfo,"|"));
  if ($pourcent=="100")   { $etat="S"; $_SESSION["ws"]["finDl"] = 1; }
  if ($pourcent=="-1")    { $etat="P"; $_SESSION["ws"]["finDl"] = 1; }
} else {
  $etat="W";
  if ($_SESSION["ws"]["dl"]!=0) { $etat="S"; $_SESSION["ws"]["finDl"] = 1; }
}


if ($_SESSION["ws"]["finDl"]==1) {

  if ($pourcent=="100") {
    if ((strstr($_SESSION["ws"]["fileName"],".zip")!==false) && ($_SESSION["ws"]["typeZip"]==1)) {
      dezipper(blindeChemin($_SESSION["ws"]["tempDir"].$_SESSION["ws"]["fileName"]),blindeChemin($chemin));
    } else {
      if ((preg_match($_SESSION["ws"]["varsUser"],$_SESSION["ws"]["fileName"]))==0) {

       $lienSrv= blindeChemin($_SESSION["ws"]["tempDir"]);
       $handle = opendir($lienSrv);
       while (false !== ($entry = readdir($handle))) {
         if (preg_match(str_replace("/i","|stats_|temp_/i",$_SESSION["ws"]["varsUser"]), $entry)==0) {
           
           if (!is_dir($lienSrv.blindeChemin("/$entry"))) {
           $temp = blindeChemin($_SESSION["ws"]["tempDir"].$entry);
           $dest = blindeChemin($chemin).$_SESSION["ws"]["nomEncode"];
           
           // En local
           if ($_SESSION["ws"]["$nomSrv"]["typeServeur"]=="1") {
             $existing= is_file($dest);
             
             switch ($_SESSION["ws"]["typeAction"]) {
             default: case "0":
               if ($existing) unlink ($dest); 
               rename ($temp,$dest);
               break;

             case "1":
               if ($existing) rename ($temp,blindeChemin($chemin).date("Ymd_His_").$_SESSION["ws"]["nomEncode"]);
               else rename ($temp,$dest);                 
               break;

             case "2":
               if ($existing) unlink ($temp); 
               else rename ($temp,$dest); 
               break;
             }
             if (is_file($temp)) unlink ($temp);

           // En FTP
           } else {
             $_SESSION["ws"]["$nomSrv"]["connexion"]=connexionFTP($nomSrv);
             $existing= 0; 
           
             if (($contents = ftp_rawlist($_SESSION["ws"]["$nomSrv"]["connexion"], $chemin))!==FALSE) {
               foreach($contents as $file) {    
                 if (preg_match("/^[.]{2}$|^[.]{1}$/", $file)==0) {
                   $info = array();
                   $vinfo = preg_split("/[\s]+/", $file, 9);
                   if ($vinfo[0] !== "total") { 
                     $filename = $vinfo[8];
                     if (preg_match("/".$_SESSION["ws"]["nomEncode"]."/",$filename)==1) $existing=1; }             
                 }   
               }
             }
             
             switch ($_SESSION["ws"]["typeAction"]) {
             default: case "0":
               if ($existing) @ftp_delete($_SESSION["ws"]["$nomSrv"]["connexion"],$dest);
               @ftp_put($_SESSION["ws"]["$nomSrv"]["connexion"],$dest,$temp, FTP_BINARY);
               break;

             case "1":
               if ($existing) @ftp_put($_SESSION["ws"]["$nomSrv"]["connexion"],blindeChemin($chemin).date("Ymd_His_").$_SESSION["ws"]["nomEncode"],$temp, FTP_BINARY);
               else @ftp_put($_SESSION["ws"]["$nomSrv"]["connexion"],$dest,$temp, FTP_BINARY);
               break;

             case "2":
               if (!$existing) @ftp_put($_SESSION["ws"]["$nomSrv"]["connexion"],$dest,$temp, FTP_BINARY);
               break;
             }
             @unlink ($temp);

           }
                          
         /*** Décommentez cette partie pour envoyer un mail lors de la fin de l'upload ***

            $lienMail = blindeChemin($_SESSION["ws"]["rootWeb"].blindeChemin("/".$_SESSION["ws"]["dossierActif"]."/".$nomEnvoi);
            
              $message  = $_SESSION["ws"]["dia"]["mailSendFile1"]." ".$_SESSION["ws"]["serveurActif"];
            if ($_SESSION["ws"]["$nomSrv"]["typeServeur"]=="1") 
              $message .= "\n \n ".$_SESSION["ws"]["dia"]["mailSendFile2"]." ".$lienMail;
              $message .= "\n \n ".$_SESSION["ws"]["dia"]["mailSendFile3"]."\n \n ".$_SESSION["ws"]["dia"]["mailSendFile4"];
          
            // Personnalisez cette ligne en remplaçant "mail@mondomaine.com" par l'adresse mail du destinataire
            mail("mail@mondomaine.com",$_SESSION["ws"]["dia"]["mailSendTitle"], $message,
            'Content-type: text/plain; charset=utf-8'."\r\n".'From: "'.$_SESSION["ws"]["nomUser"].'"<'.$_SESSION["ws"]["mailUser"].'>');
         
         /*** ***/ 
          
          $tabLog= array("6","2",$_SESSION["ws"]["dia"]["File"]." ".$nomEnvoi." ".$_SESSION["ws"]["dia"]["uploaded"],$_SESSION["ws"]["nomUser"],$_SESSION["ws"]["dossierActif"],$nomEnvoi,"");
          $l_mysql->logAction($tabLog);
          $l_mysql->disconnect();
         }
        }
       }
         closedir($handle);
      }
      else {
         $statInfo=$_SESSION["ws"]["dia"]["noPermission"];
         unlink (blindeChemin($_SESSION["ws"]["tempDir"].$_SESSION["ws"]["fileName"]));
      }
    }
  }

  unlink (blindeChemin($_SESSION["ws"]["tempDir"]."stats_".$_SESSION["ws"]["sid"].".txt"));
  unlink (blindeChemin($_SESSION["ws"]["tempDir"]."temp_".$_SESSION["ws"]["sid"]));
  $_SESSION["ws"]["finDl"]==0;
}
echo $etat."|".utf8_encode($_SESSION["ws"]["nomEncode"])."|".$statInfo."|End";

?>
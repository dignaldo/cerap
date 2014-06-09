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
// Fonction : Effectue la copie ou le déplacement de(s) fichier(s)
// Nom      : coller.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
header ("Content-type: text/html; charset=utf-8");
session_start();
include_once "auth.php";
include_once "fonctions.php";
$l_mysql = new class_mysql();
$l_mysql->connect();

// L'utilisateur ne peut pas effectuer d'opération au dessus de sa racine virtuelle
verifie($_REQUEST["objetDepart"]);
verifie($_REQUEST["destination"]);

  // Fonction de copie récursive
    function copieScandir($cheminDepart,$cheminDestin) {
      if ($handle=opendir(blindeChemin("$cheminDepart"))) {
         while ( ($file = readdir($handle)) !== false ) {
             if (preg_match("/^[.]{2}$|^[.]{1}$/", $file)==0) {
               $_SESSION["ws"]["progress"]=$file;
               if (is_dir("$cheminDepart/$file")) {
                   @mkdir("$cheminDestin/$file");
                   copieScandir("$cheminDepart/$file","$cheminDestin/$file"); }
                else if (@copy ("$cheminDepart/$file","$cheminDestin/$file")=== false) return false;
             }
         }
         closedir($handle);
      } else return false;
        return true;
    }

  // Fonction de suppression récursive
    function removeScandir($dir) {
      if ($handle=opendir(blindeChemin("$dir"))) {
         while ( ($file = readdir($handle)) !== false ) {
             if (preg_match("/^[.]{2}$|^[.]{1}$/", $file)==0) {
               $_SESSION["ws"]["progress"]=$file;
               if (is_dir("$dir/$file")) removeScandir("$dir/$file");
                 else if (@unlink ("$dir/$file")=== false) return false;
             }
         }
         closedir($handle);
         @rmdir("$dir/");                          
      } else return false;
      return true;
    }

  // Fonction de copie récursive vers le FTP
    function copieScandirToFTP($cheminDepart,$cheminDestin) {
      global $nomSrv1,$nomSrv2;
      if ($handle=opendir(blindeChemin("$cheminDepart"))) {
         while ( ($file = readdir($handle)) !== false ) {
             if (preg_match("/^[.]{2}$|^[.]{1}$/", $file)==0) {
               $_SESSION["ws"]["progress"]=$file;
               if (is_dir("$cheminDepart/$file")) {
                 @ftp_mkdir($_SESSION["ws"]["$nomSrv2"]["connexion"],"$cheminDestin/$file");
                 copieScandirToFTP("$cheminDepart/$file","$cheminDestin/$file");           
               } else @ftp_put($_SESSION["ws"]["$nomSrv2"]["connexion"],"$cheminDestin/$file","$cheminDepart/$file", FTP_BINARY);
             }
         }
         closedir($handle);
      } else return false;
        return true;
    }

  // Fonction de suppression récursive sur le FTP
    function removeScandirFTP($dir) {
      global $nomSrv1,$nomSrv2;    
      if (($contents = ftp_rawlist($_SESSION["ws"]["$nomSrv1"]["connexion"], $dir))!==FALSE) {
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
             else @ftp_delete($_SESSION["ws"]["$nomSrv1"]["connexion"],"$dir/$filename");
             
           }   
         }
         @ftp_rmdir($_SESSION["ws"]["$nomSrv1"]["connexion"],"$dir/");
      } else return false;
      return true;
    }
    
    
  // Fonction de copie récursive à partir du FTP
    function copieScandirFromFTP($cheminDepart,$cheminDestin) {
      global $nomSrv1,$nomSrv2;    
      if (($contents = ftp_rawlist($_SESSION["ws"]["$nomSrv1"]["connexion"], $cheminDepart))!==FALSE) {
         foreach($contents as $file) {    
       
           if (preg_match("/^[.]{2}$|^[.]{1}$/", $file)==0) {
        
             $info = array();
             $vinfo = preg_split("/[\s]+/", $file, 9);
             if ($vinfo[0] !== "total") {
               $fileperms     = $vinfo[0];
               $filename      = $vinfo[8];
             }      

             $_SESSION["ws"]["progress"]=$filename;
             if (strpos($fileperms,"d")!==FALSE) {                      
                @mkdir("$cheminDestin/$filename");
                copieScandirFromFTP("$cheminDepart/$filename","$cheminDestin/$filename"); }
             else if (@ftp_get($_SESSION["ws"]["$nomSrv1"]["connexion"],"$cheminDestin/$filename","$cheminDepart/$filename", FTP_BINARY)=== false) return false;
             
           }   
         }
      } else return false;               
    }


// L'utilisateur doit être autorisé à effectuer l'opération
if ($_SESSION["ws"]["auth4"]=="on") {

// Teste si la variable de copie/déplacement n'est pas vide
if (isset($_REQUEST["clipboardMode"]) && !empty($_REQUEST["clipboardMode"])) {

  // Récupération des paramètres
  $nomSrv1     = trim($_REQUEST["clipboardSrv"]);
  $nomSrv2     = $_SESSION["ws"]["serveurActif"];
  $typeSrv1    = $_SESSION["ws"]["$nomSrv1"]["typeServeur"];
  $typeSrv2    = $_SESSION["ws"]["$nomSrv2"]["typeServeur"];

  $depart      = stripslashes(urldecode(trim($_REQUEST["objetDepart"])));
  $destination = stripslashes(urldecode(trim($_REQUEST["destination"])));
  $typeCopie   = trim($_REQUEST["clipboardMode"]);
  $typeFichier = trim($_REQUEST["clipboardType"]);
  $nomDepart   = basename(blindeChemin($depart));
  $_SESSION["ws"]["progress"]=$nomDepart;

  // Connexion au serveur FTP
  if ($typeSrv1==2) $_SESSION["ws"]["$nomSrv1"]["connexion"]=connexionFTP($nomSrv1); 
  if ($typeSrv2==2) $_SESSION["ws"]["$nomSrv2"]["connexion"]=connexionFTP($nomSrv2);

  // Vérifie l'absence d'expressions interdites dans le nom
  if (preg_match($_SESSION["ws"]["varsUser"], $_REQUEST["objetDepart"])==1) { echo $_SESSION["ws"]["dia"]["noPermission"];
    $tabLog= array("12","-1",$_SESSION["ws"]["dia"]["noPermission"],$_SESSION["ws"]["nomUser"],$_SESSION["ws"]["dossierActif"],$_REQUEST["objetDepart"],"");
    $l_mysql->logAction($tabLog);
    exit;  }

  // Formatage des chemins de départ et d'arrivée
  $cheminDepart=  blindeChemin($_SESSION["ws"]["$nomSrv1"]["rootServeur"]."/".$_SESSION["ws"]["$nomSrv1"]["repServeur"]."/".$depart);
  $cheminDestin=  blindeChemin($_SESSION["ws"]["$nomSrv2"]["rootServeur"]."/".$_SESSION["ws"]["$nomSrv2"]["repServeur"]."/".$destination."/".$nomDepart);
  $cheminMini  =  blindeChemin(dirname($cheminDepart)."/wsminis/".basename($cheminDepart));
  $cheminTemp  =  blindeChemin($_SESSION["ws"]["tempDir"]."/".basename($cheminDepart));

  // Si les chemins de départ et d'arrivée sont identiques, on crée une simple copie de l'élément
  if (($cheminDepart==$cheminDestin) || (is_file(utf8_decode($cheminDestin))) || (is_dir(utf8_decode($cheminDestin))))
       $cheminDestin=blindeChemin(dirname($cheminDestin)."/".$_SESSION["ws"]["dia"]["copyOf"].$nomDepart);

  // L'élément est un fichier
  if ($typeFichier!="dossier") {

  // En local
  if (($typeSrv1==1)&&($typeSrv2==1)) {

      // Copie du fichier
      if (($resultat= @copy(utf8_decode($cheminDepart),utf8_decode($cheminDestin))) === false) {
            $message= $_SESSION["ws"]["dia"]["theFile"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasNotBeen"]." ".(($typeCopie=="move")?$_SESSION["ws"]["dia"]["moved"]." ".$erreur:$_SESSION["ws"]["dia"]["copied"].". ".$erreur);
      } else {
      // ou déplacement du fichier
        if ($typeCopie=="move") {
          if (@unlink(utf8_decode($cheminDepart)) === false)
               $message= $_SESSION["ws"]["dia"]["theFile"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasNotBeen"]." ".$_SESSION["ws"]["dia"]["moved"].", ".$_SESSION["ws"]["dia"]["onlyCopy"];
          else $message= $_SESSION["ws"]["dia"]["theFile"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["moved"]." ".$_SESSION["ws"]["dia"]["withSuccess"].".";
          $point= strrpos($nomDepart, "."); $extension= substr($nomDepart,intval($point)+1);
          if (preg_match($typeImgReco,$extension)==1) @unlink(utf8_decode("$cheminMini")); }
        else   $message= $_SESSION["ws"]["dia"]["theFile"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["copied"]." ".$_SESSION["ws"]["dia"]["withSuccess"].".";
      }

    // Local vers FTP
    } else if (($typeSrv1==1)&&($typeSrv2==2)) {

      // Copie du fichier
      if (($resultat= @ftp_put($_SESSION["ws"]["$nomSrv2"]["connexion"],utf8_decode($cheminDestin),utf8_decode($cheminDepart), FTP_BINARY)) === false) {
            $message= $_SESSION["ws"]["dia"]["theFile"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasNotBeen"]." ".(($typeCopie=="move")?$_SESSION["ws"]["dia"]["moved"]." ".$erreur:$_SESSION["ws"]["dia"]["copied"].". ".$erreur);
      } else {
      // ou déplacement du fichier
        if ($typeCopie=="move") {
          if (@unlink(utf8_decode($cheminDepart)) === false)
               $message= $_SESSION["ws"]["dia"]["theFile"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasNotBeen"]." ".$_SESSION["ws"]["dia"]["moved"].", ".$_SESSION["ws"]["dia"]["onlyCopy"];
          else $message= $_SESSION["ws"]["dia"]["theFile"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["moved"]." ".$_SESSION["ws"]["dia"]["withSuccess"].".";
        } else $message= $_SESSION["ws"]["dia"]["theFile"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["copied"]." ".$_SESSION["ws"]["dia"]["withSuccess"].".";
      }

    // FTP vers local
    } else if (($typeSrv1==2)&&($typeSrv2==1)) {
         
      // Copie du fichier
      if (($resultat= @ftp_get($_SESSION["ws"]["$nomSrv1"]["connexion"],utf8_decode($cheminDestin),utf8_decode($cheminDepart), FTP_BINARY)) === false) {
            $message= $_SESSION["ws"]["dia"]["theFile"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasNotBeen"]." ".(($typeCopie=="move")?$_SESSION["ws"]["dia"]["moved"]." ".$erreur:$_SESSION["ws"]["dia"]["copied"].". ".$erreur);
      } else {
      // ou déplacement du fichier
        if ($typeCopie=="move") {
          if (@ftp_delete($_SESSION["ws"]["$nomSrv1"]["connexion"],utf8_decode($cheminDepart)) === false)
               $message= $_SESSION["ws"]["dia"]["theFile"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasNotBeen"]." ".$_SESSION["ws"]["dia"]["moved"].", ".$_SESSION["ws"]["dia"]["onlyCopy"];
          else $message= $_SESSION["ws"]["dia"]["theFile"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["moved"]." ".$_SESSION["ws"]["dia"]["withSuccess"].".";
        } else $message= $_SESSION["ws"]["dia"]["theFile"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["copied"]." ".$_SESSION["ws"]["dia"]["withSuccess"].".";
      }
   
    // FTP vers FTP
    } else if (($typeSrv1==2)&&($typeSrv2==2)) {

      // Copie du fichier
      if ($typeCopie=="copy") {
               $resultat= @ftp_get($_SESSION["ws"]["$nomSrv1"]["connexion"],utf8_decode($cheminTemp),utf8_decode($cheminDepart), FTP_BINARY);        
          if (($resultat= @ftp_put($_SESSION["ws"]["$nomSrv2"]["connexion"],utf8_decode($cheminDestin),utf8_decode($cheminTemp), FTP_BINARY)) === false) 
              $message= $_SESSION["ws"]["dia"]["theFile"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasNotBeen"]." ".$_SESSION["ws"]["dia"]["copied"].". ".$erreur;
         else $message= $_SESSION["ws"]["dia"]["theFile"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["copied"]." ".$_SESSION["ws"]["dia"]["withSuccess"].".";
              @unlink(utf8_decode($cheminTemp));

      // ou déplacement du fichier
      } else if ($typeCopie=="move") {
        
          // Sur le même serveur    
          if ($nomSrv1==$nomSrv2) {
      
            if (@ftp_rename($_SESSION["ws"]["$nomSrv1"]["connexion"],utf8_decode($cheminDepart),utf8_decode($cheminDestin)) === false)
                   $message= $_SESSION["ws"]["dia"]["theFile"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasNotBeen"]." ".$_SESSION["ws"]["dia"]["moved"].".";
              else $message= $_SESSION["ws"]["dia"]["theFile"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["moved"]." ".$_SESSION["ws"]["dia"]["withSuccess"].".";

          // Sur 2 serveurs diffèrents
          } else {   
                  $resultat= @ftp_get($_SESSION["ws"]["$nomSrv1"]["connexion"],utf8_decode($cheminTemp),utf8_decode($cheminDepart), FTP_BINARY);        
             if (($resultat= @ftp_put($_SESSION["ws"]["$nomSrv2"]["connexion"],utf8_decode($cheminDestin),utf8_decode($cheminTemp), FTP_BINARY)) === false) 
                   $message= $_SESSION["ws"]["dia"]["theFile"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasNotBeen"]." ".$_SESSION["ws"]["dia"]["moved"].". ".$erreur;
            else { $message= $_SESSION["ws"]["dia"]["theFile"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["moved"]." ".$_SESSION["ws"]["dia"]["withSuccess"].".";
                   @ftp_delete($_SESSION["ws"]["$nomSrv1"]["connexion"],utf8_decode($cheminDepart));      
                   @unlink(utf8_decode($cheminTemp));
            }
               
          }
      }    
          
    }

  } else {
  // L'élément est un dossier

  // Vérifie qu'un dossier n'est pas copié à l'intérieur de lui-même (fonction récursive infinie, opération strictement interdite)
    if ( (basename(dirname(utf8_decode($cheminDestin)))==basename(utf8_decode($cheminDepart))) && ($nomSrv2!=$nomSrv1) ) { echo $_SESSION["ws"]["dia"]["noOperation"];
      $tabLog= array("12","-1",$_SESSION["ws"]["dia"]["noOperation"],$_SESSION["ws"]["nomUser"],$_SESSION["ws"]["dossierActif"],$_REQUEST["objetDepart"],"");
      $l_mysql->logAction($tabLog);
      exit; }

  // En local
    if (($typeSrv1==1)&&($typeSrv2==1)) {

      // Copie d'un dossier
      if (mkdir (utf8_decode($cheminDestin)) === false) {
               $message= $_SESSION["ws"]["dia"]["theDir"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasNotBeen"]." ".(($typeCopie=="move")?$_SESSION["ws"]["dia"]["moved"]." ".$erreur:$_SESSION["ws"]["dia"]["copied"].". ".$erreur);
      } else {
        if (copieScandir(utf8_decode($cheminDepart),utf8_decode($cheminDestin)) === false)
               $message= $_SESSION["ws"]["dia"]["theDir"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasNotBeen"]." ".(($typeCopie=="move")?$_SESSION["ws"]["dia"]["moved"]." ".$erreur:$_SESSION["ws"]["dia"]["copied"].". ".$erreur);
        else {
        // ou déplacement d'un dossier
          if ($typeCopie=="move") {
            if (removeScandir(utf8_decode($cheminDepart)) === false)
                 $message= $_SESSION["ws"]["dia"]["theDir"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasNotBeen"]." ".$_SESSION["ws"]["dia"]["moved"].", ".$_SESSION["ws"]["dia"]["onlyCopy"];
            else $message= $_SESSION["ws"]["dia"]["theDir"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["moved"]." ".$_SESSION["ws"]["dia"]["withSuccess"]."."; }
          else   $message= $_SESSION["ws"]["dia"]["theDir"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["copied"]." ".$_SESSION["ws"]["dia"]["withSuccess"].".";
        }
      }
      
    // Local vers FTP
    } else if (($typeSrv1==1)&&($typeSrv2==2)) {
     
      // Copie d'un dossier
      if (@ftp_mkdir($_SESSION["ws"]["$nomSrv2"]["connexion"],utf8_decode($cheminDestin)) === false) {
                 $message= $_SESSION["ws"]["dia"]["theDir"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasNotBeen"]." ".(($typeCopie=="move")?$_SESSION["ws"]["dia"]["moved"]." ".$erreur:$_SESSION["ws"]["dia"]["copied"].". ".$erreur);
      } else {
        if (copieScandirToFTP(utf8_decode($cheminDepart),utf8_decode($cheminDestin)) === false)
                 $message= $_SESSION["ws"]["dia"]["theDir"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasNotBeen"]." ".(($typeCopie=="move")?$_SESSION["ws"]["dia"]["moved"]." ".$erreur:$_SESSION["ws"]["dia"]["copied"].". ".$erreur);
        else {
        // ou déplacement d'un dossier
          if ($typeCopie=="move") {
            if (removeScandir(utf8_decode($cheminDepart)) === false)
                 $message= $_SESSION["ws"]["dia"]["theDir"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasNotBeen"]." ".$_SESSION["ws"]["dia"]["moved"].", ".$_SESSION["ws"]["dia"]["onlyCopy"];
            else $message= $_SESSION["ws"]["dia"]["theDir"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["moved"]." ".$_SESSION["ws"]["dia"]["withSuccess"]."."; }
          else   $message= $_SESSION["ws"]["dia"]["theDir"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["copied"]." ".$_SESSION["ws"]["dia"]["withSuccess"].".";
        }
      }
      
    // FTP vers local
    } else if (($typeSrv1==2)&&($typeSrv2==1)) {
     
      // Copie d'un dossier
      if (mkdir (utf8_decode($cheminDestin)) === false) {
               $message= $_SESSION["ws"]["dia"]["theDir"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasNotBeen"]." ".(($typeCopie=="move")?$_SESSION["ws"]["dia"]["moved"]." ".$erreur:$_SESSION["ws"]["dia"]["copied"].". ".$erreur);
      } else {
        if (copieScandirFromFTP(utf8_decode($cheminDepart),utf8_decode($cheminDestin)) === false)
               $message= $_SESSION["ws"]["dia"]["theDir"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasNotBeen"]." ".(($typeCopie=="move")?$_SESSION["ws"]["dia"]["moved"]." ".$erreur:$_SESSION["ws"]["dia"]["copied"].". ".$erreur);
        else {
        // ou déplacement d'un dossier
          if ($typeCopie=="move") {
            if (removeScandirFTP(utf8_decode($cheminDepart)) === false)
                 $message= $_SESSION["ws"]["dia"]["theDir"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasNotBeen"]." ".$_SESSION["ws"]["dia"]["moved"].", ".$_SESSION["ws"]["dia"]["onlyCopy"];
            else $message= $_SESSION["ws"]["dia"]["theDir"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["moved"]." ".$_SESSION["ws"]["dia"]["withSuccess"]."."; }
          else   $message= $_SESSION["ws"]["dia"]["theDir"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["copied"]." ".$_SESSION["ws"]["dia"]["withSuccess"].".";
        }
      }
    
    // FTP vers FTP
    } else if (($typeSrv1==2)&&($typeSrv2==2)) {
    
      // Pas encore de FXP, cela dit ...
      
      // Copie du dossier
      if ($typeCopie=="copy") {
              @mkdir (utf8_decode($cheminTemp)); 
              @ftp_mkdir($_SESSION["ws"]["$nomSrv2"]["connexion"],utf8_decode($cheminDestin));
              $resultat= copieScandirFromFTP(utf8_decode($cheminDepart),utf8_decode($cheminTemp));        
          if ($resultat=   copieScandirToFTP(utf8_decode($cheminTemp),utf8_decode($cheminDestin)) === false) 
              $message = $_SESSION["ws"]["dia"]["theDir"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasNotBeen"]." ".$_SESSION["ws"]["dia"]["copied"].". ".$erreur;
         else $message = $_SESSION["ws"]["dia"]["theDir"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["copied"]." ".$_SESSION["ws"]["dia"]["withSuccess"].".";
              removeScandir(utf8_decode($cheminTemp));

      // ou déplacement du dossier
      } else if ($typeCopie=="move") {
        
          // Sur le même serveur    
          if ($nomSrv1==$nomSrv2) {
      
            if (@ftp_rename($_SESSION["ws"]["$nomSrv1"]["connexion"],utf8_decode($cheminDepart),utf8_decode($cheminDestin)) === false)
                   $message= $_SESSION["ws"]["dia"]["theDir"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasNotBeen"]." ".$_SESSION["ws"]["dia"]["moved"].".";
              else $message= $_SESSION["ws"]["dia"]["theDir"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["moved"]." ".$_SESSION["ws"]["dia"]["withSuccess"].".";

          // Sur 2 serveurs diffèrents
          } else {   
                  @mkdir (utf8_decode($cheminTemp)); 
                  @ftp_mkdir($_SESSION["ws"]["$nomSrv2"]["connexion"],utf8_decode($cheminDestin));          
                  $resultat= copieScandirFromFTP(utf8_decode($cheminDepart),utf8_decode($cheminTemp));        
              if ($resultat=   copieScandirToFTP(utf8_decode($cheminTemp),utf8_decode($cheminDestin)) === false) 
                   $message= $_SESSION["ws"]["dia"]["theDir"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasNotBeen"]." ".$_SESSION["ws"]["dia"]["moved"].". ".$erreur;
            else { $message= $_SESSION["ws"]["dia"]["theDir"]." '".$nomDepart."' ".$_SESSION["ws"]["dia"]["hasBeen"]." ".$_SESSION["ws"]["dia"]["moved"]." ".$_SESSION["ws"]["dia"]["withSuccess"].".";
                   removeScandirFTP(utf8_decode($cheminDepart));      
                   removeScandir(utf8_decode($cheminTemp));
            }
               
          }
      }    
    
    }
  }
}

} else { $message= $_SESSION["ws"]["dia"]["prohibited"]; }

echo $message;
$_SESSION["ws"]["progress"]="";
$tabLog= array("12","1",$message,$_SESSION["ws"]["nomUser"],$_SESSION["ws"]["dossierActif"],$destination,"");
$l_mysql->logAction($tabLog);
$l_mysql->disconnect();
?>
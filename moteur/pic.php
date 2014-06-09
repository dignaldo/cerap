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
// Fonction : Affichage une image ou une miniature
// Nom      : pic.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
session_start();
include_once "fonctions.php";

// Récupération des paramètres
$nomSrv = $_SESSION["ws"]["serveurActif"];
$chemin = $_SESSION["ws"]["cheminActif"];
if (isset($_REQUEST["srv"])) $nomSrv=$_REQUEST["srv"];
if ($_SESSION["ws"]["$nomSrv"]["typeServeur"]=="1")
  $typeServeur=1; else {
  $typeServeur=2; $_SESSION["ws"]["$nomSrv"]["connexion"]=connexionFTP($nomSrv); }

if (isset($_REQUEST["imgSize"])) $imgSize=$_REQUEST["imgSize"]; else $imgSize=0;
if (isset($_REQUEST["h"]))       $valHaut=$_REQUEST["h"];       else $valHaut=0; 
if (isset($_REQUEST["v"]))       $valLarg=$_REQUEST["v"];       else $valLarg=0; 
if (isset($_REQUEST["ratio"]))   $ratio=  $_REQUEST["ratio"];   else $ratio=0; 

//if (function_exists("ini_set")) ini_set("memory_limit", "8M");

// L'utilisateur ne peut pas effectuer d'opération au dessus de sa racine virtuelle
verifie ($_REQUEST["pic"]);
$pic        = stripslashes($_REQUEST["pic"]);
$cheminIcone= dirname($_SESSION["ws"]["rootAppli"])."/";
preg_match("/\.(.*)$/",basename($pic),$regs); $typeImg=strtolower($regs[1]);
if (empty($typeImg)||($typeImg=="jpeg")) $typeImg="jpg";
$typeMime = $_SESSION["ws"]["assoc"]["$typeImg"]["extmime"];

// Formatage des chemins utiles
  if (strstr($pic,"http")!==false) { 
    $cheminGlobal=$pic;
    $fichier= basename($pic);
    $dossier= blindeChemin("$chemin/".$_SESSION["ws"]["dossierActif"]);
    $cheminMini= "$dossier/wsminis/";
    $cheminPic = "$dossier/wsminis/$fichier";
  } else { 
    $rep    = stripslashes(blindeChemin("$chemin/".$pic));
    $fichier= basename($rep);
    $dossier= dirname($rep);
    $cheminMini= "$dossier/wsminis/";
    $cheminPic = "$dossier/wsminis/$fichier";
    $cheminGlobal=utf8_decode(urldecode("$dossier/$fichier"));
    if (!empty($_REQUEST["mini"]) && ($_REQUEST["mini"]==1))
      $cheminGlobal=urldecode("$dossier/$fichier");
  }

// Suppression de l'ancienne vignette si demande de mise à jour
  if (!empty($_REQUEST["update"]) && ($_REQUEST["update"]==1) && is_file($cheminPic)) unlink($cheminPic);


// Fonction de rotation/symétrie/redimensionnement de l'image
  function imagemodify($srcImg, $angle, $typeModif) {
  
    // Calcul des dimensions
    $srcX = imagesx($srcImg);
    $srcY = imagesy($srcImg);
    if (($angle == 0)||($angle == 180)) {
      $destX = $srcX;
      $destY = $srcY;
    } elseif (($angle == 90) || ($angle == 270)) {
      $destX = $srcY;
      $destY = $srcX;
    } else return $srcImg;
       
    // Création de l'image de destination
    $rotate=imagecreatetruecolor($destX,$destY);
    imagealphablending($rotate, false);
              
    // Modification de l'image
    switch ($angle) { 
      case 0:
       if ($typeModif==2) { 
        // Symétrie horizontale      
        $destX--; $destY--;
        for ($y = 0; $y < $srcY; $y++)
          for ($x = 0; $x < $srcX; $x++)
            imagesetpixel($rotate, $destX - $x, $y, imagecolorat($srcImg, $x, $y));
       } else if ($typeModif==3) {
        // Symétrie verticale      
        $destX--; $destY--;
        for ($y = 0; $y < $srcY; $y++)
          for ($x = 0; $x < $srcX; $x++)
            imagesetpixel($rotate, $x, $destY - $y, imagecolorat($srcImg, $x, $y));
       }
       break;
      case 90:
        // Rotation à 90
        $destX--;
        for ($y = 0; $y < $srcY; $y++)
          for ($x = 0; $x < $srcX; $x++)
            imagesetpixel($rotate, $destX - $y, $x, imagecolorat($srcImg, $x, $y));
        break;
      case 180:
        // Rotation à 180
        $destX--; $destY--;
        for ($y = 0; $y < $srcY; $y++)
          for ($x = 0; $x < $srcX; $x++)
            imagesetpixel($rotate, $destX - $x, $destY - $y, imagecolorat($srcImg, $x, $y));
        break;
      case 270:
        // Rotation à 270
        $destY--;
        for ($y = 0; $y < $srcY; $y++)
          for ($x = 0; $x < $srcX; $x++)
            imagesetpixel($rotate, $y, $destY - $x, imagecolorat($srcImg, $x, $y));
        break;
    }
    return $rotate;
  }

  // Modification de l'image
  if (!empty($_REQUEST["modif"]) && ($_REQUEST["modif"]!=0)) {
    $cheminGlobal=blindeChemin("$chemin".$_SESSION["ws"]["dossierActif"].utf8_decode(urldecode("/$pic")));

    // Ouverture selon le type d'image
    switch ($typeImg) {
      case "gif": $imgDepart = imagecreatefromgif($cheminGlobal); break;
      case "png": $imgDepart = imagecreatefrompng($cheminGlobal); break;
      default :   $imgDepart = imagecreatefromjpeg($cheminGlobal); break;
    }
    if (!$imgDepart) {
      exit;
    }
    
    // Selon le type de modification demandé 
    switch ($_REQUEST["modif"]) {
       case "1" : $imgFinale= imagemodify($imgDepart,90,1); break;
       case "2" : $imgFinale= imagemodify($imgDepart,180,1); break;
       case "3" : $imgFinale= imagemodify($imgDepart,270,1); break;
       case "4" : $imgFinale= imagemodify($imgDepart,0,2); break;
       case "5" : $imgFinale= imagemodify($imgDepart,0,3); break;
       case "6" :
         if (($valHaut==0)&&($valLarg==0)) exit();
         if ($valHaut==0) $valHaut= $valLarg*(imagesy($imgDepart)/imagesx($imgDepart));         
         if ($valLarg==0) $valLarg= $valHaut*(imagesx($imgDepart)/imagesy($imgDepart));
         $imgFinale= imagecreatetruecolor ($valLarg, $valHaut);
         imagecopyresampled ($imgFinale, $imgDepart, 0, 0, 0, 0, $valLarg, $valHaut, imagesx($imgDepart), imagesy($imgDepart)); break;
    }

    if ($imgFinale) { 
      unlink($cheminGlobal);    
      // Enregistrement selon le type d'image
      switch ($typeImg) {
        case "gif": imagegif($imgFinale,$cheminGlobal); break;
        case "png": imagepng($imgFinale,$cheminGlobal); break;
        default :  imagejpeg($imgFinale,$cheminGlobal,100); break;
      }      
      unlink($cheminPic);
      imagedestroy($imgFinale);
    }
    if ($imgDepart) imagedestroy($imgDepart);
  }


  // Taille maxi de la vignette
  $largeurMaxi= $hauteurMaxi= 100;
  
  if (!empty($_REQUEST["mini"]) && ($_REQUEST["mini"]==1)) {
   // Création de la vignette uniquement sur serveur local  
   if ($typeServeur==1) {

    // Création du répertoire 'wswinis' si non existant
    if (!is_dir($cheminMini)) mkdir ($cheminMini,0777);

    // Librairie GD
    if ($libraryImg=="gd") {

      // Ouverture selon le type d'image
      if (!is_file($cheminPic)) {
        switch ($typeImg) {
        case "gif":
          $imgDepart = imagecreatefromgif($cheminGlobal);
          if (!$imgDepart) $imgDepart = imagecreatefromgif ($cheminIcone.$_SESSION["ws"]["cheminIcn"]."gif.".$_SESSION["ws"]["formatExt"]); break;
        case "png":
          $imgDepart = imagecreatefrompng($cheminGlobal);
          if (!$imgDepart) $imgDepart = imagecreatefromgif ($cheminIcone.$_SESSION["ws"]["cheminIcn"]."png.".$_SESSION["ws"]["formatExt"]); break;
        default :
          $imgDepart = imagecreatefromjpeg($cheminGlobal);
          if (!$imgDepart) $imgDepart = imagecreatefromgif ($cheminIcone.$_SESSION["ws"]["cheminIcn"]."jpg.".$_SESSION["ws"]["formatExt"]); break;
        }
        
        // Calcul des dimensions
        $largeur= imagesx($imgDepart); $hauteur= imagesy($imgDepart);
        // Pour les petites images
        if (($largeur<=$largeurMaxi) && ($hauteur<=$hauteurMaxi)) {
          $largeurMaxi=$largeur; $hauteurMaxi=$hauteur;
          $imgFinale= imagecreatetruecolor ($largeurMaxi, $hauteurMaxi);
          $white = imagecolorallocate($imgFinale, 255, 255, 255);
          imagefill($imgFinale, 0, 0, $white);
          imagecopy ($imgFinale, $imgDepart, 0, 0, 0, 0, $largeur, $hauteur);
        } else {
        // Pour les grandes images 
          if ($largeur < $hauteur) $largeurMaxi = ($hauteurMaxi/$hauteur)*$largeur;
          else $hauteurMaxi = ($largeurMaxi/$largeur)*$hauteur;
          $imgFinale= imagecreatetruecolor ($largeurMaxi, $hauteurMaxi);
          $white = imagecolorallocate($imgFinale, 255, 255, 255);
          imagefill($imgFinale, 0, 0, $white);
          imagecopyresampled ($imgFinale, $imgDepart, 0, 0, 0, 0, $largeurMaxi, $hauteurMaxi, $largeur, $hauteur);
        }
        
        // Enregistrement de la vignette
        header("Content-type: image/jpeg");
        if (imagejpeg($imgFinale,$cheminPic,75)===false) {
          $cheminPic= $cheminIcone.$_SESSION["ws"]["cheminIcn"].$typeImg.".".$_SESSION["ws"]["formatExt"];
        } else chmod ($cheminPic,0777);
          imagedestroy($imgDepart);
          imagedestroy($imgFinale);
        }

      // Librairie Imagick
      } else if ($libraryImg=="im") {

       if (!is_file($cheminPic)) {
            
        $imgFinale= new Imagick();
        $imgFinale->readImage($cheminGlobal);
        if ($libraryImg=="im") eval("\$imgFinale->setCompression(Imagick::COMPRESSION_JPEG);");
        $imgFinale->setCompressionQuality(60);
        $imgFinale->setImageFormat('jpeg');

        $largeur= $imgFinale->getImageWidth(); $hauteur= $imgFinale->getImageHeight();
        if (($largeur<=$largeurMaxi) && ($hauteur<=$hauteurMaxi)) {
          $largeurMaxi=$largeur; $hauteurMaxi=$hauteur;
        } else {
          if ($largeur < $hauteur) $largeurMaxi = ($hauteurMaxi/$hauteur)*$largeur;
          else $hauteurMaxi = ($largeurMaxi/$largeur)*$hauteur;
        }
        
        header("Content-type: image/jpeg");
        if ($libraryImg=="im") eval("\$imgFinale->resizeImage($largeurMaxi, $hauteurMaxi, Imagick::FILTER_LANCZOS, 1);");
        $fp = fopen($cheminPic, 'w+');
        fwrite($fp, $imgFinale);
        fclose($fp);
        $imgFinale->clear();
        $imgFinale->destroy();

       }
      } else if ($libraryImg=="ic") {

       if (!is_file($cheminPic)) {
          exec("convert ".escapeshellcmd($cheminGlobal)."[0] -quality 60% -resize 100x100 ".escapeshellcmd($cheminPic).".jpg", $out);
          rename ($cheminPic.".jpg",$cheminPic);
          if (!is_file($cheminPic)) {
            header("Content-type: image/png");
            $cheminPic= "../".$_SESSION["ws"]["cheminIcn"]."div".".".$_SESSION["ws"]["formatExt"];
          } else header("Content-type: image/jpeg");
       }
       
      }
        
      // Affichage d'un icone pour les serveurs distants
    } else {
      header("Content-type: image/jpeg");
      $cheminPic= "../".$_SESSION["ws"]["cheminIcn"].$typeImg.".".$_SESSION["ws"]["formatExt"];
    }
    
    // Renvoi simple du contenu de la vignette si celle-ci existe déjà
    readfile($cheminPic);
    
   } else {
     // Affichage pleine résolution de l'image   
     header("Content-type: $typeMime");
     header("Cache-Control: no-cache, must-revalidate");
     if ($typeServeur==1) {
       if (($libraryImg=="gd")&& (($typeImg=="jpeg")||($typeImg=="jpg")||($typeImg=="png")||($typeImg=="gif")) ) {
         readfile($cheminGlobal);
       } else if ($libraryImg=="im") {

        $imgFinale= new Imagick();
        $imgFinale->readImage($cheminGlobal);
        if ($libraryImg=="im") eval("\$imgFinale->setCompression(Imagick::COMPRESSION_JPEG);");
        $imgFinale->setCompressionQuality(60);
        $imgFinale->setImageFormat('jpeg');
        $largeur= $imgFinale->getImageWidth();
        $hauteur= $imgFinale->getImageHeight();
        echo $imgFinale;
        $imgFinale->clear();
        $imgFinale->destroy();

       } else if ($libraryImg=="ic") {
       
          exec("convert ".escapeshellcmd($cheminGlobal)."[0] -quality 60% ".escapeshellcmd($cheminGlobal)."tmp.jpg", $out);
          readfile($cheminGlobal."tmp.jpg");
          unlink  ($cheminGlobal."tmp.jpg");
        
       } else readfile($cheminGlobal);
     } else {
       echo ftp_get_contents($_SESSION["ws"]["$nomSrv"]["connexion"], $cheminGlobal, FTP_BINARY);
     }
   }
   if (function_exists("ini_restore")) ini_restore ("memory_limit");
?>
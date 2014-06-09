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
// Fonction : Création de l'apercu d'une fonte
// Nom      : apercufonte.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
session_start();
include_once "fonctions.php";
$l_mysql = new class_mysql();
$l_mysql->connect();

$nomSrv   = $_SESSION["ws"]["serveurActif"];
$typeSrv  = $_SESSION["ws"]["$nomSrv"]["typeServeur"];
$url= $_REQUEST["url"];

  if ($typeSrv==2) {
    $_SESSION["ws"]["$nomSrv"]["connexion"]=connexionFTP($nomSrv);
    $cheminTmp=blindeChemin($_SESSION["ws"]["tempDir"]."/tmpfont.ttf");
    @ftp_get($_SESSION["ws"]["$nomSrv"]["connexion"],$cheminTmp,$url, FTP_BINARY);
    $url=$cheminTmp;
  }

  $pangramme = "Voix ambiguë d'un cœur qui, au zéphyr, préfère les jattes de kiwis";
  $pangramme = $_SESSION["ws"]["dia"]["startTitle"];
  if (!empty($_REQUEST["pangramme"])) $pangramme=urldecode($_REQUEST["pangramme"]);
  
  $alphabet  = "abcdefghijklmnopqrstuvwxyz";
  $nom= str_replace(array("_",".ttf",".TTF",".otf",".OTF"),"",basename($_REQUEST["url"]));
  
  header("Content-type: image/gif");
  $imgFonte= imagecreatetruecolor (1000, 400);
  $white = imagecolorallocate($imgFonte, 255, 255, 255);
  $black = imagecolorallocate($imgFonte,   0,   0,   0);
  imagefill($imgFonte, 0, 0, $white);
  
  imagestring  ($imgFonte, 2, 2, 2,  "Preview created by Webshare : ".$nom, $black);
  imageline    ($imgFonte, 0, 24, 1000, 24, $black);
  imagestring  ($imgFonte, 2, 2, 32,  "12", $black);
  imagestring  ($imgFonte, 2, 2, 58,  "18", $black);
  imagestring  ($imgFonte, 2, 2, 94,  "24", $black);
  imagestring  ($imgFonte, 2, 2, 142, "36", $black);
  imagestring  ($imgFonte, 2, 2, 198, "48", $black);
  imagestring  ($imgFonte, 2, 2, 270, "60", $black);
  imagestring  ($imgFonte, 2, 2, 372, "72", $black);

  imagettftext($imgFonte, 12, 0, 280, 14, $black, $url, $alphabet." ".strtoupper($alphabet)." 0123456789" );
  imagettftext($imgFonte, 12, 0, 20, 42,  $black, $url, $pangramme );
  imagettftext($imgFonte, 18, 0, 20, 68,  $black, $url, $pangramme );
  imagettftext($imgFonte, 24, 0, 20, 104, $black, $url, $pangramme );
  imagettftext($imgFonte, 36, 0, 20, 152, $black, $url, $pangramme );
  imagettftext($imgFonte, 48, 0, 20, 208, $black, $url, $pangramme );
  imagettftext($imgFonte, 60, 0, 20, 280, $black, $url, $pangramme );
  imagettftext($imgFonte, 72, 0, 20, 382, $black, $url, $pangramme );
  imagegif($imgFonte);
  imagedestroy($imgFonte);

  if ($typeSrv==2) {
    unlink($cheminTmp);
  }
// ===================================================================== ?>
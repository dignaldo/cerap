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
// Fonction : Affichage des informations EXIF
// Nom      : exif.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
header ("Content-type: text/html; charset=utf-8");
@session_start();
include_once "auth.php";
include_once "fonctions.php";
$nomSrv = $_SESSION["ws"]["serveurActif"];
$chemin = $_SESSION["ws"]["cheminActif"];
verifie  ($_REQUEST["url"]);
$urlImg= $_REQUEST["url"];
if (isset($_REQUEST["detail"])) $detail=1; else $detail=0;

if (!function_exists("exif_read_data")) exit;

if (strstr($urlImg,"http")!==false) $cheminGlobal=$urlImg;
                  else $cheminGlobal=utf8_decode(blindeChemin("$chemin/".$urlImg));

if (preg_match("/\.jpg|\.jpeg/i",strtolower($urlImg))==1) {
  $exif =exif_read_data($cheminGlobal,0,true);
  $sepimg="<img src='".($detail?"":"").$_SESSION["ws"]["cheminImg"]."et.".$_SESSION["ws"]["formatExt"]."' border='0'>";

  echo "<ul class='infosexif'><div class='rubrique' id='blocExif' style='height:22px;'><b><img src='".($detail?"":"").$_SESSION["ws"]["cheminImg"]."bloc.".$_SESSION["ws"]["formatExt"]."' border='0'> ".$_SESSION["ws"]['dia']['object']." :&nbsp;</b></div>";
  if (isset($exif) )  {
     if (@$exif["FILE"]["FileSize"])            echo "<li><b>$sepimg ".$_SESSION["ws"]['dia']['FileSize']." : </b>".         $exif["FILE"]["FileSize"]." bytes </li>";
     if (@$exif["EXIF"]["DateTimeOriginal"])    echo "<li><b>$sepimg ".$_SESSION["ws"]['dia']['DateTimeOriginal']." : </b>". $exif["EXIF"]["DateTimeOriginal"]."</li>";
     if (@$exif["COMPUTED"]["Height"])          echo "<li><b>$sepimg ".$_SESSION["ws"]['dia']['resolution']." : </b>".       $exif["COMPUTED"]["Width"]." x ".$exif["COMPUTED"]["Height"]."</li>";
     if (@$exif["EXIF"]["XResolution"])         echo "<li><b>$sepimg ".$_SESSION["ws"]['dia']['XResolution']." : </b>".      $exif["EXIF"]["XResolution"]."</li>";
     if (@$exif["EXIF"]["Software"])            echo "<li><b>$sepimg ".$_SESSION["ws"]['dia']['Software']." : </b>".         $exif["EXIF"]["Software"]."</li>";
     if (@$exif["EXIF"]["Photographer"])        echo "<li><b>$sepimg ".$_SESSION["ws"]['dia']['Photographer']." : </b>".     $exif["EXIF"]["Photographer"]."</li>";
     if((@$exif["IFD0"]["Make"]) || (@$exif["IFD0"]["CameraMake"]))
                              echo "<li> $sepimg ".$exif["IFD0"]["Make"]." ".$exif["IFD0"]["Model"]."</li>";
     echo "<li>&nbsp;</li></ul><p style='clear:left'/>";
     if((@$exif["EXIF"]["ExposureTime"]) || (@$exif["EXIF"]["ISOSpeedRatings"]) || (@$exif["EXIF"]["FocalLength"]))
                               echo "<ul class='infosexif'><li><div class='rubrique' style='width:150px;height:22px;'><b><img src='".($detail?"":"").$_SESSION["ws"]["cheminImg"]."bloc.".$_SESSION["ws"]["formatExt"]."' border='0'> ".$_SESSION["ws"]['dia']['cliche']." :&nbsp;</b></div></li>";
     if (@$exif["EXIF"]["ExposureTime"])        echo "<li><b>$sepimg ".$_SESSION["ws"]['dia']['ExposureTime']." : </b>".     $exif["EXIF"]["ExposureTime"]."</li>";
     if (@$exif["COMPUTED"]["ApertureFNumber"]) echo "<li><b>$sepimg ".$_SESSION["ws"]['dia']['ApertureFNumber']." : </b>".  $exif["COMPUTED"]["ApertureFNumber"]."</li>";
     if (@$exif["EXIF"]["MaxApertureValue"])    echo "<li><b>$sepimg ".$_SESSION["ws"]['dia']['MaxApertureValue']." : </b>". $exif["EXIF"]["MaxApertureValue"]."</li>";
     if (@$exif["EXIF"]["ISOSpeedRatings"])     echo "<li><b>$sepimg ".$_SESSION["ws"]['dia']['ISOSpeedRatings']." : </b>".  $exif["EXIF"]["ISOSpeedRatings"]."</li>";
     if (@$exif["EXIF"]["FocalLength"])         echo "<li><b>$sepimg ".$_SESSION["ws"]['dia']['FocalLength']." : </b>".      $exif["EXIF"]["FocalLength"]."</li>";
     if (@$exif["EXIF"]["ExposureBiasValue"])   echo "<li><b>$sepimg ".$_SESSION["ws"]['dia']['ExposureBiasValue']." : </b>".$exif["EXIF"]["ExposureBiasValue"]."</li>";
     if (@$exif["EXIF"]["LightSource"])         echo "<li><b>$sepimg ".$_SESSION["ws"]['dia']['LightSource']." : </b>".      $exif["EXIF"]["LightSource"]."</li>";
     if (@$exif["EXIF"]["Flash"])               echo "<li><b>$sepimg ".$_SESSION["ws"]['dia']['Flash']." : </b>".            $exif["EXIF"]["Flash"]."</li>";

  }
  echo "</ul>";
}

?>
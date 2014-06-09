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
// Fonction : Recherche d'une nouvelle version
// Nom      : checkversion.php
// Version  : 0.8.2
// Date     : 27/04/08
// =======================================================================
header ("Content-type: text/html; charset=utf-8");
session_start();
include_once "../moteur/fonctions.php";
include_once "admin.php";
$racineAppli= getScriptRoot();

// Détection d'une nouvelle version
$i=0; $thisVersion="0.65";
  
$fileVersion= @file_get_contents("http://www.webshare.fr/version.php");
$version = floatval ($fileVersion);
if ($version>$thisVersion) { 
  $newVersion=$_SESSION["ws"]["dia"]["newVersionAv"].". (v$version)<br/>"
             ."<div class='bouton5' onclick='updateVersion();' style='text-align:center;'>".$_SESSION["ws"]["dia"]["updateWS"]."</div>"; 
} else {
  $newVersion="<img src='img/ok.gif' style='vertical-align:middle'> ".$_SESSION["ws"]["dia"]["noVersionAv"];
}

echo $newVersion;
?>
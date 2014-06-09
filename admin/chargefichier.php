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
// Fonction : Affichage des logs
// Nom      : logs.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
header ("Content-type: text/html; charset=utf-8");
session_start();
include_once "../moteur/fonctions.php";

$filename="../logs/logs-".$_REQUEST["valeurjour"].".txt";
$handle = @fopen ($filename, "r");
echo utf8_encode(nl2br(fread ($handle, filesize ($filename))));
fclose ($handle);

?>


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
// Fonction : Test des cookies
// Nom      : checkcookies.php
// Version  : 0.8.2
// Date     : 27/04/08
// =======================================================================
header ("Content-type: text/html; charset=utf-8");
session_start();

  if (isset($_SESSION["ws"])) $noCookies=0; else $noCookies=1;
  echo $noCookies;

?>
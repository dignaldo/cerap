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
include_once "auth.php";
include_once "admin.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<style type="text/css" title="currentStyle">
    @import url('admin.css');
</style>
</head>
<body style="background:#FBEDD4;">
  <?php
  
  ob_start();
  echo phpinfo();
  $out = ob_get_contents();
  ob_end_clean();
  
  $out = str_replace('width="600"','width="540"',$out);
  echo $out
     
  ?>
</body></html>
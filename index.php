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
// Removing the name of the author from this page beside the copyright
// mention is in opposition with the license.
//
// La suppression du nom de l'auteur situé après la mention du copyright,
// en bas de ce script, est contraire aux termes de la license.
//
// =======================================================================
// Fonction : Page d'index
// Nom      : index.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
include_once "moteur/prive.php"; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?php //echo $_SESSION["ws"]["dia"]["startTitle"]; ?> CERAP</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- <link rel="shortcut icon" href="style/favicon2.ico" type="image/ico" /> -->

<script language="JavaScript" src="ident.php" type="text/javascript"></script>
<script type="text/javascript">
   window.onload=init;
</script>
<style type="text/css" title="currentStyle">
    @import url('style/Standard.css');
</style>
</head>

<body>
  <div class='frame_invite' id="fond">
  <div id="leftside"></div>
  <div id="rightside"></div>
  <noscript>
    <div class='invite' style='z-index:100;padding-top:20px'>
     <div id='message'>
      <?php echo $_SESSION["ws"]["dia"]["noJS"];?>
     </div>
    </div>
  </noscript>

  <div class='newAccount' style='display:none;'><?php echo (empty($autoUserAccount)?"none":"block"); ?>
    <span onclick="window.location.href = 'newuser';"><?php echo $autoUserAccount; ?></span>
    <img src="style/Standard/images/infolien.png" alt="">
  </div>

 </div>
</body>
</html>
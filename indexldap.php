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
// Fonction : Page d'index LDAP
// Nom      : indexldap.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
$mode_ldap= 1;
include_once "moteur/prive.php"; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>CERAP</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="shortcut icon" href="style/favicon2.ico" type="image/ico" />

<script language="JavaScript" src="ident.php" type="text/javascript"></script>
<script type="text/javascript">
   window.onload=init;
</script>
<style type="text/css" title="currentStyle">
    @import url('style/Standard.css');
</style>
</head>

<body class='frame_invite' onload='document.ident.login.focus()'>
  <div id="leftside"></div>
  <div id="rightside"></div>
  <div id="wsact">&nbsp;</div>
  <noscript>
    <div class='invite' style='z-index:100;padding-top:20px'>
      <?php echo $_SESSION["ws"]["dia"]["noJS"];?>
    </div>
  </noscript>
  <div id="header"></div>
  <div class='invite' style='padding-top:5px'>
    <form method="post" name='ident' onsubmit='cestparti(); return false;'>
      <input type='hidden' name='actif' value='ok'>
        <div id="message" style="width:220px;margin-left:25px;margin-right:25px;"><?php echo $_SESSION["ws"]["dia"]["ident"]; ?></div>
        <div id="divlogin"><input name="login"   type="text"  id="login"   class="logint"></div>
        <div id="divpass"><input name="pass" type="password" id="pass" class="passwordt"></div>
        <div id="divvalid"><input type="submit" value="<?php echo $_SESSION["ws"]["dia"]["enter"]; ?>" style="border:0;background:transparent;cursor:pointer"></div>
      <div class='copyright' style="font-size:9px">&copy; 2008 - Vivancos Virginie</div>
    </form>
  </div>
</body>
</html>
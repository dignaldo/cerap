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
// Fonction : Page de connexion publique
// Nom      : index_public.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
include_once "moteur/public.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>CERAP</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="shortcut icon" href="style/favicon2.ico" type="image/ico" />

<script language="JavaScript" src="ident.php" type="text/javascript"></script>
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
      <?php echo $_SESSION["ws"]["dia"]["noJS"];?>
    </div>
  </noscript>
  <div id="header"></div>
  <div class='invite' id='invite'>
    <form method="post" name='ident' onsubmit='cestparti(); return false;'>
      <input type='hidden' name='actif' value='ok'>
        <div id="message"><?php echo $_SESSION["ws"]["dia"]["chooseAccount"]; ?></div>
        <div id="divlogin" style="height:35px;margin-top:20px">
          <select name="login" id="login" class="logint" onchange="launch(this.value)" onmouseover="enableS();" onmouseout="disableS();">
            <option value="" style="font-size:12px"><?php echo $_SESSION["ws"]["dia"]["choose"]; ?></option>
            <?php for ($i=0;$i<count($listeCompte);$i++) {
              echo '<option value="'.$listeCompte[$i].'" style="font-size:12px">'.$listeNom[$i].'</option>';
              } ?>
          </select>
        </div>
        <div id="divpass"><input name="pass" type="hidden" id="pass" class="passwordt"></div>
        <div id="divvalid"><input type="submit" value="<?php echo $_SESSION["ws"]["dia"]["enter"]; ?>" style="border:0;background:transparent"></div>
    </form>
  </div>
 </div>
</body>
</html>
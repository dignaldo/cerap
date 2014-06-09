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
// Fonction : Page de création du .htaccess
// Nom      : acces.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
header ("Content-type: text/html; charset=utf-8");
session_start();
include_once "../moteur/fonctions.php";
$racineAppli= getScriptRoot();
$_SESSION["ws"]["authentif"]=0; 

include_once "../lang/English.lang.php";
include_once "../lang/".$_SESSION["ws"]["langAdmin"].".lang.php";

// Si le fichier de protection existe déjà
$chemin_pass = "../wspasswd/.htpasswd";
  if (is_file(blindeChemin($racineAppli."/".$chemin_pass))!==false) {
    echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><head><meta http-equiv="Refresh" content="0;URL=index.php"></head></html>'; 
    exit; }
  

$erreurLog=0; $erreurMP=0; $ident=1;
if ($_REQUEST["actif"]=="ok") {
if (isset($_REQUEST["login"])) $login=$_REQUEST["login"];
                          else $login="";

  // Vérification des login et MP rentrés
  if (strlen($_REQUEST["login"])<=4) { $ident=0; $erreurLog=1; }
  if (($_REQUEST["pass1"]!=$_REQUEST["pass2"])||(strlen($_REQUEST["pass1"])<=4)) { $ident=0; $erreurMP=1; }
  if (preg_match("/[[:punct:][:blank:]]+/",$_REQUEST["login"])==1) { $ident=0; $erreurLog=1; }
  if (preg_match("/[[:punct:][:blank:]]+/",$_REQUEST["pass1"])==1) { $ident=0; $erreurMP=1; }

  // Si OK Création des fichiers htaccess et htpasswd
  if (!is_file(".htaccess")&&($ident==1)) {
    /*$dest = fopen(".htaccess", "w+");
  fwrite($dest, "AuthName 'Webshare login'\nAuthType Basic\n"
               ."AuthUserFile '".dirname(realpath('acces.php'))."\.htpasswd'\n"
         ."Require valid-user");
    fclose ($dest);*/

    $dest = fopen("../wspasswd/.htpasswd", "w+");
  fwrite($dest, trim($_REQUEST["login"]).":".trim($_REQUEST["pass1"]));
    fclose ($dest);

    // Retour à l'index
    header("Location: index.php");
  }
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>CERAP</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- <link rel="shortcut icon" href="../style/favicon2.ico" type="image/ico" />  -->


<style type="text/css" title="currentStyle">
    @import url('../style/Standard.css');
</style>
</head>

<body class='frame_invite' onload='document.ident.login.focus()'>
  <div id="wsact">&nbsp;</div>
  <noscript>
    <div class='invite' style='z-index:100;padding-top:20px'>
      <?php echo $_SESSION["ws"]["dia"]["noJS"];?>
    </div>
  </noscript>
  <div id="header">
  </div>
  <div class='invite'>
    <form method="post" name='ident'>
    <input type='hidden' name='actif' value='ok'>
      <div style="height:28px">&nbsp;</div>
      <div id="divlogin"><input name="login" type="text" id="login" class="logint" <?php if ($erreurLog) echo 'style="border: 1px solid #f00"'; ?> value="<?php echo $login; ?>"></div>
      <div style="height:20px"><input name="pass1" type="password" id="pass1" class="passwordt" <?php if ($erreurMP) echo 'style="border: 1px solid #f00"'; ?>>*</div>
      <div id="divpass"><input name="pass2" type="password" id="pass2" class="passwordt" <?php if ($erreurMP) echo 'style="border: 1px solid #f00"'; ?>>*</div>
      <div id="divvalid"><input type="submit" value="<?php echo $_SESSION["ws"]["dia"]["enter"]; ?>" style="border:0;background:transparent;cursor:pointer"></div>
      <div class='copyright' style='font-size:9px'>&copy; 2009 - Vivancos Virginie</div>
    </form>
  </div>

  <div style='position:absolute;top:24%;left:50%;margin-left:-180px;width:355px;color:#fff;font-size:11px;text-align:justify'>
    <img src='img/verrou2.gif' style='float:left'><?php echo utf8_encode($_SESSION["ws"]["dia"]["protect1"]);?>
  </div>
  <div style='position:absolute;bottom:40px;left:50%;margin-left:-175px;border:1px solid #fff;width:350px;color:#fff;font-size:11px;text-align:justify'>
    <div style='padding:16px'><?php echo utf8_encode($_SESSION["ws"]["dia"]["protect2"]);?></div>
  </div>
</body>
</html>
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
// Fonction : Affichage de la page d'administration
// Nom      : index.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
header ("Content-type: text/html; charset=utf-8");

session_start();
include_once "../moteur/fonctions.php";

$chemin_pass = "../wspasswd/.htpasswd";
if (!is_file($chemin_pass)) $_SESSION["ws"]["authentif"]=1; 

if (isset($_REQUEST["lang"])) $deflang=$_REQUEST["lang"];
                         else $deflang=deflang();
include_once "../lang/English.lang.php";
include_once "../lang/$deflang.lang.php";
$_SESSION["ws"]["langAdmin"]= $deflang;

$_SESSION["ws"]["rlserv"]=-1; 
$_SESSION["ws"]["rlutil"]=-1;

if ($navig=="IE") $opacity="filter:alpha(opacity=10)"; else $opacity="opacity:.1"; 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?php //echo $_SESSION["ws"]["dia"]["adminTitle"];?>CERAP</title>
<!-- <link rel="shortcut icon" href="../style/favicon2.ico" type="image/ico" />  -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style type="text/css" title="currentStyle">
    @import url('admin.css');
</style>
<script src="src/prototype.js" type="text/javascript"></script>
<script src="src/effects.js"   type="text/javascript"></script>
<script src="src/dragdrop.js"  type="text/javascript"></script>
<script src="src/controls.js"  type="text/javascript"></script>
<script language="Javascript">
  
  rlserv=-1; rlutil=-1; oldnum=1; numonglet=1;

<?php
   include_once "ajax.php";
?>
   
</script>
</head>
<body onload='<?php if ($_SESSION["ws"]["authentif"]==1) echo "lancement()"; ?>;corriger();checkProtect();dispImport();' onresize='corriger()' style='overflow:hidden'>
  <div id="leftside"></div>
  <div id="rightside"></div>
  
  <table class='invite' align='center' id='invite'><tr><td style="text-align:center;height:40px"><div id="messageInvit"><?php echo $_SESSION["ws"]["dia"]["ident"]; ?></div></td></tr>
  <form name="ident" onsubmit="authentifie(); return false;">
    <tr><td><input name="login"   type="text"  id="login"   class="logint"></td></tr>
    <tr><td><input name="pass" type="password" id="pass" class="passwordt"></td></tr>
    <tr><td><input type="submit" value="<?php echo $_SESSION["ws"]["dia"]["toValid"] ?>" style="border:0;background:transparent;height:25px;cursor:pointer" ></td></tr>
  </form>
  </table>

  <div class="content">
    <div class="verrou" id="verrou">
      <img src='img/verrou2.gif' class='curseur' onclick='window.location.href="acces.php"' title='<?php echo $_SESSION["ws"]["dia"]["adminNotProtected"] ?>'> 
    </div>
    <div class="idb" id="idb">
    </div>
    <div class="header">
    <form name="cl">
    <select name="lang" size="1" style="width:140px;color:#fff;background:#193055" onchange="window.location.href='index.php?lang='+this.options[this.selectedIndex].value">
      <?php $handle = opendir("../lang/");
        while (false !== ($entry = readdir($handle))) {
          if (strstr($entry,".lang")!==false) { $nomlang = substr($entry,0,strpos($entry,"."));
            $_REQUEST["name"]=1; include "../lang/$entry"; $_REQUEST["name"]=0;
            echo "<option value='$nomlang' ".(($nomlang==$deflang)?"selected":"").">$nameLanguage</option>\n"; }
          }
        closedir($handle);
      ?>
    </select>
    </form>
    </div>
    <div class="wsact"><img src='../moteur/changestyle.php?ww=1'></div>
    <div class="entete" id="entete"><?php echo $_SESSION["ws"]["dia"]["adminHeader"];?></div>
    <div id='message'></div>
    <div class="onglets" id="onglets" style="<?php echo $opacity; ?>"><table style="width:100%" border="0" cellspacing="0" cellpadding="0"><tr>
      <td style="width:16%"><div id="onglet1" class="onglet_on"  onmouseout="if (typeof(msv)!='undefined') msv(this)" onmouseover="if (typeof(mav)!='undefined') mav(this)" onclick="changerub(1)"><?php echo $_SESSION["ws"]["dia"]["adminRub3"];?></div></td>
      <td style="width:16%"><div id="onglet2" class="onglet_off" onmouseout="if (typeof(msv)!='undefined') msv(this)" onmouseover="if (typeof(mav)!='undefined') mav(this)" onclick="changerub(2)"><?php echo $_SESSION["ws"]["dia"]["adminRub2"];?></div></td>
      <td style="width:16%"><div id="onglet3" class="onglet_off" onmouseout="if (typeof(msv)!='undefined') msv(this)" onmouseover="if (typeof(mav)!='undefined') mav(this)" onclick="changerub(3)"><?php echo $_SESSION["ws"]["dia"]["adminRub1"];?></div></td>
      <td style="width:16%"><div id="onglet4" class="onglet_off" onmouseout="if (typeof(msv)!='undefined') msv(this)" onmouseover="if (typeof(mav)!='undefined') mav(this)" onclick="changerub(4)"><?php echo $_SESSION["ws"]["dia"]["adminRub5"];?></div></td>
      <td style="width:16%"><div id="onglet5" class="onglet_off" onmouseout="if (typeof(msv)!='undefined') msv(this)" onmouseover="if (typeof(mav)!='undefined') mav(this)" onclick="changerub(5)"><?php echo $_SESSION["ws"]["dia"]["adminRub4"];?></div></td>
      <td style="width:16%"><div id="onglet6" class="onglet_off" onmouseout="if (typeof(msv)!='undefined') msv(this)" onmouseover="if (typeof(mav)!='undefined') mav(this)" onclick="changerub(6)"><?php echo $_SESSION["ws"]["dia"]["adminRub6"];?></div></td>
      </tr></table>
    </div>
  </div>
  <div class="content2" id="content2" style="<?php echo $opacity; ?>">
    <div class="leftimg" ><img id="cotegauche" style="width: 24px; height: 100%;" src="img/side.gif"/></div>
    <div class="rightimg"><img id="cotedroite" style="width: 20px; height: 100%;" src="img/side.gif"/></div>
    <div id="rub1"></div>
    <div id="rub2"></div>
    <div id="rub3"></div>
    <div id="rub4"></div>
    <div id="rub5"></div>
    <div id="rub6"></div>
  </div>
  <div class='ft' id='ft' style="<?php echo $opacity; ?>">
    <div class='footer'>&copy; 2009 - <?php echo $_SESSION["ws"]["dia"]["msgFooter"];?> - Contact: <a href='mailto:info@webshare.fr' style='color:#fff'>Virginie Vivancos</a></div>
  </div>

</body></html>
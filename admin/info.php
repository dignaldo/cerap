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
// Fonction : Gestion des paramètres BDD
// Nom      : info.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
header ("Content-type: text/html; charset=utf-8");
session_start();
include_once "auth.php";
include_once "admin.php";

if  (!isset($_SESSION["ws"]["langAdmin"])) {
  if (isset($_REQUEST["lang"])) $deflang=$_REQUEST["lang"]; else $deflang=deflang();
  include_once "../lang/$deflang.lang.php";
}
?>

<script language="Javascript">

  valid_get('checkadmin.php',admintest);
  makeRequest('/cgi-bin/upload.cgi?test',checkCGI);                 

// Affichage de la partie Informations
</script>

<div class="page">
<div class='titre'><?php echo $_SESSION["ws"]["dia"]["infoAdmin"];?></div>
<div style="width:560px;font-size:11px;padding-left:12px;">
<?php

echo $_SESSION["ws"]['dia']["propProcess"]." : <b>".get_current_user()."</b>";
echo "<span id='msgadmin'></span><br /><br /><hr width=550>";
exec("convert -version", $out);

if (!function_exists("ini_set")||(ini_get('safe_mode')))   echo $_SESSION["ws"]['dia']["alertfunction1"]."<br />".$_SESSION["ws"]['dia']["alertfunction2"]."<br /><br />";

if (!extension_loaded("zip"))  echo "<img src='img/cancel.gif' style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theExt"]." ZIP ".$_SESSION["ws"]['dia']["notActivated"];
                              else echo "<img src='img/ok.gif'     style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theExt"]." ZIP ".$_SESSION["ws"]['dia']["activated"];
                   echo " ".$_SESSION["ws"]['dia']["libZip"]."<br />";

if (!extension_loaded("gd")) echo "<img src='img/cancel.gif' style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theExt"]." GD ".$_SESSION["ws"]['dia']["notActivated"];
                              else echo "<img src='img/ok.gif'     style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theExt"]." GD ".$_SESSION["ws"]['dia']["activated"];
                   echo " ".$_SESSION["ws"]['dia']["libGD"]."<br />";

if (!extension_loaded("imagick")&&(preg_match("/ImageMagick/",$out[1])==0))
                                   echo "<img src='img/cancel.gif' style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theExt"]." Imagick ".$_SESSION["ws"]['dia']["notActivated"];
                              else echo "<img src='img/ok.gif'     style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theExt"]." Imagick ".$_SESSION["ws"]['dia']["activated"];
                   echo " ".$_SESSION["ws"]['dia']["libGD"]."<br />";

if (!extension_loaded("exif")) echo "<img src='img/cancel.gif' style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theExt"]." Exif ".$_SESSION["ws"]['dia']["notActivated"];
                              else echo "<img src='img/ok.gif'     style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theExt"]." Exif ".$_SESSION["ws"]['dia']["activated"];
                   echo " ".$_SESSION["ws"]['dia']["libExif"]."<br />";

if (!extension_loaded("ftp")) echo "<img src='img/cancel.gif' style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theExt"]." FTP ".$_SESSION["ws"]['dia']["notActivated"];
                              else echo "<img src='img/ok.gif'     style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theExt"]." FTP ".$_SESSION["ws"]['dia']["activated"];
                   echo " ".$_SESSION["ws"]['dia']["libFTP"]."<br />";

if (!extension_loaded("mbstring"))  echo "<img src='img/cancel.gif' style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theExt"]." MBstring ".$_SESSION["ws"]['dia']["notActivated"];
                              else echo "<img src='img/ok.gif'     style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theExt"]." MBstring ".$_SESSION["ws"]['dia']["activated"];
                   echo " ".$_SESSION["ws"]['dia']["libMB"]."<br />";

if (!extension_loaded("xsl")) echo "<img src='img/cancel.gif' style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theExt"]." XSLT ".$_SESSION["ws"]['dia']["notActivated"];
                                else echo "<img src='img/ok.gif'     style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theExt"]." XSLT ".$_SESSION["ws"]['dia']["activated"];
                       echo " ".$_SESSION["ws"]['dia']["libXslt"]."<br />";

/*if (!extension_loaded("pdf")&&!function_exists("PDFlib"))
                                     echo "<img src='img/cancel.gif' style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theExt"]." PDF ".$_SESSION["ws"]['dia']["notActivated"];
                                else echo "<img src='img/ok.gif'     style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theExt"]." PDF ".$_SESSION["ws"]['dia']["activated"];
                       echo " ".$_SESSION["ws"]['dia']["libPdf"]."<br />"; */

if (!function_exists("mail"))        echo "<img src='img/cancel.gif' style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theExt"]." mail ".$_SESSION["ws"]['dia']["notActivated"];
                                else echo "<img src='img/ok.gif'     style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theExt"]." mail ".$_SESSION["ws"]['dia']["activated"];
                       echo " ".$_SESSION["ws"]['dia']["libMail"]."<br /><br />";

?>
<hr width=550>
<div id="cgimsg1" style="display:none"><img src='img/cancel.gif' style='width:11px;height:11px;'> <?php echo $_SESSION["ws"]['dia']["theFile"]." 'upload.cgi' ".$_SESSION["ws"]['dia']["cgiUpNotDetected"]."<br />"; ?></div>
<div id="cgimsg2" style="display:none"><img src='img/cancel.gif' style='width:11px;height:11px;'> <?php echo $_SESSION["ws"]['dia']["theFile"]." 'upload.cgi' ".$_SESSION["ws"]['dia']["cgiUpLimited"]."<br />"; ?></div>
<div id="cgimsg3" style="display:none"><img src='img/ok.gif'     style='width:11px;height:11px;'> <?php echo $_SESSION["ws"]['dia']["theFile"]." 'upload.cgi' ".$_SESSION["ws"]['dia']["cgiUpDetected"]."<br />"; ?></div>
<div id="cgimsg4" style="display:none"><?php echo $_SESSION["ws"]['dia']["limitTaille"].ini_get('upload_max_filesize').$_SESSION["ws"]["dia"]["octet"].".<br />"; ?></div>
<div id="cgimsg5" style="display:none"><?php echo $_SESSION["ws"]['dia']["unlimitedUpload"]."<br />"; ?></div>
<br />
<hr width=550>
<?php

if (!is_dir("../wstemp/")) mkdir("../wstemp/");
chmod("../wstemp/", 0777);

if (!is_dir("../wstemp/"))    echo "<img src='img/cancel.gif' style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theDir"]." 'wstemp' ".$_SESSION["ws"]['dia']["notAccessible"]."<br />";
else { if (($test = @fopen("../wstemp/stats_test.txt", 'w+'))===false)
                              echo "<img src='img/cancel.gif' style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theDir"]." 'wstemp' ".$_SESSION["ws"]['dia']["accessProtect"]."<br />";
              else { echo "<img src='img/ok.gif'     style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theDir"]." 'wstemp' ".$_SESSION["ws"]['dia']["isAccessible"]."<br />";
                     fclose ($test); unlink("../wstemp/stats_test.txt"); }
}

if (!is_dir("../wspasswd/")) mkdir("../wspasswd/");
chmod("../wspasswd/", 0777);

if (!is_dir("../wspasswd/"))  echo "<img src='img/cancel.gif' style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theDir"]." 'wspasswd' ".$_SESSION["ws"]['dia']["notAccessible"]."<br />";
else { if (($test = @fopen("../wspasswd/stats_test.txt", 'w+'))===false)
                              echo "<img src='img/cancel.gif' style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theDir"]." 'wspasswd' ".$_SESSION["ws"]['dia']["accessProtect"]."<br />";
              else { echo "<img src='img/ok.gif'     style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theDir"]." 'wspasswd' ".$_SESSION["ws"]['dia']["isAccessible"]."<br />";
                     fclose ($test); unlink("../wspasswd/stats_test.txt"); }
}

if (!is_dir("../logs/")) mkdir("../logs/");
chmod("../logs/", 0777);

if (!is_dir("../logs/"))      echo "<img src='img/cancel.gif' style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theDir"]." 'logs' ".$_SESSION["ws"]['dia']["notAccessible"]."<br />";
else { if (($test = @fopen("../logs/stats_test.txt", 'w+'))===false)
                              echo "<img src='img/cancel.gif' style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theDir"]." 'logs' ".$_SESSION["ws"]['dia']["accessProtect"]."<br />";
              else { echo "<img src='img/ok.gif'     style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theDir"]." 'logs' ".$_SESSION["ws"]['dia']["isAccessible"]."<br />";
                     fclose ($test); unlink("../logs/stats_test.txt"); }
}
if (!is_dir("../plugins/"))   echo "<img src='img/cancel.gif' style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theDir"]." 'plugins' ".$_SESSION["ws"]['dia']["dontExist"]."<br />";
                       else { echo "<img src='img/ok.gif'     style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theDir"]." 'plugins' ".$_SESSION["ws"]['dia']["modulesDetected"]."<br />"; ?>
     <select name="view1" size="1" style="width:120px;margin-left:15px">
      <?php $handle = opendir("../plugins/");
        while (false !== ($entry = readdir($handle))) {
          if (is_dir("../plugins/".$entry)&&($entry!="..")&&($entry!=".")) { $nomaction = basename($entry);
            echo "<option value='$nomaction'>$nomaction</option>\n"; }
          }
        closedir($handle);
      ?>
    </select><br /><br />
<?php }

if (!is_dir("../lang/"))      echo "<img src='img/cancel.gif' style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theDir"]." 'lang' ".$_SESSION["ws"]['dia']["dontExist"]."<br />";
                       else { echo "<img src='img/ok.gif'     style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theDir"]." 'lang' ".$_SESSION["ws"]['dia']["langDetected"]."<br />"; ?>
     <select name="view2" size="1" style="width:120px;margin-left:15px">
      <?php $handle = opendir("../lang/");
        while (false !== ($entry = readdir($handle))) {
          if (strstr($entry,".lang")!==false) { $nomlang = substr($entry,0,strpos($entry,"."));
            $_REQUEST["name"]=1; include "../lang/$entry"; $_REQUEST["name"]=0;
            echo "<option value='$nomlang'>$nameLanguage</option>\n"; }
          }
        closedir($handle);
      ?>
    </select><br /><br />
<?php }

if (!is_dir("../style/"))     echo "<img src='img/cancel.gif' style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theDir"]." 'style' ".$_SESSION["ws"]['dia']["dontExist"]."<br />";
                       else { echo "<img src='img/ok.gif'     style='width:11px;height:11px;'> ".$_SESSION["ws"]['dia']["theDir"]." 'style' ".$_SESSION["ws"]['dia']["styleDetected"]."<br />"; ?>
     <select name="view3" size="1" style="width:120px;margin-left:15px">
      <?php $handle = opendir("../style/");
        while (false !== ($entry = readdir($handle))) {
          if (is_dir("../style/".$entry)&&($entry!="..")&&($entry!=".")) { $nomaction = basename($entry);
            echo "<option value='$nomaction'>$nomaction</option>\n"; }
          }
        closedir($handle);
      ?>
    </select><br /><br />
    <hr width=550>
<?php }

if ($l_mysql->test())
       echo "<img src='img/ok.gif' style='width:11px;height:11px;'>     ".$_SESSION["ws"]["dia"]["connectedDB"];
  else echo "<img src='img/cancel.gif' style='width:11px;height:11px;'> ".$_SESSION["ws"]["dia"]["notConnected"];
?>
  <br /><br /><hr width=550> 
<?php echo "<img src='disque.php' style='margin-left:80px;'>"; ?>
  <br/><br/><hr width=550> </div>
  <iframe id="apercu" name="apercu" src="phpinfo.php" frameborder="0" allowtransparency="false" scrolling="yes" style="width:560px;height:450px;overflow-x:hidden;">
  </iframe></div>
  <br /><br />
</div>
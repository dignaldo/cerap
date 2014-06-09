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
// Fonction : Gestion des associations et modules
// Nom      : associations.php
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
var count=0;
var selectbox=' size="1" style="width:110px" onchange="">'
   +"<option value='1'><?php echo $_SESSION["ws"]['dia']['openFile'];?></option>"
   +"<option value='2'><?php echo $_SESSION["ws"]['dia']['openFileWith'];?></option>"
   +"<option value='3'><?php echo $_SESSION["ws"]['dia']['saveFile'];?></option>"
   +"<option value='4'><?php echo $_SESSION["ws"]['dia']['toBrowse'];?></option>"
   +"<option value='5'><?php echo $_SESSION["ws"]['dia']['toVisit'];?></option>"
   +"<option value='6'><?php echo $_SESSION["ws"]['dia']['toView'];?></option>"
   +"<option value='7'><?php echo $_SESSION["ws"]['dia']['toWatch'];?></option>"
   +"<option value='8'><?php echo $_SESSION["ws"]['dia']['toListen'];?></option>"
   +"<option value='9'><?php echo $_SESSION["ws"]['dia']['toPrint'];?></option>"
   +"<option value='10'><?php echo $_SESSION["ws"]['dia']['toDezip'];?></option>"
   +"<option value='11'><?php echo $_SESSION["ws"]['dia']['toEdit'];?></option>"
   +"<option value='12'><?php echo $_SESSION["ws"]['dia']['toModify'];?></option>"
   +'<option value="-1">--------------------</option>'

      <?php $handle = opendir("../plugins/");
        while (false !== ($entry = readdir($handle))) {
          if (is_dir("../plugins/".$entry)&&($entry!="..")&&($entry!=".")) { $nomaction = basename($entry);
            echo "+'<option value=\"$nomaction\">$nomaction</option>'"; }
          }
        closedir($handle);
      ?>
    +'</select>';


  function chargeligne() {
  <?php foreach ($assoc as $nom => $valeur) {
      $datas= explode("|",$valeur); $i++;
      echo 'ajouterligne("../style/Standard/icones/minis/'.$nom.'","'.$nom.'","'.$datas[0].'","'.$datas[1].'","'.$datas[2].'","'.$datas[3].'");'."\n";
    } ?>
    afficheicn();
  }

chargeligne();

</script>

<div class='titre'><?php echo $_SESSION["ws"]["dia"]["moduAdmin"];?></div>
 <table width="540" border="0" align="center" style="margin-bottom:20px">
   <tr><td style='color:#aaa;white-space:nowrap;vertical-align:top'><img src='../style/Standard/images/css.png'   style='vertical-align:middle'> <?php echo $_SESSION["ws"]["dia"]["newStyle"];?></td>
       <td style='color:#aaa;white-space:nowrap;vertical-align:top'><img src='../style/Standard/images/admin.png' style='vertical-align:middle'> <?php echo $_SESSION["ws"]["dia"]["newModule"];?></td>
       <td style='color:#aaa;white-space:nowrap;vertical-align:top;text-align:center'><div id="idVersion"><?php echo $_SESSION["ws"]["dia"]["toSearch"]." ".$_SESSION["ws"]["dia"]["newVersion"]; ?><div class='bouton5' onclick='checkVersion();' 
       style='text-align:center;'><?php echo $_SESSION["ws"]["dia"]["toVerify"];?></div></div></td></tr>
 </table>
<div class='titre'><?php echo $_SESSION["ws"]["dia"]["assoAdmin"];?></div>
<form name="asso" method="post" action="">
  <table width="580" border="0" align="center" id="list_body">
  <tbody>
  <input type='hidden' name='validation' value='asso'>
  <input type='hidden' name='chemin' value='<?php echo $chemin?>'>
  <tr><td>&nbsp;</td>
      <td><?php echo $_SESSION["ws"]["dia"]["extension"];?></td>
      <td>&nbsp;</td>
      <td><?php echo $_SESSION["ws"]["dia"]["exttype"];?></td>
      <td><?php echo $_SESSION["ws"]["dia"]["extmime"];?></td>
      <td style="white-space:nowrap"><?php echo $_SESSION["ws"]["dia"]["extact1"];?></td>
      <td style="white-space:nowrap"><?php echo $_SESSION["ws"]["dia"]["extact2"];?></td></tr>
  </tr></tbody></table>

  <table width="580" border="0" align="center">
  <tr><td align=left style='height:40px'>
      <div class='bouton4' onclick="ajouterligne('vide','','','','0','0')"><?php echo $_SESSION["ws"]["dia"]["toAdd"];?></div></td>
    <td align=right style='height:40px'>
      <div class='bouton2' onclick="completeVal();valid(document.asso,'valider.php',retinfos);"><?php echo $_SESSION["ws"]["dia"]["toValid"];?></div>
  </td></tr></table>

</form>
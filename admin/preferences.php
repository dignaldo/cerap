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
// Nom      : preferences.php
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
  wsbase = new Array();
  
<?php
  // ==== Chargement des données BDD ====
    echo "wsbase= new Array();\n";
    foreach ($wsbase as $nom => $valeur) {
      echo "wsbase['".trim($nom)."']= '".trim($valeur)."';\n";
    }
    $compteur++;

    $mem= ""; $setmem="";
    $mem= ini_get('memory_limit');
    if (preg_match("/cgi/",strtolower(php_sapi_name()))==0) $setmem="1";
    $disabl="disabled='true' style='width:140px;background:#FBEDD4'";
    $timeMax= "";
    $execMax= ini_get('max_execution_time');
    $postMax= ini_get('post_max_size');
    $uploMax= ini_get('upload_max_filesize');
    $lifeMax= ini_get('session.gc_maxlifetime');
    if (ini_get('max_input_time')!=-1) $timeMax= ini_get('max_input_time');

  if (($lines = file("../moteur/.htaccess", "w+")) !== FALSE) {
    foreach ($lines as $line_num => $line) {
      if ( preg_match("/^php_value ([[:alnum:]\._]+) ([[:alnum:]]+)/", rtrim($line),$paramLine)==1 ) {
      if ($paramLine[1]=="max_execution_time")     $execMax=$paramLine[2];
      if ($paramLine[1]=="post_max_size")          $postMax=$paramLine[2];
      if ($paramLine[1]=="max_input_time")         $timeMax=$paramLine[2];
      if ($paramLine[1]=="upload_max_filesize")    $uploMax=$paramLine[2];
      if ($paramLine[1]=="session.gc_maxlifetime") $lifeMax=$paramLine[2];
      }
      }
    }

    $postmax=conversion($postMax);
    $upmax  =conversion($uploMax);

    $valTime= 999999999;
    if ((ini_get('max_execution_time')<$valTime)    &&(ini_get('max_execution_time')>0))     $valTime= ini_get('max_execution_time');
    if ((ini_get('max_input_time')<$valTime)        &&(ini_get('max_input_time')>0))         $valTime= ini_get('max_input_time');
    if ((ini_get('session.gc_maxlifetime')<$valTime)&&(ini_get('session.gc_maxlifetime')>0)) $valTime= ini_get('session.gc_maxlifetime');
    $valMemo= 999999999;
    //if ((intval($mem)<$valMemo)                     &&(intval($mem)>0))                      $valMemo= intval($mem);
    if (($postmax<$valMemo)                         &&($postmax>0))                          $valMemo= $postmax;
    if (($upmax<$valMemo)                           &&($upmax>0))                            $valMemo= $upmax;

?>

actuBase(); 

// Affichage de la partie BDD
</script>

<div class="page">

<div class='titre'><?php echo $_SESSION["ws"]["dia"]["baseAdmin"];?></div>

<form name="adminBase" method="post" action="">
  <table width="100%" border="0" align="center">
  <input type='hidden' name='validation' value='base'>
  <input type='hidden' name='chemin' value='<?php echo $chemin?>'>
    <tr><td><?php echo $_SESSION["ws"]["dia"]["serverBase"];?> </td><td><input name="serveurBase" type="text" value="localhost"    style="width:140px" ></td>
        <td><?php echo $_SESSION["ws"]["dia"]["loginBase"];?>  </td><td><input name="loginBase"   type="text" value="root"         style="width:140px" ></td></tr>
    <tr><td><?php echo $_SESSION["ws"]["dia"]["passBase"];?>   </td><td><input name="passBase"    type="password" value="passBase" style="width:140px" ></td>
        <td><?php echo $_SESSION["ws"]["dia"]["tableBase"];?>  </td><td><input name="tableBase"   type="text" value="mysql"        style="width:140px" ></td></tr>

    <tr><td colspan="3">
    <?php
      echo '<span style="color:#fff;background:'.($l_mysql->test()?"#090":"#900").';padding-left:16px;padding-right:16px;">&nbsp;</span>';
      echo '<span style="width:380px">&nbsp;';
      if ($l_mysql->test()) echo $_SESSION["ws"]["dia"]["connectedDB"]; else echo $_SESSION["ws"]["dia"]["notConnected"];
      echo "</span><br/>";
      if (!$l_mysql->test()) echo "<div></div>";?></td>
        <td align=right>
        <div class='bouton3' onclick="if ((document.adminBase.loginBase.value!='')||(document.adminBase.serveurBase.value!='')) { valid(document.adminBase,'valider.php',retinfospref); }"><?php echo $_SESSION["ws"]["dia"]["toConnect"];?></div></td></tr></table>

<div class='titre'><?php echo $_SESSION["ws"]["dia"]["prefAdmin"];?></div>
  <input name="dynWin"    type="hidden" value="1">
  <table width="100%" border="0" align="center">
      <table style="width:550px" border="0">
    <tr><td><?php echo $_SESSION["ws"]["dia"]["frameTitle"];?>   </td><td colspan="2"><input name="pageTitle" type="text" value="Webshare" style="width:400px" ></td></tr>
    <tr><td><nobr><input name="prevWeb"   type="checkbox" class='checkbox' value="1" style="width:14px" checked ><?php echo $_SESSION["ws"]["dia"]["previewWeb"];?></nobr></td>
        <td><nobr><input name="prevAct"   type="checkbox" class='checkbox' value="1" style="width:14px" checked ><?php echo $_SESSION["ws"]["dia"]["previewAct"];?></nobr></td>
        <td><nobr><input name="sendMail"  type="checkbox" class='checkbox' value="1" style="width:14px"         ><?php echo $_SESSION["ws"]["dia"]["authSendMail"];?></span></nobr></td></tr>
    <tr><td><nobr><input name="activeLog" type="checkbox" class='checkbox' value="1" style="width:14px" checked ><?php echo $_SESSION["ws"]["dia"]["logAct"];?></nobr></td>
        <td><nobr><input name="compPath"  type="checkbox" class='checkbox' value="1" style="width:14px"         ><?php echo $_SESSION["ws"]["dia"]["completePath"];?></nobr></td>
        <td><nobr><input name="arboLink"  type="checkbox" class='checkbox' value="1" style="width:14px"         ><?php echo $_SESSION["ws"]["dia"]["arboLink"];?></nobr></td></tr>
    <tr><td><nobr><input name="effectAct" type="checkbox" class='checkbox' value="1" style="width:14px" checked ><?php echo $_SESSION["ws"]["dia"]["effectAct"];?></nobr></td>
        <td><nobr><input name="vClock"    type="checkbox" class='checkbox' value="1" style="width:14px" checked ><?php echo $_SESSION["ws"]["dia"]["viewClock"];?></nobr></td>
        <td><nobr><input name="sepAdr"    type="checkbox" class='checkbox' value="1" style="width:14px" checked ><?php echo $_SESSION["ws"]["dia"]["sepAdr"];?> <img src='../style/Standard/images/miniopen.png' style='vertical-align:middle'></nobr></td></tr>
    <tr><td colspan="2">
            <nobr><input name="linkWin"   type="checkbox" class='checkbox' value="1" style="width:14px"         ><?php echo $_SESSION["ws"]["dia"]["openLinkinNewWin"];?></nobr></td>
        <td>
            <nobr><input name="autoUserAcc" type="checkbox" class='checkbox' value="1" style="width:14px"       ><?php echo $_SESSION["ws"]["dia"]["accountUser"];?></nobr></td></tr>
      </table>

    </td></tr>
    <tr><td colspan="4">
     <table style='width:100%'><tr>
        <td style='width:14%;text-align:center;white-space:nowrap'><?php echo $_SESSION["ws"]["dia"]["leftClic"];?></td><td><select name="clicl" size="1" style="width:120px">
            <option value="0" selected><?php echo $_SESSION["ws"]["dia"]["open"];?></option>
            <option value="1"><?php echo $_SESSION["ws"]["dia"]["menuContext"];?></option>
          </select></td>
        <td style='width:14%;text-align:center;white-space:nowrap'><?php echo $_SESSION["ws"]["dia"]["rightClic"];?></td><td><select name="clicr" size="1" style="width:120px">
            <option value="1" selected><?php echo $_SESSION["ws"]["dia"]["menuContext"];?></option>
          </select></td>
        <td style='width:14%;text-align:center;white-space:nowrap'><?php echo $_SESSION["ws"]["dia"]["doubleClic"];?></td><td><select name="clicd" size="1" style="width:120px">
            <option value="0"><?php echo $_SESSION["ws"]["dia"]["open"];?></option>
            <option value="1" selected><?php echo $_SESSION["ws"]["dia"]["menuContext"];?></option>
            <option value="2"><?php echo $_SESSION["ws"]["dia"]["property"];?></option>
          </select></td></tr>
        <tr><td colspan="3" align="right"><?php echo $_SESSION["ws"]["dia"]["diapoSpeed"];?></td><td colspan="2"><input name="diapoSp" type="text" value="5000" style="width:120px">&nbsp;ms</td>
            <td align="right"><div class='bouton2' onclick="valid(document.adminBase,'valider.php',retinfospref)"><?php echo $_SESSION["ws"]["dia"]["toValid"];?></div>
      </table>
      </td></tr>
    </td></tr>
    </table>
    
    <hr width=550>
    <table style='width:100%'>
    <tr><td><?php echo $_SESSION["ws"]["dia"]["memoMax"];?> (M<?php echo $_SESSION["ws"]["dia"]["octet"];?>) </td><td><input name="memoMax" type="text" value="<?php echo $mem; ?>" <?php if ($mem=="") echo $disabl; ?> style="width:140px"></td>
        <td><?php echo $_SESSION["ws"]["dia"]["execMax"];?> (s)                                        </td><td><input name="execMax" type="text" value="<?php echo $execMax; ?>" <?php if ($setmem=="") echo $disabl; ?> style="width:140px" ></td></tr>
    <tr><td><?php echo $_SESSION["ws"]["dia"]["postMax"];?> (M<?php echo $_SESSION["ws"]["dia"]["octet"];?>) </td><td><input name="postMax" type="text" value="<?php echo $postMax; ?>" <?php if ($setmem=="") echo $disabl; ?> style="width:140px" ></td>
        <td><?php echo $_SESSION["ws"]["dia"]["timeMax"];?> (s)                                        </td><td><input name="timeMax" type="text" value="<?php echo $timeMax; ?>" <?php if ($setmem=="") echo $disabl; ?> style="width:140px" ></td></tr>
    <tr><td><?php echo $_SESSION["ws"]["dia"]["uploMax"];?> (M<?php echo $_SESSION["ws"]["dia"]["octet"];?>) </td><td><input name="uploMax" type="text" value="<?php echo $uploMax; ?>" <?php if ($setmem=="") echo $disabl; ?> style="width:140px" ></td>
        <td><?php echo $_SESSION["ws"]["dia"]["lifeMax"];?> (s)                                        </td><td><input name="lifeMax" type="text" value="<?php echo $lifeMax; ?>" <?php if ($setmem=="") echo $disabl; ?> style="width:140px" ></td></tr>
    <tr><td colspan="4"><br /><?php echo $_SESSION["ws"]["dia"]["tip1"]." $valTime ".$_SESSION["ws"]["dia"]["tip2"]." ".intval($valMemo/(1024*1024))." M".$_SESSION["ws"]["dia"]["octet"]."."; ?>
                        <?php if ($setmem=="") echo $_SESSION["ws"]["dia"]["msgVarNotModif1"].$_SESSION["ws"]["dia"]["msgVarNotModif2"];
                                          else echo $_SESSION["ws"]["dia"]["msgVarModifiable1"].$_SESSION["ws"]["dia"]["msgVarModifiable2"]; ?></td></tr>
    <tr><td colspan="4" align="right">
      <div class='bouton2' onclick="valid(document.adminBase,'valider.php',retinfospref)"><?php echo $_SESSION["ws"]["dia"]["toValid"];?></div></td>
    </tr>
   </table>

</form></div>
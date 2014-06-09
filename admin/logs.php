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

if  (!isset($_SESSION["ws"]["langAdmin"])) {
  if (isset($_REQUEST["lang"])) $deflang=$_REQUEST["lang"]; else $deflang=deflang();
  include_once "../lang/$deflang.lang.php";
}
?>

<script language="Javascript">
  valjour="";
  
<?php

  if (!isset($_REQUEST["valid"])) {
    $jourd= $jourf= intval(date("j"));
    $moisd= $moisf= intval(date("n"));
    $anneed=$anneef=intval(date("Y"));
    $iduser="0";
    $idaction="0";
    $idresult="0";
  } else {
    $jourd= $_REQUEST["jourd"]; $jourf= $_REQUEST["jourf"];
    $moisd= $_REQUEST["moisd"]; $moisf= $_REQUEST["moisf"];
    $anneed=$_REQUEST["anneed"];$anneef=$_REQUEST["anneef"];
    $iduser=$_REQUEST["iduser"];
    $idaction=$_REQUEST["idaction"];
    $idresult=$_REQUEST["idresult"];
  }
?>

  creadate();
  
// Affichage de la partie Logs
</script>

<div class="page">
<div class='titre'><?php echo $_SESSION["ws"]["dia"]["logsAdmin"];?></div>

<?php if (1==1) { ?>

<?php if ($l_mysql->test()) { ?>

<form name="validlogs" method="post" action="">
<input type="hidden" name="valid" value="ok">
  <table width="100%" border="0" align="center"><tr><td colspan="2" align="center">
<?php echo $_SESSION["ws"]["dia"]["viewAction"];?> <select name="idaction" id="idaction" style="width:80px">
   <option value="0" selected><?php echo $_SESSION["ws"]["dia"]["allf"];?></option>
   <option value="3"><?php echo $_SESSION["ws"]["dia"]["openFile"];?></option>
  <option value="14"><?php echo $_SESSION["ws"]["dia"]["saveFile"];?></option>
   <option value="1"><?php echo $_SESSION["ws"]["dia"]["toBrowse"];?></option>
   <option value="2"><?php echo $_SESSION["ws"]["dia"]["toExplore"];?></option>
  <option value="23"><?php echo $_SESSION["ws"]["dia"]["toVisit"];?></option>
   <option value="4"><?php echo $_SESSION["ws"]["dia"]["toView"];?></option>
   <option value="5"><?php echo $_SESSION["ws"]["dia"]["toWatch"];?></option>
  <option value="24"><?php echo $_SESSION["ws"]["dia"]["toListen"];?></option>
  <option value="25"><?php echo $_SESSION["ws"]["dia"]["toPrint"];?></option>
   <option value="6"><?php echo $_SESSION["ws"]["dia"]["toUpload"];?></option>
   <option value="7"><?php echo $_SESSION["ws"]["dia"]["newDir"];?></option>
   <option value="8"><?php echo $_SESSION["ws"]["dia"]["newLink"];?></option>
   <option value="9"><?php echo $_SESSION["ws"]["dia"]["newTxt"];?></option>
  <option value="26"><?php echo $_SESSION["ws"]["dia"]["toCut"];?></option>
  <option value="27"><?php echo $_SESSION["ws"]["dia"]["toCopy"];?></option>
  <option value="12"><?php echo $_SESSION["ws"]["dia"]["toPaste"];?></option>
  <option value="28"><?php echo $_SESSION["ws"]["dia"]["toMove"];?></option>
  <option value="13"><?php echo $_SESSION["ws"]["dia"]["toDelete"];?></option>
  <option value="10"><?php echo $_SESSION["ws"]["dia"]["toChmod"];?></option>
  <option value="15"><?php echo $_SESSION["ws"]["dia"]["toSearch"];?></option>
  <option value="11"><?php echo $_SESSION["ws"]["dia"]["toRename"];?></option>
  <option value="17"><?php echo $_SESSION["ws"]["dia"]["toComment"];?></option>
  <option value="18"><?php echo $_SESSION["ws"]["dia"]["toEdit"];?></option>
  <option value="19"><?php echo $_SESSION["ws"]["dia"]["toModify"];?></option>
  <option value="22"><?php echo $_SESSION["ws"]["dia"]["toZip"];?></option>
  <option value="16"><?php echo $_SESSION["ws"]["dia"]["toDezip"];?></option>
  <option value="20"><?php echo $_SESSION["ws"]["dia"]["toConnect"];?></option>
  <option value="21"><?php echo $_SESSION["ws"]["dia"]["toQuit"];?></option>

</select> <?php echo $_SESSION["ws"]["dia"]["madeBy"];?> <select name="iduser" id="iduser" style="width:80px">
  <option value='' selected><?php echo $_SESSION["ws"]["dia"]["all"];?></option>
  <?php $compte=1; foreach ($visiteurs as $tabl => $tablvar) {
  echo "<option value='".$tabl."' ".(($_REQUEST["iduser"]==$compte)?"selected":"").">$tabl</option>\n"; $compte++; }
  ?>
</select></select> <?php echo $_SESSION["ws"]["dia"]["withResult"];?> <select name="idresult" id="idresult" style="width:80px">
  <option value="0" selected><?php echo $_SESSION["ws"]["dia"]["resultInd"];?></option>
  <option value="1"><?php echo $_SESSION["ws"]["dia"]["resultPos"];?></option>
  <option value="-1"><?php echo $_SESSION["ws"]["dia"]["resultNeg"];?></option>

</select></td></tr>
<tr><td style="width:500px;white-space:nowrap" align="center"><?php echo $_SESSION["ws"]["dia"]["fromDate"];?> <select name="jourd" id="jourd">
<?php for ($i=1;$i<=31;$i++) {
  echo "<option value='$i' ".($jourd==$i?"selected":"").">$i</option>"; } ?>

</select><select name="moisd" id="moisd">
<?php $i=0; foreach ($_SESSION["ws"]["dia"]["listeMois"] as $nomvar) {
  echo "<option value='$i' ".($moisd==$i?"selected":"").">$nomvar</option>"; $i++; } ?>

</select><select name="anneed" id="anneed">
<?php for ($i=3;$i>=0;$i--) { $anneer=(date("Y")-$i);
  echo "<option value='$anneer' ".($anneed==$anneer?"selected":"").">$anneer</option>"; } ?>

</select> <?php echo $_SESSION["ws"]["dia"]["toDate"];?> <select name="jourf" id="jourf">
<?php for ($i=1;$i<=31;$i++) {
  echo "<option value='$i' ".($jourf==$i?"selected":"").">$i</option>"; } ?>

</select><select name="moisf" id="moisf">
<?php $i=0; foreach ($_SESSION["ws"]["dia"]["listeMois"] as $nomvar) {
  echo "<option value='$i' ".($moisf==$i?"selected":"").">$nomvar</option>"; $i++; } ?>

</select><select name="anneef" id="anneef">
<?php for ($i=3;$i>=0;$i--) { $anneer=(date("Y")-$i);
  echo "<option value='$anneer' ".($anneef==$anneer?"selected":"").">$anneer</option>"; } ?>

</select>
</td><td style="width:60px">
  <div class='bouton2' align='right' onclick="valid(document.validlogs,'chargelog.php',afficheLog);"><?php echo $_SESSION["ws"]["dia"]["toValid"];?></div>
</td></tr></table>

<div id="logTabl"></div>
</form>
<?php } else {
 if (is_dir("../logs/")) {
?>

<form name="validlogs" method="post" action="">
<input type="hidden" name="valid" value="ok">
<input type="hidden" name="valeurjour" value="">
  <table width="100%" border="0" align="center"><tr>
  <td style="width:500px;" align="center"><?php echo $_SESSION["ws"]["dia"]["ofDate"];?> <select name="jourd" id="jourd" onchange="creadate();">
<?php for ($i=1;$i<=31;$i++) {
  echo "<option value='".(($i<10)?"0":"")."$i' ".($jourd==$i?"selected":"").">$i</option>"; } ?>

</select><select name="moisd" id="moisd" onchange="creadate();">
<?php $i=0; foreach ($_SESSION["ws"]["dia"]["listeMois"] as $nomvar) {
  echo "<option value='".(($i<10)?"0":"")."$i' ".($moisd==$i?"selected":"").">$nomvar</option>"; $i++; } ?>

</select><select name="anneed" id="anneed" onchange="creadate();">
<?php for ($i=3;$i>=0;$i--) { $anneer=(date("Y")-$i);
  echo "<option value='$anneer' ".($anneed==$anneer?"selected":"").">$anneer</option>"; } ?>

</select>
</td><td style="width:60px">
  <div class='bouton2' align='right' onclick="valid(document.validlogs,'chargefichier.php',afficheLog);"><?php echo $_SESSION["ws"]["dia"]["toValid"];?></div>
</td></tr></table>

<div id="logTabl"></div>
</form>

<?php
    } else { echo '<form name="validlogs" method="post"><table width="100%" border="0"><tr><td align="center">'.$_SESSION["ws"]["dia"]["noLog"]."</td></tr></table></form>"; }

  }
} ?>
</div>
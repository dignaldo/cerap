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
include_once "admin.php";

$dated="$_REQUEST[anneed]-".(($_REQUEST["moisd"]<10)?"0":"")."$_REQUEST[moisd]-".(($_REQUEST["jourd"]<10)?"0":"")."$_REQUEST[jourd]";
$datef="$_REQUEST[anneef]-".(($_REQUEST["moisf"]<10)?"0":"")."$_REQUEST[moisf]-".(($_REQUEST["jourf"]<10)?"0":"")."$_REQUEST[jourf]";

$requete = "SELECT iddate,verbose,username,path,file,content,ipadr FROM wslog WHERE DATEDIFF('$dated',iddate)<=0 AND DATEDIFF('$datef',iddate)>=0 ";
if (isset($_REQUEST["iduser"])&&($_REQUEST["iduser"]!=""))    $requete.=" AND username='$_REQUEST[iduser]' ";
if (isset($_REQUEST["idresult"])&&($_REQUEST["idresult"]!=0)) $requete.=" AND idresult='$_REQUEST[idresult]' ";
if (isset($_REQUEST["idaction"])&&($_REQUEST["idaction"]!=0)) $requete.=" AND idaction='$_REQUEST[idaction]' ";
$requete.="ORDER BY iddate ASC";

$result = $l_mysql->request_result($requete);
if (!empty($result)) {
  
  echo "<table width='100%' cellspacing='0' cellpadding='0' align='center'>";
  echo "<tr style='background:#6f8f9f;color:#fff;height:18px'><td><b>".$_SESSION["ws"]["dia"]["DateTimeOriginal"]."</b></td>"
      ."<td><b>".$_SESSION["ws"]["dia"]["user"]." / IP </b></td>"
      ."<td><b>".$_SESSION["ws"]["dia"]["details"]."</b></td>"
      ."<td><b>".$_SESSION["ws"]["dia"]["rep"]." / ".$_SESSION["ws"]["dia"]["adminRub5"]."</b></td></tr>";

  $coul="#FBEDD4";
  foreach($result as $data) {
     if ($coul=="#FBEDD4") $coul="#FFF"; else $coul="#FBEDD4";
     echo "<tr style='background:$coul;height:28px'><td style='white-space:nowrap'>$data[iddate]</td><td>$data[username]<br />$data[ipadr]</td><td>$data[verbose]&nbsp;</td><td>$data[path]<br />$data[content]&nbsp;</td></tr>";
  }
  echo "</table>";
}
$l_mysql->disconnect();
?>


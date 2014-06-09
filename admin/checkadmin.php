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
// Fonction : Test des droits serveurs
// Nom      : checkadmin.php
// Version  : 0.8.2
// Date     : 27/04/08
// =======================================================================
header ("Content-type: text/html; charset=utf-8");
session_start();
include_once "../moteur/fonctions.php";
$racineAppli= getScriptRoot();
$chemin_pass = "../wspasswd/.htpasswd";
  
$message= "<br /><img src='img/cancel.gif' style='width:11px;height:11px;'><span style='font-weight:bold;color:#e00'> ".$_SESSION["ws"]['dia']["limitProcess"]."</span><br /> ".$_SESSION["ws"]['dia']["alertfunction2"]." (".$_SESSION["ws"]['dia']["readOnly"].")";
$ok=1;

if (isset($_REQUEST["access"])&&!empty($_REQUEST["access"])) { 

  if (basename($racineAppli)=="admin")
    echo "nr"; exit;

  if (is_file(blindeChemin($racineAppli."/".$chemin_pass))!==false) {
    echo "ok"; exit;
  }

} else {

  if (is_dir($racineAppli)) {
      if (@mkdir(blindeChemin($racineAppli."/wstest"))===false) $ok=0;
      if (($test=@fopen(blindeChemin($racineAppli."/wstest/wstest.tmp"), "w+"))===false) $ok=0;
      else { fclose ($test);
             unlink (blindeChemin($racineAppli."/wstest/wstest.tmp"));
             rmdir  (blindeChemin($racineAppli."/wstest"));
      }
      if ($ok==1) $message= ""; 
  }
  echo $message;
}
?>
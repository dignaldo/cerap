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
// Fonction : Test d'un partage
// Nom      : checkconnexion.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
header ("Content-type: text/html; charset=utf-8");
session_start();
include_once "../moteur/fonctions.php";
include_once "admin.php";
$racineAppli =  dirname(getScriptRoot());
$racineDoc= "$racineAppli/Documents/";
 
$ok=1;
if ($_REQUEST["newPass"]=="0") $passServeur= $_REQUEST["passServeur"];
                          else $passServeur= base64_decode($_REQUEST["newPass"]);

if ($_REQUEST["typeServeur"]==1) {
    $chemintest= blindeChemin($_REQUEST["rootServeur"]."/".$_REQUEST["repServeur"]);
    $chemintest= str_replace("\$mydoc\$",$racineDoc,$chemintest);

  if (is_dir($chemintest)) {
      if (@mkdir(blindeChemin($chemintest."/wstest"))===false) $ok=1;
      if (($test=@fopen(blindeChemin($chemintest."/wstest/wstest.tmp"), "w+"))===false) $ok=0;
      else { fclose ($test);
             unlink (blindeChemin($chemintest."/wstest/wstest.tmp"));
             rmdir  (blindeChemin($chemintest."/wstest"));
      }

    if ($ok==1)
         { $message= $_SESSION["ws"]["dia"]["shareOK"]; $color="#090"; }
    else { $message= $_SESSION["ws"]["dia"]["shareProtected"]; $color="#960"; }
    } else { $message= $_SESSION["ws"]["dia"]["shareNotAcc"]; $color="#900"; }

} else {

  if (($conn_id = @ftp_connect($_REQUEST["adrServeur"]))===false) {
    $message= $_SESSION["ws"]["dia"]["shareFtpNotAcc"]; $color="#900";
  } else {

    $login_result = @ftp_login($conn_id, $_REQUEST["logServeur"], $passServeur);
    if (!$login_result) {
      $message= $_SESSION["ws"]["dia"]["shareFtpBadLogin"]; $color="#960";
    } else {

      $chdir_result= @ftp_chdir ($conn_id, $_REQUEST["rootServeur"]);
      if (!$chdir_result) {
        $message= $_SESSION["ws"]["dia"]["shareFtpcantMount"]; $color="#960";
      } else {

        // Test de création de dossier
        $mkdir_result= @ftp_mkdir ($conn_id, "wstemp");
        if ($mkdir_result)
           { $message= $_SESSION["ws"]["dia"]["shareFtpOK"];    $color="#090";
             @ftp_rmdir ($conn_id, "wstemp"); }
      else { $message= $_SESSION["ws"]["dia"]["shareFtpError"]; $color="#960"; }

      }
      @ftp_close($conn_id);
    }
  }

}
echo "<span id='colortest' class='colorsq' style='background:$color'></span>&nbsp;$message";
?>


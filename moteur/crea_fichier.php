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
// Fonction : Créer un nouveau fichier
// Nom      : crea_fichier.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
session_start();
include_once "auth.php";
include_once "fonctions.php";
$nomSrv = $_SESSION["ws"]["serveurActif"];
$chemin = $_SESSION["ws"]["$nomSrv"]["rootServeur"]."/".$_SESSION["ws"]["$nomSrv"]["repServeur"]."/".$_SESSION["ws"]["dossierActif"]."/";
$stat   = @fopen($_SESSION["ws"]["tempDir"]."/stats_".$_SESSION["ws"]["sid"].".txt", 'w+');
$typeSrv= $_SESSION["ws"]["$nomSrv"]["typeServeur"];

if ((!isset($_FILES['filename']['name']))||(strstr(html_entity_decode($_FILES['filename']['name']),"..")!==false)
  ||(preg_match($_SESSION["ws"]["varsUser"], $_FILES['filename']['name'])==1)) { fwrite($stat, "-1|".$_SESSION["ws"]["dia"]["noPermission"]); exit(); }

if ($_SERVER['CONTENT_LENGTH']>$_REQUEST["MAX_FILE_SIZE"]) { fwrite($stat, "-1|".$_SESSION["ws"]["dia"]["fileTooBig"]); exit(); }

if ($_SESSION["ws"]["auth2"]=="on") {

  if (!empty($_FILES['filename']['name'])&&is_uploaded_file($_FILES['filename']['tmp_name'])) {
    $nomElement=trim($_FILES['filename']['name']);
     copy($_FILES['filename']['tmp_name'],blindeChemin($_SESSION["ws"]["tempDir"].$_FILES['filename']['name']));
     fwrite($stat, "100|".$_SESSION["ws"]["dia"]["File"]." ".$_FILES['filename']['name']." ".$_SESSION["ws"]["dia"]["succesUpload"]);

  } else fwrite($stat, "-1|".$_SESSION["ws"]["dia"]["File"]." ".$_FILES['filename']['name']." ".$_SESSION["ws"]["dia"]["hasNotBeen"]." ".$_SESSION["ws"]["dia"]["uploaded"]." ".$erreur);

} else fwrite($stat, "-1|".$_SESSION["ws"]["dia"]["File"]." ".$_FILES['filename']['name']." ".$_SESSION["ws"]["dia"]["hasNotBeen"]." ".$_SESSION["ws"]["dia"]["uploaded"]." ".$_SESSION["ws"]["dia"]["prohibited"]);

@fclose($stat);

?>
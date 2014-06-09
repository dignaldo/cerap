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
// Fonction : Renvoi le type mime d'un fichier
// Nom      : typemime.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
header ("Content-type: text/html; charset=utf-8");
session_start();
include_once "auth.php";
include_once "fonctions.php";

$nomSrv= $_SESSION["ws"]["serveurActif"];
$chemin= $_SESSION["ws"]["cheminActif"];
if ($_REQUEST["memoType"]!="dossier") $chemin.=$_SESSION["ws"]["dossierActif"]."/";
verifie($_REQUEST["nomElement"]);

  if (!empty($_REQUEST["nomElement"]))
  $extension= trim($_REQUEST["nomElement"]); else exit;

//  $extension= strtolower(substr($nomElement,intval(strrpos($nomElement, "."))+1));
  if (isset($_SESSION["ws"]["assoc"][$extension]["exttype"])) {
    echo "<img src='".$_SESSION["ws"]["cheminIcn"]."minis/".$extension.".".$_SESSION["ws"]["formatExt"]."' style='width:32px;height:32px;float:left; clear:both;'>";
    echo $_SESSION["ws"]["assoc"][$extension]["exttype"]."<br/>".$_SESSION["ws"]["assoc"][$extension]["extmime"];
  } else if ($extension=="dossier") {
    echo "<img src='".$_SESSION["ws"]["cheminIcn"]."minis/big3.".$_SESSION["ws"]["formatExt"]."' style='width:32px;height:32px;float:left; clear:both;'>";
    echo $_SESSION["ws"]["dia"]["rep"];
  } else {
    echo "<img src='".$_SESSION["ws"]["cheminIcn"]."minis/div.".$_SESSION["ws"]["formatExt"]."' style='width:32px;height:32px;float:left; clear:both;'>";
    echo $_SESSION["ws"]["dia"]["typeOfElement"]." ".$extension; }


  /*
  if (function_exists('finfo_open')) {
      $finfo    = finfo_open(FILEINFO_MIME);
      $mimetype = finfo_file($finfo, blindeChemin($chemin.$nomElement));
      finfo_close($finfo);
      echo $mimetype;
  }
  else if (function_exists('mime_content_type ')) echo mime_content_type(blindeChemin($chemin.$nomElement));
  */

?>
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
// Fonction : Ajoute un fond d'écran dans le répertoire actuel
// Nom      : crea_fond.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
header ("Content-type: text/html; charset=utf-8");
session_start();
include_once "auth.php";
include_once "fonctions.php";
$l_mysql = new class_mysql();
$l_mysql->connect();

$nomSrv= $_SESSION["ws"]["serveurActif"];
$chemin= $_SESSION["ws"]["cheminActif"].$_SESSION["ws"]["dossierActif"]."/";
verifie($_REQUEST["nomElement"]);

if (!empty($_REQUEST["nomElement"])) {
  $adrFond=trim($_REQUEST["nomElement"]); $good=0; $remp=0;
  $cheminFond=blindeChemin($chemin.".param");
  $lines = @file($cheminFond);
  if (($dest = fopen($cheminFond, "w+"))!==false) {

    if (count($lines)) {
      foreach ($lines as $line_num => $line) {
        $line= trim($line);
        if ((preg_match("/\[(.*)\/(.*)\]/",$line)==1) && ($good==1)) $good=2;
        if ((preg_match("/\[BackgroundShortcut\]/",$line))==1) $good=1;
        if ((preg_match("/URL=(.*)/",$line,$regFond)==1) && ($good==1)) {
          if (trim($regFond[1])!=$adrFond) $line="URL=".$adrFond;
                                    else { $line="URL="; $remp=1; } }
        if ($good!=1) fwrite ($dest, $line."\n");
      }
      if ($good==0) fwrite ($dest, "\n[BackgroundShortcut]\nURL=".$adrFond);

    }
    else fwrite ($dest, "[BackgroundShortcut]\nURL=".$adrFond);

    fclose ($dest);
    if (!$remp) $message= $_SESSION["ws"]["dia"]["backgAdded"];
           else $message= $_SESSION["ws"]["dia"]["backgRemoved"];
  }

  echo $message;
  $tabLog= array("30","1",$message,$_SESSION["ws"]["nomUser"],$_SESSION["ws"]["dossierActif"],$adrFond,"");
  $l_mysql->logAction($tabLog);
  $l_mysql->disconnect();
}
?>
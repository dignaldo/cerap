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
// Fonction : Ajoute un commentaire sur le fichier sélectionné
// Nom      : commenter.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
header ("Content-type: text/html; charset=utf-8");
session_start();
include_once "auth.php";
include_once "fonctions.php";
$l_mysql = new class_mysql();
$l_mysql->connect();

$chemin= $_SESSION["ws"]["cheminActif"];
if ($_REQUEST["memoType"]!="dossier") $chemin.=$_SESSION["ws"]["dossierActif"]."/";
else if (dirname($_REQUEST["nomComment"])!=".") $chemin.=dirname($_REQUEST["nomComment"])."/";

  // ==== Récuperation de commentaires : Entete ====
  if (!empty($_REQUEST["recup"]))  $recup=1;  else $recup=0;
  if (!empty($_REQUEST["modif"]))  $modif=1;  else $modif=0;
  if (!empty($_REQUEST["retire"])) $retire=1; else $retire=0;
  if (!empty($_REQUEST["global"])) $global=1; else $global=0;

// L'utilisateur ne peut pas effectuer d'opération au dessus de sa racine virtuelle
  if ($global==0) verifie($_REQUEST["nomComment"]);

  function br2nl($text) {
    $balises = array("<br />","<br/>","<br>","<p>","</p>");
    $text = html_entity_decode(stripslashes(str_replace($balises,"",$text)));
    return $text;
  }

  $sepimg="<img src='".$_SESSION["ws"]["cheminImg"]."et.".$_SESSION["ws"]["formatExt"]."' border='0'>";
  $cheminCom  = blindeChemin(stripslashes($chemin)."/.param");
  $nomComment = basename(utf8_decode(stripslashes(urldecode($_REQUEST["nomComment"]))));
  $found = 0; $reussite = 0;


  // ==== Détection d'un commentaire : ajout dans le fichier ====
  if ($modif==1) {

  // L'utilisateur doit être autorisé à effectuer l'opération
   if ($_SESSION["ws"]["auth7"]=="on") {

    if (($lines = @file($cheminCom))!==FALSE) {

      if (($dest = fopen($cheminCom, "w+")) !== FALSE) {
        // ==== Ajout du commentaire dans le fichier existant ====
        foreach ($lines as $line_num => $line) {
          $line= trim($line);
          if (preg_match("@\[BackgroundShortcut\]@",$line,$comp)==1)
            if ($found==1) $found=2;
          if ((preg_match("@\[(.*)/(.*)\]@",$line)==1) && ($found==1)) $found=2;

          if ($line=="[".$_SESSION["ws"]["nomUser"]."/".$nomComment."]") {
            $found=1;
            if (!empty($_REQUEST["commentaire"])&&($retire==0)) fwrite ($dest, "[".$_SESSION["ws"]["nomUser"]."/".$nomComment."]\n".stripslashes($_REQUEST["commentaire"])."\n");
          }
          if ($found!=1) fwrite ($dest, $line."\n");
        }
        // ==== Si aucun commentaire n'avait été écrit ====
        if (($found==0) && (!empty($_REQUEST["commentaire"]))) fwrite ($dest, "[".$_SESSION["ws"]["nomUser"]."/".$nomComment."]\n".stripslashes($_REQUEST["commentaire"])."\n");
          fclose ($dest);
        }
        $reussite=1;
      } else {
        // ==== Création d'un nouveau fichier de commentaires ====
        if ((($dest = fopen($cheminCom, "w+")) !== FALSE) && (!empty($_REQUEST["commentaire"]))) {
          fwrite ($dest, "[".$_SESSION["ws"]["nomUser"]."/".$nomComment."]\n".stripslashes($_REQUEST["commentaire"])."\n");
          fclose ($dest);
        }
        $reussite=1;
      }
    if ($reussite) {
     echo $_SESSION["ws"]["dia"]["commentAdded"];
     $tabLog= array("17","1",$_SESSION["ws"]["dia"]["commentAdded"],$_SESSION["ws"]["nomUser"],$_SESSION["ws"]["dossierActif"],$nomComment,"");
     $l_mysql->logAction($tabLog);
  } else {
     echo $_SESSION["ws"]["dia"]["commentNotAdded"];
     $tabLog= array("17","-1",$_SESSION["ws"]["dia"]["commentNotAdded"],$_SESSION["ws"]["nomUser"],$_SESSION["ws"]["dossierActif"],$nomComment,"");
     $l_mysql->logAction($tabLog);
    }

   } else { echo $_SESSION["ws"]["dia"]["prohibited"]; exit; }

  } else {
    // ==== Récupération d'un commentaire ====
    $found=0;
      if (($lines = @file($cheminCom))!==FALSE) {
        if ($recup==0) {
          // ==== Récuperation pour affichage en infobulle ====
          foreach ($lines as $line_num => $line) {
            $line= trim($line);
            if (preg_match("@\[BackgroundShortcut\]@",$line,$comp)==1) $found=0;
            if ($global==0) {
              if (preg_match("@\[(.*)/(.*)\]@",$line,$comp)==1) {
                if ((basename($nomComment)==$comp[2]) && ($_SESSION["ws"]["nomUser"]==$comp[1]))
                $found= 1; else $found= 0;
              } else if ($found=="1") echo $line;
            } else {
              if (preg_match("@\[(.*)/(.*)\]@",$line,$comp)==1) {
                if ($comp[2]=="wsGlobal") $found=1;
                                     else $found=0;
              } else if ($found=="1") echo $line;
            }
          }

        } else {
          // ==== Récuperation pour affichage détaillé ====
          $reponse="";
          foreach ($lines as $line_num => $line) {
            $line= trim($line);
            if (preg_match("@\[BackgroundShortcut\]@",$line,$comp)==1) $found=0;
              if (preg_match("@\[(.*)/(.*)\]@",$line,$comp)==1) {
                if (basename($nomComment)==$comp[2])
                     { $found= 1; $reponse.= "<li style='border:0;margin:0'> $sepimg <b>".$comp[1]."</b> : "; }
                else { if ($found==1) $reponse.= "</li>\n"; $found= 0; }
              } else if ($found=="1") $reponse.= $line."<br/>\n";

          }
          echo "<ul style='list-style-type:none;display:".(!empty($reponse)?"block":"none").";'>".$reponse."</ul>";
        }
      }
  }

?>
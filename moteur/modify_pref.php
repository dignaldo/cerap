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
// Fonction : Modifie les préférences d'un utilisateur
// Nom      : modify_pref.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
header ("Content-type: text/html; charset=utf-8");
session_start();
include_once "auth.php";
include_once "fonctions.php";
$l_mysql = new class_mysql();
$l_mysql->connect();
$erreur=0; $param= array(); $remplacement=0;
$addmail=1; $memoRemp=0;
$_REQUEST["mailUser"]= urldecode($_REQUEST["mailUser"]);

  if (!$l_mysql->test()) {

    // ==== Ouverture du fichier d'origine et d'un nouveau fichier temporaire ====
    // Modifier les chemins des répertoires en cas d'incompatibilité
    $cheminPass    = "../wspasswd/";
    $chemin= $cheminPass."conf.ini";
    if (($dest = fopen($chemin.".tmp", "w+")) === FALSE) $erreur=1; else { $erreur = 0;

    if (is_file($chemin)) {
      $lines = file($chemin);

      $updatePass=0;
      if (($_REQUEST["passUser"]!=$_SESSION["ws"]["passUser"]) && ($_REQUEST["passUser"]!="")) {
        $_REQUEST["passUser"]= md5($_REQUEST["passUser"]);
        $updatePass=1;
      }
      
      // ==== Chargement et détection des paramètres ====
      foreach ($lines as $line_num => $line) {
        $memoRemp= $remplacement;
        // Détection d'un utilisateur
        if ((preg_match("/^\[([[:alnum:][:space:]_-]+)\]/i", rtrim($line),$paramNom)==1)) {
          $remplacement=0;
          if ($paramNom[1]==$_REQUEST["accUser"]) $remplacement=1;
        }
        // Détection d'un serveur
        if ((preg_match("/^\[#([[:alnum:][:space:]_-]+)\]/i",rtrim($line),$paramNom)==1)) {
          $remplacement=0;
        }
        // Détection des préférences
        if ((preg_match("/^\[\*Webshare\*\]/i",rtrim($line),$paramNom)==1)) {
          $remplacement=0;
        }
        // Détection des associations
        if ((preg_match("/^\[>Associations\]/i",rtrim($line),$paramNom)==1)) {
          $remplacement=0;
        }
        $contenu= explode ("=",rtrim($line));
        if (isset($contenu[1]) && isset($contenu[0]))
          { $nomvar=trim($contenu[0]); $result=trim($contenu[1]); }

        if ((!$remplacement)&&($remplacement!=$memoRemp)&&($addmail==1))
          fwrite($dest, "mailUser= ".$_REQUEST["mailUser"]."\n" );

        if (!$remplacement) {
          fwrite($dest, $line);
        } else {
            if ($nomvar=="mailUser") $addmail=0;
            if ( preg_match("/^\[($_REQUEST[nomUser])\]/i", rtrim($line)) ) fwrite($dest, $line);
            else { if ( ($nomvar=="mailUser")||($nomvar=="logUser")||($nomvar=="passUser")
                      ||($nomvar=="langUser")||($nomvar=="styleUser")||($nomvar=="triUser")
                      ||($nomvar=="visuUser")||($nomvar=="arboUser")||($nomvar=="webUser") )
                    { if (($nomvar!="passUser")||(!$updatePass))
                           fwrite($dest, "$nomvar= ".$_REQUEST["$nomvar"]."\n" );
                      else fwrite($dest, "$nomvar= ".md5($_REQUEST["$nomvar"])."\n" ); }
                 else fwrite($dest, $line);
            }
        }
      }


      // Fermeture des fichiers
      fclose ($dest);
      if (is_file($chemin)) unlink ($chemin);
      rename ($chemin.".tmp",$chemin);
    }
  }
}

// Si connexion à la base de données
  if ($l_mysql->test()) {

      $p_param= $l_mysql->blinde_param($_REQUEST);
      $verifUser = $l_mysql->request_result("SELECT idUser,nomUser FROM wsuser where nomUser='$p_param[nomUser]'");
      
      $updatePass=0;
      if (($p_param["passUser"]!=$_SESSION["ws"]["passUser"]) && ($p_param["passUser"]!="")) {
        $p_param["passUser"]= md5($p_param["passUser"]);
        $updatePass=1;
      }

      if (!empty($verifUser)&&($verifUser[0]["idUser"]==$_SESSION["ws"]["idUser"])) {
        $requete="UPDATE wsuser SET logUser = '$p_param[logUser]', "
          .(($updatePass==1)?" passUser = '$p_param[passUser]',":"")."
          langUser = '$p_param[langUser]', styleUser = '$p_param[styleUser]',
          visuUser = '$p_param[visuUser]', triUser = '$p_param[triUser]',
          webUser = '$p_param[webUser]', arboUser = '$p_param[arboUser]', mailUser = '$p_param[mailUser]'
          WHERE idUser = '$p_param[idUser]' LIMIT 1 ;";
          if (($l_mysql->request($requete))===false) $erreur=1; else $erreur=0;
      }
  }

  if ($erreur==1) echo $_SESSION["ws"]["dia"]["adminAlert1"];
             else echo $_SESSION["ws"]["dia"]["adminAlert2"];
$l_mysql->disconnect();

?>
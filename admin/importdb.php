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
// Fonction : Script d'import des préférences du fichier INI vers BDD
// Nom      : importdb.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
session_start();
include_once "auth.php";
include_once "admin.php";
include_once "../moteur/fonctions.php";

$l_mysql = new class_mysql();
$param= array(); $pass="";
$visiteurs= array();
$serveurs= array();
$wsbase= array();
$assoc= array();
$conftype = 0;
$confnom  = "";
$racineServeur= getDocumentRoot();

  // Modifier les chemins des répertoires en cas d'incompatibilité
  $chemin= "../wspasswd/conf.ini";

  if (is_file($chemin)) {
    $lines = file($chemin);

    // ==== Chargement du fichier de configuration ====
    foreach ($lines as $line_num => $line) {
       if ( preg_match("/^\[([[:alnum:][:space:]_-]+)\]/i", rtrim($line),$visit)==1 )
             {   $confnom= $visit[1]; $visiteurs["$confnom"]= array(); $conftype=1; }
   elseif ( preg_match("/^\[#([[:alnum:][:space:]_-]+)\]/i",rtrim($line),$servr)==1 )
             {    $confnom= $servr[1]; $serveurs["$confnom"]= array(); $conftype=2; }
      elseif ( preg_match("/^\[\*Webshare\*\]/i", rtrim($line))==1 ) { $conftype=3; }
      elseif ( preg_match("/^\[>Associations\]/i",rtrim($line))==1 ) { $conftype=4; }
      else {
        $contenu= explode ("=",rtrim($line));
        if (!empty($contenu[0])) switch ($conftype) {
        case 1: $visiteurs["$confnom"][rtrim($contenu[0])]= trim($contenu[1]); break;
        case 2:  $serveurs["$confnom"][rtrim($contenu[0])]= trim($contenu[1]); break;
        case 3:                $wsbase[rtrim($contenu[0])]= trim($contenu[1]); break;
        case 4:                 $assoc[rtrim($contenu[0])]= trim($contenu[1]); break;}
      }
    }
  }

  // Correction pour les anciennes versions
  $i=0;
  foreach ($serveurs as $data) {
    $nomServeur=$data["nomServeur"];
    if (!isset($data["idServeur"])) $serveurs["$nomServeur"]["idServeur"]=$i;
    $i++;
  }
  $i=0;
  foreach ($visiteurs as $data) {
    $nomUser=$data["nomUser"];
    if (!isset($data["idUser"])) $visiteurs["$nomUser"]["idUser"]=$i;
    $i++;
  }

  // Connexion à la base de données
  $_SESSION["ws"]["serveurBase"]= $wsbase["serveurBase"]; $_SESSION["ws"]["loginBase"]= $wsbase["loginBase"];
  $_SESSION["ws"]["passBase"]=    $wsbase["passBase"];    $_SESSION["ws"]["tableBase"]= $wsbase["tableBase"];
  $l_mysql->connect();
  if ($l_mysql->test()) {


    // Remplissage utilisateur
    $l_mysql->request("DELETE FROM wsuser ;");
    foreach ($visiteurs as $data) {
      $listeServeur= "";
      foreach ($data as $nomvar => $result) {
        if ((preg_match("/serveur/",$nomvar)==1)&&($result!=""))
          $listeServeur.= $result."|"; }
      $listeServeur= substr($listeServeur,0,strlen($listeServeur)-1);

      $l_mysql->request("INSERT INTO wsuser ( idUser, typeUser, nomUser, logUser, passUser,
          serveurs, langUser, styleUser, visuUser, triUser, varsUser, webUser, mailUser,
          arboUser, auth1, auth2, auth3, auth4, auth5, auth6, auth7, auth8 ) VALUES (
          '$data[idUser]', '$data[typeUser]', '$data[nomUser]', '$data[logUser]', '$data[passUser]',
          '$listeServeur', '$data[langUser]', '$data[styleUser]', '$data[visuUser]',
          '$data[triUser]', '$data[varsUser]', '$data[webUser]', '$data[mailUser]', '$data[arboUser]',
          '$data[auth1]', '$data[auth2]', '$data[auth3]', '$data[auth4]',
          '$data[auth5]', '$data[auth6]', '$data[auth7]', '$data[auth8]')");
    }


    // Remplissage serveurs 
    $l_mysql->request("DELETE FROM wsserver ;");
    foreach ($serveurs as $data) {
      $l_mysql->request(" INSERT INTO wsserver ( idServeur, typeServeur, nomServeur, 
          rootServeur, repServeur, startServeur, adrServeur, logServeur, passServeur, portServeur,
          webServeur, triServeur, protectIndex, protectHtacc, binServeur, protectServeur, publicServeur ) VALUES (
          '$data[idServeur]', '$data[typeServeur]', '$data[nomServeur]', '$data[rootServeur]',
          '$data[repServeur]', '$data[startServeur]', '$data[adrServeur]', '$data[logServeur]',
          '$data[passServeur]', '$data[portServeur]', '$data[webServeur]', '$data[triServeur]',
          '$data[protectIndex]', '$data[protectHtacc]', '$data[binServeur]', '$data[protectServeur]', '$data[publicServeur]' )");
    }

    // Remplissage préférences
    $l_mysql->request("DELETE FROM wsbase ;");
      $data= $wsbase;
      $l_mysql->request("
      INSERT INTO wsbase ( pageTitle ,prevWeb ,prevAct ,prevPDF ,activeLog ,autoUserAcc ,
        vClock ,effectAct ,sepAdr ,compPath ,arboLink ,dynWin ,linkWin ,sendMail ,
        actConf ,clicl ,clicr ,clicd ,diapoSp, memoMax, execMax, postMax, timeMax, uploMax, lifeMax )
        VALUES ( '$data[pageTitle]',
        '$data[prevWeb]', '$data[prevAct]', '$data[prevPDF]', '$data[activeLog]', '$data[autoUserAcc]',
        '$data[vClock]', '$data[effectAct]','$data[sepAdr]',  '$data[compPath]',
        '$data[arboLink]','$data[dynWin]',  '$data[linkWin]', '$data[sendMail]',
        '$data[actConf]', '$data[clicl]',   '$data[clicr]',   '$data[clicd]',
        '$data[diapoSp]', '$data[memoMax]', '$data[execMax]', '$data[postMax]',
        '$data[timeMax]', '$data[uploMax]', '$data[lifeMax]') ;");


    // Remplissage associations
    $l_mysql->request("DELETE FROM wsasso ;");
      $data= $assoc; 
      foreach ($data as $nomvar => $result) {
          $seppos= explode("|", $result); 
          $l_mysql->request("INSERT INTO wsasso (type, libelle, mime, action1, action2) VALUES
            ('$nomvar', '$seppos[0]', '$seppos[1]', '$seppos[2]', '$seppos[3]'); ");
      }

}

  if ($erreur==1)   echo "<span style='background:#F66'>&nbsp;".$_SESSION["ws"]["dia"]["adminAlert1"]."&nbsp;</span>";
             else { echo "<span style='background:#6F6'>&nbsp;".$_SESSION["ws"]["dia"]["adminAlert2"]."&nbsp;</span>";
    $dest = fopen($chemin, "a+");
    fwrite($dest, "\n\n[ImportOK]");
    fclose($dest);
  }
?>
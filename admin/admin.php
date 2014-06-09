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
// Fonction : Gestion des fonctionnalités d'administration
// Nom      : admin.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
session_start();
include_once "auth.php";
include_once "../moteur/fonctions.php";
$l_mysql = new class_mysql();

  $visiteurs= array();
  $serveurs= array();
  $wsbase= array();
  $assoc= array();
  $conftype = 0;
  $confnom  = "";
  $racineServeur= getDocumentRoot();
  
  // Modifier les chemins des répertoires en cas d'incompatibilité
  $cheminPass             = "../wspasswd/";
  $chemin= $cheminPass."conf.ini";

  if (!is_dir($cheminPass)) {
    @mkdir ($cheminPass);
    $dest = fopen($cheminPass.".htaccess", "w+");
    fwrite($dest, "deny from all");
    fclose ($dest);
  }


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
  
  // Si la base de données est accessible, on privilégie les informations qu'elle contient
  if ($l_mysql->test()) {
        
    // Création des tables si celles-ci sont inexistantes
    if (!$l_mysql->request("SELECT * FROM wslog")   ||!$l_mysql->request("SELECT * FROM wsbase")||
        !$l_mysql->request("SELECT * FROM wsfiles") ||!$l_mysql->request("SELECT * FROM wsuser")||
        !$l_mysql->request("SELECT * FROM wsserver")||!$l_mysql->request("SELECT * FROM wsasso")) {
            
      // Récupération du fichier ws.sql et création des tables
      $creaTable=@file_get_contents("ws.sql");
      $listTable=explode(";",$creaTable);
      foreach ($listTable as $data)
        $l_mysql->request($data);
    }
    // Dans le pire des cas, les tables n'ont pu être crées -> déconnexion de la base
    if (!$l_mysql->request("SELECT * FROM wslog")) {
      $l_mysql->disconnect();
    } else {

    // Suppression des données éventuellement contenues dans le fichier .ini
    $visiteurs= array();
    $serveurs= array();
    $assoc= array();
    $conftype = 0;
    $confnom  = "";

    // Remplissage avec les données stockées dans la base
    if (($result= $l_mysql->request_result("SELECT * FROM wsbase"))!==false) {
      foreach ($result[0] as $varData => $data) {
        $wsbase["$varData"]= "$data"; 
      }
    }
    if (($result= $l_mysql->request_result("SELECT * FROM wsserver"))!==false) {
      foreach ($result as $row) {
        $nom = $row["nomServeur"];      
        $serveurs[$nom]= array();      
        foreach ($row as $varData => $data) $serveurs[$nom]["$varData"]= "$data";
      }
    }
    if (($result= $l_mysql->request_result("SELECT * FROM wsuser"))!==false) {
      foreach ($result as $row) {
        $nom = $row["nomUser"];
        $visiteurs[$nom]= array();
        $listeServeur = "";
        foreach ($row as $varData => $data) $visiteurs[$nom]["$varData"]= "$data";
        
        $listeServeur = explode ("|",$visiteurs[$nom]["serveurs"]);
        foreach ($listeServeur as $numero => $data) $visiteurs[$nom]["serveur$numero"]= "$data";
      }         
    }
    if (($result= $l_mysql->request_result("SELECT * FROM wsasso"))!==false) {
      foreach ($result as $row) {
        foreach ($row as $varData => $data) {
          $assoc[$row["type"]]= "$row[libelle]|$row[mime]|$row[action1]|$row[action2]";
        }
      }
    }
    
   }

  }



?>


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
// Fonction : Création d'un flux RSS
// Nom      : rss_creator.php
// Version  : 0.8.2
// Date     : 24/03/08
// =======================================================================
session_start();
header("Content-Type: application/xhtml+xml; Charset=UTF-8");

// Décommentez si l'accés doit être privé
// include_once "../moteur/auth.php";

  include_once "../moteur/fonctions.php";
  $l_mysql = new class_mysql();
  $wsbase= array();

  // Modifier les chemins des répertoires en cas d'incompatibilité
  $cheminPass             = "../wspasswd/";
  $chemin= $cheminPass."conf.ini";

  if (is_file($chemin)) {
    $lines = file($chemin);

    // ==== Chargement du fichier de configuration ====
    foreach ($lines as $line_num => $line) {
       if ( preg_match("/^\[([[:alnum:][:space:]_-]+)\]/i", rtrim($line),$visit)==1 )
             {   $confnom= $visit[1]; $visiteurs["$confnom"]= array(); $conftype=1; }
   elseif ( preg_match("/^\[#([[:alnum:][:space:]_-]+)\]/i",rtrim($line),$servr)==1 )
             {    $confnom= $servr[1]; $serveurs["$confnom"]= array(); $conftype=2; }
      elseif ( preg_match("/^\[\*CERAP\*\]/i", rtrim($line))==1 ) { $conftype=3; }
      elseif ( preg_match("/^\[>Associations\]/i",rtrim($line))==1 ) { $conftype=4; }
      else {
        $contenu= explode ("=",rtrim($line));
        if (!empty($contenu[0])) switch ($conftype) {
        case 3: $wsbase[rtrim($contenu[0])]= trim($contenu[1]); break; }
      }
    }
  }

  // Connexion à la base de données
  $_SESSION["ws"]["serveurBase"]= $wsbase["serveurBase"]; $_SESSION["ws"]["loginBase"]= $wsbase["loginBase"];
  $_SESSION["ws"]["passBase"]=    $wsbase["passBase"];    $_SESSION["ws"]["tableBase"]= $wsbase["tableBase"];
  $l_mysql->connect();

  // Si la base de données est accessible, on récupère les informations
  if ($l_mysql->test()) {
    $param= $l_mysql->blinde_param($_REQUEST);

    $contenu = '<'.'?xml version="1.0" encoding="utf-8"?'.'>'."\n"
          .'<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/">'."\n"
          .'<channel>'."\n"
          .'<title><![CDATA[CERAP :: '.$_SERVER['SERVER_NAME'].' ]]></title>'."\n"
          .'<link>'.$_SERVER['SERVER_NAME'].'</link>'."\n"
          .'<description><![CDATA[CERAP :: Nouvelles opérations]]></description>'."\n"
          .'<language>fr</language>'."\n";

    if (!isset($param["anneed"])) $anneed= date("Y"); else $anneed= $param["anneed"];
    if (!isset($param["anneef"])) $anneef= date("Y"); else $anneef= $param["anneef"];
    if (!isset($param["moisd"]))  $moisd=  date("n"); else $moisd=  $param["moisd"];
    if (!isset($param["moisf"]))  $moisf=  date("n"); else $moisf=  $param["moisf"];
    if (!isset($param["jourd"]))  $jourd=  date("j"); else $jourd=  $param["jourd"];
    if (!isset($param["jourf"]))  $jourf=  date("j"); else $jourf=  $param["jourf"];

    $dated="$anneed-".((intval($moisd)<10)?"0":"")."$moisd-".((intval($jourd)<10)?"0":"")."$jourd";
    $datef="$anneef-".((intval($moisf)<10)?"0":"")."$moisf-".((intval($jourf)<10)?"0":"")."$jourf";

    $requete = "SELECT iddate,verbose,username,path,file,content,ipadr FROM wslog WHERE DATEDIFF('$dated',iddate)<=0 AND DATEDIFF('$datef',iddate)>=0 ";
    if (isset($param["iduser"])&&($param["iduser"]!=""))    $requete.=" AND username='$param[iduser]' ";
    if (isset($param["idresult"])&&($param["idresult"]!=0)) $requete.=" AND idresult='$param[idresult]' ";
    if (isset($param["idaction"])&&($param["idaction"]!=0)) $requete.=" AND idaction='$param[idaction]' ";
    $requete.="ORDER BY iddate DESC LIMIT 20";

    $result= $l_mysql->request_result($requete);
    if (isset($result)&&!empty($result)) {

    foreach ($result as $row) {
      $contenu .= ""
      ."<item><title><![CDATA[$row[verbose]]]></title>\n"
      ."<link>$_SERVER[SERVER_NAME]</link><guid>$_SERVER[SERVER_NAME]</guid>\n"
      ."<description><![CDATA[$row[username] ($row[ipadr]) : $row[verbose] ]]></description>\n"
      ."<pubDate>$row[iddate]</pubDate></item>\n";
    }
  }

  $contenu .= '</channel></rss>';

// Il est possible d'utiliser directement ce script pour rapatrier les données et les présenter 
// à un lecteur de flux ou à vos visiteurs.
  echo $contenu;

// Sinon, vous pouvez remplacer le echo pour rediriger le contenu dans un fichier .RSS 
// dont l'adresse sera visible par vos visiteurs. Cela allège la charge serveur
// $dest = fopen("[cheminDuFlux].rss", "w+");
// fwrite ($dest, $contenu);
// fclose ($dest);

  $l_mysql->disconnect();
  
}
?>
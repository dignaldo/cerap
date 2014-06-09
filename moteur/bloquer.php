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
// Fonction : Affiche une alerte "fichier en cours de modification"
// Nom      : bloquer.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
header ("Content-type: text/html; charset=utf-8");
session_start();
include_once "auth.php";
include_once "fonctions.php";
$l_mysql = new class_mysql();
$l_mysql->connect();

// La base de données doit être connectée
if ($l_mysql->test()) {
  
$p_param= $l_mysql->blinde_param($_REQUEST);
  
// Récupération des informations serveurs
if (!empty($p_param["nomSrv"])) $nomSrv= $p_param["nomSrv"];
                           else $nomSrv= $_SESSION["ws"]["serveurActif"];
                                $nomPro= $p_param["nomPro"];
             $typeSrv= $_SESSION["ws"]["$nomSrv"]["typeServeur"];
  $chemin=  blindeChemin($_SESSION["ws"]["$nomSrv"]["rootServeur"]."/".$_SESSION["ws"]["$nomSrv"]["repServeur"]."/");
  $nomElement   = urldecode(stripslashes(trim($p_param["nomElement"])));
  $cheminElement= blindeChemin(utf8_encode($chemin).$nomElement);
  $cheminFichier= $_SESSION["ws"]["dossierActif"];
  if ($cheminFichier=="") $cheminFichier="/";
  $nomFichier   = $nomElement;

  // L'utilisateur ne peut pas effectuer d'opération au dessus de sa racine virtuelle
  verifie($p_param["nomElement"]);
  if (preg_match($_SESSION["ws"]["varsUser"], $p_param["nomElement"])==1) exit;

  // Gestion des favoris
    $request= "SELECT * FROM wsfiles
      WHERE nomServeur LIKE '$nomSrv' AND path LIKE '$cheminFichier' AND file LIKE '$nomFichier' ";
    $result = $l_mysql->request_result($request);
    if (empty($result)) {
      $request= "INSERT INTO wsfiles
        (idUser, idServeur, nomServeur, username, path, file, commentaires, version, viewed, favoris, changed, locked)
        VALUES ( '".$_SESSION["ws"]["idUser"]."', '".$_SESSION["ws"]["$nomSrv"]["idServeur"]."', '$nomSrv',
        '".$_SESSION["ws"]["nomUser"]."', '$cheminFichier', '$nomFichier','','',0,0,0,1) ";
      $message= $_SESSION["ws"]["dia"]["confirmFileInUse"];
      $result = $l_mysql->request($request);
    } else {
      if ($result[0]["locked"]!=1) { $verrou=1; $message= $_SESSION["ws"]["dia"]["confirmFileInUse"]; }
                              else { $verrou=0; $message= $_SESSION["ws"]["dia"]["confirmFileNotUse"]; }
      $request= "UPDATE wsfiles SET locked=$verrou
        WHERE nomServeur LIKE '$nomSrv' AND path LIKE '$cheminFichier' AND file LIKE '$nomFichier' ";
      $result = $l_mysql->request($request);
    }

  $l_mysql->disconnect();

} else { $message= $_SESSION["ws"]["dia"]["alertfunction3"]; }
  echo $message;
?>
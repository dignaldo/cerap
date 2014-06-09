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
// Fonction : Démarrage d'une session publique
// Nom      : public.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
header ("Content-type: text/html; charset=utf-8");
session_start();
include_once "fonctions.php";
$l_mysql = new class_mysql();
    
$_SESSION["ws"]= array();
$deflang=deflang();
include_once "lang/$deflang.lang.php";
$racineServeur= getDocumentRoot();
$racineAppli =  getScriptRoot();
$pathPass = "$racineAppli/wspasswd/conf.ini";
$visiteurs = array(); $serveurs = array();
$confnom="";  $conftype=0;
$listeCompte = array();
$listeNom    = array();
$listePasswd = array();

  // Ouverture du fichier de configuration et récuperation des informations
  if (is_file($pathPass)!== false) {
    $lines = file($pathPass);

    // Récupération des identifiants de la base de données
    foreach ($lines as $line_num => $line) {
      list($varnom,$valeur)= explode ("=",rtrim($line));
      if (($varnom=="serveurBase")||($varnom=="loginBase")||($varnom=="passBase")||($varnom=="tableBase"))
        $_SESSION["ws"]["$varnom"]= trim($valeur);      
    }
    $l_mysql->connect();

    if (!$l_mysql->test()) {
    // Lecture des infos à partir du fichier
    $countUser=0; $logUser=""; $nomUser=""; $passUser=""; $chargeUser=0;
    foreach ($lines as $line_num => $line) {
         if ( preg_match("/^\[#([[:alnum:][:space:]_-]+)\]/",rtrim($line),$visit)==1 )
            {   if ($chargeUser==1) $countUser++;
                $conftype=1; $logUser=""; $nomUser=""; $passUser=""; $chargeUser=0; }
     elseif ( preg_match("/^\[([[:alnum:][:space:]_-]+)\]/", rtrim($line))==1 )
            {   if ($chargeUser==1) $countUser++;
                $conftype=0; $logUser=""; $nomUser=""; $passUser=""; $chargeUser=0; }
     elseif ( preg_match("/^\[#([[:alnum:][:space:]_-]+)\]/",rtrim($line))==1 )
            {   if ($chargeUser==1) $countUser++;
                $conftype=2; $logUser=""; $nomUser=""; $passUser=""; $chargeUser=0; }
       elseif ( preg_match("/^\[\*Webshare\*\]/",rtrim($line))==1 )  { $conftype=3;
                if ($chargeUser==1) $countUser++;
                $logUser=""; $nomUser=""; $passUser=""; $chargeUser=0; }
       elseif ( preg_match("/^\[>Associations\]/",rtrim($line))==1 ) { $conftype=4;
                if ($chargeUser==1) $countUser++;
                $logUser=""; $nomUser=""; $passUser=""; $chargeUser=0; }
       else {
        list($varnom,$valeur)= explode ("=",rtrim($line));
        $varnom= trim($varnom); $valeur= trim($valeur);

        if  ($varnom=="logUser")  $logUser= $valeur;
        if  ($varnom=="nomUser")  $nomUser= $valeur;
        if  ($varnom=="passUser") $passUser=$valeur;
        if (($varnom=="publicUser")&&($valeur=="on")) $chargeUser=1;

        if ($chargeUser==1) {
          $listeCompte[$countUser]= $logUser;
          $listeNom[$countUser]   = $nomUser;
          $listePasswd[$countUser]= $passUser;
        }
      }
    }
    
    
  // Si connexion, on privilégie les informations stockées dans la base
  } else {

    // Remplissage des informations utilisateurs  
      $countUser=0;
      if (($result= $l_mysql->request_result("SELECT nomUser,logUser,passUser,publicUser FROM wsuser "))!==false) {
        foreach ($result as $varnom) {
          if ($varnom["publicUser"]=="on") { $listeCompte[$countUser]= $varnom["logUser"];
                                             $listeNom[$countUser]   = $varnom["nomUser"]; 
                                             $listePasswd[$countUser]= $varnom["passUser"];
                                             $countUser++; }
        }
      }
  }    

  } else {
      $_SESSION["ws"] = array();
      echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><head><meta http-equiv="Refresh" content="0;URL=index.php"></head></html>';
      exit;
  }

    $_SESSION["ws"]["uniqKey"]= md5(uniqid(rand(), true));
    if (count($listeCompte)==1) {
      echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><head><meta http-equiv="Refresh" content="0;URL=index.php?actif=ok&mode=auto&login='.$listeCompte[0].'"></head>';
      echo "<body style='text-align:center;font-family:arial;font-size:11px'>"
          ."<img src='style/Standard/images/loading2.gif' style='margin-top: 200px;'><br />"
          .$_SESSION["ws"]["dia"]["loading"]."</body></html>";
      exit;
    }

?>

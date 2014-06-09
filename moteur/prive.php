<?php
/************************************************************************/
/*                                WEBSHARE                              */
/************************************************************************/
//
// Copyright (c) 2009 by Virginie Vivancos
// Authentification LDAP - Copyright (c) 2008 by Arnaud Guillet
// http://www.webshare.fr
//
// This program is free software. You can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation; either version 2 of the License.
//
// =======================================================================
// Fonction : Identification pour demarrage de la session
// Nom      : prive.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
header ("Content-type: text/html; charset=utf-8");
session_start();
include_once "fonctions.php";
$l_mysql = new class_mysql();

if (!isset($_SESSION["ws"])) $_SESSION["ws"]= array();
if (!isset($_REQUEST["mode"])||($_REQUEST["mode"]!="auto"))
  $mode="normal"; else $mode="auto";

$deflang=deflang();
include_once "lang/$deflang.lang.php";
$racineServeur= getDocumentRoot();
$racineAppli =  getScriptRoot();
$racineDoc= "$racineAppli/Documents/";
$racineBin= "$racineAppli/Corbeille/";
$racineEdt= "$racineAppli/editor/";
$racineLog= "$racineAppli/logs/";
$pathPass = "$racineAppli/wspasswd/conf.ini";
$_SESSION["ws"]["rootServr"]    = $racineServeur;
$_SESSION["ws"]["rootAppli"]    = $racineAppli;
$_SESSION["ws"]["tempDir"]      = "$racineAppli/wstemp/";
$_SESSION["ws"]["pluginDir"]    = "$racineAppli/plugins/";
$_SESSION["ws"]["listeServeur"] = array(); $nomSrv="";
$_SESSION["ws"]["assoc"]        = array();
$visiteurs= array(); $serveurs  = array();
$confnom="";  $conftype=0;  $countUser=0;
$listeTriImp= array();

function left($str,$NbChar)
{
       return substr($str,0,$NbChar);
}

function right($str, $NbChar)
{
       return substr($str, strlen($str)-$NbChar);
}

// ============ Variables à modifier pour se connecter au serveur LDAP ============
$Conf_REALM          = "Active Directory login";
$Conf_Description    = "User Login";
// Ici, on indique le domaine (Windows dans mon cas)
$Conf_Domain         = "SOCIETE";
// Le serveur LDAP peut être identifié par nom ou par adresse IP
// Avec du SSL, il faut utiliser un autre port par défaut et une adresse en ldaps
$ldap['host']        = 'ldap.societe.com';
// Le port LDAP est 389 par défaut mais peut être parfois différent pour plus de sécurité
$ldap['port']        = 389;
// =======================================================================


// ============ Affectation des identifiants ============
              $login= $_REQUEST["login"];
              $pass = $_REQUEST["pass"];
// ====================================================




  // Ouverture du fichier de configuration et récuperation des informations
  if (is_file($pathPass)!== false) {
    $lines = file($pathPass);

    // Recherche du login
    $account=""; $logUser="";
    foreach ($lines as $line_num => $line) {
        if ( preg_match("/^\[#([[:alnum:][:space:]_-]+)\]/",rtrim($line))==1 ) { $logUser=""; }
    elseif ( preg_match("/^\[\*Webshare\*\]/",rtrim($line))==1 )  { $logUser=""; }
    elseif ( preg_match("/^\[>Associations\]/",rtrim($line))==1 ) { $logUser=""; }
    elseif ( preg_match("/^\[([[:alnum:][:space:]_-]+)\]/", rtrim($line),$visit)==1 )
         { $logUser= $visit[1]; } elseif (!empty($logUser)) {
       list($varnom,$valeur)= explode ("=",rtrim($line));
       if ((trim($varnom)=="logUser")&&(trim($valeur)==trim($login)))
         { $account=$logUser; $logUser=""; }
       }
     }

    // Récupération des identifiants de la base de données
    foreach ($lines as $line_num => $line) {
      list($varnom,$valeur)= explode ("=",rtrim($line));
      if (($varnom=="serveurBase")||($varnom=="loginBase")||($varnom=="passBase")||($varnom=="tableBase"))
        if (!empty($valeur)) $_SESSION["ws"]["$varnom"]= trim($valeur);
    }

    // Connexion à la base de données et vérification des tables
    $l_mysql->connect();
    if ($l_mysql->test()) {

      // Création des tables si celles-ci sont inexistantes
      if (!$l_mysql->request("SELECT * FROM wslog")   ||!$l_mysql->request("SELECT * FROM wsbase")||
          !$l_mysql->request("SELECT * FROM wsfiles") ||!$l_mysql->request("SELECT * FROM wsuser")||
          !$l_mysql->request("SELECT * FROM wsserver")||!$l_mysql->request("SELECT * FROM wsasso")) {

        // Récupération du fichier ws.sql et création des tables
        $creaTable=@file_get_contents("admin/ws.sql");
        $listTable=explode(";",$creaTable);
        foreach ($listTable as $data)
          $result= $l_mysql->request($data);
      }

      // Dans le pire des cas, les tables n'ont pu être crées -> déconnexion de la base
      if (!$l_mysql->request("SELECT * FROM wslog")) {
        $l_mysql->disconnect();
      }
    }

    if (!$l_mysql->test()) {
    // Lecture des infos à partir du fichier

    $maxServeur=0;
    foreach ($lines as $line_num => $line) {
         if ( preg_match("/^\[([[:alnum:][:space:]_-]+)\]/", rtrim($line),$visit)==1 )
            {   $logUser= $visit[1]; $countUser++; if ($account==$logUser) $conftype=1; else $conftype=0; }
     elseif ( preg_match("/^\[#([[:alnum:][:space:]_-]+)\]/",rtrim($line),$servr)==1 )
            {   $logServ= $servr[1]; $conftype=2; }
       elseif ( preg_match("/^\[\*Webshare\*\]/",rtrim($line))==1 )  { $conftype=3; }
       elseif ( preg_match("/^\[>Associations\]/",rtrim($line))==1 ) { $conftype=4; }
       else {
        list($varnom,$valeur)= explode ("=",rtrim($line));
        $varnom= trim($varnom); $valeur= trim($valeur);

        if (!empty($varnom)) switch ($conftype) {
          // Remplissage des informations utilisateurs
          case 1:
            if (($varnom=="typeUser")||($varnom=="nomUser")||($varnom=="ipUser")||($varnom=="arboUser")||
                ($varnom=="triUser")||($varnom=="visuUser")||($varnom=="prevUser")||($varnom=="langUser")||
                ($varnom=="webUser")||($varnom=="recoUser")||($varnom=="styleUser")||($varnom=="passUser")||
                ($varnom=="mailUser")||($varnom=="logUser")||($varnom=="idUser")||($varnom=="publicUser"))
                 $_SESSION["ws"]["$varnom"]= $valeur;

            if  ($varnom=="varsUser") $_SESSION["ws"]["$varnom"]   = "/$valeur/i";

            if  ($varnom=="styleUser") {
             $_SESSION["ws"]["cheminImg"]  = "style/".$_SESSION["ws"]["styleUser"]."/images/";
             $_SESSION["ws"]["cheminIcn"]  = "style/".$_SESSION["ws"]["styleUser"]."/icones/";
             $_SESSION["ws"]["formatExt"]  = "png";
             $handle = opendir($racineAppli."/".$_SESSION["ws"]["cheminIcn"]);
             while (false !== ($entry = readdir($handle))) {
             if (stristr($entry,".gif")!==false)
                   $_SESSION["ws"]["formatExt"]  = "gif"; }
               closedir($handle); }
             $_SESSION["ws"]["accUser"]= $logUser;

             if  (preg_match("/serveur([[:alnum:]]+)/i",$varnom,$numServ)==1) {
                  $_SESSION["ws"]["listeServeur"][$numServ[1]]= $valeur; }

             if  (preg_match("/auth([[:alnum:]]+)/i",$varnom,$numAuth)==1) {
                  $_SESSION["ws"]["$varnom"] = $valeur; }
          break;
          // Remplissage des informations serveurs
          case 2:
            if (!isset($_SESSION["ws"]["$logServ"])) {
              $_SESSION["ws"]["$logServ"] = array();
                $_SESSION["ws"]["$logServ"]["repServeur"] = "/"; $_SESSION["ws"]["$logServ"]["startServeur"]="/";
                $_SESSION["ws"]["$logServ"]["connexion"]  ="";
            }
            if ($varnom=="idServeur") {
              $listeTriImp[$maxServeur]=$valeur;
              $maxServeur++;
            }

            if (($varnom=="typeServeur")||($varnom=="nomServeur")||($varnom=="adrServeur")||($varnom=="logServeur")||
                ($varnom=="passServeur")||($varnom=="portServeur")||($varnom=="repServeur")||($varnom=="startServeur")||
                ($varnom=="webServeur")||($varnom=="binServeur")||($varnom=="protectIndex")||($varnom=="triServeur")||
                ($varnom=="idServeur")||($varnom=="protectHtacc")||($varnom=="protectServeur")||($varnom=="publicServeur"))
                   $_SESSION["ws"]["$logServ"]["$varnom"]= $valeur;

              if ($varnom=="rootServeur")
                   $_SESSION["ws"]["$logServ"]["$varnom"]= str_replace("\$mydoc\$",$racineDoc,$valeur);
          break;
          // Remplissage des préférences
          case 3:
            $_SESSION["ws"]["clicl"] = 0; $_SESSION["ws"]["clicr"] = 1; $_SESSION["ws"]["clicd"] = 1;
               if (function_exists("ini_set")&&($varnom=="timeUser")) ini_set("session.gc_maxlifetime", "$valeur");

            if (($varnom=="clicl")||($varnom=="clicr")||($varnom=="clicd")||($varnom=="activeLog")||
                ($varnom=="diapoSp")||($varnom=="pageTitle")||($varnom=="vClock")||($varnom=="compPath")||
                ($varnom=="prevAct")||($varnom=="arboLink")||($varnom=="dynWin")||($varnom=="sendMail")||
                ($varnom=="prevWeb")||($varnom=="effectAct")||($varnom=="activeLog")||($varnom=="sepAdr")||
                ($varnom=="prevPDF")||($varnom=="actConf")||($varnom=="linkWin")||($varnom=="autoUserAcc"))
                 $_SESSION["ws"]["$varnom"]= $valeur;
          break;
          // Remplissage des informations d'associations
          case 4:
            $_SESSION["ws"]["assoc"]["$varnom"]= array();
            $datas= explode("|",$valeur);
            $_SESSION["ws"]["assoc"]["$varnom"]["exttype"]= $datas[0];
            $_SESSION["ws"]["assoc"]["$varnom"]["extmime"]= $datas[1];
            $_SESSION["ws"]["assoc"]["$varnom"]["extactp"]= $datas[2];
            $_SESSION["ws"]["assoc"]["$varnom"]["extacts"]= $datas[3];
            
            if ($libraryImg=="gd")
              if ( (preg_match("/png|jpeg|jpg|bmp|gif|cur|dcr|dib|emf|eps|ico|pdf|ps|psd|svg|tga|tif|ai/i",$varnom)==1)&&(preg_match("/png|jpeg|jpg|gif/i",$varnom)==0) ) {
                $_SESSION["ws"]["assoc"]["$varnom"]["extactp"]= "3";
              }
          break; }
      }
    }

  // Si connexion, on privilégie les informations stockées dans la base
    } else {

    // Remplissage des informations utilisateurs  
    if (($result= $l_mysql->request_result("SELECT * FROM wsuser WHERE logUser='".trim($login)."' "))!==false) {
      $countUser=1;
        $row = $result[0];
        $nom = $row["nomUser"];
        $listeServeur = explode ("|",$row["serveurs"]);
        foreach ($listeServeur as $numero => $data) $_SESSION["ws"]["listeServeur"]["$numero"]= "$data";

        foreach ($row as $varnom => $data) {
          if (($varnom=="typeUser")||($varnom=="nomUser")||($varnom=="ipUser")||($varnom=="arboUser")||
              ($varnom=="triUser")||($varnom=="visuUser")||($varnom=="prevUser")||($varnom=="langUser")||
              ($varnom=="webUser")||($varnom=="recoUser")||($varnom=="styleUser")||($varnom=="mailUser")||
              ($varnom=="passUser")||($varnom=="logUser")||($varnom=="idUser")||($varnom=="publicUser"))
                $_SESSION["ws"]["$varnom"]= $data;

          if  ($varnom=="varsUser") $_SESSION["ws"]["$varnom"]   = "/$data/i";
          if  (preg_match("/auth([[:alnum:]]+)/i",$varnom,$numAuth)==1) {
            $_SESSION["ws"]["$varnom"] = $data; }
          $_SESSION["ws"]["accUser"]= $nom;

          if  ($varnom=="styleUser") {
            $_SESSION["ws"]["cheminImg"]  = "style/".$_SESSION["ws"]["styleUser"]."/images/";
            $_SESSION["ws"]["cheminIcn"]  = "style/".$_SESSION["ws"]["styleUser"]."/icones/";
            $_SESSION["ws"]["formatExt"]  = "png";
            $handle = opendir($racineAppli."/".$_SESSION["ws"]["cheminIcn"]);
            while (false !== ($entry = readdir($handle))) {
              if (stristr($entry,".gif")!==false)
                $_SESSION["ws"]["formatExt"]  = "gif"; }
              closedir($handle); }
        }
      }         
      
    // Remplissage des informations serveurs      
    if (($result= $l_mysql->request_result("SELECT * FROM wsserver"))!==false) {
      $maxServeur= count($result); $compteur=0;
      foreach ($result as $row) {
        $nom = $row["nomServeur"];      
        $_SESSION["ws"]["$nom"]= array();      
        $_SESSION["ws"]["$nom"]["repServeur"] = "/"; $_SESSION["ws"]["$nom"]["startServeur"]="/";
        $_SESSION["ws"]["$nom"]["connexion"]  =""; 
        $listeTriImp[$compteur]=$row["idServeur"];
        $compteur++;

        foreach ($row as $varnom => $data) {
          if (($varnom=="typeServeur")||($varnom=="nomServeur")||($varnom=="adrServeur")||($varnom=="logServeur")||
              ($varnom=="passServeur")||($varnom=="portServeur")||($varnom=="repServeur")||($varnom=="startServeur")||
              ($varnom=="webServeur")||($varnom=="binServeur")||($varnom=="protectIndex")||($varnom=="triServeur")||
              ($varnom=="idServeur")||($varnom=="protectHtacc")||($varnom=="protectServeur")||($varnom=="publicServeur"))
                $_SESSION["ws"]["$nom"]["$varnom"]= $data;

          if ($varnom=="rootServeur")
                $_SESSION["ws"]["$nom"]["$varnom"]= str_replace("\$mydoc\$",$racineDoc,$data);
        }        
      }
    }

    // Remplissage des préférences
    if (($result= $l_mysql->request_result("SELECT * FROM wsbase"))!==false) {
      foreach ($result[0] as $varnom => $data) {
        $_SESSION["ws"]["clicl"] = 0; $_SESSION["ws"]["clicr"] = 1; $_SESSION["ws"]["clicd"] = 1;
        if (function_exists("ini_set")&&($varnom=="timeUser")) ini_set("session.gc_maxlifetime", "$data");

        if (($varnom=="clicl")||($varnom=="clicr")||($varnom=="clicd")||($varnom=="activeLog")||
            ($varnom=="serveurBase")||($varnom=="loginBase")||($varnom=="passBase")||($varnom=="tableBase")||
            ($varnom=="diapoSp")||($varnom=="pageTitle")||($varnom=="vClock")||($varnom=="compPath")||
            ($varnom=="prevAct")||($varnom=="arboLink")||($varnom=="dynWin")||($varnom=="sendMail")||
            ($varnom=="prevWeb")||($varnom=="effectAct")||($varnom=="activeLog")||($varnom=="sepAdr")||
            ($varnom=="prevPDF")||($varnom=="actConf")||($varnom=="linkWin")||($varnom=="autoUserAcc"))
        $_SESSION["ws"]["$varnom"]= "$data";
      }
    }
        
    // Remplissage des informations d'associations        
    if (($result= $l_mysql->request_result("SELECT * FROM wsasso"))!==false) {
      foreach ($result as $row) {
        foreach ($row as $varData => $data) {
            $_SESSION["ws"]["assoc"][$row["type"]]= array();
            $_SESSION["ws"]["assoc"][$row["type"]]["exttype"]= $row["libelle"];
            $_SESSION["ws"]["assoc"][$row["type"]]["extmime"]= $row["mime"];
            $_SESSION["ws"]["assoc"][$row["type"]]["extactp"]= $row["action1"];
            $_SESSION["ws"]["assoc"][$row["type"]]["extacts"]= $row["action2"];
            
            if ($libraryImg=="gd")
              if ( (preg_match("/png|jpeg|jpg|bmp|gif|cur|dcr|dib|emf|eps|ico|pdf|ps|psd|svg|tga|tif|ai/i",$row["type"])==1)&&(preg_match("/png|jpeg|jpg|gif/i",$row["type"])==0) ) {
                $_SESSION["ws"]["assoc"][$row["type"]]["extactp"]= "3";
              }
        } 
      }     
    }        

  } 

 // Validation du formulaire
 if (isset($_REQUEST["actif"]) && $_REQUEST["actif"]=="ok") {

  // En mode LDAP, le compte doit exister également dans l'annuaire du serveur
  if (isset($mode_ldap)&&($mode_ldap=="1")) {
              $ldap['pass'] = $pass;
              $ldap['user'] = $login;

       if ( strtoupper(left($ldap['user'],strlen($Conf_Domain))) != strtoupper($Conf_Domain) )
              $ldap['user'] = $Conf_Domain."\\".$ldap['user'];

       $ldap['user'] = str_replace("\\\\","\\",$ldap['user']);

       if (function_exists("ldap_connect")) $ldap['conn']=ldap_connect($ldap['host'],$ldap['port']);
       else {
          echo $_SESSION["ws"]["dia"]["identProblem3"];
          $_SESSION["ws"] = array(); exit;
       }
       if (!isset($ldap['conn']) || empty($ldap['conn']))
       {
          echo $_SESSION["ws"]["dia"]["identProblem3"];
          $_SESSION["ws"] = array(); exit;
       }

       if ( $ldap['user']."" == "" || $ldap['pass']."" == "" )
       {
          echo $_SESSION["ws"]["dia"]["cantIdent"];
          $_SESSION["ws"] = array(); exit;
       }

       if (!($bind=@ldap_bind($ldap['conn'], $ldap['user'], $ldap['pass'])))
       {
          echo $_SESSION["ws"]["dia"]["cantIdent"];
          $_SESSION["ws"] = array(); exit;
       }
       ldap_close($ldap['conn']);

       // L'utilisateur est authentifié sur le serveur LDAP
       if ( strtoupper(left($ldap['user'],strlen($Conf_Domain))) == strtoupper($Conf_Domain) )
              $ldapUser = substr($ldap['user'],strlen($Conf_Domain)+1);
       else   $ldapUser = $ldap['user'];

       /*if ($_SESSION["ws"]["nomUser"] != $ldapUser)
       {
          echo $_SESSION["ws"]["dia"]["cantIdent"]; exit;
       }*/
  }

  // Vérifications d'usage
  if (!$countUser) {
    $_SESSION["ws"] = array();
    echo "<br/>".$_SESSION["ws"]["dia"]["noUser"];
    exit;
  }

  if    ($_SESSION["ws"]["passUser"]!=md5($pass)) {
    echo $_SESSION["ws"]["dia"]["cantIdent"];
         $_SESSION["ws"] = array();
    exit;
  }

  if (count($_SESSION["ws"]["listeServeur"])) {

    $nomSrv  = $_SESSION["ws"]["listeServeur"][0];
    $_SESSION["ws"]["dossierActif"]=blindeChemin($_SESSION["ws"]["$nomSrv"]["startServeur"]);
    $_SESSION["ws"]["serveurActif"]=$_SESSION["ws"]["$nomSrv"]["nomServeur"];
    $tempList= $_SESSION["ws"]["listeServeur"];
    
    $listeTri= explode(",",$_SESSION["ws"]["$nomSrv"]["triServeur"]);

    $cmpServeur= count($listeTri);
    if (($cmpServeur!=$maxServeur)||(count(array_diff($listeTri,$listeTriImp))>0)) {
      $listeTri="";
      foreach ($listeTriImp as $dataList) $listeTri.= "$dataList,";
      $listeTri= substr($listeTri,0,-1);
      foreach ($_SESSION["ws"]["listeServeur"] as $nomSrv)
        $_SESSION["ws"]["$nomSrv"]["triServeur"]= $listeTri;
    }

    $compt=0;
    foreach ($listeTri as $data) {
      foreach ($tempList as $dataBis) {
        if (($data==$_SESSION["ws"]["$dataBis"]["idServeur"])&&($compt==0)) {
          $_SESSION["ws"]["dossierActif"]=blindeChemin($_SESSION["ws"]["$dataBis"]["startServeur"]);
          $_SESSION["ws"]["serveurActif"]=$_SESSION["ws"]["$dataBis"]["nomServeur"];
          $compt++;
        }
      }
    }

    foreach ($_SESSION["ws"]["listeServeur"] as $nomSrv) {
      $_SESSION["ws"]["$nomSrv"]["rootServeur"] = str_replace("\$user\$",$_SESSION["ws"]["nomUser"],$_SESSION["ws"]["$nomSrv"]["rootServeur"]);
      $_SESSION["ws"]["$nomSrv"]["repServeur"]  = str_replace("\$user\$",$_SESSION["ws"]["nomUser"],$_SESSION["ws"]["$nomSrv"]["repServeur"]);
      $_SESSION["ws"]["$nomSrv"]["startServeur"]= str_replace("\$user\$",$_SESSION["ws"]["nomUser"],$_SESSION["ws"]["$nomSrv"]["startServeur"]);
      if (empty($_SESSION["ws"]["$nomSrv"]["rootServeur"]))
        $_SESSION["ws"]["$nomSrv"]["rootServeur"]=$racineServeur;
    }

    $_SESSION["ws"]["repCorbeille"]="";
    if ((fileperms("$racineBin") & 0x4000) == 0x4000) $_SESSION["ws"]["repCorbeille"]=$racineBin;
    if ((fileperms("$racineEdt") & 0x4000) == 0x4000) $_SESSION["ws"]["repEditor"]=$racineEdt;
    if ((fileperms("$racineLog") & 0x4000) == 0x4000) $_SESSION["ws"]["repLog"]=$racineLog;
    $_SESSION["ws"]["senstriUser"]="asc";

    if ($_SESSION["ws"]["langUser"]=="Auto") $_SESSION["ws"]["langUser"]  = deflang();

    $_SESSION["ws"]["uniqKey"]= md5(uniqid(rand(), true));
    $_SESSION["ws"]["progress"]="";
    $tabLog= array("20","1",$_SESSION["ws"]["dia"]["connected"]." ".$_SESSION["ws"]["nomUser"],$_SESSION["ws"]["nomUser"],$_SESSION["ws"]["dossierActif"],"Private","");
    $l_mysql->logAction($tabLog);
    if ($mode=="normal") echo "valid"; else {
      echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><head><meta http-equiv="Refresh" content="0;URL=start.php"></head></html>';
    }
    exit;

  } else {
    $_SESSION["ws"] = array();
    echo "<br/>".$_SESSION["ws"]["dia"]["noServ"]; exit;
  }

 } else {
   if ($_SESSION["ws"]["autoUserAcc"]==0) $autoUserAccount="";
    else $autoUserAccount=$_SESSION["ws"]["dia"]["createNewAccount"];
   $_SESSION["ws"] = array();
   include "lang/$deflang.lang.php";
 }

} else {
  $_SESSION["ws"] = array();
  echo "<br/>".$_SESSION["ws"]["dia"]["noConf"]; exit;
}


?>
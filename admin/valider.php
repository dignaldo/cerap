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
// Fonction : Script de validation des modifications admin
// Nom      : valider.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
session_start();
include_once "auth.php";
include_once "admin.php";

  $param= array(); $pass=""; $supprime=0; $erreur=0;
  $remplacement=0; $cptserveur=0; $oldPassBase="";
  $verifCompatib=0; $srvCompatib=0;
  if ($_REQUEST["supprime"]=="1") $supprime= 1;
  switch ($_REQUEST["validation"]) {
    case "user":    $paramType = 1; break;
    case "serveur": $paramType = 2; break;
    case "base":    $paramType = 3; break;
    case "asso":    $paramType = 4; break;
  }

  if ($paramType==2) {
    if ($supprime==1) {
      $listeRmv="";
      $listeTri= explode(",",$_REQUEST["triServeur"]);
      foreach ($listeTri as $data) {
        if ($data!=$_REQUEST["idServeur"]) $listeRmv.= "$data,"; }
      $_REQUEST["triServeur"]= substr($listeRmv,0,strlen($listeRmv)-1);
    }
    if ($_REQUEST["numServeur"]=="-1")      $_REQUEST["triServeur"]= "$_REQUEST[triServeur],$_REQUEST[idServeur]";
    if ($_REQUEST["triServeur"][0]==",")    $_REQUEST["triServeur"]= substr($_REQUEST["triServeur"],1);
  }

// Compatibilité avec les anciennes versions
  function verifCompatible() {
    global $dest, $verifCompatib, $srvCompatib;
    if ($verifCompatib==1) {
      fwrite($dest, "triServeur= ".$_REQUEST["triServeur"]."\n");
      fwrite($dest,  "idServeur= ".$srvCompatib."\n");
      $srvCompatib++;
      if ($_REQUEST["idServeur"]==$srvCompatib) $srvCompatib++;
    }
    $verifCompatib=0;
  }

// Ecriture des informations dans le fichier .ini

  // ==== Ouverture du fichier d'origine et d'un nouveau fichier temporaire ====
  $chemin= $_REQUEST["chemin"];
  if (($dest = fopen($chemin.".tmp", "w+")) === FALSE) $erreur=1; else { $erreur = 0;

  if (is_file($chemin)) {
    $lines = file($chemin);
    foreach ($lines as $line_num => $line) {
      list($varnom,$valeur)= explode ("=",rtrim($line));
      if ($varnom=="passBase") $oldPassBase= trim($valeur);      
    }

    // ==== Chargement et détection des paramètres ====
    foreach ($lines as $line_num => $line) {
      // Détection d'un utilisateur
      if ((preg_match("/^\[([[:alnum:][:space:]_-]+)\]/i", rtrim($line),$paramNom)==1)) {
        $remplacement=0; $verifCompatib=0;
        if (isset($_REQUEST["selUser"])&&($paramNom[1]==$_REQUEST["selUser"])&&($paramType==1)&&(!$l_mysql->test()))
          $remplacement=1;
      }
      // Détection d'un serveur
      if ((preg_match("/^\[#([[:alnum:][:space:]_-]+)\]/i",rtrim($line),$paramNom)==1)) {
        $remplacement=0; $verifCompatib=1;
        if (isset($_REQUEST["selServeur"])&&($paramNom[1]==$_REQUEST["selServeur"])&&($paramType==2)&&(!$l_mysql->test()))
          $remplacement=1;
      }
      // Détection des préférences
      if ((preg_match("/^\[\*Webshare\*\]/i",rtrim($line),$paramNom)==1)) {
        $remplacement=0; $verifCompatib=0;
        if ($paramType==3)
          $remplacement=1;
      }
      // Détection des associations
      if ((preg_match("/^\[>Associations\]/i",rtrim($line),$paramNom)==1)) {
        $remplacement=0; $verifCompatib=0;
        if (($paramType==4)&&(!$l_mysql->test()))
          $remplacement=1;
      }

      $contenu= explode ("=",rtrim($line));

      // Compatibilité avec les anciennes versions
      if ($verifCompatib==1) {
        if (($contenu[0]=="triServeur")||($contenu[0]=="idServeur")) $verifCompatib=2;
        if (empty($contenu[0])&&!$remplacement) verifCompatible();
      }

      if (!$remplacement || !$supprime) {
        if (!$remplacement) {
          if (!isset($contenu[1]) || !$supprime || ($paramType != 2) || (trim($_REQUEST["selServeur"])!=trim($contenu[1])) || (substr($contenu[0],0,7)!="serveur") )
            if (($contenu[0]!="triServeur")||($paramType != 2)) fwrite($dest, $line);
            else fwrite($dest, "triServeur= ".$_REQUEST["triServeur"]."\n");
        } else {
            if (isset($contenu[1]) && isset($contenu[0])) { $nomvar=trim($contenu[0]); $result=trim($contenu[1]);
            if (($nomvar=="passUser") || ($nomvar=="passServeur")) $pass=$result; }
        }
      }

    }
  }
  if (!$supprime) {

  // ==== Ajout d'un nouvel utilisateur ou utilisateur modifié ====
  if (($paramType==1)&&(!$l_mysql->test())) {
      $_SESSION["ws"]["rlutil"]= $_REQUEST["idUser"];
      fwrite($dest, "\n[".(!empty($_REQUEST["nomUser"])?$_REQUEST["nomUser"]:$_REQUEST["selUser"])."]\n");
      foreach ($_REQUEST as $nomvar => $result) {
        if (($nomvar!="PHPSESSID")&&($nomvar!="validation")&&($nomvar!="supprime")&&($nomvar!="newPass")&&($nomvar!="selUser")&&($nomvar!="passUserc")&&($nomvar!="numUser")&&($nomvar!="chemin")&&(($result!="")||($nomvar=="passUser"))) {
          if (substr($nomvar,0,7)=="serveur") { $nomvar="serveur".$cptserveur; $cptserveur++; }
          if ($nomvar!="passUser") fwrite($dest, "$nomvar= $result\n"); else {
            if ($result!="password") fwrite($dest, "$nomvar= ".md5($result)."\n");
                                else fwrite($dest, "$nomvar= ".$pass."\n");
          }
        }
      }
  }
  // ==== Ajout d'un nouveau serveur ou serveur modifié ====
  if (($paramType==2)&&(!$l_mysql->test())) {
      $_SESSION["ws"]["rlserv"]= $_REQUEST["idServeur"];
      fwrite($dest, "\n[#".(!empty($_REQUEST["nomServeur"])?$_REQUEST["nomServeur"]:$_REQUEST["selServeur"])."]\n");
      foreach ($_REQUEST as $nomvar => $result) {
        if (($nomvar!="PHPSESSID")&&($nomvar!="validation")&&($nomvar!="supprime")&&($nomvar!="newPass")&&($nomvar!="selServeur")&&($nomvar!="numServeur")&&($nomvar!="chemin")&&($result!="")) {
          if ($nomvar=="passServeur") {
            if (($result!="password") && ($result!="")) fwrite($dest, "$nomvar= ".base64_encode($result)."\n");
                                                   else fwrite($dest, "$nomvar= ".$pass."\n");
          } else fwrite($dest, "$nomvar= $result\n");
        }
      }
  }
  // ==== Ajout des préférences ====
  if ($paramType==3) {
    fwrite($dest, "\n[*Webshare*]\n");
    foreach ($_REQUEST as $nomvar => $result) {
      if ($nomvar=="passBase") {
        if ($result=="passBase") $result=$oldPassBase;
                            else $result=base64_encode($result); }
      if (($nomvar!="PHPSESSID")&&($nomvar!="validation")&&($nomvar!="chemin")&&($result!=""))
        fwrite($dest, "$nomvar= $result\n");
    }

    // ==== Création éventuelle d'un htaccess dans moteur ====
    $setmem=""; if ( (preg_match("/cgi/i",strtolower(php_sapi_name()))==0) &&
                  (preg_match("/apache/i",strtolower(php_sapi_name()))==1) )
         $setmem="1";
    if ($setmem=="1") {
      if (($paramFile = fopen("../moteur/.htaccess", "w+")) !== FALSE) {
        $params=  "";
        if (!empty($_REQUEST["execMax"])) $params.= "php_value max_execution_time ".$_REQUEST["execMax"]."\n";
        if (!empty($_REQUEST["postMax"])) $params.= "php_value post_max_size ".$_REQUEST["postMax"]."\n";
        if (!empty($_REQUEST["timeMax"])) $params.= "php_value max_input_time ".$_REQUEST["timeMax"]."\n";
        if (!empty($_REQUEST["uploMax"])) $params.= "php_value upload_max_filesize ".$_REQUEST["uploMax"]."\n";
        if (!empty($_REQUEST["lifeMax"])) $params.= "php_value session.gc_maxlifetime ".$_REQUEST["lifeMax"]."\n";
        fwrite($paramFile,$params);
      }
    }
  }
  // ==== Ajout des associations ====
  if (($paramType==4)&&(!$l_mysql->test())) {
    fwrite($dest, "\n[>Associations]\n");
    foreach ($_REQUEST as $nomvar => $result) {
      if ((preg_match("/extinfo/",$nomvar)==1)&&($result!="")) {
        $seppos= strpos($result,"|");
        $var1  = substr($result,0,$seppos);
        $var2  = substr($result,$seppos+1,strlen($result));
        fwrite($dest, "$var1= $var2\n");
      }
    }
  }

  }

  // Fermeture des fichiers, le nouveau fichier remplace celui d'origine
  fclose ($dest);
  if (is_file($chemin)) unlink ($chemin);
  rename ($chemin.".tmp",$chemin);
}

// Si connexion à la base de données
  if ($l_mysql->test()) {

// Ecriture des informations en base de données
  $p_param= $l_mysql->blinde_param($_REQUEST);

  if (!$supprime) {
  
  // En fonction de paramtype, rajout ou remplacement des données
  switch ($paramType) {
  
    case 1 : // User : remplacement si existant ou ajout
      $verifUser = $l_mysql->request_result("SELECT nomUser FROM wsuser where nomUser='$p_param[selUser]'");
      $_SESSION["ws"]["rlutil"]= $p_param["idUser"];
      $listeServeur= "";
      foreach ($p_param as $nomvar => $result) {
        if ((preg_match("/serveur/",$nomvar)==1)&&($result!="")) 
          $listeServeur.= $result."|"; 
      }
      $listeServeur= substr($listeServeur,0,strlen($listeServeur)-1);
      $updatePass=0;           
      if ($p_param["passUser"]!="password") {
        $p_param["passUser"]= md5($p_param["passUser"]);
        $updatePass=1;
      }
        
      if (!isset($verifUser[0]["nomUser"])) {
        $requete="INSERT INTO wsuser ( idUser, typeUser, nomUser, logUser,".(($updatePass==1)?" passUser,":"")."
          serveurs, langUser, styleUser, visuUser, triUser, varsUser, webUser, mailUser, publicUser,
          arboUser, auth1, auth2, auth3, auth4, auth5, auth6, auth7, auth8 ) VALUES (
          '$p_param[idUser]', '$p_param[typeUser]', '$p_param[nomUser]', '$p_param[logUser]',".(($updatePass==1)?" '$p_param[passUser]',":"")."
          '$listeServeur', '$p_param[langUser]', '$p_param[styleUser]', '$p_param[visuUser]',
          '$p_param[triUser]', '$p_param[varsUser]', '$p_param[webUser]', '$p_param[mailUser]','$p_param[publicUser]', '$p_param[arboUser]',
          '$p_param[auth1]', '$p_param[auth2]', '$p_param[auth3]', '$p_param[auth4]', 
          '$p_param[auth5]', '$p_param[auth6]', '$p_param[auth7]', '$p_param[auth8]')";
      } else {
        $requete="UPDATE wsuser SET idUser = '$p_param[idUser]', typeUser = '$p_param[typeUser]', nomUser = '$p_param[nomUser]',
          logUser = '$p_param[logUser]', ".(($updatePass==1)?" passUser = '$p_param[passUser]',":"")."  
          serveurs = '$listeServeur', langUser = '$p_param[langUser]', styleUser = '$p_param[styleUser]', 
          visuUser = '$p_param[visuUser]', triUser = '$p_param[triUser]', varsUser = '$p_param[varsUser]', 
          webUser = '$p_param[webUser]', arboUser = '$p_param[arboUser]', mailUser = '$p_param[mailUser]', publicUser = '$p_param[publicUser]',
          auth1 = '$p_param[auth1]', auth2 = '$p_param[auth2]', auth3 = '$p_param[auth3]', auth4 = '$p_param[auth4]', 
          auth5 = '$p_param[auth5]', auth6 = '$p_param[auth6]', auth7 = '$p_param[auth7]', auth8 = '$p_param[auth8]' 
          WHERE idUser = '$p_param[idUser]' LIMIT 1 ;";
      }
      break;  
      
    case 2 : // Serveur : remplacement si existant ou ajout
      $verifShare = $l_mysql->request_result("SELECT nomServeur FROM wsserver WHERE nomServeur='$p_param[selServeur]'");
      $maxServeur = $l_mysql->request_result("SELECT max(idServeur) as nb FROM wsserver ");
      $max = intval($maxServeur[0]["nb"]); if ($max>=1) $max+=1;
      $_SESSION["ws"]["rlserv"]= $p_param["idServeur"];
      $updatePass=0;           
      if (($p_param["passServeur"]!="password") && ($p_param["passServeur"]!="")) {
        $p_param["passServeur"]= base64_encode($p_param["passServeur"]);
        $updatePass=1;
      }
                
      if (!isset($verifShare[0]["nomServeur"])) {
        $requete=" INSERT INTO wsserver ( idServeur, typeServeur, nomServeur,
          rootServeur, repServeur, startServeur, adrServeur, logServeur, ".(($updatePass==1)?" passServeur,":"")." 
          portServeur, webServeur, protectIndex, protectHtacc, binServeur, protectServeur, publicServeur ) VALUES (
          '$p_param[idServeur]', '$p_param[typeServeur]', '$p_param[nomServeur]', '$p_param[rootServeur]',
          '$p_param[repServeur]', '$p_param[startServeur]', '$p_param[adrServeur]', '$p_param[logServeur]', 
          ".(($updatePass==1)?" '$p_param[passServeur]',":"")." '$p_param[portServeur]', '$p_param[webServeur]',
          '$p_param[protectIndex]', '$p_param[protectHtacc]', '$p_param[binServeur]', '$p_param[protectServeur]', '$p_param[publicServeur]' )";
      } else {
        $requete="UPDATE wsserver SET idServeur = '$p_param[idServeur]', typeServeur = '$p_param[typeServeur]',
          nomServeur = '$p_param[nomServeur]', rootServeur = '$p_param[rootServeur]', repServeur = '$p_param[repServeur]', 
          startServeur = '$p_param[startServeur]', adrServeur = '$p_param[adrServeur]', logServeur = '$p_param[logServeur]', 
          ".(($updatePass==1)?" passServeur = '$p_param[passServeur]',":"")."  portServeur = '$p_param[portServeur]',
          webServeur = '$p_param[webServeur]', publicServeur = '$p_param[publicServeur]',
          protectIndex = '$p_param[protectIndex]', protectHtacc = '$p_param[protectHtacc]', 
          binServeur = '$p_param[binServeur]', protectServeur = '$p_param[protectServeur]' 
          WHERE idServeur = '$p_param[idServeur]' LIMIT 1 ;";
      }
      break;  
      
    case 3 : // Préférences : remplacement
      $l_mysql->request("DELETE FROM wsbase ;");
      $requete=" 
      INSERT INTO wsbase ( pageTitle ,prevWeb ,prevAct ,prevPDF ,activeLog ,autoUserAcc ,
        vClock ,effectAct ,sepAdr ,compPath ,arboLink ,dynWin ,linkWin ,sendMail ,
        actConf ,clicl ,clicr ,clicd ,diapoSp, memoMax, execMax, postMax, timeMax, uploMax, lifeMax ) 
        VALUES ( '$p_param[pageTitle]', 
        '$p_param[prevWeb]', '$p_param[prevAct]', '$p_param[prevPDF]', '$p_param[activeLog]', '$p_param[autoUserAcc]',
        '$p_param[vClock]', '$p_param[effectAct]','$p_param[sepAdr]',  '$p_param[compPath]',
        '$p_param[arboLink]','$p_param[dynWin]',  '$p_param[linkWin]', '$p_param[sendMail]', 
        '$p_param[actConf]', '$p_param[clicl]',   '$p_param[clicr]',   '$p_param[clicd]',
        '$p_param[diapoSp]', '$p_param[memoMax]', '$p_param[execMax]', '$p_param[postMax]', 
        '$p_param[timeMax]', '$p_param[uploMax]', '$p_param[lifeMax]') ;";

      break; 
      
    case 4 : // Associations : remplacement
      $l_mysql->request("DELETE FROM wsasso ;");
      foreach ($p_param as $nomvar => $result) {
        if ((preg_match("/extinfo/",$nomvar)==1)&&($result!="")) {
          $seppos= explode("|", $result);
          $l_mysql->request("INSERT INTO wsasso (type, libelle, mime, action1, action2) VALUES
            ('$seppos[0]', '$seppos[1]', '$seppos[2]', '$seppos[3]', '$seppos[4]'); ");   
        }
      }
      break; 
  }    

  if ($paramType!=4)
    if (($result= $l_mysql->request_result($requete))===false) $erreur=1; else $erreur=0;

  } else {
    // Suppression dans la base de données
    switch ($paramType) {
  
      case 1 : // User : Suppression
      if (($l_mysql->request("DELETE FROM wsuser WHERE idUser = '$p_param[idUser]' LIMIT 1;"))===false) $erreur=1; else $erreur=0;
      break;
      case 2 : // Serveur : Suppression
      if (($l_mysql->request("DELETE FROM wsserver WHERE idServeur = '$p_param[idServeur]' LIMIT 1;"))===false) $erreur=1; else $erreur=0;
      break;
    }
  }
  
    if ($paramType==2)
      if (($l_mysql->request("UPDATE wsserver SET triServeur ='$p_param[triServeur]' "))===false) $erreur=1; else $erreur=0;

}

  if ($erreur==1) echo "<span style='background:#F66'>&nbsp;".$_SESSION["ws"]["dia"]["adminAlert1"]."&nbsp;</span>";
             else echo "<span style='background:#6F6'>&nbsp;".$_SESSION["ws"]["dia"]["adminAlert2"]."&nbsp;</span>";
?>
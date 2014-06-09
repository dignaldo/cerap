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
// Fonction : Renomme un dossier ou un fichier
// Nom      : renommer.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
header ("Content-type: text/html; charset=utf-8");
session_start();
include_once "auth.php";
include_once "fonctions.php";
$l_mysql = new class_mysql();
$l_mysql->connect();

// Récupération des informations serveurs
if (!empty($_REQUEST["nomSrv"])) $nomSrv= $_REQUEST["nomSrv"];
                            else $nomSrv= $_SESSION["ws"]["serveurActif"];
                                 $nomPro= $_REQUEST["nomPro"];
             $typeSrv= $_SESSION["ws"]["$nomSrv"]["typeServeur"];
$chemin=  blindeChemin($_SESSION["ws"]["$nomSrv"]["rootServeur"]."/".$_SESSION["ws"]["$nomSrv"]["repServeur"]."/");

// L'utilisateur ne peut pas effectuer d'opération au dessus de sa racine virtuelle
verifie($_REQUEST["nomLien"]);
verifie($_REQUEST["nomNouveau"]);

// L'utilisateur doit être autorisé à effectuer l'opération
if ($_SESSION["ws"]["auth4"]=="on") {

// Les deux noms doivent être remplis obligatoirement
if (!empty($_REQUEST["nomLien"]) && !empty($_REQUEST["nomNouveau"])) {

// Construction des chemins
  $nomLien= urldecode(stripslashes(trim($_REQUEST["nomLien"])));
  $nomNouveau= convCar(urldecode(stripslashes(trim($_REQUEST["nomNouveau"]))));
  $extNouveau= urldecode(trim($_REQUEST["extNouveau"]));
  if (!empty($extNouveau)) $nomNouveau .=".".$extNouveau;

  $cheminElement=         blindeChemin(utf8_encode($chemin).$nomLien);
  $cheminGlobal = dirname(blindeChemin(utf8_encode($chemin).$nomLien))."/";
  $cheminNouveau= $cheminGlobal.$nomNouveau;
  if ($cheminNouveau{strlen($cheminNouveau)-1}=='.') $cheminNouveau= substr($cheminNouveau,0,strlen($cheminNouveau)-1);
  if    ($nomNouveau{strlen(   $nomNouveau)-1}=='.')    $nomNouveau= substr(   $nomNouveau,0,strlen($nomNouveau)-1);

// Test du contenu des variables
  if ((preg_match($_SESSION["ws"]["varsUser"], $_REQUEST["nomNouveau"])==1)||(preg_match($_SESSION["ws"]["varsUser"], $_REQUEST["extNouveau"])==1)) {
    $tabLog= array("11", "-1", $_SESSION["ws"]["dia"]["noPermission"],$_SESSION["ws"]["nomUser"],$cheminElement,$nomNouveau,"");
    $l_mysql->logAction($tabLog);
    echo $_SESSION["ws"]["dia"]["noPermission"];
    exit; }

// Renommage du fichier
  if ($typeSrv=="1") {
  // En local
    if (@rename(utf8_decode($cheminElement),utf8_decode($cheminNouveau))===false)
           $message= (($_REQUEST["nomPro"]!="dossier")?$_SESSION["ws"]["dia"]["theFile"]:$_SESSION["ws"]["dia"]["theDir"])." '".basename($nomLien)."' ".$_SESSION["ws"]["dia"]["hasNotBeen"]." ".$_SESSION["ws"]["dia"]["renamed"]." ".$_SESSION["ws"]["dia"]["into"]." '".$nomNouveau."'. ".$erreur;
    else { $message= (($_REQUEST["nomPro"]!="dossier")?$_SESSION["ws"]["dia"]["theFile"]:$_SESSION["ws"]["dia"]["theDir"])." '".basename($nomLien)."' ".$_SESSION["ws"]["dia"]["hasBeen"]   ." ".$_SESSION["ws"]["dia"]["renamed"]." ".$_SESSION["ws"]["dia"]["into"]." '".$nomNouveau."'  ".$_SESSION["ws"]["dia"]["withSuccess"];
           $tabFile= array("idUser"=>$_SESSION["ws"]["idUser"],"nomUser"=>$_SESSION["ws"]["nomUser"],"idServeur"=>$_SESSION["ws"]["$nomSrv"]["idServeur"],
                           "nomServeurD"=>$nomSrv,"nomServeurF"=>$nomSrv,"cheminD"=>$cheminGlobal,"nomD"=>basename($nomLien),"cheminF"=>$cheminGlobal,"nomF"=>$nomNouveau);
           $l_mysql->updateFileInfo($tabFile); }
  } else {
    // En FTP
    $_SESSION["ws"]["$nomSrv"]["connexion"]=connexionFTP($nomSrv);
    if (@ftp_rename($_SESSION["ws"]["$nomSrv"]["connexion"],utf8_decode($cheminElement),utf8_decode($cheminNouveau))===false)
           $message= (($_REQUEST["nomPro"]!="dossier")?$_SESSION["ws"]["dia"]["theFile"]:$_SESSION["ws"]["dia"]["theDir"])." '".basename($nomLien)."' ".$_SESSION["ws"]["dia"]["hasNotBeen"]." ".$_SESSION["ws"]["dia"]["renamed"]." ".$_SESSION["ws"]["dia"]["into"]." '".$nomNouveau."'. ".$erreur;
    else { $message= (($_REQUEST["nomPro"]!="dossier")?$_SESSION["ws"]["dia"]["theFile"]:$_SESSION["ws"]["dia"]["theDir"])." '".basename($nomLien)."' ".$_SESSION["ws"]["dia"]["hasBeen"]   ." ".$_SESSION["ws"]["dia"]["renamed"]." ".$_SESSION["ws"]["dia"]["into"]." '".$nomNouveau."'  ".$_SESSION["ws"]["dia"]["withSuccess"];
           $tabFile= array("idUser"=>$_SESSION["ws"]["idUser"],"nomUser"=>$_SESSION["ws"]["nomUser"],"idServeur"=>$_SESSION["ws"]["$nomSrv"]["idServeur"],
                           "nomServeurD"=>$nomSrv,"nomServeurF"=>$nomSrv,"cheminD"=>$cheminGlobal,"nomD"=>basename($nomLien),"cheminF"=>$cheminGlobal,"nomF"=>$nomNouveau);
           $l_mysql->updateFileInfo($tabFile); }
  }

}
} else { $message= $_SESSION["ws"]["dia"]["prohibited"]; }

echo $message;

$tabLog= array("11","1",$message,$_SESSION["ws"]["nomUser"],$cheminElement,$nomNouveau,"");
$l_mysql->logAction($tabLog);
$l_mysql->disconnect();
?>
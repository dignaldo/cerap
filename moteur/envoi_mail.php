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
// Fonction : Envoi un élément par mail
// Nom      : envoi_mail.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
header ("Content-type: text/html; charset=utf-8");
session_start();
include_once "auth.php";
include_once "fonctions.php";
$l_mysql = new class_mysql();

$nomSrv = $_SESSION["ws"]["serveurActif"];
$chemin = blindeChemin($_SESSION["ws"]["$nomSrv"]["rootServeur"]."/".$_SESSION["ws"]["$nomSrv"]["repServeur"]."/".$_SESSION["ws"]["dossierActif"]."/");
$typeSrv= $_SESSION["ws"]["$nomSrv"]["typeServeur"];
$regMail= "/^[a-zA-Z0-9\.\-_]+@[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,5}$/i";
$boundary = '-----=' . md5( uniqid ( rand() ) );

// L'utilisateur ne peut pas effectuer d'opération au dessus de sa racine virtuelle
verifie($_REQUEST["nomElement"]);

// L'utilisateur doit être autorisé à effectuer l'opération
if ($_SESSION["ws"]["sendMail"]=="1") {

// Test du contenu des variables
if (!empty($_REQUEST["nomElement"])&&!empty($_REQUEST["adresseElement"])&&!empty($_REQUEST["titleElement"])) {
  if (preg_match($_SESSION["ws"]["varsUser"], $_REQUEST["nomElement"])==1) { echo $_SESSION["ws"]["dia"]["noPermission"]; exit; }
  if (preg_match($regMail,$_REQUEST["adresseElement"])==0) { echo $_SESSION["ws"]["dia"]["sendMailProblem"]; exit; }

// Construction des chemins
  $chemin        = utf8_encode($chemin);
  $nomFichier    = convCar(urldecode(trim($_REQUEST["nomElement"])));
  $cheminFichier = stripslashes(blindeChemin($chemin.$nomFichier));
  $extension     = trim($_REQUEST["typeElement"]);
  $mimeFichier   = $_SESSION["ws"]["assoc"]["$extension"]["extmime"];

// Lecture du fichier
  if ($typeSrv=="1") {
    if (($fp = fopen($cheminFichier, 'rb'))===false) { echo $_SESSION["ws"]["dia"]["noPermission"]; exit; }
    $fileContent   = fread($fp, filesize($cheminFichier));
    fclose($fp);
  } else {
    $_SESSION["ws"]["$nomSrv"]["connexion"]=connexionFTP($nomSrv);
    $fileContent = ftp_get_contents($_SESSION["ws"]["$nomSrv"]["connexion"], $cheminFichier, FTP_BINARY);
  }

// Création du header et du message
  $contentEncode = chunk_split(base64_encode($fileContent));
  $headers =     'From: "'.$_SESSION["ws"]["nomUser"].'"<'.$_SESSION["ws"]["mailUser"].'>'."\r\n"
           . 'Reply-To: "'.$_SESSION["ws"]["nomUser"].'"<'.$_SESSION["ws"]["mailUser"].'>'."\r\n"
           . "Content-Type: multipart/mixed; boundary=\"$boundary\""."\r\n"
           . "MIME-Version: 1.0";

  $msg  = "Message au format MIME 1.0 multipart/mixed.\n\n";
  $msg .= "--".$boundary."\n";
  $msg .= "Content-Type: text/plain; charset=\"utf-8\"\n";
  $msg .= "Content-Transfer-Encoding: 8bit\n\n";
  $msg .= utf8_decode($_REQUEST["textElement"])."\n\n";
  
  $msg .= "--".$boundary."\n";
  $msg .= "Content-Type: $mimeFichier; charset=\"utf-8\"; name=\"$nomFichier\"\n";
  $msg .= "Content-Transfer-Encoding: base64\n";

  $msg .= "Content-Disposition: attachment; filename=\"$nomFichier\"\n\n";
  $msg .= $contentEncode."\n\n\n";
  $msg .= "--".$boundary."--\n";

// Envoi du message
  if (($resultat=@mail($_REQUEST["adresseElement"], utf8_decode($_REQUEST["titleElement"]), $msg, $headers))===false)     
       $message= $_SESSION["ws"]["dia"]["sendMailProblem"];
  else $message= $_SESSION["ws"]["dia"]["sendMailOK"];
 
}
} else { $message= $_SESSION["ws"]["dia"]["sendMailProblem"]; }

echo $message;

?>
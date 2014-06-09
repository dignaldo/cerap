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
// Fonction : Ouvre un fichier selon son type
// Nom      : ouvrir.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
session_start();
include_once "auth.php";
include_once "fonctions.php";
$l_mysql = new class_mysql();
$l_mysql->connect();

$nomSrv   = $_SESSION["ws"]["serveurActif"];
if (isset($_REQUEST["srv"])) $nomSrv=$_REQUEST["srv"];
$chemin   = utf8_encode($_SESSION["ws"]["cheminActif"]);
$cheminRep= $_SESSION["ws"]["rootWeb"].blindeChemin("/".$_SESSION["ws"]["dossierActif"]."/");
$url      = stripslashes($_REQUEST["url"]);
$rep      = utf8_decode(blindeChemin("$chemin/$url"));
$fichier  = basename($rep);
$typeSrv  = $_SESSION["ws"]["$nomSrv"]["typeServeur"];

if ($typeSrv==2) $_SESSION["ws"]["$nomSrv"]["connexion"]=connexionFTP($nomSrv);

if (strstr($url,"http")===false) { 
       $distant=0; $extension= strtolower(substr($url,intval(strrpos($url, "."))+1)); }
else { $distant=1; preg_match("!^([[:alpha:]]*)\:\/\/([[:alnum:]-\.]*)[\/]?([[:alnum:]-\/]*)\.([[:alnum:]]*)[\?]?([[:alnum:]=&]*).*$!","$url",$reglien);
       $extension=strtolower(trim($reglien[4])); $site=$cheminRep; }


if  (isset($_REQUEST["pop"])&&($_REQUEST["pop"]=="1")) $pop=1; else $pop=0;
if  (isset($_REQUEST["nothl"])&&($_REQUEST["nothl"]=="1")) $nothl=1; else $nothl=0;
if ((isset($_REQUEST["forcedl"]) && $_REQUEST["forcedl"]==1)) $forcedl=1; else $forcedl=0;
$typeMime = $_SESSION["ws"]["assoc"]["$extension"]["extmime"];
verifie($url);

// Force le téléchargement si requis
if ($typeMime=="image/jpeg") header("Content-Type: ".$typeMime); else {
if ($forcedl||($typeMime=="")) { header("Content-type: application/force-download"); $pop=1; }
elseif (($typeMime!="text/plain")&&($typeMime!="text/html")&&($typeMime!="application/x-font-TrueType"))
  header("Content-Type: ".$typeMime);
}

// Ouvre le fichier en popup si requis
$nomfichier= jsToUtf8($fichier);

//header("Accept-Ranges: bytes");
//header("Content-Length: ".filesize($rep));

header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: pre-check=0, post-check=0, max-age=0');
header('Pragma: anytextexeptno-cache', true);
header('Cache-control: private');
header('Expires: 0');

if ($pop||$forcedl) header("content-disposition: attachment; filename=\"$nomfichier\"");
               else header("content-disposition: filename=\"$nomfichier\"");

flush();

// Lecture d'un Flux RSS
if ($typeMime=="text/xml") {
  if ($distant) $content= @file_get_contents($url);
           else if ($typeSrv==1) $content= @file_get_contents($rep);
           else $content= ftp_get_contents($_SESSION["ws"]["$nomSrv"]["connexion"], $rep, FTP_BINARY);

  if (!$nothl) {
    if (preg_match("/(<.*xml-stylesheet.*>)/i")==1)
         $content=preg_replace("/(<\/*rss.*>)/i","",preg_replace("/(<.*xml-stylesheet.*>)/i",'<'.'?xml-stylesheet type="text/xsl" href="xsl/rss.xsl.php" ?'.'>',$content));
    else $content=preg_replace("/(<\/*rss.*>)/i","",preg_replace("/(<channel>)/i",'<'.'?xml-stylesheet type="text/xsl" href="xsl/rss.xsl.php" ?'.'><channel>',$content));
  }
  $content=preg_replace("/(:encoded)/i","",$content);
  if ($distant) echo $content."\n"; else echo utf8_encode($content)."\n";

// Lecture d'un fichier texte
} elseif (($typeMime=="text/plain")||($typeMime=="text/css")||(!strrpos($fichier, "."))) {
  header("Content-Type: text/html; Charset=UTF-8");
  if ($distant) $content= @file_get_contents($url);
           else if ($typeSrv==1) $content= @file_get_contents($rep);
           else $content= ftp_get_contents($_SESSION["ws"]["$nomSrv"]["connexion"], $rep, FTP_BINARY);

  if (($extension=="php")&&!$nothl&&!$distant&&!$forcedl&&!$pop) $content= ColorPhpCode($content);
    if ($distant||($typeSrv==2)) {
      $content= preg_replace('/src="([^h][^t][^t][^p].*)"/'  ,'src="'.$site.'\\1"',$content);
      $content= preg_replace("/src='([^h][^t][^t][^p].*)'/"  ,"src='".$site."\\1'",$content);
      $content= preg_replace('/href="([^h][^t][^t][^p].*)"/','href="'.$site.'\\1"',$content);
      $content= preg_replace("/href='([^h][^t][^t][^p].*)'/","href='".$site."\\1'",$content);
      $content= preg_replace("/url\(([^h][^t][^t][^p].*)\)/" , "url(".$site."\\1)",$content);
    }

  if (!$nothl&&!$distant&&!$forcedl&&!$pop)
       echo "<html><style>.cl{text-align:right;background:#888;color:#000;font-size:13px}\n .cd {font-size:13px}</style>"
           ."<body style='border:0px;padding:0;margin:6px;background:#666;overflow:hidden;font-size:13px' onload='r()' onresize='r()'>"
           ."<pre id='editor' style='width:100%;height:100%;background:#fff;color:#000;overflow:auto;font-family:Courier New'>".convertUTF8($content)."</pre>"
           ."<script type='text/javascript'>function r() {".(($navig=="IE")?'document.getElementById("editor").style.height= eval(document.body.clientHeight-50)+"px";':'')."}</script>"
           ."</body></html>";
  else echo convertUTF8($content);


// Lecture d'une page html
} elseif ($typeMime=="text/html") {
    header("Content-Type: text/html; Charset=UTF-8");
    if ($distant) $content= @file_get_contents($url);
           else if ($typeSrv==1) $content= @file_get_contents($rep);
           else $content= ftp_get_contents($_SESSION["ws"]["$nomSrv"]["connexion"], $rep, FTP_BINARY);
    if (!$nothl&&!$distant) {
      $content= preg_replace('/src="([^h][^t][^t][^p].*)"/'  ,'src="'.$cheminRep.'\\1"',$content);
      $content= preg_replace("/src='([^h][^t][^t][^p].*)'/"  ,"src='".$cheminRep."\\1'",$content);
      $content= preg_replace('/href="([^h][^t][^t][^p].*)"/','href="'.$cheminRep.'\\1"',$content);
      $content= preg_replace("/href='([^h][^t][^t][^p].*)'/","href='".$cheminRep."\\1'",$content);
      $content= preg_replace("/url\(([^h][^t][^t][^p].*)\)/" , "url(".$cheminRep."\\1)",$content);
      $content= preg_replace('/background="([^h][^t][^t][^p].*)"/'  ,'background="'.$cheminRep.'\\1"',$content);
    }
    if ($distant) {
      $content= preg_replace('/src="([^h][^t][^t][^p].*)"/'  ,'src="'.$site.'\\1"',$content);
      $content= preg_replace("/src='([^h][^t][^t][^p].*)'/"  ,"src='".$site."\\1'",$content);
      $content= preg_replace('/href="([^h][^t][^t][^p].*)"/','href="'.$site.'\\1"',$content);
      $content= preg_replace("/href='([^h][^t][^t][^p].*)'/","href='".$site."\\1'",$content);
      $content= preg_replace("/url\(([^h][^t][^t][^p].*)\)/" , "url(".$site."\\1)",$content);
    }
    echo convertUTF8($content);

// Lecture d'une page html
} elseif ($typeMime=="application/x-font-TrueType") {
  $pangramme="";
  if (!empty($_REQUEST["pangramme"])) $pangramme=urldecode($_REQUEST["pangramme"]);
  echo "<div style='font-family:arial;'>Text : <input type='text' value='' id='pangramme' style='width:85%'>"
      ."<input type='button' value='View' onclick='window.location.href=\"".$_SERVER["REQUEST_URI"]."&pangramme=\"+encodeURIComponent(document.getElementById(\"pangramme\").value)'></div>"
      ."<img src='apercufonte.php?url=".urlencode($rep)."&pangramme=".urlencode($pangramme)."'>";
          
// Lecture d'un fichier distant
} elseif ($distant) {
  @readfile($url);

// Lecture de tout autre type de fichier
} else if ($typeSrv==1) @readfile($rep);
  else echo ftp_get_contents($_SESSION["ws"]["$nomSrv"]["connexion"], $rep, FTP_BINARY);

$tabLog= array("3","1",$_SESSION["ws"]["dia"]["savingFile"]." ".$fichier,$_SESSION["ws"]["nomUser"],$_SESSION["ws"]["dossierActif"],$fichier,"");
$l_mysql->logAction($tabLog);
$l_mysql->disconnect();
?>
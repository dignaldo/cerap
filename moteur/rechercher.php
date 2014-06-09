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
// Fonction : Rechercher un fichier
// Nom      : rechercher.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
header ("Content-type: text/html; charset=utf-8");
session_start();
include_once "auth.php";
include_once "fonctions.php";
$l_mysql = new class_mysql();
$l_mysql->connect();

$nomSrv     = $_SESSION["ws"]["serveurActif"];
$cheminRoot = blindeChemin($_SESSION["ws"]["cheminActif"]);
$chemin     = blindeChemin($_SESSION["ws"]["cheminActif"]."/".$_SESSION["ws"]["dossierActif"]);
$chscan     = $_SESSION["ws"]["$nomSrv"]["rootServeur"];
$recherche  = convCar(urldecode(trim($_REQUEST["nomElement"])));
$casse      = intval($_REQUEST["useCasse"]);

// L'utilisateur ne peut pas effectuer d'opération au dessus de sa racine virtuelle
verifie($_REQUEST["nomElement"]);
$trouve= 0; $nbElement= 0;


// Fonction de recherche récursive
function recScandir($dir,$recherche,$casse,$niveau) {
   global $trouve, $nbElement, $nomSrv, $chemin, $cheminRoot;
   $files = array();
   $rawfile = array();
   
   if ($handle=opendir(blindeChemin("$chemin/$dir"))) {

     while ( ($file = readdir($handle)) !== false ) {
       $droit=gestion(@fileperms("$chemin/$dir/$file"));

       if (preg_match($_SESSION["ws"]["varsUser"], $file)==0) {
         if ( is_dir("$chemin/$dir/$file") && ($droit!="N") && ($droit!="W")) {
           if ( ((preg_match("/$recherche/i",$file)==1) && ($casse!=1)) || ((preg_match("/$recherche/",$file)==1) && ($casse==1)) ) {
               $lien= blindeLien("$dir/$file");
               $nom = blindeNom("$file"); $afficdir=blindeLien("$dir");
               $labelType= $_SESSION["ws"]["assoc"][strtolower($extension)]["exttype"];
               echo "<div class='cible' onclick='if (altClick==0) {memoContext();lanceAction(\"\");}' onmouseover='rechOver(this,\"Rech$nbElement\")' onmouseout='rechOut(this)' style='white-space: nowrap;height:32px;padding-left: 6px'>"
                    ."<div id='divInfoRech$nbElement' style='display:none'> \n"
                    ."  tabFileInfo.fileInfoRech$nbElement= { \n"
                    ."  num : \"Rech$nbElement\", \n"
                    ."  lnk : \"$lien\", \n"
                    ."  nom : \"$nom\", \n"
                    ."  ext : \"$extension\", \n"
                    ."  lab : \"$labelType\", \n"
                    ."  tai : \"$taille\", \n"
                    ."  prm : \"$droit\", \n"
                    ."  pro : \"dossier\", \n"
                    ."  dtm : \"$modif\", \n"
                    ."  web : \"\", \n"
                    ."  fav : \"\", \n"
                    ."  srv : \"$nomSrv\" \n"
                    ." }; \n"
                   ."</div>"
                   ."<div class='caseimg' style='width:32px;height:32px;float:left;cursor:pointer;clear:both;'><img src='".$_SESSION["ws"]["cheminIcn"]."minis/big3.".$_SESSION["ws"]["formatExt"]."'></div>&nbsp;"
                   ."<u class='lien' onmouseover='this.className=\"lienover\"' onmouseout='this.className=\"lien\"'><b>$nom</b></u>"
                   ."</div><img src='".$_SESSION["ws"]["cheminImg"]."barre.".$_SESSION["ws"]["formatExt"]."' style='width:90%;height:1px;padding:3px'><br/>\n";
               $trouve=1; $nbElement++;
           }
           if ($niveau<9) $files["$file"] = recScandir("$dir/$file/",$recherche,$casse,$niveau+1);
         } else {
           if (( ((preg_match("/$recherche/i",$file)==1) && ($casse!=1)) || ((preg_match("/$recherche/",$file)==1) && ($casse==1)) ) && ($droit!="N") && ($droit!="W")) {
               $lien= blindeLien("$dir/$file");
               $lienWeb="";

               if (strpos($lien,".url")) {
                 $content_file = file(blindeLien("$chemin/$lien"));
                 preg_match("/(http.*)$/","$content_file[1]",$reglien);
                 $lienWeb=trim($reglien[1]);
               }
               $nom = utf8_encode(blindeNom("$file")); $afficdir=blindeLien("$dir");
               $point= strrpos($nom, "."); $extension= substr($nom,intval($point)+1); $nomfichier=substr($nom,0,intval($point));
               $labelType= $_SESSION["ws"]["assoc"][strtolower($extension)]["exttype"];
               $pro="local"; if ($extension=="url") $pro="url";
               echo "<div class='cible' onclick='if (altClick==0) {memoContext();lanceAction(\"\");}' onmouseover='rechOver(this,\"Rech$nbElement\")' onmouseout='rechOut(this)' style='white-space: nowrap;height:32px;padding-left: 6px'>"
                    ."<div id='divInfoRech$nbElement' style='display:none'> \n"
                    ."  tabFileInfo.fileInfoRech$nbElement= { \n"
                    ."  num : \"Rech$nbElement\", \n"
                    ."  lnk : \"$lien\", \n"
                    ."  nom : \"$nomfichier\", \n"
                    ."  ext : \"$extension\", \n"
                    ."  lab : \"$labelType\", \n"
                    ."  tai : \"$taille\", \n"
                    ."  prm : \"$droit\", \n"
                    ."  pro : \"$pro\", \n"
                    ."  dtm : \"$modif\", \n"
                    ."  web : \"$lienWeb\", \n"
                    ."  fav : \"\", \n"
                    ."  srv : \"$nomSrv\" \n"
                    ." }; \n"
                   ."</div>"
                   ."<div class='caseimg' style='width:32px;height:32px;float:left;cursor:pointer;clear:both;'><img src='".$_SESSION["ws"]["cheminIcn"]."minis/".strtolower($extension).".".$_SESSION["ws"]["formatExt"]."'></div>&nbsp;"
                   ."<u class='lien' onmouseover='this.className=\"lienover\"' onmouseout='this.className=\"lien\"'><b>$nom</b></u><br/>&nbsp;".$_SESSION["ws"]["dia"]["foundIn"]."&nbsp;$afficdir</div><img src='".$_SESSION["ws"]["cheminImg"]."barre.".$_SESSION["ws"]["formatExt"]."' style='width:90%;height:1px;padding:3px'><br/>\n";
               $trouve=1; $nbElement++;
           }
         }
       }
     }

     closedir($handle);
     return $files;
   }
}

// Fonction de recherche récursive sur FTP
function recScandirFTP($dir,$recherche,$casse,$niveau) {
   global $trouve, $nbElement, $nomSrv, $chemin, $cheminRoot;
   $files = array();
   $rawfile = array();
   
    if (($contents = ftp_rawlist($_SESSION["ws"]["$nomSrv"]["connexion"], $dir))!==FALSE) {
     foreach($contents as $file) {

       if (preg_match($_SESSION["ws"]["varsUser"], $file)==0) {
         $info = array();
         $vinfo = preg_split("/[\s]+/", $file, 9);
         if ($vinfo[0] !== "total") {
           $fileperms     = $vinfo[0];
           $filename      = $vinfo[8];
         }         
         $droit=gestionFTP($fileperms);
         
         if ( (strpos($fileperms,"d")!==FALSE) && ($droit!="N") && ($droit!="W")) {
           if ( ((preg_match("/$recherche/i",$filename)==1) && ($casse!=1)) || 
                 ((preg_match("/$recherche/",$filename)==1) && ($casse==1)) ) {
               
               $lien= preg_replace("@($cheminRoot)@","",blindeLien("$dir/$filename"));
               if ($cheminRelatif!="/") $cheminRelatif="/$cheminRelatif";
               
               $nom = blindeNom("$filename"); $afficdir=blindeLien("$dir");
               echo "<div class='cible' onclick='if (altClick==0) {memoContext();lanceAction(\"\");}' onmouseover='rechOver(this,\"Rech$nbElement\")' onmouseout='rechOut(this)'  style='white-space: nowrap;height:32px;padding-left: 6px'>"
                    ."<div id='divInfoRech$nbElement' style='display:none'> \n"
                    ."  tabFileInfo.fileInfoRech$nbElement= { \n"
                    ."  num : \"Rech$nbElement\", \n"
                    ."  lnk : \"$lien\", \n"
                    ."  nom : \"$nom\", \n"
                    ."  ext : \"$extension\", \n"
                    ."  lab : \"$labelType\", \n"
                    ."  tai : \"$taille\", \n"
                    ."  prm : \"$droit\", \n"
                    ."  pro : \"dossier\", \n"
                    ."  dtm : \"$modif\", \n"
                    ."  web : \"\", \n"
                    ."  fav : \"\", \n"
                    ."  srv : \"$nomSrv\" \n"
                    ." }; \n"
                   ."</div>"
                   ."<div class='caseimg' style='width:32px;height:32px;float:left;cursor:pointer;clear:both;'><img src='".$_SESSION["ws"]["cheminIcn"]."minis/big3.".$_SESSION["ws"]["formatExt"]."'></div>&nbsp;"
                   ."<u class='lien' onmouseover='this.className=\"lienover\"' onmouseout='this.className=\"lien\"'><b>$nom</b></u>"
                   ."</div><img src='".$_SESSION["ws"]["cheminImg"]."barre.".$_SESSION["ws"]["formatExt"]."' style='width:90%;height:1px;padding:3px'><br/>\n";
               $trouve=1; $nbElement++;
           }
           if ($niveau<9) $files["filename"] = recScandirFTP("$dir/$filename/",$recherche,$casse,$niveau+1);
         } else {
           if (( ((preg_match("/$recherche/i",$filename)==1) && ($casse!=1)) || 
                  ((preg_match("/$recherche/",$filename)==1) && ($casse==1)) ) && ($droit!="N") && ($droit!="W")) {

               $lien= preg_replace("@($cheminRoot)@","",blindeLien("$dir/$filename"));
               if ($cheminRelatif!="/") $cheminRelatif="/$cheminRelatif";

               $nom = utf8_encode(blindeNom("$filename")); $afficdir=blindeLien("$dir");
               $point= strrpos($nom, "."); $extension= substr($nom,intval($point)+1); $nomfichier=substr($nom,0,intval($point));
               echo "<div class='cible' onclick='if (altClick==0) {memoContext();lanceAction(\"\");}' onmouseover='rechOver(this,\"Rech$nbElement\")' onmouseout='rechOut(this)' style='white-space: nowrap;height:32px;padding-left: 6px'>"
                    ."<div id='divInfoRech$nbElement' style='display:none'> \n"
                    ."  tabFileInfo.fileInfoRech$nbElement= { \n"
                    ."  num : \"Rech$nbElement\", \n"
                    ."  lnk : \"$lien\", \n"
                    ."  nom : \"$nomfichier\", \n"
                    ."  ext : \"$extension\", \n"
                    ."  lab : \"$labelType\", \n"
                    ."  tai : \"$taille\", \n"
                    ."  prm : \"$droit\", \n"
                    ."  pro : \"local\", \n"
                    ."  dtm : \"$modif\", \n"
                    ."  web : \"$lienWeb\", \n"
                    ."  fav : \"\", \n"
                    ."  srv : \"$nomSrv\" \n"
                    ." }; \n"
                   ."</div>"
                   ."<div class='caseimg' style='width:32px;height:32px;float:left;cursor:pointer;clear:both;'><img src='".$_SESSION["ws"]["cheminIcn"]."minis/".strtolower($extension).".".$_SESSION["ws"]["formatExt"]."'></div>&nbsp;"
                   ."<u class='lien' onmouseover='this.className=\"lienover\"' onmouseout='this.className=\"lien\"'><b>$nom</b></u><br/>&nbsp;".$_SESSION["ws"]["dia"]["foundIn"]."&nbsp;$afficdir</div><img src='".$_SESSION["ws"]["cheminImg"]."barre.".$_SESSION["ws"]["formatExt"]."' style='width:90%;height:1px;padding:3px'><br/>\n";
               $trouve=1; $nbElement++;
           }
         }
       }
     }
     
     return $files;
   }
}

  echo "<div class='recherche'><div class='rubrique' style='width:100%;white-space:nowrap'>"
      ."<img src='".$_SESSION["ws"]["cheminImg"]."prop.".$_SESSION["ws"]["formatExt"]."' style='float:left;margin:6px;margin-right:2px'>"
      ."<img src='".$_SESSION["ws"]["cheminImg"]."close.".$_SESSION["ws"]["formatExt"]."' style='float:right;margin:6px;margin-right:2px;cursor:pointer' onclick='recupFavoris();'>"
      ."&nbsp;<b style='color:#000'>".$_SESSION["ws"]["dia"]["searchIn"]."<br/> &nbsp; '$recherche':</b></div>";

      if ($_SESSION["ws"]["$nomSrv"]["typeServeur"]=="1") 
           recScandir("",utf8_decode($recherche),$casse,0);
    else {$_SESSION["ws"]["$nomSrv"]["connexion"]=connexionFTP($nomSrv);
           recScandirFTP($chemin,utf8_decode($recherche),$casse,0); }

  if (!$trouve) echo $_SESSION["ws"]["dia"]["noResult"];
  $tabLog= array("15","1",$_SESSION["ws"]["dia"]["searchIn"]." ".$recherche.", ".(!$trouve?$_SESSION["ws"]["dia"]["noResult"]:$nbElement.$_SESSION["ws"]["dia"]["elementsFound"]),$_SESSION["ws"]["nomUser"],$_SESSION["ws"]["dossierActif"],$recherche,"");
  $l_mysql->logAction($tabLog);
  $l_mysql->disconnect();
  echo "</div>";


?>
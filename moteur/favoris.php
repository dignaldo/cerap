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
// Fonction : Ajoute ou retire un fichier dans les favoris
// Nom      : favoris.php
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

// Mise en favoris
if (intval($p_param["view"])!=1) {

  $nomElement   = urldecode(stripslashes(trim($p_param["nomElement"])));
  $cheminElement= blindeChemin(utf8_encode($chemin).$nomElement);
  $cheminFichier= $_SESSION["ws"]["dossierActif"];
  if ($cheminFichier=="") $cheminFichier="/";
  $nomFichier   = $nomElement;
  if (intval($p_param["numAct"])==1) { $favoris=1; $message= $_SESSION["ws"]["dia"]["favAdded"]; }
                                else { $favoris=0; $message= $_SESSION["ws"]["dia"]["favRemoved"]; }

  // L'utilisateur ne peut pas effectuer d'opération au dessus de sa racine virtuelle
  verifie($p_param["nomElement"]);
  if (preg_match($_SESSION["ws"]["varsUser"], $p_param["nomElement"])==1) exit;

  // Gestion des favoris
    $request= "SELECT * FROM wsfiles
      WHERE nomServeur LIKE '$nomSrv' AND path LIKE '$cheminFichier' AND file LIKE '$nomFichier' ";
    $result = $l_mysql->request_result($request);
    if (empty($result)) {
      $request= "INSERT INTO wsfiles
        (idUser, idServeur, nomServeur, username, path, file, commentaires, version, viewed, favoris)
        VALUES ( '".$_SESSION["ws"]["idUser"]."', '".$_SESSION["ws"]["$nomSrv"]["idServeur"]."', '$nomSrv',
        '".$_SESSION["ws"]["nomUser"]."', '$cheminFichier', '$nomFichier','','',0,$favoris) ";
      $result = $l_mysql->request($request);
    } else {
      $request= "UPDATE wsfiles SET favoris=$favoris
        WHERE nomServeur LIKE '$nomSrv' AND path LIKE '$cheminFichier' AND file LIKE '$nomFichier' ";
      $result = $l_mysql->request($request);
    }

// Mode récupération des favoris
} else {
    $request= "SELECT * FROM wsfiles WHERE favoris=1 ";
    $result = $l_mysql->request_result($request);
    $nbElement=0;


  echo "<div class='recherche depFavoris'><div class='rubrique' style='width:100%;white-space:nowrap'>"
      ."<img src='".$_SESSION["ws"]["cheminImg"]."fav.".$_SESSION["ws"]["formatExt"]."' style='margin:1px;margin-left:6px;vertical-align:middle'>&nbsp;<b>".$_SESSION["ws"]["dia"]["favoris"]."</b></div>";

  foreach ($result as $data) {
    $nom = basename(blindeNom("$data[path]/$data[file]"));
    $lien= blindeChemin("$data[path]/$data[file]");
    $lienSrv=blindeChemin($_SESSION["ws"][$data["nomServeur"]]["rootServeur"]."$data[path]/$data[file]");
    $point= strrpos($nom, ".");
    if ($point === false) { $extension= ""; $nomfichier=$nom; }
                     else { $extension= substr($nom,intval($point)+1); $nomfichier=substr($nom,0,intval($point)); }
    $cheminGlobal= dirname(blindeLien("$data[path]/$data[file]")); $afficdir=basename($cheminGlobal);
    if ($afficdir=="") $afficdir= $data["nomServeur"];
    $permGlob= "RW";

    if ($_SESSION["ws"][$data["nomServeur"]]["typeServeur"]==1) {
           $permGlob= gestion(@fileperms($lienSrv));
           $modifb  = filemtime($lienSrv);
           $modif   = $_SESSION["ws"]["dia"]["listeJour"][date("D", $modifb)].date(" j ", $modifb).$_SESSION["ws"]["dia"]["listeMois"][intval(date("n", $modifb))].date(" Y H:i", $modifb);
           $taille  = sprintf("%012s", @filesize($lienSrv));
           $proto   = (is_dir($lienSrv)===true?"dossier":"local");
           $lienWeb="";
           if ($extension=="url") {
               $proto="url"; 
               $content_file = file($lienSrv);
               preg_match("/(http.*)$/","$content_file[1]",$reglien);
               $lienWeb=trim($reglien[1]);
           }
         }
    else { $ftp_file= ftp_recup_fileinfo($data["nomServeur"],$lienSrv);
           $permGlob= $ftp_file["iciPerm"];
           $modif   = $ftp_file["modif"];
           $taille  = $ftp_file["taille"];
           $proto   = $ftp_file["proto"]; }
    if ($proto!="dossier")   $visu=strtolower($extension);
                      else { $visu="big3"; $extension=""; }
    
    $labelType= $_SESSION["ws"]["assoc"][strtolower($extension)]["exttype"];

    echo "<div class='cible' onclick='if (altClick==0) {memoContext();lanceAction(\"\");}' onmouseover='rechOver(this,\"Rech$nbElement\")' onmouseout='rechOut(this)' style='white-space: nowrap;height:32px;padding-left: 6px'>"
        ."<div id='divInfoRech$nbElement' style='display:none'> \n"
        ."  tabFileInfo.fileInfoRech$nbElement= { \n"
        ."  num : \"Rech$nbElement\", \n"
        ."  lnk : \"$lien\", \n"
        ."  nom : \"$nomfichier\", \n"
        ."  ext : \"$extension\", \n"
        ."  lab : \"$labelType\", \n"
        ."  tai : \"$taille\", \n"
        ."  prm : \"$permGlob\", \n"
        ."  pro : \"$proto\", \n"
        ."  dtm : \"$modif\", \n"
        ."  web : \"$lienWeb\", \n"
        ."  fav : \"1\", \n"
        ."  srv : \"$data[nomServeur]\" \n"
        ." }; \n"
        ."</div>"
        ."<div class='caseimg' style='width:32px;height:32px;float:left;cursor:pointer;clear:both;'><img src='".$_SESSION["ws"]["cheminIcn"]."minis/".$visu.".".$_SESSION["ws"]["formatExt"]."'></div>&nbsp;"
        ."<u class='lien' onmouseover='this.className=\"lienover\"' onmouseout='this.className=\"lien\"'>$nom</u><br/>&nbsp;".$_SESSION["ws"]["dia"]["foundIn"]."&nbsp;$afficdir</div><img src='".$_SESSION["ws"]["cheminImg"]."barre.".$_SESSION["ws"]["formatExt"]."' style='width:90%;height:1px;padding:3px'><br/>\n";
     $nbElement++;
  }

  echo "<div style='border:1px solid #888;margin:4px;height:60px' onmouseover='selectObj=\"wsAddFavoris\";' onmouseout='selectObj=0;'>"
       ."<div class='rubrique' style='text-align:center'>".$_SESSION["ws"]["dia"]["addFav"]."</div></div>";
       
  echo "</div>";
}

$l_mysql->disconnect();

} else { $message= $_SESSION["ws"]["dia"]["alertfunction3"]; }
  echo $message;
?>
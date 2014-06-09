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
// Fonction : Exploration du contenu des dossiers
// Nom      : explorer.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
session_start();
include_once "auth.php";
include_once "fonctions.php";
$l_mysql = new class_mysql();
$l_mysql->connect();

header('Content-Type: text/xml');
echo '<'.'?xml version="1.0" encoding="UTF-8"'.'?>';
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "declarations.dtd">';
$formatExt  = $_SESSION["ws"]["formatExt"];
$listeSrv =""; $num=1; $nbFilesBin=0;

$listeExt="|std|";
foreach ($_SESSION["ws"]["assoc"] as $nom => $valeur) {
  $datas= explode("|",$valeur);
  $listeExt.=$nom."|";
}

echo "<reponse><repArbre>";

// ==== Explore le contenu des répertoires locaux ====
function recScandir($dir,$nomSrv,$niveau) {
   global $num,$listeExt;
   $chemin=blindeChemin($_SESSION["ws"]["$nomSrv"]["rootServeur"]."/".$_SESSION["ws"]["$nomSrv"]["repServeur"]);
   $files = array();
   $rawfile = array();
   if ($handle=@opendir(blindeChemin("$chemin/$dir"))) {

     while ( ($file = readdir($handle)) !== false ) {
       if (preg_match($_SESSION["ws"]["varsUser"], $file)==0) {
         if ( is_dir("$chemin/$dir/$file")) $rawfile[]="$file";
         if ( ($_SESSION["ws"]["arboLink"]=="1")&&(preg_match("/\.url/", $file)==1)) $rawfile[]="$file";
       }
     }

     natcasesort($rawfile);
     foreach ($rawfile as $liste) {
       $iciPerm= gestion(fileperms("$chemin/$dir/$liste"));
       if (preg_match("/\.url/", $liste)==1) {
            $lien=blindeLien("$dir/$liste"); $lienWeb="";
            if (($content_file = file("$chemin/$dir/$liste"))!==false) {
               preg_match("/(http.*)$/","$content_file[1]",$reglien);
                   $lienWeb=blindeNom(trim($reglien[1]));
                   preg_match("!^BASEURL=([[:alpha:]]*)\:\/\/([[:alnum:]-\.]*)[\/]?([[:alnum:]-\/]*)\.([[:alnum:]]*)[\?]?([[:alnum:]=&]*).*$!","$content_file[1]",$reglien);
             $extension=strtolower(trim($reglien[4]));
             if (preg_match("/(".$extension.")/", $listeExt)==0) $extension="url";
          }
          $point= strrpos($liste, ".");
                echo "<brc><lnk>".$lien."</lnk><web>".$lienWeb."</web>"
                  ."<nom>".blindeAffichage(substr($liste,0,$point))."</nom><prm>$iciPerm</prm>"
                    ."<url>url</url><num>$num</num><pro>url</pro><ext>$extension</ext>";

       } else { echo "<brc><lnk>".blindeLien("$dir/$liste")."</lnk><web></web>"
                    ."<nom>".blindeAffichage("$liste")."</nom><prm>$iciPerm</prm>"
                    ."<url>miniclose</url><num>$num</num><pro>dossier</pro><ext></ext><srv>$nomSrv</srv>";
       }
       $num++;
       if ($niveau<3) $files["$liste"] = recScandir("$dir/$liste/",$nomSrv,$niveau+1);
     echo "</brc>";
     }

     closedir($handle);
     return $files;
   }
}

// ==== Explore le contenu des répertoires distants ====
function recScandirFTP($dir,$nomSrv,$niveau) {
   global $num,$listeExt;
   $cheminOrigine=blindeChemin($_SESSION["ws"]["$nomSrv"]["rootServeur"]."/".$_SESSION["ws"]["$nomSrv"]["repServeur"]);
   if (($contents = ftp_rawlist($_SESSION["ws"]["$nomSrv"]["connexion"], $dir))!==FALSE) {
     foreach($contents as $file) {

       $info = array();
       $vinfo = preg_split("/[\s]+/", $file, 9);

       if (preg_match($_SESSION["ws"]["varsUser"], $vinfo[8])==0) {
        if ($vinfo[0] !== "total") {
          $fileperms     = $vinfo[0];
          $filename      = $vinfo[8];
        }  

        if (strpos($fileperms,"d")!==FALSE || strpos($fileperms,"l")!==FALSE) {
           //FIXME : gestion des Symbolic Link
           if (strpos($fileperms,"l")!==FALSE) {
              $symLink=explode(" ->", $filename);
              $filename=$symLink[0];
           }
           $cheminRelatif= preg_replace("@($cheminOrigine)@","",blindeLien("$dir/$filename"));
           if ($cheminRelatif!="/") $cheminRelatif="/$cheminRelatif";
           echo "<brc><lnk>".$cheminRelatif."</lnk><web></web><nom>".blindeAffichage("$filename")."</nom><prm>RW</prm>"
               ."<url>miniclose</url><num>$num</num><pro>dossier</pro><ext>$extension</ext><srv>$nomSrv</srv>";
           $num++;
           if ($niveau<2) $files = recScandirFTP("$dir/$filename/",$nomSrv,$niveau+1);
         echo "</brc>";
       }
     }
     }
     return $files;
   }
}

// ==== Explore le contenu de la corbeille ====
function recScanBin($dir,$cheminBin,$niveau) {
   global $nbFilesBin;
   $files = array();
   $rawfile = array();
   if ($handle=@opendir(blindeChemin("$cheminBin/$dir"))) {

     while ( ($file = readdir($handle)) !== false ) {
       if (preg_match($_SESSION["ws"]["varsUser"], $file)==0) {
         if ( is_dir("$chemin/$dir/$file")) $rawfile[]="$file";
         $nbFilesBin++;
       }
     }
     foreach ($rawfile as $liste) {
       $files["$liste"] = recScanBin("$dir/$liste/",$cheminBin,$niveau+1);
     }

   }
   closedir($handle);
   return $files;
}


$nomSrv=$_SESSION["ws"]["listeServeur"][0];
$listeTri= explode(",",$_SESSION["ws"]["$nomSrv"]["triServeur"]);
$tempList= $_SESSION["ws"]["listeServeur"];

$compt=0;
foreach ($listeTri as $data) {

  foreach ($tempList as $dataBis) {
    if ($data==$_SESSION["ws"][$dataBis]["idServeur"]) {
      $_SESSION["ws"]["listeServeur"][$compt]=$dataBis;
      $compt++;
    }
  }
  
}

$specServeur="";
if (isset($_REQUEST["specServeur"])) {
  verifie($_REQUEST["specServeur"]);
  for ($j=0;$j<count($_SESSION["ws"]["listeServeur"]);$j++) {
    if ($_SESSION["ws"]["listeServeur"][$j]==$_REQUEST["specServeur"])
      $specServeur= $_REQUEST["specServeur"];
  }
}

for ($j=0;$j<count($_SESSION["ws"]["listeServeur"]);$j++) {

  $nomSrv=$_SESSION["ws"]["listeServeur"][$j];
  $listeSrv.=" $nomSrv";  $num=1;

  if (($specServeur=="")||($specServeur==$nomSrv)) {
   echo "<contArbre>";
   if ($_SESSION["ws"]["$nomSrv"]["typeServeur"]=="1") {
  
    define("DISK",$_SESSION["ws"]["$nomSrv"]["rootServeur"]."/"); // Dossier pour lequel on recherche l'espace
    $totalspace= round(disk_total_space(DISK),2);           // Récupération de l'espace disque
    $freespace = round(disk_free_space(DISK),2);            // Récupération de l'espace libre
    $used  = $totalspace - $freespace;                      // Calcul de l'espace utilisé

    echo "<serveur>$nomSrv</serveur><cnx>".$_SESSION["ws"]["cheminImg"]."ordi.".$_SESSION["ws"]["formatExt"]."</cnx><num>$num</num>"
        ."<espacetotal>$totalspace</espacetotal><espacelibre>$freespace</espacelibre><espaceutil>$used</espaceutil><protect>".$_SESSION["ws"]["$nomSrv"]["protectServeur"]."</protect>";

    $chemin=blindeChemin($_SESSION["ws"]["$nomSrv"]["rootServeur"]."/".$_SESSION["ws"]["$nomSrv"]["repServeur"]);
    if (!is_dir($chemin)) mkdir($chemin);
    $depart=basename($chemin);
    echo "<brc><lnk>/</lnk><web></web>".
         "<prm>RW</prm><nom>".blindeNom($depart)."</nom><url>miniclose</url><num>$num</num><pro>dossier</pro><ext>arbo</ext><srv>$nomSrv</srv>"; $num++;
    $dir = recScandir("",$nomSrv,0);
    echo "</brc>";
  } else {
    $_SESSION["ws"]["$nomSrv"]["connexion"]=connexionFTP($nomSrv);
    if (!$_SESSION["ws"]["$nomSrv"]["connexion"]) {
      echo "<serveur>$nomSrv</serveur><cnx>".$_SESSION["ws"]["cheminImg"]."network2.".$_SESSION["ws"]["formatExt"]."</cnx><num>$num</num>";
    } else {
      echo "<serveur>$nomSrv</serveur><cnx>".$_SESSION["ws"]["cheminImg"]."network.".$_SESSION["ws"]["formatExt"]."</cnx><num>$num</num>";
      $chemin=blindeChemin($_SESSION["ws"]["$nomSrv"]["rootServeur"]."/".$_SESSION["ws"]["$nomSrv"]["repServeur"]);
      $depart=basename($chemin);
      echo "<brc><lnk>/</lnk><web></web>".
           "<prm>RW</prm><nom>".blindeNom($depart)."</nom><url>miniclose</url><num>$num</num><pro>dossier</pro><ext>arbo</ext><srv>$nomSrv</srv>"; $num++;
      $dir = recScandirFTP(blindeChemin($_SESSION["ws"]["$nomSrv"]["rootServeur"]."/".$_SESSION["ws"]["$nomSrv"]["repServeur"]),$nomSrv,0);
      echo "</brc>";
    }
   }
  echo "</contArbre>";
  }

}

if ($specServeur=="") {
 if ($_SESSION["ws"]["repCorbeille"]!="") {
  recScanBin("",$_SESSION["ws"]["repCorbeille"],0);
  echo "<contArbre><serveur>".str_replace(" ","",$_SESSION["ws"]["dia"]["corbeille"])."</serveur><cnx>".$_SESSION["ws"]["cheminImg"]."corbeille.".$_SESSION["ws"]["formatExt"]."</cnx><num>1</num>";
  echo "<brc><lnk>/</lnk><web></web><prm>T</prm><nom>"
      .(($nbFilesBin==0)?$_SESSION["ws"]["dia"]["binNoElement"]:$_SESSION["ws"]["dia"]["binContain"]." $nbFilesBin ".$_SESSION["ws"]["dia"]["element"])
      ."</nom><url>miniclose</url><num>1</num><pro>trb</pro><ext>trb</ext><srv>"
      .str_replace(" ","",$_SESSION["ws"]["dia"]["corbeille"])."</srv></brc></contArbre>";
 }
}

echo "</repArbre></reponse>";

$tabLog= array("2","1",$_SESSION["ws"]["dia"]["exploreShare"]." ".$listeSrv,$_SESSION["ws"]["nomUser"],$_SESSION["ws"]["dossierActif"],"-","");
$l_mysql->logAction($tabLog);
$l_mysql->disconnect();

?>

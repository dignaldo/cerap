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
// Fonction : Navigation dans le répertoire courant
// Nom      : naviguer.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
session_start();
include_once "auth.php";
include_once "fonctions.php";
$l_mysql = new class_mysql();
$l_mysql->connect();

$dossier=$_SESSION["ws"]["dossierActif"];
if (isset($_REQUEST["dossier"]))
                  { // L'utilisateur ne peut pas remonter au dessus de sa racine virtuelle
                   if (empty($_REQUEST["dossier"])) $_REQUEST["dossier"]="/";
                   $newpath= html_entity_decode(utf8_decode($_REQUEST["dossier"]));
                   if (strstr($newpath,"..")!==false) exit();
                   if (preg_match($_SESSION["ws"]["varsUser"],$newpath)==1) exit();
                                  $dossier=str_replace("/'","'",blindeChemin($newpath));
                                  $_SESSION["ws"]["dossierActif"]=$dossier; }


$tabLog= array("1","1",$_SESSION["ws"]["dia"]["webPreview"]." ".$_SESSION["ws"]["dossierActif"],$_SESSION["ws"]["nomUser"],$_SESSION["ws"]["dossierActif"],basename($_SESSION["ws"]["dossierActif"]),"");
$l_mysql->logAction($tabLog);

// Si l'ID serveur n'existe pas ou n'est pas valide
if (isset($_REQUEST["iciSrv"])) {
  if ($_REQUEST["iciSrv"]!=$_SESSION["ws"]["dia"]["corbeille"]) {
    $srvMatch=0; $navigBin=0;
    for ($j=0;isset($_SESSION["ws"]["listeServeur"][$j]);$j++) {
      if ($_REQUEST["iciSrv"] == $_SESSION["ws"]["listeServeur"][$j]) $srvMatch=1; }
    if ($srvMatch==0) exit();
    $_SESSION["ws"]["serveurActif"]=$_REQUEST["iciSrv"];
    $nomSrv   = $_SESSION["ws"]["serveurActif"];
    $_SESSION["ws"]["cheminActif"]= blindeChemin($_SESSION["ws"]["$nomSrv"]["rootServeur"]."/".$_SESSION["ws"]["$nomSrv"]["repServeur"]."/");
    $chemin   = $_SESSION["ws"]["cheminActif"];

    if ($_SESSION["ws"]["$nomSrv"]["typeServeur"]=="1") $typeServeur=1; else
      { $_SESSION["ws"]["$nomSrv"]["connexion"]=connexionFTP($nomSrv); $typeServeur=2; }
      
  } else {
    $navigBin=1;
    $_SESSION["ws"]["serveurActif"]= $nomSrv = $_SESSION["ws"]["dia"]["corbeille"];
    $_SESSION["ws"]["cheminActif"] = $chemin = $_SESSION["ws"]["repCorbeille"];
    $_SESSION["ws"]["dossierActif"]= $dossier = "";
    $typeServeur=1;
  }
} else exit;

if (!empty($_SESSION["ws"]["$nomSrv"]["webServeur"])) 
     $_SESSION["ws"]["rootWeb"] = $_SESSION["ws"]["$nomSrv"]["webServeur"]; 
else $_SESSION["ws"]["rootWeb"] = blindeChemin(str_replace($_SESSION["ws"]["rootServr"],"",$_SESSION["ws"]["$nomSrv"]["rootServeur"]."/".$_SESSION["ws"]["$nomSrv"]["repServeur"]));


// Clé de protection
if  (!isset($_REQUEST["cle"])||($_REQUEST["cle"]!=$_SESSION["ws"]["uniqKey"])) exit();

header('Content-Type: application/xml; charset=utf-8');
echo '<'.'?xml version="1.0" encoding="UTF-8"'.'?>';
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "declarations.dtd">';

echo "<reponse>";
$nomfichier = array();
$nomdossier = array();
$numfichier = $numdossier = 0;
$numid = 1; $total = 0;
$formatExt= $_SESSION["ws"]["formatExt"];
$typetri  = $_SESSION["ws"]["triUser"];
$fond= ""; $demarrage="";
$lien= ""; $pair=0;

  // Tri des fichiers selon le type demandé
  function compare($a, $b) {
     global $typetri;
     if ($_SESSION["ws"]["senstriUser"]=="desc") {
       if ($typetri=="fichier")
            return @strcmp(strtolower($b["$typetri"]), strtolower($a["$typetri"]));
       else return @strcmp($b["$typetri"], $a["$typetri"]);
     } else {
       if ($typetri=="fichier")
            return @strcmp(strtolower($a["$typetri"]), strtolower($b["$typetri"]));
       else return @strcmp($a["$typetri"], $b["$typetri"]);
     }
  }

  // Analyse de l'adresse
  echo "<repAdresse>";
  $listeDossiers = split ("/",$dossier); $listeNom="";
  echo "<dossier><lien/><visu>".(($typeServeur==1)?"ordi":"network").".$formatExt</visu><nom>".$_SESSION["ws"]['dia']['actualDir']."</nom><action>none</action></dossier>";
  echo "<dossier><lien>/</lien><visu>".((isset($_SESSION["ws"]["sepAdr"])&&($_SESSION["ws"]["sepAdr"]=="1"))?"dossier":"slash")
      .".$formatExt</visu><nom>".blindeChemin(basename($chemin))."</nom><action>naviguer</action></dossier>";
  foreach ($listeDossiers as $entry) {
      if (!empty($entry)) {
         $listeNom.="/$entry";
         echo "<dossier><lien>".blindeLien($listeNom)."</lien><visu>".((isset($_SESSION["ws"]["sepAdr"])&&($_SESSION["ws"]["sepAdr"]=="1"))?"dossier":"slash")
             .".$formatExt</visu><nom>".blindeAffichage($entry)."</nom><action>naviguer</action></dossier>";
      }
  }
  echo "</repAdresse>\n";

  // Lecture du fichier de paramètres et commentaires si existant
  $fond="/"; $found=0; $tabComment= array(); $numComment= array(); $commentGlobal="";
  if ( (($typeServeur==1)&&(($lines = @file(blindeChemin("$chemin/$dossier/.param")))!==false)) || ($typeServeur==2) ) {

    if ($typeServeur==2) {
      $tlines = ftp_get_contents($_SESSION["ws"]["$nomSrv"]["connexion"], blindeChemin("$chemin/$dossier/.param"), FTP_BINARY);
      $lines = explode ("\n", $tlines);
    }
    foreach ($lines as $line_num => $line) {
      $line= trim($line);
      if (preg_match("/URL=(.*)/",$line,$regfond)==1) $fond="moteur/pic.php?pic=".blindeChemin("/".$_SESSION["ws"]["$nomSrv"]["repServeur"]."/".$_SESSION["ws"]["$nomSrv"]["dossierActif"].$regfond[1]);
      if (preg_match("@\[BackgroundShortcut\]@",$line,$comp)==1) $found=0;

      if (preg_match("/\[(.*)\/(.*)\]/",$line,$comp)==1) {
        $found= 1; $nomComment=$comp[2]; $tabComment["$nomComment"]="";
        if (!isset($numComment["$nomComment"])) $numComment["$nomComment"]=1;
                                           else $numComment["$nomComment"]++;
        if ($numComment["$nomComment"]!=1) $tabComment["$nomComment"]= $numComment["$nomComment"]." ".$_SESSION["ws"]['dia']['commentsAdded'];
      } else if ($found=="1") {
        if ($nomComment=="wsGlobal") $commentGlobal.=blindeNom($line)." ";
        if ($numComment["$nomComment"]==1) $tabComment["$nomComment"].=blindeNom($line)." ";
      }
    }
  }

  // Lecture du contenu du dossier
  echo "<repGalerie>";
  $action="naviguer";
  $lienSrv= blindeChemin("$chemin/$dossier/");

  if ($typeServeur==1) {
    // Partage local
    $permGlob= gestion(@fileperms($lienSrv));
    if ($nomSrv=="Documents") $permGlob="RW";
    
    $handle  = opendir($lienSrv);
    while (false !== ($entry = readdir($handle))) {
      // Affichage si présence d'un index de dossier
      if (preg_match($_SESSION["ws"]["varsUser"], $entry)==0) {
        if ((!$_SESSION["ws"]["webUser"])&&(preg_match("/index.htm|index.php/", $entry)==1)&&(filesize($lienSrv.$entry))!=0)
          $demarrage=blindeLien("/$dossier/".trim($entry));
        if (is_dir($lienSrv.$entry)) { $nomdossier["$entry"]= array(); $numdossier++; }
                                else { $nomfichier["$entry"]= array(); $numfichier++; }
      }
    }
  } else {
    // Partage distant
    $permGlob= "RW";

    if (($contents = ftp_rawlist($_SESSION["ws"]["$nomSrv"]["connexion"], $lienSrv))!==FALSE) {
      $cheminRelatif= preg_replace("@(".$_SESSION["ws"]["cheminActif"].")@","",blindeLien("$dir/"));
      foreach($contents as $entry) {
      // Affichage si présence d'un index de dossier
      $info = array();
      $vinfo = preg_split("/[\s]+/", $entry, 9);
        
      if (preg_match($_SESSION["ws"]["varsUser"], $vinfo[8])==0) {
        if ($vinfo[0] !== "total") {
          $info['chmod'] = $vinfo[0];
          $info['num']   = $vinfo[1];
          $info['owner'] = $vinfo[2];
          $info['group'] = $vinfo[3];
          $info['size']  = $vinfo[4];
          $info['month'] = $vinfo[5];
          $info['day']   = $vinfo[6];
          $info['time']  = $vinfo[7];
          $info['name']  = $vinfo[8];
        }  
        $filename  = trim($info['name']);
        $filetaille= trim($info['size']);
        $filedate  = trim($info['day'])." ".trim($info['month'])." ".trim($info['time']);
        $fileperms = trim($info['chmod']);

        if ((!$_SESSION["ws"]["webUser"])&&(preg_match("/index.htm/", $filename)==1)&&($filetaille!=0))
          $demarrage=blindeLien("/$dossier/".trim($filename));
          if (strpos($fileperms,"d")!==FALSE || strpos($fileperms,"l")!==FALSE) {
            //FIXME : gestion des Symbolic Link
            if (strpos($fileperms,"l")!==FALSE) {
              $symLink=explode(" ->", $filename);
              $filename=$symLink[0];
            }
            $nomdossier["$filename"]= array();
            $nomdossier["$filename"]["iciPerm"]=gestionFTP($fileperms);
            $nomdossier["$filename"]["taille"] =0;
            $nomdossier["$filename"]["modif"]  =$filedate;
            $numdossier++; }
          else {
            $nomfichier["$filename"]= array();
            $nomfichier["$filename"]["iciPerm"] =gestionFTP($fileperms);
            $nomfichier["$filename"]["taille"]  =$filetaille;
            $nomfichier["$filename"]["modif"]   =$filedate;
            $numfichier++; }
      }
      }
    }

  }
  $nomrepere="id".$nomSrv.$dossier;
  closedir($handle);
  
  uksort($nomdossier, 'strnatcasecmp');
  
  if ($_SESSION["ws"]["senstriUser"]=="desc")
    $nomdossier=  array_reverse($nomdossier);
 

  // Création des fichiers index.html ou .htaccess de protection
  if ($navigBin==0) {
    if (($_SESSION["ws"]["$nomSrv"]["protectIndex"]=="1")&&(!is_file($lienSrv.blindeChemin("/index.html"))))
       { $tmpHandle= fopen($lienSrv.blindeChemin("/index.html"), "w+"); fclose($tmpHandle); }
    if (($_SESSION["ws"]["$nomSrv"]["protectHtacc"]=="1")&&(!is_file($lienSrv.blindeChemin("/.htaccess"))))
       { $tmpHandle= fopen($lienSrv.blindeChemin("/.htaccess"), "w+");
         fwrite($tmpHandle,"deny from all");
         fclose($tmpHandle); }
  }

  // Affichage de l'entrée du niveau supérieur
  $nomup=basename(dirname($_SESSION["ws"]["dia"]["shareRoot"]."/".blindeAffichage($dossier)));
  $testup=str_replace(".","",str_replace("/","",blindeChemin($dossier)));
  if (!empty($testup)) {
    $niveausup= dirname($dossier);
    // Envoi des informations de l'entrée de niveau supérieur
    echo "<ent><num>".$numid++."</num><lnk>".blindeLien($niveausup)."</lnk><web></web><vis>"."up.$formatExt</vis><nom>".$nomup."</nom>".
         "<ext></ext><pro>sup</pro><tai>0</tai><dtm></dtm><prm>RW</prm><cmt></cmt><fav>0</fav><lck>0</lck></ent>";
  }

  // Affichage des dossiers d'abord
  foreach ($nomdossier as $nom => $val) {
    if ($typeServeur==1) {
      $lienSrv = blindeChemin("$chemin/$dossier/$nom");
      $iciPerm = gestion(@fileperms($lienSrv));
      $modifb  = filemtime($lienSrv);
      $modif   = $_SESSION["ws"]["dia"]["listeJour"][date("D", $modifb)].date(" j ", $modifb).  $_SESSION["ws"]["dia"]["listeMois"][intval(date("n", $modifb))].date(" Y H:i", $modifb);
      $modiftri= date ("YmdHis", $modifb);
      if (isset($tabComment["$nom"]))    $cmt = $tabComment["$nom"]; else $cmt = "";
    } else {
      $lienSrv = blindeChemin("$chemin/$dossier/$nom");
      $iciPerm = $nomdossier["$nom"]["iciPerm"];
      $modifb  = $nomdossier["$nom"]["modif"];
      $modif   = $nomdossier["$nom"]["modif"];
      $modiftri= $nomdossier["$nom"]["modif"];
     $cmt = "";
    }

    // Détection favoris ou non
    $nomdossier["$nom"]["fav"]=""; $nomdossier["$nom"]["lck"]="";
    if ($l_mysql->test()) {
      $path= blindeLien(dirname("$dossier/$nom"));
      if (strlen($path)!=1) while (substr($path,-1)=="/") $path=substr($path,0,-1);
      $verifFav= "SELECT file FROM wsfiles
        WHERE nomServeur LIKE '$nomSrv' AND path LIKE '$path' AND file LIKE '".utf8_encode($nom)."' AND favoris=1 ";
      $resultFav = $l_mysql->request_result($verifFav);
      if (!empty($resultFav)) $nomdossier["$nom"]["fav"]="1";
      $verifLck= "SELECT file FROM wsfiles
        WHERE nomServeur LIKE '$nomSrv' AND path LIKE '$path' AND file LIKE '".utf8_encode($nom)."' AND locked=1 ";
      $resultLck = $l_mysql->request_result($verifLck);
      if (!empty($resultLck)) $nomdossier["$nom"]["lck"]="1";

    }

    // Envoi des informations de chaque dossier
     echo "<ent><num>".$numid++."</num><lnk>".blindeLien("$dossier/$nom")."</lnk><web></web><vis>big.$formatExt</vis><nom>".blindeAffichage($nom)."</nom><lck>".$nomdossier["$nom"]["lck"]."</lck>".
          "<ext></ext><pro>dossier</pro><tai>0</tai><dtm>$modif</dtm><prm>$iciPerm</prm><dbl>".($pair?"pair":"")."</dbl><cmt>".blindeNom($cmt)."</cmt><fav>".$nomdossier["$nom"]["fav"]."</fav><srv>".$nomSrv."</srv></ent>";
     if ($pair==1) $pair=0; else $pair=1;
  }

  // Affichage des fichiers ensuite
  foreach ($nomfichier as $nom => $val) {

    // Séparation du nom et de l'extension
    $point= strrpos($nom, ".");
    if ($point === false) { $extension= ""; $fichier=$nom; }
                     else { $extension= substr($nom,intval($point)+1); $fichier= substr($nom,0,$point); }

    // Récuperation des informations globales
    $lienSrv= blindeChemin("$chemin/$dossier/$nom");
    $lienUrl= urlencode("$dossier/$nom");
    $modifb = filemtime($lienSrv);
    $nomfichier["$nom"]["fichier"]   = $fichier;
    if ($typeServeur==1) {
      $nomfichier["$nom"]["iciPerm"]   = gestion(@fileperms($lienSrv));
      $nomfichier["$nom"]["modif"]     = $_SESSION["ws"]["dia"]["listeJour"][date("D", $modifb)].date(" j ", $modifb).$_SESSION["ws"]["dia"]["listeMois"][intval(date("n", $modifb))].date(" Y H:i", $modifb);
      $nomfichier["$nom"]["modiftri"]  = date ("YmdHis", $modifb);
      $nomfichier["$nom"]["valeur"]    = sprintf("%012s", intval($fichier));
      $nomfichier["$nom"]["taille"]    = sprintf("%012s", @filesize($lienSrv));
    }
    $total += intval($nomfichier["$nom"]["taille"]);

    // Détection favoris ou non
    $nomfichier["$nom"]["fav"]=""; $nomfichier["$nom"]["lck"]="";
    if ($l_mysql->test()) { 
      $path= blindeLien("/$dossier");
      if (strlen($path)!=1) while (substr($path,-1)=="/") $path=substr($path,0,-1);
      $verifFav= "SELECT file FROM wsfiles
        WHERE nomServeur LIKE '$nomSrv' AND path LIKE '$path' AND file LIKE '".utf8_encode($nom)."' AND favoris=1 ";
      $resultFav = $l_mysql->request_result($verifFav);
      if (!empty($resultFav)) $nomfichier["$nom"]["fav"]="1";
      $verifLck= "SELECT file FROM wsfiles
        WHERE nomServeur LIKE '$nomSrv' AND path LIKE '$path' AND file LIKE '".utf8_encode($nom)."' AND locked=1 ";
      $resultLck = $l_mysql->request_result($verifLck);
      if (!empty($resultLck)) $nomfichier["$nom"]["lck"]="1";
    }

    // Détection d'un commentaire rattaché au fichier
    $nomfichier["$nom"]["comment"] = "";
    if (isset($tabComment["$nom"])) $nomfichier["$nom"]["comment"] = $tabComment["$nom"];


    // Si l'extension est de type URL, lecture du contenu du lien et adaptation
    if ($extension=="url") {
      if ($typeServeur=="1") $content_file = file($lienSrv);
      else $content_file = ftp_file_contents($_SESSION["ws"]["$nomSrv"]["connexion"], "$chemin/$dossier/$nom");

      $regLien= substr($content_file[1],strrpos($content_file[1], ".")+1,strlen($content_file[1]));
      if (strpos($regLien, "/")>0) $regLien= substr(regLien,0,strpos(regLien, "/"));
    
      foreach ($_SESSION["ws"]["assoc"] as $nomExt => $valeur) {
        if (strtolower(trim($regLien))==$nomExt) $extension=strtolower(trim($regLien));
      }
      $nomfichier["$nom"]["lien"]     = blindeLien("$dossier/$nom");
      $nomfichier["$nom"]["lienWeb"]  = blindeNom(substr(trim($content_file[1]),8,trim(strlen($content_file[1]))));
      $nomfichier["$nom"]["extension"]= $extension;
      $nomfichier["$nom"]["protocol"] = "url";
      $nomfichier["$nom"]["taille"]   = 0;

      if (isset($_SESSION["ws"]["prevAct"])&&($_SESSION["ws"]["prevAct"]==1)&&(preg_match($typeImgReco,$extension)==1) ) {
             $nomfichier["$nom"]["visu"] = "moteur/pic.php?mini=1&typeimg=$extension&pic=".urlencode($nomfichier["$nom"]["lienWeb"]);
      } elseif (($extension=="rss")||($extension=="xml")) {
             $nomfichier["$nom"]["visu"] = strtolower("$extension.".$_SESSION["ws"]["formatExt"]);
             $content_rss = file_get_contents($nomfichier["$nom"]["lienWeb"]);
             preg_match("/(http.*gif)/",$content_rss,$regRss);
             if (strlen($regRss[1])>1) $nomfichier["$nom"]["visu"] = $regRss[1];

      } elseif (!isset($_SESSION["ws"]["assoc"]["$extension"])) {
          if (!is_file("$chemin/$dossier/wsminis/$nom")) {
            $nomfichier["$nom"]["extension"]="url";
            $lien_mini= 'http://open.thumbshots.org/image.pxf?url='.urlencode($nomfichier["$nom"]["lienWeb"]);
             $img_test = @imagecreatefromjpeg($lien_mini);
             if (!$img_test||!isset($_SESSION["ws"]["prevWeb"])||($_SESSION["ws"]["prevWeb"]!=1))
                    $nomfichier["$nom"]["visu"]= $_SESSION["ws"]["cheminIcn"]."url.".$_SESSION["ws"]["formatExt"];
             else { $nomfichier["$nom"]["visu"]= "moteur/pic.php?mini=1&typeimg=jpg&pic=".urlencode("$dossier/$nom");
                    imagejpeg($img_test,"$chemin/$dossier/wsminis/$nom",75);
                    imagedestroy($img_test); }
          } else $nomfichier["$nom"]["visu"]= "moteur/pic.php?mini=1&typeimg=jpg&pic=".urlencode("$dossier/$nom");
                    
      } else { $nomfichier["$nom"]["visu"] = $_SESSION["ws"]["cheminIcn"].strtolower("$extension.".$_SESSION["ws"]["formatExt"]); }

    } else {
    // Sinon lecture directe du fichier local
      if (($nomfichier["$nom"]["action"]!="visiter") && ($nomfichier["$nom"]["action"]!="ecouter"))
             $nomfichier["$nom"]["lien"] = blindeLien("$dossier/$nom");
        else $nomfichier["$nom"]["lien"] = blindeLien($_SESSION["ws"]["$nomSrv"]["repServeur"]."/$dossier/$nom");
      $nomfichier["$nom"]["lienWeb"]     = "";
      $nomfichier["$nom"]["extension"]   = $extension;
      $extension = strtolower($extension);
      $nomfichier["$nom"]["protocol"]  = "local";
      if ($typeServeur==1) $nomfichier["$nom"]["taille"]    = sprintf("%012s", @filesize($lienSrv));

      if (isset($_SESSION["ws"]["prevAct"])&&($_SESSION["ws"]["prevAct"]==1)&&($_SESSION["ws"]["$nomSrv"]["typeServeur"]==1)&&(preg_match($typeImgReco,$extension)==1) ) {
               $nomfichier["$nom"]["visu"] = "../../../moteur/pic.php?mini=1&imgSize=".$nomfichier["$nom"]["taille"]."&typeimg=$extension&pic=".urlencode("$dossier/$nom"); }
      elseif (($extension=="ico")&&($navig!="IE")) {
               $nomfichier["$nom"]["visu"] = "../../../moteur/ouvrir.php?url=".$nomfichier["$nom"]["lien"]; }
      elseif ((($extension=="pls")||($extension=="m3u"))&&($navig!="IE")) {
               $nomfichier["$nom"]["visu"] = strtolower("$extension.".$_SESSION["ws"]["formatExt"]);
             $content_pls = file_get_contents($lienSrv);
             preg_match("/Favicon=(http.*ico)/",$content_pls,$regPls);
             if (strlen($regPls[1])>1) $nomfichier["$nom"]["visu"] = $regPls[1];
      }
      elseif (isset($_SESSION["ws"]["assoc"]["$extension"])) {
           $nomfichier["$nom"]["visu"] = strtolower("$extension.".$_SESSION["ws"]["formatExt"]); }
        else { $nomfichier["$nom"]["visu"] = "div.".$_SESSION["ws"]["formatExt"]; }

    }
  }

  usort($nomfichier, "compare");

  // Envoi des informations de chaque fichier
  foreach ($nomfichier as $nom => $val) {
    $labelType= $_SESSION["ws"]["assoc"][strtolower($nomfichier["$nom"]["extension"])]["exttype"];
    echo "<ent><num>".$numid++."</num><lnk>".$nomfichier["$nom"]["lien"]."</lnk><web>".$nomfichier["$nom"]["lienWeb"]."</web><nom>".blindeAffichage($nomfichier["$nom"]["fichier"])."</nom><pro>".$nomfichier["$nom"]["protocol"]."</pro><vis>".blindeNom($nomfichier["$nom"]["visu"])."</vis><ext>".$nomfichier["$nom"]["extension"]."</ext>".
         "<lab>$labelType</lab><tai>".intval($nomfichier["$nom"]["taille"])."</tai><dtm>".$nomfichier["$nom"]["modif"]."</dtm><prm>".$nomfichier["$nom"]["iciPerm"]."</prm><dbl>".($pair?"pair":"")."</dbl><cmt>".blindeNom($nomfichier["$nom"]["comment"])."</cmt><fav>".$nomfichier["$nom"]["fav"]."</fav><srv>".$nomSrv."</srv><lck>".$nomfichier["$nom"]["lck"]."</lck></ent>";
    if ($pair==1) $pair=0; else $pair=1;
  }

  // Envoi des informations globales du répertoire
  if ($typeServeur==1) {
    define("DISK",$_SESSION["ws"]["$nomSrv"]["rootServeur"]."/"); // Dossier pour lequel on recherche l'espace
    $totalspace= round(disk_total_space(DISK),2);           // Récupération de l'espace disque
    $freespace = round(disk_free_space(DISK),2);            // Récupération de l'espace libre
    $used  = $totalspace - $freespace;                      // Calcul de l'espace utilisé
  } else {
    $totalspace= 0;
    $freespace = 0;
    $used      = 0;
  }
  
  if ($navigBin==1) $typeServeur=3;
  if (!empty($demarrage)) echo "<demarrage>".blindeChemin("/$demarrage")."</demarrage>"; else echo "<demarrage>/</demarrage>";
  echo "<serveur>$nomSrv</serveur><typeserveur>$typeServeur</typeserveur><permserveur>$permGlob</permserveur><fond>$fond</fond><nomrepere>".blindeAffichage($nomrepere)."</nomrepere><numdoss>$numdossier</numdoss><numfich>$numfichier</numfich>"
      ."<racineweb>".blindeLien($_SESSION["ws"]["rootWeb"])."</racineweb><espacetotal>$totalspace</espacetotal><espacelibre>$freespace</espacelibre><espacedir>$total</espacedir><espaceutil>$used</espaceutil><commentGlobal>$commentGlobal</commentGlobal>";

  echo "</repGalerie>";
echo "</reponse>";

$l_mysql->disconnect();

?>

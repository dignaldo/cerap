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
// Fonction : Affiche le lecteur MP3
// Nom      : mp3player.php
// Version  : 0.8.2
// Date     : 21/02/08
// =======================================================================
session_start();
include_once "../../moteur/auth.php";
include_once "../../moteur/fonctions.php";
$l_mysql = new class_mysql();
$l_mysql->connect();

//-----------------------------------------------------------------------------------------------------------
// Definition des variables
//-----------------------------------------------------------------------------------------------------------
$chemin    = preg_replace("/(nothl=1&)/","",$_REQUEST["chemin"]);
$url       = basename($_REQUEST["url"]);
$nomSrv    = $_SESSION["ws"]["serveurActif"];
$typeSrv   = $_SESSION["ws"]["$nomSrv"]["typeServeur"];
$zic_Liste = $_SESSION["ws"]["pluginDir"].'/zicList.xml';
$nom_rep   = basename(dirname($_SERVER["SCRIPT_FILENAME"]));
$cheminRep = blindeChemin($_SESSION["ws"]["cheminActif"]."/".$_SESSION["ws"]["dossierActif"]);

//-----------------------------------------------------------------------------------------------------------
// Action : on va lister les morceaux dispo dans un array
//-----------------------------------------------------------------------------------------------------------

if ($typeSrv=="1") {
  // En local
  $files[$url] = $url;
  $folder = opendir($cheminRep);
  while($file = readdir($folder)) {
	  if ($file[0] != "." && $file[0] != ".." )  {
			$exten = preg_replace('#(.+)\.(.+)#','$2',$file);
			if ($exten=='mp3') $files[$file] = $file;
		}
  }
  closedir($folder);
} else {
  // En FTP
  $files[$url] = $url; 
  $_SESSION["ws"]["$nomSrv"]["connexion"]=connexionFTP($nomSrv);
  if (($contents = ftp_rawlist($_SESSION["ws"]["$nomSrv"]["connexion"], $cheminRep))!==FALSE) {
    foreach($contents as $file) {

      $info = array();
      $vinfo = preg_split("/[\s]+/", $file, 9);
      if ($vinfo[0] !== "total") {
        $fileperms     = $vinfo[0];
        $filename      = $vinfo[8];
      }
      $droit=gestionFTP($fileperms);

      if ( (strpos($fileperms,"d")!==FALSE) && ($droit!="N") && ($droit!="W")) {
	      if ($filename != "." && $filename != ".." )  {
		  	  $exten = preg_replace('#(.+)\.(.+)#','$2',$filename);
			    if($exten=='mp3') $files[$filename] = $filename;
		    }
      }

    }
  }
}
//-----------------------------------------------------------------------------------------------------------
// Action : mise a jour de la playlist
//-----------------------------------------------------------------------------------------------------------
// On crée le fichier et on met l'entete
// Types d'autostart : oui/random/non
$xml = '<?xml version="1.0" encoding="UTF-8" ?>
<playlist version="1" xmlns="http://xspf.org/ns/0/" autoStart="oui">'."\n";

// On recupere les info de l'array
foreach($files as $element) {
  $titre = preg_replace('#(.+)\.(.+)#','$1',$element);
	if ($titre != $url)
	  $xml .= '<zic chemin="'."moteur/ouvrir.php?url="
        .blindeChemin($_SESSION["ws"]["dossierActif"]."/".$element)
        .'" titre="'.$titre.'" />'."\n";
}


// Fin du xml
    $xml .= '</playlist>';
								
// On recupere les info et on met a jour le xml
if (!$file_handle = fopen($zic_Liste,"w")) {
  print '<br/><font color=#"FF0000">on ne peut pas ouvrir le document: '.$zic_Liste.'verifier le CHMOD du dossier plugins et du fichier zicList.xml</font><br/>';
} elseif (!fwrite($file_handle, $xml)) {
  print '<br/><font color="#FF0000">On ne peut pas ecrire dans le document: '.$zic_Liste.'verifier le CHMOD du dossier plugins et du fichier zicList.xml</font><br/>';
}
fclose($file_handle);
?>
<html><head>
<meta http-equiv="Content-Script-Type" content="text/javascript"/>

</head><body style="border:0;padding:0;margin:50px">
<script type="text/javascript">
result = '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="100%" height="100%" id="player" align="middle">\n'
+'<param name="allowScriptAccess" value="sameDomain" />\n'
+'<param name="movie" value="plugins/<?php echo $nom_rep; ?>/player.swf" />\n'
+'<param name="quality" value="high" /><param name="wmode" value="transparent" />\n'
+'<embed src="plugins/<?php echo $nom_rep; ?>/player.swf" quality="high" width="100%" height="100%" wmode="transparent" name="player" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />\n'
+'</object>\n';

parent.document.getElementById('arborescence').style.bottom="85px";
parent.document.getElementById('frame_favoris').style.display="none";
parent.document.getElementById('playermp3').style.display="none";
parent.document.getElementById('playermp3new').style.display="block";
parent.document.getElementById('playermp3new').innerHTML=result;
parent.cacher();
</script>

</body></html>
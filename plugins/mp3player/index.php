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
$chemin=preg_replace("/(nothl=1&)/","",$_REQUEST["chemin"]);
$nom_rep = basename(dirname($_SERVER["SCRIPT_FILENAME"]));
$extMorceau= substr($_REQUEST["chemin"],-3);
$typeMorceau=1;
$nomMorceau="";

if (($extMorceau=="pls")||($extMorceau=="m3u")) {
    $typeMorceau=2;
    $content_file = file_get_contents($_SESSION["ws"]["cheminActif"].$_REQUEST["url"]);
    preg_match("!(http\:\/\/[[:alnum:]-\/\:\.]*)[[:cntrl:]]*!",$content_file, $adrFlux);
    if (preg_match("/favicon/",$adrFlux[0]))
         $chemin=urlencode(trim($adrFlux[1]));
    else $chemin=urlencode(trim($adrFlux[0]));
    $chemin= str_replace("listen.pls","",$chemin);
    $nomMorceau=str_replace(array(".pls",".m3u"),"",basename($_REQUEST["url"]));
}

?>
<html><head>
<script type="text/javascript">

 parent.document.getElementById('playermp3').style.display="block";
 parent.document.getElementById('playermp3').innerHTML="<table cellspacing='0' style='width:180px;height:70px'><tr class='mini'>"
      +"<td class='mini moveWindow'><img src='style/"+parent.styleActif+"/images/fenetre_01.png' style='cursor:move;width:4px;height:4px' /></td>"
      +"<td class='mini moveWindow'><img src='style/"+parent.styleActif+"/images/fenetre_02.png' style='cursor:move;width:180px;height:4px'/></td>"
      +"<td class='mini moveWindow'><img src='style/"+parent.styleActif+"/images/fenetre_03.png' style='cursor:move;width:4px;height:4px' /></td>"
    +"</tr><tr>"
      +"<td class='moveWindow' style="+'"'+"cursor:move;background:url('style/"+parent.styleActif+"/images/fenetre_04.png')"+'"'+" /></td>"
      +"<td class='' style='width:90px'>"

+'<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" style="width:180px;max-width:180px" height="74" id="player" align="middle">'
+'<param name="allowScriptAccess" value="sameDomain" /><param name="movie" value="'
+"plugins/<?php echo $nom_rep; ?>/player.swf?chemin=<?php echo urlencode($_SESSION["ws"]["cheminImg"])?><?php if (!empty($nomMorceau)) echo "&nomMorceau=".$nomMorceau; ?>&typeMorceau=<?php echo $typeMorceau; ?>&morceau=<?php echo $chemin;?>"
+'" /><param name="quality" value="high" /><param name="bgcolor" value="#000000" /><embed src="'
+"plugins/<?php echo $nom_rep; ?>/player.swf?chemin=<?php echo urlencode($_SESSION["ws"]["cheminImg"])?><?php if (!empty($nomMorceau)) echo "&nomMorceau=".$nomMorceau; ?>&typeMorceau=<?php echo $typeMorceau; ?>&morceau=<?php echo $chemin;?>"
+'" quality="high" bgcolor="#000000" style="width:180px;max-width:180px"  height="74" name="player" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></object>'
+"</td>"

      +"<td class='moveWindow' style="+'"'+"cursor:move;background:url('style/"+parent.styleActif+"/images/fenetre_06.png')"+'"'+" /></td>"
    +"</tr><tr class='mini'>"
      +"<td class='mini moveWindow'><img src='style/"+parent.styleActif+"/images/fenetre_07.png' style='cursor:move;width:4px;height:4px' /></td>"
      +"<td class='mini moveWindow'><img src='style/"+parent.styleActif+"/images/fenetre_08.png' style='cursor:move;width:180px;height:4px'/></td>"
      +"<td class='mini moveWindow'><img src='style/"+parent.styleActif+"/images/fenetre_09.png' style='cursor:move;width:4px;height:4px' /></td>"
    +"</tr></table>";
parent.document.getElementById('playermp3new').style.display="none";

</script>
</head><body style="border:0;padding:0;margin:0">
</body></html>
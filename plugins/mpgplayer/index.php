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
// Fonction : Affiche le lecteur Windows Media
// Nom      : mpgplayer.php
// Version  : 0.8.2
// Date     : 21/02/08
// =======================================================================
session_start();
include_once "../../moteur/auth.php";
include_once "../../moteur/fonctions.php";

  $chemin= urldecode($_REQUEST["chemin"]);
  $url   = urldecode($_REQUEST["url"]);
  $name  = substr($chemin, strrpos($chemin,"/")+1,strlen($chemin));
  $chemin= blindeChemin($_SESSION["ws"]["cheminActif"].$_SESSION["ws"]["dossierActif"]."/".$name);
  $file  = $_SESSION["ws"]["rootWeb"].blindeChemin("/".$_SESSION["ws"]["dossierActif"]."/".basename($url));
?>
<html><head>
<script type="text/javascript">
  function adapter() {
    document.getElementById('video').width =eval(document.body.clientWidth)+'px';
    document.getElementById('video').height=eval(document.body.clientHeight)+'px';
  }
</script>
</head><body style="border:0;padding:0;margin:0;overflow:hidden;">
<p id="player1"></p>
<script type="text/javascript">
  document.getElementById('player1').innerHTML=''

+'<OBJECT width="100%" height="100%" classid="CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95"'
+'codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,0,02,902"'
+'standby="Chargement de Media Player..." type="application/x-oleobject">'

+'<PARAM NAME="FileName" VALUE="'
+"<?php echo $file; ?>"
+'"><PARAM NAME="animationatStart" VALUE="true">'
+'<PARAM NAME="transparentatStart" VALUE="true">'
+'<PARAM NAME="autoStart" VALUE="true">'
+'<PARAM NAME="showControls" VALUE="true">'
+'<PARAM NAME="autoSize" VALUE="1">'

+'<EMBED type="application/x-mplayer2" pluginspage = "http://www.microsoft.com/Windows/MediaPlayer/"'
+'SRC="'
+"<?php echo $file; ?>"
+'" width="100%" height="100%" AutoStart="true"'
+'autosize="1" transparentatStart="true" animationatStart="true" showControls="true"></EMBED></OBJECT>';

 </script>
</body></html>


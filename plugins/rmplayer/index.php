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
// Fonction : Affiche le lecteur RealMedia
// Nom      : rmplayer.php
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
  $file  = "../../moteur/ouvrir.php?url=".blindeChemin($_SESSION["ws"]["dossierActif"]."/".basename($url));
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

+'<OBJECT CLASSID="clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA" WIDTH="100%" HEIGHT="100%">'
+'<PARAM NAME="CONTROLS" VALUE="ControlPanel">'
+'<PARAM NAME="CONSOLE" VALUE="Clip1">'
+'<PARAM NAME="AUTOSTART" VALUE="false">'
+'<PARAM NAME="nologo" VALUE="true">'
+'<PARAM NAME="NOJAVA" VALUE="true">'
+'<PARAM NAME="SRC" VALUE="'
+"<?php echo $file; ?>"
+'"><PARAM NAME="LOOP" VALUE="false">'

+'<EMBED SRC="'
+"<?php echo $file; ?>"
+'" WIDTH="100%" HEIGHT="100%" TYPE="audio/x-pn-realaudio-plugin" '
+'NOLOGO="true" NOJAVA="true" CONTROLS="ControlPanel" CONSOLE="Clip1" '
+'AUTOSTART="false" LOOP="false"></EMBED></OBJECT>';

 </script>
</body></html>
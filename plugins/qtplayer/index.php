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
// Fonction : Affiche le lecteur QuickTime
// Nom      : qtplayer.php
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

+'<OBJECT CLASSID="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" WIDTH="100%" HEIGHT="100%"'
+'CODEBASE="http://www.apple.com/qtactivex/qtplugin.cab">'

+'<PARAM name="SRC" VALUE="'
+"<?php echo $file; ?>"
+'"><PARAM name="AUTOPLAY" VALUE="true">'
+'<PARAM name="LOOP" VALUE="false">'
+'<PARAM name="CONTROLLER" VALUE="true">'

+'<EMBED type="video/quicktime" src="'
+"<?php echo $file; ?>"
+'" autoplay="true" width="100%"'
+'height="100%" loop="false" controller="true" PLUGINSPAGE="http://www.apple.com/quicktime/download/">'
+'</EMBED></OBJECT> ';

 </script>
</body></html>






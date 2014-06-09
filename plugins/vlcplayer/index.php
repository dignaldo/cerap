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

  $url   = urldecode($_REQUEST["url"]);
  $name  = utf8_decode(basename(urldecode($_REQUEST["chemin"])));
  $chemin= blindeChemin($_SESSION["ws"]["cheminActif"].$_SESSION["ws"]["dossierActif"]."/".$name);
  $file  = "../../moteur/ouvrir.php?url=".blindeChemin($_SESSION["ws"]["dossierActif"]."/".basename($url));
  $content_file = file_get_contents($chemin);
  preg_match("!([[:alpha:]]*\:\/\/.*)!","$content_file",$reglien);
  $stream= $reglien[1];
?>
<html><head>
<script type="text/javascript">
  function adapter() {
    document.getElementById('video').width =eval(document.body.clientWidth)+'px';
    document.getElementById('video').height=eval(document.body.clientHeight)+'px';
  }
</script>
<script type="text/javascript" src="VLCobject.js"></script>

</head><body style="border:0;padding:0;margin:0;overflow:hidden;">
<p id="player1"></p>

<script type="text/javascript">
		   var so = new VLCObject("video", "100%", "100%");
		   so.addParam("autoplay","yes");
		   so.addParam("MRL","<?php echo $stream; ?>");
		   so.write("player1");
</script>
</body></html>
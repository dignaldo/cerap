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
// Fonction : Affiche le lecteur Divx
// Nom      : aviplayer.php
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
  $file  = "../../../".$_SESSION["ws"]["rootWeb"].blindeChemin("/".$_SESSION["ws"]["dossierActif"]."/".basename($url));
  $file= str_replace("//", "/", $file);
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

+'<object classid="clsid:67DABFBF-D0AB-41fa-9C46-CC0F21721616" width="100%" height="100%" '
+' codebase="http://go.divx.com/plugin/DivXBrowserPlugin.cab">'
+'<param name="src" value="'
+"<?php echo $file; ?>"
+'"><embed type="video/divx" src="'
+"<?php echo $file; ?>"
+'" width="100%" height="100%" pluginspage="http://go.divx.com/plugin/download/"></embed></object>';

 </script>
</body></html>
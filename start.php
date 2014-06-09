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
// Fonction : Page de structure et de lancement
// Nom      : start.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
session_start();
include_once "moteur/auth.php";
include_once "moteur/fonctions.php";
include_once "lang/Spanish.lang.php";
include_once "lang/".$_SESSION["ws"]["langUser"].".lang.php";
$nomSrv=$_SESSION["ws"]["listeServeur"][0];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>
  <title><?php //echo $_SESSION["ws"]["pageTitle"]; ?> CERAP</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <!--  <link rel="shortcut icon" href="style/favicon.ico" type="image/ico"> -->
  <link rel="alternate" type="application/rss+xml" title="Webshare :: Nouvelles opérations " href="flux/index.php"/>

  <script language="JavaScript" src="moteur/script.php" type="text/javascript"></script>
  <style type="text/css" title="currentStyle">
    @import url('style/Standard.css');
  </style>
  <?php if ($_SESSION["ws"]["styleUser"]!="Standard") {
    echo '<link type="text/css" rel="stylesheet" href="style/'.$_SESSION["ws"]["styleUser"].'.css" media="screen">';
  } ?>
  <?php if ($navig=="IE") {
    // Pour gérer la transparence sous IE ?>
    <style type="text/css">
      u img, a img, nobr img, #liens img, .nom img, .caseimg img, #infos_user img, .context_item img, .context_des img
      { behavior: url('style/iepngfix.htc') }
    </style>
  <?php } ?>
	<script type="text/javascript">
      function startFunc() {
        if('function' == typeof(initialiser)) {
                initialiser();
        } else {
                location.reload(true);
        }
        if('function' == typeof(corriger)) {
                corriger();
        } else {
                location.reload(true);
        }
        if('function' == typeof(redimStop)) {
                redimStop();
        } else {
                location.reload(true);
        }
      }
		window.onresize=corriger;
		window.onmouseup=redimStop;
		window.onload=startFunc;
	</script>
</head>

<body>
<div id='layerDragDrop'></div>
<div id='playermp3new'></div>
<div id='playermp3' class='fenetre'></div>
<div id='context_box'></div>
<div id='frame_dossier'>
  <div id='close_arbre'></div>
  <div id='arborescence'>
    <div id='arbre'></div>
  </div>
  <div id='resize_dossier' onmousedown='redimFrame();'></div>
</div>
<div id='frame_favoris' onmouseover='autoriseSelection()' onmouseout='interditSelection()'>
  <div id='close_favoris'></div>
  <div id='resize_favoris' onmousedown='redimFavoris();'></div>
</div>
  <div id='barre_act'>
    <div id='act'></div>
  </div>
  <div id='frame_adresse'>
   <div id='adresse'>
    <span id='liens' class='montre'></span>
    <span id='charge' class='masque'></span>
   </div>
   <div id='util'></div>
  </div>
<div id='frame_content'>
   <div id="headerParams" class="v3">
   </div>
  <div id='frame_demande' onmouseover='autoriseSelection()' onmouseout='interditSelection()'></div>
  <div id='frame_galerie' onmouseover='iciSrv=actuelSrv'></div>
</div>
  <div id='frame_file'>
   <div id='resize_content' onmousedown='redimContent();'></div>
   <div id='file'>
    <span id='infotitre'></span>
   </div>
   <div id='tools'></div>
  </div>
  <div id='frame_detail' onmouseover='redimStop();'>
  </div>
  <div id='frame_infos' style='height:36px'>
    <div id='infos_rep'></div>
    <div id='horloge'></div>
    <div id='infos_user' <?php echo (($_SESSION["ws"]["publicUser"]!="on")?
      "onclick='affichePref(\"".$_SESSION["ws"]["dia"]["myPref"]."\")'":""); ?> ></div>
  </div>
<div id='frame_hidden'>
  <form name="editValue" action=''><input type='hidden' id='contentEditor' name='contentEditor' value=''>
               <input type='hidden' id='fileEditor' name='fileEditor' value=''></form>
  <iframe id='upload' name='upload' src='moteur/index.php'></iframe>
</div>
<div id='fenetre' class='fenetre'></div>
</body>
</html>
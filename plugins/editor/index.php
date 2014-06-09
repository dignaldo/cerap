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
// Fonction : Edite un fichier de type texte
// Nom      : editer.php
// Version  : 0.8.2
// Date     : 30/06/08
// =======================================================================
header ("Content-type: text/html; charset=utf-8");
session_start();
include_once "../../moteur/auth.php";
include_once "../../moteur/fonctions.php";
$l_mysql = new class_mysql();
$l_mysql->connect();

$url   = urldecode($_REQUEST["url"]);
$extension = substr($url,strpos($url,".")+1,strlen($url));

switch ($extension) {
  case "php": $fileType="php"; break;
  case "htm": case "html": $fileType="html"; break;
  case "js": $fileType="javascript"; break;
  case "java": $fileType="java"; break;
  case "css": $fileType="css"; break;
  case "xsl": $fileType="xsl"; break;
  case "perl": $fileType="perl"; break;
  case "sql": $fileType="sql"; break;
  default: $fileType="text"; break;
}

?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <script src="codepress/codepress.js" type="text/javascript"></script>
 <script type="text/javascript">
    parent.menuEditer();
    modePrev=1;
   
    function maj() {
      document.getElementById("editImproved").value= editContent.getCode();
      parent.modifierGarder();
      return false;
    }
    
    function previewContentArea() {
      if (modePrev==1) document.getElementById("previewContent").contentWindow.document.getElementsByTagName('body')[0].innerHTML= editContent.getCode();
    }

    function redimEditeur() {
      document.onmousedown = new Function("return false");
      document.onselectstart = new Function("return false");
      largeurscr = document.body.clientWidth;
      pourcent = 100*context_x/largeurscr;
      document.getElementById("overLayer").style.display="block";
      document.getElementById("frameEditContent").style.width=eval(pourcent-1)+"%";
      document.getElementById("previewContent").style.width=eval(99-pourcent)+"%";
      document.getElementById("resize_editeur").style.left =eval(pourcent)+"%";
      redimEdit= setTimeout("redimEditeur();",100);
    }

    function modeSimple() {
      document.getElementById("frameEditContent").style.width="100%";
      document.getElementById("previewContent").style.display="none";
      document.getElementById("resize_editeur").style.display="none";
      modePrev=0;
    }
    
    function modePreview() {
      document.getElementById("frameEditContent").style.width="49%";
      document.getElementById("previewContent").style.width="49%";
      document.getElementById("previewContent").style.display="block";
      document.getElementById("resize_editeur").style.left ="50%";
      document.getElementById("resize_editeur").style.display ="block";
      modePrev=1;
    }


  function context_position(e) {
    context_x = getMouseX(e);
    context_y = getMouseY(e);
  }

  function getMouseX(e){
    if (!e) var e = window.event;
   if(window.opera)                                                //OP6
           return e.clientX;
   else if(document.all)                                           //IE4,IE5,IE6
           return document.body.scrollLeft+e.clientX;
   else if(document.layers||document.getElementById)               //N4,N6,Moz
           return e.pageX;
  }

  function getMouseY(e){
    if (!e) var e = window.event;
   if(window.opera)                                                //OP6
           return e.clientY;
   else if(document.all)                                           //IE4,IE5,IE6
           return document.body.scrollTop+e.clientY;
   else if(document.layers||document.getElementById)               //N4,N6,Moz
           return e.pageY;
  }
  
  function redimStop() {
    if (typeof(redimEdit)!="undefined") clearTimeout(redimEdit);
    document.getElementById("overLayer").style.display="none";
    document.onselectstart = new Function("return true");
    setTimeout('document.onmousedown = new Function("return true");',200);
  }
  
    document.onmousemove = context_position;
    document.onmouseup = redimStop;
    
    rafraich= setInterval('previewContentArea()',2000);

 </script>
 <style type="text/css">
    body { background:#666;border:0px;padding:0px;margin:6px;overflow:hidden; }
    #frameEditContent { float:left; width:49%;height:100%;background:#fff;border: 1px solid #000;top:0;position:relative;display:block; }
    #previewContent   { float:right;width:49%;height:100%;background:#fff;border: 1px solid #000;top:0;position:relative;display:block; }
    #editContent { position:absolute;font-family:Consolas,Courier New;position:relative;width:1px;height:1px;background:#fff;color:#000;overflow:scroll;font-size:13px;border:solid 1px #000; }
    #resize_editeur { position:absolute;width:6px; top:0;left:50%;height:100%;visibility:visible;overflow:visible;text-align:left;z-index:100;
                      margin-left:-3px;cursor:w-resize;background:url('../../<?php echo $_SESSION["ws"]["cheminImg"]?>fondresize.png') }
    #overLayer { display:none;position:absolute;z-index:99;width:100%;height:100%;<?php if ($navig=="IE") echo 'background:#666'; ?>}
    #editForm { border:0px;padding:0px;margin:0px; }
 </style>
</head>

<body onload='setTimeout("r()",500);' onresize='r()'>
<div id="overLayer"></div>
<form name="editForm" id="editForm" onsubmit="maj();return false;">
<div id="resize_editeur" onmousedown='redimEditeur();'></div>
<iframe id="previewContent"></iframe>
<textarea class="codepress <?php echo $fileType; ?> linenumbers-on" id="editContent"><?php

$nomSrv   = $_SESSION["ws"]["serveurActif"];
$typeSrv  = $_SESSION["ws"]["$nomSrv"]["typeServeur"];
if ($typeSrv==2) $_SESSION["ws"]["$nomSrv"]["connexion"]=connexionFTP($nomSrv);

  $name  = utf8_decode(basename(urldecode($_REQUEST["chemin"])));
  $chemin= blindeChemin($_SESSION["ws"]["cheminActif"].$_SESSION["ws"]["dossierActif"]."/".$name);

  if ($typeSrv==1) echo str_replace("textarea","wstextarea",convertUTF8(file_get_contents($chemin)));
  else echo str_replace("textarea","wstextarea",convertUTF8(ftp_get_contents($_SESSION["ws"]["$nomSrv"]["connexion"], $chemin, FTP_BINARY)));
  
  $tabLog= array("18","1",$_SESSION["ws"]["dia"]["startEdit"]." ".$name,$_SESSION["ws"]["nomUser"],$_SESSION["ws"]["dossierActif"],$name,"");
  $l_mysql->logAction($tabLog);
  $l_mysql->disconnect();

?></textarea>
<input type="hidden" name="nomElement" id="nomElement" value="<?php echo $url; ?>">
<input type="hidden" name="editMode" id="editMode" value="1">
<input type="hidden" name="editImproved" id="editImproved" value="">
 <script type="text/javascript">
   function r() { previewContentArea(); }
 </script>
</form></body></html>
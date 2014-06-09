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
// Fonction : Identification pour démarrage de la session
// Nom      : ident.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
session_start();
include_once "moteur/fonctions.php";

    if (preg_match("/MSIE/i", $_SERVER["HTTP_USER_AGENT"])==1)       $navig="IE";
elseif (preg_match("/KHTML/i",$_SERVER["HTTP_USER_AGENT"])==1)       $navig="KH";
elseif (preg_match("/opera/i",$_SERVER["HTTP_USER_AGENT"])==1)       $navig="OP";
elseif (preg_match("/^Mozilla\//i", $_SERVER["HTTP_USER_AGENT"])==1) $navig="MO";

$deflang=deflang();
include_once "lang/$deflang.lang.php";
?>

  function disableselect(e){return false}
  function reEnable() {return true}
  function disableS() { document.onmousedown= disableselect;
                        document.onclick=     reEnable; }
  function enableS()  { document.onmousedown= reEnable;
                        document.onclick=     reEnable; }
  document.onselectstart = document.oncontextmenu = new Function("return false");
  disableS();

  function addEvent(obj,event,fct)
  {
    if( obj.attachEvent)
      obj.attachEvent('on' + event,fct);
    else
      obj.addEventListener(event,fct,true);
  }

  function init() {
    var elm1 = document.createElement("div");
    elm1.id = "header";
    document.getElementById("fond").appendChild(elm1);
    document.title="<?php echo $_SESSION["ws"]["dia"]["startTitle"]; ?>";
    xmlexp = getNewXMLHTTP();
    xmlexp.onreadystatechange = triggerInit;
    xmlexp.open("GET", "moteur/checkcookies.php", true);
    xmlexp.send(null);
    return false;
  }

  function triggerInit() {
    if ((xmlexp.readyState == 4) && (xmlexp.status == 200)) {
      var elm3 = document.createElement("div");
      elm3.id = "invite";
      elm3.className = "invite";
      if (xmlexp.responseText==1)
           elm3.innerHTML = "<div style='padding-top:20px;padding-bottom:35px'><?php echo $_SESSION["ws"]["dia"]["noSession"];?></div>";
      else elm3.innerHTML =
        '<form method="post" name="ident" action="" onsubmit="cestparti(); return false;">'
       +'<input type="hidden" name="actif" value="ok">'
       +'<div id="message"><?php echo $_SESSION["ws"]["dia"]["ident"]; ?></div>'
       +'<div id="divlogin"><input name="login"   type="text"  id="login"   class="logint" onmouseover="enableS();" onmouseout="disableS();"></div>'
       +'<div id="divpass"><input name="pass" type="password" id="pass" class="passwordt" onmouseover="enableS();" onmouseout="disableS();"></div>'
       +'<div id="divvalid"><input type="submit" value="<?php echo $_SESSION["ws"]["dia"]["enter"]; ?>" style="border:0;background:transparent;cursor:pointer"></div>'
       +'</form>'
       +'<div class="titreGPL" id="infoGPL"><?php echo str_replace("'","’",$_SESSION["ws"]["dia"]["infoGPL"]); ?></div>';
      document.getElementById("fond").appendChild(elm3);
      if (xmlexp.responseText!=1) document.ident.login.focus();

      var elm2 = document.createElement("div");
      elm2.id = "footer";
      elm2.className = "cr";
      elm2.innerHTML = "&copy; 2009 - Vivancos Virginie";
      document.getElementById("invite").appendChild(elm2);
      addEvent(document.getElementById("footer"),'mouseover',viewInfoGPL);
      addEvent(document.getElementById("footer"),'mouseout', hideInfoGPL);
    }
  }

  function viewInfoGPL() {
    document.getElementById("infoGPL").style.display="block";
  }
  function hideInfoGPL() {
    document.getElementById("infoGPL").style.display="none";
  }

  function getNewXMLHTTP() {
    try {
       return window.XMLHttpRequest?new XMLHttpRequest():
                                    new ActiveXObject("Microsoft.XMLHTTP");
    }
    catch (e) {
      return new ActiveXObject("Msxml2.XMLHTTP");
    }
  }

  function cestparti() {
    url="index.php";
    urlUpdated= window.location.href.substr(window.location.href.lastIndexOf("/")+1,window.location.href.length);
    if (urlUpdated=="") urlUpdated= url;
    xmlhttp = getNewXMLHTTP();
    xmlhttp.onreadystatechange = triggerIdent;
    datas=formData2QueryString(document.ident);
    xmlhttp.open("POST", urlUpdated, true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.setRequestHeader("Content-length", datas.length);
    xmlhttp.setRequestHeader("Cache-Control", "no-cache");
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(datas);
    return false;
  }

  function triggerIdent() {
    if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
      urlLocal= window.location.href.substr(0,window.location.href.lastIndexOf("/")+1);
      if (!xmlhttp.responseText.indexOf("valid")) {
         cycleI=0; pasI=-5; alphaI=100; fonduIdent();
         setTimeout('window.location.href = urlLocal+"start.php";',600);
      }
      else { document.getElementById("message").innerHTML = xmlhttp.responseText; }
    }
  }

  function launch(nameAccount) {
    if (nameAccount.length!=0) {
      urlLocal= window.location.href.substr(0,window.location.href.lastIndexOf("/")+1)
               +"index.php?actif=ok&mode=auto&login="+nameAccount+"&pass=";
      cycleI=0; pasI=-5; alphaI=100; fonduIdent();
      setTimeout('window.location.href = urlLocal;',600);
    }
  }

  function fonduIdent() {
    vfenetre= document.getElementById('fond').style;
    if ((pasI>0)&&(cycleI==0)) vfenetre.display="block";
      <?php if ($navig=="IE") { $filtreD='filter="alpha(opacity="+'; $filtreF='+")"'; }
                         else { $filtreD='opacity='; $filtreF='/100'; } ?>
    vfenetre.<?php echo $filtreD?>alphaI<?php echo $filtreF?>;
    if (cycleI<20) {
        alphaI+=pasI; cycleI+=1;
        setTimeout("fonduIdent()", 20); }
    if ((pasI<0)&&(cycleI==20)) vfenetre.display="none";
  }

  function formData2QueryString(docForm) {
    var strSubmit       = '';
    var formElem;
    var strLastElemName = '';

    for (i = 0; i < docForm.elements.length; i++) {
      formElem = docForm.elements[i];
        switch (formElem.type) {
          case 'text':
          case 'hidden':
          case 'password':
          strSubmit += formElem.name +
                '=' + encodeURIComponent(formElem.value) + '&'
          break; }
      }
    return strSubmit;
   }


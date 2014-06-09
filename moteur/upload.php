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
// Fonction : Gestionnaire d'upload
// Nom      : upload.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
header ("Content-type: text/html; charset=utf-8");
session_start();
include_once "auth.php";
include_once "fonctions.php";

$nomSrv= $_SESSION["ws"]["serveurActif"];
$chemin= $_SESSION["ws"]["cheminActif"]."/".$_SESSION["ws"]["dossierActif"]."/";

ob_start();
  $sid = md5(uniqid(mt_rand(), true));
ob_end_flush();

$_SESSION["ws"]["sid"]    = $sid;

if (!is_dir("../wstemp/")) mkdir("../wstemp/");
chmod("../wstemp/", 0777);

$pbRep=0;
$txtLimit= $_SESSION["ws"]['dia']["limitTaille"].ini_get('upload_max_filesize').$_SESSION["ws"]["dia"]["octet"];

if (!is_dir("../wstemp/")) {
         $txtLimit= $_SESSION["ws"]['dia']["theDir"]." 'wstemp' ".$_SESSION["ws"]['dia']["notAccessible"]; $pbRep=1;
} else if (($test = @fopen("../wstemp/stats_test.txt", 'w+'))===false) {
         $txtLimit= $_SESSION["ws"]['dia']["theDir"]." 'wstemp' ".$_SESSION["ws"]['dia']["accessProtect"]; $pbRep=1;
} else { fclose ($test); unlink("../wstemp/stats_test.txt"); }


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title><?php echo $_SESSION["ws"]["dia"]["waitingDownload"]." - ".$_SESSION["ws"]["pageTitle"]; ?></title>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="STYLESHEET" type="text/css" href="../style/Standard.css">
    <link rel="STYLESHEET" type="text/css" href="../style/<?php echo $_SESSION["ws"]["styleUser"]?>.css">
    <script type="text/javascript">

    /**************************************************************************************************
      Predefined Variables
    ***************************************************************************************************/
      var uploads = new Array();
      var upload_cell, file_name; valform = 0;
      var count=0;
      var checkCount = 0;
      var check_file_extentions = true;
      var sid = '<?php echo $sid?>';
      var page_elements = ["toolbar","page_status_bar"];
      var img_path = "<?php echo $_SESSION["ws"]["cheminImg"]?>";
      var bg_color = false;
      var status;
      var debug = false;
      var modeUpload="<?php echo '/cgi-bin/upload.cgi?'.$sid.'&'.$_SESSION["ws"]['tempDir'];?>";

      var pourcentage=0;
      var percent=0;
      var delaiProgress=1000;
      var timing=0;
      var http_requests = new Array();
      var upload_cell="";
      var boucle="";
      var response="";
      if (window.XMLHttpRequest) var http_request = new XMLHttpRequest();  else var http_request=false;
      var loading_graphic = "<img src='../<?php echo $_SESSION["ws"]["cheminImg"]?>loading.gif' border='0' align='absmiddle'>&nbsp;";

      // ==== Conversion de la taille de fichier pour affichage ====
      function convertir(nombre) {
        tailleFichier="";
        if ((nombre == 0) || (nombre == "")) tailleFichier="0";
        if ((nombre  > 0) && (nombre < 1024)) tailleFichier=(Math.round(nombre*100)/100)+" octets";
        if ((nombre >= 1024) && (nombre < 1048576)) tailleFichier=(Math.round((nombre/1024)*100)/100)+" Ko";
        if ((nombre >= 1048576) && (nombre < 1073741824)) tailleFichier=(Math.round((nombre/1048576)*100)/100)+" Mo";
        if ( nombre >= 1073741824) tailleFichier=(Math.round((nombre/1073741824)*100)/100)+" Go";

        return tailleFichier;
      }


      // ==== Detecte si le fichier a charger est une archive Zip ====
      function detectZip(nomFichier,num) {
        if (nomFichier.indexOf(".zip")!=-1)
             document.getElementById(num).style.visibility="visible";
        else document.getElementById(num).style.visibility="hidden";
      }

      // ==== Mets les champs à jour ====
      function maj(count) {
      if (!document.getElementById("frmUpload_"+count+"")) return true;
      document.getElementById("frmUpload_"+count+"").nomEncode.value =encodeURI(document.getElementById("frmUpload_"+count+"").filename.value);
      document.getElementById("frmUpload_"+count+"").typeAction.value=recupVal();
        }

      // ==== Retourne l'action à effectuer en cas de fichier déjà existant ====
      function recupVal() {
      if(document.actionFile.actRep[0].checked) return 0;
      if(document.actionFile.actRep[1].checked) return 1;
      if(document.actionFile.actRep[2].checked) return 2;
      return 0;
      }

    // ==== Nettoie l'url pour affichage ====
    function nettoieUrl(nomUrl) {
      if (nomUrl.indexOf("%u")!=-1) {
      while (nomUrl.indexOf("%u")!=-1) {
        empl= nomUrl.indexOf("%u");
          compcar= nomUrl.substr(empl+2,4);
      hexacar= parseInt(compcar,16);
      compcar= "%u"+compcar;
      regTest= new RegExp (compcar,"g");
      nomUrl= nomUrl.replace(regTest,"&#"+hexacar);
      }
      }
    return nomUrl;
    }
  
    // ==== Adapte l'url pour affichage ====
    function affichUrl(nomUrl) {
      if (nomUrl.substr(0,4)!="http") {
        while(nomUrl.indexOf("%2F") > 0) {
      nomUrl= nomUrl.replace(/%2F/,"/",nomUrl); }
      nomUrl= nomUrl.substring((nomUrl.lastIndexOf("/"))+1);
      nomUrl= nettoieUrl(nomUrl); }
    return nomUrl;
    }
  
    //** FUNCTION: Set SrollBox Height Based on Element Input Array
      function checkPage(scrollBox,el_array) {
        var adjustOffset = 0;
        if (eval(el_array)) {
          for (i=0; i< el_array.length; i++) {
            if (eval(document.getElementById(el_array[i])) && !isNaN(document.getElementById(el_array[i]).offsetHeight)) {
              adjustOffset = adjustOffset + document.getElementById(el_array[i]).offsetHeight;
            }
          }
        }
        var height = document.body.clientHeight - adjustOffset;
            document.getElementById(scrollBox).style.height=height+'px';
      }

      function build_HttpRequest() {
        if (window.XMLHttpRequest) { // Mozilla, Safari,...
          var request = new XMLHttpRequest();
          if (request.overrideMimeType) { request.overrideMimeType('text/xml');}
        } else if (window.ActiveXObject) { // IE
          try {var request = new ActiveXObject("Msxml2.XMLHTTP");}
          catch (e) {
            try {var request = new ActiveXObject("Microsoft.XMLHTTP");} catch (e) {}
          }
        }
        if (!request) { return false;}
        return request;
      }
    //** FUNCTION: Make Request to Server passing GET variables
      function makeRequest(url,do_function) {
        http_request = build_HttpRequest();
        var time = new Date();
        if (url.indexOf('?')>0){ url = url + '&time='+time.getTime(); } else { url = url + '?time='+time.getTime();}
        http_request.onreadystatechange = do_function;
        http_request.open('GET', url, true);
        http_request.send(null);
      }

      function checkCGI() {
             if ((http_request.readyState == 4) && (http_request.status != 200) ) { modeUpload= 'crea_fichier.php'; document.getElementById("limitTaille").style.visibility="visible"; }
             if ((http_request.readyState == 4) && (http_request.status == 200) && (http_request.responseText!="ok")) { modeUpload= 'crea_fichier.php'; document.getElementById("limitTaille").style.visibility="visible"; }
             <?php if ($pbRep==1) echo 'document.getElementById("limitTaille").style.visibility="visible";'; ?>
        }

    //** FUNCTION: Create Upload Form
      function createFileInput() {
        var tbody = document.getElementById('list_body').getElementsByTagName('tbody')[0];
      // Create Table Row
        var tr = document.createElement("tr")
        if (bg_color) { tr.className="on"; bg_color= false; } else { bg_color = true;}
      // Create Table Cell
        var td = document.createElement("td")
        td.id='upload_'+count;
        td.width='100%';
        var output = new Array();
        output.push("<form id='frmUpload_"+count+"' target='uploadForm' method='post' enctype='multipart/form-data' action='"+modeUpload+"'>");
        output.push("<input type='hidden' name='sid' value='"+sid+"'>");
        output.push("<input type='hidden' name='chemin' value='<?php echo blindeChemin($chemin)?>'>");
        output.push("<input type='hidden' name='tempch' value='<?php echo blindeChemin($_SESSION["ws"]["tempDir"])?>'>");
        output.push("<input type='hidden' name='MAX_FILE_SIZE' value='<?php echo conversion(ini_get('upload_max_filesize'))?>'>");
        output.push("<input type='hidden' name='nomEncode' value=''>");
        output.push("<input type='hidden' name='typeAction' value='0'>");
        output.push("<input style='margin:10px;' type='file' name='filename' onchange='valform="+count+"; detectZip(this.value,\"zipbox_\"+"+count+"); maj("+count+");'>");
        output.push("<span id='zipbox_"+count+"' style='visibility:hidden'><input type='checkbox' name='typeZip' value='0' onchange='if(this.checked) this.value=1; else this.value=0;'>&nbsp;<?php echo $_SESSION["ws"]["dia"]["toDezip"]?></span><\/form>");
        td.innerHTML = output.join('');
        tr.appendChild(td);
        tbody.appendChild(tr);
        uploads.push(count);
        count++;
        
        hautideale=eval(count*44);
        if ((hautideale>200)&&(hautideale<600)) this.resizeTo(460,hautideale+160);

      }

      //** FUNCTION: Process Queued Uploads
      function upload() {
        if (uploads.length>0) {
          pourcentage=0; percent=0;
          form = document.getElementById('frmUpload_'+uploads[0]);
          if (form["filename"].value != ""){
            filename =   form["filename"].value;
            typeZip =    form["typeZip"].value;
            typeAction = form["typeAction"].value;
            nomEncode =  form["nomEncode"].value;
            if (filename.lastIndexOf("\\")>0) {
              filename = filename.substring(filename.lastIndexOf("\\")+1,filename.length);
            } else if (filename.lastIndexOf("/")>0) {
              filename = filename.substring(filename.lastIndexOf("/")+1,filename.length);
            }
            makeRequest("upload_progress.php?filename="+filename+"&nomEncode="+nomEncode+"&typeZip="+typeZip+"&typeAction="+typeAction,progress);
            form.submit();
            document.getElementById("btn_upload").innerHTML = loading_graphic+" <?php echo $_SESSION["ws"]["dia"]["uploading"]?>";
          }
        }
      }

      //** FUNCTION: Process Response From Ajax Request
      function progress() {

        switch (http_request.readyState) {
          case 1 : checkCount++; break;
          case 4 :
            if (http_request.status == 200) {
              response = http_request.responseText.split('|');
              var ext = response[1].substring(response[1].lastIndexOf(".")+1,response[1].length);
              upload_cell = document.getElementById('upload_'+uploads[0]);

              switch(response[0]) {
                case "W":
                  afficheInfo(response[1],"<?php echo $_SESSION["ws"]["dia"]["waitingDownload"]?> ("+checkCount+")",ext,0,"W");
                  document.title= "<?php echo $_SESSION["ws"]["dia"]["waitingDownload"]?> ("+checkCount+") - <?php echo $_SESSION["ws"]["pageTitle"]; ?>";
                  boucle= setTimeout('makeRequest("upload_progress.php",progress);',delaiProgress); break;

                case "D":
                  afficheInfo(response[1],"<?php echo $_SESSION["ws"]["dia"]["downloading"]?> - "+convertir(response[3])+" of "+convertir(response[4])+" ("+convertir(response[5])+"/s) ",ext,response[2],"D");
                  document.title= Math.round(response[2])+"% <?php echo $_SESSION["ws"]["dia"]["uploaded"]?> - <?php echo $_SESSION["ws"]["pageTitle"]; ?>";
                  boucle= setTimeout('makeRequest("upload_progress.php",progress);',delaiProgress); break;

                case "S":
                  uploads.splice(0,1);
                  afficheInfo(response[1],"<?php echo $_SESSION["ws"]["dia"]["success"]?>",ext,0,"S");
                  document.title= " <?php echo $_SESSION["ws"]["dia"]["success"]?> - <?php echo $_SESSION["ws"]["pageTitle"]; ?>";
                  document.getElementById("btn_upload").innerHTML = '<a href="javascript:createFileInput();" class="btn img_upload"><?php echo $_SESSION["ws"]["dia"]["addUpload"]?><\/a>';
                  window.opener.actualiserUp();
                  checkCount = 0;
                  clearTimeout(boucle);
                  setTimeout("upload();",1000); break;

                case "P": default:
                  errorUpload(response[3]);
              }
            } else { errorUpload("<?php echo $_SESSION["ws"]["dia"]["problemDownload"]?>.("+http_request.responseText+")"); }
            break;
        }
      }

      // ==== Affiche le message d'erreur ====
      function errorUpload(msg) {
        uploads.splice(0,1);
        afficheInfo(response[1],msg,"delete",0);
        document.getElementById("btn_upload").innerHTML = '<a href="javascript:createFileInput();" class="btn img_upload"><?php echo $_SESSION["ws"]["dia"]["addUpload"]?><\/a>';
        checkCount = 0;
        clearTimeout(boucle);
        setTimeout("upload();",1000);
      }


      // ==== Affiche les infos ====
      function afficheInfo(msg1,msg2,ext,pct,status) {
          percent= pct;
          var output = new Array();
          if (document.getElementById('evo')==undefined) {
            upload_cell.innerHTML = "<div id='evo'>"
              +"<table cellspacing='0' cellpadding='0' border='0' width='98%' style='margin-top:5px;margin-bottom:5px;'><tr>"
              +"<td width='30' height='40'>"
              +"<img src='../<?php echo $_SESSION["ws"]["cheminIcn"]?>minis/"+ext.toLowerCase()+".<?php echo $_SESSION["ws"]["formatExt"]?>'><\/td><td>"
              +"<div id='up_filename' class='upload_filename'>"+affichUrl(msg1)+"<\/div>"
              +"<div id='upload_bar' style='display:none'>"
              +"<div id='up_bar' style='text-align:right;width:"+percent+"%'>"+percent+"%<\/div><\/div>"
              +"<div id='up_stats'> "+msg2+"<\/div>"
              +"<\/td><\/tr><\/table><\/div>";
          } else {
            document.getElementById('up_filename').innerHTML      = affichUrl(msg1);
            document.getElementById('up_stats').innerHTML         = msg2;
            if (percent>1) {
              document.getElementById('upload_bar').style.display = "block";
              avancee= percent-pourcentage;
              barreprogressive(avancee);
            } else {
              document.getElementById('upload_bar').style.display = "none";
            }

          }
          if (status=="S") {
              upload_cell.innerHTML = ""
              +"<table cellspacing='0' cellpadding='0' border='0' width='98%' style='margin-top:5px;margin-bottom:5px'><tr>"
              +"<td width='30' height='30'>"
              +"<img src='../<?php echo $_SESSION["ws"]["cheminIcn"]?>minis/"+ext.toLowerCase()+".<?php echo $_SESSION["ws"]["formatExt"]?>'><\/td><td>"
              +"<div class='upload_filename'>"+affichUrl(msg1)+"<\/div>"
              +"<div> "+msg2+"<\/div>"
              +"<\/td><\/tr><\/table>";
          }
      }

    function barreprogressive(avancee) {
      pourcentage +=  parseFloat(avancee)/10;
      document.getElementById('up_bar').style.width       = pourcentage+"%";
      document.getElementById('up_bar').innerHTML         = parseInt(pourcentage)+"%&nbsp;";
      if  (pourcentage<percent) setTimeout("barreprogressive("+avancee+")",delaiProgress/10);
    }

    window.onresize = function() { checkPage("ScrollBox",page_elements);}
    document.oncontextmenu = document.onselectstart = function () { return false; }
    window.onload = function () {
      checkPage("ScrollBox",page_elements);
      status = document.getElementById("status");
      createFileInput();
    }

    </script>
  </head>
  <body onload='makeRequest("/cgi-bin/upload.cgi?test",checkCGI);'>
    <div class="tool_bar" id="toolbar">
      <div class="menu_start">&nbsp;</div>
      <span id="btn_upload"><a href="javascript:createFileInput();" title="<?php echo $_SESSION["ws"]["dia"]["addUpload"]?>"><?php echo $_SESSION["ws"]['dia']["addUpload"]?></a></span>
      <div class="divider">&nbsp;</div>
      <a href="javascript:upload();" title="<?php echo $_SESSION["ws"]['dia']["startUpload"]?>"><?php echo $_SESSION["ws"]["dia"]["startUpload"]?></a>
      <div class="divider">&nbsp;</div>
      <a href="javascript:window.close();" title="<?php echo $_SESSION["ws"]['dia']["closeWindow"]?>"><?php echo $_SESSION["ws"]["dia"]["closeWindow"]?></a>
    </div>
    <div id="fileExist" style="visibility:visible;text-align:center">
      <form name="actionFile">
      <?php echo $_SESSION["ws"]['dia']["ifFileExist"]?> <input type="radio" name="actRep" value="1" checked onchange="maj(valform)" /> <?php echo $_SESSION["ws"]['dia']["replaceFile"]?> &nbsp; <input type="radio" name="actRep" value="2" onchange="maj(valform)" /> <?php echo $_SESSION["ws"]['dia']["renameFile"]?> &nbsp; <input type="radio" name="actRep" value="3" onchange="maj(valform)" /> <?php echo $_SESSION["ws"]['dia']["cancelFile"]?>
      </form>
    </div>
    <div id="limitTaille" class="cadre" style="visibility:hidden;text-align:center">
      <?php echo $txtLimit; ?>
    </div>
    <div id="ScrollBox" style="overflow:auto;">
      <table id="list_body" cellspacing="0" cellpadding="5" border="0" width="100%"><tbody></tbody></table>
      <iframe id="uploadForm" name="uploadForm" scrolling="No" class='wdebug' src=""></iframe>
      </div>
  </body>
</html>

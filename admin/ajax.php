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
// Fonction : Comportements de la page d'administration
// Nom      : ajax.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================

include_once "../moteur/fonctions.php";
$racineServeur= getDocumentRoot();
$l_mysql = new class_mysql();
$l_mysql->connect();

  // Modifier les chemins des répertoires en cas d'incompatibilité
  $cheminPass             = "../wspasswd/";
  $chemin= $cheminPass."conf.ini";
  
?>

  // ==== Création de l'objet XmlHttp ====
  function getNewXMLHTTP() {
    try {
      return window.XMLHttpRequest?new XMLHttpRequest():
                                   new ActiveXObject("Microsoft.XMLHTTP");
    }
    catch (e) {
      window.location='../index.php';
    }
  }

  // ==== Requête asynchrone avec envoi de données ====
  function valid(formdoc,url,lancer_fonction) {
    xmlhttp = getNewXMLHTTP();
    datas=formData2QueryString(formdoc);
    xmlhttp.onreadystatechange = lancer_fonction;
    xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.setRequestHeader("Content-length", datas.length);
    xmlhttp.setRequestHeader("Cache-Control", "no-cache");
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(datas);
    return false;
  }

  // ==== Requête asynchrone simple ====
  function valid_get(url,lancer_fonction) {
    xmlhttp = getNewXMLHTTP();
    xmlhttp.onreadystatechange = lancer_fonction;
    xmlhttp.open("GET", url, true);
    xmlhttp.send(null);
    return false;
  }

  // ==== Requête asynchrone simple ====
  function valid_rub(url,lancer_fonction) {
    rubhttp = getNewXMLHTTP();
    rubhttp.onreadystatechange = lancer_fonction;
    rubhttp.open("GET", url, true);
    rubhttp.send(null);
    return false;
  }

  // ==== Requête asynchrone simple ====
  function valid_cmp(url,lancer_fonction) {
    cmphttp = getNewXMLHTTP();
    cmphttp.onreadystatechange = lancer_fonction;
    cmphttp.open("GET", url, true);
    cmphttp.send(null);
    return false;
  }

  // ==== Validation des modifications ====
  function retinfos() {
    if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
       document.getElementById('message').innerHTML= xmlhttp.responseText;
       document.getElementById("entete").style.display="none";
       retiremsg();
     }
   }
  function retinfosutil() {
    if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
       document.getElementById('message').innerHTML= xmlhttp.responseText;
       document.getElementById("entete").style.display="none";
       retiremsg();
       valid_rub('utilisateur.php',reloadUserPanel);
     }
   }
  function retinfosserv() {
    if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
       document.getElementById('message').innerHTML= xmlhttp.responseText;
       document.getElementById("entete").style.display="none";
       retiremsg();
       valid_rub('utilisateur.php',reloadUserPanel);
       valid_cmp('serveur.php',reloadServerPanel);
     }
   }
  function retinfospref() {
    if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
       document.getElementById('message').innerHTML= xmlhttp.responseText;
       document.getElementById("entete").style.display="none";
       retiremsg();
       valid_rub('info.php',reloadInfoPanel);
       valid_cmp('preferences.php',reloadPrefPanel);
     }
   }
  function resulttest() {
    if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
       document.getElementById('msgtest').innerHTML= xmlhttp.responseText;
     }
   }
  function retiremsg() {
    setTimeout("document.getElementById('message').innerHTML='';",3000);
    setTimeout("document.getElementById('entete').style.display='block';",3000);
  }
 
  function reloadServerPanel() {
    if ((cmphttp.readyState == 4) && (cmphttp.status == 200)) { 
      document.getElementById('rub2').innerHTML= cmphttp.responseText;
      removeJS = document.getElementById('dynJS2');
      if (removeJS) removeJS.parentNode.removeChild(removeJS);
      addScript('dynJS2',trimScript(cmphttp.responseText));      
      Sortable.create("list", {onUpdate:function(){document.getElementById('triServeur').value= Sortable.sequence('list');}});                 
    } 
  }
  
  function reloadUserPanel() {
    if ((rubhttp.readyState == 4) && (rubhttp.status == 200)) { 
      document.getElementById('rub3').innerHTML= rubhttp.responseText;
      removeJS = document.getElementById('dynJS3');
      if (removeJS) removeJS.parentNode.removeChild(removeJS);
      addScript('dynJS3',trimScript(rubhttp.responseText));             
    }
  }
  
  function reloadPrefPanel() {
    if ((cmphttp.readyState == 4) && (cmphttp.status == 200)) { 
      document.getElementById('rub1').innerHTML= cmphttp.responseText;
      removeJS = document.getElementById('dynJS3');
      if (removeJS) removeJS.parentNode.removeChild(removeJS);      
      addScript('dynJS1',trimScript(cmphttp.responseText));            
    } 
  }
    
  function reloadInfoPanel() {
    if ((rubhttp.readyState == 4) && (rubhttp.status == 200)) { 
      document.getElementById('rub4').innerHTML= rubhttp.responseText;
      removeJS = document.getElementById('dynJS4');
      if (removeJS) removeJS.parentNode.removeChild(removeJS);      
      addScript('dynJS4',trimScript(rubhttp.responseText));            
    }
  }
  

  function loadPanel1() { 
    document.getElementById('rub4').style.visibility="hidden";
    valid_rub('preferences.php',loadPanel2);
  }
  function loadPanel2() { 
    if ((rubhttp.readyState == 4) && (rubhttp.status == 200)) {
      document.getElementById('rub1').innerHTML= rubhttp.responseText;
      addScript('dynJS1',trimScript(rubhttp.responseText));
      valid_rub('serveur.php',loadPanel3);
    }
  }
  function loadPanel3() { 
    if ((rubhttp.readyState == 4) && (rubhttp.status == 200)) {
      document.getElementById('rub2').innerHTML= rubhttp.responseText;
      addScript('dynJS2',trimScript(rubhttp.responseText));
      Sortable.create("list", {onUpdate:function(){document.getElementById('triServeur').value= Sortable.sequence('list');}});
      valid_rub('utilisateur.php',loadPanel4);
    }
  }
  function loadPanel4() { 
    if ((rubhttp.readyState == 4) && (rubhttp.status == 200)) {
      document.getElementById('rub3').innerHTML= rubhttp.responseText;
      addScript('dynJS3',trimScript(rubhttp.responseText));
      valid_rub('info.php',loadPanel5);
    }
  }
  function loadPanel5() { 
    if ((rubhttp.readyState == 4) && (rubhttp.status == 200)) {
      document.getElementById('rub4').innerHTML= rubhttp.responseText;
      addScript('dynJS4',trimScript(rubhttp.responseText));
      valid_rub('associations.php',loadPanel6);
    }
  }
  function loadPanel6() { 
    if ((rubhttp.readyState == 4) && (rubhttp.status == 200)) { 
      document.getElementById('rub5').innerHTML= rubhttp.responseText;
      addScript('dynJS5',trimScript(rubhttp.responseText));       
      valid_rub('logs.php',loadPanel);
    }   
  }      
  function loadPanel() { 
    if ((rubhttp.readyState == 4) && (rubhttp.status == 200)) { 
      document.getElementById('rub6').innerHTML= rubhttp.responseText;
      addScript('dynJS6',trimScript(rubhttp.responseText));       
    }   
  }       
  
  function lancement() {
      document.getElementById('invite').style.display="none";
      <?php if ($navig=="IE") { ?>
        new Effect.Appear(document.getElementById("onglets"),{ duration: 0.2, to:1.0 });
        new Effect.Appear(document.getElementById("content2"),{ duration: 0.2, to:1.0 });
        new Effect.Appear(document.getElementById("ft"),{ duration: 0.2, to:1.0 });
      <?php } else { ?>
        document.getElementById('onglets').style.opacity="1";
        document.getElementById('content2').style.opacity="1";
        document.getElementById('ft').style.opacity="1";
      <?php } ?>
      changerub(numonglet);
      loadPanel1();
  } 

  function authentifie() {
    valid(document.ident,'auth.php',resultAuth);
  }

  function resultAuth() {
    if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {  
      if (xmlhttp.responseText.indexOf("ok")!=-1) {
        lancement();
      } else {
        document.getElementById("messageInvit").innerHTML="<?php echo $_SESSION["ws"]["dia"]["cantIdent"]; ?>";
        document.ident.login.focus();    
      }
    }
  }

  function mav(onglet) { if (onglet.className=='onglet_off') onglet.className='onglet_hover'; }
  function msv(onglet) { if (onglet.className=='onglet_hover') onglet.className='onglet_off'; }

  function changerub(num) {
    for(var i=1; i<7; i++) {
    document.getElementById("onglet"+i).className= 'onglet_off'; }
    document.getElementById("onglet"+num).className= 'onglet_on';
    document.getElementById("rub"+oldnum).style.visibility="hidden";
    document.getElementById("rub"+oldnum).style.display="none";    
    document.getElementById("rub"+oldnum).style.zIndex="0";
    document.getElementById("rub"+num).style.visibility="visible";
    document.getElementById("rub"+num).style.display="block";
    document.getElementById("rub"+num).style.zIndex="100";
    oldnum=num;
    numonglet=num;
  }

  function corriger() {
     document.getElementById('content2').style.height=eval(document.body.clientHeight-130)+'px';    
     <?php if ($navig=="IE") { ?>  
       document.getElementById('content2').style.height=eval(document.body.clientHeight-120)+'px';
       document.getElementById('content2').style.top='91px';       
     <?php } ?>
  }

  function checkProtect() {
    valid_cmp('checkadmin.php?access=1',dispProtect);
  }
  
  function dispProtect() {
    if ((cmphttp.readyState == 4) && (cmphttp.status == 200)) { 
      if (cmphttp.responseText.indexOf("ok")!=-1) 
        document.getElementById("verrou").innerHTML= "<img src='img/verrou1.gif' title='<?php echo str_replace("'","’",$_SESSION["ws"]["dia"]["adminProtected"]); ?>'>";
      if (cmphttp.responseText.indexOf("nr")!=-1)
        document.getElementById("verrou").innerHTML= "<img src='img/verrou2.gif' title='<?php echo str_replace("'","’",$_SESSION["ws"]["dia"]["msgInfo4"]); ?>' class='curseur' onclick='window.location.href=\"acces.php\"' >";
    }
  }

  function dispImport() {
    <?php
      if (is_file($chemin)) {
        $lines = file($chemin);

        $idb=0;
        // ==== Vérification de l'import ====
        foreach ($lines as $line_num => $line) {
          if (preg_match("/^\[ImportOK\]/i",rtrim($line))==1) $idb=1;
        }
        
        if ($l_mysql->test() && ($idb==0)) {
          echo "document.getElementById(\"idb\").innerHTML= \"<img src='img/importbase.gif' class='curseur' onclick='importDB()' title='".$_SESSION["ws"]["dia"]["importToBase"]."'>\";";
        }
      }
    ?>
    
  }

  function importDB() {
    if (confirm("<?php echo $_SESSION["ws"]["dia"]["importConfirm"]; ?>")===true) valid_cmp('importdb.php',resultImportDB);
  }
  
  function resultImportDB() {
    if ((cmphttp.readyState == 4) && (cmphttp.status == 200)) {
      document.getElementById("message").innerHTML=cmphttp.responseText;
      setTimeout("document.getElementById('message').innerHTML='';",3000);
      document.getElementById("idb").innerHTML= "";
    }
  }

  // ==== Validation des modifications ====
  function infoserreur(msg) {
    document.getElementById("message").innerHTML="<span style='background:#F66'>"+msg+"</span>";
    setTimeout("document.getElementById('message').innerHTML='';",3000);
 }

  // ==== Fonction Trim ====
  function trim(string)
  {
    return string.replace(/(^\s*)|(\s*$)/g,'');
  }

  // ==== Concaténation des données de formulaire en chaîne URL ====
  function formData2QueryString(docForm) {
  var formElem;
    var strSubmit       = '';
    var strLastElemName = '';

    for (i = 0; i < docForm.elements.length; i++) {
      formElem = docForm.elements[i];

      switch (formElem.type) {
        case 'text':
        case 'textarea':
        case 'select-one':
        case 'hidden':
        case 'password':
          strSubmit += formElem.name +
          '=' + encodeURIComponent(trim(formElem.value)) + '&'
        break;
        case 'select-multiple':
          var selectBox = formElem;
          for (var j=0; j<selectBox.options.length; j++) {
            if (selectBox.options[j].selected) {
              strSubmit += formElem.name + 
              '=' + encodeURIComponent(trim(selectBox.options[j].value)) + '&'
            }
          }
        break;
        case 'radio':        
          if (formElem.checked===true) strSubmit += formElem.name +
          '=' + encodeURIComponent(trim(formElem.value)) + '&'
        break;
        case 'checkbox':
          if (formElem.checked===true) strSubmit += formElem.name +
          '=' + encodeURIComponent(trim(formElem.value)) + '&'
        break;
      }
    }
    return strSubmit;
   }

  // ==== Fonction addScript ====
  function addScript(nom,texte) {
    var BaliseScript=document.createElement('script');
    BaliseScript.setAttribute('type','text/javascript');
    BaliseScript.setAttribute('id',nom);
    BaliseScript.text = texte;
    document.body.appendChild(BaliseScript);
  }
  
  // ==== Fonction Trim ====
  function trimScript(newHTML) {
    var contentHtml = newHTML;
    contentScripts = "";
    begTag = "<"+"script";
    endTag = "<"+"/script>";

      begSrc = contentHtml.indexOf(begTag);
      endSrc = contentHtml.indexOf(endTag,begSrc);

      p = contentHtml.substr(begSrc,endSrc-begSrc);
      if (p.indexOf("src=") == -1) {
        scriptDef = contentHtml.indexOf(">", begSrc) + 1;
        contentScripts= contentHtml.substr(scriptDef,endSrc-scriptDef);
      } 
      contentHtml = contentHtml.substr(0,begSrc) + contentHtml.substr(endSrc+endTag.length);
    
    return contentScripts;
  }
 
  // ==== Fonction Trim ====
  function trim(string) {
    return string.replace(/(^\s*)|(\s*$)/g,'');
  }
 
   // Parametres serveur
  function actuServeur(num) {
    actuSrv= 1;
    document.adminServ.typeServeur.value="1"; document.adminServ.nomServeur.value = ""; document.adminServ.adrServeur.value  = "";
    document.adminServ.logServeur.value = ""; document.adminServ.passServeur.value= ""; document.adminServ.portServeur.value = "";
    document.adminServ.rootServeur.value= ""; document.adminServ.repServeur.value = ""; document.adminServ.startServeur.value= "";
    document.adminServ.selServeur.value = ""; document.adminServ.webServeur.value = ""; document.adminServ.idServeur.value   = newServeur;
    document.adminServ.binServeur.checked=false; document.adminServ.protectServeur.checked=true; document.adminServ.publicServeur.checked=false;
    document.adminServ.protectIndex.checked=false; document.adminServ.protectHtacc.checked=false;
    document.getElementById('msgtest').innerHTML= "<span id='colortest' class='colorsq'></span> <?php echo $_SESSION["ws"]["dia"]["shareTest"]; ?>";
    document.adminServ.newPass.value= "0";

  if (num!=-1) {
    if (serveurs[num]['typeServeur'])  document.adminServ.typeServeur.value = serveurs[num]['typeServeur'];
    if (serveurs[num]['nomServeur'])   document.adminServ.nomServeur.value  = serveurs[num]['nomServeur'];
    if (serveurs[num]['adrServeur'])   document.adminServ.adrServeur.value  = serveurs[num]['adrServeur'];
    if (serveurs[num]['logServeur'])   document.adminServ.logServeur.value  = serveurs[num]['logServeur'];
    if (serveurs[num]['portServeur'])  document.adminServ.portServeur.value = serveurs[num]['portServeur'];
    if (serveurs[num]['rootServeur'])  document.adminServ.rootServeur.value = serveurs[num]['rootServeur'];
    if (serveurs[num]['repServeur'])   document.adminServ.repServeur.value  = serveurs[num]['repServeur'];
    if (serveurs[num]['startServeur']) document.adminServ.startServeur.value= serveurs[num]['startServeur'];
    if (serveurs[num]['webServeur'])   document.adminServ.webServeur.value  = serveurs[num]['webServeur'];  
    if (serveurs[num]['idServeur'])    document.adminServ.idServeur.value   = serveurs[num]['idServeur'];
    if (serveurs[num]['nomServeur'])   document.adminServ.selServeur.value  = serveurs[num]['nomServeur'];
    if (serveurs[num]['binServeur']=="1")     document.adminServ.binServeur.checked=true;
    if (serveurs[num]['protectServeur']!="1") document.adminServ.protectServeur.checked=false;
    if (serveurs[num]['protectIndex']=="1")   document.adminServ.protectIndex.checked=true;
    if (serveurs[num]['protectHtacc']=="1")   document.adminServ.protectHtacc.checked=true;
    if (serveurs[num]['publicServeur']=="1")  document.adminServ.publicServeur.checked=true;
    if (serveurs[num]['passServeur'])  { document.adminServ.passServeur.value = "password";
                                         document.adminServ.newPass.value = serveurs[num]['passServeur']; }

  } else {
    document.adminServ.rootServeur.value = "<?php echo $racineServeur?>";
  }
}

  // Corrige l'adresse serveur en retirant le ftp://
  function corrigeAdr(nom) {
    var regAdr=new RegExp("(ftp\:\/\/)", "g");
    nom.value= nom.value.replace(regAdr,"");
  }

  // Met en valeur les champs
  function miseenvaleur(num) {
    if (num=="1") couleur="#FBEDD4"; else couleur="#FFF";
    document.adminServ.logServeur.style.background=couleur;
    document.adminServ.portServeur.style.background=couleur;
    document.adminServ.passServeur.style.background=couleur;
    document.adminServ.adrServeur.style.background=couleur;

    if (actuSrv==0) {
      if (num=="2") document.adminServ.rootServeur.value= "/";
               else document.adminServ.rootServeur.value = "<?php echo $racineServeur?>";
    }
    actuSrv= 0;
  }
 
  // Fonctionnalités utilisateur
  function actuUtilisateur(num) {
 
    compteur2=0; nserveur=0; while (caseSrv=eval("document.adminUser.serveur"+compteur2)) {
    caseSrv.checked=false; compteur2++; }
    compteur=1; while (caseSrv=eval("document.adminUser.auth"+compteur)) {
    caseSrv.checked=true; compteur++; }

    document.adminUser.typeUser.value= "1"; document.adminUser.nomUser.value  = ""; document.adminUser.visuUser.value  = "miniatures";
    document.adminUser.passUser.value= "";  document.adminUser.selUser.value  = ""; document.adminUser.styleUser.value = "Standard";
    document.adminUser.arboUser.value= "0"; document.adminUser.logUser.value  = ""; document.adminUser.triUser.value   = "fichier";
    document.adminUser.webUser.value = "";  document.adminUser.idUser.value   = maxUser;
    document.adminUser.mailUser.value= "";
    document.adminUser.langUser.value= "<?php echo $deflang; ?>";               
    document.adminUser.webUser.disabled="true";
    document.adminUser.publicUser.checked  = false;

    document.adminUser.varsUser.value = "webshare|admin|pass|moteur|htaccess|htpass|php|asp$|aspx$|ini$|pl$|cgi|js$|jsp$|dhtml$|cfm$|htm|sessions|Thumbs|wsminis|old$|~|^[.]{1}|^[.]{2}";

    if (num!=-1) {
    if (visiteurs[num]['typeUser'])    document.adminUser.typeUser.value    = visiteurs[num]['typeUser'];
    if (visiteurs[num]['nomUser'])     document.adminUser.nomUser.value     = visiteurs[num]['nomUser'];
    if (visiteurs[num]['passUser'])    document.adminUser.passUser.value    = "password";
    if (visiteurs[num]['logUser'])     document.adminUser.logUser.value     = visiteurs[num]['logUser'];
    if (visiteurs[num]['styleUser'])   document.adminUser.styleUser.value   = visiteurs[num]['styleUser'];
    if (visiteurs[num]['arboUser'])    document.adminUser.arboUser.value    = visiteurs[num]['arboUser'];
    if (visiteurs[num]['visuUser'])    document.adminUser.visuUser.value    = visiteurs[num]['visuUser'];
    if (visiteurs[num]['triUser'])     document.adminUser.triUser.value     = visiteurs[num]['triUser'];
    if (visiteurs[num]['langUser'])    document.adminUser.langUser.value    = visiteurs[num]['langUser'];
    if (visiteurs[num]['webUser'])     document.adminUser.webUser.value     = visiteurs[num]['webUser'];
    if (visiteurs[num]['varsUser'])    document.adminUser.varsUser.value    = visiteurs[num]['varsUser'];
    if (visiteurs[num]['idUser'])      document.adminUser.idUser.value      = visiteurs[num]['idUser'];
    if (visiteurs[num]['mailUser'])    document.adminUser.mailUser.value    = visiteurs[num]['mailUser'];
    if (visiteurs[num]['nomUser'])     document.adminUser.selUser.value     = visiteurs[num]['nomUser'];
    if (!visiteurs[num]['passUser']||(visiteurs[num]['publicUser']=="on")||(visiteurs[num]['passUser']=="d41d8cd98f00b204e9800998ecf8427e"))
      document.adminUser.publicUser.checked  = true;
    
    compteur=0;
    while (nomSrv=visiteurs[num][eval("'serveur"+compteur+"'")]) {
      compteur2=0; while (caseSrv=eval("document.adminUser.serveur"+compteur2)) {
      if (caseSrv.value==nomSrv) caseSrv.checked=true;
        compteur2++;
      } compteur++;
    }

    compteur=1;
    while (caseauth=eval("document.adminUser.auth"+compteur)) {
    caseauth.checked=true;
      if ((visiteurs[num][eval("'auth"+compteur+"'")]!="on") && (num!=-1)) caseauth.checked=false;
        compteur++;
    }

  }
  verifhtml(document.adminUser.varsUser.value);
}

function verifhtml(txtvar) {
  if (txtvar.indexOf('|htm')!=-1) {
    document.adminUser.webUser.disabled=true;
    document.adminUser.webUser.value="1";
    document.adminUser.webUser.style.background="#FBEDD4";
  } else {
    document.adminUser.webUser.disabled=false;
    document.adminUser.webUser.style.background="#FFF";
  }
}

function affinedroits(num) {
  compteur=1;
  switch (num) {
    case "1": while (caseSrv=eval("document.adminUser.auth"+compteur)) {
            caseSrv.checked=true; compteur++; }
    break;
    case "2": while (caseSrv=eval("document.adminUser.auth"+compteur)) {
            caseSrv.checked=true; compteur++; }
            document.adminUser.auth3.checked=false;
            document.adminUser.auth5.checked=false;
            document.adminUser.auth6.checked=false;
    break;
    case "3": while (caseSrv=eval("document.adminUser.auth"+compteur)) {
            caseSrv.checked=false; compteur++; }
            document.adminUser.auth1.checked=true;
    break;
  }
}

  // Fonctionnalités BDD
  function actuBase() {

    document.adminBase.compPath.checked=  false; document.adminBase.prevAct.checked=   false;
    document.adminBase.activeLog.checked= false; document.adminBase.sepAdr.checked =   false;
    document.adminBase.vClock.checked  =  false;document.adminBase.autoUserAcc.checked=false;
    document.adminBase.arboLink.checked=  false; document.adminBase.prevWeb.checked=   false;
    document.adminBase.sendMail.checked=  false; document.adminBase.effectAct.checked= false;
    document.adminBase.linkWin.checked=   false;
    document.adminBase.pageTitle.value= "Webshare v0.8.2";

    document.adminBase.clicl.value= "0";      document.adminBase.clicr.value = "1";    document.adminBase.clicd.value= "1";
    document.adminBase.serveurBase.value= ""; document.adminBase.loginBase.value = "";
    document.adminBase.passBase.value  = "passBase";  document.adminBase.tableBase.value = "";


    if (wsbase['pageTitle'])      document.adminBase.pageTitle.value   = wsbase['pageTitle'];
    if (wsbase['diapoSp'])        document.adminBase.diapoSp.value     = wsbase['diapoSp'];
                             else document.adminBase.diapoSp.value     = "5000";

    if (wsbase['clicl'])          document.adminBase.clicl.value       = wsbase['clicl'];
    if (wsbase['clicr'])          document.adminBase.clicr.value       = wsbase['clicr'];
    if (wsbase['clicd'])          document.adminBase.clicd.value       = wsbase['clicd'];

    if (wsbase['serveurBase'])    document.adminBase.serveurBase.value = wsbase['serveurBase'];
    if (wsbase['loginBase'])      document.adminBase.loginBase.value   = wsbase['loginBase'];
    if (wsbase['tableBase'])      document.adminBase.tableBase.value   = wsbase['tableBase'];

    if (wsbase['compPath']=="1")  document.adminBase.compPath.checked  = true;
    if (wsbase['prevWeb']=="1")   document.adminBase.prevWeb.checked   = true;
    if (wsbase['prevAct']=="1")   document.adminBase.prevAct.checked   = true;
    if (wsbase['activeLog']=="1") document.adminBase.activeLog.checked = true;
    if (wsbase['vClock']=="1")    document.adminBase.vClock.checked    = true;
    if (wsbase['arboLink']=="1")  document.adminBase.arboLink.checked  = true;
    if (wsbase['sendMail']=="1")  document.adminBase.sendMail.checked  = true;
    if (wsbase['effectAct']=="1") document.adminBase.effectAct.checked = true;
    if (wsbase['sepAdr']=="1")    document.adminBase.sepAdr.checked    = true;
    if (wsbase['linkWin']=="1")   document.adminBase.linkWin.checked   = true;
    if (wsbase['autoUserAcc']=="1") document.adminBase.autoUserAcc.checked = true;

    if (wsbase['memoMax'])  document.adminBase.memoMax.value  = wsbase['memoMax'];
    if (wsbase['execMax'])  document.adminBase.execMax.value  = wsbase['execMax'];
    if (wsbase['postMax'])  document.adminBase.postMax.value  = wsbase['postMax'];
    if (wsbase['timeMax'])  document.adminBase.timeMax.value  = wsbase['timeMax'];
    if (wsbase['uploMax'])  document.adminBase.uploMax.value  = wsbase['uploMax'];
    if (wsbase['lifeMax'])  document.adminBase.lifeMax.value  = wsbase['lifeMax'];
    
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

      function makeRequest(url,do_function) {
        http_request = build_HttpRequest();
        var time = new Date();
        if (url.indexOf('?')>0){ url = url + '&time='+time.getTime(); } else { url = url + '?time='+time.getTime();}
        http_request.onreadystatechange = do_function;
        http_request.open('GET', url, true);
        http_request.send(null);
      }

  function checkCGI() {
    if (http_request.readyState == 4)
      switch (http_request.status) {
        case 500 : case 403 :
         document.getElementById("cgimsg2").style.display="block";
         document.getElementById("cgimsg4").style.display="block"; break;
        case 200 :
         if (http_request.responseText=="ok") {
           document.getElementById("cgimsg3").style.display="block";
           document.getElementById("cgimsg5").style.display="block"; }
         else {
           document.getElementById("cgimsg2").style.display="block";
           document.getElementById("cgimsg4").style.display="block"; }
         break;
       default :
         document.getElementById("cgimsg1").style.display="block";
         document.getElementById("cgimsg4").style.display="block"; break;
       }
     }
        
        function admintest() {
          if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
            document.getElementById('msgadmin').innerHTML= xmlhttp.responseText;
          }
        }         

  function verifListeSrv() {
    casechecked=0; num=0;
    while (eval("document.adminUser.serveur"+num)!=undefined) {
      if (eval("document.adminUser.serveur"+num).checked===true) casechecked=1;
      num++;
    }
 
    if (casechecked==0) {
      infoserreur('<?php echo $_SESSION["ws"]["dia"]["selectServer"];?>');
      return false;
    }
    return true;
  }
        
  function ajouterligne(nomicn,nomext,nomtype,nommime,selact1,selact2) {
  count++;
    var tbody = document.getElementById('list_body').getElementsByTagName('tbody')[0];
    var tr = document.createElement("tr"); var td0= document.createElement("td");
    var td1= document.createElement("td"), td2= document.createElement("td"), td3= document.createElement("td"),
        td4= document.createElement("td"), td5= document.createElement("td"), td6= document.createElement("td");
    td0.innerHTML = '<div class="confsup" id="confsupprim'+count+'"><?php echo str_replace("'","’",$_SESSION["ws"]["dia"]["confirmSup"]); ?> <img src="img/ok.gif" onclick="valideConf('+count+')"> <img src="img/cancel.gif" onclick="effaceConf('+count+')"></div>'
                   +'<img id="icn'+count+'" name="icn'+count+'" src="'+nomicn+'.png" style="width:32px;height:32px"/>';
    td1.innerHTML = '<input name="extensi'+count+'" id="extensi'+count+'" type="text" style="width:50px" value="'+nomext+'" onchange="actu('+count+')"/>';
    td2.innerHTML = '<td><img src="img/cancel.gif" style="width:11px;height:11px;" onclick="confretire('+count+')"  border="0"><input name="extinfo'+count+'" id="extinfo'+count+'" type="hidden" value="" /></td>';
    td3.innerHTML = '<input name="exttype'+count+'" id="exttype'+count+'" type="text" style="width:120px" value="'+nomtype+'"/>';
    td4.innerHTML = '<input name="extmime'+count+'" id="extmime'+count+'" type="text" style="width:120px" value="'+nommime+'"/>';
    td5.innerHTML = '<select name="extactp'+count+'" id="extactp'+count+'"'+selectbox;
    td6.innerHTML = '<select name="extacts'+count+'" id="extacts'+count+'"'+selectbox;
    tr.appendChild(td0); tr.appendChild(td1); tr.appendChild(td2); tr.appendChild(td3);
    tr.appendChild(td4); tr.appendChild(td5); tr.appendChild(td6);
    tbody.appendChild(tr);

    for (var i=0; i<document.getElementById('extactp'+count).options.length; i++) {
      if (document.getElementById('extactp'+count).options[i].value==selact1)
        document.getElementById('extactp'+count).options[i].selected=true;
      if (document.getElementById('extacts'+count).options[i].value==selact2)
        document.getElementById('extacts'+count).options[i].selected=true;    }
  }

  function completeVal() {
    for(var i=1; i<=count; i++) {
       document.getElementById("extinfo"+i).value= document.getElementById("extensi"+i).value
       +"|"+document.getElementById("exttype"+i).value+"|"+document.getElementById("extmime"+i).value
       +"|"+document.getElementById("extactp"+i).value+"|"+document.getElementById("extacts"+i).value;
    }
  }

  function retire(i) {
    var ligne = document.getElementById('ligne'+i);
    if (ligne)
      Parent = ligne.parentNode;
      if (Parent)
        Parent.removeChild(ligne);
  }

  function checkCar(nomInput) {
    badCar=0;
    for (i=0;i<nomInput.value.length;i++) {
      valCar= nomInput.value.charCodeAt(i);
      if ( ((valCar>=48)&&(valCar<=57)) || ((valCar>=65)&&(valCar<=90)) || ((valCar>=97)&&(valCar<=122)) ) {
      } else {
        ch=nomInput.value;
        nomInput.value= ch.substring(0,i)+ch.substring(i+1,ch.length);
        badCar=1;
      }
    }
    
    if (badCar==1) {
      if (document.getElementById("infoCheckCar")) {
        document.getElementById("infoCheckCar").style.color="#f00";
        document.getElementById("infoCheckCar").style.fontWeight="bold";
      }
    } else {
      if (document.getElementById("infoCheckCar")) {
        document.getElementById("infoCheckCar").style.color="#000";
        document.getElementById("infoCheckCar").style.fontWeight="normal";
      }
    }
  }

  function checkPath(nomInput) {
    badCar=0;
    for (i=0;i<nomInput.value.length;i++) {
      valCar= nomInput.value.charCodeAt(i);
      if ( ((valCar>=48)&&(valCar<=57)) || ((valCar>=65)&&(valCar<=90)) || ((valCar>=97)&&(valCar<=122))
        || ((valCar>=45)&&(valCar<=47)) || (valCar==58) || (valCar==64) || (valCar==95) ) {
      } else {
        ch=nomInput.value;
        nomInput.value= ch.substring(0,i)+ch.substring(i+1,ch.length);
        badCar=1;
      }
    }

    if (badCar==1) {
      if (document.getElementById("infoCheckCar")) {
        document.getElementById("infoCheckCar").style.color="#f00";
        document.getElementById("infoCheckCar").style.fontWeight="bold";
      }
    } else {
      if (document.getElementById("infoCheckCar")) {
        document.getElementById("infoCheckCar").style.color="#000";
        document.getElementById("infoCheckCar").style.fontWeight="normal";
      }
    }
  }


  function actu(i) {
    document.getElementById("icn"+i).src="../style/Standard/icones/minis/"+document.getElementById("extensi"+i).value+".png";
  }

  function afficheicn() {
    for(var i=1; i<=count; i++) {
    document.getElementById("icn"+i).src="../style/Standard/icones/minis/"+document.getElementById("extensi"+i).value+".png";
  }
  }
  function confretire(i) {
    document.getElementById("confsupprim"+i).style.display="block";
    document.getElementById("extactp"+i).style.display="none";
    document.getElementById("extacts"+i).style.display="none";
  }
  function valideConf(i) {
    document.getElementById("confsupprim"+i).style.display="none";
    document.getElementById("extactp"+i).style.display="block";
    document.getElementById("extacts"+i).style.display="block";
    retire(i);
  }
  function effaceConf(i) {
      document.getElementById("confsupprim"+i).style.display="none";
    document.getElementById("extactp"+i).style.display="block";
    document.getElementById("extacts"+i).style.display="block";
  }

  function afficheLog() {
    if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
    if ((xmlhttp.responseText.length)<5) {
        document.getElementById("logTabl").innerHTML="<div align='center'><?php echo $_SESSION["ws"]["dia"]["noLogs"];?></div>";
      } else {
        document.getElementById("logTabl").innerHTML="<div class='windowLog' style='margin-left:3px'>"+xmlhttp.responseText+"</div>";
      }
    }
  }

  function creadate() {
  if (document.validlogs.valeurjour) {
      valjour= document.validlogs.anneed.options[document.validlogs.anneed.selectedIndex].value+document.validlogs.moisd.options[document.validlogs.moisd.selectedIndex].value+document.validlogs.jourd.options[document.validlogs.jourd.selectedIndex].value;
      document.validlogs.valeurjour.value=valjour;}
  }         
  
  function checkVersion() {
    valid_rub('checkversion.php',loadVersion); 
  }
  
  function loadVersion() {
    if ((rubhttp.readyState == 4) && (rubhttp.status == 200)) { 
      document.getElementById('idVersion').innerHTML= rubhttp.responseText;
    }
  }  
  
  function updateVersion() {
    alert("<?php echo $_SESSION["ws"]["dia"]["notActiv"];?>");
  }
  
  function replacPass(valeur) {
    if (document.adminUser.publicUser.checked===true) {
      document.adminUser.passUser.value="";
    }
  }

  function adaptPublic(valeur) {
    if (valeur=='') document.adminUser.publicUser.checked=true;
               else document.adminUser.publicUser.checked=false;
  }
  
  document.oncontextmenu = document.onselectstart = function () { return false; }

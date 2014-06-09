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
// Fonction : Script moteur de l'exploration, navigation, et menus
// Nom      : script.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
session_start();
include_once "auth.php";
include_once "fonctions.php";
include_once "../lang/English.lang.php";
include_once "../lang/".$_SESSION["ws"]["langUser"].".lang.php";
$nomSrv= $_SESSION["ws"]["serveurActif"];
if (!empty($_SESSION["ws"]["$nomSrv"]["webServeur"])) 
     $_SESSION["ws"]["rootWeb"] = $_SESSION["ws"]["$nomSrv"]["webServeur"]; 
else $_SESSION["ws"]["rootWeb"] = blindeChemin(str_replace($_SESSION["ws"]["rootServr"],"",$_SESSION["ws"]["$nomSrv"]["rootServeur"]."/".$_SESSION["ws"]["$nomSrv"]["repServeur"]));

$root_web= $_SESSION["ws"]["rootWeb"];
$path_actuel = utf8_encode(str_replace("'","\'",$_SESSION["ws"]["dossierActif"]));
if ($navig=="IE") { $filtre="filter:alpha(opacity=0)"; $filtreD="filter='alpha(opacity='+"; $filtreF="+')';"; }
             else { $filtre="opacity:0"; $filtreD="opacity="; $filtreF="/100;"; }
?>

  // ==== Variables globales ====
  var triActif  = "<?php echo $_SESSION["ws"]["triUser"]?>";
  var striActif = "<?php echo $_SESSION["ws"]["senstriUser"]?>";
  var typeActif = "<?php echo $_SESSION["ws"]["visuUser"]?>";
  var styleActif= "<?php echo $_SESSION["ws"]["styleUser"]?>";
  var affichage = equivalent(typeActif);
  var vueActif  = "";
  var actuel    = '<?php echo $path_actuel;?>';
  var iciType   = 'defaut'; var memoType= 'defaut';
  var iciNom    = '';  var memoNom    = '';
  var iciLien   = '';  var memoLien   = '';
  var iciPerm   = '';  var memoPerm   = '';
  var iciPro    = '';  var memoPro    = '';
  var iciSrv    = '';  var memoSrv    = '';
  var iciDtm    = '';  var memoDtm    = '';
  var iciSize   = '';  var memoSize   = '';
  var iciWeb    = '';  var memoWeb    = '';
  var iciMime   = '';  var memoMime   = '';
  var iciFav    = '';  var memoFav    = '';
  var boutonUp  = '';  var boutonBack = '';
  var clipboard = '';  var clipboardType = '';
  var dossierHL='id';  var clipboardMode = '';
  var actuelDiv = '';  var clipboardSrv  = '';
  var racineweb = '';  var globPerm = 'RW';
  var typeSrv   = 1;   var showFile   = 0; var memoLabel;
  var regMail = /^[a-zA-Z0-9\.\-_]+@[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,5}$/i;
  var actuelSrv = '<?php echo $_SESSION["ws"]["serveurActif"]?>';
  var iciSrv    = '<?php echo $_SESSION["ws"]["serveurActif"]?>';
  var memoSrv   = '<?php echo $_SESSION["ws"]["serveurActif"]?>';
  var listeSrv  = new Array(<?php
    for ($j=0;$j<count($_SESSION["ws"]["listeServeur"]);$j++)
      echo '"'.$_SESSION["ws"]["listeServeur"][$j].'"'.(($j<(count($_SESSION["ws"]["listeServeur"])-1))?",":"");
    if ($_SESSION["ws"]["repCorbeille"]!="") echo ',"'.str_replace(" ","",$_SESSION["ws"]["dia"]["corbeille"]).'"';
  ?>);
  
  var tempsDernierClick = null; var typeClic   = false;
  var dernierClick      = null; var attenteClic= false;
  var tempsEntreDeuxClics =300; var clicDiv    = 0;
  var altClick          = 0;    var diftime    = 0;
  var effectAct= <?php if (isset($_SESSION["ws"]["effectAct"])&&($_SESSION["ws"]["effectAct"]=="1")) echo "1"; else echo "0"; ?>;
  var arboUser=  <?php if (isset($_SESSION["ws"]["arboUser"]))  echo $_SESSION["ws"]["arboUser"]; else echo "0"; ?>;
  var dynWindow= <?php if (isset($_SESSION["ws"]["dynWin"]))    echo $_SESSION["ws"]["dynWin"]; else echo "0"; ?>;
  var hauteurInfos= 36; var pageConsult = 0;

  var init_x = 0; var init_y = 0;
  var div_x  = 0; var div_y  = 0;
  var boucleDiapo = ""; var dragElement = 0;
  var redimCnt = "";    var redimInt = "";
  var pourcent    = 18; var redimFav = "";
  var pourcentFav = 82; var pctHaut  = 40;
  var fileUpload  = ""; var defHaut  = -26;
  var reloadmenu  = 0; var alphamenu = 0;
  var dispinvite  = 0; var dispmenu  = 0;
  var functionValid =""; var dragMode= 0;
  var selectObj   = 0; var memoObj   = 0;
  var dontClose   = 0; var reloadG   = 0;
  var accessCase  = 0; var memoArboUser = 0;
  var tabAction   = new Array();
  var tabFileInfo = {};

  document.onselectstart = new Function("return false");

  // ==== Autorise la sélection ====
  function autoriseSelection() {
    document.onselectstart= new Function("return true");
  }

  // ==== Interdit la sélection ====
  function interditSelection() {
    document.onselectstart= new Function("return false");
  }

  // ==== Creation de l'objet XmlHttp ====
  function getNewXMLHTTP() {
    try {
       return window.XMLHttpRequest?new XMLHttpRequest():
                                    new ActiveXObject("Microsoft.XMLHTTP");
    }
    catch (e) {
      return new ActiveXObject("Msxml2.XMLHTTP");
    }
  }

  // ==== Requête asynchrone avec envoi de donnees ====
  function req_async_datas(url,lancer_fonction,datas_form) {
    datas=formData2QueryString(datas_form);
    xmldata = getNewXMLHTTP();
    xmldata.onreadystatechange = lancer_fonction;
    xmldata.open("POST", url, true);
    xmldata.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmldata.setRequestHeader("Content-length", datas.length);
    xmldata.setRequestHeader("Cache-Control", "no-cache");
    xmldata.setRequestHeader("Connection", "close");
    xmldata.send(datas);
    return false;
  }

  // ==== Requête asynchrone simple de vérification de session ====
  function req_async_session() {
    xmlses = getNewXMLHTTP();
    xmlses.onreadystatechange = verif_session;
    xmlses.open("GET", "moteur/session.php", true);
    xmlses.send(null);
    return false;
  }

  // ==== Vérification de session ====
  function verif_session() {
  if ((xmlses.readyState == 4) && (xmlses.status == 200)) {
      if (xmlses.responseText!="session_detected") {
      window.location.href='index.php';
      }
    }
  }

  // ==== Requête asynchrone simple ====
  function req_async(url,lancer_fonction) {
    xmlexp = getNewXMLHTTP();
    xmlexp.onreadystatechange = lancer_fonction;
    xmlexp.open("GET", url, true);
    xmlexp.send(null);
    return false;
  }

  // ==== Requête asynchrone simple ====
  function req_asyncg(url,lancer_fonction) {
    xmlgal = getNewXMLHTTP();
    xmlgal.onreadystatechange = lancer_fonction;
    xmlgal.open("GET", url, true);
    xmlgal.send(null);
    return false;
  }

  // ==== Requête asynchrone simple ====
  function req_asyncp(url,lancer_fonction) {
    xmlpar = getNewXMLHTTP();
    xmlpar.onreadystatechange = lancer_fonction;
    xmlpar.open("GET", url, true);
    xmlpar.send(null);
    return false;
  }

  // ==== Requête asynchrone simple ====
  function req_asynct(url,lancer_fonction) {
    xmltrs = getNewXMLHTTP();
    xmltrs.onreadystatechange = lancer_fonction;
    xmltrs.open("GET", url, true);
    xmltrs.send(null);
    return false;
  }

  // ==== Requête asynchrone simple ====
  function req_asynca(url,lancer_fonction) {
    xmlapp = getNewXMLHTTP();
    xmlapp.onreadystatechange = lancer_fonction;
    xmlapp.open("GET", url, true);
    xmlapp.send(null);
    return false;
  }
  
  // ==== Requête asynchrone simple ====
  function req_asyncnav(url,adr,lancer_fonction) {
    datas="iciSrv="+memoSrv+"&dossier="+encodeURIComponent(adr)+"&cle=<?php echo $_SESSION["ws"]['uniqKey']?>";
    xmlnav = getNewXMLHTTP();
    xmlnav.onreadystatechange = lancer_fonction;
    xmlnav.open("POST", url, true);
    xmlnav.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlnav.setRequestHeader("Content-length", datas.length);
    xmlnav.setRequestHeader("Cache-Control", "no-cache");
    xmlnav.setRequestHeader("Connection", "close");
    xmlnav.send(datas);
    return false;
  }

  // ==== Requête synchrone simple ====
  function req_sync(url) {
     if (window.XSLTProcessor) {
      xmlsync = getNewXMLHTTP();
      xmlsync.open("GET", url, false);
      xmlsync.send(null); }
    else {
      xmlsync = new ActiveXObject("Microsoft.XMLDOM");
      xmlsync.async = false;
      xmlsync.load(url);
         // Test ajouté pour le problème d’authentification en SSL
         if (xmlsync.parseError.errorCode != 0) {
           xmlhttp = getNewXMLHTTP();
           xmlhttp.onreadystatechange = function() {};
           xmlhttp.open("GET", url, false);
           xmlhttp.send(null);
           xmlsync.loadXML(xmlhttp.responseText);
         }
    }
    return xmlsync;
  }

  // ==== Concatenation des donnees de formulaire en chaîne URL ====
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
          '=' + encodeURIComponent(formElem.value) + '&'
        break;
        case 'select-multiple':
          var selectBox = formElem;
          for (var j=0; j<selectBox.options.length; j++) {
            if (selectBox.options[j].selected) {
              strSubmit += formElem.name + 
              '=' + encodeURIComponent(selectBox.options[j].value) + '&'
            }
          }
        break;
        case 'radio':        
          if (formElem.checked===true) strSubmit += formElem.name +
          '=' + encodeURIComponent(formElem.value) + '&'
        break;
        case 'checkbox':
          if (formElem.checked===true) strSubmit += formElem.name +
          '=' + encodeURIComponent(formElem.value) + '&'
        break;
      }
    }
    return strSubmit;
   }

  // ==== Transformation XSL pour affichage HTML de l'arbre XML ====
  function transformer(xmlObject,portion,idObject,xslStyle) {

    if (window.XSLTProcessor) {

      var xsltProcessor = new XSLTProcessor();
      xsltProcessor.importStylesheet(eval(xslStyle+".responseXML"));
      var fragment= xsltProcessor.transformToFragment(xmlObject.responseXML.getElementsByTagName(portion).item(0),document);
      document.getElementById(idObject).innerHTML="";
      document.getElementById(idObject).appendChild(fragment);
    } else {
      if (xmlObject.responseText.length!=0)
        document.getElementById(idObject).innerHTML=xmlObject.responseXML.getElementsByTagName(portion).item(0).transformNode(eval(xslStyle));
      else window.location.href='index.php';
    }
  }

  // Transformations XSL palliative pour navigateurs handicapes (Safari/KHTML)
  function afficheXSLT() {
  if ((xmlgal.readyState == 4) && (xmlgal.status == 200)) {
      document.getElementById("frame_galerie").innerHTML=xmlgal.responseText;
    spanNodes = document.getElementsByTagName('u');
    for(var i=0; i<spanNodes.length; i++) convertAffichage(spanNodes[i]);
    }
  }
  function afficheXSLTp() {
  if ((xmlpar.readyState == 4) && (xmlpar.status == 200)) {
      document.getElementById("liens").innerHTML=xmlpar.responseText;
    spanNodes = document.getElementsByTagName('u');
    for(var i=0; i<spanNodes.length; i++) convertAffichage(spanNodes[i]);
    }
  }
  function afficheXSLTt() {
    if ((xmltrs.readyState == 4) && (xmltrs.status == 200)) {
      document.getElementById("arbre").innerHTML=xmltrs.responseText;
      spanNodes = document.getElementsByTagName('u');
      for(var i=0; i<spanNodes.length; i++) convertAffichage(spanNodes[i]);
    }

  // Ouvre automatiquement le premier niveau d'arborescence
    <?php
      for ($j=0;isset($_SESSION["ws"]["listeServeur"][$j]);$j++) {
        $iciSrv=$_SESSION["ws"]["listeServeur"][$j];
         echo "devoile('divid$iciSrv/','arrid$iciSrv/',1);\n";
      }
    ?>
  }


  // ==== Lancement de l'exploration des repertoires ====
  function explorer() {
    req_async("moteur/explorer.php",triggerExplorer);
  }

  // ==== Exploration d'un serveur en particulier ====
  function explorerServeur(nomSrvActu) {
    req_async("moteur/explorer.php?specServeur="+nomSrvActu,triggerExplorerServeur);
  }
  
  // ==== Lancement de la navigation dans le repertoire ====
  function naviguer(url) {
    if (effectAct==1) { reloadG=1; cycleG=0; progG=5; pasG=-100/progG; alphaG=100; fonduGalerie(); }
    if (url.length==0) url=actuel;
    document.getElementById('liens').className = 'masque';
    document.getElementById('charge').className = 'montre';
    boutonBack=actuel; boutonUp=''; actuel=url;
    <?php if (isset($_SESSION["ws"]["effectAct"])&&($_SESSION["ws"]["effectAct"]=="1")) echo "if (alphamenu>50) menuDisappear();";
          else echo "document.getElementById('context_box').style.display='none';\n"; ?>
    req_asyncnav("moteur/naviguer.php",url,triggerNaviguer);
  }

  // ==== Exploration des repertoires ====
  function triggerExplorer() {
   if ((xmlexp.readyState == 4) && (xmlexp.status == 200)) {
    transformer(xmlexp,"repArbre","arbre","xslStyle1");

    // Pour les très vieux navigateurs, utiliser la ligne suivante
    //req_asynct ("moteur/xslt.php?xmltype=repArbre",afficheXSLTt);

    spanNodes = document.getElementById('arbre').getElementsByTagName('u');
    for(var i=0; i<spanNodes.length; i++) convertAffichage(spanNodes[i]);
    
    // Crée plusieurs blocs en fonction de listeSrv 
    var numListeSrv;
    for (numListeSrv in listeSrv) {
       nomLS= listeSrv[numListeSrv];

      // Charge les paramètres de contexte
      contentArbo =""; num=1;
      while (document.getElementById("divInfoArbo"+nomLS+num)) {
        contentArbo +=document.getElementById("divInfoArbo"+nomLS+num).innerHTML;
        retireElement(document.getElementById("divInfoArbo"+nomLS+num));
        num++;
      }
    
      if (eval( "typeof scriptInfoArbo"+nomLS+"" )!="undefined")
        retireElement(document.getElementById("scriptInfoArbo"+nomLS));
      var scriptFI  = document.createElement("script");
      scriptFI.type = "text/javascript";
      scriptFI.id = "scriptInfoArbo"+nomLS;
      scriptFI.text = contentArbo;
      document.getElementsByTagName("head")[0].appendChild(scriptFI);
    }
    contentArbo="";

    // Ouvre automatiquement le premier niveau d'arborescence
    <?php
      for ($j=0;isset($_SESSION["ws"]["listeServeur"][$j]);$j++) {
        $iciSrv=$_SESSION["ws"]["listeServeur"][$j];
         echo "devoile('divid$iciSrv/','arrid$iciSrv/',1);\n";
      }
    ?>
    
   }
  }

  // ==== Actualisation d'un serveur en particulier ====
  function triggerExplorerServeur() {
   if ((xmlexp.readyState == 4) && (xmlexp.status == 200)) {
    nomSrvActu= xmlexp.responseXML.getElementsByTagName("serveur").item(0).firstChild.data;
    transformer(xmlexp,"repArbre","blocSrv"+nomSrvActu,"xslStyle1");

    // Pour les très vieux navigateurs, utiliser la ligne suivante
    //req_asynct ("moteur/xslt.php?xmltype=repArbre",afficheXSLTt);

    spanNodes = document.getElementById('arbre').getElementsByTagName('u');
    for(var i=0; i<spanNodes.length; i++) convertAffichage(spanNodes[i]);

    // Charge les paramètres de contexte
    contentArbo =""; num=1;
    while (document.getElementById("divInfoArbo"+nomSrvActu+num)) {
      contentArbo +=document.getElementById("divInfoArbo"+nomSrvActu+num).innerHTML;
      retireElement(document.getElementById("divInfoArbo"+nomSrvActu+num));
      num++;
    }

    if (eval( "typeof scriptInfoArbo"+nomSrvActu+"" )!="undefined")
      retireElement(document.getElementById("scriptInfoArbo"+nomSrvActu));
    var scriptFI  = document.createElement("script");
    scriptFI.type = "text/javascript";
    scriptFI.id = "scriptInfoArbo"+nomSrvActu;
    scriptFI.text = contentArbo;
    document.getElementsByTagName("head")[0].appendChild(scriptFI);
    contentArbo="";

    // Ouvre automatiquement le premier niveau d'arborescence
    <?php
      for ($j=0;isset($_SESSION["ws"]["listeServeur"][$j]);$j++) {
        $iciSrv=$_SESSION["ws"]["listeServeur"][$j];
         echo "devoile('divid$iciSrv/','arrid$iciSrv/',1);\n";
      }
    ?>
   }
  }

  function interrupt() {
      //document.getElementById('charge').innerHTML= "<?php echo $_SESSION["ws"]["dia"]["interrupted"]?>";
  }

  // ==== Navigation dans le repertoire ====
  function triggerNaviguer() {
    if ((xmlnav.readyState == 4) && (xmlnav.status == 200)) {
      if (diftime!=0) { clearTimeout(diftime); }
    document.getElementById("charge").innerHTML="<b><img src='style/"+styleActif+"/images/loading.gif' alt=''>&nbsp;<?php echo $_SESSION["ws"]["dia"]["loading"]?>&nbsp;&nbsp;</b>";

    // Retablie l'affichage du dossier actuel
    if (document.getElementById('charge').className=='montre')
        document.getElementById('charge').className ='masque';
        document.getElementById('liens').className  ='montre';
    initDetails();

    // Recupère les elements propres au repertoire actuel
    if (xmlnav.responseXML.getElementsByTagName("numdoss").item(0)!=undefined) {
     if (xmlnav.responseXML.getElementsByTagName("fond").item(0)!=undefined)
      fond      =           xmlnav.responseXML.getElementsByTagName("fond").item(0).firstChild.data; else fond="";
      numdossier=  parseInt(xmlnav.responseXML.getElementsByTagName("numdoss").item(0).firstChild.data);
      numfichier=  parseInt(xmlnav.responseXML.getElementsByTagName("numfich").item(0).firstChild.data);
      numtotal  = convertir(xmlnav.responseXML.getElementsByTagName("espacetotal").item(0).firstChild.data);
      numlibre  = convertir(xmlnav.responseXML.getElementsByTagName("espacelibre").item(0).firstChild.data);
      numdir    = convertir(xmlnav.responseXML.getElementsByTagName("espacedir").item(0).firstChild.data);
      numutil   = convertir(xmlnav.responseXML.getElementsByTagName("espaceutil").item(0).firstChild.data);
      actuelSrv =           xmlnav.responseXML.getElementsByTagName("serveur").item(0).firstChild.data;
      typeSrv   =           xmlnav.responseXML.getElementsByTagName("typeserveur").item(0).firstChild.data;
      racineweb =           xmlnav.responseXML.getElementsByTagName("racineweb").item(0).firstChild.data;
      globPerm  =           xmlnav.responseXML.getElementsByTagName("permserveur").item(0).firstChild.data;

      // Met en valeur le repertoire actuel dans l'arborescence
      if ( eval(document.getElementById(dossierHL)) ) eval(document.getElementById(dossierHL)).src="style/"+styleActif+"/images/miniclose.<?php echo $_SESSION["ws"]["formatExt"]?>";
      dossierHL= "img"+xmlnav.responseXML.getElementsByTagName("nomrepere").item(0).firstChild.data;
      if ( eval(document.getElementById(dossierHL)) ) eval(document.getElementById(dossierHL)).src="style/"+styleActif+"/images/miniopen.<?php echo $_SESSION["ws"]["formatExt"]?>";

      // Formatte et affiche les informations sur le repertoire
      txt_infos=""; if (numlibre=="") numlibre=0;
      if (numdossier) txt_infos+='<b>'+numdossier+'</b>  <?php echo $_SESSION["ws"]["dia"]["dir"]?>'+((numdossier>1)?'s':''); if (numdossier&&numfichier) txt_infos+=' <?php echo $_SESSION["ws"]["dia"]["and"]?> ';
      if (numfichier) txt_infos+='<b>'+numfichier+'</b> <?php echo $_SESSION["ws"]["dia"]["file"]?>'+((numfichier>1)?'s':''); if (numdossier||numfichier) txt_infos+='. ';
      if  (numdir!="0") txt_infos+='<?php echo $_SESSION["ws"]["dia"]["total"]?>: <b>'+numdir+'</b>'
      if ((numdir!="0")&&(numlibre!="0")) txt_infos+=', ';
      if  (numlibre!="0") txt_infos+='<?php echo $_SESSION["ws"]["dia"]["free"]?>: <b>'+numlibre+'</b>';

      // Affiche les informations sur l'utilisateur actuel
      document.getElementById('infos_rep').innerHTML =txt_infos;
      document.getElementById('infos_user').innerHTML='<?php
        $_SESSION["ws"]["labelTypeUser"]= (($_SESSION["ws"]["typeUser"]==1)?$_SESSION["ws"]["dia"]["administrator"]:(($_SESSION["ws"]["typeUser"]==2)?$_SESSION["ws"]["dia"]["group"]:$_SESSION["ws"]["dia"]["user"]));
        echo $_SESSION["ws"]["dia"]["connected"]." : "
        ."<img src=\"".$_SESSION["ws"]["cheminImg"].$_SESSION["ws"]["typeUser"].".".$_SESSION["ws"]["formatExt"]."\" title=\"".$_SESSION["ws"]["labelTypeUser"]."\">"
        ." <b>".$_SESSION["ws"]["nomUser"]."</b>"?>';

      // Affiche le contenu du repertoire
        transformer(xmlnav,"repAdresse","liens","xslStyle1");
        transformer(xmlnav,"repGalerie","frame_galerie",affichage);

        // Corrige eventuellement l'affichage des accents
        spanNodes = document.getElementsByTagName('u');
        for(var i=0; i<spanNodes.length; i++) convertAffichage(spanNodes[i]);

       // Pour les très vieux navigateurs, utiliser les deux lignes suivantes
       // req_asyncg("moteur/xslt.php?xmltype=repGalerie&xmlstyle="+typeActif,afficheXSLT);
       // req_asyncp("moteur/xslt.php?xmltype=repAdresse",afficheXSLTp);

      // Charge les paramètres de contexte
      if (typeof(scriptFileInfo)!="undefined")
        retireElement(document.getElementById("scriptFileInfo"));
      var scriptFI  = document.createElement("script");
      scriptFI.type = "text/javascript";
      scriptFI.id = "scriptFileInfo";
      scriptFI.text = document.getElementById("divFileInfo").innerHTML;
      document.getElementsByTagName("head")[0].appendChild(scriptFI);
      retireElement(document.getElementById("divFileInfo"));

      // Detecte et affiche une image de fond
      if (fond!="/") {
        fondimg = new Image(); fondimg.src = fond;
        document.getElementById("frame_galerie").style.background="center";
        document.getElementById("frame_galerie").style.backgroundImage="url('"+fond+"')";
      } else document.getElementById("frame_galerie").style.background="url('style/"+styleActif+"/images/fondgalerie.jpg')";

      if ((effectAct==1)&&(reloadG==1)) {
        setTimeout("cycleG=0; progG=5; pasG=100/progG; alphaG=0; fonduGalerie();",500);
        reloadG=0;
      }

     // Detecte et affiche le lien vers l'index si present dans le repertoire
      demarrage = xmlnav.responseXML.getElementsByTagName("demarrage").item(0).firstChild.data;
      if (demarrage!="/") {
        document.getElementById('liens').innerHTML+=" <img src='style/"+styleActif+"/images/oeil.<?php echo $_SESSION["ws"]["formatExt"]?>' onmouseover='iciLien="+'"'+demarrage+'"'+";memoLien="+'"'+demarrage+'"'+"' onmouseout='memoLien="+'""'+"' onclick='visiter(memoLien)'>";
        if ("<?php echo $_SESSION["ws"]["webUser"]?>"=="0") { document.getElementById('charge').className ='masque'; memoWeb=''; iciLien=demarrage; memoLien=demarrage; visiter(memoLien); }
      }
        
        corriger();
      }
    }

  // Déploie le dossier dans l'arbre
  pdiv = document.getElementById("divid"+iciSrv+actuel);
  if ((actuel!="/")&&(pdiv!== null)) {
    if (pdiv.className == 'masque')
      devoile("divid"+iciSrv+actuel,"arrid"+iciSrv+actuel,1);
    }
  }


  // ==== Chargement des styles d'affichage ====
    var xslStyle1 = req_sync("moteur/xsl/format.xsl.php");
    var xslStyle2 = req_sync("moteur/xsl/miniatures.xsl.php");
    var xslStyle3 = req_sync("moteur/xsl/grandes.xsl.php");
    var xslStyle4 = req_sync("moteur/xsl/liste.xsl.php");
    var xslStyle5 = req_sync("moteur/xsl/details.xsl.php");

  // ==== Changement du thème d'affichage ====
  function changeStyle(nomstyle) {

    xmlhttp = getNewXMLHTTP();
    xmlhttp.onreadystatechange = function() {};
    xmlhttp.open("GET", "moteur/changestyle.php?nomstyle="+nomstyle, false);
    xmlhttp.send(null);
    
    var headID  = document.getElementsByTagName("head")[0];  
    var links   = document.getElementsByTagName("link");
    for(var i=0; i<links.length; i++) {
      if (links[i].rel=="stylesheet") links[i].parentNode.removeChild(links[i]);
    }           
           
    var cssNode = document.createElement('link');
    cssNode.type  = 'text/css';
    cssNode.rel   = 'stylesheet';
    cssNode.href  = 'style/'+nomstyle+'.css';
    cssNode.media = 'screen';
    headID.appendChild(cssNode);
    
    var reg=new RegExp("("+styleActif+")", "g");
    spanNodes = document.getElementsByTagName('img');
      for(var i=0; i<spanNodes.length; i++) {
        oldsrc= spanNodes[i].src;
        newsrc= oldsrc.replace(reg,nomstyle);
        spanNodes[i].src=newsrc;
      }
      
    document.getElementById("frame_galerie").style.background=
                 "url('style/"+nomstyle+"/images/fondgalerie.jpg')";      
    for(var i=0; i<items_defaut.length; i++)      items_defaut[i]= items_defaut[i].replace(reg,nomstyle);
    for(var i=0; i<items_affichopt.length; i++)   items_affichopt[i]= items_affichopt[i].replace(reg,nomstyle);
    for(var i=0; i<items_dossier.length; i++)     items_dossier[i]= items_dossier[i].replace(reg,nomstyle);
    for(var i=0; i<items_arbo.length; i++)        items_arbo[i]= items_arbo[i].replace(reg,nomstyle);
    for(var i=0; i<items_affichtype.length; i++)  items_affichtype[i]= items_affichtype[i].replace(reg,nomstyle);
    for(var i=0; i<items_affichvue.length; i++)   items_affichvue[i]= items_affichvue[i].replace(reg,nomstyle);
    for(var i=0; i<items_affichtri.length; i++)   items_affichtri[i]= items_affichtri[i].replace(reg,nomstyle);
    for(var i=0; i<items_affichnew.length; i++)   items_affichnew[i]= items_affichnew[i].replace(reg,nomstyle);
    for(var i=0; i<items_affichadmin.length; i++) items_affichadmin[i]= items_affichadmin[i].replace(reg,nomstyle);
    for(var i=0; i<items_wspict.length; i++)      items_wspict[i]= items_wspict[i].replace(reg,nomstyle);
    for(var i=0; i<items_affichcss.length; i++)
      items_affichcss[i]= items_affichcss[i].replace(new RegExp("("+styleActif+")/images", "g"),nomstyle+"/images");
    <?php foreach ($_SESSION["ws"]["assoc"] as $nom => $valeur)
      echo "for(var i=0; i<items_$nom.length; i++) items_$nom"."[i]= items_$nom"."[i].replace(reg,nomstyle);\n"; ?>

    menu_images = menu_images.replace(reg,nomstyle);
    menu_liens  = menu_liens.replace(reg,nomstyle);
    menu_divers = menu_divers.replace(reg,nomstyle);
    menu_editer = menu_editer.replace(reg,nomstyle);
    menu_web    = menu_web.replace(reg,nomstyle);

    styleActif=nomstyle;
    
    xslStyle1 = req_sync("moteur/xsl/format.xsl.php");
    xslStyle2 = req_sync("moteur/xsl/miniatures.xsl.php");
    xslStyle3 = req_sync("moteur/xsl/grandes.xsl.php");
    xslStyle4 = req_sync("moteur/xsl/liste.xsl.php");
    xslStyle5 = req_sync("moteur/xsl/details.xsl.php");
    createWindow();
  }

  // ==== Changement du type d'affichage du repertoire ====
  function changeType(nomtype) {
    affichage  = equivalent(nomtype);
    typeActif  = nomtype;
    if (affichage=="xslStyle5") {
      document.getElementById("frame_galerie").style.top="56px";
      document.getElementById("headerParams").style.display="block";
    } else {
      document.getElementById("frame_galerie").style.top="36px";
      document.getElementById("headerParams").style.display="none";
    }
    xmlhttp = getNewXMLHTTP();
    xmlhttp.onreadystatechange = function() {};
    xmlhttp.open("GET", "moteur/changestyle.php?nomtype="+nomtype, false);
    xmlhttp.send(null);
    actualiser();
  }

  // ==== Changement du type de tri des fichiers du repertoire ====
  function changeTri(nomtri) {
    triActif  = nomtri;
    xmlhttp = getNewXMLHTTP();
    xmlhttp.onreadystatechange = function() {};
    xmlhttp.open("GET", "moteur/changestyle.php?nomtri="+nomtri, false);
    xmlhttp.send(null);
    naviguer(actuel);
  }

  // ==== Changement du sens de tri des fichiers du repertoire ====
  function changeSensTri(nomsens) {
    striActif  = nomsens;
    xmlhttp = getNewXMLHTTP();
    xmlhttp.onreadystatechange = function() {};
    xmlhttp.open("GET", "moteur/changestyle.php?nomsens="+nomsens, false);
    xmlhttp.send(null);
    naviguer(actuel);
  }

  // ==== Changement du type de tri des fichiers du repertoire ====
  function changeTriListe(nomtri) {
    if (triActif == nomtri) {
      if (striActif=='asc') striActif='desc';
                       else striActif='asc';
    } else striActif='asc';
    
    triActif  = nomtri;
    xmlhttp = getNewXMLHTTP();
    xmlhttp.onreadystatechange = function() {};
    xmlhttp.open("GET", "moteur/changestyle.php?nomtri="+nomtri+"&nomsens="+striActif, false);
    xmlhttp.send(null);
    naviguer(actuel);
  }



  // Retirer les mises en forme du texte
	function retirerMef(comment)
	{
    var removeTags=new RegExp("(<.[^>]*>)", "g");
		cf=  comment.value.replace(removeTags,"");
    comment.value= cf;
	}

  // Passage de la souris au dessus d'un élément de liste
  function elementOver(obj,num)
  {
    selectObj=num;
    if (obj.className=="cadre_select_test") {

    } else {
     if (obj.className!="rubrique") {
      if (dragMode!=2) {
        if (obj.className=="cible pair") obj.className="cadre pair";
                                    else obj.className="cadre";
        if (eval("typeof accessMc"+num)!="undefined")
          document.getElementById("accessMc"+num).style.display="inline";
        accessCase=num;
      } else {

        nsPro="";
        valFileInfo=eval("tabFileInfo.fileInfo"+num);
        nsFileInfo = valFileInfo;
        if (typeof nsFileInfo != "undefined") nsPro=nsFileInfo.pro;
      
        if ((obj.className=="repArbre")||(nsPro=="dossier"))
          obj.className="cadre_select";
      }
     }
    }
    if ((typeof(chargeContext)!="undefined")&&(attenteClic==false)) chargeContext(num);
  }
  
  // Passage de la souris en dehors d'un élément de liste
  function elementOut(obj)
  {
    selectObj=0;
    if (obj.className=="cadre_select_test") {

    } else {
     if (obj.className!="rubrique") {
      if (obj.className=="cadre pair") obj.className="cible pair";
                                  else obj.className="cible";
      if (eval("typeof accessMc"+accessCase)!="undefined")
        document.getElementById("accessMc"+accessCase).style.display="none";
      accessCase=0;
     }
    }
    if ((typeof(chargeContext)!="undefined")&&(attenteClic==false)&&(clicDiv==0)) chargeContext(0);
  }

  // Passage de la souris au dessus d'un élément de recherche
  function rechOver(obj,val)
  { 
    selectObj=val;
    obj.className="cadre";
    if ((typeof(chargeContext)!="undefined")&&(attenteClic==false)) chargeContext(val);
  }

  // Passage de la souris en dehors d'un élément de recherche
  function rechOut(obj)
  {
    selectObj=0;
    obj.className="cible";
    if ((typeof(chargeContext)!="undefined")&&(attenteClic==false)) chargeContext(0);
  }
  
// ==== Elements graphiques et comportement ===
<?php include_once "interface.php"; ?>

// ==== Les actions ===
<?php include_once "actions.php"; ?>

// ==== Construction du menu ====
<?php include_once "menus.php"; ?>

// ==== La selection ====
<?php include_once "selection.php"; ?>

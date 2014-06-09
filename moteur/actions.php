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
// Fonction : Script moteur des actions courantes
// Nom      : actions.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
?>

  // ==== Lance une action selon le contexte ====
  function lanceAction(url) {
    nomElement=memoNom+"."+memoType; typeElement=memoType; srvElement=memoSrv;
    proElement=memoPro; lienElement=memoLien; lienElement=memoLien;
    if ((memoWeb.length>1)&&(memoPro=="url")) lienElement=memoWeb;
    if (proElement=="dossier") typeElement="dossier";
    if (proElement=="sup") typeElement="sup";
    if (proElement=="trb") typeElement="trb";
    if ((url!="")&&(url!="undefined")) { if (url.lastIndexOf(".")) typeElement= basename(url).substring(url.lastIndexOf("."),url.length);
                                        else typeElement= "dossier";
                   iciLien= url; }
    if (typeElement=="") actionElement="ouvrirAvec"; else {
      actionElement="ouvrirAvec";
      actionType= typeElement.toLowerCase();
      if (tabAction[actionType]!=undefined) actionElement=tabAction[actionType]; }
    if (actionElement.indexOf("Module(")>0)
         setTimeout(actionElement, 10);
    else setTimeout(actionElement+"(lienElement)", 10);
  }

  // ==== Affichage la visualisation du contenu d'un fichier ====
  function ouvrir(url) {
    cheminUrl=url;
    if (memoWeb.length>1) { url=memoWeb;
      if ((url.indexOf(".rss")>0)||(url.indexOf(".xml")>0))
           { url="moteur/ouvrir.php?url="+encodeURIComponent(memoWeb);  if (memoSrv!=actuelSrv) url+= "&srv="+memoSrv; }
    } else { url="moteur/ouvrir.php?url="+encodeURIComponent(memoLien); if (memoSrv!=actuelSrv) url+= "&srv="+memoSrv; }
    document.getElementById('frame_detail').innerHTML='<iframe id="apercu" name="apercu" src="'+url+'" frameborder="0" allowtransparency="false"></iframe>';
    if ((url.indexOf(".txt")>0)||(url.indexOf(".css")>0))
      menuDivers();
    else if ((url.indexOf(".htm")>0)||(url.indexOf(".css")>0)||(url.indexOf(".url")>0))
      menuLiens();
    else menuVide();
    montrer("<div><img src='style/"+styleActif+"/images/voir.<?php echo $_SESSION["ws"]["formatExt"]?>'>&nbsp; <?php echo $_SESSION["ws"]["dia"]["filePreview"]?> &nbsp;"+affichUrl(cheminUrl)+((memoMime.length!=0)?" <span id='detailFileMime'>("+memoMime+")</span>":"")+"</div>");
  }

  // ==== Force l'ouverture d'un fichier avec le logiciel associé ====
  function ouvrirAvec(url) {
    document.getElementById('frame_detail').innerHTML='<iframe id="apercu" name="apercu" src="moteur/ouvrir.php?pop=1&url='+encodeURIComponent(url)+'" frameborder="0" allowtransparency="false" scrolling="yes"></iframe>';
  }

  // ==== Enregistre le document sélectionné ====
  function sauver(url) {
    document.getElementById('frame_detail').innerHTML='<iframe id="apercu" name="apercu" src="moteur/ouvrir.php?forcedl=1&url='+encodeURIComponent(url)+'" frameborder="0" allowtransparency="false" scrolling="yes"></iframe>';
  }

  // ==== Sélectionne le dossier ou fichier ====
  function selectionner(url) {
  }

  // ==== Déselectionne le dossier ou fichier ====
  function deselectionner(url) {
  }

  // ==== Sélectionne tout ====
  function toutSelectionner(url) {
  }

  // ==== Desélectionne tout ====
  function toutDeselectionner(url) {
  }

  // ==== Renomme selon une expression régulière ====
  function toutRenommer(url) {
  }

  // ==== Affichage d'une page HTML ====
  function visiter(url) {
    cheminUrl=url;
    if (memoWeb.length>1) url=memoWeb; else url="moteur/ouvrir.php?url="+encodeURIComponent(memoLien);
    <?php if ($_SESSION["ws"]["linkWin"]=="1") echo 'window.open (url,"_up")'; else { ?>
    document.getElementById('frame_detail').innerHTML='<iframe id="apercu" name="apercu" src="'+url+'" frameborder="0" allowtransparency="false"></iframe>';
    menuLiens();
    montrer("<div><img src='style/"+styleActif+"/images/web.<?php echo $_SESSION["ws"]["formatExt"]?>'>&nbsp; <?php echo $_SESSION["ws"]["dia"]["webPreview"]?> &nbsp;"+affichUrl(cheminUrl)+((memoMime.length!=0)?" <span id='detailFileMime'>("+memoMime+")</span>":"")+"</div>");
    <?php } ?>
  }
  function surfer(url) {
    cheminUrl=url;  
    <?php if ($_SESSION["ws"]["linkWin"]=="1") echo 'window.open (url,"_up")'; else { ?>
    document.getElementById('frame_detail').innerHTML='<iframe id="apercu" name="apercu" src="'+url+'" frameborder="0" allowtransparency="false"></iframe>';
    menuLiens();
    montrer("<div><img src='style/"+styleActif+"/images/web.<?php echo $_SESSION["ws"]["formatExt"]?>'>&nbsp; <?php echo $_SESSION["ws"]["dia"]["webPreview"]?> &nbsp;"+affichUrl(cheminUrl)+((memoMime.length!=0)?" <span id='detailFileMime'>("+memoMime+")</span>":"")+"</div>");
    <?php } ?>
  }

  // ==== Affiche la visualisation d'une image ====
  function afficher(url) {
    cheminUrl=url;  
    if ( (memoWeb.length>1)&&!(document.getElementById('visuImg')) ) url=memoWeb;
    if (memoSize>4000000) {
      alerter("info","<?php echo $_SESSION["ws"]["dia"]["picTooBig"]?> ","");
      sauver(url);
      return false; }

    rephttp = getNewXMLHTTP();
    rephttp.onreadystatechange = afficherApercu;
    rephttp.open("GET", "moteur/apercu.php?url="+encodeURIComponent(url), true);
    rephttp.send(null);
    menuImage();
    if (document.getElementById('cadrpic')) document.getElementById('cadrpic').innerHTML="";
    montrer("<div><img src='style/"+styleActif+"/images/zoom.<?php echo $_SESSION["ws"]["formatExt"]?>'>&nbsp; <?php echo $_SESSION["ws"]["dia"]["pictPreview"]?> &nbsp;"+affichUrl(cheminUrl)+((memoMime.length!=0)?" <span id='detailFileMime'>("+memoMime+")</span>":"")+"</div>");
  }

  // ==== Affiche la frame d'aperçu ====
  function afficherApercu() {
    if ((rephttp.readyState == 4) && (rephttp.status == 200)) {
      dj = new Date();
      actual = dj.getMinutes()+dj.getSeconds();    
      document.getElementById('frame_detail').innerHTML=rephttp.responseText;
      hauteurbox = (document.getElementById("frame_detail").<?php echo $instr?>Height-150)/2;
      <?php if ($navig!="IE") { ?>
        document.getElementById('loadingImg').style.paddingTop=eval(hauteurbox)+"px";
      <?php } else { ?>
        document.getElementById('exifpic').style.bottom=eval(hauteurInfos)+'px';
      <?php } ?>
      document.getElementById('frame_detail').style.overflow="hidden";
      document.getElementById('cadrpic').innerHTML="<img src="+'"'+"moteur/pic.php?actual="+actual+"&pic="+encodeURIComponent(memoLien)+((memoSrv!=actuelSrv)?"&srv="+memoSrv:"")+'"'+" id='visuImg' name='visuImg' class='moveImg' style='position:absolute;<?php echo $filtre; ?>' border='0'  onload='centrer(1); startFonduImage(); hideLoading();'>";
      req_asyncp ("moteur/exif.php?url="+encodeURIComponent(memoLien),afficherExif);      
      corriger();
    }
  }

  // ==== Visualiser une vidéo ====
  function visionner(url) {
      document.getElementById('frame_detail').innerHTML='<iframe id="apercu" name="apercu" src="plugins/flvplayer/index.php?chemin='+encodeURIComponent('../../moteur/ouvrir.php?url='+url)+'" frameborder="0" allowtransparency="false"></iframe>';
      menuVide();
      montrer("<div><img src='style/"+styleActif+"/images/visio.<?php echo $_SESSION["ws"]["formatExt"]?>'>&nbsp; <?php echo $_SESSION["ws"]["dia"]["filePreview"]?> &nbsp;"+affichUrl(url)+" <span id='detailFileMime'>("+memoMime+")</span></div>");
  }

  // ==== Ecouter un fichier son ====
  function ecouter(url) {
   document.getElementById('playermp3').style.display="block";
     document.getElementById('playermp3').innerHTML='<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="180" height="74" id="player" align="middle">'
       +'<param name="allowScriptAccess" value="sameDomain" />'
       +'<param name="movie" value="moteur/player.swf?chemin=<?php echo urlencode($_SESSION["ws"]["cheminImg"])?>&morceau='+encodeURIComponent('moteur/ouvrir.php?url='+url)+'" />'
       +'<param name="quality" value="high" /><param name="bgcolor" value="#000000" />'
       +'<embed src="moteur/player.swf?chemin=<?php echo urlencode($_SESSION["ws"]["cheminImg"])?>&morceau='+encodeURIComponent('moteur/ouvrir.php?url='+url)+'" quality="high" bgcolor="#000000" width="180" height="74" name="player" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></object>';
  }

  // ==== Imprime le document si possible ====
  function imprimer(url){
  document.getElementById('frame_detail').innerHTML='<iframe id="apercu" name="apercu" src="moteur/ouvrir.php?url='+encodeURIComponent(url)+'" frameborder="0" allowtransparency="false"></iframe>';
    printcadre=eval(parent.document.getElementById('frame_detail'));
    printcadre.focus();
    window.print();
  }

  // ==== Ouvre un fichier a partir du module spécifié ====
  function openModule(repPlugin,url,adrIcone) {
    document.getElementById('frame_detail').innerHTML='<iframe id="apercu" name="apercu" src="plugins/'+repPlugin+'/index.php?url='+encodeURIComponent(url)+'&chemin='+encodeURIComponent('moteur/ouvrir.php?nothl=1&url='+url)+'" frameborder="0" allowtransparency="false"></iframe>';
    menuVide();
    if (((url.indexOf(".mp3")<=0)&&(url.indexOf(".pls")<=0)&&(url.indexOf(".m3u")<=0))||(repPlugin=="vlcplayer"))
      montrer("<div><img src='"+adrIcone+"'>&nbsp; <?php echo $_SESSION["ws"]["dia"]["filePreview"]?> &nbsp;"+affichUrl(url)+" <span id='detailFileMime'>("+memoMime+")</span></div>");
  }



  // ==== Réactualise le dossier ====
  function actualiser() {
    document.getElementById('liens').className = 'masque';
    document.getElementById('charge').className = 'montre';
    <?php if (isset($_SESSION["ws"]["effectAct"])&&($_SESSION["ws"]["effectAct"]=="1")) echo "if (alphamenu>50) menuDisappear();";
          else echo "document.getElementById('context_box').style.display='none';\n"; ?>
    req_asyncnav("moteur/naviguer.php",actuel,triggerNaviguer);
  }

  // ==== Réactualise le dossier après upload ====
  function actualiserUp() {
    req_asyncnav("moteur/naviguer.php",actuel,triggerNaviguer);
  }

  // ==== Remonte au dossier supérieur ====
  function remonter(url) {
    if (url!="") naviguer(url);
  }

  // ==== Retourne au dossier précédent ====
  function precedent(url) {
    if (url!="") naviguer(url);
  }

  // ==== Retourne au dossier suivant ====
  function suivant(url) {
    if (url!="") naviguer(url);
  }

  // ==== Ouvre une fenêtre de message pour contacter l'auteur ====
  function contacter(url) {
    window.open("mailto:info@webshare.fr",'_self');
  }

  // ==== Confirmation de fermeture ====
  function confirmQuitter(url,label) {
    demander("choix","<form name='demande' onsubmit='quitter();return false;'> <?php echo $_SESSION["ws"]["dia"]["areYouSure"].$_SESSION["ws"]["dia"]["toDisconnect"]?>&nbsp;&nbsp;","<span style='font-size: 18px;'><img src='style/"+styleActif+"/images/exit.<?php echo $_SESSION["ws"]["formatExt"]?>'> <?php echo $_SESSION["ws"]["dia"]["toQuit"]?></span>","quitter");
  }
  
  // ==== Quitte l'explorateur en fermant la session ====
  function quitter(url) {
    window.location.href='index.php';
  }

  // ==== Ouvre le script d'upload de fichier ====
  function openUpload(path) {
    fileUpload = this.open("moteur/upload.php","FileUpload", "toolbar=no,menubar=no,location=no,scrollbars=no,resizable=yes,directories=no,status=no,left=" + ((screen.width/2)-300) + ",top="+((screen.height/2)-200)+",width=450,height=230");
  }

  // ==== Affiche l'invite d'une demande de gestion de fichiers ====
  function demander(typedemande,texte,label,lancer_fonction) {
    if (<?php echo intval($_SESSION["ws"]["dynWin"]); ?>==0) {
      if (document.getElementById('frame_demande').style.visibility=="visible") cacherDemande();
      if (dispinvite!=0) { clearTimeout(dispinvite); dispinvite=0; }
      document.getElementById('frame_demande').style.height="30px";
      document.getElementById('frame_galerie').style.bottom=eval(hauteurInfos+40)+"px";
      document.getElementById('frame_demande').innerHTML= nettoieUrl(texte)+"<img src='style/"+styleActif+"/images/ok.<?php echo $_SESSION["ws"]["formatExt"]?>' style='cursor:pointer' onclick=\""+((lancer_fonction.length!=0)?lancer_fonction+"()":"cacherDemande();")+"\">&nbsp;"
        +((typedemande=="choix")?"<img src='style/"+styleActif+"/images/cancel.<?php echo $_SESSION["ws"]["formatExt"]?>' style='cursor:pointer' onclick=\"cacherDemande();\">":"")+"</form><div id='info_demande' style='padding:8px'></div>";
      functionValid= lancer_fonction;
      cycle=0; prog=10; pas=100/prog; alpha=0; fonduDemande();
    } else {
      openWindow();
      if (document.getElementById('contenu_fenetre').style.visibility=="visible") closeWindow();
      if (dispinvite!=0) { clearTimeout(dispinvite); dispinvite=0; }
      functionValid= lancer_fonction;
      document.getElementById('contenu_fenetre').innerHTML="<span style='font-size:18px'>"+label+"</span>"
                                +"<img src='style/"+styleActif+"/images/fondcadre.<?php echo $_SESSION["ws"]["formatExt"]?>' style='width:320px;height:2px;margin:8px;'><br /><div style='margin-left:20px;margin-right:20px'>"
        +nettoieUrl(texte)+"</div><img src='style/"+styleActif+"/images/fondcadre.<?php echo $_SESSION["ws"]["formatExt"]?>' style='width:320px;height:2px;margin:8px;'><br />"
                                +"<span style='cursor:pointer;text-decoration:underline' onclick=\""+((lancer_fonction.length!=0)?"closeWindow();"+lancer_fonction+"();":"closeWindow();")+"\"><?php echo $_SESSION["ws"]["dia"]["toValid"]?></span> <img src='style/"+styleActif+"/images/ok.<?php echo $_SESSION["ws"]["formatExt"]?>' style='cursor:pointer;' onclick=\""+((lancer_fonction.length!=0)?"closeWindow();"+lancer_fonction+"()":"closeWindow();")+"\">&nbsp;"
        +((typedemande=="choix")?"<span style='cursor:pointer;text-decoration:underline;padding-left:30px' onclick=\"closeWindow();\"><?php echo $_SESSION["ws"]["dia"]["cancelFile"]?></span> <img src='style/"+styleActif+"/images/cancel.<?php echo $_SESSION["ws"]["formatExt"]?>' style='cursor:pointer;' onclick=\"closeWindow();\">":"")+"</form><div id='info_demande' style='padding:8px'></div>";
      document.getElementById("fenetre").style.height="160px";
    }
  }

  // ==== Masque l'invite d'une demande de gestion de fichiers ====
  function cacherDemande() {
    functionValid= "";
    if (<?php echo intval($_SESSION["ws"]["dynWin"]); ?>==0) {
      document.getElementById('frame_galerie').style.bottom=eval(hauteurInfos)+"px";
      cycle=0; prog=10; pas=-100/prog; alpha=100; fonduDemande();
    } else {
      closeWindow();
    }
  }

  // ==== Affiche une alerte ====
  function alerter(typedemande,texte,lancer_fonction) {
      if (document.getElementById('frame_demande').style.visibility=="visible") cacherAlerte();
      if (dispinvite!=0) { clearTimeout(dispinvite); dispinvite=0; }
      document.getElementById('frame_demande').style.height="30px";
      document.getElementById('frame_galerie').style.bottom=eval(hauteurInfos+40)+"px";
      document.getElementById('frame_demande').innerHTML= nettoieUrl(texte)+"<img src='style/"+styleActif+"/images/ok.<?php echo $_SESSION["ws"]["formatExt"]?>' style='cursor:pointer' onclick=\""+((lancer_fonction.length!=0)?lancer_fonction+"()":"cacherAlerte();")+"\">&nbsp;"
        +((typedemande=="choix")?"<img src='style/"+styleActif+"/images/cancel.<?php echo $_SESSION["ws"]["formatExt"]?>' style='cursor:pointer' onclick=\"cacherAlerte();\">":"")+"</form><div id='info_demande' style='padding:8px'></div>";
      cycle=0; prog=10; pas=100/prog; alpha=0; fonduDemande();
  }
  
  // ==== Masque l'alerte ====
  function cacherAlerte() {
      document.getElementById('frame_galerie').style.bottom=eval(hauteurInfos)+"px";
      cycle=0; prog=10; pas=-100/prog; alpha=100; fonduDemande();
  }

  // ==== Detecte si le fichier a charger est une archive Zip ====
  function detectZip(nomFichier) {
    if (nomFichier.indexOf(".zip")!=-1) document.getElementById('zipbox').style.visibility="visible";
                                   else document.getElementById('zipbox').style.visibility="hidden";
  }

  // ==== Affiche le retour des fonctions de gestion de fichiers ====
  function resultat() {
    if ((xmldata.readyState == 4) && (xmldata.status == 200)) {
      actualiser();
      document.getElementById('frame_demande').innerHTML="<div class='cadre'><b>"+nettoieUrl(xmldata.responseText)+" <img src='style/"+styleActif+"/images/ok.<?php echo $_SESSION["ws"]["formatExt"]?>' onclick=\"cacherDemande();\"></b></div>";
      dispinvite= setTimeout("cacherAlerte()",3000);
      if (document.typeElement && typeElement=="dossier") explorerServeur(actuelSrv);
    }
  }

  // ==== Affiche le retour des fonctions d'informations ====
  function resultatInfos() {
    if ((xmldata.readyState == 4) && (xmldata.status == 200)) {
      document.getElementById('frame_demande').innerHTML="<div class='cadre'><b>"+nettoieUrl(xmldata.responseText)+" <img src='style/"+styleActif+"/images/ok.<?php echo $_SESSION["ws"]["formatExt"]?>' onclick=\"cacherDemande();\"></b></div>";
      dispinvite= setTimeout("cacherAlerte()",3000);
    }
  }
  
  // ==== Affiche le retour des fonctions de modification de fichiers ====
  function resultatModify(retour) {
    if (<?php echo intval($_SESSION["ws"]["dynWin"]); ?>==1) {
      document.getElementById('frame_demande').innerHTML="<div class='cadre'><b>"+nettoieUrl(retour)+"</b></div>";
      document.getElementById('frame_demande').style.height="30px";
      document.getElementById('frame_galerie').style.bottom=eval(hauteurInfos+40)+"px";
      cycle=0; prog=10; pas=100/prog; alpha=0; fonduDemande();
    } else {
      document.getElementById('frame_demande').innerHTML="<div class='cadre'><b>"+nettoieUrl(retour)+" <img src='style/"+styleActif+"/images/ok.<?php echo $_SESSION["ws"]["formatExt"]?>' onclick=\"cacherAlerte();\"></b></div>";
    }
    dispinvite= setTimeout("cacherAlerte()",3000);
  }
  
 // ==== Affiche le retour des fonctions d'édition de fichiers ====
  function resultatEdit(retour) {
    document.getElementById('frame_demande').innerHTML="<div class='cadre'><b>"+nettoieUrl(retour)+" <img src='style/"+styleActif+"/images/ok.<?php echo $_SESSION["ws"]["formatExt"]?>' onclick=\"cacherDemande();\"></b></div>";
    cycle=0; prog=10; pas=100/prog; alpha=0; fonduDemande();
    cacher();
    dispinvite= setTimeout("cacherAlerte()",3000);
  }

  // ==== Imprime le contenu du dossier / la galerie ====
  function imprimerCadre(cadre){
    context_close();
    document.getElementById("frame_galerie").style.overflow="visible";
    document.getElementById("frame_galerie").style.backgroundImage="";
    printcadre=eval(parent.document.getElementById(cadre));
    printcadre.focus();
    window.print();
  }

  // ==== Affiche les informations Exif ====
  function afficherExif() {
    if ((xmlpar.readyState == 4) && (xmlpar.status == 200)) {
      document.getElementById('exifpic').innerHTML="<div id='close_exif'><img src='style/"+styleActif+"/images/close.<?php echo $_SESSION["ws"]["formatExt"]?>' onclick='cacheExif()'></div>"+xmlpar.responseText;      
    }
  }

  // ==== Recharge les informations Exif ====
  function reloadExif(url) {
    document.getElementById('exifpic').style.display="block";
    numimg=parseInt(document.formlisteimg.numimg.value);
    if (document.getElementsByName('listeimg').length==1)
         nomimg=document.formlisteimg.listeimg.value;
    else nomimg=document.formlisteimg.listeimg[numimg].value;
    req_asyncp ("moteur/exif.php?url="+encodeURIComponent(nomimg),afficherExif); 
  }

  // ==== Affiche les détails Exif ====
  function detailExif() {
    if ((xmlpar.readyState == 4) && (xmlpar.status == 200)) {
      document.getElementById('divExif').innerHTML=xmlpar.responseText;
    }
  }

  // ==== Affiche les détails des commentaires ====
  function detailCommentaire() {
   if ((xmlexp.readyState == 4) && (xmlexp.status == 200)) {
      document.getElementById('blocCommentaire').style.display="block";
      if (xmlexp.responseText.length!=0) document.getElementById('divCommentaire').innerHTML="<div>"+decodeURIComponent(xmlexp.responseText)+"</div>";
      if (xmlexp.responseText.indexOf('display:none')>0) document.getElementById('blocCommentaire').style.display="none";
    }
  }

  // ==== Affiche les détails Mime ====
  function detailMime() {
    if ((xmldata.readyState == 4) && (xmldata.status == 200)) {
        document.getElementById('divMime').innerHTML=xmldata.responseText;
    }
  }

  // ==== Affiche les détails Mime ====
  function detailMimeResult() {
    if ((xmlexp.readyState == 4) && (xmlexp.status == 200)) {
        document.getElementById('detailFileMime').innerHTML=xmlexp.responseText;
    }
  }

  // ==== Lance ou arrête le diaporama ====
  function lanceDiapo() {
      if (parseInt(boucleDiapo)>0) {
        document.getElementById('switchdiapo').innerHTML="<img src='style/"+styleActif+"/images/bt13.<?php echo $_SESSION["ws"]["formatExt"]?>' title=\"<?php echo $_SESSION["ws"]["dia"]["diaporama"]?>\"   onclick='lanceDiapo();'>";
        clearTimeout(boucleDiapo);
        alterner(memoArboUser);
        closeFull();
        boucleDiapo="";
      } else {
        document.getElementById('switchdiapo').innerHTML="<img src='style/"+styleActif+"/images/bt13b.<?php echo $_SESSION["ws"]["formatExt"]?>' title=\"<?php echo $_SESSION["ws"]["dia"]["closeWindow"]." ".$_SESSION["ws"]["dia"]["diaporama"]?>\"   onclick='lanceDiapo();'>";
        memoArboUser=arboUser;
        alterner(2);
        openFull();
        diaporama();
      }
  }

  // ==== Affiche un diaporama ====
  function diaporama(url) {
    if (document.getElementById('frame_detail').style.visibility!="hidden") suivante();
      boucleDiapo= setTimeout('diaporama()',<?php echo ((intval($_SESSION["ws"]["diapoSp"])>0)?$_SESSION["ws"]["diapoSp"]:"5000"); ?>);
  }

  // ==== Enregistre un document modifié ====
  function modifier() {
    cycle=0; prog=10; pas=100/prog; alpha=0; fonduDemande();
    req_async_datas('moteur/modifier.php',resultat,document.getElementById("apercu").contentWindow.document.editForm);
    cacher();
  }

  // ==== Enregistre un document modifié ====
  function modifierGarder() {
    cycle=0; prog=10; pas=100/prog; alpha=0; fonduDemande();
    req_async_datas('moteur/modifier.php',resultat,document.getElementById("apercu").contentWindow.document.editForm);
    dispinvite= setTimeout("cacherAlerte()",3000);
  }

  // ==== Enregistre une image ====
  function sauverimage(url) {
    numimg=parseInt(document.formlisteimg.numimg.value);
    if (document.getElementsByName('listeimg').length==1)
         nomimg=document.formlisteimg.listeimg.value;
    else nomimg=document.formlisteimg.listeimg[numimg].value;
    document.getElementById('frame_demande').innerHTML='<iframe id="apercu" name="apercu" src="moteur/ouvrir.php?forcedl=1&url='+nomimg+'" frameborder="0" allowtransparency="false" scrolling="yes"></iframe>';
  }

  // ==== Enregistre tous les documents du répertoire courant ====
  function toutSauver(url,label) {
    demander("choix","<form name='demande' onsubmit='validetoutSauver();return false;'> <?php echo $_SESSION["ws"]["dia"]["includeSubDir"]?> <input type='checkbox' name='allElements' value='1' style='width:15px'>",label,"validetoutSauver");
  }

  function validetoutSauver() {
    allElm=(document.demande.allElements.checked===true?1:0);
    document.getElementById('frame_detail').innerHTML='<iframe id="apercu" name="apercu" src="moteur/enregistrer.php?ok=1&all='+allElm+'" frameborder="0" allowtransparency="false" scrolling="yes"></iframe>';
  }

  // ==== Affiche les propriétés d'un document ====
  function detailer(url) {
      nomElement=memoNom+"."+memoType; typeElement=memoType; srvElement=memoSrv; proElement=memoPro;
      if (memoPro=="url") typeElement="url"; if (memoPro=="dossier") { typeElement="dossier"; nomElement=url; }
      affNom=nomElement; lienWeb=0; if (memoWeb.length>1) lienWeb=1;
      realpath= racineweb+"/"+memoLien.substring(1,memoLien.length);

      if (nomElement.lastIndexOf(".")>1) affNom= nomElement.substring(0,(nomElement.lastIndexOf(".")));

      document.getElementById('frame_favoris').innerHTML="<div id='close_favoris'><img src='style/"+styleActif+"/images/fleche2.jpg' onclick='alternerFavoris(2)'></div><div id='resize_favoris' onmousedown='redimFavoris();'></div>"
        +"<div class='recherche'> <div class='rubrique' style='width:100%;'><img src='style/"+styleActif+"/images/info.<?php echo $_SESSION["ws"]["formatExt"]?>' style='float:left;margin:6px;margin-right:2px'>"
        +"<img src='style/"+styleActif+"/images/close.<?php echo $_SESSION["ws"]["formatExt"]?>' style='float:right;margin:6px;margin-right:2px;cursor:pointer' onclick='recupFavoris();'>"
        +"<b>&nbsp;<?php echo $_SESSION["ws"]["dia"]["propertyOf"]?> :</b><br />&nbsp;"+nettoieUrl(affNom)
        +"</div><div class='blocInfo'><span id='divMime'></span><br /><form name='prop'><input type='hidden' name='nomElement' value='"+typeElement+"'></form><br />"
        +(memoSize!=0?"<b><?php echo $_SESSION["ws"]["dia"]["FileSize"]?> : </b>"+convertir(memoSize)+" <br /><br />":"")+(memoDtm.length!=0?"<b> <?php echo $_SESSION["ws"]["dia"]["modified"]?> : </b><br />"+memoDtm+"<br /><br />":"")
        +(memoPerm=="RW"?"<?php echo $_SESSION["ws"]["dia"]["readWrite"]?>":"")+(memoPerm=="R"?"<?php echo $_SESSION["ws"]["dia"]["readOnly"]?>":"")+(memoPerm=="W"?"<?php echo $_SESSION["ws"]["dia"]["writeOnly"]?>":"")+(memoPerm=="N"?"<?php echo $_SESSION["ws"]["dia"]["locked"]?>":"")
        +(lienWeb==1?"</div><div class='rubrique' style='width:100%;height:22px;'><img src='style/"+styleActif+"/images/bloc.<?php echo $_SESSION["ws"]["formatExt"]?>' border='0'> <b><?php echo $_SESSION["ws"]["dia"]["directLink"]?></b></div><div class='blocInfo'><textarea cols='50' wrap='hard' style='width:100%'>"+memoWeb+"</textarea><br />":"")
      <?php if ($_SESSION["ws"]["compPath"]=="1") {
      echo '+(lienWeb==0?"<br/><br/><div class=\'rubrique\' style=\'width:100%;height:22px;\'>'
          .'<img src=\''.$_SESSION["ws"]["cheminImg"].'bloc.'.$_SESSION["ws"]["formatExt"].'\' border=0\'>'
          .'<b> '.$_SESSION["ws"]["dia"]["directLink"].'</b></div><textarea cols=\'50\' wrap=\'hard\' style=\'width:100%\'>'
          .'"+realpath+"</textarea><br/>":"")';
      } ?>
        +"</div><div class='rubrique' id='blocCommentaire' style='width:100%;height:22px;'><b><img src='style/"+styleActif+"/images/comment.<?php echo $_SESSION["ws"]["formatExt"]?>' style='float:left;margin-left:6px;margin-right:6px'> <?php echo $_SESSION["ws"]["dia"]["infocomment"]?> :&nbsp;</b></div>"
        +"<div class='blocInfo'><div id='divCommentaire' class='cadre' style='border:0;position:relative;width:100%'></div>"
        +"</div><div id='divExif' style='position:relative;width:100%'></div></div>";

      if ((typeElement.toLowerCase()=="jpg") || (typeElement.toLowerCase()=="jpeg")) req_asyncp ("moteur/exif.php?detail=1&url="+encodeURIComponent(nomElement)+"&memoType="+typeElement+"&memoSrv="+srvElement+"&memoPro="+proElement,detailExif);
      req_async ("moteur/commenter.php?recup=1&nomComment="+encodeURIComponent(nomElement)+"&memoType="+typeElement+"&memoSrv="+srvElement+"&memoPro="+proElement,detailCommentaire);
      req_async_datas ("moteur/typemime.php",detailMime,document.prop);
      alternerFavoris(1);
  }

  // ==== NOP ====
  function rien(url) {
  }


// ============ Fonctions de gestion de fichiers =============

  // ==== Création d'un nouveau dossier ====
  function creaDossier(url,label) {
    demander("choix","<form name='demande' onsubmit='valideDossier();return false;'> <?php echo $_SESSION["ws"]["dia"]["addDir"]?> <input type='text' name='nomElement' onkeyup='veriftout(this)'>&nbsp;&nbsp;",label,"valideDossier");
    setTimeout("document.demande.nomElement.focus()", 300); 
  }
  // ==== Validation de la création du nouveau dossier ====
  function valideDossier() {
    veriftout(document.demande.nomElement);
    if (document.demande.nomElement.value.length!=0) {
      document.demande.nomElement.value=encodeURIComponent(document.demande.nomElement.value);
      req_async_datas("moteur/crea_dossier.php",resultat,document.demande);
      setTimeout("explorerServeur('"+actuelSrv+"')",1500);
      resultatModify("<div class='cadre'><b> <img src='style/"+styleActif+"/images/loading.gif' alt=''> <?php echo $_SESSION["ws"]["dia"]["making"]?> </b></div>");
    }
  }

  // ==== Envoi l'élément par email ====
  function sendItem(url,label) {
    if (memoSize<4000000) {
      lienElement=memoLien; srvElement=memoSrv; proElement=memoPro;
      typeElement=memoType; if (proElement=='url') typeElement='url';
      nomElement=memoNom+((typeElement.length>0)?".":"")+typeElement;
    
      demander("choix","<form name='demande' onsubmit='valideEnvoiMail();return false;'>"
                      +' <input type="hidden" name="nomElement"  value="'+encodeURIComponent(nomElement)+'">'
                      +' <input type="hidden" name="nomLien"     value="'+encodeURIComponent(lienElement)+'">'
                      +' <input type="hidden" name="typeElement" value="'+encodeURIComponent(typeElement)+'">'                      
                      +"<?php echo $_SESSION["ws"]["dia"]["recipientMail"]?>&nbsp;<input type='text' name='adresseElement'>&nbsp;"+((effectAct!=1)?"":"<br />")+"&nbsp;<?php echo $_SESSION["ws"]["dia"]["titleMail"]?>&nbsp;<input type='text' name='titleElement' style='width:254px'><br />"
                      +"<?php echo $_SESSION["ws"]["dia"]["contentMail"]?>&nbsp;:&nbsp;'<b>"+basename(nomElement)+"</b>'<br /><textarea name='textElement' style='height:44px'></textarea>",label,"valideEnvoiMail");
      if (dynWindow!=1) document.getElementById('frame_galerie').style.bottom=eval(hauteurInfos+110)+"px";
      if (dynWindow!=1) document.getElementById('frame_demande').style.height="100px";
      setTimeout("document.demande.nomElement.focus()", 300);
    } else {
      alerter("choix"," <?php echo $_SESSION["ws"]["dia"]["fileTooBig"]?>","rien");
      setTimeout("cacherAlerte();",3000);
    }
  }
  
  // ==== Validation de l'envoi d'élément par email ====
  function valideEnvoiMail() {
    veriftout(document.demande.nomElement);
    if ((document.demande.nomElement.value.length!=0)&&(regMail.test(document.demande.adresseElement.value)!==false)) {
      document.demande.nomElement.value=encodeURIComponent(document.demande.nomElement.value);
      req_async_datas("moteur/envoi_mail.php",resultat,document.demande);
      if (dynWindow!=1) document.getElementById('frame_galerie').style.bottom=eval(hauteurInfos+40)+"px";
      if (dynWindow!=1) document.getElementById('frame_demande').style.height="30px";
      resultatModify("<div class='cadre'><b> <img src='style/"+styleActif+"/images/loading.gif' alt=''> <?php echo $_SESSION["ws"]["dia"]["sendingMail"]?> </b></div>");
    }
  }

  // ==== Création d'un nouveau fichier ====
  function creaFichier(url,label) {
    demander("choix","<form method='POST' name='demande' enctype='multipart/form-data' action='moteur/crea_fichier.php' target='upload'> <?php echo $_SESSION["ws"]["dia"]["addUpload"]?> <input type='file' name='nomElement' onchange='detectZip(nomElement.value)'>&nbsp;&nbsp;<span id='zipbox' style='visibility:hidden'><input type='checkbox' name='typeZip' value='0' onchange='if(this.checked) this.value=1; else this.value=0;'>&nbsp;<?php echo $_SESSION["ws"]["dia"]["toDezip"]?></span>",label,"valideFichier");
    setTimeout("document.demande.nomElement.focus()", 300); 
  }
  // ==== Validation de la création du nouveau dossier ====
  function valideFichier() {
    if (document.demande.nomElement.value.length!=0) {
      document.demande.submit();
      resultatModify("<div class='ec'><b> <img src='style/"+styleActif+"/images/loading.gif' alt=''> <?php echo $_SESSION["ws"]["dia"]["making"]?> </b></div>");
    }
  }

  // ==== Création d'un nouveau lien ====
  function creaLien(url,label) {
    demander("choix","<form name='demande' onsubmit='valideLien();return false;'> <?php echo $_SESSION["ws"]["dia"]["addLink"]?> <input type='text' name='nomElement' onkeyup='veriftout(this)'>"+((effectAct!=1)?"":"<br />")+"<?php echo $_SESSION["ws"]["dia"]["addLink2"]?> <input type='text' name='adrElement'>&nbsp;&nbsp;",label,"valideLien");
    setTimeout("document.demande.nomElement.focus()", 300); 
  }
  // ==== Validation de la création du nouveau lien ====
  function valideLien() {
  veriftout(document.demande.nomElement);
    if (document.demande.nomElement.value.length!=0) {
      document.demande.nomElement.value=encodeURIComponent(document.demande.nomElement.value);
      req_async_datas("moteur/crea_lien.php",resultat,document.demande);
      resultatModify("<div class='ec'><b> <img src='style/"+styleActif+"/images/loading.gif' alt=''> <?php echo $_SESSION["ws"]["dia"]["making"]?> </b></div>");
    }
  }

  // ==== Création d'un nouveau document texte vide ====
  function creaTxt(url,label) {
    demander("choix","<form name='demande' onsubmit='valideTxt();return false;'> <?php echo $_SESSION["ws"]["dia"]["addTxt"]?> <input type='text' name='nomElement' onkeyup='veriftout(this)'>&nbsp;.&nbsp;"
      +' <input type="text"   name="typeElement" value="txt" onkeyup="veriftout(this)" style="width:35px" >',label,"valideTxt");
    setTimeout("document.demande.nomElement.focus()", 300); 
  }
  // ==== Validation de la création du nouveau document texte vide ====
  function valideTxt() {
  veriftout(document.demande.nomElement);
    if (document.demande.nomElement.value.length!=0) {
      document.demande.nomElement.value=encodeURIComponent(document.demande.nomElement.value);
      req_async_datas("moteur/crea_txt.php",resultat,document.demande);
      resultatModify("<div class='ec'><b> <img src='style/"+styleActif+"/images/loading.gif' alt=''> <?php echo $_SESSION["ws"]["dia"]["making"]?> </b></div>");
    }
  }

  // ==== Suppression d'un élément ====
  function supprimer(url,label) {

    lienElement=memoLien; srvElement=memoSrv; proElement=memoPro;
    typeElement=memoType; if (proElement=='url') typeElement='url';
    nomElement=memoNom+((typeElement.length>0)?".":"")+typeElement;

    demander("choix","<form name='demande' onsubmit='valideSupprimer();return false;'>"
      +' <input type="hidden" name="nomElement" value="'+encodeURIComponent(nomElement)+'">'
      +' <input type="hidden" name="nomLien"    value="'+encodeURIComponent(lienElement)+'">'
      +' <input type="hidden" name="nomType"    value="'+typeElement+'">'
      +' <input type="hidden" name="nomPro"     value="'+proElement+'">'
      +' <input type="hidden" name="nomSrv"     value="'+srvElement+'">'
      +"<?php echo $_SESSION["ws"]["dia"]["delete"]?> "
      +(proElement=='dossier'?"<?php echo $_SESSION["ws"]["dia"]["dir"]?> '<b>"+basename(nomElement)+"</b>' <?php echo $_SESSION["ws"]["dia"]["delete2"]?> ? ":"<?php echo $_SESSION["ws"]["dia"]["file"]?> '<b>"+basename(nomElement)+"</b>' ? "),label,"valideSupprimer");
  }
  // ==== Validation de la suppression ====
  function valideSupprimer() {
    if (document.demande.nomElement.value.length!=0) {
      req_async_datas("moteur/supprimer.php",resultat,document.demande);
      resultatModify("<div class='ec'><b> <img src='style/"+styleActif+"/images/loading.gif' alt=''> <?php echo $_SESSION["ws"]["dia"]["deleting"]?> </b><span id='infoProgress'></span></div>");
      setTimeout('viewProgress()',100);
      if (proElement=="dossier") setTimeout("explorerServeur('"+actuelSrv+"')",2000);
    }
  }
  // ==== Affichage de la progression ====
  function viewProgress() {
    req_asynca("moteur/progress.php",validProgress);
  }
  function validProgress() {
    if ((xmlapp.readyState == 4) && (xmlapp.status == 200)) {
      reponse=xmlapp.responseText;
      if (reponse!="") {
        document.getElementById('act').innerHTML=xmlapp.responseText;
        setTimeout('viewProgress()',200);
      }
    }
  }
  
  // ==== Affiche le contenu de la corbeille ====
  function voirCorbeille() {
    naviguer('');
  }

  // ==== Vide la corbeille ====
  function viderCorbeille(label) {
    demander("choix","<form name='demande' onsubmit='valideVider();return false;'>"
      +"<?php echo $_SESSION["ws"]["dia"]["emptyBinConfirm"]?> ",label,"valideVider");
  }
  // ==== Validation du vidage ====
  function valideVider() {
      req_async_datas("moteur/supprimer.php?emptybin=1",resultat,document.demande);
      resultatModify("<div class='ec'><b> <img src='style/"+styleActif+"/images/loading.gif' alt=''> <?php echo $_SESSION["ws"]["dia"]["emptyBinResult"]?> </b></div>");
  }

  // ==== Restaure un élément ====
  function retablirElm() {
   // A terminer
    clipboardMode="move"; clipboardSrv=memoSrv; clipboardType=memoType;
    if (memoType=="arbo") clipboardType="dossier"; if (memoPro=="url") clipboardType="url"; if (memoPro=="dossier") clipboardType="dossier";
    clipboard=actuel+(actuel.substring(actuel.length-1,actuel.length)=='/'?'':'/')+memoNom+((clipboardType.length>0)?".":"")+clipboardType;
    if (clipboardType=='dossier') clipboard=memoLien;
      alerter("info",(clipboardType=='dossier'?" <?php echo $_SESSION["ws"]["dia"]["theDir"]?> '<b>"+basename(clipboard)+"</b>' ":" <?php echo $_SESSION["ws"]["dia"]["theFile"]?> '<b>"+basename(clipboard)+"</b>' ")
      +" <?php echo $_SESSION["ws"]["dia"]["goingToMove"]?> ","");
      setTimeout("cacherAlerte();",3000);
  }

  // ==== Supprime définitivement un élément ====
  function supprimerDef(url,label) {
    lienElement=memoLien; srvElement=memoSrv; proElement=memoPro;
    typeElement=memoType; if (proElement=='url') typeElement='url';
    nomElement=memoNom+((typeElement.length>0)?".":"")+typeElement;

    demander("choix","<form name='demande' onsubmit='valideSupDef();return false;'>"
      +' <input type="hidden" name="nomElement" value="'+encodeURIComponent(nomElement)+'">'
      +' <input type="hidden" name="nomLien"    value="'+encodeURIComponent(lienElement)+'">'
      +' <input type="hidden" name="nomType"    value="'+typeElement+'">'
      +' <input type="hidden" name="nomPro"     value="'+proElement+'">'
      +' <input type="hidden" name="nomSrv"     value="'+srvElement+'">'
      +"<?php echo $_SESSION["ws"]["dia"]["delete"]?> "
      +(proElement=='dossier'?"<?php echo $_SESSION["ws"]["dia"]["dir"]?> '<b>"+basename(nomElement)+"</b>' <?php echo $_SESSION["ws"]["dia"]["delete2"]?> <?php echo $_SESSION["ws"]["dia"]["finally"]?> ? ":"<?php echo $_SESSION["ws"]["dia"]["file"]?>  '<b>"+basename(nomElement)+"</b>' <?php echo $_SESSION["ws"]["dia"]["finally"]?> ? "),label,"valideSupDef");

  }
  // ==== Validation du vidage ====
  function valideSupDef() {
      req_async_datas("moteur/supprimer.php?supdef=1",resultat,document.demande);
      resultatModify("<div class='ec'><b> <img src='style/"+styleActif+"/images/loading.gif' alt=''> <?php echo $_SESSION["ws"]["dia"]["deleting"]?> </b><span id='infoProgress'></span></div>");
      setTimeout('viewProgress()',100);
  }


  // ==== Décompression d'un élément ====
  function dezipper(url,label) {

    lienElement=memoLien; srvElement=memoSrv; proElement=memoPro;
    typeElement=memoType; if (proElement=='url') typeElement='url';
    nomElement=memoNom+((typeElement.length>0)?".":"")+typeElement;

    demander("choix","<form name='demande' onsubmit='valideDezipper();return false;'>"
      +'<input type="hidden" name="nomElement" value="'+encodeURIComponent(nomElement)+'">'
      +'<input type="hidden" name="nomLien"    value="'+encodeURIComponent(lienElement)+'">'
      +'<input type="hidden" name="nomType"    value="'+typeElement+'">'
      +'<input type="hidden" name="nomSrv"     value="'+srvElement+'">'
      +'<input type="hidden" name="nomPro"     value="'+proElement+'">'
      +"<?php echo $_SESSION["ws"]["dia"]["toDezip"]?> '<b>"+basename(nomElement)+"</b>' ? ",label,"valideDezipper");
  }

  // ==== Validation de la décompression ====
  function valideDezipper() {
    if (document.demande.nomElement.value.length!=0) {
      req_async_datas("moteur/dezipper.php",resultat,document.demande);
      resultatModify("<div class='ec'><b> <img src='style/"+styleActif+"/images/loading.gif' alt=''> <?php echo $_SESSION["ws"]["dia"]["dezipping"]?> </b></div>");
    }
  }

  // ==== Renomme un élément ====
  function renommer(url,label) {
    lienElement=memoLien; srvElement=memoSrv; proElement=memoPro;
    nomFichier= memoNom; typeElement=memoType; if (proElement=='url') typeElement='url';
    nomElement=memoNom+((typeElement.length>0)?".":"")+typeElement;

    demander("choix","<form name='demande' onsubmit='valideRenommer();return false;'><?php echo $_SESSION["ws"]["dia"]["rename"]?>"
      +(proElement=="dossier"?" <?php echo $_SESSION["ws"]["dia"]["ofDir"]?> '<b>"+basename(nomElement)+"</b>' : ":" <?php echo $_SESSION["ws"]["dia"]["ofFile"]?> '<b>"+basename(nomElement)+"</b>' : ")
      +' <input type="text"   name="nomNouveau" value="'+nomFichier+'"  onkeyup="veriftout(this)"> '+(proElement=="dossier"?"":".")
      +' <input type="'+(proElement=="dossier"?"hidden":"text")+'"   name="extNouveau" value="'+typeElement+'" onkeyup="veriftout(this)" style="width:35px" >'
      +' <input type="hidden" name="nomElement" value="'+encodeURIComponent(nomElement)+'">'
      +' <input type="hidden" name="nomLien"    value="'+encodeURIComponent(lienElement)+'">'
      +' <input type="hidden" name="nomPro"     value="'+proElement+'">'
      +' <input type="hidden" name="nomSrv"     value="'+srvElement+'">',label,"valideRenommer");
  }

  // ==== Validation du renommage ====
  function valideRenommer() {
    verifspeccar(document.demande.nomNouveau);
    verifspeccar(document.demande.extNouveau);
    if (document.demande.nomNouveau.value.length!=0) {
       document.demande.nomNouveau.value=encodeURIComponent(document.demande.nomNouveau.value);
       req_async_datas("moteur/renommer.php",resultat,document.demande);
       if (proElement=="dossier") setTimeout("explorerServeur('"+actuelSrv+"')",2000);
       resultatModify("<div class='ec'><b> <img src='style/"+styleActif+"/images/loading.gif' alt=''> <?php echo $_SESSION["ws"]["dia"]["renaming"]?> </b></div>");
    }
  }

  // ==== Recherche un élément ====
  function rechercher(url,label) {
    demander("choix","<form name='demande' onsubmit='valideRechercher();return false;'> <?php echo $_SESSION["ws"]["dia"]["search"]?> <input type='text' name='nomElement'><input type='hidden' name='useCasse' value='0'> <?php echo $_SESSION["ws"]["dia"]["search2"]?> <input type='checkbox' name='casse' style='width:14px' onchange='if(casse.checked) document.demande.useCasse.value=1; else document.demande.useCasse.value=0;'> <?php echo $_SESSION["ws"]["dia"]["useCasse"]?> ",label,"valideRechercher");
    setTimeout("document.demande.nomElement.focus()", 300); 
  }
  // ==== Validation de la recherche ====
  function valideRechercher() {
    if (document.demande.nomElement.value.length!=0) {
      document.demande.nomElement.value=encodeURIComponent(document.demande.nomElement.value);
      req_async_datas("moteur/rechercher.php",afficheRecherche,document.demande);
      resultatModify("<div class='ec'><b> <img src='style/"+styleActif+"/images/loading.gif' alt=''> <?php echo $_SESSION["ws"]["dia"]["searching"]?> '<b>"+document.demande.nomElement.value+"</b>' <?php echo $_SESSION["ws"]["dia"]["searching2"]?> </b></div>");
    }
  }
  // ==== Affiche le résultat de la recherche ====
  function afficheRecherche() {
    if ((xmldata.readyState == 4) && (xmldata.status == 200)) {
      document.getElementById('frame_favoris').innerHTML="<div id='close_favoris'><img src='style/"+styleActif+"/images/fleche2.jpg' onclick='alternerFavoris(2)'></div><div id='resize_favoris' onmousedown='redimFavoris();'></div>"+xmldata.responseText;
      cacherDemande();
      alternerFavoris(1);
      
      // Charge les paramètres de contexte
      contentRech =""; num=0;
      while (document.getElementById("divInfoRech"+num)) {
        contentRech +=document.getElementById("divInfoRech"+num).innerHTML;
        retireElement(document.getElementById("divInfoRech"+num));
        num++;
      }
      document.getElementById('frame_favoris').innerHTML= nettoieUrl(document.getElementById('frame_favoris').innerHTML);

      if (eval( "typeof scriptInfoRech"+"" )!="undefined")
        retireElement(document.getElementById("scriptInfoRech"));
      var scriptFI  = document.createElement("script");
      scriptFI.type = "text/javascript";
      scriptFI.id = "scriptInfoRech";
      scriptFI.text = contentRech;
      document.getElementsByTagName("head")[0].appendChild(scriptFI);
      contentRech="";

    }
  }

  // ==== Récupère les favoris ====
  function recupFavoris() {
     req_asynca("moteur/favoris.php?view=1",afficheFavoris);
  }
  // ==== Affiche les favoris ====
  function afficheFavoris() {
    if ((xmlapp.readyState == 4) && (xmlapp.status == 200)) {
      document.getElementById('frame_favoris').innerHTML="<div id='close_favoris'><img src='style/"+styleActif+"/images/fleche2.jpg' onclick='alternerFavoris(2)'></div><div id='resize_favoris' onmousedown='redimFavoris();'></div>"+xmlapp.responseText;
      
      // Charge les paramètres de contexte
      contentRech =""; num=0;
      while (document.getElementById("divInfoRech"+num)) {
        contentRech +=document.getElementById("divInfoRech"+num).innerHTML;
        retireElement(document.getElementById("divInfoRech"+num));
        num++;
      }
      document.getElementById('frame_favoris').innerHTML= nettoieUrl(document.getElementById('frame_favoris').innerHTML);

      if (eval( "typeof scriptInfoRech"+"" )!="undefined")
        retireElement(document.getElementById("scriptInfoRech"));
      var scriptFI  = document.createElement("script");
      scriptFI.type = "text/javascript";
      scriptFI.id = "scriptInfoRech";
      scriptFI.text = contentRech;
      document.getElementsByTagName("head")[0].appendChild(scriptFI);
      contentRech="";

    }
  }
   

  // ==== Détermine le dossier/fichier à copier ====
  function copier(url,label) {
    clipboardMode="copy"; clipboardSrv=memoSrv; clipboardType=memoType;
    if (memoType=="arbo") clipboardType="dossier"; if (memoPro=="url") clipboardType="url"; if (memoPro=="dossier") clipboardType="dossier";
    clipboard=actuel+(actuel.substring(actuel.length-1,actuel.length)=='/'?'':'/')+memoNom+((clipboardType.length>0)?".":"")+clipboardType;
    if (clipboardType=='dossier') clipboard=memoLien;
      alerter("info",(clipboardType=='dossier'?" <?php echo $_SESSION["ws"]["dia"]["theDir"]?> '<b>"+basename(clipboard)+"</b>' ":" <?php echo $_SESSION["ws"]["dia"]["theFile"]?> '<b>"+basename(clipboard)+"</b>' ")
      +" <?php echo $_SESSION["ws"]["dia"]["goingToCopy"]?> ","");
      setTimeout("cacherAlerte();",3000);
  }

  // ==== Détermine le dossier/fichier à déplacer ====
  function couper(url,label) {
    clipboardMode="move"; clipboardSrv=memoSrv; clipboardType=memoType;
    if (memoType=="arbo") clipboardType="dossier"; if (memoPro=="url") clipboardType="url"; if (memoPro=="dossier") clipboardType="dossier";
    clipboard=actuel+(actuel.substring(actuel.length-1,actuel.length)=='/'?'':'/')+memoNom+((clipboardType.length>0)?".":"")+clipboardType;
    if (clipboardType=='dossier') clipboard=memoLien;
      alerter("info",(clipboardType=='dossier'?" <?php echo $_SESSION["ws"]["dia"]["theDir"]?> '<b>"+basename(clipboard)+"</b>' ":" <?php echo $_SESSION["ws"]["dia"]["theFile"]?> '<b>"+basename(clipboard)+"</b>' ")
      +" <?php echo $_SESSION["ws"]["dia"]["goingToMove"]?> ","");
      setTimeout("cacherAlerte();",3000);
  }

  // ==== Valide le déplacement ====
  function deplacer() {
    clipboardMode="move"; clipboardSrv=memoSrv; clipboardType=memoType;
    if (memoType=="arbo") clipboardType="dossier"; if (memoPro=="url") clipboardType="url"; if (memoPro=="dossier") clipboardType="dossier";
    clipboard=actuel+(actuel.substring(actuel.length-1,actuel.length)=='/'?'':'/')+memoNom+((clipboardType.length>0)?".":"")+clipboardType;
    clipboard=memoLien;
  }

  // ==== Détermine la destination de l'élément puis le copie/déplace ====
  function coller(url,label) {
    adr=actuel;
    demander("choix","<form name='demande' onsubmit='valideCopie();return false;'> <?php echo $_SESSION["ws"]["dia"]["areYouSure"]?> "+(clipboardMode=="move"?"<?php echo $_SESSION["ws"]["dia"]["moveTo"]?>":"<?php echo $_SESSION["ws"]["dia"]["copyTo"]?>")
      +(clipboardType=='dossier'?" <?php echo strtolower($_SESSION["ws"]["dia"]["theDir"])?> '<b>"+basename(clipboard)+"</b>' ":" <?php echo strtolower($_SESSION["ws"]["dia"]["theFile"])?> '<b>"+basename(clipboard)+"</b>'")+" <?php echo $_SESSION["ws"]["dia"]["toActualDir"]?> <b>'"+adr+"'</b> ? "
      +'<input type="hidden" name="objetDepart" value="'+encodeURIComponent(clipboard)+'"><input type="hidden" name="destination" value="'+encodeURIComponent(adr)+'">'+"<input type='hidden' name='clipboardMode' value='"+clipboardMode+"'><input type='hidden' name='clipboardSrv' value='"+clipboardSrv+"'><input type='hidden' name='clipboardType' value='"+clipboardType+"'>",label,"valideCopie");
  }

  // ==== Validation de la copie ou du déplacement d'un élément ====
  function valideCopie() {
    req_async_datas("moteur/coller.php",resultat,document.demande);
    document.getElementById('frame_demande').innerHTML="<div class='ec'><b> <img src='style/"+styleActif+"/images/loading.gif' alt=''> "+(clipboardMode=="move"?"<?php echo $_SESSION["ws"]["dia"]["moving"]?>":"<?php echo $_SESSION["ws"]["dia"]["copying"]?>")+" </b><span id='infoProgress'></span></div>";
    viewProgress();
    if (clipboardType=="dossier") setTimeout("explorerServeur('"+actuelSrv+"')",2000);
    clipboard=""; clipboardMode=""; clipboardType=""; clipboardSrv="";
  }


  // ==== Gestion des droits des fichiers : Récupération des droits actuels ====
  function autoriser(url,label) {

    lienElement=memoLien; srvElement=memoSrv; proElement=memoPro; memoLabel=label;
    typeElement=memoType; if (proElement=='url') typeElement='url';
    nomElement=memoNom+((typeElement.length>0)?".":"")+typeElement;

    if (nomElement.length!=0) req_async ("moteur/autoriser.php?nomElement="+encodeURIComponent(nomElement)
                          +"&infoDroit=1&nomLien="+encodeURIComponent(lienElement)
                         +"&nomSrv="+srvElement+"&nomPro="+proElement,afficheAutoriser);
  }
  // ==== Gestion des droits des fichiers : Modification par l'utilisateur ====
  function afficheAutoriser(label) {
    if ((xmlexp.readyState == 4) && (xmlexp.status == 200)) {
      droits=xmlexp.responseText; 
      demander("choix","<form name='demande' onsubmit='valideAutoriser();return false;'><?php echo $_SESSION["ws"]["dia"]["selectAttributes"]?> "
      +(typeElement=='dossier'?" <?php echo $_SESSION["ws"]["dia"]["ofDir"]?> <b>'":" <?php echo $_SESSION["ws"]["dia"]["ofFile"]?> <b>'")+basename(nomElement)+"'</b> :<br/><br/> "
      <?php if ($_SESSION["ws"]["typeUser"]=="1") { ?> +"<b><span class='ec'><img src='style/"+styleActif+"/images/et.<?php echo $_SESSION["ws"]["formatExt"]?>'> Propr.&nbsp;</b> <input type='checkbox' name='a1' value='400' style='width:14px' "+((droits & 0x0100)?"checked":"")+"><?php echo $_SESSION["ws"]["dia"]["modR"]?> <input type='checkbox' name='a2' value='200' style='width:14px' "+((droits & 0x0080)?"checked":"")+"><?php echo $_SESSION["ws"]["dia"]["modW"]?> <input type='checkbox' name='a3' value='100' style='width:14px' "+((droits & 0x0040)?"checked":"")+"><?php echo $_SESSION["ws"]["dia"]["modE"]?> </span>"+((effectAct!=1)?"":"<br />")
      <?php } else { ?>                   +"<span class='ec'><input type='hidden' name='a1' value='"+((droits & 0x0100)?"400":"0")+"'><input type='hidden' name='a2' value='"+((droits & 0x0080)?"200":"0")+"'><input type='hidden' name='a3' value='"+((droits & 0x0040)?"100":"0")+"'></span>" <?php } ?>
      <?php if ($_SESSION["ws"]["typeUser"]!="3") { ?> +"<b><span class='ec'><img src='style/"+styleActif+"/images/et.<?php echo $_SESSION["ws"]["formatExt"]?>'> Group &nbsp;</b> <input type='checkbox' name='a4' value='40'  style='width:14px' "+((droits & 0x0020)?"checked":"")+"><?php echo $_SESSION["ws"]["dia"]["modR"]?> <input type='checkbox' name='a5' value='20'  style='width:14px' "+((droits & 0x0010)?"checked":"")+"><?php echo $_SESSION["ws"]["dia"]["modW"]?> <input type='checkbox' name='a6' value='10'  style='width:14px' "+((droits & 0x0008)?"checked":"")+"><?php echo $_SESSION["ws"]["dia"]["modE"]?> </span>"+((effectAct!=1)?"":"<br />")
      <?php } else { ?>                   +"<span class='ec'><input type='hidden' name='a4' value='"+((droits & 0x0020)?"40":"0")+"'><input type='hidden' name='a5' value='"+((droits & 0x0010)?"20":"0")+"'><input type='hidden' name='a6' value='"+((droits & 0x0008)?"10":"0")+"'></span>" <?php } ?>
      <?php if ($_SESSION["ws"]["typeUser"]!="2") { ?> +"<b><span class='ec'><img src='style/"+styleActif+"/images/et.<?php echo $_SESSION["ws"]["formatExt"]?>'> Public&nbsp;</b> <input type='checkbox' name='a7' value='4'   style='width:14px' "+((droits & 0x0004)?"checked":"")+"><?php echo $_SESSION["ws"]["dia"]["modR"]?> <input type='checkbox' name='a8' value='2'   style='width:14px' "+((droits & 0x0002)?"checked":"")+"><?php echo $_SESSION["ws"]["dia"]["modW"]?> <input type='checkbox' name='a9' value='1'   style='width:14px' "+((droits & 0x0001)?"checked":"")+"><?php echo $_SESSION["ws"]["dia"]["modE"]?> </span>"+((effectAct!=1)?"":"<br />")+"&nbsp; "
      <?php } else { ?>                   +"<span class='ec'><input type='hidden' name='a7' value='"+((droits & 0x0004)?"4":"0")+"'><input type='hidden' name='a8' value='"+((droits & 0x0002)?"2":"0")+"'><input type='hidden' name='a9' value='"+((droits & 0x0001)?"1":"0")+"'></span>" <?php } ?>
      ,memoLabel,"valideAutoriser");
      if (dynWindow!=1) document.getElementById('frame_galerie').style.bottom=eval(hauteurInfos+70)+"px";
      if (dynWindow!=1) document.getElementById('frame_demande').style.height="60px";
    }
  }
  // ==== Validation de la modification des droits du fichier ====
  function valideAutoriser() {
    tabch=document.demande;
    valeur=
    <?php if ($_SESSION["ws"]["typeUser"]=="1") { ?>   (tabch.a1.checked?parseInt(tabch.a1.value):0)+(tabch.a2.checked?parseInt(tabch.a2.value):0)+(tabch.a3.checked?parseInt(tabch.a3.value):0)
    <?php } else { ?>   parseInt(tabch.a1.value)+parseInt(tabch.a2.value)+parseInt(tabch.a3.value) <?php } ?>
    <?php if ($_SESSION["ws"]["typeUser"]!="3") { ?>  +(tabch.a4.checked?parseInt(tabch.a4.value):0)+(tabch.a5.checked?parseInt(tabch.a5.value):0)+(tabch.a6.checked?parseInt(tabch.a6.value):0)
    <?php } else { ?>  +parseInt(tabch.a4.value)+parseInt(tabch.a5.value)+parseInt(tabch.a6.value) <?php } ?>
    <?php if ($_SESSION["ws"]["typeUser"]!="2") { ?>  +(tabch.a7.checked?parseInt(tabch.a7.value):0)+(tabch.a8.checked?parseInt(tabch.a8.value):0)+(tabch.a9.checked?parseInt(tabch.a9.value):0);
    <?php } else { ?>   parseInt(tabch.a7.value)+parseInt(tabch.a8.value)+parseInt(tabch.a9.value); <?php } ?>

    req_async_datas ("moteur/autoriser.php?nomElement="+encodeURIComponent(nomElement)+"&valeurDroit="+valeur
                    +"&nomSrv=" +srvElement+"&nomLien="+encodeURIComponent(lienElement)
                    +"&nomType="+typeElement+"&nomPro="+proElement,resultat,document.demande);
    document.getElementById('frame_demande').innerHTML="<div class='ec'><b> <img src='style/"+styleActif+"/images/loading.gif' alt=''> <?php echo $_SESSION["ws"]["dia"]["modifying"]?> </b></div>";
    if (dynWindow!=1) document.getElementById('frame_galerie').style.bottom=eval(hauteurInfos+40)+"px";
    if (dynWindow!=1) document.getElementById('frame_demande').style.height="30px";
  }

  // ==== Récupère le commentaire actuel du fichier sélectionné ====
  function commenter(url,label) {
    lienElement=memoLien; srvElement=memoSrv; proElement=memoPro; memoLabel=label;
    typeElement=memoType; if (proElement=='url') typeElement='url';
    nomElement=memoNom+((typeElement.length>0)?".":"")+typeElement;

    req_async("moteur/commenter.php?nomComment="+encodeURIComponent(nomElement)+"&memoType="+typeElement+"&memoSrv="+srvElement+"&memoPro="+proElement,afficheCommenter);
  }
  function commenterGlobal(label) {
    srvElement=memoSrv; proElement=memoPro; memoLabel=label;
    req_async("moteur/commenter.php?global=1&memoSrv="+srvElement+"&memoPro="+proElement,afficheCommenterGlobal);
  }
  // ==== Ajoute/modifie un commentaire sur un fichier/dossier ====
  function afficheCommenter() {
    if ((xmlexp.readyState == 4) && (xmlexp.status == 200)) {
      demander("choix","<form name='demande' onsubmit='valideCommenter();return false;'>"+ (xmlexp.responseText.length<2?"<?php echo $_SESSION["ws"]["dia"]["addComment"]?>":"<?php echo $_SESSION["ws"]["dia"]["modifyComment"]?>")
          +(typeElement=='dossier'?" <?php echo $_SESSION["ws"]["dia"]["toDir"]?> '<b>"+basename(nomElement)+"</b>'":" <?php echo $_SESSION["ws"]["dia"]["toFile"]?> '<b>"+basename(nomElement)+"</b>'")+" : "
          +"<textarea name='commentaire'>"+decodeURIComponent(xmlexp.responseText)+"</textarea><br/>"+'<input type="hidden" name="nomComment" value="'+encodeURIComponent(nomElement)+'">'+"<input type='hidden' name='memoType' value='"+typeElement+"'><input type='hidden' name='memoSrv' value='"+srvElement+"'>"
          +"<input type='checkbox' name='retire' value='1' onclick='if (this.checked===true) document.demande.commentaire.value=\"\"' style='width: 10px;'>"
          +" <?php echo $_SESSION["ws"]["dia"]["removeComment"]?> <input type='hidden' name='modif' value='1'><input type='hidden' name='memoPro' value='"+proElement+"'>",memoLabel,"valideCommenter");
      if (dynWindow!=1) document.getElementById('frame_galerie').style.bottom=eval(hauteurInfos+110)+"px";
      if (dynWindow!=1) document.getElementById('frame_demande').style.height="100px";
      setTimeout("document.demande.commentaire.focus()", 300);
    }
  }
  function afficheCommenterGlobal() {
    if ((xmlexp.readyState == 4) && (xmlexp.status == 200)) {
      demander("choix","<form name='demande' onsubmit='valideCommenter();return false;'>"+ (xmlexp.responseText.length<2?"<?php echo $_SESSION["ws"]["dia"]["addComment"]?>":"<?php echo $_SESSION["ws"]["dia"]["modifyComment"]?>")
          +" <?php echo $_SESSION["ws"]["dia"]["toDir"]?> : "
          +"<textarea name='commentaire'>"+decodeURIComponent(xmlexp.responseText)+"</textarea><br/>"+'<input type="hidden" name="nomComment" value="wsGlobal"><input type="hidden" name="global" value="1">'
          +"<input type='checkbox' name='retire' value='1' onclick='if (this.checked===true) document.demande.commentaire.value=\"\"' style='width: 10px;'>"
          +" <?php echo $_SESSION["ws"]["dia"]["removeComment"]?> <input type='hidden' name='modif' value='1'>",memoLabel,"valideCommenter");
      if (dynWindow!=1) document.getElementById('frame_galerie').style.bottom=eval(hauteurInfos+110)+"px";
      if (dynWindow!=1) document.getElementById('frame_demande').style.height="100px";
      setTimeout("document.demande.commentaire.focus()", 300);
    }
  }
  // ==== Valide l'ajout/la modification du commentaire ====
  function valideCommenter() {
    retirerMef(document.demande.commentaire);
    req_async_datas("moteur/commenter.php",resultat,document.demande);
    if (dynWindow!=1) document.getElementById('frame_demande').style.height="30px";
    document.getElementById('frame_demande').innerHTML="<div class='ec'><b> <img src='style/"+styleActif+"/images/loading.gif' alt=''> <?php echo $_SESSION["ws"]["dia"]["addingComment"]?> </b></div>";
  }

  // ==== Récupère le commentaire actuel du fichier sélectionné ====
  function montrerCommentaire(url) {
    lienElement=memoLien; srvElement=memoSrv; proElement=memoPro;
    typeElement=memoType; if (proElement=='url') typeElement='url';
    nomElement=memoNom+((typeElement.length>0)?".":"")+typeElement;
    req_async("moteur/commenter.php?recup=1&nomComment="+encodeURIComponent(nomElement)+"&memoType="+typeElement+"&memoSrv="+srvElement+"&memoPro="+proElement,afficheCommentaire);
  }
  // ==== Ajoute/modifie un commentaire sur un fichier/dossier ====
  function afficheCommentaire() {
    if ((xmlexp.readyState == 4) && (xmlexp.status == 200)) {
      document.getElementById('frame_demande').innerHTML="<?php echo $_SESSION["ws"]["dia"]["commentFile"]?> <b>'"+nettoieUrl(basename(nomElement))+"'</b> : "
      +"<img src='style/"+styleActif+"/images/ok.<?php echo $_SESSION["ws"]["formatExt"]?>' onclick=\"cacherDemande();\"></b></div><br/><br/><div class='cadrcom' style='height:50px;z-index:0; overflow-y: scroll;'>"+decodeURIComponent(xmlexp.responseText)+"</div>";
      if (dynWindow!=1) document.getElementById('frame_galerie').style.bottom=eval(hauteurInfos+110)+"px";
      if (dynWindow!=1) document.getElementById('frame_demande').style.height="100px";
      cycle=0; prog=10; pas=100/prog; alpha=0; fonduDemande();
    }
  }

  // ==== Actualise la miniature ====
  function actualiseMini(nomElement) {
     req_async("moteur/pic.php?mini=1&update=1&pic="+encodeURIComponent(nomElement),rechargeMini);
  }

  // ==== Recharge la miniature ====
  function rechargeMini() {
    if ((xmlexp.readyState == 4) && (xmlexp.status == 200)) {
      actualiser();
    }
  }
  
  // ==== Effectue une modification sur l'image ====
  function modifierImage(valeur,label) {
    numimg=parseInt(document.formlisteimg.numimg.value);
    document.formlisteimg.numimg.value=numimg;
    if (document.getElementsByName('listeimg').length==1)
         nomimg=document.formlisteimg.listeimg.value;
    else nomimg=document.formlisteimg.listeimg[numimg].value;
  
     if (valeur!=6)
         req_async("moteur/pic.php?mini=1&update=1&modif="+valeur+"&pic="+nomimg,valideMini);
     else 
         demander("choix","<form name='demande' onsubmit='valideRedim();return false;'><?php echo $_SESSION["ws"]["dia"]["resize"]?> : "
      +"<?php echo $_SESSION["ws"]["dia"]["width"]?> <input type='text'   name='v' value='' style='width:35px' onchange='verifRatio(1)'> <?php echo $_SESSION["ws"]["dia"]["pixels"]?> x "
      +"<?php echo $_SESSION["ws"]["dia"]["height"]?> <input type='text'   name='h' value='' style='width:35px' onchange='verifRatio(2)'> <?php echo $_SESSION["ws"]["dia"]["pixels"]?>. "
      +" <input type='checkbox' name='ratio' value='1' style='width:14px'> <?php echo $_SESSION["ws"]["dia"]["keepRatio"]?> ",label,"valideRedim");
  }

  // Vérifie le respect du ratio
  function verifRatio(num) {
    if (document.demande.ratio.checked) {
      if ((num==1)&&(document.demande.h.value.length!=0)) document.demande.h.value=""; 
      if ((num==2)&&(document.demande.v.value.length!=0)) document.demande.v.value=""; 
    }
  }
  
  // ==== Valide le redimensionnement de la miniature ====
  function valideRedim() {
    numimg=parseInt(document.formlisteimg.numimg.value);
    document.formlisteimg.numimg.value=numimg;
    if (document.getElementsByName('listeimg').length==1)
         nomimg=document.formlisteimg.listeimg.value;
    else nomimg=document.formlisteimg.listeimg[numimg].value;
    h= document.demande.h.value; v= document.demande.v.value;
    ratio =(document.demande.ratio.checked?1:0);    

    req_async("moteur/pic.php?mini=1&update=1&modif=6&h="+h+"&v="+v+"&ratio="+ratio+"&pic="+nomimg,valideMini);
    cacherDemande();  
  }
    
  // ==== Valide l'actualisation de la miniature ====
  function valideMini() {
    if ((xmlexp.readyState == 4) && (xmlexp.status == 200)) {
      numimg=parseInt(document.formlisteimg.numimg.value);
      document.formlisteimg.numimg.value=numimg;
      if (document.getElementsByName('listeimg').length==1)
           nomimg=document.formlisteimg.listeimg.value;
      else nomimg=document.formlisteimg.listeimg[numimg].value;
    
      dj = new Date();
      actual = dj.getMinutes()+dj.getSeconds();
      document.getElementById('cadrpic').innerHTML="<img src="+'"'+"moteur/pic.php?actual="+actual+"&pic="+encodeURIComponent(nomimg)+'"'+" id='visuImg' name='visuImg' class='moveImg' style='position:absolute;<?php echo $filtre; ?>' border='0'  onload='centrer(1); startFonduImage(); hideLoading();'>";
      req_asyncp ("moteur/exif.php?url="+encodeURIComponent(nomimg),afficherExif);
      actualiser();
    }
  }

  // ==== Ajouter au/Retirer des favoris====
  function ajouterFav(numAct,url,label) {

    lienElement=memoLien; srvElement=memoSrv; proElement=memoPro;
    typeElement=memoType; if (proElement=='url') typeElement='url';
    nomElement=memoNom+((typeElement.length>0)?".":"")+typeElement;
    req_async("moteur/favoris.php?numAct="+numAct+"&nomElement="+encodeURIComponent(nomElement),valideFav);
  }

  // ==== Ajoute des favoris====
  function deposerFav() {

    lienElement=memoLien; srvElement=memoSrv; proElement=memoPro;
    typeElement=memoType; if (proElement=='url') typeElement='url';
    nomElement=memoNom+((typeElement.length>0)?".":"")+typeElement;

    req_async("moteur/favoris.php?numAct=1&nomElement="+encodeURIComponent(nomElement),valideFav);
  }
  
  // ==== Valide l'ajout aux favoris====
  function valideFav() {
    if ((xmlexp.readyState == 4) && (xmlexp.status == 200)) {
      cycle=0; prog=10; pas=100/prog; alpha=0; fonduDemande();
      document.getElementById('frame_demande').innerHTML="<div class='ec'><b>"+xmlexp.responseText+" <img src='style/"+styleActif+"/images/ok.<?php echo $_SESSION["ws"]["formatExt"]?>' onclick=\"cacherDemande();\"></b></div>";
      dispinvite= setTimeout("cacherAlerte()",3000);
      recupFavoris();
      actualiser();
    }
  }
  
  
  // ==== Marquer fichier en cours d'utilisation====
  function bloquerModif(numAct,url,label) {
    lienElement=memoLien; srvElement=memoSrv; proElement=memoPro;
    typeElement=memoType; if (proElement=='url') typeElement='url';
    nomElement=memoNom+((typeElement.length>0)?".":"")+typeElement;
    req_async("moteur/bloquer.php?numAct="+numAct+"&nomElement="+encodeURIComponent(nomElement),valideBlocage);
  }

  // ==== Valide le blocage du fichier ====
  function valideBlocage() {
    if ((xmlexp.readyState == 4) && (xmlexp.status == 200)) {
      cycle=0; prog=10; pas=100/prog; alpha=0; fonduDemande();
      document.getElementById('frame_demande').innerHTML="<div class='ec'><b>"+xmlexp.responseText+" <img src='style/"+styleActif+"/images/ok.<?php echo $_SESSION["ws"]["formatExt"]?>' onclick=\"cacherDemande();\"></b></div>";
      dispinvite= setTimeout("cacherAlerte()",3000);
      actualiser();
    }
  }

  // ==== Ajoute un fond d'écran ====
  function fondEcran(fond) {
      req_async("moteur/crea_fond.php?nomElement="+encodeURIComponent(fond),valideFond);
  }
  // ==== Valide l'ajout du fond d'écran ====
  function valideFond() {
    if ((xmlexp.readyState == 4) && (xmlexp.status == 200)) {
      cycle=0; prog=10; pas=100/prog; alpha=0; fonduDemande();
      document.getElementById('frame_demande').innerHTML="<div class='ec'><b>"+xmlexp.responseText+" <img src='style/"+styleActif+"/images/ok.<?php echo $_SESSION["ws"]["formatExt"]?>' onclick=\"document.getElementById('frame_demande').style.visibility='hidden';\"></b></div>";
      dispinvite= setTimeout("cacherAlerte()",3000);
      actualiser();
    }
  }  
  
  // ==== Affiche les préférences d'un utilisateur ====
  function affichePref(label) {
    document.getElementById("fenetre").style.height="460px";
    demander("choix","<form name='demande' onsubmit='modifyPref();return false;'><table style='width:100%'> "

      +"<tr><td colspan='2' style='text-align:center'><?php echo $_SESSION["ws"]["dia"]["connected"];?>"
      +"  <input name='idUser' type='hidden' value='<?php echo $_SESSION["ws"]["idUser"];?>'> "
      +"  <input name='nomUser' type='hidden' value="+'"<?php echo $_SESSION["ws"]["nomUser"];?>"'+"> "
      +"  <input name='accUser' type='hidden' value="+'"<?php echo $_SESSION["ws"]["accUser"];?>"'+"> "
      +" : <b><?php echo $_SESSION["ws"]["nomUser"];?></b> (<?php echo $_SESSION["ws"]["labelTypeUser"];?>)"

    <?php if ($_SESSION["ws"]["publicUser"] != "on") { ?>
      +"<tr><td><?php echo $_SESSION["ws"]["dia"]["email"];?></td><td>"
      +"  <input name='mailUser' type='text' value='<?php echo $_SESSION["ws"]["mailUser"];?>' style='width:140px'></td></tr>"
      +"<tr><td><div id='alertEmptyLog' style='float:right'></div><?php echo $_SESSION["ws"]["dia"]["login"];?></td><td>"
      +"  <input name='logUser' type='text' value='<?php echo $_SESSION["ws"]["logUser"];?>' style='width:140px' onchange='verifLogPass()'></td></tr>"
      +"<tr><td><div id='alertEmptyPass' style='float:right'></div><?php echo $_SESSION["ws"]["dia"]["passwd"];?></td><td>"
      +"  <input name='passUser' type='password' value='<?php echo $_SESSION["ws"]["passUser"];?>' style='width:140px' onchange='verifLogPass()'></td></tr>"
    <?php } else { ?>
      +"<tr><td colspan='2' style='text-align:center'><?php echo $_SESSION["ws"]["dia"]["publicWS"];?></td></tr>"
    <?php } ?>

      +"<tr><td><?php echo $_SESSION["ws"]["dia"]["lang"];?> :</td><td>"
      +" <select name='langUser' size='1' class='elmInput'>"
      +" <option value='Auto'>Auto</option>"
      +"   <?php $handle = opendir("../lang/");
             while (false !== ($entry = readdir($handle))) {
               if (strstr($entry,".lang")!==false) {
                 $nomlang = substr($entry,0,strpos($entry,"."));
                 $_REQUEST["name"]=1; include "../lang/$entry"; $_REQUEST["name"]=0;
                 echo "<option value='$nomlang' ".(($nomlang==$_SESSION["ws"]["langUser"])?"selected":"").">$nameLanguage</option>";
               }
             }
             closedir($handle); ?> </select></td></tr>"

      +"<tr><td><?php echo $_SESSION["ws"]["dia"]["defStyle"];?> :</td><td>"
      +"  <select name='styleUser' size='1' class='elmInput'>"
      +"    <?php $handle = opendir("../style/");
              while (false !== ($entry = readdir($handle))) {
                if (strstr($entry,".css")!==false) { $nomcss = substr($entry,0,-4);
                  echo "<option value='$nomcss' \"+(styleActif=='$nomcss'?'selected':'')+\">$nomcss</option>"; } }
              closedir($handle); ?></select></td></tr>"

      +"<tr><td><?php echo $_SESSION["ws"]["dia"]["leftPanel"];?></td><td>"
      +"  <select name='arboUser' size='1' class='elmInput'>"
      +"    <option value='0' "+(eval(arboUser)==0?"selected":"")+"><?php echo $_SESSION["ws"]["dia"]["arbo"];?></option>"
      +"    <option value='1' "+(eval(arboUser)==1?"selected":"")+"><?php echo $_SESSION["ws"]["dia"]["favoris"];?></option>"
      +"    <option value='3' "+(eval(arboUser)==3?"selected":"")+"><?php echo $_SESSION["ws"]["dia"]["all"];?></option>"
      +"    <option value='2' "+(eval(arboUser)==2?"selected":"")+"><?php echo $_SESSION["ws"]["dia"]["none"];?></option>"
      +"  </select></td></tr>"

      +"<tr><td><?php echo $_SESSION["ws"]["dia"]["visualis"];?></td><td>"
      +"  <select name='visuUser' size='1' class='elmInput'>"
      +"    <option value='miniatures' "+(typeActif=="miniatures"?"selected":"")+"><?php echo $_SESSION["ws"]["dia"]["miniature"];?></option>"
      +"    <option value='grandes' "+(typeActif=="grandes"?"selected":"")+"><?php echo $_SESSION["ws"]["dia"]["bigIcone"];?></option>"
      +"    <option value='liste' "+(typeActif=="liste"?"selected":"")+"><?php echo $_SESSION["ws"]["dia"]["liste"];?></option>"
      +"    <option value='details' "+(typeActif=="details"?"selected":"")+"><?php echo $_SESSION["ws"]["dia"]["details"];?></option>"
      +"  </select></td></tr>"
      
      +"<tr><td><?php echo $_SESSION["ws"]["dia"]["webSort"];?></td><td>"
      +"  <select name='triUser' size='1' class='elmInput'>"
      +"    <option value='fichier' "+(triActif=="fichier"?"selected":"")+"><?php echo $_SESSION["ws"]["dia"]["byName"];?></option>"
      +"    <option value='valeur' "+(triActif=="valeur"?"selected":"")+"><?php echo $_SESSION["ws"]["dia"]["byValue"];?></option>"
      +"    <option value='extension' "+(triActif=="extension"?"selected":"")+"><?php echo $_SESSION["ws"]["dia"]["byType"];?></option>"
      +"    <option value='taille' "+(triActif=="taille"?"selected":"")+"><?php echo $_SESSION["ws"]["dia"]["bySize"];?></option>"
      +"    <option value='modiftri' "+(triActif=="modiftri"?"selected":"")+"><?php echo $_SESSION["ws"]["dia"]["byDate"];?></option>"
      +"  </select></td></tr>"
      
      +"<tr><td><?php echo $_SESSION["ws"]["dia"]["webDir"];?></td><td>"
      +"  <select name='webUser' size='1' class='elmInput'>"
      +"    <option value='0'><?php echo $_SESSION["ws"]["dia"]["default"];?></option>"
      +"    <option value='1' selected><?php echo $_SESSION["ws"]["dia"]["explore"];?></option>"
      +"  </select></td></tr>"

      +" </table>&nbsp;&nbsp;",label,"modifyPref");

    <?php if ($_SESSION["ws"]["publicUser"] != "on") { ?>
      setTimeout("document.demande.mailUser.focus()", 300);
    <?php } ?>
    verifLogPass();
  }
  
  // ==== Vérifie le contenu des cases login et password ====
  function verifLogPass() {
      dontClose=0;
      document.getElementById('alertEmptyLog').innerHTML="";
      document.getElementById('alertEmptyPass').innerHTML="";
      if (document.demande.logUser.value.length==0)  { dontClose=1; document.getElementById('alertEmptyLog').innerHTML="<img src='style/"+styleActif+"/images/panneau.<?php echo $_SESSION["ws"]["formatExt"]?>' alt=''>"; }
      if (document.demande.passUser.value.length==0) { dontClose=1; document.getElementById('alertEmptyPass').innerHTML="<img src='style/"+styleActif+"/images/panneau.<?php echo $_SESSION["ws"]["formatExt"]?>' alt=''>"; }
  }
  
  // ==== Modifie les préférences d'un utilisateur ====
  function modifyPref() {
    if ((document.demande.logUser.value.length!=0)&&((document.demande.passUser.value.length!=0))) {
      document.demande.mailUser.value=encodeURIComponent(document.demande.mailUser.value);
      document.demande.logUser.value =encodeURIComponent(document.demande.logUser.value);
      document.demande.passUser.value=encodeURIComponent(document.demande.passUser.value);
      req_async_datas("moteur/modify_pref.php",resultatInfos,document.demande);
      resultatModify("<div class='cadre'><b> <img src='style/"+styleActif+"/images/loading.gif' alt=''> <?php echo $_SESSION["ws"]["dia"]["modifyingPrefs"]?> </b></div>");
    } else {
      return false;
    }
  }


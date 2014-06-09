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
// Fonction : Gestion des menus et elements graphiques
// Nom      : interface.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
include_once "auth.php";
include_once "fonctions.php";
$l_mysql = new class_mysql();
$l_mysql->connect();
?>

  // ==== Prechargement des images utilisees frequemment ====
  function precharger() {
    icon[0] = new Image(); icon[0].src = "style/"+styleActif+"/images/plus.<?php echo $_SESSION["ws"]["formatExt"]?>";
    icon[1] = new Image(); icon[1].src = "style/"+styleActif+"/images/moins.<?php echo $_SESSION["ws"]["formatExt"]?>";
    icon[2] = new Image(); icon[2].src = "style/"+styleActif+"/images/fondvide.<?php echo $_SESSION["ws"]["formatExt"]?>";
  }

  // ==== Construction de la barre de menus ====
  function initialiser() {
    document.getElementById("charge").innerHTML="<b><img src='style/"+styleActif+"/images/loading.gif' alt=''>&nbsp;<?php echo $_SESSION["ws"]["dia"]["loading"]?>&nbsp;&nbsp;</b>";
    document.getElementById("close_arbre").innerHTML="<img src='style/"+styleActif+"/images/fleche.jpg' onclick='alternerArbo(2)'  title='<?php echo $_SESSION["ws"]["dia"]["closePanel"]?>'>";
    document.getElementById("close_favoris").innerHTML="<img src='style/"+styleActif+"/images/fleche2.jpg' onclick='alternerFavoris(2)' title='<?php echo $_SESSION["ws"]["dia"]["closePanel"]?>'>";
    document.getElementById('frame_galerie').style.overflow="auto";
    document.getElementById('context_box').style.display="none";
    hauteurInfos= document.getElementById("frame_infos").offsetHeight;
    
    document.getElementById('frame_dossier').style.bottom=eval(hauteurInfos)+'px';
    document.getElementById('frame_favoris').style.bottom=eval(hauteurInfos)+'px';
    document.getElementById('frame_galerie').style.bottom=eval(hauteurInfos)+'px';
    

    if (effectAct==1) showSlide(); else {
      document.getElementById('frame_adresse').style.top="0px";
      document.getElementById('frame_infos').style.bottom="0px";
    }
    
    tmpArbo= arboUser; arboUser=-1;
    if (<?php echo ($_SESSION["ws"]["vClock"]=="1"?"1":"0"); ?>=="1") {
      horloge();
    } else document.getElementById('horloge').style.visibility ="hidden";
    setInterval("req_async_session()",600000);

    explorer();
    createWindow();
    menuGeneral();
    context_load();
    
    if (effectAct==1) {
      setTimeout("alterner("+tmpArbo+");",590);
      setTimeout("naviguer('');",1590);
    } else {
      alterner(tmpArbo);
      naviguer('');
    }
  }

  // ==== Affiche la barre de détails ====
  function initDetails() {
      if (striActif=="asc") flsens="bloc_asc"; else flsens="bloc_desc";
      fl1="vide"; fl2="vide"; fl3="vide"; fl4="vide";
      if (triActif=="fichier")   fl1=flsens;
      if (triActif=="taille")    fl2=flsens;
      if (triActif=="extension") fl3=flsens;
      if (triActif=="modiftri")  fl4=flsens;

      if (affichage=="xslStyle5") {
        document.getElementById("frame_galerie").style.top="56px";
        document.getElementById("headerParams").style.display="block";
      } else {
        document.getElementById("frame_galerie").style.top="36px";
        document.getElementById("headerParams").style.display="none";
      }
    
      document.getElementById("headerParams").innerHTML=''
        +'<div class="caseimg"><u></u></div>'
        +'<div class="nom onglet" onclick="changeTriListe('+"'fichier'"+')"><img src="<?php echo $_SESSION["ws"]["cheminImg"]?>'+fl1+'.<?php echo $_SESSION["ws"]["formatExt"]?>" class="blocAscDesc"/><img width="2" height="18" src="<?php echo $_SESSION["ws"]["cheminImg"]?>vide.<?php echo $_SESSION["ws"]["formatExt"]?>" title="" /><b> <?php echo $_SESSION["ws"]["dia"]["name"]?> </b></div>'
        +'<div class="apercucmt onglet"><img width="2" height="18" src="<?php echo $_SESSION["ws"]["cheminImg"]?>lh_divider.<?php echo $_SESSION["ws"]["formatExt"]?>" title="" class="depDivider"/><b> <?php echo $_SESSION["ws"]["dia"]["comment"]?> </b></div>'
        +'<div class="taille onglet" onclick="changeTriListe('+"'taille'"+')"><img src="<?php echo $_SESSION["ws"]["cheminImg"]?>'+fl2+'.<?php echo $_SESSION["ws"]["formatExt"]?>" class="blocAscDesc"/><img width="2" height="18" src="<?php echo $_SESSION["ws"]["cheminImg"]?>lh_divider.<?php echo $_SESSION["ws"]["formatExt"]?>" title="" class="depDivider"/> <?php echo $_SESSION["ws"]["dia"]["FileSize"]?> </div>'
        +'<div class="extension onglet" style="text-align: left;" onclick="changeTriListe('+"'extension'"+')"><img src="<?php echo $_SESSION["ws"]["cheminImg"]?>'+fl3+'.<?php echo $_SESSION["ws"]["formatExt"]?>" class="blocAscDesc"/><img width="2" height="18" src="<?php echo $_SESSION["ws"]["cheminImg"]?>lh_divider.<?php echo $_SESSION["ws"]["formatExt"]?>" title="" class="depDivider"/> <?php echo $_SESSION["ws"]["dia"]["exttype"]?> </div>'
        +'<div class="datemodif onglet" style="font-size:11px;text-align: left;" onclick="changeTriListe('+"'modiftri'"+')"><img src="<?php echo $_SESSION["ws"]["cheminImg"]?>'+fl4+'.<?php echo $_SESSION["ws"]["formatExt"]?>" class="blocAscDesc"/><img width="2" height="18" src="<?php echo $_SESSION["ws"]["cheminImg"]?>lh_divider.<?php echo $_SESSION["ws"]["formatExt"]?>" title="" class="depDivider"/> <?php echo $_SESSION["ws"]["dia"]["DateTimeOriginal"]?> </div>';
  }

  function alternerArbo(num) {
    if (num==2) { if ((arboUser==1)||(arboUser==3)) alterner(3); else alterner(0); }
  }
  
  function alternerFavoris(num) {
    if (num==1) { if ((arboUser==0)||(arboUser==3)) alterner(3); else alterner(1); }
    if (num==2) { if ((arboUser==0)||(arboUser==3)) alterner(0); else alterner(2); }
  }
  
  // ==== Alterne les diffèrents modes d'affichage du volet d'exploration ====
  function alterner(num) {
    if (arboUser==num) return true;
    document.getElementById("frame_dossier").style.zIndex ="1";
    document.getElementById("frame_favoris").style.zIndex ="1";
    
    // Mode Arborescence
    if (num==0) {
      document.getElementById("arborescence").style.display="block";
      document.getElementById("frame_content").style.left  =eval(pourcent)+"%";
      document.getElementById("frame_file").style.left     =eval(pourcent)+"%";
      document.getElementById("frame_detail").style.left   =eval(pourcent)+"%";
      document.getElementById("frame_content").style.width =eval(100-pourcent)+"%";
      document.getElementById("frame_file").style.width    =eval(100-pourcent)+"%";
      document.getElementById("frame_detail").style.width  =eval(100-pourcent)+"%";

      if (effectAct==1) {
        if ((arboUser!=0)&&(arboUser!=3)) showPanel(-pourcent);
        if ((arboUser==1)||(arboUser==3)) hidePanelFav(pourcentFav);
      } else {
        document.getElementById('frame_dossier').style.display='block';
        document.getElementById("frame_dossier").style.zIndex ="0";
        document.getElementById("frame_dossier").style.width  =eval(pourcent)+"%";
        document.getElementById("frame_favoris").style.display="none";
      }
    }
    // Mode Favoris
    if (num==1) {
      recupFavoris();
      document.getElementById("frame_content").style.left  ="0%";
      document.getElementById("frame_file").style.left     ="0%";
      document.getElementById("frame_detail").style.left   ="0%";
      document.getElementById("frame_content").style.width =eval(pourcentFav)+"%";
      document.getElementById("frame_file").style.width    =eval(pourcentFav)+"%";
      document.getElementById("frame_detail").style.width  =eval(pourcentFav)+"%";

      if (effectAct==1) {
        if ((arboUser!=1)&&(arboUser!=3)) showPanelFav(100);
        if ((arboUser==0)||(arboUser==3)) hidePanel(0);
      } else {
        document.getElementById('frame_favoris').style.display='block';
        document.getElementById("frame_favoris").style.zIndex ="0";
        document.getElementById("frame_favoris").style.left   =eval(pourcentFav)+"%";
        document.getElementById("frame_favoris").style.width  =eval(100-pourcentFav)+"%";
        document.getElementById('frame_dossier').style.display='none';
      }
    }
    // Mode Rien
    if (num==2) {
      document.getElementById('arborescence').style.display ='none';
      document.getElementById("frame_content").style.left   ="0%";
      document.getElementById("frame_file").style.left      ="0%";
      document.getElementById("frame_detail").style.left    ="0%";
      document.getElementById("frame_content").style.width  ="100%";
      document.getElementById("frame_file").style.width     ="100%";
      document.getElementById("frame_detail").style.width   ="100%";

      if (effectAct==1) {
        if ((arboUser==1)||(arboUser==3)) hidePanelFav(pourcentFav);
        if ((arboUser==0)||(arboUser==3)) hidePanel(0);
      } else {
        document.getElementById('frame_dossier').style.display='none';
        document.getElementById('frame_favoris').style.display='none';
      }
    }
    // Mode Arbo et Favoris
    if (num==3) {
      recupFavoris();
      document.getElementById('arborescence').style.display ='block';
      document.getElementById("frame_content").style.left  =eval(pourcent)+"%";
      document.getElementById("frame_file").style.left     =eval(pourcent)+"%";
      document.getElementById("frame_detail").style.left   =eval(pourcent)+"%";
      document.getElementById("frame_content").style.width =eval(pourcentFav-pourcent)+"%";
      document.getElementById("frame_file").style.width    =eval(pourcentFav-pourcent)+"%";
      document.getElementById("frame_detail").style.width  =eval(pourcentFav-pourcent)+"%";

      if (effectAct==1) {
        if ((arboUser!=1)&&(arboUser!=3)) showPanelFav(100);
        if ((arboUser!=0)&&(arboUser!=3)) showPanel(-pourcent);
      } else {
        document.getElementById("frame_dossier").style.left  ="0";
        document.getElementById('frame_dossier').style.display='block';
        document.getElementById("frame_dossier").style.zIndex ="0";
        document.getElementById("frame_dossier").style.width  =eval(pourcent)+"%";
        document.getElementById("frame_favoris").style.zIndex ="0";
        document.getElementById('frame_favoris').style.display='block';
        document.getElementById("frame_favoris").style.left  =eval(pourcentFav)+"%";
        document.getElementById("frame_favoris").style.width =eval(100-pourcentFav)+"%";
      }
    }

    document.getElementById('close_arbre').innerHTML  ="<img src='style/"+styleActif+"/images/fleche.jpg'  onclick='alternerArbo(2)' title='<?php echo $_SESSION["ws"]["dia"]["closePanel"]?>'>";
    document.getElementById('close_favoris').innerHTML="<img src='style/"+styleActif+"/images/fleche2.jpg' onclick='alternerFavoris(2)' title='<?php echo $_SESSION["ws"]["dia"]["closePanel"]?>'>";
    num=eval(num);
    switch (num) {
      case 0: vueActif="<?php echo $_SESSION["ws"]["dia"]["arbo"]?>"; break;
      case 1: vueActif="<?php echo $_SESSION["ws"]["dia"]["favoris"]?>"; break;
      case 2: vueActif="<?php echo $_SESSION["ws"]["dia"]["none"]?>"; break;
      case 3: vueActif="<?php echo $_SESSION["ws"]["dia"]["all"]?>"; break;
    }
    arboUser= num;
  }

  // ==== Fait apparaitre les éléments ====
  function showSlide() {
    defHaut+=2;
    document.getElementById('frame_infos').style.bottom=eval(defHaut)+"px";
    document.getElementById('frame_adresse').style.top =eval(defHaut)+"px";
    if (defHaut<0) setTimeout("showSlide()"  ,10);
  }

  // ==== Fait disparaitre les éléments ====
  function hideSlide() {
    defHaut-=2;
    document.getElementById('frame_infos').style.bottom=eval(defHaut)+"px";
    document.getElementById('frame_adresse').style.top =eval(defHaut)+"px";
    if (defHaut>-30) setTimeout("hideSlide()"  ,10);
  }

  // ==== Fait apparaitre le panneau de gauche ====
  function showPanel(pl) {
    pl+=1;
    document.getElementById('frame_dossier').style.display="block";
    document.getElementById('frame_dossier').style.left=eval(pl)+"%";
    if (pl<0) setTimeout("showPanel("+pl+")",10);
      else { document.getElementById('frame_dossier').style.left="0";
             document.getElementById("frame_dossier").style.zIndex ="0"; }
  }

  // ==== Fait apparaitre le panneau de droite ====
  function showPanelFav(pl) {
    pl-=1;
    document.getElementById('frame_favoris').style.display="block";
    document.getElementById('frame_favoris').style.left=eval(pl)+"%";
    if (pl>=pourcentFav) setTimeout("showPanelFav("+pl+")",10);
      else { document.getElementById('frame_favoris').style.left=eval(pourcentFav)+"%";
             document.getElementById("frame_favoris").style.zIndex ="0"; }
  }
  
  // ==== Fait disparaitre le panneau de gauche ====
  function hidePanel(pl) {
    pl-=1;
    document.getElementById('frame_dossier').style.left=eval(pl)+"%";
    if (pl>-pourcent) setTimeout("hidePanel("+pl+")",10);
         else document.getElementById('frame_dossier').style.display="none";
  }

  // ==== Fait disparaitre le panneau de droite ====
  function hidePanelFav(pl) {
    pl+=1;
    document.getElementById('frame_favoris').style.left=eval(pl)+"%";
    if (pl<=100) setTimeout("hidePanelFav("+pl+")",10);
         else document.getElementById('frame_favoris').style.display="none";
  }
  
  // ==== Construction du menu general ====
  function menuGeneral() {
    document.getElementById("util").innerHTML= menu_general;
  }

  // ==== Construction du menu images ====
  function menuImage() {
    document.getElementById("tools").innerHTML= menu_images;
  }

  // ==== Construction du menu divers ====
  function menuLiens() {
    pageConsult=0;
    document.getElementById("tools").innerHTML= menu_liens;
  }

  // ==== Construction du menu divers ====
  function menuDivers() {
    document.getElementById("tools").innerHTML= menu_divers;
  }

  // ==== Construction du menu edition ====
  function menuEditer() {
    document.getElementById('infotitre').innerHTML="<span><img src='style/"+styleActif+"/images/edit.<?php echo $_SESSION["ws"]["formatExt"]?>'> &nbsp;<?php echo $_SESSION["ws"]["dia"]["fileEditing"]?> &nbsp;"+affichUrl(memoLien)+"&nbsp;"
    +((memoPerm=="R")||(memoPerm=="N")?"<img src='style/"+styleActif+"/images/verrou1.<?php echo $_SESSION["ws"]["formatExt"]?>'>":"")+"</span>";
    document.getElementById("tools").innerHTML= menu_editer;
  }

  // ==== Construction du menu web ====
  function menuWeb() {
    document.getElementById("tools").innerHTML= menu_web;
  }


  // ==== Construction du menu vide ====
  function menuVide() {
    document.getElementById("tools").innerHTML= menu_vide;
  }

  // ==== Affichage/masquage du contenu d'un dossier dans l'arbre ====
  function devoile(idDiv,idImg,idNum) {

   if (idNum==0) {
    if (document.getElementById(idDiv)) {
       pdiv = document.getElementById(idDiv).className;
       if (pdiv == 'masque') { document.getElementById(idDiv).className= 'montre'; }
                        else { document.getElementById(idDiv).className= 'masque'; }
       if (eval(document.getElementById(idImg)))
           eval(document.getElementById(idImg)).src="style/"+styleActif+"/images/"+((pdiv=='masque')?"moins":"plus")+".<?php echo $_SESSION["ws"]["formatExt"]?>";
    }
   } else {
    if (document.getElementById(idDiv)) {
       pdiv = document.getElementById(idDiv).className;
       document.getElementById(idDiv).className= 'montre';
       if (eval(document.getElementById(idImg)))
           eval(document.getElementById(idImg)).src="style/"+styleActif+"/images/moins.<?php echo $_SESSION["ws"]["formatExt"]?>";
    }
   }
  }

  // ==== Affiche la visualisation d'une image ou du contenu d'un fichier ====
  function montrer(texte) {
    showFile=1;
    if (document.getElementById('viewCom')) document.getElementById('viewCom').style.visibility="hidden";
    if (document.getElementById('zipbox'))  document.getElementById('zipbox').style.visibility="hidden";
    document.getElementById('frame_demande').style.visibility="hidden";

    document.getElementById('frame_file').style.visibility="visible";
    document.getElementById('file').style.visibility="visible";
    document.getElementById('frame_detail').style.overflow="auto";
    document.getElementById('frame_detail').style.visibility="visible";
    document.getElementById('resize_content').style.display = 'block';
    document.getElementById('infotitre').style.display = 'block';
    document.getElementById('infotitre').innerHTML = texte;
    document.getElementById('frame_galerie').style.bottom=eval(100-pctHaut)+"%";

    if (effectAct==1) showPreview(0); else {
      corriger();
    }
  }

  // ==== Fait apparaitre progressivement l'aperçu ====
  function showPreview(htprev) {
    htprev+=5;
    document.getElementById("frame_file").style.opacity=eval(htprev/100);
    document.getElementById("file").style.opacity=eval(htprev/100);

    if (htprev<100) setTimeout("showPreview("+htprev+")" ,25); else {
      corriger();
     // if (document.getElementById('visuImg')) { zoom100(''); centrer('1'); }
    }
  }

  // ==== Cache la visualisation d'une image ou du contenu d'un fichier ====
  function cacher() {
    showFile=0;
    clearTimeout(boucleDiapo); boucleDiapo="";
    document.getElementById('frame_galerie').style.bottom=eval(hauteurInfos)+"px";

    if (effectAct==1) hidePreview(100); else {
      document.getElementById('frame_detail').innerHTML="";
      document.getElementById('frame_detail').style.visibility="hidden";
      document.getElementById('frame_file').style.visibility="hidden";
      document.getElementById('file').style.visibility="hidden";
      document.getElementById('resize_content').style.display = 'none';
      corriger();
    }
  }


  // ==== Fait disparaitre progressivement l'aperçu ====
  function hidePreview(htprev) {
    htprev-=5;
    document.getElementById("frame_file").style.opacity=eval(htprev/100);
    document.getElementById("file").style.opacity=eval(htprev/100);
    document.getElementById("frame_detail").style.opacity=eval(htprev/100);
    
    if (htprev>0) setTimeout("hidePreview("+htprev+")" ,25); else {
      document.getElementById('frame_detail').innerHTML="";
      document.getElementById('frame_detail').style.visibility="hidden";
      document.getElementById("frame_detail").style.opacity=1;
      document.getElementById('frame_file').style.visibility="hidden";
      document.getElementById('file').style.visibility="hidden";
      document.getElementById('resize_content').style.display = 'none';
      corriger();
    }
  }


  // ==== Adapte le contenu des cadres ====
  function corriger() {
    <?php if ($navig=="IE") { ?>

     decaldt = (36/document.body.clientHeight)*100;
     document.getElementById('frame_detail').style.height=eval(document.body.clientHeight*((100-pctHaut)/100)-hauteurInfos)+'px';
     
     if (showFile==1) decalga = document.getElementById('frame_detail').offsetHeight;
                 else decalga = 0;
     document.getElementById('frame_galerie').style.height=eval(document.body.clientHeight-72-decalga)+'px';

     document.getElementById('arborescence').style.width  =eval(document.getElementById('frame_dossier').offsetWidth-6)+'px';
     document.getElementById('arborescence').style.width  =eval(document.getElementById('frame_dossier').offsetWidth-6)+'px';
     document.getElementById('frame_dossier').style.height=eval(document.body.clientHeight-hauteurInfos)+'px';
     document.getElementById('frame_favoris').style.height=eval(document.body.clientHeight-hauteurInfos)+'px';
     document.getElementById('resize_dossier').style.height=eval(document.body.clientHeight-hauteurInfos)+'px';
     document.getElementById('resize_favoris').style.height=eval(document.body.clientHeight-hauteurInfos)+'px';

     document.getElementById('arborescence').style.height=eval(document.body.clientHeight-36-hauteurInfos)+'px';
     document.getElementById('frame_demande').style.paddingBottom='14px';
     if (document.getElementById('cadrpic')) {
       document.getElementById('cadrpic').style.height=eval(document.body.clientHeight-100)+'px';
     }
    <?php } ?>

     parentAdr = document.getElementById('adresse');
     spanNodes = parentAdr.getElementsByTagName('span');

     if (document.getElementById('autoshow')) document.getElementById('autoshow').style.display="none";
     for(var i=0; i<spanNodes.length; i++)
       if (spanNodes[i].className=="autohide")
           spanNodes[i].style.display="inline";
     fillspace=document.getElementById('frame_adresse').offsetWidth-document.getElementById('util').offsetWidth-document.getElementById('liens').offsetWidth-20;

     if (fillspace<=0) {
       document.getElementById('autoshow').style.display="inline";
       for(var i=0; i<spanNodes.length; i++) {
         fillspace=document.getElementById('frame_adresse').offsetWidth-document.getElementById('util').offsetWidth-document.getElementById('liens').offsetWidth-20;
         if ((spanNodes[i].className=="autohide") && (fillspace<=0))
           spanNodes[i].style.display="none"; }
     }
   }


  // ==== Fonctions de vérifications des caractères dans un formulaire ====
  function verifspeccar(txtbox) {
    var expression = /[<>:#%\+\"\'\|\?&\*\\\/]+/gi;
    if (expression.test(txtbox.value)){
       document.getElementById('frame_demande').style.height="60px";
       txtbox.value=txtbox.value.replace(expression,"");
       document.getElementById('info_demande').innerHTML="<img src='style/"+styleActif+"/images/panneau.<?php echo $_SESSION["ws"]["formatExt"]?>' alt=''>"
         +" <?php echo $_SESSION["ws"]["dia"]["prohibCar"]?>";
    }
  }

  function veriftout(txtbox) {
    var expression = /[<>:#%\+\"\'\|\?&\*\\\/]+/gi;
    if (expression.test(txtbox.value)){
       document.getElementById('frame_demande').style.height="60px";
       txtbox.value=txtbox.value.replace(expression,"");
       document.getElementById('info_demande').innerHTML="<img src='style/"+styleActif+"/images/panneau.<?php echo $_SESSION["ws"]["formatExt"]?>' alt=''>"
         +" <?php echo $_SESSION["ws"]["dia"]["prohibCar"]?>";
    } else { document.getElementById('info_demande').innerHTML="";

    testExist=0; i=1; imax=document.forms.length;
    while (i<=imax) {
    nomForm="param"+i;
      if ((typeof(document.forms[nomForm])!="undefined")&&(document.forms[nomForm].nom.value==txtbox.value)) testExist=1;
      i++;
    }

      if (testExist==1){
         document.getElementById('frame_demande').style.height="60px";
         document.getElementById('info_demande').innerHTML="<img src='style/"+styleActif+"/images/panneau.<?php echo $_SESSION["ws"]["formatExt"]?>' alt=''>"
           +" <?php echo $_SESSION["ws"]["dia"]["alreadyExist"]?>";
      }
    }

  }

  // ==== Nettoie l'url pour affichage ====
  function nettoieUrl(nomUrl) {
    if (nomUrl.indexOf("%u")!=-1) {
      regVerif= /[a-f0-9]/i;
      while (nomUrl.indexOf("%u")!=-1) {

        empl= nomUrl.indexOf("%u");
        car3= nomUrl.substr(empl+4,1);
        car4= nomUrl.substr(empl+5,1);
        var longueur=4;
        if (regVerif.test(car4)===false) longueur=3;
        if (regVerif.test(car3)===false) longueur=2;
        compcar= nomUrl.substr(empl+2,longueur);
        hexacar= parseInt(compcar,16);

        compcar= "%u"+compcar;
        regTest= new RegExp (compcar,"g");
        nomUrl= nomUrl.replace(regTest,"&#"+hexacar);
      }
    }
    if (nomUrl.indexOf("%26")!=-1) {
      nomUrl= nomUrl.replace(/%26/g,"&");
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

  // ==== Redimensionne les frames dossier/explorateur ====
  function redimFrame() {
    document.onmousedown = new Function("return false");
    document.onselectstart = new Function("return false");
    largeurscr = document.body.clientWidth;
    pourcent = 100*context_x/largeurscr;
    if (pourcent>40) pourcent=40;
    if (pourcent<0)  pourcent=0;
      document.getElementById("frame_dossier").style.width=eval(pourcent)+"%";
      document.getElementById("barre_act").style.width=eval(pourcent)+"%";
      document.getElementById("frame_content").style.left=eval(pourcent)+"%";
      document.getElementById("frame_file").style.left=eval(pourcent)+"%";
      document.getElementById("frame_detail").style.left=eval(pourcent)+"%";
      if  (document.getElementById("frame_favoris").style.display!="none")
      {
        document.getElementById("frame_content").style.width=eval(pourcentFav-pourcent)+"%";
        document.getElementById("frame_file").style.width=eval(pourcentFav-pourcent)+"%";
        document.getElementById("frame_detail").style.width=eval(pourcentFav-pourcent)+"%";
      } else {
        document.getElementById("frame_content").style.width=eval(100-pourcent)+"%";
        document.getElementById("frame_file").style.width=eval(100-pourcent)+"%";
        document.getElementById("frame_detail").style.width=eval(100-pourcent)+"%";
      }
      document.getElementById("frame_adresse").style.left=eval(pourcent)+"%";
      document.getElementById("frame_adresse").style.width=eval(100-pourcent)+"%";
      redimInt= setTimeout("redimFrame();",100);
    clearAll();
    corriger();
  }

  // ==== Redimensionne les frames explorateur/favoris ====
  function redimFavoris() {
    document.onmousedown = new Function("return false");
    document.onselectstart = new Function("return false");
    largeurscr = document.body.clientWidth;
    pourcentFav = 100*context_x/largeurscr;
    if (pourcentFav<60)  pourcentFav=60;
    if (pourcentFav>100) pourcentFav=100;
      document.getElementById("frame_favoris").style.left=eval(pourcentFav)+"%";
      document.getElementById("frame_favoris").style.width=eval(100-pourcentFav)+"%";
    if  (document.getElementById("frame_dossier").style.display!="none")
    {
      document.getElementById("frame_content").style.width=eval(pourcentFav-pourcent)+"%";
      document.getElementById("frame_file").style.width=eval(pourcentFav-pourcent)+"%";
      document.getElementById("frame_detail").style.width=eval(pourcentFav-pourcent)+"%";
    } else {
      document.getElementById("frame_content").style.width=eval(pourcentFav)+"%";
      document.getElementById("frame_file").style.width=eval(pourcentFav)+"%";
      document.getElementById("frame_detail").style.width=eval(pourcentFav)+"%";
    }
      redimFav= setTimeout("redimFavoris();",100);
    clearAll();
    corriger();
  }

  // ==== Redimensionne les frames explorateur/aperçu ====
  function redimContent() {
    document.onmousedown = new Function("return false");
    document.onselectstart = new Function("return false");
    hauteurscr = document.body.clientHeight;
    pctHaut = 100*context_y/hauteurscr;
    if (pctHaut<20) pctHaut=20;
    if (pctHaut>80) pctHaut=80;
    document.getElementById("frame_file").style.top=eval(pctHaut)+"%";
    document.getElementById("frame_detail").style.top=eval(pctHaut)+"%";
    document.getElementById("frame_galerie").style.bottom=eval(100-pctHaut)+"%";
    redimCnt= setTimeout("redimContent();",100);
    clearAll();
    corriger();
  }
  
  // ==== Agrandit au maximum la frame d'aperçu ====
  function openFull() {

    document.getElementById("frame_file").style.top="36px";
    document.getElementById("frame_detail").style.top="36px";
    document.getElementById("frame_detail").style.bottom=eval(hauteurInfos)+'px';
    document.getElementById("frame_galerie").style.bottom="0px";
    document.getElementById("switchfull").innerHTML="<img src='style/"+styleActif+"/images/bt21.<?php echo $_SESSION["ws"]["formatExt"]?>' title=\"<?php echo $_SESSION["ws"]["dia"]["reducePanel"]?>\"  onclick='closeFull();'>";
    clearAll();
    corriger();
    if (document.getElementById('visuImg')) {
      zoom100('');
    }
  }

  // ==== Réduit la frame d'aperçu ====
  function closeFull() {
    document.getElementById("frame_file").style.top=eval(pctHaut)+"%";
    document.getElementById("frame_detail").style.top=eval(pctHaut)+"%";
    document.getElementById("frame_galerie").style.bottom=eval(100-pctHaut)+"%";
    document.getElementById("switchfull").innerHTML="<img src='style/"+styleActif+"/images/bt20.<?php echo $_SESSION["ws"]["formatExt"]?>' title=\"<?php echo $_SESSION["ws"]["dia"]["fullScreen"]?>\"  onclick='openFull();'>";
    clearAll();
    corriger();
	  if (document.getElementById('visuImg')) {
      centrer('1');
    }
  }
  
  // ==== Redimensionne les frames explorateur/aperçu ====
  function redimStop() {
    clearInterval(redimInt);
    clearInterval(redimCnt);
    clearInterval(redimFav);
    document.onselectstart = new Function("return true");
    setTimeout('document.onmousedown = new Function("return true");',200);
  }

  // ==== Rétablie la sélection après un redimensionnement  ====
  function clearAll() {
  
  }

  // ==== Réduie l'arborescence entière ====
  function reduce() {
     parentAdr = document.getElementById('arbre');
     spanNodes = parentAdr.getElementsByTagName('div');

   for(var i=0; i<spanNodes.length; i++)
     if (spanNodes[i].className=="montre")
           spanNodes[i].className= "masque";
  }

  // ==== Déploie l'arborescence entière ====
  function deploy() {
     parentAdr = document.getElementById('arbre');
     spanNodes = parentAdr.getElementsByTagName('div');

   for(var i=0; i<spanNodes.length; i++)
     if (spanNodes[i].className=="masque")
           spanNodes[i].className= "montre";
  }

  function slideLeft() {
    if (pourcent>2.5) { pourcent-=2.5; setTimeout("slideLeft()",100);
    } else { pourcent=0;
    document.getElementById("frame_dossier").style.visibility="hidden";
    document.getElementById("resize_dossier").style.visibility="hidden";
    document.getElementById("close_arbre").style.visibility="hidden"; }
      document.getElementById("frame_dossier").style.width=eval(pourcent)+"%";
      document.getElementById("frame_content").style.width=eval(100-pourcent)+"%";
  }

  function slideRight() {
    if (pourcent<16.5) { pourcent+=2.5; setTimeout("slideRight()",100);
    } else { pourcent=18;
    document.getElementById("resize_dossier").style.visibility="visible";
    document.getElementById("close_arbre").style.visibility="visible"; }
      document.getElementById("frame_dossier").style.width=eval(pourcent)+"%";
      document.getElementById("frame_content").style.width=eval(100-pourcent)+"%";
    document.getElementById("frame_dossier").style.visibility="visible";
    }




  // ==== Début du chargement d'une image ====
  function showLoading() {
     hauteurbox = (document.getElementById("frame_detail").<?php echo $instr?>Height-150)/2;
     document.getElementById('loadingImg').style.paddingTop=eval(hauteurbox)+"px";
     document.getElementById('loadingImg').style.visibility="visible";
  }
  // ==== Fin du chargement d'une image ====
  function hideLoading() {
   document.getElementById('loadingImg').style.visibility="hidden";
  }

  // ==== Centre l'image ====
  function centrer(autoadapt) {

    adaptImg=document.getElementById('visuImg').style;
    largeurbox = document.getElementById("frame_detail").<?php echo $instr?>Width;
    hauteurbox = document.getElementById("frame_detail").<?php echo $instr?>Height-document.getElementById("exifpic").<?php echo $instr?>Height;
    largeurImg = document.getElementById("visuImg").<?php echo $instr?>Width;
    hauteurImg = document.getElementById("visuImg").<?php echo $instr?>Height;

    if (autoadapt=="1") {
      if ((largeurImg>=largeurbox)||(hauteurImg>=hauteurbox)) {
        largeurmax= hauteurbox*(largeurImg/hauteurImg);
        hauteurmax= largeurbox*(hauteurImg/largeurImg);

        if (hauteurmax < largeurmax)
             { largeurImg= hauteurmax*(largeurImg/hauteurImg); hauteurImg=hauteurmax; }
        else { hauteurImg= largeurmax*(hauteurImg/largeurImg); largeurImg=largeurmax; }
      }
      adaptImg.width = largeurImg;
      adaptImg.height= hauteurImg;
    }

    adaptImg.left  = (largeurbox-largeurImg)/2;
    adaptImg.top   = (hauteurbox-hauteurImg)/2;
  }

  // ==== Affiche les information EXIF ====
  function exifinfo() {
    if ((rephttp.readyState == 4) && (rephttp.status == 200)) {
      document.getElementById('exifpic').innerHTML="<div id='close_exif'><img src='style/"+styleActif+"/images/close.<?php echo $_SESSION["ws"]["formatExt"]?>' onclick='cacheExif()'></div>"+rephttp.responseText;  
    }
  }

  // ==== Cache les information EXIF ====
  function cacheExif() {
     document.getElementById('cadrpic').style.bottom='0';
     document.getElementById('exifpic').style.display='none';
     corriger();
  }

  // ==== Fonctions de correction du drag&drop ====
  function startDrag(e1, e2) {
     dragElement=1;
     document.onselectstart=new Function ("return false");
   document.getElementById('frame_galerie').style.overflow="visible";
   return true;
  }

  function stopDrag(e1, e2) {
   document.onselectstart=new Function ("return true");
     document.getElementById('frame_galerie').style.overflow="auto";
   return true;
  }

  // ==== Elargie le zoom ====
  function zoomp(url) {
    adaptImg=document.getElementById('visuImg');
    largeurImg = document.getElementById("visuImg").<?php echo $instr?>Width;
    hauteurImg = document.getElementById("visuImg").<?php echo $instr?>Height;
    leftImg    = adaptImg.offsetLeft;
    topImg     = adaptImg.offsetTop;

    adaptImg.style.width = largeurImg*1.125;
    adaptImg.style.height= hauteurImg*1.125;
    adaptImg.style.left  = leftImg-(largeurImg*0.125/2);
    adaptImg.style.top   =  topImg-(hauteurImg*0.125/2);
  }

  // ==== Rétrecie le zoom ====
  function zoomm(url) {
    adaptImg=document.getElementById('visuImg');
    largeurImg = document.getElementById("visuImg").<?php echo $instr?>Width;
    hauteurImg = document.getElementById("visuImg").<?php echo $instr?>Height;
    leftImg    = adaptImg.offsetLeft;
    topImg     = adaptImg.offsetTop;

    adaptImg.style.width = largeurImg*0.88;
    adaptImg.style.height= hauteurImg*0.88;
    adaptImg.style.left  = leftImg+(largeurImg*0.12/2);
    adaptImg.style.top   =  topImg+(hauteurImg*0.12/2);
  }

  // ==== Zoom à 100% ====
  function zoom100(url) {
    document.getElementById("visuImg").style.width = "auto";
    document.getElementById("visuImg").style.height= "auto";
    centrer(0);
  }

  // ==== Affiche l'image précédente ====
  function precedente() {
    cycle=0; prog=10; pas=-100/prog; alpha=100; fonduImage();
    numimg=parseInt(document.formlisteimg.numimg.value)-1;
    maximg=parseInt(document.formlisteimg.maximg.value);
    if (maximg==1) return false;
    showLoading();
    if (numimg<0) numimg=maximg-1;
    document.formlisteimg.numimg.value=numimg;
    if (document.getElementsByName('listeimg').length==1) {
         nomimg  =document.formlisteimg.listeimg.value
         droitimg=document.formlisteimg.droitimg.value;
    } else {
         nomimg  =document.formlisteimg.listeimg[numimg].value;
         droitimg=document.formlisteimg.droitimg[numimg].value;
    }

    contenuPic= "<img src="+'"'+"moteur/pic.php?pic="+nomimg+'"'+" id='visuImg' name='visuImg' class='moveImg' style='position:absolute;<?php echo $filtre; ?>' border='0' onload='centrer(1); startFonduImage(); hideLoading();'>";
    document.getElementById('cadrpic').onmouseover= function(){
      if (attenteClic===false) { iciPerm=droitimg;iciType='wspict';memoPerm=droitimg;memoType='wspict'; }
    }
    
    setTimeout("document.getElementById('cadrpic').innerHTML= contenuPic;",450);
    document.getElementById('infotitre').innerHTML= "<span><img src='style/"+styleActif+"/images/zoom.<?php echo $_SESSION["ws"]["formatExt"]?>'> &nbsp;<?php echo $_SESSION["ws"]["dia"]["pictPreview"]?>&nbsp;"+affichUrl(nomimg)+"</span>";
    rephttp = getNewXMLHTTP();
    rephttp.onreadystatechange = exifinfo;
    rephttp.open("GET", "moteur/exif.php?url="+nomimg, true);
    rephttp.send(null);
  }

  // ==== Affiche l'image suivante ====
  function suivante() {
    cycle=0; prog=10; pas=-100/prog; alpha=100; fonduImage();
    numimg=parseInt(document.formlisteimg.numimg.value)+1;
    maximg=parseInt(document.formlisteimg.maximg.value);
    if (maximg==1) return false;
    showLoading();
    if (numimg>=maximg) numimg=0;
    document.formlisteimg.numimg.value=numimg;
    if (document.getElementsByName('listeimg').length==1) {
         nomimg  =document.formlisteimg.listeimg.value
         droitimg=document.formlisteimg.droitimg.value;
    } else {
         nomimg  =document.formlisteimg.listeimg[numimg].value;
         droitimg=document.formlisteimg.droitimg[numimg].value;
    }

    contenuPic= "<img src="+'"'+"moteur/pic.php?pic="+nomimg+'"'+" id='visuImg' name='visuImg' class='moveImg' style='position:absolute;<?php echo $filtre; ?>' border='0' onload='centrer(1); startFonduImage(); hideLoading();'>";
    document.getElementById('cadrpic').onmouseover= function(){
      if (attenteClic===false) { iciPerm=droitimg;iciType='wspict';memoPerm=droitimg;memoType='wspict'; }
    }
    setTimeout("document.getElementById('cadrpic').innerHTML= contenuPic;",450);
    document.getElementById('infotitre').innerHTML= "<span><img src='style/"+styleActif+"/images/zoom.<?php echo $_SESSION["ws"]["formatExt"]?>'> &nbsp;<?php echo $_SESSION["ws"]["dia"]["pictPreview"]?>&nbsp;"+affichUrl(nomimg)+"</span>";
    rephttp = getNewXMLHTTP();
    rephttp.onreadystatechange = exifinfo;
    rephttp.open("GET", "moteur/exif.php?url="+nomimg, true);
    rephttp.send(null);
  }

// ==== Page suivante dans l'historique ====
  function previousPage() {
    var regRef = /start\.php$/i;
    prec= document.getElementById("apercu").contentWindow.document.referrer;
    if (regRef.test(prec)===false)  {
      document.getElementById("apercu").contentWindow.history.back();
      pageConsult++;
    }
  }
  
// ==== Page précédente dans l'historique ====
  function nextPage() {
    if (pageConsult>0) {
      document.getElementById("apercu").contentWindow.history.forward();
      pageConsult--;
    }
  }

// ==== Fonction d'ouverture d'une fenêtre ====
  function openWindow() {
    document.getElementById("fenetre").style.display="block";
    largeurWin = document.body.clientWidth;
    hauteurWin = document.body.clientHeight;
    largeurBox = document.getElementById("fenetre").<?php echo $instr?>Width;
    hauteurBox = document.getElementById("fenetre").<?php echo $instr?>Height;
    document.getElementById("fenetre").style.display="none";

    valX=(largeurWin-largeurBox)/2;
    valY=(hauteurWin-hauteurBox)/2;
    document.getElementById('fenetre').style.left= valX+"px";
    document.getElementById('fenetre').style.top = valY+"px";
    cycleF=0; progF=10; pasF=100/progF; alphaF=0; fonduWindow();
  }
// ==== Fonction de fermeture d'une fenêtre ====
  function closeWindow() {
    if (dontClose!=1) { cycleF=0; progF=10; pasF=-100/progF; alphaF=100; fonduWindow(); }
    dontClose=0;
  }
// ==== Fonction d'affichage de la fenêtre "A propos de Webshare" ====
  function apropos(label) {
    document.getElementById("fenetre").style.height="410px";
    demander("info","<img src='moteur/changestyle.php?wb=1'><br />"
      +"WebShare © Virginie Vivancos<br />"
      +"<?php echo $_SESSION["ws"]["dia"]["distribGPL"]?><br /><br /><div class='infoGPL'><?php echo $_SESSION["ws"]["dia"]["infoGPL"]?></div>"
      +"<div onclick='visitWebshare()' class='lien' style='text-decoration:underline'><?php echo $_SESSION["ws"]["dia"]["moreInfos"]?></div><br />",label,"closeWindow");
  }
// ==== Fonction d'ouverture du site Webshare ====
  function visitWebshare() {
    closeWindow();
    surfer('http://<?php echo $_SESSION["ws"]["dia"]["websiteAdr"]?>/');
    openFull();
  }
  
// ==== Fonction de suppression d'un élément du DOM ====
function retireElement(idElm) {
  while(idElm.hasChildNodes()==true){
    var enfant=idElm.firstChild;
    idElm.removeChild(enfant);
  }
  var parent= idElm.parentNode;
  parent.removeChild(idElm);
}
  
// ==== Fonction de chargement du contexte du clic ====
function chargeContext(valNum) {
  if (valNum==0) {
    iciType='';iciPro='';iciNom=''; iciWeb=''; iciMime = "";
    iciSize=0; iciPerm= globPerm; iciFav=''; iciSrv = actuelSrv;
  } else {
    valFileInfo=eval("tabFileInfo.fileInfo"+valNum);
    nsFileInfo = valFileInfo;

    if (typeof nsFileInfo != "undefined") {
      iciNom =nsFileInfo.nom;
      iciLien=nsFileInfo.lnk;
      iciType=nsFileInfo.ext;
      iciSize=nsFileInfo.tai;
      iciPerm=nsFileInfo.prm;
      iciPro =nsFileInfo.pro;
      iciDtm =nsFileInfo.dtm;
      iciWeb =nsFileInfo.web;
      iciFav =nsFileInfo.fav;
      iciMime=nsFileInfo.lab;
      if (nsFileInfo.srv.length>0) iciSrv  = nsFileInfo.srv; else iciSrv = actuelSrv;
    }
  }

}

// ==== Fonction de memorisation du contexte du clic ====
function memoContext() {
  memoNom = iciNom; memoType= iciType; memoLien= iciLien; memoDtm= iciDtm; memoWeb= iciWeb;
  memoPerm= iciPerm; memoPro= iciPro;  memoSrv = iciSrv;  memoSize=iciSize; memoMime= iciMime; memoFav= iciFav;
}

function reloadContext(e) {
  <?php if ($navig=="MO") echo "if (e) e.stopPropagation();"; ?>
  altClick=1;
  if (alphamenu>50) reloadmenu=1;
  memoContext();
  context_open();
  return(false);
}

// ==== Fonction d'ouverture du menu en fondu ====
function menuAppear() {
  vmenu= document.getElementById('context_box').style;
  vmenu.display="block";
  if (alphamenu<100) {
    dispmenu=1; alphamenu+=10; setTimeout("menuAppear()", 25);
    vmenu.<?php echo $filtreD?>alphamenu<?php echo $filtreF?>
  } else {
    dispmenu=0; alphamenu=100;
    vmenu.<?php echo $filtreD?>alphamenu<?php echo $filtreF?>
  }
}

// ==== Fonction de fermeture du menu en fondu ====
function menuDisappear() {
  if (reloadmenu==1) { reloadmenu=0; menuAppear(); return true; }
  vmenu= document.getElementById('context_box').style;
  if (alphamenu>0) {
  if (dispmenu!=1) { dispmenu=-1; alphamenu-=10;} setTimeout("menuDisappear()", 25);
  } else {
  dispmenu=0; alphamenu =0; vmenu.display="none"; }

  vmenu.<?php echo $filtreD?>alphamenu<?php echo $filtreF?>
}

// ==== Fonction d'ouverture du menu contextuel ====
function context_open() {

  // Ouverture du menu en fondu
  retContext=context_load();
  if (iciPro=="empty") return false;
  
  <?php if (isset($_SESSION["ws"]["effectAct"])&&($_SESSION["ws"]["effectAct"]=="1")&&($navig!="IE")) echo "if (alphamenu<100) menuAppear();";
        else echo "document.getElementById('context_box').style.display='block';\n"; ?>
  
  if (!context_x) context_x=0; if (!context_y) context_y=0;
  // Calcule la dimension de l'ecran et du menu contextuel
  largeurscr = document.body.clientWidth;
  hauteurscr = document.body.clientHeight;
  document.getElementById('context_box').style.left="-250px";
  document.getElementById('context_box').style.display='block';
  largeurbox = document.getElementById("context_box").<?php echo $instr?>Width;
  hauteurbox = document.getElementById("context_box").<?php echo $instr?>Height;
  
  // Pour eviter le debordement hors de la fenêtre
  if ((context_y+hauteurbox)>hauteurscr) context_y = hauteurscr-hauteurbox;
  if ((context_x+largeurbox)>largeurscr) context_x = largeurscr-largeurbox;
  if (context_y<32) context_y = 32;
  document.getElementById("context_box").style.top = context_y;
  document.getElementById("context_box").style.left= context_x;

  return(false);
}

// ==== Fonction de fermeture du menu contextuel ====
function context_close() {
  document.onselectstart=new Function ("return false");
  if (iciType.substr(0,6)!="affich") {
  <?php if (isset($_SESSION["ws"]["effectAct"])&&($_SESSION["ws"]["effectAct"]=="1")&&($navig!="IE")) echo "if (alphamenu>50) menuDisappear();";
        else echo "document.getElementById('context_box').style.display='none';\n"; ?>
  altClick=0;
  }
}

// ==== Recuperation des touches de clavier ====
function detect_key(e) {
 var touche = window.event ? window.event.keyCode : ((e.which!=0) ? e.which : e.keyCode );
 if ((touche==27)&&(document.getElementById("fenetre").style.display=="block")) closeWindow();
 if ((touche==13)&&(document.getElementById("fenetre").style.display=="block")&&(functionValid.length!=0))
   setTimeout(functionValid, 10);
 
}


// ==== Recuperation des coordonnees de la souris pour y afficher le menu ====
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


// Met en valeur une entree de menu
function context_hl(mode, element) {
  if(mode == 1) element.className= 'context_sel';
          else  element.className= 'context_item';
}
if(navigator.appName.substring(0,3) == "Net")
  document.captureEvents(Event.MOUSEMOVE);

// ==== Chargement du contenu du menu contextuel en fonction du contexte ====
function context_load() {
  // Determine le menu selon le contexte
  regExt= new RegExp (listeExt,"g");
  tl=iciType.toLowerCase(); if (iciPro=="sup")  tl="sup"; context="defaut";
  if ((tl=='arbo')||(tl=='trb')||(tl=='wspict')||(tl=='sup')||(tl.length>5)||(regExt.test(tl)!=false))
                                              context=tl; else context="std";
  if ((tl=='')||(tl=='defaut'))               context="defaut";
  if ((iciPro=='local')   && (tl==''))        context="txt";
  if ((iciPro=='dossier') && (tl!='defaut') && (tl!='arbo') && (tl!='trb') && (tl!='adresse')) context="dossier";

  // Contextes spéciaux pour la corbeille
  if ((typeSrv==3)&&(memoSrv==actuelSrv)&&(tl!='trb')) {
    if (context=="defaut")  context="defaut_trb";
    if (iciPro=='local')    context="local_trb";
  }

  try      { tab_elemt= eval('items_'+context); }
  catch(e) { tab_elemt= eval('global'); }

  // Construit le menu
  context_content = '';
  for(a=0;a<tab_elemt.length;a++)  {
    splited = new Array;
    if(tab_elemt[a].indexOf("|") > 0) {
      // Entree de menu
      splited = tab_elemt[a].split("|");
      menuTitre =splited[0];
      menuDroit =splited[1];
      menuAction=splited[2];
      if ((menuDroit=='13')&&(memoFav==1)) {
        menuTitre="<img class='boutonsMenuContext' src='style/"+styleActif+"/images/fav.<?php echo $_SESSION["ws"]["formatExt"]?>'/> <?php echo $_SESSION["ws"]["dia"]["removeFav"]; ?>";
        menuAction="ajouterFav(2,memoLien,this.innerHTML)";
      }

      // Mises en valeur
      if ((context=="affichtype")&&(menuAction.indexOf(typeActif)>0))
        menuDroit='10';
      if ((context=="affichtri")&&(menuAction.indexOf(triActif)>0))
        menuDroit='10';
      if ((context=="affichtri")&&(menuAction.indexOf(striActif)>0))
        menuDroit='10';
      if ((context=="affichcss")&&(menuAction.indexOf(styleActif)>0))
        menuDroit='10';
      if ((context=="affichvue")&&(menuTitre.indexOf(vueActif)>0))
        menuDroit='10';
   
      // Selon l'identifiant passe, l'entree est susceptible d'être inactive
      // Identifiant 1 -> Entree active seulement si l'utilisateur dispose des droits
      // Identifiant 2,3 et 4 -> Entree active uniquement si la navigation est possible
      // Identifiant 5 -> Entree active si un element se trouve dans le presse-papier
      // Identifiant 6 -> Entree active seulement si le dossier/fichier n'est pas verrouille
      // Identifiant 7 -> Entree active seulement si l'utilisateur dispose des droits et si le fichier n'est pas verouille
      // Identifiant 8 -> Entree inactive
      // Identifiant 9 -> Entree de titre
      // Identifiant 10-> Entree toujours active
      // Identifiant 11-> Entree inactive si FTP
      // Identifiant 12-> Entree inactive si pas de connexion BDD
      // Identifiant 13-> Entree des favoris

      if ( ((menuDroit=='1') && ( (iciPerm=="N") || (iciPerm=="R") ))
        || ((menuDroit=='2') && (boutonBack==""))
        || ((menuDroit=='3') && (boutonBack==""))
        || ((menuDroit=='4') && (boutonUp==""))
        || ((menuDroit=='5') && (clipboardMode==""))
        || ((menuDroit=='6') && ((iciPerm=="N") || (iciPerm=="W")) )
        || ((menuDroit=='7') && (<?php if ($_SESSION["ws"]["typeUser"]!="1") { ?> (iciPerm=="N") || (iciPerm=="R") || <?php } ?><?php echo ($_SESSION["ws"]["auth6"]=="on"?"false":"true")?>))
        || ((menuDroit=='8')) )
            // Entree desactivee
            context_content += '<div class="context_des">'+menuTitre+'</div>';

       else if (menuDroit=='9')
            // Entree de titre
          context_content += '<div class="context_des"><b>'+menuTitre+'</b></div>';

       else if (menuDroit=='10')
            // Entree toujours activée
          context_content += '<div class="context_sel"><b>'+menuTitre+'</b></div>';

       else if ( (menuDroit=='11')&&((typeSrv==2)||(iciPerm=="N")||(iciPerm=="R")) )
            // Entree désactivée si FTP
          context_content += '<div class="context_des">'+menuTitre+'</div>';

       else if ( (menuDroit=='12')&&(<?php echo (!$l_mysql->test()?"1":"0")?>==1) )
            // Entree désactivée si pas de connexion BDD
          context_content += '<div class="context_des">'+menuTitre+'</div>';

       else if ( (menuDroit=='13')&&(<?php echo (!$l_mysql->test()?"1":"0")?>==1) )
            // Entree des favoris
          context_content += '<div class="context_des">'+menuTitre+'</div>';

            // Entree activee
       else context_content += '<div class="context_item" onClick="'+menuAction+'" onMouseOver="if (typeof(context_hl)!=\'undefined\') context_hl(1, this)" onMouseOut="if (typeof(context_hl)!=\'undefined\') context_hl(0, this)">'+menuTitre+'</div>';

    }  else {
      // Barre de separation
      context_content += '<div class="context_item"><img src="style/'+styleActif+'/images/barre.<?php echo $_SESSION["ws"]["formatExt"]?>" style="width:190px;height:7px"></div>';
    }
  }
  document.getElementById('context_box').innerHTML= context_content;

  <?php $varClic= array(0=>"lanceAction('')",1=>"reloadContext",2=>"detailer(memoLien)"); ?>


  // Active les evènements generes par la souris
    document.onmousemove = context_position;
    document.onclick = context_close;
    document.onkeypress = detect_key;
    document.onmouseup = redimStop;
    document.oncontextmenu = reloadContext;
    
    return context;
  }

  // ==== Détection du sens de rotation de la mollette ====
  function handle(delta) {
	  if (document.getElementById('visuImg')) {
      if (delta < 0)
        zoomp('');
	    else
		    zoomm('');
    }
  }

  // ==== Fonction de gestion de la mollette ====
  function wheel(event){
	  var delta = 0;
	  if (!event) event = window.event;
	  if (event.wheelDelta) {
		  delta = event.wheelDelta/120;
		  if (window.opera) delta = -delta;
	  } else if (event.detail) {
		  delta = -event.detail/3;
	  }
	  if (delta)
		  handle(delta);
        if (event.preventDefault)
                event.preventDefault();
        event.returnValue = false;
  }
  
  // ==== Surveille les actions sur la mollette ====
  function startWheel() {
    if (window.addEventListener)
	     window.addEventListener('DOMMouseScroll', wheel, false);
    window.onmousewheel = document.onmousewheel = wheel;
  }

  // ==== Stoppe la surveillance des actions sur la mollette ====
  function stopWheel() {
    if (window.addEventListener)
	     window.removeEventListener('DOMMouseScroll', wheel, false);
    window.onmousewheel = document.onmousewheel = new Function("return true");
  }

  // ==== Fonction d'initialisation d'une action ====
  function initAction() {
    attenteClic= true;
    memoContext();
    verifDoubleClic();
    if (typeClic==false) setTimeout("selectAction()",100);

  }

  // ==== Agit en fonction du clic de l'utilisateur ====
  function selectAction() {

      if (dragElement==1) { attenteClic= false; altClick=0; dragElement=0; return false; }
      if (typeClic==true) { typeClic=false;
                            <?php echo $varClic[$_SESSION["ws"]["clicd"]].(($_SESSION["ws"]["clicd"]==1)?"()":""); ?>; }
      else if (altClick==0) <?php echo $varClic[$_SESSION["ws"]["clicl"]].(($_SESSION["ws"]["clicl"]==1)?"()":""); ?>;
        attenteClic= false; altClick=0;

  }

 // ==== Détecte le clic de l'utilisateur ====
  function verifDoubleClic() {
    var tempsClicEnCours = (new Date()).getTime();
    if ( (dernierClick == this) && (tempsClicEnCours < tempsDernierClick + tempsEntreDeuxClics) ) {
      dernierClick = null;
      typeClic= true;
    } else {
      dernierClick = this;
      tempsDernierClick = tempsClicEnCours;
      typeClic= false;
    }
  }

  function hidePlayers() {
    document.getElementById('playermp3new').style.display="none";
    document.getElementById('playermp3').style.display="none";
  }

  // ==== Affiche l'horloge ====
  function horloge() {
  var enteteDate= '<?php echo date("j ").$_SESSION["ws"]["dia"]["listeMois"][intval(date("n"))].date(" Y "); ?>';
  dj = new Date();
  heure = dj.getHours();
  minute = dj.getMinutes(); if (minute<10) minute="0"+minute;
  seconde = dj.getSeconds(); if (seconde<10) seconde="0"+seconde;

  if (document.getElementById("infos_rep").clientWidth!=0)
    document.getElementById('horloge').style.left =eval(document.getElementById("infos_rep").clientWidth+40)+"px";
  if (document.getElementById("infos_user").clientWidth!=0)
    document.getElementById('horloge').style.width=eval(document.body.clientWidth
    -document.getElementById("infos_user").clientWidth-document.getElementById("infos_rep").clientWidth-80)+"px";
    
  document.getElementById('horloge').innerHTML= "<nobr>"+enteteDate+"</nobr> - <nobr>"+heure+":"+minute+":"+seconde+"</nobr>";
  if    (document.getElementById("horloge").clientHeight>20) {
         document.getElementById('horloge').innerHTML= enteteDate+"<br />"+heure+":"+minute+":"+seconde;
         document.getElementById('horloge').style.top="3px"; }
  else { document.getElementById('horloge').style.top="9px"; }
  if    (document.getElementById("horloge").clientWidth<10)
         document.getElementById('horloge').style.visibility="hidden";
    else document.getElementById('horloge').style.visibility="visible";
    setTimeout("horloge()", 1000);

  }

  // ==== Converti les caractères mal encodes (Transforme du %uxxxx en &#xxxxx;) ====
  function convertAffichage(nomlayer) {
    contlayer= nomlayer.innerHTML;
    if (contlayer.indexOf("%u")!=-1) {
      regVerif= /[a-f0-9]/i;
      while (contlayer.indexOf("%u")!=-1) {
        empl= contlayer.indexOf("%u");
        car3= contlayer.substr(empl+4,1);
        car4= contlayer.substr(empl+5,1);
        var longueur=4;
        if (regVerif.test(car4)===false) longueur=3;
        if (regVerif.test(car3)===false) longueur=2;

        compcar= contlayer.substr(empl+2,longueur);
        hexacar= parseInt(compcar,16);
        compcar= "%u"+compcar;
        regTest= new RegExp (compcar,"g");
        contlayer= contlayer.replace(regTest,"&#"+hexacar);
      }
      nomlayer.innerHTML= contlayer;
    }
    if (contlayer.indexOf("%26")!=-1) {
      contlayer= contlayer.replace(/%26/g,"&");
      nomlayer.innerHTML= contlayer;
    }
  }


  // ==== Conversion de la taille de fichier pour affichage ====
  function convertir(nombre) {
    tailleFichier="";
    if ((nombre == 0) || (nombre == "")) tailleFichier="0";
    if ((nombre  > 0) && (nombre < 1024)) tailleFichier=(Math.round(nombre*100)/100)+" octets";
    if ((nombre >= 1024) && (nombre < 1048576)) tailleFichier=(Math.round((nombre/1024)*100)/100)+" K<?php echo $_SESSION["ws"]["dia"]["octet"]?>";
    if ((nombre >= 1048576) && (nombre < 1073741824)) tailleFichier=(Math.round((nombre/1048576)*100)/100)+" M<?php echo $_SESSION["ws"]["dia"]["octet"]?>";
    if ( nombre >= 1073741824) tailleFichier=(Math.round((nombre/1073741824)*100)/100)+" G<?php echo $_SESSION["ws"]["dia"]["octet"]?>";

    return tailleFichier;
  }

  // ==== Retourne l'equivalence des noms de style appliques ====
  function equivalent(nomStyle) {
    if (nomStyle=='miniatures') return "xslStyle2";
    if (nomStyle=='liste')      return "xslStyle4";
    if (nomStyle=='grandes')    return "xslStyle3";
    if (nomStyle=='details')    return "xslStyle5";
  }

  // ==== Temporaire : affiche la page d'accueil Webshare ====
  function informer(text) {
    surfer('http://www.webshare.fr/')
  }

  // ==== Retourne le nom du fichier ou du repertoire ====
  function basename (path) {
    return path.replace( /.*\//, "" );
  }

  // ==== Fonction d'affichage d'une image en fondu ====
  function fonduImage() {
    vmenu= document.getElementById('visuImg').style;
    if (alpha>0) vmenu.visibility="visible";
      <?php if ($navig=="IE") { $filtreD='filter="alpha(opacity="+'; $filtreF='+")"'; }
                      else { $filtreD='opacity='; $filtreF='/100'; } ?>
    vmenu.<?php echo $filtreD?>alpha<?php echo $filtreF?>;
    // Boucle qui fait apparaitre/disparaitre l'image progressivement
    if (cycle<10) {
        alpha+=pas; cycle+=1;
        setTimeout("fonduImage()", 25); }
    if (alpha<1) vmenu.visibility="hidden";
  }
  function startFonduImage() {
      cycle=0; prog=10; pas=100/prog; alpha=0; fonduImage();
  }

  // ==== Fonction d'affichage d'une demande de gestion en fondu ====
  function fonduDemande() {
    vmenu= document.getElementById('frame_demande').style;
    if (alpha>0) vmenu.visibility="visible";
      <?php if ($navig=="IE") { $filtreD='filter="alpha(opacity="+'; $filtreF='+")"'; }
                      else { $filtreD='opacity='; $filtreF='/100'; } ?>
    vmenu.<?php echo $filtreD?>alpha<?php echo $filtreF?>;
    // Boucle qui fait apparaitre/disparaitre la demande progressivement
    if (cycle<10) {
        alpha+=pas; cycle+=1;
        setTimeout("fonduDemande()", 25); }
    if (alpha<1) vmenu.visibility="hidden";
  }
  
  // ==== Fonction d'affichage d'une fenetre en fondu ====
  function fonduWindow() {
    vfenetre= document.getElementById('fenetre').style;
    if ((pasF>0)&&(cycleF==0)) vfenetre.display="block";
      <?php if ($navig=="IE") { $filtreD='filter="alpha(opacity="+'; $filtreF='+")"'; }
                         else { $filtreD='opacity='; $filtreF='/100'; } ?>
    <?php if ($navig!="IE") { echo "vfenetre.".$filtreD."alphaF".$filtreF; } ?>
    // Boucle qui fait apparaitre/disparaitre la fenetre progressivement
    if (cycleF<10) {
        alphaF+=pasF; cycleF+=1;
        setTimeout("fonduWindow()", 25); }
    if ((pasF<0)&&(cycleF==10)) vfenetre.display="none";
  }

  // ==== Fonction d'affichage d'un icone en fondu ====
  function fonduIcone() {
    vfenetre= document.getElementById('layerDragDrop').style;
    if ((pasI>0)&&(cycleI==0)) vfenetre.display="block";
      <?php if ($navig=="IE") { $filtreD='filter="alpha(opacity="+'; $filtreF='+")"'; }
                         else { $filtreD='opacity='; $filtreF='/100'; } ?>
    vfenetre.<?php echo $filtreD?>alphaI<?php echo $filtreF?>;
    // Boucle qui fait apparaitre/disparaitre l'icone progressivement
    if (cycleI<10) {
        alphaI+=pasI; cycleI+=1;
        setTimeout("fonduIcone()", 25); }
    if ((pasI<0)&&(cycleI==10)) vfenetre.display="none";
  }

  // ==== Fonction d'affichage de la galerie en fondu ====
  function fonduGalerie() {
   if (document.getElementById('frame_galerie')) {
    vfenetre= document.getElementById('frame_galerie').style;
    if ((pasG>0)&&(cycleG==0)) vfenetre.display="block";
      <?php if ($navig=="IE") { $filtreD='filter="alpha(opacity="+'; $filtreF='+")"'; }
                         else { $filtreD='opacity='; $filtreF='/100'; } ?>
    vfenetre.<?php echo $filtreD?>alphaG<?php echo $filtreF?>;
    // Boucle qui fait apparaitre/disparaitre l'icone progressivement
    if (cycleG<10) {
        alphaG+=pasG; cycleG+=1;
        setTimeout("fonduGalerie()", 25); }
    if ((pasG<0)&&(cycleG==10)) vfenetre.display="none";
   }
  }

  // ==== Fonction de création d'une fenetre deplacable ====
  function createWindow() {
    if (document.getElementById('contenu_fenetre'))
      winContent= document.getElementById('contenu_fenetre').innerHTML;
    else winContent="";
      document.getElementById('fenetre').innerHTML="<table cellspacing='0'><tr class='mini'>"
      +"<td class='mini moveWindow'><img src='style/"+styleActif+"/images/fenetre_01.png' style='cursor:move' /></td>"
      +"<td class='moveWindow' style="+'"'+"cursor:move;background:url('style/"+styleActif+"/images/fenetre_02.png')"+'"'+" /><img src='style/"+styleActif+"/images/fenetre_02.png'/></td>"
      +"<td class='mini moveWindow'><img src='style/"+styleActif+"/images/fenetre_03.png' style='cursor:move' /></td>"
    +"</tr><tr>"
      +"<td class='moveWindow' style="+'"'+"cursor:move;background:url('style/"+styleActif+"/images/fenetre_04.png')"+'"'+" /></td>"
      +"<td class='fond_fenetre'><div id='contenu_fenetre'>"+winContent+"</div></td>"
      +"<td class='moveWindow' style="+'"'+"cursor:move;background:url('style/"+styleActif+"/images/fenetre_06.png')"+'"'+" /></td>"
    +"</tr><tr class='mini'>"
      +"<td class='mini moveWindow'><img src='style/"+styleActif+"/images/fenetre_07.png' style='cursor:move' /></td>"
      +"<td class='moveWindow' style="+'"'+"cursor:move;background:url('style/"+styleActif+"/images/fenetre_08.png')"+'"'+" /><img src='style/"+styleActif+"/images/fenetre_08.png'/></td>"
      +"<td class='mini moveWindow'><img src='style/"+styleActif+"/images/fenetre_09.png' style='cursor:move' /></td>"
    +"</tr></table>";
      document.getElementById("fenetre").style.height="160px";
  }
  
  
  
var dragged = null;
var dX, dY;

function start_drag(objet,event)
{
	if(objet.max) return;
  dragged = objet;

	event.returnValue = false;
	if( event.preventDefault ) event.preventDefault();

  var x = event.clientX + (document.documentElement.scrollLeft + document.body.scrollLeft);
  var y = event.clientY + (document.documentElement.scrollTop + document.body.scrollTop);

  var eX = 0;
  var eY = 0;
  var element = objet;
  do
  {
    eX += element.offsetLeft;
    eY += element.offsetTop;
    element = element.offsetParent;
	} while( element && getCssStyleValue(element, 'position') != 'absolute');

  dX = x - eX;
  dY = y - eY;

}

function start_dragdrop(objet,event)
{
  dragged = document.getElementById('layerDragDrop');
  dragged.style.<?php echo $filtreD?>50<?php echo $filtreF?>;
  if (1==1) contenuObjet= objet.innerHTML+"<br />1 <?php echo $_SESSION["ws"]["dia"]["selectedElement"]?>";
       else contenuObjet= '<img src="style/'+styleActif+'/images/multiple.<?php echo $_SESSION["ws"]["formatExt"]?>"/>'
                         +"<br /># <?php echo $_SESSION["ws"]["dia"]["selectedElements"]?>";
  dragged.innerHTML= contenuObjet;
  if (selectObj!=0) {
    memoObj=selectObj;
  }
  
	event.returnValue = false;
	if( event.preventDefault ) event.preventDefault();

  var x = event.clientX + (document.documentElement.scrollLeft + document.body.scrollLeft);
  var y = event.clientY + (document.documentElement.scrollTop + document.body.scrollTop);

  dX = x - context_x - 3;
  dY = y - context_y + 10;
}

function drag_onmousemove(event)
{
  if( dragged )
  {
    var x = event.clientX + (document.documentElement.scrollLeft + document.body.scrollLeft);
    var y = event.clientY + (document.documentElement.scrollTop + document.body.scrollTop);
    if (dragMode==2) dragged.style.display="block";
    
		//On applique le décalage
		x -= dX;
		y -= dY;

    dragged.style.position = 'absolute';
    dragged.style.left = x + 'px';
    dragged.style.top = y + 'px';
  }
}

function drag_onmouseup(event)
{

  if (dragMode==2) {
    if (iciNom!="") {
      if ((memoObj!=0)&&(memoObj!=selectObj)) {
        gestionDep(memoObj, selectObj);
      } 
    }
    if (selectObj=="wsAddFavoris") {
      chargeContext(memoObj); memoContext();
      deposerFav();
    }
    cycleI=0; progI=10; pasI=-50/progI; alphaI=50; fonduIcone();
    memoObj= 0;
  }
  dragMode= 0;
  dragged = null;
  return false;
}

  // ==== Fonction de gestion du drag&drop ====
  function gestionDep(num1, num2) {

    // Récupére les ID des éléments déplacés et charge leur contextes
    nsPro=""; nsName1=""; nsName2="";
    valFileInfo1=eval("tabFileInfo.fileInfo"+num1);
    valFileInfo2=eval("tabFileInfo.fileInfo"+num2);
    nsFileInfo1 = valFileInfo1;
    nsFileInfo2 = valFileInfo2;
    document.getElementById('frame_galerie').style.overflow="auto";
    
    if ( (typeof nsFileInfo1 != "undefined") && (typeof nsFileInfo2 != "undefined") && (num1!=num2) ) {
      nsName1=nsFileInfo1.nom; nsName2=nsFileInfo2.nom; nsPro=nsFileInfo2.pro;
      if (nsPro=="dossier") {
        chargeContext(num1); memoContext(); deplacer();
        chargeContext(num2); memoContext();
        url= actuel; actuel= memoLien;
        coller(memoLien,"<img src='style/"+styleActif+"/images/paste.<?php echo $_SESSION["ws"]["formatExt"]?>'"
                       +" style='width:22px;height:22px'>  <?php echo $_SESSION["ws"]["dia"]["toMove"]?>"); actuel= url;
      }
    }
  }

function addEvent(obj,event,fct)
{
  if( obj.attachEvent)
     obj.attachEvent('on' + event,fct);
  else
     obj.addEventListener(event,fct,true);
}

function getCssStyleValue(element /*element html*/, style/*style recherché*/)
{
  if( element.currentStyle )
  {
    return element.currentStyle[style];
  }
  else
  {
    return window.getComputedStyle(element,null).getPropertyValue(style);
  }
}

function drag_onmousedown (event)
{
  var target = event.target || event.srcElement;

  var fenetre = target;
  while( fenetre)
  {
    if( fenetre.className && fenetre.className.match(/\bfenetre\b/g) )
    {
       break;
    }
    if( fenetre.className && fenetre.className.match(/\bcaseimg\b/g) )
    {
       break;
    }
    if( fenetre.className && fenetre.className.match(/\bmoveImg\b/g) )
    {
       break;
    }
 		fenetre = fenetre.parentNode;
  }
  if( !fenetre)
    return;

  var element = target;
  while(element)
  {
    if( element.className)
    {
      if ( element.className.match(/moveWindow/g) 
        || element.className.match(/moveImg/g) ) {
        dragMode=1;
        start_drag(fenetre, event);
        break;
      }
      if ( element.className.match(/caseimg/g) ) {
        <?php if ($_SESSION["ws"]["auth4"]=="on") { ?>
        dragMode=2;
        start_dragdrop(fenetre, event);
        break;
        <?php } ?>
      }
    }
		element = element.parentNode;
  }

}

addEvent(document,'mousedown',drag_onmousedown);
addEvent(document,'mousemove',drag_onmousemove);
addEvent(document,'mouseup',  drag_onmouseup);

  
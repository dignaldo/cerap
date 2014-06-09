
// Menu contextuel local par defaut
items_defaut  = new Array
  ("<img src='style/"+styleActif+"/images/prev.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["previousPage"]?>|2|precedent(boutonBack)",
   "<img src='style/"+styleActif+"/images/parent.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["upDir"]?>|4|remonter(boutonUp)",
   "<img src='style/"+styleActif+"/images/update.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["updateDir"]?>|0|actualiser()","",
   "<img src='style/"+styleActif+"/images/selall.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["selectAll"]?>|8|toutSelectionner(actuel)",
   "<img src='style/"+styleActif+"/images/renall.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["renameAll"]?>|8|rien(actuel)",
   "<img src='style/"+styleActif+"/images/save.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["saveAll"]?>|0|toutSauver(actuel,this.innerHTML)","",
   "<img src='style/"+styleActif+"/images/paste.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>  <?php echo $_SESSION["ws"]["dia"]["toPaste"]?>|<?php echo (($_SESSION["ws"]["auth4"]=="on")?"5":"8"); ?>|coller(memoLien,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/new2.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["newDir"]?>|<?php echo (($_SESSION["ws"]["auth2"]=="on")?"1":"8"); ?>|creaDossier(actuel,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/new3.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["newFile"]?>|<?php echo (($_SESSION["ws"]["auth2"]=="on")?"1":"8"); ?>|openUpload(actuel)",
   "<img src='style/"+styleActif+"/images/new4.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["newLink"]?>|<?php echo (($_SESSION["ws"]["auth2"]=="on")?"1":"8"); ?>|creaLien(actuel,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/new5.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["newTxt"]?>|<?php echo (($_SESSION["ws"]["auth2"]=="on")?"1":"8"); ?>|creaTxt(actuel,this.innerHTML)","",
   "<img src='style/"+styleActif+"/images/prop.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["toSearch"]?>|0|rechercher(actuel,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/comment.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["addComment"]?>|<?php echo (($_SESSION["ws"]["auth7"]=="on")?"0":"8"); ?>|commenterGlobal(this.innerHTML)",
   "<img src='style/"+styleActif+"/images/print.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>  <?php echo $_SESSION["ws"]["dia"]["printGallery"]?>|1|imprimerCadre('frame_galerie',this.innerHTML)");

// Menu contextuel FTP par defaut
items_defaut2 = new Array
  ("<img src='style/"+styleActif+"/images/prev.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["previousPage"]?>|2|precedent(boutonBack)",
   "<img src='style/"+styleActif+"/images/parent.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["upDir"]?>|4|remonter(boutonUp)",
   "<img src='style/"+styleActif+"/images/update.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["updateDir"]?>|0|actualiser()","",
   "<img src='style/"+styleActif+"/images/print.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>  <?php echo $_SESSION["ws"]["dia"]["printGallery"]?>|1|imprimerCadre('frame_galerie')");

items_affichopt = new Array
  ("<img src='style/"+styleActif+"/images/vide.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["options"].$_SESSION["ws"]["dia"]["ofDir"]?> :|9|rien(actuel)","",
   "<img src='style/"+styleActif+"/images/save.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["saveAll"]?>|0|toutSauver(actuel,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/selall.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["selectAll"]?>|8|toutSelectionner(actuel)",
   "<img src='style/"+styleActif+"/images/renall.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["renameAll"]?>|8|toutRenommer(actuel)",
   "<img src='style/"+styleActif+"/images/paste.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>  <?php echo $_SESSION["ws"]["dia"]["toPaste"]?>|<?php echo (($_SESSION["ws"]["auth4"]=="on")?"5":"8"); ?>|coller(memoLien,this.innerHTML)","",
   "<img src='style/"+styleActif+"/images/prop.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["toSearch"]?>|0|rechercher(actuel,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/comment.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["addComment"]?>|<?php echo (($_SESSION["ws"]["auth7"]=="on")?"0":"8"); ?>|commenterGlobal(this.innerHTML)",
   "<img src='style/"+styleActif+"/images/print.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>  <?php echo $_SESSION["ws"]["dia"]["printGallery"]?>|1|imprimerCadre('frame_galerie')");


// Menu contextuel de la barre d'adresse
items_adresse = new Array
  ("<img src='style/"+styleActif+"/images/goto.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <b><?php echo $_SESSION["ws"]["dia"]["toBrowse"]?></b>|6|naviguer(memoLien)");

// Menu contextuel local d'un dossier
items_dossier = new Array
  ("<img src='style/"+styleActif+"/images/goto.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <b><?php echo $_SESSION["ws"]["dia"]["toBrowse"]?></b>|6|naviguer(memoLien)","",
   "<img src='style/"+styleActif+"/images/sel.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>    <?php echo $_SESSION["ws"]["dia"]["select"]?>|8|selectionner(actuel)","",
   "<img src='style/"+styleActif+"/images/cut.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>    <?php echo $_SESSION["ws"]["dia"]["toCut"]?>|<?php echo (($_SESSION["ws"]["auth4"]=="on")?"1":"8"); ?>|couper(memoLien,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/copy.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["toCopy"]?>|<?php echo (($_SESSION["ws"]["auth4"]=="on")?"1":"8"); ?>|copier(memoLien,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/rename.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["toRename"]?>|<?php echo (($_SESSION["ws"]["auth4"]=="on")?"1":"8"); ?>|renommer(memoLien,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/delete.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["toDelete"]?>|<?php echo (($_SESSION["ws"]["auth5"]=="on")?"1":"8"); ?>|supprimer(memoLien,this.innerHTML)","",
   "<img src='style/"+styleActif+"/images/prop.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["toSearch"]?>|6|rechercher(actuel,this.innerHTML)","",
   "<img src='style/"+styleActif+"/images/acces.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>  <?php echo $_SESSION["ws"]["dia"]["modifyPermission"]?>|<?php echo (($_SESSION["ws"]["auth6"]=="on")?"7":"8"); ?>|autoriser(memoLien,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/fav.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>    <?php echo $_SESSION["ws"]["dia"]["addFav"]?>|13|ajouterFav(1,memoLien,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/comment.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["addComment"]?>|<?php echo (($_SESSION["ws"]["auth7"]=="on")?"0":"8"); ?>|commenter(memoLien,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/info.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["property"]?>|6|detailer(memoLien)");

// Menu contextuel FTP d'un dossier
items_dossier2 = new Array
  ("<img src='style/"+styleActif+"/images/goto.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <b><?php echo $_SESSION["ws"]["dia"]["toBrowse"]?></b>|6|naviguer(memoLien)","",
   "<img src='style/"+styleActif+"/images/cut.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>    <?php echo $_SESSION["ws"]["dia"]["toCut"]?>|<?php echo (($_SESSION["ws"]["auth4"]=="on")?"1":"8"); ?>|couper(memoLien,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/copy.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["toCopy"]?>|<?php echo (($_SESSION["ws"]["auth4"]=="on")?"1":"8"); ?>|copier(memoLien,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/rename.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["toRename"]?>|<?php echo (($_SESSION["ws"]["auth4"]=="on")?"1":"8"); ?>|renommer(memoLien,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/delete.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["toDelete"]?>|<?php echo (($_SESSION["ws"]["auth5"]=="on")?"1":"8"); ?>|supprimer(memoLien,this.innerHTML)");


// Menu contextuel d'un dossier d'arborescence
items_arbo = new Array
  ("<img src='style/"+styleActif+"/images/miniopen.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <b><?php echo $_SESSION["ws"]["dia"]["toBrowse"]?></b>|6|naviguer(memoLien)","",
   "<img src='style/"+styleActif+"/images/update.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["refreshTree"]?>|6|explorerServeur(memoSrv)",
   "<img src='style/"+styleActif+"/images/reduce.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["hideTree"]?>|6|reduce(actuel)",
   "<img src='style/"+styleActif+"/images/deploy.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["showTree"]?>|6|deploy(actuel)");


// Menu contextuel de la corbeille (arborescence)
items_trb = new Array
  ("<img src='style/"+styleActif+"/images/zoom.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <b><?php echo $_SESSION["ws"]["dia"]["viewElements"]?></b>|6|voirCorbeille()",
   "<img src='style/"+styleActif+"/images/delete.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["emptyBin"]?>|6|viderCorbeille(this.innerHTML)");

// Menu contextuel du dossier de la corbeille 
items_defaut_trb = new Array
  ("<img src='style/"+styleActif+"/images/delete.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["emptyBin"]?>|6|viderCorbeille(this.innerHTML)");

// Menu contextuel d'un élément de la corbeille 
items_local_trb = new Array
  ("<img src='style/"+styleActif+"/images/upd.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <b><?php echo $_SESSION["ws"]["dia"]["restoreElement"]?></b>|6|retablirElm(memoLien,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/delete.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["toDelete"].$_SESSION["ws"]["dia"]["finally"]?>|6|supprimerDef(memoLien,this.innerHTML)");


// Menu contextuel d'un fichier de type reconnu
global = new Array
  ("<img src='style/"+styleActif+"/images/save.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["saveFile"]?>|6|sauver(memoLien)",
   "<img src='style/"+styleActif+"/images/sel.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>    <?php echo $_SESSION["ws"]["dia"]["select"]?>|8|selectionner(actuel)","",
   "<img src='style/"+styleActif+"/images/cut.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>    <?php echo $_SESSION["ws"]["dia"]["toCut"]?>|<?php echo (($_SESSION["ws"]["auth4"]=="on")?"1":"8"); ?>|couper(memoLien,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/copy.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["toCopy"]?>|<?php echo (($_SESSION["ws"]["auth4"]=="on")?"1":"8"); ?>|copier(memoLien,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/rename.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["toRename"]?>|<?php echo (($_SESSION["ws"]["auth4"]=="on")?"1":"8"); ?>|renommer(memoLien,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/delete.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["toDelete"]?>|<?php echo (($_SESSION["ws"]["auth5"]=="on")?"1":"8"); ?>|supprimer(memoLien,this.innerHTML)","",
   "<img src='style/"+styleActif+"/images/acces.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>  <?php echo $_SESSION["ws"]["dia"]["modifyPermission"]?>|<?php echo (($_SESSION["ws"]["auth6"]=="on")?"7":"8"); ?>|autoriser(memoLien,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/alerte.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["disallowModif"]?>|<?php echo (($_SESSION["ws"]["auth6"]=="on")?"12":"8"); ?>|bloquerModif(1,memoLien,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/fav.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>    <?php echo $_SESSION["ws"]["dia"]["addFav"]?>|13|ajouterFav(1,memoLien,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/contact.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["sendMail"]?>|<?php echo (($_SESSION["ws"]["sendMail"]=="1")?"1":"8"); ?>|sendItem(memoLien,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/comment.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["addComment"]?>|<?php echo (($_SESSION["ws"]["auth7"]=="on")?"11":"8"); ?>|commenter(memoLien,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/info.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["property"]?>|6|detailer(memoLien)");


// Menu contextuel de la fonction de changement d'affichage
items_affichtype = new Array
  ("<img src='style/"+styleActif+"/images/vide.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["affichage"]?> :|9|rien(actuel)","",
   "<img src='style/"+styleActif+"/images/view_i.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["miniature"]?>|0|changeType('miniatures')",
   "<img src='style/"+styleActif+"/images/view_m.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["bigIcone"]?>|0|changeType('grandes')",
   "<img src='style/"+styleActif+"/images/view_d.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["liste"]?>|0|changeType('liste')",
   "<img src='style/"+styleActif+"/images/view_t.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["details"]?>|0|changeType('details')");

items_precedent = new Array
  ("<img src='style/"+styleActif+"/images/prev.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <b><?php echo $_SESSION["ws"]["dia"]["previousPage"]?></b>|2|precedent(boutonBack)");

items_sup = new Array
  ("<img src='style/"+styleActif+"/images/parent.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <b><?php echo $_SESSION["ws"]["dia"]["upDir"]?></b>|4|remonter(boutonUp)");

items_parent = new Array
  ("<img src='style/"+styleActif+"/images/parent.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <b><?php echo $_SESSION["ws"]["dia"]["upDir"]?></b>|4|remonter(boutonUp)");

items_update = new Array
  ("<img src='style/"+styleActif+"/images/update.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <b><?php echo $_SESSION["ws"]["dia"]["updateDir"]?></b>|0|actualiser()");

items_buttonquit = new Array
  ("<img src='style/"+styleActif+"/images/exit.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <b><?php echo $_SESSION["ws"]["dia"]["toQuit"]?></b>|0|confirmQuitter(actuel)");

// Menu contextuel de la fonction de changement de volet
items_affichvue = new Array
  ("<img src='style/"+styleActif+"/images/vide.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["expPanel"]?> :|9|rien(actuel)","",
   "<img src='style/"+styleActif+"/images/cancel2.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["none"]?>|0|alterner('2')",
   "<img src='style/"+styleActif+"/images/arbo2.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>  <?php echo $_SESSION["ws"]["dia"]["arbo"]?>|0|alterner('0')",
   "<img src='style/"+styleActif+"/images/fav.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>    <?php echo $_SESSION["ws"]["dia"]["favoris"]?>|0|alterner('1')",
   "<img src='style/"+styleActif+"/images/all.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["all"]?>|0|alterner('3')");

// Menu contextuel de la fonction de changement de tri
items_affichtri  = new Array
  ("<img src='style/"+styleActif+"/images/vide.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["sortFile"]?> :|9|rien(actuel)","",
   "<img src='style/"+styleActif+"/images/tri.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>    <?php echo $_SESSION["ws"]["dia"]["byName"]?>|0|changeTri('fichier')",
   "<img src='style/"+styleActif+"/images/tri.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>    <?php echo $_SESSION["ws"]["dia"]["byValue"]?>|0|changeTri('valeur')",
   "<img src='style/"+styleActif+"/images/tri.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>    <?php echo $_SESSION["ws"]["dia"]["byType"]?>|0|changeTri('extension')",
   "<img src='style/"+styleActif+"/images/tri.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>    <?php echo $_SESSION["ws"]["dia"]["bySize"]?>|0|changeTri('taille')",
   "<img src='style/"+styleActif+"/images/tri.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>    <?php echo $_SESSION["ws"]["dia"]["byDate"]?>|0|changeTri('modiftri')","",
   "<img src='style/"+styleActif+"/images/asc.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>    <?php echo $_SESSION["ws"]["dia"]["ascending"]?>|0|changeSensTri('asc')",
   "<img src='style/"+styleActif+"/images/desc.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>    <?php echo $_SESSION["ws"]["dia"]["descending"]?>|0|changeSensTri('desc')");

// Menu contextuel de la fonction d'ajout d'element
items_affichnew  = new Array
  ("<img src='style/"+styleActif+"/images/vide.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["addNew"]?> :|9|rien(actuel)","",
   "<img src='style/"+styleActif+"/images/new2.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["newDir"]?>|<?php echo (($_SESSION["ws"]["auth2"]=="on")?"1":"8"); ?>|creaDossier(actuel,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/new3.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["newFile"]?>|<?php echo (($_SESSION["ws"]["auth2"]=="on")?"1":"8"); ?>|openUpload(actuel,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/new4.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["newLink"]?>|<?php echo (($_SESSION["ws"]["auth2"]=="on")?"1":"8"); ?>|creaLien(actuel,this.innerHTML)",
   "<img src='style/"+styleActif+"/images/new5.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["newTxt"]?>|<?php echo (($_SESSION["ws"]["auth2"]=="on")?"1":"8"); ?>|creaTxt(actuel,this.innerHTML)");

// Menu contextuel des fonctions complementaires
items_affichadmin = new Array
  ("<img src='style/"+styleActif+"/images/admin.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>  <?php echo $_SESSION["ws"]["dia"]["options"]?> :|9|rien(actuel)","",
   "<img src='style/"+styleActif+"/images/fav.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>    <?php echo $_SESSION["ws"]["dia"]["about"]?> Webshare |0|apropos(this.innerHTML)","",
   "<img src='style/"+styleActif+"/images/chuser.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["myPref"]?>|<?php echo (($_SESSION["ws"]["publicUser"]=="on")?"8":"0"); ?>|affichePref(this.innerHTML)",
   "<img src='style/"+styleActif+"/images/idea.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["onlineHelp"]?>|0|surfer('http://forum.webshare.fr/');openFull();",
   "<img src='style/"+styleActif+"/images/contact.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["rapport"]?>|0|surfer('http://contact.webshare.fr/');openFull();");

// Menu contextuel "à propos"
items_apropos = new Array
  ("<img src='style/"+styleActif+"/images/fav.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>    <?php echo $_SESSION["ws"]["dia"]["about"]?> Webshare |0|apropos(this.innerHTML)");

// Menu contextuel de la visualisation d'image
items_wspict      = new Array
  ("<img src='style/"+styleActif+"/images/prev.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["previous"]?>|0|precedente(actuel)",
   "<img src='style/"+styleActif+"/images/next.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["next"]?>|0|suivante(actuel)","",
   "<img src='style/"+styleActif+"/images/zoomb.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>  <?php echo $_SESSION["ws"]["dia"]["zoomp"]?>|0|zoomp(memoLien)",
   "<img src='style/"+styleActif+"/images/zooml.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>  <?php echo $_SESSION["ws"]["dia"]["zoomm"]?>|0|zoomm(memoLien)",
   "<img src='style/"+styleActif+"/images/zoom.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["zooms"]?>|0|zoom100(memoLien)",
   "<img src='style/"+styleActif+"/images/diapo.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>  <?php echo $_SESSION["ws"]["dia"]["diaporama"]?>|0|lanceDiapo(memoLien)","",
   "<img src='style/"+styleActif+"/images/pic90.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>  <?php echo $_SESSION["ws"]["dia"]["rotate90"]?>|<?php echo (($_SESSION["ws"]["auth3"]=="on")?"11":"8"); ?>|modifierImage(1)",
   "<img src='style/"+styleActif+"/images/pic180.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["rotate180"]?>|<?php echo (($_SESSION["ws"]["auth3"]=="on")?"11":"8"); ?>|modifierImage(2)",
   "<img src='style/"+styleActif+"/images/pic270.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["rotate270"]?>|<?php echo (($_SESSION["ws"]["auth3"]=="on")?"11":"8"); ?>|modifierImage(3)",
   "<img src='style/"+styleActif+"/images/pich.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["flipH"]?>|<?php echo (($_SESSION["ws"]["auth3"]=="on")?"11":"8"); ?>|modifierImage(4)",
   "<img src='style/"+styleActif+"/images/picv.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["flipV"]?>|<?php echo (($_SESSION["ws"]["auth3"]=="on")?"11":"8"); ?>|modifierImage(5)",
   "<img src='style/"+styleActif+"/images/resize.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["resize"]?>|<?php echo (($_SESSION["ws"]["auth3"]=="on")?"11":"8"); ?>|modifierImage(6)","",
   "<img src='style/"+styleActif+"/images/print.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>  <?php echo $_SESSION["ws"]["dia"]["toPrint"]?>|0|imprimerCadre('cadrpic')",
   "<img src='style/"+styleActif+"/images/save.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["savePic"]?>|0|sauverimage(actuel)");

// Menu contextuel de la coloration syntaxique
items_affichlangcode  = new Array
  ("<img src='style/"+styleActif+"/images/vide.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   PHP|0|document.getElementById('apercu').contentWindow.editContent.edit('cp-php','php')",
   "<img src='style/"+styleActif+"/images/vide.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   Javascript|0|document.getElementById('apercu').contentWindow.editContent.edit('cp-javascript','javascript')",
   "<img src='style/"+styleActif+"/images/vide.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   Java|0|document.getElementById('apercu').contentWindow.editContent.edit('cp-java','java')",
   "<img src='style/"+styleActif+"/images/vide.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   HTML|0|document.getElementById('apercu').contentWindow.editContent.edit('cp-html','html')",
   "<img src='style/"+styleActif+"/images/vide.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   CSS|0|document.getElementById('apercu').contentWindow.editContent.edit('cp-css','css')",
   "<img src='style/"+styleActif+"/images/vide.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   ASP|0|document.getElementById('apercu').contentWindow.editContent.edit('cp-javascript','javascript')",
   "<img src='style/"+styleActif+"/images/vide.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   C#|0|document.getElementById('apercu').contentWindow.editContent.edit('cp-javascript','javascript')",
   "<img src='style/"+styleActif+"/images/vide.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   Ruby|0|document.getElementById('apercu').contentWindow.editContent.edit('cp-javascript','javascript')",
   "<img src='style/"+styleActif+"/images/vide.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   VBscript|0|document.getElementById('apercu').contentWindow.editContent.edit('cp-javascript','javascript')",
   "<img src='style/"+styleActif+"/images/vide.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   XSL|0|document.getElementById('apercu').contentWindow.editContent.edit('cp-javascript','javascript')",
   "<img src='style/"+styleActif+"/images/vide.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   Perl|0|document.getElementById('apercu').contentWindow.editContent.edit('cp-perl','perl')",
   "<img src='style/"+styleActif+"/images/vide.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   SQL|0|document.getElementById('apercu').contentWindow.editContent.edit('cp-sql','sql')",
   "<img src='style/"+styleActif+"/images/vide.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   Text|0|document.getElementById('apercu').contentWindow.editContent.edit('cp-txt','text')");


// Menu contextuel de la fonction de changement de style
items_affichcss  = new Array
  ("<img src='style/"+styleActif+"/images/vide.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["changeStyle"]?> :|9|rien(actuel)",""
<?php
  $handle = opendir("../style/");
  while (false !== ($entry = readdir($handle))) {
    if ((preg_match("/\.css/", $entry))==1) {
      $nomcss = substr($entry,0,-4);
      echo ",\n".'" '."<img src='".$_SESSION["ws"]["cheminImg"]."css.".$_SESSION["ws"]["formatExt"]."' class='boutonsMenuContext'> ".$nomcss."|0|changeStyle('".$nomcss."')".'"'; }
  }
  echo ");\n";
  closedir($handle);
?>

tabFileInfo.fileInfoButtonPrecedent= {
  num : "ButtonPrecedent", lnk : "", nom : "", ext : "precedent", lab : "", tai : "", prm : "", pro : "", dtm : "", web : "", fav : "", srv : "" };
tabFileInfo.fileInfoButtonParent= {
  num : "ButtonParent",    lnk : "", nom : "", ext : "parent",    lab : "", tai : "", prm : "", pro : "", dtm : "", web : "", fav : "", srv : "" };
tabFileInfo.fileInfoButtonUpdate= {
  num : "ButtonUpdate",    lnk : "", nom : "", ext : "update",    lab : "", tai : "", prm : "", pro : "", dtm : "", web : "", fav : "", srv : "" };
tabFileInfo.fileInfoButtonAffichNew= {
  num : "ButtonAffichNew", lnk : "", nom : "", ext : "affichnew", lab : "", tai : "", prm : "", pro : "", dtm : "", web : "", fav : "", srv : "" };
tabFileInfo.fileInfoButtonAffichOpt= {
  num : "ButtonAffichOpt", lnk : "", nom : "", ext : "affichopt", lab : "", tai : "", prm : "", pro : "", dtm : "", web : "", fav : "", srv : "" };
tabFileInfo.fileInfoButtonAffichVue= {
  num : "ButtonAffichVue", lnk : "", nom : "", ext : "affichvue", lab : "", tai : "", prm : "", pro : "", dtm : "", web : "", fav : "", srv : "" };
tabFileInfo.fileInfoButtonAffichType= {
  num : "ButtonAffichType",lnk : "", nom : "", ext : "affichtype",lab : "", tai : "", prm : "", pro : "", dtm : "", web : "", fav : "", srv : "" };
tabFileInfo.fileInfoButtonAffichTri= {
  num : "ButtonAffichTri", lnk : "", nom : "", ext : "affichtri", lab : "", tai : "", prm : "", pro : "", dtm : "", web : "", fav : "", srv : "" };
tabFileInfo.fileInfoButtonAffichCss= {
  num : "ButtonAffichCss", lnk : "", nom : "", ext : "affichcss", lab : "", tai : "", prm : "", pro : "", dtm : "", web : "", fav : "", srv : "" };
tabFileInfo.fileInfoButtonAffichAdmin= {
  num : "ButtonAffichAdmin",lnk : "",nom : "", ext : "affichadmin",lab : "",tai : "", prm : "", pro : "", dtm : "", web : "", fav : "", srv : "" };
tabFileInfo.fileInfoButtonQuit= {
  num : "ButtonQuit",      lnk : "", nom : "", ext : "buttonquit",lab : "", tai : "", prm : "", pro : "", dtm : "", web : "", fav : "", srv : "" };


menu_general= 
      "<img src='style/"+styleActif+"/images/bt1.<?php echo $_SESSION["ws"]["formatExt"]?>'  class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["previousPage"]?>\" onmouseover=\"elementOver(this,'ButtonPrecedent')\"    onmouseout=\"elementOut(this)\" onclick=\"if (boutonBack.length) naviguer(boutonBack)\"> &nbsp;"+
      "<img src='style/"+styleActif+"/images/bt2.<?php echo $_SESSION["ws"]["formatExt"]?>'  class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["upDir"]?>\"        onmouseover=\"elementOver(this,'ButtonParent')\"       onmouseout=\"elementOut(this)\" onclick=\"if (boutonUp.length) naviguer(boutonUp)\"> &nbsp;"+
      "<img src='style/"+styleActif+"/images/bt3.<?php echo $_SESSION["ws"]["formatExt"]?>'  class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["updateDir"]?>\"    onmouseover=\"elementOver(this,'ButtonUpdate')\"       onmouseout=\"elementOut(this)\" onclick=\"actualiser()\"> &nbsp;"+
      "<img src='style/"+styleActif+"/images/bt5.<?php echo $_SESSION["ws"]["formatExt"]?>'  class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["addNew"]?>\"       onmouseover=\"elementOver(this,'ButtonAffichNew')\"    onmouseout=\"elementOut(this)\" onclick=\"context_open()\"> &nbsp;"+
      "<img src='style/"+styleActif+"/images/bt22.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["options"].$_SESSION["ws"]["dia"]["ofDir"]?>\" onmouseover=\"elementOver(this,'ButtonAffichOpt')\" onmouseout=\"elementOut(this)\"  onclick=\"context_open()\"> &nbsp;"+
      "<img src='style/"+styleActif+"/images/bt4.<?php echo $_SESSION["ws"]["formatExt"]?>'  class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["expPanel"]?>\"     onmouseover=\"elementOver(this,'ButtonAffichVue')\"    onmouseout=\"elementOut(this)\" onclick=\"context_open()\"> &nbsp;"+
      "<img src='style/"+styleActif+"/images/bt6.<?php echo $_SESSION["ws"]["formatExt"]?>'  class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["affichage"]?>\"    onmouseover=\"elementOver(this,'ButtonAffichType')\"   onmouseout=\"elementOut(this)\" onclick=\"context_open()\"> &nbsp;"+
      "<img src='style/"+styleActif+"/images/bt7.<?php echo $_SESSION["ws"]["formatExt"]?>'  class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["sortFile"]?>\"     onmouseover=\"elementOver(this,'ButtonAffichTri')\"    onmouseout=\"elementOut(this)\" onclick=\"context_open()\"> &nbsp;"+
      "<img src='style/"+styleActif+"/images/bt8.<?php echo $_SESSION["ws"]["formatExt"]?>'  class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["changeStyle"]?>\"  onmouseover=\"elementOver(this,'ButtonAffichCss')\"    onmouseout=\"elementOut(this)\" onclick=\"context_open()\"> &nbsp;"+
      "<img src='style/"+styleActif+"/images/bt9.<?php echo $_SESSION["ws"]["formatExt"]?>'  class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["options"]?>\"      onmouseover=\"elementOver(this,'ButtonAffichAdmin')\"  onmouseout=\"elementOut(this)\" onclick=\"context_open()\"> &nbsp;"+
      "<img src='style/"+styleActif+"/images/exit.<?php echo $_SESSION["ws"]["formatExt"]?>' title=\"<?php echo $_SESSION["ws"]["dia"]["toQuit"]?>\"                           onmouseover=\"elementOver(this,'ButtonQuit')\"         onmouseout=\"elementOut(this)\" onclick=\"confirmQuitter(actuel)\"> &nbsp;";

menu_images=
      "<img src='style/"+styleActif+"/images/bt1.<?php echo $_SESSION["ws"]["formatExt"]?>'  class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["previous"]?>\"    onclick='precedente();'> &nbsp;"+
      "<img src='style/"+styleActif+"/images/bt10.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["next"]?>\"        onclick='suivante();'> &nbsp;"+
      "<img src='style/"+styleActif+"/images/bt11.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["zoomp"]?>\"       onclick='zoomp();'> &nbsp;"+
      "<img src='style/"+styleActif+"/images/bt12.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["zoomm"]?>\"       onclick='zoomm();'> &nbsp;"+
      "<span id='switchdiapo'><img src='style/"+styleActif+"/images/bt13.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["diaporama"]?>\"   onclick='lanceDiapo();'></span> &nbsp;"+
      "<img src='style/"+styleActif+"/images/bt19.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["property"]?>\"    onclick='reloadExif();'> &nbsp;"+
      "<img src='style/"+styleActif+"/images/bt14.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["toPrint"]?>\"     onclick='imprimerCadre(\"cadrpic\");'> &nbsp;"+
      "<img src='style/"+styleActif+"/images/bt15.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["savePic"]?>\"     onclick='sauverimage();'> &nbsp;"+
      "<span id='switchfull'><img src='style/"+styleActif+"/images/bt20.<?php echo $_SESSION["ws"]["formatExt"]?>'  class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["fullScreen"]?>\"    onclick='openFull();'></span> &nbsp;"+
      "<img src='style/"+styleActif+"/images/close.<?php echo $_SESSION["ws"]["formatExt"]?>'  title=\"<?php echo $_SESSION["ws"]["dia"]["closeWindow"]?>\" onclick='cacher();'> &nbsp;";

menu_liens=
      "<span id='switchfull'><img src='style/"+styleActif+"/images/bt20.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["fullScreen"]?>\"    onclick='openFull();'></span> &nbsp;"+
      "<img src='style/"+styleActif+"/images/bt1.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["previousPage"]?>\"   onclick='previousPage()'> &nbsp;"+
      "<img src='style/"+styleActif+"/images/bt10.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["nextPage"]?>\"      onclick='nextPage()'> &nbsp;"+
      "<img src='style/"+styleActif+"/images/close.<?php echo $_SESSION["ws"]["formatExt"]?>'  title=\"<?php echo $_SESSION["ws"]["dia"]["closeWindow"]?>\" onclick='cacher();'> &nbsp;";

menu_divers=
      "<span id='switchfull'><img src='style/"+styleActif+"/images/bt20.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["fullScreen"]?>\"    onclick='openFull();'></span> &nbsp;"+
      "<img src='style/"+styleActif+"/images/close.<?php echo $_SESSION["ws"]["formatExt"]?>'  title=\"<?php echo $_SESSION["ws"]["dia"]["closeWindow"]?>\" onclick='cacher();'> &nbsp;";

menu_editer=
      "<span id='switchfull'><img src='style/"+styleActif+"/images/bt20.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["fullScreen"]?>\"  onclick='openFull();'></span> &nbsp;"+
      "<img src='style/"+styleActif+"/images/bt23.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["colorMode"]?>\"     onmouseover=\"iciPro='';iciType='affichlangcode'\" onmouseout=\"iciType='defaut'\"  onclick=\"memoContext();context_open()\"> &nbsp;"+
      "<img src='style/"+styleActif+"/images/bt24.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["lineNumbers"]?>\"   onclick='document.getElementById(\"apercu\").contentWindow.editContent.toggleLineNumbers();'> &nbsp;"+
      "<img src='style/"+styleActif+"/images/bt25.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["modePreview"]?>\"   onclick='document.getElementById(\"apercu\").contentWindow.modePreview();'> &nbsp;"+
      "<img src='style/"+styleActif+"/images/bt26.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["modeDefault"]?>\"   onclick='document.getElementById(\"apercu\").contentWindow.modeSimple();'> &nbsp;"+
      "<img src='style/"+styleActif+"/images/bt15.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["savePic"]?>\"       onclick='document.getElementById(\"apercu\").contentWindow.maj();'> &nbsp;"+
      "<img src='style/"+styleActif+"/images/close.<?php echo $_SESSION["ws"]["formatExt"]?>'  title=\"<?php echo $_SESSION["ws"]["dia"]["closeWindow"]?>\" onclick='cacher();'> &nbsp;";

menu_web=
      "<span id='switchfull'><img src='style/"+styleActif+"/images/bt20.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["fullScreen"]?>\"  onclick='openFull();'></span> &nbsp;"+
      "<img src='style/"+styleActif+"/images/bt1.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["previousPage"]?>\"   onclick='previousPage()'> &nbsp;"+
      "<img src='style/"+styleActif+"/images/bt10.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["nextPage"]?>\"      onclick='nextPage()'> &nbsp;"+
      "<img src='style/"+styleActif+"/images/close.<?php echo $_SESSION["ws"]["formatExt"]?>'  title=\"<?php echo $_SESSION["ws"]["dia"]["closeWindow"]?>\" onclick='cacher();'> &nbsp;";

menu_vide=
      "<span id='switchfull'><img src='style/"+styleActif+"/images/bt20.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenu' title=\"<?php echo $_SESSION["ws"]["dia"]["fullScreen"]?>\"  onclick='openFull();'></span> &nbsp;"+
      "<img src='style/"+styleActif+"/images/close.<?php echo $_SESSION["ws"]["formatExt"]?>'  title=\"<?php echo $_SESSION["ws"]["dia"]["closeWindow"]?>\" onclick='cacher();'> &nbsp;";


// Ajout de la fonction associee

<?php
     if (is_dir("../plugins/")) {
       $listeModules= array(); $numMod=0;
       $handle = opendir("../plugins/");
       while (false !== ($entry = readdir($handle))) {
         if (is_dir("../plugins/".$entry)&&($entry!="..")&&($entry!=".")) {
         $listeModules[$numMod] = array();
         $listeModules[$numMod]["name"] = basename($entry);
         $listeModules[$numMod]["labl"] = @file_get_contents("../plugins/".$entry."/label.txt");
         if (empty($listeModules[$numMod]["labl"])) $listeModules[$numMod]["labl"]=$_SESSION["ws"]["dia"]["openFileWith"];
         $numMod++; }
       }
       closedir($handle);
     }

     foreach ($_SESSION["ws"]["assoc"] as $nom => $valeur) {
      $datas= explode("|",$valeur); $countAction=0;
      echo "$nom = new Array (";
        switch ($valeur["extactp"]) {
      case "1": $fonc="ouvrir";     $icon="voir";        $dialog=$_SESSION["ws"]["dia"]["openFile"];     $lienWeb='memoLien'; break;
      case "2": $fonc="ouvrirAvec"; $icon="voirplus";    $dialog=$_SESSION["ws"]["dia"]["openFileWith"]; $lienWeb='memoLien'; break;
      case "3": $fonc="sauver";     $icon="save";        $dialog=$_SESSION["ws"]["dia"]["savePic"];      $lienWeb='memoLien'; break;
      case "4": $fonc="naviguer";   $icon="goto";        $dialog=$_SESSION["ws"]["dia"]["toVisit"];      $lienWeb='memoLien'; break;
      case "5": $fonc="visiter";    $icon="web";         $dialog=$_SESSION["ws"]["dia"]["toVisit"];      $lienWeb='memoWeb';  break;
      case "6": $fonc="afficher";   $icon="zoom";        $dialog=$_SESSION["ws"]["dia"]["toView"];       $lienWeb='memoLien'; break;
      case "7": $fonc="visionner";  $icon="visio";       $dialog=$_SESSION["ws"]["dia"]["toWatch"];      $lienWeb='memoLien'; break;
      case "8": $fonc="ecouter";    $icon="ecoute";      $dialog=$_SESSION["ws"]["dia"]["toListen"];     $lienWeb='memoLien'; break;
      case "9": $fonc="imprimer";   $icon="print";       $dialog=$_SESSION["ws"]["dia"]["toPrint"];      $lienWeb='memoLien'; break;
      case "10": $fonc="dezipper";  $icon="unzip";       $dialog=$_SESSION["ws"]["dia"]["toDezip"];      $lienWeb='memoLien'; break;
      case "11": $fonc="editer";    $icon="edit";        $dialog=$_SESSION["ws"]["dia"]["toEdit"];       $lienWeb='memoLien'; break;
      case "12": $fonc="modifier";  $icon="edit";        $dialog=$_SESSION["ws"]["dia"]["toModify"];     $lienWeb='memoLien'; break;
      default:   $fonc=$valeur["extactp"]; $icon="edit"; $dialog=$_SESSION["ws"]["dia"]["toEdit"];       $lienWeb='memoLien'; break; }
    if (intval($valeur["extactp"])!=0) {
          if ($valeur["extactp"]!=3) { echo "'<img src=".'"'.$_SESSION["ws"]["cheminImg"].$icon.".".$_SESSION["ws"]["formatExt"].'"'." class=\"boutonsMenuContext\"> <b>".addslashes($dialog)."</b>|6|".$fonc."(".$lienWeb.")',"; $countAction++; }
        } else {
      $valMod=8; $label=$_SESSION["ws"]["dia"]["openFile"]; $icone=$_SESSION["ws"]["cheminImg"]."voir.";
      foreach ($listeModules as $actMod) {
      if ($actMod["name"]==$fonc) { $label=$actMod["labl"]; $icone="plugins/".$fonc."/icon."; $valMod=6;
                                    if ((preg_match("/edit/i", $label)==1)&&($_SESSION["ws"]["auth3"]!="on")) $valMod=8; }
        }
          echo "'<img src=".$icone.$_SESSION["ws"]["formatExt"]." class=\"boutonsMenuContext\"> <b>".addslashes($label)."</b>|".$valMod."|openModule(\'".$fonc."\',memoLien,\'".$icone.$_SESSION["ws"]["formatExt"]."\')',"; $countAction++; }

        switch ($valeur["extacts"]) {
      case "1": $fonc="ouvrir";     $icon="voir";        $dialog=$_SESSION["ws"]["dia"]["openFile"];     $lienWeb='memoLien'; break;
      case "2": $fonc="ouvrirAvec"; $icon="voirplus";    $dialog=$_SESSION["ws"]["dia"]["openFileWith"]; $lienWeb='memoLien'; break;
      case "3": $fonc="sauver";     $icon="save";        $dialog=$_SESSION["ws"]["dia"]["savePic"];      $lienWeb='memoLien'; break;
      case "4": $fonc="naviguer";   $icon="goto";        $dialog=$_SESSION["ws"]["dia"]["toVisit"];      $lienWeb='memoLien'; break;
      case "5": $fonc="visiter";    $icon="web";         $dialog=$_SESSION["ws"]["dia"]["toVisit"];      $lienWeb='memoWeb';  break;
      case "6": $fonc="afficher";   $icon="zoom";        $dialog=$_SESSION["ws"]["dia"]["toView"];       $lienWeb='memoLien'; break;
      case "7": $fonc="visionner";  $icon="visio";       $dialog=$_SESSION["ws"]["dia"]["toWatch"];      $lienWeb='memoLien'; break;
      case "8": $fonc="ecouter";    $icon="ecoute";      $dialog=$_SESSION["ws"]["dia"]["toListen"];     $lienWeb='memoLien'; break;
      case "9": $fonc="imprimer";   $icon="print";       $dialog=$_SESSION["ws"]["dia"]["toPrint"];      $lienWeb='memoLien'; break;
      case "10": $fonc="dezipper";  $icon="unzip";       $dialog=$_SESSION["ws"]["dia"]["toDezip"];      $lienWeb='memoLien'; break;
      case "11": $fonc="editer";    $icon="edit";        $dialog=$_SESSION["ws"]["dia"]["toEdit"];       $lienWeb='memoLien'; break;
      case "12": $fonc="modifier";  $icon="edit";        $dialog=$_SESSION["ws"]["dia"]["toModify"];     $lienWeb='memoLien'; break;
      default:   $fonc=$valeur["extacts"]; $icon="edit"; $dialog=$_SESSION["ws"]["dia"]["toEdit"];       $lienWeb='memoLien'; break; }
    if (intval($valeur["extacts"])!=0) {
          if ($valeur["extacts"]!=3) { echo "'<img src=".'"'.$_SESSION["ws"]["cheminImg"].$icon.".".$_SESSION["ws"]["formatExt"].'"'." class=\"boutonsMenuContext\"> <b>".addslashes($dialog)."</b>|6|".$fonc."(".$lienWeb.")',"; $countAction++; }
        } else {
      $valMod=8; $label=$_SESSION["ws"]["dia"]["toEdit"]; $icone=$_SESSION["ws"]["cheminImg"]."edit.";
      foreach ($listeModules as $actMod) {
      if ($actMod["name"]==$fonc) { $label=$actMod["labl"]; $icone="plugins/".$fonc."/icon."; $valMod=6;
                                    if ((preg_match("/edit/i", $label)==1)&&($_SESSION["ws"]["auth3"]!="on")) $valMod=8; }
      }
        echo "'<img src=".$icone.$_SESSION["ws"]["formatExt"]." class=\"boutonsMenuContext\"> <b>".addslashes($label)."</b>|".$valMod."|openModule(\'".$fonc."\',memoLien,\'".$icone.$_SESSION["ws"]["formatExt"]."\')',"; $countAction++; }


        if ($countAction!=0) echo "''"; echo ");\n";
        echo "items_$nom = $nom.concat(global);\n";
  } ?>
  items_std= global;
  items_jpeg.pop(); items_jpeg.push(
     "<img src='style/"+styleActif+"/images/update.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["refreshMini"]?>|6|actualiseMini(memoLien)",
     "<img src='style/"+styleActif+"/images/pic.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>    <?php echo $_SESSION["ws"]["dia"]["background"]?>|6|fondEcran(memoLien)",
     "<img src='style/"+styleActif+"/images/info.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["property"]?>|6|detailer(memoLien)");
  items_jpg.pop();  items_jpg.push(
     "<img src='style/"+styleActif+"/images/update.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'> <?php echo $_SESSION["ws"]["dia"]["refreshMini"]?>|6|actualiseMini(memoLien)",
     "<img src='style/"+styleActif+"/images/pic.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>    <?php echo $_SESSION["ws"]["dia"]["background"]?>|6|fondEcran(memoLien)",
     "<img src='style/"+styleActif+"/images/info.<?php echo $_SESSION["ws"]["formatExt"]?>' class='boutonsMenuContext'>   <?php echo $_SESSION["ws"]["dia"]["property"]?>|6|detailer(memoLien)");


tabAction["dossier"]= "naviguer";
tabAction["sup"] = "remonter";
tabAction["trb"] = "naviguer";

  <?php $listeExt="std|";
        foreach ($_SESSION["ws"]["assoc"] as $nom => $valeur) {
      $datas= explode("|",$valeur);
        switch ($valeur["extactp"]) {
      case "1":  $fonc="ouvrir";     $icon="voir";      break;
      case "2":  $fonc="ouvrirAvec"; $icon="voirplus";  break;
      case "3":  $fonc="sauver";     $icon="save";      break;
      case "4":  $fonc="naviguer";   $icon="goto";      break;
      case "5":  $fonc="visiter";    $icon="web";       break;
      case "6":  $fonc="afficher";   $icon="zoom";      break;
      case "7":  $fonc="visionner";  $icon="visio";     break;
      case "8":  $fonc="ecouter";    $icon="ecoute";    break;
      case "9":  $fonc="imprimer";   $icon="print";     break;
      case "10": $fonc="dezipper";   $icon="unzip";     break;
      case "11": $fonc="editer";     $icon="edit";      break;
      case "12": $fonc="modifier";   $icon="edit";      break;
          default:   $fonc=$valeur["extactp"]; $icon="edit"; break;
      }
      if (intval($valeur["extactp"])!=0) {
          echo "tabAction['".$nom."']='".$fonc."';\n";
      } else {
        $valMod=0;
        foreach ($listeModules as $actMod) {
      if ($actMod["name"]==$fonc) $valMod=1;  $icone="plugins/".$fonc."/icon."; }
      if ($valMod==1) echo "tabAction['".$nom."']='openModule(\'".$fonc."\',lienElement,\'".$icone.$_SESSION["ws"]["formatExt"]."\')';\n";
                 else echo "tabAction['".$nom."']='sauver';\n";
    }
        if (strlen($nom)>0) $listeExt.="^".$nom."$|";
  }
  echo 'listeExt= "'.substr($listeExt,0,strlen($listeExt)-1).'";'."\n";
  ?>
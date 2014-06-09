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
// Fonction : Fichier de traduction version française
// Nom      : Francais.lang.php
// Version  : 0.8.2
// Date     : 14/05/08
// =======================================================================

  if (isset($_REQUEST["name"])&&(intval($_REQUEST["name"])==1))
    $nameLanguage      ="French - Fran&ccedil;ais"; else {

  $listeMois= array("","Jan.","Fév.","Mars","Avr.","Mai","Juin","Juil.","Août","Sept","Oct.","Nov.","Déc.");
  $listeJour= array("","Mon"=>"Lundi","Tue"=>"Mardi","Wed"=>"Mercredi","Thu"=>"Jeudi","Fri"=>"Vendredi","Sat"=>"Samedi","Sun"=>"Dimanche");

  $dia= array();

  // Panneau de login
  $dia["ident"]             ="Veuillez indiquer vos identifiants :";
  $dia["cantIdent"]         ="Identification erronée.";
  $dia["identProblem1"]     ="Serveur inaccessible.";
  $dia["identProblem2"]     ="Problème technique.";
  $dia["identProblem3"]     ="La connexion au serveur LDAP n'a pu être établie.";
  $dia["enter"]             ="Entrer";

  // Interface
  $dia["loading"]           ="Chargement en cours";
  $dia["actualDir"]         ="Dossier actuel : ";
  $dia["connected"]         ="Connecté(e) en tant que ";
  $dia["directLink"]        ="Lien direct";
  $dia["filePreview"]       ="Aperçu du fichier";
  $dia["pictPreview"]       ="Aperçu de l'image";
  $dia["webPreview"]        ="Navigation sur ";
  $dia["niveauSup"]         ="Niveau supérieur";
  $dia["closePanel"]        ="Fermer le panneau";
  $dia["picTooBig"]         ="Image trop grande pour etre affichée.";
  $dia["previousPage"]      ="Page précédente";
  $dia["nextPage"]          ="Page suivante";
  $dia["upDir"]             ="Remonter d'un niveau";
  $dia["updateDir"]         ="Actualiser";
  $dia["changeStyle"]       ="Changer de style";
  $dia["refreshTree"]       ="Rafraîchir l'arborescence";
  $dia["hideTree"]          ="Réduire l'arborescence";
  $dia["showTree"]          ="Deployer l'arborescence";
  $dia["printGallery"]      ="Imprimer la galerie";
  $dia["renameAll"]         ="Tout renommer";
  $dia["saveAll"]           ="Tout enregistrer";
  $dia["savePic"]           ="Enregistrer";
  $dia["webSite"]           ="Site Web";
  $dia["affichage"]         ="Affichage";
  $dia["expPanel"]          ="Volet d'exploration";
  $dia["background"]        ="Fond d'écran";
  $dia["miniature"]         ="Miniatures";
  $dia["bigIcone"]          ="Grandes icones";
  $dia["liste"]             ="Liste";
  $dia["details"]           ="Détails";
  $dia["none"]              ="Aucun";
  $dia["arbo"]              ="Arborescence";
  $dia["closeWindow"]       ="Fermer";
  $dia["viewContent"]       ="Afficher contenu";
  $dia["changeUser"]        ="Changer l'utilisateur";
  $dia["onlineHelp"]        ="Aide en ligne";
  $dia["rapport"]           ="Soumettre un bug";
  $dia["options"]           ="Options";
  $dia["contact"]           ="Contact";
  $dia["about"]             ="A propos de ";
  $dia["total"]             ="Total";
  $dia["used"]              ="Utilisé";
  $dia["free"]              ="Libre";
  $dia["octet"]             ="o";
  $dia["selectAll"]         ="Tout sélectionner";
  $dia["select"]            ="Sélectionner";
  $dia["unselect"]          ="Déselectionner";
  $dia["expression"]        ="l'expression";
  $dia["inAllFiles"]        ="dans tous les noms de fichiers";
  $dia["distribGPL"]        ="Distribué sous license GPL";
  $dia["moreInfos"]         ="Visiter le site officiel pour plus d'informations";
  $dia["websiteAdr"]        ="www.webshare.fr";

  // Verbes / actions
  $dia["openFile"]          ="Ouvrir";
  $dia["openFileWith"]      ="Ouvrir avec";
  $dia["saveFile"]          ="Enregistrer";
  $dia["toExplore"]         ="Explorer";
  $dia["toBrowse"]          ="Parcourir";
  $dia["toVisit"]           ="Visiter";
  $dia["toView"]            ="Afficher";
  $dia["toWatch"]           ="Visionner";
  $dia["toListen"]          ="Ecouter";
  $dia["toPrint"]           ="Imprimer";
  $dia["toUpload"]          ="Charger";
  $dia["toCut"]             ="Couper";
  $dia["toCopy"]            ="Copier";
  $dia["toPaste"]           ="Coller";
  $dia["toMove"]            ="Déplacer";
  $dia["toDelete"]          ="Supprimer";
  $dia["toChmod"]           ="Autoriser";
  $dia["toSearch"]          ="Rechercher";
  $dia["toRename"]          ="Renommer";
  $dia["toComment"]         ="Commenter";
  $dia["toValid"]           ="Valider";
  $dia["toEdit"]            ="Editer";
  $dia["toModify"]          ="Modifier";
  $dia["toZip"]             ="Zipper";
  $dia["toDezip"]           ="Dézipper l'archive";
  $dia["toRecover"]         ="Rapatrier";
  $dia["toConnect"]         ="Connecter";
  $dia["toQuit"]            ="Quitter";
  $dia["toVerify"]          ="Vérifier";
  $dia["toReplace"]         ="Remplacer";
  $dia["choose"]            ="Choisissez...";
  
  // Chargement de fichier
  $dia["addUpload"]         ="Ajouter un fichier";
  $dia["startUpload"]       ="Démarrer le chargement";
  $dia["limitTaille"]       ="La taille maximum autorisée en upload par le serveur est de ";
  $dia["ifFileExist"]       ="En cas de fichier déjà existant :";
  $dia["replaceFile"]       ="Ecraser";
  $dia["renameFile"]        ="Renommer";
  $dia["cancelFile"]        ="Annuler";
  $dia["waitingDownload"]   ="En attente du chargement";
  $dia["problemDownload"]   ="Un problème est survenu durant le téléchargement";
  $dia["prohibited"]        ="Vous ne disposez pas des droits appropriés.";
  $dia["downloading"]       ="Téléchargement en cours";
  $dia["uploading"]         ="Chargement en cours";
  $dia["started"]           ="Démarré";
  $dia["success"]           ="Téléchargement réussi";
  $dia["tempNotSet"]        ="Répertoire temporaire indéfini";
  $dia["withSuccess"]       ="avec succès";
  $dia["uploaded"]          ="téléchargé.";
  $dia["succesUpload"]      ="téléchargé avec succès";
  $dia["cantOpen"]          ="Impossible d'ouvrir le fichier ";
  $dia["cantWrite"]         ="Impossible d'écrire dans le fichier ";
  $dia["fileTooBig"]        ="La taille du fichier dépasse la limite autorisée.";
  $dia["wait"]              ="En attente";

  // Creation de nouveaux élements
  $dia["newFile"]           ="Nouveau fichier";
  $dia["newDir"]            ="Nouveau dossier";
  $dia["newTxt"]            ="Nouveau texte";
  $dia["newLink"]           ="Nouveau lien";
  $dia["making"]            ="Création en cours";
  $dia["areYouSure"]        ="Etes-vous sûr de vouloir ";
  $dia["toDisconnect"]      ="vous déconnecter ?";
  $dia["addTxt"]            ="Veuillez entrer le nom du nouveau fichier texte vide :";
  $dia["addDir"]            ="Veuillez entrer le nom du nouveau dossier :";
  $dia["addNew"]            ="Ajouter un nouveau";
  $dia["addLink"]           ="Entrez le nom ";
  $dia["addLink2"]          ="et l'adresse du nouveau lien :";
  $dia["dirCreate"]         ="La création du dossier";
  $dia["txtCreate"]         ="La création du document texte vide";
  $dia["linkCreate"]        ="La création du lien";
  $dia["linkTo"]            ="Lien vers";
  $dia["created"]           ="créé";
  $dia["theNewDir"]         ="Le nouveau dossier";
  $dia["theNewLink"]        ="Le nouveau lien";
  $dia["theNewTxt"]         ="Le nouveau document texte vide";

  // Réponses
  $dia["File"]              ="Fichier";
  $dia["rep"]               ="Dossier";
  $dia["dir"]               =" dossier";
  $dia["file"]              =" fichier";
  $dia["ofDir"]             =" du dossier ";
  $dia["ofFile"]            =" du fichier ";
  $dia["onFile"]            =" sur le fichier ";
  $dia["toDir"]             =" sur le dossier ";  
  $dia["toFile"]            =" sur le fichier ";   
  $dia["theDir"]            ="Le dossier ";
  $dia["theFile"]           ="Le fichier ";
  $dia["element"]           ="éléments";
  $dia["hasBeen"]           ="a été";
  $dia["hasNotBeen"]        ="n'a pu être ";
  $dia["hasFailed"]         ="a échoué";
  $dia["successful"]        ="effectué avec succès";
  $dia["dezipping"]         ="Dézippage en cours.";
  $dia["dezipped"]          ="décompressé";
  $dia["startEdit"]         ="Début d'édition du fichier ";
  $dia["endEdit"]           ="Fin d'édition du fichier ";
  $dia["confirmEdit"]       ="a été édité et enregistré.";
  $dia["savingDocument"]    ="L'enregistrement du document ";
  $dia["savingDirContent"]  ="Enregistrement du contenu du répertoire ";
  $dia["savingFile"]        ="Enregistrement du fichier ";
  $dia["backgAdded"]        ="L'image a été ajoutée en fond d'écran.";
  $dia["backgRemoved"]      ="Le fond d'écran a été rétiré.";
  $dia["modeDefault"]       ="Mode standard";
  $dia["modePreview"]       ="Mode prévisualisation";
  $dia["lineNumbers"]       ="Afficher les numéros de ligne";
  $dia["colorMode"]         ="Coloration syntaxique";
  $dia["modifyingPrefs"]    ="Modification des préférences en cours";


  // Renommage / Déplacement / Suppression
  $dia["rename"]            ="Entrez le nouveau nom ";
  $dia["renaming"]          ="Renommage en cours";
  $dia["renamed"]           ="renommé";
  $dia["confirmSup"]        ="Confirmer la suppression de cette association ?";
  $dia["delete"]            ="Etes-vous sûr de vouloir supprimer le ";
  $dia["delete2"]           ="ainsi que son contenu ";
  $dia["deleting"]          ="Suppression en cours";
  $dia["deleted"]           ="supprimé";
  $dia["theRemove"]         ="La suppression";
  $dia["copyOf"]            ="Copie-de-";
  $dia["onlyCopy"]          ="mais il a été copié.";
  $dia["fileExist"]         ="Un fichier du même nom existe déja.";
  $dia["goingToCopy"]       ="va être copié, veuillez choisir la destination.";
  $dia["goingToMove"]       ="va être déplacé, veuillez choisir la destination.";
  $dia["moving"]            ="Déplacement en cours ";
  $dia["moved"]             ="déplacé";
  $dia["fileEditing"]       ="Edition du fichier ";
  $dia["copying"]           ="Copie en cours ";
  $dia["copyingFile"]       ="Copie du fichier téléchargé vers sa destination";
  $dia["copied"]            ="copié";
  $dia["toActualDir"]       ="vers le répertoire ";
  $dia["typeOfElement"]     ="Document ";
  $dia["copyTo"]            ="copier";
  $dia["moveTo"]            ="déplacer";
  $dia["prohibCar"]         ="Un caractère interdit ( ? < > : # % + '' ' | & * / ) a été saisi, il a été filtré.";
  $dia["alreadyExist"]      ="Ce dossier ou fichier existe déjà, veuillez saisir un autre nom.";
  $dia["confirmReplace"]    ="Ce nom de dossier ou fichier existe déjà, si vous validez il sera remplacé.";
  $dia["includeSubDir"]     ="Inclure les sous-répertoires ?";

  // Travail collaboratif
  $dia["fileInUse"]         ="Le fichier est en cours de modification ";
  $dia["shallNotDoThis"]    ="Vous ne devriez pas effectuer cette action.";
  $dia["confirmContinue"]   ="Etes-vous sûr de vouloir continuer ?";
  $dia["disallowModif"]     ="Bloquer les modifications";
  $dia["showFileInUse"]     ="Marquer le fichier comme étant en cours de modification ?";
  $dia["allowModif"]        ="Autoriser les modifications";
  $dia["removeFileInUse"]   ="Marquer le fichier comme n'étant plus en cours de modification ?";
  $dia["confirmFileInUse"]  ="Le fichier est marqué comme étant en cours de modification.";
  $dia["confirmFileNotUse"] ="Le fichier n'est plus marqué comme étant en cours de modification.";

  // Gestion des droits
  $dia["modifyPermission"]  ="Modifier les droits";
  $dia["noPermission"]      ="La gestion de ce type de fichier n'est pas autorisée.";
  $dia["noOperation"]       ="Cette opération est interdite.";
  $dia["modifying"]         ="Modification des droits en cours";
  $dia["fileAttributes"]    ="Les droits du fichier";
  $dia["cantModify"]        ="n'ont pu etre modifiés.";
  $dia["modified"]          ="Modifié ";
  $dia["modify"]            ="ont été modifiés.";
  $dia["readWrite"]         ="Lecture-Ecriture";
  $dia["readOnly"]          ="Lecture seule";
  $dia["writeOnly"]         ="Ecriture seule";
  $dia["locked"]            ="Fichier verrouillé";
  $dia["selectAttributes"]  ="Attributs ";
  $dia["modR"]              ="Lec.";
  $dia["modW"]              ="Ecr.";
  $dia["modE"]              ="Exe.";

  // Propriétés / Recherche
  $dia["property"]          ="Propriétés";
  $dia["propertyOf"]        ="Propriétés de";
  $dia["searchIn"]          ="Recherche sur ";
  $dia["search"]            ="Entrez le nom ";
  $dia["search2"]           ="du fichier ou du dossier à rechercher ?";
  $dia["useCasse"]          ="Sensible à la casse ?";
  $dia["searching"]         ="Recherche de";
  $dia["searching2"]        ="en cours";
  $dia["foundIn"]           ="dans";
  $dia["into"]              ="en";
  $dia["and"]               ="et";
  $dia["by"]                ="par";
  $dia["viewed"]            ="Vu";
  $dia["times"]             ="fois";
  $dia["elementsFound"]     =" éléments trouvés.";
  $dia["noResult"]          ="Aucun résultat trouvé.";
  $dia["selectedElement"]   ="élément sélectionné.";
  $dia["selectedElements"]  ="éléments sélectionnés.";
  $dia["selection"]         ="la sélection";


  // Tri des éléments
  $dia["sortFile"]          ="Trier les fichiers";
  $dia["byName"]            ="par nom";
  $dia["byValue"]           ="par valeur";
  $dia["byType"]            ="par type";
  $dia["bySize"]            ="par taille";
  $dia["byDate"]            ="par date";
  $dia["byPerso"]           ="Tri personnel";
  $dia["webSort"]           ="Tri par défaut";
  $dia["ascending"]         ="Ascendant";
  $dia["descending"]        ="Descendant";

  // Commentaires
  $dia["comment"]           ="Commentaire";
  $dia["commentAdded"]      ="Commentaire ajouté.";
  $dia["commentsAdded"]     =" commentaires ajoutés ";
  $dia["commentNotAdded"]   ="Le commentaire n'a pu etre ajouté.";
  $dia["addComment"]        ="Ajouter un commentaire";
  $dia["modifyComment"]     ="Modifier le commentaire";
  $dia["removeComment"]     ="Tout retirer";
  $dia["addingComment"]     ="Ajout du commentaire en cours ";
  $dia["commentFile"]       ="Commentaires sur le fichier ";
  $dia["messageOf"]         ="Message de ";

  // Menu Images
  $dia["previous"]          ="Image précédente";
  $dia["next"]              ="Image suivante";
  $dia["fullScreen"]        ="Plein écran";
  $dia["reducePanel"]       ="Réduire";
  $dia["zoomp"]             ="Zoom +";
  $dia["zoomm"]             ="Zoom -";
  $dia["zooms"]             ="Taille réelle";
  $dia["diaporama"]         ="Diaporama";
  $dia["refreshMini"]       ="Actualiser miniature";
  $dia["rotate90"]          ="Rotation 90° horaire";
  $dia["rotate180"]         ="Rotation 180°";
  $dia["rotate270"]         ="Rotation 90° anti-horaire";
  $dia["flipV"]             ="Miroir vertical";
  $dia["flipH"]             ="Miroir horizontal";
  $dia["resize"]            ="Redimensionner l'image ";
  $dia["keepRatio"]         ="Conserver les proportions ?";
  $dia["width"]             ="Largeur";
  $dia["height"]            ="Hauteur";
  $dia["pixels"]            ="px";

  // Infos EXIF
  $dia["cliche"]            ="CLICH&Eacute;";
  $dia["object"]            ="FICHIER";
  $dia["infocomment"]       ="COMMENTAIRE";
  $dia["FileSize"]          ="Taille";
  $dia["DateTimeOriginal"]  ="Date/Heure";
  $dia["resolution"]        ="Résolution";
  $dia["XResolution"]       ="DPI";
  $dia["Software"]          ="Logiciel";
  $dia["Photographer"]      ="Photographe";
  $dia["ExposureTime"]      ="Temps d'exposition";
  $dia["ApertureFNumber"]   ="Ouverture";
  $dia["MaxApertureValue"]  ="Ouverture Max";
  $dia["ISOSpeedRatings"]   ="ISO";
  $dia["FocalLength"]       ="Focale";
  $dia["ExposureBiasValue"] ="Bias";
  $dia["LightSource"]       ="Eclairage";
  $dia["Flash"]             ="Flash";

  // Envoi d'emails
  $dia["authSendMail"]      ="Autoriser l'envoi d'éléments par mail";
  $dia["sendMail"]          ="Envoyer par mail";
  $dia["titleMail"]         ="Objet du message";
  $dia["recipientMail"]     ="Indiquez l'adresse mail du destinataire";
  $dia["contentMail"]       ="Entrez votre message joint au fichier";
  $dia["sendMailConfirm"]   ="Envoyer votre message";
  $dia["sendingMail"]       ="Envoi du message en cours";  
  $dia["sendMailOK"]        ="Le message a bien été envoyé.";
  $dia["sendMailProblem"]   ="Le message n'a pu être envoyé.";
  $dia["mailSendTitle"]     ="Fichier déposé dans votre espace WebShare";
  $dia["mailSendFile1"]     ="Bonjour, un fichier a été déposé dans votre espace";
  $dia["mailSendFile2"]     ="Cliquez sur ce lien pour télécharger le fichier :";
  $dia["mailSendFile3"]     ="";
  $dia["mailSendFile4"]     ="Bonne continuation.";

  // Gestion des versions
  $dia["version"]           ="Version ";
  $dia["viewAllVersion"]    ="Voir toutes les versions";
  $dia["addNewVersion"]     ="Ajouter une nouvelle version";


  // Corbeille
  $dia["corbeille"]         ="Corbeille";
  $dia["binNoElement"]      ="La corbeille ne contient aucun élément.";
  $dia["binContain"]        ="La corbeille contient ";
  $dia["emptyBin"]          ="Vider la corbeille";
  $dia["emptyBinConfirm"]   ="Souhaitez-vous vraiment vider la corbeille ?";
  $dia["emptyConfirm"]      ="Souhaitez-vous vraiment effacer cet élément ?";
  $dia["emptyBinResult"]    ="La corbeille a été vidée.";
  $dia["viewElements"]      ="Voir tous les éléments";
  $dia["emptyElements"]     ="Vider les éléments de plus de ";
  $dia["activeBin"]         ="Activer la corbeille pour ce partage";
  $dia["restoreElement"]    ="Rétablir l'élément";
  $dia["finally"]           =" définitivement";

  // Favoris
  $dia["favoris"]           ="Favoris";
  $dia["addFav"]            ="Ajouter aux favoris";
  $dia["removeFav"]         ="Retirer des favoris";
  $dia["handleFav"]         ="Gérer les favoris";
  $dia["viewFav"]           ="Voir tous les favoris";
  $dia["favAdded"]          ="Le fichier a été ajouté aux favoris";
  $dia["favRemoved"]        ="Le fichier a été retiré des favoris";

  // Tests des partages
  $dia["shareTest"]         ="Cliquez pour tester le partage.";
  $dia["shareOK"]           ="Ce partage est accessible et dispose de droits suffisants.";
  $dia["shareProtected"]    ="Ce partage est accessible mais ne dispose pas de droits suffisants.";
  $dia["shareNotAcc"]       ="La racine indiquée pour le partage est inaccessible ou n'existe pas.";
  $dia["shareFtpNotAcc"]    ="Impossible de se connecter au serveur.";
  $dia["shareFtpBadLogin"]  ="Le serveur a refusé l'identification, vérifiez vos login et mot de passe.";
  $dia["shareFtpError"]     ="Le serveur a retourné une erreur inconnue.";
  $dia["shareFtpcantMount"] ="Le point de montage n'a pu être atteint sur le serveur.";
  $dia["shareFtpProtected"] ="Le point de montage sur le serveur ne dispose pas de droits suffisants.";
  $dia["shareFtpOK"]        ="Connexion au serveur et test du partage effectués avec succès.";
  $dia["shareAvailable"]    ="Les nouveaux utilisateurs peuvent accéder à ce partage.";

  // Administration
  $dia["adminTitle"]        ="Administration des utilisateurs et serveurs";
  $dia["adminHeader"]       ="ADMINISTRATION";
  $dia["msgFooter"]         ="WebShare sous License GPL";
  $dia["adminAlert1"]       ="Un problème technique est apparu, les modifications n'ont pas été prises en compte. ";
  $dia["adminAlert2"]       ="Les modifications ont été prises en compte.";
  $dia["notActiv"]          ="Cette option n'est pas encore implémentée.";
  $dia["confirmation"]      ="Confirmation";
  $dia["dialConfirm"]       ="Confirmer ?";
  $dia["adminProtected"]    ="Administration protégée";
  $dia["adminNotProtected"] ="Administration non protégée";
  $dia["importConfirm"]     ="Confirmer l'import dans la base de données ?";
  $dia["importToBase"]      ="Importer fichier de configuration dans la base de données";
  $dia["importSuccessful"]  ="Import effectué avec succès.";
  $dia["importFailed"]      ="L'import a échoué.";

  // Panneau Partages
  $dia["adminRub2"]         ="Partages";
  $dia["serverAdmin"]       ="Gestion des partages et répertoires virtuels";
  $dia["newServer"]         ="Nouveau partage";
  $dia["msgInfo1"]          ="Note : Les connexions FTP distantes ne sont pas encore activées.";
  $dia["msgInfo2"]          ="Attention : Les chemins et les noms doivent contenir que des caractères alphabétiques (minuscules ou majuscules) et numériques.";
  $dia["msgInfo3"]          ="La ponctuation, les accents ainsi que les espaces ne sont pas autorisés.";
  $dia["msgInfo4"]          ="Attention : Le dossier d'administration DOIT être renommé pour protéger votre installation.";
  $dia["chooseUser"]        ="Choisissez un utilisateur à supprimer";
  $dia["createUser"]        ="Créez ou modifiez un utilisateur puis validez";
  $dia["chooseServer"]      ="Choisissez un serveur à supprimer";
  $dia["createServer"]      ="Créez ou modifiez un serveur puis validez";
  $dia["selectServer"]      ="Sélectionnez au moins un serveur puis validez";
  $dia["FTP"]               ="FTP";
  $dia["local"]             ="local";
  $dia["serverFtp"]         ="Serveur (FTP)";
  $dia["loginFtp"]          ="Login (FTP)";
  $dia["passFtp"]           ="Password (FTP)";
  $dia["portFtp"]           ="Port (FTP)";
  $dia["shareRoot"]         ="Racine";
  $dia["serverRoot"]        ="Racine serveur ";
  $dia["virtualRoot"]       ="Racine virtuelle";
  $dia["defaultRoot"]       ="Répertoire par défaut";
  $dia["webRoot"]           ="Racine web";
  $dia["protectRep"]        ="Protéger les répertoires en insérant un fichier :";
  $dia["modeDegrade"]       ="Mode dégradé";
  $dia["protectShare"]      ="Les modifications sont autorisées sur ce partage";  
  $dia["serverType"]        ="Type";
  $dia["serverPosition"]    ="Position";
  
  // Panneau Utilisateur
  $dia["adminRub1"]         ="Utilisateurs";
  $dia["userAdmin"]         ="Gestion des utilisateurs";
  $dia["newUser"]           ="Nouvel utilisateur";
  $dia["administrator"]     ="Administrateur";
  $dia["email"]             ="Email";
  $dia["lang"]              ="Langue";
  $dia["user"]              ="Utilisateur";
  $dia["group"]             ="Groupe";
  $dia["name"]              ="Nom";
  $dia["login"]             ="Login";
  $dia["passwd"]            ="Mot de passe";
  $dia["connexion"]         ="connexion";
  $dia["nameShare"]         ="Partage ";
  $dia["access"]            ="Accès aux partages ";
  $dia["default"]           ="Standard";
  $dia["explore"]           ="Exploration";
  $dia["visualis"]          ="Visualisation";
  $dia["leftPanel"]         ="Volet par défaut";
  $dia["webDir"]            ="Affichage répertoires Web";
  $dia["select"]            ="Sélectionner";
  $dia["open"]              ="Ouvrir";
  $dia["menuContext"]       ="Menu contextuel";
  $dia["leftClic"]          ="Clic gauche :";
  $dia["rightClic"]         ="Clic droit :";
  $dia["doubleClic"]        ="Double clic :";
  $dia["toModify"]          ="Modifier";
  $dia["toCreate"]          ="Créer";
  $dia["toRead"]            ="Lire";
  $dia["regexp"]            ="(RegExp > Ajoutez les nouvelles expressions séparées par des | ) :";
  $dia["filterElement"]     ="Filtrer les éléments contenant";
  $dia["recoExtension"]     ="Les extensions suivantes sont reconnues";
  $dia["defStyle"]          ="Style par défaut";
  $dia["sessionTime"]       ="Durée de session (min)";
  $dia["actionAuth"]        ="L'utilisateur est autoriser à effectuer les actions suivantes sur les éléments non vérrouillés :";
  $dia["userType"]          ="Type";
  $dia["createNewAccount"]  ="Créer un nouveau compte utilisateur";
  $dia["chooseAccount"]     ="Choisissez le compte auquel vous souhaitez vous connecter :";

  // Panneau Préférences
  $dia["adminRub3"]         ="Préférences";
  $dia["prefAdmin"]         ="Gestion des préférences";
  $dia["baseAdmin"]         ="Gestion de la base de données";
  $dia["memoMax"]           ="Mémoire allouée pour les scripts ";
  $dia["execMax"]           ="Durée maxi d'éxecution";
  $dia["postMax"]           ="Taille maxi des envois";
  $dia["uploMax"]           ="Taille maxi des uploads";
  $dia["lifeMax"]           ="Durée de vie maxi ";
  $dia["timeMax"]           ="Durée maxi pour les envois ";
  $dia["previewWeb"]        ="Activer l'aperçu des sites web";
  $dia["previewAct"]        ="Activer l'aperçu en miniatures";
  $dia["previewPDF"]        ="Activer l'aperçu des fichiers PDF";
  $dia["logAct"]            ="Activer le suivi des actions";
  $dia["sepAdr"]            ="Séparer l'adresse par des ";
  $dia["alwaysConfirm"]     ="Confirmer chaque action";
  $dia["effectAct"]         ="Activer les effets graphiques";
  $dia["completePath"]      ="Afficher les chemins complets";
  $dia["openLinkinNewWin"]  ="Ouvrir les liens dans une nouvelle fenêtre";
  $dia["frameTitle"]        ="Titre de la fenêtre";
  $dia["viewClock"]         ="Afficher l'horloge";
  $dia["diapoSpeed"]        ="Vitesse de rotation du diaporama";
  $dia["diapoStop"]         ="Arrêter le diaporama";
  $dia["arboLink"]          ="Afficher les liens dans l'arbre";
  $dia["activeMini"]        ="Activer la création des miniatures";
  $dia["dynWindow"]         ="Fenêtrage dynamique";
  $dia["serverBase"]        ="Serveur mySQL";
  $dia["loginBase"]         ="Login mySQL";
  $dia["passBase"]          ="Password mySQL";
  $dia["tableBase"]         ="Sélection de la base";
  $dia["myPref"]            ="Mes préférences";
  $dia["privateWS"]         ="Partage privé";
  $dia["publicWS"]          ="Partage en accès libre";
  $dia["accountUser"]       ="Les utilisateurs peuvent créer leur propre compte";


  // Panneau Infos
  $dia["adminRub5"]         ="Informations";
  $dia["infoAdmin"]         ="Récapitulatif des informations d'installation";
  $dia["theExt"]            ="L'extension";
  $dia["activated"]         =" est activée.";
  $dia["notActivated"]      =" n'est pas activée.";
  $dia["libZip"]            ="(Gestion des archives Zip)";
  $dia["libGD"]             ="(Gestion des images et miniatures)";
  $dia["libMB"]             ="(Gestion des caractères spéciaux)";
  $dia["libXslt"]           ="(Gestion Xslt complémentaire)";
  $dia["libFTP"]            ="(Connexions FTP distantes)";
  $dia["libPdf"]            ="(Affiche les miniatures PDF)";
  $dia["libMail"]           ="(Envoi des élements par mail)";
  $dia["libExif"]           ="(Affiche les informations Exif)";
  $dia["dontExist"]         ="n'existe pas.";
  $dia["notAccessible"]     ="n'existe pas ou n'est pas accessible.";
  $dia["accessProtect"]     ="existe mais n'est pas accessible en écriture.";
  $dia["isAccessible"]      ="existe et est accessible en écriture.";
  $dia["modulesDetected"]   ="a été détécté et contient les modules suivants :";
  $dia["langDetected"]      ="a été détécté et contient les langues suivantes :";
  $dia["styleDetected"]     ="a été détécté et contient les styles suivants :";
  $dia["cgiUpNotDetected"]  ="n'a pas été détecté.";
  $dia["cgiUpLimited"]      ="a été détecté mais ne dispose pas des droits suffisants.";
  $dia["cgiUpDetected"]     ="a été détecté et dispose des droits suffisants.";
  $dia["unlimitedUpload"]   ="Vous pouvez uploader des fichiers de taille potentiellement illimitée.";
  $dia["alertfunction1"]    ="La configuration du serveur semble imposer quelques limitations,";
  $dia["alertfunction2"]    ="certaines fonctionnalités de Webshare seront probablement restreintes.";
  $dia["alertfunction3"]    ="Cette fonctionnalité n'est disponible que si Webshare est connecté à une base de données.";
  $dia["msgVarNotModif1"]   ="Webshare ne peut rendre ces valeurs modifiables. En cas de problème ";
  $dia["msgVarNotModif2"]   ="de fonctionnement, modifiez les paramètres directement dans le fichier 'php.ini'.";
  $dia["msgVarModifiable1"] ="Vous pouvez modifier ces valeurs si vous rencontrez des problèmes ";
  $dia["msgVarModifiable2"] ="dans Webshare. ";
  $dia["tip1"]              ="Les valeurs indiquées limitent actuellement le fonctionnement de chaque script à";
  $dia["tip2"]              ="secondes de vie et les envois à ";
  $dia["propProcess"]       ="Le propriétaire du processus de Webshare (PHP) est ";
  $dia["limitProcess"]      ="Ce processus dispose de droits limités.";

  // Panneau Associations
  $dia["adminRub4"]         ="Associations";
  $dia["moduAdmin"]         ="Gestion des modules";
  $dia["assoAdmin"]         ="Gestion des associations";
  $dia["extension"]         ="Extension";
  $dia["exttype"]           ="Type";
  $dia["extmime"]           ="Mime";
  $dia["extact1"]           ="Action par défaut";
  $dia["extact2"]           ="Action secondaire";
  $dia["toAdd"]             ="Ajouter";
  $dia["newStyle"]          ="Ajouter un nouveau thème";
  $dia["newModule"]         ="Ajouter un nouveau module";
  $dia["updateWS"]          ="Mettre à jour";
  $dia["noVersionAv"]       ="L'installation est à jour";
  $dia["newVersionAv"]      ="Une nouvelle version est disponible";
  $dia["newVersion"]        ="une nouvelle version";  

  // Panneau Logs
  $dia["adminRub6"]         ="Logs";
  $dia["logsAdmin"]         ="Suivi des actions (log)";
  $dia["notConnected"]      ="La connexion à la base de données a échoué, veuillez corriger les paramètres.";
  $dia["connectedDB"]       ="La connexion à la base de données est opérationnelle.";
  $dia["msgBase"]           ="Configurer la base de données n'est pas indispensable, mais les fonctions de suivi des actions effectuées par les utilisateurs (log) ne seront activées.";
  $dia["noLog"]             ="Logs non disponibles";
  $dia["all"]               ="Tous";
  $dia["allf"]              ="Toutes";
  $dia["resultInd"]         ="Indiffèrent";
  $dia["resultPos"]         ="Positif";
  $dia["resultNeg"]         ="Négatif";
  $dia["noLogs"]            ="Aucune action pour cette sélection";
  $dia["viewAction"]        ="Afficher les actions :";
  $dia["madeBy"]            ="effectuées par";
  $dia["withResult"]        ="avec pour résultat";
  $dia["fromDate"]          ="Dans la période du";
  $dia["toDate"]            ="au";
  $dia["ofDate"]            ="Afficher le jour";
  $dia["day"]               ="jour";
  $dia["days"]              ="jours";
  $dia["exploreShare"]      ="Exploration du partage";  

  $dia["interrupted"]       ="La connexion au serveur semble interrompue, veuillez réessayer ultérieurement.";

foreach($dia as $nomVar => $txtVar) {
  $_SESSION["ws"]["dia"][$nomVar]=convertUTF8($txtVar);
}
foreach($listeMois as $nomVar => $txtVar) {
  $_SESSION["ws"]["dia"]["listeMois"][$nomVar]=convertUTF8($txtVar);
}
foreach($listeJour as $nomVar => $txtVar) {
  $_SESSION["ws"]["dia"]["listeJour"][$nomVar]=convertUTF8($txtVar);
}

  $_SESSION["ws"]["dia"]["startTitle"]="Webshare, le gestionnaire de fichiers WebFTP convivial.";
  $_SESSION["ws"]["dia"]["infoGPL"]  ="<p><b>Rappel</b> : La modification du logiciel pour y faire apparaître un autre nom (et/ou autre logotype) que celui de l'auteur est strictement interdite.</p><p>L'auteur ne peut en aucun cas être tenu pour responsable des problèmes liés à l'utilisation du logiciel, ni de l'utilisation même qui en est faite (notamment criminelle et/ou frauduleuse).</p><p>Les documents partagés, le sont sous la seule responsabilité de l'utilisateur final. </p><p>Pour plus d'informations, reportez-vous à la <a href='http://www.linux-france.org/article/these/gpl.html' class='lien' target='_up'>licence GPL</a>.</p>";
  $_SESSION["ws"]["dia"]["noConf"]   ="Aucun compte serveur ou <br/>utilisateur n'a &eacute;t&eacute; d&eacute;tect&eacute;. <br/><br/>Allez dans <a href='admin/index.php' style='text-decoration:underline'>l'administration</a><br/>pour configurer vos comptes. <br/><br/>Consultez la documentation <br/>pour plus d'informations.<br/><br/>";
  $_SESSION["ws"]["dia"]["noServer"] ="Aucun compte serveur d&eacute;tect&eacute;. <br/><br/>Allez dans <a href='admin/index.php' style='text-decoration:underline'>l'administration</a><br/>pour configurer vos comptes. <br/><br/>Consultez la documentation <br/>pour plus d'informations.<br/><br/><br/>";
  $_SESSION["ws"]["dia"]["noUser"]   ="Aucun compte utilisateur d&eacute;tect&eacute;. <br/><br/>Allez dans <a href='admin/index.php' style='text-decoration:underline'>l'administration</a><br/>pour configurer vos comptes. <br/><br/>Consultez la documentation <br/>pour plus d'informations.<br/><br/><br/>";
  $_SESSION["ws"]["dia"]["noJS"]     ="Webshare, l'explorateur de fichier WebFTP convivial. <br/><br/> L'activation de JavaScript est<br/>n&eacute;c&eacute;ssaire pour utiliser Webshare<br/>sur votre navigateur.<br/><br/>";
  $_SESSION["ws"]["dia"]["noSession"]="Webshare, l'explorateur de fichier WebFTP convivial. <br/><br/> L'activation des cookies est<br/>n&eacute;c&eacute;ssaire pour utiliser Webshare<br/>sur votre navigateur.<br/><br/>";
  $_SESSION["ws"]["dia"]["protect1"] ="Afin de prot&eacute;ger votre installation, vous devez d&eacute;finir un login et un mot de passe qui vous seront demand&eacute;s syst&eacute;matiquement lors de vos prochains acc&egrave;s.<br/><br/>";
  $_SESSION["ws"]["dia"]["protect2"] ="* Les champs mots de passe doivent correspondre pour en v&eacute;rifier la validit&eacute;.<br/>Rentrez uniquement des caract&egrave;res alphanum&eacute;riques dans les champs.<br/> Pour modifier vos identifiants ult&eacute;rieurement, &eacute;ditez le fichier .htpasswd situ&eacute; dans le dossier 'wspasswd'.";

  }
?>
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
// Fonction : English translation file
// Nom      : English.lang.php
// Version  : 0.8.2
// Date     : 14/05/08
// =======================================================================
// Text encoding: UTF-8/UNIX(LF)

  if (isset($_REQUEST["name"])&&(intval($_REQUEST["name"])==1))
    $nameLanguage      ="English"; else {
  
  $listeMois= array("","Jan.","Feb.","March","April","May","June","July","Aug.","Sept","Oct.","Nov.","Dec.");
  $listeJour= array("","Mon"=>"Monday","Tue"=>"Tuesday","Wed"=>"Wednesday","Thu"=>"Thursday","Fri"=>"Friday","Sat"=>"Saturday","Sun"=>"Sunday");

  $dia= array();

  // Panneau de login
  $dia["ident"]             ="Please enter your login :";
  $dia["cantIdent"]         ="Bad login.";
  $dia["identProblem1"]     ="Unreachable server.";
  $dia["identProblem2"]     ="Technical problem.";
  $dia["identProblem3"]     ="Connection to LDAP server could not be established.";
  $dia["enter"]             ="Enter";

  // Interface
  $dia["loading"]           ="Loading";
  $dia["actualDir"]         ="Current folder : ";
  $dia["connected"]         ="Connected as ";
  $dia["directLink"]        ="Direct link";
  $dia["filePreview"]       ="File preview";
  $dia["pictPreview"]       ="Picture preview";
  $dia["webPreview"]        ="Browsing ";
  $dia["niveauSup"]         ="Up level";
  $dia["closePanel"]        ="Close panel";
  $dia["picTooBig"]         ="Picture size too bigger to be viewed.";
  $dia["previousPage"]      ="Previous page";
  $dia["nextPage"]          ="Next page";
  $dia["upDir"]             ="Level up";
  $dia["updateDir"]         ="Update folder";
  $dia["changeStyle"]       ="Select style";
  $dia["refreshTree"]       ="Refresh folder tree";
  $dia["hideTree"]          ="Reduce folder tree";
  $dia["showTree"]          ="Deploy folder tree";
  $dia["printGallery"]      ="Print gallery";
  $dia["renameAll"]         ="Rename all";
  $dia["saveAll"]           ="Save all";
  $dia["savePic"]           ="All";
  $dia["webSite"]           ="Website";
  $dia["affichage"]         ="Display";
  $dia["expPanel"]          ="Folder tree panel";
  $dia["background"]        ="Background";
  $dia["miniature"]         ="Thumbnails";
  $dia["bigIcone"]          ="Big icons";
  $dia["liste"]             ="List";
  $dia["details"]           ="Details";
  $dia["none"]              ="None";
  $dia["arbo"]              ="Folder tree";
  $dia["closeWindow"]       ="Close";
  $dia["viewContent"]       ="View content";
  $dia["changeUser"]        ="Change user";
  $dia["onlineHelp"]        ="Online Help";
  $dia["rapport"]           ="Report a bug";
  $dia["options"]           ="Options";
  $dia["contact"]           ="Contact";
  $dia["about"]             ="About ";
  $dia["total"]             ="Total";
  $dia["used"]              ="Used";
  $dia["free"]              ="Free";
  $dia["octet"]             ="b";
  $dia["selectAll"]         ="Select all";
  $dia["select"]            ="Select";
  $dia["unselect"]          ="Unselect";
  $dia["expression"]        ="expression";
  $dia["inAllFiles"]        ="in each filenames";
  $dia["distribGPL"]        ="Distributed under GPL license";
  $dia["moreInfos"]         ="For any information or support, visit the official website.";
  $dia["websiteAdr"]        ="en.webshare.fr";
  
  // Verbes / actions
  $dia["openFile"]          ="Open";
  $dia["openFileWith"]      ="Open with";
  $dia["saveFile"]          ="Save";
  $dia["toExplore"]         ="Explore";
  $dia["toBrowse"]          ="Browse";
  $dia["toVisit"]           ="Visit";
  $dia["toView"]            ="View";
  $dia["toWatch"]           ="Watch";
  $dia["toListen"]          ="Listen";
  $dia["toPrint"]           ="Print";
  $dia["toUpload"]          ="Upload";
  $dia["toCut"]             ="Cut";
  $dia["toCopy"]            ="Copy";
  $dia["toPaste"]           ="Paste";
  $dia["toMove"]            ="Move";
  $dia["toDelete"]          ="Delete";
  $dia["toChmod"]           ="Modify attributes";
  $dia["toSearch"]          ="Search";
  $dia["toRename"]          ="Rename";
  $dia["toComment"]         ="Comment";
  $dia["toValid"]           ="Valid";
  $dia["toEdit"]            ="Edit";
  $dia["toModify"]          ="Modify";
  $dia["toZip"]             ="Zip";
  $dia["toDezip"]           ="Dezip";
  $dia["toRecover"]         ="Recover";
  $dia["toConnect"]         ="Connect";
  $dia["toQuit"]            ="Quit";
  $dia["toVerify"]          ="Verify";
  $dia["toReplace"]         ="Replace";
  $dia["choose"]            ="Choose...";

  // Chargement de fichier
  $dia["addUpload"]         ="Add file";
  $dia["startUpload"]       ="Start upload";
  $dia["limitTaille"]       ="Maximum upload file size allowed by server is ";
  $dia["ifFileExist"]       ="If file already exist :";
  $dia["replaceFile"]       ="Replace";
  $dia["renameFile"]        ="Rename";
  $dia["cancelFile"]        ="Cancel";
  $dia["waitingDownload"]   ="Waiting for upload";
  $dia["problemDownload"]   ="Problem during the file upload";
  $dia["prohibited"]        ="You don't have permission to modify this file.";
  $dia["downloading"]       ="Upload in progress";
  $dia["uploading"]         ="Upload in progress";
  $dia["started"]           ="Started";
  $dia["success"]           ="Uploaded successfully";
  $dia["tempNotSet"]        ="Temporary folder undefined";
  $dia["withSuccess"]       ="with succes";
  $dia["uploaded"]          ="uploaded.";
  $dia["succesUpload"]      ="uploaded with succes";
  $dia["cantOpen"]          ="Can't open the file ";
  $dia["cantWrite"]         ="Can't write in file ";
  $dia["fileTooBig"]        ="File size exceed the allowed limit.";
  $dia["wait"]              ="Waiting";

  // Creation de nouveaux élements
  $dia["newFile"]           ="New file";
  $dia["newDir"]            ="New folder";
  $dia["newTxt"]            ="New text";
  $dia["newLink"]           ="New link";
  $dia["making"]            ="Creating";
  $dia["areYouSure"]        ="Are you sure you want to ";
  $dia["toDisconnect"]      ="disconnect ?";
  $dia["addTxt"]            ="Please enter the name of new empty text document :";
  $dia["addDir"]            ="Please enter the name of new folder :";
  $dia["addNew"]            ="Add a new";
  $dia["addLink"]           ="Enter the name ";
  $dia["addLink2"]          ="and the address of new link :";
  $dia["dirCreate"]         ="The creation of folder";
  $dia["txtCreate"]         ="The creation of empty text document";
  $dia["linkCreate"]        ="The creation of link";
  $dia["linkTo"]            ="Link to";
  $dia["created"]           ="created";
  $dia["theNewDir"]         ="The new folder";
  $dia["theNewLink"]        ="The new link";
  $dia["theNewTxt"]         ="The new empty text document";

  // Réponses
  $dia["File"]              ="File";
  $dia["rep"]               ="folder";
  $dia["dir"]               =" folder";
  $dia["file"]              =" file";
  $dia["ofDir"]             =" of folder ";
  $dia["ofFile"]            =" of file ";
  $dia["onFile"]            =" on file ";
  $dia["toDir"]             =" to folder ";  
  $dia["toFile"]            =" to file ";   
  $dia["theDir"]            ="The folder ";
  $dia["theFile"]           ="The file ";
  $dia["element"]           ="elements";
  $dia["hasBeen"]           ="has been ";
  $dia["hasNotBeen"]        ="has not been ";
  $dia["hasFailed"]         ="has failed";
  $dia["successful"]        ="has been done successfully";
  $dia["dezipping"]         ="Uncompressing archive.";
  $dia["dezipped"]          ="uncompressed";
  $dia["startEdit"]         ="Start editing the file ";
  $dia["endEdit"]           ="Stop editing the file ";
  $dia["confirmEdit"]       ="has been edited and saved.";
  $dia["savingDocument"]    ="Saving document ";
  $dia["savingDirContent"]  ="Saving content of the folder ";
  $dia["savingFile"]        ="Saving file ";
  $dia["backgAdded"]        ="Picture has been added in background.";
  $dia["backgRemoved"]      ="Background removed.";


  // Renommage / Déplacement / Suppression
  $dia["rename"]            ="Enter the new name ";
  $dia["renaming"]          ="Renaming";
  $dia["renamed"]           ="renamed";
  $dia["confirmSup"]        ="Confirm removing this file association ?";
  $dia["delete"]            ="Are you sure to delete the ";
  $dia["delete2"]           ="and its content ";
  $dia["deleting"]          ="Deleting";
  $dia["deleted"]           ="deleted";
  $dia["theRemove"]         ="The remove";
  $dia["copyOf"]            ="Copy-of-";
  $dia["onlyCopy"]          ="but it has been copied.";
  $dia["fileExist"]         ="A file with same name already exists.";
  $dia["goingToCopy"]       ="is going to be copyied, please choose the destination.";
  $dia["goingToMove"]       ="is going to be moved, please choose the destination.";
  $dia["moving"]            ="Moving ";
  $dia["moved"]             ="moved";
  $dia["fileEditing"]       ="Editing ";
  $dia["copying"]           ="Copy in progress ";
  $dia["copyingFile"]       ="Copying file uploaded to its destination";
  $dia["copied"]            ="copied";
  $dia["toActualDir"]       ="to current folder";
  $dia["typeOfElement"]     ="Document ";
  $dia["copyTo"]            ="copy";
  $dia["moveTo"]            ="move";
  $dia["prohibCar"]         ="Prohibited sign entered and filtered ( ? < > : # % + '' ' | & * / )";
  $dia["alreadyExist"]      ="This file or folder already exist, please enter a new name.";
  $dia["confirmReplace"]    ="This file or folder already exist, it will be replaced if you valid.";
  $dia["modeDefault"]       ="Default mode";
  $dia["modePreview"]       ="Preview mode";
  $dia["lineNumbers"]       ="View line numbers";
  $dia["colorMode"]         ="Syntax highlighting";
  $dia["includeSubDir"]     ="Include subdirectories ?";
  $dia["modifyingPrefs"]    ="Modifying settings";


  // Gestion des droits
  $dia["modifyPermission"]  ="Modify attributes";
  $dia["noPermission"]      ="You don't have permission to handle this type of file.";
  $dia["noOperation"]       ="This operation is not allowed.";
  $dia["modifying"]         ="Modifying attributes ";
  $dia["fileAttributes"]    ="Attributes of file";
  $dia["cantModify"]        ="can't be modified.";
  $dia["modify"]            ="has been modified.";
  $dia["modified"]          ="Modified ";
  $dia["readWrite"]         ="Read-Write";
  $dia["readOnly"]          ="Read only";
  $dia["writeOnly"]         ="Write only";
  $dia["locked"]            ="File locked";
  $dia["selectAttributes"]  ="Attributes ";
  $dia["modR"]              ="R";
  $dia["modW"]              ="W";
  $dia["modE"]              ="E";

  // Travail collaboratif
  $dia["fileInUse"]         ="File is currently in use by another user. ";
  $dia["shallNotDoThis"]    ="You should not do this modification.";
  $dia["confirmContinue"]   ="Do you really want to continue ?";
  $dia["disallowModif"]     ="Lock modifications";
  $dia["showFileInUse"]     ="Mark the file as 'in use' ?";
  $dia["allowModif"]        ="Allow modifications";
  $dia["removeFileInUse"]   ="Mark the file as 'not in use anymore' ?";
  $dia["confirmFileInUse"]  ="File is marked as 'in use'.";
  $dia["confirmFileNotUse"] ="File is marked as 'not in use anymore'.";

  // Propriétés / Recherche
  $dia["property"]          ="Property ";
  $dia["propertyOf"]        ="Property of ";
  $dia["searchIn"]          ="Search in ";
  $dia["search"]            ="Enter the name ";
  $dia["search2"]           ="of file or folder to search ?";
  $dia["searching"]         ="Search of";
  $dia["searching2"]        ="in progress";
  $dia["useCasse"]          ="Case sensitive ?";
  $dia["foundIn"]           ="in";
  $dia["into"]              ="into";
  $dia["and"]               ="and";
  $dia["by"]                ="by";
  $dia["viewed"]            ="Viewed";
  $dia["times"]             ="times";
  $dia["elementsFound"]     =" elements founds.";
  $dia["noResult"]          ="No file found.";

  // Tri des éléments
  $dia["sortFile"]          ="Sort files by";
  $dia["byName"]            ="by name";
  $dia["byValue"]           ="by value";
  $dia["byType"]            ="by type";
  $dia["bySize"]            ="by size";
  $dia["byDate"]            ="by date";
  $dia["byPerso"]           ="Personnal";
  $dia["webSort"]           ="Default sort";
  $dia["ascending"]         ="Ascending";
  $dia["descending"]        ="Descending";

  // Commentaires
  $dia["comment"]           ="Comment";
  $dia["commentAdded"]      ="Comment added.";
  $dia["commentsAdded"]     =" comments added ";
  $dia["commentNotAdded"]   ="Comment not added.";
  $dia["addComment"]        ="Add comment ";
  $dia["modifyComment"]     ="Modify comment";
  $dia["removeComment"]     ="Remove comment";
  $dia["addingComment"]     ="Adding of comment ";
  $dia["commentFile"]       ="Comments on file ";
  $dia["messageOf"]         ="Message of ";

  // Menu Images
  $dia["previous"]          ="Previous picture";
  $dia["next"]              ="Next picture";
  $dia["fullScreen"]        ="Full screen";
  $dia["reducePanel"]       ="Reduce";
  $dia["zoomp"]             ="Zoom +";
  $dia["zoomm"]             ="Zoom -";
  $dia["zooms"]             ="Real size";
  $dia["diaporama"]         ="Diaporama";
  $dia["refreshMini"]       ="Refresh miniature";
  $dia["rotate90"]          ="Rotate 90° right";
  $dia["rotate180"]         ="Rotate 180°";
  $dia["rotate270"]         ="Rotate 90° left";
  $dia["flipV"]             ="Flip vertical";
  $dia["flipH"]             ="Flip horizontal";
  $dia["resize"]            ="Resize ";
  $dia["keepRatio"]         ="Keep aspect ratio ?";
  $dia["width"]             ="Width";
  $dia["height"]            ="Height";
  $dia["pixels"]            ="px";

  // Infos EXIF
  $dia["cliche"]            ="PICTURE";
  $dia["object"]            ="FILE";
  $dia["infocomment"]       ="COMMENT";
  $dia["FileSize"]          ="File Size";
  $dia["DateTimeOriginal"]  ="Date Time Original";
  $dia["resolution"]        ="Resolution";
  $dia["XResolution"]       ="DPI";
  $dia["Software"]          ="Software";
  $dia["Photographer"]      ="Photographer";
  $dia["ExposureTime"]      ="Exposure Time";
  $dia["ApertureFNumber"]   ="Aperture F Number";
  $dia["MaxApertureValue"]  ="Max Aperture Value";
  $dia["ISOSpeedRatings"]   ="ISO Speed Ratings";
  $dia["FocalLength"]       ="Focal Length";
  $dia["ExposureBiasValue"] ="Exposure Bias Value";
  $dia["LightSource"]       ="Light Source";
  $dia["Flash"]             ="Flash";

  // Envoi d'emails
  $dia["authSendMail"]      ="Allow sending elements by email";
  $dia["sendMail"]          ="Send by email";
  $dia["titleMail"]         ="Message title";
  $dia["recipientMail"]     ="Indicate mail adress of recipient";
  $dia["contentMail"]       ="Enter your message";
  $dia["sendMailConfirm"]   ="Send your message";
  $dia["sendingMail"]       ="Sending your message";    
  $dia["sendMailOK"]        ="The message has been sent.";
  $dia["sendMailProblem"]   ="The message could not be sent.";
  $dia["mailSendTitle"]     ="New file added in your WebShare";  
  $dia["mailSendFile1"]     ="Hello, a new file has been added in your webshare ";
  $dia["mailSendFile2"]     ="Click on the following link to download this file : ";
  $dia["mailSendFile3"]     ="";
  $dia["mailSendFile4"]     ="Have a nice day.";  

  // Corbeille
  $dia["corbeille"]         ="Trash bin";
  $dia["binNoElement"]      ="The trash bin is empty.";
  $dia["binContain"]        ="The trash bin contains";
  $dia["emptyBin"]          ="Empty trash bin";
  $dia["emptyBinConfirm"]   ="Are you sure to empty the trash bin ?";
  $dia["emptyConfirm"]      ="Are you sure to definitively delete this element ?";
  $dia["emptyBinResult"]    ="The trash has been emptied.";
  $dia["viewElements"]      ="View all elements";
  $dia["emptyElements"]     ="Empty all elements more than ";
  $dia["activeBin"]         ="Activate the trash bin for this shared folder ";
  $dia["restoreElement"]    ="Restore element";
  $dia["finally"]           =" finally";

  // Gestion des versions
  $dia["version"]           ="Version ";
  $dia["viewAllVersion"]    ="View all versions";
  $dia["addNewVersion"]     ="Add a new version";

  // Favoris
  $dia["favoris"]           ="Bookmarks";
  $dia["addFav"]            ="Add to bookmarks";
  $dia["removeFav"]         ="Remove from bookmarks";
  $dia["handleFav"]         ="Manage bookmarks";
  $dia["viewFav"]           ="View all bookmarks";
  $dia["favAdded"]          ="The file has been added to bookmarks";
  $dia["favRemoved"]        ="The file has been removed from bookmarks";

  // Tests des partages
  $dia["shareTest"]         ="Click to test the settings.";
  $dia["shareOK"]           ="This shared folder is accessible and has sufficient rights.";
  $dia["shareProtected"]    ="This shared folder is accessible but has no sufficient rights.";
  $dia["shareNotAcc"]       ="The root indicated is not accessible or don't exist.";
  $dia["shareFtpNotAcc"]    ="Connection to FTP server impossible.";
  $dia["shareFtpBadLogin"]  ="The FTP server returned an identication error, verify your login and password.";
  $dia["shareFtpError"]     ="The FTP server returned an unknow error.";
  $dia["shareFtpcantMount"] ="Mount point unreachable on the FTP server.";
  $dia["shareFtpProtected"] ="Mount point on the FTP server has no sufficient rights.";
  $dia["shareFtpOK"]        ="Connection to FTP server and test of shared folder successfull.";
  $dia["shareAvailable"]    ="New users can access this shared folder.";

  // Administration
  $dia["adminTitle"]        ="Users and servers management";
  $dia["adminHeader"]       ="ADMINISTRATION";
  $dia["msgFooter"]         ="WebShare under License GPL";
  $dia["adminAlert1"]       ="A technical problem has occurred, changes haven't been made.";
  $dia["adminAlert2"]       ="Changes have been made.";
  $dia["notActiv"]          ="This option is not yet implemented.";
  $dia["confirmation"]      ="Confirmation";
  $dia["dialConfirm"]       ="Confirm ?";
  $dia["adminProtected"]    ="Protected administration panel";
  $dia["adminNotProtected"] ="Administration panel is not protected !";
  $dia["importConfirm"]     ="Confirm file import into database ?";
  $dia["importToBase"]      ="Import configuration file into database";
  $dia["importSuccessful"]  ="Import to database successful.";
  $dia["importFailed"]      ="Import to database failed.";

  // Panneau Partages
  $dia["adminRub2"]         ="Shares";
  $dia["serverAdmin"]       ="Shares and virtual folders management";
  $dia["newServer"]         ="New shared folder";
  $dia["msgInfo1"]          ="Remember : FTP connections are not activated yet.";
  $dia["msgInfo2"]          ="Warning : Paths and file names must contain only alphabetical characters (lowercase or uppercase) and numerics.";
  $dia["msgInfo3"]          ="Punctuation, accents and spaces are not allowed.";
  $dia["msgInfo4"]          ="Warning : The administration folder MUST be renamed to protect your installation.";
  $dia["chooseUser"]        ="Choose the user to delete";
  $dia["createUser"]        ="Create or modify an user then validate";
  $dia["chooseServer"]      ="Choose the server to delete";
  $dia["createServer"]      ="Create or modify an server then validate";
  $dia["selectServer"]      ="Select at least a server then validate";
  $dia["FTP"]               ="FTP";
  $dia["local"]             ="local";
  $dia["serverFtp"]         ="Server (FTP)";
  $dia["loginFtp"]          ="Login (FTP)";
  $dia["passFtp"]           ="Password (FTP)";
  $dia["portFtp"]           ="Port (FTP)";
  $dia["shareRoot"]         ="Root";
  $dia["serverRoot"]        ="Server root";
  $dia["virtualRoot"]       ="Virtual root";
  $dia["defaultRoot"]       ="Default folder";
  $dia["webRoot"]           ="Web root";  
  $dia["protectRep"]        ="Protect new folders with file :";
  $dia["modeDegrade"]       ="Degraded mode";
  $dia["protectShare"]      ="Modifications are allowed on this shared folder";  
  $dia["serverType"]        ="Type";
  $dia["serverPosition"]    ="Position";  
  
  // Panneau Utilisateur
  $dia["adminRub1"]         ="Users";
  $dia["userAdmin"]         ="Users management";
  $dia["newUser"]           ="New user";
  $dia["administrator"]     ="Administrator";
  $dia["email"]             ="Email";
  $dia["lang"]              ="Language";
  $dia["user"]              ="User";
  $dia["group"]             ="Group";
  $dia["name"]              ="Name";
  $dia["login"]             ="Login";
  $dia["passwd"]            ="Password";
  $dia["confirmation"]      ="Confirmation";
  $dia["connexion"]         ="Connection";
  $dia["default"]           ="Browsing";
  $dia["explore"]           ="Explorer";
  $dia["visualis"]          ="Style";
  $dia["leftPanel"]         ="Default panel";
  $dia["webSort"]           ="Default sort";
  $dia["webDir"]            ="Web folder preview";
  $dia["nameShare"]         ="Shares ";
  $dia["access"]            ="Shares access ";
  $dia["select"]            ="Select";
  $dia["open"]              ="Open";
  $dia["menuContext"]       ="Context menu";
  $dia["leftClic"]          ="Left clic :";
  $dia["rightClic"]         ="Right clic :";
  $dia["doubleClic"]        ="Double clic :";
  $dia["toModify"]          ="Modify";
  $dia["toCreate"]          ="Create";
  $dia["toRead"]            ="Read";
  $dia["regexp"]            ="(RegExp > Add new expressions separated by | ) :";
  $dia["filterElement"]     ="Filter elements containing";
  $dia["recoExtension"]     ="Following extensions are recognized";
  $dia["defStyle"]          ="Default style";  
  $dia["sessionTime"]       ="Session duration (min)";
  $dia["actionAuth"]        ="User is authorized to make the following actions on not locked elements :";
  $dia["userType"]          ="Type";
  $dia["createNewAccount"]  ="Create a new user account";
  $dia["chooseAccount"]     ="Choose the user account to open :";


  // Panneau Préférences
  $dia["adminRub3"]         ="Preferences";
  $dia["prefAdmin"]         ="Preferences management";
  $dia["baseAdmin"]         ="Database management";
  $dia["memoMax"]           ="Allowed memory for scripts ";
  $dia["execMax"]           ="Life duration for scripts ";
  $dia["postMax"]           ="Size limit for data post";
  $dia["uploMax"]           ="Size limit for uploads";
  $dia["lifeMax"]           ="Life duration";
  $dia["timeMax"]           ="Life duration for uploads ";
  $dia["previewWeb"]        ="Activate website previews";
  $dia["previewAct"]        ="Activate thumbnails ";
  $dia["previewPDF"]        ="Activate PDF files previews";
  $dia["logAct"]            ="Activate logs";
  $dia["sepAdr"]            ="Separate adress by ";
  $dia["alwaysConfirm"]     ="Confirm each action";
  $dia["effectAct"]         ="Activate graphical effects";
  $dia["completePath"]      ="View complete paths";
  $dia["openLinkinNewWin"]  ="Open link in a new window";  
  $dia["frameTitle"]        ="Window title";
  $dia["viewClock"]         ="View clock";
  $dia["diapoSpeed"]        ="Diaporama speed";
  $dia["diapoStop"]         ="Stop diaporama";
  $dia["arboLink"]          ="View links in folder tree";
  $dia["activeMini"]        ="Activate thumbnails ";
  $dia["dynWindow"]         ="Dynamic windows";
  $dia["serverBase"]        ="mySQL server";
  $dia["loginBase"]         ="mySQL login ";
  $dia["passBase"]          ="mySQL password";
  $dia["tableBase"]         ="Select base";
  $dia["myPref"]            ="My preferences";
  $dia["privateWS"]         ="Private share";
  $dia["publicWS"]          ="Public share";
  $dia["accountUser"]       ="Users can create their own account";
  
  // Panneau Infos
  $dia["adminRub5"]         ="Informations";
  $dia["infoAdmin"]         ="Summary of installation information ";
  $dia["theExt"]            ="The extension";
  $dia["activated"]         =" is activated.";
  $dia["notActivated"]      =" is not activated.";
  $dia["libZip"]            ="(Zip archives management)";
  $dia["libGD"]             ="(Images and thumbnails management)";
  $dia["libMB"]             ="(Special characters management)";
  $dia["libXslt"]           ="(Complementary Xslt management)";
  $dia["libFTP"]            ="(Distant FTP connections)";
  $dia["libPdf"]            ="(PDF thumbnails management)";
  $dia["libMail"]           ="(Send elements by email)";
  $dia["libExif"]           ="(Display Exif informations)";
  $dia["dontExist"]         ="don't exist.";
  $dia["notAccessible"]     ="don't exist or is not accessible.";
  $dia["accessProtect"]     ="exist is not writable.";
  $dia["isAccessible"]      ="exist and is writable.";
  $dia["modulesDetected"]   ="has been detected and contains following modules :";
  $dia["langDetected"]      ="has been detected and contains following languages :";
  $dia["styleDetected"]     ="has been detected and contains following styles :";
  $dia["cgiUpNotDetected"]  ="has not been detected.";
  $dia["cgiUpLimited"]      ="has been detected but has no sufficient rights.";
  $dia["cgiUpDetected"]     ="has been detected and has sufficient rights.";
  $dia["unlimitedUpload"]   ="You can upload file without size limit.";
  $dia["alertfunction1"]    ="Server configuration seems to impose some limitations,";
  $dia["alertfunction2"]    ="some features of Webshare will probably be restricted.";
  $dia["alertfunction3"]    ="This feature is available only when Webshare is connected to a database.";
  $dia["msgVarNotModif1"]   ="Webshare can't modify these values. In case of problem, ";
  $dia["msgVarNotModif2"]   ="modify the parameters directly in file 'php.ini'.";
  $dia["msgVarModifiable1"] ="You can modify these values if you encounter problems ";
  $dia["msgVarModifiable2"] ="in Webshare. ";
  $dia["tip1"]              ="Indicated values limit actually each script to ";
  $dia["tip2"]              ="seconds of life and uploads to ";
  $dia["propProcess"]       ="Ownership of the Webshare (PHP) process ";
  $dia["limitProcess"]      ="This process has limited rights.";


  // Panneau Associations
  $dia["adminRub4"]         ="Associations";
  $dia["moduAdmin"]         ="Modules management";
  $dia["assoAdmin"]         ="Associations management";
  $dia["extension"]         ="Extension";
  $dia["exttype"]           ="Type";
  $dia["extmime"]           ="Mime";
  $dia["extact1"]           ="Default action";
  $dia["extact2"]           ="Secondary action";
  $dia["toAdd"]             ="Add";
  $dia["newStyle"]          ="Add a new style";
  $dia["newModule"]         ="Add a new module";
  $dia["updateWS"]          ="Update";
  $dia["noVersionAv"]       ="No new version available";
  $dia["newVersionAv"]      ="A new version is available";
  $dia["newVersion"]        ="for a new version";  

  // Panneau Logs
  $dia["adminRub6"]         ="Logs";
  $dia["logsAdmin"]         ="Log viewer";
  $dia["notConnected"]      ="Connexion to database has failed, please correct the parameters.";
  $dia["connectedDB"]       ="Connexion to database is operational.";
  $dia["msgBase"]           ="Configuration of database is not essential, but the follow-up functions of events (log) will not be activated.";
  $dia["noLog"]             ="Logs not available";
  $dia["all"]               ="All";
  $dia["allf"]              ="All";
  $dia["resultInd"]         ="Neutral";
  $dia["resultPos"]         ="Positif";
  $dia["resultNeg"]         ="Negatif";
  $dia["noLogs"]            ="No action for this selection";
  $dia["viewAction"]        ="View actions :";
  $dia["madeBy"]            ="made by";
  $dia["withResult"]        ="with result";
  $dia["fromDate"]          ="Period from";
  $dia["toDate"]            ="to";
  $dia["ofDate"]            ="View day";
  $dia["day"]               ="day";
  $dia["days"]              ="days";
  $dia["exploreShare"]      ="Exploring share";  

  $dia["interrupted"]       ="The connection to the server seems interrupted, please try again later.";

foreach($dia as $nomVar => $txtVar) {
  $_SESSION["ws"]["dia"][$nomVar]=convertUTF8($txtVar);
}
foreach($listeMois as $nomVar => $txtVar) {
  $_SESSION["ws"]["dia"]["listeMois"][$nomVar]=convertUTF8($txtVar);
}
foreach($listeJour as $nomVar => $txtVar) {
  $_SESSION["ws"]["dia"]["listeJour"][$nomVar]=convertUTF8($txtVar);
}

  $_SESSION["ws"]["dia"]["startTitle"]="WebShare, the user-friendly web-FTP file explorer.";
  $_SESSION["ws"]["dia"]["infoGPL"]  ="<p><b>Note</b> : Removing or modifying the name of the author by a different name (and / or logo) is strictly prohibited.</p><p>The author can in no case be responsible for any problems using the software, or even for use that is made of the software (including criminal and / or fraudulent). Shared documents are under the sole responsibility of the user. </p><p>For more informations, please report to the terms of the <a href='http://www.gnu.org/licenses/old-licenses/gpl-2.0.html#SEC1' class='lien' target='_up'>GPL license</a>.</p>";
  $_SESSION["ws"]["dia"]["noConf"]   ="No account server or <br/>user was detected. <br/><br/>Go to the <a href='admin/index.php' style='text-decoration:underline'>administration panel</a><br/>to configure your accounts. <br/><br/>Consult documentation <br/>for more information.<br/><br/>";
  $_SESSION["ws"]["dia"]["noServer"] ="No account server was detected. <br/><br/>Go to the <a href='admin/index.php' style='text-decoration:underline'>administration panel</a><br/>to configure your accounts. <br/><br/>Consult documentation <br/>for more information.<br/><br/><br/>";
  $_SESSION["ws"]["dia"]["noUser"]   ="No account user was detected. <br/><br/>Go to the <a href='admin/index.php' style='text-decoration:underline'>administration panel</a><br/>to configure your accounts. <br/><br/>Consult documentation <br/>for more information.<br/><br/><br/>";
  $_SESSION["ws"]["dia"]["noJS"]     ="WebShare, the user-friendly<br/>webFTP file explorer. <br/><br/>Enabling JavaScript<br/>is required to use Webshare<br/>on your browser.<br/><br/>";
  $_SESSION["ws"]["dia"]["noSession"]="WebShare, the user-friendly<br/>webFTP file explorer. <br/><br/>Enabling cookies<br/>is required to use Webshare<br/>on your browser.<br/><br/>";
  $_SESSION["ws"]["dia"]["protect1"] ="To protect your installation, you must define a login and a password that will be asked systematically during your next access.<br/><br/>";
  $_SESSION["ws"]["dia"]["protect2"] ="* Password fields must match to check their validity. Enter only alphanumeric characters in the fields.<br/>To change your login later, edit file .htpasswd located in the 'wspasswd' folder.";

  }
?>
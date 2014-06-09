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
// Fonction : Fichier de traduction version espagnole
// Nom      : Catalan.lang.php
// Version  : 0.8.2
// Date     : 03/04/08
// Autor de la traducció: David Chova
// =======================================================================
// Text encoding: UTF-8/UNIX(LF)

  if (isset($_REQUEST["name"])&&(intval($_REQUEST["name"])==1))
    $nameLanguage      ="Catalan - Catal&agrave;"; else {
  
  $listeMois= array("","Ene.","Feb.","Marzo","Abril","Mayo","Junio","Julio","Ago.","Sept","Oct.","Nov.","Dic.");
  $listeJour= array("","Mon"=>"Lunes","Tue"=>"Martes","Wed"=>"Miércoles","Thu"=>"Jueves","Fri"=>"Viernes","Sat"=>"Sábado","Sun"=>"Domingo");

  $dia= array();

  // Panneau de login
  $dia["ident"]             ="Usuari :";                                                                                                                
  $dia["cantIdent"]         ="Usuari erroni."; 
  $dia["identProblem1"]     ="Servidor inaccesible.";
  $dia["identProblem2"]     ="Problema tècnic."; 
  $dia["identProblem3"]     ="Connection to LDAP server could not be established.";
  $dia["enter"]             ="Entrar";

  // Interface
  $dia["loading"]           ="Carregant";
  $dia["actualDir"]         ="Carpeta actual : ";                                         
  $dia["connected"]         ="Connectat com ";                                            
  $dia["directLink"]        ="Enllaç directe";                                            
  $dia["filePreview"]       ="Visualització arxiu";                                       
  $dia["pictPreview"]       ="Visualització imatge";                                      
  $dia["webPreview"]        ="Navegant ";                                                 
  $dia["niveauSup"]         ="Pujar nivell";                                              
  $dia["closePanel"]        ="Tancar panell";                                             
  $dia["picTooBig"]         ="No es pot visualitzar, la imatge és massa gran.";           
  $dia["previousPage"]      ="Pàgina prèvia";
  $dia["nextPage"]          ="Next page";
  $dia["upDir"]             ="Nivell superior";                                           
  $dia["updateDir"]         ="Actualitzar carpeta";                                       
  $dia["changeStyle"]       ="Seleccionar tema";                                          
  $dia["refreshTree"]       ="Actualitzar arbre";                                         
  $dia["hideTree"]          ="Plegar arbre de carpetes";                                  
  $dia["showTree"]          ="Desplegar arbre de carpetes";                               
  $dia["printGallery"]      ="Galeria d'impressió";
  $dia["renameAll"]         ="Reanomenar tot";
  $dia["saveAll"]           ="Guardar tot";                                               
  $dia["savePic"]           ="Tot";                                                       
  $dia["webSite"]           ="La meua web";                                                    
  $dia["affichage"]         ="Visualitzar";                                               
  $dia["expPanel"]          ="Panell arbre de carp.";                             
  $dia["background"]        ="Fons";                                                      
  $dia["miniature"]         ="Miniatures";                                                
  $dia["bigIcone"]          ="Icones grans";                                              
  $dia["liste"]             ="Llista";                                                    
  $dia["details"]           ="Detalls";                                                   
  $dia["none"]              ="Res";                                                       
  $dia["arbo"]              ="Arbre de carpetes";                                         
  $dia["closeWindow"]       ="Tancar";                                                    
  $dia["viewContent"]       ="Visualitzar contingut";
  $dia["changeUser"]        ="Change user";
  $dia["onlineHelp"]        ="Ajuda online";                                              
  $dia["rapport"]           ="Informar error";                                            
  $dia["options"]           ="Opcions";                                                   
  $dia["contact"]           ="Contacte";                                                  
  $dia["about"]             ="Sobre ";                                                    
  $dia["total"]             ="Total";
  $dia["used"]              ="Used";
  $dia["free"]              ="Lliure";                                                    
  $dia["octet"]             ="b";                                                         
  $dia["selectAll"]         ="Seleccionar tot";                                           
  $dia["select"]            ="Seleccionar";                                               
  $dia["unselect"]          ="Deseleccionar";                                             
  $dia["expression"]        ="expression";
  $dia["inAllFiles"]        ="in every filenames";
  $dia["distribGPL"]        ="Distributed under GPL license";
  $dia["moreInfos"]         ="For any information or support, visit the official website.";
  $dia["websiteAdr"]        ="en.webshare.fr";
  
  // Verbes / actions       
  $dia["openFile"]          ="Obrir";                      
  $dia["openFileWith"]      ="Obrir amb";                  
  $dia["saveFile"]          ="Guardar";                    
  $dia["toExplore"]         ="Explorar";                   
  $dia["toBrowse"]          ="Navegar";                    
  $dia["toVisit"]           ="Visitar";                    
  $dia["toView"]            ="Visualitzar";                
  $dia["toWatch"]           ="Fullejar";                   
  $dia["toListen"]          ="Escoltar";                   
  $dia["toPrint"]           ="Imprimir";                   
  $dia["toUpload"]          ="Carregar";                   
  $dia["toCut"]             ="Tallar";                     
  $dia["toCopy"]            ="Copiar";                     
  $dia["toPaste"]           ="Apegar";                     
  $dia["toMove"]            ="Moure";                      
  $dia["toDelete"]          ="Eliminar";                   
  $dia["toChmod"]           ="Modificar atributs";         
  $dia["toSearch"]          ="Buscar";                     
  $dia["toRename"]          ="Reanomenar";                 
  $dia["toComment"]         ="Comentar";                   
  $dia["toValid"]           ="Validar";                    
  $dia["toEdit"]            ="Editar";                     
  $dia["toModify"]          ="Modificar";                  
  $dia["toZip"]             ="comprimir a Zip";            
  $dia["toDezip"]           ="Descomprimir de zip";        
  $dia["toRecover"]         ="Recuperar";                  
  $dia["toConnect"]         ="Connectar";                  
  $dia["toQuit"]            ="Eixir";                      
  $dia["toVerify"]          ="Verify";
  $dia["toReplace"]         ="Replace";
  $dia["choose"]            ="Choose...";

  // Chargement de fichier
  $dia["addUpload"]         ="Afegir arxiu";                                             
  $dia["startUpload"]       ="Començar càrrega";                                         
  $dia["limitTaille"]       ="La màxima càrrega permesa per este servidor és ";          
  $dia["ifFileExist"]       ="Si l'arxiu ja existeix :";                                  
  $dia["replaceFile"]       ="Reemplaçar";                                               
  $dia["renameFile"]        ="Reanomenar";                                               
  $dia["cancelFile"]        ="Cancel·lar";                                               
  $dia["waitingDownload"]   ="Esperant per a càrrega";                                   
  $dia["problemDownload"]   ="Problema durant la càrrega de l'arxiu";                    
  $dia["prohibited"]        ="No tens permís per a modificar este arxiu.";               
  $dia["downloading"]       ="Descàrrega en progrés";                                    
  $dia["uploading"]         ="Càrrega en progrés";                                       
  $dia["started"]           ="Començat";                                                 
  $dia["success"]           ="Càrrega amb èxit";                                         
  $dia["tempNotSet"]        ="Carpeta temporal no definida";                             
  $dia["withSuccess"]       ="amb èxit";                                                 
  $dia["uploaded"]          ="carregat.";                                                
  $dia["succesUpload"]      ="carregat amb èxit";                                        
  $dia["cantOpen"]          ="No es pot obrir l'arxiu ";                                 
  $dia["cantWrite"]         ="No es pot escriure en l'arxiu ";                           
  $dia["fileTooBig"]        ="La grandària de l'arxiu excedeix el límit permés.";         
  $dia["wait"]              ="Esperant";                                                 

  // Creation de nouveaux élements
  $dia["newFile"]           ="Nou arxiu";                                            
  $dia["newDir"]            ="Nova carpeta";                                         
  $dia["newTxt"]            ="Nou text";                                             
  $dia["newLink"]           ="Nou enllaç";                                           
  $dia["making"]            ="Creant";                                               
  $dia["areYouSure"]        ="Estàs segur que vols ";
  $dia["toDisconnect"]      ="disconnect ?";
  $dia["addTxt"]            ="Introdueix el nom del nou document de text en blanc:"; 
  $dia["addDir"]            ="Introdueix el nom de la nova carpeta:";                 
  $dia["addNew"]            ="Afegir nou";                                           
  $dia["addLink"]           ="Introdueix el nom ";                                    
  $dia["addLink2"]          ="i l'adreça del nou enllaç :";                       
  $dia["dirCreate"]         ="Creació de carpeta";                                   
  $dia["txtCreate"]         ="Creació de document de text en blanc";                 
  $dia["linkCreate"]        ="Creació d'enllaç";                                     
  $dia["linkTo"]            ="Enllaç a";                                             
  $dia["created"]           ="creat";                                                
  $dia["theNewDir"]         ="La nova carpeta";                                      
  $dia["theNewLink"]        ="El nou enllaç";                                        
  $dia["theNewTxt"]         ="El nou document de text en blanc";                    

  // Réponses
  $dia["File"]              ="Arxiu";   
  $dia["rep"]               ="carpeta";   
  $dia["dir"]               =" carpeta";   
  $dia["file"]              =" arxiu";  
  $dia["ofDir"]             =" de la carpeta ";  
  $dia["ofFile"]            =" de l'arxiu ";  
  $dia["onFile"]            =" en l'arxiu ";
  $dia["toDir"]             =" a la carpeta ";  
  $dia["toFile"]            =" a l'arxiu ";    
  $dia["theDir"]            ="La carpeta ";  
  $dia["theFile"]           ="L'arxiu "; 
  $dia["element"]           ="elements"; 
  $dia["hasBeen"]           ="ha sigut ";  
  $dia["hasNotBeen"]        ="no ha sigut "; 
  $dia["hasFailed"]         ="ha fallat";   
  $dia["successful"]        ="ha sigut realitzat satisfactòriament"; 
  $dia["dezipping"]         ="Descomprimint arxiu.";       
  $dia["dezipped"]          ="descomprimit";
  $dia["startEdit"]         ="Començar a editar l'arxiu ";
  $dia["endEdit"]           ="Deixar d'editar l'arxiu ";   
  $dia["confirmEdit"]       ="ha sigut editat i guardat.";  
  $dia["savingDocument"]    ="Guardant document ";    
  $dia["savingDirContent"]  ="Guardant el contingut de la carpeta "; 
  $dia["savingFile"]        ="Guardant arxiu ";      
  $dia["backgAdded"]        ="La imatge s'ha afegit al fons."; 
  $dia["backgRemoved"]      ="Fons eliminat."; 


  // Renommage / Déplacement / Suppression
  $dia["rename"]            ="Introdueix el nou nom ";
  $dia["renaming"]          ="Reanomenant";
  $dia["renamed"]           ="anomenat";
  $dia["confirmSup"]        ="Confirma eliminar l\'associació d\'este arxiu ?";
  $dia["delete"]            ="Eliminar ";
  $dia["delete2"]           ="i el seu contingut ?";
  $dia["deleting"]          ="Eliminant";
  $dia["deleted"]           ="eliminat";
  $dia["theRemove"]         ="Eliminar";
  $dia["copyOf"]            ="Còpia de";
  $dia["onlyCopy"]          ="però ha sigut copiat.";
  $dia["fileExist"]         ="Hi ha un arxiu amb el mateix nom.";
  $dia["goingToCopy"]       ="es va a copiar, tria destí.";
  $dia["goingToMove"]       ="es va a moure, tria destí.";
  $dia["moving"]            ="Movent ";
  $dia["moved"]             ="mogut";
  $dia["fileEditing"]       ="Editant ";
  $dia["copying"]           ="Còpia en curs ";
  $dia["copyingFile"]       ="Copiant arxiu pujat al seu destí";
  $dia["copied"]            ="copiat";
  $dia["toActualDir"]       ="en carpeta actual";
  $dia["typeOfElement"]     ="Document ";
  $dia["copyTo"]            ="còpia";
  $dia["moveTo"]            ="mou";
  $dia["prohibCar"]         ="Senyal de prohibició entrada i filtrada ( ? < > : # % + '' ' | & * / )";
  $dia["alreadyExist"]      ="Este arxiu o carpeta ja existeix, introdueix un nou nom.";
  $dia["confirmReplace"]    ="Este arxiu o carpeta ja existeix, serà reemplaçat si valides.";
  $dia["modeDefault"]       ="Default mode";
  $dia["modePreview"]       ="Preview mode";
  $dia["lineNumbers"]       ="View line numbers";
  $dia["colorMode"]         ="Syntax highlighting";
  $dia["includeSubDir"]     ="Include subdirectories ?";
  $dia["modifyingPrefs"]    ="Modifying settings";
  
  // Gestion des droits
  $dia["modifyPermission"]  ="Modificar atributs";                                 
  $dia["noPermission"]      ="No tens permís per a manejar este tipus d'arxius.";  
  $dia["noOperation"]       ="Esta operació no està permesa.";                     
  $dia["modifying"]         ="Modificant atributs ";                               
  $dia["fileAttributes"]    ="Els atributs de l'arxiu";                            
  $dia["cantModify"]        ="no poden ser modificats.";                           
  $dia["modify"]            ="han sigut modificats.";                              
  $dia["modified"]          ="Modificat ";                                         
  $dia["readWrite"]         ="Lectura-escriptura";                                 
  $dia["readOnly"]          ="Només lectura";                                      
  $dia["writeOnly"]         ="Només escriptura";                                   
  $dia["locked"]            ="Arxiu bloquejat";                                    
  $dia["selectAttributes"]  ="Atributs ";                                          
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
  $dia["property"]          ="Propietats ";                    
  $dia["propertyOf"]        ="Propietat de ";                  
  $dia["searchIn"]          ="Buscar en ";                     
  $dia["search"]            ="Introdueix el nom ";              
  $dia["search2"]           ="de l'arxiu o carpeta a buscar ?";
  $dia["searching"]         ="Búsqueda de";                       
  $dia["searching2"]        ="en progrés";                     
  $dia["useCasse"]          ="Discriminar Maj/min ?";          
  $dia["foundIn"]           ="en";                             
  $dia["into"]              ="en";                             
  $dia["and"]               ="i";
  $dia["by"]                ="by";
  $dia["viewed"]            ="Viewed";
  $dia["times"]             ="times";
  $dia["elementsFound"]     =" elements trobats.";             
  $dia["noResult"]          ="No s'ha trobat cap arxiu.";      

  // Tri des éléments
  $dia["sortFile"]          ="Ordenar arxius";
  $dia["byName"]            ="per nom";       
  $dia["byValue"]           ="per valor";     
  $dia["byType"]            ="per tipus";     
  $dia["bySize"]            ="per grandària"; 
  $dia["byDate"]            ="per data";      
  $dia["byPerso"]           ="Personal";      
  $dia["webSort"]           ="per defecte";   
  $dia["ascending"]         ="Ascending";
  $dia["descending"]        ="Descending";
  
  // Commentaires
  $dia["comment"]           ="Comentari";               
  $dia["commentAdded"]      ="Comentari afegit.";      
  $dia["commentsAdded"]     =" comentaris afegits ";    
  $dia["commentNotAdded"]   ="Comentari no afegit.";    
  $dia["addComment"]        ="Afegir comentari ";
  $dia["modifyComment"]     ="Modify comment";
  $dia["removeComment"]     ="Remove comment";
  $dia["addingComment"]     ="Afegint comentari ";      
  $dia["commentFile"]       ="Comentaris en arxiu ";    
  $dia["messageOf"]         ="Missatge de ";            

  // Menu Images
  $dia["previous"]          ="Imatge anterior";
  $dia["next"]              ="Imatge següent";
  $dia["zoomp"]             ="Zoom +";
  $dia["zoomm"]             ="Zoom -";
  $dia["zooms"]             ="Grandària real";
  $dia["diaporama"]         ="Diaporama";
  $dia["refreshMini"]       ="Actualitzar miniatura";
  $dia["rotate90"]          ="Rotar 90° a la dreta";
  $dia["rotate180"]         ="Rotar 180°";
  $dia["rotate270"]         ="Rotar 90° a l'esquerra";
  $dia["flipV"]             ="Voltejar vertical";
  $dia["flipH"]             ="Voltejar horitzontal";
  $dia["resize"]            ="Reescalar ";
  $dia["keepRatio"]         ="Mantindre el ràtio d'aspecte ?";
  $dia["width"]             ="Ample";
  $dia["height"]            ="Alt";
  $dia["pixels"]            ="px";

  // Infos EXIF
  $dia["cliche"]            ="IMATGE";
  $dia["object"]            ="ARXIU";
  $dia["infocomment"]       ="COMENTARI";
  $dia["FileSize"]          ="Grandària d'arxiu";
  $dia["DateTimeOriginal"]  ="Data i hora original";
  $dia["resolution"]        ="Resolució";
  $dia["XResolution"]       ="DPI";
  $dia["Software"]          ="Programari";
  $dia["Photographer"]      ="Fotògraf";
  $dia["ExposureTime"]      ="Temps d'exposició";
  $dia["ApertureFNumber"]   ="Número d'obertura F ";
  $dia["MaxApertureValue"]  ="Valor màxim d'obertura";
  $dia["ISOSpeedRatings"]   ="Mitjanes de velocitat ISO";
  $dia["FocalLength"]       ="Distància focal";
  $dia["ExposureBiasValue"] ="Valor d'exposició Bias";
  $dia["LightSource"]       ="Origen de la llum";
  $dia["Flash"]             ="Flaix";

  // Envoi d'emails
  $dia["authSendMail"]      ="Permetre enviar elements per email";
  $dia["sendMail"]          ="Enviar per email";                  
  $dia["titleMail"]         ="Títol del missatge";                
  $dia["recipientMail"]     ="Indicar l'adreça del receptor"; 
  $dia["contentMail"]       ="Introdueix el teu missatge";         
  $dia["sendMailConfirm"]   ="Envia el teu missatge";             
  $dia["sendMailOK"]        ="El missatge ha sigut enviat.";      
  $dia["sendMailProblem"]   ="El missatge no ha pogut ser enviat.";

  // Corbeille
  $dia["corbeille"]         ="Paperera";
  $dia["binNoElement"]      ="La paperera està buida.";                            
  $dia["binContain"]        ="La paperera conté";                                  
  $dia["emptyBin"]          ="Paperera buida";                                     
  $dia["emptyBinConfirm"]   ="Buidar la paperera ?";                               
  $dia["emptyConfirm"]      ="Eliminar definitivament este element ?";             
  $dia["emptyBinResult"]    ="S'ha buidat la paperera.";                           
  $dia["viewElements"]      ="Vore tots els elements";                            
  $dia["emptyElements"]     ="Buidar tots els elements majors que ";               
  $dia["activeBin"]         ="Activar la paperera per a esta carpeta compartida "; 
  $dia["restoreElement"]    ="Restore element";
  $dia["finally"]           =" finally";

  // Gestion des versions
  $dia["version"]           ="Version ";
  $dia["viewAllVersion"]    ="View all versions";
  $dia["addNewVersion"]     ="Add a new version";

  // Favoris
  $dia["favoris"]           ="Favorits";               
  $dia["addFav"]            ="Afegir a favorits";      
  $dia["removeFav"]         ="Eliminar de favorits";   
  $dia["handleFav"]         ="Manejar favorits";       
  $dia["viewFav"]           ="Vore tots els favorits";
  $dia["favAdded"]          ="The file has been added to bookmarks";
  $dia["favRemoved"]        ="The file has been removed from bookmarks";

  // Tests des partages
  $dia["shareTest"]         ="Fes clic per a provar la configuració.";
  $dia["shareOK"]           ="Esta carpeta compartida és accessible i té suficients permisos.";
  $dia["shareProtected"]    ="Esta carpeta compartida és accessible però no tens suficients permisos.";                   
  $dia["shareNotAcc"]       ="L'arrel indicada no existeix o no tens suficients permisos.";
  $dia["shareFtpNotAcc"]    ="Connexió al servidor FTP impossible.";
  $dia["shareFtpBadLogin"]  ="El servidor FTP ha tornat un error d'identificació, verifica el teu usuari i contrasenya.";
  $dia["shareFtpError"]     ="El servidor FTP ha tornat un error desconegut.";
  $dia["shareFtpcantMount"] ="El punt de muntatge és inabastable al servidor FTP.";
  $dia["shareFtpProtected"] ="El punt de muntatge al servidor FTP no té suficients permisos.";                       
  $dia["shareFtpOK"]        ="Connexió a servidor FTP i prova de carpeta compartida correcta.";                        
  $dia["shareAvailable"]    ="New users can access this shared folder.";

  // Administration
  $dia["adminTitle"]        ="Maneig d'usuaris i servidors";                                  
  $dia["adminHeader"]       ="ADMINISTRACIÓ";                                                 
  $dia["msgFooter"]         ="WebShare sota llicència GPL";                                   
  $dia["adminAlert1"]       ="Ha ocorregut un error tècnic, els canvis no s'han realitzat.";  
  $dia["adminAlert2"]       ="Els canvis s'han realitzat.";                                   
  $dia["notActiv"]          ="Esta característica encara no ha sigut implementada.";          
  $dia["confirmation"]      ="Confirmació";                                                   
  $dia["dialConfirm"]       ="Confirmar ?";
  $dia["adminProtected"]    ="Protected administration panel";
  $dia["adminNotProtected"] ="Administration panel is not protected !";  
  $dia["importToBase"]      ="Import configuration file into database";
  $dia["importSuccessful"]  ="Import to database successful.";
  $dia["importFailed"]      ="Import to database failed.";

  // Panneau Partages
  $dia["adminRub2"]         ="Compartit"; 
  $dia["serverAdmin"]       ="Maneig de carpetes virtuals i compartides"; 
  $dia["newServer"]         ="Nova carpeta compartida";               
  $dia["msgInfo1"]          ="Recorda : Encara no hi ha connexions FTP activades."; 
  $dia["msgInfo2"]          ="Avís : Les trajectòries i els noms d'arxiu només poden contindre caràcters alfabètics o numèrics.";
  $dia["msgInfo3"]          ="No estan permesos la puntuació, accents i espais."; 
  $dia["msgInfo4"]          ="Warning : The administration folder MUST be renamed to protect your installation.";
  $dia["chooseUser"]        ="Tria l'usuari a eliminar";        
  $dia["createUser"]        ="Crear or modificar un usuari i després validar-lo"; 
  $dia["chooseServer"]      ="Tria el servidor a eliminar";   
  $dia["createServer"]      ="Crear or modificar un servidor i després validar-lo";  
  $dia["selectServer"]      ="Select at least un servidor i després validar-lo";
  $dia["FTP"]               ="FTP";                                        
  $dia["local"]             ="local"; 
  $dia["serverFtp"]         ="Servidor (FTP)"; 
  $dia["loginFtp"]          ="Usuari (FTP)";   
  $dia["passFtp"]           ="Contrasenya (FTP)"; 
  $dia["portFtp"]           ="Port (FTP)"; 
  $dia["shareRoot"]         ="Arrel";    
  $dia["serverRoot"]        ="Servidor arrel"; 
  $dia["virtualRoot"]       ="Arrel virtual";   
  $dia["defaultRoot"]       ="Carpeta per defecte"; 
  $dia["protectRep"]        ="Protegir noves carpetes amb l'arxiu :"; 
  $dia["modeDegrade"]       ="Mode degradat"; 
  $dia["protectShare"]      ="Modifications are allowed on this shared folder";  
  $dia["serverType"]        ="Tipo";
  $dia["createNewAccount"]  ="Create a new user account";
  $dia["chooseAccount"]     ="Choose the user account to open :";

  // Panneau Utilisateur
  $dia["adminRub1"]         ="Usuaris";   
  $dia["userAdmin"]         ="Maneig d'usuaris"; 
  $dia["newUser"]           ="Nou usuari";       
  $dia["administrator"]     ="Administrador";    
  $dia["email"]             ="Email";
  $dia["lang"]              ="Idioma";           
  $dia["user"]              ="Usuari";        
  $dia["group"]             ="Grup";          
  $dia["name"]              ="Nom";           
  $dia["login"]             ="Usuari";        
  $dia["passwd"]            ="Contrasenya";   
  $dia["confirmation"]      ="Confirmació";    
  $dia["connexion"]         ="Connexió";       
  $dia["default"]           ="Navegar";        
  $dia["explore"]           ="Explorar";       
  $dia["visualis"]          ="Tema";           
  $dia["leftPanel"]         ="Panell per defecte"; 
  $dia["webSort"]           ="Ordenació per defecte"; 
  $dia["webDir"]            ="Previsualitzar carpeta web"; 
  $dia["nameShare"]         ="Compartit ";                  
  $dia["access"]            ="Accés a compartit ";           
  $dia["select"]            ="Seleccionar";   
  $dia["open"]              ="Obrir";          
  $dia["menuContext"]       ="Menú contextual"; 
  $dia["leftClic"]          ="Clic esquerre:";   
  $dia["rightClic"]         ="Clic dret:";       
  $dia["doubleClic"]        ="Doble clic:";      
  $dia["toModify"]          ="Modificar";       
  $dia["toCreate"]          ="Crear";           
  $dia["toRead"]            ="Llegir";           
  $dia["regexp"]            ="(RegExp > Afegir noves expressions separades per | ) :";    
  $dia["filterElement"]     ="Filtrar elements que continguen";    
  $dia["recoExtension"]     ="Es reconeixen les següents extensions";
  $dia["sessionTime"]       ="Duració de la sessió  (min)";           
  $dia["defStyle"]          ="Tema per defecte";                        
  $dia["actionAuth"]        ="L'usuari està autoritzat per a realitzar les següents accions en elements no bloquejats :"; 
  $dia["userType"]          ="Tipo";

  // Panneau Préférences
  $dia["adminRub3"]         ="Preferències";                                  
  $dia["prefAdmin"]         ="Maneig de preferències";                        
  $dia["baseAdmin"]         ="Maneig de base de dades";                       
  $dia["memoMax"]           ="Memòria permesa per als scripts ";              
  $dia["execMax"]           ="Duració per als scripts ";                      
  $dia["postMax"]           ="Grandària límit per a les data post";           
  $dia["uploMax"]           ="Grandària límit per a les pujades";             
  $dia["lifeMax"]           ="Duració";                                       
  $dia["timeMax"]           ="Duració de les pujades ";                       
  $dia["previewWeb"]        ="Activar previsualització lloc web";             
  $dia["previewAct"]        ="Activar miniatures ";                           
  $dia["previewPDF"]        ="Activar previsualització d'arxius PDF";         
  $dia["logAct"]            ="Activar logs";                                  
  $dia["sepAdr"]            ="Separar adreça per ";                         
  $dia["alwaysConfirm"]     ="Confirmar cada acció";                          
  $dia["effectAct"]         ="Activar efectes gràfics";                       
  $dia["completePath"]      ="Vore trajectòries completes";                  
  $dia["frameTitle"]        ="Títol de la finestra";                          
  $dia["viewClock"]         ="Vore rellotge";                                
  $dia["diapoSpeed"]        ="Velocitat de diaporama";                        
  $dia["diapoStop"]         ="Parar diaporama";                               
  $dia["arboLink"]          ="Vore enllaços en arbre de carpetes";           
  $dia["activeMini"]        ="Activar miniatures ";                           
  $dia["dynWindow"]         ="Dynamic Windows";                               
  $dia["serverBase"]        ="Servidor mySQL";                                
  $dia["loginBase"]         ="Usuari mySQL ";                                 
  $dia["passBase"]          ="Contrasenya mySQL";                             
  $dia["tableBase"]         ="Selecciona taula BD";                              
  $dia["myPref"]            ="My preferences";
  $dia["privateWS"]         ="Private share";
  $dia["publicWS"]          ="Public share";
  $dia["accountUser"]       ="Users can create their own account";
  
  // Panneau Infos
  $dia["adminRub5"]         ="Informació"; 
  $dia["infoAdmin"]         ="informe de la instal·lació "; 
  $dia["theExt"]            ="L'extensió";                 
  $dia["activated"]         =" està activada.";           
  $dia["notActivated"]      =" no està activada.";        
  $dia["libZip"]            ="(Maneig d'arxius ZIP)";    
  $dia["libGD"]             ="(Maneig d'imatges i miniatures)"; 
  $dia["libMB"]             ="(Maneig de caràcters especials)";  
  $dia["libXslt"]           ="(Maneig complementari de Xslt)";   
  $dia["libFTP"]            ="(Connexions FTP remotes)";  
  $dia["libPdf"]            ="(Maneig de miniatures PDF)";   
  $dia["libMail"]           ="(Enviar elements per email)";   
  $dia["libExif"]           ="(Mostrar informació Exif)";   
  $dia["dontExist"]         ="no existeix.";                
  $dia["notAccessible"]     ="no existeix o no és accessible.";  
  $dia["accessProtect"]     ="existeix però no es pot escriure."; 
  $dia["isAccessible"]      ="existeix i es pot escriure.";       
  $dia["modulesDetected"]   ="s'ha detectat i conté els següents mòduls :"; 
  $dia["langDetected"]      ="s'ha detectat i conté els idiomes següents :"; 
  $dia["styleDetected"]     ="s'ha detectat i conté els temes següents :";   
  $dia["cgiUpNotDetected"]  ="no s'ha detectat.";                           
  $dia["cgiUpLimited"]      ="s'ha detectat però no té suficients permisos."; 
  $dia["cgiUpDetected"]     ="s'ha detectat i té suficients permisos.";      
  $dia["unlimitedUpload"]   ="Pots pujar arxiu sense límit de grandària.";  
  $dia["alertfunction1"]    ="La configuració del servidor pareix que imposa algunes limitacions,";
  $dia["alertfunction2"]    ="algunes característiques de Webshare potser estaran restringides.";  
  $dia["alertfunction3"]    ="This feature is available only when Webshare is connected to a database.";
  $dia["msgVarNotModif1"]   ="Webshare no pot modificar estos valors. En cas de problemes, "; 
  $dia["msgVarNotModif2"]   ="modifica els parametres directament a l'arxiu 'php.ini'.";
  $dia["msgVarModifiable1"] ="Pots modificar estos valors si tens cap problema ";
  $dia["msgVarModifiable2"] ="en Webshare. ";
  $dia["tip1"]              ="Els valors indicats limiten actualment cada script a ";
  $dia["tip2"]              ="segons de vida i pujades a ";
  $dia["propProcess"]       ="Ownership of the Webshare (PHP) process ";
  $dia["limitProcess"]      ="This process has limited rights.";


  // Panneau Associations
  $dia["adminRub4"]         ="Associacions";
  $dia["moduAdmin"]         ="Maneig de mòduls";
  $dia["assoAdmin"]         ="Maneig d'associacions";
  $dia["extension"]         ="Extensió";
  $dia["exttype"]           ="Tipus";
  $dia["extmime"]           ="Mime";
  $dia["extact1"]           ="Acció per defecte";
  $dia["extact2"]           ="Acció secundària";
  $dia["toAdd"]             ="Afegir";
  $dia["newStyle"]          ="Afegir un nou tema";
  $dia["newModule"]         ="Afegir un nou mòdul";
  $dia["updateWS"]          ="Actualitzar aplicació";
  $dia["noVersionAv"]       ="No hi ha cap versió nova disponible";
  $dia["newVersionAv"]      ="Nova versió disponible";

  // Panneau Logs
  $dia["adminRub6"]         ="Logs";           
  $dia["logsAdmin"]         ="Visor de Log";   
  $dia["notConnected"]      ="La connexió a la base de dades ha fallat, per favor corregeix els paràmetres.";                                 
  $dia["connectedDB"]       ="La connexió a la base de dades està operativa.";   
  $dia["msgBase"]           ="La configuració de la base de dades no és essencial, però els esdeveniments al (log) no estan activats."; 
  $dia["noLog"]             ="Logs no disponibles";  
  $dia["all"]               ="Tots";            
  $dia["allf"]              ="Totes";         
  $dia["resultInd"]         ="Neutral";       
  $dia["resultPos"]         ="Positiu";       
  $dia["resultNeg"]         ="Negatiu";       
  $dia["noLogs"]            ="No hi ha accions per a esta selecció";  
  $dia["viewAction"]        ="Vore accions :";              
  $dia["madeBy"]            ="realitzades per";             
  $dia["withResult"]        ="amb resultat";     
  $dia["fromDate"]          ="Període des de";   
  $dia["toDate"]            ="a";                
  $dia["ofDate"]            ="Vore dia";          
  $dia["day"]               ="dia";           
  $dia["days"]              ="dies";              
  $dia["exploreShare"]      ="Exploració compartida";     
  
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
  $_SESSION["ws"]["dia"]["noConf"]  ="No s'ha trobat cap  <br/>usuari o compte al servidor. <br/><br/>Ves al <a href='admin/index.php' style='text-decoration:underline'>panell d'administració </a><br/>per a configurar els teus comptes. <br/><br/>Consulta la documentació <br/>per a més informació.<br/><br/>";
  $_SESSION["ws"]["dia"]["noServer"]="No s'ha trobat cap compte de servidor. <br/><br/>Ves al <a href='admin/index.php' style='text-decoration:underline'>panell d'administració</a><br/>per a configurar els teus comptes. <br/><br/>Consulta la documentació <br/>per a més informació.<br/><br/><br/>";
  $_SESSION["ws"]["dia"]["noUser"]  ="No s'ha trobat cap compte d'usuari. <br/><br/>Ves al <a href='admin/index.php' style='text-decoration:underline'>panell d'administració</a><br/>per a configurar els teus comptes. <br/><br/>Consulta la documentació <br/>per a més informació.<br/><br/><br/>";
  $_SESSION["ws"]["dia"]["noJS"]    ="No s'ha detectat JavaScript <br/>al teu navegador. <br/><br/>Activa Javascript o tria <br/>un navegador més actual<br/>per a usar Webshare.<br/><br/>";
  $_SESSION["ws"]["dia"]["protect1"]="Entres a l'administració de WebShare per primera vegada. Per protegir la teua instal·lació, has de definir un usuari i contrasenya que et serà preguntat sistematicament durant el teu pròximo accés.<br/><br/>";
  $_SESSION["ws"]["dia"]["protect2"]="* Els camps contrasenya han de coincidir per asegurar-se la seua validesa.<br/>Introdueix únicament caracters alfanumèrics als camps.<br/>Per a cambiar el teu usuari més tard, edita l'arxiu .htaccess situat a la carpeta d'administració.<br/><br/>";

  }
?>
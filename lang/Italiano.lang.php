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
// Fonction : Italian translation file
// Nom      : Italian.lang.php
// Version  : 0.8.2
// Date     : 14/01/09
// Author   : Eugenio Bartolo
// =======================================================================
// Text encoding: UTF-8/UNIX(LF)

  if (isset($_REQUEST["name"])&&(intval($_REQUEST["name"])==1))
    $nameLanguage      ="Italian - Italiano"; else {

  $listeMois= array("","Gen.","Feb.","Mar.","Apr.","Mag.","Giu","Lug.","Ago.","Set.","Ott.","Nov.","Dic.");
  $listeJour= array("","Lun"=>"Lunedi","Mar"=>"Martedi","Mer"=>"Mercoledi","Gio"=>"Giovedi","Ven"=>"Venerdi","Sab"=>"Sabato","Dom"=>"Domenica");

  $dia= array();

  // Panneau de login
  $dia["ident"]             ="Inserisci le credenziali per la login:";
  $dia["cantIdent"]         ="Login non avvenuta !";
  $dia["identProblem1"]     ="Server non raggiungibile !";
  $dia["identProblem2"]     ="Problemi tecnici !";
  $dia["identProblem3"]     ="Impossibile stabilire la connessione con il server LDAP.";
  $dia["enter"]             ="Entra";

  // Interface
  $dia["loading"]           ="Caricamento in corso";
  $dia["actualDir"]         ="Cartella corrente: ";
  $dia["connected"]         ="Connesso come ";
  $dia["directLink"]        ="Link diretto";
  $dia["filePreview"]       ="Anteprima file";
  $dia["pictPreview"]       ="Anteprima immagine";
  $dia["webPreview"]        ="Esploro ";
  $dia["niveauSup"]         ="Livello superiore";
  $dia["closePanel"]        ="Chiudi finestra";
  $dia["picTooBig"]         ="Dimensioni immagine troppo grande per essere visualizzata";
  $dia["previousPage"]      ="Pagina precedente";
  $dia["nextPage"]          ="Next page";
  $dia["upDir"]             ="Livello superiore";
  $dia["updateDir"]         ="Aggiorna cartella";
  $dia["changeStyle"]       ="Scegli skin";
  $dia["refreshTree"]       ="Aggiorna struttura cartella";
  $dia["hideTree"]          ="Riduci struttura cartella";
  $dia["showTree"]          ="Mostra struttura cartella";
  $dia["printGallery"]      ="Stampa galleria";
  $dia["renameAll"]         ="Rinomina tutti";
  $dia["saveAll"]           ="Salva tutti";
  $dia["savePic"]           ="Salva immagine";
  $dia["webSite"]           ="Sito web";
  $dia["affichage"]         ="Mostra";
  $dia["expPanel"]          ="Pannello struttura cartella";
  $dia["background"]        ="Sfondo";
  $dia["miniature"]         ="Miniature";
  $dia["bigIcone"]          ="Icone grandi";
  $dia["liste"]             ="Lista";
  $dia["details"]           ="Dettagli";
  $dia["none"]              ="Nessuno";
  $dia["arbo"]              ="Struttura cartella";
  $dia["closeWindow"]       ="Chiudi finestra";
  $dia["viewContent"]       ="Visualizza contenuto";
  $dia["changeUser"]        ="Cambia utente";
  $dia["onlineHelp"]        ="Help Online";
  $dia["rapport"]           ="Notifica un bug";
  $dia["options"]           ="Opzioni";
  $dia["contact"]           ="Contatti";
  $dia["about"]             ="Riguardo a";
  $dia["total"]             ="Totale";
  $dia["used"]              ="Usato";
  $dia["free"]              ="Disponibile";
  $dia["octet"]             ="b";
  $dia["selectAll"]         ="Seleziona tutto";
  $dia["select"]            ="Seleziona";
  $dia["unselect"]          ="Deseleziona";
  $dia["expression"]        ="sspressione";
  $dia["inAllFiles"]        ="in tutti i file";
  $dia["distribGPL"]        ="Distribuito con licenza GPL";
  $dia["moreInfos"]         ="Per informazioni e supporto, visita il sito ufficiale.";
  $dia["websiteAdr"]        ="en.webshare.fr";
  
  // Verbes / actions
  $dia["openFile"]          ="Apri";
  $dia["openFileWith"]      ="Apri con..";
  $dia["saveFile"]          ="Salva";
  $dia["toExplore"]         ="Esplora";
  $dia["toBrowse"]          ="Browse";
  $dia["toVisit"]           ="Visita";
  $dia["toView"]            ="Visualizza";
  $dia["toWatch"]           ="Osserva";
  $dia["toListen"]          ="Ascolta";
  $dia["toPrint"]           ="Stampa";
  $dia["toUpload"]          ="Upload";
  $dia["toCut"]             ="Taglia";
  $dia["toCopy"]            ="Copy";
  $dia["toPaste"]           ="Incolla";
  $dia["toMove"]            ="Sposta";
  $dia["toDelete"]          ="Elimina";
  $dia["toChmod"]           ="Modifica attributi";
  $dia["toSearch"]          ="Cerca";
  $dia["toRename"]          ="Rinomina";
  $dia["toComment"]         ="Commenta";
  $dia["toValid"]           ="Valida";
  $dia["toEdit"]            ="Edita";
  $dia["toModify"]          ="Modifica";
  $dia["toZip"]             ="Zip";
  $dia["toDezip"]           ="Dezip";
  $dia["toRecover"]         ="Effettua recovery";
  $dia["toConnect"]         ="Connetti";
  $dia["toQuit"]            ="Esci";
  $dia["toVerify"]          ="Verifica";
  $dia["toReplace"]         ="Sostituisci";
  $dia["choose"]            ="Choose...";

  // Chargement de fichier
  $dia["addUpload"]         ="Aggiungi file";
  $dia["startUpload"]       ="Inizia upload";
  $dia["limitTaille"]       ="Dimensione massima per l'upload dei file su server: ";
  $dia["ifFileExist"]       ="Se il file gia' esiste :";
  $dia["replaceFile"]       ="Sostituisci";
  $dia["renameFile"]        ="Rinomina";
  $dia["cancelFile"]        ="Elimina";
  $dia["waitingDownload"]   ="Attendo l'upload";
  $dia["problemDownload"]   ="Problemi durante l'upload del file";
  $dia["prohibited"]        ="Non hai i privilegi per modificare questo file.";
  $dia["downloading"]       ="Download in corso";
  $dia["uploading"]         ="Upload in corso";
  $dia["started"]           ="Iniziato";
  $dia["success"]           ="Caricato correttamente";
  $dia["tempNotSet"]        ="Cartella temporanea non definita";
  $dia["withSuccess"]       ="correttamente";
  $dia["uploaded"]          ="caricato.";
  $dia["succesUpload"]      ="Caricato correttamente";
  $dia["cantOpen"]          ="Impossibile aprire il file ";
  $dia["cantWrite"]         ="Impossibile scrivere sul file ";
  $dia["fileTooBig"]        ="La dimensione del file eccede il limite.";
  $dia["wait"]              ="In attesa";

  // Creation de nouveaux élements
  $dia["newFile"]           ="Nuovo file";
  $dia["newDir"]            ="Nuova cartella";
  $dia["newTxt"]            ="Nuovo testo";
  $dia["newLink"]           ="Nuovo link";
  $dia["making"]            ="Sto creando";
  $dia["areYouSure"]        ="Sei sicuro di voler ";
  $dia["toDisconnect"]      ="disconnect ?";
  $dia["addTxt"]            ="Per favore inserisci il nome di un nuovo documento di testo:";
  $dia["addDir"]            ="Per favore inserisci il nome di una nuova cartella:";
  $dia["addNew"]            ="Inserisci un nuovo";
  $dia["addLink"]           ="Inserisci il nome del link ";
  $dia["addLink2"]          ="e l'indirizzo del nuovo link:";
  $dia["dirCreate"]         ="La creazione della cartella";
  $dia["txtCreate"]         ="La creazione del nuovo documento di testo";
  $dia["linkCreate"]        ="La creazione del link";
  $dia["linkTo"]            ="Link a";
  $dia["created"]           ="creato";
  $dia["theNewDir"]         ="La nuova cartella";
  $dia["theNewLink"]        ="Il nuovo link";
  $dia["theNewTxt"]         ="Il nuovo documento di testo";

  // Réponses
  $dia["File"]              ="File";
  $dia["rep"]               ="cartella";
  $dia["dir"]               =" cartella";
  $dia["file"]              =" file";
  $dia["ofDir"]             =" della cartella ";
  $dia["ofFile"]            =" del file ";
  $dia["onFile"]            =" sul file ";
  $dia["toDir"]             =" alla cartella ";  
  $dia["toFile"]            =" al file ";   
  $dia["theDir"]            ="La cartella ";
  $dia["theFile"]           ="Il file ";
  $dia["element"]           ="elementi";
  $dia["hasBeen"]           ="e' stato ";
  $dia["hasNotBeen"]        ="non e' stato ";
  $dia["hasFailed"]         ="e' fallito";
  $dia["successful"]        ="e' stato effettuato con successo";
  $dia["dezipping"]         ="Scompattazione archivio.";
  $dia["dezipped"]          ="scompattato";
  $dia["startEdit"]         ="Inizio editing del file ";
  $dia["endEdit"]           ="Termine editing the file ";
  $dia["confirmEdit"]       ="e' stato modificato e salvato.";
  $dia["savingDocument"]    ="Salvataggio documento ";
  $dia["savingDirContent"]  ="Salvataggio del contenuto della cartella ";
  $dia["savingFile"]        ="Salvataggio file ";
  $dia["backgAdded"]        ="Immagine aggiunta come sfondo.";
  $dia["backgRemoved"]      ="Sfondo eliminato.";


  // Renommage / Déplacement / Suppression
  $dia["rename"]            ="Inserisci il nuovo nome ";
  $dia["renaming"]          ="Rinomino";
  $dia["renamed"]           ="rinominata";
  $dia["confirmSup"]        ="Confermi la rimozione dell'associazione di questo file ?";
  $dia["delete"]            ="Vuoi veramente cancellare ";
  $dia["delete2"]           ="e il suo contenuto ?";
  $dia["deleting"]          ="Rimozione";
  $dia["deleted"]           ="rimossa";
  $dia["theRemove"]         ="La rimozione";
  $dia["copyOf"]            ="Copia-di-";
  $dia["onlyCopy"]          ="ma e' stata copiata.";
  $dia["fileExist"]         ="Esiste gia' un file con questo nome.";
  $dia["goingToCopy"]       ="sta per essere copiata, scegliere la destinazione.";
  $dia["goingToMove"]       ="sta per essere spostata, scegliere la destinazione.";
  $dia["moving"]            ="Spostamento ";
  $dia["moved"]             ="spostata";
  $dia["fileEditing"]       ="Editing ";
  $dia["copying"]           ="Copia in corso ";
  $dia["copyingFile"]       ="Copia del file caricato nella sua destinazione";
  $dia["copied"]            ="copiato";
  $dia["toActualDir"]       ="nella cartella corrente";
  $dia["typeOfElement"]     ="Documento ";
  $dia["copyTo"]            ="copia";
  $dia["moveTo"]            ="sposta";
  $dia["prohibCar"]         ="Simbolo non permesso ( ? < > : # % + '' ' | & * / )";
  $dia["alreadyExist"]      ="Questo file o cartella e' gia' esistente, scegliere un altro nome.";
  $dia["confirmReplace"]    ="Questo file o cartella e' gia' esistente, sara' sostituito se dai conferma.";
  $dia["modeDefault"]       ="Default mode";
  $dia["modePreview"]       ="Preview mode";
  $dia["lineNumbers"]       ="View line numbers";
  $dia["colorMode"]         ="Syntax highlighting";
  $dia["includeSubDir"]     ="Include subdirectories ?";
  $dia["modifyingPrefs"]    ="Modifying settings";

  // Gestion des droits
  $dia["modifyPermission"]  ="Modifica attributi";
  $dia["noPermission"]      ="non hai i privilegi per gestire questo tipo di file.";
  $dia["noOperation"]       ="Operazione non permessa.";
  $dia["modifying"]         ="Modifica attributi ";
  $dia["fileAttributes"]    ="Attributi del file";
  $dia["cantModify"]        ="non possono essere modificati.";
  $dia["modify"]            ="sono stati modificati.";
  $dia["modified"]          ="Modificati ";
  $dia["readWrite"]         ="Lettura-Scrittura";
  $dia["readOnly"]          ="Solo lettura";
  $dia["writeOnly"]         ="Solo scrittura";
  $dia["locked"]            ="File bloccato";
  $dia["selectAttributes"]  ="Attributi ";
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
  $dia["property"]          ="Proprieta' ";
  $dia["propertyOf"]        ="Proprieta' di ";
  $dia["searchIn"]          ="Cerca in ";
  $dia["search"]            ="Inserisci il nome ";
  $dia["search2"]           ="del file o cartella da cercare ?";
  $dia["searching"]         ="Ricerca di ";
  $dia["searching2"]        ="in corso";
  $dia["useCasse"]          ="Case sensitive ?";
  $dia["foundIn"]           ="in";
  $dia["into"]              ="all'interno di";
  $dia["and"]               ="e";
  $dia["by"]                ="da";
  $dia["viewed"]            ="Visualizzato";
  $dia["times"]             ="volte";
  $dia["elementsFound"]     =" elementi trovati.";
  $dia["noResult"]          ="Nessun elemento trovato.";

  // Tri des éléments
  $dia["sortFile"]          ="Ordina file per";
  $dia["byName"]            ="per nome";
  $dia["byValue"]           ="per valore";
  $dia["byType"]            ="per tipo";
  $dia["bySize"]            ="per dimensione";
  $dia["byDate"]            ="per data";
  $dia["byPerso"]           ="Personale";
  $dia["webSort"]           ="Ordinamento Default";
  $dia["ascending"]         ="Ascendente";
  $dia["descending"]        ="Discendente";

  // Commentaires
  $dia["comment"]           ="Commento";
  $dia["commentAdded"]      ="Commento aggiunto.";
  $dia["commentsAdded"]     =" commenti aggiunti ";
  $dia["commentNotAdded"]   ="Commento not aggiunto.";
  $dia["addComment"]        ="Aggiungi commento ";
  $dia["modifyComment"]     ="Modifica commento";
  $dia["removeComment"]     ="Elimina commento";
  $dia["addingComment"]     ="Aggiunta di un commento ";
  $dia["commentFile"]       ="Commenti al file ";
  $dia["messageOf"]         ="Messaggio di ";

  // Menu Images
  $dia["previous"]          ="Immagine precedente";
  $dia["next"]              ="Immagine successiva";
  $dia["fullScreen"]        ="Schermo intero";
  $dia["reducePanel"]       ="Riduci";
  $dia["zoomp"]             ="Zoom +";
  $dia["zoomm"]             ="Zoom -";
  $dia["zooms"]             ="Grandezza reale";
  $dia["diaporama"]         ="Diaporama";
  $dia["refreshMini"]       ="Aggiorna miniatura";
  $dia["rotate90"]          ="Ruota 90° destra";
  $dia["rotate180"]         ="Ruota 180°";
  $dia["rotate270"]         ="Ruota 90° sinistra";
  $dia["flipV"]             ="Rifletti verticale";
  $dia["flipH"]             ="Rifletti orizzontale";
  $dia["resize"]            ="Ridimensiona ";
  $dia["keepRatio"]         ="Mantieni proporzioni ?";
  $dia["width"]             ="Larghezza";
  $dia["height"]            ="Altezza";
  $dia["pixels"]            ="px";

  // Infos EXIF
  $dia["cliche"]            ="IMMAGINE";
  $dia["object"]            ="FILE";
  $dia["infocomment"]       ="COMMENTO";
  $dia["FileSize"]          ="Dimensione File";
  $dia["DateTimeOriginal"]  ="Data Ora Originale";
  $dia["resolution"]        ="Risoluzione";
  $dia["XResolution"]       ="DPI";
  $dia["Software"]          ="Software";
  $dia["Photographer"]      ="Fotografo";
  $dia["ExposureTime"]      ="Tempo di Esposizione";
  $dia["ApertureFNumber"]   ="Apertura Numero F";
  $dia["MaxApertureValue"]  ="Valore Max Apertura";
  $dia["ISOSpeedRatings"]   ="Velocita' ISO";
  $dia["FocalLength"]       ="Lunghezza Focale";
  $dia["ExposureBiasValue"] ="Valore Esposizione Bias";
  $dia["LightSource"]       ="Fonte di Luce";
  $dia["Flash"]             ="Flash";

  // Envoi d'emails
  $dia["authSendMail"]      ="Autorizza l'invio di elementi via email";
  $dia["sendMail"]          ="Inviato via email";
  $dia["titleMail"]         ="Titolo del messaggio";
  $dia["recipientMail"]     ="Indica l'indirizzo email del destinatario";
  $dia["contentMail"]       ="Inserisci il tuo messaggio";
  $dia["sendMailConfirm"]   ="Invia il tuo messaggio";
  $dia["sendingMail"]       ="Invio del messaggio";    
  $dia["sendMailOK"]        ="Il messaggio e' stato inviato.";
  $dia["sendMailProblem"]   ="Il messaggio non e' stato inviato.";
  $dia["mailSendTitle"]     ="Nuovo file aggiunto nel tuo WebShare";  
  $dia["mailSendFile1"]     ="Ciao, un nuovo file e' stato aggiunto nel tuo WebShare ";
  $dia["mailSendFile2"]     ="Clicca sul link seguente per scaricare questo file: ";
  $dia["mailSendFile3"]     ="";
  $dia["mailSendFile4"]     ="Buona giornata.";  

  // Corbeille
  $dia["corbeille"]         ="Cestino";
  $dia["binNoElement"]      ="Il cestino e' vuoto.";
  $dia["binContain"]        ="Il cestino contiene";
  $dia["emptyBin"]          ="Svuota cestino";
  $dia["emptyBinConfirm"]   ="Sei sicuro di voler svuotare il cestino ?";
  $dia["emptyConfirm"]      ="Sei sicuro di voler rimuovere definitivamente questo elemento ?";
  $dia["emptyBinResult"]    ="Il cestino e' stato svuotato.";
  $dia["viewElements"]      ="Visualizza tutti gli elementi";
  $dia["emptyElements"]     ="Svuota tutti gli elementi piu' di ";
  $dia["activeBin"]         ="Attiva il cestino per questa cartella condivisa ";
  $dia["restoreElement"]    ="Restore element";
  $dia["finally"]           =" finally";

  // Gestion des versions
  $dia["version"]           ="Versione ";
  $dia["viewAllVersion"]    ="Visualizza tutte le versioni";
  $dia["addNewVersion"]     ="Aggiungi una nuova versione";

  // Favoris
  $dia["favoris"]           ="Preferiti";
  $dia["addFav"]            ="Aggiungi ai preferiti";
  $dia["removeFav"]         ="Rimuovi dai preferiti";
  $dia["handleFav"]         ="Gestisci preferiti";
  $dia["viewFav"]           ="Visualizza tutti i preferiti";
  $dia["favAdded"]          ="The file has been added to bookmarks";
  $dia["favRemoved"]        ="The file has been removed from bookmarks";
  
  // Tests des partages
  $dia["shareTest"]         ="Clicca per provare le impostazioni.";
  $dia["shareOK"]           ="Questa cartella condivisa e' accessibile e ha i privliegi necessari.";
  $dia["shareProtected"]    ="Questa cartella condivisa e' accessibile ma non ha i privilegi necessari.";
  $dia["shareNotAcc"]       ="Il percorso indicato non e' accessibile o non esiste.";
  $dia["shareFtpNotAcc"]    ="Connessione al server FTP impossibile.";
  $dia["shareFtpBadLogin"]  ="Il server FTP ha risposto con un errore di identificazione, verifica login e password.";
  $dia["shareFtpError"]     ="Il server FTP ha risposto con un errore sconosciuto.";
  $dia["shareFtpcantMount"] ="Il punto di montaggio non e' raggiungibile sul server FTP.";
  $dia["shareFtpProtected"] ="Il punto di montaggio sul server FTP non ha i privilegi necessari.";
  $dia["shareFtpOK"]        ="La connessione al server FTP server e la prova della cartella condivisa hanno avuto esito positivo.";
  $dia["shareAvailable"]    ="New users can access this shared folder.";

  // Administration
  $dia["adminTitle"]        ="Gestione utenti e server";
  $dia["adminHeader"]       ="AMMINISTRAZIONE";
  $dia["msgFooter"]         ="WebShare su Licenza GPL";
  $dia["adminAlert1"]       ="Si e' verificato un problema tecnico, non sono stati effettuati cambiamenti.";
  $dia["adminAlert2"]       ="I cambiamenti sono stati effettuati.";
  $dia["notActiv"]          ="Questa opzione non e' stata ancora implementata.";
  $dia["confirmation"]      ="Conferma";
  $dia["dialConfirm"]       ="Confermi ?";
  $dia["adminProtected"]    ="Pannello di amministrazione protetto";
  $dia["adminNotProtected"] ="Pannello di amministrazione non protetto !";
  $dia["importConfirm"]     ="Confermi l'importazione del file nel database ?";
  $dia["importToBase"]      ="Importazione file di configurazione nel database";
  $dia["importSuccessful"]  ="Importazione nel database avvenuta con successo.";
  $dia["importFailed"]      ="Importazione nel database fallita.";

  // Panneau Partages
  $dia["adminRub2"]         ="Condivisioni";
  $dia["serverAdmin"]       ="Gestione condivisioni e cartelle virtuali";
  $dia["newServer"]         ="Nuova cartella condivisa";
  $dia["msgInfo1"]          ="Ricorda: le connessioni FTP non sono state ancora attivate.";
  $dia["msgInfo2"]          ="Attenzione: i nomi dei percorsi e dei file devono solo contenere lettere (minuscole o maiuscole) e numeri.";
  $dia["msgInfo3"]          ="Segni di punteggiatura, accenti e spazio non sono permessi.";
  $dia["msgInfo4"]          ="Warning : The administration folder MUST be renamed to protect your installation.";
  $dia["chooseUser"]        ="Scegli l'utente da eliminare";
  $dia["createUser"]        ="Crea o modifica un utente, poi convalida";
  $dia["chooseServer"]      ="Scegli il server da eliminare";
  $dia["createServer"]      ="Crea o modifica un server, poi convalida";
  $dia["selectServer"]      ="Scegli almeno un server da convalidare";
  $dia["FTP"]               ="FTP";
  $dia["local"]             ="locale";
  $dia["serverFtp"]         ="Server (FTP)";
  $dia["loginFtp"]          ="Login (FTP)";
  $dia["passFtp"]           ="Password (FTP)";
  $dia["portFtp"]           ="Porta (FTP)";
  $dia["shareRoot"]         ="root";
  $dia["serverRoot"]        ="Server root";
  $dia["virtualRoot"]       ="Virtual root";
  $dia["defaultRoot"]       ="Cartella principale";
  $dia["webRoot"]           ="Web root";  
  $dia["protectRep"]        ="Proteggi nuove cartelle con file :";
  $dia["modeDegrade"]       ="Modalita' Degrado";
  $dia["protectShare"]      ="Sono concesse modifiche su questa cartella condivisa";  
  $dia["serverType"]        ="Tipo";
  $dia["serverPosition"]    ="Posizione";  

  // Panneau Utilisateur
  $dia["adminRub1"]         ="Utenti";
  $dia["userAdmin"]         ="Gestione utenti";
  $dia["newUser"]           ="Nuovo utente";
  $dia["administrator"]     ="Amministratore";
  $dia["email"]             ="Email";
  $dia["lang"]              ="Lingua";
  $dia["user"]              ="Utente";
  $dia["group"]             ="Gruppo";
  $dia["name"]              ="Nome";
  $dia["login"]             ="Login";
  $dia["passwd"]            ="Password";
  $dia["confirmation"]      ="Conferma";
  $dia["connexion"]         ="Connessione";
  $dia["default"]           ="Esplora";
  $dia["explore"]           ="Explorer";
  $dia["visualis"]          ="Stile";
  $dia["leftPanel"]         ="Pannello principale";
  $dia["webSort"]           ="Ordinamento di default";
  $dia["webDir"]            ="Anteprima cartella web";
  $dia["nameShare"]         ="Condivisioni ";
  $dia["access"]            ="Accesso alle condivisioni ";
  $dia["select"]            ="Scegli";
  $dia["open"]              ="Apri";
  $dia["menuContext"]       ="Menu contestuale";
  $dia["leftClic"]          ="Clic sinistro :";
  $dia["rightClic"]         ="Clic destro :";
  $dia["doubleClic"]        ="Doppio clic :";
  $dia["toModify"]          ="Modifica";
  $dia["toCreate"]          ="Crea";
  $dia["toRead"]            ="Leggi";
  $dia["regexp"]            ="(RegExp > Aggiungi nuova espressione separata da | ) :";
  $dia["filterElement"]     ="Filtra elementi contenenti";
  $dia["recoExtension"]     ="Sono state riconosciute le seguenti estensioni";
  $dia["defStyle"]          ="Default style";  
  $dia["sessionTime"]       ="Durata sessione (min)";
  $dia["actionAuth"]        ="L'utente e' autorizzato ad effettuare le seguenti azioni sugli elementi non bloccati :";
  $dia["userType"]          ="Tipo";
  $dia["createNewAccount"]  ="Create a new user account";
  $dia["chooseAccount"]     ="Choose the user account to open :";

  // Panneau Préférences
  $dia["adminRub3"]         ="Preferenze";
  $dia["prefAdmin"]         ="Gestione preferenze";
  $dia["baseAdmin"]         ="Gestione database";
  $dia["memoMax"]           ="Memoria riservata agli script ";
  $dia["execMax"]           ="Durata di vita degli script ";
  $dia["postMax"]           ="Limite dimensioni per i post ";
  $dia["uploMax"]           ="Limite dimensioni per gli upload ";
  $dia["lifeMax"]           ="Durata di vita ";
  $dia["timeMax"]           ="Durata di vita degli upload ";
  $dia["previewWeb"]        ="Attiva anteprime del sito web";
  $dia["previewAct"]        ="Attiva anteprime miniature";
  $dia["previewPDF"]        ="Attiva anteprime dei file PDF files";
  $dia["logAct"]            ="Attiva log";
  $dia["sepAdr"]            ="Separa indirizzi con ";
  $dia["alwaysConfirm"]     ="Conferma ogni azione";
  $dia["effectAct"]         ="Attiva effetti grafici";
  $dia["completePath"]      ="Visualizza percorsi completi";
  $dia["openLinkinNewWin"]  ="Apri collegamento in una nuova finestra";  
  $dia["frameTitle"]        ="Titolo finestra";
  $dia["viewClock"]         ="Visualizza orologio";
  $dia["diapoSpeed"]        ="Velocita' diaporama";
  $dia["diapoStop"]         ="Ferma diaporama";
  $dia["arboLink"]          ="Visualizza collegamenti in struttura cartella";
  $dia["activeMini"]        ="Attiva miniature ";
  $dia["dynWindow"]         ="Finestre dinamiche";
  $dia["serverBase"]        ="mySQL server";
  $dia["loginBase"]         ="mySQL login ";
  $dia["passBase"]          ="mySQL password";
  $dia["tableBase"]         ="Scegli tabella principale";
  $dia["myPref"]            ="My preferences";
  $dia["privateWS"]         ="Private share";
  $dia["publicWS"]          ="Public share";
  $dia["accountUser"]       ="Users can create their own account";
  
  // Panneau Infos
  $dia["adminRub5"]         ="Informazioni";
  $dia["infoAdmin"]         ="Riepilogo delle informazioni d'installazione ";
  $dia["theExt"]            ="L'estensione";
  $dia["activated"]         =" e' attivata.";
  $dia["notActivated"]      =" non e' attivata.";
  $dia["libZip"]            ="(Gestione archivi Zip)";
  $dia["libGD"]             ="(Gestione immagini e miniature)";
  $dia["libMB"]             ="(Gestione caratteri speciali)";
  $dia["libXslt"]           ="(Gestione Xslt complementari)";
  $dia["libFTP"]            ="(Gestione connessioni FTP)";
  $dia["libPdf"]            ="(Gestione miniature PDF)";
  $dia["libMail"]           ="(Invia elementi via email)";
  $dia["libExif"]           ="(Mostra informazioni Exif)";
  $dia["dontExist"]         ="non esiste.";
  $dia["notAccessible"]     ="non esiste o non e' accessibile.";
  $dia["accessProtect"]     ="esiste e non e' scrivibile.";
  $dia["isAccessible"]      ="esiste ed e' scrivibile.";
  $dia["modulesDetected"]   ="e' stato rilevato e contiene i seguenti moduli :";
  $dia["langDetected"]      ="e' stato rilevato e contiene le seguenti lingue :";
  $dia["styleDetected"]     ="e' stato rilevato e contiene i seguenti stili :";
  $dia["cgiUpNotDetected"]  ="non e' stato rilevato.";
  $dia["cgiUpLimited"]      ="e' stato rilevato ma non ha i privilegi necessari.";
  $dia["cgiUpDetected"]     ="e' stato rilevato e ha i privilegi necessari.";
  $dia["unlimitedUpload"]   ="Puoi effettuare upload di file senza alcun limite di dimensioni.";
  $dia["alertfunction1"]    ="La configurazione del server sembra imporre alcune limitazioni, ";
  $dia["alertfunction2"]    ="alcune caratteristiche di Webshare saranno probabilmente non disponibili.";
  $dia["alertfunction3"]    ="This feature is available only when Webshare is connected to a database.";
  $dia["msgVarNotModif1"]   ="Webshare non puo' modificare questi valori. In caso di problemi, ";
  $dia["msgVarNotModif2"]   ="modificare i parametri direttamente nel file 'php.ini'.";
  $dia["msgVarModifiable1"] ="Puoi modificare questi valori se trovi problemi ";
  $dia["msgVarModifiable2"] ="in Webshare. ";
  $dia["tip1"]              ="I valori indicati limitano realmente ogni script a ";
  $dia["tip2"]              ="secondi di vita e ad upload ";
  $dia["propProcess"]       ="Ownership of the Webshare (PHP) process ";
  $dia["limitProcess"]      ="This process has limited rights.";


  // Panneau Associations
  $dia["adminRub4"]         ="Associazioni";
  $dia["moduAdmin"]         ="Gestione moduli";
  $dia["assoAdmin"]         ="Gestione associazioni";
  $dia["extension"]         ="Estensione";
  $dia["exttype"]           ="Tipo";
  $dia["extmime"]           ="Mime";
  $dia["extact1"]           ="Azione di default";
  $dia["extact2"]           ="Azione secondaria";
  $dia["toAdd"]             ="Aggiungi";
  $dia["newStyle"]          ="Aggiungi un nuovo stile";
  $dia["newModule"]         ="Aggiungi un nuovo modulo";
  $dia["updateWS"]          ="Aggiorna";
  $dia["noVersionAv"]       ="Nessuna nuova versione disponobile";
  $dia["newVersionAv"]      ="E' disponibile una nuova versione";
  $dia["newVersion"]        ="per una nuova versione";  

  // Panneau Logs
  $dia["adminRub6"]         ="Log";
  $dia["logsAdmin"]         ="Visualizzatore log";
  $dia["notConnected"]      ="La connessione al database non e' riuscita, verificare i parametri.";
  $dia["connectedDB"]       ="La connessione al database e' riuscita.";
  $dia["msgBase"]           ="La configurazione del database non e' essenziali ma la registrazione degli eventi (log) non sara' attivata.";
  $dia["noLog"]             ="Log non disponibili";
  $dia["all"]               ="Tutto";
  $dia["allf"]              ="Tutto";
  $dia["resultInd"]         ="Neutrale";
  $dia["resultPos"]         ="Positivo";
  $dia["resultNeg"]         ="Negativo";
  $dia["noLogs"]            ="Nessuna azione per questa selezione";
  $dia["viewAction"]        ="Visualizza azioni :";
  $dia["madeBy"]            ="effettuato da";
  $dia["withResult"]        ="con risultato";
  $dia["fromDate"]          ="Periodo da";
  $dia["toDate"]            ="a";
  $dia["ofDate"]            ="Visualizza giorno";
  $dia["day"]               ="giorno";
  $dia["days"]              ="giorni";
  $dia["exploreShare"]      ="Esploro le condivisioni";  

  $dia["interrupted"]       ="La connessione al server sembra interrotta, riprovare piu' tardi.";

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
  $_SESSION["ws"]["dia"]["noConf"]  ="Nessun account server o <br/>utente e' stato rilevato. <br/><br/>Vai al <a href='admin/index.php' style='text-decoration:underline'>pannello amministratore</a><br/>per configurare i tuoi account. <br/><br/>Consulta la documentazione <br/>per ulteriori informazioni.<br/><br/>";
  $_SESSION["ws"]["dia"]["noServer"]="Nessuno account server e' stato rilevato. <br/><br/>Vai al <a href='admin/index.php' style='text-decoration:underline'>pannello amministrator</a><br/>per configurare i tuoi account. <br/><br/>Consulta la documentazione <br/>per ulteriori informazioni.<br/><br/><br/>";
  $_SESSION["ws"]["dia"]["noUser"]  ="No account user e' stato rilevato. <br/><br/>Vai al <a href='admin/index.php' style='text-decoration:underline'>pannello amministrator</a><br/>per configurare i tuoi account. <br/><br/>Consulta la documentazione <br/>per ulteriori informazioni.<br/><br/><br/>";
  $_SESSION["ws"]["dia"]["noJS"]    ="Non e' stato rilevato JavaScript<br/>sul tuo browser. <br/><br/>Attiva Javascript o scegli <br/>un browser piu' recente<br/>per utilizzare Webshare.<br/><br/>";
  $_SESSION["ws"]["dia"]["protect1"]="Per proteggere la tua installazione, devi definire una login e una password che saranno richieste al tuo prossimo accesso.<br/><br/>";
  $_SESSION["ws"]["dia"]["protect2"]="* I campi password devono coincidere per verificare la loro validita'. Inserisci solo caratteri alfanumerici nei campi .<br/>Per cambiare la tua login in seguito, edita il file .htpasswd posizionato nella cartella 'wspasswd'.";

  }
?>
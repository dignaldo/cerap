<?php
/************************************************************************/
/*                                WEBSHARE                              */
/************************************************************************/
//
// Copyright (c) 2009 by Virginie Vivancos
// http://www.webshare.fr
//
// Dieses Programm ist freie Software. Du kannst es 
// unter den Bedingungen der GNU General Public License
// weitergeben und / oder modifizieren,
// wie von der Free Software Foundation veröffentlicht (unter der Version 2 der Lizens)
//
//
// =======================================================================
// Merkmal  : Deutsche Sprachdatei
// Name     : Deutsch.lang.php
// Autor    : matti.riemer (matti at sh-cons dot de)
// Version  : 0.8.2
// Datum    : 14/05/08
// =======================================================================

  if (isset($_REQUEST["name"])&&(intval($_REQUEST["name"])==1))
    $nameLanguage      ="German - Deutsch"; else {
  
  $listeMois= array("","jan.","feb.","märz","april","mai","juni","juli","aug.","sep.","oct.","nov.","dez.");
  $listeJour= array("","Mon"=>"montag","Tue"=>"dienstag","Wed"=>"mittwoch","Thu"=>"donnerstag","Fri"=>"freitag","Sat"=>"sonnaben","Sun"=>"sonntag");

  $dia= array();

  // Login
  $dia["ident"]             ="Bitte logindaten eingeben :";
  $dia["cantIdent"]         ="Falsche logindaten eingegeben";
  $dia["identProblem1"]     ="Server nicht erreichbar.";
  $dia["identProblem2"]     ="Technische probleme.";
  $dia["identProblem3"]     ="Connection to LDAP server could not be established.";
  $dia["enter"]             ="Enter";

  // Interface
  $dia["loading"]           ="Laden";
  $dia["actualDir"]         ="Aktuelles verzeichnis:";
  $dia["connected"]         ="Verbunden als";
  $dia["directLink"]        ="Direkter link";
  $dia["filePreview"]       ="Datei-&nbsp;vorschau";
  $dia["pictPreview"]       ="Bild-&nbsp;vorschau";
  $dia["webPreview"]        ="Webseite";
  $dia["niveauSup"]         ="Ebene hoch";
  $dia["closePanel"]        ="Schliesse Panel";
  $dia["picTooBig"]         ="Bild ist zu gross für Vorschau.";
  $dia["previousPage"]      ="Zurück";
  $dia["nextPage"]          ="Next page";
  $dia["upDir"]             ="Ebene nach oben";
  $dia["updateDir"]         ="Aktualisiere verzeichnis";
  $dia["changeStyle"]       ="Style";
  $dia["refreshTree"]       ="Aktualisiere Verzeichnisbaum";
  $dia["hideTree"]          ="Verstecke Verzeichnisbaum";
  $dia["showTree"]          ="Zeige Verzeichnisbaum";
  $dia["printGallery"]      ="Drucke Gallery";
  $dia["renameAll"]         ="Alles umbenennen";
  $dia["saveAll"]           ="Alles speichern";
  $dia["savePic"]           ="Speichern";
  $dia["webSite"]           ="Webseite";
  $dia["affichage"]         ="Ansicht";
  $dia["expPanel"]          ="Verzeichnisliste";
  $dia["background"]        ="Hintergrund";
  $dia["miniature"]         ="Miniaturansicht";
  $dia["bigIcone"]          ="Symbole";
  $dia["liste"]             ="Liste";
  $dia["details"]           ="Details";
  $dia["none"]              ="Keine";
  $dia["arbo"]              ="Baum";
  $dia["closeWindow"]       ="Schliessen";
  $dia["viewContent"]       ="Inhalt ansehen";
  $dia["changeUser"]        ="Change user";
  $dia["onlineHelp"]        ="Online-Hilfe";
  $dia["rapport"]           ="Fehler melden";
  $dia["options"]           ="Optionen";
  $dia["contact"]           ="Kontakt";
  $dia["about"]             ="über ";
  $dia["total"]             ="Gesamt";
  $dia["used"]              ="Used";
  $dia["free"]              ="Frei";
  $dia["octet"]             ="b";
  $dia["selectAll"]         ="Alles auswählen";
  $dia["select"]            ="auswählen";
  $dia["unselect"]          ="Auswahl rückgängig";
  $dia["expression"]        ="expression";
  $dia["inAllFiles"]        ="in each filenames";
  $dia["distribGPL"]        ="Distributed under GPL license";
  $dia["moreInfos"]         ="For any information or support, visit the official website.";
  $dia["websiteAdr"]        ="en.webshare.fr";
  
  // Aktionen
  $dia["openFile"]          ="öffnen";
  $dia["openFileWith"]      ="öffnen mit";
  $dia["saveFile"]          ="datei Speichern";
  $dia["toExplore"]         ="Explore";
  $dia["toBrowse"]          ="Durchsuchen";
  $dia["toVisit"]           ="besuchen";
  $dia["toView"]            ="ansehen";
  $dia["toWatch"]           ="Film abspielen";
  $dia["toListen"]          ="anhören";
  $dia["toPrint"]           ="drucken";
  $dia["toUpload"]          ="hochladen";
  $dia["toCut"]             ="ausschneiden";
  $dia["toCopy"]            ="kopieren";
  $dia["toPaste"]           ="einfügen";
  $dia["toMove"]            ="verschieben";
  $dia["toDelete"]          ="löschen";
  $dia["toChmod"]           ="Eigenschaften ändern";
  $dia["toSearch"]          ="suchen";
  $dia["toRename"]          ="umbenennen";
  $dia["toComment"]         ="Kommentar hinzufügen ";
  $dia["toValid"]           ="speichern";
  $dia["toEdit"]            ="bearbeiten";
  $dia["toModify"]          ="ändern";
  $dia["toZip"]             ="zippe";
  $dia["toDezip"]           ="entzippe Archiv";
  $dia["toRecover"]         ="rückgängig";
  $dia["toConnect"]         ="verbinden";
  $dia["toQuit"]            ="ausloggen";
  $dia["toVerify"]          ="Verify";
  $dia["toReplace"]         ="Replace";
  $dia["choose"]            ="Choose...";

  // Chargement de fichier
  $dia["addUpload"]         ="Datei hinzufügen";
  $dia["startUpload"]       ="Upload starten";
  $dia["limitTaille"]       ="Die maximale Upload-Dateigrösse, die vom server erlaubt ist beträgt ";
  $dia["ifFileExist"]       ="Bei bereits vorhandener Datei :";
  $dia["replaceFile"]       ="ersetzen";
  $dia["renameFile"]        ="umbenennen";
  $dia["cancelFile"]        ="abbrechen";
  $dia["waitingDownload"]   ="auf Upload warten";
  $dia["problemDownload"]   ="Problem bei Datei-Upload";
  $dia["prohibited"]        ="Du hast nicht die Berechtigung diese Datei zu ändern.";
  $dia["downloading"]       ="Download läuft";
  $dia["uploading"]         ="Upload läuft";
  $dia["started"]           ="gestartet";
  $dia["success"]           ="erfolgreich hochgeladen";
  $dia["tempNotSet"]        ="kein temporärer Ordner definiert";
  $dia["withSuccess"]       ="erfolgreich";
  $dia["uploaded"]          ="hochgeladen.";
  $dia["succesUpload"]      ="erfolgreich hochgeladen";
  $dia["cantOpen"]          ="Datei kann nicht geöffnet werden ";
  $dia["cantWrite"]         ="Die Datei kann nicht geschrieben werden ";
  $dia["fileTooBig"]        ="Dateigrösse übersteigt das Limit.";
  $dia["wait"]              ="warten";

  // Erstellung neuer Elemente
  $dia["newFile"]           ="Datei";
  $dia["newDir"]            ="Verzeichnis";
  $dia["newTxt"]            ="Text";
  $dia["newLink"]           ="Link";
  $dia["making"]            ="Erstellen";
  $dia["areYouSure"]        ="Sicher, dass du ";
  $dia["toDisconnect"]      ="disconnect ?";
  $dia["addTxt"]            ="Bitte gib einen Namen für das leere Eextdokument ein :";
  $dia["addDir"]            ="Bitte gib einen Namen für das neue Verzeichnis ein :";
  $dia["addNew"]            ="Neu";
  $dia["addLink"]           ="Namen eingeben ";
  $dia["addLink2"]          ="und die adresse des neuen links eingeben :";
  $dia["dirCreate"]         ="Neues Verzeichnis erstellen";
  $dia["txtCreate"]         ="Leeres Textdokuments erstellen";
  $dia["linkCreate"]        ="Neuen Link erstellen";
  $dia["linkTo"]            ="Link führt zu";
  $dia["created"]           ="erstellt";
  $dia["theNewDir"]         ="Das neue Verzeichnis";
  $dia["theNewLink"]        ="Der neue Link";
  $dia["theNewTxt"]         ="Das leere Textdokument";

  // Response
  $dia["File"]              ="Datei";
  $dia["rep"]               ="Verzeichnis";
  $dia["dir"]               =" Verzeichnis";
  $dia["file"]              =" Datei";
  $dia["ofDir"]             =" zum Verzeichnis ";
  $dia["ofFile"]            =" zur Datei ";
  $dia["onFile"]            =" auf Datei ";
  $dia["toDir"]             =" to folder ";  
  $dia["toFile"]            =" to file ";    
  $dia["theDir"]            ="Das Verzeichnis ";
  $dia["theFile"]           ="Die Datei ";
  $dia["element"]           ="Element";
  $dia["hasBeen"]           ="wurde ";
  $dia["hasNotBeen"]        ="wurde nicht ";
  $dia["hasFailed"]         ="ist fehlgeschlagen";
  $dia["successful"]        ="wurde erfolgreich ausgeführt";
  $dia["dezipping"]         ="Nicht komprimiertes Archiv.";
  $dia["dezipped"]          ="entpackt";
  $dia["startEdit"]         ="Bearbeiten";
  $dia["endEdit"]           ="Beende Datei-Bearbeitung ";
  $dia["confirmEdit"]       ="wurde geändert und gespeichert.";
  $dia["savingDocument"]    ="speicher Dokument";
  $dia["savingDirContent"]  ="speicher Inhalt des Verzeichnisses ";
  $dia["savingFile"]        ="speicher Datei ";
  $dia["backgAdded"]        ="Bild wure dem Hintergrund hinzugefügt.";
  $dia["backgRemoved"]      ="Hintergrund gelöscht.";


  // umbenennen / ändern / entfernen
  $dia["rename"]            ="Neuen namen eingeben ";
  $dia["renaming"]          ="Umbenennen";
  $dia["renamed"]           ="umbenannt";
  $dia["confirmSup"]        ="Dateierweiterung wirklich entfernen ?";
  $dia["delete"]            ="Möchtest du wirklich löschen ";
  $dia["delete2"]           ="und dessen inhalt ?";
  $dia["deleting"]          ="Löchen";
  $dia["deleted"]           ="gelöscht";
  $dia["theRemove"]         ="der Löschvorgang";
  $dia["copyOf"]            ="kopie von ";
  $dia["onlyCopy"]          ="aber es wurde kopiert.";
  $dia["fileExist"]         ="Eine Datei mit diesem Namen existiert bereits.";
  $dia["goingToCopy"]       ="wird kopiert, bitte ziel wählen.";
  $dia["goingToMove"]       ="wird verschoben, bitte ziel wählen.";
  $dia["moving"]            ="Verschieben ";
  $dia["moved"]             ="verschoben";
  $dia["fileEditing"]       ="Bearbeiten ";
  $dia["copying"]           ="Kopieren ";
  $dia["copyingFile"]       ="kopierte Datei hochgeladen";
  $dia["copied"]            ="kopiert";
  $dia["toActualDir"]       ="ins aktuelle Verzeichnis";
  $dia["typeOfElement"]     ="Dokument ";
  $dia["copyTo"]            ="kopiere";
  $dia["moveTo"]            ="verschiebe";
  $dia["prohibCar"]         ="Unzulässige Zeichen eingegeben und gefiltert ( ? < > : # % + '' ' | & * / )";
  $dia["alreadyExist"]      ="Datei oder Verzeichnis existiert bereits. Bitte gib einen anderen Namen ein.";
  $dia["confirmReplace"]    ="Datei oder Verzeichnis existiert bereits. Bei zustimmung wird sie ersetzt.";
  $dia["modeDefault"]       ="Default mode";
  $dia["modePreview"]       ="Preview mode";
  $dia["lineNumbers"]       ="View line numbers";
  $dia["colorMode"]         ="Syntax highlighting";
  $dia["includeSubDir"]     ="Include subdirectories ?";
  $dia["modifyingPrefs"]    ="Modifying settings";
  
  // Rechtemanagement
  $dia["modifyPermission"]  ="Eigenschaft ändern";
  $dia["noPermission"]      ="Du hast keine Rechte für diese Datei.";
  $dia["noOperation"]       ="Diese Operation ist nicht erlaubt.";
  $dia["modifying"]         ="Attribute geändert ";
  $dia["fileAttributes"]    ="Dateieigenschaften";
  $dia["cantModify"]        ="Kann nicht geändert werden.";
  $dia["modified"]          ="Geändert ";
  $dia["modify"]            ="wurde geändert.";
  $dia["readWrite"]         ="lesen/schreiben";
  $dia["readOnly"]          ="Nur lesen";
  $dia["writeOnly"]         ="Nur schreiben";
  $dia["locked"]            ="Datei gesperrt";
  $dia["selectAttributes"]  ="Eigenschaften ";
  $dia["modR"]              ="Lesen";
  $dia["modW"]              ="Schreiben";
  $dia["modE"]              ="Ausführen";

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

  // Suche
  $dia["property"]          ="Eigenschaften";
  $dia["propertyOf"]        ="Eigenschaft von";
  $dia["searchIn"]          ="Suche in ";
  $dia["search"]            ="Namen eingeben ";
  $dia["search2"]           ="von Datei oder Verzeichnis ?";
  $dia["useCasse"]          ="Case sensitive ?";
  $dia["searching"]         ="Suche von";
  $dia["searching2"]        ="in Arbeit";
  $dia["foundIn"]           ="in";
  $dia["into"]              ="in";
  $dia["and"]               ="und";
  $dia["by"]                ="by";
  $dia["viewed"]            ="Viewed";
  $dia["times"]             ="times";
  $dia["elementsFound"]     =" Dateien gefunden.";
  $dia["noResult"]          ="Keine Datei gefunden.";

  // Anordnung
  $dia["sortFile"]          ="Anordnen nach";
  $dia["byName"]            ="Name";
  $dia["byValue"]           ="Wert";
  $dia["byType"]            ="Typ";
  $dia["bySize"]            ="Grösse";
  $dia["byDate"]            ="Datum";
  $dia["byPerso"]           ="Person";
  $dia["webSort"]           ="Standard-Anordnung";
  $dia["ascending"]         ="Ascending";
  $dia["descending"]        ="Descending";
  
  // Kommentare
  $dia["comment"]           ="Kommentar";
  $dia["commentAdded"]      ="Kommentar hinzugefügt.";
  $dia["commentsAdded"]     =" kommentare hinzugefügt ";
  $dia["commentNotAdded"]   ="Kommentar nicht hinzugefügt.";
  $dia["addComment"]        ="Kommentar hinzufügen ";
  $dia["modifyComment"]     ="Kommentar hinzufügen ";
  $dia["removeComment"]     ="Remove comment";
  $dia["addingComment"]     ="Hinzufügen eines Kommentars ";
  $dia["commentFile"]       ="Kommentar zu einer Datei ";
  $dia["messageOf"]         ="Nachricht über ";

  // Menü Bilder
  $dia["previous"]          ="Vorheriges bild";
  $dia["next"]              ="Nächstes Bild";
  $dia["zoomp"]             ="Zoom +";
  $dia["zoomm"]             ="Zoom -";
  $dia["zooms"]             ="Originalgrösse";
  $dia["diaporama"]         ="Diashow";
  $dia["refreshMini"]       ="Aktualisiere Miniaturbilder";
  $dia["rotate90"]          ="Rotate 90° right";
  $dia["rotate180"]         ="Drehen 180°";
  $dia["rotate270"]         ="Drehen 90° links";
  $dia["flipV"]             ="Vertikal drehen";
  $dia["flipH"]             ="Horizontal drehen";
  $dia["resize"]            ="Grösse anpassen ";
  $dia["keepRatio"]         ="Seitenverhältnis beibehalten ?";
  $dia["width"]             ="Breite";
  $dia["height"]            ="Höhe";
  $dia["pixels"]            ="Pixel";

  // Bilder
  $dia["cliche"]            ="Bild";
  $dia["object"]            ="Datei";
  $dia["infocomment"]       ="Kommentar";
  $dia["FileSize"]          ="Dateigrösse";
  $dia["DateTimeOriginal"]  ="Originaldatum und -zeit";
  $dia["resolution"]        ="Auflösung";
  $dia["XResolution"]       ="DPI";
  $dia["Software"]          ="Software";
  $dia["Photographer"]      ="Fotograf";
  $dia["ExposureTime"]      ="Ursprungszeit";
  $dia["ApertureFNumber"]   ="Blende f Nummer";
  $dia["MaxApertureValue"]  ="Maximaler Blendwert";
  $dia["ISOSpeedRatings"]   ="ISO Geschwindigkeitsraten";
  $dia["FocalLength"]       ="Brennweite";
  $dia["ExposureBiasValue"] ="Wert der Belichtungsausrichtung";
  $dia["LightSource"]       ="Lichtquelle";
  $dia["Flash"]             ="Blitz";

  // Mail
  $dia["authSendMail"]      ="Erlaube das Senden der Dateien per E-Mail";
  $dia["sendMail"]          ="per E-Mail senden";
  $dia["titleMail"]         ="Nachrichten-Titel";
  $dia["recipientMail"]     ="E-Mail-Adresse des Empfängers angeben";
  $dia["contentMail"]       ="Gib die Nachricht ein";
  $dia["sendMailConfirm"]   ="Nachricht senden";
  $dia["sendMailOK"]        ="Die Nachricht wurde gesendet.";
  $dia["sendMailProblem"]   ="Die Nachricht konnte nicht gesendet werden.";

  // Mülleimer
  $dia["corbeille"]         ="Müll";
  $dia["binNoElement"]      ="Der Mülleimer ist leer.";
  $dia["binContain"]        ="Der Mülleimer enthält";
  $dia["emptyBin"]          ="Müll leeren";
  $dia["emptyBinConfirm"]   ="Möchtest du den Müll wirklich leeren?";
  $dia["emptyConfirm"]      ="Bist du sicher, dass du die Datei entgültig löschen möchtest?";
  $dia["emptyBinResult"]    ="Der Mülleimer wurde geleert.";
  $dia["viewElements"]      ="Alle Dateien ansehen";
  $dia["emptyElements"]     ="Lösche alle Dateien, die Mehr als ";
  $dia["activeBin"]         ="Aktiviere den Mülleimer für diesen freigegebenen Ordner ";
  $dia["restoreElement"]    ="Restore element";
  $dia["finally"]           =" finally";

  // Lesezeichen
  $dia["favoris"]           ="Lesezeichen";
  $dia["addFav"]            ="Lesezeichen hinzufügen";
  $dia["removeFav"]         ="Lesezeichen löschen";
  $dia["handleFav"]         ="Lesezeichen verwalten";
  $dia["viewFav"]           ="Alle Lesezeichen anzeigen";
  $dia["favAdded"]          ="The file has been added to bookmarks";
  $dia["favRemoved"]        ="The file has been removed from bookmarks";

  // Tests des partages
  $dia["shareTest"]         ="Klicke um die Einstellungen zu testen.";
  $dia["shareOK"]           ="Dieser freigegebene Ordner ist zugänglich und verfügt über ausreichende Rechte.";
  $dia["shareProtected"]    ="Dieser freigegebene Ordner ist zugänglich aber verfügt nicht über ausreichende Rechte.";
  $dia["shareNotAcc"]       ="Das Stammverzeichnis existiert nicht oder es kann nicht darauf zugegriffen werden.";
  $dia["shareFtpNotAcc"]    ="Verbindung zum FTP-Server nicht möglich.";
  $dia["shareFtpBadLogin"]  ="Der FTP-Server hat einen Fehler beim Login zurückgegeben. Bitte überprüfe den Benutzernamen und das Passwort.";
  $dia["shareFtpError"]     ="Der FTP-Server gibt einen unbekannten Fehler zurück.";
  $dia["shareFtpcantMount"] ="Mount-Punkt auf dem FTP-Server nicht erreichbar.";
  $dia["shareFtpProtected"] ="Mount-Punkt auf dem FTP-Server verfügt nicht über ausreichende Rechte.";
  $dia["shareFtpOK"]        ="Verbindung zum FTP-Server und Test des freigegebenen Ordners waren erfolgreich.";
  $dia["shareAvailable"]    ="New users can access this shared folder.";

  // Administration
  $dia["adminTitle"]        ="Benutzer- und Servermanagement";
  $dia["adminHeader"]       ="Administration";
  $dia["msgFooter"]         ="WebShare steht unter der lizenz GPL";
  $dia["adminAlert1"]       ="Es trat ein technisches Problem auf. Änderungen wurden nicht gespeichert.";
  $dia["adminAlert2"]       ="Es wurden Änderungen gemacht.";
  $dia["notActiv"]          ="Diese Option ist zur zeit nicht aktiv.";
  $dia["confirmation"]      ="Bestätigung";
  $dia["dialConfirm"]       ="Bestätigung ?";
  $dia["adminProtected"]    ="Protected administration panel";
  $dia["adminNotProtected"] ="Administration panel is not protected !";
  $dia["importToBase"]      ="Import configuration file into database";
  $dia["importSuccessful"]  ="Import to database successful.";
  $dia["importFailed"]      ="Import to database failed.";

  // Panneau Partages
  $dia["adminRub2"]         ="Server";
  $dia["serverAdmin"]       ="Server- und Verzeichnismanagement";
  $dia["newServer"]         ="Neuer Server";
  $dia["msgInfo1"]          ="Achtung : FTP-verbindungen sind zur zeit nicht aktiviert.";
  $dia["msgInfo2"]          ="Warnung : Pfad- und Dateinamen dürfen nur Zeichen des Alphabets (lowercase oder uppercase) und Zahlen beinhalten.";
  $dia["msgInfo3"]          ="Punkte, Akzente und Leerzeichen sind nicht erlaubt.";
  $dia["msgInfo4"]          ="Warning : The administration folder MUST be renamed to protect your installation.";
  $dia["chooseUser"]        ="Wähle zu löschenden Benutzer";
  $dia["createUser"]        ="Erstelle oder ändere einen Benutzer und dann speichere.";
  $dia["chooseServer"]      ="Wähle zu löschenden Server";
  $dia["createServer"]      ="Erstelle oder ändere einen Server und speichere anschliessend";
  $dia["selectServer"]      ="Select at least a server then validate";
  $dia["FTP"]               ="FTP";
  $dia["local"]             ="Lokal";
  $dia["serverFtp"]         ="Server (ftp)";
  $dia["loginFtp"]          ="Login (ftp)";
  $dia["passFtp"]           ="Passwort (ftp)";
  $dia["portFtp"]           ="Port (ftp)";
  $dia["shareRoot"]         ="Root";
  $dia["serverRoot"]        ="Server-Root";
  $dia["virtualRoot"]       ="Virtueller Root";
  $dia["defaultRoot"]       ="Standardverzeichnis";
  $dia["protectRep"]        ="Schütze neues verzeichnis mit Datei :";
  $dia["modeDegrade"]       ="Modus vermindern";
  $dia["protectShare"]      ="Modifications are allowed on this shared folder";  
  $dia["serverType"]        ="Typ";
  
  // Panneau Utilisateur
  $dia["adminRub1"]         ="Benutzer";
  $dia["userAdmin"]         ="Benutzermanagement";
  $dia["newUser"]           ="Neuer Benutzer";
  $dia["administrator"]     ="Administrator";
  $dia["email"]             ="Email";
  $dia["lang"]              ="Sprache";
  $dia["user"]              ="Benutzer";
  $dia["group"]             ="Gruppe";
  $dia["name"]              ="Name";
  $dia["login"]             ="Login";
  $dia["passwd"]            ="Passwort";
  $dia["confirmation"]      ="Bestätigung";
  $dia["connexion"]         ="Verbindung";
  $dia["default"]           ="Durchsuchen";
  $dia["explore"]           ="Explorer";
  $dia["visualis"]          ="Style";
  $dia["leftPanel"]         ="Standardfenster";
  $dia["webSort"]           ="Standardsortierung";
  $dia["webDir"]            ="Web-Verzeichnis-Vorschau";
  $dia["nameShare"]         ="Freigaben ";
  $dia["access"]            ="Zugriff freigeben ";
  $dia["select"]            ="Auswählen";
  $dia["open"]              ="öffnen";
  $dia["menuContext"]       ="Kontextmenü";
  $dia["leftClic"]          ="Linksklick :";
  $dia["rightClic"]         ="Rechtsklick :";
  $dia["doubleClic"]        ="Doppelklick :";
  $dia["toModify"]          ="ändern";
  $dia["toCreate"]          ="erstellen";
  $dia["toRead"]            ="lesen";
  $dia["regexp"]            ="(RegExp > füge neuen Ausdruck getrennt durch '|', ')' oder ':' hinzu";
  $dia["filterElement"]     ="Filterelemente mit";
  $dia["recoExtension"]     ="Folgende Erweiterungen wurden gespeichert";
  $dia["sessionTime"]       ="Session-Dauer (min)";
  $dia["serverBase"]        ="MySQL server";
  $dia["actionAuth"]        ="Benutzer ist nicht dazu Authorisiert die folgenden Aktionen nicht gesperrter Elemente zu machen :";
  $dia["userType"]          ="Typ";
  $dia["createNewAccount"]  ="Create a new user account";
  $dia["chooseAccount"]     ="Choose the user account to open :";

  // Panneau Preferences
  $dia["adminRub3"]         ="Einstellungen";
  $dia["baseAdmin"]         ="Datenbankmanagement";
  $dia["prefAdmin"]         ="Einstellungen Management";
  $dia["memoMax"]           ="Erlaubter Speicher für scripte ";
  $dia["execMax"]           ="Lebensdauer für scripte ";
  $dia["postMax"]           ="Grössenlimit für Datenpost";
  $dia["uploMax"]           ="Grössenlimit für Uploads";
  $dia["lifeMax"]           ="Lebensdauer";
  $dia["timeMax"]           ="Lebensdauer für Uploads ";
  $dia["previewWeb"]        ="aktiviere Webseitenvorschau ";
  $dia["previewAct"]        ="aktiviere Vorschaubilder ";
  $dia["previewPDF"]        ="aktiviere PDF-Dateivorschau";
  $dia["logAct"]            ="aktiviere logs";
  $dia["sepAdr"]            ="Trenne Adresse durch ";
  $dia["alwaysConfirm"]     ="Bestätigen jeder Aktion";
  $dia["effectAct"]         ="aktiviere grafische Effekte";
  $dia["completePath"]      ="zeige vollständigen Pfad";
  $dia["frameTitle"]        ="Fenstertitel";
  $dia["viewClock"]         ="zeige Uhr";
  $dia["diapoSpeed"]        ="Diashow-Geschwindigkeit";
  $dia["diapoStop"]         ="zeige Diashow";
  $dia["arboLink"]          ="zeige Links im Verzeichnisbaum";
  $dia["activeMini"]        ="aktiviere Vorschaubilder ";
  $dia["dynWindow"]         ="Dynamische Fenster";
  $dia["serverBase"]        ="MySQL Server";
  $dia["loginBase"]         ="MySQL Login ";
  $dia["passBase"]          ="MySQL Passwort";
  $dia["tableBase"]         ="MySQL Base";
  $dia["defStyle"]          ="Standard-Style";
  $dia["myPref"]            ="My preferences";
  $dia["privateWS"]         ="Private share";
  $dia["publicWS"]          ="Public share";
  $dia["accountUser"]       ="Users can create their own account";
  
  // Panneau Infos
  $dia["adminRub5"]         ="Informationen";
  $dia["infoAdmin"]         ="Zusammenfassung der Installationsinformationen ";
  $dia["theExt"]            ="Die Erweiterung";
  $dia["activated"]         =" ist aktiviert.";
  $dia["notActivated"]      =" ist nicht aktiviert.";
  $dia["libZip"]            ="(Zip-Archiv-Management)";
  $dia["libGD"]             ="(Bilder- und Vorschau-Management)";
  $dia["libMB"]             ="(Spezielle-Zeichen-Management)";
  $dia["libXslt"]           ="(Xslt-Management)";
  $dia["libFTP"]            ="(Entfernte FTP-Verbindungen)";
  $dia["libPdf"]            ="(PDF-Vorschau-Management)";
  $dia["libMail"]           ="(Sende Dateien per E-Mail)";
  $dia["libExif"]           ="(Anzeige der Bildinformationen)";
  $dia["dontExist"]         ="existiert nicht.";
  $dia["notAccessible"]     ="existiert nicht oder ist nicht zugänglich.";
  $dia["accessProtect"]     ="existiert, aber ist nicht beschreibbar.";
  $dia["isAccessible"]      ="existiert und ist beschreibbar.";
  $dia["modulesDetected"]   ="wurde gefunden und enthält folgende Module :";
  $dia["langDetected"]      ="wurde gefunden und enthält folgende Sprachen :";
  $dia["styleDetected"]     ="wurde gefunden und enthält folgende Styles :";
  $dia["cgiUpNotDetected"]  ="wurde nicht gefunden.";
  $dia["cgiUpLimited"]      ="wurde gefunden, aber hat nicht ausreichend Rechte.";
  $dia["cgiUpDetected"]     ="wurde gefunden und hat ausreichend Rechte.";
  $dia["unlimitedUpload"]   ="Du kannst die Datei ohne grössenlimit hochladen.";
  $dia["alertfunction1"]    ="Server-Konfiguration scheint einige Einschränkungen zu haben,";
  $dia["alertfunction2"]    ="einige Funktionen von Webshare werden wahrscheinlich eingeschränkt sein.";
  $dia["alertfunction3"]    ="This feature is available only when Webshare is connected to a database.";
  $dia["msgVarNotModif1"]   ="Webshare kann diese Werte nicht ändern. Im Falle eines Problems ";
  $dia["msgVarNotModif2"]   ="ändere die Parameter direkt in der Datei 'php.ini'.";
  $dia["msgVarModifiable1"] ="Bei Problemen kannst du diese Werte ändern ";
  $dia["msgVarModifiable2"] ="in Webshare. ";
  $dia["tip1"]              ="Die angegebenen Werte begrenzen zur Zeit jedes script auf ";
  $dia["tip2"]              =" Sekunden zum Leben und hochladen nach ";
  $dia["propProcess"]       ="Ownership of the Webshare (PHP) process ";
  $dia["limitProcess"]      ="This process has limited rights.";


  // Panneau Associations
  $dia["adminRub4"]         ="Erweiterungen";
  $dia["moduAdmin"]         ="Modul-Management";
  $dia["assoAdmin"]         ="Erweiterungs-Management";
  $dia["extension"]         ="Erweiterung";
  $dia["exttype"]           ="Typ";
  $dia["extmime"]           ="Bild-Pfad";
  $dia["extact1"]           ="Standard-Aktion";
  $dia["extact2"]           ="sekundäre Aktion";
  $dia["toAdd"]             ="Hinzufügen";
  $dia["newStyle"]          ="neuen Style hinzufügen";
  $dia["newModule"]         ="neues Modul hinzufügen";
  $dia["updateWS"]          ="aktualisiere Programm";
  $dia["noVersionAv"]       ="keine neue Version verfügbar";
  $dia["newVersionAv"]      ="es ist eine neue Version verfügbar";

  // Panneau Logs
  $dia["adminRub6"]         ="Logs";
  $dia["logsAdmin"]         ="Log-Anzeige";
  $dia["notConnected"]      ="Verbindung zur Datenbank fehlgeschlagen. bitte Angaben überprüfen.";
  $dia["connectedDB"]       ="Verbindung zur Datenbank Optional.";
  $dia["msgBase"]           ="Konfiguration der Datenbank ist nicht unbedingt erforderlich, aber die Weiterverfolgungsfunktion der Events (log) wird nicht aktiviert sein.";
  $dia["noLog"]             ="keine Logs verfügbar";
  $dia["all"]               ="Alle";
  $dia["allf"]              ="Alle";
  $dia["resultInd"]         ="Neutral";
  $dia["resultPos"]         ="Positiv";
  $dia["resultNeg"]         ="Negativ";
  $dia["noLogs"]            ="keine Aktion für diese Auswahl";
  $dia["viewAction"]        ="zeige Aktionen :";
  $dia["madeBy"]            ="erstellt von";
  $dia["withResult"]        ="mit Ergebnis";
  $dia["fromDate"]          ="Zeitraum vom";
  $dia["toDate"]            ="bis";
  $dia["ofDate"]            ="zeige Tag";
  $dia["day"]               ="Tag";
  $dia["days"]              ="Tage";
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
  $_SESSION["ws"]["dia"]["noConf"]  ="Kein Account für server <br/> oder Benutzer vorhanden. <br/><br/>Gehe zum <a href='admin/index.php' style='text-decoration:underline'>Administrationsbereich</a><br/>um Accounts zu konfigurieren. <br/><br/>Sieh in die Dokumentation <br/>für mehr Informationen.<br/><br/>";
  $_SESSION["ws"]["dia"]["noServer"]="Es wurde Kein Server-Account gefunden. <br/><br/>Gehe zum <a href='admin/index.php' style='text-decoration:underline'>Administrationsbereich</a><br/>um Accounts zu konfigurieren. <br/><br/>Sieh in die Dokumentation <br/>für mehr Informationen.<br/><br/><br/>";
  $_SESSION["ws"]["dia"]["noUser"]  ="Kein Benutzer-Account gefunden. <br/><br/>Gehe zum <a href='admin/index.php' style='text-decoration:underline'>Administrationsbereich</a><br/>um Accounts zu konfigurieren. <br/><br/>Sieh in die Dokumentation <br/>für mehr informationen.<br/><br/><br/>";
  $_SESSION["ws"]["dia"]["noJS"]    ="JavaScript wurde in deinem <br/>Web-Browser nicht entdeckt. <br/><br/>Aktiviere Javascript oder wähle <br/>einen neueren browser wie zum Beispiel Firefox oder Opera<br/>um Webshare zu benutzen.<br/><br/>";
  $_SESSION["ws"]["dia"]["protect1"]="Du benutzt den Administrationsbereich zum ersten Mal. Um die Einstellungen zu schützen solltest du einen Login und ein Passwort für den nächsten Zugriff auf den Administrationsbereich anlegen.<br/><br/>";
  $_SESSION["ws"]["dia"]["protect2"]="* Passwort-Felder müssen übereinstimmen um ihre Gültigkeit zu überprüfen.<br/>Bitte nur alphanumerische Zeichen in die Felder eingeben.<br/>Um die Logindaten später zu ändern editiere die Datei '.htaccess' Im Verzeichnis 'Administration'.<br/><br/>";

  }
?>

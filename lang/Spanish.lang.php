<?php
/************************************************************************/
/*                                CERAP                              */
/************************************************************************/
//
// Copyright (c) 2009 by Virginie Vivancos
// http://www.CERAP.fr
//
// This program is free software. You can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation; either version 2 of the License.
//
// =======================================================================
// Fonction : Fichier de traduction version espagnole
// Nom      : Spanish.lang.php
// Version  : 0.8.2
// Date     : 03/04/08
// Autor de la traducción: David Chova
// =======================================================================
// Text encoding: UTF-8/UNIX(LF)

  if (isset($_REQUEST["name"])&&(intval($_REQUEST["name"])==1))
    $nameLanguage      ="Spanish - Espa&ntilde;ol"; else {
  
  $listeMois= array("","Ene.","Feb.","Marzo","Abril","Mayo","Junio","Julio","Ago.","Sept","Oct.","Nov.","Dic.");
  $listeJour= array("","Mon"=>"Lunes","Tue"=>"Martes","Wed"=>"Miércoles","Thu"=>"Jueves","Fri"=>"Viernes","Sat"=>"Sábado","Sun"=>"Domingo");

  $dia= array();

  // Panneau de login
  $dia["ident"]             ="Usuario :";    
  $dia["cantIdent"]         ="Usuari erróneo.";                                           
  $dia["identProblem1"]     ="Servidor inaccesible.";
  $dia["identProblem2"]     ="Problema técnico."; 
  $dia["identProblem3"]     ="Connection to LDAP server could not be established.";
  $dia["enter"]             ="Entrar";

  // Interface
  $dia["loading"]           ="Cargando";
  $dia["actualDir"]         ="Carpeta actual : ";
  $dia["connected"]         ="Conectado como ";
  $dia["directLink"]        ="Enlace directo";
  $dia["filePreview"]       ="Visualización archivo";
  $dia["pictPreview"]       ="Visualización imagen";
  $dia["webPreview"]        ="Navegando ";
  $dia["niveauSup"]         ="Subir nivel";
  $dia["closePanel"]        ="Cerrar panel";
  $dia["picTooBig"]         ="No se puede visualizar, la imagen es demasiado grande.";
  $dia["previousPage"]      ="Página previa";
  $dia["nextPage"]          ="Next page";
  $dia["upDir"]             ="Nivel superior";
  $dia["updateDir"]         ="Actualizar carpeta";
  $dia["changeStyle"]       ="Seleccionar tema";
  $dia["refreshTree"]       ="Actualizar arbol";
  $dia["hideTree"]          ="Plegar arbol de carpetas";
  $dia["showTree"]          ="Desplegar arbol de carpetas";
  $dia["printGallery"]      ="Galería de impresión";
  $dia["renameAll"]         ="Renombrar todo";
  $dia["saveAll"]           ="Guardar todo";
  $dia["savePic"]           ="Todo";
  $dia["webSite"]           ="Mi web";
  $dia["affichage"]         ="Visualizar";
  $dia["expPanel"]          ="Panel arbol de carp.";
  $dia["background"]        ="Fondo";
  $dia["miniature"]         ="Miniaturas";
  $dia["bigIcone"]          ="Iconos grandes";
  $dia["liste"]             ="Lista";
  $dia["details"]           ="Detalles";
  $dia["none"]              ="Nada";
  $dia["arbo"]              ="Arbol de carpetas";
  $dia["closeWindow"]       ="Cerrar";
  $dia["viewContent"]       ="Visualizar contenido";
  $dia["changeUser"]        ="Change user";
  $dia["onlineHelp"]        ="Ayuda online";
  $dia["rapport"]           ="Informar error";
  $dia["options"]           ="Opciones";
  $dia["contact"]           ="Contacto";
  $dia["about"]             ="Acerca de ";
  $dia["total"]             ="Total";
  $dia["used"]              ="Used";
  $dia["free"]              ="Libre";
  $dia["octet"]             ="b";
  $dia["selectAll"]         ="Seleccionar todo";
  $dia["select"]            ="Seleccionar";
  $dia["unselect"]          ="Deseleccionar";
  $dia["expression"]        ="expression";
  $dia["inAllFiles"]        ="in each filenames";
  $dia["distribGPL"]        ="Distributed under GPL license";
  $dia["moreInfos"]         ="For any information or support, visit the official website.";
  $dia["websiteAdr"]        ="en.CERAP.fr";
  
  // Verbes / actions
  $dia["openFile"]          ="Abrir";
  $dia["openFileWith"]      ="Abrir con";
  $dia["saveFile"]          ="Guardar";
  $dia["toExplore"]         ="Explorar";
  $dia["toBrowse"]          ="Navegar";
  $dia["toVisit"]           ="Visitar";
  $dia["toView"]            ="Visualizar";
  $dia["toWatch"]           ="Hojear";
  $dia["toListen"]          ="Escuchar";
  $dia["toPrint"]           ="Imprimir";
  $dia["toUpload"]          ="Cargar";
  $dia["toCut"]             ="Cortar";
  $dia["toCopy"]            ="Copiar";
  $dia["toPaste"]           ="Pegar";
  $dia["toMove"]            ="Mover";
  $dia["toDelete"]          ="Eliminar";
  $dia["toChmod"]           ="Modificar atributos";
  $dia["toSearch"]          ="Buscar";
  $dia["toRename"]          ="Renombrar";
  $dia["toComment"]         ="Comentar";
  $dia["toValid"]           ="Validar";
  $dia["toEdit"]            ="Editar";
  $dia["toModify"]          ="Modificar";
  $dia["toZip"]             ="comprimir a Zip";
  $dia["toDezip"]           ="Descomprimir de zip";
  $dia["toRecover"]         ="Recuperar";
  $dia["toConnect"]         ="Conectar";
  $dia["toQuit"]            ="Salir";
  $dia["toVerify"]          ="Verify";
  $dia["toReplace"]         ="Replace";
  $dia["choose"]            ="Choose...";

  // Chargement de fichier
  $dia["addUpload"]         ="Añadir archivo";
  $dia["startUpload"]       ="Comenzar carga";
  $dia["limitTaille"]       ="La máxima carga permitida por este servidor es ";
  $dia["ifFileExist"]       ="Si el archivo ya existe :";
  $dia["replaceFile"]       ="Reemplazar";
  $dia["renameFile"]        ="Renombrar";
  $dia["cancelFile"]        ="Cancelar";
  $dia["waitingDownload"]   ="Esperando para carga";
  $dia["problemDownload"]   ="Problema durante la carga del archivo";
  $dia["prohibited"]        ="No tienes permiso para modificar este archivo.";
  $dia["downloading"]       ="Descarga en progreso";
  $dia["uploading"]         ="Carga en progreso";
  $dia["started"]           ="Empezado";
  $dia["success"]           ="Carga con éxito";
  $dia["tempNotSet"]        ="Carpeta temporal no definida";
  $dia["withSuccess"]       ="con éxito";
  $dia["uploaded"]          ="cargado.";
  $dia["succesUpload"]      ="cargado con éxito";
  $dia["cantOpen"]          ="No se puede abrir el archivo ";
  $dia["cantWrite"]         ="No se puede escribir en el archivo ";
  $dia["fileTooBig"]        ="El tamaño del archivo excede el límite permitido.";
  $dia["wait"]              ="Esperando";

  // Creation de nouveaux élements
  $dia["newFile"]           ="Nuevo archivo";
  $dia["newDir"]            ="Nueva carpeta";
  $dia["newTxt"]            ="Nuevo texto";
  $dia["newLink"]           ="Nuevo enlace";
  $dia["making"]            ="Creando";
  $dia["areYouSure"]        ="Estás seguro que quieres ";
  $dia["toDisconnect"]      ="disconnect ?";
  $dia["addTxt"]            ="Introduce el nombre del nuevo documento de texto en blanco :";
  $dia["addDir"]            ="Introduce el nombre de la nueva carpeta :";
  $dia["addNew"]            ="Añadir nuevo";
  $dia["addLink"]           ="Introduce el nombre ";
  $dia["addLink2"]          ="y la dirección del nuevo enlace :";
  $dia["dirCreate"]         ="Creación de carpeta";
  $dia["txtCreate"]         ="Creación de documento de texto vacio";
  $dia["linkCreate"]        ="Creación de enlace";
  $dia["linkTo"]            ="Enlace a";
  $dia["created"]           ="creado";
  $dia["theNewDir"]         ="La nueva carpeta";
  $dia["theNewLink"]        ="El nuevo enlace";
  $dia["theNewTxt"]         ="El nuevo documento de texto vacio";

  // Réponses
  $dia["File"]              ="Archivo";
  $dia["rep"]               ="carpeta";
  $dia["dir"]               =" carpeta";
  $dia["file"]              =" archivo";
  $dia["ofDir"]             =" de la carpeta ";
  $dia["ofFile"]            =" del archivo ";
  $dia["onFile"]            =" en el archivo ";
  $dia["toDir"]             =" a la carpeta ";  
  $dia["toFile"]            =" al archivo ";   
  $dia["theDir"]            ="La carpeta ";
  $dia["theFile"]           ="El archivo ";
  $dia["element"]           ="elementos";
  $dia["hasBeen"]           ="ha sido ";
  $dia["hasNotBeen"]        ="no ha sido ";
  $dia["hasFailed"]         ="ha fallado";
  $dia["successful"]        ="ha sido realizado satisfactoriamente";
  $dia["dezipping"]         ="Descomprimiendo archivo.";
  $dia["dezipped"]          ="descomprimido";
  $dia["startEdit"]         ="Empezar a editar el archivo ";
  $dia["endEdit"]           ="Dejar de editar el archivo ";
  $dia["confirmEdit"]       ="ha sido editado y guardado.";
  $dia["savingDocument"]    ="Guardando documento ";
  $dia["savingDirContent"]  ="Guardando el contenido de la carpeta ";
  $dia["savingFile"]        ="Guardando archivo ";
  $dia["backgAdded"]        ="La imagen se ha añadido al fondo.";
  $dia["backgRemoved"]      ="Fondo eliminado.";


  // Renommage / Déplacement / Suppression
  $dia["rename"]            ="Introduce el nuevo nombre ";
  $dia["renaming"]          ="Renombrando";
  $dia["renamed"]           ="renombrado";
  $dia["confirmSup"]        ="Confirma eliminar la asociación de este archivo ?";
  $dia["delete"]            ="Eliminar ";
  $dia["delete2"]           ="y su contenido ?";
  $dia["deleting"]          ="Eliminando";
  $dia["deleted"]           ="eliminado";
  $dia["theRemove"]         ="Eliminar";
  $dia["copyOf"]            ="Copia de";
  $dia["onlyCopy"]          ="pero ha sido copiado.";
  $dia["fileExist"]         ="Existe un archivo con el mismo nombre.";
  $dia["goingToCopy"]       ="se va a copiar, elige destino.";
  $dia["goingToMove"]       ="se va a mover, elige destino.";
  $dia["moving"]            ="Moviendo ";
  $dia["moved"]             ="movido";
  $dia["fileEditing"]       ="Editando ";
  $dia["copying"]           ="Copia en curso ";
  $dia["copyingFile"]       ="Copiando archivo subido a su destino";
  $dia["copied"]            ="copiado";
  $dia["toActualDir"]       ="en carpeta actual";
  $dia["typeOfElement"]     ="Documento ";
  $dia["copyTo"]            ="copia";
  $dia["moveTo"]            ="mueve";
  $dia["prohibCar"]         ="Señal de prohibición entrada y filtrada ( ? < > : # % + '' ' | & * / )";
  $dia["alreadyExist"]      ="Este archivo o carpeta ya existe, introduce un nuevo nombre.";
  $dia["confirmReplace"]    ="Este archivo o carpeta ya existe, será reemplazado si validas.";
  $dia["modeDefault"]       ="Default mode";
  $dia["modePreview"]       ="Preview mode";
  $dia["lineNumbers"]       ="View line numbers";
  $dia["colorMode"]         ="Syntax highlighting";
  $dia["includeSubDir"]     ="Include subdirectories ?";
  $dia["modifyingPrefs"]    ="Modifying settings";
  
  // Gestion des droits
  $dia["modifyPermission"]  ="Modificar atributos";
  $dia["noPermission"]      ="No tienes permiso para manejar este tipo de archivos.";
  $dia["noOperation"]       ="Esta operación no está permitida.";
  $dia["modifying"]         ="Modificando atributos ";
  $dia["fileAttributes"]    ="Los atributos del archivo";
  $dia["cantModify"]        ="no pueden ser modificados.";
  $dia["modify"]            ="han sido modificados.";
  $dia["modified"]          ="Modificado ";
  $dia["readWrite"]         ="Lectura-escritura";
  $dia["readOnly"]          ="Sólo lectura";
  $dia["writeOnly"]         ="Sólo escritura";
  $dia["locked"]            ="Archivo bloqueado";
  $dia["selectAttributes"]  ="Atributos ";
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
  $dia["property"]          ="Propiedades ";
  $dia["propertyOf"]        ="Propiedad de ";
  $dia["searchIn"]          ="Buscar en ";
  $dia["search"]            ="Introduce el nombre ";
  $dia["search2"]           ="del archivo o carpeta a buscar ?";
  $dia["searching"]         ="Búsqueda de";
  $dia["searching2"]        ="en progreso";
  $dia["useCasse"]          ="Discriminar may/min ?";
  $dia["foundIn"]           ="en";
  $dia["into"]              ="en";
  $dia["and"]               ="y";
  $dia["by"]                ="by";
  $dia["viewed"]            ="Viewed";
  $dia["times"]             ="times";
  $dia["elementsFound"]     =" elementos encontrados.";
  $dia["noResult"]          ="No se ha encontrado ningún archivo.";

  // Tri des éléments
  $dia["sortFile"]          ="Ordenar archivos";
  $dia["byName"]            ="por nombre";
  $dia["byValue"]           ="por valor";
  $dia["byType"]            ="por tipo";
  $dia["bySize"]            ="por tamaño";
  $dia["byDate"]            ="por fecha";
  $dia["byPerso"]           ="Personal";
  $dia["webSort"]           ="por defecto";
  $dia["ascending"]         ="Ascending";
  $dia["descending"]        ="Descending";
  
  // Commentaires
  $dia["comment"]           ="Comentario";
  $dia["commentAdded"]      ="Comentario añadido.";
  $dia["commentsAdded"]     =" comentarios añadidos ";
  $dia["commentNotAdded"]   ="Comentario no añadido.";
  $dia["addComment"]        ="Añadir comentario ";
  $dia["modifyComment"]     ="Modify comment";
  $dia["removeComment"]     ="Remove comment";
  $dia["addingComment"]     ="Añadiendo comentario ";
  $dia["commentFile"]       ="Comentarios en archivo ";
  $dia["messageOf"]         ="Mensaje de ";

  // Menu Images
  $dia["previous"]          ="Imagen anterior";
  $dia["next"]              ="Imagen siguiente";
  $dia["zoomp"]             ="Zoom +";
  $dia["zoomm"]             ="Zoom -";
  $dia["zooms"]             ="Tamaño real";
  $dia["diaporama"]         ="Diaporama";
  $dia["refreshMini"]       ="Actualizar miniatura";
  $dia["rotate90"]          ="Rotar 90° a la derecha";
  $dia["rotate180"]         ="Rotar 180°";
  $dia["rotate270"]         ="Rotar 90° a la izquierda";
  $dia["flipV"]             ="Voltear vertical";
  $dia["flipH"]             ="Voltear horizontal";
  $dia["resize"]            ="Reescalar ";
  $dia["keepRatio"]         ="Mantener el ratio de aspecto ?";
  $dia["width"]             ="Ancho";
  $dia["height"]            ="Alto";
  $dia["pixels"]            ="px";

  // Infos EXIF
  $dia["cliche"]            ="IMAGEN";
  $dia["object"]            ="ARCHIVO";
  $dia["infocomment"]       ="COMENTARIO";
  $dia["FileSize"]          ="Tamaño de archivo";
  $dia["DateTimeOriginal"]  ="Fecha y hora original";
  $dia["resolution"]        ="Resolución";
  $dia["XResolution"]       ="DPI";
  $dia["Software"]          ="Software";
  $dia["Photographer"]      ="Fotógrafo";
  $dia["ExposureTime"]      ="Tiempo de exposición";
  $dia["ApertureFNumber"]   ="Número de apertura F ";
  $dia["MaxApertureValue"]  ="Valor máximo de apertura";
  $dia["ISOSpeedRatings"]   ="Promedios de velocidad ISO";
  $dia["FocalLength"]       ="Distancia focal";
  $dia["ExposureBiasValue"] ="Valor de exposición Bias";
  $dia["LightSource"]       ="Origen de la luz";
  $dia["Flash"]             ="Flash";

  // Envoi d'emails
  $dia["authSendMail"]      ="Permitir enviar elementos por email";
  $dia["sendMail"]          ="Enviar por email";
  $dia["titleMail"]         ="Título del mensaje";
  $dia["recipientMail"]     ="Indicar la direccion del receptor";
  $dia["contentMail"]       ="Introduce tu mensaje";
  $dia["sendMailConfirm"]   ="Envia tu mensaje";
  $dia["sendMailOK"]        ="El mensaje ha sido enviado.";
  $dia["sendMailProblem"]   ="El mensaje no ha podido ser enviado.";

  // Corbeille
  $dia["corbeille"]         ="Papelera";
  $dia["binNoElement"]      ="La papelera está vacia.";
  $dia["binContain"]        ="La papelera contiene";
  $dia["emptyBin"]          ="Papelera vacia";
  $dia["emptyBinConfirm"]   ="¿Vaciar la papelera ?";
  $dia["emptyConfirm"]      ="¿Eliminar definitivamente este elemento ?";
  $dia["emptyBinResult"]    ="Se ha vaciado la papelera.";
  $dia["viewElements"]      ="Ver todos los elementos";
  $dia["emptyElements"]     ="Vaciar todos los elementos mayores que ";
  $dia["activeBin"]         ="Activar la papelera para esta carpeta compartida ";
  $dia["restoreElement"]    ="Restore element";
  $dia["finally"]           =" finally";

  // Gestion des versions
  $dia["version"]           ="Version ";
  $dia["viewAllVersion"]    ="View all versions";
  $dia["addNewVersion"]     ="Add a new version";

  // Favoris
  $dia["favoris"]           ="Favoritos";
  $dia["addFav"]            ="Añadir a favoritos";
  $dia["removeFav"]         ="Eliminar de favoritos";
  $dia["handleFav"]         ="Manejar favoritos";
  $dia["viewFav"]           ="Ver todos los favoritos";
  $dia["favAdded"]          ="The file has been added to bookmarks";
  $dia["favRemoved"]        ="The file has been removed from bookmarks";

  // Tests des partages
  $dia["shareTest"]         ="Haz clic para probar la configuración.";
  $dia["shareOK"]           ="Esta carpeta compartida es accesible y tiene suficientes permisos.";
  $dia["shareProtected"]    ="Esta carpeta compartida es accesible pero no tienes suficientes permisos.";
  $dia["shareNotAcc"]       ="La raiz indicada no existe o no tienes suficientes permisos.";
  $dia["shareFtpNotAcc"]    ="Conexión al servidor FTP imposible.";
  $dia["shareFtpBadLogin"]  ="El servidor FTP ha devuelto un error de identificación, verifica tu usuario y contraseña.";
  $dia["shareFtpError"]     ="El servidor FTP ha devuelto un error desconocido.";
  $dia["shareFtpcantMount"] ="El punto de montaje es inalcanzable en el servidor FTP.";
  $dia["shareFtpProtected"] ="El punto de montaje en el servidor FTP no tiene suficientes permisos.";
  $dia["shareFtpOK"]        ="Connexión a servidor FTP y prueba de carpeta compartida correcta.";
  $dia["shareAvailable"]    ="New users can access this shared folder.";

  // Administration
  $dia["adminTitle"]        ="Manejo de usuarios y servidores";
  $dia["adminHeader"]       ="ADMINISTRACIÓN";
  $dia["msgFooter"]         ="CERAP bajo licencia GPL";
  $dia["adminAlert1"]       ="Ha ocurrido un error técnico, los cambios no se han realizado.";
  $dia["adminAlert2"]       ="Los cambios se han realizado.";
  $dia["notActiv"]          ="Esta característica aún no ha sido implementada.";
  $dia["confirmation"]      ="Confirmación";
  $dia["dialConfirm"]       ="¿Confirmar ?";
  $dia["adminProtected"]    ="Protected administration panel";
  $dia["adminNotProtected"] ="Administration panel is not protected !";
  $dia["importToBase"]      ="Import configuration file into database";
  $dia["importSuccessful"]  ="Import to database successful.";
  $dia["importFailed"]      ="Import to database failed.";

  // Panneau Partages
  $dia["adminRub2"]         ="Compartido";
  $dia["serverAdmin"]       ="Manejo de carpetas virtuales y compartidas";
  $dia["newServer"]         ="Nueva carpeta compartida";
  $dia["msgInfo1"]          ="Recuerda : Todavía no hay conexiones FTP activadas.";
  $dia["msgInfo2"]          ="Aviso : Las trayectorias y los nombres de archivo solo pueden contener caracteres alfabéticos o numéricos.";
  $dia["msgInfo3"]          ="No estan permitidos la puntuación, acentos y espacios.";
  $dia["msgInfo4"]          ="Warning : The administration folder MUST be renamed to protect your installation.";
  $dia["chooseUser"]        ="Elige el usuario a eliminar";
  $dia["createUser"]        ="Crear or modificar un usuario y después validarlo";
  $dia["chooseServer"]      ="Elige el servidor a eliminar";
  $dia["createServer"]      ="Crear or modificar un servidor y después validarlo";
  $dia["selectServer"]      ="Select at least un servidor y después validarlo";
  $dia["FTP"]               ="FTP";
  $dia["local"]             ="local";
  $dia["serverFtp"]         ="Servidor (FTP)";
  $dia["loginFtp"]          ="Usuari (FTP)";
  $dia["passFtp"]           ="Contraseña (FTP)";
  $dia["portFtp"]           ="Puerto (FTP)";
  $dia["shareRoot"]         ="Raiz";
  $dia["serverRoot"]        ="Servidor raiz";
  $dia["virtualRoot"]       ="Raiz virtual";
  $dia["defaultRoot"]       ="Carpeta por defecto";
  $dia["protectRep"]        ="Proteger nuevas carpetas con el archivo :";
  $dia["modeDegrade"]       ="Modo degradado";
  $dia["protectShare"]      ="Modifications are allowed on this shared folder";    
  $dia["serverType"]        ="Tipo";  

  // Panneau Utilisateur
  $dia["adminRub1"]         ="Usuarios";
  $dia["userAdmin"]         ="Manejo de usuarios";
  $dia["newUser"]           ="Nuevo usuario";
  $dia["administrator"]     ="Administrador";
  $dia["email"]             ="Email";
  $dia["lang"]              ="Idioma";
  $dia["user"]              ="Usuario";
  $dia["group"]             ="Grupo";
  $dia["name"]              ="Nombre";
  $dia["login"]             ="Usuario";
  $dia["passwd"]            ="Contraseña";
  $dia["confirmation"]      ="Confirmación";
  $dia["connexion"]         ="Conexión";
  $dia["default"]           ="Navegar";
  $dia["explore"]           ="Explorar";
  $dia["visualis"]          ="Tema";
  $dia["leftPanel"]         ="Panel por defecto";
  $dia["webSort"]           ="Ordenación por defecto";
  $dia["webDir"]            ="Previsualizar carpeta web";
  $dia["nameShare"]         ="Compartido ";
  $dia["access"]            ="Acceso a compartido ";
  $dia["select"]            ="Seleccionar";
  $dia["open"]              ="Abrir";
  $dia["menuContext"]       ="Menú contextual";
  $dia["leftClic"]          ="Clic izquierdo:";
  $dia["rightClic"]         ="Clic derecho:";
  $dia["doubleClic"]        ="Doble clic:";
  $dia["toModify"]          ="Modificar";
  $dia["toCreate"]          ="Crear";
  $dia["toRead"]            ="Leer";
  $dia["regexp"]            ="(RegExp > Añadir nuevas expresiones separadas por | ) :";
  $dia["filterElement"]     ="Filtrar elementos que contengan";
  $dia["recoExtension"]     ="Se reconocen las siguientes extensiones";
  $dia["sessionTime"]       ="Duración de la sesión  (min)";
  $dia["defStyle"]          ="Tema per defecto";   
  $dia["actionAuth"]        ="El usuario está autorizado para realizar las siguientes acciones en elementos no bloqueados :";
  $dia["userType"]          ="Tipo";
  $dia["createNewAccount"]  ="Create a new user account";
  $dia["chooseAccount"]     ="Choose the user account to open :";

  // Panneau Préférences
  $dia["adminRub3"]         ="Preferencias";
  $dia["prefAdmin"]         ="Manejo de preferencias";
  $dia["baseAdmin"]         ="Manejo de base de datos";
  $dia["memoMax"]           ="Memoria permitida para los scripts ";
  $dia["execMax"]           ="Duración para los scripts ";
  $dia["postMax"]           ="Tamaño límite para las data post";
  $dia["uploMax"]           ="Tamaño límite para las subidas";
  $dia["lifeMax"]           ="Duración";
  $dia["timeMax"]           ="Duración de las subidas ";
  $dia["previewWeb"]        ="Activar previsualización sitio web";
  $dia["previewAct"]        ="Activar miniaturas ";
  $dia["previewPDF"]        ="Activar previsualización de archivos PDF";
  $dia["logAct"]            ="Activar logs";
  $dia["sepAdr"]            ="Separar dirección por ";
  $dia["alwaysConfirm"]     ="Confirmar cada acción";
  $dia["effectAct"]         ="Activar efectos gráficos";
  $dia["completePath"]      ="Ver trayectorias completas";
  $dia["frameTitle"]        ="Título de la ventana";
  $dia["viewClock"]         ="Ver reloj";
  $dia["diapoSpeed"]        ="Velocidad de diaporama";
  $dia["diapoStop"]         ="Parar diaporama";
  $dia["arboLink"]          ="Ver enlaces en arbol de carpetas";
  $dia["activeMini"]        ="Activar miniaturas ";
  $dia["dynWindow"]         ="Dynamic windows";
  $dia["serverBase"]        ="Servidor mySQL";
  $dia["loginBase"]         ="Usuario mySQL ";
  $dia["passBase"]          ="Contraseña mySQL";
  $dia["tableBase"]         ="Selecciona tabla BD";
  $dia["myPref"]            ="My preferences";
  $dia["privateWS"]         ="Private share";
  $dia["publicWS"]          ="Public share";
  $dia["accountUser"]       ="Users can create their own account";
  
  // Panneau Infos
  $dia["adminRub5"]         ="Información";
  $dia["infoAdmin"]         ="Informe de la instalación ";
  $dia["theExt"]            ="La extensión";
  $dia["activated"]         =" está activada.";
  $dia["notActivated"]      =" no està activada.";
  $dia["libZip"]            ="(Manejo de archivos ZIP)";
  $dia["libGD"]             ="(Manejo de imágenes y miniaturas)";
  $dia["libMB"]             ="(Manejo de caracteres especiales)";
  $dia["libXslt"]           ="(Manejo complementario de Xslt)";
  $dia["libFTP"]            ="(Conexiones FTP remotas)";
  $dia["libPdf"]            ="(Manejo de miniaturas PDF)";
  $dia["libMail"]           ="(Enviar elementos por email)";
  $dia["libExif"]           ="(Mostrar información Exif)";
  $dia["dontExist"]         ="no existe.";
  $dia["notAccessible"]     ="no existe o no es accessible.";
  $dia["accessProtect"]     ="existe pero no se puede escribir.";
  $dia["isAccessible"]      ="existe y se puede escribir.";
  $dia["modulesDetected"]   ="se ha detectado y contiene los siguientes modulos :";
  $dia["langDetected"]      ="se ha detectado y contiene los siguientes idiomas :";
  $dia["styleDetected"]     ="se ha detectado y contiene los siguientes temas :";
  $dia["cgiUpNotDetected"]  ="no se ha detectado.";
  $dia["cgiUpLimited"]      ="se ha detectado pero no tiene suficientes permisos.";
  $dia["cgiUpDetected"]     ="se ha detectado y tiene suficientes permisos.";
  $dia["unlimitedUpload"]   ="Puedes subir archivo sin límite de tamaño.";
  $dia["alertfunction1"]    ="La configuración del servidor parece que impone algunas limitaciones,";
  $dia["alertfunction2"]    ="algunas caracteristicas de CERAP puede que esten restringidas.";
  $dia["alertfunction3"]    ="This feature is available only when CERAP is connected to a database.";
  $dia["msgVarNotModif1"]   ="CERAP no puede modificar estos valores. En caso de problemas, ";
  $dia["msgVarNotModif2"]   ="modifica los parametros directamente en el archivo 'php.ini'.";
  $dia["msgVarModifiable1"] ="Puedes modificar estos valores si encuentras problemas ";
  $dia["msgVarModifiable2"] ="en CERAP. ";
  $dia["tip1"]              ="Los valores indicados limitan actualmente cada script a ";
  $dia["tip2"]              ="segundos de vida y subidas a ";
  $dia["propProcess"]       ="Ownership of the CERAP (PHP) process ";
  $dia["limitProcess"]      ="This process has limited rights.";


  // Panneau Associations
  $dia["adminRub4"]         ="Asociaciones";
  $dia["moduAdmin"]         ="Manejo de modulos";
  $dia["assoAdmin"]         ="Manejo de asociaciones";
  $dia["extension"]         ="Extensión";
  $dia["exttype"]           ="Tipo";
  $dia["extmime"]           ="Mime";
  $dia["extact1"]           ="Acción por defecto";
  $dia["extact2"]           ="Acción secundaria";
  $dia["toAdd"]             ="Añadir";
  $dia["newStyle"]          ="Añadir un nuevo tema";
  $dia["newModule"]         ="Añadir un nuevo módulo";
  $dia["updateWS"]          ="Actualizar aplicación";
  $dia["noVersionAv"]       ="No hay ninguna nueva versión disponible";
  $dia["newVersionAv"]      ="Nueva versión disponible";

  // Panneau Logs
  $dia["adminRub6"]         ="Logs";
  $dia["logsAdmin"]         ="Visor de Log";
  $dia["notConnected"]      ="La conexion a la base de datos ha fallado, por favor corrige los parámetros.";
  $dia["connectedDB"]       ="La conexion a la base de datos está operativa.";
  $dia["msgBase"]           ="La configuración de la base de datos no es esencial, pero los eventos en el (log) no están activados.";
  $dia["noLog"]             ="Logs no disponibles";
  $dia["all"]               ="Todos";
  $dia["allf"]              ="Todas";
  $dia["resultInd"]         ="Neutral";
  $dia["resultPos"]         ="Positivo";
  $dia["resultNeg"]         ="Negativo";
  $dia["noLogs"]            ="No hay acciones para esta selección";
  $dia["viewAction"]        ="Ver acciones :";
  $dia["madeBy"]            ="realizadas por";
  $dia["withResult"]        ="con resultado";
  $dia["fromDate"]          ="Período desde";
  $dia["toDate"]            ="a";
  $dia["ofDate"]            ="Ver dia";
  $dia["day"]               ="dia";
  $dia["days"]              ="dias";
  $dia["exploreShare"]      ="Exploración compartida";   

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

  $_SESSION["ws"]["dia"]["startTitle"]="CERAP";
  $_SESSION["ws"]["dia"]["infoGPL"]  ="<p><b>Note</b> : Removing or modifying the name of the author by a different name (and / or logo) is strictly prohibited.</p><p>The author can in no case be responsible for any problems using the software, or even for use that is made of the software (including criminal and / or fraudulent). Shared documents are under the sole responsibility of the user. </p><p>For more informations, please report to the terms of the <a href='http://www.gnu.org/licenses/old-licenses/gpl-2.0.html#SEC1' class='lien' target='_up'>GPL license</a>.</p>";
  $_SESSION["ws"]["dia"]["noConf"]  ="No se ha encontrado ningún  <br/>usuario o cuenta en el servidor. <br/><br/>Ve al <a href='admin/index.php' style='text-decoration:underline'>panel de administración </a><br/>para configurar tus cuentas. <br/><br/>Consulta la documentacion <br/>para mas informacion.<br/><br/>";
  $_SESSION["ws"]["dia"]["noServer"]="No se ha encontrado ninguna cuenta de servidor. <br/><br/>Ve al <a href='admin/index.php' style='text-decoration:underline'>panel de administración</a><br/>para configurar tus cuentas. <br/><br/>Consulta la documentación <br/>para mas información.<br/><br/><br/>";
  $_SESSION["ws"]["dia"]["noUser"]  ="No se ha encontrado ninguna cuenta de usuario. <br/><br/>Ve al <a href='admin/index.php' style='text-decoration:underline'>panel de administración</a><br/>para configurar tus cuentas. <br/><br/>Consulta la documentación <br/>para mas información.<br/><br/><br/>";
  $_SESSION["ws"]["dia"]["noJS"]    ="No se ha detectado JavaScript <br/>en tu navegador. <br/><br/>Activa Javascript o elige <br/>un navegador más actual<br/>para usar CERAP.<br/><br/>";
  $_SESSION["ws"]["dia"]["protect1"]="Entras a la administración de CERAP por primera vez. Para proteger tu instalación, debes definir un usuario y contraseña que te será preguntado sistematicamente durante tu próximo acceso.<br/><br/>";
  $_SESSION["ws"]["dia"]["protect2"]="* Los campos contraseña deben coincidir para asegurar su validez.<br/>Introduce únicamente caracteres alfanuméricos en los campos.<br/>Para cambiar tu usuario más tarde, edita el archivo .htaccess situado en la carpeta de administración.<br/><br/>";

  }
?>
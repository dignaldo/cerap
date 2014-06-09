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
// Fonction : Fichier de traduction brésilienne/portugaise (Portugues translation)
// Nom      : Portugues.lang.php
// Auteur   : Michael Cunningham
// Version  : 0.8.2
// Date     : 14/05/08
// =======================================================================
// Text encoding: UTF-8/UNIX(LF)

  if (isset($_REQUEST["name"])&&(intval($_REQUEST["name"])==1))
    $nameLanguage      ="Portuguese - Portugu&ecirc;s Brasileiro"; else {
  
  $listeMois= array("","Jan.","Feb.","March","April","May","June","July","Aug.","Sept","Oct.","Nov.","Dec.");
  $listeJour= array("","Mon"=>"Monday","Tue"=>"Tuesday","Wed"=>"Wednesday","Thu"=>"Thursday","Fri"=>"Friday","Sat"=>"Saturday","Sun"=>"Sunday");

  $dia= array();

  // Panneau de login
  $dia["ident"]             ="Entre com o seu Login:";
  $dia["cantIdent"]         ="Loguin errado.";
  $dia["identProblem1"]     ="Servidor Inacessível .";
  $dia["identProblem2"]     ="Problema tecnico.";
  $dia["identProblem3"]     ="Connection to LDAP server could not be established.";
  $dia["enter"]             ="Entrar";

  // Interface
  $dia["loading"]           ="Carregando";
  $dia["actualDir"]         ="Pasta atual : ";
  $dia["connected"]         ="Conectado como ";
  $dia["directLink"]        ="Link direto";
  $dia["filePreview"]       ="Previzualização de arquivo";
  $dia["pictPreview"]       ="Previzualização de imagem";
  $dia["webPreview"]        ="Navegando ";
  $dia["niveauSup"]         ="Nivel acima";
  $dia["closePanel"]        ="Fechar painel";
  $dia["picTooBig"]         ="Foto muito grande para ser visualizada.";
  $dia["previousPage"]      ="Pagina anterior";
  $dia["nextPage"]          ="Next page";
  $dia["upDir"]             ="Subir nivel";
  $dia["updateDir"]         ="Atualizar pasta";
  $dia["changeStyle"]       ="Selecionar estilo";
  $dia["refreshTree"]       ="Atualizar pastas";
  $dia["hideTree"]          ="Reduzir pastas";
  $dia["showTree"]          ="Criar  pastas";
  $dia["printGallery"]      ="Imprimir galeria";
  $dia["saveAll"]           ="Salvar tudo";
  $dia["renameAll"]         ="Renomear tudo";
  $dia["savePic"]           ="Tudo";
  $dia["webSite"]           ="Website";
  $dia["affichage"]         ="Mostrar";
  $dia["expPanel"]          ="Painel de pastas";
  $dia["background"]        ="Plano de fundo";
  $dia["miniature"]         ="Thumbnails";
  $dia["bigIcone"]          ="Icones grandes";
  $dia["liste"]             ="Lista";
  $dia["details"]           ="Detalhes";
  $dia["none"]              ="Esconder pastas";
  $dia["arbo"]              ="Mostrar Pastas";
  $dia["closeWindow"]       ="Fechar";
  $dia["viewContent"]       ="Ver conteudo";
  $dia["changeUser"]        ="Change user";
  $dia["onlineHelp"]        ="Online Help";
  $dia["rapport"]           ="Reporar erro";
  $dia["options"]           ="Opições";
  $dia["contact"]           ="Contato";
  $dia["about"]             ="Sobre ";
  $dia["total"]             ="Total";
  $dia["used"]              ="Used";
  $dia["free"]              ="Livre";
  $dia["octet"]             ="b";
  $dia["selectAll"]         ="Selecionar tudo";
  $dia["select"]            ="Selecionar";
  $dia["unselect"]          ="Desmarcar";
  $dia["expression"]        ="expression";
  $dia["inAllFiles"]        ="in each filenames";
  $dia["distribGPL"]        ="Distributed under GPL license";
  $dia["moreInfos"]         ="For any information or support, visit the official website.";
  $dia["websiteAdr"]        ="en.webshare.fr";
  
  // Verbes / actions
  $dia["openFile"]          ="Abrir";
  $dia["openFileWith"]      ="Abrir com";
  $dia["saveFile"]          ="Salvar";
  $dia["toExplore"]         ="Explorar";
  $dia["toBrowse"]          ="Navegar";
  $dia["toVisit"]           ="Visitar";
  $dia["toView"]            ="Vizualizar";
  $dia["toWatch"]           ="Assistir";
  $dia["toListen"]          ="Escutar";
  $dia["toPrint"]           ="Imprimir";
  $dia["toUpload"]          ="Enviar";
  $dia["toCut"]             ="Recortar";
  $dia["toCopy"]            ="Copiar";
  $dia["toPaste"]           ="Coalr";
  $dia["toMove"]            ="Mover";
  $dia["toDelete"]          ="Deletar";
  $dia["toChmod"]           ="Modificar atributos";
  $dia["toSearch"]          ="Pesquisar";
  $dia["toRename"]          ="Renomear";
  $dia["toComment"]         ="Comentarios";
  $dia["toValid"]           ="Validar";
  $dia["toEdit"]            ="Editar";
  $dia["toModify"]          ="Modificar";
  $dia["toZip"]             ="Compactar";
  $dia["toDezip"]           ="Descompactar";
  $dia["toRecover"]         ="Recuperar";
  $dia["toConnect"]         ="Conectar";
  $dia["toQuit"]            ="Sair";
  $dia["toVerify"]          ="Verify";
  $dia["toReplace"]         ="Replace";
  $dia["choose"]            ="Choose...";

  // Chargement de fichier
  $dia["addUpload"]         ="Aicionar arquivo";
  $dia["startUpload"]       ="Iniciar envio";
  $dia["limitTaille"]       ="Tamanho maximo do arquivo a ser enviado";
  $dia["ifFileExist"]       ="Se o arquivo ja existir :";
  $dia["replaceFile"]       ="Subistitua";
  $dia["renameFile"]        ="Renomeie";
  $dia["cancelFile"]        ="Cancele";
  $dia["waitingDownload"]   ="Aquardando pelo envio";
  $dia["problemDownload"]   ="Problema durante o envio do arquivo";
  $dia["prohibited"]        ="Você não tem permissão para modificar este arquivo.";
  $dia["downloading"]       ="Enviando";
  $dia["uploading"]         ="Enviando";
  $dia["started"]           ="Iniciado envio";
  $dia["success"]           ="Enviado com sucesso";
  $dia["tempNotSet"]        ="Pasta temporaria não definida";
  $dia["withSuccess"]       ="com sucesso";
  $dia["uploaded"]          ="enviado.";
  $dia["succesUpload"]      ="enviado com sucesso";
  $dia["cantOpen"]          ="Impossivel abrir o arquivo";
  $dia["cantWrite"]         ="Impossivel gravar o arquivo ";
  $dia["fileTooBig"]        ="O tamanho do arquivo ultrapassou o limite.";
  $dia["wait"]              ="Aguarde";

  // Creation de nouveaux élements
  $dia["newFile"]           ="Novo arquivo";
  $dia["newDir"]            ="Nova pasta";
  $dia["newTxt"]            ="Novo documento de texto";
  $dia["newLink"]           ="Novo link";
  $dia["making"]            ="Criando";
  $dia["areYouSure"]        ="Tem certeza de que deseja ";
  $dia["toDisconnect"]      ="disconnect ?";
  $dia["addTxt"]            ="Insira o nome do novo documento de texto :";
  $dia["addDir"]            ="Insira o nome da nova pasta :";
  $dia["addNew"]            ="Adicionar novo";
  $dia["addLink"]           ="Digite o nome ";
  $dia["addLink2"]          ="e o endereço do novo link :";
  $dia["dirCreate"]         ="A pasta criada";
  $dia["txtCreate"]         ="O documento de texto criado";
  $dia["linkCreate"]        ="O link criado";
  $dia["linkTo"]            ="Link para";
  $dia["created"]           ="criado";
  $dia["theNewDir"]         ="A nova pasta";
  $dia["theNewLink"]        ="O novo link";
  $dia["theNewTxt"]         ="O novo documento de texto";

  // Réponses
  $dia["File"]              ="Arquivo";
  $dia["rep"]               ="pasta";
  $dia["dir"]               =" pasta";
  $dia["file"]              =" arquivo";
  $dia["ofDir"]             =" da pasta ";
  $dia["ofFile"]            =" do arquivo ";
  $dia["onFile"]            =" no arquivo ";
  $dia["toDir"]             =" to folder ";  
  $dia["toFile"]            =" to file ";    
  $dia["theDir"]            ="A pasta ";
  $dia["theFile"]           ="O arquivo ";
  $dia["element"]           ="itens";
  $dia["hasBeen"]           ="foi ";
  $dia["hasNotBeen"]        ="não foi ";
  $dia["hasFailed"]         ="falhou";
  $dia["successful"]        ="foi executado com sucesso";
  $dia["dezipping"]         ="Dexcompactar arquivo.";
  $dia["dezipped"]          ="descompactado";
  $dia["startEdit"]         ="Iniciando edição de arquivo ";
  $dia["endEdit"]           ="Parando edição de arquivo ";
  $dia["confirmEdit"]       ="foi editado e salvo.";
  $dia["savingDocument"]    ="Salvando documento ";
  $dia["savingDirContent"]  ="Salvando conteúdo da pasta ";
  $dia["savingFile"]        ="Salvando arquivo ";
  $dia["backgAdded"]        ="A figura foi adicionado no plano de fundo.";
  $dia["backgRemoved"]      ="Plano de fundo removido.";


  // Renommage / Déplacement / Suppression
  $dia["rename"]            ="Digite o novo nome ";
  $dia["renaming"]          ="Renomear";
  $dia["renamed"]           ="renomeado";
  $dia["confirmSup"]        ="Confirme a eliminação desta associação arquivo?";
  $dia["delete"]            ="Tem certeza de apagar o ";
  $dia["delete2"]           ="e o seu conteúdo?";
  $dia["deleting"]          ="Apagar";
  $dia["deleted"]           ="Apagado";
  $dia["theRemove"]         ="remover";
  $dia["copyOf"]            ="Copia de ";
  $dia["onlyCopy"]          ="Mas tem sido copiado.";
  $dia["fileExist"]         ="Um arquivo com o mesmo nome já existe.";
  $dia["goingToCopy"]       ="Vai ser copiado, escolha o destino.";
  $dia["goingToMove"]       ="Vai ser movido, escolha o destino.";
  $dia["moving"]            ="Movendo ";
  $dia["moved"]             ="movido";
  $dia["fileEditing"]       ="Editando ";
  $dia["copying"]           ="Copia sendo executada ";
  $dia["copyingFile"]       ="Copiando arquivo carregado para o seu destino";
  $dia["copied"]            ="copiado";
  $dia["toActualDir"]       ="para a pasta atual";
  $dia["typeOfElement"]     ="Documento ";
  $dia["copyTo"]            ="copiar";
  $dia["moveTo"]            ="mover";
  $dia["prohibCar"]         ="Proibido os seguinters caracteres ( ? < > : # % + '' ' | & * / )";
  $dia["alreadyExist"]      ="Este arquivo ou pasta já existem, digite um novo nome.";
  $dia["confirmReplace"]    ="Este arquivo ou pasta já existe, ele será substituído se você válidar.";
  $dia["modeDefault"]       ="Default mode";
  $dia["modePreview"]       ="Preview mode";
  $dia["lineNumbers"]       ="View line numbers";
  $dia["colorMode"]         ="Syntax highlighting";
  $dia["includeSubDir"]     ="Include subdirectories ?";
  $dia["modifyingPrefs"]    ="Modifying settings";
  
  // Gestion des droits
  $dia["modifyPermission"]  ="Moficar atributos";
  $dia["noPermission"]      ="Você não tem permissão para lidar com esse tipo de arquivo.";
  $dia["noOperation"]       ="Esta operação não esta disponivel.";
  $dia["modifying"]         ="Modificando atributos ";
  $dia["fileAttributes"]    ="Atributos do arquivo";
  $dia["cantModify"]        ="não pode ser modificado.";
  $dia["modify"]            ="foi modificado.";
  $dia["modified"]          ="Modificar ";
  $dia["readWrite"]         ="Ler-Gravar";
  $dia["readOnly"]          ="Somente Leitura";
  $dia["writeOnly"]         ="Somente gravação";
  $dia["locked"]            ="Arquivo protegido";
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
  $dia["propertyOf"]        ="Propiedades do ";
  $dia["searchIn"]          ="Pesquisar em ";
  $dia["search"]            ="Digite o nome ";
  $dia["search2"]           ="do arquivo ou pasta para pesquisa ?";
  $dia["searching"]         ="Pesquisa do ";
  $dia["searching2"]        ="pesquisando";
  $dia["useCasse"]          ="Diferencia maiúsculas de minúsculas ?";
  $dia["foundIn"]           ="no";
  $dia["into"]              ="entre";
  $dia["and"]               ="e";
  $dia["by"]                ="by";
  $dia["viewed"]            ="Viewed";
  $dia["times"]             ="times";
  $dia["elementsFound"]     =" elementos encontrados.";
  $dia["noResult"]          ="Nenhum arquivo encontrado.";

  // Tri des éléments
  $dia["sortFile"]          ="Classificar";
  $dia["byName"]            ="por nome";
  $dia["byValue"]           ="Pelo valor";
  $dia["byType"]            ="por tipo";
  $dia["bySize"]            ="por tamanho";
  $dia["byDate"]            ="pela data";
  $dia["byPerso"]           ="Pessoal";
  $dia["webSort"]           ="Padrão";
  $dia["ascending"]         ="Ascending";
  $dia["descending"]        ="Descending";

  // Commentaires
  $dia["comment"]           ="Cometario";
  $dia["commentAdded"]      ="Comentario adicionado.";
  $dia["commentsAdded"]     =" comentario adicionado ";
  $dia["commentNotAdded"]   ="Comentario não adicionado.";
  $dia["addComment"]        ="Adicionar comentario ";
  $dia["modifyComment"]     ="Modify comment";
  $dia["removeComment"]     ="Remove comment";
  $dia["addingComment"]     ="A adição de comentário ";
  $dia["commentFile"]       ="Comentarios no arquivo ";
  $dia["messageOf"]         ="Menssagem de ";

  // Menu Images
  $dia["previous"]          ="imagem anterior";
  $dia["next"]              ="proxima imagem";
  $dia["zoomp"]             ="Zoom +";
  $dia["zoomm"]             ="Zoom -";
  $dia["zooms"]             ="tamanho real";
  $dia["diaporama"]         ="Slides";
  $dia["refreshMini"]       ="Recarregar miniatura";
  $dia["rotate90"]          ="Rodar 90° para direita";
  $dia["rotate180"]         ="Rodar 180°";
  $dia["rotate270"]         ="Rodar 90° para esquerda";
  $dia["flipV"]             ="Virar na vertical";
  $dia["flipH"]             ="Virar na horizontal";
  $dia["resize"]            ="Redefinir tamanho ";
  $dia["keepRatio"]         ="Manter aspecto ?";
  $dia["width"]             ="Largura";
  $dia["height"]            ="Altura";
  $dia["pixels"]            ="px";

  // Infos EXIF
  $dia["cliche"]            ="IMAGEM";
  $dia["object"]            ="ARQUIVO";
  $dia["infocomment"]       ="COMENTARIO";
  $dia["FileSize"]          ="Tamanho do arquivo";
  $dia["DateTimeOriginal"]  ="data e hora original";
  $dia["resolution"]        ="Resolução";
  $dia["XResolution"]       ="DPI";
  $dia["Software"]          ="Software";
  $dia["Photographer"]      ="Fotografo";
  $dia["ExposureTime"]      ="Exposure Time";
  $dia["ApertureFNumber"]   ="Aperture F Number";
  $dia["MaxApertureValue"]  ="Max Aperture Value";
  $dia["ISOSpeedRatings"]   ="ISO Speed Ratings";
  $dia["FocalLength"]       ="Distância focal";
  $dia["ExposureBiasValue"] ="Exposure Bias Value";
  $dia["LightSource"]       ="Light Source";
  $dia["Flash"]             ="Flash";

  // Envoi d'emails
  $dia["authSendMail"]      ="Elementos permitir o envio por e-mail";
  $dia["sendMail"]          ="Enviar por email";
  $dia["titleMail"]         ="Titulo da menssagem";
  $dia["recipientMail"]     ="Indicar o email do destinatário";
  $dia["contentMail"]       ="Digite sua menssagem";
  $dia["sendMailConfirm"]   ="Envie sua menssagem";
  $dia["sendMailOK"]        ="A menssagem foi enviada.";
  $dia["sendMailProblem"]   ="A menssagem não pode ser enviada.";

  // Corbeille
  $dia["corbeille"]         ="Lixeira";
  $dia["binNoElement"]      ="A lixeira esta vazia.";
  $dia["binContain"]        ="A lixeira contem";
  $dia["emptyBin"]          ="Esvaziar lixeira";
  $dia["emptyBinConfirm"]   ="Tem certeza de esvaziar a lixeira ?";
  $dia["emptyConfirm"]      ="Tem certeza que deseja definitivamente excluir este itens?";
  $dia["emptyBinResult"]    ="A lixeira foi esvaziada.";
  $dia["viewElements"]      ="Ver todos os itens";
  $dia["emptyElements"]     ="Esvaziar todos os itens mais de ";
  $dia["activeBin"]         ="Ativar o lixo para esta pasta compartilhada";
  $dia["restoreElement"]    ="Restore element";
  $dia["finally"]           =" finally";

  // Gestion des versions
  $dia["version"]           ="Version ";
  $dia["viewAllVersion"]    ="View all versions";
  $dia["addNewVersion"]     ="Add a new version";

  // Favoris
  $dia["favoris"]           ="Favoritos";
  $dia["addFav"]            ="Adicionar favoritos";
  $dia["removeFav"]         ="Remover do favoritos";
  $dia["handleFav"]         ="Gerenciar favoritos";
  $dia["viewFav"]           ="Ver todos os favoritos";
  $dia["favAdded"]          ="The file has been added to bookmarks";
  $dia["favRemoved"]        ="The file has been removed from bookmarks";

  // Tests des partages
  $dia["shareTest"]         ="Clique para testar as configurações.";
  $dia["shareOK"]           ="Esta pasta compartilhada é acessível e tem direitos suficientes.";
  $dia["shareProtected"]    ="Esta pasta compartilhada é acessível, mas não tem direitos suficientes.";
  $dia["shareNotAcc"]       ="A pasta indicada não é acessível ou não existem.";
  $dia["shareFtpNotAcc"]    ="Conexão ao servidor FTP impossível.";
  $dia["shareFtpBadLogin"]  ="O servidor FTP retornou um erro identificação, verificar o seu login e senha.";
  $dia["shareFtpError"]     ="O servidor FTP retornou um erro desconhecido.";
  $dia["shareFtpcantMount"] ="Pasta inacessível no servidor FTP.";
  $dia["shareFtpProtected"] ="Pasta no servidor de FTP não tem direitos suficientes.";
  $dia["shareFtpOK"]        ="Conexão ao servidor FTP e teste de pasta compartilhada com sucesso.";
  $dia["shareAvailable"]    ="New users can access this shared folder.";

  // Administration
  $dia["adminTitle"]        ="Gerenciar usuários e servidores";
  $dia["adminHeader"]       ="ADMINISTRAÇÃO";
  $dia["msgFooter"]         ="WebShare sob a licença GPL";
  $dia["adminAlert1"]       ="Um problema técnico ocorreu, as mudanças não foram feitas.";
  $dia["adminAlert2"]       ="Foram introduzidas alterações.";
  $dia["notActiv"]          ="Esta opção ainda não está implementada.";
  $dia["confirmation"]      ="Confirmaçãon";
  $dia["dialConfirm"]       ="Confirmar ?";
  $dia["adminProtected"]    ="Protected administration panel";
  $dia["adminNotProtected"] ="Administration panel is not protected !";
  $dia["importToBase"]      ="Import configuration file into database";
  $dia["importSuccessful"]  ="Import to database successful.";
  $dia["importFailed"]      ="Import to database failed.";

  // Panneau Partages
  $dia["adminRub2"]         ="Compart.";
  $dia["serverAdmin"]       ="Gerenciamento de pastas compartilhadas";
  $dia["newServer"]         ="Nova pasta compartilhada";
  $dia["msgInfo1"]          ="Lembre-se: FTP conexões não estão activas ainda.";
  $dia["msgInfo2"]          ="Atenção: Caminhos e nomes arquivo deve conter somente caracteres alfabéticos (maiúscula ou minúscula) e numericos.";
  $dia["msgInfo3"]          ="Pontuação, acentos e espaços não são permitidos.";
  $dia["msgInfo4"]          ="Warning : The administration folder MUST be renamed to protect your installation.";
  $dia["chooseUser"]        ="Escolha o usuário para apagar";
  $dia["createUser"]        ="Criar ou modificar um usuário, em seguida, validar";
  $dia["chooseServer"]      ="Escolha o servidor para apagar";
  $dia["createServer"]      ="Criar ou modificar um servidor, em seguida, validar";
  $dia["selectServer"]      ="Select at least um servidor, em seguida, validar";
  $dia["FTP"]               ="FTP";
  $dia["local"]             ="local";
  $dia["serverFtp"]         ="Server (FTP)";
  $dia["loginFtp"]          ="Login (FTP)";
  $dia["passFtp"]           ="Password (FTP)";
  $dia["portFtp"]           ="Porta (FTP)";
  $dia["shareRoot"]         ="Root";
  $dia["serverRoot"]        ="Server root";
  $dia["virtualRoot"]       ="Virtual root";
  $dia["defaultRoot"]       ="Default folder";
  $dia["protectRep"]        ="Proteja novas pastas com arquivos:";
  $dia["modeDegrade"]       ="Modo degradadas";
  $dia["protectShare"]      ="Modifications are allowed on this shared folder";  
  $dia["serverType"]        ="Tipo";
  
  // Panneau Utilisateur
  $dia["adminRub1"]         ="Usuarios";
  $dia["userAdmin"]         ="Gerenciar usuarios";
  $dia["newUser"]           ="Novo usuario";
  $dia["administrator"]     ="Administrar";
  $dia["email"]             ="Email";
  $dia["lang"]              ="Idioma";
  $dia["user"]              ="Usuario";
  $dia["group"]             ="Grupo";
  $dia["name"]              ="Nome";
  $dia["login"]             ="Login";
  $dia["passwd"]            ="Senha";
  $dia["confirmation"]      ="Confirmatr";
  $dia["connexion"]         ="Conexão";
  $dia["default"]           ="Navegar";
  $dia["explore"]           ="Explorar";
  $dia["visualis"]          ="Estilo";
  $dia["leftPanel"]         ="Painel principal";
  $dia["webSort"]           ="Listagem principal";
  $dia["webDir"]            ="Previzualizar WEB";
  $dia["nameShare"]         ="Compartilhamento ";
  $dia["access"]            ="Aceso compartilhado ";
  $dia["select"]            ="Selecionar";
  $dia["open"]              ="Abrir";
  $dia["menuContext"]       ="Contexto menu";
  $dia["leftClic"]          ="Botão esquerdo :";
  $dia["rightClic"]         ="Botão direito :";
  $dia["doubleClic"]        ="Duplo clic :";
  $dia["toModify"]          ="Modificar";
  $dia["toCreate"]          ="Criar";
  $dia["toRead"]            ="Ler";
  $dia["regexp"]            ="(RegExp> Adicionar novas expressões separadas por |):";
  $dia["filterElement"]     ="Filtro elementos contendo";
  $dia["recoExtension"]     ="Após extensões são reconhecidos";
  $dia["defStyle"]          ="Default style";  
  $dia["sessionTime"]       =" Duração da sessão (min)";
  $dia["actionAuth"]        ="Usuário está autorizado a fazer as seguintes ações em elementos não bloqueado :";
  $dia["userType"]          ="Tipo";
  $dia["createNewAccount"]  ="Create a new user account";
  $dia["chooseAccount"]     ="Choose the user account to open :";

  // Panneau Préférences
  $dia["adminRub3"]         ="Preferencias";
  $dia["prefAdmin"]         ="Gerenciar preferencias";
  $dia["baseAdmin"]         ="Gerenciar Banco de dados";
  $dia["memoMax"]           ="Admitidos memória para scripts ";
  $dia["execMax"]           ="Vida duração de scripts ";
  $dia["postMax"]           ="Tamanho limite de dados postados";
  $dia["uploMax"]           ="Tamanho limite por envio";
  $dia["lifeMax"]           ="Tempo de duração";
  $dia["timeMax"]           ="Tempo de duração para envios ";
  $dia["previewWeb"]        ="Ativar pre-vizualização de websites";
  $dia["previewAct"]        ="Activar thumbnails ";
  $dia["previewPDF"]        ="Ativar pre-vizualização de PDF";
  $dia["logAct"]            ="Activar logs";
  $dia["sepAdr"]            ="Separar endereço por ";
  $dia["alwaysConfirm"]     ="Confirme cada acção";
  $dia["effectAct"]         ="Ativar efeitos graficos";
  $dia["completePath"]      ="Ver caminho completo";
  $dia["frameTitle"]        ="Titulo da janela";
  $dia["viewClock"]         ="Ver relogio";
  $dia["diapoSpeed"]        ="Velocidade dos slides";
  $dia["diapoStop"]         ="Parar slides";
  $dia["arboLink"]          ="Ver links nas pastas ";
  $dia["activeMini"]        ="Activar thumbnails ";
  $dia["dynWindow"]         ="Janela dinamica";
  $dia["serverBase"]        ="mySQL server";
  $dia["loginBase"]         ="mySQL login";
  $dia["passBase"]          ="mySQL senha";
  $dia["tableBase"]         ="mySQL banco";
  $dia["myPref"]            ="My preferences";
  $dia["privateWS"]         ="Private share";
  $dia["publicWS"]          ="Public share";
  $dia["accountUser"]       ="Users can create their own account";
  
  // Panneau Infos
  $dia["adminRub5"]         ="Informações";
  $dia["infoAdmin"]         ="Síntese da instalação ";
  $dia["theExt"]            ="A extensão";
  $dia["activated"]         =" está ativa.";
  $dia["notActivated"]      =" não está ativa.";
  $dia["libZip"]            ="(Gerenciar arquivos compactados)";
  $dia["libGD"]             ="(Gerenciar imagens e thumbnails )";
  $dia["libMB"]             ="(Gerenciar caracteres especiais)";
  $dia["libXslt"]           ="(Complementary Xslt management)";
  $dia["libFTP"]            ="(Distantes conexões FTP)";
  $dia["libPdf"]            ="(Gerenciar pre-vizualização de PDF)";
  $dia["libMail"]           ="(Enviar itens por email)";
  $dia["libExif"]           ="(Mostar informações do EXIF";
  $dia["dontExist"]         ="não existe.";
  $dia["notAccessible"]     ="não existe ou não esta acesivel.";
  $dia["accessProtect"]     ="Existe não é gravável.";
  $dia["isAccessible"]      ="Existe e é gravável.";
  $dia["modulesDetected"]   ="Foi detectado e contém seguintes módulos :";
  $dia["langDetected"]      ="Foi detectado e contém seguintes idiomas :";
  $dia["styleDetected"]     ="Foi detectado e contém seguintes estilos :";
  $dia["cgiUpNotDetected"]  ="Não foi detectada.";
  $dia["cgiUpLimited"]      ="Foi detectada, mas não tem direitos suficientes.";
  $dia["cgiUpDetected"]     ="Foi detectado e tem direitos suficientes.";
  $dia["unlimitedUpload"]   ="Você pode carregar arquivos sem tamanho limite.";
  $dia["alertfunction1"]    ="Servidor configuração parece impor algumas limitações,";
  $dia["alertfunction2"]    ="Algumas características de Webshare provavelmente estará restrita.";
  $dia["alertfunction3"]    ="This feature is available only when Webshare is connected to a database.";
  $dia["msgVarNotModif1"]   ="Webshare não pode modificar estes valores. Em caso de problema, ";
  $dia["msgVarNotModif2"]   ="Modificar os parâmetros directamente no arquivo 'php.ini'.";
  $dia["msgVarModifiable1"] ="Você pode modificar estes valores se encontrar problemas ";
  $dia["msgVarModifiable2"] ="no Webshare. ";
  $dia["tip1"]              ="Indicado valores-limite realmente cada script de ";
  $dia["tip2"]              ="Segundos de vida e uploads de ";
  $dia["propProcess"]       ="Ownership of the Webshare (PHP) process ";
  $dia["limitProcess"]      ="This process has limited rights.";


  // Panneau Associations
  $dia["adminRub4"]         ="Associações";
  $dia["moduAdmin"]         ="Gerenciar modulos";
  $dia["assoAdmin"]         ="Gerenciar associações";
  $dia["extension"]         ="Extensão";
  $dia["exttype"]           ="Tipo";
  $dia["extmime"]           ="icone";
  $dia["extact1"]           ="Ação principal";
  $dia["extact2"]           ="Ação secundaria";
  $dia["toAdd"]             ="Adicionar";
  $dia["newStyle"]          ="Adicionar novo estilo";
  $dia["newModule"]         ="Add a new module";
  $dia["updateWS"]          ="Update application";
  $dia["noVersionAv"]       ="Nenhuma nova versão disponível";
  $dia["newVersionAv"]      ="A nova versão está disponível";

  // Panneau Logs
  $dia["adminRub6"]         ="Logs";
  $dia["logsAdmin"]         ="Visualizador de Log";
  $dia["notConnected"]      ="Ligação de dados falhou, corrija os parâmetros.";
  $dia["connectedDB"]       ="Ligação à base de dados está operacional.";
  $dia["msgBase"]           ="Configuração de banco de dados não é essencial, mas as funções de acompanhamento de eventos (log) não será ativada.";
  $dia["noLog"]             ="Logs não disponiveis";
  $dia["all"]               ="Todos";
  $dia["allf"]              ="Todos";
  $dia["resultInd"]         ="Neutro";
  $dia["resultPos"]         ="Positivo";
  $dia["resultNeg"]         ="Negativo";
  $dia["noLogs"]            ="Não a ações para esta seleção";
  $dia["viewAction"]        ="Ver ações :";
  $dia["madeBy"]            ="made by";
  $dia["withResult"]        ="com resultado";
  $dia["fromDate"]          ="Apartir da data";
  $dia["toDate"]            ="to";
  $dia["ofDate"]            ="Ver dia";
  $dia["day"]               ="dia";
  $dia["days"]              ="dias";
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
  $_SESSION["ws"]["dia"]["noConf"]  ="Nenhuma conta servidor ou <br/> usuário foi detectado. <br/> <br/> Ir para a <a href='admin/index.php' style='text-decoration:underline'> administração painel </ a> <br/> para configurar suas contas. <br/> <br/> Consult <br/> documentação para obter mais informações. <br/> <br/>";
  $_SESSION["ws"]["dia"]["noServer"]="Nenhuma conta servidor foi detectado. <br/> <br/> Ir para a <a href='admin/index.php' style='text-decoration:underline'> administração painel </ a> <br/> para configurar suas contas. <br/> <br/> Consult <br/> documentação para obter mais informações. <br/> <br/> <br/>";
  $_SESSION["ws"]["dia"]["noUser"]  ="Nenhuma conta usuário foi detectado. <br/> <br/> Ir para a <a href='admin/index.php' style='text-decoration:underline'> administração painel </ a> <br/> para configurar suas contas. <br/> <br/> Consult <br/> documentação para obter mais informações. <br/> <br/> <br/>";
  $_SESSION["ws"]["dia"]["noJS"]    ="JavaScript <br/> não foi detectado em seu navegador. <br/> <br/> Activar Javascript ou escolher <br/> um navegador mais recente para uso <br/> Webshare. <br/> <br/>";
  $_SESSION["ws"]["dia"]["protect1"]="Você entra WebShare administração pela primeira vez. Para proteger a sua instalação, você deve definir um login e uma senha que será solicitado sistematicamente durante a sua próxima visita. <br/> <br/>";
  $_SESSION["ws"]["dia"]["protect2"]="* Senha campos deve corresponder a verificar a sua validade. <br/> Digite somente caracteres alfanuméricos nos campos. <br/> Para alterar o seu login depois, editar o arquivo. Htaccess localizado na administração pasta.<br/><br/>";

  }
?>
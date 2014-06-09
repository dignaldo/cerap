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
// Fonction : Translation file for Chinese version by iMyCard (http://www.imycard.com)
// Nom      : Chinese.lang.php
// Version  : 0.8.2
// Date     : 04/04/08
// =======================================================================
// Text encoding: UTF-8/UNIX(LF)

  if (isset($_REQUEST["name"])&&(intval($_REQUEST["name"])==1))
    $nameLanguage      ="Chinese Simplified - &#x7b80;&#x4f53;&#x4e2d;&#x6587;"; else {
  
  $listeMois= array("","一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月");
  $listeJour= array("","Mon"=>"星期一","Tue"=>"星期二","Wed"=>"星期三","Thu"=>"星期四","Fri"=>"星期五","Sat"=>"星期六","Sun"=>"星期日");

  $dia= array();

  // Panneau de login
  $dia["ident"]             ="请输入登录名：";
  $dia["cantIdent"]         ="登录错误：";
  $dia["identProblem1"]     ="不可知的服务。";
  $dia["identProblem2"]     ="技术问题。";
  $dia["identProblem3"]     ="Connection to LDAP server could not be established.";
  $dia["enter"]             ="进入";

  // Interface
  $dia["loading"]           ="加载中。。。";
  $dia["actualDir"]         ="当前文件夹：";
  $dia["connected"]         ="连接 ";
  $dia["directLink"]        ="真实链接";
  $dia["filePreview"]       ="文件预览";
  $dia["pictPreview"]       ="图片预览";
  $dia["webPreview"]        ="浏览 ";
  $dia["niveauSup"]         ="向上";
  $dia["closePanel"]        ="关闭面板";
  $dia["picTooBig"]         ="图像大小过大";
  $dia["previousPage"]      ="前一页";
  $dia["nextPage"]          ="Next page";
  $dia["upDir"]             ="向上";
  $dia["updateDir"]         ="更新文件夹";
  $dia["changeStyle"]       ="选择风格";
  $dia["refreshTree"]       ="刷新文件夹目录";
  $dia["hideTree"]          ="隐藏文件夹目录";
  $dia["showTree"]          ="显示文件夹目录";
  $dia["printGallery"]      ="打印相册";
  $dia["renameAll"]         ="Rename all";
  $dia["saveAll"]           ="全部保存";
  $dia["savePic"]           ="保存";
  $dia["webSite"]           ="网站";
  $dia["affichage"]         ="显示";
  $dia["expPanel"]          ="文件夹目录面板";
  $dia["background"]        ="背景";
  $dia["miniature"]         ="缩略图";
  $dia["bigIcone"]          ="大图标";
  $dia["liste"]             ="列表";
  $dia["details"]           ="详情";
  $dia["none"]              ="无";
  $dia["arbo"]              ="文件夹目录";
  $dia["closeWindow"]       ="关闭";
  $dia["viewContent"]       ="查看内容";
  $dia["changeUser"]        ="Change user";
  $dia["onlineHelp"]        ="在线帮助";
  $dia["rapport"]           ="反馈问题";
  $dia["options"]           ="选项";
  $dia["contact"]           ="联系";
  $dia["about"]             ="关于";
  $dia["total"]             ="总共";
  $dia["used"]              ="Used";
  $dia["free"]              ="空闲";
  $dia["octet"]             ="b";
  $dia["selectAll"]         ="全选";
  $dia["select"]            ="选择";
  $dia["unselect"]          ="取消选择";
  $dia["expression"]        ="expression";
  $dia["inAllFiles"]        ="in each filenames";
  $dia["distribGPL"]        ="Distributed under GPL license";
  $dia["moreInfos"]         ="For any information or support, visit the official website.";
  $dia["websiteAdr"]        ="en.webshare.fr";
  
  // Verbes / actions
  $dia["openFile"]          ="打开";
  $dia["openFileWith"]      ="打开方式";
  $dia["saveFile"]          ="保存";
  $dia["toExplore"]         ="查看";
  $dia["toBrowse"]          ="浏览";
  $dia["toVisit"]           ="访问";
  $dia["toView"]            ="浏览";
  $dia["toWatch"]           ="观看";
  $dia["toListen"]          ="聆听";
  $dia["toPrint"]           ="打印";
  $dia["toUpload"]          ="上传";
  $dia["toCut"]             ="剪切";
  $dia["toCopy"]            ="复制";
  $dia["toPaste"]           ="粘贴";
  $dia["toMove"]            ="移动";
  $dia["toDelete"]          ="删除";
  $dia["toChmod"]           ="修改属性";
  $dia["toSearch"]          ="搜索";
  $dia["toRename"]          ="重命名";
  $dia["toComment"]         ="评论";
  $dia["toValid"]           ="应用";
  $dia["toEdit"]            ="编辑";
  $dia["toModify"]          ="修改";
  $dia["toZip"]             ="压缩";
  $dia["toDezip"]           ="解压";
  $dia["toRecover"]         ="恢复";
  $dia["toConnect"]         ="连接";
  $dia["toQuit"]            ="退出";
  $dia["toVerify"]          ="Verify";
  $dia["toReplace"]         ="Replace";
  $dia["choose"]            ="Choose...";

  // Chargement de fichier
  $dia["addUpload"]         ="添加文件";
  $dia["startUpload"]       ="开始上传";
  $dia["limitTaille"]       ="服务器所允许的最大上传文件大小 ";
  $dia["ifFileExist"]       ="如果文件已存在：";
  $dia["replaceFile"]       ="替换";
  $dia["renameFile"]        ="重命名";
  $dia["cancelFile"]        ="取消";
  $dia["waitingDownload"]   ="等待上传";
  $dia["problemDownload"]   ="文件上传存在问题";
  $dia["prohibited"]        ="你没有权限修改这个文件。";
  $dia["downloading"]       ="上传进度";
  $dia["uploading"]         ="上传进度";
  $dia["started"]           ="开始";
  $dia["success"]           ="上传成功";
  $dia["tempNotSet"]        ="未设定临时文件夹";
  $dia["withSuccess"]       ="成功";
  $dia["uploaded"]          ="上传。";
  $dia["succesUpload"]      ="上传成功";
  $dia["cantOpen"]          ="无法打开文件 ";
  $dia["cantWrite"]         ="无法写入文件 ";
  $dia["fileTooBig"]        ="文件大小超过允许的限制。";
  $dia["wait"]              ="等待";

  // Creation de nouveaux elements
  $dia["newFile"]           ="新文件";
  $dia["newDir"]            ="新文件夹";
  $dia["newTxt"]            ="新文本";
  $dia["newLink"]           ="新链接";
  $dia["making"]            ="创建";
  $dia["areYouSure"]        ="你确定你想要 ";
  $dia["toDisconnect"]      ="disconnect ?";
  $dia["addTxt"]            ="请输入新文本的名称：";
  $dia["addDir"]            ="请输入新文件夹的名称：";
  $dia["addNew"]            ="新增";
  $dia["addLink"]           ="输入名称 ";
  $dia["addLink2"]          ="和新链接地址：";
  $dia["dirCreate"]         ="创建文件夹";
  $dia["txtCreate"]         ="创建文本文件";
  $dia["linkCreate"]        ="建立链接";
  $dia["linkTo"]            ="链接到";
  $dia["created"]           ="创建";
  $dia["theNewDir"]         ="新文件夹";
  $dia["theNewLink"]        ="新链接";
  $dia["theNewTxt"]         ="新文本文件";

  // Reponses
  $dia["File"]              ="文件";
  $dia["rep"]               ="文件夹";
  $dia["dir"]               =" 文件夹";
  $dia["file"]              =" 文件";
  $dia["ofDir"]             ="文件夹";
  $dia["ofFile"]            ="文件";
  $dia["onFile"]            ="于文件";
  $dia["theDir"]            ="文件夹";
  $dia["theFile"]           ="文件";
  $dia["element"]           ="内容";
  $dia["hasBeen"]           ="已";
  $dia["hasNotBeen"]        ="未";
  $dia["hasFailed"]         ="失败";
  $dia["successful"]        ="成功";
  $dia["dezipping"]         ="解压文件。";
  $dia["dezipped"]          ="已解压。";
  $dia["startEdit"]         ="开始编辑文件 ";
  $dia["endEdit"]           ="停止编辑文件 ";
  $dia["confirmEdit"]       ="已编辑并保存";
  $dia["savingDocument"]    ="保存文档 ";
  $dia["savingDirContent"]  ="保存文件夹内容 ";
  $dia["savingFile"]        ="保存文件 ";
  $dia["backgAdded"]        ="图片已添加到背景";
  $dia["backgRemoved"]      ="背景已移除";


  // Renommage / Deplacement / Suppression
  $dia["rename"]            ="输入一个新名称 ";
  $dia["renaming"]          ="重命名中";
  $dia["renamed"]           ="更名";
  $dia["confirmSup"]        ="确定删除此文件关联？";
  $dia["delete"]            ="你确定删除 ";
  $dia["delete2"]           ="和相关内容";
  $dia["deleting"]          ="删除中";
  $dia["deleted"]           ="删除";
  $dia["theRemove"]         ="移动";
  $dia["copyOf"]            ="Copy-of-";
  $dia["onlyCopy"]          ="已经复制。";
  $dia["fileExist"]         ="已存在相同名称的文件";
  $dia["goingToCopy"]       ="将要复制，请选择目标文件夹";
  $dia["goingToMove"]       ="将要移动，请选择目标文件夹";
  $dia["moving"]            ="移动中";
  $dia["moved"]             ="移动";
  $dia["fileEditing"]       ="编辑中";
  $dia["copying"]           ="正在复制";
  $dia["copyingFile"]       ="复制到目标文件夹";
  $dia["copied"]            ="复制";
  $dia["toActualDir"]       ="到当前文件夹";
  $dia["typeOfElement"]     ="文档";
  $dia["copyTo"]            ="复制";
  $dia["moveTo"]            ="移动";
  $dia["prohibCar"]         ="禁止使用的符号 ( ? < > : # % + '' ' | & * / )";
  $dia["alreadyExist"]      ="这个文件或文件夹已存在，请输入一个新名称。";
  $dia["confirmReplace"]    ="这个文件或文件夹已存在，如果你确认，它将被替换";
  $dia["modeDefault"]       ="Default mode";
  $dia["modePreview"]       ="Preview mode";
  $dia["lineNumbers"]       ="View line numbers";
  $dia["colorMode"]         ="Syntax highlighting";
  $dia["includeSubDir"]     ="Include subdirectories ?";
  $dia["modifyingPrefs"]    ="Modifying settings";
  
  // Gestion des droits
  $dia["modifyPermission"]  ="修改属性";
  $dia["noPermission"]      ="你没有权限修改这一类型的文件";
  $dia["noOperation"]       ="禁止此操作";
  $dia["modifying"]         ="修改属性";
  $dia["fileAttributes"]    ="文件属性";
  $dia["cantModify"]        ="不能修改。";
  $dia["modify"]            ="已修改。";
  $dia["modified"]          ="修改";
  $dia["readWrite"]         ="读-写";
  $dia["readOnly"]          ="只读";
  $dia["writeOnly"]         ="只写";
  $dia["locked"]            ="锁定文件";
  $dia["selectAttributes"]  ="属性";
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


  // Propriete / Recherche
  $dia["property"]          ="信息";
  $dia["propertyOf"]        ="信息";
  $dia["searchIn"]          ="搜索";
  $dia["search"]            ="输入名称";
  $dia["search2"]           ="对文件或文件夹搜索";
  $dia["searching"]         ="搜索";
  $dia["searching2"]        ="正在进行中";
  $dia["useCasse"]          ="区分大小写？";
  $dia["foundIn"]           ="在";
  $dia["into"]              ="到";
  $dia["and"]               ="和";
  $dia["by"]                ="by";
  $dia["viewed"]            ="Viewed";
  $dia["times"]             ="times";
  $dia["elementsFound"]     ="个相关内容被找到";
  $dia["noResult"]          ="未找到文件";

  // Tri des elements
  $dia["sortFile"]          ="排列文件";
  $dia["byName"]            ="名称";
  $dia["byValue"]           ="价值";
  $dia["byType"]            ="类型";
  $dia["bySize"]            ="大小";
  $dia["byDate"]            ="时间";
  $dia["byPerso"]           ="个性";
  $dia["webSort"]           ="默认排列";
  $dia["ascending"]         ="Ascending";
  $dia["descending"]        ="Descending";
  
  // Commentaires
  $dia["comment"]           ="评论";
  $dia["commentAdded"]      ="评论已添加";
  $dia["commentsAdded"]     ="评论已添加";
  $dia["commentNotAdded"]   ="评论未添加";
  $dia["addComment"]        ="添加评论";
  $dia["modifyComment"]     ="Modify comment";
  $dia["removeComment"]     ="Remove comment";
  $dia["addingComment"]     ="正在添加评论";
  $dia["commentFile"]       ="评论文件";
  $dia["messageOf"]         ="消息";

  // Menu Images
  $dia["previous"]          ="上一幅";
  $dia["next"]              ="下一幅";
  $dia["zoomp"]             ="放大 +";
  $dia["zoomm"]             ="缩小 -";
  $dia["zooms"]             ="原始大小";
  $dia["diaporama"]         ="自动播放";
  $dia["refreshMini"]       ="刷新缩略图";
  $dia["rotate90"]          ="向右旋转90度";
  $dia["rotate180"]         ="旋转180度";
  $dia["rotate270"]         ="向左旋转90度";
  $dia["flipV"]             ="垂直翻转";
  $dia["flipH"]             ="水平翻转";
  $dia["resize"]            ="重设大小";
  $dia["keepRatio"]         ="保持长宽比？";
  $dia["width"]             ="宽度";
  $dia["height"]            ="长度";
  $dia["pixels"]            ="像素";

  // Infos EXIF
  $dia["cliche"]            ="图片";
  $dia["object"]            ="文件";
  $dia["infocomment"]       ="评论";
  $dia["FileSize"]          ="文件大小";
  $dia["DateTimeOriginal"]  ="初始日期时间";
  $dia["resolution"]        ="解析度";
  $dia["XResolution"]       ="DPI";
  $dia["Software"]          ="软件";
  $dia["Photographer"]      ="摄影师";
  $dia["ExposureTime"]      ="曝光时间";
  $dia["ApertureFNumber"]   ="光圈F值";
  $dia["MaxApertureValue"]  ="最大光圈值";
  $dia["ISOSpeedRatings"]   ="ISO速度级别";
  $dia["FocalLength"]       ="焦距";
  $dia["ExposureBiasValue"] ="曝光偏差值";
  $dia["LightSource"]       ="光源";
  $dia["Flash"]             ="闪光";

  // Envoi d'emails
  $dia["authSendMail"]      ="同意通过电子邮件发送内容";
  $dia["sendMail"]          ="发送电子邮件";
  $dia["titleMail"]         ="消息标题";
  $dia["recipientMail"]     ="显示收件人地址";
  $dia["contentMail"]       ="输入你的消息";
  $dia["sendMailConfirm"]   ="发送你的消息";
  $dia["sendMailOK"]        ="消息已发送。";
  $dia["sendMailProblem"]   ="消息未发送。";

  // Corbeille
  $dia["corbeille"]         ="回收站";
  $dia["binNoElement"]      ="回收站是空的";
  $dia["binContain"]        ="回收站中有垃圾";
  $dia["emptyBin"]          ="清空回收站";
  $dia["emptyBinConfirm"]   ="你一定要清空回收站？";
  $dia["emptyConfirm"]      ="你确定要删除这一内容？";
  $dia["emptyBinResult"]    ="回收站已清空。";
  $dia["viewElements"]      ="查看所有内容";
  $dia["emptyElements"]     ="清空所有内容，当超过";
  $dia["activeBin"]         ="为这个共享文件夹启用回收站";
  $dia["restoreElement"]    ="Restore element";
  $dia["finally"]           =" finally";

  // Gestion des versions
  $dia["version"]           ="Version ";
  $dia["viewAllVersion"]    ="View all versions";
  $dia["addNewVersion"]     ="Add a new version";
  
  // Favoris
  $dia["favoris"]           ="书签";
  $dia["addFav"]            ="添加到书签";
  $dia["removeFav"]         ="从书签中移除";
  $dia["handleFav"]         ="管理书签";
  $dia["viewFav"]           ="查看所有书签";
  $dia["favAdded"]          ="The file has been added to bookmarks";
  $dia["favRemoved"]        ="The file has been removed from bookmarks";
  
  // Tests des partages
  $dia["shareTest"]         ="点击测试设置";
  $dia["shareOK"]           ="这个文件夹可读，且拥有足够的权限";
  $dia["shareProtected"]    ="这个文件夹可读，但没有有足够的权限";
  $dia["shareNotAcc"]       ="根目录不存在或无法显示";
  $dia["shareFtpNotAcc"]    ="不能连接到FTP服务器";
  $dia["shareFtpBadLogin"]  ="FTP服务器返回错误信息，请确认用户名和密码是正确。";
  $dia["shareFtpError"]     ="FTP服务器返回一个未知错误。";
  $dia["shareFtpcantMount"] ="FTP服务器挂载点不可用。";
  $dia["shareFtpProtected"] ="FTP服务器挂载点没有足够权限。";
  $dia["shareFtpOK"]        ="连接FTP服务器、测试共享文件夹成功。";
  $dia["shareAvailable"]    ="New users can access this shared folder.";

  // Administration
  $dia["adminTitle"]        ="用户和服务管理";
  $dia["adminHeader"]       ="网站管理";
  $dia["msgFooter"]         ="WebShare基于GPL许可";
  $dia["adminAlert1"]       ="产生了一个技术问题，更改未生效。";
  $dia["adminAlert2"]       ="更改已生效。";
  $dia["notActiv"]          ="这个选项未核实。";
  $dia["confirmation"]      ="确认";
  $dia["dialConfirm"]       ="确认？";
  $dia["importToBase"]      ="Import configuration file into database";
  $dia["importSuccessful"]  ="Import to database successful.";
  $dia["importFailed"]      ="Import to database failed.";

  // Panneau Partages
  $dia["adminRub2"]         ="共享";
  $dia["serverAdmin"]       ="共享与虚拟文件夹管理";
  $dia["newServer"]         ="新共享文件夹";
  $dia["msgInfo1"]          ="注意：还没有启用FTP连接。";
  $dia["msgInfo2"]          ="警告：路径及文件名只能包含字母（大写或小写）与数字。";
  $dia["msgInfo3"]          ="不允许使用标点符号及空格。";
  $dia["msgInfo4"]          ="Warning : The administration folder MUST be renamed to protect your installation.";
  $dia["chooseUser"]        ="选择用户删除";
  $dia["createUser"]        ="建立或修改一个用户，然后应用";
  $dia["chooseServer"]      ="选择服务器删除";
  $dia["createServer"]      ="创建或修改服务器，然后应用";
  $dia["selectServer"]      ="Select at least a server then validate";
  $dia["FTP"]               ="FTP";
  $dia["local"]             ="本地";
  $dia["serverFtp"]         ="服务器（FTP）";
  $dia["loginFtp"]          ="登录名（FTP）";
  $dia["passFtp"]           ="密码（FTP）";
  $dia["portFtp"]           ="端口（FTP）";
  $dia["shareRoot"]         ="Root";
  $dia["serverRoot"]        ="服务器路径";
  $dia["virtualRoot"]       ="虚拟路径";
  $dia["defaultRoot"]       ="默认文件夹";
  $dia["protectRep"]        ="用于保护文件夹的文件：";
  $dia["modeDegrade"]       ="Degraded mode";

  // Panneau Utilisateur
  $dia["adminRub1"]         ="用户";
  $dia["userAdmin"]         ="用户管理";
  $dia["newUser"]           ="新用户";
  $dia["administrator"]     ="管理员";
  $dia["email"]             ="Email";
  $dia["lang"]              ="语言";
  $dia["user"]              ="普通用户";
  $dia["group"]             ="群组";
  $dia["name"]              ="昵称";
  $dia["login"]             ="登录名";
  $dia["passwd"]            ="密码";
  $dia["confirmation"]      ="确认";
  $dia["connexion"]         ="连接";
  $dia["default"]           ="浏览";
  $dia["explore"]           ="查看";
  $dia["visualis"]          ="风格";
  $dia["leftPanel"]         ="默认面板";
  $dia["webSort"]           ="默认排列";
  $dia["webDir"]            ="Web文件夹预览";
  $dia["nameShare"]         ="共享";
  $dia["access"]            ="允许共享";
  $dia["select"]            ="选择";
  $dia["open"]              ="打开";
  $dia["menuContext"]       ="菜单";
  $dia["leftClic"]          ="左键打击：";
  $dia["rightClic"]         ="右键单击：";
  $dia["doubleClic"]        ="双击:";
  $dia["toModify"]          ="修改";
  $dia["toCreate"]          ="创建";
  $dia["toRead"]            ="读取";
  $dia["regexp"]            ="(新增内容请用|分隔 ) :";
  $dia["filterElement"]     ="过滤关键字";
  $dia["recoExtension"]     ="以下扩展名是可用的";
  $dia["sessionTime"]       ="Session duration (min)";
  $dia["serverBase"]        ="mySQL服务器";
  $dia["actionAuth"]        ="用户拥有以下权限：";
  $dia["userType"]          ="Type";
  $dia["createNewAccount"]  ="Create a new user account";
  $dia["chooseAccount"]     ="Choose the user account to open :";

  // Panneau Preferences
  $dia["adminRub3"]         ="偏好";
  $dia["prefAdmin"]         ="偏好管理";
  $dia["baseAdmin"]         ="数据库管理";
  $dia["memoMax"]           ="允许用于脚本的内存";
  $dia["execMax"]           ="Life duration for scripts ";
  $dia["postMax"]           ="数据传送大小限制";
  $dia["uploMax"]           ="上传大小限制";
  $dia["lifeMax"]           ="Life duration";
  $dia["timeMax"]           ="Life duration for uploads ";
  $dia["previewWeb"]        ="启用网站预览";
  $dia["previewAct"]        ="启用缩略图";
  $dia["previewPDF"]        ="启用PDF文件预览";
  $dia["logAct"]            ="启用日志";
  $dia["sepAdr"]            ="地址分隔符";
  $dia["alwaysConfirm"]     ="确认没想操作";
  $dia["effectAct"]         ="启动图形特效";
  $dia["completePath"]      ="浏览完整路径";
  $dia["frameTitle"]        ="窗口标题";
  $dia["viewClock"]         ="显示时间";
  $dia["diapoSpeed"]        ="Diaporama speed";
  $dia["diapoStop"]         ="Stop diaporama";
  $dia["arboLink"]          ="于文件树显示链接";
  $dia["activeMini"]        ="启用缩略图";
  $dia["dynWindow"]         ="动态窗口";
  $dia["serverBase"]        ="mySQL服务器";
  $dia["loginBase"]         ="mySQL登录名";
  $dia["passBase"]          ="mySQL密码";
  $dia["tableBase"]         ="选择表";
  $dia["myPref"]            ="My preferences";
  $dia["privateWS"]         ="Private share";
  $dia["publicWS"]          ="Public share";
  $dia["accountUser"]       ="Users can create their own account";
  
  // Panneau Infos
  $dia["adminRub5"]         ="信息";
  $dia["infoAdmin"]         ="安装信息摘要";
  $dia["theExt"]            ="扩展";
  $dia["activated"]         ="已启用";
  $dia["notActivated"]      ="未启用";
  $dia["libZip"]            ="(ZIP文件管理器)";
  $dia["libGD"]             ="(图像及缩略图管理器)";
  $dia["libMB"]             ="(特殊字符管理器)";
  $dia["libXslt"]           ="(转换Xslt管理器)";
  $dia["libFTP"]            ="(连接远程FTP)";
  $dia["libPdf"]            ="(PDF缩略图管理器)";
  $dia["libMail"]           ="(使用电子邮件发送内容)";
  $dia["libExif"]           ="(显示Exif信息)";
  $dia["dontExist"]         ="不存在。";
  $dia["notAccessible"]     ="不存在或无法读取。";
  $dia["accessProtect"]     ="存在但无法读取。";
  $dia["isAccessible"]      ="存在且可读。";
  $dia["modulesDetected"]   ="已检测到，已加载以下模块：";
  $dia["langDetected"]      ="已检测到，已加载以下语言：";
  $dia["styleDetected"]     ="已检测到，已加载以下主题：";
  $dia["cgiUpNotDetected"]  ="未检测到。";
  $dia["cgiUpLimited"]      ="已检测到，但没有足够的权限。";
  $dia["cgiUpDetected"]     ="已检测到，并拥有足够的权限。";
  $dia["unlimitedUpload"]   ="你上传文件没有大小限制。";
  $dia["alertfunction1"]    ="服务器配置似乎存在某些限制，";
  $dia["alertfunction2"]    ="Webshare的一些特性可能会受到限制。";
  $dia["alertfunction3"]    ="This feature is available only when Webshare is connected to a database.";
  $dia["msgVarNotModif1"]   ="Webshare不能修改这些值。有关这个问题, ";
  $dia["msgVarNotModif2"]   ="可以直接修改文件'php.ini'的参数。";
  $dia["msgVarModifiable1"] ="如果你遇到问题，可以直接修改这些值";
  $dia["msgVarModifiable2"] ="在Webshare中。 ";
  $dia["tip1"]              ="每个脚本有";
  $dia["tip2"]              ="秒上传时间限制";
  $dia["propProcess"]       ="Ownership of the Webshare (PHP) process ";
  $dia["limitProcess"]      ="This process has limited rights.";

  // Panneau Associations
  $dia["adminRub4"]         ="关联";
  $dia["moduAdmin"]         ="模块管理";
  $dia["assoAdmin"]         ="关联管理";
  $dia["extension"]         ="扩展名";
  $dia["exttype"]           ="类型";
  $dia["extmime"]           ="Mime";
  $dia["extact1"]           ="默认操作";
  $dia["extact2"]           ="次级操作";
  $dia["toAdd"]             ="添加";
  $dia["newStyle"]          ="添加一个先主题";
  $dia["newModule"]         ="添加一个新模块";
  $dia["updateWS"]          ="最新版本";
  $dia["noVersionAv"]       ="没有新版本";
  $dia["newVersionAv"]      ="有新版本可用";

  // Panneau Logs
  $dia["adminRub6"]         ="日志";
  $dia["logsAdmin"]         ="日志浏览器";
  $dia["notConnected"]      ="连接到数据库失败，请输入正确参数。";
  $dia["connectedDB"]       ="连接到数据库并开始运作。";
  $dia["msgBase"]           ="配置数据库不是必需的, 但无法启用后续功能（日志）";
  $dia["noLog"]             ="日志不详";
  $dia["all"]               ="所有";
  $dia["allf"]              ="所有";
  $dia["resultInd"]         ="Neutral";
  $dia["resultPos"]         ="Positif";
  $dia["resultNeg"]         ="Negatif";
  $dia["noLogs"]            ="没有操作。";
  $dia["viewAction"]        ="浏览操作：";
  $dia["madeBy"]            ="操作者";
  $dia["withResult"]        ="结果";
  $dia["fromDate"]          ="从";
  $dia["toDate"]            ="到";
  $dia["ofDate"]            ="浏览日期";
  $dia["day"]               ="日";
  $dia["days"]              ="天";

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
  $_SESSION["ws"]["dia"]["noConf"]  ="No account server or <br/>user was detected. <br/><br/>Go to the <a href='admin/index.php' style='text-decoration:underline'>administration panel</a><br/>to configure your accounts. <br/><br/>Consult documentation <br/>for more information.<br/><br/>";
  $_SESSION["ws"]["dia"]["noServer"]="No account server was detected. <br/><br/>Go to the <a href='admin/index.php' style='text-decoration:underline'>administration panel</a><br/>to configure your accounts. <br/><br/>Consult documentation <br/>for more information.<br/><br/><br/>";
  $_SESSION["ws"]["dia"]["noUser"]  ="No account user was detected. <br/><br/>Go to the <a href='admin/index.php' style='text-decoration:underline'>administration panel</a><br/>to configure your accounts. <br/><br/>Consult documentation <br/>for more information.<br/><br/><br/>";
  $_SESSION["ws"]["dia"]["noJS"]    ="JavaScript has not been <br/>detected on your browser. <br/><br/>Activate Javascript or choose <br/>a more recent navigator<br/>to use Webshare.<br/><br/>";
  $_SESSION["ws"]["dia"]["protect1"]="You enter WebShare administration for the first time. To protect your installation, you must define a login and a password that will be asked systematically during your next access.<br/><br/>";
  $_SESSION["ws"]["dia"]["protect2"]="* Password fields must match to check their validity.<br/>Enter only alphanumeric characters in the fields.<br/>To change your login later, edit file .htaccess located in the administration folder.<br/><br/>";

  }
?>
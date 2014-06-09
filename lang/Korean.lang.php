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
// Fonction : Fichier de traduction version anglaise
// Nom      : Korean.lang.php
// Version  : 0.8.2
// Date     : 21/02/08
// =======================================================================
// Text encoding: UTF-8/UNIX(LF)

  if (isset($_REQUEST["name"])&&(intval($_REQUEST["name"])==1))
    $nameLanguage      ="Korean - &#xd55c;&#xad6d;&#xc5b4;"; else {
  
  $listeMois= array("","1월.","2월.","3월","4월","5월","6월","7월","8월.","9월","10월","11월","12월");
  $listeJour= array("","Mon"=>"월요일","Tue"=>"화요일","Wed"=>"수요일","Thu"=>"목요일","Fri"=>"금요일","Sat"=>"토요일","Sun"=>"일요일");

  $dia= array();

  // Panneau de login
  $dia["ident"]             ="로그인 해주세요 :";
  $dia["cantIdent"]         ="로그인 오류.";
  $dia["identProblem1"]     ="서버 접속 불가.";
  $dia["identProblem2"]     ="기술적인 문제 발생.";
  $dia["identProblem3"]     ="Connection to LDAP server could not be established.";
  $dia["enter"]             ="엔터";

  // Interface
  $dia["loading"]           ="로딩중";
  $dia["actualDir"]         ="현재 폴드 : ";
  $dia["connected"]         ="현재 접속자 ";
  $dia["directLink"]		="다이렉트 링크";
  $dia["filePreview"]       ="파일 미리보기";
  $dia["pictPreview"]       ="그림 미리보기";
  $dia["webPreview"]        ="열기 ";
  $dia["niveauSup"]         ="위로";
  $dia["closePanel"]        ="패널 닫기";
  $dia["picTooBig"]         ="그림 사이즈가 너무 큽니다.";
  $dia["previousPage"]   	="이전 페이지";
  $dia["nextPage"]          ="Next page";
  $dia["upDir"]   			="위로";
  $dia["updateDir"]			="새로고침";
  $dia["changeStyle"]       ="스타일 선택";
  $dia["refreshTree"]       ="새로고침";
  $dia["hideTree"]          ="폴드트리 접기";
  $dia["showTree"]          ="폴드트리 펼침";
  $dia["printGallery"]		="갤러리 인쇄";
  $dia["renameAll"]         ="Rename all";
  $dia["saveAll"]  			="모두 저장";
  $dia["savePic"]	  		="저장하기";
  $dia["webSite"]           ="웹사이트";
  $dia["affichage"]         ="보기 설정";
  $dia["expPanel"]          ="패널 보기";
  $dia["background"]  		="웹셰어 배경으로";
  $dia["miniature"]   		="썸네일로";
  $dia["bigIcone"]   		="큰아이콘";
  $dia["liste"] 	 		="목록으로";
  $dia["details"]   		="자세하게";
  $dia["none"] 		  		="패널 숨김";
  $dia["arbo"]		  		="패널 보기";
  $dia["closeWindow"]		="닫기";
  $dia["viewContent"]       ="컨탠츠 보기";
  $dia["changeUser"]        ="Change user";
  $dia["onlineHelp"]        ="온라인 도움말";
  $dia["rapport"]           ="버그 보고하기";
  $dia["options"]   		="옵션";
  $dia["contact"]   		="연락";
  $dia["about"]     		="";
  $dia["total"]             ="사용량";
  $dia["used"]              ="Used";
  $dia["free"]              ="총용량";
  $dia["octet"]             ="b";
  $dia["selectAll"]         ="모두 선택";
  $dia["select"]            ="선택";
  $dia["unselect"]          ="해제";
  $dia["expression"]        ="expression";
  $dia["inAllFiles"]        ="in each filenames";
  $dia["distribGPL"]        ="Distributed under GPL license";
  $dia["moreInfos"]         ="For any information or support, visit the official website.";
  $dia["websiteAdr"]        ="en.webshare.fr";
  
  // Verbes / actions
  $dia["openFile"]   		="열기";
  $dia["openFileWith"] 		="로 열기";
  $dia["saveFile"] 			="저장하기";
  $dia["toExplore"]  		="익스플로러";
  $dia["toBrowse"]   		="브라우저";
  $dia["toVisit"]   		="방문하기";
  $dia["toView"]    		="보기";
  $dia["toWatch"]   		="지켜보기";
  $dia["toListen"] 	  		="듣기";
  $dia["toPrint"]  	 		="인쇄하기";
  $dia["toUpload"] 	 		="업로드";
  $dia["toCut"]   			="잘라내기";
  $dia["toCopy"]   			="복사하기";
  $dia["toPaste"]   		="붙여넣기";
  $dia["toMove"]            ="이동하기";
  $dia["toDelete"]  		="삭제하기";
  $dia["toChmod"]    		="권한 설정";
  $dia["toSearch"]  		="검색하기";
  $dia["toRename"]   		="이름변경";
  $dia["toComment"]   		="코멘트";
  $dia["toValid"]  	    	="저장하기";
  $dia["toEdit"]   			="편집하기";
  $dia["toModify"]  		="수정하기";
  $dia["toZip"]			    ="압축하기";
  $dia["toDezip"]			="압축풀기";
  $dia["toRecover"]  		="복구하기";
  $dia["toConnect"]  		="접속하기";
  $dia["toQuit"]	  		="끝내기";
  $dia["toVerify"]          ="점검하기";
  $dia["toReplace"]         ="Replace";
  $dia["choose"]            ="Choose...";

  // Chargement de fichier
  $dia["addUpload"]         ="파일 추가";
  $dia["startUpload"]       ="업로드 시작";
  $dia["limitTaille"]      	="서버의 최대 업로드 파일 크기는 ";
  $dia["ifFileExist"]       ="파일이 존재 하면 :";
  $dia["replaceFile"]       ="대체하기";
  $dia["renameFile"]        ="이름변경";
  $dia["cancelFile"]        ="취소하기";
  $dia["waitingDownload"]   ="업로드 대기중";
  $dia["problemDownload"]   ="파일 업로드 도중 문제 발생";
  $dia["prohibited"]		="권한이 없습니다.";
  $dia["downloading"]       ="다운로드 진행중";
  $dia["uploading"]         ="업로드 진행중";
  $dia["started"]           ="시작됨.";
  $dia["success"]           ="성공적으로 업로드 되었습니다.";
  $dia["tempNotSet"] 		="임시 폴드 불확정";
  $dia["withSuccess"]       ="성공!";
  $dia["uploaded"]          ="업로드됨.";
  $dia["succesUpload"]      ="성공적으로 업로드 됨.";
  $dia["cantOpen"]          ="파일을 열 수 없음 ";
  $dia["cantWrite"]         ="파일을 작성할 수 없음 ";
  $dia["fileTooBig"]    	="파일 크기가 허용된 크기를 초과했습니다.";
  $dia["wait"]              ="대기중";

  // Creation de nouveaux ?ements
  $dia["newFile"] 			="파일 업로드";
  $dia["newDir"]   			="새 폴드 생성";
  $dia["newTxt"]   			="새 문서 생성";
  $dia["newLink"]  			="새 링크 생성";
  $dia["making"]            ="생성중";
  $dia["areYouSure"]        =" 실행 하시겠습니까 ";
  $dia["toDisconnect"]      ="disconnect ?";
  $dia["addTxt"]            ="새로운 빈 텍스트 문서의 이름을 입력해주세요 :";
  $dia["addDir"]            ="새로운 폴드의 이름을 입력해주세요 :";
  $dia["addNew"]            ="새로 추가";
  $dia["addLink"]           ="이름 입력 ";
  $dia["addLink2"]          ="링크 주소 :";
  $dia["dirCreate"]         ="폴드 생성";
  $dia["txtCreate"]         ="빈 문서 생성";
  $dia["linkCreate"]        ="링크 생성";
  $dia["linkTo"]            ="로 링크";
  $dia["created"]           ="생성됨.";
  $dia["theNewDir"]         ="새 폴드 생성";
  $dia["theNewLink"]        ="새 링크 생성";
  $dia["theNewTxt"]         ="새 문서 생성";

  // R?onses
  $dia["File"]              ="파일";
  $dia["rep"]               ="폴드";
  $dia["dir"]               =" 폴드";
  $dia["file"]              =" 파일";
  $dia["ofDir"]             =" 폴드 ";
  $dia["ofFile"]            =" 파일 ";
  $dia["onFile"]            =" 파일에서 ";
  $dia["toDir"]             =" 폴드 ";  
  $dia["toFile"]            =" 파일 "; 
  $dia["theDir"]            ="폴드 ";
  $dia["theFile"]           ="파일 ";
  $dia["element"]           ="대상";
  $dia["hasBeen"]           ="가(이) ";
  $dia["hasNotBeen"]        ="가(이) 않음";
  $dia["hasFailed"]         ="실패함";
  $dia["successful"]        ="성공적으로 완료됨.";
  $dia["dezipping"]      	="비압축 파일.";
  $dia["dezipped"]          ="압축되지 않음";
  $dia["startEdit"]     	="파일 편집 시작 ";
  $dia["endEdit"]       	="파일 편집 중지 ";
  $dia["confirmEdit"]       ="편집 저장됨.";
  $dia["savingDocument"]    ="문서 저장중 ";
  $dia["savingDirContent"]  ="폴드의 컨탠츠 저장중 ";
  $dia["savingFile"]        ="파일 저장중 ";
  $dia["backgAdded"]   		="그림이 배경으로 추가됨.";
  $dia["backgRemoved"] 		="배경 그림이 제거됨.";


  // Renommage / D?lacement / Suppression
  $dia["rename"]            ="새 이름 입력 ";
  $dia["renaming"]      	="이름 변경중";
  $dia["renamed"]           ="이름 변경됨.";
  $dia["confirmSup"]  		="이 파일 association 삭제를 승인하시겠습니까?";
  $dia["delete"]            =" 정말 삭제하시겠습니까";
  $dia["delete2"]           ="그리고 컨탠츠도 삭제하시겠습니까?";
  $dia["deleting"]        	="삭제중";
  $dia["deleted"]           ="삭제됨.";
  $dia["theRemove"]         ="제거";
  $dia["copyOf"]            ="의 복사";
  $dia["onlyCopy"]			="하지만 복사되어졌습니다.";
  $dia["fileExist"]         ="와 같은 이름의 파일이 이미 존재합니다.";
  $dia["goingToCopy"]       ="를(을)복사하려 합니다, 저장할 폴드로 가서 붙여넣기 하세요.";
  $dia["goingToMove"]       ="를(을) 이동하려 합니다, 이동할 폴드로 가서 붙여넣기 하세요.";
  $dia["moving"]        	="이동중 ";
  $dia["moved"]             ="이동됨.";
  $dia["fileEditing"]		="편집중 ";
  $dia["copying"]        	="복사 진행중 ";
  $dia["copyingFile"]       ="업로드 할 곳으로 파일을 복사중";
  $dia["copied"]            ="복사됨.";
  $dia["toActualDir"]       ="현재 폴드";
  $dia["typeOfElement"]     ="문서 ";
  $dia["copyTo"]            ="복사하기";
  $dia["moveTo"]            ="이동하기";
  $dia["prohibCar"]      	="금지된 기호 입력함. 제거되었음. ( ? < > : # % + '' ' | & * / )";
  $dia["alreadyExist"]     	="이 파일 또는 폴드가 이미 존재합니다, 새 이름을 입력해주세요.";
  $dia["confirmReplace"]    ="이 파일 또는 폴드가 이미 존재합니다, 만약 승인하면 대체 될 것입니다.";
  $dia["modeDefault"]       ="Default mode";
  $dia["modePreview"]       ="Preview mode";
  $dia["lineNumbers"]       ="View line numbers";
  $dia["colorMode"]         ="Syntax highlighting";
  $dia["includeSubDir"]     ="Include subdirectories ?";
  $dia["modifyingPrefs"]    ="Modifying settings";
  
  // Gestion des droits
  $dia["modifyPermission"]	="권한 수정";
  $dia["noPermission"]    	="파일 형식을 수정할 권한이 없습니다.";
  $dia["noOperation"]    	="이 작동은 허용되지 않았습니다.";
  $dia["modifying"]      	="권한 수정중 ";
  $dia["fileAttributes"]    ="속성 수정 파일";
  $dia["cantModify"]        ="수정 할 수 없습니다.";
  $dia["modify"]            ="수정 되었습니다.";
  $dia["modified"]          ="수정됨. ";
  $dia["readWrite"]         ="읽기-쓰기";
  $dia["readOnly"]          ="읽기 전용";
  $dia["writeOnly"]         ="쓰기 전용";
  $dia["locked"]            ="파일 잠김";
  $dia["selectAttributes"]  ="속성 ";
  $dia["modR"]              ="R(쓰기)";
  $dia["modW"]              ="W(읽기)";
  $dia["modE"]              ="E(실행)";

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

  // Propri?? / Recherche
  $dia["property"] 			="속성 ";
  $dia["propertyOf"]        ="파일 속성";
  $dia["searchIn"]          ="검색어 ";
  $dia["search"]            ="검색어 입력: ";
  $dia["search2"]           ="파일 또는 폴드 검색";
  $dia["searching"]      	="검색";
  $dia["searching2"]     	="진행중인";
  $dia["useCasse"]  		="소,대문자 구분";
  $dia["foundIn"]           ="폴드";
  $dia["into"]              ="폴드";
  $dia["and"]               ="그리고";
  $dia["by"]                ="by";
  $dia["viewed"]            ="Viewed";
  $dia["times"]             ="times";
  $dia["elementsFound"]     =" 대상 찾음.";
  $dia["noResult"]          ="찾은 파일 없음.";

  // Tri des ??ents
  $dia["sortFile"]          ="파일 분류";
  $dia["byName"]  	 		="이름별로";
  $dia["byValue"] 	 		="순서대로";
  $dia["byType"]  	 		="형식별로";
  $dia["bySize"]  	 		="크기별로";
  $dia["byDate"]  			="날짜별로";
  $dia["byPerso"]  			="개인적인";
  $dia["webSort"] 			="기본분류";
  $dia["ascending"]         ="Ascending";
  $dia["descending"]        ="Descending";
  
  // Commentaires
  $dia["comment"]  			="코멘트";
  $dia["commentAdded"]      ="코멘트 추가됨.";
  $dia["commentsAdded"]     =" 코멘트 추가됨. ";
  $dia["commentNotAdded"]   ="코멘트 추가되지 않음.";
  $dia["addComment"]        ="코멘트 추가 ";
  $dia["modifyComment"]     ="Modify comment";
  $dia["removeComment"]     ="Remove comment";
  $dia["addingComment"]     ="코멘트 추가중 ";
  $dia["commentFile"]       ="파일에 코멘트 ";
  $dia["messageOf"]         =" 의 메세지";

  // Menu Images
  $dia["previous"]   		="이전 이미지";
  $dia["next"] 		 		="다음 이미지";
  $dia["zoomp"]  	 		="확대 +";
  $dia["zoomm"]  			="축소 -";
  $dia["zooms"]  			="실제크기";
  $dia["diaporama"]   		="슬라이드쇼";
  $dia["refreshMini"]  		="새로고침";
  $dia["rotate90"]   		="우로 90도 회전";
  $dia["rotate180"]	 		="180도 회전";
  $dia["rotate270"]	 		="좌로 90도 회전";
  $dia["flipV"]  			="수직으로 뒤집기";
  $dia["flipH"]  			="수평으로 뒤집기";
  $dia["resize"]     		="크기 변경 ";
  $dia["keepRatio"]  		="모양 비율 유지?";
  $dia["width"]  			="넓이";
  $dia["height"]  			="높이";
  $dia["pixels"] 	  		="px";

  // Infos EXIF
  $dia["cliche"] 			="이미지";
  $dia["object"] 			="파일";
  $dia["infocomment"] 		="코멘트";
  $dia["FileSize"]          ="파일 크기";
  $dia["DateTimeOriginal"]  ="날짜 시간 원본";
  $dia["resolution"]        ="해상도";
  $dia["XResolution"]       ="DPI";
  $dia["Software"]          ="소프트웨어";
  $dia["Photographer"]      ="포토그라퍼";
  $dia["ExposureTime"]      ="노출 시간";
  $dia["ApertureFNumber"]   ="조리개 F 숫자";
  $dia["MaxApertureValue"]  ="최대 조리개 값";
  $dia["ISOSpeedRatings"]   ="ISO 노출 속도률";
  $dia["FocalLength"]   	="초점 거리";
  $dia["ExposureBiasValue"] ="감도";
  $dia["LightSource"]   	="광원";
  $dia["Flash"]   			="플래시";

  // Envoi d'emails
  $dia["authSendMail"]      ="이메일로 대상 보내기 허용";
  $dia["sendMail"]          ="이메일로 보내기";
  $dia["titleMail"]         ="메세지 제목";
  $dia["recipientMail"]     ="수신자의 메일 주소 표시";
  $dia["contentMail"]       ="메세지 입력";
  $dia["sendMailConfirm"]   ="메세지 보내기";
  $dia["sendingMail"]       ="메세지 전송중";
  $dia["sendMailOK"]        ="메세지가 발송되었습니다.";
  $dia["sendMailProblem"]   ="메세지가 발송되지 않았습니다.";
  $dia["mailSendTitle"]     ="웹셰어에 새 파일을 추가했습니다.";  
  $dia["mailSendFile1"]     ="까꽁^^ 웹셰어에 새 파일이 추가 되었습니다. ";
  $dia["mailSendFile2"]     ="이 파일을 내려받으려면 다음의 링크를 클릭하세요 : ";
  $dia["mailSendFile3"]     ="";
  $dia["mailSendFile4"]     ="좋은 하루 되세요^^.";

  // Corbeille
  $dia["corbeille"]         ="휴지통";
  $dia["binNoElement"]      ="휴지통이 빈 상태입니다.";
  $dia["binContain"]        ="휴지통 포함";
  $dia["emptyBin"]          ="휴지통 비우기";
  $dia["emptyBinConfirm"]   ="휴지통을 비우겠습니까?";
  $dia["emptyConfirm"]      ="정말 삭제하시겠습니까?";
  $dia["emptyBinResult"]    ="휴지통을 비웠습니다.";
  $dia["viewElements"]      ="모든 대상 보기";
  $dia["emptyElements"]     ="모든 대상 비우기 조금더";
  $dia["activeBin"]         ="이 공유 폴드에 대한 휴지통 활성화 ";
  $dia["restoreElement"]    ="Restore element";
  $dia["finally"]           =" finally";

  // Gestion des versions
  $dia["version"]           ="Version ";
  $dia["viewAllVersion"]    ="View all versions";
  $dia["addNewVersion"]     ="Add a new version";

  // Favoris
  $dia["favoris"]   		="북마크";
  $dia["addFav"]            ="북마크 추가";
  $dia["removeFav"]         ="북마크에서 제거";
  $dia["handleFav"]         ="북마크 관리";
  $dia["viewFav"]           ="모든 북마크 보기";
  $dia["favAdded"]          ="The file has been added to bookmarks";
  $dia["favRemoved"]        ="The file has been removed from bookmarks";

  // Tests des partages
  $dia["shareTest"]         ="설정 테스트 클릭.";
  $dia["shareOK"]           ="이 공유 폴드는 이용 가능하고 충분한 권한이 있습니다.";
  $dia["shareProtected"]    ="이 공유 폴드를 이용 가능하지만 권한이 충분하지는 않습니다.";
  $dia["shareNotAcc"]       ="표시된 루트는 이용할 수 없거나 존재하지 않습니다.";
  $dia["shareFtpNotAcc"]    ="FTP 서버 접속이 불가능합니다.";
  $dia["shareFtpBadLogin"]  ="로그인 정보 오류로 FTP 서버가 리턴 되었습니다, 로그인 정보를 확인해주세요.";
  $dia["shareFtpError"]     ="FTP 서버가 알 수 없는 오류로 리턴 되었습니다..";
  $dia["shareFtpcantMount"] ="FTP 서버에 도달할 수 없는 대상지점.";
  $dia["shareFtpProtected"] ="FTP 서버의 대상지점에 충분한 권한이 없습니다.";
  $dia["shareFtpOK"]        ="FTP 서버 접속과 공유폴드 테스트가 성공적입니다.";
  $dia["shareAvailable"]    ="New users can access this shared folder.";

  // Administration
  $dia["adminTitle"]		="사용자 및 서버 관리";
  $dia["adminHeader"]		="웹셰어 설정 관리";
  $dia["msgFooter"]			="웹셰어는 GPL 라이센스를 따릅니다";
  $dia["adminAlert1"]   	="기술적인 문제가 발생, 변경할 수 없습니다.";
  $dia["adminAlert2"]   	="변경 되었습니다.";
  $dia["notActiv"]   		="이 옵션은 아직 실행 불가능합니다.";
  $dia["confirmation"]		="확인";
  $dia["dialConfirm"]		="확인?";
  $dia["adminProtected"]    ="관리자 패널 보호됨";
  $dia["adminNotProtected"] ="관리자 패널이 비보호 상태입니다!";
  $dia["importToBase"]      ="Import configuration file into database";
  $dia["importSuccessful"]  ="Import to database successful.";
  $dia["importFailed"]      ="Import to database failed.";

  // Panneau Partages
  $dia["adminRub2"]			="공유 설정";
  $dia["serverAdmin"]   	="공유 및 가상폴드 관리";
  $dia["newServer"]   		="새 공유 폴드";
  $dia["msgInfo1"] 			="주의 : FTP 연결이 아직 활성화되지 않았습니다..";
  $dia["msgInfo2"]			="주의! : 경로와 파일명은 알파벳 소,대문자와 숫자만 포함해야 합니다.";
  $dia["msgInfo3"]			="구두점과 강조부호, 공백은 허용되지 않습니다.";
  $dia["msgInfo4"]          ="Warning : The administration folder MUST be renamed to protect your installation.";
  $dia["chooseUser"]   		="삭제할 사용자를 선택하세요.";
  $dia["createUser"]   		="사용자 생성 또는 수정후 저장을 하면 그대로 적용이 됩니다.";
  $dia["chooseServer"]		="삭제할 서버를 선택하세요.";
  $dia["createServer"]		="서버 생성 또는 수정후 저장을 하면 그대로 적용이 됩니다.";
  $dia["selectServer"]      ="Select at least a server then validate";
  $dia["FTP"]   			="FTP";
  $dia["local"]   			="로컬";
  $dia["serverFtp"]   		="서버(FTP)";
  $dia["loginFtp"]   		="아이디(FTP)";
  $dia["passFtp"]   		="비밀번호(FTP)";
  $dia["portFtp"]   		="포트(FTP)";
  $dia["shareRoot"]   		="루트";
  $dia["serverRoot"]   		="서버 루트";
  $dia["virtualRoot"]   	="가상 루트";
  $dia["defaultRoot"]   	="기본 폴드";
  $dia["webRoot"]           ="웹 루트";  
  $dia["protectRep"]   		="파일이 있는 새폴드 보호 :";
  $dia["modeDegrade"]   	="강등 모드";
  $dia["protectShare"]      ="공유 폴드는 수정, 변경이 허용되어 있습니다.";  
  $dia["serverType"]        ="유형";
  $dia["serverPosition"]    ="위치";  

  // Panneau Utilisateur
  $dia["adminRub1"]  		="사용자";
  $dia["userAdmin"]   		="사용자 관리";
  $dia["newUser"]   		="사용자 추가";
  $dia["administrator"]   	="관리자";
  $dia["email"]             ="Email";
  $dia["lang"]              ="언어 설정";
  $dia["user"]   			="사용자";
  $dia["group"]   			="그룹";
  $dia["name"]   			="이름";
  $dia["login"]   			="아이디";
  $dia["passwd"]   			="비밀번호";
  $dia["confirmation"]		="확인";
  $dia["connexion"]			="접속";
  $dia["default"]   		="열기";
  $dia["explore"]  			="익스플로러";
  $dia["visualis"] 			="스타일/보기설정";
  $dia["leftPanel"]			="기본 패널";
  $dia["webSort"] 			="기본 분류";
  $dia["webDir"]   			="웹폴드 미리보기";
  $dia["nameShare"]			="공유 ";
  $dia["access"]			="공유 방식 ";
  $dia["select"]   			="선택하기";
  $dia["open"]   			="열기";
  $dia["menuContext"]   	="컨텍스트 메뉴";
  $dia["leftClic"] 			="좌 클릭 :";
  $dia["rightClic"] 		="우 클릭 :";
  $dia["doubleClic"]   		="더블 클릭 :";
  $dia["toModify"]   		="수정하기";
  $dia["toCreate"]   		="생성하기";
  $dia["toRead"]   			="읽기";
  $dia["regexp"]   			="(RegExp > 로 분류리 된 새 표현식 추가 | ) :";
  $dia["filterElement"]		="포함된 필터 요소";
  $dia["recoExtension"]		="다음의 익스텐션 승인됨.";
  $dia["defStyle"]          ="기본 스타일"; 
  $dia["sessionTime"]		="연결 유지(분)";
  $dia["serverBase"]   		="mySQL 서버";
  $dia["actionAuth"]		="사용자 권한 설정 - 사용자는 이용 가능한 대상들에 대해 다음의 실행을 할 수 있습니다 :";
  $dia["userType"]          ="유형";
  $dia["createNewAccount"]  ="Create a new user account";
  $dia["chooseAccount"]     ="Choose the user account to open :";

  // Panneau Pr??ences
  $dia["adminRub3"]			="환경 설정";
  $dia["prefAdmin"]   		="환경 설정 관리";
  $dia["baseAdmin"]   		="데이타베이스 관리";
  $dia["memoMax"]    		="스크립트 메모리 허용 ";
  $dia["execMax"]    		="스크립트 연결 유지 ";
  $dia["postMax"] 	    	="게시물 크기 제한";
  $dia["uploMax"] 	        ="업로드 파일 크기 제한";
  $dia["lifeMax"] 	    	="연결 유지";
  $dia["timeMax"] 	    	="업로드 연결 유지 ";
  $dia["previewWeb"]       	="웹사이트 미리보기 활성화";
  $dia["previewAct"]       	="썸네일 활성화 ";
  $dia["previewPDF"]       	="PDF 파일 미리보기 활성화";
  $dia["logAct"]    		="로그 저장 활성화";
  $dia["sepAdr"]    		="주소 분류 ";
  $dia["alwaysConfirm"]     ="각 실행 승인";
  $dia["effectAct"]    		="그래픽 효과 활성화";
  $dia["completePath"]    	="경로 전체 보기";
  $dia["openLinkinNewWin"]  ="새 창으로 링크 열기";  
  $dia["frameTitle"]  	   	="브라우저 제목";
  $dia["viewClock"]         ="시계 보기";
  $dia["diapoSpeed"]        ="슬라이드쇼 속도";
  $dia["diapoStop"]         ="슬라이드쇼 중지";
  $dia["arboLink"]          ="폴드 트리";
  $dia["activeMini"]        ="썸네일 활성화 ";
  $dia["dynWindow"]         ="다이내믹 윈도우즈";
  $dia["serverBase"]   		="mySQL 서버";
  $dia["loginBase"]   		="mySQL 아이디 ";
  $dia["passBase"]   		="mySQL 비밀번호";
  $dia["tableBase"]   		="DB 유형";
  $dia["myPref"]            ="My preferences";
  $dia["privateWS"]         ="Private share";
  $dia["publicWS"]          ="Public share";
  $dia["accountUser"]       ="Users can create their own account";
  
  // Panneau Infos
  $dia["adminRub5"]			="설치 정보";
  $dia["infoAdmin"]   		="설치 정보 요약 ";
  $dia["theExt"] 	    	="익스텐션";
  $dia["activated"]      	=" - 활성화 됨.";
  $dia["notActivated"] 		=" - 비활성화 됨.";
  $dia["libZip"] 	    	="(Zip 압축 관리)";
  $dia["libGD"]  	      	="(이미지 및 썸네일 관리)";
  $dia["libMB"]     		="(특별 문자 관리)";
  $dia["libXslt"]     		="(보완적인 Xslt 관리)";
  $dia["libFTP"]     		="(원격 FTP 연결)";
  $dia["libPdf"]     		="(PDF 썸네일 관리)";
  $dia["libMail"]     		="(이메일로 대상 보내기)";
  $dia["libExif"]     		="(Exif 사진정보 표시)";
  $dia["dontExist"]         ="- 존재하지 않습니다.";
  $dia["notAccessible"]     ="- 존재하지 않거나 이용할 수 없습니다.";
  $dia["accessProtect"]     ="- 존재하지만 쓰기가 불가능합니다.";
  $dia["isAccessible"]      ="- 존재하며 쓰기가 가능합니다.";
  $dia["modulesDetected"]   ="- 탐색되었고 다음의 모듈들을 포함하고 있습니다 :";
  $dia["langDetected"]      ="- 탐색되었고 다음의 언어들을 포함하고 있습니다 :";
  $dia["styleDetected"]     ="- 탐색되었고 다음의 스타일들을 포함하고 있습니다 :";
  $dia["cgiUpNotDetected"]  ="발견됨.";
  $dia["cgiUpLimited"]      ="- 탐색되었으나 권한이 충분치 않습니다.";
  $dia["cgiUpDetected"]     ="- 탐색되었고 권한이 충분합니다.";
  $dia["unlimitedUpload"]   ="파일 크기 제한없이 업로드 가능합니다.";
  $dia["alertfunction1"]    ="서버 환경에 어떤 제한에 걸려 있는 듯합니다,";
  $dia["alertfunction2"]    ="웹셰어의 어떤 기능은 대개 제한될 것입니다.";
  $dia["alertfunction3"]    ="This feature is available only when Webshare is connected to a database.";
  $dia["msgVarNotModif1"]   ="웹셰어에서는 이러한 값을 수정할 수 없습니다. ";
  $dia["msgVarNotModif2"]   ="서버의 'php.ini'에서 파라메터 디렉토리를 수정하세요.(호스팅 회사에 문의)";
  $dia["msgVarModifiable1"] ="만약 문제가 있으면 위의 값들을 수정하시면 됩니다.";
  $dia["msgVarModifiable2"] ="";
  $dia["tip1"]              ="입력된 값은 각 스크립트의 실행을 제한합니다. ";
  $dia["tip2"]              ="(초)는 스크립트 연결 유지 시간이며, 업로드 파일 크기는";
  $dia["propProcess"]       ="Ownership of the Webshare (PHP) process ";
  $dia["limitProcess"]      ="This process has limited rights.";


  // Panneau Associations
  $dia["adminRub4"]			="파일 관리";
  $dia["moduAdmin"]   		="모듈 관리";
  $dia["assoAdmin"]   		="파일 관리";
  $dia["extension"]         ="확장자";
  $dia["exttype"]           ="분류";
  $dia["extmime"]           ="MIME";
  $dia["extact1"]           ="기본 실행";
  $dia["extact2"]           ="2차 실행";
  $dia["toAdd"]             ="추가";
  $dia["newStyle"]          ="새 스타일 추가";
  $dia["newModule"]         ="새 모듈 추가";
  $dia["updateWS"]          ="어플리케이션 업데이트";
  $dia["noVersionAv"]       ="새 버전이 없습니다";
  $dia["newVersionAv"]      ="새 버전이 있습니다";
  $dia["newVersion"]        ="새 버전 점검";  

  // Panneau Logs
  $dia["adminRub6"]			="로그";
  $dia["logsAdmin"] 		="로그 보기";
  $dia["notConnected"] 		="데이타베이스 연결 실패, DB 관련정보를 정확히 입력해주세요.";
  $dia["connectedDB"] 		="데이타베이스 연결 작동중입니다.";
  $dia["msgBase"]   		="데이타베이스 구성이 필수적인 것은 아니지만 작업 내용에 대한 사후점검 기능이 비활성화 될 것입니다.";
  $dia["noLog"]    			="로그 비활성화";
  $dia["all"]               ="모두";
  $dia["allf"]              ="모두";
  $dia["resultInd"]         ="중립";
  $dia["resultPos"]         ="적극";
  $dia["resultNeg"]         ="소극";
  $dia["noLogs"]            ="이 선택에 대한 실행이 없습니다";
  $dia["viewAction"]        ="실행 보기 :";
  $dia["madeBy"]            ="만든이";
  $dia["withResult"]        ="결과";
  $dia["fromDate"]          ="기간";
  $dia["toDate"]            ="-";
  $dia["ofDate"]            ="날짜 보기";
  $dia["day"]               ="일";
  $dia["days"]              ="일";
  $dia["exploreShare"]      ="공유 검색중";

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
  $_SESSION["ws"]["dia"]["noConf"]  ="서버 계정이 없거나 또는 <br/>사용자 발견됨. <br/><br/>계정을 구성하기 위해<a href='admin/index.php' style='text-decoration:underline'>관리자 패널</a><br/>로 가기. <br/><br/>더 많은 정보를 위한 <br/>참고 문서.<br/><br/>";
  $_SESSION["ws"]["dia"]["noServer"]="서버 계정이 탐색되지 않음. <br/><br/>계정을 구성하기 위해 <a href='admin/index.php' style='text-decoration:underline'>관리자 패널</a><br/>로 가기. <br/><br/>더 많은 정보를 위한 <br/>참고 문서.<br/><br/><br/>";
  $_SESSION["ws"]["dia"]["noUser"]  ="계정 사용자가 발견되지 않음. <br/><br/>계정을 구성하기 위해 <a href='admin/index.php' style='text-decoration:underline'>관리자 패널</a><br/>로 가기. <br/><br/>더 많은 정보를 위한 <br/>참고 문서.<br/><br/><br/>";
  $_SESSION["ws"]["dia"]["noJS"]    ="자바스크립트가 <br/>브라우저에서 지원되지 않음. <br/><br/>더 많은 네비게이터로 <br/>웹셰어를 사용하기 위해<br/>자바스크립트 활성화 또는 선택하기.<br/><br/>";
  $_SESSION["ws"]["dia"]["protect1"]="웹셰어 관리에 처음 접속하셨습니다. 설치를 보호하기 위해선, 앞으로 사용할 관리자의 로그인 아이디와 비밀번호를 설정해야 합니다.<br/><br/>";
  $_SESSION["ws"]["dia"]["protect2"]="* 비밀번호는 반드시 일치해야 합니다.<br/>입력란에는 알파벳 문자만 입력하세요.<br/>나중에 로그인 정보를 변경할려면, administration 폴드의 .htaccess 파일을 열고 수정하면 됩니다.<br/><br/>";

  }
?>
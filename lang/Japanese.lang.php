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
// Fonction : Translation file for Japanese version by Minoru BANDO (minorio at nokosu dot com)
// Nom      : Japanese.lang.php
// Version  : 0.6
// Date     : 30/09/07
// =======================================================================
// Text encoding: UTF-8/UNIX(LF)

  if (isset($_REQUEST["name"])&&(intval($_REQUEST["name"])==1))
    $nameLanguage      ="Japanese - &#x65e5;&#x672c;&#x8a9e;"; else {

  $listeMois= array("","Jan.","Feb.","March","April","May","June","July","Aug.","Sept","Oct.","Nov.","Dec.");
  $listeJour= array("","Mon"=>"Monday","Tue"=>"Tuesday","Wed"=>"Wednesday","Thu"=>"Thursday","Fri"=>"Friday","Sat"=>"Saturday","Sun"=>"Sunday");

  $dia= array();

  // Panneau de login
  $dia["ident"]             ="ログインして下さい：";
  $dia["cantIdent"]         ="ID または パスワードが間違っています";
  $dia["identProblem1"]     ="サーバーにアクセスできません";
  $dia["identProblem2"]     ="テクニカルな障害が発生しています";
  $dia["identProblem3"]     ="Connection to LDAP server could not be established.";
  $dia["enter"]             ="Enter";
  
  // Interface
  $dia["loading"]           ="読み込み中";
  $dia["actualDir"]         ="現在のフォルダ：";
  $dia["connected"]         ="ログインユーザー：";
  $dia["directLink"]        ="ダイレクトリンク";
  $dia["filePreview"]       ="ファイルプレビュー";
  $dia["pictPreview"]       ="画像プレビュー";
  $dia["webPreview"]        ="ウェブページを表示中：";
  $dia["niveauSup"]         ="上位階層";
  $dia["closePanel"]        ="パネルを閉じる";
  $dia["picTooBig"]         ="画像サイズが大きすぎて表示できません";
  $dia["previousPage"]      ="前のページ";
  $dia["nextPage"]          ="Next page";
  $dia["upDir"]             ="上位階層";
  $dia["updateDir"]         ="フォルダを更新";  
  $dia["changeStyle"]       ="スタイル選択";  
  $dia["refreshTree"]       ="フォルダツリーを更新";
  $dia["hideTree"]          ="フォルダを閉じる";
  $dia["showTree"]          ="フォルダを展開";  
  $dia["printGallery"]      ="一覧を印刷";
  $dia["renameAll"]         ="Rename all";
  $dia["saveAll"]           ="全てローカルに保存";
  $dia["savePic"]           ="保存";  
  $dia["webSite"]           ="ウェブサイト";
  $dia["affichage"]         ="表示";
  $dia["expPanel"]          ="フォルダパネル";  
  $dia["background"]        ="背景にする";
  $dia["miniature"]         ="サムネール";
  $dia["bigIcone"]          ="大きいアイコン";
  $dia["liste"]             ="リスト";
  $dia["details"]           ="詳細";
  $dia["none"]              ="なし";
  $dia["arbo"]              ="ツリー";
  $dia["closeWindow"]       ="閉じる";
  $dia["viewContent"]       ="中身を見る";
  $dia["changeUser"]        ="Change user";
  $dia["onlineHelp"]        ="オンラインヘルプ";
  $dia["rapport"]           ="バグを報告する";
  $dia["options"]           ="オプション";
  $dia["contact"]           ="コンタクト";
  $dia["about"]             ="アバウト：";    
  $dia["total"]             ="合計";
  $dia["used"]              ="Used";
  $dia["free"]              ="空き容量";  
  $dia["octet"]             ="b";  
  $dia["selectAll"]         ="すべてを選択";
  $dia["select"]            ="選択";
  $dia["unselect"]          ="選択を解除";
  $dia["expression"]        ="expression";
  $dia["inAllFiles"]        ="in each filenames";
  $dia["distribGPL"]        ="Distributed under GPL license";
  $dia["moreInfos"]         ="For any information or support, visit the official website.";
  $dia["websiteAdr"]        ="en.webshare.fr";
  
  // Verbes / actions  
  $dia["openFile"]          ="開く";
  $dia["openFileWith"]      ="開く";
  $dia["saveFile"]          ="ファイルをローカルに保存";
  $dia["toExplore"]         ="エクスプローラー";
  $dia["toBrowse"]          ="ブラウズ";
  $dia["toVisit"]           ="ブラウザで開く";
  $dia["toView"]            ="見る";
  $dia["toWatch"]           ="ムービーを再生";
  $dia["toListen"]          ="再生";
  $dia["toPrint"]           ="印刷";
  $dia["toUpload"]          ="アップロード";
  $dia["toCut"]             ="カット";
  $dia["toCopy"]            ="コピー";
  $dia["toPaste"]           ="ペースト";
  $dia["toMove"]            ="移動";
  $dia["toDelete"]          ="削除";
  $dia["toChmod"]           ="属性を変更";
  $dia["toSearch"]          ="検索";
  $dia["toRename"]          ="名前を変更";
  $dia["toComment"]         ="コメントを追加";   
  $dia["toValid"]           ="ＯＫ";
  $dia["toEdit"]            ="編集";
  $dia["toModify"]          ="変更されました";
  $dia["toZip"]             ="アーカイブを解凍";     
  $dia["toDezip"]           ="アーカイブを解凍";   
  $dia["toRecover"]         ="復帰";    
  $dia["toConnect"]         ="接続";  
  $dia["toQuit"]            ="終了";
  $dia["toVerify"]          ="確認";  
  $dia["toReplace"]         ="Replace";
  $dia["choose"]            ="Choose...";

  // Chargement de fichier   
  $dia["addUpload"]         ="ファイルを選択";
  $dia["startUpload"]       ="アップロード開始";  
  $dia["limitTaille"]       ="アップロードできるファイルサイズの上限：";
  $dia["ifFileExist"]       ="ファイルがすでに存在した場合：";
  $dia["replaceFile"]       ="置き換える";
  $dia["renameFile"]        ="名前を変更";
  $dia["cancelFile"]        ="キャンセル";  
  $dia["waitingDownload"]   ="ダウンロード待ち";
  $dia["problemDownload"]   ="ダウンロード中に障害が発生しました";
  $dia["prohibited"]        ="このファイルを変更する権限がありません";
  $dia["downloading"]       ="ダウンロード中...";
  $dia["uploading"]         ="アップロード中...";
  $dia["started"]           ="開始しました";
  $dia["success"]           ="ダウンロードが成功しました";
  $dia["tempNotSet"]        ="一時保存フォルダが指定されていません";
  $dia["withSuccess"]       ="（成功）";
  $dia["uploaded"]          ="アップロード完了";
  $dia["succesUpload"]      ="アップロード成功";
  $dia["cantOpen"]          ="ファイルを開けません：";
  $dia["cantWrite"]         ="ファイルに書き込みできません：";
  $dia["fileTooBig"]        ="ファイルサイズが大きすぎます";
  $dia["wait"]              ="待機中";
  
  // Creation de nouveaux élements
  $dia["newFile"]           ="新規ファイル";
  $dia["newDir"]            ="新規フォルダ";
  $dia["newTxt"]            ="新規テキストファイル";
  $dia["newLink"]           ="新規リンク";
  $dia["making"]            ="作成中";
  $dia["areYouSure"]        ="実行してよろしいですか";
  $dia["toDisconnect"]      ="disconnect ？：";
  $dia["addTxt"]            ="ファイル名を入力して下さい：";
  $dia["addDir"]            ="フォルダ名を入力して下さい：";
  $dia["addNew"]            ="新規追加";  
  $dia["addLink"]           ="名前を入力して下さい：";
  $dia["addLink2"]          =", リンク先のアドレスを入力して下さい：";
  $dia["dirCreate"]         ="新規フォルダの作成";
  $dia["txtCreate"]         ="新規テキスト書類の作成";
  $dia["linkCreate"]        ="リンクの作成";
  $dia["linkTo"]            ="リンク先：";
  $dia["created"]           ="作成されました";
  $dia["theNewDir"]         ="新規フォルダ";
  $dia["theNewLink"]        ="新規リンク";
  $dia["theNewTxt"]         ="新規テキスト書類";
      
  // Réponses
  $dia["File"]              ="ファイル";
  $dia["rep"]               ="フォルダ";
  $dia["dir"]               =" フォルダ";
  $dia["file"]              =" ファイル";
  $dia["ofDir"]             ="フォルダ名=";
  $dia["ofFile"]            ="ファイル名=";
  $dia["onFile"]            ="ファイル名=";
  $dia["toDir"]             ="フォルダに";  
  $dia["toFile"]            ="ファイルに";     
  $dia["theDir"]            ="フォルダ：";
  $dia["theFile"]           ="ファイル：";
  $dia["element"]           ="要素";
  $dia["hasBeen"]           ="完了";
  $dia["hasNotBeen"]        ="未完了";
  $dia["hasFailed"]         ="失敗";
  $dia["successful"]        ="に成功しました";  
  $dia["dezipping"]         ="非圧縮アーカイブ";  
  $dia["dezipped"]          ="解凍済み";
  $dia["startEdit"]         ="ファイルの編集を開始";
  $dia["endEdit"]           ="ファイルの編集を終了";
  $dia["confirmEdit"]       ="編集した内容を保存しました";
  $dia["savingDocument"]    ="書類の保存中";  
  $dia["savingDirContent"]  ="フォルダの中身を保存中";
  $dia["savingFile"]        ="ファイルを保存中";  
  $dia["backgAdded"]        ="画像を背景に設定しました";
  $dia["backgRemoved"]      ="背景画像を削除しました";
  
  
  // Renommage / Déplacement / Suppression
  $dia["rename"]            ="新しい名前を入力して下さい";
  $dia["renaming"]          ="名前を変更中：";
  $dia["renamed"]           ="名前が変更されました";
  $dia["confirmSup"]        ="ファイルの関連性を解除してもよろしいですか？";  
  $dia["delete"]            ="削除してよろしいですか？：";
  $dia["delete2"]           ="（中身も消去されます）";
  $dia["deleting"]          ="削除中：";
  $dia["deleted"]           ="削除されました";
  $dia["theRemove"]         ="削除";
  $dia["copyOf"]            ="コピー_";
  $dia["onlyCopy"]          ="コピーされました";
  $dia["fileExist"]         ="同名のファイルがすでにあります";
  $dia["goingToCopy"]       ="：コピー先を選択して下さい";
  $dia["goingToMove"]       ="：移動先を選択して下さい";
  $dia["moving"]            ="移動中：";
  $dia["moved"]             ="移動しました";
  $dia["fileEditing"]       ="編集中：";
  $dia["copying"]           ="コピー中：";
  $dia["copyingFile"]       ="ダウンロードされたファイルをコピーしています";
  $dia["copied"]            ="コピーされました";
  $dia["toActualDir"]       ="→現在のフォルダ";
  $dia["typeOfElement"]     ="タイプ：";
  $dia["copyTo"]            ="コピー";
  $dia["moveTo"]            ="移動";
  $dia["prohibCar"]         ="以下の文字は使用できません( ? < > : # % + '' ' | & * / )";
  $dia["alreadyExist"]      ="同名のファイルまたはフォルダが存在します。別の名前を入力して下さい";
  $dia["confirmReplace"]    ="同名のファイルまたはフォルダが存在します。このまま実行すると上書きされます";
  $dia["modeDefault"]       ="Default mode";
  $dia["modePreview"]       ="Preview mode";
  $dia["lineNumbers"]       ="View line numbers";
  $dia["colorMode"]         ="Syntax highlighting";
  $dia["includeSubDir"]     ="Include subdirectories ?";
  $dia["modifyingPrefs"]    ="Modifying settings";
  
  // Gestion des droits
  $dia["modifyPermission"]  ="属性を変更";
  $dia["noPermission"]      ="権限なし：このファイルタイプを扱えません";
  $dia["noOperation"]       ="この操作は許可されていません";
  $dia["modifying"]         ="属性を変更しています：";
  $dia["fileAttributes"]    ="ファイルの属性";
  $dia["cantModify"]        ="変更できません";
  $dia["modify"]            ="修正";  
  $dia["modified"]          ="変更日時";
  $dia["readWrite"]         ="読み/書き";
  $dia["readOnly"]          ="読み出しのみ";
  $dia["writeOnly"]         ="書き込みのみ";
  $dia["locked"]            ="ロックされています";
  $dia["selectAttributes"]  ="属性：";
  $dia["modR"]              ="読み出し権限";
  $dia["modW"]              ="書き込み権限";
  $dia["modE"]              ="実行権限";
  
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
  $dia["property"]          ="プロパティ";
  $dia["propertyOf"]        ="プロパティ";
  $dia["searchIn"]          ="以下を検索：";
  $dia["search"]            ="入力して下さい：";
  $dia["search2"]           ="（検索したいファイルやフォルダの名前）";
  $dia["searching"]         ="検索ワード：";
  $dia["searching2"]        ="実行中";
  $dia["useCasse"]          ="大文字/小文字を区別しますか？";
  $dia["foundIn"]           ="→";
  $dia["into"]              ="→";
  $dia["and"]               ="&";  
  $dia["by"]                ="by";
  $dia["viewed"]            ="Viewed";
  $dia["times"]             ="times";
  $dia["elementsFound"]     =" elements founds.";     
  $dia["noResult"]          ="ファイルが見つかりません";
  
  // Tri des éléments  
  $dia["sortFile"]          ="ソートの基準";  
  $dia["byName"]            ="ファイル名";
  $dia["byValue"]           ="数値";
  $dia["byType"]            ="種類";
  $dia["bySize"]            ="容量";
  $dia["byDate"]            ="日付";
  $dia["byPerso"]           ="ユーザー";
  $dia["webSort"]           ="デフォルトのソート";
  $dia["ascending"]         ="Ascending";
  $dia["descending"]        ="Descending";
  
  // Commentaires
  $dia["comment"]           ="コメント";
  $dia["commentAdded"]      ="コメントが追加されました";
  $dia["commentsAdded"]     ="コメントが追加されています";  
  $dia["commentNotAdded"]   ="コメントは追加されていません";
  $dia["addComment"]        ="コメントを追加中：";
  $dia["modifyComment"]     ="Modify comment";
  $dia["removeComment"]     ="Remove comment";
  $dia["addingComment"]     ="コメントを追加中：";    
  $dia["commentFile"]       ="ファイルへのコメント：";
  $dia["messageOf"]         ="メッセージ：";  

  // Gestion des versions
  $dia["version"]           ="Version ";
  $dia["viewAllVersion"]    ="View all versions";
  $dia["addNewVersion"]     ="Add a new version";

  // Menu Images  
  $dia["previous"]          ="直前の画像";
  $dia["next"]              ="次の画像";
  $dia["zoomp"]             ="拡大";
  $dia["zoomm"]             ="縮小";
  $dia["zooms"]             ="実際のサイズ";
  $dia["diaporama"]         ="スライドショー";
  $dia["refreshMini"]       ="サムネールを更新";
  $dia["rotate90"]          ="右に90度回転";
  $dia["rotate180"]         ="180度回転";
  $dia["rotate270"]         ="左に90度回転";
  $dia["flipV"]             ="上下に反転";
  $dia["flipH"]             ="左右に反転";
  $dia["resize"]            ="サイズを変更";
  $dia["keepRatio"]         ="縦横比を保持しますか？";
  $dia["width"]             ="幅";
  $dia["height"]            ="高さ";
  $dia["pixels"]            ="px";
    
  // Infos EXIF
  $dia["cliche"]            ="画像";
  $dia["object"]            ="ファイル";
  $dia["infocomment"]       ="コメント";
  $dia["FileSize"]          ="ファイル容量";
  $dia["DateTimeOriginal"]  ="オリジナルの日時";
  $dia["resolution"]        ="解像度";
  $dia["XResolution"]       ="DPI";
  $dia["Software"]          ="ソフトウェア";
  $dia["Photographer"]      ="撮影者";
  $dia["ExposureTime"]      ="露出時間";
  $dia["ApertureFNumber"]   ="解放F値";
  $dia["MaxApertureValue"]  ="最大解放値";
  $dia["ISOSpeedRatings"]   ="ISO";
  $dia["FocalLength"]       ="焦点距離";
  $dia["ExposureBiasValue"] ="露出バイアス値";
  $dia["LightSource"]       ="光源";
  $dia["Flash"]             ="フラッシュ";

  // Envoi d'emails
  $dia["authSendMail"]      ="エレメントのメール送信を許可";
  $dia["sendMail"]          ="メールで送る";
  $dia["titleMail"]         ="タイトル";
  $dia["recipientMail"]     ="受取人のメールアドレスを表示";
  $dia["contentMail"]       ="メッセージを入力して下さい";
  $dia["sendMailConfirm"]   ="メッセージを送信";
  $dia["sendingMail"]       ="メッセージを送信しています";      
  $dia["sendMailOK"]        ="送信されました";
  $dia["sendMailProblem"]   ="送信できませんでした";
  $dia["mailSendTitle"]     ="あなたの WebShare に新しいファイルが追加されました";  
  $dia["mailSendFile1"]     ="こんにちは。あなたの WebShare に新しいファイルが追加されました";
  $dia["mailSendFile2"]     ="ファイルをダウンロードするにはこのリンクをクリック：";
  $dia["mailSendFile3"]     ="";
  $dia["mailSendFile4"]     ="ごきげんよう";    
    
  // Corbeille  
  $dia["corbeille"]         ="ゴミ箱";
  $dia["binNoElement"]      ="ゴミ箱は空です";
  $dia["binContain"]        ="ゴミ箱に入っているもの：";
  $dia["emptyBin"]          ="ゴミ箱を空にする";
  $dia["emptyBinConfirm"]   ="本当にゴミ箱を空にしてよろしいですか？";
  $dia["emptyConfirm"]      ="完全に消去してもよろしいですか？";
  $dia["emptyBinResult"]    ="ゴミ箱は空になりました";
  $dia["viewElements"]      ="すべての要素を見る";
  $dia["emptyElements"]     ="Empty all elements more than ";
  $dia["activeBin"]         ="この共有フォルダのゴミ箱を有効化する";
  $dia["restoreElement"]    ="Restore element";
  $dia["finally"]           =" finally";

  // Favoris  
  $dia["favoris"]           ="ブックマーク";
  $dia["addFav"]            ="お気に入りに追加";
  $dia["removeFav"]         ="お気に入りから取り除く";
  $dia["handleFav"]         ="ブックマークの管理";
  $dia["viewFav"]           ="すべてのブックマークを見る";  
  $dia["favAdded"]          ="The file has been added to bookmarks";
  $dia["favRemoved"]        ="The file has been removed from bookmarks";
  
  // Tests des partages  
  $dia["shareTest"]         ="この設定をテストする";
  $dia["shareOK"]           ="このフォルダに対して十分なアクセス権限があります";
  $dia["shareProtected"]    ="このフォルダにはアクセスできますが十分な権限がありません";
  $dia["shareNotAcc"]       ="このルートは存在しないか、アクセス権がありません";
  $dia["shareFtpNotAcc"]    ="FTP サーバーに接続できません";
  $dia["shareFtpBadLogin"]  ="FTP サーバーがエラーを返しました。ユーザー名とパスワードを確認して下さい";
  $dia["shareFtpError"]     ="FTP サーバーが不明なエラーを返しました";
  $dia["shareFtpcantMount"] ="FTP サーバー上のマウントポイントにアクセスできません";
  $dia["shareFtpProtected"] ="FTP サーバー上のマウントポイントに対してアクセス権がありません";
  $dia["shareFtpOK"]        ="FTP 接続と、共有フォルダのテストが成功しました";
  $dia["shareAvailable"]    ="New users can access this shared folder.";
  
  // Administration   
  $dia["adminTitle"]        ="ユーザーおよびサーバーの管理";
  $dia["adminHeader"]       ="管理画面";
  $dia["msgFooter"]         ="WebShare は GPL ライセンスの下に公開されています";
  $dia["adminAlert1"]       ="テクニカルな障害が発生したため、変更は反映されていません";
  $dia["adminAlert2"]       ="変更しました";  
  $dia["notActiv"]          ="このオプションはまだ有効化されていません";
  $dia["confirmation"]      ="確認";
  $dia["dialConfirm"]       ="確認";
  $dia["adminProtected"]    ="セキュアな管理画面";
  $dia["adminNotProtected"] ="管理画面のセキュリティがありません";  
  $dia["importToBase"]      ="Import configuration file into database";
  $dia["importSuccessful"]  ="Import to database successful.";
  $dia["importFailed"]      ="Import to database failed.";

  // Panneau Partages  
  $dia["adminRub2"]         ="サーバー";
  $dia["serverAdmin"]       ="サーバーおよびフォルダの管理";
  $dia["newServer"]         ="新規サーバー";
  $dia["msgInfo1"]          ="注意：FTP 接続機能はまだ使えません（将来のバージョンで対応）";
  $dia["msgInfo2"]          ="警告：パスとファイル名には大小英数以外の文字は使えません";
  $dia["msgInfo3"]          ="装飾文字やスペースは使えません";
  $dia["msgInfo4"]          ="Warning : The administration folder MUST be renamed to protect your installation.";
  $dia["chooseUser"]        ="削除したいユーザーを選択して下さい";
  $dia["createUser"]        ="ユーザーを作成または修正してからバリデートして下さい";
  $dia["chooseServer"]      ="消去したいサーバーを選択して下さい";
  $dia["createServer"]      ="サーバーを作成または修正してからバリデートして下さい";
  $dia["selectServer"]      ="Select at least a server then validate";
  $dia["FTP"]               ="FTP";
  $dia["local"]             ="ローカル";
  $dia["serverFtp"]         ="サーバー(FTP)";
  $dia["loginFtp"]          ="ログイン名(FTP)";
  $dia["passFtp"]           ="パスワード(FTP)";
  $dia["portFtp"]           ="ポート(FTP)";
  $dia["shareRoot"]         ="ルート";  
  $dia["serverRoot"]        ="サーバールート";
  $dia["virtualRoot"]       ="バーチャルルート";
  $dia["defaultRoot"]       ="デフォルトフォルダ";
  $dia["webRoot"]           ="Web ルート";    
  $dia["protectRep"]        ="新規フォルダをパスワードで保護したい場合：";
  $dia["modeDegrade"]       ="低機能（degraded）モード";
  $dia["protectShare"]      ="この共有フォルダの設定を変更できます";  
  $dia["serverType"]        ="タイプ";
  $dia["serverPosition"]    ="位置";    
  
  // Panneau Utilisateur  
  $dia["adminRub1"]         ="ユーザー";
  $dia["userAdmin"]         ="ユーザーの管理";
  $dia["newUser"]           ="新規ユーザー";
  $dia["administrator"]     ="管理者";
  $dia["email"]             ="Email";
  $dia["lang"]              ="言語";
  $dia["user"]              ="ユーザー";
  $dia["group"]             ="グループ";
  $dia["name"]              ="名前";
  $dia["login"]             ="ログイン名";
  $dia["passwd"]            ="パスワード";
  $dia["confirmation"]      ="コンファーム";
  $dia["connexion"]         ="接続先";
  $dia["default"]           ="ブラウジング";
  $dia["explore"]           ="Explorer";
  $dia["visualis"]          ="スタイル";
  $dia["leftPanel"]         ="デフォルトの画面";
  $dia["webSort"]           ="デフォルトのソート順";
  $dia["webDir"]            ="フォルダのプレビュー形式";
  $dia["nameShare"]         ="共有 ";
  $dia["access"]            ="共有アクセス ";
  $dia["select"]            ="選択";
  $dia["open"]              ="開く";
  $dia["menuContext"]       ="コンテクストメニュー";
  $dia["leftClic"]          ="左クリック：";
  $dia["rightClic"]         ="右クリック：";
  $dia["doubleClic"]        ="ダブルクリック：";
  $dia["toModify"]          ="修正";
  $dia["toCreate"]          ="作成";
  $dia["toRead"]            ="閲覧";
  $dia["regexp"]            ="(正規表現 > 正規表現を追加する場合は | で区切ります) :";
  $dia["filterElement"]     ="以下を含む要素をフィルタリング";
  $dia["recoExtension"]     ="以下の拡張子を認識します";
  $dia["defStyle"]          ="デフォルトスタイル";  
  $dia["sessionTime"]       ="セッションの継続時間(min)";
  $dia["actionAuth"]        ="このユーザーにはロックされていないファイルに対して以下の操作を許可します：";
  $dia["userType"]          ="タイプ";
  $dia["createNewAccount"]  ="Create a new user account";
  $dia["chooseAccount"]     ="Choose the user account to open :";

  // Panneau Préférences  
  $dia["adminRub3"]         ="環境設定";
  $dia["prefAdmin"]         ="環境設定の管理";
  $dia["baseAdmin"]         ="データベースの管理";
  $dia["memoMax"]           ="スクリプトへの割当メモリ";
  $dia["execMax"]           ="スクリプトの実行タイムアウト";
  $dia["postMax"]           ="POST サイズ制限";
  $dia["uploMax"]           ="アップロードサイズ制限";
  $dia["lifeMax"]           ="タイムアウト";
  $dia["timeMax"]           ="アップロードのタイムアウト";
  $dia["previewWeb"]        ="ウェブサイトのプレビュー";
  $dia["previewAct"]        ="サムネール";
  $dia["previewPDF"]        ="PDF のプレビュー";
  $dia["logAct"]            ="ログを有効化";
  $dia["sepAdr"]            ="アドレスの分割：";
  $dia["alwaysConfirm"]     ="アクション毎に確認をする";
  $dia["effectAct"]         ="ビジュアル効果";
  $dia["completePath"]      ="完全なパス";
  $dia["openLinkinNewWin"]  ="新しいウィンドウでリンクを表示";    
  $dia["frameTitle"]        ="ウィンドウタイトル";
  $dia["viewClock"]         ="時計を表示";
  $dia["diapoSpeed"]        ="Diaporama スピード";
  $dia["diapoStop"]         ="diaporama を停止";
  $dia["arboLink"]          ="フォルダツリーでリンクを表示";
  $dia["activeMini"]        ="サムネールを有効化";
  $dia["dynWindow"]         ="ダイナミックウィンドウ";
  $dia["serverBase"]        ="mySQL サーバー";
  $dia["loginBase"]         ="mySQL ログイン名";
  $dia["passBase"]          ="mySQL パスワード";
  $dia["tableBase"]         ="Select base";
  $dia["myPref"]            ="My preferences";
  $dia["privateWS"]         ="Private share";
  $dia["publicWS"]          ="Public share";
  $dia["accountUser"]       ="Users can create their own account";
  
  // Panneau Infos  
  $dia["adminRub5"]         ="情報";
  $dia["infoAdmin"]         ="インストール情報";
  $dia["theExt"]            ="エクステンション ";
  $dia["activated"]         ="：有効";
  $dia["notActivated"]      ="：無効";
  $dia["libZip"]            ="(Zip アーカイブのサポート)";
  $dia["libGD"]             ="(画像とサムネールのサポート)";
  $dia["libMB"]             ="(２バイト文字のサポート)";
  $dia["libXslt"]           ="(補完的な Xslt のサポート)";
  $dia["libFTP"]            ="(FTP 接続のサポート)";
  $dia["libPdf"]            ="(PDF サムネールのサポート)";
  $dia["libMail"]           ="(メール送信のサポート)";
  $dia["libExif"]           ="(Exif のサポート)";
  $dia["dontExist"]         ="：存在しません";
  $dia["notAccessible"]     ="：存在しないか、アクセスできません";
  $dia["accessProtect"]     ="：存在するが、書き込み不可";
  $dia["isAccessible"]      ="：存在し、書き込み可能";
  $dia["modulesDetected"]   ="が見つかりました。以下のモジュールを含みます：";
  $dia["langDetected"]      ="が見つかりました。以下の言語を含みます：";
  $dia["styleDetected"]     ="が見つかりました。以下のスタイルを含みます：";
  $dia["cgiUpNotDetected"]  ="が見つかりません";
  $dia["cgiUpLimited"]      ="が見つかりましたが、十分なアクセス権がありません";
  $dia["cgiUpDetected"]     ="が見つかり、アクセス可能です";
  $dia["unlimitedUpload"]   ="無制限にアップロード可能";
  $dia["alertfunction1"]    ="サーバー設定により、いくらかの制限が課せられているようです。";
  $dia["alertfunction2"]    ="Webshare の機能が一部制限されます。";
  $dia["alertfunction3"]    ="This feature is available only when Webshare is connected to a database.";
  $dia["msgVarNotModif1"]   ="Webshare はこれらの値を変更できません。問題が発生する場合は、";
  $dia["msgVarNotModif2"]   ="'php.ini' を直接編集して下さい。";
  $dia["msgVarModifiable1"] ="You can modify these values if you encounter problems ";
  $dia["msgVarModifiable2"] ="in Webshare. ";
  $dia["tip1"]              ="Indicated values limit actually each script to ";
  $dia["tip2"]              ="seconds of life and uploads to ";
  $dia["propProcess"]       ="Ownership of the Webshare (PHP) process ";
  $dia["limitProcess"]      ="This process has limited rights.";


  // Panneau Associations  
  $dia["adminRub4"]         ="ヘルパー";
  $dia["moduAdmin"]         ="モジュール管理";
  $dia["assoAdmin"]         ="拡張子の関連づけ";
  $dia["extension"]         ="拡張子";
  $dia["exttype"]           ="タイプ";
  $dia["extmime"]           ="Mime";
  $dia["extact1"]           ="デフォルトの動作";
  $dia["extact2"]           ="２番目の動作";
  $dia["toAdd"]             ="追加";
  $dia["newStyle"]          ="新しいスタイルを追加";
  $dia["newModule"]         ="新しいモジュールを追加";
  $dia["updateWS"]          ="アプリケーションをアップデート";  
  $dia["noVersionAv"]       ="新しいバージョンはありません";
  $dia["newVersionAv"]      ="新しいバージョンが利用可能です";
  $dia["newVersion"]        ="for a new version";  
    
  // Panneau Logs  
  $dia["adminRub6"]         ="ログ";
  $dia["logsAdmin"]         ="ログビューワー";
  $dia["notConnected"]      ="サーバーとの接続に失敗しました。パラメータを確認して下さい";
  $dia["connectedDB"]       ="サーバーとの接続が確認できました";
  $dia["msgBase"]           ="データベースの設定をしなくても使用できますが、イベントログは有効化されません";
  $dia["noLog"]             ="ログがありません";
  $dia["all"]               ="すべて";
  $dia["allf"]              ="すべて";
  $dia["resultInd"]         ="ニュートラル";
  $dia["resultPos"]         ="ポジティブ";
  $dia["resultNeg"]         ="ネガティブ";
  $dia["noLogs"]            ="選択された条件に合致するアクションはありません";
  $dia["viewAction"]        ="アクションを見る：";
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
  $_SESSION["ws"]["dia"]["noConf"]  ="サーバーおよびユーザーが登録されていません。<br/><br/><a href='admin/index.php' style='text-decoration:underline'>管理画面</a>を開いて<br/>アカウントを設定して下さい。<br/><br/>詳しくは<br/>ドキュメントをご覧下さい。<br/><br/>";
  $_SESSION["ws"]["dia"]["noServer"]="サーバーが登録されていません。<br/><br/><a href='admin/index.php' style='text-decoration:underline'>管理画面</a>を開いて<br/>アカウントを設定して下さい。<br/><br/>詳しくは<br/>ドキュメントをご覧下さい。<br/><br/><br/>";
  $_SESSION["ws"]["dia"]["noUser"]  ="ユーザーが登録されていません。<br/><br/><a href='admin/index.php' style='text-decoration:underline'>管理画面</a>を開いて<br/>アカウントを設定して下さい。<br/><br/>詳しくは<br/>ドキュメントをご覧下さい。<br/><br/><br/>";
  $_SESSION["ws"]["dia"]["noJS"]    ="JavaScript が見つかりません。<br/><br/>Javascript を有効にして下さい<br/>（ブラウザーが古い場合は）最新のブラウザーをお使い下さい。<br/><br/>";
  $_SESSION["ws"]["dia"]["protect1"]="セキュリティのために必ずログインとパスワードを設定して下さい。次回以降のアクセスにはログインが必要となります。<br/><br/>";
  $_SESSION["ws"]["dia"]["protect2"]="* パスワードが一致するか確認します。アルファベットか数字のみ使えます。<br/>あとから変更したい場合は、'wspasswd' フォルダの中の.htpasswd ファイルを編集して下さい。";

  }
?>
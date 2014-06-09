<?php
/************************************************************************/
/*                                WEBSHARE                              */
/************************************************************************/
//
// Copyright (c) 2008 by Virginie Vivancos
// http://www.webshare.fr
//
// This program is free software. You can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation; either version 2 of the License.
//
// =======================================================================
// Fonction : Turkish translation file
// Nom      : Turkish.lang.php
// Version  : 0.6.5
// Date     : 19/05/09
// turkish language file : ibrahim509@gmail.com // ibrahim halil KURTGÖZ
// =======================================================================
// Text encoding: UTF-8/UNIX(LF)

  if (isset($_REQUEST["name"])&&(intval($_REQUEST["name"])==1))
    $nameLanguage      ="Turkish - Türkçe"; else {
  
  $listeMois= array("","Ocak","Şubat","Mart","Nisan","Mayıs","Haziran","Temmuz","Auğustos.","Eylül","Ekim","Kasım","Aralık");
  $listeJour= array("","Pts"=>"Pazartesi","Salı"=>"Salı","Çrş"=>"Çarşamba","Prş"=>"Perşembe","Cuma"=>"Cuma","Cts"=>"Cumartesi","Pzr"=>"Pazar");

  $dia= array();

  // Panneau de login
  $dia["ident"]             ="Lütfen Giriş Yapın";
  $dia["cantIdent"]         ="Hatalı Giriş";
  $dia["identProblem1"]     ="Sunucuya Ulaşılamadı.";
  $dia["identProblem2"]     ="Teknik Problem.";
  $dia["identProblem3"]     ="LDAP sunucusuna bağlantı kurulamadı.";
  $dia["enter"]             ="Giriş";

  // Interface
  $dia["loading"]           ="Yükleniyor Lütfen Bekleyiniz...";
  $dia["actualDir"]         ="Şimdiki Klasör: ";
  $dia["connected"]         ="Yekkili Adı";
  $dia["directLink"]        ="Direk Bağlantı";
  $dia["filePreview"]       ="Dosya Önizleme";
  $dia["pictPreview"]       ="Resim Önizleme";
  $dia["webPreview"]        ="Taranıyor";
  $dia["niveauSup"]         ="Yukarı";
  $dia["closePanel"]        ="Panelden Çık";
  $dia["picTooBig"]         ="Resim boyutu çok büyük görüntülenmesi için.";
  $dia["previousPage"]      ="Geri";
  $dia["upDir"]             ="Level up";
  $dia["updateDir"]         ="Yenile";
  $dia["changeStyle"]       ="Sitil Seç";
  $dia["refreshTree"]       ="Klasör Ağacını Yenile";
  $dia["hideTree"]          ="Klasör Ağacını Azalt";
  $dia["showTree"]          ="Deploy folder tree";
  $dia["printGallery"]      ="Galeri Yazdır";
  $dia["renameAll"]         ="Tümüne Yeni İsim Ver";
  $dia["saveAll"]           ="Tümünü Kaydet";
  $dia["savePic"]           ="Tümü";
  $dia["webSite"]           ="Website";
  $dia["affichage"]         ="Göster";
  $dia["expPanel"]          ="Klasör Ağaç Paneli";
  $dia["background"]        ="Arkaplan";
  $dia["miniature"]         ="Thumbnails";
  $dia["bigIcone"]          ="Büyük Simge";
  $dia["liste"]             ="Liste";
  $dia["details"]           ="Ayrıntılar";
  $dia["none"]              ="Hiçbiri";
  $dia["arbo"]              ="Ağaç Klasör";
  $dia["closeWindow"]       ="Çık";
  $dia["viewContent"]       ="İçerik Görünüm";
  $dia["changeUser"]        ="Kullnıcı Değiştir";
  $dia["onlineHelp"]        ="Online Yardım";
  $dia["rapport"]           ="Bir Hata Gönder";
  $dia["options"]           ="Seçenekler";
  $dia["contact"]           ="İletişim";
  $dia["about"]             ="Hakkında";
  $dia["total"]             ="Toplam";
  $dia["used"]              ="Kullanılmış";
  $dia["free"]              ="Boş";
  $dia["octet"]             ="b";
  $dia["selectAll"]         ="Tümünü seç";
  $dia["select"]            ="Seç";
  $dia["unselect"]          ="Seçme";
  $dia["expression"]        ="İfade";
  $dia["inAllFiles"]        ="Her bir dosya olarak";
  $dia["distribGPL"]        ="Distributed under GPL license";
  $dia["moreInfos"]         ="For any information or support, visit the official website.";
  $dia["websiteAdr"]        ="en.webshare.fr";
  
  // Verbes / actions
  $dia["openFile"]          ="Aç";
  $dia["openFileWith"]      ="Birlikte Aç";
  $dia["toExplore"]         ="Tara";
  $dia["saveFile"]          ="Kaydet";
  $dia["toBrowse"]          ="İnsanlar";
  $dia["toVisit"]           ="Ziyaret";
  $dia["toView"]            ="Görünüş";
  $dia["toWatch"]           ="Bak";
  $dia["toListen"]          ="Dinle";
  $dia["toPrint"]           ="Yazdır";
  $dia["toUpload"]          ="Yükle";
  $dia["toCut"]             ="Kes";
  $dia["toCopy"]            ="Kopyala";
  $dia["toPaste"]           ="Yapıştır";
  $dia["toMove"]            ="Taşı";
  $dia["toDelete"]          ="Sil";
  $dia["toChmod"]           ="Öznitelikleri Değiştir";
  $dia["toSearch"]          ="Ara";
  $dia["toRename"]          ="Yeni isim ver";
  $dia["toComment"]         ="Nasıl";
  $dia["toValid"]           ="Tamam";
  $dia["toEdit"]            ="Hazırla";
  $dia["toModify"]          ="Düzenle";
  $dia["toZip"]             ="Sıkıştır";
  $dia["toDezip"]           ="Arşivden Çıkar";
  $dia["toRecover"]         ="Geri Al";
  $dia["toConnect"]         ="Bağlan";
  $dia["toQuit"]            ="Çıkış";
  $dia["toVerify"]          ="Doğrula";
  $dia["toReplace"]         ="Üzerine Yaz";
   
  // Chargement de fichier
  $dia["addUpload"]         ="Dosya Ekle";
  $dia["startUpload"]       ="Yüklemeyi Başlat";
  $dia["limitTaille"]       ="Maksimum yükleme dosya boyutu sunucu tarafından izin verilir ";
  $dia["ifFileExist"]       ="Aynı Dosyadan Zaten Varsa :";
  $dia["replaceFile"]       ="Üzerine Yaz";
  $dia["renameFile"]        ="Yeniden Adlandır";
  $dia["cancelFile"]        ="İptal";
  $dia["waitingDownload"]   ="Yüklemek için bekliyor";
  $dia["problemDownload"]   ="Dosya yükleme sırasında hata";
  $dia["prohibited"]        ="Dosyayı değiştirmenize izin verilmedi.";
  $dia["downloading"]       ="Yükleme işlemi devam ediyors";
  $dia["uploading"]         ="Yükleme işlemi devam ediyor";
  $dia["started"]           ="Başlıyor";
  $dia["success"]           ="Yükleme Başarıyla Tamamlandı";
  $dia["tempNotSet"]        ="Geçici klasör tanımsız";
  $dia["withSuccess"]       ="Başarıyla";
  $dia["uploaded"]          ="Yüklendi";
  $dia["succesUpload"]      ="başarıyla yüklendi";
  $dia["cantOpen"]          ="Dosya açılamıyor";
  $dia["cantWrite"]         ="Dosya yazılamıyor";
  $dia["fileTooBig"]        ="Dosya boyutu izin verilen sınırı aşdı.";
  $dia["wait"]              ="Bekleyizi";

  // Creation de nouveaux élements
  $dia["newFile"]           ="Yeni Dosya";
  $dia["newDir"]            ="Yeni Klasör";
  $dia["newTxt"]            ="Yeni Yazı";
  $dia["newLink"]           ="Yeni Bağlantı";
  $dia["making"]            ="Oluşturuluyor";
  $dia["areYouSure"]        ="İstediğinizden emin misiniz?";
  $dia["addTxt"]            ="Lütfen Yeni Metin Belgesinin Adını Girin :";
  $dia["addDir"]            ="Lütfen Yeni Klasörün Adını Girin :";
  $dia["addNew"]            ="Yeni Ekle";
  $dia["addLink"]           ="Bir Ad Girin";
  $dia["addLink2"]          ="ve yeni bağlantı adresi:";
  $dia["dirCreate"]         ="Klasörün oluşturulması";
  $dia["txtCreate"]         ="Boş metin belgesinin oluşturulması";
  $dia["linkCreate"]        ="Bağlantı kurulması";
  $dia["linkTo"]            ="Bağlantı için";
  $dia["created"]           ="Oluşturuldu";
  $dia["theNewDir"]         ="Yeni Klasör";
  $dia["theNewLink"]        ="Yeni Link";
  $dia["theNewTxt"]         ="Yeni boş bir metin belgesi";

  // Réponses
  $dia["File"]              ="Dosya";
  $dia["rep"]               ="Klasör";
  $dia["dir"]               ="Klasör";
  $dia["file"]              ="Dosya";
  $dia["ofDir"]             ="klasörün ";
  $dia["ofFile"]            ="Dosyanın";
  $dia["onFile"]            ="dosya";
  $dia["toDir"]             ="Klasöre";  
  $dia["toFile"]            ="Dosyaya";   
  $dia["theDir"]            ="Klasör";
  $dia["theFile"]           ="Dosya";
  $dia["element"]           ="Başlangıç";
  $dia["hasBeen"]           ="olmuş ";
  $dia["hasNotBeen"]        ="henüz ";
  $dia["hasFailed"]         ="başarısız oldu";
  $dia["successful"]        ="başarıyla yapıldı";
  $dia["dezipping"]         ="Arşiv Açılıyor.";
  $dia["dezipped"]          ="Açılıyor";
  $dia["startEdit"]         ="Dosyayı Düzenlemeye Başlanıyor";
  $dia["endEdit"]           ="Dosya Düzenleme Durduruluyor";
  $dia["confirmEdit"]       ="düzenlendi ve kaydedildi.";
  $dia["savingDocument"]    ="Belgeyi Kaydet";
  $dia["savingDirContent"]  ="Klasörün içeriği kaydetme ";
  $dia["savingFile"]        ="Dosya Kaydet";
  $dia["backgAdded"]        ="Resmi Arka Plan Olarak Kullan.";
  $dia["backgRemoved"]      ="Arkapalan Sil.";


  // Renommage / Déplacement / Suppression
  $dia["rename"]            ="Yeni Bir İsim Girin";
  $dia["renaming"]          ="Yeniden adlandır";
  $dia["renamed"]           ="adını";
  $dia["confirmSup"]        ="Confirm removing this file association ?";
  $dia["delete"]            ="Silmek istediğinizden emin misiniz ";
  $dia["delete2"]           ="ve içerik ?";
  $dia["deleting"]          ="Siliniyor";
  $dia["deleted"]           ="Silndi";
  $dia["theRemove"]         ="Sil";
  $dia["copyOf"]            ="Copy-of-";
  $dia["onlyCopy"]          ="ama kopyalandktan sonra.";
  $dia["fileExist"]         ="Aynı isimde bir dosya zaten var.";
  $dia["goingToCopy"]       ="Kopyalamak için hedef seçin.";
  $dia["goingToMove"]       ="Taşımak için hedef seçin.";
  $dia["moving"]            ="Taşınıyor";
  $dia["moved"]             ="Taşındı";
  $dia["fileEditing"]       ="Hazırlanıyor";
  $dia["copying"]           ="Kopyalanıyor";
  $dia["copyingFile"]       ="Kopyalama hedefine yüklenen dosya";
  $dia["copied"]            ="Kopyalanır";
  $dia["toActualDir"]       ="Mevcut klasör için";
  $dia["typeOfElement"]     ="Belge";
  $dia["copyTo"]            ="Kopya";
  $dia["moveTo"]            ="Taşı";
  $dia["prohibCar"]         ="Yasak girilen karekter ( ? < > : # % + '' ' | & * / )";
  $dia["alreadyExist"]      ="Bu dosya veya klasör zaten var, yeni bir isim girin.";
  $dia["confirmReplace"]    ="Eğer geçerli bir dosya veya klasör zaten var, bu değiştirilmek üzere.";

  // Gestion des droits
  $dia["modifyPermission"]  ="Öznitelikleri Değiştir";
  $dia["noPermission"]      ="İzin verilmedi.";
  $dia["noOperation"]       ="Bu işlem yapılmaz.";
  $dia["modifying"]         ="Öznitelikleri değiştir";
  $dia["fileAttributes"]    ="Dosya Öznitelikleri";
  $dia["cantModify"]        ="Değiştirilmedi";
  $dia["modify"]            ="Değişiklik Yapılmış.";
  $dia["modified"]          ="Değiştirildi";
  $dia["readWrite"]         ="Oku-Yaz";
  $dia["readOnly"]          ="Sadece Oku";
  $dia["writeOnly"]         ="Sadece Yaz";
  $dia["locked"]            ="Dosya Kilitlendi";
  $dia["selectAttributes"]  ="Nitelikler ";
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
  $dia["property"]          ="Sahiplik ";
  $dia["propertyOf"]        ="Sahip";
  $dia["searchIn"]          ="Search in ";
  $dia["search"]            ="İsim Girin";
  $dia["search2"]           ="Dosya ya da klasör arama?";
  $dia["searching"]         ="Ara";
  $dia["searching2"]        ="Devam Ediyor";
  $dia["useCasse"]          ="Büyük-küçük harf?";
  $dia["foundIn"]           ="içinde";
  $dia["into"]              ="içerisine";
  $dia["and"]               ="ve";
  $dia["by"]                ="tarafından";
  $dia["viewed"]            ="Görüldü";
  $dia["times"]             ="kere";
  $dia["elementsFound"]     ="Öğeler bulundu.";
  $dia["noResult"]          ="Dosya bulunamadı.";

  // Tri des éléments
  $dia["sortFile"]          ="Simgeleri Diz";
  $dia["byName"]            ="İsme Göre";
  $dia["byValue"]           ="Değere Göre";
  $dia["byType"]            ="Türe Göre";
  $dia["bySize"]            ="Boyuta Göre";
  $dia["byDate"]            ="Tarihe Göre";
  $dia["byPerso"]           ="Kişisel";
  $dia["webSort"]           ="Varsayılan sıralama";
  $dia["ascending"]         ="Artan";
  $dia["descending"]        ="Azalan";

  // Commentaires
  $dia["comment"]           ="Yorum";
  $dia["commentAdded"]      ="Yorum eklendi.";
  $dia["commentsAdded"]     ="Yorumlar eklendi";
  $dia["commentNotAdded"]   ="Yorum eklenmedi.";
  $dia["addComment"]        ="Yorum ekle";
  $dia["modifyComment"]     ="Değiştir'i Yorum";
  $dia["removeComment"]     ="Yorumu Sil";
  $dia["addingComment"]     ="Yorumun ekleme";
  $dia["commentFile"]       ="Dosyanın Yorumları";
  $dia["messageOf"]         ="Mesajı";

  // Menu Images
  $dia["previous"]          ="Önceki resim";
  $dia["next"]              ="Sonraki resim";
  $dia["fullScreen"]        ="Tam Ekran";
  $dia["reducePanel"]       ="Küçült";
  $dia["zoomp"]             ="Yaklaştır";
  $dia["zoomm"]             ="Uzaklaştır";
  $dia["zooms"]             ="Gerçek boyut";
  $dia["diaporama"]         ="Slayt";
  $dia["refreshMini"]       ="Yenile minyatür";
  $dia["rotate90"]          ="Döndür 90° Sağa";
  $dia["rotate180"]         ="Döndür 180°";
  $dia["rotate270"]         ="Döndür 90° Sola";
  $dia["flipV"]             ="Dikey Döndür";
  $dia["flipH"]             ="Yatay Döndür";
  $dia["resize"]            ="Boyutlandırma";
  $dia["keepRatio"]         ="Boy oranı tutulsunmu ?";
  $dia["width"]             ="Genişlik";
  $dia["height"]            ="Yükseklik";
  $dia["pixels"]            ="piksel";

  // Infos EXIF
  $dia["cliche"]            ="Resim";
  $dia["object"]            ="Dosya";
  $dia["infocomment"]       ="Yorum";
  $dia["FileSize"]          ="Dosya Boyut";
  $dia["DateTimeOriginal"]  ="Gerçek Tarih-Saat";
  $dia["resolution"]        ="Çözünürlük";
  $dia["XResolution"]       ="DPI";
  $dia["Software"]          ="Yazılım";
  $dia["Photographer"]      ="Fotoğrafçı";
  $dia["ExposureTime"]      ="Pozlama süresi";
  $dia["ApertureFNumber"]   ="Diyafram K Numarası";
  $dia["MaxApertureValue"]  ="Maks Diyafram Değeri";
  $dia["ISOSpeedRatings"]   ="Hızlı Dereceler ISO";
  $dia["FocalLength"]       ="Odak Uzunluğu";
  $dia["ExposureBiasValue"] ="Exposure Bias Value";
  $dia["LightSource"]       ="Light Source";
  $dia["Flash"]             ="Flash";

  // Envoi d'emails
  $dia["authSendMail"]      ="E-posta ile gönderme elemanları izin ver";
  $dia["sendMail"]          ="E-posta ile Gönder";
  $dia["titleMail"]         ="Mesaj başlığı";
  $dia["recipientMail"]     ="Alıcıya Mail Adresinizi Gösterin";
  $dia["contentMail"]       ="Mesajınızı Girin";
  $dia["sendMailConfirm"]   ="Mesajı Gönder";
  $dia["sendingMail"]       ="Mesaj Gönderiliyor";    
  $dia["sendMailOK"]        ="Mesaj gönderildi.";
  $dia["sendMailProblem"]   ="Mesaj gönderilmedi.";
  $dia["mailSendTitle"]     ="Arşive Yeni Dosya Ekleyin";  
  $dia["mailSendFile1"]     ="Hello, a new file has been added in your webshare ";
  $dia["mailSendFile2"]     ="Bu dosyayı indirmek için aşağıdaki bağlantıyı tıklayın: ";
  $dia["mailSendFile3"]     ="";
  $dia["mailSendFile4"]     ="İyi Günler.";  

  // Corbeille
  $dia["corbeille"]         ="Çöp";
  $dia["binNoElement"]      ="Çöp kutusu boş.";
  $dia["binContain"]        ="The trash bin contains";
  $dia["emptyBin"]          ="Çöp kutusunu boşalt";
  $dia["emptyBinConfirm"]   ="Eminmisiniz ?";
  $dia["emptyConfirm"]      ="Bu elemen silmek için emin misiniz ?";
  $dia["emptyBinResult"]    ="Çöp kutusu boşalttınız.";
  $dia["viewElements"]      ="Tümümü";
  $dia["emptyElements"]     ="Empty all elements more than ";
  $dia["activeBin"]         ="Çöpü bu paylaşılan klasör için Etkinleştir";
  $dia["restoreElement"]    ="Restore element";
  $dia["finally"]           =" finally";

  // Gestion des versions
  $dia["version"]           ="Version ";
  $dia["viewAllVersion"]    ="Tüm sürümleri";
  $dia["addNewVersion"]     ="Yeni sürüm ekle";

  // Favoris
  $dia["favoris"]           ="Favoriler";
  $dia["addFav"]            ="Favori Ekle";
  $dia["removeFav"]         ="Favoriden Sil";
  $dia["handleFav"]         ="Favorileri Yönet";
  $dia["viewFav"]           ="Tüm Favorileri Göster";

  // Tests des partages
  $dia["shareTest"]         ="Test Etmek İçin Tıklayın.";
  $dia["shareOK"]           ="Bu paylaşılan klasöre erişilebilir.Yetkiler Tam";
  $dia["shareProtected"]    ="Bu paylaşılan klasöre erişilebilir ama yetkiler yetersiz.";
  $dia["shareNotAcc"]       ="The root indicated is not accessible or don't exist.";
  $dia["shareFtpNotAcc"]    ="FTP sunucusu bağlantısı mümkün.";
  $dia["shareFtpBadLogin"]  ="FTP sunucusu, kullanıcı adı ve şifre doğrulama hatası.";
  $dia["shareFtpError"]     ="FTP sunucusu bilinmeyen hata.";
  $dia["shareFtpcantMount"] ="FTP sunucusunda erişilemez.";
  $dia["shareFtpProtected"] ="FTP sunucusunda erişilebilir.";
  $dia["shareFtpOK"]        ="FTP sunucusu ve paylaşılan klasörün bağlantı testi başarılı.";
  $dia["shareAvailable"]    ="New users can access this shared folder.";

  // Administration
  $dia["adminTitle"]        ="Kullanıcıları ve sunucuları yönetimi";
  $dia["adminHeader"]       ="YÖNETİM";
  $dia["msgFooter"]         ="WebShare under License GPL";
  $dia["adminAlert1"]       ="Teknik bir problem, meydana geldi, değişiklikler, yapılmadı.";
  $dia["adminAlert2"]       ="Değişiklik yapıldı.";
  $dia["notActiv"]          ="Bu seçenek henüz uygulanmaz.";
  $dia["confirmation"]      ="Onay";
  $dia["dialConfirm"]       ="Onayla ?";
  $dia["adminProtected"]    ="Korumalı yönetim paneli";
  $dia["adminNotProtected"] ="Yönetim paneli korumalı değil!";
  $dia["importConfirm"]     ="Veri tabanına dosya Aktarmayı onayla ?";
  $dia["importToBase"]      ="Veritabanına yapılandırma dosyası yükleme";
  $dia["importSuccessful"]  ="Veritabanına yükleme başarılı.";
  $dia["importFailed"]      ="Veritabanına yükleme hatalı.";

  // Panneau Partages
  $dia["adminRub2"]         ="Paylaşımlar";
  $dia["serverAdmin"]       ="Paylaşımlar ve sanal klasör yönetimi";
  $dia["newServer"]         ="Yeni Paylaşım Klasörü";
  $dia["msgInfo1"]          ="Unutmayın: FTP bağlantıları henüz aktif değil.";
  $dia["msgInfo2"]          ="Dikkat:Dosya Yolu ve ismi Karekter içermemeli.";
  $dia["msgInfo3"]          ="Noktalama, vurgu ve özel alanlarda izin verilmez.";
  $dia["msgInfo4"]          ="Warning : The administration folder MUST be renamed to protect your installation.";
  $dia["chooseUser"]        ="Silmek için kullanıcı seçin";
  $dia["createUser"]        ="Oluşturun veya sonra doğrulayın bir kullanıcı değiştirmek";
  $dia["chooseServer"]      ="Silmek için sunucu seçin ";
  $dia["createServer"]      ="Create or modify an server then validate";
  $dia["selectServer"]      ="Onaylamak için en az bir sunucu seçin";
  $dia["FTP"]               ="FTP";
  $dia["local"]             ="Yerel";
  $dia["serverFtp"]         ="Server (FTP)";
  $dia["loginFtp"]          ="Giriş (FTP)";
  $dia["passFtp"]           ="Parola (FTP)";
  $dia["portFtp"]           ="Port (FTP)";
  $dia["shareRoot"]         ="Root";
  $dia["serverRoot"]        ="Server root";
  $dia["virtualRoot"]       ="Sanal root";
  $dia["defaultRoot"]       ="Varsayılan Klasör";
  $dia["webRoot"]           ="Web root";  
  $dia["protectRep"]        ="Dosyayı Yeni Klasörlerle Koruyun :";
  $dia["modeDegrade"]       ="Bozulmuz oturum";
  $dia["protectShare"]      ="Değişiklikler Bu paylaşılan klasörüne uygulanabilir";  
  $dia["serverType"]        ="tür";
  $dia["serverPosition"]    ="Pozisyon";  
  
  // Panneau Utilisateur
  $dia["adminRub1"]         ="Kullanıcılar";
  $dia["userAdmin"]         ="Kullanıcı yönetimi";
  $dia["newUser"]           ="Yeni Kullanıcı";
  $dia["administrator"]     ="Yönetici";
  $dia["email"]             ="Email";
  $dia["lang"]              ="Dil";
  $dia["user"]              ="Kullanıcı";
  $dia["group"]             ="Grup";
  $dia["name"]              ="Ad";
  $dia["login"]             ="Giriş";
  $dia["passwd"]            ="Şifre";
  $dia["confirmation"]      ="Onay";
  $dia["connexion"]         ="Bağlantı";
  $dia["default"]           ="Taranıyor";
  $dia["explore"]           ="Taranıyor";
  $dia["visualis"]          ="Sitil";
  $dia["leftPanel"]         ="Varsayılan panel";
  $dia["webSort"]           ="Varsayılan Tür";
  $dia["webDir"]            ="Web Klasörü Önizle";
  $dia["nameShare"]         ="Paylaşım ";
  $dia["access"]            ="Paylaşım anahtarı";
  $dia["select"]            ="Seç";
  $dia["open"]              ="Aç";
  $dia["menuContext"]       ="Menü";
  $dia["leftClic"]          ="Sol clic :";
  $dia["rightClic"]         ="Sağ clic :";
  $dia["doubleClic"]        ="Çıft clic :";
  $dia["toModify"]          ="Değiştir";
  $dia["toCreate"]          ="Oluştır";
  $dia["toRead"]            ="Oku";
  $dia["regexp"]            ="(RegExp > Add new expressions separated by | ) :";
  $dia["filterElement"]     ="Filtre kuralları içeren";
  $dia["recoExtension"]     ="Aşağıdaki uzantıları tanındığı";
  $dia["defStyle"]          ="Varsalılan Sitil style";  
  $dia["sessionTime"]       ="Oturum Süresi (dk)";
  $dia["actionAuth"]        ="Kullanıcı, aşağıdaki eylemleri yapmak için yetkili :";
  $dia["userType"]          ="Tür";
  
  // Panneau Préférences
  $dia["adminRub3"]         ="Tercihler";
  $dia["prefAdmin"]         ="Tercihleri Yönet";
  $dia["baseAdmin"]         ="Veritabanı Yönet";
  $dia["memoMax"]           ="Betik için İzin verilen hafıza ";
  $dia["execMax"]           ="Betiği için Çalışma süresi";
  $dia["postMax"]           ="Veri göndermek için Boyut sınırı";
  $dia["uploMax"]           ="Yüklenenler için Boyut sınırı";
  $dia["lifeMax"]           ="Oturum süresi";
  $dia["timeMax"]           ="Yüklemeler İçin Oturum Süresi";
  $dia["previewWeb"]        ="Site önizleme aktif";
  $dia["previewAct"]        ="Küçük resimler Aktif";
  $dia["previewPDF"]        ="Pdf Önizleme Aktif";
  $dia["logAct"]            ="Loglar Altif";
  $dia["sepAdr"]            ="Ayrı Adresden";
  $dia["alwaysConfirm"]     ="Her Eklemi Onayla";
  $dia["effectAct"]         ="Görel Efektler Aktif";
  $dia["completePath"]      ="Tam Yolu Göster";
  $dia["openLinkinNewWin"]  ="Bağlantıları Yeni Pencerede Aç";  
  $dia["frameTitle"]        ="Pencere Başlığı";
  $dia["viewClock"]         ="Saat Gmster";
  $dia["diapoSpeed"]        ="Slayt Hızı";
  $dia["diapoStop"]         ="Slaytı Durdur";
  $dia["arboLink"]          ="Bağlantıları Klasör Ağaçında Göster";
  $dia["activeMini"]        ="Küçük resimler Aktif";
  $dia["dynWindow"]         ="Dinamik Pencereler";
  $dia["serverBase"]        ="mySQL server";
  $dia["loginBase"]         ="mySQL login ";
  $dia["passBase"]          ="mySQL password";
  $dia["tableBase"]         ="Toblo Seçin";
  $dia["myPref"]            ="My preferences";
  $dia["privateWS"]         ="Private share";
  $dia["publicWS"]          ="Public share";
  $dia["accountUser"]       ="Users can create their own account";
  
  // Panneau Infos
  $dia["adminRub5"]         ="Bilgiler";
  $dia["infoAdmin"]         ="Özet yükleme bilgileri";
  $dia["theExt"]            ="uzatma";
  $dia["activated"]         ="Aktif.";
  $dia["notActivated"]      ="Pasif.";
  $dia["libZip"]            ="(Posta yönetimi arşivleri)";
  $dia["libGD"]             ="(resimler ve küçük simge yönetimi)";
  $dia["libMB"]             ="(Özel karakterler yönetimi)";
  $dia["libXslt"]           ="(Tamamlayıcı xslt yönetimi)";
  $dia["libFTP"]            ="(Uzak FTP bağlantıları)";
  $dia["libPdf"]            ="(PDF simge yönetimi)";
  $dia["libMail"]           ="(E-posta ile öğeleri gönder)";
  $dia["libExif"]           ="(Ekran Exif Bilgileri)";
  $dia["dontExist"]         ="yoksa.";
  $dia["notAccessible"]     ="erişilebilir değil.";
  $dia["accessProtect"]     ="yazılabilir değil.";
  $dia["isAccessible"]      ="var ve yazılabilir olduğundan.";
  $dia["modulesDetected"]   ="algılandı ve modülleri içeren aşağıdaki:";
  $dia["langDetected"]      ="algılandı ve dil içeren aşağıdaki:";
  $dia["styleDetected"]     ="algılandı ve biçemleri içeren aşağıdaki:";
  $dia["cgiUpNotDetected"]  ="saptanmadı.";
  $dia["cgiUpLimited"]      ="algılandı ama yeterli haklara sahip.";
  $dia["cgiUpDetected"]     ="algılandı ve yeterli haklarına sahip.";
  $dia["unlimitedUpload"]   ="İsterseniz yükleme boyutu sınırı olmadan dosya.";
  $dia["alertfunction1"]    ="Sunucu yapılandırma bazı sınırlamalar empoze etmek gibi,";
  $dia["alertfunction2"]    ="WebShare bazı özelliklerini muhtemelen sınırlı olacaktır.";
  $dia["msgVarNotModif1"]   ="WebShare bu değerleri değiştiremezsiniz. Sorun halinde, ";
  $dia["msgVarNotModif2"]   ="doğrudan dosya 'php.ini' in parametreleri değiştirmek.";
  $dia["msgVarModifiable1"] ="Eğer sorunla karşılaşırsanız, bu değerleri değiştirebilirsiniz";
  $dia["msgVarModifiable2"] ="";
  $dia["tip1"]              ="Belirtilen değerler aslında her yazılım sınırı";
  $dia["tip2"]              ="Oturum ve yüklenenler için saniye ";

  // Panneau Associations
  $dia["adminRub4"]         ="Paylaşım";
  $dia["moduAdmin"]         ="modül Yöneticisi";
  $dia["assoAdmin"]         ="Paylaşım Yöneticisi";
  $dia["extension"]         ="ek";
  $dia["exttype"]           ="Tür";
  $dia["extmime"]           ="Minik";
  $dia["extact1"]           ="Varsayılan Hareket";
  $dia["extact2"]           ="Hareket saniye";
  $dia["toAdd"]             ="Ekle";
  $dia["newStyle"]          ="Yeni Sitil Ekle";
  $dia["newModule"]         ="Yeni Modül Ekle";
  $dia["updateWS"]          ="Güncelleme";
  $dia["noVersionAv"]       ="Yeni Sürüm Bulunamadı";
  $dia["newVersionAv"]      ="Yeni Sürüm Bulundu";
  $dia["newVersion"]        ="yeni sürüm için";  

  // Panneau Logs
  $dia["adminRub6"]         ="Kayıtlar";
  $dia["logsAdmin"]         ="Kayıtları göster";
  $dia["notConnected"]      ="Veritabanına Bağlantı başarısız oldu.lütfen parametreleri kontrol edin.";
  $dia["connectedDB"]       ="Veritabanına bağlılabilir.";
  $dia["msgBase"]           ="Yapılandırma veritabanı şart değil, izleme etkinlikleri (giriş) fonksiyonları kadar aktif olmayacaktır.";
  $dia["noLog"]             ="Kayıtlar Bulunamadı";
  $dia["all"]               ="Tüm";
  $dia["allf"]              ="Tüm";
  $dia["resultInd"]         ="Boş";
  $dia["resultPos"]         ="Pozitif";
  $dia["resultNeg"]         ="Negatif";
  $dia["noLogs"]            ="Bu seçim için herhangi bir işlem";
  $dia["viewAction"]        ="Hareket Göster :";
  $dia["madeBy"]            ="tarafından yapılan";
  $dia["withResult"]        ="ile Sonuç";
  $dia["fromDate"]          ="Dönemi";
  $dia["toDate"]            ="den";
  $dia["ofDate"]            ="Gün Göster";
  $dia["day"]               ="Gün";
  $dia["days"]              ="Günler";
  $dia["exploreShare"]      ="Paylaşım Araştırılıyor";  

  $dia["interrupted"]       ="Sunucu Bağlantısı Kesildi Lütfen Tekrar Deneyin.";

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
  $_SESSION["ws"]["dia"]["noConf"]  ="Hesabınız sunucu veya <br/>kullanıcı tespit edildi. <br/><br/>Git <a href='admin/index.php' style='text-decoration:underline'>Yönetici paneli</a><br/>to configure your accounts. <br/><br/>Consult documentation <br/>for more information.<br/><br/>";
  $_SESSION["ws"]["dia"]["noServer"]="Hesabınız sunucu tespit edilemedi.<br/><br/>Git<a href='admin/index.php' style='text-decoration:underline'>administration panel</a><br/>to configure your accounts. <br/><br/>Consult documentation <br/>for more information.<br/><br/><br/>";
  $_SESSION["ws"]["dia"]["noUser"]  ="No account user was detected. <br/><br/>Go to the <a href='admin/index.php' style='text-decoration:underline'>administration panel</a><br/>to configure your accounts. <br/><br/>Consult documentation <br/>for more information.<br/><br/><br/>";
  $_SESSION["ws"]["dia"]["noJS"]    ="JavaScript aktif değil <br/>tarayıcı ayarlarınızı kontrol edin. <br/><br/>";
  $_SESSION["ws"]["dia"]["protect1"]="To protect your installation, you must define a login and a password that will be asked systematically during your next access.<br/><br/>";
  $_SESSION["ws"]["dia"]["protect2"]="* Password fields must match to check their validity. Enter only alphanumeric characters in the fields.<br/>To change your login later, edit file .htpasswd located in the 'wspasswd' folder.";

  }
?>
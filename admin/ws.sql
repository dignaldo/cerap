CREATE TABLE IF NOT EXISTS `wsbase` ( 
            `pageTitle` tinytext       NULL, 
            `prevWeb`   tinyint(2)     unsigned NOT NULL default '1',
            `prevAct`   tinyint(2)     unsigned NOT NULL default '1',
            `prevPDF`   tinyint(2)     unsigned NOT NULL default '1',
            `activeLog` tinyint(2)     unsigned NOT NULL default '1',
            `vClock`    tinyint(2)     unsigned NOT NULL default '1',
            `effectAct` tinyint(2)     unsigned NOT NULL default '1',
            `sepAdr`    tinyint(2)     unsigned NOT NULL default '1',
            `compPath`  tinyint(2)     unsigned NOT NULL default '1',
            `arboLink`  tinyint(2)     unsigned NOT NULL default '1',
            `autoUserAcc` tinyint(2)   unsigned NOT NULL default '1',
            `dynWin`    tinyint(2)     unsigned NOT NULL default '1',
            `linkWin`   tinyint(2)     unsigned NOT NULL default '1',
            `sendMail`  tinyint(2)     unsigned NOT NULL default '1',
            `actConf`   tinyint(2)     unsigned NOT NULL default '1',
            `clicl`     tinyint(2)     unsigned NOT NULL default '1',
            `clicr`     tinyint(2)     unsigned NOT NULL default '1',
            `clicd`     tinyint(2)     unsigned NOT NULL default '1',
            `memoMax`   varchar(10)    default NULL,
            `execMax`   varchar(10)    default NULL,
            `postMax`   varchar(10)    default NULL,
            `timeMax`   varchar(10)    default NULL,
            `uploMax`   varchar(10)    default NULL,
            `lifeMax`   varchar(10)    default NULL,
            `diapoSp`   int(8)         unsigned NULL
            );
            
CREATE TABLE IF NOT EXISTS `wslog` (
            `idope`     int(10)        unsigned NOT NULL auto_increment, 
            `idaction`  tinyint(8)     unsigned NOT NULL default '1', 
            `idresult`  tinyint(2)     unsigned NOT NULL default '1', 
            `iddate`    datetime       NOT NULL default '0000-00-00 00:00:00',  
            `username`  tinytext       NOT NULL, 
            `path`      tinytext       NOT NULL, 
            `file`      tinytext       NOT NULL, 
            `ipadr`     tinytext       NOT NULL, 
            `verbose`   text           NULL,            
            `content`   text           NULL, 
             PRIMARY KEY (`idope`)
            ) AUTO_INCREMENT=1;
            
CREATE TABLE IF NOT EXISTS `wsuser` ( 
            `idUser`    int(10)        unsigned NOT NULL, 
            `typeUser`  tinyint(3)     unsigned NOT NULL default '1',            
            `nomUser`   varchar(64)    default NULL,
            `mailUser`  varchar(128)   default NULL,
            `logUser`   varchar(64)    default NULL,
            `passUser`  varchar(64)    default NULL,
            `serveurs`  varchar(512)   default NULL,
            `langUser`  varchar(64)    default NULL,
            `styleUser` varchar(64)    default NULL,
            `visuUser`  varchar(64)    default NULL,
            `triUser`   varchar(64)    default NULL,
            `varsUser`  tinytext       NOT NULL, 
            `webUser`   tinyint(2)     unsigned NOT NULL default '1', 
            `arboUser`  tinyint(2)     unsigned NOT NULL default '1', 
            `publicUser` varchar(2)    NULL,
            `auth1`     varchar(2)     NULL default 'on',
            `auth2`     varchar(2)     NULL default 'on',
            `auth3`     varchar(2)     NULL default 'on',
            `auth4`     varchar(2)     NULL default 'on',
            `auth5`     varchar(2)     NULL default 'on',
            `auth6`     varchar(2)     NULL default 'on',
            `auth7`     varchar(2)     NULL default 'on',
            `auth8`     varchar(2)     NULL default 'on',
             PRIMARY KEY (`idUser`)            
            );
            
CREATE TABLE IF NOT EXISTS `wsserver` (
            `idServeur`    int(10)     unsigned NOT NULL,
            `typeServeur`  tinyint(2)  unsigned NOT NULL default '1',
            `triServeur`   tinytext    NOT NULL,
            `nomServeur`   tinytext    NOT NULL, 
            `rootServeur`  tinytext    NOT NULL, 
            `repServeur`   tinytext    NOT NULL, 
            `startServeur` tinytext    NOT NULL, 
            `adrServeur`   tinytext    NOT NULL, 
            `logServeur`   tinytext    NOT NULL, 
            `passServeur`  tinytext    NOT NULL, 
            `portServeur`  tinytext    NOT NULL,
            `webServeur`   tinytext    NOT NULL,
            `protectIndex` tinyint(2)  unsigned NOT NULL default '1',
            `protectHtacc` tinyint(2)  unsigned NOT NULL default '1',
            `binServeur`   tinyint(2)  unsigned NOT NULL default '1',
          `protectServeur` tinyint(2)  unsigned NOT NULL default '1',
           `publicServeur` tinyint(2)  unsigned NOT NULL default '1',
             PRIMARY KEY (`idServeur`)
            );
            
CREATE TABLE IF NOT EXISTS `wsasso` (
            `idasso`       int(10)     unsigned NOT NULL auto_increment, 
            `type`         varchar(10) default NULL,
            `libelle`      varchar(64) default NULL,
            `mime`         varchar(64) default NULL,
            `action1`      varchar(64) default NULL,
            `action2`      varchar(64) default NULL,
             PRIMARY KEY (`idasso`)
            ) AUTO_INCREMENT=1;
              
CREATE TABLE IF NOT EXISTS `wsfiles` (
            `idfiles`      int(10)     unsigned NOT NULL auto_increment, 
            `idUser`       int(10)     unsigned NOT NULL,
            `idServeur`    int(10)     unsigned NOT NULL,
            `username`     tinytext    NOT NULL,
            `nomServeur`   tinytext    NOT NULL,
            `path`         tinytext    NOT NULL,
            `file`         tinytext    NOT NULL,
            `commentaires` text        NULL,
            `version`      tinytext    NULL,
            `viewed`       int(8)      NULL,
            `favoris`      tinyint(2)  unsigned NOT NULL default '0',
            `changed`      tinyint(2)  NULL ,
            `locked`       tinyint(2)  NULL ,
             PRIMARY KEY (`idfiles`)
            ) AUTO_INCREMENT=1;
            
 ALTER TABLE `wsbase` CHANGE `pageTitle` `pageTitle` TINYTEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
 ALTER TABLE `wslog`  CHANGE `username`  `username`  TINYTEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
 ALTER TABLE `wslog`  CHANGE `path`      `path`      TINYTEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
 ALTER TABLE `wslog`  CHANGE `file`      `file`      TINYTEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
 ALTER TABLE `wslog`  CHANGE `ipadr`     `ipadr`     TINYTEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
 ALTER TABLE `wslog`  CHANGE `verbose`   `verbose`   TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
 ALTER TABLE `wslog`  CHANGE `content`   `content`   TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

            
INSERT INTO `wsbase` (`pageTitle`, `prevWeb`, `prevAct`, `prevPDF`, `activeLog`,
   `vClock`, `effectAct`, `sepAdr`, `compPath`, `arboLink`, `dynWin`,  
   `linkWin`, `sendMail`, `actConf`, `clicl`, `clicr`, `clicd`, `memoMax`, 
   `execMax`, `postMax`, `timeMax`, `uploMax`, `lifeMax`, `diapoSp`) VALUES 
   ('Webshare', 1, 1, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 
    NULL, NULL, NULL, NULL, NULL, NULL, 5000);
            
            
INSERT INTO `wsuser` (`idUser`, `typeUser`, `nomUser`, `logUser`, `passUser`, 
   `serveurs`, `langUser`, `styleUser`, `visuUser`, `triUser`, `varsUser`, 
   `webUser`, `arboUser`, `auth1`, `auth2`, `auth3`, `auth4`, `auth5`, `auth6`, 
   `auth7`, `auth8`) VALUES 
   (0, 1, 'webAdmin', 'root', '63a9f0ea7bb98050796b649e85481845', 'Documents',
   'Auto', 'Standard', 'miniatures', 'extension',
   'webshare|admin|pass|moteur|htaccess|htpass|php|asp$|aspx$|ini$|pl$|cgi|js$|jsp$|dhtml$|cfm$|htm|sessions|Thumbs|wsminis|old$|~|^[.]{1}|^[.]{2}',
   0, 1, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on');
            
            
INSERT INTO `wsserver` (`idServeur`, `typeServeur`, `triServeur`, `nomServeur`, 
   `rootServeur`, `repServeur`, `startServeur`, `adrServeur`, `logServeur`, 
   `passServeur`, `portServeur`, `protectIndex`, `protectHtacc`, `binServeur`, 
   `protectServeur`) VALUES 
   (0, 1, 0, 'Documents', '$mydoc$', '', '', '', '', '', '', 0, 0, 0, 0);
   
            
INSERT INTO `wsasso` (`idasso`, `type`, `libelle`, `mime`, `action1`, `action2`) VALUES 
( 1, 'jpeg', 'Image Jpeg', 'image/jpeg', '6', '3'),
( 2, 'jpg', 'Image Jpeg', 'image/jpeg', '6', '3'),
( 3, 'png', 'Image Png', 'image/png', '6', '3'),
( 4, 'gif', 'Image Gif', 'image/gif', '6', '3'),
( 5, 'tif', 'Image Tiff', 'image/tiff', '2', '3'),
( 6, 'bmp', 'Image Bitmap', 'image/bmp', '6', '3'),
( 7, 'psd', 'Image Photoshop', 'x-vnd.adobe.photoshop', '2', '3'),
( 8, 'ai', 'Document Illustrator', 'application/postscript', '2', '3'),
( 9, 'indd', 'Document Indesign', 'application/postscript', '2', '3'),
(10, 'eps', 'Fichier PostScript', 'application/postscript', '3', '3'),
(11, 'ps', 'Fichier PostScript', 'application/postscript', '3', '3'),
(12, 'ttf', 'Fonte TrueType', 'application/x-font-TrueType', '3', '3'),
(13, 'otf', 'Fonte OpenType', 'application/x-font-TrueType', '3', '3'),
(14, 'pdf', 'Document portable', 'application/pdf', '1', '3'),
(15, 'doc', 'Document Word', 'application/msword', '2', '3'),
(16, 'xls', 'Classeur Excel', 'application/vnd.ms-excel', '2', '3'),
(17, 'ppt', 'Presentation Powerpoint', 'application/vnd.ms-powerpoint', '2', '3'),
(18, 'odt', 'Traitement de texte', 'application/vnd.oasis.opendocument.text', '2', '3'),
(19, 'ods', 'Tableur', 'application/vnd.oasis.opendocument.spreadsheet', '2', '3'),
(20, 'odp', 'Presentation', 'application/vnd.oasis.opendocument.presentation', '2', '3'),
(21, 'odg', 'Dessin', 'application/vnd.oasis.opendocument.graphics', '2', '3'),
(22, 'odf', 'Formule', 'application/vnd.oasis.opendocument.formula', '2', '3'),
(23, 'odb', 'Base de donnees', 'application/vnd.oasis.opendocument.database', '2', '3'),
(24, 'htm', 'Page web', 'text/html', '5', '1'),
(25, 'html', 'Page web', 'text/html', '5', '1'),
(26, 'xml', 'Document Xml', 'text/xml', '1', '2'),
(27, 'rss', 'Flux RSS', 'text/xml', '1', '2'),
(28, 'url', 'Lien Internet', 'text/plain', '5', 'editor'),
(29, 'rtf', 'Texte enrichi', 'application/rtf', '2', '3'),
(30, 'txt', 'Document texte', 'text/plain', '1', 'editor'),
(31, 'ini', 'Fichier de configuration', 'text/plain', '2', 'editor'),
(32, 'c', 'Script C', 'text/plain', '2', 'editor'),
(33, 'cpp', 'Script Cpp', 'text/plain', '2', 'editor'),
(34, 'php', 'Script PHP', 'text/plain', '1', 'editor'),
(35, 'asp', 'Script ASP', 'text/plain', '2', 'editor'),
(36, 'aspx', 'Script ASP.NET', 'text/plain', '2', 'editor'),
(37, 'js', 'Script Javascript', 'application/javascript', '2', 'editor'),
(38, 'css', 'Fichier de style', 'text/css', '1', 'editor'),
(39, 'sql', 'Base MySQL', 'text/plain', '1', '3'),
(40, 'log', 'Fichier de log', 'text/plain', '1', '3'),
(41, 'mp3', 'Audio MP3', 'audio/mp3', 'mp3player', 'flvplayer'),
(42, 'ogg', 'Audio Ogg', 'application/ogg', 'mp3player', '3'),
(43, 'wav', 'Fichier audio', 'audio/x-wav', '2', '3'),
(44, 'mid', 'Fichier midi', 'audio/x-midi', '2', '3'),
(45, 'm3u', 'Playlist audio', 'text/plain', '1', 'editor'),
(46, 'ra', 'RealMedia', 'audio/vnd.rn-realaudio', 'rmplayer', '3'),
(47, 'mov', 'Video Quicktime', 'video/mov', 'qtplayer', '3'),
(48, 'qt', 'Video Quicktime', 'video/quicktime', 'qtplayer', '3'),
(49, 'mpg', 'Video Mpeg', 'video/mpeg', 'mpgplayer', '3'),
(50, 'mpeg', 'Video Mpeg', 'video/mpeg', 'mpgplayer', '3'),
(51, 'wmv', 'Video Windows Media', 'video/msvideo', 'aviplayer', '3'),
(52, 'avi', 'Video Avi', 'video/msvideo', 'aviplayer', '3'),
(53, 'divx', 'Video Divx', 'video/divx', 'aviplayer', '3'),
(54, 'flv', 'Video Flash', 'video/flash', 'flvplayer', '3'),
(55, 'fla', 'Document Flash', 'application/x-flash', '2', '3'),
(56, 'swf', 'Animation Flash', 'application/x-shockwave-flash', '1', '3'),
(57, 'zip', 'Archive Zip', 'application/zip', '10', '3'),
(58, 'rar', 'Archive Rar', 'application/zip', '2', '3'),
(59, 'tar', 'Archive Tar', 'application/x-tar', '10', '3'),
(60, 'gz', 'Archive Tar', 'application/x-tar', '10', '3'),
(61, 'iso', 'Image disque', 'application/octet-stream', '3', '3'),
(62, 'java', 'Script Java', 'application/octet-stream', '3', '3'),
(63, 'dll', 'Librairie dynamique', 'application/octet-stream', '3', '3'),
(64, 'exe', 'Executable Windows', 'application/octet-stream', '3', '3'),
(65, 'tmp', 'Fichier temporaire', 'application/octet-stream', '3', '3'),
(66, 'docx', 'Document Word', 'application/msword', '2', '3'),
(67, 'xlsx', 'Classeur Excel', 'application/vnd.ms-excel', '2', '3'),
(68, 'pptx', 'Presentation Powerpoint', 'application/vnd.ms-powerpoint', '2', '3'),
(69, 'icc', 'Profil colorimétrique', 'application/octet-stream', '2', '3');
            
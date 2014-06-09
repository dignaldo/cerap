/*
MySQL Data Transfer
Source Host: localhost
Source Database: cerap
Target Host: localhost
Target Database: cerap
Date: 28/08/2013 11:10:16
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for wsasso
-- ----------------------------
DROP TABLE IF EXISTS `wsasso`;
CREATE TABLE `wsasso` (
  `idasso` int(10) unsigned NOT NULL auto_increment,
  `type` varchar(10) default NULL,
  `libelle` varchar(64) default NULL,
  `mime` varchar(64) default NULL,
  `action1` varchar(64) default NULL,
  `action2` varchar(64) default NULL,
  PRIMARY KEY  (`idasso`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for wsbase
-- ----------------------------
DROP TABLE IF EXISTS `wsbase`;
CREATE TABLE `wsbase` (
  `pageTitle` tinytext character set utf8 collate utf8_unicode_ci,
  `prevWeb` tinyint(2) unsigned NOT NULL default '1',
  `prevAct` tinyint(2) unsigned NOT NULL default '1',
  `prevPDF` tinyint(2) unsigned NOT NULL default '1',
  `activeLog` tinyint(2) unsigned NOT NULL default '1',
  `vClock` tinyint(2) unsigned NOT NULL default '1',
  `effectAct` tinyint(2) unsigned NOT NULL default '1',
  `sepAdr` tinyint(2) unsigned NOT NULL default '1',
  `compPath` tinyint(2) unsigned NOT NULL default '1',
  `arboLink` tinyint(2) unsigned NOT NULL default '1',
  `autoUserAcc` tinyint(2) unsigned NOT NULL default '1',
  `dynWin` tinyint(2) unsigned NOT NULL default '1',
  `linkWin` tinyint(2) unsigned NOT NULL default '1',
  `sendMail` tinyint(2) unsigned NOT NULL default '1',
  `actConf` tinyint(2) unsigned NOT NULL default '1',
  `clicl` tinyint(2) unsigned NOT NULL default '1',
  `clicr` tinyint(2) unsigned NOT NULL default '1',
  `clicd` tinyint(2) unsigned NOT NULL default '1',
  `memoMax` varchar(10) default NULL,
  `execMax` varchar(10) default NULL,
  `postMax` varchar(10) default NULL,
  `timeMax` varchar(10) default NULL,
  `uploMax` varchar(10) default NULL,
  `lifeMax` varchar(10) default NULL,
  `diapoSp` int(8) unsigned default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for wsfiles
-- ----------------------------
DROP TABLE IF EXISTS `wsfiles`;
CREATE TABLE `wsfiles` (
  `idfiles` int(10) unsigned NOT NULL auto_increment,
  `idUser` int(10) unsigned NOT NULL,
  `idServeur` int(10) unsigned NOT NULL,
  `username` tinytext NOT NULL,
  `nomServeur` tinytext NOT NULL,
  `path` tinytext NOT NULL,
  `file` tinytext NOT NULL,
  `commentaires` text,
  `version` tinytext,
  `viewed` int(8) default NULL,
  `favoris` tinyint(2) unsigned NOT NULL default '0',
  `changed` tinyint(2) default NULL,
  `locked` tinyint(2) default NULL,
  PRIMARY KEY  (`idfiles`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for wslog
-- ----------------------------
DROP TABLE IF EXISTS `wslog`;
CREATE TABLE `wslog` (
  `idope` int(10) unsigned NOT NULL auto_increment,
  `idaction` tinyint(8) unsigned NOT NULL default '1',
  `idresult` tinyint(2) unsigned NOT NULL default '1',
  `iddate` datetime NOT NULL default '0000-00-00 00:00:00',
  `username` tinytext character set utf8 collate utf8_unicode_ci,
  `path` tinytext character set utf8 collate utf8_unicode_ci,
  `file` tinytext character set utf8 collate utf8_unicode_ci,
  `ipadr` tinytext character set utf8 collate utf8_unicode_ci,
  `verbose` text character set utf8 collate utf8_unicode_ci,
  `content` text character set utf8 collate utf8_unicode_ci,
  PRIMARY KEY  (`idope`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for wsserver
-- ----------------------------
DROP TABLE IF EXISTS `wsserver`;
CREATE TABLE `wsserver` (
  `idServeur` int(10) unsigned NOT NULL,
  `typeServeur` tinyint(2) unsigned NOT NULL default '1',
  `triServeur` tinytext NOT NULL,
  `nomServeur` tinytext NOT NULL,
  `rootServeur` tinytext NOT NULL,
  `repServeur` tinytext NOT NULL,
  `startServeur` tinytext NOT NULL,
  `adrServeur` tinytext NOT NULL,
  `logServeur` tinytext NOT NULL,
  `passServeur` tinytext NOT NULL,
  `portServeur` tinytext NOT NULL,
  `webServeur` tinytext NOT NULL,
  `protectIndex` tinyint(2) unsigned NOT NULL default '1',
  `protectHtacc` tinyint(2) unsigned NOT NULL default '1',
  `binServeur` tinyint(2) unsigned NOT NULL default '1',
  `protectServeur` tinyint(2) unsigned NOT NULL default '1',
  `publicServeur` tinyint(2) unsigned NOT NULL default '1',
  PRIMARY KEY  (`idServeur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for wsuser
-- ----------------------------
DROP TABLE IF EXISTS `wsuser`;
CREATE TABLE `wsuser` (
  `idUser` int(10) unsigned NOT NULL,
  `typeUser` tinyint(3) unsigned NOT NULL default '1',
  `nomUser` varchar(64) default NULL,
  `mailUser` varchar(128) default NULL,
  `logUser` varchar(64) default NULL,
  `passUser` varchar(64) default NULL,
  `serveurs` varchar(512) default NULL,
  `langUser` varchar(64) default NULL,
  `styleUser` varchar(64) default NULL,
  `visuUser` varchar(64) default NULL,
  `triUser` varchar(64) default NULL,
  `varsUser` tinytext NOT NULL,
  `webUser` tinyint(2) unsigned NOT NULL default '1',
  `arboUser` tinyint(2) unsigned NOT NULL default '1',
  `publicUser` varchar(2) default NULL,
  `auth1` varchar(2) default 'on',
  `auth2` varchar(2) default 'on',
  `auth3` varchar(2) default 'on',
  `auth4` varchar(2) default 'on',
  `auth5` varchar(2) default 'on',
  `auth6` varchar(2) default 'on',
  `auth7` varchar(2) default 'on',
  `auth8` varchar(2) default 'on',
  PRIMARY KEY  (`idUser`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `wsasso` VALUES ('1', 'jpeg', 'Image Jpeg', 'image/jpeg', '6', '3');
INSERT INTO `wsasso` VALUES ('2', 'jpg', 'Image Jpeg', 'image/jpeg', '6', '3');
INSERT INTO `wsasso` VALUES ('3', 'png', 'Image Png', 'image/png', '6', '3');
INSERT INTO `wsasso` VALUES ('4', 'gif', 'Image Gif', 'image/gif', '6', '3');
INSERT INTO `wsasso` VALUES ('5', 'tif', 'Image Tiff', 'image/tiff', '2', '3');
INSERT INTO `wsasso` VALUES ('6', 'bmp', 'Image Bitmap', 'image/bmp', '6', '3');
INSERT INTO `wsasso` VALUES ('7', 'psd', 'Image Photoshop', 'x-vnd.adobe.photoshop', '2', '3');
INSERT INTO `wsasso` VALUES ('8', 'ai', 'Document Illustrator', 'application/postscript', '2', '3');
INSERT INTO `wsasso` VALUES ('9', 'indd', 'Document Indesign', 'application/postscript', '2', '3');
INSERT INTO `wsasso` VALUES ('10', 'eps', 'Fichier PostScript', 'application/postscript', '3', '3');
INSERT INTO `wsasso` VALUES ('11', 'ps', 'Fichier PostScript', 'application/postscript', '3', '3');
INSERT INTO `wsasso` VALUES ('12', 'ttf', 'Fonte TrueType', 'application/x-font-TrueType', '3', '3');
INSERT INTO `wsasso` VALUES ('13', 'otf', 'Fonte OpenType', 'application/x-font-TrueType', '3', '3');
INSERT INTO `wsasso` VALUES ('14', 'pdf', 'Document portable', 'application/pdf', '1', '3');
INSERT INTO `wsasso` VALUES ('15', 'doc', 'Document Word', 'application/msword', '2', '3');
INSERT INTO `wsasso` VALUES ('16', 'xls', 'Classeur Excel', 'application/vnd.ms-excel', '2', '3');
INSERT INTO `wsasso` VALUES ('17', 'ppt', 'Presentation Powerpoint', 'application/vnd.ms-powerpoint', '2', '3');
INSERT INTO `wsasso` VALUES ('18', 'odt', 'Traitement de texte', 'application/vnd.oasis.opendocument.text', '2', '3');
INSERT INTO `wsasso` VALUES ('19', 'ods', 'Tableur', 'application/vnd.oasis.opendocument.spreadsheet', '2', '3');
INSERT INTO `wsasso` VALUES ('20', 'odp', 'Presentation', 'application/vnd.oasis.opendocument.presentation', '2', '3');
INSERT INTO `wsasso` VALUES ('21', 'odg', 'Dessin', 'application/vnd.oasis.opendocument.graphics', '2', '3');
INSERT INTO `wsasso` VALUES ('22', 'odf', 'Formule', 'application/vnd.oasis.opendocument.formula', '2', '3');
INSERT INTO `wsasso` VALUES ('23', 'odb', 'Base de donnees', 'application/vnd.oasis.opendocument.database', '2', '3');
INSERT INTO `wsasso` VALUES ('24', 'htm', 'Page web', 'text/html', '5', '1');
INSERT INTO `wsasso` VALUES ('25', 'html', 'Page web', 'text/html', '5', '1');
INSERT INTO `wsasso` VALUES ('26', 'xml', 'Document Xml', 'text/xml', '1', '2');
INSERT INTO `wsasso` VALUES ('27', 'rss', 'Flux RSS', 'text/xml', '1', '2');
INSERT INTO `wsasso` VALUES ('28', 'url', 'Lien Internet', 'text/plain', '5', 'editor');
INSERT INTO `wsasso` VALUES ('29', 'rtf', 'Texte enrichi', 'application/rtf', '2', '3');
INSERT INTO `wsasso` VALUES ('30', 'txt', 'Document texte', 'text/plain', '1', 'editor');
INSERT INTO `wsasso` VALUES ('31', 'ini', 'Fichier de configuration', 'text/plain', '2', 'editor');
INSERT INTO `wsasso` VALUES ('32', 'c', 'Script C', 'text/plain', '2', 'editor');
INSERT INTO `wsasso` VALUES ('33', 'cpp', 'Script Cpp', 'text/plain', '2', 'editor');
INSERT INTO `wsasso` VALUES ('34', 'php', 'Script PHP', 'text/plain', '1', 'editor');
INSERT INTO `wsasso` VALUES ('35', 'asp', 'Script ASP', 'text/plain', '2', 'editor');
INSERT INTO `wsasso` VALUES ('36', 'aspx', 'Script ASP.NET', 'text/plain', '2', 'editor');
INSERT INTO `wsasso` VALUES ('37', 'js', 'Script Javascript', 'application/javascript', '2', 'editor');
INSERT INTO `wsasso` VALUES ('38', 'css', 'Fichier de style', 'text/css', '1', 'editor');
INSERT INTO `wsasso` VALUES ('39', 'sql', 'Base MySQL', 'text/plain', '1', '3');
INSERT INTO `wsasso` VALUES ('40', 'log', 'Fichier de log', 'text/plain', '1', '3');
INSERT INTO `wsasso` VALUES ('41', 'mp3', 'Audio MP3', 'audio/mp3', 'mp3player', 'flvplayer');
INSERT INTO `wsasso` VALUES ('42', 'ogg', 'Audio Ogg', 'application/ogg', 'mp3player', '3');
INSERT INTO `wsasso` VALUES ('43', 'wav', 'Fichier audio', 'audio/x-wav', '2', '3');
INSERT INTO `wsasso` VALUES ('44', 'mid', 'Fichier midi', 'audio/x-midi', '2', '3');
INSERT INTO `wsasso` VALUES ('45', 'm3u', 'Playlist audio', 'text/plain', '1', 'editor');
INSERT INTO `wsasso` VALUES ('46', 'ra', 'RealMedia', 'audio/vnd.rn-realaudio', 'rmplayer', '3');
INSERT INTO `wsasso` VALUES ('47', 'mov', 'Video Quicktime', 'video/mov', 'qtplayer', '3');
INSERT INTO `wsasso` VALUES ('48', 'qt', 'Video Quicktime', 'video/quicktime', 'qtplayer', '3');
INSERT INTO `wsasso` VALUES ('49', 'mpg', 'Video Mpeg', 'video/mpeg', 'mpgplayer', '3');
INSERT INTO `wsasso` VALUES ('50', 'mpeg', 'Video Mpeg', 'video/mpeg', 'mpgplayer', '3');
INSERT INTO `wsasso` VALUES ('51', 'wmv', 'Video Windows Media', 'video/msvideo', 'aviplayer', '3');
INSERT INTO `wsasso` VALUES ('52', 'avi', 'Video Avi', 'video/msvideo', 'aviplayer', '3');
INSERT INTO `wsasso` VALUES ('53', 'divx', 'Video Divx', 'video/divx', 'aviplayer', '3');
INSERT INTO `wsasso` VALUES ('54', 'flv', 'Video Flash', 'video/flash', 'flvplayer', '3');
INSERT INTO `wsasso` VALUES ('55', 'fla', 'Document Flash', 'application/x-flash', '2', '3');
INSERT INTO `wsasso` VALUES ('56', 'swf', 'Animation Flash', 'application/x-shockwave-flash', '1', '3');
INSERT INTO `wsasso` VALUES ('57', 'zip', 'Archive Zip', 'application/zip', '10', '3');
INSERT INTO `wsasso` VALUES ('58', 'rar', 'Archive Rar', 'application/zip', '2', '3');
INSERT INTO `wsasso` VALUES ('59', 'tar', 'Archive Tar', 'application/x-tar', '10', '3');
INSERT INTO `wsasso` VALUES ('60', 'gz', 'Archive Tar', 'application/x-tar', '10', '3');
INSERT INTO `wsasso` VALUES ('61', 'iso', 'Image disque', 'application/octet-stream', '3', '3');
INSERT INTO `wsasso` VALUES ('62', 'java', 'Script Java', 'application/octet-stream', '3', '3');
INSERT INTO `wsasso` VALUES ('63', 'dll', 'Librairie dynamique', 'application/octet-stream', '3', '3');
INSERT INTO `wsasso` VALUES ('64', 'exe', 'Executable Windows', 'application/octet-stream', '3', '3');
INSERT INTO `wsasso` VALUES ('65', 'tmp', 'Fichier temporaire', 'application/octet-stream', '3', '3');
INSERT INTO `wsasso` VALUES ('66', 'docx', 'Document Word', 'application/msword', '2', '3');
INSERT INTO `wsasso` VALUES ('67', 'xlsx', 'Classeur Excel', 'application/vnd.ms-excel', '2', '3');
INSERT INTO `wsasso` VALUES ('68', 'pptx', 'Presentation Powerpoint', 'application/vnd.ms-powerpoint', '2', '3');
INSERT INTO `wsasso` VALUES ('69', 'icc', 'Profil colorimétrique', 'application/octet-stream', '2', '3');
INSERT INTO `wsbase` VALUES ('CERAP', '1', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '1', '1', '24M', '600', '512M', '60', '512M', '1440', '5000');
INSERT INTO `wslog` VALUES ('1', '20', '1', '2013-08-26 11:40:33', 'Francisco', '', 'Private', '192.168.1.86', 'Conectado como  Francisco', '');
INSERT INTO `wslog` VALUES ('2', '1', '1', '2013-08-26 11:40:34', 'Francisco', '/', '', '192.168.1.86', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('3', '2', '1', '2013-08-26 11:40:35', 'Francisco', '/', '-', '192.168.1.86', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('4', '20', '1', '2013-08-26 11:45:20', 'Francisco', '', 'Private', '192.168.1.86', 'Conectado como  Francisco', '');
INSERT INTO `wslog` VALUES ('5', '2', '1', '2013-08-26 11:45:22', 'Francisco', '', '-', '192.168.1.86', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('6', '1', '1', '2013-08-26 11:45:23', 'Francisco', '/', '', '192.168.1.86', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('7', '7', '1', '2013-08-26 11:45:57', 'Francisco', '/', 'Videos', '192.168.1.86', 'La nueva carpeta \'Videos\' ha sido  creado con éxito', '');
INSERT INTO `wslog` VALUES ('8', '1', '1', '2013-08-26 11:45:57', 'Francisco', '/', '', '192.168.1.86', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('9', '2', '1', '2013-08-26 11:45:58', 'Francisco', '/', '-', '192.168.1.86', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('10', '1', '1', '2013-08-26 11:46:06', 'Francisco', '/Videos', 'Videos', '192.168.1.86', 'Navegando  /Videos', '');
INSERT INTO `wslog` VALUES ('11', '1', '1', '2013-08-26 11:46:13', 'Francisco', '/', '', '192.168.1.86', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('12', '1', '1', '2013-08-26 11:46:16', 'Francisco', '/Videos', 'Videos', '192.168.1.86', 'Navegando  /Videos', '');
INSERT INTO `wslog` VALUES ('13', '20', '1', '2013-08-26 11:47:14', 'Francisco', '', 'Private', '192.168.1.86', 'Conectado como  Francisco', '');
INSERT INTO `wslog` VALUES ('14', '2', '1', '2013-08-26 11:47:16', 'Francisco', '', '-', '192.168.1.86', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('15', '1', '1', '2013-08-26 11:47:17', 'Francisco', '/', '', '192.168.1.86', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('16', '1', '1', '2013-08-26 11:47:22', 'Francisco', '/Videos', 'Videos', '192.168.1.86', 'Navegando  /Videos', '');
INSERT INTO `wslog` VALUES ('17', '1', '1', '2013-08-26 11:47:26', 'Francisco', '/Videos', 'Videos', '192.168.1.86', 'Navegando  /Videos', '');
INSERT INTO `wslog` VALUES ('18', '2', '1', '2013-08-26 12:03:10', 'Francisco', '/Videos', '-', '192.168.1.86', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('19', '1', '1', '2013-08-26 12:03:11', 'Francisco', '/Videos', 'Videos', '192.168.1.86', 'Navegando  /Videos', '');
INSERT INTO `wslog` VALUES ('20', '1', '1', '2013-08-26 12:04:06', 'Francisco', '/Read me', 'Read me', '192.168.1.86', 'Navegando  /Read me', '');
INSERT INTO `wslog` VALUES ('21', '1', '1', '2013-08-26 12:04:28', 'Francisco', '/', '', '192.168.1.86', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('22', '1', '1', '2013-08-26 12:05:03', 'Francisco', '/', '', '192.168.1.86', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('23', '3', '1', '2013-08-26 12:05:10', 'Francisco', '/', 'Carta de tio.odt', '192.168.1.86', 'Guardando archivo  Carta de tio.odt', '');
INSERT INTO `wslog` VALUES ('24', '3', '1', '2013-08-26 12:05:30', 'Francisco', '/', 'Carta de tio.odt', '192.168.1.86', 'Guardando archivo  Carta de tio.odt', '');
INSERT INTO `wslog` VALUES ('25', '13', '1', '2013-08-26 12:05:36', 'Francisco', 'C:/AppServ/www/cerap/Documents//Carta de tio.odt', 'Carta de tio.odt', '192.168.1.86', 'El archivo  \'Carta de tio.odt\' ha sido   eliminado con éxito', '');
INSERT INTO `wslog` VALUES ('26', '1', '1', '2013-08-26 12:05:36', 'Francisco', '/', '', '192.168.1.86', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('27', '1', '1', '2013-08-26 12:08:12', 'Francisco', '/', '', '192.168.1.86', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('28', '13', '1', '2013-08-26 12:08:18', 'Francisco', 'C:/AppServ/www/cerap/Documents//Videos', 'Videos', '192.168.1.86', 'La carpeta  \'Videos\' ha sido   eliminado con éxito', '');
INSERT INTO `wslog` VALUES ('29', '1', '1', '2013-08-26 12:08:19', 'Francisco', '/', '', '192.168.1.86', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('30', '2', '1', '2013-08-26 12:08:20', 'Francisco', '/', '-', '192.168.1.86', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('31', '1', '1', '2013-08-26 12:08:22', 'Francisco', '/Read me', 'Read me', '192.168.1.86', 'Navegando  /Read me', '');
INSERT INTO `wslog` VALUES ('32', '13', '1', '2013-08-26 12:08:28', 'Francisco', 'C:/AppServ/www/cerap/Documents//Read me/Site officiel.url', 'Site officiel.url', '192.168.1.86', 'El archivo  \'Site officiel.url\' ha sido   eliminado con éxito', '');
INSERT INTO `wslog` VALUES ('33', '1', '1', '2013-08-26 12:08:28', 'Francisco', '/Read me', 'Read me', '192.168.1.86', 'Navegando  /Read me', '');
INSERT INTO `wslog` VALUES ('34', '1', '1', '2013-08-26 12:08:32', 'Francisco', '/Read me/DE', 'DE', '192.168.1.86', 'Navegando  /Read me/DE', '');
INSERT INTO `wslog` VALUES ('35', '3', '1', '2013-08-26 12:08:49', 'Francisco', '/Read me/DE', 'README', '192.168.1.86', 'Guardando archivo  README', '');
INSERT INTO `wslog` VALUES ('36', '18', '1', '2013-08-26 12:09:06', 'Francisco', '/Read me/DE', 'README.txt', '192.168.1.86', 'Empezar a editar el archivo  README.txt', '');
INSERT INTO `wslog` VALUES ('37', '20', '1', '2013-08-26 12:09:44', 'webAdmin', '', 'Private', '192.168.1.86', 'Conectado como  webAdmin', '');
INSERT INTO `wslog` VALUES ('38', '2', '1', '2013-08-26 12:09:47', 'webAdmin', '', '-', '192.168.1.86', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('39', '1', '1', '2013-08-26 12:09:48', 'webAdmin', '/', '', '192.168.1.86', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('40', '20', '1', '2013-08-26 19:08:12', 'webAdmin', '', 'Private', '192.168.1.165', 'Connected as  webAdmin', '');
INSERT INTO `wslog` VALUES ('41', '2', '1', '2013-08-26 19:08:14', 'webAdmin', '', '-', '192.168.1.165', 'Exploring share  Documents', '');
INSERT INTO `wslog` VALUES ('42', '1', '1', '2013-08-26 19:08:17', 'webAdmin', '/', '', '192.168.1.165', 'Browsing  /', '');
INSERT INTO `wslog` VALUES ('43', '20', '1', '2013-08-26 19:09:31', 'webAdmin', '', 'Private', '192.168.1.165', 'Connected as  webAdmin', '');
INSERT INTO `wslog` VALUES ('44', '2', '1', '2013-08-26 19:09:32', 'webAdmin', '', '-', '192.168.1.165', 'Exploring share  Documents', '');
INSERT INTO `wslog` VALUES ('45', '1', '1', '2013-08-26 19:09:34', 'webAdmin', '/', '', '192.168.1.165', 'Browsing  /', '');
INSERT INTO `wslog` VALUES ('46', '20', '1', '2013-08-27 18:02:12', 'webAdmin', '', 'Private', '127.0.0.1', 'Conectado como  webAdmin', '');
INSERT INTO `wslog` VALUES ('47', '2', '1', '2013-08-27 18:02:15', 'webAdmin', '', '-', '127.0.0.1', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('48', '1', '1', '2013-08-27 18:02:16', 'webAdmin', '/', '', '127.0.0.1', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('49', '13', '1', '2013-08-27 18:04:32', 'webAdmin', 'C:/AppServ/www/cerap/Documents//Read me', 'Read me', '127.0.0.1', 'La carpeta  \'Read me\' ha sido   eliminado con éxito', '');
INSERT INTO `wslog` VALUES ('50', '1', '1', '2013-08-27 18:04:33', 'webAdmin', '/', '', '127.0.0.1', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('51', '2', '1', '2013-08-27 18:04:34', 'webAdmin', '/', '-', '127.0.0.1', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('52', '2', '1', '2013-08-28 09:57:20', 'webAdmin', '/', '-', '127.0.0.1', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('53', '1', '1', '2013-08-28 09:57:22', 'webAdmin', '/', '', '127.0.0.1', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('54', '2', '1', '2013-08-28 10:03:45', 'webAdmin', '/', '-', '127.0.0.1', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('55', '1', '1', '2013-08-28 10:03:46', 'webAdmin', '/', '', '127.0.0.1', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('56', '2', '1', '2013-08-28 10:04:54', 'webAdmin', '/', '-', '127.0.0.1', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('57', '1', '1', '2013-08-28 10:04:54', 'webAdmin', '/', '', '127.0.0.1', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('58', '2', '1', '2013-08-28 10:05:39', 'webAdmin', '/', '-', '127.0.0.1', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('59', '1', '1', '2013-08-28 10:05:40', 'webAdmin', '/', '', '127.0.0.1', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('60', '2', '1', '2013-08-28 10:06:10', 'webAdmin', '/', '-', '127.0.0.1', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('61', '1', '1', '2013-08-28 10:06:11', 'webAdmin', '/', '', '127.0.0.1', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('62', '1', '1', '2013-08-28 10:06:15', 'webAdmin', '/', '', '127.0.0.1', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('63', '2', '1', '2013-08-28 10:14:09', 'webAdmin', '/', '-', '127.0.0.1', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('64', '1', '1', '2013-08-28 10:14:10', 'webAdmin', '/', '', '127.0.0.1', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('65', '2', '1', '2013-08-28 10:14:15', 'webAdmin', '/', '-', '127.0.0.1', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('66', '1', '1', '2013-08-28 10:14:16', 'webAdmin', '/', '', '127.0.0.1', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('67', '20', '1', '2013-08-28 10:15:47', 'webAdmin', '', 'Private', '192.168.1.165', 'Connected as  webAdmin', '');
INSERT INTO `wslog` VALUES ('68', '2', '1', '2013-08-28 10:15:49', 'webAdmin', '', '-', '192.168.1.165', 'Exploring share  Documents', '');
INSERT INTO `wslog` VALUES ('69', '1', '1', '2013-08-28 10:15:51', 'webAdmin', '/', '', '192.168.1.165', 'Browsing  /', '');
INSERT INTO `wslog` VALUES ('70', '2', '1', '2013-08-28 10:15:53', 'webAdmin', '/', '-', '192.168.1.165', 'Exploring share  Documents', '');
INSERT INTO `wslog` VALUES ('71', '1', '1', '2013-08-28 10:15:55', 'webAdmin', '/', '', '192.168.1.165', 'Browsing  /', '');
INSERT INTO `wslog` VALUES ('72', '2', '1', '2013-08-28 10:45:13', 'webAdmin', '/', '-', '127.0.0.1', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('73', '1', '1', '2013-08-28 10:45:14', 'webAdmin', '/', '', '127.0.0.1', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('74', '2', '1', '2013-08-28 10:45:17', 'webAdmin', '/', '-', '127.0.0.1', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('75', '1', '1', '2013-08-28 10:45:18', 'webAdmin', '/', '', '127.0.0.1', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('76', '1', '1', '2013-08-28 10:46:22', 'webAdmin', '/', '', '127.0.0.1', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('77', '1', '1', '2013-08-28 10:46:25', 'webAdmin', '/', '', '127.0.0.1', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('78', '1', '1', '2013-08-28 10:46:29', 'webAdmin', '/', '', '127.0.0.1', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('79', '1', '1', '2013-08-28 10:46:32', 'webAdmin', '/', '', '127.0.0.1', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('80', '2', '1', '2013-08-28 10:46:58', 'webAdmin', '/', '-', '127.0.0.1', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('81', '1', '1', '2013-08-28 10:47:00', 'webAdmin', '/', '', '127.0.0.1', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('82', '2', '1', '2013-08-28 10:48:14', 'webAdmin', '/', '-', '127.0.0.1', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('83', '1', '1', '2013-08-28 10:48:15', 'webAdmin', '/', '', '127.0.0.1', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('84', '2', '1', '2013-08-28 10:48:22', 'webAdmin', '/', '-', '127.0.0.1', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('85', '1', '1', '2013-08-28 10:48:23', 'webAdmin', '/', '', '127.0.0.1', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('86', '2', '1', '2013-08-28 10:49:20', 'webAdmin', '/', '-', '127.0.0.1', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('87', '1', '1', '2013-08-28 10:49:22', 'webAdmin', '/', '', '127.0.0.1', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('88', '2', '1', '2013-08-28 10:49:54', 'webAdmin', '/', '-', '127.0.0.1', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('89', '1', '1', '2013-08-28 10:49:55', 'webAdmin', '/', '', '127.0.0.1', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('90', '2', '1', '2013-08-28 10:50:04', 'webAdmin', '/', '-', '127.0.0.1', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('91', '1', '1', '2013-08-28 10:50:05', 'webAdmin', '/', '', '127.0.0.1', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('92', '20', '1', '2013-08-28 10:50:43', 'webAdmin', '', 'Private', '127.0.0.1', 'Conectado como  webAdmin', '');
INSERT INTO `wslog` VALUES ('93', '2', '1', '2013-08-28 10:50:46', 'webAdmin', '', '-', '127.0.0.1', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('94', '1', '1', '2013-08-28 10:50:47', 'webAdmin', '/', '', '127.0.0.1', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('95', '20', '1', '2013-08-28 11:35:01', 'webAdmin', '', 'Private', '127.0.0.1', 'Conectado como  webAdmin', '');
INSERT INTO `wslog` VALUES ('96', '2', '1', '2013-08-28 11:35:04', 'webAdmin', '', '-', '127.0.0.1', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('97', '1', '1', '2013-08-28 11:35:05', 'webAdmin', '/', '', '127.0.0.1', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('98', '1', '1', '2013-08-28 11:36:31', 'webAdmin', '/', '', '127.0.0.1', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('99', '20', '1', '2013-08-28 11:40:03', 'webAdmin', '', 'Private', '192.168.1.165', 'Connected as  webAdmin', '');
INSERT INTO `wslog` VALUES ('100', '20', '1', '2013-08-28 11:40:03', 'webAdmin', '', 'Private', '192.168.1.86', 'Conectado como  webAdmin', '');
INSERT INTO `wslog` VALUES ('101', '2', '1', '2013-08-28 11:40:05', 'webAdmin', '', '-', '192.168.1.165', 'Exploring share  Documents', '');
INSERT INTO `wslog` VALUES ('102', '2', '1', '2013-08-28 11:40:05', 'webAdmin', '', '-', '192.168.1.86', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('103', '1', '1', '2013-08-28 11:40:07', 'webAdmin', '/', '', '192.168.1.86', 'Navegando  /', '');
INSERT INTO `wslog` VALUES ('104', '2', '1', '2013-08-28 11:40:07', 'webAdmin', '', '-', '192.168.1.165', 'Exploring share  Documents', '');
INSERT INTO `wslog` VALUES ('105', '1', '1', '2013-08-28 11:40:09', 'webAdmin', '/', '', '192.168.1.165', 'Browsing  /', '');
INSERT INTO `wslog` VALUES ('106', '2', '1', '2013-08-28 11:40:10', 'webAdmin', '/', '-', '192.168.1.165', 'Exploring share  Documents', '');
INSERT INTO `wslog` VALUES ('107', '1', '1', '2013-08-28 11:40:12', 'webAdmin', '/', '', '192.168.1.165', 'Browsing  /', '');
INSERT INTO `wslog` VALUES ('108', '20', '1', '2013-08-28 12:09:15', 'webAdmin', '', 'Private', '127.0.0.1', 'Conectado como  webAdmin', '');
INSERT INTO `wslog` VALUES ('109', '2', '1', '2013-08-28 12:09:18', 'webAdmin', '', '-', '127.0.0.1', 'Exploración compartida  Documents', '');
INSERT INTO `wslog` VALUES ('110', '1', '1', '2013-08-28 12:09:19', 'webAdmin', '/', '', '127.0.0.1', 'Navegando  /', '');
INSERT INTO `wsserver` VALUES ('0', '1', '0', 'Documents', '$mydoc$', '', '', '', '', '', '', '', '0', '0', '0', '0', '1');
INSERT INTO `wsuser` VALUES ('0', '1', 'webAdmin', null, 'root', '63a9f0ea7bb98050796b649e85481845', 'Documents', 'Auto', 'Standard', 'miniatures', 'extension', 'webshare|admin|pass|moteur|htaccess|htpass|php|asp$|aspx$|ini$|pl$|cgi|js$|jsp$|dhtml$|cfm$|htm|sessions|Thumbs|wsminis|old$|~|^[.]{1}|^[.]{2}', '0', '1', null, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on');
INSERT INTO `wsuser` VALUES ('2', '1', 'Francisco', 'franciscourena@uapa.edu.do', 'franciscourena', '33a59cc5f10778b5bd5963603969e838', 'Documents', 'Spanish', 'Standard', 'miniatures', 'fichier', 'webshare|admin|pass|moteur|htaccess|htpass|php|asp$|aspx$|ini$|pl$|cgi|js$|jsp$|dhtml$|cfm$|htm|sessions|Thumbs|wsminis|old$|~|^[.]{1}|^[.]{2}', '1', '0', '', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on');


 ALTER TABLE `wsbase` ADD `autoUserAcc` tinyint(2) unsigned NOT NULL default '1';
 ALTER TABLE `wsbase` CHANGE `pageTitle` `pageTitle` TINYTEXT NULL;
 ALTER TABLE `wsbase` CHANGE `memoMax`   `memoMax` VARCHAR( 10 ) NULL DEFAULT NULL;
 ALTER TABLE `wsbase` CHANGE `execMax`   `execMax` VARCHAR( 10 ) NULL DEFAULT NULL;
 ALTER TABLE `wsbase` CHANGE `postMax`   `postMax` VARCHAR( 10 ) NULL DEFAULT NULL;
 ALTER TABLE `wsbase` CHANGE `timeMax`   `timeMax` VARCHAR( 10 ) NULL DEFAULT NULL;
 ALTER TABLE `wsbase` CHANGE `uploMax`   `uploMax` VARCHAR( 10 ) NULL DEFAULT NULL;
 ALTER TABLE `wsbase` CHANGE `lifeMax`   `lifeMax` VARCHAR( 10 ) NULL DEFAULT NULL;

 ALTER TABLE `wsuser` CHANGE `idUser` `idUser` INT( 10 ) UNSIGNED NOT NULL;
 ALTER TABLE `wsuser` ADD `mailUser` VARCHAR( 128 ) NULL;
 ALTER TABLE `wsuser` CHANGE `auth1` `auth1` VARCHAR( 2 ) NULL DEFAULT 'on';
 ALTER TABLE `wsuser` CHANGE `auth2` `auth2` VARCHAR( 2 ) NULL DEFAULT 'on';
 ALTER TABLE `wsuser` CHANGE `auth3` `auth3` VARCHAR( 2 ) NULL DEFAULT 'on';
 ALTER TABLE `wsuser` CHANGE `auth4` `auth4` VARCHAR( 2 ) NULL DEFAULT 'on';
 ALTER TABLE `wsuser` CHANGE `auth5` `auth5` VARCHAR( 2 ) NULL DEFAULT 'on';
 ALTER TABLE `wsuser` CHANGE `auth6` `auth6` VARCHAR( 2 ) NULL DEFAULT 'on';
 ALTER TABLE `wsuser` CHANGE `auth7` `auth7` VARCHAR( 2 ) NULL DEFAULT 'on';
 ALTER TABLE `wsuser` CHANGE `auth8` `auth8` VARCHAR( 2 ) NULL DEFAULT 'on';
 ALTER TABLE `wsuser` ADD `publicUser` VARCHAR( 2 ) NULL;
 ALTER TABLE `wsuser` CHANGE `serveurs` `serveurs` VARCHAR( 512 ) NULL DEFAULT NULL;

 ALTER TABLE `wsserver` CHANGE `idServeur` `idServeur` INT( 10 ) UNSIGNED NOT NULL;
 ALTER TABLE `wsserver` CHANGE `triServeur` `triServeur` TINYTEXT NOT NULL;
 ALTER TABLE `wsserver` ADD `webServeur` TINYTEXT NOT NULL;
 ALTER TABLE `wsserver` ADD `publicServeur` TINYINT( 2 ) UNSIGNED NOT NULL DEFAULT '1';

 ALTER TABLE `wsfiles` CHANGE `commentaires` `commentaires` TEXT NULL;
 ALTER TABLE `wsfiles` CHANGE `version` `version` TINYTEXT NOT NULL;
 ALTER TABLE `wsfiles` ADD `viewed` INT( 8 ) NULL ;
 ALTER TABLE `wsfiles` CHANGE `nom` `file` TINYTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
 ALTER TABLE `wsfiles` ADD `idUser` INT( 10 ) UNSIGNED NOT NULL AFTER `idfiles` ;
 ALTER TABLE `wsfiles` ADD `idServeur` INT( 10 ) UNSIGNED NOT NULL AFTER `idUser` ;
 ALTER TABLE `wsfiles` ADD `nomServeur` TINYTEXT NOT NULL AFTER `idServeur` ;
 ALTER TABLE `wsfiles` ADD `username` TINYTEXT NOT NULL AFTER `nomServeur` ;
 ALTER TABLE `wsfiles` ADD `path` TINYTEXT NOT NULL AFTER `username` ;
 ALTER TABLE `wsfiles` CHANGE `favoris` `favoris` TINYINT( 2 ) UNSIGNED NOT NULL DEFAULT '0' ;
 ALTER TABLE `wsfiles` ADD `changed` TINYINT( 2 ) NULL ;
 ALTER TABLE `wsfiles` ADD `locked` TINYINT( 2 ) NULL ;
 
 ALTER TABLE `wsbase` CHANGE `pageTitle` `pageTitle` TINYTEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
 ALTER TABLE `wslog`  CHANGE `username`  `username`  TINYTEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
 ALTER TABLE `wslog`  CHANGE `path`      `path`      TINYTEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
 ALTER TABLE `wslog`  CHANGE `file`      `file`      TINYTEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
 ALTER TABLE `wslog`  CHANGE `ipadr`     `ipadr`     TINYTEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
 ALTER TABLE `wslog`  CHANGE `verbose`   `verbose`   TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
 ALTER TABLE `wslog`  CHANGE `content`   `content`   TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

 
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` int(11) NOT NULL DEFAULT '0',
  `titre` varchar(250) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `news` longtext COLLATE utf8_bin NOT NULL,
  `author` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `images` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `categorie` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` longtext NOT NULL,
  `avatar` varchar(250) NOT NULL DEFAULT 'https://dummyimage.com/60x60/000/fff',
  `active` int(11) NOT NULL DEFAULT '0',
  `key_account` varchar(45) DEFAULT NULL,
  `last_login` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
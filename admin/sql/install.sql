SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";




CREATE TABLE IF NOT EXISTS `PrTec_Question` (
  `id_question` int(32) NOT NULL,
  `auteur` varchar(152) NOT NULL,
  `question` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`id_question`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `PrTec_Reponse` (
  `id_reponse` int(32) NOT NULL,
  `id_question` int(32) NOT NULL,
  `auteur` varchar(152) NOT NULL,
  `reponse` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`id_reponse`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `PrTec_Services` (
  `id` int(11) NOT NULL auto_increment,
  `categorie` varchar(128) NOT NULL,
  `auteur` varchar(32) NOT NULL,
  `adresse` varchar(64) NOT NULL,
  `date` date NOT NULL,
  `lieu` varchar(32) NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `PrTec_Users` (
  `login` varchar(32) NOT NULL default '0',
  `nom` varchar(24) default NULL,
  `prenom` varchar(24) default NULL,
  `tel` int(10) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `email` varchar(255) default NULL,
  `password` varchar(255) NOT NULL,
  `droits` int(11) NOT NULL default 0,
  PRIMARY KEY  (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `PrTec_UUID` (
  `uuid` int(11) NOT NULL auto_increment,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY  (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

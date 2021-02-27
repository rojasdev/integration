CREATE DATABASE db_xmldemo;
USE db_xmldemo;

CREATE TABLE IF NOT EXISTS `records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(256) NOT NULL,
  `lastname` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT;

INSERT INTO `records` (`firstname`, `lastname`) VALUES('JUAN', 'DELACRUZ');
INSERT INTO `records` (`firstname`, `lastname`) VALUES('BEA', 'SANTOS');
INSERT INTO `records` (`firstname`, `lastname`) VALUES('JENNIE', 'KIM');
INSERT INTO `records` (`firstname`, `lastname`) VALUES('PETER', 'PARKER');
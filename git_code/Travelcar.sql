-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2019-05-06 17:16:35
-- 服务器版本： 5.7.24
-- PHP 版本： 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `travelcar`
--

-- --------------------------------------------------------

--
-- 表的结构 `aéroport`
--

DROP TABLE IF EXISTS `aéroport`;
CREATE TABLE IF NOT EXISTS `aéroport` (
  `IATA` varchar(3) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `nom_aeroport` varchar(50) NOT NULL,
  PRIMARY KEY (`IATA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `aéroport`
--

INSERT INTO `aéroport` (`IATA`, `ville`, `nom_aeroport`) VALUES
('CDG', 'Paris', 'Paris-Charles De Gaulle'),
('FRA', 'Frankfurt', 'Frankfurt am Main Airport'),
('HEL', 'Helsinki', 'Helsinki Airport'),
('LCY', 'Londre', 'London City Airport'),
('LHR', 'Londre', 'Heathrow Airport'),
('ORY', 'Paris', 'Paris Orly Airport'),
('PVG', 'Shanghai', 'Shanghai Pudong International Airport'),
('SHA', 'Shanghai', 'Shanghai Hongqiao Airport');

-- --------------------------------------------------------

--
-- 表的结构 `emprunte`
--

DROP TABLE IF EXISTS `emprunte`;
CREATE TABLE IF NOT EXISTS `emprunte` (
  `n_véhicule` int(11) NOT NULL,
  `emprunteur` varchar(20) NOT NULL,
  `date_début` date NOT NULL,
  `date_fin` date NOT NULL,
  PRIMARY KEY (`n_véhicule`,`emprunteur`),
  KEY `clé_étranger_enprunteur` (`emprunteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `gare`
--

DROP TABLE IF EXISTS `gare`;
CREATE TABLE IF NOT EXISTS `gare` (
  `n_gare` int(11) NOT NULL AUTO_INCREMENT,
  `n_véhicule` int(11) NOT NULL,
  `label_du_parking` varchar(30) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  PRIMARY KEY (`n_gare`),
  KEY `clé_étranger_véhicule` (`n_véhicule`),
  KEY `clé_étranger_parking` (`label_du_parking`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `gare`
--

INSERT INTO `gare` (`n_gare`, `n_véhicule`, `label_du_parking`, `date_debut`, `date_fin`) VALUES
(1, 1, 'Chronopark', '2019-05-01 00:00:00', '2019-05-16 00:00:00');

--
-- 触发器 `gare`
--
DROP TRIGGER IF EXISTS `increment_uilise`;
DELIMITER $$
CREATE TRIGGER `increment_uilise` BEFORE INSERT ON `gare` FOR EACH ROW UPDATE parking SET parking.nombre_utilisé = parking.nombre_utilisé + 1
where parking.label = new.label_du_parking
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `parking`
--

DROP TABLE IF EXISTS `parking`;
CREATE TABLE IF NOT EXISTS `parking` (
  `label` varchar(30) NOT NULL,
  `aeroport` varchar(3) NOT NULL,
  `prix_du_jour` int(11) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `nombre_max` int(11) NOT NULL,
  PRIMARY KEY (`label`),
  KEY `clé_étranger_aéroport` (`aeroport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `parking`
--

INSERT INTO `parking` (`label`, `aeroport`, `prix_du_jour`, `adresse`, `nombre_max`) VALUES
('Chronopark', 'CDG', 18, '3 Route de Moussy, 77230 Villeneuve-sous-Dammartin', 7000),
('Parking Roissy', 'CDG', 39, 'Route de Choisy, 95470 Vémars', 60000);

-- --------------------------------------------------------

--
-- 表的结构 `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` varchar(20) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `telephone` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ad_mail` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `telephone`, `password`) VALUES
('simon', 'simon', 'chen', 123456789, '111111');

-- --------------------------------------------------------

--
-- 表的结构 `véhicule`
--

DROP TABLE IF EXISTS `véhicule`;
CREATE TABLE IF NOT EXISTS `véhicule` (
  `n_véhicule` int(11) NOT NULL AUTO_INCREMENT,
  `propriétaire` varchar(20) NOT NULL,
  PRIMARY KEY (`n_véhicule`),
  KEY `clé_étranger_propriétaire` (`propriétaire`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `véhicule`
--

INSERT INTO `véhicule` (`n_véhicule`, `propriétaire`) VALUES
(1, 'simon');

--
-- 限制导出的表
--

--
-- 限制表 `emprunte`
--
ALTER TABLE `emprunte`
  ADD CONSTRAINT `cle_etranger_emprunteur` FOREIGN KEY (`emprunteur`) REFERENCES `utilisateur` (`id`);

--
-- 限制表 `gare`
--
ALTER TABLE `gare`
  ADD CONSTRAINT `clé_étranger_parking` FOREIGN KEY (`label_du_parking`) REFERENCES `parking` (`label`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clé_étranger_véhicule` FOREIGN KEY (`n_véhicule`) REFERENCES `véhicule` (`n_véhicule`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `parking`
--
ALTER TABLE `parking`
  ADD CONSTRAINT `clé_étranger_aéroport` FOREIGN KEY (`aeroport`) REFERENCES `aéroport` (`IATA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `véhicule`
--
ALTER TABLE `véhicule`
  ADD CONSTRAINT `cle_etranger_proprietaire` FOREIGN KEY (`propriétaire`) REFERENCES `utilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

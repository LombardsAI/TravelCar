-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2019-06-01 13:24:48
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
  `n_plaque` char(10) NOT NULL,
  `emprunteur` varchar(20) NOT NULL,
  `label_du_parking` varchar(30) NOT NULL,
  `date_début` date NOT NULL,
  `date_fin` date NOT NULL,
  `TYPE` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`n_plaque`,`emprunteur`,`date_début`),
  KEY `clé_étranger_enprunteur` (`emprunteur`),
  KEY `clé_étranger_parking_2` (`label_du_parking`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `gare`
--

DROP TABLE IF EXISTS `gare`;
CREATE TABLE IF NOT EXISTS `gare` (
  `n_plaque` char(10) NOT NULL,
  `id_client` varchar(20) NOT NULL,
  `label_du_parking` varchar(30) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `n_place` varchar(10) DEFAULT NULL,
  `TYPE` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`n_plaque`,`id_client`,`date_debut`),
  KEY `clé_étranger_véhicule` (`n_plaque`),
  KEY `clé_étranger_parking` (`label_du_parking`),
  KEY `clé_étranger_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `gare`
--

INSERT INTO `gare` (`n_plaque`, `id_client`, `label_du_parking`, `date_debut`, `date_fin`, `n_place`, `TYPE`) VALUES
('BD51SMR', 'simon', 'Chronopark', '2019-05-09 00:00:00', '2019-05-15 00:00:00', '1', 2),
('fre15fre', 'simon', 'Chronopark', '2019-06-04 00:00:00', '2019-06-09 00:00:00', NULL, 0);

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

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `telephone`, `password`, `ad_mail`) VALUES
('simon', 'chen', 'simon', 653954426, '111111', '865133516@qq.com');

-- --------------------------------------------------------

--
-- 表的结构 `véhicule`
--

DROP TABLE IF EXISTS `véhicule`;
CREATE TABLE IF NOT EXISTS `véhicule` (
  `n_plaque` char(10) NOT NULL,
  `marque` char(15) DEFAULT NULL,
  `capacité` int(2) DEFAULT NULL,
  PRIMARY KEY (`n_plaque`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `véhicule`
--

INSERT INTO `véhicule` (`n_plaque`, `marque`, `capacité`) VALUES
('BD51SMR', 'renault', 5),
('fre15fre', NULL, NULL);

--
-- 限制导出的表
--

--
-- 限制表 `emprunte`
--
ALTER TABLE `emprunte`
  ADD CONSTRAINT `cle_etranger_emprunteur` FOREIGN KEY (`emprunteur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `clé_étranger_parking_2` FOREIGN KEY (`label_du_parking`) REFERENCES `parking` (`label`),
  ADD CONSTRAINT `clé_étranger_plaque_2` FOREIGN KEY (`n_plaque`) REFERENCES `véhicule` (`n_plaque`);

--
-- 限制表 `gare`
--
ALTER TABLE `gare`
  ADD CONSTRAINT `clé_étranger_client` FOREIGN KEY (`id_client`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `clé_étranger_parking` FOREIGN KEY (`label_du_parking`) REFERENCES `parking` (`label`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clé_étranger_plaque` FOREIGN KEY (`n_plaque`) REFERENCES `véhicule` (`n_plaque`);

--
-- 限制表 `parking`
--
ALTER TABLE `parking`
  ADD CONSTRAINT `clé_étranger_aéroport` FOREIGN KEY (`aeroport`) REFERENCES `aéroport` (`IATA`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

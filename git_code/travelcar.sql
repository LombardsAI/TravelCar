-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2019-06-18 20:59:51
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
-- 表的结构 `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id` int(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `niveau` int(1) NOT NULL,
  `IATA` varchar(3) DEFAULT NULL,
  `parking` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clé_étranger_parking2` (`parking`),
  KEY `clé_étranger_aeroport` (`IATA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `administrateur`
--

INSERT INTO `administrateur` (`id`, `password`, `nom`, `prenom`, `niveau`, `IATA`, `parking`) VALUES
(10000, 'e3ceb5881a0a1fdaad01296d7554868d', 'Maxime', 'Marmont', 1, 'CDG', NULL),
(20000, 'e3ceb5881a0a1fdaad01296d7554868d', 'Maxime', 'Shangwei', 2, NULL, 'Chronopark'),
(30000, 'e3ceb5881a0a1fdaad01296d7554868d', 'Mamp', 'w', 3, NULL, NULL);

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
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `cout` float NOT NULL,
  `TYPE` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`n_plaque`,`emprunteur`,`date_debut`),
  KEY `clé_étranger_enprunteur` (`emprunteur`),
  KEY `clé_étranger_parking_2` (`label_du_parking`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `emprunte`
--

INSERT INTO `emprunte` (`n_plaque`, `emprunteur`, `label_du_parking`, `date_debut`, `date_fin`, `cout`, `TYPE`) VALUES
('FE26EFG', 'simon', 'Parking Roissy', '2019-06-11 00:00:00', '2019-06-12 00:00:00', 24, 2);

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
  `cout` float NOT NULL,
  `TYPE` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`n_plaque`,`id_client`,`date_debut`),
  KEY `clé_étranger_véhicule` (`n_plaque`),
  KEY `clé_étranger_parking` (`label_du_parking`),
  KEY `clé_étranger_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `gare`
--

INSERT INTO `gare` (`n_plaque`, `id_client`, `label_du_parking`, `date_debut`, `date_fin`, `n_place`, `cout`, `TYPE`) VALUES
('FE26EFG', 'simon', 'Parking Roissy', '2019-06-06 00:00:00', '2019-06-28 00:00:00', '2', 633.6, 1),
('FRE23TW', 'james', 'Chronopark', '2019-06-18 06:30:00', '2019-06-19 00:00:00', '3', 18, 2),
('SE36GTF', 'james', 'Chronopark', '2019-06-18 23:00:00', '2019-06-19 03:00:00', NULL, 4, 0);

-- --------------------------------------------------------

--
-- 表的结构 `parking`
--

DROP TABLE IF EXISTS `parking`;
CREATE TABLE IF NOT EXISTS `parking` (
  `label` varchar(30) NOT NULL,
  `aeroport` varchar(3) NOT NULL,
  `prix_par_heure` float NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `nombre_max` int(11) NOT NULL,
  PRIMARY KEY (`label`),
  KEY `clé_étranger_aéroport` (`aeroport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `parking`
--

INSERT INTO `parking` (`label`, `aeroport`, `prix_par_heure`, `adresse`, `nombre_max`) VALUES
('Chronopark', 'CDG', 1, '3 Route de Moussy, 77230 Villeneuve-sous-Dammartin', 7000),
('ds', 'LCY', 1.5, '30 Route de Moussy', 5000),
('Parking Roissy', 'CDG', 1.2, 'Route de Choisy, 95470 Vémars', 60000);

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
  `password` varchar(32) NOT NULL,
  `ad_mail` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `telephone`, `password`, `ad_mail`) VALUES
('fang', 'fang', 'francois', 625963574, 'e3ceb5881a0a1fdaad01296d7554868d', 'fangshang@163.com'),
('james', 'James', 'Lebron', 689245261, '1a100d2c0dab19c4430e7d73762b3423', 'james@outlook.com'),
('simon', 'chen', 'simon', 689245839, '96e79218965eb72c92a549dd5a330112', 'simonchen@gmail.com');

-- --------------------------------------------------------

--
-- 表的结构 `véhicule`
--

DROP TABLE IF EXISTS `véhicule`;
CREATE TABLE IF NOT EXISTS `véhicule` (
  `n_plaque` char(10) NOT NULL,
  `marque` char(15) DEFAULT '-',
  `capacité` int(2) DEFAULT '0',
  `prix_emprunte` float DEFAULT '0',
  PRIMARY KEY (`n_plaque`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `véhicule`
--

INSERT INTO `véhicule` (`n_plaque`, `marque`, `capacité`, `prix_emprunte`) VALUES
('FE26EFG', 'renault', 5, 1),
('FRE23TW', 'renault', 5, 1.2),
('SE36GTF', '-', 0, 0);

--
-- 限制导出的表
--

--
-- 限制表 `administrateur`
--
ALTER TABLE `administrateur`
  ADD CONSTRAINT `clé_étranger_aeroport` FOREIGN KEY (`IATA`) REFERENCES `parking` (`aeroport`),
  ADD CONSTRAINT `clé_étranger_parking2` FOREIGN KEY (`parking`) REFERENCES `parking` (`label`);

--
-- 限制表 `emprunte`
--
ALTER TABLE `emprunte`
  ADD CONSTRAINT `cle_etranger_emprunteur` FOREIGN KEY (`emprunteur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `clé_étranger_parking_2` FOREIGN KEY (`label_du_parking`) REFERENCES `parking` (`label`),
  ADD CONSTRAINT `clé_étranger_plaque_2` FOREIGN KEY (`n_plaque`) REFERENCES `véhicule` (`n_plaque`) ON UPDATE CASCADE;

--
-- 限制表 `gare`
--
ALTER TABLE `gare`
  ADD CONSTRAINT `clé_étranger_client` FOREIGN KEY (`id_client`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `clé_étranger_parking` FOREIGN KEY (`label_du_parking`) REFERENCES `parking` (`label`),
  ADD CONSTRAINT `clé_étranger_plaque` FOREIGN KEY (`n_plaque`) REFERENCES `véhicule` (`n_plaque`) ON UPDATE CASCADE;

--
-- 限制表 `parking`
--
ALTER TABLE `parking`
  ADD CONSTRAINT `clé_étranger_aéroport` FOREIGN KEY (`aeroport`) REFERENCES `aéroport` (`IATA`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

CREATE DEFINER=`root`@`localhost` EVENT `Setter_gare_condition` ON SCHEDULE EVERY 1 HOUR STARTS '2019-06-18 22:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE `gare` SET `TYPE` = '-2' WHERE `date_debut` > NOW() - INTERVAL 1 HOUR AND `TYPE` = '0'
CREATE DEFINER=`root`@`localhost` EVENT `Setter_emprunte_condition` ON SCHEDULE EVERY 1 HOUR STARTS '2019-06-18 22:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE `emprunte` SET `TYPE` = '-2' WHERE `date_debut` > NOW() - INTERVAL 1 HOUR AND `TYPE` = '0'
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

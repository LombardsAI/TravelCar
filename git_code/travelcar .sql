-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 10, 2019 at 05:51 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `travelcar`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `niveau` int(1) NOT NULL,
  `IATA` varchar(3) DEFAULT NULL,
  `parking` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrateur`
--

INSERT INTO `administrateur` (`id`, `password`, `nom`, `prenom`, `niveau`, `IATA`, `parking`) VALUES
(10000, '222222', 'Maxime', 'Marmont', 1, 'CDG', NULL),
(20000, '222222', 'Maxime', 'Shangwei', 2, NULL, 'Chronopark'),
(30000, '222222', 'Mamp', 'w', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `aéroport`
--

CREATE TABLE `aéroport` (
  `IATA` varchar(3) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `nom_aeroport` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aéroport`
--

INSERT INTO `aéroport` (`IATA`, `ville`, `nom_aeroport`) VALUES
('CDG', 'Paris', 'Paris-Charles De Gaulle'),
('FRA', 'Frankfurt', 'Frankfurt am Main Airport'),
('HEL', 'Helsinki', 'Helsinki Airport'),
('LCY', 'Londre', 'London City Airport'),
('LHR', 'Londre', 'Heathrow Airport'),
('ORY', 'Paris', 'Paris Orly Airport'),
('PEK', 'Beijing', 'Beijing Capital International Airport'),
('PVG', 'Shanghai', 'Shanghai Pudong International Airport'),
('SHA', 'Shanghai', 'Shanghai Hongqiao Airport');

-- --------------------------------------------------------

--
-- Table structure for table `emprunte`
--

CREATE TABLE `emprunte` (
  `n_plaque` char(10) NOT NULL,
  `emprunteur` varchar(20) NOT NULL,
  `label_du_parking` varchar(30) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `cout` float NOT NULL,
  `TYPE` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emprunte`
--

INSERT INTO `emprunte` (`n_plaque`, `emprunteur`, `label_du_parking`, `date_debut`, `date_fin`, `cout`, `TYPE`) VALUES
('frew', 'fang', 'Chronopark', '2019-06-18 00:00:00', '2019-06-20 00:00:00', 2323, 2);

-- --------------------------------------------------------

--
-- Table structure for table `gare`
--

CREATE TABLE `gare` (
  `n_plaque` char(10) NOT NULL,
  `id_client` varchar(20) NOT NULL,
  `label_du_parking` varchar(30) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `n_place` varchar(10) DEFAULT NULL,
  `cout` float NOT NULL,
  `TYPE` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gare`
--

INSERT INTO `gare` (`n_plaque`, `id_client`, `label_du_parking`, `date_debut`, `date_fin`, `n_place`, `cout`, `TYPE`) VALUES
('frq11gte', 'fang', 'Chronopark', '2019-06-10 00:00:00', '2019-06-11 00:00:00', '65', 434, 0);

-- --------------------------------------------------------

--
-- Table structure for table `parking`
--

CREATE TABLE `parking` (
  `label` varchar(30) NOT NULL,
  `aeroport` varchar(3) NOT NULL,
  `prix_par_heure` int(11) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `nombre_max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parking`
--

INSERT INTO `parking` (`label`, `aeroport`, `prix_par_heure`, `adresse`, `nombre_max`) VALUES
('Chronopark', 'CDG', 18, '3 Route de Moussy, 77230 Villeneuve-sous-Dammartin', 7000),
('ds', 'LCY', 1000, '30 Route de Moussy', 5000),
('Parking Roissy', 'CDG', 39, 'Route de Choisy, 95470 Vémars', 60000);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` varchar(20) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `telephone` int(11) NOT NULL,
  `password` varchar(60) NOT NULL,
  `ad_mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `telephone`, `password`, `ad_mail`) VALUES
('fang', 'fang', 'francois', 625963571, '222222', 'fangshang@163.com'),
('james', 'James', 'Lebron', 65395123, '$2y$10$3qyngTXeRbXRWkIWOzcEPeyT4WfTy7J5Xucla1fV8oU/efEOvplIy', 'james@outlook.com'),
('max', 'Maxime', 'Marmont', 12329429, '222222', 'fang_david@icloud.comm'),
('MAX2', 'Marmont', 'MAxime', 142467585, '222222', 'fang_david@icloud.comm'),
('simon', 'simon', 'chen', 2689245, '$2y$10$NAgRFzSlHgsB1m/zAX9GKOxd1hGmU6sXZUATWy0iVoiWRJecxlUyK', 'simonchen@163.com');

-- --------------------------------------------------------

--
-- Table structure for table `véhicule`
--

CREATE TABLE `véhicule` (
  `n_plaque` char(10) NOT NULL,
  `marque` char(15) DEFAULT NULL,
  `capacité` int(2) DEFAULT NULL,
  `prix_emprunte` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `véhicule`
--

INSERT INTO `véhicule` (`n_plaque`, `marque`, `capacité`, `prix_emprunte`) VALUES
('frew', 'renault', 5, 100),
('frq11gte', NULL, NULL, NULL),
('gfsd12sf', NULL, NULL, NULL),
('gre12rg', NULL, NULL, NULL),
('grew', NULL, NULL, NULL),
('gt22rgr', NULL, NULL, NULL),
('gteg', NULL, NULL, NULL),
('REW25GT', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CK_ad_parking` (`parking`),
  ADD KEY `CK_ad_IATA` (`IATA`);

--
-- Indexes for table `aéroport`
--
ALTER TABLE `aéroport`
  ADD PRIMARY KEY (`IATA`);

--
-- Indexes for table `emprunte`
--
ALTER TABLE `emprunte`
  ADD PRIMARY KEY (`n_plaque`,`emprunteur`,`date_debut`),
  ADD KEY `clé_étranger_enprunteur` (`emprunteur`),
  ADD KEY `clé_étranger_parking_2` (`label_du_parking`);

--
-- Indexes for table `gare`
--
ALTER TABLE `gare`
  ADD PRIMARY KEY (`n_plaque`,`id_client`,`date_debut`),
  ADD KEY `clé_étranger_véhicule` (`n_plaque`),
  ADD KEY `clé_étranger_parking` (`label_du_parking`),
  ADD KEY `clé_étranger_client` (`id_client`);

--
-- Indexes for table `parking`
--
ALTER TABLE `parking`
  ADD PRIMARY KEY (`label`),
  ADD KEY `clé_étranger_aéroport` (`aeroport`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `véhicule`
--
ALTER TABLE `véhicule`
  ADD PRIMARY KEY (`n_plaque`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrateur`
--
ALTER TABLE `administrateur`
  ADD CONSTRAINT `CK_ad_IATA` FOREIGN KEY (`IATA`) REFERENCES `aéroport` (`IATA`),
  ADD CONSTRAINT `CK_ad_parking` FOREIGN KEY (`parking`) REFERENCES `parking` (`label`);

--
-- Constraints for table `emprunte`
--
ALTER TABLE `emprunte`
  ADD CONSTRAINT `cle_etranger_emprunteur` FOREIGN KEY (`emprunteur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `clé_étranger_parking_2` FOREIGN KEY (`label_du_parking`) REFERENCES `parking` (`label`),
  ADD CONSTRAINT `clé_étranger_plaque_2` FOREIGN KEY (`n_plaque`) REFERENCES `véhicule` (`n_plaque`);

--
-- Constraints for table `gare`
--
ALTER TABLE `gare`
  ADD CONSTRAINT `clé_étranger_client` FOREIGN KEY (`id_client`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `clé_étranger_parking` FOREIGN KEY (`label_du_parking`) REFERENCES `parking` (`label`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clé_étranger_plaque` FOREIGN KEY (`n_plaque`) REFERENCES `véhicule` (`n_plaque`);

--
-- Constraints for table `parking`
--
ALTER TABLE `parking`
  ADD CONSTRAINT `clé_étranger_aéroport` FOREIGN KEY (`aeroport`) REFERENCES `aéroport` (`IATA`) ON DELETE CASCADE ON UPDATE CASCADE;

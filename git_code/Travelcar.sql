-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 02, 2019 at 04:01 PM
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
(10000, '222222', 'Maxime', 'Marmont', 1, 'CDG', NULL);

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
  `date_début` date NOT NULL,
  `date_fin` date NOT NULL,
  `TYPE` int(1) NOT NULL DEFAULT '0',
  `cout` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `TYPE` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gare`
--

INSERT INTO `gare` (`n_plaque`, `id_client`, `label_du_parking`, `date_debut`, `date_fin`, `n_place`, `TYPE`) VALUES
('BD51SMR', 'simon', 'Chronopark', '2019-05-09 00:00:00', '2019-05-15 00:00:00', '1', 2),
('BD51SMR', 'simon', 'Chronopark', '2019-06-01 00:00:00', '2019-06-02 00:00:00', NULL, 0),
('BD51SMR', 'simon', 'Chronopark', '2019-06-04 00:00:00', '2019-06-07 00:00:00', NULL, 0),
('fre15fre', 'simon', 'Chronopark', '2019-06-04 00:00:00', '2019-06-09 00:00:00', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `parking`
--

CREATE TABLE `parking` (
  `label` varchar(30) NOT NULL,
  `aeroport` varchar(3) NOT NULL,
  `prix_du_jour` int(11) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `nombre_max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parking`
--

INSERT INTO `parking` (`label`, `aeroport`, `prix_du_jour`, `adresse`, `nombre_max`) VALUES
('Chronopark', 'CDG', 18, '3 Route de Moussy, 77230 Villeneuve-sous-Dammartin', 7000),
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
  `password` varchar(50) NOT NULL,
  `ad_mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `telephone`, `password`, `ad_mail`) VALUES
('fang', 'Fa', 'Shangwei', 60393301, '22222', 'fang_david@icloud.comm'),
('simon', 'chen', 'simon', 653954426, '111111', '865133516@qq.com'),
('zzz', 'F', 'Shangwei', 634341, '333333', 'fang_david@icloud.com');

-- --------------------------------------------------------

--
-- Table structure for table `véhicule`
--

CREATE TABLE `véhicule` (
  `n_plaque` char(10) NOT NULL,
  `marque` char(15) DEFAULT NULL,
  `capacité` int(2) DEFAULT NULL,
  `prix_du_jour` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `véhicule`
--

INSERT INTO `véhicule` (`n_plaque`, `marque`, `capacité`, `prix_du_jour`) VALUES
('BD51SMR', 'renault', 5, 0),
('fre15fre', NULL, NULL, 0);

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
  ADD PRIMARY KEY (`n_plaque`,`emprunteur`,`date_début`),
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

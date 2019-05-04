-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 04, 2019 at 02:04 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `travelcar`
--

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
  `n_véhicule` int(11) NOT NULL,
  `emprunteur` varchar(20) NOT NULL,
  `date_début` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gare`
--

CREATE TABLE `gare` (
  `n_gare` int(11) NOT NULL,
  `n_véhicule` int(11) NOT NULL,
  `label_du_parking` varchar(30) NOT NULL,
  `date_bebut` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gare`
--

INSERT INTO `gare` (`n_gare`, `n_véhicule`, `label_du_parking`, `date_bebut`, `date_fin`) VALUES
(3, 1, 'Chronopark', '2019-05-01', '2019-05-16');

--
-- Triggers `gare`
--
DELIMITER $$
CREATE TRIGGER `increment_uilise` BEFORE INSERT ON `gare` FOR EACH ROW UPDATE parking SET parking.nombre_utilisé = parking.nombre_utilisé + 1
where parking.label = new.label_du_parking
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `parking`
--

CREATE TABLE `parking` (
  `label` varchar(30) NOT NULL,
  `aéroport` varchar(3) NOT NULL,
  `prix_du_jour` int(11) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `nombre_max` int(11) NOT NULL,
  `nombre_utilisé` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parking`
--

INSERT INTO `parking` (`label`, `aéroport`, `prix_du_jour`, `adresse`, `nombre_max`, `nombre_utilisé`) VALUES
('Chronopark', 'CDG', 18, '3 Route de Moussy, 77230 Villeneuve-sous-Dammartin', 7000, 6991),
('Parking Roissy', 'CDG', 39, 'Route de Choisy, 95470 Vémars', 60000, 59995);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` varchar(20) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `telephone` int(11) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `telephone`, `password`) VALUES
('simon', 'simon', 'chen', 123456789, '111111');

-- --------------------------------------------------------

--
-- Table structure for table `véhicule`
--

CREATE TABLE `véhicule` (
  `n_véhicule` int(11) NOT NULL,
  `propriétaire` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `véhicule`
--

INSERT INTO `véhicule` (`n_véhicule`, `propriétaire`) VALUES
(1, 'simon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aéroport`
--
ALTER TABLE `aéroport`
  ADD PRIMARY KEY (`IATA`);

--
-- Indexes for table `emprunte`
--
ALTER TABLE `emprunte`
  ADD PRIMARY KEY (`n_véhicule`,`emprunteur`),
  ADD KEY `clé_étranger_enprunteur` (`emprunteur`);

--
-- Indexes for table `gare`
--
ALTER TABLE `gare`
  ADD PRIMARY KEY (`n_gare`),
  ADD KEY `clé_étranger_véhicule` (`n_véhicule`),
  ADD KEY `clé_étranger_parking` (`label_du_parking`);

--
-- Indexes for table `parking`
--
ALTER TABLE `parking`
  ADD PRIMARY KEY (`label`),
  ADD KEY `clé_étranger_aéroport` (`aéroport`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `véhicule`
--
ALTER TABLE `véhicule`
  ADD PRIMARY KEY (`n_véhicule`),
  ADD KEY `clé_étranger_propriétaire` (`propriétaire`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gare`
--
ALTER TABLE `gare`
  MODIFY `n_gare` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `véhicule`
--
ALTER TABLE `véhicule`
  MODIFY `n_véhicule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emprunte`
--
ALTER TABLE `emprunte`
  ADD CONSTRAINT `cle_etranger_emprunteur` FOREIGN KEY (`emprunteur`) REFERENCES `utilisateur` (`id`);

--
-- Constraints for table `gare`
--
ALTER TABLE `gare`
  ADD CONSTRAINT `clé_étranger_parking` FOREIGN KEY (`label_du_parking`) REFERENCES `parking` (`label`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clé_étranger_véhicule` FOREIGN KEY (`n_véhicule`) REFERENCES `véhicule` (`n_véhicule`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parking`
--
ALTER TABLE `parking`
  ADD CONSTRAINT `clé_étranger_aéroport` FOREIGN KEY (`aéroport`) REFERENCES `aéroport` (`IATA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `véhicule`
--
ALTER TABLE `véhicule`
  ADD CONSTRAINT `cle_etranger_proprietaire` FOREIGN KEY (`propriétaire`) REFERENCES `utilisateur` (`id`);

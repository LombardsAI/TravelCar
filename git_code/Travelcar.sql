-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 03, 2019 at 11:32 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `TravelCar`
--

-- --------------------------------------------------------

--
-- Table structure for table `aéroport`
--

CREATE TABLE `aéroport` (
  `IATA` varchar(3) NOT NULL,
  `ville` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `emprunte`
--

CREATE TABLE `emprunte` (
  `n_véhicule` int(11) NOT NULL,
  `emprunteur` int(11) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `telephone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `véhicule`
--

CREATE TABLE `véhicule` (
  `n_véhicule` int(11) NOT NULL,
  `propriétaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD KEY `clé_étranger_véhicule` (`n_véhicule`);

--
-- Indexes for table `parking`
--
ALTER TABLE `parking`
  ADD PRIMARY KEY (`label`),
  ADD KEY `clé_étranger_aéroport` (`aéroport`);

--
-- Indexes for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
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
  MODIFY `n_gare` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `véhicule`
--
ALTER TABLE `véhicule`
  MODIFY `n_véhicule` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emprunte`
--
ALTER TABLE `emprunte`
  ADD CONSTRAINT `clé_étranger_enprunteur` FOREIGN KEY (`emprunteur`) REFERENCES `Utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clé_étranger_véhicule_emprunte` FOREIGN KEY (`n_véhicule`) REFERENCES `véhicule` (`n_véhicule`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gare`
--
ALTER TABLE `gare`
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
  ADD CONSTRAINT `clé_étranger_propriétaire` FOREIGN KEY (`propriétaire`) REFERENCES `Utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

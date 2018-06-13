-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2018 at 12:19 PM
-- Server version: 5.7.20
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eval_4`
--

-- --------------------------------------------------------

--
-- Table structure for table `chambres`
--

CREATE TABLE `chambres` (
	`id` int(11) NOT NULL,
	`numero` int(11) NOT NULL,
	`nom` varchar(255) NOT NULL,
	`grilleTarifaire` enum('A','B','C','D') NOT NULL,
	`status` enum('disponible','indisponible') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chambres`
--

INSERT INTO `chambres` (`id`, `numero`, `nom`, `grilleTarifaire`, `status`) VALUES
(5, 1001, 'Victoria (Suite)', 'D', 'disponible'),
(6, 101, 'Bergamot', 'A', 'disponible'),
(7, 102, 'Safran', 'A', 'indisponible'),
(8, 201, 'Bambou', 'B', 'disponible'),
(9, 202, 'Carambole', 'B', 'disponible'),
(10, 203, 'Papyrus', 'B', 'disponible');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
	`id` int(11) NOT NULL,
	`nom` varchar(255) NOT NULL,
	`prenom` varchar(255) NOT NULL,
	`dateInscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `dateInscription`) VALUES
(1, 'Aroide', 'Paul', '2017-06-11 12:06:31'),
(2, 'Bricot ', 'Juda', '2018-06-11 11:06:02'),
(3, 'Auchon', 'Paul', '2018-05-11 10:06:31'),
(4, 'Bidjoba', 'Joe', '2018-06-11 12:06:31'),
(5, 'Diote', 'Kelly', '2018-06-11 12:06:31'),
(6, 'Covert', 'Harry', '2018-06-11 12:06:31'),
(7, 'Dalord ', 'Homer', '2014-02-11 13:06:31'),
(8, 'Bordage', 'Alain', '2018-06-11 12:06:31'),
(9, 'Fassol', 'Rémy', '2018-06-11 12:06:31'),
(10, 'Martin', 'Henry', '1970-09-13 13:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
	`id` int(11) NOT NULL,
	`clientId` int(11) NOT NULL,
	`chambreId` int(11) NOT NULL,
	`dateEntree` timestamp NULL DEFAULT NULL,
	`dateSortie` timestamp NULL DEFAULT NULL,
	`statut` enum('attente','valide','refus') NOT NULL,
	`dateModification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `clientId`, `chambreId`, `dateEntree`, `dateSortie`, `statut`, `dateModification`) VALUES
(1, 3, 5, '2018-05-31 22:00:00', '2018-06-01 22:00:00', 'valide', '2018-06-11 12:17:14'),
(2, 7, 7, '2018-04-08 22:00:00', '2018-04-20 22:00:00', 'refus', '2018-06-11 12:17:14'),
(3, 2, 9, '2018-06-27 22:00:00', '2018-06-29 22:00:00', 'attente', '2018-06-11 12:18:07'),
(4, 2, 9, '2018-06-10 22:00:00', '2018-06-11 22:00:00', 'valide', '2018-06-11 12:18:07'),
(5, 7, 6, '2018-06-03 22:00:00', '2018-06-06 22:00:00', 'valide', '2018-06-11 12:18:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chambres`
--
ALTER TABLE `chambres`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chambres`
--
ALTER TABLE `chambres`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2017 at 10:43 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tweet_labellisation`
--

-- --------------------------------------------------------

--
-- Table structure for table `tweet`
--

CREATE TABLE `tweet` (
  `id` int(11) NOT NULL,
  `tweet_content` text NOT NULL,
  `count_positif` int(11) NOT NULL DEFAULT '0',
  `count_neutre` int(11) NOT NULL DEFAULT '0',
  `count_negatif` int(11) NOT NULL DEFAULT '0',
  `original_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tweet`
--

INSERT INTO `tweet` (`id`, `tweet_content`, `count_positif`, `count_neutre`, `count_negatif`, `original_id`) VALUES
(1, 'If you could only pick ONE song to play to someone who had never heard a Michael Jackson song, which one would you choose @All?', 3, 1, 1, NULL),
(2, 'out in the sunshine working with the magic @rahki and everything is so colourful and nice ???', 1, 2, 0, NULL),
(5, 'Déjà la dernière Descente de la saison demain 16h30 heure française, sur cette belle piste d\'Aspen (USA)@Exemple.\n#novodis #aspen ', 0, 1, 0, NULL),
(6, 'ENERGY is fascinating @ISS_Research with many steps–it\'s not easy to measure exactly how much energy you consume & spend in a week! #science', 1, 1, 1, NULL),
(7, 'Sur l’#ISS nos calories consommées/dépensées sont passées à la loupe avec l’expérience ENERGY, notamment en examinant notre respiration @exemple', 0, 1, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tweet`
--
ALTER TABLE `tweet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tweet`
--
ALTER TABLE `tweet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

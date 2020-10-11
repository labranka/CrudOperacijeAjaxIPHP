-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 01:26 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baza_branka`
--

-- --------------------------------------------------------

--
-- Table structure for table `lista_obaveza`
--

CREATE TABLE `lista_obaveza` (
  `lista_obaveza_id` int(11) NOT NULL,
  `korisnik_id` int(11) NOT NULL,
  `opis` text NOT NULL,
  `obavljeno` enum('Ne','Da') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lista_obaveza`
--

INSERT INTO `lista_obaveza` (`lista_obaveza_id`, `korisnik_id`, `opis`, `obavljeno`) VALUES
(11, 1, 'Otici do grada', 'Da'),
(12, 1, 'Odraditi domaci iz Iteh-a', 'Da'),
(14, 1, 'Uciti za kolokvijum', 'Ne'),
(15, 1, 'Otici na kafu', 'Da'),
(17, 1, 'Uciti za ispit', 'Da'),
(18, 1, 'Odraditi projekat', 'Ne'),
(19, 1, 'Kupiti hleb', 'Da'),
(20, 1, 'Kupiti jaknu', 'Da'),
(22, 1, 'Otici na trening', 'Da'),
(23, 1, 'Nahraniti zeca', 'Da'),
(25, 1, 'Kupiti veceru', 'Da'),
(26, 1, 'Srediti sobu', 'Da'),
(27, 1, 'Odraditi domaci PHP,Ajax', 'Da'),
(28, 1, 'Odraditi vezbe', 'Da'),
(30, 1, 'Otici na Adu', 'Ne'),
(32, 1, 'Odraditi treci domaci iz SISJ', 'Da'),
(38, 1, 'Uraditi domaci', 'Da'),
(44, 1, 'Dodati search u php projektu', 'Da'),
(45, 1, 'Napisati projekat', 'Ne'),
(46, 1, 'Zaliti cvece', 'Da'),
(47, 1, 'Uraditi trening', 'Da'),
(49, 1, 'Uraditi search u php', 'Da'),
(52, 1, 'Poboljsati aplikaciju', 'Ne'),
(53, 1, 'Spremiti usmeni iz PS', 'Ne'),
(54, 1, 'Otici na kafu', 'Da'),
(55, 1, 'Ustati rano', 'Ne');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lista_obaveza`
--
ALTER TABLE `lista_obaveza`
  ADD PRIMARY KEY (`lista_obaveza_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lista_obaveza`
--
ALTER TABLE `lista_obaveza`
  MODIFY `lista_obaveza_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

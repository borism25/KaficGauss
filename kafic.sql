-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Računalo: 127.0.0.1
-- Vrijeme generiranja: Pro 19, 2013 u 09:46 
-- Verzija poslužitelja: 5.6.11
-- PHP verzija: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza podataka: `kafic`
--
CREATE DATABASE IF NOT EXISTS `kafic` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `kafic`;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `cijena`
--

CREATE TABLE IF NOT EXISTS `cijena` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `cijena` decimal(18,2) NOT NULL,
  `datum_unosa` date NOT NULL,
  `primjena_datum_vrijeme` datetime NOT NULL,
  `proizvod_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Izbacivanje podataka za tablicu `cijena`
--

INSERT INTO `cijena` (`ID`, `cijena`, `datum_unosa`, `primjena_datum_vrijeme`, `proizvod_id`) VALUES
(1, '6.00', '2013-12-13', '0000-00-00 00:00:00', 1),
(3, '10.00', '2013-12-13', '2013-12-20 06:00:00', 2),
(4, '21.00', '2013-12-18', '0000-00-00 00:00:00', 3),
(5, '16.00', '2013-12-18', '0000-00-00 00:00:00', 4),
(6, '6.00', '2013-12-19', '0000-00-00 00:00:00', 6),
(12, '33.00', '2013-12-19', '2013-12-14 00:00:00', 2),
(13, '33.00', '2013-12-19', '2013-12-14 00:00:00', 3),
(14, '10.00', '2013-12-19', '0000-00-00 00:00:00', 99),
(15, '10.00', '2013-12-19', '0000-00-00 00:00:00', 99),
(16, '10.00', '2013-12-19', '0000-00-00 00:00:00', 99),
(17, '10.00', '2013-12-19', '0000-00-00 00:00:00', 99);

--
-- Okidači `cijena`
--
DROP TRIGGER IF EXISTS `cijena_after_insert`;
DELIMITER //
CREATE TRIGGER `cijena_after_insert` AFTER INSERT ON `cijena`
 FOR EACH ROW BEGIN
UPDATE proizvodi SET proizvodi.cijena_id = NEW.ID WHERE proizvodi.ID = NEW.proizvod_id;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `kategorije`
--

CREATE TABLE IF NOT EXISTS `kategorije` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_kategorije` varchar(30) NOT NULL,
  `proizvod_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`,`proizvod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Izbacivanje podataka za tablicu `kategorije`
--

INSERT INTO `kategorije` (`ID`, `naziv_kategorije`, `proizvod_id`) VALUES
(1, 'Kave', 1),
(2, 'Sokovi', 2),
(5, 'Cigarete', 3);

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `proizvodi`
--

CREATE TABLE IF NOT EXISTS `proizvodi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_proizvoda` varchar(30) NOT NULL,
  `kategorija_id` int(11) NOT NULL,
  `cijena_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Izbacivanje podataka za tablicu `proizvodi`
--

INSERT INTO `proizvodi` (`ID`, `naziv_proizvoda`, `kategorija_id`, `cijena_id`) VALUES
(1, 'Kava Mlijeko', 1, 1),
(2, 'Kava Šlag', 1, 12),
(3, 'Coca - Cola', 2, 13),
(4, 'Pall Mall', 3, 4),
(5, 'Lucky Strike', 3, 3),
(6, 'Bijela Kava', 1, 5),
(7, 'Nescafe Strong', 1, 0),
(8, 'Nescafe Strong', 1, 0),
(9, 'Nescafe Strong', 1, 0),
(10, 'Fanta', 2, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

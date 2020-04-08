-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 07:50 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid19bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `iedcrdata`
--

CREATE TABLE `iedcrdata` (
  `Date` date NOT NULL,
  `TOTAL COVID-19 TESTS` int(11) DEFAULT NULL,
  `LAST 24 Hours Test` int(11) DEFAULT NULL,
  `Covid-19 Positive Cases` int(11) NOT NULL,
  `Last 24Hours Cases` int(11) NOT NULL,
  `Recovered` int(11) NOT NULL,
  `Death Cases` int(11) NOT NULL,
  `Recovery Rate` float NOT NULL,
  `Death Rate` float NOT NULL,
  `New Recoveries` int(11) NOT NULL,
  `Deaths in last 24 hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iedcrdata`
--

INSERT INTO `iedcrdata` (`Date`, `TOTAL COVID-19 TESTS`, `LAST 24 Hours Test`, `Covid-19 Positive Cases`, `Last 24Hours Cases`, `Recovered`, `Death Cases`, `Recovery Rate`, `Death Rate`, `New Recoveries`, `Deaths in last 24 hours`) VALUES
('2020-03-25', 794, 82, 39, 0, 7, 5, 17.9487, 12.8205, 0, 0),
('2020-03-26', 920, 126, 44, 5, 11, 5, 25, 11.3636, 4, 0),
('2020-03-27', 1026, 106, 48, 4, 11, 5, 22.9167, 10.4167, 0, 0),
('2020-03-28', 1076, 50, 48, 0, 15, 5, 31.25, 10.4167, 4, 0),
('2020-03-29', 1185, 109, 48, 0, 15, 5, 31.25, 10.4167, 0, 0),
('2020-03-30', 1338, 153, 49, 1, 19, 5, 38.7755, 10.2041, 4, 0),
('2020-03-31', 1602, 140, 51, 2, 25, 5, 49.0196, 9.80392, 6, 0),
('2020-04-01', 1602, 140, 54, 3, 25, 6, 46.2963, 11.1111, 0, 1),
('2020-04-02', 1896, 142, 56, 2, 25, 6, 44.6429, 10.7143, 0, 0),
('2020-04-03', 2086, 180, 61, 5, 26, 6, 42.623, 9.83607, 1, 0),
('2020-04-04', 2086, 180, 70, 9, 30, 8, 42.8571, 11.4286, 4, 2),
('2020-04-05', 1987, 103, 88, 18, 30, 9, 34.0909, 10.2273, 0, 1),
('2020-04-06', 0, 0, 123, 35, 33, 12, 26.8293, 9.7561, 3, 3),
('2020-04-07', 4289, 679, 164, 41, 33, 17, 20.122, 10.3659, 0, 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

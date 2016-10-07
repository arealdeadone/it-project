-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2016 at 10:19 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infotsav`
--

-- --------------------------------------------------------

--
-- Table structure for table `eventdetails`
--

CREATE TABLE `eventdetails` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `isteam` int(11) NOT NULL,
  `minmembers` int(11) NOT NULL,
  `maxmembers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventdetails`
--

INSERT INTO `eventdetails` (`id`, `name`, `isteam`, `minmembers`, `maxmembers`) VALUES
(0, 'BUG SPOT', 1, 1, 3),
(1, 'Code Rush', 0, 1, 1),
(3, 'Hackathon', 1, 1, 2),
(5, 'Algo Writing', 0, 1, 1),
(6, 'Jobs', 0, 1, 1),
(7, 'Code Stumble', 1, 1, 3),
(8, 'Sameeksha', 1, 1, 4),
(9, 'Brandsome', 1, 1, 3),
(10, 'Pinnacle', 1, 1, 4),
(11, 'Smart Cities', 1, 1, 3),
(12, 'ITW', 1, 1, 3),
(13, 'Forex', 0, 1, 1),
(14, 'Job Bureau', 0, 1, 1),
(15, 'Trove Trace', 0, 1, 1),
(16, 'Snap Trap', 0, 1, 1),
(17, 'CSGO', 1, 5, 5),
(22, 'arthashastra', 1, 1, 3),
(23, 'ENIGMA', 1, 1, 3),
(24, 'Programming Quiz', 1, 1, 3),
(25, 'Aptitude Quiz', 1, 1, 3),
(26, 'Anime Quiz', 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eid`, `tid`) VALUES
(2, 11, 15),
(3, 11, 16),
(4, 11, 17),
(5, 11, 18),
(6, 11, 19),
(7, 11, 20),
(8, 11, 21),
(9, 11, 22),
(10, 11, 23);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `tid` int(11) NOT NULL,
  `tname` varchar(64) NOT NULL,
  `part1` int(5) DEFAULT NULL,
  `part2` int(5) DEFAULT NULL,
  `part3` int(5) DEFAULT NULL,
  `part4` int(5) DEFAULT NULL,
  `part5` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`tid`, `tname`, `part1`, `part2`, `part3`, `part4`, `part5`) VALUES
(15, 'Fear of the dark', 1, NULL, NULL, NULL, NULL),
(16, 'Total', NULL, NULL, NULL, NULL, NULL),
(17, 'totla', NULL, NULL, NULL, NULL, NULL),
(18, 'totla', NULL, NULL, NULL, NULL, NULL),
(19, 'totla', NULL, NULL, NULL, NULL, NULL),
(20, 'totla', NULL, NULL, NULL, NULL, NULL),
(21, 'totla', NULL, NULL, NULL, NULL, NULL),
(22, 'asasda', NULL, NULL, NULL, NULL, NULL),
(23, 'asasda', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventdetails`
--
ALTER TABLE `eventdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

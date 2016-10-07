-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 06, 2016 at 02:40 AM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `infotsav`
--

-- --------------------------------------------------------

--
-- Table structure for table `coords`
--

CREATE TABLE IF NOT EXISTS `coords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coordinates` text NOT NULL,
  `coordside1` text NOT NULL,
  `coordside2` text NOT NULL,
  `coordside3` text NOT NULL,
  `coordside4` text NOT NULL,
  `coordside5` text NOT NULL,
  `coordside6` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `coords`
--

INSERT INTO `coords` (`id`, `coordinates`, `coordside1`, `coordside2`, `coordside3`, `coordside4`, `coordside5`, `coordside6`) VALUES
(1, '[{"x":52,"y":1673},{"x":2,"y":1749},{"x":100,"y":1327},{"x":27,"y":696},{"x":86,"y":792},{"x":1,"y":2115}]', '[{"x":366,"y":548},{"x":372,"y":625}]', '[{"x":859,"y":856},{"x":952,"y":862}]', '[{"x":374,"y":1076},{"x":403,"y":1090}]', '[{"x":918,"y":1311},{"x":933,"y":1330}]', '[{"x":331,"y":1465},{"x":365,"y":1563}]', '[{"x":794,"y":1666},{"x":958,"y":1745}]');

-- --------------------------------------------------------

--
-- Table structure for table `eventdetails`
--

CREATE TABLE IF NOT EXISTS `eventdetails` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `isteam` int(11) NOT NULL,
  `minmembers` int(11) NOT NULL,
  `maxmembers` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventdetails`
--

INSERT INTO `eventdetails` (`id`, `name`, `isteam`, `minmembers`, `maxmembers`) VALUES
(11, 'Smart Cities', 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `eid` int(11) NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `tname` varchar(64) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE IF NOT EXISTS `team_members` (
  `tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) DEFAULT NULL,
  `salt` varchar(32) DEFAULT NULL,
  `contact` varchar(11) DEFAULT NULL,
  `school` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `avtar` int(2) DEFAULT NULL,
  `emailcode` varchar(64) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `fbid` varchar(64) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `salt`, `contact`, `school`, `city`, `avtar`, `emailcode`, `active`, `fbid`) VALUES
(1, 'Arvind Rachuri', 'ari0997@gmail.com', '9966949f9c4e179701d0e6d6429172d307aaf991bab4664552e7c27aba9f5234', 'wZò­b×ßˆlõ‘,©L™-MbAØBšÈµ6ƒ“z5Ê;', '8763476609', 'ABV IIITM', 'g', 2, '', 0, '0'),
(6, 'Aman', 'amanjain7898@gmail.com', '563d6ec1bbeff4d62b567c0d79d021885ab3e3e98571d9dedc76dba1fe9a1403', 'ÑÀAúíKò÷?!	‹ìpžåFhò~Zõ»RÉy4Ø\0', '7770980386', 'IIITM Campus', 'Gwalior', 1, '', 0, '0'),
(8, 'Anshul', 'anshul.vyas380@gmail.com', 'e15a692ec463e7b07229a9d688145518efe0dff669140af6ec19620078137833', 'Ø©è³ix''´§±§#ädî.»b.çû¹óóÂ¾', '9407002735', 'asdf', 'asdf', 1, '', 0, '0'),
(9, 'Varshney', 'var@gmail.com', '5df87d6258d239dfa7cee61c91b240fd8bfc3a455bb454b41abee203e2cdb2af', '£Š€AæFÞ&8Ä''‹™•=­ìMÍ¶öc\0úƒÍD', '9044070404', 'loklohnre', ''';lakfrlkjmng', 1, '', 0, '0'),
(10, 'Sinha', 'sinhashivam04@gmail.com', '99b7b3bf4ee14f577859f8a1fb49f4795f769f8746d929037604f309c8f540a1', '''ët©§”°§ØQZœž¿,v,Lú¾g®£+Cš\0', '7770806859', 'IIITM GWalior', 'Gwalior', 1, '', 0, '0'),
(11, 'prakhar kapoor', 'kapoorprakhar47@gmail.com', '647ca34617f6c3b501cb649bf3172c08a05db6e5c2053678019366187922065b', '+ók÷"·	å\0ÛÓ6È	–œ±ò ”Qžb^ñÞŸ€ã', '8989485589', 'abv iiitm', 'gwalior', 1, '', 0, '0'),
(12, 'pranjal kumar', 'pranjalkumar8221@gmail.com', '671948ae3a2cbc726ed8ba7b793b0ca75ef245a5ecd765d6257068cba0a01038', '´–#uSª%›Ljƒ''‚¸[jiäq!¢ªêç', '9856784468', 'ABV-IIITM', 'gwalior', 1, '', 0, '0'),
(13, 'Rohit Retnakaran', 'rohitretnakaran@gmail.com', 'dac5977aff98124bd0f0ebf0ec1d6288f8936b5c6363881faee2cfd8743b3369', 'Ø*ßvHtÓy¿ ØB"\Z¾¬m,+€ÎK÷¤nQƒ9$ç¹', '8989735126', 'ABV-IIITM', 'Gwalior', 1, '', 0, '0'),
(14, 'Shubh', 'ipg_2014087@iiiym.ac.in', '4e3f90f2489629be1d906dfc62a792e294e7ba1772158bf2053012380557147b', 'ÈöÝ´öÇÀŒs±x^,4y–aX‡ˆzX$ájØ``', '8989529628', 'IIIT Gwalior', 'Gwalior', 1, '', 0, '0'),
(15, 'KV', 'kushagravarshney@infotsav.org', '7764e6ba6d456194ae868202ea9bcc92e949e2f64e8e3ffcec89a4bec46933ab', 'øÇÛŠÑˆÈø““È/r¦gc\n?ÚÞ±¬»hh/Ùêø@', '7894561230', 'IIITM', 'Gwalior', 1, '', 0, '0'),
(16, 'Shubh', 'unishubh1@gmail.com', 'c5d5ab29e8420a33880343579db46f092325ecb441a80e6d08cfdf66a05e8d95', '¨õÔ\ní]×rÙáUÒ÷uA\0<§AWSü„ÇÉRý', '8989529628', 'IIITM', 'Lucknow', 1, '73fa6ab170394d0b36fb5f514d240d5ffa76f884684647a5425bfa30cecf56bb', 0, '0'),
(17, 'gsfd', 'dsf@fd.com', 'c6ee7ddec2ce00b3a13d56652d20ff18170138198da54086e1d1891ed6e77cbb', '/S@Ž—Um\n¼ð½8]”Ž]…YÅçì÷S‹ŒÏ', '9876543200', 'fghj', 'ghj', 1, '214384daf113e9b18a15461f1390e620060f6d9bf03f9d33fda29292b25bd8f6', 0, '0'),
(18, 'jhyt', 'q@qa.com', 'c1eeb3beae12332153858b87e3e22e9ac37ffad0ddad0d09fc537d39e00f983f', '‘7£\r¼~BÐ½´¾ón.ŸôXƒš	|oÒ9¤QMî@û', '9876543201', 'J', 'SGJK', 1, '2d123509402f87c83a7b4f767280f3b2f42ee1815b94a6461dff84a2a0d3f0bd', 0, '0'),
(19, 'jlk', 'nb@bn.com', 'a54fedc69ef9c063031c6ea4084a13dde89233c8d01205e0ae831da2cef01372', 'úSúw.¥\\¤ê86µïÿ¥?Yd‹1ï¦¬VbžÓM', '7894561236', 'kj', 'd', 1, '86648189ac65b18cefdb0b40a74c340860ec2c55f2ff33cb095c91ece734cbe9', 0, '0'),
(20, 'jhg', 'hg@ygf.com', '817ecbd849eb5760f153bd1d89df7f7c62820fee910796067ee0cefe46456732', 'IE?ÚÌìûü¨Óä+õ=þkˆq$Ã´\Z‹hý`§b2', '9874563214', 'lkj', 'rf', 1, '379acaf8690fa5e92caba22b640073af0de16886aadc04158554df1a70531e37', 0, '0'),
(21, 'Shulkla', 'unis@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'fdsdf', '9876546544', 'l;kj', 'k', 1, '456423safgas', 0, '0'),
(22, 'e', 'd@s.com', '25f9e794323b453885f5181f1b624d0b', 'fdsdf', '9857486541', 'lko', 'lko', 1, '4191cf2b126537c0e81f1a0117d9e0b2', 0, '0'),
(25, 'Rachuri', 'ari0997@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'fdsdf', '9874565132', 'klo', 'lko', 2, '715799dd88e8da7bfe0430b7d3f15628', 0, '0'),
(47, 'Shubh Shukla', 'undefined', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1834083140157198');

-- --------------------------------------------------------

--
-- Table structure for table `users_sessions`
--

CREATE TABLE IF NOT EXISTS `users_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users_sessions`
--

INSERT INTO `users_sessions` (`id`, `user_id`, `hash`) VALUES
(1, 12, '836513d31d27f39da0fd7415faef553792d622b6c47e1b69564cd37966517347');

-- --------------------------------------------------------

--
-- Table structure for table `user_score`
--

CREATE TABLE IF NOT EXISTS `user_score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `user_score`
--

INSERT INTO `user_score` (`id`, `user_id`, `score`) VALUES
(3, 1, 29),
(4, 6, 0),
(6, 8, 0),
(7, 9, 0),
(8, 10, 78),
(9, 11, 0),
(10, 12, 6),
(11, 13, 1),
(12, 14, 0),
(13, 15, 0),
(14, 16, 0),
(15, 17, 0),
(16, 18, 0),
(17, 19, 0),
(18, 20, 0),
(22, 47, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_sessions`
--
ALTER TABLE `users_sessions`
  ADD CONSTRAINT `users_sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_score`
--
ALTER TABLE `user_score`
  ADD CONSTRAINT `user_score_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

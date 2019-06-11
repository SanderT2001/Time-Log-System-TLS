-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 11, 2019 at 11:48 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tlsv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `client_first_name` varchar(35) NOT NULL,
  `client_middle_name` varchar(35) DEFAULT NULL,
  `client_last_name` varchar(35) NOT NULL,
  `client_email` varchar(255) DEFAULT NULL,
  `client_phone` varchar(12) DEFAULT NULL,
  `client_mobile_phone` varchar(12) DEFAULT NULL,
  `client_house_number` varchar(12) DEFAULT NULL,
  `client_street` varchar(100) DEFAULT NULL,
  `client_place` varchar(100) DEFAULT NULL,
  `client_postal_code` varchar(35) DEFAULT NULL,
  `client_country` varchar(100) DEFAULT NULL,
  `client_description` text,
  `by_user` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `client_postal_code` (`client_postal_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `time_type_id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT '0',
  `log_summary` varchar(255) NOT NULL,
  `log_description` text NOT NULL,
  `log_retrospective` text,
  `log_date` date NOT NULL,
  `log_start_time` time NOT NULL,
  `log_end_time` time NOT NULL,
  `log_time_diff_min` int(11) NOT NULL,
  `by_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  `project_description` text NOT NULL,
  `project_retrospective` text,
  `client_id` int(11) DEFAULT '0',
  `project_progress` int(3) DEFAULT NULL,
  `project_start_date` date DEFAULT NULL,
  `project_end_date` date DEFAULT NULL,
  `by_user` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `time_types`
--

DROP TABLE IF EXISTS `time_types`;
CREATE TABLE IF NOT EXISTS `time_types` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_description` text COLLATE utf8_unicode_ci NOT NULL,
  `type_global_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `by_user` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(35) NOT NULL,
  `middle_name` varchar(35) DEFAULT NULL,
  `last_name` varchar(35) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

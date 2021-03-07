-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 07, 2021 at 02:42 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `activity_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity`
--

DROP TABLE IF EXISTS `tbl_activity`;
CREATE TABLE IF NOT EXISTS `tbl_activity` (
  `activity_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_fk` int(11) NOT NULL,
  `activity_type` varchar(50) NOT NULL,
  `activity_name` varchar(150) NOT NULL,
  `activity_key` varchar(30) NOT NULL,
  `accessibility` float DEFAULT NULL,
  `participants` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `added_on` date DEFAULT NULL,
  `active` int(11) NOT NULL,
  `modified_on` date DEFAULT NULL,
  PRIMARY KEY (`activity_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `activity_type` varchar(30) NOT NULL,
  `user_type` int(11) NOT NULL,
  `registered_on` date NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `name`, `user_email`, `username`, `password`, `activity_type`, `user_type`, `registered_on`, `active`) VALUES
(1, 'Alice', 'vinayakrishnanv@gmail.com', 'alice', '202cb962ac59075b964b07152d234b70', '', 1, '2021-03-07', 10);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

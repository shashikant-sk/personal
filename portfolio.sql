-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 06, 2022 at 03:38 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `title` text NOT NULL,
  `tagline` text NOT NULL,
  `first_message` text NOT NULL,
  `second_message` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `fb` text NOT NULL,
  `ig` text NOT NULL,
  `tw` text NOT NULL,
  `git` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `name`, `title`, `tagline`, `first_message`, `second_message`, `email`, `phone`, `fb`, `ig`, `tw`, `git`) VALUES
(1, 'Sulabh', 'Web Developer', 'Web Developer and Project Manager', 'I will help you build your brand and grow your business. I create clarifying strategy, beautiful logo and identity design and engaging websites. ', 'alpha', 'sulabh1919@gmail.com', '+9779867788348', 'https://facebook.com/sulabh1919', 'https://instagram.com/sulabh_nepal', 'https://twitter.com/sulabhnpl', 'https://github.com/sulabh1919');

-- --------------------------------------------------------

--
-- Table structure for table `expirences`
--

DROP TABLE IF EXISTS `expirences`;
CREATE TABLE IF NOT EXISTS `expirences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `position` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expirences`
--

INSERT INTO `expirences` (`id`, `name`, `position`) VALUES
(1, 'Bright Sight Technology', 'Web Dev Internship'),
(2, 'Musikot Durbar Media', 'Website Contract'),
(3, 'UNIIT Software', 'Web Developer and Assistant Project Manager');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `ip` text NOT NULL,
  `stat` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `time`, `date`, `ip`, `stat`) VALUES
(1, 'Sulabh Nepal', 'esulabh119@gmail.com', 'Test', 'Testing', '05:29:37', '2004-01-22', '::1', 0),
(2, 'Sulabh Nepal', 'esulabh119@gmail.com', 'Test', 'Testing', '05:30:06', '2004-01-22', '::1', 0),
(3, 'Sulabh Nepal', 'esulabh119@gmail.com', 'Test', 'Testing', '11:46:47', '2004-01-22', '::1', 0),
(4, 'Sulabh Nepal', 'esulabh119@gmail.com', 'Test', 'Testing', '05:32:55', '2022-01-04', '::1', 0),
(5, 'Sulabh Nepal', 'esulabh119@gmail.com', 'Test', 'Testing', '05:34:33', '2022-01-04', '::1', 0),
(6, 'Sulabh Nepal', 'esulabh119@gmail.com', 'Test', 'Testing', '05:37:22', '2022-01-04', '::1', 0),
(7, 'Sulabh Nepal', 'esulabh119@gmail.com', 'Test', 'Testing', '05:37:49', '2022-01-04', '::1', 0),
(8, 'Sulabh Nepal', 'esulabh119@gmail.com', 'Test', 'Testing', '05:38:11', '2022-01-04', '::1', 0),
(9, 'Sulabh Nepal', 'esulabh119@gmail.com', 'Test', 'Testing', '05:39:37', '2022-01-04', '::1', 0),
(10, 'Sulabh Nepal', 'esulabh119@gmail.com', 'Test', 'Testing', '05:41:35', '2022-01-04', '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `image` text NOT NULL,
  `link` text NOT NULL,
  `details` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `image`, `link`, `details`) VALUES
(1, 'Test', '2.jpg', 'https://facebook.com', 'hzvshbsjz'),
(6, 'Test', '2.jpg', 'https://facebook.com', 'hzvshbsjz'),
(8, 'Test', '2.jpg', 'https://facebook.com', 'hzvshbsjz'),
(9, 'Test', '2.jpg', 'https://facebook.com', 'hzvshbsjz'),
(10, 'Test', '2.jpg', 'https://facebook.com', 'hzvshbsjz'),
(12, 'dnfksn', '1641437629logo.png', 'jdsfnk', 'iohdzfo');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `value`) VALUES
(1, 'HTML', 99),
(2, 'CSS', 75),
(3, 'JS', 85),
(4, 'PHP', 90),
(5, 'mySQL', 93),
(6, 'Laravel', 88),
(7, 'C', 70),
(13, 'python', 60),
(12, 'C++', 90);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `position` text NOT NULL,
  `message` text NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `password`) VALUES
(1, 'test1', 'bot here');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

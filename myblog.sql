-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 19, 2016 at 09:43 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `mpost`
--

CREATE TABLE IF NOT EXISTS `mpost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ptitle` varchar(50) NOT NULL,
  `pbody` text NOT NULL,
  `pdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `mpost`
--

INSERT INTO `mpost` (`id`, `ptitle`, `pbody`, `pdate`) VALUES
(4, 'Other post see', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2016-05-19 17:17:46'),
(5, 'post test ehh', 'hehehehehehehehehehehe more more more', '2016-05-19 19:49:45'),
(6, 'other post', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2016-05-19 19:50:24'),
(7, 'post 6', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2016-05-19 20:01:24'),
(10, 'test title 44', ' test body 44', '2016-05-19 20:04:25'),
(11, 'test Post re', 'huhuhuhuhuhuhuh', '2016-05-19 20:30:48');

-- --------------------------------------------------------

--
-- Table structure for table `muser`
--

CREATE TABLE IF NOT EXISTS `muser` (
  `uname` varchar(255) NOT NULL,
  `upass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `muser`
--

INSERT INTO `muser` (`uname`, `upass`) VALUES
('admin', '25d55ad283aa400af464c76d713c07ad');

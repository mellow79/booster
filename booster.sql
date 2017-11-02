-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 02, 2017 at 11:48 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booster`
--

-- --------------------------------------------------------

--
-- Table structure for table `fundraiser`
--

DROP TABLE IF EXISTS `fundraiser`;
CREATE TABLE IF NOT EXISTS `fundraiser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fundraiser_name` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fundraiser`
--

INSERT INTO `fundraiser` (`id`, `fundraiser_name`) VALUES
(1, 'Childrens Health Care Candy Drive'),
(2, 'Bay High Dance Funding'),
(3, 'Duluth High Bingo Night'),
(4, 'Battle of the Bands');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `fid` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` varchar(21845) DEFAULT NULL,
  `reviewer_name` tinytext,
  `reviewer_email` tinytext,
  `review_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`fid`, `rating`, `review`, `reviewer_name`, `reviewer_email`, `review_date`) VALUES
(1, 5, 'This was the best fundraiser ever!', 'Mark Harvey', 'mark@test.com', '2017-10-27 02:25:25'),
(2, 4, 'I\'m a parent of one of the students, and I did not have money to sent my kid to the dance this year, thanks Boosterthon. Amazing!', 'Paul Garret', 'paul@test.com', '2017-09-27 02:25:25'),
(3, 2, 'This was exciting and fun. I cant wait until we do it again.', 'Stephanie Coleman', 'stephanie@test.com', '2017-09-27 02:25:25'),
(4, 1, 'Amazing fundraiser for the winner of the battle of the bands.', 'Cheryl Goodwin', 'cheryl@test.com', '2017-07-27 02:25:25'),
(1, 3, '', 'Anonymous', '', '2017-11-02 12:33:27'),
(1, 5, '', 'Anonymous', '', '2017-11-02 13:46:11'),
(1, 1, '', 'Anonymous', '', '2017-11-02 14:00:02'),
(1, 5, '', 'Anonymous', '', '2017-11-02 14:00:11'),
(3, 4, '', 'Anonymous', '', '2017-11-02 14:09:25');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

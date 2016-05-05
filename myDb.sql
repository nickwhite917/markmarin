-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 05, 2016 at 01:25 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myDb`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `release_date` varchar(25) DEFAULT NULL,
  `trailer_link` varchar(1000) DEFAULT NULL,
  `thumbnail` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `games_id_uindex` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `title`, `description`, `release_date`, `trailer_link`, `thumbnail`) VALUES
(2, 'Call of Duty 4: Modern Warfare', 'Call of Duty 4: Modern Warfare is the fourth installment of the main series, and was developed by Infinity Ward. ', 'November 7, 2007', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=1&cad=rja&uact=8&ved=0ahUKEwjqpq6ZqMHMAhUBdR4KHZseAlsQyCkIHjAA&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D-4A9WJSXZ9k&usg=AFQjCNGhwwc0-kiP_LhbotwIBqnHAOcS2w&sig2=boBEYX0BRl0u2B3QB2fHxg&bvm=bv.121099550,d.dmo', 'http://upload.wikimedia.org/wikipedia/en/thumb/5/5f/Call_of_Duty_4_Modern_Warfare.jpg/250px-Call_of_Duty_4_Modern_Warfare.jpg'),
(4, 'Half-Life: The Game Series', 'Half-Life (stylized as H?LF-LIFE) is a science fiction first-person shooter video game developed by Valve L.L.C., released in 1998 by Sierra Studios for Microsoft Windows. It was Valve L.L.C.''s debut product and the first in the Half-Life series. ', 'November 8, 1998', 'https://www.youtube.com/watch?v=nc5GyggUeKoved=0ahUKEwjqpq6ZqMHMAhUBdR4KHZseAlsQyCkIHjAA&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D-4A9WJSXZ9k&usg=AFQjCNGhwwc0-kiP_LhbotwIBqnHAOcS2w&sig2=boBEYX0BRl0u2B3QB2fHxg&bvm=bv.121099550,d.dmo', 'https://upload.wikimedia.org/wikipedia/en/thumb/f/fa/Half-Life_Cover_Art.jpg/250px-Half-Life_Cover_Art.jpg'),
(6, 'The Elder Scrolls V: Skyrim', 'The Elder Scrolls V: Skyrim is an action role-playing open world video game developed by Bethesda Game Studios and published by Bethesda Softworks. It is the fifth installment in The Elder Scrolls series, following The Elder Scrolls IV: Oblivion.', 'November 11, 2011', 'https://www.youtube.com/watch?v=JSRtYpNRoN0', 'https://upload.wikimedia.org/wikipedia/en/1/15/The_Elder_Scrolls_V_Skyrim_cover.png');

-- --------------------------------------------------------

--
-- Table structure for table `maint`
--

CREATE TABLE IF NOT EXISTS `maint` (
  `value` varchar(255) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maint`
--

INSERT INTO `maint` (`value`, `updated`) VALUES
('test', '2016-05-04 02:46:25'),
('this is test data', '2016-05-04 02:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) DEFAULT NULL,
  `review` varchar(5000) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reviews_id_uindex` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `game_id`, `review`, `user_id`) VALUES
(23, 2, 'First review!', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(35) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`) VALUES
(3, 'mark', 'mark@mark.com', 'ea82410c7a9991816b5eeeebe195e20a'),
(5, 'test', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2018 at 04:12 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `allphptricks`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `features` varchar(100) NOT NULL,
  `features1` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `image` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`,`features`, `features1`, `price`, `image`) VALUES
(1, 'Normal Set Top Box','Settop01','SD Channels','HD Channels', 1500.00, 'product-images/normal.jpg'),
(2, 'Smart Set Top Box','Settop02','HD Channels','Android Accessible', 2000.00, 'product-images/smart.jpg'),
(3, 'Movie Pack', 'Movie01','English Movie Channels','Hindi Movie Channels', 100.00, 'product-images/movies.jpg'),
(4, 'Drama Pack', 'Drama01','Hindi Drama Channels','Marathi Drama Channels', 120.00, 'product-images/drama.jpg'),
(5, 'News Pack', 'News01','Hindi News Channels','Marathi News Channels', 140.00, 'product-images/News.jpg'),
(6, 'Sports Pack', 'Sports01','Cricket Channels','Football Channels', 150.00, 'product-images/sports.jpg'),
(7, 'Cartoon Pack', 'Cartoon01','Kids Cartoon Channels','Kids Learning Channels', 80.00, 'product-images/cartoon.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

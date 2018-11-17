-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 17-Ago-2018 às 21:39
-- Versão do servidor: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `celke`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(220) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`) VALUES
(1, 'Reuniao', '#0071c5', '2018-08-17 09:00:00', '2018-08-23 11:00:00'),
(2, 'Palestra', '#40e0d0', '2018-08-13 14:00:00', '2018-08-13 17:00:00'),
(3, 'Reuniao 1', '#FFD700', '2018-08-23 08:00:00', '2018-08-23 09:00:00'),
(4, 'Reuniao 3', '#40e0d0', '2018-08-23 10:00:00', '2018-08-23 11:00:00'),
(5, 'Reuniao 4', '#0071c5', '2018-08-23 11:00:00', '2018-08-13 12:00:00'),
(6, 'Reuniao 5', '#FFD700', '2018-08-23 13:00:00', '2018-08-23 14:00:00'),
(7, 'Reuniao 6', '#0071c5', '2018-08-23 14:00:00', '2018-08-23 15:00:00'),
(8, 'Reuniao 7', '#FFD700', '2018-08-23 16:00:00', '2018-08-23 17:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

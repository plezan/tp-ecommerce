-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 08 Février 2017 à 15:56
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecommerce`
--

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`art_id`, `art_name`, `art_description`, `art_price`, `art_note`, `order_id`, `cat_id`) VALUES
(1, 'Blague carambar', '         une blague a 2 balles\r\n        ', '2.00', NULL, NULL, NULL),
(2, 'coussin péteur', '    un grand classique  ', '4.99', NULL, NULL, NULL);

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'point bonus'),
(2, 'assurance'),
(3, 'assurance');

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`user_id`, `user_grade`, `user_email`, `user_firstName`, `user_lastName`, `user_password`) VALUES
(1, 1, '1pierrelezan@gmail.com', 'Pierre', 'Lezan', '$2y$10$GDGUJEYEs2X6iUqrEtYYz.VWLK2S/i4vb/T0kAlSh0yGbFevxXrwC'),
(3, 1, 'admin@admin', 'admin', 'admin', '$2y$10$1b50QZEIN3s32MeaAe23heSPfmrkbmZl30sYgBnGomgpe45Hy/3HC');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

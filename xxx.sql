-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 29 Mars 2015 à 04:25
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `xxx`
--
CREATE DATABASE IF NOT EXISTS `xxx` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `xxx`;

-- --------------------------------------------------------

--
-- Structure de la table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(180) NOT NULL,
  `version` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `application`
--

INSERT INTO `application` (`id`, `hash`, `version`) VALUES
(17, '0', ''),
(18, '0', ''),
(19, '09aeff104891dfc845f037cd66332c07a361ce64', ''),
(20, 'Afc934bb4c72844e3a00308faf77aaac2ec41736', ''),
(21, 'A79bb84e61971546802ef7ec48d115418bfad51f', ''),
(22, 'A0a79c503c403c270d7f8000f2ae27bb46c74ba0', ''),
(23, 'B60c41a18fcf7432490c29c5170e7dd3728bd806', ''),
(24, 'B83591a1cadf706c7b0fb0b9c6b3eb9fd16c9b4c', ''),
(25, 'B8c1eb201e303f34b010ec26f43ec9119df24e29', ''),
(26, 'A387486264e3c1f0141ce7d868e712a701c5d47e', ''),
(27, 'Ba19b1cbe983b0812c71b1dbec2fb833e47120e3', ''),
(28, 'A24d833a1007cab2e8b30362467ae6dfd576a65d', ''),
(29, 'B45a2dc14ec824559fad05e9a497bd5385bbe727', ''),
(30, 'B4afa5b50e9a897a485911abe33b899e7654acd0', '');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `hashwid` varchar(120) CHARACTER SET ascii COLLATE ascii_bin DEFAULT NULL,
  `hwidtime` int(2) NOT NULL,
  `profilehf` varchar(250) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `date_expiration` date DEFAULT NULL,
  `nombre_renouvellement` int(30) DEFAULT NULL,
  `grade` varchar(30) DEFAULT NULL,
  `hashrenew` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `customers`
--

INSERT INTO `customers` (`id`, `pseudo`, `password`, `hashwid`, `hwidtime`, `profilehf`, `date_creation`, `date_expiration`, `nombre_renouvellement`, `grade`, `hashrenew`) VALUES
(1, 'Manu', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '846ee340703911de9d20806e6f6e6963', 0, 'http://xxx.net/profile.php?id=333', '2015-03-12', '2015-06-18', 0, 'Silver', ''),
(2, 'magic', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', NULL, 0, NULL, '2015-03-14', '2015-03-12', NULL, NULL, 'e68a295aa4daaeb7f525c7be4f8f585635960fb5'),
(3, 'test', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', NULL, 0, NULL, NULL, '2015-06-18', NULL, NULL, ''),
(4, 'adil', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', NULL, 0, NULL, NULL, NULL, NULL, NULL, ''),
(5, 'papp', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', NULL, 0, NULL, NULL, NULL, NULL, NULL, ''),
(6, 'tesz', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', NULL, 0, NULL, NULL, NULL, NULL, NULL, ''),
(7, 'xxx', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', NULL, 0, NULL, NULL, NULL, NULL, NULL, ''),
(8, 'pauleta', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', NULL, 0, NULL, NULL, NULL, NULL, NULL, ''),
(9, 'app', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', NULL, 0, NULL, NULL, NULL, NULL, NULL, '6905a47378eef40cdcdc718db5d0e04419a500b4'),
(10, 'hellow', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', NULL, 0, NULL, NULL, NULL, NULL, NULL, '6905a47378eef40cdcdc718db5d0e04419a500b4'),
(11, 'ep', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', NULL, 0, NULL, NULL, NULL, NULL, NULL, '6905a47378eef40cdcdc718db5d0e04419a500b4'),
(12, 'Pedro', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'ok', 0, NULL, '2015-03-14', '2015-06-14', NULL, NULL, '6905a47378eef40cdcdc718db5d0e04419a500b4'),
(13, 'wolfk', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '33333', 0, NULL, '2015-03-14', '2015-06-14', NULL, NULL, '6905a47378eef40cdcdc718db5d0e04419a500b4'),
(14, 'koala', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '3666', 0, NULL, '2015-03-14', '2015-06-14', NULL, NULL, '6905a47378eef40cdcdc718db5d0e04419a500b4'),
(15, 'Anonymous', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'ano', 0, NULL, '2015-03-14', '2015-06-14', NULL, NULL, '6905a47378eef40cdcdc718db5d0e04419a500b4'),
(16, 'AnonymousA', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'ano', 0, NULL, '2015-03-14', '2015-06-14', NULL, NULL, '6905a47378eef40cdcdc718db5d0e04419a500b4'),
(17, 'donkey', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'ano', 0, NULL, '2015-03-14', '2015-06-14', NULL, NULL, '6905a47378eef40cdcdc718db5d0e04419a500b4'),
(18, 'passs', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'pa', 0, NULL, '2015-03-14', '2015-06-14', NULL, NULL, '6905a47378eef40cdcdc718db5d0e04419a500b4'),
(19, 'donald', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'doo', 0, NULL, '2015-03-14', '2015-06-14', NULL, NULL, '2dfebc9bbb9488ce34a21388833c369ce64944df'),
(20, 'proto', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'proto', 0, NULL, '2015-03-14', '2015-09-14', NULL, NULL, '6905a47378eef40cdcdc718db5d0e04419a500b4'),
(21, 'yout', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'yout', 0, NULL, '2015-03-14', '2015-09-09', NULL, NULL, '6905a47378eef40cdcdc718db5d0e04419a500b4'),
(22, 'A', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'de', 1, NULL, '2015-03-14', '2015-09-09', NULL, NULL, '4bb71fab1a5b27225e3c3a48c095eb4c586923fe'),
(23, 'B', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'eaj', 0, NULL, '2015-03-14', '2015-09-09', NULL, NULL, '3a92c46d2bab1e5651b4fa9f90e2cbb54a2e5b01'),
(24, 'Atest', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '', 1, NULL, '2015-03-14', '2015-05-14', NULL, NULL, 'f7e7a34795d32896f8344636ef3547102a28193b'),
(25, 'Btest', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'ezezze', 1, NULL, '2015-03-14', '2015-09-14', NULL, NULL, 'c3c076150bf71b2f82e52f106d43207408655ff1'),
(26, 'Ctest', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'c', 0, NULL, '2015-03-14', '2015-06-14', NULL, NULL, '6905a47378eef40cdcdc718db5d0e04419a500b4'),
(27, 'koka', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '333', 0, '3333', '2015-03-14', '2015-09-14', NULL, NULL, '699855992fa9ab3e6da47df9c9e0e536bebfd289'),
(28, 'New', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'ama', 0, 'ama', '2015-03-14', '2015-09-14', NULL, NULL, '6905a47378eef40cdcdc718db5d0e04419a500b4'),
(29, 'DD', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'dede', 0, 'dede', '2015-03-14', '2015-09-14', NULL, NULL, '6905a47378eef40cdcdc718db5d0e04419a500b4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

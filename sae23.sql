-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 13 Juin 2024 à 16:58
-- Version du serveur :  5.6.20
-- Version de PHP :  5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `sae23`
--

-- --------------------------------------------------------

--
-- Structure de la table `Administration`
--

CREATE TABLE IF NOT EXISTS `Administration` (
  `login_admin` varchar(20) NOT NULL,
  `MotPasse_admin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Administration`
--

INSERT INTO `Administration` (`login_admin`, `MotPasse_admin`) VALUES
('admin_CTL', 'systemctl');

-- --------------------------------------------------------

--
-- Structure de la table `Batiment`
--

CREATE TABLE IF NOT EXISTS `Batiment` (
  `ID_bat` varchar(1) NOT NULL,
  `nom` varchar(14) NOT NULL,
  `login_gest` varchar(20) NOT NULL,
  `MotPasse_gest` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Batiment`
--

INSERT INTO `Batiment` (`ID_bat`, `nom`, `login_gest`, `MotPasse_gest`) VALUES
('B', 'info/gim', 'daran', 'passdaran'),
('E', 'R&T', 'brulin', 'passbrulin');

-- --------------------------------------------------------

--
-- Structure de la table `Capteur`
--

CREATE TABLE IF NOT EXISTS `Capteur` (
  `Nom_capt` varchar(10) NOT NULL,
  `Type` varchar(15) NOT NULL,
  `Unite` varchar(3) NOT NULL,
  `Nom_salle` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Capteur`
--

INSERT INTO `Capteur` (`Nom_capt`, `Type`, `Unite`, `Nom_salle`) VALUES
('AM107-13', 'CO2', 'ppm', 'B105'),
('AM107-26', 'CO2', 'ppm', 'E003'),
('AM107-35', 'CO2', 'ppm', 'E105'),
('AM107-8', 'CO2', 'ppm', 'B002');

-- --------------------------------------------------------

--
-- Structure de la table `Mesure`
--

CREATE TABLE IF NOT EXISTS `Mesure` (
`ID_mes` int(10) NOT NULL,
  `date` date NOT NULL,
  `horaire` time NOT NULL,
  `valeur` float NOT NULL,
  `Nom_capt` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=379 ;

--
-- Contenu de la table `Mesure`
--

INSERT INTO `Mesure` (`ID_mes`, `date`, `horaire`, `valeur`, `Nom_capt`) VALUES
(8, '2024-06-04', '14:00:33', 578, 'AM107-35'),
(9, '2024-06-04', '14:00:37', 2165, 'AM107-8'),
(10, '2024-06-04', '14:10:36', 2024, 'AM107-8'),
(11, '2024-06-04', '14:11:24', 830, 'AM107-13'),
(12, '2024-06-04', '14:11:50', 442, 'AM107-26'),
(13, '2024-06-04', '14:20:32', 603, 'AM107-35'),
(14, '2024-06-04', '15:00:32', 487, 'AM107-35'),
(15, '2024-06-04', '15:00:37', 2108, 'AM107-8'),
(16, '2024-06-04', '15:01:24', 528, 'AM107-13'),
(17, '2024-06-04', '15:01:50', 455, 'AM107-26'),
(19, '2024-06-05', '15:40:31', 529, 'AM107-35'),
(21, '2024-06-05', '15:40:37', 2276, 'AM107-8'),
(23, '2024-06-05', '15:41:24', 444, 'AM107-13'),
(25, '2024-06-05', '15:41:50', 615, 'AM107-26'),
(26, '2024-06-05', '15:50:33', 527, 'AM107-35'),
(27, '2024-06-05', '15:50:36', 2288, 'AM107-8'),
(28, '2024-06-05', '15:51:24', 484, 'AM107-13'),
(29, '2024-06-05', '15:51:50', 602, 'AM107-26'),
(30, '2024-06-05', '16:00:32', 540, 'AM107-35'),
(31, '2024-06-05', '16:00:36', 2312, 'AM107-8'),
(32, '2024-06-05', '16:01:24', 500, 'AM107-13'),
(33, '2024-06-05', '16:10:32', 505, 'AM107-35'),
(34, '2024-06-05', '16:10:37', 2296, 'AM107-8'),
(35, '2024-06-05', '16:11:24', 505, 'AM107-13'),
(36, '2024-06-05', '16:11:50', 571, 'AM107-26'),
(37, '2024-06-05', '16:11:50', 571, 'AM107-26'),
(46, '2024-06-05', '16:40:31', 543, 'AM107-35'),
(47, '2024-06-05', '16:40:37', 2325, 'AM107-8'),
(48, '2024-06-05', '16:41:24', 551, 'AM107-13'),
(49, '2024-06-05', '16:41:51', 549, 'AM107-26'),
(50, '2024-06-05', '16:50:37', 2329, 'AM107-8'),
(51, '2024-06-05', '16:51:23', 557, 'AM107-13'),
(52, '2024-06-05', '16:51:50', 542, 'AM107-26'),
(54, '2024-06-05', '17:00:37', 2320, 'AM107-8'),
(56, '2024-06-05', '17:10:36', 2314, 'AM107-8'),
(57, '2024-06-05', '17:10:36', 2314, 'AM107-8'),
(58, '2024-06-05', '17:11:24', 507, 'AM107-13'),
(59, '2024-06-05', '17:11:24', 507, 'AM107-13'),
(60, '2024-06-05', '17:11:51', 518, 'AM107-26'),
(61, '2024-06-05', '17:11:51', 518, 'AM107-26'),
(64, '2024-06-05', '17:20:37', 2314, 'AM107-8'),
(65, '2024-06-05', '17:21:24', 496, 'AM107-13'),
(66, '2024-06-05', '17:21:51', 500, 'AM107-26'),
(68, '2024-06-05', '17:30:37', 2291, 'AM107-8'),
(69, '2024-06-05', '17:31:24', 493, 'AM107-13'),
(70, '2024-06-05', '17:31:50', 497, 'AM107-26'),
(72, '2024-06-05', '17:40:36', 2299, 'AM107-8'),
(73, '2024-06-05', '17:41:24', 482, 'AM107-13'),
(74, '2024-06-05', '17:41:50', 490, 'AM107-26'),
(76, '2024-06-05', '17:50:37', 2315, 'AM107-8'),
(77, '2024-06-05', '17:51:24', 487, 'AM107-13'),
(78, '2024-06-05', '17:51:51', 482, 'AM107-26'),
(80, '2024-06-05', '18:00:37', 2306, 'AM107-8'),
(81, '2024-06-05', '18:01:23', 472, 'AM107-13'),
(82, '2024-06-05', '18:01:51', 469, 'AM107-26'),
(84, '2024-06-07', '12:00:37', 1790, 'AM107-8'),
(85, '2024-06-07', '12:01:23', 515, 'AM107-13'),
(86, '2024-06-07', '12:01:52', 493, 'AM107-26'),
(88, '2024-06-07', '12:10:37', 1778, 'AM107-8'),
(89, '2024-06-07', '12:11:24', 479, 'AM107-13'),
(91, '2024-06-07', '12:20:36', 1744, 'AM107-8'),
(92, '2024-06-07', '12:21:24', 461, 'AM107-13'),
(93, '2024-06-07', '12:21:51', 491, 'AM107-26'),
(94, '2024-06-07', '12:21:51', 491, 'AM107-26'),
(96, '2024-06-07', '12:30:37', 1741, 'AM107-8'),
(97, '2024-06-07', '12:31:23', 460, 'AM107-13'),
(98, '2024-06-07', '12:31:52', 480, 'AM107-26'),
(100, '2024-06-07', '12:40:37', 1762, 'AM107-8'),
(101, '2024-06-07', '12:41:23', 437, 'AM107-13'),
(102, '2024-06-07', '12:41:52', 483, 'AM107-26'),
(104, '2024-06-07', '12:50:37', 1791, 'AM107-8'),
(105, '2024-06-07', '12:51:24', 425, 'AM107-13'),
(106, '2024-06-07', '12:51:51', 479, 'AM107-26'),
(108, '2024-06-07', '13:00:36', 1818, 'AM107-8'),
(109, '2024-06-07', '13:01:23', 426, 'AM107-13'),
(110, '2024-06-07', '13:01:52', 473, 'AM107-26'),
(112, '2024-06-07', '13:10:37', 1854, 'AM107-8'),
(113, '2024-06-07', '13:11:23', 450, 'AM107-13'),
(114, '2024-06-07', '13:11:52', 473, 'AM107-26'),
(116, '2024-06-07', '13:20:37', 1903, 'AM107-8'),
(117, '2024-06-07', '13:21:24', 462, 'AM107-13'),
(118, '2024-06-07', '13:21:51', 460, 'AM107-26'),
(120, '2024-06-07', '13:30:36', 1934, 'AM107-8'),
(121, '2024-06-07', '13:31:23', 506, 'AM107-13'),
(122, '2024-06-07', '13:31:51', 463, 'AM107-26'),
(124, '2024-06-07', '13:40:36', 1958, 'AM107-8'),
(125, '2024-06-07', '13:41:23', 542, 'AM107-13'),
(126, '2024-06-07', '13:41:52', 459, 'AM107-26'),
(127, '2024-06-07', '13:50:37', 1990, 'AM107-8'),
(128, '2024-06-07', '13:51:23', 518, 'AM107-13'),
(131, '2024-06-07', '14:00:37', 2005, 'AM107-8'),
(132, '2024-06-07', '14:01:24', 515, 'AM107-13'),
(133, '2024-06-07', '14:01:51', 459, 'AM107-26'),
(135, '2024-06-07', '14:10:36', 2007, 'AM107-8'),
(136, '2024-06-07', '14:11:23', 544, 'AM107-13'),
(137, '2024-06-07', '14:11:51', 464, 'AM107-26'),
(139, '2024-06-07', '14:20:37', 2001, 'AM107-8'),
(140, '2024-06-07', '14:21:23', 611, 'AM107-13'),
(141, '2024-06-07', '14:21:52', 463, 'AM107-26'),
(143, '2024-06-07', '14:30:37', 2050, 'AM107-8'),
(144, '2024-06-07', '14:31:23', 716, 'AM107-13'),
(145, '2024-06-07', '14:31:52', 460, 'AM107-26'),
(148, '2024-06-11', '12:42:07', 448, 'AM107-26'),
(153, '2024-06-11', '12:50:26', 498, 'AM107-35'),
(155, '2024-06-11', '12:50:41', 2156, 'AM107-8'),
(157, '2024-06-11', '12:51:28', 417, 'AM107-13'),
(158, '2024-06-11', '12:52:07', 444, 'AM107-26'),
(159, '2024-06-11', '13:00:26', 488, 'AM107-35'),
(160, '2024-06-11', '13:00:41', 2124, 'AM107-8'),
(161, '2024-06-11', '13:01:28', 416, 'AM107-13'),
(162, '2024-06-11', '13:02:08', 440, 'AM107-26'),
(164, '2024-06-11', '13:20:26', 465, 'AM107-35'),
(165, '2024-06-11', '13:20:41', 2171, 'AM107-8'),
(166, '2024-06-11', '13:21:27', 457, 'AM107-13'),
(167, '2024-06-11', '13:22:07', 431, 'AM107-26'),
(168, '2024-06-11', '13:30:26', 462, 'AM107-35'),
(169, '2024-06-11', '13:30:41', 2216, 'AM107-8'),
(170, '2024-06-11', '13:31:28', 522, 'AM107-13'),
(171, '2024-06-11', '13:32:07', 429, 'AM107-26'),
(172, '2024-06-11', '13:40:27', 485, 'AM107-35'),
(173, '2024-06-11', '13:40:41', 2255, 'AM107-8'),
(174, '2024-06-11', '13:41:27', 602, 'AM107-13'),
(175, '2024-06-11', '13:42:06', 427, 'AM107-26'),
(176, '2024-06-11', '13:50:28', 626, 'AM107-35'),
(177, '2024-06-11', '13:50:41', 2254, 'AM107-8'),
(178, '2024-06-11', '13:51:27', 663, 'AM107-13'),
(179, '2024-06-11', '13:52:07', 427, 'AM107-26'),
(180, '2024-06-11', '14:00:28', 715, 'AM107-35'),
(181, '2024-06-11', '14:00:41', 2267, 'AM107-8'),
(182, '2024-06-11', '14:01:27', 687, 'AM107-13'),
(183, '2024-06-11', '14:02:07', 422, 'AM107-26'),
(184, '2024-06-11', '14:10:27', 759, 'AM107-35'),
(185, '2024-06-11', '14:10:40', 2249, 'AM107-8'),
(186, '2024-06-11', '14:11:28', 697, 'AM107-13'),
(187, '2024-06-11', '14:12:07', 427, 'AM107-26'),
(188, '2024-06-11', '14:20:28', 792, 'AM107-35'),
(189, '2024-06-11', '14:20:41', 2236, 'AM107-8'),
(190, '2024-06-11', '14:21:27', 724, 'AM107-13'),
(191, '2024-06-11', '14:22:06', 424, 'AM107-26'),
(192, '2024-06-11', '14:30:30', 781, 'AM107-35'),
(193, '2024-06-11', '14:30:41', 2272, 'AM107-8'),
(194, '2024-06-11', '14:31:27', 712, 'AM107-13'),
(195, '2024-06-11', '14:32:07', 427, 'AM107-26'),
(196, '2024-06-11', '14:40:27', 898, 'AM107-35'),
(197, '2024-06-11', '14:40:40', 2259, 'AM107-8'),
(198, '2024-06-11', '14:41:28', 675, 'AM107-13'),
(199, '2024-06-11', '14:42:07', 424, 'AM107-26'),
(200, '2024-06-11', '14:50:41', 2223, 'AM107-8'),
(201, '2024-06-11', '14:51:27', 619, 'AM107-13'),
(202, '2024-06-11', '14:52:07', 425, 'AM107-26'),
(203, '2024-06-11', '15:00:31', 961, 'AM107-35'),
(204, '2024-06-11', '15:00:31', 961, 'AM107-35'),
(205, '2024-06-11', '15:00:41', 2209, 'AM107-8'),
(206, '2024-06-11', '15:01:27', 608, 'AM107-13'),
(207, '2024-06-11', '15:02:07', 432, 'AM107-26'),
(208, '2024-06-11', '15:10:27', 990, 'AM107-35'),
(209, '2024-06-11', '15:10:41', 2224, 'AM107-8'),
(210, '2024-06-11', '15:11:27', 592, 'AM107-13'),
(211, '2024-06-11', '15:20:27', 992, 'AM107-35'),
(212, '2024-06-11', '15:20:40', 2219, 'AM107-8'),
(213, '2024-06-11', '15:21:27', 591, 'AM107-13'),
(214, '2024-06-11', '15:22:07', 420, 'AM107-26'),
(215, '2024-06-11', '15:22:07', 420, 'AM107-26'),
(216, '2024-06-11', '15:30:29', 1071, 'AM107-35'),
(217, '2024-06-11', '15:30:41', 2229, 'AM107-8'),
(218, '2024-06-11', '15:31:27', 591, 'AM107-13'),
(219, '2024-06-11', '15:32:07', 423, 'AM107-26'),
(220, '2024-06-11', '15:40:28', 1075, 'AM107-35'),
(221, '2024-06-11', '15:40:41', 2233, 'AM107-8'),
(222, '2024-06-11', '15:41:27', 590, 'AM107-13'),
(223, '2024-06-11', '15:42:07', 426, 'AM107-26'),
(224, '2024-06-11', '15:50:27', 1054, 'AM107-35'),
(225, '2024-06-11', '15:50:41', 2258, 'AM107-8'),
(226, '2024-06-11', '15:51:28', 602, 'AM107-13'),
(227, '2024-06-11', '15:52:07', 424, 'AM107-26'),
(228, '2024-06-11', '16:00:27', 1037, 'AM107-35'),
(229, '2024-06-11', '16:00:40', 2260, 'AM107-8'),
(230, '2024-06-11', '16:01:28', 705, 'AM107-13'),
(231, '2024-06-11', '16:02:07', 429, 'AM107-26'),
(232, '2024-06-11', '16:10:28', 1032, 'AM107-35'),
(233, '2024-06-11', '16:10:41', 2277, 'AM107-8'),
(234, '2024-06-11', '16:11:27', 760, 'AM107-13'),
(235, '2024-06-11', '16:12:06', 429, 'AM107-26'),
(236, '2024-06-11', '16:20:28', 1049, 'AM107-35'),
(237, '2024-06-11', '16:20:41', 2315, 'AM107-8'),
(238, '2024-06-11', '16:21:27', 769, 'AM107-13'),
(239, '2024-06-11', '16:22:07', 432, 'AM107-26'),
(240, '2024-06-11', '16:30:27', 1040, 'AM107-35'),
(241, '2024-06-11', '16:30:41', 2291, 'AM107-8'),
(242, '2024-06-11', '16:31:28', 778, 'AM107-13'),
(243, '2024-06-11', '16:32:07', 431, 'AM107-26'),
(244, '2024-06-11', '16:40:29', 1056, 'AM107-35'),
(245, '2024-06-11', '16:40:41', 2289, 'AM107-8'),
(246, '2024-06-11', '16:41:27', 748, 'AM107-13'),
(247, '2024-06-11', '16:42:07', 433, 'AM107-26'),
(248, '2024-06-11', '16:50:28', 1043, 'AM107-35'),
(249, '2024-06-11', '16:50:42', 2297, 'AM107-8'),
(250, '2024-06-11', '16:51:27', 668, 'AM107-13'),
(251, '2024-06-11', '16:52:07', 444, 'AM107-26'),
(252, '2024-06-11', '17:00:27', 1014, 'AM107-35'),
(253, '2024-06-11', '17:00:41', 2274, 'AM107-8'),
(254, '2024-06-11', '17:01:27', 633, 'AM107-13'),
(255, '2024-06-11', '17:02:08', 436, 'AM107-26'),
(256, '2024-06-11', '17:10:27', 997, 'AM107-35'),
(257, '2024-06-11', '17:10:40', 2267, 'AM107-8'),
(258, '2024-06-11', '17:11:28', 616, 'AM107-13'),
(259, '2024-06-11', '17:12:07', 435, 'AM107-26'),
(260, '2024-06-11', '17:20:28', 967, 'AM107-35'),
(261, '2024-06-11', '17:20:41', 2245, 'AM107-8'),
(262, '2024-06-11', '17:21:27', 607, 'AM107-13'),
(263, '2024-06-11', '17:22:07', 438, 'AM107-26'),
(264, '2024-06-11', '17:30:28', 944, 'AM107-35'),
(265, '2024-06-11', '17:30:41', 2247, 'AM107-8'),
(266, '2024-06-11', '17:31:27', 582, 'AM107-13'),
(267, '2024-06-11', '17:32:07', 432, 'AM107-26'),
(268, '2024-06-11', '17:40:27', 922, 'AM107-35'),
(269, '2024-06-11', '17:40:41', 2258, 'AM107-8'),
(270, '2024-06-11', '17:41:28', 572, 'AM107-13'),
(271, '2024-06-11', '17:42:07', 435, 'AM107-26'),
(272, '2024-06-11', '17:50:27', 863, 'AM107-35'),
(273, '2024-06-11', '17:50:41', 2240, 'AM107-8'),
(274, '2024-06-11', '17:51:27', 574, 'AM107-13'),
(275, '2024-06-11', '17:52:07', 433, 'AM107-26'),
(276, '2024-06-11', '18:00:26', 820, 'AM107-35'),
(277, '2024-06-12', '08:10:28', 628, 'AM107-35'),
(278, '2024-06-12', '08:10:42', 1808, 'AM107-8'),
(279, '2024-06-12', '08:11:27', 442, 'AM107-13'),
(280, '2024-06-12', '08:20:27', 722, 'AM107-35'),
(281, '2024-06-12', '08:20:41', 1818, 'AM107-8'),
(282, '2024-06-12', '08:21:27', 453, 'AM107-13'),
(284, '2024-06-12', '08:22:07', 461, 'AM107-26'),
(285, '2024-06-12', '08:30:41', 1829, 'AM107-8'),
(286, '2024-06-12', '08:31:27', 454, 'AM107-13'),
(287, '2024-06-12', '08:32:09', 464, 'AM107-26'),
(289, '2024-06-12', '08:40:28', 730, 'AM107-35'),
(290, '2024-06-12', '08:40:41', 1823, 'AM107-8'),
(291, '2024-06-12', '08:41:29', 472, 'AM107-13'),
(292, '2024-06-12', '08:42:08', 458, 'AM107-26'),
(293, '2024-06-12', '08:50:28', 742, 'AM107-35'),
(294, '2024-06-12', '08:51:27', 462, 'AM107-13'),
(295, '2024-06-12', '08:52:10', 455, 'AM107-26'),
(296, '2024-06-12', '09:00:28', 764, 'AM107-35'),
(297, '2024-06-12', '09:00:42', 1843, 'AM107-8'),
(298, '2024-06-12', '09:00:42', 1843, 'AM107-8'),
(299, '2024-06-12', '09:01:27', 485, 'AM107-13'),
(300, '2024-06-12', '09:02:08', 454, 'AM107-26'),
(301, '2024-06-12', '09:10:28', 812, 'AM107-35'),
(302, '2024-06-12', '09:10:41', 1861, 'AM107-8'),
(303, '2024-06-12', '09:11:27', 487, 'AM107-13'),
(304, '2024-06-12', '09:12:09', 460, 'AM107-26'),
(305, '2024-06-12', '17:20:27', 1044, 'AM107-35'),
(306, '2024-06-12', '17:20:41', 2520, 'AM107-8'),
(307, '2024-06-12', '17:21:27', 650, 'AM107-13'),
(308, '2024-06-12', '17:22:07', 431, 'AM107-26'),
(309, '2024-06-12', '17:30:28', 1021, 'AM107-35'),
(310, '2024-06-12', '17:30:41', 2535, 'AM107-8'),
(311, '2024-06-12', '17:31:27', 598, 'AM107-13'),
(312, '2024-06-12', '17:32:08', 425, 'AM107-26'),
(313, '2024-06-12', '17:40:28', 952, 'AM107-35'),
(314, '2024-06-12', '17:40:41', 2447, 'AM107-8'),
(315, '2024-06-12', '17:41:28', 578, 'AM107-13'),
(316, '2024-06-12', '17:42:08', 428, 'AM107-26'),
(317, '2024-06-12', '17:50:27', 961, 'AM107-35'),
(318, '2024-06-12', '17:50:41', 2415, 'AM107-8'),
(319, '2024-06-12', '17:51:28', 585, 'AM107-13'),
(320, '2024-06-12', '17:52:07', 428, 'AM107-26'),
(321, '2024-06-12', '18:00:27', 980, 'AM107-35'),
(322, '2024-06-12', '18:00:41', 2363, 'AM107-8'),
(323, '2024-06-12', '18:01:27', 592, 'AM107-13'),
(324, '2024-06-12', '18:02:07', 429, 'AM107-26'),
(325, '2024-06-13', '09:00:29', 486, 'AM107-35'),
(326, '2024-06-13', '09:00:42', 1853, 'AM107-8'),
(327, '2024-06-13', '09:01:27', 489, 'AM107-13'),
(328, '2024-06-13', '09:02:08', 437, 'AM107-26'),
(329, '2024-06-13', '09:10:28', 466, 'AM107-35'),
(330, '2024-06-13', '09:10:41', 1862, 'AM107-8'),
(331, '2024-06-13', '09:11:27', 499, 'AM107-13'),
(332, '2024-06-13', '09:12:08', 438, 'AM107-26'),
(333, '2024-06-13', '09:20:27', 456, 'AM107-35'),
(334, '2024-06-13', '09:20:41', 1865, 'AM107-8'),
(335, '2024-06-13', '09:21:27', 517, 'AM107-13'),
(336, '2024-06-13', '09:22:08', 438, 'AM107-26'),
(337, '2024-06-13', '10:00:28', 863, 'AM107-35'),
(338, '2024-06-13', '10:00:40', 1866, 'AM107-8'),
(339, '2024-06-13', '10:01:27', 790, 'AM107-13'),
(340, '2024-06-13', '10:02:08', 436, 'AM107-26'),
(341, '2024-06-13', '10:10:27', 937, 'AM107-35'),
(342, '2024-06-13', '10:10:41', 1887, 'AM107-8'),
(343, '2024-06-13', '10:11:27', 963, 'AM107-13'),
(344, '2024-06-13', '10:12:08', 433, 'AM107-26'),
(345, '2024-06-13', '10:30:28', 941, 'AM107-35'),
(346, '2024-06-13', '10:30:41', 1894, 'AM107-8'),
(347, '2024-06-13', '10:31:27', 1014, 'AM107-13'),
(348, '2024-06-13', '10:32:08', 434, 'AM107-26'),
(349, '2024-06-13', '10:50:27', 851, 'AM107-35'),
(350, '2024-06-13', '10:50:41', 1889, 'AM107-8'),
(351, '2024-06-13', '10:51:26', 999, 'AM107-13'),
(352, '2024-06-13', '10:52:07', 432, 'AM107-26'),
(353, '2024-06-13', '11:00:26', 808, 'AM107-35'),
(354, '2024-06-13', '11:00:41', 1911, 'AM107-8'),
(355, '2024-06-13', '11:01:26', 1016, 'AM107-13'),
(356, '2024-06-13', '11:02:08', 434, 'AM107-26'),
(357, '2024-06-13', '11:10:26', 758, 'AM107-35'),
(358, '2024-06-13', '11:10:40', 1952, 'AM107-8'),
(359, '2024-06-13', '11:11:27', 1053, 'AM107-13'),
(360, '2024-06-13', '11:12:08', 448, 'AM107-26'),
(361, '2024-06-13', '11:20:26', 718, 'AM107-35'),
(362, '2024-06-13', '11:20:41', 1962, 'AM107-8'),
(363, '2024-06-13', '11:21:27', 1070, 'AM107-13'),
(364, '2024-06-13', '11:22:08', 546, 'AM107-26'),
(365, '2024-06-13', '11:30:27', 706, 'AM107-35'),
(366, '2024-06-13', '11:30:41', 1942, 'AM107-8'),
(367, '2024-06-13', '11:31:26', 1096, 'AM107-13'),
(368, '2024-06-13', '11:32:08', 891, 'AM107-26'),
(369, '2024-06-13', '11:40:26', 668, 'AM107-35'),
(370, '2024-06-13', '11:40:41', 1964, 'AM107-8'),
(371, '2024-06-13', '11:41:26', 1085, 'AM107-13'),
(372, '2024-06-13', '11:42:08', 1093, 'AM107-26'),
(373, '2024-06-13', '14:30:31', 581, 'AM107-35'),
(374, '2024-06-13', '14:30:42', 1908, 'AM107-8'),
(375, '2024-06-13', '14:31:27', 743, 'AM107-13'),
(376, '2024-06-13', '14:32:09', 491, 'AM107-26'),
(377, '2024-06-13', '14:40:29', 570, 'AM107-35'),
(378, '2024-06-13', '14:40:41', 1902, 'AM107-8');

-- --------------------------------------------------------

--
-- Structure de la table `Salle`
--

CREATE TABLE IF NOT EXISTS `Salle` (
  `Nom_salle` varchar(4) NOT NULL,
  `Type` varchar(5) NOT NULL,
  `CapaciteAccueil` int(3) NOT NULL,
  `ID_bat` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Salle`
--

INSERT INTO `Salle` (`Nom_salle`, `Type`, `CapaciteAccueil`, `ID_bat`) VALUES
('B002', 'TD', 34, 'B'),
('B105', 'TP', 20, 'B'),
('E003', 'TD', 30, 'E'),
('E105', 'TP', 16, 'E');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Administration`
--
ALTER TABLE `Administration`
 ADD PRIMARY KEY (`login_admin`);

--
-- Index pour la table `Batiment`
--
ALTER TABLE `Batiment`
 ADD PRIMARY KEY (`ID_bat`);

--
-- Index pour la table `Capteur`
--
ALTER TABLE `Capteur`
 ADD PRIMARY KEY (`Nom_capt`), ADD KEY `Nom_salle` (`Nom_salle`);

--
-- Index pour la table `Mesure`
--
ALTER TABLE `Mesure`
 ADD PRIMARY KEY (`ID_mes`), ADD KEY `Nom_capt` (`Nom_capt`);

--
-- Index pour la table `Salle`
--
ALTER TABLE `Salle`
 ADD PRIMARY KEY (`Nom_salle`), ADD KEY `ID_bat` (`ID_bat`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Mesure`
--
ALTER TABLE `Mesure`
MODIFY `ID_mes` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=379;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Capteur`
--
ALTER TABLE `Capteur`
ADD CONSTRAINT `fk_nom_salle` FOREIGN KEY (`Nom_salle`) REFERENCES `Salle` (`Nom_salle`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Mesure`
--
ALTER TABLE `Mesure`
ADD CONSTRAINT `fk_nom_capt` FOREIGN KEY (`Nom_capt`) REFERENCES `Capteur` (`Nom_capt`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Salle`
--
ALTER TABLE `Salle`
ADD CONSTRAINT `fk_ID_bat` FOREIGN KEY (`ID_bat`) REFERENCES `Batiment` (`ID_bat`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

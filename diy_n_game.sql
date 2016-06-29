-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 29 Juin 2016 à 21:36
-- Version du serveur :  10.1.9-MariaDB
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `diy_n_game`
--
CREATE DATABASE IF NOT EXISTS `diy_n_game` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `diy_n_game`;

-- --------------------------------------------------------

--
-- Structure de la table `aromes`
--

DROP TABLE IF EXISTS `aromes`;
CREATE TABLE `aromes` (
  `id` int(11) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `quality` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `aromes`
--

TRUNCATE TABLE `aromes`;
--
-- Contenu de la table `aromes`
--

INSERT INTO `aromes` (`id`, `marque`, `type`, `nom`, `quality`) VALUES
(1, 'Bickford Flavors', 'Boisson', 'Bourbon', 2),
(2, 'Bickford Flavors', 'Boisson', 'Champagne', 2),
(3, 'Bickford Flavors', 'Boisson', 'Cola', 2),
(4, 'Bickford Flavors', 'Boisson', 'Pina Colada', 2),
(5, 'Bickford Flavors', 'Boisson', 'Rhum', 2),
(6, 'Bickford Flavors', 'Fraicheur', 'Menthe Poivrée', 2),
(7, 'Bickford Flavors', 'Fruité', 'Abricot', 2),
(8, 'Bickford Flavors', 'Fruité', 'Ananas', 2),
(9, 'Bickford Flavors', 'Fruité', 'Banane', 2),
(10, 'Bickford Flavors', 'Fruité', 'Cassis', 2),
(11, 'Bickford Flavors', 'Fruité', 'Cerise', 2),
(12, 'Bickford Flavors', 'Fruité', 'Citron', 2),
(13, 'Bickford Flavors', 'Fruité', 'Fraise', 2),
(14, 'Bickford Flavors', 'Fruité', 'Fraise Banane', 2),
(15, 'Bickford Flavors', 'Fruité', 'Fraise Goyave', 2),
(16, 'Bickford Flavors', 'Fruité', 'Fraise Kiwi', 2),
(17, 'Bickford Flavors', 'Fruité', 'Framboise', 2),
(18, 'Bickford Flavors', 'Fruité', 'Fruit de la Passion', 2),
(19, 'Bickford Flavors', 'Fruité', 'Goyave', 2),
(20, 'Bickford Flavors', 'Fruité', 'Guimauve', 2),
(21, 'Bickford Flavors', 'Fruité', 'Kiwi', 2),
(22, 'Bickford Flavors', 'Fruité', 'Lime', 2),
(23, 'Bickford Flavors', 'Fruité', 'Mangue', 2),
(24, 'Bickford Flavors', 'Fruité', 'Melon', 2),
(25, 'Bickford Flavors', 'Fruité', 'Orange', 2),
(26, 'Bickford Flavors', 'Fruité', 'Papaye', 2),
(27, 'Bickford Flavors', 'Fruité', 'Pêche', 2),
(28, 'Bickford Flavors', 'Fruité', 'Poire', 2),
(29, 'Bickford Flavors', 'Fruité', 'Pomme', 2),
(30, 'Bickford Flavors', 'Fruité', 'Pomme Cerise', 2),
(31, 'Bickford Flavors', 'Fruité', 'Prune', 2),
(32, 'Bickford Flavors', 'Fruité', 'Raisin', 2),
(33, 'Bickford Flavors', 'Gourmand', 'Beurre', 2),
(34, 'Bickford Flavors', 'Gourmand', 'Café', 2),
(35, 'Bickford Flavors', 'Gourmand', 'Cannelle', 2),
(36, 'Bickford Flavors', 'Gourmand', 'Caramel', 2),
(37, 'Bickford Flavors', 'Gourmand', 'Cheesecake', 2),
(38, 'Bickford Flavors', 'Gourmand', 'Chocolat', 2),
(39, 'Bickford Flavors', 'Gourmand', 'Crème de Menthe', 2),
(40, 'Bickford Flavors', 'Gourmand', 'Lait de Poule', 2),
(41, 'Bickford Flavors', 'Gourmand', 'Noisette', 2),
(42, 'Bickford Flavors', 'Gourmand', 'Pistache', 2),
(43, 'Bickford Flavors', 'Gourmand', 'Pomme Cannelle', 2),
(44, 'Bickford Flavors', 'Gourmand', 'Pomme d''érable', 2),
(45, 'Bickford Flavors', 'Gourmand', 'Praline', 2),
(46, 'Bickford Flavors', 'Gourmand', 'Sirop d''érable', 2),
(47, 'Bickford Flavors', 'Gourmand', 'Vanille', 2),
(48, 'Cappela Flavor', 'Boisson', 'Cola', 3),
(49, 'Cappela Flavor', 'Fruité', 'Abricot', 3),
(50, 'Cappela Flavor', 'Fruité', 'Banane', 3),
(51, 'Cappela Flavor', 'Fruité', 'Citron Lime', 3),
(52, 'Cappela Flavor', 'Fruité', 'Figue', 3),
(53, 'Cappela Flavor', 'Fruité', 'Fraise', 3),
(54, 'Cappela Flavor', 'Fruité', 'Framboise', 3),
(55, 'Cappela Flavor', 'Fruité', 'Grenade', 3),
(56, 'Cappela Flavor', 'Fruité', 'Noix de coco', 3),
(57, 'Cappela Flavor', 'Fruité', 'Pasteque', 3),
(58, 'Cappela Flavor', 'Fruité', 'Pomme', 3),
(59, 'Cappela Flavor', 'Fruité', 'Raisin', 3),
(60, 'Cappela Flavor', 'Gourmand', 'Banana Split', 3),
(61, 'Cappela Flavor', 'Gourmand', 'Brownie', 3),
(62, 'Cappela Flavor', 'Gourmand', 'Bubblegum', 3),
(63, 'Cappela Flavor', 'Gourmand', 'Cappuccino', 3),
(64, 'Cappela Flavor', 'Gourmand', 'Caramel', 3),
(65, 'Cappela Flavor', 'Gourmand', 'Double Chocolat', 3),
(66, 'Cappela Flavor', 'Gourmand', 'Espresso', 3),
(67, 'Cappela Flavor', 'Gourmand', 'Gauffre', 3),
(68, 'Cappela Flavor', 'Gourmand', 'Marshmallow', 3),
(69, 'Cappela Flavor', 'Gourmand', 'Noisette ', 3),
(70, 'Cappela Flavor', 'Gourmand', 'Sirop d''érable', 3),
(71, 'Flavour Art', 'Additif', 'AAA Magic mask', 1),
(72, 'Flavour Art', 'Additif', 'Bitter Wizard ', 1),
(73, 'Flavour Art', 'Additif', 'MTS Vap Wizard', 1),
(74, 'Flavour Art', 'Boisson', 'Biere', 1),
(75, 'Flavour Art', 'Boisson', 'Champagne', 1),
(76, 'Flavour Art', 'Boisson', 'Cola', 1),
(77, 'Flavour Art', 'Boisson', 'Gin', 1),
(78, 'Flavour Art', 'Boisson', 'Jamaique Rhum', 1),
(79, 'Flavour Art', 'Boisson', 'R Bull', 1),
(80, 'Flavour Art', 'Boisson', 'Thé Noir', 1),
(81, 'Flavour Art', 'Boisson', 'Thé Vert', 1),
(82, 'Flavour Art', 'Boisson', 'Whisky', 1),
(83, 'Flavour Art', 'Divers', 'Hypnotic Myst', 1),
(84, 'Flavour Art', 'Floral', 'Lavande', 1),
(85, 'Flavour Art', 'Floral', 'Rose', 1),
(86, 'Flavour Art', 'Floral', 'Viollette', 1),
(87, 'Flavour Art', 'Floral', 'Zen Garden', 1),
(88, 'Flavour Art', 'Fraicheur', 'Anis', 1),
(89, 'Flavour Art', 'Fraicheur', 'Menthe', 1),
(90, 'Flavour Art', 'Fraicheur', 'Menthe Poivrée', 1),
(91, 'Flavour Art', 'Fraicheur', 'Menthol Artic', 1),
(92, 'Flavour Art', 'Fruité', 'Abricot', 1),
(93, 'Flavour Art', 'Fruité', 'Ananas', 1),
(94, 'Flavour Art', 'Fruité', 'Banane', 1),
(95, 'Flavour Art', 'Fruité', 'Bergamotte', 1),
(96, 'Flavour Art', 'Fruité', 'Cassis', 1),
(97, 'Flavour Art', 'Fruité', 'Cerise', 1),
(98, 'Flavour Art', 'Fruité', 'Cerise Noire', 1),
(99, 'Flavour Art', 'Fruité', 'Citron Mix', 1),
(100, 'Flavour Art', 'Fruité', 'Figue', 1),
(101, 'Flavour Art', 'Fruité', 'Fraise', 1),
(102, 'Flavour Art', 'Fruité', 'Framboise', 1),
(103, 'Flavour Art', 'Fruité', 'Fruit de la Passion', 1),
(104, 'Flavour Art', 'Fruité', 'Goyave', 1),
(105, 'Flavour Art', 'Fruité', 'Grenade', 1),
(106, 'Flavour Art', 'Fruité', 'Kiwi', 1),
(107, 'Flavour Art', 'Fruité', 'Lychee', 1),
(108, 'Flavour Art', 'Fruité', 'Mandarine', 1),
(109, 'Flavour Art', 'Fruité', 'Mangue', 1),
(110, 'Flavour Art', 'Fruité', 'Mélange de fruit rouge', 1),
(111, 'Flavour Art', 'Fruité', 'Melon', 1),
(112, 'Flavour Art', 'Fruité', 'Mure', 1),
(113, 'Flavour Art', 'Fruité', 'Myrtille', 1),
(114, 'Flavour Art', 'Fruité', 'Noix de coco', 1),
(115, 'Flavour Art', 'Fruité', 'Orange', 1),
(116, 'Flavour Art', 'Fruité', 'Papaye', 1),
(117, 'Flavour Art', 'Fruité', 'Pasteque', 1),
(118, 'Flavour Art', 'Fruité', 'Peche', 1),
(119, 'Flavour Art', 'Fruité', 'Poire', 1),
(120, 'Flavour Art', 'Fruité', 'Pomme', 1),
(121, 'Flavour Art', 'Fruité', 'Raisin', 1),
(122, 'Flavour Art', 'Gourmand', 'Cacao', 1),
(123, 'Flavour Art', 'Gourmand', 'Café Expresso', 1),
(124, 'Flavour Art', 'Gourmand', 'Cannelle', 1),
(125, 'Flavour Art', 'Gourmand', 'Cappuccino', 1),
(126, 'Flavour Art', 'Gourmand', 'Caramel', 1),
(127, 'Flavour Art', 'Gourmand', 'Chocolat', 1),
(128, 'Flavour Art', 'Gourmand', 'Cookie', 1),
(129, 'Flavour Art', 'Gourmand', 'Creme de Vienne', 1),
(130, 'Flavour Art', 'Gourmand', 'Creme Fouettée', 1),
(131, 'Flavour Art', 'Gourmand', 'Croissant', 1),
(132, 'Flavour Art', 'Gourmand', 'Miel', 1),
(133, 'Flavour Art', 'Gourmand', 'Noisette', 1),
(134, 'Flavour Art', 'Gourmand', 'Nougat', 1),
(135, 'Flavour Art', 'Gourmand', 'Panettone', 1),
(136, 'Flavour Art', 'Gourmand', 'Pistache', 1),
(137, 'Flavour Art', 'Gourmand', 'Réglisse ', 1),
(138, 'Flavour Art', 'Gourmand', 'Sirop d''érable', 1),
(139, 'Flavour Art', 'Gourmand', 'Tarte au Pomme', 1),
(140, 'Flavour Art', 'Gourmand', 'Tiramisu', 1),
(141, 'Flavour Art', 'Gourmand', 'Torrone', 1),
(142, 'Flavour Art', 'Gourmand', 'Tutti Frutti', 1),
(143, 'Flavour Art', 'Gourmand', 'Vanille', 1),
(144, 'Flavour Art', 'Tabac', '7 Leaves Ultimate', 1),
(145, 'Flavour Art', 'Tabac', 'Black Fire', 1),
(146, 'Flavour Art', 'Tabac', 'Burley', 1),
(147, 'Flavour Art', 'Tabac', 'Camtel Ultimate', 1),
(148, 'Flavour Art', 'Tabac', 'Cowboy', 1),
(149, 'Flavour Art', 'Tabac', 'Cuba Supreme', 1),
(150, 'Flavour Art', 'Tabac', 'Dark Vapure', 1),
(151, 'Flavour Art', 'Tabac', 'Desert Ship', 1),
(152, 'Flavour Art', 'Tabac', 'Latakia', 1),
(153, 'Flavour Art', 'Tabac', 'Maxx Blend', 1),
(154, 'Flavour Art', 'Tabac', 'Mellow Sunset', 1),
(155, 'Flavour Art', 'Tabac', 'Oba Oba', 1),
(156, 'Flavour Art', 'Tabac', 'Oryental 4', 1),
(157, 'Flavour Art', 'Tabac', 'Ozone', 1),
(158, 'Flavour Art', 'Tabac', 'Perique Black', 1),
(159, 'Flavour Art', 'Tabac', 'Reggae Night', 1),
(160, 'Flavour Art', 'Tabac', 'Royal', 1),
(161, 'Flavour Art', 'Tabac', 'Ry 4', 1),
(162, 'Flavour Art', 'Tabac', 'Shade', 1),
(163, 'Flavour Art', 'Tabac', 'Virginia', 1),
(164, 'Inawera', 'Additif', 'Bitter Wizard ', 1),
(165, 'Inawera', 'Boisson', 'Biere', 1),
(166, 'Inawera', 'Boisson', 'Brandy', 1),
(167, 'Inawera', 'Boisson', 'Café', 1),
(168, 'Inawera', 'Boisson', 'Cappuccino', 1),
(169, 'Inawera', 'Boisson', 'Cerise Liqueur', 1),
(170, 'Inawera', 'Boisson', 'Champagne', 1),
(171, 'Inawera', 'Boisson', 'Cola', 1),
(172, 'Inawera', 'Boisson', 'Jamaique Rhum', 1),
(173, 'Inawera', 'Boisson', 'Pinacolada', 1),
(174, 'Inawera', 'Boisson', 'Plum Vodka', 1),
(175, 'Inawera', 'Boisson', 'Rhum', 1),
(176, 'Inawera', 'Boisson', 'Thé Noir', 1),
(177, 'Inawera', 'Boisson', 'Thé Vert', 1),
(178, 'Inawera', 'Boisson', 'Whisky', 1),
(179, 'Inawera', 'Floral', 'Rose', 1),
(180, 'Inawera', 'Floral', 'Ylang Ylang', 1),
(181, 'Inawera', 'Fraicheur', 'Anis', 1),
(182, 'Inawera', 'Fraicheur', 'Cool Mint', 1),
(183, 'Inawera', 'Fraicheur', 'Eucalyptus Mint', 1),
(184, 'Inawera', 'Fraicheur', 'Menthe', 1),
(185, 'Inawera', 'Fraicheur', 'Menthe', 1),
(186, 'Inawera', 'Fraicheur', 'Mix Mint', 1),
(187, 'Inawera', 'Fruité', 'Abricot', 1),
(188, 'Inawera', 'Fruité', 'Ananas', 1),
(189, 'Inawera', 'Fruité', 'Banane', 1),
(190, 'Inawera', 'Fruité', 'Cerise', 1),
(191, 'Inawera', 'Fruité', 'Citron', 1),
(192, 'Inawera', 'Fruité', 'Exotic Roots', 1),
(193, 'Inawera', 'Fruité', 'Fraise', 1),
(194, 'Inawera', 'Fruité', 'Fraise Sauvage', 1),
(195, 'Inawera', 'Fruité', 'Framboise', 1),
(196, 'Inawera', 'Fruité', 'Melon', 1),
(197, 'Inawera', 'Fruité', 'Noix de coco', 1),
(198, 'Inawera', 'Fruité', 'Orange', 1),
(199, 'Inawera', 'Fruité', 'Peche', 1),
(200, 'Inawera', 'Fruité', 'Poire', 1),
(201, 'Inawera', 'Fruité', 'Pomme', 1),
(202, 'Inawera', 'Fruité', 'Raisin', 1),
(203, 'Inawera', 'Gourmand', 'Cacahuète', 1),
(204, 'Inawera', 'Gourmand', 'Chocolat', 1),
(205, 'Inawera', 'Gourmand', 'Chocolat au Lait', 1),
(206, 'Inawera', 'Gourmand', 'Miel', 1),
(207, 'Inawera', 'Gourmand', 'Noisette', 1),
(208, 'Inawera', 'Gourmand', 'Nougat', 1),
(209, 'Inawera', 'Gourmand', 'Prune', 1),
(210, 'Inawera', 'Gourmand', 'Pruneaux', 1),
(211, 'Inawera', 'Gourmand', 'Sesame', 1),
(212, 'Inawera', 'Gourmand', 'Tiramisu', 1),
(213, 'Inawera', 'Gourmand', 'Vanille', 1),
(214, 'Inawera', 'Gourmand', 'Vanille Bourbon', 1),
(215, 'Inawera', 'Tabac', '7 Leaves Ultimate', 1),
(216, 'Inawera', 'Tabac', 'Burley It', 1),
(217, 'Inawera', 'Tabac', 'Cowboy Blend', 1),
(218, 'Inawera', 'Tabac', 'Cuba Supreme', 1),
(219, 'Inawera', 'Tabac', 'Dark Vapure', 1),
(220, 'Inawera', 'Tabac', 'Desert Voyager', 1),
(221, 'Inawera', 'Tabac', 'Falcon Eye', 1),
(222, 'Inawera', 'Tabac', 'Gipsy King', 1),
(223, 'Inawera', 'Tabac', 'Kent', 1),
(224, 'Inawera', 'Tabac', 'Latakia', 1),
(225, 'Inawera', 'Tabac', 'Mellow Sunset', 1),
(226, 'Inawera', 'Tabac', 'Old Havana', 1),
(227, 'Inawera', 'Tabac', 'Perique Black', 1),
(228, 'Inawera', 'Tabac', 'Space Drop ', 1),
(229, 'Inawera', 'Tabac', 'Symphony', 1),
(230, 'Inawera', 'Tabac', 'Turkish', 1),
(231, 'Inawera', 'Tabac', 'Tuscan Garden', 1),
(232, 'Inawera', 'Tabac', 'Western Blend', 1),
(233, 'The Perfumer''s Apprentice', 'Additif', 'Koolada', 3),
(234, 'The Perfumer''s Apprentice', 'Additif', 'Sweetener', 3),
(235, 'The Perfumer''s Apprentice', 'Boisson', 'Absinthe', 3),
(236, 'The Perfumer''s Apprentice', 'Boisson', 'Biere', 3),
(237, 'The Perfumer''s Apprentice', 'Boisson', 'Champagne', 3),
(238, 'The Perfumer''s Apprentice', 'Boisson', 'Cola', 3),
(239, 'The Perfumer''s Apprentice', 'Boisson', 'HPNO', 3),
(240, 'The Perfumer''s Apprentice', 'Boisson', 'Thé Earl Grey', 3),
(241, 'The Perfumer''s Apprentice', 'Divers', 'Marie Jeanne', 3),
(242, 'The Perfumer''s Apprentice', 'Fruité', 'Ananas', 3),
(243, 'The Perfumer''s Apprentice', 'Fruité', 'Banane Mure', 3),
(244, 'The Perfumer''s Apprentice', 'Fruité', 'Cerise', 3),
(245, 'The Perfumer''s Apprentice', 'Fruité', 'Cerise Noire', 3),
(246, 'The Perfumer''s Apprentice', 'Fruité', 'Citron', 3),
(247, 'The Perfumer''s Apprentice', 'Fruité', 'Dragon Rouge', 3),
(248, 'The Perfumer''s Apprentice', 'Fruité', 'Fraise', 3),
(249, 'The Perfumer''s Apprentice', 'Fruité', 'Framboise', 3),
(250, 'The Perfumer''s Apprentice', 'Fruité', 'Grenade', 3),
(251, 'The Perfumer''s Apprentice', 'Fruité', 'Kiwi', 3),
(252, 'The Perfumer''s Apprentice', 'Fruité', 'Lime', 3),
(253, 'The Perfumer''s Apprentice', 'Fruité', 'Mangue', 3),
(254, 'The Perfumer''s Apprentice', 'Fruité', 'Melon Cantaloupe', 3),
(255, 'The Perfumer''s Apprentice', 'Fruité', 'Noix de coco', 3),
(256, 'The Perfumer''s Apprentice', 'Fruité', 'Peche', 3),
(257, 'The Perfumer''s Apprentice', 'Fruité', 'Poire', 3),
(258, 'The Perfumer''s Apprentice', 'Fruité', 'Pomme', 3),
(259, 'The Perfumer''s Apprentice', 'Fruité', 'Pomme Grany Smith', 3),
(260, 'The Perfumer''s Apprentice', 'Fruité', 'Prune', 3),
(261, 'The Perfumer''s Apprentice', 'Fruité', 'Tutti Frutti', 3),
(262, 'The Perfumer''s Apprentice', 'Gourmand', 'Amande', 3),
(263, 'The Perfumer''s Apprentice', 'Gourmand', 'Amande Amaretto', 3),
(264, 'The Perfumer''s Apprentice', 'Gourmand', 'Barbe à Papa', 3),
(265, 'The Perfumer''s Apprentice', 'Gourmand', 'Beurre d''arachide', 3),
(266, 'The Perfumer''s Apprentice', 'Gourmand', 'Bonbon à la Pomme', 3),
(267, 'The Perfumer''s Apprentice', 'Gourmand', 'Bonbon au Caramel', 3),
(268, 'The Perfumer''s Apprentice', 'Gourmand', 'Bubblegum', 3),
(269, 'The Perfumer''s Apprentice', 'Gourmand', 'Cannelle Rouge', 3),
(270, 'The Perfumer''s Apprentice', 'Gourmand', 'Caramel', 3),
(271, 'The Perfumer''s Apprentice', 'Gourmand', 'Cheesecake', 3),
(272, 'The Perfumer''s Apprentice', 'Gourmand', 'Chocolat', 3),
(273, 'The Perfumer''s Apprentice', 'Gourmand', 'Chocolat au Lait', 3),
(274, 'The Perfumer''s Apprentice', 'Gourmand', 'Double Chocolat', 3),
(275, 'The Perfumer''s Apprentice', 'Gourmand', 'English Toffe', 3),
(276, 'The Perfumer''s Apprentice', 'Gourmand', 'Gauffre', 3),
(277, 'The Perfumer''s Apprentice', 'Gourmand', 'Graham Cracker', 3),
(278, 'The Perfumer''s Apprentice', 'Gourmand', 'Pain d''épice', 3),
(279, 'The Perfumer''s Apprentice', 'Gourmand', 'Sucre Roux ', 3),
(280, 'The Perfumer''s Apprentice', 'Gourmand', 'Sweet Cream ', 3),
(281, 'The Perfumer''s Apprentice', 'Gourmand', 'Vanille Bourbon', 3),
(282, 'The Perfumer''s Apprentice', 'Tabac', 'Ml Boro Premium', 3),
(283, 'The Perfumer''s Apprentice', 'Tabac', 'Ry 4', 3),
(284, 'The Perfumer''s Apprentice', 'Tabac', 'Ry 4 Double', 3),
(285, 'The Perfumer''s Apprentice', 'Tabac', 'Tabac Absolu', 3),
(286, 'The Perfumer''s Apprentice', '', 'Bittersweet ', 3),
(287, 'Cappela Flavor', 'Gourmand', 'Amaretto', 3),
(288, 'Cappela Flavor', 'Boisson', 'Anise', 3),
(289, 'Cappela Flavor', 'Fruité', 'Barbe à papa', 3),
(290, 'Cappela Flavor', 'Fruité', 'Melon', 3),
(291, 'Cappela Flavor', 'Boisson', 'Thé chai', 3),
(292, 'Cappela Flavor', 'Boisson', 'Coca cherry', 3),
(293, 'Cappela Flavor', 'Gourmand', 'Coco Choco amande', 3),
(294, 'Cappela Flavor', 'Gourmand', 'Gateau chocolat', 3),
(295, 'Cappela Flavor', 'Gourmand', 'Downut chocolat', 3),
(296, 'Cappela Flavor', 'Fruité', 'Framboise chocolat', 3),
(297, 'Cappela Flavor', 'Fruité', 'Menthol légere', 3),
(298, 'Cappela Flavor', 'Fruité', 'Cranberry', 3),
(299, 'Cappela Flavor', 'Gourmand', 'Yaourt crème', 3),
(300, 'Cappela Flavor', 'Fruité', 'Concombre', 3),
(301, 'Cappela Flavor', 'Boisson', 'Tasse de café', 3),
(302, 'Cappela Flavor', 'Fruité', 'Fruit du dragon', 3),
(303, 'Cappela Flavor', 'Fruité', 'Double pomme', 3),
(304, 'Cappela Flavor', 'Boisson', 'Energy drink', 3),
(305, 'Cappela Flavor', 'Gourmand', 'Vanilla french', 3),
(306, 'Cappela Flavor', 'Gourmand', 'Gingerbread', 3),
(307, 'Cappela Flavor', 'Gourmand', 'Donuts', 3),
(308, 'Cappela Flavor', 'Gourmand', 'Crackers', 3),
(309, 'Cappela Flavor', 'Fruité', 'Anana', 3),
(310, 'Cappela Flavor', 'Fruité', 'Pamplemousse', 3),
(311, 'Cappela Flavor', 'Boisson', 'Grenadine', 3),
(312, 'Cappela Flavor', 'Fruité', 'Fruit rouge', 3),
(313, 'Cappela Flavor', 'Boisson', 'Irish cream', 3),
(314, 'Cappela Flavor', 'Fruité', 'Fraise kiwi', 3),
(315, 'Cappela Flavor', 'Fruité', 'Jelly candy', 3),
(316, 'Cappela Flavor', 'Gourmand', 'Amande grillée', 3),
(317, 'Cappela Flavor', 'Gourmand', 'Beurre de cacahuette', 3),
(318, 'Cappela Flavor', 'Gourmand', 'Cookie sucré', 3),
(319, 'Cappela Flavor', 'Gourmand', 'Crème de beurre', 3),
(320, 'Cappela Flavor', 'Gourmand', 'Crème gateau chocolat', 3),
(321, 'Cappela Flavor', 'Fruité', 'Crème pêche', 3),
(322, 'Cappela Flavor', 'Gourmand', 'Crème pralinée', 3),
(323, 'Cappela Flavor', 'Gourmand', 'Crème vanille fouetée', 3),
(324, 'Cappela Flavor', 'Gourmand', 'Cupcake vanille', 3),
(325, 'Cappela Flavor', 'Fruité', 'Fruit de la passion', 3),
(326, 'Cappela Flavor', 'Boisson', 'Jus d''orange', 3),
(327, 'Cappela Flavor', 'Boisson', 'Jus de pêche', 3),
(328, 'Cappela Flavor', 'Fruité', 'Lychee', 3),
(329, 'Cappela Flavor', 'Fruité', 'Mandarine', 3),
(330, 'Cappela Flavor', 'Fruité', 'Mangue', 3),
(331, 'Cappela Flavor', 'Gourmand', 'Meringue au citron', 3),
(332, 'Cappela Flavor', 'Boisson', 'Pina colada', 3),
(333, 'Cappela Flavor', 'Fruité', 'Poire', 3),
(334, 'Cappela Flavor', 'Gourmand', 'Pop Corn', 3),
(335, 'Cappela Flavor', 'Gourmand', 'Vanille custard', 3),
(336, 'T-juice', '', 'Red astaire', 2),
(337, 'T-juice', '', 'Black n blue', 2),
(338, 'T-juice', '', 'Clara T', 2),
(339, 'T-juice', '', 'Jon freeze', 2),
(340, 'T-juice', '', 'Jacques le Mon', 2),
(341, 'T-juice', '', 'Gold n brown', 2),
(342, 'T-juice', '', 'Colonel custard', 2),
(343, 'T-juice', '', 'Jack the ripple', 2),
(344, 'T-juice', '', 'Vamp vape', 2),
(345, 'T-juice', '', 'Forest affair', 2),
(346, 'T-juice', '', 'Strawberri', 2),
(347, 'T-juice', '', 'Green steam', 2),
(348, 'T-juice', '', 'High voltage', 2),
(349, 'T-juice', '', 'Tangerine dream', 2),
(350, 'T-juice', '', 'Minty the toff', 2),
(351, 'T-juice', '', 'Afro dizziac', 2),
(352, 'T-juice', '', 'TY 4', 2),
(353, 'T-juice', '', 'Bubble gun', 2),
(354, 'T-juice', '', 'Quintessence', 2),
(355, 'T-juice', '', 'Primo verde', 2),
(356, 'T-juice', '', 'Mentice', 2),
(357, 'T-juice', '', 'Pomme pom', 2),
(358, 'T-juice', '', 'Cubana', 2),
(359, 'T-juice', '', 'Melipona', 2),
(360, 'T-juice', '', 'Java juice', 2),
(361, 'T-juice', '', 'Cherry choc', 2),
(362, 'T-juice', '', 'Mintastic', 2),
(363, 'T-juice', '', 'UK smokes', 2),
(364, 'T-juice', '', 'Virgin leaf', 2),
(365, 'T-juice', '', 'USA reds', 2),
(366, 'T-juice', '', 'Ice queen', 2),
(367, 'T-juice', '', 'Hermano rubio', 2),
(368, 'T-juice', '', 'Cubanito', 2),
(369, 'T-juice', '', 'USA silver', 2),
(370, 'T-juice', '', 'Eastern blend', 2);

-- --------------------------------------------------------

--
-- Structure de la table `bases`
--

DROP TABLE IF EXISTS `bases`;
CREATE TABLE `bases` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bases_2080` decimal(10,0) NOT NULL,
  `bases_5050` decimal(10,0) NOT NULL,
  `bases_8020` decimal(10,0) NOT NULL,
  `bases_1000` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `bases`
--

TRUNCATE TABLE `bases`;
--
-- Contenu de la table `bases`
--

INSERT INTO `bases` (`id`, `id_user`, `bases_2080`, `bases_5050`, `bases_8020`, `bases_1000`) VALUES
(1, 6, '1479', '1010', '1000', '1010'),
(2, 11, '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Structure de la table `construction_en_cours`
--

DROP TABLE IF EXISTS `construction_en_cours`;
CREATE TABLE `construction_en_cours` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name_batiment` varchar(20) NOT NULL,
  `time_finish` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `construction_en_cours`
--

TRUNCATE TABLE `construction_en_cours`;
-- --------------------------------------------------------

--
-- Structure de la table `culture_vg`
--

DROP TABLE IF EXISTS `culture_vg`;
CREATE TABLE `culture_vg` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `production` int(11) NOT NULL,
  `prix` bigint(11) NOT NULL,
  `time_construct` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `culture_vg`
--

TRUNCATE TABLE `culture_vg`;
--
-- Contenu de la table `culture_vg`
--

INSERT INTO `culture_vg` (`id`, `level`, `production`, `prix`, `time_construct`) VALUES
(1, 0, 5, 20, 15),
(2, 1, 19, 68, 75),
(3, 2, 56, 267, 300),
(4, 3, 113, 602, 675),
(5, 4, 190, 1069, 1200),
(6, 5, 289, 1671, 1875),
(7, 6, 409, 2406, 2700),
(8, 7, 553, 3275, 3675),
(9, 8, 719, 4277, 4800),
(10, 9, 911, 5414, 6075),
(11, 10, 1127, 6683, 7500),
(12, 11, 1369, 8087, 9075),
(13, 12, 1638, 9623, 10800),
(14, 13, 1935, 11294, 12675),
(15, 14, 2260, 13098, 14700),
(16, 15, 2614, 15036, 16875),
(17, 16, 2999, 17107, 19200),
(18, 17, 3414, 19313, 21675),
(19, 18, 3862, 21651, 24300),
(20, 19, 4342, 24125, 27075),
(21, 20, 4856, 26730, 30000),
(22, 21, 5404, 29471, 33075),
(23, 22, 5988, 32343, 36300),
(24, 23, 6609, 35351, 39675),
(25, 24, 7267, 38491, 43200),
(26, 25, 7963, 41766, 46875),
(27, 26, 8699, 45174, 50700),
(28, 27, 9474, 48716, 54675),
(29, 28, 10291, 52391, 58800),
(30, 29, 11151, 56201, 63075),
(31, 30, 12053, 60143, 67500),
(32, 31, 13000, 64220, 72075),
(33, 32, 13992, 68429, 76800),
(34, 33, 15030, 72773, 81675),
(35, 34, 16116, 77250, 86700),
(36, 35, 17250, 81861, 91875),
(37, 36, 18433, 86605, 97200),
(38, 37, 19667, 91484, 102675),
(39, 38, 20952, 96495, 108300),
(40, 39, 22290, 101642, 114075),
(41, 40, 23682, 106920, 120000),
(42, 41, 25129, 112334, 126075),
(43, 42, 26631, 117879, 132300),
(44, 43, 28191, 123560, 138675),
(45, 44, 29808, 129373, 145200),
(46, 45, 31485, 135321, 151875),
(47, 46, 33223, 141402, 158700),
(48, 47, 35022, 147617, 165675),
(49, 48, 36884, 153965, 172800),
(50, 49, 38809, 160448, 180075),
(51, 50, 40801, 167063, 187500),
(52, 51, 42858, 173813, 195075),
(53, 52, 44983, 180695, 202800),
(54, 53, 47177, 187712, 210675),
(55, 54, 49440, 194862, 218700),
(56, 55, 51775, 202146, 226875),
(57, 56, 54183, 209563, 235200),
(58, 57, 56664, 217115, 243675),
(59, 58, 59220, 224799, 252300),
(60, 59, 61853, 232619, 261075),
(61, 60, 64563, 240570, 270000),
(62, 61, 67352, 248657, 279075),
(63, 62, 70221, 256875, 288300),
(64, 63, 73172, 265229, 297675),
(65, 64, 76205, 273715, 307200),
(66, 65, 79323, 282336, 316875),
(67, 66, 82526, 291090, 326700),
(68, 67, 85815, 299978, 336675),
(69, 68, 89194, 308999, 346800),
(70, 69, 92661, 318155, 357075),
(71, 70, 96220, 327443, 367500);

-- --------------------------------------------------------

--
-- Structure de la table `labos_bases`
--

DROP TABLE IF EXISTS `labos_bases`;
CREATE TABLE `labos_bases` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `pourcent_down` float NOT NULL,
  `prix` int(11) NOT NULL,
  `time_construct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `labos_bases`
--

TRUNCATE TABLE `labos_bases`;
--
-- Contenu de la table `labos_bases`
--

INSERT INTO `labos_bases` (`id`, `level`, `pourcent_down`, `prix`, `time_construct`) VALUES
(1, 0, 3, 227, 0),
(2, 1, 4.2, 634, 84),
(3, 2, 5.4, 1223, 336),
(4, 3, 6.6, 1993, 756),
(5, 4, 7.8, 2945, 1344),
(6, 5, 9, 4077, 2100),
(7, 6, 10.2, 5391, 3024),
(8, 7, 11.4, 6886, 4116),
(9, 8, 12.6, 8562, 5376),
(10, 9, 13.8, 10419, 6804),
(11, 10, 15, 12458, 8400),
(12, 11, 16.2, 14677, 10164),
(13, 12, 17.4, 17078, 12096),
(14, 13, 18.6, 19660, 14196),
(15, 14, 19.8, 22424, 16464),
(16, 15, 21, 25368, 18900),
(17, 16, 22.2, 28494, 21504),
(18, 17, 23.4, 31801, 24276),
(19, 18, 24.6, 35289, 27216),
(20, 19, 25.8, 38958, 30324),
(21, 20, 27, 42809, 33600),
(22, 21, 28.2, 46840, 37044),
(23, 22, 29.4, 51053, 40656),
(24, 23, 30.6, 55447, 44436),
(25, 24, 31.8, 60023, 48384),
(26, 25, 33, 64779, 52500),
(27, 26, 34.2, 69717, 56784),
(28, 27, 35.4, 74836, 61236),
(29, 28, 36.6, 80136, 65856),
(30, 29, 37.8, 85617, 70644),
(31, 30, 39, 91280, 75600),
(32, 31, 40.2, 97123, 80724),
(33, 32, 41.4, 103148, 86016),
(34, 33, 42.6, 109354, 91476),
(35, 34, 43.8, 115742, 97104),
(36, 35, 45, 122310, 102900),
(37, 36, 46.2, 129060, 108864),
(38, 37, 47.4, 135991, 114996),
(39, 38, 48.6, 143103, 121296),
(40, 39, 49.8, 150396, 127764),
(41, 40, 51, 157871, 134400),
(42, 41, 52.2, 165526, 141204),
(43, 42, 53.4, 173363, 148176),
(44, 43, 54.6, 181381, 155316),
(45, 44, 55.8, 189581, 162624),
(46, 45, 57, 197961, 170100),
(47, 46, 58.2, 206523, 177744),
(48, 47, 59.4, 215266, 185556),
(49, 48, 60.6, 224190, 193536),
(50, 49, 61.8, 233295, 201684),
(51, 50, 63, 242582, 210000),
(52, 51, 64.2, 252049, 218484),
(53, 52, 65.4, 261698, 227136),
(54, 53, 66.6, 271528, 235956),
(55, 54, 67.8, 281540, 244944),
(56, 55, 69, 291732, 254100),
(57, 56, 70.2, 302106, 263424),
(58, 57, 71.4, 312661, 272916),
(59, 58, 72.6, 323397, 282576),
(60, 59, 73.8, 334314, 292404),
(61, 60, 75, 345413, 302400),
(62, 61, 76.2, 356692, 312564),
(63, 62, 77.4, 368153, 322896),
(64, 63, 78.6, 379795, 333396),
(65, 64, 79.8, 391619, 344064),
(66, 65, 81, 403623, 354900),
(67, 66, 82.2, 415809, 365904),
(68, 67, 83.4, 428176, 377076),
(69, 68, 84.6, 440724, 388416),
(70, 69, 85.8, 453453, 399924),
(71, 70, 99.99, 1000000, 432000);

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_connect` varchar(50) NOT NULL,
  `avertissement` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `level_culture_vg` int(11) NOT NULL,
  `level_usine_pg` int(11) NOT NULL,
  `level_labos_bases` int(11) NOT NULL,
  `last_culture_vg` double NOT NULL,
  `last_usine_pg` double NOT NULL,
  `argent` bigint(20) NOT NULL,
  `litter_vg` int(11) NOT NULL,
  `litter_pg` int(11) NOT NULL,
  `list_arome_not_have` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `login`
--

TRUNCATE TABLE `login`;
--
-- Contenu de la table `login`
--

INSERT INTO `login` (`id`, `login`, `password`, `last_connect`, `avertissement`, `level`, `level_culture_vg`, `level_usine_pg`, `level_labos_bases`, `last_culture_vg`, `last_usine_pg`, `argent`, `litter_vg`, `litter_pg`, `list_arome_not_have`) VALUES
(6, 'evengyl', '$2y$10$esysZfksJpjyNODPTAXCkeCuhFaVUcDYimSyAWrC.HdB.4iYoy6ky', '1467227620', 7, 0, 9, 7, 9, 10926.152, 11258.61, 798007, 88, 0, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,187,188,189,190,191,192,193,194,195,196,197,198,199,200,201,202,203,204,205,206,207,208,209,210,211,212,213,214,215,216,217,218,219,220,221,222,223,224,225,226,227,228,229,230,231,232,233,234,235,236,237,238,239,240,241,242,243,244,245,246,247,248,250,251,252,253,254,255,256,257,258,259,260,261,262,263,264,265,266,267,268,269,270,271,272,273,274,275,276,277,278,279,280,281,282,283,284,285,286,287,288,289,290,291,292,293,294,295,296,297,298,299,300,301,302,303,304,305,306,307,308,309,310,311,312,313,314,315,316,317,318,319,320,321,322,323,324,325,326,327,328,329,330,331,332,333,334,335,336,337,338,339,340,341,342,343,344,345,346,347,348,349,350,351,352,353,354,355,356,357,358,359,360,361,362,363,364,365,366,367,368,369,370,'),
(11, 'lbaudoux', '$2y$10$jjJFYrMF.io1poEG5Z.SfOCrnQbDp9sKG72d5Xwh3rENlZ4r9Odse', '1467202373', 0, 0, 0, 0, 0, 1001.484, 1001.484, 1500, 10, 10, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,187,188,189,190,191,192,193,194,195,196,197,198,199,200,201,202,203,204,205,206,207,208,209,210,211,212,213,214,215,216,217,218,219,220,221,222,223,224,225,226,227,228,229,230,231,232,233,234,235,236,237,238,239,240,241,242,243,244,245,246,247,248,249,250,251,252,253,254,255,256,257,258,259,260,261,262,263,264,265,266,267,268,269,270,271,272,273,274,275,276,277,278,279,280,281,282,283,284,285,286,287,288,289,290,291,292,293,294,295,296,297,298,299,300,301,302,303,304,305,306,307,308,309,310,311,312,313,314,315,316,317,318,319,320,321,322,323,324,325,326,327,328,329,330,331,332,333,334,335,336,337,338,339,340,341,342,343,344,345,346,347,348,349,350,351,352,353,354,355,356,357,358,359,360,361,362,363,364,365,366,367,368,369,370,');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `titre` text NOT NULL,
  `text` varchar(255) NOT NULL,
  `date_now` varchar(50) NOT NULL,
  `visible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `news`
--

TRUNCATE TABLE `news`;
--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `titre`, `text`, `date_now`, `visible`) VALUES
(1, 'test', '', '', 0),
(2, 'test', '', '', 0),
(3, 'test', '', '', 0),
(4, 'test', '', '', 0),
(5, 'test', '', '', 0),
(6, 'test', '', '', 0),
(7, 'test', '', '', 0),
(8, 'test', '', '', 0),
(9, 'test', '', '', 0),
(10, 'test', '', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `raccord`
--

DROP TABLE IF EXISTS `raccord`;
CREATE TABLE `raccord` (
  `id` int(11) NOT NULL,
  `id_batiment` int(11) NOT NULL,
  `table_batiment` varchar(255) NOT NULL,
  `name_controller` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `raccord`
--

TRUNCATE TABLE `raccord`;
--
-- Contenu de la table `raccord`
--

INSERT INTO `raccord` (`id`, `id_batiment`, `table_batiment`, `name_controller`) VALUES
(1, 1, 'culture_vg', 'champ_glycerine'),
(2, 2, 'usine_pg', 'usine_propylene'),
(3, 3, 'labos_bases', 'labos_bases');

-- --------------------------------------------------------

--
-- Structure de la table `search_arome`
--

DROP TABLE IF EXISTS `search_arome`;
CREATE TABLE `search_arome` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `price_value_search` bigint(20) NOT NULL,
  `pourcent_win` int(4) NOT NULL,
  `time_finish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `search_arome`
--

TRUNCATE TABLE `search_arome`;
--
-- Contenu de la table `search_arome`
--

INSERT INTO `search_arome` (`id`, `id_user`, `price_value_search`, `pourcent_win`, `time_finish`) VALUES
(33, 6, 30000, 100, 1467317856),
(34, 6, 5000, 50, 1467227881),
(44, 6, 5000, 50, 1467227902);

-- --------------------------------------------------------

--
-- Structure de la table `usine_pg`
--

DROP TABLE IF EXISTS `usine_pg`;
CREATE TABLE `usine_pg` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `production` int(11) NOT NULL,
  `prix` bigint(20) NOT NULL,
  `time_construct` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `usine_pg`
--

TRUNCATE TABLE `usine_pg`;
--
-- Contenu de la table `usine_pg`
--

INSERT INTO `usine_pg` (`id`, `level`, `production`, `prix`, `time_construct`) VALUES
(1, 0, 4, 40, 15),
(2, 1, 13, 83, 75),
(3, 2, 39, 330, 300),
(4, 3, 79, 743, 675),
(5, 4, 134, 1320, 1200),
(6, 5, 203, 2063, 1875),
(7, 6, 289, 2970, 2700),
(8, 7, 391, 4043, 3675),
(9, 8, 510, 5280, 4800),
(10, 9, 647, 6683, 6075),
(11, 10, 802, 8250, 7500),
(12, 11, 977, 9983, 9075),
(13, 12, 1172, 11880, 10800),
(14, 13, 1387, 13943, 12675),
(15, 14, 1623, 16170, 14700),
(16, 15, 1882, 18563, 16875),
(17, 16, 2164, 21120, 19200),
(18, 17, 2469, 23843, 21675),
(19, 18, 2798, 26730, 24300),
(20, 19, 3152, 29783, 27075),
(21, 20, 3533, 33000, 30000),
(22, 21, 3940, 36383, 33075),
(23, 22, 4374, 39930, 36300),
(24, 23, 4837, 43643, 39675),
(25, 24, 5329, 47520, 43200),
(26, 25, 5851, 51563, 46875),
(27, 26, 6403, 55770, 50700),
(28, 27, 6987, 60143, 54675),
(29, 28, 7604, 64680, 58800),
(30, 29, 8254, 69383, 63075),
(31, 30, 8938, 74250, 67500),
(32, 31, 9657, 79283, 72075),
(33, 32, 10412, 84480, 76800),
(34, 33, 11204, 89843, 81675),
(35, 34, 12034, 95370, 86700),
(36, 35, 12903, 101063, 91875),
(37, 36, 13811, 106920, 97200),
(38, 37, 14760, 112943, 102675),
(39, 38, 15751, 119130, 108300),
(40, 39, 16784, 125483, 114075),
(41, 40, 17860, 132000, 120000),
(42, 41, 18981, 138683, 126075),
(43, 42, 20148, 145530, 132300),
(44, 43, 21360, 152543, 138675),
(45, 44, 22621, 159720, 145200),
(46, 45, 23930, 167063, 151875),
(47, 46, 25288, 174570, 158700),
(48, 47, 26697, 182243, 165675),
(49, 48, 28158, 190080, 172800),
(50, 49, 29671, 198083, 180075),
(51, 50, 31238, 206250, 187500),
(52, 51, 32860, 214583, 195075),
(53, 52, 34538, 223080, 202800),
(54, 53, 36272, 231743, 210675),
(55, 54, 38065, 240570, 218700),
(56, 55, 39917, 249563, 226875),
(57, 56, 41830, 258720, 235200),
(58, 57, 43804, 268043, 243675),
(59, 58, 45840, 277530, 252300),
(60, 59, 47941, 287183, 261075),
(61, 60, 50106, 297000, 270000),
(62, 61, 52337, 306983, 279075),
(63, 62, 54636, 317130, 288300),
(64, 63, 57003, 327443, 297675),
(65, 64, 59440, 337920, 307200),
(66, 65, 61948, 348563, 316875),
(67, 66, 64528, 359370, 326700),
(68, 67, 67181, 370343, 336675),
(69, 68, 69909, 381480, 346800),
(70, 69, 72713, 392783, 357075),
(71, 70, 75594, 404250, 367500);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `aromes`
--
ALTER TABLE `aromes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bases`
--
ALTER TABLE `bases`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `construction_en_cours`
--
ALTER TABLE `construction_en_cours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `culture_vg`
--
ALTER TABLE `culture_vg`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `labos_bases`
--
ALTER TABLE `labos_bases`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `raccord`
--
ALTER TABLE `raccord`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `search_arome`
--
ALTER TABLE `search_arome`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `usine_pg`
--
ALTER TABLE `usine_pg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `aromes`
--
ALTER TABLE `aromes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=371;
--
-- AUTO_INCREMENT pour la table `bases`
--
ALTER TABLE `bases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `construction_en_cours`
--
ALTER TABLE `construction_en_cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `culture_vg`
--
ALTER TABLE `culture_vg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT pour la table `labos_bases`
--
ALTER TABLE `labos_bases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `raccord`
--
ALTER TABLE `raccord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `search_arome`
--
ALTER TABLE `search_arome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT pour la table `usine_pg`
--
ALTER TABLE `usine_pg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

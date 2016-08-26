-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 26 Août 2016 à 14:45
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.21

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
-- Structure de la table `amelioration_var_config`
--

DROP TABLE IF EXISTS `amelioration_var_config`;
CREATE TABLE `amelioration_var_config` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `price_search_1` int(11) NOT NULL,
  `price_search_2` int(11) NOT NULL,
  `price_search_3` int(11) NOT NULL,
  `chance_to_win_1` int(11) NOT NULL,
  `chance_to_win_2` int(11) NOT NULL,
  `chance_to_win_3` int(11) NOT NULL,
  `time_search_for_one_k_argent_depenser` int(11) NOT NULL,
  `prix_vingt_quatre_vingt` int(11) NOT NULL,
  `prix_cinquante_cinquante` int(11) NOT NULL,
  `prix_quatre_vingt_vingt` int(11) NOT NULL,
  `prix_cent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `amelioration_var_config`
--

TRUNCATE TABLE `amelioration_var_config`;
--
-- Contenu de la table `amelioration_var_config`
--

INSERT INTO `amelioration_var_config` (`id`, `id_user`, `price_search_1`, `price_search_2`, `price_search_3`, `chance_to_win_1`, `chance_to_win_2`, `chance_to_win_3`, `time_search_for_one_k_argent_depenser`, `prix_vingt_quatre_vingt`, `prix_cinquante_cinquante`, `prix_quatre_vingt_vingt`, `prix_cent`) VALUES
(1, 6, 2, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0);

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
(1, 6, '1516', '1010', '1000', '1010'),
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
-- Structure de la table `hardware`
--

DROP TABLE IF EXISTS `hardware`;
CREATE TABLE `hardware` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `frigo` int(11) NOT NULL,
  `pipette` int(11) NOT NULL,
  `flacon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `hardware`
--

TRUNCATE TABLE `hardware`;
--
-- Contenu de la table `hardware`
--

INSERT INTO `hardware` (`id`, `id_user`, `frigo`, `pipette`, `flacon`) VALUES
(1, 6, 2, 915, 1000);

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `point` float NOT NULL,
  `last_connect` varchar(50) NOT NULL,
  `avertissement` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `level_culture_vg` int(11) NOT NULL,
  `level_usine_pg` int(11) NOT NULL,
  `level_labos_bases` int(11) NOT NULL,
  `last_culture_vg` double NOT NULL,
  `last_usine_pg` double NOT NULL,
  `argent` bigint(20) NOT NULL,
  `point_vente` float NOT NULL,
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

INSERT INTO `login` (`id`, `login`, `password`, `point`, `last_connect`, `avertissement`, `level`, `level_culture_vg`, `level_usine_pg`, `level_labos_bases`, `last_culture_vg`, `last_usine_pg`, `argent`, `point_vente`, `litter_vg`, `litter_pg`, `list_arome_not_have`) VALUES
(6, 'evengyl', '$2y$10$esysZfksJpjyNODPTAXCkeCuhFaVUcDYimSyAWrC.HdB.4iYoy6ky', 109.891, '1472214640', 7, 3, 13, 10, 12, 1869878.559, 794655.205, 9964920, 0, 374, 169, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,37,38,39,40,41,42,43,44,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,187,188,189,190,191,192,193,194,195,196,197,198,199,200,201,202,203,204,205,207,209,210,211,212,213,214,215,216,217,218,219,220,221,222,223,224,225,226,227,228,229,230,231,232,233,234,235,236,238,239,240,241,242,243,244,245,246,247,248,249,250,251,252,253,254,255,256,257,258,259,260,261,263,264,265,266,267,268,269,270,271,272,273,274,275,276,277,278,279,280,281,282,283,284,285,286,287,288,289,290,291,292,293,294,295,296,297,298,299,300,301,302,303,304,305,306,307,308,309,310,311,312,313,314,315,316,317,318,319,320,321,322,324,325,326,327,328,329,330,331,332,333,334,335,336,337,338,339,340,341,342,343,344,345,346,347,348,349,350,351,352,353,354,355,356,357,358,359,360,361,362,363,364,365,366,367,368,369,370,'),
(11, 'lbaudoux', '$2y$10$jjJFYrMF.io1poEG5Z.SfOCrnQbDp9sKG72d5Xwh3rENlZ4r9Odse', 0, '1467202373', 0, 0, 0, 0, 0, 1001.484, 1001.484, 1500, 0, 10, 10, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,187,188,189,190,191,192,193,194,195,196,197,198,199,200,201,202,203,204,205,206,207,208,209,210,211,212,213,214,215,216,217,218,219,220,221,222,223,224,225,226,227,228,229,230,231,232,233,234,235,236,237,238,239,240,241,242,243,244,245,246,247,248,249,250,251,252,253,254,255,256,257,258,259,260,261,262,263,264,265,266,267,268,269,270,271,272,273,274,275,276,277,278,279,280,281,282,283,284,285,286,287,288,289,290,291,292,293,294,295,296,297,298,299,300,301,302,303,304,305,306,307,308,309,310,311,312,313,314,315,316,317,318,319,320,321,322,323,324,325,326,327,328,329,330,331,332,333,334,335,336,337,338,339,340,341,342,343,344,345,346,347,348,349,350,351,352,353,354,355,356,357,358,359,360,361,362,363,364,365,366,367,368,369,370,');

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
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `list_product` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `product`
--

TRUNCATE TABLE `product`;
--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id`, `id_user`, `list_product`) VALUES
(1, 6, '(150:36:2080),(120:45:5050),(130:45:2080),');

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
-- --------------------------------------------------------

--
-- Structure de la table `update_en_cours`
--

DROP TABLE IF EXISTS `update_en_cours`;
CREATE TABLE `update_en_cours` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name_batiment` varchar(50) NOT NULL,
  `time_finish` bigint(20) NOT NULL,
  `real_name_search` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `update_en_cours`
--

TRUNCATE TABLE `update_en_cours`;
--
-- Index pour les tables exportées
--

--
-- Index pour la table `amelioration_var_config`
--
ALTER TABLE `amelioration_var_config`
  ADD PRIMARY KEY (`id`);

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
-- Index pour la table `hardware`
--
ALTER TABLE `hardware`
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
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `search_arome`
--
ALTER TABLE `search_arome`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `update_en_cours`
--
ALTER TABLE `update_en_cours`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `amelioration_var_config`
--
ALTER TABLE `amelioration_var_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `hardware`
--
ALTER TABLE `hardware`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `search_arome`
--
ALTER TABLE `search_arome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `update_en_cours`
--
ALTER TABLE `update_en_cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

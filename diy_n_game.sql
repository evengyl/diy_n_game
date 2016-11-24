-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 24 Novembre 2016 à 16:18
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
(1, 6, 19, 3, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(2, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 22, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 23, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 24, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 26, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 27, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `aromes`
--

DROP TABLE IF EXISTS `aromes`;
CREATE TABLE `aromes` (
  `id` int(11) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `aromes`
--

TRUNCATE TABLE `aromes`;
--
-- Contenu de la table `aromes`
--

INSERT INTO `aromes` (`id`, `marque`, `nom`) VALUES
(1, 'Bickford Flavors', 'Bourbon'),
(2, 'Bickford Flavors', 'Champagne'),
(3, 'Bickford Flavors', 'Cola'),
(4, 'Bickford Flavors', 'Pina Colada'),
(5, 'Bickford Flavors', 'Rhum'),
(6, 'Bickford Flavors', 'Menthe Poivrée'),
(7, 'Bickford Flavors', 'Abricot'),
(8, 'Bickford Flavors', 'Ananas'),
(9, 'Bickford Flavors', 'Banane'),
(10, 'Bickford Flavors', 'Cassis'),
(11, 'Bickford Flavors', 'Cerise'),
(12, 'Bickford Flavors', 'Citron'),
(13, 'Bickford Flavors', 'Fraise'),
(14, 'Bickford Flavors', 'Fraise Banane'),
(15, 'Bickford Flavors', 'Fraise Goyave'),
(16, 'Bickford Flavors', 'Fraise Kiwi'),
(17, 'Bickford Flavors', 'Framboise'),
(18, 'Bickford Flavors', 'Fruit de la Passion'),
(19, 'Bickford Flavors', 'Goyave'),
(20, 'Bickford Flavors', 'Guimauve'),
(21, 'Bickford Flavors', 'Kiwi'),
(22, 'Bickford Flavors', 'Lime'),
(23, 'Bickford Flavors', 'Mangue'),
(24, 'Bickford Flavors', 'Melon'),
(25, 'Bickford Flavors', 'Orange'),
(26, 'Bickford Flavors', 'Papaye'),
(27, 'Bickford Flavors', 'Pêche'),
(28, 'Bickford Flavors', 'Poire'),
(29, 'Bickford Flavors', 'Pomme'),
(30, 'Bickford Flavors', 'Pomme Cerise'),
(31, 'Bickford Flavors', 'Prune'),
(32, 'Bickford Flavors', 'Raisin'),
(33, 'Bickford Flavors', 'Beurre'),
(34, 'Bickford Flavors', 'Café'),
(35, 'Bickford Flavors', 'Cannelle'),
(36, 'Bickford Flavors', 'Caramel'),
(37, 'Bickford Flavors', 'Cheesecake'),
(38, 'Bickford Flavors', 'Chocolat'),
(39, 'Bickford Flavors', 'Crème de Menthe'),
(40, 'Bickford Flavors', 'Lait de Poule'),
(41, 'Bickford Flavors', 'Noisette'),
(42, 'Bickford Flavors', 'Pistache'),
(43, 'Bickford Flavors', 'Pomme Cannelle'),
(44, 'Bickford Flavors', 'Pomme d''érable'),
(45, 'Bickford Flavors', 'Praline'),
(46, 'Bickford Flavors', 'Sirop d''érable'),
(47, 'Bickford Flavors', 'Vanille'),
(48, 'Cappela Flavor', 'Cola'),
(49, 'Cappela Flavor', 'Abricot'),
(50, 'Cappela Flavor', 'Banane'),
(51, 'Cappela Flavor', 'Citron Lime'),
(52, 'Cappela Flavor', 'Figue'),
(53, 'Cappela Flavor', 'Fraise'),
(54, 'Cappela Flavor', 'Framboise'),
(55, 'Cappela Flavor', 'Grenade'),
(56, 'Cappela Flavor', 'Noix de coco'),
(57, 'Cappela Flavor', 'Pasteque'),
(58, 'Cappela Flavor', 'Pomme'),
(59, 'Cappela Flavor', 'Raisin'),
(60, 'Cappela Flavor', 'Banana Split'),
(61, 'Cappela Flavor', 'Brownie'),
(62, 'Cappela Flavor', 'Bubblegum'),
(63, 'Cappela Flavor', 'Cappuccino'),
(64, 'Cappela Flavor', 'Caramel'),
(65, 'Cappela Flavor', 'Double Chocolat'),
(66, 'Cappela Flavor', 'Espresso'),
(67, 'Cappela Flavor', 'Gauffre'),
(68, 'Cappela Flavor', 'Marshmallow'),
(69, 'Cappela Flavor', 'Noisette '),
(70, 'Cappela Flavor', 'Sirop d''érable'),
(71, 'Flavour Art', 'AAA Magic mask'),
(72, 'Flavour Art', 'Bitter Wizard '),
(73, 'Flavour Art', 'MTS Vap Wizard'),
(74, 'Flavour Art', 'Biere'),
(75, 'Flavour Art', 'Champagne'),
(76, 'Flavour Art', 'Cola'),
(77, 'Flavour Art', 'Gin'),
(78, 'Flavour Art', 'Jamaique Rhum'),
(80, 'Flavour Art', 'Thé Noir'),
(81, 'Flavour Art', 'Thé Vert'),
(82, 'Flavour Art', 'Whisky'),
(83, 'Flavour Art', 'Hypnotic Myst'),
(84, 'Flavour Art', 'Lavande'),
(85, 'Flavour Art', 'Rose'),
(86, 'Flavour Art', 'Viollette'),
(87, 'Flavour Art', 'Zen Garden'),
(88, 'Flavour Art', 'Anis'),
(89, 'Flavour Art', 'Menthe'),
(90, 'Flavour Art', 'Menthe Poivrée'),
(91, 'Flavour Art', 'Menthol Artic'),
(92, 'Flavour Art', 'Abricot'),
(93, 'Flavour Art', 'Ananas'),
(94, 'Flavour Art', 'Banane'),
(95, 'Flavour Art', 'Bergamotte'),
(96, 'Flavour Art', 'Cassis'),
(97, 'Flavour Art', 'Cerise'),
(98, 'Flavour Art', 'Cerise Noire'),
(99, 'Flavour Art', 'Citron Mix'),
(100, 'Flavour Art', 'Figue'),
(101, 'Flavour Art', 'Fraise'),
(102, 'Flavour Art', 'Framboise'),
(103, 'Flavour Art', 'Fruit de la Passion'),
(105, 'Flavour Art', 'Grenade'),
(106, 'Flavour Art', 'Kiwi'),
(107, 'Flavour Art', 'Lychee'),
(108, 'Flavour Art', 'Mandarine'),
(109, 'Flavour Art', 'Mangue'),
(110, 'Flavour Art', 'Mélange de fruit rouge'),
(111, 'Flavour Art', 'Melon'),
(112, 'Flavour Art', 'Mure'),
(113, 'Flavour Art', 'Myrtille'),
(114, 'Flavour Art', 'Noix de coco'),
(115, 'Flavour Art', 'Orange'),
(116, 'Flavour Art', 'Papaye'),
(117, 'Flavour Art', 'Pasteque'),
(118, 'Flavour Art', 'Peche'),
(119, 'Flavour Art', 'Poire'),
(120, 'Flavour Art', 'Pomme'),
(121, 'Flavour Art', 'Raisin'),
(122, 'Flavour Art', 'Cacao'),
(123, 'Flavour Art', 'Café Expresso'),
(124, 'Flavour Art', 'Cannelle'),
(125, 'Flavour Art', 'Cappuccino'),
(126, 'Flavour Art', 'Caramel'),
(127, 'Flavour Art', 'Chocolat'),
(128, 'Flavour Art', 'Cookie'),
(129, 'Flavour Art', 'Creme de Vienne'),
(130, 'Flavour Art', 'Creme Fouettée'),
(131, 'Flavour Art', 'Croissant'),
(132, 'Flavour Art', 'Miel'),
(133, 'Flavour Art', 'Noisette'),
(134, 'Flavour Art', 'Nougat'),
(135, 'Flavour Art', 'Panettone'),
(136, 'Flavour Art', 'Pistache'),
(137, 'Flavour Art', 'Réglisse '),
(138, 'Flavour Art', 'Sirop d''érable'),
(139, 'Flavour Art', 'Tarte au Pomme'),
(140, 'Flavour Art', 'Tiramisu'),
(141, 'Flavour Art', 'Torrone'),
(142, 'Flavour Art', 'Tutti Frutti'),
(143, 'Flavour Art', 'Vanille'),
(144, 'Flavour Art', '7 Leaves Ultimate'),
(145, 'Flavour Art', 'Black Fire'),
(146, 'Flavour Art', 'Burley'),
(147, 'Flavour Art', 'Camtel Ultimate'),
(148, 'Flavour Art', 'Cowboy'),
(149, 'Flavour Art', 'Cuba Supreme'),
(150, 'Flavour Art', 'Dark Vapure'),
(151, 'Flavour Art', 'Desert Ship'),
(152, 'Flavour Art', 'Latakia'),
(153, 'Flavour Art', 'Maxx Blend'),
(154, 'Flavour Art', 'Mellow Sunset'),
(155, 'Flavour Art', 'Oba Oba'),
(156, 'Flavour Art', 'Oryental 4'),
(157, 'Flavour Art', 'Ozone'),
(158, 'Flavour Art', 'Perique Black'),
(159, 'Flavour Art', 'Reggae Night'),
(160, 'Flavour Art', 'Royal'),
(161, 'Flavour Art', 'Ry 4'),
(162, 'Flavour Art', 'Shade'),
(163, 'Flavour Art', 'Virginia'),
(166, 'Inawera', 'Brandy'),
(167, 'Inawera', 'Café'),
(168, 'Inawera', 'Cappuccino'),
(169, 'Inawera', 'Cerise Liqueur'),
(170, 'Inawera', 'Champagne'),
(171, 'Inawera', 'Cola'),
(172, 'Inawera', 'Jamaique Rhum'),
(173, 'Inawera', 'Pinacolada'),
(174, 'Inawera', 'Plum Vodka'),
(175, 'Inawera', 'Rhum'),
(176, 'Inawera', 'Thé Noir'),
(177, 'Inawera', 'Thé Vert'),
(178, 'Inawera', 'Whisky'),
(179, 'Inawera', 'Rose'),
(181, 'Inawera', 'Anis'),
(182, 'Inawera', 'Cool Mint'),
(183, 'Inawera', 'Eucalyptus Mint'),
(184, 'Inawera', 'Menthe'),
(185, 'Inawera', 'Menthe'),
(186, 'Inawera', 'Mix Mint'),
(187, 'Inawera', 'Abricot'),
(188, 'Inawera', 'Ananas'),
(189, 'Inawera', 'Banane'),
(190, 'Inawera', 'Cerise'),
(191, 'Inawera', 'Citron'),
(192, 'Inawera', 'Exotic Roots'),
(193, 'Inawera', 'Fraise'),
(194, 'Inawera', 'Fraise Sauvage'),
(195, 'Inawera', 'Framboise'),
(196, 'Inawera', 'Melon'),
(197, 'Inawera', 'Noix de coco'),
(198, 'Inawera', 'Orange'),
(199, 'Inawera', 'Peche'),
(200, 'Inawera', 'Poire'),
(201, 'Inawera', 'Pomme'),
(202, 'Inawera', 'Raisin'),
(203, 'Inawera', 'Cacahuète'),
(204, 'Inawera', 'Chocolat'),
(205, 'Inawera', 'Chocolat au Lait'),
(206, 'Inawera', 'Miel'),
(207, 'Inawera', 'Noisette'),
(208, 'Inawera', 'Nougat'),
(209, 'Inawera', 'Prune'),
(210, 'Inawera', 'Pruneaux'),
(211, 'Inawera', 'Sesame'),
(212, 'Inawera', 'Tiramisu'),
(213, 'Inawera', 'Vanille'),
(214, 'Inawera', 'Vanille Bourbon'),
(215, 'Inawera', '7 Leaves Ultimate'),
(216, 'Inawera', 'Burley It'),
(217, 'Inawera', 'Cowboy Blend'),
(220, 'Inawera', 'Desert Voyager'),
(221, 'Inawera', 'Falcon Eye'),
(222, 'Inawera', 'Gipsy King'),
(223, 'Inawera', 'Kent'),
(224, 'Inawera', 'Latakia'),
(225, 'Inawera', 'Mellow Sunset'),
(226, 'Inawera', 'Old Havana'),
(227, 'Inawera', 'Perique Black'),
(228, 'Inawera', 'Space Drop '),
(229, 'Inawera', 'Symphony'),
(230, 'Inawera', 'Turkish'),
(231, 'Inawera', 'Tuscan Garden'),
(232, 'Inawera', 'Western Blend'),
(233, 'The Perfumer''s Apprentice', 'Koolada'),
(234, 'The Perfumer''s Apprentice', 'Sweetener'),
(235, 'The Perfumer''s Apprentice', 'Absinthe'),
(237, 'The Perfumer''s Apprentice', 'Champagne'),
(238, 'The Perfumer''s Apprentice', 'Cola'),
(239, 'The Perfumer''s Apprentice', 'HPNO'),
(240, 'The Perfumer''s Apprentice', 'Thé Earl Grey'),
(241, 'The Perfumer''s Apprentice', 'Marie Jeanne'),
(242, 'The Perfumer''s Apprentice', 'Ananas'),
(243, 'The Perfumer''s Apprentice', 'Banane Mure'),
(244, 'The Perfumer''s Apprentice', 'Cerise'),
(245, 'The Perfumer''s Apprentice', 'Cerise Noire'),
(246, 'The Perfumer''s Apprentice', 'Citron'),
(247, 'The Perfumer''s Apprentice', 'Dragon Rouge'),
(248, 'The Perfumer''s Apprentice', 'Fraise'),
(249, 'The Perfumer''s Apprentice', 'Framboise'),
(250, 'The Perfumer''s Apprentice', 'Grenade'),
(251, 'The Perfumer''s Apprentice', 'Kiwi'),
(252, 'The Perfumer''s Apprentice', 'Lime'),
(253, 'The Perfumer''s Apprentice', 'Mangue'),
(254, 'The Perfumer''s Apprentice', 'Melon Cantaloupe'),
(255, 'The Perfumer''s Apprentice', 'Noix de coco'),
(256, 'The Perfumer''s Apprentice', 'Peche'),
(257, 'The Perfumer''s Apprentice', 'Poire'),
(258, 'The Perfumer''s Apprentice', 'Pomme'),
(259, 'The Perfumer''s Apprentice', 'Pomme Grany Smith'),
(260, 'The Perfumer''s Apprentice', 'Prune'),
(261, 'The Perfumer''s Apprentice', 'Tutti Frutti'),
(262, 'The Perfumer''s Apprentice', 'Amande'),
(263, 'The Perfumer''s Apprentice', 'Amande Amaretto'),
(264, 'The Perfumer''s Apprentice', 'Barbe à Papa'),
(265, 'The Perfumer''s Apprentice', 'Beurre d''arachide'),
(266, 'The Perfumer''s Apprentice', 'Bonbon à la Pomme'),
(267, 'The Perfumer''s Apprentice', 'Bonbon au Caramel'),
(268, 'The Perfumer''s Apprentice', 'Bubblegum'),
(269, 'The Perfumer''s Apprentice', 'Cannelle Rouge'),
(270, 'The Perfumer''s Apprentice', 'Caramel'),
(271, 'The Perfumer''s Apprentice', 'Cheesecake'),
(272, 'The Perfumer''s Apprentice', 'Chocolat'),
(273, 'The Perfumer''s Apprentice', 'Chocolat au Lait'),
(274, 'The Perfumer''s Apprentice', 'Double Chocolat'),
(275, 'The Perfumer''s Apprentice', 'English Toffe'),
(276, 'The Perfumer''s Apprentice', 'Gauffre'),
(277, 'The Perfumer''s Apprentice', 'Graham Cracker'),
(278, 'The Perfumer''s Apprentice', 'Pain d''épice'),
(279, 'The Perfumer''s Apprentice', 'Sucre Roux '),
(280, 'The Perfumer''s Apprentice', 'Sweet Cream '),
(281, 'The Perfumer''s Apprentice', 'Vanille Bourbon'),
(282, 'The Perfumer''s Apprentice', 'Ml Boro Premium'),
(283, 'The Perfumer''s Apprentice', 'Ry 4'),
(284, 'The Perfumer''s Apprentice', 'Ry 4 Double'),
(286, 'The Perfumer''s Apprentice', 'Bittersweet '),
(287, 'Cappela Flavor', 'Amaretto'),
(288, 'Cappela Flavor', 'Anise'),
(289, 'Cappela Flavor', 'Barbe à papa'),
(290, 'Cappela Flavor', 'Melon'),
(291, 'Cappela Flavor', 'Thé chai'),
(292, 'Cappela Flavor', 'Coca cherry'),
(293, 'Cappela Flavor', 'Coco Choco amande'),
(294, 'Cappela Flavor', 'Gateau chocolat'),
(295, 'Cappela Flavor', 'Downut chocolat'),
(296, 'Cappela Flavor', 'Framboise chocolat'),
(297, 'Cappela Flavor', 'Menthol légere'),
(298, 'Cappela Flavor', 'Cranberry'),
(299, 'Cappela Flavor', 'Yaourt crème'),
(300, 'Cappela Flavor', 'Concombre'),
(301, 'Cappela Flavor', 'Tasse de café'),
(302, 'Cappela Flavor', 'Fruit du dragon'),
(303, 'Cappela Flavor', 'Double pomme'),
(304, 'Cappela Flavor', 'Energy drink'),
(305, 'Cappela Flavor', 'Vanilla french'),
(306, 'Cappela Flavor', 'Gingerbread'),
(307, 'Cappela Flavor', 'Donuts'),
(308, 'Cappela Flavor', 'Crackers'),
(309, 'Cappela Flavor', 'Anana'),
(310, 'Cappela Flavor', 'Pamplemousse'),
(311, 'Cappela Flavor', 'Grenadine'),
(312, 'Cappela Flavor', 'Fruit rouge'),
(313, 'Cappela Flavor', 'Irish cream'),
(314, 'Cappela Flavor', 'Fraise kiwi'),
(315, 'Cappela Flavor', 'Jelly candy'),
(316, 'Cappela Flavor', 'Amande grillée'),
(317, 'Cappela Flavor', 'Beurre de cacahuette'),
(318, 'Cappela Flavor', 'Cookie sucré'),
(319, 'Cappela Flavor', 'Crème de beurre'),
(320, 'Cappela Flavor', 'Crème gateau chocolat'),
(321, 'Cappela Flavor', 'Crème pêche'),
(322, 'Cappela Flavor', 'Crème pralinée'),
(323, 'Cappela Flavor', 'Crème vanille fouetée'),
(324, 'Cappela Flavor', 'Cupcake vanille'),
(325, 'Cappela Flavor', 'Fruit de la passion'),
(326, 'Cappela Flavor', 'Jus d''orange'),
(327, 'Cappela Flavor', 'Jus de pêche'),
(328, 'Cappela Flavor', 'Lychee'),
(329, 'Cappela Flavor', 'Mandarine'),
(330, 'Cappela Flavor', 'Mangue'),
(331, 'Cappela Flavor', 'Meringue au citron'),
(332, 'Cappela Flavor', 'Pina colada'),
(333, 'Cappela Flavor', 'Poire'),
(334, 'Cappela Flavor', 'Pop Corn'),
(335, 'Cappela Flavor', 'Vanille custard'),
(336, 'T-juice', 'Red astaire'),
(337, 'T-juice', 'Black n blue'),
(338, 'T-juice', 'Clara T'),
(339, 'T-juice', 'Jon freeze'),
(340, 'T-juice', 'Jacques le Mon'),
(341, 'T-juice', 'Gold n brown'),
(342, 'T-juice', 'Colonel custard'),
(343, 'T-juice', 'Jack the ripple'),
(344, 'T-juice', 'Vamp vape'),
(345, 'T-juice', 'Forest affair'),
(346, 'T-juice', 'Strawberri'),
(347, 'T-juice', 'Green steam'),
(348, 'T-juice', 'High voltage'),
(349, 'T-juice', 'Tangerine dream'),
(350, 'T-juice', 'Minty the toff'),
(351, 'T-juice', 'Afro dizziac'),
(352, 'T-juice', 'TY 4'),
(353, 'T-juice', 'Bubble gun'),
(354, 'T-juice', 'Quintessence'),
(355, 'T-juice', 'Primo verde'),
(356, 'T-juice', 'Mentice'),
(357, 'T-juice', 'Pomme pom'),
(358, 'T-juice', 'Cubana'),
(359, 'T-juice', 'Melipona'),
(360, 'T-juice', 'Java juice'),
(361, 'T-juice', 'Cherry choc'),
(362, 'T-juice', 'Mintastic'),
(363, 'T-juice', 'UK smokes'),
(364, 'T-juice', 'Virgin leaf'),
(365, 'T-juice', 'USA reds'),
(366, 'T-juice', 'Ice queen'),
(367, 'T-juice', 'Hermano rubio'),
(368, 'T-juice', 'Cubanito'),
(369, 'T-juice', 'USA silver'),
(370, 'T-juice', 'Eastern blend'),
(375, 'Cappela Flavor', 'New strawberry');

-- --------------------------------------------------------

--
-- Structure de la table `bases`
--

DROP TABLE IF EXISTS `bases`;
CREATE TABLE `bases` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bases_2080` float NOT NULL,
  `bases_5050` float NOT NULL,
  `bases_8020` float NOT NULL,
  `bases_1000` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `bases`
--

TRUNCATE TABLE `bases`;
--
-- Contenu de la table `bases`
--

INSERT INTO `bases` (`id`, `id_user`, `bases_2080`, `bases_5050`, `bases_8020`, `bases_1000`) VALUES
(1, 6, 14.95, 1026.04, 0, 30),
(2, 11, 0, 0, 0, 0),
(3, 12, 0, 0, 0, 0),
(4, 13, 0, 0, 0, 0),
(5, 14, 0, 0, 0, 0),
(6, 15, 0, 0, 0, 0),
(7, 16, 0, 0, 0, 0),
(8, 17, 0, 0, 0, 0),
(9, 18, 0, 0, 0, 0),
(10, 19, 0, 0, 0, 0),
(11, 20, 0, 0, 0, 0),
(12, 21, 0, 0, 0, 0),
(13, 22, 0, 0, 0, 0),
(14, 23, 0, 0, 0, 0),
(15, 24, 0, 0, 0, 0),
(16, 25, 0, 0, 0, 0),
(17, 26, 0, 0, 0, 0),
(18, 27, 0, 0, 0, 0);

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
(1, 6, 3, 9795, 1370),
(2, 27, 1, 10, 100);

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
  `produit_vendu_week` bigint(20) NOT NULL,
  `produit_vendu_total` bigint(20) NOT NULL,
  `last_connect` varchar(50) NOT NULL,
  `avertissement` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `level_culture_vg` int(11) NOT NULL,
  `level_usine_pg` int(11) NOT NULL,
  `level_labos_bases` int(11) NOT NULL,
  `last_culture_vg` float NOT NULL,
  `last_usine_pg` float NOT NULL,
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

INSERT INTO `login` (`id`, `login`, `password`, `point`, `produit_vendu_week`, `produit_vendu_total`, `last_connect`, `avertissement`, `level`, `level_culture_vg`, `level_usine_pg`, `level_labos_bases`, `last_culture_vg`, `last_usine_pg`, `argent`, `point_vente`, `litter_vg`, `litter_pg`, `list_arome_not_have`) VALUES
(6, 'evengyl', '$2y$10$5bznPXvXyjUqynJ5IM5D2eh0H3cEt/LJun8rPzyiQK6ntdnqNwVHS', 4062.17, 449, 574, '1480000145', 17, 3, 14, 19, 18, 663.681, 1765.68, 37506365, 4.541, 2375, 1610, '1,2,3,4,5,6,7,8,9,10,11,13,14,15,16,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,37,38,39,40,41,42,43,44,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,91,92,93,94,95,96,97,98,99,100,101,102,103,104,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,140,141,142,143,145,146,147,148,149,150,152,153,154,155,156,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,187,188,189,190,191,192,193,194,195,196,197,198,199,200,201,202,203,204,205,207,209,210,211,213,214,215,216,217,218,219,220,221,222,223,224,225,226,227,228,229,230,231,232,233,234,235,236,238,239,240,241,242,243,244,245,246,247,248,249,250,251,252,253,254,255,257,258,259,260,263,264,265,266,267,268,269,270,271,272,273,274,276,277,278,279,280,281,283,284,285,286,287,288,289,290,291,292,293,294,295,296,297,298,299,300,301,302,303,304,305,306,307,308,309,310,311,312,314,315,316,317,318,319,320,321,322,324,325,326,327,328,329,330,331,332,333,335,336,337,338,339,340,341,342,343,344,345,346,348,349,350,351,352,353,354,355,356,358,359,361,362,363,364,365,366,367,368,369,370,375,'),
(11, 'lbaudoux', '$2y$10$jjJFYrMF.io1poEG5Z.SfOCrnQbDp9sKG72d5Xwh3rENlZ4r9Odse', 0, 0, 0, '1467202373', 0, 0, 0, 0, 0, 1001.48, 1001.48, 1500, 0, 10, 10, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,187,188,189,190,191,192,193,194,195,196,197,198,199,200,201,202,203,204,205,206,207,208,209,210,211,212,213,214,215,216,217,218,219,220,221,222,223,224,225,226,227,228,229,230,231,232,233,234,235,236,237,238,239,240,241,242,243,244,245,246,247,248,249,250,251,252,253,254,255,256,257,258,259,260,261,262,263,264,265,266,267,268,269,270,271,272,273,274,275,276,277,278,279,280,281,282,283,284,285,286,287,288,289,290,291,292,293,294,295,296,297,298,299,300,301,302,303,304,305,306,307,308,309,310,311,312,313,314,315,316,317,318,319,320,321,322,323,324,325,326,327,328,329,330,331,332,333,334,335,336,337,338,339,340,341,342,343,344,345,346,347,348,349,350,351,352,353,354,355,356,357,358,359,360,361,362,363,364,365,366,367,368,369,370,375,');

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
(1, 6, '');

-- --------------------------------------------------------

--
-- Structure de la table `random_shop`
--

DROP TABLE IF EXISTS `random_shop`;
CREATE TABLE `random_shop` (
  `id` int(11) NOT NULL,
  `date_stop` varchar(255) NOT NULL,
  `nom_aromes` varchar(255) NOT NULL,
  `id_aromes` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `base` varchar(10) NOT NULL,
  `nb_vente` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `random_shop`
--

TRUNCATE TABLE `random_shop`;
--
-- Contenu de la table `random_shop`
--

INSERT INTO `random_shop` (`id`, `date_stop`, `nom_aromes`, `id_aromes`, `img`, `marque`, `base`, `nb_vente`) VALUES
(285, '1480578987', 'Bourbon', 1, '/images/aromes/Bickford Flavors/bickford_flavors_bourbon.jpg', 'Bickford Flavors', '8020', '0'),
(286, '1480578987', 'Orange', 25, '/images/aromes/Bickford Flavors/bickford_flavors_orange.jpg', 'Bickford Flavors', '8020', '0'),
(287, '1480578987', 'Lavande', 84, '/images/aromes/Flavour Art/flavour_art_lavande.jpg', 'Flavour Art', '2080', '0'),
(288, '1480578987', 'Mangue', 109, '/images/aromes/Flavour Art/flavour_art_mangue.jpg', 'Flavour Art', '8020', '0'),
(289, '1480578987', 'Melon', 111, '/images/aromes/Flavour Art/flavour_art_melon.jpg', 'Flavour Art', '2080', '0'),
(290, '1480578987', 'Orange', 115, '/images/aromes/Flavour Art/flavour_art_orange.jpg', 'Flavour Art', '2080', '0'),
(291, '1480578987', 'Chocolat', 127, '/images/aromes/Flavour Art/flavour_art_chocolat.jpg', 'Flavour Art', '8020', '0'),
(292, '1480578987', 'Cookie', 128, '/images/aromes/Flavour Art/flavour_art_cookie.jpg', 'Flavour Art', '8020', '0'),
(293, '1480578987', 'Tutti Frutti', 142, '/images/aromes/Flavour Art/flavour_art_tutti_frutti.jpg', 'Flavour Art', '1000', '0'),
(294, '1480578987', 'Shade', 162, '/images/aromes/Flavour Art/flavour_art_shade.jpg', 'Flavour Art', '8020', '0'),
(295, '1480578987', 'Brandy', 166, '/images/aromes/Inawera/inawera_brandy.jpg', 'Inawera', '1000', '0'),
(296, '1480578987', 'Pinacolada', 173, '/images/aromes/Inawera/inawera_pinacolada.jpg', 'Inawera', '2080', '0'),
(297, '1480578987', 'Anis', 181, '/images/aromes/Inawera/inawera_anis.jpg', 'Inawera', '2080', '0'),
(298, '1480578987', 'Prune', 209, '/images/aromes/Inawera/inawera_prune.jpg', 'Inawera', '2080', '0'),
(299, '1480578987', 'Desert Voyager', 220, '/images/aromes/Inawera/inawera_desert_voyager.jpg', 'Inawera', '8020', '0'),
(300, '1480578987', 'Chocolat au Lait', 273, '/images/aromes/The Perfumer''s Apprentice/the_perfumer''s_apprentice_chocolat_au_lait.jpg', 'The Perfumer''s Apprentice', '1000', '0'),
(301, '1480578987', 'Ml Boro Premium', 282, '/images/aromes/The Perfumer''s Apprentice/the_perfumer''s_apprentice_ml_boro_premium.jpg', 'The Perfumer''s Apprentice', '5050', '0'),
(302, '1480578987', 'Bittersweet ', 286, '/images/aromes/The Perfumer''s Apprentice/the_perfumer''s_apprentice_bittersweet.jpg', 'The Perfumer''s Apprentice', '1000', '0');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `point` (`point`),
  ADD KEY `argent` (`argent`),
  ADD KEY `last_culture_vg` (`last_culture_vg`),
  ADD KEY `last_usine_pg` (`last_usine_pg`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `random_shop`
--
ALTER TABLE `random_shop`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `aromes`
--
ALTER TABLE `aromes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=376;
--
-- AUTO_INCREMENT pour la table `bases`
--
ALTER TABLE `bases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `construction_en_cours`
--
ALTER TABLE `construction_en_cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `hardware`
--
ALTER TABLE `hardware`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- AUTO_INCREMENT pour la table `random_shop`
--
ALTER TABLE `random_shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;
--
-- AUTO_INCREMENT pour la table `search_arome`
--
ALTER TABLE `search_arome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `update_en_cours`
--
ALTER TABLE `update_en_cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

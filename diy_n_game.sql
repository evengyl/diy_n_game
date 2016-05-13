-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 13 Mai 2016 à 06:58
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
  `nom` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `quality` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `aromes`
--

TRUNCATE TABLE `aromes`;
--
-- Contenu de la table `aromes`
--

INSERT INTO `aromes` (`id`, `marque`, `type`, `nom`, `commentaire`, `img`, `quality`) VALUES
(10, 'Bickford Flavors', 'Boisson', 'Bourbon', '', '0', 2),
(11, 'Bickford Flavors', 'Boisson', 'Champagne', '', '0', 2),
(12, 'Bickford Flavors', 'Boisson', 'Cola', '', '0', 2),
(13, 'Bickford Flavors', 'Boisson', 'Pina Colada', '', '0', 2),
(14, 'Bickford Flavors', 'Boisson', 'Rhum', '', '0', 2),
(15, 'Bickford Flavors', 'Fraicheur', 'Chlorophylle', '', '0', 2),
(16, 'Bickford Flavors', 'Fraicheur', 'Menthe Poivrée', '', '0', 2),
(17, 'Bickford Flavors', 'Fruité', 'Abricot', '', '0', 2),
(18, 'Bickford Flavors', 'Fruité', 'Ananas', '', '0', 2),
(19, 'Bickford Flavors', 'Fruité', 'Banane', '', '0', 2),
(20, 'Bickford Flavors', 'Fruité', 'Cassis', '', '0', 2),
(21, 'Bickford Flavors', 'Fruité', 'Cerise', '', '0', 2),
(22, 'Bickford Flavors', 'Fruité', 'Citron', '', '0', 2),
(23, 'Bickford Flavors', 'Fruité', 'Fraise', '', '0', 2),
(24, 'Bickford Flavors', 'Fruité', 'Fraise Banane', '', '0', 2),
(25, 'Bickford Flavors', 'Fruité', 'Fraise Goyave', '', '0', 2),
(26, 'Bickford Flavors', 'Fruité', 'Fraise Kiwi', '', '0', 2),
(27, 'Bickford Flavors', 'Fruité', 'Framboise', '', '0', 2),
(28, 'Bickford Flavors', 'Fruité', 'Fruit de la Passion', '', '0', 2),
(29, 'Bickford Flavors', 'Fruité', 'Goyave ', '', '0', 2),
(30, 'Bickford Flavors', 'Fruité', 'Guimauve', '', '0', 2),
(31, 'Bickford Flavors', 'Fruité', 'Kiwi', '', '0', 2),
(32, 'Bickford Flavors', 'Fruité', 'Lime', '', '0', 2),
(33, 'Bickford Flavors', 'Fruité', 'Mangue', '', '0', 2),
(34, 'Bickford Flavors', 'Fruité', 'Melon', '', '0', 2),
(35, 'Bickford Flavors', 'Fruité', 'Orange', '', '0', 2),
(36, 'Bickford Flavors', 'Fruité', 'Papaye', '', '0', 2),
(37, 'Bickford Flavors', 'Fruité', 'Peche', '', '0', 2),
(38, 'Bickford Flavors', 'Fruité', 'Poire', '', '0', 2),
(39, 'Bickford Flavors', 'Fruité', 'Pomme', '', '0', 2),
(40, 'Bickford Flavors', 'Fruité', 'Pomme Cerise', '', '0', 2),
(41, 'Bickford Flavors', 'Fruité', 'Prune', '', '0', 2),
(42, 'Bickford Flavors', 'Fruité', 'Raisin', '', '0', 2),
(43, 'Bickford Flavors', 'Fruité', 'Raisin', '', '0', 2),
(44, 'Bickford Flavors', 'Gourmand', 'Beurre', '', '0', 2),
(45, 'Bickford Flavors', 'Gourmand', 'Café', '', '0', 2),
(46, 'Bickford Flavors', 'Gourmand', 'Cannelle', '', '0', 2),
(47, 'Bickford Flavors', 'Gourmand', 'Caramel ', '', '0', 2),
(48, 'Bickford Flavors', 'Gourmand', 'Champignon', '', '0', 2),
(49, 'Bickford Flavors', 'Gourmand', 'Cheesecake', '', '0', 2),
(50, 'Bickford Flavors', 'Gourmand', 'Chocolat', '', '0', 2),
(51, 'Bickford Flavors', 'Gourmand', 'Creme de Menthe', '', '0', 2),
(52, 'Bickford Flavors', 'Gourmand', 'Lait de Poule', '', '0', 2),
(53, 'Bickford Flavors', 'Gourmand', 'Noisette', '', '0', 2),
(54, 'Bickford Flavors', 'Gourmand', 'Pistache', '', '0', 2),
(55, 'Bickford Flavors', 'Gourmand', 'Pomme Cannelle', '', '0', 2),
(56, 'Bickford Flavors', 'Gourmand', 'Pomme d''érable', '', '0', 2),
(57, 'Bickford Flavors', 'Gourmand', 'Praline', '', '0', 2),
(58, 'Bickford Flavors', 'Gourmand', 'Sirop d''érable', '', '0', 2),
(59, 'Bickford Flavors', 'Gourmand', 'Vanille', '', '0', 2),
(107, 'Cappela Flavor', 'Boisson', 'Cola', '', '0', 3),
(108, 'Cappela Flavor', 'Fruité', 'Abricot', '', '0', 3),
(109, 'Cappela Flavor', 'Fruité', 'Banane', '', '0', 3),
(110, 'Cappela Flavor', 'Fruité', 'Citron Lime', '', '0', 3),
(111, 'Cappela Flavor', 'Fruité', 'Figue', '', '0', 3),
(112, 'Cappela Flavor', 'Fruité', 'Fraise', '', '0', 3),
(113, 'Cappela Flavor', 'Fruité', 'Framboise', '', '0', 3),
(114, 'Cappela Flavor', 'Fruité', 'Grenade', '', '0', 3),
(115, 'Cappela Flavor', 'Fruité', 'Noix de coco', '', '0', 3),
(116, 'Cappela Flavor', 'Fruité', 'Pasteque', '', '0', 3),
(117, 'Cappela Flavor', 'Fruité', 'Pomme', '', '0', 3),
(118, 'Cappela Flavor', 'Fruité', 'Prune', '', '0', 3),
(119, 'Cappela Flavor', 'Fruité', 'Raisin', '', '0', 3),
(120, 'Cappela Flavor', 'Gourmand', 'Banana Split', '', '0', 3),
(121, 'Cappela Flavor', 'Gourmand', 'Beurre', '', '0', 3),
(122, 'Cappela Flavor', 'Gourmand', 'Brownie', '', '0', 3),
(123, 'Cappela Flavor', 'Gourmand', 'Bubblegum', '', '0', 3),
(124, 'Cappela Flavor', 'Gourmand', 'Cappuccino', '', '0', 3),
(125, 'Cappela Flavor', 'Gourmand', 'Caramel', '', '0', 3),
(126, 'Cappela Flavor', 'Gourmand', 'Double Chocolat', '', '0', 3),
(127, 'Cappela Flavor', 'Gourmand', 'Espresso', '', '0', 3),
(128, 'Cappela Flavor', 'Gourmand', 'Gauffre', '', '0', 3),
(129, 'Cappela Flavor', 'Gourmand', 'Marshmallow', '', '0', 3),
(130, 'Cappela Flavor', 'Gourmand', 'Noisette ', '', '0', 3),
(131, 'Cappela Flavor', 'Gourmand', 'Sirop d''érable', '', '0', 3),
(132, 'Cappela Flavor', 'Gourmand', 'Tarte au Pomme', '', '0', 3),
(133, 'Compact', 'Boisson', 'Pirates Juice', 'Rhum', '0', 0),
(134, 'Compact', 'Boisson', 'Single barrel', 'Whisky', '0', 0),
(135, 'Compact', 'Fraicheur', 'Round Mint', 'Menthe', '0', 0),
(136, 'Compact', 'Fruité', 'Italian Gleen', 'Raisin', '0', 0),
(137, 'Compact', 'Gourmand', 'Brazilian taste', 'café/chocolat, un peu boisé et légèrement sucré', '0', 0),
(138, 'Compact', 'Gourmand', 'Irish Cloud', 'Irish Coffee', '0', 0),
(139, 'Compact', 'Gourmand', 'Réglisse ', '', '0', 0),
(140, 'Compact', 'Gourmand', 'Tropical Berry', 'Vanillé', '0', 0),
(141, 'Compact', 'Tabac', 'Keen Tobacco 117', 'arôme naturel à partir de feuilles de tabac dénicotinisées', '0', 0),
(142, 'Compact', 'Tabac', 'Radical Tobacco', 'sombre et corsé, avec une subtile note cacaotée', '0', 0),
(143, 'Decadent Vapours', 'Boisson', 'Absinthe', '', '0', 0),
(144, 'Decadent Vapours', 'Boisson', 'Cognac', '', '0', 0),
(145, 'Decadent Vapours', 'Boisson', 'Tequila', '', '0', 0),
(146, 'Decadent Vapours', 'Boisson', 'Vin Chaud', '', '0', 0),
(147, 'Decadent Vapours', 'Floral', 'Fleur de Lotus', '', '0', 0),
(148, 'Decadent Vapours', 'Floral', 'Herbe de Provence', 'Un mélange authentique mas provençal du romarin, le thym, la sarriette, l''origan et les feuilles de laurier - idéal pour pimenter saveurs fades', '0', 0),
(149, 'Decadent Vapours', 'Floral', 'Ylang Ylang', '', '0', 0),
(150, 'Decadent Vapours', 'Fraicheur', 'Menthe', '', '0', 0),
(151, 'Decadent Vapours', 'Fruité', 'Cassis', '', '0', 0),
(152, 'Decadent Vapours', 'Fruité', 'Cerise', '', '0', 0),
(153, 'Decadent Vapours', 'Fruité', 'Framboise', '', '0', 0),
(154, 'Decadent Vapours', 'Fruité', 'Fruit de la Passion', '', '0', 0),
(155, 'Decadent Vapours', 'Fruité', 'Lychee', '', '0', 0),
(156, 'Decadent Vapours', 'Fruité', 'Mangue', '', '0', 0),
(157, 'Decadent Vapours', 'Fruité', 'Myrtille', '', '0', 0),
(158, 'Decadent Vapours', 'Fruité', 'Noix de Coco', '', '0', 0),
(159, 'Decadent Vapours', 'Fruité', 'Pomme', '', '0', 0),
(160, 'Decadent Vapours', 'Gourmand', 'Bacon ', '', '0', 0),
(161, 'Decadent Vapours', 'Gourmand', 'Barbe à Papa', '', '0', 0),
(162, 'Decadent Vapours', 'Gourmand', 'Bubblegum', '', '0', 0),
(163, 'Decadent Vapours', 'Gourmand', 'Café Bresil', '', '0', 0),
(164, 'Decadent Vapours', 'Gourmand', 'Chocolat au lait', '', '0', 0),
(165, 'Decadent Vapours', 'Gourmand', 'Chocolat Blanc', '', '0', 0),
(166, 'Decadent Vapours', 'Gourmand', 'Guimauve', '', '0', 0),
(167, 'Decadent Vapours', 'Gourmand', 'Rhubarbe', '', '0', 0),
(168, 'Decadent Vapours', 'Gourmand', 'Roti de Bœuf', '', '0', 0),
(169, 'Decadent Vapours', 'Gourmand', 'Tarte au fraise', '', '0', 0),
(170, 'Decadent Vapours', 'Gourmand', 'Tarte au Pomme', '', '0', 0),
(171, 'Decadent Vapours', 'Gourmand', 'Tiramisu', '', '0', 0),
(172, 'Faerie''s Finest', 'Boisson', 'Bourbon', '', '0', 0),
(173, 'Faerie''s Finest', 'Boisson', 'Pina Colada', '', '0', 0),
(174, 'Faerie''s Finest', 'Floral', 'Lavande', '', '0', 0),
(175, 'Faerie''s Finest', 'Fraicheur', 'Menthe Poivrée', '', '0', 0),
(176, 'Faerie''s Finest', 'Fruité', 'Abricot', '', '0', 0),
(177, 'Faerie''s Finest', 'Fruité', 'Ananas', '', '0', 0),
(178, 'Faerie''s Finest', 'Fruité', 'Banane', '', '0', 0),
(179, 'Faerie''s Finest', 'Fruité', 'Cerise', '', '0', 0),
(180, 'Faerie''s Finest', 'Fruité', 'Citrouille', '', '0', 0),
(181, 'Faerie''s Finest', 'Fruité', 'Fraise', '', '0', 0),
(182, 'Faerie''s Finest', 'Fruité', 'Framboise ', '', '0', 0),
(183, 'Faerie''s Finest', 'Fruité', 'Mangue ', '', '0', 0),
(184, 'Faerie''s Finest', 'Fruité', 'Mure', '', '0', 0),
(185, 'Faerie''s Finest', 'Fruité', 'Myrtille', '', '0', 0),
(186, 'Faerie''s Finest', 'Fruité', 'Noix de coco', '', '0', 0),
(187, 'Faerie''s Finest', 'Fruité', 'Peche', '', '0', 0),
(188, 'Faerie''s Finest', 'Fruité', 'Pomme', '', '0', 0),
(189, 'Faerie''s Finest', 'Fruité', 'Raisin ', '', '0', 0),
(190, 'Faerie''s Finest', 'Gourmand', 'Amande', '', '0', 0),
(191, 'Faerie''s Finest', 'Gourmand', 'Barbe à Papa', '', '0', 0),
(192, 'Faerie''s Finest', 'Gourmand', 'Beurre', '', '0', 0),
(193, 'Faerie''s Finest', 'Gourmand', 'Bubblegum', '', '0', 0),
(194, 'Faerie''s Finest', 'Gourmand', 'Café', '', '0', 0),
(195, 'Faerie''s Finest', 'Gourmand', 'Chocolat ', '', '0', 0),
(196, 'Faerie''s Finest', 'Gourmand', 'Gingembre', '', '0', 0),
(197, 'Faerie''s Finest', 'Gourmand', 'Muscade', '', '0', 0),
(198, 'Faerie''s Finest', 'Gourmand', 'Noisette ', '', '0', 0),
(199, 'Faerie''s Finest', 'Gourmand', 'Noix de pecan', '', '0', 0),
(200, 'Faerie''s Finest', 'Gourmand', 'Pistache', '', '0', 0),
(201, 'Faerie''s Finest', 'Gourmand', 'Vanille française', '', '0', 0),
(234, 'Flavor West', 'Boisson', 'Amaretto', '', '0', 2),
(235, 'Flavor West', 'Boisson', 'Cola', '', '0', 2),
(236, 'Flavor West', 'Boisson', 'Limonade', '', '0', 2),
(237, 'Flavor West', 'Boisson', 'Marguarita', '', '0', 2),
(238, 'Flavor West', 'Boisson', 'Mojito', '', '0', 2),
(239, 'Flavor West', 'Boisson', 'Red Bull', '', '0', 2),
(240, 'Flavor West', 'Boisson', 'Vin Merlot', '', '0', 2),
(241, 'Flavor West', 'Boisson', 'Whisky', '', '0', 2),
(242, 'Flavor West', 'Floral', 'Gingembre', '', '0', 2),
(243, 'Flavor West', 'Floral', 'Lavande', '', '0', 2),
(244, 'Flavor West', 'Fruité', 'Abricot', '', '0', 2),
(245, 'Flavor West', 'Fruité', 'Ananas', '', '0', 2),
(246, 'Flavor West', 'Fruité', 'Banane', '', '0', 2),
(247, 'Flavor West', 'Fruité', 'Cassis', '', '0', 2),
(248, 'Flavor West', 'Fruité', 'Cerise Noire', '', '0', 2),
(249, 'Flavor West', 'Fruité', 'Figue', '', '0', 2),
(250, 'Flavor West', 'Fruité', 'Fraise', '', '0', 2),
(251, 'Flavor West', 'Fruité', 'Framboise', '', '0', 2),
(252, 'Flavor West', 'Fruité', 'Fruit de la Passion', '', '0', 2),
(253, 'Flavor West', 'Fruité', 'Goyave', '', '0', 2),
(254, 'Flavor West', 'Fruité', 'Kiwi', '', '0', 2),
(255, 'Flavor West', 'Fruité', 'Mangue', '', '0', 2),
(256, 'Flavor West', 'Fruité', 'Mure', '', '0', 2),
(257, 'Flavor West', 'Fruité', 'Noix de coco', '', '0', 2),
(258, 'Flavor West', 'Fruité', 'Orange', '', '0', 2),
(259, 'Flavor West', 'Fruité', 'Pamplemousse', '', '0', 2),
(260, 'Flavor West', 'Fruité', 'Pasteque', '', '0', 2),
(261, 'Flavor West', 'Fruité', 'Peche', '', '0', 2),
(262, 'Flavor West', 'Fruité', 'Poire', '', '0', 2),
(263, 'Flavor West', 'Fruité', 'Pomme', '', '0', 2),
(264, 'Flavor West', 'Fruité', 'Raisin', '', '0', 2),
(265, 'Flavor West', 'Gourmand', 'Bacon', '', '0', 2),
(266, 'Flavor West', 'Gourmand', 'Banana Split', '', '0', 2),
(267, 'Flavor West', 'Gourmand', 'Barbe à Papa', '', '0', 2),
(268, 'Flavor West', 'Gourmand', 'Bubblegum', '', '0', 2),
(269, 'Flavor West', 'Gourmand', 'Café', '', '0', 2),
(270, 'Flavor West', 'Gourmand', 'Chocolat Noir', '', '0', 2),
(271, 'Flavor West', 'Gourmand', 'Churros', '', '0', 2),
(272, 'Flavor West', 'Gourmand', 'Creme de Menthe', '', '0', 2),
(273, 'Flavor West', 'Gourmand', 'Gauffre', '', '0', 2),
(274, 'Flavor West', 'Gourmand', 'Marshmallow', '', '0', 2),
(275, 'Flavor West', 'Gourmand', 'Miel', '', '0', 2),
(276, 'Flavor West', 'Gourmand', 'Noisette', '', '0', 2),
(277, 'Flavor West', 'Gourmand', 'Pistache', '', '0', 2),
(278, 'Flavor West', 'Gourmand', 'Pop Corn', '', '0', 2),
(279, 'Flavor West', 'Gourmand', 'Réglisse Noir', '', '0', 2),
(280, 'Flavor West', 'Tabac', 'Ankara', '', '0', 2),
(281, 'Flavor West', 'Tabac', 'Latakia', '', '0', 2),
(282, 'Flavor West', 'Tabac', 'Usa Blend', '', '0', 2),
(283, 'Flavour Art', 'Additif', 'AAA Magic mask', 'réduire la sensation d''acidité', '0', 1),
(284, 'Flavour Art', 'Additif', 'Bitter Wizard ', 'permet atténuer le gout sucré de vos arômes', '0', 1),
(285, 'Flavour Art', 'Additif', 'MTS Vap Wizard', 'donne de la rondeur, de la douceur et permet également de réduire la perception de l''aigreur', '0', 1),
(286, 'Flavour Art', 'Boisson', 'Biere', '', '0', 1),
(287, 'Flavour Art', 'Boisson', 'Champagne', '', '0', 1),
(288, 'Flavour Art', 'Boisson', 'Cola', 'Le goût frais de la boisson', '0', 1),
(289, 'Flavour Art', 'Boisson', 'Gin', '', '0', 1),
(290, 'Flavour Art', 'Boisson', 'Jamaique Rhum', 'Un goût de rhum sans aucun doute ! à consommer sans modération, pour faire des punchs sympa', '0', 1),
(291, 'Flavour Art', 'Boisson', 'R Bull', 'Tout est dans le Nom', '0', 1),
(292, 'Flavour Art', 'Boisson', 'Thé Noir', '', '0', 1),
(293, 'Flavour Art', 'Boisson', 'Thé Vert', '', '0', 1),
(294, 'Flavour Art', 'Boisson', 'Whisky', 'Riche, savoureux, avec un soupçon de tourbe', '0', 1),
(295, 'Flavour Art', 'Divers', 'Hypnotic Myst', '', '0', 1),
(296, 'Flavour Art', 'Floral', 'Lavande', '', '0', 1),
(297, 'Flavour Art', 'Floral', 'Rose', '', '0', 1),
(298, 'Flavour Art', 'Floral', 'Viollette', '', '0', 1),
(299, 'Flavour Art', 'Floral', 'Zen Garden', '', '0', 1),
(300, 'Flavour Art', 'Fraicheur', 'Anis', 'La fraîcheur de l''anis, mais sans l''alcool', '0', 1),
(301, 'Flavour Art', 'Fraicheur', 'Menthe', 'La fraîcheur sans compromis, typique de la gomme à mâcher', '0', 1),
(302, 'Flavour Art', 'Fraicheur', 'Menthe Poivrée', '', '0', 1),
(303, 'Flavour Art', 'Fraicheur', 'Menthol Artic', 'Frais, glacé, glacial. Brrrr', '0', 1),
(304, 'Flavour Art', 'Fruité', 'Abricot', '', '0', 1),
(305, 'Flavour Art', 'Fruité', 'Ananas', 'Succulent, doux et délicieux', '0', 1),
(306, 'Flavour Art', 'Fruité', 'Banane', 'peu de gouttes pour une saveur de haute qualite', '0', 1),
(307, 'Flavour Art', 'Fruité', 'Bergamotte', 'Un agrume de luxe, un goût élégant, un must à essayer', '0', 1),
(308, 'Flavour Art', 'Fruité', 'Cassis', 'Fruité et intense', '0', 1),
(309, 'Flavour Art', 'Fruité', 'Cerise', 'ressemble au bonbon krema', '0', 1),
(310, 'Flavour Art', 'Fruité', 'Cerise Noire', 'Saveur intense, juteuse et de longue durée', '0', 1),
(311, 'Flavour Art', 'Fruité', 'Citron Mix', '', '0', 1),
(312, 'Flavour Art', 'Fruité', 'Figue', 'Frais, fruité.L''été à portée de main', '0', 1),
(313, 'Flavour Art', 'Fruité', 'Fraise', 'Juteuse, sucrée. La reine.', '0', 1),
(314, 'Flavour Art', 'Fruité', 'Framboise', 'Tout simplement délicieux', '0', 1),
(315, 'Flavour Art', 'Fruité', 'Fruit de la Passion', 'Intense, puissant et fruité.', '0', 1),
(316, 'Flavour Art', 'Fruité', 'Goyave', 'Vous voulez une saveur qui allie la fraîcheur des agrumes à un fond de la banane. Exotique', '0', 1),
(317, 'Flavour Art', 'Fruité', 'Grenade', 'Un goût curieux et unique', '0', 1),
(318, 'Flavour Art', 'Fruité', 'Kiwi', 'Très bon arôme , très parfumé . Je le recommande grandement', '0', 1),
(319, 'Flavour Art', 'Fruité', 'Lychee', '', '0', 1),
(320, 'Flavour Art', 'Fruité', 'Mandarine', '', '0', 1),
(321, 'Flavour Art', 'Fruité', 'Mangue', 'Le goût de vacances sous les tropiques', '0', 1),
(322, 'Flavour Art', 'Fruité', 'Mélange de fruit rouge', 'Tous les fruits ensemble pour beaucoup de goût', '0', 1),
(323, 'Flavour Art', 'Fruité', 'Melon', 'Le goût de l''été, même en hiver', '0', 1),
(324, 'Flavour Art', 'Fruité', 'Mure', 'parfum de mûre bien présent mais arrière goût assez désagréable...bien laisser décanter', '0', 1),
(325, 'Flavour Art', 'Fruité', 'Myrtille', 'Sucrée et acidulée, Un goût merveilleux', '0', 1),
(326, 'Flavour Art', 'Fruité', 'Noix de coco', 'Le goût sucré de vacances tropicales', '0', 1),
(327, 'Flavour Art', 'Fruité', 'Orange', 'Un bon gout de liqueurs, bonbons. Une saveur à l''ancienne', '0', 1),
(328, 'Flavour Art', 'Fruité', 'Papaye', 'Un voyage exotique', '0', 1),
(329, 'Flavour Art', 'Fruité', 'Pasteque', 'Frais et juteux', '0', 1),
(330, 'Flavour Art', 'Fruité', 'Peche', 'Sucrée et juteuse', '0', 1),
(331, 'Flavour Art', 'Fruité', 'Poire', 'Juteux et délicieux', '0', 1),
(332, 'Flavour Art', 'Fruité', 'Pomme', 'La pomme par excellence', '0', 1),
(333, 'Flavour Art', 'Fruité', 'Raisin', 'Délicat, Unique et doux', '0', 1),
(334, 'Flavour Art', 'Gourmand', 'Cacao', 'Le roi incontesté, intenses, profondes et délicieusement irrésistible', '0', 1),
(335, 'Flavour Art', 'Gourmand', 'Café Expresso', 'Intense, vivifiant', '0', 1),
(336, 'Flavour Art', 'Gourmand', 'Cannelle', '', '0', 1),
(337, 'Flavour Art', 'Gourmand', 'Cappuccino', 'Tout le plaisir d''un bon café Italien ! Doté d''un Arôme fidèle, il est parfait pour la petite séance de vapotage matinale', '0', 1),
(338, 'Flavour Art', 'Gourmand', 'Caramel', '', '0', 1),
(339, 'Flavour Art', 'Gourmand', 'Chocolat', 'Pure passion', '0', 1),
(340, 'Flavour Art', 'Gourmand', 'Cookie', 'Un vrai délice !', '0', 1),
(341, 'Flavour Art', 'Gourmand', 'Creme de Vienne', '', '0', 1),
(342, 'Flavour Art', 'Gourmand', 'Creme Fouettée', 'Recommandé pour les combinant avec d''autres saveurs', '0', 1),
(343, 'Flavour Art', 'Gourmand', 'Croissant', '', '0', 1),
(344, 'Flavour Art', 'Gourmand', 'Miel', 'Ce miel à la saveur puissante est un grand séducteur du palais et son riche parfum tout empreint de soleil du Sud est fabuleux', '0', 1),
(345, 'Flavour Art', 'Gourmand', 'Noisette', 'Très agréable en dessert le soir', '0', 1),
(346, 'Flavour Art', 'Gourmand', 'Nougat', '', '0', 1),
(347, 'Flavour Art', 'Gourmand', 'Panettone', '', '0', 1),
(348, 'Flavour Art', 'Gourmand', 'Pistache', '', '0', 1),
(349, 'Flavour Art', 'Gourmand', 'Réglisse ', 'Un classique indémodable', '0', 1),
(350, 'Flavour Art', 'Gourmand', 'Sirop d''érable', '', '0', 1),
(351, 'Flavour Art', 'Gourmand', 'Tarte au Pomme', '', '0', 1),
(352, 'Flavour Art', 'Gourmand', 'Tiramisu', 'très bon', '0', 1),
(353, 'Flavour Art', 'Gourmand', 'Torrone', '', '0', 1),
(354, 'Flavour Art', 'Gourmand', 'Tutti Frutti', '', '0', 1),
(355, 'Flavour Art', 'Gourmand', 'Vanille', 'Vous permet d''ajouter une touche personnelle à tous vos arôme sucré', '0', 1),
(356, 'Flavour Art', 'Tabac', '7 Leaves Ultimate', 'offre une belle note sèche et radieuse, avec une légère note de feuilles sèches, nuances boisées et une touche épicée', '0', 1),
(357, 'Flavour Art', 'Tabac', 'Black Fire', 'goût de fumer, peu être de bois', '0', 1),
(358, 'Flavour Art', 'Tabac', 'Burley', 'Riche et onctueux, avec des nuances florales délicates', '0', 1),
(359, 'Flavour Art', 'Tabac', 'Camtel Ultimate', '', '0', 1),
(360, 'Flavour Art', 'Tabac', 'Cowboy', 'Léger, sec avec un soupçon de miel', '0', 1),
(361, 'Flavour Art', 'Tabac', 'Cuba Supreme', 'Arôme plutôt fruité, légèrement acidulé et un peu sucré', '0', 1),
(362, 'Flavour Art', 'Tabac', 'Dark Vapure', 'ressemble à un goût de tabac brun, durable et forte avec des nuances de cacao torréfiées', '0', 1),
(363, 'Flavour Art', 'Tabac', 'Desert Ship', 'tabac turc, avec une douceur fruitée', '0', 1),
(364, 'Flavour Art', 'Tabac', 'Latakia', 'Un goût profond qui vous prend sur la prairie sauvage, en appréciant une tasse chaude de café à côté d''un feu de camp', '0', 1),
(365, 'Flavour Art', 'Tabac', 'Maxx Blend', 'Riche, aromatique, légèrement épicé', '0', 1),
(366, 'Flavour Art', 'Tabac', 'Mellow Sunset', 'Léger et doux Ce goût est un plus mûre que Dark Vapure, avec un goût doux et une légère nuance de réglisse', '0', 1),
(367, 'Flavour Art', 'Tabac', 'Oba Oba', 'Lâchez l''enfant à l''intérieur de vous', '0', 1),
(368, 'Flavour Art', 'Tabac', 'Oryental 4', 'Un mélange agréable et délicate pour vapers exigeants', '0', 1),
(369, 'Flavour Art', 'Tabac', 'Ozone', 'délicieux à savourer tout au long de la journée sans se lasser', '0', 1),
(370, 'Flavour Art', 'Tabac', 'Perique Black', 'Le plus fort et probablement le plus semblable à la fumée de cigarette réelle', '0', 1),
(371, 'Flavour Art', 'Tabac', 'Reggae Night', 'Tabac vraiment délicieux, à mélanger avec fruit ou de la menthe', '0', 1),
(372, 'Flavour Art', 'Tabac', 'Royal', '', '0', 1),
(373, 'Flavour Art', 'Tabac', 'Ry 4', '', '0', 1),
(374, 'Flavour Art', 'Tabac', 'Shade', 'Elégant avec un goût très distinct et durable', '0', 1),
(375, 'Flavour Art', 'Tabac', 'Virginia', 'Doux, léger et aromatique. A essayer absolument pour tous les amateurs de tabac', '0', 1),
(430, 'Health Cabin Flavour', 'Boisson', 'Amaretto', '', '0', 0),
(431, 'Health Cabin Flavour', 'Boisson', 'Brandy', '', '0', 0),
(432, 'Health Cabin Flavour', 'Boisson', 'Champagne', '', '0', 0),
(433, 'Health Cabin Flavour', 'Boisson', 'Cola', '', '0', 0),
(434, 'Health Cabin Flavour', 'Boisson', 'Jamaique Rhum', '', '0', 0),
(435, 'Health Cabin Flavour', 'Boisson', 'Pina Colada', '', '0', 0),
(436, 'Health Cabin Flavour', 'Boisson', 'Vodka', '', '0', 0),
(437, 'Health Cabin Flavour', 'Boisson', 'Whisky', '', '0', 0),
(438, 'Health Cabin Flavour', 'Floral', 'Rose', '', '0', 0),
(439, 'Health Cabin Flavour', 'Fraicheur', 'Menthe', '', '0', 0),
(440, 'Health Cabin Flavour', 'Fruité', 'Banane', '', '0', 0),
(441, 'Health Cabin Flavour', 'Fruité', 'Cerise', '', '0', 0),
(442, 'Health Cabin Flavour', 'Fruité', 'Fraise', '', '0', 0),
(443, 'Health Cabin Flavour', 'Fruité', 'Framboise', '', '0', 0),
(444, 'Health Cabin Flavour', 'Fruité', 'Fruit de la Passion', '', '0', 0),
(445, 'Health Cabin Flavour', 'Fruité', 'Kiwi', '', '0', 0),
(446, 'Health Cabin Flavour', 'Fruité', 'Lychee', '', '0', 0),
(447, 'Health Cabin Flavour', 'Fruité', 'Mangue', '', '0', 0),
(448, 'Health Cabin Flavour', 'Fruité', 'Melon', '', '0', 0),
(449, 'Health Cabin Flavour', 'Fruité', 'Noix de Coco', '', '0', 0),
(450, 'Health Cabin Flavour', 'Fruité', 'Orange', '', '0', 0),
(451, 'Health Cabin Flavour', 'Fruité', 'Papaye', '', '0', 0),
(452, 'Health Cabin Flavour', 'Fruité', 'Poire', '', '0', 0),
(453, 'Health Cabin Flavour', 'Fruité', 'Pomme Verte', '', '0', 0),
(454, 'Health Cabin Flavour', 'Fruité', 'Raisin', '', '0', 0),
(455, 'Health Cabin Flavour', 'Gourmand', 'Barbe à Papa', '', '0', 0),
(456, 'Health Cabin Flavour', 'Gourmand', 'Bubblegum', '', '0', 0),
(457, 'Health Cabin Flavour', 'Gourmand', 'Café', '', '0', 0),
(458, 'Health Cabin Flavour', 'Gourmand', 'Cappuccino', '', '0', 0),
(459, 'Health Cabin Flavour', 'Gourmand', 'Caramel', '', '0', 0),
(460, 'Health Cabin Flavour', 'Gourmand', 'Carotte', '', '0', 0),
(461, 'Health Cabin Flavour', 'Gourmand', 'Céréal', '', '0', 0),
(462, 'Health Cabin Flavour', 'Gourmand', 'Chocolat au lait', '', '0', 0),
(463, 'Health Cabin Flavour', 'Gourmand', 'Chocolat Blanc', '', '0', 0),
(464, 'Health Cabin Flavour', 'Gourmand', 'Chocolat Noir', '', '0', 0),
(465, 'Health Cabin Flavour', 'Gourmand', 'Concombre', '', '0', 0),
(466, 'Health Cabin Flavour', 'Gourmand', 'Lait', '', '0', 0),
(467, 'Health Cabin Flavour', 'Gourmand', 'Miel', '', '0', 0),
(468, 'Health Cabin Flavour', 'Gourmand', 'Mocha', '', '0', 0),
(469, 'Health Cabin Flavour', 'Gourmand', 'Noisette', '', '0', 0),
(470, 'Health Cabin Flavour', 'Gourmand', 'Noix ', '', '0', 0),
(471, 'Health Cabin Flavour', 'Gourmand', 'Olive', '', '0', 0),
(472, 'Health Cabin Flavour', 'Gourmand', 'Red Bull', '', '0', 0),
(473, 'Health Cabin Flavour', 'Gourmand', 'Soda', '', '0', 0),
(474, 'Health Cabin Flavour', 'Gourmand', 'Thé Vert', '', '0', 0),
(475, 'Health Cabin Flavour', 'Gourmand', 'Tomate', '', '0', 0),
(476, 'Health Cabin Flavour', 'Gourmand', 'Vanille', '', '0', 0),
(477, 'Health Cabin Flavour', 'Tabac', '555', '', '0', 0),
(478, 'Health Cabin Flavour', 'Tabac', 'Camel', '', '0', 0),
(479, 'Health Cabin Flavour', 'Tabac', 'Hilton', '', '0', 0),
(480, 'Health Cabin Flavour', 'Tabac', 'Ry 4', '', '0', 0),
(481, 'Inawera', 'Additif', 'Bitter Wizard ', 'permet atténuer le gout sucré de vos arômes', '0', 1),
(482, 'Inawera', 'Boisson', 'Biere', '', '0', 1),
(483, 'Inawera', 'Boisson', 'Brandy', '', '0', 1),
(484, 'Inawera', 'Boisson', 'Café', '', '0', 1),
(485, 'Inawera', 'Boisson', 'Cappuccino', 'Tout le plaisir d''un bon café Italien !', '0', 1),
(486, 'Inawera', 'Boisson', 'Cerise Liqueur', '', '0', 1),
(487, 'Inawera', 'Boisson', 'Champagne', '', '0', 1),
(488, 'Inawera', 'Boisson', 'Cola', 'Le goût frais de la boisson', '0', 1),
(489, 'Inawera', 'Boisson', 'Jamaique Rhum', 'Un goût de rhum sans aucun doute ! à consommer sans modération, pour faire des punchs sympa', '0', 1),
(490, 'Inawera', 'Boisson', 'Pinacolada', '', '0', 1),
(491, 'Inawera', 'Boisson', 'Plum Vodka', '', '0', 1),
(492, 'Inawera', 'Boisson', 'Rhum', '', '0', 1),
(493, 'Inawera', 'Boisson', 'Thé Noir', '', '0', 1),
(494, 'Inawera', 'Boisson', 'Thé Vert', '', '0', 1),
(495, 'Inawera', 'Boisson', 'Whisky', '', '0', 1),
(496, 'Inawera', 'Floral', 'Rose', '', '0', 1),
(497, 'Inawera', 'Floral', 'Ylang Ylang', '', '0', 1),
(498, 'Inawera', 'Fraicheur', 'Anis', 'La fraîcheur de l''anis, mais sans l''alcool', '0', 1),
(499, 'Inawera', 'Fraicheur', 'Cool Mint', '', '0', 1),
(500, 'Inawera', 'Fraicheur', 'Eucalyptus Mint', '', '0', 1),
(501, 'Inawera', 'Fraicheur', 'Menthe', '', '0', 1),
(502, 'Inawera', 'Fraicheur', 'Menthe', '', '0', 1),
(503, 'Inawera', 'Fraicheur', 'Mix Mint', '', '0', 1),
(504, 'Inawera', 'Fruité', 'Abricot', '', '0', 1),
(505, 'Inawera', 'Fruité', 'Ananas', 'Succulent, doux et délicieux', '0', 1),
(506, 'Inawera', 'Fruité', 'Banane', '', '0', 1),
(507, 'Inawera', 'Fruité', 'Cerise', '', '0', 1),
(508, 'Inawera', 'Fruité', 'Citron', '', '0', 1),
(509, 'Inawera', 'Fruité', 'Exotic Roots', '', '0', 1),
(510, 'Inawera', 'Fruité', 'Fraise', 'Juteuse, sucrée', '0', 1),
(511, 'Inawera', 'Fruité', 'Fraise Sauvage', '', '0', 1),
(512, 'Inawera', 'Fruité', 'Framboise', 'Tout simplement délicieux', '0', 1),
(513, 'Inawera', 'Fruité', 'Fruits Exotique', '', '0', 1),
(514, 'Inawera', 'Fruité', 'Melon', '', '0', 1),
(515, 'Inawera', 'Fruité', 'Noix', '', '0', 1),
(516, 'Inawera', 'Fruité', 'Noix de coco', '', '0', 1),
(517, 'Inawera', 'Fruité', 'Orange', '', '0', 1),
(518, 'Inawera', 'Fruité', 'Peche', '', '0', 1),
(519, 'Inawera', 'Fruité', 'Poire', '', '0', 1),
(520, 'Inawera', 'Fruité', 'Pomme', '', '0', 1),
(521, 'Inawera', 'Fruité', 'Raisin', '', '0', 1),
(522, 'Inawera', 'Gourmand', 'Cacahuète', '', '0', 1),
(523, 'Inawera', 'Gourmand', 'Chocolat', '', '0', 1),
(524, 'Inawera', 'Gourmand', 'Chocolat au Lait', '', '0', 1),
(525, 'Inawera', 'Gourmand', 'Miel', '', '0', 1),
(526, 'Inawera', 'Gourmand', 'Noisette', '', '0', 1),
(527, 'Inawera', 'Gourmand', 'Nougat', '', '0', 1),
(528, 'Inawera', 'Gourmand', 'Prune', '', '0', 1),
(529, 'Inawera', 'Gourmand', 'Pruneaux', '', '0', 1),
(530, 'Inawera', 'Gourmand', 'Sesame', '', '0', 1),
(531, 'Inawera', 'Gourmand', 'Tiramisu', '', '0', 1),
(532, 'Inawera', 'Gourmand', 'Vanille', 'Vous permet d''ajouter une touche personnelle à tous vos arôme sucré', '0', 1),
(533, 'Inawera', 'Gourmand', 'Vanille Bourbon', '', '0', 1),
(534, 'Inawera', 'Tabac', '7 Leaves Ultimate', '', '0', 1),
(535, 'Inawera', 'Tabac', 'Burley It', 'Riche et onctueux, avec des nuances florales délicates', '0', 1),
(536, 'Inawera', 'Tabac', 'Cowboy Blend', 'Léger, sec avec un soupçon de miel', '0', 1),
(537, 'Inawera', 'Tabac', 'Cuba Supreme', 'Arôme plutôt fruité, légèrement acidulé et un peu sucré', '0', 1),
(538, 'Inawera', 'Tabac', 'Dark Vapure', 'ressemble à un goût de tabac brun, durable et forte avec des nuances de cacao torréfiées', '0', 1),
(539, 'Inawera', 'Tabac', 'Desert Voyager', 'tabac brun sec , puissant', '0', 1),
(540, 'Inawera', 'Tabac', 'Falcon Eye', 'saveur très discrète de tabac blond', '0', 1),
(541, 'Inawera', 'Tabac', 'Gipsy King', '', '0', 1),
(542, 'Inawera', 'Tabac', 'Kent', '', '0', 1),
(543, 'Inawera', 'Tabac', 'Latakia', '', '0', 1),
(544, 'Inawera', 'Tabac', 'Mellow Sunset', '', '0', 1),
(545, 'Inawera', 'Tabac', 'Old Havana', '', '0', 1),
(546, 'Inawera', 'Tabac', 'Perique Black', '', '0', 1),
(547, 'Inawera', 'Tabac', 'Space Drop ', '', '0', 1),
(548, 'Inawera', 'Tabac', 'Symphony', '', '0', 1),
(549, 'Inawera', 'Tabac', 'Turkish', '', '0', 1),
(550, 'Inawera', 'Tabac', 'Tuscan Garden', 'tabac brun , une touche de réglisse', '0', 1),
(551, 'Inawera', 'Tabac', 'Western Blend', '', '0', 1),
(579, 'Seedman', 'Boisson', 'Cola', '', '0', 0),
(580, 'Seedman', 'Boisson', 'Limonade', '', '0', 0),
(581, 'Seedman', 'Boisson', 'Pina Colada', '', '0', 0),
(582, 'Seedman', 'Boisson', 'Punch Tropical', '', '0', 0),
(583, 'Seedman', 'Fraicheur', 'Menthe Eucalyptus', '', '0', 0),
(584, 'Seedman', 'Fraicheur', 'Menthe Poivrée', '', '0', 0),
(585, 'Seedman', 'Fraicheur', 'Menthe Verte', '', '0', 0),
(586, 'Seedman', 'Fruité', 'Abricot', '', '0', 0),
(587, 'Seedman', 'Fruité', 'Ananas', '', '0', 0),
(588, 'Seedman', 'Fruité', 'Fraise', '', '0', 0),
(589, 'Seedman', 'Fruité', 'Framboise', '', '0', 0),
(590, 'Seedman', 'Fruité', 'Goyave ', '', '0', 0),
(591, 'Seedman', 'Fruité', 'Melon', '', '0', 0),
(592, 'Seedman', 'Fruité', 'Orange', '', '0', 0),
(593, 'Seedman', 'Fruité', 'Pasteque', '', '0', 0),
(594, 'Seedman', 'Fruité', 'Peche', '', '0', 0),
(595, 'Seedman', 'Fruité', 'Poire', '', '0', 0),
(596, 'Seedman', 'Fruité', 'Raisin', '', '0', 0),
(597, 'Seedman', 'Fruité', 'Tutti Frutti', '', '0', 0),
(598, 'Seedman', 'Gourmand', 'Barbe à Papa', '', '0', 0),
(599, 'Seedman', 'Gourmand', 'Beurre d''arachide', '', '0', 0),
(600, 'Seedman', 'Gourmand', 'Bubblegum', '', '0', 0),
(601, 'Seedman', 'Gourmand', 'Café', '', '0', 0),
(602, 'Seedman', 'Gourmand', 'Cannelle', '', '0', 0),
(603, 'Seedman', 'Gourmand', 'Caramel', '', '0', 0),
(604, 'Seedman', 'Gourmand', 'Champignon', '', '0', 0),
(605, 'Seedman', 'Gourmand', 'Cheesecake', '', '0', 0),
(606, 'Seedman', 'Gourmand', 'Chocolat Noir', '', '0', 0),
(607, 'Seedman', 'Gourmand', 'Creme Bavaroise', '', '0', 0),
(608, 'Seedman', 'Gourmand', 'Creme de Menthe', '', '0', 0),
(609, 'Seedman', 'Gourmand', 'Guimauve', '', '0', 0),
(610, 'Seedman', 'Gourmand', 'Lait de Poule', '', '0', 0),
(611, 'Seedman', 'Gourmand', 'Miel', '', '0', 0),
(612, 'Seedman', 'Gourmand', 'Muscade', '', '0', 0),
(613, 'Seedman', 'Gourmand', 'Pistache', '', '0', 0),
(614, 'Seedman', 'Gourmand', 'Potiron', '', '0', 0),
(615, 'Seedman', 'Gourmand', 'Réglisse', '', '0', 0),
(616, 'Signature Flavors', 'Additif', 'Koolada', 'faite avec le lactate de méthyle menthyle', '0', 1),
(617, 'Signature Flavors', 'Additif', 'Sweetener', '', '0', 1),
(618, 'Signature Flavors', 'Boisson', 'Absinthe', 'modelé sur l''original fée vert, liqueur populaire à Paris', '0', 1),
(619, 'Signature Flavors', 'Boisson', 'Brandy', '', '0', 1),
(620, 'Signature Flavors', 'Boisson', 'Cola', 'modelé sur le gout populaire', '0', 1),
(621, 'Signature Flavors', 'Boisson', 'Jamaique Rhum', '', '0', 1),
(622, 'Signature Flavors', 'Boisson', 'Max Drew', 'Saveur qui ressemble à une boisson populaire', '0', 1),
(623, 'Signature Flavors', 'Boisson', 'Raisin Jus', '', '0', 1),
(624, 'Signature Flavors', 'Boisson', 'Rex Energy Drink', 'Conçu d''apres une boisson energétique populaire', '0', 1),
(625, 'Signature Flavors', 'Boisson', 'Thé Vert', '', '0', 1),
(626, 'Signature Flavors', 'Boisson', 'Vanille Bourbon', 'Riche et sombre', '0', 1),
(627, 'Signature Flavors', 'Divers', 'Marie Jeanne', 'Saveur de la plante du cannabis', '0', 1),
(628, 'Signature Flavors', 'Floral', 'Chevrefeuille', 'Tout comme le nectar de la fleur', '0', 1),
(629, 'Signature Flavors', 'Floral', 'History Smoke', 'une saveur tout-naturel qui est très utile dans les mélanges de bricolage', '0', 1),
(630, 'Signature Flavors', 'Fraicheur', 'HPNO', 'Mélange d''agrumes et de pamplemousse avec une touche de tropiques', '0', 1),
(631, 'Signature Flavors', 'Fraicheur', 'Menthe', '', '0', 1),
(632, 'Signature Flavors', 'Fruité', 'Banane Mure', '', '0', 1),
(633, 'Signature Flavors', 'Fruité', 'Cerise Noire', 'fraiche', '0', 1),
(634, 'Signature Flavors', 'Fruité', 'Cherry Blossom', 'Vape élégante avec des notes de cerise et le goût rafraîchissant', '0', 1),
(635, 'Signature Flavors', 'Fruité', 'Citron', '', '0', 1),
(636, 'Signature Flavors', 'Fruité', 'Fraise', '', '0', 1),
(637, 'Signature Flavors', 'Fruité', 'Framboise', '', '0', 1),
(638, 'Signature Flavors', 'Fruité', 'Horehound', 'a un goût semblable au menthol', '0', 1),
(639, 'Signature Flavors', 'Fruité', 'Kiwi Double', 'Une saveur réaliste', '0', 1),
(640, 'Signature Flavors', 'Fruité', 'Lychee', 'Croquant et délicieux', '0', 1),
(641, 'Signature Flavors', 'Fruité', 'Mangue', '', '0', 1),
(642, 'Signature Flavors', 'Fruité', 'Melon Cantaloupe', '', '0', 1),
(643, 'Signature Flavors', 'Fruité', 'Papaye', '', '0', 1),
(644, 'Signature Flavors', 'Fruité', 'Pasteque', '', '0', 1),
(645, 'Signature Flavors', 'Fruité', 'Peche', '', '0', 1),
(646, 'Signature Flavors', 'Fruité', 'Poire', '', '0', 1),
(647, 'Signature Flavors', 'Fruité', 'Pomme', 'doux', '0', 1),
(648, 'Signature Flavors', 'Fruité', 'Pomme Candy', 'le goût de votre pomme préférée aromatisé bonbons durs, sous forme de vapeur!', '0', 1),
(649, 'Signature Flavors', 'Fruité', 'Prune', '', '0', 1),
(650, 'Signature Flavors', 'Fruité', 'Raisin', '', '0', 1),
(651, 'Signature Flavors', 'Fruité', 'Tutti Frutti', '', '0', 1),
(652, 'Signature Flavors', 'Gourmand', 'Amande Amaretto', '', '0', 1),
(653, 'Signature Flavors', 'Gourmand', 'Banana Nut Bread', 'La saveur de la banane mélangée avec une saveur de noisette et cuit à la perfection.', '0', 1),
(654, 'Signature Flavors', 'Gourmand', 'Blueberry Candy', 'saveur de bonbon bleuet qui est sûr d''être un succès pour tous les types de bricolage', '0', 1),
(655, 'Signature Flavors', 'Gourmand', 'Bouilloire', '', '0', 1),
(656, 'Signature Flavors', 'Gourmand', 'Bubblegum', '', '0', 1),
(657, 'Signature Flavors', 'Gourmand', 'Butter', 'un peu de beurre dans votre recette préférée, ou versez le goût riche plus pop-corn', '0', 1),
(658, 'Signature Flavors', 'Gourmand', 'Butterscotch', 'un goût sorte de vieux bonbons caramel façonné!', '0', 1),
(659, 'Signature Flavors', 'Gourmand', 'Café', 'à base de café, infusé réel', '0', 1),
(660, 'Signature Flavors', 'Gourmand', 'Cappuccino', '', '0', 1),
(661, 'Signature Flavors', 'Gourmand', 'Caramel Cappuccino', '', '0', 1),
(662, 'Signature Flavors', 'Gourmand', 'Caramel Original', 'Version originale, plus sombre saveur de caramel', '0', 1),
(663, 'Signature Flavors', 'Gourmand', 'Cheesecake', 'saveur fromage', '0', 1),
(664, 'Signature Flavors', 'Gourmand', 'Chocolat', '', '0', 1),
(665, 'Signature Flavors', 'Gourmand', 'Chocolat Blanc', '', '0', 1),
(666, 'Signature Flavors', 'Gourmand', 'Coconut Candy', 'goût de votre saveur préférée de noix de coco comme des friandises célèbres!', '0', 1),
(667, 'Signature Flavors', 'Gourmand', 'English Toffe', '', '0', 1),
(668, 'Signature Flavors', 'Gourmand', 'Gauffre', '', '0', 1),
(669, 'Signature Flavors', 'Gourmand', 'Marshmallow', '', '0', 1),
(670, 'Signature Flavors', 'Gourmand', 'Miel', '', '0', 1),
(671, 'Signature Flavors', 'Gourmand', 'Mocha', '', '0', 1),
(672, 'Signature Flavors', 'Gourmand', 'Pain d''épice', '', '0', 1),
(673, 'Signature Flavors', 'Gourmand', 'Pop Corn', 'Le gout nature', '0', 1),
(674, 'Signature Flavors', 'Gourmand', 'Sirop d''érable', '', '0', 1),
(675, 'Signature Flavors', 'Gourmand', 'Sucre Roux ', '', '0', 1),
(676, 'Signature Flavors', 'Gourmand', 'Sweetangy', 'correction aigre doux aux aromes bonbons', '0', 1),
(677, 'Signature Flavors', 'Gourmand', 'Tarte au Pomme', 'le goût de votre un favori tout-Américain!', '0', 1),
(678, 'Signature Flavors', 'Tabac', 'Black Honey Tobacco', 'vous attire avec une saveur douce et complexe', '0', 1),
(679, 'Signature Flavors', 'Tabac', 'MlB Type', 'Saveur de Noix', '0', 1),
(680, 'Signature Flavors', 'Tabac', 'Ry 4 Asian', 'un fort mélange de saveurs de caramel plus que d''origine', '0', 1),
(681, 'Signature Flavors', 'Tabac', 'Ry 4 Double', '', '0', 1),
(682, 'Signature Flavors', 'Tabac', 'Smooth', 'gout de tabac fumé', '0', 1),
(683, 'Tasty Puff Flavors', 'Fruité', 'Banane Electrique', '', '0', 0),
(684, 'Tasty Puff Flavors', 'Fruité', 'Blueberry', '', '0', 0),
(685, 'Tasty Puff Flavors', 'Fruité', 'Fraise ', '', '0', 0),
(686, 'Tasty Puff Flavors', 'Fruité', 'Melon', '', '0', 0),
(687, 'Tasty Puff Flavors', 'Fruité', 'Pomme', '', '0', 0),
(688, 'Tasty Puff Flavors', 'Gourmand', 'Barbe à Papa', '', '0', 0),
(689, 'Tasty Puff Flavors', 'Gourmand', 'Chocolat Chumpy', '', '0', 0),
(690, 'Tasty Puff Flavors', 'Gourmand', 'Nilly Vanille', '', '0', 0),
(691, 'Tasty Puff Flavors', '', 'Jungle Juice', '', '0', 0),
(692, 'Tasty Puff Flavors', '', 'Spice Minuit', '', '0', 0),
(693, 'The Perfumer''s Apprentice', 'Additif', 'Koolada', 'Sensation de fraicheur', '0', 3),
(694, 'The Perfumer''s Apprentice', 'Additif', 'Sweetener', 'pour sucrer vos arômes', '0', 3),
(695, 'The Perfumer''s Apprentice', 'Boisson', 'Absinthe', 'C''est un magnifique mélange de notes d''anis qui ressemble de près à la '''' liqueur Verte originale de Fées de Paris depuis longtemps', '0', 3),
(696, 'The Perfumer''s Apprentice', 'Boisson', 'Biere', 'Cette bière de racine a besoin du traitement spécial pour révéler le meilleur goût. Il doit vieillir au moins une semaine après que vous le mélangez avec votre mélange! Nous n''avons pas presque poursuivi ce goût parce qu''il a vraiment un goût désagréable', '0', 3),
(697, 'The Perfumer''s Apprentice', 'Boisson', 'Champagne', 'brillant et pétillant! c''est un bon mixeur, pas un fort goût tout seul, mais un essai se combinant avec le goût d''agrume', '0', 3),
(698, 'The Perfumer''s Apprentice', 'Boisson', 'Cola', 'c''est un très vrai goût de sirop de cola', '0', 3),
(699, 'The Perfumer''s Apprentice', 'Boisson', 'HPNO', 'une saveur d''agrumes et de pamplemousse avec un soupçon de jus tropicaux', '0', 3),
(700, 'The Perfumer''s Apprentice', 'Boisson', 'Thé Earl Grey', 'ce goût a une Bergamote prononcée qui fait le Earl Grey Tea si distinctif et ce goût est vrai pour le Thé', '0', 3),
(701, 'The Perfumer''s Apprentice', 'Divers', 'Marie Jeanne', '', '0', 3),
(702, 'The Perfumer''s Apprentice', 'Fruité', 'Ananas', 'le goût du fruit exotique plus connue pour sa saveur acide et rafraîchissante', '0', 3),
(703, 'The Perfumer''s Apprentice', 'Fruité', 'Banane Mure', 'Un très bon gout pour les amateurs de banane', '0', 3),
(704, 'The Perfumer''s Apprentice', 'Fruité', 'Cerise', '', '0', 3),
(705, 'The Perfumer''s Apprentice', 'Fruité', 'Cerise Noire', 'Rappelle le bonbon krema. Tenace dans les atos', '0', 3),
(706, 'The Perfumer''s Apprentice', 'Fruité', 'Citron', '', '0', 3),
(707, 'The Perfumer''s Apprentice', 'Fruité', 'Dragon Rouge', 'C''est un goût fruité moelleux avec les accents tropicaux', '0', 3),
(708, 'The Perfumer''s Apprentice', 'Fruité', 'Fraise', 'La saveur fraîche et naturel de fraise', '0', 3),
(709, 'The Perfumer''s Apprentice', 'Fruité', 'Framboise', 'Tout simplement délicieux', '0', 3),
(710, 'The Perfumer''s Apprentice', 'Fruité', 'Grenade', 'un goût doux et acide très rafraîchissant', '0', 3),
(711, 'The Perfumer''s Apprentice', 'Fruité', 'Kiwi', 'C''est un kiwi très réaliste, mais ce n''est pas un fort goût', '0', 3),
(712, 'The Perfumer''s Apprentice', 'Fruité', 'Lime', '', '0', 3),
(713, 'The Perfumer''s Apprentice', 'Fruité', 'Mangue', 'mangue tasting fraîche, naturelle', '0', 3),
(714, 'The Perfumer''s Apprentice', 'Fruité', 'Melon Cantaloupe', 'c''est un cantaloup tasting naturel de force moyenne', '0', 3),
(715, 'The Perfumer''s Apprentice', 'Fruité', 'Noix de coco', 'un peu déçu, + un gout de Malibu', '0', 3),
(716, 'The Perfumer''s Apprentice', 'Fruité', 'Peche', '', '0', 3),
(717, 'The Perfumer''s Apprentice', 'Fruité', 'Poire', '', '0', 3),
(718, 'The Perfumer''s Apprentice', 'Fruité', 'Pomme', 'Arôme bien restitué', '0', 3),
(719, 'The Perfumer''s Apprentice', 'Fruité', 'Pomme Grany Smith', '', '0', 3),
(720, 'The Perfumer''s Apprentice', 'Fruité', 'Prune', 'le goût de fruit mûr - j''ai fait dire des clients il est comme le Dr Pepper', '0', 3),
(721, 'The Perfumer''s Apprentice', 'Fruité', 'Tutti Frutti', 'mélange fruité rafraîchissant', '0', 3),
(722, 'The Perfumer''s Apprentice', 'Gourmand', 'Amande', '', '0', 3),
(723, 'The Perfumer''s Apprentice', 'Gourmand', 'Amande Amaretto', '', '0', 3),
(724, 'The Perfumer''s Apprentice', 'Gourmand', 'Barbe à Papa', 'Arôme sympathique, acidulé et sucré, seul ou assemblé c''est une valeur sûre', '0', 3),
(725, 'The Perfumer''s Apprentice', 'Gourmand', 'Barbe à Papa', '', '0', 3),
(726, 'The Perfumer''s Apprentice', 'Gourmand', 'Beurre d''arachide', '', '0', 3),
(727, 'The Perfumer''s Apprentice', 'Gourmand', 'Bonbon à la Pomme', '', '0', 3),
(728, 'The Perfumer''s Apprentice', 'Gourmand', 'Bonbon au Caramel', 'Ce goût ressemble plus à Werthers le bonbon dur que notre autre caramel. C''est doux avec un goût bizarre-crémeux', '0', 3),
(729, 'The Perfumer''s Apprentice', 'Gourmand', 'Bubblegum', 'un goût bubblegum très agréable', '0', 3),
(730, 'The Perfumer''s Apprentice', 'Gourmand', 'Cannelle Rouge', '', '0', 3),
(731, 'The Perfumer''s Apprentice', 'Gourmand', 'Caramel', '', '0', 3),
(732, 'The Perfumer''s Apprentice', 'Gourmand', 'Cheesecake', '', '0', 3),
(733, 'The Perfumer''s Apprentice', 'Gourmand', 'Chocolat', '', '0', 3),
(734, 'The Perfumer''s Apprentice', 'Gourmand', 'Chocolat au Lait', 'fait avec l''essence de cacao naturelle, c''est plus doux que le goût de Chocolat simple', '0', 3),
(735, 'The Perfumer''s Apprentice', 'Gourmand', 'Double Chocolat', 'Très bon, sucré, et reste longtemps en bouche', '0', 3),
(736, 'The Perfumer''s Apprentice', 'Gourmand', 'English Toffe', '', '0', 3),
(737, 'The Perfumer''s Apprentice', 'Gourmand', 'Gauffre', '', '0', 3),
(738, 'The Perfumer''s Apprentice', 'Gourmand', 'Graham Cracker', '', '0', 3),
(739, 'The Perfumer''s Apprentice', 'Gourmand', 'Pain d''épice', '', '0', 3),
(740, 'The Perfumer''s Apprentice', 'Gourmand', 'Sucre Roux ', 'c''est une plus forte version de notre sucre marron original', '0', 3),
(741, 'The Perfumer''s Apprentice', 'Gourmand', 'Sweet Cream ', '', '0', 3),
(742, 'The Perfumer''s Apprentice', 'Gourmand', 'Vanille Bourbon', 'Excellent arôme vanille, mais a n''utiliser presque exclusivement qu''en assemblage, c''est un exhausteur de goût en lui même', '0', 3),
(743, 'The Perfumer''s Apprentice', 'Tabac', 'Ml Boro Premium', 'plus prononcé que le F.a, excellent gout, un petit gout de pain d epice', '0', 3),
(744, 'The Perfumer''s Apprentice', 'Tabac', 'Ry 4', 'beaucoup plus citronné que FA, légèrement acide et sucré, super gout excellent', '0', 3),
(745, 'The Perfumer''s Apprentice', 'Tabac', 'Ry 4 Double', 'Je l''utilise en combinaison pour obtenir des saveurs cigare, super gout', '0', 3),
(746, 'The Perfumer''s Apprentice', 'Tabac', 'Tabac Absolu', '', '0', 3),
(747, 'The Perfumer''s Apprentice', '', 'Bittersweet ', '', '0', 3),
(748, 'Totally Wicked', 'Tabac', '7 Stars', 'Un tabac moyen agréable, petit smokey avec un petit goût de noix/vanille', '0', 0),
(749, 'Totally Wicked', 'Tabac', 'American Red', 'Un tabac moyen lisse très agréable, avec beaucoup de fait d''être aux noisettes de noisetier continuant', '0', 0),
(750, 'Totally Wicked', 'Tabac', 'Bensis', 'Un tabac moyen avec une allusion de caramel non trop doux', '0', 0),
(751, 'Totally Wicked', 'Tabac', 'Black Devil', 'Un fort tabac sombre avec un goût énergique/fruité', '0', 0),
(752, 'Totally Wicked', 'Tabac', 'Black Tabacco', 'Un soleil a séché du tabac avec un goût toasté plaisant', '0', 0),
(753, 'Totally Wicked', 'Tabac', 'Blend Tabacco', 'Un mélange moyen agréable de tabac avec un bord aux noisettes', '0', 0),
(754, 'Totally Wicked', 'Tabac', 'Cabin', 'Un tabac moyen et le goût de pin pour un changement de rafraîchissement', '0', 0),
(755, 'Totally Wicked', 'Tabac', 'Camel', 'Un mélange de turc et de tabac Virginian, doux et délicieux', '0', 0),
(756, 'Totally Wicked', 'Tabac', 'Cherry Cigare', 'Un mélange de turc et de tabac Virginian, doux et délicieux', '0', 0),
(757, 'Totally Wicked', 'Tabac', 'Cigare', 'Un mélange de turc et de tabac Virginian, doux et délicieux', '0', 0),
(758, 'Totally Wicked', 'Tabac', 'Cohiba Cigars', 'Un mélange de turc et de tabac Virginian, doux et délicieux', '0', 0),
(759, 'Totally Wicked', 'Tabac', 'Davidof', 'Un mélange de turc et de tabac Virginian, doux et délicieux', '0', 0),
(760, 'Totally Wicked', 'Tabac', 'Dji Sam Soe', 'Un mélange de turc et de tabac Virginian, doux et délicieux', '0', 0),
(761, 'Totally Wicked', 'Tabac', 'French Pipe', 'Un mélange de turc et de tabac Virginian, doux et délicieux', '0', 0),
(762, 'Totally Wicked', 'Tabac', 'Gold Virgin', 'Un mélange de turc et de tabac Virginian, doux et délicieux', '0', 0),
(763, 'Totally Wicked', 'Tabac', 'Hilton', 'Un mélange de turc et de tabac Virginian, doux et délicieux', '0', 0),
(764, 'Totally Wicked', 'Tabac', 'Hope', 'Un mélange de turc et de tabac Virginian, doux et délicieux', '0', 0),
(765, 'Totally Wicked', 'Tabac', 'Kentish', 'Un mélange de turc et de tabac Virginian, doux et délicieux', '0', 0),
(766, 'Totally Wicked', 'Tabac', 'Kool', 'Un mélange de turc et de tabac Virginian, doux et délicieux', '0', 0),
(767, 'Totally Wicked', 'Tabac', 'Lark', 'Un mélange de turc et de tabac Virginian, doux et délicieux', '0', 0),
(768, 'Totally Wicked', 'Tabac', 'Limbert & Bottler', 'Un mélange de turc et de tabac Virginian, doux et délicieux', '0', 0),
(769, 'Totally Wicked', 'Tabac', 'Milnd 7', 'Un mélange de turc et de tabac Virginian, doux et délicieux', '0', 0),
(770, 'Totally Wicked', 'Tabac', 'Newsport Menthol', 'Un mélange de turc et de tabac Virginian, doux et délicieux', '0', 0),
(771, 'Totally Wicked', 'Tabac', 'Parliament', 'Un mélange de turc et de tabac Virginian, doux et délicieux', '0', 0),
(772, 'Totally Wicked', 'Tabac', 'Peace', 'Un mélange de turc et de tabac Virginian, doux et délicieux', '0', 0),
(773, 'Totally Wicked', 'Tabac', 'Salem', 'Un mélange de turc et de tabac Virginian, doux et délicieux', '0', 0),
(774, 'Totally Wicked', 'Tabac', 'State Express', 'Un mélange de turc et de tabac Virginian, doux et délicieux', '0', 0),
(775, 'Totally Wicked', 'Tabac', 'Turkish Tobacco', 'Un mélange de turc et de tabac Virginian, doux et délicieux', '0', 0),
(776, 'Totally Wicked', 'Tabac', 'Winston', 'Un mélange de turc et de tabac Virginian, doux et délicieux', '0', 0),
(777, 'Vaperite', 'Boisson', 'Pina Colada', '', '0', 0),
(778, 'Vaperite', 'Fruité', 'Fraise', '', '0', 0),
(779, 'Vaperite', 'Fruité', 'Fraise Lime', '', '0', 0),
(780, 'Vaperite', 'Fruité', 'Framboise', '', '0', 0),
(781, 'Vaperite', 'Fruité', 'Noix de coco', '', '0', 0),
(782, 'Vaperite', 'Fruité', 'Peche', '', '0', 0),
(783, 'Vaperite', 'Gourmand', 'Cannelle', '', '0', 0),
(784, 'Vaperite', 'Gourmand', 'English Toffe', '', '0', 0),
(785, 'Vaperite', 'Gourmand', 'Gauffre', '', '0', 0),
(786, 'Vaperite', 'Gourmand', 'Noisette', '', '0', 0),
(787, 'Vaperite', 'Gourmand', 'Praline Noisette', '', '0', 0),
(788, 'Vaperite', 'Gourmand', 'Sirop d''érable', '', '0', 0);

-- --------------------------------------------------------

--
-- Structure de la table `bases`
--

DROP TABLE IF EXISTS `bases`;
CREATE TABLE `bases` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bases_2080` varchar(200) NOT NULL,
  `bases_5050` varchar(200) NOT NULL,
  `bases_8020` varchar(200) NOT NULL,
  `bases_1000` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `bases`
--

TRUNCATE TABLE `bases`;
--
-- Contenu de la table `bases`
--

INSERT INTO `bases` (`id`, `id_user`, `bases_2080`, `bases_5050`, `bases_8020`, `bases_1000`) VALUES
(1, 6, '1316', '1000', '1000', '1000');

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
--
-- Contenu de la table `construction_en_cours`
--

INSERT INTO `construction_en_cours` (`id`, `id_user`, `name_batiment`, `time_finish`) VALUES
(58, 1, 'level_culture_vg', 1462220640);

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
  `argent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `login`
--

TRUNCATE TABLE `login`;
--
-- Contenu de la table `login`
--

INSERT INTO `login` (`id`, `login`, `password`, `last_connect`, `avertissement`, `level`, `level_culture_vg`, `level_usine_pg`, `level_labos_bases`, `last_culture_vg`, `last_usine_pg`, `argent`) VALUES
(5, 'taratata', '', '1462698875', 0, 0, 1, 1, 0, 2183.9134, 1513.6728, 0),
(6, 'evengyl', '$2y$10$esysZfksJpjyNODPTAXCkeCuhFaVUcDYimSyAWrC.HdB.4iYoy6ky', '1462698875', 0, 0, 4, 4, 2, 2570587.395, 1169232.99, 991421),
(7, 'jasonbg', '', '1462698875', 0, 0, 0, 0, 0, 556.0318, 447.6217, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=789;
--
-- AUTO_INCREMENT pour la table `bases`
--
ALTER TABLE `bases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `construction_en_cours`
--
ALTER TABLE `construction_en_cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `usine_pg`
--
ALTER TABLE `usine_pg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

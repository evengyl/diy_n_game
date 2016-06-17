-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 17 Juin 2016 à 15:06
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
(10, 'Bickford Flavors', 'Boisson', 'Bourbon', 2),
(11, 'Bickford Flavors', 'Boisson', 'Champagne', 2),
(12, 'Bickford Flavors', 'Boisson', 'Cola', 2),
(13, 'Bickford Flavors', 'Boisson', 'Pina Colada', 2),
(14, 'Bickford Flavors', 'Boisson', 'Rhum', 2),
(16, 'Bickford Flavors', 'Fraicheur', 'Menthe Poivrée', 2),
(17, 'Bickford Flavors', 'Fruité', 'Abricot', 2),
(18, 'Bickford Flavors', 'Fruité', 'Ananas', 2),
(19, 'Bickford Flavors', 'Fruité', 'Banane', 2),
(20, 'Bickford Flavors', 'Fruité', 'Cassis', 2),
(21, 'Bickford Flavors', 'Fruité', 'Cerise', 2),
(22, 'Bickford Flavors', 'Fruité', 'Citron', 2),
(23, 'Bickford Flavors', 'Fruité', 'Fraise', 2),
(24, 'Bickford Flavors', 'Fruité', 'Fraise Banane', 2),
(25, 'Bickford Flavors', 'Fruité', 'Fraise Goyave', 2),
(26, 'Bickford Flavors', 'Fruité', 'Fraise Kiwi', 2),
(27, 'Bickford Flavors', 'Fruité', 'Framboise', 2),
(28, 'Bickford Flavors', 'Fruité', 'Fruit de la Passion', 2),
(29, 'Bickford Flavors', 'Fruité', 'Goyave', 2),
(30, 'Bickford Flavors', 'Fruité', 'Guimauve', 2),
(31, 'Bickford Flavors', 'Fruité', 'Kiwi', 2),
(32, 'Bickford Flavors', 'Fruité', 'Lime', 2),
(33, 'Bickford Flavors', 'Fruité', 'Mangue', 2),
(34, 'Bickford Flavors', 'Fruité', 'Melon', 2),
(35, 'Bickford Flavors', 'Fruité', 'Orange', 2),
(36, 'Bickford Flavors', 'Fruité', 'Papaye', 2),
(37, 'Bickford Flavors', 'Fruité', 'Pêche', 2),
(38, 'Bickford Flavors', 'Fruité', 'Poire', 2),
(39, 'Bickford Flavors', 'Fruité', 'Pomme', 2),
(40, 'Bickford Flavors', 'Fruité', 'Pomme Cerise', 2),
(41, 'Bickford Flavors', 'Fruité', 'Prune', 2),
(42, 'Bickford Flavors', 'Fruité', 'Raisin', 2),
(44, 'Bickford Flavors', 'Gourmand', 'Beurre', 2),
(45, 'Bickford Flavors', 'Gourmand', 'Café', 2),
(46, 'Bickford Flavors', 'Gourmand', 'Cannelle', 2),
(47, 'Bickford Flavors', 'Gourmand', 'Caramel', 2),
(49, 'Bickford Flavors', 'Gourmand', 'Cheesecake', 2),
(50, 'Bickford Flavors', 'Gourmand', 'Chocolat', 2),
(51, 'Bickford Flavors', 'Gourmand', 'Crème de Menthe', 2),
(52, 'Bickford Flavors', 'Gourmand', 'Lait de Poule', 2),
(53, 'Bickford Flavors', 'Gourmand', 'Noisette', 2),
(54, 'Bickford Flavors', 'Gourmand', 'Pistache', 2),
(55, 'Bickford Flavors', 'Gourmand', 'Pomme Cannelle', 2),
(56, 'Bickford Flavors', 'Gourmand', 'Pomme d''érable', 2),
(57, 'Bickford Flavors', 'Gourmand', 'Praline', 2),
(58, 'Bickford Flavors', 'Gourmand', 'Sirop d''érable', 2),
(59, 'Bickford Flavors', 'Gourmand', 'Vanille', 2),
(107, 'Cappela Flavor', 'Boisson', 'Cola', 3),
(108, 'Cappela Flavor', 'Fruité', 'Abricot', 3),
(109, 'Cappela Flavor', 'Fruité', 'Banane', 3),
(110, 'Cappela Flavor', 'Fruité', 'Citron Lime', 3),
(111, 'Cappela Flavor', 'Fruité', 'Figue', 3),
(112, 'Cappela Flavor', 'Fruité', 'Fraise', 3),
(113, 'Cappela Flavor', 'Fruité', 'Framboise', 3),
(114, 'Cappela Flavor', 'Fruité', 'Grenade', 3),
(115, 'Cappela Flavor', 'Fruité', 'Noix de coco', 3),
(116, 'Cappela Flavor', 'Fruité', 'Pasteque', 3),
(117, 'Cappela Flavor', 'Fruité', 'Pomme', 3),
(119, 'Cappela Flavor', 'Fruité', 'Raisin', 3),
(120, 'Cappela Flavor', 'Gourmand', 'Banana Split', 3),
(122, 'Cappela Flavor', 'Gourmand', 'Brownie', 3),
(123, 'Cappela Flavor', 'Gourmand', 'Bubblegum', 3),
(124, 'Cappela Flavor', 'Gourmand', 'Cappuccino', 3),
(125, 'Cappela Flavor', 'Gourmand', 'Caramel', 3),
(126, 'Cappela Flavor', 'Gourmand', 'Double Chocolat', 3),
(127, 'Cappela Flavor', 'Gourmand', 'Espresso', 3),
(128, 'Cappela Flavor', 'Gourmand', 'Gauffre', 3),
(129, 'Cappela Flavor', 'Gourmand', 'Marshmallow', 3),
(130, 'Cappela Flavor', 'Gourmand', 'Noisette ', 3),
(131, 'Cappela Flavor', 'Gourmand', 'Sirop d''érable', 3),
(283, 'Flavour Art', 'Additif', 'AAA Magic mask', 1),
(284, 'Flavour Art', 'Additif', 'Bitter Wizard ', 1),
(285, 'Flavour Art', 'Additif', 'MTS Vap Wizard', 1),
(286, 'Flavour Art', 'Boisson', 'Biere', 1),
(287, 'Flavour Art', 'Boisson', 'Champagne', 1),
(288, 'Flavour Art', 'Boisson', 'Cola', 1),
(289, 'Flavour Art', 'Boisson', 'Gin', 1),
(290, 'Flavour Art', 'Boisson', 'Jamaique Rhum', 1),
(291, 'Flavour Art', 'Boisson', 'R Bull', 1),
(292, 'Flavour Art', 'Boisson', 'Thé Noir', 1),
(293, 'Flavour Art', 'Boisson', 'Thé Vert', 1),
(294, 'Flavour Art', 'Boisson', 'Whisky', 1),
(295, 'Flavour Art', 'Divers', 'Hypnotic Myst', 1),
(296, 'Flavour Art', 'Floral', 'Lavande', 1),
(297, 'Flavour Art', 'Floral', 'Rose', 1),
(298, 'Flavour Art', 'Floral', 'Viollette', 1),
(299, 'Flavour Art', 'Floral', 'Zen Garden', 1),
(300, 'Flavour Art', 'Fraicheur', 'Anis', 1),
(301, 'Flavour Art', 'Fraicheur', 'Menthe', 1),
(302, 'Flavour Art', 'Fraicheur', 'Menthe Poivrée', 1),
(303, 'Flavour Art', 'Fraicheur', 'Menthol Artic', 1),
(304, 'Flavour Art', 'Fruité', 'Abricot', 1),
(305, 'Flavour Art', 'Fruité', 'Ananas', 1),
(306, 'Flavour Art', 'Fruité', 'Banane', 1),
(307, 'Flavour Art', 'Fruité', 'Bergamotte', 1),
(308, 'Flavour Art', 'Fruité', 'Cassis', 1),
(309, 'Flavour Art', 'Fruité', 'Cerise', 1),
(310, 'Flavour Art', 'Fruité', 'Cerise Noire', 1),
(311, 'Flavour Art', 'Fruité', 'Citron Mix', 1),
(312, 'Flavour Art', 'Fruité', 'Figue', 1),
(313, 'Flavour Art', 'Fruité', 'Fraise', 1),
(314, 'Flavour Art', 'Fruité', 'Framboise', 1),
(315, 'Flavour Art', 'Fruité', 'Fruit de la Passion', 1),
(316, 'Flavour Art', 'Fruité', 'Goyave', 1),
(317, 'Flavour Art', 'Fruité', 'Grenade', 1),
(318, 'Flavour Art', 'Fruité', 'Kiwi', 1),
(319, 'Flavour Art', 'Fruité', 'Lychee', 1),
(320, 'Flavour Art', 'Fruité', 'Mandarine', 1),
(321, 'Flavour Art', 'Fruité', 'Mangue', 1),
(322, 'Flavour Art', 'Fruité', 'Mélange de fruit rouge', 1),
(323, 'Flavour Art', 'Fruité', 'Melon', 1),
(324, 'Flavour Art', 'Fruité', 'Mure', 1),
(325, 'Flavour Art', 'Fruité', 'Myrtille', 1),
(326, 'Flavour Art', 'Fruité', 'Noix de coco', 1),
(327, 'Flavour Art', 'Fruité', 'Orange', 1),
(328, 'Flavour Art', 'Fruité', 'Papaye', 1),
(329, 'Flavour Art', 'Fruité', 'Pasteque', 1),
(330, 'Flavour Art', 'Fruité', 'Peche', 1),
(331, 'Flavour Art', 'Fruité', 'Poire', 1),
(332, 'Flavour Art', 'Fruité', 'Pomme', 1),
(333, 'Flavour Art', 'Fruité', 'Raisin', 1),
(334, 'Flavour Art', 'Gourmand', 'Cacao', 1),
(335, 'Flavour Art', 'Gourmand', 'Café Expresso', 1),
(336, 'Flavour Art', 'Gourmand', 'Cannelle', 1),
(337, 'Flavour Art', 'Gourmand', 'Cappuccino', 1),
(338, 'Flavour Art', 'Gourmand', 'Caramel', 1),
(339, 'Flavour Art', 'Gourmand', 'Chocolat', 1),
(340, 'Flavour Art', 'Gourmand', 'Cookie', 1),
(341, 'Flavour Art', 'Gourmand', 'Creme de Vienne', 1),
(342, 'Flavour Art', 'Gourmand', 'Creme Fouettée', 1),
(343, 'Flavour Art', 'Gourmand', 'Croissant', 1),
(344, 'Flavour Art', 'Gourmand', 'Miel', 1),
(345, 'Flavour Art', 'Gourmand', 'Noisette', 1),
(346, 'Flavour Art', 'Gourmand', 'Nougat', 1),
(347, 'Flavour Art', 'Gourmand', 'Panettone', 1),
(348, 'Flavour Art', 'Gourmand', 'Pistache', 1),
(349, 'Flavour Art', 'Gourmand', 'Réglisse ', 1),
(350, 'Flavour Art', 'Gourmand', 'Sirop d''érable', 1),
(351, 'Flavour Art', 'Gourmand', 'Tarte au Pomme', 1),
(352, 'Flavour Art', 'Gourmand', 'Tiramisu', 1),
(353, 'Flavour Art', 'Gourmand', 'Torrone', 1),
(354, 'Flavour Art', 'Gourmand', 'Tutti Frutti', 1),
(355, 'Flavour Art', 'Gourmand', 'Vanille', 1),
(356, 'Flavour Art', 'Tabac', '7 Leaves Ultimate', 1),
(357, 'Flavour Art', 'Tabac', 'Black Fire', 1),
(358, 'Flavour Art', 'Tabac', 'Burley', 1),
(359, 'Flavour Art', 'Tabac', 'Camtel Ultimate', 1),
(360, 'Flavour Art', 'Tabac', 'Cowboy', 1),
(361, 'Flavour Art', 'Tabac', 'Cuba Supreme', 1),
(362, 'Flavour Art', 'Tabac', 'Dark Vapure', 1),
(363, 'Flavour Art', 'Tabac', 'Desert Ship', 1),
(364, 'Flavour Art', 'Tabac', 'Latakia', 1),
(365, 'Flavour Art', 'Tabac', 'Maxx Blend', 1),
(366, 'Flavour Art', 'Tabac', 'Mellow Sunset', 1),
(367, 'Flavour Art', 'Tabac', 'Oba Oba', 1),
(368, 'Flavour Art', 'Tabac', 'Oryental 4', 1),
(369, 'Flavour Art', 'Tabac', 'Ozone', 1),
(370, 'Flavour Art', 'Tabac', 'Perique Black', 1),
(371, 'Flavour Art', 'Tabac', 'Reggae Night', 1),
(372, 'Flavour Art', 'Tabac', 'Royal', 1),
(373, 'Flavour Art', 'Tabac', 'Ry 4', 1),
(374, 'Flavour Art', 'Tabac', 'Shade', 1),
(375, 'Flavour Art', 'Tabac', 'Virginia', 1),
(481, 'Inawera', 'Additif', 'Bitter Wizard ', 1),
(482, 'Inawera', 'Boisson', 'Biere', 1),
(483, 'Inawera', 'Boisson', 'Brandy', 1),
(484, 'Inawera', 'Boisson', 'Café', 1),
(485, 'Inawera', 'Boisson', 'Cappuccino', 1),
(486, 'Inawera', 'Boisson', 'Cerise Liqueur', 1),
(487, 'Inawera', 'Boisson', 'Champagne', 1),
(488, 'Inawera', 'Boisson', 'Cola', 1),
(489, 'Inawera', 'Boisson', 'Jamaique Rhum', 1),
(490, 'Inawera', 'Boisson', 'Pinacolada', 1),
(491, 'Inawera', 'Boisson', 'Plum Vodka', 1),
(492, 'Inawera', 'Boisson', 'Rhum', 1),
(493, 'Inawera', 'Boisson', 'Thé Noir', 1),
(494, 'Inawera', 'Boisson', 'Thé Vert', 1),
(495, 'Inawera', 'Boisson', 'Whisky', 1),
(496, 'Inawera', 'Floral', 'Rose', 1),
(497, 'Inawera', 'Floral', 'Ylang Ylang', 1),
(498, 'Inawera', 'Fraicheur', 'Anis', 1),
(499, 'Inawera', 'Fraicheur', 'Cool Mint', 1),
(500, 'Inawera', 'Fraicheur', 'Eucalyptus Mint', 1),
(501, 'Inawera', 'Fraicheur', 'Menthe', 1),
(502, 'Inawera', 'Fraicheur', 'Menthe', 1),
(503, 'Inawera', 'Fraicheur', 'Mix Mint', 1),
(504, 'Inawera', 'Fruité', 'Abricot', 1),
(505, 'Inawera', 'Fruité', 'Ananas', 1),
(506, 'Inawera', 'Fruité', 'Banane', 1),
(507, 'Inawera', 'Fruité', 'Cerise', 1),
(508, 'Inawera', 'Fruité', 'Citron', 1),
(509, 'Inawera', 'Fruité', 'Exotic Roots', 1),
(510, 'Inawera', 'Fruité', 'Fraise', 1),
(511, 'Inawera', 'Fruité', 'Fraise Sauvage', 1),
(512, 'Inawera', 'Fruité', 'Framboise', 1),
(514, 'Inawera', 'Fruité', 'Melon', 1),
(516, 'Inawera', 'Fruité', 'Noix de coco', 1),
(517, 'Inawera', 'Fruité', 'Orange', 1),
(518, 'Inawera', 'Fruité', 'Peche', 1),
(519, 'Inawera', 'Fruité', 'Poire', 1),
(520, 'Inawera', 'Fruité', 'Pomme', 1),
(521, 'Inawera', 'Fruité', 'Raisin', 1),
(522, 'Inawera', 'Gourmand', 'Cacahuète', 1),
(523, 'Inawera', 'Gourmand', 'Chocolat', 1),
(524, 'Inawera', 'Gourmand', 'Chocolat au Lait', 1),
(525, 'Inawera', 'Gourmand', 'Miel', 1),
(526, 'Inawera', 'Gourmand', 'Noisette', 1),
(527, 'Inawera', 'Gourmand', 'Nougat', 1),
(528, 'Inawera', 'Gourmand', 'Prune', 1),
(529, 'Inawera', 'Gourmand', 'Pruneaux', 1),
(530, 'Inawera', 'Gourmand', 'Sesame', 1),
(531, 'Inawera', 'Gourmand', 'Tiramisu', 1),
(532, 'Inawera', 'Gourmand', 'Vanille', 1),
(533, 'Inawera', 'Gourmand', 'Vanille Bourbon', 1),
(534, 'Inawera', 'Tabac', '7 Leaves Ultimate', 1),
(535, 'Inawera', 'Tabac', 'Burley It', 1),
(536, 'Inawera', 'Tabac', 'Cowboy Blend', 1),
(537, 'Inawera', 'Tabac', 'Cuba Supreme', 1),
(538, 'Inawera', 'Tabac', 'Dark Vapure', 1),
(539, 'Inawera', 'Tabac', 'Desert Voyager', 1),
(540, 'Inawera', 'Tabac', 'Falcon Eye', 1),
(541, 'Inawera', 'Tabac', 'Gipsy King', 1),
(542, 'Inawera', 'Tabac', 'Kent', 1),
(543, 'Inawera', 'Tabac', 'Latakia', 1),
(544, 'Inawera', 'Tabac', 'Mellow Sunset', 1),
(545, 'Inawera', 'Tabac', 'Old Havana', 1),
(546, 'Inawera', 'Tabac', 'Perique Black', 1),
(547, 'Inawera', 'Tabac', 'Space Drop ', 1),
(548, 'Inawera', 'Tabac', 'Symphony', 1),
(549, 'Inawera', 'Tabac', 'Turkish', 1),
(550, 'Inawera', 'Tabac', 'Tuscan Garden', 1),
(551, 'Inawera', 'Tabac', 'Western Blend', 1),
(693, 'The Perfumer''s Apprentice', 'Additif', 'Koolada', 3),
(694, 'The Perfumer''s Apprentice', 'Additif', 'Sweetener', 3),
(695, 'The Perfumer''s Apprentice', 'Boisson', 'Absinthe', 3),
(696, 'The Perfumer''s Apprentice', 'Boisson', 'Biere', 3),
(697, 'The Perfumer''s Apprentice', 'Boisson', 'Champagne', 3),
(698, 'The Perfumer''s Apprentice', 'Boisson', 'Cola', 3),
(699, 'The Perfumer''s Apprentice', 'Boisson', 'HPNO', 3),
(700, 'The Perfumer''s Apprentice', 'Boisson', 'Thé Earl Grey', 3),
(701, 'The Perfumer''s Apprentice', 'Divers', 'Marie Jeanne', 3),
(702, 'The Perfumer''s Apprentice', 'Fruité', 'Ananas', 3),
(703, 'The Perfumer''s Apprentice', 'Fruité', 'Banane Mure', 3),
(704, 'The Perfumer''s Apprentice', 'Fruité', 'Cerise', 3),
(705, 'The Perfumer''s Apprentice', 'Fruité', 'Cerise Noire', 3),
(706, 'The Perfumer''s Apprentice', 'Fruité', 'Citron', 3),
(707, 'The Perfumer''s Apprentice', 'Fruité', 'Dragon Rouge', 3),
(708, 'The Perfumer''s Apprentice', 'Fruité', 'Fraise', 3),
(709, 'The Perfumer''s Apprentice', 'Fruité', 'Framboise', 3),
(710, 'The Perfumer''s Apprentice', 'Fruité', 'Grenade', 3),
(711, 'The Perfumer''s Apprentice', 'Fruité', 'Kiwi', 3),
(712, 'The Perfumer''s Apprentice', 'Fruité', 'Lime', 3),
(713, 'The Perfumer''s Apprentice', 'Fruité', 'Mangue', 3),
(714, 'The Perfumer''s Apprentice', 'Fruité', 'Melon Cantaloupe', 3),
(715, 'The Perfumer''s Apprentice', 'Fruité', 'Noix de coco', 3),
(716, 'The Perfumer''s Apprentice', 'Fruité', 'Peche', 3),
(717, 'The Perfumer''s Apprentice', 'Fruité', 'Poire', 3),
(718, 'The Perfumer''s Apprentice', 'Fruité', 'Pomme', 3),
(719, 'The Perfumer''s Apprentice', 'Fruité', 'Pomme Grany Smith', 3),
(720, 'The Perfumer''s Apprentice', 'Fruité', 'Prune', 3),
(721, 'The Perfumer''s Apprentice', 'Fruité', 'Tutti Frutti', 3),
(722, 'The Perfumer''s Apprentice', 'Gourmand', 'Amande', 3),
(723, 'The Perfumer''s Apprentice', 'Gourmand', 'Amande Amaretto', 3),
(724, 'The Perfumer''s Apprentice', 'Gourmand', 'Barbe à Papa', 3),
(726, 'The Perfumer''s Apprentice', 'Gourmand', 'Beurre d''arachide', 3),
(727, 'The Perfumer''s Apprentice', 'Gourmand', 'Bonbon à la Pomme', 3),
(728, 'The Perfumer''s Apprentice', 'Gourmand', 'Bonbon au Caramel', 3),
(729, 'The Perfumer''s Apprentice', 'Gourmand', 'Bubblegum', 3),
(730, 'The Perfumer''s Apprentice', 'Gourmand', 'Cannelle Rouge', 3),
(731, 'The Perfumer''s Apprentice', 'Gourmand', 'Caramel', 3),
(732, 'The Perfumer''s Apprentice', 'Gourmand', 'Cheesecake', 3),
(733, 'The Perfumer''s Apprentice', 'Gourmand', 'Chocolat', 3),
(734, 'The Perfumer''s Apprentice', 'Gourmand', 'Chocolat au Lait', 3),
(735, 'The Perfumer''s Apprentice', 'Gourmand', 'Double Chocolat', 3),
(736, 'The Perfumer''s Apprentice', 'Gourmand', 'English Toffe', 3),
(737, 'The Perfumer''s Apprentice', 'Gourmand', 'Gauffre', 3),
(738, 'The Perfumer''s Apprentice', 'Gourmand', 'Graham Cracker', 3),
(739, 'The Perfumer''s Apprentice', 'Gourmand', 'Pain d''épice', 3),
(740, 'The Perfumer''s Apprentice', 'Gourmand', 'Sucre Roux ', 3),
(741, 'The Perfumer''s Apprentice', 'Gourmand', 'Sweet Cream ', 3),
(742, 'The Perfumer''s Apprentice', 'Gourmand', 'Vanille Bourbon', 3),
(743, 'The Perfumer''s Apprentice', 'Tabac', 'Ml Boro Premium', 3),
(744, 'The Perfumer''s Apprentice', 'Tabac', 'Ry 4', 3),
(745, 'The Perfumer''s Apprentice', 'Tabac', 'Ry 4 Double', 3),
(746, 'The Perfumer''s Apprentice', 'Tabac', 'Tabac Absolu', 3),
(747, 'The Perfumer''s Apprentice', '', 'Bittersweet ', 3),
(789, 'Cappela Flavor', 'Gourmand', 'Amaretto', 3),
(790, 'Cappela Flavor', 'Boisson', 'Anise', 3),
(791, 'Cappela Flavor', 'Fruité', 'Barbe à papa', 3),
(792, 'Cappela Flavor', 'Fruité', 'Melon', 3),
(794, 'Cappela Flavor', 'Boisson', 'Thé chai', 3),
(795, 'Cappela Flavor', 'Boisson', 'Coca cherry', 3),
(796, 'Cappela Flavor', 'Gourmand', 'Coco Choco amande', 3),
(797, 'Cappela Flavor', 'Gourmand', 'Gateau chocolat', 3),
(798, 'Cappela Flavor', 'Gourmand', 'Downut chocolat', 3),
(799, 'Cappela Flavor', 'Fruité', 'Framboise chocolat', 3),
(800, 'Cappela Flavor', 'Fruité', 'Menthol légere', 3),
(801, 'Cappela Flavor', 'Fruité', 'Cranberry', 3),
(802, 'Cappela Flavor', 'Gourmand', 'Yaourt crème', 3),
(803, 'Cappela Flavor', 'Fruité', 'Concombre', 3),
(804, 'Cappela Flavor', 'Boisson', 'Tasse de café', 3),
(805, 'Cappela Flavor', 'Fruité', 'Fruit du dragon', 3),
(806, 'Cappela Flavor', 'Fruité', 'Double pomme', 3),
(807, 'Cappela Flavor', 'Boisson', 'Energy drink', 3),
(808, 'Cappela Flavor', 'Gourmand', 'Vanilla french', 3),
(809, 'Cappela Flavor', 'Gourmand', 'Gingerbread', 3),
(810, 'Cappela Flavor', 'Gourmand', 'Donuts', 3),
(811, 'Cappela Flavor', 'Gourmand', 'Crackers', 3),
(812, 'Cappela Flavor', 'Fruité', 'Anana', 3),
(813, 'Cappela Flavor', 'Fruité', 'Pamplemousse', 3),
(814, 'Cappela Flavor', 'Boisson', 'Grenadine', 3),
(815, 'Cappela Flavor', 'Fruité', 'Fruit rouge', 3),
(816, 'Cappela Flavor', 'Boisson', 'Irish cream', 3),
(817, 'Cappela Flavor', 'Fruité', 'Fraise kiwi', 3),
(818, 'Cappela Flavor', 'Fruité', 'Jelly candy', 3),
(819, 'Cappela Flavor', 'Gourmand', 'Amande grillée', 3),
(820, 'Cappela Flavor', 'Gourmand', 'Beurre de cacahuette', 3),
(821, 'Cappela Flavor', 'Gourmand', 'Cookie sucré', 3),
(822, 'Cappela Flavor', 'Gourmand', 'Crème de beurre', 3),
(823, 'Cappela Flavor', 'Gourmand', 'Crème gateau chocolat', 3),
(824, 'Cappela Flavor', 'Fruité', 'Crème pêche', 3),
(825, 'Cappela Flavor', 'Gourmand', 'Crème pralinée', 3),
(826, 'Cappela Flavor', 'Gourmand', 'Crème vanille fouetée', 3),
(827, 'Cappela Flavor', 'Gourmand', 'Cupcake vanille', 3),
(829, 'Cappela Flavor', 'Fruité', 'Fruit de la passion', 3),
(830, 'Cappela Flavor', 'Boisson', 'Jus d''orange', 3),
(831, 'Cappela Flavor', 'Boisson', 'Jus de pêche', 3),
(832, 'Cappela Flavor', 'Fruité', 'Lychee', 3),
(833, 'Cappela Flavor', 'Fruité', 'Mandarine', 3),
(834, 'Cappela Flavor', 'Fruité', 'Mangue', 3),
(835, 'Cappela Flavor', 'Gourmand', 'Meringue au citron', 3),
(836, 'Cappela Flavor', 'Boisson', 'Pina colada', 3),
(837, 'Cappela Flavor', 'Fruité', 'Poire', 3),
(838, 'Cappela Flavor', 'Gourmand', 'Pop Corn', 3),
(839, 'Cappela Flavor', 'Gourmand', 'Vanille custard', 3),
(840, 'T-juice', '', 'Red astaire', 2),
(841, 'T-juice', '', 'Black n blue', 2),
(842, 'T-juice', '', 'Clara T', 2),
(843, 'T-juice', '', 'Jon freeze', 2),
(844, 'T-juice', '', 'Jacques le Mon', 2),
(845, 'T-juice', '', 'Gold n brown', 2),
(846, 'T-juice', '', 'Colonel custard', 2),
(847, 'T-juice', '', 'Jack the ripple', 2),
(848, 'T-juice', '', 'Vamp vape', 2),
(849, 'T-juice', '', 'Forest affair', 2),
(850, 'T-juice', '', 'Strawberri', 2),
(851, 'T-juice', '', 'Green steam', 2),
(852, 'T-juice', '', 'High voltage', 2),
(853, 'T-juice', '', 'Tangerine dream', 2),
(854, 'T-juice', '', 'Minty the toff', 2),
(855, 'T-juice', '', 'Afro dizziac', 2),
(856, 'T-juice', '', 'TY 4', 2),
(857, 'T-juice', '', 'Bubble gun', 2),
(858, 'T-juice', '', 'Quintessence', 2),
(859, 'T-juice', '', 'Primo verde', 2),
(860, 'T-juice', '', 'Mentice', 2),
(861, 'T-juice', '', 'Pomme pom', 2),
(862, 'T-juice', '', 'Cubana', 2),
(863, 'T-juice', '', 'Melipona', 2),
(864, 'T-juice', '', 'Java juice', 2),
(865, 'T-juice', '', 'Cherry choc', 2),
(866, 'T-juice', '', 'Mintastic', 2),
(867, 'T-juice', '', 'UK smokes', 2),
(868, 'T-juice', '', 'Virgin leaf', 2),
(869, 'T-juice', '', 'USA reds', 2),
(870, 'T-juice', '', 'Ice queen', 2),
(871, 'T-juice', '', 'Hermano rubio', 2),
(872, 'T-juice', '', 'Cubanito', 2),
(873, 'T-juice', '', 'USA silver', 2),
(874, 'T-juice', '', 'Eastern blend', 2);

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
(1, 6, '1351', '1010', '1000', '1000');

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
  `litter_pg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `login`
--

TRUNCATE TABLE `login`;
--
-- Contenu de la table `login`
--

INSERT INTO `login` (`id`, `login`, `password`, `last_connect`, `avertissement`, `level`, `level_culture_vg`, `level_usine_pg`, `level_labos_bases`, `last_culture_vg`, `last_usine_pg`, `argent`, `litter_vg`, `litter_pg`) VALUES
(6, 'evengyl', '$2y$10$esysZfksJpjyNODPTAXCkeCuhFaVUcDYimSyAWrC.HdB.4iYoy6ky', '1464189465', 0, 0, 5, 6, 5, 424, 1253.8, 1004251, 100, 100);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=875;
--
-- AUTO_INCREMENT pour la table `bases`
--
ALTER TABLE `bases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `construction_en_cours`
--
ALTER TABLE `construction_en_cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
-- AUTO_INCREMENT pour la table `raccord`
--
ALTER TABLE `raccord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `usine_pg`
--
ALTER TABLE `usine_pg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

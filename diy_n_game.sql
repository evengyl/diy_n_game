-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 26 Avril 2016 à 08:05
-- Version du serveur :  5.6.20
-- Version de PHP :  5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `diy_n_game`
--
CREATE DATABASE IF NOT EXISTS `diy_n_game` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `diy_n_game`;

-- --------------------------------------------------------

--
-- Structure de la table `construction_en_cours`
--

DROP TABLE IF EXISTS `construction_en_cours`;
CREATE TABLE IF NOT EXISTS `construction_en_cours` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name_batiment` varchar(20) NOT NULL,
  `time_finish` bigint(20) NOT NULL,
  `time_to_finish` bigint(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `construction_en_cours`
--

INSERT INTO `construction_en_cours` (`id`, `id_user`, `name_batiment`, `time_finish`, `time_to_finish`) VALUES
(21, 1, 'level_culture_vg', 1461509273, 0),
(22, 1, 'level_usine_pg', 1461509273, 0),
(23, 2, 'level_culture_vg', 1461509273, 0),
(24, 2, 'level_usine_pg', 1461509273, 0);

-- --------------------------------------------------------

--
-- Structure de la table `culture_vg`
--

DROP TABLE IF EXISTS `culture_vg`;
CREATE TABLE IF NOT EXISTS `culture_vg` (
`id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `multi_prod` float NOT NULL,
  `multi_prix` float NOT NULL,
  `production` int(11) NOT NULL,
  `prix` bigint(11) NOT NULL,
  `time_construct` bigint(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Contenu de la table `culture_vg`
--

INSERT INTO `culture_vg` (`id`, `level`, `multi_prod`, `multi_prix`, `production`, `prix`, `time_construct`) VALUES
(1, 0, 3, 1.3, 0, 13, 0),
(2, 1, 3.02, 1.3, 19, 17, 75),
(3, 2, 3.04, 1.3, 56, 23, 300),
(4, 3, 3.06, 1.3, 113, 30, 675),
(5, 4, 3.08, 1.3, 190, 39, 1200),
(6, 5, 3.1, 1.3, 289, 51, 1875),
(7, 6, 3.12, 1.3, 409, 67, 2700),
(8, 7, 3.14, 1.3, 553, 88, 3675),
(9, 8, 3.16, 1.3, 719, 115, 4800),
(10, 9, 3.18, 1.3, 911, 150, 6075),
(11, 10, 3.2, 1.3, 1127, 195, 7500),
(12, 11, 3.22, 1.3, 1369, 254, 9075),
(13, 12, 3.24, 1.3, 1638, 331, 10800),
(14, 13, 3.26, 1.3, 1935, 431, 12675),
(15, 14, 3.28, 1.3, 2260, 561, 14700),
(16, 15, 3.3, 1.3, 2614, 730, 16875),
(17, 16, 3.32, 1.3, 2999, 949, 19200),
(18, 17, 3.34, 1.3, 3414, 1234, 21675),
(19, 18, 3.36, 1.3, 3862, 1605, 24300),
(20, 19, 3.38, 1.3, 4342, 2087, 27075),
(21, 20, 3.4, 1.3, 4856, 2714, 30000),
(22, 21, 3.42, 1.3, 5404, 3529, 33075),
(23, 22, 3.44, 1.3, 5988, 4588, 36300),
(24, 23, 3.46, 1.3, 6609, 5965, 39675),
(25, 24, 3.48, 1.3, 7267, 7755, 43200),
(26, 25, 3.5, 1.3, 7963, 10082, 46875),
(27, 26, 3.52, 1.3, 8699, 13107, 50700),
(28, 27, 3.54, 1.3, 9474, 17040, 54675),
(29, 28, 3.56, 1.3, 10291, 22152, 58800),
(30, 29, 3.58, 1.3, 11151, 28798, 63075),
(31, 30, 3.6, 1.3, 12053, 37438, 67500),
(32, 31, 3.62, 1.3, 13000, 48670, 72075),
(33, 32, 3.64, 1.3, 13992, 63271, 76800),
(34, 33, 3.66, 1.3, 15030, 82253, 81675),
(35, 34, 3.68, 1.3, 16116, 106929, 86700),
(36, 35, 3.7, 1.3, 17250, 139008, 91875),
(37, 36, 3.72, 1.3, 18433, 180711, 97200),
(38, 37, 3.74, 1.3, 19667, 234925, 102675),
(39, 38, 3.76, 1.3, 20952, 305403, 108300),
(40, 39, 3.78, 1.3, 22290, 397024, 114075),
(41, 40, 3.8, 1.3, 23682, 516132, 120000),
(42, 41, 3.82, 1.3, 25129, 670972, 126075),
(43, 42, 3.84, 1.3, 26631, 872264, 132300),
(44, 43, 3.86, 1.3, 28191, 944954, 138675),
(45, 44, 3.88, 1.3, 29808, 1228440, 145200),
(46, 45, 3.9, 1.3, 31485, 1596973, 151875),
(47, 46, 3.92, 1.3, 33223, 2076065, 158700),
(48, 47, 3.94, 1.3, 35022, 2698885, 165675),
(49, 48, 3.96, 1.3, 36884, 3508551, 172800),
(50, 49, 3.98, 1.3, 38809, 4561117, 180075),
(51, 50, 4, 1.3, 40801, 5929452, 187500),
(52, 51, 4.02, 1.3, 42858, 7708288, 195075),
(53, 52, 4.04, 1.3, 44983, 6680517, 202800),
(54, 53, 4.06, 1.3, 47177, 8684672, 210675),
(55, 54, 4.08, 1.3, 49440, 11290073, 218700),
(56, 55, 4.1, 1.3, 51775, 14677095, 226875),
(57, 56, 4.12, 1.3, 54183, 19080224, 235200),
(58, 57, 4.14, 1.3, 56664, 24804292, 243675),
(59, 58, 4.16, 1.3, 59220, 32245579, 252300),
(60, 59, 4.18, 1.3, 61853, 41919253, 261075),
(61, 60, 4.2, 1.3, 64563, 54495029, 270000),
(62, 61, 4.22, 1.3, 67352, 49045527, 279075),
(63, 62, 4.24, 1.3, 70221, 63759185, 288300),
(64, 63, 4.26, 1.3, 73172, 82886940, 297675),
(65, 64, 4.28, 1.3, 76205, 107753022, 307200),
(66, 65, 4.3, 1.3, 79323, 140078929, 316875),
(67, 66, 4.32, 1.3, 82526, 182102607, 326700),
(68, 67, 4.34, 1.3, 85815, 236733389, 336675),
(69, 68, 4.36, 1.3, 89194, 307753406, 346800),
(70, 69, 4.38, 1.3, 92661, 260051628, 357075),
(71, 70, 4.4, 1.3, 96220, 338067117, 367500);

-- --------------------------------------------------------

--
-- Structure de la table `labos_bases`
--

DROP TABLE IF EXISTS `labos_bases`;
CREATE TABLE IF NOT EXISTS `labos_bases` (
`id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `pourcent_down` float NOT NULL,
  `prix` int(11) NOT NULL,
  `time_construct` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Contenu de la table `labos_bases`
--

INSERT INTO `labos_bases` (`id`, `level`, `pourcent_down`, `prix`, `time_construct`) VALUES
(1, 0, 3, 453, 0),
(2, 1, 4.2, 1268, 84),
(3, 2, 5.4, 2446, 336),
(4, 3, 6.6, 3986, 756),
(5, 4, 7.8, 5889, 1344),
(6, 5, 9, 8154, 2100),
(7, 6, 10.2, 10781, 3024),
(8, 7, 11.4, 13771, 4116),
(9, 8, 12.6, 17123, 5376),
(10, 9, 13.8, 20838, 6804),
(11, 10, 15, 24915, 8400),
(12, 11, 16.2, 29354, 10164),
(13, 12, 17.4, 34156, 12096),
(14, 13, 18.6, 39320, 14196),
(15, 14, 19.8, 44847, 16464),
(16, 15, 21, 50736, 18900),
(17, 16, 22.2, 56987, 21504),
(18, 17, 23.4, 63601, 24276),
(19, 18, 24.6, 70577, 27216),
(20, 19, 25.8, 77916, 30324),
(21, 20, 27, 85617, 33600),
(22, 21, 28.2, 93680, 37044),
(23, 22, 29.4, 102106, 40656),
(24, 23, 30.6, 110894, 44436),
(25, 24, 31.8, 120045, 48384),
(26, 25, 33, 129558, 52500),
(27, 26, 34.2, 139433, 56784),
(28, 27, 35.4, 149671, 61236),
(29, 28, 36.6, 160271, 65856),
(30, 29, 37.8, 171234, 70644),
(31, 30, 39, 182559, 75600),
(32, 31, 40.2, 194246, 80724),
(33, 32, 41.4, 206296, 86016),
(34, 33, 42.6, 218708, 91476),
(35, 34, 43.8, 231483, 97104),
(36, 35, 45, 244620, 102900),
(37, 36, 46.2, 258119, 108864),
(38, 37, 47.4, 271981, 114996),
(39, 38, 48.6, 286205, 121296),
(40, 39, 49.8, 300792, 127764),
(41, 40, 51, 315741, 134400),
(42, 41, 52.2, 331052, 141204),
(43, 42, 53.4, 346726, 148176),
(44, 43, 54.6, 362762, 155316),
(45, 44, 55.8, 379161, 162624),
(46, 45, 57, 395922, 170100),
(47, 46, 58.2, 413045, 177744),
(48, 47, 59.4, 430531, 185556),
(49, 48, 60.6, 448379, 193536),
(50, 49, 61.8, 466590, 201684),
(51, 50, 63, 485163, 210000),
(52, 51, 64.2, 504098, 218484),
(53, 52, 65.4, 523396, 227136),
(54, 53, 66.6, 543056, 235956),
(55, 54, 67.8, 563079, 244944),
(56, 55, 69, 583464, 254100),
(57, 56, 70.2, 604211, 263424),
(58, 57, 71.4, 625321, 272916),
(59, 58, 72.6, 646793, 282576),
(60, 59, 73.8, 668628, 292404),
(61, 60, 75, 690825, 302400),
(62, 61, 76.2, 713384, 312564),
(63, 62, 77.4, 736306, 322896),
(64, 63, 78.6, 759590, 333396),
(65, 64, 79.8, 783237, 344064),
(66, 65, 81, 807246, 354900),
(67, 66, 82.2, 831617, 365904),
(68, 67, 83.4, 856351, 377076),
(69, 68, 84.6, 881447, 388416),
(70, 69, 85.8, 906906, 399924);

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
`id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `last_connect` varchar(50) NOT NULL,
  `avertissement` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `level_culture_vg` int(11) NOT NULL,
  `level_usine_pg` int(11) NOT NULL,
  `last_culture_vg` double NOT NULL,
  `last_usine_pg` double NOT NULL,
  `argent` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `login`
--

INSERT INTO `login` (`id`, `login`, `password`, `last_connect`, `avertissement`, `level`, `level_culture_vg`, `level_usine_pg`, `last_culture_vg`, `last_usine_pg`, `argent`) VALUES
(1, 'evengyl', 'legends', '1461504762', 0, 3, 12, 5, 41293.74, 5386.14, 0),
(2, 'tara', '5515', '1461504762', 0, 3, 12, 15, 41293.74, 46679.88, 0),
(3, 'taratata', '55157141', '', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
`id` int(11) NOT NULL,
  `titre` text NOT NULL,
  `text` varchar(255) NOT NULL,
  `date_now` varchar(50) NOT NULL,
  `visible` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

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
CREATE TABLE IF NOT EXISTS `usine_pg` (
`id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `multi_prod` float NOT NULL,
  `multi_prix` float NOT NULL,
  `production` int(11) NOT NULL,
  `prix` bigint(20) NOT NULL,
  `time_construct` bigint(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Contenu de la table `usine_pg`
--

INSERT INTO `usine_pg` (`id`, `level`, `multi_prod`, `multi_prix`, `production`, `prix`, `time_construct`) VALUES
(1, 0, 2.5, 1.5, 0, 15, 0),
(2, 1, 2.52, 1.5, 13, 23, 75),
(3, 2, 2.54, 1.5, 39, 35, 300),
(4, 3, 2.56, 1.5, 79, 53, 675),
(5, 4, 2.58, 1.5, 134, 80, 1200),
(6, 5, 2.6, 1.5, 203, 120, 1875),
(7, 6, 2.62, 1.5, 289, 180, 2700),
(8, 7, 2.64, 1.5, 391, 270, 3675),
(9, 8, 2.66, 1.5, 510, 405, 4800),
(10, 9, 2.68, 1.5, 647, 608, 6075),
(11, 10, 2.7, 1.5, 802, 912, 7500),
(12, 11, 2.72, 1.5, 977, 1368, 9075),
(13, 12, 2.74, 1.5, 1172, 2052, 10800),
(14, 13, 2.76, 1.5, 1387, 3078, 12675),
(15, 14, 2.78, 1.5, 1623, 4617, 14700),
(16, 15, 2.8, 1.5, 1882, 6926, 16875),
(17, 16, 2.82, 1.5, 2164, 10389, 19200),
(18, 17, 2.84, 1.5, 2469, 15584, 21675),
(19, 18, 2.86, 1.5, 2798, 23376, 24300),
(20, 19, 2.88, 1.5, 3152, 35064, 27075),
(21, 20, 2.9, 1.5, 3533, 52596, 30000),
(22, 21, 2.92, 1.5, 3940, 78894, 33075),
(23, 22, 2.94, 1.5, 4374, 118341, 36300),
(24, 23, 2.96, 1.5, 4837, 177512, 39675),
(25, 24, 2.98, 1.5, 5329, 266268, 43200),
(26, 25, 3, 1.5, 5851, 399402, 46875),
(27, 26, 3.02, 1.5, 6403, 599103, 50700),
(28, 27, 3.04, 1.5, 6987, 898655, 54675),
(29, 28, 3.06, 1.5, 7604, 1123320, 58800),
(30, 29, 3.08, 1.5, 8254, 1684980, 63075),
(31, 30, 3.1, 1.5, 8938, 2527470, 67500),
(32, 31, 3.12, 1.5, 9657, 3791205, 72075),
(33, 32, 3.14, 1.5, 10412, 5686807, 76800),
(34, 33, 3.16, 1.5, 11204, 5686807, 81675),
(35, 34, 3.18, 1.5, 12034, 8530210, 86700),
(36, 35, 3.2, 1.5, 12903, 12795315, 91875),
(37, 36, 3.22, 1.5, 13811, 19192973, 97200),
(38, 37, 3.24, 1.5, 14760, 28789460, 102675),
(39, 38, 3.26, 1.5, 15751, 43184190, 108300),
(40, 39, 3.28, 1.5, 16784, 44845120, 114075),
(41, 40, 3.3, 1.5, 17860, 67267680, 120000),
(42, 41, 3.32, 1.5, 18981, 100901520, 126075),
(43, 42, 3.34, 1.5, 20148, 151352280, 132300),
(44, 43, 3.36, 1.5, 21360, 227028420, 138675),
(45, 44, 3.38, 1.5, 22621, 340542630, 145200),
(46, 45, 3.4, 1.5, 23930, 332029065, 151875),
(47, 46, 3.42, 1.5, 25288, 498043597, 158700),
(48, 47, 3.44, 1.5, 26697, 747065395, 165675),
(49, 48, 3.46, 1.5, 28158, 1120598093, 172800),
(50, 49, 3.48, 1.5, 29671, 1680897139, 180075),
(51, 50, 3.5, 1.5, 31238, 1680897139, 187500),
(52, 51, 3.52, 1.5, 32860, 2521345708, 195075),
(53, 52, 3.54, 1.5, 34538, 3782018562, 202800),
(54, 53, 3.56, 1.5, 36272, 5673027843, 210675),
(55, 54, 3.58, 1.5, 38065, 8509541765, 218700),
(56, 55, 3.6, 1.5, 39917, 12764312647, 226875),
(57, 56, 3.62, 1.5, 41830, 12764312647, 235200),
(58, 57, 3.64, 1.5, 43804, 19146468970, 243675),
(59, 58, 3.66, 1.5, 45840, 28719703455, 252300),
(60, 59, 3.68, 1.5, 47941, 43079555183, 261075),
(61, 60, 3.7, 1.5, 50106, 64619332774, 270000),
(62, 61, 3.72, 1.5, 52337, 96928999161, 279075),
(63, 62, 3.74, 1.5, 54636, 100657037590, 288300),
(64, 63, 3.76, 1.5, 57003, 150985556385, 297675),
(65, 64, 3.78, 1.5, 59440, 226478334577, 307200),
(66, 65, 3.8, 1.5, 61948, 339717501866, 316875),
(67, 66, 3.82, 1.5, 64528, 509576252798, 326700),
(68, 67, 3.84, 1.5, 67181, 764364379197, 336675),
(69, 68, 3.86, 1.5, 69909, 828061410797, 346800),
(70, 69, 3.88, 1.5, 72713, 1242092116195, 357075),
(71, 70, 3.9, 1.5, 75594, 1863138174292, 367500);

--
-- Index pour les tables exportées
--

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
-- AUTO_INCREMENT pour la table `construction_en_cours`
--
ALTER TABLE `construction_en_cours`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `culture_vg`
--
ALTER TABLE `culture_vg`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT pour la table `labos_bases`
--
ALTER TABLE `labos_bases`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `usine_pg`
--
ALTER TABLE `usine_pg`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

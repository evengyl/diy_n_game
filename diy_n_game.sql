-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 02 Mai 2016 à 07:03
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
-- Structure de la table `construction_en_cours`
--

DROP TABLE IF EXISTS `construction_en_cours`;
CREATE TABLE `construction_en_cours` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name_batiment` varchar(20) NOT NULL,
  `time_finish` bigint(20) NOT NULL,
  `time_to_finish` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `construction_en_cours`
--

TRUNCATE TABLE `construction_en_cours`;
--
-- Contenu de la table `construction_en_cours`
--

INSERT INTO `construction_en_cours` (`id`, `id_user`, `name_batiment`, `time_finish`, `time_to_finish`) VALUES
(1, 1, 'level_usine_pg', 1462122814, 0);

-- --------------------------------------------------------

--
-- Structure de la table `culture_vg`
--

DROP TABLE IF EXISTS `culture_vg`;
CREATE TABLE `culture_vg` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `multi_prod` float NOT NULL,
  `multi_prix` float NOT NULL,
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

INSERT INTO `culture_vg` (`id`, `level`, `multi_prod`, `multi_prix`, `production`, `prix`, `time_construct`) VALUES
(1, 0, 3, 1.3, 0, 16, 0),
(2, 1, 3.02, 1.3, 19, 21, 75),
(3, 2, 3.04, 1.3, 56, 28, 300),
(4, 3, 3.06, 1.3, 113, 36, 675),
(5, 4, 3.08, 1.3, 190, 47, 1200),
(6, 5, 3.1, 1.3, 289, 62, 1875),
(7, 6, 3.12, 1.3, 409, 81, 2700),
(8, 7, 3.14, 1.3, 553, 106, 3675),
(9, 8, 3.16, 1.3, 719, 139, 4800),
(10, 9, 3.18, 1.3, 911, 182, 6075),
(11, 10, 3.2, 1.3, 1127, 236, 7500),
(12, 11, 3.22, 1.3, 1369, 307, 9075),
(13, 12, 3.24, 1.3, 1638, 401, 10800),
(14, 13, 3.26, 1.3, 1935, 522, 12675),
(15, 14, 3.28, 1.3, 2260, 679, 14700),
(16, 15, 3.3, 1.3, 2614, 883, 16875),
(17, 16, 3.32, 1.3, 2999, 1148, 19200),
(18, 17, 3.34, 1.3, 3414, 1493, 21675),
(19, 18, 3.36, 1.3, 3862, 1942, 24300),
(20, 19, 3.38, 1.3, 4342, 2525, 27075),
(21, 20, 3.4, 1.3, 4856, 3284, 30000),
(22, 21, 3.42, 1.3, 5404, 4270, 33075),
(23, 22, 3.44, 1.3, 5988, 5551, 36300),
(24, 23, 3.46, 1.3, 6609, 7218, 39675),
(25, 24, 3.48, 1.3, 7267, 9384, 43200),
(26, 25, 3.5, 1.3, 7963, 12199, 46875),
(27, 26, 3.52, 1.3, 8699, 15859, 50700),
(28, 27, 3.54, 1.3, 9474, 20618, 54675),
(29, 28, 3.56, 1.3, 10291, 26804, 58800),
(30, 29, 3.58, 1.3, 11151, 34846, 63075),
(31, 30, 3.6, 1.3, 12053, 45300, 67500),
(32, 31, 3.62, 1.3, 13000, 58891, 72075),
(33, 32, 3.64, 1.3, 13992, 76558, 76800),
(34, 33, 3.66, 1.3, 15030, 99526, 81675),
(35, 34, 3.68, 1.3, 16116, 129384, 86700),
(36, 35, 3.7, 1.3, 17250, 168200, 91875),
(37, 36, 3.72, 1.3, 18433, 218660, 97200),
(38, 37, 3.74, 1.3, 19667, 284259, 102675),
(39, 38, 3.76, 1.3, 20952, 369538, 108300),
(40, 39, 3.78, 1.3, 22290, 480399, 114075),
(41, 40, 3.8, 1.3, 23682, 624520, 120000),
(42, 41, 3.82, 1.3, 25129, 811876, 126075),
(43, 42, 3.84, 1.3, 26631, 1055439, 132300),
(44, 43, 3.86, 1.3, 28191, 1143394, 138675),
(45, 44, 3.88, 1.3, 29808, 1486412, 145200),
(46, 45, 3.9, 1.3, 31485, 1932337, 151875),
(47, 46, 3.92, 1.3, 33223, 2512039, 158700),
(48, 47, 3.94, 1.3, 35022, 3265651, 165675),
(49, 48, 3.96, 1.3, 36884, 4245347, 172800),
(50, 49, 3.98, 1.3, 38809, 5518952, 180075),
(51, 50, 4, 1.3, 40801, 7174637, 187500),
(52, 51, 4.02, 1.3, 42858, 9327028, 195075),
(53, 52, 4.04, 1.3, 44983, 8083426, 202800),
(54, 53, 4.06, 1.3, 47177, 10508453, 210675),
(55, 54, 4.08, 1.3, 49440, 13660988, 218700),
(56, 55, 4.1, 1.3, 51775, 17759285, 226875),
(57, 56, 4.12, 1.3, 54183, 23087071, 235200),
(58, 57, 4.14, 1.3, 56664, 30013193, 243675),
(59, 58, 4.16, 1.3, 59220, 39017151, 252300),
(60, 59, 4.18, 1.3, 61853, 50722296, 261075),
(61, 60, 4.2, 1.3, 64563, 65938985, 270000),
(62, 61, 4.22, 1.3, 67352, 59345088, 279075),
(63, 62, 4.24, 1.3, 70221, 77148614, 288300),
(64, 63, 4.26, 1.3, 73172, 100293197, 297675),
(65, 64, 4.28, 1.3, 76205, 130381157, 307200),
(66, 65, 4.3, 1.3, 79323, 169495504, 316875),
(67, 66, 4.32, 1.3, 82526, 220344154, 326700),
(68, 67, 4.34, 1.3, 85815, 286447401, 336675),
(69, 68, 4.36, 1.3, 89194, 372381621, 346800),
(70, 69, 4.38, 1.3, 92661, 314662470, 357075),
(71, 70, 4.4, 1.3, 96220, 409061212, 367500);

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
  `password` varchar(50) NOT NULL,
  `last_connect` varchar(50) NOT NULL,
  `avertissement` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `level_culture_vg` int(11) NOT NULL,
  `level_usine_pg` int(11) NOT NULL,
  `level_labos_bases` int(11) NOT NULL,
  `last_culture_vg` double NOT NULL,
  `last_usine_pg` double NOT NULL,
  `last_labos_bases` float NOT NULL,
  `argent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `login`
--

TRUNCATE TABLE `login`;
--
-- Contenu de la table `login`
--

INSERT INTO `login` (`id`, `login`, `password`, `last_connect`, `avertissement`, `level`, `level_culture_vg`, `level_usine_pg`, `level_labos_bases`, `last_culture_vg`, `last_usine_pg`, `last_labos_bases`, `argent`) VALUES
(1, 'evengyl', 'legends', '1462106245', 0, 3, 13, 6, 12, 337108.4, 46258.24, 17.4, 100000),
(2, 'tara', '5515', '1462106245', 0, 3, 13, 16, 12, 337108.4, 378583.52, 17.4, 0),
(3, 'taratata', '55157141', '1462106245', 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
  `multi_prod` float NOT NULL,
  `multi_prix` float NOT NULL,
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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

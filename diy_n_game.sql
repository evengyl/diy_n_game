-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 03 Mai 2016 à 16:56
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
-- Structure de la table `bases`
--

DROP TABLE IF EXISTS `bases`;
CREATE TABLE IF NOT EXISTS `bases` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `20_80` int(11) NOT NULL,
  `50_50` int(11) NOT NULL,
  `80_20` int(11) NOT NULL,
  `100_0` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Vider la table avant d'insérer `bases`
--

TRUNCATE TABLE `bases`;
--
-- Contenu de la table `bases`
--

INSERT INTO `bases` (`id`, `id_user`, `20_80`, `50_50`, `80_20`, `100_0`) VALUES
(1, 6, 100, 150, 123, 1500);

-- --------------------------------------------------------

--
-- Structure de la table `construction_en_cours`
--

DROP TABLE IF EXISTS `construction_en_cours`;
CREATE TABLE IF NOT EXISTS `construction_en_cours` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name_batiment` varchar(20) NOT NULL,
  `time_finish` bigint(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

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
CREATE TABLE IF NOT EXISTS `culture_vg` (
`id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `production` int(11) NOT NULL,
  `prix` bigint(11) NOT NULL,
  `time_construct` bigint(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

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
CREATE TABLE IF NOT EXISTS `labos_bases` (
`id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `pourcent_down` float NOT NULL,
  `prix` int(11) NOT NULL,
  `time_construct` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

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
CREATE TABLE IF NOT EXISTS `login` (
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
  `argent` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Vider la table avant d'insérer `login`
--

TRUNCATE TABLE `login`;
--
-- Contenu de la table `login`
--

INSERT INTO `login` (`id`, `login`, `password`, `last_connect`, `avertissement`, `level`, `level_culture_vg`, `level_usine_pg`, `level_labos_bases`, `last_culture_vg`, `last_usine_pg`, `argent`) VALUES
(5, 'taratata', '$2y$10$evHVF.RtUxFNbh2zRgLXDO4vhrSZo9KYy4bP8UkEfPa', '1462284972', 0, 0, 1, 1, 0, 5.2629, 3.5748, 0),
(6, 'evengyl', '$2y$10$M/3CDXvOtM.6TIX4J7n9AOKVJoolp2G1KN0ECgqfj/7', '1462284972', 0, 0, 3, 3, 1, 31.1802, 21.7467, 465),
(7, 'jasonbg', '$2y$10$iamP068nGvNQbAtcxl3gR.POZHf3BAFLQDyhpSQmo9n', '1462287390', 0, 0, 0, 0, 0, 0, 0, 0);

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
CREATE TABLE IF NOT EXISTS `usine_pg` (
`id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `production` int(11) NOT NULL,
  `prix` bigint(20) NOT NULL,
  `time_construct` bigint(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

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
-- AUTO_INCREMENT pour la table `bases`
--
ALTER TABLE `bases`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `construction_en_cours`
--
ALTER TABLE `construction_en_cours`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT pour la table `culture_vg`
--
ALTER TABLE `culture_vg`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT pour la table `labos_bases`
--
ALTER TABLE `labos_bases`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
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

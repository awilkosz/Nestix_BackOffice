-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 04 fév. 2020 à 17:57
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `nestix`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteHumanById` (IN `asHuman_id` INT(6))  BEGIN
 DELETE FROM `composed_by` WHERE `composed_by`.`human_id` = asHuman_id;
 DELETE FROM `come_from` WHERE `come_from`.`human_id` = asHuman_id;
 DELETE FROM `appreciation` WHERE `appreciation`.`human_id` = asHuman_id;
 DELETE FROM `awarded` WHERE `awarded`.`human_id` = asHuman_id;
 DELETE FROM `collection` WHERE `collection`.`human_id` = asHuman_id;
 DELETE FROM `take_part_in` WHERE `take_part_in`.`human_id` = asHuman_id;
 DELETE FROM `users` WHERE `users`.`human_id` = asHuman_id;
 DELETE FROM `artist` WHERE `artist`.`human_id` = asHuman_id;
 DELETE FROM `human` WHERE `human`.`human_id` = asHuman_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteMediaById` (IN `asMedia_id` INT(6))  BEGIN
 DELETE FROM `produced_by` WHERE `produced_by`.`media_id` = asMedia_id;
 DELETE FROM `competed_in` WHERE `competed_in`.`media_id` = asMedia_id;
 DELETE FROM `is_associated_with` WHERE `is_associated_with`.`media_id` = asMedia_id;
 DELETE FROM `categorized_by` WHERE `categorized_by`.`media_id` = asMedia_id;
 DELETE FROM `status` WHERE `status`.`media_id` = asMedia_id;
 DELETE FROM `appreciation` WHERE `appreciation`.`media_id` = asMedia_id;
 DELETE FROM `contains` WHERE `contains`.`media_id` = asMedia_id;
 DELETE FROM `take_part_in` WHERE `take_part_in`.`media_id` = asMedia_id;
 DELETE FROM `associated_with` WHERE `associated_with`.`media_id` = asMedia_id;
 DELETE FROM `book` WHERE `book`.`book_id` = asMedia_id;
 DELETE FROM `song` WHERE `song`.`song_id` = asMedia_id;
 DELETE FROM `movie` WHERE `movie`.`movie_id` = asMedia_id;
 DELETE FROM `media` WHERE `media`.`media_id` = asMedia_id;
END$$

--
-- Fonctions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `percentageBook` () RETURNS FLOAT BEGIN
 DECLARE sommeMedia INT DEFAULT 0;
 DECLARE sommeBook INT DEFAULT 0;
 DECLARE pourcBook FLOAT DEFAULT 0;
 SELECT COUNT(*) INTO sommeMedia FROM media;
 SELECT COUNT(*) INTO sommeBook FROM media WHERE media_type="Livre";
 SET pourcBook = (sommeBook / sommeMedia) * 100;
 RETURN pourcBook;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `percentageMovie` () RETURNS FLOAT BEGIN
 DECLARE sommeMedia INT DEFAULT 0;
 DECLARE sommeFilm INT DEFAULT 0;
 DECLARE pourcFilm FLOAT DEFAULT 0;
 SELECT COUNT(*) INTO sommeMedia FROM media;
 SELECT COUNT(*) INTO sommeFilm FROM media WHERE media_type="Film";
 SET pourcFilm = (sommeFilm / sommeMedia) * 100;
 RETURN pourcFilm;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `percentageSong` () RETURNS FLOAT BEGIN
 DECLARE sommeMedia INT DEFAULT 0;
 DECLARE sommeSong INT DEFAULT 0;
 DECLARE pourcSong FLOAT DEFAULT 0;
 SELECT COUNT(*) INTO sommeMedia FROM media;
 SELECT COUNT(*) INTO sommeSong FROM media WHERE media_type="Chanson";
 SET pourcSong = (sommeSong / sommeMedia) * 100;
 RETURN pourcSong;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `all_books`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `all_books` (
`media_id` int(11)
,`media_title` varchar(255)
,`media_year` int(4)
,`asv_id` int(6)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `all_movies`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `all_movies` (
`media_id` int(11)
,`media_title` varchar(255)
,`media_year` int(4)
,`asv_id` int(6)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `all_songs`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `all_songs` (
`media_id` int(11)
,`media_title` varchar(255)
,`media_year` int(4)
,`asv_id` int(6)
);

-- --------------------------------------------------------

--
-- Structure de la table `annee`
--

CREATE TABLE `annee` (
  `annee` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `annee`
--

INSERT INTO `annee` (`annee`) VALUES
(1900),
(1901),
(1902),
(1903),
(1904),
(1905),
(1906),
(1907),
(1908),
(1909),
(1910),
(1911),
(1912),
(1913),
(1914),
(1915),
(1916),
(1917),
(1918),
(1919),
(1920),
(1921),
(1922),
(1923),
(1924),
(1925),
(1926),
(1927),
(1928),
(1929),
(1930),
(1931),
(1932),
(1933),
(1934),
(1935),
(1936),
(1937),
(1938),
(1939),
(1940),
(1941),
(1942),
(1943),
(1944),
(1945),
(1946),
(1947),
(1948),
(1949),
(1950),
(1951),
(1952),
(1953),
(1954),
(1955),
(1956),
(1957),
(1958),
(1959),
(1960),
(1961),
(1962),
(1963),
(1964),
(1965),
(1966),
(1967),
(1968),
(1969),
(1970),
(1971),
(1972),
(1973),
(1974),
(1975),
(1976),
(1977),
(1978),
(1979),
(1980),
(1981),
(1982),
(1983),
(1984),
(1985),
(1986),
(1987),
(1988),
(1989),
(1990),
(1991),
(1992),
(1993),
(1994),
(1995),
(1996),
(1997),
(1998),
(1999),
(2000),
(2001),
(2002),
(2003),
(2004),
(2005),
(2006),
(2007),
(2008),
(2009),
(2010),
(2011),
(2012),
(2013),
(2014),
(2015),
(2016),
(2017),
(2018),
(2019),
(2020);

-- --------------------------------------------------------

--
-- Structure de la table `appreciation`
--

CREATE TABLE `appreciation` (
  `appr_id` int(11) NOT NULL,
  `appr_note` smallint(6) DEFAULT NULL,
  `appr_com` text,
  `appr_date` date DEFAULT NULL,
  `human_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `appreciation`
--

INSERT INTO `appreciation` (`appr_id`, `appr_note`, `appr_com`, `appr_date`, `human_id`, `media_id`) VALUES
(1, 5, 'C\'est quoi ce film, déjà?', '2020-01-11', 9, 17),
(2, 2, 'Mouais bof... peu mieux faire.', '2020-01-10', 8, 17),
(3, 3, NULL, '2020-01-12', 7, 17),
(4, 5, 'Génial!', '2020-01-01', 5, 17),
(5, 4, 'C\'est génial !', NULL, 7, 112);

--
-- Déclencheurs `appreciation`
--
DELIMITER $$
CREATE TRIGGER `deleted_appr_com` BEFORE UPDATE ON `appreciation` FOR EACH ROW INSERT INTO old_appr_com (id, appr_id, appr_com, appr_note, timestamp) VALUES (NULL, OLD.appr_id, OLD.appr_com, OLD.appr_note, CURRENT_TIMESTAMP)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `artist`
--

CREATE TABLE `artist` (
  `human_id` int(11) NOT NULL,
  `artist_dod` date DEFAULT NULL,
  `artist_nickname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `artist`
--

INSERT INTO `artist` (`human_id`, `artist_dod`, `artist_nickname`) VALUES
(1, NULL, 'Will Smith'),
(2, NULL, 'René La Taupe'),
(3, NULL, 'Chris Colombus'),
(4, NULL, 'Alfonso'),
(10, NULL, 'Emma Watson'),
(12, NULL, 'Geri Halliwell'),
(13, NULL, 'Vicoria Beckham'),
(14, NULL, 'Melanie Brown'),
(15, NULL, 'Melanie Chisholm'),
(16, NULL, 'Emma Bunton'),
(17, NULL, 'Renée Zellweger'),
(18, NULL, 'JK Rowling'),
(19, NULL, 'Nicolas Mathieu'),
(20, NULL, 'Eric Vuillard'),
(21, NULL, 'Sally Hawkins'),
(22, NULL, 'Michael Shannon'),
(23, NULL, 'Richard Jenkins'),
(24, NULL, 'Guillermo del Toro'),
(25, NULL, 'Alejandro González Iñárritu'),
(26, NULL, 'Mariah Carey'),
(27, NULL, 'Justin Bieber'),
(28, NULL, 'Elena Ferrante'),
(29, NULL, 'Dan Black'),
(50, NULL, 'Tommy Lee Jones'),
(51, NULL, 'Linda Fiorentino'),
(52, NULL, 'Barry Sonnenfeld'),
(53, NULL, 'William Golding'),
(54, NULL, 'Mathieu Madenian'),
(55, NULL, 'Christelle Parlanti'),
(56, NULL, 'Omar Sy'),
(57, NULL, 'François Cluzet'),
(58, NULL, 'Anne Le Ny'),
(59, NULL, 'Dan Stevens'),
(60, NULL, 'Bill Condon');

-- --------------------------------------------------------

--
-- Structure de la table `associated_with`
--

CREATE TABLE `associated_with` (
  `media_id` int(11) NOT NULL,
  `work_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `associated_with`
--

INSERT INTO `associated_with` (`media_id`, `work_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(16, 1),
(13, 2),
(14, 2),
(15, 2),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(16, 4);

-- --------------------------------------------------------

--
-- Structure de la table `asvalidation`
--

CREATE TABLE `asvalidation` (
  `asv_id` smallint(6) NOT NULL,
  `asv_status` enum('En attente','Refusé','Validé','Bloqué') DEFAULT NULL,
  `asv_source` enum('Admin','User') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `asvalidation`
--

INSERT INTO `asvalidation` (`asv_id`, `asv_status`, `asv_source`) VALUES
(1, 'Validé', NULL),
(2, 'En attente', NULL),
(3, 'Refusé', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `award`
--

CREATE TABLE `award` (
  `award_id` int(11) NOT NULL,
  `award_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `award`
--

INSERT INTO `award` (`award_id`, `award_name`) VALUES
(1, 'Meilleur Film'),
(11, 'Meilleurs maquillages'),
(12, 'Meilleure vidéo');

-- --------------------------------------------------------

--
-- Structure de la table `awarded`
--

CREATE TABLE `awarded` (
  `human_id` int(11) NOT NULL,
  `award_id` int(11) NOT NULL,
  `ceremony_id` smallint(6) NOT NULL,
  `year` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `band`
--

CREATE TABLE `band` (
  `band_id` int(11) NOT NULL,
  `band_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `band`
--

INSERT INTO `band` (`band_id`, `band_name`) VALUES
(1, 'Spice Girls'),
(2, 'The Servant');

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `ISBN` int(15) DEFAULT NULL,
  `book_synop` text,
  `book_tome` smallint(6) DEFAULT NULL,
  `book_saga` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`book_id`, `ISBN`, `book_synop`, `book_tome`, `book_saga`) VALUES
(7, NULL, NULL, NULL, NULL),
(8, NULL, NULL, 2017, NULL),
(9, 2070643026, 'Le jour de ses onze ans, Harry Potter, un orphelin élevé par un oncle et une tante qui le détestent, voit son existence bouleversée. Un géant nommé Hagrid,vient le chercher pour l\'emmener à Poudlard, une école de sorcellerie ! Voler en balai, jeter des sorts, combattre les trolls : Harry se révèle un sorcier doué. Mais quel est le mystère qui l\'entoure ? Et qui est l\'effroyable V..., le mage dont personne n\'ose prononcer le nom ?', 1, 'Harry Potter'),
(10, 2070524558, 'Une rentrée fracassante en voiture volante, une étrange malédiction qui s\'abat sur les élèves, cette deuxième année à l\'école des sorciers ne s\'annonce pas de tout repos ! Entre les cours de potions magiques, les matches de Quidditch et les combats de mauvais sorts, Harry Potter trouvera-t-il le temps de percer le mystère de la Chambre des Secrets ? Un livre magique pour sorciers confirmés.', 2, 'Harry Potter'),
(20, 2072740584, '«Comme toujours, Lila s\'attribuait le devoir de me planter une aiguille dans le cœur, non pour qu\'il s\'arrête mais pour qu\'il batte plus fort.» Elena, devenue auteure reconnue, vit au gré de ses escapades avec son amant entre Milan, Florence et Naples. Parce qu\'elle s\'est éloignée du quartier populaire où elle a grandi, Elena redoute les retrouvailles avec son amie d\'enfance. Mais depuis quelque temps, Lila insiste pour la voir et lui parler¿ La saga se conclut en apothéose après avoir embrassé soixante ans d\'histoire des deux femmes et de l\'Italie, des années 1950 à nos jours. L\'enfant perdue est le dernier tome de la saga d\'Elena Ferrante. Il succède à L\'amie prodigieuse, Le nouveau nom et Celle qui fuit et celle qui reste.', 4, 'L\'Amie prodigieuse'),
(106, NULL, NULL, NULL, NULL),
(107, NULL, NULL, NULL, NULL),
(111, NULL, NULL, NULL, NULL),
(112, NULL, NULL, NULL, NULL),
(113, NULL, NULL, NULL, NULL),
(114, NULL, NULL, NULL, NULL),
(120, 426359, '                                Nouv synop                                ', NULL, 'nouv saga');

-- --------------------------------------------------------

--
-- Structure de la table `categorized_by`
--

CREATE TABLE `categorized_by` (
  `media_id` int(11) NOT NULL,
  `genre_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorized_by`
--

INSERT INTO `categorized_by` (`media_id`, `genre_id`) VALUES
(18, 1),
(18, 2),
(105, 2),
(108, 2),
(105, 4),
(1, 5),
(2, 5),
(3, 5),
(4, 5),
(5, 5),
(6, 5),
(9, 5),
(10, 5),
(11, 5),
(12, 5),
(17, 5),
(109, 5),
(111, 5),
(17, 7),
(105, 7),
(109, 13),
(109, 17),
(13, 23),
(19, 24),
(105, 24),
(110, 24),
(20, 26),
(106, 26),
(107, 36);

-- --------------------------------------------------------

--
-- Structure de la table `ceremony`
--

CREATE TABLE `ceremony` (
  `ceremony_id` smallint(6) NOT NULL,
  `ceremony_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ceremony`
--

INSERT INTO `ceremony` (`ceremony_id`, `ceremony_name`) VALUES
(1, 'Prix Goncourt'),
(2, 'César'),
(3, 'Oscar'),
(4, 'Grammy Awards'),
(5, 'Brit Awards'),
(6, 'Razzie Awards'),
(7, 'Festival de Cannes'),
(8, 'Prix Femina'),
(9, 'Victoires de la musique'),
(10, 'Berlinale');

-- --------------------------------------------------------

--
-- Structure de la table `city`
--

CREATE TABLE `city` (
  `city_id` smallint(6) NOT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  `country_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `country_id`) VALUES
(1, 'Bordeaux', 1),
(2, 'Montpellier', 1),
(3, 'Montréal', 2),
(4, 'Toronto', 2),
(5, 'Sète', 1),
(6, 'Paris', 1);

-- --------------------------------------------------------

--
-- Structure de la table `collection`
--

CREATE TABLE `collection` (
  `collect_id` int(11) NOT NULL,
  `collect_date_creat` date DEFAULT NULL,
  `collect_title` varchar(255) DEFAULT NULL,
  `human_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `collection`
--

INSERT INTO `collection` (`collect_id`, `collect_date_creat`, `collect_title`, `human_id`) VALUES
(1, '2019-12-10', 'Ma playlist préférée', 6),
(2, '2020-01-11', 'Première collection', 9);

-- --------------------------------------------------------

--
-- Structure de la table `come_from`
--

CREATE TABLE `come_from` (
  `human_id` int(11) NOT NULL,
  `country_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `come_from`
--

INSERT INTO `come_from` (`human_id`, `country_id`) VALUES
(2, 1),
(1, 3),
(3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `competed_in`
--

CREATE TABLE `competed_in` (
  `media_id` int(11) NOT NULL,
  `award_id` int(11) NOT NULL,
  `ceremony_id` smallint(6) NOT NULL,
  `year` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `competed_in`
--

INSERT INTO `competed_in` (`media_id`, `award_id`, `ceremony_id`, `year`) VALUES
(17, 1, 3, 2018),
(18, 1, 3, 2015),
(105, 11, 3, 1998),
(105, 12, 5, 1996);

-- --------------------------------------------------------

--
-- Structure de la table `composed_by`
--

CREATE TABLE `composed_by` (
  `human_id` int(11) NOT NULL,
  `band_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `composed_by`
--

INSERT INTO `composed_by` (`human_id`, `band_id`) VALUES
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(29, 2);

-- --------------------------------------------------------

--
-- Structure de la table `contains`
--

CREATE TABLE `contains` (
  `media_id` int(11) NOT NULL,
  `collect_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contains`
--

INSERT INTO `contains` (`media_id`, `collect_id`) VALUES
(19, 1),
(13, 2),
(21, 2);

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

CREATE TABLE `country` (
  `country_id` smallint(6) NOT NULL,
  `country_name` varchar(50) DEFAULT NULL,
  `country_flag` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `country_flag`) VALUES
(1, 'France', NULL),
(2, 'Canada', NULL),
(3, 'Etats-Unis', NULL),
(4, 'Grande Bretagne', NULL),
(5, 'Belgique', NULL),
(6, 'Suisse', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `deleted_media`
--

CREATE TABLE `deleted_media` (
  `id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `media_title` varchar(255) NOT NULL,
  `media_type` enum('Film','Chanson','Livre') DEFAULT NULL,
  `media_year` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `deleted_media`
--

INSERT INTO `deleted_media` (`id`, `media_id`, `media_title`, `media_type`, `media_year`, `timestamp`) VALUES
(1, 99, 'aqq', 'Film', 3000, '2020-01-16 10:33:08'),
(2, 105, 'tref', 'Film', 2001, '2020-01-16 20:25:04'),
(3, 107, 'gg', 'Chanson', 200, '2020-01-16 20:27:17'),
(4, 106, 'hhhgggg', 'Film', 2001, '2020-01-16 20:44:53'),
(5, 107, 'gg', 'Chanson', 200, '2020-01-16 20:45:12'),
(6, 108, 'rgw', 'Livre', 2001, '2020-01-16 20:45:20'),
(7, 102, 'test_trigger_film', 'Film', 2000, '2020-01-23 19:04:21'),
(8, 98, 'eee', 'Film', 2600, '2020-01-23 19:04:26'),
(9, 91, 'biiiip', 'Film', 2000, '2020-01-23 19:04:28'),
(10, 86, 'testets', 'Film', 2000, '2020-01-23 19:04:30'),
(11, 92, 'ttt', 'Film', 2000, '2020-01-23 19:04:32'),
(12, 83, 'TestAjout', 'Film', 2000, '2020-01-23 19:04:33'),
(13, 88, 'eee', 'Film', 2000, '2020-01-23 19:04:35'),
(14, 100, 'bbb', 'Film', 3000, '2020-01-23 19:04:37'),
(15, 94, 'ggg', 'Film', 2000, '2020-01-23 19:04:39'),
(16, 95, 'fffd', 'Film', 2000, '2020-01-23 19:04:41'),
(17, 96, 'aaa', 'Film', 2003, '2020-01-23 19:04:43'),
(18, 97, 'dddss', 'Film', 2003, '2020-01-23 19:04:45'),
(19, 85, 'TestAjout2', 'Film', 2000, '2020-01-23 19:04:48'),
(20, 80, 'TestMODIF3', 'Film', 2015, '2020-01-23 19:04:50'),
(21, 51, 'dqsdsq', 'Film', 1876, '2020-01-23 19:04:52'),
(22, 81, 'T2estModif', 'Film', 123345, '2020-01-23 19:04:54'),
(23, 101, 'mmm', 'Film', 3000, '2020-01-23 19:04:57'),
(24, 32, 'test', 'Film', 2000, '2020-01-23 19:04:59'),
(25, 41, 'TEst111', 'Film', 1234, '2020-01-23 19:05:02'),
(26, 44, 'dqsdsq', 'Film', 1234, '2020-01-23 19:05:04'),
(27, 50, 'dqsd', 'Film', 1234, '2020-01-23 19:05:06'),
(28, 103, 'test_trigger_chanson', 'Chanson', 2000, '2020-01-23 19:05:16'),
(29, 63, 'TestChanson7', 'Chanson', 1992, '2020-01-23 19:05:19'),
(30, 34, 'test', 'Chanson', 1900, '2020-01-23 19:05:22'),
(31, 69, 'Test165', 'Chanson', 1991, '2020-01-23 19:05:24'),
(32, 70, 'TestFinMODIFF', 'Chanson', 1991, '2020-01-23 19:05:26'),
(33, 66, 'Test98', 'Chanson', 1991, '2020-01-23 19:05:28'),
(34, 62, 'Testchanson6', 'Chanson', 1998, '2020-01-23 19:05:30'),
(35, 67, 'TEsT98321', 'Chanson', 1990, '2020-01-23 19:05:32'),
(36, 61, 'Testchanson4', 'Chanson', 1992, '2020-01-23 19:05:34'),
(37, 104, 'test_trigger_livre', 'Livre', 2000, '2020-01-23 19:05:38'),
(38, 72, 'TestTitre2', 'Livre', 1991, '2020-01-23 19:05:40'),
(39, 73, 'TestTitre4', 'Livre', 1992, '2020-01-23 19:05:42'),
(40, 71, 'TestLivre1', 'Livre', 1990, '2020-01-23 19:05:45'),
(41, 33, 'test', 'Livre', 1999, '2020-01-23 19:05:48'),
(42, 77, 'TestTitre5MOD', 'Livre', 1994, '2020-01-23 19:05:51'),
(43, 82, 'TestTitre5Modif', 'Livre', 1993, '2020-01-23 19:05:55'),
(44, 118, 'test1', 'Film', 2020, '2020-01-31 10:19:12');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `genre_id` smallint(6) NOT NULL,
  `genre_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_name`) VALUES
(1, 'Drame'),
(2, 'Comédie'),
(3, 'Thriller'),
(4, 'Action'),
(5, 'Fantastique'),
(6, 'Horreur'),
(7, 'Science Fiction'),
(8, 'Polar'),
(9, 'Historique'),
(10, 'Animation'),
(11, 'Western'),
(12, 'Parodie'),
(13, 'Comédie Musicale'),
(14, 'Documentaire'),
(15, 'Blockbuster'),
(16, 'Road Movie'),
(17, 'Romantique'),
(18, 'Culte'),
(19, 'D\'aventure'),
(20, 'Rock'),
(21, 'Chanson française'),
(22, 'Indé'),
(23, 'Punk'),
(24, 'Pop'),
(25, 'Classique'),
(26, 'Roman'),
(27, 'Poésie'),
(28, 'Théâtre'),
(29, 'Biographie'),
(36, 'Anthologie');

-- --------------------------------------------------------

--
-- Structure de la table `human`
--

CREATE TABLE `human` (
  `human_id` int(11) NOT NULL,
  `human_lastname` varchar(100) DEFAULT NULL,
  `human_firstname` varchar(100) DEFAULT NULL,
  `human_sex` enum('Homme','Femme','Non binaire') DEFAULT NULL,
  `human_dob` date DEFAULT NULL,
  `human_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `human`
--

INSERT INTO `human` (`human_id`, `human_lastname`, `human_firstname`, `human_sex`, `human_dob`, `human_pic`) VALUES
(1, 'Smith', 'Will', 'Homme', '1968-09-25', NULL),
(2, 'La Taupe', 'René', 'Non binaire', NULL, NULL),
(3, 'Colombus', 'Chris', 'Homme', '1958-09-10', NULL),
(4, 'Cuarón', 'Alfonso', 'Homme', '1961-11-28', NULL),
(5, 'Serra', 'Jahân', 'Homme', NULL, NULL),
(6, 'Mathias', 'Mickael', 'Homme', NULL, NULL),
(7, 'Wilkosz', 'Aurélien', 'Homme', NULL, NULL),
(8, 'Pompeani', 'Frank', 'Homme', NULL, NULL),
(9, 'Lechaix', 'Laure', 'Femme', '1988-01-19', NULL),
(10, 'Watson', 'Emma', 'Femme', '1990-04-15', NULL),
(11, 'LeRelou', 'Toto', 'Homme', NULL, NULL),
(12, 'Halliwell', 'Geri', 'Femme', NULL, NULL),
(13, 'Beckham', 'Victoria', 'Femme', NULL, NULL),
(14, 'Brown', 'Melanie', 'Femme', NULL, NULL),
(15, 'Chisholm', 'Melanie', 'Femme', NULL, NULL),
(16, 'Bunton', 'Emma', 'Femme', NULL, NULL),
(17, 'Zellweger', 'Renée', 'Femme', '1969-04-25', NULL),
(18, 'Rowling', 'J. K.', 'Femme', '1965-07-31', NULL),
(19, 'Mathieu', 'Nicolas', 'Homme', NULL, NULL),
(20, 'Vuillard', 'Eric', 'Homme', NULL, NULL),
(21, 'Hawkins', 'Sally', 'Femme', '1976-04-27', NULL),
(22, 'Shannon', 'Michael', 'Homme', '1974-08-07', NULL),
(23, 'Jenkins', 'Richard', 'Homme', '1947-05-04', NULL),
(24, 'del Toro', 'Guillermo', 'Homme', '1964-10-09', ''),
(25, 'González Iñárritu', 'Alejandro', 'Homme', '1963-08-15', NULL),
(26, 'Carey', 'Mariah', 'Femme', '1970-03-27', NULL),
(27, 'Bieber', 'Justin', 'Homme', '1994-03-01', NULL),
(28, 'Ferrante', 'Elena', 'Femme', '1943-10-18', NULL),
(29, 'Black', 'Dan', 'Homme', NULL, NULL),
(32, 'Binoche', 'Juliette', 'Homme', '1975-05-01', NULL),
(50, NULL, NULL, NULL, NULL, NULL),
(51, NULL, NULL, NULL, NULL, NULL),
(52, NULL, NULL, NULL, NULL, NULL),
(53, NULL, NULL, NULL, NULL, NULL),
(54, NULL, NULL, NULL, NULL, NULL),
(55, NULL, NULL, NULL, NULL, NULL),
(56, NULL, NULL, NULL, NULL, NULL),
(57, NULL, NULL, NULL, NULL, NULL),
(58, NULL, NULL, NULL, NULL, NULL),
(59, NULL, NULL, NULL, NULL, NULL),
(60, NULL, NULL, NULL, NULL, NULL),
(61, 'WILKOSZ', 'Aurélien', 'Homme', NULL, NULL),
(62, 'Jean-Michel', 'JarJar', NULL, NULL, NULL),
(63, NULL, NULL, NULL, NULL, NULL),
(64, 'toto', '', NULL, NULL, ''),
(65, NULL, NULL, NULL, NULL, NULL),
(66, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `is_associated_with`
--

CREATE TABLE `is_associated_with` (
  `media_id` int(11) NOT NULL,
  `tag_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `is_associated_with`
--

INSERT INTO `is_associated_with` (`media_id`, `tag_id`) VALUES
(19, 3),
(109, 5),
(14, 6),
(107, 6),
(105, 10),
(13, 11),
(17, 12),
(1, 17),
(2, 17),
(3, 17),
(4, 17),
(5, 17),
(6, 17),
(9, 17),
(10, 17),
(11, 17),
(12, 17),
(108, 18),
(109, 20),
(111, 20),
(17, 21),
(18, 21),
(106, 27),
(106, 28),
(20, 39),
(17, 40),
(105, 47),
(105, 48),
(108, 49);

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `media_title` varchar(255) NOT NULL,
  `media_type` enum('Film','Chanson','Livre','') DEFAULT NULL,
  `media_year` int(4) NOT NULL,
  `media_cover` varchar(255) DEFAULT NULL,
  `media_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`media_id`, `media_title`, `media_type`, `media_year`, `media_cover`, `media_link`) VALUES
(1, 'Harry Potter à l\'école des sorciers', 'Film', 2001, 'img/harry-potter-and-the-philosopher-stone.jpg', NULL),
(2, 'Harry Potter et la Chambre des secrets', 'Film', 2002, 'img/harry-potter-and-the-chamber-of-secrets.jpg', NULL),
(3, 'Harry Potter et le Prisonnier d\'Azkaban', 'Film', 2004, NULL, NULL),
(4, 'Harry Potter et la Coupe de feu', 'Film', 2005, NULL, NULL),
(5, 'Harry Potter et l\'Ordre du phénix', 'Film', 2007, NULL, NULL),
(6, 'Harry Potter et le Prince de sang-mêlé', 'Film', 2009, NULL, NULL),
(7, 'Leurs enfants après eux', 'Livre', 2018, NULL, NULL),
(8, 'L\'Ordre du jour', 'Livre', 0, NULL, NULL),
(9, 'Harry Potter à l\'école des sorciers', 'Livre', 1997, NULL, NULL),
(10, 'Harry Potter et la Chambre des secrets', 'Livre', 1998, NULL, NULL),
(11, 'Harry Potter et le Prisonnier d\'Azkaban', 'Livre', 0, NULL, NULL),
(12, 'Harry Potter et la Coupe de feu', 'Livre', 0, NULL, NULL),
(13, 'Wannabe', 'Chanson', 1996, NULL, 'testlien'),
(14, 'Mignon Mignon', 'Chanson', 2008, NULL, NULL),
(15, 'It\'s raining men', 'Chanson', 2001, 'img/test.jpg', 'commercial.com'),
(16, 'Le Journal de Bridget Jones', 'Film', 2001, NULL, NULL),
(17, 'La Forme de l\'eau', 'Film', 2017, NULL, NULL),
(18, 'Birdman', 'Film', 2014, 'img/exemple.jpg', 'commercial.com'),
(19, 'All I Want for Christmas Is You', 'Chanson', 2011, NULL, NULL),
(20, 'L\'Enfant perdue', 'Livre', 2019, NULL, NULL),
(21, 'U + Me', 'Chanson', 2009, NULL, NULL),
(105, 'Man in Black', 'Film', 1997, NULL, 'http://www.allocine.fr/film/fichefilm-10700/telecharger-vod/'),
(106, 'Sa Majesté des Mouches', 'Livre', 1983, NULL, 'https://livre.fnac.com/a1133706/Ray-Bradbury-Fahrenheit-451'),
(107, 'Allez tous vous faire enculer', 'Livre', 2017, NULL, 'https://livre.fnac.com/a10162018/Mathieu-Madenian-Allez-tous-vous-faire-enculer'),
(108, 'Intouchables', 'Film', 2011, NULL, 'http://www.allocine.fr/film/fichefilm-182745/telecharger-vod/'),
(109, 'La Belle et la Bête', 'Film', 2017, NULL, 'http://www.allocine.fr/film/fichefilm-228322/telecharger-vod/'),
(110, 'Orchestra', 'Chanson', 200, NULL, 'https://www.youtube.com/watch?v=8A5Z8HLjZl0'),
(111, 'Les Animaux fantastiques', 'Livre', 2001, NULL, NULL),
(112, 'Le rouge et le noir', 'Livre', 1830, NULL, NULL),
(113, 'Notre dame de Paris', 'Livre', 1831, NULL, NULL),
(114, '1984', 'Livre', 1949, NULL, NULL),
(115, 'Les choristes', 'Film', 2004, NULL, NULL),
(116, 'La marmelade de ma grand mère', 'Chanson', 2015, NULL, NULL),
(117, 'La guerre des étoiles', 'Chanson', 1977, NULL, NULL),
(119, 'test2', 'Livre', 2020, NULL, NULL),
(120, 'test livre', 'Livre', 2000, NULL, 'sdvcyt'),
(121, 'npuveau film', 'Film', 1996, NULL, 'lien du film'),
(122, 'Nouvelle chanson', 'Chanson', 2000, NULL, 'lien chanson');

--
-- Déclencheurs `media`
--
DELIMITER $$
CREATE TRIGGER `creation_media_by_type` AFTER INSERT ON `media` FOR EACH ROW BEGIN
IF NEW.media_type = 'Film' THEN
    INSERT INTO movie (movie_id) VALUES (NEW.media_id);
END IF;
IF NEW.media_type = 'Chanson' THEN
    INSERT INTO song (song_id) VALUES (NEW.media_id);
END IF;
IF NEW.media_type = 'Livre' THEN
    INSERT INTO book (book_id) VALUES (NEW.media_id);
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `media_delete` BEFORE DELETE ON `media` FOR EACH ROW INSERT INTO deleted_media (id, media_id, media_title, media_type, media_year, timestamp) VALUES (NULL, OLD.media_id, OLD.media_title, OLD.media_type, OLD.media_year, CURRENT_TIMESTAMP)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(11) NOT NULL,
  `visa` int(11) DEFAULT NULL,
  `movie_runtime` smallint(6) DEFAULT NULL,
  `movie_trailer` varchar(255) DEFAULT NULL,
  `movie_synop` text,
  `movie_budget` varchar(30) DEFAULT NULL,
  `movie_saga` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `movie`
--

INSERT INTO `movie` (`movie_id`, `visa`, `movie_runtime`, `movie_trailer`, `movie_synop`, `movie_budget`, `movie_saga`) VALUES
(1, 103984, 152, NULL, NULL, '125 000 000 $', 'Harry Potter'),
(2, 106791, 161, NULL, NULL, '100 000 000 $', 'Harry Potter'),
(3, 110535, 142, NULL, NULL, '130 000 000 $', 'Harry Potter'),
(4, 114028, 157, '', NULL, '150 000 000 $', 'Harry Potter'),
(16, NULL, 97, NULL, NULL, NULL, NULL),
(17, 148063, 123, 'https://www.youtube.com/watch?v=NiTki0RIG40', 'Elisa Esposito est muette. Elle travaille dans un laboratoire gouvernemental ultrasecret comme concierge. Elle mène une existence routinière et sans histoire mais sa vie bascule à jamais lorsqu\'elle et sa collègue Zelda découvrent une expérience encore plus secrète que les autres : elle découvre l\'existence d\'une créature amphibie cachée dans l\'un des bassins de l\'établissement.', '19 400 000$', NULL),
(18, NULL, 119, 'https://www.youtube.com/watch?v=jU-02YmPpMs', 'À l\'époque où il incarnait un célèbre super-héros, Riggan Thomson était mondialement connu. De cette célébrité il ne reste plus grand-chose, et il tente aujourd\'hui de monter une pièce de théâtre à Broadway dans l\'espoir de renouer avec sa gloire perdue. Durant les quelques jours qui précèdent la première, il va devoir tout affronter : sa famille et ses proches, son passé, ses rêves et son ego. S\'il s\'en sort, le rideau a une chance de s\'ouvrir.', '22 000 000$', NULL),
(105, NULL, NULL, NULL, NULL, NULL, NULL),
(108, NULL, NULL, NULL, NULL, NULL, NULL),
(109, NULL, NULL, NULL, NULL, NULL, NULL),
(115, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 33254, 100, 'trailer film', 'Synopsis du film', '200$', 'saga du film');

-- --------------------------------------------------------

--
-- Structure de la table `old_appr_com`
--

CREATE TABLE `old_appr_com` (
  `id` int(11) NOT NULL,
  `appr_id` int(11) NOT NULL,
  `appr_com` text NOT NULL,
  `appr_note` smallint(6) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `old_appr_com`
--

INSERT INTO `old_appr_com` (`id`, `appr_id`, `appr_com`, `appr_note`, `timestamp`) VALUES
(1, 2, 'Mouais bof...', 2, '2020-01-16 10:45:20');

-- --------------------------------------------------------

--
-- Structure de la table `old_status_media`
--

CREATE TABLE `old_status_media` (
  `id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `asv_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `old_status_media`
--

INSERT INTO `old_status_media` (`id`, `media_id`, `asv_id`, `timestamp`) VALUES
(1, 92, 1, '2020-01-16 10:16:14'),
(2, 118, 2, '2020-01-31 09:30:06'),
(3, 119, 2, '2020-01-31 09:30:06'),
(4, 119, 2, '2020-02-03 16:09:34'),
(5, 120, 2, '2020-02-04 14:31:05'),
(6, 120, 1, '2020-02-04 14:31:44'),
(7, 120, 2, '2020-02-04 14:36:36'),
(8, 121, 2, '2020-02-04 14:59:05'),
(9, 122, 2, '2020-02-04 15:07:01');

-- --------------------------------------------------------

--
-- Structure de la table `pc`
--

CREATE TABLE `pc` (
  `pc_id` smallint(6) NOT NULL,
  `pc_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pc`
--

INSERT INTO `pc` (`pc_id`, `pc_name`) VALUES
(1, 'Bloomsbury Publishing'),
(2, 'Actes Sud'),
(3, 'Warner Music Group'),
(4, 'Universal Music Group'),
(5, 'EMI'),
(6, 'PolyGram'),
(7, 'Walt Disney Studios Entertainment'),
(8, 'Warner Bros. Entertainment'),
(9, 'Fox Entertainment Group'),
(10, 'Universal Studios\r\nNBCUniversal'),
(11, 'Sony Pictures Motion Picture Group'),
(12, 'Paramount Motion Pictures Group'),
(13, 'Gaumont'),
(14, 'StudioCanal'),
(15, 'UGC Ciné Cite'),
(16, 'EuropaCorp'),
(17, 'Maison d\'édition Gallimard'),
(18, 'Les Éditions Flammarion'),
(19, 'Les éditions Milan'),
(20, 'Hachette'),
(21, 'Virgin'),
(22, 'CBS Records'),
(39, 'Colombia TriStar'),
(40, 'First'),
(41, 'Prolifica Records'),
(42, 'Gallimard Jeunesse');

-- --------------------------------------------------------

--
-- Structure de la table `play`
--

CREATE TABLE `play` (
  `song_id` int(11) NOT NULL,
  `band_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `play`
--

INSERT INTO `play` (`song_id`, `band_id`) VALUES
(13, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produced_by`
--

CREATE TABLE `produced_by` (
  `media_id` int(11) NOT NULL,
  `pc_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produced_by`
--

INSERT INTO `produced_by` (`media_id`, `pc_id`) VALUES
(9, 1),
(10, 1),
(11, 1),
(105, 1),
(7, 2),
(8, 2),
(17, 2),
(110, 2),
(15, 5),
(109, 7),
(108, 13),
(20, 17),
(106, 17),
(13, 21),
(105, 39),
(107, 40),
(111, 42);

-- --------------------------------------------------------

--
-- Structure de la table `song`
--

CREATE TABLE `song` (
  `song_id` int(11) NOT NULL,
  `song_album` varchar(200) DEFAULT NULL,
  `song_moment` tinyint(1) NOT NULL DEFAULT '0',
  `song_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `song`
--

INSERT INTO `song` (`song_id`, `song_album`, `song_moment`, `song_path`) VALUES
(13, 'Wannabe', 1, 'song/Naheulbeuk - Le talent.mp3'),
(14, 'Les aventures de René La Taupe', 0, NULL),
(15, 'Bridget Jones\'s Diary', 0, NULL),
(19, 'Under the Mistletoe', 0, NULL),
(21, '((Un))', 0, NULL),
(110, NULL, 0, NULL),
(116, NULL, 0, NULL),
(117, NULL, 0, NULL),
(122, 'album de la musique', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

CREATE TABLE `status` (
  `media_id` int(11) NOT NULL,
  `asv_id` int(6) NOT NULL,
  `asv_date_creat` date DEFAULT NULL,
  `asv_date_modif` date DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '62'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `status`
--

INSERT INTO `status` (`media_id`, `asv_id`, `asv_date_creat`, `asv_date_modif`, `user_id`) VALUES
(0, 1, '2019-12-27', '2019-12-27', 62),
(1, 1, '2019-12-17', '2019-12-17', 62),
(2, 1, '2019-12-17', '2019-12-17', 62),
(3, 1, '2019-12-17', '2019-12-17', 62),
(4, 1, '2019-12-17', '2019-12-17', 62),
(5, 1, '2019-12-17', '2019-12-17', 62),
(6, 1, '2019-12-17', '2019-12-17', 62),
(7, 1, '2019-12-17', '2019-12-17', 62),
(8, 1, '2019-12-17', '2019-12-17', 62),
(9, 1, '2019-12-17', '2019-12-17', 62),
(10, 1, '2019-12-17', '2019-12-17', 62),
(11, 1, '2019-12-17', '2019-12-17', 62),
(12, 1, '2019-12-17', '2019-12-17', 62),
(13, 1, '2019-12-17', '2019-12-17', 62),
(14, 1, '2019-12-17', '2019-12-17', 62),
(15, 1, '2019-12-17', '2019-12-17', 62),
(16, 1, '2019-12-17', '2019-12-17', 62),
(17, 1, '2019-12-17', '2019-12-17', 62),
(18, 1, '2019-12-12', '2019-12-12', 62),
(19, 1, '2019-12-17', '2019-12-17', 62),
(20, 1, '2019-12-17', '2019-12-17', 62),
(21, 1, '2019-12-17', '2019-12-17', 62),
(26, 1, '2019-12-17', '2019-12-17', 62),
(35, 1, '2019-12-23', '2019-12-23', 62),
(36, 1, '2019-12-23', '2019-12-23', 62),
(37, 1, '2019-12-23', '2019-12-23', 62),
(38, 1, '2019-12-23', '2019-12-23', 62),
(39, 1, '2019-12-23', '2019-12-23', 62),
(40, 1, '2019-12-23', '2019-12-23', 62),
(52, 1, '2019-12-26', '2019-12-26', 62),
(79, 1, '2019-12-26', '2019-12-26', 62),
(105, 1, '2020-01-24', '2020-01-24', 62),
(106, 1, '2020-01-24', '2020-01-24', 62),
(107, 1, '2020-01-24', '2020-01-24', 62),
(108, 1, '2020-01-24', '2020-01-24', 62),
(109, 1, '2020-01-24', '2020-01-24', 62),
(110, 1, '2020-01-24', '2020-01-24', 62),
(111, 1, '2020-01-24', '2020-01-24', 62),
(120, 1, NULL, NULL, 7),
(121, 1, NULL, NULL, 62),
(122, 1, NULL, NULL, 62),
(99, 2, '2019-12-30', '2019-12-30', 62),
(118, 2, NULL, NULL, 61);

--
-- Déclencheurs `status`
--
DELIMITER $$
CREATE TRIGGER `media_status_change` BEFORE UPDATE ON `status` FOR EACH ROW INSERT INTO old_status_media (id, media_id, asv_id, timestamp) VALUES (NULL, OLD.media_id, OLD.asv_id, CURRENT_TIMESTAMP)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `status_artist`
--

CREATE TABLE `status_artist` (
  `asv_id` smallint(6) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `asv_date_creat` date DEFAULT NULL,
  `asv_date_modif` date DEFAULT NULL,
  `user_id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `tag_id` smallint(6) NOT NULL,
  `tag_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tag`
--

INSERT INTO `tag` (`tag_id`, `tag_name`) VALUES
(1, 'Drôle'),
(2, 'Nature'),
(3, 'Noël'),
(4, 'Fête'),
(5, 'St-Valentin'),
(6, 'Humour'),
(7, 'Océan'),
(8, 'Gore'),
(9, 'Enquête'),
(10, 'Futur'),
(11, 'Distopie'),
(12, 'Technologie'),
(13, 'Sport'),
(14, 'Epopée'),
(15, 'Mafia'),
(16, 'Meurtre'),
(17, 'Magie'),
(18, 'Culte'),
(19, 'Rétro'),
(20, 'Animaux'),
(21, 'Primé'),
(22, 'Social'),
(23, 'Univers'),
(24, 'Bataille'),
(25, 'Vintage'),
(26, 'Ecologie'),
(27, 'Aventure'),
(28, 'Enfant'),
(29, 'Japon'),
(30, 'Ecole'),
(31, 'Groupe'),
(32, 'Fille'),
(33, 'Intemporel'),
(34, 'Navet'),
(35, 'Nanard'),
(36, 'Société'),
(37, 'Bulle'),
(38, 'Nuage'),
(39, 'Vieillesse'),
(40, 'Grenouille'),
(47, 'Extra terrestres'),
(48, 'Girl'),
(49, 'Handicap');

-- --------------------------------------------------------

--
-- Structure de la table `take_part_in`
--

CREATE TABLE `take_part_in` (
  `media_id` int(11) NOT NULL,
  `work_id` smallint(6) NOT NULL,
  `human_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `take_part_in`
--

INSERT INTO `take_part_in` (`media_id`, `work_id`, `human_id`) VALUES
(1, 1, 10),
(2, 1, 10),
(3, 1, 10),
(4, 1, 10),
(5, 1, 10),
(6, 1, 10),
(16, 1, 17),
(17, 1, 21),
(17, 1, 22),
(17, 1, 23),
(18, 1, 3),
(18, 1, 15),
(21, 1, 10),
(105, 1, 1),
(105, 1, 50),
(105, 1, 51),
(108, 1, 56),
(108, 1, 57),
(108, 1, 58),
(109, 1, 10),
(109, 1, 59),
(13, 2, 26),
(13, 2, 27),
(14, 2, 2),
(15, 2, 12),
(19, 2, 26),
(19, 2, 27),
(105, 2, 12),
(105, 2, 13),
(105, 2, 14),
(105, 2, 15),
(105, 2, 16),
(110, 2, 29),
(7, 3, 19),
(8, 3, 20),
(9, 3, 18),
(10, 3, 18),
(11, 3, 18),
(12, 3, 18),
(20, 3, 28),
(106, 3, 53),
(107, 3, 54),
(107, 3, 55),
(111, 3, 18),
(1, 4, 3),
(2, 4, 3),
(3, 4, 4),
(17, 4, 24),
(18, 4, 25),
(105, 4, 52),
(109, 4, 60),
(17, 5, 24),
(18, 5, 26);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `human_id` int(11) NOT NULL,
  `user_pseudo` varchar(20) NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_status` enum('Autorisé','Bloqué') DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_date_creat` date DEFAULT NULL,
  `city_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`human_id`, `user_pseudo`, `user_email`, `user_status`, `user_password`, `user_date_creat`, `city_id`) VALUES
(5, 'Jahân', NULL, 'Autorisé', NULL, '2019-12-12', 2),
(6, 'LePrince', NULL, 'Autorisé', NULL, NULL, 2),
(7, 'JoieDeVivre', NULL, 'Autorisé', NULL, NULL, 2),
(8, 'FPom', NULL, 'Autorisé', NULL, '2019-12-12', 5),
(9, 'Naisk', 'laure.lechaix@gmail.com', 'Autorisé', NULL, NULL, 2),
(11, 'LeRelou', NULL, 'Bloqué', NULL, NULL, 3),
(61, 'conker30', 'xxconker30xx@gmail.com', 'Autorisé', '123', NULL, 2),
(62, 'admin', NULL, NULL, '456', NULL, 6),
(65, 'toto', 'toto@gmail.com', 'Autorisé', '789', '2020-01-28', 3);

-- --------------------------------------------------------

--
-- Structure de la table `work`
--

CREATE TABLE `work` (
  `work_id` smallint(6) NOT NULL,
  `work_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `work`
--

INSERT INTO `work` (`work_id`, `work_name`) VALUES
(1, 'Acteur'),
(2, 'Interprète'),
(3, 'Ecrivain'),
(4, 'Réalisateur'),
(5, 'Scénariste');

-- --------------------------------------------------------

--
-- Structure de la vue `all_books`
--
DROP TABLE IF EXISTS `all_books`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_books`  AS  select `media`.`media_id` AS `media_id`,`media`.`media_title` AS `media_title`,`media`.`media_year` AS `media_year`,`status`.`asv_id` AS `asv_id` from (`media` join `status` on((`status`.`media_id` = `media`.`media_id`))) where (`media`.`media_type` = 'Livre') ;

-- --------------------------------------------------------

--
-- Structure de la vue `all_movies`
--
DROP TABLE IF EXISTS `all_movies`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_movies`  AS  select `media`.`media_id` AS `media_id`,`media`.`media_title` AS `media_title`,`media`.`media_year` AS `media_year`,`status`.`asv_id` AS `asv_id` from (`media` join `status` on((`status`.`media_id` = `media`.`media_id`))) where (`media`.`media_type` = 'Film') ;

-- --------------------------------------------------------

--
-- Structure de la vue `all_songs`
--
DROP TABLE IF EXISTS `all_songs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_songs`  AS  select `media`.`media_id` AS `media_id`,`media`.`media_title` AS `media_title`,`media`.`media_year` AS `media_year`,`status`.`asv_id` AS `asv_id` from (`media` join `status` on((`status`.`media_id` = `media`.`media_id`))) where (`media`.`media_type` = 'Chanson') ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annee`
--
ALTER TABLE `annee`
  ADD PRIMARY KEY (`annee`);

--
-- Index pour la table `appreciation`
--
ALTER TABLE `appreciation`
  ADD PRIMARY KEY (`appr_id`),
  ADD KEY `human_id` (`human_id`),
  ADD KEY `media_id` (`media_id`);

--
-- Index pour la table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`human_id`);

--
-- Index pour la table `associated_with`
--
ALTER TABLE `associated_with`
  ADD PRIMARY KEY (`media_id`,`work_id`),
  ADD KEY `work_id` (`work_id`);

--
-- Index pour la table `asvalidation`
--
ALTER TABLE `asvalidation`
  ADD PRIMARY KEY (`asv_id`);

--
-- Index pour la table `award`
--
ALTER TABLE `award`
  ADD PRIMARY KEY (`award_id`);

--
-- Index pour la table `awarded`
--
ALTER TABLE `awarded`
  ADD PRIMARY KEY (`human_id`,`award_id`,`ceremony_id`),
  ADD KEY `ceremony_id` (`ceremony_id`),
  ADD KEY `award_id` (`award_id`);

--
-- Index pour la table `band`
--
ALTER TABLE `band`
  ADD PRIMARY KEY (`band_id`);

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Index pour la table `categorized_by`
--
ALTER TABLE `categorized_by`
  ADD PRIMARY KEY (`media_id`,`genre_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Index pour la table `ceremony`
--
ALTER TABLE `ceremony`
  ADD PRIMARY KEY (`ceremony_id`);

--
-- Index pour la table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Index pour la table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`collect_id`),
  ADD KEY `human_id` (`human_id`);

--
-- Index pour la table `come_from`
--
ALTER TABLE `come_from`
  ADD PRIMARY KEY (`human_id`,`country_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Index pour la table `competed_in`
--
ALTER TABLE `competed_in`
  ADD PRIMARY KEY (`media_id`,`award_id`,`ceremony_id`),
  ADD KEY `ceremony_id` (`ceremony_id`),
  ADD KEY `award_id` (`award_id`);

--
-- Index pour la table `composed_by`
--
ALTER TABLE `composed_by`
  ADD PRIMARY KEY (`human_id`,`band_id`),
  ADD KEY `band_id` (`band_id`);

--
-- Index pour la table `contains`
--
ALTER TABLE `contains`
  ADD PRIMARY KEY (`media_id`,`collect_id`),
  ADD KEY `collect_id` (`collect_id`);

--
-- Index pour la table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Index pour la table `deleted_media`
--
ALTER TABLE `deleted_media`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Index pour la table `human`
--
ALTER TABLE `human`
  ADD PRIMARY KEY (`human_id`);

--
-- Index pour la table `is_associated_with`
--
ALTER TABLE `is_associated_with`
  ADD PRIMARY KEY (`media_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`),
  ADD UNIQUE KEY `media_title` (`media_title`,`media_type`,`media_year`);

--
-- Index pour la table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Index pour la table `old_appr_com`
--
ALTER TABLE `old_appr_com`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `old_status_media`
--
ALTER TABLE `old_status_media`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pc`
--
ALTER TABLE `pc`
  ADD PRIMARY KEY (`pc_id`);

--
-- Index pour la table `play`
--
ALTER TABLE `play`
  ADD PRIMARY KEY (`song_id`,`band_id`),
  ADD KEY `band_id` (`band_id`);

--
-- Index pour la table `produced_by`
--
ALTER TABLE `produced_by`
  ADD PRIMARY KEY (`media_id`,`pc_id`),
  ADD KEY `produced_by_ibfk_1` (`pc_id`);

--
-- Index pour la table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`song_id`);

--
-- Index pour la table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`asv_id`,`media_id`),
  ADD KEY `asv_id` (`asv_id`),
  ADD KEY `media_id` (`media_id`),
  ADD KEY `Foreign_key_user_status` (`user_id`);

--
-- Index pour la table `status_artist`
--
ALTER TABLE `status_artist`
  ADD PRIMARY KEY (`asv_id`,`artist_id`),
  ADD KEY `asv_id` (`asv_id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Index pour la table `take_part_in`
--
ALTER TABLE `take_part_in`
  ADD PRIMARY KEY (`media_id`,`work_id`,`human_id`),
  ADD KEY `work_id` (`work_id`),
  ADD KEY `human_id` (`human_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`human_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Index pour la table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`work_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `appreciation`
--
ALTER TABLE `appreciation`
  MODIFY `appr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `asvalidation`
--
ALTER TABLE `asvalidation`
  MODIFY `asv_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `award`
--
ALTER TABLE `award`
  MODIFY `award_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `band`
--
ALTER TABLE `band`
  MODIFY `band_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `ceremony`
--
ALTER TABLE `ceremony`
  MODIFY `ceremony_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `collection`
--
ALTER TABLE `collection`
  MODIFY `collect_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `deleted_media`
--
ALTER TABLE `deleted_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT pour la table `human`
--
ALTER TABLE `human`
  MODIFY `human_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT pour la table `old_appr_com`
--
ALTER TABLE `old_appr_com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `old_status_media`
--
ALTER TABLE `old_status_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `pc`
--
ALTER TABLE `pc`
  MODIFY `pc_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT pour la table `work`
--
ALTER TABLE `work`
  MODIFY `work_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appreciation`
--
ALTER TABLE `appreciation`
  ADD CONSTRAINT `appreciation_ibfk_1` FOREIGN KEY (`human_id`) REFERENCES `human` (`human_id`),
  ADD CONSTRAINT `appreciation_ibfk_2` FOREIGN KEY (`media_id`) REFERENCES `media` (`media_id`);

--
-- Contraintes pour la table `artist`
--
ALTER TABLE `artist`
  ADD CONSTRAINT `artist_ibfk_1` FOREIGN KEY (`human_id`) REFERENCES `human` (`human_id`);

--
-- Contraintes pour la table `associated_with`
--
ALTER TABLE `associated_with`
  ADD CONSTRAINT `associated_with_ibfk_1` FOREIGN KEY (`work_id`) REFERENCES `work` (`work_id`),
  ADD CONSTRAINT `associated_with_ibfk_2` FOREIGN KEY (`media_id`) REFERENCES `media` (`media_id`);

--
-- Contraintes pour la table `awarded`
--
ALTER TABLE `awarded`
  ADD CONSTRAINT `awarded_ibfk_1` FOREIGN KEY (`ceremony_id`) REFERENCES `ceremony` (`ceremony_id`),
  ADD CONSTRAINT `awarded_ibfk_2` FOREIGN KEY (`award_id`) REFERENCES `award` (`award_id`),
  ADD CONSTRAINT `awarded_ibfk_3` FOREIGN KEY (`human_id`) REFERENCES `artist` (`human_id`);

--
-- Contraintes pour la table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `media` (`media_id`);

--
-- Contraintes pour la table `categorized_by`
--
ALTER TABLE `categorized_by`
  ADD CONSTRAINT `categorized_by_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`genre_id`),
  ADD CONSTRAINT `categorized_by_ibfk_2` FOREIGN KEY (`media_id`) REFERENCES `media` (`media_id`);

--
-- Contraintes pour la table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`);

--
-- Contraintes pour la table `collection`
--
ALTER TABLE `collection`
  ADD CONSTRAINT `collection_ibfk_1` FOREIGN KEY (`human_id`) REFERENCES `human` (`human_id`);

--
-- Contraintes pour la table `come_from`
--
ALTER TABLE `come_from`
  ADD CONSTRAINT `come_from_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`),
  ADD CONSTRAINT `come_from_ibfk_2` FOREIGN KEY (`human_id`) REFERENCES `human` (`human_id`);

--
-- Contraintes pour la table `competed_in`
--
ALTER TABLE `competed_in`
  ADD CONSTRAINT `competed_in_ibfk_4` FOREIGN KEY (`ceremony_id`) REFERENCES `ceremony` (`ceremony_id`),
  ADD CONSTRAINT `competed_in_ibfk_5` FOREIGN KEY (`award_id`) REFERENCES `award` (`award_id`),
  ADD CONSTRAINT `competed_in_ibfk_6` FOREIGN KEY (`media_id`) REFERENCES `media` (`media_id`);

--
-- Contraintes pour la table `composed_by`
--
ALTER TABLE `composed_by`
  ADD CONSTRAINT `composed_by_ibfk_1` FOREIGN KEY (`band_id`) REFERENCES `band` (`band_id`),
  ADD CONSTRAINT `composed_by_ibfk_2` FOREIGN KEY (`human_id`) REFERENCES `human` (`human_id`);

--
-- Contraintes pour la table `contains`
--
ALTER TABLE `contains`
  ADD CONSTRAINT `contains_ibfk_1` FOREIGN KEY (`collect_id`) REFERENCES `collection` (`collect_id`),
  ADD CONSTRAINT `contains_ibfk_2` FOREIGN KEY (`media_id`) REFERENCES `media` (`media_id`);

--
-- Contraintes pour la table `is_associated_with`
--
ALTER TABLE `is_associated_with`
  ADD CONSTRAINT `is_associated_with_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`tag_id`),
  ADD CONSTRAINT `is_associated_with_ibfk_2` FOREIGN KEY (`media_id`) REFERENCES `media` (`media_id`);

--
-- Contraintes pour la table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `media` (`media_id`);

--
-- Contraintes pour la table `play`
--
ALTER TABLE `play`
  ADD CONSTRAINT `play_ibfk_1` FOREIGN KEY (`band_id`) REFERENCES `band` (`band_id`),
  ADD CONSTRAINT `play_ibfk_2` FOREIGN KEY (`song_id`) REFERENCES `song` (`song_id`);

--
-- Contraintes pour la table `produced_by`
--
ALTER TABLE `produced_by`
  ADD CONSTRAINT `produced_by_ibfk_1` FOREIGN KEY (`pc_id`) REFERENCES `pc` (`pc_id`),
  ADD CONSTRAINT `produced_by_ibfk_2` FOREIGN KEY (`media_id`) REFERENCES `media` (`media_id`);

--
-- Contraintes pour la table `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `song_ibfk_1` FOREIGN KEY (`song_id`) REFERENCES `media` (`media_id`);

--
-- Contraintes pour la table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `Foreign_key_user_status` FOREIGN KEY (`user_id`) REFERENCES `users` (`human_id`);

--
-- Contraintes pour la table `status_artist`
--
ALTER TABLE `status_artist`
  ADD CONSTRAINT `status_artist_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`human_id`),
  ADD CONSTRAINT `status_artist_ibfk_2` FOREIGN KEY (`asv_id`) REFERENCES `asvalidation` (`asv_id`);

--
-- Contraintes pour la table `take_part_in`
--
ALTER TABLE `take_part_in`
  ADD CONSTRAINT `take_part_in_ibfk_1` FOREIGN KEY (`work_id`) REFERENCES `work` (`work_id`),
  ADD CONSTRAINT `take_part_in_ibfk_2` FOREIGN KEY (`human_id`) REFERENCES `human` (`human_id`),
  ADD CONSTRAINT `take_part_in_ibfk_3` FOREIGN KEY (`media_id`) REFERENCES `media` (`media_id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`human_id`) REFERENCES `human` (`human_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

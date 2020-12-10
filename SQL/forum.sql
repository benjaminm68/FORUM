-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           10.2.3-MariaDB-log - mariadb.org binary distribution
-- SE du serveur:                Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Export de la structure de la base pour forum
CREATE DATABASE IF NOT EXISTS `forum` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `forum`;

-- Export de la structure de la table forum. categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Export de données de la table forum.categorie : ~5 rows (environ)
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` (`id_categorie`, `titre`) VALUES
	(1, 'Présentation'),
	(2, 'Informations et Suggestions'),
	(3, 'Les articles du blog'),
	(4, 'Le matériel'),
	(5, 'Logiciels et applications');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;

-- Export de la structure de la table forum. message
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` text COLLATE utf8_bin DEFAULT NULL,
  `dateCreation` datetime DEFAULT NULL,
  `sujet_id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `FK_message_sujet` (`sujet_id`),
  KEY `FK_message_utilisateur` (`utilisateur_id`),
  CONSTRAINT `FK_message_sujet` FOREIGN KEY (`sujet_id`) REFERENCES `sujet` (`id_sujet`),
  CONSTRAINT `FK_message_utilisateur` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Export de données de la table forum.message : ~7 rows (environ)
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` (`id_message`, `contenu`, `dateCreation`, `sujet_id`, `utilisateur_id`) VALUES
	(1, 'message 1', '2020-10-08 09:01:12', 1, 3),
	(2, 'message 2', '2020-04-11 14:01:27', 2, 1),
	(3, 'message 3', '2019-08-10 05:01:48', 1, 2),
	(4, 'message 4', '2017-08-10 12:02:00', 1, 3),
	(5, 'message 5', '2020-12-06 09:02:21', 3, 3),
	(6, 'message 6', '2020-10-05 03:02:36', 4, 3),
	(7, 'message 7', '2020-10-08 09:33:33', 3, 1);
/*!40000 ALTER TABLE `message` ENABLE KEYS */;

-- Export de la structure de la table forum. sujet
CREATE TABLE IF NOT EXISTS `sujet` (
  `id_sujet` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `dateCreation` datetime DEFAULT NULL,
  `statut` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `categorie_id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  PRIMARY KEY (`id_sujet`),
  KEY `FK_sujet_categorie` (`categorie_id`),
  KEY `FK_sujet_utilisateur` (`utilisateur_id`),
  CONSTRAINT `FK_sujet_categorie` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id_categorie`),
  CONSTRAINT `FK_sujet_utilisateur` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Export de données de la table forum.sujet : ~5 rows (environ)
/*!40000 ALTER TABLE `sujet` DISABLE KEYS */;
INSERT INTO `sujet` (`id_sujet`, `titre`, `dateCreation`, `statut`, `categorie_id`, `utilisateur_id`) VALUES
	(1, 'Sujet 1', '2020-10-08 08:58:42', 'ouvert', 2, 1),
	(2, 'Sujet 2', '2016-10-08 14:50:53', 'fermé', 1, 2),
	(3, 'Sujet 3', '2015-07-12 02:02:33', 'ouvert', 3, 2),
	(4, 'Sujet 4', '2020-10-08 09:00:42', 'ouvert', 4, 3),
	(5, 'Sujet 5', '2020-10-08 11:45:13', 'ouvert', 2, 1);
/*!40000 ALTER TABLE `sujet` ENABLE KEYS */;

-- Export de la structure de la table forum. utilisateur
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `mdp` varchar(255) COLLATE utf8_bin NOT NULL,
  `rang` varchar(50) COLLATE utf8_bin NOT NULL,
  `avatar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `dateInscription` datetime NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Export de données de la table forum.utilisateur : ~3 rows (environ)
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` (`id_utilisateur`, `pseudo`, `email`, `mdp`, `rang`, `avatar`, `dateInscription`) VALUES
	(1, 'Benjamin', 'benjamin25200@outlook.fr', '0000', 'admin', NULL, '2020-10-08 08:51:27'),
	(2, 'Matthias\r\n', 'MatthiasKLOS@copiercoller.fr', '0000', 'membre', NULL, '2020-10-08 08:52:11'),
	(3, 'Florian', 'Florian@florian.fr', '0000', 'membre', NULL, '2017-07-08 09:00:22');
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

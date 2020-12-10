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
  `icon` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Export de données de la table forum.categorie : ~12 rows (environ)
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` (`id_categorie`, `titre`, `icon`, `description`) VALUES
	(1, 'Présentation', 'public/img/pres-icon.png', 'Une courte présentation permettra de mieux se connaitre.'),
	(2, 'Informations et Suggestions', 'public/img/ampoule.png', 'Suggestions d\'articles, ou idées pour le blog et forum ? Réactions suite à un article ? Exprimez-vous !'),
	(4, 'Le matériel', 'public/img/materiel.png', 'Matériels et composants, périphériques, disques durs, mémoires vive...'),
	(5, 'Logiciels et applications', 'public/img/logiciel.png', 'Discussions et problème à propos de logiciels et applications'),
	(6, 'Sécurité Virus et Trojans', 'public/img/securite.png', 'Discussions à propos des Virus, Trojans, Pare-feu, Anti-Virus...'),
	(7, 'Réseaux', 'public/img/reseaux.png', 'Discussions général à propos du réseau, Routeurs, Passerelles, WiFi, LAN, WAN...'),
	(8, '	Développement, Site Web et SEO', 'public/img/dev.png', 'Discutez de développement, de la création de site web et des techniques de positionnement internet (SEO).'),
	(9, 'Automatisation et Scripting', 'public/img/auto.png', 'Partager vos scripts avec la communauté pour rendre notre travail plus facile pour tous.'),
	(10, 'Microsoft Windows', 'public/img/windows.png', 'Discussions et aide autour de Microsoft Windows'),
	(11, 'Linux', 'public/img/linux.png', 'Discussions et aide autour de Linux et ses distributions.'),
	(12, 'Apple Macintosh', 'public/img/apple.png', 'Discussions autour des systèmes d\'exploitations Apple'),
	(13, 'Discussions générales', 'public/img/detente.png', 'Parler de tout et de rien ici');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;

-- Export de la structure de la table forum. message
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` text COLLATE utf8_bin NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT current_timestamp(),
  `sujetId` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `FK_message_sujet` (`sujetId`),
  KEY `FK_message_utilisateur` (`utilisateur_id`),
  CONSTRAINT `FK_message_sujet` FOREIGN KEY (`sujetId`) REFERENCES `sujet` (`id_sujet`),
  CONSTRAINT `FK_message_utilisateur` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Export de données de la table forum.message : ~16 rows (environ)
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` (`id_message`, `contenu`, `dateCreation`, `sujetId`, `utilisateur_id`) VALUES
	(1, 'message 1', '2020-10-08 09:01:12', 1, 4),
	(2, 'message 2', '2020-04-11 14:01:27', 2, 1),
	(3, 'message 3', '2019-08-10 05:01:48', 1, 2),
	(4, 'message 4', '2017-08-10 12:02:00', 1, 3),
	(5, 'message 5', '2020-12-06 09:02:21', 5, 3),
	(6, 'message 6', '2020-10-05 03:02:36', 4, 3),
	(7, 'message 7', '2020-10-08 09:33:33', 2, 1),
	(110, 'U are the best !', '2020-10-28 14:06:47', 2, 13),
	(117, 'asplaspl', '2020-10-30 10:10:06', 3, 13),
	(118, 'smsldksldks', '2020-10-30 10:12:56', 81, 13),
	(121, 'TG', '2020-11-01 02:27:28', 8, 13),
	(122, 'kkkkkkkkkk', '2020-11-01 02:29:33', 8, 13),
	(125, 'OUUUHO', '2020-11-02 08:44:36', 26, 13),
	(126, 'lklklklklkl', '2020-11-02 13:27:33', 78, 13),
	(127, 'KLKJ', '2020-11-04 09:43:48', 83, 13),
	(128, 'alert(&#39;test&#39;)', '2020-11-04 09:58:14', 78, 13);
/*!40000 ALTER TABLE `message` ENABLE KEYS */;

-- Export de la structure de la table forum. sujet
CREATE TABLE IF NOT EXISTS `sujet` (
  `id_sujet` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_bin NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT current_timestamp(),
  `statut` varchar(50) COLLATE utf8_bin DEFAULT 'ouvert',
  `categorieId` int(11) DEFAULT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  `contenuSujet` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_sujet`),
  KEY `FK_sujet_categorie` (`categorieId`),
  KEY `FK_sujet_utilisateur` (`utilisateur_id`),
  CONSTRAINT `FK_sujet_categorie` FOREIGN KEY (`categorieId`) REFERENCES `categorie` (`id_categorie`),
  CONSTRAINT `FK_sujet_utilisateur` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Export de données de la table forum.sujet : ~29 rows (environ)
/*!40000 ALTER TABLE `sujet` DISABLE KEYS */;
INSERT INTO `sujet` (`id_sujet`, `titre`, `dateCreation`, `statut`, `categorieId`, `utilisateur_id`, `contenuSujet`) VALUES
	(1, 'Présentation Florian', '2020-10-08 08:58:42', '&#128274;', 1, 3, 'Blablabla'),
	(2, 'Présentation Baptiste', '2016-10-08 14:50:53', '&#128274;', 1, 5, 'ghfgh'),
	(3, 'Présentation Virgile', '2015-07-12 02:02:33', '&#128275;', 1, 6, 'gfhgfh'),
	(4, 'Présention Geoffrey', '2020-10-08 09:00:42', '&#128275;', 1, 4, 'hgf'),
	(5, 'Présentation Benjamin', '2020-10-08 11:45:13', '&#128274;', 1, 1, 'Bonjour bonjour'),
	(6, 'Sujet categ information', '2020-06-16 14:21:57', NULL, 2, 5, 'gfhgh'),
	(7, 'Blabla', '2020-10-21 12:24:52', NULL, 2, 6, 'uuauuhauhsuhasuhsauh'),
	(8, 'salut-salut', '2015-10-21 12:26:06', NULL, 12, 2, 'blablablablabla'),
	(18, 'testajout', '2020-10-26 11:36:10', 'ouvert', 2, 3, 'Bonjour ceci est un test'),
	(20, 'test3', '2020-10-26 14:33:20', 'ouvert', 2, 1, 'encore un test coucou'),
	(26, 'test ajouter sujet categ 2', '2020-10-26 15:14:12', 'ouvert', 2, 13, 'dlkfnkbfkdubf'),
	(29, 'Logiciel', '2020-10-26 15:54:14', 'ouvert', 5, 34, 'jbidbcidsbhsdb'),
	(30, 'Sujet Reseaux ', '2020-10-26 16:01:16', 'ouvert', 7, 34, 'test '),
	(34, 'Présentation Crying_P', '2020-10-27 10:02:41', 'ouvert', 1, 35, 'kdbsqdbsqcjkbhsqjcdbsjbdjsqbdjqsbdjhqsbdjhqsbdjhqsbdjhqsbdjqsbdjhqsbdjhqsbdjhqsbdjhqsbdjqsbh'),
	(35, 'cvxcvxcvxcv', '2020-10-27 10:03:50', 'ouvert', 6, 35, 'cxvcv'),
	(36, 'rgrdgtertgre', '2020-10-27 10:09:21', 'ouvert', 6, 35, 'rgrgre'),
	(59, 'Présentation BenLaFrite', '2020-10-28 09:20:58', 'ouvert', 1, 34, 'lallalala'),
	(61, 'test doublon', '2020-10-28 11:04:41', 'ouvert', 8, 34, 'dfdfdf'),
	(62, 'teetetetet', '2020-10-28 13:38:16', 'ouvert', 11, 13, 'onidoenf'),
	(65, 'BLABLABLABLA', '2020-10-28 14:21:47', 'ouvert', 4, 13, 'ABLABLABLABLABLABALABKBEFKSBVCKISDNVSCVMSLDBFVL?NVCIDB OLSDBVISDNCVKIDBFOQSN NUSDYVODBSVIKDBV?K  CKSD C'),
	(66, 'BLABLABLABLA', '2020-10-28 14:21:47', 'ouvert', 4, 13, 'ABLABLABLABLABLABALABKBEFKSBVCKISDNVSCVMSLDBFVL?NVCIDB OLSDBVISDNCVKIDBFOQSN NUSDYVODBSVIKDBV?K  CKSD C'),
	(67, 'bnbvn', '2020-10-28 14:21:55', 'ouvert', 4, 13, 'bvnbvnbv'),
	(68, 'salut je suis un logiciel', '2020-10-28 14:22:13', 'ouvert', 5, 13, 'cxvxcvxcvxc'),
	(78, 'rrrrrrrrrrrrrrr', '2020-10-29 15:51:51', 'ouvert', 1, 34, 'iubvdsiubviusdb'),
	(81, 'saluuuuuuuuuuuuut', '2020-10-30 10:12:38', 'ouvert', 2, 13, 'lozdozdozndioznd'),
	(82, 'OUHO', '2020-11-01 00:59:36', 'ouvert', 13, 13, 'jhhjjhhjjhj'),
	(83, 'OUHHHHHHHHHO', '2020-11-04 09:43:42', 'ouvert', 1, 13, 'FDSFDSFD'),
	(84, 'alert(&#39;test&#39;)', '2020-11-04 09:57:38', 'ouvert', 1, 13, 'alert(&#39;test&#39;)'),
	(85, 'lmklkm', '2020-11-04 09:59:37', 'ouvert', 4, 13, 'klmlk');
/*!40000 ALTER TABLE `sujet` ENABLE KEYS */;

-- Export de la structure de la table forum. utilisateur
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(255) COLLATE utf8_bin NOT NULL,
  `rang` varchar(50) COLLATE utf8_bin DEFAULT 'membre',
  `avatar` varchar(255) COLLATE utf8_bin DEFAULT 'public/img/avatar_defaut.png',
  `dateInscription` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Export de données de la table forum.utilisateur : ~14 rows (environ)
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` (`id_utilisateur`, `pseudo`, `email`, `mdp`, `rang`, `avatar`, `dateInscription`) VALUES
	(1, 'Benjamin', 'benjamin25200@outlook.fr', '$2y$10$WrV0IBMmvRSo8aUy3R2.U.ivxEufv444t0WUOvTSfEMCDAee9iuya', 'admin', 'public/img/icone-1.jpg', '2020-10-08 08:51:27'),
	(2, 'Matthias\r\n', 'MatthiasKLOS@copiercoller.fr', '$2y$10$WrV0IBMmvRSo8aUy3R2.U.ivxEufv444t0WUOvTSfEMCDAee9iuya', 'membre', 'public/img/avatar6.png', '2020-10-08 08:52:11'),
	(3, 'Florian', 'Florian@florian.fr', '$2y$10$WrV0IBMmvRSo8aUy3R2.U.ivxEufv444t0WUOvTSfEMCDAee9iuya', 'membre', 'public/img/avatar2.png', '2017-07-08 09:00:22'),
	(4, 'Geoffrey', 'goefreey@gege.fr', '$2y$10$WrV0IBMmvRSo8aUy3R2.U.ivxEufv444t0WUOvTSfEMCDAee9iuya', 'membre', 'public/img/avatar3.png', '2020-10-16 14:21:24'),
	(5, 'Baptiste', 'baptiste@easy.fr', '$2y$10$WrV0IBMmvRSo8aUy3R2.U.ivxEufv444t0WUOvTSfEMCDAee9iuya', 'membre', 'public/img/avatar4.png', '2020-10-18 14:21:50'),
	(6, 'Virgile', 'Virgile@armoire.fr', '$2y$10$WrV0IBMmvRSo8aUy3R2.U.ivxEufv444t0WUOvTSfEMCDAee9iuya', 'membre', 'public/img/avatar5.png', '2020-05-16 14:22:27'),
	(12, 'Maitre Gilles', 'gilles@awesome.com', '$2y$10$/QPV5nlajTGMP4B/fL5RTegpSffptbGElCzJ2Ifjqsc/.T5Ol8NzK', 'membre', 'public/img/avatar_defaut.png', '2020-10-22 15:32:47'),
	(13, 'ben', 'tetette@kdjek.fr', '$2y$10$wppckj1H/7aZELn9LDrKJu1QDAwY6piaOa9ea9WlkOAdqsMrkt3zu', 'admin', 'public/img/avatar-370-456322.png', '2020-10-22 16:03:34'),
	(33, 'BenLaFrite', 'ben@lafrite.fr', '$2y$10$WrV0IBMmvRSo8aUy3R2.U.ivxEufv444t0WUOvTSfEMCDAee9iuya', 'membre', 'public/img/avatar_defaut.png', '2020-10-26 15:50:44'),
	(34, 'benlafrite', 'jknfdf@ffd.fr', '$2y$10$xBGBtwqYh1bC7nSN6x7YOeLgbExF/muob.K3P66z/mTs2VpB9UoPS', 'membre', 'public/img/avatar_defaut.png', '2020-10-26 15:52:20'),
	(35, 'crying_p', 'gilles.muess@elan-formation.fr', '$2y$10$9fRKIQcpih1JwTdr7/98w.N.zGuoWjJQiLnR9Z4fASzbzwgQq2R2i', 'membre', 'public/img/avatar_defaut.png', '2020-10-27 08:52:17'),
	(36, 'updatepseudo', 'testupdate@test.fr', '$2y$10$cSnum8z1dT0t3d/Qt0wwauSYg9RZsD3eOd1eqQooG2Kyyg60Whelq', 'membre', 'public/img/avatar_defaut.png', '2020-10-28 11:24:39'),
	(37, 'bentest', 'test@test.fr', '$2y$10$sAGv9F/Wl9.2Akj23roaYer31mbh1AdBzxXgx./s7CqHPZZx3dNuS', 'membre', 'public/img/avatar_defaut.png', '2020-11-02 15:35:06'),
	(38, 'ouho', 'ouho@lol.fr', '$2y$10$eKqg7ulf3him8/vaXI69m.vCiV.I8AO8h1M3SN90XYsViK7qmrVxO', 'membre', 'public/img/avatar_defaut.png', '2020-11-03 15:05:12');
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

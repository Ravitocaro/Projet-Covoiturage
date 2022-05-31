-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `covoiturage` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `covoiturage`;

DROP TABLE IF EXISTS `adherent`;
CREATE TABLE `adherent` (
  `id_adh` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mdp` varchar(150) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `num_tel` int(15) NOT NULL,
  `date_creation` date NOT NULL DEFAULT current_timestamp(),
  `conducteur` tinyint(1) NOT NULL DEFAULT 0,
  `verifie` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_adh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `adherent` (`id_adh`, `nom`, `prenom`, `mail`, `mdp`, `type`, `num_tel`, `date_creation`, `conducteur`, `verifie`) VALUES
(1,	'Hoareau',	'Théo',	'hoareautheo97480@gmail.com',	'$2y$10$mfPIZp0UGkjH/exrvUSw.eJWeHxoE2jsHJYlcdKi6PK/72.MOZrPG',	1,	692529821,	'2021-10-23',	0,	1),
(2,	'Lebon',	'Maxime',	'lebonmaxime@gmail.com',	'$2y$10$m4o7Xb3RSQ6bKZCjXBrDbO0C2LEX1yLF3gS1lh3fAkvv6/6gB96.K',	0,	692679854,	'2021-10-23',	1,	1),
(3,	'Calabrese',	'Anzo',	'enzolechobo@gmail.com',	'$2y$10$HYrl5vBbAJy/IbtFwXXGwe0qNYlbqFFJuMO7wFW4gV1HjV.zymu.a',	0,	693542150,	'2021-10-23',	1,	1),
(4,	'Goneville',	'Lois',	'loisledieu@gmail.com',	'$2y$10$ByaWCf12JCDq6XjRBBy3BOpK0pIsNlgf6QiE7eOJTLxST/rqbUAs6',	0,	693875603,	'2021-11-02',	0,	1),
(5,	'Dijoux',	'Guillaume',	'guillaume@gmail.com',	'$2y$10$SFmdcDW/Vy2ab8wAg3aM9OyyFAnXkGBdn0/f8qT5MvhvqQ7iCvYdi',	0,	692676909,	'2021-11-02',	1,	1),
(6,	'Lois',	'Gnv',	'lois@gmail.com',	'$2y$10$xkfwI3LaD5x8icuNOVBVdeXJ2M9sN9EiC5uGlqtolXVJJjC/5y31.',	0,	692679523,	'2021-11-16',	0,	0),
(7,	'enlive',	'jeminscris',	'jeminscrisenlive@gmail.com',	'$2y$10$bhXNNsHxAlw0OEe8O5QB9ePAXZ7caefmTQMYM7U.WOd8Bs1qOJH5C',	0,	4867139,	'2021-11-30',	1,	1),
(8,	'test',	'maxime',	'testmaxime@gmail.com',	'$2y$10$sxPwqAjeTy5w3hOGueMvWe3THZ4Yt97PUgFsav8p2E5kjpXdvNYCK',	0,	692481737,	'2021-11-30',	1,	1);

DELIMITER ;;

CREATE TRIGGER `avant_modification_adh` BEFORE UPDATE ON `adherent` FOR EACH ROW
BEGIN 
INSERT INTO histo_adherent (id_adh, nom, prenom, mail, mdp, type, num_tel, date_creation, conducteur, action_histo)
VALUES (OLD.id_adh, OLD.nom, OLD.prenom, OLD.mail, OLD.mdp, OLD.type, OLD.num_tel, OLD.date_creation, OLD.conducteur, 'Modification');
END;;

CREATE TRIGGER `avant_suppression_adh` BEFORE DELETE ON `adherent` FOR EACH ROW
BEGIN 
INSERT INTO histo_adherent (id_adh, nom, prenom, mail, mdp, type, num_tel, date_creation, conducteur, action_histo)
VALUES (OLD.id_adh, OLD.nom, OLD.prenom, OLD.mail, OLD.mdp, OLD.type, OLD.num_tel, OLD.date_creation, OLD.conducteur, 'Suppression');
END;;

DELIMITER ;

DROP TABLE IF EXISTS `histo_adherent`;
CREATE TABLE `histo_adherent` (
  `id_histo` int(11) NOT NULL AUTO_INCREMENT,
  `id_adh` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mdp` varchar(150) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `num_tel` int(15) NOT NULL,
  `date_creation` date NOT NULL,
  `conducteur` tinyint(1) NOT NULL,
  `action_histo` varchar(50) NOT NULL,
  `date_histo` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_histo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `histo_adherent` (`id_histo`, `id_adh`, `nom`, `prenom`, `mail`, `mdp`, `type`, `num_tel`, `date_creation`, `conducteur`, `action_histo`, `date_histo`) VALUES
(1,	2,	'Lebon',	'Maxime',	'lebonmaxime@gmail.com',	'test2',	0,	0,	'2021-10-23',	0,	'Modification',	'2021-10-23'),
(2,	2,	'LEBON',	'Maxime',	'lebonmaxime@gmail.com',	'test2',	0,	0,	'2021-10-23',	0,	'Suppression',	'2021-10-23'),
(3,	1,	'Hoareau',	'Théo',	'hoareautheo97480@gmail.com',	'test',	1,	692529821,	'2021-10-23',	0,	'Suppression',	'2021-10-23'),
(4,	3,	'Hoareau',	'Theo',	'hoareautheo97480@gmail.com',	'test',	0,	8783738,	'2021-10-23',	0,	'Suppression',	'2021-10-23'),
(5,	1,	'Hoareau',	'Theo',	'hoareautheo97480@gmail.com',	'$2y$10$myACZfEaQGbOYVLvtPv99.llAPraUhTwreixrgDWusI9S0Ire0fDC',	0,	692529821,	'2021-10-23',	0,	'Modification',	'2021-10-23'),
(6,	1,	'Hoareau',	'Theo',	'hoareautheo97480@gmail.com',	'$2y$10$myACZfEaQGbOYVLvtPv99.llAPraUhTwreixrgDWusI9S0Ire0fDC',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-10-23'),
(7,	1,	'Hoareau',	'Tata',	'hoareautheo97480@gmail.com',	'$2y$10$go0Vzd409hLhKwxPWAWwp.fsZcZ8Iu/rxiVUKZwyoq2XfoM7TqyBG',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-10-23'),
(8,	1,	'Hoareau',	'Tata',	'hoareautheo97480@gmail.com',	'$2y$10$MkqKdeDDGI25yMr0bVHTqug3fc54d/IdGpW8l4WD2/7/HYwX8KpHy',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-10-23'),
(9,	3,	'Calabrese',	'Enzo',	'enzolechobo@gmail.com',	'$2y$10$BVXzOn4Iu/Ak/wJfsT.jheh18DoGOI7P2.L0TRSnDSL0BjBpZ71Gy',	0,	693542150,	'2021-10-23',	0,	'Modification',	'2021-10-23'),
(10,	1,	'Hoareau',	'Theo',	'hoareautheo97480@gmail.com',	'$2y$10$mHbo1uZGhrTxkg0UKcRwfeWilxX4D9H46.r7nk2t/9WytFYIHhDfe',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-10-26'),
(11,	1,	'Hoareau',	'thea',	'hoareautheo97480@gmail.com',	'$2y$10$JrztHTmX5TbUx40c.tA.XOQLhIEa3OW2wiMUvCvQcI.CKLhtT.l0e',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-10-26'),
(12,	1,	'Hoareau',	'Theo',	'hoareautheo97480@gmail.com',	'$2y$10$.XNmDLx3LLzCDUQlsIbym.GuCMes5btN5CfFOWmCImJmamBIos/3G',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-10-26'),
(13,	1,	'Hoareau',	'tea',	'hoareautheo97480@gmail.com',	'$2y$10$L6t2e.aXYCdphwp1Uj1X0u/NLkAOhCjF03g3PKIMDkZn704r8omI6',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-10-26'),
(14,	1,	'Hoareau',	'Théo',	'hoareautheo97480@gmail.com',	'$2y$10$UWNg.ZaQqmECJ0BsWxcNLerGDRfpH3xaoZLe4rrTmODw1ra.FNyRi',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-10-26'),
(15,	1,	'Hoareau',	'tea',	'hoareautheo97480@gmail.com',	'$2y$10$kzJMPS4CK5A/sB.OH/R.XO1C6NKbe87CxyJ4T3KYpgN6QhwVWEJ.e',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-10-26'),
(16,	1,	'Hoareau',	'tata',	'hoareautheo97480@gmail.com',	'$2y$10$xUKu46K.1VvxrcIiWhqLge0sMmJ31AIe8/rQ0GVgJL5u5wuYjQOfm',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-10-26'),
(17,	1,	'Hoareau',	'Théo',	'hoareautheo97480@gmail.com',	'$2y$10$AVo9v9yzWDbxfaT.6eqCkOOjsL9aSVW6vgmnoseaQt1Y9uOr.jAtS',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-10-26'),
(18,	1,	'Hoareau',	'tata',	'hoareautheo97480@gmail.com',	'$2y$10$tZh3UAdkgg6IJbUyEUWzqeb2gWNrmZaq1xX3EbZIOUDTFeXWFLaT.',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-10-26'),
(19,	1,	'Hoareau',	'Théo',	'hoareautheo97480@gmail.com',	'$2y$10$nGTekwTWJWqdtDxIM4nhM.ArgIdMWicMwqqjKtVxvUMADF/XofK3i',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-10-26'),
(20,	1,	'Hoareau',	'tata',	'hoareautheo97480@gmail.com',	'$2y$10$lIF4gzo4TdIXbkCXQCRcSuH92Nmrgsz2bXb72UdcQQasF/NxTdqOi',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-10-26'),
(21,	1,	'Hoareau',	'toto',	'hoareautheo97480@gmail.com',	'$2y$10$T0IHI69BH6Hv7xmoHrICfOJM1xWgfGKJUH8V4wiG/FJ/sqtvQNUzm',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-10-26'),
(22,	1,	'Hoareau',	'toto',	'hoareautheo97480@gmail.com',	'$2y$10$HtZkmRfmbG7FmRr7ay7D/umTAx.WmyV.8tMvAFceRvMLW4x2dLtJm',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-10-26'),
(23,	1,	'Hoareau',	'titi',	'hoareautheo97480@gmail.com',	'$2y$10$Mzub0kFW8kX74st4UTxbNuyedD9hbpwMZI4XCFlhY6Ka/GKJlVnSO',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-10-26'),
(24,	1,	'Hoareau',	'tutu',	'hoareautheo97480@gmail.com',	'$2y$10$1xxkPJy6PwbEfWDO2RDELeKkRxnl8vrIKMDDwr9bMahCKnXP1NqVu',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-10-26'),
(25,	1,	'Hoareau',	'tutu',	'hoareautheo97480@gmail.com',	'$2y$10$a7rlDsf48YmPcds.dYF3AOnspJpm9w16.s5KxOrVhgtYFG2GyrsL.',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-10-26'),
(26,	1,	'Hoareau',	'tutu',	'hoareautheo97480@gmail.com',	'$2y$10$2F7C.fBT05IHsnqQkqL5eeQxYcStnTTb9osviWBGHXesc1jWmoMl.',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-10-26'),
(27,	1,	'Hoareau',	'tutu',	'hoareautheo97480@gmail.com',	'$2y$10$NWlOyL5hTcA7B3Bqh5oKSu6HgytVtdxXAQ3aUm6wGVh1FBhPaisNi',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-10-26'),
(28,	1,	'Hoareau',	'tutu',	'hoareautheo97480@gmail.com',	'$2y$10$T0tY230nFdG7sFogcCL16.HTtoIefMyYOTHfelQ.gB1JjbLBlPhH2',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-10-26'),
(29,	1,	'Hoareau',	'tutu',	'hoareautheo97480@gmail.com',	'$2y$10$hXWjPLOWkgUDNXV2pKCu..KZA9w.E4Ad9VWl.ldPsx3YlaKq/vOR2',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-10-26'),
(30,	1,	'Hoareau',	'voiture12',	'hoareautheo97480@gmail.com',	'$2y$10$/QX9iEGcIkbTqQR7orMQn.E4dZemvKkX8scBkNMl9o1sL.CWjY61m',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-10-26'),
(31,	1,	'Hoareau',	'Théo',	'hoareautheo97480@gmail.com',	'$2y$10$bYiNbhp9RX/LMLAX/2vSx.IRz3BdHby6CWww7LT/06k6Ugg7wa3I2',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-10-26'),
(32,	3,	'Calabrese',	'Enzo',	'enzolechobo@gmail.com',	'$2y$10$VDE8z0Ck7VQIJBWSWf7FIOFcqf6M6gz0uzF3bA01kxZn3IKDKZe/u',	0,	693542150,	'2021-10-23',	1,	'Modification',	'2021-10-26'),
(33,	1,	'Hoareau',	'Théo',	'hoareautheo97480@gmail.com',	'$2y$10$8gTEt8TObQJQXhxGF9c96eNfMhGa.iUFGQonQ/yArcoNMOsNYcZ4O',	1,	692529821,	'2021-10-23',	1,	'Modification',	'2021-11-02'),
(34,	1,	'Hoareau',	'Tata',	'hoareautheo97480@gmail.com',	'$2y$10$rKJh1F7IrbwowVMzbinGI.KD/8quepmRi8uJzTAF8QHSR94PtSRn2',	1,	692529821,	'2021-10-23',	1,	'Modification',	'2021-11-02'),
(35,	1,	'Hoareau',	'Tata',	'hoareautheo97480@gmail.com',	'$2y$10$ZGKBVFo5ioJQW3l.2jsN8./1lalI7KBc3EkaMqANAHP2soHrGTatG',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-11-02'),
(36,	2,	'Lebon',	'Maxime',	'lebonmaxime@gmail.com',	'$2y$10$B08SMiO6omSX5.aBuY2qu.Nq6VnUxzBfvdawc9EL4MZfqZPbc4kQm',	0,	692679854,	'2021-10-23',	1,	'Modification',	'2021-11-02'),
(37,	1,	'Hoareau',	'Théo',	'hoareautheo97480@gmail.com',	'$2y$10$mfPIZp0UGkjH/exrvUSw.eJWeHxoE2jsHJYlcdKi6PK/72.MOZrPG',	1,	692529821,	'2021-10-23',	0,	'Modification',	'2021-11-02'),
(38,	2,	'Lebon',	'Maxime',	'lebonmaxime@gmail.com',	'$2y$10$Yy8XAMKgIEEWnynfpiVrpug3h4ZrGuYZbjn39alRR397Hp0e7qUva',	0,	692679854,	'2021-10-23',	0,	'Modification',	'2021-11-02'),
(39,	3,	'Calabrese',	'Anzo',	'enzolechobo@gmail.com',	'$2y$10$HYrl5vBbAJy/IbtFwXXGwe0qNYlbqFFJuMO7wFW4gV1HjV.zymu.a',	0,	693542150,	'2021-10-23',	1,	'Modification',	'2021-11-02'),
(40,	4,	'Goneville',	'Lois',	'loisledieu@gmail.com',	'$2y$10$ByaWCf12JCDq6XjRBBy3BOpK0pIsNlgf6QiE7eOJTLxST/rqbUAs6',	0,	693875603,	'2021-11-02',	0,	'Modification',	'2021-11-02'),
(41,	5,	'Dijoux',	'Guillaume',	'guillaume@gmail.com',	'$2y$10$SFmdcDW/Vy2ab8wAg3aM9OyyFAnXkGBdn0/f8qT5MvhvqQ7iCvYdi',	0,	692676909,	'2021-11-02',	1,	'Modification',	'2021-11-02'),
(42,	7,	'enlive',	'jeminscris',	'jeminscrisenlive@gmail.com',	'$2y$10$bhXNNsHxAlw0OEe8O5QB9ePAXZ7caefmTQMYM7U.WOd8Bs1qOJH5C',	0,	4867139,	'2021-11-30',	1,	'Modification',	'2021-11-30'),
(43,	2,	'Lebon',	'Maxime',	'lebonmaxime@gmail.com',	'$2y$10$Yy8XAMKgIEEWnynfpiVrpug3h4ZrGuYZbjn39alRR397Hp0e7qUva',	0,	692679854,	'2021-10-23',	0,	'Modification',	'2021-11-30'),
(44,	2,	'Lebon',	'Maxime',	'lebonmaxime@gmail.com',	'$2y$10$VFjG7R0USqveEGCw9.sknufoc7fn7itZafHPPTlLc/44ePTh6jQ3u',	0,	692679854,	'2021-10-23',	1,	'Modification',	'2021-11-30'),
(45,	2,	'Lebon',	'Maxime',	'lebonmaxime@gmail.com',	'$2y$10$BBlyN.JCX0IMZj9xkL3XxOWa4s48OHMAfkXXS97QAYWlLo3Nk9G4S',	0,	692679854,	'2021-10-23',	0,	'Modification',	'2021-11-30'),
(46,	8,	'test',	'maxime',	'testmaxime@gmail.com',	'$2y$10$sxPwqAjeTy5w3hOGueMvWe3THZ4Yt97PUgFsav8p2E5kjpXdvNYCK',	0,	692481737,	'2021-11-30',	1,	'Modification',	'2021-11-30');

DROP TABLE IF EXISTS `rejoint`;
CREATE TABLE `rejoint` (
  `id_adh` int(11) NOT NULL,
  `id_trajet` int(11) NOT NULL,
  PRIMARY KEY (`id_adh`,`id_trajet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rejoint` (`id_adh`, `id_trajet`) VALUES
(1,	2),
(1,	5),
(1,	7);

DROP TABLE IF EXISTS `trajet`;
CREATE TABLE `trajet` (
  `id_trajet` int(11) NOT NULL AUTO_INCREMENT,
  `date_trajet` date NOT NULL,
  `place_dispo` int(11) NOT NULL DEFAULT 0,
  `place_reserve` int(11) NOT NULL DEFAULT 0,
  `du_lycee` tinyint(1) DEFAULT 0,
  `id_user` int(11) NOT NULL,
  `ville` varchar(30) NOT NULL,
  PRIMARY KEY (`id_trajet`),
  KEY `id_conducteur` (`id_user`),
  CONSTRAINT `fk_utilisateur` FOREIGN KEY (`id_user`) REFERENCES `adherent` (`id_adh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `trajet` (`id_trajet`, `date_trajet`, `place_dispo`, `place_reserve`, `du_lycee`, `id_user`, `ville`) VALUES
(5,	'2021-10-27',	1,	0,	0,	3,	'Salazie'),
(7,	'2021-11-11',	4,	0,	1,	2,	'Maxcity');

-- 2022-05-31 09:48:13

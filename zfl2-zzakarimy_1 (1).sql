-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 14 avr. 2023 à 17:18
-- Version du serveur : 10.5.12-MariaDB-0+deb11u1
-- Version de PHP : 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `zfl2-zzakarimy_1`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_activite_t`
--

CREATE TABLE `t_activite_t` (
  `pad_id` int(11) NOT NULL,
  `pad_code` char(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pad_intitule` varchar(120) DEFAULT NULL,
  `pad_creation_date` date DEFAULT NULL,
  `pad_description` varchar(120) DEFAULT NULL,
  `pad_fic_image` varchar(200) DEFAULT NULL,
  `pad_etat` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_activite_t`
--

INSERT INTO `t_activite_t` (`pad_id`, `pad_code`, `pad_intitule`, `pad_creation_date`, `pad_description`, `pad_fic_image`, `pad_etat`) VALUES
(1, '1T3FR5Y78C63Z5W', 'Le Bulgogi au boeuf coréen', '2022-10-04', 'Le bulgogi est parmi les plats coréens les plus populaires, c’est de la viande tendre marinée puis ensuite grillée', 'bulgogi.png', 'C'),
(2, '12FR456V23C697X', 'Le Bibimpap', '2022-08-08', 'Le bibimbap est un mets populaire en Corée. Il s\'agit d\'un mélange de riz,de viande de bœuf,de légumes sautés.', 'bibimpap.png', 'P'),
(3, '1XS9DRT55X0B66S', 'Le Gamjatang', '2020-10-10', 'Le gamja-tang ou ragoût de porc est une soupe coréenne épicée.', 'gamjatang.png', 'C'),
(4, '1D9F7BH264K201C', 'Le Dakgalbi', '2023-04-10', 'Le dakgalbi,est un plat coréen préparé en faisant sauter des dés de poulet marinés dans une sauce à base de gochujang.', 'dakgalbi.png', 'P'),
(5, 'AN5F7BH854K2B6C', 'Les bungeoppangs', '2023-03-06', 'Bungeo-ppang est une pâtisserie en forme de poisson farcie de pâte de haricots rouges sucrée.', 'bungeoppang.png', 'P'),
(6, 'Q1F54GC89N63N2N', 'Le Kimchi', '2021-12-04', 'Le kimchi est un mets traditionnel coréen composé de piments et de légumes lacto-fermentés.', 'kimchi.png', 'C'),
(7, 'KJU574589N63Nvc', 'Le Kimpab', '2022-12-12', 'Le gimbap est un en-cas ou un repas à base de riz blanc,d\'huile de sésame grillé et d\'autres ingrédients', 'kimpab.png', 'C'),
(8, '14Z9D32C5X0W56S', 'Les Tteobbokkis', '2022-11-09', 'Le tteokbokki, est un hors-d\'œuvre coréen composé de galettes de riz courtes et épaisses', 'tteobboki.png', 'C'),
(9, '14WSX32C5X0WF25', 'Les Mandus', '2023-01-10', 'Les mandus sont des raviolies dans la cuisine coréenne, ils peuvent être cuits à la vapeur, cuits à la poêle ou frits.', 'mandu.png', 'P'),
(10, '14FD445V2VG697X', 'Le Hoppang', '2023-02-10', 'Hoppang est une collation chaude qui est vendue dans la Corée du Sud. Il s’agit d’une version du pain cuit à la vapeur.', 'hoppang.png', 'P');

-- --------------------------------------------------------

--
-- Structure de la table `t_animation_t`
--

CREATE TABLE `t_animation_t` (
  `cpt_pseudo` varchar(200) NOT NULL,
  `pad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_animation_t`
--

INSERT INTO `t_animation_t` (`cpt_pseudo`, `pad_id`) VALUES
('Corentil@hotmail.fr', 1),
('Corentil@hotmail.fr', 2),
('Linda15@hotmail.fr', 1),
('Linda15@hotmail.fr', 2),
('Maria@hotmail.fr', 3),
('Robert@hotmail.fr', 3),
('Robert@hotmail.fr', 5),
('Sabrina@hotmail.fr', 3),
('Sebastis@hotmail.fr', 2),
('SimSsimon@hotmail.fr', 4);

-- --------------------------------------------------------

--
-- Structure de la table `t_atelier_t`
--

CREATE TABLE `t_atelier_t` (
  `atl_id` int(11) NOT NULL,
  `atl_intitule` varchar(200) DEFAULT NULL,
  `atl_date` date DEFAULT NULL,
  `atl_texte` varchar(500) DEFAULT NULL,
  `atl_etat` char(1) DEFAULT NULL,
  `pad_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_atelier_t`
--

INSERT INTO `t_atelier_t` (`atl_id`, `atl_intitule`, `atl_date`, `atl_texte`, `atl_etat`, `pad_id`) VALUES
(2, 'Le Bulgogi au boeuf coréen', '2022-10-04', 'Tutoriel', 'P', 1),
(3, 'Le Bulgogi au boeuf coréen', '2022-10-04', 'Préparation', 'P', 1),
(4, 'Le Bibimpap', '2022-08-08', 'Course', 'C', 2),
(5, 'Le Bibimpap', '2022-08-08', 'Tutoriel', 'C', 2),
(6, 'Le Bibimpap', '2022-08-08', 'Préparation', 'C', 2),
(7, 'Le Gamjatang', '2020-10-10', 'Course', 'P', 3),
(8, 'Le Gamjatang', '2020-10-10', 'Tutoriel', 'P', 3),
(9, 'Le Gamjatang', '2020-10-10', 'Préparation', 'P', 3),
(10, 'Le Dakgalbi', '2023-04-10', 'Course', 'C', 4),
(11, 'Le Dakgalbi', '2023-04-10', 'Tutoriel', 'C', 4),
(12, 'Le Dakgalbi', '2023-04-10', 'Préparation', 'C', 4),
(13, 'Les bungeoppangs', '2023-03-06', 'Course', 'P', 5),
(14, 'Les bungeoppangs', '2023-03-06', 'Tutoriel', 'P', 5),
(15, 'Les bungeoppangs', '2023-03-06', 'Préparation', 'P', 5),
(16, 'Kimchi', '2021-12-04', 'Course', 'P', 6),
(17, 'Kimchi', '2021-12-04', 'Tutoriel', 'P', 6),
(18, 'Kimchi', '2021-12-04', 'Préparation', 'P', 6),
(19, 'Le Kimpab', '2022-12-12', 'Course', 'C', 7),
(20, 'Le Kimpab', '2022-12-12', 'Tutoriel', 'C', 7),
(21, 'Le Kimpab', '2022-12-12', 'Préparation', 'C', 7),
(22, 'Tteobboki', '2022-11-09', 'Course', 'P', 8),
(23, 'Tteobboki', '2022-11-09', 'Tutoriel', 'P', 8),
(24, 'Tteobboki', '2022-11-09', 'Préparation', 'P', 8),
(25, 'Mandus', '2023-01-10', 'Course', 'C', 9),
(26, 'Mandus', '2023-01-10', 'Tutoriel', 'C', 9),
(27, 'Mandus', '2023-01-10', 'Préparation', 'C', 9),
(28, 'vm007', '2023-04-13', 'vm007', 'P', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_compte_cpt`
--

CREATE TABLE `t_compte_cpt` (
  `cpt_pseudo` varchar(200) NOT NULL,
  `mdp` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_compte_cpt`
--

INSERT INTO `t_compte_cpt` (`cpt_pseudo`, `mdp`) VALUES
('Clarani@hotmail.fr', '7f062ea2b7c1f5563fb6570b9f25b673'),
('contact.responsable@reachseoul.fr', 'c42e7b6fab5710120033b28db3ce0fac'),
('Corentil@hotmail.fr', 'ff03488d036bec2d27b24c250756044e'),
('Lauraleen.responsable@reachseoul.fr', '2df78b8978f2d697a9db5d7d6f8e822c'),
('Laurent@hotmail.fr', 'e5a4271d4e4c4c6366942b178ad41ff6'),
('Linda15@hotmail.fr', '3f089dfc8e6fb87288572695703de02b'),
('Maria@hotmail.fr', '477a77a46a300b8b854d6b9ca029822c'),
('Michahil@hotmail.fr', '53aa72762dd902cf3caf24cbe7d14ae7'),
('Myria.responsable@reachseoul.fr', 'dd00f2dc759d5631c300df2e3aa6f51b'),
('Robert@hotmail.fr', 'ce5653f45f6ec752bb598d8d38ba25df'),
('Sabrina@hotmail.fr', 'da084b6fa1579a62ef648988ef4a6773'),
('Sebastis@hotmail.fr', 'ae7a9075a867d08998a6c5b42953512c'),
('SimSsimon@hotmail.fr', '194af538e3c5d31464a94d5f5c7009c3'),
('vm007@hotmail.fr', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- Structure de la table `t_configuration_t`
--

CREATE TABLE `t_configuration_t` (
  `cfg_id` int(11) NOT NULL,
  `cfg_nom` varchar(120) DEFAULT NULL,
  `cfg_description` varchar(120) DEFAULT NULL,
  `cfg_mot_du_president` varchar(300) DEFAULT NULL,
  `cfg_adresse_postale` int(11) DEFAULT NULL,
  `cfg_mail` varchar(120) DEFAULT NULL,
  `cfg_numero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_configuration_t`
--

INSERT INTO `t_configuration_t` (`cfg_id`, `cfg_nom`, `cfg_description`, `cfg_mot_du_president`, `cfg_adresse_postale`, `cfg_mail`, `cfg_numero`) VALUES
(1, 'ReachSeoul', 'Atelier Culianire', 'ReachSeoul vous invite à un voyage à Séoul. Nos ateliers culinaires vous permettrons de découvrir la nourriture mais également la culture de la Corée.\r\nVenez en famille ou entre amis afin d\'apprendre à cuisiner coréen ensemble', 148, 'reach@hotmail.fr', 747524028);

-- --------------------------------------------------------

--
-- Structure de la table `t_news_new`
--

CREATE TABLE `t_news_new` (
  `new_id` int(11) NOT NULL,
  `new_titre` varchar(80) NOT NULL,
  `new_texte` varchar(500) NOT NULL,
  `new_date` date DEFAULT NULL,
  `new_etat` char(1) DEFAULT NULL,
  `cpt_pseudo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_news_new`
--

INSERT INTO `t_news_new` (`new_id`, `new_titre`, `new_texte`, `new_date`, `new_etat`, `cpt_pseudo`) VALUES
(1, 'Recette de jour !', 'Le Bulgogi au Boeuf', '2023-03-09', 'P', 'Linda15@hotmail.fr'),
(2, 'C\'est Kimchi today !', 'Les coréens accompagnent tous leur repas avec du kimchi et vous aussi dorénavant', '2022-06-05', 'C', 'Sabrina@hotmail.fr'),
(3, 'La Gourmandise du Jour', 'Les Bungeoppang...Une gourmandise dont les Coréens raffolent. Il s\'agit d\'un gâteau gaufré en forme de poisson avec un cœur fourré à la crème glacée', '2023-08-09', 'P', 'Robert@hotmail.fr'),
(4, 'Les Tteobbokkis', 'Imaginez des gâteaux de riz moelleux et moelleux baignés dans un bain audacieux et fougueux de sauce au piment', '2023-02-04', 'P', 'Sabrina@hotmail.fr'),
(5, 'Les kimbaps', 'Ayant l\'apparence d\'un maki mais en plus gros, les kimpap sont faits de riz enroulé dans une feuille d\'algue séchée, avec des lamelles de carotte, de radis, d\'oeuf, de jambon et divers ingrédients.', '2021-09-08', 'C', 'Corentil@hotmail.fr'),
(6, 'Bibimpap', 'Un mélange de riz,de légumes,de bœuf émincé,le tout recouvert par un œuf au plat et des graines de sésame', '2023-04-08', 'P', 'Maria@hotmail.fr'),
(7, 'Le hoppang', 'Le hoppang se présente sous la forme d\'une brioche blanche cuite à la vapeur, qui a la forme d\'une balle.C\'est un en-cas que les Coréens mangent habituellement en hiver.', '2021-06-03', 'C', 'SimSsimon@hotmail.fr'),
(8, 'Le Samgyetang', 'C\'est un petit poulet entier farci de riz gluant, de jujube, d\'ail, de châtaignes, et de racine de ginseng, le tout cuit dans un bouillon. Ce plat aurait des vertus énergisantes', '2023-06-09', 'C', 'Michahil@hotmail.fr');

-- --------------------------------------------------------

--
-- Structure de la table `t_profil_pfl`
--

CREATE TABLE `t_profil_pfl` (
  `cpt_pseudo` varchar(200) NOT NULL,
  `pfl_nom` varchar(80) DEFAULT NULL,
  `pfl_prenom` varchar(80) DEFAULT NULL,
  `pfl_validite` char(1) DEFAULT NULL,
  `pfl_role` char(1) DEFAULT NULL,
  `pfl_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_profil_pfl`
--

INSERT INTO `t_profil_pfl` (`cpt_pseudo`, `pfl_nom`, `pfl_prenom`, `pfl_validite`, `pfl_role`, `pfl_date`) VALUES
('Clarani@hotmail.fr', 'Plauret', 'Claria', 'A', 'R', '2021-06-08'),
('contact.responsable@reachseoul.fr', 'Luaret', 'Liliana', 'A', 'R', '2020-10-08'),
('Corentil@hotmail.fr', 'Didier', 'Corentin', 'D', 'A', '2022-06-04'),
('Lauraleen.responsable@reachseoul.fr', 'Abrya', 'Lauraleen', 'A', 'R', '2021-07-06'),
('Laurent@hotmail.fr', 'Guourad', 'Laurent', 'D', 'A', '2020-09-06'),
('Linda15@hotmail.fr', 'Méry', 'Linda', 'A', 'A', '2022-06-08'),
('Maria@hotmail.fr', 'Pérez', 'Mariana', 'A', 'R', '2022-09-08'),
('Michahil@hotmail.fr', 'Paul', 'Michahil', 'D', 'A', '2023-01-02'),
('Myria.responsable@reachseoul.fr', 'Zakaria', 'Myria', 'A', 'R', '2020-08-07'),
('Robert@hotmail.fr', 'Fraisi', 'Robert', 'D', 'A', '2022-06-07'),
('Sabrina@hotmail.fr', 'Quéra', 'Sabrina', 'D', 'A', '2022-07-08'),
('Sebastis@hotmail.fr', 'Séchinet', 'Sébastien', 'D', 'A', '2022-07-04'),
('SimSsimon@hotmail.fr', 'Charles', 'Simon', 'D', 'A', '2020-09-06'),
('vm007@hotmail.fr', 'vm007', 'o\'tool', 'A', 'A', '2023-04-13');

-- --------------------------------------------------------

--
-- Structure de la table `t_ressources_t`
--

CREATE TABLE `t_ressources_t` (
  `rcs_id` int(11) NOT NULL,
  `rcs_titre` varchar(80) DEFAULT NULL,
  `rcs_description` varchar(300) DEFAULT NULL,
  `rcs_chemin_acces` varchar(500) DEFAULT NULL,
  `res_type` tinyint(4) DEFAULT NULL,
  `atl_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_ressources_t`
--

INSERT INTO `t_ressources_t` (`rcs_id`, `rcs_titre`, `rcs_description`, `rcs_chemin_acces`, `res_type`, `atl_id`) VALUES
(4, 'Boeuf Bulgogi', 'Tutoriel pour votre bulgogi ', 'https://www.youtube.com/watch?v=lfVJ-SaOkrU', 2, 2),
(5, 'Boeuf Bulgogi', 'Tutoriel simplifié ', 'https://www.youtube.com/watch?v=dtcaADEZt9A', 2, 2),
(6, 'Le Bulgogi', 'Aperçu finale', '/dinfl2/zzakarimy/V2/assets/ressources/etape_bulgogi.jpg', 2, 2),
(7, 'La recette', 'La Recette', '/dinfl2/zzakarimy/V2/assets/ressources/recette_bulgogi.pdf', 2, 3),
(8, 'Le Bulgogi', 'Ingrédients pour la viande', '/dinfl2/zzakarimy/V2/assets/ressources/recipe_bulgogi.webp', 2, 3),
(9, 'Le Bulgogi', 'Aperçu finale', '/dinfl2/zzakarimy/V2/assets/ressources/etape_bulgogi.jpg', 2, 3),
(10, 'Le délicieux Bibimpap ', 'Les ingrédients pour votre bibimpap', 'https://www.youtube.com/watch?v=p5kSijiL5cU', 2, 4),
(11, 'Le délicieux Bibimpap ', 'Bibimpap végétarien', 'https://www.lespepitesdenoisette.fr/les-recettes/bibimbap-vegetarien/', 2, 4),
(12, 'Le délicieux Bibimpap ', 'Aperçu finale', '/dinfl2/zzakarimy/V2/assets/ressources/bibimpap_vege.webp', 2, 4),
(13, 'Le Bibimpap', 'Tutoriel pour votre bibimpap ', 'https://www.youtube.com/watch?v=k4AN9XdkULM', 2, 5),
(14, 'Le Bibimpap', 'Tutoriel simplifié ', 'https://www.youtube.com/watch?v=k4AN9XdkULM', 2, 5),
(15, 'Le Bibimpap', 'Aperçu finale ', '/dinfl2/zzakarimy/V2/assets/ressources/bibimpap.jpg', 2, 5),
(16, 'La recette', 'La Recette', '/dinfl2/zzakarimy/V2/assets/ressources/recette_bibimpap.pdf', 2, 6),
(17, 'La recette', 'La Recette : step by step', '/dinfl2/zzakarimy/V2/assets/ressources/recette_bibimpap.pdf', 2, 6),
(18, 'La recette', 'Aperçu finale', '/dinfl2/zzakarimy/V2/assets/ressources/bibimpap.jpg', 2, 6),
(19, 'Le Gamjatang', 'Les ingrédients pour votre Gamajatang', 'https://www.pressurecookrecipes.com/wp-content/uploads/2020/11/instant-pot-gamjatang-ingredients-820x608.jpg', 2, 7),
(20, 'Le Gamjatang', 'La Recette', 'https://www.maangchi.com/recipe/gamjatang', 2, 7),
(21, 'Le Gamjatang', 'Aperçu finale', '/dinfl2/zzakarimy/V2/assets/ressources/gamjatang.jpg', 2, 7),
(22, 'Le Gamjatang', 'Tutoriel pour votre Gamajatang', 'https://www.youtube.com/watch?v=dfET5tfvnxw', 2, 8),
(23, 'Le Gamjatang', 'Tutoriel Simplifié', 'https://www.youtube.com/watch?v=D8ou69E-dXY', 2, 8),
(24, 'Le Gamjatang', 'Aperçu finale', '/dinfl2/zzakarimy/V2/assets/ressources/gamjatang.jpg', 2, 8),
(25, 'Le Gamjatang', 'La Recette : Step by step', 'https://mykoreankitchen.com/gamjatang-pork-bone-soup/', 2, 9),
(26, 'Le Gamjatang', 'La Recette', 'https://www.maangchi.com/recipe/gamjatang', 2, 9),
(27, 'Le Gamjatang', 'Aperçu finale', '/dinfl2/zzakarimy/V2/assets/ressources/gamjatang.jpg', 2, 9),
(28, 'Le Dakgalbi', 'Les ingrédients pour votre dakgalbi', 'https://www.wandercooks.com/wp-content/uploads/2020/06/wc-ingredients-dakgalbi-1.jpg', 2, 10),
(29, 'Dakgalbi', 'Aperçu du dakgalbi', 'https://i.pinimg.com/564x/4e/29/d6/4e29d60c3204c4ee773026269ec247b4.jpg', 2, 10),
(30, 'Dakgalbi', 'Aperçu du dakgalbi', 'https://i.pinimg.com/564x/4e/29/d6/4e29d60c3204c4ee773026269ec247b4.jpg', 2, 10),
(31, 'Le Dakgalbi', 'Tutoriel pour votre Dakgalbi', 'https://www.youtube.com/watch?v=RtHPJAUBpp0', 2, 11),
(32, 'Le Dakgalbi', 'Tutoriel simplifié', 'https://www.youtube.com/watch?v=Gz0X_QVd7gc', 2, 11),
(33, 'Dakgalbi', 'Spicy grilled chicken and vegetables (Dakgalbi: 닭갈비)', 'https://www.youtube.com/watch?v=ncv1NbfeqNw', 2, 11),
(34, 'Le Dakgalbi', 'La Recette', '/dinfl2/zzakarimy/V2/assets/ressources/recette_dakgalbi.pdf', 2, 12),
(35, 'Le Dakgalbi', 'La Recette : Step by Step', 'https://theodehlicious.com/cheese-dakgalbi/', 2, 12),
(36, 'Dakgalbi', 'Aperçu du dakgalbi', 'https://i.pinimg.com/564x/4e/29/d6/4e29d60c3204c4ee773026269ec247b4.jpg', 2, 12),
(37, 'Les Bungeoppangs', 'Fourrez vos Bungeoppang', 'https://i.pinimg.com/564x/89/fc/03/89fc03c1c67f8aa501b1b352fbb691d0.jpg', 2, 13),
(38, 'Les Bungeoppangs', 'Tutoriel pour vos Bungeoppangs', 'https://www.youtube.com/watch?v=ZD1Q2ND2KsQ', 2, 14),
(39, 'La Recette', 'La Recette', 'https://yuns.fr/recette-bungeoppang/', 2, 15),
(40, 'Le Kimchi', 'Les Ingrédients pour votre Kimchi', '/dinfl2/zzakarimy/V2/assets/ressources/ingredient_kimchi.jpg', 2, 16),
(41, 'Le Kimchi', 'Tutoriel pour votre Kimchi', 'https://www.youtube.com/watch?v=35FRpUlE1qk', 2, 17),
(42, 'La Recette', 'La Recette', '/dinfl2/zzakarimy/V2/assets/ressources/recette_kimchi.pdf', 2, 18),
(43, 'Les kimbaps', 'Les ingrédients pour votre kimbap', 'https://th.bing.com/th/id/R.4503ddb3b13f575f021dd349d3e2cb5a?rik=g5ItCg59iuYzNA&riu=http%3a%2f%2fkimchimari.com%2fwp-content%2fuploads%2f2015%2f04%2fkimbap_ingredients.jpg&ehk=wxREBOdLuuHOUeMM1wQ6qDyD9gZ3%2fxWUIVPfuhvCphk%3d&risl=&pid=ImgRaw&r=0&sres=1&sresct=1', 2, 19),
(44, 'Les Kimpabs', 'Tutoriel pour vos kimbaps', 'https://www.youtube.com/watch?v=p5kSijiL5cU', 2, 20),
(45, 'La Recette', 'La Recette', '/dinfl2/zzakarimy/V2/assets/ressources/recette_kimpab.pdf', 2, 21),
(46, 'Tteobboki', 'Les Ingrédients pour votre Tteobboki', 'https://drivemehungry.com/wp-content/uploads/2021/02/tteokbokki-korean-rice-cakes-1-768x576.jpg', 2, 22),
(47, 'Les Tteobbokis', 'Tutoriel pour vos kimbaps', '/dinfl2/zzakarimy/V2/assets/ressources/tuto_tteobokki.mp4', 2, 23),
(48, 'La Recette', 'La Recette', 'https://hellonelo.com/recettes/recette-tteokbokki/', 2, 24),
(49, 'Les Mandus', 'Les ingrédients pour vos Mandus', 'https://th.bing.com/th/id/R.1a27a350e485a6d50621ad3be0a140c2?rik=1Ej8zmTVzMTRmA&pid=ImgRaw&r=0', 2, 25),
(50, 'Les Mandus', 'Tutoriel pour vos Mandus', '/dinfl2/zzakarimy/V2/assets/ressources/tuto_mandu.mp4', 2, 26),
(51, 'La Recette', 'Recette complète des raviolis', 'https://yuns.fr/recette-mandu-vegetarien/', 2, 27);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_activite_t`
--
ALTER TABLE `t_activite_t`
  ADD PRIMARY KEY (`pad_id`);

--
-- Index pour la table `t_animation_t`
--
ALTER TABLE `t_animation_t`
  ADD PRIMARY KEY (`cpt_pseudo`,`pad_id`),
  ADD KEY `t_pad_FK` (`pad_id`);

--
-- Index pour la table `t_atelier_t`
--
ALTER TABLE `t_atelier_t`
  ADD PRIMARY KEY (`atl_id`),
  ADD KEY `atl_atelier_atl_FK` (`pad_id`);

--
-- Index pour la table `t_compte_cpt`
--
ALTER TABLE `t_compte_cpt`
  ADD PRIMARY KEY (`cpt_pseudo`);

--
-- Index pour la table `t_configuration_t`
--
ALTER TABLE `t_configuration_t`
  ADD PRIMARY KEY (`cfg_id`);

--
-- Index pour la table `t_news_new`
--
ALTER TABLE `t_news_new`
  ADD PRIMARY KEY (`new_id`),
  ADD KEY `t_new_t_cpt_FK` (`cpt_pseudo`);

--
-- Index pour la table `t_profil_pfl`
--
ALTER TABLE `t_profil_pfl`
  ADD PRIMARY KEY (`cpt_pseudo`);

--
-- Index pour la table `t_ressources_t`
--
ALTER TABLE `t_ressources_t`
  ADD PRIMARY KEY (`rcs_id`),
  ADD KEY `rsc_ressources_rsc_FK` (`atl_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_activite_t`
--
ALTER TABLE `t_activite_t`
  MODIFY `pad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `t_atelier_t`
--
ALTER TABLE `t_atelier_t`
  MODIFY `atl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `t_configuration_t`
--
ALTER TABLE `t_configuration_t`
  MODIFY `cfg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `t_news_new`
--
ALTER TABLE `t_news_new`
  MODIFY `new_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `t_ressources_t`
--
ALTER TABLE `t_ressources_t`
  MODIFY `rcs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_animation_t`
--
ALTER TABLE `t_animation_t`
  ADD CONSTRAINT `t_cpt_FK` FOREIGN KEY (`cpt_pseudo`) REFERENCES `t_compte_cpt` (`cpt_pseudo`),
  ADD CONSTRAINT `t_pad_FK` FOREIGN KEY (`pad_id`) REFERENCES `t_activite_t` (`pad_id`);

--
-- Contraintes pour la table `t_atelier_t`
--
ALTER TABLE `t_atelier_t`
  ADD CONSTRAINT `atl_atelier_atl_FK` FOREIGN KEY (`pad_id`) REFERENCES `t_activite_t` (`pad_id`);

--
-- Contraintes pour la table `t_news_new`
--
ALTER TABLE `t_news_new`
  ADD CONSTRAINT `t_new_t_cpt_FK` FOREIGN KEY (`cpt_pseudo`) REFERENCES `t_compte_cpt` (`cpt_pseudo`);

--
-- Contraintes pour la table `t_profil_pfl`
--
ALTER TABLE `t_profil_pfl`
  ADD CONSTRAINT `t_pfl_t_cpt_FK` FOREIGN KEY (`cpt_pseudo`) REFERENCES `t_compte_cpt` (`cpt_pseudo`);

--
-- Contraintes pour la table `t_ressources_t`
--
ALTER TABLE `t_ressources_t`
  ADD CONSTRAINT `rsc_ressources_rsc_FK` FOREIGN KEY (`atl_id`) REFERENCES `t_atelier_t` (`atl_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

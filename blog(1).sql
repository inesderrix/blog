-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 28 nov. 2024 à 09:59
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

DROP TABLE IF EXISTS `billets`;
CREATE TABLE IF NOT EXISTS `billets` (
  `id_billet` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_billet`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `billets`
--

INSERT INTO `billets` (`id_billet`, `titre`, `contenu`, `date`) VALUES
(6, 'Si vous avez aimé Zodiac, découvrez le nouveau documentaire sur Netflix', 'Pour les amateurs de mystères non résolus, Netflix a récemment sorti un documentaire passionnant sur l’affaire du tueur du Zodiaque. Si le film Zodiac de David Fincher vous a captivé, ce documentaire va plus loin en explorant des preuves, des témoignages, et des pistes inédites depuis l\'époque du film. Il apporte une perspective complémentaire, idéale pour ceux qui souhaitent approfondir ce mystère criminel.\r\n\r\n <p style=\"text-indent: 20px;\"> Ce documentaire enrichit parfaitement le film en offrant un nouveau regard sur cette enquête énigmatique et ses zones d\'ombre.<p/>', '2024-10-30'),
(1, ' \"Seven\" : La quête de justice à travers les péchés capitaux', ' Seven est plus qu’un simple thriller policier : c’est une réflexion sur la nature du crime, de la justice et de la souffrance humaine. Les détectives Somerset (Morgan Freeman) et Mills (Brad Pitt) poursuivent un tueur en série qui tue ses victimes en fonction des sept péchés capitaux.\r\n       <p style=\"text-indent: 20px;\"> Le film soulève des questions philosophiques sur le sens de la souffrance et le rôle de la justice dans un monde souvent cruel et injuste. Le contraste entre les deux détectives, l’un proche de la retraite et déçu par la société, l’autre jeune et idéaliste, est fascinant. Le tueur, incarné par Kevin Spacey, est une figure énigmatique qui pousse les détectives à se remettre en question sur leurs croyances morales.<P/>\r\n\r\n', '2024-10-15'),
(4, 'Usual Suspects : Le twist ultime du cinéma noir', ' Usual Suspects est un thriller criminel qui déstabilise le spectateur avec un twist final magistral. Réalisé par Bryan Singer et écrit par Christopher McQuarrie, le film raconte l’histoire de l’enquête sur un groupe de criminels, dont le chef, Keyser Söze, reste mystérieusement absent.\r\n     <p style=\"text-indent: 20px;\">   Ce qui rend le film captivant, c’est la façon dont la narration est menée à travers les yeux de Verbal Kint (Kevin Spacey), un des suspects, qui raconte l’histoire d’une manière biaisée et subjective. Le twist final change toute la perception du film, et c’est ce qui en fait un classique du genre.<P/>\r\n      <p style=\"text-indent: 20px;\">  Usual Suspects joue également avec l’idée de la vérité et de l’illusion, et pose des questions sur la fiabilité des narrateurs dans les récits criminels.\r\n<P/>', '2024-10-23'),
(2, 'Zodiac : L\'obsession de la vérité et le poids de l\'échec', 'ATTENTION SPOILER. <BR>\r\n\r\n\r\n       <p style=\"text-indent: 20px;\"> Zodiac raconte l’histoire de l’enquête sur le tueur du Zodiac, un criminel insaisissable qui a terrorisé la région de San Francisco dans les années 60 et 70. Ce thriller magistral de David Fincher se distingue par son approche réaliste et méthodique de l’enquête.<P/>\r\n\r\n\r\n       <p style=\"text-indent: 20px;\"> Contrairement à d\'autres thrillers où l\'on suit l\'action de près, Zodiac prend son temps pour explorer les différents aspects de l’enquête, notamment la pression sur les policiers et les journalistes. L’obsession des personnages, comme le journaliste Robert Graysmith (Jake Gyllenhaal) et le détective Dave Toschi (Mark Ruffalo), est le cœur du film. Mais, à la différence de Seven, Zodiac n’offre pas de résolution claire, ce qui renforce l’aspect frustrant et déstabilisant de la recherche de la vérité.\r\n<P/>\r\n', '2024-10-18'),
(5, 'Mindhunter : Une exploration psychologique captivante', 'Si vous êtes passionné par les enquêtes criminelles et l\'esprit des tueurs en série, Mindhunter, la série de David Fincher, est faite pour vous. Disponible sur Netflix, elle suit deux agents du FBI, Holden Ford et Bill Tench, qui interrogent des tueurs en série notoires dans les années 70 pour comprendre leur psychologie et résoudre des crimes similaires.\r\n\r\n <p style=\"text-indent: 20px;\">\r\nÀ travers des entretiens tendus et dérangeants avec des criminels comme Edmund Kemper, Mindhunter plonge dans les complexités de l’esprit humain, tout en offrant une exploration fascinante du travail du FBI à l’époque. L’ambiance sombre et le suspense qui caractérisent les œuvres de Fincher sont présents ici à chaque épisode.<p/>', '2024-10-26'),
(3, 'Le Silence des Agneaux : Un chef-d\'œuvre du thriller psychologique', 'Le Silence des Agneaux est un incontournable du cinéma qui a marqué l\'histoire du thriller psychologique. Réalisé par Jonathan Demme et sorti en 1991, ce film nous plonge dans l\'univers tordu de la criminalité et de la psychologie criminelle, avec une performance magistrale d\'Anthony Hopkins dans le rôle de Hannibal Lecter.\r\n\r\n <p style=\"text-indent: 20px;\">\r\nL\'histoire suit l\'agent du FBI, Clarice Starling (interprétée par Jodie Foster), alors qu’elle tente de capturer un tueur en série en sollicitant l’aide du célèbre psychopathe Hannibal Lecter, un tueur cannibale emprisonné. Ce film va bien au-delà d\'une simple enquête criminelle ; il explore les manipulations psychologiques, la tension entre les personnages et la lutte mentale qui s\'instaure entre Starling et Lecter.<p/>\r\n\r\n <p style=\"text-indent: 20px;\">\r\nLe Silence des Agneaux est un parfait mélange de suspense, de psychologie et d’horreur subtile, et sa capacité à explorer les profondeurs de l\'esprit humain en fait un classique du genre. Si vous aimez les films qui laissent une empreinte durable et qui vous poussent à réfléchir longtemps après la fin du générique, ce film est un must.<p/>', '2024-10-21');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id_com` int NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `auteur_id` int NOT NULL,
  `billet_id` int NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_com`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id_com`, `commentaire`, `auteur_id`, `billet_id`, `date`) VALUES
(1, 'bonjour, j\'ai adoré le site', 1, 7, '2024-11-04'),
(2, 'joyeux anniversaire', 1, 7, '2024-11-06'),
(3, 'jadore', 1, 7, '2024-11-06'),
(4, '<3', 1, 7, '2024-11-06'),
(5, 'trop bien', 1, 7, '2024-11-06'),
(6, 'ca va', 1, 7, '2024-11-06'),
(7, 'omg', 1, 7, '2024-11-06'),
(8, 'je suis trop fan', 1, 7, '2024-11-06'),
(9, 'tu crois que cest  possible', 1, 7, '2024-11-06'),
(10, 'salut estceque ca marche', 1, 7, '2024-11-06'),
(11, 'bonjour, j\'ai adoré le film. j\'ai hâte de voir le doc', 1, 6, '2024-11-06'),
(12, 'je suis grave d\'accord <3\r\n', 2, 6, '2024-11-25'),
(13, 'c\'est génial !!', 2, 6, '2024-11-28');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `mdp`, `photo`) VALUES
(1, 'root', '$2y$10$HXDaZWTen.HYPWLTLc5x2esbtfiWbvfMjY.G5ZwUXDIFV9cNMFUzm', NULL),
(2, 'louna', '$2y$10$jF8AWhpzdgd900ZxGMII1OGRq62n./Vv8Pgk.y9hHK88m5cQLmDBu', NULL),
(4, 'jean', '$2y$10$4P7.N.7xeqjz0xLJplJIVucMkZiGrKjIPamALlWwZw/UzNvqTYdiK', NULL),
(5, 'marguerite', '$2y$10$wGchZ4.nqTBQ3/LlBx4VUeVxndWFG1L4X6zcXQ0ulvnqJDvIyQ6EO', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

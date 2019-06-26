--
-- Base de données :  `crudbrut`
--
CREATE DATABASE IF NOT EXISTS `crudbrut` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `crudbrut`;

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `idContact` int(11) NOT NULL AUTO_INCREMENT,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  PRIMARY KEY (`idContact`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contacts`
--

--INSERT INTO `contacts` (`idContact`, `lastName`, `firstName`, `mail`, `phoneNumber`) VALUES
--(1, 'Becquerel', 'Nicolas', 'nicobecqu@gmail.com', '0102030405'),
--(13, 'text', 'test', 'text@test.com', '0504030201'),
--(14, 'text', 'test', 'text@test.com', '0504030201'),
--(15, 'text', 'test', 'text@test.com', '0504030201'),
--(20, 'becquerel', 'nicolas', 'becquerel.nicolas@outlook.fr', '0102030405');
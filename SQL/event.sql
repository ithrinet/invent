-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 18 Mai 2013 à 00:48
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `event`
--

-- --------------------------------------------------------

--
-- Structure de la table `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Contenu de la table `empleado`
--

INSERT INTO `empleado` (`id`, `nombre`, `apellidos`, `correo`, `direccion`, `fechaNacimiento`) VALUES
(8, 'rifeno2', 'refino2', 'rifeon@amwad.com', 'rfsdf df sdf 25', '2009-01-01'),
(9, 'rifeno55', 'refino', 'rifeon@amwad.com', 'rfsdf df sdf 25', '2008-01-01'),
(10, 'rifeno2', 'refino', 'rifeon@amwad.com', 'rfsdf df sdf 25', '2008-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `impresora`
--

CREATE TABLE IF NOT EXISTS `impresora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empleado_id` int(11) DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `marca` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `modelo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_393B5991952BE730` (`empleado_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `impresora`
--

INSERT INTO `impresora` (`id`, `empleado_id`, `nombre`, `marca`, `modelo`, `tipo`) VALUES
(2, NULL, 'Recepcion', 'samsung', 'ML-2165', 'laser'),
(3, 8, 'HHMM', 'samsung', 'ML-2165', 'laser'),
(4, 10, 'Recepcion5', 'Lg', 'ML-216563', 'laser');

-- --------------------------------------------------------

--
-- Structure de la table `movil`
--

CREATE TABLE IF NOT EXISTS `movil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empleado_id` int(11) DEFAULT NULL,
  `modelo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A54365CF952BE730` (`empleado_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `movil`
--

INSERT INTO `movil` (`id`, `empleado_id`, `modelo`, `numero`) VALUES
(1, 8, 'Nokia n66', 600173096);

-- --------------------------------------------------------

--
-- Structure de la table `ordenador`
--

CREATE TABLE IF NOT EXISTS `ordenador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empleado_id` int(11) DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ram` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `disco` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cpu` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_98BFE544952BE730` (`empleado_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `ordenador`
--

INSERT INTO `ordenador` (`id`, `empleado_id`, `nombre`, `ram`, `disco`, `cpu`, `descripcion`) VALUES
(1, 8, 'Desktop02', '2Gb', '250GB', '2,5', 'gcdzi ufjiv gjlhlo lbjlkb o lkh'),
(2, NULL, 'laptop8', '2Gb', '250GB', 'E5200 3,00 GHz', 'Lptop de trabajo');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `impresora`
--
ALTER TABLE `impresora`
  ADD CONSTRAINT `impresora_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `movil`
--
ALTER TABLE `movil`
  ADD CONSTRAINT `movil_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `ordenador`
--
ALTER TABLE `ordenador`
  ADD CONSTRAINT `ordenador_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

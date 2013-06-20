-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 20 jun 2013 om 17:02
-- Serverversie: 5.5.31-MariaDB-1~squeeze
-- PHP-versie: 5.4.16-1~dotdeb.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `eindwerk`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(45) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `category`
--

INSERT INTO `category` (`categoryID`, `label`, `status`) VALUES
(1, 'bloem', 1),
(2, 'struik', 1),
(3, 'boom', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categoryLocale`
--

CREATE TABLE IF NOT EXISTS `categoryLocale` (
  `categoryLocaleID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryID` int(11) DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `locale` varchar(5) NOT NULL,
  `translated` tinyint(4) NOT NULL,
  PRIMARY KEY (`categoryLocaleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Gegevens worden uitgevoerd voor tabel `categoryLocale`
--

INSERT INTO `categoryLocale` (`categoryLocaleID`, `categoryID`, `name`, `comment`, `status`, `locale`, `translated`) VALUES
(1, 1, 'Bloemen', 'dat is de overzicht', 1, 'nl_BE', 1),
(2, 1, 'Fleurs', 'tout les fleurs', 1, 'fr_BE', 1),
(3, 2, 'Struiken', 'dat is de overzicht van struiken', 1, 'nl_BE', 1),
(4, 2, 'frstruik', 'tout les fr struik', 1, 'fr_BE', 1),
(5, 3, 'Bomen', 'dat is de overzicht van alle bomen', 1, 'nl_BE', 1),
(6, 2, 'Arbres', 'tout les Abres', 1, 'fr_BE', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `controllers`
--

CREATE TABLE IF NOT EXISTS `controllers` (
  `controllersID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`controllersID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `pagesID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(45) DEFAULT NULL,
  `description` text,
  `menu` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `locale` varchar(5) NOT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`pagesID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Gegevens worden uitgevoerd voor tabel `pages`
--

INSERT INTO `pages` (`pagesID`, `title`, `slug`, `description`, `menu`, `status`, `locale`, `sort`) VALUES
(1, 'Home', 'home', 'dit de home pagina', 1, 1, 'nl_BE', 100),
(2, 'Maison', 'home', 'cest fr maison', 1, 1, 'fr_BE', 100),
(3, 'About', 'about', 'dat is de about', 1, 1, 'nl_BE', 200),
(4, 'Qui', 'about', 'le qui en francais', 1, 1, 'fr_BE', 200),
(5, 'Kontakt', 'contact', 'dat is de contact', 1, 1, 'nl_BE', 150),
(6, 'ContactFr', 'contact', 'le contact', 1, 1, 'fr_BE', 200);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pagesPhoto`
--

CREATE TABLE IF NOT EXISTS `pagesPhoto` (
  `pagesPhoto` int(11) NOT NULL AUTO_INCREMENT,
  `pagesID` int(11) NOT NULL,
  `photoID` int(11) NOT NULL,
  PRIMARY KEY (`pagesPhoto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `photoID` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`photoID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `photoLocale`
--

CREATE TABLE IF NOT EXISTS `photoLocale` (
  `photoLocale` int(11) NOT NULL,
  `photoID` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `teaser` varchar(45) DEFAULT NULL,
  `locale` varchar(5) NOT NULL,
  `translated` tinyint(4) NOT NULL,
  PRIMARY KEY (`photoLocale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(45) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `product`
--

INSERT INTO `product` (`productID`, `label`, `status`) VALUES
(1, 'esdoorn', 1),
(2, 'glansmispel', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `productCategory`
--

CREATE TABLE IF NOT EXISTS `productCategory` (
  `productCategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `productID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  PRIMARY KEY (`productCategoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `productCategory`
--

INSERT INTO `productCategory` (`productCategoryID`, `productID`, `categoryID`) VALUES
(1, 1, 3),
(2, 2, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `productLocale`
--

CREATE TABLE IF NOT EXISTS `productLocale` (
  `productLocaleID` int(11) NOT NULL AUTO_INCREMENT,
  `productID` int(11) NOT NULL,
  `price` double(10,0) DEFAULT NULL,
  `title` varchar(45) NOT NULL,
  `teaser` varchar(255) DEFAULT NULL,
  `content` text,
  `locale` varchar(5) NOT NULL,
  `translated` tinyint(4) NOT NULL,
  PRIMARY KEY (`productLocaleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `productLocale`
--

INSERT INTO `productLocale` (`productLocaleID`, `productID`, `price`, `title`, `teaser`, `content`, `locale`, `translated`) VALUES
(1, 1, 10, 'Esdoorn', 'dit is de esdoorn', 'de volledige omschrif esdoorn', 'nl_BE', 1),
(2, 2, 10, 'Glansmispel', 'dit is de glansmispel', 'de latijnse Photinia', 'nl_BE', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `productPhoto`
--

CREATE TABLE IF NOT EXISTS `productPhoto` (
  `productPhotoID` int(11) NOT NULL AUTO_INCREMENT,
  `productID` int(11) NOT NULL,
  `photoID` int(11) NOT NULL,
  PRIMARY KEY (`productPhotoID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `rolesID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`rolesID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `translate`
--

CREATE TABLE IF NOT EXISTS `translate` (
  `translateID` int(11) NOT NULL,
  `locale` varchar(5) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `translation` text,
  `translated` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`translateID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `usersID` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(45) NOT NULL,
  `name` varchar(100) NOT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `passwd` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`usersID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `usersRoles`
--

CREATE TABLE IF NOT EXISTS `usersRoles` (
  `usersRolesID` int(11) NOT NULL AUTO_INCREMENT,
  `usersID` int(11) NOT NULL,
  `rolesID` int(11) NOT NULL,
  PRIMARY KEY (`usersRolesID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `valuta`
--

CREATE TABLE IF NOT EXISTS `valuta` (
  `valutaID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `valuta` decimal(10,0) NOT NULL,
  PRIMARY KEY (`valutaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

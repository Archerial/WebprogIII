-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3306
-- Létrehozás ideje: 2020. Máj 25. 11:47
-- Kiszolgáló verziója: 5.7.26
-- PHP verzió: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `webprogshop`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `adminname` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`adminname`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `admin`
--

INSERT INTO `admin` (`id`, `email`, `adminname`, `password`) VALUES
(9, 'admin@admin.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_hungarian_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `productname` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `price` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productGroup` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `productName` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `productDescription` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `productPrice` int(11) NOT NULL,
  `productPicture` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `productCode` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `productCode` (`productCode`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`id`, `productGroup`, `productName`, `productDescription`, `productPrice`, `productPicture`, `productCode`) VALUES
(20, 'Műszaki', 'Steelseries Siberia', 'Fejlhallgató', 14999, './uploads/img/products/FJH001', 'FJH001'),
(19, 'Műszaki', 'Crosshair FXT', 'Billentyűzet', 10000, './uploads/img/products/BIL001', 'BIL001'),
(21, 'Műszaki', 'Genius FaceCam', 'Webkamera', 7900, './uploads/img/products/CAM001', 'CAM001'),
(22, 'Műszaki', 'Toshiba H310', 'Merevlemez', 7900, './uploads/img/products/MVL001', 'MVL001'),
(23, 'Műszaki', 'Podcast Fx', 'Mikrofon', 16900, './uploads/img/products/MIC001', 'MIC001'),
(24, 'Műszaki', 'LG F30', 'Monitor', 65900, './uploads/img/products/MON001', 'MON001'),
(25, 'Műszaki', 'Kingston K30', 'Pendrive', 7900, './uploads/img/products/PEN001', 'PEN001'),
(26, 'Műszaki', 'nVidia GTX 1060', 'Videókártya', 35900, './uploads/img/products/GCD001', 'GCD001'),
(27, 'Műszaki', 'GamingMouse', 'Gamer egér', 10000, './uploads/img/products/ANL001', 'ANL001'),
(28, 'Szórakoztató elektronika', 'Playstation 4', 'Játékkonzol', 59900, './uploads/img/products/PS4001', 'PS4001'),
(29, 'Szórakoztató elektronika', 'Nintendo switch', 'Játékkonzol', 85000, './uploads/img/products/NIN001', 'NIN001');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `usersdatas`
--

DROP TABLE IF EXISTS `usersdatas`;
CREATE TABLE IF NOT EXISTS `usersdatas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `postalcode` int(11) NOT NULL,
  `streetandnumber` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `phonenumber` char(11) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

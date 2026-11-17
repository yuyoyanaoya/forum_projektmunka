-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2026. Nov 17. 14:32
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `forumprojekt`
--
CREATE DATABASE IF NOT EXISTS `forumprojekt` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `forumprojekt`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalo`
--

CREATE TABLE `felhasznalo` (
  `userID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `displayName` varchar(255) NOT NULL,
  `jelszo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `keresztnev` varchar(255) NOT NULL,
  `vezeteknev` varchar(255) NOT NULL,
  `szuletesiDatum` date NOT NULL,
  `orszag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalo`
--

INSERT INTO `felhasznalo` (`userID`, `username`, `displayName`, `jelszo`, `email`, `keresztnev`, `vezeteknev`, `szuletesiDatum`, `orszag`) VALUES
(10, '', '', '$2y$10$ceKSZ.sIRjYF4CFUTDykjuU2k9eEPvq5kOBK87HrusBOWArbq07.q', 'laszlo.pugner@gmail.com', '', '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kategoriak`
--

CREATE TABLE `kategoriak` (
  `katID` int(11) NOT NULL,
  `katNev` varchar(255) NOT NULL,
  `katLeiras` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `uzenetek`
--

CREATE TABLE `uzenetek` (
  `uzenetID` int(11) NOT NULL,
  `imageName` varchar(255) NOT NULL,
  `nickName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `uzenetek`
--

INSERT INTO `uzenetek` (`uzenetID`, `imageName`, `nickName`) VALUES
(1, 'Yellowcigány', ''),
(2, 'Bazdmeg akkor', ''),
(3, 'Csicska fiammal BP', 'Csicska fiam'),
(4, 'trher5trehjtjtzetjzzttkzz6rktzkt', 'Faszkalap'),
(5, 'trgrgrtgrtgrtg', 'Faszkalap');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalo`
--
ALTER TABLE `felhasznalo`
  ADD PRIMARY KEY (`userID`);

--
-- A tábla indexei `kategoriak`
--
ALTER TABLE `kategoriak`
  ADD PRIMARY KEY (`katID`);

--
-- A tábla indexei `uzenetek`
--
ALTER TABLE `uzenetek`
  ADD PRIMARY KEY (`uzenetID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalo`
--
ALTER TABLE `felhasznalo`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `kategoriak`
--
ALTER TABLE `kategoriak`
  MODIFY `katID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `uzenetek`
--
ALTER TABLE `uzenetek`
  MODIFY `uzenetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

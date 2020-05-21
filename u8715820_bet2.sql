-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 21 May 2020, 22:42:59
-- Sunucu sürümü: 10.3.23-MariaDB
-- PHP Sürümü: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `u8715820_bet2`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `birthdate` varchar(255) DEFAULT NULL,
  `createdate` varchar(255) DEFAULT NULL,
  `TCK` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bet`
--

CREATE TABLE `bet` (
  `id` int(11) NOT NULL,
  `league` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `mbn` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `team1` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `team2` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `sport_type` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `createdate` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `bet`
--

INSERT INTO `bet` (`id`, `league`, `mbn`, `team1`, `team2`, `sport_type`, `createdate`) VALUES
(1, 'BLR', '34', 'Dinamo B', 'FC Isloch', '1', '2020-04-21 20:20:20'),
(3, 'TR', '30', 'GALATASARAY', 'FENERBAHÇE', '1', '2020-05-21 22:24:01'),
(4, 'TR', '50', 'TRABZONSPOR', 'BURSASPOR', '1', '2020-05-21 22:33:48');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `post_id` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `createdate` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `post_id`, `content`, `createdate`) VALUES
(1, '1', '1', 'Manchester is gonna win', '2020-05-21 21:21:54');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `editor`
--

CREATE TABLE `editor` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `birthdate` varchar(255) DEFAULT NULL,
  `createdate` varchar(255) DEFAULT NULL,
  `TCK` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `editor`
--

INSERT INTO `editor` (`id`, `username`, `name`, `surname`, `email`, `phone`, `password`, `birthdate`, `createdate`, `TCK`) VALUES
(1, 'footballhacker', 'john', 'doe', 'johnn@doe.com', '545454545454', '123456', '1990-09-30', '2020-05-21 20:20:20', '111231111113');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `post_id` varchar(255) DEFAULT NULL,
  `createdate` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `post_type` varchar(255) DEFAULT NULL,
  `createdate` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `post`
--

INSERT INTO `post` (`id`, `user_id`, `content`, `post_type`, `createdate`) VALUES
(1, '1', 'Real Madrid- Machester United - This match is crazy!!', '1', '2020-05-21 21:21:30'),
(3, '1', 'better', '1', '2020-05-21 22:32:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `birthdate` varchar(255) DEFAULT NULL,
  `balance` varchar(255) DEFAULT NULL,
  `createdate` varchar(255) DEFAULT NULL,
  `TCK` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `surname`, `email`, `phone`, `password`, `birthdate`, `balance`, `createdate`, `TCK`) VALUES
(1, 'BetDevil', 'test', 'xxx', 'test@xxx.com', '5555555555', '123456', '1990-03-03', '50.0', '2020-05-21 21:21:21', '11111111111');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `bet`
--
ALTER TABLE `bet`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `editor`
--
ALTER TABLE `editor`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `bet`
--
ALTER TABLE `bet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `editor`
--
ALTER TABLE `editor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

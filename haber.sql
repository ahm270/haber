-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 20 May 2019, 07:01:24
-- Sunucu sürümü: 10.1.36-MariaDB
-- PHP Sürümü: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `haber`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bolum`
--

CREATE TABLE `bolum` (
  `BOLUM_ID` int(11) NOT NULL,
  `BOLUM_ADI` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `bolum`
--

INSERT INTO `bolum` (`BOLUM_ID`, `BOLUM_ADI`) VALUES
(1, 'bilgisayar programcılığı'),
(6, 'uçak teknolojileri');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haber`
--

CREATE TABLE `haber` (
  `HABER_ID` int(11) NOT NULL,
  `unvan` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `HABER_ADI` varchar(10000) COLLATE utf8mb4_turkish_ci NOT NULL,
  `TC_NO` int(11) DEFAULT NULL,
  `OGRENCI_NO` int(11) DEFAULT NULL,
  `TURU_ID` int(11) NOT NULL,
  `RESIM_ID` varchar(1024) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `haber`
--

INSERT INTO `haber` (`HABER_ID`, `unvan`, `HABER_ADI`, `TC_NO`, `OGRENCI_NO`, `TURU_ID`, `RESIM_ID`) VALUES
(32, 'a', 'nnn', 1, NULL, 2, '2.png'),
(34, 'c', 'yıl bitmiş', 1, NULL, 3, '5.jpg'),
(35, 'd', 'sdawdsadwasdwasdwasdwasdgwdczwazdwasdwas', 1, NULL, 3, '3.jpg'),
(41, 'hazem', 'ana hazem', 1, NULL, 1, 'ic_launcher.jpg'),
(43, 'w', 'ew', NULL, 166005029, 2, '3.jpg'),
(44, 'jded', 'jdedeeeeee', 1, NULL, 5, 'ic_launcher.jpg'),
(45, 'lelllllllllllllllll', 'llkaspdkpqkpaddaspjdkp', NULL, 166005029, 1, 'politika-630x325.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `insanlar`
--

CREATE TABLE `insanlar` (
  `E_POSTA` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `SIFRE` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ADI` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `SOYADI` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `insanlar`
--

INSERT INTO `insanlar` (`E_POSTA`, `SIFRE`, `ADI`, `SOYADI`) VALUES
('ehsan@gmail.com', '222', 'ahmed', 'al shallaf'),
('hazem.shallaf@hotmail.com', '111', 'hazem', 'al shallaf');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `TC_NO` int(11) NOT NULL,
  `KULLANICI_ADI` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `SIFRE` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `E_POSTA` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ADI` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `SOYADI` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `TELEFON` varchar(12) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`TC_NO`, `KULLANICI_ADI`, `SIFRE`, `E_POSTA`, `ADI`, `SOYADI`, `TELEFON`) VALUES
(1, 'hazem', '111', 'hazem.shallaf@hotmail.com', 'hazem', 'al shallaf', '2147483647');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenci`
--

CREATE TABLE `ogrenci` (
  `OGRENCI_NO` int(11) NOT NULL,
  `SIFRE` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `E_POSTA` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `OGRENCI_ADI` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `OGRENCI_SOYADI` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `TELEFON` varchar(12) COLLATE utf8mb4_turkish_ci NOT NULL,
  `BOLUM_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `ogrenci`
--

INSERT INTO `ogrenci` (`OGRENCI_NO`, `SIFRE`, `E_POSTA`, `OGRENCI_ADI`, `OGRENCI_SOYADI`, `TELEFON`, `BOLUM_ID`) VALUES
(166005027, '333', 'dsad@glsod.com', 'ahmed', 'ahmed', '531262782', 1),
(166005028, '222', 'hazem.shallaf@hotmail.com', 'mohammed', 'süfraci', '2147483647', 1),
(166005029, '111', 'ahmed@hotmail.com', 'hazem', 'al shallaf', '2147483647', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `turu`
--

CREATE TABLE `turu` (
  `TURU_ID` int(11) NOT NULL,
  `TURU_ADI` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `turu`
--

INSERT INTO `turu` (`TURU_ID`, `TURU_ADI`) VALUES
(1, 'spor'),
(2, 'eğitim'),
(3, 'siyaset'),
(5, 'ekonomi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorum`
--

CREATE TABLE `yorum` (
  `YORUM_ID` int(11) NOT NULL,
  `YORUM` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `HABER_ID` int(11) NOT NULL,
  `OGRENCI_NO` int(11) DEFAULT NULL,
  `TC_NO` int(11) DEFAULT NULL,
  `E_POSTA` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `yorum`
--

INSERT INTO `yorum` (`YORUM_ID`, `YORUM`, `HABER_ID`, `OGRENCI_NO`, `TC_NO`, `E_POSTA`) VALUES
(25, 'abomoheb', 34, 166005029, NULL, NULL),
(27, 'abomoheb', 32, 166005029, NULL, NULL),
(29, 'bravo', 40, NULL, 1, NULL),
(30, 'aaa', 40, NULL, 1, NULL),
(32, 'aaa', 33, NULL, 1, NULL),
(33, 'abomoheb', 32, NULL, 1, NULL),
(35, 'aaa', 34, NULL, 1, NULL),
(36, 'abomoheb', 40, NULL, 1, NULL),
(38, 'abomoheb', 32, 166005028, NULL, NULL),
(39, 'abomoheb', 33, 166005028, NULL, NULL),
(40, 'bravo', 32, 166005028, NULL, NULL),
(41, 'aaa', 34, 166005028, NULL, NULL),
(42, '12123', 40, 166005028, NULL, NULL),
(45, 'bravo', 33, 166005029, NULL, NULL),
(48, 'ojş', 41, NULL, 1, NULL),
(51, '12123', 35, NULL, 1, NULL),
(56, 'ana', 34, NULL, NULL, 'hazem.shallaf@hotmail.com');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `bolum`
--
ALTER TABLE `bolum`
  ADD PRIMARY KEY (`BOLUM_ID`);

--
-- Tablo için indeksler `haber`
--
ALTER TABLE `haber`
  ADD PRIMARY KEY (`HABER_ID`);

--
-- Tablo için indeksler `insanlar`
--
ALTER TABLE `insanlar`
  ADD PRIMARY KEY (`E_POSTA`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`TC_NO`);

--
-- Tablo için indeksler `ogrenci`
--
ALTER TABLE `ogrenci`
  ADD PRIMARY KEY (`OGRENCI_NO`,`TELEFON`);

--
-- Tablo için indeksler `turu`
--
ALTER TABLE `turu`
  ADD PRIMARY KEY (`TURU_ID`);

--
-- Tablo için indeksler `yorum`
--
ALTER TABLE `yorum`
  ADD PRIMARY KEY (`YORUM_ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `bolum`
--
ALTER TABLE `bolum`
  MODIFY `BOLUM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `haber`
--
ALTER TABLE `haber`
  MODIFY `HABER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Tablo için AUTO_INCREMENT değeri `ogrenci`
--
ALTER TABLE `ogrenci`
  MODIFY `OGRENCI_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166005030;

--
-- Tablo için AUTO_INCREMENT değeri `turu`
--
ALTER TABLE `turu`
  MODIFY `TURU_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `yorum`
--
ALTER TABLE `yorum`
  MODIFY `YORUM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

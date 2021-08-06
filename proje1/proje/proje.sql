-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Mar 2019, 14:31:19
-- Sunucu sürümü: 10.1.21-MariaDB
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `proje`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `birim`
--

CREATE TABLE `birim` (
  `Birim_ID` int(11) NOT NULL,
  `Birim_Adi` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bolum`
--

CREATE TABLE `bolum` (
  `Bolum_ID` int(11) NOT NULL,
  `Bolum_Adi` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Birim_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dersprogram`
--

CREATE TABLE `dersprogram` (
  `Donem_ID` int(11) NOT NULL,
  `Program_ID` int(11) NOT NULL,
  `Ders_ID` int(11) NOT NULL,
  `Ders_Adi` varchar(25) COLLATE utf8mb4_turkish_ci NOT NULL,
  `DersSaatiBas` time NOT NULL,
  `DersSaatiBitis` time NOT NULL,
  `Gun` varchar(10) COLLATE utf8mb4_turkish_ci NOT NULL,
  `DersHocasiID` int(11) NOT NULL,
  `Sinif_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `donem`
--

CREATE TABLE `donem` (
  `Donem_ID` int(11) NOT NULL,
  `Donem_Adi` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `Kullanici_ID` int(11) NOT NULL,
  `Kullanici_Adı` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Sifre` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Yetki_ID` int(11) NOT NULL,
  `Unvan` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Adi` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Soyadi` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Program_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci ROW_FORMAT=COMPACT;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`Kullanici_ID`, `Kullanici_Adı`, `Sifre`, `Yetki_ID`, `Unvan`, `Adi`, `Soyadi`, `Program_ID`) VALUES
(2, 'hhh', '151', 0, 'as', 'asdsa', 'asdsad', 1),
(273, 'ahm', 'a13', 1, 'rektor', 'HAZEM', 'AL SHALLAF', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE `menu` (
  `Menu_Adi` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Menu_Linki` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Yetki_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `program`
--

CREATE TABLE `program` (
  `Program_ID` int(11) NOT NULL,
  `Program_Adi` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Bolum_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sinif`
--

CREATE TABLE `sinif` (
  `Sinif_ID` int(11) NOT NULL,
  `Sinif_Adi` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Sinif_Turu` varchar(10) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Sinif_Kapasitesi` int(11) NOT NULL,
  `Sinav_Kapasitesi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yetki`
--

CREATE TABLE `yetki` (
  `Yetki_ID` int(11) NOT NULL,
  `Yetki_Adı` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `birim`
--
ALTER TABLE `birim`
  ADD PRIMARY KEY (`Birim_ID`);

--
-- Tablo için indeksler `bolum`
--
ALTER TABLE `bolum`
  ADD PRIMARY KEY (`Bolum_ID`);

--
-- Tablo için indeksler `donem`
--
ALTER TABLE `donem`
  ADD PRIMARY KEY (`Donem_ID`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`Kullanici_ID`);

--
-- Tablo için indeksler `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`Program_ID`);

--
-- Tablo için indeksler `sinif`
--
ALTER TABLE `sinif`
  ADD PRIMARY KEY (`Sinif_ID`);

--
-- Tablo için indeksler `yetki`
--
ALTER TABLE `yetki`
  ADD PRIMARY KEY (`Yetki_ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `birim`
--
ALTER TABLE `birim`
  MODIFY `Birim_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `bolum`
--
ALTER TABLE `bolum`
  MODIFY `Bolum_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `donem`
--
ALTER TABLE `donem`
  MODIFY `Donem_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `Kullanici_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;
--
-- Tablo için AUTO_INCREMENT değeri `program`
--
ALTER TABLE `program`
  MODIFY `Program_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `sinif`
--
ALTER TABLE `sinif`
  MODIFY `Sinif_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `yetki`
--
ALTER TABLE `yetki`
  MODIFY `Yetki_ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

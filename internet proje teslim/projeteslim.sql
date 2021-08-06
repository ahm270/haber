-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 29 May 2019, 11:22:57
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
-- Veritabanı: `proje`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `birim`
--

CREATE TABLE `birim` (
  `Birim_ID` int(11) NOT NULL,
  `Birim_Adi` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `birim`
--

INSERT INTO `birim` (`Birim_ID`, `Birim_Adi`) VALUES
(1, 'meslek yuksekokulu'),
(2, 'iktisad'),
(3, 'dsa'),
(5, 'mühendislik'),
(6, 'eğitim');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bolum`
--

CREATE TABLE `bolum` (
  `Bolum_ID` int(11) NOT NULL,
  `Bolum_Adi` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Birim_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `bolum`
--

INSERT INTO `bolum` (`Bolum_ID`, `Bolum_Adi`, `Birim_ID`) VALUES
(1, 'bilgisayar teknolojileri', 1),
(2, 'işletme', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dersprogram`
--

CREATE TABLE `dersprogram` (
  `Ders_ID` int(11) NOT NULL,
  `Ders_Adi` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Donem_ID` int(11) NOT NULL,
  `Birim_ID` int(11) NOT NULL,
  `Bolum_ID` int(11) NOT NULL,
  `Program_ID` int(11) NOT NULL,
  `DersSaatiBas` time NOT NULL,
  `DersSaatiBitis` time NOT NULL,
  `Gun` varchar(10) COLLATE utf8mb4_turkish_ci NOT NULL,
  `DersHocasi` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Sinif_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `dersprogram`
--

INSERT INTO `dersprogram` (`Ders_ID`, `Ders_Adi`, `Donem_ID`, `Birim_ID`, `Bolum_ID`, `Program_ID`, `DersSaatiBas`, `DersSaatiBitis`, `Gun`, `DersHocasi`, `Sinif_ID`) VALUES
(1, 'internet programcılığı', 3, 1, 1, 3, '11:00:00', '13:00:00', 'pazar', 'okan alkan', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `donem`
--

CREATE TABLE `donem` (
  `Donem_ID` int(11) NOT NULL,
  `Donem_Adi` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `donem`
--

INSERT INTO `donem` (`Donem_ID`, `Donem_Adi`) VALUES
(1, 'GÜZ'),
(3, 'BAHAR');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `Kullanici_ID` int(11) NOT NULL,
  `Kullanici_Adı` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Sifre` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Yetki_ID` int(11) NOT NULL,
  `Adi` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Soyadi` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci ROW_FORMAT=COMPACT;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`Kullanici_ID`, `Kullanici_Adı`, `Sifre`, `Yetki_ID`, `Adi`, `Soyadi`) VALUES
(1, 'hhh', '151', 1, 'asdsa', 'asdsad'),
(2, 'ahm', 'a13', 2, 'HAZEM', 'AL SHALLAF'),
(5, 'a', '222', 3, 'daawds', 'wadwad');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `program`
--

CREATE TABLE `program` (
  `Program_ID` int(11) NOT NULL,
  `Program_Adi` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Birim_ID` int(11) NOT NULL,
  `Bolum_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `program`
--

INSERT INTO `program` (`Program_ID`, `Program_Adi`, `Birim_ID`, `Bolum_ID`) VALUES
(3, 'bilgisayar programcılığı', 1, 1);

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

--
-- Tablo döküm verisi `sinif`
--

INSERT INTO `sinif` (`Sinif_ID`, `Sinif_Adi`, `Sinif_Turu`, `Sinif_Kapasitesi`, `Sinav_Kapasitesi`) VALUES
(2, 'lab.1', 'lab', 45, 35);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yetki`
--

CREATE TABLE `yetki` (
  `Yetki_ID` int(11) NOT NULL,
  `Yetki_Adı` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `yetki`
--

INSERT INTO `yetki` (`Yetki_ID`, `Yetki_Adı`) VALUES
(1, 'sekreter'),
(2, 'bölüm başkanı'),
(3, 'hoca');

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
-- Tablo için indeksler `dersprogram`
--
ALTER TABLE `dersprogram`
  ADD PRIMARY KEY (`Ders_ID`);

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
  MODIFY `Birim_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `bolum`
--
ALTER TABLE `bolum`
  MODIFY `Bolum_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `dersprogram`
--
ALTER TABLE `dersprogram`
  MODIFY `Ders_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `donem`
--
ALTER TABLE `donem`
  MODIFY `Donem_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `Kullanici_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `program`
--
ALTER TABLE `program`
  MODIFY `Program_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `sinif`
--
ALTER TABLE `sinif`
  MODIFY `Sinif_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `yetki`
--
ALTER TABLE `yetki`
  MODIFY `Yetki_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

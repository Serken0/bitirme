-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 10 Oca 2022, 13:27:43
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `bitirme`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_ad`, `kategori_order`) VALUES
(11, 'Üniversite', 0),
(12, 'Depo', 0),
(13, 'Diğer', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_zaman` datetime NOT NULL DEFAULT current_timestamp(),
  `kullanici_tc` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_mail` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_gsm` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_password` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_adsoyad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_yetki` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_durum` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_zaman`, `kullanici_tc`, `kullanici_ad`, `kullanici_mail`, `kullanici_gsm`, `kullanici_password`, `kullanici_adsoyad`, `kullanici_yetki`, `kullanici_durum`) VALUES
(158, '2021-11-07 00:55:18', '12345678910', 'Serken', 'serken@gmail.com', '05555555555', 'e10adc3949ba59abbe56e057f20f883e', 'Serken Ali KARAKUŞ', '5', 1),
(160, '2022-01-02 22:41:29', '05050505050', 'oguz', 'oguz@gmail.com', '0123456789', 'e10adc3949ba59abbe56e057f20f883e', 'Oğuzhan ÖTLEŞ', '5', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun`
--

CREATE TABLE `urun` (
  `urun_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `urun_ad` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urun_fiyat` float(9,2) NOT NULL,
  `urun_stok` int(11) NOT NULL,
  `urun_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urun`
--

INSERT INTO `urun` (`urun_id`, `kategori_id`, `urun_ad`, `urun_fiyat`, `urun_stok`, `urun_durum`) VALUES
(22, 11, 'Lazer Yazıcı', 400.00, 2, '1'),
(23, 11, 'Dizüstü Bilgisayar', 3000.00, 7, '1'),
(24, 11, 'Görüntü Monitörü', 500.00, 20, '1'),
(25, 12, 'Sıra', 15.00, 250, '0'),
(26, 13, 'Eğitim Maketleri', 20.00, 30, '1'),
(27, 11, 'Işık Gösterici Set', 10.00, 10, '1'),
(28, 12, 'Klasik Tip Sandalye', 120.00, 30, '0'),
(29, 12, 'Dosya Dolapları', 20.00, 25, '0'),
(30, 12, 'Çalışma Koltuğu', 50.00, 20, '0'),
(31, 12, 'Bilgisayar Masası', 250.00, 10, '1'),
(32, 11, 'Tepegöz Slayt Cihazı', 1000.00, 3, '1'),
(33, 12, 'Üniversite Kütüphanesi Kitap', 2.00, 200, '0'),
(34, 12, 'Çalışma Masası', 100.00, 10, '0'),
(35, 11, 'Bilgisayar Kasası', 2000.00, 120, '1'),
(36, 11, 'Klima', 3000.00, 5, '1'),
(37, 11, 'Dalga ve Ses Fiziği Materyali', 5.00, 130, '1'),
(38, 11, 'Kesintisiz Güç Kaynağı', 180.00, 2, '1'),
(39, 11, 'Dosya Dolabı', 200.00, 20, '1'),
(40, 11, 'Modem', 450.00, 12, '1'),
(41, 12, 'Yazı Tahtası', 100.00, 15, '0'),
(42, 12, 'Misafir Koltuğu', 500.00, 4, '0'),
(43, 11, 'Oturaklı Sıra', 135.00, 45, '1'),
(44, 11, 'Sehpa', 65.00, 8, '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `urun`
--
ALTER TABLE `urun`
  ADD PRIMARY KEY (`urun_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- Tablo için AUTO_INCREMENT değeri `urun`
--
ALTER TABLE `urun`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2024 at 01:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkwu_menu`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `nama_pesanan` varchar(20) NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `nama_pemesan` varchar(20) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `kapan` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`nama_pesanan`, `jumlah_pesanan`, `nama_pemesan`, `total_harga`, `harga`, `kapan`) VALUES
('Pisang Goreng Coklat', 3, 'udin', 8000, 8000, '2028-01-24 10:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `gambar` char(15) NOT NULL,
  `judul` varchar(20) NOT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `tipe` enum('drink','food','snack') NOT NULL,
  `nama_gambar` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `gambar`, `judul`, `deskripsi`, `harga`, `tipe`, `nama_gambar`) VALUES
(43, '20240127105228', 'Happy Soda', 'Soda Gembira', 5000, 'drink', 'Happy_Soda.jpg'),
(46, '20240127105357', 'Mie Bakso', 'Bakso pakai mie', 10000, 'food', 'Mie_Bakso.jpg'),
(47, '20240127105421', 'Mie Kering', '', 10000, 'food', 'Mie_Kering.jpg'),
(48, '20240127105442', 'Mie Kuah', '', 10000, 'food', 'Mie_Kuah.jpg'),
(49, '20240127105502', 'Nasi Ayam Goreng Kam', '', 10000, 'food', 'Nasi_Ayam_Goreng_Kampung.jpg'),
(50, '20240127105529', 'Oreo Blend', 'Oreo Blender', 5000, 'drink', 'Oreo_Blend.jpg'),
(51, '20240127105551', 'Pisang Goreng Coklat', '', 8000, 'snack', 'Pisang_Goreng_Coklat_Keju.jpg'),
(52, '20240127105612', 'Pisang Goreng Origin', '', 8000, 'snack', 'Pisang_Goreng_Original.jpg'),
(53, '20240127105629', 'Roti Panggang Kornet', '', 8000, 'snack', 'Roti_Panggang_Kornet_Telur_Dadar.jpg'),
(54, '20240127105653', 'Soto Banjar', '', 10000, 'food', 'Soto_Banjar_36.jpg'),
(55, '20240127105710', 'Ubi Goreng', '', 8000, 'snack', 'Ubi_Goreng.jpg'),
(56, '20240127105724', 'Vietname Drip Coffee', '', 5000, 'drink', 'Vietname_Drip_Coffee.jpg'),
(57, '20240127105747', 'Watermelon Juice', '', 5000, 'drink', 'Watermelon_Juice.jpg'),
(58, '20240128035052', 'Kopi Susu', '', 5000, 'drink', 'Kopi_Susu_36.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

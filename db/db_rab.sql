-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2018 at 02:31 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rab`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`) VALUES
(1, 'Admin', 'admin@email.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `desain`
--

CREATE TABLE `desain` (
  `id` int(11) NOT NULL,
  `namadesain` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desain`
--

INSERT INTO `desain` (`id`, `namadesain`, `deskripsi`, `gambar`) VALUES
(1, 'Rumah Tinggal A', 'Rumah minimalis sederhana dengan tipe-36 dengan 2 kamar tidur yang akan dibangun memiliki ukuran panjang 6 meter, lebar 6 meter dan tinggi umumnya sekitar 4 meter. Rincian biaya dan material Membangun Rumah Sederhana Batu bata, Semen, Pasir, Kerikil, Besi beton, Papan, Broti, Seng, Paku, Kusen, pintu dan jendela, Kunci, engsel, dan lainnya, Triplek plafon, Closet, Pintu kamar mandi, Cat minyak dan cat tembok, Instalasi pipa air, Instalasi listrik, Upah kerja tukang.', 'rumah1.jpg'),
(2, 'Rumah Tinggal B', 'Rumah minimalis sederhana dengan tipe-36 dengan 2 kamar tidur yang akan dibangun memiliki ukuran panjang 6 meter, lebar 6 meter dan tinggi umumnya sekitar 4 meter. Rincian biaya dan material Membangun Rumah Sederhana Batu bata, Semen, Pasir, Kerikil, Besi beton, Papan, Broti, Seng, Paku, Kusen, pintu dan jendela, Kunci, engsel, dan lainnya, Triplek plafon, Closet, Pintu kamar mandi, Cat minyak dan cat tembok, Instalasi pipa air, Instalasi listrik, Upah kerja tukang.', 'rumah2.jpg'),
(3, 'Rumah Tinggal C', 'fasdasgdsfhasdfasddfasdf asdfasdfasdfasd', '1532044511-animals_cat_eyes_cats_greyscale_1366x768_104630.jpg');

--
-- Triggers `desain`
--
DELIMITER $$
CREATE TRIGGER `deletedesain` AFTER DELETE ON `desain` FOR EACH ROW begin
		delete from uraian_pekerjaan where id_desain=old.id;
	end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pekerjaan`
--

CREATE TABLE `jenis_pekerjaan` (
  `id` int(11) NOT NULL,
  `jenispekerjaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_pekerjaan`
--

INSERT INTO `jenis_pekerjaan` (`id`, `jenispekerjaan`) VALUES
(1, 'PEKERJAAN PERSIAPAN'),
(2, 'PEKERJAAN TANAH DAN PASIR.');

--
-- Triggers `jenis_pekerjaan`
--
DELIMITER $$
CREATE TRIGGER `deletejenis` AFTER DELETE ON `jenis_pekerjaan` FOR EACH ROW begin
		delete from uraian_pekerjaan where id_jenis=old.id;
	end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `uraian_pekerjaan`
--

CREATE TABLE `uraian_pekerjaan` (
  `id` int(11) NOT NULL,
  `id_desain` int(11) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `volume` float(10,2) NOT NULL,
  `satuan` varchar(8) NOT NULL,
  `hargasatuan` double NOT NULL,
  `id_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uraian_pekerjaan`
--

INSERT INTO `uraian_pekerjaan` (`id`, `id_desain`, `pekerjaan`, `volume`, `satuan`, `hargasatuan`, `id_jenis`) VALUES
(1, 1, 'Pek. Pengukuran & Pas. Bouwplank', 41.00, 'm1', 710754, 1),
(2, 1, 'Pek. Pembersihan Lokasi', 84.00, 'm2', 18810, 1),
(3, 1, 'Pek. Galian Tanah', 36.00, 'm3', 83325, 1),
(4, 1, 'Pek. Pembersihan Lokasi', 42.00, 'm2', 71075, 2),
(5, 2, 'Pek. Pembersihan Lokasi', 41.00, 'm2', 71075, 2),
(6, 1, 'Pek. Galian', 12.00, 'm3', 20000, 2),
(10, 3, 'Pek. Galian', 24.00, 'm3', 23000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desain`
--
ALTER TABLE `desain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_pekerjaan`
--
ALTER TABLE `jenis_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uraian_pekerjaan`
--
ALTER TABLE `uraian_pekerjaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `fk_idproyek` (`id_desain`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `desain`
--
ALTER TABLE `desain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis_pekerjaan`
--
ALTER TABLE `jenis_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uraian_pekerjaan`
--
ALTER TABLE `uraian_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `uraian_pekerjaan`
--
ALTER TABLE `uraian_pekerjaan`
  ADD CONSTRAINT `uraian_pekerjaan_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_pekerjaan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

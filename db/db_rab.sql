-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2018 at 01:27 PM
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
(1, 'Rumah Tinggal A', 'Rumah minimalis sederhana dengan tipe-36 dengan 2 kamar tidur yang akan dibangun memiliki ukuran panjang 6 meter, lebar 6 meter dan tinggi umumnya sekitar 4 meter. Rincian biaya dan material Membangun Rumah Sederhana Batu bata, Semen, Pasir, Kerikil, Besi beton, Papan, Broti, Seng, Paku, Kusen, pintu dan jendela, Kunci, engsel, dan lainnya, Triplek plafon, Closet, Pintu kamar mandi, Cat minyak dan cat tembok, Instalasi pipa air, Instalasi listrik, Upah kerja tukang.', '1532428702-beranda_selected.png'),
(2, 'Rumah Tinggal B', 'Rumah minimalis sederhana dengan tipe-36 dengan 2 kamar tidur yang akan dibangun memiliki ukuran panjang 6 meter, lebar 6 meter dan tinggi umumnya sekitar 4 meter. Rincian biaya dan material Membangun Rumah Sederhana Batu bata, Semen, Pasir, Kerikil, Besi beton, Papan, Broti, Seng, Paku, Kusen, pintu dan jendela, Kunci, engsel, dan lainnya, Triplek plafon, Closet, Pintu kamar mandi, Cat minyak dan cat tembok, Instalasi pipa air, Instalasi listrik, Upah kerja tukang.', 'rumah2.jpg'),
(3, 'Rumah Tinggal C', 'fasdasgdsfhasdfasddfasdf asdfasdfasdfasd\r\nasdfadsfa faksdfas\r\nasdfsdfasdf', '1532044511-animals_cat_eyes_cats_greyscale_1366x768_104630.jpg');

--
-- Triggers `desain`
--
DELIMITER $$
CREATE TRIGGER `deletedesain` AFTER DELETE ON `desain` FOR EACH ROW begin
		delete from uraian_pekerjaan where id_desain=old.id;
        delete from gambar where id_desain=old.id;
	end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id` int(11) NOT NULL,
  `id_desain` int(11) NOT NULL,
  `namaruangan` varchar(100) NOT NULL,
  `gambar` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id`, `id_desain`, `namaruangan`, `gambar`, `deskripsi`) VALUES
(1, 3, 'ruangan wc', 'Saitamas.png', 'Gambar ini adalah saitama'),
(2, 3, 'ruangan kamar', 'R.png', 'Gambar gambaran'),
(3, 3, 'ruang tamu', 'R.png', 'Gambar gambaran'),
(4, 3, 'ruang makan', 'R.png', 'Gambar gambaran'),
(5, 3, 'ruang nonton', 'Saitamas.png', 'Gambar gambaran');

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
-- Table structure for table `sub_pekerjaan`
--

CREATE TABLE `sub_pekerjaan` (
  `id` int(11) NOT NULL,
  `id_uraian` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `satuan` varchar(3) NOT NULL,
  `volume` float(10,3) NOT NULL,
  `biaya` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_pekerjaan`
--

INSERT INTO `sub_pekerjaan` (`id`, `id_uraian`, `keterangan`, `satuan`, `volume`, `biaya`) VALUES
(1, 10, 'Kayu balok 5/7', '0', 0.012, 20064.00),
(2, 11, 'Pekerja', '0', 0.100, 9600.00),
(3, 10, 'Kayu papan 3/20', '0', 0.007, 20482.00),
(4, 1, 'Kayu balok 5/7', 'M3', 0.012, 1672000.00),
(5, 1, 'Paku 2\"-3\"', 'Kg', 0.020, 20900.00),
(6, 1, 'Kayu papan 3/20', 'M3', 0.007, 2926000.00),
(7, 1, 'Pekerja', 'Oh', 0.100, 96000.00),
(8, 1, 'Tukang kayu', 'Oh', 0.100, 120000.00),
(9, 1, 'Kepala tukang kayu', 'Oh', 0.010, 130000.00),
(10, 1, 'Mandor', 'Oh', 0.005, 150000.00),
(11, 2, 'Pekerja', 'Oh', 0.100, 96000.00),
(12, 2, 'Mandor', 'Oh', 0.050, 150000.00);

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
  `id_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uraian_pekerjaan`
--

INSERT INTO `uraian_pekerjaan` (`id`, `id_desain`, `pekerjaan`, `volume`, `satuan`, `id_jenis`) VALUES
(1, 1, 'Pek. Pengukuran & Pas. Bouwplank', 41.00, 'm1', 1),
(2, 1, 'Pek. Pembersihan Lokasi', 84.00, 'm2', 1),
(3, 1, 'Pek. Galian Tanah', 36.00, 'm3', 1),
(4, 1, 'Pek. Pembersihan Lokasi', 42.00, 'm2', 2),
(5, 2, 'Pek. Pembersihan Lokasi', 41.00, 'm2', 2),
(6, 1, 'Pek. Galian', 12.00, 'm3', 2),
(10, 3, 'Pek. Galian', 24.00, 'm3', 1),
(11, 3, 'Pek. Cor', 12.00, 'm3', 1),
(12, 2, 'Pek. Cor', 24.00, 'm', 1);

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
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_iddesain` (`id_desain`);

--
-- Indexes for table `jenis_pekerjaan`
--
ALTER TABLE `jenis_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_pekerjaan`
--
ALTER TABLE `sub_pekerjaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_iduraian` (`id_uraian`);

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
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenis_pekerjaan`
--
ALTER TABLE `jenis_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_pekerjaan`
--
ALTER TABLE `sub_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `uraian_pekerjaan`
--
ALTER TABLE `uraian_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gambar`
--
ALTER TABLE `gambar`
  ADD CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`id_desain`) REFERENCES `desain` (`id`);

--
-- Constraints for table `sub_pekerjaan`
--
ALTER TABLE `sub_pekerjaan`
  ADD CONSTRAINT `sub_pekerjaan_ibfk_1` FOREIGN KEY (`id_uraian`) REFERENCES `uraian_pekerjaan` (`id`);

--
-- Constraints for table `uraian_pekerjaan`
--
ALTER TABLE `uraian_pekerjaan`
  ADD CONSTRAINT `uraian_pekerjaan_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_pekerjaan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

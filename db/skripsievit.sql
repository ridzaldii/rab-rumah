-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2018 at 02:45 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsievit`
--

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id`, `gambar`, `tipe`, `deskripsi`) VALUES
(1, 'rumah1.jpg', 'Type 36 - 2 Lantai', 'Total Luas bangunan : 481.71 m2. pada Lantai 1 memiliki 1 Kamar tidur utama, ruang keluarga,ruang makan, ruang tamu, dapur, wc, garasi, kolam berenang dan teras. dan pada Lantai 2 memiliki 3 ruang kamar tidur dengan masing-masing wc di dalam kamar, kamar pembantu, gudang, tempat jemuran, ruang setrika. Rencana anggaran biaya untuk design ini dihitung dengan berdasarkan urutan pekerjaan yang dihitung dari satuan meter dan akan di kalikan dengan volume rumah.kemudian akan didapatkan total rencana anggaran biaya dari design tersebut.'),
(2, 'rumah2.jpg', 'Type 36 - Ukuran (6m x 6m)', 'Rumah minimalis sederhana dengan tipe-36 dengan 2 kamar tidur yang akan dibangun memiliki ukuran panjang 6 meter, lebar 6 meter dan tinggi umumnya sekitar 4 meter. Rincian biaya dan material Membangun Rumah Sederhana Batu bata, Semen, Pasir, Kerikil, Besi beton, Papan, Broti, Seng, Paku, Kusen, pintu dan jendela, Kunci, engsel, dan lainnya, Triplek plafon, Closet, Pintu kamar mandi, Cat minyak dan cat tembok, Instalasi pipa air, Instalasi listrik, Upah kerja tukang.');

-- --------------------------------------------------------

--
-- Table structure for table `jenis pekerjaan`
--

CREATE TABLE `jenis pekerjaan` (
  `id` int(11) NOT NULL,
  `Jenis_Pekerjaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis pekerjaan`
--

INSERT INTO `jenis pekerjaan` (`id`, `Jenis_Pekerjaan`) VALUES
(1, 'PEKERJAAN PERSIAPAN'),
(2, 'PEKERJAAN TANAH DAN PASIR'),
(3, 'PEKERJAAN PONDASI');

-- --------------------------------------------------------

--
-- Table structure for table `rab`
--

CREATE TABLE `rab` (
  `id` int(11) NOT NULL,
  `NamaRumah` varchar(20) NOT NULL,
  `UraianPekerjaan` varchar(50) NOT NULL,
  `Volume` float(10,2) NOT NULL,
  `Satuan` varchar(8) NOT NULL,
  `HargaSatuan` double(30,5) NOT NULL,
  `JumlahHarga` double NOT NULL,
  `id_gambar` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rab`
--

INSERT INTO `rab` (`id`, `NamaRumah`, `UraianPekerjaan`, `Volume`, `Satuan`, `HargaSatuan`, `JumlahHarga`, `id_gambar`, `id_jenis`) VALUES
(1, 'Jln Abdul Kadir', 'Pek. Pengukuran & Pas. Bouwplank', 41.00, 'm1', 71.07540, 2.9140914, 1, 1),
(2, 'awda', 'Pek. Pembersihan Lokasi', 84.00, 'm2', 18.81000, 1.58004, 1, 1),
(3, 'Jln Ahmad', 'Pek. Galian Tanah', 36.00, 'm3', 83.32500, 2.9997, 1, 1),
(4, 'Jalan jalan', 'Pek. Pembersihan Lokasi', 42.00, 'm2', 71.07500, 2.9140914, 1, 2),
(5, 'Nakke', 'Pek. Pembersihan Lokasi', 41.00, 'm2', 71.07500, 2.9140914, 2, 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_rab`
-- (See below for the actual view)
--
CREATE TABLE `view_rab` (
`id_jenis` int(11)
,`Jenis_Pekerjaan` varchar(50)
,`id_gambar` int(11)
,`gambar` text
,`tipe` varchar(50)
,`deskripsi` text
,`NamaRumah` varchar(20)
,`UraianPekerjaan` varchar(50)
,`Volume` float(10,2)
,`Satuan` varchar(8)
,`HargaSatuan` double(30,5)
,`JumlahHarga` double
);

-- --------------------------------------------------------

--
-- Structure for view `view_rab`
--
DROP TABLE IF EXISTS `view_rab`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_rab`  AS  select `rab`.`id_jenis` AS `id_jenis`,`jenis pekerjaan`.`Jenis_Pekerjaan` AS `Jenis_Pekerjaan`,`gambar`.`id` AS `id_gambar`,`gambar`.`gambar` AS `gambar`,`gambar`.`tipe` AS `tipe`,`gambar`.`deskripsi` AS `deskripsi`,`rab`.`NamaRumah` AS `NamaRumah`,`rab`.`UraianPekerjaan` AS `UraianPekerjaan`,`rab`.`Volume` AS `Volume`,`rab`.`Satuan` AS `Satuan`,`rab`.`HargaSatuan` AS `HargaSatuan`,`rab`.`JumlahHarga` AS `JumlahHarga` from ((`gambar` join `rab`) join `jenis pekerjaan`) where ((`rab`.`id_gambar` = `gambar`.`id`) and (`rab`.`id_jenis` = `jenis pekerjaan`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis pekerjaan`
--
ALTER TABLE `jenis pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rab`
--
ALTER TABLE `rab`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_gambar` (`id_gambar`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis pekerjaan`
--
ALTER TABLE `jenis pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rab`
--
ALTER TABLE `rab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `rab`
--
ALTER TABLE `rab`
  ADD CONSTRAINT `rab_ibfk_1` FOREIGN KEY (`id_gambar`) REFERENCES `gambar` (`id`),
  ADD CONSTRAINT `rab_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis pekerjaan` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

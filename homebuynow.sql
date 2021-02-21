-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 11, 2021 at 08:17 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homebuynow`
--

-- --------------------------------------------------------

--
-- Table structure for table `harga_primary`
--

CREATE TABLE `harga_primary` (
  `id_harga` int(11) NOT NULL,
  `min_harga` varchar(20) NOT NULL,
  `max_harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga_primary`
--

INSERT INTO `harga_primary` (`id_harga`, `min_harga`, `max_harga`) VALUES
(1, '0', '100000000'),
(2, '101000000', '500000000'),
(3, '501000000', '1000000000'),
(4, '1001000000', '3000000000'),
(5, '3001000000', '5000000000'),
(6, '5000000001', '100000000000');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(2) NOT NULL,
  `jenis_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `jenis_kategori`) VALUES
(1, 'primary'),
(2, 'secondary'),
(3, 'renovasi'),
(4, 'konstruksi'),
(5, 'ruko'),
(6, 'kavling'),
(7, 'apartment');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(2) NOT NULL,
  `nama_lokasi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama_lokasi`) VALUES
(1, 'Cibubur'),
(2, 'Depok'),
(3, 'Sentul'),
(4, 'Bogor'),
(5, 'Jakarta'),
(6, 'Bekasi'),
(7, 'Tangerang');

-- --------------------------------------------------------

--
-- Table structure for table `luas_tanah_dan_bangunan_primary`
--

CREATE TABLE `luas_tanah_dan_bangunan_primary` (
  `id_luas` int(5) NOT NULL,
  `min_luas` int(5) NOT NULL,
  `max_luas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `luas_tanah_dan_bangunan_primary`
--

INSERT INTO `luas_tanah_dan_bangunan_primary` (`id_luas`, `min_luas`, `max_luas`) VALUES
(1, 0, 50),
(2, 51, 80),
(3, 81, 100),
(4, 101, 150),
(5, 151, 200),
(6, 201, 300),
(7, 301, 500),
(8, 501, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `primary_home`
--

CREATE TABLE `primary_home` (
  `id_primary` int(11) NOT NULL,
  `nama_object` varchar(30) NOT NULL,
  `id_lokasi` int(2) NOT NULL,
  `jumlah_lantai` int(11) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `luas_tanah` int(11) NOT NULL,
  `luas_bangunan` int(11) NOT NULL,
  `jumlah_kamar_tidur` int(11) NOT NULL,
  `usia_bangunan` int(2) NOT NULL,
  `id_harga` int(11) NOT NULL,
  `id_luas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `primary_home`
--

INSERT INTO `primary_home` (`id_primary`, `nama_object`, `id_lokasi`, `jumlah_lantai`, `harga`, `luas_tanah`, `luas_bangunan`, `jumlah_kamar_tidur`, `usia_bangunan`, `id_harga`, `id_luas`) VALUES
(1, 'Perum Graha Cibinong', 4, 1, '125000000', 600, 500, 5, 1, 2, 8),
(2, 'Bekasi Home', 6, 2, '1575000000', 700, 550, 5, 1, 4, 8),
(3, 'Sentul City Home\'s', 3, 2, '5200550000', 600, 500, 4, 1, 6, 8),
(4, 'Depok Housing', 2, 2, '3125500000', 512, 475, 4, 1, 5, 8),
(5, 'Perum Unknown', 5, 2, '250000000', 600, 450, 3, 1, 2, 8),
(6, 'Tangerang Home\'s', 7, 3, '435500000', 581, 522, 5, 3, 2, 8),
(8, 'Cibubur House', 1, 2, '3124000000', 750, 690, 4, 1, 5, 8),
(9, 'Tangerang Citrahouse', 7, 2, '2730540000', 778, 690, 5, 1, 4, 8),
(10, 'Bekasi Housing', 6, 1, '100000000', 500, 450, 1, 1, 1, 7),
(11, 'Cibubur House 2', 1, 2, '980000000', 622, 590, 3, 1, 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `primary_image`
--

CREATE TABLE `primary_image` (
  `no` int(11) NOT NULL,
  `id_primary` int(11) NOT NULL,
  `item` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `primary_image`
--

INSERT INTO `primary_image` (`no`, `id_primary`, `item`) VALUES
(1, 1, '1.jpg'),
(2, 2, '1.jpg'),
(3, 3, '1.jpg'),
(4, 4, '1.jpg'),
(5, 5, '1.jpg'),
(6, 6, '1.jpg'),
(8, 8, '1.jpg'),
(9, 9, '1.jpeg'),
(10, 10, '1.jpeg'),
(11, 11, '1.jpg'),
(35, 1, '2.jpg'),
(36, 1, '3.jpg'),
(37, 1, '4.jpg'),
(39, 8, '2.jpg'),
(43, 8, '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(4) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `no_handphone` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'buyer',
  `id_kategori` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `no_handphone`, `password`, `status`, `id_kategori`) VALUES
(2, 'Deny Lukman', 'cakden@gmail.com', '085729331669', 'deny', 'buyer', 1),
(6, 'cika', 'cika@gmail.com', '012513', 'cika', 'seller', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `harga_primary`
--
ALTER TABLE `harga_primary`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `luas_tanah_dan_bangunan_primary`
--
ALTER TABLE `luas_tanah_dan_bangunan_primary`
  ADD PRIMARY KEY (`id_luas`);

--
-- Indexes for table `primary_home`
--
ALTER TABLE `primary_home`
  ADD PRIMARY KEY (`id_primary`),
  ADD KEY `id_harga` (`id_harga`),
  ADD KEY `id_luas` (`id_luas`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indexes for table `primary_image`
--
ALTER TABLE `primary_image`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_primary` (`id_primary`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `harga_primary`
--
ALTER TABLE `harga_primary`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `luas_tanah_dan_bangunan_primary`
--
ALTER TABLE `luas_tanah_dan_bangunan_primary`
  MODIFY `id_luas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `primary_home`
--
ALTER TABLE `primary_home`
  MODIFY `id_primary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `primary_image`
--
ALTER TABLE `primary_image`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `primary_home`
--
ALTER TABLE `primary_home`
  ADD CONSTRAINT `primary_home_ibfk_3` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`),
  ADD CONSTRAINT `primary_home_ibfk_4` FOREIGN KEY (`id_luas`) REFERENCES `luas_tanah_dan_bangunan_primary` (`id_luas`),
  ADD CONSTRAINT `primary_home_ibfk_5` FOREIGN KEY (`id_harga`) REFERENCES `harga_primary` (`id_harga`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

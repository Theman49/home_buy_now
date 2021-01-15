-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 15, 2021 at 10:48 
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE IF NOT EXISTS `harga_primary` (
  `id_harga` int(11) NOT NULL,
  `min_harga` varchar(20) NOT NULL,
  `max_harga` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga_primary`
--

INSERT INTO `harga_primary` (`id_harga`, `min_harga`, `max_harga`) VALUES
(1, '0', '100000000'),
(2, '101000000', '500000000'),
(3, '501000000', '1000000000'),
(4, '1001000000', '3000000000'),
(5, '3001000000', '5000000000');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
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
-- Table structure for table `luas_tanah_dan_bangunan_primary`
--

CREATE TABLE IF NOT EXISTS `luas_tanah_dan_bangunan_primary` (
  `id_luas` int(5) NOT NULL,
  `min_luas` int(5) NOT NULL,
  `max_luas` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

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
(7, 301, 500);

-- --------------------------------------------------------

--
-- Table structure for table `primary_home`
--

CREATE TABLE IF NOT EXISTS `primary_home` (
  `id_primary` int(11) NOT NULL,
  `nama_object` varchar(30) NOT NULL,
  `lokasi` text NOT NULL,
  `jumlah_lantai` int(11) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `luas_tanah` int(11) NOT NULL,
  `luas_bangunan` int(11) NOT NULL,
  `jumlah_kamar_tidur` int(11) NOT NULL,
  `usia_bangunan` int(11) NOT NULL,
  `id_harga` int(11) NOT NULL,
  `id_luas` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `primary_home`
--

INSERT INTO `primary_home` (`id_primary`, `nama_object`, `lokasi`, `jumlah_lantai`, `harga`, `luas_tanah`, `luas_bangunan`, `jumlah_kamar_tidur`, `usia_bangunan`, `id_harga`, `id_luas`) VALUES
(1, 'Perum Graha Cibinong', 'Cibinong', 3, '125000000', 600, 500, 5, 1, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(4) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `no_handphone` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'buyer',
  `id_kategori` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

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
  ADD KEY `id_luas` (`id_luas`);

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
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `luas_tanah_dan_bangunan_primary`
--
ALTER TABLE `luas_tanah_dan_bangunan_primary`
  MODIFY `id_luas` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `primary_home`
--
ALTER TABLE `primary_home`
  MODIFY `id_primary` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `primary_home`
--
ALTER TABLE `primary_home`
  ADD CONSTRAINT `primary_home_ibfk_1` FOREIGN KEY (`id_luas`) REFERENCES `luas_tanah_dan_bangunan_primary` (`id_luas`),
  ADD CONSTRAINT `primary_home_ibfk_2` FOREIGN KEY (`id_harga`) REFERENCES `harga_primary` (`id_harga`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 12, 2021 at 05:40 AM
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
-- Table structure for table `primary_home`
--

CREATE TABLE `primary_home` (
  `id_primary` int(11) NOT NULL,
  `nama_object` varchar(30) NOT NULL,
  `lokasi` text NOT NULL,
  `jumlah_lantai` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `luas_tanah` int(11) NOT NULL,
  `luas_bangunan` int(11) NOT NULL,
  `jumlah_kamar_tidur` int(11) NOT NULL,
  `usia_bangunan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `primary_home`
--

INSERT INTO `primary_home` (`id_primary`, `nama_object`, `lokasi`, `jumlah_lantai`, `harga`, `luas_tanah`, `luas_bangunan`, `jumlah_kamar_tidur`, `usia_bangunan`) VALUES
(1, 'Perumahan Graha', 'Golf Cibinong', 2, 1000000000, 500, 400, 4, 1),
(2, 'Cibinong Laras Asri', 'Cibinong', 2, 90000000, 600, 500, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(4) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `no_handphone` varchar(15) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `password` varchar(60) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'buyer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `no_handphone`, `kategori`, `password`, `status`) VALUES
(1, 'Deny Lukman', 'cakden@gmail.com', '081236751879', 'primary', 'deny', 'buyer'),
(2, 'cika', 'cika@gmail.com', '012389', 'secondary', 'jj', 'seller'),
(3, 'a', 'a@gm.com', '0172472', 'ruko', 'a', 'buyer'),
(4, 'b', 'b@gm.com', '0132515', 'kavling', 'b', 'seller');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `primary_home`
--
ALTER TABLE `primary_home`
  ADD PRIMARY KEY (`id_primary`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `primary_home`
--
ALTER TABLE `primary_home`
  MODIFY `id_primary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2023 at 04:27 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi-lelang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbarang`
--

CREATE TABLE `tbarang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `harga_awal` int(20) NOT NULL,
  `deskripsi_barang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbarang`
--

INSERT INTO `tbarang` (`id_barang`, `nama_barang`, `tanggal`, `harga_awal`, `deskripsi_barang`) VALUES
(1, 'Kulkas', '2023-02-22', 1500000, 'Kulkas 5 pintu second no minus'),
(2, 'TV LED', '2023-03-07', 2500000, 'TV 72inc');

-- --------------------------------------------------------

--
-- Table structure for table `thistori_lelang`
--

CREATE TABLE `thistori_lelang` (
  `id_histori` int(11) NOT NULL,
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `penawaran_harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thistori_lelang`
--

INSERT INTO `thistori_lelang` (`id_histori`, `id_lelang`, `id_barang`, `id_user`, `penawaran_harga`) VALUES
(1, 0, 0, 0, 2000000),
(3, 8, 1, 1, 3000000),
(4, 8, 1, 1, 2500000),
(5, 8, 1, 1, 3000000);

-- --------------------------------------------------------

--
-- Table structure for table `tkonsumen`
--

CREATE TABLE `tkonsumen` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tkonsumen`
--

INSERT INTO `tkonsumen` (`id_user`, `nama_lengkap`, `username`, `password`, `telp`, `email`) VALUES
(1, 'Zainandhi Nur Fathurrohman', 'Zainandhi', '111', '08817801129', 'zainandhif@gmail.com'),
(2, 'Dimas Adriansyah', 'Dimas', '222', '089637411191', 'Dimas001@gmail.com'),
(3, 'Alfarobi Islami', 'Alfarobi', '333', '089123456789', 'Alfarobi333@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tlelang`
--

CREATE TABLE `tlelang` (
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_lelang` date NOT NULL,
  `harga_aktif` int(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `status` enum('dibuka','ditutup') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tlelang`
--

INSERT INTO `tlelang` (`id_lelang`, `id_barang`, `tgl_lelang`, `harga_aktif`, `id_user`, `id_petugas`, `status`) VALUES
(1, 2, '2023-03-28', 3000000, 2, 2, 'ditutup'),
(8, 1, '2023-03-30', 3000000, 1, 2, 'dibuka');

-- --------------------------------------------------------

--
-- Table structure for table `tlevel`
--

CREATE TABLE `tlevel` (
  `id_level` int(11) NOT NULL,
  `level` enum('administrator','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tlevel`
--

INSERT INTO `tlevel` (`id_level`, `level`) VALUES
(1, 'administrator'),
(2, 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tpetugas`
--

CREATE TABLE `tpetugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tpetugas`
--

INSERT INTO `tpetugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `id_level`) VALUES
(1, 'Dimas Adriansyah', 'dimas', '111', 1),
(2, 'Zainandhi Nur Fathurrohman', 'Zainandhi', '222', 2),
(20, 'alfarobi', '7', '8', 9),
(21, 'albi', '7', '8', 9),
(22, 'test', 'test', 'test', 1),
(23, 'test', 'test', 'test', 1),
(24, 'test', 'test', 'test', 1),
(27, 'Ridho Sulistyo', 'Ridho', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbarang`
--
ALTER TABLE `tbarang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `thistori_lelang`
--
ALTER TABLE `thistori_lelang`
  ADD PRIMARY KEY (`id_histori`);

--
-- Indexes for table `tkonsumen`
--
ALTER TABLE `tkonsumen`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tlelang`
--
ALTER TABLE `tlelang`
  ADD PRIMARY KEY (`id_lelang`);

--
-- Indexes for table `tlevel`
--
ALTER TABLE `tlevel`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tpetugas`
--
ALTER TABLE `tpetugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbarang`
--
ALTER TABLE `tbarang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `thistori_lelang`
--
ALTER TABLE `thistori_lelang`
  MODIFY `id_histori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tkonsumen`
--
ALTER TABLE `tkonsumen`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tlelang`
--
ALTER TABLE `tlelang`
  MODIFY `id_lelang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tlevel`
--
ALTER TABLE `tlevel`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tpetugas`
--
ALTER TABLE `tpetugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

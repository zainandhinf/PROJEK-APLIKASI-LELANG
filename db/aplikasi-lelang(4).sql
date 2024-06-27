-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2023 at 06:16 PM
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
  `deskripsi_barang` text NOT NULL,
  `gambar_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbarang`
--

INSERT INTO `tbarang` (`id_barang`, `nama_barang`, `tanggal`, `harga_awal`, `deskripsi_barang`, `gambar_barang`) VALUES
(1, 'Kulkas', '2023-02-22', 1500000, 'Kulkas 5 pintu second no minus', ''),
(2, 'TV LED', '2023-03-07', 2500000, 'TV 72inc', ''),
(3, 'Smartphone', '2023-04-12', 1200000, 'Smartphone second', '643655e00f15d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tdetailtransaksi`
--

CREATE TABLE `tdetailtransaksi` (
  `id_detailtransaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_lelang` int(11) NOT NULL,
  `harga_awal` int(11) NOT NULL,
  `harga_penawaran` int(11) NOT NULL,
  `tanggal_penawaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `thistori_lelang`
--

CREATE TABLE `thistori_lelang` (
  `id_histori` int(11) NOT NULL,
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_penawaran` date DEFAULT curdate(),
  `penawaran_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thistori_lelang`
--

INSERT INTO `thistori_lelang` (`id_histori`, `id_lelang`, `id_barang`, `id_user`, `tanggal_penawaran`, `penawaran_harga`) VALUES
(6, 1, 2, 1, '2023-04-04', 3500000),
(9, 8, 1, 1, '2023-04-04', 3500000),
(20, 8, 1, 1, '2023-04-05', 4000000),
(21, 10, 3, 1, '2023-04-26', 1500000);

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
  `email` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tkonsumen`
--

INSERT INTO `tkonsumen` (`id_user`, `nama_lengkap`, `username`, `password`, `telp`, `email`, `gambar`) VALUES
(1, 'Zainandhi Nur Fathurrohman', 'Zainandhi', '111', '08817801129', 'zainandhif@gmail.com', '64352ca6d93a7.jpg'),
(2, 'Dimas Adriansyah', 'Dimas', '222', '089637411191', 'Dimas001@gmail.com', 'profile.png'),
(3, 'Alfarobi Islami', 'Alfarobi', '333', '089123456789', 'Alfarobi333@gmail.com', 'profile.png');

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
(1, 2, '2023-03-28', 3500000, 2, 2, 'dibuka'),
(8, 1, '2023-03-30', 4000000, 1, 2, 'dibuka'),
(10, 3, '2023-04-12', 1500000, 1, 1, 'dibuka');

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
  `id_level` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tpetugas`
--

INSERT INTO `tpetugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `id_level`, `gambar`) VALUES
(1, 'Dimas Adriansyah', 'dimas', '111', 1, '643651ebe40bb.jpg'),
(2, 'Zainandhi Nur Fathurrohman', 'Zainandhi', '222', 2, 'profile.png'),
(22, 'test', 'test', 'test', 1, 'profile.png'),
(23, 'test', 'test', 'test', 1, 'profile.png'),
(24, 'test', 'test', 'test', 1, 'profile.png'),
(27, 'Ridho Sulistyo', 'Ridho', '123', 2, 'profile.png'),
(30, 'Rasyid Nur', 'Rasyid', '888', 2, '64352f4bb78ec.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ttransaksi`
--

CREATE TABLE `ttransaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `opsi_pengiriman` enum('regular','express','instant') NOT NULL,
  `metode_pembayaran` enum('Kartu-Kredit','Transfer-Bank','E-Wallet') NOT NULL,
  `subtotal` int(11) NOT NULL,
  `biaya_pengiriman` int(11) NOT NULL,
  `pajak` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ttransaksi`
--

INSERT INTO `ttransaksi` (`id_transaksi`, `id_user`, `nama_lengkap`, `alamat_pengiriman`, `opsi_pengiriman`, `metode_pembayaran`, `subtotal`, `biaya_pengiriman`, `pajak`, `total`) VALUES
(1, 0, 'Zainandhi Nur', 'hjdhshdsjh shsjhdhs hsdjshd', 'express', 'E-Wallet', 0, 0, 0, 0);

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
-- Indexes for table `ttransaksi`
--
ALTER TABLE `ttransaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbarang`
--
ALTER TABLE `tbarang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `thistori_lelang`
--
ALTER TABLE `thistori_lelang`
  MODIFY `id_histori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tkonsumen`
--
ALTER TABLE `tkonsumen`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tlelang`
--
ALTER TABLE `tlelang`
  MODIFY `id_lelang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tlevel`
--
ALTER TABLE `tlevel`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tpetugas`
--
ALTER TABLE `tpetugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `ttransaksi`
--
ALTER TABLE `ttransaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

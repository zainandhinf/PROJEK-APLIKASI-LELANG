-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 01:08 PM
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
-- Database: `aplikasi-test`
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
  `gambar_barang` varchar(50) NOT NULL,
  `gambar_barang_2` varchar(50) NOT NULL,
  `gambar_barang_3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbarang`
--

INSERT INTO `tbarang` (`id_barang`, `nama_barang`, `tanggal`, `harga_awal`, `deskripsi_barang`, `gambar_barang`, `gambar_barang_2`, `gambar_barang_3`) VALUES
(1, 'Kulkas', '2023-02-22', 1500000, 'Kulkas 5 pintu second no minus', '', '', ''),
(3, 'Smartphone', '2023-04-12', 1200000, 'Smartphone second', '643655e00f15d.jpg', '', ''),
(9, 'asd', '2023-05-21', 4000000, 'asdasd', '6469c70a41f27.png', '', ''),
(10, 'Ps 0', '2023-05-25', 2000000, 'PS 8', '646e8cde75399.png', '646e8cde756c3.png', '646e8cde7597a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tdetailtransaksi`
--

CREATE TABLE `tdetailtransaksi` (
  `id_detailtransaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_lelang` int(11) NOT NULL,
  `harga_awal_lelang` int(11) NOT NULL,
  `penawaran_harga` int(11) NOT NULL,
  `tanggal_penawaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tdetailtransaksi`
--

INSERT INTO `tdetailtransaksi` (`id_detailtransaksi`, `id_transaksi`, `id_lelang`, `harga_awal_lelang`, `penawaran_harga`, `tanggal_penawaran`) VALUES
(1, 1, 13, 5000000, 10000000, '2023-05-24'),
(2, 2, 13, 5000000, 12000000, '2023-05-25');

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
(21, 10, 3, 1, '2023-04-26', 1500000),
(22, 8, 1, 2, '2023-04-29', 4500000),
(25, 10, 3, 1, '2023-05-10', 2000000),
(26, 1, 2, 1, '2023-05-10', 3500005),
(27, 10, 3, 1, '2023-05-10', 2500000),
(28, 10, 3, 5, '2023-05-16', 3000000),
(29, 10, 3, 5, '2023-05-16', 3500000),
(30, 10, 3, 5, '2023-05-16', 3600000),
(31, 13, 3, 5, '2023-05-16', 5500000),
(32, 8, 1, 1, '2023-05-21', 50000000),
(33, 10, 3, 6, '2023-05-23', 3700000),
(34, 10, 3, 6, '2023-05-23', 4000000),
(35, 13, 3, 1, '2023-05-24', 10000000),
(36, 13, 3, 1, '2023-05-25', 12000000);

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
(3, 'Alfarobi Islami', 'Alfarobi', '333', '089123456789', 'Alfarobi333@gmail.com', 'profile.png'),
(4, 'asas', 'asasas', '555', '3434343434', 'asasas', 'profile.png'),
(5, 'Indra', 'Indra', 'indra', '0886662323', 'Indra@gmail.com', 'profile.png'),
(6, 'Mana Permana', 'mana', '123', '087634215342', 'agusindra@gmail.com', '646c0da26b323.png');

-- --------------------------------------------------------

--
-- Table structure for table `tlelang`
--

CREATE TABLE `tlelang` (
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_lelang` date NOT NULL,
  `tgl_lelang_berakhir` date NOT NULL,
  `harga_awal_lelang` int(11) NOT NULL,
  `harga_aktif` int(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `status` enum('dibuka','ditutup','selesai','dicheckout') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tlelang`
--

INSERT INTO `tlelang` (`id_lelang`, `id_barang`, `tgl_lelang`, `tgl_lelang_berakhir`, `harga_awal_lelang`, `harga_aktif`, `id_user`, `id_petugas`, `status`) VALUES
(1, 2, '2023-03-28', '0000-00-00', 0, 3500005, 2, 2, 'dibuka'),
(13, 3, '2023-05-16', '0000-00-00', 5000000, 12000000, 1, 31, 'dicheckout'),
(16, 1, '2023-05-21', '0000-00-00', 1500000, 1500000, 0, 2, 'dibuka'),
(17, 10, '2023-05-25', '2023-05-29', 2000000, 2000000, 0, 31, 'dibuka');

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
(1, 'Dimas Adriansyah', 'dimas', '111', 1, '64647c37a0aae.jpg'),
(2, 'Zainandhi Nur Fathurrohman', 'Zainandhi', '222', 2, '6469b0c0e04d2.jpg'),
(22, 'test', 'test', 'test', 1, 'profile.png'),
(23, 'test', 'test', 'test', 1, 'profile.png'),
(24, 'test', 'test', 'test', 1, 'profile.png'),
(27, 'Ridho Sulistyo', 'Ridho', '123', 2, 'profile.png'),
(31, 'Arya', 'ray', '123', 2, '6462ff6a633ee.jpg'),
(32, 'Zeth', 'zeth', '123', 1, '6462ffbf543b0.jpg'),
(34, 'asdasd', 'asd', '111', 2, '646c0ce0bd5e4.png');

-- --------------------------------------------------------

--
-- Table structure for table `ttransaksi`
--

CREATE TABLE `ttransaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_trans` varchar(25) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `tgl_checkout` date NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `opsi_pengiriman` enum('regular','express','instant') NOT NULL,
  `metode_pembayaran` enum('Kartu-Kredit','Transfer-Bank','E-Wallet') NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `biaya_pengiriman` int(11) NOT NULL,
  `pajak` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ttransaksi`
--

INSERT INTO `ttransaksi` (`id_transaksi`, `no_trans`, `id_user`, `id_petugas`, `tgl_checkout`, `nama_lengkap`, `alamat_pengiriman`, `opsi_pengiriman`, `metode_pembayaran`, `no_telp`, `subtotal`, `biaya_pengiriman`, `pajak`, `total`) VALUES
(1, '202305240001', 1, 31, '2023-05-24', 'dimas', 'jalan', 'express', 'Transfer-Bank', '', 10000000, 100000, 5000, 10105000),
(2, '202305250002', 1, 31, '2023-05-25', 'Zai', 'jalan jalan', 'instant', 'Transfer-Bank', '0891919191', 12000000, 150000, 5000, 12155000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbarang`
--
ALTER TABLE `tbarang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tdetailtransaksi`
--
ALTER TABLE `tdetailtransaksi`
  ADD PRIMARY KEY (`id_detailtransaksi`);

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tdetailtransaksi`
--
ALTER TABLE `tdetailtransaksi`
  MODIFY `id_detailtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `thistori_lelang`
--
ALTER TABLE `thistori_lelang`
  MODIFY `id_histori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tkonsumen`
--
ALTER TABLE `tkonsumen`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tlelang`
--
ALTER TABLE `tlelang`
  MODIFY `id_lelang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tlevel`
--
ALTER TABLE `tlevel`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tpetugas`
--
ALTER TABLE `tpetugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `ttransaksi`
--
ALTER TABLE `ttransaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

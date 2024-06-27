-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 04:53 PM
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
-- Database: `db-aplikasi-lelang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbarang`
--

CREATE TABLE `tbarang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
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
(1, 'Laptop bekas pewdiepie', '2023-05-25', 15000000, 'Laptop bekas pewdiepie yutuber terkenal', '646f65950e840.jpg', '646f65950fc34.jpg', '646f6595102eb.jpg'),
(2, 'Mesin Cuci bekas bill gat', '2023-05-24', 12000000, 'Mesin cuci baru dipakai sekali sama bill gates, struk pembeliannya juga masih ada', '646f6606c10b4.jpg', '646f6606c15c5.jpg', '646f6606c1849.jpg'),
(3, 'Hp J2 prime', '2023-05-22', 15000000, 'hp second dan udah gak bisa nyala lagi, udah jadi artefak', '646f669314ea0.jpg', '646f66931514a.jpg', '646f6693152f0.jpg'),
(4, 'Tikus(alias mouse)', '2023-05-25', 500000, 'tikus warna-warni, barang langka di penjuru dunia ini, hanya ada 7 di alam semesta', '646f672736930.jpg', '646f672736c07.jpg', '646f672736de2.jpg'),
(5, 'mackbook bekas tok dalang', '2023-05-24', 10000000, 'mackbook bekas, masih layak pakai, didalamnya banyak aset penting', '646f67ccdb6c8.jpg', '646f67ccdb9f9.jpg', '646f67ccdbcb1.jpg'),
(6, 'Monitor Bekas Windah Basudara', '2023-05-15', 25000000, 'monitornya masih bagus dan layak pakai, bisa dipajang menjadi aset museum, barang super duper langka', '646f68731cefa.jpg', '646f68731d1bd.jpg', '646f68731d3e6.jpg');

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
(1, 1, 1, 15000000, 23000000, '2023-05-25'),
(2, 2, 3, 15000000, 35000000, '2023-05-25'),
(3, 3, 4, 500000, 10000000, '2023-05-25');

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
(1, 5, 5, 7, '2023-05-25', 12000000),
(2, 5, 5, 7, '2023-05-25', 20000000),
(3, 1, 1, 7, '2023-05-25', 20000000),
(4, 3, 3, 1, '2023-05-25', 25000000),
(5, 1, 1, 1, '2023-05-25', 23000000),
(6, 3, 3, 3, '2023-05-25', 28000100),
(7, 2, 2, 3, '2023-05-25', 12000001),
(8, 5, 5, 3, '2023-05-25', 21000001),
(9, 3, 3, 6, '2023-05-25', 35000000),
(10, 2, 2, 6, '2023-05-25', 15999999),
(11, 2, 2, 5, '2023-05-25', 20123456),
(12, 5, 5, 5, '2023-05-25', 25123456),
(13, 4, 4, 5, '2023-05-25', 1200000),
(14, 4, 4, 6, '2023-05-25', 10000000);

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
(3, 'Alfarobi Islami', 'Alfarobi', '333', '089123456789', 'Alfarobi333@gmail.com', '646f6ebc33e70.jpg'),
(4, 'asas', 'asasas', '555', '3434343434', 'asasas', 'profile.png'),
(5, 'Indra', 'Indra', 'indra', '0886662323', 'Indra@gmail.com', 'profile.png'),
(6, 'Mana Permana', 'mana', '123', '087634215342', 'agusindra@gmail.com', '646f6fc704d66.jpg'),
(7, 'Kaguya shinomiya', 'Kaguya', '123', '087634215342', 'kagu122@gmail.com', '646f6c515f836.jpg');

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
(1, 1, '2023-05-25', '2023-05-29', 15000000, 23000000, 1, 2, 'dicheckout'),
(2, 2, '2023-05-26', '2023-05-30', 12000000, 20123456, 5, 2, 'dibuka'),
(3, 3, '2023-05-23', '2023-05-27', 15000000, 35000000, 6, 27, 'dicheckout'),
(4, 4, '2023-05-25', '2023-05-26', 500000, 10000000, 6, 27, 'dicheckout'),
(5, 5, '2023-05-29', '2023-05-31', 10000000, 25123456, 5, 31, 'dibuka'),
(6, 6, '2023-05-16', '2023-05-19', 25000000, 25000000, 0, 31, 'ditutup');

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
(27, 'Ridho Sulistyo', 'Ridho', '123', 2, '646f6aaa202b4.jpg'),
(31, 'Arya', 'arya', '123', 2, '646f6abc99b41.jpg'),
(32, 'Zeth', 'zeth', '123', 1, '6462ffbf543b0.jpg'),
(34, 'asdasd', 'asd', '111', 2, '646c0ce0bd5e4.png'),
(35, 'Ujang Adriansyah', 'ujang', '333', 2, '646f6b15d7c47.jpg');

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
(1, '202305250001', 1, 2, '2023-05-25', 'Mas Fathurrohman', 'Jalan Kebenaran', 'instant', 'E-Wallet', '0898172973', 23000000, 150000, 5000, 23155000),
(2, '202305250002', 6, 27, '2023-05-25', 'Mana mana', 'Jalan jalan', 'express', 'Transfer-Bank', '082983982', 35000000, 100000, 5000, 35105000),
(3, '202305250003', 6, 27, '2023-05-25', 'Mana aja', 'Dimana aja', 'regular', 'Kartu-Kredit', '0899273972', 10000000, 0, 5000, 10005000);

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tdetailtransaksi`
--
ALTER TABLE `tdetailtransaksi`
  MODIFY `id_detailtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `thistori_lelang`
--
ALTER TABLE `thistori_lelang`
  MODIFY `id_histori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tkonsumen`
--
ALTER TABLE `tkonsumen`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tlelang`
--
ALTER TABLE `tlelang`
  MODIFY `id_lelang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tlevel`
--
ALTER TABLE `tlevel`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tpetugas`
--
ALTER TABLE `tpetugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `ttransaksi`
--
ALTER TABLE `ttransaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 06, 2024 at 08:51 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simanu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_angsuran`
--

CREATE TABLE `tbl_angsuran` (
  `id_angsuran` int NOT NULL,
  `kd_angsuran` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `jumlah` int NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unik` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `piutang_id` int DEFAULT NULL,
  `hutang_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int NOT NULL,
  `kode_brg` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `harga_beli` int NOT NULL,
  `satuan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int NOT NULL,
  `foto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `kode_brg`, `nama_barang`, `harga`, `harga_beli`, `satuan`, `stok`, `foto`, `kategori_id`) VALUES
(9, 'BRG001', 'cat avian', 5000, 10000, 'pcs', 6, 'download4.png', 1),
(10, 'BRG002', 'semen cons', 3000, 0, 'sak', 0, 'download7.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hutang`
--

CREATE TABLE `tbl_hutang` (
  `id_hutang` int NOT NULL,
  `kd_hutang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembelian_id` int NOT NULL,
  `tanggal_tempo` date DEFAULT NULL,
  `total` int NOT NULL,
  `sisa` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int NOT NULL,
  `kode` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `kode`, `kategori`) VALUES
(1, 'a1', 'cat'),
(3, 'a2', 'semen');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keuangan`
--

CREATE TABLE `tbl_keuangan` (
  `id_keuangan` int NOT NULL,
  `tanggal` timestamp NOT NULL,
  `total` int NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_keuangan`
--

INSERT INTO `tbl_keuangan` (`id_keuangan`, `tanggal`, `total`, `status`, `keterangan`) VALUES
(1, '2024-07-01 01:54:08', 1432000, 'keluar', 'pembelian'),
(2, '2024-07-03 02:54:28', 1000000, 'keluar', 'pembelian'),
(3, '2024-07-05 00:55:37', 244000, 'masuk', 'penjualan'),
(4, '2024-07-14 00:56:10', 250000, 'masuk', 'penjualan'),
(8, '2024-07-19 03:03:50', 100000, 'keluar', 'bayar hutang'),
(9, '2024-07-26 06:04:15', 150000, 'masuk', 'bayar piutang'),
(10, '2024-07-19 09:52:18', 174000, 'masuk', 'penjualan'),
(11, '2024-07-20 06:32:39', 380000, 'masuk', 'penjualan'),
(12, '2024-07-24 01:24:15', 0, 'masuk', 'penjualan'),
(13, '2024-07-24 01:27:41', 3000000, 'keluar', 'pembelian'),
(14, '2024-07-24 01:28:08', 300000, 'masuk', 'penjualan'),
(15, '2024-07-30 12:48:29', 50000, 'keluar', 'pembelian'),
(16, '2024-07-30 12:53:16', 10000, 'masuk', 'penjualan'),
(17, '2024-07-30 13:05:06', 0, 'keluar', 'pembelian'),
(18, '2024-07-30 13:16:30', 0, 'keluar', 'pembelian'),
(19, '2024-07-30 13:17:45', 0, 'keluar', 'pembelian'),
(20, '2024-07-30 13:30:27', 350000, 'keluar', 'pembelian'),
(21, '2024-07-30 13:36:36', 350000, 'keluar', 'pembelian'),
(22, '2024-07-30 13:49:47', 620000, 'masuk', 'penjualan'),
(23, '2024-08-02 07:47:22', 100000, 'keluar', 'pembelian'),
(24, '2024-08-03 14:19:07', 5000, 'masuk', 'penjualan'),
(25, '2024-08-06 10:13:31', 10000, 'masuk', 'penjualan'),
(26, '2024-08-06 10:23:57', 5000, 'masuk', 'penjualan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orang_hutang`
--

CREATE TABLE `tbl_orang_hutang` (
  `id_oh` int NOT NULL,
  `nik` int NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` int NOT NULL,
  `alamat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_orang_hutang`
--

INSERT INTO `tbl_orang_hutang` (`id_oh`, `nik`, `nama`, `telepon`, `alamat`, `ktp`) VALUES
(2, 3123123, 'qimal update', 123123, 'dasdasd', 'download.png'),
(3, 43534534, 'adit', 980890, 'gfdgdfgfd', 'download2.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id_pembelian` int NOT NULL,
  `kd_beli` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `suplier_id` int NOT NULL,
  `metode` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`id_pembelian`, `kd_beli`, `tanggal`, `suplier_id`, `metode`) VALUES
(47, 'BM001', '2024-08-02', 1, 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian_detail`
--

CREATE TABLE `tbl_pembelian_detail` (
  `id_pd` int NOT NULL,
  `pembelian_id` int NOT NULL,
  `barang_id` int NOT NULL,
  `qty` int NOT NULL,
  `harga_beli` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_pembelian_detail`
--

INSERT INTO `tbl_pembelian_detail` (`id_pd`, `pembelian_id`, `barang_id`, `qty`, `harga_beli`) VALUES
(38, 47, 9, 10, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id_pengguna` int NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL,
  `telepon` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_pengguna`, `nama`, `username`, `password`, `role`, `telepon`, `alamat`) VALUES
(3, 'Admin', 'admin', '$2y$10$SN/pqD0V2iGcu5XTw5KFIeGNSEu.KW59husxdgBseBMY0g.dJbToC', 1, NULL, NULL),
(4, 'Kasir', 'kasir', '$2y$10$y.OOBARGviZ46Ao7YTQSBuy9fZf2b6vb3EyV/zw318iCJyVt3GKOC', 0, NULL, NULL),
(5, 'Pemilik', 'pemilik', '$2y$10$TVPzPEbFjQf/tBpk.iVCmu1iQYe1QOBHdKkf4HIFLXB94Mhpm0gyW', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `id_penjualan` int NOT NULL,
  `kd_penjualan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pembeli` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` timestamp NOT NULL,
  `metode` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int NOT NULL,
  `diskon` int NOT NULL,
  `total_bayar` int NOT NULL,
  `pengantaran` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status_pengantaran` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`id_penjualan`, `kd_penjualan`, `nama_pembeli`, `tanggal`, `metode`, `total`, `diskon`, `total_bayar`, `pengantaran`, `status_pengantaran`) VALUES
(15, 'PJVbN-030824', 'rina', '2024-08-03 14:19:07', 'cash', 5000, 0, 5000, '', 'proses'),
(16, 'PJ5v4-060824', 'qimal', '2024-08-06 10:13:31', 'kredit', 10000, 0, 10000, 'sungai sipai', 'proses'),
(17, 'PJnpF-060824', 'kntl mmk', '2024-08-06 10:23:57', 'cash', 5000, 0, 5000, '', 'proses');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan_detail`
--

CREATE TABLE `tbl_penjualan_detail` (
  `id_pjd` int NOT NULL,
  `penjualan_id` int NOT NULL,
  `barang_id` int NOT NULL,
  `qty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_penjualan_detail`
--

INSERT INTO `tbl_penjualan_detail` (`id_pjd`, `penjualan_id`, `barang_id`, `qty`) VALUES
(21, 15, 9, 1),
(22, 16, 9, 2),
(23, 17, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_piutang`
--

CREATE TABLE `tbl_piutang` (
  `id_piutang` int NOT NULL,
  `kd_piutang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjualan_id` int NOT NULL,
  `tanggal_tempo` date DEFAULT NULL,
  `total` int NOT NULL,
  `sisa` int NOT NULL,
  `oh_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_piutang`
--

INSERT INTO `tbl_piutang` (`id_piutang`, `kd_piutang`, `penjualan_id`, `tanggal_tempo`, `total`, `sisa`, `oh_id`) VALUES
(7, 'PU-AUC', 16, NULL, 10000, 10000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_return`
--

CREATE TABLE `tbl_return` (
  `id_return` int NOT NULL,
  `barang_id` int NOT NULL,
  `tanggal` date NOT NULL,
  `qty` int NOT NULL,
  `keterangan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `metode` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suplier`
--

CREATE TABLE `tbl_suplier` (
  `id_suplier` int NOT NULL,
  `kode` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_suplier`
--

INSERT INTO `tbl_suplier` (`id_suplier`, `kode`, `nama`, `sales`, `alamat`, `telepon`) VALUES
(1, 'a1', 'pt antang', 'qimal', 'martapura', '0853543');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_angsuran`
--
ALTER TABLE `tbl_angsuran`
  ADD PRIMARY KEY (`id_angsuran`),
  ADD KEY `hutang_id` (`hutang_id`),
  ADD KEY `piutang_id` (`piutang_id`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `tbl_barang_ibfk_1` (`kategori_id`);

--
-- Indexes for table `tbl_hutang`
--
ALTER TABLE `tbl_hutang`
  ADD PRIMARY KEY (`id_hutang`),
  ADD KEY `pembelian_id` (`pembelian_id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_keuangan`
--
ALTER TABLE `tbl_keuangan`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indexes for table `tbl_orang_hutang`
--
ALTER TABLE `tbl_orang_hutang`
  ADD PRIMARY KEY (`id_oh`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `suplier_id` (`suplier_id`);

--
-- Indexes for table `tbl_pembelian_detail`
--
ALTER TABLE `tbl_pembelian_detail`
  ADD PRIMARY KEY (`id_pd`),
  ADD KEY `barang_id` (`barang_id`),
  ADD KEY `pembelian_id` (`pembelian_id`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `tbl_penjualan_detail`
--
ALTER TABLE `tbl_penjualan_detail`
  ADD PRIMARY KEY (`id_pjd`),
  ADD KEY `pejualan_detail` (`penjualan_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `tbl_piutang`
--
ALTER TABLE `tbl_piutang`
  ADD PRIMARY KEY (`id_piutang`),
  ADD KEY `penjualan_id` (`penjualan_id`),
  ADD KEY `oh_id` (`oh_id`);

--
-- Indexes for table `tbl_return`
--
ALTER TABLE `tbl_return`
  ADD PRIMARY KEY (`id_return`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_angsuran`
--
ALTER TABLE `tbl_angsuran`
  MODIFY `id_angsuran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_hutang`
--
ALTER TABLE `tbl_hutang`
  MODIFY `id_hutang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_keuangan`
--
ALTER TABLE `tbl_keuangan`
  MODIFY `id_keuangan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_orang_hutang`
--
ALTER TABLE `tbl_orang_hutang`
  MODIFY `id_oh` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `id_pembelian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_pembelian_detail`
--
ALTER TABLE `tbl_pembelian_detail`
  MODIFY `id_pd` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id_pengguna` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  MODIFY `id_penjualan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_penjualan_detail`
--
ALTER TABLE `tbl_penjualan_detail`
  MODIFY `id_pjd` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_piutang`
--
ALTER TABLE `tbl_piutang`
  MODIFY `id_piutang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_return`
--
ALTER TABLE `tbl_return`
  MODIFY `id_return` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  MODIFY `id_suplier` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_angsuran`
--
ALTER TABLE `tbl_angsuran`
  ADD CONSTRAINT `tbl_angsuran_ibfk_1` FOREIGN KEY (`hutang_id`) REFERENCES `tbl_hutang` (`id_hutang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_angsuran_ibfk_2` FOREIGN KEY (`piutang_id`) REFERENCES `tbl_piutang` (`id_piutang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD CONSTRAINT `tbl_barang_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `tbl_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_hutang`
--
ALTER TABLE `tbl_hutang`
  ADD CONSTRAINT `tbl_hutang_ibfk_1` FOREIGN KEY (`pembelian_id`) REFERENCES `tbl_pembelian` (`id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD CONSTRAINT `tbl_pembelian_ibfk_1` FOREIGN KEY (`suplier_id`) REFERENCES `tbl_suplier` (`id_suplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pembelian_detail`
--
ALTER TABLE `tbl_pembelian_detail`
  ADD CONSTRAINT `tbl_pembelian_detail_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `tbl_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pembelian_detail_ibfk_2` FOREIGN KEY (`pembelian_id`) REFERENCES `tbl_pembelian` (`id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_penjualan_detail`
--
ALTER TABLE `tbl_penjualan_detail`
  ADD CONSTRAINT `tbl_penjualan_detail_ibfk_1` FOREIGN KEY (`penjualan_id`) REFERENCES `tbl_penjualan` (`id_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_penjualan_detail_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `tbl_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_piutang`
--
ALTER TABLE `tbl_piutang`
  ADD CONSTRAINT `tbl_piutang_ibfk_1` FOREIGN KEY (`penjualan_id`) REFERENCES `tbl_penjualan` (`id_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_piutang_ibfk_2` FOREIGN KEY (`oh_id`) REFERENCES `tbl_orang_hutang` (`id_oh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_return`
--
ALTER TABLE `tbl_return`
  ADD CONSTRAINT `tbl_return_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `tbl_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

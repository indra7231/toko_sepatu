-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221008.4b87169816
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 02:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoes_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(1) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass_admin` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `pass_admin`) VALUES
(2, 'admin', '$2y$10$ZSvsrSfLCgQPb1P2wH1T/.P.p9ZDmCcI5k7sj6GN86B2oqOj/YCaq');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(5) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `stok_barang` int(5) NOT NULL,
  `harga_barang` int(10) NOT NULL,
  `gambar_barang` varchar(200) NOT NULL,
  `Sdesc` text NOT NULL,
  `Ldesc` text NOT NULL,
  `id_ukuran` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok_barang`, `harga_barang`, `gambar_barang`, `Sdesc`, `Ldesc`, `id_ukuran`) VALUES
(12, 'Nike Stefan Janoski', 50, 520000, '6394278770467.jpg', 'Sepatu Stylish Nke Stefan Janoski Black', 'Terbuat dari bahan yang kuat dan lembut, kelihatan seperti suede, sehingga memberikan keyamanan bagi pengguannya', 11),
(13, 'Pantofel Shoes', 30, 400000, '639428949ca84.jpg', 'Sepatu Pria Pantofel Karet Motif Polos', 'Terbuat dari bahan kulit jenis suede kuat, harga yang lebih terjangkau dan cocok untuk acara smart casual atau bahkan untuk ke konser', 14),
(14, 'Vans Authentic Yellow', 20, 350000, '63942e53aaff5.jpg', 'Sepatu Vans Premium Quality dijamin tidak mengecewakan', 'Seri Sepatu Skate klasik , dengan ciri khas satu garis putih pada sisi sepatu dengan siluet low-top lace-up mengutamakan bahan berupa suede dan kanvas dengan outsole waffle', 10);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_pembelian` int(5) NOT NULL,
  `id_barang` varchar(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `ukuran` int(2) NOT NULL,
  `kuantitas` int(3) NOT NULL,
  `harga_satuan` int(10) NOT NULL,
  `waktu_pembelian` timestamp NOT NULL DEFAULT current_timestamp(),
  `harga_seluruh` int(10) NOT NULL,
  `status_pembelian` varchar(8) NOT NULL,
  `metode_pembelian` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_pembelian`, `id_barang`, `id_user`, `nama_barang`, `ukuran`, `kuantitas`, `harga_satuan`, `waktu_pembelian`, `harga_seluruh`, `status_pembelian`, `metode_pembelian`) VALUES
(41, '12', 11, 'Nike Stefan Janoski', 40, 1, 520000, '2022-12-10 07:01:05', 520000, '1', 'COD'),
(42, '13', 11, 'Pantofel Shoes', 43, 1, 400000, '2022-12-10 07:01:36', 400000, '', 'm-Banking'),
(43, '14', 11, 'Vans Authentic Yellow', 39, 1, 350000, '2022-12-10 07:02:18', 350000, '', 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(3) NOT NULL,
  `metode_pembelian` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `metode_pembelian`) VALUES
(1, 'COD'),
(2, 'm-Banking');

-- --------------------------------------------------------

--
-- Table structure for table `pre_order`
--

CREATE TABLE `pre_order` (
  `id_preOrder` int(11) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_barang` int(5) NOT NULL,
  `gambar_barang` varchar(200) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `ukuran` int(2) NOT NULL,
  `harga_satuan` int(10) NOT NULL,
  `kuantitias` int(3) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pre_order`
--

INSERT INTO `pre_order` (`id_preOrder`, `id_user`, `id_barang`, `gambar_barang`, `nama_barang`, `ukuran`, `harga_satuan`, `kuantitias`, `total`) VALUES
(74, 11, 13, '639428949ca84.jpg', 'Pantofel Shoes', 43, 400000, 1, 400000),
(78, 0, 13, '639428949ca84.jpg', 'Pantofel Shoes', 43, 400000, 1, 400000),
(79, 0, 13, '639428949ca84.jpg', 'Pantofel Shoes', 43, 400000, 1, 400000);

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` int(5) NOT NULL,
  `besar_ukuran` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `besar_ukuran`) VALUES
(1, 30),
(2, 31),
(3, 32),
(4, 33),
(5, 34),
(6, 35),
(7, 36),
(8, 37),
(9, 38),
(10, 39),
(11, 40),
(12, 41),
(13, 42),
(14, 43),
(15, 44),
(16, 45),
(17, 46),
(18, 47),
(19, 48),
(20, 49),
(21, 50),
(22, 51),
(23, 52),
(24, 53),
(25, 54),
(26, 55),
(27, 56),
(28, 57),
(29, 58),
(30, 59),
(31, 60),
(32, 61);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nama_user` varchar(40) NOT NULL,
  `pass_user` varchar(250) NOT NULL,
  `prov_user` varchar(20) DEFAULT NULL,
  `kota_user` varchar(30) DEFAULT NULL,
  `alamat_user` text DEFAULT NULL,
  `tlpn_user` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `pass_user`, `prov_user`, `kota_user`, `alamat_user`, `tlpn_user`) VALUES
(11, 'Ahmad Nurrahman', '$2y$10$FQNdByDbHCoevtwU4nS79.jusEaX3afo.YYZLRRaf7Mog835r1qgq', 'Jawa Barat', 'Cicalengka', 'Jalan Merpati no 10', '081233569990'),
(12, 'bima arya', '$2y$10$GzIVytr/X8FrMytlaSV3IOepc6oDLYNKKrvyNzVscDR1PObUq6pl2', '', '', '', ''),
(13, 'mike ', '$2y$10$.NaeN5MxFZxRYkNUmbymreYUFJ779NcC/mYPP9zvia0VauH56AHZm', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_order`
--
ALTER TABLE `pre_order`
  ADD PRIMARY KEY (`id_preOrder`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_pembelian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pre_order`
--
ALTER TABLE `pre_order`
  MODIFY `id_preOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

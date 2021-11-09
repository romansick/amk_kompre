-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2021 at 11:04 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_amk`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `no_rek` varchar(50) NOT NULL,
  `nama_pemilik` varchar(128) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `no_rek`, `nama_pemilik`, `nama_bank`, `is_active`) VALUES
(2, '123213', 'Haikal', 'BRI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `list_rumah`
--

CREATE TABLE `list_rumah` (
  `id` int(11) NOT NULL,
  `tipe_id` int(11) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `lokasi_id` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `luas` varchar(50) NOT NULL,
  `blok` varchar(100) NOT NULL,
  `image` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_rumah`
--

INSERT INTO `list_rumah` (`id`, `tipe_id`, `harga`, `lokasi_id`, `unit`, `deskripsi`, `luas`, `blok`, `image`, `date_created`, `is_active`) VALUES
(5, 1, '12312312', 3, 12, 'qasd asd a d djaewg ', '234', 'J', 'checked.png', 1635873611, 1),
(6, 3, '131234123', 3, 12, '21321 ead fad ', '123', 'das ', 'Deg_Sertifikat_1.png', 1636286230, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_rumah`
--

CREATE TABLE `lokasi_rumah` (
  `id` int(11) NOT NULL,
  `lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi_rumah`
--

INSERT INTO `lokasi_rumah` (`id`, `lokasi`) VALUES
(3, 'Padang Utara');

-- --------------------------------------------------------

--
-- Table structure for table `metode_bayar`
--

CREATE TABLE `metode_bayar` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(20) NOT NULL,
  `metode_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `harga_rumah` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `rumah_id` int(11) NOT NULL,
  `tipe_id` int(11) DEFAULT NULL,
  `status_pembayaran` varchar(100) NOT NULL,
  `tanggal_bayar` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metode_bayar`
--

INSERT INTO `metode_bayar` (`id`, `kode_transaksi`, `metode_id`, `user_id`, `harga_rumah`, `total`, `image`, `rumah_id`, `tipe_id`, `status_pembayaran`, `tanggal_bayar`, `bank_id`, `date_created`) VALUES
(21, 'AMKT3U9', 1, 9, ' 131234123', '1', NULL, 6, NULL, 'Berhasil', NULL, NULL, 1636287746),
(22, 'AMKT3U9', 2, 9, ' 131234123', '1', 'WhatsApp_Image_2021-11-07_at_22_50_26.jpeg', 6, NULL, 'Berhasil', 1636287800, 2, 1636287746),
(23, 'AMKT3U9', 1, 9, '150000000', '1', NULL, 6, NULL, 'Gagal', NULL, NULL, 1636289072),
(24, 'AMKT3U9', 1, 9, ' 131234123', '1', 'WhatsApp_Image_2021-11-03_at_22_54_28.jpeg', 6, NULL, 'Berhasil', 1636311800, 2, 1636289072),
(25, 'AMKT3U9', 2, 9, ' 131234123', '1', 'WhatsApp_Image_2021-11-07_at_22_50_26.jpeg', 6, NULL, 'Berhasil', 1636307799, 2, 1636307489),
(26, 'AMKT3U6', 1, 9, ' 131234123', '1', 'wp2284556-spacex-wallpapers.jpg', 6, NULL, 'Berhasil', 1636308332, 2, 1636308034),
(29, 'AMKT3U96', 2, 9, ' 131234123', '1', NULL, 6, NULL, 'Pending', NULL, NULL, 1636311101),
(30, 'AMKT3U96', 2, 9, ' 131234123', '1', 'WhatsApp_Image_2021-11-03_at_22_54_281.jpeg', 6, 3, 'Berhasil', 1636355287, 2, 1636355241);

-- --------------------------------------------------------

--
-- Table structure for table `metode_transaksi`
--

CREATE TABLE `metode_transaksi` (
  `id` int(11) NOT NULL,
  `metode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metode_transaksi`
--

INSERT INTO `metode_transaksi` (`id`, `metode`) VALUES
(1, 'KPR'),
(2, 'Tunai');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_rumah`
--

CREATE TABLE `tipe_rumah` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe_rumah`
--

INSERT INTO `tipe_rumah` (`id`, `kategori`) VALUES
(1, 'TIpe 36'),
(3, 'Tipe 46');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `role_id` int(1) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `nama`, `password`, `image`, `no_hp`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'muhammadhaikalaziz28@gmail.com', 'Muhammad Haikal Aziz', '$2y$10$CgMvynCcOv5QjsNdqyotIuIB3GMcfI9J6jVFl402sZG1epY6etZRO', 'default.png', '085282326295', 1, 1, 1635346360),
(3, 'admin@gmail.com', 'Admin', '$2y$10$mKoriGLlg93UFAIZtsnXCOzfA2MlKpr4RrDsIg95k9zJyp5fnCZeK', 'default.png', '09878977678', 1, 1, 1635348018),
(9, 'konsumen@gmail.com', 'konsumen', '$2y$10$1jGMJpywHjUwhtXWusrCb.v0d.8rqC4Aq7uGhfZJZFbe.xGEfXLIC', 'default.png', '1312312', 3, 1, 1635597543),
(12, 'pimpinan@gmail.com', 'pimpinan', '$2y$10$fr2oq4XU6K.QeHWxiYYaOuWkjHMpwm2TkaC4Vgt0mETSW1CVa0.iy', 'default.png', '12312312321312', 1, 1, 1636313929),
(13, 'pim@gmail.cc', 'pimpinan baru ', '$2y$10$2l1qsTmReBc5aboPgW3rPuE3QqqbEdja9OM6mAVDM9Ieklm5nGGQy', 'default.png', '1234', 2, 1, 1636315003),
(15, 'uang@gmail.cc', 'Bag. Keuangan', '$2y$10$gUyYkoHppAdeVOGSsQnRd./P2AHVA/i6y3mTkclggGBZEbg4xn12i', 'default.png', '12345342', 7, 1, 1636361154),
(16, 'bukanadmin@gmail.com', 'Administrasi', '$2y$10$Rstpg2axvVXMGQ6z4oMRmuIPqJhwf7b7pi0PMXQUReIB92PgE8LQC', 'default.png', '123213123', 4, 1, 1636363036);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(20, 1, 8),
(30, 3, 9),
(31, 1, 5),
(35, 2, 10),
(37, 7, 12),
(38, 4, 13);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Administrator'),
(5, 'Menu'),
(8, 'Transaksi'),
(9, 'Konsumen'),
(10, 'Pimpinan'),
(12, 'Keuangan'),
(13, 'Administrasi');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Pimpinan'),
(3, 'Konsumen'),
(4, 'Bag. Administrasi'),
(7, 'Bag. Keuangan');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `judul`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'administrator', 'bx bx-home', 1),
(2, 5, 'Menu Management', 'menu', 'bx bx-food-menu', 1),
(3, 1, 'Role User Management', 'administrator/role', 'bx bxs-user-badge', 1),
(4, 5, 'Sub Menu Management', 'menu/submenu', 'bx bx-menu', 1),
(6, 1, 'Data Bank', 'administrator/bank', 'bx bxs-bank', 1),
(7, 1, 'Profile', 'administrator/profile', 'bx bx-user', 1),
(9, 1, 'Data Rumah', 'administrator/rumah', 'bx bx-building-house', 1),
(10, 1, 'User Management', 'administrator/user', 'bx bx-user-circle', 1),
(12, 8, 'Data Transaksi', 'transaksi', 'bx bx-money', 1),
(13, 9, 'Dashboard', 'konsumen', 'bx bx-home', 1),
(14, 9, 'Katalog Rumah', 'konsumen/rumah', 'bx bx-building-house', 1),
(15, 9, 'Transaksi', 'konsumen/transaksi', 'bx bx-money', 1),
(16, 10, 'Dashboard', 'pimpinan', 'bx bx-home', 1),
(17, 10, 'Data Rumah', 'pimpinan/rumah', 'bx bx-building-house', 1),
(18, 10, 'Data User', 'pimpinan/user', 'bx bx-user-circle', 1),
(19, 10, 'Data Transaksi', 'pimpinan/transaksi', 'bx bx-money', 1),
(21, 12, 'Dashboard', 'keuangan', 'bx bx-home', 1),
(22, 12, 'Transaksi', 'keuangan/transaksi', 'bx bx-money', 1),
(23, 12, 'Data Konsumen', 'keuangan/konsumen', 'bx bx-user-circle', 1),
(24, 12, 'Data Rumah', 'keuangan/rumah', 'bx bx-building-house', 1),
(25, 13, 'Dashboard', 'administrasi', 'bx bx-home', 1),
(26, 13, 'Data Rumah', 'administrasi/rumah', 'bx bx-building-house', 1),
(27, 13, 'Data User', 'administrasi/user', 'bx bx-user-circle', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_rumah`
--
ALTER TABLE `list_rumah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipe_id` (`tipe_id`),
  ADD KEY `lokasi_id` (`lokasi_id`);

--
-- Indexes for table `lokasi_rumah`
--
ALTER TABLE `lokasi_rumah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metode_transaksi`
--
ALTER TABLE `metode_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipe_rumah`
--
ALTER TABLE `tipe_rumah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `list_rumah`
--
ALTER TABLE `list_rumah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lokasi_rumah`
--
ALTER TABLE `lokasi_rumah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `metode_transaksi`
--
ALTER TABLE `metode_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipe_rumah`
--
ALTER TABLE `tipe_rumah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `list_rumah`
--
ALTER TABLE `list_rumah`
  ADD CONSTRAINT `list_rumah_ibfk_1` FOREIGN KEY (`tipe_id`) REFERENCES `tipe_rumah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `list_rumah_ibfk_2` FOREIGN KEY (`lokasi_id`) REFERENCES `lokasi_rumah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

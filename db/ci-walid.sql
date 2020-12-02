-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2020 at 04:11 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci-walid`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `jenisp` varchar(128) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `jenisp`, `total`) VALUES
(1, 'SPP 7 Smt 1', 750000),
(2, 'SPP 7 Smt 2', 750000),
(3, 'Seragam 1', 650000),
(4, 'Uang Gedung 1', 1050000),
(5, 'Infaq', 1000000),
(6, 'SPP 8 Smt 1', 950000),
(7, 'SPP 8 Smt 2', 950000),
(8, 'Seragam 2', 550000),
(9, 'Uang Gedung 2', 1050000),
(10, 'SPP 9 Smt 1', 1100000),
(11, 'SPP 9 Smt 2', 1100000),
(12, 'Seragam 3', 550000),
(13, 'Uang Gedung 3', 1050000),
(14, 'Ujian', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nkelas` varchar(128) NOT NULL,
  `sub` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nkelas`, `sub`) VALUES
(1, '7', 'A'),
(2, '7', 'B'),
(3, '7', 'C'),
(4, '7', 'D'),
(5, '7', 'E'),
(6, '7', 'F'),
(7, '8', 'A'),
(8, '8', 'B'),
(9, '8', 'C'),
(10, '8', 'D'),
(11, '8', 'E'),
(12, '8', 'F'),
(13, '8', 'G'),
(14, '9', 'A'),
(15, '9', 'B'),
(16, '9', 'C'),
(17, '9', 'D'),
(18, '9', 'E'),
(19, '9', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `niss` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `niss`, `nama`, `kelas`) VALUES
(1, '10223001', 'Aditya Gilang', 1),
(2, '10223002', 'Sarah Wijayanto', 7),
(4, '12345', 'Walid', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_trx` int(11) NOT NULL,
  `niss` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kelas` varchar(128) NOT NULL,
  `jenis` varchar(128) NOT NULL,
  `nominal` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `kurang` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_trx`, `niss`, `nama`, `kelas`, `jenis`, `nominal`, `status`, `kurang`, `tanggal`) VALUES
(11, '10223001', 'Aditya Gilang', '1', 'SPP 7 Smt 1', 750000, 1, 0, '2020-11-24'),
(12, '10223001', 'Aditya Gilang', '1', 'SPP 7 Smt 2', 750000, 1, 0, '2020-11-24'),
(13, '10223002', 'Sarah Wijayanto', '7', 'Seragam 1', 650000, 1, 0, '2020-01-05'),
(14, '10223002', 'Sarah Wijayanto', '7', 'Uang Gedung 1', 500000, 0, 550000, '2020-11-25'),
(16, '10223002', 'Sarah Wijayanto', '7', 'SPP 7 Smt 2', 750000, 1, 0, '2020-11-24'),
(17, '10223001', 'Aditya Gilang', '1', 'Uang Gedung 1', 750000, 0, 300000, '2020-11-24'),
(18, '12345', 'Walid', '2', 'Seragam 1', 650000, 1, 0, '2020-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `name`, `password`) VALUES
(1, 'admin', 'Admin', '$2y$10$zKmditaBpcIp0EY9FFlgOezicb7Qn08qzKR1NixZPgtb8V6vXHxb6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_trx`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_trx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

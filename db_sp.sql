-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2023 at 12:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inhal`
--

CREATE TABLE `tbl_inhal` (
  `id_inhal` int(4) NOT NULL,
  `tagihan` int(7) NOT NULL,
  `id_praktikum` int(2) NOT NULL,
  `no_modul` varchar(10) NOT NULL,
  `nim` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `id_mahasiswa` int(4) NOT NULL,
  `nim` int(10) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`id_mahasiswa`, `nim`, `nama`) VALUES
(1, 1, 'budi'),
(2, 223, 'ani'),
(4, 23, 'bambang'),
(5, 4, 'meong');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id_pinjam` int(5) NOT NULL,
  `nim` int(10) NOT NULL,
  `nama_alat` varchar(20) NOT NULL,
  `tgl_pinjam` date NOT NULL DEFAULT current_timestamp(),
  `durasi_pinjam` int(2) NOT NULL,
  `keperluan_pinjam` varchar(40) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `program_studi` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `id_pendaftaran` int(5) NOT NULL,
  `nim` int(10) NOT NULL,
  `id_praktikum` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pendaftaran`
--

INSERT INTO `tbl_pendaftaran` (`id_pendaftaran`, `nim`, `id_praktikum`) VALUES
(1, 223, 2),
(2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_praktikum`
--

CREATE TABLE `tbl_praktikum` (
  `id_praktikum` int(2) NOT NULL,
  `nama_praktikum` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_praktikum`
--

INSERT INTO `tbl_praktikum` (`id_praktikum`, `nama_praktikum`) VALUES
(1, 'pemrogaman'),
(2, 'gambar tek');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_inhal`
--
ALTER TABLE `tbl_inhal`
  ADD PRIMARY KEY (`id_inhal`),
  ADD KEY `id_praktikum` (`id_praktikum`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD UNIQUE KEY `nim_2` (`nim`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_praktikum` (`id_praktikum`);

--
-- Indexes for table `tbl_praktikum`
--
ALTER TABLE `tbl_praktikum`
  ADD PRIMARY KEY (`id_praktikum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_inhal`
--
ALTER TABLE `tbl_inhal`
  MODIFY `id_inhal` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id_mahasiswa` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id_pinjam` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  MODIFY `id_pendaftaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_praktikum`
--
ALTER TABLE `tbl_praktikum`
  MODIFY `id_praktikum` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_inhal`
--
ALTER TABLE `tbl_inhal`
  ADD CONSTRAINT `tbl_inhal_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `tbl_mahasiswa` (`nim`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_inhal_ibfk_3` FOREIGN KEY (`id_praktikum`) REFERENCES `tbl_praktikum` (`id_praktikum`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD CONSTRAINT `tbl_peminjaman_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `tbl_mahasiswa` (`nim`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD CONSTRAINT `tbl_pendaftaran_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `tbl_mahasiswa` (`nim`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pendaftaran_ibfk_3` FOREIGN KEY (`id_praktikum`) REFERENCES `tbl_praktikum` (`id_praktikum`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

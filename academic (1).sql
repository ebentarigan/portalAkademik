-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2024 at 12:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academic`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `nim` varchar(10) NOT NULL,
  `kodeProdi` varchar(10) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_tengah` varchar(50) DEFAULT NULL,
  `nama_akhir` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`nim`, `kodeProdi`, `nama_depan`, `nama_tengah`, `nama_akhir`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `email`, `foto`) VALUES
('607014', 'D3SIA', 'Harrow', '', 'wdfvgbnhj', 'P', '2024-10-30', 'wqsdfsegfhj', 'angelinagiovanni32@gmail.com', NULL),
('607015', 'D3SI', 'Ichwan', '', 'Riskhi', 'L', '2024-11-05', 'drthjk', 'ichwan45@gmail.com', NULL),
('607016', 'S1TB', 'James', '', 'Parker', 'L', '2024-11-10', 'Kediri', 'fujikaze45@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studyprograms`
--

CREATE TABLE `studyprograms` (
  `kodeProdi` varchar(10) NOT NULL,
  `namaProdi` varchar(255) NOT NULL,
  `kaprodi` varchar(255) NOT NULL,
  `studentBody` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studyprograms`
--

INSERT INTO `studyprograms` (`kodeProdi`, `namaProdi`, `kaprodi`, `studentBody`) VALUES
('D3DM', 'D3 Digital Marketing', '', 0),
('D3HCA', 'D3 Hospitality Culinary Art', '', 0),
('D3RPLA', 'D3 Rekayasa Perangkat Lunak Aplikasi', '', 0),
('D3SI', 'D3 Sistem Informasi', '', 0),
('D3SIA', 'D3 Sistem Informasi Akuntansi', '', 0),
('D3TK', 'D3 Teknik Komputer', '', 0),
('D3TT', 'D3 Teknik Telekomunikasi', '', 0),
('D4SIKC', 'D4 Sistem Informasi Kota Cerdas', '', 0),
('S1TB', 'S1 Teknik Biomedis', '', 0),
('S1TK', 'S1 Teknik Komputer', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `kodeProdi` (`kodeProdi`);

--
-- Indexes for table `studyprograms`
--
ALTER TABLE `studyprograms`
  ADD PRIMARY KEY (`kodeProdi`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`kodeProdi`) REFERENCES `studyprograms` (`kodeProdi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

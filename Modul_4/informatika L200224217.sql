-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2024 at 12:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `informatika`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `khs`
-- (See below for the actual view)
--
CREATE TABLE `khs` (
`NIM` varchar(10)
,`Nama_MK` varchar(20)
,`Nilai_Angka` int(11)
,`Nilai_Huruf` varchar(5)
);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` varchar(10) NOT NULL,
  `Nama` char(50) DEFAULT NULL,
  `Kelas` char(5) DEFAULT NULL,
  `Alamat` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `Nama`, `Kelas`, `Alamat`) VALUES
('L200008000', 'Ari wibowo', 'A', 'Solo'),
('L200080080', 'Agustina Nuggraini', 'B', 'Sragen');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `NIM` varchar(15) NOT NULL,
  `Nama_MK` varchar(20) DEFAULT NULL,
  `Nilai_Angka` int(11) DEFAULT NULL,
  `Nilai_Huruf` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`NIM`, `Nama_MK`, `Nilai_Angka`, `Nilai_Huruf`) VALUES
('L200008000', 'Pemrograman Web', 87, 'A'),
('L200080002', 'Kapita Selekta', 60, 'BC'),
('L200080008', 'Pemrograman Web', 90, 'A');

-- --------------------------------------------------------

--
-- Structure for view `khs`
--
DROP TABLE IF EXISTS `khs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `khs`  AS SELECT `mahasiswa`.`NIM` AS `NIM`, `nilai`.`Nama_MK` AS `Nama_MK`, `nilai`.`Nilai_Angka` AS `Nilai_Angka`, `nilai`.`Nilai_Huruf` AS `Nilai_Huruf` FROM (`mahasiswa` join `nilai` on(`mahasiswa`.`NIM` = `nilai`.`NIM`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`NIM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2024 at 09:13 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rendi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot_nilai`
--

CREATE TABLE `bobot_nilai` (
  `id` int NOT NULL,
  `predikat` varchar(2) DEFAULT NULL,
  `bobot` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bobot_nilai`
--

INSERT INTO `bobot_nilai` (`id`, `predikat`, `bobot`) VALUES
(1, 'A', 4),
(2, 'B+', 3.5),
(3, 'B', 3),
(4, 'C+', 2.5),
(5, 'C', 2),
(6, 'D+', 1.5),
(7, 'D', 1),
(8, 'E+', 0.5),
(9, 'E', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_rencana_studi`
--

CREATE TABLE `detail_rencana_studi` (
  `id` int NOT NULL,
  `matakuliah_id` int DEFAULT NULL,
  `rencana_studi_id` int DEFAULT NULL,
  `bobot_nilai_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `detail_rencana_studi`
--

INSERT INTO `detail_rencana_studi` (`id`, `matakuliah_id`, `rencana_studi_id`, `bobot_nilai_id`) VALUES
(1, 7, 1, 1),
(2, 8, 1, 1),
(14, 9, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` int NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `sks` int DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `prasyarat_id` int DEFAULT NULL,
  `tahun_ajaran` enum('ganjil','genap') NOT NULL,
  `jenis` enum('wajib','pilihan') DEFAULT NULL,
  `semester_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `nama`, `sks`, `deskripsi`, `prasyarat_id`, `tahun_ajaran`, `jenis`, `semester_id`) VALUES
(7, 'PTI', 3, '', NULL, 'ganjil', 'wajib', 1),
(8, 'ALPRO', 4, '', NULL, 'ganjil', 'wajib', 1),
(9, 'MATDIS', 3, '', NULL, 'genap', 'wajib', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rencana_studi`
--

CREATE TABLE `rencana_studi` (
  `id` int NOT NULL,
  `semester_id` int DEFAULT NULL,
  `total_sks` int DEFAULT NULL,
  `target_ip` float DEFAULT NULL,
  `deskripsi` text,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rencana_studi`
--

INSERT INTO `rencana_studi` (`id`, `semester_id`, `total_sks`, `target_ip`, `deskripsi`, `user_id`) VALUES
(1, 1, 7, 4, '', 1),
(8, 2, 3, 3.5, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int NOT NULL,
  `kode_semester` char(1) DEFAULT NULL,
  `nama` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `kode_semester`, `nama`) VALUES
(1, '1', 'Semester 1'),
(2, '2', 'Semester 2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `nim` varchar(12) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nim`, `nama`, `username`, `password`, `role`) VALUES
(1, '220411100058', 'Sabil Ahmad Hidayat', 'sabil', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', '2'),
(2, NULL, 'Administrator', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '1'),
(3, '220411100037', 'Abdul Rahem Faqih', 'faqih', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot_nilai`
--
ALTER TABLE `bobot_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_rencana_studi`
--
ALTER TABLE `detail_rencana_studi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bobot_nilai_id` (`bobot_nilai_id`),
  ADD KEY `matakuliah_id` (`matakuliah_id`),
  ADD KEY `rencana_studi_id` (`rencana_studi_id`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prasyarat_id` (`prasyarat_id`),
  ADD KEY `semester_fk` (`semester_id`);

--
-- Indexes for table `rencana_studi`
--
ALTER TABLE `rencana_studi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `semester_id` (`semester_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobot_nilai`
--
ALTER TABLE `bobot_nilai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detail_rencana_studi`
--
ALTER TABLE `detail_rencana_studi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rencana_studi`
--
ALTER TABLE `rencana_studi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_rencana_studi`
--
ALTER TABLE `detail_rencana_studi`
  ADD CONSTRAINT `detail_rencana_studi_ibfk_1` FOREIGN KEY (`bobot_nilai_id`) REFERENCES `bobot_nilai` (`id`),
  ADD CONSTRAINT `detail_rencana_studi_ibfk_2` FOREIGN KEY (`matakuliah_id`) REFERENCES `matakuliah` (`id`),
  ADD CONSTRAINT `detail_rencana_studi_ibfk_3` FOREIGN KEY (`rencana_studi_id`) REFERENCES `rencana_studi` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD CONSTRAINT `matakuliah_ibfk_1` FOREIGN KEY (`prasyarat_id`) REFERENCES `matakuliah` (`id`),
  ADD CONSTRAINT `semester_fk` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `rencana_studi`
--
ALTER TABLE `rencana_studi`
  ADD CONSTRAINT `rencana_studi_ibfk_1` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

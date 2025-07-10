-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2025 at 03:20 PM
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
-- Database: `db_akademik`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `hitung_umur` (`tanggal_lahir` DATE) RETURNS INT(11) DETERMINISTIC BEGIN
    DECLARE umur INT;
    SET umur = FLOOR(DATEDIFF(NOW(), tanggal_lahir) / 365);
    RETURN umur;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `label_mahasiswa` (`nama` VARCHAR(100), `nim` VARCHAR(10)) RETURNS VARCHAR(150) CHARSET utf8mb4 COLLATE utf8mb4_general_ci DETERMINISTIC RETURN CONCAT(nama, ' [NIM: ', nim, ']')$$

CREATE DEFINER=`root`@`localhost` FUNCTION `status_nilai` (`nilai` VARCHAR(2)) RETURNS VARCHAR(20) CHARSET utf8mb4 COLLATE utf8mb4_general_ci DETERMINISTIC BEGIN
    DECLARE status VARCHAR(20);
    IF nilai IN ('A', 'A-', 'B+', 'B', 'B-', 'C+', 'C') THEN
        SET status = 'LULUS';
    ELSEIF nilai IS NULL OR nilai = '' THEN
        SET status = 'BELUM DINILAI';
    ELSE
        SET status = 'TIDAK LULUS';
    END IF;
    RETURN status;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `kd_ds` varchar(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`kd_ds`, `nama`) VALUES
('DS001', 'Dr. Anton Hadi'),
('DS002', 'Prof. Siti Aminah'),
('DS003', 'Drs. Budi Santoso');

-- --------------------------------------------------------

--
-- Table structure for table `jadwalmengajar`
--

CREATE TABLE `jadwalmengajar` (
  `id_jadwal` int(11) NOT NULL,
  `kd_mk` varchar(10) DEFAULT NULL,
  `kd_ds` varchar(10) DEFAULT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `ruang` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwalmengajar`
--

INSERT INTO `jadwalmengajar` (`id_jadwal`, `kd_mk`, `kd_ds`, `hari`, `jam`, `ruang`) VALUES
(1, 'MK001', 'DS001', 'Senin', '08:00:00', 'Lab A'),
(2, 'MK002', 'DS002', 'Selasa', '10:00:00', 'Lab B'),
(3, 'MK003', 'DS003', 'Rabu', '13:00:00', 'Lab C');

-- --------------------------------------------------------

--
-- Table structure for table `krsmahasiswa`
--

CREATE TABLE `krsmahasiswa` (
  `id_krs` int(11) NOT NULL,
  `nim` bigint(20) DEFAULT NULL,
  `kd_mk` varchar(10) DEFAULT NULL,
  `kd_ds` varchar(10) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `nilai` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `krsmahasiswa`
--

INSERT INTO `krsmahasiswa` (`id_krs`, `nim`, `kd_mk`, `kd_ds`, `semester`, `nilai`) VALUES
(1, 230010001, 'MK001', 'DS001', 3, 'A'),
(2, 230010001, 'MK002', 'DS002', 3, 'B+'),
(3, 230010002, 'MK001', 'DS001', 3, NULL),
(4, 230010003, 'MK003', 'DS003', 4, 'A-');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` bigint(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jalan` varchar(100) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `kodepos` varchar(10) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `kd_ds` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jk`, `tgl_lahir`, `jalan`, `kota`, `kodepos`, `no_hp`, `kd_ds`) VALUES
(230010001, 'Andi Saputra', 'L', '2002-05-10', 'Jl. Merdeka No. 1', 'Bandung', '40123', '081234567890', 'DS001'),
(230010002, 'Bunga Permata', 'P', '2001-12-22', 'Jl. Sudirman No. 10', 'Jakarta', '10220', '082134567891', 'DS002'),
(230010003, 'Cahyo Nugroho', 'L', '2003-03-15', 'Jl. Diponegoro No. 15', 'Surabaya', '60234', '083134567892', 'DS001');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kd_mk` varchar(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `sks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kd_mk`, `nama`, `sks`) VALUES
('MK001', 'Pemrograman Web', 3),
('MK002', 'Basis Data', 3),
('MK003', 'Struktur Data', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`kd_ds`);

--
-- Indexes for table `jadwalmengajar`
--
ALTER TABLE `jadwalmengajar`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `kd_mk` (`kd_mk`),
  ADD KEY `kd_ds` (`kd_ds`);

--
-- Indexes for table `krsmahasiswa`
--
ALTER TABLE `krsmahasiswa`
  ADD PRIMARY KEY (`id_krs`),
  ADD UNIQUE KEY `nim` (`nim`,`kd_mk`,`kd_ds`,`semester`),
  ADD KEY `kd_mk` (`kd_mk`),
  ADD KEY `kd_ds` (`kd_ds`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `kd_ds` (`kd_ds`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kd_mk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwalmengajar`
--
ALTER TABLE `jadwalmengajar`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `krsmahasiswa`
--
ALTER TABLE `krsmahasiswa`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwalmengajar`
--
ALTER TABLE `jadwalmengajar`
  ADD CONSTRAINT `jadwalmengajar_ibfk_1` FOREIGN KEY (`kd_mk`) REFERENCES `matakuliah` (`kd_mk`),
  ADD CONSTRAINT `jadwalmengajar_ibfk_2` FOREIGN KEY (`kd_ds`) REFERENCES `dosen` (`kd_ds`);

--
-- Constraints for table `krsmahasiswa`
--
ALTER TABLE `krsmahasiswa`
  ADD CONSTRAINT `krsmahasiswa_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `krsmahasiswa_ibfk_2` FOREIGN KEY (`kd_mk`) REFERENCES `matakuliah` (`kd_mk`),
  ADD CONSTRAINT `krsmahasiswa_ibfk_3` FOREIGN KEY (`kd_ds`) REFERENCES `dosen` (`kd_ds`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`kd_ds`) REFERENCES `dosen` (`kd_ds`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

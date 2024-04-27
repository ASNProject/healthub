-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2024 at 05:07 AM
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
-- Database: `healthub_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `hearrate_data`
--

CREATE TABLE `hearrate_data` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `sensor1` int(255) NOT NULL,
  `sensor2` int(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hearrate_data`
--

INSERT INTO `hearrate_data` (`id`, `nama`, `nik`, `sensor1`, `sensor2`, `time`) VALUES
(1, 'Johny Pambudi', '123456789', 100, 150, '2024-04-26 07:57:29'),
(2, 'Johny Pambudi', '123456789', 150, 200, '2024-04-26 07:57:29'),
(3, 'Yeyep', '987654321', 90, 78, '2024-04-26 07:58:09'),
(4, 'Yeyep', '987654321', 56, 78, '2024-04-26 07:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `monitoring_data`
--

CREATE TABLE `monitoring_data` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `sensor1` int(255) NOT NULL,
  `sensor2` int(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `monitoring_data`
--

INSERT INTO `monitoring_data` (`id`, `nama`, `nik`, `sensor1`, `sensor2`, `time`) VALUES
(1, 'Johny Pambudi', '123456789', 100, 200, '2024-04-22 02:57:29'),
(2, 'Maya Rahmaniah', '213456789', 60, 80, '2024-04-22 02:57:29'),
(3, 'Johny Pambudi', '123456789', 76, 28, '2024-04-22 03:31:10'),
(4, 'Johny Pambudi', '123456789', 32, 43, '2024-04-22 03:42:17'),
(5, 'Johny Pambudi', '123456789', 57, 64, '2024-04-22 03:49:27'),
(6, 'Yeyep', '987654321', 100, 100, '2024-04-26 04:14:27'),
(7, 'Yeyep', '987654321', 200, 200, '2024-04-26 04:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `pasien_data`
--

CREATE TABLE `pasien_data` (
  `id` int(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `berat_badan` int(255) NOT NULL,
  `tinggi_badan` int(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien_data`
--

INSERT INTO `pasien_data` (`id`, `nama_pasien`, `jenis_kelamin`, `tanggal_lahir`, `nik`, `berat_badan`, `tinggi_badan`, `pekerjaan`, `alamat`) VALUES
(1, 'Johny Pambudi', 'L', '11 Januari 2000', '123456789', 56, 167, 'Buruh', 'Yogyakarta'),
(4, 'Yeyep', 'L', '2 Januari 2000', '987654321', 88, 180, 'Ngarit', 'Kalges');

-- --------------------------------------------------------

--
-- Table structure for table `saturation_data`
--

CREATE TABLE `saturation_data` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `sensor1` int(11) NOT NULL,
  `sensor2` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saturation_data`
--

INSERT INTO `saturation_data` (`id`, `nama`, `nik`, `sensor1`, `sensor2`, `time`) VALUES
(1, 'Johny Pambudi', '123456789', 100, 200, '2024-04-26 08:12:36'),
(2, 'Johny Pambudi', '123456789', 200, 300, '2024-04-26 08:12:36'),
(3, 'Yeyep', '987654321', 10, 20, '2024-04-26 08:13:14'),
(4, 'Yeyep', '987654321', 20, 30, '2024-04-26 08:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `suhu_data`
--

CREATE TABLE `suhu_data` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `sensor1` int(11) NOT NULL,
  `sensor2` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suhu_data`
--

INSERT INTO `suhu_data` (`id`, `nama`, `nik`, `sensor1`, `sensor2`, `time`) VALUES
(1, 'Johny Pambudi', '123456789', 19, 29, '2024-04-26 08:14:56'),
(2, 'Johny Pambudi', '123456789', 37, 47, '2024-04-26 08:14:56'),
(3, 'Yeyep', '987654321', 46, 23, '2024-04-26 08:15:35'),
(4, 'Yeyep', '987654321', 39, 50, '2024-04-26 08:15:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hearrate_data`
--
ALTER TABLE `hearrate_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monitoring_data`
--
ALTER TABLE `monitoring_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien_data`
--
ALTER TABLE `pasien_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saturation_data`
--
ALTER TABLE `saturation_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suhu_data`
--
ALTER TABLE `suhu_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hearrate_data`
--
ALTER TABLE `hearrate_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `monitoring_data`
--
ALTER TABLE `monitoring_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pasien_data`
--
ALTER TABLE `pasien_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `saturation_data`
--
ALTER TABLE `saturation_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suhu_data`
--
ALTER TABLE `suhu_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

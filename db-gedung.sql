-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2022 at 02:41 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-gedung`
--

-- --------------------------------------------------------

--
-- Table structure for table `gedung`
--

CREATE TABLE `gedung` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `harga` int NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`id`, `nama`, `gambar`, `alamat`, `harga`, `status`) VALUES
(1, 'gedung 1 ', 'jason-hafso-YypTXBPF5S4-unsplash.jpg', 'Kabupaten', 100000, 1),
(4, 'gedung', 'sidekix-media-WgkA3CSFrjc-unsplash.jpg', 'gedung', 5000000, 1),
(7, 'gedung baru', 'gedung.jpeg', 'gedung baru', 800000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `list-sewa`
--

CREATE TABLE `list-sewa` (
  `id` int NOT NULL,
  `userId` int DEFAULT NULL,
  `gedungId` int DEFAULT NULL,
  `tanggalMulai` date NOT NULL,
  `tanggalselesai` date NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `list-sewa`
--

INSERT INTO `list-sewa` (`id`, `userId`, `gedungId`, `tanggalMulai`, `tanggalselesai`, `status`) VALUES
(18, 1, 1, '2022-12-09', '2022-12-10', 1),
(19, 3, 4, '2022-12-09', '2022-12-10', 1),
(20, 6, NULL, '2022-12-10', '2022-12-09', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hp` int NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `hp`, `alamat`, `jk`, `role`) VALUES
(1, 'admin', 'admin', 'admin', 8523453, 'admin', 'admin', 1),
(3, 'user', 'user', 'user', 2346598, 'Jalan Palem Desa Bangsri 2, RT.2/RW.4, Bangsri, Nglegok ( pak eko krupuk ) , KAB. BLITAR, NGLEGOK, JAWA TIMUR, ID, 66181', 'Laki-Laki', 0),
(4, 'user2', 'user2', 'user2', 12345, 'kota', 'Perempuan', 0),
(5, 'userku', 'userku', 'userku', 34523, 'userku', 'Laki-Laki', 0),
(6, 'usertest', 'usertest', 'usertest', 324534, 'usertest', 'Laki-Laki', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list-sewa`
--
ALTER TABLE `list-sewa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `list-sewa_ibfk_1` (`gedungId`),
  ADD KEY `list-sewa_ibfk_2` (`userId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `list-sewa`
--
ALTER TABLE `list-sewa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `list-sewa`
--
ALTER TABLE `list-sewa`
  ADD CONSTRAINT `list-sewa_ibfk_1` FOREIGN KEY (`gedungId`) REFERENCES `gedung` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `list-sewa_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

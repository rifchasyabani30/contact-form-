-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2024 at 05:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`username`, `password`) VALUES
('rifcha', 'a407816d1a83a95e28ecdd00d295f232'),
('Admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Nama` varchar(255) NOT NULL,
  `Nim` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Kelas` varchar(20) NOT NULL,
  `Gender` enum('P','L') NOT NULL,
  `Saran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Nama`, `Nim`, `Email`, `Kelas`, `Gender`, `Saran`) VALUES
('Rifcha', '233140707111022', 'rifcha@gmail.com', 'T3G', 'P', 'bismillah'),
('Rifcha', '233140707111022', 'rifcha@gmail.com', 'T3G', 'P', 'sdsd'),
('Rifcha', '233140707111022', 'rifcha@gmail.com', 'T3G', 'P', 'sdsdsd'),
('Ghaitsa', '24567819372189', 'ghaitsa@gmail.com', 'T1G', '', 'Keren'),
('Rifcha', '24567819372189', 'rifcha@gmail.com', 'T1G', '', 'VOKASI'),
('Ghaitsa', '24567819372189', 'ghaitsa@gmail.com', 'T1G', 'L', 'VOKASI'),
('queen', '446547567434232', 'rifcha@gmail.com', 'T1G', 'P', 'SATU'),
('Riri', '365927247012840', 'rifcha@gmail.com', 'T1G', 'P', 'rawrrr'),
('kiko', '1234567865', 'ghaitsa@gmail.com', 'T3G', 'L', 'rawr'),
('ripki', '446547567434232', 'rifcha@gmail.com', 'T3G', 'L', 'vhgdhduyf');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

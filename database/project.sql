-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2020 at 03:48 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wif2003`
--

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `idproject` int(11) NOT NULL,
  `nameproject` longtext NOT NULL,
  `desproject` longtext NOT NULL,
  `amountvolunteer` double NOT NULL,
  `imgproject` longtext NOT NULL,
  `imguniqname` longtext NOT NULL,
  `orderproject` longtext NOT NULL,
  `username` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`idproject`, `nameproject`, `desproject`, `amountvolunteer`, `imgproject`, `imguniqname`, `orderproject`, `username`) VALUES
(40, 'Art amazing', 'yu', 67, '44758116271_6c83e21f76_o.jpg', '44758116271_6c83e21f76_o.jpg.5edc99a2ae4955.46341501.jpg', '1', 'er'),
(41, 'test', 'uiui', 87, '127262_original_3000x3000.jpg', '127262_original_3000x3000.jpg.5edcdb1cdac168.20968012.jpg', '2', 'bau'),
(42, 'elwin', 'anime rocks', 56, 'YANDERE-34d55499-1e36-4dcb-9c03-3f5cc8b8034b_ANIME_ILLUST.jpg', 'YANDERE-34d55499-1e36-4dcb-9c03-3f5cc8b8034b_ANIME_ILLUST.jpg.5edcdbb5e6ffc2.26823446.jpg', '3', 'E-NoN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`idproject`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `idproject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

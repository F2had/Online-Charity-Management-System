-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2020 at 01:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`idproject`, `nameproject`, `desproject`, `amountvolunteer`, `imgproject`, `imguniqname`, `orderproject`, `sdate`, `edate`, `userID`) VALUES
(41, 'test', 'uiui', 87, '127262_original_3000x3000.jpg', '127262_original_3000x3000.jpg.5edcdb1cdac168.20968012.jpg', '1', '2020-06-10', '2020-06-16', 1),
(47, 'i need human', 'human is needed', 100, '20200510_111230.jpg', '20200510_111230.jpg.5ede04f39101d4.30647547.jpg', '2', '2020-06-10', '2020-06-25', 3),
(60, 'Art amazing', 'ere', 12, '657227.jpg', '657227.jpg.5edfe95797e6c5.56161237.jpg', '3', '2020-06-10', '2020-06-16', 2),
(62, 'Art amazingss', 'eresss', 124, '657227.jpg', '657227.jpg.5edfea3b7308f6.72057859.jpg', '4', '2020-06-11', '2020-06-19', 2),
(63, 'elwinvon', 'er', 23, '1.jpg', '1.jpg.5ee0837cc89c17.25022958.jpg', '5', '2020-06-10', '2020-06-11', 2),
(64, 'gabriel haram', 'gabriel halo like aniem', 12, '1.jpg', '1.jpg.5ee0d0f3a8bc55.20659718.jpg', '6', '2020-06-09', '2020-06-10', 2),
(65, 'testing', 'test', 12, '789423.png', '789423.png.5ee100a0b7e502.65725286.png', '7', '2020-06-10', '2020-06-13', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` tinytext NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `email`, `password`, `name`) VALUES
(1, 'Fahad', 'fahad.ali.331@gmail.com', '$2y$10$p/73nGJhBK/rXh7KXRqlz.a6slEumSmu6IqJfc/E2P0Vdlps0PPiS', 'Fahad Ali'),
(2, 'niwle', 'elwin.ev0407@gmail.com', '$2y$10$rhJSZ8H5gX5gz1Td.bkahuOlEUpyktpO7n2/ddsMXLPKYDT2ZGOSS', 'Elwin Von'),
(3, 'iliacrit', 'blabla@gmail.com', '$2y$10$/ROUA8a4JZNQhrR.SnMhbuEa92naOciSTfcfMd5lTORe7ziI1NTYe', 'elvina'),
(4, 'omar', 'wif180718@siswmail.um.edu.my', '$2y$10$AdhCWpLsCftvEe3WsnDuQuaDyVQ35JzgQsb0O5PBSeY9NkOV2W4kC', 'Omar');

-- --------------------------------------------------------

--
-- Table structure for table `VOLUNTEER`
--

CREATE TABLE `VOLUNTEER` (
  `Name` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Email` varchar(255) NOT NULL,
  `IdentityCard` int(15) NOT NULL,
  `Occupation` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Address2` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Zip` varchar(50) NOT NULL,
  `ContactNumber` int(15) NOT NULL,
  `Skills` varchar(50) NOT NULL,
  `HowHelp` varchar(50) NOT NULL,
  `Offences` varchar(50) NOT NULL,
  `MedicalIssues` varchar(50) NOT NULL,
  `Risk` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `VOLUNTEER`
--

INSERT INTO `VOLUNTEER` (`Name`, `DOB`, `Email`, `IdentityCard`, `Occupation`, `Address`, `Address2`, `City`, `State`, `Zip`, `ContactNumber`, `Skills`, `HowHelp`, `Offences`, `MedicalIssues`, `Risk`, `id`) VALUES
('Omar', '1990-08-19', 'asdasd@gmail.com', 312314, 'Student', 'sdfsdf', 'sdknds', 'Egypt', 'Kedah', '50603', 312123, 'Editorial & Writing', 'both', 'Yes', 'Yes', 'High', 61),
('aymaaan', '2000-07-18', 'sdba@gmail.com', 321234312, 'jbvansdjv', 'dskvlvnas', 'dksln', 'sdlkn', 'Kuala Lumpur', '213234', 342, 'Accounting', 'both', 'No', 'No', 'None', 62),
('Armani', '2000-02-03', 'armani@yahoo.com', 794650, 'Employee', 'Pantai Hill Park', 'Near Uni Malaya', 'Kuala Lumpur', 'Kuala Lumpur', '50612', 1111349687, 'Accounting', 'both', 'Yes', 'No', 'Depends', 63);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`idproject`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `VOLUNTEER`
--
ALTER TABLE `VOLUNTEER`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD UNIQUE KEY `Email` (`Email`,`IdentityCard`,`ContactNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `idproject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `VOLUNTEER`
--
ALTER TABLE `VOLUNTEER`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 11, 2020 at 09:32 PM
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
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`idproject`, `nameproject`, `desproject`, `amountvolunteer`, `imgproject`, `imguniqname`, `orderproject`, `userID`) VALUES
(40, 'Art ', 'yu', 67, '44758116271_6c83e21f76_o.jpg', '44758116271_6c83e21f76_o.jpg.5edc99a2ae4955.46341501.jpg', '1', 2),
(41, 'test', 'uiui', 87, '127262_original_3000x3000.jpg', '127262_original_3000x3000.jpg.5edcdb1cdac168.20968012.jpg', '2', 1),
(47, 'i need human', 'human is needed', 100, '20200510_111230.jpg', '20200510_111230.jpg.5ede04f39101d4.30647547.jpg', '3', 3),
(48, 'anime ', 'anime is life', 4, '657227.jpg', '657227.jpg.5ede3685bdfec2.35341238.jpg', '4', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` tinytext NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `img` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `email`, `password`, `name`, `img`) VALUES
(1, 'Fahad', 'fahad.ali.331@gmail.com', '$2y$10$u9sty4icifLX.u3iswDkjO0BQsEwiUGJj1kPUiqlMWCOmkk9OK90K', 'Fahad Ali', ''),
(2, 'niwle', 'elwin.ev0407@gmail.com', '$2y$10$rhJSZ8H5gX5gz1Td.bkahuOlEUpyktpO7n2/ddsMXLPKYDT2ZGOSS', 'Elwin Von', ''),
(3, 'iliacrit', 'blabla@gmail.com', '$2y$10$bM5xyuDg/bawGMw8crjLLOiYVvsNnW7Dc2am1KWfdjU9rgMFssACy', 'elvina', '');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `idproject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 04, 2023 at 09:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservify`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(30) NOT NULL,
  `uName` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `uName`, `email`, `password`, `userid`) VALUES
('Thakshila', 'thakshi@1', 'thakshila@gmail.com', 'thakshi@1', 1),
('', '', '', '', 2),
('nimendr', 'nmdra', 'nimendra@gmail.com', '1234', 3),
('lslsls', 'aaks', 'ksskks', '1234', 4),
('lslsls', 'aaks', 'ksskks', '1234', 5),
('gayashan', 'sayuri', 'ksksk', '1234', 6),
('ga8@yashan', 'sayu@3ri', 'ksksk', '8686', 7),
('ga8@yashan', 'sayu@3ri', 'ksksk@gmail', '8686', 8),
('ga8@yashan', 'sayu@3ri', 'ksksk@gmail', '344', 9),
('ga8@yashan', 'sayu@3ri', 'ksksk@gmail', '344', 10),
('ga8@yashan', 'sayu@3ri', 'ksksk@gmail', '344', 11),
('kdjk', 'sjdldj', 'dlsjkdjl', '1234', 12),
('dklskl', 'skdl', 'ksdjks', '4898', 13),
('dilshan', 'dil', 'dilshan@gmail.com', '1234dk', 14),
('aweesha', 'awee', 'awee@gmail.com', 'awee1', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

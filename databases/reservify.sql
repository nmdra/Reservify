-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 09, 2023 at 08:46 AM
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
-- Table structure for table `Hotel`
--

CREATE TABLE `Hotel` (
  `hid` varchar(8) NOT NULL,
  `hName` varchar(40) NOT NULL DEFAULT 'hotel',
  `hDescription` text NOT NULL,
  `imgname` varchar(100) DEFAULT 'null.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Hotel`
--

INSERT INTO `Hotel` (`hid`, `hName`, `hDescription`, `imgname`) VALUES
('H0000001', 'Amora Resort', 'Experience unparalleled luxury and tranquility at Amora Resort. Nestled on the picturesque shores of Negombo, our resort offers a perfect blend of modern comfort and natural beauty. Whether you\'re looking for a relaxing beachfront getaway or an adventurous water sports experience, Amora Resort has it all. Our well-appointed rooms, delectable dining options, and attentive service ensure a memorable stay. Discover the true essence of tropical paradise at Amora Resort', 'img1.jpg'),
('H0000002', 'Oceanview Paradise', 'Escape to Oceanview Paradise, where your dream vacation awaits. Situated along the pristine coastline of Galle, Sri Lanka, our hotel offers breathtaking views of the Indian Ocean and an oasis of serenity.Our luxurious rooms and suites are designed to provide the utmost comfort and style. Whether you\'re lounging by the infinity pool, indulging in culinary delights at our oceanfront restaurant, or enjoying a spa treatment with the sound of waves in the background, Oceanview Paradise promises an unforgettable experience.For the adventurous traveler, explore nearby historic sites, embark on a whale-watching excursion, or simply stroll along the golden sands of our private beach.At Oceanview Paradise, every moment is a journey of relaxation and discovery. Come, unwind, and create lasting memories in this coastal haven.', 'img3.jpg'),
('H0000003', 'Sunset Oasis Resort', 'Sunset Oasis Resort is a luxurious beachfront escape nestled along the pristine shores of a secluded tropical island. With its palm-fringed white sand beaches and crystal-clear turquoise waters, this resort offers the perfect setting for a romantic getaway or a family vacation. Guests can indulge in spa treatments, savor gourmet cuisine, and enjoy water sports while basking in the breathtaking sunset views.', 'img4.avif'),
('H0000004', 'Mountain View Resort', 'Tucked away in the heart of the picturesque alpine wilderness, Mountain View Lodge is a charming retreat for nature enthusiasts. Surrounded by towering pine trees and majestic mountain peaks, this cozy lodge provides comfortable accommodations, hiking trails, and access to outdoor adventures year-round. Whether you\'re seeking tranquility or outdoor excitement, Mountain View Lodge has it all.', 'img2.jpg'),
('H0000005', 'Serenity Springs', 'Serenity Springs Retreat is a secluded eco-friendly haven nestled in a lush forest. Designed for those seeking a digital detox and a reconnection with nature, this retreat offers cozy cabins with private hot tubs, guided meditation sessions, and hiking trails. Guests can unwind in a serene environment, listen to the sounds of the forest, and rejuvenate their mind, body, and soul.', 'img5.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `hid` varchar(8) NOT NULL,
  `pkgname` varchar(20) DEFAULT NULL,
  `pkgprice` decimal(10,2) DEFAULT 0.00,
  `pkgid` varchar(8) NOT NULL,
  `pkgimg` varchar(30) NOT NULL DEFAULT 'null.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`hid`, `pkgname`, `pkgprice`, `pkgid`, `pkgimg`) VALUES
('H0000001', 'Delux Package', 250.00, 'PKG00001', 'null.jpeg'),
('H0000002', 'Deluxe', 250.00, 'PKG00002', 'null.jpeg'),
('H0000002', 'Premium', 150.00, 'PKG00003', 'null.jpeg'),
('H0000002', 'Deluxe', 100.00, 'PKG00004', 'null.jpeg'),
('H0000002', 'Premium', 200.00, 'PKG00005', 'null.jpeg'),
('H0000003', 'Deluxe', 200.00, 'PKG00002', 'null.jpeg'),
('H0000003', 'Premium', 200.00, 'PKG00003', 'null.jpeg'),
('H0000003', 'Deluxe', 200.00, 'PKG00004', 'null.jpeg'),
('H0000004', 'Deluxe', 200.00, 'PKG00002', 'null.jpeg'),
('H0000004', 'Premium', 200.00, 'PKG00005', 'null.jpeg'),
('H0000005', 'Premium', 200.00, 'PKG00003', 'null.jpeg'),
('H0000005', 'Deluxe', 200.00, 'PKG00004', 'null.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `uName` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uName`, `name`, `email`, `password`, `role`) VALUES
(1, 'admin', 'jay', 'jay@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Admin'),
(3, 'gay', 'gayshan', 'gay@gay', '0ec09ef9836da03f1add21e3ef607627e687e790', 'User'),
(4, 'test', 'test', 'test', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'User'),
(6, 'ksk', 'kskk kskkskk', 'skk', '356a192b7913b04c54574d18c28d46e6395428ab', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Hotel`
--
ALTER TABLE `Hotel`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`hid`,`pkgid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

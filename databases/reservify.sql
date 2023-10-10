-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 10, 2023 at 09:18 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Admin1', 'admin1@example.com', 'password1'),
(2, 'Admin2', 'admin2@example.com', 'password2'),
(3, 'Admin3', 'admin3@example.com', 'password3');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT 'default.jpg',
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_name`, `description`, `image`, `owner_id`) VALUES
(1, 'Amora Resort', 'Experience unparalleled luxury and tranquility at Amora Resort. Nestled on the picturesque shores of Negombo, our resort offers a perfect blend of modern comfort and natural beauty. Whether you\'re looking for a relaxing beachfront getaway or an adventurous water sports experience, Amora Resort has it all. Our well-appointed rooms, delectable dining options, and attentive service ensure a memorable stay. Discover the true essence of tropical paradise at Amora Resort', 'img1.jpg', 1),
(2, 'Oceanview Paradise', 'Escape to Oceanview Paradise, where your dream vacation awaits. Situated along the pristine coastline of Galle, Sri Lanka, our hotel offers breathtaking views of the Indian Ocean and an oasis of serenity.Our luxurious rooms and suites are designed to provide the utmost comfort and style. Whether you\'re lounging by the infinity pool, indulging in culinary delights at our oceanfront restaurant, or enjoying a spa treatment with the sound of waves in the background, Oceanview Paradise promises an unforgettable experience.For the adventurous traveler, explore nearby historic sites, embark on a whale-watching excursion, or simply stroll along the golden sands of our private beach.At Oceanview Paradise, every moment is a journey of relaxation and discovery. Come, unwind, and create lasting memories in this coastal haven.', 'img3.jpg', 2),
(3, 'Sunset Oasis Resort', 'Sunset Oasis Resort is a luxurious beachfront escape nestled along the pristine shores of a secluded tropical island. With its palm-fringed white sand beaches and crystal-clear turquoise waters, this resort offers the perfect setting for a romantic getaway or a family vacation. Guests can indulge in spa treatments, savor gourmet cuisine, and enjoy water sports while basking in the breathtaking sunset views.', 'img4.avif', 2),
(4, 'Mountain View Resort', 'Tucked away in the heart of the picturesque alpine wilderness, Mountain View Lodge is a charming retreat for nature enthusiasts. Surrounded by towering pine trees and majestic mountain peaks, this cozy lodge provides comfortable accommodations, hiking trails, and access to outdoor adventures year-round. Whether you\'re seeking tranquility or outdoor excitement, Mountain View Lodge has it all.', 'img2.jpg', 3),
(5, 'Serenity Springs', 'Serenity Springs Retreat is a secluded eco-friendly haven nestled in a lush forest. Designed for those seeking a digital detox and a reconnection with nature, this retreat offers cozy cabins with private hot tubs, guided meditation sessions, and hiking trails. Guests can unwind in a serene environment, listen to the sounds of the forest, and rejuvenate their mind, body, and soul.', 'img5.jpeg', 3),
(6, 'Galadari', 'Galadari Hotel, traded as Galadari Hotels (Lanka) PLC, is a five-star luxury hotel in Colombo, Sri Lanka. Emirati conglomerate, Galadari Brothers are the controlling shareholders of the hotel company. The hotel commenced operations in 1984.', 'img5.jpeg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_owner`
--

CREATE TABLE `hotel_owner` (
  `owner_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hotel_owner`
--

INSERT INTO `hotel_owner` (`owner_id`, `username`, `name`, `email`, `password`) VALUES
(1, 'Owner', 'pam', 'pam@example.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(2, 'Owner1', 'owner', 'owner1@example.com', 'password1'),
(3, 'Owner2', 'owner', 'owner2@example.com', 'password2'),
(4, 'Owner3', 'owner', 'owner3@example.com', 'password3');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `image` varchar(100) DEFAULT 'null.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_name`, `price`, `hotel_id`, `image`) VALUES
(1, 'Delux Package', 250.00, 1, 'null.jpeg'),
(2, 'Deluxe', 250.00, 2, 'null.jpeg'),
(3, 'Premium', 150.00, 2, 'null.jpeg'),
(4, 'Deluxe', 100.00, 2, 'null.jpeg'),
(5, 'Premium', 200.00, 2, 'null.jpeg'),
(6, 'Deluxe', 200.00, 3, 'null.jpeg'),
(7, 'Premium', 200.00, 3, 'null.jpeg'),
(8, 'Deluxe', 200.00, 3, 'null.jpeg'),
(9, 'Deluxe', 200.00, 4, 'null.jpeg'),
(10, 'Premium', 200.00, 4, 'null.jpeg'),
(11, 'Premium', 200.00, 5, 'null.jpeg'),
(12, 'Deluxe', 200.00, 5, 'null.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `reserve_id` int(11) NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `special_requirements` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `name`, `email`, `password`) VALUES
(1, 'awee', 'aweesha', 'aweesha@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(2, 'dananji', 'dananji', 'dananji@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(3, 'gayashan', 'gayashan', 'gayashan@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(4, 'nmdra', 'Nimendra', 'nimendraonline@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(10, 'jim', 'Jim Halpert', 'jim@office.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`),
  ADD KEY `hotel_ibfk_1` (`owner_id`);

--
-- Indexes for table `hotel_owner`
--
ALTER TABLE `hotel_owner`
  ADD PRIMARY KEY (`owner_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`,`hotel_id`),
  ADD KEY `package_ibfk_1` (`hotel_id`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`reserve_id`),
  ADD KEY `reserve_ibfk_1` (`user_id`),
  ADD KEY `reserve_ibfk_2` (`hotel_id`),
  ADD KEY `reserve_ibfk_3` (`package_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hotel_owner`
--
ALTER TABLE `hotel_owner`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `hotel_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `hotel_owner` (`owner_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `package_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `reserve_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserve_ibfk_2` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserve_ibfk_3` FOREIGN KEY (`package_id`) REFERENCES `package` (`package_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

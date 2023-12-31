-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 16, 2023 at 05:28 PM
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
(1, 'Gayashan', 'gayashan@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d'),
(2, 'Nimendra', 'nimendraonline@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d'),
(3, 'Aweesha', 'aweeshathawishanka@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d'),
(4, 'Dhananji', 'dhananji@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d'),
(7, 'Prasadi', 'prasadi@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `msg_ID` int(11) NOT NULL,
  `sender_Name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`msg_ID`, `sender_Name`, `email`, `phone`, `message`, `status`) VALUES
(7, 'Sadun Herath', 's.herath@gmail.com', '0721222345', 'I booked a room through Reservify and upon arrival at the hotel, I found that the room did not meet my expectations. I was dissatisfied with the cleanliness and noise level in the assigned room.', 'Completed'),
(8, 'Anya Perera', 'anya22@gmail.com', '0774506772', 'Hi Reservify!', 'Pending');

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
(5, 'Serenity Springs', 'Serenity Springs Retreat is a secluded eco-friendly haven nestled in a lush forest. Designed for those seeking a digital detox and a reconnection with nature, this retreat offers cozy cabins with private hot tubs, guided meditation sessions, and hiking trails. Guests can unwind in a serene environment, listen to the sounds of the forest, and rejuvenate their mind, body, and soul.', 'img5.jpg', 3),
(10, 'JetWing Blu', 'Jetwing Blue is a new addition to our upscale collection of Sri Lankan beach hotels, located in Negombo on the sunny northwestern coastline. Negombo is a well-loved seaside destination with beautiful sandy shores, and this hotel continues our tradition of providing legendary Sri Lankan hospitality to guests from around the world.', 'JetWing Blu.jpg', 10);

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
(1, 'Gayashan', 'Gayashan', 'gayashan@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d'),
(2, 'Dhananji', 'Dhananji', 'dhananji@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d'),
(3, 'Nimendra', 'Nimendra', 'nimendraonline@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d'),
(4, 'Aweesha', 'Aweesha', 'aweeshathawishanka@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d'),
(10, 'Anoj', 'Anoj', 'anoj@jetwing.com', '7c222fb2927d828af22f592134e8932480637c0d'),
(12, 'Prasadi', 'Prasadi', 'prasadi@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d');

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
(32, 'Family Fun', 499.00, 1, 'family.jpg'),
(33, 'Beachfront Bliss', 1100.00, 2, 'null.jpeg'),
(34, 'Surf and Stay', 999.00, 10, 'Platinum.jpg'),
(35, 'Beach Paradise', 799.00, 2, 'null.jpeg'),
(36, 'Weekend Escape', 399.00, 4, 'null.jpeg'),
(37, 'Sun, Sand, and Surf', 649.00, 3, 'null.jpeg'),
(38, 'Ocean Adventure ', 599.00, 3, 'null.jpeg'),
(39, 'Family Beach Fun', 749.00, 3, 'null.jpeg'),
(40, 'Honeymoon Bliss', 849.00, 4, 'romantic.jpg'),
(41, 'Golf Enthusiast', 1199.00, 4, 'Tournament.jpg'),
(42, 'Luxury Spa Retreat', 749.00, 10, 'spa_main.jpg'),
(43, 'Nature Experience', 499.00, 5, 'null.jpeg'),
(44, 'Island Gateway', 899.00, 10, 'Island Gateway.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `reserve_id` int(11) NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `special_requirements` text DEFAULT 'No',
  `user_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`reserve_id`, `checkin_date`, `checkout_date`, `special_requirements`, `user_id`, `hotel_id`, `package_id`) VALUES
(12, '2023-12-01', '2023-12-05', 'No-smoking room', 3, 2, 33),
(35, '2023-10-21', '2023-10-23', 'Late checkout', 25, 10, 42);

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
(3, 'Hansaja', 'Hansaja', 'hansaja@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d'),
(25, 'Nimendra', 'Nimendra', 'nimendraonline@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d'),
(26, 'Dhananji', 'Dhananji', 'dhananji@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d'),
(27, 'Aweesha', 'Aweesha', 'aweeshathawishanka@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d'),
(28, 'Prasadi', 'Prasadi', 'prasadi@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d');

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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`msg_ID`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `msg_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hotel_owner`
--
ALTER TABLE `hotel_owner`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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

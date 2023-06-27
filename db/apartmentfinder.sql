-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2022 at 11:27 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apartmentfinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE `apartments` (
  `id` int(255) NOT NULL,
  `apartment_name` varchar(255) NOT NULL,
  `apartment_photo` varchar(60) NOT NULL,
  `apartment_price` int(255) NOT NULL,
  `apartment_location` varchar(255) NOT NULL,
  `garages` int(255) NOT NULL,
  `apartment_type` varchar(255) NOT NULL,
  `bathrooms` int(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`id`, `apartment_name`, `apartment_photo`, `apartment_price`, `apartment_location`, `garages`, `apartment_type`, `bathrooms`, `status`) VALUES
(1, 'Gracius', '2057535308.jpg', 20, 'Nairobi', 4, 'Bedsitters', 2, 1),
(3, 'Wanka Complex', '999455361.jpg', 40000, 'Ruiru', 2, 'Single', 1, 1),
(5, 'Adman', '381507797.jpg', 10, 'Ruiru', 3, 'Bedsitters', 1, 1),
(6, 'Flyers', '1109760127.jpg', 10000, 'Juja', 2, 'Bedsitters', 1, 1),
(7, 'Sperian', '1595214249.jpg', 50000, 'Githurai', 2, '2 bedroom', 2, 1),
(8, 'Bugiz', '1683430792.jpg', 12000, 'Wendani', 2, '2 bedroom', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `bookdate` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `username`, `bookdate`, `email`, `Type`, `service`, `price`, `status`) VALUES
(1, 'Dayana', '2022-10-15', 'jey@gmail.com', '', 'Adman', 10, 0),
(2, 'Steve', '2022-10-16', 'stephenmungai0514@gmail.com', '', 'Sperian', 50000, 1),
(4, 'Steve', '2022-10-29', 'stephenmungai0514@gmail.com', '', 'Flyers', 10000, 0),
(6, 'Stevie', '2022-11-16', 'stephenmungai0514@gmail.com', '', 'Bugiz', 12000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `message`, `status`) VALUES
(1, 'hello everyone', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `role` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `name`, `mobile`, `email`, `password`, `status`, `role`) VALUES
(4, 'Jimmy', '0795899363', 'jey@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1, 1),
(5, 'Diana', '0112131380', 'dayanalwasa13@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 2),
(7, 'Stevie', '0795408036', 'stephenmungai0514@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 2),
(8, 'Caleb', '0795812241', 'calebmuteti4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartments`
--
ALTER TABLE `apartments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2024 at 10:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(255) NOT NULL,
  `b_address` varchar(255) NOT NULL,
  `b_city` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `b_address`, `b_city`) VALUES
(1, '11a north karachi', 1),
(2, '421 lahore', 2),
(3, '11B north karachi', 1),
(4, 'pakhtoon colony', 5),
(5, '2492 residency', 4),
(6, '789 isl unity', 3);

-- --------------------------------------------------------

--
-- Table structure for table `cagent`
--

CREATE TABLE `cagent` (
  `id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `roles` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cagent`
--

INSERT INTO `cagent` (`id`, `user_name`, `email`, `contact`, `password`, `confirm_password`, `branch`, `roles`) VALUES
(8, 'hamza12', 'hamza@Cagent.com', '0331-1228350', '123', '123', '421 lahore / Lahore', 3),
(9, 'Haider112', 'haider@Cagent.com', '0312-7723722', '123', '123', '11a north karachi / Karachi', 3);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'Karachi'),
(2, 'Lahore'),
(3, 'Islamabad'),
(4, 'Quetta'),
(5, 'Peshawar');

-- --------------------------------------------------------

--
-- Table structure for table `comp`
--

CREATE TABLE `comp` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comp`
--

INSERT INTO `comp` (`id`, `email`, `message`) VALUES
(1, 'usma@12.com', 'SASDDAS');

-- --------------------------------------------------------

--
-- Table structure for table `courier_details`
--

CREATE TABLE `courier_details` (
  `id` int(255) NOT NULL,
  `parcel` varchar(255) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_address` varchar(255) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `reciever_name` varchar(255) NOT NULL,
  `reciever_address` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `weight` int(255) NOT NULL,
  `height` int(255) NOT NULL,
  `sender_contact` varchar(255) NOT NULL,
  `tracking_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courier_details`
--

INSERT INTO `courier_details` (`id`, `parcel`, `sender_name`, `sender_address`, `sender_email`, `reciever_name`, `reciever_address`, `branch`, `weight`, `height`, `sender_contact`, `tracking_id`, `status`, `amount`, `date`) VALUES
(36, 'asfa', 'hamza1', 'b404-karachi', 'Nadir12@gmail.com', 'qqqww', 't32-karachi', '11a north karachi / Karachi', 23, 23, '0312-7723722', '3735937F-C18D-15A75786', 'On the way', 100, '2023-02-28'),
(37, 'box', 'ali123', 'b404-karachi', 'if12@gmail.com', 'qqqww', 't32-karachi', '11a north karachi / Karachi', 23, 23, '0312-7723722', 'C5CEE839-CC9F-B37F2495', 'Complete', 100, '2023-02-28'),
(39, 'wqw', 'ali123', 'b404-karachi', 'Nadir12@gmail.com', 'qqqww', 'k123-karachi', '11a north karachi / Karachi', 23, 12, '0312-7723722', '75728BD0-D250-96941133', 'Complete', 100, '2023-02-28'),
(40, 'box', 'usman', 'b40-lahore', 'hamza@gmail.com', 'faizan', 'u8-lahore', '421 lahore / Lahore', 67, 67, '0331-1228350', 'A3F53E01-7545-4347FA51', 'Complete', 100, '2023-03-01'),
(42, 'box', 'hamza1', 'b40-lahore', 'hamza1234aptechnn@gmail.com', 'faizan', 'u8-lahore', '421 lahore / Lahore', 200, 50, '0331-1228350', '8B24B203-DEBD-27397FE1', 'On the way', 200, '2023-03-10'),
(43, 'box', 'usman', 'b40-lahore', '56t6@gmail.com', 'faizan', 'u89-lahore', '421 lahore / Lahore', 21, 122, '0331-1228350', '98106BD7-AF52-222747E7', 'pending', 100, '2023-04-25'),
(44, 'box', 'ali123', 'b40-lahore', 'hamza1234.aptechnn@gmail.com', 'faizan', 'u8-lahore', '11a north karachi / Karachi', 24, 27, '0331-1228350', '4FE16311-A84D-1664FB90', 'pending', 100, '2023-06-11'),
(45, 'box', 'usman12', 'b40-lahore', 'usman67483@gmail.com', 'faizan9', 'u8-lahore', '11a north karachi / Karachi', 80, 70, '0331-1228350', '7BF7C8B0-973C-3DE6B97F', 'pending', 100, '2023-09-08'),
(46, 'box', 'Zaid123', 'b33-lkk', 'usman67483@gmail.com', 'faizan', 'u89-lahore', '11a north karachi / Karachi', 20, 20, '0331-1228350', 'C34E4A7A-A5F5-26C90CA8', 'pending', 100, '2024-04-21'),
(47, 'box', 'Zaid123', 'b33-lkk', 'usman67483@gmail.com', 'faizan9', 'u89-lahore', '11a north karachi / Karachi', 20, 10, '0331-1228350', '62E32B4D-B288-A7409F71', 'Complete', 100, '2024-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(255) NOT NULL,
  `feedbacks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `feedbacks`) VALUES
(1, 'usman is a developer'),
(2, 'asguyasdgauyfadhjasgjkasdjk'),
(3, 'sfdfdsfdsfdsfd'),
(4, 'asasdaasddas'),
(5, 'asdasdasdasdasdasd'),
(6, 'ghfgff'),
(7, 'sasadasdas'),
(8, 'XZZXZXdfs'),
(9, 'shsgwhws'),
(10, 'jhdgsadfsaydrsdsrjyastjd'),
(11, 'hi'),
(12, 'ffddf'),
(13, 'unnhhuuhuhhuuhuhuu'),
(14, '9uujjuj');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `track` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `message`, `track`, `status`) VALUES
(7, 'hamza1 ', 'ausisjksa', '3735937F-C18D-15A75786 ', 'Pending'),
(8, 'usman ', '', 'A3F53E01-7545-4347FA51 ', 'Complete'),
(9, 'ali123 ', '3 days left', '1E926034-E7EF-3EBD74E9 ', 'Complete'),
(10, 'ali123 ', '', 'C5CEE839-CC9F-B37F2495 ', 'Complete'),
(11, 'ali123 ', '', 'F3740F0E-C131-83E85F95 ', 'Complete'),
(12, 'ali123 ', '', '75728BD0-D250-96941133 ', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(255) NOT NULL,
  `roles_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roles_name`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'agent');

-- --------------------------------------------------------

--
-- Table structure for table `sign_in_up`
--

CREATE TABLE `sign_in_up` (
  `id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `roles` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sign_in_up`
--

INSERT INTO `sign_in_up` (`id`, `user_name`, `email`, `contact`, `password`, `confirm_password`, `roles`) VALUES
(1, 'Usman', 'usman67483@gmail.com', '03311288350', 'usman123', 'usman123', 1),
(2, 'Haider', '8008297@gmail.com', '03338008297', 'haider123', 'haider123', 1),
(3, 'Sana', 'sanayousuf015@gmail.com', '0123-4567890', 'sana123', 'sana123', 1),
(54, 'usman12', 'usman123@Cservice.com', '0000-0000000', '123', '123', 2),
(55, 'Zaid123', 'zaid@Cservice.com', '0000-0000000', '123', '123', 2),
(56, 'usmna123', 'usman67483@Cservice.com', '0000-0000000', '123', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_city` (`b_city`);

--
-- Indexes for table `cagent`
--
ALTER TABLE `cagent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comp`
--
ALTER TABLE `comp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courier_details`
--
ALTER TABLE `courier_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_in_up`
--
ALTER TABLE `sign_in_up`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`roles`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cagent`
--
ALTER TABLE `cagent`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comp`
--
ALTER TABLE `comp`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courier_details`
--
ALTER TABLE `courier_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sign_in_up`
--
ALTER TABLE `sign_in_up`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branch`
--
ALTER TABLE `branch`
  ADD CONSTRAINT `branch_ibfk_1` FOREIGN KEY (`b_city`) REFERENCES `city` (`id`);

--
-- Constraints for table `sign_in_up`
--
ALTER TABLE `sign_in_up`
  ADD CONSTRAINT `role` FOREIGN KEY (`roles`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2022 at 12:14 AM
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
-- Database: `detsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblexpense`
--

CREATE TABLE `tblexpense` (
  `ID` int(10) NOT NULL,
  `UserId` int(10) NOT NULL,
  `ExpenseDate` date DEFAULT NULL,
  `ExpenseItem` varchar(200) DEFAULT NULL,
  `ExpenseCost` varchar(200) DEFAULT NULL,
  `NoteDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblexpense`
--

INSERT INTO `tblexpense` (`ID`, `UserId`, `ExpenseDate`, `ExpenseItem`, `ExpenseCost`, `NoteDate`) VALUES
(2, 2, '2019-05-15', 'Vegitables', '520', '2019-05-15 10:06:19'),
(3, 2, '2019-05-15', 'Household Items', '5200', '2019-05-15 10:07:08'),
(4, 2, '2019-05-14', 'Milk', '83', '2019-05-15 10:07:27'),
(5, 2, '2019-05-14', 'Bed Sheets', '1120', '2019-05-15 10:07:49'),
(6, 2, '2019-05-12', 'Fruits', '890', '2019-05-15 10:08:09'),
(7, 2, '2019-05-10', 'Household Items', '5600', '2019-05-15 10:08:26'),
(8, 2, '2019-04-24', 'Milk', '102', '2019-05-15 10:08:44'),
(9, 2, '2019-05-08', 'Bed Sheets', '890', '2019-05-15 10:08:57'),
(10, 2, '2018-12-19', 'Household Items', '1120', '2019-05-15 10:09:34'),
(11, 2, '2018-12-19', 'Fruits', '560', '2019-05-15 10:09:52'),
(13, 2, '2018-12-20', 'Tour of Manali', '30000', '2019-05-15 10:15:47'),
(14, 2, '2019-05-14', 'Milk', '360', '2019-05-15 10:21:31'),
(15, 3, '2019-05-15', 'Milk', '123', '2019-05-15 10:29:56'),
(16, 3, '2019-05-15', 'Household Items', '360', '2019-05-15 10:30:06'),
(17, 3, '2019-05-15', 'Bed Sheets', '3000', '2019-05-15 10:30:18'),
(18, 3, '2019-05-07', 'Milk', '123', '2019-05-15 10:30:28'),
(19, 3, '2019-05-14', 'Household Items', '3600', '2019-05-15 10:30:38'),
(20, 2, '2019-05-14', 'Electric Board Extension', '300', '2019-05-15 15:11:33'),
(21, 2, '2019-04-11', 'Milk', '123', '2019-05-15 17:50:24'),
(22, 2, '2019-04-10', 'Household Items', '520', '2019-05-15 17:50:37'),
(23, 2, '2019-05-16', 'Household Items', '360', '2019-05-16 07:29:54'),
(25, 8, '2019-05-17', 'Milk', '3600', '2019-05-17 05:35:13'),
(26, 8, '2019-05-16', 'Bed Sheets', '1025', '2019-05-17 05:35:42'),
(27, 1, '2019-05-17', 'Computer Mouse', '500', '2019-05-18 05:19:05'),
(30, 1, '2019-05-18', 'Milk + Bread', '80', '2019-05-18 05:22:01'),
(31, 12, '2020-03-12', 'Computer Mouse', '500', '2020-03-19 05:35:45'),
(32, 12, '2020-04-27', 'Milk+Bread', '80', '2020-04-26 18:30:00'),
(33, 12, '2020-04-28', 'Room Rent', '10000', '2020-04-28 05:36:26'),
(38, 12, '2020-04-29', 'Bread', '35', '2020-04-29 14:51:20'),
(39, 12, '2020-04-30', 'Milk', '45', '2020-04-30 09:44:35'),
(63, 13, '2022-12-01', 'Sabun', '10', '2022-07-23 02:32:18'),
(64, 13, '2022-12-10', 'Sabun', '20', '2022-07-23 17:36:20'),
(65, 13, '2022-12-10', 'Sabun', '20', '2022-07-23 17:36:23'),
(66, 13, '2022-07-23', 'Paneer', '200', '2022-07-23 18:11:24'),
(67, 13, '2022-07-23', 'Paneer', '200', '2022-07-23 18:11:28'),
(68, 13, '2022-07-23', 'Paneer', '200', '2022-07-23 18:11:29'),
(69, 2, '2022-07-25', 'milk', '100', '2022-07-25 18:26:31'),
(70, 2, '2022-07-26', 'manchuriyan', '200', '2022-07-26 16:56:40'),
(71, 2, '2022-07-25', 'AMul', '50', '2022-07-26 17:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(150) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FullName`, `Email`, `MobileNumber`, `Password`, `RegDate`) VALUES
(1, 'Rajeshwari', 'raj@gmail.com', 5655555655, '202cb962ac59075b964b07152d234b70', '2019-05-15 08:52:27'),
(2, 'Meenakhi', 'meena@gmail.com', 8989898897, 'e10adc3949ba59abbe56e057f20f883e', '2019-05-15 08:52:27'),
(3, 'Khusbu', 'khusi@gmail.com', 5645798897, '202cb962ac59075b964b07152d234b70', '2019-05-15 08:52:27'),
(4, 'Shantanu Bhardwaj', 'shan@gmail.com', 7895641236, '202cb962ac59075b964b07152d234b70', '2019-05-17 05:13:23'),
(8, 'Test', 'test@gmail.com', 5656556565, '202cb962ac59075b964b07152d234b70', '2019-05-17 05:34:16'),
(9, 'Anuj kumar', 'phpgurukulofficial@gmail.com', 1234567890, 'f925916e2754e5e03f75dd58a5733251', '2019-05-18 05:31:47'),
(10, 'Test User demo', 'testuser@gmail.com', 987654321, 'f925916e2754e5e03f75dd58a5733251', '2019-05-18 05:34:53'),
(11, 'Anujkumar', 'Anujk@gmail.com', 1234567890, 'f925916e2754e5e03f75dd58a5733251', '2020-04-26 18:31:00'),
(12, 'Anuj', 'test@test.com', 1234567890, 'f925916e2754e5e03f75dd58a5733251', '2020-04-28 12:32:14'),
(13, 'Shahid  Raghu', 'sajid@gmail.com', 7065221377, 'e10adc3949ba59abbe56e057f20f883e', '2022-07-21 14:30:53'),
(17, 'Krishna', 'krishna@gmail.com', 7065221377, 'e10adc3949ba59abbe56e057f20f883e', '2022-07-21 14:37:44'),
(18, 'Krishna', 'krishna@gmail.com', 7065221377, 'e10adc3949ba59abbe56e057f20f883e', '2022-07-21 14:37:56'),
(19, 'Krishna', 'krishna@gmail.com', 7065221377, 'e10adc3949ba59abbe56e057f20f883e', '2022-07-21 14:50:26'),
(20, NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', '2022-07-24 15:32:14'),
(21, NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', '2022-07-24 15:38:39'),
(22, NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', '2022-07-24 15:40:32'),
(23, NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', '2022-07-24 15:46:31'),
(24, NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', '2022-07-24 15:46:46'),
(25, NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', '2022-07-24 15:46:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblexpense`
--
ALTER TABLE `tblexpense`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblexpense`
--
ALTER TABLE `tblexpense`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

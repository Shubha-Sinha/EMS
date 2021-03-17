-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 16, 2021 at 07:41 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply_leave`
--

CREATE TABLE `apply_leave` (
  `apply_id` int(11) NOT NULL,
  `apply_l_from` text NOT NULL,
  `apply_l_to` text NOT NULL,
  `apply_paid` varchar(11) NOT NULL DEFAULT '0',
  `apply_medical` varchar(11) NOT NULL DEFAULT '0',
  `apply_casual` varchar(11) NOT NULL DEFAULT '0',
  `apply_by` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `apply_date&time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apply_leave`
--

INSERT INTO `apply_leave` (`apply_id`, `apply_l_from`, `apply_l_to`, `apply_paid`, `apply_medical`, `apply_casual`, `apply_by`, `status`, `apply_date&time`) VALUES
(8, '11-02-2021', '12-02-2021', '', '1', '', 3, 'Approved', '2021-02-11 16:54:29'),
(9, '18-02-2021', '20-02-2021', '3', '', '', 3, 'Approved', '2021-02-11 16:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `assign_leave`
--

CREATE TABLE `assign_leave` (
  `leave_id` int(11) NOT NULL,
  `l_from` varchar(100) NOT NULL,
  `l_to` varchar(100) NOT NULL,
  `paid` int(11) NOT NULL,
  `medical` int(11) NOT NULL,
  `casual` int(11) NOT NULL,
  `assign_to` int(11) NOT NULL,
  `assigned_by` varchar(100) NOT NULL,
  `date&time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_leave`
--

INSERT INTO `assign_leave` (`leave_id`, `l_from`, `l_to`, `paid`, `medical`, `casual`, `assign_to`, `assigned_by`, `date&time`) VALUES
(4, '09-02-2021', '09-02-2022', 12, 36, 24, 3, ' admin ', '2021-02-09 15:49:14'),
(5, '09-02-2021', '09-02-2022', 12, 36, 24, 5, ' admin ', '2021-02-09 15:49:14'),
(6, '09-02-2021', '09-02-2022', 12, 36, 24, 6, ' admin ', '2021-02-09 15:49:15');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `reply_id` int(11) NOT NULL,
  `reply` text NOT NULL,
  `taskId` int(11) NOT NULL,
  `reply_by` int(11) NOT NULL,
  `date&time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`reply_id`, `reply`, `taskId`, `reply_by`, `date&time`) VALUES
(1, 'done. ', 1, 3, '2021-02-06 09:38:13'),
(2, 'i will send it after 30 min. ', 7, 3, '2021-02-06 09:40:55'),
(3, 'check your mail. ', 7, 3, '2021-02-06 10:14:32'),
(4, 'okk ', 4, 3, '2021-02-06 10:32:55'),
(5, 'ok ', 2, 2, '2021-02-06 14:03:10'),
(6, 'is it f9. ', 7, 3, '2021-02-06 16:28:59'),
(7, 'good work ', 7, 8, '2021-02-06 16:29:32'),
(8, 'okkkkkkkkkkkkkkkkkkkkkkk ', 7, 3, '2021-02-06 16:37:37'),
(9, 'qqqqqqqqqqqqqqq ', 7, 8, '2021-02-06 16:38:04'),
(10, 'aaaaaaaaaaaaaaaaaaaaa ', 7, 3, '2021-02-06 16:38:27'),
(11, 'bbbbbbbbb ', 7, 8, '2021-02-06 16:38:49'),
(12, 'ggg ', 1, 3, '2021-02-06 16:43:18'),
(13, 'ff ', 1, 8, '2021-02-06 16:44:16'),
(14, 'tttt ', 7, 2, '2021-02-06 16:45:36');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `t_id` int(11) NOT NULL,
  `task` text NOT NULL,
  `id` int(11) NOT NULL,
  `assigned_by` varchar(100) NOT NULL,
  `date&time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`t_id`, `task`, `id`, `assigned_by`, `date&time`) VALUES
(1, 'do task.', 3, ' admin ', '2021-02-03 13:47:52'),
(2, 'do task.', 6, ' admin ', '2021-02-03 13:47:53'),
(3, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. ', 6, ' admin ', '2021-02-03 15:59:27'),
(4, 'do this.', 3, ' admin ', '2021-02-03 16:02:17'),
(5, 'make this..', 5, ' admin ', '2021-02-03 16:03:29'),
(6, 'aggg', 5, ' admin ', '2021-02-03 16:21:14'),
(7, 'send me the project report', 3, ' Priyanka ', '2021-02-04 12:51:18');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `password` varchar(100) NOT NULL,
  `department` varchar(25) NOT NULL,
  `Role` varchar(15) NOT NULL,
  `Date&Time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `gender`, `password`, `department`, `Role`, `Date&Time`) VALUES
(2, 'shubha sinha', 'admin', 'sinha77@gmail.com', 'male', '63a9f0ea7bb98050796b649e85481845', 'developer', 'admin', '2021-02-01 17:27:16'),
(3, 'Liza chakraborty', 'liza', 'liza@yahoo.in', 'female', '24f6e3dc1bbc5a5dfb1e5c6481b94eb7', 'tester', 'employee', '2021-02-01 17:39:39'),
(5, 'Apurba Sen', 'Apurba', 'sen@ymail.com', 'male', 'ef27a528e759ac2c54890cc7bfd2e6b8', 'seo', 'employee', '2021-02-02 19:37:10'),
(6, 'Shaumik Mitra', 'Shaumik', 'Shaumik@gmail.com', 'male', 'd9b1d7db4cd6e70935368a1efb10e377', 'tester', 'employee', '2021-02-02 19:38:50'),
(8, 'Priyanka Das', 'Priyanka', 'Priyanka@yahoo.in', 'female', '1fd96777aedeadb325c66f3780054765', 'tester', 'admin', '2021-02-03 16:25:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply_leave`
--
ALTER TABLE `apply_leave`
  ADD PRIMARY KEY (`apply_id`);

--
-- Indexes for table `assign_leave`
--
ALTER TABLE `assign_leave`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply_leave`
--
ALTER TABLE `apply_leave`
  MODIFY `apply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `assign_leave`
--
ALTER TABLE `assign_leave`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 09, 2021 at 04:34 PM
-- Server version: 5.7.36-0ubuntu0.18.04.1
-- PHP Version: 7.1.33-39+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendence1`
--

CREATE TABLE `attendence1` (
  `id` int(11) NOT NULL,
  `loginid` int(11) NOT NULL,
  `p` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendence1`
--

INSERT INTO `attendence1` (`id`, `loginid`, `p`) VALUES
(1, 1, 'p'),
(3, 69, 'p'),
(136, 1, 'A'),
(137, 1, 'L'),
(138, 1, 'UP'),
(139, 184, 'A'),
(140, 184, 'UP'),
(141, 184, 'L'),
(142, 184, 'UL');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `email`, `password`) VALUES
(1, 'sajid', 'khan@gmail.com', '12345'),
(69, 'mujahid', 'mujahidkhan@gmail.com', '12345678'),
(182, 'sajid', '0321@gmail.com', '12345678'),
(183, 'sajid khan', 'tabish@gmail.com', '12345'),
(184, 'joker', 'demo@demo.com', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendence1`
--
ALTER TABLE `attendence1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendence_ibfk_1` (`loginid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendence1`
--
ALTER TABLE `attendence1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendence1`
--
ALTER TABLE `attendence1`
  ADD CONSTRAINT `attendence1_ibfk_1` FOREIGN KEY (`loginid`) REFERENCES `login` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

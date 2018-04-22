-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2018 at 01:28 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mpd`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`id`, `username`, `password`) VALUES
(9, 'mpd', 'mpd');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `userName` varchar(200) NOT NULL,
  `userID` varchar(200) NOT NULL,
  `userURL` varchar(200) NOT NULL,
  `userPhone` varchar(200) NOT NULL,
  `userEmail` varchar(200) NOT NULL,
  `userPass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`userName`, `userID`, `userURL`, `userPhone`, `userEmail`, `userPass`) VALUES
('mmm', 'mmm', 'Jamil Al-Madfaai St., Amman, Jordan\n', 'yyw', 'yaha', 'yahya'),
('malek', '2020', 'Juwayber Al-Otaybi St., Amman, Jordan\n', '97826192', 'malek@yahoo.com', 'malek'),
('khalil', 'khalil', 'No address available', '124521', 'khalil.yahoo.com', 'malek');

-- --------------------------------------------------------

--
-- Table structure for table `donerequest`
--

CREATE TABLE `donerequest` (
  `id` int(100) NOT NULL,
  `userName` varchar(200) CHARACTER SET utf8 NOT NULL,
  `userID` varchar(200) CHARACTER SET utf8 NOT NULL,
  `userURL` varchar(200) CHARACTER SET utf8 NOT NULL,
  `public` varchar(200) CHARACTER SET utf8 NOT NULL,
  `private` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Status` varchar(200) CHARACTER SET utf8 NOT NULL,
  `employee` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `donerequest`
--

INSERT INTO `donerequest` (`id`, `userName`, `userID`, `userURL`, `public`, `private`, `Status`, `employee`) VALUES
(4, 'Monitor Company', 'Jeddah', 'monitor Data', 'False', 'True', '', ''),
(5, 'X Company', 'riyadh', 'View Data', 'True', 'False', '', ''),
(7, 'TEST Request', 'Mecca', 'test', 'true', 'false', '', ''),
(8, 'd request', 'jeddah', 'test', 'true', 'false', '', ''),
(1, 'enviroment company', 'Mecca,Hussien ST.', 'need to monitor', 'true', 'false', '', ''),
(8, 'new request', 'KSA', 'test', 'false', 'true', '', ''),
(9, 'n request', 'jeddha', 'test', 'true', 'false', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(100) NOT NULL,
  `userName` varchar(200) NOT NULL,
  `userID` varchar(200) NOT NULL,
  `userURL` varchar(200) NOT NULL,
  `public` varchar(200) NOT NULL,
  `private` varchar(200) NOT NULL,
  `Status` varchar(200) NOT NULL,
  `employee` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('mpd', 'mpd'),
('mmeshaal', 'mmeshaal');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `userName` varchar(200) NOT NULL,
  `userID` varchar(200) NOT NULL,
  `userURL` varchar(200) NOT NULL,
  `public` varchar(100) NOT NULL,
  `private` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

CREATE TABLE `sensor` (
  `Sensor` varchar(100) NOT NULL,
  `Parameter` varchar(200) NOT NULL,
  `id` int(11) NOT NULL,
  `lng` varchar(200) NOT NULL,
  `lat` varchar(200) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`Sensor`, `Parameter`, `id`, `lng`, `lat`, `address`) VALUES
('Sensor2', '14', 2, '39.254119873', '21.5024299622', 'Jeddah ,KING ABDULAZIZ UNIVERSITY');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `Department` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Role` varchar(200) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `userURL` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `Department`, `Email`, `Role`, `Phone`, `userURL`) VALUES
(1, 'John', 'Smith', '', '', 'user', '', ''),
(8, 'Titan', 'Edge', 'Finance', 'tesr@yahoo.com', 'Empolyee', '', ''),
(9, 'mpd', 'mpd', 'Employee', 'malek1@yahoo.com', 'Employee', '', ''),
(14, 'Ahmad Company', '123123', 'Finance', 'Ahmad@gmail.com', 'Employee', '96612542451', ''),
(15, 'section', 'section123', '', 'section@gmail', 'user', ' 9667124214221', 'amman jordan'),
(22, 'Haneen', 'jk;', '', 'ljh', 'user', 'knjl', 'nnasnknkln'),
(32, 'duaa', '123', 'it', 'duaa@hotmail.com', 'Employee', '', ''),
(33, 'duaa company', '12345678', '', 'd@hotmail.com', 'user', 'eeeeeeeeeeeeeeee', 'jeddah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

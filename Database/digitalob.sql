-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 06:02 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitalob`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `AdminEmail` varchar(120) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `FullName`, `AdminEmail`, `UserName`, `Password`, `updationDate`) VALUES
(2, 'Phillip Wangila', 'phillip@gmail.com', 'Philo', '1234', '2022-11-30 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `casestbl`
--

CREATE TABLE `casestbl` (
  `id` int(11) NOT NULL,
  `ReporterName` varchar(255) DEFAULT NULL,
  `ReporterId` varchar(255) DEFAULT NULL,
  `PhoneNumber` varchar(255) DEFAULT NULL,
  `ObNumber` varchar(25) DEFAULT NULL,
  `ReportedCase` varchar(255) DEFAULT NULL,
  `ReportedDate` varchar(250) NOT NULL,
  `Place` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `casestbl`
--

INSERT INTO `casestbl` (`id`, `ReporterName`, `ReporterId`, `PhoneNumber`, `ObNumber`, `ReportedCase`, `ReportedDate`, `Place`) VALUES
(1, 'philip', '38679283', '0701728808', '0B 1/1/12/2022', 'I was drugged and robbed', '1/12/2022', 'kimilili town'),
(2, 'philip wangila', '35699400', '0709863728', 'OB 1/1/12/2022', 'i was attacked and robbed', '1/12/2022', 'kimilili town');

-- --------------------------------------------------------

--
-- Table structure for table `officerstbl`
--

CREATE TABLE `officerstbl` (
  `id` int(11) NOT NULL,
  `OfficerId` varchar(100) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `MobileNumber` char(11) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officerstbl`
--

INSERT INTO `officerstbl` (`id`, `OfficerId`, `FullName`, `EmailId`, `MobileNumber`, `Password`, `Status`, `RegDate`, `UpdationDate`) VALUES
(1, '0ID018', NULL, 'philip@gmail.com', NULL, '1234', 1, '2022-12-01 15:09:27', '2022-12-01 16:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `suspectstbl`
--

CREATE TABLE `suspectstbl` (
  `id` int(11) NOT NULL,
  `SuspectName` varchar(255) DEFAULT NULL,
  `NatId` varchar(255) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  `ArrDate` varchar(25) DEFAULT NULL,
  `Reason` varchar(255) DEFAULT NULL,
  `Place` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suspectstbl`
--

INSERT INTO `suspectstbl` (`id`, `SuspectName`, `NatId`, `Phone`, `ArrDate`, `Reason`, `Place`) VALUES
(1, 'Osama laden', '23749302', '0702371273', '28/11/2022', 'violence', 'kimilili');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `casestbl`
--
ALTER TABLE `casestbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officerstbl`
--
ALTER TABLE `officerstbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `StudentId` (`OfficerId`);

--
-- Indexes for table `suspectstbl`
--
ALTER TABLE `suspectstbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `casestbl`
--
ALTER TABLE `casestbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `officerstbl`
--
ALTER TABLE `officerstbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `suspectstbl`
--
ALTER TABLE `suspectstbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

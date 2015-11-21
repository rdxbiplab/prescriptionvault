-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2015 at 11:20 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `registeruser`
--

-- --------------------------------------------------------

--
-- Table structure for table `addmember`
--

CREATE TABLE IF NOT EXISTS `addmember` (
`mbr_id` int(11) NOT NULL,
  `mbr_name` varchar(255) NOT NULL,
  `mbr_email` varchar(255) NOT NULL,
  `mbr_mobile` varchar(255) NOT NULL,
  `mbr_city` varchar(255) NOT NULL,
  `mbr_relation` varchar(255) NOT NULL,
  `mbr_dob` varchar(255) NOT NULL,
  `reg_user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addmember`
--

INSERT INTO `addmember` (`mbr_id`, `mbr_name`, `mbr_email`, `mbr_mobile`, `mbr_city`, `mbr_relation`, `mbr_dob`, `reg_user_id`) VALUES
(8, 'Rajdeep Mukherjee', 'test@gmail.com', '1234567890', 'kolkata', 'Brother', '30-10-1992', 1),
(9, 'Sayan Banerjee', 'test@gmail.com', '1234567890', 'tetst', 'Uncle', '30-10-1992', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE IF NOT EXISTS `prescription` (
`PID` int(40) NOT NULL,
  `doc_name` varchar(255) NOT NULL,
  `des_cgry` varchar(255) NOT NULL,
  `prescription` varchar(255) NOT NULL,
  `isu_date` date NOT NULL,
  `nember_id` int(11) NOT NULL,
  `reg_user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`PID`, `doc_name`, `des_cgry`, `prescription`, `isu_date`, `nember_id`, `reg_user_id`) VALUES
(13, 'p.Choudhuri', 'Pediatric Oncologist', 'photo/Lighthouse.jpg', '2019-11-15', 1, 1),
(15, 'p.Choudhuri', 'Pediatric Cardiologist', 'photo/Penguins.jpg', '2019-11-15', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
`reg_id` int(11) NOT NULL,
  `reg_name` varchar(255) NOT NULL,
  `reg_mail` varchar(255) NOT NULL,
  `reg_mobile` varchar(225) NOT NULL,
  `reg_address` text NOT NULL,
  `reg_pass` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`reg_id`, `reg_name`, `reg_mail`, `reg_mobile`, `reg_address`, `reg_pass`) VALUES
(1, 'Debdip Mukherjee', 'test@gmail.com', '9674469096', '28, Santiram rasta Bally Howrah', '111'),
(2, 'Debdip Mukherjee', 'debdip.mukherjee007@gmail.com', '7687829595', '28, Santiram rasta Bally Howrah', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addmember`
--
ALTER TABLE `addmember`
 ADD PRIMARY KEY (`mbr_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
 ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
 ADD PRIMARY KEY (`reg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addmember`
--
ALTER TABLE `addmember`
MODIFY `mbr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
MODIFY `PID` int(40) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

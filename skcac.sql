-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 30, 2019 at 05:00 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `awesomeg_grc`
--

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contact`
--

CREATE TABLE `emergency_contact` (
  `participant_id` int(4) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `phone_two` varchar(13) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emergency_contact`
--

INSERT INTO `emergency_contact` (`participant_id`, `first_name`, `last_name`, `phone`, `phone_two`) VALUES
(0, 'Janina', 'Georgiu', '(206)555-1111', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `guardian`
--

CREATE TABLE `guardian` (
  `participant_id` int(4) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address_one` varchar(50) NOT NULL,
  `address_two` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` int(5) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guardian`
--

INSERT INTO `guardian` (`participant_id`, `first_name`, `last_name`, `address_one`, `address_two`, `city`, `state`, `zip`, `phone`, `email`) VALUES
(0, 'Iron', 'Man', '10880 Malibu Point', ' ', 'Malibu', 'CA', 90210, '(000)000-0001', 'tstark@avenger.com');

-- --------------------------------------------------------

--
-- Table structure for table `medications`
--

CREATE TABLE `medications` (
  `participant_id` int(4) NOT NULL,
  `medication_name` varchar(50) NOT NULL,
  `frequency_taken` varchar(50) NOT NULL,
  `time_taken` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medications`
--

INSERT INTO `medications` (`participant_id`, `medication_name`, `frequency_taken`, `time_taken`) VALUES
(0, 'Aleve', 'Daily', 'Evening');

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `participant_id` int(4) NOT NULL,
  `medical_alerts` text,
  `physical_limitations` text,
  `diet_restrictions` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other`
--

INSERT INTO `other` (`participant_id`, `medical_alerts`, `physical_limitations`, `diet_restrictions`) VALUES
(0, 'hates work', 'standing forever', 'spicy food');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `participant_id` int(4) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address_one` varchar(50) NOT NULL,
  `address_two` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` int(5) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rep_id` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`participant_id`, `first_name`, `last_name`, `address_one`, `address_two`, `city`, `state`, `zip`, `phone`, `email`, `rep_id`) VALUES
(0, 'Keith', 'Carlson', '123 Easy ST', ' ', 'Kent', 'WA', 127, '(206)555-4', 'kcarlson@school.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `participant_id` int(4) NOT NULL,
  `provider_name` varchar(50) NOT NULL,
  `address_one` varchar(50) NOT NULL,
  `address_two` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` int(5) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`participant_id`, `provider_name`, `address_one`, `address_two`, `city`, `state`, `zip`, `phone`, `email`) VALUES
(0, 'NSA', '123 Street ST', ' ', 'New York', 'NY', 54321, '(206)555-1101', 'nsa@watchingyou.com');

-- --------------------------------------------------------

--
-- Table structure for table `rep`
--

CREATE TABLE `rep` (
  `rep_id` int(2) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rep`
--

INSERT INTO `rep` (`rep_id`, `first_name`, `last_name`, `phone`, `email`) VALUES
(1, 'Debbie', 'Meyers', '253-555-8888', 'dmeyers@skcac.org');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user` varchar(50) NOT NULL DEFAULT 'admin',
  `password` varchar(50) NOT NULL DEFAULT 'admin'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD KEY `participant_id` (`participant_id`);

--
-- Indexes for table `guardian`
--
ALTER TABLE `guardian`
  ADD KEY `participant_id` (`participant_id`);

--
-- Indexes for table `medications`
--
ALTER TABLE `medications`
  ADD KEY `participant_id` (`participant_id`);

--
-- Indexes for table `other`
--
ALTER TABLE `other`
  ADD KEY `participant_id` (`participant_id`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`participant_id`),
  ADD KEY `rep_id` (`rep_id`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD KEY `participant_id` (`participant_id`);

--
-- Indexes for table `rep`
--
ALTER TABLE `rep`
  ADD PRIMARY KEY (`rep_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rep`
--
ALTER TABLE `rep`
  MODIFY `rep_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

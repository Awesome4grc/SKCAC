-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2019 at 12:45 PM
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
-- Database: `agonzale_skcac`
--

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contact`
--

CREATE TABLE `emergency_contact` (
  `participant_id` int(4) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `phone_two` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `city` int(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` int(5) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medications`
--

CREATE TABLE `medications` (
  `participant_id` int(4) NOT NULL,
  `medication_name` text NOT NULL,
  `frequency_taken` text NOT NULL,
  `time_taken` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `id` int(4) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address_one` varchar(50) NOT NULL,
  `address_two` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` tinyint(5) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rep_id` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `participant_id` int(4) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address_one` varchar(50) NOT NULL,
  `address_two` varchar(50) NOT NULL,
  `city` int(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` int(5) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rep`
--

CREATE TABLE `rep` (
  `participant_id` int(4) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `rep_id` int(1) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(100) NOT NULL
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD KEY `participant_id` (`participant_id`);

--
-- Indexes for table `rep`
--
ALTER TABLE `rep`
  ADD PRIMARY KEY (`rep_id`),
  ADD KEY `participant_id` (`participant_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

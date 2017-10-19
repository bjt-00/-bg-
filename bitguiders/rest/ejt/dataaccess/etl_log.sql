-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2017 at 07:20 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ttts_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `etl_log`
--

CREATE TABLE `etl_log` (
  `job_id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `domain` varchar(50) NOT NULL,
  `etl_job` varchar(300) NOT NULL,
  `operation` varchar(50) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_time` timestamp NULL DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'new'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etl_log`
--

INSERT INTO `etl_log` (`job_id`, `user_id`, `domain`, `etl_job`, `operation`, `start_time`, `end_time`, `status`) VALUES
(1, 'abdul', 'mapreduce', 'hybrid', 'add', '2017-03-19 18:00:06', '2017-03-19 18:00:06', 'new'),
(2, 'fitsum', 'mapreduce', 'stripes', 'add', '2017-03-19 18:02:17', '2017-03-19 18:02:17', 'new'),
(3, 'feven', 'mapreduce', 'pair', 'add', '2017-03-19 18:03:01', '2017-03-19 18:03:01', 'new'),
(4, 'waqas', 'hive', 'hybrid', 'update', '2017-03-19 19:11:03', NULL, 'new'),
(5, 'waqas', 'pig', 'hybrid', 'update', '2017-03-19 19:17:28', NULL, 'new');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `etl_log`
--
ALTER TABLE `etl_log`
  ADD PRIMARY KEY (`job_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `etl_log`
--
ALTER TABLE `etl_log`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

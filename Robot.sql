-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 05, 2024 at 04:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

-- Set SQL mode to avoid issues with zero values
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

-- Start a transaction to ensure atomicity
START TRANSACTION;

-- Set the time zone to UTC
SET time_zone = "+00:00";

-- Save the current character set settings
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

-- Set character set to utf8mb4 for this session
/*!40101 SET NAMES utf8mb4 */;

-- 
-- Database: `Robot`
--

-- --------------------------------------------------------

-- 
-- Table structure for table `remote`
--

CREATE TABLE `remote` (
  `id` int(6) NOT NULL,
  `directions` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 
-- Insert data into table `remote`
--

INSERT INTO `remote` (`id`, `directions`) VALUES
(1, 'F'),
(2, 'R'),
(3, 'B'),
(4, 'L'),
(5, 'S');

-- 
-- Indexes for dumped tables
--

-- Add primary key index for table `remote`
ALTER TABLE `remote`
  ADD PRIMARY KEY (`id`);

-- 
-- AUTO_INCREMENT for dumped tables
--

-- Set AUTO_INCREMENT value for table `remote`
ALTER TABLE `remote`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

-- Commit the transaction to apply changes
COMMIT;

-- Restore the previous character set settings
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 02, 2022 at 02:39 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admission`
--

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE `entries` (
  `id` int(11) NOT NULL,
  `application_mode` text DEFAULT NULL,
  `mature_student` text DEFAULT NULL,
  `surname` text DEFAULT NULL,
  `first_name` text DEFAULT NULL,
  `other_name` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `dob` text DEFAULT NULL,
  `nationality` text DEFAULT NULL,
  `marital_status` text DEFAULT NULL,
  `mailing_address` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `prog_type` text DEFAULT NULL,
  `prog_enroll` text DEFAULT NULL,
  `picture` text DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sp_title` text DEFAULT NULL,
  `sp_name` text DEFAULT NULL,
  `sp_relation` text DEFAULT NULL,
  `sp_occupation` text DEFAULT NULL,
  `sp_address` text DEFAULT NULL,
  `sp_email` text DEFAULT NULL,
  `sp_phone` text DEFAULT NULL,
  `rel_type` text DEFAULT NULL,
  `rel_deno` text DEFAULT NULL,
  `progs` text DEFAULT NULL,
  `edu_school` text DEFAULT NULL,
  `edu_to` text DEFAULT NULL,
  `edu_from` text DEFAULT NULL,
  `edu_cert` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@admission.com', 'admin12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entries`
--
ALTER TABLE `entries`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `entries` ADD FULLTEXT KEY `surname_index` (`surname`);
ALTER TABLE `entries` ADD FULLTEXT KEY `firstname_index` (`first_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entries`
--
ALTER TABLE `entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2024 at 01:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `react_laravel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_create_posts`
--

CREATE TABLE `t_create_posts` (
  `post_id` int(11) NOT NULL,
  `vch_title` varchar(45) DEFAULT NULL,
  `vch_desc` varchar(145) DEFAULT NULL,
  `int_publishStatus` int(11) DEFAULT 0,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_flag` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_create_posts`
--

INSERT INTO `t_create_posts` (`post_id`, `vch_title`, `vch_desc`, `int_publishStatus`, `created_at`, `updated_at`, `deleted_flag`) VALUES
(1, 'final testing', 'final testing', 1, NULL, '2024-11-09', b'1'),
(2, 'xxxx', 'xxxx', 0, '2024-11-02', NULL, b'1'),
(3, 'PHP - Course', '3 month course', 1, '2024-11-03', NULL, b'0'),
(4, 'xxx', 'xxx', 0, '2024-11-03', NULL, b'1'),
(5, 'shuvadeep', 'xxx', 0, '2024-11-03', NULL, b'0'),
(6, 'hello', 'world', 0, '2024-11-05', NULL, b'0'),
(7, 'testing again', 'testing again', 0, '2024-11-05', NULL, b'1'),
(8, 'csm', 'Angular Dev', 1, '2024-11-05', '2024-11-09', b'0'),
(9, 'Play Station 5 pro', 'price 80,000', 1, '2024-11-09', NULL, b'0'),
(10, 'Mobile Phone and tablet', 'Iphone 20', 1, '2024-11-09', '2024-11-09', b'0'),
(11, 'suchitra ilu', 'mama', 1, '2024-11-09', '2024-11-09', b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_create_posts`
--
ALTER TABLE `t_create_posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_create_posts`
--
ALTER TABLE `t_create_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

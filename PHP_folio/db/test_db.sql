-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2021 at 06:14 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_image_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_url`, `update_image_url`, `created_at`, `updated_at`) VALUES
(117, 'SimpleImageFive.png', NULL, '2021-06-29 16:04:44', '2021-06-29 16:04:44'),
(119, 'simpleimagethree.jpeg', NULL, '2021-06-29 16:05:06', '2021-06-29 16:05:06'),
(120, 'SimpleImageFour.jpg', NULL, '2021-06-29 16:05:24', '2021-06-29 16:05:24'),
(121, 'simpleimagetwo.jpeg', NULL, '2021-06-29 16:05:34', '2021-06-29 16:05:34'),
(123, 'SimpleImageNine.jpg', NULL, '2021-06-29 16:06:39', '2021-06-29 16:06:39'),
(124, 'simpleImageOne.jpg', NULL, '2021-06-29 16:06:52', '2021-06-29 16:06:52'),
(125, 'ImageTestOne.jpg', NULL, '2021-06-29 16:09:11', '2021-06-29 16:09:11'),
(126, 'testImagethree.jpg', NULL, '2021-06-29 16:10:30', '2021-06-29 16:10:30'),
(127, 'testImage.jpg', NULL, '2021-06-29 16:10:40', '2021-06-29 16:10:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

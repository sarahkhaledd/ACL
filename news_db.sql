-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 08, 2022 at 02:32 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `news_data`
--

CREATE TABLE `news_data` (
  `id` int(11) NOT NULL,
  `news_title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `news_details` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news_data`
--

INSERT INTO `news_data` (`id`, `news_title`, `news_details`) VALUES
(6, 'it is working', 'yes we do it'),
(7, 'news 2', 'asdasdasd'),
(13, 'gamed', 'alooo'),
(14, 'gamed', 'rraaaaaaaaaa'),
(15, 'hii', 'khalasna'),
(16, 'gamed', 'fsfsdfds'),
(18, 'alooooooo', 'papamfa'),
(19, 'afbakjbfaff', 'dfdf'),
(21, 'hii', 'fdffsfsf');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `UserID` int(11) NOT NULL,
  `addArticle` int(11) NOT NULL,
  `viewArticle` int(11) NOT NULL,
  `DeleteArticle` int(11) NOT NULL,
  `changePermissions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`UserID`, `addArticle`, `viewArticle`, `DeleteArticle`, `changePermissions`) VALUES
(1, 1, 1, 1, 1),
(2, 0, 1, 0, 0),
(3, 1, 1, 0, 0),
(5, 0, 1, 0, 0),
(7, 0, 1, 0, 0),
(17, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `role`) VALUES
(1, 'nour@gmail.com', '12314469KJDNFKDF', 'admin'),
(2, 'mark@gmail.com', '12314469KJDNFKDF', 'normal'),
(3, 'sarah@gmail.com', '12314469KJDNFKDF', 'normal'),
(5, 'nada@gmail.com', '12314469KJDNFKDF', 'normal'),
(7, 'ayat@gmail.com', '12314469KJDNFKDF', 'normal'),
(17, 'tohamy@gmail.com', '12314469KJDNFKDF', 'normal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news_data`
--
ALTER TABLE `news_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news_data`
--
ALTER TABLE `news_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `Foreign key` FOREIGN KEY (`UserID`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

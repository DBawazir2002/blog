-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2023 at 01:31 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminEmail` varchar(200) NOT NULL,
  `adminPass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminEmail`, `adminPass`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `categoryDate` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryName`, `categoryDate`) VALUES
(1, 'تاريخ', '2023-07-09 14:16:15'),
(2, 'سيارات', '2023-07-09 14:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `postTitle` varchar(200) NOT NULL,
  `postCat` varchar(200) NOT NULL,
  `postImage` varchar(200) NOT NULL,
  `postContent` varchar(10000) NOT NULL,
  `postAuthor` varchar(200) NOT NULL,
  `postDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `postTitle`, `postCat`, `postImage`, `postContent`, `postAuthor`, `postDate`) VALUES
(1, 'عنوان تجريبي', 'تاريخ', '279_خلفية سطح الكمبيوتر.png', 'هذا النص نص تجريبي هذا النص نص تجريبي هذا النص نص تجريبي هذا النص نص تجريبي هذا النص نص تجريبي هذا النص نص تجريبي هذا النص نص تجريبي هذا النص نص تجريبي هذا النص نص تجريبي هذا النص نص تجريبي هذا النص نص تجريبي هذا النص نص تجريبي هذا النص نص تجريبي ', 'خالد سالم المنهالي', '2023-07-09 14:18:28'),
(3, ' عنوان تجريبي', 'سيارات', '704_خلفية سطح الكمبيوتر.png', ' نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي  نص تجريبي ', ' كاتب تجريبي', '2023-07-09 14:24:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

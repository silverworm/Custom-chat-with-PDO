-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2019 at 12:39 AM
-- Server version: 8.0.15
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `bad_words`
--

CREATE TABLE `bad_words` (
  `id` int(11) NOT NULL,
  `word` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bad_words`
--

INSERT INTO `bad_words` (`id`, `word`) VALUES
(1, 'home'),
(2, 'tree');

-- --------------------------------------------------------

--
-- Table structure for table `black_list`
--

CREATE TABLE `black_list` (
  `id` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `u_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `u_name`) VALUES
(1, 'asdaszxCa', 'cZxZX'),
(2, 'dasdadasasdasdaddd111111111111', 'qewq111'),
(3, 'caklhjjdklashldkaasd', NULL),
(4, 'czxc', NULL),
(5, 'czxvasfasczx', NULL),
(6, 'czxvasfasczx', NULL),
(7, 'czxxxzc', NULL),
(8, 'czxc', NULL),
(9, 'czxc', NULL),
(10, 'czxc', NULL),
(11, 'czxc', NULL),
(12, 'zxczxc', NULL),
(13, 'сячсфылвжы', NULL),
(14, 'czxcaslkdmklxczlkx', NULL),
(15, 'zsczxczx', NULL),
(16, 'zsczxczx', NULL),
(17, 'zsczxczxczxc', NULL),
(18, 'zsczxczxczxc', NULL),
(19, 'zsczxczxczxc', NULL),
(20, 'zsczxczxczxc', NULL),
(21, 'zsczxczxczxc', NULL),
(22, 'zsczxczxczxc', NULL),
(23, 'zsczxczxczxc', NULL),
(24, 'xzczx', NULL),
(25, 'xzczx', NULL),
(26, 'czx', NULL),
(27, 'cxcxz', NULL),
(28, 'cxcxz', NULL),
(29, 'czxczx', NULL),
(30, 'czxczx', NULL),
(31, 'czxczx', NULL),
(32, 'czxczx', NULL),
(33, 'czxczx', NULL),
(34, 'czxczx home', NULL),
(35, 'czxczx home', NULL),
(36, 'czxczx home Home ', NULL),
(37, 'czxczx home Home ', NULL),
(38, 'czxczx home Home ', NULL),
(39, 'czxczx *** *** ', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bad_words`
--
ALTER TABLE `bad_words`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `black_list`
--
ALTER TABLE `black_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bad_words`
--
ALTER TABLE `bad_words`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `black_list`
--
ALTER TABLE `black_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

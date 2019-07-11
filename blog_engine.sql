-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 11, 2019 at 11:54 AM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.1.20-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_engine`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(80) NOT NULL,
  `twitter` varchar(60) NOT NULL,
  `vk` varchar(50) NOT NULL,
  `telegram` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `twitter`, `vk`, `telegram`) VALUES
(3, 'admin', '$2y$10$3g9X3rlAHjWelEM.UudKGufTXbLK/Bkn3/8tTDJgsOMREfwbgGroS', 'admin@admin.com', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(120) NOT NULL,
  `text` text NOT NULL,
  `pub_date` int(11) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `title`, `text`, `pub_date`) VALUES
(12, 'Eminem last time', 'Eminem last time sang with Logic as well...', 1562432285),
(4, 'Charlie Puth', 'Charlie Puth became popular, singing with Wiz Khalifa, sang song in Fast of Furious 7', 1562349069),
(5, 'Eminem', 'Eminem is king of rap', 1487066363),
(6, 'MrCaTsEmPiRe', 'It is my EMPIRE', 1487066407),
(7, 'Facebook', 'Hello Friend, <a href="http://facebook.com/abdurahmon.hasanov.16">add me in facebook</a>', 1487422101),
(8, 'Twitter', 'Hello Friend, <a href="http://twitter.com/mrcat323">Add me in twitter</a>', 1490631637),
(9, 'Guess who is back', 'Eminem is back', 1562346062),
(10, 'Hello World', 'Heh, hello friends, I just wanna say u one thing:\r\n&quot;Hello World!&quot;', 1562262114);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

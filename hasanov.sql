-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 04, 2017 at 09:35 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.1.2-4+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hasanov`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(80) NOT NULL,
  `twitter` varchar(60) NOT NULL,
  `vk` varchar(50) NOT NULL,
  `telegram` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `twitter`, `vk`, `telegram`) VALUES
(1, 'Admin', '7c0c3e92f2592a03aa8a4c663bb3557b', 'mrcat323@gmail.com', 'mrcat323', 'mrcats_empire', 'mrcat323'),
(2, 'Akajane', '9661fd65249b026ebea0f49927e82f0e', 'mynameisjoker@list.ru', 'anonym', 'some_id', 'anonym');

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
(3, 'Why UNIX ?', 'Because it rules, it is more useful than Windows', 1487064505),
(4, 'Charlie Puth', 'Charlie Puth became popular, singing with Wiz Khalifa, sang song in Fast of Furious 7', 1487066341),
(5, 'Eminem', 'Eminem is king of rap', 1487066363),
(6, 'MrCaTsEmPiRe', 'It is my EMPIRE', 1487066407),
(7, 'Facebook', 'Hello Friend, <a href="http://facebook.com/abdurahmon.hasanov.16">add me in facebook</a>', 1487422101),
(8, 'Twitter', 'Hello Friend, <a href="http://twitter.com/mrcat323">Add me in twitter</a>', 1490631637),
(9, 'Guess who is back', 'E_%nem is back', 1488971168),
(10, 'Hello World', 'Heh, hello friends, I just wanna say u one thing:\r\n&quot;Hello World!&quot;', 1491326495);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
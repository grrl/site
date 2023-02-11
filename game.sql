-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2023 at 08:10 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game`
--

-- --------------------------------------------------------

--
-- Table structure for table `coin`
--

CREATE TABLE `coin` (
  `coinin` float NOT NULL,
  `coinout` float NOT NULL,
  `payback` float NOT NULL,
  `cycle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coin`
--

INSERT INTO `coin` (`coinin`, `coinout`, `payback`, `cycle`) VALUES
(1521.25, 1231.25, 0.809367, 843);

-- --------------------------------------------------------

--
-- Table structure for table `jackpot`
--

CREATE TABLE `jackpot` (
  `progressive` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jackpot`
--

INSERT INTO `jackpot` (`progressive`) VALUES
(1024);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `card_1` int(11) NOT NULL,
  `card_2` int(11) NOT NULL,
  `card_3` int(11) NOT NULL,
  `card_4` int(11) NOT NULL,
  `card_5` int(11) NOT NULL,
  `card_6` int(11) NOT NULL,
  `card_7` int(11) NOT NULL,
  `card_8` int(11) NOT NULL,
  `card_9` int(11) NOT NULL,
  `card_10` int(11) NOT NULL,
  `res_1` int(11) DEFAULT NULL,
  `res_2` int(11) DEFAULT NULL,
  `res_3` int(11) DEFAULT NULL,
  `res_4` int(11) DEFAULT NULL,
  `res_5` int(11) DEFAULT NULL,
  `win` tinytext NOT NULL,
  `balance` float NOT NULL,
  `complete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `time`, `username`, `card_1`, `card_2`, `card_3`, `card_4`, `card_5`, `card_6`, `card_7`, `card_8`, `card_9`, `card_10`, `res_1`, `res_2`, `res_3`, `res_4`, `res_5`, `win`, `balance`, `complete`) VALUES
(2217, 1671642360, 'test', 28, 22, 41, 45, 18, 21, 27, 4, 47, 30, 28, 27, 41, 47, 30, '', 48.75, 1),
(2218, 1671642367, 'test', 46, 37, 40, 15, 41, 0, 45, 19, 8, 25, 0, 45, 19, 15, 41, 'TWO PAIR', 47.5, 1),
(2219, 1671642377, 'test', 39, 45, 26, 41, 5, 4, 37, 40, 25, 16, 39, 37, 26, 25, 16, 'JACKS OR BETTER', 48.75, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `loyalty` float NOT NULL,
  `points` float NOT NULL,
  `balance` float NOT NULL,
  `winloss` float NOT NULL,
  `coinin` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `loyalty`, `points`, `balance`, `winloss`, `coinin`) VALUES
(1, 'test', '81dc9bdb52d04dc20036dbd8313ed055', 'tester@test.com', 23.4375, 0, 50, -25, 82.5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2220;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

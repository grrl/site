-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2023 at 12:28 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coin`
--

INSERT INTO `coin` (`coinin`, `coinout`, `payback`, `cycle`) VALUES
(1580, 1281.25, 0.810918, 890);

-- --------------------------------------------------------

--
-- Table structure for table `jackpot`
--

CREATE TABLE `jackpot` (
  `progressive` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jackpot`
--

INSERT INTO `jackpot` (`progressive`) VALUES
(1024.59);

-- --------------------------------------------------------

--
-- Table structure for table `plinko`
--

CREATE TABLE `plinko` (
  `coinin` float NOT NULL,
  `coinout` float NOT NULL,
  `payback` float NOT NULL,
  `cycle` int(11) NOT NULL,
  `opal` float NOT NULL,
  `ruby` float NOT NULL,
  `emerald` float NOT NULL,
  `sapphire` float NOT NULL,
  `diamond` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plinko`
--

INSERT INTO `plinko` (`coinin`, `coinout`, `payback`, `cycle`, `opal`, `ruby`, `emerald`, `sapphire`, `diamond`) VALUES
(1122.8, 1038.8, 0.925185, 426, 3.62601, 6.12282, 12.2392, 102.233, 1004.46);

-- --------------------------------------------------------

--
-- Table structure for table `plinkosession`
--

CREATE TABLE `plinkosession` (
  `id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `seed` int(11) NOT NULL,
  `bonus` tinyint(1) NOT NULL,
  `jackpotseed` int(11) NOT NULL,
  `pick_1` float NOT NULL,
  `pick_1_credits` float NOT NULL,
  `pick_2` float NOT NULL,
  `pick_2_credits` float NOT NULL,
  `pick_3` float NOT NULL,
  `pick_3_credits` float NOT NULL,
  `pick_4` float NOT NULL,
  `pick_4_credits` float NOT NULL,
  `pick_5` float NOT NULL,
  `pick_5_credits` float NOT NULL,
  `pick_6` int(11) NOT NULL,
  `pick_7` float NOT NULL,
  `pick_7_credits` float NOT NULL,
  `pick_8` float NOT NULL,
  `pick_8_credits` float NOT NULL,
  `pick` int(11) NOT NULL,
  `bet` float NOT NULL,
  `multiplier` float NOT NULL,
  `win` float NOT NULL,
  `balance` float NOT NULL,
  `complete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `time`, `username`, `card_1`, `card_2`, `card_3`, `card_4`, `card_5`, `card_6`, `card_7`, `card_8`, `card_9`, `card_10`, `res_1`, `res_2`, `res_3`, `res_4`, `res_5`, `win`, `balance`, `complete`) VALUES
(2217, 1671642360, 'test', 28, 22, 41, 45, 18, 21, 27, 4, 47, 30, 28, 27, 41, 47, 30, '', 48.75, 1),
(2218, 1671642367, 'test', 46, 37, 40, 15, 41, 0, 45, 19, 8, 25, 0, 45, 19, 15, 41, 'TWO PAIR', 47.5, 1),
(2219, 1671642377, 'test', 39, 45, 26, 41, 5, 4, 37, 40, 25, 16, 39, 37, 26, 25, 16, 'JACKS OR BETTER', 48.75, 1),
(2220, 1676146153, 'test', 15, 38, 16, 25, 8, 31, 46, 35, 21, 17, 31, 38, 35, 25, 17, 'JACKS OR BETTER', 48.75, 1),
(2221, 1676146164, 'test', 5, 47, 1, 45, 6, 36, 19, 13, 18, 0, 36, 19, 13, 45, 6, 'THREE OF KIND', 48.75, 1),
(2222, 1676146174, 'test', 25, 14, 22, 16, 18, 41, 20, 31, 28, 50, 25, 14, 22, 16, 18, 'FLUSH', 51.25, 1),
(2223, 1676146179, 'test', 14, 48, 20, 33, 36, 23, 11, 37, 49, 44, 23, 11, 20, 33, 44, '', 56.25, 1),
(2224, 1676146186, 'test', 6, 11, 17, 47, 41, 51, 33, 8, 15, 27, 51, 11, 8, 15, 27, '', 55, 1),
(2225, 1676146190, 'test', 21, 22, 42, 39, 23, 31, 5, 1, 40, 14, 21, 22, 1, 40, 23, '', 53.75, 1),
(2226, 1676146200, 'test', 49, 33, 22, 29, 24, 51, 9, 6, 2, 45, 49, 9, 22, 2, 24, '', 52.5, 1),
(2227, 1676146207, 'test', 37, 43, 7, 13, 4, 29, 2, 36, 9, 9, 29, 43, 36, 9, 4, '', 51.25, 1),
(2228, 1676146213, 'test', 21, 0, 7, 47, 25, 28, 46, 30, 33, 27, 21, 46, 30, 47, 27, '', 50, 1),
(2229, 1676146220, 'test', 19, 50, 29, 22, 36, 35, 0, 45, 24, 18, 35, 50, 45, 24, 36, 'JACKS OR BETTER', 48.75, 1),
(2230, 1676146227, 'test', 8, 20, 18, 5, 14, 24, 0, 21, 33, 10, 24, 0, 18, 5, 10, '', 48.75, 1),
(2231, 1676146231, 'test', 24, 18, 32, 33, 38, 1, 51, 46, 22, 21, 24, 51, 46, 22, 38, 'JACKS OR BETTER', 47.5, 1),
(2232, 1676146235, 'test', 27, 6, 11, 43, 8, 51, 26, 14, 29, 17, 51, 26, 11, 29, 17, '', 47.5, 1),
(2233, 1676146440, 'test', 1, 21, 11, 16, 30, 49, 35, 39, 4, 13, 49, 35, 11, 4, 13, '', 46.25, 1),
(2234, 1676146447, 'test', 38, 12, 35, 47, 31, 24, 1, 30, 5, 49, 38, 12, 30, 5, 49, 'JACKS OR BETTER', 45, 1),
(2235, 1676146452, 'test', 19, 33, 37, 14, 34, 38, 20, 27, 2, 6, 38, 20, 37, 2, 6, '', 45, 1),
(2236, 1676146461, 'test', 44, 36, 11, 38, 29, 43, 23, 20, 27, 2, 43, 36, 11, 38, 2, '', 43.75, 1),
(2237, 1676146465, 'test', 2, 36, 1, 19, 13, 17, 22, 39, 5, 8, 17, 36, 39, 5, 13, 'JACKS OR BETTER', 42.5, 1),
(2238, 1676146472, 'test', 25, 45, 24, 10, 7, 31, 6, 46, 20, 26, 25, 6, 24, 10, 26, '', 42.5, 1),
(2239, 1676146479, 'test', 49, 41, 1, 48, 3, 4, 26, 32, 43, 43, 49, 26, 32, 43, 43, '', 41.25, 1),
(2240, 1676146484, 'test', 1, 50, 29, 42, 8, 31, 15, 11, 30, 5, 31, 15, 29, 42, 5, 'TWO PAIR', 40, 1),
(2241, 1676146493, 'test', 9, 11, 47, 20, 29, 17, 25, 43, 5, 3, 17, 11, 43, 5, 3, '', 41.25, 1),
(2242, 1676146499, 'test', 19, 25, 44, 48, 49, 37, 3, 40, 15, 4, 37, 25, 40, 15, 49, '', 40, 1),
(2243, 1676472301, 'test', 24, 9, 14, 15, 27, 21, 48, 50, 6, 29, 21, 48, 14, 6, 27, '', 38.75, 1),
(2244, 1676472311, 'test', 34, 5, 19, 31, 23, 20, 32, 7, 37, 50, 20, 5, 7, 31, 50, 'TWO PAIR', 37.5, 1),
(2245, 1676472318, 'test', 28, 3, 43, 35, 1, 16, 27, 47, 0, 26, 28, 3, 43, 0, 1, 'STRAIGHT', 38.75, 1),
(2246, 1676472328, 'test', 48, 7, 20, 17, 42, 23, 32, 36, 35, 24, 23, 7, 20, 35, 24, '', 42.5, 1),
(2247, 1676472335, 'test', 7, 50, 4, 42, 5, 1, 49, 10, 36, 21, 7, 49, 4, 42, 5, '', 41.25, 1),
(2248, 1676472345, 'test', 30, 27, 48, 19, 28, 26, 17, 37, 10, 6, 26, 17, 37, 10, 6, '', 40, 1),
(2249, 1676472355, 'test', 27, 30, 4, 1, 46, 16, 18, 15, 40, 31, 27, 30, 4, 1, 31, 'TWO PAIR', 38.75, 1),
(2250, 1676472363, 'test', 39, 34, 40, 15, 0, 5, 31, 45, 44, 8, 39, 31, 45, 44, 0, 'TWO PAIR', 40, 1),
(2251, 1676669067, 'test', 27, 6, 19, 25, 22, 5, 17, 50, 14, 21, 5, 6, 19, 14, 21, '', 41.25, 1),
(2252, 1676669072, 'test', 9, 24, 51, 43, 36, 32, 50, 47, 44, 37, 9, 24, 51, 44, 36, '', 40, 1),
(2253, 1676669077, 'test', 34, 35, 19, 4, 46, 49, 47, 17, 11, 6, 34, 35, 19, 11, 46, '', 38.75, 1),
(2254, 1676669084, 'test', 11, 36, 27, 17, 0, 14, 9, 26, 48, 16, 11, 36, 26, 48, 0, 'JACKS OR BETTER', 37.5, 1),
(2255, 1676670368, 'test', 18, 37, 43, 48, 30, 36, 17, 50, 25, 7, 36, 17, 43, 25, 30, 'THREE OF KIND', 37.5, 1),
(2256, 1676751247, 'test', 0, 23, 9, 10, 1, 22, 42, 14, 29, 48, 22, 23, 14, 10, 48, 'TWO PAIR', 18.75, 1),
(2257, 1676751391, 'test', 38, 16, 14, 5, 8, 13, 51, 6, 34, 36, 38, 51, 6, 34, 36, 'JACKS OR BETTER', 20, 1),
(2258, 1676751401, 'test', 6, 5, 27, 21, 40, 4, 36, 32, 31, 29, 4, 36, 27, 31, 40, '', 20, 1),
(2259, 1676751609, 'test', 49, 7, 33, 46, 37, 2, 45, 48, 6, 44, 2, 7, 33, 46, 44, 'THREE OF KIND', 198.75, 1),
(2260, 1676751903, 'test', 7, 19, 30, 3, 13, 40, 49, 45, 34, 20, 7, 19, 45, 34, 20, 'TWO PAIR', 191.65, 1),
(2261, 1676751908, 'test', 2, 25, 50, 46, 22, 20, 19, 12, 4, 1, 20, 25, 50, 4, 1, '', 192.9, 1),
(2262, 1676751911, 'test', 50, 16, 18, 25, 36, 2, 41, 13, 39, 33, 50, 41, 13, 25, 36, '', 191.65, 1),
(2263, 1676751915, 'test', 38, 23, 22, 34, 43, 2, 40, 37, 51, 8, 38, 23, 37, 51, 8, 'JACKS OR BETTER', 190.4, 1),
(2264, 1676752074, 'test', 18, 4, 16, 43, 25, 26, 0, 23, 44, 47, 26, 4, 23, 43, 47, '', 174.4, 1),
(2265, 1676752080, 'test', 33, 8, 29, 48, 22, 28, 51, 2, 4, 35, 28, 51, 2, 48, 22, 'TWO PAIR', 173.15, 1),
(2266, 1676752087, 'test', 21, 1, 37, 18, 15, 36, 45, 30, 12, 27, 36, 45, 37, 12, 27, '', 174.4, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `loyalty`, `points`, `balance`, `winloss`, `coinin`) VALUES
(1, 'test', '81dc9bdb52d04dc20036dbd8313ed055', 'tester@test.com', 402.924, 368.237, 46.8, -1240.41, 1600.45);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plinkosession`
--
ALTER TABLE `plinkosession`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `plinkosession`
--
ALTER TABLE `plinkosession`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=350;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2267;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

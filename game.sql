-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2023 at 10:57 AM
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
(1581.25, 1281.25, 0.810277, 891);

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
(1024.6);

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
(78.4, 1214.08, 15.4857, 34, 2.5, 5.0684, 10.0496, 100.041, 1000.16);

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
  `jackpot` varchar(255) NOT NULL,
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
  `pick_6` float NOT NULL,
  `pick_6_credits` float NOT NULL,
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

--
-- Dumping data for table `plinkosession`
--

INSERT INTO `plinkosession` (`id`, `time`, `username`, `seed`, `bonus`, `jackpotseed`, `jackpot`, `pick_1`, `pick_1_credits`, `pick_2`, `pick_2_credits`, `pick_3`, `pick_3_credits`, `pick_4`, `pick_4_credits`, `pick_5`, `pick_5_credits`, `pick_6`, `pick_6_credits`, `pick_7`, `pick_7_credits`, `pick_8`, `pick_8_credits`, `pick`, `bet`, `multiplier`, `win`, `balance`, `complete`) VALUES
(533, 1676881894, 'test', 0, 1, 460, 'opal', 0, 0.1, 0, 0.2, 0, 0.05, 3.64641, 0.2, 0, 0.05, 3.64641, 0.1, 0, 0.05, 3.64641, 0.05, 4, 1.2, 0, 3.84641, 208.761, 1),
(534, 1676882051, 'test', 0, 1, 125, 'opal', 0, 0.1, 0, 0.05, 0, 0.2, 3.64761, 0.05, 3.64761, 0.05, 0, 0.2, 0, 0.1, 0, 0.05, 3, 0.8, 0, 0.2, 211.407, 1),
(535, 1676883008, 'test', 0, 1, 285, 'opal', 3.64841, 0.1, 3.64841, 0.05, 0, 0.1, 3.64841, 0.05, 3.64841, 0.05, 0, 0.05, 0, 0.2, 3.64841, 0.2, 3, 2, 0, 0.1, 210.807, 1),
(536, 1676883018, 'test', 1, 1, 862, 'emerald', 0, 0.2, 0, 0.4, 12.288, 0.2, 0, 0.2, 12.288, 0.2, 12.288, 0.8, 12.288, 0.8, 12.288, 0.4, 1, 2, 0, 0.2, 208.907, 1),
(537, 1676883028, 'test', 1, 1, 516, 'opal', 3.65241, 0.05, 0, 0.1, 0, 0.1, 3.65241, 0.2, 0, 0.05, 3.65241, 0.2, 3.65241, 0.05, 3.65241, 0.05, 3, 2, 0, 0.1, 207.107, 1),
(538, 1676883037, 'test', 0, 1, 733, 'ruby', 0, 0.1, 6.15122, 0.1, 6.15122, 0.2, 6.15122, 0.4, 0, 0.1, 0, 0.2, 6.15122, 0.4, 6.15122, 0.1, 3, 2, 0, 6.35122, 205.207, 1),
(539, 1676883160, 'test', 1, 1, 471, 'opal', 3.65641, 0.1, 3.65641, 0.05, 3.65641, 0.05, 3.65641, 0.2, 3.65641, 0.2, 0, 0.1, 3.65641, 0.05, 0, 0.05, 2, 2.4, 0, 3.70641, 209.559, 1),
(540, 1676883247, 'test', 0, 1, 360, 'opal', 0, 0.05, 0, 0.05, 2.5, 0.05, 0, 0.1, 2.5, 0.05, 0, 0.1, 2.5, 0.2, 0, 0.2, 3, 1.2, 0, 2.55, 210.865, 1),
(541, 1676883259, 'test', 0, 1, 597, 'opal', 2.5, 0.2, 0, 0.1, 2.5, 0.1, 2.5, 0.05, 2.5, 0.05, 2.5, 0.05, 2.5, 0.2, 2.5, 0.05, 3, 2.8, 0, 2.6, 212.215, 1),
(542, 1676883270, 'test', 0, 1, 410, 'opal', 2.5, 0.1, 2.5, 0.05, 2.5, 0.2, 2.5, 0.1, 2.5, 0.05, 2.5, 0.2, 0, 0.05, 2.5, 0.05, 3, 2.8, 0, 2.7, 212.015, 1),
(543, 1676883280, 'test', 1, 1, 43, 'opal', 2.5, 0.1, 0, 0.05, 2.5, 0.2, 2.5, 0.1, 2.5, 0.2, 2.5, 0.05, 2.5, 0.05, 2.5, 0.05, 2, 2.8, 0, 0.05, 211.915, 1),
(544, 1676883291, 'test', 0, 1, 540, 'opal', 2.5028, 0.2, 2.5028, 0.05, 0, 0.05, 2.5028, 0.05, 2.5028, 0.2, 2.5028, 0.1, 2.5028, 0.05, 2.5028, 0.1, 3, 2.8, 0, 0.05, 209.165, 1),
(545, 1676883301, 'test', 1, 1, 88, 'opal', 2.5056, 0.05, 2.5056, 0.1, 2.5056, 0.2, 2.5056, 0.1, 2.5056, 0.05, 2.5056, 0.2, 0, 0.05, 2.5056, 0.05, 3, 2.8, 0, 2.7056, 206.415, 1),
(546, 1676883310, 'test', 1, 1, 104, 'opal', 2.5, 0.05, 2.5, 0.05, 2.5, 0.2, 2.5, 0.1, 2.5, 0.05, 0, 0.1, 2.5, 0.05, 2.5, 0.2, 3, 2.8, 0, 2.7, 206.321, 1),
(547, 1676883320, 'test', 1, 1, 286, 'opal', 2.5, 0.1, 2.5, 0.2, 2.5, 0.05, 2.5, 0.2, 2.5, 0.05, 0, 0.05, 2.5, 0.05, 2.5, 0.1, 3, 2.8, 0, 2.55, 206.221, 1),
(548, 1676883332, 'test', 1, 1, 304, 'opal', 2.5, 0.05, 2.5, 0.05, 0, 0.05, 2.5, 0.05, 2.5, 0.2, 2.5, 0.1, 2.5, 0.1, 2.5, 0.2, 3, 2.8, 0, 0.05, 205.971, 1),
(549, 1676883341, 'test', 0, 1, 0, 'diamond', 1004.68, 20, 1004.68, 40, 1004.68, 80, 1004.68, 20, 0, 40, 1004.68, 20, 1004.68, 20, 1004.68, 80, 2, 2.8, 0, 1044.68, 203.221, 1),
(550, 1676883556, 'test', 1, 1, 474, 'opal', 2.5056, 0.05, 2.5056, 0.1, 2.5056, 0.05, 2.5056, 0.05, 0, 0.2, 2.5056, 0.1, 2.5056, 0.05, 0, 0.2, 3, 2.4, 0, 2.5556, 1245.1, 1),
(551, 1676883571, 'test', 1, 1, 344, 'opal', 2.5, 0.2, 2.5, 0.05, 0, 0.2, 0, 0.05, 2.5, 0.1, 2.5, 0.1, 2.5, 0.05, 2.5, 0.05, 3, 2.4, 0, 0.2, 1245.26, 1),
(552, 1676883651, 'test', 0, 1, 506, 'opal', 2.5024, 0.05, 0, 0.2, 0, 0.05, 0, 0.2, 2.5024, 0.1, 2.5024, 0.05, 2.5024, 0.1, 0, 0.05, 3, 1.6, 0, 0.05, 1243.06, 1),
(553, 1676884179, 'test', 0, 1, 347, 'opal', 2.504, 0.05, 0, 0.2, 0, 0.1, 0, 0.05, 0, 0.1, 0, 0.05, 2.504, 0.2, 2.504, 0.05, 2, 1.2, 0, 0.2, 1241.51, 1),
(554, 1676885215, 'test', 0, 1, 312, 'opal', 2.5052, 0.05, 2.5052, 0.05, 2.5052, 0.1, 2.5052, 0.2, 2.5052, 0.05, 2.5052, 0.2, 2.5052, 0.05, 0, 0.1, 5, 2.8, 0, 2.5552, 1240.51, 1),
(555, 1676885329, 'test', 0, 1, 558, 'opal', 2.5, 0.1, 0, 0.2, 2.5, 0.05, 2.5, 0.05, 0, 0.05, 0, 0.05, 2.5, 0.1, 2.5, 0.2, 7, 2, 0, 2.6, 1240.26, 1),
(556, 1676885354, 'test', 1, 1, 756, 'emerald', 12.3824, 0.4, 12.3824, 0.2, 12.3824, 0.4, 12.3824, 0.2, 0, 0.2, 12.3824, 0.8, 12.3824, 0.2, 0, 0.8, 6, 2.4, 0, 13.1824, 1240.86, 1),
(557, 1676885589, 'test', 0, 1, 306, 'opal', 0, 0.05, 0, 0.1, 2.5024, 0.05, 2.5024, 0.2, 2.5024, 0.1, 2.5024, 0.05, 2.5024, 0.05, 2.5024, 0.2, 3, 2.4, 0, 2.5524, 1251.64, 1),
(558, 1676885637, 'test', 1, 1, 950, 'sapphire', 0, 8, 0, 2, 102.386, 2, 102.386, 4, 0, 2, 102.386, 2, 102.386, 8, 102.386, 4, 6, 2, 0, 104.386, 1251.8, 1),
(559, 1676885670, 'test', 0, 1, 403, 'opal', 2.502, 0.2, 0, 0.05, 2.502, 0.05, 2.502, 0.1, 2.502, 0.2, 2.502, 0.1, 0, 0.05, 2.502, 0.05, 6, 2.4, 0, 2.602, 1354.18, 1),
(560, 1676885685, 'test', 1, 1, 420, 'opal', 2.5, 0.05, 2.5, 0.1, 0, 0.05, 2.5, 0.05, 2.5, 0.2, 2.5, 0.2, 0, 0.05, 2.5, 0.1, 7, 2.4, 0, 0.05, 1354.38, 1),
(561, 1676886628, 'test', 0, 1, 214, 'opal', 2.5024, 0.1, 2.5024, 0.05, 2.5024, 0.05, 2.5024, 0.05, 2.5024, 0.2, 2.5024, 0.05, 2.5024, 0.1, 2.5024, 0.2, 2, 3.2, 0, 2.5524, 1350.78, 1),
(562, 1676886644, 'test', 1, 1, 316, 'opal', 2.5, 0.2, 2.5, 0.05, 2.5, 0.05, 2.5, 0.1, 2.5, 0.05, 2.5, 0.1, 2.5, 0.2, 2.5, 0.05, 2, 3.2, 0, 2.55, 1350.14, 1),
(563, 1676886726, 'test', 1, 1, 92, 'opal', 2.5, 0.2, 0, 0.1, 2.5, 0.05, 2.5, 0.05, 0, 0.2, 2.5, 0.1, 2.5, 0.05, 2.5, 0.05, 2, 2.4, 0, 0.1, 1349.49, 1),
(564, 1676886739, 'test', 0, 1, 844, 'emerald', 0, 0.4, 10.036, 0.8, 0, 0.2, 10.036, 0.2, 10.036, 0.8, 10.036, 0.4, 10.036, 0.2, 0, 0.2, 3, 2, 0, 0.2, 1347.19, 1),
(565, 1676886753, 'test', 1, 1, 141, 'opal', 2.5044, 0.1, 0, 0.1, 2.5044, 0.05, 0, 0.05, 2.5044, 0.2, 2.5044, 0.05, 2.5044, 0.2, 2.5044, 0.05, 4, 2.4, 0, 0.05, 1345.39, 1),
(566, 1676886763, 'test', 1, 1, 535, 'opal', 0, 0.05, 2.5068, 0.1, 2.5068, 0.2, 2.5068, 0.1, 2.5068, 0.05, 0, 0.05, 2.5068, 0.05, 2.5068, 0.2, 5, 2.4, 0, 2.5568, 1343.04, 1);

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
(2266, 1676752087, 'test', 21, 1, 37, 18, 15, 36, 45, 30, 12, 27, 36, 45, 37, 12, 27, '', 174.4, 1),
(2267, 1676885794, 'test', 42, 24, 34, 9, 44, 26, 4, 51, 47, 40, 26, 4, 34, 9, 40, '', 1350.78, 1);

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
(1, 'test', '81dc9bdb52d04dc20036dbd8313ed055', 'tester@test.com', 548.736, 4.2125, 1343.19, -593.213, 2183.69);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=567;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2268;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

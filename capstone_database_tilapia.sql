-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2024 at 04:11 PM
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
-- Database: `capstone_database_tilapia`
--

-- --------------------------------------------------------

--
-- Table structure for table `device_parameters`
--

CREATE TABLE `device_parameters` (
  `userDeviceSerial` varchar(255) NOT NULL,
  `temp_min` float DEFAULT NULL,
  `temp_max` float DEFAULT NULL,
  `ph_min` float DEFAULT NULL,
  `ph_max` float DEFAULT NULL,
  `tds_min` float DEFAULT NULL,
  `tds_max` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `device_parameters`
--

INSERT INTO `device_parameters` (`userDeviceSerial`, `temp_min`, `temp_max`, `ph_min`, `ph_max`, `tds_min`, `tds_max`) VALUES
('SEN91807724119', 20, 29, 7, 8, 200, 500);

-- --------------------------------------------------------

--
-- Table structure for table `registered_users`
--

CREATE TABLE `registered_users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userDeviceSerial` varchar(50) NOT NULL,
  `userOTP` varchar(10) NOT NULL,
  `userValidationStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`userID`, `userName`, `userEmail`, `userPassword`, `userDeviceSerial`, `userOTP`, `userValidationStatus`) VALUES
(27, 'Neil', '2021308181@dhvsu.edu.ph', '$2y$10$4QWHAmGRKjuAMe4OnLvb4OQWMBdu26PzuIeYWJ3Rc0FGFnE6Y.pgS', 'SEN91807724119', '689749', '1'),
(34, 'Neil Fajardo', 'neil.nitrousdx@gmail.com', '$2y$10$jMyXV./Fmejuc.mHSAI/n.L8zEKSTehcwFm7hXa6pDtnMB1A0Ystu', 'SEN91807724113', '297144', '1'),
(37, 'yul', 'yulgatch123@gmail.com', '$2y$10$pwbNiPnS/ki7GbVfj2BfqenTS4ebI4YRJnrEGHw/7L1qblyHuG1DC', 'SEN91807724119', '623392', '1'),
(38, 'yul123', '2021307932@dhvsu.edu.ph', '$2y$10$l/ePYhRKVnO.AVonFnkiK.A30woiuiOrZDEh7PTOfxQ8yfJMpbD1a', 'SEN91807724119', '537346', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sen91807724119`
--

CREATE TABLE `sen91807724119` (
  `id` int(11) NOT NULL,
  `temperature` float NOT NULL,
  `tds` float NOT NULL,
  `ph` float NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sen91807724119`
--

INSERT INTO `sen91807724119` (`id`, `temperature`, `tds`, `ph`, `timestamp`) VALUES
(1391, 29.5, 0, 6.895, '2024-09-14 17:34:39'),
(1392, 29.5, 0, 6.89346, '2024-09-14 17:34:50'),
(1393, 29.4375, 0, 6.89193, '2024-09-14 17:35:01'),
(1394, 29.5, 0, 6.89576, '2024-09-14 17:35:11'),
(1395, 29.5, 0, 6.89653, '2024-09-14 17:35:22'),
(1396, 29.5, 0, 6.89117, '2024-09-14 17:35:32'),
(1397, 29.5, 0, 6.89423, '2024-09-14 17:35:43'),
(1398, 29.5, 0, 6.8927, '2024-09-14 17:35:54'),
(1399, 29.5, 0, 6.88887, '2024-09-14 17:36:04'),
(1400, 29.5, 0, 6.89729, '2024-09-14 17:36:15'),
(1401, 29.5, 0, 6.89653, '2024-09-14 17:36:26'),
(1402, 29.5, 0, 6.88122, '2024-09-14 17:36:36'),
(1403, 29.5625, 0, 6.895, '2024-09-14 17:36:47'),
(1404, 29.5, 0, 6.89882, '2024-09-14 17:36:58'),
(1405, 29.5, 0, 6.89576, '2024-09-14 17:37:08'),
(1406, 29.5625, 0, 6.89882, '2024-09-14 17:37:19'),
(1407, 29.5625, 0, 6.89346, '2024-09-14 17:37:29'),
(1408, 29.5625, 0, 6.89423, '2024-09-14 17:37:40'),
(1409, 85, 0, 6.81155, '2024-09-14 17:38:54'),
(1410, 29.5625, 0, 6.87433, '2024-09-14 17:39:04'),
(1411, 29.5625, 0, 6.88122, '2024-09-14 17:39:15'),
(1412, 29.5625, 0, 6.88734, '2024-09-14 17:39:26'),
(1413, 29.5625, 0, 6.88964, '2024-09-14 17:39:36'),
(1414, 29.5625, 0, 6.88581, '2024-09-14 17:39:47'),
(1415, 29.5625, 0, 6.8927, '2024-09-14 17:39:58'),
(1416, 29.5625, 0, 6.8904, '2024-09-14 17:40:08'),
(1417, 29.5625, 0, 6.89117, '2024-09-14 17:40:19'),
(1418, 29.5625, 0, 6.89423, '2024-09-14 17:40:30'),
(1419, 29.5625, 0, 6.89193, '2024-09-14 17:40:40'),
(1420, 29.5, 0, 6.89729, '2024-09-14 17:40:51'),
(1421, 29.5625, 0, 6.89423, '2024-09-14 17:41:01'),
(1422, 29.5, 0, 6.89346, '2024-09-14 17:41:12'),
(1423, 29.5, 0, 6.88887, '2024-09-14 17:41:23'),
(1424, 29.5, 0, 6.88887, '2024-09-14 17:41:33'),
(1425, 29.5, 0, 6.88351, '2024-09-14 17:41:44'),
(1426, 29.5, 0, 6.89653, '2024-09-14 17:41:54'),
(1427, 29.5, 0, 6.88275, '2024-09-14 17:42:05'),
(1428, 85, 0, 6.6814, '2024-09-14 17:49:02'),
(1429, 29.4375, 0, 6.77174, '2024-09-14 17:49:12'),
(1430, 29.4375, 0, 6.81155, '2024-09-14 17:49:23'),
(1431, 29.4375, 0, 6.83528, '2024-09-14 17:49:33'),
(1432, 29.4375, 0, 6.84294, '2024-09-14 17:49:44'),
(1433, 29.4375, 0, 6.85212, '2024-09-14 17:49:55'),
(1434, 29.4375, 0, 6.86284, '2024-09-14 17:50:05'),
(1435, 29.4375, 0, 6.87126, '2024-09-14 17:50:16'),
(1436, 29.4375, 0, 6.87433, '2024-09-14 17:50:27'),
(1437, 30.5625, 0, 7.07873, '2024-09-16 12:20:12'),
(1438, 30.6875, 0, 7.09251, '2024-09-16 12:20:22'),
(1439, 30.6875, 0, 7.09481, '2024-09-16 12:20:33'),
(1440, 32.5, 0, 7.08103, '2024-09-16 12:20:43'),
(1441, 33.1875, 0, 7.10782, '2024-09-16 12:20:54'),
(1442, 33.5625, 0, 7.07644, '2024-09-16 12:21:05'),
(1443, 33.8125, 0, 7.09634, '2024-09-16 12:21:15'),
(1444, 33.9375, 0, 7.04352, '2024-09-16 12:21:26'),
(1445, 34, 0, 7.09864, '2024-09-16 12:21:37'),
(1446, 34.125, 0, 7.1017, '2024-09-16 12:21:47'),
(1447, 34.1875, 0, 7.07337, '2024-09-16 12:21:58'),
(1448, 34, 0, 7.11548, '2024-09-16 12:22:08'),
(1449, 33.625, 0, 7.06878, '2024-09-16 12:22:19'),
(1450, 33.25, 0, 7.05883, '2024-09-16 12:22:30'),
(1451, 33, 0, 7.08103, '2024-09-16 12:22:40'),
(1452, 32.8125, 0, 7.06801, '2024-09-16 12:22:51'),
(1453, 32.625, 0, 7.09328, '2024-09-16 12:23:02'),
(1454, 32.4375, 0, 7.06342, '2024-09-16 12:23:12'),
(1455, 32.6875, 0, 7.15376, '2024-09-17 06:27:33'),
(1456, 32.6875, 0, 7.12543, '2024-09-17 06:27:44'),
(1457, 32.6875, 0, 7.14381, '2024-09-17 06:27:54'),
(1458, 32.6875, 0, 7.13385, '2024-09-17 06:28:05'),
(1459, 32.625, 0, 7.15223, '2024-09-17 06:28:16'),
(1460, 32.625, 0, 7.14074, '2024-09-17 06:28:26'),
(1461, 32.625, 0, 7.1239, '2024-09-17 06:28:37'),
(1462, 32.5625, 0, 7.11931, '2024-09-17 06:28:48'),
(1463, 32.5625, 0, 7.14227, '2024-09-17 06:28:58'),
(1464, 32.5625, 0, 7.13232, '2024-09-17 06:29:09'),
(1465, 32.5625, 0, 7.1461, '2024-09-17 06:29:19'),
(1466, 32.5625, 0, 7.12849, '2024-09-17 06:29:30'),
(1467, 32.5, 0, 7.13615, '2024-09-17 06:29:41'),
(1468, 32.5, 0, 7.13156, '2024-09-17 06:29:51'),
(1469, 32.5, 0, 7.14687, '2024-09-17 06:30:02'),
(1470, 32.4375, 0, 7.12543, '2024-09-17 06:30:13'),
(1471, 32.4375, 0, 7.16218, '2024-09-17 06:30:23'),
(1472, 32.4375, 0, 7.14687, '2024-09-17 06:30:34'),
(1473, 32.4375, 0, 7.15146, '2024-09-17 06:30:45'),
(1474, 32.4375, 0, 7.13998, '2024-09-17 06:30:55'),
(1475, 32.4375, 0, 7.13921, '2024-09-17 06:31:08'),
(1476, 32.375, 0, 7.13309, '2024-09-17 06:31:18'),
(1477, 32.4375, 0, 7.1216, '2024-09-17 06:31:29'),
(1478, 32.375, 0, 7.12007, '2024-09-17 06:31:39'),
(1479, 32.375, 0, 7.13538, '2024-09-17 06:31:50'),
(1480, 32.375, 0, 7.13998, '2024-09-17 06:32:01'),
(1481, 32.375, 0, 7.13538, '2024-09-17 06:32:12'),
(1482, 32.375, 0, 7.13079, '2024-09-17 06:32:22'),
(1483, 32.375, 0, 7.13156, '2024-09-17 06:32:33'),
(1484, 32.375, 0, 7.13079, '2024-09-17 06:32:44'),
(1485, 32.375, 0, 7.13768, '2024-09-17 06:32:54'),
(1486, 32.375, 0, 7.13462, '2024-09-17 06:33:05'),
(1487, 32.3125, 0, 7.1461, '2024-09-17 06:33:16'),
(1488, 32.375, 0, 7.13692, '2024-09-17 06:33:26'),
(1489, 32.3125, 0, 7.14687, '2024-09-17 06:33:37'),
(1490, 32.3125, 0, 7.13692, '2024-09-17 06:33:47'),
(1491, 32.3125, 0, 7.13385, '2024-09-17 06:33:58'),
(1492, 32.375, 0, 7.13156, '2024-09-17 06:34:09'),
(1493, 85, 0, 7.15759, '2024-09-18 03:20:50'),
(1494, 29.875, 0, 7.15529, '2024-09-18 03:21:02'),
(1495, 29.875, 0, 7.15605, '2024-09-18 03:21:13'),
(1496, 30, 0, 7.15605, '2024-09-18 03:21:24'),
(1497, 32.125, 0, 7.16141, '2024-09-18 03:21:34'),
(1498, 33, 0, 7.1706, '2024-09-18 03:21:45'),
(1499, 33.375, 0, 7.16601, '2024-09-18 03:21:57'),
(1500, 33.6875, 0, 7.15605, '2024-09-18 03:22:08'),
(1501, 33.1875, 0, 7.16371, '2024-09-18 03:22:20'),
(1502, 32.5625, 0, 7.16294, '2024-09-18 03:22:31'),
(1503, 32.1875, 0, 7.16065, '2024-09-18 03:22:42'),
(1504, 31.875, 0, 7.16677, '2024-09-18 03:22:53'),
(1505, 31.6875, 0, 7.16754, '2024-09-18 03:23:04'),
(1506, 31.4375, 0, 7.15835, '2024-09-18 03:23:15'),
(1507, 31.25, 0, 7.15835, '2024-09-18 03:23:26'),
(1508, 31.125, 0, 7.15759, '2024-09-18 03:23:38'),
(1509, 31, 0, 7.1683, '2024-09-18 03:23:49'),
(1510, 30.875, 0, 7.16065, '2024-09-18 03:24:01'),
(1511, 30.8125, 0, 7.15529, '2024-09-18 03:24:12'),
(1512, 30.75, 0, 7.16677, '2024-09-18 03:24:24'),
(1513, 30.6875, 0, 7.16065, '2024-09-18 03:24:36'),
(1514, 30.625, 0, 7.17596, '2024-09-18 03:24:47'),
(1515, 30.5625, 0, 7.16141, '2024-09-18 03:24:59'),
(1516, 30.5, 0, 7.15605, '2024-09-18 03:25:10'),
(1517, 30.4375, 0, 7.15759, '2024-09-18 03:25:22'),
(1518, 30.4375, 0, 7.15605, '2024-09-18 03:25:33'),
(1519, 30.375, 0, 7.17826, '2024-09-18 03:25:44'),
(1520, 30.375, 0, 7.16065, '2024-09-18 03:25:56'),
(1521, 85, 0, 7.11471, '2024-09-18 03:26:15'),
(1522, 30.3125, 0, 7.14534, '2024-09-18 03:26:27'),
(1523, 30.3125, 0, 7.15299, '2024-09-18 03:26:38'),
(1524, 30.25, 0, 7.15376, '2024-09-18 03:26:50'),
(1525, 30.25, 0, 7.16294, '2024-09-18 03:27:01'),
(1526, 30.25, 0, 7.15988, '2024-09-18 03:27:13'),
(1527, 30.25, 0, 7.15759, '2024-09-18 03:27:24'),
(1528, 30.1875, 0, 7.16371, '2024-09-18 03:27:36'),
(1529, 30.25, 0, 7.15759, '2024-09-18 03:27:47'),
(1530, 30.1875, 0, 7.1706, '2024-09-18 03:27:59'),
(1531, 30.1875, 0, 7.16294, '2024-09-18 03:28:10'),
(1532, 30.1875, 0, 7.16294, '2024-09-18 03:28:21'),
(1533, 30.1875, 0, 7.15759, '2024-09-18 03:28:32'),
(1534, 30.1875, 0, 7.16983, '2024-09-18 03:28:43'),
(1535, 30.1875, 0, 7.15682, '2024-09-18 03:28:53'),
(1536, 30.25, 0, 7.16218, '2024-09-18 03:29:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `device_parameters`
--
ALTER TABLE `device_parameters`
  ADD PRIMARY KEY (`userDeviceSerial`);

--
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `sen91807724119`
--
ALTER TABLE `sen91807724119`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sen91807724119`
--
ALTER TABLE `sen91807724119`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1537;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

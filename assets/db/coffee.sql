-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2022 at 08:00 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ItemID` int(11) NOT NULL,
  `Item_Name` varchar(200) NOT NULL,
  `Price_Default` int(11) NOT NULL,
  `Item_Image` varchar(500) NOT NULL,
  `Category_Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ItemID`, `Item_Name`, `Price_Default`, `Item_Image`, `Category_Name`) VALUES
(1, 'B.Beans Americano ', 3500, 'americano.png', 'coffee'),
(16, 'Mocha Cookie Crumble Frappuccino', 6700, 'mocha_cookie_crumble_frappuccino.png', 'milk'),
(18, 'Ginga Bread Latte', 3500, 'gingerbread_latte.png', 'coffee'),
(19, 'Original Mocha', 4500, 'mocha.png', 'coffee'),
(20, 'Iced GreenTea Latte', 5500, 'iced_greentea_latte.png', 'tea'),
(34, 'Iced Black Tea ', 9000, 'Iced-Black-Tea.png', 'tea');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `User_Name` varchar(200) NOT NULL,
  `User_Email` varchar(200) NOT NULL,
  `User_StaffID` varchar(100) NOT NULL,
  `User_Position` text NOT NULL,
  `User_Branch` varchar(200) NOT NULL,
  `User_Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `User_Name`, `User_Email`, `User_StaffID`, `User_Position`, `User_Branch`, `User_Password`) VALUES
(1, 'Calsey Haung', 'haung123@gmail.com', 'bean0001', 'Assistant', 'JunctionCity / Yangon', 'haung123#'),
(2, 'Travis Scott', 'scott123@icloud.com', 'bean0009', 'helper', 'Yankin Plaza/ Yangon', 'scott123#'),
(3, 'Olivia Anderson', 'olivia@outlook.com', 'bean0008', 'Helper', '36th Street, Kyauktadar Township', 'olivia123#'),
(5, 'Isabella Foster', 'isabella@icloud.com', 'bean0019', 'Assistant Manager', 'Juction City', 'isabella123#'),
(7, 'Bella Throne', 'throne123@gmail.com', 'bean0022', 'Assistant ', 'Junction Square/Yangon', 'throne123#'),
(8, 'Jackson Wang', 'wang123@icloud.com', 'bean0021', 'Branch Manager', 'GamonePawint (SanyeikNyein)', 'wang123#'),
(12, 'Jessica Samentha', 'jessi55@gmail.com', 'bean0099', 'Accountant ', '36th street, Kyauktadar', 'jessica'),
(13, 'Aye Chan Phyo', 'ayechanphyo4602@gmail.com', 'Bean0004', 'Manager', 'Time city', 'treasure123#'),
(14, 'Chris Hemsworth', 'chris123@gmail.com', 'bean0008', 'Helper ', 'Time City', 'chris123#'),
(15, 'Chris Evans', 'evan123@icloud.com', 'bean0089', 'Helper', 'Hledan Center', 'evan123#'),
(16, 'Tom Holland ', 'holland123@gmail.com', 'bean0022', 'Assistant', 'Junction Square ', 'tom123# ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ItemID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

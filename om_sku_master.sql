-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2022 at 06:06 PM
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
-- Database: `pos1`
--

-- --------------------------------------------------------

--
-- Table structure for table `om_sku_master`
--

CREATE TABLE `om_sku_master` (
  `ProductID` int(11) NOT NULL,
  `SKUMaster` int(11) NOT NULL,
  `ProductName` varchar(222) NOT NULL,
  `CatID` int(11) NOT NULL,
  `SubCatID` int(11) NOT NULL,
  `sDesc` varchar(500) NOT NULL,
  `ProductType` varchar(222) NOT NULL,
  `InvoicingPolicy` varchar(222) NOT NULL,
  `SalesPrice` int(11) NOT NULL,
  `TaxID` int(11) NOT NULL,
  `Cost` int(11) NOT NULL,
  `InternalReference` varchar(500) NOT NULL,
  `Barcode` varchar(222) NOT NULL,
  `ProductTagID` varchar(500) NOT NULL,
  `InternalNotes` varchar(1000) NOT NULL,
  `AvailableInPOS` tinyint(1) NOT NULL,
  `ToWeightWithScale` tinyint(1) NOT NULL,
  `VendorID` int(11) NOT NULL,
  `CustomerTax` int(11) NOT NULL,
  `ControlPolicy` bit(22) NOT NULL,
  `IncomeAccountID` int(11) NOT NULL,
  `ExpenseAccountID` int(11) NOT NULL,
  `PriceDifferentAccountID` int(11) NOT NULL,
  `RemovalStrategyID` int(11) NOT NULL,
  `CostingMethodID` int(11) NOT NULL,
  `InventoryValuationID` int(11) NOT NULL,
  `isActive` bit(1) NOT NULL,
  `isDelete` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `om_sku_master`
--

INSERT INTO `om_sku_master` (`ProductID`, `SKUMaster`, `ProductName`, `CatID`, `SubCatID`, `sDesc`, `ProductType`, `InvoicingPolicy`, `SalesPrice`, `TaxID`, `Cost`, `InternalReference`, `Barcode`, `ProductTagID`, `InternalNotes`, `AvailableInPOS`, `ToWeightWithScale`, `VendorID`, `CustomerTax`, `ControlPolicy`, `IncomeAccountID`, `ExpenseAccountID`, `PriceDifferentAccountID`, `RemovalStrategyID`, `CostingMethodID`, `InventoryValuationID`, `isActive`, `isDelete`) VALUES
(42, 3542, 'RK 61', 3, 5, '', 'Consumable', 'Deliver', 805434, 1, 7565, 'idk', 'code903490', 'rk,keyboard', 'dssd', 0, 2, 1, 0, b'1111111111111111111111', 0, 0, 0, 0, 0, 0, b'0', b'0'),
(84, 623184, 'hoco 360 speaker 1.2', 62, 31, '', 'storable', 'Ordered quantities', 25000, 2, 20000, 'ocean blue , 360, surrounding sound', 'speaker8458', 'speaker,hoco', 'no remark for this item...', 0, 0, 5, 1, b'1111111111111111111111', 1, 1, 1, 0, 0, 0, b'0', b'0'),
(155, 6244155, 'jbl et-805', 62, 44, '', 'Service', 'Ordered quantities', 27500, 0, 25000, 'srtg', 'w45t', 'speaker,jbl', 'sfdrgs', 0, 2, 2, 0, b'1111111111111111111111', 0, 0, 0, 0, 0, 0, b'0', b'0'),
(156, 11156, 'iPhone 12 Pro Max', 1, 1, '', 'Consumable', 'Delivered quantities', 2750000, 10, 2700000, 'iPhone 12 Pro Max 256GB', '', 'iphone,apple', '', 0, 2, 6, 0, b'1111111111111111111111', 0, 0, 0, 0, 0, 0, b'0', b'0'),
(157, 143157, 'One Plus 7 T', 1, 43, '', 'Consumable', 'Ordered quantities', 980000, 0, 900000, 'aedsf', 'ee59687', 'phone,oneplus', 'sdfg', 1, 2, 3, 0, b'1111111111111111111111', 0, 0, 0, 0, 0, 0, b'0', b'0'),
(177, 8050177, 'Logitech G x Herman Miller Embody ', 80, 50, '', 'storable', 'Delivered quantities', 580000, 0, 500000, 'black, collboration', 'chair2454', 'gaming chair,logitech,embody', 'Seat type: Task chairMaterial: Multi-layer fabricSeat height: 17–22 inchWeight capacity: 136kg (300lbs)Weight: 23kg (51lbs)Warranty: 12-year', 1, 2, 1, 0, b'1111111111111111111111', 0, 0, 0, 0, 0, 0, b'0', b'0'),
(185, 6851185, 'MisFit 2021', 68, 51, '', 'service', 'Delivered quantities', 50000, 2, 48000, 'gd', 'watch894569', 'watch,misfit', 'dftgh', 1, 0, 6, 0, b'1111111111111111111111', 0, 0, 0, 0, 0, 0, b'0', b'0'),
(186, 6244186, 'jbl baby loud 34', 62, 44, '', 'service', 'Delivered quantities', 44000, 0, 40000, 'jbl speaker', 'speaker9847569', 'jbl,speaker', 'remark', 1, 2, 4, 0, b'1111111111111111111111', 0, 0, 0, 0, 0, 0, b'0', b'0'),
(187, 35187, 'Royal Kludge material keyboard', 3, 5, '', 'storable', 'Ordered quantities', 78900, 0, 70000, 'dsf', 'rk43859045', 'keyboard,rk', 'dgthtyury', 1, 0, 5, 0, b'0000000000000000000000', 0, 0, 0, 0, 0, 0, b'0', b'0'),
(188, 11188, 'iphone SE ', 1, 1, '', 'service', 'Ordered quantities', 1900000, 0, 1800000, 'red / silver/', 'phone4897590', 'iphone,apple,se', 'no remark', 1, 2, 6, 0, b'0000000000000000000000', 0, 0, 0, 0, 0, 0, b'0', b'0'),
(189, 452189, 'Redmi Notepad', 4, 52, '', 'Storable', 'Delivered qunatities', 770000, 0, 700000, 'fgsrESDZ', 'sae', 'redmi,tablet', '', 1, 2, 34, 0, b'1111111111111111111111', 0, 0, 0, 0, 0, 0, b'0', b'0'),
(225, 6244225, 'SCDWS', 62, 44, '', 'consumable', '', 2, 0, 2, '', '', '', '', 0, 0, 0, 0, b'1111111111111111111111', 0, 0, 0, 0, 0, 0, b'0', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `om_sku_master`
--
ALTER TABLE `om_sku_master`
  ADD PRIMARY KEY (`ProductID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `om_sku_master`
--
ALTER TABLE `om_sku_master`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

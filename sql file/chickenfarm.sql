-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2021 at 05:29 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chickenfarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(30) NOT NULL,
  `adminname` varchar(200) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminname`, `password`) VALUES
(1, 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `billtb`
--

CREATE TABLE `billtb` (
  `billid` int(12) NOT NULL,
  `salesid` varchar(20) NOT NULL,
  `salesno` varchar(300) NOT NULL,
  `phoneno` varchar(12) NOT NULL,
  `name` varchar(300) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `finalprice` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `consumption`
--

CREATE TABLE `consumption` (
  `conid` int(20) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(100) NOT NULL,
  `qty` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumption`
--

INSERT INTO `consumption` (`conid`, `date`, `type`, `qty`) VALUES
(61, '2021-09-04', 'medicine type1', 20);

-- --------------------------------------------------------

--
-- Table structure for table `eggstock`
--

CREATE TABLE `eggstock` (
  `eggid` int(12) NOT NULL,
  `date` date NOT NULL,
  `eggcount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eggstock`
--

INSERT INTO `eggstock` (`eggid`, `date`, `eggcount`) VALUES
(28, '2021-09-04', 200);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `puid` int(20) NOT NULL,
  `stockname` varchar(200) NOT NULL,
  `sellername` varchar(300) NOT NULL,
  `puquantity` int(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`puid`, `stockname`, `sellername`, `puquantity`, `date`) VALUES
(30, 'food', 'charlie@gmail.com', 100, '2021-09-04 20:47:42'),
(31, 'medicine', 'george@gmail.com', 200, '2021-09-04 20:47:52'),
(32, 'medicine type1', 'george@gmail.com', 260, '2021-09-04 20:48:02'),
(33, 'bird', 'charlie@gmail.com', 1000, '2021-09-04 20:49:41'),
(34, 'bird', 'charlie@gmail.com', 500, '2021-09-04 20:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `salesid` int(20) NOT NULL,
  `salesno` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `phoneno` varchar(12) NOT NULL,
  `name` varchar(200) NOT NULL,
  `type` varchar(20) NOT NULL,
  `qty` int(200) NOT NULL,
  `price` int(50) NOT NULL,
  `total` int(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `final_amt` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`salesid`, `salesno`, `date`, `phoneno`, `name`, `type`, `qty`, `price`, `total`, `status`, `final_amt`) VALUES
(59, 'SALENO001', '2021-09-04 15:20:51', '809765335', 'John', 'bird', 100, 190, 19000, 'confirm', 19250),
(60, 'SALENO001', '2021-09-04 15:20:51', '809765335', 'John', 'egg', 50, 5, 250, 'confirm', 19250),
(61, 'SALENO002', '2021-09-04 15:22:42', '8987656645', 'james', 'egg', 20, 5, 100, 'confirm', 100);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `sellerid` int(20) NOT NULL,
  `sellerno` varchar(20) NOT NULL,
  `sellername` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contactno` varchar(12) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gender` varchar(13) NOT NULL,
  `gstno` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`sellerid`, `sellerno`, `sellername`, `email`, `contactno`, `address`, `gender`, `gstno`) VALUES
(12, 'S001', 'charlie', 'charlie@gmail.com', '9898767654', 'charlie house,kulshekar, mangalore 575005', 'male', '653772866363'),
(13, 'S002', 'george', 'george@gmail.com', '8693625536', '101, John Brook Apartment', 'male', '79797097098');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffid` int(20) NOT NULL,
  `staffno` varchar(20) NOT NULL,
  `staffname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contactno` varchar(12) NOT NULL,
  `address` varchar(300) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffid`, `staffno`, `staffname`, `email`, `contactno`, `address`, `gender`, `password`) VALUES
(7, 'E001', 'Jack', 'jack@gmail.com', '8978656654', 'jack house,kulshekar, mangalore 575005', 'male', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stockid` int(20) NOT NULL,
  `stockno` varchar(20) NOT NULL,
  `stockname` varchar(300) NOT NULL,
  `category` varchar(20) NOT NULL,
  `quantity` int(14) NOT NULL,
  `price` int(20) NOT NULL,
  `stock` int(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stockid`, `stockno`, `stockname`, `category`, `quantity`, `price`, `stock`) VALUES
(1, 'ST01', 'bird', 'sales', 1000, 190, 1400),
(4, 'ST02', 'egg', 'sales', 2000, 5, 130),
(8, 'ST04', 'food', 'consumption', 500, 50, 100),
(9, 'ST05', 'medicine', 'consumption', 500, 100, 200),
(10, 'ST06', 'medicine type1', 'consumption', 100, 200, 240);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billtb`
--
ALTER TABLE `billtb`
  ADD PRIMARY KEY (`billid`);

--
-- Indexes for table `consumption`
--
ALTER TABLE `consumption`
  ADD PRIMARY KEY (`conid`);

--
-- Indexes for table `eggstock`
--
ALTER TABLE `eggstock`
  ADD PRIMARY KEY (`eggid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`puid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`salesid`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`sellerid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffid`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stockid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billtb`
--
ALTER TABLE `billtb`
  MODIFY `billid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `consumption`
--
ALTER TABLE `consumption`
  MODIFY `conid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `eggstock`
--
ALTER TABLE `eggstock`
  MODIFY `eggid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `puid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `salesid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `sellerid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stockid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

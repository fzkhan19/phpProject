-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2022 at 03:54 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmerbuddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied_schemes`
--

CREATE TABLE `applied_schemes` (
  `id` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  `sid` int(255) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending',
  `applied_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applied_schemes`
--

INSERT INTO `applied_schemes` (`id`, `uid`, `sid`, `status`, `applied_on`) VALUES
(1, 7, 3, 'Verified', '2022-04-23'),
(2, 7, 5, 'Pending', '2022-04-23'),
(3, 7, 2, 'Rejected', '2022-04-23'),
(4, 2, 3, 'Pending', '2022-04-23'),
(5, 2, 2, 'Pending', '2022-04-23'),
(6, 2, 7, 'Pending', '2022-04-25'),
(7, 2, 8, 'Pending', '2022-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `news` text NOT NULL,
  `img` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending',
  `added_by` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `news`, `img`, `status`, `added_by`, `date`) VALUES
(3, 'Practical 4', 'ajdklasjlda\r\nsda\r\nsd\r\nas', 'phpDA52.tmpScreenshot (53).png', 'Verified', 4, '2022-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `id` int(255) NOT NULL,
  `cid` int(255) NOT NULL,
  `dd` int(2) NOT NULL,
  `mm` int(2) NOT NULL,
  `yyyy` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `amount` int(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`id`, `cid`, `dd`, `mm`, `yyyy`, `name`, `amount`, `status`) VALUES
(1, 2, 15, 1, 2021, 'Rice', 12, 'Verified'),
(4, 2, 1, 7, 2015, 'Wheat', 50, 'Verified'),
(5, 2, 15, 1, 2016, 'Rice', 100, 'Verified'),
(6, 2, 15, 1, 2017, 'Rice', 80, 'Verified'),
(7, 2, 21, 7, 2017, 'Paddy ', 20, 'Verified'),
(8, 2, 22, 1, 2016, 'Rice', 70, 'Verified'),
(9, 2, 1, 1, 2018, 'Rice', 120, 'Rejected'),
(10, 2, 29, 7, 2018, 'Rice', 200, 'Rejected'),
(11, 2, 12, 1, 2019, 'Wheat', 80, 'Verified'),
(12, 2, 14, 7, 2019, 'Corn', 120, 'Verified');

-- --------------------------------------------------------

--
-- Table structure for table `schemes`
--

CREATE TABLE `schemes` (
  `id` int(255) NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `upload_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `name` varchar(1000) NOT NULL,
  `vision` text NOT NULL,
  `benefits` text NOT NULL,
  `last_date` date NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'Pending',
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schemes`
--

INSERT INTO `schemes` (`id`, `uploaded_by`, `upload_date`, `name`, `vision`, `benefits`, `last_date`, `status`, `img`) VALUES
(1, 4, '2022-04-12 08:40:06.111538', 'All in one', 'We will provide.. Pakka', 'UPTO 6 lakh.. terms and condition applied*', '2022-04-15', 'Pending', 'php8D75.tmpScreenshot (3).png'),
(2, 4, '2022-04-23 19:09:39.056444', 'Aklajsd aks', 'kajhdk dashd kas hdka hsdkja hsdka shd\r\nasdf\r\nas\r\nf\r\nsd\r\nfa\r\nsdfjhsd \r\nds fhalsdfhklasjfdlkjsdfkjalksjdf \r\n', '69281\r\n27391\r\n823\r\n', '2022-04-30', 'Verified', 'php77FE.tmpScreenshot (6).png'),
(3, 4, '2022-04-23 19:10:55.266687', 'Sab ka sath', 'yah it true...', '120Rs.', '2022-04-23', 'Verified', 'php9907.tmpScreenshot (12).png'),
(5, 4, '2022-04-23 19:10:53.364078', 'PM Kisan Scheme', 'Under the scheme, the Centre transfers an amount of Rs 6,000 per year, in three equal instalments, directly into the bank accounts of all landholding farmers irrespective of the size of their land holdings.', 'Under the scheme, the Centre transfers an amount of Rs 6,000 per year, in three equal instalments, directly into the bank accounts of all landholding farmers irrespective of the size of their land holdings.', '2022-04-30', 'Verified', 'php63AC.tmpdownload.jpg'),
(6, 4, '2022-04-23 19:10:45.970267', 'ABCD', 'this is test', '1200', '2022-04-24', 'Rejected', 'php8FA1.tmpdownload.jpg'),
(7, 4, '2022-04-25 04:30:11.615467', 'Pradhan-Mantri-Krishi-Sinchai-Yojana', 'test', '7000', '2022-04-28', 'Verified', 'php5D78.tmpPradhan-Mantri-Krishi-Sinchai-Yojana.png'),
(8, 4, '2022-04-25 04:35:46.177641', 'e nam', 'test', '1200', '2022-04-30', 'Verified', 'php5FF1.tmpenam.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `type` varchar(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `type`, `username`, `password`) VALUES
(1, 'admin', 'admin@fb.com', 'Admin', 'admin', 'admin'),
(2, 'Shahrukh', 'sk@gmail.com', 'Farmer', 'sk', '123'),
(3, 'test', 'test@FB.COM', 'Farmer', 'test', 'test'),
(4, 'Faiz Khan', 'fz@gmail.com', 'Employee', 'fz', '123'),
(6, 'Kanta Ben', 'KantaSwaager@gmail.com', 'Farmer', 'kanta', '123'),
(7, 'Kamla', 'kamla@gmail.com', 'Farmer', 'kam', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applied_schemes`
--
ALTER TABLE `applied_schemes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Foreign key news` (`added_by`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Foreign key` (`cid`);

--
-- Indexes for table `schemes`
--
ALTER TABLE `schemes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Foreign key scheme` (`uploaded_by`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applied_schemes`
--
ALTER TABLE `applied_schemes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `schemes`
--
ALTER TABLE `schemes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applied_schemes`
--
ALTER TABLE `applied_schemes`
  ADD CONSTRAINT `applied_schemes_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `applied_schemes_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `schemes` (`id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `Foreign key news` FOREIGN KEY (`added_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `production`
--
ALTER TABLE `production`
  ADD CONSTRAINT `Foreign key` FOREIGN KEY (`cid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schemes`
--
ALTER TABLE `schemes`
  ADD CONSTRAINT `Foreign key scheme` FOREIGN KEY (`uploaded_by`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

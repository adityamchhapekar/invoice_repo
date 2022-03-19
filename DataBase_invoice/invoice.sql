-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2022 at 04:36 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `creator`
--

CREATE TABLE `creator` (
  `c_id` int(11) NOT NULL,
  `c_fname` varchar(50) NOT NULL,
  `c_lname` varchar(50) NOT NULL,
  `c_num` bigint(50) NOT NULL,
  `c_email` varchar(50) NOT NULL,
  `c_user` varchar(120) NOT NULL,
  `c_pass` varchar(120) NOT NULL,
  `currency` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `creator`
--

INSERT INTO `creator` (`c_id`, `c_fname`, `c_lname`, `c_num`, `c_email`, `c_user`, `c_pass`, `currency`) VALUES
(1, 'Nagarjuna Aditya', 'chhapekar saheb', 787878787, 'aditya@gmail.com', 'adibhai008', 'adibhai008', 'INR'),
(2, 'Aditya', 'chhapekar', 7083199407, 'aditya@gmail.com', 'adibhai007', 'adibhai007', 'INR'),
(3, 'aditya', '', 0, '', '', '', 'INR'),
(4, 'aditya', 'chhapekar', 787878787, 'aditya@gmail.com', '', '', 'INR'),
(5, 'aditya', 'chhapekar', 787878787, 'aditya@gmail.com', '', '', 'INR'),
(6, 'aditya', 'chhapekar', 787878787, 'aditya@gmail.com', '', '', '£'),
(56, 'klk', 'klk', 787878787, 'k@gmail.com', '', '', '£'),
(57, 'kl', 'kl', 787878787, 'aditya@gmail.com', '', '', '$'),
(58, 'lkll', 'klkl', 787878787, 'ad@gmail.com', '', '', ''),
(59, 'KALSKASLas', 'as', 123213123, 'aditya@gmail.com', '', '', ''),
(60, 'KALSKASLas', 'as', 123213123, 'aditya@gmail.com', '', '', ''),
(61, 'as', 'ALSK', 787878787, 'aditya@gmail.com', '', '', ''),
(62, 'as', 'ALSK', 787878787, 'aditya@gmail.com', '', '', ''),
(63, 'klk', 'kl', 787878787, 'a@gmail.com', '', '', ''),
(64, 'as', 'as', 0, 'as', '', '', ''),
(65, 'jk', 'jk', 10, 'kj@gmail.com', '', '', ''),
(66, 'kj', 'kj', 0, 'kj', '', '', ''),
(67, 'kj', 'kj', 0, 'kj@gmail.com', '', '', ''),
(68, 'ind', 'ind', 787878787, 'ind', 'ind', '1', 'INR'),
(69, 'adi', 'adi', 10, 'aditya@gmail.com', 'adi', '10', 'â‚¬'),
(70, 'zz', 'zz', 787878787, 'aditya@gmail.com', 'zz', '121', 'Â£'),
(71, 'ZXC', 'zxc', 787878787, 'aditya@gmail.com', '', '121', 'â‚¬'),
(72, 'l', 'l', 787878787, 'aditya@gmail.com', 'l', '121', 'â‚¬');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_table`
--

CREATE TABLE `invoice_table` (
  `in_id` int(11) NOT NULL,
  `in_fk` int(11) NOT NULL,
  `creator_fk` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `item_name` varchar(120) NOT NULL,
  `qauntity` int(120) NOT NULL,
  `price` int(120) NOT NULL,
  `total` int(120) NOT NULL,
  `discount` varchar(120) NOT NULL,
  `taxable_val` varchar(120) NOT NULL,
  `rate_a` varchar(120) NOT NULL,
  `val_a` varchar(120) NOT NULL,
  `rate_b` varchar(120) NOT NULL,
  `val_b` varchar(120) NOT NULL,
  `f_total` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_table`
--

INSERT INTO `invoice_table` (`in_id`, `in_fk`, `creator_fk`, `date`, `item_name`, `qauntity`, `price`, `total`, `discount`, `taxable_val`, `rate_a`, `val_a`, `rate_b`, `val_b`, `f_total`) VALUES
(96, 451, 1, '2021-02-02 08:00:21', 'testproduct', 10, 10, 100, '10', '90', '6', '5.4', '6', '5.4', '100.80000000000001'),
(97, 452, 1, '2021-02-03 14:10:17', 'p1', 10, 10, 100, '20', '80', '6', '4.8', '6', '4.8', '89.6'),
(98, 453, 1, '2021-02-03 14:11:06', 'p2', 10, 12, 120, '20', '100', '6', '6', '6', '6', '112'),
(99, 453, 1, '2021-02-03 14:11:06', 'p2p', 12, 21, 252, '10', '242', '6', '14.52', '6', '14.52', '271.03999999999996'),
(100, 454, 1, '2021-02-04 08:25:29', 'asas', 121, 121, 14641, '1', '14640', '1', '146.4', '1', '146.4', '14932.8'),
(101, 455, 1, '2021-02-07 08:04:21', 'xc', 10, 10, 100, '10', '90', '10', '9', '10', '9', '108'),
(102, 456, 1, '2021-02-07 13:53:29', 'as', 10, 10, 100, '10', '90', '10', '9', '10', '9', '108');

-- --------------------------------------------------------

--
-- Table structure for table `p_data`
--

CREATE TABLE `p_data` (
  `p_id` int(11) NOT NULL,
  `c_fk` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_lname` varchar(50) NOT NULL,
  `p_dr` varchar(50) NOT NULL,
  `p_num` bigint(12) NOT NULL,
  `total_form_rows` int(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_data`
--

INSERT INTO `p_data` (`p_id`, `c_fk`, `p_name`, `p_lname`, `p_dr`, `p_num`, `total_form_rows`) VALUES
(451, 1, 'testing', 'test name', 'test dr', 101223, 1),
(452, 1, 'c1', 'c1', 'c1', 1, 1),
(453, 1, 'c2', 'c2', 'c2', 23, 2),
(454, 1, 'lklk', 'llk', 'lkl', 2121, 1),
(455, 1, 'xz', 'xzxz', 'xzxz', 10, 6),
(456, 1, 'a', 'a', 'as', 10, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `creator`
--
ALTER TABLE `creator`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `invoice_table`
--
ALTER TABLE `invoice_table`
  ADD PRIMARY KEY (`in_id`),
  ADD KEY `in_fk` (`in_fk`),
  ADD KEY `creator_fk` (`creator_fk`);

--
-- Indexes for table `p_data`
--
ALTER TABLE `p_data`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `c_fk` (`c_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `creator`
--
ALTER TABLE `creator`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `invoice_table`
--
ALTER TABLE `invoice_table`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `p_data`
--
ALTER TABLE `p_data`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=457;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice_table`
--
ALTER TABLE `invoice_table`
  ADD CONSTRAINT `invoice_table_ibfk_1` FOREIGN KEY (`in_fk`) REFERENCES `p_data` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_table_ibfk_2` FOREIGN KEY (`creator_fk`) REFERENCES `creator` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p_data`
--
ALTER TABLE `p_data`
  ADD CONSTRAINT `p_data_ibfk_1` FOREIGN KEY (`c_fk`) REFERENCES `creator` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

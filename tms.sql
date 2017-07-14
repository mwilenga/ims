-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2017 at 01:10 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tms_assigned`
--

CREATE TABLE `tms_assigned` (
  `id` int(11) NOT NULL,
  `truck_id` varchar(30) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `date_assigned` date NOT NULL,
  `load_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_assigned`
--

INSERT INTO `tms_assigned` (`id`, `truck_id`, `driver_id`, `date_assigned`, `load_id`, `status`) VALUES
(3, 'T 200 ADC', 1, '2017-05-01', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tms_customer`
--

CREATE TABLE `tms_customer` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_customer`
--

INSERT INTO `tms_customer` (`id`, `customer_name`, `contact`, `location`) VALUES
(1, 'Festus mwilenga', '0786744253', 'Mbeya'),
(2, 'Julis mwakajeba', '0716810817', 'DSM'),
(3, 'Victoria stations', '255766997745', 'Tabata - DSM');

-- --------------------------------------------------------

--
-- Table structure for table `tms_drivers`
--

CREATE TABLE `tms_drivers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `licence_class` varchar(10) NOT NULL,
  `contact` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_drivers`
--

INSERT INTO `tms_drivers` (`id`, `name`, `licence_class`, `contact`) VALUES
(1, 'addy eddie', 'A', '0718229229'),
(2, 'Festus mwilenga', 'B', '0656121885'),
(3, 'Hamis Rajabu', 'C', '0656132453');

-- --------------------------------------------------------

--
-- Table structure for table `tms_expenses`
--

CREATE TABLE `tms_expenses` (
  `id` int(11) NOT NULL,
  `truck` varchar(30) NOT NULL,
  `cost` int(11) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `month` varchar(30) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_expenses`
--

INSERT INTO `tms_expenses` (`id`, `truck`, `cost`, `description`, `date`, `month`, `year`) VALUES
(1, 'T432 BDC', 40000, 'Bonet repair', '0000-00-00', '05', 2017),
(2, 'T564 CDF', 40000, 'bonet repair', '0000-00-00', '05', 2017),
(3, 'T 200 ADK', 600000, 'truck repair', '2017-05-07', '05', 2017),
(4, 'T 765 ACE', 200000, 'oile requiired', '2017-05-07', '05', 2017),
(5, 'T 234 ACC', 200000, 'required', '2017-05-04', '05', 2017),
(6, 'T 324 ADE', 180000, 'Required to repair', '2017-05-05', '05', 2017),
(7, 'T 564 AFD', 400000, 'Oil ilitakiwa kwa safari', '2017-05-08', '05', 2017),
(8, 'T 324 ADE', 40000, 'Gear box need for service', '2017-05-07', '05', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `tms_income`
--

CREATE TABLE `tms_income` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `descrip` text NOT NULL,
  `price` int(11) NOT NULL,
  `month` varchar(30) NOT NULL,
  `year` int(11) NOT NULL,
  `truck` varchar(30) NOT NULL,
  `trailer` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_income`
--

INSERT INTO `tms_income` (`id`, `date`, `descrip`, `price`, `month`, `year`, `truck`, `trailer`) VALUES
(1, '2017-05-01', 'tuhusjsjjjsjjs', 3000000, '05', 2017, '32', ''),
(2, '2017-05-06', '', 300000, '05', 2017, 'T 234 ACC', ''),
(3, '2017-05-06', '', 2000000, '05', 2017, 'T 200 ADC', 'T 234 ACC');

-- --------------------------------------------------------

--
-- Table structure for table `tms_items`
--

CREATE TABLE `tms_items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `barcode` varchar(30) NOT NULL,
  `qnty` int(11) NOT NULL,
  `o_qnty` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `supplier` varchar(30) NOT NULL,
  `part_no` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `received_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_items`
--

INSERT INTO `tms_items` (`id`, `item_name`, `barcode`, `qnty`, `o_qnty`, `cost`, `supplier`, `part_no`, `date`, `received_by`) VALUES
(1, 'Bonet', '65426211', 10, 21, 20000, 'Festus mwilenga', '7727', '2017-05-04', ''),
(2, 'Grille', '652652', 7, 17, 400000, 'Kalist kolesen', '542', '2017-05-04', ''),
(3, 'Head lamp', '3421', 1, 12, 30000, 'Kalist kolesen', '342', '2017-05-04', ''),
(4, 'TAA ZA NYUMA', '', 2, 4, 300000, 'Kalist kolesen', '9857', '2017-05-07', 'Mahmood Abdallah'),
(5, 'FILTER OIL', '', 1, 5, 200000, 'Kelly Hilson', '786', '2017-05-03', 'Addy Eddie'),
(6, 'GEARBOX', '5635376754', 4, 6, 20000, 'Kelly Hilson', '23342', '2017-05-06', 'Peter Msechu');

-- --------------------------------------------------------

--
-- Table structure for table `tms_item_in_history`
--

CREATE TABLE `tms_item_in_history` (
  `id` int(11) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `barcode` varchar(30) NOT NULL,
  `qnty` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `supplier` varchar(30) NOT NULL,
  `part_no` varchar(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_item_in_history`
--

INSERT INTO `tms_item_in_history` (`id`, `item_name`, `barcode`, `qnty`, `cost`, `supplier`, `part_no`, `date`) VALUES
(1, 'Bonet', '56252', 5, 20000, 'Kalist kolesen', '89325', '2017-05-04'),
(2, 'Bonet', '42642', 6, 20000, 'Festus mwilenga', '97367', '2017-05-04'),
(3, 'Bonet', '77253', 2, 20000, 'Festus mwilenga', '875', '2017-05-04'),
(4, 'Bonet', '65353', 2, 20000, 'Festus mwilenga', '7637', '2017-05-04'),
(5, 'Bonet', '78386736', 11, 20000, 'Festus mwilenga', '8763', '2017-05-04'),
(7, 'Grille', '534435', 5, 400000, 'Kalist kolesen', '77', '2017-05-04'),
(8, 'TAA ZA NYUMA', '', 4, 300000, 'Kalist kolesen', '9857', '2017-05-07'),
(9, 'FILTER OIL', '', 5, 200000, 'Kelly Hilson', '786', '2017-05-03'),
(10, 'GEARBOX', '5635376754', 6, 20000, 'Kelly Hilson', '23342', '2017-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `tms_loads`
--

CREATE TABLE `tms_loads` (
  `id` int(11) NOT NULL,
  `trailer` varchar(30) NOT NULL,
  `load_from` varchar(30) NOT NULL,
  `load_to` varchar(30) NOT NULL,
  `customer` varchar(30) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  `assigned_date` varchar(30) NOT NULL,
  `assigned_truck` varchar(30) NOT NULL,
  `assigned_driver` varchar(30) NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_loads`
--

INSERT INTO `tms_loads` (`id`, `trailer`, `load_from`, `load_to`, `customer`, `cargo`, `price`, `date`, `status`, `assigned_date`, `assigned_truck`, `assigned_driver`, `return_date`) VALUES
(1, '', 'DSM', 'IRINGA', 'Victoria stations', '', 1000000, '2017-05-01', 2, '', 'T 234 ACC', 'Hamis Rajabu', '2017-05-02'),
(2, '', 'DSM', 'Arusha', 'Victoria stations', '0718229229', 2000000, '2017-04-30', 2, '', 'T 200 ADC', 'Festus mwilenga', '2017-05-01'),
(3, '', 'DSM', 'Kenya', 'Victoria stations', '076553425', 3000000, '2017-05-03', 2, '', 'T 200 ADC', 'Hamis Rajabu', '2017-05-01'),
(4, '', 'DSM', 'Kigoma', 'Victoria stations', '054654236', 2000000, '2017-05-08', 2, '', 'T 200 ADC', 'Hamis Rajabu', '2017-05-09'),
(5, '', 'DSM', 'Iringa', 'Victoria stations', '095243242', 2500000, '2017-05-01', 2, '', 'T 200 ADC', 'Julius Mwakajeba', '2017-05-03'),
(6, 'T 234 ACC', 'DSM', 'ARUSHA', 'VICTORIA STATIONS', 'TRANSPORTING TIMBER', 2000000, '2017-05-08', 1, '', 'T 200 ADC', 'Festus mwilenga', '0000-00-00'),
(7, '', 'DSM', 'DODOMA', 'VICTORIA STATIONS', '', 300000, '2017-05-09', 2, '', 'T 234 ACC', 'Festus mwilenga', '2017-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `tms_stock_take`
--

CREATE TABLE `tms_stock_take` (
  `id` int(11) NOT NULL,
  `item` varchar(30) NOT NULL,
  `qnt` int(11) NOT NULL,
  `truck` varchar(30) NOT NULL,
  `dat` date NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` int(11) NOT NULL,
  `jobcad` varchar(30) NOT NULL,
  `auth_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_stock_take`
--

INSERT INTO `tms_stock_take` (`id`, `item`, `qnt`, `truck`, `dat`, `month`, `year`, `jobcad`, `auth_by`) VALUES
(1, 'Taa za mbele', 2, 'T200 ADC', '2017-05-04', '05', 2017, '', ''),
(2, 'Bumper', 1, 'T123 ACF', '2017-05-04', '05', 2017, '', ''),
(3, 'Bonet', 2, 'T432 BDC', '2017-05-04', '05', 2017, '', ''),
(4, 'Bonet', 2, 'T564 CDF', '2017-05-04', '05', 2017, '', ''),
(5, 'Head lamp', 1, 'T564 CDF', '2017-05-05', '05', 2017, '', ''),
(6, 'TAA ZA NYUMA', 2, 'T 200 ADK', '2017-05-07', '05', 2017, '', ''),
(7, 'FILTER OIL', 1, 'T 765 ACE', '2017-05-07', '05', 2017, '', ''),
(8, 'FILTER OIL', 1, 'T 234 ACC', '2017-05-04', '05', 2017, '', ''),
(9, 'BONET', 9, 'T 324 ADE', '2017-05-05', '05', 2017, 'S0123', 'Julius Mwakajeba'),
(10, 'FILTER OIL', 2, 'T 564 AFD', '2017-05-08', '05', 2017, 'HG5346', 'Rodney Swai'),
(11, 'GEARBOX', 2, 'T 324 ADE', '2017-05-07', '05', 2017, 'FH5463', 'Julius Mwakajeba');

-- --------------------------------------------------------

--
-- Table structure for table `tms_supplier`
--

CREATE TABLE `tms_supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_supplier`
--

INSERT INTO `tms_supplier` (`id`, `name`, `contact`, `email`, `location`) VALUES
(1, 'Festus mwilenga', '0712342543', 'festusflowin@gmail.com', 'Dsm-msewe'),
(2, 'Kalist kolesen', '078654342', 'k@gmail.com', 'Dsm'),
(3, 'Kelly Hilson', '0654353632', 'kelly@gmail.com', 'Dsm');

-- --------------------------------------------------------

--
-- Table structure for table `tms_trucks`
--

CREATE TABLE `tms_trucks` (
  `truck_id` varchar(50) NOT NULL,
  `truck_name` varchar(50) NOT NULL,
  `truck_model` varchar(30) NOT NULL,
  `truck_color` varchar(30) NOT NULL,
  `body_type` varchar(30) NOT NULL,
  `fuels` varchar(30) NOT NULL,
  `chasis_no` varchar(50) NOT NULL,
  `purchase_date` date NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `policy_no` varchar(30) NOT NULL,
  `insurence_type` varchar(50) NOT NULL,
  `supplier_contact` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `commence_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `ins_date` date NOT NULL,
  `ins_exp` date NOT NULL,
  `su_price` int(11) NOT NULL,
  `su_date` date NOT NULL,
  `su_exp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_trucks`
--

INSERT INTO `tms_trucks` (`truck_id`, `truck_name`, `truck_model`, `truck_color`, `body_type`, `fuels`, `chasis_no`, `purchase_date`, `supplier`, `policy_no`, `insurence_type`, `supplier_contact`, `price`, `commence_date`, `expire_date`, `ins_date`, `ins_exp`, `su_price`, `su_date`, `su_exp`) VALUES
('T 200 ADC', 'SCANIA', '', '', '', '', '', '2017-01-01', '', '', '', '', 0, '2017-01-01', '2015-08-04', '0000-00-00', '0000-00-00', 0, '0000-00-00', '0000-00-00'),
('T 200 ADK', '', '', '', '', '', '', '2017-05-04', '', '', '', '', 0, '2017-01-01', '2015-08-04', '2017-01-01', '2017-01-01', 0, '2017-01-01', '2015-08-04'),
('T 234 ACC', 'SCANIA', '', '', '', '', '', '2017-05-01', '', '', '', '', 0, '2017-01-01', '2015-08-04', '0000-00-00', '0000-00-00', 0, '0000-00-00', '0000-00-00'),
('T 324 ADE', 'SCANIA', '', '', '', '', '', '2017-01-01', '', '', '', '', 0, '2017-01-01', '2015-08-04', '0000-00-00', '0000-00-00', 0, '0000-00-00', '0000-00-00'),
('T 564 AFD', 'SCANIA', '', 'Green', 'Lory', 'Petrol', 'AS2314', '2017-01-01', 'Mohamed Trans', 'ACD4352', 'Permanent', '0765342534', 10000000, '2017-01-01', '2015-08-04', '0000-00-00', '0000-00-00', 0, '0000-00-00', '0000-00-00'),
('T 765 ACE', 'SCANIA', '', '', '', '', '', '0000-00-00', '', '', '', '', 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tms_users`
--

CREATE TABLE `tms_users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(30) DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL,
  `phone` varchar(30) NOT NULL,
  `up_auth` int(11) NOT NULL,
  `create_auth` int(11) NOT NULL,
  `del_auth` int(11) NOT NULL,
  `view_auth` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_users`
--

INSERT INTO `tms_users` (`id`, `name`, `username`, `password`, `role`, `status`, `phone`, `up_auth`, `create_auth`, `del_auth`, `view_auth`) VALUES
(1, 'Peter Msechu', 'admin', '21232f297a57a5a743894a0e4a801fc3 ', 'Admin', 'Yes', '', 1, 1, 0, 0),
(2, 'Abdallah Tangawizi', 'stock', '908880209a64ea539ae8dc5fdb7e0a91', 'Stock Manager', 'Yes', '', 0, 0, 0, 1),
(3, 'Adam Mgomba', 'amgomba123', '590c81789bf56', 'Logistic Operator', '', '0656121885', 0, 1, 0, 0),
(5, 'Julius Mwakajeba', 'jmwakajeba21', '590c81789bf56', 'Super User', 'Yes', '0716810817', 1, 1, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tms_assigned`
--
ALTER TABLE `tms_assigned`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tms_customer`
--
ALTER TABLE `tms_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tms_expenses`
--
ALTER TABLE `tms_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tms_income`
--
ALTER TABLE `tms_income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tms_items`
--
ALTER TABLE `tms_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tms_item_in_history`
--
ALTER TABLE `tms_item_in_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tms_loads`
--
ALTER TABLE `tms_loads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tms_stock_take`
--
ALTER TABLE `tms_stock_take`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tms_trucks`
--
ALTER TABLE `tms_trucks`
  ADD PRIMARY KEY (`truck_id`);

--
-- Indexes for table `tms_users`
--
ALTER TABLE `tms_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tms_customer`
--
ALTER TABLE `tms_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tms_expenses`
--
ALTER TABLE `tms_expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tms_income`
--
ALTER TABLE `tms_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tms_items`
--
ALTER TABLE `tms_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tms_item_in_history`
--
ALTER TABLE `tms_item_in_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tms_loads`
--
ALTER TABLE `tms_loads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tms_stock_take`
--
ALTER TABLE `tms_stock_take`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tms_users`
--
ALTER TABLE `tms_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

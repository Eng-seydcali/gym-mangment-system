-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2024 at 05:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym_ms`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `idcard` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `fingerprint_data` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `idcard`, `name`, `phone`, `fingerprint_data`, `status`, `date`) VALUES
(4, 'CUS001', 'Mohamed Abshir Ali ', '612374687', 'jjs78487hs8s78t8', 0, '2024-11-23 00:00:00'),
(5, 'CUS002', 'Cumar Bashiir Mohamed', '616376757', 'sjfhsllskjflkjoikl', 1, '2024-11-24 00:00:00'),
(6, 'CUS003', 'Muuse Geele Axmed', '616376758', 'djfhjdhgjk', 0, '2024-11-26 00:00:00'),
(7, 'CUS004', 'Galaal Cabdi Cawad', '614897988', 'sjfhsllskjflkjoikl', 1, '2024-11-27 00:00:00'),
(8, 'CUS005', 'Maryamo Maxamed warsame', '618812005', 'kjdshfklhlksd', 0, '2024-11-27 17:21:28');

--
-- Triggers `customer`
--
DELIMITER $$
CREATE TRIGGER `idcard_gen_cus` AFTER INSERT ON `customer` FOR EACH ROW BEGIN

INSERT INTO cus_id(customer_id) VALUES(new.idcard);

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer_notification`
--

CREATE TABLE `customer_notification` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cus_id`
--

CREATE TABLE `cus_id` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cus_id`
--

INSERT INTO `cus_id` (`id`, `customer_id`) VALUES
(1, 'CUS001'),
(2, 'CUS002'),
(3, 'CUS003'),
(4, 'CUS004'),
(5, 'CUS005');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `idcard` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `position` varchar(100) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `perifillage` tinyint(4) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `idcard`, `name`, `phone`, `position`, `salary`, `perifillage`, `date`) VALUES
(5, 'EMP001', 'Cabdiqani Ciise Cilmi', '613768976', 'Coach', 100.00, 1, '2024-11-23 00:00:00'),
(11, 'EMP002', 'Mohamed Abshir Ali ', '613475787', 'Shaqaale', 100.00, 0, '2024-11-24 00:00:00'),
(12, 'EMP003', 'Mohamed AbdiAziiz Arab', '616451688', 'Coach', 400.00, 1, '2024-11-24 00:00:00'),
(13, 'EMP004', 'Cali Bashiir Maxamuud', '613846982', 'Coach', 400.00, 1, '2024-11-26 00:00:00');

--
-- Triggers `employee`
--
DELIMITER $$
CREATE TRIGGER `idcard_gen` AFTER INSERT ON `employee` FOR EACH ROW BEGIN

INSERT INTO emp_id(employee_id) VALUES(new.idcard);

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `emp_id`
--

CREATE TABLE `emp_id` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_id`
--

INSERT INTO `emp_id` (`id`, `employee_id`) VALUES
(1, 'EMP001'),
(2, 'EMP002'),
(3, 'EMP003'),
(4, 'EMP004');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `expense_type` int(11) NOT NULL,
  `To` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `expense_type`, `To`, `amount`, `employee_id`, `date`) VALUES
(3, 1, 0, 100.00, 5, '2024-11-26 00:00:00'),
(4, 1, 0, 10.00, 5, '2024-11-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `expense_type`
--

CREATE TABLE `expense_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expense_type`
--

INSERT INTO `expense_type` (`id`, `name`, `date`) VALUES
(1, 'Salary', '2024-11-21 00:00:00'),
(2, 'Utility', '2024-11-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_profit`
--

CREATE TABLE `monthly_profit` (
  `id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `income` decimal(10,2) NOT NULL,
  `expense` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `end_date` datetime NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `customer_id`, `amount`, `employee_id`, `end_date`, `date`) VALUES
(26, 4, 15.00, 5, '2024-11-27 21:37:12', '2024-11-27 21:30:22'),
(29, 6, 25.00, 5, '2024-11-28 05:29:00', '2024-11-27 21:36:59'),
(30, 6, 20.00, 5, '2024-11-28 05:29:52', '2024-11-28 05:25:59'),
(31, 8, 15.00, 5, '2024-11-29 19:37:10', '2024-11-29 18:43:34'),
(32, 6, 10.00, 5, '2024-12-31 19:41:16', '2024-11-25 19:41:20'),
(33, 5, 15.00, 5, '2024-11-30 19:56:28', '2024-11-29 19:56:34'),
(34, 7, 10.00, 5, '2024-11-30 19:57:02', '2024-11-25 19:57:07'),
(35, 8, 100.00, 5, '2024-12-29 19:57:21', '2024-11-29 19:57:32');

--
-- Triggers `payment`
--
DELIMITER $$
CREATE TRIGGER `activate` AFTER INSERT ON `payment` FOR EACH ROW BEGIN
UPDATE customer SET STATUS = "1" WHERE Id  = new.customer_id;


END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `date`) VALUES
(1, 'Admin', '2024-11-22 00:00:00'),
(2, 'User', '2024-11-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `employee_id`, `username`, `password`, `role_id`, `status`, `date`) VALUES
(5, 5, 'casanyo', '393c1bc5bec0497e9aa92e2d31d405b0', 1, 1, '2024-11-23 00:00:00'),
(6, 12, 'carab', '0c23db7ce46e19dbe6d2d269b86eafbe', 2, 1, '2024-11-24 00:00:00'),
(7, 13, 'cali', '332b0067d56c1ffa015ddc477b80c50b', 2, 1, '2024-11-26 00:00:00');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `give_privillage` AFTER INSERT ON `user` FOR EACH ROW BEGIN

UPDATE employee SET perifillage	= '1' WHERE id=new.employee_id;

END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idcard` (`idcard`);

--
-- Indexes for table `customer_notification`
--
ALTER TABLE `customer_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `cus_id`
--
ALTER TABLE `cus_id`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_id` (`customer_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `idcard` (`idcard`);

--
-- Indexes for table `emp_id`
--
ALTER TABLE `emp_id`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expense_type` (`expense_type`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `expense_type`
--
ALTER TABLE `expense_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_profit`
--
ALTER TABLE `monthly_profit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer_notification`
--
ALTER TABLE `customer_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cus_id`
--
ALTER TABLE `cus_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `emp_id`
--
ALTER TABLE `emp_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expense_type`
--
ALTER TABLE `expense_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `monthly_profit`
--
ALTER TABLE `monthly_profit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_notification`
--
ALTER TABLE `customer_notification`
  ADD CONSTRAINT `customer_notification_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `expense_ibfk_1` FOREIGN KEY (`expense_type`) REFERENCES `expense_type` (`id`),
  ADD CONSTRAINT `expense_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

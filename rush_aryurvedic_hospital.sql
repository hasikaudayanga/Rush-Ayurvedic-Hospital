-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2024 at 02:03 PM
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
-- Database: `rush_aryurvedic_hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoinments_info`
--

CREATE TABLE `appoinments_info` (
  `appoinment_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `consultation_id` int(11) DEFAULT NULL,
  `appoinment_date_time` date DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `comments` varchar(200) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL COMMENT '0 - pending, 1 - approved , 2 - rejected, 3- completed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appoinments_info`
--

INSERT INTO `appoinments_info` (`appoinment_id`, `patient_id`, `consultation_id`, `appoinment_date_time`, `doctor_id`, `comments`, `status_id`) VALUES
(3, 1005, 1006, '2024-11-19', 2, 'testing', 3),
(13, 1005, 1004, '2024-11-27', 7, 'test comment hasika', 2),
(38, 1005, 1004, '2024-11-02', 2, 'harshana madushanka', 2),
(55, 1006, 1009, '2024-12-06', 2, 'Yoga', 3),
(57, 1006, 1006, '2024-12-07', 24, 'Akila', 2),
(59, 1011, 1004, '2024-12-06', 24, 'Hasika', 3),
(61, 1005, 1004, '2024-12-13', 2, 'Done', 3),
(64, 1006, 1006, '2024-12-12', 2, 'Hasika', 3),
(65, 1005, 1006, '2024-12-18', 2, 'Hasika', 3),
(66, 1005, 1004, '2024-12-25', 2, 'Test comment', 3),
(68, 1007, 1007, '2024-12-14', 2, 'no good', 3),
(71, 1011, 1028, '2024-12-20', 24, 'Hasika', 3);

-- --------------------------------------------------------

--
-- Table structure for table `consultation_types`
--

CREATE TABLE `consultation_types` (
  `consultation_id` int(11) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `treatments` varchar(250) DEFAULT NULL,
  `consultation_fee` decimal(10,2) DEFAULT NULL,
  `status_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultation_types`
--

INSERT INTO `consultation_types` (`consultation_id`, `description`, `treatments`, `consultation_fee`, `status_id`) VALUES
(1002, 'General health consultation', 'Basic health checkup, advice on diet and lifestyle', 2500.00, ''),
(1004, ' consultation', ' advice on diet and lifestyle', 3500.00, '1005'),
(1006, 'akhil yoga', 'akhil special', 7000.00, '1'),
(1007, 'test hasika', 'hasika special', 3500.00, '1'),
(1009, 'Yoga', 'Yoga Treatment', 5000.00, '1'),
(1021, 'theropy', 'Yoga Treatment', 10000.00, '1'),
(1022, 'panchakarma', 'panchakarma treatment', 3500.00, '1'),
(1027, 'physio', 'physio', 5000.00, '1'),
(1028, 'Treatment', 'Treatment', 10000.00, '1');

-- --------------------------------------------------------

--
-- Table structure for table `doctors_info`
--

CREATE TABLE `doctors_info` (
  `doctor_reg_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `consultation_id` int(11) DEFAULT NULL,
  `job_description` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `contact_number` varchar(11) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `doctor_charge` decimal(10,2) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `passwords` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors_info`
--

INSERT INTO `doctors_info` (`doctor_reg_id`, `first_name`, `last_name`, `consultation_id`, `job_description`, `address`, `contact_number`, `email_address`, `doctor_charge`, `user_name`, `passwords`) VALUES
(2, 'John', 'Doe', 1004, 'General Practitioner', '123 Health St, Wellness City', '0771234567', 'john.doe@example.com', 150.50, 'johndoe', 'securepassword123'),
(7, 'kumara', 'thirimadura', 1004, 'doctor', 'thissa road, katharagama', '0778765345', 'kuma345@gmail.com', 4500.00, 'kum5678', '7654'),
(17, 'sharhrukh ', 'khan', 1004, 'india', 'dhilhi india', '0776778776', 'kuma34577@gmail.com', 4500.00, 'sssm56787', '2343'),
(23, 'jagath', 'thirimadura', 1004, 'Yoga', 'colombo road, maharagama', '0776778776', 'kuma34577@gmail.com', 3500.00, 'roshan', '12244'),
(24, 'Hasika', 'Udayanga', 1004, 'Hasika', 'Sooriyawewa', '0710174506', 'hasika@gmail.com', 4500.00, 'Hasika', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `feedback_comment` varchar(250) DEFAULT NULL,
  `feedback_rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `patient_id`, `feedback_comment`, `feedback_rating`) VALUES
(8, 1005, 'Satisfied', 4),
(9, 1005, 'Very Satisfied', 5),
(10, 1005, 'Satisfied', 4),
(11, 1005, 'Satisfied', 4),
(12, 1005, 'Very Satisfied', 5),
(13, 1005, 'Very Satisfied', 5),
(14, 1005, 'Normal Service', 3),
(17, 1011, 'Superb', 5),
(19, 1011, 'Supper', 5);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `appoinment_id` int(11) DEFAULT NULL,
  `total_charge` decimal(20,5) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients_info`
--

CREATE TABLE `patients_info` (
  `patient_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `contact_number` varchar(11) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `passwords` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients_info`
--

INSERT INTO `patients_info` (`patient_id`, `first_name`, `last_name`, `address`, `age`, `contact_number`, `email_address`, `user_name`, `passwords`) VALUES
(1005, 'hasitha', 'maduranga', 'galle road panadura', 34, '0776545678', 'kha@gmail.com', 'hasitha45', '66665353'),
(1006, 'kasun', 'kalhara', 'thissa road monaragala', 27, '0776797566', 'nbv@gmail.com', 'kasun876', '09876'),
(1007, 'hasitha', 'maduranga', 'thissa road monaragala', 32, '0776545678', 'nbv@gmail.com', 'hasitha4588', '544333'),
(1011, 'Hasika', 'Udayanga', '0', NULL, '0710174506', 'hasika@gmail.com', 'Hasika', '123'),
(1013, 'Rashmi', 'Erandika', '0', NULL, '0710174763', 'Rashmi@gmail.com', 'Rashmi', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `staff_info`
--

CREATE TABLE `staff_info` (
  `staff_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `job_description` varchar(50) DEFAULT NULL,
  `contact_number` varchar(11) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `passwords` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_info`
--

INSERT INTO `staff_info` (`staff_id`, `first_name`, `last_name`, `address`, `age`, `job_description`, `contact_number`, `email_address`, `user_name`, `passwords`) VALUES
(3, 'sharhrukh ', 'thirimadura', 'thissa road, katharagama', 60, 'nurse', '0775645376', 'kuma34577@gmail.com', 'jag5678', 'kjhghg45'),
(7, 'jagath', 'jayasooriya', 'thissa road, katharagama', 54, 'nurse', '0776778776', 'jaga345@gmail.com', 'username', 'bhshs'),
(8, 'Hasika', 'Udayanga', 'Colombo', 30, 'Admin', '+9471017450', 'hasika@gmail.com', 'hasika', '123'),
(9, 'Kalpana', 'jayathunga', 'Kandy', 35, 'Nurse', '0776778776', 'Kalpana@gmail.com', 'Kalpana', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appoinments_info`
--
ALTER TABLE `appoinments_info`
  ADD PRIMARY KEY (`appoinment_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `consultation_id` (`consultation_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `consultation_types`
--
ALTER TABLE `consultation_types`
  ADD PRIMARY KEY (`consultation_id`);

--
-- Indexes for table `doctors_info`
--
ALTER TABLE `doctors_info`
  ADD PRIMARY KEY (`doctor_reg_id`),
  ADD KEY `consultation_id` (`consultation_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `appoinment_id` (`appoinment_id`);

--
-- Indexes for table `patients_info`
--
ALTER TABLE `patients_info`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `staff_info`
--
ALTER TABLE `staff_info`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appoinments_info`
--
ALTER TABLE `appoinments_info`
  MODIFY `appoinment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `consultation_types`
--
ALTER TABLE `consultation_types`
  MODIFY `consultation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1031;

--
-- AUTO_INCREMENT for table `doctors_info`
--
ALTER TABLE `doctors_info`
  MODIFY `doctor_reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients_info`
--
ALTER TABLE `patients_info`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1015;

--
-- AUTO_INCREMENT for table `staff_info`
--
ALTER TABLE `staff_info`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appoinments_info`
--
ALTER TABLE `appoinments_info`
  ADD CONSTRAINT `appoinments_info_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients_info` (`patient_id`),
  ADD CONSTRAINT `appoinments_info_ibfk_2` FOREIGN KEY (`consultation_id`) REFERENCES `consultation_types` (`consultation_id`),
  ADD CONSTRAINT `appoinments_info_ibfk_3` FOREIGN KEY (`doctor_id`) REFERENCES `doctors_info` (`doctor_reg_id`);

--
-- Constraints for table `doctors_info`
--
ALTER TABLE `doctors_info`
  ADD CONSTRAINT `doctors_info_ibfk_1` FOREIGN KEY (`consultation_id`) REFERENCES `consultation_types` (`consultation_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients_info` (`patient_id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`appoinment_id`) REFERENCES `appoinments_info` (`appoinment_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

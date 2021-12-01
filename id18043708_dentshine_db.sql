-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 01, 2021 at 11:17 AM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id18043708_dentshine_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointmenttb`
--

CREATE TABLE `appointmenttb` (
  `ap_id_pk` int(11) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `ap_type` varchar(150) NOT NULL,
  `treatment_id_fk` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `date` date NOT NULL,
  `mobile_no` int(11) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 1,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointmenttb`
--

INSERT INTO `appointmenttb` (`ap_id_pk`, `patient_name`, `ap_type`, `treatment_id_fk`, `email`, `age`, `date`, `mobile_no`, `reason`, `is_read`, `is_active`) VALUES
(1, 'Rahul(NEW CASE)', 'Routine Appointments', 5, 'rahul7654.chaudhari@gmail.com', 23, '2021-12-02', 2147483647, 'Root Canal Treatment', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_booktb`
--

CREATE TABLE `appointment_booktb` (
  `ap_book_id_pk` int(11) NOT NULL,
  `patient_id_fk` int(11) NOT NULL,
  `treatment_id_fk` int(11) NOT NULL,
  `doctor_id_fk` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(100) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_booktb`
--

INSERT INTO `appointment_booktb` (`ap_book_id_pk`, `patient_id_fk`, `treatment_id_fk`, `doctor_id_fk`, `date`, `time`, `reason`, `is_active`) VALUES
(1, 22, 5, 1, '2021-12-02', '12:00', 'Root Canal Treatment', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contactustb`
--

CREATE TABLE `contactustb` (
  `contact_id_pk` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 1,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactustb`
--

INSERT INTO `contactustb` (`contact_id_pk`, `name`, `email`, `subject`, `message`, `is_read`, `is_active`) VALUES
(1, 'Nehal Patel', 'pateln038@gmail.com', 'Root Canal', 'Charges of Root Canal', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctortb`
--

CREATE TABLE `doctortb` (
  `doctor_id_pk` int(11) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `mobile_no` int(11) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `charges` varchar(255) NOT NULL,
  `doctor_image` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctortb`
--

INSERT INTO `doctortb` (`doctor_id_pk`, `doctor_name`, `gender`, `age`, `degree`, `experience`, `mobile_no`, `email_id`, `charges`, `doctor_image`, `is_active`) VALUES
(1, 'Dr. Pujal', 'female', 40, 'M.D', '5 years', 2147483647, 'dr.pujal@gmail.com', '300', 'upload/IMG_DOCTOR384.jpg', 1),
(2, 'Dr. Veer', 'male', 40, 'MSD,MDS', '5 years', 2147483647, 'dr.veer@gmail.com', '250', 'upload/IMG_DOCTOR705.jpg', 1),
(3, 'Dr. Kritika', 'female', 39, 'BSD,MSD', '3 years', 907353782, 'dr.kritika@gamil.com', '800', 'upload/IMG_DOCTOR426.jpg', 1),
(4, 'Dr. Mohit', 'male', 37, 'BSD,MSD', '3 years', 2147483647, 'dr.mohit@gmail.com', '400', 'upload/IMG_DOCTOR804.jpg', 1),
(5, 'Dr. Nitin', 'male', 38, 'BScD,MMSc', '4 years', 2147483647, 'dr.nitin@gmail.com', '750', 'upload/IMG_DOCTOR461.jpg', 1),
(6, 'Dr. Ridhhi', 'female', 34, 'BDent,SMF', '4 years', 2147483647, 'dr.ridhhi@gmail.com', '900', 'upload/IMG_DOCTOR160.jpg', 1),
(7, 'Dr. Payal', 'female', 40, 'BDS,MS', '7 years', 2147483647, 'dr.payal@gmail.com', '850', 'upload/IMG_DOCTOR997.jpg', 1),
(8, 'Dr. Rahul', 'male', 45, 'BDS,MDS', '9 years', 2147483647, 'dr.rahul@gmail.com', '300', 'upload/IMG_DOCTOR907.png', 1),
(22, 'Dr. Nehal', 'male', 45, 'BHMS', '15', 123456798, 'nehalpatel@gmail.com', '450', 'upload/IMG_DOCTOR517.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patienttb`
--

CREATE TABLE `patienttb` (
  `patient_id_pk` int(11) NOT NULL,
  `case_id` varchar(255) DEFAULT NULL,
  `patient_name` varchar(255) NOT NULL,
  `gender` varchar(250) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `mobile_no` int(11) DEFAULT NULL,
  `email_id` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patienttb`
--

INSERT INTO `patienttb` (`patient_id_pk`, `case_id`, `patient_name`, `gender`, `age`, `mobile_no`, `email_id`, `address`, `picture`, `is_active`) VALUES
(1, 'CASE-36', 'Hinal', 'female', 24, 2147483647, 'hinal1@gamil.com', 'Adajan', 'upload/patient_name325.jpg', 1),
(2, 'CASE-546', 'Kinjal', 'female', 21, 907645352, 'kinjalpatel.kp39@gmail.com', 'Piplod', 'upload/patient_name715.jpg', 1),
(3, 'CASE-276', 'Drashti', 'female', 21, 2147483647, 'drashtisweet612@gmail.com', 'Vesu', 'upload/patient_name579.jpg', 1),
(4, 'CASE-153', 'Hetvi', 'female', 22, 907343434, 'hetvipatel6885@gmail.com', 'Umra', 'upload/patient_name156.jpg', 1),
(5, 'CASE-888', 'Komal', 'female', 34, 9836473, 'patelkomal.5709@gmail.com', 'Rander', 'upload/patient_name64.jpg', 1),
(22, 'CASE-547', 'Rahul', 'male', 23, 2147483647, 'rahul7654.chaudhari@gmail.com', 'Adajan', 'upload/patient_name487.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `treatmenttb`
--

CREATE TABLE `treatmenttb` (
  `treatment_id_pk` int(11) NOT NULL,
  `treatment_name` varchar(255) NOT NULL,
  `doctor_id_fk` int(11) NOT NULL,
  `treatment_charges` varchar(250) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `treatment_pic` varchar(300) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `treatmenttb`
--

INSERT INTO `treatmenttb` (`treatment_id_pk`, `treatment_name`, `doctor_id_fk`, `treatment_charges`, `description`, `treatment_pic`, `is_active`) VALUES
(1, 'Fillings', 1, '3500/-', '   To treat a cavity your dentist will remove the decayed portion of the tooth and then \"fill\" the area on the tooth where the decayed material was removed. Fillings are also used to repair cracked or broken teeth and teeth that have been worn down from misuse', 'upload/treatment_pic122.png', 1),
(2, 'Crowns and Caps', 2, '9000/-', '  Dental crowns are used to repair teeth that have been badly damaged by decay or injury. As a dental restoration, crowns are pretty much the only things that save damaged teeth from extraction.Your teeth can lose their shape or size. Dental crowns are tooth-shaped “caps” that can be placed over your tooth. Think of it like a snug hat for your tooth. The crown restores the tooth’s shape, size, strength and appearance.', 'upload/treatment_pic937.png', 1),
(3, 'Teeth Whitening', 3, '1000/-', 'Teeth whitening is a process of removing stains from the tooth surface and restoring the natural color of the teeth. Whitening is a one-time procedure performed by a dentist. It is amongst the most common and widely adopted cosmetic procedure.', 'upload/treatment_pic727.png', 1),
(4, 'Dental and Implants', 4, '2500/-', '  The dental implant refers to a small titanium root that is placed in your jawbone. The bone then heals around this and an abutment is placed on top. This sits above the gum line and performs the important job of bonding the artificial tooth to the titanium root.                                                 ', 'upload/treatment_pic602.png', 1),
(5, 'Root Canals', 5, '5000/-', 'Root canal treatment is designed to eliminate bacteria from the infected root canal, prevent reinfection of the tooth and save the natural tooth. When one. undergoes a root canal, the inflamed or infected pulp is removed and the. inside of the tooth is carefully cleaned and disinfected, then filled and sealed.                                            ', 'upload/treatment_pic876.png', 1),
(6, 'scaling and root planning', 6, '3000/-', 'scaling and root planningcaling and root planing involves the removal of plaque, hardened tartar (calculus), and stains from a patient’s teeth and tooth roots. The cost of scaling and root planing (deep cleanings) depends on the dentist’s location and whether or not the patient has insurance.Scaling and root planing (deep cleaning) is a restorative dental procedure involving the removal of plaque and calculus (tartar) stuck above and below the gumline.                                             ', 'upload/treatment_pic853.png', 1),
(7, 'Dental Sealants', 7, '2500/-', '  By covering the grooves and divots in your tooth surfaces with a protective layer, you can be better protected against the risk of cavities. This process can be beneficial for children, especially on back teeth that are harder to reach with routine brushing.                                                  ', 'upload/treatment_pic222.png', 1),
(8, 'Dental Bridges', 8, '5000/-', ' If you have one or more missing teeth, a bridge may be a good option to restore your smile. With this procedure, the teeth on either side of your missing tooth will be prepared as anchor teeth, ready to be fitted with a crown, with a replacement tooth occupying the space vacated by your missing tooth.                                                   ', 'upload/treatment_pic8.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertb`
--

CREATE TABLE `usertb` (
  `user_id_pk` int(11) NOT NULL,
  `user_type` varchar(150) NOT NULL,
  `user_id_fk` int(11) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertb`
--

INSERT INTO `usertb` (`user_id_pk`, `user_type`, `user_id_fk`, `user_email`, `user_password`) VALUES
(1, 'admin', 0, 'admin@gmail.com', 'admin'),
(2, 'patient', 1, '', ''),
(3, 'doctor', 2, 'dr.veer@gmail.com', 'doctor'),
(4, 'doctor', 3, 'dr.kritika@gamil.com', 'doctor'),
(5, 'doctor', 4, 'dr.mohit@gmail.com', 'doctor'),
(6, 'doctor', 5, 'dr.nitin@gmail.com', 'doctor'),
(7, 'doctor', 6, 'dr.nidhi@gmail.com', 'doctor'),
(8, 'doctor', 7, 'dr.payal@gmail.com', 'doctor'),
(9, 'doctor', 8, 'dr.rahul@gmail.com', 'doctor'),
(10, 'patient', 1, '', ''),
(11, 'patient', 2, 'kinjalpatel.kp39@gmail.com', 'patient'),
(49, 'patient', 3, 'drashtisweet612@gmail.com', 'patient'),
(50, 'patient', 4, 'hetvipatel6885@gmail.com', 'patient'),
(51, 'patient', 5, 'patelkomal.5709@gmail.com', 'patient'),
(52, 'doctor', 22, 'nehalpatel@gmail.com', '123456798'),
(53, 'patient', 22, 'rahul7654.chaudhari@gmail.com', '2147483647');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointmenttb`
--
ALTER TABLE `appointmenttb`
  ADD PRIMARY KEY (`ap_id_pk`);

--
-- Indexes for table `appointment_booktb`
--
ALTER TABLE `appointment_booktb`
  ADD PRIMARY KEY (`ap_book_id_pk`);

--
-- Indexes for table `contactustb`
--
ALTER TABLE `contactustb`
  ADD PRIMARY KEY (`contact_id_pk`);

--
-- Indexes for table `doctortb`
--
ALTER TABLE `doctortb`
  ADD PRIMARY KEY (`doctor_id_pk`);

--
-- Indexes for table `patienttb`
--
ALTER TABLE `patienttb`
  ADD PRIMARY KEY (`patient_id_pk`);

--
-- Indexes for table `treatmenttb`
--
ALTER TABLE `treatmenttb`
  ADD PRIMARY KEY (`treatment_id_pk`);

--
-- Indexes for table `usertb`
--
ALTER TABLE `usertb`
  ADD PRIMARY KEY (`user_id_pk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointmenttb`
--
ALTER TABLE `appointmenttb`
  MODIFY `ap_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment_booktb`
--
ALTER TABLE `appointment_booktb`
  MODIFY `ap_book_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactustb`
--
ALTER TABLE `contactustb`
  MODIFY `contact_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctortb`
--
ALTER TABLE `doctortb`
  MODIFY `doctor_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `patienttb`
--
ALTER TABLE `patienttb`
  MODIFY `patient_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `treatmenttb`
--
ALTER TABLE `treatmenttb`
  MODIFY `treatment_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `usertb`
--
ALTER TABLE `usertb`
  MODIFY `user_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

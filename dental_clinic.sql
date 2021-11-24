-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 01:05 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dental_clinic`
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
(14, 'hinal patel', 'Routine Appointments', 3, 'hinal1@gamil.com', 24, '0000-00-00', 2147483647, '		-	', 0, 1),
(17, 'kinjal patel (CASE-546)', 'Minor Pain', 5, 'kinjalpatel.kp39@gmail.com', 21, '2021-09-21', 907645352, '	-		', 0, 1),
(19, 'Drashti patel()', 'Routine Appointments', 5, 'drashtisweet612@gmail.com', 21, '2021-06-21', 2147483647, '		-	', 0, 1),
(20, 'hetvi patel()', 'Routine Appointments', 3, 'hetvipatel6885@gmail.com', 22, '2021-06-29', 907343434, '	-		', 0, 1),
(22, 'komal patel(CASE-867)', 'Minor Pain', 5, 'patelkomal.5709@gmail.com', 34, '2021-07-25', 9836473, '		-	', 0, 1),
(25, 'kinjal patel(NEW CASE)', 'Routine Appointments', 3, 'patelkomu9@gmail.com', 22, '2021-07-20', 907353783, '		-	', 1, 1);

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
(10, 17, 5, 21, '2021-06-22', '16:47:00', '		-	', 0),
(13, 13, 3, 9, '0000-00-00', '10:45:00', '		-	', 1),
(14, 18, 5, 15, '2021-06-21', '03:39:00', '		-	', 1),
(15, 19, 3, 9, '2021-06-29', '06:15:00', '	-		', 1),
(24, 16, 5, 15, '2021-09-21', '17:07', '	-		', 1),
(29, 20, 3, 20, '2021-07-13', '15:39', '		-	', 0);

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
(1, 'hinal patel', 'hinal1@gamil.com', 'treatment', 'what is disadvange after the treatment', 0, 1),
(2, 'patel komal', 'patelkomal.5709@gmail.com', 'treatment', 'plzz details about the treatment', 0, 1),
(3, 'komal patel', 'patelkomal.5709@gmail.com', 'treatment', 'plz details about the treatment', 0, 0),
(4, 'rajvi shah', 'patelkomu9@gmail.com', 'medicine', 'describe the medicine details', 0, 1);

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
(9, 'Dr.Reema', 'female', 40, 'M.D', '5 years', 2147483647, 'reem@gmail.com', '300', 'upload/IMG_DOCTOR384.jpg', 1),
(10, 'Dr.Veer', 'male', 40, 'MSD,MDS', '5 years', 2147483647, 'drveer@@gamil.com', '250', 'upload/IMG_DOCTOR705.jpg', 1),
(15, 'Dr.kritita', 'female', 39, 'BSD,MSD', '3 years', 907353782, 'dr.kritika@gamil.com', '800', 'upload/IMG_DOCTOR426.jpg', 1),
(17, 'Dr.mohit mishra', 'male', 37, 'BSD,MSD', '3 years', 2147483647, 'dr.mm@gmail.com', '400', 'upload/IMG_DOCTOR804.jpg', 1),
(18, 'Dr.nitin patel', 'male', 38, 'BScD,MMSc', '4 years', 2147483647, 'dr.nitin10@gmail.com', '750', 'upload/IMG_DOCTOR461.jpg', 1),
(19, 'Dr.hansha patel', 'female', 34, 'BDent,SMF', '4 years', 2147483647, 'dr.hansha09@gmail.com', '900', 'upload/IMG_DOCTOR160.jpg', 1),
(20, 'Dr.Mansi sharma', 'female', 40, 'BDS,MS', '7 years', 2147483647, 'dr.mansisharma@gmail.com', '850', 'upload/IMG_DOCTOR997.jpg', 1),
(21, 'Dr.Aanand shah', 'male', 45, 'BDS,MDS', '9 years', 2147483647, 'dr.anandshah@gmail.com', '300', 'upload/IMG_DOCTOR907.png', 1);

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
(2, '0', 'bob', 'male', 40, 2147483647, 'bob@gamil.com', '102,A ,\r\nx appertment, surat', 'upload/IMG_Patient31.jpg', 1),
(5, '0', 'niti', 'female', 12, 907343434, 'niti1@gamil.com', '                                                    vesu,surat                                                    ', 'upload/IMG_Patient222.jpg', 1),
(6, '0', 'tina', 'female', 32, 907353783, 'tina@gamil.com', 'althan,surat', 'upload/img_Patient672.jpg', 1),
(7, '0', 'rim', 'female', 21, 2147483647, 'reem@gmail.com', '199-D,piplod,surat', 'upload/img_Patient695.jpg', 1),
(8, '0', 'kishan', 'male', 32, 907645352, 'kishan@gamil.com', 'umara,surat', 'upload/patient_name774.jpg', 1),
(10, '0', 'feri', 'female', 16, 2147483647, 'feri@gmail.com', 'vesu,surat', 'upload/patient_name696.jpg', 1),
(11, '0', 'aarav', 'male', 18, 2147483647, 'aarav@gamil.com', '101,G,nandni appertment,vesu surat', 'upload/patient_name508.jpg', 1),
(12, '0', 'lushi', 'female', 34, 907353782, 'lushi@gamil.com', 'pal,surat                                                    ', 'upload/patient_name530.jpg', 1),
(13, 'CASE-36', 'hinal patel', 'female', 24, 2147483647, 'hinal1@gamil.com', '                                                    102,G prapti appartment,surat                                                                                                                                             ', 'upload/patient_name325.jpg', 1),
(16, 'CASE-546', 'kinjal patel', 'female', 21, 907645352, 'kinjalpatel.kp39@gmail.com', '     vesu,surat                                                                                                   ', 'upload/patient_name715.jpg', 1),
(18, 'CASE-276', 'Drashti patel', 'female', 21, 2147483647, 'drashtisweet612@gmail.com', '     piplod ,surat                                                                                                   ', 'upload/patient_name579.jpg', 1),
(19, 'CASE-153', 'hetvi patel', 'female', 22, 907343434, 'hetvipatel6885@gmail.com', '                                                             vesu                                                                                                   ', 'upload/patient_name156.jpg', 1),
(20, 'CASE-888', 'komal patel', 'female', 34, 9836473, 'patelkomal.5709@gmail.com', '      vesu,surat                                                                                                  ', 'upload/patient_name64.jpg', 1);

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
(3, 'Fillings', 15, '3500/-', '   To treat a cavity your dentist will remove the decayed portion of the tooth and then \"fill\" the area on the tooth where the decayed material was removed. Fillings are also used to repair cracked or broken teeth and teeth that have been worn down from misuse', 'upload/treatment_pic122.png', 1),
(5, 'Crowns and Caps', 17, '9000/-', '  Dental crowns are used to repair teeth that have been badly damaged by decay or injury. As a dental restoration, crowns are pretty much the only things that save damaged teeth from extraction.Your teeth can lose their shape or size. Dental crowns are tooth-shaped “caps” that can be placed over your tooth. Think of it like a snug hat for your tooth. The crown restores the tooth’s shape, size, strength and appearance.', 'upload/treatment_pic937.png', 1),
(7, 'Teeth Whitening', 10, '1000/-', 'Teeth whitening is a process of removing stains from the tooth surface and restoring the natural color of the teeth. Whitening is a one-time procedure performed by a dentist. It is amongst the most common and widely adopted cosmetic procedure.', 'upload/treatment_pic727.png', 1),
(16, 'Dental and Implants', 21, '2500/-', '  The dental implant refers to a small titanium root that is placed in your jawbone. The bone then heals around this and an abutment is placed on top. This sits above the gum line and performs the important job of bonding the artificial tooth to the titanium root.                                                 ', 'upload/treatment_pic602.png', 1),
(17, 'Root Canals', 21, '5000/-', 'Root canal treatment is designed to eliminate bacteria from the infected root canal, prevent reinfection of the tooth and save the natural tooth. When one. undergoes a root canal, the inflamed or infected pulp is removed and the. inside of the tooth is carefully cleaned and disinfected, then filled and sealed.                                            ', 'upload/treatment_pic876.png', 1),
(18, 'scaling and root planning', 21, '3000/-', 'scaling and root planningcaling and root planing involves the removal of plaque, hardened tartar (calculus), and stains from a patient’s teeth and tooth roots. The cost of scaling and root planing (deep cleanings) depends on the dentist’s location and whether or not the patient has insurance.Scaling and root planing (deep cleaning) is a restorative dental procedure involving the removal of plaque and calculus (tartar) stuck above and below the gumline.                                             ', 'upload/treatment_pic853.png', 1),
(19, 'Dental Sealants', 21, '2500/-', '  By covering the grooves and divots in your tooth surfaces with a protective layer, you can be better protected against the risk of cavities. This process can be beneficial for children, especially on back teeth that are harder to reach with routine brushing.                                                  ', 'upload/treatment_pic222.png', 1),
(20, 'Dental Bridges', 21, '5000/-', ' If you have one or more missing teeth, a bridge may be a good option to restore your smile. With this procedure, the teeth on either side of your missing tooth will be prepared as anchor teeth, ready to be fitted with a crown, with a replacement tooth occupying the space vacated by your missing tooth.                                                   ', 'upload/treatment_pic8.png', 1);

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
(29, 'admin', 0, 'admin@gmail.com', 'admin@123'),
(33, 'doctor', 15, 'drketan@gamil.com', '9078543234'),
(35, 'doctor', 18, 'dr.nitin10@gmail.com', '9071238764'),
(36, 'doctor', 19, 'dr.hansha09@gmail.com', 'he@123'),
(37, 'doctor', 20, 'dr.mansisharma@gmail.com', 'manshi'),
(39, 'doctor', 21, 'dr.anandshah@gmail.com', '9081265397'),
(40, 'patient', 13, 'hinal1@gamil.com', '2147483647'),
(43, 'patient', 16, 'kinjalpatel.kp39@gmail.com', '907645352'),
(45, 'patient', 18, 'drashtisweet612@gmail.com', '1234'),
(46, 'patient', 19, 'hetvipatel6885@gmail.com', 'hetvi@123'),
(47, 'patient', 20, 'patelkomal.5709@gmail.com', '9836473');

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
  MODIFY `ap_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `appointment_booktb`
--
ALTER TABLE `appointment_booktb`
  MODIFY `ap_book_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `contactustb`
--
ALTER TABLE `contactustb`
  MODIFY `contact_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctortb`
--
ALTER TABLE `doctortb`
  MODIFY `doctor_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `patienttb`
--
ALTER TABLE `patienttb`
  MODIFY `patient_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `treatmenttb`
--
ALTER TABLE `treatmenttb`
  MODIFY `treatment_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `usertb`
--
ALTER TABLE `usertb`
  MODIFY `user_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

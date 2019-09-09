-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 05, 2019 at 07:43 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--
CREATE DATABASE IF NOT EXISTS `hospital` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `hospital`;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `bill_payment_for` text NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `patient_id`, `bill_payment_for`, `amount`) VALUES
(1, 45, 'The Doctor', 10000),
(2, 2, 'The Doctor', 2000),
(3, 2, 'The Doctor', 7800),
(4, 45, 'Test Laboratory', 4000),
(5, 50, 'The Doctor', 2000),
(6, 53, 'Test Laboratory', 2000),
(7, 54, 'Test Laboratory', 17000),
(8, 54, 'The Doctor', 1000),
(9, 54, 'The Doctor', 4000),
(10, 2, 'Test Laboratory', 4000),
(11, 55, 'The Doctor', 2000),
(12, 55, 'Test Laboratory', 20000),
(13, 54, 'Test Laboratory', 3000),
(14, 48, 'The Doctor', 54657),
(15, 2, 'The Doctor', 4000),
(16, 50, 'The Doctor', 500),
(17, 57, 'The Doctor', 20000),
(18, 59, 'Test Laboratory', 785823);

-- --------------------------------------------------------

--
-- Table structure for table `description`
--

CREATE TABLE `description` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `test` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `description`
--

INSERT INTO `description` (`id`, `patient_id`, `test`) VALUES
(304, 2, 'Malaria'),
(305, 2, 'Aids'),
(306, 2, 'Malaria'),
(307, 2, 'yeah'),
(308, 2, 'full blood picture'),
(309, 45, 'Antigen 34'),
(310, 51, 'Malaria'),
(311, 51, 'AIDS'),
(312, 51, 'tuberclosis'),
(313, 52, 'Tuberclosis'),
(314, 2, 'Homma, red colors'),
(315, 53, 'Homma, eyes red'),
(316, 2, 'Malaria'),
(317, 53, 'Typhoid analysis'),
(318, 2, 'Typhoid check up'),
(319, 46, 'Yoh'),
(320, 54, 'typhod'),
(321, 54, 'check blood pressure'),
(322, 55, 'Typhoid'),
(323, 57, 'Malaria Test\r\n'),
(324, 59, 'mALARIA');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `file_number` int(11) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `second_name` varchar(40) NOT NULL,
  `sur_name` varchar(40) NOT NULL,
  `address` varchar(20) NOT NULL,
  `tel` double NOT NULL,
  `age` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `file_number`, `first_name`, `second_name`, `sur_name`, `address`, `tel`, `age`, `date`, `time`, `gender`) VALUES
(2, 4, 'rama', 'corama', 'elon', 'upanga 46', 676272057, 21, '2018-07-04', '00:05:00', 'Female'),
(44, 23, 'new me', 'person', 'aurasa', '67', 455463, 34, '2018-05-20', '08:00:00', 'Male'),
(45, 45, 'update', 'error', 'msemo', ' updated addrees', 2147483647, 45, '2018-05-07', '12:45:00', 'Male'),
(46, 74, 'fetty', 'juma', 'hasan', 'moshi 34', 676272057, 56, '2018-04-05', '02:36:00', 'Female'),
(48, 754, 'ramadhan yunus', 'elonel', 'duncan', '56767 ', 255676272057, 43, '2018-05-17', '01:59:00', 'Male'),
(49, 4, 'saby', 'ali', 'mwasha', 'njombe', 4567, 23, '2018-05-21', '03:04:00', 'Female '),
(50, 123, 'hassan', 'msuya', 'husein', '45 LT', 5456, 32, '2019-05-17', '02:10:00', 'Male '),
(52, 234, 'hassan', 'yunus', 'khalifa', '56 DS', 676272057, 23, '2018-02-03', '02:04:00', 'Female'),
(53, 100, 'corama', 'duncan', 'tylor', '571 A.town', 735272058, 21, '2018-06-18', '00:51:00', 'Male'),
(54, 555, 'Terry', 'Howard', 'Jay', '657 Upanga DS', 676272057, 21, '0000-00-00', '00:00:00', 'Male'),
(55, 273, 'faustine', 'John', 'John', '571 Suks', 768979612, 23, '2018-06-19', '01:59:00', 'Male'),
(56, 199, 'loveness', 'love', 'urock', '45', 789779212, 20, '2018-09-20', '00:59:00', 'Female '),
(57, 656, 'Muneer', 'sahel', 'sahel', '45 DSM', 677747688, 21, '2019-07-30', '12:00:00', 'Male'),
(58, 500, 'Muneer ', 'halotel', 'sahel', 'Dsm', 622287255, 21, '2019-08-14', '23:00:00', 'Male '),
(59, 83, 'Malechela', 'John', 'sahel', '48 dsm', 735272058, 88, '2019-09-16', '09:05:00', 'Male ');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `id` int(11) NOT NULL,
  `drug_name` varchar(50) NOT NULL,
  `generic` text NOT NULL,
  `type` text NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`id`, `drug_name`, `generic`, `type`, `quantity`) VALUES
(1, 'APDYL-H HERBAL COUGH SYRUP', '', '', 56),
(2, 'CLOTRIMAZOLE CREAM', '', '', 23);

-- --------------------------------------------------------

--
-- Table structure for table `recommendation`
--

CREATE TABLE `recommendation` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `recommendation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recommendation`
--

INSERT INTO `recommendation` (`id`, `patient_id`, `recommendation`) VALUES
(1, 53, 'Malaria Hydrene'),
(2, 2, 'Paraceta'),
(3, 46, 'Aspirin'),
(4, 2, 'aspirin t5 and seven'),
(5, 54, 'Aspirin 5 and paracetaol'),
(6, 2, 'Panadol\r\n'),
(7, 57, 'Give the panadol to the person');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `first_name`, `last_name`, `username`, `password`) VALUES
(1, 'ramadhan', 'yunus', 'corama', 'equator');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `upload` varchar(255) NOT NULL,
  `sms` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `patient_id`, `upload`, `sms`) VALUES
(1, 2, 'LDR PROPOSED.PNG', 'REPORT TO THE HOSPITAL IMMEDIATELY'),
(2, 2, 'table.PNG', 'REPORT'),
(3, 2, 'agr1.PNG', 'REPORT BACK IMEDIATELY'),
(4, 2, 'agr1.PNG', 'Hassan you are sick'),
(5, 2, 'table.PNG', 'Changed pic'),
(7, 2, 'interface 1.PNG', 'interface'),
(8, 2, 'entityRElation.PNG', 'ra'),
(9, 45, 'entityRElation.PNG', 'Id is successfuly'),
(10, 51, 'usecase.PNG', 'Hurry back to the hospital'),
(11, 51, 'process 1rev.PNG', 'report back immediately'),
(12, 51, 'context.PNG', 'report soon'),
(13, 52, 'conext-ammended.PNG', 'report back'),
(27, 53, 'sampledb2.PNG', 'Basti, message kama hii ikifika niambie'),
(28, 2, 'june 1.pdf', ''),
(29, 2, 'FINAL 1.2.2018 final.pdf', 'Hey I came before project'),
(30, 2, 'conext-ammended.PNG', 'Me again'),
(31, 46, 'circle.PNG', 'Report back test is ready'),
(32, 54, 'circle.PNG', 'report back'),
(33, 54, 'videoplayback(2)_high_quality.mp3', 'TOKa apa'),
(34, 54, 'LIGHT.jpg', 'Nop'),
(35, 55, 'phone call melin.PNG', 'Yoh'),
(36, 2, 'solar.PNG', 'Hey its faustine'),
(37, 55, 'home.jpg', 'Hey its faustine'),
(38, 55, 'agricu all.PNG', 'Fuck you!'),
(39, 2, 'IMG_20180711_115625.jpg', 'atari'),
(40, 56, 'sampledb1.PNG', 'I love you loveness, This is a secret  message from yours and only rama.'),
(41, 57, 'Screenshot from 2019-07-23 11-24-16.png', 'Come pick your results'),
(42, 58, '', 'Oyya rama apa, nlikuwa nasema sina message aise, alaf ela kule tigopesa sina nna cash tuu,\r\nNipo udicti uku'),
(43, 58, '', 'hahahhah, poa umeshakula maana mm nataka nije kula saa iv\r\n'),
(44, 53, '', 'No emojis and all is well'),
(45, 59, 'Ramacircle.png', 'This message came');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `position` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `position`) VALUES
(1, 'ramadhan', 'equator', 'Reception'),
(2, 'john', 'john', 'Doctor'),
(3, 'lab', 'lab', 'Laboratory'),
(4, 'pharmacy', 'pharmacy', 'Pharmacy'),
(5, 'billing', 'bill', 'Billing'),
(6, 'admin', 'adminarea', 'Admin'),
(7, 'asad', 'alasad', 'Doctor'),
(8, 'root', 'root', 'Reception'),
(9, 'corama', 'corama', 'Reception');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommendation`
--
ALTER TABLE `recommendation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `description`
--
ALTER TABLE `description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recommendation`
--
ALTER TABLE `recommendation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

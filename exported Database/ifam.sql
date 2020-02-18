-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2019 at 11:05 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ifam`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset_code`
--

CREATE TABLE IF NOT EXISTS `asset_code` (
  `class_code` varchar(250) DEFAULT NULL,
  `sub_class_code` varchar(250) DEFAULT NULL,
  `class_definition` varchar(250) NOT NULL,
  `region` varchar(250) DEFAULT NULL,
  `district` varchar(250) DEFAULT NULL,
  `date_created` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset_code`
--

INSERT INTO `asset_code` (`class_code`, `sub_class_code`, `class_definition`, `region`, `district`, `date_created`) VALUES
('AP', '1', 'Common Board', 'Ashanti Region', 'AND', 'January-21-2019 12:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `asset_register`
--

CREATE TABLE IF NOT EXISTS `asset_register` (
  `mmda_mda` varchar(250) DEFAULT NULL,
  `region` varchar(250) DEFAULT NULL,
  `district` varchar(250) DEFAULT NULL,
  `item_number` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `id` varchar(250) DEFAULT NULL,
  `category` varchar(250) DEFAULT NULL,
  `dept` varchar(250) DEFAULT NULL,
  `room` varchar(250) DEFAULT NULL,
  `asset_date` varchar(250) DEFAULT NULL,
  `supplier` varchar(250) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL,
  `condition` varchar(250) DEFAULT NULL,
  `unit_value` varchar(250) DEFAULT NULL,
  `qty` varchar(250) DEFAULT NULL,
  `model_no` varchar(250) DEFAULT NULL,
  `serial_no` varchar(250) DEFAULT NULL,
  `photo_info_unit` varchar(250) DEFAULT NULL,
  `date_created` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset_register`
--

INSERT INTO `asset_register` (`mmda_mda`, `region`, `district`, `item_number`, `description`, `id`, `category`, `dept`, `room`, `asset_date`, `supplier`, `price`, `condition`, `unit_value`, `qty`, `model_no`, `serial_no`, `photo_info_unit`, `date_created`) VALUES
('AND', 'Ashanti Region', 'Kumasi', 'a', 'a', 'AP', 'Appliance', 'AD', 'AD02', '2019-01-24', 'a', '2', 'good', 'a', '2', '001', '001', 'Augustina@UEW 20160830_095528.jpg', 'January-24-2019 22:03:57'),
('AND', 'Ashanti Region', 'Kumasi', 'r', 'r', 'AP', 'Appliance', 'District Chief Executive', 'RB0101', '2019-01-24', 'r', 'r', 'r', 'r', 'r', 'r', 'r', 'Capture1.png', 'January-24-2019 22:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` varchar(250) NOT NULL,
  `department_name` varchar(250) DEFAULT NULL,
  `unit_id` varchar(250) NOT NULL,
  `unit_name` varchar(250) DEFAULT NULL,
  `region` varchar(250) DEFAULT NULL,
  `district` varchar(250) DEFAULT NULL,
  `date_created` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `unit_id`, `unit_name`, `region`, `district`, `date_created`) VALUES
('EYS', 'Education, Youth and Sports', 'Ed1', 'Education', 'Ashanti Region', 'AND', ''),
('EYS', 'Education, Youth and Sports', 'Ed2', 'Youth', 'Ashanti Region', 'AND', 'January-11-2019 20:33:51');

-- --------------------------------------------------------

--
-- Table structure for table `disposal`
--

CREATE TABLE IF NOT EXISTS `disposal` (
  `date_dispose` varchar(250) DEFAULT NULL,
  `nature_of_disposal` varchar(250) DEFAULT NULL,
  `sale_value` varchar(250) DEFAULT NULL,
  `buyer` varchar(250) DEFAULT NULL,
  `region` varchar(250) DEFAULT NULL,
  `district` varchar(250) DEFAULT NULL,
  `date_created` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disposal`
--

INSERT INTO `disposal` (`date_dispose`, `nature_of_disposal`, `sale_value`, `buyer`, `region`, `district`, `date_created`) VALUES
('a', 'a', '20', '25', 'Ashanti Region', 'AND', 'Jan-01-2019');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `district_name` varchar(250) DEFAULT NULL,
  `district_code` varchar(250) NOT NULL,
  `district_region` varchar(250) DEFAULT NULL,
  `district_location` varchar(250) DEFAULT NULL,
  `date_created` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_name`, `district_code`, `district_region`, `district_location`, `date_created`) VALUES
('Adansi North District', 'AND', 'Ashanti Region', 'Kumasi', 'January-10-2019 22:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `full_asset_code`
--

CREATE TABLE IF NOT EXISTS `full_asset_code` (
  `district_code` varchar(250) DEFAULT NULL,
  `functional_location` varchar(250) DEFAULT NULL,
  `asset_class` varchar(250) DEFAULT NULL,
  `serial_number` varchar(250) DEFAULT NULL,
  `region` varchar(250) DEFAULT NULL,
  `date_created` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `functional_location`
--

CREATE TABLE IF NOT EXISTS `functional_location` (
  `section_name` varchar(250) DEFAULT NULL,
  `office` varchar(250) DEFAULT NULL,
  `code_id` varchar(250) NOT NULL,
  `region` varchar(250) DEFAULT NULL,
  `district` varchar(250) DEFAULT NULL,
  `date_created` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `functional_location`
--

INSERT INTO `functional_location` (`section_name`, `office`, `code_id`, `region`, `district`, `date_created`) VALUES
('AD', 'M/DCE', 'AD02', 'Ashanti Region', 'AND', 'January-17-2019 22:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `functional_office`
--

CREATE TABLE IF NOT EXISTS `functional_office` (
  `section_name` varchar(250) DEFAULT NULL,
  `section_code` varchar(250) NOT NULL,
  `region` varchar(250) DEFAULT NULL,
  `district` varchar(250) DEFAULT NULL,
  `date_created` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `functional_office`
--

INSERT INTO `functional_office` (`section_name`, `section_code`, `region`, `district`, `date_created`) VALUES
('Administrator', 'AD', 'Ashanti Region', 'AND', 'January-19-2019 18:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `register_class`
--

CREATE TABLE IF NOT EXISTS `register_class` (
  `class_definition` varchar(250) DEFAULT NULL,
  `class_code` varchar(250) NOT NULL,
  `region` varchar(250) DEFAULT NULL,
  `district` varchar(250) DEFAULT NULL,
  `date_created` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_class`
--

INSERT INTO `register_class` (`class_definition`, `class_code`, `region`, `district`, `date_created`) VALUES
('Appliance', 'AP', 'Ashanti Region', 'AND', 'January-21-2019 12:24:53');

-- --------------------------------------------------------

--
-- Table structure for table `residence_asset`
--

CREATE TABLE IF NOT EXISTS `residence_asset` (
  `district` varchar(250) DEFAULT NULL,
  `residence_location` varchar(250) DEFAULT NULL,
  `asset_class` varchar(250) DEFAULT NULL,
  `serial_number` varchar(250) DEFAULT NULL,
  `region` varchar(250) DEFAULT NULL,
  `date_created` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `residence_code`
--

CREATE TABLE IF NOT EXISTS `residence_code` (
  `title` varchar(250) DEFAULT NULL,
  `residence_code` varchar(250) NOT NULL,
  `region` varchar(250) DEFAULT NULL,
  `district` varchar(250) DEFAULT NULL,
  `date_created` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `residence_code`
--

INSERT INTO `residence_code` (`title`, `residence_code`, `region`, `district`, `date_created`) VALUES
('District Chief Executive', 'RB0101', 'Ashanti Region', 'AND', 'January-23-2019 10:49:59');

-- --------------------------------------------------------

--
-- Table structure for table `tagging_card`
--

CREATE TABLE IF NOT EXISTS `tagging_card` (
  `date_required` varchar(250) DEFAULT NULL,
  `asset_name` varchar(250) DEFAULT NULL,
  `date_transferred` varchar(250) DEFAULT NULL,
  `new_location` varchar(250) DEFAULT NULL,
  `authority` varchar(250) DEFAULT NULL,
  `condition` varchar(250) DEFAULT NULL,
  `original_location` varchar(250) DEFAULT NULL,
  `region` varchar(250) DEFAULT NULL,
  `district` varchar(250) DEFAULT NULL,
  `date_created` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagging_card`
--

INSERT INTO `tagging_card` (`date_required`, `asset_name`, `date_transferred`, `new_location`, `authority`, `condition`, `original_location`, `region`, `district`, `date_created`) VALUES
('jan-06-2019', 'Car', 'Jan-6-2016', 'Cape', 'Administrator', 'good', 'Accra', 'Ashanti Region', 'AND', 'Jan-28-2018');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE IF NOT EXISTS `user_account` (
`user_id` int(250) NOT NULL,
  `first_name` varchar(250) DEFAULT NULL,
  `middle_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `user_name` varchar(250) DEFAULT NULL,
  `contact` varchar(250) DEFAULT NULL,
  `pass` varchar(250) DEFAULT NULL,
  `region` varchar(250) DEFAULT NULL,
  `district` varchar(250) DEFAULT NULL,
  `location_` varchar(250) DEFAULT NULL,
  `login_type_` varchar(250) DEFAULT NULL,
  `date_created` varchar(250) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `first_name`, `middle_name`, `last_name`, `user_name`, `contact`, `pass`, `region`, `district`, `location_`, `login_type_`, `date_created`) VALUES
(1, 'Ernest', 'Kyei', 'Nkrumah', 'Mishrule', '0245181940', '5586123', 'Ashanti Region', 'AND', 'Kumasi', 'administrator', 'January-28-2019 17:07:31'),
(3, 'user', 'user', 'user', 'user', '0245186874', 'try123', 'Ashanti Region', 'AND', 'Kumasi', 'user', 'January-30-2019 21:32:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset_code`
--
ALTER TABLE `asset_code`
 ADD UNIQUE KEY `class_definition` (`class_definition`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
 ADD UNIQUE KEY `department_id` (`department_id`,`unit_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
 ADD UNIQUE KEY `district_code` (`district_code`);

--
-- Indexes for table `functional_location`
--
ALTER TABLE `functional_location`
 ADD UNIQUE KEY `code_id` (`code_id`);

--
-- Indexes for table `functional_office`
--
ALTER TABLE `functional_office`
 ADD UNIQUE KEY `section_code` (`section_code`);

--
-- Indexes for table `register_class`
--
ALTER TABLE `register_class`
 ADD UNIQUE KEY `class_code` (`class_code`);

--
-- Indexes for table `residence_code`
--
ALTER TABLE `residence_code`
 ADD UNIQUE KEY `residence_code` (`residence_code`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `user_name` (`user_name`,`contact`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
MODIFY `user_id` int(250) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

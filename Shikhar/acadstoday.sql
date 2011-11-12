-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 06, 2011 at 06:12 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `acadstoday`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` varchar(10) NOT NULL DEFAULT '',
  `course_name` varchar(25) NOT NULL,
  `dept_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`course_id`),
  KEY `dept_name` (`dept_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `dept_name`) VALUES
('CS-101', 'Computer Programming', 'Comp. Sci.'),
('CS-213', 'Data Structures', 'Comp. Sci.'),
('CS-317', 'Database Management', 'Comp. Sci.'),
('CS-347', 'Operating Systems', 'Comp. Sci.'),
('EE-101', 'Intro.Electrical Circuits', 'Electrical'),
('EE-152', 'Advanced Circuit Design', 'Electrical'),
('EE-225', 'Signals and Systems', 'Electrical'),
('ME-101', 'Engineering Drawing', 'Mechanical'),
('ME-207', 'Solid Mechanics', 'Mechanical'),
('ME-288', 'Fluid Mechanics', 'Mechanical'),
('ME-344', 'Automobile Engineering', 'Mechanical'),
('CH-101', 'Chemical Processes', 'Chemical'),
('CH-241', 'Organic Processes', 'Chemical'),
('CH-296', 'Biochemistry', 'Chemical'),
('CH-357', 'Quantitative Chemistry', 'Chemical'),
('FI-102', 'Probability Theory', 'Finance'),
('FI-201', 'Statistical Inference', 'Finance'),
('FI-282', 'Derivative Pricing', 'Finance'),
('FI-307', 'Stochastic Processes', 'Finance');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `dept_name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`dept_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_name`) VALUES
('Chemical'),
('Comp. Sci.'),
('Electrical'),
('Finance'),
('Mechanical');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE IF NOT EXISTS `instructor` (
  `inst_id` char(5) NOT NULL DEFAULT '',
  `inst_name` varchar(25) NOT NULL,
  `dept_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`inst_id`),
  KEY `dept_name` (`dept_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`inst_id`, `inst_name`, `dept_name`) VALUES
('12121', 'Bhaskar', 'Comp. Sci.'),
('33456', 'Prabhu', 'Electrical'),
('45565', 'Kishore', 'Mechanical'),
('48583', 'Prabhu', 'Chemical'),
('52343', 'Dhananjay', 'Comp. Sci.'),
('56543', 'Chatterjee', 'Finance'),
('66766', 'Preeti', 'Electrical'),
('73821', 'Kulkarni', 'Comp. Sci.'),
('78345', 'Haripriya', 'Electrical'),
('78583', 'George', 'Chemical'),
('86543', 'Ravinder', 'Finance'),
('86651', 'Deepak', 'Comp. Sci.'),
('86766', 'Manoj', 'Mechanical'),
('93821', 'Anand', 'Chemical'),
('94222', 'Sudarshan', 'Comp. Sci.'),
('98345', 'Deshpande', 'Finance');

-- --------------------------------------------------------

--
-- Table structure for table `prereq`
--

CREATE TABLE IF NOT EXISTS `prereq` (
  `course_id` varchar(10) NOT NULL DEFAULT '',
  `prereq_id` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`course_id`,`prereq_id`),
  KEY `prereq_id` (`prereq_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prereq`
--

INSERT INTO `prereq` (`course_id`, `prereq_id`) VALUES
('CH-296', 'CH-101'),
('CH-357', 'CH-241'),
('CS-213', 'CS-101'),
('CS-347', 'CS-213'),
('EE-225', 'EE-101'),
('EE-252', 'EE-101'),
('FI-282', 'FI-102'),
('FI-307', 'FI-201'),
('ME-288', 'ME-101'),
('ME-288', 'ME-207');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `project_id` char(5) NOT NULL DEFAULT '',
  `topic` varchar(100) DEFAULT NULL,
  `start_date` char(10) DEFAULT NULL,
  `end_date` char(10) DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `topic`, `start_date`, `end_date`) VALUES
('00565', 'Encryption', '01082009', '01122009'),
('12101', 'Semiconductor Performance', '01112010', '15032010'),
('23437', 'Statistical Modelling', '22072009', '22122009'),
('43222', 'Characterstics of Solid Materials', '26082010', '26092010'),
('45822', 'Organic Matter', '06012010', '05042010'),
('76515', 'Robots', '03022009', '01042010'),
('79345', 'Database pf a University', '01042010', '01072010'),
('92385', 'Automobile Performance', '11092009', '20122009'),
('98966', 'Stochastic Processes in Everyday Life', '07032010', '01062010');

-- --------------------------------------------------------

--
-- Table structure for table `project_guide`
--

CREATE TABLE IF NOT EXISTS `project_guide` (
  `project_id` char(5) NOT NULL DEFAULT '',
  `user_id` varchar(15) DEFAULT NULL,
  `inst_id` char(5) DEFAULT NULL,
  `course_id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`project_id`),
  KEY `user_id` (`user_id`),
  KEY `inst_id` (`inst_id`),
  KEY `course_id` (`course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_guide`
--


-- --------------------------------------------------------

--
-- Table structure for table `takes`
--

CREATE TABLE IF NOT EXISTS `takes` (
  `user_id` varchar(15) NOT NULL DEFAULT '',
  `course_id` varchar(10) NOT NULL DEFAULT '',
  `semester` varchar(10) DEFAULT NULL,
  `year` decimal(4,0) NOT NULL,
  PRIMARY KEY (`user_id`,`course_id`),
  KEY `course_id` (`course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `takes`
--


-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE IF NOT EXISTS `teaches` (
  `inst_id` char(5) NOT NULL DEFAULT '',
  `course_id` varchar(10) NOT NULL DEFAULT '',
  `semester` varchar(10) DEFAULT NULL,
  `year` decimal(4,0) NOT NULL,
  PRIMARY KEY (`inst_id`,`course_id`),
  KEY `course_id` (`course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teaches`
--

INSERT INTO `teaches` (`inst_id`, `course_id`, `semester`, `year`) VALUES
('12121', 'CS-101', 'Autumn', '2009'),
('33456', 'EE-101', 'Autumn', '2009'),
('33456', 'EE-152', 'Spring', '2009'),
('45565', 'ME-101', 'Autumn', '2009'),
('45565', 'ME-207', 'Spring', '2009'),
('52343', 'CS-213', 'Spring', '2009'),
('52343', 'CS-317', 'Autumn', '2009'),
('56543', 'FI-201', 'Spring', '2010'),
('56543', 'FI-307', 'Autumn', '2010'),
('66766', 'EE-225', 'Spring', '2010'),
('66766', 'EE-152', 'Autumn', '2009'),
('73821', 'CS-213', 'Autumn', '2010'),
('78583', 'CH-101', 'Spring', '2010'),
('78583', 'CH-241', 'Autumn', '2009'),
('86543', 'FI-307', 'Spring', '2009'),
('86766', 'ME-288', 'Autumn', '2009'),
('86766', 'ME-344', 'Spring', '2009'),
('93821', 'CS-347', 'Autumn', '2009'),
('94222', 'CS-347', 'Spring', '2010'),
('94222', 'CS-101', 'Spring', '2010'),
('98345', 'FI-282', 'Autumn', '2009');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` varchar(15) NOT NULL DEFAULT '',
  `user_name` varchar(20) NOT NULL,
  `password` varchar(15) DEFAULT NULL,
  `dept_name` varchar(50) DEFAULT NULL,
  `gender` varchar(8) DEFAULT NULL,
  `dob` char(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `dept_name` (`dept_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `dept_name`, `gender`, `dob`) VALUES
('00128', 'Ravi', '', 'Comp. Sci.', 'Male', '31101991'),
('12345', 'Suresh', '', 'Comp. Sci.', 'Male', '26111991'),
('19991', 'Gaurav', '', 'Electrical', 'Male', '11091989'),
('23121', 'Saurabh', '', 'Finance', 'Male', '26081991'),
('44553', 'Shikhar', '', 'Chemical', 'Male', '07061990'),
('45678', 'Ankita', '', 'Chemical', 'Female', '04011990'),
('54321', 'Ashish', '', 'Comp. Sci.', 'Male', '22061987'),
('55739', 'Sanjana', '', 'Mechanical', 'Female', '29081988'),
('70557', 'Sonia', '', 'Chemical', 'Female', '12041986'),
('76543', 'Garima', '', 'Comp. Sci.', 'Female', '19111991'),
('76653', 'Jai', '', 'Electrical', 'Male', '12031987'),
('98765', 'Kartik', '', 'Electrical', 'Male', '11011991'),
('98988', 'Tina', '', 'Mechanical', 'Female', '21051992');

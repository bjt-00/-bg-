-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 24, 2015 at 09:38 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bitguiders_db`
--
CREATE DATABASE IF NOT EXISTS `bitguiders_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bitguiders_db`;

-- --------------------------------------------------------

--
-- Table structure for table `development_status`
--

CREATE TABLE IF NOT EXISTS `development_status` (
  `order_id` int(11) NOT NULL DEFAULT '0',
  `analysis_percent` int(11) NOT NULL DEFAULT '0',
  `design_percent` int(11) NOT NULL DEFAULT '0',
  `implementation_percent` int(11) NOT NULL DEFAULT '0',
  `deployment_percent` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `development_status`
--

INSERT INTO `development_status` (`order_id`, `analysis_percent`, `design_percent`, `implementation_percent`, `deployment_percent`) VALUES
(50, 0, 0, 0, 0),
(49, 0, 0, 0, 0),
(48, 0, 0, 0, 0),
(47, 0, 0, 0, 0),
(36, 100, 40, 50, 25),
(37, 45, 34, 56, 89),
(46, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `service` varchar(45) NOT NULL DEFAULT '',
  `technology` varchar(45) NOT NULL DEFAULT '',
  `from_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `to_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `budget` int(10) unsigned NOT NULL DEFAULT '0',
  `currency` char(3) NOT NULL DEFAULT '',
  `phone` varchar(45) NOT NULL DEFAULT '',
  `email` varchar(45) NOT NULL DEFAULT '',
  `description` mediumtext NOT NULL,
  `order_received` tinyint(1) NOT NULL DEFAULT '0',
  `order_reviewed` tinyint(1) NOT NULL DEFAULT '0',
  `aggreement_signed` tinyint(1) NOT NULL DEFAULT '0',
  `work_started` tinyint(1) NOT NULL DEFAULT '0',
  `order_closed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `service`, `technology`, `from_date`, `to_date`, `budget`, `currency`, `phone`, `email`, `description`, `order_received`, `order_reviewed`, `aggreement_signed`, `work_started`, `order_closed`) VALUES
(49, 'BJT-02', 'Java EE 6 Web Component Developer Certified E', '2015-00-00 03:05:00', '2015-03-16 00:00:00', 200, '$', '0301', 'bitguiders@gmail.com', 'cmnts', 1, 1, 1, 0, 1),
(48, 'BJT-01', 'JSE Java Core', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 200, '$', '0301', 'bitguiders@gmail.com', 'my test java training', 1, 1, 1, 1, 0),
(36, 'Software Development', 'Java', '2015-10-01 00:00:00', '2015-10-13 00:00:00', 40, 'PKR', '03015421954', 'bitguiders@gmail.com', 'test', 1, 1, 1, 1, 0),
(37, 'Software Development', 'PHP', '2015-10-01 00:00:00', '2015-10-09 00:00:00', 40, 'PKR', '03015421954', 'bitguiders@yahoo.com', 'test', 1, 1, 1, 1, 1),
(38, 'IT-Training', 'Java JSP and Servlets [BJT-01]', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5000, '', '03015421954', 'bitguiders@gmail.com', 'test training comments', 1, 0, 0, 0, 0),
(39, 'IT-Training', 'BJT-01', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5000, '', '03015421954', 'bitguiders@gmail.com', 'test', 1, 0, 0, 0, 0),
(40, 'IT-Training', 'BJT-01', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 20000, 'PKR', '03015421954', 'bitguiders@gmail.com', 'test', 1, 0, 0, 0, 0),
(41, 'IT-Training', 'BJT-02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 20000, 'PKR', '03015421954', 'bitguiders@gmail.com', 'test', 1, 0, 0, 0, 0),
(42, 'IT-Training', 'BJT-02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 20000, 'PKR', '03015421954', 'bitguiders@gmail.com', 'test', 1, 0, 0, 0, 0),
(43, 'IT-Training', 'BJT-02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 20000, 'PKR', '03015421954', 'bitguiders@gmail.com', 'test', 1, 0, 0, 0, 0),
(44, 'BJT-02', 'Java JSP and Servlets', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 20000, 'PKR', '03015421954', 'bitguiders@gmail.com', 'test', 1, 0, 0, 0, 0),
(45, 'Training-BJT-02', 'Java JSP and Servlets', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 200, '$', '0301', 'bitguiders@gmail.com', 'testing', 1, 0, 0, 0, 0),
(46, 'Training-BJCT-02', 'Java EE 6 Web Component Developer Certified E', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 500, '$', '0301', 'bitguiders@gmail.com', 'my test training', 1, 0, 0, 0, 0),
(47, 'BJCT-02', 'Java EE 6 Web Component Developer Certified E', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 500, '$', '0301', 'bitguiders@gmail.com', 'test training', 1, 1, 1, 1, 1),
(50, 'BJT-02', 'Java JSP and Servlets', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 200, '$', '0301', 'bitguiders@gmail.com', 'test', 1, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE IF NOT EXISTS `payment_history` (
  `payment_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(45) DEFAULT NULL,
  `amount_paid` decimal(10,0) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_history_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`payment_history_id`, `order_id`, `amount_paid`, `date`) VALUES
(1, '49', '20', '2015-11-24 14:06:15'),
(2, '49', '5', '2015-11-24 14:07:06');

-- --------------------------------------------------------

--
-- Table structure for table `payment_status`
--

CREATE TABLE IF NOT EXISTS `payment_status` (
  `order_id` int(11) NOT NULL DEFAULT '0',
  `first_installment_amount` int(11) NOT NULL DEFAULT '0',
  `second_installment_amount` int(11) NOT NULL DEFAULT '0',
  `third_installment_amount` int(11) NOT NULL DEFAULT '0',
  `total_amount` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`),
  KEY `payment_order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_status`
--

INSERT INTO `payment_status` (`order_id`, `first_installment_amount`, `second_installment_amount`, `third_installment_amount`, `total_amount`) VALUES
(49, 56, 0, 85, 200),
(48, 0, 0, 0, 200),
(47, 500, 0, 0, 500),
(36, 10, 5, 8, 40),
(37, 10, 0, 0, 40),
(46, 0, 0, 0, 500),
(50, 0, 0, 0, 200);

-- --------------------------------------------------------

--
-- Table structure for table `pmp_projects`
--

CREATE TABLE IF NOT EXISTS `pmp_projects` (
  `project_id` int(3) NOT NULL AUTO_INCREMENT,
  `order_id` int(3) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `project_short_name` varchar(10) NOT NULL,
  `product_owner` varchar(30) NOT NULL,
  `agreement_date` datetime DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `pmp_projects`
--

INSERT INTO `pmp_projects` (`project_id`, `order_id`, `project_name`, `project_short_name`, `product_owner`, `agreement_date`, `description`) VALUES
(15, 36, 'Your Project Name', 'Project Sh', 'Your Name', '0000-00-00 00:00:00', 'test'),
(16, 37, 'YPN Project', 'PSName', 'Your Name', '2015-10-22 00:00:00', 'test'),
(17, 45, 'Java Training', 'BJT-02', 'bitguiders', NULL, NULL),
(18, 46, 'Java EE 6 Web Component Developer Certified Expert [BJCT-02]', 'Training-B', 'Your Name', '0000-00-00 00:00:00', 'my test training'),
(19, 47, 'Java EE 6 Web Component Developer Certified Expert [BJCT-02]', 'BJCT-02', 'Abdul Kareem', '2015-11-17 00:00:00', 'Training'),
(20, 48, 'JSE Java Core', 'BJT-01', 'Amina Kareem', '2015-11-17 00:00:00', 'Training'),
(21, 49, 'JSE Java Core', 'BJT-01', 'AK', '2015-11-19 00:00:00', 'Training'),
(22, 50, 'Java JSP and Servlets', 'BJT-02', 'Your Name', '0000-00-00 00:00:00', 'Training');

-- --------------------------------------------------------

--
-- Table structure for table `pmp_sprints`
--

CREATE TABLE IF NOT EXISTS `pmp_sprints` (
  `sprint_id` int(11) NOT NULL,
  `todo_id` int(11) NOT NULL,
  `sprint_name` varchar(50) NOT NULL,
  PRIMARY KEY (`sprint_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pmp_sprints`
--

INSERT INTO `pmp_sprints` (`sprint_id`, `todo_id`, `sprint_name`) VALUES
(1, 1, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `pmp_todos`
--

CREATE TABLE IF NOT EXISTS `pmp_todos` (
  `todo_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_story_id` int(11) NOT NULL,
  `todo_name` varchar(300) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `actual_start_date` datetime NOT NULL,
  `actual_end_date` datetime NOT NULL,
  `assigned_to` varchar(20) NOT NULL,
  `issue` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `development_status` varchar(4) NOT NULL,
  PRIMARY KEY (`todo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pmp_todos`
--

INSERT INTO `pmp_todos` (`todo_id`, `user_story_id`, `todo_name`, `start_date`, `end_date`, `actual_start_date`, `actual_end_date`, `assigned_to`, `issue`, `description`, `development_status`) VALUES
(1, 1, 'Test Todoooooooooo', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ak', 'issue statement', 'DESC', '45'),
(2, 2, 'Test Todoooooooooo', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ak', 'issue statement', 'DESC', '70'),
(3, 3, 'Test Todoooooooooo', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ak', 'issue statement', 'DESC', '5'),
(4, 1, 'Todo 2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ak', '', '', '55'),
(5, 1, 'Test Todoooooooooo', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ak', 'issue statement', 'DESC', '45'),
(6, 4, 'Todo 1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ak', 'test issue', 'test desc', '100'),
(7, 4, 'Todo 2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ak', 'isue', 'desc', '100'),
(8, 4, 'Todo 3', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ak', '', '', '100'),
(9, 5, 't', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ak', '', '', '35');

-- --------------------------------------------------------

--
-- Table structure for table `pmp_user_stories`
--

CREATE TABLE IF NOT EXISTS `pmp_user_stories` (
  `user_story_id` int(6) NOT NULL AUTO_INCREMENT,
  `project_id` int(6) NOT NULL,
  `priority` varchar(6) NOT NULL DEFAULT 'LOW' COMMENT 'Possible values LOW/MEDIUM/HIGH',
  `user_story` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `attachement_path` varchar(100) NOT NULL,
  PRIMARY KEY (`user_story_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pmp_user_stories`
--

INSERT INTO `pmp_user_stories` (`user_story_id`, `project_id`, `priority`, `user_story`, `description`, `attachement_path`) VALUES
(1, 15, 'LOW', 'Requirement 1', 'test', ''),
(2, 15, 'LOW', 'Requirement 2', 'test', ''),
(3, 15, 'LOW', 'Requirement 3', 'Note:\r\n- Any requirement which is not mentioned in this agreement will be considered a new requirement. A new agreement will be signed for all such changes and additions. New changes & additions will be charged according to new agreement.\r\n- bitguiders will provide 15-days free service within the scope of this agreement after final deployment.\r\n- After 15-days service, in case of any issue bitguiders will not be responsible. And services will be charged separately.\r\n- Payment will be made in three installments, with respect of following percentage.\r\n- 1st payment (25%) At the time of Agreement = 	10\r\n- 2nd payment (25%) On Analysis Completion = 	10\r\n- 3rd payment (50%) On Implementation Completion = 	20\r\n\r\n- In case of no payment, Next phase will not start, and project end date will also extend, to no of late payment days.\r\nI Your Name read above document carefully. I agree all of above service requirements, payment terms and Note.\r\nProduct Owner: ', ''),
(4, 16, 'MEDIUM', 'Requirement 1', 'test updated', ''),
(5, 21, 'LOW', 'Jse Training', 'contents', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `pmp_user_stories_status`
--
CREATE TABLE IF NOT EXISTS `pmp_user_stories_status` (
`project_id` int(6)
,`user_story_id` int(6)
,`user_story` varchar(500)
,`status` double
);
-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE IF NOT EXISTS `trainer` (
  `trainer_id` int(11) NOT NULL AUTO_INCREMENT,
  `trainer_name` varchar(45) DEFAULT NULL,
  `skill` varchar(45) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `certification1` varchar(45) DEFAULT NULL,
  `certification2` varchar(45) DEFAULT NULL,
  `certification3` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `about_trainer` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`trainer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`trainer_id`, `trainer_name`, `skill`, `experience`, `certification1`, `certification2`, `certification3`, `phone`, `email`, `url`, `about_trainer`) VALUES
(1, 'Abdul Kareem', 'Java SE/EE', 10, 'Oracle Certified Expert JEE6', 'Sun Certified Java6 Programmer', 'IBM IT-Specialist', '92 0301 5421954', 'bitguiders@gmail.com', NULL, 'Abdul Kareem is in IT industry since 2006.He has hands on Java experience. And Provides training to '),
(2, 'Waqas Ahmed', 'Graphics', 4, ' ', ' ', ' ', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE IF NOT EXISTS `training` (
  `training_code` varchar(11) NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '0',
  `price` int(6) NOT NULL DEFAULT '0',
  `duration` varchar(80) NOT NULL DEFAULT '0',
  `format` varchar(11) NOT NULL DEFAULT '0',
  `training_language` varchar(100) NOT NULL DEFAULT '0',
  `material_language` varchar(100) NOT NULL DEFAULT '0',
  `trainer` varchar(60) NOT NULL DEFAULT '0',
  `pre_requisite` varchar(900) NOT NULL DEFAULT '0',
  `result` varchar(900) NOT NULL DEFAULT '0',
  `contents` varchar(1118) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`training_code`),
  KEY `code` (`training_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`training_code`, `title`, `price`, `duration`, `format`, `training_language`, `material_language`, `trainer`, `pre_requisite`, `result`, `contents`, `is_active`) VALUES
('BJT-01', 'JSE Java Core', 200, '8 hrs [2 hrs daily]', 'Online', 'English/Urdu', 'English', 'Oracle JEE Certified Expert', 'Basic understanging of Java Programming,', 'After this training session you will be able to design/develop MVC based desktop application. By using Java Standard Edition.', '', 1),
('BJCT-01', 'Certified Java Programmer', 500, '20 hrs [2 hrs daily]', 'Online', 'English/Urdu', 'English', 'Sun Certified Java Programmer', 'Basic understanging of Java Programming,', 'After this training session you be able to attempt above certification exam.', '0', 1),
('BJCT-02', 'Java EE 6 Web Component Developer Certified Expert', 500, '20 hrs [2 hrs daily]', 'Online', 'English/Urdu', 'English', 'Oracle JEE Certified Expert', 'Basic understanging of Java Programming,', 'After this training session you be able to attempt above certification exam.', '0', 1),
('BJT-02', 'JEE JSP & Servlets', 200, '8 hrs [2 hrs daily]', 'Online', 'English/Urdu', 'English', 'Sun Certified Java Programmer', 'Basic understanging of Java Programming, and Basic HTML. ', 'After this training session you will be able to design/develop MVC based web application. By using JSP,Java Beans and Servlets.', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `training_schedule`
--

CREATE TABLE IF NOT EXISTS `training_schedule` (
  `training_code` varchar(45) NOT NULL,
  `trainer_id` varchar(45) DEFAULT NULL,
  `order_id` varchar(45) NOT NULL,
  PRIMARY KEY (`training_code`,`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `training_schedule`
--

INSERT INTO `training_schedule` (`training_code`, `trainer_id`, `order_id`) VALUES
('BJT-02', '1', '49'),
('BJT-02', '2', '50');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(65) NOT NULL DEFAULT '',
  `password` varchar(65) NOT NULL DEFAULT '',
  `role` varchar(45) DEFAULT 'Product Owner',
  `order_id` varchar(45) DEFAULT NULL,
  `is_active` binary(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`, `order_id`, `is_active`) VALUES
(2, 'info@bitguiders.com', '******', 'Product Owner', NULL, '1'),
(13, 'bitguiders@gmail.com', '36', 'Product Owner', NULL, '1'),
(14, 'bitguiders@yahoo.com', '37', 'Product Owner', NULL, '1'),
(15, 'bitguiders@gmail.com', '38', 'Product Owner', NULL, '1'),
(16, 'bitguiders@gmail.com', '39', 'Product Owner', NULL, '1'),
(17, 'bitguiders@gmail.com', '40', 'Product Owner', NULL, '1'),
(18, 'bitguiders@gmail.com', '41', 'Product Owner', NULL, '1'),
(19, 'bitguiders@gmail.com', '42', 'Product Owner', NULL, '1'),
(20, 'bitguiders@gmail.com', '43', 'Product Owner', NULL, '1'),
(21, 'bitguiders@gmail.com', '44', 'Product Owner', NULL, '1'),
(22, 'bitguiders@gmail.com', '45', 'Trainee', NULL, '1'),
(23, 'bitguiders@gmail.com', '46', 'Trainee', '46', '1'),
(24, 'bitguiders@gmail.com', '47', 'Trainee', '47', '1'),
(25, 'bitguiders@gmail.com', '48', 'Trainee', '48', '1'),
(26, 'bitguiders@gmail.com', '49', 'Trainee', '49', '1'),
(27, 'bitguiders@gmail.com', '50', 'Trainee', '50', '1');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE IF NOT EXISTS `visitor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `total_visits` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `ip`, `country`, `city`, `total_visits`, `date`) VALUES
(5, ' 39.54.132.75', ' PAKISTAN (PK)', ' Lahore', 2, '2013-11-13'),
(6, ' 195.212.29.185', ' FRANCE (FR)', ' Montpellier', 11, '2013-12-04'),
(7, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 13, '2013-12-06'),
(8, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 26, '2014-01-25'),
(9, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 76, '2014-02-28'),
(10, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 145, '2014-03-02'),
(11, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 1, '2014-03-07'),
(12, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 5, '2014-03-09'),
(13, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 88, '2014-03-25'),
(14, ' 108.162.225.146', ' INDIA (IN)', ' Chennai', 9, '2014-03-25'),
(15, ' 108.162.225.146', ' INDIA (IN)', ' Chennai', 22, '2014-03-26'),
(16, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 9, '2014-03-26'),
(17, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 11, '2014-03-27'),
(18, ' 39.54.189.3', ' PAKISTAN (PK)', ' Lahore', 1, '2014-03-31'),
(19, ' 39.54.38.181', ' PAKISTAN (PK)', ' Lahore', 78, '2014-04-04'),
(20, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 12, '2014-05-04'),
(21, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 2, '2014-09-17'),
(22, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 13, '2015-03-26'),
(23, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 18, '2015-04-01'),
(24, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 32, '2015-04-02'),
(25, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 37, '2015-04-03'),
(26, ' 39.54.173.166', ' PAKISTAN (PK)', ' Lahore', 40, '2015-04-03'),
(27, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 160, '2015-04-07'),
(28, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 9, '2015-04-08'),
(29, ' 195.212.29.162', ' UNITED KINGDOM (GB)', ' Portsmouth', 70, '2015-04-08'),
(30, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 119, '2015-04-10'),
(31, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 35, '2015-04-13'),
(32, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 152, '2015-04-14'),
(33, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 106, '2015-04-16'),
(34, ' 195.212.29.162', ' UNITED KINGDOM (GB)', ' Portsmouth', 130, '2015-04-17'),
(35, ' 195.212.29.162', ' UNITED KINGDOM (GB)', ' Portsmouth', 25, '2015-04-18'),
(36, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 254, '2015-04-19'),
(37, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 265, '2015-04-23'),
(38, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 8, '2015-04-24'),
(39, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 68, '2015-04-25'),
(40, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 12, '2015-04-26'),
(41, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 279, '2015-04-30'),
(42, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 134, '2015-05-09'),
(43, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 275, '2015-05-10'),
(44, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 39, '2015-05-11'),
(45, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 73, '2015-05-12'),
(46, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 84, '2015-05-13'),
(47, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 130, '2015-05-14'),
(48, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 17, '2015-05-15'),
(49, ' 182.180.87.139', ' PAKISTAN (PK)', ' Lahore', 228, '2015-05-16');

-- --------------------------------------------------------

--
-- Structure for view `pmp_user_stories_status`
--
DROP TABLE IF EXISTS `pmp_user_stories_status`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pmp_user_stories_status` AS select `u`.`project_id` AS `project_id`,`u`.`user_story_id` AS `user_story_id`,`u`.`user_story` AS `user_story`,(sum(`t`.`development_status`) / count(0)) AS `status` from (`pmp_todos` `t` join `pmp_user_stories` `u` on((`u`.`user_story_id` = `t`.`user_story_id`))) group by `t`.`user_story_id`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

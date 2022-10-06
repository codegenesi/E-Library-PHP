-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 03, 2022 at 04:56 AM
-- Server version: 5.5.16
-- PHP Version: 5.4.0beta2-dev

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(120) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `email`, `username`, `password`, `update_date`) VALUES
(1, 'Test User 1', 'test@library.com', 'user', '21232f297a57a5a743894a0e4a801fc3', '2022-07-23 15:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(30) DEFAULT NULL,
  `name` varchar(60) DEFAULT NULL,
  `price` varchar(11) NOT NULL,
  `book` varchar(60) NOT NULL,
  `status` int(1) DEFAULT '1',
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `author`, `name`, `price`, `book`, `status`, `reg_date`) VALUES
(1, 'Test Author 1', 'Test Name 1', '122', '', 1, '2022-07-23 14:53:40'),
(2, 'Test Author 2', 'Test Name 2', '666', '', 1, '2022-07-23 11:24:59'),
(3, 'Test Author 3', 'Test Name 3', '333', '', 1, '2022-07-23 11:24:59'),
(4, 'Test Author 4', 'Test Name 4', '32', '', 1, '2022-07-23 11:25:36'),
(5, 'Test Author 5', 'Test Name 5', '55', '', 1, '2022-07-23 11:25:36'),
(7, 'Book Name 1', 'Book Author 1', '45', '', 1, '2022-07-23 15:41:25'),
(8, 'cdscsd', 'csc', '', '', 1, '2022-08-03 03:52:07');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled`
--

CREATE TABLE IF NOT EXISTS `enrolled` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `student_id` varchar(150) NOT NULL,
  `issue_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `enrolled`
--

INSERT INTO `enrolled` (`id`, `book_id`, `student_id`, `issue_date`, `status`) VALUES
(1, 1, '1', '2022-05-23 14:38:27', 1),
(2, 2, '1', '2022-07-23 14:38:27', 1),
(3, 1, '2', '2022-07-23 16:18:44', 1),
(5, 4, '1', '2022-07-23 16:41:58', 1),
(6, 7, '1', '2022-07-23 17:25:18', 1),
(7, 5, '1', '2022-07-23 17:27:39', 1),
(8, 1, 'std1', '2022-08-01 18:13:48', 1),
(9, 1, '705', '2022-08-01 18:17:50', 1),
(10, 2, '705', '2022-08-01 18:22:20', 1),
(11, 1, '705', '2022-08-03 04:47:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(15) NOT NULL DEFAULT '',
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` char(11) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `reg_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_id` (`student_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `fullname`, `email`, `mobile`, `password`, `status`, `reg_date`, `update_date`) VALUES
(1, 'std1', 'Student 1 Test', 'std1@library.com', '+1617', 'test', 0, '2022-07-23 12:58:21', '2022-08-01 18:17:29'),
(3, 'user', 'nkcnsdc', 'xcxbj@hhdfhg', '004949', '21232f297a57a5a74389', 1, '2022-08-03 00:37:35', NULL),
(5, '705', 'm mx', 'nnn@ss', '55666', '21232f297a57a5a743894a0e4a801fc3', 1, '2022-08-03 01:22:23', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

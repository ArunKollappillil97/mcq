-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 10, 2016 at 09:08 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mcq`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ask_question`
--

CREATE TABLE IF NOT EXISTS `tbl_ask_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_title` text NOT NULL,
  `question` text NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creator_user_id` int(4) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_ask_question`
--

INSERT INTO `tbl_ask_question` (`id`, `question_title`, `question`, `name`, `email`, `date`, `creator_user_id`, `status`) VALUES
(1, '', 'Inventore, aliquam sequi nisi velit magnam accusamus reprehenderit nemo necessitatibus doloribus molestiae fugit repellat repudiandae dolor. Incidunt, nulla quidem illo suscipit nihil!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni, dolorem, fugiat, commodi totam accusantium illo incidunt quis eius eum iure et fugit voluptas atque ratione nobis sed omnis quod ipsa.\r\n', 'Tasfir Hossain Suman', 'tasfirsuman@gmail.com', '2016-04-21 13:26:32', 0, 1),
(2, 'This is Question Titile', 'Vivamus mattis nibh vitae dui egestas posuere. Maecenas a est at enim blandit interdum. Cras eget ipsum ac nunc tristique tincidunt sit amet nec quam. Vivamus sed suscipit enim, et dignissim tellus.Vivamus mattis nibh vitae dui egestas posuere. Maecenas a est at enim blandit interdum. Cras eget ipsum ac nunc tristique tincidunt sit amet nec quam. Vivamus sed suscipit enim, et dignissim tellus.								\r\n\r\n							', 'Hasinuzzaman', 'centuryaviation@yahoo.com', '2016-04-21 13:40:12', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `serial` int(3) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category_image` varchar(255) NOT NULL,
  `creator_name` int(4) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `serial`, `date`, `category_image`, `creator_name`, `status`) VALUES
(1, 'BCS', 1, '2016-04-21 10:55:05', '', 0, 1),
(2, 'IBA', 2, '2016-04-21 10:55:35', '', 0, 1),
(3, 'BBA', 3, '2016-04-21 10:55:45', '', 0, 1),
(4, 'Bank', 4, '2016-04-21 10:55:56', '', 0, 1),
(5, 'IT / Computer', 6, '2016-05-05 15:06:31', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam`
--

CREATE TABLE IF NOT EXISTS `tbl_exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(4) NOT NULL,
  `number_of_question` int(3) NOT NULL,
  `category_id` int(6) NOT NULL,
  `subject_id` int(6) NOT NULL,
  `exam_status` tinyint(1) DEFAULT NULL,
  `date` date NOT NULL,
  `exam_start_time` varchar(20) NOT NULL,
  `exam_end_time` varchar(20) NOT NULL,
  `result` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`,`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_exam`
--

INSERT INTO `tbl_exam` (`id`, `user_id`, `number_of_question`, `category_id`, `subject_id`, `exam_status`, `date`, `exam_start_time`, `exam_end_time`, `result`) VALUES
(1, 1, 10, 5, 4, 1, '2016-05-10', '05:38:29pm', '05:38:29pm', 'Good'),
(2, 1, 10, 5, 4, 1, '2016-05-10', '05:52:11pm', '05:52:11pm', 'Good'),
(3, 1, 20, 5, 4, 1, '2016-05-10', '05:58:30pm', '05:58:30pm', 'Good'),
(4, 1, 10, 1, 3, 1, '2016-05-10', '07:26:46pm', '07:26:46pm', 'Good'),
(5, 1, 10, 5, 4, 1, '2016-05-10', '07:28:39pm', '07:28:39pm', 'Good'),
(6, 1, 10, 5, 4, 1, '2016-05-10', '07:30:08pm', '07:30:08pm', 'Good'),
(7, 1, 10, 5, 4, 1, '2016-05-10', '07:30:11pm', '07:30:11pm', 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_option`
--

CREATE TABLE IF NOT EXISTS `tbl_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_name` varchar(255) NOT NULL,
  `ans` tinyint(1) NOT NULL,
  `question_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=145 ;

--
-- Dumping data for table `tbl_option`
--

INSERT INTO `tbl_option` (`id`, `option_name`, `ans`, `question_id`, `status`) VALUES
(85, 'Hyperlinks and Text Markup Language', 0, 2, 1),
(86, 'Home Tool Markup Language', 0, 2, 1),
(87, 'Hyper Text Markup Language', 3, 2, 1),
(88, 'HyperText Markup Language', 0, 2, 1),
(97, 'The World Wide Web Consortium', 1, 3, 1),
(98, 'Mozilla', 0, 3, 1),
(99, 'Microsoft', 0, 3, 1),
(100, 'Google', 0, 3, 1),
(101, '<h1>', 1, 4, 1),
(102, '<heading>', 0, 4, 1),
(103, '<head>', 0, 4, 1),
(104, '<h6>', 0, 4, 1),
(105, '<lb>', 0, 5, 1),
(106, '<break>', 0, 5, 1),
(107, '<br>', 3, 5, 1),
(108, '<bl>', 0, 5, 1),
(109, '<body style="background-color:yellow;">', 1, 6, 1),
(110, '<body bg="yellow">', 0, 6, 1),
(111, '<background>yellow</background>', 0, 6, 1),
(112, '<background color="yellow">', 0, 6, 1),
(113, '<b>', 0, 7, 1),
(114, '<important>', 0, 7, 1),
(115, '<i>', 0, 7, 1),
(116, '<strong>', 4, 7, 1),
(117, '<italic>', 0, 8, 1),
(118, '<em>', 2, 8, 1),
(119, '<i>', 0, 8, 1),
(120, '<emphasized>', 0, 8, 1),
(121, '<a name="http://www.w3schools.com">W3Schools.com</a>', 0, 9, 1),
(122, '<a>http://www.w3schools.com</a>', 0, 9, 1),
(123, '<a href="http://www.w3schools.com">W3Schools</a>', 0, 9, 1),
(124, '<a url="http://www.w3schools.com">W3Schools.com</a>', 1, 9, 1),
(125, '*', 0, 10, 1),
(126, '/', 0, 10, 1),
(127, '<', 1, 10, 1),
(128, '^', 0, 10, 1),
(137, '<a href="url" new>', 0, 11, 1),
(138, '<a href="url" target="new">', 0, 11, 1),
(139, '<a href="url" target="_blank">', 3, 11, 1),
(140, '<a href="url" new>', 0, 11, 1),
(141, '<h6>', 0, 12, 1),
(142, '<head>', 0, 12, 1),
(143, '<h1>', 0, 12, 1),
(144, ' <heading>', 1, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE IF NOT EXISTS `tbl_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creator_id` int(4) NOT NULL,
  `category_id` int(4) NOT NULL,
  `subject_id` int(4) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `creator_id` (`creator_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`id`, `question`, `date`, `creator_id`, `category_id`, `subject_id`, `status`) VALUES
(2, 'What does HTML stand for?', '2016-05-07 08:05:36', 0, 5, 4, 1),
(3, 'Who is making the Web standards?', '2016-05-07 08:28:36', 0, 5, 4, 1),
(4, 'Choose the correct HTML element for the largest heading:', '2016-05-07 08:31:07', 0, 5, 4, 1),
(5, 'What is the correct HTML element for inserting a line break?', '2016-05-07 08:32:46', 0, 5, 4, 1),
(6, 'What is the correct HTML for adding a background color?', '2016-05-07 08:34:36', 0, 5, 4, 1),
(7, 'Choose the correct HTML element to define important text', '2016-05-07 08:36:15', 0, 5, 4, 1),
(8, 'Choose the correct HTML element to define emphasized text', '2016-05-07 08:37:11', 0, 5, 4, 1),
(9, 'What is the correct HTML for creating a hyperlink?', '2016-05-07 08:41:36', 0, 5, 4, 1),
(10, 'Which character is used to indicate an end tag?', '2016-05-07 08:42:32', 0, 5, 4, 1),
(11, 'How can you open a link in a new tab/browser window?', '2016-05-07 10:08:01', 1, 5, 4, 1),
(12, 'Choose the correct HTML element for the largest heading:', '2016-05-07 11:30:13', 0, 5, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE IF NOT EXISTS `tbl_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `serial` int(3) NOT NULL,
  `category_id` int(4) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`id`, `name`, `serial`, `category_id`, `date`, `status`) VALUES
(1, 'Accounting', 1, 1, '2016-04-24 09:03:09', 1),
(2, 'English Model Test', 2, 1, '2016-04-21 13:56:00', 1),
(3, 'Accounting', 1, 3, '2016-04-24 09:07:04', 1),
(4, 'HTML', 4, 5, '2016-05-05 15:06:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` tinyint(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_role` (`user_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `user_role`, `date`, `status`) VALUES
(1, 'admin', 'Tasfir Hossain', 'Suman', 'tasfirsuman@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2016-05-08 11:48:05', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

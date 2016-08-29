-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2016 at 05:36 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `seip_term_project_sch_mng_102543`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(3) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) NOT NULL,
  `admin_email_address` varchar(50) NOT NULL,
  `admin_password` varchar(32) NOT NULL,
  `access_label` tinyint(1) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email_address`, `admin_password`, `access_label`) VALUES
(1, 'Neloy Ahmed', 'neloy@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_club`
--

CREATE TABLE IF NOT EXISTS `tbl_club` (
  `club_id` int(5) NOT NULL AUTO_INCREMENT,
  `club_name` varchar(50) NOT NULL,
  `club_image` varchar(50) NOT NULL,
  `club_short_description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`club_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_club`
--

INSERT INTO `tbl_club` (`club_id`, `club_name`, `club_image`, `club_short_description`, `publication_status`, `deletion_status`) VALUES
(1, 'ART', 'feature1.gif', '<span style="font-size: 13.3333px;">Our Art club is really amazing, students really get creative by getting involved into art club.&nbsp;</span><span style="font-size: 13.3333px;">Our Art club is really amazing, students really get creative by getting involved into art club.</span>', 1, 0),
(2, 'GEOMETRY', 'feature2.gif', '<span style="font-size: 10pt; line-height: 115%; font-family: Arial, sans-serif;">Our Art club is really\r\namazing, students really get creative by getting involved into art\r\nclub.&nbsp;Our Art club is really amazing, students really get creative by\r\ngetting involved into art club.</span>', 1, 0),
(3, 'SCIENCE CLUB', 'feature3.gif', '<span style="font-size: 10pt; line-height: 115%; font-family: Arial, sans-serif;">Our Art club is really\r\namazing, students really get creative by getting involved into art\r\nclub.&nbsp;Our Art club is really amazing, students really get creative by\r\ngetting involved into art club.</span>', 1, 0),
(4, 'GEOGRAPHY CLUB', 'feature4.gif', '<span style="font-size: 10pt; line-height: 115%; font-family: Arial, sans-serif;">Our Art club is really\r\namazing, students really get creative by getting involved into art\r\nclub.&nbsp;Our Art club is really amazing, students really get creative by\r\ngetting involved into art club.</span>', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `contact_id` int(5) NOT NULL AUTO_INCREMENT,
  `right_side_image` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone_fax` text NOT NULL,
  `email` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`contact_id`, `right_side_image`, `address`, `phone_fax`, `email`, `publication_status`, `deletion_status`) VALUES
(1, 'contact.jpg', 'House- 06, Line- 03, Avenue-5<div>Block-C, &nbsp;Mirpur-11, Dhaka-1216.</div>', 'Phone: 01811 00 00 00<div>Fax: 1800-123-456</div>', 'info@idealschool.com<div>admin@idealschool.com</div>', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_featured_offer`
--

CREATE TABLE IF NOT EXISTS `tbl_featured_offer` (
  `offer_id` int(5) NOT NULL AUTO_INCREMENT,
  `item_image` varchar(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_short_description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`offer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_featured_offer`
--

INSERT INTO `tbl_featured_offer` (`offer_id`, `item_image`, `item_name`, `item_short_description`, `publication_status`, `deletion_status`) VALUES
(1, 'offer1.png', 'Qualified Teacher', 'We offer best teacher for each subjects. Our teachers are highly qualified and they are dedicated. They are really passionate about teaching, all of them have highly effective method of teaching.', 1, 0),
(2, 'offer2.png', 'Multimedia class room', 'Our Each Class room is loaded with fully functional multimedia system. Which help teachers to explain text book idea through relevant graphical presentation. It also helps child to better understand different topics.', 1, 0),
(3, 'offer3.png', 'Teacher Parents Meetup', 'We regularly arrange teacher parents meet up where each and every one get their chance to deliver their ideas. From this discussion we made decision how to give children more facilities to expose their potential.&nbsp;', 1, 0),
(4, 'offer4.png', 'Great result', 'Every year we produce some meritorious students who prove their ability in board exam. Important thing is They also earn their achievement in different national competition like different Olympiads.', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE IF NOT EXISTS `tbl_gallery` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_image` longblob NOT NULL,
  `album_id` int(11) NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`image_id`),
  KEY `album_id` (`album_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`image_id`, `gallery_image`, `album_id`, `publication_status`, `deletion_status`) VALUES
(6, 0x726573697a65645f3932303639383431353039362e6a7067, 5, 1, 0),
(7, 0x726573697a65645f41667465722d5363686f6f6c2d30332e6a7067, 5, 1, 0),
(8, 0x726573697a65645f696d61616765732e6a7067, 5, 1, 0),
(9, 0x726573697a65645f696d616765662e6a7067, 4, 1, 0),
(10, 0x726573697a65645f696d616765732e6a7067, 4, 1, 0),
(11, 0x726573697a65645f736f7574682d6b6f7265616e2d73747564656e742e6a7067, 6, 1, 0),
(12, 0x726573697a65645f6d6964646c655363686f6f6c2e6a7067, 6, 1, 0),
(17, 0x726573697a6564494d475f353635322d636f70792e6a7067, 10, 1, 0),
(21, 0x636f7572736530312e6a7067, 10, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery_album`
--

CREATE TABLE IF NOT EXISTS `tbl_gallery_album` (
  `album_id` int(11) NOT NULL AUTO_INCREMENT,
  `album_title` varchar(40) NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`album_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_gallery_album`
--

INSERT INTO `tbl_gallery_album` (`album_id`, `album_title`, `publication_status`, `deletion_status`) VALUES
(1, 'Activity', 0, 0),
(2, 'Function', 0, 0),
(4, 'STUDY TOUR', 0, 0),
(5, 'SCHOOL ACTIVITY', 0, 0),
(6, 'TEST', 0, 0),
(10, 'MORE TEST', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notice`
--

CREATE TABLE IF NOT EXISTS `tbl_notice` (
  `notice_id` int(11) NOT NULL AUTO_INCREMENT,
  `notice_priority` tinyint(1) NOT NULL,
  `notice_title` varchar(40) NOT NULL,
  `notice_publication_time` datetime NOT NULL,
  `notice_short_description` varchar(45) NOT NULL,
  `notice_long_description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`notice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_notice`
--

INSERT INTO `tbl_notice` (`notice_id`, `notice_priority`, `notice_title`, `notice_publication_time`, `notice_short_description`, `notice_long_description`, `publication_status`, `deletion_status`) VALUES
(1, 1, 'Exam Start', '2015-09-26 23:59:35', 'Mid term Exam start Notice -- thsi is going t', 'Mid term exam will be start from 6476816 is to notify all student to be prepare for the exam properly.', 1, 0),
(2, 1, 'School Open', '2015-09-27 00:02:33', 'School opening after summer vacation', 'Our school is going to be open after the long summer vacation from ---------- and each student is advised to be present school regularly from the opening date.', 1, 0),
(3, 1, 'Game Day', '2015-09-24 15:10:55', 'Our school will arrange a game day in this ye', 'There will be game day observation at ----- all students, teacher and parents are requested to preset at that day.', 1, 0),
(4, 2, 'International Mother Language Day', '2015-09-24 21:38:12', 'Observation of International Mother Language ', 'This is to notify to all of the students and staffs of our school that Observation of International Mother language day is going to happen.', 1, 0),
(5, 1, 'School Closing', '2015-09-24 22:45:34', 'School Closing on the Occation of Eid-ul-Azha', 'Atodhara sokoler abogotir jonno janano jacche je Mirpur ideal school will be closed from 22-Sep-2015 to 29-Sep-2015.', 1, 0),
(6, 1, 'O''rielly', '2015-09-27 00:30:41', 'fafa', 'hhhhhhhhhhhhhhhhh', 0, 1),
(7, 1, 'King''s', '2015-09-27 12:14:09', 'jaflja', 'fafafa', 0, 0),
(8, 2, 'Parent''s day', '2015-09-26 13:46:51', 'There will be parent''s day on 23Nov 2015.', 'Hereby it is to notify everyone that our school is going to arrange a parent''s day at 23 Nov 2015. There will be discussion about''s different aspects regarding the betterment of school and students. Your presence is most expected.', 1, 0),
(9, 1, 'O''rielly story', '2015-09-26 17:40:08', 'O''rielly story will take place''s at 23 Aug 20', 'On the occation of cultural event''s day of O''rielly''s wellcoming ceremoll life is occation of cultural event''s day of O''rielly''s wellcoming ceremoll life is happent to going to become is that is life event''s day of O''rielly''s wellcoming ceremoll life is happent to going to become is that is life event''s day of O''rielly''s wellcoming ceremoll life is happent to going to become is that is life event''s day of O''rielly''s wellcoming ceremoll life is happent to going to become is that is life event''s day of O''rielly''s wellcoming ceremoll life is happent to going to become is that is life event''s day of O''rielly''s wellcoming ceremoll life is happent to going to become is that is life event''s day of O''rielly''s wellcoming ceremoll life is happent to going to become is that is life event''s day of O''rielly''s wellcoming ceremoll life is happent to going to become is that is life event''s day of O''rielly''s wellcoming ceremoll life is happent to going to become is that is life event''s day of O''rielly''s wellcoming ceremoll life is happent to going to become is that is life event''s day of O''rielly''s wellcoming ceremoll life is happent to going to become is that is life event''s day of O''rielly''s wellcoming ceremoll life is happent to going to become is that is life event''s day of O''rielly''s wellcoming ceremoll life is happent to going to become is that is life event''s day of O''rielly''s wellcoming ceremoll life is happent to going to become is that is life v event''s day of O''rielly''s wellcoming ceremoll life is happent to going to become is that is life event''s day of O''rielly''s wellcoming ceremoll life is happent to going to become is that is life event''s day of O''rielly''s wellcoming ceremoll life is happent to going to become is that is life event''s day of O''rielly''s wellcoming ceremoll life is happent to going to become is that is life event''s day of O''rielly''s wellcoming ceremoll life is happent to going to become is that is life event''s day of O''rielly''s wellcoming ceremoll life is happent to going to become is that is life event''s day of O''rielly''s wellcoming ceremoll life is happent to going to become is that is life event''s day of O''rielly''s wellcoming ceremoll life is happent to going to become is that is life event''s day of O''rielly''s wellcoming ceremoll life is happent to going to become is that is life event''s day of O''rielly''s wellcoming ceremoll life is happent to going to become is that is life event''s day of O''rielly''s wellcoming ceremoll life is happent to going to become is that is life', 1, 0),
(10, 2, 'Exam start''s', '2015-09-27 12:11:31', '3rd tutorial exam is going to start from 15th', 'à¦à¦¤à¦§à¦¾à¦°à¦¾ à¦®à¦¿à¦°à¦ªà§à¦° à¦†à¦‡à¦¡à¦¿à§Ÿà¦¾à¦² à¦¸à§à¦•à§à¦²à§‡à¦° à¦›à¦¾à¦¤à§à¦° à¦›à¦¾à¦¤à§à¦°à§€à¦¦à§‡à¦° à¦…à¦¬à¦—à¦¤à¦¿à¦° à¦œà¦¨à§à¦¯ à¦œà¦¾à¦¨à¦¾à¦¨à§‹ à¦œà¦¾à¦šà§à¦›à§‡ à¦¯à§‡ à¦†à¦—à¦¾à¦®à§€ à§§à§« October à¦ªà¦°à¦¿à¦•à§à¦·à¦¾ à¦¶à§à¦°à§ à¦¹à¦¬à§‡à¥¤', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parents_comments`
--

CREATE TABLE IF NOT EXISTS `tbl_parents_comments` (
  `comments_id` int(5) NOT NULL AUTO_INCREMENT,
  `comments` text NOT NULL,
  `comment_poster` varchar(50) NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`comments_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_parents_comments`
--

INSERT INTO `tbl_parents_comments` (`comments_id`, `comments`, `comment_poster`, `publication_status`, `deletion_status`) VALUES
(1, '<p class="MsoNormal"><font face="Arial, sans-serif"><span style="font-size: 10pt; line-height: 115%;">This school is really great,&nbsp;</span><span style="font-size: 13.3333px; line-height: 15.3333px;">Child</span><span style="font-size: 10pt; line-height: 115%;">&nbsp;are learning\r\nlife oriented theoretical and also practical education from the institute. Each\r\nand every teacher is highly qualified and they really care about kids. We\r\nreally happy to have our child in this institution.</span></font><span style="font-family: Arial, Verdana; font-size: 16pt; font-style: normal; font-variant: normal; font-weight: normal; line-height: 115%;"><o:p></o:p></span></p>', 'Abdul Hakim, Parent', 1, 0),
(2, '<span style="font-size: 10pt; line-height: 115%; font-family: Arial, sans-serif;">Hey I am a parent and the\r\nschool asked me to give a comment about their institution, well school is always\r\ngreat and I specially can tell about this school that they really provide a\r\ngreat environment for education. About my kidâ€™s education now Iâ€™m 70% tension\r\nfree by admitting him into this institution. I hope school will continue\r\ntowards their excellence in coming days.</span>', 'Imtiz Ahmed, Parent', 1, 0),
(3, '<span style="font-size: 10pt; line-height: 115%; font-family: Arial, sans-serif;">The schoolâ€™s education system\r\nis good, they arrange monthly parents teacher meet up which I think a great\r\ninitiative where everyone can through their idea about further development of\r\neducation system and child caring. I am proud to have my child admitted into\r\nthis institution.</span>', 'Sarmin Sultana, Mother', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register_student`
--

CREATE TABLE IF NOT EXISTS `tbl_register_student` (
  `register_student_id` int(11) NOT NULL AUTO_INCREMENT,
  `register_student_email` varchar(40) NOT NULL,
  `register_student_pw` varchar(40) NOT NULL,
  `student_id` varchar(11) NOT NULL COMMENT 'FK(tbl_student_student_id)',
  PRIMARY KEY (`register_student_id`),
  UNIQUE KEY `student_id` (`student_id`),
  UNIQUE KEY `register_student_email` (`register_student_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_register_student`
--

INSERT INTO `tbl_register_student` (`register_student_id`, `register_student_email`, `register_student_pw`, `student_id`) VALUES
(1, 'robiul@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '111'),
(2, 'hasan@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '112');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register_teacher`
--

CREATE TABLE IF NOT EXISTS `tbl_register_teacher` (
  `register_teacher_id` int(5) NOT NULL AUTO_INCREMENT,
  `register_teacher_email` varchar(40) NOT NULL,
  `register_teacher_pw` varchar(40) NOT NULL,
  `teacher_id` int(5) NOT NULL COMMENT 'foreign key',
  PRIMARY KEY (`register_teacher_id`),
  UNIQUE KEY `teacher_id` (`teacher_id`),
  UNIQUE KEY `register_teacher_email` (`register_teacher_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_register_teacher`
--

INSERT INTO `tbl_register_teacher` (`register_teacher_id`, `register_teacher_email`, `register_teacher_pw`, `teacher_id`) VALUES
(5, 'fjalkj', 'e10adc3949ba59abbe56e057f20f883e', 6),
(9, 'some@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 7),
(10, 'hi@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 8),
(11, 'hello@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 9),
(12, 'neloy@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result`
--

CREATE TABLE IF NOT EXISTS `tbl_result` (
  `result_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_unq_id` int(11) NOT NULL COMMENT 'FK(tbl_student_id)',
  `subject_id` int(4) NOT NULL COMMENT 'FK(tbl_subject_subject_id)',
  `obtained_mark` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`result_id`),
  KEY `student_unq_id` (`student_unq_id`),
  KEY `subject_id` (`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_result`
--

INSERT INTO `tbl_result` (`result_id`, `student_unq_id`, `subject_id`, `obtained_mark`) VALUES
(1, 1, 1, NULL),
(2, 1, 2, 87.00),
(3, 2, 1, NULL),
(4, 2, 2, 91.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE IF NOT EXISTS `tbl_slider` (
  `slider_id` int(5) NOT NULL AUTO_INCREMENT,
  `slider_image` varchar(100) NOT NULL,
  `slider_text` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_image`, `slider_text`, `publication_status`, `deletion_status`) VALUES
(1, 'banner1.jpg', '<font size="6">Hello This is for testing the slider to see that every thing goes well</font><div><font size="4">How is it looks like can you tell me this please!</font></div>', 0, 0),
(3, 'banner2.jpg', '<font size="6">This Web App is Made by A.K.M Ashraful Haque Bhuiyan</font><div><font size="5">you can let me know your comment about the project.</font></div>', 0, 0),
(4, 'banner3.jpg', '<font size="7">This is the school dynamic site v_0.5</font><div><font size="6">suggest me how can i improve it''s functionality</font></div>', 0, 0),
(5, 'resized_slider1.jpg', '<font size="7"><font face="Arial, Verdana">Child Get&nbsp;Involved into Creative work</font></font><div><font face="Arial, Verdana"><font size="7">&nbsp;</font><font size="5">We Have Several clubs to&nbsp;involve&nbsp;them into creative work</font></font></div>', 1, 0),
(6, 'resixed_slider3.jpg', '<font size="7">Kids really enjoy here the school time</font><div><font size="5">They learn through enjoyment</font></div>', 1, 0),
(7, 'resized_slider2.jpg', '<font size="7"><font face="Arial, Verdana">Kids get the chance to&nbsp;involve into outdoor games Which is great</font></font><div><font face="Arial, Verdana" size="5">Their brain function develop through outdoor activity</font></div>', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE IF NOT EXISTS `tbl_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(11) NOT NULL,
  `student_name` varchar(70) NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_id` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `student_id`, `student_name`, `publication_status`, `deletion_status`) VALUES
(1, '111', 'Robiul', 1, 0),
(2, '112', 'Hasan Karim', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE IF NOT EXISTS `tbl_subject` (
  `subject_id` int(4) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(30) NOT NULL,
  `teacher_id` int(5) NOT NULL,
  PRIMARY KEY (`subject_id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `subject_name`, `teacher_id`) VALUES
(1, 'Bangla', 5),
(2, 'English', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE IF NOT EXISTS `tbl_teacher` (
  `teacher_id` int(5) NOT NULL AUTO_INCREMENT,
  `grid_image` longblob NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `grid_summary` varchar(95) NOT NULL,
  `teacher_profile` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`teacher_id`, `grid_image`, `full_name`, `grid_summary`, `teacher_profile`, `publication_status`, `deletion_status`) VALUES
(5, 0x736964656261722d706f7374332e6a7067, 'Rafiq Mia', 'Rafiq Mia is a great teacher of computer technology.', '<span style="font-family: Arial, Verdana; font-size: 10pt; font-style: normal; font-variant: normal; line-height: normal; font-weight: normal;">Rafuq has completed his graduation from </span><b style="font-family: Arial, Verdana; font-size: 10pt; font-style: normal; font-variant: normal; line-height: normal;">Jahangir Nagar University </b><font face="Arial, Verdana"><span style="font-size: 10pt;">on the subject of</span></font><b style="font-family: Arial, Verdana; font-size: 10pt; font-style: normal; font-variant: normal; line-height: normal;"> Computer Science And Engineering </b><font face="Arial, Verdana"><span style="font-size: 10pt;">Now he is working in our institute as a </span></font><b style="font-family: Arial, Verdana; font-size: 10pt; font-style: normal; font-variant: normal; line-height: normal;">ICT Teacher </b><font face="Arial, Verdana"><span style="font-size: 10pt;">we really proud to have him.</span></font><div><ul><li><font face="Arial, Verdana"><span style="font-size: 13.3333px;">Rafuq is dedicated to his work</span></font></li><li><font face="Arial, Verdana"><span style="font-size: 13.3333px;">He teaches student in an effective way</span></font></li><li><font face="Arial, Verdana"><span style="font-size: 13.3333px;">He knows how to make them interested about the topic</span></font></li></ul></div>', 1, 0),
(6, 0x4e656c6f79203030332e6a7067, 'Neloy Ahmed', 'Neloy is passionate about about computer programming........ recently he is working with PHP', '', 1, 0),
(7, 0x6b6172696e612e6a7067, 'Karina Kapoor', 'She is a great teacher and she really loves teaching to child.', '', 1, 0),
(8, 0x696d616765732e6a7067, 'Barak O''bama', 'A great teacher of math and geometry and loves teaching.', 'Don''t surprised to see his name in our teacher''s list.&nbsp;', 1, 0),
(9, 0x6d6164687572692e6a7067, 'Madhuri Dixit', 'She is one of the great teacher of English and she loves the teaching profession.', '', 1, 0),
(10, 0x72616e692e6a7067, 'Rani Mukharji Small', 'Rani is a great teacher and her students loves her so much because of her teaching method she i', 'faafgfafa', 1, 0),
(13, 0x48756d616972612e6a7067, 'Humaira Himu', 'Humaira is one of the great teacher of our institute and we really proud to have her with us.', '<span style="font-family: Arial, Verdana; font-size: 10pt; font-style: normal; font-variant: normal; line-height: normal; font-weight: normal;">Humaira is one of the great teacher. Child really loves the way she teaches them. Humaira has completed her graduation from &nbsp;</span><b style="font-family: Arial, Verdana; font-size: 10pt; font-style: normal; font-variant: normal; line-height: normal;">Dhaka University </b><font face="Arial, Verdana"><span style="font-size: 10pt;">on the subject of English literature.</span></font><div><ul><li><font face="Arial, Verdana"><span style="font-size: 13.3333px;">She is puntual</span></font></li><li><font face="Arial, Verdana"><span style="font-size: 13.3333px;">Always smiling with child</span></font></li><li><font face="Arial, Verdana"><span style="font-size: 13.3333px;">responsible about her duty&nbsp;</span></font></li><li><font face="Arial, Verdana"><span style="font-size: 13.3333px;">She loves teaching</span></font></li></ul></div>', 1, 0),
(14, 0x313434303535383638343133362e6a7067, 'Abitab Bacchan', 'Bacchan is a great teacher.', '<font face="Arial, Verdana"><span style="font-size: 10pt;">Amitab is teaching for last 10 years and we are proud to have him</span></font><div><ul><li><font face="Arial, Verdana"><span style="font-size: 13.3333px;">he is punctual</span></font></li><li><font face="Arial, Verdana"><span style="font-size: 13.3333px;">time oriented</span></font></li><li><font face="Arial, Verdana"><span style="font-size: 13.3333px;">he is good person</span></font></li><li><font face="Arial, Verdana"><span style="font-size: 13.3333px;">child really loves his method</span></font></li></ul></div>', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teachers_top`
--

CREATE TABLE IF NOT EXISTS `tbl_teachers_top` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `top_side_image` varchar(50) NOT NULL,
  `top_side_text` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_teachers_top`
--

INSERT INTO `tbl_teachers_top` (`id`, `top_side_image`, `top_side_text`, `publication_status`, `deletion_status`) VALUES
(2, 'teachers_top.jpg', '<font size="6" style="font-family: Arial, Verdana; font-style: normal; font-variant: normal; font-weight: normal; line-height: normal;">Meet Our Staff</font><div style="font-family: Arial, Verdana; font-style: normal; font-variant: normal; font-weight: normal; line-height: normal;"><span style="color: rgb(119, 119, 119); font-family: Lato; font-size: 13px; line-height: 22.2856px; background-color: rgb(255, 255, 255);">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eu tellus ipsum. Nunc maximus sapien ac dui vulputate tincidunt. Morbi luctus nisi vel suscipit volutpat. Donec vitae auctor nisl. Ut malesuada felis in erat rutrum ultrices. Fusce iaculis ornare nunc rutrum ornare. Proin ut placerat enim, vel venenatis urna. Phasellus sed diam tincidunt mauris malesuada mattis et in nisl. Quisque massa eros, molestie at mi eget, aliquam tristique eros. Nullam aliquet placerat magna ut eleifend. Phasellus iaculis tristique laoreet.</span></div><div><ul><li style="box-sizing: border-box;">Fusce iaculis ornare nunc rutrum ornare.</li><li style="box-sizing: border-box;">Proin ut placerat enim, vel venenatis urna.</li><li style="box-sizing: border-box;">Proin ut placerat enim, vel venenatis urna.</li><li style="box-sizing: border-box;">Fusce iaculis ornare nunc rutrum ornare.</li><li style="box-sizing: border-box;">Phasellus iaculis tristique laoreet.</li><li style="box-sizing: border-box;">Nullam aliquet placerat magna ut eleifend.</li><li style="box-sizing: border-box;">Quisque massa eros, molestie at mi eget, aliquam tristique eros.</li></ul></div>', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_welcome`
--

CREATE TABLE IF NOT EXISTS `tbl_welcome` (
  `welcome_id` int(5) NOT NULL AUTO_INCREMENT,
  `top_side_image` varchar(50) NOT NULL,
  `welcome_text` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`welcome_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_welcome`
--

INSERT INTO `tbl_welcome` (`welcome_id`, `top_side_image`, `welcome_text`, `publication_status`, `deletion_status`) VALUES
(1, 'group_teacher.jpg', '<font size="7">WELCOME TO IDEAL SCHOOL</font><div>Ideal school is one of leading institution for education in the country. Our school provides education from Prep-1 to Class 9. We provide both theoretical and practical education for children, they also taught moral education for life. Our academic result is the best throughout the whole country. We have highly qualified teacher with great teaching attitude and effective method of teaching children. We are really passionate about improving education system that can build a great nation. Our school environment is highly effective for learning.</div><div><ul><li>Our Student does excellent result in all board exam</li><li>Involve children into extracurricular activities</li><li>Regular teacher parent meetup</li><li>Great environment for learning</li><li>Education in affordable cost</li><li>Scholarship for bright and poor students&nbsp;</li></ul></div>', 1, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD CONSTRAINT `tbl_gallery_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `tbl_gallery_album` (`album_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_register_student`
--
ALTER TABLE `tbl_register_student`
  ADD CONSTRAINT `tbl_register_student_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `tbl_student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_register_teacher`
--
ALTER TABLE `tbl_register_teacher`
  ADD CONSTRAINT `tbl_register_teacher_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `tbl_teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_result`
--
ALTER TABLE `tbl_result`
  ADD CONSTRAINT `tbl_result_ibfk_1` FOREIGN KEY (`student_unq_id`) REFERENCES `tbl_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_result_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `tbl_subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD CONSTRAINT `tbl_subject_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `tbl_teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

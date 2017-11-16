-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2017 at 05:30 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `madeby` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `datemade` varchar(170) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `userid`, `madeby`, `description`, `datemade`) VALUES
(3, 1, 'Admin Admin', 'Login', 'Nov 14, 2017 - 12:06 pm'),
(4, 1, 'Admin Admin', 'Logout', 'Nov 14, 2017 - 07:07 pm'),
(5, 3, 'Student Student', 'Login', 'Nov 14, 2017 - 12:07 pm'),
(6, 3, 'Student Student', 'Logout', 'Nov 14, 2017 - 07:08 pm');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(170) NOT NULL,
  `description` varchar(270) NOT NULL,
  `image` varchar(170) NOT NULL,
  `dateannounce` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `description`, `image`, `dateannounce`) VALUES
(1, 'Announcement #1', 'Hell World', 'yourstory-education.jpg', ''),
(6, 'Announcement 2', 'Karlo', 'hijikata2.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `backup_restore`
--

CREATE TABLE `backup_restore` (
  `id` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `backupby` varchar(100) NOT NULL,
  `datebackup` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `backup_restore`
--

INSERT INTO `backup_restore` (`id`, `message`, `backupby`, `datebackup`) VALUES
(16, 'Database Successfully uploaded.', 'admin admin', 'Sep-11-2017 11:10 pm'),
(17, 'Database Successfully restore.', 'admin admin', 'Sep-16-2017 09:13 pm'),
(18, 'Database Successfully backup.', 'admins admin', 'Sep-17-2017 01:51 pm'),
(19, 'Database Successfully backup.', 'admins admin', 'Sep-18-2017 06:56 pm');

-- --------------------------------------------------------

--
-- Table structure for table `conversation_reply`
--

CREATE TABLE `conversation_reply` (
  `CR_ID` int(11) NOT NULL,
  `reply` text NOT NULL,
  `user_id_fk` varchar(100) NOT NULL,
  `c_id_fk` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversation_reply`
--

INSERT INTO `conversation_reply` (`CR_ID`, `reply`, `user_id_fk`, `c_id_fk`, `time`) VALUES
(8, 'charing\r\n', '4', 23, '2017-11-11 13:21:28'),
(9, 'hello world\r\n', '4', 23, '2017-11-11 13:43:58'),
(10, 'hahaha', '4', 23, '2017-11-11 14:12:58'),
(11, 'musta?', '5', 23, '2017-11-11 14:18:06'),
(12, 'hello', '4', 23, '2017-11-12 14:25:54'),
(13, 'musta', '4', 23, '2017-11-12 14:26:21'),
(14, 'lll', '4', 23, '2017-11-12 14:40:07'),
(15, 'sa', '4', 23, '2017-11-13 03:24:16'),
(16, 'ano?', '5', 23, '2017-11-13 07:25:48'),
(17, 'Hello', '4', 0, '2017-11-14 02:12:34'),
(18, 'Hello', '4', 24, '2017-11-14 02:13:08'),
(19, 'musta?', '4', 24, '2017-11-14 02:14:24'),
(20, 'Hello World', '4', 25, '2017-11-14 02:40:45'),
(21, 'hi\r\n', '4', 25, '2017-11-14 02:40:58'),
(22, 'charot\r\n', '14', 25, '2017-11-14 04:52:19'),
(23, 'hello', '4', 25, '2017-11-14 09:50:53'),
(24, 'Hi', '1', 26, '2017-11-16 04:14:14'),
(25, 'dsadsadsa', '1', 27, '2017-11-16 04:20:40'),
(26, 'sss', '1', 28, '2017-11-16 04:24:40'),
(28, 'zxc', '1', 27, '2017-11-16 04:28:49'),
(29, 'saassaas', '1', 30, '2017-11-16 04:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `conversation_tbl`
--

CREATE TABLE `conversation_tbl` (
  `C_ID` int(11) NOT NULL,
  `user_one` varchar(100) NOT NULL,
  `user_two` varchar(100) NOT NULL,
  `user1_mes_status` int(11) NOT NULL,
  `user2_mes_status` int(11) NOT NULL,
  `date_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversation_tbl`
--

INSERT INTO `conversation_tbl` (`C_ID`, `user_one`, `user_two`, `user1_mes_status`, `user2_mes_status`, `date_time`) VALUES
(23, '4', '5', 0, 0, 'Nov 13, 2017 - 03:25 pm'),
(25, '4', '14', 0, 1, 'Nov 14, 2017 - 05:50 pm'),
(26, '1', '5', 0, 1, 'Nov 16, 2017 - 12:14 pm');

-- --------------------------------------------------------

--
-- Table structure for table `curriculumtbl`
--

CREATE TABLE `curriculumtbl` (
  `id` int(11) NOT NULL,
  `curname` varchar(200) NOT NULL,
  `gradelevel` varchar(100) NOT NULL,
  `datecreated` varchar(170) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curriculumtbl`
--

INSERT INTO `curriculumtbl` (`id`, `curname`, `gradelevel`, `datecreated`) VALUES
(13, 'cur2', 'Elementary', 'Nov 15, 2017'),
(15, 'cur1', 'Elementary', 'Nov 15, 2017');

-- --------------------------------------------------------

--
-- Table structure for table `event_tbl`
--

CREATE TABLE `event_tbl` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `descript` text NOT NULL,
  `image` varchar(170) NOT NULL,
  `dateupload` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_tbl`
--

INSERT INTO `event_tbl` (`id`, `title`, `descript`, `image`, `dateupload`) VALUES
(1, 'ITS Defence', 'Ang pagtutuos ng mga malulupit na panel at programmer', 'yourstory-education.jpg', 'Nov 05, 2017 - 08:19 PM'),
(3, 'sa', 'sas', '1.jpg', 'Nov 05, 2017 - 08:09 PM');

-- --------------------------------------------------------

--
-- Table structure for table `parentstudtbl`
--

CREATE TABLE `parentstudtbl` (
  `id` int(11) NOT NULL,
  `parentid` int(70) NOT NULL,
  `studid` int(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parentstudtbl`
--

INSERT INTO `parentstudtbl` (`id`, `parentid`, `studid`) VALUES
(2, 14, 3),
(5, 18, 16);

-- --------------------------------------------------------

--
-- Table structure for table `posttbl`
--

CREATE TABLE `posttbl` (
  `id` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `postby` varchar(170) NOT NULL,
  `dateupload` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posttbl`
--

INSERT INTO `posttbl` (`id`, `message`, `postby`, `dateupload`) VALUES
(4, 'Cheng Pogi', '3', 'Nov 11, 2017 - 04:31 pm'),
(10, 'Karlo Pogi', '4', 'Nov 11, 2017 - 05:30 pm');

-- --------------------------------------------------------

--
-- Table structure for table `slide_tbl`
--

CREATE TABLE `slide_tbl` (
  `id` int(11) NOT NULL,
  `image` varchar(270) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide_tbl`
--

INSERT INTO `slide_tbl` (`id`, `image`) VALUES
(2, '23114689_1640995292629319_642560143_n.jpg'),
(5, '23146087_1640995249295990_1727837053_n.jpg'),
(6, '23146220_1640995339295981_1055350325_n.jpg'),
(7, '23140218_1640995319295983_2020593181_n.jpg'),
(8, '23114886_1640995262629322_1872925118_n.jpg'),
(10, '23140201_1640995312629317_770363977_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblclass`
--

CREATE TABLE `tblclass` (
  `id` int(11) NOT NULL,
  `classname` varchar(20) NOT NULL,
  `schoolyearid` int(11) NOT NULL,
  `yearlevelid` int(11) NOT NULL,
  `cur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclass`
--

INSERT INTO `tblclass` (`id`, `classname`, `schoolyearid`, `yearlevelid`, `cur_id`) VALUES
(10, 'Class 1', 4, 5, 15),
(11, 'Class 2', 4, 4, 13);

-- --------------------------------------------------------

--
-- Table structure for table `tblschoolyear`
--

CREATE TABLE `tblschoolyear` (
  `id` int(11) NOT NULL,
  `schoolyear` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblschoolyear`
--

INSERT INTO `tblschoolyear` (`id`, `schoolyear`, `status`) VALUES
(4, '2017-2018', 1),
(24, '2016-2017', 1),
(25, '2018-2019', 0),
(27, '2019-2020', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentclass`
--

CREATE TABLE `tblstudentclass` (
  `id` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `schoolyear` int(11) NOT NULL,
  `cur_id` int(70) NOT NULL,
  `gradelevel` int(70) NOT NULL,
  `clearance_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudentclass`
--

INSERT INTO `tblstudentclass` (`id`, `classid`, `studentid`, `schoolyear`, `cur_id`, `gradelevel`, `clearance_status`) VALUES
(28, 10, 3, 0, 13, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentgrade`
--

CREATE TABLE `tblstudentgrade` (
  `id` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `adviserid` int(11) NOT NULL,
  `prelim` int(11) NOT NULL,
  `midterm` int(11) NOT NULL,
  `prefi` int(11) NOT NULL,
  `final` int(11) NOT NULL,
  `gradeaverage` int(11) NOT NULL,
  `remarks` varchar(20) NOT NULL,
  `schoolyearid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudentgrade`
--

INSERT INTO `tblstudentgrade` (`id`, `studentid`, `subjectid`, `classid`, `adviserid`, `prelim`, `midterm`, `prefi`, `final`, `gradeaverage`, `remarks`, `schoolyearid`) VALUES
(10, 3, 3, 3, 4, 90, 90, 90, 80, 88, 'Passed', 25),
(13, 16, 3, 3, 4, 90, 90, 70, 70, 80, 'Passed', 25);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE `tblsubjects` (
  `id` int(11) NOT NULL,
  `subjectname` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `yearlevelid` int(11) NOT NULL,
  `cur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`id`, `subjectname`, `description`, `yearlevelid`, `cur_id`) VALUES
(2, 'IT122S', 'Articial Intelligence', 5, 13),
(3, 'WORDLIT', 'Word Literature', 4, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tblteacheradvisory`
--

CREATE TABLE `tblteacheradvisory` (
  `id` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `curid` int(70) NOT NULL,
  `syid` int(70) NOT NULL,
  `gradelvl` int(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblteacheradvisory`
--

INSERT INTO `tblteacheradvisory` (`id`, `teacherid`, `classid`, `subjectid`, `curid`, `syid`, `gradelvl`) VALUES
(7, 7, 3, 2, 0, 0, 4),
(8, 4, 3, 3, 0, 0, 4),
(9, 4, 3, 2, 0, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tblyearlevel`
--

CREATE TABLE `tblyearlevel` (
  `id` int(11) NOT NULL,
  `yearlevel` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblyearlevel`
--

INSERT INTO `tblyearlevel` (`id`, `yearlevel`, `description`) VALUES
(4, 'Grade 1', 'Grade I'),
(5, 'Grade 2', 'Grade II'),
(6, 'Grade 3', 'Grade III'),
(10, 'Grade 4', 'Grade IV');

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

CREATE TABLE `usertbl` (
  `id` int(11) NOT NULL,
  `username` varchar(140) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(140) NOT NULL,
  `mname` varchar(140) NOT NULL,
  `lname` varchar(140) NOT NULL,
  `contact` varchar(140) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `profile_pic` varchar(170) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`id`, `username`, `password`, `fname`, `mname`, `lname`, `contact`, `usertype`, `status`, `profile_pic`) VALUES
(1, 'admin', 'admin', 'Admin', 'Admin', 'Admin', '1234', 'admin', 0, 'images/man-29.png'),
(3, 'student', 'student', 'Student', 'student', 'Student', '009889', 'student', 0, 'images/guide-to-became-web-developer-1.jpg'),
(4, 'teacher', 'teacher', 'Teacher', 'teacher', 'Teacher', '098778877999', 'teacher', 0, 'images/man-29.png'),
(5, 'jerwitness', 'sa', 'Jerson', 'Mater', 'Fabia', '0927303888', 'teacher', 0, 'images/man-29.png'),
(12, 'registrar', 'registrar123', 'Registrar', 'Registrar', 'Registrar', '09888777774', 'registrar', 0, 'images/businessman.png'),
(14, 'parent', 'parent123', 'Parent', ' ', 'Parent', '0989089898', 'parent', 0, 'images/man-28.png'),
(16, 'jose', 'student123', 'Jose', 'J', 'Rizal', '09809778', 'student', 0, 'images/man-28.png'),
(18, 'sa', 'parent123', 'sa', ' ', 'sa', 'sa', 'parent', 0, 'images/man-28.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backup_restore`
--
ALTER TABLE `backup_restore`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversation_reply`
--
ALTER TABLE `conversation_reply`
  ADD PRIMARY KEY (`CR_ID`);

--
-- Indexes for table `conversation_tbl`
--
ALTER TABLE `conversation_tbl`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `curriculumtbl`
--
ALTER TABLE `curriculumtbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_tbl`
--
ALTER TABLE `event_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parentstudtbl`
--
ALTER TABLE `parentstudtbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posttbl`
--
ALTER TABLE `posttbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide_tbl`
--
ALTER TABLE `slide_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblclass`
--
ALTER TABLE `tblclass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblschoolyear`
--
ALTER TABLE `tblschoolyear`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schoolyear` (`schoolyear`);

--
-- Indexes for table `tblstudentclass`
--
ALTER TABLE `tblstudentclass`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classid` (`classid`),
  ADD KEY `studentid` (`studentid`);

--
-- Indexes for table `tblstudentgrade`
--
ALTER TABLE `tblstudentgrade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblteacheradvisory`
--
ALTER TABLE `tblteacheradvisory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacherid` (`teacherid`,`classid`),
  ADD KEY `classid` (`classid`);

--
-- Indexes for table `tblyearlevel`
--
ALTER TABLE `tblyearlevel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `backup_restore`
--
ALTER TABLE `backup_restore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `conversation_reply`
--
ALTER TABLE `conversation_reply`
  MODIFY `CR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `conversation_tbl`
--
ALTER TABLE `conversation_tbl`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `curriculumtbl`
--
ALTER TABLE `curriculumtbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `event_tbl`
--
ALTER TABLE `event_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `parentstudtbl`
--
ALTER TABLE `parentstudtbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `posttbl`
--
ALTER TABLE `posttbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `slide_tbl`
--
ALTER TABLE `slide_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tblclass`
--
ALTER TABLE `tblclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tblschoolyear`
--
ALTER TABLE `tblschoolyear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tblstudentclass`
--
ALTER TABLE `tblstudentclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tblstudentgrade`
--
ALTER TABLE `tblstudentgrade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblteacheradvisory`
--
ALTER TABLE `tblteacheradvisory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tblyearlevel`
--
ALTER TABLE `tblyearlevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

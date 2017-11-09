-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2017 at 04:18 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
(5, 'Announcement #1', 'Display Hello World', '1.jpg', '');

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
(1, 'charot', 'F0217-0001', 20, '2017-10-26 09:00:55'),
(2, 'hey', 'P0117-001', 21, '2017-10-26 09:02:20'),
(3, 'why?', 'F0217-0001', 21, '2017-10-26 09:02:30'),
(4, 'k', 'P0117-001', 21, '2017-10-26 09:03:12'),
(5, 'n', 'F0217-0001', 21, '2017-10-26 09:03:18'),
(6, 'po\ngi ako', 'P0117-001', 21, '2017-10-26 09:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `conversation_tbl`
--

CREATE TABLE `conversation_tbl` (
  `C_ID` int(11) NOT NULL,
  `user_one` varchar(100) NOT NULL,
  `user_two` varchar(100) NOT NULL,
  `user1_mes_read` int(11) NOT NULL,
  `user1_mes_status` int(11) NOT NULL,
  `user2_mes_read` int(11) NOT NULL,
  `user2_mes_status` int(11) NOT NULL,
  `date_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversation_tbl`
--

INSERT INTO `conversation_tbl` (`C_ID`, `user_one`, `user_two`, `user1_mes_read`, `user1_mes_status`, `user2_mes_read`, `user2_mes_status`, `date_time`) VALUES
(19, 'F1217-0085', 'P0117-001', 0, 0, 0, 0, 'Oct 01, 2017 - 10:42 pm'),
(20, 'F0217-0001', 'F0023-0023', 0, 0, 1, 0, 'Oct 26, 2017 - 05:00 pm'),
(21, 'P0117-001', 'F0217-0001', 0, 0, 0, 0, 'Oct 26, 2017 - 05:03 pm');

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
(3, 'sa', 'sas', '1.jpg', 'Nov 05, 2017 - 08:09 PM'),
(4, 'sample', 'sample', 'computers(2).jpg', 'Nov 05, 2017 - 08:19 PM');

-- --------------------------------------------------------

--
-- Table structure for table `posttbl`
--

CREATE TABLE `posttbl` (
  `id` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `postby` int(170) NOT NULL,
  `dateupload` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '23140234_1640995269295988_837794233_n.jpg'),
(2, '23114689_1640995292629319_642560143_n.jpg'),
(5, '23146087_1640995249295990_1727837053_n.jpg'),
(6, '23146220_1640995339295981_1055350325_n.jpg'),
(7, '23140218_1640995319295983_2020593181_n.jpg'),
(8, '23114886_1640995262629322_1872925118_n.jpg'),
(10, '23140201_1640995312629317_770363977_n.jpg'),
(11, '23140503_1640995305962651_1142092054_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblclass`
--

CREATE TABLE `tblclass` (
  `id` int(11) NOT NULL,
  `classname` varchar(20) NOT NULL,
  `schoolyearid` int(11) NOT NULL,
  `yearlevelid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclass`
--

INSERT INTO `tblclass` (`id`, `classname`, `schoolyearid`, `yearlevelid`) VALUES
(3, 'BT704P', 24, 4);

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
(24, '2016-2017', 0),
(25, '2018-2019', 1),
(27, '2019-2020', 1),
(28, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentclass`
--

CREATE TABLE `tblstudentclass` (
  `id` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudentclass`
--

INSERT INTO `tblstudentclass` (`id`, `classid`, `studentid`, `subjectid`) VALUES
(10, 3, 3, 2),
(11, 3, 3, 3),
(12, 3, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentgrade`
--

CREATE TABLE `tblstudentgrade` (
  `id` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `schoolyearid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `adviserid` int(11) NOT NULL,
  `prelim` int(11) NOT NULL,
  `midterm` int(11) NOT NULL,
  `prefi` int(11) NOT NULL,
  `final` int(11) NOT NULL,
  `gradeaverage` int(11) NOT NULL,
  `remarks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudentgrade`
--

INSERT INTO `tblstudentgrade` (`id`, `studentid`, `schoolyearid`, `subjectid`, `classid`, `adviserid`, `prelim`, `midterm`, `prefi`, `final`, `gradeaverage`, `remarks`) VALUES
(9, 3, 24, 2, 3, 4, 90, 90, 70, 70, 80, 'Passed'),
(10, 3, 24, 3, 3, 4, 90, 90, 90, 80, 88, 'Passed'),
(12, 6, 24, 3, 3, 4, 90, 98, 98, 98, 96, 'Passed');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE `tblsubjects` (
  `id` int(11) NOT NULL,
  `subjectname` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `yearlevelid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`id`, `subjectname`, `description`, `yearlevelid`) VALUES
(2, 'IT122', 'Articial Intelligence', 4),
(3, 'WORDLIT', 'Word Literature', 8),
(4, '123', 'dasdadas', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tblteacheradvisory`
--

CREATE TABLE `tblteacheradvisory` (
  `id` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblteacheradvisory`
--

INSERT INTO `tblteacheradvisory` (`id`, `teacherid`, `classid`, `subjectid`) VALUES
(7, 7, 3, 2),
(8, 4, 3, 3),
(9, 4, 3, 2);

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
(4, '1st Year', 'First Year'),
(5, '2nd Year', 'Second Year'),
(6, '3rd Year', 'Third Year'),
(8, '4rth Year', 'Fourth Year');

-- --------------------------------------------------------

--
-- Table structure for table `top_students`
--

CREATE TABLE `top_students` (
  `id` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `studid` int(11) NOT NULL,
  `grade` int(100) NOT NULL,
  `period` varchar(100) NOT NULL,
  `adviserid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `top_students`
--

INSERT INTO `top_students` (`id`, `classid`, `subjectid`, `studid`, `grade`, `period`, `adviserid`) VALUES
(13, 3, 2, 3, 90, 'Pre Final', 4),
(17, 3, 3, 6, 89, 'Prelim', 4),
(18, 3, 3, 3, 88, 'Prelim', 4),
(19, 3, 2, 3, 90, 'Prelim', 4);

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
  `profile_pic` varchar(170) NOT NULL,
  `parentstud` int(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`id`, `username`, `password`, `fname`, `mname`, `lname`, `contact`, `usertype`, `status`, `profile_pic`, `parentstud`) VALUES
(1, 'admin', 'admin', 'admins', 'admin', 'admin', '1234', 'admin', 0, 'images/man-29.png', 0),
(3, 'student', 'student', 'student', 'student', 'student', '009889', 'student', 0, 'images/man-28.png', 0),
(4, 'teacher', 'teacher', 'teacher', 'teacher', 'teacher', '09', 'teacher', 0, 'images/man-29.png', 0),
(5, 'jerwitness', 'admin123', 'Jerson', 'Mater', 'Fabia', '0927303888', 'admin', 0, '', 0),
(6, 'joanmater', 'student123', 'joan', 'salomoto', 'mater', '123478910', 'student', 0, '', 0);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `top_students`
--
ALTER TABLE `top_students`
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
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `backup_restore`
--
ALTER TABLE `backup_restore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `conversation_reply`
--
ALTER TABLE `conversation_reply`
  MODIFY `CR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `conversation_tbl`
--
ALTER TABLE `conversation_tbl`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `curriculumtbl`
--
ALTER TABLE `curriculumtbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_tbl`
--
ALTER TABLE `event_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posttbl`
--
ALTER TABLE `posttbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slide_tbl`
--
ALTER TABLE `slide_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblclass`
--
ALTER TABLE `tblclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblschoolyear`
--
ALTER TABLE `tblschoolyear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tblstudentclass`
--
ALTER TABLE `tblstudentclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblstudentgrade`
--
ALTER TABLE `tblstudentgrade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblteacheradvisory`
--
ALTER TABLE `tblteacheradvisory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblyearlevel`
--
ALTER TABLE `tblyearlevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `top_students`
--
ALTER TABLE `top_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

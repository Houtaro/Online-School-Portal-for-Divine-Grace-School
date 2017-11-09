# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:51 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------


#
# Delete any existing table `announcement`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `announcement`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `announcement`
#

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(170) NOT NULL,
  `description` varchar(270) NOT NULL,
  `image` varchar(170) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ;

#
# Data contents of table announcement (2 records)
#
 
INSERT INTO `announcement` VALUES (1, 'Announcement #1', 'Hell World', 'yourstory-education.jpg') ; 
INSERT INTO `announcement` VALUES (5, 'Announcement #1', 'Display Hello World', '1.jpg') ;
#
# End of data contents of table announcement
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:51 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------


#
# Delete any existing table `backup_restore`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `backup_restore`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `backup_restore`
#

CREATE TABLE `backup_restore` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(200) NOT NULL,
  `backupby` varchar(100) NOT NULL,
  `datebackup` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 ;

#
# Data contents of table backup_restore (13 records)
#
 
INSERT INTO `backup_restore` VALUES (16, 'Database Successfully uploaded.', 'admin admin', 'Sep-11-2017 11:10 pm') ; 
INSERT INTO `backup_restore` VALUES (17, 'Database Successfully restore.', 'admin admin', 'Sep-16-2017 09:13 pm') ; 
INSERT INTO `backup_restore` VALUES (18, 'Database Successfully backup.', 'admins admin', 'Sep-17-2017 01:51 pm') ; 
INSERT INTO `backup_restore` VALUES (19, 'Database Successfully backup.', 'admins admin', 'Sep-18-2017 06:56 pm') ; 
INSERT INTO `backup_restore` VALUES (20, 'Database Successfully restore.', 'admins admin', 'Sep-22-2017 11:56 pm') ; 
INSERT INTO `backup_restore` VALUES (21, 'Database Successfully backup.', 'admins admin', 'Sep-22-2017 11:57 pm') ; 
INSERT INTO `backup_restore` VALUES (22, 'Database Successfully restore.', 'admins admin', 'Sep-24-2017 09:40 am') ; 
INSERT INTO `backup_restore` VALUES (23, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:46 am') ; 
INSERT INTO `backup_restore` VALUES (24, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:46 am') ; 
INSERT INTO `backup_restore` VALUES (25, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:48 am') ; 
INSERT INTO `backup_restore` VALUES (26, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:48 am') ; 
INSERT INTO `backup_restore` VALUES (27, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:50 am') ; 
INSERT INTO `backup_restore` VALUES (28, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:50 am') ;
#
# End of data contents of table backup_restore
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:51 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------


#
# Delete any existing table `tblclass`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblclass`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblclass`
#

CREATE TABLE `tblclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classname` varchar(20) NOT NULL,
  `schoolyearid` int(11) NOT NULL,
  `yearlevelid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblclass (1 records)
#
 
INSERT INTO `tblclass` VALUES (3, 'BT704P', 24, 4) ;
#
# End of data contents of table tblclass
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:51 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------


#
# Delete any existing table `tblschoolyear`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblschoolyear`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblschoolyear`
#

CREATE TABLE `tblschoolyear` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolyear` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `schoolyear` (`schoolyear`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblschoolyear (4 records)
#
 
INSERT INTO `tblschoolyear` VALUES (4, '2017-2018', 1) ; 
INSERT INTO `tblschoolyear` VALUES (24, '2016-2017', 0) ; 
INSERT INTO `tblschoolyear` VALUES (25, '2018-2019', 1) ; 
INSERT INTO `tblschoolyear` VALUES (27, '2019-2020', 1) ;
#
# End of data contents of table tblschoolyear
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:51 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------


#
# Delete any existing table `tblstudentclass`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblstudentclass`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblstudentclass`
#

CREATE TABLE `tblstudentclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `classid` (`classid`),
  KEY `studentid` (`studentid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblstudentclass (3 records)
#
 
INSERT INTO `tblstudentclass` VALUES (10, 3, 3, 2) ; 
INSERT INTO `tblstudentclass` VALUES (11, 3, 3, 3) ; 
INSERT INTO `tblstudentclass` VALUES (12, 3, 6, 3) ;
#
# End of data contents of table tblstudentclass
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:51 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------


#
# Delete any existing table `tblstudentgrade`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblstudentgrade`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblstudentgrade`
#

CREATE TABLE `tblstudentgrade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `remarks` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblstudentgrade (3 records)
#
 
INSERT INTO `tblstudentgrade` VALUES (9, 3, 24, 2, 3, 4, 90, 90, 70, 90, 85, 'Passed') ; 
INSERT INTO `tblstudentgrade` VALUES (10, 3, 24, 3, 3, 4, 90, 90, 90, 80, 88, 'Passed') ; 
INSERT INTO `tblstudentgrade` VALUES (12, 6, 24, 3, 3, 4, 90, 98, 98, 98, 96, 'Passed') ;
#
# End of data contents of table tblstudentgrade
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:51 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsubjects`
# --------------------------------------------------------


#
# Delete any existing table `tblsubjects`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblsubjects`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblsubjects`
#

CREATE TABLE `tblsubjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjectname` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `yearlevelid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblsubjects (3 records)
#
 
INSERT INTO `tblsubjects` VALUES (2, 'IT122', 'Articial Intelligence', 4) ; 
INSERT INTO `tblsubjects` VALUES (3, 'WORDLIT', 'Word Literature', 8) ; 
INSERT INTO `tblsubjects` VALUES (4, '123', 'dasdadas', 4) ;
#
# End of data contents of table tblsubjects
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:51 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblteacheradvisory`
# --------------------------------------------------------


#
# Delete any existing table `tblteacheradvisory`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblteacheradvisory`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblteacheradvisory`
#

CREATE TABLE `tblteacheradvisory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacherid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teacherid` (`teacherid`,`classid`),
  KEY `classid` (`classid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblteacheradvisory (3 records)
#
 
INSERT INTO `tblteacheradvisory` VALUES (7, 7, 3, 2) ; 
INSERT INTO `tblteacheradvisory` VALUES (8, 4, 3, 3) ; 
INSERT INTO `tblteacheradvisory` VALUES (9, 4, 3, 2) ;
#
# End of data contents of table tblteacheradvisory
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:51 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblteacheradvisory`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblyearlevel`
# --------------------------------------------------------


#
# Delete any existing table `tblyearlevel`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblyearlevel`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblyearlevel`
#

CREATE TABLE `tblyearlevel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yearlevel` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblyearlevel (4 records)
#
 
INSERT INTO `tblyearlevel` VALUES (4, '1st Year', 'First Year') ; 
INSERT INTO `tblyearlevel` VALUES (5, '2nd Year', 'Second Year') ; 
INSERT INTO `tblyearlevel` VALUES (6, '3rd Year', 'Third Year') ; 
INSERT INTO `tblyearlevel` VALUES (8, '4rth Year', 'Fourth Year') ;
#
# End of data contents of table tblyearlevel
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:51 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblteacheradvisory`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblyearlevel`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `top_students`
# --------------------------------------------------------


#
# Delete any existing table `top_students`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `top_students`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `top_students`
#

CREATE TABLE `top_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `topnum` int(11) NOT NULL,
  `studid` int(11) NOT NULL,
  `grade` int(100) NOT NULL,
  `period` varchar(100) NOT NULL,
  `adviserid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 ;

#
# Data contents of table top_students (4 records)
#
 
INSERT INTO `top_students` VALUES (13, 3, 2, 1, 3, 90, 'Pre Final', 4) ; 
INSERT INTO `top_students` VALUES (17, 3, 3, 1, 6, 89, 'Prelim', 4) ; 
INSERT INTO `top_students` VALUES (18, 3, 3, 2, 3, 88, 'Prelim', 4) ; 
INSERT INTO `top_students` VALUES (19, 3, 2, 1, 3, 90, 'Prelim', 4) ;
#
# End of data contents of table top_students
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:51 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblteacheradvisory`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblyearlevel`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `top_students`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `usertbl`
# --------------------------------------------------------


#
# Delete any existing table `usertbl`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `usertbl`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `usertbl`
#

CREATE TABLE `usertbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(140) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(140) NOT NULL,
  `mname` varchar(140) NOT NULL,
  `lname` varchar(140) NOT NULL,
  `contact` varchar(140) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ;

#
# Data contents of table usertbl (5 records)
#
 
INSERT INTO `usertbl` VALUES (1, 'admin', 'admin', 'admins', 'admin', 'admin', '1234', 'admin', 0) ; 
INSERT INTO `usertbl` VALUES (3, 'students', 'student', 'student', 'student', 'student', '009889', 'student', 1) ; 
INSERT INTO `usertbl` VALUES (4, 'teacher', 'teacher', 'teacher', 'teacher', 'teacher', '09', 'teacher', 0) ; 
INSERT INTO `usertbl` VALUES (5, 'jerwitness', 'admin123', 'Jerson', 'Mater', 'Fabia', '0927303888', 'admin', 0) ; 
INSERT INTO `usertbl` VALUES (6, 'joanmater', 'student123', 'joan', 'salomoto', 'mater', '123478910', 'student', 0) ;
#
# End of data contents of table usertbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:52 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------


#
# Delete any existing table `announcement`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `announcement`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `announcement`
#

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(170) NOT NULL,
  `description` varchar(270) NOT NULL,
  `image` varchar(170) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ;

#
# Data contents of table announcement (2 records)
#
 
INSERT INTO `announcement` VALUES (1, 'Announcement #1', 'Hell World', 'yourstory-education.jpg') ; 
INSERT INTO `announcement` VALUES (5, 'Announcement #1', 'Display Hello World', '1.jpg') ;
#
# End of data contents of table announcement
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:52 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------


#
# Delete any existing table `backup_restore`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `backup_restore`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `backup_restore`
#

CREATE TABLE `backup_restore` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(200) NOT NULL,
  `backupby` varchar(100) NOT NULL,
  `datebackup` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1 ;

#
# Data contents of table backup_restore (14 records)
#
 
INSERT INTO `backup_restore` VALUES (16, 'Database Successfully uploaded.', 'admin admin', 'Sep-11-2017 11:10 pm') ; 
INSERT INTO `backup_restore` VALUES (17, 'Database Successfully restore.', 'admin admin', 'Sep-16-2017 09:13 pm') ; 
INSERT INTO `backup_restore` VALUES (18, 'Database Successfully backup.', 'admins admin', 'Sep-17-2017 01:51 pm') ; 
INSERT INTO `backup_restore` VALUES (19, 'Database Successfully backup.', 'admins admin', 'Sep-18-2017 06:56 pm') ; 
INSERT INTO `backup_restore` VALUES (20, 'Database Successfully restore.', 'admins admin', 'Sep-22-2017 11:56 pm') ; 
INSERT INTO `backup_restore` VALUES (21, 'Database Successfully backup.', 'admins admin', 'Sep-22-2017 11:57 pm') ; 
INSERT INTO `backup_restore` VALUES (22, 'Database Successfully restore.', 'admins admin', 'Sep-24-2017 09:40 am') ; 
INSERT INTO `backup_restore` VALUES (23, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:46 am') ; 
INSERT INTO `backup_restore` VALUES (24, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:46 am') ; 
INSERT INTO `backup_restore` VALUES (25, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:48 am') ; 
INSERT INTO `backup_restore` VALUES (26, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:48 am') ; 
INSERT INTO `backup_restore` VALUES (27, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:50 am') ; 
INSERT INTO `backup_restore` VALUES (28, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:50 am') ; 
INSERT INTO `backup_restore` VALUES (29, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:51 am') ;
#
# End of data contents of table backup_restore
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:52 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------


#
# Delete any existing table `tblclass`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblclass`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblclass`
#

CREATE TABLE `tblclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classname` varchar(20) NOT NULL,
  `schoolyearid` int(11) NOT NULL,
  `yearlevelid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblclass (1 records)
#
 
INSERT INTO `tblclass` VALUES (3, 'BT704P', 24, 4) ;
#
# End of data contents of table tblclass
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:52 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------


#
# Delete any existing table `tblschoolyear`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblschoolyear`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblschoolyear`
#

CREATE TABLE `tblschoolyear` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolyear` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `schoolyear` (`schoolyear`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblschoolyear (4 records)
#
 
INSERT INTO `tblschoolyear` VALUES (4, '2017-2018', 1) ; 
INSERT INTO `tblschoolyear` VALUES (24, '2016-2017', 0) ; 
INSERT INTO `tblschoolyear` VALUES (25, '2018-2019', 1) ; 
INSERT INTO `tblschoolyear` VALUES (27, '2019-2020', 1) ;
#
# End of data contents of table tblschoolyear
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:52 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------


#
# Delete any existing table `tblstudentclass`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblstudentclass`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblstudentclass`
#

CREATE TABLE `tblstudentclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `classid` (`classid`),
  KEY `studentid` (`studentid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblstudentclass (3 records)
#
 
INSERT INTO `tblstudentclass` VALUES (10, 3, 3, 2) ; 
INSERT INTO `tblstudentclass` VALUES (11, 3, 3, 3) ; 
INSERT INTO `tblstudentclass` VALUES (12, 3, 6, 3) ;
#
# End of data contents of table tblstudentclass
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:52 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------


#
# Delete any existing table `tblstudentgrade`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblstudentgrade`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblstudentgrade`
#

CREATE TABLE `tblstudentgrade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `remarks` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblstudentgrade (3 records)
#
 
INSERT INTO `tblstudentgrade` VALUES (9, 3, 24, 2, 3, 4, 90, 90, 70, 90, 85, 'Passed') ; 
INSERT INTO `tblstudentgrade` VALUES (10, 3, 24, 3, 3, 4, 90, 90, 90, 80, 88, 'Passed') ; 
INSERT INTO `tblstudentgrade` VALUES (12, 6, 24, 3, 3, 4, 90, 98, 98, 98, 96, 'Passed') ;
#
# End of data contents of table tblstudentgrade
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:52 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsubjects`
# --------------------------------------------------------


#
# Delete any existing table `tblsubjects`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblsubjects`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblsubjects`
#

CREATE TABLE `tblsubjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjectname` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `yearlevelid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblsubjects (3 records)
#
 
INSERT INTO `tblsubjects` VALUES (2, 'IT122', 'Articial Intelligence', 4) ; 
INSERT INTO `tblsubjects` VALUES (3, 'WORDLIT', 'Word Literature', 8) ; 
INSERT INTO `tblsubjects` VALUES (4, '123', 'dasdadas', 4) ;
#
# End of data contents of table tblsubjects
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:52 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblteacheradvisory`
# --------------------------------------------------------


#
# Delete any existing table `tblteacheradvisory`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblteacheradvisory`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblteacheradvisory`
#

CREATE TABLE `tblteacheradvisory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacherid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teacherid` (`teacherid`,`classid`),
  KEY `classid` (`classid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblteacheradvisory (3 records)
#
 
INSERT INTO `tblteacheradvisory` VALUES (7, 7, 3, 2) ; 
INSERT INTO `tblteacheradvisory` VALUES (8, 4, 3, 3) ; 
INSERT INTO `tblteacheradvisory` VALUES (9, 4, 3, 2) ;
#
# End of data contents of table tblteacheradvisory
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:52 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblteacheradvisory`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblyearlevel`
# --------------------------------------------------------


#
# Delete any existing table `tblyearlevel`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblyearlevel`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblyearlevel`
#

CREATE TABLE `tblyearlevel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yearlevel` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblyearlevel (4 records)
#
 
INSERT INTO `tblyearlevel` VALUES (4, '1st Year', 'First Year') ; 
INSERT INTO `tblyearlevel` VALUES (5, '2nd Year', 'Second Year') ; 
INSERT INTO `tblyearlevel` VALUES (6, '3rd Year', 'Third Year') ; 
INSERT INTO `tblyearlevel` VALUES (8, '4rth Year', 'Fourth Year') ;
#
# End of data contents of table tblyearlevel
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:52 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblteacheradvisory`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblyearlevel`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `top_students`
# --------------------------------------------------------


#
# Delete any existing table `top_students`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `top_students`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `top_students`
#

CREATE TABLE `top_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `topnum` int(11) NOT NULL,
  `studid` int(11) NOT NULL,
  `grade` int(100) NOT NULL,
  `period` varchar(100) NOT NULL,
  `adviserid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 ;

#
# Data contents of table top_students (4 records)
#
 
INSERT INTO `top_students` VALUES (13, 3, 2, 1, 3, 90, 'Pre Final', 4) ; 
INSERT INTO `top_students` VALUES (17, 3, 3, 1, 6, 89, 'Prelim', 4) ; 
INSERT INTO `top_students` VALUES (18, 3, 3, 2, 3, 88, 'Prelim', 4) ; 
INSERT INTO `top_students` VALUES (19, 3, 2, 1, 3, 90, 'Prelim', 4) ;
#
# End of data contents of table top_students
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:52 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblteacheradvisory`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblyearlevel`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `top_students`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `usertbl`
# --------------------------------------------------------


#
# Delete any existing table `usertbl`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `usertbl`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `usertbl`
#

CREATE TABLE `usertbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(140) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(140) NOT NULL,
  `mname` varchar(140) NOT NULL,
  `lname` varchar(140) NOT NULL,
  `contact` varchar(140) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ;

#
# Data contents of table usertbl (5 records)
#
 
INSERT INTO `usertbl` VALUES (1, 'admin', 'admin', 'admins', 'admin', 'admin', '1234', 'admin', 0) ; 
INSERT INTO `usertbl` VALUES (3, 'students', 'student', 'student', 'student', 'student', '009889', 'student', 1) ; 
INSERT INTO `usertbl` VALUES (4, 'teacher', 'teacher', 'teacher', 'teacher', 'teacher', '09', 'teacher', 0) ; 
INSERT INTO `usertbl` VALUES (5, 'jerwitness', 'admin123', 'Jerson', 'Mater', 'Fabia', '0927303888', 'admin', 0) ; 
INSERT INTO `usertbl` VALUES (6, 'joanmater', 'student123', 'joan', 'salomoto', 'mater', '123478910', 'student', 0) ;
#
# End of data contents of table usertbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:52 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------


#
# Delete any existing table `announcement`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `announcement`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `announcement`
#

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(170) NOT NULL,
  `description` varchar(270) NOT NULL,
  `image` varchar(170) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ;

#
# Data contents of table announcement (2 records)
#
 
INSERT INTO `announcement` VALUES (1, 'Announcement #1', 'Hell World', 'yourstory-education.jpg') ; 
INSERT INTO `announcement` VALUES (5, 'Announcement #1', 'Display Hello World', '1.jpg') ;
#
# End of data contents of table announcement
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:52 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------


#
# Delete any existing table `backup_restore`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `backup_restore`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `backup_restore`
#

CREATE TABLE `backup_restore` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(200) NOT NULL,
  `backupby` varchar(100) NOT NULL,
  `datebackup` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 ;

#
# Data contents of table backup_restore (15 records)
#
 
INSERT INTO `backup_restore` VALUES (16, 'Database Successfully uploaded.', 'admin admin', 'Sep-11-2017 11:10 pm') ; 
INSERT INTO `backup_restore` VALUES (17, 'Database Successfully restore.', 'admin admin', 'Sep-16-2017 09:13 pm') ; 
INSERT INTO `backup_restore` VALUES (18, 'Database Successfully backup.', 'admins admin', 'Sep-17-2017 01:51 pm') ; 
INSERT INTO `backup_restore` VALUES (19, 'Database Successfully backup.', 'admins admin', 'Sep-18-2017 06:56 pm') ; 
INSERT INTO `backup_restore` VALUES (20, 'Database Successfully restore.', 'admins admin', 'Sep-22-2017 11:56 pm') ; 
INSERT INTO `backup_restore` VALUES (21, 'Database Successfully backup.', 'admins admin', 'Sep-22-2017 11:57 pm') ; 
INSERT INTO `backup_restore` VALUES (22, 'Database Successfully restore.', 'admins admin', 'Sep-24-2017 09:40 am') ; 
INSERT INTO `backup_restore` VALUES (23, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:46 am') ; 
INSERT INTO `backup_restore` VALUES (24, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:46 am') ; 
INSERT INTO `backup_restore` VALUES (25, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:48 am') ; 
INSERT INTO `backup_restore` VALUES (26, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:48 am') ; 
INSERT INTO `backup_restore` VALUES (27, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:50 am') ; 
INSERT INTO `backup_restore` VALUES (28, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:50 am') ; 
INSERT INTO `backup_restore` VALUES (29, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:51 am') ; 
INSERT INTO `backup_restore` VALUES (30, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:52 am') ;
#
# End of data contents of table backup_restore
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:52 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------


#
# Delete any existing table `tblclass`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblclass`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblclass`
#

CREATE TABLE `tblclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classname` varchar(20) NOT NULL,
  `schoolyearid` int(11) NOT NULL,
  `yearlevelid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblclass (1 records)
#
 
INSERT INTO `tblclass` VALUES (3, 'BT704P', 24, 4) ;
#
# End of data contents of table tblclass
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:52 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------


#
# Delete any existing table `tblschoolyear`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblschoolyear`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblschoolyear`
#

CREATE TABLE `tblschoolyear` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolyear` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `schoolyear` (`schoolyear`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblschoolyear (4 records)
#
 
INSERT INTO `tblschoolyear` VALUES (4, '2017-2018', 1) ; 
INSERT INTO `tblschoolyear` VALUES (24, '2016-2017', 0) ; 
INSERT INTO `tblschoolyear` VALUES (25, '2018-2019', 1) ; 
INSERT INTO `tblschoolyear` VALUES (27, '2019-2020', 1) ;
#
# End of data contents of table tblschoolyear
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:52 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------


#
# Delete any existing table `tblstudentclass`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblstudentclass`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblstudentclass`
#

CREATE TABLE `tblstudentclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `classid` (`classid`),
  KEY `studentid` (`studentid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblstudentclass (3 records)
#
 
INSERT INTO `tblstudentclass` VALUES (10, 3, 3, 2) ; 
INSERT INTO `tblstudentclass` VALUES (11, 3, 3, 3) ; 
INSERT INTO `tblstudentclass` VALUES (12, 3, 6, 3) ;
#
# End of data contents of table tblstudentclass
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:52 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------


#
# Delete any existing table `tblstudentgrade`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblstudentgrade`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblstudentgrade`
#

CREATE TABLE `tblstudentgrade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `remarks` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblstudentgrade (3 records)
#
 
INSERT INTO `tblstudentgrade` VALUES (9, 3, 24, 2, 3, 4, 90, 90, 70, 90, 85, 'Passed') ; 
INSERT INTO `tblstudentgrade` VALUES (10, 3, 24, 3, 3, 4, 90, 90, 90, 80, 88, 'Passed') ; 
INSERT INTO `tblstudentgrade` VALUES (12, 6, 24, 3, 3, 4, 90, 98, 98, 98, 96, 'Passed') ;
#
# End of data contents of table tblstudentgrade
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:52 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsubjects`
# --------------------------------------------------------


#
# Delete any existing table `tblsubjects`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblsubjects`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblsubjects`
#

CREATE TABLE `tblsubjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjectname` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `yearlevelid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblsubjects (3 records)
#
 
INSERT INTO `tblsubjects` VALUES (2, 'IT122', 'Articial Intelligence', 4) ; 
INSERT INTO `tblsubjects` VALUES (3, 'WORDLIT', 'Word Literature', 8) ; 
INSERT INTO `tblsubjects` VALUES (4, '123', 'dasdadas', 4) ;
#
# End of data contents of table tblsubjects
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:52 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblteacheradvisory`
# --------------------------------------------------------


#
# Delete any existing table `tblteacheradvisory`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblteacheradvisory`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblteacheradvisory`
#

CREATE TABLE `tblteacheradvisory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacherid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teacherid` (`teacherid`,`classid`),
  KEY `classid` (`classid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblteacheradvisory (3 records)
#
 
INSERT INTO `tblteacheradvisory` VALUES (7, 7, 3, 2) ; 
INSERT INTO `tblteacheradvisory` VALUES (8, 4, 3, 3) ; 
INSERT INTO `tblteacheradvisory` VALUES (9, 4, 3, 2) ;
#
# End of data contents of table tblteacheradvisory
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:52 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblteacheradvisory`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblyearlevel`
# --------------------------------------------------------


#
# Delete any existing table `tblyearlevel`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblyearlevel`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblyearlevel`
#

CREATE TABLE `tblyearlevel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yearlevel` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblyearlevel (4 records)
#
 
INSERT INTO `tblyearlevel` VALUES (4, '1st Year', 'First Year') ; 
INSERT INTO `tblyearlevel` VALUES (5, '2nd Year', 'Second Year') ; 
INSERT INTO `tblyearlevel` VALUES (6, '3rd Year', 'Third Year') ; 
INSERT INTO `tblyearlevel` VALUES (8, '4rth Year', 'Fourth Year') ;
#
# End of data contents of table tblyearlevel
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:52 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblteacheradvisory`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblyearlevel`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `top_students`
# --------------------------------------------------------


#
# Delete any existing table `top_students`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `top_students`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `top_students`
#

CREATE TABLE `top_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `topnum` int(11) NOT NULL,
  `studid` int(11) NOT NULL,
  `grade` int(100) NOT NULL,
  `period` varchar(100) NOT NULL,
  `adviserid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 ;

#
# Data contents of table top_students (4 records)
#
 
INSERT INTO `top_students` VALUES (13, 3, 2, 1, 3, 90, 'Pre Final', 4) ; 
INSERT INTO `top_students` VALUES (17, 3, 3, 1, 6, 89, 'Prelim', 4) ; 
INSERT INTO `top_students` VALUES (18, 3, 3, 2, 3, 88, 'Prelim', 4) ; 
INSERT INTO `top_students` VALUES (19, 3, 2, 1, 3, 90, 'Prelim', 4) ;
#
# End of data contents of table top_students
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:52 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblteacheradvisory`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblyearlevel`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `top_students`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `usertbl`
# --------------------------------------------------------


#
# Delete any existing table `usertbl`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `usertbl`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `usertbl`
#

CREATE TABLE `usertbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(140) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(140) NOT NULL,
  `mname` varchar(140) NOT NULL,
  `lname` varchar(140) NOT NULL,
  `contact` varchar(140) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ;

#
# Data contents of table usertbl (5 records)
#
 
INSERT INTO `usertbl` VALUES (1, 'admin', 'admin', 'admins', 'admin', 'admin', '1234', 'admin', 0) ; 
INSERT INTO `usertbl` VALUES (3, 'students', 'student', 'student', 'student', 'student', '009889', 'student', 1) ; 
INSERT INTO `usertbl` VALUES (4, 'teacher', 'teacher', 'teacher', 'teacher', 'teacher', '09', 'teacher', 0) ; 
INSERT INTO `usertbl` VALUES (5, 'jerwitness', 'admin123', 'Jerson', 'Mater', 'Fabia', '0927303888', 'admin', 0) ; 
INSERT INTO `usertbl` VALUES (6, 'joanmater', 'student123', 'joan', 'salomoto', 'mater', '123478910', 'student', 0) ;
#
# End of data contents of table usertbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:53 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------


#
# Delete any existing table `announcement`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `announcement`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `announcement`
#

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(170) NOT NULL,
  `description` varchar(270) NOT NULL,
  `image` varchar(170) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ;

#
# Data contents of table announcement (2 records)
#
 
INSERT INTO `announcement` VALUES (1, 'Announcement #1', 'Hell World', 'yourstory-education.jpg') ; 
INSERT INTO `announcement` VALUES (5, 'Announcement #1', 'Display Hello World', '1.jpg') ;
#
# End of data contents of table announcement
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:53 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------


#
# Delete any existing table `backup_restore`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `backup_restore`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `backup_restore`
#

CREATE TABLE `backup_restore` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(200) NOT NULL,
  `backupby` varchar(100) NOT NULL,
  `datebackup` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1 ;

#
# Data contents of table backup_restore (16 records)
#
 
INSERT INTO `backup_restore` VALUES (16, 'Database Successfully uploaded.', 'admin admin', 'Sep-11-2017 11:10 pm') ; 
INSERT INTO `backup_restore` VALUES (17, 'Database Successfully restore.', 'admin admin', 'Sep-16-2017 09:13 pm') ; 
INSERT INTO `backup_restore` VALUES (18, 'Database Successfully backup.', 'admins admin', 'Sep-17-2017 01:51 pm') ; 
INSERT INTO `backup_restore` VALUES (19, 'Database Successfully backup.', 'admins admin', 'Sep-18-2017 06:56 pm') ; 
INSERT INTO `backup_restore` VALUES (20, 'Database Successfully restore.', 'admins admin', 'Sep-22-2017 11:56 pm') ; 
INSERT INTO `backup_restore` VALUES (21, 'Database Successfully backup.', 'admins admin', 'Sep-22-2017 11:57 pm') ; 
INSERT INTO `backup_restore` VALUES (22, 'Database Successfully restore.', 'admins admin', 'Sep-24-2017 09:40 am') ; 
INSERT INTO `backup_restore` VALUES (23, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:46 am') ; 
INSERT INTO `backup_restore` VALUES (24, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:46 am') ; 
INSERT INTO `backup_restore` VALUES (25, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:48 am') ; 
INSERT INTO `backup_restore` VALUES (26, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:48 am') ; 
INSERT INTO `backup_restore` VALUES (27, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:50 am') ; 
INSERT INTO `backup_restore` VALUES (28, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:50 am') ; 
INSERT INTO `backup_restore` VALUES (29, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:51 am') ; 
INSERT INTO `backup_restore` VALUES (30, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:52 am') ; 
INSERT INTO `backup_restore` VALUES (31, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:52 am') ;
#
# End of data contents of table backup_restore
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:53 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------


#
# Delete any existing table `tblclass`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblclass`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblclass`
#

CREATE TABLE `tblclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classname` varchar(20) NOT NULL,
  `schoolyearid` int(11) NOT NULL,
  `yearlevelid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblclass (1 records)
#
 
INSERT INTO `tblclass` VALUES (3, 'BT704P', 24, 4) ;
#
# End of data contents of table tblclass
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:53 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------


#
# Delete any existing table `tblschoolyear`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblschoolyear`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblschoolyear`
#

CREATE TABLE `tblschoolyear` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolyear` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `schoolyear` (`schoolyear`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblschoolyear (4 records)
#
 
INSERT INTO `tblschoolyear` VALUES (4, '2017-2018', 1) ; 
INSERT INTO `tblschoolyear` VALUES (24, '2016-2017', 0) ; 
INSERT INTO `tblschoolyear` VALUES (25, '2018-2019', 1) ; 
INSERT INTO `tblschoolyear` VALUES (27, '2019-2020', 1) ;
#
# End of data contents of table tblschoolyear
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:53 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------


#
# Delete any existing table `tblstudentclass`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblstudentclass`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblstudentclass`
#

CREATE TABLE `tblstudentclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `classid` (`classid`),
  KEY `studentid` (`studentid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblstudentclass (3 records)
#
 
INSERT INTO `tblstudentclass` VALUES (10, 3, 3, 2) ; 
INSERT INTO `tblstudentclass` VALUES (11, 3, 3, 3) ; 
INSERT INTO `tblstudentclass` VALUES (12, 3, 6, 3) ;
#
# End of data contents of table tblstudentclass
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:53 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------


#
# Delete any existing table `tblstudentgrade`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblstudentgrade`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblstudentgrade`
#

CREATE TABLE `tblstudentgrade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `remarks` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblstudentgrade (3 records)
#
 
INSERT INTO `tblstudentgrade` VALUES (9, 3, 24, 2, 3, 4, 90, 90, 70, 90, 85, 'Passed') ; 
INSERT INTO `tblstudentgrade` VALUES (10, 3, 24, 3, 3, 4, 90, 90, 90, 80, 88, 'Passed') ; 
INSERT INTO `tblstudentgrade` VALUES (12, 6, 24, 3, 3, 4, 90, 98, 98, 98, 96, 'Passed') ;
#
# End of data contents of table tblstudentgrade
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:53 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsubjects`
# --------------------------------------------------------


#
# Delete any existing table `tblsubjects`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblsubjects`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblsubjects`
#

CREATE TABLE `tblsubjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjectname` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `yearlevelid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblsubjects (3 records)
#
 
INSERT INTO `tblsubjects` VALUES (2, 'IT122', 'Articial Intelligence', 4) ; 
INSERT INTO `tblsubjects` VALUES (3, 'WORDLIT', 'Word Literature', 8) ; 
INSERT INTO `tblsubjects` VALUES (4, '123', 'dasdadas', 4) ;
#
# End of data contents of table tblsubjects
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:53 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblteacheradvisory`
# --------------------------------------------------------


#
# Delete any existing table `tblteacheradvisory`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblteacheradvisory`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblteacheradvisory`
#

CREATE TABLE `tblteacheradvisory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacherid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teacherid` (`teacherid`,`classid`),
  KEY `classid` (`classid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblteacheradvisory (3 records)
#
 
INSERT INTO `tblteacheradvisory` VALUES (7, 7, 3, 2) ; 
INSERT INTO `tblteacheradvisory` VALUES (8, 4, 3, 3) ; 
INSERT INTO `tblteacheradvisory` VALUES (9, 4, 3, 2) ;
#
# End of data contents of table tblteacheradvisory
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:53 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblteacheradvisory`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblyearlevel`
# --------------------------------------------------------


#
# Delete any existing table `tblyearlevel`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblyearlevel`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblyearlevel`
#

CREATE TABLE `tblyearlevel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yearlevel` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblyearlevel (4 records)
#
 
INSERT INTO `tblyearlevel` VALUES (4, '1st Year', 'First Year') ; 
INSERT INTO `tblyearlevel` VALUES (5, '2nd Year', 'Second Year') ; 
INSERT INTO `tblyearlevel` VALUES (6, '3rd Year', 'Third Year') ; 
INSERT INTO `tblyearlevel` VALUES (8, '4rth Year', 'Fourth Year') ;
#
# End of data contents of table tblyearlevel
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:53 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblteacheradvisory`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblyearlevel`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `top_students`
# --------------------------------------------------------


#
# Delete any existing table `top_students`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `top_students`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `top_students`
#

CREATE TABLE `top_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `topnum` int(11) NOT NULL,
  `studid` int(11) NOT NULL,
  `grade` int(100) NOT NULL,
  `period` varchar(100) NOT NULL,
  `adviserid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 ;

#
# Data contents of table top_students (4 records)
#
 
INSERT INTO `top_students` VALUES (13, 3, 2, 1, 3, 90, 'Pre Final', 4) ; 
INSERT INTO `top_students` VALUES (17, 3, 3, 1, 6, 89, 'Prelim', 4) ; 
INSERT INTO `top_students` VALUES (18, 3, 3, 2, 3, 88, 'Prelim', 4) ; 
INSERT INTO `top_students` VALUES (19, 3, 2, 1, 3, 90, 'Prelim', 4) ;
#
# End of data contents of table top_students
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:53 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblteacheradvisory`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblyearlevel`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `top_students`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `usertbl`
# --------------------------------------------------------


#
# Delete any existing table `usertbl`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `usertbl`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `usertbl`
#

CREATE TABLE `usertbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(140) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(140) NOT NULL,
  `mname` varchar(140) NOT NULL,
  `lname` varchar(140) NOT NULL,
  `contact` varchar(140) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ;

#
# Data contents of table usertbl (5 records)
#
 
INSERT INTO `usertbl` VALUES (1, 'admin', 'admin', 'admins', 'admin', 'admin', '1234', 'admin', 0) ; 
INSERT INTO `usertbl` VALUES (3, 'students', 'student', 'student', 'student', 'student', '009889', 'student', 1) ; 
INSERT INTO `usertbl` VALUES (4, 'teacher', 'teacher', 'teacher', 'teacher', 'teacher', '09', 'teacher', 0) ; 
INSERT INTO `usertbl` VALUES (5, 'jerwitness', 'admin123', 'Jerson', 'Mater', 'Fabia', '0927303888', 'admin', 0) ; 
INSERT INTO `usertbl` VALUES (6, 'joanmater', 'student123', 'joan', 'salomoto', 'mater', '123478910', 'student', 0) ;
#
# End of data contents of table usertbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:57 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------


#
# Delete any existing table `announcement`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `announcement`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `announcement`
#

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(170) NOT NULL,
  `description` varchar(270) NOT NULL,
  `image` varchar(170) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ;

#
# Data contents of table announcement (2 records)
#
 
INSERT INTO `announcement` VALUES (1, 'Announcement #1', 'Hell World', 'yourstory-education.jpg') ; 
INSERT INTO `announcement` VALUES (5, 'Announcement #1', 'Display Hello World', '1.jpg') ;
#
# End of data contents of table announcement
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:57 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------


#
# Delete any existing table `backup_restore`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `backup_restore`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `backup_restore`
#

CREATE TABLE `backup_restore` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(200) NOT NULL,
  `backupby` varchar(100) NOT NULL,
  `datebackup` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 ;

#
# Data contents of table backup_restore (17 records)
#
 
INSERT INTO `backup_restore` VALUES (16, 'Database Successfully uploaded.', 'admin admin', 'Sep-11-2017 11:10 pm') ; 
INSERT INTO `backup_restore` VALUES (17, 'Database Successfully restore.', 'admin admin', 'Sep-16-2017 09:13 pm') ; 
INSERT INTO `backup_restore` VALUES (18, 'Database Successfully backup.', 'admins admin', 'Sep-17-2017 01:51 pm') ; 
INSERT INTO `backup_restore` VALUES (19, 'Database Successfully backup.', 'admins admin', 'Sep-18-2017 06:56 pm') ; 
INSERT INTO `backup_restore` VALUES (20, 'Database Successfully restore.', 'admins admin', 'Sep-22-2017 11:56 pm') ; 
INSERT INTO `backup_restore` VALUES (21, 'Database Successfully backup.', 'admins admin', 'Sep-22-2017 11:57 pm') ; 
INSERT INTO `backup_restore` VALUES (22, 'Database Successfully restore.', 'admins admin', 'Sep-24-2017 09:40 am') ; 
INSERT INTO `backup_restore` VALUES (23, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:46 am') ; 
INSERT INTO `backup_restore` VALUES (24, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:46 am') ; 
INSERT INTO `backup_restore` VALUES (25, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:48 am') ; 
INSERT INTO `backup_restore` VALUES (26, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:48 am') ; 
INSERT INTO `backup_restore` VALUES (27, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:50 am') ; 
INSERT INTO `backup_restore` VALUES (28, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:50 am') ; 
INSERT INTO `backup_restore` VALUES (29, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:51 am') ; 
INSERT INTO `backup_restore` VALUES (30, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:52 am') ; 
INSERT INTO `backup_restore` VALUES (31, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:52 am') ; 
INSERT INTO `backup_restore` VALUES (32, 'Database Successfully backup.', 'admins admin', 'Sep-24-2017 09:53 am') ;
#
# End of data contents of table backup_restore
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:57 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------


#
# Delete any existing table `tblclass`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblclass`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblclass`
#

CREATE TABLE `tblclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classname` varchar(20) NOT NULL,
  `schoolyearid` int(11) NOT NULL,
  `yearlevelid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblclass (1 records)
#
 
INSERT INTO `tblclass` VALUES (3, 'BT704P', 24, 4) ;
#
# End of data contents of table tblclass
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:57 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------


#
# Delete any existing table `tblschoolyear`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblschoolyear`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblschoolyear`
#

CREATE TABLE `tblschoolyear` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolyear` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `schoolyear` (`schoolyear`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblschoolyear (4 records)
#
 
INSERT INTO `tblschoolyear` VALUES (4, '2017-2018', 1) ; 
INSERT INTO `tblschoolyear` VALUES (24, '2016-2017', 0) ; 
INSERT INTO `tblschoolyear` VALUES (25, '2018-2019', 1) ; 
INSERT INTO `tblschoolyear` VALUES (27, '2019-2020', 1) ;
#
# End of data contents of table tblschoolyear
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:57 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------


#
# Delete any existing table `tblstudentclass`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblstudentclass`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblstudentclass`
#

CREATE TABLE `tblstudentclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `classid` (`classid`),
  KEY `studentid` (`studentid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblstudentclass (3 records)
#
 
INSERT INTO `tblstudentclass` VALUES (10, 3, 3, 2) ; 
INSERT INTO `tblstudentclass` VALUES (11, 3, 3, 3) ; 
INSERT INTO `tblstudentclass` VALUES (12, 3, 6, 3) ;
#
# End of data contents of table tblstudentclass
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:57 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------


#
# Delete any existing table `tblstudentgrade`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblstudentgrade`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblstudentgrade`
#

CREATE TABLE `tblstudentgrade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `remarks` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblstudentgrade (3 records)
#
 
INSERT INTO `tblstudentgrade` VALUES (9, 3, 24, 2, 3, 4, 90, 90, 70, 90, 85, 'Passed') ; 
INSERT INTO `tblstudentgrade` VALUES (10, 3, 24, 3, 3, 4, 90, 90, 90, 80, 88, 'Passed') ; 
INSERT INTO `tblstudentgrade` VALUES (12, 6, 24, 3, 3, 4, 90, 98, 98, 98, 96, 'Passed') ;
#
# End of data contents of table tblstudentgrade
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:57 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsubjects`
# --------------------------------------------------------


#
# Delete any existing table `tblsubjects`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblsubjects`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblsubjects`
#

CREATE TABLE `tblsubjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjectname` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `yearlevelid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblsubjects (3 records)
#
 
INSERT INTO `tblsubjects` VALUES (2, 'IT122', 'Articial Intelligence', 4) ; 
INSERT INTO `tblsubjects` VALUES (3, 'WORDLIT', 'Word Literature', 8) ; 
INSERT INTO `tblsubjects` VALUES (4, '123', 'dasdadas', 4) ;
#
# End of data contents of table tblsubjects
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:57 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblteacheradvisory`
# --------------------------------------------------------


#
# Delete any existing table `tblteacheradvisory`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblteacheradvisory`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblteacheradvisory`
#

CREATE TABLE `tblteacheradvisory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacherid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teacherid` (`teacherid`,`classid`),
  KEY `classid` (`classid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblteacheradvisory (3 records)
#
 
INSERT INTO `tblteacheradvisory` VALUES (7, 7, 3, 2) ; 
INSERT INTO `tblteacheradvisory` VALUES (8, 4, 3, 3) ; 
INSERT INTO `tblteacheradvisory` VALUES (9, 4, 3, 2) ;
#
# End of data contents of table tblteacheradvisory
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:57 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblteacheradvisory`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblyearlevel`
# --------------------------------------------------------


#
# Delete any existing table `tblyearlevel`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tblyearlevel`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `tblyearlevel`
#

CREATE TABLE `tblyearlevel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yearlevel` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tblyearlevel (4 records)
#
 
INSERT INTO `tblyearlevel` VALUES (4, '1st Year', 'First Year') ; 
INSERT INTO `tblyearlevel` VALUES (5, '2nd Year', 'Second Year') ; 
INSERT INTO `tblyearlevel` VALUES (6, '3rd Year', 'Third Year') ; 
INSERT INTO `tblyearlevel` VALUES (8, '4rth Year', 'Fourth Year') ;
#
# End of data contents of table tblyearlevel
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:57 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblteacheradvisory`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblyearlevel`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `top_students`
# --------------------------------------------------------


#
# Delete any existing table `top_students`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `top_students`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `top_students`
#

CREATE TABLE `top_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `topnum` int(11) NOT NULL,
  `studid` int(11) NOT NULL,
  `grade` int(100) NOT NULL,
  `period` varchar(100) NOT NULL,
  `adviserid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 ;

#
# Data contents of table top_students (4 records)
#
 
INSERT INTO `top_students` VALUES (13, 3, 2, 1, 3, 90, 'Pre Final', 4) ; 
INSERT INTO `top_students` VALUES (17, 3, 3, 1, 6, 89, 'Prelim', 4) ; 
INSERT INTO `top_students` VALUES (18, 3, 3, 2, 3, 88, 'Prelim', 4) ; 
INSERT INTO `top_students` VALUES (19, 3, 2, 1, 3, 90, 'Prelim', 4) ;
#
# End of data contents of table top_students
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 24. September 2017 09:57 PHT
# Hostname: localhost
# Database: `grading`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `announcement`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `backup_restore`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschoolyear`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentclass`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudentgrade`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblteacheradvisory`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblyearlevel`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `top_students`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `usertbl`
# --------------------------------------------------------


#
# Delete any existing table `usertbl`
#

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `usertbl`;
SET FOREIGN_KEY_CHECKS=1;


#
# Table structure of table `usertbl`
#

CREATE TABLE `usertbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(140) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(140) NOT NULL,
  `mname` varchar(140) NOT NULL,
  `lname` varchar(140) NOT NULL,
  `contact` varchar(140) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ;

#
# Data contents of table usertbl (5 records)
#
 
INSERT INTO `usertbl` VALUES (1, 'admin', 'admin', 'admins', 'admin', 'admin', '1234', 'admin', 0) ; 
INSERT INTO `usertbl` VALUES (3, 'students', 'student', 'student', 'student', 'student', '009889', 'student', 1) ; 
INSERT INTO `usertbl` VALUES (4, 'teacher', 'teacher', 'teacher', 'teacher', 'teacher', '09', 'teacher', 0) ; 
INSERT INTO `usertbl` VALUES (5, 'jerwitness', 'admin123', 'Jerson', 'Mater', 'Fabia', '0927303888', 'admin', 0) ; 
INSERT INTO `usertbl` VALUES (6, 'joanmater', 'student123', 'joan', 'salomoto', 'mater', '123478910', 'student', 0) ;
#
# End of data contents of table usertbl
# --------------------------------------------------------


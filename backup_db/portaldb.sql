-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: portaldb
-- ------------------------------------------------------
-- Server version	5.6.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `access_rights`
--

DROP TABLE IF EXISTS `access_rights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `access_rights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `privilege` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access_rights`
--

LOCK TABLES `access_rights` WRITE;
/*!40000 ALTER TABLE `access_rights` DISABLE KEYS */;
INSERT INTO `access_rights` VALUES (1,19,1),(2,19,2),(3,19,3),(4,19,4),(5,19,18);
/*!40000 ALTER TABLE `access_rights` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activity_log`
--

DROP TABLE IF EXISTS `activity_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(45) NOT NULL,
  `madeby` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `datemade` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_log`
--

LOCK TABLES `activity_log` WRITE;
/*!40000 ALTER TABLE `activity_log` DISABLE KEYS */;
INSERT INTO `activity_log` VALUES (1,'1','admins admin','Login','Nov 22, 2017 - 03:25 pm'),(2,'1','admins admin','Logout','Nov 22, 2017 - 11:34 pm'),(3,'3','student student','Login','Nov 22, 2017 - 03:34 pm'),(4,'3','student student','Logout','Nov 22, 2017 - 11:37 pm'),(5,'1','admins admin','Login','Nov 22, 2017 - 03:37 pm'),(6,'1','admins admin','Logout','Nov 22, 2017 - 11:42 pm'),(7,'1','admins admin','Login','Nov 24, 2017 - 12:19 pm'),(8,'1','admins admin','Login','Nov 26, 2017 - 12:27 pm'),(9,'1','admins admin','Logout','Nov 26, 2017 - 10:41 pm'),(10,'7','parent parent','Login','Nov 26, 2017 - 02:41 pm'),(11,'7','parent parent','Logout','Nov 26, 2017 - 10:43 pm'),(12,'3','student student','Login','Nov 26, 2017 - 02:44 pm'),(13,'3','student student','Logout','Nov 26, 2017 - 10:44 pm'),(14,'1','admins admin','Login','Dec 01, 2017 - 12:51 pm'),(15,'1','admins admin','Login','Dec 02, 2017 - 09:40 am'),(16,'1','admins admin','Login','Dec 03, 2017 - 01:25 am'),(17,'1','admins admin','Logout','Dec 03, 2017 - 11:14 am'),(18,'1','admins admin','Login','Dec 03, 2017 - 04:26 am');
/*!40000 ALTER TABLE `activity_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `announcement`
--

DROP TABLE IF EXISTS `announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(170) NOT NULL,
  `description` varchar(270) NOT NULL,
  `image` varchar(170) NOT NULL,
  `dateannounce` varchar(140) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcement`
--

LOCK TABLES `announcement` WRITE;
/*!40000 ALTER TABLE `announcement` DISABLE KEYS */;
INSERT INTO `announcement` VALUES (1,'Announcement #1','Hell World','yourstory-education.jpg',''),(5,'Announcement #1','Display Hello World','1.jpg','');
/*!40000 ALTER TABLE `announcement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `backup_restore`
--

DROP TABLE IF EXISTS `backup_restore`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `backup_restore` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(200) NOT NULL,
  `backupby` varchar(100) NOT NULL,
  `datebackup` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `backup_restore`
--

LOCK TABLES `backup_restore` WRITE;
/*!40000 ALTER TABLE `backup_restore` DISABLE KEYS */;
INSERT INTO `backup_restore` VALUES (16,'Database Successfully uploaded.','admin admin','Sep-11-2017 11:10 pm'),(17,'Database Successfully restore.','admin admin','Sep-16-2017 09:13 pm'),(18,'Database Successfully backup.','admins admin','Sep-17-2017 01:51 pm'),(19,'Database Successfully backup.','admins admin','Sep-18-2017 06:56 pm');
/*!40000 ALTER TABLE `backup_restore` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clearancetbl`
--

DROP TABLE IF EXISTS `clearancetbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clearancetbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clearancename` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clearancetbl`
--

LOCK TABLES `clearancetbl` WRITE;
/*!40000 ALTER TABLE `clearancetbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `clearancetbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conversation_reply`
--

DROP TABLE IF EXISTS `conversation_reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conversation_reply` (
  `CR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `reply` text NOT NULL,
  `user_id_fk` varchar(100) NOT NULL,
  `c_id_fk` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`CR_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conversation_reply`
--

LOCK TABLES `conversation_reply` WRITE;
/*!40000 ALTER TABLE `conversation_reply` DISABLE KEYS */;
INSERT INTO `conversation_reply` VALUES (1,'charot','F0217-0001',20,'2017-10-26 09:00:55'),(2,'hey','P0117-001',21,'2017-10-26 09:02:20'),(3,'why?','F0217-0001',21,'2017-10-26 09:02:30'),(4,'k','P0117-001',21,'2017-10-26 09:03:12'),(5,'n','F0217-0001',21,'2017-10-26 09:03:18'),(6,'po\ngi ako','P0117-001',21,'2017-10-26 09:03:32'),(7,'hahaa','4',22,'2017-11-22 15:12:33'),(8,'sdsa','4',0,'2017-11-22 15:13:21');
/*!40000 ALTER TABLE `conversation_reply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conversation_tbl`
--

DROP TABLE IF EXISTS `conversation_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conversation_tbl` (
  `C_ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_one` varchar(100) NOT NULL,
  `user_two` varchar(100) NOT NULL,
  `user1_mes_read` int(11) NOT NULL,
  `user1_mes_status` int(11) NOT NULL,
  `user2_mes_read` int(11) NOT NULL,
  `user2_mes_status` int(11) NOT NULL,
  `date_time` varchar(100) NOT NULL,
  PRIMARY KEY (`C_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conversation_tbl`
--

LOCK TABLES `conversation_tbl` WRITE;
/*!40000 ALTER TABLE `conversation_tbl` DISABLE KEYS */;
INSERT INTO `conversation_tbl` VALUES (19,'F1217-0085','P0117-001',0,0,0,0,'Oct 01, 2017 - 10:42 pm'),(20,'F0217-0001','F0023-0023',0,0,1,0,'Oct 26, 2017 - 05:00 pm'),(21,'P0117-001','F0217-0001',0,0,0,0,'Oct 26, 2017 - 05:03 pm'),(22,'4','',0,0,0,1,'Nov 22, 2017 - 11:12 pm');
/*!40000 ALTER TABLE `conversation_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curriculumtbl`
--

DROP TABLE IF EXISTS `curriculumtbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curriculumtbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curname` varchar(200) NOT NULL,
  `gradelevel` varchar(100) NOT NULL,
  `datecreated` varchar(170) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curriculumtbl`
--

LOCK TABLES `curriculumtbl` WRITE;
/*!40000 ALTER TABLE `curriculumtbl` DISABLE KEYS */;
INSERT INTO `curriculumtbl` VALUES (1,'Curr1','Elementary','Nov 22, 2017'),(4,'Curr2','Junior High School','Dec 02, 2017');
/*!40000 ALTER TABLE `curriculumtbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_tbl`
--

DROP TABLE IF EXISTS `event_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `descript` text NOT NULL,
  `image` varchar(170) NOT NULL,
  `dateupload` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_tbl`
--

LOCK TABLES `event_tbl` WRITE;
/*!40000 ALTER TABLE `event_tbl` DISABLE KEYS */;
INSERT INTO `event_tbl` VALUES (1,'ITS Defence','Ang pagtutuos ng mga malulupit na panel at programmer','yourstory-education.jpg','Nov 05, 2017 - 08:19 PM'),(3,'sa','sas','1.jpg','Nov 05, 2017 - 08:09 PM'),(4,'sample','sample','computers(2).jpg','Nov 05, 2017 - 08:19 PM');
/*!40000 ALTER TABLE `event_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parentstudtbl`
--

DROP TABLE IF EXISTS `parentstudtbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parentstudtbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` varchar(45) NOT NULL,
  `studid` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parentstudtbl`
--

LOCK TABLES `parentstudtbl` WRITE;
/*!40000 ALTER TABLE `parentstudtbl` DISABLE KEYS */;
INSERT INTO `parentstudtbl` VALUES (1,'7','3'),(2,'9','6');
/*!40000 ALTER TABLE `parentstudtbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posttbl`
--

DROP TABLE IF EXISTS `posttbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posttbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` longtext NOT NULL,
  `postby` int(170) NOT NULL,
  `dateupload` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posttbl`
--

LOCK TABLES `posttbl` WRITE;
/*!40000 ALTER TABLE `posttbl` DISABLE KEYS */;
INSERT INTO `posttbl` VALUES (4,'sfdsfds',4,'Nov 22, 2017 - 11:22 pm'),(5,'xdfgdf',4,'Nov 22, 2017 - 11:22 pm');
/*!40000 ALTER TABLE `posttbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slide_tbl`
--

DROP TABLE IF EXISTS `slide_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slide_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(270) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slide_tbl`
--

LOCK TABLES `slide_tbl` WRITE;
/*!40000 ALTER TABLE `slide_tbl` DISABLE KEYS */;
INSERT INTO `slide_tbl` VALUES (1,'23140234_1640995269295988_837794233_n.jpg'),(2,'23114689_1640995292629319_642560143_n.jpg'),(5,'23146087_1640995249295990_1727837053_n.jpg'),(6,'23146220_1640995339295981_1055350325_n.jpg'),(7,'23140218_1640995319295983_2020593181_n.jpg'),(8,'23114886_1640995262629322_1872925118_n.jpg'),(10,'23140201_1640995312629317_770363977_n.jpg'),(11,'23140503_1640995305962651_1142092054_n.jpg');
/*!40000 ALTER TABLE `slide_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studclearance`
--

DROP TABLE IF EXISTS `studclearance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studclearance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studid` int(11) DEFAULT NULL,
  `clearanceid` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studclearance`
--

LOCK TABLES `studclearance` WRITE;
/*!40000 ALTER TABLE `studclearance` DISABLE KEYS */;
/*!40000 ALTER TABLE `studclearance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblclass`
--

DROP TABLE IF EXISTS `tblclass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classname` varchar(20) NOT NULL,
  `yearlevelid` int(11) NOT NULL,
  `cur_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblclass`
--

LOCK TABLES `tblclass` WRITE;
/*!40000 ALTER TABLE `tblclass` DISABLE KEYS */;
INSERT INTO `tblclass` VALUES (3,'APPLE',9,1),(4,'BANANA',9,1);
/*!40000 ALTER TABLE `tblclass` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblschoolyear`
--

DROP TABLE IF EXISTS `tblschoolyear`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblschoolyear` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolyear` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `schoolyear` (`schoolyear`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblschoolyear`
--

LOCK TABLES `tblschoolyear` WRITE;
/*!40000 ALTER TABLE `tblschoolyear` DISABLE KEYS */;
INSERT INTO `tblschoolyear` VALUES (4,'2017-2019',0),(24,'2016-2017',1),(25,'2018-2019',1),(27,'2019-2020',1);
/*!40000 ALTER TABLE `tblschoolyear` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstudentclass`
--

DROP TABLE IF EXISTS `tblstudentclass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblstudentclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) DEFAULT NULL,
  `studentid` int(11) DEFAULT NULL,
  `clearance_status` tinyint(4) DEFAULT NULL,
  `gradelevel` int(11) DEFAULT NULL,
  `cur_id` int(11) DEFAULT NULL,
  `schoolyearid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `classid` (`classid`),
  KEY `studentid` (`studentid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstudentclass`
--

LOCK TABLES `tblstudentclass` WRITE;
/*!40000 ALTER TABLE `tblstudentclass` DISABLE KEYS */;
INSERT INTO `tblstudentclass` VALUES (14,3,3,0,9,1,4),(15,4,6,0,9,1,4);
/*!40000 ALTER TABLE `tblstudentclass` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstudentgrade`
--

DROP TABLE IF EXISTS `tblstudentgrade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstudentgrade`
--

LOCK TABLES `tblstudentgrade` WRITE;
/*!40000 ALTER TABLE `tblstudentgrade` DISABLE KEYS */;
INSERT INTO `tblstudentgrade` VALUES (9,3,24,2,3,4,90,90,70,70,80,'Passed'),(10,3,24,3,3,4,90,90,90,80,88,'Passed'),(12,6,24,3,3,4,90,98,98,98,96,'Passed');
/*!40000 ALTER TABLE `tblstudentgrade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsubjects`
--

DROP TABLE IF EXISTS `tblsubjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblsubjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjectname` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `yearlevelid` int(11) NOT NULL,
  `cur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsubjects`
--

LOCK TABLES `tblsubjects` WRITE;
/*!40000 ALTER TABLE `tblsubjects` DISABLE KEYS */;
INSERT INTO `tblsubjects` VALUES (2,'IT122','Articial Intelligence',4,1),(3,'WORDLIT','Word Literature',8,1);
/*!40000 ALTER TABLE `tblsubjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblteacheradvisory`
--

DROP TABLE IF EXISTS `tblteacheradvisory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblteacheradvisory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacherid` int(11) DEFAULT NULL,
  `classid` int(11) DEFAULT NULL,
  `gradelvl` int(11) DEFAULT NULL,
  `curiculumid` int(11) DEFAULT NULL,
  `schoolyearid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teacherid` (`teacherid`,`classid`),
  KEY `classid` (`classid`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblteacheradvisory`
--

LOCK TABLES `tblteacheradvisory` WRITE;
/*!40000 ALTER TABLE `tblteacheradvisory` DISABLE KEYS */;
INSERT INTO `tblteacheradvisory` VALUES (7,7,3,9,1,4),(9,4,3,9,1,4),(24,4,4,9,1,4);
/*!40000 ALTER TABLE `tblteacheradvisory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblyearlevel`
--

DROP TABLE IF EXISTS `tblyearlevel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblyearlevel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yearlevel` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblyearlevel`
--

LOCK TABLES `tblyearlevel` WRITE;
/*!40000 ALTER TABLE `tblyearlevel` DISABLE KEYS */;
INSERT INTO `tblyearlevel` VALUES (4,'Grade 7','Grade VII'),(5,'Grade 2','Grade II'),(6,'Grade 3','Grade III'),(8,'Grade 4','Grade IV'),(9,'Grade 1','Grade I');
/*!40000 ALTER TABLE `tblyearlevel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usertbl`
--

DROP TABLE IF EXISTS `usertbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `profile_pic` varchar(170) NOT NULL,
  `parentstud` int(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usertbl`
--

LOCK TABLES `usertbl` WRITE;
/*!40000 ALTER TABLE `usertbl` DISABLE KEYS */;
INSERT INTO `usertbl` VALUES (1,'admin','admin','admins','admin','admin','1234','admin',0,'images/man-29.png',0),(3,'student','student','student','student','student','009889','student',0,'images/man-28.png',0),(4,'teacher','teacher','teacher','teacher','teacher','09','teacher',0,'images/businessman.png',0),(5,'Jude','admin123','Jude','Mater','Fabia','0927303888','admin',0,'',0),(6,'Roxas','student123','Mar','salomoto','Rosas','123478910','student',0,'',0),(7,'parent','parent123','parent',' ','parent','09080989','parent',0,'images/man-28.png',0),(8,'registrar','registrar123','Registrar','Registrar','Registrar','09874321','registrar',0,'images/businessman.png',0),(9,'sa','parent123','sa',' ','sa','sa','parent',0,'images/man-28.png',0),(14,'Johasa1','student123','John','Doe','basa','','student',0,'images/man-28.png',0),(15,'Karyon2','student123','Karlo','Juanitas','Bonayon','','student',0,'images/man-28.png',0),(19,'a','admin123','a','','a','','admin',0,'images/businessman.png',0);
/*!40000 ALTER TABLE `usertbl` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-03 12:35:13

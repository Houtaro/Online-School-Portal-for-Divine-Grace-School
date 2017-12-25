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
-- Table structure for table `aboutus`
--

DROP TABLE IF EXISTS `aboutus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aboutus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mission` longtext,
  `vision` longtext,
  `goal` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aboutus`
--

LOCK TABLES `aboutus` WRITE;
/*!40000 ALTER TABLE `aboutus` DISABLE KEYS */;
INSERT INTO `aboutus` VALUES (1,'Our mission is to provide a strong foundation for the students to be prepared on facing the increasing challenges of the brought about by the information age and global competitiveness.','DGS envisions a community of academically competent and value-laden individuals living a life commited to serve the Filipino society and contribute to the world community.','To be partners with parents in nurturing and developing the students to become productive individuals by building strong foundation and appropriate values formation.');
/*!40000 ALTER TABLE `aboutus` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access_rights`
--

LOCK TABLES `access_rights` WRITE;
/*!40000 ALTER TABLE `access_rights` DISABLE KEYS */;
INSERT INTO `access_rights` VALUES (1,1,1),(2,1,2),(3,1,3),(4,1,4),(6,1,5),(7,1,6),(8,1,7),(9,1,8),(10,1,9),(11,1,10),(12,1,11),(13,1,12),(14,1,13),(15,1,14),(16,1,15),(17,1,16),(18,1,17),(19,1,18),(20,1,19);
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
) ENGINE=InnoDB AUTO_INCREMENT=245 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_log`
--

LOCK TABLES `activity_log` WRITE;
/*!40000 ALTER TABLE `activity_log` DISABLE KEYS */;
INSERT INTO `activity_log` VALUES (1,'1','admins admin','Login','Nov 22, 2017 - 03:25 pm'),(2,'1','admins admin','Logout','Nov 22, 2017 - 11:34 pm'),(3,'3','student student','Login','Nov 22, 2017 - 03:34 pm'),(4,'3','student student','Logout','Nov 22, 2017 - 11:37 pm'),(5,'1','admins admin','Login','Nov 22, 2017 - 03:37 pm'),(6,'1','admins admin','Logout','Nov 22, 2017 - 11:42 pm'),(7,'1','admins admin','Login','Nov 24, 2017 - 12:19 pm'),(8,'1','admins admin','Login','Nov 26, 2017 - 12:27 pm'),(9,'1','admins admin','Logout','Nov 26, 2017 - 10:41 pm'),(10,'7','parent parent','Login','Nov 26, 2017 - 02:41 pm'),(11,'7','parent parent','Logout','Nov 26, 2017 - 10:43 pm'),(12,'3','student student','Login','Nov 26, 2017 - 02:44 pm'),(13,'3','student student','Logout','Nov 26, 2017 - 10:44 pm'),(14,'1','admins admin','Login','Dec 01, 2017 - 12:51 pm'),(15,'1','admins admin','Login','Dec 02, 2017 - 09:40 am'),(16,'1','admins admin','Login','Dec 03, 2017 - 01:25 am'),(17,'1','admins admin','Logout','Dec 03, 2017 - 11:14 am'),(18,'1','admins admin','Login','Dec 03, 2017 - 04:26 am'),(19,'1','admins admin','Logout','Dec 03, 2017 - 09:26 pm'),(20,'1','admins admin','Login','Dec 09, 2017 - 06:21 am'),(21,'1','admins admin','Login','Dec 09, 2017 - 10:03 am'),(22,'1','admins admin','Logout','Dec 09, 2017 - 10:59 pm'),(23,'1','admins admin','Login','Dec 11, 2017 - 02:11 pm'),(24,'1','admins admin','Login','Dec 12, 2017 - 04:34 am'),(25,'1','admins admin','Logout','Dec 12, 2017 - 12:41 pm'),(26,'1','admins admin','Login','Dec 12, 2017 - 08:20 am'),(27,'1','admins admin','Logout','Dec 12, 2017 - 04:27 pm'),(28,'1','admins admin','Login','Dec 12, 2017 - 02:51 pm'),(29,'1','admins admin','Login','Dec 13, 2017 - 06:20 am'),(30,'1','admins admin','Login','Dec 14, 2017 - 12:55 am'),(31,'1','admins admin','Login','Dec 14, 2017 - 01:56 pm'),(32,'1','admins admin','Logout','Dec 14, 2017 - 10:08 pm'),(33,'3','student student','Login','Dec 14, 2017 - 02:08 pm'),(34,'3','student student','Logout','Dec 14, 2017 - 10:08 pm'),(35,'1','admins admin','Login','Dec 14, 2017 - 02:08 pm'),(36,'1','admins admin','Logout','Dec 14, 2017 - 10:25 pm'),(37,'1','admins admin','Login','Dec 14, 2017 - 02:28 pm'),(38,'1','admins admin','Logout','Dec 14, 2017 - 10:28 pm'),(39,'7','parent ','Login','Dec 14, 2017 - 02:29 pm'),(40,'7','parent ','Logout','Dec 14, 2017 - 10:29 pm'),(41,'1','admins admin','Login','Dec 14, 2017 - 02:29 pm'),(42,'1','admins admin','Logout','Dec 14, 2017 - 10:33 pm'),(43,'7','parent ','Login','Dec 14, 2017 - 02:33 pm'),(44,'7','parent ','Logout','Dec 14, 2017 - 10:41 pm'),(45,'4','teacher teacher','Login','Dec 14, 2017 - 02:41 pm'),(46,'4','teacher teacher','Logout','Dec 14, 2017 - 10:51 pm'),(47,'8','Registrar Registrar','Login','Dec 14, 2017 - 02:52 pm'),(48,'8','Registrar Registrar','Logout','Dec 14, 2017 - 10:55 pm'),(49,'3','student student','Login','Dec 14, 2017 - 02:55 pm'),(50,'3','student student','Logout','Dec 14, 2017 - 11:15 pm'),(51,'4','teacher teacher','Login','Dec 15, 2017 - 01:09 am'),(52,'4','teacher teacher','Logout','Dec 15, 2017 - 09:11 am'),(53,'1','admins admin','Login','Dec 15, 2017 - 01:11 am'),(54,'1','admins admin','Logout','Dec 15, 2017 - 09:17 am'),(55,'1','admins admin','Login','Dec 15, 2017 - 01:22 am'),(56,'1','admins admin','Logout','Dec 15, 2017 - 11:03 am'),(57,'4','teacher teacher','Login','Dec 15, 2017 - 03:03 am'),(58,'4','teacher teacher','Logout','Dec 15, 2017 - 11:05 am'),(59,'3','student student','Login','Dec 15, 2017 - 03:05 am'),(60,'3','student student','Logout','Dec 15, 2017 - 11:11 am'),(61,'7','parent ','Login','Dec 15, 2017 - 03:21 am'),(62,'7','parent ','Logout','Dec 15, 2017 - 11:22 am'),(63,'1','admins admin','Login','Dec 15, 2017 - 03:22 am'),(64,'1','admins admin','Logout','Dec 15, 2017 - 11:26 am'),(65,'4','teacher teacher','Login','Dec 15, 2017 - 05:10 am'),(66,'4','teacher teacher','Logout','Dec 15, 2017 - 02:32 pm'),(67,'7','parent ','Login','Dec 15, 2017 - 06:32 am'),(68,'7','parent ','Logout','Dec 15, 2017 - 02:33 pm'),(69,'1','admins admin','Login','Dec 16, 2017 - 01:53 am'),(70,'1','admins admin','Logout','Dec 21, 2017 - 08:52 am'),(71,'1','admins admin','Login','Dec 21, 2017 - 07:51 am'),(72,'1','admins admin','Logout','Dec 21, 2017 - 04:04 pm'),(73,'3','student student','Login','Dec 21, 2017 - 08:05 am'),(74,'3','student student','Logout','Dec 21, 2017 - 04:08 pm'),(75,'1','admins admin','Login','Dec 21, 2017 - 08:08 am'),(76,'1','admins admin','Logout','Dec 21, 2017 - 04:09 pm'),(77,'7','parent ','Login','Dec 21, 2017 - 08:09 am'),(78,'7','parent ','Logout','Dec 21, 2017 - 04:31 pm'),(79,'3','student student','Login','Dec 21, 2017 - 08:31 am'),(80,'3','student student','Logout','Dec 21, 2017 - 04:32 pm'),(81,'7','parent ','Login','Dec 21, 2017 - 08:33 am'),(82,'7','parent ','Logout','Dec 21, 2017 - 04:34 pm'),(83,'4','teacher teacher','Login','Dec 21, 2017 - 08:35 am'),(84,'4','teacher teacher','Logout','Dec 21, 2017 - 04:46 pm'),(85,'7','parent ','Login','Dec 21, 2017 - 08:48 am'),(86,'7','parent ','Logout','Dec 21, 2017 - 05:23 pm'),(87,'1','admins admin','Login','Dec 21, 2017 - 09:23 am'),(88,'1','admins admin','Logout','Dec 21, 2017 - 05:24 pm'),(89,'22','sample sample','Login','Dec 21, 2017 - 09:25 am'),(90,'22','sample sample','Logout','Dec 21, 2017 - 05:34 pm'),(91,'7','parent ','Login','Dec 21, 2017 - 09:35 am'),(92,'7','parent ','Logout','Dec 21, 2017 - 05:46 pm'),(93,'8','Registrar Registrar','Login','Dec 21, 2017 - 09:46 am'),(94,'8','Registrar Registrar','Logout','Dec 21, 2017 - 05:47 pm'),(95,'22','sample sample','Login','Dec 21, 2017 - 09:47 am'),(96,'22','sample sample','Logout','Dec 21, 2017 - 05:50 pm'),(97,'7','parent ','Login','Dec 21, 2017 - 09:50 am'),(98,'7','parent ','Logout','Dec 21, 2017 - 05:50 pm'),(99,'1','admins admin','Login','Dec 21, 2017 - 09:50 am'),(100,'1','admins admin','Logout','Dec 21, 2017 - 05:51 pm'),(101,'6','Mar Rosas','Login','Dec 21, 2017 - 09:51 am'),(102,'6','Mar Rosas','Logout','Dec 21, 2017 - 05:52 pm'),(103,'7','parent ','Login','Dec 21, 2017 - 09:53 am'),(104,'7','parent ','Logout','Dec 21, 2017 - 05:54 pm'),(105,'1','admins admin','Login','Dec 21, 2017 - 09:54 am'),(106,'1','admins admin','Logout','Dec 21, 2017 - 11:16 pm'),(107,'5','Jude Fabia','Login','Dec 21, 2017 - 03:16 pm'),(108,'5','Jude Fabia','Logout','Dec 21, 2017 - 11:17 pm'),(109,'1','admins admin','Login','Dec 22, 2017 - 01:47 am'),(110,'1','admins admin','Logout','Dec 22, 2017 - 09:48 am'),(111,'3','student student','Login','Dec 22, 2017 - 01:48 am'),(112,'3','student student','Logout','Dec 22, 2017 - 10:02 am'),(113,'1','admins admin','Login','Dec 22, 2017 - 02:02 am'),(114,'1','admins admin','Logout','Dec 22, 2017 - 10:02 am'),(115,'6','Mar Rosas','Login','Dec 22, 2017 - 02:02 am'),(116,'6','Mar Rosas','Logout','Dec 22, 2017 - 10:05 am'),(117,'22','sample sample','Login','Dec 22, 2017 - 02:06 am'),(118,'22','sample sample','Logout','Dec 22, 2017 - 10:06 am'),(119,'7','parent ','Login','Dec 22, 2017 - 02:07 am'),(120,'7','parent ','Logout','Dec 22, 2017 - 10:09 am'),(121,'4','teacher teacher','Login','Dec 22, 2017 - 02:10 am'),(122,'3','student student','Login','Dec 22, 2017 - 02:25 am'),(123,'4','teacher teacher','Logout','Dec 22, 2017 - 10:39 am'),(124,'1','admins admin','Login','Dec 22, 2017 - 02:39 am'),(125,'1','admins admin','Login','Dec 22, 2017 - 03:28 am'),(126,'1','admins admin','Login','Dec 22, 2017 - 06:36 am'),(127,'1','admins admin','Logout','Dec 22, 2017 - 04:01 pm'),(128,'1','admins admin','Login','Dec 22, 2017 - 08:01 am'),(129,'1','admins admin','Logout','Dec 22, 2017 - 04:16 pm'),(130,'3','student student','Login','Dec 22, 2017 - 08:16 am'),(131,'3','student student','Logout','Dec 22, 2017 - 04:17 pm'),(132,'4','teacher teacher','Login','Dec 22, 2017 - 08:17 am'),(133,'3','student student','Login','Dec 22, 2017 - 08:32 am'),(134,'3','student student','Logout','Dec 22, 2017 - 04:33 pm'),(135,'4','teacher teacher','Login','Dec 22, 2017 - 03:40 pm'),(136,'4','teacher teacher','Logout','Dec 22, 2017 - 11:40 pm'),(137,'4','teacher teacher','Logout','Dec 23, 2017 - 12:28 am'),(138,'1','admins admin','Login','Dec 22, 2017 - 04:28 pm'),(139,'1','admins admin','Logout','Dec 23, 2017 - 12:29 am'),(140,'1','admins admin','Login','Dec 23, 2017 - 03:26 am'),(141,'1','admins admin','Logout','Dec 23, 2017 - 11:28 am'),(142,'1','admins admin','Login','Dec 23, 2017 - 03:42 am'),(143,'1','admins admin','Logout','Dec 23, 2017 - 06:12 pm'),(144,'4','teacher teacher','Login','Dec 23, 2017 - 10:12 am'),(145,'4','teacher teacher','Logout','Dec 23, 2017 - 06:14 pm'),(146,'1','admins admin','Login','Dec 23, 2017 - 10:14 am'),(147,'1','admins admin','Logout','Dec 23, 2017 - 07:17 pm'),(148,'7','parent ','Login','Dec 23, 2017 - 11:21 am'),(149,'7','parent ','Logout','Dec 23, 2017 - 07:21 pm'),(150,'22','sample sample','Login','Dec 23, 2017 - 11:21 am'),(151,'22','sample sample','Logout','Dec 23, 2017 - 07:22 pm'),(152,'1','admins admin','Login','Dec 23, 2017 - 11:24 am'),(153,'1','admins admin','Logout','Dec 23, 2017 - 07:26 pm'),(154,'23','parent parent','Login','Dec 23, 2017 - 11:26 am'),(155,'23','parent parent','Logout','Dec 23, 2017 - 07:27 pm'),(156,'1','admins admin','Login','Dec 23, 2017 - 11:27 am'),(157,'1','admins admin','Logout','Dec 23, 2017 - 07:52 pm'),(158,'1','admins admin','Login','Dec 23, 2017 - 11:53 am'),(159,'1','admins admin','Logout','Dec 23, 2017 - 08:24 pm'),(160,'1','admins admin','Login','Dec 23, 2017 - 12:25 pm'),(161,'1','admins admin','Logout','Dec 23, 2017 - 08:25 pm'),(162,'23','parent parent','Login','Dec 23, 2017 - 12:26 pm'),(163,'23','parent parent','Logout','Dec 23, 2017 - 10:08 pm'),(164,'4','teacher teacher','Login','Dec 23, 2017 - 02:09 pm'),(165,'4','teacher teacher','Logout','Dec 23, 2017 - 10:10 pm'),(166,'1','admins admin','Login','Dec 23, 2017 - 02:10 pm'),(167,'1','admins admin','Logout','Dec 23, 2017 - 10:22 pm'),(168,'3','student student','Login','Dec 23, 2017 - 02:22 pm'),(169,'3','student student','Logout','Dec 23, 2017 - 10:28 pm'),(170,'1','admins admin','Login','Dec 23, 2017 - 02:28 pm'),(171,'3','student student','Login','Dec 23, 2017 - 02:31 pm'),(172,'1','admins admin','Logout','Dec 23, 2017 - 10:31 pm'),(173,'3','student student','Login','Dec 23, 2017 - 02:31 pm'),(174,'3','student student','Logout','Dec 23, 2017 - 10:31 pm'),(175,'4','teacher teacher','Login','Dec 23, 2017 - 02:31 pm'),(176,'4','teacher teacher','Logout','Dec 23, 2017 - 10:37 pm'),(177,'3','student student','Login','Dec 23, 2017 - 02:38 pm'),(178,'3','student student','Logout','Dec 23, 2017 - 10:44 pm'),(179,'4','teacher teacher','Login','Dec 23, 2017 - 02:44 pm'),(180,'4','teacher teacher','Logout','Dec 23, 2017 - 11:52 pm'),(181,'1','admins admin','Login','Dec 24, 2017 - 04:00 am'),(182,'1','admins admin','Logout','Dec 24, 2017 - 12:03 pm'),(183,'3','student student','Login','Dec 24, 2017 - 04:03 am'),(184,'3','student student','Logout','Dec 24, 2017 - 12:04 pm'),(185,'23','parent parent','Login','Dec 24, 2017 - 04:04 am'),(186,'23','parent parent','Logout','Dec 24, 2017 - 12:06 pm'),(187,'3','student student','Login','Dec 24, 2017 - 04:06 am'),(188,'3','student student','Logout','Dec 24, 2017 - 12:14 pm'),(189,'4','teacher teacher','Login','Dec 24, 2017 - 04:15 am'),(190,'4','teacher teacher','Logout','Dec 24, 2017 - 12:59 pm'),(191,'1','admins admin','Login','Dec 24, 2017 - 04:59 am'),(192,'1','admins admin','Logout','Dec 24, 2017 - 01:33 pm'),(193,'4','teacher teacher','Login','Dec 24, 2017 - 05:34 am'),(194,'4','teacher teacher','Login','Dec 24, 2017 - 06:47 am'),(195,'4','teacher teacher','Logout','Dec 24, 2017 - 02:51 pm'),(196,'1','admins admin','Login','Dec 24, 2017 - 06:51 am'),(197,'1','admins admin','Logout','Dec 24, 2017 - 02:56 pm'),(198,'4','teacher teacher','Login','Dec 24, 2017 - 06:57 am'),(199,'4','teacher teacher','Logout','Dec 24, 2017 - 03:09 pm'),(200,'1','admins admin','Login','Dec 24, 2017 - 07:09 am'),(201,'1','admins admin','Logout','Dec 24, 2017 - 03:18 pm'),(202,'4','teacher teacher','Login','Dec 24, 2017 - 07:19 am'),(203,'4','teacher teacher','Logout','Dec 24, 2017 - 03:22 pm'),(204,'3','student student','Login','Dec 24, 2017 - 07:22 am'),(205,'3','student student','Logout','Dec 24, 2017 - 03:23 pm'),(206,'23','parent parent','Login','Dec 24, 2017 - 07:23 am'),(207,'23','parent parent','Logout','Dec 24, 2017 - 03:25 pm'),(208,'1','admins admin','Login','Dec 24, 2017 - 07:26 am'),(209,'1','admins admin','Logout','Dec 24, 2017 - 07:34 pm'),(210,'1','admins admin','Login','Dec 25, 2017 - 05:33 am'),(211,'1','admins admin','Logout','Dec 25, 2017 - 01:43 pm'),(212,'8','Registrar Registrar','Login','Dec 25, 2017 - 05:44 am'),(213,'8','Registrar Registrar','Logout','Dec 25, 2017 - 01:46 pm'),(214,'8','Registrar Registrar','Login','Dec 25, 2017 - 05:52 am'),(215,'8','Registrar Registrar','Login','Dec 25, 2017 - 05:58 am'),(216,'8','Registrar Registrar','Logout','Dec 25, 2017 - 05:17 pm'),(217,'4','teacher teacher','Login','Dec 25, 2017 - 09:17 am'),(218,'4','teacher teacher','Logout','Dec 25, 2017 - 05:50 pm'),(219,'23','parent parent','Login','Dec 25, 2017 - 09:50 am'),(220,'23','parent parent','Logout','Dec 25, 2017 - 05:52 pm'),(221,'3','student student','Login','Dec 25, 2017 - 09:52 am'),(222,'3','student student','Logout','Dec 25, 2017 - 05:56 pm'),(223,'1','admins admin','Login','Dec 25, 2017 - 09:56 am'),(224,'1','admins admin','Logout','Dec 25, 2017 - 06:03 pm'),(225,'3','student student','Login','Dec 25, 2017 - 10:03 am'),(226,'3','student student','Logout','Dec 25, 2017 - 06:03 pm'),(227,'4','teacher teacher','Login','Dec 25, 2017 - 10:03 am'),(228,'4','teacher teacher','Logout','Dec 25, 2017 - 06:04 pm'),(229,'4','teacher teacher','Login','Dec 25, 2017 - 10:04 am'),(230,'4','teacher teacher','Logout','Dec 25, 2017 - 06:16 pm'),(231,'3','student student','Login','Dec 25, 2017 - 10:16 am'),(232,'3','student student','Logout','Dec 25, 2017 - 06:23 pm'),(233,'4','teacher teacher','Login','Dec 25, 2017 - 10:23 am'),(234,'4','teacher teacher','Logout','Dec 25, 2017 - 06:24 pm'),(235,'3','student student','Login','Dec 25, 2017 - 10:24 am'),(236,'3','student student','Logout','Dec 25, 2017 - 06:30 pm'),(237,'1','admins admin','Login','Dec 25, 2017 - 10:31 am'),(238,'1','admins admin','Logout','Dec 25, 2017 - 06:32 pm'),(239,'15','Karlo Bonayon','Login','Dec 25, 2017 - 10:32 am'),(240,'15','Karlo Bonayon','Logout','Dec 25, 2017 - 06:35 pm'),(241,'4','teacher teacher','Login','Dec 25, 2017 - 10:35 am'),(242,'4','teacher teacher','Logout','Dec 25, 2017 - 06:36 pm'),(243,'1','admins admin','Login','Dec 25, 2017 - 10:36 am'),(244,'1','admins admin','Logout','Dec 25, 2017 - 06:39 pm');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcement`
--

LOCK TABLES `announcement` WRITE;
/*!40000 ALTER TABLE `announcement` DISABLE KEYS */;
INSERT INTO `announcement` VALUES (9,'Announcement #1','Sample','man-1.png','');
/*!40000 ALTER TABLE `announcement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `announcement_privilege`
--

DROP TABLE IF EXISTS `announcement_privilege`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `announcement_privilege` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `announceid` varchar(45) DEFAULT NULL,
  `user` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcement_privilege`
--

LOCK TABLES `announcement_privilege` WRITE;
/*!40000 ALTER TABLE `announcement_privilege` DISABLE KEYS */;
INSERT INTO `announcement_privilege` VALUES (7,'9','student'),(8,'9','parent');
/*!40000 ALTER TABLE `announcement_privilege` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clearancetbl`
--

LOCK TABLES `clearancetbl` WRITE;
/*!40000 ALTER TABLE `clearancetbl` DISABLE KEYS */;
INSERT INTO `clearancetbl` VALUES (1,'Libray'),(2,'Registrar');
/*!40000 ALTER TABLE `clearancetbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contactus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` varchar(245) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactus`
--

LOCK TABLES `contactus` WRITE;
/*!40000 ALTER TABLE `contactus` DISABLE KEYS */;
INSERT INTO `contactus` VALUES (1,'divinegraceschool@gmail.com','367-47-42','0988888777','Sampaguita Street Maligaya Park Subdivision Novaliches, Novaliches\r\nQuezon City, 1118 Metro Manila');
/*!40000 ALTER TABLE `contactus` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conversation_reply`
--

LOCK TABLES `conversation_reply` WRITE;
/*!40000 ALTER TABLE `conversation_reply` DISABLE KEYS */;
INSERT INTO `conversation_reply` VALUES (1,'charot','F0217-0001',20,'2017-10-26 09:00:55'),(2,'hey','P0117-001',21,'2017-10-26 09:02:20'),(3,'why?','F0217-0001',21,'2017-10-26 09:02:30'),(4,'k','P0117-001',21,'2017-10-26 09:03:12'),(5,'n','F0217-0001',21,'2017-10-26 09:03:18'),(6,'po\ngi ako','P0117-001',21,'2017-10-26 09:03:32'),(7,'hahaa','4',22,'2017-11-22 15:12:33'),(8,'sdsa','4',0,'2017-11-22 15:13:21'),(9,'Hello','7',23,'2017-12-21 08:11:10'),(10,'','7',23,'2017-12-21 08:11:16');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
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
  `title` varchar(200) DEFAULT NULL,
  `descript` text,
  `image` varchar(170) DEFAULT NULL,
  `datestart` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_tbl`
--

LOCK TABLES `event_tbl` WRITE;
/*!40000 ALTER TABLE `event_tbl` DISABLE KEYS */;
INSERT INTO `event_tbl` VALUES (1,'ITS Defence','Ang pagtutuos ng mga malulupit na panel at programmer','qrcode.png','12/12/2017'),(3,'sa','sas','1.jpg','11/29/2017'),(4,'sample','sample','computers(2).jpg','12/05/2017'),(5,'sa','as','qrcode.png','12/20/2017'),(6,'fds','fsd','Book.png','12/24/2017');
/*!40000 ALTER TABLE `event_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(105) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `links`
--

LOCK TABLES `links` WRITE;
/*!40000 ALTER TABLE `links` DISABLE KEYS */;
INSERT INTO `links` VALUES (3,'divinegraceschool.edu.ph');
/*!40000 ALTER TABLE `links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logotbl`
--

DROP TABLE IF EXISTS `logotbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logotbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logotbl`
--

LOCK TABLES `logotbl` WRITE;
/*!40000 ALTER TABLE `logotbl` DISABLE KEYS */;
INSERT INTO `logotbl` VALUES (1,'logo.png');
/*!40000 ALTER TABLE `logotbl` ENABLE KEYS */;
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
INSERT INTO `parentstudtbl` VALUES (1,'23','3'),(2,'23','15');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posttbl`
--

LOCK TABLES `posttbl` WRITE;
/*!40000 ALTER TABLE `posttbl` DISABLE KEYS */;
INSERT INTO `posttbl` VALUES (5,'xdfgdf',4,'Nov 22, 2017 - 11:22 pm'),(7,'hello world',6,'Dec 22, 2017 - 10:05 am');
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
  `status` int(11) DEFAULT '0',
  `syid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studclearance`
--

LOCK TABLES `studclearance` WRITE;
/*!40000 ALTER TABLE `studclearance` DISABLE KEYS */;
INSERT INTO `studclearance` VALUES (1,3,1,1,24),(3,6,1,1,24),(4,6,2,1,24),(5,15,1,0,24),(6,15,2,0,24),(7,3,2,0,24);
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
INSERT INTO `tblclass` VALUES (3,'APPLE',9,1),(4,'BANANA',9,1),(5,'ORANGE',5,4);
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblschoolyear`
--

LOCK TABLES `tblschoolyear` WRITE;
/*!40000 ALTER TABLE `tblschoolyear` DISABLE KEYS */;
INSERT INTO `tblschoolyear` VALUES (4,'2017-2019',1),(24,'2016-2017',0),(25,'2018-2019',1),(30,'2019-2020',1),(31,'2021-2022',1);
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
  `subjectid` varchar(45) DEFAULT NULL,
  `studentid` int(11) DEFAULT NULL,
  `clearance_status` tinyint(4) DEFAULT '1',
  `gradelevel` int(11) DEFAULT NULL,
  `cur_id` int(11) DEFAULT NULL,
  `schoolyearid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `classid` (`classid`),
  KEY `studentid` (`studentid`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstudentclass`
--

LOCK TABLES `tblstudentclass` WRITE;
/*!40000 ALTER TABLE `tblstudentclass` DISABLE KEYS */;
INSERT INTO `tblstudentclass` VALUES (18,3,'2',15,0,9,1,24),(19,3,'3',15,1,9,1,24),(22,3,'2',3,0,9,1,24),(23,3,'3',3,1,9,1,24),(26,3,'2',6,1,9,1,24),(27,3,'3',6,1,9,1,24),(28,4,'2',15,0,9,1,24),(29,4,'3',15,1,9,1,24),(30,4,'2',3,1,9,1,24),(31,4,'3',3,1,9,1,24);
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
  `studentid` int(11) DEFAULT NULL,
  `subjectid` int(11) DEFAULT NULL,
  `classid` int(11) DEFAULT NULL,
  `adviserid` int(11) DEFAULT NULL,
  `prelim` int(11) DEFAULT NULL,
  `midterm` int(11) DEFAULT NULL,
  `prefi` int(11) DEFAULT NULL,
  `final` int(11) DEFAULT NULL,
  `gradeaverage` int(11) DEFAULT NULL,
  `remarks` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstudentgrade`
--

LOCK TABLES `tblstudentgrade` WRITE;
/*!40000 ALTER TABLE `tblstudentgrade` DISABLE KEYS */;
INSERT INTO `tblstudentgrade` VALUES (2,15,3,4,4,80,90,90,70,83,'Passed'),(8,3,3,3,4,90,90,80,80,85,'Passed'),(13,15,2,4,4,90,NULL,NULL,NULL,NULL,NULL),(14,3,2,4,4,90,90,0,0,45,'No Final Remarks');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsubjects`
--

LOCK TABLES `tblsubjects` WRITE;
/*!40000 ALTER TABLE `tblsubjects` DISABLE KEYS */;
INSERT INTO `tblsubjects` VALUES (2,'IT122','Articial Intelligence',9,1),(3,'WORDLIT','Word Literature',9,1);
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
  `subjectid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teacherid` (`teacherid`,`classid`),
  KEY `classid` (`classid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblteacheradvisory`
--

LOCK TABLES `tblteacheradvisory` WRITE;
/*!40000 ALTER TABLE `tblteacheradvisory` DISABLE KEYS */;
INSERT INTO `tblteacheradvisory` VALUES (1,4,3,9,1,24,3),(2,4,4,9,1,24,2),(3,4,3,9,1,24,2);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usertbl`
--

LOCK TABLES `usertbl` WRITE;
/*!40000 ALTER TABLE `usertbl` DISABLE KEYS */;
INSERT INTO `usertbl` VALUES (1,'admin','admin','admins','admin','admin','1234','admin',0,'images/man-29.png'),(3,'student','student','student','students','student','09123456','student',0,'images/man-28.png'),(4,'teacher','teacher','teacher','teacher','teacher','09','teacher',0,'images/businessman.png'),(5,'Jude','admin123','Jude','Mater','Fabia','0927303888','admin',0,''),(6,'Roxas','student123','Mar','Pogi','Rosas','123478910','student',0,'images/man-2.png'),(8,'registrar','registrar123','Registrar','Registrar','Registrar','09874321','registrar',0,'images/businessman.png'),(14,'Johasa1','student123','John','Doe','basa','','student',0,'images/man-28.png'),(15,'Karyon2','student123','Karlo','Juanitas','Bonayon','','student',0,'images/man-28.png'),(23,'parent3','parent123','parent',' ','parent','','parent',0,'images/man-28.png');
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

-- Dump completed on 2017-12-25 18:40:37

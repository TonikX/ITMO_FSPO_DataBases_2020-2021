-- MySQL dump 10.13  Distrib 5.5.23, for Win32 (x86)
--
-- Host: localhost    Database: library
-- ------------------------------------------------------
-- Server version	5.5.23

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
-- Table structure for table `attachment_in_room`
--

DROP TABLE IF EXISTS `attachment_in_room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attachment_in_room` (
  `id_attachment` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date_attachment` date NOT NULL,
  `library_card` int(11) DEFAULT NULL,
  `transfer_date` date DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_attachment`),
  UNIQUE KEY `id_attachment` (`id_attachment`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attachment_in_room`
--

LOCK TABLES `attachment_in_room` WRITE;
/*!40000 ALTER TABLE `attachment_in_room` DISABLE KEYS */;
INSERT INTO `attachment_in_room` VALUES (1,'2010-10-20',1,NULL,1),(2,'2010-10-20',2,NULL,2),(3,'2010-10-20',3,NULL,3);
/*!40000 ALTER TABLE `attachment_in_room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id_book` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `authors` varchar(50) NOT NULL,
  `publishing_house` varchar(50) NOT NULL,
  `year_of_publishing` date NOT NULL,
  `section` varchar(50) NOT NULL,
  `number_of_copies` int(11) NOT NULL,
  `attachment_date` date DEFAULT NULL,
  `date_of_receiving` date DEFAULT NULL,
  `writeoff_date` date DEFAULT NULL,
  PRIMARY KEY (`id_book`),
  UNIQUE KEY `id_book` (`id_book`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'1st part','Pushkin','OOO Roga i Kopita','2010-10-20','horror',10,'2012-12-20','2013-12-20',NULL),(2,'2st part','Pushkin','OOO Roga i Kopita','2010-10-20','horror',10,'2012-12-20','2013-12-20',NULL),(3,'3st part','Pushkin','OOO Roga i Kopita','2010-10-20','horror',10,'2012-12-20','2013-12-20',NULL);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `copy_of_book`
--

DROP TABLE IF EXISTS `copy_of_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `copy_of_book` (
  `id_copy` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `copy_status` varchar(50) NOT NULL,
  `collection_and_issue_dates` varchar(50) NOT NULL,
  `copy_of_book_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_copy`),
  UNIQUE KEY `id_copy` (`id_copy`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `copy_of_book`
--

LOCK TABLES `copy_of_book` WRITE;
/*!40000 ALTER TABLE `copy_of_book` DISABLE KEYS */;
INSERT INTO `copy_of_book` VALUES (1,'active','asfdf',1),(2,'active','asfdf',2),(3,'active','asfdf',3),(4,'active','asfdf',1),(5,'active','asfdf',2),(6,'active','asfdf',3);
/*!40000 ALTER TABLE `copy_of_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issue_of_book`
--

DROP TABLE IF EXISTS `issue_of_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issue_of_book` (
  `current_copy_id` int(11) DEFAULT NULL,
  `current_library_card` int(11) DEFAULT NULL,
  `current_worker` int(11) DEFAULT NULL,
  `date_of_issue` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issue_of_book`
--

LOCK TABLES `issue_of_book` WRITE;
/*!40000 ALTER TABLE `issue_of_book` DISABLE KEYS */;
INSERT INTO `issue_of_book` VALUES (1,1,1,'2001-12-12'),(2,2,2,'2002-03-11'),(3,3,3,'2002-12-01');
/*!40000 ALTER TABLE `issue_of_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reader`
--

DROP TABLE IF EXISTS `reader`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reader` (
  `id_library_card` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fio` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `passport_number` int(11) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `education` varchar(50) NOT NULL,
  `academic_degree` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_library_card`),
  UNIQUE KEY `id_library_card` (`id_library_card`),
  UNIQUE KEY `passport_number` (`passport_number`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reader`
--

LOCK TABLES `reader` WRITE;
/*!40000 ALTER TABLE `reader` DISABLE KEYS */;
INSERT INTO `reader` VALUES (1,'Armen Armenich Ivanov','2010-10-20',123456,'Pushkina 15','high-school',NULL,'active'),(2,'Elizaveta Ivanovna Armenichiva','2010-10-20',134456,'Pushkina 21','high-school',NULL,'active'),(3,'John Cena Tu-tu-tu-tu','2010-10-20',124546,'Pushkina 11','high-school',NULL,'active');
/*!40000 ALTER TABLE `reader` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reading_rooms`
--

DROP TABLE IF EXISTS `reading_rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reading_rooms` (
  `id_room` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_room` varchar(50) NOT NULL,
  `capacity` int(11) NOT NULL,
  PRIMARY KEY (`id_room`),
  UNIQUE KEY `id_room` (`id_room`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reading_rooms`
--

LOCK TABLES `reading_rooms` WRITE;
/*!40000 ALTER TABLE `reading_rooms` DISABLE KEYS */;
INSERT INTO `reading_rooms` VALUES (1,'Zal',100),(2,'Lobby',10),(3,'Zal_2',150),(4,'Zal',100),(5,'Lobby',10),(6,'Zal_2',150);
/*!40000 ALTER TABLE `reading_rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worker`
--

DROP TABLE IF EXISTS `worker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `worker` (
  `id_worker` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date_of_receipt` date NOT NULL,
  `timetable` varchar(50) NOT NULL,
  `fio_worker` varchar(50) NOT NULL,
  `id_library` int(11) NOT NULL,
  PRIMARY KEY (`id_worker`),
  UNIQUE KEY `id_worker` (`id_worker`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worker`
--

LOCK TABLES `worker` WRITE;
/*!40000 ALTER TABLE `worker` DISABLE KEYS */;
INSERT INTO `worker` VALUES (1,'2010-10-20','pn-pt','Ruslan AVB',1),(2,'2010-11-20','pn-pt','Igot Assan',1),(3,'2010-12-20','pn-pt','Rusadasda Abbramovich',1);
/*!40000 ALTER TABLE `worker` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-16  0:48:56

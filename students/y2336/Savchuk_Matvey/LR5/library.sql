-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: localhost    Database: library
-- ------------------------------------------------------
-- Server version	8.0.25-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `автор`
--

DROP TABLE IF EXISTS `автор`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `автор` (
  `id_автора` int NOT NULL AUTO_INCREMENT,
  `фио_автора` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_автора`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `автор`
--

LOCK TABLES `автор` WRITE;
/*!40000 ALTER TABLE `автор` DISABLE KEYS */;
INSERT INTO `автор` VALUES (1,'Остапов Иван Петрович'),(2,'Еремененко Алексей Дмитриевич'),(3,'Олешко Евлампий Олегович');
/*!40000 ALTER TABLE `автор` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `заказчик`
--

DROP TABLE IF EXISTS `заказчик`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `заказчик` (
  `id_заказчика` int NOT NULL AUTO_INCREMENT,
  `фио_заказчика` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_заказчика`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `заказчик`
--

LOCK TABLES `заказчик` WRITE;
/*!40000 ALTER TABLE `заказчик` DISABLE KEYS */;
INSERT INTO `заказчик` VALUES (3,'Иванов Петр Кузмич'),(4,'Алексеев Пётр Олегович'),(5,'Иванов Пётр Петрович');
/*!40000 ALTER TABLE `заказчик` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `заказы`
--

DROP TABLE IF EXISTS `заказы`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `заказы` (
  `id_заказчика` int NOT NULL,
  `id_книги` int DEFAULT NULL,
  `дата_заказа` date DEFAULT NULL,
  PRIMARY KEY (`id_заказчика`),
  UNIQUE KEY `id_книги` (`id_книги`),
  CONSTRAINT `заказы_FK` FOREIGN KEY (`id_заказчика`) REFERENCES `заказчик` (`id_заказчика`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `заказы_FK_1` FOREIGN KEY (`id_книги`) REFERENCES `книга` (`id_книги`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `заказы`
--

LOCK TABLES `заказы` WRITE;
/*!40000 ALTER TABLE `заказы` DISABLE KEYS */;
INSERT INTO `заказы` VALUES (3,4,'2021-05-01'),(4,6,'2021-03-02'),(5,7,'2021-05-29');
/*!40000 ALTER TABLE `заказы` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `книга`
--

DROP TABLE IF EXISTS `книга`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `книга` (
  `id_книги` int NOT NULL AUTO_INCREMENT,
  `название_книги` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_книги`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `книга`
--

LOCK TABLES `книга` WRITE;
/*!40000 ALTER TABLE `книга` DISABLE KEYS */;
INSERT INTO `книга` VALUES (1,' 100000 советов и рецептов нетрадиционной медицины: Свой путь к здоровью.'),(2,' 7 секретов счастья. Путь оптимиста'),(3,' Ananda Marga Благодатный путь . Введение в Тантра Йогу.'),(4,' C++. Бархатный путь'),(5,'Путь чехословацкой геологии.'),(6,'Путь к искусству.'),(7,'Путь к любви'),(8,'Солнце, Луна и древние камни'),(9,'Песенка Львенка и Черепахи Солнце'),(10,'Солнце тоже встает'),(11,'Солнце над Аравией'),(12,' 7 секретов счастья. Путь оптимиста'),(13,'Латышские народные песни о природе'),(14,' Ananda Marga Благодатный путь . Введение в Тантра Йогу.'),(15,' C++. Бархатный путь'),(16,'Путь чехословацкой геологии.'),(17,'Путь к искусству.'),(18,'Путь к любви');
/*!40000 ALTER TABLE `книга` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `контракт`
--

DROP TABLE IF EXISTS `контракт`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `контракт` (
  `id_контракта` int NOT NULL AUTO_INCREMENT,
  `id_сотрудника` int DEFAULT NULL,
  `id_автора` int DEFAULT NULL,
  `id_заказчика` int DEFAULT NULL,
  `id_книги` int DEFAULT NULL,
  `стоимость` int DEFAULT NULL,
  `дата_заключения` date DEFAULT NULL,
  `дата_выполнения` date DEFAULT NULL,
  PRIMARY KEY (`id_контракта`),
  KEY `контракт_FK1` (`id_сотрудника`),
  KEY `контракт_FK_111` (`id_автора`),
  KEY `контракт_FK_21` (`id_заказчика`),
  KEY `контракт_FK` (`id_книги`),
  CONSTRAINT `контракт_FK` FOREIGN KEY (`id_книги`) REFERENCES `заказы` (`id_книги`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `контракт_FK1` FOREIGN KEY (`id_сотрудника`) REFERENCES `менеджер` (`id_сотрудника`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `контракт_FK_111` FOREIGN KEY (`id_автора`) REFERENCES `автор` (`id_автора`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `контракт_FK_21` FOREIGN KEY (`id_заказчика`) REFERENCES `заказчик` (`id_заказчика`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `контракт`
--

LOCK TABLES `контракт` WRITE;
/*!40000 ALTER TABLE `контракт` DISABLE KEYS */;
INSERT INTO `контракт` VALUES (1,14,3,3,4,200,'2021-06-01','2021-06-10'),(2,14,2,4,7,350,'2021-06-01','2021-06-10'),(3,14,1,5,6,550,'2021-06-01','2021-06-10');
/*!40000 ALTER TABLE `контракт` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `менеджер`
--

DROP TABLE IF EXISTS `менеджер`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `менеджер` (
  `id_сотрудника` int NOT NULL,
  `обязанности сотрудника` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_сотрудника`),
  CONSTRAINT `менеджер_FK` FOREIGN KEY (`id_сотрудника`) REFERENCES `сотрудник` (`id_сотрудника`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `менеджер`
--

LOCK TABLES `менеджер` WRITE;
/*!40000 ALTER TABLE `менеджер` DISABLE KEYS */;
INSERT INTO `менеджер` VALUES (14,'проверять работу');
/*!40000 ALTER TABLE `менеджер` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `правки`
--

DROP TABLE IF EXISTS `правки`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `правки` (
  `id_сотрудника` int DEFAULT NULL,
  `id_книги` int NOT NULL,
  `состав правок` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_книги`),
  KEY `правки_FK` (`id_сотрудника`),
  CONSTRAINT `правки_FK` FOREIGN KEY (`id_сотрудника`) REFERENCES `редакторы` (`id_сотрудника`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `правки_FK_1` FOREIGN KEY (`id_книги`) REFERENCES `редакторы` (`id_книги`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `правки`
--

LOCK TABLES `правки` WRITE;
/*!40000 ALTER TABLE `правки` DISABLE KEYS */;
INSERT INTO `правки` VALUES (15,1,'исправил 2 ошибки'),(16,5,'была заменена обложка'),(17,9,'исправлено 5 ошибок');
/*!40000 ALTER TABLE `правки` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `редактор`
--

DROP TABLE IF EXISTS `редактор`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `редактор` (
  `id_сотрудника` int NOT NULL AUTO_INCREMENT,
  `обязанности_сотрудника` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_сотрудника`),
  CONSTRAINT `редактор_FK_1` FOREIGN KEY (`id_сотрудника`) REFERENCES `сотрудник` (`id_сотрудника`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `редактор`
--

LOCK TABLES `редактор` WRITE;
/*!40000 ALTER TABLE `редактор` DISABLE KEYS */;
INSERT INTO `редактор` VALUES (15,'проверять книги'),(16,'ассистент'),(17,'проверять книги');
/*!40000 ALTER TABLE `редактор` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `редакторы`
--

DROP TABLE IF EXISTS `редакторы`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `редакторы` (
  `id_сотрудника` int NOT NULL AUTO_INCREMENT,
  `id_книги` int NOT NULL,
  `статус_редактора` varchar(100) DEFAULT NULL,
  `зарплата` int DEFAULT NULL,
  PRIMARY KEY (`id_сотрудника`),
  UNIQUE KEY `id_книги` (`id_книги`),
  CONSTRAINT `редакторы_FK` FOREIGN KEY (`id_книги`) REFERENCES `книга` (`id_книги`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `редакторы_FK_1` FOREIGN KEY (`id_сотрудника`) REFERENCES `редактор` (`id_сотрудника`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `редакторы`
--

LOCK TABLES `редакторы` WRITE;
/*!40000 ALTER TABLE `редакторы` DISABLE KEYS */;
INSERT INTO `редакторы` VALUES (15,1,'рядовой',100),(16,5,'ассистирование',160),(17,9,'главный',250);
/*!40000 ALTER TABLE `редакторы` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `сотрудник`
--

DROP TABLE IF EXISTS `сотрудник`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `сотрудник` (
  `id_сотрудника` int NOT NULL AUTO_INCREMENT,
  `фио_сотрудника` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_сотрудника`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `сотрудник`
--

LOCK TABLES `сотрудник` WRITE;
/*!40000 ALTER TABLE `сотрудник` DISABLE KEYS */;
INSERT INTO `сотрудник` VALUES (14,'Иванов Иванов Иванович'),(15,'Петров Иннокентий Павлович'),(16,'Петров Алексей Евгеньевич'),(17,'Семенов Алексей Олегович');
/*!40000 ALTER TABLE `сотрудник` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-16  1:59:48

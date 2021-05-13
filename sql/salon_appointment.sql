-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: w2k12-compscidb    Database: salon
-- ------------------------------------------------------
-- Server version	5.6.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointment` (
  `AppId` int(3) NOT NULL AUTO_INCREMENT,
  `EmpId` int(2) NOT NULL,
  `CustId` int(2) NOT NULL,
  `Type` int(2) NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`AppId`),
  KEY `CustId` (`CustId`),
  KEY `EmpId` (`EmpId`),
  KEY `Type` (`Type`),
  CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`CustId`) REFERENCES `customer` (`CustId`),
  CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`EmpId`) REFERENCES `employee` (`EmpId`),
  CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`Type`) REFERENCES `type` (`TypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
INSERT INTO `appointment` VALUES (40,1,1,1,'08:30:00','09:00:00','2021-05-05'),(41,1,3,1,'09:30:00','10:00:00','2021-05-05'),(42,1,2,4,'11:00:00','12:00:00','2021-05-05'),(43,1,6,6,'14:30:00','15:30:00','2021-05-05'),(44,1,4,9,'16:30:00','18:30:00','2021-05-05'),(45,1,8,10,'19:30:00','21:30:00','2021-05-05'),(46,2,9,8,'10:00:00','12:00:00','2021-05-05'),(47,2,10,6,'12:30:00','13:30:00','2021-05-05'),(48,2,11,9,'15:00:00','17:00:00','2021-05-05'),(49,2,12,2,'18:00:00','18:30:00','2021-05-05'),(50,2,13,2,'18:30:00','19:00:00','2021-05-05'),(51,3,8,7,'09:00:00','11:00:00','2021-05-05'),(52,3,14,1,'12:00:00','12:30:00','2021-05-05'),(53,3,7,5,'15:30:00','16:30:00','2021-05-05'),(54,3,15,10,'19:00:00','21:00:00','2021-05-05'),(55,4,16,8,'11:00:00','13:00:00','2021-05-05'),(56,4,17,6,'14:30:00','15:30:00','2021-05-05'),(57,4,17,4,'15:30:00','16:30:00','2021-05-05'),(58,4,17,5,'16:30:00','17:30:00','2021-05-05'),(59,5,5,1,'09:00:00','09:30:00','2021-05-05'),(60,5,18,7,'10:30:00','12:30:00','2021-05-05'),(61,5,19,10,'15:00:00','17:00:00','2021-05-05'),(62,5,20,9,'19:00:00','21:00:00','2021-05-05');
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-13 15:14:11

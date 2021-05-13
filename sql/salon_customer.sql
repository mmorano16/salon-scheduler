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
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `CustId` int(2) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `PhoneNumber` varchar(10) NOT NULL COMMENT 'XXXXXXXXXX',
  `Address` varchar(25) NOT NULL,
  `City` varchar(25) NOT NULL,
  `State` varchar(2) NOT NULL COMMENT 'State Abbreviation',
  `Zipcode` int(5) NOT NULL,
  PRIMARY KEY (`CustId`),
  UNIQUE KEY `CustId` (`CustId`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'Amit','Russo','2565053657','9536 College St.','New York','NY',10024),(2,'Dillon','Hays','4235842094','8397 Summerhouse Steet','West Babylon','NY',11704),(3,'Eryk','Southern','4845883186','86 Delaware Avenue','Booklyn','NY',11207),(4,'Trey','Merritt','6696667574','59 Chestnut Dr.','Bronx','NY',10541),(5,'Grover','Green','3614746658','978 Lexington St.','Astoria','NY',11105),(6,'Loretta','Bains','3146252131','26 Dogwood Street','Patchogue','NY',11772),(7,'Gladys','Adams','5853674559','5 Edgemont Lane','Brooklyn','NY',11203),(8,'Lilah','Tans','2126697164','8 Clark Ave.','Brooklyn','NY',11230),(9,'Michaela','Naylor','3392378906','8429 Ryan Road','Brooklyn','NY',11235),(10,'Shanae','Schmidt','5025456500','9963 Hall Rd.','New York','NY',10029),(11,'Amna','Dixon','4356915093','936 Walt Whitman Ave.','Brooklyn','NY',11210),(12,'Jayson','Workman','2199819793','8641 S. Littleton Street','Bay Shore','NY',11706),(13,'Hakeem','Thomson','3512028203','707 Lafayette St.','Bronx','NY',10457),(14,'Craig','Cantrell','2178775750','8589 Pacific Drive','Bronx','NY',10468),(15,'Viola','Turner','3049164204','9594 Woodsman Ave.','New York','NY',10025),(16,'Marina','Oakley','8433454352','212 Greenview St.','New York','NY',10003),(17,'Priya','Ferrell','5599275064','8135 Pleasant Ave.','Brooklyn','NY',11229),(18,'Dilara','Riley','4353642750','165 Rockledge Lane','New York','NY',10028),(19,'Dawson','Donovan','5753324248','963 Park St.','Freeport','NY',11520),(20,'Cassie','Findlay','7408361611','57 Sussex Ave.','Yonkers','NY',10701),(22,'Rita','Book','123456789','10 Disk Drive','Rochester','NY',14618);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-13 15:14:08

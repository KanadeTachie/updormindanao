-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: dormitory
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

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
-- Table structure for table `amenity`
--

DROP TABLE IF EXISTS `amenity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `amenity` (
  `idaminty` int(11) NOT NULL AUTO_INCREMENT,
  `iddorm` int(11) DEFAULT NULL,
  `clothdrying` varchar(45) DEFAULT NULL,
  `lavatory` varchar(45) DEFAULT NULL,
  `ventilatedkitchen` varchar(45) DEFAULT NULL,
  `diningarea` varchar(45) DEFAULT NULL,
  `studyarea` varchar(45) DEFAULT NULL,
  `receptionarea` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idaminty`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amenity`
--

LOCK TABLES `amenity` WRITE;
/*!40000 ALTER TABLE `amenity` DISABLE KEYS */;
INSERT INTO `amenity` VALUES (3,31,'YES','YES','NO','NO','YES','YES'),(4,37,'YES','YES','YES','NO','NO','NO'),(5,38,'YES','YES','YES','NO','NO','NO');
/*!40000 ALTER TABLE `amenity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bfp`
--

DROP TABLE IF EXISTS `bfp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bfp` (
  `idbfp` int(11) NOT NULL AUTO_INCREMENT,
  `iddorms` int(11) DEFAULT NULL,
  `extinguisher` varchar(45) DEFAULT NULL,
  `fireexit` varchar(45) DEFAULT NULL,
  `firealarm` varchar(45) DEFAULT NULL,
  `smokedetector` varchar(45) DEFAULT NULL,
  `firehose` varchar(45) DEFAULT NULL,
  `evacroute` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idbfp`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bfp`
--

LOCK TABLES `bfp` WRITE;
/*!40000 ALTER TABLE `bfp` DISABLE KEYS */;
INSERT INTO `bfp` VALUES (12,31,'YES','YES','YES','NO','NO','NO'),(13,37,'YES','YES','YES','YES','NO','NO'),(14,38,'YES','YES','NO','NO','NO','YES');
/*!40000 ALTER TABLE `bfp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dorms`
--

DROP TABLE IF EXISTS `dorms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dorms` (
  `iddorms` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `owner` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contact` varchar(45) DEFAULT NULL,
  `maplocation` varchar(45) DEFAULT NULL,
  `rooms` int(11) DEFAULT NULL,
  `roomcapacity` int(11) DEFAULT NULL,
  `rentperhead` varchar(45) DEFAULT NULL,
  `rentperroom` varchar(45) DEFAULT NULL,
  `deposit` varchar(45) DEFAULT NULL,
  `advance` varchar(45) DEFAULT NULL,
  `transient` varchar(45) DEFAULT NULL,
  `electricity` varchar(45) DEFAULT NULL,
  `water` varchar(45) DEFAULT NULL,
  `internet` varchar(45) DEFAULT NULL,
  `othercharge` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `image1` longblob DEFAULT NULL,
  `image2` longblob DEFAULT NULL,
  `image3` blob DEFAULT NULL,
  `imagelink` varchar(145) DEFAULT NULL,
  `imagelink2` varchar(145) DEFAULT NULL,
  `imagelink3` varchar(145) DEFAULT NULL,
  PRIMARY KEY (`iddorms`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dorms`
--

LOCK TABLES `dorms` WRITE;
/*!40000 ALTER TABLE `dorms` DISABLE KEYS */;
INSERT INTO `dorms` VALUES (38,'DORM NI ORIN','ORIN','','','',1,1,'','','','','','','inclusive','','','MINTAL',NULL,NULL,NULL,'http://localhost/Dormisko/system/images/PENIEL-DORMITORY-MAIN.png','http://localhost/Dormisko/system/images/DUHAYLUNGSOD-BOARDING-HOUSE-MAIN.png','http://localhost/Dormisko/system/images/BAUZON-BOARDING-HOUSE-MAIN.png');
/*!40000 ALTER TABLE `dorms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `privacy`
--

DROP TABLE IF EXISTS `privacy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `privacy` (
  `idprivacy` int(11) NOT NULL AUTO_INCREMENT,
  `iddorm` int(11) DEFAULT NULL,
  `lockoutside` varchar(45) DEFAULT NULL,
  `doublelockinside` varchar(45) DEFAULT NULL,
  `curtain` varchar(45) DEFAULT NULL,
  `privacylatch` varchar(45) DEFAULT NULL,
  `ownerstayin` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idprivacy`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `privacy`
--

LOCK TABLES `privacy` WRITE;
/*!40000 ALTER TABLE `privacy` DISABLE KEYS */;
INSERT INTO `privacy` VALUES (2,31,'YES','YES','YES','YES','YES'),(3,37,'YES','YES','NO','NO','NO'),(4,38,'YES','YES','YES','NO','NO');
/*!40000 ALTER TABLE `privacy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `safety`
--

DROP TABLE IF EXISTS `safety`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `safety` (
  `idsafety` int(11) NOT NULL AUTO_INCREMENT,
  `iddorm` int(11) DEFAULT NULL,
  `electricalchecked` varchar(45) DEFAULT NULL,
  `circuitbreaker` varchar(45) DEFAULT NULL,
  `gaschecked` varchar(45) DEFAULT NULL,
  `lights` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idsafety`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `safety`
--

LOCK TABLES `safety` WRITE;
/*!40000 ALTER TABLE `safety` DISABLE KEYS */;
INSERT INTO `safety` VALUES (1,37,'NO','NO','NO','NO'),(2,38,'NO','','YES','NO');
/*!40000 ALTER TABLE `safety` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `security`
--

DROP TABLE IF EXISTS `security`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `security` (
  `idsecurity` int(11) NOT NULL AUTO_INCREMENT,
  `iddorm` int(11) DEFAULT NULL,
  `guard` varchar(45) DEFAULT NULL,
  `cctv` varchar(45) DEFAULT NULL,
  `fence` varchar(45) DEFAULT NULL,
  `maingate` varchar(45) DEFAULT NULL,
  `perimeterlight` varchar(45) DEFAULT NULL,
  `windowgrill` varchar(45) DEFAULT NULL,
  `logbook` varchar(45) DEFAULT NULL,
  `curfew` varchar(45) DEFAULT NULL,
  `hallwaylight` varchar(45) DEFAULT NULL,
  `streetlight` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idsecurity`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `security`
--

LOCK TABLES `security` WRITE;
/*!40000 ALTER TABLE `security` DISABLE KEYS */;
INSERT INTO `security` VALUES (5,31,'YES','YES','YES','YES','YES','NO','NO','NO','NO','YES'),(6,37,'YES','YES','NO','NO','NO','NO','NO','NO','YES','YES'),(7,38,'YES','YES','NO','NO','NO','NO','NO','NO','NO','NO');
/*!40000 ALTER TABLE `security` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `idusers` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idusers`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','wala');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-10 11:01:17

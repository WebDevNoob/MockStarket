-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: pset7
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2-log

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
-- Table structure for table `transactionHistory`
--

DROP TABLE IF EXISTS `transactionHistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactionHistory` (
  `transactionDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL,
  `symbol` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transactionShares` int(11) DEFAULT NULL,
  `sharePrice` float DEFAULT NULL,
  `transactionType` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`transactionDate`),
  UNIQUE KEY `transactionDate` (`transactionDate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactionHistory`
--

LOCK TABLES `transactionHistory` WRITE;
/*!40000 ALTER TABLE `transactionHistory` DISABLE KEYS */;
INSERT INTO `transactionHistory` VALUES ('2015-10-19 01:36:55',14,'FREE',10,0.035,'SELL'),('2015-10-19 01:37:05',14,'FREE',10,0.035,'BUY '),('2015-10-19 02:46:17',6,'FREE',20,0.035,'BUY'),('2015-10-19 05:13:02',14,'KOOL',2,0.285,'BUY '),('2015-10-19 05:14:35',14,'KOOL',10,0.285,'BUY '),('2015-10-19 05:16:57',14,'KOOL',5,0.285,'SELL'),('2015-10-19 07:11:01',15,'MAT',9,24.35,'BUY '),('2015-10-19 07:23:57',15,'MAT',2,24.35,'SELL'),('2015-10-19 07:24:05',15,'FREE',10,0.035,'BUY '),('2015-10-19 07:28:18',14,'FREE',5,0.035,'SELL'),('2015-10-19 07:28:35',14,'FREE',5,0.035,'SELL'),('2015-10-19 07:43:13',14,'FREE',1,0.035,'BUY '),('2015-10-19 07:56:56',14,'FREE',1,0.035,'BUY '),('2015-10-19 07:57:31',14,'FREE',1,0.035,'BUY '),('2015-10-19 07:58:07',14,'FREE',1,0.035,'BUY '),('2015-10-19 07:58:48',14,'FREE',1,0.035,'BUY '),('2015-10-19 07:59:00',14,'FREE',1,0.035,'BUY '),('2015-10-19 07:59:09',14,'FREE',1,0.035,'BUY '),('2015-10-19 08:00:05',14,'FREE',1,0.035,'BUY '),('2015-10-19 08:00:41',14,'FREE',1,0.035,'BUY '),('2015-10-19 08:04:52',14,'FREE',1,0.035,'BUY '),('2015-10-19 08:05:11',14,'FREE',1,0.035,'BUY '),('2015-10-19 08:06:36',14,'FREE',1,0.035,'BUY '),('2015-10-19 08:46:19',14,'FREE',10,0.0302,'BUY '),('2015-10-19 08:47:19',14,'FREE',10,0.0302,'BUY '),('2015-10-19 08:47:41',14,'FREE',10,0.0302,'BUY '),('2015-10-19 08:49:20',14,'FREE',10,0.0303,'BUY '),('2015-10-19 08:49:38',14,'FREE',10,0.0303,'BUY '),('2015-10-19 08:52:51',14,'FREE',10,0.0303,'BUY '),('2015-10-19 08:53:02',14,'FREE',5,0.0303,'SELL'),('2015-10-19 08:54:18',14,'FREE',5,0.0303,'SELL');
/*!40000 ALTER TABLE `transactionHistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userData`
--

DROP TABLE IF EXISTS `userData`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userData` (
  `id` int(11) NOT NULL,
  `shares` int(11) NOT NULL,
  `symbol` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`symbol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userData`
--

LOCK TABLES `userData` WRITE;
/*!40000 ALTER TABLE `userData` DISABLE KEYS */;
INSERT INTO `userData` VALUES (6,20,'FREE','FreeSeas Inc.'),(14,72,'FREE','FreeSeas Inc.'),(14,15,'KOOL','Cesca Therapeutics Inc.'),(15,10,'FREE','FreeSeas Inc.'),(15,7,'MAT','Mattel, Inc.');
/*!40000 ALTER TABLE `userData` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cash` decimal(65,4) unsigned NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'belindazeng','$1$50$oxJEDBo9KDStnrhtnSzir0',10000.0000),(2,'caesar','$1$50$GHABNWBNE/o4VL7QjmQ6x0',10000.0000),(3,'jharvard','$1$50$RX3wnAMNrGIbgzbRYrxM1/',10000.0000),(4,'malan','$1$50$lJS9HiGK6sphej8c4bnbX.',10000.0000),(5,'rob','$1$HA$l5llES7AEaz8ndmSo5Ig41',10000.0000),(6,'skroob','$1$50$euBi4ugiJmbpIbvTTfmfI.',10000.0000),(7,'zamyla','$1$50$uwfqB45ANW.9.6qaQ.DcF.',10000.0000),(8,'test','$1$vYG3dgJS$gP3Qe.Kc5xYOwhrpuKMJj/',10000.0000),(10,'test1','$1$/xxKFmGw$LmdA7j.mgYmpek3VCDIEv0',10000.0000),(14,'test2','$1$5rlou2Q1$/TAUiis06KQ4mdpAeRFW71',11210.7974),(15,'jenners','$1$H9uWDu.M$DY08HmFz0IflavqoqMNoA0',9829.2000);
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

-- Dump completed on 2015-10-19  5:41:51

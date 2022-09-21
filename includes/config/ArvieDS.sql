-- MariaDB dump 10.19  Distrib 10.7.4-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: ArvieDS
-- ------------------------------------------------------
-- Server version	10.7.4-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `id` int(60) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `contact_number` int(15) NOT NULL,
  `access` tinyint(1) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES
(1,'test','test','test@glory.com.ph','$2y$10$sEWksoBuM7DPCeHAZywmo.pIyU6qGfRufSF/28lPniQBm.W6FveS.',123123123,0,'2022-09-18 15:04:41'),
(2,'Cedrick James','Domo','test@glory.com','$2y$10$X9GEBKzy1YYUq5K010m.M.k7NdLUCn57X6bPVX1E0baev7s5MvDh6',123123123,0,'2022-09-18 15:17:13'),
(3,'read','me','readme@gmail.com','$2y$10$zZJRgeINR/yYpXgI5O9skONZou79fYF96Nf5cP/uJv2ICFMgrNrry',123123123,0,'2022-09-18 22:35:05'),
(4,'Marero','123','marerokevin@gmail.com','$2y$10$MgbnTX/izVUCpeldQyhnceKlm9GLjWfzoefbO6cs4Jdqu46b2oqQu',123123,0,'2022-09-18 22:49:40'),
(5,'test','test','test@gmail.com.ph','$2y$10$Xks2lk2/VZAoMWautPTKB.aAJODfpYqil9nLe3.MjakZLQUW1nqPq',123123123,0,'2022-09-18 23:15:57'),
(6,'kevin','marero','test@tmail.com','$2y$10$5CJfQLwRqp.PD3ClnQkFJuV893QopQet7t.txh6YAW/vAsN3fsML6',123123123,0,'2022-09-18 23:19:36'),
(7,'toys','lol','latoy@gmail.com','$2y$10$7R.bKBPMqK2GlsvQ464GVu52uyFZzCPU8pDANZ5geh5m9nhdfNlkS',123123132,0,'2022-09-18 23:20:48'),
(8,'test','sdaasd','rwqer@gmail.com','$2y$10$46uNbWFECLnPmngFX0jFD.hI2bV96OdqNCSYw6ALqkdPOwL3EVk12',123123123,0,'2022-09-18 23:30:43'),
(9,'test123','test123','lalisa@glory.com.ph','$2y$10$S2.vwY8Dc6OOPEVYpKdV6uCJKrac1TU46lkGnzlBPK3Otb/fXggDO',123123345,0,'2022-09-19 23:15:26'),
(10,'asd123','asd123','waiting@glory.com.ph','$2y$10$yP8UwkcmHJrIj4rdJ4OZZO5mjb9n5eT3TEl7QZQ4anD01gAWiDOvu',123456,0,'2022-09-19 23:16:41'),
(11,'Kevin Roy','marero','marero@gmail.com','$2y$10$wX0.cTEeBO1P/wujdA6gtu5cchj.7WD9S7J1qS1oYg7kGTK.VD3yO',123123,0,'2022-09-20 00:16:50');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-21 22:02:12

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
  `sponsor` varchar(100) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `contact_number` int(15) NOT NULL,
  `date` datetime NOT NULL,
  `access` varchar(8) NOT NULL,
  `permission` varchar(8) NOT NULL,
  `referralId` varchar(16) NOT NULL,
  `homeaddress` varchar(255) NOT NULL,
  `tin_acct` varchar(255) NOT NULL,
  `sss_num` varchar(255) NOT NULL,
  `member_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES
(1,'Kevin Roy','Marero','ADSkSD123','marerokevin@gmail.com','$2y$10$khQtNAeMr7dKJtiM5m49N.P4F5.KxekWmR.3bZwMiPTlGlTDay0fK',123123123,'2022-10-17 22:14:30','approved','userist','asd12-12345','Blk 6, Lt5 , Villa Monteverde Mulawin, Tanza, Cavite','123','123','ADS10-1');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `generated_code`
--

DROP TABLE IF EXISTS `generated_code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `generated_code` (
  `code_id` int(100) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `userNameOfSponsor` varchar(100) NOT NULL,
  `userIdOfSponsor` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `validity` date NOT NULL,
  `date_created` date NOT NULL,
  `userNameOfCodeOwner` varchar(100) NOT NULL,
  `userIdOfCodeOwner` int(11) DEFAULT NULL,
  PRIMARY KEY (`code_id`),
  UNIQUE KEY `uniqueCode` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generated_code`
--

LOCK TABLES `generated_code` WRITE;
/*!40000 ALTER TABLE `generated_code` DISABLE KEYS */;
INSERT INTO `generated_code` VALUES
(1,'RA','James Orozo','13','DR10SKDJFH498','2022-11-01','2022-10-01','marero@gmail.com',11),
(2,'RA','James Orozo','13','DR10DKFJS','2022-11-10','2022-10-10','marero@gmail.com',11),
(3,'RA','James Orozo','13','RA10DKFJSLKJL','2022-11-10','2022-10-10','marero@gmail.com',11);
/*!40000 ALTER TABLE `generated_code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invites`
--

DROP TABLE IF EXISTS `invites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invites` (
  `invitesID` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `idOfInvite` int(30) NOT NULL,
  `invitee` varchar(20) NOT NULL,
  `inviteeID` int(30) NOT NULL,
  PRIMARY KEY (`invitesID`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invites`
--

LOCK TABLES `invites` WRITE;
/*!40000 ALTER TABLE `invites` DISABLE KEYS */;
INSERT INTO `invites` VALUES
(32,'James Orozo',13,'Kevin Roy marero',11),
(41,'Cedrick James Orozo',12,'James Orozo',13),
(43,'q e',17,'James Orozo',13),
(44,'ChrisostomoIbarra',0,'Kevin Roy Marero',0);
/*!40000 ALTER TABLE `invites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rebates_points`
--

DROP TABLE IF EXISTS `rebates_points`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rebates_points` (
  `rebates_points_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `pointsEarned` int(50) NOT NULL,
  PRIMARY KEY (`rebates_points_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rebates_points`
--

LOCK TABLES `rebates_points` WRITE;
/*!40000 ALTER TABLE `rebates_points` DISABLE KEYS */;
INSERT INTO `rebates_points` VALUES
(1,11,'marero@gmail.com',7);
/*!40000 ALTER TABLE `rebates_points` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `referral_codes`
--

DROP TABLE IF EXISTS `referral_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `referral_codes` (
  `gen_date` datetime NOT NULL,
  `referrer` varchar(255) NOT NULL,
  `transfer_date` datetime NOT NULL,
  `referee` varchar(255) DEFAULT NULL,
  `transact_date` datetime NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `generation_batch` varchar(255) NOT NULL,
  `ref_code` varchar(14) NOT NULL,
  PRIMARY KEY (`generation_batch`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referral_codes`
--

LOCK TABLES `referral_codes` WRITE;
/*!40000 ALTER TABLE `referral_codes` DISABLE KEYS */;
INSERT INTO `referral_codes` VALUES
('2022-10-11 22:44:25','ADSkSD123','2022-10-11 22:44:25','','2022-10-11 22:44:25','used','','asd12-12345');
/*!40000 ALTER TABLE `referral_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `totalbalance`
--

DROP TABLE IF EXISTS `totalbalance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `totalbalance` (
  `totalBalanceId` int(20) NOT NULL AUTO_INCREMENT,
  `userID` int(30) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `totalBalance` int(20) NOT NULL,
  PRIMARY KEY (`totalBalanceId`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `totalbalance`
--

LOCK TABLES `totalbalance` WRITE;
/*!40000 ALTER TABLE `totalbalance` DISABLE KEYS */;
INSERT INTO `totalbalance` VALUES
(27,2,'cedrickjames.orozo@cvsu.edu.ph',1000),
(28,11,'marero@gmail.com',520),
(39,12,'cedrickorozo@gmail.com',0),
(40,17,'arian@gmail.com',0),
(41,0,'cedrickjames.orozo@cvsu.edu.ph',100),
(42,0,'marerokevin@gmail.com',100);
/*!40000 ALTER TABLE `totalbalance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction` (
  `transactionId` int(50) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userId` int(50) NOT NULL,
  `inviteName` varchar(50) NOT NULL,
  `inviteeName` varchar(50) NOT NULL,
  `packageType` varchar(200) NOT NULL,
  `codeOwner` varchar(200) NOT NULL COMMENT 'indicates the user of the code',
  `codeOwnerId` varchar(200) NOT NULL COMMENT 'this indicates the id of the code user',
  `addedAmount` int(50) NOT NULL,
  `TotalBalance` int(50) NOT NULL,
  `addedPoints` int(50) NOT NULL,
  `totalPoints` int(50) NOT NULL,
  PRIMARY KEY (`transactionId`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` VALUES
(69,'Direct Referral','cedrickjames.orozo@cvsu.edu.ph',2,'Cedrick James Orozo','James Orozo','','','',500,500,0,0),
(70,'Indirect Referral','Kevin Roy marero',11,'Cedrick James Orozo','James Orozo','','','',10,510,0,0),
(73,'Direct Referral','cedrickjames.orozo@cvsu.edu.ph',13,'q e','James Orozo','','','',500,1000,0,0),
(74,'Indirect Referral','Kevin Roy marero',11,'q e','James Orozo','','','',10,520,0,0),
(75,'Rebates','',11,'','','RA','cedrickjames.orozo@cvsu.edu.ph','13',80,760,0,0),
(76,'Rebates','',17,'','','RA','cedrickjames.orozo@cvsu.edu.ph','13',30,90,0,0),
(77,'Rebates','',1,'','','RA','cedrickjames.orozo@cvsu.edu.ph','13',30,60,0,0),
(78,'Rebates','',2,'','','RA','cedrickjames.orozo@cvsu.edu.ph','13',30,60,0,0),
(79,'Rebates','',3,'','','RA','cedrickjames.orozo@cvsu.edu.ph','13',30,60,0,0),
(80,'Rebates','',4,'','','RA','cedrickjames.orozo@cvsu.edu.ph','13',20,40,0,0),
(81,'Rebates','marero@gmail.com',11,'','','RA','cedrickjames.orozo@cvsu.edu.ph','13',80,840,0,0),
(82,'Rebates','arian@gmail.com',17,'','','RA','cedrickjames.orozo@cvsu.edu.ph','13',30,120,0,0),
(83,'Rebates','test@glory.com.ph',1,'','','RA','cedrickjames.orozo@cvsu.edu.ph','13',30,90,0,0),
(84,'Rebates','test@glory.com',2,'','','RA','cedrickjames.orozo@cvsu.edu.ph','13',30,90,0,0),
(85,'Rebates','readme@gmail.com',3,'','','RA','cedrickjames.orozo@cvsu.edu.ph','13',30,90,0,0),
(86,'Rebates','marerokevin@gmail.com',4,'','','RA','cedrickjames.orozo@cvsu.edu.ph','13',20,60,0,0),
(87,'Rebates','arian@gmail.com',17,'','','RA','marero@gmail.com','11',80,200,0,0),
(88,'Rebates','test@glory.com.ph',1,'','','RA','marero@gmail.com','11',30,120,0,0),
(89,'Rebates','test@glory.com',2,'','','RA','marero@gmail.com','11',30,120,0,0),
(90,'Rebates','readme@gmail.com',3,'','','RA','marero@gmail.com','11',30,120,0,0),
(91,'Rebates','marerokevin@gmail.com',4,'','','RA','marero@gmail.com','11',30,90,0,0),
(92,'Rebates','arian@gmail.com',17,'','','RA','marero@gmail.com','11',80,280,0,0),
(93,'Rebates','test@glory.com.ph',1,'','','RA','marero@gmail.com','11',30,150,0,0),
(94,'Rebates','test@glory.com',2,'','','RA','marero@gmail.com','11',30,150,0,0),
(95,'Rebates','readme@gmail.com',3,'','','RA','marero@gmail.com','11',30,150,0,0),
(96,'Rebates','marerokevin@gmail.com',4,'','','RA','marero@gmail.com','11',30,120,0,0),
(97,'Points','marero@gmail.com',11,'','','RA','','',0,0,1,3),
(98,'Rebates','arian@gmail.com',17,'','','RA','marero@gmail.com','11',80,360,0,0),
(99,'Rebates','test@glory.com.ph',1,'','','RA','marero@gmail.com','11',30,180,0,0),
(100,'Rebates','test@glory.com',2,'','','RA','marero@gmail.com','11',30,180,0,0),
(101,'Rebates','readme@gmail.com',3,'','','RA','marero@gmail.com','11',30,180,0,0),
(102,'Rebates','marerokevin@gmail.com',4,'','','RA','marero@gmail.com','11',30,150,0,0),
(103,'Points','marero@gmail.com',11,'','','RA','','',0,0,1,4),
(104,'Rebates','arian@gmail.com',17,'','','RA','marero@gmail.com','11',80,440,0,0),
(105,'Rebates','test@glory.com.ph',1,'','','RA','marero@gmail.com','11',30,210,0,0),
(106,'Rebates','test@glory.com',2,'','','RA','marero@gmail.com','11',30,210,0,0),
(107,'Rebates','readme@gmail.com',3,'','','RA','marero@gmail.com','11',30,210,0,0),
(108,'Rebates','marerokevin@gmail.com',4,'','','RA','marero@gmail.com','11',30,180,0,0),
(109,'Points','marero@gmail.com',11,'','','RA','','',0,0,1,5),
(110,'Rebates','arian@gmail.com',17,'','','RA','marero@gmail.com','11',80,520,0,0),
(111,'Rebates','test@glory.com.ph',1,'','','RA','marero@gmail.com','11',30,240,0,0),
(112,'Rebates','test@glory.com',2,'','','RA','marero@gmail.com','11',30,240,0,0),
(113,'Rebates','readme@gmail.com',3,'','','RA','marero@gmail.com','11',30,240,0,0),
(114,'Rebates','marerokevin@gmail.com',4,'','','RA','marero@gmail.com','11',30,210,0,0),
(115,'Points','marero@gmail.com',11,'','','RA','','',0,0,1,6),
(116,'Rebates','arian@gmail.com',17,'','','RA','marero@gmail.com','11',80,600,0,0),
(117,'Rebates','test@glory.com.ph',1,'','','RA','marero@gmail.com','11',30,270,0,0),
(118,'Rebates','test@glory.com',2,'','','RA','marero@gmail.com','11',30,270,0,0),
(119,'Rebates','readme@gmail.com',3,'','','RA','marero@gmail.com','11',30,270,0,0),
(120,'Rebates','marerokevin@gmail.com',4,'','','RA','marero@gmail.com','11',30,240,0,0),
(121,'Points','marero@gmail.com',11,'','','RA','','',0,0,1,7),
(122,'Rebates','arian@gmail.com',17,'','','RA','marero@gmail.com','11',80,680,0,0),
(123,'Rebates','test@glory.com.ph',1,'','','RA','marero@gmail.com','11',30,300,0,0),
(124,'Rebates','test@glory.com',2,'','','RA','marero@gmail.com','11',30,300,0,0),
(125,'Rebates','readme@gmail.com',3,'','','RA','marero@gmail.com','11',30,300,0,0),
(126,'Rebates','marerokevin@gmail.com',4,'','','RA','marero@gmail.com','11',30,270,0,0),
(127,'Direct Referral','cedrickjames.orozo@cvsu.edu.ph',0,'','Kevin Roy Marero','','','',500,500,0,0),
(128,'Indirect Referral','Kevin Roy Marero',0,'','Kevin Roy Marero','','','',10,10,0,0),
(129,'Indirect Referral','Kevin Roy Marero',0,'','Kevin Roy Marero','','','',10,20,0,0),
(130,'Indirect Referral','Kevin Roy Marero',0,'','Kevin Roy Marero','','','',10,30,0,0),
(131,'Indirect Referral','Kevin Roy Marero',0,'','Kevin Roy Marero','','','',10,40,0,0),
(132,'Indirect Referral','Kevin Roy Marero',0,'','Kevin Roy Marero','','','',10,50,0,0),
(133,'Indirect Referral','Kevin Roy Marero',0,'','Kevin Roy Marero','','','',10,60,0,0),
(134,'Indirect Referral','Kevin Roy Marero',0,'','Kevin Roy Marero','','','',10,70,0,0),
(135,'Indirect Referral','Kevin Roy Marero',0,'','Kevin Roy Marero','','','',10,80,0,0),
(136,'Indirect Referral','Kevin Roy Marero',0,'','Kevin Roy Marero','','','',10,90,0,0),
(137,'Indirect Referral','Kevin Roy Marero',0,'','Kevin Roy Marero','','','',10,100,0,0);
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-18  0:37:32

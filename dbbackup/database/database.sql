-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: ims
-- ------------------------------------------------------
-- Server version 	10.4.27-MariaDB
-- Date: Sun, 24 Sep 2023 12:46:01 +0200

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40101 SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `branch`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branch` (
  `Branch_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Branch_Name` varchar(100) NOT NULL,
  `Branch_Phone` varchar(10) NOT NULL,
  `Branch_Email` varchar(50) NOT NULL,
  `Branch_Address` varchar(300) NOT NULL,
  `Company_Id` int(11) NOT NULL,
  PRIMARY KEY (`Branch_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch`
--

LOCK TABLES `branch` WRITE;
/*!40000 ALTER TABLE `branch` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `branch` VALUES (1,'F90/9 ','0928977630','support@bioroles.com','F90/9 okhla New Delhi',1);
/*!40000 ALTER TABLE `branch` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `branch` with 1 row(s)
--

--
-- Table structure for table `category`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `Category_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Category_Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Category_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `category` VALUES (1,'Admin'),(2,'Distributer'),(3,'Dealer'),(4,'END User');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `category` with 4 row(s)
--

--
-- Table structure for table `company`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `Company_Id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL DEFAULT 0,
  `Admin_Type` int(11) NOT NULL DEFAULT 2,
  `Active_Status` int(11) NOT NULL DEFAULT 1,
  `Approvel` int(11) DEFAULT 0,
  `Company_Code` int(11) NOT NULL,
  `Company_Name` varchar(500) NOT NULL,
  `Company_Phone` varchar(100) NOT NULL DEFAULT '',
  `Company_Email` varchar(50) NOT NULL DEFAULT '',
  `Company_Address` varchar(500) NOT NULL,
  `Company_Username` varchar(500) NOT NULL,
  `Company_Password` varchar(100) NOT NULL,
  `Company_GST` varchar(25) DEFAULT '',
  `Company_PAN` varchar(15) DEFAULT '',
  `Company_TAN` varchar(15) DEFAULT '',
  `Company_Licence` varchar(15) DEFAULT '',
  `Company_Registration` varchar(25) DEFAULT '',
  PRIMARY KEY (`Company_Id`),
  UNIQUE KEY `Company_Username` (`Company_Username`)
) ENGINE=InnoDB AUTO_INCREMENT=249 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `company` VALUES (1,1,1,1,1,1,'Bioroles','1141069993','info@bioroles.com','Okhla','bioroles','bioroles','','','','',''),(2,1,2,1,1,2,'Haritha Technologies','8885592771','sales@harithatech.com','Hyderabad','Haritha','123456','','','','',''),(3,1,2,1,1,3,'Lorgan Enterprises','9716273904','info@lorgan.in','C50, 3rd Floor, DDA Sheds, Okhla Phase-1, New Delhi-110020','Lorgan','123456','','','','',''),(4,1,2,1,1,4,'KK Biometrics','9426049316','kkbiometrics@gmail.com','A -2 Shashi Appartment, near Anjali cinema, Bhatta, Paldi, Ahmedabad, Gujarat 380007','KK Biometrics','123456','','','','',''),(5,1,2,1,1,5,'A V Techno Soft India Private Limited','92784 7041','amresh@avtechnosoftindia.com','Plot No. 116-B , Kh No. 8/7/2 Kotla Vihar 2 , Tilang Kotla , Nangloi New Delhi - Delhi (India.) - 110041','A V Technosoft','123456','','','','',''),(6,1,2,1,1,6,'Geeta Vision','79923 0796','geetavision@gmail.com','CHANDMARI ROAD MORE KANKARBAGH MAIN ROAD.PATNA NEAR. HYUNDAI SHOW ROOM 800020','Geeta Vision','123456','','','','',''),(7,1,2,1,1,7,'3COP SECURITY SOLUTION','','','','3COP SECURITY SOLUTION','123456','','','','',''),(8,1,2,1,1,8,'A2z Bazaar','','','','A2z Bazaar','123456','','','','',''),(9,1,2,1,1,9,'AAR TECHNO SOFT','','','','AAR TECHNO SOFT','123456','','','','',''),(10,1,2,1,1,10,'Acculekhaa Technologies (P) Ltd','','','','Acculekhaa Technologies (P) Ltd','123456','','','','',''),(11,3,2,1,1,11,'ADON SYSTEMS AND SOLUTIONS PVT. LTD.','','','','ADON SYSTEMS AND SOLUTIONS PVT. LTD.','123456','','','','',''),(12,3,2,1,1,12,'ADVIT LIFTS AND AUTOMATION PRIVATE LIMITED','','','','ADVIT LIFTS AND AUTOMATION PRIVATE LIMITED','123456','','','','',''),(13,1,2,1,1,13,'AEI AUTOMATION PRIVATE LIMITED','','','','AEI AUTOMATION PRIVATE LIMITED','123456','','','','',''),(14,3,2,1,1,14,'A I SECURITY AND SYSTEM','','','','A I SECURITY AND SYSTEM','123456','','','','',''),(15,1,2,1,1,15,'AIS Securitech','','','','AIS Securitech','123456','','','','',''),(16,1,2,1,1,16,'AIS SECURITECH PRIVATE LIMITED','','','','AIS SECURITECH PRIVATE LIMITED','123456','','','','',''),(17,1,2,1,1,17,'AK ENTERPRISES','','','','AK ENTERPRISES','123456','','','','',''),(18,1,2,1,1,18,'ALASKA AUTOMATION PRIVATE LIMITED','','','','ALASKA AUTOMATION PRIVATE LIMITED','123456','','','','',''),(19,1,2,1,1,19,'ALLZONE COMMUNICATION','','','','ALLZONE COMMUNICATION','123456','','','','',''),(20,1,2,1,1,20,'AMPLETRAILS','','','','AMPLETRAILS','123456','','','','',''),(21,1,2,1,1,21,'ANGLO-SWISS WATCH CO.','','','','ANGLO-SWISS WATCH CO.','123456','','','','',''),(22,1,2,1,1,22,'ANSHTEC TECHNOLOGIES','','','','ANSHTEC TECHNOLOGIES','123456','','','','',''),(23,1,2,1,1,23,'APEX ENTERPRISES','','','','APEX ENTERPRISES','123456','','','','',''),(24,1,2,1,1,24,'A PLUS ENTERPRISES','','','','A PLUS ENTERPRISES','123456','','','','',''),(25,1,2,1,1,25,'APRILENT SYSTEMS PRIVATE LIMITED','','','','APRILENT SYSTEMS PRIVATE LIMITED','123456','','','','',''),(26,1,2,1,1,26,'Aps Crop','','','','Aps Crop','123456','','','','',''),(27,1,2,1,1,27,'A R GLOBAL SERVICE','','','','A R GLOBAL SERVICE','123456','','','','',''),(28,1,2,1,1,28,'A.R. SOLUTION','','','','A.R. SOLUTION','123456','','','','',''),(29,1,2,1,1,29,'ARYA AUTOMATION','','','','ARYA AUTOMATION','123456','','','','',''),(30,1,2,1,1,30,'A S D TECHNOLOGIES PVT. LTD.','','','','A S D TECHNOLOGIES PVT. LTD.','123456','','','','',''),(31,1,2,1,1,31,'A V SECURITIES','','','','A V SECURITIES','123456','','','','',''),(32,1,2,1,1,32,'A V TECHNOSOFT INDIA PVT LTD','','','','A V TECHNOSOFT INDIA PVT LTD','123456','','','','',''),(33,1,2,1,1,33,'AYANSH AUTOMATION SYSTEM','','','','AYANSH AUTOMATION SYSTEM','123456','','','','',''),(34,1,2,1,1,34,'BABA INFOTECH SOLUTION','','','','BABA INFOTECH SOLUTION','123456','','','','',''),(35,1,2,1,1,35,'Balaji Traders','','','','Balaji Traders','123456','','','','',''),(36,1,2,1,1,36,'Bawan Sales Agency','','','','Bawan Sales Agency','123456','','','','',''),(37,1,2,1,1,37,'BE SECURE INDIA','','','','BE SECURE INDIA','123456','','','','',''),(38,1,2,1,1,38,'BIOLINK INDIA','','','','BIOLINK INDIA','123456','','','','',''),(39,1,2,1,1,39,'Biometric Access India Pvt Ltd','','','','Biometric Access India Pvt Ltd','123456','','','','',''),(40,1,2,1,1,40,'BIO-PUNCH SECURITY AND SYSTEMS','','','','BIO-PUNCH SECURITY AND SYSTEMS','123456','','','','',''),(41,1,2,1,1,41,'BRAINWARE IT SOLUTIONS','','','','BRAINWARE IT SOLUTIONS','123456','','','','',''),(42,1,2,1,1,42,'B Safe Enterprises','','','','B Safe Enterprises','123456','','','','',''),(43,1,2,1,1,43,'BUBBLE ELECTRONICS','','','','BUBBLE ELECTRONICS','123456','','','','',''),(44,1,2,1,1,44,'BUILDMYINFRA PVT. LTD','','','','BUILDMYINFRA PVT. LTD','123456','','','','',''),(45,1,2,1,1,45,'CAMBAYE','','','','CAMBAYE','123456','','','','',''),(46,1,2,1,1,46,'CDN TECHNOLOGIES (INDIA) PVT LTD','','','','CDN TECHNOLOGIES (INDIA) PVT LTD','123456','','','','',''),(47,1,2,1,1,47,'CHAITANYA TELECOM','','','','CHAITANYA TELECOM','123456','','','','',''),(48,1,2,1,1,48,'Chiptronics Solutions','','','','Chiptronics Solutions','123456','','','','',''),(49,1,2,1,1,49,'COMTEL COMMUNICATIONS','','','','COMTEL COMMUNICATIONS','123456','','','','',''),(50,1,2,1,1,50,'CORPORATE TELESYSTEMS PVT. LTD.','','','','CORPORATE TELESYSTEMS PVT. LTD.','123456','','','','',''),(51,1,2,1,1,51,'CPL INDIA','','','','CPL INDIA','123456','','','','',''),(52,1,2,1,1,52,'CREATIVE SECURITY SURVEILLANCE','','','','CREATIVE SECURITY SURVEILLANCE','123456','','','','',''),(53,1,2,1,1,53,'CUSTOMER PLUS ENTERPRISES','','','','CUSTOMER PLUS ENTERPRISES','123456','','','','',''),(54,1,2,1,1,54,'DEEPASH ENGINEERS & ASSOCIATES','','','','DEEPASH ENGINEERS & ASSOCIATES','123456','','','','',''),(55,1,2,1,1,55,'DESTINY SYSTEMS','','','','DESTINY SYSTEMS','123456','','','','',''),(56,1,2,1,1,56,'DFS SYSTEMS','','','','DFS SYSTEMS','123456','','','','',''),(57,1,2,1,1,57,'DICKSON ELECTRONICS','','','','DICKSON ELECTRONICS','123456','','','','',''),(58,1,2,1,1,58,'DIVYA HORIZON','','','','DIVYA HORIZON','123456','','','','',''),(59,1,2,1,1,59,'DRIFT SMART SOLUTION','','','','DRIFT SMART SOLUTION','123456','','','','',''),(60,1,2,1,1,60,'Dua Enterprises','','','','Dua Enterprises','123456','','','','',''),(61,1,2,1,1,61,'DYNAMICS ENTERPRISES AUTOMATION SOLUTIONS','','','','DYNAMICS ENTERPRISES AUTOMATION SOLUTIONS','123456','','','','',''),(62,1,2,1,1,62,'Electronice Eye','','','','Electronice Eye','123456','','','','',''),(63,1,2,1,1,63,'Electronic Eye Services','','','','Electronic Eye Services','123456','','','','',''),(64,1,2,1,1,64,'ELECTRONIC EYE SYSTEM','','','','ELECTRONIC EYE SYSTEM','123456','','','','',''),(65,1,2,1,1,65,'ELECTRO SYSTEMS','','','','ELECTRO SYSTEMS','123456','','','','',''),(66,1,2,1,1,66,'EPC ELECTRICAL AND AUTOMATION','','','','EPC ELECTRICAL AND AUTOMATION','123456','','','','',''),(67,1,2,1,1,67,'Ewit Infotech','','','','Ewit Infotech','123456','','','','',''),(68,1,2,1,1,68,'EXPRESSION','','','','EXPRESSION','123456','','','','',''),(69,1,2,1,1,69,'FORTUNE - 500','','','','FORTUNE - 500','123456','','','','',''),(70,1,2,1,1,70,'FORTUNEXIS SYSTEMS','','','','FORTUNEXIS SYSTEMS','123456','','','','',''),(71,1,2,1,1,71,'Gambhir Electronics','','','','Gambhir Electronics','123456','','','','',''),(72,1,2,1,1,72,'GEE AAR TECHNO','','','','GEE AAR TECHNO','123456','','','','',''),(73,1,2,1,1,73,'GENESYS INTEGRATED SECURITY CONSULTANTS LLP','','','','GENESYS INTEGRATED SECURITY CONSULTANTS LLP','123456','','','','',''),(74,1,2,1,1,74,'GLOBAL NETWORK','','','','GLOBAL NETWORK','123456','','','','',''),(75,1,2,1,1,75,'GO IP Global Services Private Limited','','','','GO IP Global Services Private Limited','123456','','','','',''),(76,1,2,1,1,76,'Goldline Security Systems','','','','Goldline Security Systems','123456','','','','',''),(77,1,2,1,1,77,'Golf Automation Solution Pvt Ltd','','','','Golf Automation Solution Pvt Ltd','123456','','','','',''),(78,1,2,1,1,78,'GOYAL TECHNOCRATE','','','','GOYAL TECHNOCRATE','123456','','','','',''),(79,1,2,1,1,79,'GREENVISION SOLUTIONS','','','','GREENVISION SOLUTIONS','123456','','','','',''),(80,1,2,1,1,80,'G S ENTERPRISES','','','','G S ENTERPRISES','123456','','','','',''),(81,1,2,1,1,81,'Hawksec Systems LLP','','','','Hawksec Systems LLP','123456','','','','',''),(82,1,2,1,1,82,'HBS Automation Pvt Ltd','','','','HBS Automation Pvt Ltd','123456','','','','',''),(83,1,2,1,1,83,'HIGHLY COMPONENTS PVT LTD','','','','HIGHLY COMPONENTS PVT LTD','123456','','','','',''),(84,1,2,1,1,84,'HIGH ZONE TECHNOLOGIES','','','','HIGH ZONE TECHNOLOGIES','123456','','','','',''),(85,1,2,1,1,85,'HiTechno Security Systems','','','','HiTechno Security Systems','123456','','','','',''),(86,1,2,1,1,86,'H.M Technologies','','','','H.M Technologies','123456','','','','',''),(87,1,2,1,1,87,'HN INDIA AUTOMATION LLP','','','','HN INDIA AUTOMATION LLP','123456','','','','',''),(88,1,2,1,1,88,'H N PROTECH PRIVATE LIMITED','','','','H N PROTECH PRIVATE LIMITED','123456','','','','',''),(89,1,2,1,1,89,'HOLY INDUSTRIES','','','','HOLY INDUSTRIES','123456','','','','',''),(90,1,2,1,1,90,'HS ENTERPRISES','','','','HS ENTERPRISES','123456','','','','',''),(91,1,2,1,1,91,'IMCC & CO.','','','','IMCC & CO.','123456','','','','',''),(92,1,2,1,1,92,'IN4Solution Pvt Ltd','','','','IN4Solution Pvt Ltd','123456','','','','',''),(93,1,2,1,1,93,'INDIAN INFOTECH','','','','INDIAN INFOTECH','123456','','','','',''),(94,1,2,1,1,94,'INDINATUS INDIA PRIVATE LIMITED','','','','INDINATUS INDIA PRIVATE LIMITED','123456','','','','',''),(95,1,2,1,1,95,'INFINITY IT & SECURITY SOLUTIONS','','','','INFINITY IT & SECURITY SOLUTIONS','123456','','','','',''),(96,1,2,1,1,96,'INSTANT IT SOLUTIONS','','','','INSTANT IT SOLUTIONS','123456','','','','',''),(97,1,2,1,1,97,'Invento','','','','Invento','123456','','','','',''),(98,1,2,1,1,98,'Iridium Technologies','','','','Iridium Technologies','123456','','','','',''),(99,1,2,1,1,99,'ISHA ENTERPRISES','','','','ISHA ENTERPRISES','123456','','','','',''),(100,1,2,1,1,100,'JALIAN IMPEX','','','','JALIAN IMPEX','123456','','','','',''),(101,1,2,1,1,101,'JK DISTRIBUTORS COMPUTERS & SECURITIES','','','','JK DISTRIBUTORS COMPUTERS & SECURITIES','123456','','','','',''),(102,1,2,1,1,102,'JS Securetech and Electronics','','','','JS Securetech and Electronics','123456','','','','',''),(103,1,2,1,1,103,'JUBILANCE BUSINESS SOLUTIONS PRIVATE LIMITED','','','','JUBILANCE BUSINESS SOLUTIONS PRIVATE LIMITED','123456','','','','',''),(104,1,2,1,1,104,'K ENTERPRISES','','','','K ENTERPRISES','123456','','','','',''),(105,1,2,1,1,105,'KIVTAS TECHNOLOGIES PRIVATE LIMITED','','','','KIVTAS TECHNOLOGIES PRIVATE LIMITED','123456','','','','',''),(106,1,2,1,1,106,'K K Biometrics','','','','K K Biometrics','123456','','','','',''),(107,1,2,1,1,107,'KRIDHA ENTERPRISES','','','','KRIDHA ENTERPRISES','123456','','','','',''),(108,1,2,1,1,108,'KRISHNA COMPUTER SOLUTION','','','','KRISHNA COMPUTER SOLUTION','123456','','','','',''),(109,1,2,1,1,109,'KRISHNA IT SOLUTIONS','','','','KRISHNA IT SOLUTIONS','123456','','','','',''),(110,1,2,1,1,110,'KRISH SECURITY SOLUTIONS','','','','KRISH SECURITY SOLUTIONS','123456','','','','',''),(111,1,2,1,1,111,'LAVISTA ENTERPRISES','','','','LAVISTA ENTERPRISES','123456','','','','',''),(112,1,2,1,1,112,'LEGEND MARKETING','','','','LEGEND MARKETING','123456','','','','',''),(113,1,2,1,1,113,'LEO TELECOM & CCTV SYS TEMS','','','','LEO TELECOM & CCTV SYS TEMS','123456','','','','',''),(114,1,2,1,1,114,'LIBRA SPORTS','','','','LIBRA SPORTS','123456','','','','',''),(115,1,2,1,1,115,'LUNIK IT','','','','LUNIK IT','123456','','','','',''),(116,1,2,1,1,116,'MAHABIR SYSTEMS','','','','MAHABIR SYSTEMS','123456','','','','',''),(117,1,2,1,1,117,'MANA SECURITY SYSTEM','','','','MANA SECURITY SYSTEM','123456','','','','',''),(118,1,2,1,1,118,'MARSHAL ELECTRONICS','','','','MARSHAL ELECTRONICS','123456','','','','',''),(119,1,2,1,1,119,'Megamind Technosoft','','','','Megamind Technosoft','123456','','','','',''),(120,1,2,1,1,120,'MEGATRONICS','','','','MEGATRONICS','123456','','','','',''),(121,1,2,1,1,121,'METRO NETWORK','','','','METRO NETWORK','123456','','','','',''),(122,1,2,1,1,122,'MH2 POWER SOLUTIONS','','','','MH2 POWER SOLUTIONS','123456','','','','',''),(123,1,2,1,1,123,'MICRO SOLUTIONS','','','','MICRO SOLUTIONS','123456','','','','',''),(124,1,2,1,1,124,'MILLENNIUM ELECTRONIC SOLUTIONS','','','','MILLENNIUM ELECTRONIC SOLUTIONS','123456','','','','',''),(125,1,2,1,1,125,'M&M Enterprises','','','','M&M Enterprises','123456','','','','',''),(126,1,2,1,1,126,'MOBURBAN GLOBAL PRIVATE LIMITED','','','','MOBURBAN GLOBAL PRIVATE LIMITED','123456','','','','',''),(127,1,2,1,1,127,'M/S ARUN KHAJURIA CONTRACTOR','','','','M/S ARUN KHAJURIA CONTRACTOR','123456','','','','',''),(128,1,2,1,1,128,'M/S BHAGWATI ENTERPRISES','','','','M/S BHAGWATI ENTERPRISES','123456','','','','',''),(129,1,2,1,1,129,'M/S CCTV HUB','','','','M/S CCTV HUB','123456','','','','',''),(130,1,2,1,1,130,'MS ENTERPRISES','','','','MS ENTERPRISES','123456','','','','',''),(131,1,2,1,1,131,'M/s. Falcon Systems','','','','M/s. Falcon Systems','123456','','','','',''),(132,1,2,1,1,132,'M/S JT SECURITY SYSTEMS AND INTEGRATIONS PRIVATE LIMITED','','','','M/S JT SECURITY SYSTEMS AND INTEGRATIONS PRIVATE LIMITED','123456','','','','',''),(133,1,2,1,1,133,'M/S SAI SECURITY SOLUTION','','','','M/S SAI SECURITY SOLUTION','123456','','','','',''),(134,1,2,1,1,134,'M/S SUPERSAFE ELECTROMEC PRIVATE LIMITED','','','','M/S SUPERSAFE ELECTROMEC PRIVATE LIMITED','123456','','','','',''),(135,1,2,1,1,135,'M/S THE MILLENIUM SYSTEM','','','','M/S THE MILLENIUM SYSTEM','123456','','','','',''),(136,1,2,1,1,136,'M/S THE NATIONAL SMALL IND. CORP.LTD.','','','','M/S THE NATIONAL SMALL IND. CORP.LTD.','123456','','','','',''),(137,1,2,1,1,137,'NAVKAR SYSTEMS','','','','NAVKAR SYSTEMS','123456','','','','',''),(138,1,2,1,1,138,'Negi System & Security Solution','','','','Negi System & Security Solution','123456','','','','',''),(139,1,2,1,1,139,'NETRA INFOTECH','','','','NETRA INFOTECH','123456','','','','',''),(140,1,2,1,1,140,'NEW ACCURATE ENGINEERING CO','','','','NEW ACCURATE ENGINEERING CO','123456','','','','',''),(141,1,2,1,1,141,'NEXTGEN INFOSYSTEMS','','','','NEXTGEN INFOSYSTEMS','123456','','','','',''),(142,1,2,1,1,142,'N.R Security & Telecom','','','','N.R Security & Telecom','123456','','','','',''),(143,1,2,1,1,143,'OFORT TECHNOLOGIES','','','','OFORT TECHNOLOGIES','123456','','','','',''),(144,1,2,1,1,144,'OGT SMART TECH SOLUTIONS LLP','','','','OGT SMART TECH SOLUTIONS LLP','123456','','','','',''),(145,1,2,1,1,145,'OZONE FORTIS TECHNOLOGIES PVT LTD','','','','OZONE FORTIS TECHNOLOGIES PVT LTD','123456','','','','',''),(146,1,2,1,1,146,'PADAMSHREE INFOTECH','','','','PADAMSHREE INFOTECH','123456','','','','',''),(147,1,2,1,1,147,'PEP Infosolutions','','','','PEP Infosolutions','123456','','','','',''),(148,1,2,1,1,148,'PHAZE','','','','PHAZE','123456','','','','',''),(149,1,2,1,1,149,'Point Blank','','','','Point Blank','123456','','','','',''),(150,1,2,1,1,150,'PRIYA ENTERPRISES','','','','PRIYA ENTERPRISES','123456','','','','',''),(151,1,2,1,1,151,'Promote for U','','','','Promote for U','123456','','','','',''),(152,1,2,1,1,152,'PRONOID SYSTEM','','','','PRONOID SYSTEM','123456','','','','',''),(153,1,2,1,1,153,'PROTEGER-BLR','','','','PROTEGER-BLR','123456','','','','',''),(154,1,2,1,1,154,'PROZONE INDIA','','','','PROZONE INDIA','123456','','','','',''),(155,1,2,1,1,155,'PUJASO TECHNOLOGIES','','','','PUJASO TECHNOLOGIES','123456','','','','',''),(156,1,2,1,1,156,'QIS Innovation Pvt Ltd','','','','QIS Innovation Pvt Ltd','123456','','','','',''),(157,1,2,1,1,157,'QUALITY INTERNATIONAL SERVICES','','','','QUALITY INTERNATIONAL SERVICES','123456','','','','',''),(158,1,2,1,1,158,'RAJ INFO','','','','RAJ INFO','123456','','','','',''),(159,1,2,1,1,159,'RD INFOTECH','','','','RD INFOTECH','123456','','','','',''),(160,1,2,1,1,160,'REGIN CONTROLS INDIA PRIVATE LIMITED','','','','REGIN CONTROLS INDIA PRIVATE LIMITED','123456','','','','',''),(161,1,2,1,1,161,'RELIABLE SYSTEMS','','','','RELIABLE SYSTEMS','123456','','','','',''),(162,1,2,1,1,162,'RG SYSTEMS','','','','RG SYSTEMS','123456','','','','',''),(163,1,2,1,1,163,'RIGHT VISION SECURITY SYSTEMS','','','','RIGHT VISION SECURITY SYSTEMS','123456','','','','',''),(164,1,2,1,1,164,'RK SECURITY SYSTEMS','','','','RK SECURITY SYSTEMS','123456','','','','',''),(165,1,2,1,1,165,'RMC TECHNOLOGY','','','','RMC TECHNOLOGY','123456','','','','',''),(166,1,2,1,1,166,'Rudra IT Point','','','','Rudra IT Point','123456','','','','',''),(167,1,2,1,1,167,'Safe Eye Security System','','','','Safe Eye Security System','123456','','','','',''),(168,1,2,1,1,168,'SAFEWAY SYSTEM','','','','SAFEWAY SYSTEM','123456','','','','',''),(169,1,2,1,1,169,'SAFE ZONE','','','','SAFE ZONE','123456','','','','',''),(170,1,2,1,1,170,'SAFKON TECHNOLOGIES PRIVATE LIMITED','','','','SAFKON TECHNOLOGIES PRIVATE LIMITED','123456','','','','',''),(171,1,2,1,1,171,'SAIFEE TOTAL SECURITY','','','','SAIFEE TOTAL SECURITY','123456','','','','',''),(172,1,2,1,1,172,'SAI TECHNO SOLUTIONS','','','','SAI TECHNO SOLUTIONS','123456','','','','',''),(173,1,2,1,1,173,'SANCHITA ENTERPRISES','','','','SANCHITA ENTERPRISES','123456','','','','',''),(174,1,2,1,1,174,'SAP EXIM','','','','SAP EXIM','123456','','','','',''),(175,1,2,1,1,175,'Saptronics India','','','','Saptronics India','123456','','','','',''),(176,1,2,1,1,176,'S. B. SECURITY INSTRUMENTS','','','','S. B. SECURITY INSTRUMENTS','123456','','','','',''),(177,1,2,1,1,177,'SECURITY CARE','','','','SECURITY CARE','123456','','','','',''),(178,1,2,1,1,178,'SECURITY ENGINEERS PVT. LTD.','','','','SECURITY ENGINEERS PVT. LTD.','123456','','','','',''),(179,1,2,1,1,179,'Security Singh & Automation Co','','','','Security Singh & Automation Co','123456','','','','',''),(180,1,2,1,1,180,'Shivam IT Solution Pvt Ltd','','','','Shivam IT Solution Pvt Ltd','123456','','','','',''),(181,1,2,1,1,181,'Shree Balaji Corporations','','','','Shree Balaji Corporations','123456','','','','',''),(182,1,2,1,1,182,'SHREE NITHYA ENTERPRISES','','','','SHREE NITHYA ENTERPRISES','123456','','','','',''),(183,1,2,1,1,183,'SHREE SECURITRON SYSTEM','','','','SHREE SECURITRON SYSTEM','123456','','','','',''),(184,1,2,1,1,184,'SHYAM MOTORS','','','','SHYAM MOTORS','123456','','','','',''),(185,1,2,1,1,185,'Sigma Power Tech Private limited','','','','Sigma Power Tech Private limited','123456','','','','',''),(186,1,2,1,1,186,'SILVER LINE ELECTRONICS','','','','SILVER LINE ELECTRONICS','123456','','','','',''),(187,1,2,1,1,187,'SITARAM TECHNOLOGIES','','','','SITARAM TECHNOLOGIES','123456','','','','',''),(188,1,2,1,1,188,'S K SECURITY SYSTEM','','','','S K SECURITY SYSTEM','123456','','','','',''),(189,1,2,1,1,189,'SL ELECTRONICS COMPANY','','','','SL ELECTRONICS COMPANY','123456','','','','',''),(190,1,2,1,1,190,'SMART EYE SECURITY SYSTEM','','','','SMART EYE SECURITY SYSTEM','123456','','','','',''),(191,1,2,1,1,191,'SMART INFOCOM PVT LTD','','','','SMART INFOCOM PVT LTD','123456','','','','',''),(192,1,2,1,1,192,'SMC SYSTEMS IT PRIVATE LIMITED','','','','SMC SYSTEMS IT PRIVATE LIMITED','123456','','','','',''),(193,1,2,1,1,193,'S NORTHERN IT AND SECURITY SERVICES','','','','S NORTHERN IT AND SECURITY SERVICES','123456','','','','',''),(194,1,2,1,1,194,'Software Technology Service','','','','Software Technology Service','123456','','','','',''),(195,1,2,1,1,195,'SONY VISION SANT SKA ENTERPRISES','','','','SONY VISION SANT SKA ENTERPRISES','123456','','','','',''),(196,1,2,1,1,196,'SPEEDCOM INDIA','','','','SPEEDCOM INDIA','123456','','','','',''),(197,1,2,1,1,197,'S.R.G.MARKETING','','','','S.R.G.MARKETING','123456','','','','',''),(198,1,2,1,1,198,'SRI KRISHNA ENTERPRISE','','','','SRI KRISHNA ENTERPRISE','123456','','','','',''),(199,1,2,1,1,199,'S. R. TECHNOLOGIES','','','','S. R. TECHNOLOGIES','123456','','','','',''),(200,1,2,1,1,200,'S S AUTOMATION','','','','S S AUTOMATION','123456','','','','',''),(201,1,2,1,1,201,'S.S. COMMUNICATIONS','','','','S.S. COMMUNICATIONS','123456','','','','',''),(202,1,2,1,1,202,'S S SECURITY SYSTEM','','','','S S SECURITY SYSTEM','123456','','','','',''),(203,1,2,1,1,203,'STAR ELETRONICS','','','','STAR ELETRONICS','123456','','','','',''),(204,1,2,1,1,204,'STAR LINK COMMUNICATION PVT.LTD.','','','','STAR LINK COMMUNICATION PVT.LTD.','123456','','','','',''),(205,1,2,1,1,205,'STRATEGIC INFOTECH','','','','STRATEGIC INFOTECH','123456','','','','',''),(206,1,2,1,1,206,'SUNRISE FIRE PRIVATE LIMITED','','','','SUNRISE FIRE PRIVATE LIMITED','123456','','','','',''),(207,1,2,1,1,207,'SUNTECH SOLUTIONS','','','','SUNTECH SOLUTIONS','123456','','','','',''),(208,1,2,1,1,208,'SURAT ELECTROSYS PVT LTD','','','','SURAT ELECTROSYS PVT LTD','123456','','','','',''),(209,1,2,1,1,209,'SURESH PLASTIC PRINTING AND SECURITY SYSTEM PRIVATE LIMITED','','','','SURESH PLASTIC PRINTING AND SECURITY SYSTEM PRIVATE LIMITED','123456','','','','',''),(210,1,2,1,1,210,'s v telecom &surveillance system','','','','s v telecom &surveillance system','123456','','','','',''),(211,1,2,1,1,211,'SWASTIK SECURITY SOLUTION','','','','SWASTIK SECURITY SOLUTION','123456','','','','',''),(212,1,2,1,1,212,'SWASTIK TELE SYSTEMS','','','','SWASTIK TELE SYSTEMS','123456','','','','',''),(213,1,2,1,1,213,'SYSLINK TECHTRONICS PRIVATE LIMITED','','','','SYSLINK TECHTRONICS PRIVATE LIMITED','123456','','','','',''),(214,1,2,1,1,214,'SYSTEM MARKETING & SERVICES','','','','SYSTEM MARKETING & SERVICES','123456','','','','',''),(215,1,2,1,1,215,'TARGET A STAR SURVEILLANCES SYSTEMS PVT LTD','','','','TARGET A STAR SURVEILLANCES SYSTEMS PVT LTD','123456','','','','',''),(216,1,2,1,1,216,'TARGET VISION SECURITY SYSTEMS','','','','TARGET VISION SECURITY SYSTEMS','123456','','','','',''),(217,1,2,1,1,217,'Technical solutions','','','','Technical solutions','123456','','','','',''),(218,1,2,1,1,218,'TECHNICOM ENGINEERS NETWORK','','','','TECHNICOM ENGINEERS NETWORK','123456','','','','',''),(219,1,2,1,1,219,'TECHNOCOM IT SOLUTION','','','','TECHNOCOM IT SOLUTION','123456','','','','',''),(220,1,2,1,1,220,'TECHNOMAC MANAGEMENT SERVICES','','','','TECHNOMAC MANAGEMENT SERVICES','123456','','','','',''),(221,1,2,1,1,221,'TECHNOWICK SOLUTIONS PRIVATE LIMITED','','','','TECHNOWICK SOLUTIONS PRIVATE LIMITED','123456','','','','',''),(222,1,2,1,1,222,'TECHTASTIC TECHNOLOGIES','','','','TECHTASTIC TECHNOLOGIES','123456','','','','',''),(223,1,2,1,1,223,'TECHTREE SYSTEM','','','','TECHTREE SYSTEM','123456','','','','',''),(224,1,2,1,1,224,'TEJ SHREE ENTERPRISES','','','','TEJ SHREE ENTERPRISES','123456','','','','',''),(225,1,2,1,1,225,'The Security Hub','','','','The Security Hub','123456','','','','',''),(226,1,2,1,1,226,'TIME AUTOMATION','','','','TIME AUTOMATION','123456','','','','',''),(227,1,2,1,1,227,'Timewatch Infocom Pvt Ltd','','','','Timewatch Infocom Pvt Ltd','123456','','','','',''),(228,1,2,1,1,228,'TNDC ASIA','','','','TNDC ASIA','123456','','','','',''),(229,1,2,1,1,229,'TRONICS TECHNOLOGIES','','','','TRONICS TECHNOLOGIES','123456','','','','',''),(230,1,2,1,1,230,'True Time Technology','','','','True Time Technology','123456','','','','',''),(231,1,2,1,1,231,'TWENTY FOUR SYSTEM PVT LTD','','','','TWENTY FOUR SYSTEM PVT LTD','123456','','','','',''),(232,1,2,1,1,232,'UNIQUE SECURE TECHNOLOGIES','','','','UNIQUE SECURE TECHNOLOGIES','123456','','','','',''),(233,1,2,1,1,233,'UNITED SECURITY SOLUTIONS','','','','UNITED SECURITY SOLUTIONS','123456','','','','',''),(234,1,2,1,1,234,'UNIVERSAL SECURITIES','','','','UNIVERSAL SECURITIES','123456','','','','',''),(235,1,2,1,1,235,'VAISHNAVI TIME SOLUTIONS','','','','VAISHNAVI TIME SOLUTIONS','123456','','','','',''),(236,1,2,1,1,236,'VARDHMAN PAINT AND HARDWARE','','','','VARDHMAN PAINT AND HARDWARE','123456','','','','',''),(237,1,2,1,1,237,'VARISCON ENGINEERING SERVICES PRIVATE LIMITED','','','','VARISCON ENGINEERING SERVICES PRIVATE LIMITED','123456','','','','',''),(238,1,2,1,1,238,'VIBRO TECH','','','','VIBRO TECH','123456','','','','',''),(239,1,2,1,1,239,'VIRAJ GLOBAL','','','','VIRAJ GLOBAL','123456','','','','',''),(240,1,2,1,1,240,'VIRAYA TECHNOLOGY','','','','VIRAYA TECHNOLOGY','123456','','','','',''),(241,1,2,1,1,241,'VISHWA DARSHAN','','','','VISHWA DARSHAN','123456','','','','',''),(242,1,2,1,1,242,'VISIONTECH COMMUNICATION','','','','VISIONTECH COMMUNICATION','123456','','','','',''),(243,1,2,1,1,243,'V K ENTERPRISES','','','','V K ENTERPRISES','123456','','','','',''),(244,1,2,1,1,244,'WISE NEOSCO INDIA PRIAVTE LIMITED','','','','WISE NEOSCO INDIA PRIAVTE LIMITED','123456','','','','',''),(245,1,2,1,1,245,'WOT DIGITAL SERVICES PRIVATE LIMITED','','','','WOT DIGITAL SERVICES PRIVATE LIMITED','123456','','','','',''),(246,1,2,1,1,246,'XECTA INFOSYS PRIVATE LIMITED','','','','XECTA INFOSYS PRIVATE LIMITED','123456','','','','',''),(247,1,2,1,1,247,'YTT NETWORKS','','','','YTT NETWORKS','123456','','','','',''),(248,2,2,1,1,248,'STSTECHNO','546756474','test@gmail.com','B78,OKHLA','ADITYA','123456','','','','','');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `company` with 248 row(s)
--

--
-- Table structure for table `deliverymode`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deliverymode` (
  `Delivery_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Delivery_Type` varchar(100) NOT NULL,
  PRIMARY KEY (`Delivery_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deliverymode`
--

LOCK TABLES `deliverymode` WRITE;
/*!40000 ALTER TABLE `deliverymode` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `deliverymode` VALUES (1,'air'),(2,'Cargo'),(3,'Surface'),(4,'Hand');
/*!40000 ALTER TABLE `deliverymode` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `deliverymode` with 4 row(s)
--

--
-- Table structure for table `mycart`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mycart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `sale_prize` varchar(10000) NOT NULL DEFAULT '',
  `quantity` int(11) NOT NULL,
  `delivery_mode` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mycart`
--

LOCK TABLES `mycart` WRITE;
/*!40000 ALTER TABLE `mycart` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `mycart` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `mycart` with 0 row(s)
--

--
-- Table structure for table `orders`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `Order_Id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_no` varchar(500) NOT NULL DEFAULT '0',
  `Order_Date` varchar(100) NOT NULL,
  `Delivery_Date` varchar(100) DEFAULT '',
  `Order_Pieces` int(11) NOT NULL,
  `Sale_Price` varchar(10000) NOT NULL DEFAULT '',
  `Approved_Price` int(11) NOT NULL DEFAULT 0,
  `Approved` tinyint(1) NOT NULL DEFAULT 0,
  `Order_Status` int(11) NOT NULL DEFAULT 1,
  `Product_Id` int(11) NOT NULL,
  `Company_Id` int(11) NOT NULL,
  `Cancel_Reason` varchar(100) NOT NULL DEFAULT 'This Item is currently out of Stock',
  `Delievery_Mode` int(11) NOT NULL DEFAULT 0,
  `Docket_No` varchar(100) DEFAULT '',
  `Return_Status` int(11) NOT NULL DEFAULT 0,
  `Return_Pieces` int(11) NOT NULL DEFAULT 0,
  `Return_Approvel` int(11) NOT NULL DEFAULT 0,
  `Return_Reason` varchar(500) NOT NULL DEFAULT '',
  `Return_Date` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`Order_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `orders` VALUES (1,'2297581','2023-08-09','',4,'26500',26500,1,2,141,2,'This Item is currently out of Stock',3,'',0,0,0,'',''),(2,'2297581','2023-08-09','',2,'8500',8500,1,2,144,2,'This Item is currently out of Stock',3,'',0,0,0,'',''),(3,'2297581','2023-08-09','',2,'5500',5400,1,2,19,2,'This Item is currently out of Stock',3,'',0,0,0,'',''),(4,'8777323','2023-08-18','2023-09-12',10,'24000',24000,1,4,141,53,'This Item is currently out of Stock',3,'423',0,0,0,'',''),(5,'7414769','2023-08-19','',36,'600',600,1,1,77,191,'This Item is currently out of Stock',3,'',0,0,0,'',''),(23,'1695281762468','2023-09-21','',345,'4535',4535,0,1,50,12,'This Item is currently out of Stock',0,'',0,0,0,'',''),(24,'1695281762468','2023-09-21','',345,'435',435,0,1,52,12,'This Item is currently out of Stock',0,'',0,0,0,'',''),(25,'1695281762468','2023-09-21','',345,'534',534,1,3,56,12,'This Item is currently out of Stock',0,'2323',0,0,0,'',''),(26,'1695281775776','2023-09-21','2023-08-29',345,'543',543,1,4,130,11,'This Item is currently out of Stock',2,'4234',0,0,0,'',''),(27,'1695281775776','2023-09-21','2023-09-05',345,'345',345,1,4,133,11,'This Item is currently out of Stock',2,'4324',0,0,0,'',''),(28,'1695284275178','2023-09-21','',2,'2350',2350,1,2,16,4,'This Item is currently out of Stock',3,'',0,0,0,'',''),(29,'1695284275178','2023-09-21','',2,'1050',1050,0,5,4,4,'This Item is currently out of Stock',3,'',0,0,0,'',''),(30,'1695288258310','2023-09-21','',5543,'56',56,0,1,49,248,'This Item is currently out of Stock',2,'',0,0,0,'',''),(31,'1695288258310','2023-09-21','',234,'5432',5432,0,1,180,248,'This Item is currently out of Stock',0,'',0,0,0,'',''),(32,'1695289370542','2023-09-21','',7899,'7',7,0,1,181,248,'This Item is currently out of Stock',0,'',0,0,0,'',''),(33,'1695289370542','2023-09-21','',45678,'678',678,0,1,36,248,'This Item is currently out of Stock',0,'',0,0,0,'',''),(34,'1695289370542','2023-09-21','',567,'64',64,0,1,34,248,'This Item is currently out of Stock',0,'',0,0,0,'','');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `orders` with 17 row(s)
--

--
-- Table structure for table `orderstatus`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orderstatus` (
  `Status_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Status_Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Status_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderstatus`
--

LOCK TABLES `orderstatus` WRITE;
/*!40000 ALTER TABLE `orderstatus` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `orderstatus` VALUES (1,'Pending'),(2,'Bill Processing'),(3,'Intransit'),(4,'Delievered'),(5,'Cancelled');
/*!40000 ALTER TABLE `orderstatus` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `orderstatus` with 5 row(s)
--

--
-- Table structure for table `product`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `Product_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Product_Name` varchar(50) NOT NULL,
  `Product_Modal_No` varchar(100) NOT NULL,
  `Product_Img` varchar(100) NOT NULL,
  `Normal_Price` int(11) NOT NULL,
  `Discounted_Price` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Latest_Stock_Date` date NOT NULL DEFAULT current_timestamp(),
  `P_Category_Id` int(11) NOT NULL,
  PRIMARY KEY (`Product_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=219 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `product` VALUES (3,'STANDALONE ACCESS CONTROL','BA32','SA32.jpeg',900,850,66,'2023-08-03',1),(4,'STANDALONE ACCESS CONTROL','BT-12','PHOTO-2022-08-01-14-32-52.JPG',1150,1100,96,'2023-07-21',1),(5,'STANDALONE ACCESS CONTROL','KM-35','PHOTO-2022-04-13-11-59-09.JPG',750,700,2125,'2023-08-07',1),(6,'STANDALONE ACCESS CONTROL','BT12MF','PHOTO-2022-08-01-14-32-52.JPG',1550,1500,0,'2023-07-12',1),(7,'STANDALONE ACCESS CONTROL','BK12V','WhatsApp Image 2023-07-12 at 12.54.37 PM.jpeg',800,750,424,'2023-08-09',1),(8,'STANDALONE ACCESS CONTROL','BT12AP','WhatsApp Image 2023-07-12 at 12.54.38 PM.jpeg',1900,1850,94,'2023-08-07',1),(9,'STANDALONE ACCESS CONTROL','T20','PHOTO-2022-04-13-11-55-56.JPG',1300,1250,120,'2023-08-07',1),(10,'STANDALONE ACCESS CONTROL','BT8E','PHOTO-2022-07-28-16-52-19 9.JPG',2450,2400,29,'2023-05-31',1),(11,'STANDALONE ACCESS CONTROL','BT3E','WhatsApp Image 2023-07-12 at 12.54.37 PM (1).jpeg',2750,2700,59,'2023-05-31',1),(12,'STANDALONE ACCESS CONTROL','C103LE','WhatsApp Image 2023-07-12 at 12.54.38 PM (1).jpeg',1950,1900,0,'2023-07-12',1),(13,'STANDALONE ACCESS CONTROL','A50','11014_2.jpg',4800,4750,0,'2023-07-12',1),(14,'STANDALONE ACCESS CONTROL','A50AP','11014_2.jpg',5400,5350,0,'2023-07-12',1),(15,'STANDALONE ACCESS CONTROL','BS-12','PHOTO-2022-07-28-16-52-20.JPG',1850,1800,173,'2023-05-31',1),(16,'STANDALONE ACCESS CONTROL','A80','PHOTO-2022-07-28-16-52-20 2.JPG',2390,2340,138,'2023-05-31',1),(17,'STANDALONE ACCESS CONTROL','A60','OIP.jpeg',1850,1800,21,'2023-08-03',1),(19,' ACCESS CONTROL','AD-1','WhatsApp Image 2023-07-12 at 3.13.15 PM (1).jpeg',5500,5450,0,'2023-07-12',1),(20,' ACCESS CONTROL','AD-2','WhatsApp Image 2023-07-12 at 3.13.15 PM.jpeg',8500,8450,0,'2023-07-12',1),(21,' ACCESS CONTROL','AD-4','WhatsApp Image 2023-07-12 at 3.13.15 PM (2).jpeg',9500,9450,0,'2023-07-12',1),(22,' ACCESS CONTROL','EVC5816A','SA32.jpeg',16900,16850,0,'2023-07-12',1),(23,' ACCESS CONTROL','BIOMAC S2','SA32.jpeg',14500,14450,0,'2023-07-12',1),(24,' ACCESS CONTROL','BIOMAC D4','SA32.jpeg',12500,12450,0,'2023-07-12',1),(25,'STANDALONE ACCESS CONTROL','BT-63','PHOTO-2023-02-23-13-09-41.JPG',2200,2150,14,'2023-08-07',1),(26,'GUARD TOUR','GT-2080E','WhatsApp Image 2023-07-12 at 3.58.25 PM.jpeg',6200,6150,0,'2023-07-12',1),(27,'GUARD TOUR','WM5000V4S','WhatsApp Image 2023-07-12 at 3.58.24 PM.jpeg',7250,7200,115,'2023-07-21',1),(28,'GUARD TOUR','WM5000X1','WhatsApp Image 2023-07-12 at 3.58.25 PM (1).jpeg',12900,12850,18,'2023-07-21',1),(29,'BIOMETRIC','BS-101','C101-OEM.jpg',2350,2300,92,'2023-05-31',8),(30,'BIOMETRIC','BSFP-61','WhatsApp Image 2023-07-12 at 4.29.48 PM.jpeg',3650,3600,63,'2023-05-31',8),(31,'BIOMETRIC','BSFP-61 W','WhatsApp Image 2023-07-12 at 4.30.08 PM.jpeg',3950,3900,97,'2023-05-31',8),(32,'BIOMETRIC','BS-45','PHOTO-2022-07-28-16-52-21.JPG',8400,8350,16,'2023-08-03',8),(33,'BIOMETRIC','BS-121','PHOTO-2022-06-10-15-01-40.JPG',3950,3900,643,'2023-08-18',8),(34,'BIOMETRIC','BSF-28','PHOTO-2022-07-28-16-52-19.JPG',4650,4600,40,'2023-05-31',8),(35,'BIOMETRIC','BSF-1505','WhatsApp Image 2023-07-12 at 1.54.01 PM.jpeg',5500,5450,46,'2023-05-31',8),(36,'BIOMETRIC','BSF-1505W','WhatsApp Image 2023-07-12 at 1.54.08 PM.jpeg',5950,5900,81,'2023-05-31',8),(37,'BIOMETRIC','BS-20','WhatsApp Image 2023-07-12 at 4.43.16 PM.jpeg',4450,4400,76,'2023-05-30',8),(38,'BIOMETRIC','BS-304 STEEL','WhatsApp Image 2023-07-12 at 1.54.10 PM (3).jpeg',7350,7300,118,'2023-05-31',8),(39,'BIOMETRIC ','BSF-91 AW','PHOTO-2022-09-23-14-57-36.JPG',6900,6850,20,'2023-07-12',8),(40,'BIOMETRIC','BSF-91A+','WhatsApp Image 2023-07-12 at 4.43.18 PM.jpeg',11500,11450,10,'2023-05-31',8),(41,'BIOMETRIC','BS-605','WhatsApp Image 2023-07-12 at 1.54.09 PM (1).jpeg',6500,6450,16,'2023-05-31',8),(42,'BIOMETRIC','BS-506AI(52)','WhatsApp Image 2023-07-12 at 1.54.10 PM (1).jpeg',7900,7850,27,'2023-08-18',8),(43,'BIOMETRIC','BS-606AI','PHOTO-2022-07-28-16-52-19 3.JPG',9500,9450,201,'2023-05-31',8),(44,'BIOMETRIC','BS-607AI','WhatsApp Image 2023-07-12 at 1.54.09 PM.jpeg',16500,16450,84,'2023-05-31',8),(45,'BIOMETRIC','DS5W','WhatsApp Image 2023-07-12 at 4.19.52 PM.jpeg',8900,8850,17,'2023-05-31',8),(46,'BIOMETRIC ','BSFP-55','WhatsApp Image 2023-07-12 at 1.54.10 PM (2).jpeg',4550,4500,0,'2023-07-12',8),(47,'BIOMETRIC ','304 OLD','WhatsApp Image 2023-07-12 at 4.57.21 PM.jpeg',6850,6800,8,'2023-05-31',8),(48,'MIFARE CARD READER','V-8','PHOTO-2022-04-13-11-55-56 2.JPG',1090,1040,22,'2023-08-03',2),(49,'PROXIMITY CARD READER','V-6','WhatsApp Image 2023-07-14 at 5.37.17 PM.jpeg',790,760,677,'2023-08-09',2),(50,'PROXIMITY CARD READER','V10M','WhatsApp Image 2023-07-14 at 6.24.52 PM.jpeg',2250,2210,0,'2023-07-13',2),(51,'PROXIMITY CARD READER','V-5','PHOTO-2022-04-13-11-55-56 3.JPG',890,860,70,'2023-08-09',2),(52,'PROXIMITY CARD READER','V-9 ','PHOTO-2022-04-13-11-55-58 2.JPG',790,740,22,'2023-08-09',2),(53,'QR CODE  CARD READER','QR1','WhatsApp Image 2023-07-14 at 1.29.10 PM (1).jpeg',5250,5200,0,'2023-07-14',2),(54,'ACCESSORIES','V-3','WhatsApp Image 2023-07-14 at 5.36.53 PM.jpeg',790,740,0,'2023-07-14',2),(55,'SS EXITE SWITCH NO/NC/COM','BP6+','WhatsApp Image 2023-07-14 at 1.29.10 PM.jpeg',150,120,556,'2023-08-03',2),(56,'EMERGENCY DOOR RELEASE ','BEDR1D','WhatsApp Image 2023-07-14 at 1.29.09 PM.jpeg',350,330,-108,'2023-08-16',2),(57,'EDR WITH FLASH LED AND DUAL TONE SOUND','EB20G','WhatsApp Image 2023-07-14 at 1.29.08 PM (1).jpeg',1950,1930,13,'2023-08-07',2),(58,'1*3 SS EXITE SWITCH','BP6A','WhatsApp Image 2023-07-14 at 1.29.07 PM.jpeg',100,90,30,'2023-08-07',2),(59,'3*3 SS EXITE SWITCH','BP6','WhatsApp Image 2023-07-14 at 1.29.07 PM (1).jpeg',130,110,15,'2023-08-03',2),(60,'ZINC EXITE SWITCH WITH BACK BOX FOR SURFACE MOUNT','BPZ30','WhatsApp Image 2023-07-14 at 1.29.06 PM.jpeg',330,310,68,'2023-08-07',2),(61,'LED SERIES EXITE SWITCH','BP86L','S86L-150x150.jpg',350,310,145,'2023-08-07',2),(62,'SERIES BUTTON IS CASTED BY PLASTIC WITH FIREPROOF ','BP5+','WhatsApp Image 2023-07-14 at 1.29.05 PM (1).jpeg',120,1100,0,'2023-07-14',2),(63,'SERIES BUTTON IS CASTED BY PLASTIC WITH FIREPROOF ','BPB5','PA6-1-150x150.jpg',110,100,0,'2023-07-14',2),(64,'SERIES BUTTON IS CASTED BY PLASTIC WITH FIREPROOF ','BPE9','WhatsApp Image 2023-07-14 at 1.29.04 PM.jpeg',110,100,0,'2023-07-14',2),(65,'TOUCH BUTTON IS SURFACE AMOUNT WITH BLUE AND GREEN','BNT2','WhatsApp Image 2023-07-14 at 1.29.11 PM (1).jpeg',350,330,2,'2023-08-07',2),(66,'SLIM NO TOUCH SWITCH ','BNT-4','WhatsApp Image 2023-07-14 at 1.29.03 PM (2).jpeg',590,570,273,'2023-07-21',2),(67,'NO TOUCH SENSOR DOOR RELEASE BUTTON SWITCH','BNT3','WhatsApp Image 2023-07-14 at 1.29.03 PM (1).jpeg',390,370,2421,'2023-07-21',2),(68,'EMERGENCY DOOR RELEASE  SWITCH FOR ACCESS CONTROL','BEDR3','PHOTO-2022-11-23-11-07-29.JPG',230,220,100,'2023-07-21',2),(69,'EMERGENCY DOOR RELEASE  SWITCH FOR ACCESS CONTROL','BEDR2','WhatsApp Image 2023-07-14 at 1.29.08 PM.jpeg',690,670,558,'2023-08-16',2),(70,'NO TOUCH EXITE SWITCH','NO TOUCH ','WhatsApp Image 2023-07-14 at 1.29.11 PM.jpeg',590,570,0,'2023-07-14',2),(71,'NO TOUCH EXITE SWITCH ','NO TOUCH  PREMIUM','PHOTO-2022-11-23-11-00-09.JPG',590,580,0,'2023-07-14',2),(72,'STRIKE LOCK','BS-130NO','PHOTO-2022-04-13-11-55-55 2.JPG',1250,1200,996,'2023-08-04',2),(73,'EM LOCK 600 LBS DUAL LEAF NON FEEDBACK','EML600D2','em-lock-600-lbs-dual-leaf-150x150.jpg',1650,1600,29,'2023-08-04',2),(74,'EM LOCK 600 LBS DUAL LEAF FEEDBACK','EML600D5','em-lock-600-lbs-dual-leaf-150x150.jpg',1950,1900,0,'2023-07-14',2),(75,'EM LOCK 1200 LBS DUAL LEAF FEEDBACK','EML1200D5','R.jpeg',4950,4900,0,'2023-07-14',2),(76,'STRIKE LOCK NO/NC','BS-132 NO/NC','PHOTO-2022-04-13-11-55-55 2.JPG',1250,1200,205,'2023-08-03',2),(77,'EM LOCK 600 LBS','EM LOCK 6002','Em-Lock-600LBS-150x150.jpg',750,730,4596,'2023-08-04',2),(78,'EM LOCK 600 LBS FEEDBACK','EML6005','Em-Lock-600LBS-150x150.jpg',950,930,214,'2023-08-09',2),(79,'EM LOCK 100 LBS ','EML102','WhatsApp Image 2023-07-14 at 5.54.47 PM.jpeg',550,530,3,'2023-05-03',2),(80,'EM LOCK 100 LBS FEEDBACK','EML105','OIP (1).jpeg',650,630,0,'2023-07-14',2),(81,'ANDROID/IOS APP BASED EXITE SWITCH','BPA1','WhatsApp Image 2023-07-14 at 1.29.02 PM (1).jpeg',1750,1730,27,'2023-08-07',2),(82,'DOME EXITE SWITCH METAL ','BPDE1','WhatsApp Image 2023-07-14 at 1.29.09 PM (1).jpeg',1450,1430,5,'2023-08-07',2),(83,'PANIC EXITE BAR','EXITE BAR','WhatsApp Image 2023-07-14 at 6.05.32 PM (1).jpeg',6500,6450,2,'2023-08-04',2),(84,'BOLT LOCK','BBL-1','Bolt-Lock-For-FrameLess-Glass-Door-150x150.jpg',1500,1470,26,'2023-08-09',2),(85,'GLASS DOOR BOLT LOCK NON FEEDBACK','BGL-1 NON FEEDBACK','Drop-Bolt-Lock-150x150.jpg',790,770,1277,'2023-08-04',2),(86,'GLASS DOOR BOLT LOCK FEEDBACK','BGL-1  FEEDBACK','WhatsApp Image 2023-07-14 at 1.29.01 PM (1).jpeg',1075,1060,335,'2023-07-21',2),(87,'SURFACE BOLT LOCK','SBS LOCK','Bolt-Lock-Side-By-Side-150x150.jpg',1250,1230,629,'2023-07-27',2),(88,'BOLT LOCK SS BRACKET FOR DOOR','BBLU','PHOTO-2022-04-13-11-51-46.JPG',350,330,90,'2023-08-07',2),(89,'WATERPROOF 600 LBS EMLOCK','EM LOCK WATERPROOF','WhatsApp Image 2023-07-14 at 1.28.59 PM (1).jpeg',3850,3800,0,'2023-07-14',2),(90,'600 LBS CONCEALED EM LOCK','EM LOCK MOTORISED/CONCEALED ','PHOTO-2022-11-22-18-26-23 2.JPG',1050,1030,101,'2023-08-16',2),(91,'EM LOCK 300 LBS NON FEEDBACK','EML302','WhatsApp Image 2023-07-14 at 6.05.18 PM.jpeg',650,630,291,'2023-08-03',2),(92,'EM LOCK 300 LBS FEEDBACK','EML305','WhatsApp Image 2023-07-14 at 6.13.02 PM.jpeg',750,730,50,'2023-08-09',2),(93,'SMART CARD DRAWER LOCK','BDL1','WhatsApp Image 2023-07-14 at 5.48.17 PM.jpeg',1550,1530,0,'2023-07-14',2),(94,'COMPUTER BRASS KEY DUAL CYLINDER REMOTE/CARD','BVPEL2 RFID','PHOTO-2022-04-13-11-53-46 2.JPG',2850,2800,0,'2023-07-14',2),(95,'RIM LOCK','BVPEL1','PHOTO-2022-10-07-10-32-30.JPG',1050,1000,129,'2023-08-09',2),(96,'EM LOCK I NBUILT REMOTE ','EML6002R','WhatsApp Image 2023-07-15 at 10.25.17 AM.jpeg',1450,1400,0,'2023-07-14',2),(97,'MOTORISED RIM LOCK','BVPEL2','PHOTO-2022-11-22-18-26-24 2.JPG',1950,1900,0,'2023-07-14',2),(98,'600 LBS L BRACKET ','L BRACKET','L-Bracket-150x150.jpg',140,120,0,'2023-07-14',2),(99,'ZL BRACKET FOR 600 LBS EM LOCK','ZL BRACKET','ZL-Bracket-150x150.jpg',390,370,0,'2023-07-14',2),(100,'600 LBS U BRACKET','U  BRTACKET','U-Bracket-150x150.jpg',150,130,0,'2023-07-14',2),(101,'GG BRACKET FOR 600 LBS EM LOCK USED FOR FRAMELESS ','BEMGG','GG-Bracket-150x150.jpg',1150,1100,111,'2023-07-27',2),(102,'DRAWER LOCK','BDL-2','PHOTO-2022-11-22-16-22-15.JPG',1250,1200,0,'2023-07-14',2),(103,'BOLT LOCK SS BRACKET FOR DOOR AND FRAME','BBL U1','WhatsApp Image 2023-07-14 at 5.42.03 PM.jpeg',1400,1350,0,'2023-07-14',2),(104,'ISO/MIFARE CARDS','ISOP','WhatsApp Image 2023-07-14 at 5.30.07 PM.jpeg',10,9,35000,'2023-08-04',2),(105,'PROXIMITY 0.8MM CARD ','PROX1','WhatsApp Image 2023-07-14 at 5.30.26 PM.jpeg',10,9,48900,'2023-07-21',2),(106,'UHF CARD','UZ43','WhatsApp Image 2023-07-14 at 5.30.07 PM.jpeg',35,33,0,'2023-07-14',2),(107,'LC BRACKET FOR 600LBS EM LOCK','LCB','PHOTO-2022-11-23-10-36-48.JPG',1250,1200,45,'2023-08-07',2),(108,'SHUTTER MAGNETIC CONTACT','MCS1','PHOTO-2022-04-13-11-55-54.JPG',475,460,200,'2023-07-21',2),(109,'MAGNETIC CONTACT','MC1C','WhatsApp Image 2023-07-14 at 5.18.01 PM.jpeg',75,65,0,'2023-07-14',2),(110,'ACCESSORIES','MC1NO','PHOTO-2022-04-13-11-51-46.JPG',180,170,0,'2023-07-14',2),(111,'I BRACKET FOR ARMATURE PLATE OF EM LOCK','I BRACKET','WhatsApp Image 2023-07-14 at 1.28.58 PM (1).jpeg',650,630,16,'2023-08-07',2),(112,'BROWNE REMOTE KIT ','BRM1 BROWN','WhatsApp Image 2023-07-14 at 6.21.18 PM.jpeg',550,550,0,'2023-07-14',2),(113,'BLACK REMOTE KIT','BRM1 BLACK','WhatsApp Image 2023-07-14 at 6.21.19 PM.jpeg',600,600,0,'2023-07-14',2),(114,'WHITE REMOTE KIT','BRM1 WHITE','WhatsApp Image 2023-07-14 at 6.21.18 PM (1).jpeg',700,700,0,'2023-07-14',2),(115,'ACCESSORIES','SMPS 3A','PHOTO-2022-07-28-16-52-16.JPG',490,490,0,'2023-07-14',2),(116,'ACCESSORIES','SMPS 5A','PHOTO-2022-07-27-18-35-07.JPG',590,590,0,'2023-07-14',2),(117,'ACCESSORIES','SMPS 7A','PHOTO-2022-04-13-11-55-57.JPG',790,790,0,'2023-07-14',2),(118,'ACCESSORIES','SMPS 10A','PHOTO-2022-04-13-11-55-58 2.JPG',890,890,0,'2023-07-14',2),(119,'DOOR BELL 12V DC','DB1','WhatsApp Image 2023-07-14 at 1.28.58 PM.jpeg',350,350,0,'2023-07-14',2),(120,'HOOTER FOR ACCESS CONTROL ANDF INTRUSION 12V DC','BHT','WhatsApp Image 2023-07-14 at 1.28.57 PM (1).jpeg',490,490,100,'2023-08-18',2),(121,'HOOTER FOR ACCESS CONTROL ANDF INTRUSION 12V DC','RHT','WhatsApp Image 2023-07-14 at 1.28.57 PM.jpeg',390,390,150,'2023-08-18',2),(122,'PROXIMITY TAG','PTAG1','WhatsApp Image 2023-07-14 at 5.15.00 PM.jpeg',10,10,6100,'2023-07-21',2),(123,'UHF ANTIDISMANTLE SOFT TAG','UZ41','PHOTO-2022-07-27-18-34-24.JPG',12,12,0,'2023-07-14',2),(124,'STROBE FOR FIRE ALARM','STROBE','PHOTO-2022-11-23-11-00-08.JPG',425,425,0,'2023-07-14',2),(125,'STRIKE LOCK LONG NO/NC','BS-132','WhatsApp Image 2023-07-14 at 1.29.00 PM (1).jpeg',1250,1250,121,'2023-08-16',2),(126,'EMLOCK 1200LBS DUAL LEAF NON FEEDBACK','EML1200D2','R.jpeg',4650,4650,0,'2023-07-14',2),(127,'EM LOCK 1200 LBS NON FEEDBACK','EML12002','download.jpeg',2350,2350,211,'2023-07-27',2),(128,'EM LOCK 1200 LBS  FEEDBACK','EML12005','download.jpeg',2550,2550,87,'2023-07-21',2),(129,'FLAP BARRIER SINGLE CORE','BFB01','OIP (1).jpeg',55500,55500,0,'2023-07-15',4),(130,'FLAP BARRIER DUAL CORE','BFB-02','OIP (2).jpeg',75000,75000,-345,'2023-07-15',4),(131,'SWING BARRIER SINGLE CORE','BSD-501','PHOTO-2022-07-28-16-52-19 4.JPG',85500,85500,0,'2023-07-15',4),(132,'SWING BARRIER DUAL CORE','BSD-502','PHOTO-2022-07-28-16-52-19 4.JPG',165000,165000,0,'2023-07-15',4),(133,'SLIDING BARRIER SINGLE CORE','BS-01','PHOTO-2022-07-28-16-52-19 5.JPG',165000,165000,-345,'2023-07-15',4),(134,'SLIDING BARRIER DUAL CORE','BS-02','PHOTO-2022-07-28-16-52-19 5.JPG',165000,165000,0,'2023-07-15',4),(135,'HIGH SPEED DC TOLL BARRIER','BM-DZC01-GL','WhatsApp Image 2023-07-15 at 11.19.02 AM (1).jpeg',68500,68500,0,'2023-07-15',4),(136,'FULL HEIGHT TURNSTILE','BFH-SW/DW','download.jpeg',168000,168000,0,'2023-07-15',4),(137,'TRIPOD TURNSTILE  SEMI AUTOMATIC MACHANISM',' BTP-01','PHOTO-2022-06-28-15-21-15.JPG',31500,31500,0,'2023-07-15',4),(138,'TRIPOD TURNSTILE SLEEK SEMI AUTOMATIC MACHANISM','BTP-02SL','PHOTO-2022-06-28-15-21-15.JPG',48500,48500,0,'2023-07-15',4),(139,'HIGH SPEED DC  BARRIER','BM-DZE2-BL/H','WhatsApp Image 2023-07-15 at 11.17.31 AM.jpeg',34500,34500,13,'2023-08-04',4),(140,'HYDRAULIC BOLLARD',' BOL-59S','OIP.jpeg',135000,135000,0,'2023-07-15',4),(141,'AC BOOM BARRIER',' BM-AZE1-BL','PHOTO-2022-07-28-16-52-19 7.JPG',30500,30500,62,'2023-08-04',4),(142,'DC BRUSHLESS BARRIER','BM-DZE1-BL','WhatsApp Image 2023-07-15 at 11.19.02 AM.jpeg',34500,34500,3,'2023-08-04',4),(143,'FENCE BOOM','FBA01','R.jpeg',20000,20000,0,'2023-07-15',4),(144,'UHF READER','RFID 105','PHOTO-2022-07-27-18-36-14.JPG',13500,13500,10,'2023-08-04',4),(145,'SWING TYPE BOOM MECHANISM','SWING TYPE BOOM MECHANISM','WhatsApp Image 2023-07-15 at 12.38.53 PM.jpeg',10000,10000,0,'2023-07-15',4),(146,'BEAM SENSOR',' PC101','PHOTO-2022-04-13-11-51-45.JPG',2760,2760,24,'2023-08-04',4),(147,'SINGLE LOOP DETECTOR','LD1','PHOTO-2022-04-13-11-55-53 2.JPG',2450,2450,0,'2023-07-15',4),(148,'DUAL LOOP DETECTOR','LD2','PHOTO-2022-04-13-11-55-53 2.JPG',3850,3850,0,'2023-07-15',4),(149,'DFMD 6 ZONE','BS-24/6','dfmd-walk-through-temperature-fever-detection-metal-detector-security-gate-500x500.jpg',30500,30500,3,'2023-08-04',4),(150,'DFMD 9 ZONE','BS-24/9','dfmd-walk-through-temperature-fever-detection-metal-detector-security-gate-500x500.jpg',35400,35400,11,'2023-08-04',4),(151,'DFMD SINGLE ZONE','BS-800/1','PHOTO-2022-07-28-16-52-19 6.JPG',21500,21500,2,'2023-08-04',4),(152,'DFMSD 18 ZONE','BS-800/18','PHOTO-2022-03-23-16-24-45.JPG',42500,42500,0,'2023-07-15',4),(153,'DFMD 6 ZONE','BS-800/6','PHOTO-2022-03-23-16-24-45.JPG',30500,30500,0,'2023-07-15',4),(154,'PROXIMITY THIN CARD','UZ44','proximity-thin-card-500x500.webp',9,8,98400,'2023-08-05',2),(155,'GLASS DOOR','TP-30AP','WhatsApp Image 2023-08-05 at 10.28.39 AM.jpeg',5900,5800,0,'2023-08-05',2),(156,'SMART FINGERPRINT LOCK','BR-60','WhatsApp Image 2023-08-05 at 10.28.38 AM.jpeg',8550,5450,46,'2023-08-05',2),(157,'DOUBLE FINGERPRINT RĪLŌ','BR-90','WhatsApp Image 2023-08-05 at 11.05.12 AM.jpeg',8650,8550,57,'2023-08-05',2),(158,'STANDALONE ACCESS CONTROL','BT-1202','PHOTO-2023-02-23-19-18-42.JPG',1200,1100,185,'2023-08-09',1),(159,'ACCESSORIES','BOLT LOCK YB-100','WhatsApp Image 2023-07-14 at 1.29.01 PM (1).jpeg',3000,3000,133,'2023-08-05',2),(160,'ACCESSORIES','PANIC SWITCH CALL','WhatsApp Image 2023-08-05 at 1.10.45 PM.jpeg',500,500,98,'2023-08-05',2),(161,'SMART GLASS DOOR LOCK','TP -20AP','WhatsApp Image 2023-08-05 at 1.14.15 PM.jpeg',6900,6900,3,'2023-08-05',2),(162,'HANDEL LOCK','618-AP','WhatsApp Image 2023-08-05 at 1.26.23 PM.jpeg',7000,7000,12,'2023-08-05',2),(163,'HANDLE LOCK','618W','WhatsApp Image 2023-08-05 at 1.49.20 PM.jpeg',8000,8000,55,'2023-08-05',2),(164,'RFID&KEY LOCK HOTEL LOCK','H-18','WhatsApp Image 2023-08-05 at 1.54.39 PM.jpeg',9000,9000,25,'2023-08-05',2),(165,'RFID&KEY LOCK HOTEL LOCK','H-36','WhatsApp Image 2023-08-05 at 1.58.06 PM.jpeg',9000,9000,21,'2023-08-05',2),(166,'ACCESSORIES','TP-32AP RIM LOCK','PHOTO-2023-04-27-11-03-10.JPG',10000,10000,54,'2023-08-05',2),(167,'SMART GLASS DOOR LOCK','BS-92','WhatsApp Image 2023-08-05 at 3.01.46 PM.jpeg',8000,8000,77,'2023-08-09',2),(168,'EMERGENCY PANIC SWITCH','EMERGENCY PANIC SWITCH','WhatsApp Image 2023-08-05 at 3.00.12 PM.jpeg',500,500,3650,'2023-08-05',2),(169,'HEND HELD METAL DETECTOR','MD-E1','WhatsApp Image 2023-08-05 at 3.08.07 PM.jpeg',5500,5500,26,'2023-08-05',4),(170,'HEND HELD METAL DETECTOR','MD-E2','WhatsApp Image 2023-08-05 at 3.10.38 PM.jpeg',6000,6000,49,'2023-08-05',4),(171,'KEY SWITCH','KEY SWITCH','WhatsApp Image 2023-08-05 at 3.07.03 PM.jpeg',1000,1000,490,'2023-08-05',2),(172,'RIM LOCK','(INTEGRATED BURGLAR PROOF & ALARM)','WhatsApp Image 2023-08-05 at 3.29.52 PM.jpeg',8000,8000,100,'2023-08-05',2),(173,'PP EM LOCK ','600 LBS','Em-Lock-600LBS-150x150.jpg',4000,4000,48,'2023-08-05',2),(174,'BIOMETRIC','BS-45 READER','PHOTO-2022-07-08-11-51-51.JPG',5000,5000,8,'2023-08-03',8),(175,'BIOMETRIC','BS-101W','C101-OEM.jpg',3500,3500,1186,'2023-08-18',8),(176,'BIOMETRIC ','BS-300','WhatsApp Image 2023-08-07 at 10.47.12 AM.jpeg',4000,4000,87,'2023-08-07',8),(177,'BIOMETRIC ','BS-400','WhatsApp Image 2023-08-07 at 10.58.47 AM.jpeg',5000,5000,5,'2023-08-07',8),(178,'ACCESSORIES','LONG RANGE READER','WhatsApp Image 2023-08-07 at 11.01.23 AM.jpeg',15000,15000,2,'2023-08-07',2),(179,'NVR(IVR)','NVR 16CH','PHOTO-2022-12-12-12-54-25 3.JPG',20000,20000,40,'2023-08-07',3),(180,'NVR(IVR)','NVR 36CH','PHOTO-2022-12-12-12-54-24 2.JPG',30000,30000,17,'2023-08-07',3),(181,'NVR(IVR)','NVR 64CH','PHOTO-2022-12-12-12-54-24 2.JPG',35000,35000,5,'2023-08-07',3),(182,'ENTERANCE ','PHOTO CELL','WhatsApp Image 2023-08-07 at 11.27.31 AM.jpeg',2000,2000,184,'2023-08-07',4),(183,'STANDALONE ACCESS CONTROL','C86','WhatsApp Image 2023-08-07 at 12.02.43 PM.jpeg',1000,1000,55,'2023-08-07',1),(184,'ACCESSORIES','MIFARE 4K CARD','WhatsApp Image 2023-07-14 at 5.30.07 PM.jpeg',15,15,10200,'2023-08-07',2),(185,'UHF READER','RFID115','PHOTO-2022-07-27-18-36-14.JPG',20000,20000,5,'2023-08-07',4),(186,'ADAPTOR','ADAPTOR 12V','WhatsApp Image 2023-08-07 at 12.35.40 PM.jpeg',1000,1000,160,'2023-08-07',2),(187,'BIOMETRIC','BS-X1','WhatsApp Image 2023-08-07 at 12.37.23 PM.jpeg',4000,4000,4,'2023-08-07',8),(188,'UHF READER','CF692EUI','PHOTO-2022-07-27-18-36-14.JPG',15000,15000,2,'2023-08-07',4),(189,'ACCESSORIES','MINI UPS','WhatsApp Image 2023-08-07 at 12.52.15 PM.jpeg',3000,3000,10,'2023-08-07',2),(190,'BIOMETRIC','C-103','WhatsApp Image 2023-08-07 at 12.54.38 PM.jpeg',4000,4000,60,'2023-08-07',8),(191,'POE SWITCH','(G0802GBM)','PHOTO-2022-12-24-12-27-43.JPG',20000,20000,10,'2023-08-07',3),(192,'POE SWITCH','(G2444GBM)','PHOTO-2022-12-24-12-29-07.JPG',30000,3000,5,'2023-08-07',3),(193,'POE SWITCH','(G1620GB)','PHOTO-2022-12-24-12-29-38.JPG',20000,20000,11,'2023-08-07',3),(194,'POE SWITCH','(BG822PESG)','PHOTO-2022-12-24-12-29-06.JPG',30000,30000,14,'2023-08-07',3),(195,'POE SWITCH','(B162PESG)FULL GIGA','PHOTO-2022-12-24-12-27-43.JPG',35000,35000,12,'2023-08-07',3),(196,'POE SWITCH','(BG24-2PESG)','PHOTO-2022-12-24-12-29-06.JPG',25000,25000,5,'2023-08-07',3),(197,'BIOMETRIC','BS-52(TS)','WhatsApp Image 2023-08-18 at 1.17.52 PM.jpeg',5000,5000,300,'2023-08-18',8),(198,'POE SWITCH','B8-2PEGS','PHOTO-2022-12-24-12-29-38.JPG',10000,10000,57,'2023-08-19',3),(199,'POE SWITCH','B16-2PEG','PHOTO-2022-12-24-12-29-38.JPG',15000,15000,22,'2023-08-19',3),(200,'POE SWITCH','B4-2PE','PHOTO-2022-12-24-12-29-38.JPG',12000,12000,55,'2023-08-19',3),(201,'POE SWITCH','B8-2PEG','PHOTO-2022-12-24-12-29-38.JPG',17000,17000,61,'2023-08-19',3),(202,'Hooter','CS-402(round hooter)','WhatsApp Image 2023-08-21 at 10.28.21 AM.jpeg',1700,1700,87,'2023-08-21',2),(203,'JWM TAG','JWM ','WhatsApp Image 2023-08-21 at 10.31.55 AM.jpeg',50,50,363,'2023-08-21',1),(204,'No TOUCH','SNT886','WhatsApp Image 2023-08-21 at 10.38.53 AM.jpeg',1500,1500,34,'2023-08-21',2),(205,'4G ROUTER','ROUTER','WhatsApp Image 2023-08-21 at 10.37.47 AM.jpeg',4000,4000,13,'2023-08-21',2),(206,'STANDALONE ACCESS CONTROL','A-60','WhatsApp Image 2023-08-21 at 10.48.23 AM.jpeg',2700,2700,40,'2023-08-21',1),(207,'NPR CAMERA','NPR CAMERA','WhatsApp Image 2023-08-21 at 10.51.59 AM.jpeg',25000,25000,4,'2023-08-21',4),(208,'EM LOCK 1200 LBS  ','CONCEALED','WhatsApp Image 2023-08-21 at 11.10.51 AM.jpeg',5000,5000,40,'2023-08-21',2),(209,'EM LOCK 800 LBS','EM 8002','PHOTO-2023-02-20-16-28-55.JPG',3000,3000,7,'2023-08-21',2),(210,'EM LOCK 600 LBS DUAL LEAF 12/24 V','EM 6002 12/24','R.jpeg',5000,5000,40,'2023-08-21',2),(211,'ACCESSORIES','DOOR SENSOR','PHOTO-2023-05-29-12-10-39.JPG',8000,8000,5,'2023-08-21',2),(212,'BOLT LOCK',' ALUMINIUM BRACKET FOR DOOR','WhatsApp Image 2023-08-21 at 11.53.57 AM.jpeg',1000,1000,21,'2023-08-21',2),(213,'BOLT LOCK','FAIL SECURE','WhatsApp Image 2023-08-21 at 11.53.57 AM (1).jpeg',4000,4000,47,'2023-08-21',2),(214,'BOLT LOCK','WITH KEY','WhatsApp Image 2023-08-21 at 11.53.56 AM.jpeg',5000,5000,18,'2023-08-21',2),(215,'STANDALONE ACCESS CONTROL','BKM12','WhatsApp Image 2023-08-21 at 11.58.16 AM.jpeg',4000,4000,2,'2023-08-21',1),(216,'BARRIER','SWITCH','WhatsApp Image 2023-08-21 at 12.05.37 PM.jpeg',4000,4000,134,'2023-08-21',4),(217,'EDR','EB-20','WhatsApp Image 2023-08-21 at 12.07.11 PM.jpeg',3000,3000,3,'2023-08-21',2),(218,'SECURICO','PANIC SWITCH','WhatsApp Image 2023-08-21 at 12.13.30 PM.jpeg',3000,3000,30,'2023-08-21',2);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `product` with 215 row(s)
--

--
-- Table structure for table `pro_category`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pro_category` (
  `P_Category_Id` int(11) NOT NULL AUTO_INCREMENT,
  `P_Category_Name` varchar(100) NOT NULL,
  `P_Category_Image` varchar(100) NOT NULL,
  PRIMARY KEY (`P_Category_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pro_category`
--

LOCK TABLES `pro_category` WRITE;
/*!40000 ALTER TABLE `pro_category` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `pro_category` VALUES (1,'Access Control','Access Control.PNG'),(2,'Accessories','Accessories.PNG'),(3,'CCTV Solution','CCTV Solution.PNG'),(4,'Entry Gate Automation','Entry Gate Automation.PNG'),(5,'Fire Alarm System','Fire Alarm System.PNG'),(6,'Home Automation','Home Automation.PNG'),(7,'Optical Fiber Solution','Optical Fiber Solution.PNG'),(8,'Time Attendance','Time Attendance.PNG');
/*!40000 ALTER TABLE `pro_category` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `pro_category` with 8 row(s)
--

--
-- Table structure for table `returnmode`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `returnmode` (
  `Returnmode_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Return_Mode` varchar(100) NOT NULL,
  PRIMARY KEY (`Returnmode_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `returnmode`
--

LOCK TABLES `returnmode` WRITE;
/*!40000 ALTER TABLE `returnmode` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `returnmode` VALUES (0,'False'),(1,'Applied For Return'),(2,'Return Approved'),(3,'Returned');
/*!40000 ALTER TABLE `returnmode` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `returnmode` with 4 row(s)
--

--
-- Table structure for table `returnstock`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `returnstock` (
  `Stock_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Stock_Quantity` int(11) NOT NULL,
  `Return_Date` varchar(50) NOT NULL,
  `Product_Id` int(11) NOT NULL,
  PRIMARY KEY (`Stock_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `returnstock`
--

LOCK TABLES `returnstock` WRITE;
/*!40000 ALTER TABLE `returnstock` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `returnstock` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `returnstock` with 0 row(s)
--

--
-- Table structure for table `stockreport`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stockreport` (
  `Stock_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Added_Quantity` int(11) NOT NULL,
  `Stock_Date` varchar(50) NOT NULL DEFAULT '',
  `Product_Id` int(11) NOT NULL,
  PRIMARY KEY (`Stock_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stockreport`
--

LOCK TABLES `stockreport` WRITE;
/*!40000 ALTER TABLE `stockreport` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `stockreport` VALUES (1,2820,'2023-07-21',77),(2,87,'2023-07-21',128),(3,111,'2023-07-27',101),(4,629,'2023-07-27',87),(5,211,'2023-07-27',127),(6,1831,'2023-07-21',18),(7,48900,'2023-07-21',105),(8,500,'2023-07-21',69),(9,37,'2023-07-21',95),(10,74,'2023-07-21',4),(11,991,'2023-07-21',85),(12,335,'2023-07-21',86),(13,6100,'2023-07-21',122),(14,200,'2023-07-21',108),(15,90,'2023-07-21',27),(16,273,'2023-07-21',66),(17,2421,'2023-07-21',67),(18,18,'2023-07-21',28),(19,25,'2023-07-21',27),(20,1831,'2023-07-21',5),(21,948,'2023-07-21',72),(22,100,'2023-07-21',68),(23,16,'2023-05-31',32),(24,8,'2023-05-31',174),(25,16,'2023-08-03',32),(26,8,'2023-08-03',174),(27,76,'2023-05-30',37),(28,121,'2023-05-31',33),(29,22,'2023-05-31',33),(30,2,'2023-05-31',29),(31,201,'2023-05-31',43),(32,84,'2023-05-31',44),(33,40,'2023-05-31',34),(34,118,'2023-05-31',38),(35,138,'2023-05-31',16),(36,38,'2023-05-31',175),(37,173,'2023-05-31',15),(38,90,'2023-05-31',29),(39,17,'2023-05-31',45),(40,16,'2023-05-31',41),(41,8,'2023-05-31',47),(42,81,'2023-05-31',36),(43,97,'2023-05-31',31),(44,63,'2023-05-31',30),(45,46,'2023-05-31',35),(46,10,'2023-05-31',40),(47,7,'2023-05-31',42),(48,29,'2023-05-31',10),(49,59,'2023-05-31',11),(50,66,'2023-08-03',3),(51,216,'2023-08-03',56),(52,3,'2023-05-03',79),(53,143,'2023-08-03',85),(54,4,'2023-08-03',91),(55,21,'2023-08-03',17),(56,15,'2023-08-03',59),(57,22,'2023-08-03',48),(58,662,'2023-08-03',49),(59,5,'2023-08-03',52),(60,556,'2023-08-03',55),(61,205,'2023-08-03',72),(62,205,'2023-08-03',76),(63,29,'2023-08-04',73),(64,48,'2023-08-04',72),(65,143,'2023-08-04',85),(66,1776,'2023-08-04',77),(67,92,'2023-08-04',90),(68,35000,'2023-08-04',104),(69,72,'2023-08-04',141),(70,13,'2023-08-04',139),(71,2,'2023-08-04',83),(72,3,'2023-08-04',142),(73,11,'2023-08-04',150),(74,3,'2023-08-04',149),(75,2,'2023-08-04',151),(76,24,'2023-08-04',146),(77,10,'2023-08-04',144),(78,287,'2023-08-03',91),(79,500,'2023-08-18',33),(80,1000,'2023-08-18',175),(81,27,'2023-08-07',81),(82,5,'2023-08-07',82),(83,2,'2023-08-07',65),(84,13,'2023-08-07',57),(85,94,'2023-08-07',8),(86,145,'2023-08-07',61),(87,68,'2023-08-07',60),(88,2,'2023-08-07',190),(89,120,'2023-08-07',9),(90,14,'2023-08-07',25),(91,30,'2023-08-07',58),(92,16,'2023-08-07',111),(93,45,'2023-08-07',107),(94,93,'2023-08-07',5),(95,70,'2023-08-09',51),(96,338,'2023-08-09',7),(97,108,'2023-08-09',5),(98,111,'2023-08-09',158),(99,15,'2023-08-09',49),(100,17,'2023-08-09',52),(101,93,'2023-08-07',5),(102,26,'2023-08-09',84),(103,214,'2023-08-09',78),(104,50,'2023-08-09',92),(105,92,'2023-08-09',95),(106,34,'2023-08-09',167),(107,82,'2023-08-16',88),(109,58,'2023-08-16',69),(110,121,'2023-08-16',125),(111,9,'2023-08-16',90),(112,100,'2023-08-18',120),(113,150,'2023-08-18',121),(114,20,'2023-08-18',42),(115,8,'2023-08-07',88);
/*!40000 ALTER TABLE `stockreport` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `stockreport` with 114 row(s)
--

--
-- Table structure for table `users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `User_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Company_Code` int(11) NOT NULL,
  `Active_Status` int(11) NOT NULL DEFAULT 0,
  `Username` varchar(50) NOT NULL,
  `User_Password` varchar(50) NOT NULL,
  `User_Phone` varchar(10) NOT NULL,
  `User_Email` varchar(100) NOT NULL,
  `User_Permission` varchar(500) NOT NULL,
  `Admin_Type` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`User_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `users` VALUES (1,1,1,'Enayat','123456','9289776303','enayat@bioroles.com','productCategoryproductordersbranchesreturnOrders',1),(2,1,1,'pradeep bisht','Pradeep@2243','9289776304','Accounts@bioroles.com','productCategoryproductordersbranchesreturnOrders',1),(3,1,1,'demo','demo','','','',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `users` with 3 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET AUTOCOMMIT=@OLD_AUTOCOMMIT */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Sun, 24 Sep 2023 12:46:01 +0200

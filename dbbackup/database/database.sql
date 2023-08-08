-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: ims
-- ------------------------------------------------------
-- Server version 	10.4.27-MariaDB
-- Date: Tue, 08 Aug 2023 12:46:49 +0200

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch`
--

LOCK TABLES `branch` WRITE;
/*!40000 ALTER TABLE `branch` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `branch` VALUES (3,'ewf','6578597786','tuhnisg@gmail.com','ewf',1),(4,'new bran','7657658585','new@gmail.com','new',1);
/*!40000 ALTER TABLE `branch` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `branch` with 2 row(s)
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
  `Company_Name` varchar(100) NOT NULL,
  `Company_Phone` varchar(10) NOT NULL,
  `Company_Email` varchar(50) NOT NULL,
  `Company_Address` varchar(300) NOT NULL,
  `Company_Username` varchar(25) NOT NULL,
  `Company_Password` varchar(100) NOT NULL,
  `Company_GST` varchar(25) DEFAULT '',
  `Company_PAN` varchar(15) DEFAULT '',
  `Company_TAN` varchar(15) DEFAULT '',
  `Company_Licence` varchar(15) DEFAULT '',
  `Company_Registration` varchar(25) DEFAULT '',
  PRIMARY KEY (`Company_Id`),
  UNIQUE KEY `Company_Username` (`Company_Username`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `company` VALUES (1,1,1,1,1,1,'Bioroles','1141069993','info@bioroles.com','Okhla','bioroles','bioroles','','','','',''),(2,14,2,1,1,2,'tre','7653468976','tre@gmail.com','delhi','tre','tre','','','','',''),(3,14,2,0,1,3,'sts','9899299993','sushil@stsinfo.com','b78','sushil','sushil','','','','',''),(9,2,2,1,1,4,'pramod','9991969489','pramod52jpr@gmail.com','palwal','pramod','pramod','','','','','');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `company` with 4 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  `sale_prize` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `delivery_mode` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  `cart_no` int(11) NOT NULL DEFAULT 0,
  `Order_Date` varchar(100) NOT NULL,
  `Delivery_Date` varchar(100) DEFAULT '',
  `Order_Pieces` int(11) NOT NULL,
  `Sale_Price` int(11) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `orders` VALUES (16,8072431,'2023-08-08','',12,43,43,0,1,2,2,'This Item is currently out of Stock',0,'',0,0,0,'',''),(17,8072431,'2023-08-08','',132,32,32,0,1,3,2,'This Item is currently out of Stock',1,'',0,0,0,'',''),(18,335628,'2023-08-08','',1,23,23,0,1,1,2,'This Item is currently out of Stock',0,'',0,0,0,'',''),(19,335628,'2023-08-08','2023-08-08',165,32,32,1,4,3,2,'This Item is currently out of Stock',1,'23434',0,0,0,'',''),(20,2392644,'2023-08-08','',1345,345,345,0,1,3,2,'This Item is currently out of Stock',0,'',0,0,0,'',''),(21,2392644,'2023-08-08','',1234,234,234,0,1,1,2,'This Item is currently out of Stock',0,'',0,0,0,'',''),(22,3951823,'2023-08-08','',132,34,34,0,1,4,9,'This Item is currently out of Stock',0,'',0,0,0,'',''),(23,3951823,'2023-08-08','',13,32,32,0,1,2,9,'This Item is currently out of Stock',0,'',0,0,0,'','');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `orders` with 8 row(s)
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
INSERT INTO `orderstatus` VALUES (1,'Pending'),(2,'Billing Processing'),(3,'Intransit'),(4,'Delievered'),(5,'Cancelled');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `product` VALUES (1,'pehla','6576576576','Biometric-Attendence-Solution.png',250,170,562,'2023-05-01',5),(2,'disra','8772489356','WhatsApp Image 2023-03-24 at 2.37.47 AM.jpeg',345,654,270,'2023-05-08',5),(3,'teesra pro','54646','youtube-logo-hd-8.png',567,344,-165,'2023-06-07',5),(4,'disra','435353','WhatsApp Image 2023-03-24 at 2.38.27 AM (1).jpeg',5345,5345,454,'2023-05-02',5),(5,'rdgsr','4t354','WhatsApp Image 2023-03-24 at 2.38.28 AM (2).jpeg',3454,345,0,'2023-05-02',5),(6,'dswbtrntyu','43534543','pict--circular-motion-arrows-vector-clipart-library-removebg-preview.png',345,7644,54,'2023-05-05',5),(7,'teesra pro','34523453','slider2.jpeg',342,45,143,'2023-07-31',5),(8,'naya product','56456453','WhatsApp_Image_2023-03-24_at_2.39.57_AM-removebg-preview.png',345,234,244,'2023-06-06',9);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `product` with 8 row(s)
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
INSERT INTO `pro_category` VALUES (4,'Biometric Attendance Solution','Biometric-Attendence-Solution.png'),(5,'Biometric Accessories','accessories.png'),(6,'kendra','pict--circular-motion-arrows-vector-clipart-library-removebg-preview.png'),(7,'new cat','abstract-blue-background-with-wavy-curves-free-vector (1).png'),(8,'dw','WhatsApp_Image_2023-03-24_at_2.39.57_AM-removebg-preview.png'),(9,'new categoy','abstract-blue-background-with-wavy-curves-free-vector (1).png');
/*!40000 ALTER TABLE `pro_category` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `pro_category` with 6 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `returnstock`
--

LOCK TABLES `returnstock` WRITE;
/*!40000 ALTER TABLE `returnstock` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `returnstock` VALUES (1,56,'2023-05-29',1),(2,67,'2023-06-01',1);
/*!40000 ALTER TABLE `returnstock` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `returnstock` with 2 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stockreport`
--

LOCK TABLES `stockreport` WRITE;
/*!40000 ALTER TABLE `stockreport` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `stockreport` VALUES (1,55,'2023-05-01',1),(2,567,'2023-05-02',1),(3,56,'2023-05-08',2),(4,100,'2023-06-03',3),(5,122,'2023-06-06',8),(6,122,'2023-06-06',8),(7,122,'2023-06-06',8),(8,56,'2023-06-07',3),(9,67,'2023-07-31',7);
/*!40000 ALTER TABLE `stockreport` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `stockreport` with 9 row(s)
--

--
-- Table structure for table `users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `User_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Company_Code` int(11) NOT NULL,
  `Active_Status` int(11) NOT NULL DEFAULT 1,
  `Username` varchar(50) NOT NULL,
  `User_Password` varchar(50) NOT NULL,
  `User_Phone` varchar(10) NOT NULL,
  `User_Email` varchar(100) NOT NULL,
  `User_Permission` varchar(500) NOT NULL,
  `Admin_Type` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`User_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `users` VALUES (2,1,1,'demo','demo','2147483647','demo@gmail.com','ordersreturnOrders',1),(14,1,1,'Pradeep','pradeep','8276785765','pradeep@bioroles.com','productorders',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `users` with 2 row(s)
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

-- Dump completed on: Tue, 08 Aug 2023 12:46:49 +0200

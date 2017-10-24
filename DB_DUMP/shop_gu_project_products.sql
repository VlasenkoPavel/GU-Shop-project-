CREATE DATABASE  IF NOT EXISTS `shop_gu_project` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `shop_gu_project`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: shop_gu_project
-- ------------------------------------------------------
-- Server version	5.7.18-log

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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_bin NOT NULL,
  `type_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` tinyint(2) DEFAULT NULL,
  `feature` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_type_idx` (`type_id`),
  KEY `fk_product_brand_idx` (`brand_id`),
  KEY `fk_product_category_idx` (`category_id`),
  CONSTRAINT `fk_product_brand` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `categoryes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_product_type` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'belted coat',1,1,1,1200.00,NULL,NULL),(2,'belted trench coat',1,2,1,1500.00,NULL,NULL),(3,'checked double layer coat',1,3,1,1000.00,NULL,NULL),(4,'double breasted robe',1,4,1,1350.00,NULL,NULL),(5,'double breasted robe',1,5,1,900.00,NULL,NULL),(6,'long glitter coat',1,2,1,750.00,NULL,NULL),(7,'oversized coat',1,3,1,1400.00,NULL,NULL),(8,'principe de galles coat',1,4,1,800.00,NULL,NULL),(9,'bi-material denim jacket',4,1,2,900.00,NULL,NULL),(10,'brocade dinner jacket',4,2,2,700.00,NULL,NULL),(11,'classic collar plaid bomber',4,3,2,850.00,NULL,NULL),(12,'contrast padded jacket',4,3,2,600.00,NULL,NULL),(13,'denim jacket',4,4,2,750.00,NULL,NULL),(14,'distressed denim jacket',4,2,2,800.00,NULL,NULL),(15,'oversized hooded bomber jacket',4,3,2,900.00,NULL,NULL),(16,'padded jacket',4,1,2,800.00,NULL,NULL),(17,'paisley print denim jacket',4,4,2,650.00,NULL,NULL),(18,'printed bomber jacket',4,2,2,875.00,NULL,NULL),(19,'ribbed trim flight jacket',4,3,2,700.00,NULL,NULL),(20,'wet look padded jacket',4,2,2,830.00,NULL,NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-24 17:49:41

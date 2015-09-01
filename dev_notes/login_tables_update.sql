-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: faithwraps
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `oauth_types`
--

DROP TABLE IF EXISTS `oauth_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_types`
--

LOCK TABLES `oauth_types` WRITE;
/*!40000 ALTER TABLE `oauth_types` DISABLE KEYS */;
INSERT INTO `oauth_types` VALUES (1,'google'),(2,'facebook');
/*!40000 ALTER TABLE `oauth_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_users`
--

DROP TABLE IF EXISTS `oauth_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `verified_email` enum('0','1') DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `oauth_id` varchar(45) DEFAULT NULL,
  `oauth_type_id` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_users`
--

LOCK TABLES `oauth_users` WRITE;
/*!40000 ALTER TABLE `oauth_users` DISABLE KEYS */;
INSERT INTO `oauth_users` VALUES (3,NULL,'andrew.a.lee@gmail.com','1','Andrew','Lee','https://lh6.googleusercontent.com/-ibj8fdGK97I/AAAAAAAAAAI/AAAAAAAABUs/uHXyfRZyjfw/photo.jpg','100456593567481012590',1,'2015-09-01 04:19:05',NULL);
/*!40000 ALTER TABLE `oauth_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '1',
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `ip` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `product_last_viewed` int(11) NOT NULL DEFAULT '0',
  `is_confirmed` enum('0','1') COLLATE latin1_general_ci DEFAULT '0',
  `confirmation_code` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email` (`email`),
  UNIQUE KEY `confirmation_code_UNIQUE` (`confirmation_code`),
  FULLTEXT KEY `idx_search` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (73,'Deborah','Peterson','deborah.peterson@live.com',1,'3dd75cc3798bf1c332e5e660e693e29ecebb290d3344a70f9','66.215.169.254',0,'0',NULL,'2015-08-31 20:08:58',NULL),(1,'Nate','Brady','faithwraps@yahoo.com',5,'6ac8610f64c7f586b5c9ba9bbb0fb039d87fb680a7310c1b9','127.0.0.1',0,'0',NULL,'2015-08-31 20:08:58',NULL),(69,'Denise','Benoit','dennybenny@comcast.net',1,'4ed0a1f60e90c7a08434067cbd56d9352e6428fe6ade30897','50.131.179.233',0,'0',NULL,'2015-08-31 20:08:58',NULL),(70,'Rene ','Benoit','poetbeau@aol.com',1,'e9555284346466e637ea214e7aec7492474b38fc9cfda387f','24.147.145.37',0,'0',NULL,'2015-08-31 20:08:58',NULL),(65,'Faith','Benoit','faithbenoit@aol.com',5,'6cba48172d3774bebce3e6221e457f931d84a593c64f9afca','76.172.65.176',0,'0',NULL,'2015-08-31 20:08:58',NULL),(67,'Francisco','Kiniklis','fkiniklis@gmail.com',1,'6f07c0dcd99441085f441fb8a3340baabfe65d64743758820','75.131.200.41',0,'0',NULL,'2015-08-31 20:08:58',NULL),(84,'Rebecca','Greene','becky138@aol.com',1,'e66dcaf82dad29a7ff6b3aefdba2b35f0570d58f5d965c941','50.136.41.38',0,'0',NULL,'2015-08-31 20:08:58',NULL),(83,'','','sazoo1114@aol.com',1,'4bfe7616d389c8061bd961b1f4aca2868b0a6022084964320','76.95.221.95',0,'0',NULL,'2015-08-31 20:08:58',NULL),(74,'Tara','Girouard','reikigal21@aol.com',1,'5da69b43f8452f20a453073b0b8aa388f6dc0414c3703a7a2','69.126.123.231',0,'0',NULL,'2015-08-31 20:08:58',NULL),(75,'Pamela','Hutchinson','pamela.spirlet@gmail.com',1,'be1641b6b9048836eafa5f0d0d5f241d9c148d6a0d89efb53','76.19.201.174',0,'0',NULL,'2015-08-31 20:08:58',NULL),(76,'Maggie','Laing','maggielaing@gmail.com',1,'1c745ac2d10857fbf52ddedb13f8e9eb4bc2b3185e3687316','98.226.45.119',0,'0',NULL,'2015-08-31 20:08:58',NULL),(77,'Erin','DeSousa','americansoldier121@yahoo.com',1,'7e98dffd13e54fb3abef18a3820f42a69718d8d5467962980','107.3.201.67',0,'0',NULL,'2015-08-31 20:08:58',NULL),(79,'Gail','Borges','borgesrabgab@comcast.net',1,'e954ded3104612cb62e34e62678888b98f9bd8ed53515f5bf','76.118.113.8',0,'0',NULL,'2015-08-31 20:08:58',NULL),(80,'Brent','Kopenhaver Jr','bkopenhaver@yahoo.com',1,'c227acae0a0c302e22d83f7a7a9fbe3009206439fd4d0d814','216.165.126.25',0,'0',NULL,'2015-08-31 20:08:58',NULL),(81,'test','test','test3@aol.com',1,'059f2c96b0288c3cb2c1bf2b585b7ce10f02bf33ee38a0ec0','76.172.65.176',0,'0',NULL,'2015-08-31 20:08:58',NULL),(82,'Leah','Isabelle','leahisabelle@comcast.net',1,'8742fca0968e4919689812ce909a81113b7758c81682b1d94','76.118.114.67',0,'0',NULL,'2015-08-31 20:08:58',NULL),(85,'Miguel','De Jesus','migueldej@gmail.com',1,'c1036afc13d0722082816a72c257f52a9034d0c92af4540b9','108.41.19.182',0,'0',NULL,'2015-08-31 20:08:58',NULL),(86,'','','jlclark13@gmail.com',1,'1e7c4344ddc5f0915108bb8e3693ced21c9027d9fbc6987ac','67.248.247.137',0,'0',NULL,'2015-08-31 20:08:58',NULL),(87,'Lynne  ','Freitas','laf55@aol.com',1,'d823f8a85fd1fc08d0c04eef1d63e963895ef8b12053b2e95','74.92.51.18',0,'0',NULL,'2015-08-31 20:08:58',NULL),(88,'Caitlyn ','Freitas','katiebfreitas@gmail.com',1,'facf599b8ae93828d8f04abf7b130b113565e2b1f13d73af0','24.126.105.203',0,'0',NULL,'2015-08-31 20:08:58',NULL),(89,'Tracy','Grant','zzbet@aol.com',1,'0053fdc11c202fb8224b05d4862365e8008a113f8dd42c665','24.63.139.162',0,'0',NULL,'2015-08-31 20:08:58',NULL),(90,'','','testuser@aol.com',1,'f791a73b3f1224187d8ca4b38ad0bb281cf8c0abb6b33b7e0','100.32.188.99',0,'0',NULL,'2015-08-31 20:08:58',NULL),(91,'luciana','martinez','estilucy900@yahoo.com',1,'4d627f9f14147e2dd38605de52e5a03621e6457d077a542cf','172.56.39.50',0,'0',NULL,'2015-08-31 20:08:58',NULL),(101,NULL,NULL,'test@test.com',1,'$2y$10$vBgWNWgyeJwQueLrSyYGwel1pXMVgC1rInwSlNbNqZwbDcc9MoA3a','',0,'0','ed68b2a4bbf846057a86043dae7bfdb1','2015-09-01 04:38:51',NULL);
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

-- Dump completed on 2015-08-31 22:15:53

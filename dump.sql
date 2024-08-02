-- MySQL dump 10.13  Distrib 8.3.0, for macos14.2 (arm64)
--
-- Host: localhost    Database: todo_app
-- ------------------------------------------------------
-- Server version	8.3.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `todos`
--

DROP TABLE IF EXISTS `todos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `todos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `text` text,
  `status` tinyint(1) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `todos`
--

LOCK TABLES `todos` WRITE;
/*!40000 ALTER TABLE `todos` DISABLE KEYS */;
INSERT INTO `todos` VALUES (208,'Phyton Vs PHP | Who wins?',1,35),(210,'ochirish -------------------------------------------------------------------------->',0,35),(211,'Python wins',1,35),(214,'PHP wins',0,3),(215,'PHP wins',0,35),(216,'PHP Forewer',1,35),(217,'PHP Forewer',1,3),(221,'asdf',1,3),(222,'Test',0,3),(224,'Bekzodaka',1,3);
/*!40000 ALTER TABLE `todos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `chat_id` int DEFAULT NULL,
  `status` text,
  `created_at` datetime DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_pk` (`chat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,262247413,NULL,'2024-07-26 22:56:52',NULL,NULL),(14,1578982344,NULL,'2024-07-22 19:59:18',NULL,NULL),(15,1202500985,NULL,'2024-07-22 19:59:11',NULL,NULL),(16,1487755257,NULL,'2024-07-22 19:56:02',NULL,NULL),(17,1746546661,NULL,'2024-07-22 19:56:21',NULL,NULL),(18,791952688,NULL,'2024-07-22 19:56:28',NULL,NULL),(20,2015894982,NULL,'2024-07-22 19:58:44',NULL,NULL),(21,863518385,'add','2024-07-22 19:56:51',NULL,NULL),(24,1818683343,NULL,'2024-07-22 20:01:26',NULL,NULL),(26,1015339329,NULL,'2024-07-22 19:58:43',NULL,NULL),(28,939524628,NULL,'2024-07-22 19:58:56',NULL,NULL),(29,1752436700,NULL,'2024-07-22 19:59:09',NULL,NULL),(33,1654124831,NULL,'2024-07-22 19:59:41',NULL,NULL),(34,931026030,NULL,'2024-07-22 20:00:05',NULL,NULL),(35,1730258303,NULL,'2024-07-22 20:00:23',NULL,NULL),(40,NULL,NULL,NULL,NULL,NULL),(41,NULL,NULL,NULL,'universal@mail.com','123'),(42,NULL,NULL,NULL,'universal@mail.com','123'),(43,NULL,NULL,NULL,'universal@mail.com','123'),(44,NULL,NULL,NULL,'universal@mail.com','123'),(45,NULL,NULL,NULL,'universal@mail.com','123'),(46,NULL,NULL,NULL,'universal@mail.com','123'),(47,NULL,NULL,NULL,'universal@mail.com','123'),(48,NULL,NULL,NULL,'universal@mail.com','123'),(49,NULL,NULL,NULL,'universal@mail.com','123'),(50,NULL,NULL,NULL,'nasriddin@aka.com',''),(51,NULL,NULL,NULL,'universal@mail.com','123'),(52,NULL,NULL,NULL,'azizbek@cool.com','123'),(53,NULL,NULL,NULL,'sob1@dev.com','123'),(54,NULL,NULL,NULL,'shohjahon@super.com','123'),(55,NULL,NULL,NULL,'nasriddin@super.com','123'),(56,NULL,NULL,NULL,'nasriddin2@super.com','123'),(57,NULL,NULL,NULL,'obidjon@teacher.com','123'),(58,NULL,NULL,NULL,'so1@dev.com','123'),(59,NULL,NULL,NULL,'so2@dev.com','123'),(60,NULL,NULL,NULL,'azizbek@dev.com','123'),(61,NULL,NULL,NULL,'azizbek@aka.com','123'),(62,NULL,NULL,NULL,'nasriddin@bro.com','123'),(63,NULL,NULL,NULL,'12universal@mail.com','123');
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

-- Dump completed on 2024-08-02 21:03:48

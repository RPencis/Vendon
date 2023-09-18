CREATE DATABASE  IF NOT EXISTS `vendon` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `vendon`;
-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: vendon
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

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
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) NOT NULL,
  `correct` tinyint(1) NOT NULL DEFAULT 0,
  `question_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`),
  CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (1,'Personal Home Page',0,1),(2,'Hypertext Preprocessor',1,1),(3,'Preprocessed Hypertext',0,1),(4,'mysqli_connect',1,2),(5,'mysql_connect',0,2),(6,'pdo_connect',0,2),(7,'session_create()',0,3),(8,'session_begin(0',0,3),(9,'session_start()',1,3),(10,'.',1,4),(11,'+',0,4),(12,',',0,4),(13,'/* This is a comment */',0,5),(14,'// This is a comment',1,5),(15,'<!-- This is a comment -->',0,5),(16,'read_file()',0,6),(17,'readfile()',1,6),(18,'file_read()',0,6),(19,'define(\"CONSTANT_NAME\", \"value\");',1,7),(20,'constant(\"CONSTANT_NAME\", \"value\");',0,7),(21,'CONST CONSTANT_NAME = \"value\";',0,7),(22,'$',1,8),(23,'%',0,8),(24,'#',0,8),(25,'.example',1,9),(26,'#example',0,9),(27,'$example',0,9),(28,'show()',0,10),(29,'display()',0,10),(30,'hide()',1,10),(31,'$(\"#myButton\").on(\"click\", function() {})',0,11),(32,'$(\"#myButton\").click(function() {})',1,11),(33,'$(\"#myButton\").addEvent(\"click\", function() {})',0,11),(34,'text()',1,12),(35,'content()',0,12),(36,'innerHTML()',0,12),(37,'INSERT INTO',1,13),(38,'ADD INTO',0,13),(39,'UPDATE',0,13),(40,'MAX()',1,14),(41,'HIGHEST()',0,14),(42,'TOP()',0,14),(43,'SELECT ALL FROM users',0,15),(44,'SELECT * FROM user',1,15),(45,'SELECT FROM users',0,15);
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` longtext NOT NULL,
  `test_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `test_id` (`test_id`),
  CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'What does PHP stand for?',1),(2,'Which PHP function is used to establish a database connection?',1),(3,'In PHP, how do you start a session?',1),(4,'Which operator is used for concatenation in PHP?',1),(5,'How do you comment a single line in PHP?',1),(6,'Which function is used to read a file in PHP?',1),(7,'What is the correct way to declare a constant in PHP?',1),(8,'Which symbol is used as a shortcut for jQuery in code?',2),(9,'How do you select an element with the class \"example\" in jQuery?',2),(10,'Which jQuery method is used to hide an element?',2),(11,'How do you attach a click event to an HTML element with the id \"myButton\" in jQuery?',2),(12,'Which jQuery method is used to set content to an HTML element?',2),(13,'Which statement is used to insert new data into a MySQL database?',3),(14,'Which SQL function is used to find the highest value in a column?',3),(15,'How do you select all records from a table named \"users\" in MySQL?',3);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tests`
--

DROP TABLE IF EXISTS `tests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tests`
--

LOCK TABLES `tests` WRITE;
/*!40000 ALTER TABLE `tests` DISABLE KEYS */;
INSERT INTO `tests` VALUES (1,'PHP Quiz','2023-09-18 22:53:15'),(2,'jQuery Quiz','2023-09-18 22:53:15'),(3,'MySQL Quiz','2023-09-18 22:53:15');
/*!40000 ALTER TABLE `tests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `useranswers`
--

DROP TABLE IF EXISTS `useranswers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `useranswers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`),
  KEY `answer_id` (`answer_id`),
  KEY `user_id` (`user_id`),
  KEY `test_user` (`test_id`,`user_id`),
  CONSTRAINT `useranswers_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `useranswers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `useranswers_ibfk_3` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `useranswers_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `useranswers`
--

LOCK TABLES `useranswers` WRITE;
/*!40000 ALTER TABLE `useranswers` DISABLE KEYS */;
INSERT INTO `useranswers` VALUES (1,1,1,1,1),(2,1,1,2,5),(3,1,1,3,9),(4,1,1,4,11),(5,1,1,5,14),(6,1,1,6,18),(7,1,1,7,20),(8,2,2,8,22),(9,2,2,9,25),(10,2,2,10,30),(11,2,2,11,31),(12,2,2,12,34),(13,3,3,13,37),(14,3,3,14,40),(15,3,3,15,44);
/*!40000 ALTER TABLE `useranswers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Roberts Pencis','2023-09-18 23:10:11'),(2,'Roberts Pencis','2023-09-18 23:11:29'),(3,'Roberts Pencis','2023-09-18 23:11:52');
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

-- Dump completed on 2023-09-18 23:17:57

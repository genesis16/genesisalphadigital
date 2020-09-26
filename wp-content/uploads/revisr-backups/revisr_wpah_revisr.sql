
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
DROP TABLE IF EXISTS `wpah_revisr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wpah_revisr` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(42) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=192 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wpah_revisr` WRITE;
/*!40000 ALTER TABLE `wpah_revisr` DISABLE KEYS */;
INSERT INTO `wpah_revisr` VALUES (1,'2020-07-15 05:54:54','Successfully created a new repository.','init','rdoRp9HioP'),(2,'2020-07-15 05:58:35','Successfully pushed 1 commit to origin/master.','push','rdoRp9HioP'),(3,'2020-07-15 05:59:35','Successfully backed up the database.','backup','rdoRp9HioP'),(4,'2020-07-15 05:59:35','Error staging files.','error','rdoRp9HioP'),(5,'2020-07-15 05:59:35','There was an error committing the changes to the local repository.','error','rdoRp9HioP'),(6,'2020-07-15 06:09:05','Error staging files.','error','rdoRp9HioP'),(7,'2020-07-15 06:09:05','There was an error committing the changes to the local repository.','error','rdoRp9HioP'),(8,'2020-07-15 06:09:31','Error staging files.','error','Revisr Bot'),(9,'2020-07-15 06:09:45','Successfully backed up the database.','backup','Revisr Bot'),(10,'2020-07-15 06:10:09','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(11,'2020-07-15 06:10:09','The daily backup was successful.','backup','Revisr Bot'),(12,'2020-07-15 06:12:46','Error pushing changes to the remote repository.','error','rdoRp9HioP'),(13,'2020-07-15 06:13:17','Error pushing changes to the remote repository.','error','rdoRp9HioP'),(14,'2020-07-16 01:34:00','There was an error committing the changes to the local repository.','error','rdoRp9HioP'),(15,'2020-07-31 11:11:28','Committed <a href=\"https://alphaomegadigital.com.au/wp-admin/admin.php?page=revisr_view_commit&commit=a90bf85&success=true\">#a90bf85</a> to the local repository.','commit','rdoRp9HioP'),(16,'2020-07-31 11:11:28','Error pushing changes to the remote repository.','error','rdoRp9HioP'),(17,'2020-07-31 11:16:12','Successfully pushed 36 commits to origin/master.','push','rdoRp9HioP'),(18,'2020-07-31 11:16:50','Committed <a href=\"https://alphaomegadigital.com.au/wp-admin/admin.php?page=revisr_view_commit&commit=35c5894&success=true\">#35c5894</a> to the local repository.','commit','rdoRp9HioP'),(19,'2020-07-31 11:16:59','Successfully pushed 1 commit to origin/master.','push','rdoRp9HioP'),(20,'2020-08-01 08:30:38','Successfully backed up the database.','backup','Revisr Bot'),(21,'2020-08-01 08:30:46','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(22,'2020-08-01 08:30:46','The daily backup was successful.','backup','Revisr Bot'),(23,'2020-08-02 09:39:30','Successfully backed up the database.','backup','Revisr Bot'),(24,'2020-08-02 09:39:38','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(25,'2020-08-02 09:39:38','The daily backup was successful.','backup','Revisr Bot'),(26,'2020-08-03 05:57:51','Successfully backed up the database.','backup','Revisr Bot'),(27,'2020-08-03 05:58:01','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(28,'2020-08-03 05:58:01','The daily backup was successful.','backup','Revisr Bot'),(29,'2020-08-04 06:39:12','Successfully backed up the database.','backup','Revisr Bot'),(30,'2020-08-04 06:39:20','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(31,'2020-08-04 06:39:20','The daily backup was successful.','backup','Revisr Bot'),(32,'2020-08-05 05:57:39','Error staging files.','error','rdoRp9HioP'),(33,'2020-08-05 05:57:39','There was an error committing the changes to the local repository.','error','rdoRp9HioP'),(34,'2020-08-05 05:57:50','Error staging files.','error','rdoRp9HioP'),(35,'2020-08-05 05:57:50','There was an error committing the changes to the local repository.','error','rdoRp9HioP'),(36,'2020-08-05 05:59:15','Successfully pushed 0 commits to origin/master.','push','rdoRp9HioP'),(37,'2020-08-05 05:59:19','Error staging files.','error','Revisr Bot'),(38,'2020-08-05 05:59:32','Successfully backed up the database.','backup','Revisr Bot'),(39,'2020-08-05 05:59:43','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(40,'2020-08-05 05:59:43','The daily backup was successful.','backup','Revisr Bot'),(41,'2020-08-05 05:59:53','Committed <a href=\"https://alphaomegadigital.com.au/wp-admin/admin.php?page=revisr_view_commit&commit=01d2090&success=true\">#01d2090</a> to the local repository.','commit','rdoRp9HioP'),(42,'2020-08-05 06:00:37','Successfully pushed 1 commit to origin/master.','push','rdoRp9HioP'),(43,'2020-08-06 06:03:32','Successfully backed up the database.','backup','Revisr Bot'),(44,'2020-08-06 06:03:41','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(45,'2020-08-06 06:03:41','The daily backup was successful.','backup','Revisr Bot'),(46,'2020-08-07 07:17:16','Successfully backed up the database.','backup','Revisr Bot'),(47,'2020-08-07 07:17:25','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(48,'2020-08-07 07:17:25','The daily backup was successful.','backup','Revisr Bot'),(49,'2020-08-08 06:01:04','Successfully backed up the database.','backup','Revisr Bot'),(50,'2020-08-08 06:01:14','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(51,'2020-08-08 06:01:14','The daily backup was successful.','backup','Revisr Bot'),(52,'2020-08-09 09:27:07','Successfully backed up the database.','backup','Revisr Bot'),(53,'2020-08-09 09:27:15','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(54,'2020-08-09 09:27:15','The daily backup was successful.','backup','Revisr Bot'),(55,'2020-08-10 06:12:05','Successfully backed up the database.','backup','Revisr Bot'),(56,'2020-08-10 06:12:13','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(57,'2020-08-10 06:12:13','The daily backup was successful.','backup','Revisr Bot'),(58,'2020-08-11 07:51:00','Successfully backed up the database.','backup','Revisr Bot'),(59,'2020-08-11 07:51:08','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(60,'2020-08-11 07:51:08','The daily backup was successful.','backup','Revisr Bot'),(61,'2020-08-12 06:49:09','Successfully backed up the database.','backup','Revisr Bot'),(62,'2020-08-12 06:49:16','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(63,'2020-08-12 06:49:16','The daily backup was successful.','backup','Revisr Bot'),(64,'2020-08-13 06:07:19','Successfully backed up the database.','backup','Revisr Bot'),(65,'2020-08-13 06:07:27','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(66,'2020-08-13 06:07:27','The daily backup was successful.','backup','Revisr Bot'),(67,'2020-08-14 06:12:39','Successfully backed up the database.','backup','Revisr Bot'),(68,'2020-08-14 06:12:47','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(69,'2020-08-14 06:12:47','The daily backup was successful.','backup','Revisr Bot'),(70,'2020-08-15 06:14:21','Successfully backed up the database.','backup','Revisr Bot'),(71,'2020-08-15 06:14:31','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(72,'2020-08-15 06:14:31','The daily backup was successful.','backup','Revisr Bot'),(73,'2020-08-16 06:00:20','Successfully backed up the database.','backup','Revisr Bot'),(74,'2020-08-16 06:00:28','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(75,'2020-08-16 06:00:28','The daily backup was successful.','backup','Revisr Bot'),(76,'2020-08-17 06:04:15','Successfully backed up the database.','backup','Revisr Bot'),(77,'2020-08-17 06:04:23','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(78,'2020-08-17 06:04:23','The daily backup was successful.','backup','Revisr Bot'),(79,'2020-08-18 07:12:31','Successfully backed up the database.','backup','Revisr Bot'),(80,'2020-08-18 07:12:39','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(81,'2020-08-18 07:12:39','The daily backup was successful.','backup','Revisr Bot'),(82,'2020-08-19 06:28:47','Successfully backed up the database.','backup','Revisr Bot'),(83,'2020-08-19 06:28:54','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(84,'2020-08-19 06:28:54','The daily backup was successful.','backup','Revisr Bot'),(85,'2020-08-20 06:06:33','Successfully backed up the database.','backup','Revisr Bot'),(86,'2020-08-20 06:06:41','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(87,'2020-08-20 06:06:41','The daily backup was successful.','backup','Revisr Bot'),(88,'2020-08-21 07:06:06','Successfully backed up the database.','backup','Revisr Bot'),(89,'2020-08-21 07:06:14','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(90,'2020-08-21 07:06:14','The daily backup was successful.','backup','Revisr Bot'),(91,'2020-08-22 07:15:20','Successfully backed up the database.','backup','Revisr Bot'),(92,'2020-08-22 07:15:28','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(93,'2020-08-22 07:15:28','The daily backup was successful.','backup','Revisr Bot'),(94,'2020-08-23 06:07:58','Successfully backed up the database.','backup','Revisr Bot'),(95,'2020-08-23 06:08:11','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(96,'2020-08-23 06:08:11','The daily backup was successful.','backup','Revisr Bot'),(97,'2020-08-24 07:10:45','Successfully backed up the database.','backup','Revisr Bot'),(98,'2020-08-24 07:10:53','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(99,'2020-08-24 07:10:53','The daily backup was successful.','backup','Revisr Bot'),(100,'2020-08-25 05:57:39','Successfully backed up the database.','backup','Revisr Bot'),(101,'2020-08-25 05:57:47','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(102,'2020-08-25 05:57:47','The daily backup was successful.','backup','Revisr Bot'),(103,'2020-08-26 06:12:11','Successfully backed up the database.','backup','Revisr Bot'),(104,'2020-08-26 06:12:18','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(105,'2020-08-26 06:12:18','The daily backup was successful.','backup','Revisr Bot'),(106,'2020-08-27 10:13:06','Successfully backed up the database.','backup','Revisr Bot'),(107,'2020-08-27 10:13:13','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(108,'2020-08-27 10:13:13','The daily backup was successful.','backup','Revisr Bot'),(109,'2020-08-28 06:54:01','Successfully backed up the database.','backup','Revisr Bot'),(110,'2020-08-28 06:54:09','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(111,'2020-08-28 06:54:09','The daily backup was successful.','backup','Revisr Bot'),(112,'2020-08-29 06:08:28','Successfully backed up the database.','backup','Revisr Bot'),(113,'2020-08-29 06:08:36','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(114,'2020-08-29 06:08:36','The daily backup was successful.','backup','Revisr Bot'),(115,'2020-08-30 06:38:34','Successfully backed up the database.','backup','Revisr Bot'),(116,'2020-08-30 06:38:42','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(117,'2020-08-30 06:38:42','The daily backup was successful.','backup','Revisr Bot'),(118,'2020-08-31 06:42:17','Successfully backed up the database.','backup','Revisr Bot'),(119,'2020-08-31 06:42:29','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(120,'2020-08-31 06:42:29','The daily backup was successful.','backup','Revisr Bot'),(121,'2020-09-01 07:05:11','Successfully backed up the database.','backup','Revisr Bot'),(122,'2020-09-01 07:05:18','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(123,'2020-09-01 07:05:18','The daily backup was successful.','backup','Revisr Bot'),(124,'2020-09-02 07:34:07','Successfully backed up the database.','backup','Revisr Bot'),(125,'2020-09-02 07:34:14','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(126,'2020-09-02 07:34:14','The daily backup was successful.','backup','Revisr Bot'),(127,'2020-09-03 06:50:47','Successfully backed up the database.','backup','Revisr Bot'),(128,'2020-09-03 06:50:55','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(129,'2020-09-03 06:50:55','The daily backup was successful.','backup','Revisr Bot'),(130,'2020-09-04 07:25:31','Successfully backed up the database.','backup','Revisr Bot'),(131,'2020-09-04 07:25:38','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(132,'2020-09-04 07:25:38','The daily backup was successful.','backup','Revisr Bot'),(133,'2020-09-05 05:57:48','Successfully backed up the database.','backup','Revisr Bot'),(134,'2020-09-05 05:57:55','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(135,'2020-09-05 05:57:55','The daily backup was successful.','backup','Revisr Bot'),(136,'2020-09-06 05:57:26','Successfully backed up the database.','backup','Revisr Bot'),(137,'2020-09-06 05:57:33','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(138,'2020-09-06 05:57:33','The daily backup was successful.','backup','Revisr Bot'),(139,'2020-09-07 06:50:31','Error staging files.','error','Revisr Bot'),(140,'2020-09-07 06:50:46','Successfully backed up the database.','backup','Revisr Bot'),(141,'2020-09-07 06:50:54','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(142,'2020-09-07 06:50:54','The daily backup was successful.','backup','Revisr Bot'),(143,'2020-09-08 06:49:41','Error staging files.','error','Revisr Bot'),(144,'2020-09-08 06:49:55','Successfully backed up the database.','backup','Revisr Bot'),(145,'2020-09-08 06:50:03','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(146,'2020-09-08 06:50:03','The daily backup was successful.','backup','Revisr Bot'),(147,'2020-09-09 05:57:09','Error staging files.','error','Revisr Bot'),(148,'2020-09-09 05:57:22','Successfully backed up the database.','backup','Revisr Bot'),(149,'2020-09-09 05:57:44','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(150,'2020-09-09 05:57:44','The daily backup was successful.','backup','Revisr Bot'),(151,'2020-09-10 06:15:28','Error staging files.','error','Revisr Bot'),(152,'2020-09-10 06:15:41','Successfully backed up the database.','backup','Revisr Bot'),(153,'2020-09-10 06:15:51','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(154,'2020-09-10 06:15:51','The daily backup was successful.','backup','Revisr Bot'),(155,'2020-09-11 06:00:25','Error staging files.','error','Revisr Bot'),(156,'2020-09-11 06:00:38','Successfully backed up the database.','backup','Revisr Bot'),(157,'2020-09-11 06:00:46','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(158,'2020-09-11 06:00:46','The daily backup was successful.','backup','Revisr Bot'),(159,'2020-09-12 05:58:29','Error staging files.','error','Revisr Bot'),(160,'2020-09-12 05:58:43','Successfully backed up the database.','backup','Revisr Bot'),(161,'2020-09-12 05:58:51','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(162,'2020-09-12 05:58:51','The daily backup was successful.','backup','Revisr Bot'),(163,'2020-09-13 09:03:38','Error staging files.','error','Revisr Bot'),(164,'2020-09-13 09:03:50','Successfully backed up the database.','backup','Revisr Bot'),(165,'2020-09-13 09:03:57','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(166,'2020-09-13 09:03:57','The daily backup was successful.','backup','Revisr Bot'),(167,'2020-09-20 06:53:26','Error staging files.','error','Revisr Bot'),(168,'2020-09-20 06:53:43','Successfully backed up the database.','backup','Revisr Bot'),(169,'2020-09-20 06:53:56','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(170,'2020-09-20 06:53:56','The daily backup was successful.','backup','Revisr Bot'),(171,'2020-09-21 06:09:54','Error staging files.','error','Revisr Bot'),(172,'2020-09-21 06:10:06','Successfully backed up the database.','backup','Revisr Bot'),(173,'2020-09-21 06:10:13','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(174,'2020-09-21 06:10:13','The daily backup was successful.','backup','Revisr Bot'),(175,'2020-09-22 05:59:46','Error staging files.','error','Revisr Bot'),(176,'2020-09-22 05:59:57','Successfully backed up the database.','backup','Revisr Bot'),(177,'2020-09-22 06:00:05','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(178,'2020-09-22 06:00:05','The daily backup was successful.','backup','Revisr Bot'),(179,'2020-09-23 07:13:41','Error staging files.','error','Revisr Bot'),(180,'2020-09-23 07:13:52','Successfully backed up the database.','backup','Revisr Bot'),(181,'2020-09-23 07:14:00','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(182,'2020-09-23 07:14:00','The daily backup was successful.','backup','Revisr Bot'),(183,'2020-09-24 06:05:45','Error staging files.','error','Revisr Bot'),(184,'2020-09-24 06:05:54','Successfully backed up the database.','backup','Revisr Bot'),(185,'2020-09-24 06:06:02','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(186,'2020-09-24 06:06:02','The daily backup was successful.','backup','Revisr Bot'),(187,'2020-09-25 06:04:45','Error staging files.','error','Revisr Bot'),(188,'2020-09-25 06:04:56','Successfully backed up the database.','backup','Revisr Bot'),(189,'2020-09-25 06:05:04','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(190,'2020-09-25 06:05:04','The daily backup was successful.','backup','Revisr Bot'),(191,'2020-09-26 06:05:41','Error staging files.','error','Revisr Bot');
/*!40000 ALTER TABLE `wpah_revisr` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


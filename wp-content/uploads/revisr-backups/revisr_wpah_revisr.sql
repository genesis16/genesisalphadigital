
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
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wpah_revisr` WRITE;
/*!40000 ALTER TABLE `wpah_revisr` DISABLE KEYS */;
INSERT INTO `wpah_revisr` VALUES (1,'2020-07-15 05:54:54','Successfully created a new repository.','init','rdoRp9HioP'),(2,'2020-07-15 05:58:35','Successfully pushed 1 commit to origin/master.','push','rdoRp9HioP'),(3,'2020-07-15 05:59:35','Successfully backed up the database.','backup','rdoRp9HioP'),(4,'2020-07-15 05:59:35','Error staging files.','error','rdoRp9HioP'),(5,'2020-07-15 05:59:35','There was an error committing the changes to the local repository.','error','rdoRp9HioP'),(6,'2020-07-15 06:09:05','Error staging files.','error','rdoRp9HioP'),(7,'2020-07-15 06:09:05','There was an error committing the changes to the local repository.','error','rdoRp9HioP'),(8,'2020-07-15 06:09:31','Error staging files.','error','Revisr Bot'),(9,'2020-07-15 06:09:45','Successfully backed up the database.','backup','Revisr Bot'),(10,'2020-07-15 06:10:09','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(11,'2020-07-15 06:10:09','The daily backup was successful.','backup','Revisr Bot'),(12,'2020-07-15 06:12:46','Error pushing changes to the remote repository.','error','rdoRp9HioP'),(13,'2020-07-15 06:13:17','Error pushing changes to the remote repository.','error','rdoRp9HioP'),(14,'2020-07-16 01:34:00','There was an error committing the changes to the local repository.','error','rdoRp9HioP'),(15,'2020-07-31 11:11:28','Committed <a href=\"https://alphaomegadigital.com.au/wp-admin/admin.php?page=revisr_view_commit&commit=a90bf85&success=true\">#a90bf85</a> to the local repository.','commit','rdoRp9HioP'),(16,'2020-07-31 11:11:28','Error pushing changes to the remote repository.','error','rdoRp9HioP'),(17,'2020-07-31 11:16:12','Successfully pushed 36 commits to origin/master.','push','rdoRp9HioP'),(18,'2020-07-31 11:16:50','Committed <a href=\"https://alphaomegadigital.com.au/wp-admin/admin.php?page=revisr_view_commit&commit=35c5894&success=true\">#35c5894</a> to the local repository.','commit','rdoRp9HioP'),(19,'2020-07-31 11:16:59','Successfully pushed 1 commit to origin/master.','push','rdoRp9HioP'),(20,'2020-08-01 08:30:38','Successfully backed up the database.','backup','Revisr Bot'),(21,'2020-08-01 08:30:46','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(22,'2020-08-01 08:30:46','The daily backup was successful.','backup','Revisr Bot'),(23,'2020-08-02 09:39:30','Successfully backed up the database.','backup','Revisr Bot'),(24,'2020-08-02 09:39:38','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(25,'2020-08-02 09:39:38','The daily backup was successful.','backup','Revisr Bot'),(26,'2020-08-03 05:57:51','Successfully backed up the database.','backup','Revisr Bot'),(27,'2020-08-03 05:58:01','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(28,'2020-08-03 05:58:01','The daily backup was successful.','backup','Revisr Bot'),(29,'2020-08-04 06:39:12','Successfully backed up the database.','backup','Revisr Bot'),(30,'2020-08-04 06:39:20','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(31,'2020-08-04 06:39:20','The daily backup was successful.','backup','Revisr Bot'),(32,'2020-08-05 05:57:39','Error staging files.','error','rdoRp9HioP'),(33,'2020-08-05 05:57:39','There was an error committing the changes to the local repository.','error','rdoRp9HioP'),(34,'2020-08-05 05:57:50','Error staging files.','error','rdoRp9HioP'),(35,'2020-08-05 05:57:50','There was an error committing the changes to the local repository.','error','rdoRp9HioP'),(36,'2020-08-05 05:59:15','Successfully pushed 0 commits to origin/master.','push','rdoRp9HioP'),(37,'2020-08-05 05:59:19','Error staging files.','error','Revisr Bot'),(38,'2020-08-05 05:59:32','Successfully backed up the database.','backup','Revisr Bot'),(39,'2020-08-05 05:59:43','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(40,'2020-08-05 05:59:43','The daily backup was successful.','backup','Revisr Bot'),(41,'2020-08-05 05:59:53','Committed <a href=\"https://alphaomegadigital.com.au/wp-admin/admin.php?page=revisr_view_commit&commit=01d2090&success=true\">#01d2090</a> to the local repository.','commit','rdoRp9HioP'),(42,'2020-08-05 06:00:37','Successfully pushed 1 commit to origin/master.','push','rdoRp9HioP'),(43,'2020-08-06 06:03:32','Successfully backed up the database.','backup','Revisr Bot'),(44,'2020-08-06 06:03:41','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(45,'2020-08-06 06:03:41','The daily backup was successful.','backup','Revisr Bot'),(46,'2020-08-07 07:17:16','Successfully backed up the database.','backup','Revisr Bot'),(47,'2020-08-07 07:17:25','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(48,'2020-08-07 07:17:25','The daily backup was successful.','backup','Revisr Bot'),(49,'2020-08-08 06:01:04','Successfully backed up the database.','backup','Revisr Bot'),(50,'2020-08-08 06:01:14','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(51,'2020-08-08 06:01:14','The daily backup was successful.','backup','Revisr Bot'),(52,'2020-08-09 09:27:07','Successfully backed up the database.','backup','Revisr Bot'),(53,'2020-08-09 09:27:15','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(54,'2020-08-09 09:27:15','The daily backup was successful.','backup','Revisr Bot'),(55,'2020-08-10 06:12:05','Successfully backed up the database.','backup','Revisr Bot'),(56,'2020-08-10 06:12:13','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(57,'2020-08-10 06:12:13','The daily backup was successful.','backup','Revisr Bot'),(58,'2020-08-11 07:51:00','Successfully backed up the database.','backup','Revisr Bot'),(59,'2020-08-11 07:51:08','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(60,'2020-08-11 07:51:08','The daily backup was successful.','backup','Revisr Bot'),(61,'2020-08-12 06:49:09','Successfully backed up the database.','backup','Revisr Bot'),(62,'2020-08-12 06:49:16','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(63,'2020-08-12 06:49:16','The daily backup was successful.','backup','Revisr Bot'),(64,'2020-08-13 06:07:19','Successfully backed up the database.','backup','Revisr Bot'),(65,'2020-08-13 06:07:27','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(66,'2020-08-13 06:07:27','The daily backup was successful.','backup','Revisr Bot'),(67,'2020-08-14 06:12:39','Successfully backed up the database.','backup','Revisr Bot'),(68,'2020-08-14 06:12:47','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(69,'2020-08-14 06:12:47','The daily backup was successful.','backup','Revisr Bot'),(70,'2020-08-15 06:14:21','Successfully backed up the database.','backup','Revisr Bot'),(71,'2020-08-15 06:14:31','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(72,'2020-08-15 06:14:31','The daily backup was successful.','backup','Revisr Bot'),(73,'2020-08-16 06:00:20','Successfully backed up the database.','backup','Revisr Bot'),(74,'2020-08-16 06:00:28','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(75,'2020-08-16 06:00:28','The daily backup was successful.','backup','Revisr Bot'),(76,'2020-08-17 06:04:15','Successfully backed up the database.','backup','Revisr Bot'),(77,'2020-08-17 06:04:23','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(78,'2020-08-17 06:04:23','The daily backup was successful.','backup','Revisr Bot'),(79,'2020-08-18 07:12:31','Successfully backed up the database.','backup','Revisr Bot'),(80,'2020-08-18 07:12:39','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(81,'2020-08-18 07:12:39','The daily backup was successful.','backup','Revisr Bot');
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


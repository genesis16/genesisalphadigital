
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wpah_revisr` WRITE;
/*!40000 ALTER TABLE `wpah_revisr` DISABLE KEYS */;
INSERT INTO `wpah_revisr` VALUES (1,'2020-07-15 05:54:54','Successfully created a new repository.','init','rdoRp9HioP'),(2,'2020-07-15 05:58:35','Successfully pushed 1 commit to origin/master.','push','rdoRp9HioP'),(3,'2020-07-15 05:59:35','Successfully backed up the database.','backup','rdoRp9HioP'),(4,'2020-07-15 05:59:35','Error staging files.','error','rdoRp9HioP'),(5,'2020-07-15 05:59:35','There was an error committing the changes to the local repository.','error','rdoRp9HioP'),(6,'2020-07-15 06:09:05','Error staging files.','error','rdoRp9HioP'),(7,'2020-07-15 06:09:05','There was an error committing the changes to the local repository.','error','rdoRp9HioP'),(8,'2020-07-15 06:09:31','Error staging files.','error','Revisr Bot');
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


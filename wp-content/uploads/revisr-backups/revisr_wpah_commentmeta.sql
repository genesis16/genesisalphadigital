
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
DROP TABLE IF EXISTS `wpah_commentmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wpah_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wpah_commentmeta` WRITE;
/*!40000 ALTER TABLE `wpah_commentmeta` DISABLE KEYS */;
INSERT INTO `wpah_commentmeta` VALUES (1,12,'_wxr_import_user','1'),(2,25,'_wxr_import_user','1'),(3,4298,'akismet_result','false'),(4,4298,'akismet_history','a:4:{s:4:\"time\";s:15:\"1372292563.4895\";s:7:\"message\";s:28:\"Akismet cleared this comment\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}'),(5,4298,'akismet_history','a:4:{s:4:\"time\";s:15:\"1372292592.5121\";s:7:\"message\";s:47:\"bgardner changed the comment status to approved\";s:5:\"event\";s:15:\"status-approved\";s:4:\"user\";s:8:\"bgardner\";}'),(6,4299,'akismet_result','false'),(7,4299,'akismet_history','a:4:{s:4:\"time\";s:15:\"1372292858.5887\";s:7:\"message\";s:28:\"Akismet cleared this comment\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}'),(8,4299,'akismet_history','a:4:{s:4:\"time\";s:14:\"1372292865.222\";s:7:\"message\";s:47:\"bgardner changed the comment status to approved\";s:5:\"event\";s:15:\"status-approved\";s:4:\"user\";s:8:\"bgardner\";}');
/*!40000 ALTER TABLE `wpah_commentmeta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


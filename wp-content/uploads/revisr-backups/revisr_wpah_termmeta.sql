
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
DROP TABLE IF EXISTS `wpah_termmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wpah_termmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`meta_id`),
  KEY `term_id` (`term_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wpah_termmeta` WRITE;
/*!40000 ALTER TABLE `wpah_termmeta` DISABLE KEYS */;
INSERT INTO `wpah_termmeta` VALUES (1,140,'order','0'),(2,140,'order','0'),(3,140,'order','0'),(4,140,'order','0'),(5,140,'product_count_product_cat','0'),(6,142,'order','0'),(7,142,'order','0'),(8,142,'order','0'),(9,142,'order','0'),(10,142,'product_count_product_cat','24'),(11,143,'product_count_product_tag','2'),(12,149,'order','0'),(13,149,'order','0'),(14,149,'order','0'),(15,149,'order','0'),(16,149,'product_count_product_cat','0'),(17,150,'product_count_product_tag','0'),(18,151,'product_count_product_tag','0'),(19,152,'order','0'),(20,152,'order','0'),(21,152,'order','0'),(22,152,'order','0'),(23,152,'product_count_product_cat','0'),(24,156,'product_count_product_tag','22'),(25,174,'headline',''),(26,174,'intro_text',''),(27,174,'display_title','0'),(28,174,'display_description','0'),(29,174,'doctitle',''),(30,174,'description',''),(31,174,'keywords',''),(32,174,'layout','content-sidebar'),(33,174,'noindex','0'),(34,174,'nofollow','0'),(35,174,'noarchive','0'),(36,178,'headline','This is the category Archive Headline'),(37,178,'intro_text','This is the category Archive Intro Text.'),(38,178,'display_title','0'),(39,178,'display_description','0'),(40,178,'doctitle',''),(41,178,'description',''),(42,178,'keywords',''),(43,178,'layout',''),(44,178,'noindex','0'),(45,178,'nofollow','0'),(46,178,'noarchive','0'),(66,160,'noindex','0'),(65,160,'layout',''),(64,160,'keywords',''),(63,160,'description',''),(62,160,'doctitle',''),(61,160,'display_description','0'),(60,160,'display_title','0'),(59,160,'intro_text',''),(58,160,'headline',''),(67,160,'nofollow','0'),(68,160,'noarchive','0');
/*!40000 ALTER TABLE `wpah_termmeta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


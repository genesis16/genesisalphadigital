
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
DROP TABLE IF EXISTS `wpah_term_relationships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wpah_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `term_order` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wpah_term_relationships` WRITE;
/*!40000 ALTER TABLE `wpah_term_relationships` DISABLE KEYS */;
INSERT INTO `wpah_term_relationships` VALUES (7182,203,0),(580,159,0),(581,144,0),(582,146,0),(583,145,0),(114,197,0),(107,198,0),(748,141,0),(748,148,0),(748,157,0),(749,147,0),(749,155,0),(749,157,0),(750,155,0),(750,157,0),(1484,199,0),(79,200,0),(7157,202,0),(7156,204,0),(97,197,0),(103,198,0),(97,201,0),(1112,168,0),(118,200,0),(1197,141,0),(1200,141,0),(1200,147,0),(1200,155,0),(1203,147,0),(1209,147,0),(1209,155,0),(1217,148,0),(1226,141,0),(1485,199,0),(1366,170,0),(1367,170,0),(1368,170,0),(1369,170,0),(105,200,0),(8163,206,0),(8131,211,0),(8040,210,0),(8044,210,0),(8008,206,0),(8007,206,0),(8006,206,0),(2543,2,0),(2543,142,0),(2543,156,0),(2548,2,0),(2548,8,0),(2548,142,0),(2548,156,0),(2553,2,0),(2553,142,0),(2553,156,0),(2558,2,0),(2558,8,0),(2558,142,0),(2558,156,0),(2563,2,0),(2563,142,0),(2563,156,0),(2568,2,0),(2568,142,0),(2568,156,0),(2573,2,0),(2573,8,0),(2573,142,0),(2573,156,0),(2578,2,0),(2578,142,0),(2578,156,0),(2583,2,0),(2583,142,0),(2583,156,0),(2587,2,0),(2587,8,0),(2587,142,0),(2587,143,0),(2592,2,0),(2592,142,0),(2592,156,0),(2597,2,0),(2597,8,0),(2597,142,0),(2597,156,0),(7442,160,0),(1486,199,0),(105,201,0),(3505,153,0),(3508,153,0),(3510,153,0),(3769,154,0),(3771,154,0),(3773,154,0),(7976,206,0),(3883,153,0),(3956,153,0),(3980,154,0),(3981,154,0),(118,198,0),(5714,173,0),(4872,141,0),(4872,148,0),(4872,157,0),(4873,147,0),(4873,155,0),(4873,157,0),(4874,155,0),(4874,157,0),(4875,141,0),(4876,141,0),(4876,147,0),(4876,155,0),(4877,147,0),(4878,147,0),(4878,155,0),(4897,148,0),(4898,141,0),(4899,153,0),(4900,153,0),(4901,153,0),(4902,154,0),(4903,154,0),(4904,154,0),(4905,153,0),(4906,153,0),(4907,154,0),(4908,154,0),(107,201,0),(7984,207,0),(7995,206,0),(7324,208,0),(57,199,0),(7478,207,0),(7977,206,0),(7994,206,0),(8003,206,0),(4954,168,0),(118,197,0),(7458,160,0),(4966,170,0),(4967,170,0),(4968,170,0),(4969,170,0),(7441,160,0),(103,200,0),(8130,211,0),(8129,211,0),(8047,210,0),(8127,209,0),(8042,210,0),(5073,2,0),(5073,142,0),(5073,156,0),(5074,2,0),(5074,8,0),(5074,142,0),(5074,156,0),(5075,2,0),(5075,142,0),(5075,156,0),(5076,2,0),(5076,8,0),(5076,142,0),(5076,156,0),(5077,2,0),(5077,142,0),(5077,156,0),(5078,2,0),(5078,142,0),(5078,156,0),(5079,2,0),(5079,8,0),(5079,142,0),(5079,156,0),(5080,2,0),(5080,142,0),(5080,156,0),(5081,2,0),(5081,142,0),(5081,156,0),(5082,2,0),(5082,8,0),(5082,142,0),(5082,143,0),(5090,159,0),(5091,144,0),(5092,146,0),(5093,145,0),(5104,2,0),(5104,142,0),(5104,156,0),(5105,2,0),(5105,8,0),(5105,142,0),(5105,156,0),(7438,160,0),(7327,160,0),(7634,206,0),(7618,206,0),(7440,160,0),(7980,209,0),(7265,203,0),(7264,203,0),(8002,206,0),(8005,206,0),(7261,203,0),(7677,1,0),(7695,209,0),(7969,209,0),(105,198,0),(118,201,0),(8128,211,0),(7715,209,0),(7714,209,0),(7713,209,0),(7155,202,0),(7239,204,0),(7238,202,0),(7186,203,0),(7978,206,0),(7185,203,0),(7996,206,0),(862,201,0),(8004,206,0),(7696,209,0),(7975,206,0),(116,201,0),(7661,206,0),(7326,160,0);
/*!40000 ALTER TABLE `wpah_term_relationships` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


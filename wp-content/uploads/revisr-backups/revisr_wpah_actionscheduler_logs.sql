
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
DROP TABLE IF EXISTS `wpah_actionscheduler_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wpah_actionscheduler_logs` (
  `log_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `action_id` bigint(20) unsigned NOT NULL,
  `message` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `log_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `log_date_local` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`log_id`),
  KEY `action_id` (`action_id`),
  KEY `log_date_gmt` (`log_date_gmt`)
) ENGINE=MyISAM AUTO_INCREMENT=1181 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wpah_actionscheduler_logs` WRITE;
/*!40000 ALTER TABLE `wpah_actionscheduler_logs` DISABLE KEYS */;
INSERT INTO `wpah_actionscheduler_logs` VALUES (1,7687,'action created','2020-08-22 22:55:08','2020-08-22 22:55:08'),(164,7687,'action started via WP Cron','2020-08-22 22:56:28','2020-08-22 22:56:28'),(1163,7980,'action created','2020-08-22 22:59:41','2020-08-22 22:59:41'),(272,6510,'There was a failure fetching this action: Action [6510] has an invalid schedule: \'\'','2020-08-22 22:56:28','2020-08-22 22:56:28'),(1162,7979,'action created','2020-08-22 22:59:29','2020-08-22 22:59:29'),(1160,7978,'action started via WP Cron','2020-08-22 22:59:29','2020-08-22 22:59:29'),(1161,7978,'action complete via WP Cron','2020-08-22 22:59:29','2020-08-22 22:59:29'),(368,6522,'There was a failure fetching this action: Action [6522] has an invalid schedule: \'\'','2020-08-22 22:56:28','2020-08-22 22:56:28'),(378,6523,'There was a failure fetching this action: Action [6523] has an invalid schedule: \'\'','2020-08-22 22:56:29','2020-08-22 22:56:29'),(386,6524,'There was a failure fetching this action: Action [6524] has an invalid schedule: \'\'','2020-08-22 22:56:29','2020-08-22 22:56:29'),(396,6525,'There was a failure fetching this action: Action [6525] has an invalid schedule: \'\'','2020-08-22 22:56:29','2020-08-22 22:56:29'),(1164,7979,'action started via WP Cron','2020-08-22 23:00:43','2020-08-22 23:00:43'),(1165,7979,'action complete via WP Cron','2020-08-22 23:00:43','2020-08-22 23:00:43'),(1166,7981,'action created','2020-08-22 23:05:04','2020-08-22 23:05:04'),(1167,7981,'action started via WP Cron','2020-08-22 23:05:07','2020-08-22 23:05:07'),(1168,7981,'action complete via WP Cron','2020-08-22 23:05:08','2020-08-22 23:05:08'),(1180,7985,'action created','2020-08-26 06:11:58','2020-08-26 06:11:58'),(1179,7984,'action complete via WP Cron','2020-08-26 06:11:58','2020-08-26 06:11:58'),(1177,7984,'action created','2020-08-25 05:05:28','2020-08-25 05:05:28'),(1178,7984,'action started via WP Cron','2020-08-26 06:11:58','2020-08-26 06:11:58'),(1176,7983,'action complete via WP Cron','2020-08-25 05:05:28','2020-08-25 05:05:28'),(1175,7983,'action started via WP Cron','2020-08-25 05:05:28','2020-08-25 05:05:28'),(1173,7982,'action complete via WP Cron','2020-08-24 02:46:04','2020-08-24 02:46:04'),(1174,7983,'action created','2020-08-24 02:46:04','2020-08-24 02:46:04'),(1172,7982,'action started via WP Cron','2020-08-24 02:46:04','2020-08-24 02:46:04'),(1171,7982,'action created','2020-08-23 00:46:29','2020-08-23 00:46:29'),(1169,7980,'action started via WP Cron','2020-08-23 00:46:29','2020-08-23 00:46:29'),(1170,7980,'action complete via WP Cron','2020-08-23 00:46:29','2020-08-23 00:46:29'),(1158,7687,'action complete via WP Cron','2020-08-22 22:56:32','2020-08-22 22:56:32'),(1159,7978,'action created','2020-08-22 22:57:27','2020-08-22 22:57:27');
/*!40000 ALTER TABLE `wpah_actionscheduler_logs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


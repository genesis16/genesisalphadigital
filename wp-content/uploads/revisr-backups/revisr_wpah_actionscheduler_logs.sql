
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
) ENGINE=MyISAM AUTO_INCREMENT=1217 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wpah_actionscheduler_logs` WRITE;
/*!40000 ALTER TABLE `wpah_actionscheduler_logs` DISABLE KEYS */;
INSERT INTO `wpah_actionscheduler_logs` VALUES (1,7687,'action created','2020-08-22 22:55:08','2020-08-22 22:55:08'),(164,7687,'action started via WP Cron','2020-08-22 22:56:28','2020-08-22 22:56:28'),(1163,7980,'action created','2020-08-22 22:59:41','2020-08-22 22:59:41'),(272,6510,'There was a failure fetching this action: Action [6510] has an invalid schedule: \'\'','2020-08-22 22:56:28','2020-08-22 22:56:28'),(1162,7979,'action created','2020-08-22 22:59:29','2020-08-22 22:59:29'),(1160,7978,'action started via WP Cron','2020-08-22 22:59:29','2020-08-22 22:59:29'),(1161,7978,'action complete via WP Cron','2020-08-22 22:59:29','2020-08-22 22:59:29'),(368,6522,'There was a failure fetching this action: Action [6522] has an invalid schedule: \'\'','2020-08-22 22:56:28','2020-08-22 22:56:28'),(378,6523,'There was a failure fetching this action: Action [6523] has an invalid schedule: \'\'','2020-08-22 22:56:29','2020-08-22 22:56:29'),(386,6524,'There was a failure fetching this action: Action [6524] has an invalid schedule: \'\'','2020-08-22 22:56:29','2020-08-22 22:56:29'),(396,6525,'There was a failure fetching this action: Action [6525] has an invalid schedule: \'\'','2020-08-22 22:56:29','2020-08-22 22:56:29'),(1164,7979,'action started via WP Cron','2020-08-22 23:00:43','2020-08-22 23:00:43'),(1165,7979,'action complete via WP Cron','2020-08-22 23:00:43','2020-08-22 23:00:43'),(1166,7981,'action created','2020-08-22 23:05:04','2020-08-22 23:05:04'),(1167,7981,'action started via WP Cron','2020-08-22 23:05:07','2020-08-22 23:05:07'),(1168,7981,'action complete via WP Cron','2020-08-22 23:05:08','2020-08-22 23:05:08'),(1216,7997,'action created','2020-09-02 12:48:57','2020-09-02 12:48:57'),(1215,7996,'action complete via WP Cron','2020-09-02 12:48:57','2020-09-02 12:48:57'),(1213,7996,'action created','2020-09-01 12:39:17','2020-09-01 12:39:17'),(1214,7996,'action started via WP Cron','2020-09-02 12:48:57','2020-09-02 12:48:57'),(1212,7994,'action complete via WP Cron','2020-09-01 12:39:17','2020-09-01 12:39:17'),(1211,7994,'action started via WP Cron','2020-09-01 12:39:17','2020-09-01 12:39:17'),(1210,7995,'action complete via Async Request','2020-09-01 03:01:18','2020-09-01 03:01:18'),(1209,7995,'action started via Async Request','2020-09-01 03:01:17','2020-09-01 03:01:17'),(1208,7995,'action created','2020-09-01 03:01:14','2020-09-01 03:01:14'),(1207,7994,'action created','2020-08-31 12:14:27','2020-08-31 12:14:27'),(1205,7990,'action started via WP Cron','2020-08-31 12:14:26','2020-08-31 12:14:26'),(1206,7990,'action complete via WP Cron','2020-08-31 12:14:27','2020-08-31 12:14:27'),(1204,7993,'action complete via Async Request','2020-08-31 02:53:59','2020-08-31 02:53:59'),(1202,7993,'action created','2020-08-31 02:52:40','2020-08-31 02:52:40'),(1203,7993,'action started via Async Request','2020-08-31 02:53:59','2020-08-31 02:53:59'),(1201,7992,'action complete via WP Cron','2020-08-31 02:52:40','2020-08-31 02:52:40'),(1200,7992,'action started via WP Cron','2020-08-31 02:52:40','2020-08-31 02:52:40'),(1198,7991,'action complete via WP Cron','2020-08-31 02:25:19','2020-08-31 02:25:19'),(1199,7992,'action created','2020-08-31 02:51:40','2020-08-31 02:51:40'),(1197,7991,'action started via WP Cron','2020-08-31 02:25:18','2020-08-31 02:25:18'),(1195,7990,'action created','2020-08-30 11:33:49','2020-08-30 11:33:49'),(1196,7991,'action created','2020-08-31 02:24:19','2020-08-31 02:24:19'),(1194,7989,'action complete via WP Cron','2020-08-30 11:33:49','2020-08-30 11:33:49'),(1193,7989,'action started via WP Cron','2020-08-30 11:33:49','2020-08-30 11:33:49'),(1191,7988,'action complete via WP Cron','2020-08-29 10:46:32','2020-08-29 10:46:32'),(1192,7989,'action created','2020-08-29 10:46:32','2020-08-29 10:46:32'),(1190,7988,'action started via WP Cron','2020-08-29 10:46:32','2020-08-29 10:46:32'),(1189,7988,'action created','2020-08-28 10:44:31','2020-08-28 10:44:31'),(1188,7986,'action complete via WP Cron','2020-08-28 10:44:31','2020-08-28 10:44:31'),(1187,7986,'action started via WP Cron','2020-08-28 10:44:31','2020-08-28 10:44:31'),(1186,7987,'action complete via Async Request','2020-08-27 13:50:35','2020-08-27 13:50:35'),(1184,7987,'action created','2020-08-27 13:50:31','2020-08-27 13:50:31'),(1185,7987,'action started via Async Request','2020-08-27 13:50:34','2020-08-27 13:50:34'),(1183,7986,'action created','2020-08-27 10:12:53','2020-08-27 10:12:53'),(1182,7985,'action complete via WP Cron','2020-08-27 10:12:53','2020-08-27 10:12:53'),(1180,7985,'action created','2020-08-26 06:11:58','2020-08-26 06:11:58'),(1181,7985,'action started via WP Cron','2020-08-27 10:12:53','2020-08-27 10:12:53'),(1179,7984,'action complete via WP Cron','2020-08-26 06:11:58','2020-08-26 06:11:58'),(1177,7984,'action created','2020-08-25 05:05:28','2020-08-25 05:05:28'),(1178,7984,'action started via WP Cron','2020-08-26 06:11:58','2020-08-26 06:11:58'),(1176,7983,'action complete via WP Cron','2020-08-25 05:05:28','2020-08-25 05:05:28'),(1175,7983,'action started via WP Cron','2020-08-25 05:05:28','2020-08-25 05:05:28'),(1173,7982,'action complete via WP Cron','2020-08-24 02:46:04','2020-08-24 02:46:04'),(1174,7983,'action created','2020-08-24 02:46:04','2020-08-24 02:46:04'),(1172,7982,'action started via WP Cron','2020-08-24 02:46:04','2020-08-24 02:46:04'),(1171,7982,'action created','2020-08-23 00:46:29','2020-08-23 00:46:29'),(1169,7980,'action started via WP Cron','2020-08-23 00:46:29','2020-08-23 00:46:29'),(1170,7980,'action complete via WP Cron','2020-08-23 00:46:29','2020-08-23 00:46:29'),(1158,7687,'action complete via WP Cron','2020-08-22 22:56:32','2020-08-22 22:56:32'),(1159,7978,'action created','2020-08-22 22:57:27','2020-08-22 22:57:27');
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


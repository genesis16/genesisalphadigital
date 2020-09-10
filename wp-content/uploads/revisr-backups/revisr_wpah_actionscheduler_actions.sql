
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
DROP TABLE IF EXISTS `wpah_actionscheduler_actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wpah_actionscheduler_actions` (
  `action_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hook` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `scheduled_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `scheduled_date_local` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `args` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `schedule` longtext COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `group_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `attempts` int(11) NOT NULL DEFAULT 0,
  `last_attempt_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_attempt_local` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `claim_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `extended_args` varchar(8000) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`action_id`),
  KEY `hook` (`hook`),
  KEY `status` (`status`),
  KEY `scheduled_date_gmt` (`scheduled_date_gmt`),
  KEY `args` (`args`),
  KEY `group_id` (`group_id`),
  KEY `last_attempt_gmt` (`last_attempt_gmt`),
  KEY `claim_id` (`claim_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8010 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wpah_actionscheduler_actions` WRITE;
/*!40000 ALTER TABLE `wpah_actionscheduler_actions` DISABLE KEYS */;
INSERT INTO `wpah_actionscheduler_actions` VALUES (7687,'action_scheduler/migration_hook','complete','2020-08-22 22:56:08','2020-08-22 22:56:08','[]','O:30:\"ActionScheduler_SimpleSchedule\":2:{s:22:\"\0*\0scheduled_timestamp\";i:1598136968;s:41:\"\0ActionScheduler_SimpleSchedule\0timestamp\";i:1598136968;}',1,1,'2020-08-22 22:56:32','2020-08-22 22:56:32',0,NULL),(7980,'wpforms_process_entry_emails_meta_cleanup','complete','2020-08-23 00:00:00','2020-08-23 00:00:00','{\"tasks_meta_id\":1}','O:32:\"ActionScheduler_IntervalSchedule\":5:{s:22:\"\0*\0scheduled_timestamp\";i:1598140800;s:18:\"\0*\0first_timestamp\";i:1598140800;s:13:\"\0*\0recurrence\";i:86400;s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1598140800;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:86400;}',3,1,'2020-08-23 00:46:29','2020-08-23 00:46:29',0,NULL),(7983,'wpforms_process_entry_emails_meta_cleanup','complete','2020-08-25 02:46:04','2020-08-25 02:46:04','{\"tasks_meta_id\":1}','O:32:\"ActionScheduler_IntervalSchedule\":5:{s:22:\"\0*\0scheduled_timestamp\";i:1598323564;s:18:\"\0*\0first_timestamp\";i:1598140800;s:13:\"\0*\0recurrence\";i:86400;s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1598323564;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:86400;}',3,1,'2020-08-25 05:05:28','2020-08-25 05:05:28',0,NULL),(7984,'wpforms_process_entry_emails_meta_cleanup','complete','2020-08-26 05:05:28','2020-08-26 05:05:28','{\"tasks_meta_id\":1}','O:32:\"ActionScheduler_IntervalSchedule\":5:{s:22:\"\0*\0scheduled_timestamp\";i:1598418328;s:18:\"\0*\0first_timestamp\";i:1598140800;s:13:\"\0*\0recurrence\";i:86400;s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1598418328;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:86400;}',3,1,'2020-08-26 06:11:58','2020-08-26 06:11:58',0,NULL),(7985,'wpforms_process_entry_emails_meta_cleanup','complete','2020-08-27 06:11:58','2020-08-27 06:11:58','{\"tasks_meta_id\":1}','O:32:\"ActionScheduler_IntervalSchedule\":5:{s:22:\"\0*\0scheduled_timestamp\";i:1598508718;s:18:\"\0*\0first_timestamp\";i:1598140800;s:13:\"\0*\0recurrence\";i:86400;s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1598508718;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:86400;}',3,1,'2020-08-27 10:12:53','2020-08-27 10:12:53',0,NULL),(7986,'wpforms_process_entry_emails_meta_cleanup','complete','2020-08-28 10:12:53','2020-08-28 10:12:53','{\"tasks_meta_id\":1}','O:32:\"ActionScheduler_IntervalSchedule\":5:{s:22:\"\0*\0scheduled_timestamp\";i:1598609573;s:18:\"\0*\0first_timestamp\";i:1598140800;s:13:\"\0*\0recurrence\";i:86400;s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1598609573;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:86400;}',3,1,'2020-08-28 10:44:31','2020-08-28 10:44:31',0,NULL),(7987,'wpforms_admin_notifications_update','complete','0000-00-00 00:00:00','0000-00-00 00:00:00','{\"tasks_meta_id\":3}','O:28:\"ActionScheduler_NullSchedule\":0:{}',3,1,'2020-08-27 13:50:35','2020-08-27 13:50:35',0,NULL),(7988,'wpforms_process_entry_emails_meta_cleanup','complete','2020-08-29 10:44:31','2020-08-29 10:44:31','{\"tasks_meta_id\":1}','O:32:\"ActionScheduler_IntervalSchedule\":5:{s:22:\"\0*\0scheduled_timestamp\";i:1598697871;s:18:\"\0*\0first_timestamp\";i:1598140800;s:13:\"\0*\0recurrence\";i:86400;s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1598697871;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:86400;}',3,1,'2020-08-29 10:46:32','2020-08-29 10:46:32',0,NULL),(7989,'wpforms_process_entry_emails_meta_cleanup','complete','2020-08-30 10:46:32','2020-08-30 10:46:32','{\"tasks_meta_id\":1}','O:32:\"ActionScheduler_IntervalSchedule\":5:{s:22:\"\0*\0scheduled_timestamp\";i:1598784392;s:18:\"\0*\0first_timestamp\";i:1598140800;s:13:\"\0*\0recurrence\";i:86400;s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1598784392;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:86400;}',3,1,'2020-08-30 11:33:49','2020-08-30 11:33:49',0,NULL),(7990,'wpforms_process_entry_emails_meta_cleanup','complete','2020-08-31 11:33:49','2020-08-31 11:33:49','{\"tasks_meta_id\":1}','O:32:\"ActionScheduler_IntervalSchedule\":5:{s:22:\"\0*\0scheduled_timestamp\";i:1598873629;s:18:\"\0*\0first_timestamp\";i:1598140800;s:13:\"\0*\0recurrence\";i:86400;s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1598873629;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:86400;}',3,1,'2020-08-31 12:14:27','2020-08-31 12:14:27',0,NULL),(7991,'wpforms_admin_notifications_update','complete','0000-00-00 00:00:00','0000-00-00 00:00:00','{\"tasks_meta_id\":4}','O:28:\"ActionScheduler_NullSchedule\":0:{}',3,1,'2020-08-31 02:25:19','2020-08-31 02:25:19',0,NULL),(7992,'action_scheduler/migration_hook','complete','2020-08-31 02:52:40','2020-08-31 02:52:40','[]','O:30:\"ActionScheduler_SimpleSchedule\":2:{s:22:\"\0*\0scheduled_timestamp\";i:1598842360;s:41:\"\0ActionScheduler_SimpleSchedule\0timestamp\";i:1598842360;}',1,1,'2020-08-31 02:52:40','2020-08-31 02:52:40',0,NULL),(7993,'action_scheduler/migration_hook','complete','2020-08-31 02:53:40','2020-08-31 02:53:40','[]','O:30:\"ActionScheduler_SimpleSchedule\":2:{s:22:\"\0*\0scheduled_timestamp\";i:1598842420;s:41:\"\0ActionScheduler_SimpleSchedule\0timestamp\";i:1598842420;}',1,1,'2020-08-31 02:53:59','2020-08-31 02:53:59',0,NULL),(7994,'wpforms_process_entry_emails_meta_cleanup','complete','2020-09-01 12:14:27','2020-09-01 12:14:27','{\"tasks_meta_id\":1}','O:32:\"ActionScheduler_IntervalSchedule\":5:{s:22:\"\0*\0scheduled_timestamp\";i:1598962467;s:18:\"\0*\0first_timestamp\";i:1598140800;s:13:\"\0*\0recurrence\";i:86400;s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1598962467;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:86400;}',3,1,'2020-09-01 12:39:17','2020-09-01 12:39:17',0,NULL),(7995,'wpforms_admin_notifications_update','complete','0000-00-00 00:00:00','0000-00-00 00:00:00','{\"tasks_meta_id\":5}','O:28:\"ActionScheduler_NullSchedule\":0:{}',3,1,'2020-09-01 03:01:18','2020-09-01 03:01:18',0,NULL),(7996,'wpforms_process_entry_emails_meta_cleanup','complete','2020-09-02 12:39:17','2020-09-02 12:39:17','{\"tasks_meta_id\":1}','O:32:\"ActionScheduler_IntervalSchedule\":5:{s:22:\"\0*\0scheduled_timestamp\";i:1599050357;s:18:\"\0*\0first_timestamp\";i:1598140800;s:13:\"\0*\0recurrence\";i:86400;s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1599050357;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:86400;}',3,1,'2020-09-02 12:48:57','2020-09-02 12:48:57',0,NULL),(7997,'wpforms_process_entry_emails_meta_cleanup','complete','2020-09-03 12:48:57','2020-09-03 12:48:57','{\"tasks_meta_id\":1}','O:32:\"ActionScheduler_IntervalSchedule\":5:{s:22:\"\0*\0scheduled_timestamp\";i:1599137337;s:18:\"\0*\0first_timestamp\";i:1598140800;s:13:\"\0*\0recurrence\";i:86400;s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1599137337;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:86400;}',3,1,'2020-09-03 15:35:57','2020-09-03 15:35:57',0,NULL),(7998,'wpforms_process_entry_emails_meta_cleanup','complete','2020-09-04 15:35:57','2020-09-04 15:35:57','{\"tasks_meta_id\":1}','O:32:\"ActionScheduler_IntervalSchedule\":5:{s:22:\"\0*\0scheduled_timestamp\";i:1599233757;s:18:\"\0*\0first_timestamp\";i:1598140800;s:13:\"\0*\0recurrence\";i:86400;s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1599233757;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:86400;}',3,1,'2020-09-04 17:45:56','2020-09-04 17:45:56',0,NULL),(7999,'wpforms_process_entry_emails_meta_cleanup','complete','2020-09-05 17:45:56','2020-09-05 17:45:56','{\"tasks_meta_id\":1}','O:32:\"ActionScheduler_IntervalSchedule\":5:{s:22:\"\0*\0scheduled_timestamp\";i:1599327956;s:18:\"\0*\0first_timestamp\";i:1598140800;s:13:\"\0*\0recurrence\";i:86400;s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1599327956;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:86400;}',3,1,'2020-09-05 18:39:03','2020-09-05 18:39:03',0,NULL),(8000,'wpforms_process_entry_emails_meta_cleanup','complete','2020-09-06 18:39:03','2020-09-06 18:39:03','{\"tasks_meta_id\":1}','O:32:\"ActionScheduler_IntervalSchedule\":5:{s:22:\"\0*\0scheduled_timestamp\";i:1599417543;s:18:\"\0*\0first_timestamp\";i:1598140800;s:13:\"\0*\0recurrence\";i:86400;s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1599417543;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:86400;}',3,1,'2020-09-06 20:10:09','2020-09-06 20:10:09',0,NULL),(8001,'wpforms_process_entry_emails_meta_cleanup','complete','2020-09-07 20:10:09','2020-09-07 20:10:09','{\"tasks_meta_id\":1}','O:32:\"ActionScheduler_IntervalSchedule\":5:{s:22:\"\0*\0scheduled_timestamp\";i:1599509409;s:18:\"\0*\0first_timestamp\";i:1598140800;s:13:\"\0*\0recurrence\";i:86400;s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1599509409;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:86400;}',3,1,'2020-09-07 20:33:12','2020-09-07 20:33:12',0,NULL),(8002,'wpforms_admin_notifications_update','complete','0000-00-00 00:00:00','0000-00-00 00:00:00','{\"tasks_meta_id\":6}','O:28:\"ActionScheduler_NullSchedule\":0:{}',3,1,'2020-09-07 03:28:46','2020-09-07 03:28:46',0,NULL),(8003,'wpforms_admin_notifications_update','complete','0000-00-00 00:00:00','0000-00-00 00:00:00','{\"tasks_meta_id\":7}','O:28:\"ActionScheduler_NullSchedule\":0:{}',3,1,'2020-09-07 03:28:52','2020-09-07 03:28:52',0,NULL),(8004,'action_scheduler/migration_hook','complete','2020-09-07 03:30:02','2020-09-07 03:30:02','[]','O:30:\"ActionScheduler_SimpleSchedule\":2:{s:22:\"\0*\0scheduled_timestamp\";i:1599449402;s:41:\"\0ActionScheduler_SimpleSchedule\0timestamp\";i:1599449402;}',1,1,'2020-09-07 03:30:34','2020-09-07 03:30:34',0,NULL),(8005,'action_scheduler/migration_hook','complete','2020-09-07 03:31:34','2020-09-07 03:31:34','[]','O:30:\"ActionScheduler_SimpleSchedule\":2:{s:22:\"\0*\0scheduled_timestamp\";i:1599449494;s:41:\"\0ActionScheduler_SimpleSchedule\0timestamp\";i:1599449494;}',1,1,'2020-09-07 03:32:14','2020-09-07 03:32:14',0,NULL),(8006,'wpforms_process_entry_emails_meta_cleanup','complete','2020-09-08 20:33:12','2020-09-08 20:33:12','{\"tasks_meta_id\":1}','O:32:\"ActionScheduler_IntervalSchedule\":5:{s:22:\"\0*\0scheduled_timestamp\";i:1599597192;s:18:\"\0*\0first_timestamp\";i:1598140800;s:13:\"\0*\0recurrence\";i:86400;s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1599597192;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:86400;}',3,1,'2020-09-08 21:18:09','2020-09-08 21:18:09',0,NULL),(8007,'wpforms_process_entry_emails_meta_cleanup','complete','2020-09-09 21:18:09','2020-09-09 21:18:09','{\"tasks_meta_id\":1}','O:32:\"ActionScheduler_IntervalSchedule\":5:{s:22:\"\0*\0scheduled_timestamp\";i:1599686289;s:18:\"\0*\0first_timestamp\";i:1598140800;s:13:\"\0*\0recurrence\";i:86400;s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1599686289;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:86400;}',3,1,'2020-09-09 22:43:44','2020-09-09 22:43:44',0,NULL),(8008,'wpforms_admin_notifications_update','complete','0000-00-00 00:00:00','0000-00-00 00:00:00','{\"tasks_meta_id\":8}','O:28:\"ActionScheduler_NullSchedule\":0:{}',3,1,'2020-09-09 03:29:21','2020-09-09 03:29:21',0,NULL),(8009,'wpforms_process_entry_emails_meta_cleanup','pending','2020-09-10 22:43:44','2020-09-10 22:43:44','{\"tasks_meta_id\":1}','O:32:\"ActionScheduler_IntervalSchedule\":5:{s:22:\"\0*\0scheduled_timestamp\";i:1599777824;s:18:\"\0*\0first_timestamp\";i:1598140800;s:13:\"\0*\0recurrence\";i:86400;s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1599777824;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:86400;}',3,0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,NULL),(7979,'action_scheduler/migration_hook','complete','2020-08-22 23:00:29','2020-08-22 23:00:29','[]','O:30:\"ActionScheduler_SimpleSchedule\":2:{s:22:\"\0*\0scheduled_timestamp\";i:1598137229;s:41:\"\0ActionScheduler_SimpleSchedule\0timestamp\";i:1598137229;}',1,1,'2020-08-22 23:00:43','2020-08-22 23:00:43',0,NULL),(7982,'wpforms_process_entry_emails_meta_cleanup','complete','2020-08-24 00:46:29','2020-08-24 00:46:29','{\"tasks_meta_id\":1}','O:32:\"ActionScheduler_IntervalSchedule\":5:{s:22:\"\0*\0scheduled_timestamp\";i:1598229989;s:18:\"\0*\0first_timestamp\";i:1598140800;s:13:\"\0*\0recurrence\";i:86400;s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1598229989;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:86400;}',3,1,'2020-08-24 02:46:04','2020-08-24 02:46:04',0,NULL),(7981,'wpforms_admin_notifications_update','complete','0000-00-00 00:00:00','0000-00-00 00:00:00','{\"tasks_meta_id\":2}','O:28:\"ActionScheduler_NullSchedule\":0:{}',3,1,'2020-08-22 23:05:08','2020-08-22 23:05:08',0,NULL),(7978,'action_scheduler/migration_hook','complete','2020-08-22 22:58:27','2020-08-22 22:58:27','[]','O:30:\"ActionScheduler_SimpleSchedule\":2:{s:22:\"\0*\0scheduled_timestamp\";i:1598137107;s:41:\"\0ActionScheduler_SimpleSchedule\0timestamp\";i:1598137107;}',1,1,'2020-08-22 22:59:29','2020-08-22 22:59:29',0,NULL);
/*!40000 ALTER TABLE `wpah_actionscheduler_actions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


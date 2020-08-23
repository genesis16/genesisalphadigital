
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
DROP TABLE IF EXISTS `wpah_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wpah_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT 0,
  `comment_author` tinytext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT 0,
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'comment',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT 0,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10)),
  KEY `woo_idx_comment_type` (`comment_type`)
) ENGINE=MyISAM AUTO_INCREMENT=4302 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wpah_comments` WRITE;
/*!40000 ALTER TABLE `wpah_comments` DISABLE KEYS */;
INSERT INTO `wpah_comments` VALUES (12,401,'Richard Roe','shubhajit@rkwebsolutions.com','','122.163.110.115','2018-07-24 11:37:41','2018-07-24 11:37:41','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s',0,'post-trashed','','comment',0,0),(14,2708,'WooCommerce','woocommerce@themes.radiantthemes.com','','','2019-02-18 19:52:51','2019-02-18 19:52:51','Awaiting check payment Order status changed from Pending payment to On hold.',0,'1','','order_note',0,0),(16,3043,'WooCommerce','woocommerce@themes.radiantthemes.com','','','2019-02-25 02:23:16','2019-02-25 02:23:16','Awaiting check payment Order status changed from Pending payment to On hold.',0,'1','','order_note',0,0),(18,3058,'WooCommerce','woocommerce@themes.radiantthemes.com','','','2019-02-25 13:02:36','2019-02-25 13:02:36','Awaiting check payment Order status changed from Pending payment to On hold.',0,'1','','order_note',0,0),(25,5069,'Richard Roe','shubhajit@rkwebsolutions.com','','122.163.110.115','2018-07-24 11:37:41','2018-07-24 11:37:41','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s',0,'post-trashed','','comment',0,0),(27,5106,'WooCommerce','woocommerce@themes.radiantthemes.com','','','2019-02-18 19:52:51','2019-02-18 19:52:51','Awaiting check payment Order status changed from Pending payment to On hold.',0,'1','','order_note',0,0),(29,5108,'WooCommerce','woocommerce@themes.radiantthemes.com','','','2019-02-25 02:23:16','2019-02-25 02:23:16','Awaiting check payment Order status changed from Pending payment to On hold.',0,'1','','order_note',0,0),(31,5110,'WooCommerce','woocommerce@themes.radiantthemes.com','','','2019-02-25 13:02:36','2019-02-25 13:02:36','Awaiting check payment Order status changed from Pending payment to On hold.',0,'1','','order_note',0,0),(4299,447,'Check Out This Sample Trackback','','http://demo.briangardner.com/blog/sample-trackback-2/','72.10.51.26','2013-08-27 00:27:38','2013-08-27 00:27:38','[&#8230;] another sample post with threaded comments over at the Genesis Framework demo [&#8230;]',0,'post-trashed','','pingback',0,0),(4298,447,'This is a Sample Trackback','','http://demo.briangardner.com/blog/sample-trackback/','72.10.51.26','2013-08-27 00:22:43','2013-08-27 00:22:43','[&#8230;] have you seen the sample post with threaded comments over at the Genesis Framework demo [&#8230;]',0,'post-trashed','','pingback',0,0),(4297,447,'Brian Gardner','demo-comments@studiopress.com','','76.29.60.137','2013-09-01 19:14:38','2013-09-01 19:14:38','This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.',0,'post-trashed','','comment',0,0),(4296,447,'Brian Gardner','demo-comments@studiopress.com','http://www.briangardner.com/','76.29.60.137','2013-09-01 19:14:25','2013-09-01 19:14:25','This is an example of a nested threaded comment which is new in WordPress 2.7. This is where you can reply to a comment that was previously made, and visually makes reading comments to much easier.',0,'post-trashed','','comment',4295,0),(4294,447,'Brian Gardner','demo-comments@studiopress.com','http://www.briangardner.com/','76.29.60.137','2013-09-01 19:14:11','2013-09-01 19:14:11','This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.',0,'post-trashed','','comment',0,0),(4295,447,'Brian Gardner','demo-comments@studiopress.com','http://www.briangardner.com/','76.29.60.137','2013-09-01 19:14:19','2013-09-01 19:14:19','This is an example of a nested threaded comment which is new in WordPress 2.7. This is where you can reply to a comment that was previously made, and visually makes reading comments to much easier.',0,'post-trashed','','comment',4294,0),(4293,447,'Brian Gardner','demo-comments@studiopress.com','http://www.briangardner.com/','76.29.60.137','2013-09-01 19:14:04','2013-09-01 19:14:04','This is an example of a nested threaded comment which is new in WordPress 2.7. This is where you can reply to a comment that was previously made, and visually makes reading comments to much easier.',0,'post-trashed','','comment',4292,0),(4292,447,'Brian Gardner','demo-comments@studiopress.com','http://www.briangardner.com/','76.29.60.137','2013-09-01 19:13:54','2013-09-01 19:13:54','This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.',0,'post-trashed','','comment',0,0);
/*!40000 ALTER TABLE `wpah_comments` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;



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
) ENGINE=MyISAM AUTO_INCREMENT=4313 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wpah_comments` WRITE;
/*!40000 ALTER TABLE `wpah_comments` DISABLE KEYS */;
INSERT INTO `wpah_comments` VALUES (14,2708,'WooCommerce','woocommerce@themes.radiantthemes.com','','','2019-02-18 19:52:51','2019-02-18 19:52:51','Awaiting check payment Order status changed from Pending payment to On hold.',0,'1','','order_note',0,0),(16,3043,'WooCommerce','woocommerce@themes.radiantthemes.com','','','2019-02-25 02:23:16','2019-02-25 02:23:16','Awaiting check payment Order status changed from Pending payment to On hold.',0,'1','','order_note',0,0),(18,3058,'WooCommerce','woocommerce@themes.radiantthemes.com','','','2019-02-25 13:02:36','2019-02-25 13:02:36','Awaiting check payment Order status changed from Pending payment to On hold.',0,'1','','order_note',0,0),(4302,7984,'erotik','senia_persaud@yahoo.ca','https://filmkovasi.org/','51.15.11.30','2020-11-13 05:41:33','2020-11-13 05:41:33','I really like and appreciate your post. Much thanks again. Really Cool. Jelene Tull Lowry',0,'1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4251.0 Safari/537.36','comment',0,0),(27,5106,'WooCommerce','woocommerce@themes.radiantthemes.com','','','2019-02-18 19:52:51','2019-02-18 19:52:51','Awaiting check payment Order status changed from Pending payment to On hold.',0,'1','','order_note',0,0),(29,5108,'WooCommerce','woocommerce@themes.radiantthemes.com','','','2019-02-25 02:23:16','2019-02-25 02:23:16','Awaiting check payment Order status changed from Pending payment to On hold.',0,'1','','order_note',0,0),(31,5110,'WooCommerce','woocommerce@themes.radiantthemes.com','','','2019-02-25 13:02:36','2019-02-25 13:02:36','Awaiting check payment Order status changed from Pending payment to On hold.',0,'1','','order_note',0,0),(4304,7984,'sikis izle','sharonbrown13137@comcast.net','https://filmkovasi.org/','51.158.153.224','2020-11-14 17:59:48','2020-11-14 17:59:48','Very good article! We will be linking to this great article on our site. Keep up the good writing. Modesty Cob Guinn',0,'1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4251.0 Safari/537.36','comment',0,0),(4306,7984,'abraham triglia','Engnath@gmail.com','http://www.doeda.vip/','148.251.86.3','2020-12-04 19:42:25','2020-12-04 19:42:25','You made some nice points there. I looked on the internet for the subject matter and found most individuals will agree with your site.',0,'0','Mozilla/5.0 (Windows; U; Windows NT 6.1; ru; rv:1.9.2.3) Gecko/20100401 Firefox/4.0 (.NET CLR 3.5.30729)','comment',0,0),(4307,7984,'debrah fatzinger','Netto@gmail.com','http://www.badtv.net/','148.251.86.3','2020-12-04 22:38:26','2020-12-04 22:38:26','Hello! I could have sworn I’ve been to this blog before but after browsing through some of the post I realized it’s new to me. Anyways, I’m definitely happy I found it and I’ll be book-marking and checking back frequently!',0,'1','Mozilla/5.0 (Windows; U; Windows NT 6.1; ru; rv:1.9.2.3) Gecko/20100401 Firefox/4.0 (.NET CLR 3.5.30729)','comment',0,0),(4308,7984,'norman stunkard','Mede@gmail.com','http://www.eviewporn.com/','148.251.86.3','2020-12-05 13:43:13','2020-12-05 13:43:13','You made some nice points there. I looked on the internet for the subject matter and found most individuals will agree with your site.',0,'0','Mozilla/5.0 (Windows; U; Windows NT 6.1; ru; rv:1.9.2.3) Gecko/20100401 Firefox/4.0 (.NET CLR 3.5.30729)','comment',0,0),(4309,7984,'abraham triglia','Casebeer@gmail.com','https://www.funzikporno.com/','148.251.86.3','2020-12-05 16:45:26','2020-12-05 16:45:26','You made some nice points there. I looked on the internet for the subject matter and found most individuals will agree with your site.',0,'0','Mozilla/5.0 (Windows; U; Windows NT 6.1; ru; rv:1.9.2.3) Gecko/20100401 Firefox/4.0 (.NET CLR 3.5.30729)','comment',0,0),(4310,7984,'ayana grissom','Munyon@yahoo.com','https://www.notmik.com/','148.251.86.3','2020-12-05 23:00:14','2020-12-05 23:00:14','You made some nice points there. I looked on the internet for the subject matter and found most individuals will agree with your site.',0,'1','Mozilla/5.0 (Windows; U; Windows NT 6.1; ru; rv:1.9.2.3) Gecko/20100401 Firefox/4.0 (.NET CLR 3.5.30729)','comment',0,0),(4311,7984,'Jane James','alphaomegadigitalau@gmail.com','https://alphaomegadigital.com.au','2001:8003:4311:2f01:40d4:e381:df99:2ae','2020-12-06 04:06:07','2020-12-06 04:06:07','Thanks. Do you use genesis too or haven’t made the leap as yet?',0,'1','Mozilla/5.0 (iPhone; CPU iPhone OS 14_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0.1 Mobile/15E148 Safari/604.1','comment',4310,1),(4312,7984,'Jane James','alphaomegadigitalau@gmail.com','https://alphaomegadigital.com.au','2001:8003:4311:2f01:40d4:e381:df99:2ae','2020-12-06 04:07:35','2020-12-06 04:07:35','You most likely haven’t because it is new! I do plan to continue to share content about genesis and I’m going to launch a video series on you tube once my podcasting equipment arrives ☺️',0,'1','Mozilla/5.0 (iPhone; CPU iPhone OS 14_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0.1 Mobile/15E148 Safari/604.1','comment',4307,1);
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


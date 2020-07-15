
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
DROP TABLE IF EXISTS `wpah_usermeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wpah_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wpah_usermeta` WRITE;
/*!40000 ALTER TABLE `wpah_usermeta` DISABLE KEYS */;
INSERT INTO `wpah_usermeta` VALUES (1,1,'nickname','Jane'),(2,1,'first_name',''),(3,1,'last_name',''),(4,1,'description','Front end developer and digital marketer'),(5,1,'rich_editing','true'),(6,1,'syntax_highlighting','true'),(7,1,'comment_shortcuts','false'),(8,1,'admin_color','fresh'),(9,1,'use_ssl','0'),(10,1,'show_admin_bar_front','true'),(11,1,'locale',''),(12,1,'wpah_capabilities','a:1:{s:13:\"administrator\";b:1;}'),(13,1,'wpah_user_level','10'),(14,1,'dismissed_wp_pointers','theme_editor_notice,vc_pointers_backend_editor,vc_pointers_frontend_editor,ampforwp_subscribe_pointer'),(15,1,'show_welcome_panel','1'),(16,1,'session_tokens','a:1:{s:64:\"adad164efae08c2bcc80665f3b1a5742e33ba7efa18f9d05a405b385b4171245\";a:4:{s:10:\"expiration\";i:1594944127;s:2:\"ip\";s:15:\"101.173.167.105\";s:2:\"ua\";s:121:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36\";s:5:\"login\";i:1594771327;}}'),(17,1,'wpah_dashboard_quick_press_last_post_id','7053'),(18,1,'community-events-location','a:1:{s:2:\"ip\";s:12:\"101.176.98.0\";}'),(19,1,'_woocommerce_tracks_anon_id','woo:S0tH66cmMa9wUtQUdVF3c0EQ'),(20,1,'jetpack_tracks_anon_id','jetpack:rM/DOUKl52wSuMf/XwpbN/ew'),(21,1,'jetpack_tracks_wpcom_id','107417124'),(22,1,'wc_last_active','1585008000'),(23,1,'dismissed_no_secure_connection_notice','1'),(24,1,'dismissed_template_files_notice','1'),(25,1,'wpah_r_tru_u_x','a:2:{s:2:\"id\";i:0;s:7:\"expires\";i:1573334807;}'),(26,1,'_order_count','0'),(27,1,'nav_menu_recently_edited','166'),(28,1,'managenav-menuscolumnshidden','a:5:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";i:4;s:15:\"title-attribute\";}'),(29,1,'metaboxhidden_nav-menus','a:14:{i:0;s:15:\"rt-menu-widgets\";i:1;s:21:\"add-post-type-product\";i:2;s:25:\"add-post-type-testimonial\";i:3;s:18:\"add-post-type-team\";i:4;s:23:\"add-post-type-portfolio\";i:5;s:26:\"add-post-type-case-studies\";i:6;s:20:\"add-post-type-client\";i:7;s:12:\"add-post_tag\";i:8;s:15:\"add-product_cat\";i:9;s:15:\"add-product_tag\";i:10;s:14:\"add-profession\";i:11;s:22:\"add-portfolio-category\";i:12;s:23:\"add-case-study-category\";i:13;s:19:\"rt-megamenu-setting\";}'),(34,1,'wpah_user-settings','edit_element_vcUIPanelWidth=650&edit_element_vcUIPanelLeft=446px&edit_element_vcUIPanelTop=102px&libraryContent=browse&editor=tinymce&imgsize=full&advImgDetails=show'),(35,1,'wpah_user-settings-time','1586133057'),(37,1,'_new_email','a:2:{s:4:\"hash\";s:32:\"6081a0ebc7936180adbf72fe61e451ec\";s:8:\"newemail\";s:28:\"jane@thealphaandomega.com.au\";}'),(38,1,'billing_first_name',''),(39,1,'billing_last_name',''),(40,1,'billing_company',''),(41,1,'billing_address_1',''),(42,1,'billing_address_2',''),(43,1,'billing_city',''),(44,1,'billing_postcode',''),(45,1,'billing_country',''),(46,1,'billing_state',''),(47,1,'billing_phone',''),(48,1,'billing_email','heny.jon112@gmail.com'),(49,1,'shipping_first_name',''),(50,1,'shipping_last_name',''),(51,1,'shipping_company',''),(52,1,'shipping_address_1',''),(53,1,'shipping_address_2',''),(54,1,'shipping_city',''),(55,1,'shipping_postcode',''),(56,1,'shipping_country',''),(57,1,'shipping_state',''),(58,1,'last_update','1574035704'),(79,1,'metaboxhidden_post','a:7:{i:0;s:22:\"genesis_inpost_seo_box\";i:1;s:10:\"postcustom\";i:3;s:16:\"commentstatusdiv\";i:4;s:11:\"commentsdiv\";i:5;s:7:\"slugdiv\";i:6;s:9:\"authordiv\";i:7;s:26:\"genesis_inpost_scripts_box\";}'),(80,1,'metaboxhidden_portfolio','a:7:{i:0;s:22:\"genesis_inpost_seo_box\";i:1;s:10:\"postcustom\";i:3;s:16:\"commentstatusdiv\";i:4;s:11:\"commentsdiv\";i:5;s:7:\"slugdiv\";i:6;s:9:\"authordiv\";i:7;s:26:\"genesis_inpost_scripts_box\";}'),(63,1,'closedpostboxes_page','a:1:{i:0;s:26:\"genesis_inpost_scripts_box\";}'),(64,1,'metaboxhidden_page','a:0:{}'),(68,1,'_yoast_wpseo_profile_updated','1575326830');
/*!40000 ALTER TABLE `wpah_usermeta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

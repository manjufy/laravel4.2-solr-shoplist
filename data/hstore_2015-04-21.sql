# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.22)
# Database: hstore
# Generation Time: 2015-04-21 06:56:39 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;

INSERT INTO `category` (`id`, `name`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`)
VALUES
	(7,'Mixers','Enter the description','manju','manju','2015-02-06 11:50:21','2015-02-06 11:50:21');

/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table country
# ------------------------------------------------------------

DROP TABLE IF EXISTS `country`;

CREATE TABLE `country` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;

INSERT INTO `country` (`id`, `name`, `code`, `created_by`, `updated_by`, `created_at`, `updated_at`)
VALUES
	(1,'Malaysia','My','manju','manju','2015-02-02 09:05:05','2015-02-06 12:44:25'),
	(2,'Indonesia','ID','manju','manju','2015-02-02 09:05:05','2015-02-06 14:51:32'),
	(4,'Thailand','TH','manju','manju','2015-02-06 14:08:24','2015-02-06 14:08:40'),
	(5,'United States of America','USA','manju','manju','2015-02-08 08:08:07','2015-02-08 08:08:07'),
	(6,'United Kingdom','UK','manju','manju','2015-02-08 08:08:15','2015-02-08 08:08:15'),
	(7,'Singapore','SG','manju','manju','2015-02-08 08:08:22','2015-02-08 08:08:22'),
	(8,'Australia','AUS','manju','manju','2015-02-08 08:08:28','2015-02-08 08:08:28');

/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`migration`, `batch`)
VALUES
	('2015_01_28_131719_create_user_table',1),
	('2015_02_01_052141_create_country_table',1),
	('2015_02_01_053132_create_state_table',1),
	('2015_02_01_053206_create_town_table',1),
	('2015_02_01_053341_create_category_table',1),
	('2015_02_01_053938_create_shop_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table shop
# ------------------------------------------------------------

DROP TABLE IF EXISTS `shop`;

CREATE TABLE `shop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `town` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `town_latitude` double DEFAULT NULL,
  `town_longitude` double DEFAULT NULL,
  `state` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(20) COLLATE utf8_unicode_ci DEFAULT '',
  `cperson` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `urlcom` varchar(250) COLLATE utf8_unicode_ci DEFAULT '',
  `urladv` varchar(250) COLLATE utf8_unicode_ci DEFAULT '',
  `rank` tinyint(3) unsigned NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `created_by` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `shop` WRITE;
/*!40000 ALTER TABLE `shop` DISABLE KEYS */;

INSERT INTO `shop` (`id`, `category`, `name`, `address`, `town`, `town_latitude`, `town_longitude`, `state`, `tel`, `fax`, `cperson`, `mobile`, `email`, `description`, `urlcom`, `urladv`, `rank`, `latitude`, `longitude`, `created_by`, `updated_by`, `created_at`, `updated_at`)
VALUES
	(1,'Mixers','Abc Sdn Bhd 123','Test 123','Bangsar',3.1666667,101.7,'W.P. Kuala Lumpur','123','123123','Tests','12313','manju16832003@gmail.com','Testst 123','asdfasdf','asdfadsf',1,3.1666667,101.7,'login_82e5d2c56bdd0811318f0cf078b78bfc','login_82e5d2c56bdd0811318f0cf078b78bfc','2015-02-08 04:20:52','2015-02-09 14:58:11'),
	(2,'Mixers','XYZ Shop','Test','Test 123',3.1666667,101.7,'Negeri Sembilan','123123','1231','12313','12313','manju16832013@gmail.com','Test','asdfasdf','asdfadsf',2,3.1666667,101.7,'login_82e5d2c56bdd0811318f0cf078b78bfc','login_82e5d2c56bdd0811318f0cf078b78bfc','2015-02-08 07:10:28','2015-02-09 14:58:17'),
	(3,'Mixers','XSSSS Sdn Bhd','Test','Bangsar',3.1666667,101.7,'W.P. Kuala Lumpur','232323','131231','Tests','Test','Test@fasf.com','Testst','asdfasdf','asdfadsf',3,3.1666667,101.7,'login_82e5d2c56bdd0811318f0cf078b78bfc','login_82e5d2c56bdd0811318f0cf078b78bfc','2015-02-08 07:23:50','2015-02-09 14:58:24');

/*!40000 ALTER TABLE `shop` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table state
# ------------------------------------------------------------

DROP TABLE IF EXISTS `state`;

CREATE TABLE `state` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `state_country_id_foreign` (`country_id`),
  CONSTRAINT `state_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;

INSERT INTO `state` (`id`, `country_id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`)
VALUES
	(1,1,'Selangor','manju','manju','2014-04-02 06:51:38','2015-02-07 10:50:00'),
	(2,1,'Negeri Sembilan','System','manju','2014-04-02 06:51:38','2014-06-03 13:57:25'),
	(3,1,'W.P. Kuala Lumpur','System','manju','2014-04-02 06:51:38','2014-06-03 13:57:25'),
	(4,1,'Johor','System','manju','2014-04-02 06:51:38','2014-06-03 13:57:25'),
	(5,1,'Kedah','System','manju','2014-04-02 06:51:38','2014-06-03 13:57:25'),
	(6,1,'Kelantan','System','manju','2014-04-02 06:51:38','2014-06-03 13:57:25'),
	(7,1,'Melaka','System','manju','2014-04-02 06:51:38','2014-06-03 13:57:25'),
	(8,1,'Pahang','System','manju','2014-04-02 06:51:38','2014-06-03 13:57:25'),
	(9,1,'Pulau Pinang','System','manju','2014-04-02 06:51:38','2014-06-03 13:57:25'),
	(10,1,'Perak','System','manju','2014-04-02 06:51:38','2014-06-03 13:57:25'),
	(11,1,'Perlis','System','manju','2014-04-02 06:51:38','2014-06-03 13:57:25'),
	(12,1,'Terengganu','System','manju','2014-04-02 06:51:38','2014-06-03 13:57:25'),
	(13,1,'Sabah','System','manju','2014-04-02 06:51:38','2014-06-03 13:57:25'),
	(14,1,'Sarawak','System','manju','2014-04-02 06:51:38','2014-06-03 13:57:25'),
	(15,1,'W.P. Labuan','System','manju','2014-04-02 06:51:38','2014-06-03 13:57:25'),
	(16,1,'W.P. Putrajaya','System','manju','2014-04-02 06:51:38','2014-06-03 13:57:25'),
	(18,2,'Manju1233','manju','manju','2015-02-07 10:50:08','2015-02-07 10:50:24'),
	(19,1,'Testst','manju','manju','2015-02-07 13:32:17','2015-02-07 13:32:17'),
	(20,1,'dsfasdf','manju','manju','2015-02-07 13:32:38','2015-02-07 13:32:38');

/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table town
# ------------------------------------------------------------

DROP TABLE IF EXISTS `town`;

CREATE TABLE `town` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `state_id` int(10) unsigned NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `created_by` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `town_state_id_name_unique` (`state_id`,`name`),
  CONSTRAINT `town_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `town` WRITE;
/*!40000 ALTER TABLE `town` DISABLE KEYS */;

INSERT INTO `town` (`id`, `state_id`, `name`, `latitude`, `longitude`, `created_by`, `updated_by`, `created_at`, `updated_at`)
VALUES
	(1,1,'Puchong',3.1666667,101.7,'manju','manju','2015-02-07 13:50:14','2015-02-08 08:56:19'),
	(2,3,'Bangsar',3.1666667,101.7,'manju','manju','2015-02-07 13:53:10','2015-02-08 08:56:27'),
	(3,3,'Sri Petaling',3.1666667,101.7,'manju','manju','2015-02-07 14:03:10','2015-02-07 15:08:47'),
	(5,2,'Test 123',3.1666667,101.7,'manju','manju','2015-02-07 14:13:33','2015-02-07 15:08:24'),
	(6,3,'Bukit Jalil',3.1666667,101.7,'manju','manju','2015-02-07 14:26:36','2015-02-07 14:26:36'),
	(7,7,'Bandar Melaka',3.1666667,101.7,'manju','manju','2015-02-07 15:09:23','2015-02-07 15:09:23'),
	(8,6,'Bdr. Kelantan',3.1666667,101.7,'manju','manju','2015-02-07 15:09:40','2015-02-07 15:09:40'),
	(9,3,'Bukit Bintang',3.1666667,101.7,'manju','manju','2015-02-07 15:10:03','2015-02-07 15:10:03'),
	(10,3,'Sunway',3.1666667,101.7,'manju','manju','2015-02-07 15:10:17','2015-02-07 15:10:17'),
	(11,1,'Petaling Jaya',3.1666667,101.7,'manju','manju','2015-02-07 15:10:28','2015-02-07 15:10:28'),
	(12,3,'Bangsar South',22,22,'manju','manju','2015-02-09 13:31:47','2015-02-09 13:31:47');

/*!40000 ALTER TABLE `town` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `username`, `password`, `type`, `created_at`, `updated_at`, `remember_token`)
VALUES
	(4,'admin','$2y$10$3uZBGbuG25CowqA6LxUNDubFLVlcB4r1sNGGIVzXBPcAJJ9hY.gQS','','2015-04-21 06:55:10','2015-04-21 06:55:10',NULL);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

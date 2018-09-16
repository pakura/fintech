# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.23-0ubuntu0.16.04.1)
# Database: bog
# Generation Time: 2018-09-16 04:06:41 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table apiLogs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `apiLogs`;

CREATE TABLE `apiLogs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `app` varchar(255) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `request` longtext,
  `response` longtext,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `apiLogs` WRITE;
/*!40000 ALTER TABLE `apiLogs` DISABLE KEYS */;

INSERT INTO `apiLogs` (`id`, `app`, `method`, `request`, `response`, `status`, `created_at`, `updated_at`)
VALUES
	(1,NULL,'companies','[]','{\"error\":0,\"data\":[],\"msg\":\"Success\"}',0,'2018-09-16 00:49:55',NULL),
	(2,NULL,'companies','[]','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:30:30\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 00:50:40',NULL),
	(3,NULL,'coupons','[]','{\"error\":401,\"data\":null,\"msg\":\"http.401\"}',401,'2018-09-16 00:56:40',NULL),
	(4,NULL,'coupons','{\"apiKey\":\"WEB-356f7fa5fee4226643cd15d881ab4b19\"}','{\"error\":0,\"data\":[],\"msg\":\"Success\"}',0,'2018-09-16 00:56:57',NULL),
	(5,NULL,'coupons','{\"apiKey\":\"WEB-356f7fa5fee4226643cd15d881ab4b19\",\"company_id\":\"1\"}','{\"error\":0,\"data\":[],\"msg\":\"Success\"}',0,'2018-09-16 00:57:11',NULL),
	(6,NULL,'companies','{\"apiKey\":\"WEB-356f7fa5fee4226643cd15d881ab4b19\",\"company_id\":\"1\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:30:30\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 00:57:25',NULL),
	(7,NULL,'coupons','{\"apiKey\":\"WEB-356f7fa5fee4226643cd15d881ab4b19\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 00:00:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":10,\"visible\":1,\"position\":1,\"codes\":[]}],\"msg\":\"Success\"}',0,'2018-09-16 00:57:34',NULL),
	(8,NULL,'coupons','{\"apiKey\":\"WEB-356f7fa5fee4226643cd15d881ab4b19\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 00:00:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":10,\"visible\":1,\"position\":1,\"codes\":[{\"id\":1,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"dkDgN99FQx7DEPa8\",\"status\":1,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":2,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"nINcJOjzq0T5O32o\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":3,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"aZVgYDTov679kyhC\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":4,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"fAWccjdm7bnS97EN\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":5,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"7ULNsFn7s2zu8RjJ\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":6,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"xwHsJVvKlRhIwelZ\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":7,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"BMNrezf9m8pW7Xft\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":8,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"a52G5FjLp043DLMM\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":9,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"SSZjQMv1BBDeYBjw\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":10,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"M55JsW1w9jdGGSBS\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null}]}],\"msg\":\"Success\"}',0,'2018-09-16 00:58:30',NULL),
	(9,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:30:30\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 01:02:03',NULL),
	(10,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:30:30\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 01:24:34',NULL),
	(11,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:30:30\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 01:25:52',NULL),
	(12,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:30:30\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 01:26:12',NULL),
	(13,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:30:30\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 01:27:19',NULL),
	(14,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:30:30\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 01:28:01',NULL),
	(15,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:30:30\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 01:28:45',NULL),
	(16,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:30:30\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 01:28:49',NULL),
	(17,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:30:30\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 01:29:26',NULL),
	(18,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:30:30\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 01:31:07',NULL),
	(19,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:30:30\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 01:32:46',NULL),
	(20,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:30:30\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 01:33:02',NULL),
	(21,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:30:30\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 00:00:00\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 01:36:34',NULL),
	(22,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:30:30\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 00:00:00\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 01:36:42',NULL),
	(23,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:30:30\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 00:00:00\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 01:37:48',NULL),
	(24,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:30:30\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 00:00:00\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 01:39:31',NULL),
	(25,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:30:30\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 00:00:00\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 01:40:02',NULL),
	(26,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:30:30\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 00:00:00\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 01:40:04',NULL),
	(27,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:30:30\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 00:00:00\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 01:47:55',NULL),
	(28,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:30:30\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 00:00:00\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 01:48:12',NULL),
	(29,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:30:30\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 00:00:00\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 01:54:41',NULL),
	(30,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 00:00:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":10,\"visible\":1,\"position\":1,\"codes\":[{\"id\":1,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"dkDgN99FQx7DEPa8\",\"status\":1,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null}]}],\"msg\":\"Success\"}',0,'2018-09-16 01:54:43',NULL),
	(31,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:30:30\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 00:00:00\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 01:57:56',NULL),
	(32,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 00:00:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":10,\"visible\":1,\"position\":1,\"codes\":[{\"id\":1,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"dkDgN99FQx7DEPa8\",\"status\":1,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null}]}],\"msg\":\"Success\"}',0,'2018-09-16 01:57:56',NULL),
	(33,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 00:00:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":10,\"visible\":1,\"position\":1,\"codes\":[{\"id\":1,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"dkDgN99FQx7DEPa8\",\"status\":1,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null}]}],\"msg\":\"Success\"}',0,'2018-09-16 01:57:57',NULL),
	(34,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:30:30\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 00:00:00\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 02:01:34',NULL),
	(35,NULL,'purchase','{\"user_id\":\"2\",\"service_id\":\"1\",\"type_id\":\"6\",\"order_date\":\"2018-09-13\",\"order_time\":\"13:00:00\",\"project_id\":\"1\",\"building_id\":\"1\",\"flat_id\":\"1\",\"email\":\"vaja@mobility.ge\",\"password\":\"pak100\",\"time\":\"15:00\",\"apiKey\":\"WEB-356f7fa5fee4226643cd15d881ab4b19\",\"code\":\"dkDgN99FQx7DEPa8\"}','{\"error\":\"1001\",\"data\":null,\"msg\":\"http.1001\"}',1001,'2018-09-16 02:24:22',NULL),
	(36,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:30:30\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 00:00:00\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 02:26:24',NULL),
	(37,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 00:00:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":10,\"visible\":1,\"position\":1,\"codes\":[{\"id\":1,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"dkDgN99FQx7DEPa8\",\"status\":1,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null}]}],\"msg\":\"Success\"}',0,'2018-09-16 02:26:26',NULL),
	(38,NULL,'purchase','{\"user_id\":\"2\",\"service_id\":\"1\",\"type_id\":\"6\",\"order_date\":\"2018-09-13\",\"order_time\":\"13:00:00\",\"project_id\":\"1\",\"building_id\":\"1\",\"flat_id\":\"1\",\"email\":\"vaja@mobility.ge\",\"password\":\"pak100\",\"time\":\"15:00\",\"apiKey\":\"WEB-356f7fa5fee4226643cd15d881ab4b19\",\"code\":\"7ULNsFn7s2zu8RjJ\",\"user_account\":\"test\",\"username\":\"vaja\"}','{\"error\":0,\"data\":\"Geixare ojaxshi\",\"msg\":\"Success\"}',0,'2018-09-16 02:31:12',NULL),
	(39,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 02:34:48',NULL),
	(40,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 00:00:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":10,\"visible\":1,\"position\":1,\"codes\":[{\"id\":1,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"dkDgN99FQx7DEPa8\",\"status\":1,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":5,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"7ULNsFn7s2zu8RjJ\",\"status\":1,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":\"2018-09-16 02:31:12\"}]}],\"msg\":\"Success\"}',0,'2018-09-16 02:34:49',NULL),
	(41,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 02:36:10',NULL),
	(42,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"5\"}','{\"error\":0,\"data\":[{\"id\":2,\"coupons_id\":2,\"language\":\"ka\",\"title\":\"Gold\",\"meta_desc\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":\"2018-09-16 01:42:37\",\"coupons_language_id\":3,\"collection_id\":2,\"price\":200,\"company_id\":5,\"total_count\":10,\"visible\":1,\"position\":2,\"codes\":[]}],\"msg\":\"Success\"}',0,'2018-09-16 02:36:12',NULL),
	(43,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 02:37:38',NULL),
	(44,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"5\"}','{\"error\":0,\"data\":[{\"id\":2,\"coupons_id\":2,\"language\":\"ka\",\"title\":\"Gold\",\"meta_desc\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":\"2018-09-16 01:42:37\",\"coupons_language_id\":3,\"collection_id\":2,\"price\":200,\"company_id\":5,\"total_count\":10,\"visible\":1,\"position\":2,\"codes\":[]}],\"msg\":\"Success\"}',0,'2018-09-16 02:37:40',NULL),
	(45,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 02:38:23',NULL),
	(46,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"5\"}','{\"error\":0,\"data\":[{\"id\":2,\"coupons_id\":2,\"language\":\"ka\",\"title\":\"Gold\",\"meta_desc\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":\"2018-09-16 01:42:37\",\"coupons_language_id\":3,\"collection_id\":2,\"price\":200,\"company_id\":5,\"total_count\":10,\"visible\":1,\"position\":2,\"codes\":[]}],\"msg\":\"Success\"}',0,'2018-09-16 02:38:25',NULL),
	(47,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 02:39:02',NULL),
	(48,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"5\"}','{\"error\":0,\"data\":[{\"id\":2,\"coupons_id\":2,\"language\":\"ka\",\"title\":\"Gold\",\"meta_desc\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":\"2018-09-16 01:42:37\",\"coupons_language_id\":3,\"collection_id\":2,\"price\":200,\"company_id\":5,\"total_count\":10,\"visible\":1,\"position\":2,\"codes\":[]}],\"msg\":\"Success\"}',0,'2018-09-16 02:39:04',NULL),
	(49,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 02:39:08',NULL),
	(50,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 00:00:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":10,\"visible\":1,\"position\":1,\"codes\":[{\"id\":1,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"dkDgN99FQx7DEPa8\",\"status\":1,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":5,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"7ULNsFn7s2zu8RjJ\",\"status\":1,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":\"2018-09-16 02:31:12\"}]}],\"msg\":\"Success\"}',0,'2018-09-16 02:39:09',NULL),
	(51,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 02:39:34',NULL),
	(52,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 00:00:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":10,\"visible\":1,\"position\":1,\"codes\":[{\"id\":1,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"dkDgN99FQx7DEPa8\",\"status\":1,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":5,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"7ULNsFn7s2zu8RjJ\",\"status\":1,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":\"2018-09-16 02:31:12\"}]}],\"msg\":\"Success\"}',0,'2018-09-16 02:39:35',NULL),
	(53,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 02:39:43',NULL),
	(54,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"5\"}','{\"error\":0,\"data\":[{\"id\":2,\"coupons_id\":2,\"language\":\"ka\",\"title\":\"Gold\",\"meta_desc\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":\"2018-09-16 01:42:37\",\"coupons_language_id\":3,\"collection_id\":2,\"price\":200,\"company_id\":5,\"total_count\":10,\"visible\":1,\"position\":2,\"codes\":[]}],\"msg\":\"Success\"}',0,'2018-09-16 02:39:45',NULL),
	(55,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 02:40:05',NULL),
	(56,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 00:00:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":10,\"visible\":1,\"position\":1,\"codes\":[{\"id\":1,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"dkDgN99FQx7DEPa8\",\"status\":1,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":5,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"7ULNsFn7s2zu8RjJ\",\"status\":1,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":\"2018-09-16 02:31:12\"}]}],\"msg\":\"Success\"}',0,'2018-09-16 02:40:05',NULL),
	(57,NULL,'coupons','{\"apiKey\":\"WEB-356f7fa5fee4226643cd15d881ab4b19\",\"code\":\"7ULNsFn7s2zu8RjJ\",\"user_account\":\"test\",\"username\":\"vaja\",\"company_id\":\"5\"}','{\"error\":0,\"data\":[{\"id\":2,\"coupons_id\":2,\"language\":\"ka\",\"title\":\"Gold\",\"meta_desc\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":\"2018-09-16 01:42:37\",\"coupons_language_id\":3,\"collection_id\":2,\"price\":200,\"company_id\":5,\"total_count\":10,\"visible\":1,\"position\":2,\"codes\":[]}],\"msg\":\"Success\"}',0,'2018-09-16 02:41:50',NULL),
	(58,NULL,'coupons','{\"apiKey\":\"WEB-356f7fa5fee4226643cd15d881ab4b19\",\"code\":\"7ULNsFn7s2zu8RjJ\",\"user_account\":\"test\",\"username\":\"vaja\",\"company_id\":\"5\"}','{\"error\":0,\"data\":[{\"id\":2,\"coupons_id\":2,\"language\":\"ka\",\"title\":\"Gold\",\"meta_desc\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":\"2018-09-16 01:42:37\",\"coupons_language_id\":3,\"collection_id\":2,\"price\":200,\"company_id\":5,\"total_count\":10,\"visible\":1,\"position\":2,\"codes\":[{\"id\":11,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"cZSytBPjve2mfESf\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":12,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"g1El3ifeIj5kTmAA\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":13,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"zly4WAJRBWVlRysF\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":14,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"EnLIXXoOsKBJ8Utx\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":15,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"JT2LyCjWbUBvUX1v\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":16,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"xthZlsODXOauaSNY\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":17,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"tMEDkJOxQsIVSS7q\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":18,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"Z8a8OzWCk55WdB4P\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":19,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"oqkVLWvNhINEXSYO\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":20,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"AkwYQ5UargLdD0PR\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null}]}],\"msg\":\"Success\"}',0,'2018-09-16 02:43:24',NULL),
	(59,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 02:44:40',NULL),
	(60,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 00:00:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":10,\"visible\":1,\"position\":1,\"codes\":[{\"id\":2,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"nINcJOjzq0T5O32o\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":3,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"aZVgYDTov679kyhC\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":4,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"fAWccjdm7bnS97EN\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":6,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"xwHsJVvKlRhIwelZ\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":7,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"BMNrezf9m8pW7Xft\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":8,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"a52G5FjLp043DLMM\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":9,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"SSZjQMv1BBDeYBjw\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":10,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"M55JsW1w9jdGGSBS\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null}]}],\"msg\":\"Success\"}',0,'2018-09-16 02:44:40',NULL),
	(61,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"5\"}','{\"error\":0,\"data\":[{\"id\":2,\"coupons_id\":2,\"language\":\"ka\",\"title\":\"Gold\",\"meta_desc\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":\"2018-09-16 01:42:37\",\"coupons_language_id\":3,\"collection_id\":2,\"price\":200,\"company_id\":5,\"total_count\":10,\"visible\":1,\"position\":2,\"codes\":[{\"id\":11,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"cZSytBPjve2mfESf\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":12,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"g1El3ifeIj5kTmAA\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":13,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"zly4WAJRBWVlRysF\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":14,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"EnLIXXoOsKBJ8Utx\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":15,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"JT2LyCjWbUBvUX1v\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":16,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"xthZlsODXOauaSNY\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":17,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"tMEDkJOxQsIVSS7q\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":18,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"Z8a8OzWCk55WdB4P\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":19,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"oqkVLWvNhINEXSYO\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":20,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"AkwYQ5UargLdD0PR\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null}]}],\"msg\":\"Success\"}',0,'2018-09-16 02:44:43',NULL),
	(62,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 02:45:38',NULL),
	(63,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"5\"}','{\"error\":0,\"data\":[{\"id\":2,\"coupons_id\":2,\"language\":\"ka\",\"title\":\"Gold\",\"meta_desc\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":\"2018-09-16 01:42:37\",\"coupons_language_id\":3,\"collection_id\":2,\"price\":200,\"company_id\":5,\"total_count\":10,\"visible\":1,\"position\":2,\"codes\":[{\"id\":11,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"cZSytBPjve2mfESf\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":12,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"g1El3ifeIj5kTmAA\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":13,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"zly4WAJRBWVlRysF\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":14,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"EnLIXXoOsKBJ8Utx\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":15,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"JT2LyCjWbUBvUX1v\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":16,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"xthZlsODXOauaSNY\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":17,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"tMEDkJOxQsIVSS7q\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":18,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"Z8a8OzWCk55WdB4P\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":19,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"oqkVLWvNhINEXSYO\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":20,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"AkwYQ5UargLdD0PR\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null}]}],\"msg\":\"Success\"}',0,'2018-09-16 02:45:39',NULL),
	(64,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 02:46:07',NULL),
	(65,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 00:00:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":10,\"visible\":1,\"position\":1,\"codes\":[{\"id\":2,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"nINcJOjzq0T5O32o\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":3,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"aZVgYDTov679kyhC\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":4,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"fAWccjdm7bnS97EN\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":6,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"xwHsJVvKlRhIwelZ\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":7,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"BMNrezf9m8pW7Xft\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":8,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"a52G5FjLp043DLMM\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":9,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"SSZjQMv1BBDeYBjw\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":10,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"M55JsW1w9jdGGSBS\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null}]}],\"msg\":\"Success\"}',0,'2018-09-16 02:46:08',NULL),
	(66,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 02:47:24',NULL),
	(67,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 00:00:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":10,\"visible\":1,\"position\":1,\"codes\":[{\"id\":2,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"nINcJOjzq0T5O32o\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":3,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"aZVgYDTov679kyhC\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":4,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"fAWccjdm7bnS97EN\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":6,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"xwHsJVvKlRhIwelZ\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":7,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"BMNrezf9m8pW7Xft\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":8,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"a52G5FjLp043DLMM\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":9,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"SSZjQMv1BBDeYBjw\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":10,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"M55JsW1w9jdGGSBS\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null}]}],\"msg\":\"Success\"}',0,'2018-09-16 02:47:25',NULL),
	(68,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 02:48:14',NULL),
	(69,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 00:00:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":10,\"visible\":1,\"position\":1,\"codes\":[{\"id\":2,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"nINcJOjzq0T5O32o\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":3,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"aZVgYDTov679kyhC\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":4,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"fAWccjdm7bnS97EN\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":6,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"xwHsJVvKlRhIwelZ\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":7,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"BMNrezf9m8pW7Xft\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":8,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"a52G5FjLp043DLMM\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":9,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"SSZjQMv1BBDeYBjw\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":10,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"M55JsW1w9jdGGSBS\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null}]}],\"msg\":\"Success\"}',0,'2018-09-16 02:48:16',NULL),
	(70,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 02:48:53',NULL),
	(71,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"5\"}','{\"error\":0,\"data\":[{\"id\":2,\"coupons_id\":2,\"language\":\"ka\",\"title\":\"Gold\",\"meta_desc\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":\"2018-09-16 01:42:37\",\"coupons_language_id\":3,\"collection_id\":2,\"price\":200,\"company_id\":5,\"total_count\":10,\"visible\":1,\"position\":2,\"codes\":[{\"id\":11,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"cZSytBPjve2mfESf\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":12,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"g1El3ifeIj5kTmAA\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":13,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"zly4WAJRBWVlRysF\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":14,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"EnLIXXoOsKBJ8Utx\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":15,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"JT2LyCjWbUBvUX1v\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":16,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"xthZlsODXOauaSNY\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":17,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"tMEDkJOxQsIVSS7q\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":18,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"Z8a8OzWCk55WdB4P\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":19,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"oqkVLWvNhINEXSYO\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":20,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"AkwYQ5UargLdD0PR\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null}]}],\"msg\":\"Success\"}',0,'2018-09-16 02:48:54',NULL),
	(72,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 02:48:56',NULL),
	(73,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 00:00:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":10,\"visible\":1,\"position\":1,\"codes\":[{\"id\":2,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"nINcJOjzq0T5O32o\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":3,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"aZVgYDTov679kyhC\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":4,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"fAWccjdm7bnS97EN\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":6,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"xwHsJVvKlRhIwelZ\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":7,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"BMNrezf9m8pW7Xft\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":8,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"a52G5FjLp043DLMM\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":9,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"SSZjQMv1BBDeYBjw\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":10,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"M55JsW1w9jdGGSBS\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null}]}],\"msg\":\"Success\"}',0,'2018-09-16 02:48:57',NULL),
	(74,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 02:49:34',NULL),
	(75,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 00:00:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":10,\"visible\":1,\"position\":1,\"codes\":[{\"id\":2,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"nINcJOjzq0T5O32o\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":3,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"aZVgYDTov679kyhC\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":4,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"fAWccjdm7bnS97EN\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":6,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"xwHsJVvKlRhIwelZ\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":7,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"BMNrezf9m8pW7Xft\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":8,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"a52G5FjLp043DLMM\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":9,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"SSZjQMv1BBDeYBjw\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":10,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"M55JsW1w9jdGGSBS\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null}]}],\"msg\":\"Success\"}',0,'2018-09-16 02:49:35',NULL),
	(76,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 02:49:57',NULL),
	(77,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 00:00:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":10,\"visible\":1,\"position\":1,\"codes\":[{\"id\":2,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"nINcJOjzq0T5O32o\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":3,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"aZVgYDTov679kyhC\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":4,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"fAWccjdm7bnS97EN\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":6,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"xwHsJVvKlRhIwelZ\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":7,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"BMNrezf9m8pW7Xft\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":8,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"a52G5FjLp043DLMM\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":9,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"SSZjQMv1BBDeYBjw\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":10,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"M55JsW1w9jdGGSBS\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null}]}],\"msg\":\"Success\"}',0,'2018-09-16 02:49:58',NULL),
	(78,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 02:50:49',NULL),
	(79,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 00:00:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":10,\"visible\":1,\"position\":1,\"codes\":[{\"id\":2,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"nINcJOjzq0T5O32o\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":3,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"aZVgYDTov679kyhC\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":4,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"fAWccjdm7bnS97EN\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":6,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"xwHsJVvKlRhIwelZ\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":7,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"BMNrezf9m8pW7Xft\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":8,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"a52G5FjLp043DLMM\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":9,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"SSZjQMv1BBDeYBjw\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":10,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"M55JsW1w9jdGGSBS\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null}]}],\"msg\":\"Success\"}',0,'2018-09-16 02:50:50',NULL),
	(80,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 02:50:53',NULL),
	(81,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"5\"}','{\"error\":0,\"data\":[{\"id\":2,\"coupons_id\":2,\"language\":\"ka\",\"title\":\"Gold\",\"meta_desc\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":\"2018-09-16 01:42:37\",\"coupons_language_id\":3,\"collection_id\":2,\"price\":200,\"company_id\":5,\"total_count\":10,\"visible\":1,\"position\":2,\"codes\":[{\"id\":11,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"cZSytBPjve2mfESf\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":12,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"g1El3ifeIj5kTmAA\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":13,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"zly4WAJRBWVlRysF\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":14,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"EnLIXXoOsKBJ8Utx\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":15,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"JT2LyCjWbUBvUX1v\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":16,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"xthZlsODXOauaSNY\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":17,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"tMEDkJOxQsIVSS7q\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":18,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"Z8a8OzWCk55WdB4P\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":19,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"oqkVLWvNhINEXSYO\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":20,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"AkwYQ5UargLdD0PR\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null}]}],\"msg\":\"Success\"}',0,'2018-09-16 02:50:54',NULL),
	(82,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 02:57:19',NULL),
	(83,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 00:00:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":10,\"visible\":1,\"position\":1,\"codes\":[{\"id\":2,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"nINcJOjzq0T5O32o\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":3,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"aZVgYDTov679kyhC\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":4,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"fAWccjdm7bnS97EN\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":6,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"xwHsJVvKlRhIwelZ\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":7,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"BMNrezf9m8pW7Xft\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":8,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"a52G5FjLp043DLMM\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":9,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"SSZjQMv1BBDeYBjw\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":10,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"M55JsW1w9jdGGSBS\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null}]}],\"msg\":\"Success\"}',0,'2018-09-16 02:57:21',NULL),
	(84,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 00:00:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":10,\"visible\":1,\"position\":1,\"codes\":[{\"id\":2,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"nINcJOjzq0T5O32o\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":3,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"aZVgYDTov679kyhC\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":4,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"fAWccjdm7bnS97EN\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":6,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"xwHsJVvKlRhIwelZ\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":7,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"BMNrezf9m8pW7Xft\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":8,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"a52G5FjLp043DLMM\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":9,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"SSZjQMv1BBDeYBjw\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":10,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"M55JsW1w9jdGGSBS\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null}]}],\"msg\":\"Success\"}',0,'2018-09-16 02:57:37',NULL),
	(85,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 02:57:39',NULL),
	(86,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"5\"}','{\"error\":0,\"data\":[{\"id\":2,\"coupons_id\":2,\"language\":\"ka\",\"title\":\"Gold\",\"meta_desc\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":\"2018-09-16 01:42:37\",\"coupons_language_id\":3,\"collection_id\":2,\"price\":200,\"company_id\":5,\"total_count\":10,\"visible\":1,\"position\":2,\"codes\":[{\"id\":11,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"cZSytBPjve2mfESf\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":12,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"g1El3ifeIj5kTmAA\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":13,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"zly4WAJRBWVlRysF\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":14,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"EnLIXXoOsKBJ8Utx\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":15,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"JT2LyCjWbUBvUX1v\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":16,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"xthZlsODXOauaSNY\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":17,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"tMEDkJOxQsIVSS7q\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":18,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"Z8a8OzWCk55WdB4P\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":19,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"oqkVLWvNhINEXSYO\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":20,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"AkwYQ5UargLdD0PR\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null}]}],\"msg\":\"Success\"}',0,'2018-09-16 02:57:44',NULL),
	(87,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"5\"}','{\"error\":0,\"data\":[{\"id\":2,\"coupons_id\":2,\"language\":\"ka\",\"title\":\"Gold\",\"meta_desc\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":\"2018-09-16 01:42:37\",\"coupons_language_id\":3,\"collection_id\":2,\"price\":200,\"company_id\":5,\"total_count\":10,\"visible\":1,\"position\":2,\"codes\":[{\"id\":11,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"cZSytBPjve2mfESf\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":12,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"g1El3ifeIj5kTmAA\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":13,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"zly4WAJRBWVlRysF\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":14,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"EnLIXXoOsKBJ8Utx\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":15,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"JT2LyCjWbUBvUX1v\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":16,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"xthZlsODXOauaSNY\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":17,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"tMEDkJOxQsIVSS7q\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":18,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"Z8a8OzWCk55WdB4P\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":19,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"oqkVLWvNhINEXSYO\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":20,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"AkwYQ5UargLdD0PR\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null}]}],\"msg\":\"Success\"}',0,'2018-09-16 02:58:35',NULL),
	(88,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:03:28',NULL),
	(89,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 00:00:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":10,\"visible\":1,\"position\":1,\"codes\":[{\"id\":2,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"nINcJOjzq0T5O32o\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":3,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"aZVgYDTov679kyhC\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":4,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"fAWccjdm7bnS97EN\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":6,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"xwHsJVvKlRhIwelZ\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":7,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"BMNrezf9m8pW7Xft\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":8,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"a52G5FjLp043DLMM\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":9,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"SSZjQMv1BBDeYBjw\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":10,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"M55JsW1w9jdGGSBS\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null}]}],\"msg\":\"Success\"}',0,'2018-09-16 03:03:30',NULL),
	(90,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:05:55',NULL),
	(91,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 00:00:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":10,\"visible\":1,\"position\":1,\"codes\":[{\"id\":2,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"nINcJOjzq0T5O32o\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":3,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"aZVgYDTov679kyhC\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":4,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"fAWccjdm7bnS97EN\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":6,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"xwHsJVvKlRhIwelZ\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":7,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"BMNrezf9m8pW7Xft\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":8,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"a52G5FjLp043DLMM\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":9,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"SSZjQMv1BBDeYBjw\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null},{\"id\":10,\"collection_id\":3,\"company_id\":4,\"coupon_id\":1,\"code\":\"M55JsW1w9jdGGSBS\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 00:00:56\",\"updated_at\":null}]}],\"msg\":\"Success\"}',0,'2018-09-16 03:05:56',NULL),
	(92,NULL,'purchase','{\"user_id\":\"2\",\"service_id\":\"1\",\"type_id\":\"6\",\"order_date\":\"2018-09-13\",\"order_time\":\"13:00:00\",\"project_id\":\"1\",\"building_id\":\"1\",\"flat_id\":\"1\",\"email\":\"vaja@mobility.ge\",\"password\":\"pak100\",\"time\":\"15:00\",\"apiKey\":\"WEB-356f7fa5fee4226643cd15d881ab4b19\",\"coupon_id\":\"2\",\"user_account\":\"test\",\"username\":\"vaja\",\"company_id\":\"5\"}','{\"error\":0,\"data\":\"Geixare ojaxshi\",\"msg\":\"Success\"}',0,'2018-09-16 03:07:46',NULL),
	(93,NULL,'coupons','{\"apiKey\":\"WEB-356f7fa5fee4226643cd15d881ab4b19\",\"coupon_id\":\"2\",\"user_account\":\"test\",\"username\":\"vaja\",\"company_id\":\"5\"}','{\"error\":0,\"data\":[{\"id\":2,\"coupons_id\":2,\"language\":\"ka\",\"title\":\"Gold\",\"meta_desc\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":\"2018-09-16 01:42:37\",\"coupons_language_id\":3,\"collection_id\":2,\"price\":200,\"company_id\":5,\"total_count\":10,\"visible\":1,\"position\":2,\"codes\":[{\"id\":11,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"cZSytBPjve2mfESf\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":12,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"g1El3ifeIj5kTmAA\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":13,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"zly4WAJRBWVlRysF\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":14,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"EnLIXXoOsKBJ8Utx\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":15,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"JT2LyCjWbUBvUX1v\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":16,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"xthZlsODXOauaSNY\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":17,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"tMEDkJOxQsIVSS7q\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":18,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"Z8a8OzWCk55WdB4P\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":19,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"oqkVLWvNhINEXSYO\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},{\"id\":20,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"AkwYQ5UargLdD0PR\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null}]}],\"msg\":\"Success\"}',0,'2018-09-16 03:08:16',NULL),
	(94,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:19:01',NULL),
	(95,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"5\"}','{\"error\":0,\"data\":[{\"id\":2,\"coupons_id\":2,\"language\":\"ka\",\"title\":\"Gold\",\"meta_desc\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":\"2018-09-16 01:42:37\",\"coupons_language_id\":3,\"collection_id\":2,\"price\":200,\"company_id\":5,\"total_count\":10,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:19:03',NULL),
	(96,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"2\"}','{\"error\":0,\"data\":\"Geixare ojaxshi\",\"msg\":\"Success\"}',0,'2018-09-16 03:19:09',NULL),
	(97,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:19:48',NULL),
	(98,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"5\"}','{\"error\":0,\"data\":[{\"id\":2,\"coupons_id\":2,\"language\":\"ka\",\"title\":\"Gold\",\"meta_desc\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":\"2018-09-16 01:42:37\",\"coupons_language_id\":3,\"collection_id\":2,\"price\":200,\"company_id\":5,\"total_count\":10,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:19:49',NULL),
	(99,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"2\"}','{\"error\":0,\"data\":\"Geixare ojaxshi\",\"msg\":\"Success\"}',0,'2018-09-16 03:19:54',NULL),
	(100,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"5\"}','{\"error\":0,\"data\":[{\"id\":2,\"coupons_id\":2,\"language\":\"ka\",\"title\":\"Gold\",\"meta_desc\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":\"2018-09-16 01:42:37\",\"coupons_language_id\":3,\"collection_id\":2,\"price\":200,\"company_id\":5,\"total_count\":10,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:20:11',NULL),
	(101,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:20:49',NULL),
	(102,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"5\"}','{\"error\":0,\"data\":[{\"id\":2,\"coupons_id\":2,\"language\":\"ka\",\"title\":\"Gold\",\"meta_desc\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":\"2018-09-16 01:42:37\",\"coupons_language_id\":3,\"collection_id\":2,\"price\":200,\"company_id\":5,\"total_count\":10,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:20:51',NULL),
	(103,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"2\"}','{\"error\":0,\"data\":{\"id\":11,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"cZSytBPjve2mfESf\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},\"msg\":\"Success\"}',0,'2018-09-16 03:20:56',NULL),
	(104,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:21:41',NULL),
	(105,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"5\"}','{\"error\":0,\"data\":[{\"id\":2,\"coupons_id\":2,\"language\":\"ka\",\"title\":\"Gold\",\"meta_desc\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":\"2018-09-16 01:42:37\",\"coupons_language_id\":3,\"collection_id\":2,\"price\":200,\"company_id\":5,\"total_count\":10,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:21:42',NULL),
	(106,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"2\"}','{\"error\":0,\"data\":{\"id\":11,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"cZSytBPjve2mfESf\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},\"msg\":\"Success\"}',0,'2018-09-16 03:21:45',NULL),
	(107,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"2\"}','{\"error\":0,\"data\":{\"id\":11,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"cZSytBPjve2mfESf\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},\"msg\":\"Success\"}',0,'2018-09-16 03:22:13',NULL),
	(108,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"2\"}','{\"error\":0,\"data\":{\"id\":11,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"cZSytBPjve2mfESf\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},\"msg\":\"Success\"}',0,'2018-09-16 03:22:32',NULL),
	(109,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"5\"}','{\"error\":0,\"data\":[{\"id\":2,\"coupons_id\":2,\"language\":\"ka\",\"title\":\"Gold\",\"meta_desc\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":\"2018-09-16 01:42:37\",\"coupons_language_id\":3,\"collection_id\":2,\"price\":200,\"company_id\":5,\"total_count\":10,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:22:39',NULL),
	(110,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"2\"}','{\"error\":0,\"data\":{\"id\":11,\"collection_id\":3,\"company_id\":5,\"coupon_id\":2,\"code\":\"cZSytBPjve2mfESf\",\"status\":0,\"visible\":1,\"position\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":null},\"msg\":\"Success\"}',0,'2018-09-16 03:22:44',NULL),
	(111,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:24:01',NULL),
	(112,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"5\"}','{\"error\":0,\"data\":[{\"id\":2,\"coupons_id\":2,\"language\":\"ka\",\"title\":\"Gold\",\"meta_desc\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":\"2018-09-16 01:42:37\",\"coupons_language_id\":3,\"collection_id\":2,\"price\":200,\"company_id\":5,\"total_count\":10,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:24:02',NULL),
	(113,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:24:40',NULL),
	(114,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"5\"}','{\"error\":0,\"data\":[{\"id\":2,\"coupons_id\":2,\"language\":\"ka\",\"title\":\"Gold\",\"meta_desc\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":\"2018-09-16 01:42:37\",\"coupons_language_id\":3,\"collection_id\":2,\"price\":200,\"company_id\":5,\"total_count\":10,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:24:41',NULL),
	(115,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"2\"}','{\"error\":0,\"data\":\"geixare ojaxshi\",\"msg\":\"Success\"}',0,'2018-09-16 03:28:08',NULL),
	(116,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:28:16',NULL),
	(117,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"5\"}','{\"error\":0,\"data\":[{\"id\":2,\"coupons_id\":2,\"language\":\"ka\",\"title\":\"Gold\",\"meta_desc\":null,\"created_at\":\"2018-09-16 01:42:37\",\"updated_at\":\"2018-09-16 01:42:37\",\"coupons_language_id\":3,\"collection_id\":2,\"price\":200,\"company_id\":5,\"total_count\":10,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:28:17',NULL),
	(118,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"2\"}','{\"error\":0,\"data\":\"geixare ojaxshi\",\"msg\":\"Success\"}',0,'2018-09-16 03:28:20',NULL),
	(119,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"2\"}','{\"error\":0,\"data\":\"geixare ojaxshi\",\"msg\":\"Success\"}',0,'2018-09-16 03:28:30',NULL),
	(120,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:28:44',NULL),
	(121,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 00:00:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":10,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 03:28:45',NULL),
	(122,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"1\"}','{\"error\":0,\"data\":\"geixare ojaxshi\",\"msg\":\"Success\"}',0,'2018-09-16 03:28:48',NULL),
	(123,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 00:00:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":10,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 03:28:54',NULL),
	(124,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:29:20',NULL),
	(125,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 00:00:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":10,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 03:29:22',NULL),
	(126,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"1\"}','{\"error\":0,\"data\":\"geixare ojaxshi\",\"msg\":\"Success\"}',0,'2018-09-16 03:29:25',NULL),
	(127,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:35:50',NULL),
	(128,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 03:29:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":100,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 03:35:51',NULL),
	(129,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"1\"}','{\"error\":0,\"data\":\"geixare ojaxshi\",\"msg\":\"Success\"}',0,'2018-09-16 03:35:55',NULL),
	(130,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:39:31',NULL),
	(131,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 03:29:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":100,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 03:39:33',NULL),
	(132,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"1\"}','{\"error\":0,\"data\":\"geixare ojaxshi\",\"msg\":\"Success\"}',0,'2018-09-16 03:39:36',NULL),
	(133,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"1\"}','{\"error\":0,\"data\":\"geixare ojaxshi\",\"msg\":\"Success\"}',0,'2018-09-16 03:39:49',NULL),
	(134,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:40:10',NULL),
	(135,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 03:29:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":100,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 03:40:11',NULL),
	(136,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"1\"}','{\"error\":0,\"data\":\"geixare ojaxshi\",\"msg\":\"Success\"}',0,'2018-09-16 03:40:15',NULL),
	(137,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:45\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:42:53',NULL),
	(138,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 03:29:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":100,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 03:42:56',NULL),
	(139,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"1\"}','{\"error\":0,\"data\":\"geixare ojaxshi\",\"msg\":\"Success\"}',0,'2018-09-16 03:43:00',NULL),
	(140,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"1\"}','{\"error\":0,\"data\":\"geixare ojaxshi\",\"msg\":\"Success\"}',0,'2018-09-16 03:44:05',NULL),
	(141,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 03:47:04\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"site\":\"http:\\/\\/www.iciparis.ge\\/\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"site\":null,\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:50:36',NULL),
	(142,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 03:29:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":100,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 03:50:37',NULL),
	(143,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"1\"}','{\"error\":0,\"data\":\"geixare ojaxshi\",\"msg\":\"Success\"}',0,'2018-09-16 03:50:42',NULL),
	(144,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"1\"}','{\"error\":0,\"data\":\"geixare ojaxshi\",\"msg\":\"Success\"}',0,'2018-09-16 03:50:52',NULL),
	(145,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"1\"}','{\"error\":0,\"data\":\"geixare ojaxshi\",\"msg\":\"Success\"}',0,'2018-09-16 03:51:14',NULL),
	(146,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 03:47:04\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"site\":\"http:\\/\\/www.iciparis.ge\\/\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"site\":null,\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:52:55',NULL),
	(147,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 03:29:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":100,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 03:52:58',NULL),
	(148,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"1\"}','{\"error\":0,\"data\":\"geixare ojaxshi\",\"msg\":\"Success\"}',0,'2018-09-16 03:53:02',NULL),
	(149,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 03:47:04\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"site\":\"http:\\/\\/www.iciparis.ge\\/\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"site\":null,\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:53:08',NULL),
	(150,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 03:47:04\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"site\":\"http:\\/\\/www.iciparis.ge\\/\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"site\":null,\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:53:37',NULL),
	(151,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 03:29:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":100,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 03:53:39',NULL),
	(152,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"1\"}','{\"error\":0,\"data\":\"geixare ojaxshi\",\"msg\":\"Success\"}',0,'2018-09-16 03:53:49',NULL),
	(153,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 03:47:04\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"site\":\"http:\\/\\/www.iciparis.ge\\/\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"site\":null,\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:53:52',NULL),
	(154,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 03:47:04\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"site\":\"http:\\/\\/www.iciparis.ge\\/\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"site\":null,\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:54:50',NULL),
	(155,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 03:29:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":100,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 03:54:52',NULL),
	(156,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 03:47:04\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"site\":\"http:\\/\\/www.iciparis.ge\\/\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"site\":null,\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:55:01',NULL),
	(157,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 03:29:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":100,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 03:55:01',NULL),
	(158,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 03:29:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":100,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 03:55:04',NULL),
	(159,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 03:29:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":100,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 03:55:08',NULL),
	(160,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 03:47:04\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"site\":\"http:\\/\\/www.iciparis.ge\\/\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"site\":null,\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:55:08',NULL),
	(161,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 03:47:04\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"site\":\"http:\\/\\/www.iciparis.ge\\/\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"site\":null,\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:56:54',NULL),
	(162,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 03:29:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":100,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 03:56:56',NULL),
	(163,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"1\"}','{\"error\":0,\"data\":{\"url\":\"http:\\/\\/bog.devmobility.com\\/coupon\\/K0HFIVlL3T2znQCs\"},\"msg\":\"Success\"}',0,'2018-09-16 03:57:03',NULL),
	(164,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 03:47:04\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"site\":\"http:\\/\\/www.iciparis.ge\\/\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"site\":null,\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:57:58',NULL),
	(165,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 03:29:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":100,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 03:57:59',NULL),
	(166,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"1\"}','{\"error\":0,\"data\":{\"url\":\"http:\\/\\/bog.devmobility.com\\/coupon\\/MisuqVdAYCzCb0Rv\"},\"msg\":\"Success\"}',0,'2018-09-16 03:58:03',NULL),
	(167,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 03:47:04\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"site\":\"http:\\/\\/www.iciparis.ge\\/\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"site\":null,\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:58:04',NULL),
	(168,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 03:29:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":100,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 03:58:15',NULL),
	(169,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"1\"}','{\"error\":0,\"data\":{\"url\":\"http:\\/\\/bog.devmobility.com\\/coupon\\/mwLulHDTKulJNeoU\"},\"msg\":\"Success\"}',0,'2018-09-16 03:58:18',NULL),
	(170,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 03:47:04\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"site\":\"http:\\/\\/www.iciparis.ge\\/\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"site\":null,\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:58:20',NULL),
	(171,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 03:47:04\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"site\":\"http:\\/\\/www.iciparis.ge\\/\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"site\":null,\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 03:59:16',NULL),
	(172,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 03:29:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":100,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 03:59:18',NULL),
	(173,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"1\"}','{\"error\":0,\"data\":{\"url\":\"http:\\/\\/bog.devmobility.com\\/coupon\\/FUDDM2Ghjro7zDn3\"},\"msg\":\"Success\"}',0,'2018-09-16 03:59:22',NULL),
	(174,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 03:47:04\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"site\":\"http:\\/\\/www.iciparis.ge\\/\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"site\":null,\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 04:01:47',NULL),
	(175,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 03:29:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":100,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 04:01:49',NULL),
	(176,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"1\"}','{\"error\":0,\"data\":{\"url\":\"http:\\/\\/bog.devmobility.com\\/coupon\\/TmUR7a0YGRoPjiId\"},\"msg\":\"Success\"}',0,'2018-09-16 04:01:55',NULL),
	(177,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 03:47:04\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"site\":\"http:\\/\\/www.iciparis.ge\\/\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"site\":null,\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 04:02:06',NULL),
	(178,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 03:47:04\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"site\":\"http:\\/\\/www.iciparis.ge\\/\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"site\":null,\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 04:02:52',NULL),
	(179,NULL,'coupons','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"company_id\":\"4\"}','{\"error\":0,\"data\":[{\"id\":1,\"coupons_id\":1,\"language\":\"ka\",\"title\":\"Silver\",\"meta_desc\":null,\"created_at\":\"2018-09-15 23:43:12\",\"updated_at\":\"2018-09-16 03:29:56\",\"coupons_language_id\":1,\"collection_id\":2,\"price\":100,\"company_id\":4,\"total_count\":100,\"visible\":1,\"position\":1}],\"msg\":\"Success\"}',0,'2018-09-16 04:02:54',NULL),
	(180,NULL,'purchase','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\",\"username\":\"user1\",\"user_accaount\":\"GE39BG0000000000000000\",\"coupon_id\":\"1\"}','{\"error\":0,\"data\":{\"url\":\"http:\\/\\/bog.devmobility.com\\/coupon\\/SqEXhQUxGei0ZyiL\"},\"msg\":\"Success\"}',0,'2018-09-16 04:03:02',NULL),
	(181,NULL,'companies','{\"apiKey\":\"IOS-a76968d047a4822fd9a39c8bfbc7d74f\"}','{\"error\":0,\"data\":[{\"id\":4,\"company_id\":4,\"language\":\"ka\",\"title\":\"Isi Paris\",\"meta_desc\":null,\"created_at\":\"2018-09-16 03:47:04\",\"updated_at\":\"2018-09-15 23:30:30\",\"companies_language_id\":2,\"collection_id\":1,\"slug\":\"isi-paris\",\"name\":\"isi-paris\",\"account\":\"account12345\",\"site\":\"http:\\/\\/www.iciparis.ge\\/\",\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/isiparis.png\",\"gender\":\"0\",\"age_from\":6,\"age_to\":80,\"product_type\":0,\"visible\":1,\"position\":1},{\"id\":5,\"company_id\":5,\"language\":\"ka\",\"title\":\"Roniko\",\"meta_desc\":null,\"created_at\":\"2018-09-16 02:27:50\",\"updated_at\":\"2018-09-16 01:34:15\",\"companies_language_id\":4,\"collection_id\":1,\"slug\":\"roniko\",\"name\":\"roniko\",\"account\":\"account65432\",\"site\":null,\"image\":\"http:\\/\\/bog.devmobility.com\\/files\\/41833375_334113227360745_2819250549235384320_n.png\",\"gender\":\"0\",\"age_from\":16,\"age_to\":60,\"product_type\":3,\"visible\":1,\"position\":2}],\"msg\":\"Success\"}',0,'2018-09-16 04:03:14',NULL);

/*!40000 ALTER TABLE `apiLogs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table article_languages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `article_languages`;

CREATE TABLE `article_languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) unsigned NOT NULL,
  `language` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `article_languages_article_id_foreign` (`article_id`),
  CONSTRAINT `article_languages_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table articles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `collection_id` int(10) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(10) unsigned NOT NULL DEFAULT '1',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_collection_id_foreign` (`collection_id`),
  CONSTRAINT `articles_collection_id_foreign` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table calendar
# ------------------------------------------------------------

DROP TABLE IF EXISTS `calendar`;

CREATE TABLE `calendar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table catalog
# ------------------------------------------------------------

DROP TABLE IF EXISTS `catalog`;

CREATE TABLE `catalog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `collection_id` int(10) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(10) unsigned NOT NULL DEFAULT '1',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `catalog_collection_id_foreign` (`collection_id`),
  CONSTRAINT `catalog_collection_id_foreign` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table catalog_languages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `catalog_languages`;

CREATE TABLE `catalog_languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catalog_id` int(10) unsigned NOT NULL,
  `language` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `catalog_languages_catalog_id_foreign` (`catalog_id`),
  CONSTRAINT `catalog_languages_catalog_id_foreign` FOREIGN KEY (`catalog_id`) REFERENCES `catalog` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table cms_settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cms_settings`;

CREATE TABLE `cms_settings` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `cms_user_id` int(10) unsigned NOT NULL,
  `sidebar_position` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fixed',
  `sidebar_direction` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'left-sidebar',
  `horizontal_menu` tinyint(1) NOT NULL DEFAULT '0',
  `horizontal_menu_minimal` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horizontal_menu_click` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skin_sidebar` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skin_user_menu` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skin_horizontal` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skin_login` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `layout_boxed` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alert_position` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'top-right',
  `ajax_form` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ajax-form',
  `lockscreen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cms_settings_cms_user_id_foreign` (`cms_user_id`),
  CONSTRAINT `cms_settings_cms_user_id_foreign` FOREIGN KEY (`cms_user_id`) REFERENCES `cms_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `cms_settings` WRITE;
/*!40000 ALTER TABLE `cms_settings` DISABLE KEYS */;

INSERT INTO `cms_settings` (`id`, `cms_user_id`, `sidebar_position`, `sidebar_direction`, `horizontal_menu`, `horizontal_menu_minimal`, `horizontal_menu_click`, `skin_sidebar`, `skin_user_menu`, `skin_horizontal`, `skin_login`, `layout_boxed`, `alert_position`, `ajax_form`, `lockscreen`, `created_at`, `updated_at`)
VALUES
	(1,1,'fixed','left-sidebar',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'top-right','ajax-form','0','2018-09-15 21:34:39',NULL);

/*!40000 ALTER TABLE `cms_settings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cms_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cms_users`;

CREATE TABLE `cms_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `cms_users` WRITE;
/*!40000 ALTER TABLE `cms_users` DISABLE KEYS */;

INSERT INTO `cms_users` (`id`, `email`, `role`, `firstname`, `lastname`, `phone`, `address`, `active`, `photo`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'vaja@mobility.ge','admin','Vaja','Sinauridze',NULL,NULL,1,NULL,'$2y$10$N2gQIwfO1iITsIeYgkTD4.zt0GF.J.bqvvTCyu8sZQGbjuPU3jKPi',NULL,'2018-09-15 21:34:39',NULL);

/*!40000 ALTER TABLE `cms_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table collections
# ------------------------------------------------------------

DROP TABLE IF EXISTS `collections`;

CREATE TABLE `collections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_order_by` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'id',
  `admin_sort` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'desc',
  `admin_per_page` tinyint(4) NOT NULL DEFAULT '20',
  `web_order_by` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'id',
  `web_sort` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'desc',
  `web_per_page` tinyint(4) NOT NULL DEFAULT '10',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `collections` WRITE;
/*!40000 ALTER TABLE `collections` DISABLE KEYS */;

INSERT INTO `collections` (`id`, `title`, `type`, `admin_order_by`, `admin_sort`, `admin_per_page`, `web_order_by`, `web_sort`, `web_per_page`, `description`, `created_at`, `updated_at`)
VALUES
	(1,'Companies','companies','position','desc',20,'position','desc',10,NULL,'2018-09-15 22:56:04','2018-09-15 22:56:04'),
	(2,'Coupons','coupons','position','desc',20,'position','desc',10,NULL,'2018-09-15 23:40:47','2018-09-15 23:40:47'),
	(3,'Coupons Code','coupons_codes','position','desc',20,'position','desc',10,NULL,'2018-09-15 23:50:17','2018-09-15 23:50:17');

/*!40000 ALTER TABLE `collections` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table companies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `collection_id` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `account` varchar(255) DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `age_from` int(10) DEFAULT NULL,
  `age_to` int(11) DEFAULT NULL,
  `product_type` int(11) DEFAULT NULL,
  `visible` int(11) DEFAULT '1',
  `position` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;

INSERT INTO `companies` (`id`, `collection_id`, `slug`, `name`, `account`, `site`, `image`, `gender`, `age_from`, `age_to`, `product_type`, `visible`, `position`, `created_at`, `updated_at`)
VALUES
	(4,1,'isi-paris','isi-paris','account12345','http://www.iciparis.ge','http://bog.devmobility.com/files/isiparis.png','0',6,80,0,1,1,'2018-09-16 04:05:06','2018-09-15 23:30:30'),
	(5,1,'roniko','roniko','account65432','http://www.roniko.ge','http://bog.devmobility.com/files/41833375_334113227360745_2819250549235384320_n.png','0',16,60,3,1,2,'2018-09-16 04:05:09','2018-09-16 01:34:15');

/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table companies_languages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `companies_languages`;

CREATE TABLE `companies_languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned NOT NULL,
  `language` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `article_languages_article_id_foreign` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `companies_languages` WRITE;
/*!40000 ALTER TABLE `companies_languages` DISABLE KEYS */;

INSERT INTO `companies_languages` (`id`, `company_id`, `language`, `title`, `meta_desc`, `created_at`, `updated_at`)
VALUES
	(2,4,'ka','Isi Paris',NULL,'2018-09-15 23:30:30','2018-09-15 23:30:30'),
	(3,4,'en','Isi Paris',NULL,'2018-09-15 23:30:30','2018-09-15 23:30:30'),
	(4,5,'ka','Roniko',NULL,'2018-09-16 01:34:15','2018-09-16 01:34:15'),
	(5,5,'en','Roniko',NULL,'2018-09-16 01:34:15','2018-09-16 01:34:15');

/*!40000 ALTER TABLE `companies_languages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table coupons
# ------------------------------------------------------------

DROP TABLE IF EXISTS `coupons`;

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `collection_id` int(11) DEFAULT NULL,
  `price` float NOT NULL,
  `company_id` int(11) NOT NULL,
  `total_count` int(11) DEFAULT NULL,
  `visible` int(11) DEFAULT '1',
  `position` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;

INSERT INTO `coupons` (`id`, `collection_id`, `price`, `company_id`, `total_count`, `visible`, `position`, `created_at`, `updated_at`)
VALUES
	(1,2,100,4,100,1,1,'2018-09-15 23:43:12','2018-09-16 03:29:56'),
	(2,2,200,5,50,1,2,'2018-09-16 01:42:37','2018-09-16 03:29:44');

/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table coupons_codes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `coupons_codes`;

CREATE TABLE `coupons_codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `collection_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `visible` int(11) DEFAULT '1',
  `position` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `coupons_codes` WRITE;
/*!40000 ALTER TABLE `coupons_codes` DISABLE KEYS */;

INSERT INTO `coupons_codes` (`id`, `collection_id`, `company_id`, `coupon_id`, `code`, `status`, `visible`, `position`, `created_at`, `updated_at`)
VALUES
	(1,3,4,1,'dkDgN99FQx7DEPa8',1,1,NULL,'2018-09-16 00:00:56',NULL),
	(2,3,4,1,'nINcJOjzq0T5O32o',1,1,NULL,'2018-09-16 00:00:56','2018-09-16 03:28:48'),
	(3,3,4,1,'aZVgYDTov679kyhC',1,1,NULL,'2018-09-16 00:00:56','2018-09-16 03:29:25'),
	(4,3,4,1,'fAWccjdm7bnS97EN',1,1,NULL,'2018-09-16 00:00:56','2018-09-16 03:35:55'),
	(5,3,4,1,'7ULNsFn7s2zu8RjJ',1,1,NULL,'2018-09-16 00:00:56','2018-09-16 02:31:12'),
	(6,3,4,1,'xwHsJVvKlRhIwelZ',1,1,NULL,'2018-09-16 00:00:56','2018-09-16 03:39:36'),
	(7,3,4,1,'BMNrezf9m8pW7Xft',1,1,NULL,'2018-09-16 00:00:56','2018-09-16 03:39:49'),
	(8,3,4,1,'a52G5FjLp043DLMM',1,1,NULL,'2018-09-16 00:00:56','2018-09-16 03:40:15'),
	(9,3,4,1,'SSZjQMv1BBDeYBjw',1,1,NULL,'2018-09-16 00:00:56','2018-09-16 03:43:00'),
	(10,3,4,1,'M55JsW1w9jdGGSBS',1,1,NULL,'2018-09-16 00:00:56','2018-09-16 03:44:05'),
	(11,3,5,2,'cZSytBPjve2mfESf',1,1,NULL,'2018-09-16 01:42:37','2018-09-16 03:28:08'),
	(12,3,5,2,'g1El3ifeIj5kTmAA',1,1,NULL,'2018-09-16 01:42:37','2018-09-16 03:28:20'),
	(13,3,5,2,'zly4WAJRBWVlRysF',1,1,NULL,'2018-09-16 01:42:37','2018-09-16 03:28:30'),
	(14,3,5,2,'EnLIXXoOsKBJ8Utx',0,1,NULL,'2018-09-16 01:42:37',NULL),
	(15,3,5,2,'JT2LyCjWbUBvUX1v',0,1,NULL,'2018-09-16 01:42:37',NULL),
	(16,3,5,2,'xthZlsODXOauaSNY',0,1,NULL,'2018-09-16 01:42:37',NULL),
	(17,3,5,2,'tMEDkJOxQsIVSS7q',0,1,NULL,'2018-09-16 01:42:37',NULL),
	(18,3,5,2,'Z8a8OzWCk55WdB4P',0,1,NULL,'2018-09-16 01:42:37',NULL),
	(19,3,5,2,'oqkVLWvNhINEXSYO',0,1,NULL,'2018-09-16 01:42:37',NULL),
	(20,3,5,2,'AkwYQ5UargLdD0PR',0,1,NULL,'2018-09-16 01:42:37',NULL),
	(21,3,5,2,'azO3uhVBFcrWOamX',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(22,3,5,2,'P1GtrnlwloqQjC5z',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(23,3,5,2,'T1GrPysu8ogdxZxk',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(24,3,5,2,'9fxPl0BDbzPXnLwO',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(25,3,5,2,'TUkfZpuDwqJ3KRaI',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(26,3,5,2,'CsjLroyq00DyWjlR',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(27,3,5,2,'Hg8mu1a4I9KGz8Ql',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(28,3,5,2,'oXVLHSo9txXsIFBA',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(29,3,5,2,'bFCWnIIf9j0cIg35',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(30,3,5,2,'idH88O5l0DdJgl89',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(31,3,5,2,'e06bG1ygxKk4grIy',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(32,3,5,2,'r642spV5jdHNzshP',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(33,3,5,2,'dlrui6xRLg2DhTmE',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(34,3,5,2,'INpIKTB9IEZ7J2CZ',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(35,3,5,2,'Pa35pu7UAPfIs5fg',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(36,3,5,2,'6eY5zrnG0HceIkkj',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(37,3,5,2,'nXJYWRI2bZsvNxmz',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(38,3,5,2,'qiJPMJEJ3VWOqj8f',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(39,3,5,2,'heGz4ZfF6qthYq8x',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(40,3,5,2,'2Fog7H5xfWwSISD1',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(41,3,5,2,'nThurcJp8EHxTxxX',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(42,3,5,2,'GCgtDMDiOfB9JfdH',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(43,3,5,2,'rgTEEE7uWxajdy4B',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(44,3,5,2,'rfOQFoluDvN27OJP',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(45,3,5,2,'F7za7CoVlMtIUSWZ',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(46,3,5,2,'6FfSyGCwDt0ADZGt',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(47,3,5,2,'IeYSJlmSLSsqqB0G',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(48,3,5,2,'1WEnQyfLbMy9mimV',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(49,3,5,2,'5mJiUpgzrtV2aZ9P',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(50,3,5,2,'6GYvdl4PoDHldTsF',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(51,3,5,2,'Jfd7YEfjUdmtJ5Kb',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(52,3,5,2,'jsCBzD0XTtdhkaXe',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(53,3,5,2,'Z9TMSFM2J9lHlyWJ',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(54,3,5,2,'rMABj7c2igYyTDPJ',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(55,3,5,2,'EpFH9HWAFy4kJ1DH',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(56,3,5,2,'9hnotN5q0hf5ElbS',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(57,3,5,2,'j1fKJWy7nPzA4FMh',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(58,3,5,2,'iuru6MNvbfIbQoID',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(59,3,5,2,'Ep6YICK71Xz8c2xH',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(60,3,5,2,'MHlYnRmmdkW5ZM7Q',0,1,NULL,'2018-09-16 03:29:44',NULL),
	(61,3,4,1,'fgzGrFsGFagVVlzq',1,1,NULL,'2018-09-16 03:29:56','2018-09-16 03:50:42'),
	(62,3,4,1,'jbCqEvIdVfKheNw7',1,1,NULL,'2018-09-16 03:29:56','2018-09-16 03:50:52'),
	(63,3,4,1,'O8IoEA4d77rLRyE8',1,1,NULL,'2018-09-16 03:29:56','2018-09-16 03:51:14'),
	(64,3,4,1,'7xhGf5IOaMhATli0',1,1,NULL,'2018-09-16 03:29:56','2018-09-16 03:53:02'),
	(65,3,4,1,'7KiPS3FkYAhasxHB',1,1,NULL,'2018-09-16 03:29:56','2018-09-16 03:53:49'),
	(66,3,4,1,'K0HFIVlL3T2znQCs',1,1,NULL,'2018-09-16 03:29:56','2018-09-16 03:57:03'),
	(67,3,4,1,'MisuqVdAYCzCb0Rv',1,1,NULL,'2018-09-16 03:29:56','2018-09-16 03:58:03'),
	(68,3,4,1,'mwLulHDTKulJNeoU',1,1,NULL,'2018-09-16 03:29:56','2018-09-16 03:58:18'),
	(69,3,4,1,'FUDDM2Ghjro7zDn3',1,1,NULL,'2018-09-16 03:29:56','2018-09-16 03:59:22'),
	(70,3,4,1,'TmUR7a0YGRoPjiId',1,1,NULL,'2018-09-16 03:29:56','2018-09-16 04:01:55'),
	(71,3,4,1,'SqEXhQUxGei0ZyiL',1,1,NULL,'2018-09-16 03:29:56','2018-09-16 04:03:02'),
	(72,3,4,1,'vjO1p6pOjYTiKhhR',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(73,3,4,1,'TuY22z35J0KrLv69',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(74,3,4,1,'ofgAPx8vHRfir2F8',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(75,3,4,1,'zCPBnaVsKYEYBwIQ',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(76,3,4,1,'43c2Faj3MsRo0FRs',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(77,3,4,1,'Xx66LYAfiZF89dqk',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(78,3,4,1,'rfYPjnAJHPNxu312',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(79,3,4,1,'UUQhZ5LEUidMIjll',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(80,3,4,1,'1Qk9nphwZlZIE7r8',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(81,3,4,1,'ZgSvQ36Y5tttLwYx',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(82,3,4,1,'vsJPNEaJI4xiDn7Q',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(83,3,4,1,'AtialmrzQ2qsd3Ed',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(84,3,4,1,'yiYdHXc4DG2m28o7',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(85,3,4,1,'5zU7XR6BipoOJnBB',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(86,3,4,1,'eRDwhAas3HkTyVoA',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(87,3,4,1,'89ALRza9EbKrV4a0',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(88,3,4,1,'abBklDqYGFVJmyXZ',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(89,3,4,1,'BAqMuG3nMMDxrq4z',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(90,3,4,1,'EJqfLB4kfeDi9ouz',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(91,3,4,1,'1SZxKqcqTNxeG5Pw',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(92,3,4,1,'avDL58HDWCpg18Li',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(93,3,4,1,'xsdOSD3rdJkCVg4b',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(94,3,4,1,'LlKrzdugb46sDCWv',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(95,3,4,1,'1zXNFuAAW6A3dMq3',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(96,3,4,1,'DveT8qmtCnhV3lTf',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(97,3,4,1,'Klj0Z5947XZFZNSP',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(98,3,4,1,'cbPk7Ffhz8djfbUB',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(99,3,4,1,'vR8FhN9fvXNrFleQ',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(100,3,4,1,'D5Jmd9XVrev2sfC5',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(101,3,4,1,'YHlw4fEiu0KznLzm',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(102,3,4,1,'BlltMBg2o3mv30Dz',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(103,3,4,1,'j3GetcKuFVvbA6T6',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(104,3,4,1,'vBvdMlBoA7yeT8wt',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(105,3,4,1,'imM7fRL6B5ulICki',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(106,3,4,1,'yVZacexjXTWU9Tvx',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(107,3,4,1,'NZ5owLANLyvMa6EZ',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(108,3,4,1,'sahNZMLd4pLdyma0',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(109,3,4,1,'40Y5XtqLyRdAzmiA',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(110,3,4,1,'J7cOVJyuOsd8Xzss',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(111,3,4,1,'U61ZoUME9syP4ux8',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(112,3,4,1,'RynVSXmHS43MnJYS',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(113,3,4,1,'tgNUuEGsliFKsf5B',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(114,3,4,1,'LpEdSmM3xKTQtXPg',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(115,3,4,1,'xkrbrGcyTW7efDow',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(116,3,4,1,'bcREgctJbtNKMV1V',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(117,3,4,1,'Z5UJDkjox8rrHmcQ',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(118,3,4,1,'ogMiKZFT1N4useuy',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(119,3,4,1,'nLvnFtiLhC4qFUNe',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(120,3,4,1,'JWkxt3YLVaghIKZO',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(121,3,4,1,'yw2YTx0x3j1nIdxH',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(122,3,4,1,'Y7n4AmlKYxaOoA9F',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(123,3,4,1,'fiqh5YgRmAgZ3Wdb',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(124,3,4,1,'tv1wdgJQsdRENykH',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(125,3,4,1,'6upifLJ1F5mmkyym',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(126,3,4,1,'l6VwlfqeeAeYotVZ',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(127,3,4,1,'7IcLKJca5KSKVt3x',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(128,3,4,1,'fOvkYtXEq7CO838v',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(129,3,4,1,'PnTaC79X2y0GDUGx',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(130,3,4,1,'HuAt6p29HUZEocEx',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(131,3,4,1,'PYibGX40dLfnV37J',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(132,3,4,1,'5kA0sDGzNKQ7hDQd',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(133,3,4,1,'qmU5e7gDjXVz0h31',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(134,3,4,1,'38oBazjW7ldKXDiy',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(135,3,4,1,'6kjJ33HBB2Wkrz16',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(136,3,4,1,'ph5Pz2q0vXzzSLV7',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(137,3,4,1,'TAqbkQrjkCgbz35e',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(138,3,4,1,'WKU1vAarlkdmGKek',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(139,3,4,1,'4LFMJJEq1Ic82ewZ',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(140,3,4,1,'Y4YdOvizdmHil0i9',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(141,3,4,1,'MsVmsEcNt36iq7ej',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(142,3,4,1,'Rc7BPIkrLCfNwAhy',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(143,3,4,1,'htsoaTD5M5cTu82m',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(144,3,4,1,'fcisCcyChFCNAjN5',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(145,3,4,1,'XZ4alu0d4t9eBCAs',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(146,3,4,1,'L7nx12Jkbs8kthdy',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(147,3,4,1,'AAiOVP9r2bJBkTSe',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(148,3,4,1,'1WdtweTVE4Yh8T8G',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(149,3,4,1,'deYXs0WSXHA5uQrH',0,1,NULL,'2018-09-16 03:29:56',NULL),
	(150,3,4,1,'AXiObGzXTGOLjA8q',0,1,NULL,'2018-09-16 03:29:56',NULL);

/*!40000 ALTER TABLE `coupons_codes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table coupons_codes_languages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `coupons_codes_languages`;

CREATE TABLE `coupons_codes_languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codes_id` int(10) unsigned NOT NULL,
  `language` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `article_languages_article_id_foreign` (`codes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table coupons_languages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `coupons_languages`;

CREATE TABLE `coupons_languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `coupons_id` int(10) unsigned NOT NULL,
  `language` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `article_languages_article_id_foreign` (`coupons_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `coupons_languages` WRITE;
/*!40000 ALTER TABLE `coupons_languages` DISABLE KEYS */;

INSERT INTO `coupons_languages` (`id`, `coupons_id`, `language`, `title`, `meta_desc`, `created_at`, `updated_at`)
VALUES
	(1,1,'ka','Silver',NULL,'2018-09-15 23:43:12','2018-09-16 03:29:56'),
	(2,1,'en','Silver',NULL,'2018-09-15 23:43:12','2018-09-15 23:43:12'),
	(3,2,'ka','Gold',NULL,'2018-09-16 01:42:37','2018-09-16 03:29:44'),
	(4,2,'en','Gold',NULL,'2018-09-16 01:42:37','2018-09-16 01:42:37');

/*!40000 ALTER TABLE `coupons_languages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table faq
# ------------------------------------------------------------

DROP TABLE IF EXISTS `faq`;

CREATE TABLE `faq` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `collection_id` int(10) unsigned NOT NULL,
  `position` int(10) unsigned NOT NULL DEFAULT '1',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `faq_collection_id_foreign` (`collection_id`),
  CONSTRAINT `faq_collection_id_foreign` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table faq_languages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `faq_languages`;

CREATE TABLE `faq_languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `faq_id` int(10) unsigned NOT NULL,
  `language` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `faq_languages_faq_id_foreign` (`faq_id`),
  CONSTRAINT `faq_languages_faq_id_foreign` FOREIGN KEY (`faq_id`) REFERENCES `faq` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table file_languages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `file_languages`;

CREATE TABLE `file_languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_id` int(10) unsigned NOT NULL,
  `language` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `file_languages_file_id_foreign` (`file_id`),
  CONSTRAINT `file_languages_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table files
# ------------------------------------------------------------

DROP TABLE IF EXISTS `files`;

CREATE TABLE `files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_id` int(10) unsigned NOT NULL,
  `position` smallint(5) unsigned NOT NULL DEFAULT '1',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `files_table_name_index` (`table_name`),
  KEY `files_table_id_index` (`table_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table galleries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `galleries`;

CREATE TABLE `galleries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `collection_id` int(10) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(10) unsigned NOT NULL DEFAULT '1',
  `type` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `admin_order_by` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'id',
  `admin_sort` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'desc',
  `admin_per_page` tinyint(1) NOT NULL DEFAULT '20',
  `web_order_by` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'id',
  `web_sort` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'desc',
  `web_per_page` tinyint(1) NOT NULL DEFAULT '10',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `galleries_collection_id_foreign` (`collection_id`),
  CONSTRAINT `galleries_collection_id_foreign` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table gallery_languages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gallery_languages`;

CREATE TABLE `gallery_languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_id` int(10) unsigned NOT NULL,
  `language` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_languages_gallery_id_foreign` (`gallery_id`),
  CONSTRAINT `gallery_languages_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table menus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `main` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;

INSERT INTO `menus` (`id`, `main`, `title`, `description`, `created_at`, `updated_at`)
VALUES
	(1,1,'მთავარი გვერდები','მთავარი გვერდების სია','2018-09-15 21:34:39',NULL);

/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2016_07_10_200050_create_cms_users_table',1),
	(2,'2016_07_10_200120_create_permissions_table',1),
	(3,'2016_07_10_200140_create_users_table',1),
	(4,'2016_07_10_201550_create_menus_table',1),
	(5,'2016_07_10_201600_create_collections_table',1),
	(6,'2016_07_10_202000_create_pages_table',1),
	(7,'2016_07_10_202200_create_catalog_table',1),
	(8,'2016_07_10_202500_create_articles_table',1),
	(9,'2016_07_10_202600_create_faq_table',1),
	(10,'2016_07_10_203005_create_galleries_table',1),
	(11,'2016_07_10_203100_create_photos_table',1),
	(12,'2016_07_10_203150_create_videos_table',1),
	(13,'2016_07_10_203320_create_files_table',1),
	(14,'2016_07_10_203410_create_slider_table',1),
	(15,'2016_07_10_204280_create_cms_settings_table',1),
	(16,'2016_07_10_204290_create_web_settings_table',1),
	(17,'2016_07_10_204305_create_translations_table',1),
	(18,'2016_07_10_204855_create_calendar_table',1),
	(19,'2016_07_10_204890_create_notes_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table notes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notes`;

CREATE TABLE `notes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;

INSERT INTO `notes` (`id`, `title`, `description`, `content`, `created_at`, `updated_at`)
VALUES
	(1,'სათაური','მოკლე აღწერა','სათაური\nმოკლე აღწერა\nვრცელი ტექსტი...','2018-09-15 21:34:39',NULL);

/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table page_languages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `page_languages`;

CREATE TABLE `page_languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(10) unsigned NOT NULL,
  `language` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_languages_page_id_foreign` (`page_id`),
  CONSTRAINT `page_languages_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(10) unsigned NOT NULL DEFAULT '1',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `type_id` int(10) unsigned DEFAULT NULL,
  `template` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `collapse` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pages_menu_id_foreign` (`menu_id`),
  CONSTRAINT `pages_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_role_index` (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table photo_languages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `photo_languages`;

CREATE TABLE `photo_languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `photo_id` int(10) unsigned NOT NULL,
  `language` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `photo_languages_photo_id_foreign` (`photo_id`),
  CONSTRAINT `photo_languages_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table photos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `photos`;

CREATE TABLE `photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_id` int(10) unsigned NOT NULL,
  `position` int(10) unsigned NOT NULL DEFAULT '1',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `file` varchar(800) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `photos_gallery_id_foreign` (`gallery_id`),
  CONSTRAINT `photos_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table slider
# ------------------------------------------------------------

DROP TABLE IF EXISTS `slider`;

CREATE TABLE `slider` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position` int(10) unsigned NOT NULL DEFAULT '1',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `file` varchar(800) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(800) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table slider_languages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `slider_languages`;

CREATE TABLE `slider_languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slider_id` int(10) unsigned NOT NULL,
  `language` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(800) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slider_languages_slider_id_foreign` (`slider_id`),
  CONSTRAINT `slider_languages_slider_id_foreign` FOREIGN KEY (`slider_id`) REFERENCES `slider` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table translation_languages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `translation_languages`;

CREATE TABLE `translation_languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `translation_id` int(10) unsigned NOT NULL,
  `language` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `translation_languages_translation_id_foreign` (`translation_id`),
  CONSTRAINT `translation_languages_translation_id_foreign` FOREIGN KEY (`translation_id`) REFERENCES `translations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table translations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `translations`;

CREATE TABLE `translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table video_languages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `video_languages`;

CREATE TABLE `video_languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `video_id` int(10) unsigned NOT NULL,
  `language` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `video_languages_video_id_foreign` (`video_id`),
  CONSTRAINT `video_languages_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table videos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `videos`;

CREATE TABLE `videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_id` int(10) unsigned NOT NULL,
  `position` int(10) unsigned NOT NULL DEFAULT '1',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `file` varchar(800) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `videos_gallery_id_foreign` (`gallery_id`),
  CONSTRAINT `videos_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table web_settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `web_settings`;

CREATE TABLE `web_settings` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_plus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` varchar(800) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `web_settings` WRITE;
/*!40000 ALTER TABLE `web_settings` DISABLE KEYS */;

INSERT INTO `web_settings` (`id`, `email`, `phone`, `facebook`, `twitter`, `google_plus`, `map`, `created_at`, `updated_at`)
VALUES
	(1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `web_settings` ENABLE KEYS */;
UNLOCK TABLES;

DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`root`@`localhost` */ /*!50003 TRIGGER `web_settings_insert_not_allowed` BEFORE INSERT ON `web_settings` FOR EACH ROW BEGIN
    SIGNAL SQLSTATE "45000"
    SET MESSAGE_TEXT = "insert not allowed";
END */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`root`@`localhost` */ /*!50003 TRIGGER `web_settings_delete_not_allowed` BEFORE DELETE ON `web_settings` FOR EACH ROW BEGIN
    SIGNAL SQLSTATE "45000"
    SET MESSAGE_TEXT = "delete not allowed";
END */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

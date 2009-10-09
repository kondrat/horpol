# HeidiSQL Dump 
#
# --------------------------------------------------------
# Host:                         127.0.0.1
# Database:                     horpol
# Server version:               5.0.67-community-nt
# Server OS:                    Win32
# Target compatibility:         HeidiSQL w/ MySQL Server 5.0
# Target max_allowed_packet:    1048576
# HeidiSQL version:             4.0
# Date/time:                    2009-10-09 22:00:15
# --------------------------------------------------------

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;*/


#
# Database structure for database 'horpol'
#

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `horpol` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `horpol`;


#
# Table structure for table 'brands_categories'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `brands_categories` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `brand_id` int(11) unsigned default NULL,
  `category_id` int(11) unsigned default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'brands_categories'
#

LOCK TABLES `brands_categories` WRITE;
/*!40000 ALTER TABLE `brands_categories` DISABLE KEYS;*/
REPLACE INTO `brands_categories` (`id`, `brand_id`, `category_id`) VALUES
	('1','1','2'),
	('2','3','2'),
	('3','2','2'),
	('4','4','4'),
	('5','6','2'),
	('6','3','6'),
	('7','2','3'),
	('8','1','3'),
	('9','1','6'),
	('10','3','5'),
	('11','9','5'),
	('12','10','7'),
	('13','1','14'),
	('14','1','17'),
	('15','2','18'),
	('16','6','3'),
	('17','8','2'),
	('18','1','10'),
	('19','14','8');
/*!40000 ALTER TABLE `brands_categories` ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'sub_categories'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `sub_categories` (
  `id` int(5) NOT NULL auto_increment,
  `category_id` int(10) unsigned default NULL,
  `brand_id` int(10) unsigned default NULL,
  `brand_category_id` int(11) unsigned default NULL,
  `active` tinyint(1) NOT NULL default '1',
  `name` varchar(250) NOT NULL default '',
  `url` tinyint(3) default NULL,
  `images` text,
  `product_count` int(11) unsigned default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `catbrand` (`category_id`,`brand_id`),
  KEY `sucatId` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'sub_categories'
#

LOCK TABLES `sub_categories` WRITE;
/*!40000 ALTER TABLE `sub_categories` DISABLE KEYS;*/
REPLACE INTO `sub_categories` (`id`, `category_id`, `brand_id`, `brand_category_id`, `active`, `name`, `url`, `images`, `product_count`, `created`, `modified`) VALUES
	(19,'2','1','1',1,'sdfdd',1,NULL,'26','2008-11-19 15:04:19','2009-10-09 17:45:36'),
	(20,'2','3','2',1,'ZaTe',1,NULL,'3','2008-11-19 16:30:22','2009-10-09 17:45:36'),
	(27,'2','2','3',1,'d',1,NULL,'1','2008-11-19 18:51:33','2009-10-09 17:45:36'),
	(35,'4','4','4',1,'planes1',1,NULL,'2','2008-12-09 12:40:37','2009-10-09 17:45:36'),
	(36,'2','6','5',1,'planes2',1,NULL,'3','2008-12-09 18:47:15','2009-10-09 17:45:36'),
	(37,'2','6','5',1,'palanes3',1,NULL,'3','2008-12-09 18:51:46','2009-10-09 17:45:36'),
	(50,'6','3','6',1,'name22',NULL,NULL,'2','2008-12-10 19:44:57','2009-10-09 17:45:36'),
	(51,'6','3','6',1,'name101',1,NULL,'3','2008-12-10 19:45:13','2009-10-09 17:45:36'),
	(55,'6','3','6',1,'name2',NULL,NULL,'1','2008-12-10 19:49:03','2009-10-09 17:45:36'),
	(56,'3','2','7',1,'name',1,NULL,'2','2008-12-10 19:49:20','2009-10-09 17:45:36'),
	(58,'3','1','8',1,'brandNew',1,NULL,'2','2008-12-10 20:26:19','2009-10-09 17:45:36'),
	(59,'6','1','9',1,'ForOrder',1,NULL,'1','2008-12-10 20:30:57','2009-10-09 17:45:36'),
	(60,'2','2','3',1,'name4',1,NULL,'1','2008-12-10 20:38:26','2009-10-09 17:45:36'),
	(61,'4','4','4',1,'a350next',NULL,NULL,'3','2008-12-10 21:22:18','2009-10-09 17:45:36'),
	(62,'2','6','5',1,'newOfToday',1,NULL,NULL,'2008-12-11 17:39:23','2009-10-09 17:45:36'),
	(64,'6','3','6',1,'naw8',NULL,NULL,NULL,'2008-12-11 19:20:06','2009-10-09 17:45:36'),
	(66,'5','3','10',1,'NewOne',NULL,NULL,'2','2008-12-11 20:41:18','2009-10-09 17:45:36'),
	(67,'2','2','3',1,'nwenn',1,NULL,NULL,'2008-12-12 13:04:41','2009-10-09 17:45:36'),
	(68,'5','9','11',1,'vau',NULL,NULL,NULL,'2008-12-12 21:24:02','2009-10-09 17:45:36'),
	(69,'7','10','12',1,'podrazdel',NULL,NULL,'1','2008-12-13 14:57:29','2009-10-09 17:45:36'),
	(70,'7','10','12',1,'podrazdel2',NULL,NULL,'1','2008-12-13 15:03:02','2009-10-09 17:45:36'),
	(71,'14','1','13',1,'newtt',NULL,NULL,'1','2009-03-22 14:48:48','2009-10-09 17:45:36'),
	(72,'17','1','14',1,'case2',NULL,NULL,'2','2009-04-09 15:08:52','2009-10-09 17:45:36'),
	(73,'18','2','15',1,'Upps',NULL,NULL,'1','2009-09-04 18:53:24','2009-10-09 17:45:36'),
	(74,'3','2','7',1,'name2',1,NULL,'3','2009-09-07 13:28:35','2009-10-09 17:45:36'),
	(75,'3','6','16',1,'newF',1,NULL,NULL,'2009-09-30 17:43:59','2009-10-09 17:45:36'),
	(76,'2','6','5',1,'sdf',1,NULL,NULL,'2009-09-30 20:08:16','2009-10-09 17:45:36'),
	(77,'2','6','5',1,'nnnnn234',1,NULL,NULL,'2009-09-30 20:09:25','2009-10-09 17:45:36'),
	(78,'2','6','5',1,'nneenn23',NULL,NULL,NULL,'2009-09-30 20:10:04','2009-10-09 17:45:36'),
	(79,'2','6','5',1,'vsiz',1,NULL,NULL,'2009-09-30 20:11:25','2009-10-09 17:45:36'),
	(80,'2','8','17',1,'Новый подраздел',1,NULL,NULL,'2009-09-30 20:59:46','2009-10-09 17:45:36'),
	(81,'2','8','17',1,'And New one',1,NULL,NULL,'2009-09-30 21:01:55','2009-10-09 17:45:36'),
	(82,'2','6','5',1,'NewFF',1,NULL,NULL,'2009-10-01 13:42:55','2009-10-09 17:45:36'),
	(83,'3','1','8',1,'NewMM',1,NULL,NULL,'2009-10-01 14:07:21','2009-10-09 17:45:36'),
	(84,'10','1','18',1,'teestt Ter doska',1,NULL,'3','2009-10-01 14:14:21','2009-10-09 17:45:36'),
	(85,'2','3','2',1,'newdd',1,NULL,NULL,'2009-10-01 15:09:01','2009-10-09 17:45:36'),
	(86,'2','3','2',1,'фыва',1,NULL,NULL,'2009-10-01 15:49:42','2009-10-09 17:45:36'),
	(87,'2','3','2',1,'333ыук',1,NULL,NULL,'2009-10-01 15:50:02','2009-10-09 17:45:36'),
	(88,'2','3','2',1,'Флизелиновые обои Erfurt Vliesfaser.ПОСМОТРЕТЬ ЗДЕСЬ!',1,NULL,NULL,'2009-10-01 17:47:30','2009-10-09 17:45:36'),
	(89,'2','3','2',1,'Бумажные обои Erfurt Novaboss.ПОСМОТРЕТЬ ЗДЕСЬ!',1,NULL,NULL,'2009-10-01 17:47:48','2009-10-09 17:45:36'),
	(90,'2','3','2',1,'Флизелиновые обои Erfurt Vliesfaser.ПОСМОТРЕТЬ ЗДЕСЬ',1,NULL,NULL,'2009-10-01 17:50:09','2009-10-09 17:45:36'),
	(91,'8','14','19',1,'newMM',1,NULL,'4','2009-10-05 21:59:33','2009-10-09 17:45:36'),
	(92,'7','10','12',1,'noviy',1,NULL,NULL,'2009-10-09 13:02:33','2009-10-09 17:45:36');
/*!40000 ALTER TABLE `sub_categories` ENABLE KEYS;*/
UNLOCK TABLES;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;*/

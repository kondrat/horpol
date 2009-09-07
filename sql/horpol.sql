# HeidiSQL Dump 
#
# --------------------------------------------------------
# Host:                         127.0.0.1
# Database:                     horpol
# Server version:               5.0.6-beta-nt
# Server OS:                    Win32
# Target compatibility:         HeidiSQL w/ MySQL Server 5.0
# Target max_allowed_packet:    1048576
# HeidiSQL version:             4.0
# Date/time:                    2009-09-07 02:49:10
# --------------------------------------------------------

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;*/


#
# Database structure for database 'horpol'
#

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `horpol` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `horpol`;


#
# Table structure for table 'albums'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `albums` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(150) NOT NULL default '',
  `image` text,
  `image_count` int(12) unsigned default '0',
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



#
# Dumping data for table 'albums'
#

LOCK TABLES `albums` WRITE;
/*!40000 ALTER TABLE `albums` DISABLE KEYS;*/
REPLACE INTO `albums` (`id`, `name`, `image`, `image_count`, `created`, `modified`) VALUES
	('1','first5','default.jpg','4','2008-11-10 12:21:42','2008-12-15 21:20:13'),
	('2','second22','DSC051570.JPG','7','2008-11-10 00:00:00','2008-12-15 19:25:57'),
	('3','third3','51Gb1EQtjXL._SL110_0.jpg','5','2008-11-10 00:00:00','2008-12-15 19:24:36'),
	('6','Novi',NULL,'3','2008-12-15 19:27:28','2008-12-15 19:27:28'),
	('7','OneMore1',NULL,'5','2008-12-15 19:28:09','2008-12-15 20:38:48'),
	('8','Newww435',NULL,'2','2008-12-15 20:11:16','2008-12-15 21:26:58');
/*!40000 ALTER TABLE `albums` ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'banners'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `banners` (
  `id` int(5) NOT NULL auto_increment,
  `type` int(1) NOT NULL default '1',
  `comment` varchar(250) NOT NULL,
  `body` text,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



#
# Dumping data for table 'banners'
#

# No data found.



#
# Table structure for table 'banners_categories'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `banners_categories` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `banner_id` int(11) unsigned NOT NULL default '0',
  `category_id` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



#
# Dumping data for table 'banners_categories'
#

# No data found.



#
# Table structure for table 'brands'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `brands` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(64) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `url` varchar(250) default NULL,
  `logo` text,
  `body` text,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



#
# Dumping data for table 'brands'
#

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS;*/
REPLACE INTO `brands` (`id`, `name`, `url`, `logo`, `body`, `created`, `modified`) VALUES
	('1','b777','','Boeing_777_21.jpg','this is a boeing 777 just for test So, this is a boeing 777 just for test this is a boeing 777 just for test this is a boeing 777 just for test this is a boeing 777 just for test','2008-11-11 01:05:42','2008-12-13 02:10:29'),
	('2','a380','','09430350.jpg',NULL,'2008-11-11 15:04:35','2008-12-09 20:21:20'),
	('4','a350','farm','a350-21.jpg',NULL,'2008-11-20 12:54:04','2008-12-09 20:20:56'),
	('10','zayac',NULL,'20.jpg','Just zayac','2008-12-13 14:55:41','2008-12-13 14:55:41');
/*!40000 ALTER TABLE `brands` ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'categories'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `categories` (
  `id` int(5) NOT NULL auto_increment,
  `type` int(1) NOT NULL default '1',
  `name` varchar(250) NOT NULL default '',
  `title` varchar(250) default NULL,
  `url` varchar(250) default NULL,
  `body` text,
  `slogan` text,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



#
# Dumping data for table 'categories'
#

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS;*/
REPLACE INTO `categories` (`id`, `type`, `name`, `title`, `url`, `body`, `slogan`, `created`, `modified`) VALUES
	(2,1,'Художественный паркет','Hud Parket2','','Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test TestTest Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test TestTest Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test','Slogan 33','2008-11-11 14:04:12','2009-09-06 20:02:30'),
	(3,1,'Массивная доска',NULL,'',NULL,NULL,'2008-11-11 14:27:11','2008-11-11 14:27:11'),
	(4,1,'Паркетная доска',NULL,'',NULL,NULL,'2008-11-11 14:32:28','2008-11-11 14:32:28'),
	(5,1,'Штучный паркет',NULL,'',NULL,NULL,'2008-11-11 14:33:02','2008-11-11 14:33:02'),
	(6,1,'Изделия на заказ',NULL,'',NULL,NULL,'2008-12-04 19:31:16','2008-12-04 19:31:16'),
	(7,1,'Ламинат',NULL,NULL,NULL,NULL,'2008-12-13 14:49:45','2008-12-13 21:20:44'),
	(8,1,'NewOne',NULL,NULL,'',NULL,'2008-12-17 02:02:39','2008-12-17 02:02:39'),
	(9,1,'mihal',NULL,NULL,'mihal',NULL,'2008-12-20 23:48:42','2008-12-20 23:48:42'),
	(19,2,'new1',NULL,NULL,'',NULL,'2009-02-07 22:27:32','2009-02-07 22:27:32'),
	(20,3,'new2',NULL,NULL,'',NULL,'2009-02-07 22:29:07','2009-02-07 22:29:07'),
	(21,2,'new4',NULL,NULL,'new4',NULL,'2009-02-07 22:35:26','2009-02-07 22:35:26');
/*!40000 ALTER TABLE `categories` ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'images'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `images` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `album_id` int(10) unsigned default NULL,
  `name` varchar(150) NOT NULL default '',
  `image` text,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



#
# Dumping data for table 'images'
#

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS;*/
REPLACE INTO `images` (`id`, `album_id`, `name`, `image`, `created`, `modified`) VALUES
	('2',NULL,'d','php0.gif','2008-11-10 19:45:52','2008-11-10 19:45:52'),
	('3',NULL,'qwer','logo0.gif','2008-11-10 19:48:26','2008-11-10 19:48:26'),
	('4',NULL,'qwer','logo1.gif','2008-11-10 19:49:00','2008-11-10 19:49:00'),
	('37','1','qwer2','DPD_52010.JPG','2008-12-15 15:21:17','2008-12-15 15:21:17'),
	('39','1','asdf1','DPD_52250.JPG','2008-12-15 15:43:42','2008-12-15 15:43:42'),
	('42','1','sdf22','DPD_52331.JPG','2008-12-15 15:48:40','2008-12-15 15:48:40'),
	('52','2','asdf','1320.jpg','2008-12-15 18:13:09','2008-12-15 18:13:09'),
	('53','2','wefrwe','1720.jpg','2008-12-15 18:13:32','2008-12-15 18:13:32'),
	('54','2','sdf','1250.jpg','2008-12-15 18:23:50','2008-12-15 18:23:50'),
	('55','2','sefrwe','250.jpg','2008-12-15 18:24:20','2008-12-15 18:24:20'),
	('56','2','rtwert','1280.jpg','2008-12-15 18:34:20','2008-12-15 18:34:20'),
	('57','2','wert','1670.jpg','2008-12-15 18:34:40','2008-12-15 18:34:40'),
	('59','3','qwerwe','1281.jpg','2008-12-15 18:42:44','2008-12-15 18:42:44'),
	('60','3','wef','2341.jpg','2008-12-15 18:43:00','2008-12-15 18:43:00'),
	('61','3','dfg','2250.jpg','2008-12-15 18:45:32','2008-12-15 21:45:12'),
	('65','6','sdfeww','351.jpg','2008-12-15 19:27:52','2008-12-15 19:27:52'),
	('66','6','foto4','10.jpg','2008-12-15 19:56:41','2008-12-15 21:37:27'),
	('68','7','maee','200.jpg','2008-12-15 20:07:13','2008-12-15 20:07:13'),
	('69','7','mee','240.jpg','2008-12-15 20:07:36','2008-12-15 20:07:36'),
	('70','8','sadfwei','241.jpg','2008-12-15 20:11:35','2008-12-15 20:11:35'),
	('72','7','sde','1031.jpg','2008-12-15 20:12:31','2008-12-15 20:12:31'),
	('77','8','badfew','560.jpg','2008-12-15 20:20:35','2008-12-15 20:20:35'),
	('80','7','5647yh','1321.jpg','2008-12-15 20:39:42','2008-12-15 20:39:42'),
	('82','7','efwe152','1721.jpg','2008-12-15 21:17:46','2009-02-21 15:39:26'),
	('83','3','eftger','790.jpg','2008-12-15 21:26:13','2008-12-15 21:26:13'),
	('84','3','rwetr11','2340.jpg','2008-12-15 21:26:24','2008-12-15 21:26:24'),
	('87','6','plusha','IMG_04010.JPG','2008-12-16 00:59:37','2008-12-16 00:59:37'),
	('88','1','sdfwe','IMG_25960.JPG','2008-12-19 01:46:44','2008-12-19 01:46:44'),
	('89','2','sdf','0_20e54_631ab99a_XL0.jpg','2009-09-07 02:35:03','2009-09-07 02:35:03');
/*!40000 ALTER TABLE `images` ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'news'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `news` (
  `id` int(9) unsigned NOT NULL auto_increment,
  `name` varchar(150) NOT NULL,
  `body` text NOT NULL,
  `created` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



#
# Dumping data for table 'news'
#

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS;*/
REPLACE INTO `news` (`id`, `name`, `body`, `created`) VALUES
	('1','','QWERTY qwerty1m, a,smd ','2008-12-04 00:00:00'),
	('3','Third news blin3',' news','2008-12-13 00:00:00'),
	('5','asdf','asdfsdfsdf asdfdf','2008-12-20 00:00:00'),
	('6','NewTest','ttttest and tttttest','2009-03-16 00:00:00'),
	('7','asdf','ННН ПППП ММААААииии ППП!!!!','2009-03-17 00:00:00'),
	('8','цук','МРипРПГРАГАМШГА ------ МИПпролн АШГАШПНЕПНЕГ ППШГНПГНПГНПГ ПГШНПШГНПГНП ПШГНПГШПГНПГШ ПШГНПШГНПГН ПГШНПШГНПш ПШПГШПГШПШГ__---------сшнрес  ___------','2009-03-20 00:00:00'),
	('9','пнгп9','рнгшпщИИЩШГН ПШГ(НПШГНПНП ПШНПГШПГШ ПГ(НП(ГШНП(НПШПЩПЩПГШН ПГНПШНГ','2009-03-17 00:00:00'),
	('10','ППШНПШГлллш','ИШНИО ---ШИЛО ----- ИШПИШНГШГ рпшгнп МШГМШГ МГШМШГ МШГШГПГНПНП ПГАГАНАНГАГЕ?:ЕПГ*П НПРГ%%%%%%прпиш  нгпшг!!!!!!!!!!!!','2009-03-19 00:00:00'),
	('11','пнрпщ','---- пагеамшнаммАНГАШГНПГ МГНПШГНПШГНП ГШНПГШП ПГНПШГ!!!!!!!! ','2009-03-17 00:00:00');
/*!40000 ALTER TABLE `news` ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'products'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `products` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `subcategory_id` int(10) default NULL,
  `code` varchar(50) default NULL,
  `name` varchar(250) default NULL,
  `url` varchar(250) default NULL,
  `logo` text,
  `material` text,
  `size` text,
  `content1` text,
  `price` float(9,2) unsigned default '0.00',
  `created` datetime default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



#
# Dumping data for table 'products'
#

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS;*/
REPLACE INTO `products` (`id`, `subcategory_id`, `code`, `name`, `url`, `logo`, `material`, `size`, `content1`, `price`, `created`) VALUES
	('61',78,NULL,'dfwwe',NULL,'3CIMG01700.JPG',NULL,NULL,NULL,'0','2008-12-25 02:41:32'),
	('62',80,NULL,'cat2-1',NULL,'IMG_29330.JPG',NULL,NULL,NULL,'0','2009-02-14 16:03:05'),
	('63',80,NULL,'cat2-2',NULL,'IMG_29341.JPG',NULL,NULL,NULL,'0','2009-02-14 16:03:31'),
	('42',35,NULL,'nu',NULL,'il76-11.jpg',NULL,NULL,NULL,'0','2008-12-11 18:12:33'),
	('24',61,NULL,'one test',NULL,'Boeing_777_22.jpg',NULL,NULL,NULL,'0','2008-12-10 21:22:55'),
	('64',81,NULL,'sdf',NULL,'IMG_29331.JPG',NULL,NULL,'dfgfdsg','0','2009-02-14 23:55:26'),
	('65',82,NULL,'test22',NULL,'IMG_29342.JPG',NULL,NULL,'desc123\r\n','0','2009-02-15 00:45:11'),
	('70',27,NULL,'hp04',NULL,'0_2bfb1_ac14c7d0_XL0.jpg',NULL,NULL,NULL,'0','2009-09-06 01:03:44'),
	('71',58,NULL,'wer11',NULL,'0_64e5_e40e6fa1_XL0.jpg',NULL,NULL,NULL,'0','2009-09-06 18:39:19'),
	('25',61,NULL,'one test4',NULL,'a380-21.jpg',NULL,NULL,NULL,'0','2008-12-10 21:23:14'),
	('27',27,NULL,'dnewon',NULL,'9311910.jpg',NULL,NULL,NULL,'0','2008-12-11 00:46:57'),
	('30',56,NULL,'name15',NULL,'MAKS20050100.jpg',NULL,NULL,NULL,'0','2008-12-11 00:51:46'),
	('31',35,NULL,'planes11',NULL,'CRJ7001.jpg',NULL,NULL,NULL,'0','2008-12-11 00:53:09'),
	('66',83,NULL,'newHp1',NULL,'0_1c2bc_a50979c3_XL0.jpg',NULL,NULL,NULL,'0','2009-09-06 00:47:10'),
	('67',27,NULL,'hp01',NULL,'0_210ab_715b98_-1-XL0.jpg',NULL,NULL,NULL,'0','2009-09-06 01:02:10'),
	('68',27,NULL,'hp01',NULL,'0_1fa2c_5c406522_-1-XL0.jpg',NULL,NULL,NULL,'0','2009-09-06 01:02:38'),
	('69',27,NULL,'hp02',NULL,'0_2aae1_c6f8575b_XL0.jpg',NULL,NULL,NULL,'0','2009-09-06 01:03:14'),
	('39',61,NULL,'34t3gq',NULL,'CRJ7002.jpg',NULL,NULL,NULL,'0','2008-12-11 01:02:18'),
	('47',58,NULL,'ngos',NULL,'crj_900_nextgen-10.jpg',NULL,NULL,NULL,'0','2008-12-12 16:20:25'),
	('72',58,NULL,'qwer12',NULL,'0_210ab_715b98_-1-XL1.jpg',NULL,NULL,NULL,'0','2009-09-06 18:39:38'),
	('58',27,NULL,'neww2',NULL,'IMG_26500.JPG',NULL,NULL,NULL,'0','2008-12-19 02:42:08'),
	('60',73,NULL,'jnwerq',NULL,'10.jpg',NULL,NULL,NULL,'0','2008-12-23 02:24:10');
/*!40000 ALTER TABLE `products` ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'sub_categories'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `sub_categories` (
  `id` int(5) NOT NULL auto_increment,
  `category_id` int(10) unsigned default NULL,
  `brand_id` int(10) unsigned default NULL,
  `active` tinyint(1) NOT NULL default '1',
  `name` varchar(250) NOT NULL default '',
  `url` varchar(250) default NULL,
  `images` text,
  `product_count` int(11) unsigned default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



#
# Dumping data for table 'sub_categories'
#

LOCK TABLES `sub_categories` WRITE;
/*!40000 ALTER TABLE `sub_categories` DISABLE KEYS;*/
REPLACE INTO `sub_categories` (`id`, `category_id`, `brand_id`, `active`, `name`, `url`, `images`, `product_count`, `created`, `modified`) VALUES
	(27,'2','2',1,'dav253','sdsdfe',NULL,'6','2008-11-19 18:51:33','2008-12-25 02:29:11'),
	(35,'4','4',1,'planes15','',NULL,'2','2008-12-09 12:40:37','2008-12-17 01:37:21'),
	(56,'3','2',1,'name',NULL,NULL,'1','2008-12-10 19:49:20','2008-12-10 19:49:20'),
	(58,'3','1',1,'brandNew',NULL,NULL,'3','2008-12-10 20:26:19','2008-12-10 20:26:19'),
	(61,'4','4',1,'a350next',NULL,NULL,'3','2008-12-10 21:22:18','2008-12-10 21:22:18'),
	(73,'2','2',1,'23podrazd',NULL,NULL,'1','2008-12-23 02:23:36','2008-12-23 02:23:36'),
	(76,'2','1',1,'sdfdd2',NULL,NULL,NULL,'2008-12-24 02:25:32','2008-12-24 02:25:32'),
	(78,'7','1',1,'sdf',NULL,NULL,'1','2008-12-25 02:41:15','2008-12-25 02:41:15'),
	(79,'2','2',1,'new2',NULL,NULL,NULL,'2008-12-28 22:03:30','2008-12-28 22:03:30'),
	(80,'19','1',1,'boeing777',NULL,NULL,'2','2009-02-14 16:02:26','2009-02-14 16:02:26'),
	(81,'20','1',1,'cat3',NULL,NULL,'1','2009-02-14 23:54:53','2009-02-14 23:54:53'),
	(82,'20','4',1,'cat3-2',NULL,NULL,'1','2009-02-15 00:43:49','2009-02-15 00:43:49'),
	(83,'2','1',1,'newhp',NULL,NULL,'1','2009-09-06 00:45:36','2009-09-06 00:45:36');
/*!40000 ALTER TABLE `sub_categories` ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'users'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(64) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `password` varchar(64) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `role` enum('admin','user') default NULL,
  `email` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `active` tinyint(1) unsigned NOT NULL default '0',
  `created` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



#
# Dumping data for table 'users'
#

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS;*/
REPLACE INTO `users` (`id`, `username`, `password`, `role`, `email`, `active`, `created`) VALUES
	('1','kondrat','589c0094635e85c81a894e2410b3d8bfd2c7d2aa','admin','',0,'0000-00-00 00:00:00'),
	('2','za','c129b324aee662b04eccf68babba85851346dff9','admin','',0,'0000-00-00 00:00:00'),
	('3','admin','365320990d80021b6e0df00dc015fc661276e5e4','admin','4116457@mail.ru',0,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS;*/
UNLOCK TABLES;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;*/

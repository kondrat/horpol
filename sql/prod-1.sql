# HeidiSQL Dump 
#
# --------------------------------------------------------
# Host:                 127.0.0.1
# Database:             horpol
# Server version:       5.1.23-rc-community
# Server OS:            Win32
# Target-Compatibility: MySQL 5.0
# Extended INSERTs:     Y
# max_allowed_packet:   1048576
# HeidiSQL version:     3.0 Revision: 572
# --------------------------------------------------------

/*!40100 SET CHARACTER SET utf8*/;


#
# Database structure for database 'horpol'
#

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `horpol` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `horpol`;


#
# Table structure for table 'albums'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `albums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL DEFAULT '',
  `image` text,
  `image_count` int(12) unsigned DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'albums'
#

/*!40000 ALTER TABLE `albums` DISABLE KEYS*/;
LOCK TABLES `albums` WRITE;
REPLACE INTO `albums` (`id`, `name`, `image`, `image_count`, `created`, `modified`) VALUES ('1','first',NULL,1,'2008-11-10 12:21:42','2008-12-15 21:20:13');
UNLOCK TABLES;
/*!40000 ALTER TABLE `albums` ENABLE KEYS*/;


#
# Table structure for table 'brands'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `brands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `url` varchar(250) DEFAULT NULL,
  `logo` text,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'brands'
#

/*!40000 ALTER TABLE `brands` DISABLE KEYS*/;
LOCK TABLES `brands` WRITE;
REPLACE INTO `brands` (`id`, `name`, `url`, `logo`, `body`, `created`, `modified`) VALUES ('1','Forbo','','forbo0.jpg','Forbo ����� Forbo ����� Forbo ����� Forbo ����� Forbo ����� Forbo ����� Forbo ����� Forbo ����� Forbo ����� Forbo ����� Forbo ����� Forbo ����� Forbo ����� Forbo ����� Forbo ����� Forbo ����� Forbo ����� Forbo ����� Forbo ����� Forbo ����� Forbo ����� Forbo ����� Forbo ����� Forbo ����� Forbo ����� Forbo ����� Forbo ����� Forbo ����� Forbo ����� Forbo �����','2008-11-11 01:05:42','2008-12-16 14:31:54');
UNLOCK TABLES;
/*!40000 ALTER TABLE `brands` ENABLE KEYS*/;


#
# Table structure for table 'categories'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `categories` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(250) NOT NULL DEFAULT '',
  `url` varchar(250) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'categories'
#

/*!40000 ALTER TABLE `categories` DISABLE KEYS*/;
LOCK TABLES `categories` WRITE;
REPLACE INTO `categories` (`id`, `active`, `name`, `url`, `body`, `created`, `modified`) VALUES (2,1,'�������������� ������','','�������������� ������ �������������� ������ �������������� ������ �������������� ������ �������������� ������ �������������� ������ �������������� ������ �������������� ������ �������������� ������ �������������� ������ �������������� ������ �������������� ������ �������������� ������ �������������� ������ �������������� ������ �������������� ������ �������������� ������ �������������� ������ �������������� ������ �������������� ������ ','2008-11-11 14:04:12','2008-12-16 14:28:20'),
	(3,1,'��������� �����','',NULL,'2008-11-11 14:27:11','2008-11-11 14:27:11'),
	(4,1,'��������� �����','',NULL,'2008-11-11 14:32:28','2008-11-11 14:32:28'),
	(5,1,'������� ������','',NULL,'2008-11-11 14:33:02','2008-11-11 14:33:02'),
	(6,1,'������� �� �����','',NULL,'2008-12-04 19:31:16','2008-12-04 19:31:16'),
	(7,1,'�������',NULL,NULL,'2008-12-13 14:49:45','2008-12-13 21:20:44'),
	(8,1,'��������� ��������',NULL,'','2008-12-16 12:21:13','2008-12-16 12:21:13'),
	(9,1,'��������, ����, ����,<br /> �����',NULL,'','2008-12-16 12:21:38','2008-12-16 13:11:01'),
	(10,1,'��������� �����',NULL,'','2008-12-16 12:22:22','2008-12-16 12:22:22'),
	(11,1,'������, ������������',NULL,'','2008-12-16 12:22:34','2008-12-16 12:22:34'),
	(12,1,'����������� ����',NULL,'','2008-12-16 12:22:46','2008-12-16 12:22:46');
UNLOCK TABLES;
/*!40000 ALTER TABLE `categories` ENABLE KEYS*/;


#
# Table structure for table 'images'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `album_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(150) NOT NULL DEFAULT '',
  `image` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'images'
#

/*!40000 ALTER TABLE `images` DISABLE KEYS*/;
LOCK TABLES `images` WRITE;
REPLACE INTO `images` (`id`, `album_id`, `name`, `image`, `created`, `modified`) VALUES ('1','1','first Image','200.jpg','2008-11-10 19:45:52','2008-11-10 19:45:52');
UNLOCK TABLES;
/*!40000 ALTER TABLE `images` ENABLE KEYS*/;


#
# Table structure for table 'news'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `news` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `body` text NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'news'
#

/*!40000 ALTER TABLE `news` DISABLE KEYS*/;
LOCK TABLES `news` WRITE;
REPLACE INTO `news` (`id`, `name`, `body`, `created`) VALUES (1,'second ','qwerty2 asd,m.,amsd asm,d., a.,sm .a,smda .a,smd .,ams., mnas,.md,.a m ������ ����� ��������������������','2008-12-03 00:00:00'),
	(2,'Third news ',' � asdf ���������� ��������� ���������� � ������������� ����� � ������� �������� � ���������� �������� �������������� ��������� � ������ �������������� ����� � � ������������ � ��������� ������������. \r\n\r\n2. �������� ����� � ������� �������� ������������ � ����������� ������� �� ��������. \r\n\r\n3. ������������� ���� � ������ �������� � ���������� �� ������ �������� ����� � ������� ������ ���. \r\n\r\n������ 18 \r\n\r\n����� � ������� �������� � ���������� �������� ��������������� ������������. ��� ���������� �����, ���������� � ���������� �������, ������������ ��������������� � �������������� ������, �������� �������������� � �������������� �����������. \r\n\r\n������ 19 \r\n\r\n1. ��� ����� ����� ������� � �����. \r\n\r\n2. ����������� ����������� ��������� ���� � ������ �������� � ���������� ���������� �� ����, ����, ��������������, �����, �������������, �������������� � ������������ ���������, ����� ����������, ��������� � �������, ���������, �������������� � ������������ ������������, � ����� ������ �������������. ����������� ����� ����� ����������� ���� ������� �� ��������� ����������, �������, ������������, �������� ��� ����������� ��������������. \r\n\r\n3. ������� � ������� ����� ������ ����� � ������� � ������ ����������� ��� �� ����������. \r\n\r\n������ 20 \r\n\r\n1. ������ ����� ����� �� �����. \r\n\r\n2. �������� ����� ������ �� �� ������ ����� ��������������� ����������� ������� � �������� �������������� ���� ��������� �� ����� ������ ������������ ������ ����� ��� �������������� ����������� ����� �� ������������ ��� ���� ����� � �������� ��������� �����������. \r\n\r\n������ 21 \r\n\r\n1. ����������� �������� ���������� ������������. ����� �� ����� ���� ���������� ��� ��� ��������. \r\n\r\n2. ����� �� ������ ������������ ������, �������, ������� ��������� ��� ���������� ������������ ����������� ��������� ��� ���������. ����� �� ����� ���� ��� ������������� �������� ���������� �����������, ������� ��� ���� ������. \r\n\r\n������ 22 \r\n\r\n1. ������ ����� ����� �� ������� � ������ ������������������. \r\n\r\n2. �����, ���������� ��� ������ � ���������� ��� ������� ����������� ������ �� ��������� �������. �� ��������� ������� ���� �� ����� ���� ����������� ���������� �� ���� ����� 48 �����. \r\n\r\n������ 23 ','2008-12-13 00:00:00'),
	(3,'forth news','������ ����� ����� �� ������� ��������� ������� �����, ������ � �������� �����, ������ ����� ����� � ������� �����. ������ ����� ����� �� ����� ���������, ���������� �����������, ��������, ����������� � ���� ���������. ����������� ����� ����� ����������� ������ �� ��������� ��������� �������. \r\n\r\n������ 24 \r\n\r\n1. ����, ��������, ������������� � ��������������� ���������� � ������� ����� ���� ��� ��� �������� �� �����������. \r\n\r\n2. ������ ��������������� ������ � ������ �������� ��������������, �� ����������� ���� ������� ���������� ������� ����������� ������������ � ����������� � �����������, ��������������� �������������� ��� ����� � �������, ���� ���� �� ������������� �������. \r\n\r\n������ 25 \r\n\r\n������ ���������������. ����� �� ������ ��������� � ������ ������ ���� ����������� � ��� ��� ����� ��� � �������, ������������� ����������� �������, ��� �� ��������� ��������� �������. \r\n\r\n������ 26 \r\n\r\n1. ������ ������ ���������� � ��������� ���� ������������ ��������������. ����� �� ����� ���� ��������� � ����������� � �������� ����� ������������ ��������������. \r\n\r\n2. ������ ����� ����� �� ����������� ������ ������, �� ��������� ����� ����� �������, ����������, �������� � ����������. \r\n\r\n������ 27 \r\n\r\n1. ������, ��� ������� ��������� �� ���������� ���������� ���������, ����� ����� �������� �������������, �������� ����� ���������� � ����������. \r\n\r\n2. ������ ����� �������� �������� �� ������� ���������� ���������. ��������� ���������� ��������� ����� ����� ���������������� ������������ � ���������� ���������. \r\n\r\n������ 28 \r\n\r\n������� ������������� ������� �������, ������� ���������������, ������� ����� ������������ ������������� ��� ��������� � ������� ����� ������� ��� �� ������������ �������, �������� ��������, ����� � �������������� ����������� � ���� ��������� � ����������� � ������������ � ����. \r\n\r\n������ 29 ','2008-12-05 00:00:00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `news` ENABLE KEYS*/;


#
# Table structure for table 'products'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subcategory_id` int(10) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `logo` text,
  `material` text,
  `size` text,
  `content1` text,
  `price` float(9,2) unsigned DEFAULT '0.00',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'products'
#

/*!40000 ALTER TABLE `products` DISABLE KEYS*/;
LOCK TABLES `products` WRITE;
REPLACE INTO `products` (`id`, `subcategory_id`, `code`, `name`, `url`, `logo`, `material`, `size`, `content1`, `price`, `created`) VALUES ('1',1,NULL,'first',NULL,'pr42130.gif',NULL,NULL,NULL,'0','2008-12-10 21:21:21');
UNLOCK TABLES;
/*!40000 ALTER TABLE `products` ENABLE KEYS*/;


#
# Table structure for table 'sub_categories'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `sub_categories` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned DEFAULT NULL,
  `brand_id` int(10) unsigned DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(250) NOT NULL DEFAULT '',
  `url` varchar(250) DEFAULT NULL,
  `product_count` int(11) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'sub_categories'
#

/*!40000 ALTER TABLE `sub_categories` DISABLE KEYS*/;
LOCK TABLES `sub_categories` WRITE;
REPLACE INTO `sub_categories` (`id`, `category_id`, `brand_id`, `active`, `name`, `url`, `product_count`, `created`, `modified`) VALUES (1,'2','1',1,'first',' ','1','2008-11-19 15:04:19','2008-11-19 15:04:19');
UNLOCK TABLES;
/*!40000 ALTER TABLE `sub_categories` ENABLE KEYS*/;


#
# Table structure for table 'users'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `role` enum('admin','user') DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'users'
#

/*!40000 ALTER TABLE `users` DISABLE KEYS*/;
LOCK TABLES `users` WRITE;
REPLACE INTO `users` (`id`, `username`, `password`, `role`, `email`, `active`, `created`) VALUES ('1','kondrat','c129b324aee662b04eccf68babba85851346dff9','admin','',0,'0000-00-00 00:00:00'),
	('2','za','c129b324aee662b04eccf68babba85851346dff9','admin','',0,'0000-00-00 00:00:00'),
	('3','admin','c129b324aee662b04eccf68babba85851346dff9','admin','',0,'0000-00-00 00:00:00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `users` ENABLE KEYS*/;

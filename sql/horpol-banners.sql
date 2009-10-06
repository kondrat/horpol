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
# Date/time:                    2009-10-06 21:49:13
# --------------------------------------------------------

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;*/


#
# Database structure for database 'horpol'
#

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `horpol` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `horpol`;


#
# Table structure for table 'banners'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `banners` (
  `id` int(5) NOT NULL auto_increment,
  `type` int(10) NOT NULL default '1',
  `logo` text,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'banners'
#

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS;*/
REPLACE INTO `banners` (`id`, `type`, `logo`, `created`, `modified`) VALUES
	(4,1,'0_2db9f_ffcb6ed9_XL0.jpg','2009-10-06 20:56:31','2009-10-06 20:56:31'),
	(5,1,'0_2e006_bb6f866b_XL0.jpeg','2009-10-06 21:00:50','2009-10-06 21:00:50'),
	(6,1,'0_2f3a6_95b8cc0_XL0.jpeg','2009-10-06 21:03:09','2009-10-06 21:03:09'),
	(7,1,'0_22e05_730912ac_-1-XL0.jpg','2009-10-06 21:12:28','2009-10-06 21:12:28'),
	(8,2,'0_2a79c_a94f25d6_XL0.jpeg','2009-10-06 21:12:37','2009-10-06 21:12:36'),
	(11,1,'banner12.gif','2009-10-06 21:35:45','2009-10-06 21:35:45'),
	(12,2,'banner13.gif','2009-10-06 21:36:31','2009-10-06 21:36:31');
/*!40000 ALTER TABLE `banners` ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'banners_categories'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `banners_categories` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `banner_id` int(11) unsigned NOT NULL default '0',
  `category_id` int(11) unsigned NOT NULL default '0',
  `brand_id` int(11) unsigned default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



#
# Dumping data for table 'banners_categories'
#

# No data found.

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;*/

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
# Date/time:                    2009-10-13 02:20:32
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
	('1','first5','default.jpg','4','2008-11-10 12:21:42','2009-04-09 20:12:27'),
	('2','second22','DSC051570.JPG','15','2008-11-10 00:00:00','2008-12-15 19:25:57'),
	('3','third36','51Gb1EQtjXL._SL110_0.jpg','5','2008-11-10 00:00:00','2009-09-07 14:29:22'),
	('6','Novi',NULL,'2','2008-12-15 19:27:28','2008-12-15 19:27:28'),
	('7','OneMore1',NULL,'5','2008-12-15 19:28:09','2008-12-15 20:38:48'),
	('8','Newww435',NULL,'3','2008-12-15 20:11:16','2008-12-15 21:26:58'),
	('9','new04',NULL,'1','2009-09-07 14:29:47','2009-09-07 14:30:56'),
	('10','newOne12',NULL,'2','2009-09-08 12:03:52','2009-09-08 12:03:52'),
	('11','newOne1',NULL,'0','2009-09-08 12:41:33','2009-09-08 13:05:18'),
	('12','novi33',NULL,'3','2009-09-10 17:19:52','2009-09-10 17:24:57'),
	('13','novi',NULL,'0','2009-09-10 17:20:27','2009-09-10 17:20:27'),
	('14','novi3',NULL,'0','2009-09-10 17:22:52','2009-09-10 17:22:52'),
	('15','noovii',NULL,'0','2009-09-10 17:28:50','2009-09-10 17:28:50'),
	('16','dsfds',NULL,'0','2009-09-17 00:11:30','2009-09-17 00:11:30');
/*!40000 ALTER TABLE `albums` ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'banners'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `banners` (
  `id` int(5) NOT NULL auto_increment,
  `type` int(10) NOT NULL,
  `logo` text,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



#
# Dumping data for table 'banners'
#

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS;*/
REPLACE INTO `banners` (`id`, `type`, `logo`, `created`, `modified`) VALUES
	(4,1,'0_24938_4b5c0679_XL0.jpg','2009-10-06 20:56:31','2009-10-13 01:48:42'),
	(5,1,'0_6b93_a964a86d_XL0.jpg','2009-10-06 21:00:50','2009-10-09 00:28:11'),
	(6,1,'0_2f3a6_95b8cc0_XL0.jpeg','2009-10-06 21:03:09','2009-10-06 21:03:09'),
	(7,1,'0_2056c_f05829af_XL0.jpg','2009-10-06 21:12:28','2009-10-09 00:28:51'),
	(8,1,'0_2cb50_f09a7231_XL0.jpg','2009-10-06 21:12:37','2009-10-09 01:02:33'),
	(11,1,'banner12.gif','2009-10-06 21:35:45','2009-10-13 01:48:58'),
	(12,2,'banner13.gif','2009-10-06 21:36:31','2009-10-13 01:04:25'),
	(13,1,'banner_test00.gif','2009-10-13 01:49:42','2009-10-13 01:50:47'),
	(14,2,'banner_test200.png','2009-10-13 01:50:25','2009-10-13 01:51:02');
/*!40000 ALTER TABLE `banners` ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'banners_brands_categories'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `banners_brands_categories` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `banner_id` int(11) unsigned NOT NULL default '0',
  `brand_category_id` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `banCat` (`banner_id`,`brand_category_id`),
  KEY `ban` (`banner_id`),
  KEY `cat` (`brand_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



#
# Dumping data for table 'banners_brands_categories'
#

LOCK TABLES `banners_brands_categories` WRITE;
/*!40000 ALTER TABLE `banners_brands_categories` DISABLE KEYS;*/
REPLACE INTO `banners_brands_categories` (`id`, `banner_id`, `brand_category_id`) VALUES
	('7','12','3'),
	('10','12','4'),
	('9','12','7'),
	('8','12','18'),
	('11','14','1');
/*!40000 ALTER TABLE `banners_brands_categories` ENABLE KEYS;*/
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

LOCK TABLES `banners_categories` WRITE;
/*!40000 ALTER TABLE `banners_categories` DISABLE KEYS;*/
REPLACE INTO `banners_categories` (`id`, `banner_id`, `category_id`, `brand_id`) VALUES
	('10','8','10',NULL),
	('14','4','2',NULL),
	('15','4','3',NULL),
	('16','4','4',NULL),
	('17','4','5',NULL),
	('18','4','7',NULL);
/*!40000 ALTER TABLE `banners_categories` ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'banners_static_pages'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `banners_static_pages` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `banner_id` int(11) unsigned NOT NULL default '0',
  `static_page_id` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



#
# Dumping data for table 'banners_static_pages'
#

LOCK TABLES `banners_static_pages` WRITE;
/*!40000 ALTER TABLE `banners_static_pages` DISABLE KEYS;*/
REPLACE INTO `banners_static_pages` (`id`, `banner_id`, `static_page_id`) VALUES
	('3','8','0'),
	('7','13','1');
/*!40000 ALTER TABLE `banners_static_pages` ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'brands'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `brands` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(64) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `url` varchar(250) default NULL,
  `logo` text,
  `body` text,
  `origin` varchar(250) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



#
# Dumping data for table 'brands'
#

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS;*/
REPLACE INTO `brands` (`id`, `name`, `url`, `logo`, `body`, `origin`, `created`, `modified`) VALUES
	('1','admonter','','Admonter01.jpg','<p><span style="background-color: Lime;">this is a boeing 777</span> just for test So, this is a boeing 777 <strike><u><em><strong>just for test this is a boeing</strong></em></u></strike> 777 just for test this is a boeing 777 just for test this is a boeing 777 just for test</p>','','2008-11-11 01:05:42','2009-09-09 15:30:41'),
	('2','alpenholz','','0_28615_ae1462ab_XL0.jpg','<p>Hello alpenholz 68</p>','Russia','2008-11-11 15:04:35','2009-10-04 19:46:02'),
	('3','barkinek','asus','barliner00.jpg','<p>this is a boeing 777 just for test So, this is a boeing 777 just for test this is a boeing 777 just for test this is a boeing this is a boeing 777 just for test So, this is a boeing 777 just for test this is a boeing 777 just for test this is a boeing this is a boeing 777 just for test So, this is a boeing 777 just for test this is a boeing 777 just for test this is a boeing</p>','Не указана','2008-11-17 21:15:15','2009-10-13 00:30:30'),
	('4','beFao','farm','bEFAG00.jpg','<p>Теперь не отсутствует</p>','','2008-11-20 12:54:04','2009-10-08 01:49:14'),
	('6','forbo','','FORBO00.jpg','','Не указана','2008-12-08 17:25:28','2009-10-09 01:12:18'),
	('8','ipowood',NULL,'ipowood00.jpg','','','2008-12-12 21:22:10','2009-09-12 20:20:41'),
	('9','Karelia',NULL,'karelia00.jpg','','','2008-12-12 21:23:35','2009-09-12 20:19:31'),
	('10','Kahrs',NULL,'karhrs00.jpg','Just zayac',NULL,'2008-12-13 14:55:41','2009-09-12 20:19:54'),
	('11','airket',NULL,'logo_ariket00.jpg','',NULL,'2009-09-07 14:49:47','2009-09-07 19:21:45'),
	('12','Name',NULL,'0_20444_51a8687c_XL2.jpg','','Ukraine','2009-09-29 00:33:11','2009-09-29 01:05:34');
/*!40000 ALTER TABLE `brands` ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'brands_categories'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `brands_categories` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `brand_id` int(11) unsigned default NULL,
  `category_id` int(11) unsigned default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



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
	('16','2',NULL),
	('17','8','2'),
	('18','10','2'),
	('19','11','2'),
	('20','6','10');
/*!40000 ALTER TABLE `brands_categories` ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'categories'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `categories` (
  `id` int(5) NOT NULL auto_increment,
  `type` int(10) NOT NULL default '1',
  `name` varchar(250) NOT NULL default '',
  `pos` int(11) default NULL,
  `active` tinyint(3) unsigned NOT NULL default '1',
  `title` varchar(250) default NULL,
  `body` text,
  `slogan` text,
  `sub_category_count` int(11) unsigned default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



#
# Dumping data for table 'categories'
#

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS;*/
REPLACE INTO `categories` (`id`, `type`, `name`, `pos`, `active`, `title`, `body`, `slogan`, `sub_category_count`, `created`, `modified`) VALUES
	(2,1,'Массивная доска1',0,1,'sadf3','<div class="maincontent">\r\n<p style="text-align: left;"><em>Массивной доской считается напольное покрытие из массива древесины длиной более 900 мм и шириной более 90 мм. Толщина доски может быть и 15, и 18, и 22, и 40 мм.</em></p>\r\n<p style="text-align: left;"><em>Массивная доска, без сомнения, самый экологичный и долговечный вид покрытия - ведь она целиком и полностью, состоит из натурального природного материала, в отличие от паркетной доски и ламината. Древесина способна согреть и украсить как современный, так и классический интерьер. А новые технологии производства, многочисленные способы монтажа, особенности пород дерева, необычайно расширяют его художественные возможности. Полы из массивных досок выглядят стильно и благородно. Современная массивная доска долговечнее других видов покрытия за счет более толстого верхнего слоя. Кроме того, массивная доска значительно упрощает укладку.</em></p>\r\n<p style="text-align: left;"><em>Массивная доска была широко известна и использовалась еще до того как появились ламинированные полы. Этот вид напольного покрытия, без сомнения, самый долговечный. От штучного паркета массивная доска отличается размерами. Если отдельные дощечки штучного паркета имеют размер 420х70х15 мм (в среднем), то габариты массивной доски могут быть до 6000 мм в длину, до 350 мм в ширину и толщиной 18-22 мм. Монтаж массивной доски осуществляется практически так же, как и монтаж штучного паркета. Массивная доска может поставляться как в необработанном виде (шлифованная), так и с финишным покрытием (лак или масло), нанесенным в заводских условиях. Так же мы можем предложить самые необычные композиции цвета и обработки древесины по индивидуальному проекту.</em></p>\r\n</div>','Здесь только лучшее от природы и производителей Каждая фабрика-яркая очень даже','16','2008-11-11 14:04:12','2009-10-13 01:58:17'),
	(3,1,'Массивная доска',8,1,'My title','<p><img height="137" width="200" src="/horpol/app/webroot/files/0_37dc0_a7483525_XL.jpg" alt="" />Nu hot что нибудь сюДА БЛИЙЙ&nbsp; <b><i>sdfgsdgf</i></b>&nbsp; <em><span style="font-size: x-large;"><span style="font-family: Arial;">sdfsdfsdf</span></span></em></p>\r\n<p><em><span style="font-size: x-large;"><span style="font-family: Arial;"><img height="40" width="40" alt="" src="/horpol/app/webroot/img/upload_pic/10407.jpg" /></span></span></em></p>\r\n<p><em><span style="font-size: x-large;"><span style="font-family: Arial;"><br />\r\n</span></span></em></p>',NULL,NULL,'2008-11-11 14:27:11','2009-10-13 01:58:17'),
	(4,3,'Parket',3,1,NULL,'<p><em>Современные паркетные доски выпускаются длиной от 1,2 м до 3 м, шириной 130-220 мм и толщиной 14-22 мм. Первые два слоя доски чаще всего производятся из хвойных пород древесины, а уже на них, как на подложку наклеиваются небольшие прямоугольные планки (толщиной 1-4 мм) из ценных пород дерева и покрываются слоями лака. Верхний лицевой слой доски представляет собой тот же самый штучный паркет (дубовый, кленовый, ясеневый, вишневый или иной), но гораздо более тонкий. В отличие от штучного паркета, который требует тщательной подготовки перед укладкой, паркетные доски выпускаются уже полностью готовые к нанесению. Пятикратный слой высокопрочного лака, нанесенного заводским способом, предохраняет пол от износа гораздо более надежно, чем любое покрытие в условиях установки на месте. Паркетная доска обеспечивает высокую акустическую и термическую изоляцию, сопротивляется деформациям и механическим повреждениям. Благодаря гигроскопичности дерева обладает свойством натуральной регулировки микроклимата. Главное отличие паркетной доски от массивной состоит в том, что паркетная доска - это трехслойная конструкция из древесины различных пород. Верхний слой паркетной доски &ndash; шпон из ценных пород дерева, толщиной 3,5-4 мм.Затем-шип (слой прочной древесины). Шпон и шип соединены между собой прочным клеем. Средний слой (шип) самый широкий во всей конструкции. Для изготовления среднего слоя используются такие породы древесины, которые имеют высокие качества прочности, но внешний вид не столь эстетичен, как у дорогих пород. Это существенно удешевляет стоимость паркетной доски, не лишая ее совершенного внешнего вида. <br />\r\n<br />\r\nВ отличие от штучного паркета, для укладки которого нужен специалист, с монтажом паркетной доски справится и новичок всего за несколько часов. Паркетная доска имеет заводское покрытие (лак или масло) в несколько слоев и, как правило, не требует дополнительной обработки. <br />\r\n<br />\r\nЗаводское покрытие обеспечит Вашей паркетной доске прекрасный внешний вид на долгие годы. Шлифовать паркетную доску можно практически также как и штучный паркет &ndash; 4-5 раз, поэтому такой пол прослужит Вам 35-50 лет.</em></p>','Slogan will be here soon','3','2008-11-11 14:32:28','2009-10-13 01:58:17'),
	(5,1,'Штучный паркет',5,1,'sdf','',NULL,NULL,'2008-11-11 14:33:02','2009-10-13 01:58:17'),
	(6,1,'Изделия на заказ',9,1,NULL,NULL,NULL,NULL,'2008-12-04 19:31:16','2009-10-13 01:58:17'),
	(7,1,'Ламинат',4,1,NULL,NULL,NULL,NULL,'2008-12-13 14:49:45','2009-10-13 01:58:17'),
	(8,1,'Пробковые покрытия',6,1,NULL,'',NULL,NULL,'2008-12-16 12:21:13','2009-10-13 01:58:17'),
	(9,2,'Плинтусы, клеи, лаки,<br /> масла',7,1,NULL,'','Слоган отсутствует',NULL,'2008-12-16 12:21:38','2009-10-13 01:58:17'),
	(10,2,'Терассная доска',2,1,'','<p>test test test <strong>test test test test test test test te</strong>st test test test test test test test and more More</p>\r\n<br />','test test test test test test test test test test test test test test test test test test ','1','2008-12-16 12:22:22','2009-10-13 01:58:17'),
	(12,1,'Структурные обои',10,1,NULL,'',NULL,NULL,'2008-12-16 12:22:46','2009-10-13 01:58:17'),
	(14,2,'categVintage',1,1,'asdfeeee','<h4>You <b>are</b> using FCKeditor.</h4>','Слоган отсутствует','2','2009-03-22 14:47:57','2009-10-13 01:58:17'),
	(15,3,'New test',12,1,'ddd','<p>HI <a href="http://mail.ru">guys</a></p>',NULL,NULL,'2009-03-23 12:51:40','2009-10-13 01:58:18'),
	(17,2,'newCase2',11,1,'newCase2','',NULL,NULL,'2009-04-09 15:07:37','2009-10-13 01:58:18'),
	(18,2,'new00',13,1,'sdf','',NULL,NULL,'2009-09-04 18:52:27','2009-10-13 01:58:18'),
	(20,3,'new00',16,1,'','','',NULL,'2009-09-04 19:45:25','2009-10-13 01:58:18'),
	(21,3,'new00',14,1,'','','',NULL,'2009-09-04 19:46:00','2009-10-13 01:58:18'),
	(23,3,'nnew01',15,1,'','','Здесь только лучшее от природы и производителей. Каждая фабрика-яркая индивидуальность',NULL,'2009-09-04 20:24:08','2009-10-13 01:58:18');
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
  PRIMARY KEY  (`id`),
  KEY `albumid` (`album_id`)
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
	('82','7','efwe','1721.jpg','2008-12-15 21:17:46','2008-12-15 21:17:46'),
	('83','3','eftger','790.jpg','2008-12-15 21:26:13','2008-12-15 21:26:13'),
	('84','3','rwetr11','2340.jpg','2008-12-15 21:26:24','2008-12-15 21:26:24'),
	('85','1','sdf','0_22be6_f7daa72b_XL0.jpg','2009-04-09 20:12:19','2009-04-09 20:12:19'),
	('86','2','sdf','0_22be6_f7daa72b_XL1.jpg','2009-04-09 20:12:45','2009-04-09 20:12:45'),
	('87','2','sdf','0_77da_fa726095_XL0.jpg','2009-04-09 20:13:03','2009-04-09 20:13:03'),
	('88','2','sdf','0_27f2e_ca52cef2_XL0.jpg','2009-04-09 20:13:11','2009-04-09 20:13:11'),
	('89','2','sdfe','0_24a55_a71031bc_XL0.jpg','2009-04-09 20:13:20','2009-04-09 20:13:20'),
	('90','2','sdf','0_219e5_4785ef70_-2-XL0.jpg','2009-04-09 20:13:33','2009-04-09 20:13:33'),
	('91','2','sdf','0_34192_6c0ed359_XL0.jpg','2009-04-09 20:14:17','2009-04-09 20:14:17'),
	('92','2','sdf','0_2724b_e379be85_XL0.jpg','2009-04-09 20:14:53','2009-04-09 20:14:53'),
	('93','2','sdf','0_a230_230a61f4_XL0.jpg','2009-04-09 20:15:05','2009-04-09 20:15:05'),
	('94','2','sdf','0_22de8_755d82aa_-2-XL0.jpg','2009-04-09 20:15:24','2009-04-09 20:15:24'),
	('95','9','fgr','0_2c5ad_e643010b_XL0.jpg','2009-09-07 14:30:22','2009-09-07 14:30:22'),
	('96','10','test12','0_22e05_730912ac_-1-XL0.jpg','2009-09-08 12:40:11','2009-09-08 12:40:11'),
	('97','10','test124','0_2bfb1_ac14c7d0_XL0.jpg','2009-09-08 12:40:33','2009-09-08 12:40:33'),
	('98','8','dsfe','0_210b7_97bf00a7_XL0.jpeg','2009-09-09 20:27:17','2009-09-09 20:27:17'),
	('99','12','sdf','0_2a94b_d6c0e285_XL0.jpeg','2009-09-10 17:21:40','2009-09-10 17:21:40'),
	('100','12','sdfgg','0_2e31e_736971d8_XL0.jpeg','2009-09-10 17:22:35','2009-09-10 17:22:35'),
	('101','12','dfe','0_2c1de_e12bd434_XL0.jpg','2009-09-10 17:24:50','2009-09-10 17:24:50');
/*!40000 ALTER TABLE `images` ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'news'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `news` (
  `id` tinyint(3) unsigned NOT NULL auto_increment,
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
	(1,'Новые цены на паркетную доску и ламинат ','QWERTY qwerty1m, a,smd бфыьвлцоул ы стьыьс жцьф вжфвф жф цвжлдфоцб ac kajw;\'aa klaewfkh,a d,jal; kajewdla  qwerty1m, a,smd бфыьвлцоул ы стьыьс жцьф вжфвф жф цвжлдфоцб ac kajw;\'aa klaewfkh,a d,jal; kajewdla qwerty1m, a,smd бфыьвлцоул ы стьыьс жцьф вжфвф жф цвжлдфоцб ac kajw;\'aa klaewfkh,a d,jal; kajewdla qwerty1m, a,smd бфыьвлцоул ы стьыьс жцьф вжфвф жф цвжлдфоцб ac kajw;\'aa klaewfkh,a d,jal; kajewdla qwerty1m, a,smd бфыьвлцоул ы стьыьс жцьф вжфвф жф цвжлдфоцб ac kajw;\'aa klaewfkh,a d,jal; kajewdla qwerty1m, a,smd бфыьвлцоул ы стьыьс жцьф вжфвф жф цвжлдфоцб ac kajw;\'aa klaewfkh,a d,jal; kajewdla qwerty1m, a,smd бфыьвлцоул ы стьыьс жцьф вжфвф жф цвжлдфоцб ac kajw;\'aa klaewfkh,a d,jal; kajewdla ','2008-12-04 00:00:00'),
	(2,'second blin','qwerty2 asd,m.,amsd asm,d., a.,sm .a,smda .a,smd .,ams., mnas,.md,.a m бьфжыв бьфыв бфыьвюбжьфывбюьбюфвы','2008-12-03 00:00:00'),
	(3,'Third news blin3','<p><strong>В asdf Российской</strong> Федерации признаются и гарантируются права и свободы человека и гражданина согласно общепризнанным принципам и нормам международного права и в соответствии с настоящей Конституцией.   2. Основные права и свободы человека неотчуждаемы и принадлежат каждому от рождения.   3. Осуществление прав и свобод человека и гражданина не должно нарушать права и свободы других лиц.   Статья 18   Права и свободы человека и гражданина являются непосредственно действующими. Они определяют <img hspace="4" height="100" width="150" vspace="4" border="1" align="middle" src="/app/webroot/img/upload_pic/0_210b7_97bf00a7_XL.jpeg" alt="" />смысл, содержание и применение законов, деятельность законодательной и исполнительной <img height="77" width="103" style="padding: 5px; float: left;" src="/app/webroot/img/upload_pic/0_2e51b_984b04aa_-1-XL(1).jpg" alt="" />власти, местного самоуправления и обеспечиваются правосудием.   Статья 19   1. Все равны перед законом и судом.   2. Государство гарантирует равенство прав и свобод человека и гражданина независимо от пола, расы, национальности, языка, происхождения, имущественного и должностного положения, места жительства, отношения к религии, убеждений, принадлежности к общественным объединениям, а также других обстоятельств. Запрещаются любые формы ограничения прав граждан по признакам социальной, расовой, национальной, языковой или религиозной принадлежности.   3. Мужчина и женщина имеют равные права и свободы и равные возможности для их реализации.   Статья 20   1. Каждый имеет право на жизнь.   2. Смертная казнь впредь до ее отмены может устанавливаться федеральным законом в качестве исключительной меры наказания за особо тяжкие преступления против жизни при предоставлении обвиняемому права на рассмотрение его дела судом с участием присяжных заседателей.   Статья 21   1. Достоинство личности охраняется государством. Ничто не может быть основанием для его умаления.   2. Никто не должен подвергаться пыткам, насилию, другому жестокому или унижающему человеческое достоинство обращению или наказанию. Никто не может быть без добровольного согласия подвергнут медицинским, научным или иным опытам.   Статья 22   1. Каждый имеет право на свободу и личную неприкосновенность.   2. Арест, заключение под стражу и содержание под стражей допускаются только по судебному решению. До судебного решения лицо не может быть подвергнуто задержанию на срок более 48 часов.   Статья 23</p>','2008-12-13 00:00:00'),
	(4,'forth news','Каждый имеет право на еприкос овенность частной жизни, личную и семейную тайну, защиту своей чести и доброго имени. Каждый имеет право на тайну переписки, телефонных переговоров, почтовых, телеграфных и иных сообщений. Ограничение этого права допускается только на основании судебного решения. \r\n\r\nСтатья 24 \r\n\r\n1. Сбор, хранение, использование и распространение информации о частной жизни лица без его согласия не допускаются. \r\n\r\n2. Органы государственной власти и органы местного самоуправления, их должностные лица обязаны обеспечить каждому возможность ознакомления с документами и материалами, непосредственно затрагивающими его права и свободы, если иное не предусмотрено законом. \r\n\r\nСтатья 25 \r\n\r\nЖилище неприкосновенно. Никто не вправе проникать в жилище против воли проживающих в нем лиц иначе как в случаях, установленных федеральным законом, или на основании судебного решения. \r\n\r\nСтатья 26 \r\n\r\n1. Каждый вправе определять и указывать свою национальную принадлежность. Никто не может быть принужден к определению и указанию своей национальной принадлежности. \r\n\r\n2. Каждый имеет право на пользование родным языком, на свободный выбор языка общения, воспитания, обучения и творчества. \r\n\r\nСтатья 27 \r\n\r\n1. Каждый, кто законно находится на территории Российской Федерации, имеет право свободно передвигаться, выбирать место пребывания и жительства. \r\n\r\n2. Каждый может свободно выезжать за пределы Российской Федерации. Гражданин Российской Федерации имеет право беспрепятственно возвращаться в Российскую Федерацию. \r\n\r\nСтатья 28 \r\n\r\nКаждому гарантируется свобода совести, свобода вероисповедания, включая право исповедовать индивидуально или совместно с другими любую религию или не исповедовать никакой, свободно выбирать, иметь и распространять религиозные и иные убеждения и действовать в соответствии с ними. \r\n\r\nСтатья 29 ','2008-12-05 00:00:00'),
	(5,'brand new news12','<p><em>bla</em> bla<a href="http://mail.ru"> bla</a>&nbsp; &nbsp;&nbsp; KOttRdr &nbsp; fHHHHH sdfdsf&nbsp;</p>','2009-09-16 00:00:00');
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
  UNIQUE KEY `code` (`code`),
  KEY `subcatid` (`subcategory_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



#
# Dumping data for table 'products'
#

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS;*/
REPLACE INTO `products` (`id`, `subcategory_id`, `code`, `name`, `url`, `logo`, `material`, `size`, `content1`, `price`, `created`) VALUES
	('105',35,NULL,'rtr',NULL,'0_20749_ac52242c_XL1.jpg',NULL,NULL,NULL,'0','2009-10-08 01:46:03'),
	('29',58,NULL,'newBrand',NULL,'coastwatch1.jpg',NULL,NULL,NULL,'0','2008-12-11 00:49:51'),
	('28',20,NULL,'blaOne31',NULL,'0_a400_8b53caef_XL0.jpg',NULL,NULL,NULL,'0','2008-12-11 00:48:29'),
	('42',35,NULL,'nu333',NULL,'il76-11.jpg',NULL,NULL,NULL,'0','2008-12-11 18:12:33'),
	('24',61,NULL,'one test',NULL,'Boeing_777_22.jpg',NULL,NULL,NULL,'0','2008-12-10 21:22:55'),
	('15',36,NULL,'plane88',NULL,'0_10cda_91698fbb_XL0.jpeg',NULL,NULL,NULL,'0','2008-12-09 18:49:47'),
	('16',37,NULL,'plane',NULL,'il76-10.jpg',NULL,NULL,NULL,'0','2008-12-09 18:53:02'),
	('17',37,NULL,'plane8',NULL,'boeing_tanker-21.jpg',NULL,NULL,NULL,'0','2008-12-09 18:53:37'),
	('19',20,NULL,'More a3205-13',NULL,'0_34192_6c0ed359_XL0.jpg',NULL,NULL,NULL,'0','2008-12-09 20:23:38'),
	('25',61,NULL,'one test4',NULL,'a380-21.jpg',NULL,NULL,NULL,'0','2008-12-10 21:23:14'),
	('26',19,NULL,'newone',NULL,'0_2e51b_984b04aa_-1-XL0.jpg',NULL,NULL,NULL,'0','2008-12-11 00:43:46'),
	('27',27,NULL,'dnewon',NULL,'9311910.jpg',NULL,NULL,NULL,'0','2008-12-11 00:46:57'),
	('30',56,NULL,'name15',NULL,'MAKS20050100.jpg',NULL,NULL,NULL,'0','2008-12-11 00:51:46'),
	('31',35,NULL,'planes16',NULL,'CRJ7001.jpg',NULL,NULL,NULL,'0','2008-12-11 00:53:09'),
	('32',36,NULL,'asdw2',NULL,'0_22e05_730912ac_-1-XL1.jpg',NULL,NULL,NULL,'0','2008-12-11 00:56:04'),
	('33',37,NULL,'blan2',NULL,'MAKS20050040.jpg',NULL,NULL,NULL,'0','2008-12-11 00:56:32'),
	('34',50,NULL,'wefw2e',NULL,'MAKS20050120.jpg',NULL,NULL,NULL,'0','2008-12-11 00:57:50'),
	('35',51,NULL,'egfr34',NULL,'MAKS20050200.jpg',NULL,NULL,NULL,'0','2008-12-11 00:58:10'),
	('36',55,NULL,'wefwe',NULL,'MAKS20050101.jpg',NULL,NULL,NULL,'0','2008-12-11 00:58:33'),
	('37',60,NULL,'adfc243',NULL,'MAKS20050080.jpg',NULL,NULL,NULL,'0','2008-12-11 00:59:58'),
	('38',59,NULL,'werOrder',NULL,'MAKS20050020.jpg',NULL,NULL,NULL,'0','2008-12-11 01:00:41'),
	('39',61,NULL,'34t3gq',NULL,'CRJ7002.jpg',NULL,NULL,NULL,'0','2008-12-11 01:02:18'),
	('40',50,NULL,'ewr242',NULL,'MAKS20050230.jpg',NULL,NULL,NULL,'0','2008-12-11 01:05:25'),
	('78',76,NULL,'asdf1',NULL,'0_2aae1_c6f8575b_XL0.jpg',NULL,NULL,NULL,'0','2009-10-02 01:50:00'),
	('43',66,NULL,'newo',NULL,'a380-30.jpg',NULL,NULL,NULL,'0','2008-12-11 21:29:19'),
	('44',20,NULL,'testы',NULL,'0_27813_bbb9587d_XL0.jpg',NULL,NULL,NULL,'0','2008-12-11 21:55:09'),
	('45',66,NULL,'testGood',NULL,'2_Learjet85_LR0.jpg',NULL,NULL,NULL,'0','2008-12-12 12:48:17'),
	('47',58,NULL,'ngos',NULL,'crj_900_nextgen-10.jpg',NULL,NULL,NULL,'0','2008-12-12 16:20:25'),
	('49',69,NULL,'za013',NULL,'DSCN00390.JPG',NULL,NULL,NULL,'0','2008-12-13 14:59:51'),
	('50',70,NULL,'tovar01',NULL,'DSCN00360.JPG',NULL,NULL,NULL,'0','2008-12-13 15:05:49'),
	('53',20,NULL,'sdfwd',NULL,'0_2327d_c256f1e5_XL0.jpg',NULL,NULL,NULL,'0','2008-12-13 21:40:38'),
	('52',19,NULL,'wefweewf',NULL,'0_22aad_1f632c6_XL0.jpg',NULL,NULL,NULL,'0','2008-12-13 15:22:56'),
	('54',20,NULL,'sdfwee26',NULL,'0_241de_23431ff2_-1-XL0.jpg',NULL,NULL,NULL,'0','2008-12-13 21:51:26'),
	('55',20,NULL,'fgre',NULL,'0_22aad_1f632c6_XL1.jpg',NULL,NULL,NULL,'0','2008-12-13 21:56:29'),
	('56',71,NULL,'testt',NULL,'3230-20.jpg',NULL,NULL,'','0','2009-03-22 14:49:16'),
	('57',72,NULL,'fuss',NULL,'0_6ca1_31a753d3_XL0.jpg',NULL,NULL,NULL,'0','2009-04-09 15:09:12'),
	('58',72,NULL,'sdf',NULL,'0_2724b_e379be85_XL0.jpg',NULL,NULL,NULL,'0','2009-04-09 15:09:21'),
	('59',20,NULL,'sdf',NULL,'0_77da_fa726095_XL0.jpg',NULL,NULL,NULL,'0','2009-04-11 13:21:32'),
	('60',20,NULL,'dfe',NULL,'0_25764_9b4a19fb_XL0.jpg',NULL,NULL,NULL,'0','2009-04-11 13:21:41'),
	('61',20,NULL,'sef2',NULL,'0_5bbd_8529a79a_orig0.jpg',NULL,NULL,NULL,'0','2009-04-11 13:21:55'),
	('62',20,NULL,'sdee',NULL,'0_27813_bbb9587d_XL1.jpg',NULL,NULL,NULL,'0','2009-04-11 13:22:08'),
	('63',20,NULL,'gere13',NULL,'0_22e05_730912ac_-1-XL0.jpg',NULL,NULL,NULL,'0','2009-04-11 13:22:39'),
	('64',20,NULL,'dfe',NULL,'0_24a55_a71031bc_XL0.jpg',NULL,NULL,NULL,'0','2009-04-11 13:23:06'),
	('65',73,NULL,'sdfg222',NULL,'0_2db9f_ffcb6ed9_XL0.jpg',NULL,NULL,NULL,'0','2009-09-04 18:54:09'),
	('66',74,NULL,'sdfg223',NULL,'0_2db9f_ffcb6ed9_XL1.jpg',NULL,NULL,NULL,'0','2009-09-07 13:28:51'),
	('67',19,NULL,'newOn',NULL,'0_2e51b_984b04aa_-1-XL1.jpg',NULL,NULL,NULL,'0','2009-09-07 13:46:04'),
	('68',36,NULL,'sd23',NULL,'0_2cd15_e929a89_XL0.jpeg',NULL,NULL,NULL,'0','2009-09-08 17:55:03'),
	('69',56,NULL,'dsf34',NULL,'0_2db9f_ffcb6ed9_XL2.jpg',NULL,NULL,NULL,'0','2009-09-10 12:39:09'),
	('70',74,NULL,'sdfg',NULL,'0_8dcc_e32301bb_orig0.jpeg',NULL,NULL,NULL,'0','2009-09-10 16:25:45'),
	('71',74,NULL,'dfg',NULL,'0_2e006_bb6f866b_XL0.jpeg',NULL,NULL,NULL,'0','2009-09-10 16:27:47'),
	('77',19,NULL,'qwerrewq',NULL,'0_20444_51a8687c_XL3.jpg',NULL,NULL,NULL,'0','2009-10-02 01:39:03'),
	('73',19,NULL,'sdf',NULL,'0_20e54_631ab99a_XL2.jpg',NULL,NULL,NULL,'0','2009-10-02 00:41:00'),
	('74',19,NULL,'sdfg',NULL,'0_1c2bc_a50979c3_XL0.jpg',NULL,NULL,NULL,'0','2009-10-02 00:41:35'),
	('75',19,NULL,'hozaaa',NULL,'0_2186b_82eb344_-1-XL1.jpg',NULL,NULL,NULL,'0','2009-10-02 00:43:09'),
	('76',19,NULL,'qwe',NULL,'0_20e54_631ab99a_XL3.jpg',NULL,NULL,NULL,'0','2009-10-02 01:36:13'),
	('79',76,NULL,'sdf',NULL,'0_5dfe_846a8f19_XL0.jpg',NULL,NULL,NULL,'0','2009-10-02 01:50:08'),
	('80',76,NULL,'asdf',NULL,'0_28fbb_e012cfdf_XL7.jpg',NULL,NULL,NULL,'0','2009-10-02 01:50:15'),
	('81',78,NULL,'wer',NULL,'0_6b93_a964a86d_XL0.jpg',NULL,NULL,NULL,'0','2009-10-03 13:29:03'),
	('82',78,NULL,'fghjt',NULL,'0_5dfe_846a8f19_XL1.jpg',NULL,NULL,NULL,'0','2009-10-03 13:29:35'),
	('84',79,NULL,'sdgd',NULL,'0_2f025_4626d2e3_XL0.jpg',NULL,NULL,NULL,'0','2009-10-03 23:22:15'),
	('85',79,NULL,'dh',NULL,'0_260e6_10f5cf0d_XL0.jpg',NULL,NULL,NULL,'0','2009-10-03 23:22:26'),
	('86',79,NULL,'rtyr',NULL,'0_1fa2c_5c406522_-1-XL0.jpg',NULL,NULL,NULL,'0','2009-10-03 23:22:37'),
	('87',79,NULL,'rtgrt',NULL,'0_20749_ac52242c_XL0.jpg',NULL,NULL,NULL,'0','2009-10-03 23:22:47'),
	('88',79,NULL,'fg44',NULL,'0_24294_6e9bb7ac_XL0.jpg',NULL,NULL,NULL,'0','2009-10-03 23:32:40'),
	('89',79,NULL,'rtrt',NULL,'0_64e5_e40e6fa1_XL0.jpg',NULL,NULL,NULL,'0','2009-10-03 23:46:21'),
	('90',79,NULL,'were',NULL,'0_20e54_631ab99a_XL4.jpg',NULL,NULL,NULL,'0','2009-10-03 23:47:14'),
	('91',79,NULL,'rfgter',NULL,'0_64e5_e40e6fa1_XL1.jpg',NULL,NULL,NULL,'0','2009-10-03 23:49:28'),
	('92',79,NULL,'wete',NULL,'0_55ac_594fd84b_XL0.jpg',NULL,NULL,NULL,'0','2009-10-03 23:49:46'),
	('93',79,NULL,'ert',NULL,'0_2151f_8b42fba7_XL0.jpg',NULL,NULL,NULL,'0','2009-10-03 23:49:56'),
	('94',79,NULL,'ert',NULL,'0_210ab_715b98_-1-XL1.jpg',NULL,NULL,NULL,'0','2009-10-03 23:50:09'),
	('95',79,NULL,'s',NULL,'0_219e5_4785ef70_-1-XL0.jpg',NULL,NULL,NULL,'0','2009-10-03 23:54:21'),
	('96',79,NULL,'ewr',NULL,'0_55ac_594fd84b_XL1.jpg',NULL,NULL,NULL,'0','2009-10-03 23:56:57'),
	('98',78,NULL,'sdfg',NULL,'0_55ac_594fd84b_XL2.jpg',NULL,NULL,NULL,'0','2009-10-04 00:07:40'),
	('99',81,NULL,'rtrt',NULL,'0_55ac_594fd84b_XL3.jpg',NULL,NULL,NULL,'0','2009-10-04 01:24:16'),
	('100',82,NULL,'werer',NULL,'0_2aae1_c6f8575b_XL1.jpg',NULL,NULL,NULL,'0','2009-10-04 01:32:50'),
	('101',82,NULL,'wer',NULL,'0_2bfb1_ac14c7d0_XL0.jpg',NULL,NULL,NULL,'0','2009-10-04 01:32:56'),
	('102',82,NULL,'ere',NULL,'0_2cb50_f09a7231_XL0.jpg',NULL,NULL,NULL,'0','2009-10-04 01:33:05'),
	('103',82,NULL,'were',NULL,'0_5dfe_846a8f19_XL2.jpg',NULL,NULL,NULL,'0','2009-10-04 01:33:13'),
	('104',82,NULL,'were',NULL,'0_244ba_f151647e_XL0.jpg',NULL,NULL,NULL,'0','2009-10-04 01:33:24'),
	('106',35,NULL,'wet',NULL,'0_210ab_715b98_-1-XL2.jpg',NULL,NULL,NULL,'0','2009-10-08 01:46:09'),
	('107',35,NULL,'34523',NULL,'0_28616_5dbe10d_XL0.jpg',NULL,NULL,NULL,'0','2009-10-08 01:46:19'),
	('108',35,NULL,'wt',NULL,'0_1fa2c_5c406522_-1-XL1.jpg',NULL,NULL,NULL,'0','2009-10-08 01:46:25'),
	('109',85,NULL,'wert',NULL,'0_263c9_fbfa7ef2_XL0.jpg',NULL,NULL,NULL,'0','2009-10-09 00:35:51'),
	('110',85,NULL,'ert',NULL,'0_219e5_4785ef70_-1-XL1.jpg',NULL,NULL,NULL,'0','2009-10-09 00:36:03'),
	('111',86,NULL,'hujkkl',NULL,'0_260e6_10f5cf0d_XL1.jpg',NULL,NULL,NULL,'0','2009-10-09 00:59:49'),
	('112',86,NULL,'huoh',NULL,'0_219e5_4785ef70_-1-XL2.jpg',NULL,NULL,NULL,'0','2009-10-09 01:00:00'),
	('113',86,NULL,'fgrwe',NULL,'0_24294_6e9bb7ac_XL1.jpg',NULL,NULL,NULL,'0','2009-10-09 01:07:32');
/*!40000 ALTER TABLE `products` ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'static_pages'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `static_pages` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(250) default NULL,
  `body` text,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



#
# Dumping data for table 'static_pages'
#

LOCK TABLES `static_pages` WRITE;
/*!40000 ALTER TABLE `static_pages` DISABLE KEYS;*/
REPLACE INTO `static_pages` (`id`, `name`, `body`, `created`, `modified`) VALUES
	(1,'Главная','<p>Компания &laquo;Марис Интериор&raquo; работает на Российском рынке уже более 15 лет.<br />\r\nОсновные виды деятельности : <br />\r\n<br />\r\n&nbsp;&nbsp;&nbsp;-реализация напольных покрытий из разных пород дерева      <br />\r\n&nbsp;&nbsp;&nbsp;-теплые полы и системы обледенения      <br />\r\n&nbsp;&nbsp;&nbsp;-стильная электрика VIMAR(Италия)      <br />\r\n&nbsp;&nbsp;&nbsp;-проектирование и монтаж <br />\r\n<br />\r\nНатуральное дерево неповторимо, как сама природа. Аура естественности и добротности, сочетание красоты и надежности, яркая индивидуальность - все это Вы получаете, приобретая полы из натурального дерева! <br />\r\nС начала своего образования мы работаем со многими иностранными и российскими партнерами, которые по праву считаются лидерами в области изготовления паркета, имеющими креативное и новаторское мышление. Изучив с особой тщательностью данный рынок, мы предлагаем самый широкий спектр напольных покрытий. <br />\r\n<br />\r\nЯвляясь официальным представителем шведской компании KIMA и норвежской NEXANS, &laquo;Марис Интериор&raquo; более десяти лет представляет на отечественном рынке продукцию мировых лидеров в области электрических систем обогрева крыш, полов, водостоков. <br />\r\n<br />\r\nС особой гордостью представляем на Российском рынке великолепную, всемирно известную электрику VIMAR(Италия). Эта продукция получила популярность в мире благодаря шикарному дизайну, отменному качеству и умеренным ценам. <br />\r\n<br />\r\nВ нашем составе имеется подразделение, выполняющее работы по проектированию и монтажу всех материалов. На все работы в соответствии с Российским законодательством предоставляется гарантия 2 года . <br />\r\n<br />\r\n<b>&laquo;Делайте маленькое дело, но овладевайте им в совершенстве и относитесь к нему как к делу великому&raquo;.</b> <br />\r\n<br />\r\nЭтот афоризм Анре Моруа, является направляющим вектором для всего коллектива нашей компании. Все, кто хоть раз посетил нас, приходят к нам снова и снова, потому что для нас важны уверенность и спокойствие заказчиков, которые доверяют нам. Ведь это залог успеха. Мы надеемся, что в скором времени в их числе окажетесь и Вы. <br />\r\n&nbsp;</p>\r\n<div align="center">Желаем Вам и нам удачи и процветания  !!!</div>\r\n<!--contentcenter2col--> 					 					<br clear="all" />\r\n<!--frame2col--> 		 			 		 	       	 		 			<span class="copyright">Copiright 2008 Maris Interior</span>','2009-10-05 17:50:11','2009-10-05 18:11:20'),
	(2,'О компании ','<b>САЙТ НАХОДИТСЯ В СТАДИИ РАЗРАБОТКИ 2.</b><br>Приносим извинения за предоставленные неудобства 2.','2009-10-05 17:50:53','2009-10-05 17:50:53'),
	(3,'Услуги ','<p><b>САЙТ НАХОДИТСЯ В СТАДИИ РАЗРАБОТКИ 3</b><br />\r\nПриносим извинения за предоставленные неудобства eto togo , ochen prinosim</p>','2009-10-05 18:14:11','2009-10-05 21:40:21'),
	(4,'Контакты ','<p><b>Единый многоканальный телефон:  (495) 921-30-78</b>  <br />\r\n<br />\r\nНаши магазины:</p>\r\n<table width="700" cellspacing="0" cellpadding="0" border="0">\r\n    <tbody>\r\n        <tr>\r\n            <td height="100" width="120"><a target="_blank" href="http://horpol.ru/img/frunzen.jpg"><img border="0" src="http://horpol.ru/img/frunzen-s.jpg" alt="" /></a></td>\r\n            <td>Фрунзенская наб., д. 30 &laquo;РОССТРОЙЭКСПО&raquo;, павильоны 2, 3  	<br />\r\n            Тел.: (495) 745-43-33 пав. 2  	<br />\r\n            Тел.: (495) 745-43-54 пав. 3</td>\r\n            <td height="100" width="120"><a target="_blank" href="http://horpol.ru/img/fr-b.jpg"><img border="0" src="http://horpol.ru/img/fr-s.jpg" alt="" /></a></td>\r\n        </tr>\r\n        <tr>\r\n            <td height="100" width="120"><a target="_blank" href="http://horpol.ru/img/naxim.jpg"><img border="0" src="http://horpol.ru/img/naxim-s.jpg" alt="" /></a></td>\r\n            <td>Нахимовский проспект, д. 24 &laquo;СТРОЙ-СИТИ&raquo;, стенд В4 	<br />\r\n            Тел.: (495) 504-04-61</td>\r\n            <td height="100" width="120"><a target="_blank" href="http://horpol.ru/img/sv-b.jpg"><img border="0" src="http://horpol.ru/img/sv-s.jpg" alt="" /></a></td>\r\n        </tr>\r\n        <tr>\r\n            <td height="100" width="120"><a target="_blank" href="http://horpol.ru/img/rumancevo.jpg"><img border="0" src="http://horpol.ru/img/rumancevo-s.jpg" alt="" /></a></td>\r\n            <td>Киевское шоссе, д.1  Бизнес Парк &laquo;РУМЯНЦЕВО&raquo; <br />\r\n            магазин &quot;ХОРОШИЙ ПОЛ&quot;   	<br />\r\n            Тел.: (495) 739-21-01  	<br />\r\n            Тел.: (495) 739-23-28 (офис)</td>\r\n            <td height="100" width="120"><a target="_blank" href="http://horpol.ru/img/hp-b.jpg"><img border="0" src="http://horpol.ru/img/hp-s.jpg" alt="" /></a></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<p><br />\r\n<br />\r\n<a href="mailto:horpol@mail.ru">E-mail: horpol@mail.ru</a></p>\r\n<p>Cайты:</p>\r\n<p><a target="_blank" href="http://www.horpol.ru/">http://www.horpol.ru</a>&nbsp; ,&nbsp; <a target="_blank" href="http://www.teraska.ru/">http://www.teraska.ru</a></p>\r\n<p>&nbsp;</p>','2009-10-05 18:31:29','2009-10-05 21:39:37');
/*!40000 ALTER TABLE `static_pages` ENABLE KEYS;*/
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
  `url` varchar(250) default NULL,
  `last` int(9) default NULL,
  `product_count` int(11) unsigned default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `catbrand` (`category_id`,`brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



#
# Dumping data for table 'sub_categories'
#

LOCK TABLES `sub_categories` WRITE;
/*!40000 ALTER TABLE `sub_categories` DISABLE KEYS;*/
REPLACE INTO `sub_categories` (`id`, `category_id`, `brand_id`, `brand_category_id`, `active`, `name`, `url`, `last`, `product_count`, `created`, `modified`) VALUES
	(19,'2','1','1',1,'sdfdd','1',NULL,'8','2008-11-19 15:04:19','2009-10-10 01:46:24'),
	(20,'2','3','2',1,'ZaTe','1',NULL,'12','2008-11-19 16:30:22','2009-10-11 23:11:10'),
	(27,'2','2','3',1,'d','sdsdfe',NULL,'1','2008-11-19 18:51:33','2009-10-10 00:46:22'),
	(35,'4','4','4',1,'planes1','1',NULL,'6','2008-12-09 12:40:37','2009-10-10 00:46:22'),
	(36,'2','6','5',1,'planes2','1',NULL,'3','2008-12-09 18:47:15','2009-10-10 00:46:22'),
	(37,'2','6','5',1,'palanes3','1',NULL,'3','2008-12-09 18:51:46','2009-10-10 00:46:22'),
	(50,'6','3','6',1,'name22',NULL,NULL,'2','2008-12-10 19:44:57','2009-10-10 00:46:23'),
	(51,'6','3','6',1,'name101',NULL,NULL,'1','2008-12-10 19:45:13','2009-10-10 00:46:23'),
	(55,'6','3','6',1,'name2',NULL,NULL,'1','2008-12-10 19:49:03','2009-10-10 00:46:23'),
	(56,'3','2','7',1,'name','1',NULL,'2','2008-12-10 19:49:20','2009-10-13 01:15:07'),
	(58,'3','1','8',1,'brandNew','1',NULL,'2','2008-12-10 20:26:19','2009-10-10 00:46:23'),
	(59,'6','1','9',1,'ForOrder','',NULL,'1','2008-12-10 20:30:57','2009-10-10 00:46:23'),
	(60,'2','2','3',1,'name4',NULL,NULL,'1','2008-12-10 20:38:26','2009-10-10 00:46:23'),
	(61,'4','4','4',1,'a350next','1',NULL,'3','2008-12-10 21:22:18','2009-10-10 00:46:23'),
	(62,'2','6','5',1,'newOfToday','1',NULL,NULL,'2008-12-11 17:39:23','2009-10-10 00:46:23'),
	(64,'6','3','6',1,'naw8',NULL,NULL,NULL,'2008-12-11 19:20:06','2009-10-10 00:46:23'),
	(66,'5','3','10',1,'NewOne',NULL,NULL,'2','2008-12-11 20:41:18','2009-10-10 00:46:23'),
	(67,'2','2','3',1,'nwenn','1',NULL,NULL,'2008-12-12 13:04:41','2009-10-10 00:46:23'),
	(68,'5','9','11',1,'vau',NULL,NULL,NULL,'2008-12-12 21:24:02','2009-10-10 00:46:23'),
	(69,'7','10','12',1,'podrazdel',NULL,NULL,'1','2008-12-13 14:57:29','2009-10-10 00:46:23'),
	(70,'7','10','12',1,'podrazdel2',NULL,NULL,'1','2008-12-13 15:03:02','2009-10-10 00:46:23'),
	(71,'14','1','13',1,'newtt','1',NULL,'1','2009-03-22 14:48:48','2009-10-10 00:46:23'),
	(72,'17','1','14',1,'case2',NULL,NULL,'2','2009-04-09 15:08:52','2009-10-10 00:46:24'),
	(73,'18','2','15',1,'Upps',NULL,NULL,'1','2009-09-04 18:53:24','2009-10-10 00:46:24'),
	(74,'3','2','7',1,'name2','1',NULL,'3','2009-09-07 13:28:35','2009-10-10 00:46:24'),
	(76,'2','1','1',1,'Nu vot','1',NULL,'3','2009-10-01 01:42:12','2009-10-10 00:46:24'),
	(77,'2','8','17',1,'new one1','1',NULL,NULL,'2009-10-01 01:54:23','2009-10-10 00:46:24'),
	(78,'2','10','18',1,'newOnnn','1',NULL,'3','2009-10-02 01:58:49','2009-10-10 00:46:24'),
	(79,'2','10','18',1,'brandNew1','1',NULL,'13','2009-10-03 23:14:38','2009-10-10 00:46:24'),
	(80,'2','10','18',1,'Туц туц','1',NULL,NULL,'2009-10-04 01:05:07','2009-10-10 00:46:24'),
	(81,'2','11','19',1,'Туц тк','1',NULL,'1','2009-10-04 01:15:52','2009-10-10 00:46:24'),
	(82,'2','3','2',1,'Adnndd','1',NULL,'5','2009-10-04 01:32:34','2009-10-10 00:46:24'),
	(83,'2','3','2',1,'qwer','1',NULL,NULL,'2009-10-04 01:34:39','2009-10-10 00:46:24'),
	(84,'4','4','4',1,'NNNeww','1',NULL,NULL,'2009-10-08 01:40:37','2009-10-10 00:46:24'),
	(85,'14','1','13',1,'forVintage','1',NULL,'2','2009-10-09 00:35:33','2009-10-10 00:46:24'),
	(86,'10','6','20',1,'forboVintage','1',NULL,'3','2009-10-09 00:59:19','2009-10-10 00:46:24'),
	(87,'3','2','7',1,'коллекция БЛОЧНЫЙ ПАРКЕТ ДУБ.ПОСМОТРЕТЬ ЗДЕСЬ!','1',NULL,NULL,'2009-10-13 01:15:25','2009-10-13 01:15:44');
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
	('1','kondrat','9c51dabdd16d955b63369ae304b1878b5ccaa352','admin','',0,'0000-00-00 00:00:00'),
	('2','za','c129b324aee662b04eccf68babba85851346dff9','admin','',0,'0000-00-00 00:00:00'),
	('3','admin','c129b324aee662b04eccf68babba85851346dff9','admin','',0,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS;*/
UNLOCK TABLES;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;*/

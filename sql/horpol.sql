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
# Date/time:                    2009-10-09 22:00:39
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;



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
	('16','novZa',NULL,'0','2009-09-16 19:57:00','2009-09-16 19:57:00'),
	('17','New22',NULL,'0','2009-10-01 16:20:11','2009-10-01 16:20:11');
/*!40000 ALTER TABLE `albums` ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'banners'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `banners` (
  `id` int(5) NOT NULL auto_increment,
  `type` int(10) NOT NULL default '1',
  `logo` text,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'banners'
#

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS;*/
REPLACE INTO `banners` (`id`, `type`, `logo`, `created`, `modified`) VALUES
	(7,1,'0_2db9f_ffcb6ed9_XL0.jpg','2009-10-06 21:12:28','2009-10-09 13:01:42'),
	(8,2,'0_2a79c_a94f25d6_XL0.jpeg','2009-10-06 21:12:37','2009-10-06 21:12:36'),
	(11,1,'banner12.gif','2009-10-06 21:35:45','2009-10-08 18:13:08'),
	(12,2,'banner13.gif','2009-10-06 21:36:31','2009-10-06 21:36:31'),
	(13,1,'bann1.png','2009-10-08 13:57:14','2009-10-08 20:58:41'),
	(15,1,'banner_test0.gif','2009-10-08 20:48:42','2009-10-08 21:34:10'),
	(16,2,'banner_test20.png','2009-10-08 21:43:26','2009-10-08 21:43:26');
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
  `created` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `banCat` (`banner_id`,`category_id`),
  KEY `ban` (`banner_id`),
  KEY `cat` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=latin1;



#
# Dumping data for table 'banners_categories'
#

LOCK TABLES `banners_categories` WRITE;
/*!40000 ALTER TABLE `banners_categories` DISABLE KEYS;*/
REPLACE INTO `banners_categories` (`id`, `banner_id`, `category_id`, `brand_id`, `created`) VALUES
	('137','13','2',NULL,NULL),
	('138','13','3',NULL,NULL),
	('139','13','4',NULL,NULL),
	('140','13','5',NULL,NULL),
	('144','11','2',NULL,NULL),
	('145','11','3',NULL,NULL),
	('159','15','2',NULL,NULL),
	('160','15','3',NULL,NULL),
	('161','15','4',NULL,NULL),
	('162','15','8',NULL,NULL),
	('163','7','6',NULL,NULL),
	('164','7','7',NULL,NULL),
	('165','7','10',NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;



#
# Dumping data for table 'banners_static_pages'
#

LOCK TABLES `banners_static_pages` WRITE;
/*!40000 ALTER TABLE `banners_static_pages` DISABLE KEYS;*/
REPLACE INTO `banners_static_pages` (`id`, `banner_id`, `static_page_id`) VALUES
	('16','13','0'),
	('18','11','1'),
	('29','15','1'),
	('30','7','0');
/*!40000 ALTER TABLE `banners_static_pages` ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'brands'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `brands` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(64) NOT NULL default 'No name',
  `url` varchar(250) default NULL,
  `logo` text NOT NULL,
  `body` text,
  `origin` varchar(250) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'brands'
#

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS;*/
REPLACE INTO `brands` (`id`, `name`, `url`, `logo`, `body`, `origin`, `created`, `modified`) VALUES
	('1','admonter','','Admonter01.jpg','<p><span style="background-color: Lime;">this is a boeing 777</span> just for test So, this is a boeing 777 <strike><u><em><strong>just for test this is a boeing</strong></em></u></strike> 777 just for test this is a boeing 777 just for test this is a boeing 777 just for<strong><span style="color: rgb(255, 0, 255);"><span style="font-size: medium;"> tes1<br />\r\n</span></span></strong></p>','Finland','2008-11-11 01:05:42','2009-09-28 18:21:26'),
	('2','alpenholz','','alpenholz00.jpg','<p>Hello</p>','Не указанаТТ','2008-11-11 15:04:35','2009-10-01 15:46:40'),
	('3','barkinek','asus','barliner00.jpg','<p>this is a boeing 777 just for test So, this is a boeing 777 just for test this is a boeing 777 just for test this is a boeing this is a boeing 777 just for test So, this is a boeing 777 just for test this is a boeing 777 just for test this is a boeing this is a boeing 777 just for test So, this is a boeing 777 just for test this is a boeing 777 just for test this is a boeing</p>',NULL,'2008-11-17 21:15:15','2009-09-07 19:38:15'),
	('4','Melcomb','farm','0.jpg','<p>Just small description of &quot;Melcomb&quot;</p>','Germany2','2008-11-20 12:54:04','2009-09-28 21:28:37'),
	('6','forbo','','FORBO00.jpg','','','2008-12-08 17:25:28','2009-09-08 13:56:46'),
	('8','ipowood',NULL,'ipowood00.jpg','<p>Ipowood. This is a<u><span style="color: rgb(255, 102, 0);"><span style="font-size: large;"> very good </span></span></u>brand.</p>','England','2008-12-12 21:22:10','2009-09-28 21:32:11'),
	('9','dsfw',NULL,'karelia00.jpg','',NULL,'2008-12-12 21:23:35','2009-09-07 19:21:07'),
	('10','zayac',NULL,'karhrs00.jpg','Just zayac',NULL,'2008-12-13 14:55:41','2009-09-07 19:21:16'),
	('11','airket',NULL,'logo_ariket00.jpg','',NULL,'2009-09-07 14:49:47','2009-09-07 19:21:45'),
	('14','No name',NULL,'0_f10f_1d805a7e_XL0.jpeg','<p>New description</p>','Japan','2009-09-30 13:49:38','2009-10-01 14:21:21');
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
# Table structure for table 'categories'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `categories` (
  `id` int(11) NOT NULL auto_increment,
  `type` int(10) NOT NULL default '1',
  `active` tinyint(3) unsigned NOT NULL default '1',
  `name` varchar(250) NOT NULL default '',
  `pos` int(11) default NULL,
  `title` varchar(250) default NULL,
  `body` text,
  `slogan` text,
  `sub_category_count` int(11) unsigned default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'categories'
#

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS;*/
REPLACE INTO `categories` (`id`, `type`, `active`, `name`, `pos`, `title`, `body`, `slogan`, `sub_category_count`, `created`, `modified`) VALUES
	(2,1,1,'Художественный паркет',8,'sadf3','<p><img src="/app/webroot/files/0_25ce0_6c8c77f3_orig.jpg" alt="" /><em><strong>More</strong></em> <em>text</em> g<u><em>oes</em></u> <strong><em>here</em></strong>. <strike>vot blin</strike></p>',' Здесь только лучшее от природы и производителей Каждая фабрика-яркая индивидуальность','21','2008-11-11 14:04:12','2009-10-08 18:32:16'),
	(3,1,1,'Массивная доска',0,'My title','<div class="maincontent">\r\n<p style="text-align: left;"><em>Массивной доской считается напольное покрытие из массива древесины длиной более 900 мм и шириной более 90 мм. Толщина доски может быть и 15, и 18, и 22, и 40 мм.2</em></p>\r\n<p style="text-align: left;"><em>Массивная доска, без сомнения, самый экологичный и долговечный вид покрытия - ведь она целиком и полностью, состоит из натурального природного материала, в отличие от паркетной доски и ламината. Древесина способна согреть и украсить как современный, так и классический интерьер. А новые технологии производства, многочисленные способы монтажа, особенности пород дерева, необычайно расширяют его художественные возможности. Полы из массивных досок выглядят стильно и благородно. Современная массивная доска долговечнее других видов покрытия за счет более толстого верхнего слоя. Кроме того, массивная доска значительно упрощает укладку.</em></p>\r\n<p style="text-align: left;"><em>Массивная доска была широко известна и использовалась еще до того как появились ламинированные полы. Этот вид напольного покрытия, без сомнения, самый долговечный. От штучного паркета массивная доска отличается размерами. Если отдельные дощечки штучного паркета имеют размер 420х70х15 мм (в среднем), то габариты массивной доски могут быть до 6000 мм в длину, до 350 мм в ширину и толщиной 18-22 мм. Монтаж массивной доски осуществляется практически так же, как и монтаж штучного паркета. Массивная доска может поставляться как в необработанном виде (шлифованная), так и с финишным покрытием (лак или масло), нанесенным в заводских условиях. Так же мы можем предложить самые необычные композиции цвета и обработки древесины по индивидуальному проекту.</em></p>\r\n<em><span style="font-size: x-large;"><span style="font-family: Arial;"> </span></span></em></div>','Все лучшее от природы и <br> производителей.','5','2008-11-11 14:27:11','2009-10-08 18:32:16'),
	(4,1,1,'Паркетная доска',1,'','<p><span style="color: rgb(51, 102, 255);"><span style="font-size: large;"><strong><em>Современные</em></strong></span></span><em> <strong><span style="font-size: larger;"><span style="color: rgb(51, 153, 102);">паркетные</span></span></strong> д<span style="color: rgb(153, 51, 0);"><span style="font-size: larger;">оски</span></span> выпускаются длиной от </em><u><strong>1,2 </strong></u><em>м до </em><span style="color: rgb(255, 0, 255);"><strong>3</strong></span><em> м, шириной 130-220 мм и толщиной 14-22 мм. Первые два слоя доски чаще всего производятся из хвойных пород древесины, а уже на них, как на подложку наклеиваются небольшие прямоугольные планки (толщиной <span style="font-size: x-large;"><span style="color: rgb(255, 0, 0);"><strong>1-4 мм</strong></span></span>) из ценных пород дерева и покрываются слоями лака. Верхний лицевой слой доски представляет собой тот же самый штучный паркет (дубовый, кленовый, ясеневый, вишневый или иной), <span style="background-color: rgb(0, 204, 255);"><span style="font-size: larger;"><span style="font-family: Comic Sans MS;"><u>но гораздо более тонкий</u></span></span></span>. В отличие от штучного паркета, который требует тщательной подготовки перед укладкой, паркетные доски выпускаются уже полностью готовые к нанесению. П</em><em><img hspace="5" height="73" width="95" vspace="5" border="1" align="left" src="/app/webroot/img/upload_pic/0_2e51b_984b04aa_-1-XL.jpg" alt="" /></em><em>ятик</em><em>ратный слой высокопрочного лака, нанесенного заводским способом, предохраняет пол от износа гораздо более надежно, чем любое покрытие в условиях установки на месте. Паркетная доска обеспечивает высокую акустическую и термическую изоляцию, сопротивляется деформациям и механическим повреждениям. Благодаря гигроскопичности дерева обладает свойством натуральной регулировки микроклимата. Главное отличие паркетной доски от массивной состоит в том, что паркетная доска - это трехслойная конструкция из древесины различных пород. Верхний слой паркетной доски &ndash; шпон из ценных пород дерева, толщиной 3,5-4 мм.Затем-шип (слой прочной древесины). Шпон и шип соединены между собой прочным клеем. Средний слой (шип) самый широкий во всей конструкции. Для изготовления среднего слоя используются такие породы древесины, которые имеют высокие качества прочности, но внешний вид не столь эстетичен, как у дорогих пород. Это существенно удешевляет стоимость паркетной доски, не лишая ее совершенного внешнего вида. <br />\r\n<br />\r\nВ отличие от штучного паркета, для укладки которого нужен специалист, с монтажом паркетной доски справится и новичок всего за несколько часов. Паркетная доска имеет заводское покрытие (лак или масло) в несколько слоев и, как правило, не требует дополнительной обработки. <br />\r\n<br />\r\nЗаводское покрытие обеспечит Вашей паркетной доске прекрасный внешний вид на долгие годы. Шлифовать паркетную доску можно практически также как и штучный паркет &ndash; 4-5 раз, поэтому такой пол прослужит Вам 35-50 лет.</em></p>','Where is my slogan. au!','2','2008-11-11 14:32:28','2009-10-08 18:32:16'),
	(5,1,1,'Штучный паркет',6,'sdf','',NULL,'2','2008-11-11 14:33:02','2009-10-08 18:32:16'),
	(6,1,1,'Изделия на заказ',10,NULL,NULL,NULL,'5','2008-12-04 19:31:16','2009-10-08 18:32:16'),
	(7,1,1,'Ламинат',5,NULL,NULL,NULL,'3','2008-12-13 14:49:45','2009-10-08 18:32:16'),
	(8,2,1,'Пробковые покрытия',3,NULL,'','Слоган будет здесь','1','2008-12-16 12:21:13','2009-10-08 18:33:40'),
	(9,1,1,'Плинтусы, клеи, лаки,<br /> масла',2,NULL,'',NULL,NULL,'2008-12-16 12:21:38','2009-10-08 18:32:16'),
	(10,3,1,'Терассная доска',4,NULL,'<p>Че-нибудь здесь</p>','Террасные доски. вот!','1','2008-12-16 12:22:22','2009-10-08 18:32:16'),
	(11,1,1,'Плитка, керамогранит',9,NULL,'',NULL,NULL,'2008-12-16 12:22:34','2009-10-08 18:32:16'),
	(12,1,1,'Структурные обои',7,NULL,'',NULL,NULL,'2008-12-16 12:22:46','2009-10-08 18:32:16'),
	(14,3,1,'newtest',11,'asdfeeee','<h4>You <b>are</b> using FCKeditor.</h4>','New slogan','1','2009-03-22 14:47:57','2009-10-08 18:32:16'),
	(15,3,1,'New test',12,'ddd','<p>HI <a href="http://mail.ru">guys</a></p>',NULL,NULL,'2009-03-23 12:51:40','2009-10-08 18:32:16'),
	(17,2,1,'newCase2',13,'newCase2','',NULL,'1','2009-04-09 15:07:37','2009-10-08 18:32:16'),
	(18,2,1,'new00',16,'sdf','',NULL,'1','2009-09-04 18:52:27','2009-10-08 18:32:16'),
	(23,2,1,'nnew01',15,'','','Здесь только лучшее от природы и производителей. Каждая фабрика-яркая индивидуальность',NULL,'2009-09-04 20:24:08','2009-10-08 18:32:16'),
	(25,1,1,'NewCaattt',14,'NewCaattt','','Здесь только лучшее от природы и производителей. <br />Каждая фабрика-яркая индивидуальность',NULL,'2009-10-01 14:01:06','2009-10-08 18:32:16');
/*!40000 ALTER TABLE `categories` ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'images'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `images` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `album_id` int(10) unsigned default NULL,
  `pos` int(11) unsigned default '0',
  `name` varchar(150) NOT NULL default '',
  `image` text,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `albumid` (`album_id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'images'
#

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS;*/
REPLACE INTO `images` (`id`, `album_id`, `pos`, `name`, `image`, `created`, `modified`) VALUES
	('2',NULL,'0','d','php0.gif','2008-11-10 19:45:52','2008-11-10 19:45:52'),
	('3',NULL,'0','qwer','logo0.gif','2008-11-10 19:48:26','2008-11-10 19:48:26'),
	('4',NULL,'0','qwer','logo1.gif','2008-11-10 19:49:00','2008-11-10 19:49:00'),
	('37','1','0','qwer2','DPD_52010.JPG','2008-12-15 15:21:17','2008-12-15 15:21:17'),
	('39','1','0','asdf1','DPD_52250.JPG','2008-12-15 15:43:42','2008-12-15 15:43:42'),
	('42','1','0','sdf22','DPD_52331.JPG','2008-12-15 15:48:40','2008-12-15 15:48:40'),
	('52','2','0','asdf','1320.jpg','2008-12-15 18:13:09','2008-12-15 18:13:09'),
	('53','2','0','wefrwe','1720.jpg','2008-12-15 18:13:32','2008-12-15 18:13:32'),
	('54','2','0','sdf','1250.jpg','2008-12-15 18:23:50','2008-12-15 18:23:50'),
	('55','2','0','sefrwe','250.jpg','2008-12-15 18:24:20','2008-12-15 18:24:20'),
	('56','2','0','rtwert','1280.jpg','2008-12-15 18:34:20','2008-12-15 18:34:20'),
	('57','2','0','wert','1670.jpg','2008-12-15 18:34:40','2008-12-15 18:34:40'),
	('59','3','0','qwerwe','1281.jpg','2008-12-15 18:42:44','2008-12-15 18:42:44'),
	('60','3','0','wef','2341.jpg','2008-12-15 18:43:00','2008-12-15 18:43:00'),
	('61','3','0','dfg','2250.jpg','2008-12-15 18:45:32','2008-12-15 21:45:12'),
	('65','6','0','sdfeww','351.jpg','2008-12-15 19:27:52','2008-12-15 19:27:52'),
	('66','6','0','foto4','10.jpg','2008-12-15 19:56:41','2008-12-15 21:37:27'),
	('68','7','0','maee','200.jpg','2008-12-15 20:07:13','2008-12-15 20:07:13'),
	('69','7','0','mee','240.jpg','2008-12-15 20:07:36','2008-12-15 20:07:36'),
	('70','8','0','sadfwei','241.jpg','2008-12-15 20:11:35','2008-12-15 20:11:35'),
	('72','7','0','sde','1031.jpg','2008-12-15 20:12:31','2008-12-15 20:12:31'),
	('77','8','0','badfew','560.jpg','2008-12-15 20:20:35','2008-12-15 20:20:35'),
	('80','7','0','5647yh','1321.jpg','2008-12-15 20:39:42','2008-12-15 20:39:42'),
	('82','7','0','efwe','1721.jpg','2008-12-15 21:17:46','2008-12-15 21:17:46'),
	('83','3','0','eftger','790.jpg','2008-12-15 21:26:13','2008-12-15 21:26:13'),
	('84','3','0','rwetr11','2340.jpg','2008-12-15 21:26:24','2008-12-15 21:26:24'),
	('85','1','0','sdf','0_22be6_f7daa72b_XL0.jpg','2009-04-09 20:12:19','2009-04-09 20:12:19'),
	('86','2','0','sdf','0_22be6_f7daa72b_XL1.jpg','2009-04-09 20:12:45','2009-04-09 20:12:45'),
	('87','2','0','sdf','0_77da_fa726095_XL0.jpg','2009-04-09 20:13:03','2009-04-09 20:13:03'),
	('88','2','0','sdf','0_27f2e_ca52cef2_XL0.jpg','2009-04-09 20:13:11','2009-04-09 20:13:11'),
	('89','2','0','sdfe','0_24a55_a71031bc_XL0.jpg','2009-04-09 20:13:20','2009-04-09 20:13:20'),
	('90','2','0','sdf','0_219e5_4785ef70_-2-XL0.jpg','2009-04-09 20:13:33','2009-04-09 20:13:33'),
	('91','2','0','sdf','0_34192_6c0ed359_XL0.jpg','2009-04-09 20:14:17','2009-04-09 20:14:17'),
	('92','2','0','sdf','0_2724b_e379be85_XL0.jpg','2009-04-09 20:14:53','2009-04-09 20:14:53'),
	('93','2','0','sdf','0_a230_230a61f4_XL0.jpg','2009-04-09 20:15:05','2009-04-09 20:15:05'),
	('94','2','0','sdf','0_22de8_755d82aa_-2-XL0.jpg','2009-04-09 20:15:24','2009-04-09 20:15:24'),
	('95','9','0','fgr','0_2c5ad_e643010b_XL0.jpg','2009-09-07 14:30:22','2009-09-07 14:30:22'),
	('96','10','0','test12','0_22e05_730912ac_-1-XL0.jpg','2009-09-08 12:40:11','2009-09-08 12:40:11'),
	('97','10','0','test124','0_2bfb1_ac14c7d0_XL0.jpg','2009-09-08 12:40:33','2009-09-08 12:40:33'),
	('98','8','0','dsfe','0_210b7_97bf00a7_XL0.jpeg','2009-09-09 20:27:17','2009-09-09 20:27:17'),
	('99','12','0','sdf','0_2a94b_d6c0e285_XL0.jpeg','2009-09-10 17:21:40','2009-09-10 17:21:40'),
	('100','12','0','sdfgg','0_2e31e_736971d8_XL0.jpeg','2009-09-10 17:22:35','2009-09-10 17:22:35'),
	('101','12','0','dfe','0_2c1de_e12bd434_XL0.jpg','2009-09-10 17:24:50','2009-09-10 17:24:50');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'news'
#

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS;*/
REPLACE INTO `news` (`id`, `name`, `body`, `created`) VALUES
	(1,'Новые цены на паркетную доску и ламинат ','<p>QWERTY qwerty1m, <strong>a,smd бфыьвлцоул ы стьыьс жцьф вжфвф жф цвжлдфоцб ac kajw;\'aa klaewfkh,a d,jal; kajewdla  qwerty1m, a,smd бфыьвлцоул ы стьыьс жцьф вжфвф жф цвжлдфоцб ac kajw;\'aa klaewfkh,a d,jal; kajewdla qwerty1m, a,smd бфыьвлцоул ы стьыьс жцьф вжфвф жф цвжлдфоцб ac kajw;\'aa klaewfkh,a d,jal; kajewdla qwerty1m, a,smd </strong>бфыьвлцоул ы стьыьс жцьф вжфвф жф цвжлдфоцб ac kajw;\'aa klaewfkh,a d,jal; kajewdla qwerty1m, a,smd бфыьвлцоул ы стьыьс жцьф вжфвф жф цвжлдфоцб ac kajw;\'aa klaewfkh,a d,jal; kajewdla qwerty1m, a,smd бфыьвлцоул ы стьыьс жцьф вжфвф жф цвжлдфоцб ac kajw;\'aa klaewfkh,a d,jal; kajewdla qwerty1m, a,smd бфыьвлцоул ы стьыьс жцьф вжфвф жф цвжлдфоцб ac kajw;\'aa klaewfkh,a d,jal; kajewdla</p>','2008-11-04 00:00:00'),
	(3,'Third news blin3','<p><strong>В asdf Российской</strong> Федерации признаются и гарантируются права и свободы человека и гражданина согласно общепризнанным принципам и нормам международного права и в соответствии с настоящей Конституцией.   2. Основные права и свободы человека неотчуждаемы и принадлежат каждому от рождения.   3. Осуществление прав и свобод человека и гражданина не должно нарушать права и свободы других лиц.   Статья 18   Права и свободы человека и гражданина являются непосредственно действующими. Они определяют <img hspace="4" height="100" width="150" vspace="4" border="1" align="middle" src="/app/webroot/img/upload_pic/0_210b7_97bf00a7_XL.jpeg" alt="" />смысл, содержание и применение законов, деятельность законодательной и исполнительной <img height="77" width="103" style="padding: 5px; float: left;" src="/app/webroot/img/upload_pic/0_2e51b_984b04aa_-1-XL(1).jpg" alt="" />власти, местного самоуправления и обеспечиваются правосудием.   Статья 19   1. Все равны перед законом и судом.   2. Государство гарантирует равенство прав и свобод человека и гражданина независимо от пола, расы, национальности, языка, происхождения, имущественного и должностного положения, места жительства, отношения к религии, убеждений, принадлежности к общественным объединениям, а также других обстоятельств. Запрещаются любые формы ограничения прав граждан по признакам социальной, расовой, национальной, языковой или религиозной принадлежности.   3. Мужчина и женщина имеют равные права и свободы и равные возможности для их реализации.   Статья 20   1. Каждый имеет право на жизнь.   2. Смертная казнь впредь до ее отмены может устанавливаться федеральным законом в качестве исключительной меры наказания за особо тяжкие преступления против жизни при предоставлении обвиняемому права на рассмотрение его дела судом с участием присяжных заседателей.   Статья 21   1. Достоинство личности охраняется государством. Ничто не может быть основанием для его умаления.   2. Никто не должен подвергаться пыткам, насилию, другому жестокому или унижающему человеческое достоинство обращению или наказанию. Никто не может быть без добровольного согласия подвергнут медицинским, научным или иным опытам.   Статья 22   1. Каждый имеет право на свободу и личную неприкосновенность.   2. Арест, заключение под стражу и содержание под стражей допускаются только по судебному решению. До судебного решения лицо не может быть подвергнуто задержанию на срок более 48 часов.   Статья 23</p>','2008-12-13 00:00:00'),
	(4,'forth news','Каждый имеет право на еприкос овенность частной жизни, личную и семейную тайну, защиту своей чести и доброго имени. Каждый имеет право на тайну переписки, телефонных переговоров, почтовых, телеграфных и иных сообщений. Ограничение этого права допускается только на основании судебного решения. \r\n\r\nСтатья 24 \r\n\r\n1. Сбор, хранение, использование и распространение информации о частной жизни лица без его согласия не допускаются. \r\n\r\n2. Органы государственной власти и органы местного самоуправления, их должностные лица обязаны обеспечить каждому возможность ознакомления с документами и материалами, непосредственно затрагивающими его права и свободы, если иное не предусмотрено законом. \r\n\r\nСтатья 25 \r\n\r\nЖилище неприкосновенно. Никто не вправе проникать в жилище против воли проживающих в нем лиц иначе как в случаях, установленных федеральным законом, или на основании судебного решения. \r\n\r\nСтатья 26 \r\n\r\n1. Каждый вправе определять и указывать свою национальную принадлежность. Никто не может быть принужден к определению и указанию своей национальной принадлежности. \r\n\r\n2. Каждый имеет право на пользование родным языком, на свободный выбор языка общения, воспитания, обучения и творчества. \r\n\r\nСтатья 27 \r\n\r\n1. Каждый, кто законно находится на территории Российской Федерации, имеет право свободно передвигаться, выбирать место пребывания и жительства. \r\n\r\n2. Каждый может свободно выезжать за пределы Российской Федерации. Гражданин Российской Федерации имеет право беспрепятственно возвращаться в Российскую Федерацию. \r\n\r\nСтатья 28 \r\n\r\nКаждому гарантируется свобода совести, свобода вероисповедания, включая право исповедовать индивидуально или совместно с другими любую религию или не исповедовать никакой, свободно выбирать, иметь и распространять религиозные и иные убеждения и действовать в соответствии с ними. \r\n\r\nСтатья 29 ','2008-12-05 00:00:00'),
	(5,'brand new news','<p><em>bla</em> bla<a href="http://mail.ru"> bla</a>&nbsp;<img src="http://localhost/horpol/js/fck/editor/images/smiley/msn/angry_smile.gif" alt="" /> &nbsp;&nbsp; KOttRdr &nbsp; fHHHHH sdfdsf <img src="http://localhost/horpol/js/fck/editor/images/smiley/msn/omg_smile.gif" alt="" /></p>','2009-03-24 00:00:00'),
	(7,'Акция на продукцию COSWICK !','<p><span class="newspage">При покупке 1м.кв продукции <u><strong><span lang="en-US">COSWICK</span></strong></u><span lang="en-US">  </span>Вы получайте в ПОДАРОК 1кг. 2-х компонентного полиуретанового клея! Посетив любой из наших магазинов , Вы можете убедиться в этом сами!</span></p>','2009-10-12 00:00:00'),
	(8,'Акция!!!!Спешите!!!Только до 15 октября!!!','<p><font face="Times New Roman, serif"><font size="3">Супер акция!!!Только до 15 октября!Самые низкие цены в Москве на <strong>ИРОКО, ВЕНГЕ, SIRARI, CURUPAU!</strong></font></font></p>\r\n<ol>\r\n    <ol>\r\n        <li>\r\n        <p style="margin-bottom: 0cm;"><span style="color: rgb(128, 0, 0);"><strong><span style="font-size: medium;"><span style="font-family: Times New Roman;"><span lang="en-US">SURYA</span></span></span></strong></span><strong><span style="font-size: medium;"><span style="font-family: Times New Roman;"> Ироко под лаком 20*170*600-2400 </span></span></strong></p>\r\n        </li>\r\n        <li>\r\n        <p style="margin-bottom: 0cm;"><strong><span style="font-size: medium;"><span style="font-family: Times New Roman;"><span lang="en-US">SURYA</span> Ироко под лаком 20*190*600-2400 </span></span></strong></p>\r\n        </li>\r\n        <li>\r\n        <p style="margin-bottom: 0cm;"><strong><span style="font-size: medium;"><span style="font-family: Times New Roman;"><span lang="en-US">SURYA</span> Венге под лаком 15*90*600-1200 </span></span></strong></p>\r\n        </li>\r\n        <li>\r\n        <p style="margin-bottom: 0cm;"><strong><span style="font-size: medium;"><span style="font-family: Times New Roman;"><span lang="en-US">SURYA</span> Венге под лаком 20*120*350-1800 </span></span></strong></p>\r\n        </li>\r\n        <li>\r\n        <p style="margin-bottom: 0cm;"><strong><span style="font-size: medium;"><span style="font-family: Times New Roman;"><span lang="en-US">INPA</span> <span lang="en-US">Sirari</span> под лаком 19.05*102*350-2150 </span></span></strong></p>\r\n        </li>\r\n        <li>\r\n        <p style="margin-bottom: 0cm;"><strong><span style="font-size: medium;"><span style="font-family: Times New Roman;"><span lang="en-US">INPA</span> <span lang="en-US">Sirari</span> под лаком 19.05*127*350-2150 </span></span></strong></p>\r\n        </li>\r\n        <li>\r\n        <p style="margin-bottom: 0cm;"><strong><span style="font-size: medium;"><span style="font-family: Times New Roman;"><span lang="en-US">INPA</span> <span lang="en-US">Curupau</span> под лаком 19.05*102*350-2150 </span></span></strong></p>\r\n        </li>\r\n        <li>\r\n        <p style="margin-bottom: 0cm;"><strong><span style="font-size: medium;"><span style="font-family: Times New Roman;"><span lang="en-US">INPA</span> <span lang="en-US">Curupau</span> под лаком 19.05*127*350-2150 </span></span></strong><strong><span style="font-size: medium;"><span style="font-family: Times New Roman;"><br />\r\n        </span></span></strong></p>\r\n        </li>\r\n    </ol>\r\n</ol>\r\n<p style="margin-bottom: 0cm; margin-left: 0.25cm;"><font face="Times New Roman, serif"><font size="3"><b><span style="display: none;" id="1253010152261S">&nbsp;</span><span style="display: none;" id="1253010153110S">&nbsp;</span></b>Более подробную информацию Вы можете узнать в любых из наших магазинов.(см.контакты)</font></font></p>','2009-09-29 00:00:00');
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
  `pos` int(11) default '0',
  `logo` text,
  `material` text,
  `content1` text,
  `price` float(9,2) unsigned default '0.00',
  `created` datetime default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `subcatid` (`subcategory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'products'
#

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS;*/
REPLACE INTO `products` (`id`, `subcategory_id`, `code`, `name`, `pos`, `logo`, `material`, `content1`, `price`, `created`) VALUES
	('111',84,NULL,'выпаыв',0,'0_240f3_fb66d23e_XL0.jpeg',NULL,NULL,'0','2009-10-08 18:30:50'),
	('29',58,NULL,'newBrand',NULL,'coastwatch1.jpg',NULL,NULL,'0','2008-12-11 00:49:51'),
	('6',19,NULL,'sdfw',NULL,'0_2b5e9_f7ae919c_XL0.jpeg',NULL,NULL,'0','2008-12-08 18:13:06'),
	('42',35,NULL,'nu333',NULL,'il76-11.jpg',NULL,NULL,'0','2008-12-11 18:12:33'),
	('24',61,NULL,'one test',NULL,'Boeing_777_22.jpg',NULL,NULL,'0','2008-12-10 21:22:55'),
	('15',36,NULL,'plane88',NULL,'0_10cda_91698fbb_XL0.jpeg',NULL,NULL,'0','2008-12-09 18:49:47'),
	('16',37,NULL,'plane',NULL,'il76-10.jpg',NULL,NULL,'0','2008-12-09 18:53:02'),
	('17',37,NULL,'plane8',NULL,'boeing_tanker-21.jpg',NULL,NULL,'0','2008-12-09 18:53:37'),
	('25',61,NULL,'one test4',NULL,'a380-21.jpg',NULL,NULL,'0','2008-12-10 21:23:14'),
	('26',19,NULL,'newone',NULL,'0_2e51b_984b04aa_-1-XL0.jpg',NULL,NULL,'0','2008-12-11 00:43:46'),
	('27',27,NULL,'dnewon',NULL,'9311910.jpg',NULL,NULL,'0','2008-12-11 00:46:57'),
	('30',56,NULL,'name15',NULL,'MAKS20050100.jpg',NULL,NULL,'0','2008-12-11 00:51:46'),
	('31',35,NULL,'planes16',NULL,'CRJ7001.jpg',NULL,NULL,'0','2008-12-11 00:53:09'),
	('32',36,NULL,'asdw2',NULL,'0_22e05_730912ac_-1-XL1.jpg',NULL,NULL,'0','2008-12-11 00:56:04'),
	('33',37,NULL,'blan2',NULL,'MAKS20050040.jpg',NULL,NULL,'0','2008-12-11 00:56:32'),
	('34',50,NULL,'wefw2e',NULL,'MAKS20050120.jpg',NULL,NULL,'0','2008-12-11 00:57:50'),
	('114',51,NULL,'aerfwe',0,'0_20418_7f9a58b2_XL0.jpg',NULL,NULL,'0','2009-10-09 12:56:05'),
	('36',55,NULL,'wefwe',NULL,'MAKS20050101.jpg',NULL,NULL,'0','2008-12-11 00:58:33'),
	('37',60,NULL,'adfc243',NULL,'MAKS20050080.jpg',NULL,NULL,'0','2008-12-11 00:59:58'),
	('110',59,NULL,'trt',0,'0_2b657_840130f0_XL2.jpg',NULL,NULL,'0','2009-10-05 22:02:43'),
	('39',61,NULL,'34t3gq',NULL,'CRJ7002.jpg',NULL,NULL,'0','2008-12-11 01:02:18'),
	('40',50,NULL,'ewr242',NULL,'MAKS20050230.jpg',NULL,NULL,'0','2008-12-11 01:05:25'),
	('48',19,NULL,'тщцц',NULL,'eads-11.jpg',NULL,NULL,'0','2008-12-12 21:07:36'),
	('43',66,NULL,'newo',NULL,'a380-30.jpg',NULL,NULL,'0','2008-12-11 21:29:19'),
	('45',66,NULL,'testGood',NULL,'2_Learjet85_LR0.jpg',NULL,NULL,'0','2008-12-12 12:48:17'),
	('47',58,NULL,'ngos',NULL,'crj_900_nextgen-10.jpg',NULL,NULL,'0','2008-12-12 16:20:25'),
	('49',69,NULL,'za013',NULL,'DSCN00390.JPG',NULL,NULL,'0','2008-12-13 14:59:51'),
	('50',70,NULL,'tovar01',NULL,'DSCN00360.JPG',NULL,NULL,'0','2008-12-13 15:05:49'),
	('53',20,NULL,'sdfwd',NULL,'0_2327d_c256f1e5_XL0.jpg',NULL,NULL,'0','2008-12-13 21:40:38'),
	('52',19,NULL,'wefweewf',NULL,'0_22aad_1f632c6_XL0.jpg',NULL,NULL,'0','2008-12-13 15:22:56'),
	('55',20,NULL,'fgre',NULL,'0_22aad_1f632c6_XL1.jpg',NULL,NULL,'0','2008-12-13 21:56:29'),
	('56',71,NULL,'testt',NULL,'3230-20.jpg',NULL,'','0','2009-03-22 14:49:16'),
	('57',72,NULL,'fuss',NULL,'0_6ca1_31a753d3_XL0.jpg',NULL,NULL,'0','2009-04-09 15:09:12'),
	('58',72,NULL,'sdf',NULL,'0_2724b_e379be85_XL0.jpg',NULL,NULL,'0','2009-04-09 15:09:21'),
	('62',20,NULL,'sdee',NULL,'0_27813_bbb9587d_XL1.jpg',NULL,NULL,'0','2009-04-11 13:22:08'),
	('65',73,NULL,'sdfg222',NULL,'0_2db9f_ffcb6ed9_XL0.jpg',NULL,NULL,'0','2009-09-04 18:54:09'),
	('66',74,NULL,'sdfg223',NULL,'0_2db9f_ffcb6ed9_XL1.jpg',NULL,NULL,'0','2009-09-07 13:28:51'),
	('91',19,NULL,'wert',0,'0_2aa81_9300807c_XL1.jpeg',NULL,NULL,'0','2009-10-02 19:09:25'),
	('68',36,NULL,'sd23',NULL,'0_2cd15_e929a89_XL0.jpeg',NULL,NULL,'0','2009-09-08 17:55:03'),
	('69',56,NULL,'dsf34',NULL,'0_2db9f_ffcb6ed9_XL2.jpg',NULL,NULL,'0','2009-09-10 12:39:09'),
	('70',74,NULL,'sdfg',NULL,'0_8dcc_e32301bb_orig0.jpeg',NULL,NULL,'0','2009-09-10 16:25:45'),
	('71',74,NULL,'name1',NULL,'0_77da_fa726095_XL1.jpg',NULL,NULL,'0','2009-09-10 16:27:47'),
	('90',19,NULL,'rtrtre',0,'0_22e05_730912ac_-1-XL0.jpg',NULL,NULL,'0','2009-10-02 19:08:33'),
	('73',19,NULL,'sdfg',0,'0_2c773_f156fc55_XL4.jpeg',NULL,NULL,'0','2009-10-02 14:28:44'),
	('74',19,NULL,'more',0,'0_2db9f_ffcb6ed9_XL14.jpg',NULL,NULL,'0','2009-10-02 14:28:56'),
	('75',19,NULL,'and',0,'0_2cd15_e929a89_XL3.jpeg',NULL,NULL,'0','2009-10-02 14:29:04'),
	('76',19,NULL,'sdfew',0,'0_29a43_cd9031a_XL0.jpeg',NULL,NULL,'0','2009-10-02 14:29:23'),
	('89',19,NULL,'sgfew',0,'0_2aa81_9300807c_XL0.jpeg',NULL,NULL,'0','2009-10-02 18:54:28'),
	('79',19,NULL,'sdfg',0,'0_2b657_840130f0_XL0.jpg',NULL,NULL,'0','2009-10-02 14:54:35'),
	('80',19,NULL,'rtyr',0,'0_2c773_f156fc55_XL5.jpeg',NULL,NULL,'0','2009-10-02 14:54:47'),
	('92',19,NULL,'fwerere',0,'0_22aad_1f632c6_XL2.jpg',NULL,NULL,'0','2009-10-02 19:17:52'),
	('93',19,NULL,'tew',0,'0_2327d_c256f1e5_XL1.jpg',NULL,NULL,'0','2009-10-02 19:18:45'),
	('94',19,NULL,'rt',0,'0_219e5_4785ef70_-2-XL0.jpg',NULL,NULL,'0','2009-10-02 19:19:48'),
	('96',19,NULL,'rsterwt',0,'0_23299_ae5a969a_XL0.jpg',NULL,NULL,'0','2009-10-02 19:20:59'),
	('97',19,NULL,'rt44',0,'0_2b657_840130f0_XL1.jpg',NULL,NULL,'0','2009-10-02 19:22:49'),
	('98',19,NULL,'wer',0,'0_884c_54be50d3_orig1.jpg',NULL,NULL,'0','2009-10-02 19:24:38'),
	('99',19,NULL,'ewre',0,'0_25768_3612b3c0_XL0.jpg',NULL,NULL,'0','2009-10-02 19:24:50'),
	('100',19,NULL,'frgr4',0,'0_19405_2e517443_XL0.jpeg',NULL,NULL,'0','2009-10-02 19:26:27'),
	('101',19,NULL,'sdfwe',0,'0_22e05_730912ac_-1-XL3.jpg',NULL,NULL,'0','2009-10-02 19:42:23'),
	('102',19,NULL,'fdsg rgrgr',0,'0_23299_ae5a969a_XL1.jpg',NULL,NULL,'0','2009-10-02 19:55:44'),
	('103',19,NULL,'ertr',0,'0_27f2e_ca52cef2_XL0.jpg',NULL,NULL,'0','2009-10-02 19:55:59'),
	('104',19,NULL,'dsfdee',0,'0_27cfe_2f84ca06_XL0.jpg',NULL,NULL,'0','2009-10-02 19:58:52'),
	('105',19,NULL,'lllll',0,'0_2b576_1f3f415_XL0.jpg',NULL,NULL,'0','2009-10-02 20:00:34'),
	('106',91,NULL,'sdf',0,'0_29c04_841883cf_XL0.jpg',NULL,NULL,'0','2009-10-05 21:59:52'),
	('107',91,NULL,'sdfe',0,'0_210b7_97bf00a7_XL0.jpeg',NULL,NULL,'0','2009-10-05 22:00:03'),
	('108',91,NULL,'sdfe',0,'0_228d5_e2156f70_XL0.jpg',NULL,NULL,'0','2009-10-05 22:00:15'),
	('109',91,NULL,'we4',0,'0_250cb_80ef3852_XL0.jpg',NULL,NULL,'0','2009-10-05 22:00:25'),
	('112',84,NULL,'ывпвц',0,'0_6e60_ca6f0102_XL0.jpg',NULL,NULL,'0','2009-10-08 18:31:00'),
	('113',84,NULL,'ывау',0,'0_31072_f3c79ea3_-4-XL0.jpeg',NULL,NULL,'0','2009-10-08 18:31:07'),
	('115',51,NULL,'dsfew',0,'0_2629e_c8cf7cb_-1-XL0.jpeg',NULL,NULL,'0','2009-10-09 12:56:14'),
	('116',51,NULL,'werew',0,'0_22aad_1f632c6_XL3.jpg',NULL,NULL,'0','2009-10-09 12:56:22');
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;



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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;



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

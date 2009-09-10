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
# Date/time:                    2009-09-10 20:44:18
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;



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
	('15','noovii',NULL,'0','2009-09-10 17:28:50','2009-09-10 17:28:50');
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
  `origin` varchar(250) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'brands'
#

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS;*/
REPLACE INTO `brands` (`id`, `name`, `url`, `logo`, `body`, `origin`, `created`, `modified`) VALUES
	('1','admonter','','Admonter01.jpg','<p><span style="background-color: Lime;">this is a boeing 777</span> just for test So, this is a boeing 777 <strike><u><em><strong>just for test this is a boeing</strong></em></u></strike> 777 just for test this is a boeing 777 just for test this is a boeing 777 just for test</p>','','2008-11-11 01:05:42','2009-09-09 15:30:41'),
	('2','alpenholz','','alpenholz00.jpg','<p>Hello</p>',NULL,'2008-11-11 15:04:35','2009-09-08 13:01:06'),
	('3','barkinek','asus','barliner00.jpg','<p>this is a boeing 777 just for test So, this is a boeing 777 just for test this is a boeing 777 just for test this is a boeing this is a boeing 777 just for test So, this is a boeing 777 just for test this is a boeing 777 just for test this is a boeing this is a boeing 777 just for test So, this is a boeing 777 just for test this is a boeing 777 just for test this is a boeing</p>',NULL,'2008-11-17 21:15:15','2009-09-07 19:38:15'),
	('4','a350','farm','bEFAG00.jpg','',NULL,'2008-11-20 12:54:04','2009-09-07 19:15:27'),
	('6','forbo','','FORBO00.jpg','','','2008-12-08 17:25:28','2009-09-08 13:56:46'),
	('8','for14',NULL,'ipowood00.jpg','',NULL,'2008-12-12 21:22:10','2009-09-07 19:18:47'),
	('9','dsfw',NULL,'karelia00.jpg','',NULL,'2008-12-12 21:23:35','2009-09-07 19:21:07'),
	('10','zayac',NULL,'karhrs00.jpg','Just zayac',NULL,'2008-12-13 14:55:41','2009-09-07 19:21:16'),
	('11','airket',NULL,'logo_ariket00.jpg','',NULL,'2009-09-07 14:49:47','2009-09-07 19:21:45');
/*!40000 ALTER TABLE `brands` ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'categories'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `categories` (
  `id` int(5) NOT NULL auto_increment,
  `type` int(10) NOT NULL default '1',
  `name` varchar(250) NOT NULL default '',
  `url` varchar(250) default NULL,
  `title` varchar(250) default NULL,
  `body` text,
  `slogan` text,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'categories'
#

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS;*/
REPLACE INTO `categories` (`id`, `type`, `name`, `url`, `title`, `body`, `slogan`, `created`, `modified`) VALUES
	(2,1,'Художественный паркет','','sadf3','<p><img alt="" src="/app/webroot/files/0_25ce0_6c8c77f3_orig.jpg" /><em><strong>More</strong></em> <em>text</em> g<u><em>oes</em></u> <strong><em>here</em></strong>. <strike>vot blin</strike></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>',' Здесь только лучшее от природы и производителей Каждая фабрика-яркая индивидуальность','2008-11-11 14:04:12','2009-09-07 14:57:17'),
	(3,1,'Массивная доска','','My title','<p><img height="137" width="200" src="/horpol/app/webroot/files/0_37dc0_a7483525_XL.jpg" alt="" />Nu hot что нибудь сюДА БЛИЙЙ&nbsp; <b><i>sdfgsdgf</i></b>&nbsp; <em><span style="font-size: x-large;"><span style="font-family: Arial;">sdfsdfsdf</span></span></em></p>\r\n<p><em><span style="font-size: x-large;"><span style="font-family: Arial;"><img height="40" width="40" alt="" src="/horpol/app/webroot/img/upload_pic/10407.jpg" /></span></span></em></p>\r\n<p><em><span style="font-size: x-large;"><span style="font-family: Arial;"><br />\r\n</span></span></em></p>',NULL,'2008-11-11 14:27:11','2009-04-09 14:25:25'),
	(4,1,'Паркетная доска','',NULL,'<h1>I <em><strike><u><span style="font-family: Arial;"><b>suda</b></span></u></strike></em><b> </b><i>chto</i> n<span style="font-family: Comic Sans MS;">ibud df</span></h1>\r\n<p><span style="font-family: Comic Sans MS;"><span style="font-size: smaller;">sdfg</span></span></p>\r\n<p><span style="font-family: Comic Sans MS;"><span style="font-size: smaller;"><img height="40" width="40" src="/horpol/app/webroot/img/upload_pic/10407(1).jpg" alt="" /></span></span></p>\r\n<p><span style="font-family: Comic Sans MS;"><span style="font-size: smaller;"><img height="132" width="200" src="/horpol/app/webroot/img/upload_pic/0_5bbd_8529a79a_orig.jpg" alt="" /></span></span></p>\r\n<p>&nbsp;</p>',NULL,'2008-11-11 14:32:28','2009-03-23 14:31:35'),
	(5,1,'Штучный паркет','','sdf','',NULL,'2008-11-11 14:33:02','2009-04-09 15:00:49'),
	(6,1,'Изделия на заказ','',NULL,NULL,NULL,'2008-12-04 19:31:16','2008-12-04 19:31:16'),
	(7,1,'Ламинат',NULL,NULL,NULL,NULL,'2008-12-13 14:49:45','2008-12-13 21:20:44'),
	(8,1,'Пробковые покрытия',NULL,NULL,'',NULL,'2008-12-16 12:21:13','2008-12-16 12:21:13'),
	(9,1,'Плинтусы, клеи, лаки,<br /> масла',NULL,NULL,'',NULL,'2008-12-16 12:21:38','2008-12-16 13:11:01'),
	(10,1,'Терассная доска',NULL,NULL,'',NULL,'2008-12-16 12:22:22','2008-12-16 12:22:22'),
	(11,1,'Плитка, керамогранит',NULL,NULL,'',NULL,'2008-12-16 12:22:34','2008-12-16 12:22:34'),
	(12,1,'Структурные обои',NULL,NULL,'',NULL,'2008-12-16 12:22:46','2008-12-16 12:22:46'),
	(14,3,'newtest',NULL,'asdfeeee','<h4>You <b>are</b> using FCKeditor.</h4>',NULL,'2009-03-22 14:47:57','2009-04-09 15:03:41'),
	(15,3,'New test',NULL,'ddd','<p>HI <a href="http://mail.ru">guys</a></p>',NULL,'2009-03-23 12:51:40','2009-04-09 14:19:04'),
	(17,2,'newCase2',NULL,'newCase2','',NULL,'2009-04-09 15:07:37','2009-04-09 15:07:37'),
	(18,2,'new00',NULL,'sdf','',NULL,'2009-09-04 18:52:27','2009-09-04 18:52:27'),
	(20,3,'new00',NULL,'','','','2009-09-04 19:45:25','2009-09-04 19:45:25'),
	(21,3,'new00',NULL,'','','','2009-09-04 19:46:00','2009-09-04 19:46:00'),
	(23,2,'nnew01',NULL,'','','Здесь только лучшее от природы и производителей. Каждая фабрика-яркая индивидуальность','2009-09-04 20:24:08','2009-09-04 20:24:08');
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
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;



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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;



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
	(5,'brand new news','<p><em>bla</em> bla<a href="http://mail.ru"> bla</a>&nbsp;<img src="http://localhost/horpol/js/fck/editor/images/smiley/msn/angry_smile.gif" alt="" /> &nbsp;&nbsp; KOttRdr &nbsp; fHHHHH sdfdsf <img src="http://localhost/horpol/js/fck/editor/images/smiley/msn/omg_smile.gif" alt="" /></p>','2009-03-24 00:00:00');
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
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'products'
#

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS;*/
REPLACE INTO `products` (`id`, `subcategory_id`, `code`, `name`, `url`, `logo`, `material`, `size`, `content1`, `price`, `created`) VALUES
	('22',35,NULL,'my good',NULL,'china-21.jpg',NULL,NULL,NULL,'0','2008-12-10 21:21:21'),
	('29',58,NULL,'newBrand',NULL,'coastwatch1.jpg',NULL,NULL,NULL,'0','2008-12-11 00:49:51'),
	('28',20,NULL,'blaOne31',NULL,'0_a400_8b53caef_XL0.jpg',NULL,NULL,NULL,'0','2008-12-11 00:48:29'),
	('6',19,NULL,'sdfw',NULL,'0_2b5e9_f7ae919c_XL0.jpeg',NULL,NULL,NULL,'0','2008-12-08 18:13:06'),
	('42',35,NULL,'nu333',NULL,'il76-11.jpg',NULL,NULL,NULL,'0','2008-12-11 18:12:33'),
	('24',61,NULL,'one test',NULL,'Boeing_777_22.jpg',NULL,NULL,NULL,'0','2008-12-10 21:22:55'),
	('23',35,NULL,'my good2',NULL,'Boeing_787_30.jpg',NULL,NULL,NULL,'0','2008-12-10 21:22:01'),
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
	('48',19,NULL,'тщцц',NULL,'eads-11.jpg',NULL,NULL,NULL,'0','2008-12-12 21:07:36'),
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
	('71',74,NULL,'dfg',NULL,'0_2e006_bb6f866b_XL0.jpeg',NULL,NULL,NULL,'0','2009-09-10 16:27:47');
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
  PRIMARY KEY  (`id`),
  KEY `catbrand` (`category_id`,`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'sub_categories'
#

LOCK TABLES `sub_categories` WRITE;
/*!40000 ALTER TABLE `sub_categories` DISABLE KEYS;*/
REPLACE INTO `sub_categories` (`id`, `category_id`, `brand_id`, `active`, `name`, `url`, `images`, `product_count`, `created`, `modified`) VALUES
	(19,'2','1',1,'sdfdd','dsdfg',NULL,'5','2008-11-19 15:04:19','2008-11-19 15:04:19'),
	(20,'2','3',1,'ZaTe','sdfwew',NULL,'12','2008-11-19 16:30:22','2009-04-11 13:18:02'),
	(27,'2','2',1,'d','sdsdfe',NULL,'1','2008-11-19 18:51:33','2008-11-19 18:51:33'),
	(35,'4','4',1,'planes1','',NULL,'4','2008-12-09 12:40:37','2008-12-09 18:47:26'),
	(36,'2','6',1,'planes2','',NULL,'3','2008-12-09 18:47:15','2008-12-11 00:54:12'),
	(37,'2','6',1,'palanes3','',NULL,'3','2008-12-09 18:51:46','2008-12-09 18:51:46'),
	(50,'6','3',1,'name22',NULL,NULL,'2','2008-12-10 19:44:57','2008-12-10 20:51:00'),
	(51,'6','3',1,'name101',NULL,NULL,'1','2008-12-10 19:45:13','2008-12-11 00:54:47'),
	(55,'6','3',1,'name2',NULL,NULL,'1','2008-12-10 19:49:03','2008-12-10 19:49:03'),
	(56,'3','2',1,'name',NULL,NULL,'2','2008-12-10 19:49:20','2008-12-10 19:49:20'),
	(58,'3','1',1,'brandNew',NULL,NULL,'2','2008-12-10 20:26:19','2008-12-10 20:26:19'),
	(59,'6','1',1,'ForOrder','',NULL,'1','2008-12-10 20:30:57','2008-12-10 20:35:17'),
	(60,'2','2',1,'name4',NULL,NULL,'1','2008-12-10 20:38:26','2008-12-10 20:38:26'),
	(61,'4','4',1,'a350next',NULL,NULL,'3','2008-12-10 21:22:18','2008-12-10 21:22:18'),
	(62,'2','6',1,'newOfToday',NULL,NULL,NULL,'2008-12-11 17:39:23','2008-12-11 17:39:23'),
	(64,'6','3',1,'naw8',NULL,NULL,NULL,'2008-12-11 19:20:06','2008-12-11 19:20:06'),
	(66,'5','3',1,'NewOne',NULL,NULL,'2','2008-12-11 20:41:18','2008-12-11 20:41:18'),
	(67,'2','2',1,'nwenn',NULL,NULL,NULL,'2008-12-12 13:04:41','2008-12-12 13:04:41'),
	(68,'5','9',1,'vau',NULL,NULL,NULL,'2008-12-12 21:24:02','2008-12-12 21:24:02'),
	(69,'7','10',1,'podrazdel',NULL,NULL,'1','2008-12-13 14:57:29','2008-12-13 14:57:29'),
	(70,'7','10',1,'podrazdel2',NULL,NULL,'1','2008-12-13 15:03:02','2008-12-13 15:03:02'),
	(71,'14','1',1,'newtt',NULL,NULL,'1','2009-03-22 14:48:48','2009-03-22 14:48:48'),
	(72,'17','1',1,'case2',NULL,NULL,'2','2009-04-09 15:08:52','2009-04-09 15:08:52'),
	(73,'18','2',1,'Upps',NULL,NULL,'1','2009-09-04 18:53:24','2009-09-04 18:53:24'),
	(74,'3','2',1,'name2',NULL,NULL,'3','2009-09-07 13:28:35','2009-09-07 13:28:35');
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

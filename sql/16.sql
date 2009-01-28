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

/*!40100 SET CHARACTER SET cp1251*/;


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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'albums'
#

/*!40000 ALTER TABLE `albums` DISABLE KEYS*/;
LOCK TABLES `albums` WRITE;
REPLACE INTO `albums` (`id`, `name`, `image`, `image_count`, `created`, `modified`) VALUES ('1','first5','default.jpg',3,'2008-11-10 12:21:42','2008-12-15 21:20:13'),
	('2','second22','DSC051570.JPG',6,'2008-11-10 00:00:00','2008-12-15 19:25:57'),
	('3','third3','51Gb1EQtjXL._SL110_0.jpg',5,'2008-11-10 00:00:00','2008-12-15 19:24:36'),
	('6','Novi',NULL,2,'2008-12-15 19:27:28','2008-12-15 19:27:28'),
	('7','OneMore1',NULL,5,'2008-12-15 19:28:09','2008-12-15 20:38:48'),
	('8','Newww435',NULL,2,'2008-12-15 20:11:16','2008-12-15 21:26:58');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'brands'
#

/*!40000 ALTER TABLE `brands` DISABLE KEYS*/;
LOCK TABLES `brands` WRITE;
REPLACE INTO `brands` (`id`, `name`, `url`, `logo`, `body`, `created`, `modified`) VALUES ('1','b777','','Boeing_777_21.jpg','this is a boeing 777 just for test So, this is a boeing 777 just for test this is a boeing 777 just for test this is a boeing 777 just for test this is a boeing 777 just for test','2008-11-11 01:05:42','2008-12-13 02:10:29'),
	('2','a380','','09430350.jpg',NULL,'2008-11-11 15:04:35','2008-12-09 20:21:20'),
	('3','A320','asus','30.jpg','this is a boeing 777 just for test So, this is a boeing 777 just for test this is a boeing 777 just for test this is a boeing this is a boeing 777 just for test So, this is a boeing 777 just for test this is a boeing 777 just for test this is a boeing this is a boeing 777 just for test So, this is a boeing 777 just for test this is a boeing 777 just for test this is a boeing','2008-11-17 21:15:15','2008-12-13 02:15:10'),
	('4','a350','farm','a350-21.jpg',NULL,'2008-11-20 12:54:04','2008-12-09 20:20:56'),
	('6','a400','','embraer-10.jpg',NULL,'2008-12-08 17:25:28','2008-12-12 20:53:27'),
	('8','for14',NULL,'11151.02_a0.JPG',NULL,'2008-12-12 21:22:10','2008-12-13 01:10:47'),
	('9','dsfw',NULL,'DSCN07080.JPG',NULL,'2008-12-12 21:23:35','2008-12-12 21:23:35'),
	('10','zayac',NULL,'20.jpg','Just zayac','2008-12-13 14:55:41','2008-12-13 14:55:41');
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
REPLACE INTO `categories` (`id`, `active`, `name`, `url`, `body`, `created`, `modified`) VALUES (2,1,'Художественный паркет','','Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test TestTest Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test TestTest Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test','2008-11-11 14:04:12','2008-12-13 21:34:37'),
	(3,1,'Массивная доска','',NULL,'2008-11-11 14:27:11','2008-11-11 14:27:11'),
	(4,1,'Паркетная доска','',NULL,'2008-11-11 14:32:28','2008-11-11 14:32:28'),
	(5,1,'Штучный паркет','',NULL,'2008-11-11 14:33:02','2008-11-11 14:33:02'),
	(6,1,'Изделия на заказ','',NULL,'2008-12-04 19:31:16','2008-12-04 19:31:16'),
	(7,1,'Ламинат',NULL,NULL,'2008-12-13 14:49:45','2008-12-13 21:20:44'),
	(8,1,'Пробковые покрытия',NULL,'','2008-12-16 12:21:13','2008-12-16 12:21:13'),
	(9,1,'Плинтусы, клеи, лаки,<br /> масла',NULL,'','2008-12-16 12:21:38','2008-12-16 13:11:01'),
	(10,1,'Терассная доска',NULL,'','2008-12-16 12:22:22','2008-12-16 12:22:22'),
	(11,1,'Плитка, керамогранит',NULL,'','2008-12-16 12:22:34','2008-12-16 12:22:34'),
	(12,1,'Структурные обои',NULL,'','2008-12-16 12:22:46','2008-12-16 12:22:46');
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
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'images'
#

/*!40000 ALTER TABLE `images` DISABLE KEYS*/;
LOCK TABLES `images` WRITE;
REPLACE INTO `images` (`id`, `album_id`, `name`, `image`, `created`, `modified`) VALUES ('2',NULL,'d','php0.gif','2008-11-10 19:45:52','2008-11-10 19:45:52'),
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
	('84','3','rwetr11','2340.jpg','2008-12-15 21:26:24','2008-12-15 21:26:24');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'news'
#

/*!40000 ALTER TABLE `news` DISABLE KEYS*/;
LOCK TABLES `news` WRITE;
REPLACE INTO `news` (`id`, `name`, `body`, `created`) VALUES (1,'Новые цены на паркетную доску и ламинат ','QWERTY qwerty1m, a,smd бфыьвлцоул ы стьыьс жцьф вжфвф жф цвжлдфоцб ac kajw;''aa klaewfkh,a d,jal; kajewdla  qwerty1m, a,smd бфыьвлцоул ы стьыьс жцьф вжфвф жф цвжлдфоцб ac kajw;''aa klaewfkh,a d,jal; kajewdla qwerty1m, a,smd бфыьвлцоул ы стьыьс жцьф вжфвф жф цвжлдфоцб ac kajw;''aa klaewfkh,a d,jal; kajewdla qwerty1m, a,smd бфыьвлцоул ы стьыьс жцьф вжфвф жф цвжлдфоцб ac kajw;''aa klaewfkh,a d,jal; kajewdla qwerty1m, a,smd бфыьвлцоул ы стьыьс жцьф вжфвф жф цвжлдфоцб ac kajw;''aa klaewfkh,a d,jal; kajewdla qwerty1m, a,smd бфыьвлцоул ы стьыьс жцьф вжфвф жф цвжлдфоцб ac kajw;''aa klaewfkh,a d,jal; kajewdla qwerty1m, a,smd бфыьвлцоул ы стьыьс жцьф вжфвф жф цвжлдфоцб ac kajw;''aa klaewfkh,a d,jal; kajewdla ','2008-12-04 00:00:00'),
	(2,'second blin','qwerty2 asd,m.,amsd asm,d., a.,sm .a,smda .a,smd .,ams., mnas,.md,.a m бьфжыв бьфыв бфыьвюбжьфывбюьбюфвы','2008-12-03 00:00:00'),
	(3,'Third news blin3',' В asdf Российской Федерации признаются и гарантируются права и свободы человека и гражданина согласно общепризнанным принципам и нормам международного права и в соответствии с настоящей Конституцией. \r\n\r\n2. Основные права и свободы человека неотчуждаемы и принадлежат каждому от рождения. \r\n\r\n3. Осуществление прав и свобод человека и гражданина не должно нарушать права и свободы других лиц. \r\n\r\nСтатья 18 \r\n\r\nПрава и свободы человека и гражданина являются непосредственно действующими. Они определяют смысл, содержание и применение законов, деятельность законодательной и исполнительной власти, местного самоуправления и обеспечиваются правосудием. \r\n\r\nСтатья 19 \r\n\r\n1. Все равны перед законом и судом. \r\n\r\n2. Государство гарантирует равенство прав и свобод человека и гражданина независимо от пола, расы, национальности, языка, происхождения, имущественного и должностного положения, места жительства, отношения к религии, убеждений, принадлежности к общественным объединениям, а также других обстоятельств. Запрещаются любые формы ограничения прав граждан по признакам социальной, расовой, национальной, языковой или религиозной принадлежности. \r\n\r\n3. Мужчина и женщина имеют равные права и свободы и равные возможности для их реализации. \r\n\r\nСтатья 20 \r\n\r\n1. Каждый имеет право на жизнь. \r\n\r\n2. Смертная казнь впредь до ее отмены может устанавливаться федеральным законом в качестве исключительной меры наказания за особо тяжкие преступления против жизни при предоставлении обвиняемому права на рассмотрение его дела судом с участием присяжных заседателей. \r\n\r\nСтатья 21 \r\n\r\n1. Достоинство личности охраняется государством. Ничто не может быть основанием для его умаления. \r\n\r\n2. Никто не должен подвергаться пыткам, насилию, другому жестокому или унижающему человеческое достоинство обращению или наказанию. Никто не может быть без добровольного согласия подвергнут медицинским, научным или иным опытам. \r\n\r\nСтатья 22 \r\n\r\n1. Каждый имеет право на свободу и личную неприкосновенность. \r\n\r\n2. Арест, заключение под стражу и содержание под стражей допускаются только по судебному решению. До судебного решения лицо не может быть подвергнуто задержанию на срок более 48 часов. \r\n\r\nСтатья 23 ','2008-12-13 00:00:00'),
	(4,'forth news','Каждый имеет право на еприкос овенность частной жизни, личную и семейную тайну, защиту своей чести и доброго имени. Каждый имеет право на тайну переписки, телефонных переговоров, почтовых, телеграфных и иных сообщений. Ограничение этого права допускается только на основании судебного решения. \r\n\r\nСтатья 24 \r\n\r\n1. Сбор, хранение, использование и распространение информации о частной жизни лица без его согласия не допускаются. \r\n\r\n2. Органы государственной власти и органы местного самоуправления, их должностные лица обязаны обеспечить каждому возможность ознакомления с документами и материалами, непосредственно затрагивающими его права и свободы, если иное не предусмотрено законом. \r\n\r\nСтатья 25 \r\n\r\nЖилище неприкосновенно. Никто не вправе проникать в жилище против воли проживающих в нем лиц иначе как в случаях, установленных федеральным законом, или на основании судебного решения. \r\n\r\nСтатья 26 \r\n\r\n1. Каждый вправе определять и указывать свою национальную принадлежность. Никто не может быть принужден к определению и указанию своей национальной принадлежности. \r\n\r\n2. Каждый имеет право на пользование родным языком, на свободный выбор языка общения, воспитания, обучения и творчества. \r\n\r\nСтатья 27 \r\n\r\n1. Каждый, кто законно находится на территории Российской Федерации, имеет право свободно передвигаться, выбирать место пребывания и жительства. \r\n\r\n2. Каждый может свободно выезжать за пределы Российской Федерации. Гражданин Российской Федерации имеет право беспрепятственно возвращаться в Российскую Федерацию. \r\n\r\nСтатья 28 \r\n\r\nКаждому гарантируется свобода совести, свобода вероисповедания, включая право исповедовать индивидуально или совместно с другими любую религию или не исповедовать никакой, свободно выбирать, иметь и распространять религиозные и иные убеждения и действовать в соответствии с ними. \r\n\r\nСтатья 29 ','2008-12-05 00:00:00');
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
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'products'
#

/*!40000 ALTER TABLE `products` DISABLE KEYS*/;
LOCK TABLES `products` WRITE;
REPLACE INTO `products` (`id`, `subcategory_id`, `code`, `name`, `url`, `logo`, `material`, `size`, `content1`, `price`, `created`) VALUES ('22',35,NULL,'my good',NULL,'china-21.jpg',NULL,NULL,NULL,'0','2008-12-10 21:21:21'),
	('29',58,NULL,'newBrand',NULL,'coastwatch1.jpg',NULL,NULL,NULL,'0','2008-12-11 00:49:51'),
	('28',20,NULL,'blaOne',NULL,'CRJ7000.jpg',NULL,NULL,NULL,'0','2008-12-11 00:48:29'),
	('6',19,NULL,'sdfw',NULL,'P10507080.JPG',NULL,NULL,NULL,'0','2008-12-08 18:13:06'),
	('42',35,NULL,'nu',NULL,'il76-11.jpg',NULL,NULL,NULL,'0','2008-12-11 18:12:33'),
	('24',61,NULL,'one test',NULL,'Boeing_777_22.jpg',NULL,NULL,NULL,'0','2008-12-10 21:22:55'),
	('23',35,NULL,'my good2',NULL,'Boeing_787_30.jpg',NULL,NULL,NULL,'0','2008-12-10 21:22:01'),
	('15',36,NULL,'plane88',NULL,'a400m-30.jpg',NULL,NULL,NULL,'0','2008-12-09 18:49:47'),
	('16',37,NULL,'plane',NULL,'il76-10.jpg',NULL,NULL,NULL,'0','2008-12-09 18:53:02'),
	('17',37,NULL,'plane8',NULL,'boeing_tanker-21.jpg',NULL,NULL,NULL,'0','2008-12-09 18:53:37'),
	('19',20,NULL,'More a3205',NULL,'a380-22.jpg',NULL,NULL,NULL,'0','2008-12-09 20:23:38'),
	('25',61,NULL,'one test4',NULL,'a380-21.jpg',NULL,NULL,NULL,'0','2008-12-10 21:23:14'),
	('26',19,NULL,'newone',NULL,'MAKS20050270.jpg',NULL,NULL,NULL,'0','2008-12-11 00:43:46'),
	('27',27,NULL,'dnewon',NULL,'9311910.jpg',NULL,NULL,NULL,'0','2008-12-11 00:46:57'),
	('30',56,NULL,'name15',NULL,'MAKS20050100.jpg',NULL,NULL,NULL,'0','2008-12-11 00:51:46'),
	('31',35,NULL,'planes11',NULL,'CRJ7001.jpg',NULL,NULL,NULL,'0','2008-12-11 00:53:09'),
	('32',36,NULL,'asdw2',NULL,'9311911.jpg',NULL,NULL,NULL,'0','2008-12-11 00:56:04'),
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
	('44',20,NULL,'testы',NULL,'a400m-10.jpg',NULL,NULL,NULL,'0','2008-12-11 21:55:09'),
	('45',66,NULL,'testGood',NULL,'2_Learjet85_LR0.jpg',NULL,NULL,NULL,'0','2008-12-12 12:48:17'),
	('47',58,NULL,'ngos',NULL,'crj_900_nextgen-10.jpg',NULL,NULL,NULL,'0','2008-12-12 16:20:25'),
	('49',69,NULL,'za013',NULL,'DSCN00390.JPG',NULL,NULL,NULL,'0','2008-12-13 14:59:51'),
	('50',70,NULL,'tovar01',NULL,'DSCN00360.JPG',NULL,NULL,NULL,'0','2008-12-13 15:05:49'),
	('53',20,NULL,'sdfwd',NULL,'IMG_01010.JPG',NULL,NULL,NULL,'0','2008-12-13 21:40:38'),
	('52',19,NULL,'wefweewf',NULL,'DSCN00330.JPG',NULL,NULL,NULL,'0','2008-12-13 15:22:56'),
	('54',20,NULL,'sdfwee26',NULL,'IMG_01570.JPG',NULL,NULL,NULL,'0','2008-12-13 21:51:26'),
	('55',20,NULL,'fgre',NULL,'IMG_01960.JPG',NULL,NULL,NULL,'0','2008-12-13 21:56:29');
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
  `images` text,
  `product_count` int(11) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'sub_categories'
#

/*!40000 ALTER TABLE `sub_categories` DISABLE KEYS*/;
LOCK TABLES `sub_categories` WRITE;
REPLACE INTO `sub_categories` (`id`, `category_id`, `brand_id`, `active`, `name`, `url`, `images`, `product_count`, `created`, `modified`) VALUES (19,'2','1',1,'sdfdd','dsdfg',NULL,'4','2008-11-19 15:04:19','2008-11-19 15:04:19'),
	(20,'2','3',1,'sdfsd','sdfwew',NULL,'6','2008-11-19 16:30:22','2008-11-19 16:30:22'),
	(27,'2','2',1,'d','sdsdfe',NULL,'1','2008-11-19 18:51:33','2008-11-19 18:51:33'),
	(35,'4','4',1,'planes1','',NULL,'4','2008-12-09 12:40:37','2008-12-09 18:47:26'),
	(36,'2','6',1,'planes2','',NULL,'2','2008-12-09 18:47:15','2008-12-11 00:54:12'),
	(37,'2','6',1,'palanes3','',NULL,'3','2008-12-09 18:51:46','2008-12-09 18:51:46'),
	(50,'6','3',1,'name22',NULL,NULL,'2','2008-12-10 19:44:57','2008-12-10 20:51:00'),
	(51,'6','3',1,'name101',NULL,NULL,'1','2008-12-10 19:45:13','2008-12-11 00:54:47'),
	(55,'6','3',1,'name2',NULL,NULL,'1','2008-12-10 19:49:03','2008-12-10 19:49:03'),
	(56,'3','2',1,'name',NULL,NULL,'1','2008-12-10 19:49:20','2008-12-10 19:49:20'),
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
	(70,'7','10',1,'podrazdel2',NULL,NULL,'1','2008-12-13 15:03:02','2008-12-13 15:03:02');
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

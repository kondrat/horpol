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
# Date/time:                    2009-10-05 22:07:02
# --------------------------------------------------------

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;*/


#
# Database structure for database 'horpol'
#

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `horpol` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `horpol`;


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
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;*/

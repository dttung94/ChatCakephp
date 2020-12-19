/*
SQLyog Ultimate v8.71 
MySQL - 5.7-log : Database - chatsystem
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`training` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `training`;

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `tfeeds`;

CREATE TABLE `tfeeds` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `message` text,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL,
  `image_file` varchar(255) DEFAULT NULL,
  `type` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;



/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `users` */



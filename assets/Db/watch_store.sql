/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.5.8-log : Database - watch_store
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`watch_store` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `watch_store`;

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `cart_id` int(100) NOT NULL AUTO_INCREMENT,
  `pid` varchar(100) DEFAULT NULL,
  `cid` varchar(100) DEFAULT NULL,
  `uid` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'N/A',
  `quantity` varchar(100) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `cart` */

insert  into `cart`(`cart_id`,`pid`,`cid`,`uid`,`price`,`status`,`quantity`) values (12,'4','3','1','1399','Purchased','1');

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `c_id` int(100) NOT NULL AUTO_INCREMENT,
  `cname` varchar(100) DEFAULT NULL,
  `cimage` varchar(100) DEFAULT NULL,
  `cdetails` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`c_id`,`cname`,`cimage`,`cdetails`) values (2,'Smart Watches','samt watch.webp','stylish and stay connected with the latest generation of smart watches'),(3,'Digital Watch','pngaaa.com-420051.png',' digital watches have become a popular choice for many');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `l_id` int(100) NOT NULL AUTO_INCREMENT,
  `rid` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`l_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`l_id`,`rid`,`email`,`password`,`type`,`status`) values (0,'0','admin@gmail.com','admin','ADMIN',NULL),(1,'1','vineethvasanth1812@gmail.com','Vineeth@12','USER',NULL),(2,'1','timezone@gmail.com','Timezone','SERVICE CENTRE',NULL),(4,'2','rolex@gmail.com','Rolex@12','SERVICE CENTRE',NULL),(5,'2','joyel@gmail.com','Joyel@12','USER',NULL);

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `pay_id` int(100) NOT NULL AUTO_INCREMENT,
  `uid` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `payment` */

insert  into `payment`(`pay_id`,`uid`,`amount`,`date`,`time`) values (5,'1','1399','30 Sep 2023','09:44 AM');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `pid` int(100) NOT NULL AUTO_INCREMENT,
  `cid` varchar(100) DEFAULT NULL,
  `pname` varchar(100) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `pimage` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `products` */

insert  into `products`(`pid`,`cid`,`pname`,`brand`,`price`,`pimage`) values (1,'2','Noice ColorFit','Noice ','5000','pngaaa.com-5597036.png'),(3,'2','CMF Watch Pro','Nothing ','5000','watch.png'),(4,'3','Digital Watch','G-shock ','1399','pngaaa.com-1321006.png');

/*Table structure for table `service_booking` */

DROP TABLE IF EXISTS `service_booking`;

CREATE TABLE `service_booking` (
  `sb_id` int(100) NOT NULL AUTO_INCREMENT,
  `sc_id` varchar(100) DEFAULT NULL,
  `uid` varchar(100) DEFAULT NULL,
  `service_id` varchar(100) DEFAULT NULL,
  `serviceType` varchar(100) DEFAULT NULL,
  `desc` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `payment` varchar(100) DEFAULT NULL,
  `sprice` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`sb_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `service_booking` */

insert  into `service_booking`(`sb_id`,`sc_id`,`uid`,`service_id`,`serviceType`,`desc`,`status`,`payment`,`sprice`) values (1,'1','1','2','Cleaning and Lubrication','watch cleaning','Payment & Service Completed','Paid','3000');

/*Table structure for table `service_centre` */

DROP TABLE IF EXISTS `service_centre`;

CREATE TABLE `service_centre` (
  `s_id` int(100) NOT NULL AUTO_INCREMENT,
  `sname` varchar(100) DEFAULT NULL,
  `semail` varchar(100) DEFAULT NULL,
  `sphone` varchar(100) DEFAULT NULL,
  `simage` varchar(100) DEFAULT NULL,
  `saddress` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `service_centre` */

insert  into `service_centre`(`s_id`,`sname`,`semail`,`sphone`,`simage`,`saddress`) values (1,'Timezone','timezone@gmail.com','8797984789','smartwatch.png','Kaloor ,Ernakulam'),(2,'Rolex ','rolex@gmail.com','9873986749','rolex1.png','Kadavanthara, Ernakulam Kerala');

/*Table structure for table `services` */

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `service_id` int(100) NOT NULL AUTO_INCREMENT,
  `sid` varchar(100) DEFAULT NULL,
  `wbrand` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `ssimage` varchar(100) DEFAULT NULL,
  `service` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `services` */

insert  into `services`(`service_id`,`sid`,`wbrand`,`model`,`ssimage`,`service`) values (2,'1','Analog Watchs','Rolex','analog.jpg','Battery Replacement'),(3,'1','All Watches','Not Prefered','smart-watch (1).png','Repairs');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `uid` int(100) NOT NULL AUTO_INCREMENT,
  `uname` varchar(100) DEFAULT NULL,
  `uemail` varchar(100) DEFAULT NULL,
  `uphone` varchar(100) DEFAULT NULL,
  `uimage` varchar(100) DEFAULT NULL,
  `uaddress` varchar(100) DEFAULT NULL,
  `cart_amt` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`uid`,`uname`,`uemail`,`uphone`,`uimage`,`uaddress`,`cart_amt`) values (1,'Vineeth','vineethvasanth1812@gmail.com','7907983487','new.png','Karadi Kuzhy',NULL),(2,'Joyel','joyel@gmail.com','8978978947','dfvgb_ktp39cT.gif','Erumeli, Kottayam',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

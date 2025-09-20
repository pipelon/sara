/*
SQLyog Community v8.71 
MySQL - 8.0.31 : Database - sara
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `auth_assignment` */

DROP TABLE IF EXISTS `auth_assignment`;

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` int DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

/*Data for the table `auth_assignment` */

insert  into `auth_assignment`(`item_name`,`user_id`,`created_at`) values ('Cliente','2',1756851775),('SuperAdministrador','1',1754683061);

/*Table structure for table `auth_item` */

DROP TABLE IF EXISTS `auth_item`;

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `type` smallint NOT NULL,
  `description` text COLLATE utf8mb3_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

/*Data for the table `auth_item` */

insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('/*',2,NULL,NULL,NULL,1754682809,1754682809),('/admin/*',2,NULL,NULL,NULL,1754682806,1754682806),('/admin/assignment/*',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/assignment/assign',2,NULL,NULL,NULL,1754682800,1754682800),('/admin/assignment/index',2,NULL,NULL,NULL,1754682800,1754682800),('/admin/assignment/revoke',2,NULL,NULL,NULL,1754682800,1754682800),('/admin/assignment/view',2,NULL,NULL,NULL,1754682800,1754682800),('/admin/default/*',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/default/index',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/menu/*',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/menu/create',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/menu/delete',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/menu/index',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/menu/update',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/menu/view',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/permission/*',2,NULL,NULL,NULL,1754682802,1754682802),('/admin/permission/assign',2,NULL,NULL,NULL,1754682802,1754682802),('/admin/permission/create',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/permission/delete',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/permission/get-users',2,NULL,NULL,NULL,1754682802,1754682802),('/admin/permission/index',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/permission/remove',2,NULL,NULL,NULL,1754682802,1754682802),('/admin/permission/update',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/permission/view',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/role/*',2,NULL,NULL,NULL,1754682803,1754682803),('/admin/role/assign',2,NULL,NULL,NULL,1754682802,1754682802),('/admin/role/create',2,NULL,NULL,NULL,1754682802,1754682802),('/admin/role/delete',2,NULL,NULL,NULL,1754682802,1754682802),('/admin/role/get-users',2,NULL,NULL,NULL,1754682802,1754682802),('/admin/role/index',2,NULL,NULL,NULL,1754682802,1754682802),('/admin/role/remove',2,NULL,NULL,NULL,1754682802,1754682802),('/admin/role/update',2,NULL,NULL,NULL,1754682802,1754682802),('/admin/role/view',2,NULL,NULL,NULL,1754682802,1754682802),('/admin/route/*',2,NULL,NULL,NULL,1754682803,1754682803),('/admin/route/assign',2,NULL,NULL,NULL,1754682803,1754682803),('/admin/route/create',2,NULL,NULL,NULL,1754682803,1754682803),('/admin/route/index',2,NULL,NULL,NULL,1754682803,1754682803),('/admin/route/refresh',2,NULL,NULL,NULL,1754682803,1754682803),('/admin/route/remove',2,NULL,NULL,NULL,1754682803,1754682803),('/admin/rule/*',2,NULL,NULL,NULL,1754682804,1754682804),('/admin/rule/create',2,NULL,NULL,NULL,1754682803,1754682803),('/admin/rule/delete',2,NULL,NULL,NULL,1754682804,1754682804),('/admin/rule/index',2,NULL,NULL,NULL,1754682803,1754682803),('/admin/rule/update',2,NULL,NULL,NULL,1754682803,1754682803),('/admin/rule/view',2,NULL,NULL,NULL,1754682803,1754682803),('/admin/user/*',2,NULL,NULL,NULL,1754682805,1754682805),('/admin/user/activate',2,NULL,NULL,NULL,1754682805,1754682805),('/admin/user/change-password',2,NULL,NULL,NULL,1754682805,1754682805),('/admin/user/delete',2,NULL,NULL,NULL,1754682804,1754682804),('/admin/user/index',2,NULL,NULL,NULL,1754682804,1754682804),('/admin/user/login',2,NULL,NULL,NULL,1754682805,1754682805),('/admin/user/logout',2,NULL,NULL,NULL,1754682805,1754682805),('/admin/user/request-password-reset',2,NULL,NULL,NULL,1754682805,1754682805),('/admin/user/reset-password',2,NULL,NULL,NULL,1754682805,1754682805),('/admin/user/signup',2,NULL,NULL,NULL,1754682805,1754682805),('/admin/user/view',2,NULL,NULL,NULL,1754682804,1754682804),('/categories/*',2,NULL,NULL,NULL,1756778063,1756778063),('/categories/create',2,NULL,NULL,NULL,1756778063,1756778063),('/categories/delete',2,NULL,NULL,NULL,1756778063,1756778063),('/categories/index',2,NULL,NULL,NULL,1756778062,1756778062),('/categories/update',2,NULL,NULL,NULL,1756778063,1756778063),('/categories/view',2,NULL,NULL,NULL,1756778063,1756778063),('/debug/*',2,NULL,NULL,NULL,1754682807,1754682807),('/debug/default/*',2,NULL,NULL,NULL,1754682806,1754682806),('/debug/default/db-explain',2,NULL,NULL,NULL,1754682806,1754682806),('/debug/default/download-mail',2,NULL,NULL,NULL,1754682806,1754682806),('/debug/default/index',2,NULL,NULL,NULL,1754682806,1754682806),('/debug/default/toolbar',2,NULL,NULL,NULL,1754682806,1754682806),('/debug/default/view',2,NULL,NULL,NULL,1754682806,1754682806),('/debug/user/*',2,NULL,NULL,NULL,1754682807,1754682807),('/debug/user/reset-identity',2,NULL,NULL,NULL,1754682807,1754682807),('/debug/user/set-identity',2,NULL,NULL,NULL,1754682807,1754682807),('/equines/*',2,NULL,NULL,NULL,1756759712,1756759712),('/equines/create',2,NULL,NULL,NULL,1756759712,1756759712),('/equines/delete',2,NULL,NULL,NULL,1756759712,1756759712),('/equines/index',2,NULL,NULL,NULL,1756759711,1756759711),('/equines/our-equines',2,NULL,NULL,NULL,1756845974,1756845974),('/equines/update',2,NULL,NULL,NULL,1756759712,1756759712),('/equines/view',2,NULL,NULL,NULL,1756759712,1756759712),('/gaits/*',2,NULL,NULL,NULL,1756757154,1756757154),('/gaits/create',2,NULL,NULL,NULL,1756757154,1756757154),('/gaits/delete',2,NULL,NULL,NULL,1756757154,1756757154),('/gaits/index',2,NULL,NULL,NULL,1756757154,1756757154),('/gaits/update',2,NULL,NULL,NULL,1756757154,1756757154),('/gaits/view',2,NULL,NULL,NULL,1756757154,1756757154),('/gii/*',2,NULL,NULL,NULL,1754682807,1754682807),('/gii/default/*',2,NULL,NULL,NULL,1754682807,1754682807),('/gii/default/action',2,NULL,NULL,NULL,1754682807,1754682807),('/gii/default/diff',2,NULL,NULL,NULL,1754682807,1754682807),('/gii/default/index',2,NULL,NULL,NULL,1754682807,1754682807),('/gii/default/preview',2,NULL,NULL,NULL,1754682807,1754682807),('/gii/default/view',2,NULL,NULL,NULL,1754682807,1754682807),('/site/*',2,NULL,NULL,NULL,1754682809,1754682809),('/site/about',2,NULL,NULL,NULL,1754682808,1754682808),('/site/captcha',2,NULL,NULL,NULL,1754682808,1754682808),('/site/contact',2,NULL,NULL,NULL,1754682808,1754682808),('/site/error',2,NULL,NULL,NULL,1754682808,1754682808),('/site/index',2,NULL,NULL,NULL,1754682808,1754682808),('/site/login',2,NULL,NULL,NULL,1754682808,1754682808),('/site/logout',2,NULL,NULL,NULL,1754682808,1754682808),('/site/sara',2,NULL,NULL,NULL,1757276331,1757276331),('/subcategories/*',2,NULL,NULL,NULL,1756778063,1756778063),('/subcategories/create',2,NULL,NULL,NULL,1756778063,1756778063),('/subcategories/delete',2,NULL,NULL,NULL,1756778063,1756778063),('/subcategories/index',2,NULL,NULL,NULL,1756778063,1756778063),('/subcategories/update',2,NULL,NULL,NULL,1756778063,1756778063),('/subcategories/view',2,NULL,NULL,NULL,1756778063,1756778063),('/users/*',2,NULL,NULL,NULL,1754682809,1754682809),('/users/create',2,NULL,NULL,NULL,1754682809,1754682809),('/users/delete',2,NULL,NULL,NULL,1754682809,1754682809),('/users/index',2,NULL,NULL,NULL,1754682809,1754682809),('/users/update',2,NULL,NULL,NULL,1754682809,1754682809),('/users/view',2,NULL,NULL,NULL,1754682809,1754682809),('/variables/*',2,NULL,NULL,NULL,1756778063,1756778063),('/variables/create',2,NULL,NULL,NULL,1756778063,1756778063),('/variables/delete',2,NULL,NULL,NULL,1756778063,1756778063),('/variables/index',2,NULL,NULL,NULL,1756778063,1756778063),('/variables/update',2,NULL,NULL,NULL,1756778063,1756778063),('/variables/view',2,NULL,NULL,NULL,1756778063,1756778063),('Cliente',1,NULL,NULL,NULL,1756851696,1756851696),('clientPermission',2,NULL,NULL,NULL,1756851717,1756851717),('fullPermission',2,'Todos los permisos asignados',NULL,NULL,1754682984,1754682984),('SuperAdministrador',1,'Super Administrador con acceso a todas las rutas',NULL,NULL,1754682958,1754682958);

/*Table structure for table `auth_item_child` */

DROP TABLE IF EXISTS `auth_item_child`;

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

/*Data for the table `auth_item_child` */

insert  into `auth_item_child`(`parent`,`child`) values ('fullPermission','/*'),('fullPermission','/admin/*'),('fullPermission','/admin/assignment/*'),('fullPermission','/admin/assignment/assign'),('fullPermission','/admin/assignment/index'),('fullPermission','/admin/assignment/revoke'),('fullPermission','/admin/assignment/view'),('fullPermission','/admin/default/*'),('fullPermission','/admin/default/index'),('fullPermission','/admin/menu/*'),('fullPermission','/admin/menu/create'),('fullPermission','/admin/menu/delete'),('fullPermission','/admin/menu/index'),('fullPermission','/admin/menu/update'),('fullPermission','/admin/menu/view'),('fullPermission','/admin/permission/*'),('fullPermission','/admin/permission/assign'),('fullPermission','/admin/permission/create'),('fullPermission','/admin/permission/delete'),('fullPermission','/admin/permission/get-users'),('fullPermission','/admin/permission/index'),('fullPermission','/admin/permission/remove'),('fullPermission','/admin/permission/update'),('fullPermission','/admin/permission/view'),('fullPermission','/admin/role/*'),('fullPermission','/admin/role/assign'),('fullPermission','/admin/role/create'),('fullPermission','/admin/role/delete'),('fullPermission','/admin/role/get-users'),('fullPermission','/admin/role/index'),('fullPermission','/admin/role/remove'),('fullPermission','/admin/role/update'),('fullPermission','/admin/role/view'),('fullPermission','/admin/route/*'),('fullPermission','/admin/route/assign'),('fullPermission','/admin/route/create'),('fullPermission','/admin/route/index'),('fullPermission','/admin/route/refresh'),('fullPermission','/admin/route/remove'),('fullPermission','/admin/rule/*'),('fullPermission','/admin/rule/create'),('fullPermission','/admin/rule/delete'),('fullPermission','/admin/rule/index'),('fullPermission','/admin/rule/update'),('fullPermission','/admin/rule/view'),('fullPermission','/admin/user/*'),('fullPermission','/admin/user/activate'),('fullPermission','/admin/user/change-password'),('fullPermission','/admin/user/delete'),('fullPermission','/admin/user/index'),('fullPermission','/admin/user/login'),('fullPermission','/admin/user/logout'),('fullPermission','/admin/user/request-password-reset'),('fullPermission','/admin/user/reset-password'),('fullPermission','/admin/user/signup'),('fullPermission','/admin/user/view'),('fullPermission','/debug/*'),('fullPermission','/debug/default/*'),('fullPermission','/debug/default/db-explain'),('fullPermission','/debug/default/download-mail'),('fullPermission','/debug/default/index'),('fullPermission','/debug/default/toolbar'),('fullPermission','/debug/default/view'),('fullPermission','/debug/user/*'),('fullPermission','/debug/user/reset-identity'),('fullPermission','/debug/user/set-identity'),('clientPermission','/equines/our-equines'),('fullPermission','/gii/*'),('fullPermission','/gii/default/*'),('fullPermission','/gii/default/action'),('fullPermission','/gii/default/diff'),('fullPermission','/gii/default/index'),('fullPermission','/gii/default/preview'),('fullPermission','/gii/default/view'),('clientPermission','/site/*'),('fullPermission','/site/*'),('clientPermission','/site/about'),('fullPermission','/site/about'),('clientPermission','/site/captcha'),('fullPermission','/site/captcha'),('clientPermission','/site/contact'),('fullPermission','/site/contact'),('clientPermission','/site/error'),('fullPermission','/site/error'),('clientPermission','/site/index'),('fullPermission','/site/index'),('clientPermission','/site/login'),('fullPermission','/site/login'),('clientPermission','/site/logout'),('fullPermission','/site/logout'),('clientPermission','/site/sara'),('fullPermission','/users/*'),('fullPermission','/users/create'),('fullPermission','/users/delete'),('fullPermission','/users/index'),('fullPermission','/users/update'),('fullPermission','/users/view'),('Cliente','clientPermission'),('SuperAdministrador','fullPermission');

/*Table structure for table `auth_rule` */

DROP TABLE IF EXISTS `auth_rule`;

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

/*Data for the table `auth_rule` */

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(100) NOT NULL COMMENT 'Nombre de la categoría',
  `description` text COMMENT 'Descripción de la categoría',
  `active` tinyint NOT NULL COMMENT 'Activo',
  `order` int DEFAULT NULL,
  `created` datetime NOT NULL COMMENT 'Creado',
  `created_by` varchar(50) NOT NULL COMMENT 'Creado por',
  `modified` datetime NOT NULL COMMENT 'Modificado',
  `modified_by` varchar(50) NOT NULL COMMENT 'Modificado por',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de categorías de caballos';

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`,`description`,`active`,`order`,`created`,`created_by`,`modified`,`modified_by`) values (1,'Tamaño y Forma Corporal','Descripción de la categoría Tamaño y Forma Corporal',1,1,'2025-09-01 21:02:57','pipe.echeverri','2025-09-20 10:39:56','pipe.echeverri'),(2,'Balance','Descripción de la categoría Balance',0,11,'2025-09-02 21:41:17','pipe.echeverri','2025-09-20 10:40:36','pipe.echeverri'),(3,'Línea superior','Descripción de la categoría Línea superior',1,4,'2025-09-07 16:17:10','pipe.echeverri','2025-09-07 16:17:10','pipe.echeverri'),(4,'Espalda','Descripción de lo que significa una Espalda',1,7,'2025-09-07 16:40:51','pipe.echeverri','2025-09-07 16:40:51','pipe.echeverri'),(5,'Cruz - Dorso','Descripción de lo que significa un Cruz - Dorso',0,8,'2025-09-07 16:41:15','pipe.echeverri','2025-09-20 10:45:50','pipe.echeverri'),(6,'Grupa',' Descripción de la categoría  Grupa',1,5,'2025-09-07 17:07:48','pipe.echeverri','2025-09-07 17:07:48','pipe.echeverri'),(7,'Aplomos',' Descripción de la categoría  Aplomos',1,3,'2025-09-07 17:07:48','pipe.echeverri','2025-09-07 17:07:48','pipe.echeverri'),(8,'Alzada',' Descripción de la categoría Alzada',0,10,'2025-09-07 17:07:48','pipe.echeverri','2025-09-20 10:40:53','pipe.echeverri'),(9,'Morfometría',' Descripción de la categoría Morfometría',1,6,'2025-09-07 17:07:48','pipe.echeverri','2025-09-07 17:07:48','pipe.echeverri'),(10,'Movimiento',' Descripción de la categoría Movimiento',1,2,'2025-09-07 17:07:48','pipe.echeverri','2025-09-07 17:07:48','pipe.echeverri');

/*Table structure for table `equine_variable_values` */

DROP TABLE IF EXISTS `equine_variable_values`;

CREATE TABLE `equine_variable_values` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'II',
  `equine_id` int NOT NULL COMMENT 'Ejemplar',
  `subcategory_id` int NOT NULL COMMENT 'Subcategoría',
  `variable_id` int NOT NULL COMMENT 'Variable',
  `active` tinyint NOT NULL COMMENT 'Activo',
  `created` datetime NOT NULL COMMENT 'Creado',
  `created_by` varchar(50) NOT NULL COMMENT 'Creado por',
  `modified` datetime NOT NULL COMMENT 'Modificado',
  `modified_by` varchar(50) NOT NULL COMMENT 'Modificado por',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_equine_subcategory` (`equine_id`,`subcategory_id`),
  KEY `fk_ev_subcategory` (`subcategory_id`),
  KEY `fk_ev_variable` (`variable_id`),
  CONSTRAINT `fk_ev_equine` FOREIGN KEY (`equine_id`) REFERENCES `equines` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_ev_subcategory` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_ev_variable` FOREIGN KEY (`variable_id`) REFERENCES `variables` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `equine_variable_values` */

insert  into `equine_variable_values`(`id`,`equine_id`,`subcategory_id`,`variable_id`,`active`,`created`,`created_by`,`modified`,`modified_by`) values (1,1,1,2,1,'0000-00-00 00:00:00','pipe.echeverri','2025-09-02 22:04:05','pipe.echeverri'),(4,1,2,6,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(5,1,3,7,1,'0000-00-00 00:00:00','pipe.echeverri','2025-09-02 22:05:01','pipe.echeverri'),(6,4,1,2,1,'2025-09-02 22:13:55','pipe.echeverri','2025-09-02 22:13:55','pipe.echeverri'),(7,4,2,5,1,'2025-09-02 22:13:55','pipe.echeverri','2025-09-02 22:13:55','pipe.echeverri'),(8,4,3,8,1,'2025-09-02 22:13:55','pipe.echeverri','2025-09-02 22:13:55','pipe.echeverri'),(9,1,5,10,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(10,1,6,13,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(11,1,7,16,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(12,1,8,19,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(13,1,9,22,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(14,1,10,25,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(15,4,5,11,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(16,4,6,14,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(17,4,7,17,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(18,4,8,20,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(19,4,9,23,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(20,4,10,26,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(21,1,11,28,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(22,1,25,75,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(23,1,26,80,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(24,1,27,85,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(25,1,28,90,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(26,1,15,40,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(27,1,16,44,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(28,1,17,48,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(29,1,18,51,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(30,1,19,53,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(31,1,20,55,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(32,1,21,60,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(33,1,22,65,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(34,1,23,70,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(35,1,24,71,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(36,1,12,31,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(37,1,13,35,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(38,1,14,39,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(39,2,1,1,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri'),(40,2,2,4,1,'0000-00-00 00:00:00','pipe.echeverri','0000-00-00 00:00:00','pipe.echeverri');

/*Table structure for table `equines` */

DROP TABLE IF EXISTS `equines`;

CREATE TABLE `equines` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `gait_id` int NOT NULL COMMENT 'Marcha',
  `name` varchar(100) NOT NULL COMMENT 'Nombre',
  `gender` varchar(20) NOT NULL COMMENT 'Género',
  `age` int NOT NULL COMMENT 'Edad',
  `location` text COMMENT 'Ubicación',
  `color` varchar(50) NOT NULL COMMENT 'Color',
  `stud_farm` varchar(200) DEFAULT NULL COMMENT 'Criadero',
  `vet` varchar(200) DEFAULT NULL COMMENT 'Veterinario',
  `colletion_days` varchar(200) DEFAULT NULL COMMENT 'Días de colecta',
  `about_me` text NOT NULL COMMENT 'Acerca de mí',
  `history` text NOT NULL COMMENT 'Mi Historia',
  `image_ppal` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'Imagen principal',
  `images` text COMMENT 'Imágenes',
  `owner` varchar(200) DEFAULT NULL COMMENT 'Propietario',
  `active` tinyint NOT NULL COMMENT 'Activo',
  `created` datetime NOT NULL COMMENT 'Creado',
  `created_by` varchar(50) NOT NULL COMMENT 'Creado por',
  `modified` datetime NOT NULL COMMENT 'Modificado',
  `modified_by` varchar(50) NOT NULL COMMENT 'Modificado por',
  PRIMARY KEY (`id`),
  KEY `FK_equines_gaits` (`gait_id`),
  CONSTRAINT `FK_equines_gaits` FOREIGN KEY (`gait_id`) REFERENCES `menu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `equines` */

insert  into `equines`(`id`,`gait_id`,`name`,`gender`,`age`,`location`,`color`,`stud_farm`,`vet`,`colletion_days`,`about_me`,`history`,`image_ppal`,`images`,`owner`,`active`,`created`,`created_by`,`modified`,`modified_by`) values (1,4,'Rastastas','Macho',2,'google.map','Marrón','Criadero Equinetics','Felipe Jaramillo, 3134566778','Todos los primeros dias del mes',' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dignissim, augue sit amet ullamcorper porttitor, nulla mi rhoncus sapien, vel malesuada arcu mauris non orci. Donec convallis tempus suscipit. Phasellus porta tristique tortor. Fusce dui felis, semper in hendrerit eu, luctus vel mi. Maecenas vel nulla nec orci tincidunt rhoncus id non libero. Curabitur eu posuere sem. Aliquam lacus dui, ultricies at semper in, dictum sed nisi. Suspendisse eget ipsum consequat, mattis ipsum vitae, sollicitudin ligula. Etiam vitae nisi ac est ornare imperdiet quis sed lorem. Aenean urna diam, sagittis ac imperdiet eget, mollis ac ex. Integer facilisis sollicitudin pulvinar. Duis et neque fringilla, condimentum nisl non, convallis metus. Curabitur eget ornare odio. Curabitur ut gravida velit, vitae viverra orci. Nullam vel accumsan odio, at vestibulum est.\r\n\r\nPraesent efficitur malesuada vulputate. Sed eu maximus arcu. Integer sodales sagittis justo, congue rhoncus mauris pulvinar quis. Aliquam erat volutpat. Aliquam hendrerit eu nulla eget maximus. Suspendisse feugiat nibh augue, pretium gravida felis ultrices in. Nullam nulla ante, feugiat in turpis eu, sollicitudin fermentum nulla. Nullam condimentum semper pretium. Quisque purus eros, rhoncus elementum molestie gravida, consectetur a libero. Quisque facilisis, justo vel laoreet gravida, massa massa molestie tortor, nec laoreet libero velit in risus. Praesent vitae faucibus nulla, sit amet rhoncus lorem. Curabitur consequat, diam vel feugiat feugiat, velit quam egestas orci, vitae tristique elit enim accumsan augue. Cras pellentesque tempus mauris vitae volutpat. Nunc malesuada mi sed suscipit dapibus. ',' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dignissim, augue sit amet ullamcorper porttitor, nulla mi rhoncus sapien, vel malesuada arcu mauris non orci. Donec convallis tempus suscipit. Phasellus porta tristique tortor. Fusce dui felis, semper in hendrerit eu, luctus vel mi. Maecenas vel nulla nec orci tincidunt rhoncus id non libero. Curabitur eu posuere sem. Aliquam lacus dui, ultricies at semper in, dictum sed nisi. Suspendisse eget ipsum consequat, mattis ipsum vitae, sollicitudin ligula. Etiam vitae nisi ac est ornare imperdiet quis sed lorem. Aenean urna diam, sagittis ac imperdiet eget, mollis ac ex. Integer facilisis sollicitudin pulvinar. Duis et neque fringilla, condimentum nisl non, convallis metus. Curabitur eget ornare odio. Curabitur ut gravida velit, vitae viverra orci. Nullam vel accumsan odio, at vestibulum est.\r\n\r\nPraesent efficitur malesuada vulputate. Sed eu maximus arcu. Integer sodales sagittis justo, congue rhoncus mauris pulvinar quis. Aliquam erat volutpat. Aliquam hendrerit eu nulla eget maximus. Suspendisse feugiat nibh augue, pretium gravida felis ultrices in. Nullam nulla ante, feugiat in turpis eu, sollicitudin fermentum nulla. Nullam condimentum semper pretium. Quisque purus eros, rhoncus elementum molestie gravida, consectetur a libero. Quisque facilisis, justo vel laoreet gravida, massa massa molestie tortor, nec laoreet libero velit in risus. Praesent vitae faucibus nulla, sit amet rhoncus lorem. Curabitur consequat, diam vel feugiat feugiat, velit quam egestas orci, vitae tristique elit enim accumsan augue. Cras pellentesque tempus mauris vitae volutpat. Nunc malesuada mi sed suscipit dapibus. ','rastastas250902120714.jpg',NULL,'Juan Perez',1,'2025-09-01 16:24:49','pipe.echeverri','2025-09-07 17:56:08','pipe.echeverri'),(2,1,'Reina de paz','Hembra',1,NULL,'blanco',NULL,NULL,NULL,' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dignissim, augue sit amet ullamcorper porttitor, nulla mi rhoncus sapien, vel malesuada arcu mauris non orci. Donec convallis tempus suscipit. Phasellus porta tristique tortor. Fusce dui felis, semper in hendrerit eu, luctus vel mi. Maecenas vel nulla nec orci tincidunt rhoncus id non libero. Curabitur eu posuere sem. Aliquam lacus dui, ultricies at semper in, dictum sed nisi. Suspendisse eget ipsum consequat, mattis ipsum vitae, sollicitudin ligula. Etiam vitae nisi ac est ornare imperdiet quis sed lorem. Aenean urna diam, sagittis ac imperdiet eget, mollis ac ex. Integer facilisis sollicitudin pulvinar. Duis et neque fringilla, condimentum nisl non, convallis metus. Curabitur eget ornare odio. Curabitur ut gravida velit, vitae viverra orci. Nullam vel accumsan odio, at vestibulum est.\r\n\r\nPraesent efficitur malesuada vulputate. Sed eu maximus arcu. Integer sodales sagittis justo, congue rhoncus mauris pulvinar quis. Aliquam erat volutpat. Aliquam hendrerit eu nulla eget maximus. Suspendisse feugiat nibh augue, pretium gravida felis ultrices in. Nullam nulla ante, feugiat in turpis eu, sollicitudin fermentum nulla. Nullam condimentum semper pretium. Quisque purus eros, rhoncus elementum molestie gravida, consectetur a libero. Quisque facilisis, justo vel laoreet gravida, massa massa molestie tortor, nec laoreet libero velit in risus. Praesent vitae faucibus nulla, sit amet rhoncus lorem.',' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dignissim, augue sit amet ullamcorper porttitor, nulla mi rhoncus sapien, vel malesuada arcu mauris non orci. Donec convallis tempus suscipit. Phasellus porta tristique tortor. Fusce dui felis, semper in hendrerit eu, luctus vel mi. Maecenas vel nulla nec orci tincidunt rhoncus id non libero. Curabitur eu posuere sem. Aliquam lacus dui, ultricies at semper in, dictum sed nisi. Suspendisse eget ipsum consequat, mattis ipsum vitae, sollicitudin ligula. Etiam vitae nisi ac est ornare imperdiet quis sed lorem. Aenean urna diam, sagittis ac imperdiet eget, mollis ac ex. Integer facilisis sollicitudin pulvinar. Duis et neque fringilla, condimentum nisl non, convallis metus. Curabitur eget ornare odio. Curabitur ut gravida velit, vitae viverra orci. Nullam vel accumsan odio, at vestibulum est.\r\n\r\nPraesent efficitur malesuada vulputate. Sed eu maximus arcu. Integer sodales sagittis justo, congue rhoncus mauris pulvinar quis. Aliquam erat volutpat. Aliquam hendrerit eu nulla eget maximus. Suspendisse feugiat nibh augue, pretium gravida felis ultrices in. Nullam nulla ante, feugiat in turpis eu, sollicitudin fermentum nulla. Nullam condimentum semper pretium. Quisque purus eros, rhoncus elementum molestie gravida, consectetur a libero. Quisque facilisis, justo vel laoreet gravida, massa massa molestie tortor, nec laoreet libero velit in risus. Praesent vitae faucibus nulla, sit amet rhoncus lorem.','reina-de-paz250902121510.jpg',NULL,NULL,1,'2025-09-01 19:15:10','pipe.echeverri','2025-09-07 17:56:32','pipe.echeverri'),(4,2,'Rey de reyes','Macho',3,'Ubicación','Marrón','Criadero Equinetics','Felipe Jaramillo, 3134566778','Todos los primeros dias del mes','Acerca de mí','Mi Historia','rey-de-reyes250903031354.jpg',NULL,'Juan Perez',1,'2025-09-02 22:13:54','pipe.echeverri','2025-09-07 17:02:48','pipe.echeverri');

/*Table structure for table `gaits` */

DROP TABLE IF EXISTS `gaits`;

CREATE TABLE `gaits` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `name` varchar(100) NOT NULL COMMENT 'Modalidad',
  `created` datetime NOT NULL COMMENT 'Creado',
  `created_by` varchar(50) NOT NULL COMMENT 'Creado por',
  `modified` datetime NOT NULL COMMENT 'Modificado',
  `modified_by` varchar(50) NOT NULL COMMENT 'Modificado por',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `gaits` */

insert  into `gaits`(`id`,`name`,`created`,`created_by`,`modified`,`modified_by`) values (1,'Paso Fino','2025-09-01 15:20:24','pipe.echeverri','2025-09-01 15:20:24','pipe.echeverri'),(2,'Trocha','2025-09-01 15:20:41','pipe.echeverri','2025-09-01 15:20:41','pipe.echeverri'),(3,'Trocha y Galope','2025-09-01 15:20:59','pipe.echeverri','2025-09-01 15:20:59','pipe.echeverri'),(4,'Trote y Galope','2025-09-01 15:21:14','pipe.echeverri','2025-09-01 15:21:14','pipe.echeverri');

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

/*Data for the table `menu` */

insert  into `menu`(`id`,`name`,`parent`,`route`,`order`,`data`) values (1,'Configuración',NULL,NULL,4,'fas fa-tools'),(2,'Roles y accesos',1,'/admin/assignment/index',2,'fas fa-user-check'),(3,'Usuarios',1,'/users/index',1,'fas fa-users'),(4,'Administración',NULL,NULL,3,'fas fa-toggle-on'),(5,'Marchas',4,'/gaits/index',5,'fas fa-horse'),(6,'Ejemplares',4,'/equines/index',1,'fas fa-horse'),(7,'Categorías',4,'/categories/index',2,'fas fa-list'),(8,'Subcategorías',4,'/subcategories/index',3,'fas fa-list'),(9,'Variables',4,'/variables/index',4,'fas fa-toggle-on'),(10,'Nuestros ejemplares',NULL,'/equines/our-equines',2,'fas fa-horse'),(11,'Sara',NULL,'/site/sara',1,'fas fa-search');

/*Table structure for table `migration` */

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `migration` */

insert  into `migration`(`version`,`apply_time`) values ('m000000_000000_base',1754679593),('m140602_111327_create_menu_table',1754679599),('m160312_050000_create_user',1754679600),('m140506_102106_rbac_init',1754679626),('m170907_052038_rbac_add_index_on_auth_assignment_user_id',1754679626),('m180523_151638_rbac_updates_indexes_without_prefix',1754679627),('m200409_110543_rbac_update_mssql_trigger',1754679627);

/*Table structure for table `sara_search_history` */

DROP TABLE IF EXISTS `sara_search_history`;

CREATE TABLE `sara_search_history` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'Creado por',
  `nombre_yegua` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Nombre de la Yegua',
  `gait_id` int DEFAULT NULL COMMENT 'Andar',
  `variables` json NOT NULL COMMENT 'Variables selccionadas',
  `chk` json NOT NULL COMMENT 'Mejoramiento seleccionado',
  `created` datetime DEFAULT NULL COMMENT 'Creado',
  PRIMARY KEY (`id`),
  KEY `FK_sara_search_history_gaits` (`gait_id`),
  CONSTRAINT `FK_sara_search_history_gaits` FOREIGN KEY (`gait_id`) REFERENCES `gaits` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `sara_search_history` */

insert  into `sara_search_history`(`id`,`created_by`,`nombre_yegua`,`gait_id`,`variables`,`chk`,`created`) values (1,'pedro.perez','Ruidosa',1,'\"{\\\"tamano-y-forma-corporal-figura\\\":\\\"3\\\",\\\"tamano-y-forma-corporal-orientacion\\\":\\\"1\\\",\\\"movimiento-velocidad\\\":\\\"4\\\",\\\"aplomos-posteriores-atras\\\":\\\"3\\\"}\"','\"[\\\"\\\",\\\"chk-tamano-y-forma-corporal-figura\\\",\\\"chk-tamano-y-forma-corporal-orientacion\\\",\\\"chk-aplomos-posteriores-atras\\\"]\"','2025-09-20 17:13:33'),(2,'pedro.perez','Serenata',2,'\"{\\\"tamano-y-forma-corporal-figura\\\":\\\"1\\\",\\\"tamano-y-forma-corporal-orientacion\\\":\\\"1\\\",\\\"tamano-y-forma-corporal-horizontal\\\":\\\"1\\\",\\\"tamano-y-forma-corporal-estatura\\\":\\\"1\\\",\\\"linea-superior-cabeza\\\":\\\"1\\\",\\\"linea-superior-longitud-cuello\\\":\\\"1\\\",\\\"linea-superior-cruz\\\":\\\"1\\\",\\\"linea-superior-tamano-dorso\\\":\\\"1\\\",\\\"linea-superior-pecho\\\":\\\"1\\\",\\\"espalda-tamano\\\":\\\"1\\\",\\\"espalda-orientacion\\\":\\\"1\\\"}\"','\"[\\\"\\\",\\\"chk-tamano-y-forma-corporal-figura\\\",\\\"chk-linea-superior-tamano-dorso\\\"]\"','2025-09-20 17:38:35'),(3,'pedro.perez','Martina',4,'\"{\\\"tamano-y-forma-corporal-figura\\\":\\\"3\\\",\\\"tamano-y-forma-corporal-orientacion\\\":\\\"3\\\",\\\"tamano-y-forma-corporal-horizontal\\\":\\\"3\\\",\\\"tamano-y-forma-corporal-estatura\\\":\\\"3\\\",\\\"movimiento-velocidad\\\":\\\"4\\\",\\\"movimiento-elevacion-anteriores\\\":\\\"4\\\",\\\"movimiento-elevacion-posteriores\\\":\\\"4\\\",\\\"movimiento-potencia-en-la-pisada\\\":\\\"4\\\",\\\"aplomos-anteriores-frontalmente\\\":\\\"3\\\",\\\"aplomos-anteriores-lateralmente\\\":\\\"3\\\",\\\"aplomos-posteriores-atras\\\":\\\"3\\\",\\\"aplomos-posteriores-lateralmente\\\":\\\"3\\\"}\"','\"[\\\"\\\",\\\"chk-aplomos-anteriores-frontalmente\\\",\\\"chk-aplomos-anteriores-lateralmente\\\",\\\"chk-aplomos-posteriores-atras\\\",\\\"chk-aplomos-posteriores-lateralmente\\\"]\"','2025-09-20 17:47:27');

/*Table structure for table `subcategories` */

DROP TABLE IF EXISTS `subcategories`;

CREATE TABLE `subcategories` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `category_id` int NOT NULL COMMENT 'Categoría',
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Nombre',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci COMMENT 'Descripción',
  `active` tinyint NOT NULL COMMENT 'Activo',
  `created` datetime NOT NULL COMMENT 'Creado',
  `created_by` varchar(50) NOT NULL COMMENT 'Creado por',
  `modified` datetime NOT NULL COMMENT 'Modificado',
  `modified_by` varchar(50) NOT NULL COMMENT 'Modificado por',
  PRIMARY KEY (`id`),
  KEY `fk_subcategories_category` (`category_id`),
  CONSTRAINT `fk_subcategories_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `subcategories` */

insert  into `subcategories`(`id`,`category_id`,`name`,`description`,`active`,`created`,`created_by`,`modified`,`modified_by`) values (1,1,'Figura','Descripción de la subcategoría Figura',1,'2025-09-01 21:07:58','pipe.echeverri','2025-09-01 21:08:43','pipe.echeverri'),(2,1,'Orientación',NULL,1,'2025-09-02 21:40:59','pipe.echeverri','2025-09-02 21:40:59','pipe.echeverri'),(3,1,'Horizontal',NULL,1,'2025-09-02 21:41:27','pipe.echeverri','2025-09-20 10:41:34','pipe.echeverri'),(4,2,'Vertical',NULL,0,'2025-09-02 21:41:40','pipe.echeverri','2025-09-07 17:01:53','pipe.echeverri'),(5,3,'Cabeza','Descripción de lo que significa la cabeza',1,'2025-09-07 16:17:57','pipe.echeverri','2025-09-07 16:17:57','pipe.echeverri'),(6,3,'Longitud cuello','Descripción de lo que significa una Longitud cuello',1,'2025-09-07 16:21:27','pipe.echeverri','2025-09-07 16:21:27','pipe.echeverri'),(7,4,'Tamaño','Descripción de lo que significa un Tamaño',1,'2025-09-07 16:42:26','pipe.echeverri','2025-09-07 16:42:26','pipe.echeverri'),(8,4,'Orientación','Descripción de lo que significa un Orientación',1,'2025-09-07 16:42:26','pipe.echeverri','2025-09-07 16:42:26','pipe.echeverri'),(9,3,'Cruz','Descripción de lo que significa un Cruz',1,'2025-09-07 16:42:26','pipe.echeverri','2025-09-20 10:46:11','pipe.echeverri'),(10,3,'Tamaño dorso','Descripción de lo que significa un Tamaño dorso',1,'2025-09-07 16:42:26','pipe.echeverri','2025-09-20 10:46:19','pipe.echeverri'),(11,3,'Pecho','Descripción de lo que significa un Tamaño Pecho',1,'2025-09-07 16:42:26','pipe.echeverri','2025-09-07 16:42:26','pipe.echeverri'),(12,6,'Tamaño','Descripción de lo que significa un Tamaño',1,'2025-09-07 16:42:26','pipe.echeverri','2025-09-07 16:42:26','pipe.echeverri'),(13,6,'Orientación','Descripción de lo que significa un Orientación',1,'2025-09-07 16:42:26','pipe.echeverri','2025-09-07 16:42:26','pipe.echeverri'),(14,6,'Amplitud','Descripción de lo que significa un Amplitud',1,'2025-09-07 16:42:26','pipe.echeverri','2025-09-07 16:42:26','pipe.echeverri'),(15,7,'Anteriores (Frontalmente)','Descripción de lo que significa un Anteriores (Frontalmente)',1,'2025-09-07 16:42:26','pipe.echeverri','2025-09-07 16:42:26','pipe.echeverri'),(16,7,'Anteriores (Lateralmente)','Descripción de lo que significa un Anteriores (Lateralmente)',1,'2025-09-07 16:42:26','pipe.echeverri','2025-09-07 16:42:26','pipe.echeverri'),(17,7,'Posteriores (Atrás)','Descripción de lo que significa unPosteriores (Atrás)',1,'2025-09-07 16:42:26','pipe.echeverri','2025-09-07 16:42:26','pipe.echeverri'),(18,7,'Posteriores (Lateralmente)','Descripción de lo que significa un Posteriores (Lateralmente)',1,'2025-09-07 16:42:26','pipe.echeverri','2025-09-07 16:42:26','pipe.echeverri'),(19,1,'Estatura','Descripción de lo que significa un Estatura',1,'2025-09-07 16:42:26','pipe.echeverri','2025-09-20 10:58:14','pipe.echeverri'),(20,9,'Caña anterior','Descripción de lo que significa un Caña anterior',1,'2025-09-07 16:42:26','pipe.echeverri','2025-09-07 16:42:26','pipe.echeverri'),(21,9,'Cuartilla anterior','Descripción de lo que significa un Cuartilla anterior',1,'2025-09-07 16:42:26','pipe.echeverri','2025-09-07 16:42:26','pipe.echeverri'),(22,9,'Fémur','Descripción de lo que significa un Femuur',1,'2025-09-07 16:42:26','pipe.echeverri','2025-09-07 16:42:26','pipe.echeverri'),(23,9,'Caña posterior','Descripción de lo que significa un Caña posterior',1,'2025-09-07 16:42:26','pipe.echeverri','2025-09-07 16:42:26','pipe.echeverri'),(24,9,'Cuartilla posterior','Descripción de lo que significa un Cuartilla posterior',1,'2025-09-07 16:42:26','pipe.echeverri','2025-09-07 16:42:26','pipe.echeverri'),(25,10,'Velocidad','Descripción de lo que significa un Velocidad',1,'2025-09-07 16:42:26','pipe.echeverri','2025-09-07 16:42:26','pipe.echeverri'),(26,10,'Elevación anteriores','Descripción de lo que significa un Elevación anteriores',1,'2025-09-07 16:42:26','pipe.echeverri','2025-09-07 16:42:26','pipe.echeverri'),(27,10,'Elevación posteriores','Descripción de lo que significa un Elevación posteriores',1,'2025-09-07 16:42:26','pipe.echeverri','2025-09-07 16:42:26','pipe.echeverri'),(28,10,'Potencia en la pisada','Descripción de lo que significa un Potencia en la pisada',1,'2025-09-07 16:42:26','pipe.echeverri','2025-09-07 16:42:26','pipe.echeverri');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8mb3_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8mb3_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

/*Data for the table `user` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(100) NOT NULL COMMENT 'Nombre',
  `username` varchar(45) NOT NULL COMMENT 'Usuario',
  `password` varchar(100) NOT NULL COMMENT 'Clave',
  `email` varchar(100) NOT NULL COMMENT 'Correo electrónico',
  `active` tinyint(1) NOT NULL COMMENT 'Activo',
  `created` datetime NOT NULL COMMENT 'Creado',
  `created_by` varchar(45) NOT NULL COMMENT 'Creado por',
  `modified` datetime NOT NULL COMMENT 'Modificado',
  `modified_by` varchar(45) NOT NULL COMMENT 'Modificado por',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`username`,`password`,`email`,`active`,`created`,`created_by`,`modified`,`modified_by`) values (1,'Felipe Echeverri','pipe.echeverri','118d2b3c46e89edfd7d28c4f865ef9ae','pipe.echeverri.1@gmail.com',1,'2025-08-08 00:00:00','admin','2025-08-08 00:00:00','admin'),(2,'Pedro Perez','pedro.perez','88c29063b5763a374300a09d844730f6','pedro-perez@gmail.com',1,'2025-09-02 17:21:06','pipe.echeverri','2025-09-02 17:21:06','pipe.echeverri');

/*Table structure for table `variables` */

DROP TABLE IF EXISTS `variables`;

CREATE TABLE `variables` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `subcategory_id` int NOT NULL COMMENT 'Subcategoría',
  `name` varchar(100) NOT NULL COMMENT 'Nombre',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci COMMENT 'Descripción',
  `value` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Valor',
  `active` tinyint NOT NULL COMMENT 'Activo',
  `created` datetime NOT NULL COMMENT 'Creado',
  `created_by` varchar(50) NOT NULL COMMENT 'Creado por',
  `modified` datetime NOT NULL COMMENT 'Modificado',
  `modified_by` varchar(50) NOT NULL COMMENT 'Modificado por',
  PRIMARY KEY (`id`),
  KEY `fk_variables_subcategory` (`subcategory_id`),
  CONSTRAINT `fk_variables_subcategory` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `variables` */

insert  into `variables`(`id`,`subcategory_id`,`name`,`description`,`value`,`active`,`created`,`created_by`,`modified`,`modified_by`) values (1,1,'Cuadrada','Descripcion de figura Cuadrada','1',1,'2025-09-01 21:12:25','pipe.echeverri','2025-09-01 21:12:40','pipe.echeverri'),(2,1,'Proporcional','Descripción de figura Proporcional','2',1,'2025-09-01 21:13:02','pipe.echeverri','2025-09-01 21:13:02','pipe.echeverri'),(3,1,'Rectangular','Descripción de la figura Rectangular','3',1,'2025-09-01 21:13:26','pipe.echeverri','2025-09-01 21:13:26','pipe.echeverri'),(4,2,'Descendente',NULL,'1',1,'2025-09-02 21:42:53','pipe.echeverri','2025-09-02 21:42:53','pipe.echeverri'),(5,2,'Nivelado',NULL,'2',1,'2025-09-02 21:43:12','pipe.echeverri','2025-09-02 21:43:12','pipe.echeverri'),(6,2,'Ascendente',NULL,'3',1,'2025-09-02 21:43:28','pipe.echeverri','2025-09-02 21:43:28','pipe.echeverri'),(7,3,'Desbalanceado',NULL,'1',1,'2025-09-02 21:47:08','pipe.echeverri','2025-09-02 21:47:08','pipe.echeverri'),(8,3,'Intermedio',NULL,'2',1,'2025-09-02 21:47:48','pipe.echeverri','2025-09-20 10:49:05','pipe.echeverri'),(9,3,'Cercano al piso',NULL,'3',1,'2025-09-02 21:48:08','pipe.echeverri','2025-09-20 10:49:25','pipe.echeverri'),(10,5,'Ordinaria','Descripción de lo que significa una cabeza ordinaria','1',1,'2025-09-07 16:19:13','pipe.echeverri','2025-09-07 16:19:13','pipe.echeverri'),(11,5,'Común','Descripción de lo que significa una cabeza común','2',1,'2025-09-07 16:19:34','pipe.echeverri','2025-09-07 16:19:34','pipe.echeverri'),(12,5,'Estética','Descripción de lo que significa una cabeza Estética','3',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(13,6,'Corto','Descripción de lo que significa un corto','1',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(14,6,'Proporcional','Descripción de lo que significa un Proporcional','2',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(15,6,'Largo','Descripción de lo que significa un Largo','3',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(16,7,'1','Descripción de lo que significa un 1','1',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(17,7,'2','Descripción de lo que significa un 2','2',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(18,7,'3','Descripción de lo que significa un 3','3',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(19,8,'Vertical','Descripción de lo que significa un Vertical','1',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(20,8,'Promedio','Descripción de lo que significa un Promedio','2',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(21,8,'Amplia','Descripción de lo que significa un Amplia','3',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(22,9,'Corta','Descripción de lo que significa un Corta','1',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(23,9,'Proporcional','Descripción de lo que significa un Proporcional','2',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(24,9,'Larga','Descripción de lo que significa un Larga','3',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(25,10,'Corto','Descripción de lo que significa un Corto','1',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(26,10,'Proporcional','Descripción de lo que significa un Proporcional','2',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(27,10,'Largo','Descripción de lo que significa un Largo','3',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(28,11,'Angosto','Descripción de lo que significa unAngosto ','1',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(29,11,'Promedio','Descripción de lo que significa un Promedio','2',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(30,11,'Amplio','Descripción de lo que significa un Amplio','3',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(31,12,'1','Descripción de lo que significa un 1','1',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(32,12,'2','Descripción de lo que significa un 2','2',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(33,12,'3','Descripción de lo que significa un 3','3',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(34,13,'1','Descripción de lo que significa un 1','1',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(35,13,'2','Descripción de lo que significa un 2','2',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(36,13,'3','Descripción de lo que significa un 3','3',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(37,14,'1','Descripción de lo que significa un 1','1',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(38,14,'2','Descripción de lo que significa un 2','2',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(39,14,'3','Descripción de lo que significa un 3','3',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(40,15,'Izquierdo','Descripción de lo que significa un Abiertos','1',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-20 10:52:30','pipe.echeverri'),(41,15,'Correctos','Descripción de lo que significa un Correctos','2',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-20 10:52:52','pipe.echeverri'),(42,15,'Estevado','Descripción de lo que significa un Estevado','3',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-20 10:53:12','pipe.echeverri'),(43,16,'Plantados','Descripción de lo que significa un Plantados','1',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(44,16,'Correctos','Descripción de lo que significa un Correctos','2',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-20 10:53:42','pipe.echeverri'),(45,16,'Remetidos','Descripción de lo que significa un Remetidos','3',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(46,17,'Cerrados','Descripción de lo que significa un Cerrados','1',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-20 10:56:18','pipe.echeverri'),(47,17,'Correctos','Descripción de lo que significa un Correctos','2',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-20 10:55:10','pipe.echeverri'),(48,17,'Abiertos','Descripción de lo que significa un Abiertos','3',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-20 10:56:41','pipe.echeverri'),(49,18,'Plantados','Descripción de lo que significa un Plantados','1',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(50,18,'Correctos','Descripción de lo que significa un Correctos','2',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-20 10:57:19','pipe.echeverri'),(51,18,'Remetidos','Descripción de lo que significa un Remetidos','3',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(52,19,'Baja','Descripción de lo que significa un Baja','1',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(53,19,'Promedio','Descripción de lo que significa un Promedio','2',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(54,19,'Alta','Descripción de lo que significa un Alta','3',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(55,20,'Corta','Descripción de lo que significa un Corta','1',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(56,20,'Proporcional','Descripción de lo que significa un Proporcional','2',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(57,20,'Larga','Descripción de lo que significa un Larga','3',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(58,20,'Muy larga','Descripción de lo que significa un Muy larga','4',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(59,21,'Corta','Descripción de lo que significa un Corta','1',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(60,21,'Proporcional','Descripción de lo que significa un Proporcional','2',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(61,21,'Larga','Descripción de lo que significa un Larga','3',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(62,21,'Muy larga','Descripción de lo que significa un Muy larga','4',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(63,22,'Muy corto','Descripción de lo que significa un Muy corto','1',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(64,22,'Corto','Descripción de lo que significa un Corto','2',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(65,22,'Promedio','Descripción de lo que significa un Promedio','3',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(66,22,'Largo','Descripción de lo que significa un Largo','4',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(67,23,'Corta','Descripción de lo que significa un Corta','1',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(68,23,'Proporcional','Descripción de lo que significa un Proporcional','2',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(69,23,'Larga','Descripción de lo que significa un Larga','3',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(70,23,'Muy larga','Descripción de lo que significa un Muy larga','4',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(71,24,'Corta','Descripción de lo que significa un Corta','1',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(72,24,'Proporcional','Descripción de lo que significa un Proporcional','2',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(73,24,'Larga','Descripción de lo que significa un Larga','3',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(74,24,'Muy larga','Descripción de lo que significa un Muy larga','4',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(75,25,'Muy Baja','Descripción de lo que significa un Muy Baja','1',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(76,25,'Baja','Descripción de lo que significa un Baja','2',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(77,25,'Promedio','Descripción de lo que significa un Promedio','3',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(78,25,'Alta','Descripción de lo que significa un Alta','4',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(79,26,'Muy Baja','Descripción de lo que significa un Muy Baja','1',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(80,26,'Baja','Descripción de lo que significa un Baja','2',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(81,26,'Media','Descripción de lo que significa un Media','3',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(82,26,'Alta','Descripción de lo que significa un Alta','4',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(83,27,'Muy Baja','Descripción de lo que significa un Muy Baja','1',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(84,27,'Baja','Descripción de lo que significa un Baja','2',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(85,27,'Media','Descripción de lo que significa un Media','3',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(86,27,'Alta','Descripción de lo que significa un Alta','4',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(87,28,'Muy Baja','Descripción de lo que significa un Muy Baja','1',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(88,28,'Baja','Descripción de lo que significa un Baja','2',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(89,28,'Potente','Descripción de lo que significa un Potente','3',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri'),(90,28,'Muy potente','Descripción de lo que significa un Muy potente','4',1,'2025-09-07 16:20:12','pipe.echeverri','2025-09-07 16:20:12','pipe.echeverri');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

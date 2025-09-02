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

insert  into `auth_assignment`(`item_name`,`user_id`,`created_at`) values ('SuperAdministrador','1',1754683061);

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

insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('/*',2,NULL,NULL,NULL,1754682809,1754682809),('/admin/*',2,NULL,NULL,NULL,1754682806,1754682806),('/admin/assignment/*',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/assignment/assign',2,NULL,NULL,NULL,1754682800,1754682800),('/admin/assignment/index',2,NULL,NULL,NULL,1754682800,1754682800),('/admin/assignment/revoke',2,NULL,NULL,NULL,1754682800,1754682800),('/admin/assignment/view',2,NULL,NULL,NULL,1754682800,1754682800),('/admin/default/*',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/default/index',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/menu/*',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/menu/create',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/menu/delete',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/menu/index',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/menu/update',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/menu/view',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/permission/*',2,NULL,NULL,NULL,1754682802,1754682802),('/admin/permission/assign',2,NULL,NULL,NULL,1754682802,1754682802),('/admin/permission/create',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/permission/delete',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/permission/get-users',2,NULL,NULL,NULL,1754682802,1754682802),('/admin/permission/index',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/permission/remove',2,NULL,NULL,NULL,1754682802,1754682802),('/admin/permission/update',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/permission/view',2,NULL,NULL,NULL,1754682801,1754682801),('/admin/role/*',2,NULL,NULL,NULL,1754682803,1754682803),('/admin/role/assign',2,NULL,NULL,NULL,1754682802,1754682802),('/admin/role/create',2,NULL,NULL,NULL,1754682802,1754682802),('/admin/role/delete',2,NULL,NULL,NULL,1754682802,1754682802),('/admin/role/get-users',2,NULL,NULL,NULL,1754682802,1754682802),('/admin/role/index',2,NULL,NULL,NULL,1754682802,1754682802),('/admin/role/remove',2,NULL,NULL,NULL,1754682802,1754682802),('/admin/role/update',2,NULL,NULL,NULL,1754682802,1754682802),('/admin/role/view',2,NULL,NULL,NULL,1754682802,1754682802),('/admin/route/*',2,NULL,NULL,NULL,1754682803,1754682803),('/admin/route/assign',2,NULL,NULL,NULL,1754682803,1754682803),('/admin/route/create',2,NULL,NULL,NULL,1754682803,1754682803),('/admin/route/index',2,NULL,NULL,NULL,1754682803,1754682803),('/admin/route/refresh',2,NULL,NULL,NULL,1754682803,1754682803),('/admin/route/remove',2,NULL,NULL,NULL,1754682803,1754682803),('/admin/rule/*',2,NULL,NULL,NULL,1754682804,1754682804),('/admin/rule/create',2,NULL,NULL,NULL,1754682803,1754682803),('/admin/rule/delete',2,NULL,NULL,NULL,1754682804,1754682804),('/admin/rule/index',2,NULL,NULL,NULL,1754682803,1754682803),('/admin/rule/update',2,NULL,NULL,NULL,1754682803,1754682803),('/admin/rule/view',2,NULL,NULL,NULL,1754682803,1754682803),('/admin/user/*',2,NULL,NULL,NULL,1754682805,1754682805),('/admin/user/activate',2,NULL,NULL,NULL,1754682805,1754682805),('/admin/user/change-password',2,NULL,NULL,NULL,1754682805,1754682805),('/admin/user/delete',2,NULL,NULL,NULL,1754682804,1754682804),('/admin/user/index',2,NULL,NULL,NULL,1754682804,1754682804),('/admin/user/login',2,NULL,NULL,NULL,1754682805,1754682805),('/admin/user/logout',2,NULL,NULL,NULL,1754682805,1754682805),('/admin/user/request-password-reset',2,NULL,NULL,NULL,1754682805,1754682805),('/admin/user/reset-password',2,NULL,NULL,NULL,1754682805,1754682805),('/admin/user/signup',2,NULL,NULL,NULL,1754682805,1754682805),('/admin/user/view',2,NULL,NULL,NULL,1754682804,1754682804),('/categories/*',2,NULL,NULL,NULL,1756778063,1756778063),('/categories/create',2,NULL,NULL,NULL,1756778063,1756778063),('/categories/delete',2,NULL,NULL,NULL,1756778063,1756778063),('/categories/index',2,NULL,NULL,NULL,1756778062,1756778062),('/categories/update',2,NULL,NULL,NULL,1756778063,1756778063),('/categories/view',2,NULL,NULL,NULL,1756778063,1756778063),('/debug/*',2,NULL,NULL,NULL,1754682807,1754682807),('/debug/default/*',2,NULL,NULL,NULL,1754682806,1754682806),('/debug/default/db-explain',2,NULL,NULL,NULL,1754682806,1754682806),('/debug/default/download-mail',2,NULL,NULL,NULL,1754682806,1754682806),('/debug/default/index',2,NULL,NULL,NULL,1754682806,1754682806),('/debug/default/toolbar',2,NULL,NULL,NULL,1754682806,1754682806),('/debug/default/view',2,NULL,NULL,NULL,1754682806,1754682806),('/debug/user/*',2,NULL,NULL,NULL,1754682807,1754682807),('/debug/user/reset-identity',2,NULL,NULL,NULL,1754682807,1754682807),('/debug/user/set-identity',2,NULL,NULL,NULL,1754682807,1754682807),('/equines/*',2,NULL,NULL,NULL,1756759712,1756759712),('/equines/create',2,NULL,NULL,NULL,1756759712,1756759712),('/equines/delete',2,NULL,NULL,NULL,1756759712,1756759712),('/equines/index',2,NULL,NULL,NULL,1756759711,1756759711),('/equines/update',2,NULL,NULL,NULL,1756759712,1756759712),('/equines/view',2,NULL,NULL,NULL,1756759712,1756759712),('/gaits/*',2,NULL,NULL,NULL,1756757154,1756757154),('/gaits/create',2,NULL,NULL,NULL,1756757154,1756757154),('/gaits/delete',2,NULL,NULL,NULL,1756757154,1756757154),('/gaits/index',2,NULL,NULL,NULL,1756757154,1756757154),('/gaits/update',2,NULL,NULL,NULL,1756757154,1756757154),('/gaits/view',2,NULL,NULL,NULL,1756757154,1756757154),('/gii/*',2,NULL,NULL,NULL,1754682807,1754682807),('/gii/default/*',2,NULL,NULL,NULL,1754682807,1754682807),('/gii/default/action',2,NULL,NULL,NULL,1754682807,1754682807),('/gii/default/diff',2,NULL,NULL,NULL,1754682807,1754682807),('/gii/default/index',2,NULL,NULL,NULL,1754682807,1754682807),('/gii/default/preview',2,NULL,NULL,NULL,1754682807,1754682807),('/gii/default/view',2,NULL,NULL,NULL,1754682807,1754682807),('/site/*',2,NULL,NULL,NULL,1754682809,1754682809),('/site/about',2,NULL,NULL,NULL,1754682808,1754682808),('/site/captcha',2,NULL,NULL,NULL,1754682808,1754682808),('/site/contact',2,NULL,NULL,NULL,1754682808,1754682808),('/site/error',2,NULL,NULL,NULL,1754682808,1754682808),('/site/index',2,NULL,NULL,NULL,1754682808,1754682808),('/site/login',2,NULL,NULL,NULL,1754682808,1754682808),('/site/logout',2,NULL,NULL,NULL,1754682808,1754682808),('/subcategories/*',2,NULL,NULL,NULL,1756778063,1756778063),('/subcategories/create',2,NULL,NULL,NULL,1756778063,1756778063),('/subcategories/delete',2,NULL,NULL,NULL,1756778063,1756778063),('/subcategories/index',2,NULL,NULL,NULL,1756778063,1756778063),('/subcategories/update',2,NULL,NULL,NULL,1756778063,1756778063),('/subcategories/view',2,NULL,NULL,NULL,1756778063,1756778063),('/users/*',2,NULL,NULL,NULL,1754682809,1754682809),('/users/create',2,NULL,NULL,NULL,1754682809,1754682809),('/users/delete',2,NULL,NULL,NULL,1754682809,1754682809),('/users/index',2,NULL,NULL,NULL,1754682809,1754682809),('/users/update',2,NULL,NULL,NULL,1754682809,1754682809),('/users/view',2,NULL,NULL,NULL,1754682809,1754682809),('/variables/*',2,NULL,NULL,NULL,1756778063,1756778063),('/variables/create',2,NULL,NULL,NULL,1756778063,1756778063),('/variables/delete',2,NULL,NULL,NULL,1756778063,1756778063),('/variables/index',2,NULL,NULL,NULL,1756778063,1756778063),('/variables/update',2,NULL,NULL,NULL,1756778063,1756778063),('/variables/view',2,NULL,NULL,NULL,1756778063,1756778063),('fullPermission',2,'Todos los permisos asignados',NULL,NULL,1754682984,1754682984),('SuperAdministrador',1,'Super Administrador con acceso a todas las rutas',NULL,NULL,1754682958,1754682958);

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

insert  into `auth_item_child`(`parent`,`child`) values ('fullPermission','/*'),('fullPermission','/admin/*'),('fullPermission','/admin/assignment/*'),('fullPermission','/admin/assignment/assign'),('fullPermission','/admin/assignment/index'),('fullPermission','/admin/assignment/revoke'),('fullPermission','/admin/assignment/view'),('fullPermission','/admin/default/*'),('fullPermission','/admin/default/index'),('fullPermission','/admin/menu/*'),('fullPermission','/admin/menu/create'),('fullPermission','/admin/menu/delete'),('fullPermission','/admin/menu/index'),('fullPermission','/admin/menu/update'),('fullPermission','/admin/menu/view'),('fullPermission','/admin/permission/*'),('fullPermission','/admin/permission/assign'),('fullPermission','/admin/permission/create'),('fullPermission','/admin/permission/delete'),('fullPermission','/admin/permission/get-users'),('fullPermission','/admin/permission/index'),('fullPermission','/admin/permission/remove'),('fullPermission','/admin/permission/update'),('fullPermission','/admin/permission/view'),('fullPermission','/admin/role/*'),('fullPermission','/admin/role/assign'),('fullPermission','/admin/role/create'),('fullPermission','/admin/role/delete'),('fullPermission','/admin/role/get-users'),('fullPermission','/admin/role/index'),('fullPermission','/admin/role/remove'),('fullPermission','/admin/role/update'),('fullPermission','/admin/role/view'),('fullPermission','/admin/route/*'),('fullPermission','/admin/route/assign'),('fullPermission','/admin/route/create'),('fullPermission','/admin/route/index'),('fullPermission','/admin/route/refresh'),('fullPermission','/admin/route/remove'),('fullPermission','/admin/rule/*'),('fullPermission','/admin/rule/create'),('fullPermission','/admin/rule/delete'),('fullPermission','/admin/rule/index'),('fullPermission','/admin/rule/update'),('fullPermission','/admin/rule/view'),('fullPermission','/admin/user/*'),('fullPermission','/admin/user/activate'),('fullPermission','/admin/user/change-password'),('fullPermission','/admin/user/delete'),('fullPermission','/admin/user/index'),('fullPermission','/admin/user/login'),('fullPermission','/admin/user/logout'),('fullPermission','/admin/user/request-password-reset'),('fullPermission','/admin/user/reset-password'),('fullPermission','/admin/user/signup'),('fullPermission','/admin/user/view'),('fullPermission','/debug/*'),('fullPermission','/debug/default/*'),('fullPermission','/debug/default/db-explain'),('fullPermission','/debug/default/download-mail'),('fullPermission','/debug/default/index'),('fullPermission','/debug/default/toolbar'),('fullPermission','/debug/default/view'),('fullPermission','/debug/user/*'),('fullPermission','/debug/user/reset-identity'),('fullPermission','/debug/user/set-identity'),('fullPermission','/gii/*'),('fullPermission','/gii/default/*'),('fullPermission','/gii/default/action'),('fullPermission','/gii/default/diff'),('fullPermission','/gii/default/index'),('fullPermission','/gii/default/preview'),('fullPermission','/gii/default/view'),('fullPermission','/site/*'),('fullPermission','/site/about'),('fullPermission','/site/captcha'),('fullPermission','/site/contact'),('fullPermission','/site/error'),('fullPermission','/site/index'),('fullPermission','/site/login'),('fullPermission','/site/logout'),('fullPermission','/users/*'),('fullPermission','/users/create'),('fullPermission','/users/delete'),('fullPermission','/users/index'),('fullPermission','/users/update'),('fullPermission','/users/view'),('SuperAdministrador','fullPermission');

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
  `created` datetime NOT NULL COMMENT 'Creado',
  `created_by` varchar(50) NOT NULL COMMENT 'Creado por',
  `modified` datetime NOT NULL COMMENT 'Modificado',
  `modified_by` varchar(50) NOT NULL COMMENT 'Modificado por',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de categorías de caballos';

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`,`description`,`active`,`created`,`created_by`,`modified`,`modified_by`) values (1,'Geometría','Descripción de la categoría Geometría',1,'2025-09-01 21:02:57','pipe.echeverri','2025-09-01 21:03:07','pipe.echeverri');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `equine_variable_values` */

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `equines` */

insert  into `equines`(`id`,`gait_id`,`name`,`gender`,`age`,`location`,`color`,`stud_farm`,`vet`,`colletion_days`,`about_me`,`history`,`image_ppal`,`images`,`owner`,`active`,`created`,`created_by`,`modified`,`modified_by`) values (1,4,'Rastastas','Macho',2,'google.map','Marrón','Criadero Equinetics','Felipe Jaramillo, 3134566778','Todos los primeros dias del mes',' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dignissim, augue sit amet ullamcorper porttitor, nulla mi rhoncus sapien, vel malesuada arcu mauris non orci. Donec convallis tempus suscipit. Phasellus porta tristique tortor. Fusce dui felis, semper in hendrerit eu, luctus vel mi. Maecenas vel nulla nec orci tincidunt rhoncus id non libero. Curabitur eu posuere sem. Aliquam lacus dui, ultricies at semper in, dictum sed nisi. Suspendisse eget ipsum consequat, mattis ipsum vitae, sollicitudin ligula. Etiam vitae nisi ac est ornare imperdiet quis sed lorem. Aenean urna diam, sagittis ac imperdiet eget, mollis ac ex. Integer facilisis sollicitudin pulvinar. Duis et neque fringilla, condimentum nisl non, convallis metus. Curabitur eget ornare odio. Curabitur ut gravida velit, vitae viverra orci. Nullam vel accumsan odio, at vestibulum est.\r\n\r\nPraesent efficitur malesuada vulputate. Sed eu maximus arcu. Integer sodales sagittis justo, congue rhoncus mauris pulvinar quis. Aliquam erat volutpat. Aliquam hendrerit eu nulla eget maximus. Suspendisse feugiat nibh augue, pretium gravida felis ultrices in. Nullam nulla ante, feugiat in turpis eu, sollicitudin fermentum nulla. Nullam condimentum semper pretium. Quisque purus eros, rhoncus elementum molestie gravida, consectetur a libero. Quisque facilisis, justo vel laoreet gravida, massa massa molestie tortor, nec laoreet libero velit in risus. Praesent vitae faucibus nulla, sit amet rhoncus lorem. Curabitur consequat, diam vel feugiat feugiat, velit quam egestas orci, vitae tristique elit enim accumsan augue. Cras pellentesque tempus mauris vitae volutpat. Nunc malesuada mi sed suscipit dapibus. ',' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dignissim, augue sit amet ullamcorper porttitor, nulla mi rhoncus sapien, vel malesuada arcu mauris non orci. Donec convallis tempus suscipit. Phasellus porta tristique tortor. Fusce dui felis, semper in hendrerit eu, luctus vel mi. Maecenas vel nulla nec orci tincidunt rhoncus id non libero. Curabitur eu posuere sem. Aliquam lacus dui, ultricies at semper in, dictum sed nisi. Suspendisse eget ipsum consequat, mattis ipsum vitae, sollicitudin ligula. Etiam vitae nisi ac est ornare imperdiet quis sed lorem. Aenean urna diam, sagittis ac imperdiet eget, mollis ac ex. Integer facilisis sollicitudin pulvinar. Duis et neque fringilla, condimentum nisl non, convallis metus. Curabitur eget ornare odio. Curabitur ut gravida velit, vitae viverra orci. Nullam vel accumsan odio, at vestibulum est.\r\n\r\nPraesent efficitur malesuada vulputate. Sed eu maximus arcu. Integer sodales sagittis justo, congue rhoncus mauris pulvinar quis. Aliquam erat volutpat. Aliquam hendrerit eu nulla eget maximus. Suspendisse feugiat nibh augue, pretium gravida felis ultrices in. Nullam nulla ante, feugiat in turpis eu, sollicitudin fermentum nulla. Nullam condimentum semper pretium. Quisque purus eros, rhoncus elementum molestie gravida, consectetur a libero. Quisque facilisis, justo vel laoreet gravida, massa massa molestie tortor, nec laoreet libero velit in risus. Praesent vitae faucibus nulla, sit amet rhoncus lorem. Curabitur consequat, diam vel feugiat feugiat, velit quam egestas orci, vitae tristique elit enim accumsan augue. Cras pellentesque tempus mauris vitae volutpat. Nunc malesuada mi sed suscipit dapibus. ','rastastas250902120714.jpg',NULL,'Juan Perez',0,'2025-09-01 16:24:49','pipe.echeverri','2025-09-01 19:10:38','pipe.echeverri'),(2,1,'Reina de paz','Hembra',1,NULL,'blanco',NULL,NULL,NULL,' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dignissim, augue sit amet ullamcorper porttitor, nulla mi rhoncus sapien, vel malesuada arcu mauris non orci. Donec convallis tempus suscipit. Phasellus porta tristique tortor. Fusce dui felis, semper in hendrerit eu, luctus vel mi. Maecenas vel nulla nec orci tincidunt rhoncus id non libero. Curabitur eu posuere sem. Aliquam lacus dui, ultricies at semper in, dictum sed nisi. Suspendisse eget ipsum consequat, mattis ipsum vitae, sollicitudin ligula. Etiam vitae nisi ac est ornare imperdiet quis sed lorem. Aenean urna diam, sagittis ac imperdiet eget, mollis ac ex. Integer facilisis sollicitudin pulvinar. Duis et neque fringilla, condimentum nisl non, convallis metus. Curabitur eget ornare odio. Curabitur ut gravida velit, vitae viverra orci. Nullam vel accumsan odio, at vestibulum est.\r\n\r\nPraesent efficitur malesuada vulputate. Sed eu maximus arcu. Integer sodales sagittis justo, congue rhoncus mauris pulvinar quis. Aliquam erat volutpat. Aliquam hendrerit eu nulla eget maximus. Suspendisse feugiat nibh augue, pretium gravida felis ultrices in. Nullam nulla ante, feugiat in turpis eu, sollicitudin fermentum nulla. Nullam condimentum semper pretium. Quisque purus eros, rhoncus elementum molestie gravida, consectetur a libero. Quisque facilisis, justo vel laoreet gravida, massa massa molestie tortor, nec laoreet libero velit in risus. Praesent vitae faucibus nulla, sit amet rhoncus lorem.',' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dignissim, augue sit amet ullamcorper porttitor, nulla mi rhoncus sapien, vel malesuada arcu mauris non orci. Donec convallis tempus suscipit. Phasellus porta tristique tortor. Fusce dui felis, semper in hendrerit eu, luctus vel mi. Maecenas vel nulla nec orci tincidunt rhoncus id non libero. Curabitur eu posuere sem. Aliquam lacus dui, ultricies at semper in, dictum sed nisi. Suspendisse eget ipsum consequat, mattis ipsum vitae, sollicitudin ligula. Etiam vitae nisi ac est ornare imperdiet quis sed lorem. Aenean urna diam, sagittis ac imperdiet eget, mollis ac ex. Integer facilisis sollicitudin pulvinar. Duis et neque fringilla, condimentum nisl non, convallis metus. Curabitur eget ornare odio. Curabitur ut gravida velit, vitae viverra orci. Nullam vel accumsan odio, at vestibulum est.\r\n\r\nPraesent efficitur malesuada vulputate. Sed eu maximus arcu. Integer sodales sagittis justo, congue rhoncus mauris pulvinar quis. Aliquam erat volutpat. Aliquam hendrerit eu nulla eget maximus. Suspendisse feugiat nibh augue, pretium gravida felis ultrices in. Nullam nulla ante, feugiat in turpis eu, sollicitudin fermentum nulla. Nullam condimentum semper pretium. Quisque purus eros, rhoncus elementum molestie gravida, consectetur a libero. Quisque facilisis, justo vel laoreet gravida, massa massa molestie tortor, nec laoreet libero velit in risus. Praesent vitae faucibus nulla, sit amet rhoncus lorem.','reina-de-paz250902121510.jpg',NULL,NULL,1,'2025-09-01 19:15:10','pipe.echeverri','2025-09-01 19:15:10','pipe.echeverri');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

/*Data for the table `menu` */

insert  into `menu`(`id`,`name`,`parent`,`route`,`order`,`data`) values (1,'Configuración',NULL,NULL,2,'fas fa-tools'),(2,'Roles y accesos',1,'/admin/assignment/index',NULL,'fas fa-user-check'),(3,'Usuarios',1,'/users/index',NULL,'fas fa-users'),(4,'Administración',NULL,NULL,1,'fas fa-toggle-on'),(5,'Marchas',4,'/gaits/index',5,'fas fa-horse'),(6,'Ejemplares',4,'/equines/index',1,'fas fa-horse'),(7,'Categorías',4,'/categories/index',2,'fas fa-list'),(8,'Subcategorías',4,'/subcategories/index',3,'fas fa-list'),(9,'Variables',4,'/variables/index',4,'fas fa-toggle-on');

/*Table structure for table `migration` */

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `migration` */

insert  into `migration`(`version`,`apply_time`) values ('m000000_000000_base',1754679593),('m140602_111327_create_menu_table',1754679599),('m160312_050000_create_user',1754679600),('m140506_102106_rbac_init',1754679626),('m170907_052038_rbac_add_index_on_auth_assignment_user_id',1754679626),('m180523_151638_rbac_updates_indexes_without_prefix',1754679627),('m200409_110543_rbac_update_mssql_trigger',1754679627);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `subcategories` */

insert  into `subcategories`(`id`,`category_id`,`name`,`description`,`active`,`created`,`created_by`,`modified`,`modified_by`) values (1,1,'Figura','Descripción de la subcategoría Figura',1,'2025-09-01 21:07:58','pipe.echeverri','2025-09-01 21:08:43','pipe.echeverri');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`username`,`password`,`email`,`active`,`created`,`created_by`,`modified`,`modified_by`) values (1,'Felipe Echeverri','pipe.echeverri','118d2b3c46e89edfd7d28c4f865ef9ae','pipe.echeverri.1@gmail.com',1,'2025-08-08 00:00:00','admin','2025-08-08 00:00:00','admin');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `variables` */

insert  into `variables`(`id`,`subcategory_id`,`name`,`description`,`value`,`active`,`created`,`created_by`,`modified`,`modified_by`) values (1,1,'Cuadrada','Descripcion de figura Cuadrada','1',1,'2025-09-01 21:12:25','pipe.echeverri','2025-09-01 21:12:40','pipe.echeverri'),(2,1,'Proporcional','Descripción de figura Proporcional','2',1,'2025-09-01 21:13:02','pipe.echeverri','2025-09-01 21:13:02','pipe.echeverri'),(3,1,'Rectangular','Descripción de la figura Rectangular','3',1,'2025-09-01 21:13:26','pipe.echeverri','2025-09-01 21:13:26','pipe.echeverri');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

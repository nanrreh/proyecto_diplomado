/*
SQLyog Community
MySQL - 5.7.31 : Database - diplomado_web
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`diplomado_web` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `empleados` */

DROP TABLE IF EXISTS `empleados`;

CREATE TABLE `empleados` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(55) NOT NULL,
  `apellidos` varchar(55) NOT NULL,
  `documento` int(11) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `cargo_id` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `cargo_id` (`cargo_id`),
  CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`cargo_id`) REFERENCES `tipo_cargo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `empleados` */

insert  into `empleados`(`id_usuario`,`nombres`,`apellidos`,`documento`,`fecha_nacimiento`,`cargo_id`) values 
(4,'Hernan','Seco',213123,'2023-08-16',2),
(10,'Laura','Rojas',213213213,'2023-08-15',3);

/*Table structure for table `recoleccion` */

DROP TABLE IF EXISTS `recoleccion`;

CREATE TABLE `recoleccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `cantidad_fruta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `encargado_id` int(11) DEFAULT NULL,
  `valvula_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `encargado_id` (`encargado_id`),
  KEY `valvula_id` (`valvula_id`),
  CONSTRAINT `recoleccion_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `empleados` (`id_usuario`),
  CONSTRAINT `recoleccion_ibfk_2` FOREIGN KEY (`encargado_id`) REFERENCES `empleados` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `recoleccion` */

insert  into `recoleccion`(`id`,`usuario_id`,`cantidad_fruta`,`fecha`,`encargado_id`,`valvula_id`) values 
(1,4,23,'2023-08-15',10,1);

/*Table structure for table `tipo_cargo` */

DROP TABLE IF EXISTS `tipo_cargo`;

CREATE TABLE `tipo_cargo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cargo` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tipo_cargo` */

insert  into `tipo_cargo`(`id`,`nombre_cargo`) values 
(2,'Empleado'),
(3,'Lider de equipo');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(55) DEFAULT NULL,
  `password` varchar(555) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`username`,`password`) values 
(1,'nan','123456');

/*Table structure for table `valvulas` */

DROP TABLE IF EXISTS `valvulas`;

CREATE TABLE `valvulas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(55) DEFAULT NULL,
  `estado` varchar(55) DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `valvulas` */

insert  into `valvulas`(`id`,`nombre`,`estado`,`comentario`) values 
(1,'válvula 1','En recolección','Esta en crecimiento se mejoro despues de la fumigacion'),
(18,'válvula 2','En recolección','Esta en crecimiento se mejoro despues de la fumigacion');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

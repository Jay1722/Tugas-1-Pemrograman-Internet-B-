/*
SQLyog Community v13.3.0 (64 bit)
MySQL - 10.4.32-MariaDB : Database - kampus
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kampus` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `kampus`;

/*Table structure for table `mahasiswa` */

DROP TABLE IF EXISTS `mahasiswa`;

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `mahasiswa` */

insert  into `mahasiswa`(`id`,`nim`,`nama`,`prodi`) values 
(2,'2405551150','Jason Adriel Gerard Abidano','Teknologi Informasi'),
(4,'2405551089','I Nyoman Restu Dharmayasa','Teknologi Informasi'),
(5,'2405551053','Ida Bagus Dio Gloria','Teknologi Informasi'),
(6,'2405551106','Anak Agung Gede Wisnu Mahadiva','Teknologi Informasi'),
(7,'2405551039','Najwa Tahir','Teknologi Informasi');

/*Table structure for table `nilai` */

DROP TABLE IF EXISTS `nilai`;

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mahasiswa_id` int(11) NOT NULL,
  `mata_kuliah` varchar(50) NOT NULL,
  `sks` tinyint(4) NOT NULL,
  `nilai_huruf` enum('A','B','C','D','E') NOT NULL,
  `nilai_angka` decimal(3,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mahasiswa_id` (`mahasiswa_id`),
  CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `nilai` */

insert  into `nilai`(`id`,`mahasiswa_id`,`mata_kuliah`,`sks`,`nilai_huruf`,`nilai_angka`) values 
(4,5,'Genshin Impact',6,'A',4.00),
(5,4,'Honkai Star Rail',6,'A',4.00),
(6,2,'Valorant',6,'C',2.00),
(7,2,'Raft',6,'A',4.00),
(8,2,'Dead By Daylight',6,'B',3.00),
(9,2,'R.E.P.O.',6,'A',4.00),
(10,4,'Valorant',6,'C',2.00),
(11,4,'R.E.P.O.',6,'A',4.00),
(12,4,'Raft',6,'A',4.00),
(13,5,'Valorant',6,'C',2.00),
(14,5,'Raft',6,'B',3.00),
(15,5,'R.E.P.O.',6,'A',4.00),
(16,6,'Valorant',6,'A',4.00),
(17,6,'Raft',6,'A',4.00),
(18,6,'R.E.P.O.',6,'A',4.00);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

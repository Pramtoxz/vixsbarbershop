/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 8.0.30 : Database - dbfadly
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbfadly` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `dbfadly`;

/*Table structure for table `booking` */

DROP TABLE IF EXISTS `booking`;

CREATE TABLE `booking` (
  `kdbooking` char(20) COLLATE utf8mb4_general_ci NOT NULL,
  `idpelanggan` char(20) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `jenispembayaran` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jumlahbayar` double NOT NULL DEFAULT '0',
  `total` char(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idkaryawan` char(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_booking` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  PRIMARY KEY (`kdbooking`),
  KEY `booking_idpelanggan_foreign` (`idpelanggan`),
  KEY `booking_idkaryawan_foreign` (`idkaryawan`),
  CONSTRAINT `booking_idkaryawan_foreign` FOREIGN KEY (`idkaryawan`) REFERENCES `karyawan` (`idkaryawan`) ON DELETE CASCADE ON UPDATE SET NULL,
  CONSTRAINT `booking_idpelanggan_foreign` FOREIGN KEY (`idpelanggan`) REFERENCES `pelanggan` (`idpelanggan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `booking` */

/*Table structure for table `detail_booking` */

DROP TABLE IF EXISTS `detail_booking`;

CREATE TABLE `detail_booking` (
  `iddetail` char(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `kdbooking` char(20) COLLATE utf8mb4_general_ci NOT NULL,
  `kdpaket` char(25) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_paket` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `harga` double NOT NULL DEFAULT '0',
  `jamstart` time NOT NULL,
  `jamend` time NOT NULL,
  `status` enum('1','2','3','4') COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1',
  `idkaryawan` char(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`iddetail`),
  KEY `detail_booking_kdbooking_foreign` (`kdbooking`),
  KEY `detail_booking_kdpaket_foreign` (`kdpaket`),
  KEY `detail_booking_idkaryawan_foreign` (`idkaryawan`),
  CONSTRAINT `detail_booking_idkaryawan_foreign` FOREIGN KEY (`idkaryawan`) REFERENCES `karyawan` (`idkaryawan`) ON DELETE CASCADE ON UPDATE SET NULL,
  CONSTRAINT `detail_booking_kdbooking_foreign` FOREIGN KEY (`kdbooking`) REFERENCES `booking` (`kdbooking`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_booking_kdpaket_foreign` FOREIGN KEY (`kdpaket`) REFERENCES `paket` (`idpaket`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `detail_booking` */

/*Table structure for table `galeri` */

DROP TABLE IF EXISTS `galeri`;

CREATE TABLE `galeri` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `galeri` */

insert  into `galeri`(`id`,`nama`,`gambar`) values 
(1,'Fadli Ganteng 123','1756063461_5ded31bd052b53e884a7.png');

/*Table structure for table `karyawan` */

DROP TABLE IF EXISTS `karyawan`;

CREATE TABLE `karyawan` (
  `idkaryawan` char(10) COLLATE utf8mb4_general_ci NOT NULL,
  `namakaryawan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jenkel` enum('L','P') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_general_ci,
  `nohp` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `status` enum('aktif','nonaktif') COLLATE utf8mb4_general_ci DEFAULT 'aktif',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idkaryawan`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `karyawan` */

insert  into `karyawan`(`idkaryawan`,`namakaryawan`,`jenkel`,`alamat`,`nohp`,`user_id`,`status`,`created_at`,`updated_at`) values 
('BRM0001','Fadly Aja','L','Jakarta','12345678',42,'aktif','2025-06-27 22:27:57','2025-06-28 00:30:49'),
('BRM0002','Fadly Doang','L','Padang','123456789',NULL,'aktif','2025-06-27 22:28:29','2025-07-09 21:50:24'),
('BRM0003','Fadly Terakhir','P','Padang','987252525',NULL,'aktif','2025-06-27 22:28:52','2025-07-09 21:52:55');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `migrations` */

/*Table structure for table `notifications` */

DROP TABLE IF EXISTS `notifications`;

CREATE TABLE `notifications` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'jenis notifikasi: booking_baru, pembayaran, dll',
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `message` text COLLATE utf8mb4_general_ci,
  `reference_id` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'kdbooking, idfaktur, atau ID lain yang terkait',
  `idpelanggan` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'ID pelanggan yang terkait dengan notifikasi',
  `is_read` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=unread, 1=read',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idpelanggan` (`idpelanggan`),
  KEY `is_read` (`is_read`),
  KEY `notifications_ibfk_2` (`reference_id`),
  CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`idpelanggan`) REFERENCES `pelanggan` (`idpelanggan`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`reference_id`) REFERENCES `booking` (`kdbooking`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `notifications` */

insert  into `notifications`(`id`,`type`,`title`,`message`,`reference_id`,`idpelanggan`,`is_read`,`created_at`,`updated_at`) values 
(94,'booking_baru','Booking Baru','Booking baru oleh pramtoxz dengan kode BK-20250827-0001',NULL,NULL,0,'2025-08-27 03:05:35','2025-08-27 03:05:35');

/*Table structure for table `otp` */

DROP TABLE IF EXISTS `otp`;

CREATE TABLE `otp` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned DEFAULT NULL,
  `otp_code` varchar(6) COLLATE utf8mb4_general_ci NOT NULL,
  `type` enum('registration','reset_password') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'registration',
  `expired_at` datetime NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `otp_user_id_foreign` (`user_id`),
  CONSTRAINT `otp_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `otp` */

/*Table structure for table `paket` */

DROP TABLE IF EXISTS `paket`;

CREATE TABLE `paket` (
  `idpaket` char(10) COLLATE utf8mb4_general_ci NOT NULL,
  `namapaket` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci,
  `harga` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `durasi` int DEFAULT NULL,
  PRIMARY KEY (`idpaket`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `paket` */

insert  into `paket`(`idpaket`,`namapaket`,`deskripsi`,`harga`,`image`,`created_at`,`updated_at`,`durasi`) values 
('PKT001','PAKET 1','Haircut dan styling',100000.00,'1750901679_01da38e4f32d39cabf7d.jpg','2025-05-14 17:57:47','2025-07-09 23:34:31',30),
('PKT002','PAKET 2','Haircut, head massage dan styling',100000.00,'1750901704_4176aaf4e47f66a97bae.jpg','2025-05-14 17:57:47','2025-07-09 23:42:17',40),
('PKT003','PAKET 3','Haircut, head massage, shaving dan styling',200000.00,'1750901679_01da38e4f32d39cabf7d.jpg','2025-05-14 17:57:47','2025-07-09 23:40:01',60),
('PKT004','PAKET 4','Mencukur kumis, jenggot atau bulu halus di area wajah',150000.00,'1750901679_01da38e4f32d39cabf7d.jpg','2025-07-06 21:04:44','2025-08-05 16:07:12',15),
('PKT005','PAKET 5','Pewarnaan rambut secara profesional dengan pilihan warna yang di ingin kan',300000.00,'1750901679_01da38e4f32d39cabf7d.jpg','2025-07-09 21:41:26','2025-08-05 16:11:09',120),
('PKT006','PAKET 6','Mewarnai rambut dengan warna yang lebih terang dari warna asli rambut',250000.00,'1750901679_01da38e4f32d39cabf7d.jpg','2025-07-09 23:33:57','2025-08-05 16:07:52',120);

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned DEFAULT NULL,
  `idpelanggan` char(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jeniskelamin` enum('Laki-laki','Perempuan','-') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_general_ci,
  `no_hp` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idpelanggan` (`idpelanggan`),
  KEY `pelanggan_user_id_foreign` (`user_id`),
  CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pelanggan` */

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `fakturbooking` char(20) COLLATE utf8mb4_general_ci NOT NULL,
  `total_bayar` double NOT NULL DEFAULT '0',
  `grandtotal` double NOT NULL DEFAULT '0',
  `metode` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'cash',
  `status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'paid',
  `jenis` varchar(20) COLLATE utf8mb4_general_ci DEFAULT 'Lunas',
  `bukti` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pembayaran_fakturbooking_foreign` (`fakturbooking`),
  CONSTRAINT `pembayaran_fakturbooking_foreign` FOREIGN KEY (`fakturbooking`) REFERENCES `booking` (`kdbooking`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pembayaran` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'admin, user, dll',
  `status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'active' COMMENT 'active, inactive',
  `last_login` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`email`,`password`,`name`,`role`,`status`,`last_login`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'admin','admin@gmail.com','$2y$10$q0diYPnm5cBnu664cMMd9ulmEgjW6hUZA2gILBEWA56OGygYVpW86','Administrator','admin','active','2025-08-27 02:58:14',NULL,'2025-06-19 09:29:55','2025-08-27 02:58:14',NULL),
(2,'Pimpinan','pimpinan@gmail.com','$2y$10$q0diYPnm5cBnu664cMMd9ulmEgjW6hUZA2gILBEWA56OGygYVpW86','Pimpinan','pimpinan','active','2025-08-14 14:37:26',NULL,'2025-06-27 22:25:42','2025-08-14 14:37:26',NULL),
(42,'barberman1','barberman1@gmail.com','$2y$10$q0diYPnm5cBnu664cMMd9ulmEgjW6hUZA2gILBEWA56OGygYVpW86','barberman1','karyawan','active','2025-08-25 02:40:31',NULL,'2025-08-05 16:50:03','2025-08-25 02:40:31',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

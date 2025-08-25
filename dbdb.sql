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

insert  into `booking`(`kdbooking`,`idpelanggan`,`status`,`jenispembayaran`,`jumlahbayar`,`total`,`idkaryawan`,`tanggal_booking`,`created_at`,`updated_at`,`expired_at`) values 
('BK-20250715-0001','PLG0001','completed','Lunas',350000,'350000','KRY0001','2025-08-25','2025-07-15 15:14:53','2025-07-15 15:18:25','2025-07-15 15:19:52'),
('BK-20250715-0002','PLG0002','completed','Lunas',70000,'70000','KRY0001','2025-08-25','2025-07-15 15:33:06','2025-07-15 15:35:02','2025-07-15 15:38:06'),
('BK-20250717-0001','PLG0001','completed','Lunas',100000,'100000','KRY0001','2025-08-25','2025-07-17 13:14:23','2025-07-17 16:43:50','2025-07-17 13:19:23'),
('BK-20250806-0001','PLG0004','completed','Lunas',50000,'50000','KRY0001','2025-08-25','2025-08-06 18:47:02','2025-08-22 19:42:28','2025-08-06 18:52:02'),
('BK-20250806-0002','PLG0004','completed','Lunas',300000,'300000','KRY0002','2025-08-25','2025-08-06 18:53:54','2025-08-22 19:42:06','2025-08-06 18:58:54'),
('BK-20250807-0001','PLG0006','completed','Lunas',300000,'300000','KRY0002','2025-08-25','2025-08-07 17:36:31','2025-08-22 19:41:55','2025-08-07 17:41:31');

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

insert  into `detail_booking`(`iddetail`,`tgl`,`kdbooking`,`kdpaket`,`nama_paket`,`deskripsi`,`harga`,`jamstart`,`jamend`,`status`,`idkaryawan`,`created_at`,`updated_at`) values 
('DTL-20250715-0001','2025-08-25','BK-20250715-0001','PKT001','Basic Haircut','Haircut dan styling',50000,'16:00:00','16:30:00','2','KRY0001','2025-07-15 15:14:53','2025-07-15 15:15:52'),
('DTL-20250715-0002','2025-08-25','BK-20250715-0001','PKT005','Hair Color','Pewarnaan rambut secara profesional dengan pilihan warna yang di ingin kan',300000,'16:30:00','18:30:00','2','KRY0001','2025-07-15 15:14:53','2025-07-15 15:15:52'),
('DTL-20250715-0003','2025-08-25','BK-20250715-0002','PKT002','Premium Package','Haircut, head massage dan styling',70000,'16:00:00','16:40:00','2','KRY0003','2025-07-15 15:33:06','2025-07-15 15:33:43'),
('DTL-20250717-0001','2025-08-25','BK-20250717-0001','PKT003','Complete Treatment','Haircut, head massage, shaving dan styling',100000,'14:00:00','15:00:00','2','KRY0003','2025-07-17 13:14:23','2025-07-17 13:14:41'),
('DTL-20250806-0001','2025-08-25','BK-20250806-0001','PKT001','Basic Haircut','Haircut dan styling',50000,'14:00:00','14:30:00','2','KRY0001','2025-08-06 18:47:02','2025-08-06 18:51:37'),
('DTL-20250806-0002','2025-08-25','BK-20250806-0002','PKT005','Hair Color','Pewarnaan rambut secara profesional dengan pilihan warna yang di ingin kan',300000,'14:00:00','16:00:00','2','KRY0002','2025-08-06 18:53:54','2025-08-06 18:54:57'),
('DTL-20250807-0001','2025-08-25','BK-20250807-0001','PKT005','Hair Color','Pewarnaan rambut secara profesional dengan pilihan warna yang di ingin kan',300000,'18:00:00','20:00:00','2','KRY0002','2025-08-07 17:36:31','2025-08-07 17:37:07');

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
('KRY0001','Fahri Ahmad','L','Indarung','081234321290',42,'aktif','2025-06-27 22:27:57','2025-06-28 00:30:49'),
('KRY0002','Yura Khalid','L','Andalas','089563467809',NULL,'aktif','2025-06-27 22:28:29','2025-07-09 21:50:24'),
('KRY0003','Riyol Marvi','L','Gadut','082156098901',NULL,'aktif','2025-06-27 22:28:52','2025-07-09 21:52:55');

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

insert  into `migrations`(`id`,`version`,`class`,`group`,`namespace`,`time`,`batch`) values 
(1,'2025-05-14-175340','App\\Database\\Migrations\\CreateUsersTable','default','App',1747245454,1),
(2,'2025-05-14-175341','App\\Database\\Migrations\\CreateKaryawanTable','default','App',1747245454,1),
(3,'2025-05-14-175342','App\\Database\\Migrations\\CreatePelangganTable','default','App',1747245454,1),
(4,'2025-05-14-175343','App\\Database\\Migrations\\CreatePaketTable','default','App',1747245454,1),
(5,'2025-05-14-175344','App\\Database\\Migrations\\CreateOtpTable','default','App',1747245454,1),
(6,'2025-06-16-084745','App\\Database\\Migrations\\CreateBookingTables','default','App',1750063731,2),
(7,'2025-06-17-171531','App\\Database\\Migrations\\AddStatusToKaryawan','default','App',1750180559,3),
(8,'2025-06-18-120332','App\\Database\\Migrations\\AddJenisToPembayaran','default','App',1750248240,4),
(9,'2025-06-19-070341','App\\Database\\Migrations\\AddBuktiToPembayaran','default','App',1750316679,5),
(11,'2025-06-20-000001','App\\Database\\Migrations\\CreateNotificationsTable','default','App',1750410479,6),
(12,'2025-06-21-000001','App\\Database\\Migrations\\CreatePengeluaranTable','default','App',1750662375,7),
(13,'2025-06-23-000001','App\\Database\\Migrations\\AddExpiredAtToBooking','default','App',1750667720,8),
(14,'2025-07-01-000001','App\\Database\\Migrations\\AddJenkelToKaryawan','default','App',1750885314,9);

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
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `notifications` */

insert  into `notifications`(`id`,`type`,`title`,`message`,`reference_id`,`idpelanggan`,`is_read`,`created_at`,`updated_at`) values 
(65,'booking_baru','Booking Baru','Booking baru oleh Yanni Suherman dengan kode BK-20250715-0001','BK-20250715-0001','PLG0001',1,'2025-07-15 15:14:53','2025-07-15 15:16:57'),
(66,'pembayaran_baru','Pembayaran Baru','Pembayaran baru untuk booking BK-20250715-0001 telah diterima dan menunggu konfirmasi.','BK-20250715-0001',NULL,1,'2025-07-15 15:15:52','2025-07-23 20:28:42'),
(67,'booking_baru','Booking Baru','Booking baru oleh Niftahul Fauzi dengan kode BK-20250715-0002','BK-20250715-0002','PLG0002',1,'2025-07-15 15:33:06','2025-07-15 15:34:05'),
(68,'pembayaran_baru','Pembayaran Baru','Pembayaran baru untuk booking BK-20250715-0002 telah diterima dan menunggu konfirmasi.','BK-20250715-0002',NULL,1,'2025-07-15 15:33:43','2025-08-05 16:11:43'),
(69,'booking_baru','Booking Baru','Booking baru oleh Yanni Suherman dengan kode BK-20250717-0001','BK-20250717-0001','PLG0001',1,'2025-07-17 13:14:23','2025-07-17 16:43:31'),
(70,'pembayaran_baru','Pembayaran Baru','Pembayaran baru untuk booking BK-20250717-0001 telah diterima dan menunggu konfirmasi.','BK-20250717-0001',NULL,1,'2025-07-17 13:14:41','2025-07-23 20:37:00'),
(71,'booking_baru','Booking Baru','Booking baru oleh alya dengan kode BK-20250806-0001','BK-20250806-0001','PLG0004',1,'2025-08-06 18:47:02','2025-08-06 18:50:11'),
(72,'pembayaran_baru','Pembayaran Baru','Pembayaran baru untuk booking BK-20250806-0001 telah diterima dan menunggu konfirmasi.','BK-20250806-0001',NULL,1,'2025-08-06 18:51:37','2025-08-06 18:52:33'),
(73,'booking_baru','Booking Baru','Booking baru oleh alya dengan kode BK-20250806-0002','BK-20250806-0002','PLG0004',1,'2025-08-06 18:53:54','2025-08-06 18:54:35'),
(74,'pembayaran_baru','Pembayaran Baru','Pembayaran baru untuk booking BK-20250806-0002 telah diterima dan menunggu konfirmasi.','BK-20250806-0002',NULL,1,'2025-08-06 18:54:57','2025-08-06 18:55:15'),
(75,'booking_baru','Booking Baru','Booking baru oleh ihza febrian dengan kode BK-20250807-0001','BK-20250807-0001','PLG0006',1,'2025-08-07 17:36:31','2025-08-07 17:36:31'),
(76,'pembayaran_baru','Pembayaran Baru','Pembayaran baru untuk booking BK-20250807-0001 telah diterima dan menunggu konfirmasi.','BK-20250807-0001',NULL,1,'2025-08-07 17:37:07','2025-08-07 17:37:07');

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
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `otp` */

insert  into `otp`(`id`,`user_id`,`otp_code`,`type`,`expired_at`,`created_at`,`updated_at`) values 
(68,NULL,'633243','registration','2025-08-05 17:14:14','2025-08-05 16:59:14','2025-08-05 16:59:14');

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
('PKT001','Basic Haircut','Haircut dan styling',50000.00,'1750901679_01da38e4f32d39cabf7d.jpg','2025-05-14 17:57:47','2025-07-09 23:34:31',30),
('PKT002','Premium Package','Haircut, head massage dan styling',70000.00,'1750901704_4176aaf4e47f66a97bae.jpg','2025-05-14 17:57:47','2025-07-09 23:42:17',40),
('PKT003','Complete Treatment','Haircut, head massage, shaving dan styling',100000.00,'1750901739_28518f0a1abbf18610f2.jpg','2025-05-14 17:57:47','2025-07-09 23:40:01',60),
('PKT004','Shaving','Mencukur kumis, jenggot atau bulu halus di area wajah',10000.00,'1754384832_3efacf040649ba074a05.jpg','2025-07-06 21:04:44','2025-08-05 16:07:12',15),
('PKT005','Hair Color','Pewarnaan rambut secara profesional dengan pilihan warna yang di ingin kan',300000.00,'1754385069_11c3e91b6055497a3cc1.jpeg','2025-07-09 21:41:26','2025-08-05 16:11:09',120),
('PKT006','Highlight','Mewarnai rambut dengan warna yang lebih terang dari warna asli rambut',250000.00,'1754384872_1e0bf81f588dd967398a.jpg','2025-07-09 23:33:57','2025-08-05 16:07:52',120);

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
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`id`,`user_id`,`idpelanggan`,`nama_lengkap`,`jeniskelamin`,`alamat`,`no_hp`,`tanggal_lahir`,`created_at`,`updated_at`) values 
(136,40,'PLG0001','Yanni Suherman','Laki-laki','Jati','089565432134','1986-02-05','2025-07-10 10:59:49','2025-07-10 11:00:53'),
(137,41,'PLG0002','Niftahul Fauzi','Laki-laki','Cimpago permai II','089565432190','1991-12-19','2025-07-15 15:30:57','2025-07-15 15:32:28'),
(138,48,'PLG0003','ihza','','-padang','028282623838','2025-08-05','2025-08-05 16:50:29','2025-08-05 16:51:39'),
(139,44,'PLG0004','alya','','Arai Pinang','089658064010','2004-03-14','2025-08-06 18:41:29','2025-08-06 18:45:14'),
(140,45,'PLG0005','Muhammad Fatih','-','-','0823232323236',NULL,'2025-08-06 18:48:49','2025-08-06 18:48:49'),
(141,48,'PLG0006','ihza febrian','Laki-laki','padang','79879797979','2025-08-07','2025-08-07 17:34:54','2025-08-07 17:36:01'),
(142,47,'PLG0007','Alex putra','-','-','1233424234',NULL,'2025-08-07 23:13:08','2025-08-07 23:13:08'),
(143,48,'PLG0008','Mas doni','Laki-laki','-dsfdf','12345678929','2025-08-23','2025-08-08 09:35:49','2025-08-23 19:39:04');

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
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pembayaran` */

insert  into `pembayaran`(`id`,`fakturbooking`,`total_bayar`,`grandtotal`,`metode`,`status`,`jenis`,`bukti`,`created_at`,`updated_at`) values 
(54,'BK-20250715-0001',175000,350000,'transfer','paid','DP','BK-20250715-0001_1752567352_7fd647a868fba89069f8.jpg','2025-07-15 15:15:52','2025-07-15 15:18:25'),
(55,'BK-20250715-0001',175000,350000,'cash','paid','Pelunasan',NULL,'2025-07-15 15:18:25','2025-07-15 15:18:25'),
(56,'BK-20250715-0002',35000,70000,'qris','paid','DP','BK-20250715-0002_1752568423_e9327f90f78ef9f48be5.jpg','2025-07-15 15:33:43','2025-07-15 15:35:02'),
(57,'BK-20250715-0002',35000,70000,'cash','paid','Pelunasan',NULL,'2025-07-15 15:35:02','2025-07-15 15:35:02'),
(58,'BK-20250717-0001',50000,100000,'transfer','paid','DP','BK-20250717-0001_1752732881_905969bf1b17c7711b75.jpg','2025-07-17 13:14:41','2025-07-17 16:43:50'),
(59,'BK-20250717-0001',50000,100000,'cash','paid','Pelunasan',NULL,'2025-07-17 16:43:50','2025-07-17 16:43:50'),
(60,'BK-20250806-0001',25000,50000,'transfer','paid','DP','BK-20250806-0001_1754481097_17c4b56b363e4a92b998.jpg','2025-08-06 18:51:37','2025-08-22 19:42:28'),
(61,'BK-20250806-0002',150000,300000,'transfer','paid','DP','BK-20250806-0002_1754481297_f7941824d69c7a63cba6.jpg','2025-08-06 18:54:57','2025-08-22 19:42:06'),
(62,'BK-20250807-0001',300000,300000,'qris','paid','Lunas','BK-20250807-0001_1754563027_5f4805d005d6c91ad837.png','2025-08-07 17:37:07','2025-08-22 19:41:55'),
(63,'BK-20250806-0002',150000,300000,'cash','paid','Pelunasan',NULL,'2025-08-22 19:42:06','2025-08-22 19:42:06'),
(64,'BK-20250806-0001',25000,50000,'cash','paid','Pelunasan',NULL,'2025-08-22 19:42:28','2025-08-22 19:42:28');

/*Table structure for table `pengeluaran` */

DROP TABLE IF EXISTS `pengeluaran`;

CREATE TABLE `pengeluaran` (
  `idpengeluaran` char(30) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jumlah` double NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idpengeluaran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pengeluaran` */

insert  into `pengeluaran`(`idpengeluaran`,`tgl`,`keterangan`,`jumlah`,`created_at`,`updated_at`) values 
('PG-20250627-0001','2025-06-27','Sewa Ruko',18000000,'2025-06-27 22:41:59','2025-06-27 22:41:59'),
('PG-20250627-0002','2025-06-27','Token',100000,'2025-06-27 22:42:40','2025-06-27 22:42:40'),
('PG-20250627-0003','2025-06-27','Gaji Karyawan ',7500000,'2025-06-27 22:46:05','2025-07-06 21:10:07');

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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`email`,`password`,`name`,`role`,`status`,`last_login`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'admin','admin@admin.com','$2y$10$q0diYPnm5cBnu664cMMd9ulmEgjW6hUZA2gILBEWA56OGygYVpW86','Administrator','admin','active','2025-08-25 01:30:25',NULL,'2025-06-19 09:29:55','2025-08-25 01:30:25',NULL),
(8,'Pimpinan','afles@gmail.com','$2y$10$QSFD28XFBHSRsN8m.XaZwOpgQuju608QQNakQMldnJx2aolQA4B82','Afles Suawandi','pimpinan','active','2025-08-14 14:37:26',NULL,'2025-06-27 22:25:42','2025-08-14 14:37:26',NULL),
(40,'yanni','deaa5872@gmail.com','$2y$10$RnjrCYWKRJryOM8JIS6LwOpj4W.rRT.ndDUvzkr/gJRX4zrRH2zby','Yanni Suherman','pelanggan','active','2025-07-17 13:13:58',NULL,'2025-07-10 10:59:32','2025-07-17 13:13:58',NULL),
(41,'puji','puji@pingaja.site','$2y$10$V.ajAMu2l4cdZQRw03kksetIJIxuSoHmSJECEL3UN6OoGrSZt.fUK','Niftahul Fauzi','pelanggan','active','2025-08-05 16:52:56',NULL,'2025-07-15 15:30:32','2025-08-05 16:52:56',NULL),
(42,'ihza','fihza15@gmail.com','$2y$10$q0diYPnm5cBnu664cMMd9ulmEgjW6hUZA2gILBEWA56OGygYVpW86','ihza','karyawan','active','2025-08-25 02:40:31',NULL,'2025-08-05 16:50:03','2025-08-25 02:40:31',NULL),
(44,'alyaa','alyaarn1403@gmail.com','$2y$10$INw9M0s8IurPf1wYrTyfne7rvGruB.3tJRypdQu1L3w.OVtsLuJwe','alya','pelanggan','active','2025-08-06 18:41:50',NULL,'2025-08-06 18:41:02','2025-08-06 18:45:14',NULL),
(45,'fatih','fianai@wpidr.site','$2y$10$YMzsHvwjBsXl0QPl3DPUleuC6NnVjUs1iLT8sjjAJLNQDt7odyCmu','Muhammad Fatih','karyawan','active','2025-08-08 16:59:15',NULL,'2025-08-06 18:47:37','2025-08-08 16:59:15',NULL),
(46,'cikikikikikk','ihzafebrian2@gmail.com','$2y$10$kJYUnqNaIEX4AD.zEH1Iqu/EWVfHEpEwOf.Ra92tL3YL/OKgqdiZy','ihza febrian','pelanggan','active','2025-08-07 17:35:06',NULL,'2025-08-07 17:34:10','2025-08-07 17:36:01',NULL),
(47,'alex','alex@pingaja.site','$2y$10$KatY9pSpjI6MXsCalh3zR.o7K7wwTVGkFalkA60j1T02LUHJvNyFy','Alex putra','pelanggan','active',NULL,NULL,'2025-08-07 23:12:36','2025-08-07 23:13:08',NULL),
(48,'masdon','masdon@kangpisang.id','$2y$10$qMB5TjB3H5X7byGyu7fGDOHpCUiqI0tDdmSTrNIAPcHKVJvPJVG0C','Mas doni','pelanggan','active','2025-08-23 19:38:38',NULL,'2025-08-08 09:34:52','2025-08-23 19:39:04',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

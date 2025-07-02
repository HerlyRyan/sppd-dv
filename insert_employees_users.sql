-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for devi
CREATE DATABASE IF NOT EXISTS `devi` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `devi`;

-- Dumping structure for table devi.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `position_id` bigint unsigned NOT NULL,
  `grade_id` bigint unsigned NOT NULL,
  `agency_id` bigint unsigned NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npwp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `functional_position_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_nip_unique` (`nip`),
  KEY `employees_position_id_foreign` (`position_id`),
  KEY `employees_agency_id_foreign` (`agency_id`),
  KEY `employees_grade_id_foreign` (`grade_id`),
  KEY `employees_functional_position_foreign` (`functional_position_id`),
  CONSTRAINT `employees_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`),
  CONSTRAINT `employees_functional_position_foreign` FOREIGN KEY (`functional_position_id`) REFERENCES `functional_positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `employees_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `employees_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table devi.employees: ~7 rows (approximately)
INSERT INTO `employees` (`id`, `position_id`, `grade_id`, `agency_id`, `nip`, `nama_pegawai`, `npwp`, `jenis_kelamin`, `status`, `created_at`, `updated_at`, `functional_position_id`) VALUES
	(4, 4, 13, 1, '2110010512', 'devi', '132436457586786', 'P', 'aktif', '2025-02-19 01:35:26', '2025-02-19 01:35:26', 5),
	(5, 3, 16, 1, '198207122006042001', 'Sripah,S.AP', '81751623837', 'P', 'aktif', '2025-02-19 01:54:27', '2025-02-19 01:54:27', 10),
	(6, 2, 8, 1, '196801022007012033', 'MASPAH, SE', '11111', 'P', 'aktif', '2025-06-24 18:27:34', '2025-06-24 18:27:34', 5),
	(7, 4, 8, 2, '12345678', 'PEGAWAI SEI DUA', '12345678', 'L', 'aktif', '2025-07-01 17:27:11', '2025-07-01 17:35:36', 5),
	(8, 3, 8, 3, '123456789', 'PEGAWAI SEBAMBAN', '123456789', 'L', 'aktif', '2025-07-01 17:30:38', '2025-07-01 18:58:37', 5),
	(9, 1, 8, 3, '1234567810', 'PIMPINAN SEBAMBAN', '1234567810', 'L', 'aktif', '2025-07-01 19:00:35', '2025-07-01 19:00:35', 5),
	(10, 1, 8, 2, '1234567811', 'PIMPINAN SEI DUA', '1234567811', 'L', 'aktif', '2025-07-01 19:00:53', '2025-07-01 19:00:53', 5);

-- Dumping structure for table devi.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table devi.users: ~9 rows (approximately)
INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `updated_at`, `role`) VALUES
	(5, 'admin', '$2y$12$A1yA6DNWyh7OOrb6owD7wuDOI8DK68OtB83pKKM3z4e4D7H3a/.iW', '2025-02-09 16:20:10', '2025-02-09 16:20:10', 'admin'),
	(6, '2110010512', '$2y$12$.XckWD3cZTODRuRDu3VqTuHx4poxTfOThJqbVunss3QyrN5WlehCS', '2025-02-19 01:35:26', '2025-02-19 01:35:26', 'pegawai_bkn'),
	(7, '198207122006042001', '$2y$12$DGcHy5EZXlZKre3ExlXDCeyGO/uk8c0YC3wTTnpdEeiAwyfzxm/92', '2025-02-19 01:54:28', '2025-02-19 01:54:28', 'pegawai_bkn'),
	(8, 'admin', '$2y$12$qERZUzBJNQySlRI966Q2cuQY6kHIl22qn7ixLfb/p4o7JzaEwMLNy', '2025-06-23 05:01:54', '2025-06-23 05:01:54', 'admin'),
	(9, '196801022007012033', '$2y$12$VtLID93xuN2kADEKNQPFOOTlNJdjGxJ2LhHxGDRB96kPTX458YzLC', '2025-06-24 18:27:34', '2025-06-24 18:27:34', 'pimpinan_unit_kerja'),
	(10, '12345678', '$2y$12$5CyzAPjywZLIcAp.UwakEuYOfe6AXUOHpWqICO4jY4lwHh8vjweO.', '2025-07-01 17:27:13', '2025-07-01 17:27:13', 'pegawai_unit_kerja'),
	(11, '123456789', '$2y$12$kwHLfN3bT13xjk.wTpOSI.P1yuDav2E7uJXa9CnRucrktKECOq3uG', '2025-07-01 17:30:39', '2025-07-01 17:30:39', 'pegawai_unit_kerja'),
	(12, '1234567810', '$2y$12$mDKgADEhZYYI5Z1h83hkoe5jTyW7VNoDwttzvWB48BIwq7QnQw/I6', '2025-07-01 19:00:35', '2025-07-01 19:00:35', 'pimpinan_unit_kerja'),
	(13, '1234567811', '$2y$12$7AyMeiID2L5bauCRl/gwwePdQ96/1uTLwWimqNNdq0eG4cxv9rvJy', '2025-07-01 19:00:53', '2025-07-01 19:00:53', 'pimpinan_unit_kerja');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

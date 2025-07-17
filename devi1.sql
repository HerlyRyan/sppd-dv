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

-- Dumping structure for table devi.accountabilities
CREATE TABLE IF NOT EXISTS `accountabilities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `skp_report_id` bigint unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `accountabilities_skp_report_id_foreign` (`skp_report_id`),
  CONSTRAINT `accountabilities_skp_report_id_foreign` FOREIGN KEY (`skp_report_id`) REFERENCES `skp_reports` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table devi.accountabilities: ~2 rows (approximately)
INSERT INTO `accountabilities` (`id`, `skp_report_id`, `description`, `created_at`, `updated_at`) VALUES
	(2, 3, 'Pimpinan dan Pegawai juga harus menyepakati waktu pelaporan perkembangan hasil kerja untuk pemantauan kinerja Pegawai. Untuk pekerjaan yang sifatnya rutin, Pimpinan dan Pegawai dapat menyepakati waktu pelaporan perkembangan hasil kerja secara periodik/ berkala.', '2025-06-24 18:49:29', '2025-06-24 18:49:29'),
	(3, 4, 'Pimpinan dan Pegawai juga harus menyepakati waktu pelaporan perkembangan hasil kerja untuk pemantauan kinerja Pegawai. Untuk pekerjaan yang sifatnya rutin, Pimpinan dan Pegawai dapat menyepakati waktu pelaporan perkembangan hasil kerja secara periodik/ berkala.', '2025-06-24 18:50:04', '2025-06-24 18:50:04'),
	(5, 6, 'Pimpinan dan Pegawai juga harus menyepakati waktu pelaporan perkembangan hasil kerja untuk pemantauan kinerja Pegawai. Untuk pekerjaan yang sifatnya rutin, Pimpinan dan Pegawai dapat menyepakati waktu pelaporan perkembangan hasil kerja secara periodik/ berkala.', '2025-07-01 18:35:58', '2025-07-01 18:35:58'),
	(6, 7, 'Pimpinan dan Pegawai juga harus menyepakati waktu pelaporan perkembangan hasil kerja untuk pemantauan kinerja Pegawai. Untuk pekerjaan yang sifatnya rutin, Pimpinan dan Pegawai dapat menyepakati waktu pelaporan perkembangan hasil kerja secara periodik/ berkala.', '2025-07-12 05:42:24', '2025-07-12 05:42:24');

-- Dumping structure for table devi.agencies
CREATE TABLE IF NOT EXISTS `agencies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table devi.agencies: ~3 rows (approximately)
INSERT INTO `agencies` (`id`, `instansi`, `created_at`, `updated_at`) VALUES
	(1, 'KANTOR REGIONAL VIII BADAN KEPEGAWAIAN NEGARA', '2025-01-09 06:25:09', '2025-01-09 06:25:09'),
	(2, 'KANTOR SEI DUA', '2025-07-01 17:24:56', '2025-07-01 17:24:56'),
	(3, 'KANTOR SEBAMBAN', '2025-07-01 17:30:52', '2025-07-01 17:30:52');

-- Dumping structure for table devi.consequences
CREATE TABLE IF NOT EXISTS `consequences` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `skp_report_id` bigint unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `consequences_skp_report_id_foreign` (`skp_report_id`),
  CONSTRAINT `consequences_skp_report_id_foreign` FOREIGN KEY (`skp_report_id`) REFERENCES `skp_reports` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table devi.consequences: ~2 rows (approximately)
INSERT INTO `consequences` (`id`, `skp_report_id`, `description`, `created_at`, `updated_at`) VALUES
	(2, 3, 'penghargaan kepada Pegawai baik materiil maupun non materiil; dan/atau pemberian penugasan baru. pemberian teguran; dan/atau pengalihan penugasan.', '2025-06-24 18:49:29', '2025-06-24 18:49:29'),
	(3, 4, 'penghargaan kepada Pegawai baik materiil maupun non materiil; dan/atau pemberian penugasan baru. pemberian teguran; dan/atau pengalihan penugasan.', '2025-06-24 18:50:04', '2025-06-24 18:50:04'),
	(5, 6, 'penghargaan kepada Pegawai baik materiil maupun non materiil; dan/atau pemberian penugasan baru. pemberian teguran; dan/atau pengalihan penugasan.', '2025-07-01 18:35:58', '2025-07-01 18:35:58'),
	(6, 7, 'penghargaan kepada Pegawai baik materiil maupun non materiil; dan/atau pemberian penugasan baru. pemberian teguran; dan/atau pengalihan penugasan.', '2025-07-12 05:42:24', '2025-07-12 05:42:24');

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
	(4, 4, 13, 3, '2110010512', 'devi', '132436457586786', 'P', 'aktif', '2025-02-19 01:35:26', '2025-07-06 05:28:17', 5),
	(5, 3, 16, 1, '198207122006042001', 'Sripah,S.AP', '81751623837', 'P', 'aktif', '2025-02-19 01:54:27', '2025-02-19 01:54:27', 10),
	(6, 2, 8, 1, '196801022007012033', 'MASPAH, SE', '11111', 'P', 'aktif', '2025-06-24 18:27:34', '2025-06-24 18:27:34', 5),
	(7, 4, 8, 2, '12345678', 'PEGAWAI SEI DUA', '12345678', 'L', 'aktif', '2025-07-01 17:27:11', '2025-07-01 17:35:36', 5),
	(8, 3, 8, 3, '123456789', 'PEGAWAI SEBAMBAN', '123456789', 'L', 'aktif', '2025-07-01 17:30:38', '2025-07-01 18:58:37', 5),
	(9, 1, 8, 3, '1234567810', 'PIMPINAN SEBAMBAN', '1234567810', 'L', 'aktif', '2025-07-01 19:00:35', '2025-07-01 19:00:35', 5),
	(10, 1, 8, 2, '1234567811', 'PIMPINAN SEI DUA', '1234567811', 'L', 'aktif', '2025-07-01 19:00:53', '2025-07-01 19:00:53', 5);

-- Dumping structure for table devi.functional_positions
CREATE TABLE IF NOT EXISTS `functional_positions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_jabatan_fungsional` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table devi.functional_positions: ~5 rows (approximately)
INSERT INTO `functional_positions` (`id`, `nama_jabatan_fungsional`, `created_at`, `updated_at`) VALUES
	(5, 'KEPALA BAGIAN TATA USAHA', '2025-02-19 01:21:26', '2025-02-19 01:21:26'),
	(7, 'KEPALA BIDANG PENGANGKATAN DAN PENSIUN', '2025-02-19 01:21:52', '2025-02-19 01:21:52'),
	(8, 'KEPALA SUB BAGIAN KEPEGAWAIAN PENGELOLAAN KINERJA', '2025-02-19 01:21:59', '2025-02-19 01:21:59'),
	(9, 'KEPALA SUB BAGIAN UMUM', '2025-02-19 01:22:50', '2025-02-19 01:22:50'),
	(10, 'KEPALA BIDANG INFORMASI KEPEGAWAIAN', '2025-02-19 01:23:20', '2025-02-19 01:23:20');

-- Dumping structure for table devi.grades
CREATE TABLE IF NOT EXISTS `grades` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `golongan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gaji_pokok` bigint NOT NULL,
  `lama` int NOT NULL,
  `pajak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table devi.grades: ~10 rows (approximately)
INSERT INTO `grades` (`id`, `golongan`, `gaji_pokok`, `lama`, `pajak`, `created_at`, `updated_at`) VALUES
	(8, 'I a', 1560800, 0, '0.25', '2025-02-19 01:25:44', '2025-02-19 01:25:44'),
	(9, 'I a', 1560800, 1, '0.25', '2025-02-19 01:26:35', '2025-02-19 01:26:35'),
	(10, 'I a', 1610000, 2, '0.25', '2025-02-19 01:27:06', '2025-02-19 01:27:06'),
	(11, 'II a', 2022200, 0, '5', '2025-02-19 01:29:00', '2025-02-19 01:29:00'),
	(12, 'II a', 2054100, 1, '5', '2025-02-19 01:29:59', '2025-02-19 01:29:59'),
	(13, 'II a', 2054100, 2, '5', '2025-02-19 01:30:46', '2025-02-19 01:30:46'),
	(14, 'II a', 2118800, 3, '5', '2025-02-19 01:31:44', '2025-02-19 01:31:44'),
	(15, 'III a', 2579400, 0, '15', '2025-02-19 01:32:53', '2025-02-19 01:32:53'),
	(16, 'III a', 2579400, 1, '15', '2025-02-19 01:33:35', '2025-02-19 01:33:35'),
	(17, 'III a', 2660700, 3, '15', '2025-02-19 01:34:08', '2025-02-19 01:34:08');

-- Dumping structure for table devi.lpj_details
CREATE TABLE IF NOT EXISTS `lpj_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lpj_header_id` bigint unsigned NOT NULL,
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_lpj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lpj_details_lpj_header_id_foreign` (`lpj_header_id`),
  CONSTRAINT `lpj_details_lpj_header_id_foreign` FOREIGN KEY (`lpj_header_id`) REFERENCES `lpj_headers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table devi.lpj_details: ~3 rows (approximately)
INSERT INTO `lpj_details` (`id`, `lpj_header_id`, `nama_kegiatan`, `biaya_kegiatan`, `bukti_lpj`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Tes', '2000000', 'lpj/1kYyiCYGMeN7dWcAjd8ucoKNmZqAiRS5BeqAZG8n.pdf', '2025-07-09 02:15:50', '2025-07-09 02:15:50'),
	(5, 2, 'Tes', '2000000', 'lpj/34EClPY2lN7ZQnlVO7atGOiiooc7CeSR1xFIVwIq.pdf', '2025-07-12 02:03:44', '2025-07-12 02:03:44'),
	(6, 3, 'Tes Edit', '2000000', 'lpj/ORLGLVi3r2rVXldjU7g2MsgwEJctUw44zhfUMagI.pdf', '2025-07-12 02:15:33', '2025-07-12 03:05:58');

-- Dumping structure for table devi.lpj_headers
CREATE TABLE IF NOT EXISTS `lpj_headers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `sppd_id` bigint unsigned NOT NULL,
  `submission_flag` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `submission_date` timestamp NULL DEFAULT NULL,
  `approval_status` enum('Y','N','R','Y1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `approval_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reject_reason` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lpj_headers_user_id_foreign` (`user_id`),
  KEY `lpj_headers_sppd_id_foreign` (`sppd_id`),
  CONSTRAINT `lpj_headers_sppd_id_foreign` FOREIGN KEY (`sppd_id`) REFERENCES `sppds` (`id`),
  CONSTRAINT `lpj_headers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table devi.lpj_headers: ~3 rows (approximately)
INSERT INTO `lpj_headers` (`id`, `user_id`, `sppd_id`, `submission_flag`, `submission_date`, `approval_status`, `approval_date`, `created_at`, `updated_at`, `reject_reason`) VALUES
	(1, 5, 2, 'Y', '2025-07-11 23:52:51', 'Y', '2025-07-12 00:05:55', '2025-07-09 01:41:38', '2025-07-12 00:05:55', NULL),
	(2, 5, 3, 'Y', '2025-07-12 02:06:59', 'Y', '2025-07-12 02:08:03', '2025-07-12 00:15:13', '2025-07-12 02:08:03', NULL),
	(3, 6, 4, 'Y', '2025-07-12 03:07:17', 'Y', '2025-07-12 03:08:02', '2025-07-12 02:15:21', '2025-07-12 03:08:02', NULL);

-- Dumping structure for table devi.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table devi.migrations: ~21 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(3, '2024_10_04_102711_create_grades_table', 1),
	(4, '2024_10_04_102716_create_positions_table', 1),
	(5, '2024_11_10_115703_create_agencies_table', 1),
	(6, '2024_11_11_102799_create_employees_table', 1),
	(7, '2024_11_14_104410_create_surat_table', 1),
	(8, '2025_01_09_140431_create_functional_positions_table', 1),
	(9, '2025_01_09_140553_add_functional_position_id_to_employees_table', 1),
	(10, '2025_01_09_140746_add_some_fields_to_users_table', 1),
	(11, '2025_01_09_144645_create_sppds_table', 2),
	(16, '2025_06_23_125529_create_skp_indicators_table', 5),
	(17, '2025_06_23_125523_create_skp_reports_table', 6),
	(18, '2025_06_25_012742_create_work_results_table', 7),
	(19, '2025_06_25_012800_create_performance_indicators_table', 7),
	(20, '2025_06_25_012812_create_work_behaviors_table', 7),
	(21, '2025_06_25_012824_create_supporting_resources_table', 7),
	(22, '2025_06_25_012843_create_accountabilities_table', 7),
	(23, '2025_06_25_012853_create_consequences_table', 7),
	(26, '2025_01_09_162600_create_lpj_headers_table', 10),
	(27, '2025_01_09_162606_create_lpj_details_table', 11);

-- Dumping structure for table devi.performance_indicators
CREATE TABLE IF NOT EXISTS `performance_indicators` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `work_result_id` bigint unsigned NOT NULL,
  `aspek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indikator_kinerja_individu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `performance_indicators_work_result_id_foreign` (`work_result_id`),
  CONSTRAINT `performance_indicators_work_result_id_foreign` FOREIGN KEY (`work_result_id`) REFERENCES `work_results` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table devi.performance_indicators: ~12 rows (approximately)
INSERT INTO `performance_indicators` (`id`, `work_result_id`, `aspek`, `indikator_kinerja_individu`, `target`, `created_at`, `updated_at`) VALUES
	(4, 3, 'Kuantitas', 'tes', 'test', '2025-06-24 18:49:29', '2025-06-24 18:49:29'),
	(5, 3, 'Kualitas', 'tes', 'tes', '2025-06-24 18:49:29', '2025-06-24 18:49:29'),
	(6, 3, 'Waktu', 'tes', 'tes', '2025-06-24 18:49:29', '2025-06-24 18:49:29'),
	(7, 4, 'Kuantitas', 'tes', 'test', '2025-06-24 18:50:04', '2025-06-24 18:50:04'),
	(8, 4, 'Kualitas', 'tes', 'tes', '2025-06-24 18:50:04', '2025-06-24 18:50:04'),
	(9, 4, 'Waktu', 'tes', 'tes', '2025-06-24 18:50:04', '2025-06-24 18:50:04'),
	(13, 6, 'Kuantitas', 'te', 'test', '2025-07-01 18:35:58', '2025-07-01 18:35:58'),
	(14, 6, 'Kualitas', 'tes', 'tes', '2025-07-01 18:35:58', '2025-07-01 18:35:58'),
	(15, 6, 'Waktu', 'tes', 'tes', '2025-07-01 18:35:58', '2025-07-01 18:35:58'),
	(16, 7, 'Kuantitas', 'tes', 'test', '2025-07-12 05:42:24', '2025-07-12 05:42:24'),
	(17, 7, 'Kualitas', 'tes', 'tes', '2025-07-12 05:42:24', '2025-07-12 05:42:24'),
	(18, 7, 'Waktu', 'tes', 'tes', '2025-07-12 05:42:24', '2025-07-12 05:42:24');

-- Dumping structure for table devi.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table devi.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table devi.positions
CREATE TABLE IF NOT EXISTS `positions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table devi.positions: ~7 rows (approximately)
INSERT INTO `positions` (`id`, `nama_jabatan`, `created_at`, `updated_at`) VALUES
	(1, 'PENANGGUNG JAWAB', '2025-01-09 06:25:24', '2025-01-09 06:25:24'),
	(2, 'KETUA', '2025-01-09 06:25:31', '2025-01-09 06:25:31'),
	(3, 'SEKRETARIS', '2025-01-09 06:25:38', '2025-01-09 06:25:38'),
	(4, 'ANGGOTA', '2025-01-09 06:25:45', '2025-01-09 06:25:45'),
	(5, 'BENDAHARA', '2025-01-09 06:25:51', '2025-01-09 06:25:51'),
	(6, 'PEJABAT PEMBUAT KOMITMEN', '2025-01-09 06:33:46', '2025-01-09 06:33:46'),
	(7, 'ANALIS SDM APARATUR AHLI PERTAMA', '2025-01-09 06:36:34', '2025-01-09 06:36:34');

-- Dumping structure for table devi.skp_reports
CREATE TABLE IF NOT EXISTS `skp_reports` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pegawai_id` bigint unsigned NOT NULL,
  `penilai_id` bigint unsigned NOT NULL,
  `periode_mulai` date NOT NULL,
  `periode_selesai` date NOT NULL,
  `tanggal_penilaian` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('pending','rejected','approved_stage_1','approved') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `reject_reason` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_skp_reports_employees` (`pegawai_id`),
  KEY `FK_skp_reports_employees_2` (`penilai_id`),
  CONSTRAINT `FK_skp_reports_employees` FOREIGN KEY (`pegawai_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_skp_reports_employees_2` FOREIGN KEY (`penilai_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table devi.skp_reports: ~3 rows (approximately)
INSERT INTO `skp_reports` (`id`, `pegawai_id`, `penilai_id`, `periode_mulai`, `periode_selesai`, `tanggal_penilaian`, `created_at`, `updated_at`, `status`, `reject_reason`) VALUES
	(3, 5, 6, '2025-06-25', '2025-06-30', '2025-06-25', '2025-06-24 18:49:29', '2025-06-24 18:49:29', 'pending', NULL),
	(4, 4, 6, '2025-06-25', '2025-06-30', '2025-06-25', '2025-06-24 18:50:04', '2025-07-12 05:41:22', 'approved', NULL),
	(6, 8, 6, '2025-07-02', '2025-07-02', '2025-07-02', '2025-07-01 18:35:58', '2025-07-12 05:01:32', 'pending', NULL),
	(7, 4, 6, '2025-07-12', '2025-07-12', '2025-07-12', '2025-07-12 05:42:24', '2025-07-12 05:42:24', 'pending', NULL);

-- Dumping structure for table devi.sppds
CREATE TABLE IF NOT EXISTS `sppds` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` bigint unsigned NOT NULL,
  `nomor_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tujuan_sppd` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `transportasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_berangkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `durasi_sppd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `pejabat_pembuat_komitmen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya_sppd` int NOT NULL,
  `flag_buat_surat` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `flag_lpj` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sppds_employee_id_foreign` (`employee_id`),
  CONSTRAINT `sppds_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table devi.sppds: ~3 rows (approximately)
INSERT INTO `sppds` (`id`, `employee_id`, `nomor_surat`, `tanggal_surat`, `tujuan_sppd`, `transportasi`, `tempat_berangkat`, `tempat_tujuan`, `durasi_sppd`, `tanggal_berangkat`, `tanggal_kembali`, `pejabat_pembuat_komitmen`, `biaya_sppd`, `flag_buat_surat`, `flag_lpj`, `created_at`, `updated_at`) VALUES
	(2, 4, '2', '2025-02-13', 'sajkdsajd', 'angkutan udara', 'Banjarbaru', 'Surabaya', '4', '2025-02-15', '2025-02-19', 'devi', 5000000, 'Y', 'N', '2025-02-19 01:52:31', '2025-02-19 01:55:10'),
	(3, 4, '3', '2025-07-12', 'Tes', 'Tes', 'Tes', 'Tes', '3', '2025-07-12', '2025-07-15', 'Sripah,S.AP', 500000, 'Y', 'N', '2025-07-12 00:14:36', '2025-07-12 00:14:56'),
	(4, 4, '4', '2025-07-12', 'Dinas', 'Mobil', 'Dinas', 'Bali', '5', '2025-07-12', '2025-07-17', 'Sripah,S.AP', 2000000, 'Y', 'N', '2025-07-12 02:13:10', '2025-07-12 02:15:05');

-- Dumping structure for table devi.supporting_resources
CREATE TABLE IF NOT EXISTS `supporting_resources` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `skp_report_id` bigint unsigned NOT NULL,
  `resource_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `supporting_resources_skp_report_id_foreign` (`skp_report_id`),
  CONSTRAINT `supporting_resources_skp_report_id_foreign` FOREIGN KEY (`skp_report_id`) REFERENCES `skp_reports` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table devi.supporting_resources: ~18 rows (approximately)
INSERT INTO `supporting_resources` (`id`, `skp_report_id`, `resource_name`, `created_at`, `updated_at`) VALUES
	(6, 3, 'sumber daya manusia', '2025-06-24 18:49:29', '2025-06-24 18:49:29'),
	(7, 3, 'anggaran', '2025-06-24 18:49:29', '2025-06-24 18:49:29'),
	(8, 3, 'peralatan kerja', '2025-06-24 18:49:29', '2025-06-24 18:49:29'),
	(9, 3, 'pendampingan Pimpinan', '2025-06-24 18:49:29', '2025-06-24 18:49:29'),
	(10, 3, 'sarana dan prasarana', '2025-06-24 18:49:29', '2025-06-24 18:49:29'),
	(11, 4, 'sumber daya manusia', '2025-06-24 18:50:04', '2025-06-24 18:50:04'),
	(12, 4, 'anggaran', '2025-06-24 18:50:04', '2025-06-24 18:50:04'),
	(13, 4, 'peralatan kerja', '2025-06-24 18:50:04', '2025-06-24 18:50:04'),
	(14, 4, 'pendampingan Pimpinan', '2025-06-24 18:50:04', '2025-06-24 18:50:04'),
	(15, 4, 'sarana dan prasarana', '2025-06-24 18:50:04', '2025-06-24 18:50:04'),
	(21, 6, 'sumber daya manusia', '2025-07-01 18:35:58', '2025-07-01 18:35:58'),
	(22, 6, 'anggaran', '2025-07-01 18:35:58', '2025-07-01 18:35:58'),
	(23, 6, 'peralatan kerja', '2025-07-01 18:35:58', '2025-07-01 18:35:58'),
	(24, 6, 'pendampingan Pimpinan', '2025-07-01 18:35:58', '2025-07-01 18:35:58'),
	(25, 6, 'sarana dan prasarana', '2025-07-01 18:35:58', '2025-07-01 18:35:58'),
	(26, 7, 'sumber daya manusia', '2025-07-12 05:42:24', '2025-07-12 05:42:24'),
	(27, 7, 'anggaran', '2025-07-12 05:42:24', '2025-07-12 05:42:24'),
	(28, 7, 'peralatan kerja', '2025-07-12 05:42:24', '2025-07-12 05:42:24'),
	(29, 7, 'pendampingan Pimpinan', '2025-07-12 05:42:24', '2025-07-12 05:42:24'),
	(30, 7, 'sarana dan prasarana', '2025-07-12 05:42:24', '2025-07-12 05:42:24');

-- Dumping structure for table devi.surat
CREATE TABLE IF NOT EXISTS `surat` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_surat` date NOT NULL,
  `jenis_surat` enum('daftar_hadir','daftar_nominatif','kuitansi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `surat_no_surat_unique` (`no_surat`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table devi.surat: ~3 rows (approximately)
INSERT INTO `surat` (`id`, `no_surat`, `tanggal_surat`, `jenis_surat`, `nama_file`, `created_at`, `updated_at`) VALUES
	(19, 'DA-2025-001', '2025-02-19', 'daftar_hadir', 'DAFTAR HADIR_SOSIALISASI_DA-2025-001.pdf', '2025-02-19 01:41:10', '2025-02-19 01:41:10'),
	(20, 'KT-2025-001', '2025-02-19', 'kuitansi', 'KUITANSI_SOSIALISASI_KT-2025-001.pdf', '2025-02-19 01:44:54', '2025-02-19 01:44:54'),
	(21, 'DA-2025-002', '2025-02-19', 'daftar_hadir', 'DAFTAR HADIR_SOSIALISASI_DA-2025-002.pdf', '2025-02-19 01:47:12', '2025-02-19 01:47:12');

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
	(6, '2110010512', '$2y$12$.XckWD3cZTODRuRDu3VqTuHx4poxTfOThJqbVunss3QyrN5WlehCS', '2025-02-19 01:35:26', '2025-07-06 05:28:27', 'pegawai_bkn'),
	(7, '198207122006042001', '$2y$12$DGcHy5EZXlZKre3ExlXDCeyGO/uk8c0YC3wTTnpdEeiAwyfzxm/92', '2025-02-19 01:54:28', '2025-02-19 01:54:28', 'pegawai_bkn'),
	(8, 'admin', '$2y$12$qERZUzBJNQySlRI966Q2cuQY6kHIl22qn7ixLfb/p4o7JzaEwMLNy', '2025-06-23 05:01:54', '2025-06-23 05:01:54', 'admin'),
	(9, '196801022007012033', '$2y$12$VtLID93xuN2kADEKNQPFOOTlNJdjGxJ2LhHxGDRB96kPTX458YzLC', '2025-06-24 18:27:34', '2025-06-24 18:27:34', 'pimpinan_bkn'),
	(10, '12345678', '$2y$12$5CyzAPjywZLIcAp.UwakEuYOfe6AXUOHpWqICO4jY4lwHh8vjweO.', '2025-07-01 17:27:13', '2025-07-01 17:27:13', 'pegawai_unit_kerja'),
	(11, '123456789', '$2y$12$kwHLfN3bT13xjk.wTpOSI.P1yuDav2E7uJXa9CnRucrktKECOq3uG', '2025-07-01 17:30:39', '2025-07-01 17:30:39', 'pegawai_unit_kerja'),
	(12, '1234567810', '$2y$12$mDKgADEhZYYI5Z1h83hkoe5jTyW7VNoDwttzvWB48BIwq7QnQw/I6', '2025-07-01 19:00:35', '2025-07-01 19:00:35', 'pimpinan_unit_kerja'),
	(13, '1234567811', '$2y$12$7AyMeiID2L5bauCRl/gwwePdQ96/1uTLwWimqNNdq0eG4cxv9rvJy', '2025-07-01 19:00:53', '2025-07-01 19:00:53', 'pimpinan_unit_kerja');

-- Dumping structure for table devi.work_behaviors
CREATE TABLE IF NOT EXISTS `work_behaviors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `skp_report_id` bigint unsigned NOT NULL,
  `perilaku_kerja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_perilaku` text COLLATE utf8mb4_unicode_ci,
  `ekspektasi_pimpinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `work_behaviors_skp_report_id_foreign` (`skp_report_id`),
  CONSTRAINT `work_behaviors_skp_report_id_foreign` FOREIGN KEY (`skp_report_id`) REFERENCES `skp_reports` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table devi.work_behaviors: ~2 rows (approximately)
INSERT INTO `work_behaviors` (`id`, `skp_report_id`, `perilaku_kerja`, `deskripsi_perilaku`, `ekspektasi_pimpinan`, `created_at`, `updated_at`) VALUES
	(2, 3, 'Berorientasi Pelayanan', 'Memahami dan memenuhi kebutuhan masyarakat, Ramah, cekatan, solutif, dan dapat diandalkan, Melakukan perbaikan tiada henti', 'Sesuai Ekspektasi', '2025-06-24 18:49:29', '2025-06-24 18:49:29'),
	(3, 4, 'Berorientasi Pelayanan', 'Memahami dan memenuhi kebutuhan masyarakat, Ramah, cekatan, solutif, dan dapat diandalkan, Melakukan perbaikan tiada henti', 'Sesuai Ekspektasi', '2025-06-24 18:50:04', '2025-06-24 18:50:04'),
	(5, 6, 'Berorientasi Pelayanan', 'Memahami dan memenuhi kebutuhan masyarakat, Ramah, cekatan, solutif, dan dapat diandalkan, Melakukan perbaikan tiada henti', 'Sesuai Ekspektasi', '2025-07-01 18:35:58', '2025-07-01 18:35:58'),
	(6, 7, 'Berorientasi Pelayanan', 'Memahami dan memenuhi kebutuhan masyarakat, Ramah, cekatan, solutif, dan dapat diandalkan, Melakukan perbaikan tiada henti', 'Sesuai Ekspektasi', '2025-07-12 05:42:24', '2025-07-12 05:42:24');

-- Dumping structure for table devi.work_results
CREATE TABLE IF NOT EXISTS `work_results` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `skp_report_id` bigint unsigned NOT NULL,
  `type` enum('utama','tambahan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `rencana_hasil_kerja_pimpinan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rencana_hasil_kerja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `work_results_skp_report_id_foreign` (`skp_report_id`),
  CONSTRAINT `work_results_skp_report_id_foreign` FOREIGN KEY (`skp_report_id`) REFERENCES `skp_reports` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table devi.work_results: ~3 rows (approximately)
INSERT INTO `work_results` (`id`, `skp_report_id`, `type`, `rencana_hasil_kerja_pimpinan`, `rencana_hasil_kerja`, `created_at`, `updated_at`) VALUES
	(3, 3, 'utama', 'tes', 'tes', '2025-06-24 18:49:29', '2025-06-24 18:49:29'),
	(4, 4, 'utama', 'tes', 'tes', '2025-06-24 18:50:04', '2025-06-24 18:50:04'),
	(6, 6, 'utama', 'tes', 'tes', '2025-07-01 18:35:58', '2025-07-01 18:35:58'),
	(7, 7, 'utama', 'tes', 'tes', '2025-07-12 05:42:24', '2025-07-12 05:42:24');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

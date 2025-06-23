-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2025 at 08:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devi`
--

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `instansi`, `created_at`, `updated_at`) VALUES
(1, 'KANTOR REGIONAL VIII BADAN KEPEGAWAIAN NEGARA', '2025-01-09 06:25:09', '2025-01-09 06:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `agency_id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `npwp` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `functional_position_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `position_id`, `grade_id`, `agency_id`, `nip`, `nama_pegawai`, `npwp`, `jenis_kelamin`, `status`, `created_at`, `updated_at`, `functional_position_id`) VALUES
(4, 4, 13, 1, '2110010512', 'devi', '132436457586786', 'P', 'aktif', '2025-02-19 01:35:26', '2025-02-19 01:35:26', 5),
(5, 3, 16, 1, '198207122006042001', 'Sripah,S.AP', '81751623837', 'P', 'aktif', '2025-02-19 01:54:27', '2025-02-19 01:54:27', 10);

-- --------------------------------------------------------

--
-- Table structure for table `functional_positions`
--

CREATE TABLE `functional_positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jabatan_fungsional` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `functional_positions`
--

INSERT INTO `functional_positions` (`id`, `nama_jabatan_fungsional`, `created_at`, `updated_at`) VALUES
(5, 'KEPALA BAGIAN TATA USAHA', '2025-02-19 01:21:26', '2025-02-19 01:21:26'),
(7, 'KEPALA BIDANG PENGANGKATAN DAN PENSIUN', '2025-02-19 01:21:52', '2025-02-19 01:21:52'),
(8, 'KEPALA SUB BAGIAN KEPEGAWAIAN PENGELOLAAN KINERJA', '2025-02-19 01:21:59', '2025-02-19 01:21:59'),
(9, 'KEPALA SUB BAGIAN UMUM', '2025-02-19 01:22:50', '2025-02-19 01:22:50'),
(10, 'KEPALA BIDANG INFORMASI KEPEGAWAIAN', '2025-02-19 01:23:20', '2025-02-19 01:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `golongan` varchar(255) NOT NULL,
  `gaji_pokok` bigint(20) NOT NULL,
  `lama` int(11) NOT NULL,
  `pajak` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `lpj_details`
--

CREATE TABLE `lpj_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lpj_header_id` bigint(20) UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `biaya_kegiatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lpj_details`
--

INSERT INTO `lpj_details` (`id`, `lpj_header_id`, `nama_kegiatan`, `biaya_kegiatan`, `created_at`, `updated_at`) VALUES
(4, 2, 'pelatihan', '5000000', '2025-02-19 01:55:38', '2025-02-19 01:55:38');

-- --------------------------------------------------------

--
-- Table structure for table `lpj_headers`
--

CREATE TABLE `lpj_headers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `sppd_id` bigint(20) UNSIGNED NOT NULL,
  `submission_flag` enum('Y','N') NOT NULL DEFAULT 'N',
  `submission_date` timestamp NULL DEFAULT NULL,
  `approval_status` enum('Y','N') DEFAULT 'N',
  `approval_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lpj_headers`
--

INSERT INTO `lpj_headers` (`id`, `user_id`, `sppd_id`, `submission_flag`, `submission_date`, `approval_status`, `approval_date`, `created_at`, `updated_at`) VALUES
(2, 5, 2, 'N', NULL, 'N', NULL, '2025-02-19 01:55:21', '2025-02-19 01:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

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
(12, '2025_01_09_162600_create_lpj_headers_table', 3),
(14, '2025_01_09_162606_create_lpj_details_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `nama_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'PENANGGUNG JAWAB', '2025-01-09 06:25:24', '2025-01-09 06:25:24'),
(2, 'KETUA', '2025-01-09 06:25:31', '2025-01-09 06:25:31'),
(3, 'SEKRETARIS', '2025-01-09 06:25:38', '2025-01-09 06:25:38'),
(4, 'ANGGOTA', '2025-01-09 06:25:45', '2025-01-09 06:25:45'),
(5, 'BENDAHARA', '2025-01-09 06:25:51', '2025-01-09 06:25:51'),
(6, 'PEJABAT PEMBUAT KOMITMEN', '2025-01-09 06:33:46', '2025-01-09 06:33:46'),
(7, 'ANALIS SDM APARATUR AHLI PERTAMA', '2025-01-09 06:36:34', '2025-01-09 06:36:34');

-- --------------------------------------------------------

--
-- Table structure for table `sppds`
--

CREATE TABLE `sppds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tujuan_sppd` text NOT NULL,
  `transportasi` varchar(255) NOT NULL,
  `tempat_berangkat` varchar(255) NOT NULL,
  `tempat_tujuan` varchar(255) NOT NULL,
  `durasi_sppd` varchar(255) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `pejabat_pembuat_komitmen` varchar(255) NOT NULL,
  `biaya_sppd` int(11) NOT NULL,
  `flag_buat_surat` enum('Y','N') NOT NULL DEFAULT 'N',
  `flag_lpj` enum('Y','N') NOT NULL DEFAULT 'N',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sppds`
--

INSERT INTO `sppds` (`id`, `employee_id`, `nomor_surat`, `tanggal_surat`, `tujuan_sppd`, `transportasi`, `tempat_berangkat`, `tempat_tujuan`, `durasi_sppd`, `tanggal_berangkat`, `tanggal_kembali`, `pejabat_pembuat_komitmen`, `biaya_sppd`, `flag_buat_surat`, `flag_lpj`, `created_at`, `updated_at`) VALUES
(2, 4, '2', '2025-02-13', 'sajkdsajd', 'angkutan udara', 'Banjarbaru', 'Surabaya', '4', '2025-02-15', '2025-02-19', 'devi', 5000000, 'Y', 'N', '2025-02-19 01:52:31', '2025-02-19 01:55:10');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_surat` varchar(255) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `jenis_surat` enum('daftar_hadir','daftar_nominatif','kuitansi') NOT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id`, `no_surat`, `tanggal_surat`, `jenis_surat`, `nama_file`, `created_at`, `updated_at`) VALUES
(19, 'DA-2025-001', '2025-02-19', 'daftar_hadir', 'DAFTAR HADIR_SOSIALISASI_DA-2025-001.pdf', '2025-02-19 01:41:10', '2025-02-19 01:41:10'),
(20, 'KT-2025-001', '2025-02-19', 'kuitansi', 'KUITANSI_SOSIALISASI_KT-2025-001.pdf', '2025-02-19 01:44:54', '2025-02-19 01:44:54'),
(21, 'DA-2025-002', '2025-02-19', 'daftar_hadir', 'DAFTAR HADIR_SOSIALISASI_DA-2025-002.pdf', '2025-02-19 01:47:12', '2025-02-19 01:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `updated_at`, `role`) VALUES
(5, 'admin', '$2y$12$A1yA6DNWyh7OOrb6owD7wuDOI8DK68OtB83pKKM3z4e4D7H3a/.iW', '2025-02-09 16:20:10', '2025-02-09 16:20:10', 'admin'),
(6, '2110010512', '$2y$12$.XckWD3cZTODRuRDu3VqTuHx4poxTfOThJqbVunss3QyrN5WlehCS', '2025-02-19 01:35:26', '2025-02-19 01:35:26', 'pegawai'),
(7, '198207122006042001', '$2y$12$DGcHy5EZXlZKre3ExlXDCeyGO/uk8c0YC3wTTnpdEeiAwyfzxm/92', '2025-02-19 01:54:28', '2025-02-19 01:54:28', 'pegawai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_nip_unique` (`nip`),
  ADD KEY `employees_position_id_foreign` (`position_id`),
  ADD KEY `employees_agency_id_foreign` (`agency_id`),
  ADD KEY `employees_grade_id_foreign` (`grade_id`),
  ADD KEY `employees_functional_position_foreign` (`functional_position_id`);

--
-- Indexes for table `functional_positions`
--
ALTER TABLE `functional_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lpj_details`
--
ALTER TABLE `lpj_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lpj_details_lpj_header_id_foreign` (`lpj_header_id`);

--
-- Indexes for table `lpj_headers`
--
ALTER TABLE `lpj_headers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lpj_headers_user_id_foreign` (`user_id`),
  ADD KEY `lpj_headers_sppd_id_foreign` (`sppd_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sppds`
--
ALTER TABLE `sppds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sppds_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `surat_no_surat_unique` (`no_surat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `functional_positions`
--
ALTER TABLE `functional_positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `lpj_details`
--
ALTER TABLE `lpj_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lpj_headers`
--
ALTER TABLE `lpj_headers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sppds`
--
ALTER TABLE `sppds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`),
  ADD CONSTRAINT `employees_functional_position_foreign` FOREIGN KEY (`functional_position_id`) REFERENCES `functional_positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`);

--
-- Constraints for table `lpj_details`
--
ALTER TABLE `lpj_details`
  ADD CONSTRAINT `lpj_details_lpj_header_id_foreign` FOREIGN KEY (`lpj_header_id`) REFERENCES `lpj_headers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lpj_headers`
--
ALTER TABLE `lpj_headers`
  ADD CONSTRAINT `lpj_headers_sppd_id_foreign` FOREIGN KEY (`sppd_id`) REFERENCES `sppds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lpj_headers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sppds`
--
ALTER TABLE `sppds`
  ADD CONSTRAINT `sppds_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

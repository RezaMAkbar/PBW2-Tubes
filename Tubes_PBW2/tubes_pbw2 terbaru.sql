/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `detail_penerimaan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_nota` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `id_obat` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stock_masuk` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_penerimaan_id_obat_foreign` (`id_obat`),
  CONSTRAINT `detail_penerimaan_id_obat_foreign` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `id_obat` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `image_id_obat_index` (`id_obat`),
  CONSTRAINT `image_id_obat_foreign` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `log_transaksi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tipe` varchar(255) NOT NULL,
  `id_obat` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_penerimaan` bigint(20) unsigned DEFAULT NULL,
  `id_penjualan` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `log_transaksi_id_obat_index` (`id_obat`),
  KEY `log_transaksi_id_penerimaan_foreign` (`id_penerimaan`),
  KEY `log_transaksi_id_penjualan_foreign` (`id_penjualan`),
  CONSTRAINT `log_transaksi_id_obat_foreign` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`) ON DELETE CASCADE,
  CONSTRAINT `log_transaksi_id_penerimaan_foreign` FOREIGN KEY (`id_penerimaan`) REFERENCES `detail_penerimaan` (`id`) ON DELETE CASCADE,
  CONSTRAINT `log_transaksi_id_penjualan_foreign` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `obat` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `expired` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_batch` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `penjualan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `total_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_obat` bigint(20) unsigned NOT NULL,
  `total_barang` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `penjualan_id_obat_index` (`id_obat`),
  CONSTRAINT `penjualan_id_obat_foreign` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `stok_opname` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_obat` bigint(20) unsigned NOT NULL,
  `tempat_simpan` varchar(255) DEFAULT NULL,
  `tanggal_simpan` date DEFAULT NULL,
  `sisa_stock` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `stok_keluar` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stok_opname_id_obat_index` (`id_obat`),
  CONSTRAINT `stok_opname_id_obat_foreign` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `detail_penerimaan` (`id`, `no_nota`, `username`, `tanggal`, `harga_beli`, `total_harga`, `id_obat`, `created_at`, `updated_at`, `stock_masuk`) VALUES
(1, 'hehe21', 'vydyznut', '2023-02-04', 1674, 136316, 17, NULL, '2023-12-19 03:23:19', 12415);
INSERT INTO `detail_penerimaan` (`id`, `no_nota`, `username`, `tanggal`, `harga_beli`, `total_harga`, `id_obat`, `created_at`, `updated_at`, `stock_masuk`) VALUES
(29, 'yue', 'APIUser1234', '1111-11-11', 1, 2, 15, '2023-12-12 06:48:06', '2023-12-12 06:48:06', 3);
INSERT INTO `detail_penerimaan` (`id`, `no_nota`, `username`, `tanggal`, `harga_beli`, `total_harga`, `id_obat`, `created_at`, `updated_at`, `stock_masuk`) VALUES
(30, 'yu', 'APIUser1234', '1111-11-11', 1, 2, 15, '2023-12-12 06:49:56', '2023-12-12 06:49:56', 3);
INSERT INTO `detail_penerimaan` (`id`, `no_nota`, `username`, `tanggal`, `harga_beli`, `total_harga`, `id_obat`, `created_at`, `updated_at`, `stock_masuk`) VALUES
(32, 'hehe21', 'vydyznut', '2023-02-04', 1674, 136316, 17, '2023-12-19 08:10:55', '2023-12-19 08:10:55', 12415),
(33, 'yueer', 'budi1234', '2024-01-04', 14, 21516, 1, '2024-01-04 07:02:25', '2024-01-04 07:02:25', 315),
(34, 'yueer', 'budi1234', '2024-01-01', 51, 13513, 1, '2024-01-04 07:04:27', '2024-01-04 07:04:27', 21),
(35, 'yueer', 'meme12345', '2024-01-24', 14213, 325125136, 30, '2024-01-04 07:04:50', '2024-01-04 07:04:50', 31),
(36, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'budi1234', '2024-01-03', 214, 156, 30, '2024-01-04 07:05:10', '2024-01-04 07:05:10', 134),
(37, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'budi1234', '2024-01-01', 123, 141, 1, '2024-01-04 07:15:11', '2024-01-04 07:15:11', 15);

INSERT INTO `images` (`id`, `name`, `path`, `id_obat`, `created_at`, `updated_at`) VALUES
(10, '5a2411fc6003f508dd5d5b37.png', 'images/5a2411fc6003f508dd5d5b37.png', 14, '2023-12-12 06:30:04', '2023-12-12 06:30:04');
INSERT INTO `images` (`id`, `name`, `path`, `id_obat`, `created_at`, `updated_at`) VALUES
(11, 'ultrakill-minos-prime.gif', 'images/ultrakill-minos-prime.gif', 9, '2023-12-12 06:31:42', '2023-12-12 06:31:42');
INSERT INTO `images` (`id`, `name`, `path`, `id_obat`, `created_at`, `updated_at`) VALUES
(12, 'withered-wojack.gif', 'images/withered-wojack.gif', 15, '2023-12-12 06:45:34', '2023-12-12 06:45:34');

INSERT INTO `log_transaksi` (`id`, `tipe`, `id_obat`, `created_at`, `updated_at`, `id_penerimaan`, `id_penjualan`) VALUES
(2, 'penjualan', 1, '2023-11-13 14:54:43', '2023-11-13 14:54:43', NULL, NULL);
INSERT INTO `log_transaksi` (`id`, `tipe`, `id_obat`, `created_at`, `updated_at`, `id_penerimaan`, `id_penjualan`) VALUES
(3, 'penerimaan', 1, '2023-11-14 00:24:36', '2023-11-14 00:24:36', NULL, NULL);
INSERT INTO `log_transaksi` (`id`, `tipe`, `id_obat`, `created_at`, `updated_at`, `id_penerimaan`, `id_penjualan`) VALUES
(17, 'penerimaan', 15, '2023-12-12 06:49:56', '2023-12-12 06:49:56', 30, NULL);
INSERT INTO `log_transaksi` (`id`, `tipe`, `id_obat`, `created_at`, `updated_at`, `id_penerimaan`, `id_penjualan`) VALUES
(18, 'penjualan', 15, '2023-12-12 06:50:21', '2023-12-12 06:50:21', NULL, 22),
(19, 'penjualan', 1, '2023-12-19 08:09:23', '2023-12-19 08:09:23', NULL, 25),
(20, 'penerimaan', 17, '2023-12-19 08:10:55', '2023-12-19 08:10:55', 32, NULL),
(21, 'penjualan', 17, '2023-12-19 13:38:02', '2023-12-19 13:38:02', NULL, 26),
(22, 'penerimaan', 1, '2024-01-04 07:02:25', '2024-01-04 07:02:25', 33, NULL),
(23, 'penerimaan', 1, '2024-01-04 07:04:27', '2024-01-04 07:04:27', 34, NULL),
(24, 'penerimaan', 30, '2024-01-04 07:04:50', '2024-01-04 07:04:50', 35, NULL),
(25, 'penerimaan', 30, '2024-01-04 07:05:10', '2024-01-04 07:05:10', 36, NULL),
(26, 'penerimaan', 1, '2024-01-04 07:15:11', '2024-01-04 07:15:11', 37, NULL);

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2019_08_19_000000_create_penerimaan_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_10_142111_create_penjualan_table', 1),
(6, '2023_11_10_142215_create_obat_table', 1),
(7, '2023_11_10_142351_create_detail_penjualan_table', 1),
(8, '2023_11_10_143159_create_stok_opname_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 2),
(10, '2023_11_11_160826_edit_column_to_obat_table', 2),
(11, '2023_11_11_161026_edit_column_to_stok_opname_table', 2),
(12, '2023_11_11_161733_create_image_table', 3),
(13, '2023_11_11_161851_create_log_transaksi_table', 3),
(14, '2023_11_11_162209_edit_column_to_detail_penerimaan_table', 4),
(15, '2023_11_11_162930_drop_tanggal_keluar_column_from_obat_table', 5),
(16, '2023_11_12_121211_drop_penerimaan_table', 6),
(17, '2023_11_12_122233_edit_column_to_detail_penerimaan_table', 7),
(18, '2023_11_13_042213_edit_column_to_detail_penjualan_table', 8),
(19, '2023_11_13_042846_drop_detail_penjualan_table', 9),
(20, '2023_11_13_043114_drop_detail_penjualan_table', 10),
(21, '2023_11_13_112337_edit_column_to_stok_opname_table', 11),
(22, '2023_11_13_113934_edit_column_to_penjualan_table', 12),
(23, '2023_11_14_005504_edit_column_to_log_transaksi_table', 13),
(24, '2023_11_25_080217_modify_stok_opname_table', 14),
(25, '2023_11_25_143956_modify_detail_penerimaan_table', 15);

INSERT INTO `obat` (`id`, `nama_obat`, `stock`, `harga`, `tanggal_masuk`, `expired`, `created_at`, `updated_at`, `no_batch`) VALUES
(1, 'test', 352, 4, '2023-11-02', '2023-12-16', NULL, '2024-01-04 07:15:11', '111');
INSERT INTO `obat` (`id`, `nama_obat`, `stock`, `harga`, `tanggal_masuk`, `expired`, `created_at`, `updated_at`, `no_batch`) VALUES
(3, 'Obat Bruhman', 325, 30000, '2023-11-17', '2023-12-09', '2023-11-12 13:59:46', '2023-11-24 21:11:33', '151BCE');
INSERT INTO `obat` (`id`, `nama_obat`, `stock`, `harga`, `tanggal_masuk`, `expired`, `created_at`, `updated_at`, `no_batch`) VALUES
(6, 'Obat Bruhman2', 69, 420, '2027-09-07', '2023-10-30', '2023-11-14 03:08:47', '2023-11-24 21:09:58', '121HAHA');
INSERT INTO `obat` (`id`, `nama_obat`, `stock`, `harga`, `tanggal_masuk`, `expired`, `created_at`, `updated_at`, `no_batch`) VALUES
(7, 'abc12', 12, 124, '2023-11-15', '2023-12-09', '2023-11-24 21:17:47', '2023-11-24 21:18:07', '1ABC2'),
(8, 'testing', 123, 15, '2023-11-17', '2023-12-02', '2023-11-25 08:00:18', '2023-11-25 08:00:18', '1515'),
(9, 'testing edit', 123135, 15136, '7854-05-23', '5899-04-27', '2023-11-25 08:08:24', '2023-12-12 06:31:42', '15151A'),
(14, 'Ga', 13, 56, '0001-01-01', '9999-12-31', '2023-11-25 16:36:30', '2023-12-18 14:03:03', 'Hehe2'),
(15, 'mind rotter', 7, 300000000, '0001-01-01', '9999-12-31', '2023-12-12 06:45:10', '2023-12-12 06:50:21', 'TheOnly2'),
(17, 'Panadol Hitam', 0, 2000000, '0001-01-01', '9999-12-31', '2023-12-18 12:39:28', '2023-12-19 13:38:02', 'Hehe1'),
(30, 'Aliquip nobis magni', 169, 7, '1995-07-27', '2007-09-05', '2024-01-04 07:03:47', '2024-01-04 07:05:10', 'Irure expedita vero'),
(31, 'Consectetur labore', 37, 97, '1975-04-07', '1993-08-05', '2024-01-04 07:17:40', '2024-01-04 07:17:40', 'In reprehenderit do'),
(32, 'Dolor neque molestia', 83, 66, '1992-11-18', '1985-05-11', '2024-01-04 07:17:46', '2024-01-04 07:17:46', 'Tempore incididunt'),
(33, 'Nihil sunt non minim', 84, 24, '1989-01-13', '2008-09-26', '2024-01-04 07:17:53', '2024-01-04 07:17:53', 'Consequatur Sit eo'),
(34, 'Sed est eum quis nos', 62, 37, '1982-01-06', '2018-09-14', '2024-01-04 07:18:00', '2024-01-04 07:18:00', 'Accusantium eum perf'),
(35, 'Qui quia in harum et', 42, 46, '2003-01-26', '1982-09-02', '2024-01-04 07:18:57', '2024-01-04 07:18:57', 'Doloribus ullamco re');





INSERT INTO `penjualan` (`id`, `username`, `tanggal_transaksi`, `total_harga`, `created_at`, `updated_at`, `id_obat`, `total_barang`) VALUES
(1, 'vydyznut', '2023-02-04', 136316, '2023-11-13 12:30:08', '2023-12-19 08:01:09', 17, 12415);
INSERT INTO `penjualan` (`id`, `username`, `tanggal_transaksi`, `total_harga`, `created_at`, `updated_at`, `id_obat`, `total_barang`) VALUES
(2, 'budi1234', '2023-11-02', 1, '2023-11-13 13:01:21', '2023-11-13 13:01:21', 3, 2);
INSERT INTO `penjualan` (`id`, `username`, `tanggal_transaksi`, `total_harga`, `created_at`, `updated_at`, `id_obat`, `total_barang`) VALUES
(3, 'budi1234', '2023-10-31', 1, '2023-11-13 13:07:26', '2023-11-13 13:07:26', 3, 1);
INSERT INTO `penjualan` (`id`, `username`, `tanggal_transaksi`, `total_harga`, `created_at`, `updated_at`, `id_obat`, `total_barang`) VALUES
(4, 'budi1234', '2023-11-04', 6, '2023-11-13 13:22:52', '2023-11-13 13:22:52', 1, 6),
(5, 'budi1234', '2023-11-04', 6, '2023-11-13 13:22:52', '2023-11-13 13:22:52', 1, 6),
(6, 'budi1234', '2023-11-03', 1, '2023-11-13 13:24:17', '2023-11-13 13:24:17', 1, 1),
(7, 'vydyznut', '2023-11-01', 178, '2023-11-13 14:05:00', '2023-11-13 14:05:00', 1, 1814),
(8, 'budi1234', '2023-11-16', 16, '2023-11-13 14:15:11', '2023-11-13 14:15:11', 3, 1111111),
(9, 'vydyznut', '2023-11-11', 1, '2023-11-13 14:17:34', '2023-11-13 14:17:34', 1, 89),
(10, 'vydyznut', '2023-10-30', 690796, '2023-11-13 14:19:29', '2023-11-13 14:19:29', 1, 6789),
(11, 'vydyznut', '2023-11-02', 9889, '2023-11-13 14:25:10', '2023-11-13 14:25:10', 1, 898989),
(12, 'budi1234', '2023-11-01', 1010101, '2023-11-13 14:27:08', '2023-11-13 14:27:08', 1, 2),
(13, 'vydyznut', '2024-03-23', 5, '2023-11-13 14:30:32', '2023-11-13 14:30:32', 1, 11),
(14, 'vydyznut', '2023-10-31', 444, '2023-11-13 14:54:43', '2023-11-13 14:54:43', 1, 45),
(15, 'budi1234', '2023-12-06', 151516, '2023-11-14 01:03:25', '2023-11-14 01:03:25', 1, 57),
(16, 'vydyznut', '2023-12-01', 59, '2023-11-14 02:48:24', '2023-11-14 02:48:24', 3, 420),
(17, 'vydyznut', '2023-11-23', 12, '2023-11-25 14:25:01', '2023-11-25 14:25:01', 9, 1),
(18, 'vydyznut', '2023-11-23', 12, '2023-11-25 14:25:30', '2023-11-25 14:25:30', 9, 1),
(20, 'meme12345', '2030-10-31', 14, '2023-11-26 08:30:19', '2023-11-26 08:30:19', 9, 1),
(21, 'meme12345', '2023-11-01', 123, '2023-11-26 08:31:59', '2023-11-26 08:31:59', 9, 123),
(22, 'meme12345', '1112-11-11', 2, '2023-12-12 06:50:21', '2023-12-12 06:50:21', 15, 1),
(23, 'vydyznut', '2023-02-04', 136316, '2023-12-19 07:59:09', '2023-12-19 07:59:09', 17, 1674),
(25, 'vydyznut', '2023-02-05', 1363163, '2023-12-19 08:09:23', '2023-12-19 08:09:23', 1, 16745),
(26, 'meme12345', '2012-02-24', 5, '2023-12-19 13:38:02', '2023-12-19 13:38:02', 17, 99);

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 4, 'auth_token', '219756b7dd270890dc426c25ed4bdd8ad7637bdf07c792eb9a53aa64abff30f1', '[\"*\"]', NULL, NULL, '2023-11-24 21:50:13', '2023-11-24 21:50:13');
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(2, 'App\\Models\\User', 4, 'auth_token', '6ba9f195550c8fdf168982ba6536c16231ae5c25874775278288efc8c161b907', '[\"*\"]', '2023-12-19 13:30:50', NULL, '2023-11-24 21:54:49', '2023-12-19 13:30:50');


INSERT INTO `stok_opname` (`id`, `id_obat`, `tempat_simpan`, `tanggal_simpan`, `sisa_stock`, `created_at`, `updated_at`, `keterangan`, `stok_keluar`) VALUES
(1, 9, 'Gudang A', '2023-11-17', 12, '2023-11-25 08:08:24', '2023-11-25 19:41:00', 'AERAX', 123);
INSERT INTO `stok_opname` (`id`, `id_obat`, `tempat_simpan`, `tanggal_simpan`, `sisa_stock`, `created_at`, `updated_at`, `keterangan`, `stok_keluar`) VALUES
(6, 14, NULL, '2222-02-22', NULL, '2023-11-25 16:36:30', '2023-11-25 16:36:30', NULL, NULL);
INSERT INTO `stok_opname` (`id`, `id_obat`, `tempat_simpan`, `tanggal_simpan`, `sisa_stock`, `created_at`, `updated_at`, `keterangan`, `stok_keluar`) VALUES
(7, 9, 'Gudang B', '2023-11-15', 1234, '2023-11-25 20:28:25', '2023-11-25 20:28:25', '2ket', 1254);
INSERT INTO `stok_opname` (`id`, `id_obat`, `tempat_simpan`, `tanggal_simpan`, `sisa_stock`, `created_at`, `updated_at`, `keterangan`, `stok_keluar`) VALUES
(8, 15, NULL, '0001-01-01', NULL, '2023-12-12 06:45:10', '2023-12-12 06:45:10', NULL, NULL),
(10, 15, 'GUDANG C', '1452-02-21', 346, '2023-12-12 06:51:42', '2023-12-12 06:51:42', 'ehe', 156),
(11, 15, 'GUDANG DE', '0446-05-13', 235, '2023-12-12 06:52:20', '2023-12-12 06:53:19', 'aaaaaaa', 2462),
(12, 17, 'hehe21', '0001-01-01', 1, '2023-12-18 04:21:34', '2023-12-19 13:16:28', 'heheheheheheh', 1),
(14, 30, NULL, '1995-07-27', NULL, '2024-01-04 07:03:47', '2024-01-04 07:03:47', NULL, NULL),
(15, 31, NULL, '1975-04-07', NULL, '2024-01-04 07:17:40', '2024-01-04 07:17:40', NULL, NULL),
(16, 32, NULL, '1992-11-18', NULL, '2024-01-04 07:17:46', '2024-01-04 07:17:46', NULL, NULL),
(17, 33, NULL, '1989-01-13', NULL, '2024-01-04 07:17:53', '2024-01-04 07:17:53', NULL, NULL),
(18, 34, NULL, '1982-01-06', NULL, '2024-01-04 07:18:00', '2024-01-04 07:18:00', NULL, NULL),
(19, 35, NULL, '2003-01-26', NULL, '2024-01-04 07:18:57', '2024-01-04 07:18:57', NULL, NULL);

INSERT INTO `users` (`id`, `username`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'budi1234', 'Isadora Sampson', 'dinuma@mailinator.com', NULL, '$2y$12$PeuyUBFiTErZpBxJswbRO.KerGswMuIqz3SVh4tk7FGzTg83J1Htm', NULL, '2023-11-11 04:19:10', '2023-11-11 04:19:10');
INSERT INTO `users` (`id`, `username`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'vydyznut', 'Orson Heath', 'tyty@mailinator.com', NULL, '$2y$12$MseJOTaJzbmwe41XsRS8y.Ymj0oErbi5k6bM/HN7ZulX.W0aT3s7u', NULL, '2023-11-12 13:36:43', '2023-11-12 13:36:43');
INSERT INTO `users` (`id`, `username`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'meme12345', 'Meme', 'meme123@meme.meme', NULL, '$2y$12$OkEm3SQ1u3UsIFboVf4bfeBb/06.PI9VQG014MYnYCQdOrSE9qKxi', NULL, '2023-11-24 20:58:56', '2023-11-24 20:58:56');
INSERT INTO `users` (`id`, `username`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'APIUser1234', 'APIUser', 'apitest@test.test', NULL, '$2y$12$fO.PQSLqaxddbQv1BmszjOWujG2XaLr.cBG7b0if6JFY5ykwBpFQ6', NULL, '2023-11-24 21:50:13', '2023-11-24 21:50:13');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
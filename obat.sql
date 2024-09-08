/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50739 (5.7.39)
 Source Host           : localhost:3306
 Source Schema         : obat

 Target Server Type    : MySQL
 Target Server Version : 50739 (5.7.39)
 File Encoding         : 65001

 Date: 08/09/2024 21:50:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for jenis
-- ----------------------------
DROP TABLE IF EXISTS `jenis`;
CREATE TABLE `jenis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jenis
-- ----------------------------
BEGIN;
INSERT INTO `jenis` (`id`, `nama`, `created_at`, `updated_at`) VALUES (1, 'Antibiotik', NULL, '2024-09-07 00:20:07');
INSERT INTO `jenis` (`id`, `nama`, `created_at`, `updated_at`) VALUES (2, 'Analgesik', '2024-09-07 00:20:13', '2024-09-07 00:20:13');
INSERT INTO `jenis` (`id`, `nama`, `created_at`, `updated_at`) VALUES (3, 'Vitamin', '2024-09-07 00:20:18', '2024-09-07 00:20:18');
COMMIT;

-- ----------------------------
-- Table structure for keputusan
-- ----------------------------
DROP TABLE IF EXISTS `keputusan`;
CREATE TABLE `keputusan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `terjual` varchar(255) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keputusan
-- ----------------------------
BEGIN;
INSERT INTO `keputusan` (`id`, `nama`, `jenis`, `terjual`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES (1, 'Allyplus', 'Analgesik', '761', 'Murah', 'L', NULL, '2024-09-07 02:32:10');
INSERT INTO `keputusan` (`id`, `nama`, `jenis`, `terjual`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES (2, 'Bassa', 'Antibiotik', '29', 'Murah', 'TL', NULL, '2024-09-07 02:32:10');
INSERT INTO `keputusan` (`id`, `nama`, `jenis`, `terjual`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES (3, 'Dimacide', 'Antibiotik', '25', 'Murah', 'TL', NULL, '2024-09-07 02:32:10');
INSERT INTO `keputusan` (`id`, `nama`, `jenis`, `terjual`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES (4, 'DMA 6', 'Analgesik', '321', 'Normal', 'L', NULL, '2024-09-07 02:32:10');
INSERT INTO `keputusan` (`id`, `nama`, `jenis`, `terjual`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES (5, 'Fillia', 'Vitamin', '243', 'Murah', 'L', NULL, '2024-09-07 02:32:10');
INSERT INTO `keputusan` (`id`, `nama`, `jenis`, `terjual`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES (6, 'Goal', 'Analgesik', '268', 'Normal', 'L', NULL, '2024-09-07 02:32:10');
INSERT INTO `keputusan` (`id`, `nama`, `jenis`, `terjual`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES (7, 'Golma', 'Analgesik', '87', 'Mahal', 'L', NULL, '2024-09-07 02:32:10');
INSERT INTO `keputusan` (`id`, `nama`, `jenis`, `terjual`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES (8, 'Gramaxone', 'Analgesik', '278', 'Normal', 'L', NULL, '2024-09-07 02:32:10');
INSERT INTO `keputusan` (`id`, `nama`, `jenis`, `terjual`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES (9, 'Lindomin', 'Analgesik', '67', 'Murah', 'TL', NULL, '2024-09-07 02:32:10');
INSERT INTO `keputusan` (`id`, `nama`, `jenis`, `terjual`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES (10, 'Marshall', 'Antibiotik', '283', 'Murah', 'L', NULL, '2024-09-07 02:32:10');
INSERT INTO `keputusan` (`id`, `nama`, `jenis`, `terjual`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES (11, 'MestafeN', 'Antibiotik', '19', 'Murah', 'TL', NULL, '2024-09-07 02:32:10');
INSERT INTO `keputusan` (`id`, `nama`, `jenis`, `terjual`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES (12, 'Mipcinta 50 WP', 'Antibiotik', '80', 'Murah', 'TL', NULL, '2024-09-07 02:32:10');
INSERT INTO `keputusan` (`id`, `nama`, `jenis`, `terjual`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES (13, 'Nomine', 'Analgesik', '155', 'Mahal', 'L', NULL, '2024-09-07 02:32:10');
INSERT INTO `keputusan` (`id`, `nama`, `jenis`, `terjual`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES (14, 'Plenum', 'Antibiotik', '44', 'Normal', 'TL', NULL, '2024-09-07 02:32:10');
INSERT INTO `keputusan` (`id`, `nama`, `jenis`, `terjual`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES (15, 'Rexroot', 'Analgesik', '16', 'Normal', 'TL', NULL, '2024-09-07 02:32:10');
INSERT INTO `keputusan` (`id`, `nama`, `jenis`, `terjual`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES (16, 'Ricestar', 'Analgesik', '151', 'Mahal', 'L', NULL, '2024-09-07 02:32:10');
INSERT INTO `keputusan` (`id`, `nama`, `jenis`, `terjual`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES (17, 'Sidafos', 'Analgesik', '193', 'Normal', 'TL', NULL, '2024-09-07 02:32:10');
INSERT INTO `keputusan` (`id`, `nama`, `jenis`, `terjual`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES (18, 'Spontan', 'Antibiotik', '136', 'Murah', 'TL', NULL, '2024-09-07 02:32:10');
INSERT INTO `keputusan` (`id`, `nama`, `jenis`, `terjual`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES (19, 'Starban', 'Antibiotik', '196', 'Murah', 'TL', NULL, '2024-09-07 02:32:10');
INSERT INTO `keputusan` (`id`, `nama`, `jenis`, `terjual`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES (21, 'Rexroot', 'Analgesik', '2', 'Murah', 'TL', NULL, NULL);
INSERT INTO `keputusan` (`id`, `nama`, `jenis`, `terjual`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES (22, 'paracetamol', 'Analgesik', '100', 'Murah', 'L', '2024-09-07 03:59:43', '2024-09-07 03:59:43');
COMMIT;

-- ----------------------------
-- Table structure for keranjang_belanja
-- ----------------------------
DROP TABLE IF EXISTS `keranjang_belanja`;
CREATE TABLE `keranjang_belanja` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `obat_id` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keranjang_belanja
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for obat
-- ----------------------------
DROP TABLE IF EXISTS `obat`;
CREATE TABLE `obat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of obat
-- ----------------------------
BEGIN;
INSERT INTO `obat` (`id`, `kode`, `jenis`, `nama`, `harga_beli`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES (7, 'BB0001', '2', 'paracetamol', 1000, 2000, 991, '2024-09-07 00:30:00', '2024-09-08 12:45:20');
INSERT INTO `obat` (`id`, `kode`, `jenis`, `nama`, `harga_beli`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES (8, 'BB0002', '1', 'panadol', 2000, 3000, 83, '2024-09-07 00:33:18', '2024-09-08 12:45:20');
COMMIT;

-- ----------------------------
-- Table structure for pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bagian` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pelanggan
-- ----------------------------
BEGIN;
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `telp`, `created_at`, `updated_at`, `bagian`) VALUES (6, 'adi', 'jl kayu tangi', '0987654567', '2024-04-02 12:56:47', '2024-04-02 12:56:47', NULL);
COMMIT;

-- ----------------------------
-- Table structure for pembelian
-- ----------------------------
DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE `pembelian` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `total` int(11) DEFAULT NULL,
  `supplier_id` int(11) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_transaksi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `supplier_id_pembelian` (`supplier_id`),
  CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pembelian
-- ----------------------------
BEGIN;
INSERT INTO `pembelian` (`id`, `total`, `supplier_id`, `created_at`, `updated_at`, `no_transaksi`) VALUES (11, 5000, 1, '2024-09-08 12:45:17', '2024-09-08 12:45:20', 'TRSPB-0001');
COMMIT;

-- ----------------------------
-- Table structure for pembelian_detail
-- ----------------------------
DROP TABLE IF EXISTS `pembelian_detail`;
CREATE TABLE `pembelian_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pembelian_id` int(11) unsigned DEFAULT NULL,
  `obat_id` int(11) unsigned DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pembelian_detail
-- ----------------------------
BEGIN;
INSERT INTO `pembelian_detail` (`id`, `pembelian_id`, `obat_id`, `harga`, `jumlah`, `subtotal`) VALUES (6, 8, 4, 41231, 2, 82462);
INSERT INTO `pembelian_detail` (`id`, `pembelian_id`, `obat_id`, `harga`, `jumlah`, `subtotal`) VALUES (7, 8, 6, 234, 10, 2340);
INSERT INTO `pembelian_detail` (`id`, `pembelian_id`, `obat_id`, `harga`, `jumlah`, `subtotal`) VALUES (8, 9, 4, 41231, 1, 41231);
INSERT INTO `pembelian_detail` (`id`, `pembelian_id`, `obat_id`, `harga`, `jumlah`, `subtotal`) VALUES (11, 11, 7, 2000, 1, 2000);
INSERT INTO `pembelian_detail` (`id`, `pembelian_id`, `obat_id`, `harga`, `jumlah`, `subtotal`) VALUES (12, 11, 8, 3000, 1, 3000);
COMMIT;

-- ----------------------------
-- Table structure for penjualan
-- ----------------------------
DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE `penjualan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `total` int(11) DEFAULT NULL,
  `pelanggan_id` int(11) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_transaksi` varchar(255) DEFAULT NULL,
  `kustomer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `retail_id_penjualan` (`pelanggan_id`),
  CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of penjualan
-- ----------------------------
BEGIN;
INSERT INTO `penjualan` (`id`, `total`, `pelanggan_id`, `created_at`, `updated_at`, `no_transaksi`, `kustomer`) VALUES (10, 34000, NULL, '2024-09-07 01:15:01', '2024-09-07 01:15:04', 'TRSPJ-0001', 'udin');
INSERT INTO `penjualan` (`id`, `total`, `pelanggan_id`, `created_at`, `updated_at`, `no_transaksi`, `kustomer`) VALUES (11, 50000, NULL, '2024-09-07 01:16:02', '2024-09-07 01:16:07', 'TRSPJ-0002', 'udin');
COMMIT;

-- ----------------------------
-- Table structure for penjualan_detail
-- ----------------------------
DROP TABLE IF EXISTS `penjualan_detail`;
CREATE TABLE `penjualan_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `penjualan_id` int(11) DEFAULT NULL,
  `obat_id` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of penjualan_detail
-- ----------------------------
BEGIN;
INSERT INTO `penjualan_detail` (`id`, `penjualan_id`, `obat_id`, `harga`, `jumlah`, `subtotal`) VALUES (6, 9, 4, 41231, 10, 412310);
INSERT INTO `penjualan_detail` (`id`, `penjualan_id`, `obat_id`, `harga`, `jumlah`, `subtotal`) VALUES (7, 10, 7, 2000, 2, 4000);
INSERT INTO `penjualan_detail` (`id`, `penjualan_id`, `obat_id`, `harga`, `jumlah`, `subtotal`) VALUES (8, 10, 8, 3000, 10, 30000);
INSERT INTO `penjualan_detail` (`id`, `penjualan_id`, `obat_id`, `harga`, `jumlah`, `subtotal`) VALUES (9, 11, 7, 2000, 10, 20000);
INSERT INTO `penjualan_detail` (`id`, `penjualan_id`, `obat_id`, `harga`, `jumlah`, `subtotal`) VALUES (10, 11, 8, 3000, 10, 30000);
COMMIT;

-- ----------------------------
-- Table structure for retur_pembelian
-- ----------------------------
DROP TABLE IF EXISTS `retur_pembelian`;
CREATE TABLE `retur_pembelian` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `total` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_transaksi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of retur_pembelian
-- ----------------------------
BEGIN;
INSERT INTO `retur_pembelian` (`id`, `total`, `supplier_id`, `created_at`, `updated_at`, `no_transaksi`) VALUES (9, 44000, 1, '2022-10-17 14:57:38', '2022-10-17 14:57:41', 'RPB-0001');
COMMIT;

-- ----------------------------
-- Table structure for retur_pembelian_detail
-- ----------------------------
DROP TABLE IF EXISTS `retur_pembelian_detail`;
CREATE TABLE `retur_pembelian_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `retur_pembelian_id` int(11) DEFAULT NULL,
  `barang_id` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of retur_pembelian_detail
-- ----------------------------
BEGIN;
INSERT INTO `retur_pembelian_detail` (`id`, `retur_pembelian_id`, `barang_id`, `harga`, `jumlah`, `subtotal`) VALUES (2, 9, 1, 4400, 10, 44000);
COMMIT;

-- ----------------------------
-- Table structure for role_users
-- ----------------------------
DROP TABLE IF EXISTS `role_users`;
CREATE TABLE `role_users` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  UNIQUE KEY `role_users_user_id_role_id_unique` (`user_id`,`role_id`) USING BTREE,
  KEY `role_users_role_id_foreign` (`role_id`) USING BTREE,
  CONSTRAINT `role_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of role_users
-- ----------------------------
BEGIN;
INSERT INTO `role_users` (`user_id`, `role_id`) VALUES (1, 1);
COMMIT;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (1, 'superadmin', '2020-12-23 23:17:35', '2020-12-23 23:17:35');
COMMIT;

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of supplier
-- ----------------------------
BEGIN;
INSERT INTO `supplier` (`id`, `nama`, `alamat`, `telp`, `created_at`, `updated_at`) VALUES (1, 'PT Paramedis', 'jl.....', '0987656789', '2022-10-17 14:03:39', '2024-09-07 00:37:14');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(255) NOT NULL,
  `password_superadmin` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `api_token` varchar(255) DEFAULT NULL,
  `last_session` varchar(255) DEFAULT NULL,
  `change_password` int(1) unsigned DEFAULT '0' COMMENT '0: belum, 1: sudah',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_username_unique` (`username`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `password_superadmin`, `remember_token`, `created_at`, `updated_at`, `api_token`, `last_session`, `change_password`) VALUES (1, 'admin', NULL, 'admin', '2024-09-08 21:34:42', '$2y$10$3k7FLC2TkBzYnumOyiv7BOmTOsTzzJHb3/p4aKcBUoGonp4Jij0Wu', NULL, 'DoQLhzPmSMtkTXDQHFvk2XU4YKPYdvnMNogpK7stMaolSFloDLtIiyiTUb1h', '2024-09-08 21:34:42', '2024-09-08 21:34:42', NULL, NULL, 0);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;

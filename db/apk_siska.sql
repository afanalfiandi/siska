/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100421
 Source Host           : localhost:3306
 Source Schema         : apk_siska

 Target Server Type    : MySQL
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 23/02/2022 15:49:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_admin`) USING BTREE,
  INDEX `nip`(`nip`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (2, 'afan', '123', '202cb962ac59075b964b07152d234b70', 'gambar.png');

-- ----------------------------
-- Table structure for agenda
-- ----------------------------
DROP TABLE IF EXISTS `agenda`;
CREATE TABLE `agenda`  (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `files` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `bulan` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_agenda`) USING BTREE,
  INDEX `nis_agenda_export`(`nis`) USING BTREE,
  CONSTRAINT `nis_agenda_export` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for agenda_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `agenda_kegiatan`;
CREATE TABLE `agenda_kegiatan`  (
  `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_kegiatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_kegiatan` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_kegiatan`) USING BTREE,
  INDEX `nis_agenda`(`nis`) USING BTREE,
  CONSTRAINT `nis_agenda` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for berita
-- ----------------------------
DROP TABLE IF EXISTS `berita`;
CREATE TABLE `berita`  (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `isi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_terbit` date NULL DEFAULT NULL,
  `id_berita_detail` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_berita`) USING BTREE,
  INDEX `berita`(`id_berita_detail`) USING BTREE,
  CONSTRAINT `berita` FOREIGN KEY (`id_berita_detail`) REFERENCES `berita_detail` (`id_berita_detail`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for berita_detail
-- ----------------------------
DROP TABLE IF EXISTS `berita_detail`;
CREATE TABLE `berita_detail`  (
  `id_berita_detail` int(11) NOT NULL AUTO_INCREMENT,
  `tujuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_berita_detail`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of berita_detail
-- ----------------------------
INSERT INTO `berita_detail` VALUES (1, 'Umum');
INSERT INTO `berita_detail` VALUES (2, 'Guru');
INSERT INTO `berita_detail` VALUES (3, 'Siswa');
INSERT INTO `berita_detail` VALUES (4, 'Karyawan');

-- ----------------------------
-- Table structure for bukti_monitoring
-- ----------------------------
DROP TABLE IF EXISTS `bukti_monitoring`;
CREATE TABLE `bukti_monitoring`  (
  `id_bukti_monitoring` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `files` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_iduka` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_bukti_monitoring`) USING BTREE,
  INDEX `nDm`(`nip`) USING BTREE,
  INDEX `iduka_bm`(`id_iduka`) USING BTREE,
  CONSTRAINT `bukti_monitoring_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `iduka_bm` FOREIGN KEY (`id_iduka`) REFERENCES `iduka` (`id_iduka`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for daftar_hadir
-- ----------------------------
DROP TABLE IF EXISTS `daftar_hadir`;
CREATE TABLE `daftar_hadir`  (
  `id_daftar_hadir` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `files` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `bulan` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_daftar_hadir`) USING BTREE,
  INDEX `nis_dh`(`nis`) USING BTREE,
  CONSTRAINT `nis_dh` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for data_monitoring
-- ----------------------------
DROP TABLE IF EXISTS `data_monitoring`;
CREATE TABLE `data_monitoring`  (
  `id_data_monitoring` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `files` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_iduka` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_data_monitoring`) USING BTREE,
  INDEX `nip_dm`(`nip`) USING BTREE,
  INDEX `iduka_dm`(`id_iduka`) USING BTREE,
  CONSTRAINT `nip_dm` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `iduka_dm` FOREIGN KEY (`id_iduka`) REFERENCES `iduka` (`id_iduka`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dokumen_saya
-- ----------------------------
DROP TABLE IF EXISTS `dokumen_saya`;
CREATE TABLE `dokumen_saya`  (
  `id_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_dokumen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `files` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_upload` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_dokumen`) USING BTREE,
  INDEX `nip_dok_saya_karyawan`(`nip`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dokumen_saya
-- ----------------------------
INSERT INTO `dokumen_saya` VALUES (9, '1231', 'aw', 'e9d7905ec825c65537cdb3b1939f7f8f.sql', '2022-02-15');

-- ----------------------------
-- Table structure for dokumen_umum
-- ----------------------------
DROP TABLE IF EXISTS `dokumen_umum`;
CREATE TABLE `dokumen_umum`  (
  `id_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `id_dokumen_umum_detail` int(11) NULL DEFAULT NULL,
  `nama_dokumen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `files` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_upload` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_dokumen`) USING BTREE,
  INDEX `id_dok_umum`(`id_dokumen_umum_detail`) USING BTREE,
  CONSTRAINT `id_dok_umum` FOREIGN KEY (`id_dokumen_umum_detail`) REFERENCES `dokumen_umum_detail` (`id_dokumen_umum_detail`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dokumen_umum
-- ----------------------------
INSERT INTO `dokumen_umum` VALUES (3, 1, 'Kurikulum', '018f27079be7b6598f18f6bd6afb7465.pdf', '2022-02-23');

-- ----------------------------
-- Table structure for dokumen_umum_detail
-- ----------------------------
DROP TABLE IF EXISTS `dokumen_umum_detail`;
CREATE TABLE `dokumen_umum_detail`  (
  `id_dokumen_umum_detail` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_dokumen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_dokumen_umum_detail`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dokumen_umum_detail
-- ----------------------------
INSERT INTO `dokumen_umum_detail` VALUES (1, 'Kurikulum');
INSERT INTO `dokumen_umum_detail` VALUES (2, 'Kesiswaan');
INSERT INTO `dokumen_umum_detail` VALUES (3, 'Sarpras');
INSERT INTO `dokumen_umum_detail` VALUES (4, 'HKI');
INSERT INTO `dokumen_umum_detail` VALUES (5, 'SDM');
INSERT INTO `dokumen_umum_detail` VALUES (6, 'PMS');
INSERT INTO `dokumen_umum_detail` VALUES (7, 'Keuangan');
INSERT INTO `dokumen_umum_detail` VALUES (8, 'Pengembangan IT');

-- ----------------------------
-- Table structure for dokumen_wajib
-- ----------------------------
DROP TABLE IF EXISTS `dokumen_wajib`;
CREATE TABLE `dokumen_wajib`  (
  `id_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `id_dokumen_wajib_detail` int(11) NULL DEFAULT NULL,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `files` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_upload` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_dokumen`) USING BTREE,
  INDEX `nip_dok_wajib_karyawan`(`nip`) USING BTREE,
  INDEX `id_dok_wajib`(`id_dokumen_wajib_detail`) USING BTREE,
  CONSTRAINT `id_dok_wajib` FOREIGN KEY (`id_dokumen_wajib_detail`) REFERENCES `dokumen_wajib_detail` (`id_dokumen_wajib_detail`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dokumen_wajib
-- ----------------------------
INSERT INTO `dokumen_wajib` VALUES (15, 9, '1231', '43a4784d0b47cff2ac4c7a916b134bcd.pdf', '2022-02-15');
INSERT INTO `dokumen_wajib` VALUES (16, 9, '123', 'dc16517d5910cfbd7d56d2eb04e35088.pdf', '2022-02-15');
INSERT INTO `dokumen_wajib` VALUES (17, 9, '123', 'b2a4df62310ebc44d7d70e8f73721d98.pdf', '2022-02-23');
INSERT INTO `dokumen_wajib` VALUES (18, 11, '123', 'b2a4df62310ebc44d7d70e8f73721d98.pdf', '2022-02-23');

-- ----------------------------
-- Table structure for dokumen_wajib_detail
-- ----------------------------
DROP TABLE IF EXISTS `dokumen_wajib_detail`;
CREATE TABLE `dokumen_wajib_detail`  (
  `id_dokumen_wajib_detail` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_dokumen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_dokumen_wajib_detail`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 56 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dokumen_wajib_detail
-- ----------------------------
INSERT INTO `dokumen_wajib_detail` VALUES (1, 'KARTU PEGAWAI (KARPEG)');
INSERT INTO `dokumen_wajib_detail` VALUES (2, 'SUMPAH JANJI PNS (SJ. PNS)');
INSERT INTO `dokumen_wajib_detail` VALUES (3, 'TASPEN');
INSERT INTO `dokumen_wajib_detail` VALUES (4, 'PENILAIN PRESTASI KERJA TAHUN 2018');
INSERT INTO `dokumen_wajib_detail` VALUES (5, 'PENILAIN PRESTASI KERJA TAHUN 2019');
INSERT INTO `dokumen_wajib_detail` VALUES (6, 'SKP TAHUN 2018');
INSERT INTO `dokumen_wajib_detail` VALUES (7, 'KARTU KELUARGA (KK)');
INSERT INTO `dokumen_wajib_detail` VALUES (8, 'SKKP TERAKHIR');
INSERT INTO `dokumen_wajib_detail` VALUES (9, 'GAJI BERKALA TERAKHIR');
INSERT INTO `dokumen_wajib_detail` VALUES (10, 'IJAZAH TERAKHIR');
INSERT INTO `dokumen_wajib_detail` VALUES (11, 'SK CPNS');

-- ----------------------------
-- Table structure for format_bimbingan
-- ----------------------------
DROP TABLE IF EXISTS `format_bimbingan`;
CREATE TABLE `format_bimbingan`  (
  `id_format_bimbingan` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `files` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_mulai` date NULL DEFAULT NULL,
  `tgl_akhir` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_format_bimbingan`) USING BTREE,
  INDEX `nis_fbim`(`nis`) USING BTREE,
  CONSTRAINT `nis_fbim` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for guru
-- ----------------------------
DROP TABLE IF EXISTS `guru`;
CREATE TABLE `guru`  (
  `id_guru` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_jurusan_detail` int(11) NULL DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_guru`) USING BTREE,
  INDEX `nip`(`nip`) USING BTREE,
  INDEX `id_jurusan_detail`(`id_jurusan_detail`) USING BTREE,
  CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_jurusan_detail`) REFERENCES `jurusan_detail` (`id_jurusan_detail`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of guru
-- ----------------------------
INSERT INTO `guru` VALUES (8, '123', '202cb962ac59075b964b07152d234b70', 'asd', 2, '123');
INSERT INTO `guru` VALUES (9, '124', '202cb962ac59075b964b07152d234b70', 'Eo', 7, '123');
INSERT INTO `guru` VALUES (26, '1803040032', '202cb962ac59075b964b07152d234b70', 'Afan Alfi Andi', 2, 'default.png');

-- ----------------------------
-- Table structure for iduka
-- ----------------------------
DROP TABLE IF EXISTS `iduka`;
CREATE TABLE `iduka`  (
  `id_iduka` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `iduka` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_iduka`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 161 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of iduka
-- ----------------------------
INSERT INTO `iduka` VALUES (2, '124', 'DPPKBP3A Kab Banyumas', 'Jl. DR. Soeparno No.57, Purwokerto Wetan.', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (3, '125', 'Univ. Muhammdiyah Purwokerto', 'Jl. Raya Dukuhwaluh, Dusun III, Dukuhwaluh, Kembaran, Kabupaten Banyumas, Jawa Tengah 53182', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (4, '126', 'Badan Kepegawaian Pendidikan dan Pelatihan Daerah Kab. Banyumas', 'Jl. Dr. Soeparno No. 32 Purwokerto', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (5, '127', 'Dinas Pendidikan Kab. Banyumas', 'Jl. Perintis Kemerdekaan 75, Purwokerto', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (6, '128', 'Kantor Dindukcapil Kab. Banyumas', 'l. Jend. Soedirman No. 320 Purwokerto', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (7, '129', 'RS Gigi dan Mulut Univ. Jenderal Soedirman Pwt', 'Jl. DR. Soeparno No.60, Karangwangkal, Kec. Purwokerto Utara, Kabupaten Banyumas', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (8, '130', 'Dinas Arsip dan Perpustakaan Daerah Kab. Banyumas', 'Jl. Jend. Gatot Subroto No. 85 Purwokerto', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (9, '131', 'Dinas Pekerjaan Umum Kab Banyumas', 'Jl. Jend. Gatot Subroto III-5 Purwokerto', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (10, '132', 'LPPM Unsoed Purwokerto', 'Kampus Unsoed Grendeng, Jl. Dr. Soeparno Purwokerto', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (11, '133', 'Bagian Umum Setda Banyumas', 'Jl. Kabupaten No 1 Purwokerto, Sokanegara, Kec. Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah 53115', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (12, '134', 'Dinas Sosial Kab. Banyumas', 'Jl. Pemuda No.24, Kober, Kec. Purwokerto Bar., Kabupaten Banyumas, ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (13, '135', 'PT Jasa Raharja Purwokerto', 'Jl. S. Parman No.82, Purwokerto Kulon, Purwokerto Sel., Kabupaten Banyumas', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (14, '136', 'Kantor Bea Cukai Cilacap', 'Jl. Jend. Sudirman (Sleko), Cilacap - 53213. ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (15, '137', 'PT Sucofindo Cilacap (Persero)', 'Jl. Soekarno Hatta no. 280, Cilacap. ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (16, '138', 'Kantor Imigrai Cilacap', 'Jl. Urip Sumoharjo No.249, Pantusan, Gumilir, Cilacap Utara, Kabupaten Cilacap,', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (17, '139', 'PT. Pelabuhan Indonesia III (Persero) Cabang Tanjung Intan Cilacap', 'Jl. Laut Jawa, Klega, Tambakreja, Cilacap Sel., Kabupaten Cilacap', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (18, '140', 'Dinas Perhubungan Kab. Banyumas', 'Jalan Margantara No.460 Tanjung Purwokerto No.Telp (0281) 637211', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (19, '141', 'Kantor Kemenag Kab. Banyumas', 'Jalan Mayor Jenderal DI Panjaitan No.1, Purwokerto Kidul, Purwokerto', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (20, '142', 'Kantor Pelayanan Pajak Pratama Purwokerto', 'Jend. Gatot Subroto No.107, Kebondalem, Purwokerto', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (21, '143', 'Kantor Disnakertrans dan Koperasi Kab. Banyumas', 'Karang Blimbing, Pabuaran, Kec. Purwokerto Utara, Kabupaten Banyumas, Jawa Tengah 53124', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (22, '144', 'Kantor Agraria/BPN ', 'Jl. Jenderal Sudirman No.356-358, Kranjimuntang, Kranji, Kec. Purwokerto Tim., Kabupaten Banyumas', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (23, '145', 'PDAM Kab. Banyumas', 'Jl. Prof. Dr. Suharso No. 52, Mangunjaya, Purwokerto Lor, Kec. Purwokerto Tim., Kabupaten Banyumas', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (24, '146', 'IAIN Purwokerto', ' Jl. A. Yani No.40A, Karanganjing, Purwanegara, Kec. Purwokerto Utara, Kabupaten Banyumas, Jawa Tengah 53126', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (25, '147', 'PT Taspen Purwokerto', 'Jl. Profesor DR. Suharso No.54, Mangunjaya, Purwokerto Lor, Kec. Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah 53121', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (26, '148', 'Fakultas Kedokteran Unsoed Purwokerto', ' Jl. Dr. Gumbreg, Mersi, Kec. Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah 53112', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (27, '149', 'Fak. Fisip   Univ. Jenderal Soedirman Purwokerto', 'Jl. Prof. HR Bunyamin 993 Purwokerto, 53122', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (28, '150', 'Kantor Dinas Peridustrian dan Perdagangan Kab. Banyumas', 'Jalan Jendral Gatot Subroto No.102 PurwokertoNo. Telp (0281) 636018', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (29, '151', 'Dinas Penanaman Modal dan Pelayanan Perizinan Terpadu Satu Pintu', 'Jl. Jenderal Sudirman No. 540 Purwokerto - Kode Pos 53116', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (30, '152', 'Fakultas Ilmu Budaya Unsoed Pwt', 'Jl. DR. Soeparno No.60, Karangwangkal, Kec. Purwokerto Utara, Kabupaten Banyumas, Jawa Tengah 53122', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (31, '153', 'Kantor Pusat Administrasi Unsoed Pwt', 'Jl. Profesor DR. HR Boenyamin, Dukuhbandong, Grendeng, Kec. Purwokerto Utara, Kabupaten Banyumas, Jawa Tengah 53121', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (32, '154', 'Universitas Wijaya Kusuma', 'Jl. Raya Beji Karangsalam No.25, Dusun II, Karangsalam Kidul, Kedung Banteng, Kabupaten Banyumas, Jawa Tengah 53152', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (33, '155', 'Kantor Polres Banyumas', 'Jalan Letjen. Pol. R. Sumarto No. 100, Karangjambu, Purwanegara, Kec. Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah 53192', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (34, '156', 'Kantor ACC Purwokerto', 'Jl. Suparjo Rustam No. ...  Purwokerto', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (35, '157', 'Meotel Purwokerto', 'Jl. Dr. Soeparno Purwokerto', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (36, '158', 'Fak. Biologi', 'Jl. Dr. Soeparno Purwokerto', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (37, '159', 'Fak. Pertanian', 'Jl. Dr. Soeparno Purwokerto', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (38, '160', 'Fak. MIPA', 'Jl. Dr. Soeparno Purwokerto', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (39, '161', 'Fak. Peternakan', 'Jl. Dr. Soeparno Purwokerto', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (40, '162', 'Fak. Ekonomi dan Bisnis', 'J. Prof Bunyamin Purwokerto', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (41, '163', 'Fak. Hukum', 'J. Prof Bunyamin Purwokerto', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (42, '164', 'BMT SMNU Jatilawang', 'Jl. Raya Jatilawang', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (43, '165', 'BMT Insan Mandiri', 'Komplek Pasar Ajibarang', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (44, '166', 'BMT Dana Mentari Pusat', 'Jl. Raya Karanglewas', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (45, '167', 'BMT Dana Mentari Cabang Pasar Manis', 'Komplek Pasar Manis', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (46, '168', 'BRI Syariah KCP Purwokerto', 'Karang Kobar', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (47, '169', 'BPRS Bina Amanah Sejahtera (BAS)', 'Jl. Pramuka No. 124', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (48, '170', 'KPPS Bersama Kami Kasembadan (BKK)', 'Karanggude Karanglewas', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (49, '171', 'Bank Muamalat KCP Purwoketo', 'Jl. Jend Soedirman Purwokerto', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (50, '172', 'BMT Amanah Wangon', 'Jl. Raya Wangon', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (51, '173', 'BMT Buana Mas Arcawinangun', 'Komplek Ruko Pasar Arcawinangun', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (52, '174', 'BMT Mitra Mentari', 'Mersi', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (53, '175', 'BMT NU Sejahtera', 'Karangklesem', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (54, '176', 'BMT NU Sejahtera', 'Sokaraja', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (55, '177', 'Bank Jateng Syariah', 'Jl. Overste Isdiman', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (56, '178', 'BAZNAS', 'Jl. Masjid', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (57, '179', 'BNI Syariah', 'Jl. Jend Soedirman', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (58, '180', 'BTN Syariah', 'Jl. Jend Soedirman', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (59, '181', 'KSPPS Aisyiyah', 'Jl. Raya Bobosan', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (60, '182', 'BPRS Khasanah Umat', 'Jl. Sunan Bonang, Dukuh Waluh', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (61, '183', 'LAZISMU', 'Jl. Dr. Angka', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (62, '184', 'LAZISNU', 'Beji', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (63, '185', 'KSPPS Berkah el Hikmah', 'Kios Pasar Purwojati Blok A-23 Purwojati', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (64, '186', 'BPRS Bumi Artha Sampang Cilacap', 'Jl. Tugu Barat No.39 Sampang', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (65, '187', 'BPRS Suriyah', 'Jl. DI Panjaitan No. 47 A Donan Cilacap', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (66, '188', 'BMT Khonsa', 'Jl Tentara Pelajar No. 156 Tritih Wetan Jarak Cilacap', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (67, '189', 'KSU BMT Nahdlatut Tujjar', 'Jl Binangun Cilacap', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (68, '190', 'BMT Al Ikhwan', 'Jl Rinjani Komplek Pertamina Cilacap', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (69, '191', 'BPRS Gunung Slamet Cilacap', 'Jl. Dr. Wahidin No. 34 Cilacap', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (70, '192', 'BMT Emas', 'Jl Letkol Isdiman No. 101 Bancar Purbalingga', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (71, '193', 'BMT Buana Nawa Kartika', 'Jl Letnan Ahmad Nur No. 51 Purbalingga', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (72, '194', 'BMT Syariah Wanita Islam', 'Jl Hartono No 22 Purbalingga', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (73, '195', 'BMT Damai Amanah Sejahtera (DAS)', 'Jl Raya Panaruban, Kaligondang, Purbalingga', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (74, '196', 'BPRS Buana Mitra Perwira', 'Jl. MT Haryono No. 267 Purbalingga', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (75, '197', 'BMT Al-Madinah Purbalingga', 'Jl. Letkol Isdiman, Purbalingga', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (76, '198', 'BPRS Ikhsanul Amal Gombong', 'Jl. Yos Sudarso Barat 8A Gombong, Kebumen', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (77, '199', 'Koperasi Bank Indonesia', 'Jl. Jend. Gatot Soebroto No 98  ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (78, '200', 'KPP Pratama', 'Jl. Gatot Subroto No 107 ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (79, '201', 'Amanda Brownies', 'Jl. Jendral Soedirman No. 675', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (80, '202', 'CV. Diantama Traffindo', 'Jl.Watu Gedhe no.777 Arcawinangun', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (81, '203', 'Disperindag Kab. Banyumas', 'Jl. Gatot Subroto No. 104', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (82, '204', 'KOPATA Purwokerto', 'Jl. Moh. Yamin 59 ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (83, '205', 'Penerbit dan Perc. Erlangga ', 'Jl. Wahid Hasim Ruko Puri Hijau blok 8A/9A', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (84, '206', 'PT Anugerah Tunas Medika Utama', 'Jl. HM Bahroen No 36 Mersi', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (85, '207', 'Dinas Pendidikan Kab. Banyumas', 'Jl. Perintis Kemerdekaan No.75 ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (86, '208', 'PT. BKK Purwokerto Selatan Permohonan melalui Bappedalitbang ', 'Windusara, Karangklesem', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (87, '209', 'Dinas Penanaman Modal & Pel. Perijinan Terpadu Satu Pintu', 'Jl. Jend Soedirman 540 ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (88, '210', 'PMI Kab. Banyumas', 'Jl. Adiyaksa No 8 ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (89, '211', 'PDAM Tirta Satria', 'Jl. Prof. Dr. Suharso 52 ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (90, '212', 'PT Taspen', 'Jl. Prof. Dr. Suharso 53', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (91, '213', 'PT. BPR Soka Panca Artha', 'Jl. Suparjo Rustam ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (92, '214', 'PT Sanjaya Motor Purwokerto', 'Jl. Jend. Sudirman No. 830', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (93, '215', 'Neutron Sokaraja', 'Jl. Jend. Soedirman ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (94, '216', 'KUD Rukun Tani Cilongok', 'Jl. Raya Cilongok No. 15  ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (95, '217', 'Koperasi Bina Raharja', 'Jl. Raya Pernasidi Cilongok', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (96, '218', '(FIF)  Perusahaan Pembiayaan Astra Purwokerto', 'Jl. Suparjo Rustam No 8 Berkoh', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (97, '219', 'KPKN dan Lelang ', 'Jl. Pahlawan No 876  ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (98, '220', 'PT BPR BKK Purwokerto (Perseroda)', 'Jl. RA. Wirya Atmaja', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (99, '221', 'CV Tirtamas Sumber Rejeki', 'Jl. Raya Beji 11A ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (100, '222', 'Neutron Purwokerto', 'Jl. Gatot Soebroto 55 ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (101, '223', 'CV Rahayu Utama', 'Perum Griya Mentari Blok B 16 ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (102, '224', 'Universitas AMIKOM', 'Jl. Letjend Pol. Soemarto', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (103, '225', 'Koperasi Kampus Unsoed', 'Jl. HR. Bunyamin 708 ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (104, '226', 'LBPP LIA Purwokerto', 'Jl. Overse Isdiman II No 1 ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (105, '227', 'Primkopad A-13 Pwt/Primer Kop. Kartika A-13 Prima Husada', 'Jl. HR Bunyamin ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (106, '228', 'PT Perusahaan Perdagangan Indonesia', 'Jl. Jend. Soedirman No 347  ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (107, '229', 'Pasca Sarjana Unsoed', 'Jl. Dr. Soeparno Karang wangkal', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (108, '230', 'RSGMP', 'Jl. Dr. Soeparno Karang wangkal', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (109, '231', 'Pring Sewu Group', 'Jl. DI Panjaitan ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (110, '232', 'PT Jasa Raharja Purwokerto', 'Jl. S. Parman No. 82 ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (111, '233', 'Kantor Pelayanan Perbendaharaan Negara', 'Jl. DI Panjaitan  No. 62 ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (112, '234', 'Ramona Bakery', 'Jl. Sultan Agung No 32 Teluk ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (113, '235', 'Sambel Layah Corporate', 'Jl. Suwatio No 13 B Teluk ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (114, '236', 'Badan Keuangan Daerah Kab. Banyumas', 'Jl. Kabupaten No. 1', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (115, '237', 'DPPKAD', 'Jl. Kabupaten No. 2', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (116, '238', 'BPN (Badan Pertanahan Nasional) Banyumas', 'Jl. Jend. Soedirman No.356-358', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (117, '239', 'Cahaya Computer', 'Arca Square Jl. Batu Gede Arcawinangun ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (118, '240', 'Cakra Media Data', 'Perumahan Berkoh', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (119, '241', 'Graha Computer', 'Jl. Adhyaksa  ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (120, '242', 'CV Anugrah Wijaya', 'Banjarsari Wetan', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (121, '243', 'Dinsospermasdes', 'Jl. Pemuda No.24 ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (122, '244', 'EG Cmputer', 'Jl. Riyanto no. 54 Sumampir', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (123, '245', 'Sonic Advertising', 'Jl. Sunan Ampel No. 22 Pabuaran', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (124, '246', 'IAIN', 'Jl. A Yani No. 40 A', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (125, '247', 'Kesbanpol', 'Kantor Kesbangpol ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (126, '248', 'LPTSI Unsoed', 'Dukuhbandong, Grendeng', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (127, '249', 'Mantri Laptop', 'Jl Raden Patah Ledug', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (128, '250', 'Mitra Computer', 'Ruko Perum. Griya Sokaraja Permai  Dusun I Kalibagor', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (129, '251', 'Telkom Akses', 'Jl. Perintis Kemerdekaan', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (130, '252', 'Telkom Graha Merah Mutih', 'Jl. Gerilya Barat', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (131, '253', 'Speed Computer', 'Jl. Dr Soeparno', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (132, '254', 'Universitas Muhammdiyah Purwokerto', 'Jl. Raya Dukuhwaluh ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (133, '255', 'Bapedalitbang', 'Jl.Prof. Dr. Suharso No. 45', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (134, '256', 'CV. Mahir Smart', 'Jl. Srempeng Kulon 1, No. 44', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (135, '257', 'Mitra Software Online', 'Komplek Ruko Perum Griya Karang Indah (GKI) No. B-4-5', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (136, '258', 'Universitas Harapan Bangsa', 'Jl. Raden Patah No. 100', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (137, '259', 'Instan Akses', 'Griya Satria, Jl. Raji Mustofa, Blok VC No.3', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (138, '260', 'BPN (Badan Pertanahan Nasional) Banyumas', 'Jl. Jend. Soedirman No.356-358', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (139, '261', 'STMIK AMIKOM Purwokerto', 'Jl. Letjend. Pol. Soemarto', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (140, '262', 'PDAM Tirta Satria Kabupaten Banyumas', 'Jl. Prof. Dr. Suharso No.52', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (141, '263', 'MALL Pelayanan Publik', 'Jl. Dr. Gumbreg, Mersi', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (142, '264', 'Dinas Penanaman Modal Banyumas', 'Jl. Jend. Soedirman No.540', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (143, '265', 'Kantor PDAM Purwokerto 02', 'Jl. Balai Desa Lama, Pasiraja Kidul', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (144, '266', 'STMIK Widya Utama Purwokerto', 'Jl. Soewatio No. 9A,Teluk', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (145, '267', 'Nurvindo Mediakom', 'Jl. D.I. Panjaitan No. III', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (146, '268', 'Nemolab', 'Jl. Komisaris Bambang Suprapto No. 70', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (147, '269', 'Dinsospermades', 'Jl. Pemuda No.24', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (148, '270', 'Java Multi Mandiri', 'Jl. Raya Baturraden Km. 7, No. 17', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (149, '271', 'Kesbangpol', 'Jl. Prof. Dr. Suharso No.45', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (150, '272', 'Universitas Muhammadiyah Purwokerto', 'Jl. KH. Ahmad Dahlan Dukuhwaluh', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (151, '273', 'IAIN Purwokerto', 'Jl. A. Yani No.40A, Karanganjing', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (152, '274', 'Aksaramaya', 'Jalan Monumen Perjuangan TNI AU No 93, Krobokan', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (153, '275', 'Geekgarden', 'Jl. Magelang No.KM.5, Jombor Lor, Sinduadi', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (154, '276', 'IPTech', 'Green Lake City Rukan CBD Blok E No. 20 Duri Kosambi ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (155, '277', 'Gameloft', 'Jl. HOS Cokroaminoto No.73, Pakuncen, Wirobrajan', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (156, '278', 'HRD SL Corp', 'Jl. Suwatio No 13b ', '202cb962ac59075b964b07152d234b70', 'gambar.png');
INSERT INTO `iduka` VALUES (157, '279', 'Griya Soft', 'Ds. Gemuruh RT 03/09, Kaliwuluh', '202cb962ac59075b964b07152d234b70', 'gambar.png');

-- ----------------------------
-- Table structure for jurusan_detail
-- ----------------------------
DROP TABLE IF EXISTS `jurusan_detail`;
CREATE TABLE `jurusan_detail`  (
  `id_jurusan_detail` int(11) NOT NULL AUTO_INCREMENT,
  `jurusan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_jurusan_detail`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jurusan_detail
-- ----------------------------
INSERT INTO `jurusan_detail` VALUES (1, 'Munaswil');
INSERT INTO `jurusan_detail` VALUES (2, 'Otomatisasi dan Tata Kelola Perkantoran');
INSERT INTO `jurusan_detail` VALUES (3, 'Bisnis Daring dan Pemasaran');
INSERT INTO `jurusan_detail` VALUES (4, 'Bimbingan Konseling');
INSERT INTO `jurusan_detail` VALUES (5, 'Akuntansi Keuangan Lembaga');
INSERT INTO `jurusan_detail` VALUES (6, 'Farmasi Klinis dan Kesehatan');
INSERT INTO `jurusan_detail` VALUES (7, 'Multimedia');
INSERT INTO `jurusan_detail` VALUES (8, 'Perbankan Syariah');
INSERT INTO `jurusan_detail` VALUES (9, 'Rekayasa Perangkat Lunak');
INSERT INTO `jurusan_detail` VALUES (10, 'Teknik Komputer Jaringan');

-- ----------------------------
-- Table structure for karyawan
-- ----------------------------
DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan`  (
  `id_kary` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kary`) USING BTREE,
  INDEX `nip`(`nip`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of karyawan
-- ----------------------------
INSERT INTO `karyawan` VALUES (3, '123', 'Suryanto Ganteng Banget', 'e10adc3949ba59abbe56e057f20f883e', 'default.png');

-- ----------------------------
-- Table structure for kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `kegiatan`;
CREATE TABLE `kegiatan`  (
  `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_kegiatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_kegiatan` date NULL DEFAULT NULL,
  `relevansi` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_kegiatan`) USING BTREE,
  INDEX `nis_fb`(`nis`) USING BTREE,
  CONSTRAINT `nis_fb` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 40 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kehadiran
-- ----------------------------
DROP TABLE IF EXISTS `kehadiran`;
CREATE TABLE `kehadiran`  (
  `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_kehadiran` date NULL DEFAULT NULL,
  `id_kehadiran_detail` int(11) NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kehadiran`) USING BTREE,
  INDEX `kehadiran_jenis`(`id_kehadiran_detail`) USING BTREE,
  INDEX `nis_kehadiran`(`nis`) USING BTREE,
  CONSTRAINT `kehadiran_jenis` FOREIGN KEY (`id_kehadiran_detail`) REFERENCES `kehadiran_detail` (`id_kehadiran_detail`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `nis_kehadiran` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kehadiran_detail
-- ----------------------------
DROP TABLE IF EXISTS `kehadiran_detail`;
CREATE TABLE `kehadiran_detail`  (
  `id_kehadiran_detail` int(11) NOT NULL AUTO_INCREMENT,
  `kehadiran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kehadiran_detail`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kehadiran_detail
-- ----------------------------
INSERT INTO `kehadiran_detail` VALUES (1, 'Hadir');
INSERT INTO `kehadiran_detail` VALUES (2, 'Sakit');
INSERT INTO `kehadiran_detail` VALUES (3, 'Ijin');
INSERT INTO `kehadiran_detail` VALUES (4, 'Alpa');

-- ----------------------------
-- Table structure for kelas_detail
-- ----------------------------
DROP TABLE IF EXISTS `kelas_detail`;
CREATE TABLE `kelas_detail`  (
  `id_kelas_detail` int(11) NOT NULL AUTO_INCREMENT,
  `kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kelas_detail`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kelas_detail
-- ----------------------------
INSERT INTO `kelas_detail` VALUES (1, 'XI RPL 1');
INSERT INTO `kelas_detail` VALUES (2, 'XI RPL 2');
INSERT INTO `kelas_detail` VALUES (3, 'XI TKJ 1');
INSERT INTO `kelas_detail` VALUES (4, 'XI TKJ 2');
INSERT INTO `kelas_detail` VALUES (5, 'XI MM 1');
INSERT INTO `kelas_detail` VALUES (6, 'XI MM 2');
INSERT INTO `kelas_detail` VALUES (7, 'XI FKK 1');
INSERT INTO `kelas_detail` VALUES (8, 'XI FKK 2');
INSERT INTO `kelas_detail` VALUES (9, 'XI OTKP 1');
INSERT INTO `kelas_detail` VALUES (10, 'XI OTKP 2');
INSERT INTO `kelas_detail` VALUES (11, 'XI OTKP 3');
INSERT INTO `kelas_detail` VALUES (12, 'XI OTKP 4');
INSERT INTO `kelas_detail` VALUES (13, 'XI AKL 1');
INSERT INTO `kelas_detail` VALUES (14, 'XI AKL 2');
INSERT INTO `kelas_detail` VALUES (15, 'XI AKL 3');
INSERT INTO `kelas_detail` VALUES (16, 'XI PBS 1');
INSERT INTO `kelas_detail` VALUES (17, 'XI PBS 2');
INSERT INTO `kelas_detail` VALUES (18, 'XI BDP 1');
INSERT INTO `kelas_detail` VALUES (19, 'XI BDP 2');
INSERT INTO `kelas_detail` VALUES (20, 'XI BDP 3');

-- ----------------------------
-- Table structure for nilai_pjbl
-- ----------------------------
DROP TABLE IF EXISTS `nilai_pjbl`;
CREATE TABLE `nilai_pjbl`  (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_project` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nilai_perencanaan` int(11) NULL DEFAULT NULL,
  `nilai_laporan` int(11) NULL DEFAULT NULL,
  `nilai_sikap` int(11) NULL DEFAULT NULL,
  `nilai_akhir` int(11) NULL DEFAULT NULL,
  `nilai_pelaksanaan` int(11) NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_nilai`) USING BTREE,
  INDEX `nilai_nis`(`nis`) USING BTREE,
  CONSTRAINT `nilai_nis` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nilai_pjbl
-- ----------------------------
INSERT INTO `nilai_pjbl` VALUES (6, '101', 'Website Profil Desa', 44, 66, 77, 87, 55, 'TIDAK KOMPETEN');

-- ----------------------------
-- Table structure for sertifikat
-- ----------------------------
DROP TABLE IF EXISTS `sertifikat`;
CREATE TABLE `sertifikat`  (
  `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `files` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_sertifikat` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_sertifikat`) USING BTREE,
  INDEX `sertif_nis`(`nis`) USING BTREE,
  CONSTRAINT `sertif_nis` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for siswa
-- ----------------------------
DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa`  (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_jurusan_detail` int(11) NULL DEFAULT NULL,
  `nip_pembimbing` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_kelas_detail` int(11) NULL DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_iduka` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_siswa`) USING BTREE,
  INDEX `guru`(`nip_pembimbing`) USING BTREE,
  INDEX `jurusan`(`id_jurusan_detail`) USING BTREE,
  INDEX `kelas`(`id_kelas_detail`) USING BTREE,
  INDEX `iduka`(`id_iduka`) USING BTREE,
  INDEX `nis`(`nis`) USING BTREE,
  CONSTRAINT `guru` FOREIGN KEY (`nip_pembimbing`) REFERENCES `guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `iduka` FOREIGN KEY (`id_iduka`) REFERENCES `iduka` (`id_iduka`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `jurusan` FOREIGN KEY (`id_jurusan_detail`) REFERENCES `jurusan_detail` (`id_jurusan_detail`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kelas` FOREIGN KEY (`id_kelas_detail`) REFERENCES `kelas_detail` (`id_kelas_detail`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of siswa
-- ----------------------------
INSERT INTO `siswa` VALUES (11, '101', '202cb962ac59075b964b07152d234b70', 'Afan', 1, '123', 1, NULL, 2);
INSERT INTO `siswa` VALUES (12, '103', '202cb962ac59075b964b07152d234b70', 'Alfi', 1, '123', 4, NULL, 8);

-- ----------------------------
-- Table structure for surat
-- ----------------------------
DROP TABLE IF EXISTS `surat`;
CREATE TABLE `surat`  (
  `id_surat` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat_detail` int(11) NULL DEFAULT NULL,
  `id_iduka` int(11) NULL DEFAULT NULL,
  `no_surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_surat` date NULL DEFAULT NULL,
  `files` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `keterangan` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_surat`) USING BTREE,
  INDEX `id_surat_detail`(`id_surat_detail`) USING BTREE,
  INDEX `id_iduka_surat`(`id_iduka`) USING BTREE,
  CONSTRAINT `id_surat_detail` FOREIGN KEY (`id_surat_detail`) REFERENCES `surat_detail` (`id_surat_detail`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_iduka_surat` FOREIGN KEY (`id_iduka`) REFERENCES `iduka` (`id_iduka`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for surat_detail
-- ----------------------------
DROP TABLE IF EXISTS `surat_detail`;
CREATE TABLE `surat_detail`  (
  `id_surat_detail` int(11) NOT NULL AUTO_INCREMENT,
  `surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_surat_detail`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of surat_detail
-- ----------------------------
INSERT INTO `surat_detail` VALUES (1, 'Permohonan');
INSERT INTO `surat_detail` VALUES (2, 'Tugas');
INSERT INTO `surat_detail` VALUES (3, 'Pengantar');
INSERT INTO `surat_detail` VALUES (4, 'Penarikan');

SET FOREIGN_KEY_CHECKS = 1;

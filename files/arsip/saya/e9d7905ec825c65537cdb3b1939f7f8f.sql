/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100421
 Source Host           : localhost:3306
 Source Schema         : siska

 Target Server Type    : MySQL
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 28/01/2022 22:29:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for kompetensi_keahlian_detail
-- ----------------------------
DROP TABLE IF EXISTS `kompetensi_keahlian_detail`;
CREATE TABLE `kompetensi_keahlian_detail`  (
  `id_kompetensi_keahlian_detail` int(11) NOT NULL AUTO_INCREMENT,
  `kompetensi_keahlian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kompetensi_keahlian_detail`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kompetensi_keahlian_detail
-- ----------------------------
INSERT INTO `kompetensi_keahlian_detail` VALUES (1, 'Munaswil');
INSERT INTO `kompetensi_keahlian_detail` VALUES (2, 'Otomatisasi dan Tata Kelola Perkantoran');
INSERT INTO `kompetensi_keahlian_detail` VALUES (3, 'Bisnis Daring dan Pemasaran');
INSERT INTO `kompetensi_keahlian_detail` VALUES (4, 'Bimbingan Konseling');
INSERT INTO `kompetensi_keahlian_detail` VALUES (5, 'Akuntansi Keuangan Lembaga');
INSERT INTO `kompetensi_keahlian_detail` VALUES (6, 'Farmasi Klinis dan Kesehatan');
INSERT INTO `kompetensi_keahlian_detail` VALUES (7, 'Multimedia');
INSERT INTO `kompetensi_keahlian_detail` VALUES (8, 'Perbankan Syariah');
INSERT INTO `kompetensi_keahlian_detail` VALUES (9, 'Rekayasa Perangkat Lunak');
INSERT INTO `kompetensi_keahlian_detail` VALUES (10, 'Teknik Komputer Jaringan');

SET FOREIGN_KEY_CHECKS = 1;

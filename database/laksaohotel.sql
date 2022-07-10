/*
 Navicat Premium Data Transfer

 Source Server         : mysql localhost
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : laksaohotel

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 10/07/2022 15:49:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for room_type
-- ----------------------------
DROP TABLE IF EXISTS `room_type`;
CREATE TABLE `room_type`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(11, 2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of room_type
-- ----------------------------
INSERT INTO `room_type` VALUES (1, 'ຕຽງດຽວ - ຫ້ອງແອ', 80000.00, '2022-07-09 16:52:36');
INSERT INTO `room_type` VALUES (2, 'ຕຽງດຽວ - ຫ້ອງພັດລົມ', 100000.00, '2022-07-09 16:53:09');

-- ----------------------------
-- Table structure for rooms
-- ----------------------------
DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `room_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int NOT NULL,
  `room_status` tinyint NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `room_no`(`room_no`) USING BTREE,
  INDEX `type`(`type_id`) USING BTREE,
  CONSTRAINT `type` FOREIGN KEY (`type_id`) REFERENCES `room_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rooms
-- ----------------------------
INSERT INTO `rooms` VALUES (1, 'A-01', 1, 1, '2022-07-09 23:51:04');

-- ----------------------------
-- Table structure for tbcustomers
-- ----------------------------
DROP TABLE IF EXISTS `tbcustomers`;
CREATE TABLE `tbcustomers`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `cus_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_tel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cus_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cardId_or_passport` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_ad` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `cus_code`(`cus_code`) USING BTREE,
  UNIQUE INDEX `cardId_or_passport`(`cardId_or_passport`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbcustomers
-- ----------------------------
INSERT INTO `tbcustomers` VALUES (4, '04-LAK20', 'ສຸລິສ', 'ຍິງ', '2022587456', 'ຫຼັກຊາວ', '1234567', '2022-07-09 14:12:24');

-- ----------------------------
-- Table structure for tbemployees
-- ----------------------------
DROP TABLE IF EXISTS `tbemployees`;
CREATE TABLE `tbemployees`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `emp_code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_dob` date NULL DEFAULT NULL,
  `emp_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `emp_tel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_pwd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `emp_code`(`emp_code`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 45 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbemployees
-- ----------------------------
INSERT INTO `tbemployees` VALUES (1, 'ADMIN', 'admin', 'ຊາຍ', '1999-07-05', '', '', 'admin', 'dc483e80a7a0bd9ef71d8cf973673924', '2022-07-09 13:16:27');
INSERT INTO `tbemployees` VALUES (2, 'STAFF', 'staff', 'ຍິງ', '1999-08-10', '', '', 'staff', 'dc483e80a7a0bd9ef71d8cf973673924', '2022-07-09 13:16:27');
INSERT INTO `tbemployees` VALUES (6, '01-LAK20', 'Soulisa', 'ຍິງ', '1999-07-03', 'ttest', '2099874563', 'soulisa', 'dc483e80a7a0bd9ef71d8cf973673924', '2022-07-09 13:16:27');
INSERT INTO `tbemployees` VALUES (9, '02-LAK20', 'Kosy2', 'ຊາຍ', '1997-05-11', 'test', '2089632147', 'kosy', 'dc483e80a7a0bd9ef71d8cf973673924', '2022-07-09 13:16:27');
INSERT INTO `tbemployees` VALUES (40, '04-LAK20', 'test', 'ຊາຍ', '0000-00-00', '', '', 'phon', 'e10adc3949ba59abbe56e057f20f883e', '2022-07-09 13:16:27');
INSERT INTO `tbemployees` VALUES (43, '05-LAK20', 'nut', 'ຊາຍ', '0000-00-00', '', '', 'Nut', '202cb962ac59075b964b07152d234b70', '2022-07-09 13:16:27');
INSERT INTO `tbemployees` VALUES (44, '', '', '', '0000-00-00', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '2022-07-09 16:50:41');

SET FOREIGN_KEY_CHECKS = 1;

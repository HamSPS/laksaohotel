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

 Date: 24/07/2022 23:05:48
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for booking
-- ----------------------------
DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `book_date` timestamp NOT NULL DEFAULT current_timestamp,
  `start_date` date NULL DEFAULT NULL,
  `end_date` date NULL DEFAULT NULL,
  `room_id` int NULL DEFAULT NULL,
  `employee_id` int NULL DEFAULT NULL,
  `customer_id` int NULL DEFAULT NULL,
  `depo` decimal(11, 2) NULL DEFAULT NULL,
  `book_status` tinyint(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `book_room`(`room_id`) USING BTREE,
  INDEX `book_employee`(`employee_id`) USING BTREE,
  INDEX `book_customer`(`customer_id`) USING BTREE,
  CONSTRAINT `book_customer` FOREIGN KEY (`customer_id`) REFERENCES `tbcustomers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `book_employee` FOREIGN KEY (`employee_id`) REFERENCES `tbemployees` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `book_room` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of booking
-- ----------------------------
INSERT INTO `booking` VALUES (7, '2022-07-17 14:08:54', '2022-07-17', '2022-07-19', 1, 1, 4, 25000.00, 4);
INSERT INTO `booking` VALUES (8, '2022-07-22 19:59:05', '2022-07-22', '2022-07-23', 1, 1, 5, 25000.00, 2);
INSERT INTO `booking` VALUES (9, '2022-07-23 10:56:59', '2022-07-23', '2022-07-24', 1, 1, 4, NULL, 2);
INSERT INTO `booking` VALUES (10, '2022-07-23 11:02:02', '2022-07-23', '2022-07-24', 4, 1, 5, NULL, 2);
INSERT INTO `booking` VALUES (11, '2022-07-23 13:59:53', '2022-07-27', '2022-07-29', 2, 1, 4, NULL, 1);

-- ----------------------------
-- Table structure for payments
-- ----------------------------
DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `pay_date` timestamp NOT NULL DEFAULT current_timestamp,
  `amount` decimal(11, 2) NOT NULL,
  `pay` decimal(11, 2) NOT NULL,
  `service_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `service_id`(`service_id`) USING BTREE,
  CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `tbservices` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of payments
-- ----------------------------
INSERT INTO `payments` VALUES (1, '2022-07-24 23:01:55', 100000.00, 100000.00, 2);
INSERT INTO `payments` VALUES (2, '2022-07-24 23:02:29', 100000.00, 100000.00, 1);
INSERT INTO `payments` VALUES (3, '2022-07-24 23:04:12', 100000.00, 100000.00, 3);
INSERT INTO `payments` VALUES (4, '2022-07-24 23:04:49', 100000.00, 100000.00, 4);

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of room_type
-- ----------------------------
INSERT INTO `room_type` VALUES (1, 'ຕຽງດຽວ - ຫ້ອງແອ', 100000.00, '2022-07-09 16:52:36');
INSERT INTO `room_type` VALUES (2, 'ຕຽງດຽວ - ຫ້ອງພັດລົມ', 80000.00, '2022-07-09 16:53:09');

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
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rooms
-- ----------------------------
INSERT INTO `rooms` VALUES (1, 'A-01', 1, 1, '2022-07-09 23:51:04');
INSERT INTO `rooms` VALUES (2, 'A-02', 2, 1, '2022-07-10 16:29:54');
INSERT INTO `rooms` VALUES (4, 'A-03', 1, 1, '2022-07-20 20:45:27');
INSERT INTO `rooms` VALUES (5, 'A-04', 1, 1, '2022-07-20 20:45:41');
INSERT INTO `rooms` VALUES (6, 'A-05', 1, 1, '2022-07-20 20:45:55');
INSERT INTO `rooms` VALUES (7, 'A-06', 1, 1, '2022-07-20 20:46:07');
INSERT INTO `rooms` VALUES (8, 'B-01', 2, 1, '2022-07-20 20:46:19');
INSERT INTO `rooms` VALUES (9, 'B-02', 2, 1, '2022-07-20 20:46:34');
INSERT INTO `rooms` VALUES (12, 'B-03', 2, 1, '2022-07-20 20:47:15');
INSERT INTO `rooms` VALUES (13, 'B-04', 2, 1, '2022-07-20 20:47:28');
INSERT INTO `rooms` VALUES (14, 'B-05', 2, 1, '2022-07-20 20:47:41');
INSERT INTO `rooms` VALUES (15, 'B-06', 2, 1, '2022-07-20 20:47:50');

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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbcustomers
-- ----------------------------
INSERT INTO `tbcustomers` VALUES (4, '04-LAK20', 'ສຸລິສາ ໂກສີ', 'ຍິງ', '2022587456', 'ຫຼັກຊາວ', '1234567', '2022-07-09 14:12:24');
INSERT INTO `tbcustomers` VALUES (5, 'CUS001', 'King', 'ຍິງ', '2089632147', '', '12345678', '2022-07-20 22:23:29');

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

-- ----------------------------
-- Table structure for tbservices
-- ----------------------------
DROP TABLE IF EXISTS `tbservices`;
CREATE TABLE `tbservices`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `sv_date` datetime NULL DEFAULT current_timestamp,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `book_id` int NULL DEFAULT NULL,
  `stt` tinyint NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `book_id`(`book_id`) USING BTREE,
  CONSTRAINT `tbservices_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `booking` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbservices
-- ----------------------------
INSERT INTO `tbservices` VALUES (1, '2022-07-24 20:24:05', '2022-07-24', '2022-07-24', 10, 2);
INSERT INTO `tbservices` VALUES (2, '2022-07-24 20:31:21', '2022-07-24', '2022-07-24', 10, 2);
INSERT INTO `tbservices` VALUES (3, '2022-07-24 23:03:57', '2022-07-24', '2022-07-24', 9, 2);
INSERT INTO `tbservices` VALUES (4, '2022-07-24 23:04:40', '2022-07-24', '2022-07-24', 8, 2);

SET FOREIGN_KEY_CHECKS = 1;

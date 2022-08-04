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

 Date: 04/08/2022 20:33:48
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
  `book_status` tinyint(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `book_room`(`room_id`) USING BTREE,
  INDEX `book_employee`(`employee_id`) USING BTREE,
  INDEX `book_customer`(`customer_id`) USING BTREE,
  CONSTRAINT `book_customer` FOREIGN KEY (`customer_id`) REFERENCES `tbcustomers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `book_employee` FOREIGN KEY (`employee_id`) REFERENCES `tbemployees` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `book_room` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of booking
-- ----------------------------
INSERT INTO `booking` VALUES (7, '2022-06-17 14:08:54', '2022-07-17', '2022-07-19', 1, 1, 4, 4);
INSERT INTO `booking` VALUES (8, '2022-06-22 19:59:05', '2022-07-22', '2022-07-23', 1, 1, 5, 2);
INSERT INTO `booking` VALUES (9, '2022-07-23 10:56:59', '2022-07-23', '2022-07-24', 1, 1, 4, 2);
INSERT INTO `booking` VALUES (10, '2022-07-23 11:02:02', '2022-07-23', '2022-07-24', 4, 1, 5, 2);
INSERT INTO `booking` VALUES (11, '2022-07-26 13:59:53', '2022-07-27', '2022-07-29', 2, 1, 4, 2);
INSERT INTO `booking` VALUES (13, '2022-07-27 10:07:03', '2022-07-27', '2022-07-28', 4, 1, 4, 2);
INSERT INTO `booking` VALUES (14, '2022-07-28 16:40:42', '2022-07-28', '2022-07-30', 2, 1, 4, 2);
INSERT INTO `booking` VALUES (15, '2022-07-29 15:43:58', '2022-07-29', '2022-07-30', 2, 1, 4, 2);
INSERT INTO `booking` VALUES (16, '2022-07-29 15:50:39', '2022-07-29', '2022-07-30', 15, 1, 8, 4);
INSERT INTO `booking` VALUES (17, '2022-08-01 21:35:47', '2022-08-01', '2022-08-01', 15, 1, 5, 2);
INSERT INTO `booking` VALUES (18, '2022-08-01 22:04:40', '2022-08-02', '2022-08-03', 15, 1, 8, 2);
INSERT INTO `booking` VALUES (19, '2022-08-01 22:23:56', '2022-08-03', '2022-08-04', 15, 1, 5, 2);
INSERT INTO `booking` VALUES (20, '2022-08-03 13:52:14', '2022-08-04', '2022-08-05', 15, 1, 21, 4);
INSERT INTO `booking` VALUES (21, '2022-08-03 13:52:27', '2022-08-03', '2022-08-04', 1, 1, 4, 1);
INSERT INTO `booking` VALUES (22, '2022-08-03 13:57:23', '2022-08-03', '2022-08-04', 7, 1, 4, 2);
INSERT INTO `booking` VALUES (23, '2022-08-03 14:57:12', '2022-08-03', '2022-08-04', 9, 1, 21, 2);
INSERT INTO `booking` VALUES (24, '2022-08-03 14:58:16', '2022-08-03', '2022-08-04', 2, 1, 8, 2);
INSERT INTO `booking` VALUES (25, '2022-08-04 19:31:52', '2022-08-04', '2022-08-06', 4, 1, 5, 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of payments
-- ----------------------------
INSERT INTO `payments` VALUES (1, '2022-06-24 23:01:55', 100000.00, 100000.00, 2);
INSERT INTO `payments` VALUES (2, '2022-06-24 23:02:29', 100000.00, 100000.00, 1);
INSERT INTO `payments` VALUES (3, '2022-07-24 23:04:12', 100000.00, 100000.00, 3);
INSERT INTO `payments` VALUES (4, '2022-07-24 23:04:49', 100000.00, 100000.00, 4);
INSERT INTO `payments` VALUES (5, '2022-07-27 10:07:42', 100000.00, 100000.00, 5);
INSERT INTO `payments` VALUES (6, '2022-07-29 15:42:58', 160000.00, 160000.00, 6);
INSERT INTO `payments` VALUES (7, '2022-07-29 15:44:38', 80000.00, 80000.00, 8);
INSERT INTO `payments` VALUES (8, '2022-08-01 22:22:49', 150000.00, 150000.00, 9);
INSERT INTO `payments` VALUES (9, '2022-08-03 15:00:22', 100000.00, 100000.00, 11);
INSERT INTO `payments` VALUES (10, '2022-08-03 20:47:17', 500000.00, 500000.00, 7);
INSERT INTO `payments` VALUES (11, '2022-08-04 19:50:59', 300000.00, 300000.00, 10);

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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of room_type
-- ----------------------------
INSERT INTO `room_type` VALUES (1, 'ຕຽງດຽວ - ຫ້ອງແອ', 100000.00, '2022-07-09 16:52:36');
INSERT INTO `room_type` VALUES (2, 'ຕຽງດຽວ - ຫ້ອງພັດລົມ', 80000.00, '2022-07-09 16:53:09');
INSERT INTO `room_type` VALUES (5, 'ຕຽງຄູ່- ຫ້ອງແອ', 150000.00, '2022-07-29 15:48:54');

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
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `rooms` VALUES (15, 'B-06', 5, 1, '2022-07-20 20:47:50');

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
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_ad` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `cus_code`(`cus_code`) USING BTREE,
  UNIQUE INDEX `cardId_or_passport`(`cardId_or_passport`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbcustomers
-- ----------------------------
INSERT INTO `tbcustomers` VALUES (4, '04-LAK20', 'ສຸລິສາ ໂກສີ', 'ຍິງ', '2022587456', 'ຫຼັກຊາວ', '1234567', 'soulisa', 'dc483e80a7a0bd9ef71d8cf973673924', '2022-07-09 14:12:24');
INSERT INTO `tbcustomers` VALUES (5, 'CUS001', 'King', 'ຍິງ', '2089632147', '', '12345678', 'king', 'dc483e80a7a0bd9ef71d8cf973673924', '2022-07-20 22:23:29');
INSERT INTO `tbcustomers` VALUES (8, 'CUS002', 'Alex', 'ຊາຍ', '', '', '123456789', 'alex', 'dc483e80a7a0bd9ef71d8cf973673924', '2022-07-29 15:47:31');
INSERT INTO `tbcustomers` VALUES (21, '62e9537e908d7', 'Soulisa', 'ຊາຍ', '', '', '123456739', 'alex7', 'dc483e80a7a0bd9ef71d8cf973673924', '2022-08-02 23:40:30');
INSERT INTO `tbcustomers` VALUES (22, '62e953d466f92', 'test', 'ຊາຍ', '', '', '123', 'alex1', 'dc483e80a7a0bd9ef71d8cf973673924', '2022-08-02 23:41:56');

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
) ENGINE = InnoDB AUTO_INCREMENT = 46 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbemployees
-- ----------------------------
INSERT INTO `tbemployees` VALUES (1, 'ADMIN', 'ສຸລິສາ ໂກສີ', 'ຍິງ', '1999-07-05', '', '', 'admin', 'dc483e80a7a0bd9ef71d8cf973673924', '2022-07-09 13:16:27');
INSERT INTO `tbemployees` VALUES (2, 'STAFF', 'staff', 'ຍິງ', '1999-08-10', '', '', 'staff', 'dc483e80a7a0bd9ef71d8cf973673924', '2022-07-09 13:16:27');
INSERT INTO `tbemployees` VALUES (6, '01-LAK20', 'Soulisa', 'ຍິງ', '1999-07-03', 'ttest', '2099874563', 'soulisa', 'dc483e80a7a0bd9ef71d8cf973673924', '2022-07-09 13:16:27');
INSERT INTO `tbemployees` VALUES (9, '02-LAK20', 'Kosy2', 'ຊາຍ', '1997-05-11', 'test', '2089632147', 'kosy', 'dc483e80a7a0bd9ef71d8cf973673924', '2022-07-09 13:16:27');

-- ----------------------------
-- Table structure for tbservices
-- ----------------------------
DROP TABLE IF EXISTS `tbservices`;
CREATE TABLE `tbservices`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `sv_date` datetime NULL DEFAULT current_timestamp,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `customer_id` int NOT NULL,
  `employee_id` int NOT NULL,
  `room_id` int NOT NULL,
  `stt` tinyint NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `employee_id`(`employee_id`) USING BTREE,
  INDEX `customer_id`(`customer_id`) USING BTREE,
  INDEX `room_id`(`room_id`) USING BTREE,
  CONSTRAINT `tbservices_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `tbemployees` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tbservices_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `tbcustomers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tbservices_ibfk_3` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbservices
-- ----------------------------
INSERT INTO `tbservices` VALUES (1, '2022-06-24 20:24:05', '2022-07-24', '2022-07-24', 4, 1, 1, 2);
INSERT INTO `tbservices` VALUES (2, '2022-06-29 20:31:21', '2022-07-24', '2022-07-24', 4, 1, 1, 2);
INSERT INTO `tbservices` VALUES (3, '2022-07-24 23:03:57', '2022-07-24', '2022-07-24', 4, 1, 1, 2);
INSERT INTO `tbservices` VALUES (4, '2022-07-24 23:04:40', '2022-07-24', '2022-07-24', 4, 1, 1, 2);
INSERT INTO `tbservices` VALUES (5, '2022-07-27 10:07:14', '2022-07-27', '2022-07-27', 4, 1, 1, 2);
INSERT INTO `tbservices` VALUES (6, '2022-07-27 11:06:39', '2022-07-27', '2022-07-29', 4, 1, 1, 2);
INSERT INTO `tbservices` VALUES (7, '2022-07-29 15:42:47', '2022-07-29', '2022-08-03', 4, 1, 1, 2);
INSERT INTO `tbservices` VALUES (8, '2022-07-29 15:44:15', '2022-07-29', '2022-07-29', 4, 1, 1, 2);
INSERT INTO `tbservices` VALUES (9, '2022-08-01 21:36:17', '2022-08-01', '2022-08-01', 4, 1, 1, 2);
INSERT INTO `tbservices` VALUES (10, '2022-08-01 22:13:52', '2022-08-01', '2022-08-04', 4, 1, 1, 2);
INSERT INTO `tbservices` VALUES (11, '2022-08-03 14:55:44', '2022-08-03', '2022-08-03', 4, 1, 1, 2);
INSERT INTO `tbservices` VALUES (12, '2022-08-03 20:29:18', '2022-08-03', '0000-00-00', 8, 1, 2, 1);
INSERT INTO `tbservices` VALUES (13, '2022-08-03 20:56:20', '2022-08-03', '0000-00-00', 5, 1, 15, 1);
INSERT INTO `tbservices` VALUES (14, '2022-08-03 20:57:16', '2022-08-03', '0000-00-00', 21, 1, 9, 1);
INSERT INTO `tbservices` VALUES (15, '2022-08-04 19:44:49', '2022-08-04', '0000-00-00', 22, 1, 2, 1);
INSERT INTO `tbservices` VALUES (16, '2022-08-04 19:45:45', '2022-08-04', '0000-00-00', 5, 1, 5, 1);
INSERT INTO `tbservices` VALUES (17, '2022-08-04 19:46:29', '2022-08-04', '0000-00-00', 4, 1, 6, 1);
INSERT INTO `tbservices` VALUES (18, '2022-08-04 19:48:21', '2022-08-04', '0000-00-00', 4, 1, 13, 1);
INSERT INTO `tbservices` VALUES (19, '2022-08-04 19:48:43', '2022-08-04', '0000-00-00', 8, 1, 8, 1);
INSERT INTO `tbservices` VALUES (20, '2022-08-04 19:48:58', '2022-08-04', '0000-00-00', 5, 1, 14, 1);

SET FOREIGN_KEY_CHECKS = 1;

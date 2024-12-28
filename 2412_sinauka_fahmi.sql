/*
 Navicat Premium Data Transfer

 Source Server         : Local - Laragon
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : 2412_sinauka_fahmi

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 28/12/2024 19:16:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for attendance
-- ----------------------------
DROP TABLE IF EXISTS `attendance`;
CREATE TABLE `attendance`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` char(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `employee_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `department_id` char(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `shift_id` int NOT NULL,
  `location_id` int NOT NULL,
  `in_time` int NOT NULL,
  `notes` varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `image` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lack_of` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `in_status` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `out_time` int NOT NULL,
  `out_status` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `latlng` varchar(75) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `task` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `username`(`username` ASC) USING BTREE,
  INDEX `employee_id`(`employee_id` ASC) USING BTREE,
  INDEX `department_id`(`department_id` ASC) USING BTREE,
  INDEX `shift_id`(`shift_id` ASC) USING BTREE,
  INDEX `location_id`(`location_id` ASC) USING BTREE,
  CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `attendance_ibfk_3` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `attendance_ibfk_4` FOREIGN KEY (`shift_id`) REFERENCES `shift` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `attendance_ibfk_5` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 74 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of attendance
-- ----------------------------
INSERT INTO `attendance` VALUES (45, 'ADM011', 011, 'ADM', 1, 1, 1589178316, 'sdf', 'item-200511-8f5d7be1a1.jpg', 'None', 'Late', 1589178477, 'Early', NULL, NULL);
INSERT INTO `attendance` VALUES (48, 'ADM011', 011, 'ADM', 1, 1, 1589381121, '', 'item-200513-ad6953a07e.jpg', 'Notes', 'Late', 1589381127, 'Over Time', NULL, NULL);
INSERT INTO `attendance` VALUES (49, 'PCD010', 010, 'PCD', 2, 1, 1589384432, 'asdasd', '', 'None,image', 'Late', 1589384514, 'Over Time', NULL, NULL);
INSERT INTO `attendance` VALUES (50, 'ADM011', 011, 'ADM', 1, 1, 1589391038, '', '', 'Notes,image', 'On Time', 1589391056, 'Early', NULL, NULL);
INSERT INTO `attendance` VALUES (51, 'PCD010', 010, 'PCD', 3, 1, 1622553388, 'testing', 'item-210601-3946bb00df.png', 'None', 'Late', 1622553470, 'Over Time', NULL, NULL);
INSERT INTO `attendance` VALUES (52, 'PCD010', 010, 'PCD', 3, 2, 1631893356, 'none', '', 'None,image', 'Late', 1631893413, 'Over Time', NULL, NULL);
INSERT INTO `attendance` VALUES (53, 'STD026', 026, 'STD', 1, 1, 1631894335, 'none', '', 'None,image', 'Late', 1631894403, 'Over Time', NULL, NULL);
INSERT INTO `attendance` VALUES (54, 'ADM011', 011, 'ADM', 1, 2, 1631894692, 'demo', '', 'None,image', 'Late', 1631894696, 'Over Time', NULL, NULL);
INSERT INTO `attendance` VALUES (55, 'QCD027', 027, 'QCD', 6, 2, 1631499386, 'none..', '', 'None,image', 'Late', 1631529057, 'Early', NULL, NULL);
INSERT INTO `attendance` VALUES (56, 'QCD027', 027, 'QCD', 6, 2, 1631583036, 'none', '', 'None,image', 'Late', 1631611849, 'Early', NULL, NULL);
INSERT INTO `attendance` VALUES (58, 'QCD027', 027, 'QCD', 6, 1, 1631733350, 'none', '', 'None,image', 'Late', 1631797356, 'Early', NULL, NULL);
INSERT INTO `attendance` VALUES (59, 'QCD027', 027, 'QCD', 6, 4, 1631863331, 'none', '', 'None,image', 'Late', 1631896539, 'Early', NULL, NULL);
INSERT INTO `attendance` VALUES (60, 'QCD027', 027, 'QCD', 6, 1, 1631214919, 'none', '', 'None,image', 'Late', 1631250936, 'Over Time', NULL, NULL);
INSERT INTO `attendance` VALUES (61, 'STD026', 026, 'STD', 1, 2, 1631493955, 'none', '', 'None,image', 'On Time', 1631523613, 'Over Time', NULL, NULL);
INSERT INTO `attendance` VALUES (62, 'ADM011', 011, 'ADM', 1, 1, 1631584873, 'none', '', 'None,image', 'Late', 1631621603, 'Over Time', NULL, NULL);
INSERT INTO `attendance` VALUES (63, 'QCD027', 027, 'QCD', 6, 2, 1632109417, 'this is a demo note!', '', 'None,image', 'Late', 1632109437, 'Early', NULL, NULL);
INSERT INTO `attendance` VALUES (64, 'ACD002', 002, 'ACD', 2, 3, 1632109840, 'demo demo', '', 'None,image', 'On Time', 1632109845, 'Early', NULL, NULL);
INSERT INTO `attendance` VALUES (65, 'STD026', 026, 'STD', 1, 2, 1632109903, 'test', '', 'None,image', 'Late', 1632109905, 'Early', NULL, NULL);
INSERT INTO `attendance` VALUES (66, 'ACD029', 029, 'ACD', 2, 2, 1655974020, 'saya lagi d rumah', 'item-220623-a027ce9766.png', 'None', 'Late', 0, '', NULL, NULL);
INSERT INTO `attendance` VALUES (67, 'STD030', 030, 'STD', 2, 7, 1655977137, 'saya lagi d puncak ga bisa ke kantor', 'item-220623-b159f5329c.jpg', 'None', 'Late', 0, '', NULL, NULL);
INSERT INTO `attendance` VALUES (68, 'ACD031', 031, 'ACD', 3, 2, 1733842774, 'tes', 'item-241210-f0123ba329.png', 'None', 'Late', 0, 'Alpha', NULL, NULL);
INSERT INTO `attendance` VALUES (71, 'ACD031', 031, 'ACD', 3, 8, 1734807618, '', '', 'Notes,image', 'On Time', 0, 'Alpha', '-6.2029824,106.8040192', NULL);
INSERT INTO `attendance` VALUES (73, 'ACD031', 031, 'ACD', 3, 1, 1734347306, '', '', 'Notes,image', 'Late', 0, 'Alpha', '', NULL);

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department`  (
  `id` char(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('ACD', 'Accounting Department');
INSERT INTO `department` VALUES ('ADM', 'Admin Department');
INSERT INTO `department` VALUES ('HRD', 'Human Resource Department');
INSERT INTO `department` VALUES ('PCD', 'Production Controller Department');
INSERT INTO `department` VALUES ('PLD', 'Planner Department');
INSERT INTO `department` VALUES ('QCD', 'Quality Control Department');
INSERT INTO `department` VALUES ('SCD', 'Security Department');
INSERT INTO `department` VALUES ('STD', 'Store Department');

-- ----------------------------
-- Table structure for employee
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee`  (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gender` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `image` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `birth_date` date NOT NULL,
  `hire_date` date NOT NULL,
  `shift_id` int NOT NULL,
  `hire_end_date` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee` VALUES (001, 'Sadie sanjaya', 'devi@gmail.com', 'F', 'default.png', '1996-06-06', '2020-03-01', 2, NULL);
INSERT INTO `employee` VALUES (002, 'Elsa siregar', 'intan@gmail.com', 'F', 'default.png', '1998-02-01', '2020-03-01', 2, NULL);
INSERT INTO `employee` VALUES (003, 'amin ali amin', 'herman@gmail.com', 'M', 'default.png', '1997-11-06', '2020-03-12', 2, NULL);
INSERT INTO `employee` VALUES (004, 'jesika alibaba', 'andi@gmail.com', 'M', 'default.png', '1998-01-01', '2020-03-01', 3, NULL);
INSERT INTO `employee` VALUES (005, 'Madeline Mitchell', 'clarita@gmail.com', 'F', 'default.png', '1996-04-06', '2020-04-08', 1, NULL);
INSERT INTO `employee` VALUES (007, 'andika kangen band', 'mgb@gmail.com', 'M', 'default.png', '2000-10-29', '2020-03-01', 2, NULL);
INSERT INTO `employee` VALUES (008, 'Stephen Fernando', 'weve@gmail.com', 'M', 'default.png', '2000-11-07', '2020-03-01', 1, NULL);
INSERT INTO `employee` VALUES (010, 'Blake Collins', 'ddry@gmail.com', 'M', 'default.png', '2000-12-01', '2020-04-06', 3, NULL);
INSERT INTO `employee` VALUES (011, 'Marcus', 'udin@gmail.com', 'M', 'default.png', '1993-10-12', '2020-05-03', 1, NULL);
INSERT INTO `employee` VALUES (025, 'Admin ', 'admin@admin.com', 'M', 'default.png', '0000-00-00', '0000-00-00', 0, NULL);
INSERT INTO `employee` VALUES (026, 'Christine', 'christine@gmail.com', 'F', 'item-210516-ab8e9ef52f.jpg', '1995-04-01', '2021-05-16', 1, NULL);
INSERT INTO `employee` VALUES (027, 'Johnny', 'johnny@mail.com', 'M', 'default.png', '1993-04-01', '2021-08-13', 6, NULL);
INSERT INTO `employee` VALUES (028, 'ali', 'ali@gmail.com', 'M', 'item-220623-77ab583068.jpg', '1999-05-17', '2022-06-06', 1, NULL);
INSERT INTO `employee` VALUES (029, 'andi', 'andi1@gmail.com', 'M', 'item-220623-266bb5b356.png', '2001-12-30', '2022-06-13', 2, NULL);
INSERT INTO `employee` VALUES (030, 'akbar tanjung', 'akbar@gmail.com', 'M', 'item-220623-555388201d.png', '2001-12-30', '2022-06-06', 2, NULL);
INSERT INTO `employee` VALUES (031, 'Dwi', 'dwinuray.dev@gmail.com', 'M', 'item-241210-2ae2677bf7.png', '2001-09-17', '2024-12-10', 3, '2025-01-03');
INSERT INTO `employee` VALUES (032, 'Testing', 'testing@gmail.com', 'M', 'default.png', '2001-12-31', '2024-10-04', 1, '2024-12-04');

-- ----------------------------
-- Table structure for employee_department
-- ----------------------------
DROP TABLE IF EXISTS `employee_department`;
CREATE TABLE `employee_department`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `employee_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `department_id` char(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `employee_department_ibfk_1`(`employee_id` ASC) USING BTREE,
  INDEX `employee_department_ibfk_2`(`department_id` ASC) USING BTREE,
  CONSTRAINT `employee_department_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `employee_department_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of employee_department
-- ----------------------------
INSERT INTO `employee_department` VALUES (1, 001, 'HRD');
INSERT INTO `employee_department` VALUES (2, 002, 'ACD');
INSERT INTO `employee_department` VALUES (3, 003, 'QCD');
INSERT INTO `employee_department` VALUES (4, 004, 'SCD');
INSERT INTO `employee_department` VALUES (5, 005, 'STD');
INSERT INTO `employee_department` VALUES (7, 007, 'PLD');
INSERT INTO `employee_department` VALUES (8, 008, 'STD');
INSERT INTO `employee_department` VALUES (10, 010, 'PCD');
INSERT INTO `employee_department` VALUES (21, 011, 'ADM');
INSERT INTO `employee_department` VALUES (26, 026, 'STD');
INSERT INTO `employee_department` VALUES (27, 027, 'QCD');
INSERT INTO `employee_department` VALUES (28, 028, 'ADM');
INSERT INTO `employee_department` VALUES (29, 029, 'ACD');
INSERT INTO `employee_department` VALUES (30, 030, 'STD');
INSERT INTO `employee_department` VALUES (31, 031, 'ACD');
INSERT INTO `employee_department` VALUES (32, 032, 'ACD');

-- ----------------------------
-- Table structure for location
-- ----------------------------
DROP TABLE IF EXISTS `location`;
CREATE TABLE `location`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `latitude` double NULL DEFAULT NULL,
  `longitude` double NULL DEFAULT NULL,
  `range` smallint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of location
-- ----------------------------
INSERT INTO `location` VALUES (1, 'Rumah', NULL, NULL, NULL);
INSERT INTO `location` VALUES (2, 'Kantor', NULL, NULL, NULL);
INSERT INTO `location` VALUES (3, 'Toko', NULL, NULL, NULL);
INSERT INTO `location` VALUES (4, 'Site', NULL, NULL, NULL);
INSERT INTO `location` VALUES (6, 'Lapangan', NULL, NULL, NULL);
INSERT INTO `location` VALUES (7, 'puncak', NULL, NULL, NULL);
INSERT INTO `location` VALUES (8, 'Kantor Cabang Malang', -6.195851078034021, 106.8207596904614, 3000);

-- ----------------------------
-- Table structure for shift
-- ----------------------------
DROP TABLE IF EXISTS `shift`;
CREATE TABLE `shift`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `start` time NOT NULL,
  `end` time NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of shift
-- ----------------------------
INSERT INTO `shift` VALUES (1, '08:00:00', '16:00:00');
INSERT INTO `shift` VALUES (2, '13:00:00', '21:00:00');
INSERT INTO `shift` VALUES (3, '18:00:00', '02:00:00');
INSERT INTO `shift` VALUES (4, '03:15:02', '02:05:05');
INSERT INTO `shift` VALUES (5, '07:00:00', '18:25:00');
INSERT INTO `shift` VALUES (6, '01:00:00', '12:00:00');
INSERT INTO `shift` VALUES (7, '23:00:00', '02:00:00');

-- ----------------------------
-- Table structure for user_access
-- ----------------------------
DROP TABLE IF EXISTS `user_access`;
CREATE TABLE `user_access`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `menu_id` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `menu_id`(`menu_id` ASC) USING BTREE,
  INDEX `role_id`(`role_id` ASC) USING BTREE,
  CONSTRAINT `user_access_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `user_access_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_access
-- ----------------------------
INSERT INTO `user_access` VALUES (1, 1, 1);
INSERT INTO `user_access` VALUES (2, 1, 2);
INSERT INTO `user_access` VALUES (3, 2, 3);
INSERT INTO `user_access` VALUES (4, 2, 4);
INSERT INTO `user_access` VALUES (5, 1, 5);

-- ----------------------------
-- Table structure for user_menu
-- ----------------------------
DROP TABLE IF EXISTS `user_menu`;
CREATE TABLE `user_menu`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_menu
-- ----------------------------
INSERT INTO `user_menu` VALUES (1, 'Admin');
INSERT INTO `user_menu` VALUES (2, 'Master');
INSERT INTO `user_menu` VALUES (3, 'Attendance');
INSERT INTO `user_menu` VALUES (4, 'Profile');
INSERT INTO `user_menu` VALUES (5, 'Report');

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES (1, 'Admin');
INSERT INTO `user_role` VALUES (2, 'Employee');

-- ----------------------------
-- Table structure for user_submenu
-- ----------------------------
DROP TABLE IF EXISTS `user_submenu`;
CREATE TABLE `user_submenu`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu_id` int NOT NULL,
  `title` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `url` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `icon` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `is_active` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `menu_id`(`menu_id` ASC) USING BTREE,
  CONSTRAINT `user_submenu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_submenu
-- ----------------------------
INSERT INTO `user_submenu` VALUES (1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1);
INSERT INTO `user_submenu` VALUES (2, 2, 'Department', 'master', 'fas fa-fw fa-building', 1);
INSERT INTO `user_submenu` VALUES (3, 2, 'Shift', 'master/shift', 'fas fa-fw fa-exchange-alt', 1);
INSERT INTO `user_submenu` VALUES (4, 2, 'Karyawan', 'master/employee', 'fas fa-fw fa-id-badge', 1);
INSERT INTO `user_submenu` VALUES (5, 2, 'Lokasi', 'master/location', 'fas fa-fw fa-map-marker-alt', 1);
INSERT INTO `user_submenu` VALUES (6, 3, 'Attendance Form', 'attendance', 'fas fa-fw fa-clipboard-list', 1);
INSERT INTO `user_submenu` VALUES (7, 3, 'Statistics', 'attendance/stats', 'fas fa-fw fa-chart-pie', 0);
INSERT INTO `user_submenu` VALUES (8, 4, 'My Profile', 'profile', 'fas fa-fw fa-id-card', 1);
INSERT INTO `user_submenu` VALUES (9, 2, 'Users', 'master/users', 'fas fa-fw fa-users', 1);
INSERT INTO `user_submenu` VALUES (11, 5, 'Print Laporan', 'report', 'fas fa-fw fa-paste', 1);
INSERT INTO `user_submenu` VALUES (12, 5, 'Print Pengerjaan', 'report/task', 'fas fa-fw fa-paste', 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `username` char(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `employee_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `role_id` int NOT NULL,
  PRIMARY KEY (`username`) USING BTREE,
  INDEX `employee_id`(`employee_id` ASC) USING BTREE,
  INDEX `role_id`(`role_id` ASC) USING BTREE,
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('ACD002', '$2y$10$5nv5ehyMVdljfKJ6izsOqOimsbv.cbzU.XLB9ji9zbA.eICdSrNvO', 002, 2);
INSERT INTO `users` VALUES ('ACD029', '$2y$10$YJO0UZvhMgd3Q/1I7nabeuBLa/wvnDvdcCSM6/qKmvDeUpbiYr/cO', 029, 2);
INSERT INTO `users` VALUES ('ACD031', '$2y$10$Ltbm8mmvNGSxFFGXgcaMZuassmt.Fr2tgeGUm3btIFVXEOAWuylRO', 031, 2);
INSERT INTO `users` VALUES ('ADM011', '$2y$10$BKpQcs4XKavCcYdFWujzx.Xqb7r9eNkDrOYss2VNXrMJUUpm1agUC', 011, 2);
INSERT INTO `users` VALUES ('ADM028', '$2y$10$8XG.zwiS12wXy3KMmcP9we66fY23eBZF1FNP/0MSctNXKepErIky6', 028, 1);
INSERT INTO `users` VALUES ('admin', '$2y$10$7rLSvRVyTQORapkDOqmkhetjF6H9lJHngr4hJMSM2lHObJbW5EQh6', 025, 1);
INSERT INTO `users` VALUES ('HRD001', '$2y$10$7rLSvRVyTQORapkDOqmkhetjF6H9lJHngr4hJMSM2lHObJbW5EQh6', 001, 2);
INSERT INTO `users` VALUES ('PCD010', '$2y$10$BKpQcs4XKavCcYdFWujzx.Xqb7r9eNkDrOYss2VNXrMJUUpm1agUC', 010, 2);
INSERT INTO `users` VALUES ('QCD027', '$2y$10$peALJo.JKZyD6uMBd41UfuHGQSJe7ExOfDhPITvDbSRRXeWUGY9xy', 027, 2);
INSERT INTO `users` VALUES ('STD026', '$2y$10$8WNMvEEgNPWyRuSeeLDE1uXwnBkYNJE/heLT1zWbsUfYb/wKFyYIy', 026, 2);
INSERT INTO `users` VALUES ('STD030', '$2y$10$UpPJR.hPaOzlBwj3g1FT3ObvS.UU.4QErIo1XuUrOzKJvxggouYYC', 030, 2);

SET FOREIGN_KEY_CHECKS = 1;

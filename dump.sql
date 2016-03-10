-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.2.0.4675
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table bus_park.bus_model
DROP TABLE IF EXISTS `bus_model`;
CREATE TABLE IF NOT EXISTS `bus_model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table bus_park.bus_model: ~2 rows (approximately)
/*!40000 ALTER TABLE `bus_model` DISABLE KEYS */;
INSERT INTO `bus_model` (`id`, `name`) VALUES
	(1, 'Икарус'),
	(2, 'ПАЗ');
/*!40000 ALTER TABLE `bus_model` ENABLE KEYS */;


-- Dumping structure for table bus_park.driver
DROP TABLE IF EXISTS `driver`;
CREATE TABLE IF NOT EXISTS `driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table bus_park.driver: ~2 rows (approximately)
/*!40000 ALTER TABLE `driver` DISABLE KEYS */;
INSERT INTO `driver` (`id`, `first_name`, `last_name`, `phone`, `age`, `is_active`) VALUES
	(1, 'Иван', 'Иванов', '+7 (111) 111-11-11', 28, 1),
	(2, 'Петр', 'Петров', '+7 (222) 222-22-22', 30, 1);
/*!40000 ALTER TABLE `driver` ENABLE KEYS */;


-- Dumping structure for table bus_park.driver__bus_model
DROP TABLE IF EXISTS `driver__bus_model`;
CREATE TABLE IF NOT EXISTS `driver__bus_model` (
  `driver_id` int(11) NOT NULL,
  `bus_model_id` int(11) NOT NULL,
  PRIMARY KEY (`driver_id`,`bus_model_id`),
  KEY `FK_driver__bus_model_bus_model` (`bus_model_id`),
  CONSTRAINT `FK_driver__bus_model_bus_model` FOREIGN KEY (`bus_model_id`) REFERENCES `bus_model` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_driver__bus_model_driver` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table bus_park.driver__bus_model: ~3 rows (approximately)
/*!40000 ALTER TABLE `driver__bus_model` DISABLE KEYS */;
INSERT INTO `driver__bus_model` (`driver_id`, `bus_model_id`) VALUES
	(1, 1),
	(2, 1),
	(1, 2);
/*!40000 ALTER TABLE `driver__bus_model` ENABLE KEYS */;


-- Dumping structure for table bus_park.migration
DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table bus_park.migration: ~2 rows (approximately)
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1457596079),
	('m130524_201442_init', 1457596081);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;


-- Dumping structure for table bus_park.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table bus_park.user: ~1 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'iO6ulpnnFfvVx_8E9wDo--W-gN2OEmIE', '$2y$13$Jfyr/pliXXHN0JtKKt3mAeMkseW3pzPfZrSPyGJT4W/SgrfhTHSu2', NULL, 'a@a.aa', 10, 1457596379, 1457596379);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

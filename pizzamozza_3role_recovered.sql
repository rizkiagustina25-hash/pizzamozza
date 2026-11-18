-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: pizzamozza_3role
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `pizzamozza_3role`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `pizzamozza_3role` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `pizzamozza_3role`;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_09_29_130937_create_products_table',1),(5,'2026_09_29_135323_add_category_to_products_table',1),(6,'2026_09_29_140540_create_product_variants_table',1),(7,'2026_09_29_140632_create_toppings_table',1),(8,'2026_09_29_152937_add_address_to_users_table',1),(9,'2026_10_06_141954_add_role_to_users_table',1),(10,'2026_10_06_154356_add_profile_fields_to_users_table',2),(11,'2026_10_06_174849_create_orders_table',3),(12,'2026_10_06_175107_create_order_items_table',3),(13,'2026_10_08_022035_add_status_to_users_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `variant_id` bigint(20) unsigned DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `subtotal` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_product_id_foreign` (`product_id`),
  KEY `order_items_variant_id_foreign` (`variant_id`),
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `product_variants` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (1,1,2,NULL,2,500000.00,1000000.00,'2026-10-06 15:59:29','2026-10-06 15:59:29'),(2,2,2,NULL,1,500000.00,500000.00,'2026-10-06 16:02:57','2026-10-06 16:02:57'),(3,3,2,NULL,1,500000.00,500000.00,'2026-10-06 16:10:10','2026-10-06 16:10:10'),(4,4,2,NULL,1,500000.00,500000.00,'2026-10-06 16:11:27','2026-10-06 16:11:27'),(5,5,2,NULL,1,500000.00,500000.00,'2026-10-06 16:12:03','2026-10-06 16:12:03'),(6,6,2,NULL,1,500000.00,500000.00,'2026-10-06 16:12:50','2026-10-06 16:12:50'),(7,7,2,NULL,2,500000.00,1000000.00,'2026-10-06 16:22:30','2026-10-06 16:22:30'),(8,8,2,NULL,1,500000.00,500000.00,'2026-10-06 16:25:16','2026-10-06 16:25:16'),(9,9,2,NULL,1,500000.00,500000.00,'2026-10-06 16:36:25','2026-10-06 16:36:25'),(10,10,2,NULL,1,500000.00,500000.00,'2026-10-06 16:38:17','2026-10-06 16:38:17'),(11,11,2,NULL,1,500000.00,500000.00,'2026-10-06 16:38:42','2026-10-06 16:38:42'),(12,12,2,NULL,1,500000.00,500000.00,'2026-10-06 16:51:09','2026-10-06 16:51:09'),(13,13,2,NULL,2,500000.00,1000000.00,'2026-10-06 21:15:37','2026-10-06 21:15:37'),(14,14,2,NULL,3,500000.00,1500000.00,'2026-10-06 21:16:51','2026-10-06 21:16:51'),(15,15,2,NULL,1,500000.00,500000.00,'2026-10-06 22:22:12','2026-10-06 22:22:12'),(18,18,2,NULL,3,500000.00,1500000.00,'2026-10-18 22:31:56','2026-10-18 22:31:56'),(22,21,2,NULL,1,500000.00,500000.00,'2026-10-18 23:03:50','2026-10-18 23:03:50'),(23,22,2,NULL,1,500000.00,500000.00,'2026-10-18 23:04:54','2026-10-18 23:04:54'),(25,23,2,NULL,1,500000.00,500000.00,'2026-10-18 23:11:56','2026-10-18 23:11:56'),(27,24,2,NULL,1,500000.00,500000.00,'2026-10-18 23:13:55','2026-10-18 23:13:55'),(29,25,2,NULL,1,500000.00,500000.00,'2026-10-18 23:14:04','2026-10-18 23:14:04'),(31,26,2,NULL,1,500000.00,500000.00,'2026-10-18 23:14:24','2026-10-18 23:14:24'),(45,30,6,NULL,1,63000.00,63000.00,'2026-10-21 02:43:52','2026-10-21 02:43:52'),(46,30,5,NULL,1,50000.00,50000.00,'2026-10-21 02:43:52','2026-10-21 02:43:52'),(48,32,14,NULL,1,17.00,17.00,'2026-11-10 04:05:42','2026-11-10 04:05:42'),(49,33,6,NULL,1,63000.00,63000.00,'2026-11-10 04:06:07','2026-11-10 04:06:07'),(50,34,8,NULL,9,70000.00,630000.00,'2026-11-10 04:06:28','2026-11-10 04:06:28');
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `total_price` decimal(12,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,1000000.00,'pending','pending','pelaihari, sarang halang','2026-10-06 15:59:29','2026-10-06 15:59:29'),(2,1,500000.00,'pending','pending','pelaihari, sarang halang','2026-10-06 16:02:56','2026-10-06 16:02:56'),(3,1,500000.00,'pending','pending','pelaihari, sarang halang','2026-10-06 16:10:10','2026-10-06 16:10:10'),(4,1,500000.00,'pending','pending','pelaihari, sarang halang','2026-10-06 16:11:27','2026-10-06 16:11:27'),(5,1,500000.00,'pending','pending','pelaihari, sarang halang','2026-10-06 16:12:03','2026-10-06 16:12:03'),(6,1,500000.00,'pending','pending','pelaihari, sarang halang','2026-10-06 16:12:50','2026-10-06 16:12:50'),(7,1,1000000.00,'pending','pending','pelaihari, sarang halang','2026-10-06 16:22:30','2026-10-06 16:22:30'),(8,1,500000.00,'pending','pending','pelaihari, sarang halang','2026-10-06 16:25:16','2026-10-06 16:25:16'),(9,1,500000.00,'pending','pending','pelaihari, sarang halang','2026-10-06 16:36:25','2026-10-06 16:36:25'),(10,1,500000.00,'pending','pending','pelaihari, sarang halang','2026-10-06 16:38:17','2026-10-06 16:38:17'),(11,1,500000.00,'pending','paid','pelaihari, sarang halang','2026-10-06 16:38:42','2026-10-06 16:38:53'),(12,1,500000.00,'pending','pending','pelaihari, sarang halang','2026-10-06 16:51:09','2026-10-06 16:51:09'),(13,1,1000000.00,'pending','pending','pelaihari, sarang halang','2026-10-06 21:15:37','2026-10-06 21:15:37'),(14,1,1500000.00,'completed','paid','pelaihari, sarang halang','2026-10-06 21:16:51','2026-11-10 04:10:39'),(15,1,500000.00,'completed','paid','pelaihari, sarang halang','2026-10-06 22:22:11','2026-11-10 04:10:29'),(17,1,100000.00,'pending','paid','pelaihari, sarang halang','2026-10-18 22:21:14','2026-10-18 22:21:29'),(18,1,1500000.00,'pending','pending','pelaihari, sarang halang','2026-10-18 22:31:56','2026-10-18 22:31:56'),(19,1,100000.00,'pending','pending','pelaihari, sarang halang','2026-10-18 22:36:39','2026-10-18 22:36:39'),(20,1,75000.00,'completed','paid','pelaihari, sarang halang','2026-10-18 22:56:11','2026-11-10 04:10:15'),(21,1,600000.00,'pending','pending','pelaihari, sarang halang','2026-10-18 23:03:50','2026-10-18 23:03:50'),(22,1,500000.00,'pending','pending','pelaihari, sarang halang','2026-10-18 23:04:54','2026-10-18 23:04:54'),(23,1,550000.00,'pending','pending','pelaihari, sarang halang','2026-10-18 23:11:56','2026-10-18 23:11:56'),(24,1,550000.00,'pending','pending','pelaihari, sarang halang','2026-10-18 23:13:55','2026-10-18 23:13:55'),(25,1,550000.00,'pending','pending','pelaihari, sarang halang','2026-10-18 23:14:04','2026-10-18 23:14:04'),(26,1,550000.00,'pending','paid','pelaihari, sarang halang','2026-10-18 23:14:24','2026-10-18 23:14:27'),(27,1,100000.00,'completed','paid','pelaihari, sarang halang','2026-10-18 23:19:26','2026-10-18 23:48:08'),(28,1,250000.00,'completed','paid','pelaihari, sarang halang','2026-10-18 23:35:34','2026-11-10 04:09:59'),(29,1,100000.00,'cancelled','pending','pelaihari, sarang halang','2026-10-18 23:36:40','2026-10-18 23:49:54'),(30,1,113000.00,'pending','pending','pelaihari, sarang halang','2026-10-21 02:43:52','2026-10-21 02:43:52'),(32,14,17.00,'completed','paid','Sarang Halang','2026-11-10 04:05:42','2026-11-10 04:09:40'),(33,14,63000.00,'completed','paid','Sarang Halang','2026-11-10 04:06:07','2026-11-10 04:09:24'),(34,14,630000.00,'completed','paid','Sarang Halang','2026-11-10 04:06:28','2026-11-10 04:09:07');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_variants`
--

DROP TABLE IF EXISTS `product_variants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_variants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_variants_product_id_foreign` (`product_id`),
  CONSTRAINT `product_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_variants`
--

LOCK TABLES `product_variants` WRITE;
/*!40000 ALTER TABLE `product_variants` DISABLE KEYS */;
INSERT INTO `product_variants` VALUES (24,2,'Medium',15000.00,0,'2026-10-21 05:20:12','2026-10-21 05:20:12'),(25,2,'Large',30000.00,1,'2026-10-21 05:20:12','2026-10-21 05:20:12'),(26,2,'Jumbo',50000.00,2,'2026-10-21 05:20:12','2026-10-21 05:20:12'),(39,10,'hayuk',1000.00,0,'2026-10-21 06:21:59','2026-10-21 06:21:59'),(56,7,'Medium',63000.00,0,'2026-11-09 18:39:59','2026-11-09 18:39:59'),(57,7,'Large',88000.00,1,'2026-11-09 18:39:59','2026-11-09 18:39:59'),(58,14,'Box Sedang',17.00,0,'2026-11-10 05:15:50','2026-11-10 05:15:50'),(59,9,'Box Kecil',12000.00,0,'2026-11-10 05:16:55','2026-11-10 05:16:55'),(60,9,'Box Sedang',17000.00,1,'2026-11-10 05:16:55','2026-11-10 05:16:55'),(61,9,'Box Besar',25000.00,2,'2026-11-10 05:16:55','2026-11-10 05:16:55'),(62,8,'Medium',70000.00,0,'2026-11-10 05:17:15','2026-11-10 05:17:15'),(63,8,'Large',100000.00,1,'2026-11-10 05:17:15','2026-11-10 05:17:15'),(64,6,'Medium',63000.00,0,'2026-11-10 05:17:44','2026-11-10 05:17:44'),(65,6,'Large',88000.00,1,'2026-11-10 05:17:44','2026-11-10 05:17:44'),(66,5,'Medium',50000.00,0,'2026-11-10 05:18:03','2026-11-10 05:18:03'),(67,5,'Large',75000.00,1,'2026-11-10 05:18:03','2026-11-10 05:18:03');
/*!40000 ALTER TABLE `product_variants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL DEFAULT 'pizza',
  `description` text DEFAULT NULL,
  `price` decimal(12,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (2,'PIZZA ROYAL','pizza','ANJAI',15000.00,NULL,0,'2026-10-06 09:45:04','2026-10-21 05:20:12'),(5,'ORIGINAL MOZZA','pizza','Saus racikan, daging ayam, bawang bombai, jagung manis, baso sapi, mozzarela, oregano',50000.00,'product_6af3198bb116c4.16178712.jpg',10,'2026-10-21 02:40:47','2026-11-10 05:18:03'),(6,'CHEESE VOLCANO','pizza','original + extra gunungan krim keju',63000.00,'product_6af31978225f43.89593498.jpg',11,'2026-10-21 02:42:23','2026-11-10 05:17:44'),(7,'SMOKED BEEF','pizza','Original mozza + smoked beef',63000.00,'product_6af283ff51f318.32353179.jpg',10,'2026-10-21 02:59:31','2026-11-09 18:39:59'),(8,'EXTRA BEEF','pizza','Original mozza + extra daging sapi',70000.00,'product_6af3195bcd93a6.30546934.jpg',11,'2026-10-21 03:00:36','2026-11-10 05:17:15'),(9,'SINGKONG KEJU','snack','singkong keju toping susu dan keju',12000.00,'product_6af31947229b27.09706158.jpg',10,'2026-10-21 05:10:12','2026-11-10 05:16:55'),(10,'cihuy edit','pizza','qwertyui',9999.00,NULL,15,'2026-10-21 06:06:40','2026-10-21 06:08:44'),(13,'Kue Nastar','pizza',NULL,14.00,'product_6af31931989759.05503841.jpg',0,'2026-10-21 16:23:53','2026-11-10 05:16:33'),(14,'Tape Bakar Original','snack',NULL,12.00,'product_6af31905ec3b03.52849743.jpg',2,'2026-10-21 16:46:45','2026-11-10 05:15:49');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('x3b7lS3wItIEikFxDIhziXjE5VBvhsCVLcZz4yVG',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJwajF5ZkdCU2ZobEs5bzA4VXZOa2JubHQ4WDAwSVBoSUxxeWFMMmpNIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2tlcmFuamFuZyIsInJvdXRlIjoiY2FydC5pbmRleCJ9LCJ1cmwiOnsiaW50ZW5kZWQiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvY2hlY2tvdXQifSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjEsInBhc3N3b3JkX2hhc2hfd2ViIjoiZTJiM2U1Nzc0Yzc3NjJkZTNhM2QxMjE3MmY2ZTQ5YmNlOGE0ZjQwOTY5YzMzNzFlMzNmNDMzNmYxYmIwNDk3NiIsInBheW1lbnRfbWV0aG9kIjoicXJpcyIsIm9yZGVyX2lkIjo2fQ==',1791331970);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `toppings`
--

DROP TABLE IF EXISTS `toppings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `toppings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price_medium` decimal(12,2) NOT NULL DEFAULT 0.00,
  `price_large` decimal(12,2) NOT NULL DEFAULT 0.00,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `toppings`
--

LOCK TABLES `toppings` WRITE;
/*!40000 ALTER TABLE `toppings` DISABLE KEYS */;
/*!40000 ALTER TABLE `toppings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `foto_profile` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'pelanggan',
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'emen','rahman@gmail.com',NULL,NULL,'pelaihari, sarang halang',NULL,'$2y$12$L0TsVEoW8OVo7rR/6RGJke98uHNUxNRx.0at9a40AmAqhx6.XHki6','pelanggan','active',NULL,'2026-10-06 07:04:12','2026-10-19 23:32:18'),(2,'Admin PizzaMozza','admin@pizzamozza.com',NULL,NULL,'Pelaihari',NULL,'$2y$12$2LpJGVPwLaOeMkQ0tHJvjOaXMaGGttWAEUIqGdokvOk3jXNIqqcpK','admin','active',NULL,'2026-10-06 07:20:44','2026-10-06 07:20:44'),(3,'Karyawan PizzaMozza','karyawan@pizzamozza.com',NULL,NULL,'Pelaihari',NULL,'$2y$12$G19nm9FoqdD6uyjQSElrO.baNbGJmgqt5EWprLjTvxdzbity/Nn4y','karyawan','active',NULL,'2026-10-06 07:21:51','2026-10-06 07:21:51'),(4,'rizki agustina','rizkiagt@gmail.com',NULL,NULL,'panggung',NULL,'$2y$12$/SLPUTHvUgfVsyKIO3kpE.7axfguu4HlkXlyGxkqB77LakhHTJiuC','pelanggan','active',NULL,'2026-10-06 21:05:30','2026-10-06 21:05:30'),(7,'cihuy','emen@gmail.com','0833333333',NULL,'banjarmasin',NULL,'$2y$12$xuanhANnql0H8LmkrX3a3OV9a7uyAWADPFVAlH.EbhHnbson5ajAy','pelanggan','active',NULL,'2026-10-07 18:49:47','2026-10-07 18:49:47'),(8,'nukar','menukar@gmail.com','0899999999',NULL,'banjarbaru',NULL,'$2y$12$Fn95Sv5TbN9Zp1T8hGSwS.RXyHxIYk7.J5mnUws9rmZtGrAqbR.c.','pelanggan','active',NULL,'2026-10-07 19:57:28','2026-10-07 19:57:28'),(9,'Rizki Agustina','kina@gmail.com','086645678976543',NULL,'ppn',NULL,'$2y$12$t1HGHp13YPjMhrft4tTXmeXX9PfuGE8GZ7PAV0/DjHwb2V8WKJuVm','pelanggan','active',NULL,'2026-10-07 21:49:52','2026-10-07 21:49:52'),(10,'Muhammad Rahman Destiyanto','Helmi@gmail.com','083163642017',NULL,'Sarang Halang',NULL,'$2y$12$q/ZgZKzbJFvcc13iLkq0PewVNaHGsUw6d.PpN6wyeQsAchf8V/ZWi','pelanggan','active',NULL,'2026-10-07 22:12:49','2026-10-07 22:12:49'),(11,'emen','imin@gmail.com','089876543',NULL,'plh',NULL,'$2y$12$YI7pW3mn4vWcF22uXa5m2.uPSX7xKaeI.rdSWnyybBVcEte1HGC4O','pelanggan','active',NULL,'2026-10-07 22:14:12','2026-10-07 22:14:12'),(13,'helma','helmayuhu@gmail.com','99999999999',NULL,'Pelaihari',NULL,'$2y$12$51q.I/EQqOEgTpPTOTzgfObNl1O5mtH5vuheyfutHsadGKYf7lDt6','pelanggan','active',NULL,'2026-10-26 17:24:51','2026-10-26 17:24:51'),(14,'Helmaaa','Helma12345@gmail.com','666666666666666',NULL,'Sarang Halang',NULL,'$2y$12$EN2fQmo0afhnOQfa8bRZWutGgp3z0hDyJuxwDBeJf12DUcKEj98ju','pelanggan','active',NULL,'2026-11-04 23:29:11','2026-11-04 23:29:11');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'pizzamozza_3role'
--

--
-- Dumping routines for database 'pizzamozza_3role'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-11-12 11:09:31

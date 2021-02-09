-- MySQL dump 10.13  Distrib 5.7.31, for Linux (x86_64)
--
-- Host: localhost    Database: tekplaza
-- ------------------------------------------------------
-- Server version	5.7.31-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
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
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` int(10) unsigned NOT NULL,
  `to` int(10) unsigned NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_from_foreign` (`from`),
  KEY `messages_to_foreign` (`to`),
  CONSTRAINT `messages_from_foreign` FOREIGN KEY (`from`) REFERENCES `users` (`id`),
  CONSTRAINT `messages_to_foreign` FOREIGN KEY (`to`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,4,6,'safsagsedhbsdfh','2021-01-09 21:01:47','2021-01-09 21:01:47',NULL),(2,4,2,'sadfasfasdf','2021-01-12 19:17:50','2021-01-12 19:17:50',NULL),(3,4,2,'sadasfsaf','2021-01-12 19:20:17','2021-01-12 19:20:17',NULL),(4,1,3,'asfgvasdgvbadsgb','2021-01-12 19:43:09','2021-01-12 19:43:09',NULL),(5,1,4,'fasedfadsfad','2021-01-12 19:43:17','2021-01-12 19:53:55','2021-01-12 19:53:55'),(6,1,4,'ggggggggggggggggg','2021-01-12 19:43:19','2021-01-12 19:43:19',NULL),(7,1,4,'444444444444444444','2021-01-12 19:43:23','2021-01-12 19:43:23',NULL),(8,1,4,'fhnbfdbnfdnb','2021-01-12 19:43:25','2021-01-12 19:43:25',NULL),(9,4,3,'fadfsdgsdg','2021-01-12 20:36:07','2021-01-12 20:36:07',NULL),(10,8,1,'dsghfsdhdfghj','2021-01-14 14:53:47','2021-01-14 14:53:47',NULL),(11,1,4,'asfasdfdafdaf','2021-01-15 19:47:07','2021-01-15 19:47:07',NULL),(12,1,4,'ngfcnnbb','2021-01-15 19:47:15','2021-01-15 19:47:15',NULL),(13,1,4,'dsadsad','2021-01-15 19:47:22','2021-01-15 19:47:22',NULL),(14,1,4,'4234234gtrg','2021-01-15 19:47:27','2021-01-15 19:47:27',NULL),(15,1,4,'dddddddddddd','2021-01-15 19:47:31','2021-01-15 19:47:31',NULL),(16,4,3,'asdasdasd','2021-01-15 19:49:19','2021-01-15 19:49:19',NULL),(17,4,1,'afadfdasf','2021-01-15 19:50:45','2021-01-15 19:50:45',NULL),(22,5,2,'asdasd','2021-01-16 15:22:56','2021-01-16 15:22:56',NULL);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_11_000000_create_roles_table',1),(2,'2014_10_12_000001_create_users_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2020_12_30_152911_create_subforums_table',1),(6,'2020_12_30_152929_create_threads_table',1),(7,'2020_12_30_152943_create_posts_table',1),(8,'2020_12_30_152957_create_messages_table',1),(9,'2021_01_09_143605_create_subforum_bans_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `creator` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thread` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_creator_foreign` (`creator`),
  KEY `posts_thread_foreign` (`thread`),
  CONSTRAINT `posts_creator_foreign` FOREIGN KEY (`creator`) REFERENCES `users` (`id`),
  CONSTRAINT `posts_thread_foreign` FOREIGN KEY (`thread`) REFERENCES `threads` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,1,'Hilo inaugural de TekPlaza','Con este primer post queda inaugurado el foro de TekPlaza, lugar de discusión de tecnología de consumo.',1,'2021-01-15 15:34:37','2021-01-15 15:34:37',NULL),(2,2,'RE: Hilo inaugural de TekPlaza','Buenas, Gabriel. Espero que este foro sea un lugar concurrido de debate y ayuda.',1,'2021-01-15 15:34:37','2021-01-15 15:34:37',NULL),(3,4,'Propuesta de nuevas normas para los foros de soporte técnico','Hola a todos. Para evitar ambigüedades, considero oportuno añadir algunas normas para estandarizar el proceso de resolución de dudas y que la gente pueda tenerlas resueltas lo antes posible.',2,'2021-01-15 15:34:37','2021-01-15 15:34:37',NULL),(4,1,'Normas del subforo general de tecnología','En ese subforo tenemos las siguientes normas, basadas en el sentido común y en el respeto al resto de usuarios.',3,'2021-01-15 15:34:37','2021-01-15 15:34:37',NULL),(5,5,'Normas de los subforos de marcas','En ese subforo tenemos las siguientes normas, basadas en el sentido común y en el respeto al resto de usuarios.',4,'2021-01-15 15:34:37','2021-01-15 15:34:37',NULL),(6,5,'Normas de los subforos de marcas','En ese subforo tenemos las siguientes normas, basadas en el sentido común y en el respeto al resto de usuarios.',5,'2021-01-15 15:34:37','2021-01-15 15:34:37',NULL),(7,5,'Normas de los subforos de marcas','En ese subforo tenemos las siguientes normas, basadas en el sentido común y en el respeto al resto de usuarios.',6,'2021-01-15 15:34:37','2021-01-15 15:34:37',NULL),(8,4,'Normas del subforo de montaje de PCs','En ese subforo tenemos las siguientes normas, basadas en el sentido común y en el respeto al resto de usuarios.',7,'2021-01-15 15:34:37','2021-01-15 15:34:37',NULL),(9,3,'Normas de los subforos de soporte técnico','En ese subforo tenemos las siguientes normas, basadas en el sentido común y en el respeto al resto de usuarios.',8,'2021-01-15 15:34:37','2021-01-15 15:34:37',NULL),(10,3,'Normas de los subforos de soporte técnico','En ese subforo tenemos las siguientes normas, basadas en el sentido común y en el respeto al resto de usuarios.',9,'2021-01-15 15:34:37','2021-01-15 15:34:37',NULL),(11,3,'Normas de los subforos de soporte técnico','En ese subforo tenemos las siguientes normas, basadas en el sentido común y en el respeto al resto de usuarios.',10,'2021-01-15 15:34:37','2021-01-15 15:34:37',NULL),(12,7,'Placas solares','Buenas. Estoy investigando sobre la situación actual para instalar placas solares en mi casa. Agradecería cualquier sugerencia si alguno de vosotros tiene experiencia con el tema, pero de todas formas también iré poniendo respuestas a medida que vaya encontrando información para que pueda ser útil para cualquier otra persona.',11,'2021-01-15 15:34:37','2021-01-15 15:34:37',NULL),(13,4,'RE: Placas solares','Respuesta 1',11,'2021-01-15 15:34:37','2021-01-15 15:34:37',NULL),(14,9,'RE: Placas solares','A mí también me interesa el tema, estaré atento a este hilo.',11,'2021-01-15 15:34:37','2021-01-15 15:34:37',NULL),(15,7,'RE: Placas solares','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',11,'2021-01-15 15:34:37','2021-01-15 15:34:37',NULL),(16,1,'RE: Placas solares','Respuesta de prueba 12345.',11,'2021-01-15 15:34:37','2021-01-15 15:34:37',NULL),(17,2,'Respuesta al hilo','Respuesta 3. sfddasvgdsvbsfbh\r\ndsafvg\r\n\r\n656456',11,'2021-01-15 15:34:37','2021-01-15 16:17:25',NULL),(18,5,'RE: Placas solares','Respuesta 4.',11,'2021-01-15 15:34:37','2021-01-15 15:34:37',NULL),(19,1,'Hilo de prueba 1234567890 abcdefg','Post de prueba.',12,'2021-01-15 15:34:37','2021-01-15 15:34:37',NULL),(20,6,'Hilo 1','Primer post de Hilo 1.',13,'2021-01-15 15:34:37','2021-01-15 15:34:37',NULL),(21,4,'Hilo 2','Post de prueba 2.',14,'2021-01-15 15:34:37','2021-01-15 15:34:37',NULL),(22,2,'Hilo 3','El veloz murciélago hindú comía feliz cardillo y kiwi. La cigüeña toca el saxofón detrás del palenque de paja. 1234567890',15,'2021-01-15 15:34:37','2021-01-15 15:34:37',NULL);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin',NULL,NULL,NULL),(2,'moderador',NULL,NULL,NULL),(3,'usuario',NULL,NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subforum_bans`
--

DROP TABLE IF EXISTS `subforum_bans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subforum_bans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `banned_user` int(10) unsigned NOT NULL,
  `moderator` int(10) unsigned NOT NULL,
  `subforum` int(10) unsigned NOT NULL,
  `days` int(10) unsigned NOT NULL,
  `motive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subforum_bans_banned_user_foreign` (`banned_user`),
  KEY `subforum_bans_moderator_foreign` (`moderator`),
  KEY `subforum_bans_subforum_foreign` (`subforum`),
  CONSTRAINT `subforum_bans_banned_user_foreign` FOREIGN KEY (`banned_user`) REFERENCES `users` (`id`),
  CONSTRAINT `subforum_bans_moderator_foreign` FOREIGN KEY (`moderator`) REFERENCES `users` (`id`),
  CONSTRAINT `subforum_bans_subforum_foreign` FOREIGN KEY (`subforum`) REFERENCES `subforums` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subforum_bans`
--

LOCK TABLES `subforum_bans` WRITE;
/*!40000 ALTER TABLE `subforum_bans` DISABLE KEYS */;
INSERT INTO `subforum_bans` VALUES (1,8,4,5,1,'','2021-01-09 20:58:04','2021-01-09 20:58:04',NULL),(2,8,4,8,1,'','2021-01-09 21:01:35','2021-01-09 21:01:35',NULL),(3,8,4,9,1,'','2021-01-09 21:03:45','2021-01-09 21:03:45',NULL),(4,8,4,10,1,'','2021-01-09 21:04:26','2021-01-09 21:04:26',NULL),(5,8,4,10,1,'','2021-01-09 21:06:03','2021-01-09 21:06:03',NULL),(6,8,4,3,1,'','2021-01-09 21:07:41','2021-01-09 21:07:41',NULL),(7,9,4,1,1,'sadasd','2021-01-12 20:37:09','2021-01-12 20:37:09',NULL),(8,7,4,1,1,'vvvvvvvvvvvvvv','2021-01-12 21:01:54','2021-01-12 21:01:54',NULL),(9,8,4,3,1,'','2021-01-14 16:52:09','2021-01-14 16:52:09',NULL);
/*!40000 ALTER TABLE `subforum_bans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subforums`
--

DROP TABLE IF EXISTS `subforums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subforums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_role` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subforums_min_role_foreign` (`min_role`),
  CONSTRAINT `subforums_min_role_foreign` FOREIGN KEY (`min_role`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subforums`
--

LOCK TABLES `subforums` WRITE;
/*!40000 ALTER TABLE `subforums` DISABLE KEYS */;
INSERT INTO `subforums` VALUES (1,'Despacho oval','Lugar de discusión de temas relativos a la administración de TekPlaza.',1,NULL,NULL,NULL),(2,'Oficinas centrales','Zona de coordinación de las actividades de moderación de todos los subforos.',2,NULL,NULL,NULL),(3,'Tecnología','Discusión de temas tecnológicos no relacionados con el resto de subforos.',3,NULL,NULL,NULL),(4,'AMD','Discusión general y de novedades de AMD.',3,NULL,NULL,NULL),(5,'Intel','Discusión general y de novedades de Intel.',3,NULL,NULL,NULL),(6,'Nvidia','Discusión general y de novedades de Nvidia.',3,NULL,NULL,NULL),(7,'Montaje de PCs','¿Quieres montar tu propio PC? Aquí podrás discutir sobre el proceso y la elección de piezas.',3,NULL,NULL,NULL),(8,'Soporte técnico GNU/Linux','¿Necesitas ayuda con tu instalación de GNU/Linux? Este es el sitio indicado.',3,NULL,NULL,NULL),(9,'Soporte técnico macOS','¿Necesitas ayuda con tu instalación de macOS? Este es el sitio indicado.',3,NULL,NULL,NULL),(10,'Soporte técnico Windows','¿Necesitas ayuda con tu instalación de Windows? Este es el sitio indicado.',3,NULL,NULL,NULL);
/*!40000 ALTER TABLE `subforums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `threads`
--

DROP TABLE IF EXISTS `threads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `threads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `creator` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locked` tinyint(1) NOT NULL,
  `pinned` tinyint(1) NOT NULL,
  `subforum` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `threads_creator_foreign` (`creator`),
  KEY `threads_subforum_foreign` (`subforum`),
  CONSTRAINT `threads_creator_foreign` FOREIGN KEY (`creator`) REFERENCES `users` (`id`),
  CONSTRAINT `threads_subforum_foreign` FOREIGN KEY (`subforum`) REFERENCES `subforums` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `threads`
--

LOCK TABLES `threads` WRITE;
/*!40000 ALTER TABLE `threads` DISABLE KEYS */;
INSERT INTO `threads` VALUES (1,1,'Hilo inaugural de TekPlaza',0,1,1,'2021-01-15 15:34:34','2021-01-15 15:34:34',NULL),(2,4,'Propuesta de nuevas normas para los foros de soporte técnico',0,0,2,'2021-01-15 15:34:34','2021-01-15 15:34:34',NULL),(3,1,'Normas del subforo general de tecnología',1,1,3,'2021-01-15 15:34:34','2021-01-15 15:34:34',NULL),(4,5,'Normas de los subforos de marcas',1,1,4,'2021-01-15 15:34:34','2021-01-15 15:34:34',NULL),(5,5,'Normas de los subforos de marcas',1,1,5,'2021-01-15 15:34:34','2021-01-15 15:34:34',NULL),(6,5,'Normas de los subforos de marcas',1,1,6,'2021-01-15 15:34:34','2021-01-15 15:34:34',NULL),(7,4,'Normas del subforo de montaje de PCs',1,1,7,'2021-01-15 15:34:34','2021-01-15 15:34:34',NULL),(8,3,'Normas de los subforos de soporte técnico',1,1,8,'2021-01-15 15:34:34','2021-01-15 15:34:34',NULL),(9,3,'Normas de los subforos de soporte técnico',1,1,9,'2021-01-15 15:34:34','2021-01-15 15:34:34',NULL),(10,3,'Normas de los subforos de soporte técnico',1,1,10,'2021-01-15 15:34:34','2021-01-15 15:34:34',NULL),(11,7,'Placas solares',0,0,3,'2021-01-15 15:34:34','2021-01-15 15:51:11',NULL),(12,1,'Hilo de prueba 1234567890 abcdefg',1,1,3,'2021-01-15 15:34:34','2021-01-15 15:34:34',NULL),(13,6,'Hilo 1',0,0,3,'2021-01-15 15:34:34','2021-01-15 15:34:34',NULL),(14,4,'Hilo 2',1,0,3,'2021-01-15 15:34:34','2021-01-15 15:34:34',NULL),(15,2,'Hilo 3',0,0,3,'2021-01-15 15:34:34','2021-01-15 15:34:34',NULL);
/*!40000 ALTER TABLE `threads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_role` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_id_role_foreign` (`id_role`),
  CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'TekGabriel','administrador1@email.com','$2y$10$gYBK4JyrsoNCt.IvRPHkHueUwi2o0iVyy9YsvU26GSXh6LS9FtvOa',NULL,1,NULL,NULL,NULL),(2,'Anton512','administrador2@email.com','$2y$10$5tXMDn.F1eaz6WXA0WTjgeZVYnYviAYGFOQ47lhtoIg2YpTMH7SvC',NULL,1,NULL,NULL,NULL),(3,'Dany77','moderador1@email.com','$2y$10$perGLsPSM0nF.w5wny07z.M8U95cvjKXso80G71aa5oBIVF8yeloe',NULL,2,NULL,NULL,NULL),(4,'ChipLucia','moderador2@email.com','$2y$10$iYNmxjQYL5BDsjh7Ul.5guY6WOlLsBMt7BxePqbNCjrT0WTjnoMIm',NULL,2,NULL,NULL,NULL),(5,'TekMod3','moderador3@email.com','$2y$10$M8XVNtRsiw8oXx6.ddO5m.LGoa3YGXXTPzwvbLZLAmjMAd2XPZpMe',NULL,2,NULL,NULL,NULL),(6,'SarahC','usuario1@email.com','$2y$10$fwdm60OecQXQ/VB4DCTHFuzUPOdO88fsWwXdy1cGXpe3jwgFiM9Fu',NULL,3,NULL,NULL,NULL),(7,'Dant3','usuario2@email.com','$2y$10$6sZDtFT/zzTYbzb7JZlLGe79ux6732yziV90AUDREraz2rWFJt0cG',NULL,3,NULL,NULL,NULL),(8,'JPerez','usuario3@email.com','$2y$10$14Nn9CNeSpaovrA8HzwKs..VWH0pZQIuk0dcrUwTwU7aBF2HeS65.',NULL,3,NULL,NULL,NULL),(9,'TekUser4','usuario4@email.com','$2y$10$aBKtYmM//LqFB.zwZ.qUm.ztZ1iy1sGkgQM2wCfmOKewOD/plA18m',NULL,3,NULL,NULL,NULL),(10,'TekUsuario5','usuario5@email.com','$2y$10$MektYCFnU3fhroSs/a6auuYQpjxtuhTOcQr8.C33Y.w7QurnSwcMW',NULL,3,'2021-01-09 20:55:23','2021-01-09 20:55:23',NULL),(11,'fdssdf','dgsdg@email.com','$2y$10$Blt5XoxkwCRg1NgryzC3..hLE4gcr1xAGuR8tdvgzEeIRk..rK6wC',NULL,3,'2021-01-16 13:51:32','2021-01-16 13:51:32',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-17 20:20:45

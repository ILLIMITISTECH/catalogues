-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: collaboratris
-- ------------------------------------------------------
-- Server version	5.7.25

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
-- Table structure for table `actions`
--

DROP TABLE IF EXISTS `actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `visibilite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `risque` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reunion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_id` int(11) DEFAULT '0',
  `reunion_id` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delais` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actions`
--

LOCK TABLES `actions` WRITE;
/*!40000 ALTER TABLE `actions` DISABLE KEYS */;
INSERT INTO `actions` VALUES (5,'collaboratris','2020-04-03','yes','18/20','à ne pas le faire',NULL,NULL,1,1,'2020-04-03 12:10:43','2020-04-03 12:10:43','2 jours'),(6,'Art du focus','2020-04-11','yes','19/20','grave',NULL,NULL,2,1,'2020-04-03 12:11:14','2020-04-03 12:11:14','5 jours'),(7,'E-learning','2020-04-15','no','15/20','danger',NULL,NULL,3,2,'2020-04-03 12:11:55','2020-04-03 12:11:55','1 jours'),(8,'Illimitis','2020-04-30','yes','17/20','perdre le temps',NULL,NULL,4,1,'2020-04-03 12:12:33','2020-04-03 12:12:33','3 jours'),(9,'Webinaaire','2020-04-10','yes','16/20','A',NULL,NULL,3,1,'2020-04-03 13:10:43','2020-04-03 13:10:43','4 jours'),(10,'collaboratris','2020-04-08','yes','17/20','B',NULL,NULL,5,1,'2020-04-08 17:48:31','2020-04-08 17:48:31','10 avril'),(11,'E-learning','2020-04-10','no','17/20','C',NULL,NULL,5,2,'2020-04-08 17:49:08','2020-04-08 17:49:08','30 avril'),(12,'Illimitis','2020-04-23','yes','18/20','A',NULL,NULL,5,1,'2020-04-08 17:49:44','2020-04-08 17:49:44','15 avril'),(13,'Art du focus','2020-04-09','yes','19/20','A',NULL,NULL,2,2,'2020-04-08 19:32:15','2020-04-08 19:32:15','11 avril'),(14,'Art du focus','2020-04-16','yes','17/20','A',NULL,NULL,6,1,'2020-04-08 20:26:47','2020-04-08 20:26:47','11 avril');
/*!40000 ALTER TABLE `actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agents`
--

DROP TABLE IF EXISTS `agents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fonction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_naiss` date NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatshap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau_hieracie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` int(11) DEFAULT '0',
  `superieur_id` int(11) DEFAULT '0',
  `user_id` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agents`
--

LOCK TABLES `agents` WRITE;
/*!40000 ALTER TABLE `agents` DISABLE KEYS */;
INSERT INTO `agents` VALUES (1,'Fallou','Gueye','developpeur','1997-05-15','777092285','777092285','fallou.g@illimitis.com',NULL,NULL,NULL,NULL,0,'2020-04-02 14:05:05','2020-04-02 14:05:05','FB_IMG_15391761226694000.jpg'),(2,'Axel','N','assistant','2020-04-02','778888888','775896933','axel.n@illimitis.com',NULL,NULL,NULL,NULL,0,'2020-04-02 14:08:52','2020-04-02 14:08:52','IMG_6755.JPG'),(3,'Roland','Kydebrego','Directeur','2020-04-17','778524596','775896596','roland.k@illimitis.com',NULL,NULL,NULL,NULL,0,'2020-04-02 14:10:27','2020-04-02 14:10:27','IMG_6974.JPG'),(4,'Fatou','Thiam','Secretaire','2020-04-09','778133025','774569852','fatou.t@gmail.com',NULL,NULL,NULL,NULL,0,'2020-04-02 14:11:33','2020-04-02 14:11:33','IMG_6827.JPG'),(5,'Fallou','Gueye','développeur','2020-04-08','777092285','768424185','fallougueye197@gmail.com',NULL,NULL,4,NULL,4,'2020-04-08 17:46:13','2020-04-08 17:46:13','photo_optimized(1).jpg'),(6,'Amary','Diouf','Informaticien','2020-04-23','778888888','758499632','amary@gmail.com',NULL,NULL,4,NULL,5,'2020-04-08 19:41:57','2020-04-08 19:41:57','IMG-20181227-WA0016.jpg');
/*!40000 ALTER TABLE `agents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `annonces`
--

DROP TABLE IF EXISTS `annonces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `annonces` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `annonces`
--

LOCK TABLES `annonces` WRITE;
/*!40000 ALTER TABLE `annonces` DISABLE KEYS */;
INSERT INTO `annonces` VALUES (1,'Art du Focus','WhatsApp Image 2020-02-26 at 18.38.05(1).jpeg','Publication premiere vidéo chaine youtube','2020-04-09 12:24:14','2020-04-09 12:24:14'),(2,'Collaboratis','WhatsApp Image 2020-03-06 at 09.03.51.jpeg','Lancement de la Plateforme Collaboratis','2020-04-09 12:24:53','2020-04-09 12:24:53'),(3,'Illimitis','WhatsApp Image 2020-02-26 at 18.38.05.jpeg','Lancement de la Plateforme Illimitis','2020-04-09 12:25:27','2020-04-09 12:25:27');
/*!40000 ALTER TABLE `annonces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `decissions`
--

DROP TABLE IF EXISTS `decissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `decissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delais` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reunion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_id` int(11) DEFAULT '0',
  `reunion_id` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `decissions`
--

LOCK TABLES `decissions` WRITE;
/*!40000 ALTER TABLE `decissions` DISABLE KEYS */;
INSERT INTO `decissions` VALUES (1,'Terminer','10 avril',NULL,NULL,4,1,'2020-04-03 13:28:41','2020-04-03 13:28:41'),(2,'Mettre fin avant','15 avril',NULL,NULL,1,2,'2020-04-03 13:29:26','2020-04-03 13:29:26'),(3,'En attente','30 avril',NULL,NULL,3,1,'2020-04-03 13:30:01','2020-04-03 13:30:01'),(4,'Aller en congé','01 mai',NULL,NULL,2,1,'2020-04-03 13:30:54','2020-04-03 13:30:54');
/*!40000 ALTER TABLE `decissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `directions`
--

DROP TABLE IF EXISTS `directions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `directions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom_direction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `directions`
--

LOCK TABLES `directions` WRITE;
/*!40000 ALTER TABLE `directions` DISABLE KEYS */;
INSERT INTO `directions` VALUES (1,'Technique',NULL,NULL),(2,'Marketing',NULL,NULL),(3,'Administratif',NULL,NULL),(4,'Administratif','2020-04-02 16:31:02','2020-04-02 16:31:02'),(5,'Informatique','2020-04-02 16:58:35','2020-04-02 16:58:35');
/*!40000 ALTER TABLE `directions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
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
-- Table structure for table `formations`
--

DROP TABLE IF EXISTS `formations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom_formation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_id` int(11) DEFAULT '0',
  `theme_id` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formations`
--

LOCK TABLES `formations` WRITE;
/*!40000 ALTER TABLE `formations` DISABLE KEYS */;
/*!40000 ALTER TABLE `formations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indicateurs`
--

DROP TABLE IF EXISTS `indicateurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicateurs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cible` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_cible` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicateurs`
--

LOCK TABLES `indicateurs` WRITE;
/*!40000 ALTER TABLE `indicateurs` DISABLE KEYS */;
INSERT INTO `indicateurs` VALUES (1,'WinnersWeek','Entreprise','2020-04-22','2020-04-03 13:47:41','2020-04-03 13:47:41'),(2,'Art du focus','PME','2020-04-16','2020-04-03 13:48:12','2020-04-03 13:48:12'),(3,'Team building','Les entrepreneurs','2020-04-23','2020-04-03 13:48:57','2020-04-03 13:48:57'),(4,'Coaching','les starteppers','2020-04-29','2020-04-03 13:49:34','2020-04-03 13:49:34');
/*!40000 ALTER TABLE `indicateurs` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_03_17_101020_create_formations_table',1),(5,'2020_03_31_102947_create_actions_table',1),(6,'2020_03_31_103024_create_agents_table',1),(7,'2020_03_31_103055_create_reunions_table',1),(8,'2020_03_31_103146_create_decissions_table',1),(9,'2020_03_31_103230_create_directions_table',1),(10,'2020_03_31_103313_create_services_table',1),(11,'2020_03_31_103356_create_indicateurs_table',1),(12,'2020_03_31_103420_create_suivi_indicateurs_table',1),(13,'2020_03_31_103448_create_suivi_actions_table',1),(14,'2020_03_31_103514_create_suivi_modules_table',1),(15,'2020_03_31_103546_create_modules_table',1),(16,'2020_03_31_103711_create_roles_table',1),(17,'2020_03_31_104352_create_themes_table',1),(18,'2020_04_09_120905_create_annonces_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_a` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_b` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_c` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_a` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_b` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_c` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_a` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_b` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_c` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `formation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `formation_id` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modules`
--

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
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
-- Table structure for table `reunions`
--

DROP TABLE IF EXISTS `reunions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reunions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `nombre_partici` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `liste` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heure_debut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heure_fin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reunions`
--

LOCK TABLES `reunions` WRITE;
/*!40000 ALTER TABLE `reunions` DISABLE KEYS */;
INSERT INTO `reunions` VALUES (1,'2020-04-02','10 participants','CAHIER DE CHARGE SITE INTERNET (1) (MOUHAMED FADEL AIDARA) (1).docx','16:00','17:00','2020-04-02 17:27:00','2020-04-02 17:27:00'),(2,'2020-04-01','03 participants','BIG DATA.odt','12:00','13:00','2020-04-02 17:28:28','2020-04-02 17:28:28');
/*!40000 ALTER TABLE `reunions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin',NULL,NULL),(2,'tech',NULL,NULL),(3,'marketing',NULL,NULL),(4,'assistant(e)',NULL,NULL),(5,'secretaire',NULL,NULL),(6,'utilisateur',NULL,NULL),(7,'directeur',NULL,NULL),(8,'Serveur','2020-04-09 11:48:53','2020-04-09 11:48:53');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom_service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direction_id` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Assistant','Technique',1,NULL,NULL),(2,'Secretaire','Marketing',2,NULL,NULL),(3,'Directeur','Administratif',3,NULL,NULL),(4,'informaticien','Informatique',NULL,'2020-04-02 16:58:55','2020-04-02 16:58:55');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suivi_actions`
--

DROP TABLE IF EXISTS `suivi_actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suivi_actions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `pourcentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_id` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suivi_actions`
--

LOCK TABLES `suivi_actions` WRITE;
/*!40000 ALTER TABLE `suivi_actions` DISABLE KEYS */;
INSERT INTO `suivi_actions` VALUES (5,'2020-04-03','80%','18/20',NULL,5,'2020-04-03 13:17:15','2020-04-03 13:17:15'),(6,'2020-04-03','70%','17/20',NULL,6,'2020-04-03 13:17:39','2020-04-03 13:17:39'),(7,'2020-04-03','60%','16/20',NULL,7,'2020-04-03 13:18:03','2020-04-03 13:18:03'),(8,'2020-04-03','90%','19/20',NULL,9,'2020-04-03 13:18:26','2020-04-03 13:18:26');
/*!40000 ALTER TABLE `suivi_actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suivi_indicateurs`
--

DROP TABLE IF EXISTS `suivi_indicateurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suivi_indicateurs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `pourcentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indicateur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indicateur_id` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suivi_indicateurs`
--

LOCK TABLES `suivi_indicateurs` WRITE;
/*!40000 ALTER TABLE `suivi_indicateurs` DISABLE KEYS */;
INSERT INTO `suivi_indicateurs` VALUES (1,'2020-04-03','60%','16/20',NULL,1,'2020-04-03 13:58:37','2020-04-03 13:58:37'),(2,'2020-04-03','70%','17/20',NULL,2,'2020-04-03 13:59:19','2020-04-03 13:59:19'),(3,'2020-04-03','80%','18/20',NULL,3,'2020-04-03 13:59:37','2020-04-03 13:59:37'),(4,'2020-04-02','90%','19/20',NULL,4,'2020-04-03 14:00:00','2020-04-03 14:00:00');
/*!40000 ALTER TABLE `suivi_indicateurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suivi_modules`
--

DROP TABLE IF EXISTS `suivi_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suivi_modules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `heure_debut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heure_fin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etat_video_a` tinyint(1) DEFAULT '0',
  `etat_video_b` tinyint(1) DEFAULT '0',
  `etat_video_c` tinyint(1) DEFAULT '0',
  `etat_text_a` tinyint(1) DEFAULT '0',
  `etat_text_b` tinyint(1) DEFAULT '0',
  `etat_text_c` tinyint(1) DEFAULT '0',
  `etat_note_a` tinyint(1) DEFAULT '0',
  `etat_note_b` tinyint(1) DEFAULT '0',
  `etat_note_c` tinyint(1) DEFAULT '0',
  `agent_id` int(11) DEFAULT '0',
  `module_id` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suivi_modules`
--

LOCK TABLES `suivi_modules` WRITE;
/*!40000 ALTER TABLE `suivi_modules` DISABLE KEYS */;
/*!40000 ALTER TABLE `suivi_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `themes`
--

DROP TABLE IF EXISTS `themes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `themes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom_theme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `themes`
--

LOCK TABLES `themes` WRITE;
/*!40000 ALTER TABLE `themes` DISABLE KEYS */;
/*!40000 ALTER TABLE `themes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `nom_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Fallou','Gueye','yes@gmail.com',NULL,'tech','$2y$10$4vA5awjKqoJEQ4OOtwl3AuUhJxtccGmCcJPEBHfypeIyUISoSnCRW',NULL,NULL,'2020-03-31 19:16:19','2020-03-31 19:16:19','falloulogo.png'),(2,'Admin','admin','yes1@gmail.com',NULL,'Select Role','$2y$10$3W63QrLyXtLV3WqrvxoF7.NjAnutiW97AyYFMVihjYtspODQM4MAW',NULL,NULL,'2020-03-31 19:20:41','2020-03-31 19:20:41','FB_IMG_15391761226694000.jpg'),(3,'Admin','admin','admin@gmail.com',NULL,'admin','$2y$10$uCxeKEUM50MIjO2NInRQUO/iOId1p6mrjvjapbapLPJwSSewYx0Vy',NULL,NULL,'2020-04-01 12:30:32','2020-04-01 12:30:32','IMG-20180511-WA0019.jpg'),(4,'Fallou','Gueye','user@gmail.com',NULL,'utilisateur','$2y$10$ofOHxqzuz/GqwPthfz0XM.fk5EaTKShx6or/XBmIZML7fBL.zL.ce',NULL,NULL,'2020-04-08 17:46:13','2020-04-08 17:46:13',NULL),(5,'Amary','Diouf','amary@gmail.com',NULL,'utilisateur','$2y$10$xYtDcM0cWGgfT9DQbYSXx.J0Vv0aPdvSVlCgzpApUNMug39hn6k5K',NULL,NULL,'2020-04-08 19:41:56','2020-04-08 19:41:56',NULL);
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

-- Dump completed on 2020-04-09 12:27:05

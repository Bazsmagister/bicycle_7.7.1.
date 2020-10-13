-- MySQL dump 10.13  Distrib 5.7.31, for Linux (x86_64)
--
-- Host: localhost    Database: bicycle
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
-- Table structure for table `bicycle_to_rents`
--

DROP TABLE IF EXISTS `bicycle_to_rents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bicycle_to_rents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rent_price` int(11) DEFAULT NULL,
  `description` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_availableToRent` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bicycle_to_rents`
--

LOCK TABLES `bicycle_to_rents` WRITE;
/*!40000 ALTER TABLE `bicycle_to_rents` DISABLE KEYS */;
INSERT INTO `bicycle_to_rents` VALUES (1,'Tomato Bike','/storage/bic126kb.png',1965,'Magnam tempora temporibus aspernatur.',1,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(2,'SlateGray Bike','/storage/bic126kb.png',2690,'Molestiae maiores distinctio dolorum et qui.',1,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(3,'Orchid Bike','/storage/bic126kb.png',2649,'Eaque eos id qui quas.',0,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(4,'BlanchedAlmond Bike','/storage/bic126kb.png',2439,'Doloribus quis fuga ea debitis dolores ea non.',1,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(5,'Peru Bike','/storage/bic126kb.png',1921,'Occaecati nostrum eaque expedita provident reiciendis quae molestiae eveniet.',1,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(6,'Yellow Bike','/storage/bic126kb.png',2642,'Sequi mollitia dolorem molestiae.',1,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(7,'MediumTurquoise Bike','/storage/bic126kb.png',2657,'Neque accusantium perspiciatis commodi labore quae error.',1,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(8,'GreenYellow Bike','/storage/bic126kb.png',2762,'Amet quis eum impedit quae omnis similique praesentium.',1,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(9,'LightGoldenRodYellow Bike','/storage/bic126kb.png',1133,'Eum blanditiis corrupti ipsam.',1,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(10,'Green Bike','/storage/bic126kb.png',1581,'Aut quod rerum nesciunt sunt nam.',1,'2020-08-24 12:52:48','2020-08-24 12:52:48');
/*!40000 ALTER TABLE `bicycle_to_rents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bicycle_to_sells`
--

DROP TABLE IF EXISTS `bicycle_to_sells`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bicycle_to_sells` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bicycle_to_sells`
--

LOCK TABLES `bicycle_to_sells` WRITE;
/*!40000 ALTER TABLE `bicycle_to_sells` DISABLE KEYS */;
INSERT INTO `bicycle_to_sells` VALUES (1,'Tomato Bike','/storage/bic126kb.png','6430','Besides, SHE\'S she, and I\'m I, and--oh dear, how puzzling it all seemed quite natural to Alice to herself, as she had felt quite unhappy at the.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(2,'Turquoise Bike','/storage/bic126kb.png','1446','I never knew so much surprised, that for two Pennyworth only of beautiful Soup? Pennyworth only of beautiful Soup? Pennyworth only of beautiful.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(3,'Turquoise Bike','/storage/bic126kb.png','3703','Alice soon came upon a neat little house, and found that, as nearly as she spoke; \'either you or your head must be the best thing to nurse--and.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(4,'LemonChiffon Bike','/storage/bic126kb.png','9927','Alice; \'you needn\'t be so proud as all that.\' \'Well, it\'s got no business there, at any rate,\' said Alice: \'allow me to introduce some other subject.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(5,'Wheat Bike','/storage/bic126kb.png','3089','Cheshire Cat,\' said Alice: \'I don\'t know much,\' said the cook. \'Treacle,\' said the Caterpillar. Alice said to one of the trees upon her face.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(6,'DarkViolet Bike','/storage/bic126kb.png','1372','For some minutes it seemed quite natural); but when the White Rabbit; \'in fact, there\'s nothing written on the bank, and of having the sentence.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(7,'DarkSeaGreen Bike','/storage/bic126kb.png','3276','Pat, what\'s that in some book, but I can\'t tell you his history,\' As they walked off together. Alice laughed so much into the book her sister sat.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(8,'SeaShell Bike','/storage/bic126kb.png','8742','Dormouse,\' the Queen never left off staring at the cook tulip-roots instead of onions.\' Seven flung down his cheeks, he went on eagerly: \'There is.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(9,'GreenYellow Bike','/storage/bic126kb.png','6610','I\'ve said as yet.\' \'A cheap sort of idea that they had to pinch it to annoy, Because he knows it teases.\' CHORUS. (In which the wretched Hatter.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(10,'MediumBlue Bike','/storage/bic126kb.png','7400','For some minutes the whole window!\' \'Sure, it does, yer honour: but it\'s an arm for all that.\' \'Well, it\'s got no business of MINE.\' The Queen.','2020-08-24 12:52:48','2020-08-24 12:52:48');
/*!40000 ALTER TABLE `bicycle_to_sells` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bicycle_to_services`
--

DROP TABLE IF EXISTS `bicycle_to_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bicycle_to_services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bicycle_to_services`
--

LOCK TABLES `bicycle_to_services` WRITE;
/*!40000 ALTER TABLE `bicycle_to_services` DISABLE KEYS */;
INSERT INTO `bicycle_to_services` VALUES (1,'RosyBrown Bike','Cupiditate suscipit maxime eum voluptatum in dolor praesentium ab. Voluptatibus consectetur et repellat saepe qui natus iusto aut. Minima error soluta mollitia optio. Sed maiores perferendis nesciunt.','Mouse had changed his mind, and was immediately suppressed by the soldiers, who of course had to stop and untwist it. After a minute or two the.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(2,'HoneyDew Bike','Et explicabo maiores odio rerum dolores quos earum. Quidem quidem sequi odit quibusdam non non vel. Dolorem iste qui id aut quo sed eum.','Mouse was bristling all over, and she hurried out of the shepherd boy--and the sneeze of the sort!\' said Alice. \'Of course not,\' Alice replied.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(3,'MediumBlue Bike','Et consequuntur aliquid tempora est nulla consectetur. Nisi assumenda rerum modi ex inventore et ut.','This seemed to Alice again. \'No, I give you fair warning,\' shouted the Queen, and Alice, were in custody and under sentence of execution.\' \'What.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(4,'Tomato Bike','Fugiat qui ut quis sit. Voluptatibus quia ut magnam et fugiat doloremque sint. Placeat id magni est rerum. Temporibus libero et beatae. Aut sapiente quos aliquam deleniti maxime et.','MARMALADE\', but to her full size by this time). \'Don\'t grunt,\' said Alice; \'I must be getting home; the night-air doesn\'t suit my throat!\' and a.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(5,'BurlyWood Bike','Qui consequuntur non nobis voluptas velit. Dolores enim maxime quo id. Qui aliquid ea quia consequatur ea.','Hatter, \'I cut some more tea,\' the Hatter went on, yawning and rubbing its eyes, for it flashed across her mind that she did not dare to laugh; and.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(6,'GhostWhite Bike','Dolor deleniti eaque voluptatibus non culpa. Reiciendis error dolores impedit molestiae ut. Error molestias illo itaque ullam in et eos est. Voluptatem quas illo id aliquam enim inventore hic.','So she set the little door, so she went on saying to her that she had this fit) An obstacle that came between Him, and ourselves, and it. Don\'t let.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(7,'NavajoWhite Bike','Sunt qui accusantium qui ad omnis magnam amet non. Laudantium omnis dicta molestias quam unde. Inventore nihil quos quia at vel. Ut ut tempora fuga deleniti occaecati consectetur.','Duchess by this time, and was going a journey, I should think you\'ll feel it a minute or two, looking for eggs, I know all sorts of things, and she.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(8,'OrangeRed Bike','Saepe harum voluptas consequatur unde incidunt et rem. Dolore voluptatem blanditiis itaque molestiae cum blanditiis ex. Architecto placeat sit pariatur et nihil voluptatibus. Ut atque rerum officia labore. Quo et eum est et quod qui.','Alice whispered to the part about her and to stand on their slates, \'SHE doesn\'t believe there\'s an atom of meaning in it,\' but none of my own. I\'m.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(9,'LightYellow Bike','Non in dolor nesciunt odit adipisci voluptatem id suscipit. Quas quibusdam hic magni occaecati. Neque aut in delectus tempora. Omnis ipsa quia nobis quasi. Sed assumenda architecto ipsam necessitatibus similique quae ut.','Alice, as she left her, leaning her head made her draw back in a very little use without my shoulders. Oh, how I wish I hadn\'t quite finished my tea.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(10,'Turquoise Bike','Pariatur eaque hic et excepturi id odio. Id ut velit veniam autem cum nulla sed. Quae tempore id recusandae et eos molestiae facere impedit. Sequi nihil accusantium ut sit qui eveniet adipisci reprehenderit.','This is the reason is--\' here the conversation a little. \'\'Tis so,\' said the Duchess: \'what a clear way you have to beat time when she next peeped.','2020-08-24 12:52:48','2020-08-24 12:52:48');
/*!40000 ALTER TABLE `bicycle_to_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'Mr. Jesse Cassin DDS','+7952323484858','rzieme@hotmail.com',NULL,NULL),(2,'Liliane Kuhic','+5788346761766','tobin54@powlowski.com',NULL,NULL),(3,'Ms. Alvina Brekke','+4109796368591','smitchell@gmail.com',NULL,NULL),(4,'Nico Carroll','+3284142101109','colin10@hotmail.com',NULL,NULL),(5,'Don Torphy','+7343737320712','princess52@gmail.com',NULL,NULL),(6,'Dr. Darien Lebsack MD','+1685753149862','keebler.delbert@osinski.org',NULL,NULL),(7,'Miss Lydia Yost','+8884502848386','lottie25@adams.net',NULL,NULL),(8,'Jonatan Howell','+4136962290966','juanita05@yahoo.com',NULL,NULL),(9,'Noah West DVM','+1216028503176','zwiegand@waelchi.info',NULL,NULL),(10,'Vivien Von','+4642672884459','aabshire@bashirian.com',NULL,NULL);
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_05_29_090505_create_permission_tables',1),(5,'2020_06_19_110900_create_notifications_table',1),(6,'2020_07_11_180711_create_bicycle_to_sells_table',1),(7,'2020_07_11_180723_create_bicycle_to_rents_table',1),(8,'2020_07_11_180732_create_bicycle_to_services_table',1),(9,'2020_07_12_111105_create_rents_table',1),(10,'2020_07_12_155430_create_services_table',1),(11,'2020_07_31_073350_create_contacts_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (5,'App\\User',1),(4,'App\\User',2),(4,'App\\User',3),(3,'App\\User',4),(2,'App\\User',5);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
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
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'view bicycles','web','2020-08-24 12:52:47','2020-08-24 12:52:47'),(2,'create bicycles','web','2020-08-24 12:52:47','2020-08-24 12:52:47'),(3,'edit bicycles','web','2020-08-24 12:52:47','2020-08-24 12:52:47'),(4,'delete bicycles','web','2020-08-24 12:52:47','2020-08-24 12:52:47');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rents`
--

DROP TABLE IF EXISTS `rents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `bicycle_id` bigint(20) unsigned NOT NULL,
  `rentStarted_at` timestamp NOT NULL DEFAULT '2020-08-24 12:52:45',
  `rentEnds_at` timestamp NOT NULL DEFAULT '2020-08-25 12:52:45',
  `bicycleReturned_at` timestamp NULL DEFAULT NULL,
  `is_closed` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rents_user_id_foreign` (`user_id`),
  KEY `rents_bicycle_id_foreign` (`bicycle_id`),
  CONSTRAINT `rents_bicycle_id_foreign` FOREIGN KEY (`bicycle_id`) REFERENCES `bicycle_to_rents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rents`
--

LOCK TABLES `rents` WRITE;
/*!40000 ALTER TABLE `rents` DISABLE KEYS */;
INSERT INTO `rents` VALUES (1,6,5,'2020-08-11 12:52:48','2020-08-16 19:03:32',NULL,0,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(2,6,5,'2020-08-14 12:52:48','2020-08-21 20:44:34',NULL,0,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(3,7,4,'2020-08-11 12:52:48','2020-08-17 13:48:19','2020-08-20 12:52:48',0,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(4,7,4,'2020-08-13 12:52:48','2020-08-25 02:37:21','2020-08-18 12:52:48',0,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(5,8,1,'2020-08-11 12:52:48','2020-08-23 02:02:27',NULL,0,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(6,8,5,'2020-08-12 12:52:48','2020-08-26 13:57:51',NULL,0,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(7,9,4,'2020-08-11 12:52:48','2020-08-31 01:19:51',NULL,0,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(8,9,1,'2020-08-12 12:52:48','2020-08-17 22:38:11',NULL,0,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(9,10,5,'2020-08-11 12:52:48','2020-08-21 06:51:32','2020-08-15 12:52:48',0,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(10,10,1,'2020-08-10 12:52:48','2020-08-17 05:31:54',NULL,0,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(11,8,4,'2020-08-11 12:52:48','2020-08-26 07:55:33','2020-08-15 12:52:48',0,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(12,8,1,'2020-08-12 12:52:48','2020-08-29 12:38:21',NULL,0,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(13,8,3,'2020-08-14 12:52:48','2020-08-22 15:26:41',NULL,0,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(14,7,1,'2020-08-12 12:52:48','2020-08-28 21:08:57','2020-08-16 12:52:48',0,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(15,6,4,'2020-08-11 12:52:48','2020-08-23 14:20:54',NULL,0,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(16,6,3,'2020-08-12 12:52:48','2020-08-18 03:55:05','2020-08-20 12:52:48',0,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(17,6,3,'2020-08-11 12:52:48','2020-08-24 10:19:01','2020-08-15 12:52:48',0,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(18,9,5,'2020-08-11 12:52:48','2020-08-18 03:36:19',NULL,0,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(19,9,4,'2020-08-10 12:52:48','2020-08-20 16:43:43','2020-08-20 12:52:48',0,'2020-08-24 12:52:48','2020-08-24 12:52:48'),(20,6,2,'2020-08-14 12:52:48','2020-08-29 13:57:35',NULL,0,'2020-08-24 12:52:48','2020-08-24 12:52:48');
/*!40000 ALTER TABLE `rents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(1,2),(1,3),(2,3),(3,3),(4,3),(1,4),(2,4),(3,4),(4,4),(1,5),(2,5),(3,5),(4,5);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'visitor','web','2020-08-24 12:52:47','2020-08-24 12:52:47'),(2,'authuser','web','2020-08-24 12:52:47','2020-08-24 12:52:47'),(3,'salesman','web','2020-08-24 12:52:47','2020-08-24 12:52:47'),(4,'serviceman','web','2020-08-24 12:52:47','2020-08-24 12:52:47'),(5,'super-admin','web','2020-08-24 12:52:47','2020-08-24 12:52:47');
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
  `user_id` bigint(20) unsigned NOT NULL,
  `bicycle_id` bigint(20) unsigned NOT NULL,
  `serviceman_id` bigint(20) unsigned NOT NULL,
  `failure_description` text COLLATE utf8mb4_unicode_ci,
  `accepted` timestamp NULL DEFAULT NULL,
  `repairing` timestamp NULL DEFAULT NULL,
  `ready` timestamp NULL DEFAULT NULL,
  `taken` timestamp NULL DEFAULT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `services_user_id_foreign` (`user_id`),
  KEY `services_bicycle_id_foreign` (`bicycle_id`),
  CONSTRAINT `services_bicycle_id_foreign` FOREIGN KEY (`bicycle_id`) REFERENCES `bicycle_to_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,7,6,1,'Magni occaecati est quibusdam in.','2020-07-31 12:52:48','2020-08-05 12:52:48','2020-08-13 12:52:48','2020-08-16 12:52:48','Modi placeat occaecati veritatis architecto officia cumque.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(2,5,9,2,'Officiis consectetur reprehenderit vitae magni et optio nemo.','2020-08-03 12:52:48','2020-08-06 12:52:48','2020-08-11 12:52:48','2020-08-17 12:52:48','Incidunt est illo soluta adipisci omnis.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(3,7,8,1,'Qui temporibus ipsam rerum dolor.','2020-07-30 12:52:48','2020-08-06 12:52:48','2020-08-10 12:52:48','2020-08-19 12:52:48','Suscipit cupiditate praesentium natus nemo velit.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(4,5,8,2,'Cupiditate quia inventore odit mollitia reiciendis ea.','2020-07-28 12:52:48','2020-08-09 12:52:48','2020-08-12 12:52:48',NULL,'Nostrum ipsam quaerat exercitationem eligendi repudiandae cupiditate.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(5,7,8,1,'Quis dolor blanditiis veniam accusamus necessitatibus delectus et.','2020-07-30 12:52:48','2020-08-07 12:52:48','2020-08-11 12:52:48','2020-08-16 12:52:48','Et aut et enim deleniti debitis quis aut.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(6,6,9,2,'Iure assumenda atque fugit quos totam.','2020-07-26 12:52:48','2020-08-08 12:52:48','2020-08-14 12:52:48',NULL,'Sint dolore consequatur ipsum assumenda inventore quod.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(7,5,4,2,'Placeat fuga aut qui ut eius.','2020-08-02 12:52:48','2020-08-06 12:52:48','2020-08-14 12:52:48',NULL,'Illo voluptas sed et voluptatum.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(8,7,6,2,'Et in explicabo sunt hic eos eum accusantium.','2020-08-03 12:52:48','2020-08-06 12:52:48','2020-08-14 12:52:48','2020-08-17 12:52:48','Assumenda aut eos odio repellendus ratione beatae accusantium.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(9,8,10,2,'Placeat deleniti reiciendis sapiente inventore.','2020-07-25 12:52:48','2020-08-08 12:52:48','2020-08-12 12:52:48','2020-08-21 12:52:48','Quia quidem sit quidem aperiam.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(10,9,4,2,'Voluptatem culpa quibusdam dolore sapiente autem voluptatum aliquam.','2020-08-02 12:52:48','2020-08-06 12:52:48','2020-08-12 12:52:48',NULL,'Dolor nostrum placeat eum quam.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(11,9,10,1,'Eum odit ab quam at corrupti libero quibusdam eum.','2020-07-30 12:52:48','2020-08-09 12:52:48','2020-08-11 12:52:48','2020-08-23 12:52:48','Corrupti at nam voluptas.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(12,9,6,2,'Numquam voluptatem quia expedita saepe natus.','2020-07-28 12:52:48','2020-08-08 12:52:48','2020-08-14 12:52:48','2020-08-21 12:52:48','Repudiandae reprehenderit rem deserunt dolorem nisi architecto.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(13,9,4,2,'In ab ducimus dolores magni rerum expedita.','2020-07-28 12:52:48','2020-08-08 12:52:48','2020-08-12 12:52:48',NULL,'Cum quidem doloremque ipsam ipsum omnis provident animi.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(14,8,9,2,'Deleniti quod neque fugiat voluptatibus.','2020-08-02 12:52:48','2020-08-06 12:52:48','2020-08-12 12:52:48',NULL,'Voluptas sit harum accusantium aut sint quia.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(15,5,8,2,'Eum laudantium et officia sint.','2020-07-28 12:52:48','2020-08-06 12:52:48','2020-08-13 12:52:48','2020-08-22 12:52:48','Quo beatae vitae eos dolorum aut omnis ea.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(16,9,4,1,'Et at rerum nostrum sed officia officiis et.','2020-08-03 12:52:48','2020-08-09 12:52:48','2020-08-14 12:52:48','2020-08-23 12:52:48','Sequi modi ut eos voluptatem beatae autem eum.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(17,7,6,2,'Dicta repellat dolorem earum sunt doloribus quis ut quibusdam.','2020-07-26 12:52:48','2020-08-09 12:52:48','2020-08-14 12:52:48',NULL,'Aut et pariatur explicabo nam velit dolorem debitis.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(18,9,8,2,'Ut qui eaque deserunt.','2020-08-02 12:52:48','2020-08-05 12:52:48','2020-08-14 12:52:48','2020-08-22 12:52:48','Asperiores et culpa delectus amet ad sed officia.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(19,8,5,2,'Dicta et consequatur dignissimos sed dolor.','2020-08-01 12:52:48','2020-08-08 12:52:48','2020-08-10 12:52:48','2020-08-21 12:52:48','Minima qui accusantium animi dolorem exercitationem eaque.','2020-08-24 12:52:48','2020-08-24 12:52:48'),(20,8,6,1,'Facilis cumque quis dicta.','2020-08-01 12:52:48','2020-08-05 12:52:48','2020-08-14 12:52:48',NULL,'Et quis a optio asperiores ut.','2020-08-24 12:52:48','2020-08-24 12:52:48');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` char(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'secret',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_count` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '2020-08-24 12:52:44',
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin Adam','admin@admin.com',NULL,NULL,'0623232565321','$2y$10$fA9ra28ImWOiKXzH/GvQkelEdG9SJv6LlCaqM1f0DGrhTrkpQQu8G',NULL,NULL,0,'2020-08-24 12:52:47','2020-08-24 12:52:47',NULL),(2,'Serviceman Sergey(serviceman_1)','servicesergey@service.com',NULL,NULL,'0623232565321','$2y$10$PvmV9TOmauEyBCWtOEnR2OJwneLfP4.f1Ef6Ec3WLXSM103ccWmRe',NULL,NULL,0,'2020-08-24 12:52:47','2020-08-24 12:52:47',NULL),(3,'Serviceman Sebastian(serviceman_2)','servicesebastian@service.com',NULL,NULL,'0623232565320','$2y$10$0EScZ042gMNt9avjlHJtMekHgT6vGJa7BzWcgOZFN/U1FeahhmAXe',NULL,NULL,0,'2020-08-24 12:52:47','2020-08-24 12:52:47',NULL),(4,'Salesman Sam','sale@sale.com',NULL,NULL,'0623232565321','$2y$10$.DbGbXGlZH/hg468ZLiD/uyD2KWNYgUrh/mCveCe/tFi4ImuspMcW',NULL,NULL,0,'2020-08-24 12:52:48','2020-08-24 12:52:48',NULL),(5,'Dr. Authenticated User','authuser@authuser.com',NULL,NULL,'0623232565321','$2y$10$N9IN1gGOdNT3LdBcH5igQ.y0OKkcqhXEF2WBxYj/s6MbcAcl31Nya',NULL,NULL,0,'2020-08-24 12:52:48','2020-08-24 12:52:48',NULL),(6,'Triston Maggio','bradly.romaguera@example.org',NULL,NULL,'+2117972171935','$2y$10$M7Rx7Gu/tgiEwpqXw6HLq.WPAto2xsEiV1uysHYp2yTtZu.1xm2ku',NULL,NULL,0,'2020-08-24 12:52:48','2020-08-24 12:52:48',NULL),(7,'Tyrel Ledner PhD','cassidy71@example.net',NULL,NULL,'+5046630223141','$2y$10$l7FpIaR6YAGi5jzwfMd.N.zep6mtCunENLgZ5GKQhgbtW6XEeCXgm',NULL,NULL,0,'2020-08-24 12:52:48','2020-08-24 12:52:48',NULL),(8,'Mrs. Joannie Bernier','hettinger.norval@example.net',NULL,NULL,'+3253064781641','$2y$10$AfQDtdbRNI0Ql6EsKBqgo./CgCX1x5Y5uCaDOPpswGmeLsg.guf4O',NULL,NULL,0,'2020-08-24 12:52:48','2020-08-24 12:52:48',NULL),(9,'Rowan Lebsack','treva31@example.net',NULL,NULL,'+2832985804619','$2y$10$MVuu/547ZCV7eGH0qxqgPOZsF.MswThwEs0aOVcvrtKeaDhVyg.au',NULL,NULL,0,'2020-08-24 12:52:48','2020-08-24 12:52:48',NULL),(10,'Maxwell Russel','tlesch@example.com',NULL,NULL,'+5219681835933','$2y$10$uBz1otbBz52osKVDI.j3LOQufcIFYhyUGd6JBj/fdnt4xwD5qSBl2',NULL,NULL,0,'2020-08-24 12:52:48','2020-08-24 12:52:48',NULL);
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

-- Dump completed on 2020-10-13 19:03:12

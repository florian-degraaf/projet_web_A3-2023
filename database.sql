-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: mydb
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `agir`
--

DROP TABLE IF EXISTS `agir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agir` (
  `entreprise_id` int NOT NULL,
  `secteur_id` int NOT NULL,
  UNIQUE KEY `entreprise_secteur` (`entreprise_id`,`secteur_id`),
  KEY `fk_agir_secteur1_idx` (`secteur_id`),
  CONSTRAINT `fk_agir_entreprise1` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprise` (`id`),
  CONSTRAINT `fk_agir_secteur1` FOREIGN KEY (`secteur_id`) REFERENCES `secteur` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agir`
--

LOCK TABLES `agir` WRITE;
/*!40000 ALTER TABLE `agir` DISABLE KEYS */;
INSERT INTO `agir` VALUES (35,9),(35,10);
/*!40000 ALTER TABLE `agir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `competences`
--

DROP TABLE IF EXISTS `competences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `competences` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_competence` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `nom_competence_UNIQUE` (`nom_competence`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competences`
--

LOCK TABLES `competences` WRITE;
/*!40000 ALTER TABLE `competences` DISABLE KEYS */;
/*!40000 ALTER TABLE `competences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `composer`
--

DROP TABLE IF EXISTS `composer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `composer` (
  `wishlist_id` int NOT NULL,
  `offre_id` int NOT NULL,
  PRIMARY KEY (`wishlist_id`),
  KEY `fk_composer_offre1_idx` (`offre_id`),
  CONSTRAINT `fk_composer_offre1` FOREIGN KEY (`offre_id`) REFERENCES `offre` (`id`),
  CONSTRAINT `fk_composer_wishist1` FOREIGN KEY (`wishlist_id`) REFERENCES `wishlist` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `composer`
--

LOCK TABLES `composer` WRITE;
/*!40000 ALTER TABLE `composer` DISABLE KEYS */;
/*!40000 ALTER TABLE `composer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donner`
--

DROP TABLE IF EXISTS `donner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `donner` (
  `info_supplementaire_id` int NOT NULL,
  `personne_id` int NOT NULL,
  KEY `fk_donner_personne1_idx` (`personne_id`),
  KEY `fk_donner_info_supplementaire` (`info_supplementaire_id`),
  CONSTRAINT `fk_donner_info_supplementaire` FOREIGN KEY (`info_supplementaire_id`) REFERENCES `info_supplementaire` (`id`),
  CONSTRAINT `fk_donner_personne1` FOREIGN KEY (`personne_id`) REFERENCES `personne` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donner`
--

LOCK TABLES `donner` WRITE;
/*!40000 ALTER TABLE `donner` DISABLE KEYS */;
/*!40000 ALTER TABLE `donner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entreprise` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `evaluation_stagaire` float DEFAULT NULL,
  `confiance_pilote` float DEFAULT NULL,
  `description_entreprise` varchar(200) DEFAULT NULL,
  `notes_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_entreprise_table11_idx` (`notes_id`),
  CONSTRAINT `fk_entreprise_table11` FOREIGN KEY (`notes_id`) REFERENCES `notes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entreprise`
--

LOCK TABLES `entreprise` WRITE;
/*!40000 ALTER TABLE `entreprise` DISABLE KEYS */;
INSERT INTO `entreprise` VALUES (35,'google',4,4,'google description',NULL),(36,'de paterick',4,4,'google description',NULL);
/*!40000 ALTER TABLE `entreprise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `info_supplementaire`
--

DROP TABLE IF EXISTS `info_supplementaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `info_supplementaire` (
  `id` int NOT NULL AUTO_INCREMENT,
  `centre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_supplementaire`
--

LOCK TABLES `info_supplementaire` WRITE;
/*!40000 ALTER TABLE `info_supplementaire` DISABLE KEYS */;
INSERT INTO `info_supplementaire` VALUES (1,'aix en provence'),(2,'paris');
/*!40000 ALTER TABLE `info_supplementaire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `localite`
--

DROP TABLE IF EXISTS `localite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `localite` (
  `id` int NOT NULL AUTO_INCREMENT,
  `adresse_localite` varchar(100) DEFAULT NULL,
  `entreprise_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `adresse_localite_UNIQUE` (`adresse_localite`),
  KEY `fk_localite_entreprise1_idx` (`entreprise_id`),
  CONSTRAINT `fk_localite_entreprise1` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprise` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `localite`
--

LOCK TABLES `localite` WRITE;
/*!40000 ALTER TABLE `localite` DISABLE KEYS */;
INSERT INTO `localite` VALUES (185,'aix en provence',35),(186,'lyon',35);
/*!40000 ALTER TABLE `localite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notes` (
  `id` int NOT NULL,
  `note` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offre`
--

DROP TABLE IF EXISTS `offre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offre` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) DEFAULT NULL,
  `date_offre` date DEFAULT NULL,
  `base_de_remuneration` float DEFAULT NULL,
  `duree_stage` int DEFAULT NULL,
  `nombre_places` int DEFAULT NULL,
  `description_offre` varchar(200) DEFAULT NULL,
  `localite_id` int NOT NULL,
  `entreprise_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_offre_localite1_idx` (`localite_id`),
  KEY `fk_offre_entreprise1_idx` (`entreprise_id`),
  CONSTRAINT `fk_offre_entreprise1` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprise` (`id`),
  CONSTRAINT `fk_offre_localite1` FOREIGN KEY (`localite_id`) REFERENCES `localite` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offre`
--

LOCK TABLES `offre` WRITE;
/*!40000 ALTER TABLE `offre` DISABLE KEYS */;
/*!40000 ALTER TABLE `offre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personne`
--

DROP TABLE IF EXISTS `personne`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personne` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `login` varchar(20) DEFAULT NULL,
  `mot_de_passe` varchar(20) DEFAULT NULL,
  `wishlist_id` int DEFAULT NULL,
  `roles_id` int NOT NULL,
  PRIMARY KEY (`id`,`roles_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  KEY `fk_personne_wishist1_idx` (`wishlist_id`),
  KEY `fk_personne_roles1_idx` (`roles_id`),
  CONSTRAINT `fk_personne_roles1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `fk_personne_wishist1` FOREIGN KEY (`wishlist_id`) REFERENCES `wishlist` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personne`
--

LOCK TABLES `personne` WRITE;
/*!40000 ALTER TABLE `personne` DISABLE KEYS */;
INSERT INTO `personne` VALUES (18,'HELLO','CESI','2022-10-10','3','3',NULL,12),(22,'BarrE','Bogus','2022-10-10','1','1',NULL,12);
/*!40000 ALTER TABLE `personne` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postulat`
--

DROP TABLE IF EXISTS `postulat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `postulat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cv` varchar(100) DEFAULT NULL,
  `motivation` varchar(200) DEFAULT NULL,
  `validation` tinyint DEFAULT NULL,
  `personne_id` int NOT NULL,
  `offre_id` int NOT NULL,
  PRIMARY KEY (`id`,`personne_id`,`offre_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_postulat_personne1_idx` (`personne_id`),
  KEY `fk_postulat_offre1_idx` (`offre_id`),
  CONSTRAINT `fk_postulat_offre1` FOREIGN KEY (`offre_id`) REFERENCES `offre` (`id`),
  CONSTRAINT `fk_postulat_personne1` FOREIGN KEY (`personne_id`) REFERENCES `personne` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postulat`
--

LOCK TABLES `postulat` WRITE;
/*!40000 ALTER TABLE `postulat` DISABLE KEYS */;
/*!40000 ALTER TABLE `postulat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requerir`
--

DROP TABLE IF EXISTS `requerir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `requerir` (
  `offre_id` int NOT NULL AUTO_INCREMENT,
  `competences_id` int NOT NULL,
  KEY `fk_requerir_competences1_idx` (`competences_id`),
  KEY `fk_requerir_offre1` (`offre_id`),
  CONSTRAINT `fk_requerir_competences1` FOREIGN KEY (`competences_id`) REFERENCES `competences` (`id`),
  CONSTRAINT `fk_requerir_offre1` FOREIGN KEY (`offre_id`) REFERENCES `offre` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requerir`
--

LOCK TABLES `requerir` WRITE;
/*!40000 ALTER TABLE `requerir` DISABLE KEYS */;
/*!40000 ALTER TABLE `requerir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `description_UNIQUE` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (10,'admin'),(12,'etudiant'),(11,'pilote');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secteur`
--

DROP TABLE IF EXISTS `secteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `secteur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_secteur` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `nom_secteur_UNIQUE` (`nom_secteur`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secteur`
--

LOCK TABLES `secteur` WRITE;
/*!40000 ALTER TABLE `secteur` DISABLE KEYS */;
INSERT INTO `secteur` VALUES (11,'agriculture'),(10,'btp'),(9,'informatique'),(12,'transport');
/*!40000 ALTER TABLE `secteur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date_ajout` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlist`
--

LOCK TABLES `wishlist` WRITE;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-28 16:14:27

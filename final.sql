-- MariaDB dump 10.17  Distrib 10.4.10-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: gestion
-- ------------------------------------------------------
-- Server version	10.4.10-MariaDB

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
-- Current Database: `gestion`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `gestion` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `gestion`;

--
-- Table structure for table `an`
--

DROP TABLE IF EXISTS `an`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `an` (
  `idAN` int(11) NOT NULL AUTO_INCREMENT,
  `idFichePaie` int(11) DEFAULT NULL,
  `idCategorieAN` int(11) DEFAULT NULL,
  `montant` float DEFAULT NULL,
  PRIMARY KEY (`idAN`),
  KEY `idCategorieAN` (`idCategorieAN`),
  KEY `idFichePaie` (`idFichePaie`),
  CONSTRAINT `an_ibfk_1` FOREIGN KEY (`idCategorieAN`) REFERENCES `categoriean` (`idCategorieAN`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `an_ibfk_2` FOREIGN KEY (`idFichePaie`) REFERENCES `fichepaie` (`idFichePaie`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `an`
--

LOCK TABLES `an` WRITE;
/*!40000 ALTER TABLE `an` DISABLE KEYS */;
/*!40000 ALTER TABLE `an` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attente`
--

DROP TABLE IF EXISTS `attente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attente` (
  `idAttente` int(11) NOT NULL AUTO_INCREMENT,
  `idPersonne` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAttente`),
  KEY `idPersonne` (`idPersonne`),
  CONSTRAINT `attente_ibfk_1` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`idPersonne`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attente`
--

LOCK TABLES `attente` WRITE;
/*!40000 ALTER TABLE `attente` DISABLE KEYS */;
INSERT INTO `attente` VALUES (10,1),(18,28);
/*!40000 ALTER TABLE `attente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avance`
--

DROP TABLE IF EXISTS `avance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avance` (
  `idAvance` int(11) NOT NULL AUTO_INCREMENT,
  `idFichePaie` int(11) DEFAULT NULL,
  `libele` varchar(30) DEFAULT NULL,
  `montant` float DEFAULT NULL,
  PRIMARY KEY (`idAvance`),
  KEY `idFichePaie` (`idFichePaie`),
  CONSTRAINT `avance_ibfk_1` FOREIGN KEY (`idFichePaie`) REFERENCES `fichepaie` (`idFichePaie`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avance`
--

LOCK TABLES `avance` WRITE;
/*!40000 ALTER TABLE `avance` DISABLE KEYS */;
/*!40000 ALTER TABLE `avance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoriean`
--

DROP TABLE IF EXISTS `categoriean`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoriean` (
  `idCategorieAN` int(11) NOT NULL AUTO_INCREMENT,
  `libele` varchar(30) DEFAULT NULL,
  `taux` float DEFAULT NULL,
  PRIMARY KEY (`idCategorieAN`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoriean`
--

LOCK TABLES `categoriean` WRITE;
/*!40000 ALTER TABLE `categoriean` DISABLE KEYS */;
INSERT INTO `categoriean` VALUES (1,'voiture',20),(2,'logement',50),(3,'nourriture',70),(4,'outils de communication',60);
/*!40000 ALTER TABLE `categoriean` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorieevenement`
--

DROP TABLE IF EXISTS `categorieevenement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorieevenement` (
  `idCategorieEvenement` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idCategorieEvenement`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorieevenement`
--

LOCK TABLES `categorieevenement` WRITE;
/*!40000 ALTER TABLE `categorieevenement` DISABLE KEYS */;
INSERT INTO `categorieevenement` VALUES (1,'test'),(2,'entretient'),(3,'conference'),(4,'team building'),(5,'ferie'),(6,'lancement de produit'),(7,'exposition');
/*!40000 ALTER TABLE `categorieevenement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoriefournisseur`
--

DROP TABLE IF EXISTS `categoriefournisseur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoriefournisseur` (
  `idCateg` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idCateg`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoriefournisseur`
--

LOCK TABLES `categoriefournisseur` WRITE;
/*!40000 ALTER TABLE `categoriefournisseur` DISABLE KEYS */;
INSERT INTO `categoriefournisseur` VALUES (1,'quincaillerie'),(2,'pharmacie'),(3,'superMarche'),(4,'papeterie');
/*!40000 ALTER TABLE `categoriefournisseur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorieloisir`
--

DROP TABLE IF EXISTS `categorieloisir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorieloisir` (
  `idCategorieLoisire` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idCategorieLoisire`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorieloisir`
--

LOCK TABLES `categorieloisir` WRITE;
/*!40000 ALTER TABLE `categorieloisir` DISABLE KEYS */;
INSERT INTO `categorieloisir` VALUES (1,'sport'),(2,'culture'),(3,'musique'),(4,'electronique'),(5,'art');
/*!40000 ALTER TABLE `categorieloisir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorieprofessionnel`
--

DROP TABLE IF EXISTS `categorieprofessionnel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorieprofessionnel` (
  `idcat` int(11) NOT NULL AUTO_INCREMENT,
  `Categorie` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idcat`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorieprofessionnel`
--

LOCK TABLES `categorieprofessionnel` WRITE;
/*!40000 ALTER TABLE `categorieprofessionnel` DISABLE KEYS */;
INSERT INTO `categorieprofessionnel` VALUES (1,'M1'),(2,'M2'),(3,'OS1'),(4,'OS2'),(5,'OS3'),(6,'OP1A'),(7,'OP1B'),(8,'OP2A'),(9,'OP2B'),(10,'OP3');
/*!40000 ALTER TABLE `categorieprofessionnel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `competence`
--

DROP TABLE IF EXISTS `competence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `competence` (
  `idCompetence` int(11) NOT NULL AUTO_INCREMENT,
  `idCV` int(11) DEFAULT NULL,
  `titre` varchar(20) DEFAULT NULL,
  `niveau` float DEFAULT NULL,
  PRIMARY KEY (`idCompetence`),
  KEY `idCV` (`idCV`),
  CONSTRAINT `competence_ibfk_1` FOREIGN KEY (`idCV`) REFERENCES `cv` (`idCV`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competence`
--

LOCK TABLES `competence` WRITE;
/*!40000 ALTER TABLE `competence` DISABLE KEYS */;
INSERT INTO `competence` VALUES (1,5,'Dessin',10),(2,5,'Dessin',10),(3,5,'Dessin',10),(4,5,'Dessin',10),(5,5,'Dessin',10),(6,5,'Dessin',10),(7,12,'aaa',4);
/*!40000 ALTER TABLE `competence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `congeparmoisparemploye`
--

DROP TABLE IF EXISTS `congeparmoisparemploye`;
/*!50001 DROP VIEW IF EXISTS `congeparmoisparemploye`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `congeparmoisparemploye` (
  `id` tinyint NOT NULL,
  `idEmp` tinyint NOT NULL,
  `motif` tinyint NOT NULL,
  `dateDebut` tinyint NOT NULL,
  `dateFin` tinyint NOT NULL,
  `etat` tinyint NOT NULL,
  `nomDepartement` tinyint NOT NULL,
  `idDepartement` tinyint NOT NULL,
  `nomPoste` tinyint NOT NULL,
  `mois` tinyint NOT NULL,
  `annee` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `congepris`
--

DROP TABLE IF EXISTS `congepris`;
/*!50001 DROP VIEW IF EXISTS `congepris`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `congepris` (
  `id` tinyint NOT NULL,
  `idEmp` tinyint NOT NULL,
  `nbJours` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `idContact` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `autre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idContact`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'gravida.non@nequenullam.org',NULL),(2,'malesuada.fames@morbi.edu',NULL),(3,'mi@utpharetra.co.uk',NULL),(4,'ligula.aliquam@magnisdis.co.uk',NULL),(5,'elit.pellentesque@eueleifend.org',NULL),(6,'morbi.neque@nonhendrerit.edu',NULL),(7,'ut.molestie@rutrumurna.org',NULL),(8,'non.vestibulum@euismod.com',NULL),(9,'rhoncus@sodalesmauris.net',NULL),(10,'enim.non@lectussitamet.ca',NULL),(11,'eros.non.enim@elitsedconsequat.org',NULL),(12,'montes.nascetur@ornarelibero.ca',NULL),(13,'consequat.nec.mollis@vulputateveliteu.org',NULL),(14,'libero.proin@vitaedolordonec.org',NULL),(15,'eros@sitametrisus.edu',NULL),(16,'non.enim@mi.net',NULL),(17,'nam.tempor@duismi.net',NULL),(18,'donec.consectetuer.mauris@vestibulummauris.net',NULL),(19,'cursus.integer.mollis@acarcu.ca',NULL),(20,'suspendisse.non.leo@amet.edu',NULL),(21,'coco@gmail.com','0325644499'),(22,'coco@gmail.com','0325644499'),(23,'coco@gmail.com','0325644499'),(24,'coco@gmail.com','0325644499'),(25,'coco@gmail.com','0325644499'),(26,'coco@gmail.com','0325644499'),(27,'coco@gmail.com','0325644499'),(28,'aaa@hh.com','0325566482');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cv`
--

DROP TABLE IF EXISTS `cv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cv` (
  `idCV` int(11) NOT NULL AUTO_INCREMENT,
  `idPersonne` int(11) DEFAULT NULL,
  `descriProfile` text DEFAULT NULL,
  PRIMARY KEY (`idCV`),
  KEY `fk_cv_idPersonne` (`idPersonne`),
  CONSTRAINT `fk_cv_idPersonne` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`idPersonne`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cv`
--

LOCK TABLES `cv` WRITE;
/*!40000 ALTER TABLE `cv` DISABLE KEYS */;
INSERT INTO `cv` VALUES (1,1,'Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis'),(2,2,'ac, fermentum vel, mauris. Integer sem elit, pharetra ut, pharetra'),(3,3,'quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed'),(4,4,'a, enim. Suspendisse aliquet, sem ut cursus luctus, ipsum leo'),(5,21,'Description'),(6,21,'Description'),(7,21,'Description'),(8,21,'Description'),(9,21,'Description'),(10,21,'Description'),(11,21,'Description'),(12,28,'aaaa');
/*!40000 ALTER TABLE `cv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cv_langue`
--

DROP TABLE IF EXISTS `cv_langue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cv_langue` (
  `idCV` int(11) DEFAULT NULL,
  `idLangue` int(11) DEFAULT NULL,
  `niveau` float DEFAULT NULL,
  KEY `idCV` (`idCV`),
  KEY `idLangue` (`idLangue`),
  CONSTRAINT `cv_langue_ibfk_1` FOREIGN KEY (`idCV`) REFERENCES `cv` (`idCV`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cv_langue_ibfk_2` FOREIGN KEY (`idLangue`) REFERENCES `langue` (`idLangue`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cv_langue`
--

LOCK TABLES `cv_langue` WRITE;
/*!40000 ALTER TABLE `cv_langue` DISABLE KEYS */;
INSERT INTO `cv_langue` VALUES (1,1,10),(1,2,10),(1,3,9.5),(1,7,8),(2,1,10),(2,2,9),(2,3,7.5),(2,4,8),(2,6,7),(3,1,10),(3,2,10),(3,3,10),(3,8,4),(4,1,10),(4,2,6),(4,8,5),(5,1,7),(5,1,7),(5,1,7),(5,1,7),(5,1,7),(5,1,7),(12,1,10);
/*!40000 ALTER TABLE `cv_langue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cv_loisir`
--

DROP TABLE IF EXISTS `cv_loisir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cv_loisir` (
  `idCV` int(11) DEFAULT NULL,
  `idLoisir` int(11) DEFAULT NULL,
  KEY `idCV` (`idCV`),
  KEY `idLoisir` (`idLoisir`),
  CONSTRAINT `cv_loisir_ibfk_1` FOREIGN KEY (`idCV`) REFERENCES `cv` (`idCV`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cv_loisir_ibfk_2` FOREIGN KEY (`idLoisir`) REFERENCES `loisir` (`idLoisir`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cv_loisir`
--

LOCK TABLES `cv_loisir` WRITE;
/*!40000 ALTER TABLE `cv_loisir` DISABLE KEYS */;
INSERT INTO `cv_loisir` VALUES (5,1),(5,1),(5,1),(5,1),(5,1),(5,1),(12,7);
/*!40000 ALTER TABLE `cv_loisir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cv_poste`
--

DROP TABLE IF EXISTS `cv_poste`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cv_poste` (
  `idCV` int(11) DEFAULT NULL,
  `idPoste` int(11) DEFAULT NULL,
  KEY `idCV` (`idCV`),
  KEY `idPoste` (`idPoste`),
  CONSTRAINT `cv_poste_ibfk_1` FOREIGN KEY (`idCV`) REFERENCES `cv` (`idCV`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cv_poste_ibfk_2` FOREIGN KEY (`idPoste`) REFERENCES `poste` (`idPoste`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cv_poste`
--

LOCK TABLES `cv_poste` WRITE;
/*!40000 ALTER TABLE `cv_poste` DISABLE KEYS */;
/*!40000 ALTER TABLE `cv_poste` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `demande`
--

DROP TABLE IF EXISTS `demande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `demande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(150) DEFAULT NULL,
  `quantite` float DEFAULT NULL,
  `unite` varchar(50) DEFAULT NULL,
  `idDepartement` int(11) DEFAULT NULL,
  `etat` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idDepartement` (`idDepartement`),
  CONSTRAINT `demande_ibfk_1` FOREIGN KEY (`idDepartement`) REFERENCES `departement` (`idDepartement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `demande`
--

LOCK TABLES `demande` WRITE;
/*!40000 ALTER TABLE `demande` DISABLE KEYS */;
/*!40000 ALTER TABLE `demande` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `demandeencours`
--

DROP TABLE IF EXISTS `demandeencours`;
/*!50001 DROP VIEW IF EXISTS `demandeencours`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `demandeencours` (
  `id` tinyint NOT NULL,
  `idEmp` tinyint NOT NULL,
  `description` tinyint NOT NULL,
  `dateDebut` tinyint NOT NULL,
  `dateFin` tinyint NOT NULL,
  `demande` tinyint NOT NULL,
  `cumule` tinyint NOT NULL,
  `pris` tinyint NOT NULL,
  `restant` tinyint NOT NULL,
  `remarque` tinyint NOT NULL,
  `nomDepartement` tinyint NOT NULL,
  `idDepartement` tinyint NOT NULL,
  `nomPoste` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `demandegrouper`
--

DROP TABLE IF EXISTS `demandegrouper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `demandegrouper` (
  `idDemandeGrouper` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(150) DEFAULT NULL,
  `quantite` float DEFAULT NULL,
  PRIMARY KEY (`idDemandeGrouper`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `demandegrouper`
--

LOCK TABLES `demandegrouper` WRITE;
/*!40000 ALTER TABLE `demandegrouper` DISABLE KEYS */;
/*!40000 ALTER TABLE `demandegrouper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departement`
--

DROP TABLE IF EXISTS `departement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departement` (
  `idDepartement` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `descri` text DEFAULT NULL,
  PRIMARY KEY (`idDepartement`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departement`
--

LOCK TABLES `departement` WRITE;
/*!40000 ALTER TABLE `departement` DISABLE KEYS */;
INSERT INTO `departement` VALUES (1,'administration generale','velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla'),(2,'ressource humaine','natoque penatibus et magnis'),(3,'production','Nunc mauris sapien, cursus in, hendrerit consectetuer,'),(4,'marketing et commercial','consectetuer ipsum nunc id enim. Curabitur'),(5,'financier','ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed');
/*!40000 ALTER TABLE `departement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detaildemandegrouper`
--

DROP TABLE IF EXISTS `detaildemandegrouper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detaildemandegrouper` (
  `idDemandeGrouper` int(11) DEFAULT NULL,
  `idDemande` int(11) DEFAULT NULL,
  KEY `idDemandeGrouper` (`idDemandeGrouper`),
  KEY `idDemande` (`idDemande`),
  CONSTRAINT `detaildemandegrouper_ibfk_1` FOREIGN KEY (`idDemandeGrouper`) REFERENCES `demandegrouper` (`idDemandeGrouper`),
  CONSTRAINT `detaildemandegrouper_ibfk_2` FOREIGN KEY (`idDemande`) REFERENCES `demande` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detaildemandegrouper`
--

LOCK TABLES `detaildemandegrouper` WRITE;
/*!40000 ALTER TABLE `detaildemandegrouper` DISABLE KEYS */;
/*!40000 ALTER TABLE `detaildemandegrouper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diplome`
--

DROP TABLE IF EXISTS `diplome`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diplome` (
  `idDiplome` int(11) NOT NULL AUTO_INCREMENT,
  `idCV` int(11) DEFAULT NULL,
  `idGrade` int(11) DEFAULT NULL,
  `titre` varchar(20) DEFAULT NULL,
  `etablissement` varchar(30) DEFAULT NULL,
  `obtention` date DEFAULT NULL,
  PRIMARY KEY (`idDiplome`),
  KEY `fk_diplome_idCV` (`idCV`),
  KEY `fk_diplome_idGrade` (`idGrade`),
  CONSTRAINT `fk_diplome_idCV` FOREIGN KEY (`idCV`) REFERENCES `cv` (`idCV`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_diplome_idGrade` FOREIGN KEY (`idGrade`) REFERENCES `grade` (`idGrade`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diplome`
--

LOCK TABLES `diplome` WRITE;
/*!40000 ALTER TABLE `diplome` DISABLE KEYS */;
INSERT INTO `diplome` VALUES (1,1,4,'BACC','ITU','0000-00-00'),(2,2,2,'MASTER','ESCA','0000-00-00'),(3,3,1,'MASTER','ISCAM','0000-00-00'),(4,4,3,'BACC','Ankatso','0000-00-00'),(5,5,3,'Test','Test','2021-12-14'),(6,5,3,'Test','Test','2021-12-14'),(7,5,3,'Test','Test','2021-12-14'),(8,5,3,'Test','Test','2021-12-14'),(9,5,3,'Test','Test','2021-12-14'),(10,5,3,'Test','Test','2021-12-14'),(11,12,1,'Test','aa','2021-12-08');
/*!40000 ALTER TABLE `diplome` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domaine`
--

DROP TABLE IF EXISTS `domaine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `domaine` (
  `idDomaine` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(20) DEFAULT NULL,
  `descri` text DEFAULT NULL,
  PRIMARY KEY (`idDomaine`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domaine`
--

LOCK TABLES `domaine` WRITE;
/*!40000 ALTER TABLE `domaine` DISABLE KEYS */;
INSERT INTO `domaine` VALUES (1,'financier','neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in aliquet lobortis,'),(2,'communication','commodo auctor velit. Aliquam'),(3,'Science','Proin velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper');
/*!40000 ALTER TABLE `domaine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `empanciente`
--

DROP TABLE IF EXISTS `empanciente`;
/*!50001 DROP VIEW IF EXISTS `empanciente`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `empanciente` (
  `idEmploye` tinyint NOT NULL,
  `idPersonne` tinyint NOT NULL,
  `idPoste` tinyint NOT NULL,
  `idSalaire` tinyint NOT NULL,
  `dateEmbauche` tinyint NOT NULL,
  `years` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `empemp`
--

DROP TABLE IF EXISTS `empemp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empemp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEmployeur` int(11) DEFAULT NULL,
  `idEmploye` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idemployeur` (`idEmployeur`),
  KEY `fk_idemploye` (`idEmploye`),
  CONSTRAINT `fk_idemploye` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_idemployeur` FOREIGN KEY (`idEmployeur`) REFERENCES `employeur` (`idEmployeur`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empemp`
--

LOCK TABLES `empemp` WRITE;
/*!40000 ALTER TABLE `empemp` DISABLE KEYS */;
/*!40000 ALTER TABLE `empemp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employe`
--

DROP TABLE IF EXISTS `employe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employe` (
  `idEmploye` int(11) NOT NULL AUTO_INCREMENT,
  `idPersonne` int(11) DEFAULT NULL,
  `idPoste` int(11) DEFAULT NULL,
  `idSalaire` int(11) DEFAULT NULL,
  `dateEmbauche` date DEFAULT NULL,
  PRIMARY KEY (`idEmploye`),
  KEY `fk_employe_idPersonne` (`idPersonne`),
  KEY `fk_employe_idPoste` (`idPoste`),
  KEY `fk_employe_idSalaire` (`idSalaire`),
  CONSTRAINT `fk_employe_idPersonne` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`idPersonne`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_employe_idPoste` FOREIGN KEY (`idPoste`) REFERENCES `poste` (`idPoste`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_employe_idSalaire` FOREIGN KEY (`idSalaire`) REFERENCES `salaire` (`idSalaire`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employe`
--

LOCK TABLES `employe` WRITE;
/*!40000 ALTER TABLE `employe` DISABLE KEYS */;
INSERT INTO `employe` VALUES (28,1,1,1,'2012-02-12'),(29,2,2,1,'2012-02-12'),(30,3,3,1,'2012-02-12'),(31,4,4,1,'2012-02-12'),(32,5,5,1,'2012-02-12'),(33,6,6,1,'2012-02-12'),(34,7,7,1,'2012-02-12'),(35,8,8,1,'2012-02-12'),(36,9,9,1,'2012-02-12'),(37,10,10,1,'2012-02-12'),(38,11,11,1,'2012-02-12'),(39,12,12,1,'2012-02-12'),(40,13,13,1,'2012-02-12'),(41,14,14,1,'2012-02-12'),(42,15,15,1,'2012-02-12'),(43,16,16,1,'2012-02-12'),(44,17,17,1,'2012-02-12'),(45,18,18,1,'2012-02-12'),(46,19,19,1,'2012-02-12'),(47,20,20,1,'2012-02-12'),(48,21,21,1,'2012-02-12');
/*!40000 ALTER TABLE `employe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `employe_view`
--

DROP TABLE IF EXISTS `employe_view`;
/*!50001 DROP VIEW IF EXISTS `employe_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `employe_view` (
  `idPersonne` tinyint NOT NULL,
  `nom` tinyint NOT NULL,
  `prenom` tinyint NOT NULL,
  `dtn` tinyint NOT NULL,
  `sexe` tinyint NOT NULL,
  `adresse` tinyint NOT NULL,
  `distance` tinyint NOT NULL,
  `matrimonial` tinyint NOT NULL,
  `idContact` tinyint NOT NULL,
  `idEmploye` tinyint NOT NULL,
  `idSalaire` tinyint NOT NULL,
  `dateEmbauche` tinyint NOT NULL,
  `nomDepartement` tinyint NOT NULL,
  `idDepartement` tinyint NOT NULL,
  `descriDepartement` tinyint NOT NULL,
  `montantSalaire` tinyint NOT NULL,
  `dateMiseEnPlace` tinyint NOT NULL,
  `nomPoste` tinyint NOT NULL,
  `idPoste` tinyint NOT NULL,
  `descriPoste` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `employeconge`
--

DROP TABLE IF EXISTS `employeconge`;
/*!50001 DROP VIEW IF EXISTS `employeconge`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `employeconge` (
  `id` tinyint NOT NULL,
  `idEmp` tinyint NOT NULL,
  `motif` tinyint NOT NULL,
  `dateDebut` tinyint NOT NULL,
  `dateFin` tinyint NOT NULL,
  `etat` tinyint NOT NULL,
  `description` tinyint NOT NULL,
  `deductibilite` tinyint NOT NULL,
  `idPoste` tinyint NOT NULL,
  `idSalaire` tinyint NOT NULL,
  `dateEmbauche` tinyint NOT NULL,
  `nom` tinyint NOT NULL,
  `prenom` tinyint NOT NULL,
  `NbrHeure` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `employeur`
--

DROP TABLE IF EXISTS `employeur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employeur` (
  `idEmployeur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `statut` varchar(30) DEFAULT NULL,
  `adresse` varchar(30) DEFAULT NULL,
  `identi` varchar(30) DEFAULT NULL,
  `repre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idEmployeur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employeur`
--

LOCK TABLES `employeur` WRITE;
/*!40000 ALTER TABLE `employeur` DISABLE KEYS */;
/*!40000 ALTER TABLE `employeur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enfant`
--

DROP TABLE IF EXISTS `enfant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enfant` (
  `idEnfant` int(11) NOT NULL AUTO_INCREMENT,
  `idEmploye` int(11) DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `dtn` date DEFAULT NULL,
  PRIMARY KEY (`idEnfant`),
  KEY `fk_enfant_idEmploye` (`idEmploye`),
  CONSTRAINT `fk_enfant_idEmploye` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enfant`
--

LOCK TABLES `enfant` WRITE;
/*!40000 ALTER TABLE `enfant` DISABLE KEYS */;
/*!40000 ALTER TABLE `enfant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entretien`
--

DROP TABLE IF EXISTS `entretien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entretien` (
  `idEntretien` int(11) NOT NULL AUTO_INCREMENT,
  `idPersonne` int(11) DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `dateentretien` date DEFAULT NULL,
  `heureentretien` time DEFAULT NULL,
  PRIMARY KEY (`idEntretien`),
  KEY `idPersonne` (`idPersonne`),
  CONSTRAINT `entretien_ibfk_1` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`idPersonne`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entretien`
--

LOCK TABLES `entretien` WRITE;
/*!40000 ALTER TABLE `entretien` DISABLE KEYS */;
INSERT INTO `entretien` VALUES (1,4,50,'2021-12-11','08:05:00');
/*!40000 ALTER TABLE `entretien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `etatconge`
--

DROP TABLE IF EXISTS `etatconge`;
/*!50001 DROP VIEW IF EXISTS `etatconge`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `etatconge` (
  `idEmploye` tinyint NOT NULL,
  `dateEmbauche` tinyint NOT NULL,
  `anneeTravail` tinyint NOT NULL,
  `cumule` tinyint NOT NULL,
  `pris` tinyint NOT NULL,
  `restant` tinyint NOT NULL,
  `remarque` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evenement` (
  `idEvenement` int(11) NOT NULL AUTO_INCREMENT,
  `idCategorieEvenement` int(11) DEFAULT NULL,
  `label` varchar(30) DEFAULT NULL,
  `descri` text DEFAULT NULL,
  `dateEvenement` date DEFAULT NULL,
  PRIMARY KEY (`idEvenement`),
  KEY `fk_evenement_idCategorieEvenement` (`idCategorieEvenement`),
  CONSTRAINT `fk_evenement_idCategorieEvenement` FOREIGN KEY (`idCategorieEvenement`) REFERENCES `categorieevenement` (`idCategorieEvenement`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evenement`
--

LOCK TABLES `evenement` WRITE;
/*!40000 ALTER TABLE `evenement` DISABLE KEYS */;
INSERT INTO `evenement` VALUES (1,1,'test a l\'entreprise','Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis','2021-02-05'),(2,2,'entretient d\'embauche','Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis','2021-02-10');
/*!40000 ALTER TABLE `evenement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evenement_personne`
--

DROP TABLE IF EXISTS `evenement_personne`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evenement_personne` (
  `idEvenement` int(11) DEFAULT NULL,
  `idPersonne` int(11) DEFAULT NULL,
  KEY `idEvenement` (`idEvenement`),
  KEY `idPersonne` (`idPersonne`),
  CONSTRAINT `evenement_personne_ibfk_1` FOREIGN KEY (`idEvenement`) REFERENCES `evenement` (`idEvenement`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `evenement_personne_ibfk_2` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`idPersonne`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evenement_personne`
--

LOCK TABLES `evenement_personne` WRITE;
/*!40000 ALTER TABLE `evenement_personne` DISABLE KEYS */;
INSERT INTO `evenement_personne` VALUES (1,1),(2,1);
/*!40000 ALTER TABLE `evenement_personne` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `experience`
--

DROP TABLE IF EXISTS `experience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `experience` (
  `idExperience` int(11) NOT NULL AUTO_INCREMENT,
  `idCV` int(11) DEFAULT NULL,
  `dateEntre` date DEFAULT NULL,
  `dateSortie` date DEFAULT NULL,
  `poste` varchar(30) DEFAULT NULL,
  `societe` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idExperience`),
  KEY `fk_experience_idCV` (`idCV`),
  CONSTRAINT `fk_experience_idCV` FOREIGN KEY (`idCV`) REFERENCES `cv` (`idCV`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experience`
--

LOCK TABLES `experience` WRITE;
/*!40000 ALTER TABLE `experience` DISABLE KEYS */;
INSERT INTO `experience` VALUES (1,1,'2018-09-11','2018-12-13','caissier','Jumbo score'),(2,1,'2019-01-30','2020-02-05','Comptable','BNI'),(3,3,'2020-12-27','2021-01-18','responsable marketing','Etoile color'),(4,4,'2018-05-20','2021-09-20','infirmiere','HJRA'),(5,5,'2021-12-06','2021-12-11','Test','Test'),(6,5,'2021-12-06','2021-12-11','Test','Test'),(7,5,'2021-12-06','2021-12-11','Test','Test'),(8,5,'2021-12-06','2021-12-11','Test','Test'),(9,5,'2021-12-06','2021-12-11','Test','Test'),(10,5,'2021-12-06','2021-12-11','Test','Test'),(11,12,'2021-12-14','2021-12-15','aa','aa');
/*!40000 ALTER TABLE `experience` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `experience_domaine`
--

DROP TABLE IF EXISTS `experience_domaine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `experience_domaine` (
  `idExperience` int(11) DEFAULT NULL,
  `idDomaine` int(11) DEFAULT NULL,
  KEY `idExperience` (`idExperience`),
  KEY `idDomaine` (`idDomaine`),
  CONSTRAINT `experience_domaine_ibfk_1` FOREIGN KEY (`idExperience`) REFERENCES `experience` (`idExperience`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `experience_domaine_ibfk_2` FOREIGN KEY (`idDomaine`) REFERENCES `domaine` (`idDomaine`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experience_domaine`
--

LOCK TABLES `experience_domaine` WRITE;
/*!40000 ALTER TABLE `experience_domaine` DISABLE KEYS */;
INSERT INTO `experience_domaine` VALUES (1,1),(2,1),(3,2),(4,3),(11,1);
/*!40000 ALTER TABLE `experience_domaine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fichepaie`
--

DROP TABLE IF EXISTS `fichepaie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fichepaie` (
  `idFichePaie` int(11) NOT NULL AUTO_INCREMENT,
  `idEmploye` int(11) DEFAULT NULL,
  `dateMiseEnPlace` date DEFAULT NULL,
  `irsa` float DEFAULT NULL,
  `pc` float DEFAULT NULL,
  `net` float DEFAULT NULL,
  PRIMARY KEY (`idFichePaie`),
  KEY `idEmploye` (`idEmploye`),
  CONSTRAINT `fichepaie_ibfk_1` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fichepaie`
--

LOCK TABLES `fichepaie` WRITE;
/*!40000 ALTER TABLE `fichepaie` DISABLE KEYS */;
/*!40000 ALTER TABLE `fichepaie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `filtre_view`
--

DROP TABLE IF EXISTS `filtre_view`;
/*!50001 DROP VIEW IF EXISTS `filtre_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `filtre_view` (
  `idPersonne` tinyint NOT NULL,
  `nomPersonne` tinyint NOT NULL,
  `age` tinyint NOT NULL,
  `sexe` tinyint NOT NULL,
  `distance` tinyint NOT NULL,
  `matrimonial` tinyint NOT NULL,
  `niveau` tinyint NOT NULL,
  `titreLangue` tinyint NOT NULL,
  `titreDiplome` tinyint NOT NULL,
  `titreGrade` tinyint NOT NULL,
  `titreDomaine` tinyint NOT NULL,
  `nomPosteExperience` tinyint NOT NULL,
  `dateEntreExperience` tinyint NOT NULL,
  `dateSortieExperience` tinyint NOT NULL,
  `nomPoste` tinyint NOT NULL,
  `nomDepartement` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fournisseur` (
  `idFournisseur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) DEFAULT NULL,
  `addresse` varchar(150) DEFAULT NULL,
  `tel` varchar(150) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `nif` varchar(150) DEFAULT NULL,
  `idCateg` int(11) DEFAULT NULL,
  PRIMARY KEY (`idFournisseur`),
  KEY `idCateg` (`idCateg`),
  CONSTRAINT `fournisseur_ibfk_1` FOREIGN KEY (`idCateg`) REFERENCES `categoriefournisseur` (`idCateg`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fournisseur`
--

LOCK TABLES `fournisseur` WRITE;
/*!40000 ALTER TABLE `fournisseur` DISABLE KEYS */;
INSERT INTO `fournisseur` VALUES (1,'sanifer','tanjombato',NULL,NULL,'123456',1),(2,'pharmacie de tana','tanjombato',NULL,NULL,'123456',2),(3,'score','tanjombato',NULL,NULL,'123456',3),(4,'premier','tanjombato',NULL,NULL,'123456',4);
/*!40000 ALTER TABLE `fournisseur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grade`
--

DROP TABLE IF EXISTS `grade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grade` (
  `idGrade` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idGrade`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade`
--

LOCK TABLES `grade` WRITE;
/*!40000 ALTER TABLE `grade` DISABLE KEYS */;
INSERT INTO `grade` VALUES (1,'1e annee'),(2,'2e annee'),(3,'3e annee'),(4,'4e annee'),(5,'5e annee');
/*!40000 ALTER TABLE `grade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gradeprofessionnel`
--

DROP TABLE IF EXISTS `gradeprofessionnel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gradeprofessionnel` (
  `idGrad` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(50) DEFAULT NULL,
  `Libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idGrad`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gradeprofessionnel`
--

LOCK TABLES `gradeprofessionnel` WRITE;
/*!40000 ALTER TABLE `gradeprofessionnel` DISABLE KEYS */;
INSERT INTO `gradeprofessionnel` VALUES (1,'Stg','Stagiaire'),(2,'2C1','Deuxieme classe, 1er echelon'),(3,'2C2','Deuxieme classe, 2e echelon'),(4,'2C3','Deuxieme classe, 3e echelon'),(5,'1C1','Premiere classe, 1er echelon'),(6,'1C2','Premiere classe, 2e echelon'),(7,'1C3','Premiere classe, 3e echelon'),(8,'Ppal1','Principal 1er echelon'),(9,'Ppal2','Principal 2e echelon'),(10,'Ppal3','Principal 3e echelon'),(11,'Exc1','Classe exceptionnelle 1er echelon'),(12,'Exc2','Classe exceptionnelle 2e echelon');
/*!40000 ALTER TABLE `gradeprofessionnel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grillesalaire`
--

DROP TABLE IF EXISTS `grillesalaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grillesalaire` (
  `GradeProfessionnel` int(11) NOT NULL,
  `categorie` int(11) NOT NULL,
  `SalaireMin` int(11) DEFAULT NULL,
  PRIMARY KEY (`GradeProfessionnel`,`categorie`),
  KEY `categorie` (`categorie`),
  CONSTRAINT `grillesalaire_ibfk_1` FOREIGN KEY (`GradeProfessionnel`) REFERENCES `gradeprofessionnel` (`idGrad`),
  CONSTRAINT `grillesalaire_ibfk_2` FOREIGN KEY (`categorie`) REFERENCES `categorieprofessionnel` (`idcat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grillesalaire`
--

LOCK TABLES `grillesalaire` WRITE;
/*!40000 ALTER TABLE `grillesalaire` DISABLE KEYS */;
INSERT INTO `grillesalaire` VALUES (1,1,246559),(1,2,272511),(1,3,323489),(1,4,419430),(1,5,443044),(1,6,479647),(1,7,525258),(1,8,576393),(1,9,642535),(2,1,250107),(2,2,277033),(2,3,330855),(2,4,441253),(2,5,468550),(2,6,500892),(2,7,549207),(2,8,610183),(2,9,672883),(3,1,259362),(3,2,281556),(3,3,338007),(3,4,463238),(3,5,489151),(3,6,532831),(3,7,574958),(3,8,641778),(3,9,710031),(4,1,262907),(4,2,288933),(4,3,348237),(4,4,485104),(4,5,515524),(4,6,555977),(4,7,606311),(4,8,676889),(4,9,745654),(5,1,267636),(5,2,298979),(5,3,362908),(5,4,520532),(5,5,516019),(5,6,587965),(5,7,635427),(5,8,718868),(5,9,783042),(6,1,273546),(6,2,303501),(6,3,373633),(6,4,543691),(6,5,586678),(6,6,617654),(6,7,667976),(6,8,760982),(6,9,831022),(7,1,281353),(7,2,309153),(7,3,384095),(7,4,579703),(7,5,612415),(7,6,652188),(7,7,705590),(7,8,813796),(7,9,875574),(7,10,1008075),(8,1,287263),(8,2,318168),(8,3,399034),(8,4,618729),(8,5,643294),(8,6,691769),(8,7,743140),(8,8,864193),(8,9,923693),(8,10,1060017),(9,1,291992),(9,2,322689),(9,3,410860),(9,4,654786),(9,5,678181),(9,6,731265),(9,7,790649),(9,8,920084),(9,9,984395),(9,10,1094583),(10,1,302067),(10,2,328341),(10,3,423971),(10,4,687459),(10,5,714970),(10,6,781217),(10,7,832552),(10,8,990306),(10,9,1045771),(10,10,1187812),(11,1,307655),(11,2,338234),(11,3,441366),(11,4,732052),(11,5,760519),(11,6,827340),(11,7,879576),(11,8,1055171),(11,9,1113035),(11,10,1216164),(12,1,353608),(12,2,425914),(12,3,579445),(12,4,747580),(12,5,808562),(12,6,860258),(12,7,1016262),(12,8,109122),(12,9,1190218),(12,10,1266399);
/*!40000 ALTER TABLE `grillesalaire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `grillesalairemin`
--

DROP TABLE IF EXISTS `grillesalairemin`;
/*!50001 DROP VIEW IF EXISTS `grillesalairemin`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `grillesalairemin` (
  `Categorie` tinyint NOT NULL,
  `GradeProfessionnel` tinyint NOT NULL,
  `salaireMin` tinyint NOT NULL,
  `idGrad` tinyint NOT NULL,
  `idcat` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `heureenmoins`
--

DROP TABLE IF EXISTS `heureenmoins`;
/*!50001 DROP VIEW IF EXISTS `heureenmoins`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `heureenmoins` (
  `idEmploye` tinyint NOT NULL,
  `heureMoins` tinyint NOT NULL,
  `remarque` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `historiqueconge`
--

DROP TABLE IF EXISTS `historiqueconge`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historiqueconge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEmp` int(11) DEFAULT NULL,
  `motif` varchar(10) DEFAULT NULL,
  `dateDebut` datetime DEFAULT NULL,
  `dateFin` datetime DEFAULT NULL,
  `etat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idEmp` (`idEmp`),
  KEY `motif` (`motif`),
  CONSTRAINT `historiqueconge_ibfk_1` FOREIGN KEY (`idEmp`) REFERENCES `employe` (`idEmploye`),
  CONSTRAINT `historiqueconge_ibfk_2` FOREIGN KEY (`motif`) REFERENCES `motifconge` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historiqueconge`
--

LOCK TABLES `historiqueconge` WRITE;
/*!40000 ALTER TABLE `historiqueconge` DISABLE KEYS */;
/*!40000 ALTER TABLE `historiqueconge` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indemnite`
--

DROP TABLE IF EXISTS `indemnite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indemnite` (
  `idIndemnite` int(11) NOT NULL AUTO_INCREMENT,
  `idRN` int(11) DEFAULT NULL,
  `libele` varchar(30) DEFAULT NULL,
  `montant` float DEFAULT NULL,
  PRIMARY KEY (`idIndemnite`),
  KEY `idRN` (`idRN`),
  CONSTRAINT `indemnite_ibfk_1` FOREIGN KEY (`idRN`) REFERENCES `rn` (`idRN`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indemnite`
--

LOCK TABLES `indemnite` WRITE;
/*!40000 ALTER TABLE `indemnite` DISABLE KEYS */;
/*!40000 ALTER TABLE `indemnite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `irsa`
--

DROP TABLE IF EXISTS `irsa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `irsa` (
  `idTranche` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(30) DEFAULT NULL,
  `montantMin` int(11) DEFAULT NULL,
  `montantMax` int(11) DEFAULT NULL,
  `taux` float DEFAULT NULL,
  PRIMARY KEY (`idTranche`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `irsa`
--

LOCK TABLES `irsa` WRITE;
/*!40000 ALTER TABLE `irsa` DISABLE KEYS */;
INSERT INTO `irsa` VALUES (1,'1e tranche',0,350000,0),(2,'2e tranche',350001,400000,5),(3,'3e tranche',400001,500000,10),(4,'4e tranche',500001,600000,15),(5,'5e tranche',600001,NULL,20);
/*!40000 ALTER TABLE `irsa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `langue`
--

DROP TABLE IF EXISTS `langue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `langue` (
  `idLangue` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idLangue`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `langue`
--

LOCK TABLES `langue` WRITE;
/*!40000 ALTER TABLE `langue` DISABLE KEYS */;
INSERT INTO `langue` VALUES (1,'Malgache'),(2,'Francais'),(3,'Anglais'),(4,'Allemand'),(5,'Japonais'),(6,'Espagnol'),(7,'Russe'),(8,'Mandarin');
/*!40000 ALTER TABLE `langue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `listebulletin`
--

DROP TABLE IF EXISTS `listebulletin`;
/*!50001 DROP VIEW IF EXISTS `listebulletin`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `listebulletin` (
  `idEmploye` tinyint NOT NULL,
  `nom` tinyint NOT NULL,
  `prenom` tinyint NOT NULL,
  `idFichePaie` tinyint NOT NULL,
  `dateMiseEnPlace` tinyint NOT NULL,
  `net` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `loisir`
--

DROP TABLE IF EXISTS `loisir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loisir` (
  `idLoisir` int(11) NOT NULL AUTO_INCREMENT,
  `idCategorieLoisire` int(11) DEFAULT NULL,
  `pratique` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idLoisir`),
  KEY `idCategorieLoisire` (`idCategorieLoisire`),
  CONSTRAINT `loisir_ibfk_1` FOREIGN KEY (`idCategorieLoisire`) REFERENCES `categorieloisir` (`idCategorieLoisire`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loisir`
--

LOCK TABLES `loisir` WRITE;
/*!40000 ALTER TABLE `loisir` DISABLE KEYS */;
INSERT INTO `loisir` VALUES (1,1,'musique'),(2,1,'musique'),(3,1,'musique'),(4,1,'musique'),(5,1,'musique'),(6,1,'musique'),(7,1,'aaa');
/*!40000 ALTER TABLE `loisir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mobile`
--

DROP TABLE IF EXISTS `mobile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mobile` (
  `idMobile` int(11) NOT NULL AUTO_INCREMENT,
  `idContact` int(11) DEFAULT NULL,
  `numero` int(11) NOT NULL,
  PRIMARY KEY (`idMobile`),
  KEY `idContact` (`idContact`),
  CONSTRAINT `mobile_ibfk_1` FOREIGN KEY (`idContact`) REFERENCES `contact` (`idContact`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mobile`
--

LOCK TABLES `mobile` WRITE;
/*!40000 ALTER TABLE `mobile` DISABLE KEYS */;
INSERT INTO `mobile` VALUES (1,1,344526636),(2,2,345788862),(3,3,342326243),(4,4,341858661),(5,5,34342585),(6,6,348573662),(7,7,346194367),(8,8,342243155),(9,9,34282783),(10,10,344737847),(11,11,344255041),(12,12,34497705),(13,13,342635633),(14,14,341253961),(15,15,344278357),(16,16,342686872),(17,17,345157172),(18,18,346532812),(19,19,342670372),(20,20,347451215),(21,28,325566482);
/*!40000 ALTER TABLE `mobile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `motifconge`
--

DROP TABLE IF EXISTS `motifconge`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `motifconge` (
  `id` varchar(10) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  `deductibilite` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `motifconge`
--

LOCK TABLES `motifconge` WRITE;
/*!40000 ALTER TABLE `motifconge` DISABLE KEYS */;
INSERT INTO `motifconge` VALUES ('M1','evenement familial','non'),('M2','repos medical','non'),('M3','autre','oui');
/*!40000 ALTER TABLE `motifconge` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offre`
--

DROP TABLE IF EXISTS `offre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `offre` (
  `idOffre` int(11) NOT NULL AUTO_INCREMENT,
  `Poste` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `responsabilite` varchar(500) NOT NULL,
  `ageMin` int(11) NOT NULL,
  `idDiplomeOffre` int(11) NOT NULL,
  `Experiences` varchar(500) DEFAULT NULL,
  `AutreExperience` varchar(500) DEFAULT NULL,
  `dateLimite` date DEFAULT NULL,
  PRIMARY KEY (`idOffre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offre`
--

LOCK TABLES `offre` WRITE;
/*!40000 ALTER TABLE `offre` DISABLE KEYS */;
/*!40000 ALTER TABLE `offre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organigramme`
--

DROP TABLE IF EXISTS `organigramme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organigramme` (
  `Poste` varchar(50) NOT NULL,
  `PosteSup` varchar(50) DEFAULT NULL,
  `idCategorie` int(11) DEFAULT NULL,
  PRIMARY KEY (`Poste`),
  KEY `PosteSup` (`PosteSup`),
  KEY `idCategorie` (`idCategorie`),
  CONSTRAINT `organigramme_ibfk_1` FOREIGN KEY (`PosteSup`) REFERENCES `organigramme` (`Poste`),
  CONSTRAINT `organigramme_ibfk_2` FOREIGN KEY (`idCategorie`) REFERENCES `categorieprofessionnel` (`idcat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organigramme`
--

LOCK TABLES `organigramme` WRITE;
/*!40000 ALTER TABLE `organigramme` DISABLE KEYS */;
INSERT INTO `organigramme` VALUES ('Administration','Directeur Admin. et Juridique',5),('Audit interne','Directeur Admin. et Juridique',5),('Comptabilite','Directeur Financier',5),('Controle de Gestion','Directeur Financier',5),('Directeur Admin. et Juridique','Directeur General',6),('Directeur Commercial','Directeur General',6),('Directeur de Production','Directeur General',6),('Directeur des RH','Directeur General',6),('Directeur Financier','Directeur General',6),('Directeur General',NULL,8),('Gestion du personnel','Directeur des RH',5),('Logistique','Directeur de Production',5),('Marketing','Directeur Commercial',5),('Paie','Directeur Financier',5),('Produit','Directeur Commercial',5),('Recrutement','Directeur des RH',5),('SAV','Directeur Commercial',5),('Secretariat General','Directeur General',6),('Service juridique','Directeur Admin. et Juridique',5),('Usine1','Directeur de Production',5),('Usine2','Directeur de Production',5);
/*!40000 ALTER TABLE `organigramme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periodeconge`
--

DROP TABLE IF EXISTS `periodeconge`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `periodeconge` (
  `id` varchar(10) NOT NULL,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodeconge`
--

LOCK TABLES `periodeconge` WRITE;
/*!40000 ALTER TABLE `periodeconge` DISABLE KEYS */;
/*!40000 ALTER TABLE `periodeconge` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personne`
--

DROP TABLE IF EXISTS `personne`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personne` (
  `idPersonne` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `dtn` date DEFAULT NULL,
  `sexe` char(1) DEFAULT NULL,
  `adresse` varchar(30) DEFAULT NULL,
  `distance` float DEFAULT NULL,
  `matrimonial` varchar(20) DEFAULT NULL,
  `idContact` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPersonne`),
  KEY `idContact` (`idContact`),
  CONSTRAINT `personne_ibfk_1` FOREIGN KEY (`idContact`) REFERENCES `contact` (`idContact`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personne`
--

LOCK TABLES `personne` WRITE;
/*!40000 ALTER TABLE `personne` DISABLE KEYS */;
INSERT INTO `personne` VALUES (1,'Lillith','Pope','1981-03-12','F','970-3240 Nec Rd.',1,'mariee',1),(2,'Kim','Baxter','1981-03-12','F','Ap #862-3446 Phasellus Ave',6,'Celibataire',2),(3,'Tyrone','Love','1981-03-12','M','1704 Purus, Av.',5,'marie',3),(4,'Philip','West','1981-03-12','M','8340 Nisl. Street',9,'marie',4),(5,'Lance','Crane','1981-03-12','F','335-3726 Malesuada Rd.',0,'mariee',5),(6,'Dahlia','Olsen','1981-03-12','F','466-9537 Nec, St.',7,'Veuve',6),(7,'Amethyst','Patterson','1981-03-12','M','999-6773 Aliquam Av.',10,'Veuf',7),(8,'Frances','Cleveland','1981-03-12','M','Ap #236-4383 In St.',1,'Celibataire',8),(9,'Odessa','Leach','1981-03-12','F','Ap #580-7936 Malesuada Avenue',5,'mariee',9),(10,'Wilma','Rivera','1981-03-12','F','Ap #271-6542 Est. St.',2,'Veuve',10),(11,'Maggy','Lindsey','1981-03-12','M','857-2139 Dolor Avenue',4,'marie',11),(12,'Daria','Roth','1981-03-12','F','174-8534 Enim. Road',4,'Celibataire',12),(13,'Ursa','Jenkins','1981-03-12','M','481-6744 Pellentesque Av.',2,'marie',13),(14,'Kiona','Kirby','1981-03-12','M','P.O. Box 525, 8563 Auctor Stre',4,'Veuf',14),(15,'Thomas','Middleton','1981-03-12','M','571-530 Nec Rd.',10,'marie',15),(16,'Marshall','Juarez','1981-03-12','M','758-9471 Mus. Av.',4,'Celibataire',16),(17,'Signe','Bartlett','1981-03-12','F','8706 Dui. Av.',1,'mariee',17),(18,'Fatima','Mccray','1981-03-12','M','857-2340 Non, Rd.',4,'Veuf',18),(19,'Gage','Norman','1981-03-12','M','6895 Orci St.',8,'Celibataire',19),(20,'Angela','Gomez','1981-03-12','F','207-4603 Tellus, Ave',7,'mariee',20),(21,'Coco','Test','1995-03-15','M','105 VGT',0,'Celibataire',21),(22,'Coco','Test','1995-03-15','M','105 VGT',0,'Celibataire',21),(23,'Coco','Test','1995-03-15','M','105 VGT',0,'Celibataire',21),(24,'Coco','Test','1995-03-15','M','105 VGT',0,'Celibataire',21),(25,'Coco','Test','1995-03-15','M','105 VGT',0,'Celibataire',21),(26,'Coco','Test','1995-03-15','M','105 VGT',0,'Celibataire',21),(27,'Coco','Test','1995-03-15','M','105 VGT',0,'Celibataire',21),(28,'Sam Koon','Mathieu','2000-12-06','M','Logt 32 IAV',30.529,'Celibataire',28);
/*!40000 ALTER TABLE `personne` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pointage`
--

DROP TABLE IF EXISTS `pointage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pointage` (
  `idPointage` int(11) NOT NULL AUTO_INCREMENT,
  `idEmploye` int(11) DEFAULT NULL,
  `dateDebut` datetime DEFAULT NULL,
  `dateFin` datetime DEFAULT NULL,
  PRIMARY KEY (`idPointage`),
  KEY `fk_pointage_idEmploye` (`idEmploye`),
  CONSTRAINT `fk_pointage_idEmploye` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pointage`
--

LOCK TABLES `pointage` WRITE;
/*!40000 ALTER TABLE `pointage` DISABLE KEYS */;
/*!40000 ALTER TABLE `pointage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poste`
--

DROP TABLE IF EXISTS `poste`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poste` (
  `idPoste` int(11) NOT NULL AUTO_INCREMENT,
  `idDepartement` int(11) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `descri` text DEFAULT NULL,
  PRIMARY KEY (`idPoste`),
  KEY `fk_poste_idDepartement` (`idDepartement`),
  CONSTRAINT `fk_poste_idDepartement` FOREIGN KEY (`idDepartement`) REFERENCES `departement` (`idDepartement`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poste`
--

LOCK TABLES `poste` WRITE;
/*!40000 ALTER TABLE `poste` DISABLE KEYS */;
INSERT INTO `poste` VALUES (1,NULL,'Directeur General','Directeur generale'),(2,NULL,'Secretariat General','Secretaire general de l entreprises'),(3,3,'Directeur de Production','Chargees de production'),(4,3,'Logistique','Responsable logistique'),(5,3,'Usine1','Chargee de l usine 1'),(6,3,'Usine2','Chargee de l usine 2'),(7,5,'Directeur Financier','Directeur Financier'),(8,5,'Paie','Responsable payement cappitaux'),(9,5,'Comptabilite','Responsable des comptes'),(10,5,'Controle de Gestion','Controlleur de compte'),(11,2,'Directeur des RH','Chargees des ressources humaines'),(12,2,'Recrutement','Chargee de Recrutement'),(13,2,'Gestion du personnel','Chargee gestion du peronnel'),(14,4,'Directeur Commercial','Directeur commerciale'),(15,4,'SAV','SAV'),(16,5,'Marketing','Chargee de Marketing'),(17,5,'Produit','Chargee de produit'),(18,1,'Directeur Admin. et Juridique','Directeur Admin. et Juridique'),(19,1,'Administration','Administration'),(20,1,'Audit interne','Audit interne'),(21,1,'Service juridique','Service juridique');
/*!40000 ALTER TABLE `poste` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `retraitconge`
--

DROP TABLE IF EXISTS `retraitconge`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `retraitconge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEmp` int(11) DEFAULT NULL,
  `heure` int(11) DEFAULT NULL,
  `dateDiminution` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idEmp` (`idEmp`),
  CONSTRAINT `retraitconge_ibfk_1` FOREIGN KEY (`idEmp`) REFERENCES `employe` (`idEmploye`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `retraitconge`
--

LOCK TABLES `retraitconge` WRITE;
/*!40000 ALTER TABLE `retraitconge` DISABLE KEYS */;
/*!40000 ALTER TABLE `retraitconge` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rn`
--

DROP TABLE IF EXISTS `rn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rn` (
  `idRN` int(11) NOT NULL AUTO_INCREMENT,
  `idFichePaie` int(11) DEFAULT NULL,
  `salaireFix` float DEFAULT NULL,
  `prime` float DEFAULT NULL,
  PRIMARY KEY (`idRN`),
  KEY `idFichePaie` (`idFichePaie`),
  CONSTRAINT `rn_ibfk_1` FOREIGN KEY (`idFichePaie`) REFERENCES `fichepaie` (`idFichePaie`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rn`
--

LOCK TABLES `rn` WRITE;
/*!40000 ALTER TABLE `rn` DISABLE KEYS */;
/*!40000 ALTER TABLE `rn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salaire`
--

DROP TABLE IF EXISTS `salaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salaire` (
  `idSalaire` int(11) NOT NULL AUTO_INCREMENT,
  `idEmploye` int(11) DEFAULT NULL,
  `montant` float DEFAULT NULL,
  `dateMiseEnPlace` date DEFAULT NULL,
  PRIMARY KEY (`idSalaire`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salaire`
--

LOCK TABLES `salaire` WRITE;
/*!40000 ALTER TABLE `salaire` DISABLE KEYS */;
INSERT INTO `salaire` VALUES (1,1,5000000,'2021-02-12');
/*!40000 ALTER TABLE `salaire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salairevariable`
--

DROP TABLE IF EXISTS `salairevariable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salairevariable` (
  `idSalaireVariable` int(11) NOT NULL AUTO_INCREMENT,
  `idRN` int(11) DEFAULT NULL,
  `libele` varchar(30) DEFAULT NULL,
  `montant` float DEFAULT NULL,
  PRIMARY KEY (`idSalaireVariable`),
  KEY `idRN` (`idRN`),
  CONSTRAINT `salairevariable_ibfk_1` FOREIGN KEY (`idRN`) REFERENCES `rn` (`idRN`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salairevariable`
--

LOCK TABLES `salairevariable` WRITE;
/*!40000 ALTER TABLE `salairevariable` DISABLE KEYS */;
/*!40000 ALTER TABLE `salairevariable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scolarite`
--

DROP TABLE IF EXISTS `scolarite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scolarite` (
  `idScolarite` int(11) NOT NULL AUTO_INCREMENT,
  `idCV` int(11) DEFAULT NULL,
  `dateEntre` date DEFAULT NULL,
  `dateSortie` date DEFAULT NULL,
  `etablissement` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idScolarite`),
  KEY `fk_scolarite_idCV` (`idCV`),
  CONSTRAINT `fk_scolarite_idCV` FOREIGN KEY (`idCV`) REFERENCES `cv` (`idCV`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scolarite`
--

LOCK TABLES `scolarite` WRITE;
/*!40000 ALTER TABLE `scolarite` DISABLE KEYS */;
INSERT INTO `scolarite` VALUES (1,1,'2012-08-11','2016-05-20','ITU'),(2,2,'2009-08-11','2014-05-20','ESCA'),(3,3,'2010-08-11','2014-05-20','ISCAM'),(4,4,'2014-08-11','2017-05-20','Ankatso'),(5,12,'2021-12-08','2021-12-30','aaa');
/*!40000 ALTER TABLE `scolarite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `gestion`
--

USE `gestion`;

--
-- Final view structure for view `congeparmoisparemploye`
--

/*!50001 DROP TABLE IF EXISTS `congeparmoisparemploye`*/;
/*!50001 DROP VIEW IF EXISTS `congeparmoisparemploye`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `congeparmoisparemploye` AS (select `hc`.`id` AS `id`,`hc`.`idEmp` AS `idEmp`,`hc`.`motif` AS `motif`,`hc`.`dateDebut` AS `dateDebut`,`hc`.`dateFin` AS `dateFin`,`hc`.`etat` AS `etat`,`e`.`nomDepartement` AS `nomDepartement`,`e`.`idDepartement` AS `idDepartement`,`e`.`nomPoste` AS `nomPoste`,month(`hc`.`dateDebut`) AS `mois`,year(`hc`.`dateDebut`) AS `annee` from (`historiqueconge` `hc` join `employe_view` `e` on(`e`.`idEmploye` = `hc`.`idEmp`)) where `hc`.`etat` = 1 and (`hc`.`dateDebut` >= current_timestamp() or `hc`.`dateFin` >= current_timestamp()) group by month(`hc`.`dateDebut`),year(`hc`.`dateDebut`),`e`.`idEmploye`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `congepris`
--

/*!50001 DROP TABLE IF EXISTS `congepris`*/;
/*!50001 DROP VIEW IF EXISTS `congepris`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `congepris` AS (select `historiqueconge`.`id` AS `id`,`historiqueconge`.`idEmp` AS `idEmp`,sum(timestampdiff(HOUR,`historiqueconge`.`dateDebut`,`historiqueconge`.`dateFin`)) AS `nbJours` from `historiqueconge` where timestampdiff(YEAR,`historiqueconge`.`dateDebut`,current_timestamp()) <= 3 and `historiqueconge`.`etat` = 1 group by `historiqueconge`.`idEmp`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `demandeencours`
--

/*!50001 DROP TABLE IF EXISTS `demandeencours`*/;
/*!50001 DROP VIEW IF EXISTS `demandeencours`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `demandeencours` AS (select `hc`.`id` AS `id`,`hc`.`idEmp` AS `idEmp`,`mc`.`description` AS `description`,cast(`hc`.`dateDebut` as date) AS `dateDebut`,cast(`hc`.`dateFin` as date) AS `dateFin`,timestampdiff(DAY,`hc`.`dateDebut`,`hc`.`dateFin`) AS `demande`,`ec`.`cumule` AS `cumule`,`ec`.`pris` AS `pris`,`ec`.`restant` AS `restant`,`ec`.`remarque` AS `remarque`,`e`.`nomDepartement` AS `nomDepartement`,`e`.`idDepartement` AS `idDepartement`,`e`.`nomPoste` AS `nomPoste` from (((`historiqueconge` `hc` join `etatconge` `ec` on(`hc`.`idEmp` = `ec`.`idEmploye`)) left join `motifconge` `mc` on(`mc`.`id` = `hc`.`motif`)) join `employe_view` `e` on(`e`.`idEmploye` = `hc`.`idEmp`)) where `hc`.`etat` = 0) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `empanciente`
--

/*!50001 DROP TABLE IF EXISTS `empanciente`*/;
/*!50001 DROP VIEW IF EXISTS `empanciente`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `empanciente` AS select `e`.`idEmploye` AS `idEmploye`,`e`.`idPersonne` AS `idPersonne`,`e`.`idPoste` AS `idPoste`,`e`.`idSalaire` AS `idSalaire`,`e`.`dateEmbauche` AS `dateEmbauche`,timestampdiff(YEAR,`e`.`dateEmbauche`,current_timestamp()) AS `years` from `employe` `e` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `employe_view`
--

/*!50001 DROP TABLE IF EXISTS `employe_view`*/;
/*!50001 DROP VIEW IF EXISTS `employe_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `employe_view` AS select `personne`.`idPersonne` AS `idPersonne`,`personne`.`nom` AS `nom`,`personne`.`prenom` AS `prenom`,`personne`.`dtn` AS `dtn`,`personne`.`sexe` AS `sexe`,`personne`.`adresse` AS `adresse`,`personne`.`distance` AS `distance`,`personne`.`matrimonial` AS `matrimonial`,`personne`.`idContact` AS `idContact`,`employe`.`idEmploye` AS `idEmploye`,`employe`.`idSalaire` AS `idSalaire`,`employe`.`dateEmbauche` AS `dateEmbauche`,`departement`.`nom` AS `nomDepartement`,`departement`.`idDepartement` AS `idDepartement`,`departement`.`descri` AS `descriDepartement`,`salaire`.`montant` AS `montantSalaire`,`salaire`.`dateMiseEnPlace` AS `dateMiseEnPlace`,`poste`.`nom` AS `nomPoste`,`poste`.`idPoste` AS `idPoste`,`poste`.`descri` AS `descriPoste` from ((((`personne` join `employe` on(`employe`.`idPersonne` = `personne`.`idPersonne`)) join `poste` on(`employe`.`idPoste` = `poste`.`idPoste`)) join `departement` on(`departement`.`idDepartement` = `poste`.`idDepartement`)) join `salaire` on(`salaire`.`idEmploye` = `employe`.`idSalaire`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `employeconge`
--

/*!50001 DROP TABLE IF EXISTS `employeconge`*/;
/*!50001 DROP VIEW IF EXISTS `employeconge`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `employeconge` AS select `hc`.`id` AS `id`,`hc`.`idEmp` AS `idEmp`,`hc`.`motif` AS `motif`,`hc`.`dateDebut` AS `dateDebut`,`hc`.`dateFin` AS `dateFin`,`hc`.`etat` AS `etat`,`motifconge`.`description` AS `description`,`motifconge`.`deductibilite` AS `deductibilite`,`e`.`idPoste` AS `idPoste`,`e`.`idSalaire` AS `idSalaire`,`e`.`dateEmbauche` AS `dateEmbauche`,`p`.`nom` AS `nom`,`p`.`prenom` AS `prenom`,timestampdiff(HOUR,`hc`.`dateDebut`,`hc`.`dateFin`) AS `NbrHeure` from (((`historiqueconge` `hc` join `motifconge` on(`hc`.`motif` = `motifconge`.`id`)) join `employe` `e` on(`hc`.`idEmp` = `e`.`idEmploye`)) join `personne` `p` on(`e`.`idPersonne` = `p`.`idPersonne`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `etatconge`
--

/*!50001 DROP TABLE IF EXISTS `etatconge`*/;
/*!50001 DROP VIEW IF EXISTS `etatconge`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `etatconge` AS (select `ea`.`idEmploye` AS `idEmploye`,`ea`.`dateEmbauche` AS `dateEmbauche`,`ea`.`years` AS `anneeTravail`,`ea`.`years` MOD 4 * 30 * 24 AS `cumule`,case when `cp`.`nbJours` is null then 0 else `cp`.`nbJours` end AS `pris`,case when `cp`.`nbJours` is null then 0 when `hm`.`heureMoins` is null then `ea`.`years` MOD 4 * 30 * 24 - `cp`.`nbJours` else `ea`.`years` MOD 4 * 30 * 24 - `cp`.`nbJours` - `hm`.`heureMoins` end AS `restant`,case when (`ea`.`years` MOD 4 * 30 * 24 = 0 and `ea`.`years` > 0) then 'conge expire' when (`ea`.`years` MOD 4 * 30 * 24 = 0 and `ea`.`years` = 0) then 'travail depuis moins d\'un an' when `hm`.`remarque` is not null then `hm`.`remarque` else '' end AS `remarque` from ((`empanciente` `ea` left join `congepris` `cp` on(`ea`.`idEmploye` = `cp`.`idEmp`)) left join `heureenmoins` `hm` on(`hm`.`idEmploye` = `ea`.`idEmploye`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `filtre_view`
--

/*!50001 DROP TABLE IF EXISTS `filtre_view`*/;
/*!50001 DROP VIEW IF EXISTS `filtre_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `filtre_view` AS select `personne`.`idPersonne` AS `idPersonne`,`personne`.`nom` AS `nomPersonne`,year(current_timestamp()) - substr(`personne`.`dtn`,1,4) AS `age`,`personne`.`sexe` AS `sexe`,`personne`.`distance` AS `distance`,`personne`.`matrimonial` AS `matrimonial`,`cv_langue`.`niveau` AS `niveau`,`langue`.`titre` AS `titreLangue`,`diplome`.`titre` AS `titreDiplome`,`grade`.`titre` AS `titreGrade`,`domaine`.`titre` AS `titreDomaine`,`experience`.`poste` AS `nomPosteExperience`,`experience`.`dateEntre` AS `dateEntreExperience`,`experience`.`dateSortie` AS `dateSortieExperience`,`poste`.`nom` AS `nomPoste`,`departement`.`nom` AS `nomDepartement` from (((((((((((`cv` join `personne` on(`personne`.`idPersonne` = `cv`.`idPersonne`)) join `cv_langue` on(`cv_langue`.`idCV` = `cv`.`idCV`)) join `langue` on(`langue`.`idLangue` = `cv_langue`.`idLangue`)) join `diplome` on(`diplome`.`idCV` = `cv`.`idCV`)) join `grade` on(`diplome`.`idGrade` = `grade`.`idGrade`)) join `experience` on(`experience`.`idCV` = `cv`.`idCV`)) join `experience_domaine` on(`experience_domaine`.`idExperience` = `experience`.`idExperience`)) join `domaine` on(`domaine`.`idDomaine` = `experience_domaine`.`idDomaine`)) join `cv_poste` on(`cv_poste`.`idCV` = `cv`.`idCV`)) join `poste` on(`poste`.`idPoste` = `cv_poste`.`idPoste`)) join `departement` on(`departement`.`idDepartement` = `poste`.`idDepartement`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `grillesalairemin`
--

/*!50001 DROP TABLE IF EXISTS `grillesalairemin`*/;
/*!50001 DROP VIEW IF EXISTS `grillesalairemin`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `grillesalairemin` AS select `categorieprofessionnel`.`Categorie` AS `Categorie`,`gradeprofessionnel`.`reference` AS `GradeProfessionnel`,`grillesalaire`.`SalaireMin` AS `salaireMin`,`grillesalaire`.`GradeProfessionnel` AS `idGrad`,`grillesalaire`.`categorie` AS `idcat` from ((`categorieprofessionnel` join `grillesalaire` on(`categorieprofessionnel`.`idcat` = `grillesalaire`.`categorie`)) join `gradeprofessionnel` on(`gradeprofessionnel`.`idGrad` = `grillesalaire`.`GradeProfessionnel`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `heureenmoins`
--

/*!50001 DROP TABLE IF EXISTS `heureenmoins`*/;
/*!50001 DROP VIEW IF EXISTS `heureenmoins`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `heureenmoins` AS (select `ea`.`idEmploye` AS `idEmploye`,sum(`rc`.`heure`) AS `heureMoins`,'heure de travail pris sur conge' AS `remarque` from (`retraitconge` `rc` join `empanciente` `ea` on(`ea`.`idEmploye` = `rc`.`idEmp`)) where timestampdiff(YEAR,`rc`.`dateDiminution`,current_timestamp()) <= `ea`.`years` MOD 4) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `listebulletin`
--

/*!50001 DROP TABLE IF EXISTS `listebulletin`*/;
/*!50001 DROP VIEW IF EXISTS `listebulletin`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `listebulletin` AS select `e`.`idEmploye` AS `idEmploye`,`p`.`nom` AS `nom`,`p`.`prenom` AS `prenom`,`f`.`idFichePaie` AS `idFichePaie`,`f`.`dateMiseEnPlace` AS `dateMiseEnPlace`,`f`.`net` AS `net` from ((`employe` `e` join `personne` `p` on(`e`.`idPersonne` = `p`.`idPersonne`)) join `fichepaie` `f` on(`e`.`idEmploye` = `f`.`idEmploye`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-19 18:35:09

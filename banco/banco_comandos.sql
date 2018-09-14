-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: banco_comandos
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.16.04.1

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
-- Table structure for table `comands`
--

DROP TABLE IF EXISTS `comands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `devices_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comands_devices1_idx` (`devices_id`),
  CONSTRAINT `fk_comands_devices1` FOREIGN KEY (`devices_id`) REFERENCES `devices` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comands`
--

LOCK TABLES `comands` WRITE;
/*!40000 ALTER TABLE `comands` DISABLE KEYS */;
/*!40000 ALTER TABLE `comands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comodos`
--

DROP TABLE IF EXISTS `comodos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comodos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `id_places` int(11) NOT NULL,
  `nick_mqtt` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nick_mqtt_UNIQUE` (`nick_mqtt`),
  KEY `fk_comodos_places_idx` (`id_places`),
  CONSTRAINT `fk_comodos_places` FOREIGN KEY (`id_places`) REFERENCES `places` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comodos`
--

LOCK TABLES `comodos` WRITE;
/*!40000 ALTER TABLE `comodos` DISABLE KEYS */;
/*!40000 ALTER TABLE `comodos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comodos_device`
--

DROP TABLE IF EXISTS `comodos_device`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comodos_device` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `devices_id` int(11) NOT NULL,
  `comodos_id` int(11) NOT NULL,
  `topic` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comodos_device_devices1_idx` (`devices_id`),
  KEY `fk_comodos_device_comodos1_idx` (`comodos_id`),
  CONSTRAINT `fk_comodos_device_comodos1` FOREIGN KEY (`comodos_id`) REFERENCES `comodos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_comodos_device_devices1` FOREIGN KEY (`devices_id`) REFERENCES `devices` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comodos_device`
--

LOCK TABLES `comodos_device` WRITE;
/*!40000 ALTER TABLE `comodos_device` DISABLE KEYS */;
/*!40000 ALTER TABLE `comodos_device` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `controladores`
--

DROP TABLE IF EXISTS `controladores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `controladores` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '		',
  `ip_address` varchar(45) DEFAULT NULL,
  `comodos_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `places_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_controladores_comodos1_idx` (`comodos_id`),
  KEY `fk_controladores_places1_idx` (`places_id`),
  CONSTRAINT `fk_controladores_comodos1` FOREIGN KEY (`comodos_id`) REFERENCES `comodos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_controladores_places` FOREIGN KEY (`places_id`) REFERENCES `places` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `controladores`
--

LOCK TABLES `controladores` WRITE;
/*!40000 ALTER TABLE `controladores` DISABLE KEYS */;
/*!40000 ALTER TABLE `controladores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `devices`
--

DROP TABLE IF EXISTS `devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '	',
  `name` varchar(255) DEFAULT NULL,
  `mark` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `interface` enum('ircode','serial','url') DEFAULT NULL,
  `nick_mqtt` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nick_mqtt_UNIQUE` (`nick_mqtt`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `devices`
--

LOCK TABLES `devices` WRITE;
/*!40000 ALTER TABLE `devices` DISABLE KEYS */;
/*!40000 ALTER TABLE `devices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ircomands`
--

DROP TABLE IF EXISTS `ircomands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ircomands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` text,
  `protocols_id` int(11) DEFAULT NULL,
  `comands_id` int(11) NOT NULL,
  `bits` int(11) DEFAULT NULL,
  `tam_rawdata` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ircomands_comands1_idx` (`comands_id`),
  KEY `fk_ircomands_protocols_idx` (`protocols_id`),
  CONSTRAINT `fk_ircomands_comands1` FOREIGN KEY (`comands_id`) REFERENCES `comands` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ircomands_protocols` FOREIGN KEY (`protocols_id`) REFERENCES `irprotocols` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ircomands`
--

LOCK TABLES `ircomands` WRITE;
/*!40000 ALTER TABLE `ircomands` DISABLE KEYS */;
/*!40000 ALTER TABLE `ircomands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `irprotocols`
--

DROP TABLE IF EXISTS `irprotocols`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `irprotocols` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `irprotocols`
--

LOCK TABLES `irprotocols` WRITE;
/*!40000 ALTER TABLE `irprotocols` DISABLE KEYS */;
INSERT INTO `irprotocols` VALUES (2,'NEC'),(5,'RAW'),(3,'RC5'),(4,'RC6'),(1,'SAMSUNG');
/*!40000 ALTER TABLE `irprotocols` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_action`
--

DROP TABLE IF EXISTS `log_action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `comands_id` int(11) NOT NULL,
  `devices_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_log_action_user1_idx` (`user_id`),
  KEY `fk_log_action_comands1_idx` (`comands_id`),
  KEY `fk_log_action_devices_idx` (`devices_id`),
  CONSTRAINT `fk_log_action_comands1` FOREIGN KEY (`comands_id`) REFERENCES `comands` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_log_action_devices` FOREIGN KEY (`devices_id`) REFERENCES `devices` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_log_action_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_action`
--

LOCK TABLES `log_action` WRITE;
/*!40000 ALTER TABLE `log_action` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_action` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `places`
--

DROP TABLE IF EXISTS `places`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `floor` int(4) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `nick_mqtt` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nick_mqtt_UNIQUE` (`nick_mqtt`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `places`
--

LOCK TABLES `places` WRITE;
/*!40000 ALTER TABLE `places` DISABLE KEYS */;
/*!40000 ALTER TABLE `places` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `places_user`
--

DROP TABLE IF EXISTS `places_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `places_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_places` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_place_user_user1_idx` (`id_user`),
  KEY `fk_place_user_places1_idx` (`id_places`),
  CONSTRAINT `fk_place_user_places1` FOREIGN KEY (`id_places`) REFERENCES `places` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_place_user_user1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `places_user`
--

LOCK TABLES `places_user` WRITE;
/*!40000 ALTER TABLE `places_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `places_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `srcomands`
--

DROP TABLE IF EXISTS `srcomands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `srcomands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(45) DEFAULT NULL,
  `comands_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_srcomands_comands1_idx` (`comands_id`),
  CONSTRAINT `fk_srcomands_comands1` FOREIGN KEY (`comands_id`) REFERENCES `comands` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `srcomands`
--

LOCK TABLES `srcomands` WRITE;
/*!40000 ALTER TABLE `srcomands` DISABLE KEYS */;
/*!40000 ALTER TABLE `srcomands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `urlcomands`
--

DROP TABLE IF EXISTS `urlcomands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `urlcomands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(45) DEFAULT NULL,
  `comands_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_urlcomands_comands1_idx` (`comands_id`),
  CONSTRAINT `fk_urlcomands_comands1` FOREIGN KEY (`comands_id`) REFERENCES `comands` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `urlcomands`
--

LOCK TABLES `urlcomands` WRITE;
/*!40000 ALTER TABLE `urlcomands` DISABLE KEYS */;
/*!40000 ALTER TABLE `urlcomands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `desname` varchar(255) DEFAULT NULL,
  `typeUser` enum('admin','user') DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dtregister` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `telefone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','Administrador','admin','$2y$12$FBSBEJK5n/oAaQtZV.E7iOhNDGnCST7Hoze3ySlMVsIEbjnF5PfK.','admin@admin.com',NULL,'');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'banco_comandos'
--

--
-- Dumping routines for database 'banco_comandos'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_insert_command_ir` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_command_ir`(
pname VARCHAR(45),
pdevices_id INT(11),
pvalue TEXT,
pprotocol INT(11),
pbits INT(11),
ptam_rawdata INT(11)
)
BEGIN
	DECLARE pcomands_id INT(11);

	INSERT INTO comands(name,devices_id)
    VALUES (pname,pdevices_id);
	
	SET pcomands_id = LAST_INSERT_ID();
    
    INSERT INTO ircomands(value,protocols_id,comands_id,bits,tam_rawdata)
    VALUES (pvalue,pprotocol,pcomands_id,pbits,ptam_rawdata);



END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-14  1:14:00

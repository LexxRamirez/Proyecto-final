-- MySQL dump 10.13  Distrib 5.5.49, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: db_escuela
-- ------------------------------------------------------
-- Server version	5.5.49-0+deb8u1

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
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumnos` (
  `id_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `anho` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `matricula` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nie` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `anho_ultimo_grado` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `minicipio_ultimo_grado` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `codigo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `discapacidad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `estudio_especial` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `recidencia` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `edad` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `id_grado` int(11) NOT NULL,
  `id_datos` int(11) DEFAULT NULL,
  `id_eco` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_alumno`),
  KEY `id_grado` (`id_grado`),
  KEY `id_datos` (`id_datos`),
  KEY `id_eco` (`id_eco`),
  CONSTRAINT `id_datos` FOREIGN KEY (`id_datos`) REFERENCES `otros_datos` (`id_datos`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_eco` FOREIGN KEY (`id_eco`) REFERENCES `situacion_economica` (`id_eco`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_grado_fk` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`id_grado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` VALUES (2,'2016','1234-34','Marcela Perez','5678','2015','San Michel','1217','nell','lol','urbana','23/12/2015','45',6,2,2),(3,'','','Jose Jose Romero','','','','','','','','','',1,3,3),(4,'','','Juan Prez Rodriges','','','','','','','','','',1,4,4),(5,'','','Jose Miguel Martinez','','','','','','','','','',1,5,5),(6,'2015','3995','Marcos Ayala','394735643','2015','San Michel','6455','ninguna','nada','rural','23/12/1999','17',2,6,6);
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docentes`
--

DROP TABLE IF EXISTS `docentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `docentes` (
  `id_docente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `dui` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_grado` int(11) NOT NULL,
  PRIMARY KEY (`id_docente`),
  KEY `id_grado` (`id_grado`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docentes`
--

LOCK TABLES `docentes` WRITE;
/*!40000 ALTER TABLE `docentes` DISABLE KEYS */;
INSERT INTO `docentes` VALUES (1,'Marlon Garcias','Gusz','Kame House','77454545','1234567890','02b1be0d48924c327124732726097157',1),(3,'Mario Lopez','Mario','Rook Bat','73475898','747392834','02b1be0d48924c327124',3),(8,'Romes Gomes','Romero','La Palmera','72737474','1248595994','e10adc3949ba59abbe56e057f20f883e',4);
/*!40000 ALTER TABLE `docentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grado`
--

DROP TABLE IF EXISTS `grado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grado` (
  `id_grado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_grado` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_grado`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grado`
--

LOCK TABLES `grado` WRITE;
/*!40000 ALTER TABLE `grado` DISABLE KEYS */;
INSERT INTO `grado` VALUES (1,'Primero'),(2,'Segundo'),(3,'Tercero'),(4,'Cuato'),(5,'Quinto'),(6,'Sexto'),(7,'Septimo'),(8,'Octavo'),(9,'Noveno');
/*!40000 ALTER TABLE `grado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia`
--

DROP TABLE IF EXISTS `materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL AUTO_INCREMENT,
  `materia` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_materia`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` VALUES (1,'Matematicas'),(2,'Lenguaje'),(3,'Sociales'),(4,'Ciencias'),(5,'Ingles'),(6,'Informatica'),(7,'Educacion fisica');
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notas`
--

DROP TABLE IF EXISTS `notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_materia` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `periodo1` varchar(24) COLLATE utf8_spanish_ci NOT NULL,
  `periodo2` varchar(24) COLLATE utf8_spanish_ci NOT NULL,
  `periodo3` varchar(24) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_matera` (`id_materia`),
  KEY `id_grado` (`id_grado`),
  KEY `id_docente` (`id_docente`),
  KEY `id_alumno` (`id_alumno`),
  CONSTRAINT `id_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_docente` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id_docente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_grado` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`id_grado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_materia` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notas`
--

LOCK TABLES `notas` WRITE;
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
INSERT INTO `notas` VALUES (2,2,1,1,4,'5.66-6.34-7.12-2.4','9.0-10-9.82-1.2','5.66-6.34-7.12-5.5'),(24,5,1,1,5,'9-9-9-9','9-9-9-9','9-9-9-9'),(26,3,6,1,2,'7-7-8-2.60','4-4-3-1.25','8-8-8-2.40'),(27,3,1,1,3,'8-8-7-2.65','8-7-5-2.25','10-10-10-3.00'),(28,3,1,1,4,'7-5-4-1.80','5-8-5-2.05','8-8-8-2.40'),(29,3,1,1,5,'4-4-5-1.55','8-6-8-2.60','9-9-9-2.70'),(34,1,6,1,2,'9-9-9-3.15','7-7-7-2.45','8-8-8-2.40'),(35,1,1,1,3,'8-8-8-2.80','8-8-8-2.80','9-9-9-2.70'),(36,1,1,1,4,'7-7-7-2.45','---','---'),(37,1,1,1,5,'6-6-6-2.10','---','---'),(42,2,6,1,2,'9-9-9-3.15','8-7-9-2.85','7-9-9-2.50'),(43,1,2,1,6,'7-7-7-2.45','8-8-8-2.80','9-9-9-2.70');
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `otros_datos`
--

DROP TABLE IF EXISTS `otros_datos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `otros_datos` (
  `id_datos` int(11) NOT NULL AUTO_INCREMENT,
  `repite` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `parbularia` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `sobredad` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `trabajo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `vive` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `enfermedad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `vacunas` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `encargado` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `dui` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `tel_casa` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `tel_cel` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_datos`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `otros_datos`
--

LOCK TABLES `otros_datos` WRITE;
/*!40000 ALTER TABLE `otros_datos` DISABLE KEYS */;
INSERT INTO `otros_datos` VALUES (1,'si','no',' si','limpia botas','mama','ninguna','no','Jose Marvin','09098987','2345345','345356'),(2,'si','no',' si','limpia botas','mama','ninguna','no','Jose Marvin','09098987','2345345','345356'),(3,'si','no',' si','limpia botas','mama','ninguna','no','Jose Marvin','09098987','2345345','345356'),(4,'si','no',' si','limpia botas','mama','ninguna','no','Jose Marvin','09098987','2345345','345356'),(5,'si','no',' si','limpia botas','mama','ninguna','no','Jose Marvin','09098987','2345345','345356'),(6,'si','si','no','Venta de naranjas','papa','ninguna','no','Jose','3564532','2345345','61423456');
/*!40000 ALTER TABLE `otros_datos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `situacion_economica`
--

DROP TABLE IF EXISTS `situacion_economica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `situacion_economica` (
  `id_eco` int(11) NOT NULL AUTO_INCREMENT,
  `ingreso` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `vivienda` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `embarazo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `parto` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Nmadre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `edadM` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `sabeM` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Npadre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `edadP` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Psabe` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Nhermanos` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Nhermanas` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `comportamiento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `documentos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_eco`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `situacion_economica`
--

LOCK TABLES `situacion_economica` WRITE;
/*!40000 ALTER TABLE `situacion_economica` DISABLE KEYS */;
INSERT INTO `situacion_economica` VALUES (1,'','','','','','','','','','','','','',''),(2,'','','','','','','','','','','','','',''),(3,'','','','','','','','','','','','','',''),(4,'','','','','','','','','','','','','',''),(5,'','','','','','','','','','','','','',''),(6,'padre','','Normal','Anormal','Julisa','45','leer y escribir','Julio','48','leer y escribir','2','2','Timido ,Respetuoso ,Responsable , Fin','Certificado Original ,DUI ,Constancia de Conducta ');
/*!40000 ALTER TABLE `situacion_economica` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-19  1:49:47

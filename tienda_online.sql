CREATE DATABASE  IF NOT EXISTS `tienda_online` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `tienda_online`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: tienda_online
-- ------------------------------------------------------
-- Server version	5.6.26

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
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `Codigo` int(11) NOT NULL,
  `Nombre` varchar(450) DEFAULT NULL,
  `Descripcion` text,
  `Anuncio` text,
  `Oculto` char(1) DEFAULT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Botas','Fabricadas en valverde del camino , botas de cuero tanto como para equitación como para trabajadores de campo, etc.',NULL,'F'),(2,'Zapatos','Especie Canina',NULL,'F'),(3,'Complemetos','Especie Felina',NULL,'F'),(4,'Calzado de niño','Especie Reptil',NULL,'F'),(5,'Peces','Entorno Acuatico',NULL,'F');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compradores`
--

DROP TABLE IF EXISTS `compradores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compradores` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `DNI` varchar(10) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Nombre_usuario` varchar(45) NOT NULL,
  `Contrasena` varchar(120) NOT NULL,
  `Correo` varchar(45) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `CP` varchar(45) NOT NULL,
  `Provincias` varchar(45) NOT NULL,
  `Borrado` char(1) DEFAULT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compradores`
--

LOCK TABLES `compradores` WRITE;
/*!40000 ALTER TABLE `compradores` DISABLE KEYS */;
INSERT INTO `compradores` VALUES (1,'44240482-M','Juan Rodriguez Becerro','JuanRo','1234','adriangirolmontes@gmail.com','El cerro, 4','21863','Huelva','N'),(6,'44240482-M','Adrian Girol Montes Modificado','adriangirolmontes','12345','adriangirolmontes@gmail.com','Don francisco Romero 42','21600','Huelva',NULL),(7,'44444222-D','Borja','borja','12345','borjaramos7@gmail.com','Josefita 56','23401','Huelva',NULL);
/*!40000 ALTER TABLE `compradores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lineas_de_pedido`
--

DROP TABLE IF EXISTS `lineas_de_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lineas_de_pedido` (
  `Codigo_linea` int(11) NOT NULL AUTO_INCREMENT,
  `Productos_Codigo` int(11) NOT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Importe` decimal(7,2) DEFAULT NULL,
  `Pedidos_codigo_pedido` int(11) NOT NULL,
  PRIMARY KEY (`Codigo_linea`),
  KEY `fk_Productos_has_Pedidos_Productos1_idx` (`Productos_Codigo`),
  KEY `fk_Lineas_de_pedido_Pedidos1_idx` (`Pedidos_codigo_pedido`),
  CONSTRAINT `fk_Productos_has_Pedidos_Productos1` FOREIGN KEY (`Productos_Codigo`) REFERENCES `productos` (`Codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lineas_de_pedido`
--

LOCK TABLES `lineas_de_pedido` WRITE;
/*!40000 ALTER TABLE `lineas_de_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `lineas_de_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `codigo_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `Estado` char(2) DEFAULT NULL,
  `Compradores_Codigo` int(11) NOT NULL,
  PRIMARY KEY (`codigo_pedido`),
  KEY `fk_Pedidos_Compradores1_idx` (`Compradores_Codigo`),
  CONSTRAINT `fk_Pedidos_Compradores1` FOREIGN KEY (`Compradores_Codigo`) REFERENCES `compradores` (`Codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `Nombre` varchar(265) NOT NULL,
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `Precio` decimal(7,2) DEFAULT NULL,
  `Descuento_aplicable` decimal(7,2) DEFAULT NULL,
  `Imagen_Producto` varchar(500) DEFAULT NULL,
  `IVA` int(11) DEFAULT NULL,
  `Descripcion` text,
  `Anuncio` text,
  `Categoria_Codigo` int(11) NOT NULL,
  `Stock` int(11) DEFAULT NULL,
  `Destacado` char(1) DEFAULT NULL,
  `Fecha_ini_destacado` date DEFAULT NULL,
  `Fecha_fin_destacado` date DEFAULT NULL,
  ` Oculto` char(1) DEFAULT NULL,
  PRIMARY KEY (`Codigo`),
  UNIQUE KEY `Codigo_UNIQUE` (`Codigo`),
  KEY `fk_Productos_Categoria_idx` (`Categoria_Codigo`),
  CONSTRAINT `fk_Productos_Categoria` FOREIGN KEY (`Categoria_Codigo`) REFERENCES `categorias` (`Codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES ('Pulsera España',9,120.00,NULL,'asset/plantilla/img/prueba.jpg',21,'Pulsera de cuero con la bandera de españa bordada a mano.',NULL,3,0,'S',NULL,NULL,NULL),('Mascota Montera',10,256.00,NULL,'asset/plantilla/img/chino.jpg',21,'Ideal para montar a caballo o paseos en epocas de otoño y primavera',NULL,3,0,'S',NULL,NULL,NULL),('Wing Tip',11,84.00,NULL,'asset/plantilla/img/abisino.jpg',21,'Este zapato de origen Ingles es caracteristico por su acpecto elegante.',NULL,2,0,'S',NULL,NULL,NULL),('Cinturon de Cuero',12,127.00,NULL,'asset/plantilla/img/maine.jpg',21,'Cinturon de trenzas de cuero.',NULL,3,5,'N',NULL,NULL,NULL),('Montura serrana',13,276.00,NULL,'asset/plantilla/img/ragdoll.jpg',21,'Montura para caballo de tipo serrana comoda para viajes largos.',NULL,3,1,'N',NULL,NULL,NULL),('Montura Rociera',14,81.00,NULL,'asset/plantilla/img/bengala.jpg',21,'Montura para romerias , elegante y de cuero negro Canadiense',NULL,3,9,'N',NULL,NULL,NULL),('Derby',15,246.00,NULL,'asset/plantilla/img/bulldog.jpg',21,'Zapato de la gama GB perfecto apra cenas elegantes.',NULL,2,2,'S',NULL,NULL,NULL),('Loafer',16,186.00,NULL,'asset/plantilla/img/caniche.jpg',21,'Zapato del modelo GB comodo y de caracter sueva ideal para ejecutivos.',NULL,2,1,'S',NULL,NULL,NULL),('Chelsea',17,22.00,NULL,'asset/plantilla/img/jilguero.jpg',21,'Bota de vestir, diseño Ingles de la Gama GB',NULL,1,12,'S',NULL,NULL,NULL),('Oxford',18,96.86,NULL,'asset/plantilla/img/Yorkside.jpg',21,'Zapatos elegante, de suela baja . De la Gama GB',NULL,2,12,'S',NULL,NULL,NULL),('Pastor Belga',19,206.08,NULL,'asset/plantilla/img/PastorBelga.jpg',21,'Perro de tamaño grande, propio para cuidar grandes extensiones de terreno, adaptados al frío.',NULL,2,2,'N',NULL,NULL,NULL),('Agaporni',20,27.00,NULL,'asset/plantilla/img/Agaporni.jpg',21,'Ave exotica  de tamaño pequeño, muy cariñosa y inteligente',NULL,1,8,'S',NULL,NULL,NULL),('Cacatua',21,75.00,NULL,'asset/plantilla/img/Cacatua.jpg',21,'Ave exotica  de tamaño mediano, muy cariñosa y inteligente',NULL,1,12,'N',NULL,NULL,NULL),('Loro Yaco',22,75.00,NULL,'asset/plantilla/img/Yaco.jpg',21,'Ave exotica  de tamaño Grande, charlatana y inteligente',NULL,1,12,'N',NULL,NULL,NULL),('Iguana',23,40.48,NULL,'asset/plantilla/img/Iguana.jpg',NULL,'Reptil verde, come insectos. De mediano tamaño',NULL,4,6,'S',NULL,NULL,NULL),('Iguana Crestada de Fiyi',24,82.48,NULL,'asset/plantilla/img/IguanaFiyi.jpg',NULL,'Reptil natural del caribe de origen exotico, come insectos. De mediano tamaño',NULL,4,6,'S',NULL,NULL,NULL),('Payaso',25,82.56,NULL,'asset/plantilla/img/Payaso.jpg',NULL,'Pez exotico de agua salada, de colores llamativos.',NULL,5,2,'N',NULL,NULL,NULL),('Globo',26,45.56,NULL,'asset/plantilla/img/Globo.jpg',NULL,'Pez exotico de agua salada,se hincha cuando se siente amenazado',NULL,5,2,'S',NULL,NULL,NULL);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-27 16:48:08

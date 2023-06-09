-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: ibook
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
-- Table structure for table `book_params`
--

DROP TABLE IF EXISTS `book_params`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book_params` (
  `id` varchar(255) NOT NULL,
  `namee` varchar(255) NOT NULL,
  `descriptionn` varchar(255) NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_params`
--

LOCK TABLES `book_params` WRITE;
/*!40000 ALTER TABLE `book_params` DISABLE KEYS */;
INSERT INTO `book_params` VALUES ('01','Теория всего','Книга Ствена Хокинга о вопросах Вселенной',430),('02','Чёрные дыры','Работа Хокинга о черных дырах и других явлениях',430),('03','Лига справедливости','Комикс с лучшими героями DC. Бестеллер мира комиксов',430),('04','Бэтмен: Тихо!','Один из самых захватывающих иллюстрированных детективов',1100),('05','Человек паук','Новые приключения уже излюбленного героя - Человека-Паука!',670),('06','Краткая история времени','Автор книги поможет вам в этом разобраться в природе времени',430),('07','Дубровский','Произведение Пушкина, которое покорило многих читателей',390),('08','Братья Карамазовы','Одно из лучших произведений Достоевского',450),('09','Обломов','Книга, которая поднимает множество философских тем',450),('10','Injustice','Легендарный комикс по игре Injustice из мира DC',990),('11','Флэш','Комикс об одном из самых быстрых людей на планете',690),('12','Герой нашего времени','Одно из культовых произведений российской классики',370),('13','Горе от ума','Выдающееся произведение Грибоедова из ряда \"Я и они\"',360),('14','Мёртвые души','Произведение Гоголя, являющееся российской классикой',380);
/*!40000 ALTER TABLE `book_params` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-09 23:25:44

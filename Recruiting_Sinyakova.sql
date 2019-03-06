-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.25


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema company
--

CREATE DATABASE IF NOT EXISTS company;
USE company;

--
-- Temporary table structure for view `maxvac`
--
DROP TABLE IF EXISTS `maxvac`;
DROP VIEW IF EXISTS `maxvac`;
CREATE TABLE `maxvac` (
  `Vacancy_id` int(10) unsigned,
  `Count_inter` bigint(21)
);

--
-- Definition of table `candidate`
--

DROP TABLE IF EXISTS `candidate`;
CREATE TABLE `candidate` (
  `Instance_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Gender` varchar(5) NOT NULL,
  `Can_surname` varchar(45) NOT NULL,
  `Can_address` varchar(45) NOT NULL,
  `Age` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Instance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidate`
--

/*!40000 ALTER TABLE `candidate` DISABLE KEYS */;
INSERT INTO `candidate` (`Instance_id`,`Gender`,`Can_surname`,`Can_address`,`Age`) VALUES 
 (1,'м','Антонов','г. Гулькевичи, ул. Академическая, дом 73',34),
 (2,'м','Наумов','г. Черноголовка, ул. Барышиха, дом 47',41),
 (3,'ж','Степанова','г. Славинск, ул. Московская, дом 67',23),
 (4,'ж','Ушакова','г. Окуловка, ул. Лидии Базановой, дом 79',36),
 (5,'ж','Фёдорова','г. Тугаев, ул. Беговая 2-я, дом 9, квартира 2',27),
 (6,'м','Веселков','г. Дудинка, ул. Бауманская, дом 92',56),
 (7,'м','Кудрявцев','г. Кош-Агач, ул. Бакунина, дом 12, квартира 1',23),
 (8,'м','Кочетков','г. Вожега, ул. Беговая 3-я, дом 92',43),
 (9,'м','Кузьмин','г. Енисейск, ул. Сталина, дом 42, квартира 13',35),
 (10,'ж','Богданова','г. Старощербиновская, ул. 15 лет октября',51),
 (11,'ж','Васильева','г. Гатчина, ул. Сталина, дом 91, квартира 46',26),
 (12,'ж','Кондратьева','г. Жаворонково, ул. Авангардная, дом 10, квар',42),
 (13,'м','Марков','г. Оса, ул. Дарвина, дом 90, квартира 200',35),
 (14,'ж','Синякова','Москва',22),
 (15,'м','Иванов','Москва',23);
/*!40000 ALTER TABLE `candidate` ENABLE KEYS */;


--
-- Definition of table `empl_schedule`
--

DROP TABLE IF EXISTS `empl_schedule`;
CREATE TABLE `empl_schedule` (
  `Id_sch` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Int_date` date NOT NULL,
  `Code` int(10) unsigned NOT NULL,
  `Vacancy_id` int(10) unsigned NOT NULL,
  `Instance_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`Id_sch`),
  KEY `FK_Empl_schedule_2` (`Vacancy_id`),
  KEY `FK_Empl_schedule_3` (`Instance_id`),
  KEY `FK_Empl_schedule_1` (`Code`),
  CONSTRAINT `FK_Empl_schedule_2` FOREIGN KEY (`Vacancy_id`) REFERENCES `vacancy` (`Vacancy_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `empl_schedule`
--

/*!40000 ALTER TABLE `empl_schedule` DISABLE KEYS */;
INSERT INTO `empl_schedule` (`Id_sch`,`Int_date`,`Code`,`Vacancy_id`,`Instance_id`) VALUES 
 (1,'2018-12-05',3,10,NULL),
 (2,'2018-12-07',3,10,NULL),
 (3,'2018-12-07',3,3,NULL),
 (4,'2018-12-06',5,11,NULL),
 (5,'2018-12-08',5,11,NULL),
 (6,'2018-12-09',5,11,NULL),
 (7,'2018-12-11',5,3,NULL),
 (8,'2018-12-07',4,3,NULL),
 (9,'2018-12-16',4,3,NULL),
 (10,'2018-12-10',4,3,NULL),
 (11,'2018-12-09',8,7,NULL),
 (12,'2018-12-12',8,7,NULL),
 (13,'2018-12-11',6,7,NULL),
 (14,'2018-12-01',6,7,NULL);
/*!40000 ALTER TABLE `empl_schedule` ENABLE KEYS */;


--
-- Definition of table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `Code` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Surname` varchar(45) NOT NULL,
  `Birthday` varchar(45) NOT NULL,
  `Address` varchar(45) NOT NULL,
  `Education` varchar(45) NOT NULL,
  `Wage` int(10) unsigned NOT NULL,
  `En_date` date NOT NULL,
  `Dis_date` date DEFAULT NULL,
  `Position_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Code`),
  KEY `FK_employee_1` (`Position_id`),
  CONSTRAINT `FK_employee_1` FOREIGN KEY (`Position_id`) REFERENCES `sschedule` (`Position_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` (`Code`,`Surname`,`Birthday`,`Address`,`Education`,`Wage`,`En_date`,`Dis_date`,`Position_id`) VALUES 
 (1,'Ушакова','1979-02-15','г. Тихорецк, ул. Достоевского, дом 70, кварти','МГУ',45000,'2015-04-12',NULL,9),
 (2,'Вихирев','1995-04-16','г. Каратузское, ул. Барышиха, дом 2','ВШЭ',45000,'2016-07-03',NULL,17),
 (3,'Власова','1966-06-12',' г. Усть-Пристань, ул. Деревцова, дом 67','МГТУ',65000,'2014-03-19',NULL,14),
 (4,'Егоров','1988-01-22','г. Краснозерское, ул. Деревцова, дом 56','МГТУ',55000,'2015-07-27',NULL,16),
 (5,'Захарова','1992-04-10','г. Кошхатау, ул. Георгиевская, дом 56','МГУ',70000,'2014-03-15','2017-03-13',5),
 (6,'Карпов','1985-06-15','г. Мучкапский, ул. Батюнинская, дом 8','МГТУ',75000,'2017-04-09',NULL,5),
 (7,'Киселёва','1973-08-18','г. Чернышевск, ул. Александра Завидова, дом 5','МГТУ',35000,'2015-01-19',NULL,24),
 (8,'Щербакова','1985-03-04','г. Зубцов, ул. Вагжанова, дом 87, квартира 87','МГУ',50000,'2017-03-26',NULL,26),
 (9,'Андронова','1974-09-18','г. Киквидзе, ул. Завокзальная 2-я, дом 24','МГТУ',100000,'2014-05-27',NULL,1),
 (10,'Никитина','1989-03-14','г. Венгерово, ул. Азовская, дом 73','МИФИ',50000,'2017-05-17',NULL,17),
 (11,'Денисова','1969-03-27','г. Шали, ул. Базовая, дом 27, квартира 73','МГТУ',70000,'2018-01-12',NULL,4);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;


--
-- Definition of table `interviewing`
--

DROP TABLE IF EXISTS `interviewing`;
CREATE TABLE `interviewing` (
  `Inter_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Date_i` date NOT NULL,
  `Salary` int(10) unsigned NOT NULL,
  `Grade` int(10) unsigned NOT NULL,
  `Elevation` varchar(4) NOT NULL,
  `Code` int(10) unsigned NOT NULL,
  `Instance_id` int(10) unsigned NOT NULL,
  `Vacancy_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Inter_id`),
  KEY `FK_Interviewing_1` (`Code`),
  KEY `FK_Interviewing_2` (`Instance_id`),
  KEY `FK_Interviewing_3` (`Vacancy_id`),
  CONSTRAINT `FK_Interviewing_1` FOREIGN KEY (`Code`) REFERENCES `employee` (`Code`),
  CONSTRAINT `FK_Interviewing_2` FOREIGN KEY (`Instance_id`) REFERENCES `candidate` (`Instance_id`),
  CONSTRAINT `FK_Interviewing_3` FOREIGN KEY (`Vacancy_id`) REFERENCES `vacancy` (`Vacancy_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `interviewing`
--

/*!40000 ALTER TABLE `interviewing` DISABLE KEYS */;
INSERT INTO `interviewing` (`Inter_id`,`Date_i`,`Salary`,`Grade`,`Elevation`,`Code`,`Instance_id`,`Vacancy_id`) VALUES 
 (1,'2017-03-17',75000,3,'no',3,5,2),
 (2,'2017-04-04',45000,9,'yes',7,9,9),
 (3,'2017-04-02',40000,4,'no',6,1,9),
 (4,'2017-03-29',65000,7,'no',10,5,3),
 (5,'2017-07-01',45000,1,'no',3,8,4),
 (6,'2017-03-21',50000,9,'yes',10,4,5),
 (7,'2017-03-14',70000,10,'yes',10,11,6),
 (9,'2017-04-08',60000,4,'no',10,2,3),
 (10,'2017-04-12',75000,3,'no',2,7,10),
 (11,'2017-04-01',40000,6,'no',1,3,9),
 (12,'2017-03-15',45000,1,'no',3,11,9);
/*!40000 ALTER TABLE `interviewing` ENABLE KEYS */;


--
-- Definition of table `otchet`
--

DROP TABLE IF EXISTS `otchet`;
CREATE TABLE `otchet` (
  `Id_ot` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Emp_code` int(10) unsigned NOT NULL,
  `Num_sobes` int(10) unsigned NOT NULL,
  `O_month` int(10) unsigned NOT NULL,
  `O_year` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Id_ot`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `otchet`
--

/*!40000 ALTER TABLE `otchet` DISABLE KEYS */;
INSERT INTO `otchet` (`Id_ot`,`Emp_code`,`Num_sobes`,`O_month`,`O_year`) VALUES 
 (3,3,2,3,2017),
 (4,10,3,3,2017),
 (10,1,1,4,2017),
 (11,2,1,4,2017),
 (12,6,1,4,2017),
 (13,7,1,4,2017),
 (14,10,1,4,2017);
/*!40000 ALTER TABLE `otchet` ENABLE KEYS */;


--
-- Definition of table `sschedule`
--

DROP TABLE IF EXISTS `sschedule`;
CREATE TABLE `sschedule` (
  `Position_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Position` varchar(45) NOT NULL,
  `Min_salary` int(10) unsigned NOT NULL,
  `Max_salary` int(10) unsigned NOT NULL,
  `Subdivision_code` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Position_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sschedule`
--

/*!40000 ALTER TABLE `sschedule` DISABLE KEYS */;
INSERT INTO `sschedule` (`Position_id`,`Position`,`Min_salary`,`Max_salary`,`Subdivision_code`) VALUES 
 (1,'Генеральный директор',90000,100000,1),
 (2,'Финансовый директор',80000,90000,1),
 (3,'Исполнительный директор',80000,90000,1),
 (4,'Директор по персоналу',70000,80000,1),
 (5,'Директор по качеству',70000,80000,1),
 (6,'Технический директор',70000,80000,1),
 (7,'Офис-менеджер',40000,50000,2),
 (8,'Начальник юридического отдела',60000,70000,2),
 (9,'Юрист',45000,50000,2),
 (10,'Диспетчер',25000,40000,2),
 (11,'Главный конструктор',60000,70000,3),
 (12,'Главный инженер',60000,70000,3),
 (13,'Конструктор',40000,50000,3),
 (14,'Начальник отдела ИТ',60000,70000,3),
 (15,'Системный администратор',50000,60000,3),
 (16,'Старший программист',50000,60000,3),
 (17,'Программист',40000,50000,3),
 (18,'Начальник отдела маркетинга',60000,70000,4),
 (19,'Менеджер по маркетингу',35000,50000,4),
 (20,'Промоутер',30000,40000,4),
 (21,'Дизайнер',40000,45000,4),
 (22,'Копирайтер',25000,35000,4),
 (23,'Главный бухгалтер',40000,50000,5),
 (24,'Бухгалтер',30000,40000,5),
 (25,'Финансовый менеджер',40000,50000,5),
 (26,'Экономист',45000,50000,5),
 (27,'Кассир',30000,35000,5);
/*!40000 ALTER TABLE `sschedule` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Login` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `P_group` varchar(45) NOT NULL,
  `G_password` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`Login`,`Password`,`P_group`,`G_password`) VALUES 
 (1,'Nikitina','Nikitina12345','director','dIrEct0r'),
 (2,'Denisova','Denisova67890','manager','mAnager$'),
 (3,'Ushakova','Ushakova24680','empl','Empl0yee'),
 (4,'Vihirev','Vihirev54321','empl','Empl0yee'),
 (5,'Vlasova','Vlasova98765','empl','Empl0yee'),
 (6,'Egorov','Egorov34782','empl','Empl0yee'),
 (7,'Zaharova','Zaharova238392','empl','Empl0yee'),
 (8,'Karpov','Karpov984202','empl','Empl0yee'),
 (9,'Kiseleva','Kiseleva121232','empl','Empl0yee'),
 (10,'Sherbakova','Sherbakova23782','empl','Empl0yee'),
 (11,'Andronova','Andronova239384','empl','Empl0yee');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


--
-- Definition of table `vacancy`
--

DROP TABLE IF EXISTS `vacancy`;
CREATE TABLE `vacancy` (
  `Vacancy_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Open_date` date NOT NULL,
  `Close_date` date DEFAULT NULL,
  `Position_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Vacancy_id`),
  KEY `FK_Vacancy_1` (`Position_id`),
  CONSTRAINT `FK_Vacancy_1` FOREIGN KEY (`Position_id`) REFERENCES `sschedule` (`Position_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vacancy`
--

/*!40000 ALTER TABLE `vacancy` DISABLE KEYS */;
INSERT INTO `vacancy` (`Vacancy_id`,`Open_date`,`Close_date`,`Position_id`) VALUES 
 (1,'2017-05-02','2017-08-21',4),
 (2,'2017-03-13','2017-03-16',5),
 (3,'2017-03-06',NULL,12),
 (4,'2017-06-17','2017-08-21',17),
 (5,'2017-03-05','2017-04-12',9),
 (6,'2017-03-13','2017-04-09',5),
 (7,'2017-12-30',NULL,1),
 (8,'2016-12-19','2017-03-08',22),
 (9,'2017-03-11','2017-05-06',17),
 (10,'2017-04-01',NULL,5),
 (11,'2018-10-11',NULL,3);
/*!40000 ALTER TABLE `vacancy` ENABLE KEYS */;


--
-- Definition of procedure `sobes`
--

DROP PROCEDURE IF EXISTS `sobes`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sobes`(inp_year integer, inp_month integer)
BEGIN
    DECLARE numb INTEGER;
    DECLARE KOLV INTEGER;
    DECLARE done INTEGER DEFAULT 0;
    DECLARE C1 CURSOR FOR
     SELECT Code, COUNT(*)
     FROM Employee JOIN Interviewing USING(Code)
     WHERE (Year(Date_i)=inp_year) AND (MONTH(Date_i)=inp_month)
     GROUP BY Code;
    DECLARE EXIT HANDLER FOR SQLSTATE '02000' SET done=1;

OPEN C1;
WHILE done=0 DO
          FETCH C1 INTO numb, KOLV;
          INSERT INTO OTCHET
          VALUES(NULL, numb, KOLV, inp_month, inp_year);
END WHILE;
CLOSE C1;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of view `maxvac`
--

DROP TABLE IF EXISTS `maxvac`;
DROP VIEW IF EXISTS `maxvac`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `maxvac` AS select `interviewing`.`Vacancy_id` AS `Vacancy_id`,count(0) AS `Count_inter` from `interviewing` group by `interviewing`.`Vacancy_id`;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

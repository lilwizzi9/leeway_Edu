-- MySQL dump 10.19  Distrib 10.2.41-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: hadaftec_leeway
-- ------------------------------------------------------
-- Server version	10.2.41-MariaDB

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
-- Current Database: `hadaftec_leeway`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `hadaftec_leeway` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `hadaftec_leeway`;

--
-- Table structure for table `admin_comm`
--

DROP TABLE IF EXISTS `admin_comm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_comm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_comm`
--

LOCK TABLES `admin_comm` WRITE;
/*!40000 ALTER TABLE `admin_comm` DISABLE KEYS */;
INSERT INTO `admin_comm` VALUES (20,578,'0.9998999999999999','Registration Commision.','2021-09-02 08:27:27'),(21,579,'0.9998999999999999','Registration Commision.','2021-09-21 12:39:09'),(22,580,'0.3333','Registration Commision.','2021-10-06 06:26:51'),(23,581,'0.3333','Registration Commision.','2021-10-06 06:58:31'),(24,582,'0.3333','Registration Commision.','2021-10-06 07:00:29'),(25,583,'0.3333','Registration Commision.','2021-10-06 07:33:35'),(26,584,'0.3333','Registration Commision.','2021-10-06 07:36:26'),(27,585,'0.3333','Registration Commision.','2021-10-06 07:39:01'),(28,586,'0.3333','Registration Commision.','2021-10-06 08:11:07'),(29,587,'0.3333','Registration Commision.','2021-10-06 08:12:57'),(30,588,'0.3333','Registration Commision.','2021-10-06 08:27:09'),(31,589,'0.3333','Registration Commision.','2021-10-06 13:42:02'),(32,590,'0.3333','Registration Commision.','2021-10-06 13:44:02'),(33,591,'0.3333','Registration Commision.','2021-10-16 11:28:25'),(34,592,'0.3333','Registration Commision.','2021-10-16 12:33:50'),(35,593,'0.3333','Registration Commision.','2021-10-16 13:03:28'),(36,594,'0.3333','Registration Commision.','2021-10-18 06:50:22'),(37,595,'0.3333','Registration Commision.','2021-10-18 12:28:58'),(38,596,'0.3333','Registration Commision.','2021-10-19 11:52:28'),(39,597,'0.3333','Registration Commision.','2021-10-21 07:20:30'),(40,598,'0.3333','Registration Commision.','2021-10-25 13:22:33');
/*!40000 ALTER TABLE `admin_comm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Admin','support@zagecoin.com','$2y$10$Pd2QtKyzI1zcYc.Y8cNYDODRsnqy5u69609ktMREdEEZxNsmxUcce','LDxoiaidEpQEYTAVyQDyhQO7bMWozkBwr76S965JqpQaOBBOkJcv3YP80IIl',NULL,'2018-04-01 05:57:57');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buy_coins`
--

DROP TABLE IF EXISTS `buy_coins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buy_coins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `coin_amount` varchar(11) DEFAULT NULL,
  `no_of_coins` int(11) DEFAULT NULL,
  `total_amount` varchar(11) DEFAULT NULL,
  `coin_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buy_coins`
--

LOCK TABLES `buy_coins` WRITE;
/*!40000 ALTER TABLE `buy_coins` DISABLE KEYS */;
/*!40000 ALTER TABLE `buy_coins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `charge_commisions`
--

DROP TABLE IF EXISTS `charge_commisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `charge_commisions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transfer_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `withdraw_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_comm` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sponsor_comm` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matrix_comm` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_1` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_2` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_3` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_4` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_5` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_6` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_7` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_8` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_9` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_10` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `update_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `charge_commisions`
--

LOCK TABLES `charge_commisions` WRITE;
/*!40000 ALTER TABLE `charge_commisions` DISABLE KEYS */;
INSERT INTO `charge_commisions` VALUES (1,'1','2.5','33.33','33.33','33.33','30','20','15','13','10','5','3','2','1.2','0.8',NULL,'2021-07-30 13:54:03','<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\"><b><font size=\"5\">Upgrade your Account Free to Premium</font></b></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\"><font size=\"3\">Upgrade your Account from&nbsp; $20 and refer your Freinds,&nbsp; you will get $46 by referring every 3 members, Every 3 Members will Reward you $46 and 6 members will reward you $92 and so on</font></p>');
/*!40000 ALTER TABLE `charge_commisions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coins`
--

DROP TABLE IF EXISTS `coins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `coin_amount` varchar(11) DEFAULT NULL,
  `sell_amount` varchar(11) DEFAULT NULL,
  `referal_comission` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coins`
--

LOCK TABLES `coins` WRITE;
/*!40000 ALTER TABLE `coins` DISABLE KEYS */;
/*!40000 ALTER TABLE `coins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=240 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'AF','AFGHANISTAN','Afghanistan','AFG',4,93),(2,'AL','ALBANIA','Albania','ALB',8,355),(3,'DZ','ALGERIA','Algeria','DZA',12,213),(4,'AS','AMERICAN SAMOA','American Samoa','ASM',16,1684),(5,'AD','ANDORRA','Andorra','AND',20,376),(6,'AO','ANGOLA','Angola','AGO',24,244),(7,'AI','ANGUILLA','Anguilla','AIA',660,1264),(8,'AQ','ANTARCTICA','Antarctica',NULL,NULL,0),(9,'AG','ANTIGUA AND BARBUDA','Antigua and Barbuda','ATG',28,1268),(10,'AR','ARGENTINA','Argentina','ARG',32,54),(11,'AM','ARMENIA','Armenia','ARM',51,374),(12,'AW','ARUBA','Aruba','ABW',533,297),(13,'AU','AUSTRALIA','Australia','AUS',36,61),(14,'AT','AUSTRIA','Austria','AUT',40,43),(15,'AZ','AZERBAIJAN','Azerbaijan','AZE',31,994),(16,'BS','BAHAMAS','Bahamas','BHS',44,1242),(17,'BH','BAHRAIN','Bahrain','BHR',48,973),(18,'BD','BANGLADESH','Bangladesh','BGD',50,880),(19,'BB','BARBADOS','Barbados','BRB',52,1246),(20,'BY','BELARUS','Belarus','BLR',112,375),(21,'BE','BELGIUM','Belgium','BEL',56,32),(22,'BZ','BELIZE','Belize','BLZ',84,501),(23,'BJ','BENIN','Benin','BEN',204,229),(24,'BM','BERMUDA','Bermuda','BMU',60,1441),(25,'BT','BHUTAN','Bhutan','BTN',64,975),(26,'BO','BOLIVIA','Bolivia','BOL',68,591),(27,'BA','BOSNIA AND HERZEGOVINA','Bosnia and Herzegovina','BIH',70,387),(28,'BW','BOTSWANA','Botswana','BWA',72,267),(29,'BV','BOUVET ISLAND','Bouvet Island',NULL,NULL,0),(30,'BR','BRAZIL','Brazil','BRA',76,55),(31,'IO','BRITISH INDIAN OCEAN TERRITORY','British Indian Ocean Territory',NULL,NULL,246),(32,'BN','BRUNEI DARUSSALAM','Brunei Darussalam','BRN',96,673),(33,'BG','BULGARIA','Bulgaria','BGR',100,359),(34,'BF','BURKINA FASO','Burkina Faso','BFA',854,226),(35,'BI','BURUNDI','Burundi','BDI',108,257),(36,'KH','CAMBODIA','Cambodia','KHM',116,855),(37,'CM','CAMEROON','Cameroon','CMR',120,237),(38,'CA','CANADA','Canada','CAN',124,1),(39,'CV','CAPE VERDE','Cape Verde','CPV',132,238),(40,'KY','CAYMAN ISLANDS','Cayman Islands','CYM',136,1345),(41,'CF','CENTRAL AFRICAN REPUBLIC','Central African Republic','CAF',140,236),(42,'TD','CHAD','Chad','TCD',148,235),(43,'CL','CHILE','Chile','CHL',152,56),(44,'CN','CHINA','China','CHN',156,86),(45,'CX','CHRISTMAS ISLAND','Christmas Island',NULL,NULL,61),(46,'CC','COCOS (KEELING) ISLANDS','Cocos (Keeling) Islands',NULL,NULL,672),(47,'CO','COLOMBIA','Colombia','COL',170,57),(48,'KM','COMOROS','Comoros','COM',174,269),(49,'CG','CONGO','Congo','COG',178,242),(50,'CD','CONGO, THE DEMOCRATIC REPUBLIC OF THE','Congo, the Democratic Republic of the','COD',180,242),(51,'CK','COOK ISLANDS','Cook Islands','COK',184,682),(52,'CR','COSTA RICA','Costa Rica','CRI',188,506),(53,'CI','COTE D\'IVOIRE','Cote D\'Ivoire','CIV',384,225),(54,'HR','CROATIA','Croatia','HRV',191,385),(55,'CU','CUBA','Cuba','CUB',192,53),(56,'CY','CYPRUS','Cyprus','CYP',196,357),(57,'CZ','CZECH REPUBLIC','Czech Republic','CZE',203,420),(58,'DK','DENMARK','Denmark','DNK',208,45),(59,'DJ','DJIBOUTI','Djibouti','DJI',262,253),(60,'DM','DOMINICA','Dominica','DMA',212,1767),(61,'DO','DOMINICAN REPUBLIC','Dominican Republic','DOM',214,1809),(62,'EC','ECUADOR','Ecuador','ECU',218,593),(63,'EG','EGYPT','Egypt','EGY',818,20),(64,'SV','EL SALVADOR','El Salvador','SLV',222,503),(65,'GQ','EQUATORIAL GUINEA','Equatorial Guinea','GNQ',226,240),(66,'ER','ERITREA','Eritrea','ERI',232,291),(67,'EE','ESTONIA','Estonia','EST',233,372),(68,'ET','ETHIOPIA','Ethiopia','ETH',231,251),(69,'FK','FALKLAND ISLANDS (MALVINAS)','Falkland Islands (Malvinas)','FLK',238,500),(70,'FO','FAROE ISLANDS','Faroe Islands','FRO',234,298),(71,'FJ','FIJI','Fiji','FJI',242,679),(72,'FI','FINLAND','Finland','FIN',246,358),(73,'FR','FRANCE','France','FRA',250,33),(74,'GF','FRENCH GUIANA','French Guiana','GUF',254,594),(75,'PF','FRENCH POLYNESIA','French Polynesia','PYF',258,689),(76,'TF','FRENCH SOUTHERN TERRITORIES','French Southern Territories',NULL,NULL,0),(77,'GA','GABON','Gabon','GAB',266,241),(78,'GM','GAMBIA','Gambia','GMB',270,220),(79,'GE','GEORGIA','Georgia','GEO',268,995),(80,'DE','GERMANY','Germany','DEU',276,49),(81,'GH','GHANA','Ghana','GHA',288,233),(82,'GI','GIBRALTAR','Gibraltar','GIB',292,350),(83,'GR','GREECE','Greece','GRC',300,30),(84,'GL','GREENLAND','Greenland','GRL',304,299),(85,'GD','GRENADA','Grenada','GRD',308,1473),(86,'GP','GUADELOUPE','Guadeloupe','GLP',312,590),(87,'GU','GUAM','Guam','GUM',316,1671),(88,'GT','GUATEMALA','Guatemala','GTM',320,502),(89,'GN','GUINEA','Guinea','GIN',324,224),(90,'GW','GUINEA-BISSAU','Guinea-Bissau','GNB',624,245),(91,'GY','GUYANA','Guyana','GUY',328,592),(92,'HT','HAITI','Haiti','HTI',332,509),(93,'HM','HEARD ISLAND AND MCDONALD ISLANDS','Heard Island and Mcdonald Islands',NULL,NULL,0),(94,'VA','HOLY SEE (VATICAN CITY STATE)','Holy See (Vatican City State)','VAT',336,39),(95,'HN','HONDURAS','Honduras','HND',340,504),(96,'HK','HONG KONG','Hong Kong','HKG',344,852),(97,'HU','HUNGARY','Hungary','HUN',348,36),(98,'IS','ICELAND','Iceland','ISL',352,354),(99,'IN','INDIA','India','IND',356,91),(100,'ID','INDONESIA','Indonesia','IDN',360,62),(101,'IR','IRAN, ISLAMIC REPUBLIC OF','Iran, Islamic Republic of','IRN',364,98),(102,'IQ','IRAQ','Iraq','IRQ',368,964),(103,'IE','IRELAND','Ireland','IRL',372,353),(104,'IL','ISRAEL','Israel','ISR',376,972),(105,'IT','ITALY','Italy','ITA',380,39),(106,'JM','JAMAICA','Jamaica','JAM',388,1876),(107,'JP','JAPAN','Japan','JPN',392,81),(108,'JO','JORDAN','Jordan','JOR',400,962),(109,'KZ','KAZAKHSTAN','Kazakhstan','KAZ',398,7),(110,'KE','KENYA','Kenya','KEN',404,254),(111,'KI','KIRIBATI','Kiribati','KIR',296,686),(112,'KP','KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF','Korea, Democratic People\'s Republic of','PRK',408,850),(113,'KR','KOREA, REPUBLIC OF','Korea, Republic of','KOR',410,82),(114,'KW','KUWAIT','Kuwait','KWT',414,965),(115,'KG','KYRGYZSTAN','Kyrgyzstan','KGZ',417,996),(116,'LA','LAO PEOPLE\'S DEMOCRATIC REPUBLIC','Lao People\'s Democratic Republic','LAO',418,856),(117,'LV','LATVIA','Latvia','LVA',428,371),(118,'LB','LEBANON','Lebanon','LBN',422,961),(119,'LS','LESOTHO','Lesotho','LSO',426,266),(120,'LR','LIBERIA','Liberia','LBR',430,231),(121,'LY','LIBYAN ARAB JAMAHIRIYA','Libyan Arab Jamahiriya','LBY',434,218),(122,'LI','LIECHTENSTEIN','Liechtenstein','LIE',438,423),(123,'LT','LITHUANIA','Lithuania','LTU',440,370),(124,'LU','LUXEMBOURG','Luxembourg','LUX',442,352),(125,'MO','MACAO','Macao','MAC',446,853),(126,'MK','MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF','Macedonia, the Former Yugoslav Republic of','MKD',807,389),(127,'MG','MADAGASCAR','Madagascar','MDG',450,261),(128,'MW','MALAWI','Malawi','MWI',454,265),(129,'MY','MALAYSIA','Malaysia','MYS',458,60),(130,'MV','MALDIVES','Maldives','MDV',462,960),(131,'ML','MALI','Mali','MLI',466,223),(132,'MT','MALTA','Malta','MLT',470,356),(133,'MH','MARSHALL ISLANDS','Marshall Islands','MHL',584,692),(134,'MQ','MARTINIQUE','Martinique','MTQ',474,596),(135,'MR','MAURITANIA','Mauritania','MRT',478,222),(136,'MU','MAURITIUS','Mauritius','MUS',480,230),(137,'YT','MAYOTTE','Mayotte',NULL,NULL,269),(138,'MX','MEXICO','Mexico','MEX',484,52),(139,'FM','MICRONESIA, FEDERATED STATES OF','Micronesia, Federated States of','FSM',583,691),(140,'MD','MOLDOVA, REPUBLIC OF','Moldova, Republic of','MDA',498,373),(141,'MC','MONACO','Monaco','MCO',492,377),(142,'MN','MONGOLIA','Mongolia','MNG',496,976),(143,'MS','MONTSERRAT','Montserrat','MSR',500,1664),(144,'MA','MOROCCO','Morocco','MAR',504,212),(145,'MZ','MOZAMBIQUE','Mozambique','MOZ',508,258),(146,'MM','MYANMAR','Myanmar','MMR',104,95),(147,'NA','NAMIBIA','Namibia','NAM',516,264),(148,'NR','NAURU','Nauru','NRU',520,674),(149,'NP','NEPAL','Nepal','NPL',524,977),(150,'NL','NETHERLANDS','Netherlands','NLD',528,31),(151,'AN','NETHERLANDS ANTILLES','Netherlands Antilles','ANT',530,599),(152,'NC','NEW CALEDONIA','New Caledonia','NCL',540,687),(153,'NZ','NEW ZEALAND','New Zealand','NZL',554,64),(154,'NI','NICARAGUA','Nicaragua','NIC',558,505),(155,'NE','NIGER','Niger','NER',562,227),(156,'NG','NIGERIA','Nigeria','NGA',566,234),(157,'NU','NIUE','Niue','NIU',570,683),(158,'NF','NORFOLK ISLAND','Norfolk Island','NFK',574,672),(159,'MP','NORTHERN MARIANA ISLANDS','Northern Mariana Islands','MNP',580,1670),(160,'NO','NORWAY','Norway','NOR',578,47),(161,'OM','OMAN','Oman','OMN',512,968),(162,'PK','PAKISTAN','Pakistan','PAK',586,92),(163,'PW','PALAU','Palau','PLW',585,680),(164,'PS','PALESTINIAN TERRITORY, OCCUPIED','Palestinian Territory, Occupied',NULL,NULL,970),(165,'PA','PANAMA','Panama','PAN',591,507),(166,'PG','PAPUA NEW GUINEA','Papua New Guinea','PNG',598,675),(167,'PY','PARAGUAY','Paraguay','PRY',600,595),(168,'PE','PERU','Peru','PER',604,51),(169,'PH','PHILIPPINES','Philippines','PHL',608,63),(170,'PN','PITCAIRN','Pitcairn','PCN',612,0),(171,'PL','POLAND','Poland','POL',616,48),(172,'PT','PORTUGAL','Portugal','PRT',620,351),(173,'PR','PUERTO RICO','Puerto Rico','PRI',630,1787),(174,'QA','QATAR','Qatar','QAT',634,974),(175,'RE','REUNION','Reunion','REU',638,262),(176,'RO','ROMANIA','Romania','ROM',642,40),(177,'RU','RUSSIAN FEDERATION','Russian Federation','RUS',643,70),(178,'RW','RWANDA','Rwanda','RWA',646,250),(179,'SH','SAINT HELENA','Saint Helena','SHN',654,290),(180,'KN','SAINT KITTS AND NEVIS','Saint Kitts and Nevis','KNA',659,1869),(181,'LC','SAINT LUCIA','Saint Lucia','LCA',662,1758),(182,'PM','SAINT PIERRE AND MIQUELON','Saint Pierre and Miquelon','SPM',666,508),(183,'VC','SAINT VINCENT AND THE GRENADINES','Saint Vincent and the Grenadines','VCT',670,1784),(184,'WS','SAMOA','Samoa','WSM',882,684),(185,'SM','SAN MARINO','San Marino','SMR',674,378),(186,'ST','SAO TOME AND PRINCIPE','Sao Tome and Principe','STP',678,239),(187,'SA','SAUDI ARABIA','Saudi Arabia','SAU',682,966),(188,'SN','SENEGAL','Senegal','SEN',686,221),(189,'CS','SERBIA AND MONTENEGRO','Serbia and Montenegro',NULL,NULL,381),(190,'SC','SEYCHELLES','Seychelles','SYC',690,248),(191,'SL','SIERRA LEONE','Sierra Leone','SLE',694,232),(192,'SG','SINGAPORE','Singapore','SGP',702,65),(193,'SK','SLOVAKIA','Slovakia','SVK',703,421),(194,'SI','SLOVENIA','Slovenia','SVN',705,386),(195,'SB','SOLOMON ISLANDS','Solomon Islands','SLB',90,677),(196,'SO','SOMALIA','Somalia','SOM',706,252),(197,'ZA','SOUTH AFRICA','South Africa','ZAF',710,27),(198,'GS','SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS','South Georgia and the South Sandwich Islands',NULL,NULL,0),(199,'ES','SPAIN','Spain','ESP',724,34),(200,'LK','SRI LANKA','Sri Lanka','LKA',144,94),(201,'SD','SUDAN','Sudan','SDN',736,249),(202,'SR','SURINAME','Suriname','SUR',740,597),(203,'SJ','SVALBARD AND JAN MAYEN','Svalbard and Jan Mayen','SJM',744,47),(204,'SZ','SWAZILAND','Swaziland','SWZ',748,268),(205,'SE','SWEDEN','Sweden','SWE',752,46),(206,'CH','SWITZERLAND','Switzerland','CHE',756,41),(207,'SY','SYRIAN ARAB REPUBLIC','Syrian Arab Republic','SYR',760,963),(208,'TW','TAIWAN, PROVINCE OF CHINA','Taiwan, Province of China','TWN',158,886),(209,'TJ','TAJIKISTAN','Tajikistan','TJK',762,992),(210,'TZ','TANZANIA, UNITED REPUBLIC OF','Tanzania, United Republic of','TZA',834,255),(211,'TH','THAILAND','Thailand','THA',764,66),(212,'TL','TIMOR-LESTE','Timor-Leste',NULL,NULL,670),(213,'TG','TOGO','Togo','TGO',768,228),(214,'TK','TOKELAU','Tokelau','TKL',772,690),(215,'TO','TONGA','Tonga','TON',776,676),(216,'TT','TRINIDAD AND TOBAGO','Trinidad and Tobago','TTO',780,1868),(217,'TN','TUNISIA','Tunisia','TUN',788,216),(218,'TR','TURKEY','Turkey','TUR',792,90),(219,'TM','TURKMENISTAN','Turkmenistan','TKM',795,7370),(220,'TC','TURKS AND CAICOS ISLANDS','Turks and Caicos Islands','TCA',796,1649),(221,'TV','TUVALU','Tuvalu','TUV',798,688),(222,'UG','UGANDA','Uganda','UGA',800,256),(223,'UA','UKRAINE','Ukraine','UKR',804,380),(224,'AE','UNITED ARAB EMIRATES','United Arab Emirates','ARE',784,971),(225,'GB','UNITED KINGDOM','United Kingdom','GBR',826,44),(226,'US','UNITED STATES','United States','USA',840,1),(227,'UM','UNITED STATES MINOR OUTLYING ISLANDS','United States Minor Outlying Islands',NULL,NULL,1),(228,'UY','URUGUAY','Uruguay','URY',858,598),(229,'UZ','UZBEKISTAN','Uzbekistan','UZB',860,998),(230,'VU','VANUATU','Vanuatu','VUT',548,678),(231,'VE','VENEZUELA','Venezuela','VEN',862,58),(232,'VN','VIET NAM','Viet Nam','VNM',704,84),(233,'VG','VIRGIN ISLANDS, BRITISH','Virgin Islands, British','VGB',92,1284),(234,'VI','VIRGIN ISLANDS, U.S.','Virgin Islands, U.s.','VIR',850,1340),(235,'WF','WALLIS AND FUTUNA','Wallis and Futuna','WLF',876,681),(236,'EH','WESTERN SAHARA','Western Sahara','ESH',732,212),(237,'YE','YEMEN','Yemen','YEM',887,967),(238,'ZM','ZAMBIA','Zambia','ZMB',894,260),(239,'ZW','ZIMBABWE','Zimbabwe','ZWE',716,263);
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deposits`
--

DROP TABLE IF EXISTS `deposits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deposits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `gateway_id` int(11) NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trx` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bcid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bcam` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `try` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usd_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=215 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deposits`
--

LOCK TABLES `deposits` WRITE;
/*!40000 ALTER TABLE `deposits` DISABLE KEYS */;
/*!40000 ALTER TABLE `deposits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direct_deposit_bonus`
--

DROP TABLE IF EXISTS `direct_deposit_bonus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direct_deposit_bonus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` varchar(11) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direct_deposit_bonus`
--

LOCK TABLES `direct_deposit_bonus` WRITE;
/*!40000 ALTER TABLE `direct_deposit_bonus` DISABLE KEYS */;
/*!40000 ALTER TABLE `direct_deposit_bonus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direct_joining_comm`
--

DROP TABLE IF EXISTS `direct_joining_comm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direct_joining_comm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_user` varchar(11) NOT NULL DEFAULT '0',
  `commision_per_user` varchar(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direct_joining_comm`
--

LOCK TABLES `direct_joining_comm` WRITE;
/*!40000 ALTER TABLE `direct_joining_comm` DISABLE KEYS */;
/*!40000 ALTER TABLE `direct_joining_comm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gateways`
--

DROP TABLE IF EXISTS `gateways`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gateways` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gateimg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minamo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maxamo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chargefx` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chargepc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `val1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gateways`
--

LOCK TABLES `gateways` WRITE;
/*!40000 ALTER TABLE `gateways` DISABLE KEYS */;
INSERT INTO `gateways` VALUES (1,'PayPal','5a7ed13a7d0d3.png','10','10000','2','2.5','1','dsvmailer@gmail.com',NULL,NULL,0,NULL,'2021-01-23 19:55:31'),(2,'Perfect Money','5a7ed14857f6d.png','10','20000','0','1','1','U29370064','4U0667ZqBmifIponAzpOTdMqz',NULL,1,NULL,'2021-04-06 15:19:57'),(3,'BlockChain','600f0f4736123.jpg','500','20000','0.0','0.0','1','YOUR API KEY FROM BLOCKCHAIN.INFO','xpub6CH8U6gspN7bnNfcGyoR8RUZPzLMkBBfuJtEdqpPSfeSuouyjBz2paia3FUU8f4WfaDseu2hV5966dZRrw5DFx3bskhjAyU8F3RYbq5sMcY',NULL,1,NULL,'2021-07-15 16:23:01'),(4,'Visa Card','60fd902a88af9.jpg','20','50000','5','2.5','1','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','pk_live_51JH3UoARSIpnZQRi2spXoyM3y0BEgZvb961mWklb0v7t7rlGnks3ArvNPcbUfDOan4SatuIlsjg9iLqNcALj69q700OWm93NhY',NULL,1,NULL,'2021-07-27 01:39:17'),(5,'Skrill','5a70963c08257.jpg','10','50000','3','3','81','merchant@skrill','TheSoftKing',NULL,0,NULL,'2021-01-23 19:56:56'),(6,'Coingate','5a709647b797a.jpg','10','50000','3','3','83.30','1257','8wbQIWcXyRu1AHiJqtEhTY','Hr7LqFM83aJsZgbIVkoUW2Q4cGvlB05n',0,NULL,'2021-01-23 19:56:42'),(7,'Coin Payment','60aa54da8afa4.jpg','5','99000','0','0','1','2DeBD7232f0660d9bbFC7Db748dB562246Dfc518e88e3f1846ee185911c66fb6','8f8fe7a2e76d2916b087cf817db0142c',NULL,1,NULL,'2021-07-15 16:26:12'),(8,'Block IO','60aa556e87193.jpg','20','98000','0','0','1','c944-4e5a-afa4-d1f5','raheeeqhannnalallla1',NULL,1,'2018-01-27 12:00:00','2021-07-15 16:25:39');
/*!40000 ALTER TABLE `gateways` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `generals`
--

DROP TABLE IF EXISTS `generals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `generals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `web_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(191) NOT NULL DEFAULT 0,
  `about_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `about_video_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `policy` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `terms` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_map_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `smsapi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailver` int(1) NOT NULL,
  `smsver` int(1) NOT NULL,
  `emessage` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `esender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sec_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_nfy` int(1) DEFAULT 0,
  `sms_nfy` int(1) NOT NULL DEFAULT 0,
  `mcq_duration` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mcq_passing_perc` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lewt_by_usd` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generals`
--

LOCK TABLES `generals` WRITE;
/*!40000 ALTER TABLE `generals` DISABLE KEYS */;
INSERT INTO `generals` VALUES (1,'Leeway Smart Contracts','USD','$','<span style=\"color: rgb(0, 0, 0); font-family: Verdana, sans-serif; font-size: 12px; text-align: center;\">W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve reading and basic understanding. Tutorials, references, and examples are constantly reviewed to avoid errors, but we cannot warrant full correctness of all content. While using this site, you agree to have read and accepted our&nbsp;</span><a href=\"https://www.w3schools.com/about/about_copyright.asp\" style=\"box-sizing: inherit; background-color: rgb(255, 255, 255); color: inherit; font-family: Verdana, sans-serif; font-size: 12px; text-align: center;\">terms of use</a><span style=\"color: rgb(0, 0, 0); font-family: Verdana, sans-serif; font-size: 12px; text-align: center;\">,&nbsp;</span><a href=\"https://www.w3schools.com/about/about_privacy.asp\" style=\"box-sizing: inherit; background-color: rgb(255, 255, 255); color: inherit; font-family: Verdana, sans-serif; font-size: 12px; text-align: center;\">cookie and privacy policy</a><span style=\"color: rgb(0, 0, 0); font-family: Verdana, sans-serif; font-size: 12px; text-align: center;\">.&nbsp;</span><a href=\"https://www.w3schools.com/about/about_copyright.asp\" style=\"box-sizing: inherit; background-color: rgb(255, 255, 255); color: inherit; font-family: Verdana, sans-serif; font-size: 12px; text-align: center;\">Copyright 1999-2018</a><span style=\"color: rgb(0, 0, 0); font-family: Verdana, sans-serif; font-size: 12px; text-align: center;\">&nbsp;by Refsnes Data. All Rights Reserved.</span>','support@demo.com','+1 717 744 8991',0,'<font face=\"arial\" size=\"3\">test</font>','1523798513.jpg','e10fac',NULL,'2021-09-24 08:19:54','https://www.youtube.com/watch?v=2kXbdIw0Nx4','2021 © All Rights Reserved','<span style=\"color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.</span>','<div style=\"margin-right: 14.3906px; margin-left: 28.7969px; width: 436.797px; float: left; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><h2 style=\"margin-top: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">What is Lorem Ipsum?</h2><p style=\"margin-bottom: 15px; text-align: justify;\"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div><div style=\"margin-right: 28.7969px; margin-left: 14.3906px; width: 436.797px; float: right; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><h2 style=\"margin-top: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">Why do we use it?</h2><p style=\"margin-bottom: 15px; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><div><br></div></div>','<div style=\"margin-right: 14.3906px; margin-left: 28.7969px; width: 436.797px; float: left; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><h2 style=\"margin-top: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">Where does it come from?</h2><p style=\"margin-bottom: 15px; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-bottom: 15px; text-align: justify;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p></div><div style=\"margin-right: 28.7969px; margin-left: 14.3906px; width: 436.797px; float: right; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><h2 style=\"margin-top: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">Where can I get some?</h2><p style=\"margin-bottom: 15px; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p><form method=\"post\" action=\"https://www.lipsum.com/feed/html\" style=\"margin-bottom: 10px;\"><table style=\"border: 0px; width: 436.797px;\"><tbody><tr><td rowspan=\"2\" style=\"border: 0px; vertical-align: middle; text-align: center;\"><input type=\"text\" name=\"amount\" value=\"5\" size=\"3\" id=\"amount\" style=\"margin: 3px 6px; padding: 3px 5px; font-size: 14px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; width: 30px; text-align: center; border-width: 1px; border-style: solid; border-color: rgb(102, 102, 102) rgb(204, 204, 204) rgb(204, 204, 204) rgb(102, 102, 102);\"></td><td rowspan=\"2\" style=\"border: 0px; vertical-align: middle; text-align: center;\"><table style=\"border: 0px; text-align: left;\"><tbody><tr><td style=\"border: 0px; vertical-align: middle; width: 20px;\"><input type=\"radio\" name=\"what\" value=\"paras\" id=\"paras\" checked=\"checked\" style=\"margin: 3px 6px; font-size: 14px; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"></td><td style=\"border: 0px; vertical-align: middle;\"><label for=\"paras\" style=\"margin-bottom: 0px; cursor: pointer;\">paragraphs</label></td></tr><tr><td style=\"border: 0px; vertical-align: middle; width: 20px;\"><input type=\"radio\" name=\"what\" value=\"words\" id=\"words\" style=\"margin: 3px 6px; font-size: 14px; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"></td><td style=\"border: 0px; vertical-align: middle;\"><label for=\"words\" style=\"margin-bottom: 0px; cursor: pointer;\">words</label></td></tr><tr><td style=\"border: 0px; vertical-align: middle; width: 20px;\"><input type=\"radio\" name=\"what\" value=\"bytes\" id=\"bytes\" style=\"margin: 3px 6px; font-size: 14px; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"></td><td style=\"border: 0px; vertical-align: middle;\"><label for=\"bytes\" style=\"margin-bottom: 0px; cursor: pointer;\">bytes</label></td></tr><tr><td style=\"border: 0px; vertical-align: middle; width: 20px;\"><input type=\"radio\" name=\"what\" value=\"lists\" id=\"lists\" style=\"margin: 3px 6px; font-size: 14px; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"></td><td style=\"border: 0px; vertical-align: middle;\"><label for=\"lists\" style=\"margin-bottom: 0px; cursor: pointer;\">lists</label></td></tr></tbody></table></td><td style=\"border: 0px; vertical-align: middle; text-align: center; width: 20px;\"><input type=\"checkbox\" name=\"start\" id=\"start\" value=\"yes\" checked=\"checked\" style=\"margin: 3px 6px; font-size: 14px; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"></td><td style=\"border: 0px; vertical-align: middle;\"><label for=\"start\" style=\"margin-bottom: 0px; cursor: pointer;\">Start with \'Lorem<br>ipsum dolor sit amet...\'</label></td></tr><tr><td style=\"border: 0px; vertical-align: middle; text-align: center;\"></td><td style=\"border: 0px; vertical-align: middle;\"><input type=\"submit\" name=\"generate\" id=\"generate\" value=\"Generate Lorem Ipsum\" style=\"margin-top: 10px; padding: 3px 10px; font-size: 14px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; border-width: 1px; border-style: solid; border-color: rgb(153, 153, 153); background: rgb(238, 238, 238); border-radius: 4px; appearance: none;\"><br><br></td></tr></tbody></table></form></div>','London, United Kingdom','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.593250156392!2d90.38423581456203!3d23.76187998458368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8a79d1c8d51%3A0x309da80696c10d30!2sMonipuripara%2C+Dhaka!5e0!3m2!1sen!2sbd!4v1520237592896\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','2018-02-01','https://api.infobip.com/api/v3/sendsms/plain?user=****&password=*****&sender=CoinVest&SMSText={{message}}&GSM={{number}}&type=longSMS',1,1,'<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"background-position: center; background-repeat: no-repeat;     background-size: 1300px 1000px; background-image:url(\'https://image.freepik.com/free-photo/wall-wallpaper-concrete-colored-painted-textured-concept_53876-31799.jpg\');\">\r\n        <tbody><tr>\r\n            </tr><tr>\r\n                <td height=\"25\"></td>\r\n            </tr>\r\n            <tr>\r\n                <td>\r\n                    <table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n                        <tbody><tr>\r\n                            <td>&nbsp;</td>\r\n                            <td width=\"580\">\r\n                                <table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n                                    <tbody><tr>\r\n                                        <td align=\"center\">\r\n                                            <img width=\"220px\" src=\"https://www.zagecoin.com/assets/images/fontend_logo/logo.png\" class=\"CToWUd a6T\" tabindex=\"0\"><div class=\"a6S\" dir=\"ltr\" style=\"opacity: 0.01;\"><div id=\":31\" class=\"T-I J-J5-Ji aQv T-I-ax7 L3 a5q\" title=\"Download\" role=\"button\" tabindex=\"0\" aria-label=\"Download attachment \" data-tooltip-class=\"a1V\"><div class=\"akn\"><div class=\"aSK J-J5-Ji aYr\"></div></div></div></div>\r\n                                        </td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td height=\"35\"></td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td>\r\n                                            <table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"background-image:url(\'https://image.freepik.com/free-photo/outdoor-rich-bright-texture-color_1258-140.jpg\'); border-radius:5px\">\r\n                                                <tbody><tr>\r\n                                                    <td width=\"45\"></td>\r\n                                                    <td>\r\n                                                        <font color=\"#888888\">\r\n                                                            </font><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n                                                            <tbody><tr>\r\n                                                                <td height=\"40\"></td>\r\n                                                            </tr>\r\n                                                            <tr>\r\n                                                                <td align=\"center\">\r\n                                                                    <img style=\"vertical-align:middle\" src=\"https://ci3.googleusercontent.com/proxy/adPzyEV9D9Jbj8L4A57WAS15FO5bq7XiKC4dVO72maF9ChdKcyOxfMqzuRKgaqpm9sAOAdPC835-kU2xmuO0Qhvgt_HP=s0-d-e1-ft#https://maxgold24.com/public/confirmation-icon.png\" class=\"CToWUd\">\r\n                                                                </td>\r\n                                                            </tr>\r\n                                                            <tr>\r\n                                                                <td height=\"20\"></td>\r\n                                                            </tr>\r\n                                                            <tr>\r\n                                                                <td style=\"font-family: Arial, Helvetica, sans-serif; font-size: 36px; color: black; font-weight: bold; text-align: center;\">&nbsp;{{subject}}</td>\r\n                                                            </tr>\r\n                                                            <tr>\r\n                                                                <td height=\"10\"></td>\r\n                                                            </tr>\r\n                                                            <tr>\r\n                                                                <td>\r\n                                                                    <table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n                                                                        <tbody><tr>\r\n                                                                            <td></td>\r\n                                                                            <td width=\"26\" height=\"2\" bgcolor=\"#d60100\"></td>\r\n                                                                            <td></td>\r\n                                                                        </tr>\r\n                                                                    </tbody></table>    \r\n                                                                </td>\r\n                                                            </tr>\r\n                                                            <tr>\r\n                                                                <td height=\"15\"><br></td></tr>\r\n                                                           \r\n                                                            <tr>\r\n                                                                <td height=\"40\"><font size=\"4\">Hi, {{name}}</font><br><br>&nbsp;<font size=\"3\">{{message}}</font><br><br></td>\r\n                                                            </tr>\r\n                                                        </tbody></table><font color=\"#888888\">\r\n                                                    </font></td>\r\n                                                    <td width=\"45\"></td>\r\n                                                </tr>\r\n                                                <tr>\r\n                                                    <td colspan=\"3\">\r\n                                                        <table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" bgcolor=\"#363d52\" style=\"background-image:url(\'https://image.freepik.com/free-photo/outdoor-rich-bright-texture-color_1258-140.jpg\'); border-radius:0 0 5px 5px\">\r\n                                                            <tbody><tr>\r\n                                                                <td height=\"12\"></td>\r\n                                                            </tr>\r\n                                                            <tr>\r\n                                                                <td style=\"font-size:16px;line-height:24px;color:#737c96;font-family:Arial,Helvetica,sans-serif;text-align:center\">© LEEWAY 2020</td>\r\n                                                            </tr>\r\n                                                            <tr>\r\n                                                                <td height=\"12\"></td>\r\n                                                            </tr>\r\n                                                        </tbody></table>\r\n                                                    </td>\r\n                                                </tr>\r\n                                            </tbody></table>\r\n                                        </td>\r\n                                    </tr>\r\n                                </tbody></table>\r\n                            </td>\r\n                            <td>&nbsp;</td>\r\n                        </tr>\r\n                    </tbody></table>\r\n                </td>\r\n            </tr>\r\n            <tr>\r\n                <td height=\"25\"></td>\r\n            </tr>\r\n        \r\n    </tbody></table>','info@leeway.com','690289',1,0,'10:00','50','1');
/*!40000 ALTER TABLE `generals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incomes`
--

DROP TABLE IF EXISTS `incomes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incomes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=219 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incomes`
--

LOCK TABLES `incomes` WRITE;
/*!40000 ALTER TABLE `incomes` DISABLE KEYS */;
/*!40000 ALTER TABLE `incomes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lending_logs`
--

DROP TABLE IF EXISTS `lending_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lending_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `lend_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_id` int(11) NOT NULL,
  `back_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `next_time` datetime NOT NULL,
  `remain` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lending_logs`
--

LOCK TABLES `lending_logs` WRITE;
/*!40000 ALTER TABLE `lending_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `lending_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_activities`
--

DROP TABLE IF EXISTS `log_activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` text DEFAULT NULL,
  `url` text DEFAULT NULL,
  `method` text DEFAULT NULL,
  `ip` text DEFAULT NULL,
  `agent` text DEFAULT NULL,
  `user_id` text DEFAULT NULL,
  `track_location` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=657 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_activities`
--

LOCK TABLES `log_activities` WRITE;
/*!40000 ALTER TABLE `log_activities` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_extras`
--

DROP TABLE IF EXISTS `member_extras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member_extras` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `left_paid` int(11) NOT NULL,
  `right_paid` int(11) NOT NULL,
  `left_free` int(11) NOT NULL,
  `right_free` int(11) NOT NULL,
  `left_bv` int(11) NOT NULL,
  `right_bv` int(11) NOT NULL,
  `first_login_email` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=554 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_extras`
--

LOCK TABLES `member_extras` WRITE;
/*!40000 ALTER TABLE `member_extras` DISABLE KEYS */;
INSERT INTO `member_extras` VALUES (533,578,0,0,0,0,0,0,0,'2021-09-02 10:57:27','2021-09-02 10:57:27'),(534,579,0,0,0,0,0,0,0,'2021-09-21 15:09:18','2021-09-21 15:09:18'),(535,580,0,0,0,0,0,0,0,'2021-10-06 08:56:58','2021-10-06 08:56:58'),(536,581,0,0,0,0,0,0,0,'2021-10-06 09:28:38','2021-10-06 09:28:38'),(537,582,0,0,0,0,0,0,0,'2021-10-06 09:30:37','2021-10-06 09:30:37'),(538,583,0,0,0,0,0,0,0,'2021-10-06 10:03:40','2021-10-06 10:03:40'),(539,584,0,0,0,0,0,0,0,'2021-10-06 10:06:34','2021-10-06 10:06:34'),(540,585,0,0,0,0,0,0,0,'2021-10-06 10:09:08','2021-10-06 10:09:08'),(541,586,0,0,0,0,0,0,0,'2021-10-06 10:41:13','2021-10-06 10:41:13'),(542,587,0,0,0,0,0,0,0,'2021-10-06 10:43:04','2021-10-06 10:43:04'),(543,588,0,0,0,0,0,0,0,'2021-10-06 10:57:16','2021-10-06 10:57:16'),(544,589,0,0,0,0,0,0,0,'2021-10-06 16:12:02','2021-10-06 16:12:02'),(545,590,0,0,0,0,0,0,0,'2021-10-06 16:14:02','2021-10-06 16:14:02'),(546,591,0,0,0,0,0,0,0,'2021-10-16 13:58:25','2021-10-16 13:58:25'),(547,592,0,0,0,0,0,0,0,'2021-10-16 15:03:50','2021-10-16 15:03:50'),(548,593,0,0,0,0,0,0,0,'2021-10-16 15:33:28','2021-10-16 15:33:28'),(549,594,0,0,0,0,0,0,0,'2021-10-18 09:20:22','2021-10-18 09:20:22'),(550,595,0,0,0,0,0,0,0,'2021-10-18 14:58:58','2021-10-18 14:58:58'),(551,596,0,0,0,0,0,0,0,'2021-10-19 14:22:29','2021-10-19 14:22:29'),(552,597,0,0,0,0,0,0,0,'2021-10-21 09:50:30','2021-10-21 09:50:30'),(553,598,0,0,0,0,0,0,0,'2021-10-25 15:52:33','2021-10-25 15:52:33');
/*!40000 ALTER TABLE `member_extras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (15,'Why Us','Why Us','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<div><br></div><div><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div><br></div>','2018-02-04 05:33:38','2018-02-06 06:53:19'),(16,'How It\'s Work','How It\'s Work','<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><div><br></div><div><br></div><div><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the&nbsp;</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div><br></div><div><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div><br></div><div><br></div>','2018-02-06 06:16:46','2018-02-06 06:53:31');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_02_01_114204_create_admins_table',1),(4,'2018_02_01_114205_create_admin_password_resets_table',1),(5,'2017_12_18_061348_create_menus_table',2),(6,'2017_12_18_082712_create_logos_table',2),(7,'2017_12_18_092133_create_silders_table',2),(8,'2017_12_18_104142_create_services_table',2),(9,'2017_12_19_043718_create_testimonals_table',2),(10,'2017_12_19_063256_create_socials_table',2),(11,'2017_12_19_074614_create_footers_table',2),(12,'2018_01_25_220231_create_teams_table',2),(13,'2018_01_28_071556_create_contact_uses_table',2),(14,'2017_12_02_061213_create_generals_table',3),(15,'2018_02_05_064723_create_terms_policies_table',3),(16,'2018_02_05_070947_create_charge_commisions_table',3),(19,'2014_10_12_000000_create_users_table',4),(21,'2018_01_30_154801_create_tickets_table',6),(22,'2018_01_30_155004_create_ticket_comments_table',6),(23,'2017_12_28_072948_create_gateways_table',7),(25,'2017_12_28_105104_create_deposits_table',8),(27,'2018_02_11_062847_create_withdraws_table',9),(29,'2018_02_11_141223_create_withdraw_trasections_table',10),(30,'2018_02_12_062428_create_transactions_table',11),(31,'2018_02_18_102350_create_socials_table',12),(32,'2018_02_18_125849_create_member_belows_table',13),(33,'2018_02_18_135728_create_member_extras_table',14),(34,'2018_02_28_070550_create_incomes_table',15),(35,'2018_03_13_100618_create_packages_table',16),(36,'2018_03_13_124905_create_lending_logs_table',17),(37,'2018_03_31_084105_create_newletters_table',18),(38,'2018_03_31_100325_create_news_table',19);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newletters`
--

DROP TABLE IF EXISTS `newletters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `newletters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=468 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newletters`
--

LOCK TABLES `newletters` WRITE;
/*!40000 ALTER TABLE `newletters` DISABLE KEYS */;
INSERT INTO `newletters` VALUES (465,'Test','test123@gmail.com','2021-08-14 13:49:03','2021-08-14 13:49:03'),(466,'Test','sdfcds@fdfd.cvom','2021-08-25 09:03:19','2021-08-25 09:03:19'),(467,'Parveen','kumarparveen2007@gmail.com','2021-08-25 09:34:19','2021-08-25 09:34:19');
/*!40000 ALTER TABLE `newletters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (30,'1627653472.jpg','Direct Joining Commission','<div>test</div>','2021-07-22 18:16:07','2021-07-30 13:57:52');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `packages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `ref_level_1` int(11) DEFAULT 0,
  `ref_level_2` int(11) DEFAULT 0,
  `ref_level_3` int(11) DEFAULT 0,
  `ref_level_4` int(11) DEFAULT 0,
  `ref_level_5` int(11) DEFAULT 0,
  `ref_level_6` int(11) DEFAULT 0,
  `percent` float NOT NULL,
  `action` int(11) NOT NULL,
  `period` int(11) NOT NULL,
  `today_profit_per` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT 1,
  `days` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lend_bonus` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packages`
--

LOCK TABLES `packages` WRITE;
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;
INSERT INTO `packages` VALUES (1,'LEVEL 1','1',5,3,2,1,1,1,0,0,0,'9',1,'365','2020-12-31 00:43:57','2021-09-21 15:07:57',0),(2,'LEVEL 2','2',0,0,0,0,0,0,0,0,0,'0',1,NULL,'2021-07-30 06:03:44','2021-09-21 15:08:06',0),(3,'LEVEL 3','150',0,0,0,0,0,0,0,0,0,'0',1,NULL,'2021-07-30 06:04:11','2021-07-30 06:04:11',0),(4,'LEVEL 4','300',0,0,0,0,0,0,0,0,0,'0',1,NULL,'2021-07-30 06:04:27','2021-07-30 06:04:27',0),(5,'LEVEL 5','750',0,0,0,0,0,0,0,0,0,'0',1,NULL,'2021-07-30 06:04:44','2021-07-30 06:04:44',0),(6,'LEVEL 6','1500',0,0,0,0,0,0,0,0,0,'0',1,NULL,'2021-07-30 06:05:00','2021-07-30 06:05:00',0);
/*!40000 ALTER TABLE `packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('gloryfxsignals@gmail.com','PqfPClBvaDq7RoVuoVY7a3Yfyn3pLb',1,'2021-01-25 04:49:29'),('mob7634@gmail.com','Jc7ZQ0Wb7JV5bLaozv9C7XFGjtLV5Z',0,'2021-04-22 23:09:33'),('mohdfaiz7617@gmail.com','WM4ktZBS0GByKsyKfE72vyl7c6N0zu',1,'2021-05-04 05:52:22'),('mohdfaiz7617@gmail.com','6Q243gZ7c9TCctAbhoIz1bmKhv0qyR',1,'2021-05-04 05:53:08'),('shahida.sost@gmail.com','L2a0gf4nHHXoQkfKC0RRGa0iHgRARM',1,'2021-05-21 07:18:58'),('shahida.sost@gmail.com','F9NbUUrTx5vSbr0Zf0gdhtSfYWrCVO',1,'2021-05-21 07:19:31'),('naverazaka29@gmail.com','nfirBXjlm9AgqXCHixy4Cludkev3vk',1,'2021-05-22 13:02:23'),('tk575990@gmail.com','x6QlcmknDvrA8tMQq5GtSe3pRcDbeY',0,'2021-05-27 05:20:16'),('hamzajamil981@gmail.com','vz4f33WMsgi3kAAV04wcXe7dUmnfRZ',1,'2021-05-29 12:59:22'),('hamzajamil981@gmail.com','cgPHbSbL1PQNtcNRUDEiAJhOOyOoAr',1,'2021-05-29 13:00:05'),('hamzajamil981@gmail.com','DS7NhhlI8upDFJKOKuut9alwpKnQXb',1,'2021-05-29 13:01:28'),('hamzajamil981@gmail.com','H1W9JCOjmd1Trn1R1isKJRgEK5fLEh',1,'2021-05-29 13:05:56'),('hamzajamil981@gmail.com','lxsB0iVvrwE2bGnzMqyg7HGIfyJ0qv',1,'2021-05-29 13:08:01'),('shehzadiifra32@gmail.com','QTc9m1fTt0sQDQp5ArqIaATlKQ9wiZ',1,'2021-05-30 08:39:58'),('shabimughal71@gmail.com','86vcAVAK7V3KdgyH6Uz6Psj0WtJyRH',1,'2021-06-01 14:26:06'),('shabimughal71@gmail.com','HmxJhpKypJeTUPpvSaoELAb5RPNjud',1,'2021-06-01 14:26:13'),('shabimughal71@gmail.com','Q9qEYvUXGHK8RSaEtBLXBKVtur6br6',1,'2021-06-01 14:26:22'),('khawajasahab78@gmail.com','hgK9MrpcOyoyLQitsDgdkfAAsnc67i',1,'2021-06-13 06:19:25'),('umardastgirkhan@gmail.com','m1d81IltNK2yOVhYfsNkVyFJjUg5LL',1,'2021-06-17 09:52:59'),('royrajkumar118@gmail.com','BaotfVvDZUh41dSKPbkTdt9NDv22eX',1,'2021-06-18 12:16:57'),('haqnawaz82983@gmail.com','sRPVtS1cfbRblrbMWoEeo3GBtJuJ2O',1,'2021-06-27 07:00:58'),('shabimughal71@gmail.com','EiFsYuocUwfsdiukfyDUk5SJkcw5qB',1,'2021-07-02 08:14:09'),('shabimughal71@gmail.com','vBwsyo6nB9wP8VJkivkL8lJLXEtHVS',1,'2021-07-02 08:14:19'),('afshee168@gmail.com','d30zNpqb2UqPL8Tv2acwi2RajRnUV5',1,'2021-07-03 13:57:40'),('afshee168@gmail.com','FgdTAaLN0wAhkDrUbrsmvixjEXZU7X',1,'2021-07-03 13:58:13'),('iqra.khalid796@gmail.com','jmS8KY8eIwEwg1c3Jqrduh265d2J5n',1,'2021-07-11 07:03:27'),('iqra.khalid796@gmail.com','Sxbadtv0apYE9VpLfxkgTNgx6wrub1',1,'2021-07-11 07:04:51'),('uffazgill@gmail.com','9KI9bqJstFAfrkNyMyONEJHqvZugD8',1,'2021-07-12 07:23:04'),('ranjhakha75@gmail.com','bd7I0ZOqHQXXA5EJSJDKCj4UpmLY4C',1,'2021-07-15 09:19:00'),('ranjhakha75@gmail.com','UfM7RDpeHulMlYsRdSb03ryd5W1MiS',1,'2021-07-15 09:19:11'),('ranjhakha75@gmail.com','HpvfRh2kBvOo98NkcAmLsF3hatjc5L',1,'2021-07-15 09:19:23'),('ranjhakha75@gmail.com','HYKmTVuGzRE8ne2VsT66I5gYwNlvdg',1,'2021-07-15 09:20:32'),('shariqmsm2198@gmail.com','3lLdndMTilEZOfCXrXVRzsJbxvnQEp',1,'2021-07-16 16:47:39'),('shariqmsm2198@gmail.com','G3AQbmbAeB1lYLTaIK4ZWQ8fiqkvRm',1,'2021-07-16 16:59:56'),('raxixh@gmail.com','2FeDW65v7lJNYIEGVQ0IRHD9p0Pb4e',0,'2021-07-16 05:00:58'),('mohdfaiz7617@gmail.com','QKxpb3opToQ1rWUIpClPF8mcDVM8V5',1,'2021-07-20 07:57:27'),('mohdfaiz7617@gmail.com','HDN2nLyhezxhQ1DE2hivlFbIYKvPvv',1,'2021-07-20 07:58:24'),('shafi7827500@gmail.com','tjMz0lyGAsPGbMeyh2K4AG7DGM2dOX',1,'2021-07-24 09:00:26'),('azamjan89011@gmail.Com','ATufc2hF1pACiSLIeVllvTEQfzICo2',1,'2021-07-24 14:03:03'),('azamjan89011@gmail.Com','rzeQ7xxwXfwo2D2cpJVsxhJYbAMN95',1,'2021-07-24 14:03:29'),('azamjan89011@gmail.Com','QzZVXvHLAapdxQkDuwzjvzzRWcNvQT',1,'2021-07-24 14:06:27'),('azamjan89011@gmail.Com','jNjOrw4C7zAEKXPm6da6bWZa2bOsC6',1,'2021-07-24 14:06:34'),('azamjan89011@gmail.Com','wjVPzMRrGDZiGOVaGlaXWJKnQTG0h6',1,'2021-07-24 14:06:41'),('azamjan89011@gmail.Com','6VJn1w0FkrivP1XdaPygWUVFPTt8SK',1,'2021-07-24 14:06:50'),('azamjan89011@gmail.Com','IBXbJ9VwakomEk7UirHzBzyIkeAaRT',1,'2021-07-24 14:07:25'),('azamjan89011@gmail.Com','cKsyVx2qKJ1AW3SyTnuAHQf4vXUT0d',1,'2021-07-24 14:15:12'),('azamjan89011@gmail.Com','7x2CWh0mU9xZAJ5NKwsFXh545Ic7yY',1,'2021-07-24 14:38:58'),('azamjan89011@gmail.Com','E1UnH7tgTv3IyReiWTeKwpD2y3qiGS',1,'2021-07-25 13:29:17'),('asadaftab255@gmail.com','GOhqjEGfjvficz08yRtdfQG1o8Urmy',1,'2021-07-25 10:55:16'),('saleemjutt737387500@gmail.com','1cYulOeT56ehYku50pqUkZUKYHoZ1g',1,'2021-07-26 14:27:08'),('saleemjutt737387500@gmail.com','8bzlGfY53MmKfi07R9CoBRReVDZREf',1,'2021-07-26 14:27:20'),('saleemjutt737387500@gmail.com','fepEpltqKsiYz5itoszOuD1isKmD2V',1,'2021-07-26 14:54:49'),('saleemjutt737387500@gmail.com','JOd8peTxweuUGnyU1b88wPGaCq4A24',1,'2021-07-26 14:55:11'),('saleemjutt737387500@gmail.com','NoyryRpVk67QLzQkTh4YMjoiZV83Th',1,'2021-07-26 14:55:44'),('saleemjutt737387500@gmail.com','Xj5ij1xdppoZpYEvpFBhAtcuDzxZg0',1,'2021-07-26 14:56:01'),('saleemjutt737387500@gmail.com','BAAFmld55dVpXNX9QKNfgV5XJxGP2n',1,'2021-07-26 14:56:11'),('saleemjutt737387500@gmail.com','YWZPDMxlCB2voE1LRcCuZzMXQTRz6w',1,'2021-07-26 14:56:47'),('saleemjutt737387500@gmail.com','9dfFOZfBEVqRahhVAsvCA60RSaOQdc',1,'2021-07-26 14:56:54'),('saleemjutt737387500@gmail.com','GVkRjYARjF823l1Hyf7gmCWsWvhA4f',1,'2021-07-26 14:57:02'),('saleemjutt737387500@gmail.com','USHXITYXbW5vTcWXQT4fWr0qJh9amI',1,'2021-07-26 14:59:29'),('saleemjutt737387500@gmail.com','x3wUWXAyXcswtEkqgV8VCvmu1iqVkh',1,'2021-07-26 14:59:57'),('saleemjutt737387500@gmail.com','5iz9fpa6q3pYpIrzUQe98Yca4NOH9o',1,'2021-07-26 14:59:57'),('saleemjutt737387500@gmail.com','WKTjE8mPN2bPeqxW00FUOrHac6Ta7u',1,'2021-07-26 14:59:57'),('saleemjutt737387500@gmail.com','zGlS4J2BZD7rBXogd1w01PCSoD2INw',1,'2021-07-26 14:59:57'),('saleemjutt737387500@gmail.com','aRdkmFrc3FMVqZg6aqH8bFCqwaBuxS',1,'2021-07-26 14:59:58'),('saleemjutt737387500@gmail.com','UzgOtf28FaUOMmxDsztvhUHDF1eAVb',1,'2021-07-26 14:59:58'),('saleemjutt737387500@gmail.com','S86e7UvzOwuOlWuInU38Qk4CPUBgvC',1,'2021-07-26 14:59:59'),('saleemjutt737387500@gmail.com','OwIYDiYADCzhOt8EW74jAtoJbthpex',1,'2021-07-26 14:59:59'),('saleemjutt737387500@gmail.com','eKdjFq5sO4PpJzs7TGaCNTwKAhhMwL',1,'2021-07-26 15:00:00'),('saleemjutt737387500@gmail.com','K1BnpQTKSrFOyf6UbjBhsnJFBOjKtk',1,'2021-07-26 15:06:26'),('saleemjutt737387500@gmail.com','VOByhPqvltRqAYV2jS5KCBXHQTsCrd',1,'2021-07-26 15:09:57'),('saleemjutt737387500@gmail.com','FINk8b8q0HJ9NvJDPhNPlBwOKl6JBn',1,'2021-07-26 15:11:17'),('saleemjutt737387500@gmail.com','DdhMtAnHA6k0IdHPDwZdaQlopyRbof',1,'2021-07-26 15:13:46');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vdo_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `option_1` text NOT NULL,
  `option_2` text NOT NULL,
  `option_3` text NOT NULL,
  `option_4` text NOT NULL,
  `correct_option` varchar(11) NOT NULL,
  `marks` varchar(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (1,6,'Test question','1','2','3','4','1','10',0,'2021-08-13 06:27:57'),(3,5,'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used','1','2','3','4','1','10',0,'2021-08-13 14:39:31'),(4,5,'Ddemonstrate the visual form of a document','1','2','3','5','1','10',0,'2021-08-13 14:40:14'),(5,5,'Lorem ipsum may be used as.','1','2','3','4','1','10',0,'2021-08-13 14:43:25'),(6,5,'You are doing test Leeway smart contract.','yes','No','Correct','Not Correct','1','10',0,'2021-08-13 14:44:47'),(7,5,'Test Question','1','2','3','4','1','10',0,'2021-08-14 13:52:19'),(8,6,'Test','1','2','3','4','1','10',0,'2021-08-30 12:07:34');
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `result` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `vdo_id` int(11) NOT NULL,
  `totalQuestions` varchar(11) NOT NULL DEFAULT '0',
  `total_notanswer` varchar(11) NOT NULL DEFAULT '0',
  `correct_ans` varchar(11) NOT NULL DEFAULT '0',
  `wrong_ans` varchar(11) NOT NULL DEFAULT '0',
  `quiz_total_marks` varchar(11) NOT NULL DEFAULT '0',
  `total_marks` varchar(11) NOT NULL DEFAULT '0',
  `get_total_perc` varchar(11) NOT NULL DEFAULT '0',
  `result_status` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `result`
--

LOCK TABLES `result` WRITE;
/*!40000 ALTER TABLE `result` DISABLE KEYS */;
INSERT INTO `result` VALUES (7,579,5,'5','0','0','5','50','0','0','Failed','2021-09-21 12:44:45'),(8,579,5,'5','0','5','0','50','50','100','Passed','2021-09-21 12:47:02'),(9,579,6,'2','0','2','0','20','20','100','Passed','2021-09-21 12:49:28'),(10,598,5,'5','0','1','4','50','10','20','Failed','2021-10-25 13:24:21'),(11,598,5,'5','0','2','3','50','20','40','Failed','2021-10-25 13:25:35'),(12,598,5,'5','0','5','0','50','50','100','Passed','2021-10-25 16:06:09'),(13,598,5,'5','0','5','0','50','50','100','Passed','2021-10-25 16:34:05');
/*!40000 ALTER TABLE `result` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roi_transactions`
--

DROP TABLE IF EXISTS `roi_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roi_transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `trans_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_balance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1086 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roi_transactions`
--

LOCK TABLES `roi_transactions` WRITE;
/*!40000 ALTER TABLE `roi_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `roi_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sell_coins`
--

DROP TABLE IF EXISTS `sell_coins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sell_coins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `coin_amount` varchar(11) DEFAULT NULL,
  `no_of_coins` int(11) DEFAULT NULL,
  `total_amount` varchar(11) DEFAULT NULL,
  `coin_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sell_coins`
--

LOCK TABLES `sell_coins` WRITE;
/*!40000 ALTER TABLE `sell_coins` DISABLE KEYS */;
/*!40000 ALTER TABLE `sell_coins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (3,'gift','Free Coins','<p style=\"margin:0in;margin-bottom:.0001pt\"><font size=\"2\">After joining, You will Get 1000 Coins worth $100 and also earn 500 coins worth $50 from the first 5 Referrals</font><br></p>','2018-02-05 05:15:22','2021-07-12 07:15:57'),(5,'sitemap','Network Marketing','<p style=\"margin:0in;margin-bottom:.0001pt\"><font size=\"2\"><span style=\"font-family: Arial, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Offering Network Marketing&nbsp; Upgrade account with $ 20&nbsp;&nbsp;</span><span style=\"font-family: Arial, sans-serif;\">Get 2$ On\r\nEvery Referal Upgrade, Plus $40 On every three Members</span></font></p>','2018-02-05 05:31:06','2021-07-12 07:16:32'),(7,'university','Investment Plans','<font size=\"2\">Offering Investment Plan 8% to 24% Monthly profit on your investment, earn 2% to 5% Deposit bonus till 3 Levels</font><br>','2018-02-05 05:52:40','2021-07-12 16:25:45'),(10,'umbrella','Bonuses','<p style=\"margin:0in;margin-bottom:.0001pt\"><span style=\"font-family: Arial, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><font size=\"2\">&nbsp;You will be awarded extra bonuses every month or two. These could be in the form of cash, Gifts or International Tours</font></span></p>','2018-04-16 00:16:50','2021-07-12 07:17:01'),(11,'suitcase','Salaries','<font size=\"2\"><span style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: Arial, sans-serif;\">Get Fixed Salary from your referral investment till 3rd Level and get 2%&nbsp;</span><span style=\"font-family: Arial, sans-serif;\">&nbsp;to 5% Monthly salary of total Investment.</span></font><br>','2021-02-25 03:21:54','2021-07-12 07:17:15'),(12,'bullhorn','Promotions','<p style=\"margin:0in;margin-bottom:.0001pt\"><font size=\"2\"><span style=\"font-family: Arial, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">New Promotions\r\nevery month To Encourage&nbsp;</span><span style=\"font-family: Arial, sans-serif;\">Our\r\nSuperactive Members. Free Mobiles, Laptops, iPhone IPad, and Tours</span></font></p>','2021-05-04 22:19:44','2021-07-12 07:17:29'),(13,'tv','24/7 Support','<p style=\"margin:0in;margin-bottom:.0001pt\"><font size=\"2\"><span style=\"font-family: Arial, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Our Technical The team Is always ready to Answer Your Queries.&nbsp;</span><span style=\"font-family: Arial, sans-serif;\">Need Help?&nbsp;</span><span style=\"font-family: Arial, sans-serif;\">Contact at\r\nsupport@zagecoin.com.</span></font></p>','2021-05-04 22:24:27','2021-07-12 07:17:38');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `silders`
--

DROP TABLE IF EXISTS `silders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `silders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `silders`
--

LOCK TABLES `silders` WRITE;
/*!40000 ALTER TABLE `silders` DISABLE KEYS */;
INSERT INTO `silders` VALUES (19,'1621589114.jpg','WELCOME TO LEEWAY SMART CONTRACTS','We are here To make your dreams successful.','2018-02-14 16:25:13','2021-07-29 05:16:30'),(22,'1620472405.jpg','LEEWAY SMART CONTRACTS','A Step Toward Blockchain','2021-05-08 20:43:25','2021-07-29 05:16:43');
/*!40000 ALTER TABLE `silders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `socials`
--

DROP TABLE IF EXISTS `socials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `socials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `socials`
--

LOCK TABLES `socials` WRITE;
/*!40000 ALTER TABLE `socials` DISABLE KEYS */;
INSERT INTO `socials` VALUES (1,'fa-twitter','https://twitter.com/','2018-02-18 04:33:29','2021-07-30 13:58:34'),(3,'fa-facebook','https://www.facebook.com/','2018-02-18 04:51:34','2021-07-30 13:58:46'),(4,'fa-youtube','https://www.youtube.com','2018-02-18 04:53:57','2018-04-17 07:34:23'),(6,'fa-instagram','https://www.instagram.com/','2018-04-17 07:34:50','2021-07-30 13:58:54');
/*!40000 ALTER TABLE `socials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (11,'News Heading','News Description','1627398623.jpg','List','','','','2021-05-23 13:28:13','2021-07-27 15:10:49');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonals`
--

DROP TABLE IF EXISTS `testimonals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `star` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonals`
--

LOCK TABLES `testimonals` WRITE;
/*!40000 ALTER TABLE `testimonals` DISABLE KEYS */;
INSERT INTO `testimonals` VALUES (4,'1523862086.jpg','Pranto Roy','3','\"Great Service! II have been worried about investing. but when i came here i Don\'t have to worry anymore\"','2018-04-16 00:58:50','2021-07-11 16:32:28'),(5,'1523972308.jpg','abir Khan','5','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.','2018-04-17 07:37:50','2018-04-17 07:38:28'),(6,'1614063924.jpg','Flavia','5','This is a great way to find the fastest growing MLM companies to join. ... It is a very solid compensation plan relative to others','2021-02-23 07:05:24','2021-02-23 07:05:24'),(7,'1614222535.jpg','Katherine Dsuza','5','This is a great way to find the fastest growing MLM companies to join. ..','2021-02-25 03:08:55','2021-02-25 03:08:55'),(8,'1620129394.jpg','Andrey Andreev','5','I have invested into the investment plan of Zage. I really love this plan as they have helped me in securing the life and can happily secure my family’','2021-05-04 21:24:01','2021-07-11 16:34:13'),(9,'1622132213.jpg','Eda Hela','5','I successfully will help to Compel and find good MLM and investment plan. I will help my clients to carve a niche of their own in the online circuit with','2021-05-28 01:46:53','2021-07-11 16:33:32');
/*!40000 ALTER TABLE `testimonals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket_comments`
--

DROP TABLE IF EXISTS `ticket_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket_comments`
--

LOCK TABLES `ticket_comments` WRITE;
/*!40000 ALTER TABLE `ticket_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `ticket_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ticket` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `token_wallet`
--

DROP TABLE IF EXISTS `token_wallet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `token_wallet` (
  `token_wallet_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`token_wallet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `token_wallet`
--

LOCK TABLES `token_wallet` WRITE;
/*!40000 ALTER TABLE `token_wallet` DISABLE KEYS */;
/*!40000 ALTER TABLE `token_wallet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `trans_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_balance` decimal(10,2) NOT NULL,
  `type` int(11) NOT NULL,
  `trading_cycle` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1057,30,'1221266299','2021-09-02 13:57:27','Direct Sponsor CommisionDP232814945','0.9998999999999999',1.00,25,NULL,'2021-09-02 10:57:27','2021-09-02 10:57:27',NULL),(1058,30,'1069001933','2021-09-02 13:57:27','Level CommisionDP2045973519','0.29996999999999996',1.30,26,NULL,'2021-09-02 10:57:27','2021-09-02 10:57:27',NULL),(1059,30,'2080665063','2021-09-21 18:09:09','Direct Sponsor CommisionDP1126687658','0.9998999999999999',2.30,25,NULL,'2021-09-21 15:09:09','2021-09-21 15:09:09',NULL),(1060,30,'785064870','2021-09-21 18:09:18','Level CommisionDP1832837624','0.29996999999999996',2.60,26,NULL,'2021-09-21 15:09:18','2021-09-21 15:09:18',NULL),(1061,579,'1904507076','2021-09-23 23:25:59','WITHDRAW #ID-WD872932873','-0.00007',0.00,2,NULL,'2021-09-23 20:25:59','2021-09-23 20:25:59','0'),(1062,579,'378482862','2021-09-24 11:52:03','WITHDRAW #ID-WD1866570158','-2',-2.00,2,NULL,'2021-09-24 08:52:03','2021-09-24 08:52:03','0'),(1063,30,'1190144496','2021-10-06 11:56:51','Direct Sponsor CommisionDP101352457','0.3333',2.93,25,NULL,'2021-10-06 08:56:51','2021-10-06 08:56:51',NULL),(1064,30,'1597990787','2021-10-06 11:56:58','Level CommisionDP208466126','0.09998999999999998',3.03,26,NULL,'2021-10-06 08:56:58','2021-10-06 08:56:58',NULL),(1065,30,'1296745900','2021-10-06 12:28:31','Direct Sponsor CommisionDP671022257','0.3333',3.36,25,NULL,'2021-10-06 09:28:31','2021-10-06 09:28:31',NULL),(1066,30,'524253549','2021-10-06 12:28:38','Level CommisionDP734370683','0.09998999999999998',3.46,26,NULL,'2021-10-06 09:28:38','2021-10-06 09:28:38',NULL),(1067,30,'1461446427','2021-10-06 12:30:29','Direct Sponsor CommisionDP773579304','0.3333',3.79,25,NULL,'2021-10-06 09:30:29','2021-10-06 09:30:29',NULL),(1068,30,'1837028724','2021-10-06 12:30:37','Level CommisionDP742197582','0.09998999999999998',3.89,26,NULL,'2021-10-06 09:30:37','2021-10-06 09:30:37',NULL),(1069,30,'1146742694','2021-10-06 13:03:35','Direct Sponsor CommisionDP1842379607','0.3333',4.22,25,NULL,'2021-10-06 10:03:35','2021-10-06 10:03:35',NULL),(1070,30,'1680430028','2021-10-06 13:03:40','Level CommisionDP609430325','0.09998999999999998',4.32,26,NULL,'2021-10-06 10:03:40','2021-10-06 10:03:40',NULL),(1071,30,'1501968299','2021-10-06 13:06:26','Direct Sponsor CommisionDP1940434238','0.3333',4.65,25,NULL,'2021-10-06 10:06:26','2021-10-06 10:06:26',NULL),(1072,30,'1219171433','2021-10-06 13:06:34','Level CommisionDP931041983','0.09998999999999998',4.75,26,NULL,'2021-10-06 10:06:34','2021-10-06 10:06:34',NULL),(1073,30,'394726962','2021-10-06 13:09:01','Direct Sponsor CommisionDP18883776','0.3333',5.08,25,NULL,'2021-10-06 10:09:01','2021-10-06 10:09:01',NULL),(1074,30,'338982499','2021-10-06 13:09:08','Level CommisionDP1600534285','0.09998999999999998',5.18,26,NULL,'2021-10-06 10:09:08','2021-10-06 10:09:08',NULL),(1075,30,'27257834','2021-10-06 13:41:07','Direct Sponsor CommisionDP93485644','0.3333',5.51,25,NULL,'2021-10-06 10:41:07','2021-10-06 10:41:07',NULL),(1076,30,'513863745','2021-10-06 13:41:13','Level CommisionDP1631273456','0.09998999999999998',5.61,26,NULL,'2021-10-06 10:41:13','2021-10-06 10:41:13',NULL),(1077,30,'1644425014','2021-10-06 13:42:57','Direct Sponsor CommisionDP1951658243','0.3333',5.94,25,NULL,'2021-10-06 10:42:57','2021-10-06 10:42:57',NULL),(1078,30,'618749979','2021-10-06 13:43:04','Level CommisionDP1722611682','0.09998999999999998',6.04,26,NULL,'2021-10-06 10:43:04','2021-10-06 10:43:04',NULL),(1079,30,'746152199','2021-10-06 13:57:09','Direct Sponsor CommisionDP1422931185','0.3333',6.37,25,NULL,'2021-10-06 10:57:09','2021-10-06 10:57:09',NULL),(1080,30,'1804950235','2021-10-06 13:57:16','Level CommisionDP187551853','0.09998999999999998',6.47,26,NULL,'2021-10-06 10:57:16','2021-10-06 10:57:16',NULL),(1081,30,'1474512775','2021-10-06 19:12:02','Direct Sponsor CommisionDP1009788227','0.3333',6.80,25,NULL,'2021-10-06 16:12:02','2021-10-06 16:12:02',NULL),(1082,30,'62080003','2021-10-06 19:12:02','Level CommisionDP371342622','0.09998999999999998',6.90,26,NULL,'2021-10-06 16:12:02','2021-10-06 16:12:02',NULL),(1083,30,'116585814','2021-10-06 19:14:02','Direct Sponsor CommisionDP34461253','0.3333',7.23,25,NULL,'2021-10-06 16:14:02','2021-10-06 16:14:02',NULL),(1084,30,'603427055','2021-10-06 19:14:02','Level CommisionDP2097564075','0.09998999999999998',7.33,26,NULL,'2021-10-06 16:14:02','2021-10-06 16:14:02',NULL),(1085,30,'1891138202','2021-10-16 16:58:25','Direct Sponsor CommisionDP947733332','0.3333',7.66,25,NULL,'2021-10-16 13:58:25','2021-10-16 13:58:25',NULL),(1086,30,'1284271736','2021-10-16 16:58:25','Level CommisionDP273025193','0.09998999999999998',7.76,26,NULL,'2021-10-16 13:58:25','2021-10-16 13:58:25',NULL),(1087,30,'337934964','2021-10-16 18:03:50','Direct Sponsor CommisionDP481882733','0.3333',8.09,25,NULL,'2021-10-16 15:03:50','2021-10-16 15:03:50',NULL),(1088,30,'853931623','2021-10-16 18:03:50','Level CommisionDP472146320','0.09998999999999998',8.19,26,NULL,'2021-10-16 15:03:50','2021-10-16 15:03:50',NULL),(1089,30,'1883853137','2021-10-16 18:33:28','Direct Sponsor CommisionDP1175384751','0.3333',8.52,25,NULL,'2021-10-16 15:33:28','2021-10-16 15:33:28',NULL),(1090,30,'655800902','2021-10-16 18:33:28','Level CommisionDP2105861463','0.09998999999999998',8.62,26,NULL,'2021-10-16 15:33:28','2021-10-16 15:33:28',NULL),(1091,30,'1178913225','2021-10-18 12:20:22','Direct Sponsor CommisionDP1079385758','0.3333',8.95,25,NULL,'2021-10-18 09:20:22','2021-10-18 09:20:22',NULL),(1092,30,'1635446648','2021-10-18 12:20:22','Level CommisionDP1585500395','0.09998999999999998',9.05,26,NULL,'2021-10-18 09:20:22','2021-10-18 09:20:22',NULL),(1093,30,'976811753','2021-10-18 17:58:58','Direct Sponsor CommisionDP2137085098','0.3333',9.38,25,NULL,'2021-10-18 14:58:58','2021-10-18 14:58:58',NULL),(1094,30,'495303376','2021-10-18 17:58:58','Level CommisionDP1909272209','0.09998999999999998',9.48,26,NULL,'2021-10-18 14:58:58','2021-10-18 14:58:58',NULL),(1095,30,'1771454582','2021-10-19 17:22:29','Direct Sponsor CommisionDP1642876448','0.3333',9.81,25,NULL,'2021-10-19 14:22:29','2021-10-19 14:22:29',NULL),(1096,30,'2112784163','2021-10-19 17:22:29','Level CommisionDP1701547891','0.09998999999999998',9.91,26,NULL,'2021-10-19 14:22:29','2021-10-19 14:22:29',NULL),(1097,30,'1056172695','2021-10-21 12:50:30','Direct Sponsor CommisionDP1813784693','0.3333',10.24,25,NULL,'2021-10-21 09:50:30','2021-10-21 09:50:30',NULL),(1098,30,'1812772730','2021-10-21 12:50:30','Level CommisionDP2031653047','0.09998999999999998',10.34,26,NULL,'2021-10-21 09:50:30','2021-10-21 09:50:30',NULL),(1099,579,'1859207761','2021-10-25 11:28:37','Withdraw Refund#ID-WD1866570158','-2',0.00,50,NULL,'2021-10-25 08:28:37','2021-10-25 08:28:37',NULL),(1100,579,'766873490','2021-10-25 11:28:43','Withdraw Request Accept#ID-WD1866570158','-2',2.00,50,NULL,'2021-10-25 08:28:43','2021-10-25 08:28:43',NULL),(1101,579,'1354826219','2021-10-25 11:28:47','Withdraw Refund#ID-WD872932873','-0.00007',0.00,50,NULL,'2021-10-25 08:28:47','2021-10-25 08:28:47',NULL),(1102,579,'1580249424','2021-10-25 18:52:33','Direct Sponsor CommisionDP657199642','0.3333',2.33,25,NULL,'2021-10-25 15:52:33','2021-10-25 15:52:33',NULL),(1103,579,'326840884','2021-10-25 18:52:33','Level CommisionDP2108984649','0.09998999999999998',2.43,26,NULL,'2021-10-25 15:52:33','2021-10-25 15:52:33',NULL);
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `referrer_id` int(11) NOT NULL,
  `pack_id` int(11) DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_without_encrypt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` enum('L','R') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posid` int(11) DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` decimal(10,2) DEFAULT NULL,
  `lewt_balance` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `coin_balance` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roi_balance` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `salary_balance` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `monthly_profit_balance` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `direct_joining_commision` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `join_date` date NOT NULL,
  `custom_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL,
  `paid_status` int(1) DEFAULT NULL,
  `upgrade_datetime` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ver_status` int(1) DEFAULT NULL,
  `ver_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forget_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_day` date DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tauth` int(11) DEFAULT 0,
  `tfver` int(11) DEFAULT 0,
  `emailv` int(11) DEFAULT 0,
  `smsv` int(11) DEFAULT 0,
  `change_pass_otp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vsent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `vercode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `secretcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc` int(11) NOT NULL DEFAULT 0,
  `kyc1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc1_back` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perfect_detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_not_updated` int(11) NOT NULL DEFAULT 0,
  `redeem_joining_coins` int(11) NOT NULL DEFAULT 0,
  `trans_hash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `all_levels` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privateKey` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_user_white_listed` enum('no','yes') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=599 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (30,0,1,'0xca959343b3296ff92d25311aaaacd0839cb170c12','$2y$10$.rWc1cxea4yQGFWDUk3fpeOjPY3A1G0AGTh.7V3lj0z17c3sZ.H6C','latest@123',NULL,NULL,'','',10.34,NULL,'0','0','0','0','0','2020-12-29','2020-12-29',1,1,'2021-01-22 07:01:25',0,'230386','0',NULL,'','',NULL,NULL,'','','vPTt9SsuEP7uwxDIVPf8m0FqEYi2vS2nQY5zuNozwYSfTPEFp9KDAYpzGEDF','2020-12-29 02:56:32','2021-10-21 09:50:30',0,1,1,1,'57962918','0','hVB3qBUQuc','0',NULL,0,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,NULL,NULL,'no'),(578,30,1,'0xca959343b3296ff92d25311aaaacd0839cb170c11','$2y$10$4.tTEZgmK3P.Jp/JSctVtOEOoGIKFRMrxuDfDOeO1jLADIAodb4na','0xca959343b3296ff92d25311aaaacd0839cb170c1',NULL,NULL,'','',0.00,NULL,NULL,'0','0','0','0','2021-09-02','2021-09-02 00:00:00',1,0,NULL,0,'571247','0',NULL,'','',NULL,NULL,'',NULL,'CT0ZABnq3V26oWL7UvVVnWgQx1kOEM0QffKehiHuaQnCukRzNHFK5I47loQp','2021-09-02 10:57:27','2021-09-24 08:19:54',0,1,1,1,NULL,'1630571247','130500','0',NULL,0,NULL,NULL,NULL,NULL,NULL,0,0,'0x2fa024e1175deb985943b2b6ddf77941f5cd8f16a9e6719d016a7471ae2aa2e2','012','0x86806d9d8daa30e78ce740c0c1d5abd07ec90d9941b6f2b793f210aae6e7b0c9','0xDc17d9bA027284dcb10d576D43a182a7aA86b84D','no'),(579,30,3,'0xca959343b3296ff92d25311aaaacd0839cb170c1123','$2y$10$/zZ2L3zGGwI14aihzqrJtel.NIe4hOMDhH5Dpah7fYO6NoRrEFmO2','0xca959343b3296ff92d25311aaaacd0839cb170c1',NULL,NULL,'','',2.43,'5',NULL,'0','0','0','0','2021-09-21','2021-09-21 00:00:00',1,0,NULL,0,'227949','0',NULL,'','',NULL,NULL,'',NULL,'rM4pW06p3KCJ0XnIwKCQUmqyEFYB0I6rwSrfA7dKMiBP2mTNbenB7LJATiOp','2021-09-21 15:09:09','2021-10-25 15:52:33',0,1,1,1,NULL,'1632227949','162288','0',NULL,0,NULL,NULL,NULL,NULL,NULL,0,0,'0x3ae93a3b369228f842a0723c29add6561e85fc6df5c92544b0d6ff4dee2e2f7f','012','0xd5d39b57743185dc4ef337ab00d73016e6ad15747533b43ce2dc4abade9927e6','0x24bdc48Dae02f4677dD2F51Bd5597145Bdb8A1fC','yes'),(594,30,1,'0x915c5690fdf79f95095dfc47e23773d263c55d29','$2y$10$xvagraYAnw1YVuuDWFP0F.ne22EKnyEQZwUXWfiJ4wj2etXXPJj.m','0x915c5690fdf79f95095dfc47e23773d263c55d29',NULL,NULL,'','',0.00,'3',NULL,'0','0','0','0','2021-10-18','2021-10-18 00:00:00',1,0,NULL,0,'539822','0',NULL,'','',NULL,NULL,'',NULL,'K81jIaXraUdCSIogtLm85e8nLSlcGcyk8tJzZoCMHM4zQ5u6gJjxHjNH3mS9','2021-10-18 09:20:22','2021-10-18 09:20:22',0,1,1,1,NULL,'1634539822','160254','0',NULL,0,NULL,NULL,NULL,NULL,NULL,0,0,'0xbdd9dbaec87583983f9074f2c5da82c5721cadc24fc3aac3ba1ce56f355179bd','01','0xbbf324bad09930119f8029b78fb9f843200c2d2753a2ad688f10f74dc5146e57','0x0A7f512f1E3Cb2aF364ca4EA7aaC24d9a0a7Bf5b','no'),(595,30,1,'0x3b07201606a3a0026f5bc74e5a348f417f17aa00','$2y$10$PHi68KsBplJTa8d6VkgCxuOjaFtucQGIl5GQZ2MMdFoFjH3/TLuMm','0x3b07201606a3a0026f5bc74e5a348f417f17aa00',NULL,NULL,'','',0.00,NULL,NULL,'0','0','0','0','2021-10-18','2021-10-18 00:00:00',1,0,NULL,0,'560138','0',NULL,'','',NULL,NULL,'',NULL,NULL,'2021-10-18 14:58:58','2021-10-18 14:58:58',0,1,1,1,NULL,'1634560138','553155','0',NULL,0,NULL,NULL,NULL,NULL,NULL,0,0,'0x7868b663ac673c0453787c8f8b12802f50afc759c451cb5a6ddbef6162226f88','01','0xbe66ab824f6e90b7853df03fba4442a10bd63c6a1c529bb7d648246aa80756c8','0xBc043E280b0218db02B24C8E7E99d8B5618118Ee','no'),(597,30,1,'0x6d49bf5894c94026a73b2f0eaea16eb626465bb4','$2y$10$cTZ9/T1s2ff3Gky5lwEnguGryz3NwXX4dI.psEpL2z7MDkxeb8y2a','0x6d49bf5894c94026a73b2f0eaea16eb626465bb4',NULL,NULL,'','',0.00,NULL,NULL,'0','0','0','0','2021-10-21','2021-10-21 00:00:00',1,0,NULL,0,'800829','0',NULL,'','',NULL,NULL,'',NULL,NULL,'2021-10-21 09:50:30','2021-10-21 09:50:30',0,1,1,1,NULL,'1634800830','575668','0',NULL,0,NULL,NULL,NULL,NULL,NULL,0,0,'0x77f4517e64c4e4eb23577cf85635c01d8c42eb6e9fd211421fa638e18abb8442','01','0xbbe61d7f8173d9a1ecb72b955c9291b16a4346448c9829b4c711479f7b3b10bb','0xE9Fc53346b4FcE8a845d2BD9E1DD146C5b165EC7','yes'),(598,579,1,'0xca959343b3296ff92d25311aaaacd0839cb170c1','$2y$10$uQH6AmTO9SLiSbDgTcQJW.Tdm4rit4E/8WnZiKIUTP9Ir2HdvH.WK','0xca959343b3296ff92d25311aaaacd0839cb170c1',NULL,NULL,'','',0.00,'0.6',NULL,'0','0','0','0','2021-10-25','2021-10-25 00:00:00',1,0,NULL,0,'168153','0',NULL,'','',NULL,NULL,'',NULL,NULL,'2021-10-25 15:52:33','2021-10-25 16:06:52',0,1,1,1,NULL,'1635168153','162705','0',NULL,0,NULL,NULL,NULL,NULL,NULL,0,0,'0xe189395f0e47806168a8018fb6ea8b66b0e51428269646f23dd9aa7cebb9f45e','01','0x8b9831d7ce84c614cd6d5dd2bca655e71a92e90fbd2ffd34e1c472f8698388e4','0x6B4d3D107fef6868b9b5A9762303fC01e91F0d09','no');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pack_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `video` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (4,1,'test1','kjdfhvkj','file_example_MP4_480_1_5MG.mp4','2021-08-02 07:43:30'),(5,1,'Testing 2','testing video','file_example_MP4_480_1_5MG.mp4','2021-08-02 07:54:08'),(6,2,'test1','dfvdsbfvhjds cfdsnjk sdh ckds','file_example_MP4_480_1_5MG.mp4','2021-08-02 07:54:31');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wallets`
--

DROP TABLE IF EXISTS `wallets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wallets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `direct_amount` varchar(100) NOT NULL,
  `cash_amount` varchar(100) NOT NULL,
  `trader_amount` varchar(100) NOT NULL,
  `custom_amount` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wallets`
--

LOCK TABLES `wallets` WRITE;
/*!40000 ALTER TABLE `wallets` DISABLE KEYS */;
/*!40000 ALTER TABLE `wallets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `withdraw_trasections`
--

DROP TABLE IF EXISTS `withdraw_trasections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `withdraw_trasections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `withdraw_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `processing_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `respond_message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `method_cur` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `withdraw_trasections`
--

LOCK TABLES `withdraw_trasections` WRITE;
/*!40000 ALTER TABLE `withdraw_trasections` DISABLE KEYS */;
INSERT INTO `withdraw_trasections` VALUES (23,'WD872932873','579','0.00007','0','LEWT Token','0','','ok',3,'2021-09-23 20:25:59','2021-10-25 08:28:47','LEWT'),(24,'WD1866570158','579','2','0','Lewt Token','0','ok','ok',3,'2021-09-24 08:52:03','2021-10-25 08:28:37','2');
/*!40000 ALTER TABLE `withdraw_trasections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `withdraws_method`
--

DROP TABLE IF EXISTS `withdraws_method`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `withdraws_method` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_amo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_amo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chargefx` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chargepc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `processing_day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `withdraws_method`
--

LOCK TABLES `withdraws_method` WRITE;
/*!40000 ALTER TABLE `withdraws_method` DISABLE KEYS */;
INSERT INTO `withdraws_method` VALUES (15,'Lewt Token','1632463542.jpg','1','100','0','0','1','0',1,'LEWT','2021-09-24 08:35:42','2021-09-24 08:35:42');
/*!40000 ALTER TABLE `withdraws_method` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-10  0:03:03

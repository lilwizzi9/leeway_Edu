-- MySQL dump 10.19  Distrib 10.2.41-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: postfix
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
-- Current Database: `postfix`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `postfix` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `postfix`;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `modified` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Postfix Admin - Virtual Admins';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alias`
--

DROP TABLE IF EXISTS `alias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alias` (
  `address` varchar(255) NOT NULL,
  `goto` text NOT NULL,
  `domain` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `modified` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`address`),
  KEY `domain` (`domain`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Postfix Admin - Virtual Aliases';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alias`
--

LOCK TABLES `alias` WRITE;
/*!40000 ALTER TABLE `alias` DISABLE KEYS */;
/*!40000 ALTER TABLE `alias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alias_domain`
--

DROP TABLE IF EXISTS `alias_domain`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alias_domain` (
  `alias_domain` varchar(255) NOT NULL,
  `target_domain` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `modified` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`alias_domain`),
  KEY `active` (`active`),
  KEY `target_domain` (`target_domain`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Postfix Admin - Domain Aliases';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alias_domain`
--

LOCK TABLES `alias_domain` WRITE;
/*!40000 ALTER TABLE `alias_domain` DISABLE KEYS */;
/*!40000 ALTER TABLE `alias_domain` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alias_pipe`
--

DROP TABLE IF EXISTS `alias_pipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alias_pipe` (
  `address` varchar(255) NOT NULL,
  `transport` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `php_path` varchar(255) NOT NULL,
  `script_path` varchar(255) NOT NULL,
  `username` varchar(40) NOT NULL,
  `created` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `modified` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`address`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Postfix Admin - Alias Pipe to Script';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alias_pipe`
--

LOCK TABLES `alias_pipe` WRITE;
/*!40000 ALTER TABLE `alias_pipe` DISABLE KEYS */;
/*!40000 ALTER TABLE `alias_pipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `value` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='PostfixAdmin settings';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` VALUES (1,'version','740');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domain`
--

DROP TABLE IF EXISTS `domain`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `domain` (
  `domain` varchar(255) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `aliases` int(10) NOT NULL DEFAULT 0,
  `mailboxes` int(10) NOT NULL DEFAULT 0,
  `maxquota` bigint(20) NOT NULL DEFAULT 0,
  `quota` bigint(20) NOT NULL DEFAULT 0,
  `transport` varchar(255) NOT NULL,
  `backupmx` tinyint(1) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `modified` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`domain`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Postfix Admin - Virtual Domains';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domain`
--

LOCK TABLES `domain` WRITE;
/*!40000 ALTER TABLE `domain` DISABLE KEYS */;
/*!40000 ALTER TABLE `domain` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domain_admins`
--

DROP TABLE IF EXISTS `domain_admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `domain_admins` (
  `username` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `active` tinyint(1) NOT NULL DEFAULT 1,
  KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Postfix Admin - Domain Admins';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domain_admins`
--

LOCK TABLES `domain_admins` WRITE;
/*!40000 ALTER TABLE `domain_admins` DISABLE KEYS */;
/*!40000 ALTER TABLE `domain_admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fetchmail`
--

DROP TABLE IF EXISTS `fetchmail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fetchmail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mailbox` varchar(255) NOT NULL,
  `src_server` varchar(255) NOT NULL,
  `src_auth` enum('password','kerberos_v5','kerberos','kerberos_v4','gssapi','cram-md5','otp','ntlm','msn','ssh','any') DEFAULT NULL,
  `src_user` varchar(255) NOT NULL,
  `src_password` varchar(255) NOT NULL,
  `src_folder` varchar(255) NOT NULL,
  `poll_time` int(11) unsigned NOT NULL DEFAULT 10,
  `fetchall` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `keep` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `protocol` enum('POP3','IMAP','POP2','ETRN','AUTO') DEFAULT NULL,
  `usessl` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `extra_options` text DEFAULT NULL,
  `returned_text` text DEFAULT NULL,
  `mda` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fetchmail`
--

LOCK TABLES `fetchmail` WRITE;
/*!40000 ALTER TABLE `fetchmail` DISABLE KEYS */;
/*!40000 ALTER TABLE `fetchmail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `timestamp` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `username` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `data` text NOT NULL,
  KEY `timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Postfix Admin - Log';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mailbox`
--

DROP TABLE IF EXISTS `mailbox`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mailbox` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `maildir` varchar(255) NOT NULL,
  `quota` bigint(20) NOT NULL DEFAULT 0,
  `local_part` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `uid` int(8) NOT NULL DEFAULT 101,
  `gid` int(8) NOT NULL DEFAULT 12,
  `created` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `modified` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `phone` varchar(30) NOT NULL,
  `email_other` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL DEFAULT '',
  `token_validity` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  PRIMARY KEY (`username`),
  KEY `domain` (`domain`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Postfix Admin - Virtual Mailboxes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mailbox`
--

LOCK TABLES `mailbox` WRITE;
/*!40000 ALTER TABLE `mailbox` DISABLE KEYS */;
/*!40000 ALTER TABLE `mailbox` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quota`
--

DROP TABLE IF EXISTS `quota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quota` (
  `username` varchar(255) NOT NULL,
  `path` varchar(100) NOT NULL,
  `current` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`username`,`path`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quota`
--

LOCK TABLES `quota` WRITE;
/*!40000 ALTER TABLE `quota` DISABLE KEYS */;
/*!40000 ALTER TABLE `quota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quota2`
--

DROP TABLE IF EXISTS `quota2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quota2` (
  `username` varchar(100) NOT NULL,
  `bytes` bigint(20) NOT NULL DEFAULT 0,
  `messages` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quota2`
--

LOCK TABLES `quota2` WRITE;
/*!40000 ALTER TABLE `quota2` DISABLE KEYS */;
/*!40000 ALTER TABLE `quota2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vacation`
--

DROP TABLE IF EXISTS `vacation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vacation` (
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `cache` text NOT NULL,
  `domain` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `start_date` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `end_date` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `send_date_range` int(1) NOT NULL,
  `interval` varchar(60) DEFAULT '*',
  `fromname` varchar(60) DEFAULT NULL,
  `charset` varchar(20) DEFAULT 'iso-8859-1',
  `username` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`email`),
  KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Postfix Admin - Virtual Vacation';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacation`
--

LOCK TABLES `vacation` WRITE;
/*!40000 ALTER TABLE `vacation` DISABLE KEYS */;
/*!40000 ALTER TABLE `vacation` ENABLE KEYS */;
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

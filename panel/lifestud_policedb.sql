/*
Navicat MySQL Data Transfer

Source Server         : Life Studios
Source Server Version : 50545
Source Host           : 45.63.12.197:3306
Source Database       : lifestud_policedb

Target Server Type    : MYSQL
Target Server Version : 50545
File Encoding         : 65001

Date: 2015-11-10 18:28:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for arrests
-- ----------------------------
DROP TABLE IF EXISTS `arrests`;
CREATE TABLE `arrests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `copid` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `bondid` int(11) DEFAULT NULL,
  `crimes` varchar(255) DEFAULT NULL,
  `bail` int(11) DEFAULT NULL,
  `plea` tinyint(20) DEFAULT NULL,
  `RealDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2000 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for bonds
-- ----------------------------
DROP TABLE IF EXISTS `bonds`;
CREATE TABLE `bonds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `citid` int(11) DEFAULT NULL,
  `cdate` date DEFAULT NULL,
  `bondamnt` int(11) DEFAULT NULL,
  `resolved` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for civs
-- ----------------------------
DROP TABLE IF EXISTS `civs`;
CREATE TABLE `civs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1504 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for crimes
-- ----------------------------
DROP TABLE IF EXISTS `crimes`;
CREATE TABLE `crimes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(100) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `severity` tinyint(4) DEFAULT NULL,
  `val` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for dept
-- ----------------------------
DROP TABLE IF EXISTS `dept`;
CREATE TABLE `dept` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dname` varchar(255) DEFAULT NULL,
  `ranks` varchar(200) DEFAULT NULL,
  `perms` varchar(255) DEFAULT NULL,
  `authority` int(11) DEFAULT NULL,
  `info` varchar(50) NOT NULL DEFAULT '{"repto":[-1]}',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for info
-- ----------------------------
DROP TABLE IF EXISTS `info`;
CREATE TABLE `info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for remember
-- ----------------------------
DROP TABLE IF EXISTS `remember`;
CREATE TABLE `remember` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `hash` varchar(65) DEFAULT NULL,
  `expire` date DEFAULT NULL,
  `ip` varchar(46) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1848 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for requests
-- ----------------------------
DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(64) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=249 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for traffic
-- ----------------------------
DROP TABLE IF EXISTS `traffic`;
CREATE TABLE `traffic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `civid` int(11) DEFAULT NULL,
  `copid` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `realdate` datetime NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `ticket` int(11) DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=624 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `citid` int(11) DEFAULT NULL,
  `RegiDate` date DEFAULT NULL,
  `LastLogin` date DEFAULT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `display` varchar(36) DEFAULT NULL,
  `phash` varchar(100) DEFAULT NULL,
  `salt` varchar(15) DEFAULT NULL,
  `ip` varchar(46) DEFAULT NULL,
  `rank` tinyint(4) DEFAULT '0',
  `dept` tinyint(4) DEFAULT '9',
  `badge` varchar(8) NOT NULL,
  `plevel` text,
  `email` varchar(40) DEFAULT NULL,
  `title` varchar(30) DEFAULT NULL,
  `phone` varchar(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=221 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Event structure for Prune Remember
-- ----------------------------
DROP EVENT IF EXISTS `Prune Remember`;
DELIMITER ;;
CREATE DEFINER=`lifestud_pduser`@`162.230.184.52` EVENT `Prune Remember` ON SCHEDULE EVERY 1 DAY STARTS '2015-10-08 11:16:31' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM `remember` WHERE `expire` < NOW()
;;
DELIMITER ;

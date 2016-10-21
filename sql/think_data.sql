/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50528
Source Host           : localhost:3306
Source Database       : think_data

Target Server Type    : MYSQL
Target Server Version : 50528
File Encoding         : 65001

Date: 2016-10-21 18:18:47
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `think_data`
-- ----------------------------
DROP TABLE IF EXISTS `think_data`;
CREATE TABLE `think_data` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `data` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_data
-- ----------------------------
INSERT INTO think_data VALUES ('1', 'thinkphp');
INSERT INTO think_data VALUES ('2', 'php');
INSERT INTO think_data VALUES ('3', 'framework');

-- ----------------------------
-- Table structure for `think_profile`
-- ----------------------------
DROP TABLE IF EXISTS `think_profile`;
CREATE TABLE `think_profile` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `truename` varchar(25) NOT NULL,
  `birthday` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(6) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_profile
-- ----------------------------

-- ----------------------------
-- Table structure for `think_user`
-- ----------------------------
DROP TABLE IF EXISTS `think_user`;
CREATE TABLE `think_user` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_user
-- ----------------------------

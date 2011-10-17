/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50159
Source Host           : localhost:3306
Source Database       : dbsong

Target Server Type    : MYSQL
Target Server Version : 50159
File Encoding         : 65001

Date: 2011-10-17 07:12:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `albums`
-- ----------------------------
DROP TABLE IF EXISTS `albums`;
CREATE TABLE `albums` (
  `album_id` smallint(11) NOT NULL,
  `album_name` varchar(110) DEFAULT NULL,
  PRIMARY KEY (`album_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of albums
-- ----------------------------
INSERT INTO `albums` VALUES ('1', 'Other');
INSERT INTO `albums` VALUES ('2', 'M CD Vol 25');

-- ----------------------------
-- Table structure for `artists`
-- ----------------------------
DROP TABLE IF EXISTS `artists`;
CREATE TABLE `artists` (
  `song_artist_id` smallint(11) NOT NULL,
  `song_artist_name` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`song_artist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of artists
-- ----------------------------
INSERT INTO `artists` VALUES ('1', 'តាក់ម៉ា');
INSERT INTO `artists` VALUES ('2', 'អាន វិសាល');
INSERT INTO `artists` VALUES ('3', ' សូលីកា');
INSERT INTO `artists` VALUES ('4', 'នីកូ');

-- ----------------------------
-- Table structure for `hit`
-- ----------------------------
DROP TABLE IF EXISTS `hit`;
CREATE TABLE `hit` (
  `hit_id` smallint(11) DEFAULT NULL,
  `song_id` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hit
-- ----------------------------

-- ----------------------------
-- Table structure for `productions`
-- ----------------------------
DROP TABLE IF EXISTS `productions`;
CREATE TABLE `productions` (
  `production_id` smallint(11) NOT NULL,
  `production_name` varchar(100) DEFAULT NULL,
  `production_pic` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`production_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of productions
-- ----------------------------
INSERT INTO `productions` VALUES ('1', 'M Production', null);
INSERT INTO `productions` VALUES ('2', 'Sunday', null);
INSERT INTO `productions` VALUES ('3', 'Rock Procduction', null);
INSERT INTO `productions` VALUES ('4', 'B-Band Production', null);
INSERT INTO `productions` VALUES ('5', 'Big Man Production', null);
INSERT INTO `productions` VALUES ('6', 'Chameleon Music', null);
INSERT INTO `productions` VALUES ('7', 'Classic Production', null);
INSERT INTO `productions` VALUES ('8', 'New Song Production', null);
INSERT INTO `productions` VALUES ('9', 'Only U', null);
INSERT INTO `productions` VALUES ('10', 'Spark Music', null);
INSERT INTO `productions` VALUES ('11', 'SVD Production', null);
INSERT INTO `productions` VALUES ('12', 'TOP MAN Entertainment', null);
INSERT INTO `productions` VALUES ('13', 'Town Entertainment', null);
INSERT INTO `productions` VALUES ('14', 'ប្រស្នា Brosna Production', null);
INSERT INTO `productions` VALUES ('15', 'មហាហង្ស Moha Hang', null);
INSERT INTO `productions` VALUES ('16', 'រស្មីហង្សមាស RHM', null);
INSERT INTO `productions` VALUES ('17', 'សាន់ដេ​ Sunday', null);
INSERT INTO `productions` VALUES ('18', 'ស្វាងតារា Svang Dara', null);
INSERT INTO `productions` VALUES ('19', 'test test', 'glasses-model-CBK910155502.jpg');

-- ----------------------------
-- Table structure for `songs`
-- ----------------------------
DROP TABLE IF EXISTS `songs`;
CREATE TABLE `songs` (
  `song_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `song_title` varchar(255) DEFAULT NULL,
  `song_artist_id` int(11) DEFAULT NULL,
  `album_id` varchar(255) DEFAULT NULL,
  `album_pic` varchar(255) DEFAULT NULL,
  `file_path` varchar(100) DEFAULT NULL,
  `file_play` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_size` varchar(100) DEFAULT NULL,
  `length` varchar(50) DEFAULT NULL,
  `bit_rate` varchar(11) DEFAULT NULL,
  `song_lang_id` int(11) DEFAULT NULL,
  `production_id` int(11) DEFAULT NULL,
  `date_post` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `song_cat_id` smallint(11) DEFAULT NULL,
  `hit_id` smallint(11) DEFAULT NULL,
  PRIMARY KEY (`song_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of songs
-- ----------------------------
INSERT INTO `songs` VALUES ('7', 'Love the Way You Lie', '2', 'other', '', '', '', '', '', '', '', '1', '6', '2011-10-13 06:24:20', null, null);
INSERT INTO `songs` VALUES ('8', 'Fanta_Dom neong reus songsa', '2', 'Other', '162654_15383n.jpg', 'song/Other/', '', '05_Fanta_Dom_neong_reus_songsa.mp3', '4.16MB', '4:31', '128kbps', '1', '1', '2011-10-12 06:36:01', null, null);
INSERT INTO `songs` VALUES ('9', 'gsmarena_024', null, 'other', 'glasses-model-CBK910.jpg', 'song/other/', '', '[HD]100411_RAIN(BI)_-HIP_SONG-_LIVE.mp3', '5.98MB', '3:16', '256kbps', '1', null, '2011-10-08 07:04:14', null, null);

-- ----------------------------
-- Table structure for `song_cat`
-- ----------------------------
DROP TABLE IF EXISTS `song_cat`;
CREATE TABLE `song_cat` (
  `song_cat_id` smallint(11) NOT NULL DEFAULT '0',
  `song_cat_name` varchar(110) DEFAULT NULL,
  PRIMARY KEY (`song_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of song_cat
-- ----------------------------
INSERT INTO `song_cat` VALUES ('1', 'ភាសាខែ្មរ');
INSERT INTO `song_cat` VALUES ('2', 'ចំរៀងបុរាណដើម');
INSERT INTO `song_cat` VALUES ('3', 'ចំរៀងរាំរង់');
INSERT INTO `song_cat` VALUES ('4', 'ភាសាអង់គេ្លស');
INSERT INTO `song_cat` VALUES ('5', 'ភាសាចិន');
INSERT INTO `song_cat` VALUES ('6', 'ភាសាកូរេ');
INSERT INTO `song_cat` VALUES ('7', 'សាច់ភេ្លង');

-- ----------------------------
-- Table structure for `song_lang`
-- ----------------------------
DROP TABLE IF EXISTS `song_lang`;
CREATE TABLE `song_lang` (
  `song_lang_id` smallint(11) NOT NULL,
  `song_lang_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`song_lang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of song_lang
-- ----------------------------
INSERT INTO `song_lang` VALUES ('1', 'khmer');
INSERT INTO `song_lang` VALUES ('2', 'chinese');
INSERT INTO `song_lang` VALUES ('3', 'english');
INSERT INTO `song_lang` VALUES ('4', 'thai');
INSERT INTO `song_lang` VALUES ('5', 'korean');
INSERT INTO `song_lang` VALUES ('6', 'japan');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL,
  `user_fname` varchar(100) DEFAULT NULL,
  `user_lname` varchar(100) DEFAULT NULL,
  `user_login` varchar(50) NOT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_pwd` varchar(100) DEFAULT NULL,
  `user_tel` varchar(50) DEFAULT NULL,
  `user_photo` varchar(50) DEFAULT NULL,
  `user_photo_type` varchar(20) DEFAULT NULL,
  `user_group_id` smallint(6) NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `sec_question_id` int(11) DEFAULT NULL,
  `sec_answer` varchar(255) DEFAULT NULL,
  `city_id` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', null, null, 'admin', null, '7c4a8d09ca3762af61e59520943dc26494f8941b', null, null, null, '1', '2011-09-13 19:13:51', null, null, null, '15');
INSERT INTO `users` VALUES ('2', 'Sokha', 'RUM', 'sokha', 'sokha@dkd.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '855xxxxxxxx', '41395_100000738422273_7686_n112945.jpg', null, '3', '2011-09-13 19:39:31', '2011-09-23 10:29:45', '1', 'toto', '13');

-- ----------------------------
-- Table structure for `user_group`
-- ----------------------------
DROP TABLE IF EXISTS `user_group`;
CREATE TABLE `user_group` (
  `user_group_id` smallint(6) NOT NULL,
  `user_group_code` varchar(50) DEFAULT NULL,
  `user_group_desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_group
-- ----------------------------
INSERT INTO `user_group` VALUES ('1', 'admin', 'Administrator');
INSERT INTO `user_group` VALUES ('2', 'system', 'System User');
INSERT INTO `user_group` VALUES ('3', 'member', 'Member User');

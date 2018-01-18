/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : myhome

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-01-18 09:59:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for foo_action
-- ----------------------------
DROP TABLE IF EXISTS `foo_action`;
CREATE TABLE `foo_action` (
  `act_id` varchar(15) NOT NULL,
  `act_name` varchar(32) DEFAULT NULL,
  `act_time` datetime DEFAULT NULL,
  `act_platform` text COMMENT '平台名称',
  `left_num` smallint(6) DEFAULT NULL COMMENT '平台播放地址',
  `right_num` smallint(6) DEFAULT NULL,
  `left_p_id` int(32) DEFAULT NULL,
  `right_p_id` int(32) DEFAULT NULL,
  `left_name` varchar(32) DEFAULT NULL,
  `right_name` varchar(32) DEFAULT NULL,
  `add_time` datetime DEFAULT NULL COMMENT '添加时间',
  `admin_id` int(6) DEFAULT NULL,
  `type_id` smallint(6) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0' COMMENT '0:未开始 1:进行中 2:已结束',
  `status_desc` varchar(20) DEFAULT NULL,
  `is_show` tinyint(4) DEFAULT '1' COMMENT '是否显示',
  `is_hot` tinyint(4) DEFAULT '0' COMMENT '是否热门',
  `is_good` tinyint(4) DEFAULT '0' COMMENT '是否精华',
  `is_del` tinyint(4) DEFAULT '0' COMMENT '软删除',
  PRIMARY KEY (`act_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of foo_action
-- ----------------------------
INSERT INTO `foo_action` VALUES ('123123', '你来吧', '2018-01-17 10:40:18', '[{\"name\":\"123\",\"url\":\"1231\"}]', '0', '0', '1231', '1231', null, null, '2018-01-17 10:40:20', '1', '9', '0', '', '1', '0', '0', '0');
INSERT INTO `foo_action` VALUES ('356464', '64646', '2018-01-17 13:33:07', '[{\"name\":\"dfffff\",\"url\":\"fffff\"}]', '0', '0', '1231', '123155', null, null, '2018-01-17 13:33:14', '1', '9', '0', '', '1', '0', '0', '0');

-- ----------------------------
-- Table structure for foo_action_over
-- ----------------------------
DROP TABLE IF EXISTS `foo_action_over`;
CREATE TABLE `foo_action_over` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `pic_url` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `play_url` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `add_time` datetime DEFAULT NULL,
  `admin_id` int(11) DEFAULT '0',
  `is_show` tinyint(4) DEFAULT '0',
  `is_hot` tinyint(4) DEFAULT '0',
  `is_good` tinyint(4) DEFAULT '0',
  `is_del` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of foo_action_over
-- ----------------------------
INSERT INTO `foo_action_over` VALUES ('3', '增加忽略文件夹', '/Upload/over/497c57790a7b4af7ea73dfeb3396d149.jpg', '梦工厂载', '苛', '2018-01-12 17:01:10', '1', '1', '0', '0', '0');

-- ----------------------------
-- Table structure for foo_action_type
-- ----------------------------
DROP TABLE IF EXISTS `foo_action_type`;
CREATE TABLE `foo_action_type` (
  `type_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(32) DEFAULT NULL,
  `type_desc` varchar(64) DEFAULT NULL,
  `is_show` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of foo_action_type
-- ----------------------------
INSERT INTO `foo_action_type` VALUES ('8', '你我他', '真正的三人行，包罗万象。', '1');
INSERT INTO `foo_action_type` VALUES ('9', '人间有爱', '不管你爱不爱，人间都会有爱；不管你恨不恨，人间也会有恨。', '1');

-- ----------------------------
-- Table structure for foo_admin
-- ----------------------------
DROP TABLE IF EXISTS `foo_admin`;
CREATE TABLE `foo_admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_account` varchar(32) DEFAULT NULL,
  `admin_pass` binary(16) DEFAULT NULL,
  `admin_role_id` smallint(6) DEFAULT NULL,
  `admin_name` varchar(32) DEFAULT NULL,
  `admin_phone` char(11) DEFAULT NULL,
  `admin_email` varchar(64) DEFAULT NULL,
  `admin_sex` tinyint(4) DEFAULT '0',
  `admin_birthday` date DEFAULT NULL,
  `admin_register_time` datetime DEFAULT NULL,
  `admin_login_time` datetime DEFAULT NULL,
  `admin_tag` varchar(64) DEFAULT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of foo_admin
-- ----------------------------
INSERT INTO `foo_admin` VALUES ('1', 'admin', 0xE10ADC3949BA59ABBE56E057F20F883E, '0', '超级管理员', '15811867789', '84656855@qq.com', '1', '2016-11-11', '2016-11-04 23:37:33', '2018-01-18 09:53:51', '走走停停，一路顺景', '127.0.0.1');
INSERT INTO `foo_admin` VALUES ('4', 'good', 0xE10ADC3949BA59ABBE56E057F20F883E, '2', null, null, null, '0', null, '2016-11-11 22:44:27', null, null, null);
INSERT INTO `foo_admin` VALUES ('5', 'admin123', 0xE10ADC3949BA59ABBE56E057F20F883E, '0', '', '', '', '0', '2017-04-05', '2017-07-11 10:14:32', null, '', null);

-- ----------------------------
-- Table structure for foo_admin_log
-- ----------------------------
DROP TABLE IF EXISTS `foo_admin_log`;
CREATE TABLE `foo_admin_log` (
  `log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `log_time` datetime DEFAULT NULL,
  `log_info` varchar(255) DEFAULT NULL,
  `admin_id` smallint(6) DEFAULT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of foo_admin_log
-- ----------------------------
INSERT INTO `foo_admin_log` VALUES ('1', '2017-07-12 11:49:14', '6464', '2', '979');
INSERT INTO `foo_admin_log` VALUES ('2', '2017-07-12 15:47:48', '编辑直播', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('3', '2017-07-13 11:07:16', '修改直播分类，编号为:8', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('4', '2017-07-13 11:07:59', '增加直播分类，编号为:10', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('5', '2017-07-13 11:08:08', '删除直播分类，编号为:10', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('6', '2017-07-13 11:10:13', '增加直播，编号为:6', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('7', '2017-07-13 11:10:22', '修改直播，编号为:6', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('8', '2017-07-13 11:10:27', '删除直播，编号为:6', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('9', '2017-07-13 11:43:25', '增加权限角色，编号为:4', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('10', '2017-07-13 11:43:34', '修改角色，编号为:4', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('11', '2017-07-13 11:43:38', '删除角色，编号为:4', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('12', '2017-07-13 11:44:24', '增加管理员，编号为:6', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('13', '2017-07-13 11:46:33', '修改管理员，编号为:6', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('14', '2017-07-13 11:47:44', '删除管理员，编号为:6', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('15', '2017-07-13 11:56:00', 'admin 登录系统', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('16', '2017-07-13 11:56:37', '修改密码，ID为1', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('17', '2017-07-13 11:56:55', '修改密码，ID为1', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('18', '2017-07-17 09:11:48', 'admin 登录系统', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('19', '2017-07-17 09:12:30', '增加直播，编号为:6', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('20', '2017-07-17 09:17:15', 'admin 登录系统', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('21', '2017-07-17 14:13:12', '修改网站配置信息', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('22', '2017-07-17 14:13:29', '修改网站配置信息', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('23', '2017-07-17 14:13:49', '修改网站配置信息', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('24', '2017-07-17 14:14:14', '修改网站配置信息', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('25', '2017-07-17 14:14:45', '修改网站配置信息', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('26', '2017-07-18 11:23:41', 'admin 登录系统', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('27', '2017-07-18 11:31:21', '修改直播分类，编号为:8', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('28', '2017-07-20 14:22:28', 'admin 登录系统', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('29', '2017-11-14 16:41:27', 'admin 登录系统', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('30', '2017-11-21 10:22:38', 'admin 登录系统', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('31', '2018-01-11 10:00:24', 'admin 登录系统', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('32', '2018-01-11 10:04:58', 'admin 登录系统', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('33', '2018-01-11 10:06:10', '修改直播，编号为:6', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('34', '2018-01-11 10:07:04', '增加直播，编号为:7', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('35', '2018-01-12 10:53:10', 'admin 登录系统', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('36', '2018-01-12 14:15:07', '增加直播，编号为:1', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('37', '2018-01-12 14:23:57', '增加直播，编号为:2', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('38', '2018-01-12 14:34:14', '删除直播，编号为:2', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('39', '2018-01-12 14:34:20', '删除直播，编号为:1', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('40', '2018-01-12 14:37:04', '增加直播，编号为:3', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('41', '2018-01-12 14:51:53', '修改直播，编号为:3', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('42', '2018-01-12 14:52:39', '修改直播，编号为:3', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('43', '2018-01-12 14:53:28', '修改直播，编号为:3', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('44', '2018-01-12 14:53:38', '修改直播，编号为:3', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('45', '2018-01-12 14:54:16', '修改直播，编号为:3', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('46', '2018-01-12 14:54:20', '修改直播，编号为:3', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('47', '2018-01-12 14:55:58', '修改直播，编号为:3', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('48', '2018-01-12 14:59:00', '修改直播，编号为:3', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('49', '2018-01-12 14:59:57', '修改直播，编号为:3', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('50', '2018-01-12 15:00:06', '修改直播，编号为:3', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('51', '2018-01-12 15:01:33', '增加直播，编号为:4', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('52', '2018-01-12 15:08:33', 'admin 登录系统', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('53', '2018-01-12 15:10:10', 'admin 登录系统', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('54', '2018-01-12 15:18:13', 'admin 登录系统', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('55', '2018-01-12 15:19:00', 'admin 登录系统', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('56', '2018-01-12 15:21:39', 'admin 登录系统', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('57', '2018-01-12 15:30:54', 'admin 登录系统', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('58', '2018-01-12 16:35:07', '增加集锦，ID为:1', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('59', '2018-01-12 16:57:56', '删除集锦，ID为:1', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('60', '2018-01-12 16:58:11', '增加集锦，ID为:2', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('61', '2018-01-12 16:59:15', '删除集锦，ID为:2', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('62', '2018-01-12 17:01:10', '增加集锦，ID为:3', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('63', '2018-01-12 17:11:37', '修改集锦，ID为:3', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('64', '2018-01-12 17:12:42', '修改集锦，ID为:3', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('65', '2018-01-12 17:14:55', '修改直播，编号为:4', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('66', '2018-01-12 17:15:04', '修改直播，编号为:3', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('67', '2018-01-15 09:39:41', 'admin 登录系统', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('68', '2018-01-16 14:32:35', 'admin 登录系统', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('69', '2018-01-17 10:09:34', 'admin 登录系统', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('70', '2018-01-17 10:20:09', '增加直播，编号为:1', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('71', '2018-01-17 10:27:26', '修改直播，编号为:1456464', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('72', '2018-01-17 10:29:06', '修改直播，编号为:1456464', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('73', '2018-01-17 10:38:31', '删除直播，编号为:145646412511111', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('74', '2018-01-17 10:39:13', '增加直播，编号为:1234567891012', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('75', '2018-01-17 10:39:34', '增加直播，编号为:33333333345678', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('76', '2018-01-17 10:39:42', '删除直播，编号为:33333333345678,1234567891012', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('77', '2018-01-17 10:40:20', '增加直播，编号为:123123', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('78', '2018-01-17 10:54:01', 'admin 登录系统', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('79', '2018-01-17 11:41:19', '增加球队，ID为:4', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('80', '2018-01-17 11:42:31', '增加球队，ID为:1231', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('81', '2018-01-17 11:44:40', '增加球队，ID为:222', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('82', '2018-01-17 11:56:49', '修改球队，编号为:222', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('83', '2018-01-17 11:56:56', '修改球队，编号为:222', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('84', '2018-01-17 11:58:34', '删除球队，编号为:1', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('85', '2018-01-17 11:58:37', '删除球队，编号为:4,222,1231', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('86', '2018-01-17 11:59:32', '增加球队，ID为:1', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('87', '2018-01-17 13:26:13', '增加球队，ID为:1231', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('88', '2018-01-17 13:26:18', '修改球队，ID为:1231', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('89', '2018-01-17 13:26:27', '修改球队，ID为:1', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('90', '2018-01-17 13:26:35', '删除球队，ID为:1', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('91', '2018-01-17 13:26:58', '增加球队，ID为:123155', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('92', '2018-01-17 13:33:14', '增加直播，编号为:356464', '1', '127.0.0.1');
INSERT INTO `foo_admin_log` VALUES ('93', '2018-01-18 09:53:51', 'admin 登录系统', '1', '127.0.0.1');

-- ----------------------------
-- Table structure for foo_players
-- ----------------------------
DROP TABLE IF EXISTS `foo_players`;
CREATE TABLE `foo_players` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `p_desc` text CHARACTER SET utf8,
  `p_logo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `add_time` datetime DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of foo_players
-- ----------------------------
INSERT INTO `foo_players` VALUES ('1231', '1231', '12312', '/Upload/players/00957cfb47de1b7825d87d3f9297ca50.png', '2018-01-17 13:26:13', '1');
INSERT INTO `foo_players` VALUES ('123155', 'sdgadg', 'asdfa', '/Upload/players/0ad93d5c36f6b8c7749e0a329413a5ed.jpg', '2018-01-17 13:26:58', '1');

-- ----------------------------
-- Table structure for foo_role
-- ----------------------------
DROP TABLE IF EXISTS `foo_role`;
CREATE TABLE `foo_role` (
  `role_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(32) DEFAULT NULL,
  `role_desc` varchar(255) DEFAULT NULL,
  `role_power` text,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of foo_role
-- ----------------------------
INSERT INTO `foo_role` VALUES ('2', '你是谁', '没有人会想你的', 'index/web_set,index/pass,action/atype,action/add_type,action/edit_type,action/del_type,action/action_edit,action/action_del');
INSERT INTO `foo_role` VALUES ('3', 'test', 'test', 'index/web_set,index/pass,admin/role_add,admin/role_edit,admin/role_del,admin/admin_add,admin/admin_edit,admin/admin_del');

-- ----------------------------
-- Table structure for foo_statistics
-- ----------------------------
DROP TABLE IF EXISTS `foo_statistics`;
CREATE TABLE `foo_statistics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) DEFAULT NULL,
  `add_time` datetime DEFAULT NULL,
  `type` tinyint(4) DEFAULT '0',
  `link_from` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of foo_statistics
-- ----------------------------
INSERT INTO `foo_statistics` VALUES ('1', '::1', '2017-07-15 13:37:45', '0', null);
INSERT INTO `foo_statistics` VALUES ('2', '::1', '2017-07-15 13:37:54', '0', null);
INSERT INTO `foo_statistics` VALUES ('3', '127.0.0.1', '2017-07-17 09:10:37', '0', null);
INSERT INTO `foo_statistics` VALUES ('23', '127.0.0.1', '2017-07-17 09:10:55', '0', null);
INSERT INTO `foo_statistics` VALUES ('24', '127.0.0.1', '2017-07-17 09:11:50', '0', null);
INSERT INTO `foo_statistics` VALUES ('25', '127.0.0.1', '2017-07-17 09:12:32', '0', null);
INSERT INTO `foo_statistics` VALUES ('26', '127.0.0.1', '2017-07-17 13:25:43', '0', null);
INSERT INTO `foo_statistics` VALUES ('27', '127.0.0.1', '2017-07-17 13:51:08', '0', null);
INSERT INTO `foo_statistics` VALUES ('28', '127.0.0.1', '2017-07-17 13:51:08', '0', null);
INSERT INTO `foo_statistics` VALUES ('29', '127.0.0.1', '2017-07-17 13:51:09', '0', null);
INSERT INTO `foo_statistics` VALUES ('30', '127.0.0.1', '2017-07-17 13:51:09', '0', null);
INSERT INTO `foo_statistics` VALUES ('31', '127.0.0.1', '2017-07-17 13:51:09', '0', null);
INSERT INTO `foo_statistics` VALUES ('32', '127.0.0.1', '2017-07-17 13:51:09', '0', null);
INSERT INTO `foo_statistics` VALUES ('33', '127.0.0.1', '2017-07-17 13:51:09', '0', null);
INSERT INTO `foo_statistics` VALUES ('34', '127.0.0.1', '2017-07-17 13:51:10', '0', null);
INSERT INTO `foo_statistics` VALUES ('35', '127.0.0.1', '2017-07-17 13:51:10', '0', null);
INSERT INTO `foo_statistics` VALUES ('36', '127.0.0.1', '2017-07-17 13:51:10', '0', null);
INSERT INTO `foo_statistics` VALUES ('37', '127.0.0.1', '2017-07-17 13:51:10', '0', null);
INSERT INTO `foo_statistics` VALUES ('38', '127.0.0.1', '2017-07-17 13:51:10', '0', null);
INSERT INTO `foo_statistics` VALUES ('39', '127.0.0.1', '2017-07-17 13:51:11', '0', null);
INSERT INTO `foo_statistics` VALUES ('40', '127.0.0.1', '2017-07-17 13:51:11', '0', null);
INSERT INTO `foo_statistics` VALUES ('41', '127.0.0.1', '2017-07-17 13:51:32', '0', null);
INSERT INTO `foo_statistics` VALUES ('42', '127.0.0.1', '2017-07-17 13:51:32', '0', null);
INSERT INTO `foo_statistics` VALUES ('43', '127.0.0.1', '2017-07-17 13:51:32', '0', null);
INSERT INTO `foo_statistics` VALUES ('44', '127.0.0.1', '2017-07-17 13:51:33', '0', null);
INSERT INTO `foo_statistics` VALUES ('45', '127.0.0.1', '2017-07-17 13:51:33', '0', null);
INSERT INTO `foo_statistics` VALUES ('46', '127.0.0.1', '2017-07-17 13:52:00', '0', null);
INSERT INTO `foo_statistics` VALUES ('47', '127.0.0.1', '2017-07-17 13:52:01', '0', null);
INSERT INTO `foo_statistics` VALUES ('48', '127.0.0.1', '2017-07-17 13:52:01', '0', null);
INSERT INTO `foo_statistics` VALUES ('49', '127.0.0.1', '2017-07-17 13:52:01', '0', null);
INSERT INTO `foo_statistics` VALUES ('50', '127.0.0.1', '2017-07-17 13:52:01', '0', null);
INSERT INTO `foo_statistics` VALUES ('51', '127.0.0.1', '2017-07-17 13:52:02', '0', null);
INSERT INTO `foo_statistics` VALUES ('52', '127.0.0.1', '2017-07-17 13:52:02', '0', null);
INSERT INTO `foo_statistics` VALUES ('53', '127.0.0.1', '2017-07-17 13:52:02', '0', null);
INSERT INTO `foo_statistics` VALUES ('54', '127.0.0.1', '2017-07-17 13:52:02', '0', null);
INSERT INTO `foo_statistics` VALUES ('55', '127.0.0.1', '2017-07-17 13:52:02', '0', null);
INSERT INTO `foo_statistics` VALUES ('56', '127.0.0.1', '2017-07-17 13:52:03', '0', null);
INSERT INTO `foo_statistics` VALUES ('57', '127.0.0.1', '2017-07-17 13:52:03', '0', null);
INSERT INTO `foo_statistics` VALUES ('58', '127.0.0.1', '2017-07-17 13:52:03', '0', null);
INSERT INTO `foo_statistics` VALUES ('59', '127.0.0.1', '2017-07-17 13:52:03', '0', null);
INSERT INTO `foo_statistics` VALUES ('60', '127.0.0.1', '2017-07-17 13:52:03', '0', null);
INSERT INTO `foo_statistics` VALUES ('61', '127.0.0.1', '2017-07-17 13:52:04', '0', null);
INSERT INTO `foo_statistics` VALUES ('62', '127.0.0.1', '2017-07-17 13:52:04', '0', null);
INSERT INTO `foo_statistics` VALUES ('63', '127.0.0.1', '2017-07-17 13:52:04', '0', null);
INSERT INTO `foo_statistics` VALUES ('64', '127.0.0.1', '2017-07-17 13:52:04', '0', null);
INSERT INTO `foo_statistics` VALUES ('65', '127.0.0.1', '2017-07-17 13:52:04', '0', null);
INSERT INTO `foo_statistics` VALUES ('66', '127.0.0.1', '2017-07-17 13:52:05', '0', null);
INSERT INTO `foo_statistics` VALUES ('67', '127.0.0.1', '2017-07-17 13:52:05', '0', null);
INSERT INTO `foo_statistics` VALUES ('68', '127.0.0.1', '2017-07-17 13:52:05', '0', null);
INSERT INTO `foo_statistics` VALUES ('69', '127.0.0.1', '2017-07-17 13:52:05', '0', null);
INSERT INTO `foo_statistics` VALUES ('70', '127.0.0.1', '2017-07-17 13:52:06', '0', null);
INSERT INTO `foo_statistics` VALUES ('71', '127.0.0.1', '2017-07-17 13:52:06', '0', null);
INSERT INTO `foo_statistics` VALUES ('72', '127.0.0.1', '2017-07-17 13:52:06', '0', null);
INSERT INTO `foo_statistics` VALUES ('73', '127.0.0.1', '2017-07-17 13:52:06', '0', null);
INSERT INTO `foo_statistics` VALUES ('74', '127.0.0.1', '2017-07-17 13:52:06', '0', null);
INSERT INTO `foo_statistics` VALUES ('75', '127.0.0.1', '2017-07-17 13:52:07', '0', null);
INSERT INTO `foo_statistics` VALUES ('76', '127.0.0.1', '2017-07-17 13:52:37', '0', null);
INSERT INTO `foo_statistics` VALUES ('77', '127.0.0.1', '2017-07-17 13:52:37', '0', null);
INSERT INTO `foo_statistics` VALUES ('78', '127.0.0.1', '2017-07-17 13:52:38', '0', null);
INSERT INTO `foo_statistics` VALUES ('79', '127.0.0.1', '2017-07-17 13:52:38', '0', null);
INSERT INTO `foo_statistics` VALUES ('80', '127.0.0.1', '2017-07-17 13:52:38', '0', null);
INSERT INTO `foo_statistics` VALUES ('81', '127.0.0.1', '2017-07-17 13:52:38', '0', null);
INSERT INTO `foo_statistics` VALUES ('82', '127.0.0.1', '2017-07-17 13:52:38', '0', null);
INSERT INTO `foo_statistics` VALUES ('83', '127.0.0.1', '2017-07-17 13:52:39', '0', null);
INSERT INTO `foo_statistics` VALUES ('84', '127.0.0.1', '2017-07-17 14:13:35', '0', null);
INSERT INTO `foo_statistics` VALUES ('85', '127.0.0.1', '2017-07-17 14:13:36', '0', null);
INSERT INTO `foo_statistics` VALUES ('86', '127.0.0.1', '2017-07-17 14:13:36', '0', null);
INSERT INTO `foo_statistics` VALUES ('87', '127.0.0.1', '2017-07-17 14:13:37', '0', null);
INSERT INTO `foo_statistics` VALUES ('88', '127.0.0.1', '2017-07-17 14:13:37', '0', null);
INSERT INTO `foo_statistics` VALUES ('89', '127.0.0.1', '2017-07-17 14:13:56', '0', null);
INSERT INTO `foo_statistics` VALUES ('90', '127.0.0.1', '2017-07-17 14:13:56', '0', null);
INSERT INTO `foo_statistics` VALUES ('91', '127.0.0.1', '2017-07-17 14:13:56', '0', null);
INSERT INTO `foo_statistics` VALUES ('92', '127.0.0.1', '2017-07-17 14:16:56', '0', null);
INSERT INTO `foo_statistics` VALUES ('93', '127.0.0.1', '2017-07-17 14:46:34', '0', null);
INSERT INTO `foo_statistics` VALUES ('94', '127.0.0.1', '2017-07-17 14:46:40', '0', null);
INSERT INTO `foo_statistics` VALUES ('95', '127.0.0.1', '2017-07-17 14:46:43', '0', null);
INSERT INTO `foo_statistics` VALUES ('96', '127.0.0.1', '2017-07-17 14:46:43', '0', null);
INSERT INTO `foo_statistics` VALUES ('97', '127.0.0.1', '2017-07-17 14:46:44', '0', null);
INSERT INTO `foo_statistics` VALUES ('98', '127.0.0.1', '2018-01-11 09:59:05', '0', null);
INSERT INTO `foo_statistics` VALUES ('99', '127.0.0.1', '2018-01-11 09:59:55', '0', null);
INSERT INTO `foo_statistics` VALUES ('100', '127.0.0.1', '2018-01-11 10:01:41', '0', null);
INSERT INTO `foo_statistics` VALUES ('101', '127.0.0.1', '2018-01-11 10:01:48', '0', null);
INSERT INTO `foo_statistics` VALUES ('102', '127.0.0.1', '2018-01-11 10:02:35', '0', null);
INSERT INTO `foo_statistics` VALUES ('103', '127.0.0.1', '2018-01-11 10:02:36', '0', null);
INSERT INTO `foo_statistics` VALUES ('104', '127.0.0.1', '2018-01-11 10:02:36', '0', null);
INSERT INTO `foo_statistics` VALUES ('105', '127.0.0.1', '2018-01-11 10:03:29', '0', null);
INSERT INTO `foo_statistics` VALUES ('106', '127.0.0.1', '2018-01-11 10:03:30', '0', null);
INSERT INTO `foo_statistics` VALUES ('107', '127.0.0.1', '2018-01-11 10:03:30', '0', null);
INSERT INTO `foo_statistics` VALUES ('108', '127.0.0.1', '2018-01-11 10:03:31', '0', null);
INSERT INTO `foo_statistics` VALUES ('109', '127.0.0.1', '2018-01-11 10:03:32', '0', null);
INSERT INTO `foo_statistics` VALUES ('110', '127.0.0.1', '2018-01-11 10:03:32', '0', null);
INSERT INTO `foo_statistics` VALUES ('111', '127.0.0.1', '2018-01-11 10:05:53', '0', null);
INSERT INTO `foo_statistics` VALUES ('112', '127.0.0.1', '2018-01-11 10:06:12', '0', null);
INSERT INTO `foo_statistics` VALUES ('113', '127.0.0.1', '2018-01-11 10:06:14', '0', null);
INSERT INTO `foo_statistics` VALUES ('114', '127.0.0.1', '2018-01-11 10:07:15', '0', null);
INSERT INTO `foo_statistics` VALUES ('115', '127.0.0.1', '2018-01-11 10:26:33', '0', null);
INSERT INTO `foo_statistics` VALUES ('116', '127.0.0.1', '2018-01-11 10:37:45', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('117', '127.0.0.1', '2018-01-11 10:37:46', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('118', '127.0.0.1', '2018-01-11 10:37:49', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('119', '127.0.0.1', '2018-01-11 13:24:38', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('120', '127.0.0.1', '2018-01-11 14:22:03', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('121', '127.0.0.1', '2018-01-11 14:23:33', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('122', '127.0.0.1', '2018-01-11 14:23:34', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('123', '127.0.0.1', '2018-01-11 14:23:42', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('124', '127.0.0.1', '2018-01-11 16:16:23', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('125', '127.0.0.1', '2018-01-11 16:16:33', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('126', '127.0.0.1', '2018-01-11 17:34:01', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('127', '127.0.0.1', '2018-01-12 10:52:55', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('128', '127.0.0.1', '2018-01-12 13:52:00', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('129', '127.0.0.1', '2018-01-12 15:05:57', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('130', '127.0.0.1', '2018-01-15 09:39:05', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('131', '127.0.0.1', '2018-01-15 09:39:13', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('132', '127.0.0.1', '2018-01-15 09:39:14', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('133', '127.0.0.1', '2018-01-15 09:39:14', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('134', '127.0.0.1', '2018-01-15 09:39:15', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('135', '127.0.0.1', '2018-01-15 09:39:15', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('136', '127.0.0.1', '2018-01-15 09:39:15', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('137', '127.0.0.1', '2018-01-15 09:39:16', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('138', '127.0.0.1', '2018-01-15 09:39:19', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('139', '127.0.0.1', '2018-01-15 09:39:20', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('140', '127.0.0.1', '2018-01-15 09:39:23', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('141', '127.0.0.1', '2018-01-15 09:39:25', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('142', '127.0.0.1', '2018-01-16 14:31:08', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('143', '127.0.0.1', '2018-01-16 14:44:39', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('144', '127.0.0.1', '2018-01-16 14:44:42', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('145', '127.0.0.1', '2018-01-16 15:46:48', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('146', '127.0.0.1', '2018-01-17 10:09:18', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('147', '127.0.0.1', '2018-01-17 13:25:44', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('148', '127.0.0.1', '2018-01-17 13:25:47', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('149', '127.0.0.1', '2018-01-17 13:25:47', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('150', '127.0.0.1', '2018-01-17 13:50:18', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('151', '127.0.0.1', '2018-01-17 13:54:01', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('152', '127.0.0.1', '2018-01-17 13:54:06', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('153', '127.0.0.1', '2018-01-17 13:54:07', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('154', '127.0.0.1', '2018-01-17 13:54:07', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('155', '127.0.0.1', '2018-01-17 13:54:07', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('156', '127.0.0.1', '2018-01-17 13:54:07', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('157', '127.0.0.1', '2018-01-17 13:54:07', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('158', '127.0.0.1', '2018-01-17 13:54:08', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('159', '127.0.0.1', '2018-01-17 13:54:12', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('160', '127.0.0.1', '2018-01-17 13:54:32', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('161', '127.0.0.1', '2018-01-17 13:54:32', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('162', '127.0.0.1', '2018-01-17 13:54:33', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('163', '127.0.0.1', '2018-01-17 13:54:35', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('164', '127.0.0.1', '2018-01-17 13:54:36', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('165', '127.0.0.1', '2018-01-17 13:54:37', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('166', '127.0.0.1', '2018-01-17 14:21:32', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('167', '127.0.0.1', '2018-01-17 14:37:12', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('168', '127.0.0.1', '2018-01-18 09:45:25', '0', 'pc');
INSERT INTO `foo_statistics` VALUES ('169', '127.0.0.1', '2018-01-18 09:53:40', '0', 'pc');

-- ----------------------------
-- Table structure for foo_web_config
-- ----------------------------
DROP TABLE IF EXISTS `foo_web_config`;
CREATE TABLE `foo_web_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key_name` varchar(20) DEFAULT NULL,
  `key_value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of foo_web_config
-- ----------------------------
INSERT INTO `foo_web_config` VALUES ('1', 'web_title', '放眼看世界 世界看王者');
INSERT INTO `foo_web_config` VALUES ('2', 'web_key', '放眼看世界 世界看王者');
INSERT INTO `foo_web_config` VALUES ('3', 'web_desc', '放眼看世界 世界看王者');
INSERT INTO `foo_web_config` VALUES ('4', 'web_onwer', '人们');
INSERT INTO `foo_web_config` VALUES ('5', 'web_phone', '13888888888');
INSERT INTO `foo_web_config` VALUES ('6', 'web_tel', '020-88888888');
INSERT INTO `foo_web_config` VALUES ('7', 'web_chuang', '020-88888888');
INSERT INTO `foo_web_config` VALUES ('8', 'web_qq', '88888888');
INSERT INTO `foo_web_config` VALUES ('9', 'web_email', '88888888@qq.com');
INSERT INTO `foo_web_config` VALUES ('10', 'web_add', '广州天河区');
INSERT INTO `foo_web_config` VALUES ('11', 'web_bottom', '不要问我');
INSERT INTO `foo_web_config` VALUES ('12', 'web_host', '等待中');
INSERT INTO `foo_web_config` VALUES ('13', 'web_top_title', '王者直播');

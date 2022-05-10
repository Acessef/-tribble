-- phpMyAdmin SQL Dump
-- version 2.11.2.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 04 月 12 日 09:04
-- 服务器版本: 5.0.45
-- PHP 版本: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `jiaocai`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `admin_name` varchar(50) NOT NULL,
  `admin_pass` varchar(50) NOT NULL,
  `realname` varchar(50) NOT NULL,
  `super` varchar(10) NOT NULL,
  PRIMARY KEY  (`admin_name`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

--
-- 导出表中的数据 `admin`
--

INSERT INTO `admin` (`admin_name`, `admin_pass`, `realname`, `super`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', '超级管理员', '');

-- --------------------------------------------------------

--
-- 表的结构 `banji`
--

CREATE TABLE `banji` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=9 ;

--
-- 导出表中的数据 `banji`
--

INSERT INTO `banji` (`id`, `name`) VALUES
(5, '信息08-1'),
(6, '信息08-3');

-- --------------------------------------------------------

--
-- 表的结构 `jiaocai`
--

CREATE TABLE `jiaocai` (
  `id` int(11) NOT NULL auto_increment,
  `jcbianhao` varchar(50) NOT NULL,
  `jcming` varchar(50) NOT NULL,
  `zuozhe` varchar(50) NOT NULL,
  `cbshe` varchar(50) NOT NULL,
  `banben` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=3 ;

--
-- 导出表中的数据 `jiaocai`
--

INSERT INTO `jiaocai` (`id`, `jcbianhao`, `jcming`, `zuozhe`, `cbshe`, `banben`) VALUES
(1, '1001', 'c豫园', '12', '12', '2121'),
(2, '1002', '数据结构', '谭大哥', '清华', '23');

-- --------------------------------------------------------

--
-- 表的结构 `ruku`
--

CREATE TABLE `ruku` (
  `id` int(11) NOT NULL auto_increment,
  `jcbianhao` varchar(50) NOT NULL COMMENT '教材编号',
  `jcming` varchar(50) NOT NULL COMMENT '教材名',
  `zuozhe` varchar(30) NOT NULL COMMENT '作者',
  `cbshe` varchar(50) NOT NULL COMMENT '出版社',
  `banben` varchar(20) NOT NULL COMMENT '版本号',
  `scjia` float NOT NULL COMMENT '市场价',
  `sgjia` float NOT NULL COMMENT '实购价',
  `suliang` int(10) NOT NULL COMMENT '数量',
  `rukushijian` date NOT NULL COMMENT '入库时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=3 ;

--
-- 导出表中的数据 `ruku`
--

INSERT INTO `ruku` (`id`, `jcbianhao`, `jcming`, `zuozhe`, `cbshe`, `banben`, `scjia`, `sgjia`, `suliang`, `rukushijian`) VALUES
(2, '1001', 'c豫园', '12', '12', '2121', 100, 80, 920, '2012-04-08');

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE `student` (
  `xuehao` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `banji` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `regtime` datetime NOT NULL,
  `intro` text NOT NULL,
  `tid` varchar(50) NOT NULL,
  PRIMARY KEY  (`xuehao`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

--
-- 导出表中的数据 `student`
--

INSERT INTO `student` (`xuehao`, `name`, `banji`, `pwd`, `regtime`, `intro`, `tid`) VALUES
('2009', '测试学子1', '5', '123456', '2012-04-08 00:33:12', '441', 'test'),
('20081', '122', '5', '123456', '2012-04-08 22:04:17', '213', '');

-- --------------------------------------------------------

--
-- 表的结构 `zhengding`
--

CREATE TABLE `zhengding` (
  `id` int(11) NOT NULL auto_increment,
  `dingdan` varchar(30) NOT NULL COMMENT '订单号',
  `jcbianhao` varchar(30) NOT NULL COMMENT '教材编号',
  `jcming` varchar(50) NOT NULL COMMENT '教材名',
  `jcleixin` varchar(30) NOT NULL COMMENT '教材类型',
  `zuozhe` varchar(50) NOT NULL COMMENT '作者',
  `cbshe` varchar(50) NOT NULL COMMENT '出版社',
  `banben` varchar(20) NOT NULL COMMENT '版本号',
  `shijian` date NOT NULL COMMENT '征订时间',
  `zdren` varchar(30) NOT NULL COMMENT '征订人',
  `szbanji` varchar(30) NOT NULL COMMENT '所订班级',
  `zdshuliang` int(10) NOT NULL COMMENT '征订数量',
  `states` varchar(10) NOT NULL,
  `fukuan` varchar(50) NOT NULL default '0',
  `tui` varchar(10) NOT NULL default '0',
  `tstates` varchar(10) NOT NULL default '0',
  `ftime` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=2 ;

--
-- 导出表中的数据 `zhengding`
--

INSERT INTO `zhengding` (`id`, `dingdan`, `jcbianhao`, `jcming`, `jcleixin`, `zuozhe`, `cbshe`, `banben`, `shijian`, `zdren`, `szbanji`, `zdshuliang`, `states`, `fukuan`, `tui`, `tstates`, `ftime`) VALUES
(1, '20120412083442', '1001', 'c豫园', '', '12', '12', '2121', '2012-04-12', '2009', '', 30, '1', '1', '0', '0', '2012-04-12 16:45:19');

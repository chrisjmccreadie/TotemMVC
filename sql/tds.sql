-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 22, 2014 at 04:12 AM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tds`
--

-- --------------------------------------------------------

--
-- Table structure for table `gitremote`
--

CREATE TABLE `gitremote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siteid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `minifyinputfiles`
--

CREATE TABLE `minifyinputfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `minifyid` int(11) NOT NULL,
  `filename` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `minifymain`
--

CREATE TABLE `minifymain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siteid` int(11) NOT NULL,
  `minfile` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `modifyfiles`
--

CREATE TABLE `modifyfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sitehostingid` int(11) NOT NULL,
  `commandtext` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `sitehosting`
--

CREATE TABLE `sitehosting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siteid` int(11) NOT NULL,
  `primary` int(11) NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL,
  `hostingtype` int(11) NOT NULL COMMENT '1= appfog 2 = pagodabox 3= beanstalk',
  `afarecord1` varchar(255) NOT NULL,
  `afacreord2` varchar(255) NOT NULL,
  `afwwwcname` varchar(255) NOT NULL,
  `aflogin` varchar(255) NOT NULL,
  `afpassword` varchar(255) NOT NULL,
  `afdomain` varchar(255) NOT NULL,
  `pagodaarecord` varchar(255) NOT NULL,
  `pagodadomain` varchar(255) NOT NULL,
  `pagodaremote` varchar(255) NOT NULL,
  `afurl` varchar(255) NOT NULL,
  `pagodaurl` varchar(255) NOT NULL,
  `beanstalkpush` varchar(255) NOT NULL,
  `benstalkurl` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `localfiles` varchar(255) NOT NULL,
  `mojagcache` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `deploycount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

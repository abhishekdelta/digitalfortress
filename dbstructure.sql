-- phpMyAdmin SQL Dump
-- version 3.1.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 12, 2011 at 02:26 AM
-- Server version: 5.0.67
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pragyan10_digitalfortress`
--

-- --------------------------------------------------------

--
-- Table structure for table `digifort_levels`
--

CREATE TABLE IF NOT EXISTS `digifort_levels` (
  `level_id` int(10) NOT NULL,
  `level_name` varchar(50) NOT NULL,
  `level_desc` mediumtext NOT NULL,
  `level_points` int(10) NOT NULL,
  `level_info` longtext NOT NULL,
  `level_wins` int(10) NOT NULL default '0',
  `level_attempts` int(10) NOT NULL default '0',
  `level_win_users` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `digifort_users`
--

CREATE TABLE IF NOT EXISTS `digifort_users` (
  `user_id` int(10) NOT NULL auto_increment,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `last_attempt_time` timestamp NOT NULL default '0000-00-00 00:00:00',
  `last_attempt_level` varchar(100) NOT NULL,
  `last_win_time` timestamp NOT NULL default '0000-00-00 00:00:00',
  `last_win_level` varchar(100) NOT NULL,
  `score` int(10) NOT NULL default '0',
  `user_lastlogin` timestamp NOT NULL default '0000-00-00 00:00:00',
  `activated_time` timestamp NOT NULL default '0000-00-00 00:00:00',
  `time_counter` bigint(20) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7557 ;

-- --------------------------------------------------------

--
-- Table structure for table `hacklandcentralbank`
--

CREATE TABLE IF NOT EXISTS `hacklandcentralbank` (
  `username` varchar(10) NOT NULL,
  `userfullname` varchar(50) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  `authid` varchar(30) NOT NULL,
  `type` varchar(10) NOT NULL default 'special'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hacklandonlinestore`
--

CREATE TABLE IF NOT EXISTS `hacklandonlinestore` (
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `creditcardid` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: omega.uta.edu
-- Generation Time: Dec 15, 2015 at 12:05 PM
-- Server version: 5.0.95
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `rvr9109`
--

-- --------------------------------------------------------

--
-- Table structure for table `App`
--

CREATE TABLE `App` (
  `appt_id` int(11) NOT NULL auto_increment,
  `apptype` int(11) NOT NULL,
  `shottype` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `petname` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY  (`appt_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `App`
--

INSERT INTO `App` VALUES(13, 1, 8, 7, 'Joker', '2015-12-26', '12:30:00');
INSERT INTO `App` VALUES(19, 7, 1, 15, 'Lucky', '2015-12-30', '11:00:00');
INSERT INTO `App` VALUES(9, 6, 2, 14, 'Smoky', '2015-12-31', '16:00:00');
INSERT INTO `App` VALUES(24, 1, 1, 1, 'Felix', '2015-12-27', '13:00:00');
INSERT INTO `App` VALUES(16, 2, 2, 21, 'toki', '2015-12-24', '15:30:00');
INSERT INTO `App` VALUES(21, 2, 2, 1, 'Midnight', '2015-12-25', '12:30:00');

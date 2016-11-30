-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: omega.uta.edu
-- Generation Time: Dec 15, 2015 at 12:09 PM
-- Server version: 5.0.95
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `rvr9109`
--

-- --------------------------------------------------------

--
-- Table structure for table `Type`
--

CREATE TABLE `Type` (
  `type_id` tinyint(4) NOT NULL auto_increment,
  `appt_type` varchar(255) NOT NULL,
  PRIMARY KEY  (`type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Type`
--

INSERT INTO `Type` VALUES(1, 'Grooming');
INSERT INTO `Type` VALUES(2, 'Boarding');
INSERT INTO `Type` VALUES(3, 'Check up');
INSERT INTO `Type` VALUES(4, 'Vaccination');
INSERT INTO `Type` VALUES(5, 'Spay or Neuter');
INSERT INTO `Type` VALUES(6, 'Dentistry');
INSERT INTO `Type` VALUES(7, 'Other');
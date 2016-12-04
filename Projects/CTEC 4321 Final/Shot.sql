-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: omega.uta.edu
-- Generation Time: Dec 15, 2015 at 12:08 PM
-- Server version: 5.0.95
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `rvr9109`
--

-- --------------------------------------------------------

--
-- Table structure for table `Shot`
--

CREATE TABLE `Shot` (
  `shot_id` tinyint(4) NOT NULL auto_increment,
  `shot_type` varchar(255) NOT NULL,
  PRIMARY KEY  (`shot_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `Shot`
--

INSERT INTO `Shot` VALUES(2, 'Rabies Only');
INSERT INTO `Shot` VALUES(3, 'Basic Vaccines');
INSERT INTO `Shot` VALUES(4, 'Canine - Annual');
INSERT INTO `Shot` VALUES(5, 'Canine - 1st Year');
INSERT INTO `Shot` VALUES(6, 'Canine - 2nd Year');
INSERT INTO `Shot` VALUES(7, 'Canine - 3rd Year');
INSERT INTO `Shot` VALUES(8, 'Feline - Annual');
INSERT INTO `Shot` VALUES(9, 'Feline - 1st Year');
INSERT INTO `Shot` VALUES(10, 'Feline - 2nd Year');
INSERT INTO `Shot` VALUES(1, 'None');

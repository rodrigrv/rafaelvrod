-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: omega.uta.edu
-- Generation Time: Dec 15, 2015 at 12:07 PM
-- Server version: 5.0.95
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `rvr9109`
--

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `user_id` int(11) NOT NULL auto_increment,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` VALUES(1, 'rafael', 'pass', 'rodrigrv87@gmail.com');
INSERT INTO `Customer` VALUES(7, 'user1', '1234', 'he@hi.com');
INSERT INTO `Customer` VALUES(8, 'teemo', 'shrooms', 'yeah@no.com');
INSERT INTO `Customer` VALUES(9, 'losermama23', 'happylife', 'babydaddyistight@yahoo.com');
INSERT INTO `Customer` VALUES(10, 'blah', 'blah', '1234@something.com');
INSERT INTO `Customer` VALUES(11, 'asd', '1212', '123@something.com');
INSERT INTO `Customer` VALUES(12, 'amberrae07', 'sandie07', 'amberraebrown@yahoo.com');
INSERT INTO `Customer` VALUES(13, 'user2', '1234', '1234@hi.com');
INSERT INTO `Customer` VALUES(14, 'user5', 'hello', 'me@g.com');
INSERT INTO `Customer` VALUES(15, 'thaoha94', 'hahaha', 'thaoha94@gmail.com');
INSERT INTO `Customer` VALUES(16, 'rvr', '9109', 'dude@hotmail.com');
INSERT INTO `Customer` VALUES(17, 'BPHill', 'Brenna100', 'barriehill@uta.edu');
INSERT INTO `Customer` VALUES(18, 'anasshahid1', 'Joker12345', 'anasshahid@hotmail.com');
INSERT INTO `Customer` VALUES(19, 'kathleen.pathammavong', 'yumyumyum1', 'kathleen.pathammavong@yahoo.com');
INSERT INTO `Customer` VALUES(20, 'danielkerud', 'Juventus2014', 'dmendoza109@gmail.com');
INSERT INTO `Customer` VALUES(21, 'phuong', 'pinky', 'phuong@yahoo.com');
INSERT INTO `Customer` VALUES(24, 'Tony', '4321', 'tony@gmail.com');
INSERT INTO `Customer` VALUES(25, 'rick', '9876', 'rick@gmail.com');
INSERT INTO `Customer` VALUES(26, 'ilovebitches', 'jessicaalba', 'armanamlani@gmail.com');
-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 31, 2019 at 05:25 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbsupermarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbrand`
--

CREATE TABLE IF NOT EXISTS `tblbrand` (
  `brandid` int(11) NOT NULL AUTO_INCREMENT,
  `brandname` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`brandid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblbrand`
--

INSERT INTO `tblbrand` (`brandid`, `brandname`, `status`) VALUES
(1, 'Eastern', '1'),
(2, 'Kitchen treasures', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE IF NOT EXISTS `tblcategory` (
  `catid` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`catid`, `category`, `status`) VALUES
(1, 'Kitchen item', '1'),
(2, 'Electronics', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee`
--

CREATE TABLE IF NOT EXISTS `tblemployee` (
  `empid` int(11) NOT NULL AUTO_INCREMENT,
  `empname` varchar(50) NOT NULL,
  `empaddress` varchar(100) NOT NULL,
  `empemail` varchar(50) NOT NULL,
  `empcontact` varchar(50) NOT NULL,
  PRIMARY KEY (`empid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblemployee`
--

INSERT INTO `tblemployee` (`empid`, `empname`, `empaddress`, `empemail`, `empcontact`) VALUES
(1, 'Jeena', 'Edappally', 'jeena@gmail.com', '9587410230');

-- --------------------------------------------------------

--
-- Table structure for table `tblitem`
--

CREATE TABLE IF NOT EXISTS `tblitem` (
  `itemid` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `rate` bigint(20) NOT NULL,
  `itemimg` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblitem`
--

INSERT INTO `tblitem` (`itemid`, `catid`, `brandid`, `itemname`, `rate`, `itemimg`, `status`) VALUES
(1, 1, 1, 'Sambar powder 100gms', 38, 'images/sambar.jpeg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin`
--

CREATE TABLE IF NOT EXISTS `tbllogin` (
  `uname` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `utype` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllogin`
--

INSERT INTO `tbllogin` (`uname`, `pwd`, `utype`, `status`) VALUES
('jeena@gmail.com', 'jeena', 'employee', '1'),
('admin@gmail.com', 'admin', 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblpurchasechild`
--

CREATE TABLE IF NOT EXISTS `tblpurchasechild` (
  `pcid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  PRIMARY KEY (`pcid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblpurchasechild`
--

INSERT INTO `tblpurchasechild` (`pcid`, `pid`, `itemid`, `qty`, `price`) VALUES
(1, 1, 1, 15, 570),
(2, 1, 1, 50, 1900),
(3, 2, 1, 50, 1900),
(4, 2, 1, 50, 1900),
(5, 2, 1, 20, 760);

-- --------------------------------------------------------

--
-- Table structure for table `tblpurchasemaster`
--

CREATE TABLE IF NOT EXISTS `tblpurchasemaster` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `dealer` varchar(50) NOT NULL,
  `pdate` date NOT NULL,
  `total` bigint(20) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblpurchasemaster`
--

INSERT INTO `tblpurchasemaster` (`pid`, `dealer`, `pdate`, `total`) VALUES
(1, 'asas', '2019-08-29', 2470),
(2, 'kl', '2019-08-29', 4560);

-- --------------------------------------------------------

--
-- Table structure for table `tblsaleschild`
--

CREATE TABLE IF NOT EXISTS `tblsaleschild` (
  `scid` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`scid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblsaleschild`
--

INSERT INTO `tblsaleschild` (`scid`, `sid`, `itemid`, `qty`, `price`) VALUES
(1, 1, 1, 1, 38),
(2, 2, 1, 1, 38),
(3, 2, 1, 1, 38),
(4, 3, 1, 2, 76),
(5, 4, 1, 1, 38);

-- --------------------------------------------------------

--
-- Table structure for table `tblsalesmaster`
--

CREATE TABLE IF NOT EXISTS `tblsalesmaster` (
  `sid` bigint(20) NOT NULL AUTO_INCREMENT,
  `sdate` date NOT NULL,
  `customer` varchar(50) NOT NULL,
  `ptype` varchar(50) NOT NULL,
  `totamount` bigint(20) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tblsalesmaster`
--

INSERT INTO `tblsalesmaster` (`sid`, `sdate`, `customer`, `ptype`, `totamount`) VALUES
(1, '2019-08-29', 'arifa', 'Card', 0),
(2, '2019-08-29', 'arifa', 'Card', 0),
(3, '2019-08-31', 'afgerwf', 'Cash', 0),
(4, '2019-08-31', 'retgr', 'Card', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblstock`
--

CREATE TABLE IF NOT EXISTS `tblstock` (
  `stockid` int(11) NOT NULL AUTO_INCREMENT,
  `itemid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`stockid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblstock`
--

INSERT INTO `tblstock` (`stockid`, `itemid`, `qty`) VALUES
(1, 1, 60);

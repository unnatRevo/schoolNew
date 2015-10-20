-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 04, 2015 at 09:14 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE IF NOT EXISTS `tbladmin` (
  `nAdminIDPK` int(11) NOT NULL AUTO_INCREMENT,
  `tUserName` text NOT NULL,
  `tPassword` text NOT NULL,
  PRIMARY KEY (`nAdminIDPK`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`nAdminIDPK`, `tUserName`, `tPassword`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tblcities`
--

CREATE TABLE IF NOT EXISTS `tblcities` (
  `nCityId` int(2) NOT NULL,
  `tCityName` text NOT NULL,
  `nStateId` int(5) NOT NULL,
  PRIMARY KEY (`nCityId`),
  KEY `nStateId` (`nStateId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcities`
--

INSERT INTO `tblcities` (`nCityId`, `tCityName`, `nStateId`) VALUES
(1, 'Ahmedabad', 1),
(2, 'Panjim', 2),
(3, 'Modasa', 1),
(4, 'Madgaon', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblclassroom`
--

CREATE TABLE IF NOT EXISTS `tblclassroom` (
  `nClassRoomId` int(2) NOT NULL,
  `tClassRoomName` text NOT NULL,
  `nFloorNo` int(3) NOT NULL,
  `nMaxCapacity` int(4) NOT NULL,
  `nNoOfBench` int(2) NOT NULL,
  PRIMARY KEY (`nClassRoomId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclassroom`
--


-- --------------------------------------------------------

--
-- Table structure for table `tblcountries`
--

CREATE TABLE IF NOT EXISTS `tblcountries` (
  `nCountryId` int(5) NOT NULL AUTO_INCREMENT,
  `tCountryName` text NOT NULL,
  PRIMARY KEY (`nCountryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblcountries`
--

INSERT INTO `tblcountries` (`nCountryId`, `tCountryName`) VALUES
(1, 'INDIA');

-- --------------------------------------------------------

--
-- Table structure for table `tbldivisions`
--

CREATE TABLE IF NOT EXISTS `tbldivisions` (
  `nDivisonId` int(2) NOT NULL AUTO_INCREMENT,
  `tDivisonName` text NOT NULL,
  `nStandardIDFK` int(2) NOT NULL,
  PRIMARY KEY (`nDivisonId`),
  UNIQUE KEY `nStdId` (`nStandardIDFK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbldivisions`
--


-- --------------------------------------------------------

--
-- Table structure for table `tblexam`
--

CREATE TABLE IF NOT EXISTS `tblexam` (
  `nExamId` int(5) NOT NULL AUTO_INCREMENT,
  `tExamName` text NOT NULL,
  `bExamType` varchar(5) NOT NULL,
  PRIMARY KEY (`nExamId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tblexam`
--

INSERT INTO `tblexam` (`nExamId`, `tExamName`, `bExamType`) VALUES
(1, '11_MidSem1', 'M1'),
(2, '12_MidSem2', 'M2'),
(3, '11_Remedial', 'R');

-- --------------------------------------------------------

--
-- Table structure for table `tblexamschedule`
--

CREATE TABLE IF NOT EXISTS `tblexamschedule` (
  `nExamScheduleId` int(2) NOT NULL,
  `nExamId` int(2) NOT NULL,
  `nSubId` int(2) NOT NULL,
  `nTotalMarks` int(3) NOT NULL,
  `nPassingMarks` int(3) NOT NULL,
  `dExamDate` date NOT NULL,
  PRIMARY KEY (`nExamScheduleId`),
  UNIQUE KEY `nExamId` (`nExamId`,`nSubId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblexamschedule`
--

INSERT INTO `tblexamschedule` (`nExamScheduleId`, `nExamId`, `nSubId`, `nTotalMarks`, `nPassingMarks`, `dExamDate`) VALUES
(1, 1, 3, 100, 50, '2015-08-05'),
(2, 2, 6, 100, 40, '2015-08-06'),
(3, 3, 9, 100, 50, '2015-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `tblfees`
--

CREATE TABLE IF NOT EXISTS `tblfees` (
  `nFeesId` int(2) NOT NULL,
  `tFeeName` text NOT NULL,
  `nAmount` int(5) NOT NULL,
  `dEffectiveFrom` date NOT NULL,
  `bIsActive` bit(1) NOT NULL,
  PRIMARY KEY (`nFeesId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfees`
--


-- --------------------------------------------------------

--
-- Table structure for table `tblhostel`
--

CREATE TABLE IF NOT EXISTS `tblhostel` (
  `nHostelId` int(2) NOT NULL,
  `tHostelName` text NOT NULL,
  `bHostelFor` tinyint(1) NOT NULL,
  `tHostelAddress` text NOT NULL,
  `nHostelCapacity` int(4) NOT NULL,
  PRIMARY KEY (`nHostelId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblhostel`
--

INSERT INTO `tblhostel` (`nHostelId`, `tHostelName`, `bHostelFor`, `tHostelAddress`, `nHostelCapacity`) VALUES
(1, 'H1', 1, 'ADD1', 100),
(2, 'H2', 0, 'ADD2', 200),
(3, 'H3', 0, 'ADDRESS ', 5),
(4, 'H4', 0, 'ADDRESS', 0),
(5, 'H5', 0, 'ADDRESS', 0),
(6, 'H6', 0, 'ADDRESS', 0),
(7, 'H7', 0, 'ADDRESS', 0),
(8, 'H8', 0, 'ADDRESS', 0),
(9, 'H9', 0, 'ADDRESS', 0),
(10, 'H10', 0, 'ADDRESS', 0),
(11, 'H11', 0, 'ADDRESS', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblhostelrooms`
--

CREATE TABLE IF NOT EXISTS `tblhostelrooms` (
  `nRoomId` int(3) NOT NULL,
  `tRoomNo` text NOT NULL,
  `nFloorNo` int(3) NOT NULL,
  `nHostelId` int(3) NOT NULL,
  `nMaxCapacity` int(2) NOT NULL,
  PRIMARY KEY (`nRoomId`),
  UNIQUE KEY `nHostelId` (`nHostelId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblhostelrooms`
--


-- --------------------------------------------------------

--
-- Table structure for table `tblstandard`
--

CREATE TABLE IF NOT EXISTS `tblstandard` (
  `nStandardId` int(2) NOT NULL,
  `tStandardName` text NOT NULL,
  `bIsActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`nStandardId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstandard`
--

INSERT INTO `tblstandard` (`nStandardId`, `tStandardName`, `bIsActive`) VALUES
(1, '10', 1),
(2, '11', 1),
(3, '12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstate`
--

CREATE TABLE IF NOT EXISTS `tblstate` (
  `nStateId` int(5) NOT NULL,
  `tStateName` text NOT NULL,
  `nCountryId` int(5) NOT NULL,
  PRIMARY KEY (`nStateId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstate`
--

INSERT INTO `tblstate` (`nStateId`, `tStateName`, `nCountryId`) VALUES
(1, 'Gujarat', 1),
(2, 'Goa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE IF NOT EXISTS `tblstudent` (
  `nGRNO` int(5) NOT NULL,
  `nEnrollmentNo` int(15) NOT NULL,
  `tFname` text NOT NULL,
  `tMname` text NOT NULL,
  `tLname` text NOT NULL,
  `bGender` tinyint(1) NOT NULL,
  `dBirthDate` date NOT NULL,
  `dAdmissionDate` date NOT NULL,
  `bStaysAtHostel` tinyint(1) NOT NULL,
  `bIsActive` tinyint(1) NOT NULL,
  `btStreamGroup` bit(1) NOT NULL,
  PRIMARY KEY (`nGRNO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`nGRNO`, `nEnrollmentNo`, `tFname`, `tMname`, `tLname`, `bGender`, `dBirthDate`, `dAdmissionDate`, `bStaysAtHostel`, `bIsActive`, `btStreamGroup`) VALUES
(1, 0, 'Jinkal', 'N', 'Panchal', 1, '1990-04-18', '0000-00-00', 1, 1, '\0'),
(2, 0, 'Sunil', 'G', 'Shreepal', 1, '1991-02-15', '0000-00-00', 0, 1, '\0');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentclassroom`
--

CREATE TABLE IF NOT EXISTS `tblstudentclassroom` (
  `nStudentClassRoomId` int(2) NOT NULL,
  `nDivId` int(2) NOT NULL,
  `dAllocationDate` date NOT NULL,
  `nStudentRollNo` int(3) NOT NULL,
  PRIMARY KEY (`nStudentClassRoomId`),
  UNIQUE KEY `nDivId` (`nDivId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudentclassroom`
--


-- --------------------------------------------------------

--
-- Table structure for table `tblstudentcontactdetail`
--

CREATE TABLE IF NOT EXISTS `tblstudentcontactdetail` (
  `nContactId` int(2) NOT NULL,
  `nGRNO` int(15) NOT NULL,
  `tAddress` text NOT NULL,
  `bAddressType` tinyint(1) NOT NULL,
  `tArea` text NOT NULL,
  `nCityId` int(6) NOT NULL,
  `nPincode` int(6) NOT NULL,
  PRIMARY KEY (`nContactId`),
  KEY `nGRNO` (`nGRNO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudentcontactdetail`
--

INSERT INTO `tblstudentcontactdetail` (`nContactId`, `nGRNO`, `tAddress`, `bAddressType`, `tArea`, `nCityId`, `nPincode`) VALUES
(1, 1, 'NARODA', 1, 'NARODA', 1, 380008),
(2, 2, 'Isanpur', 1, 'Isanpur', 1, 382443);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentcurrentresult`
--

CREATE TABLE IF NOT EXISTS `tblstudentcurrentresult` (
  `nScheduleId` int(2) NOT NULL COMMENT 'Exam Schedule Table',
  `nGRNO` int(5) NOT NULL,
  `nObtainMarks` int(3) NOT NULL,
  `bGrade` bit(1) NOT NULL,
  UNIQUE KEY `nScheduleId` (`nScheduleId`,`nGRNO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudentcurrentresult`
--


-- --------------------------------------------------------

--
-- Table structure for table `tblstudentfees`
--

CREATE TABLE IF NOT EXISTS `tblstudentfees` (
  `nStudentFeesId` int(2) NOT NULL,
  `mGRNO` int(5) NOT NULL,
  `nStdId` int(2) NOT NULL,
  `nFeesId` int(2) NOT NULL,
  `nPaidAmount` int(5) NOT NULL,
  `dPaidDate` date NOT NULL,
  PRIMARY KEY (`nStudentFeesId`),
  UNIQUE KEY `mGRNO` (`mGRNO`,`nStdId`,`nFeesId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudentfees`
--


-- --------------------------------------------------------

--
-- Table structure for table `tblstudentpreviousresult`
--

CREATE TABLE IF NOT EXISTS `tblstudentpreviousresult` (
  `nStudentPreviousResultId` int(2) NOT NULL,
  `nGRNO` int(5) NOT NULL,
  `nSubjectId` int(2) NOT NULL,
  `nTotalMarks` int(4) NOT NULL,
  `nObtainMarks` int(4) NOT NULL,
  `dYearOfPassing` date NOT NULL,
  PRIMARY KEY (`nStudentPreviousResultId`),
  UNIQUE KEY `nGRNO` (`nGRNO`,`nSubjectId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudentpreviousresult`
--


-- --------------------------------------------------------

--
-- Table structure for table `tblsubject`
--

CREATE TABLE IF NOT EXISTS `tblsubject` (
  `nSubjectId` int(2) NOT NULL AUTO_INCREMENT,
  `tSubjectName` varchar(100) NOT NULL,
  `nForStandard` int(2) NOT NULL,
  `bIsActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`nSubjectId`),
  KEY `nForStandard` (`nForStandard`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tblsubject`
--

INSERT INTO `tblsubject` (`nSubjectId`, `tSubjectName`, `nForStandard`, `bIsActive`) VALUES
(1, 'Maths', 1, 1),
(2, 'Social Studies', 1, 1),
(3, 'Physics_11', 2, 1),
(4, 'Physics_12', 3, 1),
(5, 'Chemistry_11', 2, 1),
(6, 'Chemistry_12', 3, 1),
(7, 'English', 1, 1),
(8, 'Gujarati', 1, 1),
(9, 'Biology_11', 2, 1),
(10, 'Biology_12', 3, 1);

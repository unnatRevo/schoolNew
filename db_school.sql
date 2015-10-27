-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2015 at 12:10 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


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
-- Table structure for table `tblattendence`
--

CREATE TABLE IF NOT EXISTS `tblattendence` (
  `nSrNo` int(2) NOT NULL AUTO_INCREMENT,
  `dDay` text NOT NULL,
  `nGRNO` int(3) NOT NULL,
  `nStandardId` int(3) NOT NULL,
  `isPresent` tinyint(1) NOT NULL,
  `tSubjectName` text NOT NULL,
  PRIMARY KEY (`nSrNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=154 ;

--
-- Dumping data for table `tblattendence`
--

INSERT INTO `tblattendence` (`nSrNo`, `dDay`, `nGRNO`, `nStandardId`, `isPresent`, `tSubjectName`) VALUES
(115, '1442354400', 3, 3, 1, 'Chemistry_12 | Biology_12'),
(116, '1442354400', 4, 3, 1, 'Chemistry_12 | Biology_12'),
(117, '1442354400', 5, 3, 1, 'Chemistry_12 | Biology_12'),
(118, '1442872800', 3, 3, 1, 'Physics_12 | Biology_12'),
(119, '1442872800', 4, 3, 1, 'Physics_12 | Biology_12'),
(120, '1442872800', 5, 3, 1, 'Physics_12 | Biology_12'),
(129, '1445378400', 3, 3, 0, ''),
(130, '1445378400', 5, 3, 1, ''),
(131, '1445378400', 1, 2, 0, 'Physics_11'),
(132, '1445378400', 2, 2, 0, 'Physics_11'),
(133, '1445378400', 4, 2, 1, 'Physics_11'),
(134, '1445551200', 3, 3, 0, 'Physics_12 | Chemistry_12 | Biology_12'),
(135, '1445551200', 5, 3, 1, 'Physics_12 | Chemistry_12 | Biology_12'),
(136, '1445551200', 17, 3, 1, 'Physics_12 | Chemistry_12 | Biology_12'),
(137, '1445464800', 1, 2, 1, 'Physics_11 | Chemistry_11 | Biology_11'),
(138, '1445464800', 2, 2, 1, 'Physics_11 | Chemistry_11 | Biology_11'),
(139, '1445464800', 4, 2, 1, 'Physics_11 | Chemistry_11 | Biology_11'),
(140, '1445464800', 16, 2, 1, 'Physics_11 | Chemistry_11 | Biology_11'),
(141, '1445464800', 3, 3, 0, ''),
(142, '1445464800', 5, 3, 1, ''),
(143, '1445464800', 17, 3, 1, ''),
(144, '1445464800', 3, 12, 1, 'Economics | Account | Physics_12 | Chemistry_12 | Biology_12'),
(145, '1445464800', 5, 12, 1, 'Economics | Account | Physics_12 | Chemistry_12 | Biology_12'),
(146, '1445464800', 17, 12, 1, 'Economics | Account | Physics_12 | Chemistry_12 | Biology_12'),
(147, '1445464800', 1, 11, 1, 'Physics_11 | Chemistry_11 | Statastics | Biology_11'),
(148, '1445464800', 2, 11, 1, 'Physics_11 | Chemistry_11 | Statastics | Biology_11'),
(149, '1445464800', 4, 11, 1, 'Physics_11 | Chemistry_11 | Statastics | Biology_11'),
(150, '1445464800', 16, 11, 1, 'Physics_11 | Chemistry_11 | Statastics | Biology_11'),
(151, '1445551200', 3, 12, 0, 'Economics | Physics_12'),
(152, '1445551200', 5, 12, 1, 'Economics | Physics_12'),
(153, '1445551200', 17, 12, 1, 'Economics | Physics_12');

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

-- --------------------------------------------------------

--
-- Table structure for table `tblhostel`
--

CREATE TABLE IF NOT EXISTS `tblhostel` (
  `nHostelId` int(2) NOT NULL AUTO_INCREMENT,
  `tHostelName` text NOT NULL,
  `bHostelFor` tinyint(1) NOT NULL,
  `tHostelAddress` text NOT NULL,
  `nHostelCapacity` int(4) NOT NULL,
  `nMaxCapacity` int(2) NOT NULL,
  PRIMARY KEY (`nHostelId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tblhostel`
--

INSERT INTO `tblhostel` (`nHostelId`, `tHostelName`, `bHostelFor`, `tHostelAddress`, `nHostelCapacity`, `nMaxCapacity`) VALUES
(2, 'H221', 1, 'ADD2      ', 100, 4),
(3, 'H3', 1, 'ADDRESS  ', 5, 0),
(4, 'H4', 0, 'ADDRESS', 0, 0),
(5, 'H5', 0, 'ADDRESS', 0, 0),
(7, 'H7', 0, 'ADDRESS', 0, 0),
(10, 'H10', 0, 'ADDRESS', 0, 0),
(12, 'H12', 1, 'add ', 122, 0),
(19, 'H13', 1, 'add13', 10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tblhostelrooms`
--

CREATE TABLE IF NOT EXISTS `tblhostelrooms` (
  `nRoomId` int(3) NOT NULL AUTO_INCREMENT,
  `tRoomNo` text NOT NULL,
  `nFloorNo` int(3) NOT NULL,
  `nHostelId` int(3) NOT NULL,
  `nMaxCapacity` int(2) NOT NULL,
  PRIMARY KEY (`nRoomId`),
  UNIQUE KEY `nHostelId` (`nHostelId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tblhostelrooms`
--

INSERT INTO `tblhostelrooms` (`nRoomId`, `tRoomNo`, `nFloorNo`, `nHostelId`, `nMaxCapacity`) VALUES
(1, '1', 1, 1, 4),
(2, '2', 2, 2, 4),
(4, 'A101', 1, 4, 5),
(9, '3', 3, 3, 3),
(11, ' 1', 1, 19, 4),
(12, ' 3', 2, 12, 3);

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
(11, '11', 1),
(12, '12', 1);

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
  `nGRNO` int(5) NOT NULL AUTO_INCREMENT,
  `nEnrollmentNo` int(15) DEFAULT NULL,
  `tFname` text NOT NULL,
  `tMname` text NOT NULL,
  `tLname` text NOT NULL,
  `bGender` tinyint(1) NOT NULL,
  `dBirthDate` date NOT NULL,
  `dAdmissionDate` date DEFAULT NULL,
  `bStaysAtHostel` tinyint(1) NOT NULL,
  `bIsActive` tinyint(1) NOT NULL,
  `btStreamGroup` int(1) NOT NULL,
  PRIMARY KEY (`nGRNO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`nGRNO`, `nEnrollmentNo`, `tFname`, `tMname`, `tLname`, `bGender`, `dBirthDate`, `dAdmissionDate`, `bStaysAtHostel`, `bIsActive`, `btStreamGroup`) VALUES
(4, 0, 'Unnat', 'P', 'Pandya', 1, '1993-03-28', '2015-10-20', 1, 1, 11),
(5, 0, 'Aakash', 'J', 'Kodwani', 1, '1992-05-30', '0000-00-00', 1, 1, 12),
(16, 0, 'Salins', 'R', 'Christian', 1, '1991-05-03', '0000-00-00', 1, 1, 11),
(17, 0, 'Ishita', 'M', 'Patel', 0, '1993-06-17', '2015-10-20', 1, 1, 12);

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

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentroomallocation`
--

CREATE TABLE IF NOT EXISTS `tblstudentroomallocation` (
  `nSrNo` int(3) NOT NULL AUTO_INCREMENT,
  `nHostelId` int(2) NOT NULL,
  `nRoomId` int(3) NOT NULL,
  `nGRNO` int(5) NOT NULL,
  `isAllocated` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nSrNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tblstudentroomallocation`
--

INSERT INTO `tblstudentroomallocation` (`nSrNo`, `nHostelId`, `nRoomId`, `nGRNO`, `isAllocated`) VALUES
(9, 2, 2, 2, 0),
(10, 2, 2, 1, 0),
(11, 2, 2, 6, 0),
(12, 2, 2, 4, 1),
(13, 2, 2, 5, 1),
(14, 2, 2, 16, 1),
(16, 4, 4, 17, 1),
(19, 2, 2, 59, 0),
(20, 2, 2, 60, 0),
(21, 2, 2, 18, 0),
(22, 2, 2, 19, 0),
(23, 2, 2, 20, 0),
(24, 2, 2, 21, 0),
(25, 2, 2, 22, 0),
(26, 2, 2, 23, 0),
(27, 2, 2, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentstandard`
--

CREATE TABLE IF NOT EXISTS `tblstudentstandard` (
  `nSrNo` int(3) NOT NULL AUTO_INCREMENT,
  `nGRNO` int(3) NOT NULL,
  `nStandardId` int(3) NOT NULL,
  PRIMARY KEY (`nSrNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tblstudentstandard`
--

INSERT INTO `tblstudentstandard` (`nSrNo`, `nGRNO`, `nStandardId`) VALUES
(1, 1, 11),
(2, 2, 11),
(3, 3, 12),
(4, 4, 11),
(5, 5, 12),
(16, 17, 12),
(17, 16, 11);

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
(1, 'Economics', 12, 1),
(2, 'Account', 12, 1),
(3, 'Physics_11', 11, 1),
(4, 'Physics_12', 12, 1),
(5, 'Chemistry_11', 11, 1),
(6, 'Chemistry_12', 12, 1),
(8, 'Statastics', 11, 1),
(9, 'Biology_11', 11, 1),
(10, 'Biology_12', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbluserdetails`
--

CREATE TABLE IF NOT EXISTS `tbluserdetails` (
  `tUsername` varchar(32) NOT NULL,
  `tPassword` varchar(32) NOT NULL,
  `tFirstName` varchar(30) NOT NULL,
  `tLastName` varchar(30) NOT NULL,
  `tUserType` int(1) NOT NULL,
  PRIMARY KEY (`tUsername`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluserdetails`
--

INSERT INTO `tbluserdetails` (`tUsername`, `tPassword`, `tFirstName`, `tLastName`, `tUserType`) VALUES
(' admin', 'admin', 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbluserlogin`
--

CREATE TABLE IF NOT EXISTS `tbluserlogin` (
  `tUsername` varchar(32) NOT NULL,
  `tPassword` varchar(32) NOT NULL,
  `tUserType` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluserlogin`
--

INSERT INTO `tbluserlogin` (`tUsername`, `tPassword`, `tUserType`) VALUES
('admin', 'admin', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

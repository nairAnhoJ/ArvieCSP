-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2022 at 02:59 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arviedsproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(60) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `contact_number` int(15) NOT NULL,
  `date` datetime NOT NULL,
  `access` varchar(8) NOT NULL,
  `permission` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `first_name`, `last_name`, `email_address`, `pass`, `contact_number`, `date`, `access`, `permission`) VALUES
(1, 'test', 'test', 'test@glory.com.ph', '$2y$10$sEWksoBuM7DPCeHAZywmo.pIyU6qGfRufSF/28lPniQBm.W6FveS.', 123123123, '2022-09-18 15:04:41', '', ''),
(2, 'Cedrick James', 'Domo', 'test@glory.com', '$2y$10$X9GEBKzy1YYUq5K010m.M.k7NdLUCn57X6bPVX1E0baev7s5MvDh6', 123123123, '2022-09-18 15:17:13', '', ''),
(3, 'read', 'me', 'readme@gmail.com', '$2y$10$zZJRgeINR/yYpXgI5O9skONZou79fYF96Nf5cP/uJv2ICFMgrNrry', 123123123, '2022-09-18 22:35:05', '', ''),
(4, 'Marero', '123', 'marerokevin@gmail.com', '$2y$10$MgbnTX/izVUCpeldQyhnceKlm9GLjWfzoefbO6cs4Jdqu46b2oqQu', 123123, '2022-09-18 22:49:40', 'approved', 'administ'),
(5, 'test', 'test', 'test@gmail.com.ph', '$2y$10$Xks2lk2/VZAoMWautPTKB.aAJODfpYqil9nLe3.MjakZLQUW1nqPq', 123123123, '2022-09-18 23:15:57', '', ''),
(6, 'kevin', 'marero', 'test@tmail.com', '$2y$10$5CJfQLwRqp.PD3ClnQkFJuV893QopQet7t.txh6YAW/vAsN3fsML6', 123123123, '2022-09-18 23:19:36', '', ''),
(7, 'toys', 'lol', 'latoy@gmail.com', '$2y$10$7R.bKBPMqK2GlsvQ464GVu52uyFZzCPU8pDANZ5geh5m9nhdfNlkS', 123123132, '2022-09-18 23:20:48', '', ''),
(8, 'test', 'sdaasd', 'rwqer@gmail.com', '$2y$10$46uNbWFECLnPmngFX0jFD.hI2bV96OdqNCSYw6ALqkdPOwL3EVk12', 123123123, '2022-09-18 23:30:43', '', ''),
(11, 'Kevin Roy', 'marero', 'marero@gmail.com', '$2y$10$wX0.cTEeBO1P/wujdA6gtu5cchj.7WD9S7J1qS1oYg7kGTK.VD3yO', 123123, '2022-09-20 00:16:50', 'approved', 'user'),
(13, 'Cedrick', 'Pogi', 'cedrickjames.orozo@cvsu.edu.ph', '$2y$10$S2.vwY8Dc6OOPEVYpKdV6uCJKrac1TU46lkGnzlBPK3Otb/fXggDO', 123123345, '2022-09-19 23:15:26', 'approved', 'user'),
(17, 'arian', 'malondras', 'arian@gmail.com', '$2y$10$yP8UwkcmHJrIj4rdJ4OZZO5mjb9n5eT3TEl7QZQ4anD01gAWiDOvu', 123456, '2022-09-19 23:16:41', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `generated_code`
--

CREATE TABLE `generated_code` (
  `code_id` int(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `userNameOfSponsor` varchar(100) NOT NULL,
  `userIdOfSponsor` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `validity` date NOT NULL,
  `date_created` date NOT NULL,
  `userNameOfCodeOwner` varchar(100) NOT NULL,
  `userIdOfCodeOwner` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `generated_code`
--

INSERT INTO `generated_code` (`code_id`, `type`, `userNameOfSponsor`, `userIdOfSponsor`, `code`, `validity`, `date_created`, `userNameOfCodeOwner`, `userIdOfCodeOwner`) VALUES
(1, 'RA', 'James Orozo', '13', 'DR10SKDJFH498', '2022-11-01', '2022-10-01', 'marero@gmail.com', 11),
(2, 'RA', 'James Orozo', '13', 'DR10DKFJS', '2022-11-10', '2022-10-10', 'marero@gmail.com', 11),
(3, 'RA', 'James Orozo', '13', 'DR10DKFJSLKJL', '2022-11-10', '2022-10-10', 'marero@gmail.com', 11);

-- --------------------------------------------------------

--
-- Table structure for table `invites`
--

CREATE TABLE `invites` (
  `invitesID` int(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  `idOfInvite` int(30) NOT NULL,
  `invitee` varchar(20) NOT NULL,
  `inviteeID` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invites`
--

INSERT INTO `invites` (`invitesID`, `name`, `idOfInvite`, `invitee`, `inviteeID`) VALUES
(32, 'Cedrick Pogi', 13, 'Kevin Roy marero', 11),
(41, 'Cedrick James Orozo', 12, 'James Orozo', 13),
(43, 'Kevin Roy marero', 11, 'Arian Malondras', 17),
(44, 'Arian Malondras', 17, 'test', 1),
(45, 'test', 1, 'test2', 2),
(46, 'test2', 2, 'test3', 3),
(47, 'test3', 3, 'test4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `rebates_points`
--

CREATE TABLE `rebates_points` (
  `rebates_points_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `pointsEarned` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rebates_points`
--

INSERT INTO `rebates_points` (`rebates_points_id`, `user_id`, `email_address`, `pointsEarned`) VALUES
(1, 11, 'marero@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE `relationship` (
  `level` int(7) NOT NULL,
  `dl` int(10) NOT NULL,
  `rbt` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `relationship`
--

INSERT INTO `relationship` (`level`, `dl`, `rbt`) VALUES
(1, 10, 500),
(2, 100, 10),
(3, 1000, 10),
(4, 10000, 10),
(5, 100000, 10),
(6, 500000, 10),
(7, 500000, 10),
(8, 500000, 10),
(9, 500000, 10),
(10, 500000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `totalbalance`
--

CREATE TABLE `totalbalance` (
  `totalBalanceId` int(20) NOT NULL,
  `userID` int(30) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `totalBalance` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `totalbalance`
--

INSERT INTO `totalbalance` (`totalBalanceId`, `userID`, `userName`, `totalBalance`) VALUES
(27, 13, 'cedrickjames.orozo@cvsu.edu.ph', 1000),
(28, 11, 'marero@gmail.com', 840),
(39, 12, 'cedrickorozo@gmail.com', 0),
(40, 17, 'arian@gmail.com', 360),
(41, 1, 'test@glory.com.ph', 180),
(42, 2, 'test@glory.com', 180),
(43, 3, 'readme@gmail.com', 180),
(44, 4, 'marerokevin@gmail.com', 150);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transactionId` int(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userId` int(50) NOT NULL,
  `inviteName` varchar(50) NOT NULL,
  `inviteeName` varchar(50) NOT NULL,
  `packageType` varchar(200) NOT NULL,
  `codeOwner` varchar(200) NOT NULL COMMENT 'indicates the user of the code',
  `codeOwnerId` varchar(200) NOT NULL COMMENT 'this indicates the id of the code user',
  `addedAmount` int(50) NOT NULL,
  `TotalBalance` int(50) NOT NULL,
  `addedPoints` int(50) NOT NULL,
  `totalPoints` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transactionId`, `type`, `userName`, `userId`, `inviteName`, `inviteeName`, `packageType`, `codeOwner`, `codeOwnerId`, `addedAmount`, `TotalBalance`, `addedPoints`, `totalPoints`) VALUES
(69, 'Direct Referral', 'cedrickjames.orozo@cvsu.edu.ph', 13, 'Cedrick James Orozo', 'James Orozo', '', '', '', 500, 500, 0, 0),
(70, 'Indirect Referral', 'Kevin Roy marero', 11, 'Cedrick James Orozo', 'James Orozo', '', '', '', 10, 510, 0, 0),
(73, 'Direct Referral', 'cedrickjames.orozo@cvsu.edu.ph', 13, 'q e', 'James Orozo', '', '', '', 500, 1000, 0, 0),
(74, 'Indirect Referral', 'Kevin Roy marero', 11, 'q e', 'James Orozo', '', '', '', 10, 520, 0, 0),
(75, 'Rebates', '', 11, '', '', 'RA', 'cedrickjames.orozo@cvsu.edu.ph', '13', 80, 760, 0, 0),
(76, 'Rebates', '', 17, '', '', 'RA', 'cedrickjames.orozo@cvsu.edu.ph', '13', 30, 90, 0, 0),
(77, 'Rebates', '', 1, '', '', 'RA', 'cedrickjames.orozo@cvsu.edu.ph', '13', 30, 60, 0, 0),
(78, 'Rebates', '', 2, '', '', 'RA', 'cedrickjames.orozo@cvsu.edu.ph', '13', 30, 60, 0, 0),
(79, 'Rebates', '', 3, '', '', 'RA', 'cedrickjames.orozo@cvsu.edu.ph', '13', 30, 60, 0, 0),
(80, 'Rebates', '', 4, '', '', 'RA', 'cedrickjames.orozo@cvsu.edu.ph', '13', 20, 40, 0, 0),
(81, 'Rebates', 'marero@gmail.com', 11, '', '', 'RA', 'cedrickjames.orozo@cvsu.edu.ph', '13', 80, 840, 0, 0),
(82, 'Rebates', 'arian@gmail.com', 17, '', '', 'RA', 'cedrickjames.orozo@cvsu.edu.ph', '13', 30, 120, 0, 0),
(83, 'Rebates', 'test@glory.com.ph', 1, '', '', 'RA', 'cedrickjames.orozo@cvsu.edu.ph', '13', 30, 90, 0, 0),
(84, 'Rebates', 'test@glory.com', 2, '', '', 'RA', 'cedrickjames.orozo@cvsu.edu.ph', '13', 30, 90, 0, 0),
(85, 'Rebates', 'readme@gmail.com', 3, '', '', 'RA', 'cedrickjames.orozo@cvsu.edu.ph', '13', 30, 90, 0, 0),
(86, 'Rebates', 'marerokevin@gmail.com', 4, '', '', 'RA', 'cedrickjames.orozo@cvsu.edu.ph', '13', 20, 60, 0, 0),
(87, 'Rebates', 'arian@gmail.com', 17, '', '', 'RA', 'marero@gmail.com', '11', 80, 200, 0, 0),
(88, 'Rebates', 'test@glory.com.ph', 1, '', '', 'RA', 'marero@gmail.com', '11', 30, 120, 0, 0),
(89, 'Rebates', 'test@glory.com', 2, '', '', 'RA', 'marero@gmail.com', '11', 30, 120, 0, 0),
(90, 'Rebates', 'readme@gmail.com', 3, '', '', 'RA', 'marero@gmail.com', '11', 30, 120, 0, 0),
(91, 'Rebates', 'marerokevin@gmail.com', 4, '', '', 'RA', 'marero@gmail.com', '11', 30, 90, 0, 0),
(92, 'Rebates', 'arian@gmail.com', 17, '', '', 'RA', 'marero@gmail.com', '11', 80, 280, 0, 0),
(93, 'Rebates', 'test@glory.com.ph', 1, '', '', 'RA', 'marero@gmail.com', '11', 30, 150, 0, 0),
(94, 'Rebates', 'test@glory.com', 2, '', '', 'RA', 'marero@gmail.com', '11', 30, 150, 0, 0),
(95, 'Rebates', 'readme@gmail.com', 3, '', '', 'RA', 'marero@gmail.com', '11', 30, 150, 0, 0),
(96, 'Rebates', 'marerokevin@gmail.com', 4, '', '', 'RA', 'marero@gmail.com', '11', 30, 120, 0, 0),
(97, 'Points', 'marero@gmail.com', 11, '', '', 'RA', '', '', 0, 0, 1, 3),
(98, 'Rebates', 'arian@gmail.com', 17, '', '', 'RA', 'marero@gmail.com', '11', 80, 360, 0, 0),
(99, 'Rebates', 'test@glory.com.ph', 1, '', '', 'RA', 'marero@gmail.com', '11', 30, 180, 0, 0),
(100, 'Rebates', 'test@glory.com', 2, '', '', 'RA', 'marero@gmail.com', '11', 30, 180, 0, 0),
(101, 'Rebates', 'readme@gmail.com', 3, '', '', 'RA', 'marero@gmail.com', '11', 30, 180, 0, 0),
(102, 'Rebates', 'marerokevin@gmail.com', 4, '', '', 'RA', 'marero@gmail.com', '11', 30, 150, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generated_code`
--
ALTER TABLE `generated_code`
  ADD PRIMARY KEY (`code_id`),
  ADD UNIQUE KEY `uniqueCode` (`code`);

--
-- Indexes for table `invites`
--
ALTER TABLE `invites`
  ADD PRIMARY KEY (`invitesID`);

--
-- Indexes for table `rebates_points`
--
ALTER TABLE `rebates_points`
  ADD PRIMARY KEY (`rebates_points_id`);

--
-- Indexes for table `totalbalance`
--
ALTER TABLE `totalbalance`
  ADD PRIMARY KEY (`totalBalanceId`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transactionId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `generated_code`
--
ALTER TABLE `generated_code`
  MODIFY `code_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invites`
--
ALTER TABLE `invites`
  MODIFY `invitesID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `rebates_points`
--
ALTER TABLE `rebates_points`
  MODIFY `rebates_points_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `totalbalance`
--
ALTER TABLE `totalbalance`
  MODIFY `totalBalanceId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transactionId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2022 at 03:34 AM
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
-- Database: `arvieds`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(60) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `sponsor` varchar(100) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `contact_number` int(15) NOT NULL,
  `date` datetime NOT NULL,
  `access` varchar(8) NOT NULL,
  `permission` varchar(8) NOT NULL,
  `referralId` varchar(16) NOT NULL,
  `homeaddress` varchar(255) NOT NULL,
  `tin_acct` varchar(255) NOT NULL,
  `sss_num` varchar(255) NOT NULL,
  `member_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `first_name`, `last_name`, `sponsor`, `email_address`, `pass`, `contact_number`, `date`, `access`, `permission`, `referralId`, `homeaddress`, `tin_acct`, `sss_num`, `member_id`) VALUES
(1, 'Kevin Roy', 'Marero', '', 'marerokevin@gmail.com', '$2y$10$MgbnTX/izVUCpeldQyhnceKlm9GLjWfzoefbO6cs4Jdqu46b2oqQu', 927436714, '2022-09-18 22:49:40', 'approved', 'administ', 'DR1069420ADA', 'Blk. 6, Lt. 5, Villa Monteverde, Mulawin, Tanza', '710-241-241', '89-5834122-91', 'ADSkSD123'),
(2, 'Cedrick James', 'Orozo', 'John Arian Malondras', 'cedrickorozo@gmail.com', '$2y$10$yFe7t7Z8vp9sXNr6U9BE5ueaVanhI088/KVhz.qACqzehTGIkbLtK', 0, '2022-10-15 22:56:26', 'approved', 'userist', 'asd12-12345', '0233 Palangue 2 Naic Cavite', 'lkj', 'lkj', 'ADS10-1'),
(3, 'Chrisostomo', 'Ibarra', 'ADSkSD123', 'cedrickjames.orozo@cvsu.edu.ph', '$2y$10$jhb3zIrMGSXk8Lm31QX6we271/zT53he0l36ESU1WMq308SHP5XIi', 1929129812, '2022-10-16 00:03:23', 'approved', 'userist', 'asd12-12345', 'Las Filipinas', '0329302', '92382', 'ADS10-1');

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
(3, 'RA', 'James Orozo', '13', 'RA10DKFJSLKJL', '2022-11-10', '2022-10-10', 'marero@gmail.com', 11);

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
(32, 'James Orozo', 13, 'Kevin Roy marero', 11),
(41, 'Cedrick James Orozo', 12, 'James Orozo', 13),
(43, 'q e', 17, 'James Orozo', 13),
(44, 'ChrisostomoIbarra', 0, 'Kevin Roy Marero', 0);

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
(1, 11, 'marero@gmail.com', 7);

-- --------------------------------------------------------

--
-- Table structure for table `referral_codes`
--

CREATE TABLE `referral_codes` (
  `gen_date` datetime NOT NULL,
  `referrer` varchar(255) NOT NULL,
  `transfer_date` datetime NOT NULL,
  `referee` varchar(255) DEFAULT NULL,
  `transact_date` datetime NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `generation_batch` varchar(255) NOT NULL,
  `ref_code` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referral_codes`
--

INSERT INTO `referral_codes` (`gen_date`, `referrer`, `transfer_date`, `referee`, `transact_date`, `status`, `generation_batch`, `ref_code`) VALUES
('2022-10-11 22:44:25', 'ADSkSD123', '2022-10-11 22:44:25', '', '2022-10-11 22:44:25', 'to_redeem', '', 'asd12-12345');

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
(27, 2, 'cedrickjames.orozo@cvsu.edu.ph', 1000),
(28, 11, 'marero@gmail.com', 520),
(39, 12, 'cedrickorozo@gmail.com', 0),
(40, 17, 'arian@gmail.com', 0),
(41, 0, 'cedrickjames.orozo@cvsu.edu.ph', 100),
(42, 0, 'marerokevin@gmail.com', 100);

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
(69, 'Direct Referral', 'cedrickjames.orozo@cvsu.edu.ph', 2, 'Cedrick James Orozo', 'James Orozo', '', '', '', 500, 500, 0, 0),
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
(102, 'Rebates', 'marerokevin@gmail.com', 4, '', '', 'RA', 'marero@gmail.com', '11', 30, 150, 0, 0),
(103, 'Points', 'marero@gmail.com', 11, '', '', 'RA', '', '', 0, 0, 1, 4),
(104, 'Rebates', 'arian@gmail.com', 17, '', '', 'RA', 'marero@gmail.com', '11', 80, 440, 0, 0),
(105, 'Rebates', 'test@glory.com.ph', 1, '', '', 'RA', 'marero@gmail.com', '11', 30, 210, 0, 0),
(106, 'Rebates', 'test@glory.com', 2, '', '', 'RA', 'marero@gmail.com', '11', 30, 210, 0, 0),
(107, 'Rebates', 'readme@gmail.com', 3, '', '', 'RA', 'marero@gmail.com', '11', 30, 210, 0, 0),
(108, 'Rebates', 'marerokevin@gmail.com', 4, '', '', 'RA', 'marero@gmail.com', '11', 30, 180, 0, 0),
(109, 'Points', 'marero@gmail.com', 11, '', '', 'RA', '', '', 0, 0, 1, 5),
(110, 'Rebates', 'arian@gmail.com', 17, '', '', 'RA', 'marero@gmail.com', '11', 80, 520, 0, 0),
(111, 'Rebates', 'test@glory.com.ph', 1, '', '', 'RA', 'marero@gmail.com', '11', 30, 240, 0, 0),
(112, 'Rebates', 'test@glory.com', 2, '', '', 'RA', 'marero@gmail.com', '11', 30, 240, 0, 0),
(113, 'Rebates', 'readme@gmail.com', 3, '', '', 'RA', 'marero@gmail.com', '11', 30, 240, 0, 0),
(114, 'Rebates', 'marerokevin@gmail.com', 4, '', '', 'RA', 'marero@gmail.com', '11', 30, 210, 0, 0),
(115, 'Points', 'marero@gmail.com', 11, '', '', 'RA', '', '', 0, 0, 1, 6),
(116, 'Rebates', 'arian@gmail.com', 17, '', '', 'RA', 'marero@gmail.com', '11', 80, 600, 0, 0),
(117, 'Rebates', 'test@glory.com.ph', 1, '', '', 'RA', 'marero@gmail.com', '11', 30, 270, 0, 0),
(118, 'Rebates', 'test@glory.com', 2, '', '', 'RA', 'marero@gmail.com', '11', 30, 270, 0, 0),
(119, 'Rebates', 'readme@gmail.com', 3, '', '', 'RA', 'marero@gmail.com', '11', 30, 270, 0, 0),
(120, 'Rebates', 'marerokevin@gmail.com', 4, '', '', 'RA', 'marero@gmail.com', '11', 30, 240, 0, 0),
(121, 'Points', 'marero@gmail.com', 11, '', '', 'RA', '', '', 0, 0, 1, 7),
(122, 'Rebates', 'arian@gmail.com', 17, '', '', 'RA', 'marero@gmail.com', '11', 80, 680, 0, 0),
(123, 'Rebates', 'test@glory.com.ph', 1, '', '', 'RA', 'marero@gmail.com', '11', 30, 300, 0, 0),
(124, 'Rebates', 'test@glory.com', 2, '', '', 'RA', 'marero@gmail.com', '11', 30, 300, 0, 0),
(125, 'Rebates', 'readme@gmail.com', 3, '', '', 'RA', 'marero@gmail.com', '11', 30, 300, 0, 0),
(126, 'Rebates', 'marerokevin@gmail.com', 4, '', '', 'RA', 'marero@gmail.com', '11', 30, 270, 0, 0),
(127, 'Direct Referral', 'cedrickjames.orozo@cvsu.edu.ph', 0, '', 'Kevin Roy Marero', '', '', '', 500, 500, 0, 0),
(128, 'Indirect Referral', 'Kevin Roy Marero', 0, '', 'Kevin Roy Marero', '', '', '', 10, 10, 0, 0),
(129, 'Indirect Referral', 'Kevin Roy Marero', 0, '', 'Kevin Roy Marero', '', '', '', 10, 20, 0, 0),
(130, 'Indirect Referral', 'Kevin Roy Marero', 0, '', 'Kevin Roy Marero', '', '', '', 10, 30, 0, 0),
(131, 'Indirect Referral', 'Kevin Roy Marero', 0, '', 'Kevin Roy Marero', '', '', '', 10, 40, 0, 0),
(132, 'Indirect Referral', 'Kevin Roy Marero', 0, '', 'Kevin Roy Marero', '', '', '', 10, 50, 0, 0),
(133, 'Indirect Referral', 'Kevin Roy Marero', 0, '', 'Kevin Roy Marero', '', '', '', 10, 60, 0, 0),
(134, 'Indirect Referral', 'Kevin Roy Marero', 0, '', 'Kevin Roy Marero', '', '', '', 10, 70, 0, 0),
(135, 'Indirect Referral', 'Kevin Roy Marero', 0, '', 'Kevin Roy Marero', '', '', '', 10, 80, 0, 0),
(136, 'Indirect Referral', 'Kevin Roy Marero', 0, '', 'Kevin Roy Marero', '', '', '', 10, 90, 0, 0),
(137, 'Indirect Referral', 'Kevin Roy Marero', 0, '', 'Kevin Roy Marero', '', '', '', 10, 100, 0, 0);

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
-- Indexes for table `referral_codes`
--
ALTER TABLE `referral_codes`
  ADD PRIMARY KEY (`generation_batch`);

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
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `generated_code`
--
ALTER TABLE `generated_code`
  MODIFY `code_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invites`
--
ALTER TABLE `invites`
  MODIFY `invitesID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `rebates_points`
--
ALTER TABLE `rebates_points`
  MODIFY `rebates_points_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `totalbalance`
--
ALTER TABLE `totalbalance`
  MODIFY `totalBalanceId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transactionId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

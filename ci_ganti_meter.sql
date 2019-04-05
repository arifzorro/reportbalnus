-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 16, 2018 at 01:08 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_ganti_meter`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_soal`
--

DROP TABLE IF EXISTS `bank_soal`;
CREATE TABLE IF NOT EXISTS `bank_soal` (
  `id_soal` int(10) NOT NULL AUTO_INCREMENT,
  `soal` text,
  `a` text,
  `b` text,
  `c` text,
  `d` text,
  `e` text,
  `tanggal` date NOT NULL,
  `Jenis` varchar(20) NOT NULL,
  PRIMARY KEY (`id_soal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

DROP TABLE IF EXISTS `data`;
CREATE TABLE IF NOT EXISTS `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `tgl_ganti` date NOT NULL,
  `pelanggan_id` varchar(30) NOT NULL,
  `pelanggan_telepon` varchar(25) NOT NULL,
  `sn_meter_baru` varchar(100) NOT NULL,
  `merk_meter_lama` varchar(150) NOT NULL,
  `seri_meter_lama` varchar(50) NOT NULL,
  `tahun_meter_lama` varchar(6) NOT NULL,
  `stan_bongkar` varchar(30) NOT NULL,
  `no_segel` varchar(30) NOT NULL,
  `pelaksana` varchar(150) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `insert_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `vendor_id`, `tgl_ganti`, `pelanggan_id`, `pelanggan_telepon`, `sn_meter_baru`, `merk_meter_lama`, `seri_meter_lama`, `tahun_meter_lama`, `stan_bongkar`, `no_segel`, `pelaksana`, `created_at`, `updated_at`, `insert_by`) VALUES
(1, 0, '2018-11-14', '', '', 'sssssssssssssssssss', '', 'ssssssssssssssss', 'ssssss', 'ssssssssssss', 'sssssssssss', 'Admin Demo', '2018-11-14 02:19:00', NULL, 1),
(2, 0, '2018-11-14', '', '', 'aaaaaaaaaaaaaaaaaaa', '', 'aaaaaaaaaaaaaaaaaaa', 'aaaaaa', 'aaaaaaaaaa', 'aaaaaaaaaaaaaaaa', 'Admin Demo', '2018-11-14 03:19:48', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(16) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role_type`
--

DROP TABLE IF EXISTS `role_type`;
CREATE TABLE IF NOT EXISTS `role_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(45) NOT NULL,
  `description` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_type`
--

INSERT INTO `role_type` (`id`, `role_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '2018-03-30 00:00:00', '2018-03-30 00:00:00'),
(2, 'user', 'user', '2018-03-30 00:00:00', '2018-03-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `ip_address` varchar(16) DEFAULT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `insert_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `fk_user_role_type1_idx` (`role`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `email`, `role`, `created_at`, `updated_at`, `status`, `ip_address`, `salt`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `last_login`, `active`, `insert_by`) VALUES
(1, 'admin', '$2y$08$g.OKSMOeb6hbF8qEAPjHPupL2x65sBngv2rbk1bGtnNsFiz0G3.86', 'Admin Demo', NULL, 1, '2018-03-30 09:22:00', '0000-00-00 00:00:00', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1542177789, 1, NULL),
(3, 'user', 'tes', 'User Demo', NULL, 2, '2018-03-30 09:40:48', '2018-03-31 08:11:22', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1522769079, 1, 1),
(4, 'zorro', 'zorro', 'zorro', 'zorro@gmail.com', 2, '2018-05-23 00:00:00', '2018-05-23 00:00:00', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

DROP TABLE IF EXISTS `vendor`;
CREATE TABLE IF NOT EXISTS `vendor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `nama`) VALUES
(1, 'PT. Yuni Karya Nusa');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

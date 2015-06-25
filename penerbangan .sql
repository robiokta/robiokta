-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2015 at 08:21 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `penerbangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bandara1`
--

CREATE TABLE IF NOT EXISTS `bandara1` (
  `idbandara` char(9) NOT NULL,
  `kotabandara` varchar(20) NOT NULL,
  `namabandara` varchar(60) NOT NULL,
  PRIMARY KEY (`idbandara`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bandara1`
--

INSERT INTO `bandara1` (`idbandara`, `kotabandara`, `namabandara`) VALUES
('DPS', 'Bali', 'Ngurahrai International Air Port'),
('JKT', 'Jakarta', 'Soekarno Hatta International Air Port'),
('SBY', 'Surabaya', 'Juanda International Air Port'),
('UPG', 'Makasar', 'Sultan Hasanuddin International Air Port');

-- --------------------------------------------------------

--
-- Table structure for table `bandara2`
--

CREATE TABLE IF NOT EXISTS `bandara2` (
  `idbandara` char(9) NOT NULL,
  `namabandara` varchar(60) NOT NULL,
  `kotabandara` varchar(20) NOT NULL,
  PRIMARY KEY (`idbandara`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bandara2`
--

INSERT INTO `bandara2` (`idbandara`, `namabandara`, `kotabandara`) VALUES
('DPS', 'Ngurahrai International Air Port', 'Bali'),
('JKT', 'Soekarno Hatta International Air Port', 'Jakarta'),
('SBY', 'Juanda International Air Port', 'Surabaya'),
('UPG', 'Sultan Hasanuddin International Air Port', 'Makasar');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `namacustomer` varchar(30) NOT NULL,
  `tittle` varchar(35) NOT NULL,
  `nomertlp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`namacustomer`, `tittle`, `nomertlp`, `email`) VALUES
('Robi Andri Oktafianto', '', '087857711629', 'robi.andri13@yahoo.co.id'),
('Robi Andri Okatafianto', 'Tuan', '', ''),
('Oktavia Jemis', 'Nyonya', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `jadwalpenerbangan`
--

CREATE TABLE IF NOT EXISTS `jadwalpenerbangan` (
  `idpesawat` char(9) NOT NULL,
  `nomerpenerbangan` char(9) DEFAULT NULL,
  `keberangkatan` varchar(20) NOT NULL,
  `tujuan` varchar(20) NOT NULL,
  `waktu` varchar(15) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwalpenerbangan`
--

INSERT INTO `jadwalpenerbangan` (`idpesawat`, `nomerpenerbangan`, `keberangkatan`, `tujuan`, `waktu`, `harga`) VALUES
('psw-001', 'SBY-VZ001', 'SBY', 'UPG', '07:00 WIB', 770000),
('psw-001', 'SBY-XA01', 'SBY', 'UPG', '07:10 WIB', 790000),
('psw-010', 'DPS-PS001', 'DPS', 'JKT', '10:30 WITA', 800000),
('psw-004', 'DPS-SW078', 'DPS', 'JKT', '16:35 WITA', 850000),
('psw-005', 'DPS-TR001', 'DPS', 'JKT', '09:55 WITA', 810000),
('psw-006', 'DPS-PG093', 'DPS', 'JKT', '06:00 WITA', 650000),
('pws-007', 'DPS-PM101', 'DPS', 'JKT', '17:00 WITA', 1000000),
('psw-002', 'DPS-PM105', 'DPS', 'JKT', '18:35 WITA', 1200000),
('psw-002', 'DPS-PY306', 'DPS', 'JKT', '15:00 WITA', 850000),
('psw-005', 'DPS-RT870', 'DPS', 'JKT', '22:25 WITA', 1400000),
('psw-003', 'DPS-PG111', 'DPS', 'JKT', '08:00 WITA', 670000),
('psw-005', 'DPS-PG127', 'DPS', 'JKT', '15:30 WITA', 800000),
('psw-001', 'JKT-JT987', 'JKT', 'DPS', '07:00 WIB', 700000),
('psw-006', 'JKT-JT098', 'JKT', 'DPS', '15:45 WIB', 750000),
('psw-003', 'JKT-PM009', 'JKT', 'DPS', '20:00 WIB', 800000),
('psw-007', 'UPG-PG087', 'UPG', 'JKT', '07:00 WIT', 600000),
('psw-001', 'UPG-PG145', 'UPG', 'JKT', '07:00 WIT', 700000),
('psw-002', 'UPG-PG045', 'UPG', 'JKT', '12:45 WIT', 750000),
('psw-005', 'SBY-GP002', 'SBY', 'JKT', '09:35 WIB', 650000),
('psw-007', 'SBY-GP111', 'SBY', 'JKT', '12:45 WIB', 700000),
('psw-004', 'SBY-GP003', 'SBY', 'JKT', '15:00 WIB', 750000),
('psw-001', 'JKT-SP812', 'JKT', 'SBY', '07:15 WIB', 600000),
('psw-002', 'JKT-SP987', 'JKT', 'SBY', '09:00 WIB', 650000),
('psw-003', 'JKT-SP312', 'JKT', 'SBY', '12:00 WIB', 700000),
('psw-004', 'JKT-SP001', 'JKT', 'SBY', '15:00 WIB', 750000),
('psw-005', 'JKT-PT987', 'JKT', 'UPG', '09:55 WIB', 650000),
('psw-006', 'JKT-PT765', 'JKT', 'UPG', '12:00 WIB', 700000),
('psw-007', 'JKT-PT543', 'JKT', 'UPG', '13:00 WIB', 700000),
('psw-008', 'JKT-PT135', 'JKT', 'UPG', '20:00 WIB', 800000),
('psw-001', 'JKT-PI007', 'JKT', 'UPG', '07:00 WIB', 600000),
('psw-002', 'JKT-PI008', 'JKT', 'UPG', '12:00 WIB', 700000),
('psw-007', 'JKT-PI27', 'JKT', 'UPG', '20:30 WIB', 750000),
('psw-008', 'JKT-PE876', 'JKT', 'UPG', '22:00 WIB', 850000),
('psw-005', 'UPG-JP098', 'UPG', 'JKT', '09:55 WIT', 650000),
('psw-006', 'UPG-JP245', 'UPG', 'JKT', '11:00 WIT', 750000),
('psw-008', 'SBY-DP087', 'SBY', 'DPS', '09:00 WIB', 750000),
('psw-007', 'SBY-DP521', 'SBY', 'DPS', '15:00 WIB', 800000),
('psw-003', 'SBY-DP112', 'SBY', 'DPS', '20:00 WIB', 800000),
('psw-004', 'SBY-DP121', 'SBY', 'DPS', '22:00 WIB', 850000),
('psw-001', 'DPS-SG076', 'DPS', 'SBY', '07:00 WITA', 750000),
('psw-008', 'DPS-SG', 'DPS', 'SBY', '15:00 WITA', 780000),
('psw-001', 'UPG-SG674', 'UPG', 'SBY', '07:00 WIT', 600000),
('psw-002', 'UPG-SG967', 'UPG', 'SBY', '08:00 WIT', 650000),
('psw-003', 'UPG-SG123', 'UPG', 'SBY', '09:00 WIT', 650000),
('psw-004', 'UPG-SG009', 'UPG', 'SBY', '12:10 WIT', 680000),
('psw-007', 'UPG-SG890', 'UPG', 'SBY', '15:00 WIT', 700000),
('psw-008', 'UPG-SG767', 'UPG', 'SBY', '20:00 WIT', 850000),
('psw-001', 'UPG-AX01', 'UPG', 'SBY', '07:00 WIT', 700000),
('psw-003', 'UPG-XX02', 'UPG', 'JKT', '08.00 WIT', 900000),
('psw-004', 'UPG-XX01', 'UPG', 'DPS', '21.10 WIT', 800000),
('psw-006', 'UPG-AX012', 'UPG', 'JKT', '08.50 WIT', 900000),
('psw-006', 'SBY-XOP1', 'SBY', 'UPG', '21.00 WIB', 560000),
('psw-001', 'UPG-DC002', 'UPG', 'DPS', '22.00 WIT', 560000);

-- --------------------------------------------------------

--
-- Table structure for table `pesawat`
--

CREATE TABLE IF NOT EXISTS `pesawat` (
  `idpesawat` char(9) NOT NULL,
  `namapesawat` varchar(20) NOT NULL,
  `jenispeswat` varchar(20) NOT NULL,
  `logo` varchar(50) NOT NULL,
  PRIMARY KEY (`idpesawat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesawat`
--

INSERT INTO `pesawat` (`idpesawat`, `namapesawat`, `jenispeswat`, `logo`) VALUES
('psw-001', 'Lion Air', 'Air Bus 001', 'lion air.png'),
('psw-002', 'Sriwijaya Air', 'Air Bus 003', 'sriwijaya.png'),
('psw-003', 'Citi Link', 'Air Bus 001', 'citilink.jpg'),
('psw-004', 'Lion Air', 'AIRBUS A-310 ', 'lion air.png'),
('psw-005', 'Merpati Nusantara Ai', 'DC 8 61', 'merpati-logo-landscape.jpg'),
('psw-006', 'Batavia Air ', 'Airbus A300_600ST  B', 'batvaia air.jpg'),
('psw-007', 'Sabang Merauke Raya ', 'Air bus 019', 'sabang merauke.png'),
('psw-010', 'Air Asia', 'AIRBUS A380', 'air asia.png');

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE IF NOT EXISTS `registrasi` (
  `email` varchar(50) NOT NULL,
  `notran` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`email`, `notran`) VALUES
('robi.andri13@yahoo.co.id', '1555029375451'),
('toyok.sibolo@yahoo.com', '187502977541');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `alamat`, `username`, `password`, `level`) VALUES
(8, 'robi', 'Banyuwangi', 'robi.okta13', '254573f31b1c8b95d509128f61ede633', 'Admin'),
(9, 'kgkg', 'khbkhj', 'kikik', '202cb962ac59075b964b07152d234b70', 'User'),
(10, 'Apriyono', 'Asembagus', 'toyyib.123', '827ccb0eea8a706c4c34a16891f84e7b', 'User'),
(11, 'Taufan', 'Bondowoso', 'taufan1234', '81dc9bdb52d04dc20036dbd8313ed055', 'User');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

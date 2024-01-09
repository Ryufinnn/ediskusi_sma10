-- phpMyAdmin SQL Dump
-- version 3.1.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2015 at 11:13 AM
-- Server version: 5.1.35
-- PHP Version: 5.2.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_sma10`
--

-- --------------------------------------------------------

--
-- Table structure for table `acount`
--

CREATE TABLE IF NOT EXISTS `acount` (
  `id_acount` int(10) NOT NULL AUTO_INCREMENT,
  `nm_depan` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `nm_belakang` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jk` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('1','0') COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_acount`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `acount`
--

INSERT INTO `acount` (`id_acount`, `nm_depan`, `nm_belakang`, `email`, `password`, `jk`, `tgl_lahir`, `foto`, `aktif`, `level`) VALUES
(19, 'aaa', 'aaaa', 'aa@yahoo.com', '123', 'Laki-Laki', '1991-03-17', '', '1', 'siswa'),
(2, 'Ani', 'Budi', 'ani@yahoo.com', 'ani', 'Laki-Laki', '2014-04-30', '7ue1xfk1.jpg', '0', 'guru'),
(17, 'Dearly', 'Sawitri', 'Dea@gmail.com', '123', 'Perempuan', '1994-10-16', '283555_541965912484071_1156241201_n.jpg', '0', ''),
(15, 'okta', 'okta', 'okta@yahoo.com', '123', 'Laki-Laki', '1993-05-03', 'grrr.jpg', '1', ''),
(16, 'della', 'putri ananda', 'della@gmail.com', '123', 'Perempuan', '1994-12-11', 'della.jpg', '0', ''),
(20, 'tia', 'susanti', 'tia@yahoo.com', '123', 'Perempuan', '1992-10-18', '', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama_lengkap`, `email`, `no_telp`, `id_session`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'Adminweb@yahoo.com', '082170392980', '65cubvc9ip7nih216dcftlgib6');

-- --------------------------------------------------------

--
-- Table structure for table `balas_status`
--

CREATE TABLE IF NOT EXISTS `balas_status` (
  `id_balas` int(10) NOT NULL AUTO_INCREMENT,
  `id_status` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `id_acount` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `balas` text COLLATE latin1_general_ci NOT NULL,
  `waktu` time NOT NULL,
  PRIMARY KEY (`id_balas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `balas_status`
--

INSERT INTO `balas_status` (`id_balas`, `id_status`, `id_acount`, `balas`, `waktu`) VALUES
(1, '8', '2', 'mungkin itu kelebihannya cuy.... \r\nwalaupun sedikit bawel tapi nganenin orang nya..\r\nhehe\r\n:)', '05:17:00'),
(2, '8', '10', 'iya, senyumnya mampu menentram kan hati .....\r\n:D', '05:18:00'),
(3, '8', '10', 'trytryrty', '00:46:00'),
(4, '8', '10', 'gfgfhfghghfghfgh', '00:46:00'),
(5, '8', '10', 'dfdfgdfgdfg\r\n', '10:49:00'),
(6, '8', '10', 'fghfhfg', '13:08:00'),
(7, '11', '10', 'thrrhrth\r\n', '13:50:00'),
(8, '11', '10', 'rthrthrthrth', '13:50:00'),
(9, '12', '10', 'fghfghfhfgh', '13:54:00'),
(10, '14', '10', 'thytryrtyrty', '20:56:00'),
(11, '14', '10', 'rturtutru', '20:56:00'),
(12, '17', '15', 'hoi', '09:45:00'),
(13, '17', '15', 'waalaikumsallam wr.wb\r\n', '09:46:00'),
(14, '20', '15', 'jd\r\n', '16:40:00'),
(15, '22', '17', 'halo', '14:46:00'),
(16, '23', '15', 'baik', '18:31:00'),
(17, '23', '15', 'ada tugas ga?', '18:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_chat` int(10) NOT NULL,
  `id_acount` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `id_to` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `chat` text COLLATE latin1_general_ci NOT NULL,
  `time` time NOT NULL,
  `dibaca` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `id_chat`, `id_acount`, `id_to`, `chat`, `time`, `dibaca`) VALUES
(24, 15, '2', '15', 'tes\r\n', '11:52:00', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE IF NOT EXISTS `download` (
  `id_download` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nama_file` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `format_file` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `hits` int(3) NOT NULL,
  PRIMARY KEY (`id_download`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id_download`, `judul`, `nama_file`, `format_file`, `tgl_posting`, `hits`) VALUES
(1, 'b inggris', 'Prepositions.ppt', 'PPT', '2014-05-01', 5),
(2, 'IPA', 'BBM_4_(Usaha_dan_Energi)_KD_Fisika.pdf', 'PDF', '2014-05-01', 0),
(4, 'Agama', 'ilmu-tajwid.pdf', 'PDF', '2014-05-01', 2),
(5, 'Matematika', 'sistem-persamaan-linear-dua-variabel-belajar-matematika.pdf', 'PDF', '2014-05-01', 6),
(6, 'PKN', 'media-pembelajaran-ppkn.pptx', 'PPT', '2014-05-01', 2),
(7, 'Prakarya', 'bab-i.doc', 'DOC', '2014-05-01', 5),
(8, 'bahan', 'KAP.docx', 'DOC', '2015-03-22', 5),
(9, 'tugas', 'audit.docx', 'DOC', '2015-03-22', 1),
(10, 'geografi', 'geografi.doc', 'DOC', '2015-04-09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `nama` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(25) NOT NULL,
  `coment` varchar(250) NOT NULL,
  PRIMARY KEY (`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`nama`, `email`, `telp`, `coment`) VALUES
('Dion', 'dion@gmail.com', 'Ujian', 'ada yang tau gak tanggal berapa ujian??'),
('Fian', 'fian@gmail.com', 'Tugas', 'duh fian juga gak tau'),
('joni', 'joni@gmail.com', 'Latihan', 'Latihan nmr 10 ada yang tau?'),
('Nia', 'nia@gmail.com', 'Tugas', 'Teman Ada yang tau gak tugas kemaren??');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(10) NOT NULL AUTO_INCREMENT,
  `id_acount` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `status` text COLLATE latin1_general_ci NOT NULL,
  `waktu` time NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `id_acount`, `status`, `waktu`) VALUES
(14, '10', 'trytryrty', '19:55:00'),
(17, '1', 'assalammu''alaikumwr. wb. ^_^', '14:08:00'),
(16, '13', 'gebby boco', '12:41:00'),
(18, '1', 'Apa Yang Anda Pikirkan ...?', '18:05:00'),
(19, '1', '\r\n', '18:06:00'),
(20, '15', 'haloha\r\n', '09:46:00'),
(21, '15', 'Apa Yang Anda Pikirkan ...?', '16:41:00'),
(22, '16', 'hey ', '20:43:00');

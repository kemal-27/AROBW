-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2019 at 03:20 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raport`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `address`, `username`, `password`, `email`) VALUES
(1, 'Benaldy Yuga A', 'Jurang belimbing', 'benkyun1234', 'Lalala123', 'benaldy@gmail.com'),
(2, 'Faisal Bayu', 'Tembalang Selatan', 'void321', 'void321', 'inhellcorruption@yahoo.com'),
(3, 'Sichuan', 'bnjarsari', 'sichuanmcl', 'sichuanmcl', 'sichuanmcl@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kd_kelas` varchar(10) NOT NULL,
  `nama_walikelas` varchar(50) NOT NULL,
  `kapasitas_kelas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kd_kelas`, `nama_walikelas`, `kapasitas_kelas`) VALUES
('7A', 'Suhartono', 25),
('7B', 'Satriyo Adhi', 25),
('8A', 'Nurdin Bachtiar', 25),
('8B', 'Beta Nooranita', 25),
('9A', 'Rismiyati', 25),
('9B', 'Khadijah', 25);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `kd_mapel` int(10) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `kkm` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kd_mapel`, `nama_mapel`, `kkm`) VALUES
(1, 'Pendidikan Agama Islam', 76),
(2, 'Pendidikan Pancasila dan Kewarganegaraan', 76),
(3, 'Bahasa Indonesia', 76),
(4, 'Matematika', 76),
(5, 'Ilmu Pengetahuan Alam', 76),
(6, 'Ilmu Pengetahuan Sosial', 76),
(7, 'Bahasa Inggris', 76),
(8, 'Seni Budaya', 76),
(9, 'Pendidikan Jasmani, Olah Raga dan Kesehatan', 76),
(10, 'Prakarya', 76);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `kd_nilai` int(11) NOT NULL,
  `nisn` int(30) NOT NULL,
  `kd_mapel` int(10) NOT NULL,
  `tahun_ajaran` varchar(13) NOT NULL,
  `semester` int(10) NOT NULL,
  `nilai` int(20) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`kd_nilai`, `nisn`, `kd_mapel`, `tahun_ajaran`, `semester`, `nilai`, `keterangan`) VALUES
(1, 1000200422, 1, '2017 / 2018', 1, 90, 'Lulus'),
(2, 1000200422, 2, '2017 / 2018', 1, 95, 'Lulus'),
(3, 1000200422, 3, '2017 / 2018', 1, 90, 'Lulus'),
(4, 1000200422, 4, '2017 / 2018', 1, 90, 'Lulus'),
(5, 1000200422, 5, '2017 / 2018', 1, 75, 'Tidak Lulus'),
(6, 1000200422, 6, '2017 / 2018', 1, 100, 'Lulus'),
(7, 1000200422, 7, '2017 / 2018', 1, 90, 'Lulus'),
(8, 1000200422, 8, '2017 / 2018', 1, 99, 'Lulus'),
(9, 1000200422, 9, '2017 / 2018', 1, 98, 'Lulus'),
(10, 1000200422, 10, '2017 / 2018', 1, 99, 'Lulus'),
(11, 1000200422, 1, '2017 / 2018', 2, 88, 'Lulus'),
(12, 1000200422, 2, '2017 / 2018', 2, 75, 'Tidak Lulus'),
(13, 1000200422, 3, '2017 / 2018', 2, 76, 'Lulus'),
(14, 1000200422, 4, '2017 / 2018', 2, 89, 'Lulus'),
(15, 1000200422, 5, '2017 / 2018', 2, 90, 'Lulus'),
(16, 1000200422, 6, '2017 / 2018', 2, 95, 'Lulus'),
(17, 1000200422, 7, '2017 / 2018', 2, 78, 'Lulus'),
(18, 1000200422, 8, '2017 / 2018', 2, 87, 'Lulus'),
(19, 1000200422, 9, '2017 / 2018', 2, 79, 'Lulus'),
(20, 1000200422, 10, '2017 / 2018', 2, 80, 'Lulus'),
(21, 1000200422, 1, '2016 / 2017', 1, 90, 'Lulus'),
(22, 1000200422, 2, '2016 / 2017', 1, 98, 'Lulus'),
(23, 1000200422, 3, '2016 / 2017', 1, 87, 'Lulus'),
(24, 1000200422, 4, '2016 / 2017', 1, 88, 'Lulus'),
(25, 1000200422, 5, '2016 / 2017', 1, 79, 'Lulus'),
(26, 1000200422, 6, '2016 / 2017', 1, 80, 'Lulus'),
(27, 1000200422, 7, '2016 / 2017', 1, 94, 'Lulus'),
(28, 1000200422, 8, '2016 / 2017', 1, 82, 'Lulus'),
(29, 1000200422, 9, '2016 / 2017', 1, 86, 'Lulus'),
(30, 1000200422, 10, '2016 / 2017', 1, 78, 'Lulus'),
(31, 1000200422, 1, '2016 / 2017', 2, 89, 'Lulus'),
(32, 1000200422, 2, '2016 / 2017', 2, 90, 'Lulus'),
(33, 1000200422, 3, '2016 / 2017', 2, 87, 'Lulus'),
(34, 1000200422, 4, '2016 / 2017', 2, 78, 'Lulus'),
(35, 1000200422, 5, '2016 / 2017', 2, 79, 'Lulus'),
(36, 1000200422, 6, '2016 / 2017', 2, 90, 'Lulus'),
(37, 1000200422, 7, '2016 / 2017', 2, 92, 'Lulus'),
(38, 1000200422, 8, '2016 / 2017', 2, 79, 'Lulus'),
(39, 1000200422, 9, '2016 / 2017', 2, 94, 'Lulus'),
(40, 1000200422, 10, '2016 / 2017', 2, 100, 'Lulus'),
(41, 1000200422, 1, '2015 / 2016', 1, 90, 'Lulus'),
(42, 1000200422, 2, '2015 / 2016', 1, 80, 'Lulus'),
(43, 1000200422, 3, '2015 / 2016', 1, 88, 'Lulus'),
(44, 1000200422, 4, '2015 / 2016', 1, 89, 'Lulus'),
(45, 1000200422, 5, '2015 / 2016', 1, 90, 'Lulus'),
(46, 1000200422, 6, '2015 / 2016', 1, 90, 'Lulus'),
(47, 1000200422, 7, '2015 / 2016', 1, 75, 'Tidak Lulus'),
(48, 1000200422, 8, '2015 / 2016', 1, 90, 'Lulus'),
(49, 1000200422, 9, '2015 / 2016', 1, 100, 'Lulus'),
(50, 1000200422, 10, '2015 / 2016', 1, 90, 'Lulus'),
(51, 1000200422, 1, '2015 / 2016', 2, 80, 'Lulus'),
(52, 1000200422, 2, '2015 / 2016', 2, 80, 'Lulus'),
(53, 1000200422, 3, '2015 / 2016', 2, 85, 'Lulus'),
(54, 1000200422, 4, '2015 / 2016', 2, 87, 'Lulus'),
(55, 1000200422, 5, '2015 / 2016', 2, 89, 'Lulus'),
(56, 1000200422, 6, '2015 / 2016', 2, 90, 'Lulus'),
(57, 1000200422, 7, '2015 / 2016', 2, 98, 'Lulus'),
(58, 1000200422, 8, '2015 / 2016', 2, 98, 'Lulus'),
(59, 1000200422, 9, '2015 / 2016', 2, 96, 'Lulus'),
(60, 1000200422, 10, '2015 / 2016', 2, 78, 'Lulus'),
(61, 1000200619, 1, '2019 / 2020', 1, 80, 'Lulus'),
(62, 1000200619, 2, '2019 / 2020', 1, 80, 'Lulus'),
(63, 1000200619, 3, '2019 / 2020', 1, 50, 'Tidak Lulus'),
(64, 1000200619, 4, '2019 / 2020', 1, 86, 'Lulus'),
(65, 1000200619, 5, '2019 / 2020', 1, 87, 'Lulus'),
(66, 1000200619, 6, '2019 / 2020', 1, 80, 'Lulus'),
(67, 1000200619, 7, '2019 / 2020', 1, 84, 'Lulus'),
(68, 1000200619, 8, '2019 / 2020', 1, 80, 'Lulus'),
(69, 1000200619, 9, '2019 / 2020', 1, 85, 'Lulus'),
(70, 1000200619, 10, '2019 / 2020', 1, 80, 'Lulus');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `idprofile` int(10) NOT NULL,
  `id_admin` int(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `postalcode` int(10) NOT NULL,
  `about` varchar(200) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`idprofile`, `id_admin`, `address`, `city`, `country`, `postalcode`, `about`, `gambar`) VALUES
(1, 1, 'Jurang Belimbing', 'Semarang', 'Indonesia', 50987, 'Stasiun Balapan Sik Dadi Kenangan', 'benkyun1234.jpg'),
(2, 2, 'Tembalang', 'Semarang', 'Indonesia', 53181, 'Hehehe', 'void321.jpg'),
(3, 3, 'bnjarsari', 'Tembalang', 'Indonesia', 50275, 'hahaha', 'sichuanmcl.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` int(30) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `anak_ke` int(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(100) NOT NULL,
  `pekerjaan_ibu` varchar(100) NOT NULL,
  `no_telp` int(50) NOT NULL,
  `tgl_diterima` date NOT NULL,
  `sekolah_asal` varchar(100) NOT NULL,
  `kd_kelas` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama_siswa`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `agama`, `anak_ke`, `status`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `no_telp`, `tgl_diterima`, `sekolah_asal`, `kd_kelas`, `username`, `password`, `gambar`) VALUES
(1000200419, 'Justin Timberlake', '2004-12-19', 'Laki-laki', 'Widya Puraya', 'Islam', 2, 'Anak Kandung', 'David Beckham', 'Syahrini', 'Pesepakbola', 'Penyanyi', 89765123, '2017-08-17', 'SDN Jupiter', '9B', '1000200419', '20041219', '1000200419.jpg'),
(1000200422, 'Benaldy Yuga Adhaityar', '2004-12-22', 'Laki-laki', 'Jurbel', 'Islam', 1, 'Anak Kandung', 'Azmal', 'Unni ', 'Presiden', 'Wakil Presiden', 89765432, '2017-01-01', 'SDN Bulan', '9A', '1000200422', 'Lalala123', '1000199922.jpg'),
(1000200523, 'Selena Gemezz', '2005-11-23', 'Perempuan', 'Gang Hidayah, Tembalang', 'Islam', 1, 'Anak Kandung', 'Justin Bleber', 'Herley Bleber', 'Swasta', 'PNS', 811288659, '2018-01-01', 'SDN Bintang ', '8B', '1000200523', '20051123', '1000200523.jpg'),
(1000200525, 'Betari Harambol', '2005-10-25', 'Perempuan', 'Griya Lily', 'Islam', 1, 'Anak Kandung', 'Anas', 'Khoirunisa', 'Video Editor', 'Pengurus HMIF', 12346789, '2017-01-01', 'SDN Mars', '8A', '1000200525', 'Lalala111', '1000200524.jpg'),
(1000200609, 'Brewok Jenggot', '2006-08-09', 'Laki-laki', 'Burjo Alby', 'Islam', 3, 'Anak Kandung', 'Benaldy ', 'Kymuttzzzzz', 'Menteri Kominfo', 'Wakil Menteri Kominfo', 2147483647, '2019-08-17', 'SDN Matahari', '7B', '1000200609', '20060809', '1000199926.jpg'),
(1000200619, 'Sobirinz Rinsoo', '2006-08-19', 'Laki-laki', 'Masjid Kampus Undip', 'Islam', 2, 'Anak Kandung', 'Sonni Pakpahan', 'Fatma Harambol', 'Presiden', 'Wakil Presiden', 2147483647, '2019-08-17', 'SDN Bumi', '7A', '1000200619', '20060819', '1000199925.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kd_kelas`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`kd_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kd_nilai`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`idprofile`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD UNIQUE KEY `nisn` (`nisn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `kd_mapel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `kd_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `idprofile` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

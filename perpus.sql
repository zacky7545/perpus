-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2024 at 03:51 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(10) NOT NULL,
  `nama_buku` varchar(25) NOT NULL,
  `penerbit` varchar(25) NOT NULL,
  `tahun_terbit` int(25) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `isbn` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `nama_buku`, `penerbit`, `tahun_terbit`, `jumlah`, `isbn`) VALUES
(3, 'BAHASA INDONESIA', 'AIRLANGGA', 2020, 9, 'IHDFJK'),
(5, 'fisika', 'airlangga', 2024, 11, 'LGDSBUI');

-- --------------------------------------------------------

--
-- Table structure for table `login_perpus`
--

CREATE TABLE `login_perpus` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_perpus`
--

INSERT INTO `login_perpus` (`id_user`, `username`, `password`) VALUES
(1, 'admin', 'p'),
(10, 'padil', 'ppppp'),
(11, 'juan', 'paris');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_buku`
--

CREATE TABLE `peminjaman_buku` (
  `id_peminjam` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `anggota_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman_buku`
--

INSERT INTO `peminjaman_buku` (`id_peminjam`, `tanggal_pinjam`, `tanggal_kembali`, `anggota_id`) VALUES
(1, '2024-05-16', '2024-05-19', 3858432);

-- --------------------------------------------------------

--
-- Table structure for table `penerbit_buku`
--

CREATE TABLE `penerbit_buku` (
  `id_penerbit` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` tinytext NOT NULL,
  `telp` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerbit_buku`
--

INSERT INTO `penerbit_buku` (`id_penerbit`, `nama`, `alamat`, `telp`) VALUES
(1, 'airlangga', 'balikpapan', 852365532),
(2, 'ijat', 'balikpapan', 430965463),
(8, 'rusdi', 'balikpapan', 6943209),
(17, 'pace', 'huuhuhuhf', 91234533),
(18, 'rahmat', 'malaysia', 54329843),
(22, 'jaki', 'balikpapan', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `pengarang`
--

CREATE TABLE `pengarang` (
  `id_pengarang` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` tinytext NOT NULL,
  `telp` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengarang`
--

INSERT INTO `pengarang` (`id_pengarang`, `nama`, `alamat`, `telp`) VALUES
(5, 'udin', 'jogja', 3425783),
(7, 'amat', 'bogor', 6943209),
(8, 'wani', 'padang', 6943209),
(10, 'putra', 'surabaya', 6943209),
(11, 'bibi', 'lombok', 6943209),
(14, 'rizky', 'bandung', 534743),
(15, 'jeje', 'samarinda', 81232325),
(16, 'rahmat', 'malysia', 43546734);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `login_perpus`
--
ALTER TABLE `login_perpus`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  ADD PRIMARY KEY (`id_peminjam`);

--
-- Indexes for table `penerbit_buku`
--
ALTER TABLE `penerbit_buku`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `pengarang`
--
ALTER TABLE `pengarang`
  ADD PRIMARY KEY (`id_pengarang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35873209;

--
-- AUTO_INCREMENT for table `login_perpus`
--
ALTER TABLE `login_perpus`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penerbit_buku`
--
ALTER TABLE `penerbit_buku`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pengarang`
--
ALTER TABLE `pengarang`
  MODIFY `id_pengarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

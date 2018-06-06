-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2018 at 11:55 AM
-- Server version: 10.1.31-MariaDB
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
-- Database: `samanda`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `jenis`, `status`) VALUES
(5, 'One Piece', 'Komik', 1),
(6, 'Naruto', 'Komik', 1),
(8, 'PHP Dasar', 'Pelajaran', 1),
(9, 'Bawang Merah Bawang Putih', 'Novel', 1),
(10, 'Bleach', 'Novel', 1),
(11, 'Satra Jawa', 'Sejarah', 1),
(12, 'Panduan Memasak Nasi Goreng', 'Kuliner', 1),
(13, 'Desain Grafis', 'Komputer', 1),
(14, 'Resep Masakan Nusantara', 'Makanan', 1),
(16, 'Sejarah Islam ', 'Religi', 1),
(18, 'Bahas Indonesia Terpadu', 'Pelajaran', 1),
(19, 'Haikyuu!!!', 'Komik', 1),
(20, 'Ayat Ayat Cinta', 'film', 1),
(21, 'Bahasa Jawa', 'Sastra', 1);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `nama_peminjam` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `nama_peminjam`, `tanggal`, `id_buku`, `id_user`) VALUES
(6, 'Bima Wijaya', '2018-05-29', 6, 13),
(7, 'Bima Wijaya', '2018-05-29', 14, 13),
(8, 'Akbar Yahya', '2018-05-29', 13, 12),
(9, 'Abi Wijaya', '2018-05-29', 19, 14),
(10, 'Rifa Afifah', '2018-05-29', 16, 11),
(11, 'Kinara', '2018-06-04', 20, 15),
(12, 'Rifa Afifah', '2018-06-04', 14, 11);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `level`) VALUES
(1, 'fatta', '2be3bfc5778e7cb0612e9ba4c46f1380', 'Fatta Wijaya', 1),
(11, 'rifa', '4797a79a801d05ef1bc5345edaa69cd6', 'Rifa Afifah', 2),
(12, 'akbar', '4f033a0a2bf2fe0b68800a3079545cd1', 'Akbar Yahya', 2),
(13, 'bima', '7fcba392d4dcca33791a44cd892b2112', 'Bimadhanu Wijaya', 2),
(14, 'abi', '19a9228dbbbe3b613190002e54dc3429', 'Abimanyu Wijaya', 2),
(15, 'nara', 'bb8b20c99f94d079cbd72677168255b7', 'Kinara Wijaya', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

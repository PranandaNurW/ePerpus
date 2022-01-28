-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2021 at 08:55 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_eperpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `jumlah_buku` int(3) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tgl_input` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `jumlah_buku`, `gambar`, `tgl_input`) VALUES
(1, '5 CM', 'Donny Dhirgantoro', 'Grasindo', '2005', 9, '5cm.jpg', '2021-01-12'),
(2, 'Ayat-Ayat Cinta 2', 'Habibburahman E.I', 'Republika Pesantren Basmala Indonesia', '2017', 10, 'ayatcinta.jpg', '2021-01-12'),
(3, 'Babi Ngesot', 'Raditya Dika', 'Bukune', '2008', 10, 'babi.jpg', '2021-01-12'),
(4, 'Catching Fire', 'Suzanne Collins', 'Gramedia Pustaka', '2010', 10, 'catchingfire.jpg', '2021-01-12'),
(5, 'Cinta Brontosaurus', 'Raditya Dika', 'Gagas Media', '2006', 10, 'cintabrontosaurus.jpg', '2021-01-12'),
(6, 'Maze Runner : The Death Cure', 'James Dashnerd', 'Dell Publishing', '2011', 9, 'deathcure.jpg', '2021-01-12'),
(7, 'Diary Of a Wimpy Kid : Rodrick Rules', 'Jeff Kinney', 'Amuled Books', '2008', 10, 'diary1.jpg', '2021-01-12'),
(8, 'Diary Of a Wimpy Kid : Dog Days', 'Jeff Kinney', 'Amuled Books', '2012', 8, 'diary2.jpg', '2021-01-12'),
(9, 'Diary Of a Wimpy Kid', 'Jeff Kinney', 'Amuled Books', '2007', 9, 'diary3.jpg', '2021-01-12'),
(10, 'Dilan 1990', 'Pidi Baiq', 'Pastel Books', '2015', 9, 'Dilan.jpg', '2021-01-12'),
(11, 'The Hunger Games', 'Suzanne Collins', 'Scholastic Corporation', '2008', 10, 'hungergames.jpg', '2021-01-12'),
(12, 'Koala Kumal', 'Raditya dika', 'Gagas Media', '2015', 10, 'koalakumal.jpg', '2021-01-12'),
(13, 'Laskar Pelangi', 'Andrea Hirata', 'Bentang', '2005', 9, 'laskarpelangi.jpg', '2021-01-12'),
(14, 'The Maze Runner', 'James Dashner', 'Dell Publishing', '2009', 9, 'mazerunner.jpg', '2021-01-12'),
(15, 'Milea', 'Pidi Baiq', 'Pastel Books', '2016', 9, 'Milea.jpg', '2021-01-12'),
(16, 'The Hunger Games : Mocking Jay', 'Suzanne Collins', 'Dell Books', '2010', 9, 'mockingjay.jpg', '2021-01-12'),
(17, 'Manusia Setengah Salmon', 'Raditya Dika', 'Gagas Media', '2011', 10, 'mss.jpg', '2021-01-12'),
(18, 'Perahu Kertas', 'Dee Lestari', 'Bentang Pustaka', '2009', 9, 'perahukertas.jpg', '2021-01-12'),
(19, 'Ready Player One', 'Ernest Cline', 'Crown Publishing Group', '2011', 5, 'rpo.jpg', '2021-01-12'),
(20, 'Sabtu Bersama Bapak', 'Adhitya Mulya', 'Gagas Media', '2014', 10, 'sbb.jpg', '2021-01-12'),
(21, 'Maze Runner : The Scorch Trials', 'James Dashner', 'Mizan Fantasy', '2010', 10, 'scrochtrial.jpg', '2021-01-12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_pinjam`
--

CREATE TABLE `tb_detail_pinjam` (
  `id_detail_pinjam` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail_pinjam`
--

INSERT INTO `tb_detail_pinjam` (`id_detail_pinjam`, `id_buku`, `jumlah_buku`, `id_peminjaman`) VALUES
(4, 6, 1, 4),
(10, 19, 1, 10),
(11, 15, 1, 11),
(12, 18, 1, 12),
(13, 19, 1, 13),
(14, 8, 1, 14),
(15, 19, 1, 15),
(16, 14, 1, 16),
(17, 13, 1, 17),
(18, 10, 1, 18),
(19, 16, 1, 19),
(20, 19, 1, 20),
(21, 19, 1, 21),
(22, 9, 1, 22),
(23, 2, 1, 23),
(24, 8, 1, 24),
(25, 8, 1, 25),
(26, 1, 1, 26);

--
-- Triggers `tb_detail_pinjam`
--
DELIMITER $$
CREATE TRIGGER `tg_buku_kembali` BEFORE DELETE ON `tb_detail_pinjam` FOR EACH ROW BEGIN 
	UPDATE tb_buku SET jumlah_buku = jumlah_buku + old.jumlah_buku WHERE id_buku = old.id_buku;
    UPDATE tb_peminjaman SET status = false WHERE id_peminjaman = old.id_peminjaman;
     UPDATE tb_peminjaman SET tgl_kembali = NOW() WHERE id_peminjaman = old.id_peminjaman;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tg_stok_buku` AFTER INSERT ON `tb_detail_pinjam` FOR EACH ROW BEGIN 
	UPDATE tb_buku SET jumlah_buku = jumlah_buku - new.jumlah_buku WHERE id_buku = NEW.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `batas_kembali` date NOT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`id_peminjaman`, `id_buku`, `jumlah_buku`, `id_user`, `tgl_pinjam`, `batas_kembali`, `tgl_kembali`, `status`) VALUES
(1, 8, 1, 2, '2021-01-01', '2021-01-08', '2021-01-14', 0),
(2, 2, 1, 3, '2021-01-05', '2021-01-12', '2021-01-15', 0),
(3, 12, 2, 2, '2021-01-08', '2021-01-15', '2021-01-14', 0),
(4, 6, 1, 3, '2021-01-05', '2021-01-12', NULL, 1),
(5, 10, 1, 3, '2021-01-03', '2021-01-11', '2021-01-14', 0),
(6, 8, 1, 2, '2021-01-10', '2021-01-17', '2021-01-14', 0),
(7, 8, 1, 2, '2021-01-14', '2021-01-21', '2021-01-14', 0),
(8, 12, 1, 2, '2021-01-14', '2021-01-21', '2021-01-14', 0),
(9, 16, 1, 3, '2021-01-14', '2021-01-21', '2021-01-14', 0),
(10, 19, 1, 6, '2021-01-14', '2021-01-21', NULL, 1),
(11, 15, 1, 6, '2021-01-14', '2021-01-21', NULL, 1),
(12, 18, 1, 2, '2021-01-05', '2021-01-11', NULL, 1),
(13, 19, 1, 3, '2021-01-14', '2021-01-21', NULL, 1),
(14, 8, 1, 3, '2021-01-14', '2021-01-21', NULL, 1),
(15, 19, 1, 6, '2021-01-14', '2021-01-21', NULL, 1),
(16, 14, 1, 3, '2021-01-14', '2021-01-21', NULL, 1),
(17, 13, 1, 6, '2021-01-06', '2021-01-13', NULL, 1),
(18, 10, 1, 2, '2021-01-08', '2021-01-19', NULL, 1),
(19, 16, 1, 2, '2021-01-14', '2021-01-21', NULL, 1),
(20, 19, 1, 3, '2021-01-14', '2021-01-21', NULL, 1),
(21, 19, 1, 3, '2021-01-14', '2021-01-21', NULL, 1),
(22, 9, 1, 2, '2021-01-14', '2021-01-21', NULL, 1),
(23, 2, 1, 2, '2021-01-06', '2021-01-13', NULL, 1),
(24, 8, 1, 3, '2021-01-15', '2021-01-22', NULL, 1),
(25, 8, 1, 8, '2021-01-15', '2021-01-22', NULL, 1),
(26, 1, 1, 2, '2021-01-07', '2021-01-14', NULL, 1),
(27, 1, 1, 2, '2021-01-15', '2021-01-22', '2021-01-15', 0),
(28, 3, 1, 2, '2021-01-15', '2021-01-29', '2021-01-15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','anggota') NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `username`, `email`, `alamat`, `password`, `level`, `status`, `tgl_daftar`) VALUES
(1, 'admin', 'admin@gmail.com', 'administrator', '$2y$10$XV9jMfFvHZnbOVsqDziJZe13Y6jnNMaW55TrvGeRL68TjQM5TiNZa', 'admin', 1, '2021-01-14'),
(2, 'kevin', 'kevin@gmail.com', 'Jakarta', '$2y$10$RXeoOVR27t1Yy6mnsq1iHOFU1V/./0KdCGp8NH4IARrYMfwshA1WO', 'anggota', 1, '2021-01-14'),
(3, 'benedict123', 'ben123@gmail.com', 'Surabayaaa', '$2y$10$/t3OAAH0zGyv/2zCXTNEseuvDT/TePWQ8yK74vjo8mwykBkhbbyAK', 'anggota', 1, '2021-01-14'),
(6, 'nanda', 'nanda@gmail.com', 'Solo', '$2y$10$Qd/manZEh05lfHYrPpPRCu2d19AnfKaJvroYrn6IHcnvkIq/ANiXu', 'anggota', 1, '2021-01-14'),
(8, 'cobasatudua', 'coba@gmail.com', 'manaaja', '$2y$10$ZQZFgtYXlQpjkZoXzMasMucUmKMQvkPClwJBYbo667.Bnj0xHEOoy', 'anggota', 1, '2021-01-14'),
(9, 'coba3', 'coba@gmail.com', 'Solo', '$2y$10$XLtTM1CNk4ZfdQsggRhpYews4aAtBusZLKX3sB3lS/0MzA13q1KGa', 'anggota', 1, '2021-01-14'),
(10, 'musaa', 'musaa@gmail.com', 'Gonilan', '$2y$10$kjOGsE2BstM2W96o2q1OGOhF.TyZZUpNaB4QAAovoJDQyyiukDRSO', 'anggota', 1, '2021-01-15'),
(13, 'primaa', 'prima@gmail.com', 'Banywangi', '$2y$10$nfQ/ZBOWj3ILRsOrSJnwJurYthp6z6pyVipsL/5G2a7VQdRogTWBq', 'anggota', 1, '2021-01-15');

-- --------------------------------------------------------

--
-- Stand-in structure for view `top7`
-- (See below for the actual view)
--
CREATE TABLE `top7` (
`Top7` bigint(21)
,`id_buku` int(11)
,`judul` varchar(100)
,`gambar` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `top7a`
-- (See below for the actual view)
--
CREATE TABLE `top7a` (
`top7a` bigint(21)
,`id_user` int(11)
,`username` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure for view `top7`
--
DROP TABLE IF EXISTS `top7`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `top7`  AS  select count(`a`.`id_peminjaman`) AS `Top7`,`a`.`id_buku` AS `id_buku`,`b`.`judul` AS `judul`,`b`.`gambar` AS `gambar` from (`tb_peminjaman` `a` join `tb_buku` `b` on(`a`.`id_buku` = `b`.`id_buku`)) group by `a`.`id_buku` order by count(`a`.`id_peminjaman`) desc limit 7 ;

-- --------------------------------------------------------

--
-- Structure for view `top7a`
--
DROP TABLE IF EXISTS `top7a`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `top7a`  AS  select count(`a`.`id_peminjaman`) AS `top7a`,`a`.`id_user` AS `id_user`,`b`.`username` AS `username` from (`tb_peminjaman` `a` join `tb_users` `b` on(`a`.`id_user` = `b`.`id_user`)) group by `a`.`id_user` order by count(`a`.`id_peminjaman`) desc limit 7 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tb_detail_pinjam`
--
ALTER TABLE `tb_detail_pinjam`
  ADD PRIMARY KEY (`id_detail_pinjam`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_detail_pinjam`
--
ALTER TABLE `tb_detail_pinjam`
  MODIFY `id_detail_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

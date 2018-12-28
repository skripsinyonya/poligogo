-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28 Des 2018 pada 23.31
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_poligigi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungan`
--

CREATE TABLE IF NOT EXISTS `kunjungan` (
  `id_kunjungan` int(10) NOT NULL,
  `no_rm` varchar(6) NOT NULL,
  `diagnosis` varchar(25) NOT NULL,
  `tindakan` varchar(30) NOT NULL,
  `tanggal_kunjungan` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kunjungan`
--

INSERT INTO `kunjungan` (`id_kunjungan`, `no_rm`, `diagnosis`, `tindakan`, `tanggal_kunjungan`) VALUES
(1, '000001', 'qqqwewew', 'aaassesese', '2018-12-28 08:59:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_jabatan`
--

CREATE TABLE IF NOT EXISTS `master_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `kode_jabatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_pegawai`
--

CREATE TABLE IF NOT EXISTS `master_pegawai` (
  `id` int(20) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` enum('Master','Dokter','Petugas RM','Perawat') NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `tgl_terdaftar` date NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_pegawai`
--

INSERT INTO `master_pegawai` (`id`, `nip`, `nama`, `jabatan`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telepon`, `tgl_terdaftar`, `username`, `password`, `gambar`) VALUES
(1, '12121212', 'Bagas', 'Master', 'Laki - laki', 'Bondowoso', '1996-08-16', 'sukosari', '0876543219', '2018-12-02', 'master', 'eb0a191797624dd3a48fa681d3061212', 'matamu.jpeg'),
(3, '0', 'Abdul', 'Master', 'Laki - laki', 'Kediri', '2018-01-01', '1234', '123', '2018-12-09', '13123', '4297f44b13955235245b2497399d7a93', '1544351445mas ptih hitam.jpg'),
(4, '12333123', 'sukoco', 'Petugas RM', 'laki - laki', 'subang', '2018-12-05', 'dfsdf', '1231241', '2018-12-21', 'petugasrm', '2bf47e5ccccc5d2214c42f70d325c23a', 'petugasrm.jpg'),
(5, '5555555', 'sda', 'Perawat', 'perempuan', 'asdad', '2018-12-20', 'asda', '12314141', '2018-12-29', 'perawat', '5d6a514ee02a5fc910dee69cc07017cc', 'perawat.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `odontogram`
--

CREATE TABLE IF NOT EXISTS `odontogram` (
  `kode_odontogram` int(10) NOT NULL,
  `no_gigi` int(10) NOT NULL,
  `simbol_gigi` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `no_rm` varchar(6) NOT NULL,
  `no_kk` varchar(15) NOT NULL,
  `nama_kk` varchar(20) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `alergi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`no_rm`, `no_kk`, `nama_kk`, `nik`, `nama_pasien`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `alergi`) VALUES
('000001', '2147483647', 'joko', '2147483647', 'jubaidah', 'Perempuan', 'bondowoso', '1996-10-10', 'ternate', '-'),
('000002', '382748729424424', 'jojo', '973493498349284928294', 'rico', 'laki-laki', 'yogyakarta', '2012-01-09', 'balung', 'telur'),
('000003', '8675645354758', 'surata', '9778664634655768', 'lina', 'Perempuan', 'lumajang', '1996-10-10', 'jatiroto', '-'),
('000005', '2147483647', 'joko', '21474836472', 'jubaidah', 'Perempuan', 'jakarte', '2018-09-05', 'ternate', '-'),
('000012', '098776667788888', 'susilo', '16371266712172879', 'susilo', 'laki-laki', 'jember', '1996-11-14', 'ternate', 'udang'),
('000023', '121213131312', 'suparto', '16371266712172870', 'juminten', 'Perempuan', 'banyuwangi', '1992-11-06', 'sukosari', '-'),
('000024', '2147483647', 'fitris', '21474836471', 'Abdul Jabbarru', 'Laki - lak', 'Blitar', '2018-12-21', 'aca', '-');

-- --------------------------------------------------------

--
-- Stand-in structure for view `pasien_tindakan`
--
CREATE TABLE IF NOT EXISTS `pasien_tindakan` (
`id_tindakan` int(10)
,`status` varchar(10)
,`nama_tindakan` varchar(30)
,`icd_cm` varchar(10)
,`foto_rontgen` varchar(50)
,`no_rm` varchar(6)
,`nama_pasien` varchar(50)
,`no_kk` varchar(15)
,`jenis_kelamin` varchar(10)
,`tanggal_lahir` date
,`tempat_lahir` varchar(50)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE IF NOT EXISTS `penyakit` (
  `id_penyakit` int(20) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `icd_x` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`, `icd_x`) VALUES
(1, 'gingsul', '1001'),
(2, 'ompong', '1992'),
(3, '', ''),
(4, 'lapar', ''),
(5, 'greget', ''),
(6, 'sadas', '987');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perawatan`
--

CREATE TABLE IF NOT EXISTS `perawatan` (
  `id_perawatan` int(11) NOT NULL,
  `nip_perawat` varchar(20) NOT NULL,
  `id_tindakan` int(10) NOT NULL,
  `tanggal_masuk` datetime NOT NULL,
  `tanggal_dirawat` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perawatan`
--

INSERT INTO `perawatan` (`id_perawatan`, `nip_perawat`, `id_tindakan`, `tanggal_masuk`, `tanggal_dirawat`) VALUES
(2, '12121212', 2, '2018-12-25 10:06:58', '2018-12-29 12:00:00'),
(3, '12121212', 4, '2018-12-28 06:35:49', '2018-12-28 03:00:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `perawatan_pasien`
--
CREATE TABLE IF NOT EXISTS `perawatan_pasien` (
`id_perawatan` int(11)
,`nip` varchar(25)
,`nama_pegawai` varchar(50)
,`id_tindakan` int(10)
,`nama_tindakan` varchar(30)
,`status` varchar(10)
,`foto_rontgen` varchar(50)
,`no_rm` varchar(6)
,`nama_pasien` varchar(50)
,`jenis_kelamin` varchar(10)
,`tempat_lahir` varchar(50)
,`tanggal_lahir` date
,`alamat` varchar(50)
,`nik` varchar(50)
,`nama_kk` varchar(20)
,`no_kk` varchar(15)
,`alergi` varchar(20)
,`tanggal_masuk` datetime
,`tanggal_dirawat` datetime
,`nama` varchar(50)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan`
--

CREATE TABLE IF NOT EXISTS `tindakan` (
  `id_tindakan` int(10) NOT NULL,
  `nama_tindakan` varchar(30) NOT NULL,
  `icd_cm` varchar(10) NOT NULL,
  `no_rm` varchar(6) NOT NULL,
  `foto_rontgen` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tindakan`
--

INSERT INTO `tindakan` (`id_tindakan`, `nama_tindakan`, `icd_cm`, `no_rm`, `foto_rontgen`, `status`) VALUES
(1, 'cc', '2010001', '000002', '', ''),
(2, 'Soag', '2010002', '000003', '1544954444love.png', ''),
(4, 'cucu', '2010003', '000012', '1544954746love.png', 'Dewasa');

-- --------------------------------------------------------

--
-- Struktur untuk view `pasien_tindakan`
--
DROP TABLE IF EXISTS `pasien_tindakan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pasien_tindakan` AS select `tindakan`.`id_tindakan` AS `id_tindakan`,`tindakan`.`status` AS `status`,`tindakan`.`nama_tindakan` AS `nama_tindakan`,`tindakan`.`icd_cm` AS `icd_cm`,`tindakan`.`foto_rontgen` AS `foto_rontgen`,`tindakan`.`no_rm` AS `no_rm`,`pasien`.`nama_pasien` AS `nama_pasien`,`pasien`.`no_kk` AS `no_kk`,`pasien`.`jenis_kelamin` AS `jenis_kelamin`,`pasien`.`tanggal_lahir` AS `tanggal_lahir`,`pasien`.`tempat_lahir` AS `tempat_lahir` from (`tindakan` join `pasien`) where (`tindakan`.`no_rm` = `pasien`.`no_rm`);

-- --------------------------------------------------------

--
-- Struktur untuk view `perawatan_pasien`
--
DROP TABLE IF EXISTS `perawatan_pasien`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `perawatan_pasien` AS select `perawatan`.`id_perawatan` AS `id_perawatan`,`master_pegawai`.`nip` AS `nip`,`master_pegawai`.`nama` AS `nama_pegawai`,`tindakan`.`id_tindakan` AS `id_tindakan`,`tindakan`.`nama_tindakan` AS `nama_tindakan`,`tindakan`.`status` AS `status`,`tindakan`.`foto_rontgen` AS `foto_rontgen`,`pasien`.`no_rm` AS `no_rm`,`pasien`.`nama_pasien` AS `nama_pasien`,`pasien`.`jenis_kelamin` AS `jenis_kelamin`,`pasien`.`tempat_lahir` AS `tempat_lahir`,`pasien`.`tanggal_lahir` AS `tanggal_lahir`,`pasien`.`alamat` AS `alamat`,`pasien`.`nik` AS `nik`,`pasien`.`nama_kk` AS `nama_kk`,`pasien`.`no_kk` AS `no_kk`,`pasien`.`alergi` AS `alergi`,`perawatan`.`tanggal_masuk` AS `tanggal_masuk`,`perawatan`.`tanggal_dirawat` AS `tanggal_dirawat`,`master_pegawai`.`nama` AS `nama` from (((`perawatan` join `tindakan`) join `master_pegawai`) join `pasien`) where ((`tindakan`.`id_tindakan` = `perawatan`.`id_tindakan`) and (`master_pegawai`.`nip` = `perawatan`.`nip_perawat`) and (`pasien`.`no_rm` = `tindakan`.`no_rm`));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`id_kunjungan`);

--
-- Indexes for table `master_jabatan`
--
ALTER TABLE `master_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `master_pegawai`
--
ALTER TABLE `master_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`no_rm`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`id_perawatan`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id_tindakan`),
  ADD KEY `no_rm` (`no_rm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `id_kunjungan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `master_jabatan`
--
ALTER TABLE `master_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_pegawai`
--
ALTER TABLE `master_pegawai`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `perawatan`
--
ALTER TABLE `perawatan`
  MODIFY `id_perawatan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id_tindakan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  ADD CONSTRAINT `tindakan_ibfk_1` FOREIGN KEY (`no_rm`) REFERENCES `pasien` (`no_rm`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

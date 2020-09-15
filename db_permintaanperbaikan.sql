-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2018 at 08:02 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_permintaanperbaikan`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktivitas_pengguna`
--

CREATE TABLE `aktivitas_pengguna` (
  `id_aktivitaspengguna` int(1) NOT NULL,
  `nama_aktivitas` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aktivitas_pengguna`
--

INSERT INTO `aktivitas_pengguna` (`id_aktivitaspengguna`, `nama_aktivitas`) VALUES
(0, 'keluar'),
(1, 'masuk');

-- --------------------------------------------------------

--
-- Table structure for table `formulir_permintaan`
--

CREATE TABLE `formulir_permintaan` (
  `no_tiket` varchar(20) NOT NULL,
  `no_badgepelapor` varchar(10) NOT NULL,
  `nama_pelapor` varchar(50) NOT NULL,
  `id_unitkerja` int(5) NOT NULL,
  `id_jabatan` int(2) NOT NULL,
  `lokasi` text NOT NULL,
  `no_inventaris` varchar(30) NOT NULL,
  `keterangan_seri` varchar(30) NOT NULL,
  `id_jenisperangkat` int(5) NOT NULL,
  `id_merk` int(5) NOT NULL,
  `keluhan` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `waktu_permintaanmasuk` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formulir_permintaan`
--

INSERT INTO `formulir_permintaan` (`no_tiket`, `no_badgepelapor`, `nama_pelapor`, `id_unitkerja`, `id_jabatan`, `lokasi`, `no_inventaris`, `keterangan_seri`, `id_jenisperangkat`, `id_merk`, `keluhan`, `email`, `waktu_permintaanmasuk`) VALUES
('036-014153P', '040361', 'Ilina Mary Noviaty', 35, 1, 'Gd XXiX-SB Lt-2', 'CN3815H01B', 'HP DesignJet T920', 5, 3, 'Tidak Bisa Memproses Cetak / Scan Gambar', 'ilina@gmail.com', '2018-09-22 01:41:53'),
('334-0757583', '113344', 'Fadilah Nur Imani', 34, 1, 'Gedung utama lt.1', 'CN3815H01B', 'HP DesignJet T920', 5, 3, 'Hasil print terkadang tidak jelas.', 'fadilahnurimani@gmail.com', '2018-12-07 07:57:58'),
('345-083556G', '903458', 'Nesa', 6, 5, 'Gedung A lt.2', 'UF3315R129', 'Monitor LCD', 2, 5, 'tidak mau dihidupkan', 'nesa@gmail.com', '2018-12-01 08:35:56'),
('612-202153Q', '456123', 'Fadilah Nur Imani', 33, 6, 'Gedung utama lt.6', 'EF3815D013', 'Monitor LCD', 2, 4, 'monitor kedap kedip', 'fadilahnurimani25@gmail.com', '2018-11-30 20:21:53'),
('678-1615117', '156789', 'Fadilah', 6, 5, 'Gedung utama lt.1', 'CN3815H01B', 'HP DesignJet T920', 5, 3, 'printer tidak bisa mencetak', 'fadilahnurimani25@gmail.com', '2018-12-07 16:15:11'),
('679-103552E', '896798', 'Isti', 16, 5, 'Gedung utama lt.2', 'EF3815D013', 'Monitor LCD', 2, 4, 'gak mau hidup', 'tt@gmail.com', '2018-12-01 10:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(2) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Karyawan Organik'),
(2, 'Karyawan Non Organik'),
(3, 'Superintendent'),
(4, 'Staf Manajer'),
(5, 'Sekretaris'),
(6, 'Manajer'),
(7, 'Manajer Umum'),
(8, 'Direktur'),
(9, 'Komisaris');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_perangkat`
--

CREATE TABLE `jenis_perangkat` (
  `id_jenisperangkat` int(5) NOT NULL,
  `nama_jenisperangkat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_perangkat`
--

INSERT INTO `jenis_perangkat` (`id_jenisperangkat`, `nama_jenisperangkat`) VALUES
(1, 'Komputer - System Unit'),
(2, 'Komputer - Monitor'),
(3, 'Komputer - Keyboard'),
(4, 'Printer - Epson'),
(5, 'Printer - Deskjet'),
(6, 'Printer - Laserjet'),
(7, 'Printer - Painjet'),
(8, 'Printer - Ploter HP Design Jet'),
(9, 'Modem'),
(10, 'Op. Teleset'),
(11, 'DCA');

-- --------------------------------------------------------

--
-- Table structure for table `keterangan_sekarang`
--

CREATE TABLE `keterangan_sekarang` (
  `id_keterangansekarang` int(1) NOT NULL,
  `keterangan_sekarang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keterangan_sekarang`
--

INSERT INTO `keterangan_sekarang` (`id_keterangansekarang`, `keterangan_sekarang`) VALUES
(1, 'Selesai'),
(2, 'Diproses'),
(3, 'Dihentikan');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `id_merk` int(5) NOT NULL,
  `nama_merk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`id_merk`, `nama_merk`) VALUES
(1, 'Asus'),
(2, 'Acer'),
(3, 'HP'),
(4, 'Dell'),
(5, 'Lenovo');

-- --------------------------------------------------------

--
-- Table structure for table `no_inventaris`
--

CREATE TABLE `no_inventaris` (
  `no_inventaris` varchar(30) NOT NULL,
  `id_jenisperangkat` int(5) NOT NULL,
  `id_merk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `no_inventaris`
--

INSERT INTO `no_inventaris` (`no_inventaris`, `id_jenisperangkat`, `id_merk`) VALUES
('CN3815H01B', 5, 3),
('EF3815D013', 2, 4),
('UF3315R129', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_terdaftar`
--

CREATE TABLE `pengguna_terdaftar` (
  `no_badgepengguna` varchar(10) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `sandi` varchar(50) NOT NULL,
  `id_role` int(2) NOT NULL,
  `id_unitkerja` int(5) NOT NULL,
  `email` varchar(60) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna_terdaftar`
--

INSERT INTO `pengguna_terdaftar` (`no_badgepengguna`, `nama_lengkap`, `sandi`, `id_role`, `id_unitkerja`, `email`, `alamat`) VALUES
('123143', 'Refta Sepdela Aziz', 'baa5da1dd536d5a40e5b1ba5dab94c69', 3, 34, 'refta_taktak@gmail.com', 'gang buntu'),
('181818', 'Gusti', 'defa50a7babc2b727c44fe4e03905bf4', 2, 3, 'gus@g.com', 'kertapati'),
('191919', 'Sulthan', '470793e036b9db245ac460dc89b15913', 1, 34, 's@t.com', 'indralaya'),
('232323', 'Hedi Yunus', '2467d3744600858cc9026d5ac6005305', 2, 34, 'hedi@gmail.com', 'apartemen'),
('343536', 'Fadilah Nur Imani', 'ee854aa743d1144ed33cca59ff8a6a23', 1, 34, 'fadilahnurimani@gmail.com', 'maskarebet km.10'),
('424242', 'Ridwan', 'ea90622fa6e23cf933bfdf5db28473fb', 1, 34, 'ridwan@gmail.com', 'lemabang'),
('454545', 'Annisa', '9ea5e6f10d48803ae38499c0d5e6d93f', 1, 34, 'nisa@gmail.com', 'perumnas'),
('565656', 'Hanum', 'e9fd92b4e8a79b1c0b046ec770197f60', 1, 34, 'noem@w.com', 'jl. sudirman'),
('787878', 'Sartika', '5379884c5ec4e06879f7400fd40be0d9', 1, 34, 'tika@g.com', 'sekojo'),
('879657', 'Dea tri Ananda', '5dd4f0e0c7542a9b3cf88e036e285210', 2, 31, 'z@gmail.com', 'kertapati'),
('909090', 'Noah', 'df780a97b7d6a8f779f14728bccd3c4c', 1, 34, 'n@g.com', 'new york'),
('989898', 'Yunia Ruru', '90bed51510b09ad5d325d8d174fa616c', 1, 34, 'ruru@gmail.com', 'sekip');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_aktivitas`
--

CREATE TABLE `riwayat_aktivitas` (
  `id_riwayat` int(10) NOT NULL,
  `no_badgepengguna` varchar(10) NOT NULL,
  `id_role` int(2) NOT NULL,
  `id_aktivitaspengguna` int(1) NOT NULL,
  `waktu_aktivitas` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_aktivitas`
--

INSERT INTO `riwayat_aktivitas` (`id_riwayat`, `no_badgepengguna`, `id_role`, `id_aktivitaspengguna`, `waktu_aktivitas`) VALUES
(1, '181818', 2, 1, '2018-11-29 12:54:08'),
(2, '181818', 2, 0, '2018-11-29 12:56:19'),
(3, '343536', 1, 1, '2018-11-29 12:56:36'),
(4, '343536', 1, 0, '2018-11-29 12:56:49'),
(5, '181818', 2, 1, '2018-11-29 12:56:58'),
(6, '181818', 2, 0, '2018-11-29 13:02:08'),
(7, '232323', 2, 1, '2018-11-29 13:02:29'),
(8, '232323', 2, 0, '2018-11-29 14:01:05'),
(9, '343536', 1, 1, '2018-11-29 14:01:35'),
(10, '343536', 1, 0, '2018-11-29 14:04:54'),
(11, '181818', 2, 1, '2018-11-29 14:05:03'),
(12, '181818', 2, 1, '2018-11-29 19:33:06'),
(13, '181818', 2, 1, '2018-11-30 05:25:29'),
(14, '181818', 2, 0, '2018-11-30 06:33:56'),
(15, '191919', 1, 1, '2018-11-30 06:34:24'),
(16, '343536', 1, 1, '2018-11-30 11:23:19'),
(17, '181818', 2, 1, '2018-11-30 11:26:46'),
(18, '191919', 1, 1, '2018-11-30 23:49:09'),
(19, '343536', 1, 1, '2018-12-01 05:41:45'),
(20, '343536', 1, 1, '2018-12-01 14:50:38'),
(21, '343536', 1, 1, '2018-12-05 13:31:19'),
(22, '343536', 1, 0, '2018-12-05 14:52:01'),
(23, '343536', 1, 1, '2018-12-06 23:34:18'),
(24, '343536', 1, 1, '2018-12-07 02:45:37'),
(25, '879657', 2, 1, '2018-12-07 08:02:55'),
(26, '343536', 1, 1, '2018-12-07 08:08:06'),
(27, '181818', 2, 1, '2018-12-07 08:44:43'),
(28, '343536', 1, 1, '2018-12-07 11:03:11'),
(29, '343536', 1, 1, '2018-12-07 20:24:48'),
(30, '343536', 1, 1, '2018-12-09 23:06:25'),
(31, '343536', 1, 1, '2018-12-10 21:41:49'),
(32, '343536', 1, 1, '2018-12-11 00:57:49'),
(33, '181818', 2, 1, '2018-12-11 01:17:26'),
(34, '343536', 1, 1, '2018-12-11 05:40:05'),
(35, '343536', 1, 1, '2018-12-11 08:17:30'),
(36, '181818', 2, 1, '2018-12-11 09:26:27'),
(37, '343536', 1, 0, '2018-12-11 12:52:40'),
(38, '181818', 2, 1, '2018-12-11 12:53:24'),
(39, '181818', 2, 0, '2018-12-11 12:53:41'),
(40, '123143', 3, 1, '2018-12-11 12:53:45'),
(41, '123143', 3, 0, '2018-12-11 12:57:57'),
(42, '343536', 1, 1, '2018-12-11 12:58:04'),
(43, '343536', 1, 0, '2018-12-11 13:33:08'),
(44, '123143', 3, 1, '2018-12-11 13:33:17'),
(45, '343536', 1, 1, '2018-12-11 13:36:19');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(2) NOT NULL,
  `nama_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'Teknisi'),
(2, 'Admin'),
(3, 'Manager TI');

-- --------------------------------------------------------

--
-- Table structure for table `status_perbaikan`
--

CREATE TABLE `status_perbaikan` (
  `no_tiket` varchar(20) NOT NULL,
  `waktu_barangmasuk` datetime NOT NULL,
  `diagnosa_awal` text NOT NULL,
  `waktu_diagnosaawal` datetime NOT NULL,
  `tindakan_lanjut` text NOT NULL,
  `waktu_tindakanlanjut` datetime NOT NULL,
  `solusi_akhir` text NOT NULL,
  `waktu_solusiakhir` datetime NOT NULL,
  `id_keterangansekarang` int(1) NOT NULL,
  `waktu_perbaikanselesai` datetime NOT NULL,
  `no_badgeteknisi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_perbaikan`
--

INSERT INTO `status_perbaikan` (`no_tiket`, `waktu_barangmasuk`, `diagnosa_awal`, `waktu_diagnosaawal`, `tindakan_lanjut`, `waktu_tindakanlanjut`, `solusi_akhir`, `waktu_solusiakhir`, `id_keterangansekarang`, `waktu_perbaikanselesai`, `no_badgeteknisi`) VALUES
('036-014153P', '2018-09-16 00:00:00', 'Kerusakan pada scanner', '2018-09-17 00:00:00', 'start ulang, periksa catridge, periksa usb, periksa scan.', '2018-09-18 00:00:00', 'power supply rusak, disarankan penggantian usb baru karena perbaikan tidak effisien.', '2018-09-20 00:00:00', 1, '2018-09-21 00:00:00', '343536'),
('334-0757583', '2018-12-06 13:00:57', 'catridge harus diganti', '2018-12-07 01:03:03', 'menunggu catridge tersedia', '2018-12-08 02:01:03', 'ganti catridge', '2018-12-09 07:13:00', 1, '2018-12-10 15:08:14', '343536'),
('345-083556G', '2018-12-10 11:39:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 2, '0000-00-00 00:00:00', '343536'),
('612-202153Q', '2018-11-30 03:04:04', 'terdapat masalah dengan kabel', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 2, '0000-00-00 00:00:00', '191919'),
('679-103552E', '2018-12-01 01:06:03', 'terjadi kerusakan pada panel display menyebabkan layar menjadi black screen', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 3, '0000-00-00 00:00:00', '343536');

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id_unitkerja` int(5) NOT NULL,
  `nama_unitkerja` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_kerja`
--

INSERT INTO `unit_kerja` (`id_unitkerja`, `nama_unitkerja`) VALUES
(1, 'Hubungan Masyarakat'),
(2, 'Sekretariat dan Tata Kelola Perusahaan'),
(3, 'Pengawasan Operasional'),
(4, 'Pengawasan Keuangan'),
(5, 'Hukum I'),
(6, 'Hukum II'),
(7, 'Pabrik PUSRI IB'),
(8, 'Pabrik PUSRI II'),
(9, 'Pabrik PUSRI III'),
(10, 'Pabrik PUSRI IV'),
(11, 'Pengantongan dan Angkutan'),
(12, 'Perencanaan dan Pengendalian Produksi'),
(13, 'Laboratorium'),
(14, 'K3 dan Lingkungan Hidup'),
(15, 'Pemeliharaan Mekanikal'),
(16, 'Pemeliharaan Listrik dan Instrumen'),
(17, 'Perbengkelan'),
(18, 'Jaminan dan Pengendalian Kualitas'),
(19, 'Perencanaan dan Pengendalian Turn Around'),
(20, 'Keuangan'),
(21, 'Akuntansi'),
(22, 'Anggaran'),
(23, 'Penjualan Wilayah I'),
(24, 'Penjualan Wilayah II'),
(25, 'Strategi dan Perencanaan Pemasaran'),
(26, 'Pemasaran dan Distribusi'),
(27, 'Pengendalian dan Pelayanan Pelanggan'),
(28, 'Sistem Keselamatan dan Keamanan Kapal'),
(29, 'Armada dan Usaha'),
(30, 'Teknik dan Penunjang'),
(31, 'Administrasi dan Keuangan'),
(32, 'Pengembangan Usaha dan Teknologi'),
(33, 'Perencanaan Perusahaan, KPI dan Sistem Manajemen'),
(34, 'Teknologi Informasi'),
(35, 'Rancang Bangun dan Perekayasaan'),
(36, 'Pengadaan Barang dan Jasa'),
(37, 'Perencanaan Material dan Pergudangan'),
(38, 'Sarana dan Umum'),
(39, 'Sekuriti'),
(40, 'Pengembangan SDM dan Organisasi'),
(41, 'Ketenagakerjaan'),
(42, 'Pendidikan dan Pelatihan'),
(43, 'Program Kemitraan dan Bina Lingkungan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktivitas_pengguna`
--
ALTER TABLE `aktivitas_pengguna`
  ADD PRIMARY KEY (`id_aktivitaspengguna`);

--
-- Indexes for table `formulir_permintaan`
--
ALTER TABLE `formulir_permintaan`
  ADD PRIMARY KEY (`no_tiket`),
  ADD KEY `id_unitkerja` (`id_unitkerja`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `no_inventaris` (`no_inventaris`),
  ADD KEY `id_jenisperangkat` (`id_jenisperangkat`),
  ADD KEY `id_merk` (`id_merk`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jenis_perangkat`
--
ALTER TABLE `jenis_perangkat`
  ADD PRIMARY KEY (`id_jenisperangkat`);

--
-- Indexes for table `keterangan_sekarang`
--
ALTER TABLE `keterangan_sekarang`
  ADD PRIMARY KEY (`id_keterangansekarang`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indexes for table `no_inventaris`
--
ALTER TABLE `no_inventaris`
  ADD PRIMARY KEY (`no_inventaris`),
  ADD KEY `id_jenisperangkat` (`id_jenisperangkat`),
  ADD KEY `id_merk` (`id_merk`);

--
-- Indexes for table `pengguna_terdaftar`
--
ALTER TABLE `pengguna_terdaftar`
  ADD PRIMARY KEY (`no_badgepengguna`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_unitkerja` (`id_unitkerja`);

--
-- Indexes for table `riwayat_aktivitas`
--
ALTER TABLE `riwayat_aktivitas`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `no_badgepengguna` (`no_badgepengguna`),
  ADD KEY `id_aktifitaspengguna` (`id_aktivitaspengguna`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `status_perbaikan`
--
ALTER TABLE `status_perbaikan`
  ADD PRIMARY KEY (`no_tiket`),
  ADD KEY `no_tiket` (`no_tiket`),
  ADD KEY `id_keteranganakhir` (`id_keterangansekarang`),
  ADD KEY `no_badgeteknisi` (`no_badgeteknisi`);

--
-- Indexes for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id_unitkerja`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jenis_perangkat`
--
ALTER TABLE `jenis_perangkat`
  MODIFY `id_jenisperangkat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `keterangan_sekarang`
--
ALTER TABLE `keterangan_sekarang`
  MODIFY `id_keterangansekarang` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `id_merk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `riwayat_aktivitas`
--
ALTER TABLE `riwayat_aktivitas`
  MODIFY `id_riwayat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id_unitkerja` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `formulir_permintaan`
--
ALTER TABLE `formulir_permintaan`
  ADD CONSTRAINT `formulir_permintaan_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`),
  ADD CONSTRAINT `formulir_permintaan_ibfk_2` FOREIGN KEY (`id_unitkerja`) REFERENCES `unit_kerja` (`id_unitkerja`),
  ADD CONSTRAINT `formulir_permintaan_ibfk_3` FOREIGN KEY (`no_inventaris`) REFERENCES `no_inventaris` (`no_inventaris`),
  ADD CONSTRAINT `formulir_permintaan_ibfk_4` FOREIGN KEY (`id_jenisperangkat`) REFERENCES `no_inventaris` (`id_jenisperangkat`);

--
-- Constraints for table `no_inventaris`
--
ALTER TABLE `no_inventaris`
  ADD CONSTRAINT `no_inventaris_ibfk_1` FOREIGN KEY (`id_merk`) REFERENCES `merk` (`id_merk`),
  ADD CONSTRAINT `no_inventaris_ibfk_2` FOREIGN KEY (`id_jenisperangkat`) REFERENCES `jenis_perangkat` (`id_jenisperangkat`);

--
-- Constraints for table `pengguna_terdaftar`
--
ALTER TABLE `pengguna_terdaftar`
  ADD CONSTRAINT `pengguna_terdaftar_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`),
  ADD CONSTRAINT `pengguna_terdaftar_ibfk_2` FOREIGN KEY (`id_unitkerja`) REFERENCES `unit_kerja` (`id_unitkerja`);

--
-- Constraints for table `riwayat_aktivitas`
--
ALTER TABLE `riwayat_aktivitas`
  ADD CONSTRAINT `riwayat_aktivitas_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`),
  ADD CONSTRAINT `riwayat_aktivitas_ibfk_2` FOREIGN KEY (`no_badgepengguna`) REFERENCES `pengguna_terdaftar` (`no_badgepengguna`),
  ADD CONSTRAINT `riwayat_aktivitas_ibfk_3` FOREIGN KEY (`id_aktivitaspengguna`) REFERENCES `aktivitas_pengguna` (`id_aktivitaspengguna`);

--
-- Constraints for table `status_perbaikan`
--
ALTER TABLE `status_perbaikan`
  ADD CONSTRAINT `status_perbaikan_ibfk_1` FOREIGN KEY (`no_tiket`) REFERENCES `formulir_permintaan` (`no_tiket`),
  ADD CONSTRAINT `status_perbaikan_ibfk_3` FOREIGN KEY (`id_keterangansekarang`) REFERENCES `keterangan_sekarang` (`id_keterangansekarang`),
  ADD CONSTRAINT `status_perbaikan_ibfk_4` FOREIGN KEY (`no_badgeteknisi`) REFERENCES `pengguna_terdaftar` (`no_badgepengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

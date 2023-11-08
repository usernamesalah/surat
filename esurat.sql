-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 02, 2018 at 03:28 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esurat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(2) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(75) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `level` enum('Super Admin','Admin') NOT NULL,
  `foto_profil` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `nip`, `level`, `foto_profil`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Halimah Riyanti', '08051990', 'Super Admin', 'Koala.jpg'),
(22, 'yankes', 'd41d8cd98f00b204e9800998ecf8427e', 'Yankes', '123', 'Admin', 'fikri2.jpeg'),
(23, 'promkes', '86a5d384a565412d8f437f1394a9c1dc', 'Promkes', '123456', 'Admin', 'LOGO_OKI.png'),
(24, 'p2pl', 'd41d8cd98f00b204e9800998ecf8427e', 'P2PL', '12345', 'Admin', ''),
(25, 'keuangan', 'd41d8cd98f00b204e9800998ecf8427e', 'Keuangan', '12345', 'Admin', ''),
(26, 'Kepegawaian', 'd41d8cd98f00b204e9800998ecf8427e', 'Kepegawaian', '', 'Admin', ''),
(27, 'perencanaan', 'd41d8cd98f00b204e9800998ecf8427e', 'Perencanaan', '', 'Admin', ''),
(28, 'PROGRAM DAN INF', 'e564042ac41ba4a3c73b9e5af47a88be', 'PROGRAM DAN INF', '26081996', 'Admin', ''),
(29, 'jamsos', 'd41d8cd98f00b204e9800998ecf8427e', 'Jamsoskes', '', 'Admin', ''),
(30, 'farmasi', '25d55ad283aa400af464c76d713c07ad', 'Farmasi', '', 'Admin', ''),
(31, 'umum', 'd41d8cd98f00b204e9800998ecf8427e', 'Umum', '12345678910', 'Admin', ''),
(32, 'sekretariat', 'd41d8cd98f00b204e9800998ecf8427e', 'Sekretariat', '1234567', 'Admin', ''),
(33, 'P2P', '0cfe0ef3a357503c4a4538414b870ca1', 'Mas Bro P2P', '', 'Admin', ''),
(34, 'umum', '827ccb0eea8a706c4c34a16891f84e7b', 'umum', '', 'Admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `atur_cetak`
--

CREATE TABLE `atur_cetak` (
  `id` int(2) NOT NULL,
  `jenis_font` enum('Times','Arial','','') NOT NULL,
  `ukuran_kertas` enum('A4','Legal','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atur_cetak`
--

INSERT INTO `atur_cetak` (`id`, `jenis_font`, `ukuran_kertas`) VALUES
(1, 'Arial', 'A4');

-- --------------------------------------------------------

--
-- Table structure for table `input_surat_keluar`
--

CREATE TABLE `input_surat_keluar` (
  `id` int(6) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `no_agenda` varchar(7) NOT NULL,
  `isi_ringkas` mediumtext NOT NULL,
  `tujuan` varchar(250) NOT NULL,
  `no_surat` varchar(7) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_catat` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL,
  `pengolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `input_surat_masuk`
--

CREATE TABLE `input_surat_masuk` (
  `id` int(6) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `no_agenda` varchar(7) NOT NULL,
  `indek_berkas` varchar(100) NOT NULL,
  `isi_ringkas` mediumtext NOT NULL,
  `dari` varchar(250) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL,
  `pengolah` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instansi_pengguna`
--

CREATE TABLE `instansi_pengguna` (
  `id` int(1) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kadinkes` varchar(100) NOT NULL,
  `nip_kadinkes` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansi_pengguna`
--

INSERT INTO `instansi_pengguna` (`id`, `nama`, `alamat`, `kadinkes`, `nip_kadinkes`, `logo`) VALUES
(1, 'Dinas Kesehatan OKI', 'Jl. Letnan Muchtar Saleh No.85 Kayu Agung', 'H.M Lubis, SKM M.Kes', '199003262016011001', 'logokabokidinkes.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi_surat`
--

CREATE TABLE `klasifikasi_surat` (
  `id` int(4) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `uraian` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klasifikasi_surat`
--

INSERT INTO `klasifikasi_surat` (`id`, `kode`, `nama`, `uraian`) VALUES
(1, '440', 'Dinas Kesehatan', 'Dinas Kesehatan'),
(2, '800', 'Kepegawaian', 'Kepegawaian'),
(3, '441.1', 'Gizi', 'Gizi'),
(4, '443', 'PPPL', 'PPPL'),
(5, '445', 'Jamsoskes', 'Jamsoskes'),
(6, '441', 'Pembinaan Kesehatan', 'Pembinaan Kesehatan'),
(7, '441.2', 'Mata', 'Pembinaan Kesehatan Mata'),
(8, '441.3', 'Jiwa', 'Pembinaan Kesehatan Jiwa'),
(9, '441.4', 'Kanker', 'Pembinaan Kesehatan Kanker'),
(10, '441.5', 'Usaha Kesehatan Masyarakat (UKS)', 'Pembinaan Kesehatan Usaha Kesehatan Masyarakat (UKS)'),
(11, '441.6', 'Perawatan', 'Pembinaan Kesehatan Perawatan'),
(12, '441.7', 'Penyuluhan Kesehatan Masyarakat (PKM)', 'Pembinaan Kesehatan Penyuluhan Kesehatan Masyarakat (PKM)'),
(13, '441.8', 'Pekan Imunisasi Nasional', 'Pembinaan Kesehatan Pekan Imunisasi Nasional'),
(14, '442', 'Obat - Obatan', 'Obat - Obatan'),
(15, '442.1', 'Pengadaan', 'Pengadaan'),
(16, '442.2', 'Penyimpanan', 'Penyimpanan'),
(17, '443. 1', 'Pencegahan', 'Pencegahan'),
(18, '443.2', 'Pemberantasan dan Pencegahan Penyakit Menular Langsung (P2ML)', 'Pemberantasan dan Pencegahan Penyakit Menular Langsung (P2ML)'),
(19, '443.21', 'Kusta', 'Kusta'),
(20, '443.22', 'Kelamin', 'Kelamin'),
(21, '443.23', 'Frambosia', 'Frambosia'),
(22, '443.24', 'TBC/AIDS/HIV', 'TBC/AIDS/HIV'),
(23, '443.3', 'Epidemiologi', 'Epidemiologi'),
(24, '443.31', 'Kholera', 'Kholera'),
(25, '443.32', 'Survailens', 'Survailens'),
(26, '443.34', 'Rabies (Anjing Gila), Antraks', 'Rabies (Anjing Gila), Antraks'),
(27, '443.4', 'Pemberantasan & Pencegahan Penyakit Menular Sumber Binatang (P2B)', 'Pemberantasan & Pencegahan Penyakit Menular Sumber Binatang (P2B)'),
(28, '443.41', 'Malaria', 'Malaria'),
(29, '443.42', 'Dengue Faemorrhagic Fever (demam Berdarah HDF)', 'Dengue Faemorrhagic Fever (demam Berdarah HDF)'),
(30, '443.43', 'Filaria', 'Filaria'),
(31, '443.44', 'Serangga', 'Serangga'),
(32, '443.5', 'Hygiene Sanitasi', 'Hygiene Sanitasi'),
(33, '443.51', 'Tempat Tempat Pembuatan dan Penjualan Makanan dan Minuman (TPPMM)', 'Tempat Tempat Pembuatan dan Penjualan Makanan dan Minuman (TPPMM)'),
(34, '443.52', 'Sarana Air Minuman dan Jamban Keluarga (Samjiga)', 'Sarana Air Minuman dan Jamban Keluarga (Samjiga)'),
(35, '443.53', 'Pestisida', 'Pestisida'),
(36, '444', 'Gizi', 'Gizi'),
(37, '444.1', 'Kekurangan Makanan Bahaya Kelaparan, Busung Kelaparan', 'Kekurangan Makanan Bahaya Kelaparan, Busung Kelaparan'),
(38, '444.2', 'Keracunan Makanan', 'Keracunan Makanan'),
(39, '444.3', 'Menu Makanan Rakyat', 'Menu Makanan Rakyat'),
(40, '444.4', 'Badan Perbaikan Gizi Daerah (BPGD)', 'Badan Perbaikan Gizi Daerah (BPGD)'),
(41, '444.5', 'Program Makanan Tambahan Anak Sekolah (PMT-AS)', 'Program Makanan Tambahan Anak Sekolah (PMT-AS)'),
(42, '445', 'Rumah Sakit, Balai Kesehatan, PUSKESMAS, PUSKESMAS keliling, Poliklinik', 'Rumah Sakit, Balai Kesehatan, PUSKESMAS, PUSKESMAS keliling, Poliklinik'),
(43, '446', 'Tenaga Medis', 'Tenaga Medis'),
(44, '447', 'Alat Medis', 'Alat Medis'),
(45, '448', 'Pengobatan Tradisional', 'Pengobatan Tradisional'),
(46, '448.1', 'Pijat', 'Pijat'),
(47, '448.2', 'Tusuk Jarum', 'Tusuk Jarum'),
(48, '448.3', 'Jamu Tradisional', 'Jamu Tradisional'),
(49, '448.4', 'Dukun/Paranormal', 'Dukun/Paranormal'),
(50, '900', 'Keuangan', 'Keuangan'),
(51, '850', 'Mutasi', 'Mutasi'),
(52, '822', 'Kenaikan Gaji Berkala', 'Kenaikan Gaji Berkala'),
(53, '823', 'Kenaikan Pangkat', 'Kenaikan Pangkat'),
(54, '005', 'Undangan', 'Undangan');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_parent` int(1) NOT NULL,
  `id_menu` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `icon`, `is_active`, `is_parent`, `id_menu`) VALUES
(1, 'Menu Manajemen', 'menu', 'fa fa-list-alt', 1, 0, 1),
(21, 'Master', '#', 'fa fa-list', 1, 0, 0),
(22, 'Klasifikasi Surat', 'klasifikasi_surat', 'fa fa-circle-o', 1, 21, 0),
(23, 'Input Surat', '#', 'fa fa-random', 1, 0, 0),
(24, 'Surat Masuk', 'input_surat_masuk', 'fa fa-circle-o', 1, 23, 0),
(25, 'Surat Keluar', 'input_surat_keluar', 'fa fa-circle-o', 1, 23, 0),
(26, 'Laporan', '#', 'fa fa-pie-chart', 1, 0, 0),
(27, 'Surat Masuk', 'laporan_surat_masuk', 'fa fa-circle-o', 1, 26, 0),
(28, 'Surat Keluar', 'laporan_surat_keluar', 'fa fa-circle-o', 1, 26, 0),
(29, 'Pengaturan', '#', 'fa fa-laptop', 1, 0, 1),
(30, 'Instansi Pengguna', 'instansi_pengguna/update/1', 'fa fa-circle-o', 1, 29, 1),
(31, 'Manajemen Admin', 'admin', 'fa fa-circle-o', 1, 29, 1),
(32, 'Tampilan Cetak', 'atur_cetak', 'fa fa-circle-o', 1, 29, 1),
(33, 'Backup dan Restore', 'Backup_restore_db/tool', 'fa fa-circle-o', 1, 29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_disposisi`
--

CREATE TABLE `surat_disposisi` (
  `id` int(6) NOT NULL,
  `id_surat` int(6) NOT NULL,
  `kpd_yth` varchar(250) NOT NULL,
  `isi_disposisi` varchar(250) NOT NULL,
  `sifat` enum('Biasa','Segera','Perlu Perhatian Khusus','Perhatian Batas Waktu') NOT NULL,
  `batas_waktu` date NOT NULL,
  `catatan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_disposisi`
--

INSERT INTO `surat_disposisi` (`id`, `id_surat`, `kpd_yth`, `isi_disposisi`, `sifat`, `batas_waktu`, `catatan`) VALUES
(1, 2, 'Kabid Kepegawaian', 'TL pertemuan di propinsi', 'Segera', '2018-10-25', 'segera'),
(2, 4, 'Kabid Kepegawaian', 'tess', 'Biasa', '2018-12-24', 'test'),
(3, 10, 'Kabid Kepegawaian', 'fsdf', 'Biasa', '2018-12-24', 'fsdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atur_cetak`
--
ALTER TABLE `atur_cetak`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `input_surat_keluar`
--
ALTER TABLE `input_surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `input_surat_masuk`
--
ALTER TABLE `input_surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instansi_pengguna`
--
ALTER TABLE `instansi_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klasifikasi_surat`
--
ALTER TABLE `klasifikasi_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_disposisi`
--
ALTER TABLE `surat_disposisi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `atur_cetak`
--
ALTER TABLE `atur_cetak`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `input_surat_keluar`
--
ALTER TABLE `input_surat_keluar`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5552;
--
-- AUTO_INCREMENT for table `input_surat_masuk`
--
ALTER TABLE `input_surat_masuk`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `instansi_pengguna`
--
ALTER TABLE `instansi_pengguna`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `klasifikasi_surat`
--
ALTER TABLE `klasifikasi_surat`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `surat_disposisi`
--
ALTER TABLE `surat_disposisi`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

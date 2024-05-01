-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 01, 2024 at 05:32 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sppd`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `idpegawai` int NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nip` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `pangkat` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `jabatan` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `bidang` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `instansi` varchar(60) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pegawai`
--

INSERT INTO `data_pegawai` (`idpegawai`, `nama`, `nip`, `pangkat`, `jabatan`, `bidang`, `instansi`) VALUES
(1, 'Akhmad Bestari,S.H.,M.H', '197405081999031004', 'Pembina Utama Muda', 'Kepala Dinas', 'Sekretariat', 'Dinas Kehutanan Provinsi Jambi'),
(2, 'M Dudan Dwi Ariansyah', '-', '-', 'PTT pada bidang Program dan Evaluasi', 'Program dan Evaluasi', 'Dinas Kehutanan Provinsi Jambi'),
(5, 'Oszy Nurul Azmi', '-', '-', 'PTT pada Bidang Program dan Evaluasi', 'Program dan Evaluasi', 'Dinas Kehutanan Provinsi Jambi'),
(10, 'Nero Reytama A', '-', '-', 'PTT pada Bidang Program dan Evaluasi', 'Umum dan Kepegawaian', 'Dinas Kehutanan Provinsi Jambi'),
(11, 'Oackleys', '-', '-', 'PTT pada Bidang Program dan Evaluasi', 'PPMHA', 'Dinas Kehutanan Provinsi Jambi'),
(12, 'Yazel Fatra, S.P', '197101192000031001 ', 'Pembina Tk. I / IV.b', 'Sekretaris Dinas Kehutanan', 'Sekretariat', 'Dinas Kehutanan Provinsi Jambi'),
(13, 'H. Gushendra, S.H', '197008112000121001', 'Pembina Tk. I / IV.b', 'Kepala Bidang PKSDAE', 'KSDAE', 'Dinas Kehutanan Provinsi Jambi'),
(14, 'Bambang Yulisman, S.Hut', '198107092006041007', 'Pembina / IV.a', 'Kepala Bidang PPMHA', 'PPMHA', 'Dinas Kehutanan Provinsi Jambi'),
(15, 'Marino,S.STP.M.A.P', '198703302006021001', 'Pembina / IV.a', 'Kepala Bidang DAS & RHL', 'DAS dan RHL', 'Dinas Kehutanan Provinsi Jambi'),
(16, 'H. Andri Yushar Andria, S.Hut, M.Si', '197111292000031002', 'Pembina Tk. I / IV.b', 'Kepala Bidang PPH', 'PPH', 'Dinas Kehutanan Provinsi Jambi'),
(17, 'H. Mirza Unsury,S.Sos,M.Si', '197005111990021002', 'Pembina / IV.a', 'Kasi PNBP', 'PPH', 'Dinas Kehutanan Provinsi Jambi'),
(18, 'Donny Osmond,S.H., M.H', '197502091998031004', 'Penata Tk. I / III.d', 'Kasi Pengendalian Kebakaran Hutan dan Lahan', 'KSDAE', 'Dinas Kehutanan Provinsi Jambi'),
(19, 'Shinta Octora, S.Pt', '197804282010012010', 'Penata Tk. I / III.d', 'Kasubbag Program dan Evaluasi', 'Program dan Evaluasi', 'Dinas Kehutanan Provinsi Jambi'),
(20, 'Anna Helena,SE', '197204141992032007', 'Penata Tk. I / III.d', 'Analis Perencanaan dan Penganggaran Pada Subbag Program dan ', 'Program dan Evaluasi', 'Dinas Kehutanan Provinsi Jambi'),
(21, 'Nurhasanah, S.Hut', '198306232015032001', 'Penata Muda Tk. I / III.b', 'Analis Rehabilitasi Hutan dan Lahan', 'DAS dan RHL', 'Dinas Kehutanan Provinsi Jambi');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `idkegiatan` int NOT NULL,
  `norek` int NOT NULL,
  `namakegiatan` varchar(300) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`idkegiatan`, `norek`, `namakegiatan`) VALUES
(1, 0, 'Evaluasi Kinerja Perangkat Daerah'),
(2, 1232111, 'Penyiapan dan Pengembangan Perhutanan Sosial'),
(4, 1, 'Penyediaan Komponen Instalasi Listrik/Penerangan Bangunan Kantor Tahun Anggaran 2023'),
(5, 2, 'Pengendalian dan Pengawasan Tumbuhan dan Satwa Liar yang tidak Dilindungi dan/atau Tidak Masuk dalam Lampiran CITES Tahun Anggaran 2023'),
(6, 3, 'Pelaksanaan Penatausahaan dan Penguji/Verifikasi Keuangan SKPD Tahun Anggaran 2023'),
(7, 4, 'Penyusunan dan Penetapan Rencana Pengelolaan DAS Tahun Anggaran 2023');

-- --------------------------------------------------------

--
-- Table structure for table `kwitansi`
--

CREATE TABLE `kwitansi` (
  `idkwitansi` int NOT NULL,
  `nosppd` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggalspd` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggalkwt` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `uraianpengeluaran` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `keteranganperjalanan` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `harian` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `satuanharian` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `transport` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `subdana` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `tp1` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `satuan1` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `kettp1` text COLLATE utf8mb4_general_ci NOT NULL,
  `tp2` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `satuan2` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `kettp2` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `tp3` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `satuan3` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `kettp3` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `tp4` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `satuan4` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `kettp4` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `tp5` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `satuan5` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `kettp5` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `keteranganbbm` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `liter` varchar(13) COLLATE utf8mb4_general_ci NOT NULL,
  `hargaliter` varchar(6) COLLATE utf8mb4_general_ci NOT NULL,
  `keteranganliter` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `ketpen1` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `satuanpen1` varchar(13) COLLATE utf8mb4_general_ci NOT NULL,
  `hargapen1` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `keteranganpen11` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `hotel1` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `addon1` enum('ya','tidak') COLLATE utf8mb4_general_ci NOT NULL,
  `ketpen2` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `satuanpen2` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `hargapen2` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `hotel2` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `addon2` enum('ya','tidak') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kwitansi`
--

INSERT INTO `kwitansi` (`idkwitansi`, `nosppd`, `tanggalspd`, `tanggalkwt`, `uraianpengeluaran`, `keteranganperjalanan`, `harian`, `satuanharian`, `transport`, `subdana`, `tp1`, `satuan1`, `kettp1`, `tp2`, `satuan2`, `kettp2`, `tp3`, `satuan3`, `kettp3`, `tp4`, `satuan4`, `kettp4`, `tp5`, `satuan5`, `kettp5`, `keteranganbbm`, `liter`, `hargaliter`, `keteranganliter`, `ketpen1`, `satuanpen1`, `hargapen1`, `keteranganpen11`, `hotel1`, `addon1`, `ketpen2`, `satuanpen2`, `hargapen2`, `hotel2`, `addon2`) VALUES
(1, '111/Dishut-1.1/XI/2023', '13 Maret 2024', '2024-05-01', 'Perjalanan Dinas Biasa', 'uang harian pada asn', '2', '370000', 'umum', 'APBN', '1', '70000', 'Tiket jambi - kerinci', '2', '120000', 'Tiket jambi - kerinci', '', '', '', '', '', '', '', '', '', 'Mobil Dinas Bh xxxx BBM Pertalite', '100', '14500', '', 'penginapan 1 malam di kerinci', '1', '370000', '', 'hotel 1', 'ya', 'penginapan 1 malam di kerinci', '1', '500000', 'hotel2', 'tidak'),
(2, '121/dishut/2024', '14 maret 2024', '2024-05-01', 'Perjalanan Dinas Biasa', 'uang harian pada non asn', '1', '370000', 'umum', '', '1', '70000', 'Tiket jambi - kerinci', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'penginapan 1 malam di kerinci', '1', '450000', '', '0', 'ya', 'penginapan 1 malam di kerinci', '1', '400000', '0', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `idlaporan` int NOT NULL,
  `nosurat` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `dari` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `perihal` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `isi` varchar(350) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`idlaporan`, `nosurat`, `tanggal`, `dari`, `perihal`, `isi`, `nama`) VALUES
(1, '911/DISHUT-1.1/XI/2023', '2023-12-24', 'Sekretaris', 'Laporan Perjalanan Dinas ke Tanjung jabung timur', 'asdljhasjdhjsakhdjksahdksahdkjashdjsakhdjsakhd', 'Akhmad Bestari,S.H.,M.H'),
(3, '911/DISHUT-1.1/XI/2023', '2023-12-26', 'Program dan Evaluasi', 'Laporan Perjalanan Dinas Dalam rangka melakukan monev di Tanjabbar A.n Nero Dkk ', 'asldk;lsak d;lajsdkl jaskldj askljdksal jdklsaj dklsajdkl asjdkl asjdkl jaskld jaslkd jsalkj dsakljd laskjdklsaj kldasjl kasjdlksaj dklsaj dlsakjd lkasjd klsajdklsa jldksaj dklsajd klsajkl djsakld jsalkdj skjd sakljdksjd klassjdlasj dlsajdlsakjdlsakjdlkasj lsajdlk asjdklj salkdjlsaj askdjals jdlasj dlkasj lkdjas kljsalkdj salkjd sakljd lsakjdkl asj', 'Nero Reytama A');

-- --------------------------------------------------------

--
-- Table structure for table `listsppd`
--

CREATE TABLE `listsppd` (
  `idsppd` int NOT NULL,
  `nosurat` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `nip` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `pangkat` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `jabatan` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `bidang` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `idpegawai` int NOT NULL,
  `golongan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tujuan` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `tingkatgolongan` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `dalamrangka` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `kendaraan` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tempatasal` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tujuanpelaksanaan` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `tgglpelaksana` date NOT NULL,
  `tanggalkembali` date NOT NULL,
  `totalpelaksanaan` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `subkegiatan` varchar(350) COLLATE utf8mb4_general_ci NOT NULL,
  `instansi` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `norek` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `pptk` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `pangkatpptk` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `nippptk` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `listsppd`
--

INSERT INTO `listsppd` (`idsppd`, `nosurat`, `nama`, `tanggal`, `nip`, `pangkat`, `jabatan`, `bidang`, `idpegawai`, `golongan`, `tujuan`, `tingkatgolongan`, `dalamrangka`, `kendaraan`, `tempatasal`, `tujuanpelaksanaan`, `tgglpelaksana`, `tanggalkembali`, `totalpelaksanaan`, `subkegiatan`, `instansi`, `norek`, `pptk`, `pangkatpptk`, `nippptk`) VALUES
(15, '111/Dishut-1.1/XI/2023', 'Akhmad Bestari,S.H.,M.H', '2024-03-27', '197405081999031004', 'Pembina Utama Muda', 'Kepala Dinas', 'Sekretariat', 0, '', '', 'C', 'Melaksanakan perjalanan dinas dalam rangka pendampingan dan penyusunan Rencana Anggara Biaya (RAB) Kegiatan RBP REDD+ pada UPTD KPHP Hulu Sarolangun, Unit VII,UPTD KPHP Tebo Barat Unit IX, dan UPTD KPHP Tebo Timur Unit X.', 'Kendaraan Umum', 'Jambi', 'Tanjung Jabung Barat', '2024-03-28', '2024-03-30', '3 Hari', 'Pengendalian', 'Dinas Kehutanan Provinsi Jambi', '12452143214', 'Akhmad Bestari,S.H.,M.H', 'Pembina Utama Muda', '197405081999031004'),
(16, '911/DISHUT-1.1/XI/2023', 'Oszy Nurul Azmi', '2024-11-23', '-', '-', 'PTT pada Bidang Program dan Evaluasi', 'Program dan Evaluasi', 0, '', '', 'F', 'Melaksanakan Perjalanan dinas dalam rangka monev evaluasi pada UPTD KPHP Tanjung Jabung Barat Unit XIV Tahun Anggaran 2023 sadsa sadsadsa dsadsa dsa dsa dsa dsa dsa dsa dsa sad as sad sa dsa dsa dsa adsa sa dsa sa dsa dsa sda dsa sad', 'Kendaraan Umum', 'Jambi', 'Tanjung Jabung Barat', '2023-11-26', '2023-11-28', '3 Hari', 'Evaluasi', 'Dinas Kehutanan Provinsi Jambi', '0', 'Akhmad Bestari,S.H.,M.H', 'Pembina Utama Muda', '197405081999031004'),
(17, '221/Dishut-1.1/XI/2023', 'Nero Reytama A', '2002-12-23', '-', '-', 'PTT pada Bidang Program dan Evaluasi', 'Umum dan Kepegawaian', 0, '', '', 'F', 'Melaksanakan Perjalanan dinas dalam rangka monev evaluasi pada UPTD KPHP Tanjung Jabung Barat Unit XIV Tahun Anggaran 2023 sadsa sadsadsa dsadsa dsa dsa dsa dsa dsa dsa dsa sad as sad sa dsa dsa dsa adsa sa dsa sa dsa dsa sda dsa sad', 'Kendaraan Umum', 'Jambi', '', '2023-12-03', '2023-12-05', '3 Hari', 'Evaluasi Kinerja Perangkat Daerah', 'Dinas Kehutanan Provinsi Jambi', '12452143214', 'Akhmad Bestari,S.H.,M.H', 'Pembina Utama Muda', '197405081999031004'),
(19, '611/DISHUT-1.1/XI/2023', 'Yazel Fatra, S.P', '2023-12-16', '197101192000031001 ', 'Pembina Tk. I / IV.b', 'Sekretaris Dinas Kehutanan', 'Sekretariat', 0, '', '', 'C', 'Melaksanakan Perjalanan dinas dalam rangka monev evaluasi pada UPTD KPHP Tanjung Jabung Barat Unit XIV Tahun Anggaran 2023 sadsa sadsadsa dsadsa dsa dsa dsa dsa dsa dsa dsa sad as sad sa dsa dsa dsa adsa sa dsa sa dsa dsa sda dsa sad	', 'Mobil Dinas', 'Jambi', 'UPTD KPHP', '2023-12-16', '2023-12-18', '3 Hari', 'Evaluasi', 'Dinas Kehutanan Provinsi Jambi', '12452143214', 'Shinta Octora, S.Pt', 'Penata Tk. I / III.d', '197804282010012010'),
(20, '612/DISHUT-3.1/XI/2023', 'H. Gushendra, S.H', '2016-12-23', '197008112000121001', 'Pembina Tk. I / IV.b', 'Kepala Bidang PKSDAE', 'KSDAE', 0, '', '', 'C', 'Melaksanakan Perjalanan dinas dalam rangka monev evaluasi pada UPTD KPHP Tanjung Jabung Barat Unit XIV Tahun Anggaran 2023 sadsa sadsadsa dsadsa dsa dsa dsa dsa dsa dsa dsa sad as sad sa dsa dsa dsa adsa sa dsa sa dsa dsa sda dsa sad', 'Mobil Dinas', 'Jambi', '', '2023-12-16', '2023-12-18', '3 Hari', 'Evaluasi Kinerja Perangkat Daerah', 'Dinas Kehutanan Provinsi Jambi', '12452143214', 'Shinta Octora, S.Pt', 'Penata Tk. I / III.d', '197804282010012010'),
(24, '021/Dishut/2024', 'Akhmad Bestari,S.H.,M.H', '2024-03-22', '197405081999031004', 'Pembina Utama Muda', 'Kepala Dinas', 'Sekretariat', 0, '', '', 'C', 'asdsadas dsd asdsad asd asdas dsa dsad sadas dsad', 'Kendaraan Umum', 'Jambi', 'Jakarta', '2024-03-22', '2024-03-23', '3 Hari', 'Evaluasi Kinerja Perangkat Daerah', 'Dinas Kehutanan', '12312312321321 3213213', 'Yazel Fatra, S.P', 'Pembina Tk. I / IV.b', '197101192000031001 '),
(25, '025/Dishut/2024', 'M Dudan Dwi Ariansyah', '2024-03-22', '-', '-', 'PTT pada bidang Program dan Evaluasi', 'Sekretariat', 0, '', '', 'F', 'Melaksanakan perjalanan dinas dalam rangka pendampingan dan penyusunan Rencana Anggara Biaya (RAB) Kegiatan RBP REDD+ pada UPTD KPHP Hulu Sarolangun, Unit VII,UPTD KPHP Tebo Barat Unit IX, dan UPTD KPHP Tebo Timur Unit X.', 'Kendaraan Umum', 'Jambi', 'UPTD KPHP Hulu Sarolangun, Unit VII,UPTD KPHP Tebo Barat Unit IX, dan UPTD KPHP Tebo Timur Unit X.', '2024-03-23', '2024-03-25', '3 Hari', 'Pengendalian dan Pengawasan Tumbuhan dan Satwa Liar yang tidak Dilindungi dan/atau Tidak Masuk dalam Lampiran CITES Tahun Anggaran 2023', 'Dinas Kehutanan', '12312222111', 'Yazel Fatra, S.P', 'Pembina Tk. I / IV.b', '197101192000031001 ');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `iduser` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `level` enum('ADMIN','OPERATOR','KEPALA','') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`iduser`, `username`, `password`, `level`) VALUES
(3, 'admin', 'admin', 'ADMIN'),
(4, 'operator', 'operator', 'OPERATOR'),
(7, 'dudan', 'dwidudan132', 'OPERATOR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`idpegawai`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`idkegiatan`);

--
-- Indexes for table `kwitansi`
--
ALTER TABLE `kwitansi`
  ADD PRIMARY KEY (`idkwitansi`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`idlaporan`);

--
-- Indexes for table `listsppd`
--
ALTER TABLE `listsppd`
  ADD PRIMARY KEY (`idsppd`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `idpegawai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `idkegiatan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kwitansi`
--
ALTER TABLE `kwitansi`
  MODIFY `idkwitansi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `idlaporan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `listsppd`
--
ALTER TABLE `listsppd`
  MODIFY `idsppd` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `iduser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

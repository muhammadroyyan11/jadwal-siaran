-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 25, 2024 at 10:15 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jadwal_siaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int NOT NULL,
  `nama_penyiar` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `check_in_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `check_out_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `nama_penyiar`, `tanggal`, `check_in_time`, `check_out_time`) VALUES
(44, 'Abdi', '2024-08-21', '2024-08-21 11:05:03', '19:05:03'),
(45, 'Abdi', '2024-08-21', '2024-08-21 11:05:22', '19:05:22'),
(46, 'Abdi', '2024-08-21', '2024-08-21 18:11:58', '02:11:58'),
(47, 'Abdi', '2024-08-23', '2024-08-23 01:14:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `acara`
--

CREATE TABLE `acara` (
  `id_acara` int NOT NULL,
  `nama_acara` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `durasi` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acara`
--

INSERT INTO `acara` (`id_acara`, `nama_acara`, `durasi`) VALUES
(2, 'Music Live', '5 menit'),
(3, 'Buka siaran', '5 Menit');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int NOT NULL,
  `tgl_berita` date NOT NULL,
  `tema` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `sumber` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `berita_lengkap` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `tgl_berita`, `tema`, `judul`, `sumber`, `berita_lengkap`) VALUES
(1, '2024-08-01', 'SPORTS', 'Bintang Virgil van Dijk Pastikan Liverpool akan Rekrut Beberapa Pemain Baru.', 'INDOZONE', 'https://soccer.indozone.id/bintang/984967686/virgil-van-dijk-pastikan-liverpool-akan-rekrut-beberapa');

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi`
--

CREATE TABLE `evaluasi` (
  `evaluasi_id` int NOT NULL,
  `tgl_evaluasi` date NOT NULL,
  `daypart` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_penyiar` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `evaluasi` varchar(120) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evaluasi`
--

INSERT INTO `evaluasi` (`evaluasi_id`, `tgl_evaluasi`, `daypart`, `nama_penyiar`, `evaluasi`) VALUES
(3, '2024-08-21', 'Daypart 1', 'Abdi', 'Absensi tepat waktu, sesuai jadwal penyiar,membacakan berita sesuai tema dan sesuai tanggal berita'),
(4, '2024-08-21', 'Daypart 2', 'Abdillah', 'Absensi tepat waktu, sesuai jadwal penyiar,membacakan berita sesuai tema dan sesuai tanggal berita');

-- --------------------------------------------------------

--
-- Table structure for table `ganti_jadwal`
--

CREATE TABLE `ganti_jadwal` (
  `id_ganti` int NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `nama_penyiar` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `dari_tanggal` date NOT NULL,
  `menjadi_tanggal` date NOT NULL,
  `dari_daypart` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `menjadi_daypart` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ganti_jadwal`
--

INSERT INTO `ganti_jadwal` (`id_ganti`, `tgl_pengajuan`, `nama_penyiar`, `dari_tanggal`, `menjadi_tanggal`, `dari_daypart`, `menjadi_daypart`) VALUES
(11, '2024-08-20', 'Abdi', '2024-08-20', '2024-08-21', 'Daypart 1', 'Daypart 2'),
(12, '2024-08-21', 'Abdillah', '2024-08-21', '2024-08-22', 'Daypart 1', 'Daypart 3');

-- --------------------------------------------------------

--
-- Table structure for table `grup_kuisioner`
--

CREATE TABLE `grup_kuisioner` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `grup_kuisioner`
--

INSERT INTO `grup_kuisioner` (`id`, `nama`) VALUES
(1, 'Kualitas Siaran'),
(2, 'Penyampaian Penyiar');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_survey`
--

CREATE TABLE `hasil_survey` (
  `id_hasil` int NOT NULL,
  `survey_id` int NOT NULL,
  `responden_id` int NOT NULL,
  `jawaban` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hasil_survey`
--

INSERT INTO `hasil_survey` (`id_hasil`, `survey_id`, `responden_id`, `jawaban`) VALUES
(9, 1, 14, 'A'),
(10, 1, 14, 'B'),
(11, 2, 14, 'C'),
(12, 2, 14, 'D'),
(13, 1, 15, 'A'),
(14, 1, 15, 'B'),
(15, 2, 15, 'C'),
(16, 2, 15, 'D'),
(17, 1, 16, 'A'),
(18, 3, 16, 'B'),
(19, 2, 16, 'C'),
(20, 4, 16, 'D'),
(21, 1, 17, 'A'),
(22, 3, 17, 'B'),
(23, 2, 17, 'C'),
(24, 4, 17, 'D'),
(25, 1, 18, 'A'),
(26, 3, 18, 'B'),
(27, 2, 18, 'C'),
(28, 4, 18, 'D'),
(29, 1, 19, 'E'),
(30, 3, 19, 'D'),
(31, 2, 19, 'E'),
(32, 4, 19, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `interaksi`
--

CREATE TABLE `interaksi` (
  `interaksi_id` int NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pendengar` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_platform` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `interaksi` varchar(150) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interaksi`
--

INSERT INTO `interaksi` (`interaksi_id`, `tanggal`, `nama_pendengar`, `jenis_platform`, `interaksi`) VALUES
(2, '2024-08-11', 'Abdi', 'Telepon', 'Pada Segmen telpon dengan pendengar, pendengar membahas tentang keadaan di daerahnya');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_penyiar`
--

CREATE TABLE `jadwal_penyiar` (
  `id_jadwal` int NOT NULL,
  `tgl_jadwal` date NOT NULL,
  `daypart1` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `daypart2` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `daypart3` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `daypart4` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_penyiar`
--

INSERT INTO `jadwal_penyiar` (`id_jadwal`, `tgl_jadwal`, `daypart1`, `daypart2`, `daypart3`, `daypart4`) VALUES
(2, '2024-08-07', 'Ridhwan', 'Iki', 'Nida', 'Wahyu');

-- --------------------------------------------------------

--
-- Table structure for table `malam`
--

CREATE TABLE `malam` (
  `id_malam` int NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_mulai` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `waktu_selesai` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_penyiar` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_narasumber` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_acara` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `topik` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `malam`
--

INSERT INTO `malam` (`id_malam`, `tanggal`, `waktu_mulai`, `waktu_selesai`, `nama_penyiar`, `nama_narasumber`, `nama_acara`, `topik`, `status`) VALUES
(1, '2024-08-16', '01:00', '01:05', 'Abdillah', 'Wahyu', 'Buka siaran', 'apa saja', 'Terlaksana'),
(2, '2024-08-16', '03:49', '03:49', 'Abdillah', 'Wahyu 12', 'Buka siaran', 'apa saja', 'Belum Terlaksana');

-- --------------------------------------------------------

--
-- Table structure for table `narasumber`
--

CREATE TABLE `narasumber` (
  `id_narasumber` int NOT NULL,
  `tanggal` date NOT NULL,
  `nama_narasumber` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_acara` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `narasumber`
--

INSERT INTO `narasumber` (`id_narasumber`, `tanggal`, `nama_narasumber`, `nama_acara`) VALUES
(2, '2024-08-14', 'Abdillah', 'Music Live'),
(5, '2024-08-15', 'Wahyu', 'Buka siaran'),
(7, '2024-08-15', 'Abdillah', 'Buka siaran'),
(8, '2024-08-15', 'Wahyu 12', 'Buka siaran');

-- --------------------------------------------------------

--
-- Table structure for table `responden`
--

CREATE TABLE `responden` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `domisili` varchar(30) NOT NULL,
  `saran` text NOT NULL,
  `survey_id` int NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `responden`
--

INSERT INTO `responden` (`id`, `nama`, `domisili`, `saran`, `survey_id`, `created_at`) VALUES
(1, 'asd', 'asdasd', '', 1, '2024-08-25'),
(2, 'asd', 'asdasd', '', 1, '2024-08-25'),
(3, 'asass', 'asdasd', '', 1, '2024-08-25'),
(4, 'asass', 'asdasd', '', 1, '2024-08-25'),
(5, 'asass', 'asdasd', '', 1, '2024-08-25'),
(6, 'asass', 'asdasd', '', 1, '2024-08-25'),
(7, 'asass', 'asdasd', '', 1, '2024-08-25'),
(8, 'asass', 'asdasd', '', 1, '2024-08-25'),
(9, 'asass', 'asdasd', '', 1, '2024-08-25'),
(10, 'asass', 'asdasd', '', 1, '2024-08-25'),
(11, 'asass', 'asdasd', '', 1, '2024-08-25'),
(12, 'asass', 'asdasd', '', 1, '2024-08-25'),
(13, 'asass', 'asdasd', '', 1, '2024-08-25'),
(14, 'Jansen', 'Kotalama', '', 1, '2024-08-25'),
(15, 'Jansen', 'Kotalama', '', 1, '2024-08-25'),
(16, 'Jansen', 'Kotalama', '', 1, '2024-08-25'),
(17, 'Jansen', 'Kotalama', '', 1, '2024-08-25'),
(18, 'Jansen', 'Kotalama', '', 1, '2024-08-25'),
(19, 'Abdul', 'Mekah', '', 1, '2024-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `siang`
--

CREATE TABLE `siang` (
  `id_siang` int NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_mulai` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `waktu_selesai` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_penyiar` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_narasumber` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_acara` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `topik` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siang`
--

INSERT INTO `siang` (`id_siang`, `tanggal`, `waktu_mulai`, `waktu_selesai`, `nama_penyiar`, `nama_narasumber`, `nama_acara`, `topik`, `status`) VALUES
(2, '2024-08-16', '01:08', '01:09', 'Abdi', 'Abdillah.', 'Music Live', 'apa saja', 'Belum Terlaksana');

-- --------------------------------------------------------

--
-- Table structure for table `sore`
--

CREATE TABLE `sore` (
  `id_sore` int NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_mulai` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `waktu_selesai` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_penyiar` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_narasumber` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_acara` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `topik` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sore`
--

INSERT INTO `sore` (`id_sore`, `tanggal`, `waktu_mulai`, `waktu_selesai`, `nama_penyiar`, `nama_narasumber`, `nama_acara`, `topik`, `status`) VALUES
(2, '2024-08-16', '01:03', '01:03', 'Abdillah', 'Udin', 'Music Live', 'apa saja', 'Terlaksana');

-- --------------------------------------------------------

--
-- Table structure for table `sound`
--

CREATE TABLE `sound` (
  `id_sound` int NOT NULL,
  `genre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sound`
--

INSERT INTO `sound` (`id_sound`, `genre`, `judul`) VALUES
(2, 'K-POP', 'NewJeans - Bubblegum');

-- --------------------------------------------------------

--
-- Table structure for table `spada`
--

CREATE TABLE `spada` (
  `id_spada` int NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_mulai` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `waktu_selesai` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_penyiar` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_narasumber` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_acara` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `topik` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spada`
--

INSERT INTO `spada` (`id_spada`, `tanggal`, `waktu_mulai`, `waktu_selesai`, `nama_penyiar`, `nama_narasumber`, `nama_acara`, `topik`, `status`) VALUES
(1, '0000-00-00', '', '', '', '', '', '', 'Belum Terlaksana'),
(3, '2024-08-16', '02:56', '02:56', 'Abdillah', 'Wahyu 12', 'Buka siaran', 'apa saja', 'Terlaksana');

-- --------------------------------------------------------

--
-- Table structure for table `survey_description`
--

CREATE TABLE `survey_description` (
  `id_survey` int NOT NULL,
  `pertanyaan` text NOT NULL,
  `grup_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `survey_description`
--

INSERT INTO `survey_description` (`id_survey`, `pertanyaan`, `grup_id`) VALUES
(1, 'Apakah Saya ganteng ? ', 1),
(2, 'Seruis Saya Ganteng ? ', 2),
(3, 'Apa itu baju ?', 1),
(4, 'Dimana tempat parkir ?', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_foto` varchar(100) DEFAULT NULL,
  `user_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_foto`, `user_level`) VALUES
(21, 'Abdi', 'dillah11', '81dc9bdb52d04dc20036dbd8313ed055', '', 'Penyiar'),
(23, 'Abdillah', 'dillah22', '7815696ecbf1c96e6894b779456d330e', '', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id_acara`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `evaluasi`
--
ALTER TABLE `evaluasi`
  ADD PRIMARY KEY (`evaluasi_id`);

--
-- Indexes for table `ganti_jadwal`
--
ALTER TABLE `ganti_jadwal`
  ADD PRIMARY KEY (`id_ganti`);

--
-- Indexes for table `grup_kuisioner`
--
ALTER TABLE `grup_kuisioner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_survey`
--
ALTER TABLE `hasil_survey`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `survey_id` (`survey_id`),
  ADD KEY `responden_id` (`responden_id`);

--
-- Indexes for table `interaksi`
--
ALTER TABLE `interaksi`
  ADD PRIMARY KEY (`interaksi_id`);

--
-- Indexes for table `jadwal_penyiar`
--
ALTER TABLE `jadwal_penyiar`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `malam`
--
ALTER TABLE `malam`
  ADD PRIMARY KEY (`id_malam`);

--
-- Indexes for table `narasumber`
--
ALTER TABLE `narasumber`
  ADD PRIMARY KEY (`id_narasumber`);

--
-- Indexes for table `responden`
--
ALTER TABLE `responden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `survey_id` (`survey_id`);

--
-- Indexes for table `siang`
--
ALTER TABLE `siang`
  ADD PRIMARY KEY (`id_siang`);

--
-- Indexes for table `sore`
--
ALTER TABLE `sore`
  ADD PRIMARY KEY (`id_sore`);

--
-- Indexes for table `sound`
--
ALTER TABLE `sound`
  ADD PRIMARY KEY (`id_sound`);

--
-- Indexes for table `spada`
--
ALTER TABLE `spada`
  ADD PRIMARY KEY (`id_spada`);

--
-- Indexes for table `survey_description`
--
ALTER TABLE `survey_description`
  ADD PRIMARY KEY (`id_survey`),
  ADD KEY `grup_id` (`grup_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `acara`
--
ALTER TABLE `acara`
  MODIFY `id_acara` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `evaluasi`
--
ALTER TABLE `evaluasi`
  MODIFY `evaluasi_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ganti_jadwal`
--
ALTER TABLE `ganti_jadwal`
  MODIFY `id_ganti` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `grup_kuisioner`
--
ALTER TABLE `grup_kuisioner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hasil_survey`
--
ALTER TABLE `hasil_survey`
  MODIFY `id_hasil` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `interaksi`
--
ALTER TABLE `interaksi`
  MODIFY `interaksi_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal_penyiar`
--
ALTER TABLE `jadwal_penyiar`
  MODIFY `id_jadwal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `malam`
--
ALTER TABLE `malam`
  MODIFY `id_malam` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `narasumber`
--
ALTER TABLE `narasumber`
  MODIFY `id_narasumber` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `responden`
--
ALTER TABLE `responden`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `siang`
--
ALTER TABLE `siang`
  MODIFY `id_siang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sore`
--
ALTER TABLE `sore`
  MODIFY `id_sore` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sound`
--
ALTER TABLE `sound`
  MODIFY `id_sound` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spada`
--
ALTER TABLE `spada`
  MODIFY `id_spada` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `survey_description`
--
ALTER TABLE `survey_description`
  MODIFY `id_survey` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil_survey`
--
ALTER TABLE `hasil_survey`
  ADD CONSTRAINT `hasil_survey_ibfk_1` FOREIGN KEY (`survey_id`) REFERENCES `survey_description` (`id_survey`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `hasil_survey_ibfk_2` FOREIGN KEY (`responden_id`) REFERENCES `responden` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `responden`
--
ALTER TABLE `responden`
  ADD CONSTRAINT `responden_ibfk_1` FOREIGN KEY (`survey_id`) REFERENCES `survey_description` (`id_survey`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `survey_description`
--
ALTER TABLE `survey_description`
  ADD CONSTRAINT `survey_description_ibfk_1` FOREIGN KEY (`grup_id`) REFERENCES `grup_kuisioner` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

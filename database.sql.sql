-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2021 at 04:37 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujianonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_jabatan`
--

CREATE TABLE `master_jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_jabatan`
--

INSERT INTO `master_jabatan` (`id`, `nama`) VALUES
(1, 'admin'),
(2, 'murid');

-- --------------------------------------------------------

--
-- Table structure for table `master_judul_ujian`
--

CREATE TABLE `master_judul_ujian` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `id_master_kelas` int(11) NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `durasi` int(11) NOT NULL,
  `kesempatan` int(11) NOT NULL,
  `warna` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_judul_ujian`
--

INSERT INTO `master_judul_ujian` (`id`, `nama`, `deskripsi`, `id_master_kelas`, `tanggal_awal`, `tanggal_akhir`, `durasi`, `kesempatan`, `warna`, `timestamp`, `is_active`) VALUES
(1, 'IPA', 'Ilmu Pengetahuan Alam', 1, '2021-06-06', '2021-06-08', 60, 3, '#7d1fa8', '2021-06-06 15:35:54', 1),
(2, 'Bahasa Indonesia', 'Pelajaran Bahasa dan Sosial', 1, '2021-06-04', '2021-06-11', 60, 2, '#43d0d0', '2021-06-06 15:19:04', 1),
(3, 'Matematika', 'Menghitung Angka', 1, '2021-06-01', '2021-06-04', 60, 2, '#f6e823', '2021-06-07 07:35:14', 1),
(4, 'Bahasa Inggris', 'Tenses', 2, '2021-06-15', '2021-06-17', 60, 2, '#5397df', '2021-06-07 07:36:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_kelas`
--

CREATE TABLE `master_kelas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_kelas`
--

INSERT INTO `master_kelas` (`id`, `nama`, `is_active`) VALUES
(1, 'Kelas 1', 1),
(2, 'Kelas 2', 1),
(3, 'Kelas 3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_soal_ujian`
--

CREATE TABLE `master_soal_ujian` (
  `id` int(11) NOT NULL,
  `id_master_judul_ujian` int(11) NOT NULL,
  `soal` text NOT NULL,
  `soal_gambar` varchar(255) DEFAULT NULL,
  `pilihan_a` text NOT NULL,
  `pilihan_a_gambar` varchar(255) DEFAULT NULL,
  `pilihan_b` text NOT NULL,
  `pilihan_b_gambar` varchar(255) DEFAULT NULL,
  `pilihan_c` text NOT NULL,
  `pilihan_c_gambar` varchar(255) DEFAULT NULL,
  `pilihan_d` text NOT NULL,
  `pilihan_d_gambar` varchar(255) DEFAULT NULL,
  `jawaban` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_soal_ujian`
--

INSERT INTO `master_soal_ujian` (`id`, `id_master_judul_ujian`, `soal`, `soal_gambar`, `pilihan_a`, `pilihan_a_gambar`, `pilihan_b`, `pilihan_b_gambar`, `pilihan_c`, `pilihan_c_gambar`, `pilihan_d`, `pilihan_d_gambar`, `jawaban`, `is_active`, `timestamp`) VALUES
(1, 1, 'Proses pembuatan ikan asin dapat dilakukan dengan menggunakan?', '', 'Teknologi sederhana', '', 'Teknologi modern', '', 'Teknologi  Canggih', '', 'Teknologi Paling Canggih', '', 1, 1, '2021-06-06 15:16:04'),
(2, 1, 'Daun sirih dapat dimanfaatkan untuk mengobati orang yang sedang?', '', 'Diare', '', 'Mimisan', '', 'Demam', '', 'Batuk', '', 2, 1, '2021-06-06 15:17:36'),
(3, 1, 'Agar dapat tumbuh subur maka tanaman perlu di?', '', 'Jemur', '', 'Semprot', '', 'Siram', '', 'Lempar', '', 3, 1, '2021-06-06 15:20:35'),
(4, 1, 'Daur hidup pada tanaman padi dimulai dari?', '', 'Bunga', '', 'Gabah', '', 'Batang', '', 'Beras', '', 4, 1, '2021-06-06 15:21:41'),
(5, 1, 'Bagian tumbuhan yang berfungsi menyerap air dan mineral dan dalam tanah adalah?', '', 'Batang', '', 'Akar', '', 'Bunga', '', 'Daun', '', 2, 1, '2021-06-06 15:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `master_user`
--

CREATE TABLE `master_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `kelamin` tinyint(4) NOT NULL,
  `sekolah` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `id_master_kelas` int(11) NOT NULL,
  `hobi` varchar(255) NOT NULL,
  `catatan` text NOT NULL,
  `id_master_jabatan` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_user`
--

INSERT INTO `master_user` (`id`, `username`, `password`, `nama`, `alamat`, `email`, `telepon`, `kelamin`, `sekolah`, `jurusan`, `id_master_kelas`, `hobi`, `catatan`, `id_master_jabatan`, `is_active`) VALUES
(1, 'albert', 'a66abb5684c45962d887564f08346e8d', 'Albertus Dwi Anggara', 'Jalan Manukan Tengah No. 5C', 'albertusdwi01.ada@gmail.com', '08123456789', 1, 'Universitas Negeri Surabaya', 'IPA', 1, 'Futsal', '-', 1, 1),
(2, 'Kevin', 'cdffcd99cb949a663ba94ac6b52a0e28', 'Kevin Gaes', 'Wisma Tengger', 'kevin@gmail.com', '0812345678', 1, 'SMK 1', 'Mesin', 2, 'Sepak bola', 'tidak ada', 2, 1),
(3, 'adit', '49ab44e9fd083af78504d583078fc3d0', 'Adit Putra', 'Jalan Manukan Lor I No. 10', 'Putra123@gmail.com', '085234567898', 1, 'SMAN 01 Bhineka', 'IPA', 1, 'Futsal', '-', 2, 1),
(4, 'viona', '6715c5fad04befe65700656ba6f7179a', 'Viona Putri Indah', 'JL. Jelidro XI No. 01', 'vionaputri@gmail.com', '089212345678', 2, 'SMA Bhineka 01', 'IPS', 2, 'Membaca', '-', 2, 1),
(5, 'listi', '91e405571de14554733ae47a858e4778', 'Listi Eka Anggarini', 'JL. Pondok Benowo Indah XX No. 01', 'listieka@gmail.com', '087598761234', 2, 'SMA Bhineka 01', 'IPA', 2, 'Travelling', '-', 2, 1),
(6, 'valir', 'f29f3d4946cf6a8ec99f42f9e034cad8', 'Valir Eka Flamani', 'JL. Manukan Kulon V No. 20', 'valir01@gmail.com', '081234567890', 1, 'SMA Bhineka 01', 'IPS', 3, 'Memancing', '-', 2, 1),
(7, 'rianto', 'd3150395c611a479e59108553aee8b5f', 'Rianto Catur Hitler', 'JL. Raya Kandangan No. 13', 'riantopion@gmail.com', '085498761234', 1, 'SMA Bhineka 01', 'IPA', 2, 'Bermain Musik', '-', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `id` int(11) NOT NULL,
  `id_master_user` int(11) NOT NULL,
  `id_master_kelas` int(11) NOT NULL,
  `id_master_judul_ujian` int(11) NOT NULL,
  `tanggal_ujian` datetime NOT NULL,
  `jam_akhir` time DEFAULT NULL,
  `total_soal` int(11) NOT NULL DEFAULT 0,
  `total_benar` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`id`, `id_master_user`, `id_master_kelas`, `id_master_judul_ujian`, `tanggal_ujian`, `jam_akhir`, `total_soal`, `total_benar`, `status`, `is_active`) VALUES
(1, 1, 1, 1, '2021-06-06 22:40:05', '23:00:05', 5, 5, 2, 1),
(2, 1, 1, 1, '2021-06-06 23:06:20', '23:26:20', 5, 4, 2, 1),
(3, 1, 1, 1, '2021-06-06 23:27:26', '23:47:26', 5, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ujian_detail`
--

CREATE TABLE `ujian_detail` (
  `id` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `soal` varchar(255) NOT NULL,
  `soal_gambar` varchar(255) DEFAULT NULL,
  `pilihan_a` varchar(255) NOT NULL,
  `pilihan_a_gambar` varchar(255) DEFAULT NULL,
  `pilihan_b` varchar(255) NOT NULL,
  `pilihan_b_gambar` varchar(255) DEFAULT NULL,
  `pilihan_c` varchar(255) NOT NULL,
  `pilihan_c_gambar` varchar(255) DEFAULT NULL,
  `pilihan_d` varchar(255) NOT NULL,
  `pilihan_d_gambar` varchar(255) DEFAULT NULL,
  `jawaban` int(11) NOT NULL DEFAULT 0,
  `jawaban_user` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ujian_detail`
--

INSERT INTO `ujian_detail` (`id`, `id_ujian`, `soal`, `soal_gambar`, `pilihan_a`, `pilihan_a_gambar`, `pilihan_b`, `pilihan_b_gambar`, `pilihan_c`, `pilihan_c_gambar`, `pilihan_d`, `pilihan_d_gambar`, `jawaban`, `jawaban_user`) VALUES
(1, 1, 'Proses pembuatan ikan asin dapat dilakukan dengan menggunakan?', '', 'Teknologi sederhana', '', 'Teknologi modern', '', 'Teknologi  Canggih', '', 'Teknologi Paling Canggih', '', 1, 1),
(2, 1, 'Daun sirih dapat dimanfaatkan untuk mengobati orang yang sedang?', '', 'Diare', '', 'Mimisan', '', 'Demam', '', 'Batuk', '', 2, 2),
(3, 1, 'Agar dapat tumbuh subur maka tanaman perlu di?', '', 'Jemur', '', 'Semprot', '', 'Siram', '', 'Lempar', '', 3, 3),
(4, 1, 'Daur hidup pada tanaman padi dimulai dari?', '', 'Bunga', '', 'Gabah', '', 'Batang', '', 'Beras', '', 4, 4),
(5, 1, 'Bagian tumbuhan yang berfungsi menyerap air dan mineral dan dalam tanah adalah?', '', 'Batang', '', 'Akar', '', 'Bunga', '', 'Daun', '', 2, 2),
(6, 2, 'Proses pembuatan ikan asin dapat dilakukan dengan menggunakan?', '', 'Teknologi sederhana', '', 'Teknologi modern', '', 'Teknologi  Canggih', '', 'Teknologi Paling Canggih', '', 1, 1),
(7, 2, 'Daun sirih dapat dimanfaatkan untuk mengobati orang yang sedang?', '', 'Diare', '', 'Mimisan', '', 'Demam', '', 'Batuk', '', 2, 3),
(8, 2, 'Agar dapat tumbuh subur maka tanaman perlu di?', '', 'Jemur', '', 'Semprot', '', 'Siram', '', 'Lempar', '', 3, 3),
(9, 2, 'Daur hidup pada tanaman padi dimulai dari?', '', 'Bunga', '', 'Gabah', '', 'Batang', '', 'Beras', '', 4, 4),
(10, 2, 'Bagian tumbuhan yang berfungsi menyerap air dan mineral dan dalam tanah adalah?', '', 'Batang', '', 'Akar', '', 'Bunga', '', 'Daun', '', 2, 2),
(11, 3, 'Proses pembuatan ikan asin dapat dilakukan dengan menggunakan?', '', 'Teknologi sederhana', '', 'Teknologi modern', '', 'Teknologi  Canggih', '', 'Teknologi Paling Canggih', '', 1, 1),
(12, 3, 'Daun sirih dapat dimanfaatkan untuk mengobati orang yang sedang?', '', 'Diare', '', 'Mimisan', '', 'Demam', '', 'Batuk', '', 2, 1),
(13, 3, 'Agar dapat tumbuh subur maka tanaman perlu di?', '', 'Jemur', '', 'Semprot', '', 'Siram', '', 'Lempar', '', 3, 2),
(14, 3, 'Daur hidup pada tanaman padi dimulai dari?', '', 'Bunga', '', 'Gabah', '', 'Batang', '', 'Beras', '', 4, 2),
(15, 3, 'Bagian tumbuhan yang berfungsi menyerap air dan mineral dan dalam tanah adalah?', '', 'Batang', '', 'Akar', '', 'Bunga', '', 'Daun', '', 2, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_jabatan`
--
ALTER TABLE `master_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_judul_ujian`
--
ALTER TABLE `master_judul_ujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_master_kelas` (`id_master_kelas`);

--
-- Indexes for table `master_kelas`
--
ALTER TABLE `master_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_soal_ujian`
--
ALTER TABLE `master_soal_ujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_master_judul_ujian` (`id_master_judul_ujian`);

--
-- Indexes for table `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_master_kelas` (`id_master_kelas`),
  ADD KEY `id_master_jabatan` (`id_master_jabatan`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_master_user` (`id_master_user`),
  ADD KEY `id_master_kelas` (`id_master_kelas`),
  ADD KEY `id_master_judul_ujian` (`id_master_judul_ujian`);

--
-- Indexes for table `ujian_detail`
--
ALTER TABLE `ujian_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ujian` (`id_ujian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_jabatan`
--
ALTER TABLE `master_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_judul_ujian`
--
ALTER TABLE `master_judul_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `master_kelas`
--
ALTER TABLE `master_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `master_soal_ujian`
--
ALTER TABLE `master_soal_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `master_user`
--
ALTER TABLE `master_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ujian_detail`
--
ALTER TABLE `ujian_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `master_soal_ujian`
--
ALTER TABLE `master_soal_ujian`
  ADD CONSTRAINT `master_soal_ujian_ibfk_1` FOREIGN KEY (`id_master_judul_ujian`) REFERENCES `master_judul_ujian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `master_user`
--
ALTER TABLE `master_user`
  ADD CONSTRAINT `master_user_ibfk_1` FOREIGN KEY (`id_master_kelas`) REFERENCES `master_kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `master_user_ibfk_2` FOREIGN KEY (`id_master_jabatan`) REFERENCES `master_jabatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ujian`
--
ALTER TABLE `ujian`
  ADD CONSTRAINT `ujian_ibfk_1` FOREIGN KEY (`id_master_user`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ujian_ibfk_2` FOREIGN KEY (`id_master_kelas`) REFERENCES `master_kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ujian_ibfk_3` FOREIGN KEY (`id_master_judul_ujian`) REFERENCES `master_judul_ujian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ujian_detail`
--
ALTER TABLE `ujian_detail`
  ADD CONSTRAINT `ujian_detail_ibfk_1` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

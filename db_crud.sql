-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Des 2023 pada 04.59
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_crud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_courses`
--

CREATE TABLE `tb_courses` (
  `id_course` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `duration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_courses`
--

INSERT INTO `tb_courses` (`id_course`, `title`, `description`, `duration`) VALUES
(10, 'Android Developer', 'Kursus Android Developer adalah kursus yang mengajarkan Anda cara mengembangkan aplikasi Android. Kursus ini mencakup materi mulai dari dasar-dasar Android hingga pengembangan aplikasi kompleks.', '300 Jam'),
(11, 'Front-End Web Developer', ' Kursus Front End Web Developer  Kursus Front End Web Developer adalah kursus yang mengajarkan Anda cara mengembangkan tampilan dan antarmuka pengguna (UI/UX) website.', '250 Jam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_materials`
--

CREATE TABLE `tb_materials` (
  `id_material` int(11) NOT NULL,
  `id_course` int(11) DEFAULT NULL,
  `title_material` varchar(255) NOT NULL,
  `description_material` text NOT NULL,
  `embed_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_courses`
--
ALTER TABLE `tb_courses`
  ADD PRIMARY KEY (`id_course`);

--
-- Indeks untuk tabel `tb_materials`
--
ALTER TABLE `tb_materials`
  ADD PRIMARY KEY (`id_material`),
  ADD KEY `id_course` (`id_course`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_courses`
--
ALTER TABLE `tb_courses`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_materials`
--
ALTER TABLE `tb_materials`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_materials`
--
ALTER TABLE `tb_materials`
  ADD CONSTRAINT `tb_materials_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `tb_courses` (`id_course`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

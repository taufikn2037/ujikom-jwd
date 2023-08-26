-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Agu 2023 pada 02.53
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hotel`
--

CREATE TABLE `tb_hotel` (
  `id_hotel` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `no_iden` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `durasi` int(11) NOT NULL,
  `breakfast` varchar(20) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_hotel`
--

INSERT INTO `tb_hotel` (`id_hotel`, `nama`, `jenis_kelamin`, `no_iden`, `tanggal`, `durasi`, `breakfast`, `id_kamar`, `created_at`, `updated_at`) VALUES
(1, 'taufik', 'Laki-laki', '1811052410010002', '2023-08-25', 3, 'Ya', 1, '2023-08-25 19:13:01', NULL),
(2, 'kamu', 'Perempuan', '1811052410010001', '2023-08-26', 2, 'Tidak', 2, '2023-08-25 19:29:47', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kamar`
--

CREATE TABLE `tb_kamar` (
  `id_kamar` int(11) NOT NULL,
  `jenis_kamar` varchar(255) NOT NULL,
  `harga` int(64) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kamar`
--

INSERT INTO `tb_kamar` (`id_kamar`, `jenis_kamar`, `harga`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Standar', 200000, 'https://images.tokopedia.net/blog-tokopedia-com/uploads/2020/02/5.-Suite-Room-sumber-gambar-Pixabay.jpg', '2023-08-25 17:41:55', NULL),
(2, 'Deluxe', 500000, 'https://blog.reservasi.com/wp-content/uploads/2016/09/Jangan-Bingung-Ketika-Mau-Booking-Hotel-Ini-Dia-Cara-Membedakan-Tipe-Kamar-Hotel-Yang-Ada1-1.jpg', '2023-08-25 17:45:10', NULL),
(3, 'Executif', 700000, 'https://asset-a.grid.id/crop/0x0:0x0/x/photo/2018/12/03/3030800391.jpg', '2023-08-25 17:45:40', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_hotel`
--
ALTER TABLE `tb_hotel`
  ADD PRIMARY KEY (`id_hotel`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indeks untuk tabel `tb_kamar`
--
ALTER TABLE `tb_kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_hotel`
--
ALTER TABLE `tb_hotel`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_kamar`
--
ALTER TABLE `tb_kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_hotel`
--
ALTER TABLE `tb_hotel`
  ADD CONSTRAINT `tb_hotel_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `tb_kamar` (`id_kamar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

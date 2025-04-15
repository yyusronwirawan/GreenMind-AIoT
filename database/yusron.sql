-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 05 Sep 2024 pada 17.43
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yusron`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `datanode1`
--

CREATE TABLE `datanode1` (
  `id` int(11) NOT NULL,
  `suhu` float NOT NULL,
  `kelembapan` int(11) NOT NULL,
  `cahaya` int(11) NOT NULL,
  `ktanah` int(11) NOT NULL,
  `stat_suhu` varchar(50) NOT NULL,
  `stat_kelembapan` varchar(50) NOT NULL,
  `stat_cahaya` varchar(50) NOT NULL,
  `stat_ktanah` varchar(50) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `datanode1`
--

INSERT INTO `datanode1` (`id`, `suhu`, `kelembapan`, `cahaya`, `ktanah`, `stat_suhu`, `stat_kelembapan`, `stat_cahaya`, `stat_ktanah`, `waktu`) VALUES
(2, 83, 76, 3080, 4, 'Ideal', 'Ideal', 'Ideal', 'Ideal', '2024-08-29 10:06:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datanode2`
--

CREATE TABLE `datanode2` (
  `id` int(11) NOT NULL,
  `suhu` float NOT NULL,
  `kelembapan` int(11) NOT NULL,
  `cahaya` int(11) NOT NULL,
  `ktanah` int(11) NOT NULL,
  `stat_suhu` varchar(50) NOT NULL,
  `stat_kelembapan` varchar(50) NOT NULL,
  `stat_cahaya` varchar(50) NOT NULL,
  `stat_ktanah` varchar(50) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `datanode2`
--

INSERT INTO `datanode2` (`id`, `suhu`, `kelembapan`, `cahaya`, `ktanah`, `stat_suhu`, `stat_kelembapan`, `stat_cahaya`, `stat_ktanah`, `waktu`) VALUES
(1, 28.3, 80, 643, 86, 'Ideal', 'Ideal', 'Ideal', 'Ideal', '2024-08-29 06:45:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datanode3`
--

CREATE TABLE `datanode3` (
  `id` int(11) NOT NULL,
  `suhu` float NOT NULL,
  `kelembapan` int(11) NOT NULL,
  `cahaya` int(11) NOT NULL,
  `ktanah` int(11) NOT NULL,
  `stat_suhu` varchar(50) NOT NULL,
  `stat_kelembapan` varchar(50) NOT NULL,
  `stat_cahaya` varchar(50) NOT NULL,
  `stat_ktanah` varchar(50) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `datanode3`
--

INSERT INTO `datanode3` (`id`, `suhu`, `kelembapan`, `cahaya`, `ktanah`, `stat_suhu`, `stat_kelembapan`, `stat_cahaya`, `stat_ktanah`, `waktu`) VALUES
(1, 33.6, 67, 910, 75, 'Ideal', 'Ideal', 'Ideal', 'Ideal', '2024-08-29 06:45:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datanode4`
--

CREATE TABLE `datanode4` (
  `id` int(11) NOT NULL,
  `suhu` float NOT NULL,
  `kelembapan` int(11) NOT NULL,
  `cahaya` int(11) NOT NULL,
  `ktanah` int(11) NOT NULL,
  `stat_suhu` varchar(50) NOT NULL,
  `stat_kelembapan` varchar(50) NOT NULL,
  `stat_cahaya` varchar(50) NOT NULL,
  `stat_ktanah` varchar(50) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `datanode4`
--

INSERT INTO `datanode4` (`id`, `suhu`, `kelembapan`, `cahaya`, `ktanah`, `stat_suhu`, `stat_kelembapan`, `stat_cahaya`, `stat_ktanah`, `waktu`) VALUES
(1, 35.4, 66, 921, 72, 'Ideal', 'Ideal', 'Ideal', 'Ideal', '2024-08-29 06:45:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `switch_node1`
--

CREATE TABLE `switch_node1` (
  `switch1` int(11) NOT NULL,
  `switch2` int(11) NOT NULL,
  `switch3` int(11) NOT NULL,
  `switch4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `switch_node1`
--

INSERT INTO `switch_node1` (`switch1`, `switch2`, `switch3`, `switch4`) VALUES
(1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `switch_node2`
--

CREATE TABLE `switch_node2` (
  `switch1` int(11) NOT NULL,
  `switch2` int(11) NOT NULL,
  `switch3` int(11) NOT NULL,
  `switch4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `switch_node2`
--

INSERT INTO `switch_node2` (`switch1`, `switch2`, `switch3`, `switch4`) VALUES
(1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `switch_node3`
--

CREATE TABLE `switch_node3` (
  `switch1` int(11) NOT NULL,
  `switch2` int(11) NOT NULL,
  `switch3` int(11) NOT NULL,
  `switch4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `switch_node3`
--

INSERT INTO `switch_node3` (`switch1`, `switch2`, `switch3`, `switch4`) VALUES
(1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `switch_node4`
--

CREATE TABLE `switch_node4` (
  `switch1` int(11) NOT NULL,
  `switch2` int(11) NOT NULL,
  `switch3` int(11) NOT NULL,
  `switch4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `switch_node4`
--

INSERT INTO `switch_node4` (`switch1`, `switch2`, `switch3`, `switch4`) VALUES
(0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `photo_profile` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `remember_token`, `photo_profile`, `created_at`) VALUES
(1, 'Administrator', 'admin', '$2y$10$o6iNaW6sFza9BSyiYAIE5eL5z4Dz8lTX5GHJobs84dM1AYWjQ9n5i', 'a8cc690ddb21390d4962b45ad219c84e', NULL, '2024-08-30 20:15:58');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `datanode1`
--
ALTER TABLE `datanode1`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `datanode2`
--
ALTER TABLE `datanode2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `datanode3`
--
ALTER TABLE `datanode3`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `datanode4`
--
ALTER TABLE `datanode4`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `datanode1`
--
ALTER TABLE `datanode1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `datanode2`
--
ALTER TABLE `datanode2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `datanode3`
--
ALTER TABLE `datanode3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `datanode4`
--
ALTER TABLE `datanode4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

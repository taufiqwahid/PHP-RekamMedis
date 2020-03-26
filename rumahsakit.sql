-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Mar 2020 pada 07.20
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahsakit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` varchar(50) NOT NULL,
  `nomor_identitas` varchar(50) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nomor_identitas`, `nama_pasien`, `jenis_kelamin`, `alamat`, `no_telp`) VALUES
('0a9a9e01-a526-4b97-bacc-790d0888b122', '003', 'Wahid', 'L', 'gowa', '091111'),
('16d5b886-e99c-4467-8164-86b36e33b2d5', '201922', 'pasien2', 'P', 'Gowa', '811111111'),
('3d24f805-245b-4c17-bd25-0d9db138a010', '001', 'Upi', 'L', 'Paccinongan GOWA', '081111111111'),
('92ea1eb2-c736-4032-b20f-1a3061b2fbf8', '201944', 'pasien4', 'L', 'di anu', '811111111'),
('a8ff3204-6acb-4922-ad54-8ef2de9b2c4c', '201911', 'pasien1', 'L', 'Gowa', '81928192'),
('b49d5e04-c14e-449e-a027-0e07fb04bbd4', '201933', 'pasien3', 'P', 'Pallangga', '811111111'),
('eaa178ea-9a8e-4116-9df7-e8f25f55d2e9', '002', 'taufiq', 'L', 'Manggarupi', '08222222222'),
('ee413f70-0cc9-435f-b269-6f718e326864', '004', 'Resky', 'L', 'Manggarupi', '082222222'),
('efdac3ec-6203-4c64-91d7-4c88d5ea8c1a', '201944', 'pasien5', 'L', 'di anu', '811111111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` varchar(50) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `spesialis` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nama_dokter`, `spesialis`, `alamat`, `no_telp`) VALUES
('e91e37d8-6190-474c-b49e-8bbb5ee377c9', 'Dr. Robbert', 'Kulit', 'jalan Macan', '090192012910'),
('ec642145-5762-49c3-abae-ae07804e5e0c', 'Dr. Kevin', 'Dokter Umum', 'Jalan Anoa', '8080808080');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` varchar(50) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `ket_obat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `ket_obat`) VALUES
('55b151f3-316c-4e99-a3df-652124a55be0', 'Paramex', 'Sakit Kepala'),
('58b865c6-ca03-4c5a-8eb3-8f9a9ff5fa52', 'Komix', 'Flu dan Batuk'),
('598cd101-c5c6-418d-b2dc-c3b5446bd204', 'Botrex', 'Flu dan Batuk'),
('80795450-7569-4afc-a5f8-e9bded931de4', 'Antalgin', 'Obat Sakit Gigi'),
('81d93285-02db-4c7a-8da7-6629117a6e55', 'Paracetamol', 'Penurun Demam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_obat_rm`
--

CREATE TABLE `tb_obat_rm` (
  `id` int(11) NOT NULL,
  `id_rm` varchar(50) NOT NULL,
  `id_obat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_obat_rm`
--

INSERT INTO `tb_obat_rm` (`id`, `id_rm`, `id_obat`) VALUES
(6, 'a55c8033-b604-464b-8936-c8b15da812d9', '55b151f3-316c-4e99-a3df-652124a55be0'),
(7, 'a55c8033-b604-464b-8936-c8b15da812d9', '58b865c6-ca03-4c5a-8eb3-8f9a9ff5fa52'),
(8, 'a55c8033-b604-464b-8936-c8b15da812d9', '598cd101-c5c6-418d-b2dc-c3b5446bd204'),
(9, 'ae95c1f4-23f4-4477-a125-d7ad1f4745c1', '55b151f3-316c-4e99-a3df-652124a55be0'),
(10, 'ae95c1f4-23f4-4477-a125-d7ad1f4745c1', '598cd101-c5c6-418d-b2dc-c3b5446bd204'),
(11, '9f605957-630a-45c7-8f15-e05616a9f939', '80795450-7569-4afc-a5f8-e9bded931de4'),
(12, '341f82df-5308-470a-b877-73cf068d53fd', '58b865c6-ca03-4c5a-8eb3-8f9a9ff5fa52'),
(13, '341f82df-5308-470a-b877-73cf068d53fd', '81d93285-02db-4c7a-8da7-6629117a6e55'),
(14, '3f85b6c0-d03d-45bb-912d-e7ab6597f3c5', '58b865c6-ca03-4c5a-8eb3-8f9a9ff5fa52'),
(15, '3f85b6c0-d03d-45bb-912d-e7ab6597f3c5', '598cd101-c5c6-418d-b2dc-c3b5446bd204');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_poliklinik`
--

CREATE TABLE `tb_poliklinik` (
  `id_poli` varchar(50) NOT NULL,
  `nama_poli` varchar(50) NOT NULL,
  `gedung` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_poliklinik`
--

INSERT INTO `tb_poliklinik` (`id_poli`, `nama_poli`, `gedung`) VALUES
('013e99e9-39ba-4c40-a221-332945730953', 'Poli A', 'A lt.2'),
('0e563fcd-3c84-4189-80c4-15dc77fb8212', 'Poli D', 'D lt.1'),
('27e1b6ae-ff1a-4a3f-8f35-b6efa449e8ea', 'Poli B', 'B .lt3'),
('69d39f5b-aa32-4462-91ac-c80b33fef790', 'Poli A', 'A lt.2'),
('da2bb1aa-6d01-4966-a03d-edb5da5d036e', 'Poli C', 'C lt.4'),
('e7f6e502-b18d-48ef-9470-ba1893fd664d', 'Poli B', 'B .lt3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rekammedis`
--

CREATE TABLE `tb_rekammedis` (
  `id_rm` varchar(50) NOT NULL,
  `id_pasien` varchar(50) NOT NULL,
  `keluhan` text NOT NULL,
  `id_dokter` varchar(50) NOT NULL,
  `diagnosa` text NOT NULL,
  `id_poli` varchar(50) NOT NULL,
  `tgl_periksa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rekammedis`
--

INSERT INTO `tb_rekammedis` (`id_rm`, `id_pasien`, `keluhan`, `id_dokter`, `diagnosa`, `id_poli`, `tgl_periksa`) VALUES
('341f82df-5308-470a-b877-73cf068d53fd', 'ee413f70-0cc9-435f-b269-6f718e326864', '<p>badan panas dan bantuk</p>\r\n', 'e91e37d8-6190-474c-b49e-8bbb5ee377c9', 'demam kurang menjaga asupan makanan', 'da2bb1aa-6d01-4966-a03d-edb5da5d036e', '2019-12-29'),
('3f85b6c0-d03d-45bb-912d-e7ab6597f3c5', '92ea1eb2-c736-4032-b20f-1a3061b2fbf8', '<p>Masukkan Keluhan Disini!</p>\r\n', 'ec642145-5762-49c3-abae-ae07804e5e0c', 'asdadad', '27e1b6ae-ff1a-4a3f-8f35-b6efa449e8ea', '2020-01-15'),
('9f605957-630a-45c7-8f15-e05616a9f939', 'eaa178ea-9a8e-4116-9df7-e8f25f55d2e9', '<p>sakit gigi</p>\r\n', 'e91e37d8-6190-474c-b49e-8bbb5ee377c9', 'gusi bengkak', '0e563fcd-3c84-4189-80c4-15dc77fb8212', '2019-12-29'),
('a55c8033-b604-464b-8936-c8b15da812d9', '0a9a9e01-a526-4b97-bacc-790d0888b122', '<p>sakit kepala dan batuk</p>\r\n', 'ec642145-5762-49c3-abae-ae07804e5e0c', 'banyak utang na ahha', '013e99e9-39ba-4c40-a221-332945730953', '2019-12-29'),
('ae95c1f4-23f4-4477-a125-d7ad1f4745c1', '3d24f805-245b-4c17-bd25-0d9db138a010', '<p>sakit kepala</p>\r\n', 'ec642145-5762-49c3-abae-ae07804e5e0c', 'banyak na fikir', '27e1b6ae-ff1a-4a3f-8f35-b6efa449e8ea', '2019-12-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
('760083bf-10fb-11ea-8602-b06ebf0f4f1d', 'Upi Wahid', 'user', 'user', '2'),
('c407d989-10ee-11ea-8602-b06ebf0f4f1d', 'Taufiq Wahid', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indeks untuk tabel `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indeks untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `tb_obat_rm`
--
ALTER TABLE `tb_obat_rm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rm` (`id_rm`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_obat_2` (`id_obat`);

--
-- Indeks untuk tabel `tb_poliklinik`
--
ALTER TABLE `tb_poliklinik`
  ADD PRIMARY KEY (`id_poli`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indeks untuk tabel `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_obat_rm`
--
ALTER TABLE `tb_obat_rm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_obat_rm`
--
ALTER TABLE `tb_obat_rm`
  ADD CONSTRAINT `tb_obat_rm_ibfk_1` FOREIGN KEY (`id_rm`) REFERENCES `tb_rekammedis` (`id_rm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_obat_rm_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`);

--
-- Ketidakleluasaan untuk tabel `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  ADD CONSTRAINT `tb_rekammedis_ibfk_1` FOREIGN KEY (`id_poli`) REFERENCES `tb_poliklinik` (`id_poli`),
  ADD CONSTRAINT `tb_rekammedis_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_dokter`),
  ADD CONSTRAINT `tb_rekammedis_ibfk_3` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Okt 2022 pada 21.52
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warungm3_db`
--
CREATE DATABASE IF NOT EXISTS `warungmarena_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `warungmarena_db`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

DROP TABLE IF EXISTS `tb_barang`;
CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `keterangan` varchar(300) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL,
  `terjual` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `keterangan`, `kategori_id`, `harga`, `stok`, `gambar`, `terjual`) VALUES
(1, 'Indomie Goreng', 'Indomie terbuat dari tepung terigu berkualitas dengan paduan rempah rempah pilihan terbaik dan diproses dengan higienis menggunakan standar internasional dan teknologi berkualitas tinggi Juga diperkaya tambahan fortifikasi mineral dan vitamin A B1 B6 B12 Niasin Asam Folat dan Mineral Zat Besi', 1, 3000, 12, 'gambar_barang_(2).png', 5),
(2, 'Indomie Ayam Bawang', 'Indomie Ayam Bawang Mie Instant merupakan mie instan yang memiliki rasa yang gurih dan lezat. ', 1, 3000, 25, '61.png', 3),
(3, 'Indomie Kari Ayam', 'Indomie hadir dalam banyak variasi dari rasa sup klasik seperti ayam, sayuran dan Indomie Kari Ayam Mie Instan. ', 1, 2900, 89, '41.png', 0),
(4, 'Indomie Soto Mie', ' Kali ini Indofood menghadirkan varian rasa Indomie soto. Salah satu karakteristik mie instan soto adalah kemasannya berwarna hijau cerah. ', 1, 2900, 50, '31.png', 0),
(5, 'Indomie Rendang', 'Indomie mempunyai varian mie goreng rasa rendang yang khas, lezat dan diolah dengan higienis sehingga aman untuk dikonsumsi siapapun. Mie ini dilengkapi dengan bumbu pelengkap yang lezat dan akan memberikan kenikmatan lebih di lidah Anda.', 1, 3400, 66, '51.png', 0),
(6, 'Nutrisari Sweet Guava', 'Nutrisari Sweet Guava memiliki Rasa jambu yang manis, Memenuhi 100% kebutuhan vitamin C, Diperkaya juga dengan vitamin A, B1, B3, B6, asam folat dan E, serta mineral kalsium & fosfor, Diolah dengan teknologi tinggi (granulasi dan enkapsulasi) agar kualitas produk tetap terjaga dan Tanpa pengawet.', 3, 2000, 25, 'gambar_barang_(1).png', 0),
(7, 'Nutrisari Sweet Orange', 'Nutrisari Sweet Orange memiliki  Mengandung Vitamin A, berperan dalam mempertahankan keutuhan lapisan permukaan (mata, saluran pencernaan, saluran pernapasan dan kulit.', 3, 2500, 89, '91.png', 0),
(8, 'Beng-beng', 'Beng-Beng, wafer dengan karamel dan coklat yang enak dan renyah!', 2, 2000, 89, 'gambar_barang1.png', 0),
(10, 'Tamiya', 'Mainan mobil tamiya, memiliki speed yang sangat kencang.', 4, 10000, 30, 'gambar_barang_(1)1.png', 0),
(11, 'Pensil 2B Staedtler', 'Mempunyai tingkat ketebalan yang sangat baik, sangat cocok digunakan untuk ujian.', 5, 11000, 20, 'gambar_barang_(2)1.png', 0),
(12, 'Oskadon', 'Oskadon adalah obat yang di gunakan sebagai penurun demam dan pereda nyeri seperti sakit gigi, sakit kepala dan nyeri ringan lainnya.', 6, 5000, 30, 'oskadon.png', 0),
(13, 'Ultra Milk Coklat 250ml', 'Merupakan susu segar alami berkualitas tinggi dengan berbagai kebaikan seluruh kandungan nutrisi didalamnya, dari mulai protein, karbohidrat, vitamin, serta berbagai macam mineral seperti kalsium, magnesium, fosfor.', 3, 4000, 20, '111.png', 0),
(14, 'Ultra Milk Full Cream 250ml', 'Minuman bergizi yang baik untuk pertumbuhan dan kesehatan tulang, susu ini akan bekerja lebih baik bila dikonsumsi oleh anak yang sedang dalam masa pertumbuhan. Susu ini hadir dengan kaya manfaat yang lezat untuk mendukung pertumbuhan anak Anda.', 3, 4000, 20, '121.png', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_invoice`
--

DROP TABLE IF EXISTS `tb_invoice`;
CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `ekspedisi` varchar(15) NOT NULL,
  `rt` varchar(15) NOT NULL,
  `metode` varchar(100) NOT NULL,
  `bukti` text NOT NULL,
  `ongkir` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Pending',
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `user_id`, `nama`, `alamat`, `hp`, `ekspedisi`, `rt`, `metode`, `bukti`, `ongkir`, `subtotal`, `status`, `tgl_pesan`, `batas_bayar`) VALUES
(1, 7, 'Raihan Putro Maulana Rizky', 'sfsafasfs', '12345', 'ANTAR', 'RT 07 / RW 09', 'BANK BCA DIGITAL - 006511494796 A/N Raihan Putro Maulana Rizky', '', 2000, 3000, 'Pending', '2022-07-25 08:38:28', '2022-07-26 08:38:28'),
(2, 8, 'Raihan Putro Maulana Rizky', 'Jl. Kenari', '12345', 'ANTAR', 'RT 14 / RW 09', 'BANK MANDIRI - 1260007835720 A/N Raihan Putro Maulana Rizky', 'oskadon.png', 6000, 21000, 'Selesai', '2022-07-25 09:21:34', '2022-07-26 09:21:34'),
(3, 9, 'Indri', 'Jl semangka 2 no 21 perumahan harapan baru 1 kel.kota baru kec.bekasi barat', '1234556', 'ANTAR', 'RT 07 / RW 09', 'BANK MANDIRI - 1260007835720 A/N Raihan Putro Maulana Rizky', '', 2000, 3000, 'Pending', '2022-07-26 11:45:19', '2022-07-27 11:45:19'),
(4, 8, 'Raihan Putro Maulana Rizky', 'Jl. Cipedak Raya', '085156637952', 'ANTAR', 'RT 07 / RW 09', 'BANK BCA DIGITAL - 006511494796 A/N Raihan Putro Maulana Rizky', '', 2000, 8500, 'Pending', '2022-07-27 01:47:40', '2022-07-28 01:47:40'),
(5, 8, 'Raihan Putro Maulana Rizky', 'Jl. Cipedak Raya', '085156637952', 'ANTAR', 'RT 06 / RW 09', 'BANK BCA DIGITAL - 006511494796 A/N Raihan Putro Maulana Rizky', '', 3000, 15600, 'Pending', '2022-07-27 02:02:20', '2022-07-28 02:02:20'),
(6, 8, 'Raihan Putro Maulana Rizky', 'Jl. Cipedak Raya', '085156637952', 'AMBIL SENDIRI', 'RT 06 / RW 09', 'BANK JAGO - 107342681660 A/N Raihan Putro Maulana Rizky', '', 0, 27000, 'Pending', '2022-07-27 02:02:53', '2022-07-28 02:02:53'),
(7, 8, 'Raihan Putro Maulana Rizky', 'Jl. Cipedak Raya', '12345', 'ANTAR', 'RT 05 / RW 09', 'BANK BCA DIGITAL - 006511494796 A/N Raihan Putro Maulana Rizky', '', 4000, 3000, 'Pending', '2022-07-27 02:03:24', '2022-07-28 02:03:24'),
(8, 8, 'Raihan Putro Maulana Rizky', 'Jl. Cipedak Raya', '12345', 'ANTAR', 'RT 07 / RW 09', 'BANK BCA DIGITAL - 006511494796 A/N Raihan Putro Maulana Rizky', '', 2000, 4000, 'Pending', '2022-07-27 02:03:42', '2022-07-28 02:03:42'),
(9, 8, 'Raihan Putro Maulana Rizky', 'sfsafasfs', '12345', 'ANTAR', 'RT 06 / RW 09', 'BANK BCA DIGITAL - 006511494796 A/N Raihan Putro Maulana Rizky', '', 3000, 2900, 'Pending', '2022-07-27 02:04:00', '2022-07-28 02:04:00'),
(10, 8, 'Raihan Putro Maulana Rizky', 'Jl. Cipedak Raya', '085156637952', 'ANTAR', 'RT 06 / RW 09', 'BANK MANDIRI - 1260007835720 A/N Raihan Putro Maulana Rizky', '', 3000, 2000, 'Pending', '2022-07-30 04:10:51', '2022-07-31 04:10:51'),
(11, 8, 'Raihan Putro Maulana Rizky', 'Jl. Cipedak Raya', '085156637952', 'ANTAR', 'RT 07 / RW 09', 'BANK JAGO - 107342681660 A/N Raihan Putro Maulana Rizky', '', 2000, 3000, 'Pending', '2022-08-02 09:52:39', '2022-08-03 09:52:39'),
(12, 8, 'Raihan Putro Maulana Rizky', 'Jl. Cipedak Raya', '085156637952', 'ANTAR', 'RT 06 / RW 09', 'BANK BCA DIGITAL - 006511494796 A/N Raihan Putro Maulana Rizky', '', 3000, 3000, 'Pending', '2022-08-02 09:53:08', '2022-08-03 09:53:08'),
(13, 8, 'Raihan Putro Maulana Rizky', 'Jl. Cipedak Raya', '085156637952', 'ANTAR', 'RT 07 / RW 09', 'BANK MANDIRI - 1260007835720 A/N Raihan Putro Maulana Rizky', '', 2000, 3000, 'Pending', '2022-08-02 10:02:22', '2022-08-03 10:02:22'),
(14, 8, 'Raihan Putro Maulana Rizky', 'Jl. Cipedak Raya', '085156637952', 'ANTAR', 'RT 06 / RW 09', 'BANK MANDIRI - 1260007835720 A/N Raihan Putro Maulana Rizky', '', 3000, 3000, 'Pending', '2022-08-02 10:03:47', '2022-08-03 10:03:47'),
(15, 13, 'annisa123', 'Jl. Cipedak Raya', '12345', 'ANTAR', 'RT 07 / RW 09', 'BANK MANDIRI - 1260007835720 A/N Raihan Putro Maulana Rizky', '', 2000, 3000, 'Pending', '2022-08-02 11:15:33', '2022-08-03 11:15:33'),
(16, 8, 'Raihan Putro Maulana Rizky', 'Jl. Cipedak Raya', '085156637952', 'ANTAR', 'RT 05 / RW 09', 'BANK MANDIRI - 1260007835720 A/N Raihan Putro Maulana Rizky', '', 4000, 9000, 'Pending', '2022-08-18 09:51:30', '2022-08-19 09:51:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

DROP TABLE IF EXISTS `tb_kategori`;
CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `nama`) VALUES
(1, 'Sembako'),
(2, 'Jajanan'),
(3, 'Minuman'),
(4, 'Mainan'),
(5, 'Alat Tulis Kerja'),
(6, 'Obat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

DROP TABLE IF EXISTS `tb_pesanan`;
CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `harga`) VALUES
(1, 1, 1, 'Indomie Goreng', 1, 3000),
(2, 2, 1, 'Indomie Goreng', 4, 3000),
(3, 2, 2, 'Indomie Ayam Bawang', 3, 3000),
(4, 3, 1, 'Indomie Goreng', 1, 3000),
(5, 4, 1, 'Indomie Goreng', 2, 3000),
(6, 4, 7, 'Nutrisari Sweet Orange', 1, 2500),
(7, 5, 8, 'Beng-beng', 1, 2000),
(8, 5, 5, 'Indomie Rendang', 4, 3400),
(9, 6, 2, 'Indomie Ayam Bawang', 9, 3000),
(10, 7, 1, 'Indomie Goreng', 1, 3000),
(11, 8, 6, 'Nutrisari Sweet Guava', 2, 2000),
(12, 9, 3, 'Indomie Kari Ayam', 1, 2900),
(13, 10, 6, 'Nutrisari Sweet Guava', 1, 2000),
(14, 11, 1, 'Indomie Goreng', 1, 3000),
(15, 12, 2, 'Indomie Ayam Bawang', 1, 3000),
(16, 13, 1, 'Indomie Goreng', 1, 3000),
(17, 14, 1, 'Indomie Goreng', 1, 3000),
(18, 15, 2, 'Indomie Ayam Bawang', 1, 3000),
(19, 16, 1, 'Indomie Goreng', 2, 3000),
(20, 16, 2, 'Indomie Ayam Bawang', 1, 3000);

--
-- Trigger `tb_pesanan`
--
DROP TRIGGER IF EXISTS `pesanan_penjualan`;
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
UPDATE tb_barang SET stok = stok-NEW.jumlah WHERE id_brg = NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_slider`
--

DROP TABLE IF EXISTS `tb_slider`;
CREATE TABLE `tb_slider` (
  `id` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_slider`
--

INSERT INTO `tb_slider` (`id`, `gambar`) VALUES
(1, 'slider_1.png'),
(2, 'slider_warungmarena_(800_×_267_piksel).png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `rt` varchar(256) NOT NULL,
  `role_id` tinyint(1) NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `alamat`, `hp`, `rt`, `role_id`, `foto`) VALUES
(1, 'admin', 'admin', '123', '', '', '', 1, ''),
(2, 'Raihan Putro Maulana Rizky', 'rehanptro', 'rehannada123', '', '', '', 2, ''),
(4, 'Annisa Fitria Nur Komala Sari', 'ans.ftr16', 'annisa123', '', '', 'PILIH', 2, ''),
(5, 'suparo', 'supar123', '1234', '', '', '', 2, NULL),
(6, 'Indri', 'Indri', '123456', '', '', '', 2, NULL),
(7, 'Raihan Putro Maulana Rizky', 'raihan4467', 'raihan4467', '', '', '', 2, 'IMG_20200312_231420_024.jpg'),
(8, 'Raihan Putro Maulana Rizky', 'raihan445', 'rhn445', 'Jl. Cipedak Raya', '085156637952', 'RT 05 / RW 09', 2, 'IMG_20200312_231420_0244.jpg'),
(9, 'Indri', 'Indri', '12345', '', '', '', 2, NULL),
(10, 'tes', 'tes', '123456', 'medan', '0852', 'RT 06 / RW 09', 2, NULL),
(11, 'test', 'test123', 'test12345', 'sfsafasfs', '08111111', 'RT 06 / RW 09', 2, NULL),
(12, 'Indri', 'Indri', '1234567', 'Fgghjk', '2345yidgjk', 'PILIH RT / RW', 2, NULL),
(13, 'annisa123', 'annisa123', 'annisa123', 'Jl. Cipedak Raya', '12345', 'RT 07 / RW 09', 2, NULL),
(14, 'Raihan Putro Maulana Rizky', 'rhn111', 'rhn11', 'sfsads', '12345', 'RT 06 / RW 09', 2, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_wishlist`
--

DROP TABLE IF EXISTS `tb_wishlist`;
CREATE TABLE `tb_wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_wishlist`
--

INSERT INTO `tb_wishlist` (`id`, `user_id`, `id_brg`) VALUES
(6, 8, 11),
(7, 8, 10),
(8, 8, 12),
(9, 8, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indeks untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_wishlist`
--
ALTER TABLE `tb_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_wishlist`
--
ALTER TABLE `tb_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

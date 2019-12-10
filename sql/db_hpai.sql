-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Nov 2019 pada 01.46
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hpai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_prim` int(11) NOT NULL,
  `id_produk` varchar(5) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_prim`, `id_produk`, `nama_produk`, `status`, `stok`) VALUES
(11, 'ADR', 'Androghapis', 'Aktif', 499),
(12, 'BIO', 'Biosir', 'Aktif', 949),
(13, 'BNC', 'Beauty Night Cream', 'Aktif', 0),
(14, 'BBR', 'Billberry', 'Aktif', 0),
(15, 'CNC', 'Carnocap', 'Aktif', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_masuk`
--

CREATE TABLE `produk_masuk` (
  `id_produk_masuk` int(11) NOT NULL,
  `id_prim` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `QTY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk_masuk`
--

INSERT INTO `produk_masuk` (`id_produk_masuk`, `id_prim`, `tanggal`, `QTY`) VALUES
(26, 11, '2019-01-01', 250),
(27, 11, '2019-02-02', 267),
(28, 11, '2019-03-14', 150),
(29, 11, '2018-12-03', 170),
(30, 11, '2018-11-15', 201),
(31, 11, '2018-10-09', 132),
(32, 11, '2018-09-30', 67),
(33, 11, '2019-04-18', 54),
(34, 11, '2019-05-20', 78),
(35, 11, '2019-06-11', 66),
(36, 11, '2019-07-20', 88),
(37, 11, '2019-08-23', 90),
(38, 11, '2019-09-23', 54),
(39, 11, '2019-10-16', 57),
(40, 12, '2018-09-24', 90),
(41, 12, '2018-10-08', 67),
(42, 12, '2018-11-14', 78),
(43, 12, '2018-12-18', 100),
(44, 12, '2019-01-13', 145),
(45, 12, '2019-02-12', 120),
(46, 12, '2019-03-19', 90),
(47, 12, '2019-04-09', 100),
(48, 12, '2019-05-14', 189),
(49, 12, '2019-06-12', 167),
(50, 12, '2019-07-15', 178),
(51, 12, '2019-08-13', 100),
(52, 12, '2019-09-17', 190),
(53, 12, '2019-10-22', 100);

--
-- Trigger `produk_masuk`
--
DELIMITER $$
CREATE TRIGGER `produk_masuk` AFTER INSERT ON `produk_masuk` FOR EACH ROW BEGIN
UPDATE produk SET stok = stok+NEW.QTY
WHERE id_prim= NEW.id_prim;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(10) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `akses` enum('admin','manager','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`, `nama`, `akses`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'admin'),
('manager', '1d0258c2440a8d19e716292b231e3190', 'Manager', 'manager');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_penjualan`
--

CREATE TABLE `transaksi_penjualan` (
  `id_transaksi` int(11) NOT NULL,
  `id_prim` int(11) NOT NULL,
  `tanggal` text NOT NULL,
  `QTY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_penjualan`
--

INSERT INTO `transaksi_penjualan` (`id_transaksi`, `id_prim`, `tanggal`, `QTY`) VALUES
(45, 11, '2018-09-24', 42),
(46, 11, '2018-10-22', 40),
(47, 11, '2018-11-19', 38),
(48, 11, '2018-12-18', 76),
(49, 11, '2019-01-29', 57),
(50, 11, '2019-02-26', 67),
(51, 11, '2019-03-26', 66),
(52, 11, '2019-04-16', 141),
(53, 11, '2019-05-30', 109),
(54, 11, '2019-06-24', 116),
(55, 11, '2019-07-31', 116),
(56, 11, '2019-08-27', 134),
(57, 11, '2019-09-30', 115),
(58, 11, '2019-10-30', 108),
(59, 12, '2018-09-24', 30),
(60, 12, '2018-10-30', 49),
(61, 12, '2018-11-27', 46),
(62, 12, '2018-12-31', 29),
(63, 12, '2019-01-30', 0),
(64, 12, '2019-02-19', 0),
(65, 12, '2019-03-27', 36),
(66, 12, '2019-04-30', 45),
(67, 12, '2019-05-28', 0),
(68, 12, '2019-06-30', 104),
(69, 12, '2019-07-30', 110),
(70, 12, '2019-08-26', 109),
(71, 12, '2019-09-30', 110),
(72, 12, '2019-10-30', 97);

--
-- Trigger `transaksi_penjualan`
--
DELIMITER $$
CREATE TRIGGER `barang_keluar` AFTER INSERT ON `transaksi_penjualan` FOR EACH ROW BEGIN
UPDATE produk SET stok=stok-NEW.QTY
WHERE id_prim=NEW.id_prim;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_prim`),
  ADD UNIQUE KEY `id_produk` (`id_produk`),
  ADD UNIQUE KEY `nama_produk` (`nama_produk`);

--
-- Indeks untuk tabel `produk_masuk`
--
ALTER TABLE `produk_masuk`
  ADD PRIMARY KEY (`id_produk_masuk`),
  ADD KEY `id_prim` (`id_prim`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_prim` (`id_prim`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_prim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `produk_masuk`
--
ALTER TABLE `produk_masuk`
  MODIFY `id_produk_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produk_masuk`
--
ALTER TABLE `produk_masuk`
  ADD CONSTRAINT `produk_masuk_ibfk_1` FOREIGN KEY (`id_prim`) REFERENCES `produk` (`id_prim`);

--
-- Ketidakleluasaan untuk tabel `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD CONSTRAINT `transaksi_penjualan_ibfk_1` FOREIGN KEY (`id_prim`) REFERENCES `produk` (`id_prim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

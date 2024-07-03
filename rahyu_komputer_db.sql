-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2024 pada 09.18
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rahyu_komputer_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_barang`
--

CREATE TABLE `tabel_barang` (
  `Id_Barang` char(5) NOT NULL,
  `Nama_Barang` varchar(50) DEFAULT NULL,
  `Harga` int(11) DEFAULT NULL,
  `Stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_barang`
--

INSERT INTO `tabel_barang` (`Id_Barang`, `Nama_Barang`, `Harga`, `Stock`) VALUES
('B1', 'Asus Vivobook 14X', 8000000, 9),
('B11', 'Headset Gaming', 120000, 14),
('B12', 'Gamepad Rexus G20', 300000, 3),
('B2', 'Logitech G203', 270000, 222),
('B3', 'Kabel LAN 1 meter', 25000, 2),
('B4', 'Gamen Titan Elite Keyboard', 250000, 24);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_customer`
--

CREATE TABLE `tabel_customer` (
  `Id_Customer` char(5) NOT NULL,
  `Nama_Customer` varchar(50) DEFAULT NULL,
  `Telepon_Customer` int(11) DEFAULT NULL,
  `Alamat_Customer` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_customer`
--

INSERT INTO `tabel_customer` (`Id_Customer`, `Nama_Customer`, `Telepon_Customer`, `Alamat_Customer`) VALUES
('CUST1', 'Adam', 2147483647, 'Padang'),
('CUST2', 'SMK N 1 Padang', 2147483647, 'Jl. Ahmad Yunus, Anduring'),
('CUST3', 'Bayu', 2147483647, 'Padang Utara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_detail_transaksi`
--

CREATE TABLE `tabel_detail_transaksi` (
  `Id_Invoice` char(5) NOT NULL,
  `Id_Barang` char(5) NOT NULL,
  `Jumlah_Barang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_detail_transaksi`
--

INSERT INTO `tabel_detail_transaksi` (`Id_Invoice`, `Id_Barang`, `Jumlah_Barang`) VALUES
('Inv_1', 'B1', 1),
('Inv_1', 'B2', 1),
('Inv_2', 'B3', 10),
('Inv_3', 'B4', 1),
('Inv_4', 'B2', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_header_transaksi`
--

CREATE TABLE `tabel_header_transaksi` (
  `Id_Invoice` char(5) NOT NULL,
  `Tanggal` date DEFAULT NULL,
  `Id_Customer` char(5) DEFAULT NULL,
  `Id_Kasir` char(5) DEFAULT NULL,
  `Jumlah_Bayar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_header_transaksi`
--

INSERT INTO `tabel_header_transaksi` (`Id_Invoice`, `Tanggal`, `Id_Customer`, `Id_Kasir`, `Jumlah_Bayar`) VALUES
('Inv_1', '2024-06-14', 'CUST1', 'KSR1', '10000000'),
('Inv_2', '2024-06-14', 'CUST2', 'KSR2', '1000000'),
('Inv_3', '2024-06-30', 'CUST3', 'KSR1', '10000000'),
('Inv_4', '2024-07-03', 'CUST3', 'KSR1', '300000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kasir`
--

CREATE TABLE `tabel_kasir` (
  `Id_Kasir` char(5) NOT NULL,
  `Nama_Kasir` varchar(50) DEFAULT NULL,
  `Telepon_Kasir` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_kasir`
--

INSERT INTO `tabel_kasir` (`Id_Kasir`, `Nama_Kasir`, `Telepon_Kasir`) VALUES
('KSR1', 'Dani', '2147483647'),
('KSR2', 'Iqbal', '2147483647'),
('KSR5', 'Fajar', '12345678');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_login`
--

CREATE TABLE `tabel_login` (
  `username` varchar(35) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_login`
--

INSERT INTO `tabel_login` (`username`, `password`) VALUES
('Dani', '$2y$10$jiSQXBM8m9J2Um9tC.prw.N.ysZIPB960Acqqwn018RWDjuflxYQC'),
('Iqbal', '$2y$10$jiSQXBM8m9J2Um9tC.prw.N.ysZIPB960Acqqwn018RWDjuflxYQC');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_barang`
--
ALTER TABLE `tabel_barang`
  ADD PRIMARY KEY (`Id_Barang`);

--
-- Indeks untuk tabel `tabel_customer`
--
ALTER TABLE `tabel_customer`
  ADD PRIMARY KEY (`Id_Customer`);

--
-- Indeks untuk tabel `tabel_detail_transaksi`
--
ALTER TABLE `tabel_detail_transaksi`
  ADD PRIMARY KEY (`Id_Invoice`,`Id_Barang`),
  ADD KEY `Id_Barang` (`Id_Barang`);

--
-- Indeks untuk tabel `tabel_header_transaksi`
--
ALTER TABLE `tabel_header_transaksi`
  ADD PRIMARY KEY (`Id_Invoice`),
  ADD KEY `Id_Customer` (`Id_Customer`),
  ADD KEY `Id_Kasir` (`Id_Kasir`);

--
-- Indeks untuk tabel `tabel_kasir`
--
ALTER TABLE `tabel_kasir`
  ADD PRIMARY KEY (`Id_Kasir`);

--
-- Indeks untuk tabel `tabel_login`
--
ALTER TABLE `tabel_login`
  ADD PRIMARY KEY (`username`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tabel_detail_transaksi`
--
ALTER TABLE `tabel_detail_transaksi`
  ADD CONSTRAINT `tabel_detail_transaksi_ibfk_1` FOREIGN KEY (`Id_Invoice`) REFERENCES `tabel_header_transaksi` (`Id_Invoice`),
  ADD CONSTRAINT `tabel_detail_transaksi_ibfk_2` FOREIGN KEY (`Id_Barang`) REFERENCES `tabel_barang` (`Id_Barang`);

--
-- Ketidakleluasaan untuk tabel `tabel_header_transaksi`
--
ALTER TABLE `tabel_header_transaksi`
  ADD CONSTRAINT `tabel_header_transaksi_ibfk_1` FOREIGN KEY (`Id_Customer`) REFERENCES `tabel_customer` (`Id_Customer`),
  ADD CONSTRAINT `tabel_header_transaksi_ibfk_2` FOREIGN KEY (`Id_Kasir`) REFERENCES `tabel_kasir` (`Id_Kasir`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

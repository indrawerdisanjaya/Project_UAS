-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Okt 2020 pada 10.14
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sisteminformasikasirswasthi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(45) NOT NULL,
  `active` set('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `active`) VALUES
(1, 'indra.werdhisanjaya@gmail.com', '202cb962ac59075b964b07152d234b70', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(45) NOT NULL,
  `kode_barang` char(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `satuan` text NOT NULL,
  `id_kategori_barang` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama`, `harga`, `stok`, `satuan`, `id_kategori_barang`) VALUES
('c4ca4238a0b923820dcc509a6f75849b', 'SVA01', 'HARDDISK 1 TB TOSHIBA', 700000, 4, 'UNIT', 'HRD'),
('c81e728d9d4c2f636f067f89cc14862c', 'SVA02', 'OS WIN 10 PRO', 2400000, 6, 'UNIT', 'SOF'),
('eccbc87e4b5ce2fe28308fd9f2a7baf3', 'SVA03', 'FLASHDISK 16 GB', 85000, 22, 'UNIT', 'AKS'),
('a87ff679a2f3e71d9181a67b7542122c', 'SVA04', 'RAM 4 GB DDR 4', 354000, 20, 'UNIT', 'HRD'),
('e4da3b7fbbce2345d7772b0674a318d5', 'SVA05', 'ADOBE PHOTOSHOP', 160000, 8, 'UNIT', 'SOF'),
('1679091c5a880faf6fb5e6087eb1b2dc', 'SVA06', 'KABEL HDMI 5 METER', 60000, 8, 'UNIT', 'AKS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `kode_customer` varchar(45) NOT NULL,
  `id_customer` char(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`kode_customer`, `id_customer`, `nama`, `no_telp`) VALUES
('c4ca4238a0b923820dcc509a6f75849b', 'CUS01', 'DIDIK ', '08124630278'),
('c81e728d9d4c2f636f067f89cc14862c', 'CUS02', 'NOVA', '08237653987'),
('', 'CUS03', 'INDRA', '14136137247');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `kode_pembelian` char(11) NOT NULL,
  `kode_barang` char(5) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`kode_pembelian`, `kode_barang`, `jumlah`, `sub_total`) VALUES
('SU098765432', 'SVA01', 4, 2600000),
('SU098765432', 'SVA03', 22, 1580000),
('SU098765433', 'SVA02', 6, 11200000),
('SU098765433', 'SVA05', 8, 980000),
('SU098765434', 'SVA04', 20, 6250000),
('SU098765434', 'SVA06', 8, 400000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `no_order` char(11) NOT NULL,
  `kode_barang` char(5) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori_barang` char(3) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_kategori_barang`, `nama_kategori`, `keterangan`) VALUES
('AKS', 'AKSESORIS', 'PERLENGKAPAN PENUNJANG'),
('HRD', 'HARDWARE', 'PERANGKAT KERAS, STOK TERBATAS'),
('SOF', 'SOFTWARE', 'PERANGKAT LUNAK, SIAP DIINSTALL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_order`
--

CREATE TABLE `kategori_order` (
  `kode_kategori` char(4) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_order`
--

INSERT INTO `kategori_order` (`kode_kategori`, `nama_kategori`) VALUES
('PBLN', 'PEMBELIAN'),
('PSRV', 'PEMBELIAN DAN SERVICE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_pegawai`
--

CREATE TABLE `kategori_pegawai` (
  `id_kategori_pegawai` char(3) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_pegawai`
--

INSERT INTO `kategori_pegawai` (`id_kategori_pegawai`, `nama_kategori`) VALUES
('KSR', 'KASIR'),
('KUR', 'KURIR'),
('TEK', 'TEKNISI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota_pembelian`
--

CREATE TABLE `nota_pembelian` (
  `id_pembelian` varchar(45) NOT NULL,
  `kode_pembelian` char(11) NOT NULL,
  `id_pegawai` char(5) NOT NULL,
  `kode_pemasok` char(4) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nota_pembelian`
--

INSERT INTO `nota_pembelian` (`id_pembelian`, `kode_pembelian`, `id_pegawai`, `kode_pemasok`, `tanggal`, `total`) VALUES
('c4ca4238a0b923820dcc509a6f75849b', 'SU098765432', 'KUR01', 'SP01', '2020-06-01', 4180000),
('c81e728d9d4c2f636f067f89cc14862c', 'SU098765433', 'KUR02', 'SP02', '2020-06-02', 12180000),
('eccbc87e4b5ce2fe28308fd9f2a7baf3', 'SU098765434', 'KUR01', 'SP02', '2020-06-03', 6650000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota_penjualan`
--

CREATE TABLE `nota_penjualan` (
  `id_penjualan` varchar(45) NOT NULL,
  `no_order` char(11) NOT NULL,
  `id_customer` char(5) NOT NULL,
  `id_pegawai` char(5) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nota_penjualan`
--

INSERT INTO `nota_penjualan` (`id_penjualan`, `no_order`, `id_customer`, `id_pegawai`, `tanggal`, `keterangan`, `total`) VALUES
('c4ca4238a0b923820dcc509a6f75849b', 'OR01', 'CUS01', 'KSR02', '2020-10-30', 'LUNAS', 1400000),
('c81e728d9d4c2f636f067f89cc14862c', 'OR02', 'CUS02', 'KSR02', '2020-10-31', 'LUNAS', 800000),
('eccbc87e4b5ce2fe28308fd9f2a7baf3', 'OR03', 'CUS03', 'KSR05', '2020-10-31', 'LUNAS', 2000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `kode_pegawai` int(15) NOT NULL,
  `id_pegawai` char(5) NOT NULL,
  `no_ktp` char(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` text NOT NULL,
  `id_kategori_pegawai` char(3) NOT NULL,
  `photo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`kode_pegawai`, `id_pegawai`, `no_ktp`, `nama`, `alamat`, `no_telp`, `id_kategori_pegawai`, `photo`) VALUES
(2, 'KSR02', '1234567891018743', 'DINATA', 'BANYUNING', '0889262637921', 'KSR', '1.JPG'),
(3, 'KSR05', '5108061101010003', 'SUCITA', 'JLN.Menjangan, Bali', '1547235236', 'KSR', 'images.jpg'),
(4, 'KUR01', '1234567891018764', 'NURRAHMAN', 'BANYUASRI', '08123872629', 'KUR', 'images_2.jpg'),
(5, 'KUR02', '1234567891013167', 'NATA', 'PANJI', '088237653876', 'KUR', 'images_3.jpg'),
(6, 'TEK02', '1234567891016352', 'WERDI', 'PENATARAN', '087739664776', 'TEK', 'gambar.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasok`
--

CREATE TABLE `pemasok` (
  `kode_pemasok` char(4) NOT NULL,
  `nama_pemasok` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemasok`
--

INSERT INTO `pemasok` (`kode_pemasok`, `nama_pemasok`, `alamat`, `no_telp`) VALUES
('SP01', 'PT BOYS', 'BANYUASRI', '036291192'),
('SP02', 'PT ELIAS', 'MONANG-MANING', '036212345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `kode_pembelian` char(11) NOT NULL,
  `kode_pemasok` char(4) NOT NULL,
  `id_pegawai` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`kode_pembelian`, `kode_pemasok`, `id_pegawai`) VALUES
('SU098765432', 'SP01', 'KUR01'),
('SU098765433', 'SP02', 'KUR02'),
('SU098765434', 'SP02', 'KUR01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `no_order` char(11) NOT NULL,
  `id_pegawai` char(5) NOT NULL,
  `kode_kategori` char(4) NOT NULL,
  `id_customer` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `id_kategori_barang` (`id_kategori_barang`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`kode_pembelian`,`kode_barang`),
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `kode_pembelian` (`kode_pembelian`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`no_order`,`kode_barang`),
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `no_order` (`no_order`);

--
-- Indeks untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_kategori_barang`);

--
-- Indeks untuk tabel `kategori_order`
--
ALTER TABLE `kategori_order`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indeks untuk tabel `kategori_pegawai`
--
ALTER TABLE `kategori_pegawai`
  ADD PRIMARY KEY (`id_kategori_pegawai`);

--
-- Indeks untuk tabel `nota_pembelian`
--
ALTER TABLE `nota_pembelian`
  ADD PRIMARY KEY (`kode_pembelian`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `kode_pemasok` (`kode_pemasok`);

--
-- Indeks untuk tabel `nota_penjualan`
--
ALTER TABLE `nota_penjualan`
  ADD PRIMARY KEY (`no_order`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_kategori_pegawai` (`id_kategori_pegawai`);

--
-- Indeks untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`kode_pemasok`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`kode_pembelian`),
  ADD KEY `kode_pemasok` (`kode_pemasok`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`no_order`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `kode_kategori` (`kode_kategori`),
  ADD KEY `no_order` (`no_order`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori_barang`) REFERENCES `kategori_barang` (`id_kategori_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD CONSTRAINT `detail_pembelian_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pembelian_ibfk_3` FOREIGN KEY (`kode_pembelian`) REFERENCES `nota_pembelian` (`kode_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_ibfk_1` FOREIGN KEY (`no_order`) REFERENCES `nota_penjualan` (`no_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penjualan_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nota_pembelian`
--
ALTER TABLE `nota_pembelian`
  ADD CONSTRAINT `nota_pembelian_ibfk_2` FOREIGN KEY (`kode_pemasok`) REFERENCES `pemasok` (`kode_pemasok`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_pembelian_ibfk_3` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nota_penjualan`
--
ALTER TABLE `nota_penjualan`
  ADD CONSTRAINT `nota_penjualan_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_penjualan_ibfk_3` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_kategori_pegawai`) REFERENCES `kategori_pegawai` (`id_kategori_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`kode_pemasok`) REFERENCES `pemasok` (`kode_pemasok`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`kode_kategori`) REFERENCES `kategori_order` (`kode_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualan_ibfk_3` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualan_ibfk_4` FOREIGN KEY (`no_order`) REFERENCES `nota_penjualan` (`no_order`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

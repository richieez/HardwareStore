-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2020 pada 14.22
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hardwarestore_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(255) NOT NULL,
  `id_produk` varchar(255) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `id_transaksi`, `id_produk`, `jumlah`) VALUES
(5, '805fdc301330e21', '20201214075811', 1),
(6, '805fdc301330e21', '20201214040117', 5),
(7, '805fdc301330e21', '20201214041411', 1),
(8, '805fdc39503ef14', '20201214074620', 7),
(9, '805fdc39503ef14', '20201214080015', 2),
(10, '805fdc91e70786e', '20201218120737', 1),
(11, '805fdc91e70786e', '20201214073916', 1),
(12, '805fdc91e70786e', '20201218121452', 2),
(13, '805fdc96b32927b', '20201214041411', 2),
(14, '805fdc96b32927b', '20201214080015', 1),
(15, '805fdc9a015c1db', '20201214074133', 12),
(16, '805fdd601ab5471', '20201214075440', 1),
(17, '805fddbefe775d6', '20201218121452', 5),
(18, '805fddbefe775d6', '20201214041411', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_prodak`
--

CREATE TABLE `foto_prodak` (
  `id_foto` int(255) NOT NULL,
  `id_produk` varchar(255) NOT NULL,
  `foto_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `foto_prodak`
--

INSERT INTO `foto_prodak` (`id_foto`, `id_produk`, `foto_produk`) VALUES
(71, '20201214040117', '202012140401170.jpg'),
(72, '20201214040117', '202012140401171.jpg'),
(73, '20201214040117', '202012140401172.jpg'),
(74, '20201214041411', '202012140414110.png'),
(75, '20201214041411', '202012140414111.jpg'),
(76, '20201214041411', '202012140414112.png'),
(77, '20201214041411', '202012140414113.jpg'),
(78, '20201214073916', '202012140739160.jpg'),
(79, '20201214073916', '202012140739161.jpg'),
(80, '20201214073916', '202012140739162.jpg'),
(81, '20201214074133', '202012140741330.jpg'),
(82, '20201214074133', '202012140741331.jpg'),
(83, '20201214074133', '202012140741332.jpg'),
(84, '20201214074620', '202012140746200.jpg'),
(85, '20201214074620', '202012140746201.jpg'),
(86, '20201214074620', '202012140746202.jpg'),
(87, '20201214075440', '202012140754400.jpg'),
(88, '20201214075440', '202012140754401.jpg'),
(89, '20201214075440', '202012140754402.jpg'),
(90, '20201214075811', '202012140758110.png'),
(91, '20201214075811', '202012140758111.jpg'),
(92, '20201214075811', '202012140758112.jpg'),
(93, '20201214080015', '202012140800150.jpg'),
(94, '20201214080015', '202012140800151.jpg'),
(95, '20201218120737', '202012181207370.jpg'),
(96, '20201218120737', '202012181207371.png'),
(97, '20201218120737', '202012181207372.png'),
(98, '20201218121452', '202012181214520.jpg'),
(99, '20201218121452', '202012181214521.jpg'),
(100, '20201218121452', '202012181214522.jpg'),
(101, '20201219093002', '202012190930020.jpg'),
(102, '20201219093002', '202012190930021.jpg'),
(103, '20201219093002', '202012190930022.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item`
--

CREATE TABLE `item` (
  `id_produk` varchar(255) NOT NULL,
  `kategori_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(80) NOT NULL,
  `harga_produk` int(50) NOT NULL,
  `stok_produk` int(10) NOT NULL,
  `ket_produk` text NOT NULL,
  `foto_produk` varchar(250) NOT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `item`
--

INSERT INTO `item` (`id_produk`, `kategori_produk`, `nama_produk`, `harga_produk`, `stok_produk`, `ket_produk`, `foto_produk`, `created_at`) VALUES
('20201214040117', 'Motherboard', 'ROG Maximus XII Apex Z570', 11000000, 5, ' \r\n	                	The best gaming motherboard for extreme overclocking	                ', '202012140401170.jpg', '2020-12-14'),
('20201214041411', 'VGA Card', 'ROG Strix RTX 3080', 19000000, 3, 'VGA terbaru dari asus dengan architecture ampere', '202012140414110.png', '2020-12-14'),
('20201214073916', 'CPU', 'Ryzen 5600x', 5800000, 7, 'cpu dengan 6 core 12 thread dengan boostclock hingga 5.0 Ghz', '202012140739160.jpg', '2020-12-14'),
('20201214074133', 'CPU', 'Intel I7 10700K', 10500000, 5, 'The best gaming cpu on the market', '202012140741330.jpg', '2020-12-14'),
('20201214074620', 'AIO Cooler', 'Corsair H115i RGB ', 4500000, 3, 'AIO CPU cooler with 280mm fan ', '202012140746200.jpg', '2020-12-14'),
('20201214075440', 'VGA Card', 'AMD Radeon RX 6800XT', 12000000, 1, 'The best vga for mining ', '202012140754400.jpg', '2020-12-14'),
('20201214075811', 'Memory', 'Gskill TridentZ Royale', 3800000, 5, '4200mhz @cl16', '202012140758110.png', '2020-12-14'),
('20201214080015', 'SSD', 'Samsung Evo 970 Pro', 5300000, 7, 'pcie gen 3 speed up to 3500mhz', '202012140800150.jpg', '2020-12-14'),
('20201218120737', 'Motherboard', 'MSI X570 Edge Wifi', 8000000, 11, 'Motherboard gaming with X570 Chipset compatible with amd Ryzen ', '202012181207370.jpg', '2020-12-18'),
('20201218121452', 'AIO Cooler', 'MSI MAG Coreliquid 240R', 3200000, 10, '240mm AIO Watercooling with RGB', '202012181214520.jpg', '2020-12-18'),
('20201219093002', 'VGA Card', 'Evga Kingpin RTX 2080', 16000000, 5, 'RTX 2080 watercooling by Evga with kingpin standard ', '202012190930020.jpg', '2020-12-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_member` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tlp_member` varchar(15) NOT NULL,
  `email_member` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `nama_member`, `alamat`, `tlp_member`, `email_member`) VALUES
(3, 'try27', '$2y$10$TMD/gISM2XstEmnUNBj3B.fbDGddo/lkXRxN1dRVVxUzYhdkANKUu', 'usernew', 'Jl Raya Kampus Unud, Jimbaran, Badung, Bali', '+6281945795745', 'user@gmail.com'),
(6, 'member', '$2y$10$4wtE97YgMB51vMQgPkdJbua2Gz9qnNSoY0My4/0fuBjafz9OkFZTy', 'member', 'Jl. Bedugul, Kintamani, Bangli', '+6281945795745', 'user@gmail.com'),
(8, 'user', '$2y$10$bkbbgIw6.ur8d/3059mZHuBr77oFymuXFko.hfVd86T1w5CRaAK9u', 'user', 'Jl. Buluh Indah No.32, Denpasar Utara', '+6281945795745', 'user@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(255) NOT NULL,
  `id_pembeli` varchar(50) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `tlp_penerima` varchar(15) NOT NULL,
  `total_belanja` int(255) NOT NULL,
  `konfirmasi` varchar(10) NOT NULL DEFAULT 'False',
  `konfirmasi_pembeli` varchar(10) NOT NULL DEFAULT 'False',
  `bukti_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pembeli`, `lokasi`, `tgl_pembelian`, `tlp_penerima`, `total_belanja`, `konfirmasi`, `konfirmasi_pembeli`, `bukti_pembayaran`) VALUES
('805fdc301330e21', 'try27', 'Jl Raya Kampus Unud, Jimbaran, Badung, Bali', '2020-12-18', '+6281945795745', 77800000, 'True', 'True', '5fdc301330e30.jpg'),
('805fdc39503ef14', 'member', 'Jl. Bedugul, Kintamani, Bangli', '2020-12-18', '+6281945795745', 42100000, 'True', 'True', '5fdc3986e2336.jpg'),
('805fdc91e70786e', 'try27', 'Jl Raya Kampus Unud, Jimbaran, Badung, Bali', '2020-12-18', '+6281945795745', 20200000, 'True', 'True', '5fdc91e70787a.jpg'),
('805fdc96b32927b', 'user', 'Jl. Buluh Indah No.32, Denpasar Utara', '2020-12-18', '+6281945795745', 43300000, 'True', 'True', '5fdc96b32928c.jpg'),
('805fdc9a015c1db', 'user', 'Jl. Buluh Indah No.32, Denpasar Utara', '2020-12-18', '+6281945795745', 126000000, 'True', 'False', '5fdc9a015c1e9.jpg'),
('805fdd601ab5471', 'member', 'Jl. Bedugul, Kintamani, Bangli', '2020-12-19', '+6281945795745', 12000000, 'True', 'True', '5fdd601ab5486.jpg'),
('805fddbefe775d6', 'try27', 'Jl Raya Kampus Unud, Jimbaran, Badung, Bali', '2020-12-19', '+6281945795745', 111000000, 'True', 'True', '5fddbefe775e7.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `foto_prodak`
--
ALTER TABLE `foto_prodak`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indeks untuk tabel `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `foto_prodak`
--
ALTER TABLE `foto_prodak`
  MODIFY `id_foto` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

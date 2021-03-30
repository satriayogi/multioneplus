-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Mar 2021 pada 12.06
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multioneplus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `balas_komentar`
--

CREATE TABLE `balas_komentar` (
  `id` int(11) NOT NULL,
  `id_komentar` int(11) NOT NULL,
  `id_sys_user` int(11) NOT NULL,
  `balas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `nama_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `nama_category`) VALUES
(6, '4D'),
(7, '5 Pleats'),
(8, 'KF'),
(10, 'Duckbil'),
(13, 'Kids');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(70) NOT NULL,
  `kec` varchar(200) NOT NULL,
  `no_rmh` varchar(10) NOT NULL,
  `kodepos` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `nama`, `email`, `username`, `password`, `gambar`, `tanggal_lahir`, `jenis_kelamin`, `no_tlp`, `alamat`, `kota`, `kec`, `no_rmh`, `kodepos`, `status`) VALUES
(3, 'qe', 'qwe@gmail.com', 'asd', '$2y$10$6CDr342YKO71oeuBCOFLreY81jRJlxev2rkDH/5hiQp.Il6xCeZKW', '', '0000-00-00', '', '', '', '', '', '', 0, 1),
(4, 'hr', 'asd@gmail.com', 'ger', '$2y$10$IbZrEOolt/ns49O0LVP2nOXSDEYK1ME2NP5yeaWYU2LrffGRWcaJ.', '', '0000-00-00', '', '', '', '', '', '', 0, 1),
(5, 'Satria', 'satria@gmail.com', 'Satria', '$2y$10$2HvkDLgofLggz4FzskLD2O/F887eZ6Wcl3IMPLrUDyMOFTX7PUjxm', '', '0000-00-00', '', '', '', '', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `pcs` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `kode_discount` varchar(20) NOT NULL,
  `potongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `discount`
--

INSERT INTO `discount` (`id`, `id_product`, `id_customer`, `kode_discount`, `potongan`) VALUES
(1, 64, 0, '2P2r2TBbryTNnbI', 30),
(3, 63, 0, 'nrTxOGZ98vKL90R', 10),
(4, 63, 0, '3xBdSLn6QC5UDkM', 7),
(5, 63, 0, 'K0c0BBXCFnw4yLm', 5),
(6, 63, 0, '', 8),
(7, 63, 0, 'TWZ0JdnDTrDJnzQ', 326),
(8, 63, 0, 'TWZ0JdnDTrDJnzQ', 326),
(9, 63, 0, 'y1K0WldTQuKVSqb', 4),
(10, 63, 0, 'MkdUkGUB2qgZ3RX', 6),
(11, 63, 0, 'sRzecnZ9sBGgda0', 8),
(12, 63, 0, '2F2vH13UwPW2BNS', 86),
(13, 63, 0, '2F2vH13UwPW2BNS', 86),
(14, 45, 0, 'ramadhanberkah', 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `gambar2` varchar(225) NOT NULL,
  `gambar3` varchar(225) NOT NULL,
  `gambar4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`id`, `id_product`, `gambar`, `gambar2`, `gambar3`, `gambar4`) VALUES
(45, 70, 'avanz.jpg', 'camera-on-black-surface-1655817.jpg', 'cek.jpg', ''),
(46, 71, 'jj.JPG', 'ff.JPG', 'asdadasdasd.JPG', ''),
(48, 75, '12343.JPG', 'bnmbnm.JPG', '', ''),
(49, 76, 'aaa.JPG', '12343.JPG', '', ''),
(50, 77, 'camera-on-black-surface-1655817.jpg', '12343.JPG', '', ''),
(54, 82, 'asasas.JPG', 'camera-on-black-surface-1655817.jpg', '12343.JPG', 'avanz.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `pcs` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id`, `id_customer`, `id_product`, `pcs`, `harga`, `catatan`, `total`) VALUES
(14, 5, 81, 3, 50000, 'asd', 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang_warna`
--

CREATE TABLE `keranjang_warna` (
  `id` int(11) NOT NULL,
  `id_keranjang` int(11) NOT NULL,
  `warna` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keranjang_warna`
--

INSERT INTO `keranjang_warna` (`id`, `id_keranjang`, `warna`) VALUES
(1, 7, 'coklat'),
(2, 7, 'Abu-abu'),
(3, 9, 'coklat'),
(4, 9, 'Abu-abu'),
(5, 10, 'Abu-abu'),
(6, 11, 'biru langit'),
(7, 11, 'Biru muda'),
(8, 12, 'coklat'),
(9, 13, 'biru langit'),
(10, 13, 'Biru muda'),
(11, 14, 'coklat'),
(12, 14, 'Abu-abu'),
(13, 15, 'coklat'),
(14, 15, 'Abu-abu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `komen` text NOT NULL,
  `ratting` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `id_product`, `id_customer`, `komen`, `ratting`) VALUES
(2, 81, 5, 'baragnya bagus banget', 5),
(3, 81, 5, 'aku suka sekali', 3),
(4, 81, 5, 'barang hilang :(', 2),
(6, 82, 5, 'barang bagus banget', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `jenis_paket` varchar(255) NOT NULL,
  `no_resi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_operator`
--

CREATE TABLE `log_operator` (
  `id` int(11) NOT NULL,
  `id_sys_user` int(11) NOT NULL,
  `id_log` int(11) NOT NULL,
  `tanggal_history` datetime NOT NULL,
  `history` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `nama_product` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `harga` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `id_category`, `nama_product`, `keterangan`, `harga`, `discount`, `stok`, `status`) VALUES
(70, 11, 'masker', 'kids', 7000, 2000, 20, 99),
(71, 11, 'sdfsdfhfgh', 'ererhfddfhgf', 20000, 0, 10, 99),
(73, 13, 'ads', 'qweqwe', 20000, 0, 10, 99),
(74, 13, 'wer', 'werwer', 20000, 0, 10, 99),
(75, 13, 'geer', 'fdgdf', 5000, 0, 10, 99),
(76, 13, 'adsad', 'qweqwe', 5000, 0, 20, 99),
(77, 13, 'vnbc', 'wqer', 5000, 0, 1, 99),
(81, 13, 'Pinguin', 'Waterproof\r\n                                 Mudah di Bersihkan \r\n                                 Cocok untuk MC, Marketing, Olah Raga\r\n                                Non medical', 50000, 0, 20, 99),
(82, 13, 'Pinguin', 'ghjhgj', 50000, 0, 20, 99);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ratting`
--

CREATE TABLE `ratting` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_komentar` int(11) NOT NULL,
  `ratting` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_sys_user`
--

CREATE TABLE `role_sys_user` (
  `id` int(11) NOT NULL,
  `id_sys_user` int(11) NOT NULL,
  `operator` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `laporan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role_sys_user`
--

INSERT INTO `role_sys_user` (`id`, `id_sys_user`, `operator`, `product`, `category`, `laporan`) VALUES
(2, 5, 1, 1, 0, 0),
(5, 8, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `slideshow`
--

CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `alt` varchar(255) NOT NULL,
  `url` varchar(50) NOT NULL,
  `name_button` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `slideshow`
--

INSERT INTO `slideshow` (`id`, `gambar`, `title`, `isi`, `alt`, `url`, `name_button`, `position`) VALUES
(1, 'banner.png', 'MULTI ONE PLUS MASK', 'Earloop Mask Multi One Plus', 'asd', 'qwe', 'BUY NOW', 'left'),
(4, 'banner2.png', 'MULTI ONE PLUS MASK', 'The Willow Teamplate is Transformed for a modern branding and web design boutique template', 'sa', 'as', 'BELI SEKARANG', 'right');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `style_warna`
--

CREATE TABLE `style_warna` (
  `id` int(11) NOT NULL,
  `nama_warna` varchar(100) NOT NULL,
  `warna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `style_warna`
--

INSERT INTO `style_warna` (`id`, `nama_warna`, `warna`) VALUES
(1, 'biru langit', '#83e4db'),
(2, 'coklat', '#603913'),
(3, 'Biru muda', '#bfe5fa'),
(4, 'Abu-abu', '#84888a'),
(5, 'putih', '#fff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `nama_sub_category` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sys_user`
--

CREATE TABLE `sys_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sys_user`
--

INSERT INTO `sys_user` (`id`, `nama`, `email`, `alamat`, `no_tlp`, `username`, `password`, `status`) VALUES
(5, 'satria', 'as@gmail.com', 'Jl.garuda', '08887888767', 'satria', 'asd', 1),
(8, 'yogi', 'bayu@gmail.com', 'Jl.garuda ujung', '08887888767', 'asd', 'asd', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `jenis_paket` varchar(100) NOT NULL,
  `no_resi` varchar(200) NOT NULL,
  `metode_pembayaran` varchar(100) NOT NULL,
  `harga_kurir` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `discount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `warna`
--

CREATE TABLE `warna` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_stylecolor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `warna`
--

INSERT INTO `warna` (`id`, `id_product`, `id_stylecolor`) VALUES
(3, 0, 1),
(4, 0, 2),
(5, 0, 3),
(6, 76, 2),
(7, 76, 3),
(8, 76, 4),
(9, 77, 1),
(10, 77, 2),
(13, 70, 3),
(14, 70, 4),
(15, 70, 5),
(16, 78, 2),
(17, 78, 3),
(18, 78, 4),
(19, 79, 1),
(20, 79, 2),
(21, 79, 3),
(22, 80, 2),
(23, 80, 3),
(24, 81, 2),
(25, 81, 4),
(70, 82, 1),
(71, 82, 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `balas_komentar`
--
ALTER TABLE `balas_komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjang_warna`
--
ALTER TABLE `keranjang_warna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_operator`
--
ALTER TABLE `log_operator`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ratting`
--
ALTER TABLE `ratting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_sys_user`
--
ALTER TABLE `role_sys_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `style_warna`
--
ALTER TABLE `style_warna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sys_user`
--
ALTER TABLE `sys_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `balas_komentar`
--
ALTER TABLE `balas_komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `keranjang_warna`
--
ALTER TABLE `keranjang_warna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `log_operator`
--
ALTER TABLE `log_operator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `ratting`
--
ALTER TABLE `ratting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `role_sys_user`
--
ALTER TABLE `role_sys_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `style_warna`
--
ALTER TABLE `style_warna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sys_user`
--
ALTER TABLE `sys_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `warna`
--
ALTER TABLE `warna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

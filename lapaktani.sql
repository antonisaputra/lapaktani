-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 15 Okt 2022 pada 07.41
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lapaktani`
--

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_penjualan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_penjualan` (
`id` int(11)
,`nama_produk` varchar(100)
,`kategori` varchar(100)
,`nama_penjual` varchar(100)
,`alamat_penjual` varchar(255)
,`stok` int(11)
,`berat_satuan` int(11)
,`harga_satuan` int(20)
,`gambar` varchar(255)
,`detail` text
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_pesanan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_pesanan` (
`id` int(11)
,`nama_produk` varchar(100)
,`kategori` varchar(100)
,`nama_pemesan` varchar(100)
,`alamat_pemesan` varchar(255)
,`stok` int(50)
,`berat_satuan` int(11)
,`harga_satuan` int(100)
,`gambar` varchar(255)
,`detail` text
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `join_keranjang_produk`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `join_keranjang_produk` (
`id` int(11)
,`id_transaksi` int(11)
,`id_costumer` int(11)
,`nama_produk` varchar(100)
,`nama_penjual` varchar(100)
,`alamat_penjual` varchar(255)
,`stok` int(11)
,`berat_satuan` int(11)
,`harga_satuan` int(20)
,`gambar` varchar(255)
,`detail` text
,`jumlah` int(125)
,`harga` int(125)
,`subtotal` int(125)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(4, 'Bibit'),
(5, 'Buah-Buahan'),
(9, 'Sayur'),
(10, 'Bumbu'),
(11, 'Sayur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_costumer` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `jumlah` int(125) NOT NULL,
  `harga` int(125) NOT NULL,
  `subtotal` int(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id`, `id_transaksi`, `id_costumer`, `id_produk`, `nama_produk`, `jumlah`, `harga`, `subtotal`) VALUES
(30, 11, 9, 3, 'Jeruk', 3, 13000, 39000),
(31, 12, 9, 2, 'Bawang', 1, 20000, 20000),
(33, 0, 9, 7, 'jagung', 1, 2500, 2500),
(34, 0, 9, 3, 'Jeruk', 3, 13000, 39000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `id` int(11) NOT NULL,
  `kurir` varchar(125) NOT NULL,
  `ongkir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`id`, `kurir`, `ongkir`) VALUES
(1, 'JNE', 35000),
(2, 'JNT', 38000),
(3, 'POS kilat', 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_penjual` varchar(100) NOT NULL,
  `alamat_penjual` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `berat_satuan` int(11) NOT NULL,
  `harga_satuan` int(20) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `id_user`, `nama_produk`, `id_kategori`, `nama_penjual`, `alamat_penjual`, `stok`, `berat_satuan`, `harga_satuan`, `gambar`, `detail`, `waktu`) VALUES
(2, 0, 'Bawang', 9, 'Toni', 'Semedang Jawa Barat', 145, 1, 20000, '070908000_1483457525-rubrik-pencernaan-sehat_Apakah-Bawang-Berpengaruh-Terhadap-Gastritis.jpg', '', '2022-10-13 15:05:05'),
(3, 0, 'Jeruk', 5, 'Arif', 'Praya NTB', 144, 1, 13000, '8-manfaat-buah-jeruk-bagi-kesehatan-rasakan-kesegarannya-191014y.jpg', '', '2022-10-13 15:05:05'),
(7, 9, 'jagung', 9, 'emha asqolani', 'Desa Setanggor Selatan', 1000, 1, 2500, '097414500_1438079406-20150728-Jagung1.jpg', '<p><strong>Dengan Buah Yang Berkulitas Dan Rasa Yang Nikmat</strong></p>', '2022-10-13 15:05:05'),
(8, 9, 'Bayam', 11, 'emha asqolani', 'Desa Setanggor Selatan', 2000, 1, 3000, '097414500_1438079406-20150728-Jagung2.jpg', '<p>dcfgbhjmkl;</p>', '2022-10-13 15:55:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `alamat_pemesan` varchar(255) NOT NULL,
  `stok` int(50) NOT NULL,
  `berat_satuan` int(11) NOT NULL,
  `harga_satuan` int(100) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_user`, `nama_produk`, `id_kategori`, `nama_pemesan`, `alamat_pemesan`, `stok`, `berat_satuan`, `harga_satuan`, `gambar`, `detail`, `waktu`) VALUES
(2, 1, 'bawang', 4, 'jamal', 'jawa barat', 19, 1, 8000, 'air_terjun_sarang_walet.jpg', '', '2022-10-13 15:07:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_costumer` int(11) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `catatan_pembelian` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `ongkir` int(125) NOT NULL,
  `metode_pembayaran` varchar(125) NOT NULL,
  `no_rek` int(11) NOT NULL,
  `kurir` varchar(125) NOT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_costumer`, `no_hp`, `catatan_pembelian`, `alamat`, `ongkir`, `metode_pembayaran`, `no_rek`, `kurir`, `tanggal_transaksi`, `status`) VALUES
(11, 9, '+0292039023', 'sadfghjkl;', 'Desa Setanggor Selatan', 35000, 'BRI', 234567890, 'JNE', '2022-10-11 13:42:46', 'Belum Melakukan Pembayaran'),
(12, 9, '+0292039023', 'fgvbhjnklnm', 'Desa Setanggor Selatan', 38000, 'BRI', 35467890, 'JNT', '2022-10-11 14:09:06', 'Belum Melakukan Pembayaran');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `transaksi_user`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `transaksi_user` (
`id` int(11)
,`catatan_pembelian` varchar(255)
,`ongkir` int(125)
,`metode_pembayaran` varchar(125)
,`no_rek` int(11)
,`kurir` varchar(125)
,`tanggal_transaksi` timestamp
,`status` varchar(125)
,`username` varchar(125)
,`jenis_kelamin` varchar(50)
,`email` varchar(255)
,`no_hp` varchar(125)
,`alamat` varchar(255)
,`profil` varchar(255)
,`role` varchar(50)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(125) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `profil` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `tanggal_lahir`, `jenis_kelamin`, `email`, `no_hp`, `alamat`, `profil`, `role`) VALUES
(6, 'antoni saputra', '$2y$10$c7IYgA/whbAJiSdvyesQ2OYmg08OX931B5Wh5sHCp.c6UsoUHsp.e', '1999-11-02', 'Laki-Laki', 'antonisaputra614@gmail.com', '081908211843', 'Desa Setanggor Selatan', 'default.png', 'admin'),
(7, 'abdusyakur', '$2y$10$JZv3Du8u.dGv/7pcV51DSuUHfSrYrW.tRvzlrL/ZxQLLkePQUPUHS', '1998-06-10', 'Laki-Laki', 'abdusyakur123@gmail.com', '+6281982689', 'Kalijaga Baru', 'cok.jpg', 'user'),
(8, 'noval', '$2y$10$ia55LLWiJchmoB04EVaEwekBSD5Ssy7BGKkFRc3.fvcySsoaSdwEG', '2002-03-04', 'Laki-Laki', 'noval@gmail.com', '087543289087', 'kesik', 'default.png', 'user'),
(9, 'emha asqolani', '$2y$10$81vcn89wtdQphYLWy6uEyOApROUUDl3MakS7fqI73kxV39gDRnmrO', '2022-02-01', 'Laki-Laki', 'emha@gmail.com', '+0292039023', 'Desa Setanggor Selatan', 'default.png', 'user');

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_penjualan`
--
DROP TABLE IF EXISTS `detail_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_penjualan`  AS   (select `penjualan`.`id` AS `id`,`penjualan`.`nama_produk` AS `nama_produk`,`kategori`.`kategori` AS `kategori`,`penjualan`.`nama_penjual` AS `nama_penjual`,`penjualan`.`alamat_penjual` AS `alamat_penjual`,`penjualan`.`stok` AS `stok`,`penjualan`.`berat_satuan` AS `berat_satuan`,`penjualan`.`harga_satuan` AS `harga_satuan`,`penjualan`.`gambar` AS `gambar`,`penjualan`.`detail` AS `detail` from (`penjualan` join `kategori`) where `penjualan`.`id_kategori` = `kategori`.`id`)  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_pesanan`
--
DROP TABLE IF EXISTS `detail_pesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_pesanan`  AS   (select `pesanan`.`id` AS `id`,`pesanan`.`nama_produk` AS `nama_produk`,`kategori`.`kategori` AS `kategori`,`pesanan`.`nama_pemesan` AS `nama_pemesan`,`pesanan`.`alamat_pemesan` AS `alamat_pemesan`,`pesanan`.`stok` AS `stok`,`pesanan`.`berat_satuan` AS `berat_satuan`,`pesanan`.`harga_satuan` AS `harga_satuan`,`pesanan`.`gambar` AS `gambar`,`pesanan`.`detail` AS `detail` from (`pesanan` join `kategori`) where `pesanan`.`id_kategori` = `kategori`.`id`)  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `join_keranjang_produk`
--
DROP TABLE IF EXISTS `join_keranjang_produk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `join_keranjang_produk`  AS   (select `keranjang`.`id` AS `id`,`keranjang`.`id_transaksi` AS `id_transaksi`,`keranjang`.`id_costumer` AS `id_costumer`,`penjualan`.`nama_produk` AS `nama_produk`,`penjualan`.`nama_penjual` AS `nama_penjual`,`penjualan`.`alamat_penjual` AS `alamat_penjual`,`penjualan`.`stok` AS `stok`,`penjualan`.`berat_satuan` AS `berat_satuan`,`penjualan`.`harga_satuan` AS `harga_satuan`,`penjualan`.`gambar` AS `gambar`,`penjualan`.`detail` AS `detail`,`keranjang`.`jumlah` AS `jumlah`,`keranjang`.`harga` AS `harga`,`keranjang`.`subtotal` AS `subtotal` from (`keranjang` join `penjualan`) where `keranjang`.`id_produk` = `penjualan`.`id`)  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `transaksi_user`
--
DROP TABLE IF EXISTS `transaksi_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `transaksi_user`  AS   (select `transaksi`.`id` AS `id`,`transaksi`.`catatan_pembelian` AS `catatan_pembelian`,`transaksi`.`ongkir` AS `ongkir`,`transaksi`.`metode_pembayaran` AS `metode_pembayaran`,`transaksi`.`no_rek` AS `no_rek`,`transaksi`.`kurir` AS `kurir`,`transaksi`.`tanggal_transaksi` AS `tanggal_transaksi`,`transaksi`.`status` AS `status`,`user`.`username` AS `username`,`user`.`jenis_kelamin` AS `jenis_kelamin`,`user`.`email` AS `email`,`user`.`no_hp` AS `no_hp`,`user`.`alamat` AS `alamat`,`user`.`profil` AS `profil`,`user`.`role` AS `role` from (`transaksi` join `user`) where `transaksi`.`id_costumer` = `user`.`id`)  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori` (`id_kategori`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

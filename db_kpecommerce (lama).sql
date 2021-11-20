-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Agu 2020 pada 08.53
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kpecommerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_login` int(10) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `jenis_pembayaran` enum('COD','transfer rekening') NOT NULL,
  `status` enum('lunas','belum lunas','','') NOT NULL,
  `tgl_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detailpesanan`
--

CREATE TABLE `tb_detailpesanan` (
  `id_detail` int(11) NOT NULL,
  `id_pesanan` char(12) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(10) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detailpesanan`
--

INSERT INTO `tb_detailpesanan` (`id_detail`, `id_pesanan`, `id_produk`, `qty`, `sub_total`) VALUES
(1, 'BR1598854374', 10, 1, 80000),
(2, 'BR1598854529', 7, 1, 105000),
(3, 'BR1598854837', 13, 1, 310000),
(4, 'BR1598855029', 11, 2, 134000),
(5, 'BR1598855532', 19, 1, 650000),
(6, 'BR1598855744', 2, 1, 50000);

--
-- Trigger `tb_detailpesanan`
--
DELIMITER $$
CREATE TRIGGER `Trigger Pengurangan Stok` AFTER INSERT ON `tb_detailpesanan` FOR EACH ROW UPDATE tb_produk set jumlah_produk = jumlah_produk-new.qty where id_produk=new.id_produk
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detailtransaksi`
--

CREATE TABLE `tb_detailtransaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` varchar(12) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(10) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detailtransaksi`
--

INSERT INTO `tb_detailtransaksi` (`id_detail`, `id_transaksi`, `id_produk`, `qty`, `total`) VALUES
(1, 'BR1598854374', 10, 1, 80000),
(2, 'BR1598854529', 7, 1, 105000),
(3, 'BR1598854837', 13, 1, 310000),
(4, 'BR1598855029', 11, 2, 134000),
(5, 'BR1598855532', 19, 1, 650000),
(6, 'BR1598855744', 2, 1, 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_foto`
--

CREATE TABLE `tb_foto` (
  `id_foto` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_foto`
--

INSERT INTO `tb_foto` (`id_foto`, `id_produk`, `nama_foto`) VALUES
(1, 1, 'bag-1854148_1920.jpg'),
(2, 2, '1598605065batik-2842433_1920.jpg'),
(3, 3, '1598605469nutcracker-577160_1920.jpg'),
(4, 4, '1598605531tableware-983537_1920.jpg'),
(5, 5, '1598605574art-1838414_1920.jpg'),
(6, 6, '1598605718p9.jpg'),
(7, 7, '1598605764p19.jpg'),
(8, 8, '1598605802steins-2767044_1920.jpg'),
(9, 9, '1598605857frogs-1274769_1920.jpg'),
(10, 10, '1598605919different-nationalities-1743392_1920.jpg'),
(11, 11, '1598606094p24.jpg'),
(12, 12, '1598606143p20.jpg'),
(13, 13, '1598606189p8.jpg'),
(14, 14, '1598606257p7.jpg'),
(15, 15, '1598606304p6.jpg'),
(16, 16, '1598606373pinocchio-703375_1920.jpg'),
(17, 17, '1598606451152956301527699618_1529851863797295_8913086183299350528_n.jpg'),
(18, 18, '1598606518kain2.jpg'),
(19, 19, '1598606597p11.jpg'),
(20, 20, '1598606752191.350_912a68cc923b48f9a64725aec86e54f8.jpg'),
(21, 21, '1598606884Desa-Kecupak-Hasilkan-Bermacam-Kerajinan-dari-Batok-Kelapa.png'),
(22, 22, '1598606980kerajinan-khas-jawa-timur-2.jpg'),
(23, 23, '15986071441.JPG'),
(24, 24, '1598607515Screenshot_2020-08-28-16-33-46-42.png'),
(25, 25, '1598607590Screenshot_2020-08-28-16-34-13-87.png'),
(26, 26, '1598607756pinocchio-595732_1920.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(32) NOT NULL,
  `gambar_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `gambar_kategori`) VALUES
(1, 'Hiasan Batik', 'produk/pr2.jpg'),
(2, 'Hiasan Kulit', 'produk/pr1.jpg'),
(3, 'Hiasan Keramik', 'produk/pr3.jpg'),
(4, 'Hiasan Kayu', 'produk/pr4.jpg'),
(5, 'Lainnya', 'produk/pr5.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(32) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(32) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` char(12) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `username`, `email`, `tgl_lhr`, `alamat`, `no_telp`, `password`) VALUES
(1, 'Farikhatus saidah', 'saidah', 'farikhatussaidah49@gmail.com', '1998-08-05', 'Sekaran Lamongan', '628924545550', 'e9b7e10a9d57bde1bc8a6546e69f80fb'),
(2, 'Eka putri sari', 'eka', 'ekaputri26@gmail.com', '1997-08-28', 'Pangean Maduran Lamongan', '628924545660', '79ee82b17dfb837b1be94a6827fa395a'),
(3, 'Anisa Fitri Amalia', 'anisa', 'anisa17@gmail.com', '2020-08-13', 'Latek Sekaran Lamongan', '628224545444', '40cc8f68f52757aff1ad39a006bfbf11'),
(4, 'alvaro rakha', 'alvaro', 'alvarorakha26@gmail.com', '2001-08-12', 'pucuk Lamongan', '628574545660', '98db6b79acb71383b5a83e0bbc1cadd4'),
(5, 'Aris londho', 'aris', 'arislon23@gmail.com', '1990-08-05', 'Maduran Lamongan', '628224545444', '288077f055be4fadc3804a69422dd4f8'),
(6, 'Nurul Hufiyah', 'nurul', 'nurulhufi12@gmail.com', '2020-08-13', 'Babat Lamongan', '628924545550', '6968a2c57c3a4fee8fadc79a80355e4d'),
(7, 'Sastro Putra', 'sastro', 'sastrop23@Gmail.com', '2004-08-25', 'bangkalan', '628224545444', '09bd6aecf2fef5f95b553c96288d145d'),
(8, 'Bagyo andi', 'bagyo', 'bagyo23@gmail.com', '2020-08-11', 'Malang Jawa Timur', '628924545678', 'bf1703a1c200d2255b5add5f4417bcc3'),
(9, 'Isa fatin', 'isa', 'isafat34@gmail.com', '1989-08-12', 'Sidoarjo', '628924545550', '165a1761634db1e9bd304ea6f3ffcf2b'),
(10, 'Raihan Kurniawan ', 'raihan', 'raihank45@gmail.com', '1992-08-31', 'Surabaya', '628924545660', 'daa6b8d04ce72d953d5501adc53ddd82'),
(11, 'muhammad zain', 'zain', 'mzain23@gmail.com', '1996-08-10', 'Gresik', '628774545660', '3ed9b95e4b6f2c345836def81e570ef1'),
(12, 'Adiba Arsy', 'arsy', 'arsy54@gmail.com', '1995-08-06', 'Bojonegoro', '628524545678', '67b3056b4ec1ebf1767d2f38cac965a8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` varchar(12) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(32) NOT NULL,
  `alamat_pesanan` varchar(100) NOT NULL,
  `no_hp` char(12) NOT NULL,
  `total` char(12) NOT NULL,
  `statuspesanan` varchar(32) NOT NULL,
  `id_rekening` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pesanan`, `id_pelanggan`, `nama_pelanggan`, `alamat_pesanan`, `no_hp`, `total`, `statuspesanan`, `id_rekening`, `tanggal`) VALUES
('BR1598854374', 11, 'muhammad zain', 'Gresik', '628774545660', '80000', 'Pesanan Di Terima', 2, '2020-08-31'),
('BR1598854529', 11, 'muhammad zain', 'Gresik', '628774545660', '105000', 'Pesanan Di Terima', 0, '2020-08-31'),
('BR1598854837', 1, 'Farikhatus saidah', 'Sekaran Lamongan', '628924545550', '310000', 'Pesanan Di Batalkan', 0, '2020-08-31'),
('BR1598855029', 2, 'Susan Anif', 'Manyar Sekaran Lamongan', '082776655544', '134000', 'Pesanan Di Terima', 0, '2020-08-31'),
('BR1598855532', 12, 'Risma Imama', 'Karangpilang Babat', '085746465577', '650000', 'Pesanan Di Terima', 7, '2020-08-31'),
('BR1598855744', 12, 'Adiba Arsy', 'Bojonegoro', '628524545678', '50000', 'Pesanan Di Terima', 7, '2020-08-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga_produk` int(10) NOT NULL,
  `jumlah_produk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_kategori`, `nama_produk`, `deskripsi`, `harga_produk`, `jumlah_produk`) VALUES
(1, 2, 'Tas Selempang Kulit. Brown Cassual', 'Terbuat dari kulit asli. Cocok untuk gaya cassual Anda ', 200000, 35),
(2, 1, 'Batik Tulis', 'Batik Tulis asli Madura. Dengan proses pengerjaan yang rapi', 50000, 34),
(3, 4, 'Ornamen Patung', '', 69000, 10),
(4, 3, 'Tea Set Blue Ceramic', '', 158500, 12),
(5, 1, 'Tempat Tissue Batik', '', 45000, 35),
(6, 4, 'Ornamen Kereta Api', '', 100000, 40),
(7, 1, 'Sandal Batik', '', 105000, 39),
(8, 3, 'Pajangan Keramik', '', 500000, 35),
(9, 3, 'Ornamen Patung Katak', '', 205000, 20),
(10, 4, 'Ornamen Patung Suku Indonesia', '', 80000, 19),
(11, 2, 'Bunga Kulit Jagung', '', 67000, 43),
(12, 2, 'Frame Foto Kulit Kerang', '', 45000, 30),
(13, 3, 'Bunga Pajangan Keramik Import', '', 310000, 34),
(14, 3, 'Wadah saji Blue Ceramic', '', 345000, 55),
(15, 3, 'Tea Set + teko Flower', '', 207000, 35),
(16, 4, 'Ornamen Patung Pinokio', '', 45000, 50),
(17, 1, 'Kain Batik Motif Bunga Monokrom', '', 48000, 43),
(18, 1, 'Kain Batik Motif Bunga Red', '', 55000, 20),
(19, 4, 'Jam Tangan Bambu', '', 650000, 19),
(20, 2, 'Lampion Kulit Kelapa', '', 110000, 40),
(21, 2, 'Teas Set + Teko Kulit Kelapa', '', 55000, 60),
(22, 2, 'Tas Anyaman', '', 45000, 35),
(23, 2, 'Pajangan Pespa Kulit Kelapa', '', 75000, 35),
(24, 3, 'Pajangan Burung Merak', '', 500000, 10),
(25, 3, 'Pajangan Bunga Keramik Italy', '', 1500000, 10),
(26, 4, 'Ornamen Patung Pinokio Duduk', '', 45000, 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_promo`
--

CREATE TABLE `tb_promo` (
  `id_promo` int(11) NOT NULL,
  `promo` varchar(100) NOT NULL,
  `syarat_promo` varchar(100) NOT NULL,
  `gambar_promo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_promo`
--

INSERT INTO `tb_promo` (`id_promo`, `promo`, `syarat_promo`, `gambar_promo`) VALUES
(1, 'Grand Opening', 'Hot Sale Hanya Untuk 50 Pelanggan Pertama', 'banner/bn4.jpg'),
(2, 'Cashback Berbagai Jenis Produk', 'Untuk Min. Pembelian Rp500.000', 'banner/bn6.jpg'),
(3, 'Gratis Ongkos Kirim', 'Untuk Min. Belanja Rp150 Ribu', 'banner/bn9.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rekening`
--

CREATE TABLE `tb_rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(32) NOT NULL,
  `no_rek` char(32) NOT NULL,
  `an` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rekening`
--

INSERT INTO `tb_rekening` (`id_rekening`, `nama_bank`, `no_rek`, `an`) VALUES
(2, 'Bank BNI', '123456789101', 'e-UMKM Jatim'),
(4, 'Bank Danamon', '1234567890', 'e-UMKM Jatim'),
(5, 'Bank Mandiri', '1234567890', 'e-UMKM Jatim'),
(7, 'Bank BRI', '99886774883', 'e-UMKM Jatim'),
(8, 'Bank Danamon', '1256778900', 'e-UMKM Jatim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sosmed`
--

CREATE TABLE `tb_sosmed` (
  `id_sosmed` int(1) NOT NULL,
  `nama_sosmed` varchar(32) NOT NULL,
  `nama_akun` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_sosmed`
--

INSERT INTO `tb_sosmed` (`id_sosmed`, `nama_sosmed`, `nama_akun`) VALUES
(1, 'Whatsapp', ' +6285235883542'),
(2, 'Instagram', '@e-umkm_jatim'),
(3, 'Facebook', 'e-umkm Jatim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_toko`
--

CREATE TABLE `tb_toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `email_toko` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_toko`
--

INSERT INTO `tb_toko` (`id_toko`, `nama_toko`, `email_toko`, `logo`) VALUES
(1, 'UMKM JATIM', 'info@e-UMKMJatim.com', 'logo/1597680084logosaida.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` varchar(12) NOT NULL,
  `id_pesanan` varchar(12) NOT NULL,
  `tgl_terima` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_pesanan`, `tgl_terima`) VALUES
('TRBR15988543', 'BR1598854374', '2020-08-31'),
('TRBR15988545', 'BR1598854529', '2020-08-31'),
('TRBR15988548', 'BR1598854837', '2020-08-31'),
('TRBR15988550', 'BR1598855029', '2020-08-31'),
('TRBR15988555', 'BR1598855532', '2020-08-31'),
('TRBR15988557', 'BR1598855744', '2020-08-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_cart`
--

CREATE TABLE `tmp_cart` (
  `id_cart` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_detailcart`
--

CREATE TABLE `tmp_detailcart` (
  `id_detailcart` int(11) NOT NULL,
  `id_cart` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmp_detailcart`
--

INSERT INTO `tmp_detailcart` (`id_detailcart`, `id_cart`, `id_produk`, `harga`, `jumlah`, `total`) VALUES
(1, 1598854374, 10, 80000, 1, 80000),
(2, 1598854529, 7, 105000, 1, 105000),
(3, 1598854837, 13, 310000, 1, 310000),
(4, 1598855029, 11, 67000, 2, 134000),
(5, 1598855532, 19, 650000, 1, 650000),
(6, 1598855744, 2, 50000, 1, 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_pengiriman`
--

CREATE TABLE `tmp_pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `id_cart` int(11) NOT NULL,
  `nama_pelanggan` varchar(32) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmp_pengiriman`
--

INSERT INTO `tmp_pengiriman` (`id_pengiriman`, `id_cart`, `nama_pelanggan`, `alamat`, `no_hp`) VALUES
(1, 1598854374, 'muhammad zain', 'Gresik', '628774545660'),
(2, 1598854529, 'muhammad zain', 'Gresik', '628774545660'),
(3, 1598854837, 'Farikhatus saidah', 'Sekaran Lamongan', '628924545550'),
(4, 1598855029, 'Susan Anif', 'Manyar Sekaran Lamongan', '082776655544'),
(5, 1598855532, 'Risma Imama', 'Karangpilang Babat', '085746465577'),
(6, 1598855744, 'Adiba Arsy', 'Bojonegoro', '628524545678');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `tb_detailpesanan`
--
ALTER TABLE `tb_detailpesanan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `tb_detailtransaksi`
--
ALTER TABLE `tb_detailtransaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_pesanan` (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `tb_foto`
--
ALTER TABLE `tb_foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_rekening` (`id_rekening`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kat` (`id_kategori`);

--
-- Indeks untuk tabel `tb_promo`
--
ALTER TABLE `tb_promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indeks untuk tabel `tb_rekening`
--
ALTER TABLE `tb_rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indeks untuk tabel `tb_sosmed`
--
ALTER TABLE `tb_sosmed`
  ADD PRIMARY KEY (`id_sosmed`);

--
-- Indeks untuk tabel `tb_toko`
--
ALTER TABLE `tb_toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indeks untuk tabel `tmp_cart`
--
ALTER TABLE `tmp_cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indeks untuk tabel `tmp_detailcart`
--
ALTER TABLE `tmp_detailcart`
  ADD PRIMARY KEY (`id_detailcart`),
  ADD KEY `fk_produk_detail` (`id_produk`);

--
-- Indeks untuk tabel `tmp_pengiriman`
--
ALTER TABLE `tmp_pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_foto`
--
ALTER TABLE `tb_foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tb_promo`
--
ALTER TABLE `tb_promo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_rekening`
--
ALTER TABLE `tb_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_sosmed`
--
ALTER TABLE `tb_sosmed`
  MODIFY `id_sosmed` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_toko`
--
ALTER TABLE `tb_toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tmp_detailcart`
--
ALTER TABLE `tmp_detailcart`
  MODIFY `id_detailcart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tmp_pengiriman`
--
ALTER TABLE `tmp_pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_foto`
--
ALTER TABLE `tb_foto`
  ADD CONSTRAINT `fk_produk_foto` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD CONSTRAINT `fk_pelanggan_pesanan` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `fk_pesanan_trans` FOREIGN KEY (`id_pesanan`) REFERENCES `tb_pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tmp_detailcart`
--
ALTER TABLE `tmp_detailcart`
  ADD CONSTRAINT `fk_produk_detail` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

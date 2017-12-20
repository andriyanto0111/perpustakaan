-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01 Agu 2017 pada 09.02
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `no_telephon` varchar(12) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `tgl_expired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `alamat`, `no_telephon`, `tgl_daftar`, `tgl_expired`) VALUES
(11500390, 'Riski Andriyanto', 'Jinggotan', '085444222333', '2017-02-15', '2020-04-03'),
(11500391, 'Yusuf Abdillah', 'Kelet', '085111111111', '2017-02-17', '2017-02-28'),
(11500392, 'Ashikage Yuusa', 'Tokyo, Jepang', '086514152521', '2017-03-22', '2020-03-22'),
(11500442, 'Marlina', 'Sembarang', '087161616161', '2017-03-23', '2020-03-23'),
(11500451, 'Riza Afthoni', 'Bumiharjo', '089656987973', '2017-02-28', '2020-02-28'),
(11500466, 'Rafi Zufar', 'Keling', '085290090038', '2017-02-14', '2020-02-14'),
(11500494, 'Agung Gunawan', 'Kelet', '085256666666', '2015-07-11', '2018-07-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `harga` varchar(12) NOT NULL,
  `id_jenis` varchar(10) NOT NULL,
  `stok` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `penerbit`, `tahun_terbit`, `harga`, `id_jenis`, `stok`) VALUES
(2, 'Pemrogaman CI', 'Grand Media', '2012', '89000', '3', 17),
(3, 'Belajar C++', 'Erlangga', '2013', '110000', '3', 38),
(4, 'Naruto Shippuden Vol 72', 'Elex Media koputindo', '2015', '134000', '1', 14),
(5, 'Bleach Vol 55', 'Elex Media Koputindo', '2014', '89500', '1', 59),
(6, 'Swort Art Online Vol 11', 'Elex Media Koputindo', '2015', '142000', '4', 50),
(7, 'Pemrogaman WEB PHP & Mysql', 'Diomedia', '2014', '200000', '3', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `id_detail_pinjam` int(11) NOT NULL,
  `id_pinjam` varchar(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah_buku` int(1) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `lama_pinjam` int(11) NOT NULL,
  `denda` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pinjam`
--

INSERT INTO `detail_pinjam` (`id_detail_pinjam`, `id_pinjam`, `id_buku`, `jumlah_buku`, `tgl_pinjam`, `tgl_kembali`, `status`, `lama_pinjam`, `denda`) VALUES
(3, 'PNJ0001', 2, 1, '2017-04-03', '2017-04-10', 'pinjam', 0, 0),
(4, 'PNJ0001', 3, 1, '2017-04-03', '2017-04-10', 'pinjam', 0, 0),
(25, 'PNJ0001', 5, 1, '2017-04-04', '2017-04-11', 'pinjam', 0, 0),
(27, 'PNJ0002', 2, 1, '2017-04-04', '2017-04-11', 'kembali', 0, 0),
(28, 'PNJ0002', 3, 1, '2017-04-04', '2017-04-11', 'kembali', 0, 0),
(29, 'PNJ0003', 2, 1, '2017-05-09', '2017-05-16', 'kembali', 0, 0),
(30, 'PNJ0003', 4, 1, '2017-05-09', '2017-05-16', 'kembali', 0, 0);

--
-- Trigger `detail_pinjam`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER INSERT ON `detail_pinjam` FOR EACH ROW BEGIN
UPDATE buku SET stok = stok - NEW.jumlah_buku
WHERE id_buku = NEW.id_buku;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_stok` AFTER DELETE ON `detail_pinjam` FOR EACH ROW BEGIN
UPDATE buku SET stok = stok + 1
WHERE id_buku = OLD.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(255) NOT NULL,
  `no_rak_buku` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `no_rak_buku`) VALUES
(1, 'Komik', 'RK001'),
(2, 'Novel', 'RK002'),
(3, 'Pemrograman', 'RK003'),
(4, 'Light Novel', 'RK004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_admin`, `username`, `password`, `level`) VALUES
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(7, 'manager', '1d0258c2440a8d19e716292b231e3190', 'Manager');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` varchar(11) NOT NULL,
  `tgl_transaksi_pinjam` date NOT NULL,
  `total_pinjam` int(1) NOT NULL,
  `id_anggota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `tgl_transaksi_pinjam`, `total_pinjam`, `id_anggota`) VALUES
('PNJ0001', '2017-04-03', 3, 11500390);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_kembali` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `jumlah_denda` int(255) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_pinjam` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id_kembali`, `tgl_kembali`, `jumlah_denda`, `id_anggota`, `id_pinjam`) VALUES
(3, '2017-04-04', 0, 11500391, 'PNJ0002'),
(4, '2017-05-09', 0, 11500391, 'PNJ0003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD PRIMARY KEY (`id_detail_pinjam`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_kembali`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  MODIFY `id_detail_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_kembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2019 at 06:22 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioskop`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `kode_akun` int(8) NOT NULL,
  `nama_akun` varchar(50) DEFAULT NULL,
  `jenis_akun` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`kode_akun`, `nama_akun`, `jenis_akun`) VALUES
(101, 'Pembelian', NULL),
(500, 'Kas', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bioskop`
--

CREATE TABLE `bioskop` (
  `kode_bioskop` varchar(10) NOT NULL,
  `nama_bioskop` varchar(100) DEFAULT NULL,
  `mgr` varchar(100) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_telp` varchar(25) DEFAULT NULL,
  `no_fax` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bioskop`
--

INSERT INTO `bioskop` (`kode_bioskop`, `nama_bioskop`, `mgr`, `alamat`, `no_telp`, `no_fax`, `email`) VALUES
('JKTATRI', 'ATRIUM XXI', 'Tuti Astuti', 'Mall Atrium Segitiga Senen Jakarta', '0213494231', '0213494232', 'xxiatrium@nsr.co.id'),
('JKTGFR', 'Tangerang City XXI', 'Rudi Akbar', 'Mall Tangerang City Tangerang', '021 7384783', '021 7847837', 'test3@suplier.co.id'),
('JKTKEVI', 'KEMANG VILLAGE XXI', 'Tuti Astuti', 'Kemang Village Jakarta', '0213494999', '0213494998', 'tuti@gmail.com'),
('JKTMETR', 'METROPOLE XXI ', 'Aswandi', 'Jl Megaria , Matrman Jakarta', '0213494213', '0213494212', 'jktmetr@nsr.co.id'),
('TGRBSD', 'BSD XXI', 'Susiana', 'Mall BSD Tangerang', '02134343499', '02134343490', 'tgrbsd@gmail.com'),
('TGRCBD', 'CBD XXI Ciledug', 'Hengki Tornado', 'Malll CBD Ciledug Tangerang', '0217494321', '0217494322', 'cbdxxi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis` varchar(50) NOT NULL,
  `jenis_brg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis`, `jenis_brg`) VALUES
('1', 'Komputer'),
('2', 'Laptop'),
('3', 'Sparepart'),
('4', 'Tissue'),
('5', 'Asesoris Digital'),
('6', 'Tiket'),
('7', 'Lain nya');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id_jurnal` int(11) NOT NULL,
  `no_jurnal` varchar(8) NOT NULL,
  `kode_akun` int(11) DEFAULT NULL,
  `no_ref` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `debet` varchar(10) DEFAULT NULL,
  `kredit` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id_jurnal`, `no_jurnal`, `kode_akun`, `no_ref`, `tanggal`, `keterangan`, `debet`, `kredit`) VALUES
(1, 'J1907001', 500, 'PO000001', '2019-07-17', 'Pembelian', '7500000', '0'),
(2, 'J1907001', 111, 'PO000001', '2019-07-17', 'Kas', '0', '7500000'),
(3, 'J1907002', 500, 'PO000002', '2019-07-17', 'Pembelian', '7050000', '0'),
(4, 'J1907002', 111, 'PO000002', '2019-07-17', 'Kas', '0', '7050000'),
(5, 'J1907003', 500, 'PO000003', '2019-07-17', 'Pembelian', '165000', '0'),
(6, 'J1907003', 111, 'PO000003', '2019-07-17', 'Kas', '0', '165000');

-- --------------------------------------------------------

--
-- Table structure for table `order_pembelian`
--

CREATE TABLE `order_pembelian` (
  `id_order_pembelian` int(100) NOT NULL,
  `no_po` varchar(8) DEFAULT NULL,
  `kode_supplier` varchar(50) NOT NULL,
  `kode_brg` varchar(5) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_pembelian`
--

INSERT INTO `order_pembelian` (`id_order_pembelian`, `no_po`, `kode_supplier`, `kode_brg`, `id_jenis`, `jumlah`, `tanggal`, `status`) VALUES
(3, 'PO000001', 'SUP131214', 'DIG1', 5, 50, '2019-07-17', 1),
(5, 'PO000002', 'DGFDGFD', 'BR082', 4, 50, '2019-07-17', 1),
(6, 'PO000002', 'DGFDGFD', 'BR083', 4, 100, '2019-07-17', 1),
(8, 'PO000003', 'SUP131214', 'TSTB1', 5, 10, '2019-07-17', 1),
(7, 'PO000003', 'SUP131214', 'TST01', 5, 1, '2019-07-17', 1),
(11, 'PO000004', 'SUP34233', 'BR021', 2, 10, '2019-07-17', 2),
(9, 'PO000004', 'SUP34233', 'BR021', 2, 50, '2019-07-17', 2),
(10, 'PO000004', 'SUP34233', 'BR022', 2, 5, '2019-07-17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `kode_pembayaran` int(11) NOT NULL,
  `no_po` varchar(20) DEFAULT NULL,
  `nominal` float DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bank` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`kode_pembayaran`, `no_po`, `nominal`, `tanggal`, `bank`) VALUES
(1, 'PO000001', 7500000, '2019-07-17 08:12:21', 'BCA'),
(2, 'PO000002', 7050000, '2019-07-17 15:21:20', 'BNI'),
(3, 'PO000003', 165000, '2019-07-17 16:17:33', 'MANDIRI');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `kode_brg` varchar(5) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `unit`, `kode_brg`, `jumlah`, `tgl_keluar`) VALUES
(1, 'bsdxxi', 'BR021', 5, '2019-07-17');

--
-- Triggers `pengeluaran`
--
DELIMITER $$
CREATE TRIGGER `TG_STOK_UPDATE` AFTER INSERT ON `pengeluaran` FOR EACH ROW BEGIN

	update stokbarang SET keluar=keluar + NEW.jumlah, 

	sisa=stok-keluar WHERE 

	kode_brg = NEW.kode_brg;



	update permintaan SET status=1 WHERE kode_brg=NEW.kode_brg AND 

	unit=NEW.unit;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `id_permintaan` int(8) UNSIGNED ZEROFILL NOT NULL,
  `no_order` varchar(8) DEFAULT NULL,
  `unit` varchar(20) NOT NULL,
  `kode_brg` varchar(5) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_permintaan` date NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permintaan`
--

INSERT INTO `permintaan` (`id_permintaan`, `no_order`, `unit`, `kode_brg`, `id_jenis`, `jumlah`, `tgl_permintaan`, `keterangan`, `status`) VALUES
(00000002, 'OR000001', 'bsdxxi', 'BR021', 2, 5, '2019-07-17', 'Keperluan Mtix', 1),
(00000003, 'OR000002', 'bsdxxi', 'BR004', 1, 4, '2019-07-17', 'Keperluan Office', 2),
(00000004, 'OR000002', 'bsdxxi', 'BR082', 4, 10, '2019-07-17', 'Keperluan Office', 2),
(00000005, 'OR000002', 'bsdxxi', 'BR035', 3, 5, '2019-07-17', 'Keperluan Office', 2),
(00000007, 'OR000003', 'kevixxi', 'BR083', 4, 9, '2019-07-17', 'Tissue Ruangan', 2),
(00000006, 'OR000003', 'kevixxi', 'BR021', 2, 2, '2019-07-17', 'Keperluan Mtix', 2),
(00000008, 'OR000004', 'bsdxxi', 'BR024', 1, 2, '2019-07-17', 'Keperluan Mtix', 2),
(00000009, 'OR000005', 'bsdxxi', 'DIG1', 5, 4, '2019-07-17', 'Aktifasi Film', 2),
(00000011, 'OR000006', 'atriumxxi', 'BR081', 4, 10, '2019-07-17', 'Tissue Ruangan', 0),
(00000010, 'OR000006', 'atriumxxi', 'BR021', 2, 2, '2019-07-17', 'Keperluan Mtix', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sementara`
--

CREATE TABLE `sementara` (
  `id_sementara` int(100) NOT NULL,
  `no_order` varchar(8) DEFAULT NULL,
  `unit` varchar(50) NOT NULL,
  `kode_brg` varchar(5) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_permintaan` date NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sementara_pembelian`
--

CREATE TABLE `sementara_pembelian` (
  `id_sementara` int(100) NOT NULL,
  `no_po` varchar(8) DEFAULT NULL,
  `kode_supplier` varchar(50) NOT NULL,
  `kode_brg` varchar(5) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stokbarang`
--

CREATE TABLE `stokbarang` (
  `kode_brg` varchar(5) NOT NULL,
  `id_jenis` int(2) NOT NULL,
  `nama_brg` varchar(30) NOT NULL,
  `harga` float DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `keluar` int(11) DEFAULT '0',
  `sisa` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `suplier` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stokbarang`
--

INSERT INTO `stokbarang` (`kode_brg`, `id_jenis`, `nama_brg`, `harga`, `satuan`, `stok`, `keluar`, `sisa`, `tgl_masuk`, `suplier`) VALUES
('BR001', 0, 'ASUS 430P', 4000000, 'Buah', 100, 0, 100, '2017-01-08', 'Sup0001'),
('BR002', 0, 'HP DL3600', 3560000, 'Buah', 265, 0, 265, '2017-01-15', 'SUP34233'),
('BR003', 1, 'Lenovo All in One', 2300000, 'Buah', 30, 3, 27, '2017-04-17', 'Sup0001'),
('BR004', 1, 'Dell PC Desktop', 4300000, 'Buah', 120, 0, 120, '2017-02-14', 'SUP34233'),
('BR005', 1, 'Axio 330', 3100000, 'Buah', 220, 0, 210, '2017-02-14', 'SUP34233'),
('BR006', 1, 'Samsung A330', 3450000, 'Buah', 231, 0, 231, '2017-03-15', 'SUP34233'),
('BR007', 1, 'Apple Desktop', 13450000, 'Buah', 248, 0, 248, '2017-03-30', 'SUP34233'),
('BR021', 2, 'Asus X200 14\"', 4100000, 'Buah', 101, 5, 96, '2017-05-16', 'SUP34233'),
('BR022', 2, 'Macbook Air Pro 14\"', 17550000, 'Buah', 20, 0, 20, '2017-06-19', 'SUP34233'),
('BR023', 2, 'HP DV6700 16\"', 9800000, 'Buah', 38, 0, 38, '2017-05-15', 'SUP34233'),
('BR024', 1, 'Lenovo Thinkpad X500', 6700000, 'Buah', 20, 0, 20, '2017-05-23', 'SUP34233'),
('BR025', 2, 'Dell Latitude 14\"', 4350000, 'Buah', 52, 0, 52, '2017-05-24', 'SUP34233'),
('BR031', 3, 'HDD WD 500 GB', 525000, 'Buah', 298, 0, 298, '2017-06-12', 'SUP34233'),
('BR032', 3, 'HDD Seagate 320 GB', 413000, 'Buah', 23, 0, 13, '2017-06-18', 'SUP34233'),
('BR033', 3, 'HDD WD 320 GB', 412500, 'Buah', 244, 0, 244, '2017-06-20', 'SUP34233'),
('BR034', 3, 'Keyboard', 100000, 'Buah', 200, 0, 200, '2017-06-19', 'SUP34233'),
('BR035', 3, 'Mouse', 75000, 'Buah', 35, 0, 35, '2017-06-19', 'SUP34233'),
('BR036', 3, 'MB Gigabyte', 1325000, 'Buah', 50, 0, 50, '2017-06-27', 'SUP34233'),
('BR037', 3, 'MB Asus', 1214000, 'Buah', 48, 0, 48, '2017-06-26', 'SUP34233'),
('BR038', 3, 'Memori DDR2 2GB', 320000, 'Buah', 77, 0, 45, '2017-06-20', 'SUP34233'),
('BR039', 3, 'Memori DDR3 4GB', 612000, 'Buah', 156, 0, 144, '2017-06-21', 'SUP34233'),
('BR040', 0, 'Memori DDR4 4GB', 610000, 'Buah', 491, 0, 491, '2017-06-28', 'SUP34233'),
('BR041', 3, 'Memori DDR4 8GB', 812000, 'Buah', 80, 0, 80, '2017-06-27', 'SUP34233'),
('BR081', 4, 'Paseo', 15000, 'Buah', 458, 100, 358, '2017-07-10', 'DGFDGFD'),
('BR082', 4, 'Nice', 11000, 'Buah', 350, 100, 200, '2017-07-05', 'DGFDGFD'),
('BR083', 4, 'Detol', 50000, 'liter', 200, 0, 100, '2019-07-03', 'Sup0001'),
('BR084', 0, 'HDD WD 500GB', 1000000, 'buah', 1234, 0, 1234, '2019-07-03', 'Sup0001'),
('DIG1', 5, 'Lisensi', 150000, 'PCS', 150, 0, 100, '2019-07-17', 'SUP131214'),
('T101', 6, 'Tiket Mtix', 300000, 'Box', 100, 0, 100, '2019-07-07', 'DGFDGFD'),
('T201', 6, 'Tiket Standard', 400000, 'Box', 100, 0, 100, '2019-07-17', 'DGFDGFD'),
('TST01', 5, 'LCD Display Trailer', 15000, 'PCS', 101, 0, 100, '2019-07-09', 'SUP131214'),
('TSTB1', 5, 'Lampu Senon', 15000, 'PCS', 144, 0, 134, '2019-07-06', 'SUP131214');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kode_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telp` varchar(25) DEFAULT NULL,
  `no_fax` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kode_supplier`, `nama_supplier`, `alamat`, `no_telp`, `no_fax`, `email`) VALUES
('DGFDGFD', 'Salim Putra', 'Jakarta', '021 7384783', '021 7847837', 'salim@suplier.co.id'),
('Sup0001', 'Maju Gemilang Terus', 'Jakarta', '021 7384783', '021 7847837', 'mage@suplier.co.id'),
('SUP131214', 'Megatech', 'Megaria, Jakarta Pusat', '0217494332', '0217494333', 'mega@gmail.com'),
('SUP131215', 'Bintang Jaya', 'Kenari, Jakarta Pusat', '0213494354', '0213494355', 'bintangjaya@gmail.com'),
('SUP34233', 'Abadi Jaya', 'Glodok Jakarta', '0213494999', '0213494998', 'alita.32@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','bioskop','receiving','pembelian','akuntansi','gudang') NOT NULL,
  `manajer` varchar(50) NOT NULL,
  `receiving` varchar(50) NOT NULL,
  `id_bioskop` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `manajer`, `receiving`, `id_bioskop`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 'admin', 'admin', ''),
(2, 'receiving', '81dc9bdb52d04dc20036dbd8313ed055', 'receiving', 'Bambang Triatmojo', 'Tomi Winata', ''),
(3, 'bsdxxi', '81dc9bdb52d04dc20036dbd8313ed055', 'bioskop', 'Hengky Susanto', 'Bambang Item', 'TGRBSD'),
(4, 'kevixxi', '81dc9bdb52d04dc20036dbd8313ed055', 'bioskop', 'Susanti Andalas', 'akbar', 'JKTKEVI'),
(5, 'pembelian', '81dc9bdb52d04dc20036dbd8313ed055', 'pembelian', 'Siska', 'Ricky', '0'),
(6, 'gudang', '81dc9bdb52d04dc20036dbd8313ed055', 'gudang', 'Vivi Ensa', 'Pius', ''),
(7, 'tangcit', 'fcea920f7412b5da7be0cf42b8c93759', 'bioskop', 'Vivi Ensa', 'Pius', 'JKTGFR'),
(10, 'adminsuper', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Vivi Ensa', 'Iqbal', ''),
(11, 'atriumxxi', '81dc9bdb52d04dc20036dbd8313ed055', 'bioskop', 'Tuti Astuti', 'Vivi', 'JKTATRI'),
(12, 'xxicbd', '81dc9bdb52d04dc20036dbd8313ed055', 'bioskop', 'Hengky Susanto', 'Iqbal', 'TGRCBD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`kode_akun`);

--
-- Indexes for table `bioskop`
--
ALTER TABLE `bioskop`
  ADD PRIMARY KEY (`kode_bioskop`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id_jurnal`);

--
-- Indexes for table `order_pembelian`
--
ALTER TABLE `order_pembelian`
  ADD PRIMARY KEY (`id_order_pembelian`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`kode_pembayaran`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id_permintaan`);

--
-- Indexes for table `sementara`
--
ALTER TABLE `sementara`
  ADD PRIMARY KEY (`id_sementara`);

--
-- Indexes for table `sementara_pembelian`
--
ALTER TABLE `sementara_pembelian`
  ADD PRIMARY KEY (`id_sementara`);

--
-- Indexes for table `stokbarang`
--
ALTER TABLE `stokbarang`
  ADD PRIMARY KEY (`kode_brg`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `kode_akun` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=501;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_pembelian`
--
ALTER TABLE `order_pembelian`
  MODIFY `id_order_pembelian` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `kode_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id_permintaan` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sementara`
--
ALTER TABLE `sementara`
  MODIFY `id_sementara` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sementara_pembelian`
--
ALTER TABLE `sementara_pembelian`
  MODIFY `id_sementara` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

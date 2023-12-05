-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2023 at 12:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sispensa`
--

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nama`, `email`, `password`, `level`) VALUES
(1, 'Admin', 'admin@sispensa.com', '$2y$10$TLEAeF8x0D11rKHU3HrMS.f/O6aSWltZhp06hV.iPSSyZ1txb1Uqm', 'admin'),
(2, 'Yoan', 'yoan@sispensa.com', '$2y$10$a0kEZ1Kr8FIrC4RDYsuz8eCL0mjkZ514r2F8eU8.4lcN6bVII2omC', 'petugas'),
(3, 'Petugas', 'petugas@sispensa.com', '$2y$10$a9/9ObPzqCxLmDesF/ibEuBjM7lmBaWqoTqt6WEvxuqITkdcRYBrS', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `nomor_laporan` int(11) NOT NULL,
  `nama_pelapor` varchar(255) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `judul_laporan` varchar(255) NOT NULL,
  `isi_laporan` text NOT NULL,
  `bukti_tambahan` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_laporan`
--

INSERT INTO `tb_laporan` (`nomor_laporan`, `nama_pelapor`, `telepon`, `email`, `alamat`, `judul_laporan`, `isi_laporan`, `bukti_tambahan`, `status`, `tanggal`) VALUES
(19426, 'Hilga Satria Pambudi', '085331740720', 'admin@multiverse.com', 'Jl. Panglima Sudirman No.25 Ngambak Kec.Wlingi', 'Laporan Kasus Tindak Pidana Korupsi', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit', '', 'Selesai', '2023-07-27 16:42:15'),
(36167, 'Nugroho Gusti Bintang Fajar', '085331234567', 'snakey.star@bintang.com', 'Blitar', 'Laporan Tindak Pidana Perusakan Vasilitas', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec dui nisl. Cras ut eros varius, scelerisque nisi non, aliquet leo. Vivamus vulputate sit amet enim eget consequat. Phasellus sed congue velit. Pellentesque quis aliquam ante, quis faucibus urna. Nulla tincidunt diam eget risus congue lacinia. Vestibulum in lacinia felis. Duis dolor nulla, eleifend in pellentesque et, pellentesque et lorem. In suscipit, lorem nec laoreet ultrices, leo turpis egestas enim, nec congue magna diam ut eros. Duis vulputate, nunc sit amet iaculis tincidunt, dui mauris pellentesque neque, ac aliquam massa erat nec dolor. Nunc ac libero vel tellus varius tempus eu at nisl. Donec consequat volutpat ipsum in gravida. Vestibulum tempor diam et eros gravida fringilla.', '', 'Sedang Diproses', '2023-07-28 08:59:28'),
(83181, 'Yoan Octa', '085331890203', 'yoan@sispensa.com', 'Kademangan', 'Lampiran Kejaksaan', 'Ini contoh lampiran dari pusat', 'Lampiran 2.docx', '', '2023-07-28 09:32:57'),
(87963, 'Kresno Kusumo', '085331741760', 'kresno@sispensa.com', 'Garum', 'Laporan Tindakan Pungli', 'Hukum Tidak Ditemukan', 'feast-ali.jpg', '', '2023-07-28 09:21:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`nomor_laporan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

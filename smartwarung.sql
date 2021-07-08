-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 08, 2021 at 08:01 PM
-- Server version: 10.3.29-MariaDB-log-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartwarung`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id_bank_account` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `warung_username` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`id_bank_account`, `account_name`, `account_number`, `bank`, `warung_username`, `date`, `update`) VALUES
(1, 'Smart Warung', '9999999', 'BCA', 'admin', '2021-01-11 18:09:21', '2021-01-11 18:09:21'),
(2, 'Smart Warung', '123123123', 'BNI', 'admin', '2021-01-11 19:01:11', '2021-01-11 19:01:11'),
(3, 'Smart Warung', '111222333', 'BRI', 'admin', '2021-01-11 19:01:11', '2021-01-11 19:01:11'),
(4, 'Rajawalss', '1123123', 'BCA', 'rajawali', '2021-03-14 06:53:32', '2021-03-14 06:53:32'),
(7, 'Gallery', '1234', 'BNI', 'gallery', '2021-05-04 05:24:52', '2021-05-04 05:24:52'),
(9, 'Alaw', '12345', 'BCA', 'alaw', '2021-05-06 08:10:02', '2021-05-06 08:12:14');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `username`) VALUES
('cart5e954667e6f6a', 'abcd'),
('cart60e1f7e062324', 'ciyen'),
('cart60e046a6efe0b', 'edwin'),
('cart60df3ae97227f', 'gigit'),
('cart602542b2c3dee', 'jumahid'),
('cart60e1f3fea4bf7', 'marsel'),
('cart6082c60ae3dab', 'ocha'),
('cart60e25390472a0', 'pipit'),
('cart60e220dd7ea9c', 'varie');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `id` varchar(255) NOT NULL,
  `item` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`id`, `item`, `quantity`) VALUES
('cart5e954667e6f6a', 8, 1),
('cart602542b2c3dee', 16, 1),
('cart60e25390472a0', 20, 11),
('cart6082c60ae3dab', 32, 1),
('cart6082c60ae3dab', 33, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Kebersihan'),
(2, 'Makanan'),
(3, 'Laundry'),
(4, 'Kamar Mandi'),
(5, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `to_whom` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `type` int(11) DEFAULT 0,
  `id_reply` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id_comment`, `sender_name`, `username`, `to_whom`, `message`, `type`, `id_reply`, `foto`, `date`) VALUES
(1, 'Ulalalalala', 'abcd', 'admin', 'asdasdasdas dasd as', 0, NULL, '', '2021-02-04 15:36:34'),
(2, 'Ulalalalala', 'abcd', 'admin', 'asdasdasdas dasd as', 0, NULL, '', '2021-02-04 15:39:00'),
(3, 'Ulalalalala', 'abcd', 'admin', 'asdasdas', 0, NULL, '', '2021-02-04 15:39:25'),
(4, 'Ulalalalala', 'abcd', 'gallery', 'aaaæ a aa a aa a a', 0, NULL, '', '2021-02-04 15:54:17'),
(10, 'Jumahid Habib', 'jumahid', 'gallery', 'eh sorry', 0, NULL, '', '2021-04-06 16:20:46'),
(11, 'asdsadas', 'asdasdasd', 'admin', 'asdasdasd asdas d', 0, NULL, NULL, '2021-04-09 08:32:34'),
(12, 'asdsadas', 'asdasdasd', 'admin', 'asdasdasd asdas d', 0, NULL, NULL, '2021-04-09 08:32:48'),
(13, 'asdasd', 'asdasd', 'admin', 'asdasdasdas', 0, NULL, NULL, '2021-04-09 08:39:10'),
(14, 'asdasd', 'asdasdasd', 'gallery', 'asdasdasdasd asdas d', 0, NULL, 'ad0bbe6a1de5099945c8b226d310d9f4.png', '2021-04-09 11:15:47'),
(15, 'Oktrichavita Jassinda', 'ocha', 'admin', 'Saya kelebihan pembayaran dari harga yang tertera, bagaimana ya baiknya?', 0, NULL, '8ca1b28bb6c83195d235ac8e6729abc0.jpeg', '2021-07-02 06:16:40'),
(16, 'Vita Jassinda', 'pipit', 'admin', 'Barangnya masih ada ga?', 0, NULL, '4f07dc15e11dcef4943130ddbe4b3143.jpeg', '2021-07-06 08:40:33'),
(17, 'Vita Jassinda', 'pipit', 'admin', 'Barangnya masih ada ga?', 0, NULL, '711b77f9d287460028a22a17c0d9f305.jpeg', '2021-07-06 08:40:40'),
(18, 'Vita Jassinda', 'pipit', 'admin', 'Barang saya kenapa seperti ini?', 0, NULL, '7c3cc34a8cafd0829cc06240fed7be11.jpeg', '2021-07-06 08:41:09'),
(19, 'Vita Jassinda', 'pipit', 'admin', 'Barang saya kenapa seperti ini?', 0, NULL, '2f17ba6fdb9f18e162da1cfd8de0f17e.jpeg', '2021-07-06 08:41:27'),
(20, 'Vita Jassinda', 'pipit', 'admin', 'Barang saya kenapa seperti ini?', 0, NULL, '254017b5735d39d9d60c1efc2b46e0db.jpeg', '2021-07-06 08:41:38'),
(21, 'Oktrichavita Jassinda', 'ocha', 'admin', 'bagaimana cara menghubungi warung?', 0, NULL, '9183e9e5301999240274f3e1b2c61a45.JPG', '2021-07-06 13:57:53'),
(22, 'Oktrichavita Jassinda', 'ocha', 'admin', 'bagaimana cara menghubungi warung?', 0, NULL, '8a20610cb32cb20a4efd5db2ce8db52d.JPG', '2021-07-06 13:58:03'),
(23, 'Oktrichavita Jassinda', 'ocha@gmail.com', 'admin', 'bagaimana cara menghubungi warung?', 0, NULL, 'b1d04829c783f9aea7f271bb66a81528.JPG', '2021-07-06 13:58:24'),
(24, 'Oktrichavita Jassinda', 'ocha@gmail.com', 'admin', 'bagaimana cara menghubungi warung?', 0, NULL, '806b8c5b531e13dcc5e4b4eb2d6e4b53.JPG', '2021-07-06 13:59:42');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `warung` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `origin_id` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `destination_id` varchar(255) NOT NULL,
  `distance` float NOT NULL,
  `delivery_fee` int(11) NOT NULL,
  `billing` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `method` enum('Transfer','COD') NOT NULL,
  `bank_type` varchar(255) DEFAULT NULL,
  `bank_account_number` varchar(255) DEFAULT NULL,
  `bank_account_name` varchar(255) DEFAULT NULL,
  `bank_to` varchar(255) DEFAULT NULL,
  `proof_of_payment` varchar(255) DEFAULT NULL,
  `not_valid` varchar(255) DEFAULT NULL,
  `status` enum('Menunggu proses penjual','Sedang dikirim','Sudah diterima','Dibatalkan','Menunggu verif pembayaran','Tidak valid') NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `user`, `warung`, `origin`, `origin_id`, `destination`, `destination_id`, `distance`, `delivery_fee`, `billing`, `total`, `method`, `bank_type`, `bank_account_number`, `bank_account_name`, `bank_to`, `proof_of_payment`, `not_valid`, `status`, `date`) VALUES
('invoice5e96ff3770461', 'abcd', 'kerabat', 'Telkom University, Jalan Telekomunikasi Jl. Terusan Buah Batu, Sukapura, Bandung, West Java, Indonesia', 'ChIJF6V9W1wo1i0RlY84avKFRIY', 'Sukapura, Bandung, West Java, Indonesia', 'ChIJQXjDl6zpaC4RuiyZXIf658I', 0.5, 1250, 39048, 40298, 'Transfer', NULL, NULL, NULL, NULL, '', NULL, 'Menunggu proses penjual', '2021-01-11 19:15:47'),
('invoice5e974f6fcf5d9', 'abcd', 'kerabat', 'Telkom University, Jalan Telekomunikasi Jl. Terusan Buah Batu, Sukapura, Bandung, West Java, Indonesia', 'ChIJF6V9W1wo1i0RlY84avKFRIY', 'Institut Teknologi Bandung, Jl. Ganesha, Lebak Siliwangi, Bandung City, West Java, Indonesia', 'ChIJg7HJZ1fmaC4RYXnj3NzjeCQ', 12.8, 32000, 15012, 47012, 'Transfer', NULL, NULL, NULL, NULL, NULL, NULL, 'Dibatalkan', '2021-01-11 19:15:47'),
('invoice5e9d8d550bba9', 'abcd', 'kerabat', 'Telkom University, Jalan Telekomunikasi Jl. Terusan Buah Batu, Sukapura, Bandung, West Java, Indonesia', 'ChIJF6V9W1wo1i0RlY84avKFRIY', 'Metro Indah Mall, Kawasan Niaga, Soekarno-Hatta Street Jalan MTC Barat, Sekejati, Bandung City, West Java, Indonesia', 'ChIJk6KqSfHpaC4RVGGFKsMMLto', 10.2, 25500, 45000, 70500, 'Transfer', NULL, NULL, NULL, NULL, NULL, NULL, 'Menunggu proses penjual', '2021-01-11 19:15:47'),
('invoice5e9dafbdd7896', 'abcd', 'rajawali', 'Pondok Rajawali 12, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJhYoXcKXpaC4RtsIsukYN274', 'D\' Gallery Futsal, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJ4XzVX6XpaC4RG0c8UhI-qnc', 0.1, 250, 12399, 12649, 'Transfer', NULL, NULL, NULL, NULL, NULL, NULL, 'Dibatalkan', '2021-01-11 19:15:47'),
('invoice5e9db8c5a55ed', 'abcd', 'kerabat', 'Telkom University, Jalan Telekomunikasi Jl. Terusan Buah Batu, Sukapura, Bandung, West Java, Indonesia', 'ChIJF6V9W1wo1i0RlY84avKFRIY', 'IFI Futsal, Jalan Sukabirus, Citeureup, Bandung City, West Java, Indonesia', 'ChIJgRwceq_paC4Rwjqb_J8qFFQ', 4.3, 10750, 165000, 175750, 'Transfer', NULL, NULL, NULL, NULL, NULL, NULL, 'Menunggu proses penjual', '2021-01-11 19:15:47'),
('invoice5e9dc92c3e69a', 'abcd', 'kerabat', 'Telkom University, Jalan Telekomunikasi Jl. Terusan Buah Batu, Sukapura, Bandung, West Java, Indonesia', 'ChIJF6V9W1wo1i0RlY84avKFRIY', 'Daging sapi lokal, Baleendah, Bandung, West Java, Indonesia', 'ChIJS3eHMXPpaC4RjJCCh6K3rsk', 4.8, 12000, 18000, 30000, 'Transfer', NULL, NULL, NULL, NULL, NULL, NULL, 'Menunggu proses penjual', '2021-01-11 19:15:47'),
('invoice5ffca34e329a4', 'abcd', 'kerabat', 'Telkom University, Jalan Telekomunikasi Jl. Terusan Buah Batu, Sukapura, Bandung, West Java, Indonesia', 'ChIJF6V9W1wo1i0RlY84avKFRIY', 'PBB C61, Jalan Komplek Permata Buah Batu, Lengkong, Bandung, Jawa Barat, Indonesia', 'ChIJV7mVvbHpaC4Rj9ubqGZBsN8', 5.5, 13750, 165000, 178750, 'Transfer', NULL, NULL, NULL, NULL, NULL, NULL, 'Sudah diterima', '2021-01-11 20:15:47'),
('invoice6011b496a8351', 'abcd', 'kerabat', 'Telkom University, Jalan Telekomunikasi Jl. Terusan Buah Batu, Sukapura, Bandung, West Java, Indonesia', 'ChIJF6V9W1wo1i0RlY84avKFRIY', '', '', 0, 0, 30000, 0, 'Transfer', NULL, '', '', NULL, NULL, NULL, 'Menunggu proses penjual', '2021-01-27 18:44:38'),
('invoice602543d44683e', 'jumahid', 'kerabat', 'Telkom University, Jalan Telekomunikasi Jl. Terusan Buah Batu, Sukapura, Bandung, West Java, Indonesia', 'ChIJF6V9W1wo1i0RlY84avKFRIY', 'PBB Blok H2, Lengkong, Bandung, Jawa Barat, Indonesia', 'ChIJG3P0D-npaC4R8IzNJPWO-kA', 0, 0, 15000, 0, 'COD', NULL, NULL, NULL, NULL, NULL, NULL, 'Sudah diterima', '2021-02-11 14:48:52'),
('invoice6050c68e08c43', 'abcd', 'kerabat', 'Telkom University, Jalan Telekomunikasi Jl. Terusan Buah Batu, Sukapura, Bandung, West Java, Indonesia', 'ChIJF6V9W1wo1i0RlY84avKFRIY', 'Jalan Gunung Mas No.D22, Ciumbuleuit, Kota Bandung, Jawa Barat, Indonesia', 'ChIJEblboOjmaC4R6qrdzREjbSQ', 17, 42500, 30000, 72500, 'COD', NULL, NULL, NULL, NULL, '', NULL, 'Menunggu proses penjual', '2021-03-16 14:54:06'),
('invoice6066c3e83a0f0', 'jumahid', 'gallery', 'D\' Gallery Futsal, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJ4XzVX6XpaC4RG0c8UhI-qnc', 'Blok D No.d22, Cangkuang Kulon, Bandung, Jawa Barat, Indonesia', 'ChIJ3d0WftjoaC4RPFv8VPWdl98', 7, 17500, 2070, 19570, 'Transfer', NULL, NULL, NULL, NULL, 'cc3b55ea4e25d8f8e249f116e3517b1a.png', NULL, 'Sudah diterima', '2021-04-02 07:12:40'),
('invoice6083c6555bafb', 'ocha', 'gallery', 'D\' Gallery Futsal, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJ4XzVX6XpaC4RG0c8UhI-qnc', 'Transmart Buah Batu XXI, Cipagalo, Bandung, West Java, Indonesia', 'ChIJPRE4o0zoaC4RFq7LwOBN3q4', 2.2, 5500, 5610, 11110, 'COD', NULL, NULL, NULL, NULL, NULL, NULL, 'Dibatalkan', '2021-04-24 07:18:45'),
('invoice6083c6b83d5aa', 'ocha', 'rajawali', 'Pondok Rajawali 12, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJhYoXcKXpaC4RtsIsukYN274', 'TRANS MART BUAHBATU, Jalan Terusan Buah Batu, Kujangsari, Bandung City, West Java, Indonesia', 'ChIJtz8hjp3paC4RKV17FZ1deSE', 2.8, 7000, 11159, 18159, 'Transfer', 'BCA', '123', 'Ocha', 'BCA', '19ce08f5852e1d7a0d4632279aed0856.png', '<p>Karena bla bla bla</p>', 'Tidak valid', '2021-04-24 07:20:24'),
('invoice608a738b1d776', 'ocha', 'rajawali', 'Pondok Rajawali 12, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJhYoXcKXpaC4RtsIsukYN274', 'Telkom University, Jalan Telekomunikasi Jl. Terusan Buah Batu, Sukapura, Bandung City, West Java, Indonesia', 'ChIJF6V9W1wo1i0RlY84avKFRIY', 4.2, 10500, 49596, 60096, 'Transfer', 'BRI', '123', 'Ocha', 'BRI', '6ac2003957b0b57e1dac72288fcb7036.png', '', 'Sudah diterima', '2021-04-29 08:51:23'),
('invoice608ae1872a20c', 'ocha', 'rajawali', 'Pondok Rajawali 12, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJhYoXcKXpaC4RtsIsukYN274', 'IFI Futsal, Jalan Sukabirus, Citeureup, Bandung City, West Java, Indonesia', 'ChIJgRwceq_paC4Rwjqb_J8qFFQ', 0.3, 750, 10539, 11289, 'Transfer', 'BRI', '123', 'Ocha', 'BRI', '24cb483db7927920879c7df6863c5aea.png', '', 'Sudah diterima', '2021-04-29 16:40:39'),
('invoice608ce7bb1c5ad', 'ocha', 'rajawali', 'Pondok Rajawali 12, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJhYoXcKXpaC4RtsIsukYN274', 'IFI Futsal, Jalan Sukabirus, Citeureup, Bandung City, West Java, Indonesia', 'ChIJgRwceq_paC4Rwjqb_J8qFFQ', 0.3, 750, 12399, 13149, 'Transfer', 'BCA', '1234567', 'Ocha', 'BCA', '6e70f69d5c9dafe8d943ac3f763f1dc7.png', '', 'Sudah diterima', '2021-05-01 05:31:39'),
('invoice6090f5224505e', 'ocha', 'rajawali', 'Pondok Rajawali 12, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJhYoXcKXpaC4RtsIsukYN274', 'Pondok 212, Jl. Sukapura, Citeureup, Bandung, West Java, Indonesia', 'ChIJn8--lTnpaC4Rnu_GKzG69Ww', 0.1, 250, 10415, 10665, 'Transfer', 'BNI', '123', 'Ocha', 'BNI', NULL, '<p>Tidak ada bukti transaksi</p>', 'Tidak valid', '2021-05-04 07:17:54'),
('invoice6090f5fa75679', 'ocha', 'gallery', 'D\' Gallery Futsal, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJ4XzVX6XpaC4RG0c8UhI-qnc', 'Syndir Cut, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJvSRZja_paC4REpS7-qxN0zM', 0.1, 250, 15000, 15250, 'COD', NULL, NULL, NULL, NULL, NULL, NULL, 'Sudah diterima', '2021-05-04 07:21:30'),
('invoice60dde2f74f462', 'ocha', 'gallery', 'D\' Gallery Futsal, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJ4XzVX6XpaC4RG0c8UhI-qnc', 'Jalan Adhyaksa Raya, Sukapura, Kota Bandung, Jawa Barat, Indonesia', 'EkJKYWxhbiBBZGh5YWtzYSBSYXlhLCBTdWthcHVyYSwgS290YSBCYW5kdW5nLCBKYXdhIEJhcmF0LCBJbmRvbmVzaWEiLiosChQKEglR-JfkTOhoLhHe7zL-3eUeaRIUChIJQXjDl6zpaC4RuiyZXIf658I', 1.7, 4250, 2940, 7190, 'Transfer', 'BCA', '858687', 'Oktrichavita Jassinda', 'BCA', 'b507487f8ab996608a0fc0ac5750b3ff.jpg', '', 'Sudah diterima', '2021-07-01 15:44:55'),
('invoice60df344c4ac6d', 'ocha', 'gallery', 'D\' Gallery Futsal, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJ4XzVX6XpaC4RG0c8UhI-qnc', '', '', 0, 0, 6000, 0, 'COD', NULL, NULL, NULL, NULL, NULL, NULL, 'Dibatalkan', '2021-07-02 15:44:12'),
('invoice60df3b1d60efe', 'gigit', 'gallery', 'D\' Gallery Futsal, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJ4XzVX6XpaC4RG0c8UhI-qnc', 'Gang PGA, Lengkong, Bandung, Jawa Barat, Indonesia', 'EjJHYW5nIFBHQSwgTGVuZ2tvbmcsIEJhbmR1bmcsIEphd2EgQmFyYXQsIEluZG9uZXNpYSIuKiwKFAoSCbUQ-x2u6WguEX234wDIY5uWEhQKEgmhsKtYxuloLhGRWNv9Hu-lww', 0.9, 2250, 2130, 4380, 'COD', NULL, NULL, NULL, NULL, NULL, NULL, 'Sudah diterima', '2021-07-02 16:13:17'),
('invoice60e046e31c188', 'edwin', 'alaw', 'Toko Alaw, Sukapura, Bandung, West Java, Indonesia', 'ChIJTz8UzZTpaC4RQMvmtO2PRoY', 'Srikaton Computer, Jalan Telekomunikasi, Sukapura, Bandung, West Java, Indonesia', 'ChIJlciYcrLpaC4R_uEqxQVo2n4', 0, 0, 21417, 21416, 'Transfer', 'BCA', '73212345', 'Edwin', 'BCA', '806c3aeea987b20e4daa4c9ff520a769.jpg', '', 'Menunggu proses penjual', '2021-07-03 11:15:47'),
('invoice60e049e444f8d', 'edwin', 'rajawali', 'Pondok Rajawali 12, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJhYoXcKXpaC4RtsIsukYN274', 'Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'EjlKYWxhbiBTdWthYmlydXMsIENpdGV1cmV1cCwgQmFuZHVuZywgV2VzdCBKYXZhLCBJbmRvbmVzaWEiLiosChQKEglXwE9wpeloLhEXdO7et4UW3xIUChIJG0JxZqbpaC4R_3Oh4-GkIFg', 0, 0, 11531, 11531, 'Transfer', 'BNI', '1224356323', 'Edwin', 'BNI', NULL, '<p>Tidak mengupload bukti pembayaran</p>', 'Tidak valid', '2021-07-03 11:28:36'),
('invoice60e1192d5d414', 'ocha', 'gallery', 'D\' Gallery Futsal, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJ4XzVX6XpaC4RG0c8UhI-qnc', '', '', 0, 0, 3000, 0, 'COD', NULL, NULL, NULL, NULL, NULL, NULL, 'Dibatalkan', '2021-07-04 02:13:01'),
('invoice60e1c5da85430', 'ocha', 'gallery', 'D\' Gallery Futsal, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJ4XzVX6XpaC4RG0c8UhI-qnc', 'Gang PGA, Lengkong, Bandung, Jawa Barat, Indonesia', 'EjJHYW5nIFBHQSwgTGVuZ2tvbmcsIEJhbmR1bmcsIEphd2EgQmFyYXQsIEluZG9uZXNpYSIuKiwKFAoSCbUQ-x2u6WguEX234wDIY5uWEhQKEgmhsKtYxuloLhGRWNv9Hu-lww', 0.9, 2250, 8820, 11070, 'Transfer', 'BNI', '123456', 'Oktrichavita Jassinda', 'BNI', 'd4e7f404d8f99b9aeeb33d7c3fefdd01.jpeg', '', 'Menunggu proses penjual', '2021-07-04 14:29:46'),
('invoice60e1cc9787c24', 'ocha', 'bersama', 'Jalan Adhyaksa Raya, Sukapura, Kota Bandung, Jawa Barat, Indonesia', 'Ek1KbC4gQWRoeWFrc2EgUmF5YSwgU3VrYXB1cmEsIEtlYy4gRGF5ZXVoa29sb3QsIEJhbmR1bmcsIEphd2EgQmFyYXQsIEluZG9uZXNpYSIuKiwKFAoSCVH4l-RM6GguEd7vMv7d5R5pEhQKEglBeMOXrOloLhG6LJlch_rnwg', 'Gang PGA, Lengkong, Bandung, Jawa Barat, Indonesia', 'EjJHYW5nIFBHQSwgTGVuZ2tvbmcsIEJhbmR1bmcsIEphd2EgQmFyYXQsIEluZG9uZXNpYSIuKiwKFAoSCbUQ-x2u6WguEX234wDIY5uWEhQKEgmhsKtYxuloLhGRWNv9Hu-lww', 1.9, 4750, 5000, 9750, 'Transfer', 'BNI', '123456', 'Oktrichavita Jassinda', 'BNI', '3546b5ed6e0014e5ab67eb7304e8e0df.jpg', '', 'Sedang dikirim', '2021-07-04 14:58:31'),
('invoice60e1d2f9d5d94', 'ocha', 'bersama', 'Jalan Adhyaksa Raya, Sukapura, Kota Bandung, Jawa Barat, Indonesia', 'Ek1KbC4gQWRoeWFrc2EgUmF5YSwgU3VrYXB1cmEsIEtlYy4gRGF5ZXVoa29sb3QsIEJhbmR1bmcsIEphd2EgQmFyYXQsIEluZG9uZXNpYSIuKiwKFAoSCVH4l-RM6GguEd7vMv7d5R5pEhQKEglBeMOXrOloLhG6LJlch_rnwg', 'Gang PGA, Lengkong, Bandung, Jawa Barat, Indonesia', 'EjJHYW5nIFBHQSwgTGVuZ2tvbmcsIEJhbmR1bmcsIEphd2EgQmFyYXQsIEluZG9uZXNpYSIuKiwKFAoSCbUQ-x2u6WguEX234wDIY5uWEhQKEgmhsKtYxuloLhGRWNv9Hu-lww', 1.9, 4750, 7500, 12250, 'Transfer', 'BNI', '123456', 'Oktrichavita Jassinda', 'BNI', '60cc8b9510f58aaffb41c4d3d1a11415.jpeg', '', 'Sudah diterima', '2021-07-04 15:25:45'),
('invoice60e1f44bb4259', 'marsel', 'gallery', 'D\' Gallery Futsal, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJ4XzVX6XpaC4RG0c8UhI-qnc', 'Jl. Adhyaksa IV, Sukapura, Bandung, Jawa Barat, Indonesia', 'EjlKbC4gQWRoeWFrc2EgSVYsIFN1a2FwdXJhLCBCYW5kdW5nLCBKYXdhIEJhcmF0LCBJbmRvbmVzaWEiLiosChQKEgnvX-ljTehoLhEjdDMGgIPk_BIUChIJQXjDl6zpaC4RuiyZXIf658I', 1.6, 4000, 17640, 21640, 'Transfer', 'BRI', '288888747224', 'marsel', 'BNI', '570a9d8d05e7833ea5741f9154228cda.JPG', '', 'Tidak valid', '2021-07-04 17:47:55'),
('invoice60e1f92b8db26', 'ciyen', 'gallery', 'D\' Gallery Futsal, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJ4XzVX6XpaC4RG0c8UhI-qnc', 'D\' Gallery Futsal, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', '', 0, 0, 3000, 0, 'COD', NULL, NULL, NULL, NULL, NULL, NULL, 'Menunggu proses penjual', '2021-07-04 18:08:43'),
('invoice60e1f9bce7238', 'ciyen', 'gallery', 'D\' Gallery Futsal, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJ4XzVX6XpaC4RG0c8UhI-qnc', 'Jalan Adhyaksa Raya, Sukapura, Kota Bandung, Jawa Barat, Indonesia', 'EkJKYWxhbiBBZGh5YWtzYSBSYXlhLCBTdWthcHVyYSwgS290YSBCYW5kdW5nLCBKYXdhIEJhcmF0LCBJbmRvbmVzaWEiLiosChQKEglR-JfkTOhoLhHe7zL-3eUeaRIUChIJQXjDl6zpaC4RuiyZXIf658I', 1.7, 4250, 3000, 7250, 'COD', NULL, NULL, NULL, NULL, NULL, NULL, 'Menunggu proses penjual', '2021-07-04 18:11:08'),
('invoice60e20100b9ca8', 'ocha', 'wargotuhuy', 'Jalan Adhyaksa Raya, Sukapura, Kota Bandung, Jawa Barat, Indonesia', 'Ek1KbC4gQWRoeWFrc2EgUmF5YSwgU3VrYXB1cmEsIEtlYy4gRGF5ZXVoa29sb3QsIEJhbmR1bmcsIEphd2EgQmFyYXQsIEluZG9uZXNpYSIuKiwKFAoSCVH4l-RM6GguEd7vMv7d5R5pEhQKEglBeMOXrOloLhG6LJlch_rnwg', 'Sukapura, Kota Bandung, Jawa Barat, Indonesia', 'ChIJB9VOZQ7oaC4R2NA6Kof-jDQ', 6.1, 15250, 25000, 40250, 'COD', NULL, NULL, NULL, NULL, NULL, NULL, 'Sudah diterima', '2021-07-04 18:42:08'),
('invoice60e2050bc1dfc', 'ocha', 'wargotuhuy', 'Jalan Adhyaksa Raya, Sukapura, Kota Bandung, Jawa Barat, Indonesia', 'Ek1KbC4gQWRoeWFrc2EgUmF5YSwgU3VrYXB1cmEsIEtlYy4gRGF5ZXVoa29sb3QsIEJhbmR1bmcsIEphd2EgQmFyYXQsIEluZG9uZXNpYSIuKiwKFAoSCVH4l-RM6GguEd7vMv7d5R5pEhQKEglBeMOXrOloLhG6LJlch_rnwg', 'Jalan Adhyaksa Raya, Sukapura, Bandung City, West Java, Indonesia', 'EkFKYWxhbiBBZGh5YWtzYSBSYXlhLCBTdWthcHVyYSwgQmFuZHVuZyBDaXR5LCBXZXN0IEphdmEsIEluZG9uZXNpYSIuKiwKFAoSCVH4l-RM6GguEd7vMv7d5R5pEhQKEglBeMOXrOloLhG6LJlch_rnwg', 0, 0, 25000, 0, 'COD', NULL, NULL, NULL, NULL, NULL, NULL, 'Menunggu proses penjual', '2021-07-04 18:59:23'),
('invoice60e2052925048', 'ocha', 'wargotuhuy', 'Jalan Adhyaksa Raya, Sukapura, Kota Bandung, Jawa Barat, Indonesia', 'Ek1KbC4gQWRoeWFrc2EgUmF5YSwgU3VrYXB1cmEsIEtlYy4gRGF5ZXVoa29sb3QsIEJhbmR1bmcsIEphd2EgQmFyYXQsIEluZG9uZXNpYSIuKiwKFAoSCVH4l-RM6GguEd7vMv7d5R5pEhQKEglBeMOXrOloLhG6LJlch_rnwg', '', 'EkFKYWxhbiBBZGh5YWtzYSBSYXlhLCBTdWthcHVyYSwgQmFuZHVuZyBDaXR5LCBXZXN0IEphdmEsIEluZG9uZXNpYSIuKiwKFAoSCVH4l-RM6GguEd7vMv7d5R5pEhQKEglBeMOXrOloLhG6LJlch_rnwg', 0, 0, 25000, 25000, 'Transfer', 'BRI', '3197461413', 'cina', 'BRI', '036b80d59c21a1d53fa5be07d7b02e0a.jpg', '', 'Menunggu proses penjual', '2021-07-04 18:59:53'),
('invoice60e2216080b16', 'varie', 'rajawali', 'Pondok Rajawali 12, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJhYoXcKXpaC4RtsIsukYN274', 'Gang PGA, Lengkong, Bandung, Jawa Barat, Indonesia', 'EjJHYW5nIFBHQSwgTGVuZ2tvbmcsIEJhbmR1bmcsIEphd2EgQmFyYXQsIEluZG9uZXNpYSIuKiwKFAoSCbUQ-x2u6WguEX234wDIY5uWEhQKEgmhsKtYxuloLhGRWNv9Hu-lww', 1.1, 2750, 41500, 44250, 'Transfer', 'BNI', '23242526', 'Oktavarian S', 'BNI', NULL, '', 'Tidak valid', '2021-07-04 21:00:16'),
('invoice60e2a7836d558', 'ocha', 'rajawali', 'Pondok Rajawali 12, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJhYoXcKXpaC4RtsIsukYN274', 'Telkom University, Jalan Telekomunikasi Jalan Terusan Buah Batu, Sukapura, Kota Bandung, Jawa Barat, Indonesia', 'ChIJF6V9W1wo1i0RlY84avKFRIY', 5.4, 13500, 41500, 55000, 'COD', NULL, NULL, NULL, NULL, NULL, NULL, 'Menunggu proses penjual', '2021-07-05 06:32:35'),
('invoice60e2b45147dde', 'pipit', 'rajawali', 'Pondok Rajawali 12, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJhYoXcKXpaC4RtsIsukYN274', 'Graha 9, Jalan Haji Umar, Citeureup, Bandung, Jawa Barat, Indonesia', 'ChIJyWhOea_paC4RVIOKI36SwzY', 0.3, 750, 11200, 11950, 'Transfer', 'BCA', '12345678', 'Vita Jassinda', 'BCA', '4b772cfb4018d528a8b697bedd98beeb.jpeg', '<p>Bukti pembayaran tidak sesuai</p>', 'Tidak valid', '2021-07-05 07:27:13'),
('invoice60e40bdf7b3a8', 'pipit', 'bersama', 'Jalan Adhyaksa Raya, Sukapura, Kota Bandung, Jawa Barat, Indonesia', 'Ek1KbC4gQWRoeWFrc2EgUmF5YSwgU3VrYXB1cmEsIEtlYy4gRGF5ZXVoa29sb3QsIEJhbmR1bmcsIEphd2EgQmFyYXQsIEluZG9uZXNpYSIuKiwKFAoSCVH4l-RM6GguEd7vMv7d5R5pEhQKEglBeMOXrOloLhG6LJlch_rnwg', 'Gang PGA, Lengkong, Bandung, Jawa Barat, Indonesia', 'EjJHYW5nIFBHQSwgTGVuZ2tvbmcsIEJhbmR1bmcsIEphd2EgQmFyYXQsIEluZG9uZXNpYSIuKiwKFAoSCbUQ-x2u6WguEX234wDIY5uWEhQKEgmhsKtYxuloLhGRWNv9Hu-lww', 1.9, 4750, 7500, 12250, 'Transfer', 'BNI', '123456', 'Oktrichavita Jassinda', 'BNI', '50f665cf67df783ca305e1420d4e967d.jpeg', '', 'Sudah diterima', '2021-07-06 07:53:03'),
('invoice60e45e71e18ae', 'ocha', 'bersama', 'Jalan Adhyaksa Raya, Sukapura, Kota Bandung, Jawa Barat, Indonesia', 'Ek1KbC4gQWRoeWFrc2EgUmF5YSwgU3VrYXB1cmEsIEtlYy4gRGF5ZXVoa29sb3QsIEJhbmR1bmcsIEphd2EgQmFyYXQsIEluZG9uZXNpYSIuKiwKFAoSCVH4l-RM6GguEd7vMv7d5R5pEhQKEglBeMOXrOloLhG6LJlch_rnwg', 'Sukapura, Kota Bandung, Jawa Barat, Indonesia', 'ChIJB9VOZQ7oaC4R2NA6Kof-jDQ', 6.1, 15250, 2500, 17750, 'Transfer', 'BCA', '46687654444', 'ocha', 'BCA', '5e40ba39f9149baa19d2116382af8f3a.JPG', '', 'Sudah diterima', '2021-07-06 13:45:21'),
('invoice60e46fa3cf49b', 'ocha', 'bersama', 'Jalan Adhyaksa Raya, Sukapura, Kota Bandung, Jawa Barat, Indonesia', 'Ek1KbC4gQWRoeWFrc2EgUmF5YSwgU3VrYXB1cmEsIEtlYy4gRGF5ZXVoa29sb3QsIEJhbmR1bmcsIEphd2EgQmFyYXQsIEluZG9uZXNpYSIuKiwKFAoSCVH4l-RM6GguEd7vMv7d5R5pEhQKEglBeMOXrOloLhG6LJlch_rnwg', 'Jalan Adhyaksa Raya, Sukapura, Kota Bandung, Jawa Barat, Indonesia', 'EkJKYWxhbiBBZGh5YWtzYSBSYXlhLCBTdWthcHVyYSwgS290YSBCYW5kdW5nLCBKYXdhIEJhcmF0LCBJbmRvbmVzaWEiLiosChQKEglR-JfkTOhoLhHe7zL-3eUeaRIUChIJQXjDl6zpaC4RuiyZXIf658I', 0, 0, 2500, 2500, 'COD', NULL, NULL, NULL, NULL, NULL, NULL, 'Menunggu proses penjual', '2021-07-06 14:58:43');

--
-- Triggers `invoices`
--
DELIMITER $$
CREATE TRIGGER `after_transfer` AFTER UPDATE ON `invoices` FOR EACH ROW BEGIN
      IF (OLD.method = 'Transfer' AND NEW.status = 'Sudah diterima') THEN
      		INSERT INTO transfer
            SET total = OLD.billing,
            username = OLD.warung,
            date = now();
      END IF;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` varchar(255) NOT NULL,
  `item` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `item`, `quantity`, `price`) VALUES
('invoice5e96ff3770461', 8, 2, 10000),
('invoice5e96ff3770461', 9, 3, 3000),
('invoice5e974f6fcf5d9', 8, 1, 10000),
('invoice5e974f6fcf5d9', 9, 1, 3000),
('invoice5e9d8d550bba9', 8, 1, 15000),
('invoice5e9d8d550bba9', 9, 10, 3000),
('invoice5e9db8c5a55ed', 8, 10, 15000),
('invoice5e9db8c5a55ed', 9, 5, 3000),
('invoice5e9dc92c3e69a', 9, 6, 3000),
('invoice5ffca34e329a4', 9, 5, 3000),
('invoice5ffca34e329a4', 8, 10, 15000),
('invoice6011b496a8351', 8, 2, 15000),
('invoice602543d44683e', 8, 1, 15000),
('invoice6050c68e08c43', 8, 2, 13500),
('invoice6050c68e08c43', 9, 1, 3000),
('invoice6066c3e83a0f0', 16, 1, 2070),
('invoice6083c6555bafb', 16, 1, 2610),
('invoice60dde2f74f462', 26, 1, 2940),
('invoice60df344c4ac6d', 16, 2, 3000),
('invoice60e046e31c188', 27, 4, 5354),
('invoice60e1192d5d414', 16, 1, 3000),
('invoice60e1c5da85430', 26, 3, 2940),
('invoice60e1cc9787c24', 28, 2, 2500),
('invoice60e1d2f9d5d94', 28, 3, 2500),
('invoice60e1f44bb4259', 26, 6, 2940),
('invoice60e1f92b8db26', 16, 1, 3000),
('invoice60e1f9bce7238', 16, 1, 3000),
('invoice60e20100b9ca8', 43, 1, 25000),
('invoice60e2050bc1dfc', 43, 1, 25000),
('invoice60e2052925048', 43, 1, 25000),
('invoice60e2216080b16', 32, 1, 41500),
('invoice60e2a7836d558', 32, 1, 41500),
('invoice60e2b45147dde', 34, 4, 2800),
('invoice60e40bdf7b3a8', 28, 3, 2500),
('invoice60e45e71e18ae', 28, 1, 2500),
('invoice60e46fa3cf49b', 28, 1, 2500);

--
-- Triggers `invoice_details`
--
DELIMITER $$
CREATE TRIGGER `after_buy_products` AFTER INSERT ON `invoice_details` FOR EACH ROW BEGIN
	UPDATE items
    SET items.stock = items.stock-NEW.quantity
    WHERE items.id = NEW.item;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `photo` text NOT NULL,
  `hide` int(11) NOT NULL DEFAULT 0,
  `discount` int(11) DEFAULT 0,
  `is_week_sale` int(11) NOT NULL DEFAULT 0,
  `date_week_sale` date DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `username`, `name`, `category`, `stock`, `price`, `description`, `photo`, `hide`, `discount`, `is_week_sale`, `date_week_sale`, `date`) VALUES
(8, 'gallery', 'Vixal', 1, 74, 15000, '<p>Bersih mengkilap, pembersih lantai</p>\r\n', '2598bbcb533db9058ba43648ba8ac0fa.png', 0, 10, 0, '2021-04-23', '2021-03-16 13:51:08'),
(9, 'gallery', 'Sabun Batang Lux', 4, 5, 3000, '<p>Wangi dan membuat kulit lebih cerah</p>\r\n', 'd14b89596d482122d6e37429d53c44cc.png', 0, 10, 0, '0000-00-00', '2021-03-16 13:51:08'),
(16, 'gallery', 'Sunlight', 1, 116, 3000, 'Jeruk nipis', '82ef105b29d0e65342b398a7680c2780.jpg', 0, 40, 1, '2021-07-06', '2021-03-16 13:51:08'),
(20, 'sukapura', 'Sunlight 435 ml', 1, 125, 10000, '<p>Sabun cuci piring yang sangat efektif digunakan untuk menghilangkan lemak, bau amis, dan noda membandel pada peralatan memasak.</p>\r\n', '82ef105b29d0e65342b398a7680c2780.jpg', 0, 15, 0, '0000-00-00', '2021-03-16 13:51:08'),
(26, 'gallery', 'Indomie Rendang', 2, 5, 3000, '<p>Mie Instan</p>\r\n', '86b9efb592a7b11d8cb18008e50d4e5f.jpg', 0, 28, 1, '2021-07-06', '2021-05-05 06:40:43'),
(27, 'alaw', 'KOBE Mi Bon Cabe', 2, 1, 6299, 'Mi Boncabe merupakan mie instan kenyal yang dipadukan dengan pedas sedapnya Boncabe, sehingga menjadi kombinasi mantap bagi Anda pecinta sensasi makan mie pedas yang HQQ. Kelebihan Mi Boncabe dengan produk Mie pedas lainnya adalah kepingan mie-nya sendiri sudah mengandung Boncabe. Mi Boncabe kepingan mie-nya tidak berwarna kuning, melainkan agak kemerahan karena kandungan Boncabe-nya. Selain itu, Mie goreng Boncahe ini juga bisa dimakan polos tanpa bumbu pun sudah ada sensasi khas Boncabe-nya.', 'e8d3b958968612f43a649380e5ba3be1.jpg', 0, 0, 0, '0000-00-00', '2021-05-06 08:52:36'),
(28, 'bersama', 'Indomie Kari Ayam', 2, 10, 2500, 'Indomie Kari Ayam 72 gr', 'c638cb187ddce6e6764404c4e2d9cee2.jpg', 0, 0, 0, '0000-00-00', '2021-07-01 16:12:38'),
(29, 'gallery', 'Shampoo Rejoice', 4, 50, 28500, '<p>Wangi dan membuat rambut halus</p>\r\n', 'db6482ec637aa56c89a5e3172b482697.jpeg', 0, 0, 0, NULL, '2021-07-04 13:16:48'),
(30, 'gallery', 'Rinso', 3, 50, 27000, '<p>Menghilangkan noda hitam</p>\r\n', '08c4395458e897040a1f25d709ed3af9.jpeg', 0, 0, 0, '0000-00-00', '2021-07-04 13:18:38'),
(31, 'gallery', 'Vanish', 3, 35, 29900, '<p>Pemutih pakaian&nbsp;</p>\r\n', '023ff58369bb1c0292386e8fe78ef866.jpeg', 0, 0, 0, '0000-00-00', '2021-07-04 13:19:28'),
(32, 'rajawali', 'Downy', 3, 26, 41500, '<p>Pelembut pakaian, pewangi pakaian</p>\r\n', 'de0a3cd6c1d98d46c341b85a5cc65c3c.jpeg', 0, 20, 1, '2021-07-06', '2021-07-04 13:21:53'),
(33, 'rajawali', 'Super Pell', 1, 39, 10000, '<p>Pembersih lantai, wangi</p>\r\n', '9b34bb110f2c8f1641f75524e704a0a9.jpeg', 0, 0, 0, '0000-00-00', '2021-07-04 13:23:34'),
(34, 'rajawali', 'Mie Sedap Goreng', 2, 46, 2800, '<p>Mie goreng instant jelas terasa sedapnya</p>\r\n', '092eb7362173abfa9397375e8b45db89.jpeg', 0, 0, 0, NULL, '2021-07-04 13:24:50'),
(35, 'rajawali', 'Coca Cola 1000 ml', 5, 48, 10500, '<p>Minuman berkarbonasi rasa kola cocok diminum untuk menemani aktifitas sehari-hari anda</p>\r\n', 'c6776650e285283d838f7bc717031d26.jpeg', 0, 0, 0, NULL, '2021-07-04 13:26:51'),
(36, 'rajawali', 'Biore White Scrub 250 ml', 4, 38, 24998, '<p>Nikmati sensasi relaksasi dari Jasmine Aroma Blend untuk ketenangan &amp; kenyamanan tubuh anda</p>\r\n', 'fb284d72ebdc3bed5d1d1e39bf8d6b05.jpeg', 0, 3, 1, '2021-07-06', '2021-07-04 13:31:17'),
(37, 'sukapura', 'Lifebuoy Sabun Cair 900 ml', 4, 80, 45950, '<p>Lifebuoy adalah sabun mandi keluarga yang di keluarkan oleh Unilever di Indonesia sejak 80 tahun yang lalu.</p>\r\n', 'c3a9a5c4db9d68a6fdb813eca58ec837.jpeg', 0, 0, 0, '0000-00-00', '2021-07-04 13:39:06'),
(38, 'sukapura', 'Beras Tawon 5 Kg', 5, 20, 65000, '<p>Tidak pakai pemutih, tidak pakai pengawet, tidak pakai pewangi,</p>\r\n', 'a71540db21443c13cee6b9c03afbc5e7.jpeg', 0, 0, 0, '0000-00-00', '2021-07-04 13:41:14'),
(39, 'sukapura', 'Supermi Ayam Bawang', 2, 100, 2500, '<p>Supermi mi instan rasa ayam bawang.</p>\r\n', 'ad0e3429136ebbe832d1306bfe095a1b.jpeg', 0, 0, 0, NULL, '2021-07-04 13:43:21'),
(40, 'kerabat', 'Pepsodent Herbal', 4, 150, 19000, '<p>Pepsodent pasta gigi action 123 herbal 190 gr</p>\r\n', '621e803e588592b4faca3a9ac84004e0.jpeg', 0, 9, 1, '2021-07-06', '2021-07-04 13:46:37'),
(41, 'kerabat', 'Detergen Attack 1,2 Kg', 3, 70, 30500, '<p>Attack softener maju bersama.</p>\r\n', 'cde62225216d56b9391e0d3c5b60c65a.jpeg', 0, 9, 1, '2021-07-06', '2021-07-04 13:48:43'),
(42, 'kerabat', 'Porstex Ungu Botol 500 ml', 1, 25, 10500, '<p>Porstex Pembersih Keramik Ungu Botol 500 Ml adalah cairan pembersih lantai dan mengandung Antibakteri.</p>\r\n', '17e2f2ee1d76a582dbf288be52861360.jpeg', 0, 0, 0, NULL, '2021-07-04 13:51:10'),
(43, 'wargotuhuy', 'shampoo', 4, 9, 25000, '<p>shampoo bagus</p>\r\n', 'f012a57f5b043ab091e7b0e7931d98ab.jpg', 0, 0, 0, '0000-00-00', '2021-07-04 18:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `username` varchar(255) NOT NULL,
  `item` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`username`, `item`, `rating`) VALUES
('abcd', 8, 5),
('abcd', 8, 4),
('abcd', 9, 1),
('jumahid', 16, 4),
('ocha', 26, 5),
('ocha', 26, 0),
('ocha', 28, 5),
('ocha', 28, 5),
('pipit', 28, 5),
('pipit', 28, 1),
('ocha', 28, 0),
('ocha', 28, 5);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `username` varchar(255) NOT NULL,
  `item` int(11) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`username`, `item`, `review`) VALUES
('abcd', 8, 'Barang bagus original'),
('abcd', 8, 'Mantap gan'),
('abcd', 9, 'Barang jelek'),
('jumahid', 16, 'pengiriman cepat'),
('ocha', 26, 'Enak kapan kapan beli lagi'),
('ocha', 26, ''),
('ocha', 28, 'Indome kari ayam emang enak'),
('ocha', 28, 'mantappu jiwa'),
('pipit', 28, 'Indomie terenak'),
('pipit', 28, 'Indomienya sudah expired\r\n'),
('ocha', 28, 'barang sampai '),
('ocha', 28, 'barang sampai');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `id` int(11) NOT NULL,
  `total` decimal(32,0) DEFAULT NULL,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`id`, `total`, `username`, `status`, `date`, `bukti`) VALUES
(10, 165000, 'kerabat', '', '2021-04-29 09:21:27', ''),
(11, 2070, 'gallery', '', '2021-04-29 09:21:42', ''),
(12, 49596, 'rajawali', 'Sudah ditransfer', '2021-04-29 17:10:23', '35ad1b932466d1d50f5ebd6491afb9ea.png'),
(13, 12399, 'rajawali', '', '2021-05-01 05:34:18', ''),
(14, 2940, 'gallery', '', '2021-07-01 15:53:56', ''),
(15, 10539, 'rajawali', 'Sudah ditransfer', '2021-07-05 00:14:35', 'd9810efcf1a4fb91e3b1b06294581401.JPG'),
(16, 7500, 'bersama', '', '2021-07-04 15:28:06', ''),
(17, 7500, 'bersama', '', '2021-07-06 07:55:47', ''),
(18, 2500, 'bersama', '', '2021-07-06 13:54:51', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `is_aktif_cust` int(11) DEFAULT 1,
  `alasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `username`, `password`, `phone`, `email`, `role`, `photo`, `is_aktif_cust`, `alasan`) VALUES
('Ulalalalala', 'abcd', 'e2fc714c4727ee9395f324cd2e7f331f', '08123', 'a@b.c', 0, NULL, 1, ''),
('admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '08111111', 'admin@smartwarung.com', 99, NULL, 1, ''),
('Toko Alaw', 'alaw', 'e2fc714c4727ee9395f324cd2e7f331f', '08123345665', 'alaw@gmail.com', 1, '851e30aef96292cb123a3efab99f19a4.png', 1, ''),
('bersama', 'bersama', 'e2fc714c4727ee9395f324cd2e7f331f', '08123958685843', 'saya@gmail.com', 1, 'a0a8db151a490a8baa7d61e0453bb09b.jpg', 1, ''),
('CHRISTINE YENNY', 'ciyen', '81dc9bdb52d04dc20036dbd8313ed055', '12348317', 'ciyen@mail.com', 0, NULL, 1, ''),
('Edwin van De Sar', 'edwin', 'e10adc3949ba59abbe56e057f20f883e', '088128273821', 'edwin@gmail.com', 0, NULL, 1, ''),
('Gallery', 'gallery', 'e2fc714c4727ee9395f324cd2e7f331f', '123', '1@s.c', 1, '7d6019698936a373c869ee6de7ed275e.jpg', 1, ''),
('Gita Jassinda', 'gigit', 'e171269dea981be834df8373554999b4', '082219726599', 'gitaajassinda99@gmail.com', 0, NULL, 1, ''),
('Warung Ibu Ika', 'ibuika', 'e2fc714c4727ee9395f324cd2e7f331f', '086532515211', 'warungibuika@gmail.com', 1, '19747304c29bebbbdb059a5f877e07b2.jpg', 1, ''),
('Jumahid Habib', 'jumahid', '86dd55229128fd39981a8e19d2026386', '082137244805', 'jmhdoaoe@gmail.com', 0, NULL, 1, ''),
('Warung Kerabat', 'kerabat', 'e2fc714c4727ee9395f324cd2e7f331f', '0812', 'a@b.c', 1, '17cf68a4ff5b1c1f1fe2eb39373d3cfa.jpg', 1, ''),
('marsel', 'marsel', 'e2fc714c4727ee9395f324cd2e7f331f', '28449588475', 'saya111@gmail.com', 0, NULL, 1, ''),
('Oktrichavita Jassinda', 'ocha', '2ea4dce70aecd3a50945105a01aa2cba', '0812345678', 'oktrichavitajk@gmail.com', 0, NULL, 1, ''),
('Vita Jassinda', 'pipit', '5c40ee0ae05c339a9f8502d29a49541d', '082219726782', 'vitajassinda@gmail.com', 0, NULL, 1, ''),
('Rajawali', 'rajawali', 'e2fc714c4727ee9395f324cd2e7f331f', '0812', 'a@b.cd', 1, '2557a0a8a0e7856fe8b6c5f4908229c8.png', 1, ''),
('siska', 'siska', 'e2fc714c4727ee9395f324cd2e7f331f', '2368764246242', 'siska@gmail.com', 0, NULL, 1, ''),
('sukapura', 'sukapura', 'e2fc714c4727ee9395f324cd2e7f331f', '08122222', 'adika@b.c', 1, '61f19a0afedc177bb403276b484e5a11.jpg', 1, ''),
('Varie Putra', 'varie', 'adc30c424cd9bc4ded264bbbfb6d387c', '08133911024', 'oktavarian@gmail.com', 0, NULL, 1, ''),
('wargot', 'wargotuhuy', '81dc9bdb52d04dc20036dbd8313ed055', '082132300457', 'wargotuhuy@mail.com', 1, '843a79b2916a63184eafd48e2dd1361c.jpg', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `warungs`
--

CREATE TABLE `warungs` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `place_id` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` enum('Belum diverifikasi','Sudah diverifikasi','Verifikasi tidak disetujui','') NOT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `alasan` text DEFAULT NULL,
  `is_aktif` int(11) NOT NULL DEFAULT 0,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warungs`
--

INSERT INTO `warungs` (`id`, `username`, `place_id`, `lat`, `lng`, `address`, `status`, `ktp`, `alasan`, `is_aktif`, `updated_at`) VALUES
(10, 'kerabat', 'ChIJF6V9W1wo1i0RlY84avKFRIY', '-6.9766033', '107.6285002', 'Telkom University, Jalan Telekomunikasi Jl. Terusan Buah Batu, Sukapura, Bandung, West Java, Indonesia', 'Sudah diverifikasi', NULL, NULL, 1, '2020-04-01'),
(11, 'rajawali', 'ChIJhYoXcKXpaC4RtsIsukYN274', '-6.9796277', '107.6289723', 'Pondok Rajawali 12, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'Sudah diverifikasi', NULL, '', 1, '2021-04-15'),
(14, 'gallery', 'ChIJ4XzVX6XpaC4RG0c8UhI-qnc', '-6.978006', '107.631006', 'D\' Gallery Futsal, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'Sudah diverifikasi', NULL, '', 1, '2020-04-20'),
(15, 'sukapura', 'ChIJQXjDl6zpaC4RuiyZXIf658I', '-6.9699811', '107.6289307', 'Sukapura, Bandung, West Java, Indonesia', 'Sudah diverifikasi', NULL, '', 0, '2021-07-04'),
(18, 'alaw', 'ChIJTz8UzZTpaC4RQMvmtO2PRoY', '-6.972428900000001', '107.6341047', 'Toko Alaw, Sukapura, Bandung, West Java, Indonesia', 'Sudah diverifikasi', '5f75462113c0904fb17f7e0bd9d21576.png', NULL, 1, '2021-05-06'),
(19, 'ibuika', 'ChIJP8tCLpfmaC4RFk9fbCqNrvU', '-6.872345399999999', '107.5881284', 'Warung Ibu Ika, Jalan Picung, Sukarasa, Bandung City, West Java, Indonesia', 'Sudah diverifikasi', '932a71465c0b848c1444f2dc70809bec.jpg', '<p>barang tidak sesuai pesanan</p>', 0, '2021-07-05'),
(20, 'bersama', 'Ek1KbC4gQWRoeWFrc2EgUmF5YSwgU3VrYXB1cmEsIEtlYy4gRGF5ZXVoa29sb3QsIEJhbmR1bmcsIEphd2EgQmFyYXQsIEluZG9uZXNpYSIuKiwKFAoSCVH4l-RM6GguEd7vMv7d5R5pEhQKEglBeMOXrOloLhG6LJlch_rnwg', '-6.966086799999999', '107.6353739', 'Jalan Adhyaksa Raya, Sukapura, Kota Bandung, Jawa Barat, Indonesia', 'Sudah diverifikasi', '', '', 1, '2021-07-01'),
(21, 'wargotuhuy', 'Ek1KbC4gQWRoeWFrc2EgUmF5YSwgU3VrYXB1cmEsIEtlYy4gRGF5ZXVoa29sb3QsIEJhbmR1bmcsIEphd2EgQmFyYXQsIEluZG9uZXNpYSIuKiwKFAoSCVH4l-RM6GguEd7vMv7d5R5pEhQKEglBeMOXrOloLhG6LJlch_rnwg', '-6.966086799999999', '107.6353739', 'Jalan Adhyaksa Raya, Sukapura, Kota Bandung, Jawa Barat, Indonesia', 'Sudah diverifikasi', '67304fb5739690bfb4b000d03d61ab63.jpg', NULL, 1, '2021-07-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id_bank_account`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD KEY `to_cart` (`id`),
  ADD KEY `to_items` (`item`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`,`warung`),
  ADD KEY `user_2` (`user`,`warung`),
  ADD KEY `warung` (`warung`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD KEY `id` (`id`,`item`),
  ADD KEY `invoice_details_ibfk_2` (`item`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `users_foods_fk1` (`username`);
ALTER TABLE `items` ADD FULLTEXT KEY `name` (`name`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD KEY `item` (`item`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD KEY `username` (`username`),
  ADD KEY `item` (`item`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `warungs`
--
ALTER TABLE `warungs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `to_user` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id_bank_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `warungs`
--
ALTER TABLE `warungs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `to_cart` FOREIGN KEY (`id`) REFERENCES `carts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `to_items` FOREIGN KEY (`item`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`warung`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_details_ibfk_2` FOREIGN KEY (`item`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `category` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_foods_fk1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`item`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`item`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `warungs`
--
ALTER TABLE `warungs`
  ADD CONSTRAINT `to_user` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

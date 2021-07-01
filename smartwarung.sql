-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2021 pada 09.13
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `bank_accounts`
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
-- Dumping data untuk tabel `bank_accounts`
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
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `carts`
--

INSERT INTO `carts` (`id`, `username`) VALUES
('cart5e954667e6f6a', 'abcd'),
('cart602542b2c3dee', 'jumahid'),
('cart6082c60ae3dab', 'ocha');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart_details`
--

CREATE TABLE `cart_details` (
  `id` varchar(255) NOT NULL,
  `item` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cart_details`
--

INSERT INTO `cart_details` (`id`, `item`, `quantity`) VALUES
('cart5e954667e6f6a', 8, 1),
('cart602542b2c3dee', 16, 1),
('cart6082c60ae3dab', 19, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Kebersihan'),
(2, 'Makanan'),
(3, 'Laundry'),
(4, 'Kamar Mandi'),
(5, 'Other');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
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
-- Dumping data untuk tabel `comments`
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
(14, 'asdasd', 'asdasdasd', 'gallery', 'asdasdasdasd asdas d', 0, NULL, 'ad0bbe6a1de5099945c8b226d310d9f4.png', '2021-04-09 11:15:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoices`
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
-- Dumping data untuk tabel `invoices`
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
('invoice608ae1872a20c', 'ocha', 'rajawali', 'Pondok Rajawali 12, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJhYoXcKXpaC4RtsIsukYN274', 'IFI Futsal, Jalan Sukabirus, Citeureup, Bandung City, West Java, Indonesia', 'ChIJgRwceq_paC4Rwjqb_J8qFFQ', 0.3, 750, 10539, 11289, 'Transfer', 'BRI', '123', 'Ocha', 'BRI', '24cb483db7927920879c7df6863c5aea.png', NULL, 'Menunggu verif pembayaran', '2021-04-29 16:40:39'),
('invoice608ce7bb1c5ad', 'ocha', 'rajawali', 'Pondok Rajawali 12, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJhYoXcKXpaC4RtsIsukYN274', 'IFI Futsal, Jalan Sukabirus, Citeureup, Bandung City, West Java, Indonesia', 'ChIJgRwceq_paC4Rwjqb_J8qFFQ', 0.3, 750, 12399, 13149, 'Transfer', 'BCA', '1234567', 'Ocha', 'BCA', '6e70f69d5c9dafe8d943ac3f763f1dc7.png', '', 'Sudah diterima', '2021-05-01 05:31:39'),
('invoice6090f5224505e', 'ocha', 'rajawali', 'Pondok Rajawali 12, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJhYoXcKXpaC4RtsIsukYN274', 'Pondok 212, Jl. Sukapura, Citeureup, Bandung, West Java, Indonesia', 'ChIJn8--lTnpaC4Rnu_GKzG69Ww', 0.1, 250, 10415, 10665, 'Transfer', 'BNI', '123', 'Ocha', 'BNI', NULL, NULL, 'Dibatalkan', '2021-05-04 07:17:54'),
('invoice6090f5fa75679', 'ocha', 'gallery', 'D\' Gallery Futsal, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJ4XzVX6XpaC4RG0c8UhI-qnc', 'Syndir Cut, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJvSRZja_paC4REpS7-qxN0zM', 0.1, 250, 15000, 15250, 'COD', NULL, NULL, NULL, NULL, NULL, NULL, 'Sudah diterima', '2021-05-04 07:21:30');

--
-- Trigger `invoices`
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
-- Struktur dari tabel `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` varchar(255) NOT NULL,
  `item` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `item`, `quantity`, `price`) VALUES
('invoice5e96ff3770461', 8, 2, 10000),
('invoice5e96ff3770461', 9, 3, 3000),
('invoice5e974f6fcf5d9', 8, 1, 10000),
('invoice5e974f6fcf5d9', 9, 1, 3000),
('invoice5e9d8d550bba9', 8, 1, 15000),
('invoice5e9d8d550bba9', 9, 10, 3000),
('invoice5e9dafbdd7896', 12, 1, 12399),
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
('invoice6083c6555bafb', 18, 1, 3000),
('invoice6083c6555bafb', 16, 1, 2610),
('invoice6083c6b83d5aa', 19, 1, 11159),
('invoice608a738b1d776', 19, 4, 12399),
('invoice608ae1872a20c', 12, 1, 10539),
('invoice608ce7bb1c5ad', 23, 1, 12399),
('invoice6090f5224505e', 19, 1, 10415),
('invoice6090f5fa75679', 17, 1, 15000);

--
-- Trigger `invoice_details`
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
-- Struktur dari tabel `items`
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
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`id`, `username`, `name`, `category`, `stock`, `price`, `description`, `photo`, `hide`, `discount`, `is_week_sale`, `date_week_sale`, `date`) VALUES
(8, 'gallery', 'Vixalaaaaa', 1, 74, 15000, 'Bersih mengkilap, pembersih lantai', '2598bbcb533db9058ba43648ba8ac0fa.png', 0, 10, 0, '2021-04-23', '2021-03-16 13:51:08'),
(9, 'gallery', 'Sabunadasdasd', 4, 5, 3000, '<p>Wangi</p>\r\n', 'd14b89596d482122d6e37429d53c44cc.png', 0, 10, 0, '0000-00-00', '2021-03-16 13:51:08'),
(12, 'rajawali', 'Apaja', 2, 122, 12399, 'asdfadsf', '1f34fe68c8542c3592a2cd4e163ed056.jpg', 0, 0, 0, '0000-00-00', '2021-03-16 13:51:08'),
(16, 'gallery', 'Sunlight', 1, 121, 3000, 'Jeruk nipis', '82ef105b29d0e65342b398a7680c2780.jpg', 0, 0, 0, '0000-00-00', '2021-03-16 13:51:08'),
(17, 'gallery', 'Shampo Rejoice', 4, 76, 15000, 'Bersih mengkilap, pembersih lantai', '2598bbcb533db9058ba43648ba8ac0fa.png', 0, 0, 0, '0000-00-00', '2021-03-16 13:51:08'),
(18, 'gallery', 'Shampo Zink', 4, 20, 3000, 'Wangi', 'd14b89596d482122d6e37429d53c44cc.png', 0, 0, 0, '0000-00-00', '2021-03-16 13:51:08'),
(19, 'rajawali', 'Shampo Dove', 4, 117, 12399, 'asdfadsf', '1f34fe68c8542c3592a2cd4e163ed056.jpg', 0, 26, 1, '2021-07-01', '2021-03-16 13:51:08'),
(20, 'sukapura', 'Shampo Clear', 4, 123, 3000, 'Jeruk nipis', '82ef105b29d0e65342b398a7680c2780.jpg', 0, 15, 1, '2021-07-01', '2021-03-16 13:51:08'),
(21, 'sukapura', 'Sabun Lifeboy', 4, 77, 15000, 'Bersih mengkilap, pembersih lantai', '2598bbcb533db9058ba43648ba8ac0fa.png', 0, 0, 0, '0000-00-00', '2021-03-16 13:51:08'),
(22, 'kerabat', 'Sabun Romano', 4, 18, 3000, 'Wangi', 'd14b89596d482122d6e37429d53c44cc.png', 0, 22, 1, '2021-07-01', '2021-03-16 13:51:08'),
(23, 'rajawali', 'Sabun Dove', 4, 122, 12399, 'asdfadsf', '1f34fe68c8542c3592a2cd4e163ed056.jpg', 0, 0, 0, '0000-00-00', '2021-03-16 13:51:08'),
(24, 'kerabat', 'Sabun Lux', 4, 123, 3000, 'Jeruk nipis', '82ef105b29d0e65342b398a7680c2780.jpg', 0, 27, 1, '2021-07-01', '2021-03-16 13:51:08'),
(25, 'gallery', 'Shampo Dove 135 mL', 4, 123, 12399, 'asdfadsf', '1f34fe68c8542c3592a2cd4e163ed056.jpg', 0, 0, 0, '0000-00-00', '2021-03-16 13:51:08'),
(26, 'gallery', 'Indomie Rendang', 2, 15, 3000, '<p>Mie Instan</p>\r\n', '86b9efb592a7b11d8cb18008e50d4e5f.jpg', 0, 2, 1, '2021-07-01', '2021-05-05 06:40:43'),
(27, 'alaw', 'KOBE Mi Bon Cabe', 2, 5, 6299, 'Mi Boncabe merupakan mie instan kenyal yang dipadukan dengan pedas sedapnya Boncabe, sehingga menjadi kombinasi mantap bagi Anda pecinta sensasi makan mie pedas yang HQQ. Kelebihan Mi Boncabe dengan produk Mie pedas lainnya adalah kepingan mie-nya sendiri sudah mengandung Boncabe. Mi Boncabe kepingan mie-nya tidak berwarna kuning, melainkan agak kemerahan karena kandungan Boncabe-nya. Selain itu, Mie goreng Boncahe ini juga bisa dimakan polos tanpa bumbu pun sudah ada sensasi khas Boncabe-nya.', 'e8d3b958968612f43a649380e5ba3be1.jpg', 0, 0, 0, NULL, '2021-05-06 08:52:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ratings`
--

CREATE TABLE `ratings` (
  `username` varchar(255) NOT NULL,
  `item` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ratings`
--

INSERT INTO `ratings` (`username`, `item`, `rating`) VALUES
('abcd', 8, 5),
('abcd', 8, 4),
('abcd', 9, 1),
('jumahid', 16, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviews`
--

CREATE TABLE `reviews` (
  `username` varchar(255) NOT NULL,
  `item` int(11) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reviews`
--

INSERT INTO `reviews` (`username`, `item`, `review`) VALUES
('abcd', 8, 'Barang bagus original'),
('abcd', 8, 'Mantap gan'),
('abcd', 9, 'Barang jelek'),
('jumahid', 16, 'pengiriman cepat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transfer`
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
-- Dumping data untuk tabel `transfer`
--

INSERT INTO `transfer` (`id`, `total`, `username`, `status`, `date`, `bukti`) VALUES
(10, '165000', 'kerabat', '', '2021-04-29 09:21:27', ''),
(11, '2070', 'gallery', '', '2021-04-29 09:21:42', ''),
(12, '49596', 'rajawali', 'Sudah ditransfer', '2021-04-29 17:10:23', '35ad1b932466d1d50f5ebd6491afb9ea.png'),
(13, '12399', 'rajawali', '', '2021-05-01 05:34:18', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`name`, `username`, `password`, `phone`, `email`, `role`, `photo`, `is_aktif_cust`, `alasan`) VALUES
('Ulalalalala', 'abcd', 'e2fc714c4727ee9395f324cd2e7f331f', '08123', 'a@b.c', 0, NULL, 0, '<p>karena 123</p>'),
('admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '08111111', 'admin@smartwarung.com', 99, NULL, 1, ''),
('Toko Alaw', 'alaw', 'e2fc714c4727ee9395f324cd2e7f331f', '08123345665', 'alaw@gmail.com', 1, '851e30aef96292cb123a3efab99f19a4.png', 1, ''),
('Gallery', 'gallery', 'e2fc714c4727ee9395f324cd2e7f331f', '123', '1@s.c', 1, '7d6019698936a373c869ee6de7ed275e.jpg', 1, ''),
('Warung Ibu Ika', 'ibuika', 'e2fc714c4727ee9395f324cd2e7f331f', '086532515211', 'warungibuika@gmail.com', 1, '19747304c29bebbbdb059a5f877e07b2.jpg', 1, ''),
('Jumahid Habib', 'jumahid', '86dd55229128fd39981a8e19d2026386', '082137244805', 'jmhdoaoe@gmail.com', 0, NULL, 1, ''),
('Warung Kerabat', 'kerabat', 'e2fc714c4727ee9395f324cd2e7f331f', '0812', 'a@b.c', 1, '17cf68a4ff5b1c1f1fe2eb39373d3cfa.jpg', 1, ''),
('Oktrichavita Jassinda', 'ocha', '2ea4dce70aecd3a50945105a01aa2cba', '0812345678', 'oktrichavitajk@gmail.com', 0, NULL, 1, ''),
('Rajawali', 'rajawali', 'e2fc714c4727ee9395f324cd2e7f331f', '0812', 'a@b.cd', 1, '2557a0a8a0e7856fe8b6c5f4908229c8.png', 1, ''),
('sukapura', 'sukapura', 'e2fc714c4727ee9395f324cd2e7f331f', '08122222', 'adika@b.c', 1, '61f19a0afedc177bb403276b484e5a11.jpg', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `warungs`
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
-- Dumping data untuk tabel `warungs`
--

INSERT INTO `warungs` (`id`, `username`, `place_id`, `lat`, `lng`, `address`, `status`, `ktp`, `alasan`, `is_aktif`, `updated_at`) VALUES
(10, 'kerabat', 'ChIJF6V9W1wo1i0RlY84avKFRIY', '-6.9766033', '107.6285002', 'Telkom University, Jalan Telekomunikasi Jl. Terusan Buah Batu, Sukapura, Bandung, West Java, Indonesia', 'Sudah diverifikasi', NULL, NULL, 1, '2020-04-01'),
(11, 'rajawali', 'ChIJhYoXcKXpaC4RtsIsukYN274', '-6.9796277', '107.6289723', 'Pondok Rajawali 12, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'Sudah diverifikasi', NULL, '', 1, '2021-04-15'),
(14, 'gallery', 'ChIJ4XzVX6XpaC4RG0c8UhI-qnc', '-6.978006', '107.631006', 'D\' Gallery Futsal, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'Sudah diverifikasi', NULL, '', 1, '2020-04-20'),
(15, 'sukapura', 'ChIJQXjDl6zpaC4RuiyZXIf658I', '-6.9699811', '107.6289307', 'Sukapura, Bandung, West Java, Indonesia', 'Belum diverifikasi', NULL, '', 0, '2021-04-28'),
(18, 'alaw', 'ChIJTz8UzZTpaC4RQMvmtO2PRoY', '-6.972428900000001', '107.6341047', 'Toko Alaw, Sukapura, Bandung, West Java, Indonesia', 'Sudah diverifikasi', '5f75462113c0904fb17f7e0bd9d21576.png', NULL, 1, '2021-05-06'),
(19, 'ibuika', 'ChIJP8tCLpfmaC4RFk9fbCqNrvU', '-6.872345399999999', '107.5881284', 'Warung Ibu Ika, Jalan Picung, Sukarasa, Bandung City, West Java, Indonesia', 'Belum diverifikasi', '932a71465c0b848c1444f2dc70809bec.jpg', NULL, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id_bank_account`);

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `cart_details`
--
ALTER TABLE `cart_details`
  ADD KEY `to_cart` (`id`),
  ADD KEY `to_items` (`item`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indeks untuk tabel `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`,`warung`),
  ADD KEY `user_2` (`user`,`warung`),
  ADD KEY `warung` (`warung`);

--
-- Indeks untuk tabel `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD KEY `id` (`id`,`item`),
  ADD KEY `invoice_details_ibfk_2` (`item`);

--
-- Indeks untuk tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `users_foods_fk1` (`username`);
ALTER TABLE `items` ADD FULLTEXT KEY `name` (`name`);

--
-- Indeks untuk tabel `ratings`
--
ALTER TABLE `ratings`
  ADD KEY `item` (`item`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD KEY `username` (`username`),
  ADD KEY `item` (`item`);

--
-- Indeks untuk tabel `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `warungs`
--
ALTER TABLE `warungs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `to_user` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id_bank_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `warungs`
--
ALTER TABLE `warungs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `to_cart` FOREIGN KEY (`id`) REFERENCES `carts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `to_items` FOREIGN KEY (`item`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`warung`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_details_ibfk_2` FOREIGN KEY (`item`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `category` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_foods_fk1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`item`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`item`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `warungs`
--
ALTER TABLE `warungs`
  ADD CONSTRAINT `to_user` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 21, 2023 at 04:58 PM
-- Server version: 8.0.34-0ubuntu0.22.04.1
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokori`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-11-13-093523', 'App\\Database\\Migrations\\Users', 'default', 'App', 1702925594, 1),
(2, '2023-11-13-200128', 'App\\Database\\Migrations\\Companies', 'default', 'App', 1702925594, 1),
(3, '2023-11-16-200128', 'App\\Database\\Migrations\\PaymentMethods', 'default', 'App', 1702925594, 1),
(4, '2023-11-27-165121', 'App\\Database\\Migrations\\ProductCategories', 'default', 'App', 1702925594, 1),
(5, '2023-11-27-165152', 'App\\Database\\Migrations\\ProductUnits', 'default', 'App', 1702925594, 1),
(6, '2023-11-27-165204', 'App\\Database\\Migrations\\Products', 'default', 'App', 1702925594, 1),
(7, '2023-11-27-180256', 'App\\Database\\Migrations\\Sales', 'default', 'App', 1702925594, 1),
(8, '2023-11-27-180440', 'App\\Database\\Migrations\\SaleProducts', 'default', 'App', 1702925594, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` char(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
('PYMT0001', 'CASH', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PYMT0002', 'CREDIT CARD', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PYMT0003', 'BANK TRANSFER', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PYMT0004', 'GOPAY', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PYMT0005', 'DANA', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PYMT0006', 'OVO', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PYMT0008', 'SHOPEE PAY', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` char(10) NOT NULL,
  `product_category_id` char(10) NOT NULL,
  `product_unit_id` char(10) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_category_id`, `product_unit_id`, `code`, `name`, `photo`, `price`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
('P000000001', 'PC00000001', 'PU00000001', '8886015203115', 'Good Time (Double Choc)', '1702925638_24b644790b381b544f14.jpg', '15000.00', 134, '2023-12-18 18:53:20', '2023-12-21 09:57:42', NULL),
('P000000002', 'PC00000001', 'PU00000002', '8993175540797', 'Nextar Brownies', '1702925685_d161aedaff0250cba6fb.jpg', '25000.00', 183, '2023-12-18 18:54:45', '2023-12-21 09:57:42', NULL),
('P000000003', 'PC00000012', 'PU00000002', '8996001355978', 'Beng-beng Share it', '1702925830_8e12b573fcca8f7b8149.jpg', '20000.00', 112, '2023-12-18 18:57:10', '2023-12-20 21:09:11', NULL),
('P000000004', 'PC00000012', 'PU00000001', '089686598056', 'Chitato Beef Edition 68gr', '1702926099_cc8c1da3869e9f94a072.jpg', '9000.00', 244, '2023-12-18 19:01:39', '2023-12-18 20:04:23', NULL),
('P000000005', 'PC00000012', 'PU00000001', '8997032680985', 'Taro Tempe Himalayan Salt 50gr', '1702926190_91ede50d04bd446b023d.jpg', '9500.00', 200, '2023-12-18 19:03:06', '2023-12-18 19:03:10', NULL),
('P000000006', 'PC00000012', 'PU00000001', '8992775001042', 'Garuda Pilus Mi Goreng 95gr', '1702926323_370413bf8aa2ca72d514.jpg', '8000.00', 100, '2023-12-18 19:05:15', '2023-12-18 19:05:23', NULL),
('P000000007', 'PC00000001', 'PU00000001', '8888166336605', 'NISSIN Wafers Chocolate 110gr', '1702926410_0447f72fd96ec7f14ccd.jpg', '9000.00', 97, '2023-12-18 19:06:50', '2023-12-21 09:57:42', NULL),
('P000000008', 'PC00000012', 'PU00000002', '8991102230308', 'Permen BLASTER', '1702926500_74ff286ce1cc8574ded7.jpg', '7500.00', 83, '2023-12-18 19:08:20', '2023-12-21 09:57:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` char(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
('PC00000001', 'Makanan Kering', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PC00000002', 'Minuman Kaleng', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PC00000003', 'Perlengkapan Dekorasi', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PC00000004', 'Peralatan Dapur', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PC00000005', 'Produk Kebersihan', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PC00000006', 'Perawatan Tubuh', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PC00000007', 'Bahan Pokok', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PC00000008', 'Susu dan Produk Susu', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PC00000009', 'Roti dan Produk Roti', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PC00000010', 'Makanan Instan', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PC00000011', 'Buah dan Sayuran Segar', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PC00000012', 'Camilan', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PC00000013', 'Produk Frozen (Makanan Beku)', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PC00000014', 'Alat Tulis Kantor', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PC00000015', 'Pakaian', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PC00000016', 'Sepatu', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PC00000017', 'Aksesoris Fashion', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PC00000018', 'Alat Rumah Tangga', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PC00000019', 'Mainan dan Hobi', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PC00000020', 'Produk Otomotif', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_units`
--

CREATE TABLE `product_units` (
  `id` char(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product_units`
--

INSERT INTO `product_units` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
('PU00000001', 'Piece', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PU00000002', 'Pack', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('PU00000003', 'Box', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` char(10) NOT NULL,
  `payment_method_id` char(10) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `total_sale_amount` decimal(10,2) NOT NULL,
  `tax_amount` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `pay_amount` decimal(10,2) NOT NULL,
  `payback_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `payment_method_id`, `customer_name`, `total_sale_amount`, `tax_amount`, `total_amount`, `pay_amount`, `payback_amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
('5sKwulttAu', 'PYMT0001', '', '108000.00', '11880.00', '119880.00', '120000.00', '120.00', '2023-12-20 21:09:11', '2023-12-20 21:09:11', NULL),
('6bc9G3MJI0', 'PYMT0001', NULL, '274000.00', '30140.00', '304140.00', '310000.00', '5860.00', '2023-12-18 20:04:23', '2023-12-18 20:04:23', NULL),
('mVfwER03oI', 'PYMT0001', '', '261500.00', '28765.00', '290265.00', '300000.00', '9735.00', '2023-12-21 09:57:42', '2023-12-21 09:57:42', NULL),
('onEc0Kc171', 'PYMT0001', 'Rizky', '325000.00', '35750.00', '360750.00', '365000.00', '4250.00', '2023-12-20 05:27:21', '2023-12-20 05:27:21', NULL),
('T6urJ8MLkF', 'PYMT0004', '', '65000.00', '7150.00', '72150.00', '100000.00', '27850.00', '2023-12-21 03:27:18', '2023-12-21 03:27:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sale_products`
--

CREATE TABLE `sale_products` (
  `id` char(10) NOT NULL,
  `sales_id` char(10) NOT NULL,
  `product_id` char(10) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `sale_products`
--

INSERT INTO `sale_products` (`id`, `sales_id`, `product_id`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
('09OvEchboC', 'mVfwER03oI', 'P000000001', '6', '2023-12-21 09:57:42', '2023-12-21 09:57:42', NULL),
('5dbioLesQF', '6bc9G3MJI0', 'P000000003', '5', '2023-12-18 20:04:23', '2023-12-18 20:04:23', NULL),
('bQLuaSybwE', 'onEc0Kc171', 'P000000008', '10', '2023-12-20 05:27:21', '2023-12-20 05:27:21', NULL),
('CeUsqqLmG9', '6bc9G3MJI0', 'P000000004', '6', '2023-12-18 20:04:23', '2023-12-18 20:04:23', NULL),
('IXtNqz5QS9', 'mVfwER03oI', 'P000000002', '5', '2023-12-21 09:57:42', '2023-12-21 09:57:42', NULL),
('jSFQ4D3sdp', 'T6urJ8MLkF', 'P000000008', '2', '2023-12-21 03:27:18', '2023-12-21 03:27:18', NULL),
('L40DxE59SX', 'mVfwER03oI', 'P000000008', '5', '2023-12-21 09:57:42', '2023-12-21 09:57:42', NULL),
('lcABXumtBh', 'mVfwER03oI', 'P000000007', '1', '2023-12-21 09:57:42', '2023-12-21 09:57:42', NULL),
('m1zthwAZYC', '5sKwulttAu', 'P000000003', '3', '2023-12-20 21:09:11', '2023-12-20 21:09:11', NULL),
('MTaumlcMFn', 'T6urJ8MLkF', 'P000000002', '2', '2023-12-21 03:27:18', '2023-12-21 03:27:18', NULL),
('P1ELW4iLgA', '6bc9G3MJI0', 'P000000001', '8', '2023-12-18 20:04:23', '2023-12-18 20:04:23', NULL),
('r5WIYiFpD4', '5sKwulttAu', 'P000000001', '2', '2023-12-20 21:09:11', '2023-12-20 21:09:11', NULL),
('vppNuMLFOu', '5sKwulttAu', 'P000000007', '2', '2023-12-20 21:09:11', '2023-12-20 21:09:11', NULL),
('z7yFiTkFVY', 'onEc0Kc171', 'P000000002', '10', '2023-12-20 05:27:21', '2023-12-20 05:27:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` char(10) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `sales_tax` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `company_name`, `company_logo`, `sales_tax`, `created_at`, `updated_at`, `deleted_at`) VALUES
('ST00000001', 'Sumber Berkah Jaya', '1702929452_b216df86716441bb4cb9.png', 11, '2023-12-18 18:53:20', '2023-12-20 21:04:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(10) NOT NULL,
  `role` enum('Manajer','Kasir') NOT NULL DEFAULT 'Kasir',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `photo`, `is_active`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
('3BJKz2cIQT', 'Kasir', 'Fiqri', 'fiqri@tokori.id', NULL, 1, '$2y$10$hKoas.68TToT5H5gulPTFeT0.zP0js4wzFgxrk/zDo.bVmuy8seuW', '2023-12-18 18:53:20', '2023-12-18 18:53:20', NULL),
('o4reNSoSWK', 'Manajer', 'Ramadhan Edy', 'ramadhan@tokori.id', NULL, 1, '$2y$10$PZdtI000XWK3hmvUxIb1L.KRM.Tqo2vczNl2DW2RBLjwBVNKG2AA.', '2023-12-18 18:53:20', '2023-12-20 20:56:39', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_units`
--
ALTER TABLE `product_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_products`
--
ALTER TABLE `sale_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

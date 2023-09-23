-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2023 at 05:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olives_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_1` varchar(255) DEFAULT NULL,
  `banner_2` varchar(255) DEFAULT NULL,
  `banner_3` varchar(255) DEFAULT NULL,
  `banner_4` varchar(255) DEFAULT NULL,
  `banner_5` varchar(255) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_1`, `banner_2`, `banner_3`, `banner_4`, `banner_5`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'php774D_1692977056.jpg', 'php774E_1692977056.jpg', 'php774F_1692977056.jpg', 'php7750_1692977056.jpg', 'php920_1693200267.jpg', '3', NULL, '2023-08-27 21:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `product_total_quantity` bigint(20) DEFAULT NULL,
  `product_total_price` bigint(20) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2023_08_25_050200_products', 3),
(11, '2023_08_25_143707_banners', 4),
(14, '2023_08_29_051807_carts', 5),
(16, '2023_08_29_052212_create_carts_table', 6),
(17, '2023_08_30_054851_create_orders_table', 7),
(18, '2023_08_30_083033_add_unique_token_field', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `product_total_quantity` bigint(20) DEFAULT NULL,
  `product_total_price` bigint(20) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unique_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `product_total_quantity`, `product_total_price`, `status`, `created_at`, `updated_at`, `unique_token`) VALUES
(56, '3', '17', 2, 55000, 'Processing', '2023-08-30 06:27:58', NULL, 'fVhdOq2nusfFUhh'),
(57, '3', '21', 3, 255000, 'Order Shipped', '2023-08-30 06:28:37', NULL, 'uKtvfaQVZHgRfZH'),
(58, '3', '20', 3, 22500, 'Order Shipped', '2023-08-30 06:28:37', NULL, 'uKtvfaQVZHgRfZH'),
(59, '3', '23', 2, 11200, 'Order Shipped', '2023-08-30 06:28:37', NULL, 'uKtvfaQVZHgRfZH'),
(60, '3', '20', 2, 15000, 'Order Shipped', '2023-08-30 06:44:33', NULL, '1r2STZwvIpLO3GZ');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `overview` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `category`, `quantity`, `overview`, `description`, `product_image`, `remember_token`, `created_at`, `updated_at`) VALUES
(17, 'MSI RADEON RX 6950 XT GAMING X TRIO 16GB', 27500, 'Graphics Card', 89, 'The new AMD Radeon™ RX 6950 XT graphic cards are optimized for DirectStorage to help reduce load times in games and bring expansive worlds to life in amazing detail. The Radeon™ RX 6000 Series graphic cards take full advantage of the latest innovations in upscaling technologies such as AMD FidelityFX™ Super Resolution2 or the new Radeon™ Super Resolution1. Whether it is AAA gaming or eSports, experience all your games without compromise.', '- Boost Clock / Memory Speed\r\n- Up to 2454 MHz / 18 Gbps\r\n- 16GB GDDR6\r\n- DisplayPort x 3 (v1.4a)\r\n- HDMI™ x 1 (Supports 4K@120Hz as specified in HDMI™ 2.1)\r\n- TRI FROZR 2 Thermal Design', 'phpCD7D_1692943196.png', NULL, '2023-08-24 21:59:56', '2023-08-25 06:22:28'),
(19, 'AMD RYZEN 7 3700X', 12000, 'Processor', 0, 'Wreak havoc online, we don’t mind\r\nExperience elite performance in games, content creation, and intense multi-tasking in a beautifully balanced design for serious PC enthusiasts.', '# of CPU Cores: 8\r\n# of Threads: 16\r\nBase Clock: 3.6GHz\r\nMax Boost Clock: Up to 4.4GHz\r\nTotal L1 Cache: 512KB\r\nTotal L2 Cache: 4MB\r\nTotal L3 Cache: 32MB\r\nThermal Solution (PIB): Wraith Prism with RGB LED\r\nThermal Solution (MPK): Wraith Prism\r\nDefault TDP / TDP: 65W', 'php2FA_1692950943.png', NULL, '2023-08-25 00:09:03', '2023-08-25 06:22:12'),
(20, 'AMD RYZEN 5 5600G', 7500, 'Processor', 18, '# of CPU Cores: 6 Base Clock: 3.9GHz Package: AM4 # of Threads: 12 Max Boost Clock: Up to 4.4GHz PCI Express® Version: PCIe® 3.0 # of GPU Cores: 7', '# of CPU Cores: 6\r\nBase Clock: 3.9GHz\r\nPackage: AM4\r\n# of Threads: 12\r\nMax Boost Clock: Up to 4.4GHz\r\nPCI Express® Version: PCIe® 3.0\r\n# of GPU Cores: 7\r\nSystem Memory Specification: Up to 3200MHz\r\nSystem Memory Type: DDR4\r\nMemory Channels: 2', 'php2340_1692951017.png', NULL, '2023-08-25 00:10:17', '2023-08-30 03:25:38'),
(21, 'GIGABYTE G5 KE-52PH263SH GAMING LAPTOP', 85000, 'Laptop', 53, 'PROCESSOR: Intel® Core™ i5-12500H DISPLAY: 15.6\" FHD 144Hz Display MEMORY: 8GB DDR4 Memory STORAGE: GEN4 512GB SSD GPU: GeForce RTX 3060 Battery: Lithium-Ion 54Wh', 'PROCESSOR: Intel® Core™ i5-12500H\r\nDISPLAY: 15.6\" FHD 144Hz Display\r\nMEMORY: 8GB DDR4 Memory\r\nSTORAGE: GEN4 512GB SSD\r\nGPU: GeForce RTX 3060\r\nBattery: Lithium-Ion 54Wh\r\nDimensions (W x D x H): 36.0 (W) x 23.8 (D) x 2.39(H) cm\r\nOS: Windows 11 Home', 'php9A1C_1692951834.png', NULL, '2023-08-25 00:23:54', '2023-08-30 03:25:50'),
(22, 'MSI GF63 THIN 11UCX-1479PH', 72000, 'Laptop', 17, 'Intel® Core™ I5-11260H processor Windows 11 NVIDIA® GeForce RTX™ 2050 Laptop GPU 4GB GDDR6 15.6\" Full HD (1920x1080), 144 Hz Refresh Rate, IPS-Level panel (Optional)', 'Intel® Core™ I5-11260H processor\r\nWindows 11\r\nNVIDIA® GeForce RTX™ 2050 Laptop GPU 4GB GDDR6\r\n15.6\" Full HD (1920x1080), 144 Hz Refresh Rate, IPS-Level panel (Optional)\r\nThin bezel design\r\nAluminum hairbrush aesthetics with asymmetric pattern\r\n21.7mm thin, 1.86kg light\r\nMSI Center with exclusive Gaming Mode\r\nMSI App Player for seamless gaming experience between mobile and PC\r\nHigh-Resolution Audio ready', 'php8EE8_1692951962.png', NULL, '2023-08-25 00:26:02', '2023-08-25 06:21:38'),
(23, 'BEQUIET SFX L POWER GOLD 600W', 5600, 'Power Supply', 64, 'COMPACT AND SILENT ENERGY 80 PLUS® Gold certification (up to 92% efficiency) Four PCIe connectors for powerful GPUs Stable LLC, Synchronous Rectifier (SR) and DC-to-DC power conversion Modular cables for...', 'COMPACT AND SILENT ENERGY\r\n80 PLUS® Gold certification (up to 92% efficiency)\r\nFour PCIe connectors for powerful GPUs\r\nStable LLC, Synchronous Rectifier (SR) and DC-to-DC power conversion\r\nModular cables for maximum build flexibility\r\nTemperature-controlled 120mm high-quality fan\r\nSFX-to-ATX adapter bracket for usage with larger case sizes', 'php6091_1692952016.png', NULL, '2023-08-25 00:26:56', '2023-08-25 06:21:25'),
(24, 'CORSAIR HX850 PLATINUM 850WATTS 80+', 9500, 'Power Supply', 77, 'ATX Connector: 1 Adjustable Single/Multi 12V Rail: No ATX12V Version: v2.4 Continuous output rated temperature C: 50°C Continuous power W: 850 Watts Corsair Link Support: No Fan bearing technology: Fluid...', 'ATX Connector: 1\r\nAdjustable Single/Multi 12V Rail: No\r\nATX12V Version: v2.4\r\nContinuous output rated temperature C: 50°C\r\nContinuous power W: 850 Watts\r\nCorsair Link Support: No\r\nFan bearing technology: Fluid Dynamic Bearing\r\nFan size mm: 135mm\r\nMTBF hours: 100,000 hours\r\nMulti-GPU ready: YES\r\nPower: 850 Watts\r\n80 PLUS Efficiency: Platinum\r\nPSU Form Factor: ATX\r\nZero RPM Mode: Yes\r\nCable Type: Low-Profile, All Black\r\nC-Link Ready: No\r\nDimensions: 150mm x 86mm x 180mm\r\nEPS Connector: 2\r\nFloppy Connector: 1\r\nModular: Fully\r\nPCI-E Connector: 6\r\nPlug Type: NA\r\nSATA Connector: 16', 'php5A63_1692952080.png', NULL, '2023-08-25 00:28:00', '2023-08-25 06:21:13'),
(25, 'ASUS ROG STRIX RTX 3080 EVANGELION 12G', 56000, 'Graphics Card', 95, 'Graphic Engine: NVIDIA® GeForce RTX™ 3080 Bus Standard: PCI Express 4.0 OpenGL: OpenGL®4.6 Video Memory: 12GB GDDR6X Engine Clock: OC mode: 1890 MHz(Boost Clock) Gaming mode: 1860 MHz(Boost Clock) CUDA...', 'Graphic Engine: NVIDIA® GeForce RTX™ 3080\r\nBus Standard: PCI Express 4.0\r\nOpenGL: OpenGL®4.6\r\nVideo Memory: 12GB GDDR6X\r\nEngine Clock:\r\nOC mode: 1890 MHz(Boost Clock)\r\nGaming mode: 1860 MHz(Boost Clock)\r\nCUDA Core: 8960\r\nMemory Speed: 19 Gbps\r\nMemory Interface: 384-bit\r\nResolution: Digital Max Resolution 7680 x 4320\r\nInterface:\r\nYes x 2 (Native HDMI 2.1)\r\nYes x 3 (Native DisplayPort 1.4a)\r\nHDCP Support Yes (2.3)\r\nMaximum Display Support: 4\r\nNVlink/ Crossfire Support: No\r\nSoftware: ASUS GPU Tweak II & GeForce Game Ready Driver & Studio Driver: please download all software from the support site.\r\nDimensions: 318.5 *140.1 *57.78 mm / 12.53 *5.51 *2.27 inch\r\nRecommended PSU: 850W\r\nPower Connectors: 3 x 8-pin\r\nSlot: 2.9 Slot\r\nAURA SYNC: ARGB', 'php341B_1692952135.png', NULL, '2023-08-25 00:28:55', '2023-08-25 06:21:03'),
(26, 'GIGABYTE RX 7900 XTX AORUS ELITE 24GB', 78000, 'Graphics Card', 46, 'Graphics Processing: Radeon™ RX 7900 XTX Core Clock Boost Clock* : up to 2680 MHz (Reference card: 2500 MHz) Game Clock* : up to 2510 MHz (Reference card: 2300 MHz)', 'Graphics Processing: Radeon™ RX 7900 XTX\r\nCore Clock\r\nBoost Clock* : up to 2680 MHz (Reference card: 2500 MHz)\r\nGame Clock* : up to 2510 MHz (Reference card: 2300 MHz)\r\nStream Processors: 6144\r\nMemory Clock: 20 Gbps\r\nMemory Size: 24 GB\r\nMemory Type: GDDR6\r\nMemory Bus: 384 bit\r\nCard Bus: PCI-E 4.0\r\nDigital max resolution: 7680x4320\r\nMulti-view: 4\r\nCard size: L=335 W=137 H=69 mm\r\nPCB Form: ATX\r\nDirectX: 12 Ultimate\r\nOpenGL: 4.6\r\nRecommended PSU: 850W\r\nPower Connectors: 8 pin*3\r\nOutput:\r\nDisplayPort 2.1 *2\r\nHDMI 2.1 *2', 'php2216_1692952196.png', NULL, '2023-08-25 00:29:56', '2023-08-25 06:20:49'),
(27, 'ASUS ROG STRIX RTX 4090 OC 24G', 130000, 'Graphics Card', 74, 'Graphic Engine: NVIDIA® GeForce RTX™ 4090 Bus Standard: PCI Express 4.0 OpenGL: OpenGL®4.6 Video Memory: 24GB GDDR6X Engine Clock: OC mode: 2640 MHz', 'Graphic Engine: NVIDIA® GeForce RTX™ 4090\r\nBus Standard: PCI Express 4.0\r\nOpenGL: OpenGL®4.6\r\nVideo Memory: 24GB GDDR6X\r\nEngine Clock: OC mode: 2640 MHz, Default mode: 2610 MHz (Boost Clock)\r\nCUDA Core: 16384\r\nMemory Speed: 21 Gbps\r\nMemory Interface: 384-bit\r\nResolution: Digital Max Resolution 7680 x 4320\r\nInterface:\r\nYes x 2 (Native HDMI 2.1a)\r\nYes x 3 (Native DisplayPort 1.4a)\r\nHDCP Support Yes (2.3)\r\nMaximum Display Support: 4\r\nNVlink/ Crossfire Support: No\r\nAccessories\r\n1 x Collection Card​\r\n1 x Speedsetup Manual​\r\n1 x Adapter Cable​\r\n1 x ROG Graphics Card Holder\r\n1 x ROG Velcro Hook & Loop\r\n1 x Thank you Card\r\nSoftware: ASUS GPU Tweak III & GeForce Game Ready Driver & Studio Driver: please download all software from the support site.\r\nDimensions: 357.6 x 149.3 x 70.1mm\r\nRecommended PSU: 1000W\r\nPower Connectors: 1 x 16-pin\r\nSlot: 3.5 Slot\r\nAURA SYNC: ARGB', 'phpE150_1692952245.png', NULL, '2023-08-25 00:30:45', '2023-08-25 06:20:35'),
(30, 'MSI PULSE GL66 11UGK-237PH', 45000, 'Laptop', 23, 'Bundled with:\r\nMSI Gaming Mouse M99\r\nStealth Trooper Backpack', 'Bundled with:\r\nMSI Gaming Mouse M99\r\nStealth Trooper Backpack\r\nCPU: 11th Gen. Intel® Core™ i7 Processor 24M Cache, 1.9 GHz up to 4.60 GHz\r\nOS: Windows 10 Home\r\nDISPLAY: 15.6\" QHD (2560x1440), 165Hz, IPS-Level\r\nCHIPSET: Intel® HM570\r\nGRAPHICS: NVIDIA® GeForce RTX™ 3070 Laptop GPU 8GB GDDR6\r\n*May vary by scenario\r\nMEMORY: 16GB DDR4-3200MHz 2 Slots Number of SO-DIMM Slot Max 64GB Max Capacity\r\nSTORAGE CAPABILITY: 2x M.2 SSD slot (NVMe PCIe Gen3)\r\nWEBCAM: HD type (30fps@720p)\r\nKEYBOARD: RGB Backlight Keyboard\r\nCOMMUNICATION: Gb LAN 802.11 ax Wi-Fi 6 + Bluetooth v5.2\r\nAUDIO JACK: 1x Mic-in/Headphone-out Combo Jack\r\nI/O PORTS:\r\n1x Type-C USB3.2 Gen1\r\n2x Type-A USB3.2 Gen1\r\n1x Type-A USB2.0\r\n1x RJ45\r\n1x (4K @ 60Hz) HDMI\r\nBATTERY: 3-Cell / 53.5 Battery (Whr)\r\nAC ADAPTER: 180W adapter\r\nDIMENSION (WXDXH): 359 x 259 x 23.95 mm\r\nWEIGHT (W/ BATTERY): 2.1 kg\r\nCOLOR: Titanium Gray\r\nWarranty: 2 Year Warranty Term', 'php519F_1692952733.png', NULL, '2023-08-25 00:38:53', '2023-08-25 06:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `dp_name` varchar(255) DEFAULT NULL,
  `full_address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `dp_name`, `full_address`, `country`, `postal_code`, `phone`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Kim Martel', 'Olives', 'kimmartel.olives@gmail.com', NULL, '$2y$10$wqReHW6dHaloINjbk0LEWOuXXrGEsXPrb1jYookp/YPwoX7/WfBRq', 'phpA4C_1692972113.jpg', 'Imus City, Cavite', 'Philippines', '4103', '09954364202', '1', NULL, '2023-08-24 09:01:00', '2023-08-25 06:03:46'),
(4, NULL, NULL, 'test@gmail.com', NULL, '$2y$10$CzQ7ZPM/ynTTepYx.8WP8epbkHRDmOava0CpQVeZNuiTwwE2IgEqC', NULL, NULL, NULL, NULL, NULL, '2', NULL, '2023-08-24 09:19:03', '2023-08-24 09:19:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

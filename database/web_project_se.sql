-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 16, 2024 at 07:16 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_project_se`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(68, 13, 3, 'Xiaomi Redmi Note 12 Pro Plus 5G 12GB RAM 256GB', 149900, 1, 'redmi_note12.png'),
(66, 1, 3, 'Xiaomi Redmi Note 12 Pro Plus 5G 12GB RAM 256GB', 149900, 1, 'redmi_note12.png'),
(67, 13, 2, 'Apple iPhone 14 128GB 4GB Ram E Sim', 289900, 2, 'iphone14_1.png'),
(60, 9, 7, 'OPPO A77s 8GB RAM 128GB', 89900, 1, 'OPPO_A77.png'),
(59, 9, 2, 'Apple iPhone 14 128GB 4GB Ram E Sim', 289900, 1, 'iphone14_1.png'),
(69, 14, 3, 'Xiaomi Redmi Note 12 Pro Plus 5G 12GB RAM 256GB', 149900, 1, 'redmi_note12.png'),
(70, 14, 7, 'OPPO A77s 8GB RAM 128GB', 89900, 1, 'OPPO_A77.png'),
(71, 15, 9, 'Vivo V25 Pro 5G 12 RAM 256GB', 179900, 1, 'Vivo_V25_Pro.png');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `message` varchar(5000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `phone`, `message`) VALUES
(1, 1, 'kushan', 'kushan@gmail.com', '099377332323', 'dsadsadsaccasc'),
(2, 1, '', '', '', ''),
(3, 1, 'dds', 'kus@as.com', '071653356', 'abkasannsanansaSAsaS'),
(4, 12, 'usser', 'test@se.com', '8372873', 'hchsihcisiuschsichchsichsichsihcsich'),
(5, 13, 'sadas', 'sdas@ggg', 'asdsa', 'sadas');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(1, 1, 'kush', '01121', 'user2@ka.com', 'cash_on', '2, 3, d, dd', '2', 399800, '16-Jun-2023', 'pending'),
(2, 1, 'dfd', '221', 'user2@ka.com', 'cash_on', 'fdf, df, df, df', '1', 289900, '16-Jun-2023', 'pending'),
(3, 1, '', '', '', '', ', , , ', '2', 172800, '16-Jun-2023', 'pending'),
(4, 1, '', '', '', '', ', , , ', '2', 394800, '16-Jun-2023', 'pending'),
(5, 1, '', '', '', '', ', , , ', '1', 104900, '16-Jun-2023', 'pending'),
(6, 1, '', '', '', '', ', , , ', '0', 104900, '16-Jun-2023', 'pending'),
(7, 1, '', '', '', '', ', , , ', '1', 149900, '16-Jun-2023', 'pending'),
(8, 1, '', '', '', '', ', , , ', '0', 149900, '16-Jun-2023', 'pending'),
(9, 1, '', '', '', '', ', , , ', '1', 89900, '16-Jun-2023', 'pending'),
(10, 1, '', '', '', '', ', , , ', '1', 289900, '16-Jun-2023', 'pending'),
(11, 1, '', '', '', '', ', , , ', '0', 289900, '16-Jun-2023', 'pending'),
(12, 1, '', '', '', '', ', , , ', '1', 199900, '16-Jun-2023', 'pending'),
(13, 1, '', '', '', '', ', , , ', '0', 199900, '16-Jun-2023', 'pending'),
(14, 1, 'xs', '045', 'xs', 'paypal', 'xs, xs, cx, cs', '1', 289900, '16-Jun-2023', 'pending'),
(15, 8, 'kushan', '022323', 'user2@ka.com', 'cash_on', 'wdd, sada, sdas, asda', '2', 407900, '04-Sep-2023', 'pending'),
(16, 8, 'csa', 'csac', 'user2@ka.com', 'cash_on', 'scs, sc, sc, sc', '1', 104900, '04-Sep-2023', 'pending'),
(17, 9, 'jasjas', '332323', 'user2@ka.com', 'cash_on', 'dsd, sds, sd, sdssa', '1', 89900, '04-Sep-2023', 'pending'),
(18, 11, 'kushan', '732838932', 'test@se.com', 'cash_on', 'cadcc, sacac, asc, scaa', '1', 149900, '04-Sep-2023', 'pending'),
(19, 1, 'kska', '323', 'akela@se.com', 'cash_on', 'dsdd, ssc, scss, xcc', '1', 179900, '05-Sep-2023', 'pending'),
(20, 11, 'scsc', 'sxjns', 'test@se.com', 'credit card', 'cd, xcc, xcx, sscs', '1', 289900, '05-Sep-2023', 'pending'),
(21, 12, 'kushan', '918212131', 'kush@gmail.com', 'cash_on', 'kojdojdwd, nsbbcsbc, cnscbjsn,  c s cs', '1', 289900, '05-Sep-2023', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `mini_name` varchar(100) NOT NULL,
  `old_price` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image1` varchar(1000) NOT NULL,
  `image2` varchar(1000) NOT NULL,
  `image_col` varchar(1000) NOT NULL,
  `size_text` varchar(1000) NOT NULL,
  `display_text` varchar(1000) NOT NULL,
  `chip_image` varchar(1000) NOT NULL,
  `chip_text` varchar(1000) NOT NULL,
  `camera_text` varchar(1000) NOT NULL,
  `usb_text` varchar(1000) NOT NULL,
  `ram_text` varchar(1000) NOT NULL,
  `btn_image` varchar(1000) NOT NULL,
  `sim_text` varchar(1000) NOT NULL,
  `sensor_text` varchar(1000) NOT NULL,
  `os_text` varchar(1000) NOT NULL,
  `battery_text` varchar(1000) NOT NULL,
  `box_text` varchar(1000) NOT NULL,
  `box_image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `mini_name`, `old_price`, `price`, `image`, `category`, `image1`, `image2`, `image_col`, `size_text`, `display_text`, `chip_image`, `chip_text`, `camera_text`, `usb_text`, `ram_text`, `btn_image`, `sim_text`, `sensor_text`, `os_text`, `battery_text`, `box_text`, `box_image`) VALUES
(1, 'Samsung Galaxy S22 8GB RAM 256GB', 'Samsung Galaxy S22', 199999, 181900, 'samsungs22.png', 'samsung', 'galaxys22_1.png', 'galaxys22_2.png', 'galaxys22_colours.png', '-146 x 70.6 x 7.6 mm<br>\r\n-Weight 167 g<br>', '-1080 x 2340 pixels, 19.5:9 ratio<br><br>', 'galaxys22_chip.png', '<br>-Exynos 2200 (4 nm) - Europe1<br>\r\n-Qualcomm SM8450 Snapdragon 8 Gen 1 (4 nm) - ROW<br><br>', '<br>-Main Camera-50 MP, f/1.8, 23mm (wide), 1/1.56, 1.0m <br>-Dual Pixel PDAF<br>-OIS\r\n10 MP, f/2.4, 70mm (telephoto)<br>- 1/3.94, 1.0m, PDAF, OIS <br>- 3x optical zoom\r\n12 MP, f/2.2, 13mm, 120 (ultrawide), 1/2.55 1.4m<br>-Super Steady video<br>-Video	8K@24fps<br>- Selfie Camera: Single 10 MP, f/2.2, 26mm (wide), 1/3.24, 1.22m, Dual Pixel PDAF<br><br>', '<br>-USB Type-C<br><br>', '<br>-256GB ROM <br>- 8GB RAM<br><br>', 'galaxys22_btn.jpg', '<br>-Nano-SIM and eSIM or Dual SIM<br><br>', '<br>-Fingerprint (under display, ultrasonic)<br>-accelerometer<br>-gyro<br>- proximity<br>-compass<br>-barometer<br>-Samsung DeX<br>-Samsung Wireless DeX (desktop experience support)\r\n<br>-Bixby natural language commands and dictation\r\n<br>-Samsung Pay (Visa, MasterCard certified)<br><br>', '<br>Android 12, upgradable to Android 13, One UI 5.1<br><br>', '<br>-Li-Ion 3700 mAh, non-removable<br><br>', '<br>-Galaxys22 Phone<br>-USB-C to Lightning Cable<br>-Documentation', 'galaxys22_box.png'),
(2, 'Apple iPhone 14 128GB 4GB Ram E Sim', 'IPhone 14', 300000, 289900, 'iphone14_1.png', 'apple', 'iphone14_2.png', 'iphone14_3.png', 'iphone14_colours.png', '-Weight: 7.16 ounces (203 grams)<br>', '-Retina XDR display <br>-6.7-inch (diagonal) all-screen OLEDmdisplay <br> -2778 -by -1284-pixel resolution at 458 ppi<br><br> -The iPhone 14 Plus display has rounded corners that follow a beautiful curved design, and these corners are within a standard rectangle. When measured as a standard rectangular shape, the screen is 6.68 inches diagonally (actual viewable area is less).<Br>-Both models:HDR display True Tone Wide color (P3) Haptic Touch 2,000,000:1 contrast ratio (typical) 800 nits max brightness (typical); 1200 nits peak brightness (HDR) Fingerprint-resistant oleophobic coating Support for display of multiple languages and characters simultaneously <br> <br> -Splash, Water, and Dust Resistant3 <br>-Rated IP68 (maximum depth of 6 meters up to 30 minutes) under IEC standard 60529 <br> <br>', 'iphone14_chip.png', '<br>-Bionic chip <br>-6-core CPU with 2 performance and 4 efficiency cores<br>-5-core GPU<br>-16-core Neural Engine<br><br>', '<br>-Dual-camera system<br>-12MP Main: 26 mm, f/1.5 aperture, sensor-shift optical image stabilization, seven-element lens, 100% Focus Pixels<br>-12MP Ultra Wide: 13 mm, f/2.4 aperture and 120 field of view, five-element lens<br>-2x optical zoom out; digital zoom up to 5x<br>-Sapphire crystal lens cover<br>-True Tone flash<br>-Photonic Engine<br>-Deep Fusion<br>-Smart HDR 4<br>-Portrait mode with advanced bokeh and Depth Control<br>-Portrait Lighting with six effects (Natural, Studio, Contour, Stage, Stage Mono, High-Key Mono)<br>-Night mode<br>-Panorama (up to 63MP)<br>-Photographic Styles<br>-Photographic Styles<br>-Wide color capture for photos and Live Photos<br>-Lens correction (Ultra Wide)<br>-Advanced red-eye correction<br>-Auto image stabilization<br>-Burst mode<br>-Photo geotagging<br>-Image formats captured: HEIF and JPEG<br><br>', '<br>-Lightning, USB 2.0<br><br>', '<br>-128GB ROM <br>-4GB RAM<br><br>', 'iphone14_buttons.png', '<br>-Nano-SIM and eSIM - International<br><br>', '<br>-Face ID<br>-Barometer<br>-High dynamic range gyro<br>-High-g accelerometer<br>-Proximity sensor<br>-Dual ambient light sensors<br><br>', '<br>-iOS 16<br>-iOS is the world\'s most personal and secure mobile operating system,packed with powerful features and designed to protect your privacy.<br><br>', '<br>-Li-Ion 3279 mAh, non-removable (12.68 Wh)<br><br>', '<br>-iPhone with iOS 16<br>-USB-C to Lightning Cable<br>-sDocumentation', 'iphone14_box.png'),
(3, 'Xiaomi Redmi Note 12 Pro Plus 5G 12GB RAM 256GB', 'Redmi Note 12 Pro', 160000, 149900, 'redmi_note12.png', 'xiaomi', 'redmi_note12_2.png', 'redmi_note12_3.png', 'redmi_note12_colours.png', '-163 x 76 x 8 mm<br>-Weight 187 g<br>', '-1080 x 2400 pixels, 20:9 ratio <br> <br>', 'redmi_note12_chip.png', '<br>-Mediatek MT6877V Dimensity 1080 (6 nm)<br><br>', '<br>-Main camera-50 MP<br>- f/1.9, 24mm (wide)<br>- 1/1.56, 1.0m, PDAF, OIS\r\n8 MP<br>- f/2.2, 120 (ultrawide)<br>-1/4, 1.12m\r\n2 MP, f/2.4, (macro)\r\n<br>-Dual-LED dual-tone flash, HDR, panorama\r\n<br>-4K@30fps <br>-Selfie Camera-16 MP, f/2.5, (wide), 1/3.06, 1.0m<br><br>', '<br>-USB Type-C 2.0, OTG<br><br>', '<br>-256GB ROM<br>-12GB RAM<br><br>', 'redmi_note12_btn.jpg', '<br>-Dual SIM (Nano-SIM, dual stand-by)<br><br>', '<br>-Fingerprint (side-mounted)<br>-accelerometer<br>-gyro<br>-proximity<br>-compass<br><br>', '<br>-Android 12, MIUI 13<br><br>', '<br>-Li-Po 5000 mAh, non-removable<br><br>', '<br>-Redmi Note 12 Phone<br>-USB-C to Lightning Cable<br>-Adapter<br>-Back Cover<br>-sDocumentation', 'redmi_note12_box.png'),
(4, 'Huawei Nova 8i 8GB RAM 128GB', 'Nova 8i', 120000, 104900, 'huawei_nova8i.png', 'huawei', 'huawei_nova8i_1.jpg', 'huawei_nova8i_2.png', 'huawei_nova8i_colours.png', '-161.9 x 74.7 x 8.6 mm <br>-Weight 190 g\r\n<br>', '-1080 x 2376 pixels (~391 ppi density) <br> <br>', 'nova8i_chip.jpeg', '-Qualcomm SM6115 Snapdragon 662 (11 nm)<br><br>\r\n', '-Main camera:64 MP  <br> - f/1.9, 26mm (wide),<br> -PDAF  <br> - 8MP, f/2.4, 120C, 17mm (ultrawide)<br> - 2 MP, f/2.4, (macro)<br> - 2 MP, f/2.4, (depth)  <br> - Features	LED flash, Panorama, HDR\r\n<br> - Video	1080p@30fps\r\nSelfie Camera:16 MP, f/2.0, (wide)\r\n<br> - Features	HDR<br> -Video	1080p@30fps<br> <br> \r\n', '<br>-USB Type-C 2.0<br><br>', '-128GB Rom<br>-6GB RAM<br><br>', 'huawei_nova8i_btn.jpg', 'Dual SIM (Nano-SIM, dual stand-by)\r\n<br><br>', 'Fingerprint (side-mounted)<br> -accelerometer<br> -gyro<br> -proximity<br>-compass<br><br>\r\n', '-Android 10, EMUI 11, no Google Play Services\r\n', '<br>-Li-Po 4300 mAh, non-removable\r\n<br><br>', '<br>-Nova 8i phone<br>-USB-C to Lightning Cable<br>-Adapter<br>-Handfree<br>-Documentation', 'nova8i_box.png'),
(5, 'Nokia G11 Plus 4GB RAM 64GB New', 'Nokia G11', 75000, 67900, 'nokia_11_plus.png', 'nokia', 'Nokia_G11_1.png', 'Nokia_G11_2.png', 'Nokia_G11_colurs.png', '-164.8 x 75.9 x 8.6 mm <br> -192 g\r\n <br> <br>', '-720 x 1600 pixels, 20:9 ratio <br><br>', 'Nokia_G11_chip.jpg', '-Unisoc T606 (12 nm)\r\n', '-Main camera:50 MP, f/1.8, (wide)<br>-1/2.67, PDAF\r\n2 MP, (depth)<br>-Selfie Camera:8 MP, f/2.0, (wide), 1/4.0\r\n', '-USB Type-C 2.0, OTG<br><br>', '-64GB ROM<br>-4GB RAM\r\n', 'Nokia_G11_btn.png', 'Single SIM (Nano-SIM) or Dual SIM (Nano-SIM, dual stand-by)\r\n', '-Fingerprint (rear-mounted) <br> -accelerometer<br> - proximity\r\n', '-Android 12, upgradable to Android 13\r\n', 'Li-Ion 5000 mAh, non-removable\r\n', '-Nokia G11 Phone<br>\r\n-USB-C to Lightning Cable<br>\r\n-Adapter<br>\r\n-Handfree<br>\r\n-Documentation<br><br>', 'Nokia_G11_box.jpg'),
(6, 'OnePlus 11R 5G 16GB RAM 256GB', 'OnePlus 11R', 225000, 199900, 'OnePlus_11r.png', 'oneplus', 'oneplus_11r_1.png', 'oneplus_11r_2.jpg', 'oneplus_11r_colours.png', '-163.4 x 74.3 x 8.7 mm <br>\r\n-Weight 204 g <br><br>', '-1240 x 2772 pixels, 20:9 ratio<br> <br>', 'oneplus_11r_chip.png', '-Qualcomm SM8475 Snapdragon 8+ Gen 1 (4 nm)', '-Main Camera-50 MP, f/1.8, 24mm (wide)<br>-1/1.56, 1.0m<br>-multi-directional PDAF, OIS\r\n8 MP, f/2.2, 120 (ultrawide)<br>-1/4.0, 1.12m\r\n2 MP, f/2.4, (macro)<br>-LED flash<br>-HDR<br>-panorama\r\n<br>-Video-4K@30/60fps<br>-Selfie Camera-16 MP, f/2.4, 24mm (wide), 1/3.09, 1.0', '-USB Type-C 2.0<br><br>', '-256GB ROM<br>- 16GB RAM', 'oneplus_11r_btn.png', '-Dual SIM (Nano-SIM, dual stand-by)', '-Fingerprint (under display, optical)<br>-accelerometer<br>-gyro<br>-proximity<br>-compass<br>-color spectrum', '-Android 13, OxygenOS 13', '-Li-Po 5000 mAh, non-removable', '-oneplus 11r Phone<br>\r\n-USB-C to Lightning Cable<br>\r\n-Adapter<br>\r\n-Documentation', 'oneplus_11r_box.png'),
(7, 'OPPO A77s 8GB RAM 128GB', 'Oppp A77s', 99000, 89900, 'OPPO_A77.png', 'oppo', 'oppo_a77s_1.jpg', 'oppo_a77s_2.jpg', 'oppo_a77s_colours.png', '-163.8 x 75 x 8 mm<br>-\r\nWeight 187 g', '-720 x 1612 pixels, 20:9 ratio<br> <br>', 'oppo_a77s_chip.jpg', '-Qualcomm SM6225 Snapdragon 680 4G (6 nm)<br> <br>', '-Main Camera-50 MP<br>-f/1.8, 27mm (wide)<br>-PDAF\r\n2 MP<br>-f/2.4, (depth)<br>-LED flash<br>-HDR<br>-panorama\r\n<br>-Video-1080p@30fps<br>-Selfie Camera-8 MP, f/2.0, 26mm (wide)', 'USB Type-C 2.0, OTG', '-128GB ROM<br>-8GB RAM', 'oppo_a77s_btn.png', '-Dual SIM (Nano-SIM, dual stand-by)<br> <br>', '-Fingerprint (side-mounted)<br>-accelerometer<br>-proximity<br>-compass', '-Android 12, upgradable to Android 13, ColorOS 13<br> <br>', '-Li-Po 5000 mAh, non-removable<br> <br>', '-Oppo A77s Phone<br>-USB-C to Lightning Cable<br>-Adapter<br>-Documentation', 'oppo_a77s_box.jpeg'),
(8, 'Google Pixel 7 Pro 5G 8GB RAM 128GB', 'Google Pixel 7', 299000, 289900, 'Google_Pixel_7_Pro.png', 'google', 'pixcel_7_1.png', 'pixcel_7_2.jpg', 'pixcel_7_colours.png', '-155.6 x 73.2 x 8.7 mm<br>\r\n-Weight 197 g<br>', '-1080 x 2400 pixels, 20:9 ratio (~416 ppi density) <br> <br>', 'pixcel_7_chip.jpg', '-Google Tensor G2 (5 nm)', '-Main Camera-50 MP, f/1.9, 25mm (wide)<br>-1/1.31, 1.2m<br>-ulti-directional PDAF<br>- Laser AF, OIS<br>-12 MP, f/2.2, 114 (ultrawide)<br>-1/2.9, 1.25m<br>-Dual-LED flash<br>-Pixel Shift<br>-Auto-HDR<br>-panorama<br>-Video-4K@30/60fps<br>-Selfie Camera-10.8 MP, f/2.2<br>-21mm (ultrawide), 1/3.1\", 1.22m', '-USB Type-C 3.2<br><br>', '-128GB ROM<br>-8GB RAM ', 'pixcel_7_btn.png', '-Nano-SIM and eSIM<br><br>', '-Fingerprint (under display, optical)<br>-accelerometer<br>-gyro<br>-proximity<br>-compass<br>-barometer', '-Android 13', '-Li-Ion 4355 mAh, non-removable', '-Pixcel 7 Phone<br>\r\n-USB-C to Lightning Cable<br>\r\n-Adapter<br>\r\n-Documentation<br>', 'pixcel_7_box.jpg'),
(9, 'Vivo V25 Pro 5G 12 RAM 256GB', 'Vivo V25 Pro', 199000, 179900, 'Vivo_V25_Pro.png', 'vivo', 'vivo_v25_1.png', 'vivo_v25_2.png', 'vivo_v25_colours.png', '-158.9 x 73.5 x 8.6 mm<br>-Weight 190 g', '-1080 x 2376 pixels (~398 ppi density)<br> <br>', 'vivo_v25_chip.jpg', '-Mediatek MT6893Z Dimensity 1300 (6 nm)', '-Main Camera-64 MP, f/1.9, 25mm (wide)<br>-1/1.72, 0.8m<br>-PDAF, OIS\r\n8 MP<br>-f/2.2, 16mm, 120 (ultrawide), 1/4, 1.12m<br>-2 MP, f/2.4, (macro)<br>-LED flash<br>-HDR<br>-panorama<br>-Video-4K@30fps<br>-Selfie Camera-32 MP, f/2.5, (wide), 1/2.8, 0.8m, AF', '-USB Type-C 2.0, OTG', '-256GB ROM<br>-12GB RAM ', 'vivo_v25_btn.jpg', '-Dual SIM (Nano-SIM, dual stand-by)', '-Fingerprint (under display, optical)<br>-accelerometer<br>-gyro<br>-proximity<br>-compass', '-Android 12, Funtouch 12', '-Li-Po 4830 mAh, non-removable', '-Vivo V25 Phone<br>\r\n-USB-C to Lightning Cable<br>\r\n-Adapter<br>\r\n-Handfree<br>\r\n-Documentation', 'vivo_v25_box.jpg'),
(10, 'samsung galaxy z fold4 (12gb ram|256gb)', 'samsung galaxy z fold4', 365000, 340000, 'Samsung_Galaxy_Z.png ', 'samsung', 'Samsung_Galaxy_Z_1.png', 'Samsung_Galaxy_Z_2.png', 'Samsung_Galaxy_Z_colours.jpeg', '155.1 x 130.1 x 6.3 mm', '1812 x 2176 pixels', 'Samsung_Galaxy_Z_chip.png', 'Qualcomm SM8475 Snapdragon 8+ Gen 1 (4 nm)', '50 MP, f/1.8, 23mm (wide)', 'USB Type-C 3.2, OTG', '12GB', 'Samsung_Galaxy_Z_btns.jpg', 'Nano-SIM and eSIM or Dual SIM', 'Fingerprint (side-mounted), accelerometer, gyro, proximity, compass, barometer', 'Android 12L', 'Li-Po 4400 mAh', 'Phone and Charger', 'Samsung_Galaxy_Z_box.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `user_type`) VALUES
(1, 'kushan ', 'Andarawewa', 'kma@gmail.com', '123', 'user'),
(2, 'nimal', 'silva', 'nimal@gmail.com', '123', 'user'),
(3, 'admin', 'admin', 'admin@se.com', '123', 'admin'),
(4, 'kushan', 'andarawewa', 'kush@se.com', '123', 'user'),
(14, 'kushan', 'andarawewa', 'kushan@gmail.com', '123', 'user'),
(15, 'kushan', 'andarawewa', 'test@gmail.com', '123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `pid`, `name`, `price`, `image`) VALUES
(59, 11, 7, 'OPPO A77s 8GB RAM 128GB', 89900, 'OPPO_A77.png'),
(54, 8, 1, 'Samsung Galaxy S22 8GB RAM 256GB', 181900, 'samsungs22.png'),
(52, 8, 3, 'Xiaomi Redmi Note 12 Pro Plus 5G 12GB RAM 256GB', 149900, 'redmi_note12.png'),
(53, 8, 9, 'Vivo V25 Pro 5G 12 RAM 256GB', 179900, 'Vivo_V25_Pro.png'),
(63, 14, 10, 'samsung galaxy z fold4 (12gb ram|256gb)', 340000, 'Samsung_Galaxy_Z.png ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

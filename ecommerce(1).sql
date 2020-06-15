-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 06:30 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cupon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscriber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `others` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `picture`, `category`, `brand`, `cupon`, `product`, `blog`, `order`, `stock`, `report`, `user`, `contact`, `subscriber`, `others`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dipu Dey', 'admin@gmail.com', NULL, '$2y$10$pMHPvKr307teGqTaF9CJuenlOV/EJkVf6c8B7OruFx9HJ2aoTTJVu', '0184989979', '1.png', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', NULL, NULL, '2020-06-09 08:47:15'),
(2, 'Dipu Dey', 'dipudey764@gmail.com', NULL, '$2y$10$fcfTTY3lHtJV3AHH/8Z8cOQ70EpXTsND3jD7HvLhD3Saausxe/VIi', '0184989979', NULL, '1', NULL, NULL, '1', NULL, '1', '1', NULL, NULL, '1', NULL, NULL, NULL, NULL, '2020-06-07 11:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `category_name_en`, `category_name_bn`, `created_at`, `updated_at`) VALUES
(1, 'Offers', 'অফার', '2020-05-21 00:40:38', '2020-05-21 01:00:33'),
(2, 'Service', 'সার্ভিস', '2020-05-21 00:41:08', NULL),
(3, 'Event', 'ইভেন্ট', '2020-05-21 00:41:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_category_id` int(11) NOT NULL,
  `post_title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_details_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_details_bn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `blog_category_id`, `post_title_en`, `post_title_bn`, `post_picture`, `post_details_en`, `post_details_bn`, `created_at`, `updated_at`) VALUES
(1, 1, 'This is the first post of ecommerce', 'এটি ইকমার্সের দ্বিতীয় পোস্ট.', '1.jpg', '<p>It is a long <b>established </b>fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packag<br></p>', '<p>Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং </p>', '2020-05-21 08:44:49', '2020-06-02 11:55:48'),
(5, 1, 'This is the first post of ecommerce...', 'এটি ইকমার্সের দ্বিতীয় পোস্ট.', '5.png', '<p>It is a long <b>established </b>fact that a reader will be distracted\r\n by the readable content of a page when looking at its layout. The point\r\n of using Lorem Ipsum is that it has a more-or-less normal distribution \r\nof letters, as opposed to using \'Content here, content here\', making it \r\nlook like readable English. Many desktop publishing packag<br></p>', '<p>Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং \r\nটাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ \r\nএবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল \r\nমুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum \r\nকেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem \r\nIpsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং \r\nLorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং \r\nটাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ \r\nএবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং </p>', '2020-05-21 11:18:32', '2020-06-02 12:02:08'),
(6, 3, 'This is the first post of ecommerce', 'এটি ইকমার্সের দ্বিতীয় পোস্ট.', '6.jpg', '<p>It is a long <b>established </b>fact that a reader will be distracted\r\n by the readable content of a page when looking at its layout. The point\r\n of using Lorem Ipsum is that it has a more-or-less normal distribution \r\nof letters, as opposed to using \'Content here, content here\', making it \r\nlook like readable English. Many desktop publishing packag<br></p><p>It is a long <b>established </b>fact that a reader will be distracted\r\n by the readable content of a page when looking at its layout. The point\r\n of using Lorem Ipsum is that it has a more-or-less normal distribution \r\nof letters, as opposed to using \'Content here, content here\', making it \r\nlook like readable English. Many desktop publishing packag<br></p><p>It is a long <b>established </b>fact that a reader will be distracted\r\n by the readable content of a page when looking at its layout. The point\r\n of using Lorem Ipsum is that it has a more-or-less normal distribution \r\nof letters, as opposed to using \'Content here, content here\', making it \r\nlook like readable English. Many desktop publishing packag<br></p>', '<p><br></p><p>Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং \r\nটাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ \r\nএবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল \r\nমুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum \r\nকেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem \r\nIpsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং \r\nLorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং \r\nটাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ \r\nএবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং </p><p>Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং \r\nটাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ \r\nএবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল \r\nমুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum \r\nকেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem \r\nIpsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং \r\nLorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং \r\nটাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ \r\nএবং টাইপসেটিং Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং </p><p><br></p>', '2020-06-02 11:58:26', '2020-06-02 12:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_picture`, `created_at`, `updated_at`) VALUES
(1, 'SAMSUNG', '1.jpg', '2020-05-16 08:47:38', '2020-05-16 09:02:58'),
(2, 'Acer', '2.png', '2020-05-18 11:00:10', '2020-05-18 11:00:11'),
(3, 'VISION', '3.jpg', '2020-05-18 11:48:34', '2020-05-18 11:48:35'),
(4, 'Xiaomi', '4.png', '2020-05-26 00:52:09', '2020-05-26 00:52:09'),
(5, 'Oppo', '5.png', '2020-05-26 00:52:41', '2020-05-26 00:52:41'),
(6, 'Walton', '6.png', '2020-05-26 00:53:07', '2020-05-26 00:53:07'),
(7, 'Apple', '7.png', '2020-05-26 00:53:39', '2020-05-26 00:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_picture`, `created_at`, `updated_at`) VALUES
(1, 'Electronics And Appliance', '1.png', '2020-05-18 11:42:02', '2020-05-18 11:42:02'),
(2, 'Home & Lifestyle', '2.jpg', '2020-05-19 11:39:58', '2020-05-22 08:01:50'),
(3, 'Laptop', '3.png', '2020-05-23 10:33:39', '2020-05-23 10:33:39'),
(4, 'Mobile Gadgets', '4.png', '2020-05-26 00:48:41', '2020-05-26 00:48:43');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cupons`
--

CREATE TABLE `cupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cupon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `validity_till` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cupons`
--

INSERT INTO `cupons` (`id`, `cupon`, `discount`, `validity_till`, `created_at`, `updated_at`) VALUES
(1, 'BD10', 10, '2020-05-30', '2020-05-27 07:45:11', NULL),
(2, 'CORONA40', 40, '2020-06-06', '2020-05-27 07:45:50', '2020-06-02 01:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(18, '2014_10_12_100000_create_password_resets_table', 1),
(19, '2019_08_19_000000_create_failed_jobs_table', 1),
(21, '2020_05_15_150219_create_categories_table', 2),
(23, '2020_05_16_085908_create_brands_table', 3),
(24, '2020_05_16_151155_create_subcategories_table', 4),
(25, '2020_05_16_171014_create_cupons_table', 5),
(27, '2020_05_17_150144_create_products_table', 6),
(29, '2020_05_18_154801_create_multiple_product_pictures_table', 7),
(30, '2020_05_21_060556_create_blog_categories_table', 8),
(33, '2020_05_21_060935_create_blog_posts_table', 9),
(34, '2018_12_23_120000_create_shoppingcart_table', 10),
(36, '2014_10_12_000000_create_users_table', 11),
(37, '2020_05_24_172521_create_wishlists_table', 11),
(38, '2020_05_28_065929_create_settings_table', 12),
(52, '2020_05_30_092048_create_orders_table', 13),
(53, '2020_05_30_093059_create_order_details_table', 13),
(54, '2020_05_30_093508_create_shippings_table', 13),
(55, '2020_06_04_082511_create_reviews_table', 14),
(62, '2020_06_05_091946_create_contacts_table', 15),
(63, '2020_05_16_054430_create_admins_table', 16),
(64, '2020_06_09_073317_create_seos_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `multiple_product_pictures`
--

CREATE TABLE `multiple_product_pictures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `multipale_product_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multiple_product_pictures`
--

INSERT INTO `multiple_product_pictures` (`id`, `product_id`, `multipale_product_picture`, `created_at`, `updated_at`) VALUES
(1, 1, '1-1.jpg', '2020-05-20 07:25:29', NULL),
(2, 1, '1-2.jpg', '2020-05-20 07:25:29', NULL),
(3, 2, '2-1.jpg', '2020-05-22 08:05:50', NULL),
(4, 2, '2-2.jpg', '2020-05-22 08:05:50', NULL),
(5, 3, '3-1.jpg', '2020-05-22 08:09:52', NULL),
(6, 3, '3-2.jpg', '2020-05-22 08:09:52', NULL),
(7, 4, '4-1.jpg', '2020-05-26 00:59:15', NULL),
(8, 4, '4-2.jpg', '2020-05-26 00:59:15', NULL),
(9, 5, '5-1.png', '2020-05-26 01:03:50', NULL),
(10, 5, '5-2.png', '2020-05-26 01:03:50', NULL),
(11, 6, '6-1.jpg', '2020-05-26 01:07:54', NULL),
(12, 6, '6-2.jpg', '2020-05-26 01:07:54', NULL),
(13, 7, '7-1.jpg', '2020-06-06 01:59:12', NULL),
(14, 7, '7-2.jpg', '2020-06-06 01:59:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paying_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blnc_transection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_type`, `payment_id`, `paying_amount`, `blnc_transection`, `product_order_id`, `subtotal`, `shipping`, `vat`, `total`, `status`, `date`, `created_at`, `updated_at`) VALUES
(1, 2, 'stripe', 'card_1GoY0tHJ1XJjTDAbeN1Wqyu4', '2281.89', 'txn_1GoY0vHJ1XJjTDAbtRqvKPbN', '5ed290bbc834a', '2276.892', '5', '0', '2281.89', 3, '2020-05-01', '2020-05-30 10:58:37', '2020-06-02 10:39:40'),
(2, 2, 'stripe', 'card_1GoY7bHJ1XJjTDAbd7yohRsg', '2479.88', 'txn_1GoY7dHJ1XJjTDAbhlq2VwIe', '5ed2925c42a00', '2,474.88', '5', '0', '2479.88', 2, '2020-05-03', '2020-06-03 14:58:37', '2020-06-03 10:20:25'),
(3, 1, 'stripe', 'card_1GpUVBHJ1XJjTDAbWDXJVj4s', '505', 'txn_1GpUVWHJ1XJjTDAbiwIYZnOS', '5ed5ff0fcf80f', '500.00', '5', '0', '505.00', 0, '2020-05-03', '2020-06-03 01:26:19', NULL),
(4, 1, 'stripe', 'card_1GpUbpHJ1XJjTDAb2b4UakGX', '725', 'txn_1GpUbzHJ1XJjTDAbYxoDxTQn', '5ed600a06b526', '720', '5', '0', '725.00', 3, '2020-06-08', '2020-06-02 01:32:59', '2020-06-02 04:34:04'),
(5, 3, 'stripe', 'card_1GpyFnHJ1XJjTDAbkNKoxITD', '55', 'txn_1GpyFrHJ1XJjTDAbHDRar5n4', '5ed7bdb133647', '50.00', '5', '', '55.00', 4, '2020-06-08', '2020-06-03 09:11:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `singleprice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalprice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `color`, `size`, `quantity`, `singleprice`, `totalprice`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'iPhone XS Smartphone', 'white', NULL, 2, '1200', '2400', '2020-05-30 10:58:37', NULL),
(2, 1, 3, 'cotton king size bed sheet', 'red', 'l', 1, '74.88', '74.88', '2020-05-30 10:58:37', NULL),
(3, 1, 2, 'Cotton Bed Sheet', 'white', NULL, 1, '55', '55', '2020-05-30 10:58:37', NULL),
(4, 2, 3, 'cotton king size bed sheet', 'red', 'l', 1, '74.88', '74.88', '2020-05-30 11:05:34', NULL),
(5, 2, 4, 'iPhone XS Smartphone', 'white', NULL, 2, '1200', '2400', '2020-05-30 11:05:34', NULL),
(6, 3, 5, 'Oppo R17 Pro', 'gray', NULL, 1, '500', '500', '2020-06-02 01:26:19', NULL),
(7, 4, 4, 'iPhone XS Smartphone', 'white', NULL, 1, '1200', '1200', '2020-06-02 01:32:59', NULL),
(8, 5, 1, 'VISION E. Iron', 'red', NULL, 1, '50', '50', '2020-06-03 09:11:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `porduct_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thambnail_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_slider` int(11) DEFAULT NULL,
  `hot_deal` int(11) DEFAULT NULL,
  `best_rated` int(11) DEFAULT NULL,
  `mid_slider` int(11) DEFAULT NULL,
  `hot_new` int(11) DEFAULT NULL,
  `trend` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category_id`, `subcategory_id`, `brand_id`, `product_code`, `product_quantity`, `selling_price`, `discount_price`, `product_color`, `porduct_size`, `thambnail_picture`, `product_details`, `video_link`, `main_slider`, `hot_deal`, `best_rated`, `mid_slider`, `hot_new`, `trend`, `status`, `created_at`, `updated_at`) VALUES
(1, 'VISION E. Iron', 1, 1, 3, '0x44715', 12, 50, NULL, 'red,white,black,green', NULL, '1.jpg', '<p>Product Thambnail Picture <strong>Product Thambnail Pict</strong>ure Product Thambnail Picture Product Thambnail Picture Product Thambnail Picture Product Thambnail Picture Product Thambnail Picture Product Thambnail Picture Product Thambnail Picture Product Thambnail Picture Product Thambnail Picture Product Thambnail <em>Picture Product Thambnail Picture Product Thambnail Picture Product Thambnail Picture Product Thambnail Picture Product Thambnail Picture Product Thambnail Picture </em></p>', 'http://127.0.0.1:8000/', 1, 1, NULL, NULL, 1, 1, 1, '2020-05-20 07:25:27', '2020-05-21 11:35:47'),
(2, 'Cotton Bed Sheet', 2, 3, NULL, 'dkie75d', 10, 55, NULL, 'white,blue', NULL, '2.jpg', '<h2>Product details of King Size 100% Cotton Bed Sheet With 2 Pillow Cover</h2>\r\n\r\n<ul>\r\n	<li>Product Type: Bed Sheet with Pillow Covers</li>\r\n	<li>Color: Multicolor</li>\r\n	<li>Main Material: Cotton</li>\r\n	<li>Size: 7.5 X 8.5 Feet</li>\r\n	<li>Double Size Bed Sheet</li>\r\n	<li>Bed Sheet with Matching 2 Pillow Covers...</li>\r\n</ul>\r\n\r\n<h2>Specifications of King Size 100% Cotton Bed Sheet With 2 Pillow Cove</h2>', 'http://127.0.0.1:8000/', NULL, NULL, 1, NULL, NULL, 1, 1, '2020-05-22 08:05:49', '2020-06-08 07:41:22'),
(3, 'cotton king size bed sheet', 2, 3, NULL, '0x44718', 3, 78, 4, 'red,blue,white', 'l,xl', '3.jpg', '<h2>Product details of Cotton Double Size Bed Sheet Set - MultiColor</h2>\r\n\r\n<ul>\r\n	<li>Product Type: Bedsheet Set</li>\r\n	<li>Color:Multicolor</li>\r\n	<li>Main Material: Cotton</li>\r\n	<li>Product Measures: 7.5 X 8 Fit</li>\r\n	<li>With 2 pillow covers</li>\r\n</ul>\r\n\r\n<h2>Specifications of Cotton Double Size Bed Sheet Set - MultiColor</h2>\r\n\r\n<ul>\r\n	<li>Brand\r\n	<p>No Brand</p>\r\n	</li>\r\n	<li>SKU\r\n	<p>128558057_BD-1048420121</p>\r\n	</li>\r\n	<li>Fabric\r\n	<p>Cotton</p>\r\n	</li>\r\n</ul>', NULL, NULL, 1, 1, 1, 1, NULL, 1, '2020-05-22 08:09:52', '2020-06-02 10:39:40'),
(4, 'iPhone XS Smartphone', 4, 7, 7, '0X347F8', 18, 1200, NULL, 'white,black', NULL, '4.jpg', '<p>5.8-inch Super Retina display (OLED) with HDR1 IP68 dust and water resistant (maximum depth of 2 metres up to 30 minutes)2 12MP dual cameras with dual OIS and 7MP TrueDepth front camera &mdash; Portrait mode, Portrait Lighting, Depth Control and Smart HDR Face ID for secure authentication3 A12 Bionic with next-generation Neural Engine Wireless charging&mdash;works with Qi chargers iOS 12 with Memoji, Screen Time, Siri Shortcuts, and Group FaceTime</p>', 'http://127.0.0.1:8000/', 1, 1, 1, 1, 1, 1, 1, '2020-05-26 00:59:14', '2020-06-02 10:40:09'),
(5, 'Oppo R17 Pro', 4, 7, 5, '0X2D675', 22, 500, NULL, 'gray,red,blue,white', NULL, '5.png', '<h1>Specifications</h1>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Processor/CPU:</p>\r\n\r\n	<p>SDM710</p>\r\n	</li>\r\n	<li>\r\n	<p>Battery:</p>\r\n\r\n	<p>2*1850 mAh / 2*14.24Wh (Typ)</p>\r\n	</li>\r\n	<li>\r\n	<p>Rear Camera:</p>\r\n\r\n	<p>Rear Sensor: 12MP &amp; 20MP</p>\r\n	</li>\r\n	<li>\r\n	<p>Front Camera:</p>\r\n\r\n	<p>25MP</p>\r\n	</li>\r\n	<li>\r\n	<p>Display Size:</p>\r\n\r\n	<p>16.2cm(6.4&#39;&#39;)</p>\r\n	</li>\r\n	<li>\r\n	<p>RAM:</p>\r\n\r\n	<p>8GB</p>\r\n	</li>\r\n	<li>\r\n	<p>ROM:</p>\r\n\r\n	<p>128GB</p>\r\n	</li>\r\n	<li>\r\n	<p>Operating System:</p>\r\n\r\n	<p>ColorOS 5.2, based on Android 8.1</p>\r\n	</li>\r\n	<li>\r\n	<p>Display Resolution:</p>\r\n\r\n	<p>2340 by 1080 pixels</p>\r\n	</li>\r\n</ul>', 'http://127.0.0.1:8000/', NULL, 1, 1, 1, NULL, 1, 1, '2020-05-26 01:03:49', '2020-06-02 09:12:46'),
(6, 'iPad Air 2019', 4, 8, 7, '0X349DD', 2, 800, 20, 'red,white,black', NULL, '6.jpg', '<h1>Specifications</h1>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Display:</p>\r\n\r\n	<p>Screen size (inches)10.50TouchscreenYesResolution1668x2224 pixelsPixels per inch (PPI)264</p>\r\n	</li>\r\n	<li>\r\n	<p>Hardware:</p>\r\n\r\n	<p>Processor makeA12 BionicInternal storage64GB</p>\r\n	</li>\r\n	<li>\r\n	<p>Camera:</p>\r\n\r\n	<p>Rear camera8-megapixelRear FlashNoFront camera7-megapixel</p>\r\n	</li>\r\n</ul>', 'http://127.0.0.1:8000/', NULL, 1, 1, 1, NULL, 1, 1, '2020-05-26 01:07:53', '2020-05-26 01:07:54'),
(7, 'Samsung - Galaxy Book', 3, NULL, 1, 'NP730QCJ', 22, 1000, NULL, 'white,red', NULL, '7.jpg', '<h3>Samsung Galaxy Book Flex a Convertible 2-in-1 Laptop: Stay productive at work with this Samsung Galaxy Book Flex laptop. The Intel UHD integrated graphics render vivid visuals on the 13.3-inch Full HD touch screen, while the 512GB SSD ensures speedy file storage and access. This Samsung Galaxy Book Flex laptop has an Intel Core i7 processor and 12GB of RAM for running multiple programs at once.</h3>', NULL, NULL, 1, 1, 1, NULL, 1, 1, '2020-06-06 01:59:08', '2020-06-06 01:59:11');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `start` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `start`, `message`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 5, 'Onk valo akta bed shit,valo colth ,very nice', '2020-06-04 03:36:10', NULL),
(2, 1, 4, 3, 'not bad', '2020-06-04 07:38:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bing_analytics` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `meta_title`, `meta_author`, `meta_tag`, `meta_description`, `google_analytics`, `bing_analytics`, `created_at`, `updated_at`) VALUES
(1, 'Dipu E-Shop', 'Dipu Dey', 'Ecommerce,Online shop', 'lorem ipsum etc etce ect ;learn hunter is one of the best youtibe channle .....lorem ipsum etc etce ect ;learn hunter is one of the best youtibe channle .....', '112d12812891', '21732812891', NULL, '2020-06-09 02:07:26');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vat` int(11) DEFAULT NULL,
  `shipping_charge` int(11) DEFAULT NULL,
  `shopname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `vat`, `shipping_charge`, `shopname`, `email`, `phone`, `address`, `logo`, `created_at`, `updated_at`) VALUES
(1, NULL, 10, 'Dipu E-Store', 'dipu@gmail.com', '0184989979', 'Dahaka ,1203', NULL, NULL, '2020-06-09 02:25:01');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `ship_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_postcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `order_id`, `ship_name`, `ship_email`, `ship_country`, `ship_address`, `ship_postcode`, `ship_city`, `ship_notes`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sony', 'sony@gmail.com', 'Bangladesh', 'Kanchpur,Narayangonj', '321', 'Narayangonj', 'ok', '2020-05-30 10:58:37', NULL),
(2, 2, 'Sony', 'sony@gmail.com', 'Bangladesh', 'Kishorgong', '321', 'Kishorgonj', 'ok', '2020-05-30 11:05:34', NULL),
(3, 3, 'Nadmin Hossen', 'dipudey808@gmail.com', 'Bangladesh', 'Dhaka 1201', '2344', 'Dhaka', 'valo kore parcel kore diyen', '2020-06-02 01:26:19', NULL),
(4, 4, 'Kamal Hossen', 'dipudey808@gmail.com', 'Bangladesh', 'Kanchpur,Narayangonj', '321', 'Kishorgonj', 'ff', '2020-06-02 01:32:59', NULL),
(5, 5, 'Dipu Chandra Dey', 'dipudey764@gmail.com', 'Bangladesh', 'Kanchpur,Narayangonj', '233', 'Narayangonj', NULL, '2020-06-03 09:11:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'iron', '2020-05-18 11:44:11', NULL),
(2, 1, 'Microphone', '2020-05-19 11:49:01', '2020-05-26 00:45:06'),
(3, 2, 'Bedding & Bath', '2020-05-22 08:02:21', NULL),
(4, 1, 'Televisions Home Cinema', '2020-05-26 00:45:56', '2020-05-26 00:46:49'),
(5, 4, 'Card Phone', '2020-05-26 00:49:19', NULL),
(6, 4, 'Lan Phone', '2020-05-26 00:49:44', NULL),
(7, 4, 'Smart Phone', '2020-05-26 00:50:07', NULL),
(8, 4, 'Tablets', '2020-05-26 00:50:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `provider`, `provider_id`, `email_verified_at`, `password`, `picture`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dipu Chandra Dey', 'dipudey808@gmail.com', 'google', '100069602951571884946', NULL, NULL, NULL, NULL, '2020-05-27 03:46:41', '2020-05-27 03:46:41'),
(2, 'Sony', 'sony@gmail.com', NULL, NULL, NULL, '$2y$10$2YZxQv6Gy4r7hefUVvonQ.HVJJTSOr/9K2SF5FzB29AVa3hLRbY7W', '2.jpg', NULL, '2020-05-27 03:57:24', '2020-06-09 10:25:40'),
(3, 'Dipu Chandra Dey', 'dipudey764@gmail.com', 'google', '108215635424786123373', NULL, NULL, NULL, NULL, '2020-06-03 09:10:46', '2020-06-03 09:10:46'),
(4, 'Hardik Savani', 'admin@gmail.com', NULL, NULL, NULL, '$2y$10$qRlFJAat6MpCtLLy9dyq3Ozu8m7hA0uM7w0XZY088euGkB/cn8EYe', NULL, NULL, '2020-06-06 03:26:16', '2020-06-06 03:26:16');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 2, 5, '2020-05-29 02:11:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cupons`
--
ALTER TABLE `cupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multiple_product_pictures`
--
ALTER TABLE `multiple_product_pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cupons`
--
ALTER TABLE `cupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `multiple_product_pictures`
--
ALTER TABLE `multiple_product_pictures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

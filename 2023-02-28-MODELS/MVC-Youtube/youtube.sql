-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2023 at 07:50 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youtube`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`) VALUES
(1, 'Music', '2023-03-01 16:01:15'),
(2, 'Podcast', '2023-03-01 16:01:45'),
(3, 'Sport', '2023-03-01 16:01:58'),
(4, 'Trailers', '2023-03-16 20:05:35');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `video_id` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_name`, `video_id`, `comment`, `created_at`) VALUES
(7, '', 2, 'labai faina daina', '2023-03-15 18:30:39'),
(8, '', 2, 'dar vienas komentaras', '2023-03-15 18:34:23'),
(9, '', 2, 'labai faina daina', '2023-03-15 18:40:24'),
(11, 'gretuskinas', 3, 'megstamiausia eurovizijos daina', '2023-03-15 18:40:36'),
(22, 'varius', 6, 'geras podcastas', '2023-03-15 18:52:39'),
(30, 'varius', 2, 'woooow', '2023-03-15 18:59:36'),
(33, 'varius', 7, 'labai idomios rungtynes buvo', '2023-03-15 19:01:10'),
(52, 'varius', 3, 'italiukai', '2023-03-16 09:02:23'),
(54, 'varius', 3, 'komentaras', '2023-03-16 09:03:56'),
(65, 'varius', 8, 'labai idomios rungtynes buvo!', '2023-03-16 15:31:36'),
(70, 'varius', 7, 'geras grajus', '2023-03-16 18:54:02'),
(71, 'varius', 5, 'fainos panos', '2023-03-16 18:56:04'),
(72, 'varius', 2, 'gmhgnhgnf', '2023-03-16 20:06:41'),
(73, 'varius', 2, 'gmhgnhgnf', '2023-03-16 20:07:13'),
(74, 'varius', 2, 'gmhgnhgnf', '2023-03-16 20:10:05'),
(75, 'varius', 2, 'twadawd', '2023-03-16 20:12:37'),
(76, 'varius', 2, 'testinis', '2023-03-16 20:12:55'),
(77, 'varius', 2, 'testinis turetu veikti', '2023-03-16 20:14:02'),
(78, 'gretutu', 10, 'Belekaip juokingi bernai', '2023-03-16 20:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `password`, `created_at`) VALUES
(2, 'gretutu', 'greta@gmail.com', '1234', '2023-03-08 17:45:17'),
(6, 'labutis', 'labas@gmail.com', '1234', '2023-03-11 12:31:56'),
(7, 'testas', 'testas@gmail.com', 'testas', '2023-03-11 12:32:23'),
(8, 'varius', 'varlius@gmail.com', '32331e133e7a399915a0d4e0494aaa26', '2023-03-11 13:06:00'),
(10, 'naujokas', 'naujas@gmail.com', '8b5038bb02a5e0d3db1c729d552b98fe', '2023-03-11 14:07:53'),
(11, 'gretuskinas', 'gretutu@gmail.com', 'ab0eb155658574968a102239cbb2387f', '2023-03-13 17:10:33');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `video_url` varchar(255) COLLATE utf8_bin NOT NULL,
  `thumbnail_url` varchar(255) COLLATE utf8_bin NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `name`, `video_url`, `thumbnail_url`, `category_id`, `created_at`) VALUES
(1, 'Dangerous Woman', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/-0mv7wG5Q74\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></ifr', 'https://img.youtube.com/vi/-0mv7wG5Q74/sddefault.jpg', 1, '2023-02-28 17:39:46'),
(2, 'sangiovanni - lady (visual)', 'https://www.youtube.com/embed/MGX7nFSHgmU', 'https://img.youtube.com/vi/MGX7nFSHgmU/sddefault.jpg', 1, '2023-02-28 18:15:46'),
(3, 'Mahmood, BLANCO - Brividi (Sanremo 2022)', 'https://www.youtube.com/embed/MA_5P3u0apQ', 'https://img.youtube.com/vi/MA_5P3u0apQ/sddefault.jpg', 1, '2023-02-28 18:16:02'),
(5, 'ČIA TIK TARP MŪSŲ: darbas sau - privalumai ir trūkumai', 'https://www.youtube.com/embed/6ZZhRg1MwM0', 'https://img.youtube.com/vi/6ZZhRg1MwM0/sddefault.jpg', 2, '2023-03-01 17:37:50'),
(6, 'Lietuviškas Tiktokas yra Dugnas? | SAVAITĖS RIFAS #43', 'https://www.youtube.com/embed/ZR6A4Pp8AZ4', 'https://img.youtube.com/vi/ZR6A4Pp8AZ4/sddefault.jpg', 2, '2023-03-01 17:37:50'),
(7, '„Huawei Moterų lygos“ apžvalga: Kauuno „Aistės-LSMU“ – Vilniaus „Kibirkštis-MRU“)', 'https://www.youtube.com/embed/DaqjcFqjYko', 'https://img.youtube.com/vi/DaqjcFqjYko/sddefault.jpg', 3, '2023-03-01 17:39:37'),
(8, '„Huawei Moterų lygos“ apžvalga: Klaipėdos „Neptūnas“ – Kauno „Aistės-LSMU“', 'https://www.youtube.com/embed/uFfuYW80Bnk', 'https://img.youtube.com/vi/uFfuYW80Bnk/sddefault.jpg', 3, '2023-03-01 17:39:37'),
(10, 'Vėl Tie Patys #146 apie prisifreestylinimą, dingusį Malaizijos lėktuvą ir New Yorko romaną', 'https://www.youtube.com/embed/YuhpA8dakrc', 'https://img.youtube.com/vi/YuhpA8dakrc/0.jpg', 2, '2023-03-16 17:16:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Video Category` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `Video Category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

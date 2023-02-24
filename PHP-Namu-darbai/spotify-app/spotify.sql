-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2023 at 12:37 PM
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
-- Database: `spotify`
--

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `user_id`, `created_at`) VALUES
(6, 'Workout hits', 1, '2023-02-20 17:42:45'),
(7, 'Chill evenings', 1, '2023-02-20 17:42:55'),
(8, 'Latino ', 3, '2023-02-20 18:02:13'),
(16, 'Trefkių playlistas', 7, '2023-02-22 14:49:39'),
(18, 'Lietuviškos tralialiuškos', 1, '2023-02-22 15:33:07'),
(19, 'Naujas', 7, '2023-02-24 13:34:35');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_bin NOT NULL,
  `author` varchar(250) COLLATE utf8_bin NOT NULL,
  `album` varchar(250) COLLATE utf8_bin NOT NULL,
  `year` year(4) NOT NULL,
  `link` varchar(250) COLLATE utf8_bin NOT NULL,
  `photo` blob NOT NULL,
  `playlist_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `name`, `author`, `album`, `year`, `link`, `photo`, `playlist_id`, `created_at`) VALUES
(1, 'Flowers', 'Miley Cyrus', 'Whatever', 2023, 'https://www.youtube.com/watch?v=G7KNmW9a75Y', '', 8, '2023-02-15 11:37:00'),
(2, 'Jengi', 'Bel Mercy', 'Mercy', 2022, 'https://www.youtube.com/watch?v=yRLMDtHlwuY', '', 6, '2023-02-16 15:57:08'),
(3, 'Love Nwantiti', 'Ckay', 'love nwantiti', 2022, 'https://www.youtube.com/watch?v=xSwh6xOSoVk', '', 7, '2023-02-16 15:58:33'),
(4, 'guccy bag', 'sangiovanni', 'Sugar Srl\r\n', 2021, 'https://www.youtube.com/watch?v=a5D_KRUbtDM', '', NULL, '2023-02-21 18:28:24'),
(5, 'Dėl Tavęs', 'Jessica Shy', 'OpenPlay ', 2023, 'https://www.youtube.com/watch?v=lxNZsyK7amI', '', NULL, '2023-02-21 18:28:24'),
(6, 'Tyliai Pakuždėk', 'Jessica Shy', 'OpenPlay', 2022, 'https://www.youtube.com/watch?v=HSSKqiydHpo', '', NULL, '2023-02-21 18:30:53'),
(7, 'Gimme! Gimme! Gimme! (A Man After Midnight)', 'ABBA', 'ABBA Gold', 2008, 'https://www.youtube.com/watch?v=txS8jis3hr4', '', NULL, '2023-02-21 18:30:53'),
(20, 'Sure Thing', 'Miguel', 'beaski_lyrics', 2022, 'https://www.youtube.com/watch?v=G7KNmW9a75Y', 0x313637373133373439362e6a7067, NULL, '2023-02-23 09:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `songs_playlists`
--

CREATE TABLE `songs_playlists` (
  `id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `playlist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `songs_playlists`
--

INSERT INTO `songs_playlists` (`id`, `song_id`, `playlist_id`) VALUES
(1, 2, 12),
(2, 5, 12),
(3, 6, 12),
(4, 5, 13),
(5, 6, 13),
(6, 5, 14),
(7, 6, 14),
(9, 3, 15),
(10, 4, 15),
(11, 7, 15),
(12, 2, 16),
(13, 4, 16),
(14, 7, 16),
(15, 5, 17),
(16, 6, 17),
(17, 5, 18),
(18, 6, 18),
(20, 7, 19),
(21, 20, 19);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(250) COLLATE utf8_bin NOT NULL,
  `password` varchar(250) COLLATE utf8_bin NOT NULL,
  `nickname` varchar(250) COLLATE utf8_bin NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `nickname`, `role`, `created_at`) VALUES
(1, 'jonas@gmail.com', '9c5ddd54107734f7d18335a5245c286b', 'jonce', 0, '2023-02-15 11:00:59'),
(2, 'admin@admin.lt', '21232f297a57a5a743894a0e4a801fc3', '', 1, '2023-02-15 11:02:17'),
(3, 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'testukas', 0, '2023-02-16 14:49:24'),
(7, 'greta@gmail.com', 'ab0eb155658574968a102239cbb2387f', 'gretutu', 0, '2023-02-21 08:58:33'),
(8, 'testas@gmail.com', '00d70a471879136635979f5441e3da51', 'testeris', 0, '2023-02-21 09:00:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `songs_playlists` (`playlist_id`);

--
-- Indexes for table `songs_playlists`
--
ALTER TABLE `songs_playlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `songs` (`song_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `songs_playlists`
--
ALTER TABLE `songs_playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_playlists` FOREIGN KEY (`playlist_id`) REFERENCES `playlists` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `songs_playlists`
--
ALTER TABLE `songs_playlists`
  ADD CONSTRAINT `songs` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

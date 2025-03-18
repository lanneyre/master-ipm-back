-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 18 mars 2025 à 17:20
-- Version du serveur : 10.11.8-MariaDB-0ubuntu0.24.04.1
-- Version de PHP : 8.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ipm-animaux`
--

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `img`, `description`, `role`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Alexandra Strosin V', 'berge.jacky@example.org', '2025-03-18 06:34:56', '$2y$12$drZWgnXIscK9T.gMOWgiJu5qPOwFwpLi9OJ7zqdWVTeU5Lhutd3ge', 'volunteer5.jpg', 'Ipsum consequatur nesciunt in velit velit odio similique vel inventore dolore vitae maxime hic molestiae veniam voluptatem dolorem.', 1, '31VU6JTpwJ', '2025-03-18 06:34:56', '2025-03-18 06:34:56', NULL),
(2, 'Prof. Jimmy Collins', 'schinner.cleveland@example.org', '2025-03-18 06:34:56', '$2y$12$drZWgnXIscK9T.gMOWgiJu5qPOwFwpLi9OJ7zqdWVTeU5Lhutd3ge', NULL, 'Nostrum ut voluptatem fugiat quidem quibusdam reiciendis rerum saepe.', 2, 'g0WU299EZ9', '2025-03-18 06:34:56', '2025-03-18 06:34:56', NULL),
(3, 'Narciso Konopelski', 'lquigley@example.com', '2025-03-18 06:34:56', '$2y$12$drZWgnXIscK9T.gMOWgiJu5qPOwFwpLi9OJ7zqdWVTeU5Lhutd3ge', NULL, NULL, 2, 'QCvUS7lb61', '2025-03-18 06:34:56', '2025-03-18 06:34:56', NULL),
(4, 'Aniyah Murazik', 'yundt.clint@example.org', '2025-03-18 06:34:56', '$2y$12$drZWgnXIscK9T.gMOWgiJu5qPOwFwpLi9OJ7zqdWVTeU5Lhutd3ge', 'volunteer4.jpg', 'Ut quod quo nisi architecto et aperiam ab inventore.', 1, 'b3St65aYGH', '2025-03-18 06:34:56', '2025-03-18 06:34:56', NULL),
(5, 'Joannie Bernier DDS', 'xmcglynn@example.org', '2025-03-18 06:34:56', '$2y$12$drZWgnXIscK9T.gMOWgiJu5qPOwFwpLi9OJ7zqdWVTeU5Lhutd3ge', 'volunteer2.jpg', 'Voluptatem est quia omnis ut nihil voluptatem sed quia sunt cumque reprehenderit corporis voluptatem et incidunt autem corporis.', 3, 'qf0bHH4KK9', '2025-03-18 06:34:56', '2025-03-18 06:34:56', NULL),
(6, 'Prof. Foster Conn', 'van73@example.org', '2025-03-18 06:34:56', '$2y$12$drZWgnXIscK9T.gMOWgiJu5qPOwFwpLi9OJ7zqdWVTeU5Lhutd3ge', 'volunteer3.jpg', 'Nisi dolores quidem magni id sit iure.', 3, 'jk5UWzlCs7', '2025-03-18 06:34:56', '2025-03-18 06:34:56', NULL),
(7, 'Albert Walsh', 'jeff35@example.net', '2025-03-18 06:34:56', '$2y$12$drZWgnXIscK9T.gMOWgiJu5qPOwFwpLi9OJ7zqdWVTeU5Lhutd3ge', 'volunteer.jpg', 'Eos eveniet eos in qui natus laudantium quis laudantium aut recusandae neque laudantium.', 1, '6SSdfSF5k1', '2025-03-18 06:34:56', '2025-03-18 06:34:56', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

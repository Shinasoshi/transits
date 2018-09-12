-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Wrz 2018, 01:02
-- Wersja serwera: 10.1.34-MariaDB
-- Wersja PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `transit`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transits`
--

CREATE TABLE `transits` (
  `id` char(36) NOT NULL,
  `distance_kilometers` float NOT NULL,
  `locations` text NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `transits`
--

INSERT INTO `transits` (`id`, `distance_kilometers`, `locations`, `created_at`) VALUES
('14bf2aa1-137b-471d-826a-382b76907d55', 1351.96, '[\"Marsza\\u0142kowska 1, Warszawa, PL\",\"Argentinsk\\u00e1 1, Praha, CZ\",\"Marsza\\u0142kowska 10, Warszawa, PL\"]', 1536703737),
('4cfab9dd-9d52-4fb3-ba3d-7320357e53aa', 1351.96, '[\"Marsza\\u0142kowska 1, Warszawa, PL\",\"Argentinsk\\u00e1 1, Praha, CZ\",\"Marsza\\u0142kowska 10, Warszawa, PL\"]', 1536704169),
('69d754cb-2d03-40d5-a928-d0807eefdcd7', 1352.56, '[\"Marsza\\u0142kowska 1, Warszawa, PL\",\"Argentinsk\\u00e1 1, Praha, CZ\",\"Marsza\\u0142kowska 11110, Warszawa, PL\"]', 1536704255),
('7ce2c203-e4c9-4982-b4f1-29c4964664dd', 1351.96, '[\"Marsza\\u0142kowska 1, Warszawa, PL\",\"Argentinsk\\u00e1 1, Praha, CZ\",\"Marsza\\u0142kowska 10, Warszawa, PL\"]', 1536704279),
('ae2c8a3e-77f1-489f-9fd3-7d17002f237d', 1351.96, '[\"Marsza\\u0142kowska 1, Warszawa, PL\",\"Argentinsk\\u00e1 1, Praha, CZ\",\"Marsza\\u0142kowska 10, Warszawa, PL\"]', 1536704149),
('c1931f15-995d-400e-9283-a92480edd3f4', 1351.96, '[\"Marsza\\u0142kowska 1, Warszawa, PL\",\"Argentinsk\\u00e1 1, Praha, CZ\",\"Marsza\\u0142kowska 10, Warszawa, PL\"]', 1536706432),
('cecbee21-3fab-47f5-9851-6086f1e0bce1', 1351.96, '[\"Marsza\\u0142kowska 1, Warszawa, PL\",\"Argentinsk\\u00e1 1, Praha, CZ\",\"Marsza\\u0142kowska 10, Warszawa, PL\"]', 1536705647),
('f9f2fbbb-b3ca-44e7-9d18-0afa5f0ab2c8', 1351.96, '[\"Marsza\\u0142kowska 1, Warszawa, PL\",\"Argentinsk\\u00e1 1, Praha, CZ\",\"Marsza\\u0142kowska 10, Warszawa, PL\"]', 1536706442);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `transits`
--
ALTER TABLE `transits`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

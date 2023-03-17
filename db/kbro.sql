-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 16 Mar 2023, 18:32
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `kbro`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nazwa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `licytacje`
--

CREATE TABLE `licytacje` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `przedmiot_id` int(11) NOT NULL,
  `uzytkownik_id` int(11) NOT NULL,
  `cena_podbicie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przedmioty`
--

CREATE TABLE `przedmioty` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nazwa` text NOT NULL,
  `opis` text NOT NULL,
  `zdjecie_id` text NOT NULL,
  `cena_wywolawcza` int(11) NOT NULL,
  `data_wystawienia` datetime NOT NULL,
  `data_zakonczenia` datetime NOT NULL,
  `kategoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `imie` text NOT NULL,
  `nazwisko` text NOT NULL,
  `email` text NOT NULL,
  `haslo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kategorie`
--
-- ALTER TABLE `kategorie`
--   ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `licytacje`
--
ALTER TABLE `licytacje`
  -- ADD PRIMARY KEY (`id`),
  ADD KEY `przedmiot_id` (`przedmiot_id`),
  ADD KEY `uzytkownik_id` (`uzytkownik_id`);

--
-- Indeksy dla tabeli `przedmioty`
--
ALTER TABLE `przedmioty`
  -- ADD PRIMARY KEY (`id`),
  ADD KEY `kategoria_id` (`kategoria_id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  -- ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `licytacje`
--
ALTER TABLE `licytacje`
  ADD CONSTRAINT `licytacje_ibfk_1` FOREIGN KEY (`przedmiot_id`) REFERENCES `przedmioty` (`id`),
  ADD CONSTRAINT `licytacje_ibfk_2` FOREIGN KEY (`uzytkownik_id`) REFERENCES `uzytkownicy` (`id`);

--
-- Ograniczenia dla tabeli `przedmioty`
--
ALTER TABLE `przedmioty`
  ADD CONSTRAINT `przedmioty_ibfk_1` FOREIGN KEY (`kategoria_id`) REFERENCES `kategorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

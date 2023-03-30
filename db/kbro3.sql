-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Mar 2023, 21:38
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
-- Baza danych: `kbro2`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id` int(11) NOT NULL,
  `nazwa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id`, `nazwa`) VALUES
(1, 'Elektronika'),
(2, 'Moda'),
(3, 'Sport'),
(4, 'Motoryzacja'),
(5, 'Dom i ogród');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `licytacje`
--

CREATE TABLE `licytacje` (
  `id` int(11) NOT NULL,
  `przedmiot_id` int(11) NOT NULL,
  `uzytkownik_id` int(11) DEFAULT NULL,
  `cena_podbicie` int(11) DEFAULT NULL,
  `zakonczona` tinyint(1) DEFAULT NULL COMMENT '0 - NULL\r\n1 - zakonczona'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `licytacje`
--

INSERT INTO `licytacje` (`id`, `przedmiot_id`, `uzytkownik_id`, `cena_podbicie`, `zakonczona`) VALUES
(1, 1, 2, 3000, 0),
(2, 2, NULL, 22900, 1),
(3, 3, 1, 3010, 0),
(4, 4, NULL, 1500, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przedmioty`
--

CREATE TABLE `przedmioty` (
  `id` int(11) NOT NULL,
  `sprzedajacy_id` int(11) NOT NULL,
  `nazwa` text NOT NULL,
  `opis` text NOT NULL,
  `img_name` text NOT NULL,
  `cena_wywolawcza` int(11) DEFAULT NULL,
  `data_wystawienia` datetime NOT NULL,
  `data_zakonczenia` datetime NOT NULL,
  `kategoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `przedmioty`
--

INSERT INTO `przedmioty` (`id`, `sprzedajacy_id`, `nazwa`, `opis`, `img_name`, `cena_wywolawcza`, `data_wystawienia`, `data_zakonczenia`, `kategoria_id`) VALUES
(1, 1, 'Felgi aluminiowe 18 5x112 Audi , Skoda, Volkswagen', 'Na sprzedaż felgi aluminiowe razem z oponami letnimi w rozmiarze R18 5x112. Rozmiar opon 2x Michelin pilot Sport 3. 225/45 bieżnika 6mm. oraz 2 x Hankook Ventus V12 evo 2. 225/45 bieżnika 4mm. Sezon objadą na pewno. Felgi wyważone i gotowe na sezon. Jedna felga była naprawiana widoczna na 5 zdjęciu. Felgi mają delikatne ślady użytkowania. Cena do negocjacji. Kontakt telefoniczny lub przez OLX.<br />\r\n', '188347098764249076af7b61.57970493opony.jpg', 2050, '2023-03-29 21:24:38', '2023-04-12 21:24:38', 4),
(2, 1, 'BMW 730d E65 2003r Doinwestowany', 'Witam sprzedam BMW 730d E65 2003r. Rok temu wymieniłem silnik razem że skrzynią biegów. 240000 tyś kilometrów miał przed wymianą, zrobiłem może 15 tyś przez ten okres użytkowania. Chodzi idealnie filtry i oleje na bieżąco wymieniane .Nowe klocki hamulcowe i tarcze przód i tył .Nowy wał zawieszenie też zrobione.Wszystkie części wymienione są orginalne żadne zamienniki.Ogólnie samochód bardzo doinwestowany. Możliwość Sprawdzenia Na Stacji Diagnostycznej. Więcej informacji pod numerem telefonu<br />\r\n', '1854057563642490ac2d3c38.02264197bmw.jpg', 22900, '2023-03-29 21:25:32', '2023-03-31 10:00:32', 4),
(3, 2, 'Meble włoskie bdb stan', 'Meble włoskie komplet, bardzo zadbane.<br />\r\nStół rozkładany automatycznie. Szafka pod Tv, blat górny z funkcją obracania.<br />\r\n', '1880763711642490e7699782.98537848meble.jpg', 2999, '2023-03-29 21:26:31', '2023-04-12 21:26:31', 5),
(4, 3, 'Rower górski Giant. Hydrauliczne hamulce', 'Rower górski znanej firmy Giant. Hydrauliczne Shimano.<br />\r\nWszystko działa jak należy<br />\r\nNa kołach 26, Rama aluminiowa rozmiarze \"M\"<br />\r\nSerwisowany byl w tym roku, po serwisie byl mało używany.', '13995408466425d6c6bea3e5.69763023rower.jpg', 1500, '2023-03-30 20:36:54', '2023-04-13 20:36:54', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ulubione`
--

CREATE TABLE `ulubione` (
  `id_uzytkownika` int(11) NOT NULL,
  `id_przedmiotu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `imie` text NOT NULL,
  `nazwisko` text NOT NULL,
  `email` text NOT NULL,
  `haslo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `imie`, `nazwisko`, `email`, `haslo`) VALUES
(1, 'admin', 'admin', 'admin@alledrogo.pl', '$argon2i$v=19$m=65536,t=4,p=1$Q3NSNnl0Qm9uMHI5WmsvUg$DkdzzXYdoZn1v632pyjKlmWmk3ZglBP5FnJNQ+XnaX8'),
(2, 'Jan', 'Kowalski', 'jan.kowalski@example.com', '$argon2i$v=19$m=65536,t=4,p=1$V0tqNER5QnhpTHpEZ1FFdA$iyiXcIKhvBzmZT4uAotqLWCtp2dII8fIHrMjJ7m5n4U'),
(3, 'Marek', 'Bad', 'marbad@speed.pl', '$argon2i$v=19$m=65536,t=4,p=1$SjRKb0NlU29mc2dsQURJVg$E9lqEpSpuJI2OytZf2MWyitLblx9VlXKdxGG16ULsEQ');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `licytacje`
--
ALTER TABLE `licytacje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `przedmiot_id` (`przedmiot_id`),
  ADD KEY `uzytkownik_id` (`uzytkownik_id`);

--
-- Indeksy dla tabeli `przedmioty`
--
ALTER TABLE `przedmioty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategoria_id` (`kategoria_id`),
  ADD KEY `fk_sprzedajacy_id` (`sprzedajacy_id`);

--
-- Indeksy dla tabeli `ulubione`
--
ALTER TABLE `ulubione`
  ADD KEY `id_uzytkownika` (`id_uzytkownika`),
  ADD KEY `id_przedmiotu` (`id_przedmiotu`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `licytacje`
--
ALTER TABLE `licytacje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `przedmioty`
--
ALTER TABLE `przedmioty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `fk_sprzedajacy_id` FOREIGN KEY (`sprzedajacy_id`) REFERENCES `uzytkownicy` (`id`),
  ADD CONSTRAINT `przedmioty_ibfk_1` FOREIGN KEY (`kategoria_id`) REFERENCES `kategorie` (`id`);

--
-- Ograniczenia dla tabeli `ulubione`
--
ALTER TABLE `ulubione`
  ADD CONSTRAINT `ulubione_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id`),
  ADD CONSTRAINT `ulubione_ibfk_2` FOREIGN KEY (`id_przedmiotu`) REFERENCES `przedmioty` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

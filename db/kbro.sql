-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Mar 2023, 22:16
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
(1, 1, NULL, 35000, 0),
(2, 2, NULL, 142000, 0),
(3, 3, 3, 300, 0),
(4, 4, NULL, 200, 0),
(5, 5, 1, 3000, 1),
(6, 6, NULL, 2137, 0);

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
(1, 1, 'Audi A5 Sportback 2.0 TDI S Tronic', 'DANE POJAZDU: VIN : WAUZZZF52JA130391 Rok produkcji : 2018 Data I rej. : 26-10-2018 Przebieg : 98 243 km Liczba miejsc: 5  ════════════════════════════════════════════════  INFORMACJE OGÓLNE: • Możliwość kredytowania/leasing, • Możliwość sprawdzenia samochodu w niezależnym serwisie bądź ASO, • Możliwość sprawdzenia przebiegu w Salonie, • Serwisowany w ASO, • Systematyczne przeglądy wpisane są w serwisie, • Cena zawiera wszystko łącznie z akcyzą, przetłumaczonymi dokumentami oraz przeglądem, • Posiadamy wszystkie potrzebne dokumenty potrzebne do rejestracji, • Po zakupie pozostaje jedynie koszt rejestracji i ubezpieczenia, • Komplet kluczyków 2 szt, • Fotografujemy wszystkie szyby, • Zawsze udostępniamy numer VIN.  WYPOSAŻENIE: • Światła do jazdy dziennej Full LED • Fotele skórzane czarne • Podgrzewane lusterka i dysze spryskiwaczy • Klimatyzacja dwustrefowa • Immobiliser • Park troniki przód i tył • Monitorowanie i utrzymanie auta w pasie Ruchu • System antykolizyjny Ostrzega o hamowaniu poprzedzającego pojazdu • Duży kolorowy komputer pokładowy • Automatyczna skrzynia • Radio Kompatybilne z każdym Telefonem • Nawigacja z Mapą Polski • Elektryczne Składane Lusterka • Bluetooth • Wejście USB • Wejście AUX • Tempomat aktywny • Dynamiczne kierunkowskazy LED • Elektryczne Ręczny Hamulec • Świetnie utrzymana skórzana Tapicerka • Gniazdko ładowania • Centralny zamek • ABS ASR ESP • Elektryczna klapa tylna • Wielofunkcyjna kierownica • Elektryczne szyby • Elektryczne lusterka i wiele innych...', '50350094641771651220d0.33578481image.jpg', 35000, '2023-03-19 21:32:37', '2023-04-19 21:32:37', 4),
(2, 1, 'Mercedes GLC 350e Plug-in Hybrid, 4- Matic, Panorama dach !', 'GLC 350e Hybryda Plug in 347 KM spalinowy 211 KM/155 KW/ elektryczny 136KM /100KW/auto serwisowane, garażowane użytkowane przez kobietę. Wyposazenie: Keyless Go, tempomat, panoramiczny dach, elektryczny hak , skorzana kierownica, skorzana tapicerka, ESP, 4x4, 4 elektryczne szyby, elektryczny zamykany bagaznik, Start- Stop, podgrzewane siedzenia, nawigacja i inne', '1489639846641771ace8d9f8.22082696image.jpg', 142000, '2023-03-19 21:33:48', '2023-04-19 21:33:48', 4),
(3, 2, 'Oddam ziemię za darmo. Ziemia ogrodowa', 'Oddam ziemie pod trawnik do ogródka lub na wyrównanie działki.', '2694229606417722166b689.58757454ziemia.jpg', 10, '2023-03-19 21:35:45', '2023-04-19 21:35:45', 5),
(4, 3, 'Elegancki Trzyczęściowy Garnitur Chłopięcy Wygodny 110', 'Prezentujemy trzyczęściowy garnitur z serii Little Elegant dla małych dżentelmenów. Garnitur wykonany jest z miękkiej i wygodnej dresówki pętelki, co zapewnia maksymalny komfort użytkowania. Marynarka sportowa w kolorze nieieskim, ze stójką, zapinana na guziczka dostarcza uroku i elegancji. Koszulka w kolorze białym z muchą, doskonale dopasowana do marynarki, tworzy zgrabny i stylowy zestaw. Spodnie baggy slim w kolorze niebieskim, nadają elegancki charakter garnituru. Garnitur Little Elegant to idealna propozycja dla chłopców, którzy cenią sobie wygodę i styl. Pasuje zarówno na uroczyste okazje, jak i na co dzień. Dzięki temu zestawowi każdy mały dżentelmen prezentuje się wyjątkowo i elegancko. Materiał: dresówka piętelka 95% bawełny Kolor: niebieski Zawartość zestawu: - Marynarka sportowa ze stójką zapinana na guziczka - Koszulka z muchą - Spodnie baggy slim Idealny na różne okazje chrzest, komunia, święta, urodziny, wesele itp Połączenie elegancji i wygody. Produkcja: polska firma Kaya niszowa marka premium odzieży niemowlęcej i dziecięcej 62-122 Zapraszam do zapoznania się z innymi moimi ofertami ubranek bardzo dobrej jakości tylko polskich producentów', '669900483641772851a2373.05521224ubranie.jpg', 200, '2023-03-19 21:37:25', '2023-04-19 21:37:25', 2),
(5, 1, 'Smartfon Samsung Galaxy S21', 'nowiutki nie smigany polecam <br />\r\nfiu <br />\r\nfiu', '575038639641b600a2e86f4.43562501ziemia.jpg', 3000, '2023-03-22 21:07:38', '2023-03-22 20:07:38', 1),
(6, 2, 'jd', 'jd<br />\r\njd<br />\r\nhd<br />\r\n', '474043941641b6ca5e56de8.10960510Equestrian-JD-team2.jpg', 2137, '2023-03-22 22:01:25', '2023-04-05 22:01:25', 3);

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
(1, 'admin', 'admin', 'admin@alledrogo.pl', '$argon2i$v=19$m=65536,t=4,p=1$Z1U2d0tJYzQ0cXZwR1cxRQ$KzJ8isaGFgxPSVzx7s2QwgSrbldyYJrZHFCMeZCcmXo'),
(2, 'Jan', 'Kowalski', 'jan.kowalski@example.com', '$argon2i$v=19$m=65536,t=4,p=1$WHdxUlREQWVjSnFDTVUvcQ$XfOHTybUAuWU6qSbeDxH42QDEMpNBKFY0P0gW05CdOo'),
(3, 'Marek', 'Bad', 'marbad@speed.pl', '$argon2i$v=19$m=65536,t=4,p=1$eVo5N3VDY3lpRU1sdENQdQ$1xW19+sEel+NvLjdrjThILe9PBNUkEIibV0LWjPnbqo');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `przedmioty`
--
ALTER TABLE `przedmioty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

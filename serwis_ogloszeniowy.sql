-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Gru 2016, 01:58
-- Wersja serwera: 10.1.13-MariaDB
-- Wersja PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `serwis_ogloszeniowy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `advertisement`
--

CREATE TABLE `advertisement` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_polish_ci,
  `user_id` int(11) DEFAULT NULL,
  `short_description` text COLLATE utf8_polish_ci,
  `description` text COLLATE utf8_polish_ci,
  `category_id` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `awarded` int(11) DEFAULT NULL,
  `cena` text COLLATE utf8_polish_ci,
  `photo` text COLLATE utf8_polish_ci,
  `lokalizacja` text COLLATE utf8_polish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `advertisement`
--

INSERT INTO `advertisement` (`id`, `name`, `user_id`, `short_description`, `description`, `category_id`, `created_date`, `awarded`, `cena`, `photo`, `lokalizacja`) VALUES
(1, 'KIA SPORTAGE', 1, 'SAMOCHÓD TAKI ŻE HEJ! 	', 'SAMOCHÓD TAKI ŻE HEJ!', 1, '2016-12-04', 0, '20000.00zł', 'Kia_Sportage.jpg', 'Siedlce'),
(2, 'KOMPUTER FAJNY', 1, 'Pójdzie nawet Wiedźmin 3 na ultra', 'DOBRY JEST', 5, '2016-12-04', 0, '3000.00zł', 'komputer.jpg', 'Siedlce'),
(3, 'Maluch', 1, 'Fiat 126 (centoventisei) – samochód osobowy skonstruowany w zakładach FIAT, produkowany we Włoszech w latach 1972–1980, a w Polsce od 6 czerwca 1973 do 22 września 2000 roku (Polski Fiat 126p)', 'Fiat 126 (centoventisei) – samochód osobowy skonstruowany w zakładach FIAT, produkowany we Włoszech w latach 1972–1980, a w Polsce od 6 czerwca 1973 do 22 września 2000 roku (Polski Fiat 126p)[1]. Polska wersja licencyjna produkowana była przez Fabrykę Samochodów Małolitrażowych „Polmo” Bielsko-Biała w Bielsku-Białej oraz w Tychach. Jego poprzednikiem był Fiat 500, następcą Fiat Cinquecento.', 1, '2016-12-06', 0, '500.00zł', 'maluch.jpg', 'Siedlce'),
(16, 'Programista PHP', 1, 'Programista Codeigniter', 'Szukamy programista php, 25 lat stażu, wyższe wykształcenie', 3, '2016-12-07', 1, '7000zł/miesięcznie', 'pl-jak-nie-zosta-programist-php-4-7283.jpg', 'Siedlce'),
(17, '4 laski na sprzedaż', 1, 'Piękne cztery czarne laski z drzewa bukowego, idealne do podpierania i smolenia cholewek', 'Witam!\r\nMam do sprzedania 4 piękne, dorodne i jędrne laseczki z drzewa bukowego, wytrzymałego, nie ugiętego. Czarne laski tylko u nas, takiej jakości nie znajdziesz!\r\nKupuj, kupuj, to pewny zysk', 4, '2016-12-07', 1, '120zł', 'laski-drewniane.jpg', 'Warszawa'),
(18, 'Syrenka', 1, 'Zabytkowa syrenka, okazja!', 'Prace nad projektem uruchomiono w 2012 roku[1]. Pierwszy jeżdżący prototyp zaprezentowanego w styczniu 2014 roku[2]. Głównym konstruktorem projektu jest Andrzej Stasiak [3]. Uzykanie homologacji pojazdu i zaprezentowanie wersji przedprodukcyjnej zaplanowano na rok 2014, podobnie jak oficjalną premierą na Międzynarodowych Targach Poznańskich[2]. W połowie 2015 roku istniało pięć egzemplarzy prototypowych, a proces homologacji planowano zakończyć do końca 2015 roku. Początkowo planowano, że auto będzie w całości produkowane z części wytwarzanych w polskich przedsiębiorstwach, ale z powodu braku podmiotów produkujących niektóre części, ok. 40% z nich jest pozyskiwane od podmiotów zagranicznych[1]. Jesienią 2015 roku miały miejsce testy drogowe na autostradzie A1[4]. Wersja produkcyjna pojazdu ma być gotowa w pierwszym kwartale 2016 roku[5], produkcję seryjną zaplanowano rozpocząć w drugiej połowie 2016 roku, początkowo w ilości 300-500 sztuk rocznie. Oprócz rozwijanej najmocniej wersji trzydrzwiowej trwały także mniej zaawansowane prace nad modelami sportowym, dostawczym i pięciodrzwiowym[1]. Producent zadeklarował uruchomienie w przyszłości produkcji także kolejnych wersji nadwoziowych[6] − hatchback i dostawczej[3].', 1, '2016-12-07', 1, '5000zł', 'dda7f3e6b44084-645-322-0-408-3081-1540.jpg', 'Warszawa'),
(19, 'Wieżowiec', 1, 'Mieszkanie na Wynajem, świetna lokalizacja', 'Wynajmę mieszkanie, świetna lokalizacja, dużo sklepów. Tylko poważne oferty', 2, '2016-12-08', 1, '1zl', 'prypeć.jpg', 'Solina');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ad_data`
--

CREATE TABLE `ad_data` (
  `id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `info_id` int(11) NOT NULL,
  `data` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ad_data`
--

INSERT INTO `ad_data` (`id`, `ad_id`, `info_id`, `data`) VALUES
(1, 1, 1, '120KM'),
(2, 1, 2, '200 000km');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'motoryzacja'),
(2, 'nieruchomosc'),
(3, 'praca'),
(4, 'odziez'),
(5, 'komputery');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category_columns`
--

CREATE TABLE `category_columns` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `category_columns`
--

INSERT INTO `category_columns` (`id`, `category_id`, `name`) VALUES
(1, 1, 'pojemność_silnika'),
(2, 1, 'moc_silnika'),
(3, 1, 'typ_nadwozia'),
(4, 1, 'marka'),
(5, 1, 'model'),
(6, 1, 'skrzynia_biegów');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komputery`
--

CREATE TABLE `komputery` (
  `ad_id` int(11) NOT NULL,
  `procesor` text,
  `grafika` text,
  `twardy_dysk` text,
  `RAM` text,
  `plyta_glowna` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `komputery`
--

INSERT INTO `komputery` (`ad_id`, `procesor`, `grafika`, `twardy_dysk`, `RAM`, `plyta_glowna`) VALUES
(2, 'Intel i5-6500', 'MSI GeForce GTX 970 GAMING 4GB DDR5 (256 bit)', 'WD Blue 1TB WD10EZEX 3,5'' / SATA III / 7200rpm / 64MB / bulk\r\n	', 'Crucial DDR4 8GB 2666MHz CL16 Ballistix Elite ', ' MSI 970 GAMING ');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `motoryzacja`
--

CREATE TABLE `motoryzacja` (
  `ad_id` int(11) NOT NULL,
  `pojemność_silnika` varchar(40) COLLATE utf8_polish_ci DEFAULT NULL,
  `moc_silnika` varchar(40) COLLATE utf8_polish_ci DEFAULT NULL,
  `typ_nadwozia` varchar(40) COLLATE utf8_polish_ci DEFAULT NULL,
  `marka` varchar(40) COLLATE utf8_polish_ci DEFAULT NULL,
  `model` varchar(40) COLLATE utf8_polish_ci DEFAULT NULL,
  `skrzynia_biegów` varchar(40) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `motoryzacja`
--

INSERT INTO `motoryzacja` (`ad_id`, `pojemność_silnika`, `moc_silnika`, `typ_nadwozia`, `marka`, `model`, `skrzynia_biegów`) VALUES
(1, '2.0', '120KM', 'SUV', 'KIA', 'Sportage', 'manualna'),
(3, '594 cm³', '23 KM', 'fastback', 'Fiat', '126p', 'manualna'),
(18, '746 cm³', '27 KM', '2–drzwiowy sedan', 'FSM', 'Syrena 105', '4–biegowa manualna');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nieruchomosc`
--

CREATE TABLE `nieruchomosc` (
  `ad_id` int(11) NOT NULL,
  `liczba_pokoi` text,
  `metraz` text,
  `rodzaj_umowy` text,
  `umeblowane` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `nieruchomosc`
--

INSERT INTO `nieruchomosc` (`ad_id`, `liczba_pokoi`, `metraz`, `rodzaj_umowy`, `umeblowane`) VALUES
(19, '2', '40m2', 'wynajem', 'tak');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `odziez`
--

CREATE TABLE `odziez` (
  `ad_id` int(11) NOT NULL,
  `rodzaj_garderoby` text,
  `rozmiar` text,
  `stan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `odziez`
--

INSERT INTO `odziez` (`ad_id`, `rodzaj_garderoby`, `rozmiar`, `stan`) VALUES
(17, 'm?ska', 'minimum 50 cm', 'Nowa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `photos`
--

INSERT INTO `photos` (`id`, `ad_id`, `photo`) VALUES
(1, 3, 'maluch2.jpg'),
(2, 3, 'maluch3.jpg'),
(3, 2, 'Intel i5-6500.jpg'),
(4, 2, 'i-msi-geforce-gtx-970-gaming-4gb-gtx-970-gaming-4g.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `praca`
--

CREATE TABLE `praca` (
  `ad_id` int(11) NOT NULL,
  `firma` text,
  `stanowisko` text,
  `rodzaj_umowy` text,
  `wynagrodzenie` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `praca`
--

INSERT INTO `praca` (`ad_id`, `firma`, `stanowisko`, `rodzaj_umowy`, `wynagrodzenie`) VALUES
(16, 'Elektryk Siedlce', 'programista', 'o prac?', '7000z? miesi?cznie na start');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `nick` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `telefon` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `nick`, `telefon`) VALUES
(1, 'test@test.pl', '1234', 'Test', '123456789'),
(2, 'test2@test.pl', '1234', 'Test2', '123456788');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ad_data`
--
ALTER TABLE `ad_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_columns`
--
ALTER TABLE `category_columns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `komputery`
--
ALTER TABLE `komputery`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `motoryzacja`
--
ALTER TABLE `motoryzacja`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `nieruchomosc`
--
ALTER TABLE `nieruchomosc`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `odziez`
--
ALTER TABLE `odziez`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ad_id` (`ad_id`),
  ADD KEY `ad_id_2` (`ad_id`);

--
-- Indexes for table `praca`
--
ALTER TABLE `praca`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT dla tabeli `ad_data`
--
ALTER TABLE `ad_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `category_columns`
--
ALTER TABLE `category_columns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `komputery`
--
ALTER TABLE `komputery`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `motoryzacja`
--
ALTER TABLE `motoryzacja`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT dla tabeli `nieruchomosc`
--
ALTER TABLE `nieruchomosc`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT dla tabeli `odziez`
--
ALTER TABLE `odziez`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT dla tabeli `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `praca`
--
ALTER TABLE `praca`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `advertisement`
--
ALTER TABLE `advertisement`
  ADD CONSTRAINT `advertisement_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `advertisement_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `komputery`
--
ALTER TABLE `komputery`
  ADD CONSTRAINT `komputery_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `advertisement` (`id`);

--
-- Ograniczenia dla tabeli `motoryzacja`
--
ALTER TABLE `motoryzacja`
  ADD CONSTRAINT `motoryzacja_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `advertisement` (`id`);

--
-- Ograniczenia dla tabeli `nieruchomosc`
--
ALTER TABLE `nieruchomosc`
  ADD CONSTRAINT `nieruchomosc_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `advertisement` (`id`);

--
-- Ograniczenia dla tabeli `odziez`
--
ALTER TABLE `odziez`
  ADD CONSTRAINT `odziez_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `advertisement` (`id`);

--
-- Ograniczenia dla tabeli `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `advertisement` (`id`);

--
-- Ograniczenia dla tabeli `praca`
--
ALTER TABLE `praca`
  ADD CONSTRAINT `praca_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `advertisement` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

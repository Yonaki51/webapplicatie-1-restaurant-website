-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Gegenereerd op: 09 apr 2026 om 14:31
-- Serverversie: 8.4.8
-- PHP-versie: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurantgenmai`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `ID` int NOT NULL,
  `gebruikersnaam` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`ID`, `gebruikersnaam`, `wachtwoord`) VALUES
(1, 'flipper', '$2y$10$rqchVNVS25nBP2bNdUB63uQt5adGEhMCKXIHPE4GQFRvKmXUXP6FK');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menukaart`
--

CREATE TABLE `menukaart` (
  `ID` int NOT NULL,
  `Naam` varchar(50) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `Beschrijving` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Allergenen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Afbeelding` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Prijs` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `menukaart`
--

INSERT INTO `menukaart` (`ID`, `Naam`, `categorie`, `Beschrijving`, `Allergenen`, `Afbeelding`, `Prijs`) VALUES
(2, 'Edamame', 'Voorgerecht', 'Gestoomde jonge sojabonen licht bestrooid met zeezout. Een klassiek Japans hapje om de maaltijd mee te beginnen.', 'Soja', '/assets/img/edamame.jpg', 5),
(3, 'Gyoza', 'Voorgerecht', 'Knapperig gebakken dumplings gevuld met varkensvlees, kool en gember, geserveerd met een pittige dipsaus.', 'Gluten, Soja, Varkensvlees', '/assets/img/gyoza.jpg', 8),
(4, 'Miso Soep', 'Voorgerecht', 'Traditionele Japanse soep op basis van misopasta met tofu, zeewier en bosuitjes.', 'Soja, Gluten, Vis (dashi)', '/assets/img/miso-soep.jpg', 4),
(5, 'Karaage Kip', 'Voorgerecht', 'Krokant gefrituurd Japans kippetje gemarineerd in sojasaus, sake en gember, geserveerd met kewpiemayonaise.', 'Gluten, Soja, Eieren', '/assets/img/karaage-kip.jpg', 9),
(6, 'Agedashi Tofu', 'Voorgerecht', 'Licht gepaneerde gefrituurde tofu in een lichte dashi-bouillon met geraspte daikon en katsuobushi.', 'Soja, Gluten, Vis', '/assets/img/agedashi-tofu.jpg', 7),
(7, 'Salmon avocado roll', 'Sushi Rolls', 'Zalm & avocado roll met roomkaas.', 'bevat: sesam, lactose, vis, is niet geschikt voor zwangeren', '/assets/img/salmon-avocado-roll.jpg', 6),
(8, 'Spicy Tuna Roll', 'Sushi Rolls', 'Pittige tonijnrol met sriracha-mayonaise en komkommer, afgewerkt met tobiko en bosui.', 'Vis, Eieren, Gluten, Soja, Sesamzaad', '/assets/img/spicy-tuna-roll.jpg', 13),
(9, 'Dragon Roll', 'Sushi Rolls', 'Indrukwekkende inside-out roll met garnalen tempura en komkommer, belegd met dunne plakjes avocado en zoete saus.', 'Schaaldieren, Gluten, Soja, Eieren, Sesamzaad', '/assets/img/dragon-roll.jpg', 15),
(10, 'Veggie Roll', 'Sushi Rolls', 'Frisse vegetarische roll met komkommer, avocado, rode paprika en knapperige tempuravlokken.', 'Gluten, Soja, Sesamzaad', '/assets/img/veggie-roll.jpg', 10),
(11, 'Rainbow Roll', 'Sushi Rolls', 'Inside-out roll met krabsalade van binnen, bedekt met een kleurrijke variatie aan vis: zalm, tonijn, gamba en avocado.', 'Vis, Schaaldieren, Gluten, Soja, Eieren, Sesamzaad', '/assets/img/rainbow-roll.jpg', 16),
(13, 'Sake Nigiri (2 stuks)', 'Nigiri & Sashimi', 'Twee stukken handgevormde sushirijst belegd met verse atlantische zalmfilet van topkwaliteit.', 'Vis, Gluten, Soja', '/assets/img/sake-nigiri.jpg', 8),
(14, 'Maguro Nigiri (2 stuks)', 'Nigiri & Sashimi', 'Twee stukken handgevormde sushirijst belegd met dieprozé verse blauwvintonijn.', 'Vis, Gluten, Soja', '/assets/img/maguro-nigiri.jpg', 9),
(15, 'Ebi Nigiri (2 stuks)', 'Nigiri & Sashimi', 'Twee stukken sushirijst belegd met zacht gegaarde tijgergarnaal, geserveerd met een vleugje wasabi.', 'Schaaldieren, Gluten, Soja', '/assets/img/ebi-nigiri.jpg', 7),
(16, 'Sashimi Mix (9 stuks)', 'Nigiri & Sashimi', 'Negen plakken puur verse vis: drie soorten naar keuze van de chef, geserveerd op een bedje van daikon en shiso.', 'Vis, Soja', '/assets/img/sashimi-mix.jpg', 20),
(17, 'Hokkaido Scallop Nigiri (2 stuks)', 'Nigiri & Sashimi', 'Twee stukken sushirijst met romige Japanse coquilles, licht gebrand met een vleugje ponzusaus en yuzu.', 'Weekdieren, Gluten, Soja', '/assets/img/scallop-nigiri.jpg', 10),
(18, 'Tonkotsu Ramen', 'Ramen & Soepen', 'Rijke, romige varkensbouillon die uren heeft gesudderd, geserveerd met rechte ramennoedels, chashu buikspek, een zacht gekookt ei, nori en bosui.', 'Gluten, Eieren, Soja, Varkensvlees, Sesamzaad', '/assets/img/tonkotsu-ramen.jpg', 16),
(20, 'Spicy Miso Ramen', 'Ramen & Soepen', 'Pittige misosopbasis met dikke rechte noedels, gehakt varkensvlees, maïs, boter en een schep gochujang voor extra pit.', 'Gluten, Soja, Eieren, Varkensvlees, Sesamzaad', '/assets/img/spicy-miso-ramen.jpg', 15),
(21, 'Vegan Shio Ramen', 'Ramen & Soepen', 'Lichte zoutbouillon op basis van kombu en shiitake met tarwenoedels, gegrilde tofu, bamboescheuten en nori.', 'Gluten, Soja, Sesamzaad', '/assets/img/vegan-shio-ramen.jpg', 14),
(24, 'California Roll', 'Sushi Rolls', 'Klassieke inside-out roll gevuld met krabsalade, avocado en komkommer, gerold in tobiko.', 'Schaaldieren, Vis, Gluten, Soja, Eieren, Sesamzaad', '/assets/img/california-roll.jpg', 11),
(31, 'blok hout', 'Voorgerecht', 'een lekker blok massief hout', 'hout', '/assets/img/hout.jpg', 120),
(32, 'ijsblokjes', 'Ramen & Soepen', 'lekker om op te kauwen', 'water??', '/assets/img/ijsblokjes.jpg', 99999),
(34, 'test', 'Voorgerecht', 'test', '', '/assets/img/', 12);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `menukaart`
--
ALTER TABLE `menukaart`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `menukaart`
--
ALTER TABLE `menukaart`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

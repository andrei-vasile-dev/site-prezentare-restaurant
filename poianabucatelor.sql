-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1:3306
-- Timp de generare: mai 17, 2025 la 09:36 PM
-- Versiune server: 9.1.0
-- Versiune PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `poianabucatelor`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `meniu`
--

DROP TABLE IF EXISTS `meniu`;
CREATE TABLE IF NOT EXISTS `meniu` (
  `id_preparat` int NOT NULL AUTO_INCREMENT,
  `nume_preparat` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `descriere` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gramaj` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pret` float NOT NULL,
  `categorie` set('ciorbe','garnituri','aperitive','gratar','preparate pui','salate aperitiv','salate','paste','desert') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_preparat`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `meniu`
--

INSERT INTO `meniu` (`id_preparat`, `nume_preparat`, `descriere`, `gramaj`, `pret`, `categorie`) VALUES
(1, 'CIORBĂ DE LEGUME', 'cartofi, ceapă, morcov, țelină, ardei gras, borș, roșii, fasole verde, ulei, pătrunjel, sare', '350', 17, 'ciorbe'),
(2, 'CIORBĂ DE VITĂ', 'carne de vită, morcovi, pastarnac, telină, ceapă, cartofi, suc de roșii, ou, smântână, borș, sare', '50 / 300', 19, 'ciorbe'),
(3, 'CIORBĂ DE FASOLE', 'fasole, cimbru, ceapă, ardei gras, țelină, pastă de tomate, borș', '350', 17, 'ciorbe'),
(4, 'CIORBĂ DE PUI', 'carne de pui, ceapă, morcovi, tăiței, țelină, ardei gras, borș, ouă, sare', '50 / 300', 19, 'ciorbe'),
(5, 'CIORBĂ DE PERIȘOARE', 'carne de pui, ouă, borș, ceapă, morcov, telină, ardei gras, tomate, orez', '50 / 300', 19, 'ciorbe'),
(6, 'SUPĂ DE GĂLUȘTE', 'carne de pui, morcov, ceapă, păstârnac, țelină, griș, ou, sare', '100 / 250', 18, 'ciorbe'),
(7, 'CARTOFI PRĂJIȚI', 'cartofi, ulei, sare', '200', 9, 'garnituri'),
(8, 'CARTOFI ȚĂRĂNEȘTI', 'cartofi, ulei, ceapă, ardei, pătrunjel', '200', 11, 'garnituri'),
(9, 'IAHNIE DE FASOLE', 'fasole, pastă de tomate, sare, ulei', '200', 14, 'garnituri'),
(10, 'OREZ CU LEGUME', 'orez, ulei, ceapă, morcov, ardei, sare', '200', 11, 'garnituri'),
(11, 'VARZĂ CĂLITĂ', 'varză, ceapă, ardei, pastă de tomate, ulei, sare, piper', '200', 13, 'garnituri'),
(12, 'CIUPERCI SOTE', 'ciuperci, ulei de măsline, suc de lămâie, sare, pătrunjel', '200', 14, 'garnituri'),
(13, 'PIURE DE CARTOFI', 'cartofi, unt, lapte, sare', '200', 11, 'garnituri'),
(14, 'OUĂ OCHI', 'ouă, ulei, sare', '150', 8, 'aperitive'),
(15, 'OMLETĂ SIMPLĂ', 'ouă, ulei, sare, mărar', '200', 10, 'aperitive'),
(16, 'OMLETĂ ȚĂRĂNEASCĂ', 'ouă, ulei, sare, ceapă verde, ardei gras, cașcaval', '200', 13, 'aperitive'),
(17, 'ZACUSCĂ', 'vinete, fasole verde, roșii, ceapă, ardei capia, sare, ulei', '100', 7, 'aperitive'),
(18, 'CAȘCAVAL PANE', 'cașcaval, ou, făină, sare, ulei', '200', 16, 'aperitive'),
(19, 'SPANAC CU OU', 'spanac, ou, ulei, ceapă, sare, pastă de tomate', '300', 17, 'aperitive'),
(20, 'TOCĂNIȚĂ DE LEGUME', 'cartofi, dovlecei, ceapă, mazăre, morcovi, ulei, pastă de tomate, sare, usturoi', '250', 20, 'aperitive'),
(21, 'TOCANIȚĂ DE CIUPERCI', 'ciuperci, ulei, sare, ceapă, pastă de tomate', '250', 22, 'aperitive'),
(22, 'MĂMĂLIGĂ CU BRÂNZĂ ȘI SMÂNTÂNĂ', 'mălai, sare, brânză, smântână', '150 / 100 / 100', 16, 'aperitive'),
(23, 'MINI BURGER', 'chiflă, ketchup, maioneză, muștar, castraveți, roșii, brânză cheddar, carne de vită, piper, sare, zahăr, ulei', '200', 15, 'aperitive'),
(24, 'QUESADILLA', 'tortilla, piept de pui, cașcaval, ardei, pătrunjel, ulei, boia, oregano, porumb dulce, sare', '250', 17, 'aperitive'),
(25, 'PIEPT DE PUI', 'piept de pui, ulei, sare', '150', 11, 'gratar'),
(26, 'FICĂCIOR DE PUI', 'ficăcior de pui, unt, usturoi, ulei, busuioc, cimbru, sare', '150', 13, 'gratar'),
(27, 'PULPE DE PUI', 'pulpe de pui, sare, ulei, boia, cimbru, piper, rozmarin', '150', 12, 'gratar'),
(28, 'MICI', 'carne de oaie, carne de vită, usturoi, sare, piper, cimbru', '150', 14, 'gratar'),
(29, 'CÂRNAȚI DE CURCAN', 'carne de curcan, piper, usturoi, boia dulce, sare', '150', 17, 'gratar'),
(30, 'FICĂȚEI CU SOS', 'ficat de pui, ceapă, ardei, morcov, usturoi, roșii, ulei, boia, sare, pătrunjel', '250', 20, 'preparate pui'),
(31, 'FICĂȚEI CU LEGUME', 'ficat de pui, ceapă, morcov, ardei, ciuperci, pastă de roșii, ulei, sare, cimbru, piper', '250', 19, 'preparate pui'),
(32, 'ȘNIȚEL DE PUI', 'piept de pui, pesmet, făină, ouă, piper, ulei, sare', '250', 19, 'preparate pui'),
(33, 'ARIPIOARE DE PUI', 'aripioare de pui, ou, lapte, făină, usturoi, vegeta, sare', '250', 14, 'preparate pui'),
(34, 'PUI LIMONE', 'piept de pui, făină, ulei, unt, usturoi, piper, lămâie', '250', 17, 'preparate pui'),
(35, 'SALATĂ BULGĂREASCĂ', 'roșii, castraveți, ceapă, pătrunjel, ardei, brânză feta, măsline, șuncă, ou fiert, oțet, sare', '300', 15, 'salate aperitiv'),
(36, 'SALATĂ DE PUI', 'piept de pui, roșii, salată verde, ceapă, lămâie, ulei, coriandru, boia de ardei dulce, sare', '300', 18, 'salate aperitiv'),
(37, 'SALATĂ MIXTĂ', 'varză, roșii, ardei, castraveți, roșii', '300', 10, 'salate aperitiv'),
(38, 'SALATĂ DE VARĂ', 'roșii, castraveți, ulei, sare', '200', 10, 'salate'),
(39, 'SALATĂ DE MURĂTURI', 'castraveți, roșii, varză, gogoșar, sare', '200', 10, 'salate'),
(40, 'SALATĂ DE VARZĂ', 'varză, morcov, ulei, oțet, sare', '150', 11, 'salate'),
(41, 'SALATĂ DE ROȘII', 'roșii, ceapă, ulei, sare', '150', 13, 'salate'),
(42, 'SALATĂ DE SFECLĂ ROȘIE', 'sfeclă roșie, ulei, hrean, oțet, sare', '150', 12, 'salate'),
(43, 'SALATĂ DE TON', 'ton în ulei, salată verde, ceapă, ulei, sare', '300', 19, 'salate'),
(44, 'SALATĂ DE CEAPĂ ROȘIE', 'ceapă roșie, ulei, oțet, sare', '150', 7, 'salate'),
(45, 'TORTELINII', 'paste, șuncă, ciuperci, cașcaval', '350', 16, 'paste'),
(46, 'PASTE CU TON', 'paste, porumb dulce, ton în ulei de măsline, sare, piper, usturoi', '350', 22, 'paste'),
(47, 'PASTE PRIMĂVERA', 'paste, morcovi, dovlecei, ceapă, ardei, roșii, ierburi italiene, ulei, parmezan, sare, piper', '350', 18, 'paste'),
(48, 'PASTE CARBONARA', 'paste, parmezan, oua, guanciale, piper, ulei, sare', '350', 18, 'paste'),
(49, 'LASAGNA', 'carne de vită, roșii, ceapă, morcovi, ulei, cimbru, oregano, sare, bulion, unt, făină, foi lasagna, cașcaval, parmezan', '350', 22, 'paste'),
(50, 'CLĂTITE CU NUCĂ ȘI MIERE / DULCEAȚĂ', 'făină, lapte, oua, nuca și miere / dulceață', '300', 12, 'desert'),
(51, 'CLĂTITE CU FINETTI', 'făină, lapte, oua, finetti', '300', 12, 'desert'),
(52, 'PAPANAȘI', 'făină, ou, brânză, zahăr, smântână, griș, praf de copt, lămâie, dulceață', '250', 20, 'desert'),
(53, 'GĂLUȘTE DE PRUNE', 'cartofi, făină, zahăr, nucă, scorțișoară, prune / gem de prune', '250', 15, 'desert'),
(56, 'PRĂJITURĂ KINDER BUENO', 'ouă, zahăr, ulei, făină, pesmet, nuci, praf de copt, budincă de vanilie, lapte, cacao, unt, finetti, frișcă, biscuiți, ciocolată cu alune', '200', 12, 'desert');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `meniurezerva`
--

DROP TABLE IF EXISTS `meniurezerva`;
CREATE TABLE IF NOT EXISTS `meniurezerva` (
  `id_preparat` int NOT NULL AUTO_INCREMENT,
  `nume_preparat` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `descriere` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gramaj` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pret` float NOT NULL,
  `categorie` set('ciorbe','garnituri','aperitive','gratar','preparate pui','salate aperitiv','salate','paste','desert') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_preparat`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `meniurezerva`
--

INSERT INTO `meniurezerva` (`id_preparat`, `nume_preparat`, `descriere`, `gramaj`, `pret`, `categorie`) VALUES
(1, 'CIORBĂ DE LEGUME', 'cartofi, ceapă, morcov, țelină, ardei gras, borș, roșii, fasole verde, ulei, pătrunjel, sare', '350', 17, 'ciorbe'),
(2, 'CIORBĂ DE VITĂ', 'carne de vită, morcovi, pastarnac, telină, ceapă, cartofi, suc de roșii, ou, smântână, borș, sare', '50 / 300', 19, 'ciorbe'),
(3, 'CIORBĂ DE FASOLE', 'fasole, cimbru, ceapă, ardei gras, țelină, pastă de tomate, borș', '350', 17, 'ciorbe'),
(4, 'CIORBĂ DE PUI', 'carne de pui, ceapă, morcovi, tăiței, țelină, ardei gras, borș, ouă, sare', '50 / 300', 19, 'ciorbe'),
(5, 'CIORBĂ DE PERIȘOARE', 'carne de pui, ouă, borș, ceapă, morcov, telină, ardei gras, tomate, orez', '50 / 300', 19, 'ciorbe'),
(6, 'SUPĂ DE GĂLUȘTE', 'carne de pui, morcov, ceapă, păstârnac, țelină, griș, ou, sare', '100 / 250', 18, 'ciorbe'),
(7, 'CARTOFI PRĂJIȚI', 'cartofi, ulei, sare', '200', 9, 'garnituri'),
(8, 'CARTOFI ȚĂRĂNEȘTI', 'cartofi, ulei, ceapă, ardei, pătrunjel', '200', 11, 'garnituri'),
(9, 'IAHNIE DE FASOLE', 'fasole, pastă de tomate, sare, ulei', '200', 14, 'garnituri'),
(10, 'OREZ CU LEGUME', 'orez, ulei, ceapă, morcov, ardei, sare', '200', 11, 'garnituri'),
(11, 'VARZĂ CĂLITĂ', 'varză, ceapă, ardei, pastă de tomate, ulei, sare, piper', '200', 13, 'garnituri'),
(12, 'CIUPERCI SOTE', 'ciuperci, ulei de măsline, suc de lămâie, sare, pătrunjel', '200', 14, 'garnituri'),
(13, 'PIURE DE CARTOFI', 'cartofi, unt, lapte, sare', '200', 11, 'garnituri'),
(14, 'OUĂ OCHI', 'ouă, ulei, sare', '150', 8, 'aperitive'),
(15, 'OMLETĂ SIMPLĂ', 'ouă, ulei, sare, mărar', '200', 10, 'aperitive'),
(16, 'OMLETĂ ȚĂRĂNEASCĂ', 'ouă, ulei, sare, ceapă verde, ardei gras, cașcaval', '200', 13, 'aperitive'),
(17, 'ZACUSCĂ', 'vinete, fasole verde, roșii, ceapă, ardei capia, sare, ulei', '100', 7, 'aperitive'),
(18, 'CAȘCAVAL PANE', 'cașcaval, ou, făină, sare, ulei', '200', 16, 'aperitive'),
(19, 'SPANAC CU OU', 'spanac, ou, ulei, ceapă, sare, pastă de tomate', '300', 17, 'aperitive'),
(20, 'TOCĂNIȚĂ DE LEGUME', 'cartofi, dovlecei, ceapă, mazăre, morcovi, ulei, pastă de tomate, sare, usturoi', '250', 20, 'aperitive'),
(21, 'TOCANIȚĂ DE CIUPERCI', 'ciuperci, ulei, sare, ceapă, pastă de tomate', '250', 22, 'aperitive'),
(22, 'MĂMĂLIGĂ CU BRÂNZĂ ȘI SMÂNTÂNĂ', 'mălai, sare, brânză, smântână', '150 / 100 / 100', 16, 'aperitive'),
(23, 'MINI BURGER', 'chiflă, ketchup, maioneză, muștar, castraveți, roșii, brânză cheddar, carne de vită, piper, sare, zahăr, ulei', '200', 15, 'aperitive'),
(24, 'QUESADILLA', 'tortilla, piept de pui, cașcaval, ardei, pătrunjel, ulei, boia, oregano, porumb dulce, sare', '250', 17, 'aperitive'),
(25, 'PIEPT DE PUI', 'piept de pui, ulei, sare', '150', 11, 'gratar'),
(26, 'FICĂCIOR DE PUI', 'ficăcior de pui, unt, usturoi, ulei, busuioc, cimbru, sare', '150', 13, 'gratar'),
(27, 'PULPE DE PUI', 'pulpe de pui, sare, ulei, boia, cimbru, piper, rozmarin', '150', 12, 'gratar'),
(28, 'MICI', 'carne de oaie, carne de vită, usturoi, sare, piper, cimbru', '150', 14, 'gratar'),
(29, 'CÂRNAȚI DE CURCAN', 'carne de curcan, piper, usturoi, boia dulce, sare', '150', 17, 'gratar'),
(30, 'FICĂȚEI CU SOS', 'ficat de pui, ceapă, ardei, morcov, usturoi, roșii, ulei, boia, sare, pătrunjel', '250', 20, 'preparate pui'),
(31, 'FICĂȚEI CU LEGUME', 'ficat de pui, ceapă, morcov, ardei, ciuperci, pastă de roșii, ulei, sare, cimbru, piper', '250', 19, 'preparate pui'),
(32, 'ȘNIȚEL DE PUI', 'piept de pui, pesmet, făină, ouă, piper, ulei, sare', '250', 19, 'preparate pui'),
(33, 'ARIPIOARE DE PUI', 'aripioare de pui, ou, lapte, făină, usturoi, vegeta, sare', '250', 14, 'preparate pui'),
(34, 'PUI LIMONE', 'piept de pui, făină, ulei, unt, usturoi, piper, lămâie', '250', 17, 'preparate pui'),
(35, 'SALATĂ BULGĂREASCĂ', 'roșii, castraveți, ceapă, pătrunjel, ardei, brânză feta, măsline, șuncă, ou fiert, oțet, sare', '300', 15, 'salate aperitiv'),
(36, 'SALATĂ DE PUI', 'piept de pui, roșii, salată verde, ceapă, lămâie, ulei, coriandru, boia de ardei dulce, sare', '300', 18, 'salate aperitiv'),
(37, 'SALATĂ MIXTĂ', 'varză, roșii, ardei, castraveți, roșii', '300', 10, 'salate aperitiv'),
(38, 'SALATĂ DE VARĂ', 'roșii, castraveți, ulei, sare', '200', 10, 'salate'),
(39, 'SALATĂ DE MURĂTURI', 'castraveți, roșii, varză, gogoșar, sare', '200', 10, 'salate'),
(40, 'SALATĂ DE VARZĂ', 'varză, morcov, ulei, oțet, sare', '150', 11, 'salate'),
(41, 'SALATĂ DE ROȘII', 'roșii, ceapă, ulei, sare', '150', 13, 'salate'),
(42, 'SALATĂ DE SFECLĂ ROȘIE', 'sfeclă roșie, ulei, hrean, oțet, sare', '150', 12, 'salate'),
(43, 'SALATĂ DE TON', 'ton în ulei, salată verde, ceapă, ulei, sare', '300', 19, 'salate'),
(44, 'SALATĂ DE CEAPĂ ROȘIE', 'ceapă roșie, ulei, oțet, sare', '150', 7, 'salate'),
(45, 'TORTELINII', 'paste, șuncă, ciuperci, cașcaval', '350', 16, 'paste'),
(46, 'PASTE CU TON', 'paste, porumb dulce, ton în ulei de măsline, sare, piper, usturoi', '350', 22, 'paste'),
(47, 'PASTE PRIMĂVERA', 'paste, morcovi, dovlecei, ceapă, ardei, roșii, ierburi italiene, ulei, parmezan, sare, piper', '350', 18, 'paste'),
(48, 'PASTE CARBONARA', 'paste, parmezan, oua, guanciale, piper, ulei, sare', '350', 18, 'paste'),
(49, 'LASAGNA', 'carne de vită, roșii, ceapă, morcovi, ulei, cimbru, oregano, sare, bulion, unt, făină, foi lasagna, cașcaval, parmezan', '350', 22, 'paste'),
(50, 'CLĂTITE CU NUCĂ ȘI MIERE / DULCEAȚĂ', 'făină, lapte, oua, nuca și miere / dulceață', '300', 12, 'desert'),
(51, 'CLĂTITE CU FINETTI', 'făină, lapte, oua, finetti', '300', 12, 'desert'),
(52, 'PAPANAȘI', 'făină, ou, brânză, zahăr, smântână, griș, praf de copt, lămâie, dulceață', '250', 20, 'desert'),
(53, 'GĂLUȘTE DE PRUNE', 'cartofi, făină, zahăr, nucă, scorțișoară, prune / gem de prune', '250', 15, 'desert'),
(55, 'PRĂJITURĂ KINDER BUENO', 'ouă, zahăr, ulei, făină, pesmet, nuci, praf de copt, budincă de vanilie, lapte, cacao, unt, finetti, frișcă, biscuiți, ciocolată cu alune', '200', 12, 'desert');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `recenzii`
--

DROP TABLE IF EXISTS `recenzii`;
CREATE TABLE IF NOT EXISTS `recenzii` (
  `id_recenzie` int NOT NULL AUTO_INCREMENT,
  `id_utilizator` int NOT NULL,
  `nota_recenzie` int NOT NULL,
  `comentariu_recenzie` varchar(400) NOT NULL,
  `data_recenzie` datetime NOT NULL,
  PRIMARY KEY (`id_recenzie`),
  KEY `id_utilizator` (`id_utilizator`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `recenzii`
--

INSERT INTO `recenzii` (`id_recenzie`, `id_utilizator`, `nota_recenzie`, `comentariu_recenzie`, `data_recenzie`) VALUES
(10, 1, 9, 'Un loc foarte primitor cu un meniu variat. Mâncarea a fost gustoasă, iar porțiile generoase. Servirea a fost rapidă și atentă. Recomand!', '2025-01-15 14:08:01'),
(11, 2, 10, 'Personalul a fost amabil și ne-a făcut să ne simțim bine, iar ciorba de perisoare este excelentă!', '2025-01-11 23:59:41'),
(12, 3, 8, 'Locație drăguță și curată. Mâncarea a fost bună, dar ar putea îmbunătăți puțin timpul de așteptare. În rest, o experiență plăcută.', '2025-01-12 00:04:59'),
(13, 4, 8, 'Foarte bun raport calitate-preț. Supa de galuste și papanașii au fost favoritele mele. Ambianța rustică e cu adevărat atragatoare.', '2025-01-12 00:07:45'),
(14, 16, 9, 'Super, recomand!', '2025-01-12 00:10:30'),
(15, 19, 8, 'Excelent loc pentru o masă cu familia. Personalul foarte politicos, iar preparatele de casă au fost exact ce căutam. Recomand cu drag!', '2025-01-12 00:13:25');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `rezervari`
--

DROP TABLE IF EXISTS `rezervari`;
CREATE TABLE IF NOT EXISTS `rezervari` (
  `id_rezervare` int NOT NULL AUTO_INCREMENT,
  `id_utilizator` int NOT NULL,
  `numar_persoane` int NOT NULL,
  `data` date NOT NULL,
  `ora` time NOT NULL,
  `loc` enum('Restaurant','Terasă') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `telefon` varchar(12) NOT NULL,
  `comentarii` varchar(300) NOT NULL,
  PRIMARY KEY (`id_rezervare`),
  KEY `id_utilizator` (`id_utilizator`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `rezervari`
--

INSERT INTO `rezervari` (`id_rezervare`, `id_utilizator`, `numar_persoane`, `data`, `ora`, `loc`, `telefon`, `comentarii`) VALUES
(32, 1, 2, '2025-01-26', '11:45:00', 'Terasă', '0747232569', 'O masă lângă fereastră, dacă este posibil.'),
(33, 2, 7, '2025-02-02', '14:00:00', 'Restaurant', '0734263746', 'Dorim o masă mai retrasă pentru mai multă intimitate.'),
(34, 3, 4, '2025-01-29', '16:45:00', 'Restaurant', '0727365223', 'Avem nevoie să plecăm înainte de ora 18:00. Va multumim!'),
(35, 4, 10, '2025-02-07', '18:00:00', 'Restaurant', '0726374333', 'Avem nevoie de două scaune pentru copii.'),
(36, 16, 5, '2025-01-27', '13:15:00', 'Terasă', '0725376536', 'Nu dorim muzică tare în apropierea mesei noastre.'),
(37, 19, 15, '2025-02-10', '19:00:00', 'Restaurant', '0724565777', '');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `utilizatori`
--

DROP TABLE IF EXISTS `utilizatori`;
CREATE TABLE IF NOT EXISTS `utilizatori` (
  `id_utilizator` int NOT NULL AUTO_INCREMENT,
  `nume` varchar(40) NOT NULL,
  `prenume` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `parola` varchar(50) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `admin` set('da','nu') NOT NULL DEFAULT 'nu',
  PRIMARY KEY (`id_utilizator`)
) ENGINE=InnoDB AUTO_INCREMENT=703 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `utilizatori`
--

INSERT INTO `utilizatori` (`id_utilizator`, `nume`, `prenume`, `username`, `parola`, `email`, `admin`) VALUES
(1, 'Vasile', 'Andrei Daniel', 'vasileandrei23', 'andrei2025', 'andrei_v_daniel@yahoo.com', 'nu'),
(2, 'Negutu', 'Cristian', 'negutucristian23', 'cristian2025', 'negutucristian@yahoo.com', 'nu'),
(3, 'Trandafir', 'Mihai', 'trandafirmihai23', 'mihai2025', 'trandafirmihai@yahoo.com', 'nu'),
(4, 'Popescu', 'Alexandru', 'popescualexandru23', 'alexandru2025', 'popescualexandru@yahoo.com', 'nu'),
(15, 'Mihnea', 'Nitu', 'mihneanitu23', 'nitu2025', 'mihneanitu@yahoo.com', 'nu'),
(16, 'Ion', 'Marian', 'ionmarian23', 'marian2025', 'ionmarian@yahoo.com', 'nu'),
(18, 'Admin', 'Admin', 'poianabucatelor23', 'admin2025', 'poianabucatelor@yahoo.com', 'da'),
(19, 'Tănăsescu', 'Mircea', 'tanasescumircea23', 'mircea2025', 'tanasescumircea@yahoo.com', 'nu');

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `recenzii`
--
ALTER TABLE `recenzii`
  ADD CONSTRAINT `recenzii_ibfk_1` FOREIGN KEY (`id_utilizator`) REFERENCES `utilizatori` (`id_utilizator`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `rezervari`
--
ALTER TABLE `rezervari`
  ADD CONSTRAINT `rezervari_ibfk_1` FOREIGN KEY (`id_utilizator`) REFERENCES `utilizatori` (`id_utilizator`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

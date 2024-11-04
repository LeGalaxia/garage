-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 04 nov. 2024 à 04:37
-- Version du serveur : 10.11.6-MariaDB-0+deb12u1
-- Version de PHP : 8.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `garagemaxens_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id` int(11) NOT NULL,
  `identifiant` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id`, `identifiant`, `password`) VALUES
(5, 'Maxens', '$2y$10$Ru7uAKuAMMJewSJW01fnyOMhB6kEh8wry6vFi3sqxAyUPnnUhC7ym'),
(6, 'Ulrick', '$2y$10$fxUsiDHIlB9Xqgff4k1uUeB8H3DCEN1lKPQy9WgDCQzPRZApGTQy6');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `immatriculation` varchar(10) NOT NULL,
  `marque` varchar(100) NOT NULL,
  `modele` varchar(100) NOT NULL,
  `anneecircu` date NOT NULL,
  `prix` float NOT NULL,
  `rtrgarage` date NOT NULL,
  `cvfiscaux` int(11) NOT NULL,
  `description_vehic` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`immatriculation`, `marque`, `modele`, `anneecircu`, `prix`, `rtrgarage`, `cvfiscaux`, `description_vehic`) VALUES
('AA-001-AA', 'Peugeot', '208', '2018-03-15', 12000, '2022-06-01', 5, 'Voiture en bon état, faible kilométrage.'),
('AB-002-AB', 'Renault', 'Clio', '2015-06-21', 9500, '2020-03-18', 4, 'Voiture compacte, idéale pour la ville.'),
('AC-003-AC', 'BMW', 'X5', '2020-07-08', 45000, '2021-10-07', 10, 'SUV de luxe, puissant et confortable.'),
('AD-004-AD', 'Tesla', 'Model 3', '2021-02-18', 52000, '2023-01-12', 0, 'Véhicule électrique avec autonomie élevée.'),
('AE-005-AE', 'Ford', 'Fiesta', '2017-09-14', 8500, '2022-07-25', 4, 'Petite citadine, très économique en carburant.'),
('AF-006-AF', 'Audi', 'A4', '2019-11-30', 28000, '2021-09-22', 7, 'Berline haut de gamme, en excellent état.'),
('AG-007-AG', 'Mercedes', 'C-Class', '2022-01-25', 60000, '2023-03-14', 8, 'Nouvelle génération, nombreuses options.'),
('AH-008-AH', 'Nissan', 'Qashqai', '2016-05-06', 16000, '2019-11-03', 6, 'SUV compact, idéal pour la famille.'),
('AI-009-AI', 'Volkswagen', 'Golf', '2018-12-02', 22000, '2022-02-10', 5, 'Voiture polyvalente, fiable et moderne.'),
('AJ-010-AJ', 'Toyota', 'Corolla', '2017-04-12', 18500, '2021-04-19', 5, 'Compacte hybride, très économique.'),
('AK-011-AK', 'Honda', 'Civic', '2019-08-20', 24000, '2020-12-30', 6, 'Berline sportive avec beaucoup d\'options.'),
('AL-012-AL', 'Citroën', 'C3', '2016-03-11', 11500, '2021-08-11', 4, 'Citadine confortable et économique.'),
('AM-013-AM', 'Dacia', 'Duster', '2018-07-01', 17000, '2022-10-05', 6, 'SUV robuste à prix abordable.'),
('AN-014-AN', 'Opel', 'Astra', '2015-10-10', 9500, '2020-06-17', 5, 'Voiture compacte, idéale pour la ville.'),
('AO-015-AO', 'Jeep', 'Renegade', '2020-05-23', 26000, '2023-01-21', 7, 'Petit SUV, parfait pour les aventures en plein air.'),
('AP-016-AP', 'Alfa Romeo', 'Giulietta', '2017-06-15', 19500, '2021-11-19', 6, 'Berline sportive avec une touche italienne.'),
('AQ-017-AQ', 'Kia', 'Sportage', '2018-09-22', 23000, '2022-03-26', 7, 'SUV moderne et spacieux, idéal pour les familles.'),
('AR-018-AR', 'Hyundai', 'i20', '2019-01-17', 13000, '2021-09-29', 5, 'Petite citadine économique avec beaucoup d’options.'),
('AS-019-AS', 'Volvo', 'XC90', '2021-04-07', 58000, '2023-04-11', 10, 'SUV luxueux avec technologie de pointe.'),
('AT-020-AT', 'Skoda', 'Octavia', '2017-08-29', 14000, '2022-01-06', 6, 'Berline spacieuse et pratique.'),
('AU-021-AU', 'Mazda', 'CX-5', '2020-10-11', 32000, '2022-12-09', 8, 'SUV stylé, très agréable à conduire.'),
('AV-022-AV', 'Mini', 'Cooper', '2018-02-05', 25000, '2021-03-17', 5, 'Voiture compacte et chic avec un design unique.'),
('AW-023-AW', 'Subaru', 'Forester', '2021-06-14', 41000, '2023-01-27', 9, 'SUV tout-terrain avec une grande fiabilité.'),
('AX-024-AX', 'Mitsubishi', 'Outlander', '2016-11-03', 21000, '2021-04-08', 7, 'SUV hybride, idéal pour les longues distances.'),
('AY-025-AY', 'Porsche', '911', '2019-03-22', 105000, '2022-07-12', 12, 'Voiture de sport emblématique avec des performances exceptionnelles.'),
('AZ-026-AZ', 'Ferrari', '488 GTB', '2020-12-12', 230000, '2023-03-04', 15, 'Supercar italienne avec des performances incroyables.'),
('BA-027-BA', 'Lamborghini', 'Urus', '2021-07-04', 250000, '2023-05-16', 16, 'SUV de luxe très puissant, parfait pour les sensations fortes.'),
('BB-028-BB', 'Jaguar', 'F-Type', '2018-05-10', 78000, '2021-10-22', 11, 'Voiture sportive au design élégant.'),
('BC-029-BC', 'Maserati', 'Ghibli', '2017-02-19', 65000, '2021-07-01', 12, 'Berline italienne avec des performances de luxe.'),
('BD-030-BD', 'Lexus', 'RX450h', '2020-09-15', 70000, '2022-09-20', 9, 'SUV hybride de luxe avec technologie avancée.'),
('BE-031-BE', 'Infiniti', 'QX50', '2019-11-05', 55000, '2021-11-11', 8, 'SUV premium avec un intérieur raffiné.'),
('BF-032-BF', 'Chevrolet', 'Camaro', '2017-07-08', 43000, '2020-08-03', 10, 'Muscle car américaine avec des performances puissantes.'),
('BG-033-BG', 'Dodge', 'Charger', '2016-04-28', 38000, '2019-05-18', 10, 'Berline musclée au style affirmé.'),
('BH-034-BH', 'Ford', 'Mustang', '2021-02-24', 55000, '2023-04-01', 12, 'Voiture iconique avec un moteur puissant.'),
('BI-035-BI', 'Tesla', 'Model S', '2019-08-09', 90000, '2022-03-22', 0, 'Berline électrique avec des performances impressionnantes.'),
('BJ-036-BJ', 'Peugeot', '3008', '2018-06-18', 26000, '2021-06-20', 6, 'SUV compact avec une bonne économie de carburant.'),
('BK-037-BK', 'Renault', 'Talisman', '2016-10-07', 18000, '2021-02-08', 7, 'Berline spacieuse avec beaucoup de confort.'),
('BL-038-BL', 'Volkswagen', 'Tiguan', '2020-01-11', 34000, '2023-01-11', 7, 'SUV familial avec beaucoup de fonctionnalités.'),
('BM-039-BM', 'Toyota', 'RAV4', '2021-03-19', 40000, '2023-06-15', 8, 'SUV hybride fiable et économique.'),
('BN-040-BN', 'Nissan', 'Leaf', '2019-06-25', 30000, '2022-09-27', 0, 'Voiture électrique avec une grande autonomie.'),
('BO-041-BO', 'Hyundai', 'Kona', '2020-05-30', 27000, '2023-02-17', 6, 'SUV compact et moderne avec une bonne maniabilité.'),
('BP-042-BP', 'Kia', 'Soul EV', '2021-11-27', 37000, '2023-09-04', 0, 'SUV électrique avec un design original.'),
('BQ-043-BQ', 'Honda', 'HR-V', '2019-12-21', 23000, '2022-11-09', 6, 'Petit SUV polyvalent et fiable.'),
('BR-044-BR', 'Mazda', 'MX-5', '2018-08-13', 28000, '2021-12-07', 6, 'Voiture sportive cabriolet très populaire.'),
('BS-045-BS', 'Mercedes', 'GLC', '2020-10-19', 52000, '2023-04-27', 8, 'SUV premium avec des performances exceptionnelles.'),
('BT-046-BT', 'BMW', 'Serie 5', '2019-05-15', 58000, '2022-05-19', 9, 'Berline de luxe avec des technologies avancées.'),
('BU-047-BU', 'Audi', 'Q5', '2021-06-09', 57000, '2023-02-28', 8, 'SUV familial avec un intérieur haut de gamme.'),
('BV-048-BV', 'Volvo', 'S60', '2018-09-01', 45000, '2021-09-12', 8, 'Berline de luxe avec des équipements de sécurité avancés.'),
('BW-049-BW', 'Porsche', 'Cayenne', '2021-12-30', 105000, '2023-07-14', 12, 'SUV haut de gamme avec des performances de sport.'),
('BX-050-BX', 'Tesla', 'Model X', '2020-07-07', 120000, '2023-05-25', 0, 'SUV électrique avec portes en ailes de faucon.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`immatriculation`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

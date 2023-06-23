-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2022 at 04:24 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone
= "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekreativni_tenis`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category`
(
  `id` int
(11) NOT NULL,
  `name` varchar
(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`
id`,
`name
`) VALUES
(1, 'kategorija 1'),
(2, 'kategorija 2');

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE `club`
(
  `id` int
(11) NOT NULL,
  `name` varchar
(200) NOT NULL,
  `image_url` varchar
(200) NOT NULL,
  `description` varchar
(220) DEFAULT NULL,
  `Ban` tinyint
(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`
id`,
`name
`, `image_url`, `description`, `Ban`) VALUES
(1, 'Teniski Klub Cacak', 'dsadsa', 'dsadasd', 0),
(2, 'Masinac', 'dsadsa', 'dsadsa', 0),
(5, 'Proba2', 'http://localhost/Projekat2/admin/Igraci/DodajIgraca.php', 'ccccccc', 1),
(6, 'Mladost', 'http://localhost/Projekat2/admin/Igraci/DodajIgraca.php', 'dsadas', 0),
(7, 'Play', 'http://localhost/Projekat2/admin/Igraci/DodajIgraca.php', 'aaa', 0),
(8, 'Teniski Klub Cacak', 'http://localhost/Projekat2/admin/Igraci/DodajIgraca.php', 'asdasdsa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `court`
--

CREATE TABLE `court`
(
  `id` int
(11) NOT NULL,
  `type` varchar
(50) NOT NULL,
  `image_url` varchar
(250) NOT NULL,
  `description` int
(11) DEFAULT NULL,
  `club_id` int
(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `court`
--

INSERT INTO `court` (`
id`,
`type
`, `image_url`, `description`, `club_id`) VALUES
(0, 'Sljaka Balon', 'dsadsadascxzcxzc', 5, 8),
(1, 'Trava', 'Slika', 2, 2),
(2, 'Trava', 'http://localhost/Projekat2/admin/Igraci/DodajIgraca.php', 0, 7),
(3, 'Parket', 'http://localhost/Projekat2/admin/Igraci/DodajIgraca.php', 0, 6),
(4, 'Sljaka Balon', 'http://localhost/Projekat2/admin/Igraci/DodajIgraca.php', 0, 6),
(10, 'Proba1', 'http://localhost/Projekat2/admin/Igraci/DodajIgraca.php', 1234, 1);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment`
(
  `id` int
(11) NOT NULL,
  `name` varchar
(100) NOT NULL,
  `type` varchar
(100) NOT NULL,
  `description` varchar
(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `equipment_per_player`
--

CREATE TABLE `equipment_per_player`
(
  `equipment_id` int
(11) NOT NULL,
  `player_id` int
(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favorite_clubs_per_user`
--

CREATE TABLE `favorite_clubs_per_user`
(
  `user_id` int
(11) NOT NULL,
  `club_id` int
(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favorite_players_per_user`
--

CREATE TABLE `favorite_players_per_user`
(
  `user_id` int
(11) NOT NULL,
  `player_id` int
(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches`
(
  `id` int
(11) NOT NULL,
  `match_date` date NOT NULL,
  `match_time` varchar
(100) NOT NULL,
  `match_type` varchar
(100) NOT NULL,
  `winner` varchar
(100) NOT NULL,
  `court_id` int
(11) NOT NULL,
  `player1_id` int
(11) NOT NULL,
  `player2_id` int
(11) NOT NULL,
  `match_status` int
(11) NOT NULL,
  `rezultat` varchar
(100) DEFAULT NULL,
  `category` int
(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`
id`,
`match_date`,
`match_time
`, `match_type`, `winner`, `court_id`, `player1_id`, `player2_id`, `match_status`, `rezultat`, `category`) VALUES
(3, '2022-06-20', '15h', 'rekreativni', 'Darko', 3, 3, 4, 1, '6:1\r\n3:6\r\n6:2', 2),
(8, '2022-07-05', '08h 15min', 'rekreativni', 'Ivana', 2, 4, 3, 1, '7:5 7:5 6:3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `match_status`
--

CREATE TABLE `match_status`
(
  `id` int
(11) NOT NULL,
  `status` varchar
(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `match_status`
--

INSERT INTO `match_status` (`
id`,
`status
`) VALUES
(1, 'odigran'),
(2, 'u toku');

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player`
(
  `id` int
(11) NOT NULL,
  `name` varchar
(100) NOT NULL,
  `matches_lost` int
(11) NOT NULL,
  `matches_won` int
(11) NOT NULL,
  `surname` varchar
(50) NOT NULL,
  `gender` varchar
(10) NOT NULL,
  `image_url` varchar
(250) NOT NULL,
  `club_id` int
(11) NOT NULL,
  `Ban` tinyint
(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`
id`,
`name
`, `matches_lost`, `matches_won`, `surname`, `gender`, `image_url`, `club_id`, `Ban`) VALUES
(2, 'Proba', 5, 10, 'Ivanovic', 'muski', 'dsadasdas', 1, 0),
(3, 'Darko', 2, 3, 'Marinkovic', 'Muski', 'http://localhost/Projekat2/admin/Igraci/DodajIgraca.php', 2, 0),
(4, 'Ivana', 4, 3, 'Markovic', 'Zenski', 'http://localhost/Projekat2/admin/Igraci/DodajIgraca.php', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

CREATE TABLE `tournament`
(
  `id` int
(11) NOT NULL,
  `tournament_date` date NOT NULL,
  `tournament_time` varchar
(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tournament_match`
--

CREATE TABLE `tournament_match`
(
  `match_id` int
(11) NOT NULL,
  `tournament_id` int
(11) NOT NULL,
  `phase` varchar
(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users`
(
  `id` int
(11) NOT NULL,
  `username` varchar
(100) NOT NULL,
  `email` varchar
(255) DEFAULT NULL,
  `pwd` varchar
(100) NOT NULL,
  `user_type` int
(11) NOT NULL,
  `phone` varchar
(50) NOT NULL,
  `adress` varchar
(50) NOT NULL,
  `vkey` varchar
(40) NOT NULL,
  `verifikacija` tinyint
(1) NOT NULL DEFAULT 0,
  `datumKreiranja` timestamp
(6) NOT NULL DEFAULT current_timestamp
(6),
  `Ban` tinyint
(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`
id`,
`username`,
`email
`, `pwd`, `user_type`, `phone`, `adress`, `vkey`, `verifikacija`, `datumKreiranja`, `Ban`) VALUES
(11, 'Rade Petrovic', 'rade1210@gmail.com', '202cb962ac59075b964b07152d234b70', 2, '061555666', 'Svetog Save', 'fdsfsdfsdfs', 0, '2022-06-27 13:15:04.094261', 0),
(12, 'Rade Petrovic', 'bla@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '2424242424', 'sadasdas', 'fdhdfhdfhfd', 0, '2022-06-27 13:15:04.094261', 0),
(49, 'Proba1', 'proba1@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '321', 'asd', '1a51c7efa2a7db97c07bf8ca4b8b2823', 0, '2022-06-27 18:48:02.051548', 0),
(61, 'Proba3', 'proba3@gmail.com', '202cb962ac59075b964b07152d234b70', 2, '54353', 'dsadsa', 'f6e0859da455faa63c5b6b4f5324dbb3', 0, '2022-06-29 10:49:03.548371', 0),
(63, 'Proba4', 'proba4@gmail.com', '202cb962ac59075b964b07152d234b70', 2, '321321321', 'asdadsa', '14f63cbec3c08f41a61ae59a90755039', 0, '2022-06-30 21:40:04.764802', 0),
(80, 'Proba11', 'proba10@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '321312', 'dsadsadsa', '', 0, '2022-07-02 22:54:03.438658', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type`
(
  `type_id` int
(11) NOT NULL,
  `type_name` varchar
(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`
type_id`,
`type_name
`) VALUES
(1, 'Regularni korisnik'),
(2, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `club`
--
ALTER TABLE `club`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `court`
--
ALTER TABLE `court`
ADD PRIMARY KEY
(`id`),
ADD KEY `club_id`
(`club_id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `equipment_per_player`
--
ALTER TABLE `equipment_per_player`
ADD PRIMARY KEY
(`equipment_id`,`player_id`),
ADD KEY `player_id`
(`player_id`);

--
-- Indexes for table `favorite_clubs_per_user`
--
ALTER TABLE `favorite_clubs_per_user`
ADD PRIMARY KEY
(`user_id`,`club_id`),
ADD KEY `club_id`
(`club_id`);

--
-- Indexes for table `favorite_players_per_user`
--
ALTER TABLE `favorite_players_per_user`
ADD PRIMARY KEY
(`user_id`,`player_id`),
ADD KEY `player_id`
(`player_id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
ADD PRIMARY KEY
(`id`),
ADD KEY `court_id`
(`court_id`,`player1_id`,`player2_id`,`match_status`,`category`),
ADD KEY `player1_id`
(`player1_id`),
ADD KEY `player2_id`
(`player2_id`),
ADD KEY `category`
(`category`),
ADD KEY `match_status`
(`match_status`);

--
-- Indexes for table `match_status`
--
ALTER TABLE `match_status`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
ADD PRIMARY KEY
(`id`),
ADD KEY `club_id`
(`club_id`);

--
-- Indexes for table `tournament`
--
ALTER TABLE `tournament`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `tournament_match`
--
ALTER TABLE `tournament_match`
ADD PRIMARY KEY
(`match_id`,`tournament_id`),
ADD KEY `match_id`
(`match_id`,`tournament_id`),
ADD KEY `tournament_id`
(`tournament_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY
(`id`),
ADD KEY `user_type`
(`user_type`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
ADD PRIMARY KEY
(`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `club`
--
ALTER TABLE `club`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `match_status`
--
ALTER TABLE `match_status`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tournament`
--
ALTER TABLE `tournament`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `type_id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `court`
--
ALTER TABLE `court`
ADD CONSTRAINT `court_ibfk_1` FOREIGN KEY
(`club_id`) REFERENCES `club`
(`id`) ON
DELETE CASCADE ON
UPDATE CASCADE;

--
-- Constraints for table `equipment_per_player`
--
ALTER TABLE `equipment_per_player`
ADD CONSTRAINT `equipment_per_player_ibfk_1` FOREIGN KEY
(`player_id`) REFERENCES `player`
(`id`) ON
DELETE CASCADE ON
UPDATE CASCADE,
ADD CONSTRAINT `equipment_per_player_ibfk_2` FOREIGN KEY
(`equipment_id`) REFERENCES `equipment`
(`id`) ON
DELETE CASCADE ON
UPDATE CASCADE;

--
-- Constraints for table `favorite_clubs_per_user`
--
ALTER TABLE `favorite_clubs_per_user`
ADD CONSTRAINT `favorite_clubs_per_user_ibfk_1` FOREIGN KEY
(`club_id`) REFERENCES `club`
(`id`) ON
DELETE CASCADE ON
UPDATE CASCADE,
ADD CONSTRAINT `favorite_clubs_per_user_ibfk_2` FOREIGN KEY
(`user_id`) REFERENCES `users`
(`id`) ON
DELETE CASCADE ON
UPDATE CASCADE;

--
-- Constraints for table `favorite_players_per_user`
--
ALTER TABLE `favorite_players_per_user`
ADD CONSTRAINT `favorite_players_per_user_ibfk_1` FOREIGN KEY
(`user_id`) REFERENCES `users`
(`id`) ON
DELETE CASCADE ON
UPDATE CASCADE,
ADD CONSTRAINT `favorite_players_per_user_ibfk_2` FOREIGN KEY
(`player_id`) REFERENCES `player`
(`id`) ON
DELETE CASCADE ON
UPDATE CASCADE;

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY
(`player1_id`) REFERENCES `player`
(`id`) ON
DELETE CASCADE ON
UPDATE CASCADE,
ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY
(`player2_id`) REFERENCES `player`
(`id`) ON
DELETE CASCADE ON
UPDATE CASCADE,
ADD CONSTRAINT `matches_ibfk_3` FOREIGN KEY
(`category`) REFERENCES `category`
(`id`) ON
DELETE CASCADE ON
UPDATE CASCADE,
ADD CONSTRAINT `matches_ibfk_4` FOREIGN KEY
(`match_status`) REFERENCES `match_status`
(`id`) ON
DELETE CASCADE ON
UPDATE CASCADE,
ADD CONSTRAINT `matches_ibfk_5` FOREIGN KEY
(`court_id`) REFERENCES `court`
(`id`) ON
DELETE CASCADE ON
UPDATE CASCADE;

--
-- Constraints for table `player`
--
ALTER TABLE `player`
ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY
(`club_id`) REFERENCES `club`
(`id`) ON
DELETE CASCADE ON
UPDATE CASCADE;

--
-- Constraints for table `tournament_match`
--
ALTER TABLE `tournament_match`
ADD CONSTRAINT `tournament_match_ibfk_1` FOREIGN KEY
(`match_id`) REFERENCES `matches`
(`id`) ON
DELETE CASCADE ON
UPDATE CASCADE,
ADD CONSTRAINT `tournament_match_ibfk_2` FOREIGN KEY
(`tournament_id`) REFERENCES `tournament`
(`id`) ON
DELETE CASCADE ON
UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY
(`user_type`) REFERENCES `user_type`
(`type_id`) ON
DELETE CASCADE ON
UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

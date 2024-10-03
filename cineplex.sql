-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 10, 2024 at 12:40 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cineplex`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `movie_name` varchar(255) DEFAULT NULL,
  `selected_time` varchar(255) DEFAULT NULL,
  `selected_seats` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logininfo`
--

CREATE TABLE `logininfo` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logininfo`
--

INSERT INTO `logininfo` (`username`, `password`) VALUES
('user', 'user'),
('user2', '12345678'),
('user3', '12345678'),
('user3', '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `link` varchar(2000) NOT NULL,
  `time1` varchar(60) NOT NULL DEFAULT 'none',
  `time2` varchar(60) NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`name`, `description`, `image`, `link`, `time1`, `time2`) VALUES
('Damsel', 'A dutiful damsel agrees to marry a handsome prince, only to find the royal family has recruited her as a sacrifice to repay an ancient debt.', 'https://image.tmdb.org/t/p/original/sMp34cNKjIb18UBOCoAv4DpCxwY.jpg', 'https://www.imdb.com/title/tt13452446/', 'Saturday: 2:30 PM - 4:30 PM', 'Sunday: 6:30 PM - 8:30 PM'),
('Spaceman', 'Half a year into his solo mission on the edge of the solar system, an astronaut concerned with the state of his life back on Earth is helped by an ancient creature he discovers in the bowels of his ship.', 'https://m.media-amazon.com/images/M/MV5BMGMyNDg2ZjItMzk5MC00NzJmLTlmMDgtMmFjNjFmODg5ZTY5XkEyXkFqcGdeQXVyMTY3ODkyNDkz._V1_.jpg', 'https://www.imdb.com/title/tt11097384/', 'Wednesday: 8:30 AM - 10:30 AM', 'Saturday: 10:00 AM - 12:00 PM'),
('Code 8 Part 2', 'Follows a girl fighting to get justice for her slain brother by corrupt police officers. She enlists the help of an ex-con and his former partner.', 'https://resizing.flixster.com/-XZAfHZM39UwaGJIFWKAE8fS0ak=/v3/t/assets/p17573367_p_v13_ac.jpg', 'https://www.imdb.com/title/tt14764464/', 'Tuesday: 8:00 AM - 10:00 AM', 'Wednesday: 12:00 PM - 2:00 PM'),
('Lisa Frankenstein', 'A coming of RAGE love story about a teenager and her crush, who happens to be a corpse. After a set of horrific circumstances bring him back to life, the two embark on a journey to find love, happiness – and a few missing body parts.', 'https://m.media-amazon.com/images/M/MV5BNjJkZDExMGQtNGE2YS00YzJiLWJiNjEtNmYwZjIxZGMxNTZiXkEyXkFqcGdeQXVyMjkwOTAyMDU@._V1_FMjpg_UX1000_.jpg', 'https://www.imdb.com/title/tt21188080/', 'Wednesday: 9:00 AM - 11:00 AM', 'Friday: 4:00 PM - 6:00 PM'),
('Imaginary', 'A woman returns to her childhood home to discover that the imaginary friend she left behind is very real and unhappy that she abandoned him.', 'https://m.media-amazon.com/images/M/MV5BODIzOTJiODUtNzM2MC00YjdjLTg5YTktZWZhNjY1N2I5NWRjXkEyXkFqcGdeQXVyMjY5ODI4NDk@._V1_.jpg', 'https://www.imdb.com/title/tt26658104/', 'Monday: 6:00 PM - 8:00 PM', 'Thursday: 2:00 PM - 4:00 PM'),
('Ricky Stanicky', 'When three childhood best friends pull a prank that goes wrong, they invent the imaginary Ricky Stanicky to get them out of trouble. Twenty years later, they still use the nonexistent Ricky as a handy alibi for their immature beha…', 'https://m.media-amazon.com/images/M/MV5BOTMyYjg2NzMtNmQzZS00YzMxLTkzNDItMTIwODJhZDI1MmY5XkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_FMjpg_UX1000_.jpg', 'https://www.imdb.com/title/tt1660648/', 'Thursday: 4:00 PM - 6:00 PM', 'Tuesday: 1:30 PM - 3:30 PM'),
('Kathuru Mithuru', 'Kathuru Mithuru directed by Giriraj Kaushalya tells the tale of a friendship developed between a tailor and barber over a common tool.', 'https://m.media-amazon.com/images/M/MV5BY2Y3YTkxMDEtNDNmMS00MGFlLThlNjItYTFmN2ExYWRmZWUwXkEyXkFqcGdeQXVyNDMwOTc5MDg@._V1_.jpg', 'https://www.imdb.com/title/tt9712136/', 'Saturday: 2:30 PM - 4:30 PM', 'Sunday: 7:00 PM - 9:00 PM'),
('Midunu Vishwaya', 'Warenya encounters Sumadya, a student capable of entering a deep hypnotic trance. Sumadya becomes a conduit for Rajini, a famous actress from the past, leading to complications as their love blossoms across two lives and two ages', 'https://m.media-amazon.com/images/M/MV5BODg1YzQ2NDYtMzdhZS00N2U4LTg0YjQtNTk2OWQ2OWQ3ZDFiXkEyXkFqcGdeQXVyNDMwOTc5MDg@._V1_.jpg', 'https://www.imdb.com/title/tt11412130/', 'Friday: 10:30 AM - 12:30 PM', 'Wednesday: 12:00 PM - 2:00 PM'),
('Dune: Part Two', 'Paul Atreides unites with Chani and the Fremen while seeking revenge against the conspirators who destroyed his family.', 'https://m.media-amazon.com/images/M/MV5BN2QyZGU4ZDctOWMzMy00NTc5LThlOGQtODhmNDI1NmY5YzAwXkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_.jpg', 'https://www.imdb.com/title/tt15239678/', 'Saturday: 3:00 PM - 5:00 PM', 'Sunday: 6:00 PM - 8:00 PM'),
('Lift', 'Follows a master thief and his Interpol Agent ex-girlfriend who team up to steal $500 million in gold bullion being transported on an A380 passenger flight.', 'https://m.media-amazon.com/images/M/MV5BNTBlNmEwNzQtZTc5MC00YmVjLTk5NjgtMmM0NDFmZjJkZjYzXkEyXkFqcGdeQXVyNTE1NjY5Mg@@._V1_UY1200_CR90,0,630,1200_AL_.jpg', 'https://www.imdb.com/title/tt14371878/?ref_=ttmi_tt', 'Tuesday: 2:30 PM - 4:30 PM', 'Friday: 3:00 PM - 5:00 PM'),
('Badland Hunters', 'When an earthquake turns Seoul into a lawless badland, a fearless huntsman goes on to rescue a teenager from a mad doctor who held the teenager captive in a camp full of dangerous cultists.', 'https://m.media-amazon.com/images/M/MV5BYTNiYmEyNmMtMzI4OS00OWEyLTg2N2EtNTE1YzgxZmNiOTA4XkEyXkFqcGdeQXVyMTEzMTI1Mjk3._V1_FMjpg_UX1000_.jpg', 'https://www.imdb.com/title/tt29722855/', 'Tuesday: 4:30 PM - 6:30 PM', 'Sunday: 7:00 PM - 9:00 PM'),
('Orion and the Dark', 'A boy with an active imagination faces his fears on an unforgettable journey through the night with his new friend: a giant, smiling creature named Dark.', 'https://m.media-amazon.com/images/M/MV5BZTkyODExOTctY2E3My00M2U5LWI2OGItNzRlZDk1OWJmOWQ3XkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_FMjpg_UX1000_.jpg', 'https://www.imdb.com/title/tt28066777/', 'Thursday: 1:00 PM - 3:00 PM', 'Wednesday: 12:30 PM - 2:30 PM');

-- --------------------------------------------------------

--
-- Table structure for table `moviesuggetions`
--

CREATE TABLE `moviesuggetions` (
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `link` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moviesuggetions`
--

INSERT INTO `moviesuggetions` (`name`, `description`, `image`, `link`) VALUES
('The Garfield Movie', 'Garfield is about to go on a wild outdoor adventure. After an unexpected reunion with his long-lost father - the cat Vic - Garfield and Odie are forced to abandon their pampered life to join Vic in a hilarious, high-stakes heist.', 'https://m.media-amazon.com/images/M/MV5BNzk4ODdiOTEtMTk3YS00MzZmLTgyOWMtYzc1NjgxYWE2MmMyXkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_.jpg', 'https://www.imdb.com/title/tt5779228/'),
('Borderlands', 'The popular video game set on the abandoned fictional planet of Pandora where people search for a mysterious relic.', 'https://m.media-amazon.com/images/M/MV5BOWZmOTM5YmMtNjliMi00OGRkLWIwNGUtNDI2NTE3NzZmMDdmXkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_FMjpg_UX1000_.jpg', 'https://www.imdb.com/title/tt4978420/'),
('Bastar', 'Based on the real-life incidents of Naxals in Chattisgarh - The Bastar rebellion broke out in 1910 in present day Chattisgarh.', 'https://m.media-amazon.com/images/M/MV5BM2NkYzU5ZjYtM2U1My00MTFjLTkzZGYtODM3MzQyM2RjNjQzXkEyXkFqcGdeQXVyOTI3MzI4MzA@._V1_FMjpg_UX1000_.jpg', 'https://www.imdb.com/title/tt28221135/'),
('Mickey 17', 'To stop his substitute clone Mickey8 from supplanting him, Mickey7, an expendable robot, is dispatched to an icy planet to settle it.', 'https://m.media-amazon.com/images/M/MV5BYTBjYTY3NWYtMjM2MS00ZDQ5LWFlZmMtYThhNjg2Mjk0Y2YzXkEyXkFqcGdeQXVyMTU5Njc1OTUw._V1_FMjpg_UX1000_.jpg', 'https://www.imdb.com/title/tt12299608/'),
('Inside Out 2', 'Follow Riley, in her teenage years, encountering new emotions.', 'https://m.media-amazon.com/images/M/MV5BYTc1MDQ3NjAtOWEzMi00YzE1LWI2OWUtNjQ0OWJkMzI3MDhmXkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_FMjpg_UX1000_.jpg', 'https://www.imdb.com/title/tt22022452/'),
('deadpool 3', 'Wolverine is recovering from his injuries when he crosses paths with the loudmouth, Deadpool. They team up to defeat a common enemy.', 'https://posterspy.com/wp-content/uploads/2022/10/DEADPOOL-3-POSTER-min.jpg', 'https://www.imdb.com/title/tt6263850/');

-- --------------------------------------------------------

--
-- Table structure for table `sliderimages`
--

CREATE TABLE `sliderimages` (
  `href` varchar(2000) NOT NULL,
  `img_src` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sliderimages`
--

INSERT INTO `sliderimages` (`href`, `img_src`) VALUES
('https://www.imdb.com/title/tt6263850/', 'https://i.ebayimg.com/images/g/Gv8AAOSwyLRk6vKS/s-l1200.webp'),
('https://www.imdb.com/title/tt1630029/', 'https://m.media-amazon.com/images/M/MV5BYjhiNjBlODctY2ZiOC00YjVlLWFlNzAtNTVhNzM1YjI1NzMxXkEyXkFqcGdeQXVyMjQxNTE1MDA@._V1_.jpg'),
('https://www.imdb.com/title/tt0081353/', 'https://i.pinimg.com/originals/42/68/18/42681885e67d7ec22f5f1bacda723b41.webp'),
('https://www.imdb.com/title/tt22022452/', 'https://m.media-amazon.com/images/M/MV5BYTc1MDQ3NjAtOWEzMi00YzE1LWI2OWUtNjQ0OWJkMzI3MDhmXkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_FMjpg_UX1000_.jpg'),
('https://www.imdb.com/title/tt4900148/', 'https://upload.wikimedia.org/wikipedia/en/5/58/Elio_film_poster.jpeg'),
('https://www.imdb.com/title/tt9712136/', 'https://m.media-amazon.com/images/M/MV5BY2Y3YTkxMDEtNDNmMS00MGFlLThlNjItYTFmN2ExYWRmZWUwXkEyXkFqcGdeQXVyNDMwOTc5MDg@._V1_.jpg'),
('https://www.imdb.com/title/tt15457802/', 'https://m.media-amazon.com/images/M/MV5BNGJhNDc3NTUtNDQ5NS00OGQzLThjNDYtMjRiYzA4NTNkYjhkXkEyXkFqcGdeQXVyMTY3ODkyNDkz._V1_.jpg'),
('https://www.imdb.com/title/tt1001520/', 'https://m.media-amazon.com/images/M/MV5BOTljMzRkNDItNjYxYS00ODA4LThiZjYtMjI0MTFjODlmMGJmXkEyXkFqcGdeQXVyNzU0NzQxNTE@._V1_FMjpg_UX1000_.jpg'),
('https://www.imdb.com/title/tt26658104/', 'https://m.media-amazon.com/images/M/MV5BODIzOTJiODUtNzM2MC00YjdjLTg5YTktZWZhNjY1N2I5NWRjXkEyXkFqcGdeQXVyMjY5ODI4NDk@._V1_.jpg'),
('https://www.imdb.com/title/tt30215084/', 'https://m.media-amazon.com/images/M/MV5BMTc0MWU2MmUtY2I3OC00N2MwLTkyNTktOWJkNjYwY2RjYjcwXkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_.jpg'),
('https://www.imdb.com/title/tt21909764/', 'https://m.media-amazon.com/images/M/MV5BYTRmMWQxZGEtZTZiMS00ZTRiLWIyYmMtMzNmMmRjZjYyNGUyXkEyXkFqcGdeQXVyMTUzOTcyODA5._V1_.jpg'),
('https://www.imdb.com/title/tt0163651/', 'https://cms.giggster.com/guide/directus/assets/d95a2762-7a48-4139-a5a8-6ba8b1f66398?fit=cover&width=400&quality=80'),
('https://www.imdb.com/title/tt10886166/', 'https://m.media-amazon.com/images/M/MV5BOTZhMDA2NjgtNGZiMC00NTE1LTk2NjctMWI3ZmZkMjQ1NGVmXkEyXkFqcGdeQXVyMTE5NDQ1MzQ3._V1_.jpg'),
('https://www.imdb.com/title/tt15341442/', 'https://m.media-amazon.com/images/M/MV5BZjgzMjJkZTYtMDc0YS00ZTkyLTliZGMtZTZhNDM3MjZhN2YwXkEyXkFqcGdeQXVyMTMxNjUyMDkx._V1_.jpg'),
('https://www.imdb.com/title/tt28066777/', 'https://m.media-amazon.com/images/M/MV5BZTkyODExOTctY2E3My00M2U5LWI2OGItNzRlZDk1OWJmOWQ3XkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_FMjpg_UX1000_.jpg'),
('https://www.imdb.com/title/tt1700841/', 'https://m.media-amazon.com/images/M/MV5BMjkxOTk1MzY4MF5BMl5BanBnXkFtZTgwODQzOTU5ODE@._V1_FMjpg_UX1000_.jpg'),
('https://www.imdb.com/title/tt21807222/', 'https://m.media-amazon.com/images/M/MV5BODVhNDMyNDctNjg0Yi00ZDFlLThjMzctNzZmMTE2ZmE2YzBlXkEyXkFqcGdeQXVyMTY3ODkyNDkz._V1_.jpg'),
('https://www.imdb.com/title/tt15398776/', 'https://m.media-amazon.com/images/M/MV5BMDBmYTZjNjUtN2M1MS00MTQ2LTk2ODgtNzc2M2QyZGE5NTVjXkEyXkFqcGdeQXVyNzAwMjU2MTY@._V1_.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD KEY `time` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

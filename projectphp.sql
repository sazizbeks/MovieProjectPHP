-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2020 at 12:32 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectphp`
--
CREATE DATABASE IF NOT EXISTS `projectphp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `projectphp`;

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `fname`, `lname`) VALUES
(1, 'Chris', 'Evans'),
(2, 'Robert', 'Downey Jr.'),
(3, 'Jennifer', 'Lawrence'),
(4, 'Channing', 'Tatum'),
(5, 'Johnny', 'Depp'),
(6, 'Margot', 'Robbie'),
(7, 'Jared', 'Leto'),
(8, 'Ryan', 'Reynolds'),
(9, 'Scarlett', 'Johansson'),
(10, 'Brad', 'Pitt'),
(11, 'Will', 'Smith'),
(12, 'Paul', 'Rudd'),
(13, 'Ben', 'Affleck'),
(14, 'Mattew', 'Mcconaughey'),
(15, 'Tom', 'Hardy'),
(16, 'Dwayne', 'Johnson'),
(17, 'Tom', 'Hiddleston'),
(18, 'Jamie', 'Foxx'),
(19, 'Chris', 'Hemsworth'),
(20, 'Tom', 'Holland'),
(21, 'Vin', 'Disel'),
(22, 'Eiza', 'González'),
(23, 'Sam', 'Heughan'),
(24, 'Toby', 'Kebbell'),
(25, 'Talulah', 'Riley'),
(26, 'Lamorne', 'Morris'),
(27, 'Guy', 'Pearce'),
(28, 'Yifei', 'Liu'),
(29, 'Donnie', 'Yen'),
(30, 'Li', 'Gong'),
(31, 'Jet', 'Li'),
(32, '	Jason Scott', 'Lee'),
(33, 'Yoson', 'An'),
(34, 'Frank', 'Welker'),
(35, 'Will', 'Forte'),
(36, 'Zac', 'Efron'),
(37, 'Gina', 'Rodriguez'),
(38, 'Amanda', 'Seyfried'),
(39, 'Emily', 'Blunt'),
(40, 'Millicent', 'Simmonds'),
(41, 'Cillian', 'Murphy'),
(42, 'Noah', 'Jupe'),
(43, 'John', 'Krasinski'),
(44, 'Mark', 'Ruffalo'),
(45, 'Jeremy', 'Renner'),
(46, 'Don', ' Cheadle'),
(47, 'Benedict', 'Cumberbatch'),
(48, 'Chadwick', 'Boseman'),
(49, 'Brie', 'Larson'),
(50, 'Karen', 'Gillan'),
(51, 'Zoe', 'Saldana'),
(52, 'Evangeline', 'Lilly'),
(53, 'Samuel L.', 'Jackson'),
(54, 'Josh', 'Brolin'),
(55, 'Chris', 'Pratt'),
(56, 'Dean-Charles', 'Chapman'),
(57, 'George', 'MacKay'),
(58, 'Daniel', 'Mays'),
(59, 'Colin', 'Firth'),
(60, 'Pip', 'Carter'),
(61, 'Andy', 'Apollo'),
(62, 'Paul', 'Tinto'),
(63, 'Josef', 'Davies'),
(64, 'Billy', 'Postlethwaite'),
(65, 'Ben', 'Schwartz'),
(66, 'James', 'Marsden'),
(67, 'Jim', 'Carrey'),
(68, 'Tika', 'Sumpter'),
(69, 'Natasha', 'Rothwell'),
(70, 'Adam', 'Pally'),
(71, 'Rosie', 'Perez'),
(72, 'Mary', 'Elizabeth'),
(73, 'Jurnee', 'Smollett-Bell'),
(74, 'Ewan', 'McGregor'),
(75, 'Ella', 'Jay'),
(76, 'Elisabeth', 'Moss'),
(77, 'Oliver', 'Jackson-Cohen'),
(78, 'Harriet', 'Dyer'),
(79, 'Aldis', 'Hodge'),
(80, 'Storm', 'Reid'),
(81, 'Michael', 'Dorman'),
(82, 'Benedict', 'Hardie'),
(83, 'Alexander', 'Petrov'),
(84, 'Mariya', 'Aronova'),
(85, 'Aglaya', 'Tarasova'),
(86, 'Vitaliya', 'Kornienko'),
(87, 'Nadezhda', 'Mikhalkova'),
(88, 'Yuliya', 'Khlynina'),
(89, 'Keanu', 'Reeves'),
(90, 'Martin', 'Lawrence'),
(91, 'Vanessa', 'Hudgens'),
(92, 'Alexander', 'Ludwig');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(9, 'Animation'),
(3, 'Comedy'),
(4, 'Drama'),
(6, 'Fantasy'),
(5, 'Horror'),
(7, 'Sport'),
(8, 'War');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `release_date` date NOT NULL,
  `age_rating` int(11) NOT NULL,
  `duration` time NOT NULL,
  `director` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `image_url` mediumtext NOT NULL,
  `player` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `release_date`, `age_rating`, `duration`, `director`, `summary`, `image_url`, `player`) VALUES
(1, 'Bloodshot', '2020-02-20', 16, '01:49:00', 'Dave Wilson', 'Ray Garrison, an elite soldier who was killed in battle, is brought back to life by an advanced technology that gives him the ability of super human strength and fast healing. With his new abilities, he goes after the man who killed his wife, or at least, who he believes killed his wife. He soon comes to learn that not everything he learns can be trusted. The true question is: Can he even trust himself?', 'https://m.media-amazon.com/images/M/MV5BYjA5YjA2YjUtMGRlNi00ZTU4LThhZmMtNDc0OTg4ZWExZjI3XkEyXkFqcGdeQXVyNjUyNjI3NzU@._V1_SY1000_SX800_AL_.jpg', 'https://api1589866689.multikland.net/embed/movie/12116'),
(2, 'John Wick: Chapter 3 - Parabellum', '2019-05-16', 18, '02:10:00', 'Chad Stahelski', 'In this third installment of the adrenaline-fueled action franchise, skilled assassin John Wick (Keanu Reeves) returns with a $14 million price tag on his head and an army of bounty-hunting killers on his trail. After killing a member of the shadowy international assassin\'s guild, the High Table, John Wick is excommunicado, but the world\'s most ruthless hit men and women await his every turn.', 'https://m.media-amazon.com/images/M/MV5BMDg2YzI0ODctYjliMy00NTU0LTkxODYtYTNkNjQwMzVmOTcxXkEyXkFqcGdeQXVyNjg2NjQwMDQ@._V1_SY1000_CR0,0,648,1000_AL_.jpg', 'https://api1586495936.multikland.net/embed/movie/5787'),
(3, 'Scoob!', '2020-05-15', 6, '01:30:00', 'Tony Cervone', 'Scooby-Doo is the hero of his own story in \"SCOOB!,\" the first full-length, theatrical animated Scooby-Doo adventure, which reveals how he and his best friend Shaggy became two of the world\'s most beloved crime busters. The story takes us back to where it all began, when a young Scooby and Shaggy first meet, and team up with Velma, Daphne, and Fred to launch Mystery Incorporated.', 'https://m.media-amazon.com/images/M/MV5BNTM5YWZiMzQtNDQxZS00ODI0LWJjNTQtZmQ3OWU3Njg4NWYyXkEyXkFqcGdeQXVyNzc4NTU3Njg@._V1_SY1000_CR0,0,674,1000_AL_.jpg', 'https://api1589633082.multikland.net/embed/movie/15817'),
(4, 'Spider-Man: Far from Home', '2019-07-04', 12, '02:09:00', 'Jon Watts', 'Our friendly neighborhood Super Hero decides to join his best friends Ned, MJ, and the rest of the gang on a European vacation. However, Peter\'s plan to leave super heroics behind for a few weeks are quickly scrapped when he begrudgingly agrees to help Nick Fury uncover the mystery of several elemental creature attacks, creating havoc across the continent.', 'https://m.media-amazon.com/images/M/MV5BMGZlNTY1ZWUtYTMzNC00ZjUyLWE0MjQtMTMxN2E3ODYxMWVmXkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_SY1000_CR0,0,674,1000_AL_.jpg', 'https://api1586495928.multikland.net/embed/movie/5784'),
(5, 'Avengers: Endgame', '2019-04-29', 16, '03:01:00', 'Anthony Russo, Joe Russo', 'After the devastating events of Avengers: Infinity War (2018), the universe is in ruins due to the efforts of the Mad Titan, Thanos. With the help of remaining allies, the Avengers must assemble once more in order to undo Thanos\'s actions and undo the chaos to the universe, no matter what consequences may be in store, and no matter who they face...', 'https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SY1000_CR0,0,674,1000_AL_.jpg', 'https://api1586495942.multikland.net/embed/movie/5637'),
(6, '1917', '2020-01-30', 16, '01:59:00', 'Sam Mendes', 'April 1917, the Western Front. Two British soldiers are sent to deliver an urgent message to an isolated regiment. If the message is not received in time the regiment will walk into a trap and be massacred. To get to the regiment they will need to cross through enemy territory. Time is of the essence and the journey will be fraught with danger.', 'https://m.media-amazon.com/images/M/MV5BOTdmNTFjNDEtNzg0My00ZjkxLTg1ZDAtZTdkMDc2ZmFiNWQ1XkEyXkFqcGdeQXVyNTAzNzgwNTg@._V1_SY1000_CR0,0,631,1000_AL_.jpg', 'https://api1588830334.multikland.net/embed/movie/10574'),
(7, 'Soniс', '2020-02-20', 6, '01:39:00', 'Jeff Fowler', 'Finally, one of the fastest and most capable hedgehogs awaited the film adaptation. The game story of the superfast hedgehog of Dream Interpreter finds its continuation in the big movie. The Dream Hedgehog is as dexterous as in the game of the same name, as always avoids persecution, saves the world and helps its friends.', 'https://m.media-amazon.com/images/M/MV5BMDk5Yzc4NzMtODUwOS00NTdhLTg2MjEtZTkzZjc0ZWE2MzAwXkEyXkFqcGdeQXVyMTA3MTA4Mzgw._V1_SY1000_CR0,0,666,1000_AL_.jpg', 'https://api1586830438.multikland.net/embed/movie/8500'),
(8, 'Birds of Prey', '2020-02-06', 18, '01:49:00', 'Cathy Yan', 'A twisted tale told by Harley Quinn herself, when Gotham\'s most nefariously narcissistic villain, Roman Sionis, and his zealous right-hand, Zsasz, put a target on a young girl named Cass, the city is turned upside down looking for her. Harley, Huntress, Black Canary and Renee Montoya\'s paths collide, and the unlikely foursome have no choice but to team up to take Roman down.', 'https://m.media-amazon.com/images/M/MV5BMzQ3NTQxMjItODBjYi00YzUzLWE1NzQtZTBlY2Y2NjZlNzkyXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_.jpg', 'https://api1584846992.mir-dikogo-zapada.com/embed/movie/10939'),
(9, 'The Invisible Man', '2020-03-05', 18, '02:04:00', 'Leigh Whannell', 'Under cover of night, Cecilia flees from the high-tech house of her boyfriend Adrian, lulling him with sleeping pills and turning off the surveillance systems and alarms. Now the girl lives with a friend, is afraid to go out and suffers from a persecution mania when she finds out that her former tormentor committed suicide. Adrian, the leader in the optical development market, left Cecilia a great legacy, and, finally, the girl’s life should get better. But soon she again begins to feel anxiety, as if Adrian was sneaking up on her imperceptibly - after all, it is impossible to hide from a pursuer whom you cannot see.', 'https://m.media-amazon.com/images/M/MV5BZjFhM2I4ZDYtZWMwNC00NTYzLWE3MDgtNjgxYmM3ZWMxYmVmXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_SY1000_CR0,0,631,1000_AL_.jpg', 'https://api1589525108.multikland.net/embed/movie/14310'),
(10, 'Bad Boys for Life', '2020-01-23', 18, '02:04:00', 'Adil El Arbi', 'Marcus and Mike have to confront new issues (career changes and midlife crises), as they join the newly created elite team AMMO of the Miami police department to take down the ruthless Armando Armas, the vicious leader of a Miami drug cartel.', 'https://m.media-amazon.com/images/M/MV5BMWU0MGYwZWQtMzcwYS00NWVhLTlkZTAtYWVjOTYwZTBhZTBiXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_SY1000_CR0,0,674,1000_AL_.jpg', 'https://api1587533152.multikland.net/embed/movie/10764');

-- --------------------------------------------------------

--
-- Table structure for table `movie_actors`
--

CREATE TABLE `movie_actors` (
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `actors_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie_actors`
--

INSERT INTO `movie_actors` (`movie_id`, `actors_id`) VALUES
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(3, 34),
(3, 35),
(3, 36),
(3, 37),
(3, 38),
(5, 2),
(5, 1),
(5, 44),
(5, 19),
(5, 9),
(5, 45),
(5, 46),
(5, 12),
(5, 47),
(5, 48),
(5, 17),
(5, 50),
(5, 51),
(5, 52),
(5, 53),
(5, 55),
(6, 56),
(6, 57),
(6, 58),
(6, 59),
(6, 60),
(6, 61),
(6, 62),
(6, 63),
(6, 64),
(7, 65),
(7, 66),
(7, 67),
(7, 68),
(7, 69),
(7, 70),
(8, 6),
(8, 71),
(8, 72),
(8, 73),
(8, 74),
(8, 75),
(9, 76),
(9, 77),
(9, 78),
(9, 79),
(9, 80),
(9, 81),
(9, 82),
(2, 89),
(4, 20),
(4, 53),
(10, 11),
(10, 90),
(10, 91),
(10, 92);

-- --------------------------------------------------------

--
-- Table structure for table `movie_genres`
--

CREATE TABLE `movie_genres` (
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie_genres`
--

INSERT INTO `movie_genres` (`movie_id`, `genre_id`) VALUES
(1, 1),
(1, 4),
(1, 6),
(3, 9),
(3, 3),
(5, 1),
(5, 2),
(5, 4),
(6, 4),
(6, 8),
(7, 1),
(7, 2),
(7, 3),
(8, 1),
(8, 2),
(9, 5),
(9, 6),
(2, 1),
(4, 1),
(4, 2),
(10, 1),
(10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin'),
(2, 'qwe@a.s', 'qwerty', '123'),
(3, 'asdf@mail.ru', 'asdf', 'as'),
(9, 'asd@m.ka', 'asdff', 'ad'),
(13, 'asd@m.kw', 'asddd', 'asd'),
(15, 'asd@m.kad', 'as', 'ss'),
(16, 'aqw@mail.com', 'sd', 'as'),
(17, 'ert@mail.ru', 'ddd', 'fd'),
(18, 'ads@mail.ru', 'sddsdsd', 'as'),
(19, 'asd@m.k', 'asd', 'asd'),
(20, 'zxc@gmail.com', 'zxc', 'zxc'),
(22, 'vv@gmail.com', 'vv', 'v'),
(24, 't@mail.ru', 't', 't'),
(26, 'dwd@qwda.lk', 'dd', 'dd'),
(28, 'u@gmail.com', 'u', 'u'),
(30, 'f@mail.com', 'f', 'f'),
(32, 'j@as.ld', 'ds', 'ds'),
(33, 'asd@m.kds', 'asdd', 'asd'),
(34, 'asdaf@mail.ru', 'asddf', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `user_will_watch`
--

CREATE TABLE `user_will_watch` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_will_watch`
--

INSERT INTO `user_will_watch` (`user_id`, `movie_id`) VALUES
(2, 3),
(2, 5),
(3, 1),
(19, 5),
(19, 6),
(19, 1),
(19, 3),
(3, 6),
(3, 3),
(3, 5),
(3, 7),
(3, 8),
(3, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `name` (`genre`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_actors`
--
ALTER TABLE `movie_actors`
  ADD KEY `fk_movie_id` (`movie_id`),
  ADD KEY `fk_actor_id` (`actors_id`);

--
-- Indexes for table `movie_genres`
--
ALTER TABLE `movie_genres`
  ADD KEY `fk_genre_id` (`genre_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_will_watch`
--
ALTER TABLE `user_will_watch`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie_actors`
--
ALTER TABLE `movie_actors`
  ADD CONSTRAINT `fk_actor_id` FOREIGN KEY (`actors_id`) REFERENCES `actors` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `movie_genres`
--
ALTER TABLE `movie_genres`
  ADD CONSTRAINT `fk_genre_id` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_genres_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_will_watch`
--
ALTER TABLE `user_will_watch`
  ADD CONSTRAINT `user_will_watch_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_will_watch_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

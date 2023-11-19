-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2023 at 11:39 AM
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
-- Database: `c203_moviereviewdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movieId` int(11) NOT NULL,
  `movieTitle` varchar(80) NOT NULL,
  `movieGenre` varchar(80) NOT NULL,
  `movieRating` varchar(10) NOT NULL,
  `runningTime` varchar(20) NOT NULL,
  `language` varchar(60) NOT NULL,
  `picture` varchar(60) NOT NULL,
  `director` varchar(80) NOT NULL,
  `cast` text NOT NULL,
  `synopsis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movieId`, `movieTitle`, `movieGenre`, `movieRating`, `runningTime`, `language`, `picture`, `director`, `cast`, `synopsis`) VALUES
(1, 'John Wick: Chapter 4', 'Action/ Thriller/\nCrime', '7.8', '170 minutes', 'English(Sub: Chinese, Malay)', 'JohnWick.png', 'Chad Stahelski', 'Keanu Reeves, Donnie Yen, Bill Skarsgard, Laurence Fishburne, Hiroyuki Sanada, Lance Reddick, Scott Adkins', 'John Wick (Keanu Reeves) uncovers a path to defeating The High Table. But before he can earn his freedom, Wick must face off against a new enemy with powerful alliances across the globe and forces that turn old friends into foes.'),
(2, 'My Puppy', 'Comedy/ Drama/ Family', '7.5', '113 minutes', 'Korean(Sub: English, Chinese)', 'mypuppy.png', 'Jason Kim', 'Yoo Yeon-seok, Cha Tae-hyun', 'Min-soo (Yoo Yeon-seok) is an ordinary office worker who dreams of a perfect family. He has a dog, Rooney, whom he treats as a younger brother. Unexpected circumstances arises in Min-soo\'s life, when he can no longer live with Rooney ahead of his marriage with his fiancee who is allergic to dogs. Together with his cousin, Jin-guk (Cha Tae-hyun) who owns a cafe that went bankrupt, Min-soo decides to find a new family for Rooney. On their journey that starts in Seoul and continues to Jeju Island to find the perfect owner, the two encounter the heart-breaking reality of abandoned pets.'),
(3, 'Suzume', 'Animation/ Action/ Adventure', '7.7', '122 minutes', 'Japanese(Sub: English, Chinese)', 'suzume.png', 'Makoto Shinkai', 'Nanoka Hara, Hokuto Matsumura, Eri Fukatsu', 'On the other side of the door, was time in its entirety.\r\n\r\n\"Suzume\" is a coming-of-age story for the 17-year-old protagonist, Suzume, set in various disaster-stricken locations across Japan, where she must close the doors causing devastation. \r\n\r\nSuzume\'s journey begins in a quiet town in Kyushu (located in southwestern Japan) when she encounters a young man who tells her, \"I\'m looking for a door.\" What Suzume finds is a single weathered door standing upright in the midst of ruins as though it was shielded from whatever catastrophe struck. Seemingly drawn by its power, Suzume reaches for the knob. Doors begin to open one after another all across Japan, unleashing destruction upon any who are near. Suzume must close these portals to prevent further disaster. The stars, then sunset, and the morning sky.\r\n'),
(4, 'Avatar: The Way Of Water', 'Action/ Adventure/ Fantasy', '7.6', '192 minutes', 'English(Sub: Chinese)', 'avatar.png', 'James Cameron', 'Sam Worthington, Zoe Saldana, Sigourney Weaver, Kate Winslet, Vin Diesel, Stephen Lang', 'Set more than a decade after the events of the first film, \"Avatar: The Way of Water\" begins to tell the story of the Sully family (Jake, Neytiri, and their kids), the trouble that follows them, the lengths they go to keep each other safe, the battles they fight to stay alive, and the tragedies they endure.\r\n'),
(5, 'Mummies', 'Animation/ Comedy/ Family', '5.9', '89 minutes', 'English(Sub: Chinese', 'mummies.png', 'Juan Jesus Garcia Galocha', 'Sean Bean, Hugh Bonneville, Eleanor Tomlinson, Celia Imrie, Joe Thomas, Dan Starkey', 'It follows three mummies as they end up in present-day London and embark on a journey in search of an old ring belonging to the Royal Family, stolen by the ambitious archaeologist Lord Carnaby.');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int(11) NOT NULL,
  `movieId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `review` text NOT NULL,
  `rating` int(11) NOT NULL,
  `datePosted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewId`, `movieId`, `userId`, `review`, `rating`, `datePosted`) VALUES
(1, 4, 3, 'Joined in the Avatar bandwagon late but what a spectacle. stunning visual effects', 5, '2023-03-29'),
(2, 2, 1, 'Heartwarming show, definitely worth a watch', 5, '2023-04-04'),
(3, 4, 2, 'Best movie ever!', 5, '2023-04-19'),
(5, 2, 3, 'quite boring.', 2, '2023-08-04'),
(6, 2, 2, 'Good movie for dog lovers. Puppy is very cute.', 4, '2023-04-19'),
(19, 1, 3, 'asd', 1, '2023-08-04'),
(24, 1, 8, '23', 2, '2023-08-04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(80) NOT NULL,
  `dob` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `Acc_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `password`, `name`, `dob`, `email`, `Acc_status`) VALUES
(1, 'peter', '3691e5ad98c057bf6fd9ae1d79d3dc5a5d219aed', 'Peter Lim', '2008-08-13', 'peter@gmail.com', 'activated'),
(2, 'mary', '91741b76d08f5bc1da8d3b621201812239cc732a', 'Mary Tan', '1977-12-08', 'mary@gmail.com', 'activated'),
(3, 'david', 'f917202ed2115cabcd375f5f8b799789a33f0264', 'David Lee', '1999-08-26', 'davidLee@gmail.com', 'activated'),
(4, 'john', 'c6b72d9d1cb511c93e63b670df8d381e8e723c59', 'John Ho', '2005-12-11', 'JohnHo@gmail.com', 'activated'),
(5, 'sally', '5b53dc49db8cdbdf81a342d86763182aff9fbed3', 'Sally Lim', '1989-02-10', 'sally@gmail.com', 'activated'),
(6, 'as', 'df211ccdd94a63e0bcb9e6ae427a249484a49d60', 'as', '1222-03-12', 'as@gmail.com', 'activated'),
(7, 'asd', 'f10e2821bbbea527ea02200352313bc059445190', 'asd', '3333-03-31', 'asd@gmail.com', 'activated'),
(8, '22', '12c6fc06c99a462375eeb3f43dfd832b08ca9e17', '22', '2222-02-22', 'randomisgoodjabez@gmail.com', 'activated'),
(10, '33', 'b6692ea5df920cad691c20319a6fffd7a4a766b8', '33', '0033-03-31', '33@gmail.com', 'activated');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movieId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `Foreign Key` (`movieId`),
  ADD KEY `Foreign Key (User)` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movieId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `Foreign Key` FOREIGN KEY (`movieId`) REFERENCES `movies` (`movieId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Foreign Key (User)` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2021 at 03:30 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `hobbyID` int(11) NOT NULL,
  `hobby_name` varchar(255) NOT NULL,
  `hobby_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`hobbyID`, `hobby_name`, `hobby_description`) VALUES
(1, 'Hiking', 'I like to have long walks'),
(2, 'Gaming', 'I like playing video games'),
(3, 'Watching TV', 'I like watching films and Tv shows'),
(4, 'Board Games', 'I like playing board games'),
(5, 'Photography', 'I like taking pictures of things'),
(6, 'Cooking', 'I like making food'),
(7, 'Exercising', 'I like going gym or home exercising'),
(8, 'DIY', 'I like to do fix and construct things myself at home'),
(9, 'Dancing', 'I like to dance'),
(10, 'Martial arts', 'I like fighting'),
(11, 'Cycling', 'I like going on bike rides'),
(12, 'Singing', 'I like to sing'),
(13, 'Music', 'I like listening to music'),
(14, 'Talking', 'I like talking to people');

-- --------------------------------------------------------

--
-- Table structure for table `userHobby`
--

CREATE TABLE `userHobby` (
  `userHobbyID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `hobbyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userHobby`
--

INSERT INTO `userHobby` (`userHobbyID`, `userID`, `hobbyID`) VALUES
(7, 5, 1),
(8, 5, 5),
(9, 5, 6),
(10, 6, 6),
(11, 6, 12),
(12, 6, 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `user_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `firstname`, `surname`, `password`, `gender`, `email`, `phone_number`, `user_description`) VALUES
(5, 'Silver', 'Silverijus', 'Scerbavicius', '$2y$10$WQkTn9D3C6e9aJAQ81h.Nu7j9tcar24En7S6qe4vi0vHgpfvkkoJG', 'male', 'silverijus.scerbavicius@gmail.com', '07867435785', 'Bio'),
(6, 'user1', 'User', 'Username', '$2y$10$pexN8gfwcxd/D/09slIknuUi4drEsTAVfl647H0Uuo86KZptyFQoS', 'female', 'username@gmail.com', '07852414124', 'hello hello');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`hobbyID`);

--
-- Indexes for table `userHobby`
--
ALTER TABLE `userHobby`
  ADD PRIMARY KEY (`userHobbyID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userHobby`
--
ALTER TABLE `userHobby`
  MODIFY `userHobbyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

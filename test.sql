-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 19, 2021 at 07:44 PM
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
-- Table structure for table `userChat`
--

CREATE TABLE `userChat` (
  `userChatID` int(11) NOT NULL,
  `senderID` int(11) NOT NULL,
  `recieverID` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userChat`
--

INSERT INTO `userChat` (`userChatID`, `senderID`, `recieverID`, `message`, `date`, `time`) VALUES
(34, 2, 2, 'my new post', '12-04-21', '15:30');

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
(7, 2, 2),
(8, 2, 4),
(9, 2, 1),
(28, 4, 1),
(29, 4, 7),
(30, 4, 3),
(34, 1, 1),
(35, 1, 7),
(36, 1, 5);

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
  `user_description` varchar(255) NOT NULL,
  `private` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `firstname`, `surname`, `password`, `gender`, `email`, `phone_number`, `user_description`, `private`) VALUES
(1, 'Silver', 'Silverijus', 'Scerbavicius', '$2y$10$2nWZs66UXSEYz5YIDXuTW.r8nnvvWhpv42R9IkQ2k1qB7i/M6bApK', 'male', 'silverijus.scerbavicius@gmail.com', '07867435795', 'Just love exploring <3', 'Yes'),
(2, 'user1', 'Serial', 'Gamer', '$2y$10$AERdU/BQPLSS.Wg2OuJvZe/yEZ3umsz6c7JAemgIdeyb2N2bPP4O6', 'male', 'gaming@gmail.com', '078124123132', 'I like to game...', 'No'),
(4, 'Georgie', 'Georgie', 'Charn', '$2y$10$vp57uMQ9.VB81e.vyO.WZOaMWKlqfLbZhI5yrAcSnreCWzD8cWPoS', 'female', 'g.c@gmail.com', '078312321323', 'Hello, i\'m Georgie.', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`hobbyID`);

--
-- Indexes for table `userChat`
--
ALTER TABLE `userChat`
  ADD PRIMARY KEY (`userChatID`);

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
-- AUTO_INCREMENT for table `userChat`
--
ALTER TABLE `userChat`
  MODIFY `userChatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `userHobby`
--
ALTER TABLE `userHobby`
  MODIFY `userHobbyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 14, 2020 at 05:18 PM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `comment_by` int(11) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `add_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `postid`, `comment_by`, `comment`, `add_time`) VALUES
(1, 3, 1, 'Hello, Nice Post heisenberg, ksdgvisviugcsieucbieucgieucbicvsieucvesiucesviucfseicuseicsgecseces', '2020-09-14 14:43:00'),
(2, 3, 1, 'gvrvbhrth', '2020-09-14 14:43:00'),
(3, 3, 1, 'gvrvbhrth', '2020-09-14 14:43:00'),
(4, 1, 1, 'Hi', '2020-09-14 14:46:46'),
(5, 1, 1, 'HIII', '2020-09-14 14:53:01'),
(6, 1, 1, 'vdvrvrdv', '2020-09-14 14:53:17'),
(7, 1, 1, 'vfdffdg', '2020-09-14 15:01:47'),
(8, 1, 1, '345436463', '2020-09-14 15:02:05'),
(9, 1, 1, 'test', '2020-09-14 15:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `dislikes`
--

CREATE TABLE `dislikes` (
  `id` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `dislike_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `request_id` int(11) NOT NULL,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  `friends` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`request_id`, `user1`, `user2`, `friends`) VALUES
(6, 3, 1, 1),
(7, 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `like_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `postid`, `like_by`) VALUES
(8, 3, 1),
(10, 1, 1),
(11, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `userid` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `avatar` varchar(32) NOT NULL DEFAULT 'avatar.jpg',
  `age` int(11) NOT NULL,
  `add_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`userid`, `username`, `email`, `fname`, `lname`, `password`, `status`, `avatar`, `age`, `add_time`, `is_admin`) VALUES
(1, 'admin', 'admin@blog.com', 'Admin', '', '7488e331b8b64e5794da3fa4eb10ad5d', 0, 'h.jpg', 24, '2020-09-12 20:18:07', 1),
(3, 'janish', 'janishjainjj@gmail.com', 'Janish', 'Jain', 'ed2b1f468c5f915f3f1cf75d7068baae', 0, 'avatar.jpg', 24, '2020-09-14 16:03:56', 0),
(4, 'pinkman', 'jesse@blog.com', 'Jesse', 'Pinkman', 'ed2b1f468c5f915f3f1cf75d7068baae', 1, 'avatar.jpg', 25, '2020-09-14 17:12:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `content` text NOT NULL,
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL,
  `comments` int(11) NOT NULL,
  `add_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postid`, `userid`, `title`, `content`, `likes`, `dislikes`, `comments`, `add_time`) VALUES
(1, 1, 'Highcharts Demo', 'Gibberish, also called jibber-jabber or gobbledygook, is speech that is (or appears to be) nonsense. It may include speech sounds that are not actual words,[1] or language games and specialized jargon that seems nonsensical to outsiders.[2]\n\n\"Gibberish\" is also used as an imprecation to denigrate or tar ideas or opinions the user disagrees with or finds irksome, a rough equivalent of \"nonsense\", \"folderol\", or \"claptrap\". The implication is that the criticized expression or proposition lacks substance or congruence, as opposed to simply being a differing view.\n\nThe related word jibber-jabber refers to rapid talk that is difficult to understand.', 1, 0, 5, '2020-09-14 16:12:28'),
(3, 1, 'Heisenberg', 'Walter Hartwell White Sr., also known by his clandestine alias Heisenberg, is a fictional character and the main protagonist of the American neo-Western crime drama television series Breaking Bad. He is portrayed by Bryan Cranston.\n\nA graduate of the California Institute of Technology (Caltech), Walter co-founded the company Gray Matter Technologies with his then-girlfriend Gretchen and his close friend Elliott Schwartz. He left Gray Matter abruptly, selling his shares for $5,000.\nSoon afterward, the company made a fortune, much of it from his research. Walt subsequently moved to Albuquerque, New Mexico, where he became a high school chemistry teacher. Breaking Bad begins on Walt\'s 50th birthday, when he is diagnosed with Stage IIIA lung cancer. After this discovery, he resorts to manufacturing and selling methamphetamines with his former student, Jesse Pinkman (Aaron Paul), to ensure his family\'s financial security after his death. He is pulled deeper into the illicit drug trade, becoming more and more ruthless as the series progresses, and later adopts the alias \"Heisenberg\", which becomes recognizable as the kingpin figure in the local drug trade. Series creator Vince Gilligan has described his goal with Walter White as \"turning Mr. Chips into Scarface\" and deliberately made the character less sympathetic over the course of the series. Walt\'s evolution from a mild-mannered school teacher and family man into a dangerous drug lord and serial killer is the show\'s central focus.', 1, 0, 3, '2020-09-14 16:12:28'),
(4, 3, 'Hi! My Name is Janish', 'hello lets talk', 0, 0, 0, '2020-09-14 16:12:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`request_id`),
  ADD UNIQUE KEY `request_id` (`request_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `userid` (`userid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postid`),
  ADD UNIQUE KEY `postid` (`postid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dislikes`
--
ALTER TABLE `dislikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

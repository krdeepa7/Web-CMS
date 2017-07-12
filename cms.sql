-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 29, 2017 at 09:06 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Java'),
(10, 'Javascript'),
(11, 'Android');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(3) NOT NULL,
  `post_status` varchar(10000) NOT NULL DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(38, 1, 'Introduction to Java', 'Rahul', '2017-06-29', 'java.jpg', 'Java is one of the most popular and useful programming languages in the world. Originally released in 1995, this object-oriented programming language is still relevant today. The Java ecosystem has flourished in all these years providing a range of robust Java technologies, such as frameworks, libraries, web development SDKs and JVM languages. Java programming has found application in various technology sectors, which is why it is one of the most preferred languages to learn by programming enthusiasts.\r\n\r\nToday, the internet is flooded with a range of Java programming courses. As we know that programming is a vast topic and so learning Java development is a lifelong and continuous process. Hence, it becomes important for beginners as well as expert Java programmers to stay updated on the recent developments taking place within the Java ecosystem. One way is to subscribe to and follow Java programming blogs which can become a source of useful information on a daily basis.\r\n\r\nHence, I have compiled a list of 10 popular Java programming blogs which are currently trending on the digital space. Most of these blogs are maintained by expert Java developers. Here, a newbie Java developer as well as a professional programmer can find useful information on a range of Java technologies. Alright, so let us check out the list of 10 Java programming blogs to follow.', 'first,java,rahul,introduction', 0, 'Publish', 10),
(39, 1, 'Java, SQL and JOOQ', 'Alex', '2017-06-29', 'Java-SQL-and-JOOQ.png', 'Java Developers who are looking for some informative blog posts on JOOQ should definitely visit this blog site. Java, SQL and JOOQ is a great blog which features quality posts on JOOQ library (Java object-oriented querying), SQL tricks and Java best coding practices. The blog contains interesting posts on various topics, such as SQL and NoSQL database engines, Java generics, Streams API and Kotlin programming language.', 'java sql alex', 0, 'Publish', 0),
(40, 10, 'Introduction to Javascript', 'Deepa', '2017-06-29', 'javascpit.jpg', 'With two decades of improvement, JavaScript has become one of the most popular programming languages of all time. The journey started in 1995 when Brendan Eich created JavaScript in just 10 days. From there, it has seen multiple revisions, drafts, and growth in the form of frameworks, APIâ€™s, modules, etc. Today, we will go forward and list the top JavaScript blogs from the internet so that you can enjoy the lastest development in the field of JavaScript.\r\n\r\nAccording to RedMonk programming language rankings and GitHut.info, JavaScript is leading the pack in the terms of repositories and the most discussed programming language on StackOverFlow. The numbers itself speaks about the future of JavaScript as it has grown beyond the initial capabilities of simple DOM manipulations.\r\n\r\n', 'introduction,javascript,deepa', 0, 'Draft', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randsalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randsalt`) VALUES
(57, 'rahul', '123', 'abc', 'def', 'rhlrr64@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(58, 'moto', '$2y$10$iusesomecrazystrings2uPW8oFp8LjSLX4TydJIcckSyzcAoLkj6', '', '', 'moto@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(59, 'sam', 'sam', '', '', 'sam@gmail.com', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(60, 'sam2', '$2y$10$iusesomecrazystrings2ui1qr860E30b0c9ijNqwCSwHnHdgz.1K', '', '', 'sam@gmail.com', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(61, 'moto2', '$2y$10$iusesomecrazystrings2uPW8oFp8LjSLX4TydJIcckSyzcAoLkj6', '', '', 'moto@gmail.com', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(62, 'moto3', '$2y$10$iusesomecrazystrings2uPW8oFp8LjSLX4TydJIcckSyzcAoLkj6', '', '', 'moto@gmail.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22'),
(63, 'moto4', '$2y$10$iusesomecrazystrings2uPW8oFp8LjSLX4TydJIcckSyzcAoLkj6', '', '', 'moto@gmail.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22'),
(64, 'sam3', '$2y$10$iusesomecrazystrings2ujaXbiCmuMsRLfTEbnLO6SsPYZjgUGWm', '', '', 'sam@gmail.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, '4f6e72715a55f196fd45e5c032de1bea', 1498733281),
(2, '65b56b5ff1174ccfad7569e05aa82d0c', 1498659340),
(3, '7045a87b91a1b0a91b3c1ff5298bb00d', 1498659817),
(4, '7bd14f36c86ff8ae1307816620b65d8c', 1498660099),
(5, 'a3f469ecda65fbb13394aefbdbf95c2a', 1498666985),
(6, '1f17e2ba7f217ccc2f06cdd21e1e08d9', 1498725783);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

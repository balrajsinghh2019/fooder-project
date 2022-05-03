-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 03, 2022 at 02:51 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fooder`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(20) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `posted_by` int(20) NOT NULL,
  `discussion_id` int(20) NOT NULL COMMENT 'discussion id',
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `posted_by`, `discussion_id`, `created`) VALUES
(1, 'Get it from nearest TIM', 1, 1, '2022-03-23 16:40:27'),
(2, 'Do not brew it , instead use powder.', 2, 1, '2022-03-23 16:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `discussions`
--

CREATE TABLE `discussions` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(1000) NOT NULL,
  `posted_by` int(20) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discussions`
--

INSERT INTO `discussions` (`id`, `title`, `body`, `posted_by`, `created`) VALUES
(1, 'Shortest way to make French Vanilla', 'What is the best and shortest way to make the FC', 3, '0000-00-00 00:00:00'),
(3, 'Best way to bake bread', 'what will be the best ways to back bread at home?', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `friend_id` int(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friend_id`, `status`, `created`) VALUES
(1, 1, 2, 1, '2022-03-23 16:43:57'),
(2, 1, 3, 1, '2022-03-23 16:43:57'),
(3, 2, 1, 1, '2022-03-23 16:44:42'),
(4, 3, 1, 1, '2022-03-23 16:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `id` int(20) NOT NULL,
  `recipe_id` int(20) NOT NULL,
  `recipe_category_id` int(20) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`id`, `recipe_id`, `recipe_category_id`, `created`) VALUES
(1, 2, 2, '2022-03-23 16:34:06'),
(2, 2, 1, '2022-03-23 16:34:06'),
(3, 1, 3, '2022-03-23 16:34:41'),
(4, 1, 4, '2022-03-23 16:34:41'),
(5, 3, 5, '2022-03-23 16:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `post_id` int(20) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_link` text DEFAULT NULL,
  `body` text DEFAULT NULL,
  `price_range_start` int(11) NOT NULL,
  `price_range_ends` int(11) NOT NULL,
  `time_to_cook` int(11) DEFAULT NULL,
  `locked` int(11) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `posted_by` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `image_link`, `body`, `price_range_start`, `price_range_ends`, `time_to_cook`, `locked`, `created`, `posted_by`) VALUES
(1, 'Spaghetti With Garlic And Oil Pasta', 'https://images.unsplash.com/photo-1481931098730-318b6f776db0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=690&q=80', '<ol class=\"prep-steps list-unstyled xs-text-3\"><li class=\"xs-mb2\">Bring a large pot of salted water to a boil.  Cook the pasta according to package instructions. Save ¼ cup (60 ml) of pasta water, then drain.</li><li class=\"xs-mb2\">Add the olive oil and garlic to a large cold sauté pan. Turn the heat to medium-low and slowly heat up until the garlic is fragrant and lightly colored, about 3 minutes.</li><li class=\"xs-mb2\">Add the chile flakes and cook for another minute.</li><li class=\"xs-mb2\">Add the reserved pasta water and bring to a simmer. Add the cooked spaghetti and parsley, if using. Stir until the pasta is well-coated. Season with salt to taste.</li><li class=\"xs-mb2\">Enjoy!</li></ol>', 5, 15, 60, 0, '2022-03-23 16:25:33', 1),
(2, 'Creamy Chicken Burger', 'https://images.unsplash.com/photo-1565299507177-b0ac66763828?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=722&q=80', 'It depends on the grill and the thickness of the burger patties, but with our gas BBQ we grilled them for 5 minutes on one side and 4 minutes on the other side (lid down). When an instant read meat thermometer registers 165F in the middle, they\'re safe to eat. The meat thermometer helps ensure that you don\'t overcook them! Dry burgers are no fun.', 10, 12, 30, 0, '2022-03-23 16:25:33', 2),
(3, 'Bloody Mary', 'https://images.unsplash.com/photo-1609951651556-5334e2706168?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80', 'Steps\r\nPour some celery salt onto a small plate.\r\n\r\n\r\nRub the juicy side of the lemon or lime wedge along the lip of a pint glass.\r\n\r\n\r\nRoll the outer edge of the glass in celery salt until fully coated, then fill the glass with ice and set aside.\r\n\r\nSqueeze the lemon and lime wedges into a shaker and drop them in.\r\n\r\nAdd the vodka, tomato juice, horseradish, Tabasco, Worcestershire, black pepper, paprika, plus a pinch of celery salt along with ice and shake gently.\r\n\r\nStrain into the prepared glass.\r\n\r\nGarnish with parsley sprig, 2 speared green olives, a lime wedge and a celery stalk (optional).\r\n\r\n', 2, 10, 15, 0, '2022-03-23 16:30:29', 3),
(7, 'Red hot soup', '/fooder-project/uploads/red_sourp.jfif', 'adnnjkancln.asasf\r\nafssaffas\r\nafasfasfasf\r\nasfasfffasf.', 30, 40, 20, 0, '2022-04-19 01:18:46', 1),
(8, 'Eggs n Salad', '/fooder-project/uploads/eggs.jfif', 'When I think of Egg Salad sandwich I always think about bridal shower, baby showers, spring time and Easter. All the great events that are bright and loving that bring everyone together. I love the simplicity of this classic Egg Salad Sandwich with only a few ingredients. Boiled eggs, mayonnaise, a touch of a mustard and elegant toppings with dill and chives to add that extra touch of perfection. This literally is the BEST Egg Salad Sandwich that is easy to make, little to few ingredients and a delicious taste that is satisfying and can feed a crowd.', 20, 25, 20, 0, '2022-04-20 01:55:07', 1),
(9, 'Fruity Pudding', '/fooder-project/uploads/pudding.jfif', '1\r\ncontainer (4 oz) refrigerated vanilla pudding\r\n1/2\r\ncup Cool Whip frozen whipped topping, thawed\r\n1\r\ncup seedless green grapes, halved\r\n1\r\ncup miniature marshmallows\r\n1\r\ncan (11 oz) mandarin orange segments, drained\r\n1\r\ncan (8 oz) pineapple tidbits in juice, drained\r\n1\r\ncup fresh strawberries, sliced', 20, 30, 30, 0, '2022-04-20 01:57:48', 1),
(10, 'Humus', '/fooder-project/uploads/humus.jfif', 'Making hummus without tahini: In the hummus-loving world, there are two camps. Some love the zesty, tangy flavor of tahini, while others can go without it. We like it both ways, but for the best hummus rivaling our favorite brands in the store, include tahini. If you want to make hummus without tahini, leave it out. A chickpea purée without it is still quite delicious. Just add more olive oil. Another option is to use a natural unsweetened creamy peanut butter in its place.', 10, 15, 10, 0, '2022-04-20 01:59:34', 1),
(11, 'BUrger', '/fooder-project/uploads/red_sourp.jfif', 'a very good burger.\r\nbla blabla', 20, 30, 10, 1, '2022-04-20 09:00:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `recipes_categories`
--

CREATE TABLE `recipes_categories` (
  `id` int(20) NOT NULL,
  `name` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipes_categories`
--

INSERT INTO `recipes_categories` (`id`, `name`, `created`) VALUES
(1, 'burger', '2022-03-23 16:26:45'),
(2, 'chicken', '2022-03-23 16:26:45'),
(3, 'spagetti', '2022-03-23 16:27:03'),
(4, 'pasta', '2022-03-23 16:27:03'),
(5, 'drinks', '2022-03-23 16:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'registered'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `budget` int(11) DEFAULT NULL,
  `favorite_food` varchar(1000) DEFAULT NULL COMMENT 'It holds the users food preferences. Just a text',
  `role_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `locked` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `budget`, `favorite_food`, `role_id`, `active`, `locked`, `created`) VALUES
(1, 'Balraj', 'balrajsinghh2019@gmail.com', 'Balraj', 10, 'Hello I am fooder', 1, 1, 0, '2022-03-23 16:18:58'),
(2, 'Tanishq', 'business.tanishq@gmail.com', 'Tanishq@123', 20, NULL, 1, 1, 0, '2022-03-23 16:18:58'),
(3, 'Merrybeth', 'n01436057@humbermail.ca', 'Mb@123456', 30, 'Pasta', 1, 1, 1, '2022-03-23 16:20:31'),
(4, 'admin', 'fooder.admin2022@gmail.com', 'admin', NULL, NULL, 2, 1, 0, '2022-03-23 16:20:31'),
(6, 'Dashmeet', 'dashmeetk28@gmail.com', 'root', NULL, NULL, 1, 1, 1, '2022-03-26 03:55:34'),
(7, 'test', 'test@gmail.com', 'test@123', NULL, NULL, 1, 1, 0, '2022-04-20 09:08:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`posted_by`),
  ADD KEY `discussion_id_fk` (`discussion_id`);

--
-- Indexes for table `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discussion_posted_by` (`posted_by`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `friend_id` (`friend_id`),
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`recipe_id`),
  ADD KEY `post_category_id` (`recipe_category_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`),
  ADD KEY `post_id_fk` (`post_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `posted_by` (`posted_by`);
ALTER TABLE `recipes` ADD FULLTEXT KEY `body` (`body`);

--
-- Indexes for table `recipes_categories`
--
ALTER TABLE `recipes_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`) USING HASH;

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH,
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `discussions`
--
ALTER TABLE `discussions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `recipes_categories`
--
ALTER TABLE `recipes_categories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `discussion_id_fk` FOREIGN KEY (`discussion_id`) REFERENCES `discussions` (`id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`posted_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `discussions`
--
ALTER TABLE `discussions`
  ADD CONSTRAINT `discussion_posted_by` FOREIGN KEY (`posted_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friend_id` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `keywords`
--
ALTER TABLE `keywords`
  ADD CONSTRAINT `post_category_id` FOREIGN KEY (`recipe_category_id`) REFERENCES `recipes_categories` (`id`),
  ADD CONSTRAINT `posts_id` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `post_id_fk` FOREIGN KEY (`post_id`) REFERENCES `recipes` (`id`),
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `posted_by` FOREIGN KEY (`posted_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

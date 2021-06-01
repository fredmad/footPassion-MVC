CREATE TABLE `user` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255),
  `password` varchar(255)
);

CREATE TABLE `link` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255),
  `short_desc` text,
  `long_desc` longtext,
  `url_img` varchar(255),
  `url_link` varchar(255),
  `created_at` datetime,
  `userId` int
);

ALTER TABLE `link` ADD FOREIGN KEY (`userId`) REFERENCES `user` (`id`);
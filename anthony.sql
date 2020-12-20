CREATE TABLE `users` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `fname` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
 `lname` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
 `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
 `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
 `user_code` int(1) NOT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci

CREATE TABLE `products` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `pname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
 `quantity` int(10) NOT NULL,
 `price` int(10) NOT NULL,
 `category` int(1) NOT NULL,
 `description` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
 `image` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `pname` (`pname`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci


CREATE TABLE `carts` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `user_id` int(10) NOT NULL,
 `product_id` int(10) NOT NULL,
 `quantity` int(10) NOT NULL,
 PRIMARY KEY (`id`),
 KEY `user_id` (`user_id`),
 KEY `product_id` (`product_id`),
 CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
 CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci

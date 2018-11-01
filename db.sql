CREATE TABLE `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `subscription_id` int(11) NOT NULL DEFAULT '0',
 `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `gender` enum('Male','Female') COLLATE utf8_unicode_ci NOT NULL,
 `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
 `created` datetime NOT NULL,
 `modified` datetime NOT NULL,
 `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `user_subscriptions` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `user_id` int(11) NOT NULL DEFAULT '0',
 `payment_method` enum('paypal') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'paypal',
 `validity` int(5) NOT NULL COMMENT 'in month(s)',
 `valid_from` datetime NOT NULL,
 `valid_to` datetime NOT NULL,
 `item_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `txn_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `payment_gross` float(10,2) NOT NULL,
 `currency_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
 `subscr_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `payer_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `payment_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
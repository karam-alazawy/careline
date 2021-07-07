

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  `permissions` VARCHAR(150) NOT NULL,
  `password` VARCHAR(250) NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `country` int(11) NOT NULL ,
  `province` int(11) NOT NULL ,
  `subscription_date` TIMESTAMP NULL,
  PRIMARY KEY (`id`)
 
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;






CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(250) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;




CREATE TABLE `item_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL ,
  `price` decimal(10,2) NOT NULL,
  `amount` FLOAT NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


CREATE TABLE `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` VARCHAR(250) NOT NULL,
  `delegate` VARCHAR(250) NOT NULL,
  `subject` VARCHAR(250) NOT NULL,
    `quantity` int(11) NOT NULL ,
  `price` decimal(10,2) NOT NULL,
  `amount` FLOAT NOT NULL,
  `date` VARCHAR(250) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


CREATE TABLE `salesP` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` VARCHAR(250) NOT NULL,
  `delegate` VARCHAR(250) NOT NULL,
  `subject` VARCHAR(250) NOT NULL,
    `quantity` int(11) NOT NULL ,
  `price` decimal(10,2) NOT NULL,
  `amount` FLOAT NOT NULL,
  `date` VARCHAR(250) NOT NULL,
    `oldId` int(11) NOT NULL ,

  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


CREATE TABLE `store` (
  
  `id` int(11) NOT NULL AUTO_INCREMENT,
    `subject` VARCHAR(250) NOT NULL,
  `quantity` int(11) NOT NULL ,
  `amount` VARCHAR(250) NOT NULL,
  `date` VARCHAR(250) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


CREATE TABLE `storeP` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
    `subject` VARCHAR(250) NOT NULL,
  `quantity` int(11) NOT NULL ,
  `amount` VARCHAR(250) NOT NULL,
  `date` VARCHAR(250) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
    `oldId` int(11) NOT NULL ,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;



INSERT INTO  `item_data` (`id`, `item_id`, `quantity`, `price`, `amount`, `created_at`, `updated_at`, `active`) VALUES ('0', '0', '0', '0', '0', '2021-01-16 00:40:22' , '2021-01-16 00:40:22', '1');
INSERT INTO  `item_data` (`id`, `item_id`, `quantity`, `price`, `amount`, `created_at`, `updated_at`, `active`) VALUES ('0', '0', '0', '0', '0', '2021-02-16 00:40:22' , '2021-01-16 00:40:22', '1');
INSERT INTO  `item_data` (`id`, `item_id`, `quantity`, `price`, `amount`, `created_at`, `updated_at`, `active`) VALUES ('0', '0', '0', '0', '0', '2021-03-16 00:40:22' , '2021-01-16 00:40:22', '1');
INSERT INTO  `item_data` (`id`, `item_id`, `quantity`, `price`, `amount`, `created_at`, `updated_at`, `active`) VALUES ('0', '0', '0', '0', '0', '2021-04-16 00:40:22' , '2021-01-16 00:40:22', '1');
INSERT INTO  `item_data` (`id`, `item_id`, `quantity`, `price`, `amount`, `created_at`, `updated_at`, `active`) VALUES ('0', '0', '0', '0', '0', '2021-05-16 00:40:22' , '2021-01-16 00:40:22', '1');
INSERT INTO  `item_data` (`id`, `item_id`, `quantity`, `price`, `amount`, `created_at`, `updated_at`, `active`) VALUES ('0', '0', '0', '0', '0', '2021-06-16 00:40:22' , '2021-01-16 00:40:22', '1');
INSERT INTO  `item_data` (`id`, `item_id`, `quantity`, `price`, `amount`, `created_at`, `updated_at`, `active`) VALUES ('0', '0', '0', '0', '0', '2021-07-16 00:40:22' , '2021-01-16 00:40:22', '1');
INSERT INTO  `item_data` (`id`, `item_id`, `quantity`, `price`, `amount`, `created_at`, `updated_at`, `active`) VALUES ('0', '0', '0', '0', '0', '2021-08-16 00:40:22' , '2021-01-16 00:40:22', '1');
INSERT INTO  `item_data` (`id`, `item_id`, `quantity`, `price`, `amount`, `created_at`, `updated_at`, `active`) VALUES ('0', '0', '0', '0', '0', '2021-09-16 00:40:22' , '2021-01-16 00:40:22', '1');
INSERT INTO  `item_data` (`id`, `item_id`, `quantity`, `price`, `amount`, `created_at`, `updated_at`, `active`) VALUES ('0', '0', '0', '0', '0', '2021-10-16 00:40:22' , '2021-01-16 00:40:22', '1');
INSERT INTO  `item_data` (`id`, `item_id`, `quantity`, `price`, `amount`, `created_at`, `updated_at`, `active`) VALUES ('0', '0', '0', '0', '0', '2021-11-16 00:40:22' , '2021-01-16 00:40:22', '1');
INSERT INTO  `item_data` (`id`, `item_id`, `quantity`, `price`, `amount`, `created_at`, `updated_at`, `active`) VALUES ('0', '0', '0', '0', '0', '2021-12-16 00:40:22' , '2021-01-16 00:40:22', '1');

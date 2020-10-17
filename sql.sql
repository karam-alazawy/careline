ALTER TABLE `users` ADD COLUMN `permissions` TEXT NULL DEFAULT NULL;
ALTER TABLE `users` ADD COLUMN `active` tinyint(1) NOT NULL DEFAULT '0';
ALTER TABLE `users` ADD COLUMN `office_id` int(11) NOT NULL;
ALTER TABLE `users` ADD COLUMN `subscription_date` TIMESTAMP NULL;



CREATE TABLE `offices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `office_country` int(11) NOT NULL ,
  `office_province` int(11) NOT NULL ,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `addedByUserId` int(11) NOT NULL ,
  
  PRIMARY KEY (`id`)
 
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `office_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `office_name` VARCHAR(150) NULL,
  `office_id` int(11) NOT NULL ,
  `lang_id` int(11) NOT NULL ,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

 

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `office_id` VARCHAR(150) NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `room_type` tinyint(1) NOT NULL DEFAULT '1',
  `addedByUserId` int(11) NOT NULL ,

  PRIMARY KEY (`id`)

) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
 
CREATE TABLE `room_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` VARCHAR(150) NULL,
  `room_id` int(11) NOT NULL ,
  `lang_id` int(11) NOT NULL ,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

 
CREATE TABLE `subscriptions` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `price` decimal(20,6) NOT NULL DEFAULT '0.00',
    `type` enum('yearly','monthly','weekly','daily')  NOT NULL DEFAULT 'monthly',
    `period` int(11) NOT NULL,
    `active` tinyint(1) NOT NULL DEFAULT '1',
    `addedByUserId` int(11) NOT NULL ,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

 
CREATE TABLE `subscription_logs` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` decimal(20,6) NOT NULL DEFAULT '0.00',
    `subscription_id` enum('yearly','monthly','weekly','daily')  NOT NULL DEFAULT 'monthly',
    `period` decimal(20,6) NOT NULL DEFAULT '0.00',
    `addedByUserId` int(11) NOT NULL ,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


CREATE TABLE `subscription_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subscription_name` VARCHAR(150) NULL,
  `subscription_id` int(11) NOT NULL ,
  `lang_id` int(11) NOT NULL ,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;




CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` VARCHAR(150) NULL,
 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


CREATE TABLE `provinces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
    `country_id` int(11) NOT NULL ,
  `province_name` VARCHAR(150) NULL,
 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

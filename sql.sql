ALTER TABLE `users` ADD COLUMN `permissions` TEXT NULL DEFAULT NULL;
ALTER TABLE `users` ADD COLUMN `active` tinyint(1) NOT NULL DEFAULT '0';
ALTER TABLE `users` ADD COLUMN `office_id` int(11) NOT NULL;
ALTER TABLE `users` ADD COLUMN `country` int(11) NOT NULL;
ALTER TABLE `users` ADD COLUMN `province` int(11) NOT NULL;

-- ALTER TABLE `users` ADD COLUMN `subscription_date` TIMESTAMP NULL;



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




CREATE TABLE `zone` (
  `id_zone` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `active` tinyint unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_zone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `sub_state_lang` (
  `id_sub_state` int unsigned NOT NULL,
  `id_lang` int unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `active` tinyint unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_sub_state`,`id_lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8


CREATE TABLE `sub_state` (
  `id_sub_state` int unsigned NOT NULL AUTO_INCREMENT,
  `id_province` int DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_sub_state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `province_lang` (
  `id_province` int NOT NULL,
  `id_lang` int unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `active` tinyint unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_province`,`id_lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `provinces` (
  `id_province` int NOT NULL,
  `id_country` int unsigned NOT NULL,
  `id_zone` int unsigned NOT NULL,
  `iso_code` varchar(7) NOT NULL,
  `tax_behavior` smallint NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_province`),
  KEY `id_country` (`id_country`),
  KEY `id_zone` (`id_zone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `country_lang` (
  `id_country` int unsigned NOT NULL,
  `id_lang` int unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `active` tinyint unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_country`,`id_lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `country` (
  `id_country` int unsigned NOT NULL AUTO_INCREMENT,
  `id_zone` int unsigned NOT NULL,
  `id_currency` int unsigned NOT NULL DEFAULT '0',
  `iso_code` varchar(3) NOT NULL,
  `call_prefix` int NOT NULL DEFAULT '0',
  `active` tinyint unsigned NOT NULL DEFAULT '0',
  `contains_states` tinyint(1) NOT NULL DEFAULT '0',
  `need_identification_number` tinyint(1) NOT NULL DEFAULT '0',
  `need_zip_code` tinyint(1) NOT NULL DEFAULT '1',
  `zip_code_format` varchar(12) NOT NULL DEFAULT '',
  `display_tax_label` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_country`),
  KEY `country_iso_code` (`iso_code`),
  KEY `country_` (`id_zone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `country` VALUES (1,1,0,'DE',49,0,0,0,1,'NNNNN',1),(2,1,0,'AT',43,0,0,0,1,'NNNN',1),(3,1,0,'BE',32,0,0,0,1,'NNNN',1),(4,2,0,'CA',1,0,1,0,1,'LNL NLN',0),(5,3,0,'CN',86,0,0,0,1,'NNNNNN',1),(6,1,0,'ES',34,0,0,1,1,'NNNNN',1),(7,1,0,'FI',358,0,0,0,1,'NNNNN',1),(8,1,0,'FR',33,0,0,0,1,'NNNNN',1),(9,1,0,'GR',30,0,0,0,1,'NNNNN',1),(10,1,0,'IT',39,0,1,0,1,'NNNNN',1),(11,3,0,'JP',81,0,1,0,1,'NNN-NNNN',1),(12,1,0,'LU',352,0,0,0,1,'NNNN',1),(13,1,0,'NL',31,0,0,0,1,'NNNN LL',1),(14,1,0,'PL',48,0,0,0,1,'NN-NNN',1),(15,1,0,'PT',351,0,0,0,1,'NNNN-NNN',1),(16,1,0,'CZ',420,0,0,0,1,'NNN NN',1),(17,1,0,'GB',44,0,0,0,1,'',1),(18,1,0,'SE',46,0,0,0,1,'NNN NN',1),(19,7,0,'CH',41,0,0,0,1,'NNNN',1),(20,1,0,'DK',45,0,0,0,1,'NNNN',1),(21,2,0,'US',1,0,1,0,1,'NNNNN',0),(22,3,0,'HK',852,0,0,0,0,'',1),(23,7,0,'NO',47,0,0,0,1,'NNNN',1),(24,5,0,'AU',61,0,1,0,1,'NNNN',1),(25,3,0,'SG',65,0,0,0,1,'NNNNNN',1),(26,1,0,'IE',353,0,0,0,0,'',1),(27,5,0,'NZ',64,0,0,0,1,'NNNN',1),(28,3,0,'KR',82,0,0,0,1,'NNN-NNN',1),(29,3,0,'IL',972,0,0,0,1,'NNNNNNN',1),(30,4,0,'ZA',27,0,0,0,1,'NNNN',1),(31,4,0,'NG',234,0,0,0,1,'',1),(32,4,0,'CI',225,0,0,0,1,'',1),(33,4,0,'TG',228,0,0,0,1,'',1),(34,6,0,'BO',591,0,0,0,1,'',1),(35,4,0,'MU',230,0,0,0,1,'',1),(36,1,0,'RO',40,0,0,0,1,'NNNNNN',1),(37,1,0,'SK',421,0,0,0,1,'NNN NN',1),(38,4,0,'DZ',213,0,0,0,1,'NNNNN',1),(39,2,0,'AS',0,0,0,0,1,'',1),(40,7,0,'AD',376,0,0,0,1,'CNNN',1),(41,4,0,'AO',244,0,0,0,0,'',1),(42,8,0,'AI',0,0,0,0,1,'',1),(43,2,0,'AG',0,0,0,0,1,'',1),(44,6,0,'AR',54,0,1,0,1,'LNNNNLLL',1),(45,3,0,'AM',374,0,0,0,1,'NNNN',1),(46,8,0,'AW',297,0,0,0,1,'',1),(47,3,0,'AZ',994,0,0,0,1,'CNNNN',1),(48,2,0,'BS',0,0,0,0,1,'',1),(49,3,0,'BH',973,0,0,0,1,'',1),(50,3,0,'BD',880,0,0,0,1,'NNNN',1),(51,2,0,'BB',0,0,0,0,1,'CNNNNN',1),(52,7,0,'BY',0,0,0,0,1,'NNNNNN',1),(53,8,0,'BZ',501,0,0,0,0,'',1),(54,4,0,'BJ',229,0,0,0,0,'',1),(55,2,0,'BM',0,0,0,0,1,'',1),(56,3,0,'BT',975,0,0,0,1,'',1),(57,4,0,'BW',267,0,0,0,1,'',1),(58,6,0,'BR',55,0,0,0,1,'NNNNN-NNN',1),(59,3,0,'BN',673,0,0,0,1,'LLNNNN',1),(60,4,0,'BF',226,0,0,0,1,'',1),(61,3,0,'MM',95,0,0,0,1,'',1),(62,4,0,'BI',257,0,0,0,1,'',1),(63,3,0,'KH',855,0,0,0,1,'NNNNN',1),(64,4,0,'CM',237,0,0,0,1,'',1),(65,4,0,'CV',238,0,0,0,1,'NNNN',1),(66,4,0,'CF',236,0,0,0,1,'',1),(67,4,0,'TD',235,0,0,0,1,'',1),(68,6,0,'CL',56,0,0,0,1,'NNN-NNNN',1),(69,6,0,'CO',57,0,0,0,1,'NNNNNN',1),(70,4,0,'KM',269,0,0,0,1,'',1),(71,4,0,'CD',242,0,0,0,1,'',1),(72,4,0,'CG',243,0,0,0,1,'',1),(73,8,0,'CR',506,0,0,0,1,'NNNNN',1),(74,7,0,'HR',385,0,0,0,1,'NNNNN',1),(75,8,0,'CU',53,0,0,0,1,'',1),(76,1,0,'CY',357,0,0,0,1,'NNNN',1),(77,4,0,'DJ',253,0,0,0,1,'',1),(78,8,0,'DM',0,0,0,0,1,'',1),(79,8,0,'DO',0,0,0,0,1,'',1),(80,3,0,'TL',670,0,0,0,1,'',1),(81,6,0,'EC',593,0,0,0,1,'CNNNNNN',1),(82,4,0,'EG',20,0,0,0,1,'NNNNN',1),(83,8,0,'SV',503,0,0,0,1,'',1),(84,4,0,'GQ',240,0,0,0,1,'',1),(85,4,0,'ER',291,0,0,0,1,'',1),(86,1,0,'EE',372,0,0,0,1,'NNNNN',1),(87,4,0,'ET',251,0,0,0,1,'',1),(88,8,0,'FK',0,0,0,0,1,'LLLL NLL',1),(89,7,0,'FO',298,0,0,0,1,'',1),(90,5,0,'FJ',679,0,0,0,1,'',1),(91,4,0,'GA',241,0,0,0,1,'',1),(92,4,0,'GM',220,0,0,0,1,'',1),(93,3,0,'GE',995,0,0,0,1,'NNNN',1),(94,4,0,'GH',233,0,0,0,1,'',1),(95,8,0,'GD',0,0,0,0,1,'',1),(96,7,0,'GL',299,0,0,0,1,'',1),(97,7,0,'GI',350,0,0,0,1,'',1),(98,8,0,'GP',590,0,0,0,1,'',1),(99,5,0,'GU',0,0,0,0,1,'',1),(100,8,0,'GT',502,0,0,0,1,'',1),(101,7,0,'GG',0,0,0,0,1,'LLN NLL',1),(102,4,0,'GN',224,0,0,0,1,'',1),(103,4,0,'GW',245,0,0,0,1,'',1),(104,6,0,'GY',592,0,0,0,1,'',1),(105,8,0,'HT',509,0,0,0,1,'',1),(106,5,0,'HM',0,0,0,0,1,'',1),(107,7,0,'VA',379,0,0,0,1,'NNNNN',1),(108,8,0,'HN',504,0,0,0,1,'',1),(109,7,0,'IS',354,0,0,0,1,'NNN',1),(110,3,0,'IN',91,0,0,0,1,'NNN NNN',1),(111,3,0,'ID',62,0,1,0,1,'NNNNN',1),(112,3,0,'IR',98,0,0,0,1,'NNNNN-NNNNN',1),(113,3,0,'IQ',964,1,0,0,1,'NNNNN',1),(114,7,0,'IM',0,0,0,0,1,'CN NLL',1),(115,8,0,'JM',0,0,0,0,1,'',1),(116,7,0,'JE',0,0,0,0,1,'CN NLL',1),(117,3,0,'JO',962,1,0,0,1,'',1),(118,3,0,'KZ',7,0,0,0,1,'NNNNNN',1),(119,4,0,'KE',254,0,0,0,1,'',1),(120,5,0,'KI',686,0,0,0,1,'',1),(121,3,0,'KP',850,0,0,0,1,'',1),(122,3,0,'KW',965,0,0,0,1,'',1),(123,3,0,'KG',996,0,0,0,1,'',1),(124,3,0,'LA',856,0,0,0,1,'',1),(125,1,0,'LV',371,0,0,0,1,'C-NNNN',1),(126,3,0,'LB',961,0,0,0,1,'',1),(127,4,0,'LS',266,0,0,0,1,'',1),(128,4,0,'LR',231,0,0,0,1,'',1),(129,4,0,'LY',218,0,0,0,1,'',1),(130,1,0,'LI',423,0,0,0,1,'NNNN',1),(131,1,0,'LT',370,0,0,0,1,'NNNNN',1),(132,3,0,'MO',853,0,0,0,0,'',1),(133,7,0,'MK',389,0,0,0,1,'',1),(134,4,0,'MG',261,0,0,0,1,'',1),(135,4,0,'MW',265,0,0,0,1,'',1),(136,3,0,'MY',60,0,0,0,1,'NNNNN',1),(137,3,0,'MV',960,0,0,0,1,'',1),(138,4,0,'ML',223,0,0,0,1,'',1),(139,1,0,'MT',356,0,0,0,1,'LLL NNNN',1),(140,5,0,'MH',692,0,0,0,1,'',1),(141,8,0,'MQ',596,0,0,0,1,'',1),(142,4,0,'MR',222,0,0,0,1,'',1),(143,1,0,'HU',36,0,0,0,1,'NNNN',1),(144,4,0,'YT',262,0,0,0,1,'',1),(145,2,0,'MX',52,0,1,1,1,'NNNNN',1),(146,5,0,'FM',691,0,0,0,1,'',1),(147,7,0,'MD',373,0,0,0,1,'C-NNNN',1),(148,7,0,'MC',377,0,0,0,1,'980NN',1),(149,3,0,'MN',976,0,0,0,1,'',1),(150,7,0,'ME',382,0,0,0,1,'NNNNN',1),(151,8,0,'MS',0,0,0,0,1,'',1),(152,4,0,'MA',212,0,0,0,1,'NNNNN',1),(153,4,0,'MZ',258,0,0,0,1,'',1),(154,4,0,'NA',264,0,0,0,1,'',1),(155,5,0,'NR',674,0,0,0,1,'',1),(156,3,0,'NP',977,0,0,0,1,'',1),(157,8,0,'AN',599,0,0,0,1,'',1),(158,5,0,'NC',687,0,0,0,1,'',1),(159,8,0,'NI',505,0,0,0,1,'NNNNNN',1),(160,4,0,'NE',227,0,0,0,1,'',1),(161,5,0,'NU',683,0,0,0,1,'',1),(162,5,0,'NF',0,0,0,0,1,'',1),(163,5,0,'MP',0,0,0,0,1,'',1),(164,3,0,'OM',968,0,0,0,1,'',1),(165,3,0,'PK',92,0,0,0,1,'',1),(166,5,0,'PW',680,0,0,0,1,'',1),(167,3,0,'PS',0,0,0,0,1,'',1),(168,8,0,'PA',507,0,0,0,1,'NNNNNN',1),(169,5,0,'PG',675,0,0,0,1,'',1),(170,6,0,'PY',595,0,0,0,1,'',1),(171,6,0,'PE',51,0,0,0,1,'',1),(172,3,0,'PH',63,0,0,0,1,'NNNN',1),(173,5,0,'PN',0,0,0,0,1,'LLLL NLL',1),(174,8,0,'PR',0,0,0,0,1,'NNNNN',1),(175,3,0,'QA',974,0,0,0,1,'',1),(176,4,0,'RE',262,0,0,0,1,'',1),(177,7,0,'RU',7,0,0,0,1,'NNNNNN',1),(178,4,0,'RW',250,0,0,0,1,'',1),(179,8,0,'BL',0,0,0,0,1,'',1),(180,8,0,'KN',0,0,0,0,1,'',1),(181,8,0,'LC',0,0,0,0,1,'',1),(182,8,0,'MF',0,0,0,0,1,'',1),(183,8,0,'PM',508,0,0,0,1,'',1),(184,8,0,'VC',0,0,0,0,1,'',1),(185,5,0,'WS',685,0,0,0,1,'',1),(186,7,0,'SM',378,0,0,0,1,'NNNNN',1),(187,4,0,'ST',239,0,0,0,1,'',1),(188,3,0,'SA',966,0,0,0,1,'',1),(189,4,0,'SN',221,0,0,0,1,'',1),(190,7,0,'RS',381,0,0,0,1,'NNNNN',1),(191,4,0,'SC',248,0,0,0,1,'',1),(192,4,0,'SL',232,0,0,0,1,'',1),(193,1,0,'SI',386,0,0,0,1,'C-NNNN',1),(194,5,0,'SB',677,0,0,0,1,'',1),(195,4,0,'SO',252,0,0,0,1,'',1),(196,8,0,'GS',0,0,0,0,1,'LLLL NLL',1),(197,3,0,'LK',94,0,0,0,1,'NNNNN',1),(198,4,0,'SD',249,0,0,0,1,'',1),(199,8,0,'SR',597,0,0,0,1,'',1),(200,7,0,'SJ',0,0,0,0,1,'',1),(201,4,0,'SZ',268,0,0,0,1,'',1),(202,3,0,'SY',963,0,0,0,1,'',1),(203,3,0,'TW',886,0,0,0,1,'NNNNN',1),(204,3,0,'TJ',992,0,0,0,1,'',1),(205,4,0,'TZ',255,0,0,0,1,'',1),(206,3,0,'TH',66,0,0,0,1,'NNNNN',1),(207,5,0,'TK',690,0,0,0,1,'',1),(208,5,0,'TO',676,0,0,0,1,'',1),(209,6,0,'TT',0,0,0,0,1,'',1),(210,4,0,'TN',216,0,0,0,1,'',1),(211,7,0,'TR',90,1,0,0,1,'NNNNN',1),(212,3,0,'TM',993,0,0,0,1,'',1),(213,8,0,'TC',0,0,0,0,1,'LLLL NLL',1),(214,5,0,'TV',688,0,0,0,1,'',1),(215,4,0,'UG',256,0,0,0,1,'',1),(216,1,0,'UA',380,0,0,0,1,'NNNNN',1),(217,3,0,'AE',971,0,0,0,1,'',1),(218,6,0,'UY',598,0,0,0,1,'',1),(219,3,0,'UZ',998,0,0,0,1,'',1),(220,5,0,'VU',678,0,0,0,1,'',1),(221,6,0,'VE',58,0,0,0,1,'',1),(222,3,0,'VN',84,0,0,0,1,'NNNNNN',1),(223,2,0,'VG',0,0,0,0,1,'CNNNN',1),(224,2,0,'VI',0,0,0,0,1,'',1),(225,5,0,'WF',681,0,0,0,1,'',1),(226,4,0,'EH',0,0,0,0,1,'',1),(227,3,0,'YE',967,0,0,0,1,'',1),(228,4,0,'ZM',260,0,0,0,1,'',1),(229,4,0,'ZW',263,0,0,0,1,'',1),(230,7,0,'AL',355,0,0,0,1,'NNNN',1),(231,3,0,'AF',93,0,0,0,1,'NNNN',1),(232,5,0,'AQ',0,0,0,0,1,'',1),(233,1,0,'BA',387,0,0,0,1,'',1),(234,5,0,'BV',0,0,0,0,1,'',1),(235,5,0,'IO',0,0,0,0,1,'LLLL NLL',1),(236,1,0,'BG',359,0,0,0,1,'NNNN',1),(237,8,0,'KY',0,0,0,0,1,'',1),(238,3,0,'CX',0,0,0,0,1,'',1),(239,3,0,'CC',0,0,0,0,1,'',1),(240,5,0,'CK',682,0,0,0,1,'',1),(241,6,0,'GF',594,0,0,0,1,'',1),(242,5,0,'PF',689,0,0,0,1,'',1),(243,5,0,'TF',0,0,0,0,1,'',1),(244,7,0,'AX',0,0,0,0,1,'NNNNN',1);
INSERT INTO `country_lang` VALUES (1,1,'Germany',1),(1,2,'Germany',1),(2,1,'Austria',1),(2,2,'Austria',1),(3,1,'Belgium',1),(3,2,'Belgium',1),(4,1,'Canada',1),(4,2,'Canada',1),(5,1,'China',1),(5,2,'China',1),(6,1,'Spain',0),(6,2,'Spain',0),(7,1,'Finland',0),(7,2,'Finland',0),(8,1,'France',0),(8,2,'France',0),(9,1,'Greece',0),(9,2,'Greece',0),(10,1,'Italy',0),(10,2,'Italy',0),(11,1,'Japan',0),(11,2,'Japan',0),(12,1,'Luxembourg',0),(12,2,'Luxembourg',0),(13,1,'Netherlands',0),(13,2,'Netherlands',0),(14,1,'Poland',0),(14,2,'Poland',0),(15,1,'Portugal',0),(15,2,'Portugal',0),(16,1,'Czech Republic',0),(16,2,'Czech Republic',0),(17,1,'United Kingdom',0),(17,2,'United Kingdom',0),(18,1,'Sweden',0),(18,2,'Sweden',0),(19,1,'Switzerland',0),(19,2,'Switzerland',0),(20,1,'Denmark',0),(20,2,'Denmark',0),(21,1,'United States',0),(21,2,'United States',0),(22,1,'Hong Kong SAR China',0),(22,2,'Hong Kong SAR China',0),(23,1,'Norway',0),(23,2,'Norway',0),(24,1,'Australia',0),(24,2,'Australia',0),(25,1,'Singapore',0),(25,2,'Singapore',0),(26,1,'Ireland',0),(26,2,'Ireland',0),(27,1,'New Zealand',0),(27,2,'New Zealand',0),(28,1,'South Korea',0),(28,2,'South Korea',0),(29,1,'Israel',0),(29,2,'Israel',0),(30,1,'South Africa',0),(30,2,'South Africa',0),(31,1,'Nigeria',0),(31,2,'Nigeria',0),(32,1,'Côte D’Ivoire',0),(32,2,'Côte D’Ivoire',0),(33,1,'Togo',0),(33,2,'Togo',0),(34,1,'Bolivia',0),(34,2,'Bolivia',0),(35,1,'Mauritius',0),(35,2,'Mauritius',0),(36,1,'Romania',0),(36,2,'Romania',0),(37,1,'Slovakia',0),(37,2,'Slovakia',0),(38,1,'Algeria',0),(38,2,'Algeria',0),(39,1,'American Samoa',0),(39,2,'American Samoa',0),(40,1,'Andorra',0),(40,2,'Andorra',0),(41,1,'Angola',0),(41,2,'Angola',0),(42,1,'Anguilla',0),(42,2,'Anguilla',0),(43,1,'Antigua & Barbuda',0),(43,2,'Antigua & Barbuda',0),(44,1,'Argentina',0),(44,2,'Argentina',0),(45,1,'Armenia',0),(45,2,'Armenia',0),(46,1,'Aruba',0),(46,2,'Aruba',0),(47,1,'Azerbaijan',0),(47,2,'Azerbaijan',0),(48,1,'Bahamas',0),(48,2,'Bahamas',0),(49,1,'Bahrain',0),(49,2,'Bahrain',0),(50,1,'Bangladesh',0),(50,2,'Bangladesh',0),(51,1,'Barbados',0),(51,2,'Barbados',0),(52,1,'Belarus',0),(52,2,'Belarus',0),(53,1,'Belize',0),(53,2,'Belize',0),(54,1,'Benin',0),(54,2,'Benin',0),(55,1,'Bermuda',0),(55,2,'Bermuda',0),(56,1,'Bhutan',0),(56,2,'Bhutan',0),(57,1,'Botswana',0),(57,2,'Botswana',0),(58,1,'Brazil',0),(58,2,'Brazil',0),(59,1,'Brunei',0),(59,2,'Brunei',0),(60,1,'Burkina Faso',0),(60,2,'Burkina Faso',0),(61,1,'Myanmar (Burma)',0),(61,2,'Myanmar (Burma)',0),(62,1,'Burundi',0),(62,2,'Burundi',0),(63,1,'Cambodia',0),(63,2,'Cambodia',0),(64,1,'Cameroon',0),(64,2,'Cameroon',0),(65,1,'Cape Verde',0),(65,2,'Cape Verde',0),(66,1,'Central African Republic',0),(66,2,'Central African Republic',0),(67,1,'Chad',0),(67,2,'Chad',0),(68,1,'Chile',0),(68,2,'Chile',0),(69,1,'Colombia',0),(69,2,'Colombia',0),(70,1,'Comoros',0),(70,2,'Comoros',0),(71,1,'Congo - Kinshasa',0),(71,2,'Congo - Kinshasa',0),(72,1,'Congo - Brazzaville',0),(72,2,'Congo - Brazzaville',0),(73,1,'Costa Rica',0),(73,2,'Costa Rica',0),(74,1,'Croatia',0),(74,2,'Croatia',0),(75,1,'Cuba',0),(75,2,'Cuba',0),(76,1,'Cyprus',0),(76,2,'Cyprus',0),(77,1,'Djibouti',0),(77,2,'Djibouti',0),(78,1,'Dominica',0),(78,2,'Dominica',0),(79,1,'Dominican Republic',0),(79,2,'Dominican Republic',0),(80,1,'Timor-Leste',0),(80,2,'Timor-Leste',0),(81,1,'Ecuador',0),(81,2,'Ecuador',0),(82,1,'Egypt',0),(82,2,'Egypt',0),(83,1,'El Salvador',0),(83,2,'El Salvador',0),(84,1,'Equatorial Guinea',0),(84,2,'Equatorial Guinea',0),(85,1,'Eritrea',0),(85,2,'Eritrea',0),(86,1,'Estonia',0),(86,2,'Estonia',0),(87,1,'Ethiopia',0),(87,2,'Ethiopia',0),(88,1,'Falkland Islands',0),(88,2,'Falkland Islands',0),(89,1,'Faroe Islands',0),(89,2,'Faroe Islands',0),(90,1,'Fiji',0),(90,2,'Fiji',0),(91,1,'Gabon',0),(91,2,'Gabon',0),(92,1,'Gambia',0),(92,2,'Gambia',0),(93,1,'Georgia',0),(93,2,'Georgia',0),(94,1,'Ghana',0),(94,2,'Ghana',0),(95,1,'Grenada',0),(95,2,'Grenada',0),(96,1,'Greenland',0),(96,2,'Greenland',0),(97,1,'Gibraltar',0),(97,2,'Gibraltar',0),(98,1,'Guadeloupe',0),(98,2,'Guadeloupe',0),(99,1,'Guam',0),(99,2,'Guam',0),(100,1,'Guatemala',0),(100,2,'Guatemala',0),(101,1,'Guernsey',0),(101,2,'Guernsey',0),(102,1,'Guinea',0),(102,2,'Guinea',0),(103,1,'Guinea-Bissau',0),(103,2,'Guinea-Bissau',0),(104,1,'Guyana',0),(104,2,'Guyana',0),(105,1,'Haiti',0),(105,2,'Haiti',0),(106,1,'Heard & McDonald Islands',0),(106,2,'Heard & McDonald Islands',0),(107,1,'Vatican City',0),(107,2,'Vatican City',0),(108,1,'Honduras',0),(108,2,'Honduras',0),(109,1,'Iceland',0),(109,2,'Iceland',0),(110,1,'India',0),(110,2,'India',0),(111,1,'Indonesia',0),(111,2,'Indonesia',0),(112,1,'Iran',0),(112,2,'Iran',0),(113,1,'Iraq',1),(113,2,'العراق',1),(114,1,'Isle Of Man',0),(114,2,'Isle Of Man',0),(115,1,'Jamaica',0),(115,2,'Jamaica',0),(116,1,'Jersey',0),(116,2,'Jersey',0),(117,1,'Jordan',1),(117,2,'Jordan',1),(118,1,'Kazakhstan',0),(118,2,'Kazakhstan',0),(119,1,'Kenya',0),(119,2,'Kenya',0),(120,1,'Kiribati',0),(120,2,'Kiribati',0),(121,1,'North Korea',0),(121,2,'North Korea',0),(122,1,'Kuwait',0),(122,2,'Kuwait',0),(123,1,'Kyrgyzstan',0),(123,2,'Kyrgyzstan',0),(124,1,'Laos',0),(124,2,'Laos',0),(125,1,'Latvia',0),(125,2,'Latvia',0),(126,1,'Lebanon',0),(126,2,'Lebanon',0),(127,1,'Lesotho',0),(127,2,'Lesotho',0),(128,1,'Liberia',0),(128,2,'Liberia',0),(129,1,'Libya',0),(129,2,'Libya',0),(130,1,'Liechtenstein',0),(130,2,'Liechtenstein',0),(131,1,'Lithuania',0),(131,2,'Lithuania',0),(132,1,'Macau SAR China',0),(132,2,'Macau SAR China',0),(133,1,'Macedonia',0),(133,2,'Macedonia',0),(134,1,'Madagascar',0),(134,2,'Madagascar',0),(135,1,'Malawi',0),(135,2,'Malawi',0),(136,1,'Malaysia',0),(136,2,'Malaysia',0),(137,1,'Maldives',0),(137,2,'Maldives',0),(138,1,'Mali',0),(138,2,'Mali',0),(139,1,'Malta',0),(139,2,'Malta',0),(140,1,'Marshall Islands',0),(140,2,'Marshall Islands',0),(141,1,'Martinique',0),(141,2,'Martinique',0),(142,1,'Mauritania',0),(142,2,'Mauritania',0),(143,1,'Hungary',0),(143,2,'Hungary',0),(144,1,'Mayotte',0),(144,2,'Mayotte',0),(145,1,'Mexico',0),(145,2,'Mexico',0),(146,1,'Micronesia',0),(146,2,'Micronesia',0),(147,1,'Moldova',0),(147,2,'Moldova',0),(148,1,'Monaco',0),(148,2,'Monaco',0),(149,1,'Mongolia',0),(149,2,'Mongolia',0),(150,1,'Montenegro',0),(150,2,'Montenegro',0),(151,1,'Montserrat',0),(151,2,'Montserrat',0),(152,1,'Morocco',0),(152,2,'Morocco',0),(153,1,'Mozambique',0),(153,2,'Mozambique',0),(154,1,'Namibia',0),(154,2,'Namibia',0),(155,1,'Nauru',0),(155,2,'Nauru',0),(156,1,'Nepal',0),(156,2,'Nepal',0),(157,1,'Netherlands Antilles',0),(157,2,'Netherlands Antilles',0),(158,1,'New Caledonia',0),(158,2,'New Caledonia',0),(159,1,'Nicaragua',0),(159,2,'Nicaragua',0),(160,1,'Niger',0),(160,2,'Niger',0),(161,1,'Niue',0),(161,2,'Niue',0),(162,1,'Norfolk Island',0),(162,2,'Norfolk Island',0),(163,1,'Northern Mariana Islands',0),(163,2,'Northern Mariana Islands',0),(164,1,'Oman',0),(164,2,'Oman',0),(165,1,'Pakistan',0),(165,2,'Pakistan',0),(166,1,'Palau',0),(166,2,'Palau',0),(167,1,'Palestinian Territories',0),(167,2,'Palestinian Territories',0),(168,1,'Panama',0),(168,2,'Panama',0),(169,1,'Papua New Guinea',0),(169,2,'Papua New Guinea',0),(170,1,'Paraguay',0),(170,2,'Paraguay',0),(171,1,'Peru',0),(171,2,'Peru',0),(172,1,'Philippines',0),(172,2,'Philippines',0),(173,1,'Pitcairn Islands',0),(173,2,'Pitcairn Islands',0),(174,1,'Puerto Rico',0),(174,2,'Puerto Rico',0),(175,1,'Qatar',0),(175,2,'Qatar',0),(176,1,'Réunion',0),(176,2,'Réunion',0),(177,1,'Russia',0),(177,2,'Russia',0),(178,1,'Rwanda',0),(178,2,'Rwanda',0),(179,1,'St. Barthélemy',0),(179,2,'St. Barthélemy',0),(180,1,'St. Kitts & Nevis',0),(180,2,'St. Kitts & Nevis',0),(181,1,'St. Lucia',0),(181,2,'St. Lucia',0),(182,1,'St. Martin',0),(182,2,'St. Martin',0),(183,1,'St. Pierre & Miquelon',0),(183,2,'St. Pierre & Miquelon',0),(184,1,'St. Vincent & Grenadines',0),(184,2,'St. Vincent & Grenadines',0),(185,1,'Samoa',0),(185,2,'Samoa',0),(186,1,'San Marino',0),(186,2,'San Marino',0),(187,1,'São Tomé & Príncipe',0),(187,2,'São Tomé & Príncipe',0),(188,1,'Saudi Arabia',0),(188,2,'Saudi Arabia',0),(189,1,'Senegal',0),(189,2,'Senegal',0),(190,1,'Serbia',0),(190,2,'Serbia',0),(191,1,'Seychelles',0),(191,2,'Seychelles',0),(192,1,'Sierra Leone',0),(192,2,'Sierra Leone',0),(193,1,'Slovenia',0),(193,2,'Slovenia',0),(194,1,'Solomon Islands',0),(194,2,'Solomon Islands',0),(195,1,'Somalia',0),(195,2,'Somalia',0),(196,1,'South Georgia & South Sandwich Islands',0),(196,2,'South Georgia & South Sandwich Islands',0),(197,1,'Sri Lanka',0),(197,2,'Sri Lanka',0),(198,1,'Sudan',0),(198,2,'Sudan',0),(199,1,'Suriname',0),(199,2,'Suriname',0),(200,1,'Svalbard & Jan Mayen',0),(200,2,'Svalbard & Jan Mayen',0),(201,1,'Swaziland',0),(201,2,'Swaziland',0),(202,1,'Syria',0),(202,2,'Syria',0),(203,1,'Taiwan',0),(203,2,'Taiwan',0),(204,1,'Tajikistan',0),(204,2,'Tajikistan',0),(205,1,'Tanzania',0),(205,2,'Tanzania',0),(206,1,'Thailand',0),(206,2,'Thailand',0),(207,1,'Tokelau',1),(207,2,'Tokelau',1),(208,1,'Tonga',0),(208,2,'Tonga',0),(209,1,'Trinidad & Tobago',0),(209,2,'Trinidad & Tobago',0),(210,1,'Tunisia',0),(210,2,'Tunisia',0),(211,1,'Turkey',0),(211,2,'Turkey',0),(212,1,'Turkmenistan',0),(212,2,'Turkmenistan',0),(213,1,'Turks & Caicos Islands',0),(213,2,'Turks & Caicos Islands',0),(214,1,'Tuvalu',0),(214,2,'Tuvalu',0),(215,1,'Uganda',0),(215,2,'Uganda',0),(216,1,'Ukraine',0),(216,2,'Ukraine',0),(217,1,'United Arab Emirates',0),(217,2,'United Arab Emirates',0),(218,1,'Uruguay',0),(218,2,'Uruguay',0),(219,1,'Uzbekistan',0),(219,2,'Uzbekistan',0),(220,1,'Vanuatu',0),(220,2,'Vanuatu',0),(221,1,'Venezuela',0),(221,2,'Venezuela',0),(222,1,'Vietnam',0),(222,2,'Vietnam',0),(223,1,'British Virgin Islands',0),(223,2,'British Virgin Islands',0),(224,1,'U.S. Virgin Islands',0),(224,2,'U.S. Virgin Islands',0),(225,1,'Wallis & Futuna',0),(225,2,'Wallis & Futuna',0),(226,1,'Western Sahara',0),(226,2,'Western Sahara',0),(227,1,'Yemen',0),(227,2,'Yemen',0),(228,1,'Zambia',0),(228,2,'Zambia',0),(229,1,'Zimbabwe',0),(229,2,'Zimbabwe',0),(230,1,'Albania',0),(230,2,'Albania',0),(231,1,'Afghanistan',0),(231,2,'Afghanistan',0),(232,1,'Antarctica',0),(232,2,'Antarctica',0),(233,1,'Bosnia & Herzegovina',0),(233,2,'Bosnia & Herzegovina',0),(234,1,'Bouvet Island',0),(234,2,'Bouvet Island',0),(235,1,'British Indian Ocean Territory',0),(235,2,'British Indian Ocean Territory',0),(236,1,'Bulgaria',0),(236,2,'Bulgaria',0),(237,1,'Cayman Islands',0),(237,2,'Cayman Islands',0),(238,1,'Christmas Island',0),(238,2,'Christmas Island',0),(239,1,'Cocos (Keeling) Islands',0),(239,2,'Cocos (Keeling) Islands',0),(240,1,'Cook Islands',0),(240,2,'Cook Islands',0),(241,1,'French Guiana',0),(241,2,'French Guiana',0),(242,1,'French Polynesia',0),(242,2,'French Polynesia',0),(243,1,'French Southern Territories',0),(243,2,'French Southern Territories',0),(244,1,'Åland Islands',0),(244,2,'Åland Islands',0);
INSERT INTO `provinces` VALUES (326,113,3,'BHD',1,1),(327,113,3,'NIW',1,1),(328,113,3,'BSR',1,1),(329,113,3,'NJF',1,1),(330,113,3,'KAR',1,1),(331,113,3,'MYS',1,1),(332,113,3,'KIK',1,1),(333,113,3,'ERB',1,1),(334,113,3,'SUL',1,1),(335,113,3,'DHK',1,1),(336,113,3,'SDN',1,1),(337,113,3,'ANB',1,1),(338,113,3,'DYA',1,1),(339,113,3,'KUT',1,1),(340,113,3,'NSR',1,1),(341,113,3,'SAM',1,1),(342,113,3,'DWN',1,1),(343,113,3,'BAB',1,1);
INSERT INTO `province_lang` VALUES (326,1,'Baghdad',1),(326,2,'بغداد',1),(326,3,'بغداد',1),(327,1,'Ninawa',1),(327,2,'نينوى',1),(327,3,'نينوى',1),(328,1,'Basrah',1),(328,2,'البصرة',1),(328,3,'البصرة',1),(329,1,'Najaf',1),(329,2,'النجف',1),(329,3,'النجف',1),(330,1,'Karbala',1),(330,2,'كربلاء',1),(330,3,'كربلاء',1),(331,1,'Maysan',1),(331,2,'ميسان',1),(331,3,'ميسان',1),(332,1,'Kirkuk',1),(332,2,'كركوك',1),(332,3,'كركوك',1),(333,1,'Erbil',1),(333,2,'اربيل',1),(333,3,'اربيل',1),(334,1,'Sulaymaniya',1),(334,2,'السليمانية',1),(334,3,'السليمانية',1),(335,1,'Dahuk',1),(335,2,'دهوك',1),(335,3,'دهوك',1),(336,1,'Salah ad Din',1),(336,2,'صلاح الدين',1),(336,3,'صلاح الدين',1),(337,1,'Anbar',1),(337,2,'الانبار',1),(337,3,'الانبار',1),(338,1,'Diyala',1),(338,2,'ديالى',1),(338,3,'ديالى',1),(339,1,'Kut',1),(339,2,'الكوت',1),(339,3,'الكوت',1),(340,1,'Nasiriyah',1),(340,2,'الناصرية',1),(340,3,'الناصرية',1),(341,1,'Samawah',1),(341,2,'السماوة',1),(341,3,'السماوة',1),(342,1,'Diwaniyah',1),(342,2,'الديوانية',1),(342,3,'الديوانية',1),(343,1,'Babil',1),(343,2,'Babil',1),(343,3,'Babil',1);
INSERT INTO `sub_state` VALUES (1,326,1),(2,326,1),(3,326,1),(4,326,1),(5,326,1),(6,328,1),(7,327,1),(8,326,1),(9,326,1),(10,326,1),(11,326,1),(12,326,1),(13,326,1),(14,326,1),(15,326,1),(16,326,1),(17,326,1),(18,328,1),(19,328,1),(20,328,1),(21,328,1),(22,328,1),(23,328,1),(24,328,1),(25,328,1),(26,328,1),(27,328,1),(28,329,1),(29,329,1),(30,329,1),(31,329,1),(32,329,1),(33,329,1),(34,329,1),(35,329,1),(36,330,1),(37,330,1),(38,330,1),(39,330,1),(40,330,1),(41,330,1),(42,331,1),(43,331,1),(44,331,1),(45,331,1),(46,331,1),(47,331,1),(48,331,1),(49,332,1),(50,333,1),(51,333,1),(52,333,1),(53,333,1),(54,334,1),(55,334,1),(56,334,1),(57,334,1),(58,334,1),(59,335,1),(60,335,1),(61,335,1),(62,335,1),(63,336,1),(64,336,1),(65,336,1),(66,336,1),(67,336,1),(68,337,1),(69,337,1),(70,337,1),(71,337,1),(72,338,1),(73,338,1),(74,338,1),(75,338,1),(76,338,1),(77,338,1),(78,338,1),(79,338,1),(80,338,1),(81,339,1),(82,339,1),(83,339,1),(84,339,1),(85,339,1),(86,339,1),(87,340,1),(88,340,1),(89,340,1),(90,340,1),(91,340,1),(92,340,1),(93,340,1),(94,340,1),(95,340,1),(96,340,1),(97,340,1),(98,340,1),(99,340,1),(100,341,1),(101,341,1),(102,341,1),(103,341,1),(104,341,1),(105,342,1),(106,342,1),(107,342,1),(108,342,1),(109,342,1),(110,342,1),(111,342,1),(112,342,1),(113,342,1),(114,343,1),(115,343,1),(116,343,1),(117,343,1),(118,343,1),(119,343,1),(120,343,1),(121,343,1),(122,343,1),(123,343,1);
INSERT INTO `sub_state_lang` VALUES (1,1,'Karkh',1),(1,2,'كرخ',1),(1,3,'كرخ',1),(2,1,'Resafa',1),(2,2,'رصافة',1),(2,3,'رصافة',1),(3,1,'Bismayah',1),(3,2,'بسمايه',1),(3,3,'بسمايه',1),(4,1,'Mahmoodya',1),(4,2,'محمودية',1),(4,3,'محمودية',1),(5,1,'Taji',1),(5,2,'التاجي',1),(5,3,'التاجي',1),(6,1,'City Center',1),(6,2,'مركز المدينة',1),(6,3,'مركز المدينة',1),(7,1,'Mosul',1),(7,2,'Mosul',1),(7,3,'Mosul',1),(8,1,'Abo Ghraib',1),(8,2,'ابو غريب',1),(8,3,'ابو غريب',1),(9,1,'Latifiah',1),(9,2,'اللطيفية',1),(9,3,'اللطيفية',1),(10,1,'Kamaliyah',1),(10,2,'الكمالية',1),(10,3,'الكمالية',1),(11,1,'Hussainyah',1),(11,2,'الحسينية',1),(11,3,'الحسينية',1),(12,1,'Rashidiya',1),(12,2,'الراشدية',1),(12,3,'الراشدية',1),(13,1,'Bob Alsham',1),(13,2,'بوب الشام',1),(13,3,'بوب الشام',1),(14,1,'Nahrawan',1),(14,2,'النهروان',1),(14,3,'النهروان',1),(15,1,'sabe\' Alboor',1),(15,2,'سبع البور',1),(15,3,'سبع البور',1),(16,1,'Rudwaniya',1),(16,2,'الرضوانبة',1),(16,3,'الرضوانبة',1),(17,1,'Yousifiyah',1),(17,2,'اليوسفية',1),(17,3,'اليوسفية',1),(18,1,'Umm Qasr',1),(18,2,'ام قصر',1),(18,3,'ام قصر',1),(19,1,'Karmah',1),(19,2,'الكرمة',1),(19,3,'الكرمة',1),(20,1,'Safwan',1),(20,2,'صفوان',1),(20,3,'صفوان',1),(21,1,'Zubayr',1),(21,2,'االزبير',1),(21,3,'االزبير',1),(22,1,'Qarnah',1),(22,2,'القرنة',1),(22,3,'القرنة',1),(23,1,'Brjyah',1),(23,2,'البرجية',1),(23,3,'البرجية',1),(24,1,'Sha\'eeba',1),(24,2,'الشعيبة',1),(24,3,'الشعيبة',1),(25,1,'Abo Al-Khaseeb',1),(25,2,'ابي الخصيب',1),(25,3,'ابي الخصيب',1),(26,1,'Harsah',1),(26,2,'الهارسة',1),(26,3,'الهارسة',1),(27,1,'Madinah',1),(27,2,'المدينة',1),(27,3,'المدينة',1),(28,1,'City Center',1),(28,2,'مركز المدينة',1),(28,3,'مركز المدينة',1),(29,1,'Kufah',1),(29,2,'الكوفة',1),(29,3,'الكوفة',1),(30,1,'Meshkhab',1),(30,2,'المشخاب',1),(30,3,'المشخاب',1),(31,1,'Qadisiyyah',1),(31,2,'قادسية',1),(31,3,'قادسية',1),(32,1,'Abasiyyah',1),(32,2,'عباسية',1),(32,3,'عباسية',1),(33,1,'Haidariyyah',1),(33,2,'الحيدرية',1),(33,3,'الحيدرية',1),(34,1,'Cement Factory',1),(34,2,'معمل الاسمنت',1),(34,3,'معمل الاسمنت',1),(35,1,'Radawiyyah',1),(35,2,'رضوية',1),(35,3,'رضوية',1),(36,1,'City Center',1),(36,2,'مركز المدينة',1),(36,3,'مركز المدينة',1),(37,1,'Twayreach',1),(37,2,'طويريج',1),(37,3,'طويريج',1),(38,1,'Ateshi',1),(38,2,'عطيشي',1),(38,3,'عطيشي',1),(39,1,'Hasinah',1),(39,2,'حسينة',1),(39,3,'حسينة',1),(40,1,'Ibrahimiyah',1),(40,2,'الابراهيمية',1),(40,3,'الابراهيمية',1),(41,1,'Ibn Hayyan College',1),(41,2,'جامعة بن حيان',1),(41,3,'جامعة بن حيان',1),(42,1,'City Center',1),(42,2,'مركز المدينة',1),(42,3,'مركز المدينة',1),(43,1,'Majar',1),(43,2,'المجر',1),(43,3,'المجر',1),(44,1,'Kal\'ah',1),(44,2,'القلعة',1),(44,3,'القلعة',1),(45,1,'Kahlaa',1),(45,2,'الكحلاء',1),(45,3,'الكحلاء',1),(46,1,'Msharah',1),(46,2,'المشرح',1),(46,3,'المشرح',1),(47,1,'Maymonah',1),(47,2,'ميمونة',1),(47,3,'ميمونة',1),(48,1,'Salam',1),(48,2,'السلام',1),(48,3,'السلام',1),(49,1,'City Center',1),(49,2,'مركز المدينة',1),(49,3,'مركز المدينة',1),(50,1,'City Center',1),(50,2,'مركز المدينة',1),(50,3,'مركز المدينة',1),(51,1,'Qush Tappeh',1),(51,2,'قوش تبة',1),(51,3,'قوش تبة',1),(52,1,'Shaqlawa',1),(52,2,'شقلاوة',1),(52,3,'شقلاوة',1),(53,1,'Kalak',1),(53,2,'كلك',1),(53,3,'كلك',1),(54,1,'City Center',1),(54,2,'مركز المدينة',1),(54,3,'مركز المدينة',1),(55,1,'Raniyah',1),(55,2,'رانية',1),(55,3,'رانية',1),(56,1,'Binjoin',1),(56,2,'بنجوين',1),(56,3,'بنجوين',1),(57,1,'Halabja',1),(57,2,'حلبجة',1),(57,3,'حلبجة',1),(58,1,'Bazan',1),(58,2,'بازان',1),(58,3,'بازان',1),(59,1,'City Center',1),(59,2,'مركز المدينة',1),(59,3,'مركز المدينة',1),(60,1,'Zakho',1),(60,2,'زاخو',1),(60,3,'زاخو',1),(61,1,'Aqra',1),(61,2,'عقرة',1),(61,3,'عقرة',1),(62,1,'Diyar Bakir',1),(62,2,'ديار بكر',1),(62,3,'ديار بكر',1),(63,1,'City Center',1),(63,2,'City Center',1),(63,3,'City Center',1),(64,1,'Samarra',1),(64,2,'Samarra',1),(64,3,'Samarra',1),(65,1,'Tikrit',1),(65,2,'Tikrit',1),(65,3,'Tikrit',1),(66,1,'Taji',1),(66,2,'Taji',1),(66,3,'Taji',1),(67,1,'Balad',1),(67,2,'Balad',1),(67,3,'Balad',1),(68,1,'City Center',1),(68,2,'مركز المدينة',1),(68,3,'مركز المدينة',1),(69,1,'Fallujah',1),(69,2,'الفلوجة',1),(69,3,'الفلوجة',1),(70,1,'Khalidiyah',1),(70,2,'الخالدية',1),(70,3,'الخالدية',1),(71,1,'Karmah',1),(71,2,'الكرمة',1),(71,3,'الكرمة',1),(72,1,'City Center',1),(72,2,'مركز المدينة',1),(72,3,'مركز المدينة',1),(73,1,'Baqubah',1),(73,2,'بعقوبة',1),(73,3,'بعقوبة',1),(74,1,'Shahrban - Muqdadiyah',1),(74,2,'المقدادية',1),(74,3,'المقدادية',1),(75,1,'Khals',1),(75,2,'خالص',1),(75,3,'خالص',1),(76,1,'Khanaqin',1),(76,2,'خانقين',1),(76,3,'خانقين',1),(77,1,'Kalar',1),(77,2,'كلار',1),(77,3,'كلار',1),(78,1,'Baladroz',1),(78,2,'بلدروز',1),(78,3,'بلدروز',1),(79,1,'Kan\'an',1),(79,2,'كنعان',1),(79,3,'كنعان',1),(80,1,'Jalawla',1),(80,2,'جلولاء',1),(80,3,'جلولاء',1),(81,1,'City Center',1),(81,2,'مركز المدينة',1),(81,3,'مركز المدينة',1),(82,1,'Aziziyah',1),(82,2,'العزيزية',1),(82,3,'العزيزية',1),(83,1,'Zbidiyah',1),(83,2,'زبيدية',1),(83,3,'زبيدية',1),(84,1,'Badrah',1),(84,2,'بدرة',1),(84,3,'بدرة',1),(85,1,'Aldabony',1),(85,2,'الدبوني',1),(85,3,'الدبوني',1),(86,1,'Alhai Shahmia',1),(86,2,'االحي شحمية',1),(86,3,'االحي شحمية',1),(87,1,'City Center',1),(87,2,'مركز المدينة',1),(87,3,'مركز المدينة',1),(88,1,'Fajir',1),(88,2,'فجر',1),(88,3,'فجر',1),(89,1,'Al Naser',1),(89,2,'النصر',1),(89,3,'النصر',1),(90,1,'Al-Batha',1),(90,2,'البطحة',1),(90,3,'البطحة',1),(91,1,'Al-Fohood',1),(91,2,'الفهود',1),(91,3,'الفهود',1),(92,1,'Al-Gharaf',1),(92,2,'الغراف',1),(92,3,'الغراف',1),(93,1,'Al-Shtrah',1),(93,2,'الشطرة',1),(93,3,'الشطرة',1),(94,1,'Al-Jbaish',1),(94,2,'الجبايش',1),(94,3,'الجبايش',1),(95,1,'Al-Islah',1),(95,2,'الاصلاح',1),(95,3,'الاصلاح',1),(96,1,'Rufaii',1),(96,2,'الرفاعي',1),(96,3,'الرفاعي',1),(97,1,'Qalaah',1),(97,2,'قلعة',1),(97,3,'قلعة',1),(98,1,'Sukar',1),(98,2,'سكر',1),(98,3,'سكر',1),(99,1,'Souq Al-Shekh',1),(99,2,'سوق الشيوخ',1),(99,3,'سوق الشيوخ',1),(100,1,'City Center',1),(100,2,'مركز المدينة',1),(100,3,'مركز المدينة',1),(101,1,'Hadar',1),(101,2,'الحضر',1),(101,3,'الحضر',1),(102,1,'Rumaitha',1),(102,2,'الرميثة',1),(102,3,'الرميثة',1),(103,1,'Warkaa',1),(103,2,'الوركاء',1),(103,3,'الوركاء',1),(104,1,'Sweera',1),(104,2,'السويرة',1),(104,3,'السويرة',1),(105,1,'City Center',1),(105,2,'مركز المدينة',1),(105,3,'مركز المدينة',1),(106,1,'Shamiah',1),(106,2,'الشامية',1),(106,3,'الشامية',1),(107,1,'Daghrah',1),(107,2,'الداغرة',1),(107,3,'الداغرة',1),(108,1,'Afak',1),(108,2,'عفك',1),(108,3,'عفك',1),(109,1,'Sumer',1),(109,2,'سومر',1),(109,3,'سومر',1),(110,1,'Shafiiyah',1),(110,2,'الشافعية',1),(110,3,'الشافعية',1),(111,1,'Hamzah Al-Sharjih',1),(111,2,'الحمزة الشرجي',1),(111,3,'الحمزة الشرجي',1),(112,1,'Sadir',1),(112,2,'Sadir',1),(112,3,'Sadir',1),(113,1,'Mahnawi',1),(113,2,'المهناوي',1),(113,3,'المهناوي',1),(114,1,'City Center',1),(114,2,'مركز المدينة',1),(114,3,'مركز المدينة',1),(115,1,'Haswah',1),(115,2,'الحصوة',1),(115,3,'الحصوة',1),(116,1,'Tailaah',1),(116,2,'الطليعة',1),(116,3,'الطليعة',1),(117,1,'Qasem',1),(117,2,'القاسم',1),(117,3,'القاسم',1),(118,1,'Mahawiell',1),(118,2,'المحاويل',1),(118,3,'المحاويل',1),(119,1,'Showmli',1),(119,2,'الشوملي',1),(119,3,'الشوملي',1),(120,1,'Musayab',1),(120,2,'المسيب',1),(120,3,'المسيب',1),(121,1,'Saddat al Hindiyah',1),(121,2,'سدة الهندية',1),(121,3,'سدة الهندية',1),(122,1,'Abi Gharaq',1),(122,2,'ابي غرق',1),(122,3,'ابي غرق',1),(123,1,'Jibilah',1),(123,2,'جبيلة',1),(123,3,'جبيلة',1);
INSERT INTO `zone` VALUES (1,'Europe',1),(2,'North America',1),(3,'Asia',1),(4,'Africa',1),(5,'Oceania',1),(6,'South America',1),(7,'Europe (non-EU)',1),(8,'Central America/Antilla',1);






CREATE TABLE `tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL ,
  `open_at` TIME,
  `close_at` TIME,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `addedByUserId` int(11) NOT NULL ,

  PRIMARY KEY (`id`)

) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
 
 
CREATE TABLE `table_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` VARCHAR(150) NULL,
  `table_id` int(11) NOT NULL ,
  `lang_id` int(11) NOT NULL ,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;



CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  `password` VARCHAR(250) NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `addedByUserId` int(11) NOT NULL ,
  `country` int(11) NOT NULL ,
  `province` int(11) NOT NULL ,
  `phone` VARCHAR(50) NOT NULL,
  `subscription_date` TIMESTAMP NULL,
  PRIMARY KEY (`id`)
 
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;



CREATE TABLE `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `addedByUserId` int(11) NOT NULL ,
  `customer_id` int(11) NOT NULL ,
  `room_id` int(11) NOT NULL ,
  `table_id` int(11) NOT NULL ,
  `date_in` TIMESTAMP NULL,
  `date_out` TIMESTAMP NULL,
  `status` enum('pending','cancel','approve')  NOT NULL DEFAULT 'pending',

  PRIMARY KEY (`id`)
 
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;



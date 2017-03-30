




CREATE TABLE `cinque_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

CREATE TABLE `cinque_users_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `record_id` int(11) unsigned NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;


CREATE TABLE `cinque_clients` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` ENUM('individual', 'commercial-orginisation', 'nonprofit-orginisation') NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address_1` varchar(255) NOT NULL,
  `address_2` varchar(255) NOT NULL,
  `address_3` varchar(255) NOT NULL,
  `address_4` varchar(255) NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `contact_first_name` varchar(255) NOT NULL,
  `contact_last_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_telephone` varchar(255) DEFAULT NULL,
  `contact_mobile` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
  PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;


CREATE TABLE `cinque_clients_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `record_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` ENUM('individual', 'commercial-orginisation', 'nonprofit-orginisation') NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address_1` varchar(255) NOT NULL,
  `address_2` varchar(255) NOT NULL,
  `address_3` varchar(255) NOT NULL,
  `address_4` varchar(255) NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `contact_first_name` varchar(255) NOT NULL,
  `contact_last_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_telephone` varchar(255) DEFAULT NULL,
  `contact_mobile` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL
  PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;


CREATE TABLE `cinque_quotes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` ENUM('accepted', 'rejected', 'expired', 'draft') NOT NULL,
  `client_id` int(11) unsigned NOT NULL,
  `invoice_id` int(11) unsigned NOT NULL,
  `issued_date` timestamp NOT NULL,
  `expiry_date` timestamp DEFAULT NULL,
  `sub_total` numeric(15,4) DEFAULT NULL,
  `total` numeric(15,4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
  PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;


CREATE TABLE `cinque_quotes_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `record_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` ENUM('accepted', 'rejected', 'expired', 'draft') NOT NULL,
  `client_id` int(11) unsigned NOT NULL,
  `invoice_id` int(11) unsigned NOT NULL,
  `issued_date` timestamp NOT NULL,
  `expiry_date` timestamp DEFAULT NULL,
  `sub_total` numeric(15,4) DEFAULT NULL,
  `total` numeric(15,4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL
  PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;


CREATE TABLE `cinque_quote_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `quote_id` int(11) unsigned NOT NULL,
  `type` ENUM('addition', 'subtraction') NOT NULL,
  `sequence` int(11) unsigned NOT NULL,
  `description` timestamp NOT NULL,
  `quantity` timestamp NOT NULL,
  `rate` timestamp DEFAULT NULL,
  `price` numeric(15,4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
  PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

CREATE TABLE `cinque_quote_items_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `record_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `quote_id` int(11) unsigned NOT NULL,
  `type` ENUM('addition', 'subtraction') NOT NULL,
  `sequence` int(11) unsigned NOT NULL,
  `description` timestamp NOT NULL,
  `quantity` timestamp NOT NULL,
  `rate` timestamp DEFAULT NULL,
  `price` numeric(15,4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL
  PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;





CREATE TABLE `cinque_invoices` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` ENUM('outstanding', 'settled', 'draft') NOT NULL,
  `client_id` int(11) unsigned NOT NULL,
  `quote_id` int(11) unsigned NOT NULL,
  `issued_date` timestamp NOT NULL,
  `due_date` timestamp DEFAULT NULL,
  `sub_total` numeric(15,4) DEFAULT NULL,
  `total` numeric(15,4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
  PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;


CREATE TABLE `cinque_invoices_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `record_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` ENUM('outstanding', 'settled', 'draft') NOT NULL,
  `client_id` int(11) unsigned NOT NULL,
  `quote_id` int(11) unsigned NOT NULL,
  `issued_date` timestamp NOT NULL,
  `due_date` timestamp DEFAULT NULL,
  `sub_total` numeric(15,4) DEFAULT NULL,
  `total` numeric(15,4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL
  PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;


CREATE TABLE `cinque_invoice_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) unsigned NOT NULL,
  `type` ENUM('addition', 'subtraction') NOT NULL,
  `sequence` int(11) unsigned NOT NULL,
  `description` timestamp NOT NULL,
  `quantity` timestamp NOT NULL,
  `rate` timestamp DEFAULT NULL,
  `price` numeric(15,4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
  PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

CREATE TABLE `cinque_quote_items_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `record_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) unsigned NOT NULL,
  `type` ENUM('addition', 'subtraction') NOT NULL,
  `sequence` int(11) unsigned NOT NULL,
  `description` timestamp NOT NULL,
  `quantity` timestamp NOT NULL,
  `rate` timestamp DEFAULT NULL,
  `price` numeric(15,4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL
  PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;


CREATE TABLE `cinque_contracts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` ENUM('signed', 'unsigned') NOT NULL,
  `client_id` int(11) unsigned NOT NULL,
  `quote_id` int(11) unsigned NOT NULL,
  `issued_date` timestamp NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
  PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;


CREATE TABLE `cinque_contracts_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `record_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` ENUM('signed', 'unsigned') NOT NULL,
  `client_id` int(11) unsigned NOT NULL,
  `quote_id` int(11) unsigned NOT NULL,
  `issued_date` timestamp NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL
  PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;



CREATE TABLE `cinque_transactions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` ENUM('credit', 'debit') NOT NULL,
  `client_id` int(11) unsigned NOT NULL,
  `invoice_id` int(11) unsigned NOT NULL,
  `description` varchar(255) unsigned NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` numeric(15,4) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
  PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

CREATE TABLE `cinque_transactions_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `record_id` int(11) unsigned NOT NULL,
  `type` ENUM('credit', 'debit') NOT NULL,
  `client_id` int(11) unsigned NOT NULL,
  `invoice_id` int(11) unsigned NOT NULL,
  `description` varchar(255) unsigned NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` numeric(15,4) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL
  PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;


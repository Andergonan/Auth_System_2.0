CREATE SCHEMA IF NOT EXISTS `auth_system_2` DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci;

USE `auth_system_2`;

CREATE TABLE IF NOT EXISTS `auth_system_2`.`levels` (
    `id` INT NOT NULL,
    `level_name` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id`))
ENGINE = InnoDB;

INSERT INTO `auth_system_2`.`levels` (`id`, `level_name`) VALUES
(1, 'admin'),
(0, 'user');

CREATE TABLE IF NOT EXISTS `auth_system_2`.`users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
  	`username` varchar(50) NOT NULL,
  	`password` varchar(255) NOT NULL,
	`level_id` INT NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `auth_system_2`.`users` (`id`, `username`, `password`, `level_id`) VALUES 
(1, 'admin', '$2y$10$qn9f7Q3oPTFMKHSIUUFyQeRHrp8U3o.EEbGooUyQIS/spYKoyF8O.', 1);
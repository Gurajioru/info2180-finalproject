CREATE DATABASE IF NOT EXISTS bugme;

USE bugme;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
    `id` INTEGER AUTO_INCREMENT,
    `firstname` VARCHAR(40),
    `lastname` VARCHAR(40),
    `pwrd` VARCHAR(40),
    `email` VARCHAR(40),
    `date_joined` DATETIME default CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `issues`;
CREATE TABLE `issues`(
    `id` INTEGER AUTO_INCREMENT,
    `title` VARCHAR(40),
    `_description` TEXT,
    `_type` VARCHAR(40),
    `priority` VARCHAR(40),
    `_status` VARCHAR(40),
    `assigned_to` INTEGER,
    `created_by` INTEGER,
    `created` DATETIME default CURRENT_TIMESTAMP,
    `updated` DATETIME default CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);


GRANT ALL PRIVILEGES ON bugme.* TO 'admin'@'localhost' IDENTIFIED BY 'bugmin';
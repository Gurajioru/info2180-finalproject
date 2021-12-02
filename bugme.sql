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
CREATE TABLE `issues` (
    `id` INTEGER AUTO_INCREMENT,
    `title` VARCHAR(64),
    `_description` TEXT,
    `_priority` VARCHAR(64),
    `_type` VARCHAR(64),
    `_status` VARCHAR(64),
    `assigned_to` INTEGER,
    `created_by` INTEGER,
    `created` DATETIME,
    `updated` DATETIME,
    PRIMARY KEY(id));


GRANT ALL PRIVILEGES ON bugme.* TO 'admin'@'localhost' IDENTIFIED BY 'bugmin';
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
    `title` VARCHAR(40),
    `_description` TEXT,
    `priority` VARCHAR(40),
    `_type` VARCHAR(40),
    `_status` VARCHAR(40),
    `assigned_to` INTEGER,
    `created_by` INTEGER,
    `created` DATETIME,
    `updated` DATETIME,
    PRIMARY KEY(id));


GRANT ALL PRIVILEGES ON bugme.* TO 'admin'@'localhost' IDENTIFIED BY 'bugmin';

INSERT into users(firstname,lastname,pwrd,email,date_joined)
VALUES ("admin","account",'$2y$10$/cpZTUG7QJDRGuSU7euCV.UrXs4frTl2c',"admin@project2.com",NOW());

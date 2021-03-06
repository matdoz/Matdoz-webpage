CREATE DATABASE matdoz;

CREATE TABLE users(
    userID int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    username TINYTEXT NOT NULL,
    password LONGTEXT NOT NULL
);

CREATE TABLE posts(
    postID int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    author TINYTEXT NOT NULL,
    recipient TINYTEXT NOT NULL,
    message LONGTEXT NOT NULL,
    date TIMESTAMP
);

CREATE TABLE emails(
    mailID int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    author TINYTEXT NOT NULL,
    authorMail TINYTEXT NOT NULL,
    message LONGTEXT NOT NULL,
    date TIMESTAMP
);
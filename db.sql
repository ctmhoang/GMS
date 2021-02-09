CREATE DATABASE GMS;
USE GMS;

CREATE TABLE USERS (
     id int PRIMARY KEY AUTO_INCREMENT,
     usr VARCHAR(255) UNIQUE NOT NULL,
     pwd VARCHAR(255) NOT NULL,
     fst VARCHAR(255) NOT NULL,
     lst VARCHAR(255) NOT NULL
);

CREATE TABLE PHOTOS (
    id int PRIMARY KEY AUTO_INCREMENT,
    title varchar(255),
    description text,
    name varchar(255),
    type varchar(255),
    size int(11)
);
create database if not exists php_crud;

use php_crud;


create table if not exists users(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    surname varchar(20),
    firstName varchar(20),
    email varchar(20)
);

#syntax to run file in the command line: source path/file.sql
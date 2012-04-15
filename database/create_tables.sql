/*
    Script Creates All Tables and Associated Fields
*/
use webcomic;

CREATE TABLE news(
    id INT UNSIGNED NOT NULL auto_increment PRIMARY KEY,
    name VARCHAR(50),
    date_added DATE,
    article VARCHAR(2000)) ENGINE INNODB;

CREATE TABLE comics(
    id INT UNSIGNED NOT NULL auto_increment PRIMARY KEY,
    book VARCHAR(50),
    chapter INT,
    date_added DATE,
    image_path VARCHAR(50)) ENGINE INNODB;

CREATE TABLE book_names(
    id INT UNSIGNED NOT NULL auto_increment PRIMARY KEY,
    b_name VARCHAR(50)) ENGINE INNODB;

CREATE TABLE images(
    id INT UNSIGNED NOT NULL auto_increment PRIMARY KEY,
    i_name VARCHAR(50),
    image_path VARCHAR(50)) ENGINE INNODB;

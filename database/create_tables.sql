/*
    Script Creates All Tables and Associated Fields
*/

CREATE TABLE news(
    id INT UNSIGNED NOT NULL PRIMARY KEY,
    name VARCHAR(50),
    date_added DATE,
    article VARCHAR(2000)) ENGINE INNODB;

CREATE TABLE comics(
    id INT UNSIGNED NOT NULL PRIMARY KEY,
    book VARCHAR(50),
    chapter INT,
    date_added DATE,
    image_path VARCHAR(50)) ENGINE INNODB;

CREATE TABLE images(
    id INT UNSIGNED NOT NULL PRIMARY KEY,
    i_name VARCHAR(50),
    image_path VARCHAR(50)) ENGINE INNODB;

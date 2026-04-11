show databases;

use unjani;

show tables;

CREATE TABLE user
(
    id       INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
) ENGINE = INNODB;

desc user;
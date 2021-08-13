<?php

namespace migrations;

class poststable
{

    const UP = "CREATE TABLE posts (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            phone_no INT(10) UNSIGNED DEFAULT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";

    const DOWN = "DROP TABLE posts";
}

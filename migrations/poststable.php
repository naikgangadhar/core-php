<?php

namespace migrations;

class poststable
{

    const UP = "CREATE TABLE posts (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_id INT(6) UNSIGNED NOT NULL,
            content VARCHAR(255) NOT NULL,
            img_path VARCHAR(100) DEFAULT NULL,
            likes INT(10) UNSIGNED DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";

    const DOWN = "DROP TABLE posts";
}

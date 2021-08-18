<?php

namespace migrations;

class connectionstable
{

  const UP = "CREATE TABLE connections (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                user_id INT(6) UNSIGNED NOT NULL,
                connected_id INT(6) UNSIGNED NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";

  const DOWN = "DROP TABLE connections";
}

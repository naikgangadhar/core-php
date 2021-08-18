<?php

namespace migrations;

class commentstable
{

  const UP = "CREATE TABLE comments (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                post_id INT(6) UNSIGNED NOT NULL,
                commented_user_id INT(6) UNSIGNED NOT NULL,
                comment VARCHAR(255) NOT NULL,
                likes INT(6) UNSIGNED NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";

  const DOWN = "DROP TABLE comments";
}

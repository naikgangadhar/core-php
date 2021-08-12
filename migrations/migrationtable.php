<?php

include __DIR__ . '/../settings.php';

$conn = new mysqli(SERVERNAME, USER, PASSWORD, DBNAME);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE TABLE migration (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    batch_id INT(6) UNSIGNED,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
  echo "Table Migration created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();

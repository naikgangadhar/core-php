<?php

include __DIR__ . '/../settings.php';

$conn = new mysqli(SERVERNAME, USER, PASSWORD, DBNAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE TABLE posts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    phone_no INT(10) UNSIGNED DEFAULT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table posts created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

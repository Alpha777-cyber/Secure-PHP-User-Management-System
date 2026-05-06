<?php
$host = 'localhost';
$dbname = 'student_db';
$username = 'root';
$password = 'mu1ne2ze3ro4';

$conn = new mysqli($host, $username, $password, $dbname);

if($conn->connect_error){
    exit("Connection failed: " . $conn->connect_error);
}

$create_table = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    gender VARCHAR(10),
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($create_table)) {
}

$check_column = "SHOW COLUMNS FROM users LIKE 'created_at'";
$result = $conn->query($check_column);
if ($result->num_rows == 0) {
    $alter_table = "ALTER TABLE users ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP";
    $conn->query($alter_table);
}
?>
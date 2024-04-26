<!-- 51 Write scritpt using mysqli_query function. -->
<?php
$server = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($server, $username, $password);

$sql = "CREATE DATABASE IF NOT EXISTS Shyam4"; 
mysqli_query($conn, $sql);

$createTableSQL = "CREATE TABLE IF NOT EXISTS Shyam4.users (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	firstname VARCHAR(30) NOT NULL,l
	astname VARCHAR(30) NOT NULL,
	email VARCHAR(50),reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

mysqli_query($conn, $createTableSQL);


$insertDataSQL = "INSERT INTO Shyam4.users (firstname, lastname, email) VALUES 
    ('Shyam', 'Vaghela', 'Shyam@example.com'),
    ('Mohil', 'Dobariya', 'mohil@example.com'),
    ('Jeet', 'Dhokiya', 'jeet@example.com')";

mysqli_query($conn, $insertDataSQL);

?>

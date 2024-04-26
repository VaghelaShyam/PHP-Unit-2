<!-- 50 Write scritpt using mysqli_select_db function. -->

<?php
$server = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($server, $username, $password);

$sql = "CREATE DATABASE IF NOT EXISTS Shyam3"; // Added IF NOT EXISTS to avoid errors if the database already exists
mysqli_query($conn, $sql);

if ($conn && mysqli_errno($conn) == 0) {
    echo "Database created successfully<br>";

    // Select the "Shyam3" database
    if (mysqli_select_db($conn, "Shyam3")) {
        echo "Database selected successfully";
    } else {
        echo "Error selecting database: " . mysqli_error($conn);
    }
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
?>

<!-- 49 Write scritpt msyqli_errno function -->

<?php
$server = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($server, $username, $password);

$sql = "CREATE DATABASE Shyam1";
mysqli_query($conn, $sql);

if ($conn) {
    echo "Connection secured<br>";

    if (mysqli_errno($conn) == 0) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . mysqli_error($conn);
    }

} else {
    die("Sorry, we failed to connect: " . mysqli_connect_error());
}
?>

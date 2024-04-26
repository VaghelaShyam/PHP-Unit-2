<!-- 48 Write scritpt using mysqli_error function -->
<?php
$server = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($server, $username, $password);

if ($conn) {
    echo "Connection secured<br>";

    $sql = "CREATE DATABASE Shyam2";
    if (mysqli_query($conn, $sql)) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . mysqli_error($conn);
    }


    mysqli_close($conn);
    echo "<br>Connection closed";
} else {
    die("Sorry, we failed to connect: " . mysqli_connect_error());
}
?>

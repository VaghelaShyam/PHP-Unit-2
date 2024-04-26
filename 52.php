<!-- 52 Write scritpt using mysqli_fetch_array function. -->

<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "contacts"; 

$conn = mysqli_connect($server, $username, $password, $database);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT sn, email,dt FROM contactus";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
 
    while ($row = mysqli_fetch_array($result)) {
        echo "sn: " . $row["sn"] . "<br>";
        echo "email: " . $row["email"] .  "<br>";
        echo "dt: " . $row["dt"] . "<br>";
        echo "<br>";
    }
} else {
    echo "No records found";
}


mysqli_close($conn);
?>

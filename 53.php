<!-- 53 Write scritpt using mysqli_num_Rows function. -->


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
    echo "Number of rows: " . mysqli_num_rows($result);
} else {
    echo "No records found";
}


mysqli_close($conn);
?>

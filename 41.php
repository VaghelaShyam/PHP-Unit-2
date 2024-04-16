<!-- (41)When the query is sent from the JavaScript to the PHP file,

the following happens:
1. PHP opens a connection to a MySQL server
2. The correct person is found
3. An HTML table is created, filled with data, and sent back
to the "txtHint" placeholder -->

<html>
<head>
    <title>Instant Search</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Instant Search</h1>
    <input type="text" id="searchInput" placeholder="Type a name...">
    <div id="searchResults"></div>

    <script>
        $(document).ready(function(){
            $('#searchInput').on('input', function(){
                $.post('', {query: $(this).val()}, function(data){
                    $('#searchResults').html(data);
                });
            });
        });
    </script>

    <div id="txtHint"></div>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "udesh1");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL
    )";
    mysqli_query($conn, $sql);

    mysqli_query($conn, "INSERT INTO users (name, email) VALUES
        ('John Doe', 'john.doe@example.com'),
        ('Jane Smith', 'jane.smith@example.com'),
        ('Michael Johnson', 'michael.johnson@example.com')");

    if (isset($_POST['query'])) {
        $search = $_POST['query'];

        $sql = "SELECT * FROM users WHERE name LIKE ?"; // Using prepared statement
        $stmt = mysqli_prepare($conn, $sql);
        $searchTerm = "%$search%";
        mysqli_stmt_bind_param($stmt, "s", $searchTerm);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result === false) {
            echo "Error executing query: " . mysqli_error($conn);
        } elseif (mysqli_num_rows($result) > 0) {
            echo "<table border='1'><tr><th>Name</th><th>Email</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No results found";
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);
    ?>
</body>
</html>

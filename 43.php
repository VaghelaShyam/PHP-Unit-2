<!-- (43)Write script form data display using serialize. -->

<!DOCTYPE html>
<html>
<head>
    <title>Serialize Form Data</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Serialize Form Data</h1>
    <form id="formData">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>
        <input type="submit" value="Submit">
    </form>
    <div id="displayData"></div>

    <script>
        $(document).ready(function(){
            $('#formData').submit(function(e){
                e.preventDefault();

                var formData = $(this).serialize();
                $.post('', formData, function(response){
                    $('#displayData').html(response);
                });
            });
        });
    </script>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['email'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];

        echo "<h2>Form Data:</h2>";
        echo "<p>Name: $name</p>";
        echo "<p>Email: $email</p>";
    }
    ?>
</body>
</html>

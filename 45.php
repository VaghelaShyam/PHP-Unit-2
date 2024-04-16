<!-- (45)Write script display data using decoded form. -->

<!DOCTYPE html>
<html>
<head>
    <title>Decode Form Data</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Decode Form Data</h1>
    <form id="formData">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>
        <input type="submit" value="Submit">
    </form>
    <div id="displayData"></div>

    <script>
        $(function(){
            $('#formData').submit(function(e){
                e.preventDefault();
                $.post('', $(this).serialize(), function(response){
                    $('#displayData').html(response);
                });
            });
        });
    </script>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['email'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        echo "<h2>Form Data:</h2><p>Name: $name</p><p>Email: $email</p>";
    } ?>
</body>
</html>

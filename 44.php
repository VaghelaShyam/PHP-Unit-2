<!-- (44)Write script display data using encoded form. -->

<!DOCTYPE html>
<html>
<head>
    <title>Encode Form Data</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Encode Form Data</h1>
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
                $.post('', {formData: JSON.stringify($(this).serializeArray())}, function(response){
                    $('#displayData').html(response);
                });
            });
        });
    </script>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['formData'])) {
        $formData = json_decode($_POST['formData'], true);
        echo "<h2>Form Data:</h2>";
        foreach ($formData as $field) {
            echo "<p>{$field['name']}: {$field['value']}</p>";
        }
    } ?>
</body>
</html>

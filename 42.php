<!-- (42)Write Script on Jquery with ajax updating text files -->


<!DOCTYPE html>
<html>
<head>
    <title>Update Text File</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Update Text File</h1>
    <form id="updateForm">
        <label for="fileContent">Enter text:</label><br>
        <textarea id="fileContent" name="fileContent" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Update File">
    </form>
    <div id="responseMessage"></div>

    <script>
        $(document).ready(function(){
            $('#updateForm').submit(function(e){
                e.preventDefault();

                var content = $('#fileContent').val();
                $.post('', {fileContent: content}, function(response){
                    $('#responseMessage').html(response);
                });
            });
        });
    </script>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fileContent'])) {
        $content = $_POST['fileContent'];
        $file = 'data.txt';

        if (file_put_contents($file, $content) !== false) {
            echo "<script>$('#responseMessage').html('File updated successfully');</script>";
        } else {
            echo "<script>$('#responseMessage').html('Error updating file');</script>";
        }
    }
    ?>
</body>
</html>

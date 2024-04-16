<!-- (40)Write script in creates a simple interface where users can
type in a name and get instant search results using AJAX. -->

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

    <?php
    if (isset($_POST['query'])) {
        $result = array(
            array('name' => 'Shyam', 'email' => 'Shyam@example.com'),
            array('name' => 'Jane Smith', 'email' => 'jane.smith@example.com'),
            array('name' => 'Michael Johnson', 'email' => 'michael.johnson@example.com')
        );

        foreach ($result as $row) {
            echo '<div>' . $row['name'] . ' - ' . $row['email'] . '</div>';
        }

        if (empty($result)) {
            echo 'No results found';
        }
    }
    ?>
</body>
</html>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Contact book</title>
</head>

<body>
    <form>

        <?php 
            
            // Null coescing operator.
            $agenda = $_GET['agenda'] ?? array();

            // 'submit' key exists en global array $_GET? isset()
            if(isset($_GET['submit'])) {
                $name = $_GET['fname'];
                $second = $_GET['fsecond'];
                
                // $var is empty?
                if(empty($name)) {
                    echo "<p style='color:red'>Debe introducir un nombre!!</p><br />";
                } elseif(empty($second)) {
                    // destroy a variable
                    unset($agenda[$name]);
                } else {
                    $agenda[$name] = $second;
                }
            } 
        ?>

        <div style="align-items: items;">
            <?php 

            // iterate over key and value
            foreach ($agenda as $key => $value) {
                echo '<input type="hidden" name="agenda[' . $key . ']" ';
                echo 'value="' . $value . '"/>';
            }
        ?>

            <label for="name">Nombre:</label><br>
            <input type="text" id="fname" name="fname"><br>
            <label for="second">Segundo: </label><br>
            <input type="text" id="fsecond" name="fsecond"><br>
            <input type="submit" value="Submit" name="submit">
        </div>
    </form>



    <h2>Contacts:<br></h2>

    <?php
        if (!empty($agenda))
        {
            echo "<ul>";
                foreach ($agenda as $key => $value) {
                    echo "<li>" . $key . ': ' . $value . "</li>";
                }
            echo "</ul>";
        }
        ?>



</body>

</html>
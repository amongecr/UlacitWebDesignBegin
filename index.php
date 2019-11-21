<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Testing the page</title>
    </head>
    <body>
        <?php
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";

        //show data in the page
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT id, email, password FROM usuarios";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "id: " . $row["id"]. " - Name: " . $row["email"]. " " . $row["password"]. "<br>";
            }
        } else {
            echo "0 results";
        }
        
        
        //send statements to the database
        if (isset( $_POST['submit'] ) ) {
        $email = $_REQUEST['email'];
        
        echo $email;
        $mysqli_stmt = "insert into usuarios(id, email, password) values (4,'".$email."','a')";
        
        if (mysqli_query($conn, $mysqli_stmt)) {
            echo "Registro ingresado correctamente";
        } 
        else 
        {
            echo "Error: " . $mysqli_stmt . "" . mysqli_error($conn);
        }
    }
        
        

        ?>
    </body>
</html>

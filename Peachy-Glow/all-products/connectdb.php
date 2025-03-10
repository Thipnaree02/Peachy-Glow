<?php
    $servername = "localhost";
    $username = "root";
    $password = "87654321";
    $dbname = "shop";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if(!$conn){
        die ("Connection failed".mysqli_connect_error());
    }

    // echo "Connected";
?>

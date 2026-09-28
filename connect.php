<?php
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "forumprojekt";

    $conn = new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error) {
        die("Sikertelen csatlakozás" . $conn->connect_error);
    }

    echo "Sikeres csatlakozás";
?>
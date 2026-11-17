<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "forumprojekt";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Hiba a kapcsolódáskor: " . $conn->connect_error);
}
$success = "";
$error = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(
        isset($_FILES["file_upload"]) && $_FILES["file_upload"]["error"] == UPLOAD_ERR_OK)
        {
            $uploadDir = "/account/kepek/";

            if (move_uploaded_file(
                $_FILES["file_upload"]["tmp_name"],
                $uploadDir . $_FILES["file_upload"]["name"]
            )) {
                echo "$$$";
            } else { echo ":((";}
        }
    else {echo ":u";}
}



?>
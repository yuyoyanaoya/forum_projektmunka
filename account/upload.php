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
$success = "success";
$error = "error";


$uploadDir = "";
$uploadFile = $uploadDir . basename($_FILES['fileUpload']['name']);

if(move_uploaded_file($_FILES['fileUpload']['tmp_name'], $uploadFile)){
    echo "!!\n";
} else {
    echo "??\n";
}

/*if(isset($_POST['submit'])){
    $name = $_POST["name"];

    if(isset($_FILES['fileUpload']['name'])){
        $file_name = $_FILES['fileUpload']['name'];
        $file_tmp = $_FILES['fileUpload']['tmp_name'];


    }
}*/

$insertquery = "INSERT INTO filenev(fileName, username) VALUES('$uploadDir', 'sicc')";

$iquery = mysqli_query($conn, $insertquery);

/*if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(
        isset($_FILES["file_upload"]) && $_FILES["file_upload"]["error"] == UPLOAD_ERR_OK)
        {
            $uploadDir = "/assets";

            if (move_uploaded_file(
                $_FILES["file_upload"]["tmp_name"],
                $uploadDir . $_FILES["file_upload"]["name"]
            )) {
                echo "sikerült jön $ a $ cash";
            } else { echo "nem sikerült";}
        }
    else {echo "elrontottad";}
}*/
?>
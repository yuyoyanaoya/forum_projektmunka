<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="upload.php" method="POST" name="uploadPost" enctype="multipart/form-data">
        
        <label for="fileUpload">
            Choose a file:
        </label>
        
        <input type="file" name="fileUpload" id="fileUpload">
        
        <input type="submit" name="uploadBtn" value="Upload File">
    </form>

</body>
</html>
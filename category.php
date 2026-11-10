<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "forumprojekt";

$conn = new mysqli("localhost", "root", "", "forumprojekt");

if ($conn->connect_error) {
die("DB hiba: " . $conn->connect_error);
}

if (isset($_POST['save_category'])) {
    $katID = $_POST['katID'] ?? '';
    $katNev = $_POST['katNev'] ?? '';
    $katLeiras = $_POST['katLeiras'] ?? '';

    $stmt = $conn->prepare("INSERT INTO kategoriak (katID, katNev, katLeiras) VALUES (?, ?, ?)");
    $stmt->execute([$katID, $katNev, $katLeiras]);

    header("Location: zene.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Squall: Lurk more - it's never enough</title>
    <link rel="stylesheet" href="category.css">
    <link rel="icon" href="../assets/icon2.ico">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Imbue:opsz,wght@10..100,100..900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Habibi&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Habibi&family=Sansation:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>

  <script src="index.js" defer></script>
  <script src="newtopic.js" defer></script>

<body onload="idoMutat()">
    <div id="clockDIV"></div>

    
    <div id="titleDIV">
        <p id="title">Squall</p>
        <h2 id="subtitle">Lurk more - <i>it's never enough</i></h2>
    </div>

    <div id="navbar">
        <table>
            <tr>
                <th class="navbarLINK"><a href="#">Hirohito</a></th>
                <th class="navbarLINK"><a href="navbar/rules.php">Szabályzat</a></th>
                <th class="navbarLINK"><a href="#">Lorem</a></th>
                <th class="navbarLINK"><a href="#">Ipsum</a></th>
                <th class="navbarLINK"><a href="#">Dolor</a></th>
                <th class="navbarLINK"><a href="#">Sit</a></th>
            </tr>
        </table>
    </div>

  <main class="main-forum-container">
    <div class="topic-list-header">
      <div class="header-left">
        <a href="index/index.php" class="btn-back">Vissza</a>
        <h2 class="topic-title">Zene témakör</h2>
      </div>
    </div>
    <div class="topics-stack">
      <div class="topic-card">
        <div class="topic-main-info">
            <h2 class="topic-title"><a href="topic.php">Deconstructed Club és Dark Ambient felfedezések</a></h2>
            <p class="topic-excerpt">Ebben a topicban gyűjtsük össze a leghangulatosabb borongós, esős délutánokhoz illő ambient és deconstructe...</p>
        </div>
    </div>
  </main>
</div>
</body>
</html>
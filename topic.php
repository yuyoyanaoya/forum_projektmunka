<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "forumprojekt";

$conn = new mysqli("localhost", "root", "", "forumprojekt");

if ($conn->connect_error) {
die("DB hiba: " . $conn->connect_error);
}

$result = $conn->query(
"SELECT imageName FROM uzenetek ORDER BY uzenetID DESC"
);

if (isset($_POST['save_message'])) {
    $imageName = trim($_POST['imageName'] ?? '');

    if ($imageName !== '') {
        $stmt = $conn->prepare(
            "INSERT INTO uzenetek (imageName) VALUES (?)"
        );

        $stmt->bind_param("s", $imageName);
        $stmt->execute();
        $stmt->close();
    }

    header("Location: topic.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Squall: Lurk more - it's never enough</title>
    <link rel="stylesheet" href="topic.css">
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
        <h2 class="topic-title">Deconstructed Club és Dark Ambient felfedezések</h2>
      </div>
    </div>

    <div class="topics-stack">
      <div href="#" class="topic-card">
        <div class="topic-main-info">
            <p class="topic-excerpt">Ebben a topicban gyűjtsük össze a leghangulatosabb borongós, esős délutánokhoz illő ambient és deconstructe...</p>
            <div class="messages-list">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="message">
                        <p><?= nl2br(htmlspecialchars($row['imageName'], ENT_QUOTES, 'UTF-8')) ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
            <form method="POST" action="">
                <textarea name="imageName" placeholder="Írd meg az üzeneted..." rows="4" required></textarea>
                <button type="submit" name="save_message">Közzététel</button>
            </form>
        </div>
    </div>
  </main>
    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Squall: Lurk more - it's never enough</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="zene.css">
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
        <a href="#" class="btn-back">Vissza</a>
        <h2 class="topic-title">Zene témakör</h2>
      </div>
      <button class="btn-new-topic" onclick="alert('Új téma létrehozása ablak')">+ Új téma nyitása</button>
    </div>

    <div class="topics-stack">

      <a href="#" class="topic-card">
        <div class="topic-main-info">
          <h3 class="topic-name">Deconstructed Club és Dark Ambient felfedezések</h3>
          <p class="topic-excerpt">Ebben a topicban gyűjtsük össze a leghangulatosabb borongós, esős délutánokhoz illő ambient és deconstructe...</p>
          <div class="topic-meta">
            <span>Nyitotta: <strong class="author">Hirohito</strong></span>
            <span class="dot-divider">•</span>
            <span>Időpont: </span>
          </div>
        </div>
        <div class="topic-stats">
          <div class="stats-info">
            <span class="post-count"> hozzászólás</span>
            <span class="last-post-time">Utolsó: </span>
          </div>
        </div>
      </a>
  </main>

<div class="modal-backdrop" id="newTopicModal">
  <div class="modal-content">
    
    <div class="modal-header">
      <h3 class="modal-title">Új téma létrehozása</h3>
      <button class="modal-close-btn" id="closeModalBtn"></button>
    </div>

    <form id="newTopicForm">
      <div class="form-group">
        <label for="topicTitleInput">Téma címe</label>
        <input 
          type="text" 
          id="topicTitleInput" 
          placeholder="pl. Kedvenc szintetizátorok, album ajánlók..." 
          required
        >
      </div>

      <div class="form-group">
        <label for="topicAuthorInput">Szerző / Felhasználónév</label>
        <input 
          type="text" 
          id="topicAuthorInput" 
          placeholder="pl. Hirohito" 
          required
        >
      </div>

      <div class="form-group">
        <label for="topicDescInput">Kezdő bejegyzés szövege</label>
        <textarea 
          id="topicDescInput" 
          rows="4" 
          placeholder="Írd le, miről szóljon a diskurzus..." 
          required
        ></textarea>
      </div>

      <div class="modal-actions">
        <button type="button" class="btn-cancel" id="cancelModalBtn">Mégse</button>
        <button type="submit" class="btn-submit">Közzététel</button>
      </div>
    </form>
  </div>
</div>
</body>
</html>
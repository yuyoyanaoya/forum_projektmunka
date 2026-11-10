<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Squall - Settings</title>
    <link rel="stylesheet" href="index.css">
    <link rel="icon" href="../assets/icon2.ico">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Imbue:opsz,wght@10..100,100..900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Habibi&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Habibi&family=Sansation:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="settings.css">    
</head>
<body>

<script src="index.js" defer></script>

<body onload="idoMutat()">

    <div id="clockDIV"></div>

    
    <div id="titleDIV">
        <p id="title">Squall</p>
        <h2 id="subtitle">Lurk more - <i>it's never enough</i></h2>
    </div>

    <input id="searchInput" type="text" id="kereso" placeholder="Keresés">
    <button onclick="keres()">Keresés</button>
   
<div class="menu">
        
    <div class="menu2">

    </div>
    <div class="menu2">

    </div>
    <div class="menu2">

    </div>
</div>

<script>
    function kereses() {
            let szo = document.getElementById("searchInput").value.toLowerCase();
            if (!szo) return;

            clearHighlight();

            document.querySelectorAll("*").forEach(el => {
                if (el.childNodes.length === 1 && el.childNodes[0].nodeType === 3) {
                    let text = el.innerText;
                    if (text && text.toLowerCase().includes(szo)) {
                        el.innerHTML = text.replace(new RegExp(szo, "gi"), '<span class="highlight">$&</span>');
                    }
                }
            });
        }

        function clearHighlight() {
            document.querySelectorAll(".highlight").forEach(e => {
                e.replaceWith(e.textContent);
            });

            document.querySelectorAll("button,input").forEach(e => {
                e.style.background = "";
            });
        }
</script>
    
</body>
</html>
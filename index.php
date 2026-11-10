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

if($_SERVER["REQUEST_METHOD"]==="POST"){ 
    $action=$_POST["action"] ?? ""; 
    if($action==="register"){
        $email=trim($_POST["email"] ?? ""); $jelszo=trim($_POST["jelszo"] ?? "");
        if($email==="" || $jelszo===""){ 
            $error="Minden mezőt ki kell tölteni.";
        }else{
            $hash=password_hash($jelszo,PASSWORD_DEFAULT); 
            $stmt=$conn->prepare("INSERT INTO felhasznalo(jelszo, email) VALUES(?,?)"); 
            if($stmt){ $stmt->bind_param("ss",$hash, $email); 
            if($stmt->execute()){ 
                $success="Sikeres regisztráció!"; 
            }else{ 
                $error="Hiba a regisztrációnál."; 
            } 
            $stmt->close(); } } } if($action==="login"){ $email=trim($_POST["emaillog"] ?? ""); 
            $jelszo=$_POST["jelszolog"] ?? ""; 
            if($email==="" || $jelszo===""){ 
                $error="Add meg az emailt és a jelszót.";
            }else{ 
                $stmt=$conn->prepare("SELECT jelszo, email FROM felhasznalo WHERE email=?"); 
                if($stmt){ $stmt->bind_param("s",$email); 
                $stmt->execute(); $stmt->store_result(); 
                if($stmt->num_rows===1){ 
                    $stmt->bind_result($hash, $email); 
                    $stmt->fetch(); 
                    if(password_verify($jelszo, $hash)){ 
                        session_regenerate_id(true); 
                        $_SESSION["user_id"]=$userID; 
                        $_SESSION["user_name"]=$username;
                        $_SESSION["user_displayname"]=$displayName;
                        $_SESSION["user_password"]=$jelszo; 
                        $_SESSION["user_email"]=$email;
                        $_SESSION["user_keresztnev"]=$keresztnev;
                        $_SESSION["user_vezeteknev"]=$vezeteknev;
                        $_SESSION["user_datum"]=$szuletesiDatum;
                        $_SESSION["user_orszag"]=$orszag;
                        if($username=="admin"){
                            header("Location: index_admin.php"); 
                        }
                        else{ 
                            header("Location: index.php"); 
                        } exit; 
                    }
                    else{
                         $error="Hibás email vagy jelszó.";
                    } 
                }else{ 
                    $error="Hibás email vagy jelszó."; 
                } 
                $stmt->close(); 
            } 
        }
    }
} 
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Squall: Lurk more - it's never enough</title>
    <link rel="stylesheet" href="index.css">
    <link rel="icon" href="../assets/icon2.ico">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Imbue:opsz,wght@10..100,100..900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Habibi&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Habibi&family=Sansation:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
</head>

<script src="index.js" defer></script>

<body onload="idoMutat()">

<?php if ($success): ?>
    <div class="msg success"><?= $success ?></div>
<?php endif; ?>

<?php if ($error): ?>
    <div class="msg error"><?= $error ?></div>
<?php endif; ?>

    <div id="clockDIV"></div>

    
    <div id="titleDIV">
        <p id="title">Squall</p>
        <h2 id="subtitle">Lurk more - <i>it's never enough</i></h2>
        <button type="submit" class="accountBtn" onclick="loginMutat()">Bejelentkezés</button>
        <button type="submit" class="accountBtn" onclick="regMutat()">Regisztráció</button>
    </div>

    
    <div class="account" id="accountLogin">
        <h2>Bejelentkezés</h2><br>
        <form method="post" id="input">
            <input type="hidden" name="action" value="login">
            <input class="input_text" type="email" placeholder="Email: " name="emaillog" required></br>
            <input class="input_text" type="password" placeholder="Jelszo: " name="jelszolog" required></br>
            <input class="submit_gomb" type="submit" value="Bejelentkezés">
        </form>
    </div>

    <div class="account" id="accountRegister">
        <h2>Regisztráció</h2><br>
        <form method="post" id="input">
            <input type="hidden" name="action" value="register">
            <input class="input_text" type="email" placeholder="Email: " name="email" required></br>
            <input class="input_text" type="password" placeholder="Jelszo: " name="jelszo" required></br>
            <input class="submit_gomb" type="submit" value="Regisztráció">
        </form>
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

    <div id="kategoriak">
        <table>
            <tr>
                <th class="kategoriakTablaElem"><h2 class="felsoSor">Zene</h2></th>
                <th class="kategoriakTablaElem"><h2 class="felsoSor">Tech</h2></th>
                <th class="kategoriakTablaElem"><h2 class="felsoSor">Gasztronómia</h2></th>
            </tr>
            <tr>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
            </tr>
            <tr>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
            </tr>
            <tr>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
            </tr>
            <tr><td><hr></td></tr>
            <tr>
                <th class="kategoriakTablaElem"><h2>Kábítószerek</h2></th>
                <th class="kategoriakTablaElem"><h2>Pörköltfesztivál</h2></th>
                <th class="kategoriakTablaElem"><h2>Persona 4 Golden</h2></th>
            </tr>
            <tr>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
            </tr>
            <tr><td><hr></td></tr>
            <tr>
                <th class="kategoriakTablaElem"><h2 class="felsoSor">Zene</h2></th>
                <th class="kategoriakTablaElem"><h2 class="felsoSor">Tech</h2></th>
                <th class="kategoriakTablaElem"><h2 class="felsoSor">Gasztronómia</h2></th>
            </tr>
            <tr>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
            </tr>
            <tr>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
            </tr>
            <tr>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
            </tr>
            <tr><td><hr></td></tr>
            <tr>
                <th class="kategoriakTablaElem"><h2>Kábítószerek</h2></th>
                <th class="kategoriakTablaElem"><h2>Pörköltfesztivál</h2></th>
                <th class="kategoriakTablaElem"><h2>Persona 4 Golden</h2></th>
            </tr>
            <tr>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
            </tr>
            <tr><td><hr></td></tr>
            <tr>
                <th class="kategoriakTablaElem"><h2 class="felsoSor">Zene</h2></th>
                <th class="kategoriakTablaElem"><h2 class="felsoSor">Tech</h2></th>
                <th class="kategoriakTablaElem"><h2 class="felsoSor">Gasztronómia</h2></th>
            </tr>
            <tr>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
            </tr>
            <tr>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
            </tr>
            <tr>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
            </tr>
            <tr><td><hr></td></tr>
            <tr>
                <th class="kategoriakTablaElem"><h2>Kábítószerek</h2></th>
                <th class="kategoriakTablaElem"><h2>Pörköltfesztivál</h2></th>
                <th class="kategoriakTablaElem"><h2>Persona 4 Golden</h2></th>
            </tr>
            <tr>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
            </tr>
            <tr><td><hr></td></tr>
            <tr>
                <th class="kategoriakTablaElem"><h2 class="felsoSor">Zene</h2></th>
                <th class="kategoriakTablaElem"><h2 class="felsoSor">Tech</h2></th>
                <th class="kategoriakTablaElem"><h2 class="felsoSor">Gasztronómia</h2></th>
            </tr>
            <tr>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
            </tr>
            <tr>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
            </tr>
            <tr>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
            </tr>
            <tr><td><hr></td></tr>
            <tr>
                <th class="kategoriakTablaElem"><h2>Kábítószerek</h2></th>
                <th class="kategoriakTablaElem"><h2>Pörköltfesztivál</h2></th>
                <th class="kategoriakTablaElem"><h2>Persona 4 Golden</h2></th>
            </tr>
            <tr>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
                <td class="kategoriakTablaElem"><a href="#">Lorem</a href="#">, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a>, <a href="#">adipisicing</a>, <a href="#">elit</a></td>
            </tr>
        </table>
    </div>

<?php
$conn->close();
?>
</body>
</html>
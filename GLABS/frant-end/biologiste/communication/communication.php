<?php 
// Connexion à la base de données
try {
    $con = new PDO("mysql:host=localhost;dbname=glabs", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erreur de connexion: " . $e->getMessage());
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $n = trim($_POST['username']);
    $m = trim($_POST['message']);

    if (!empty($n) && !empty($m)) {
        // Préparer la requête sécurisée
        $insert = $con->prepare("INSERT INTO chat (name, msg) VALUES (:name, :msg)");
        $insert->execute([
            ':name' => $n,
            ':msg' => $m
        ]);

        header('Location: communication.php');
        exit();
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>communication</title>
    <link rel="stylesheet" href="communication.css" >

</head>
<body>
    <div class="menu">
        <ul>
            <li class="profile">
                <div class="img-box">
                    <img src="../media biologiste/bio.png" alt="image de profile" >
                </div>
                <h2>Biologiste</h2>
            </li>
  <li>
                <a href="http://localhost/GLABS/frant-end/biologiste/gestion%20des%20analyses/Analyse.php">
                    <i class="material-icons">description </i>
                    <p>analyses</p>
                </a>
            </li>
            <li>
                <a href="http://localhost/GLABS/frant-end/biologiste/gestion%20des%20patients/patient.php">
                    <i class="material-icons">personal_injury</i>
                    <p>patients</p>
                </a>
            </li>
             <li>
                <a href="http://localhost/GLABS/frant-end/biologiste/Notes/Notes.php">
                    <i class="material-icons">note_alt</i>
                    <p>Notes</p>
                </a>
            </li>
            <li>
                <a href="http://localhost/GLABS/frant-end/biologiste/gestion%20des%20echontillons/Echontillons.php">
                    <i class="material-icons">science</i>
                    <p>échantillons</p>
                </a>
            </li>
            <li>
                <a href="http://localhost/GLABS/frant-end/biologiste/communication/communication.php">
                    <i class="material-icons">chat</i>
                    <p>communication</p>
                </a>
            </li>
            <li class="log-out">
                <a href="http://localhost/GLABS/frant-end/Accueil/Accueil.html">
                    <i class="material-icons">logout</i>
                    <p>log out</p>
                </a>
            </li>
        </ul>
    </div>
   
   
    <div class="section">
        <div class="chat-container">
            <?php
            $select = $con->prepare("SELECT * FROM chat ORDER BY id DESC");
            $select->execute();
            foreach ($select as $res) {
                echo '<div class="right message">';
                echo '<strong>' . htmlspecialchars($res['name']) . '</strong><br>';
                echo htmlspecialchars($res['msg']) . '<br>';
                echo '<small>' . $res['date'] . '</small>';
                echo '</div>';
            }
            ?>
        </div>

        <div class="input-container">
            <form action="communication.php" method="POST">
                <input type="text" id="username" name="username" placeholder="Nom d'utilisateur" required />
                <input type="text" id="message" name="message" placeholder="Écrivez votre message..." required />
                <button type="submit" name="submit">📩 Envoyer</button>
            </form>
        </div>
    </div>

    <script src="communication.js"></script>
</body>
</html>

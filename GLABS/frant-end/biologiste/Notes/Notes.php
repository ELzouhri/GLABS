<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>index</title>
    <link rel="stylesheet" href="Notes.css" >
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
                <a href="http://localhost/GLABS/frant-end/Accueil/Accueil.css">
                    <i class="material-icons">logout</i>
                    <p>log out</p>
                </a>
            </li>
    </div>
    <div class="section">
        <div class="scrollable-content">
            <div class="container">
            <h2>📝 Ajouter une Note Professionnelle</h2>
            
            <label for="title">Titre de la note :</label>
            <input type="text" id="title" placeholder="Ex. : Idée de projet, rappel..." />

            <label for="content">Contenu de la note :</label>
            <textarea id="content" placeholder="Écris ta note ici..."></textarea>

            <button onclick="ajouterNote()">Ajouter la note</button>
            
            <div class="note-item ">
                <button class="delete-btn" >x</button>
                <h3>title</h3>
                <div class="note-date">🗓️ date</div>
                <p>content</p>
            </div>





            </div>
              <div class="calculatrice">
                    <input type="text" id="ecran" disabled placeholder="0" />
                    <div class="clavier">
                    <button class="chiffre" onclick="ajouter('7')">7</button>
                    <button class="chiffre" onclick="ajouter('8')">8</button>
                    <button class="chiffre" onclick="ajouter('9')">9</button>
                    <button class="operateur" onclick="ajouter('/')">÷</button>

                    <button class="chiffre" onclick="ajouter('4')">4</button>
                    <button class="chiffre" onclick="ajouter('5')">5</button>
                    <button class="chiffre" onclick="ajouter('6')">6</button>
                    <button class="operateur" onclick="ajouter('*')">×</button>

                    <button class="chiffre" onclick="ajouter('1')">1</button>
                    <button class="chiffre" onclick="ajouter('2')">2</button>
                    <button class="chiffre" onclick="ajouter('3')">3</button>
                    <button class="operateur" onclick="ajouter('-')">−</button>

                    <button class="chiffre" onclick="ajouter('0')">0</button>
                    <button class="chiffre" onclick="ajouter('.')">.</button>
                    <button class="egal" onclick="calculer()">=</button>
                    <button class="operateur" onclick="ajouter('+')">+</button>

                    <button class="clear" onclick="effacer()">C</button>
    </div>
  </div>
        </div>
    </div>
    <script src="Notes.js"></script>
</body>
</html>
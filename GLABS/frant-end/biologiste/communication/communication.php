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

  <div class="chat-container " >
    <div class="right"><strong>${msg.username}</strong><br>${msg.text}<br><small>${formatTime(msg.time)}</small></div>
  </div>

  <div class="input-container">
    <form action="">
     <input type="text" id="username" placeholder="Nom d'utilisateur" />
     <input type="text" id="message" placeholder="Écrivez votre message..." />
     <button onclick="sendMessage()">📩Envoier</button>
    </form>
  </div>

    </div>
</body>
</html>
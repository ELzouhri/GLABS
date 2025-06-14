<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>biologistes</title>
    <link rel="stylesheet" href="biologistes.css" >
</head>
<body>
    <div class="menu">
        <ul>
            <li class="profile">
                <div class="img-box">
                    <img src="../media/imageProfile.png" alt="image de profile" >
                </div>
                <h2>Responsable</h2>
            </li>
            <li>
                <a href="http://localhost/GLABS/frant-end/respo/gestion%20des%20statistiques/statistiques.php">
                    <i class="material-icons">bar_chart</i>
                    <p>statistiques</p>
                </a>
            </li>
            <li>
                <a href="http://localhost/GLABS/frant-end/respo/gestion%20des%20stocks/stocks.php">
                    <i class="material-icons">local_shipping</i>
                    <p>stocks</p>
                </a>
            </li>
            <li>
                <a href="http://localhost/GLABS/frant-end/respo/gestion%20des%20utilisateurs/utilisateurs.php">
                    <i class="material-icons">person</i>
                    <p>utilisateurs</p>
                </a>
            </li>
            <li>
                <a href="http://localhost/GLABS/frant-end/respo/gestion%20des%20biologistes/biologistes.php">
                    <i class="material-icons">biotech</i>
                    <p>biologistes</p>
                </a>
            </li>
            <li>
                <a href="http://localhost/GLABS/frant-end/respo/gestion%20des%20RDV/RDV.php">
                    <i class="material-icons">event</i>
                    <p>Rendez_vous</p>
                </a>
            </li>
            <li>
                <a href="http://localhost/GLABS/frant-end/respo/communication/communication.php">
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
        <div class="scrollable-content">

    <div class="form-container">
<table id="Ajouter-utilisateur">
    <h2>Enregistrer un nouvel biologiste</h2>
    <form id="form-apprenant">
<tr>
    <td>
      <div class="input-group">
        <i class="fas fa-id-card"></i>
        <input type="text" placeholder="Votre identifiant" required>
      </div>
    </td>
    <td>
      <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="Votre prénom" required>
      </div>
    </td>
 </tr>
 <tr>
    <td>
      <div class="input-group">
        <i class="fas fa-users"></i>
        <input type="text" placeholder="Votre nom" required>
      </div>
    </td>
    <td>
      <div class="input-group">
        <i class="fas fa-envelope"></i>
        <input type="email" placeholder="Email@gmail.com" required>
      </div>
    </td>
 </tr>
 <tr>
    <td>
        <div class="input-group">
        <i class="fas fa-calendar-alt"></i>
        <input type="date" required>
      </div>
    </td>
    <td>
      <div class="input-group">
        <i class="fas fa-venus-mars"></i>
        <label><input type="radio" name="sexe" value="Homme" required> Homme</label>
        <label><input type="radio" name="sexe" value="Femme"> Femme</label>
      </div>
    </td>
 </tr>
 <tr>
    <td>
      <div class="input-group">
        <i class="fas fa-clock"></i>
        <input type="time" required>
      </div>
    </td>
    <td>
      <div class="input-group">
        <i class="fas fa-clock"></i>
        <input type="time" required>
      </div>
    </td>
 </tr>
<tr>
    <td>
      <div class="input-group">
        <i class="fas fa-home"></i>
        <input type="text" placeholder="Saisir votre adresse" required>
      </div>
    </td>
    <td>
      <div class="input-group">
        <i class="fas fa-layer-group"></i>
        <select required>
          <option value="">Groupe</option>
          <option value="Groupe A">Groupe A</option>
          <option value="Groupe B">Groupe B</option>
        </select>
      </div>
    </td>
</tr>   
<tr>

    <td colspan="2">
      <div class="buttons">
        <button type="submit" class="envoyer"><i class="fas fa-paper-plane"></i> Enregistrer</button>
        <button type="reset" class="effacer"><i class="fas fa-eraser"></i> Effacer</button>
                <button onclick="window.print()" class="imprimer"><i class="fas fa-print"></i> imprimer</button>
          <div class="search-container" id="searchBox">
              <input type="search" placeholder="Tapez votre recherche...">
          </div>
      </div>
    </td>
</tr>
</table>
</form>


  <table id="utilisateurTable">
    <thead>
      <tr>
        <th>ID</th>
        <th>Identifiant</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Date</th>
        <th>Genre</th>
        <th>Adresse</th>
        <th>débuts</th>
        <th>fin</th>
        <th>Rôle</th>
        <th>Groupe</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Jean Dupont</td>
        <td>jean@example.com</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Administrateur</td>
        <td></td>
        <td>
          <button class="edit-btn" onclick="modifierUtilisateur(this)"><i class="fas fa-edit"></i></button>
          <button class="delete-btn" onclick="supprimerUtilisateur(this)"><i class="fas fa-trash"></i>
</button>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</div>
</div>
</body>
</html>
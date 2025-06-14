<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>index</title>
    <link rel="stylesheet" href="RDV.css" >
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
    </div>
    
    <div class="section">
        <div class="scrollable-content">
<div class="container">
    <h1>Rendez-vous</h1>
    
    <button onclick="afficherFormulaire()">+ Ajouter un rendez-vous</button>
    <input type="text" id="search" placeholder="Rechercher par docteur..." onkeyup="rechercherRdv()">

    <div id="formAjout" style="display: none;">
      <h3>Ajouter un rendez-vous</h3>
      <input type="text" id="patient" placeholder="Nom du patient" required>
      <input type="text" id="docteur" placeholder="Nom du docteur" required>
      <input type="date" id="date" required>
      <input type="text" id="remarques" placeholder="Remarques">
      <select id="statut">
        <option value="Confirmé">Confirmé</option>
        <option value="Traité">Traité</option>
        <option value="En attente">En attente</option>
      </select>
      <select id="facture">
        <option value="Payé">Payé</option>
        <option value="Non payé">Non payé</option>
      </select>
      <br><br>
      <button onclick="enregistrerRdv()">📌 Enregistrer</button>
    </div>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Patient</th>
          <th>Docteur</th>
          <th>Date</th>
          <th>Remarques</th>
          <th>Statut</th>
          <th>Facture</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody id="rdvBody">

          <tr>
            <td>id</td>
            <td>patient</td>
            <td>docteur</td>
            <td>date</td>
            <td>remarques</td>
            <td>statut</td>
            <td><span class="${rdv.facture === 'Paye' ? 'paye' : 'non-payé'}">facture</span></td>
            <td><button class="btn-modifier">Modifier</button></td>
          </tr>
      </tbody>
    </table>
  </div>

            
        </div>
    </div>
    <script src="RDV.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Echontillons</title>
    <link rel="stylesheet" href="Echontillons.css" >
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
        <div class="scrollable-content">

              <div class="container">
    <form id="sample-form">
      <input type="text" id="nom" placeholder="Nom de l'échantillon" required />
      <input type="text" id="type" placeholder="Type" required />
      <input type="text" id="medecin" placeholder="nom de medecin" >
      <input type="date" id="date" required />
      <input type="text" id="utilisation" placeholder="utilisation Prévue" >
      <input type="nombre" id="duree" placeholder="Duréé(jour)" >
      <select id="statut">
           <option>En cours</option>
           <option>terminé</option>
           <option>rejeté</option>
      </select>
      <button type="submit" id="submit" >Ajouter</button>
    </form>
</div>   
    <div class="container">
    <div class="search">
      <input onkeyup="searchdata(this.value) " type="text" id="search" placeholder="search">
    </div>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Type</th>
          <th>Date</th>
          <th>médecin</th>
          <th>utilisation Prévue</th>
          <th>Duréé</th>
          <th>statut</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="tbody">
    
        <tr>
          <td>1</td>
          <td>nom</td>
          <td>type</td>
          <td>date</td>
          <td>medecin</td>
          <td>utilisation</td>
          <td>duree</td>
          <td>statut</td>
          <td><button onclick="updateData()" id="Modifier" ><i class="material-icons">edit</i></button><button onclick="deleteData()" id="Supprimer"><i class="material-icons">delete</i></button></td>
        </tr>
      </tbody>
    </table>
    </div>

        </div>
    </div>

    <script src="Echontillons.js"></script>
</body>
</html>
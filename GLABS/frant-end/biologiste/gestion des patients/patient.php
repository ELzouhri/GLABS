<?php

// Configuration de la base de données
$host = 'localhost';
$dbname = 'glabs';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// ========== AJOUTER UN PATIENT ==========
if (isset($_POST['ajouter'])) {
    $identifiant = $_POST['identifiant'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $date_naissance = $_POST['date_naissance'];
    $sexe = $_POST['sexe'];
    $telephone = $_POST['telephone'];
    $groupe_sanguin = $_POST['groupe_sanguin'];
    $adresse = $_POST['adresse'];

    $sql = "INSERT INTO patients (identifiant, prenom, nom, email, date_naissance, sexe, telephone, groupe_sanguin, adresse) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$identifiant, $prenom, $nom, $email, $date_naissance, $sexe, $telephone, $groupe_sanguin, $adresse])) {
        echo "<script>alert('Patient ajouté avec succès!');</script>";
    } else {
        echo "<script>alert('Erreur lors de l'ajout!');</script>";
    }
        header("Location: patient.php");
        exit();
}

// ========== SUPPRIMER UN PATIENT ==========
if (isset($_GET['supprimer'])) {
    $id = $_GET['supprimer'];
    
    $sql = "DELETE FROM patients WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$id])) {
        echo "<script>alert('Patient supprimé!');</script>";
    }
      header("Location: patient.php");
        exit();
}

// ========== MODIFIER UN PATIENT ==========
$patientAModifier = null;
if (isset($_GET['modifier_id'])) {
    $modifierId = $_GET['modifier_id'];
    $stmt = $pdo->prepare("SELECT * FROM patients WHERE id = ?");
    $stmt->execute([$modifierId]);
    $patientAModifier = $stmt->fetch(PDO::FETCH_ASSOC);
}
if (isset($_POST['modifier'])) {
    $id = $_POST['id'];
    $identifiant = $_POST['identifiant'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $date_naissance = $_POST['date_naissance'];
    $sexe = $_POST['sexe'];
    $telephone = $_POST['telephone'];
    $groupe_sanguin = $_POST['groupe_sanguin'];
    $adresse = $_POST['adresse'];

    $sql = "UPDATE patients SET identifiant=?, prenom=?, nom=?, email=?, date_naissance=?, sexe=?, telephone=?, groupe_sanguin=?, adresse=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$identifiant, $prenom, $nom, $email, $date_naissance, $sexe, $telephone, $groupe_sanguin, $adresse, $id])) {
        echo "<script>alert('Patient modifié avec succès!');</script>";
    }
}

// ========== RÉCUPÉRER TOUS LES PATIENTS ==========
$sql = "SELECT * FROM patients ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$patients = $stmt->fetchAll(PDO::FETCH_ASSOC);

// ========== RECHERCHE ==========
if (isset($_GET['recherche']) && !empty($_GET['recherche'])) {
    $recherche = '%' . $_GET['recherche'] . '%';
    $sql = "SELECT * FROM patients WHERE nom LIKE ? OR prenom LIKE ? OR identifiant LIKE ? ORDER BY id DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$recherche, $recherche, $recherche]);
    $patients = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>biologistes</title>
    <link rel="stylesheet" href="patient.css" >
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

    <div class="form-container">
<table id="Ajouter-utilisateur">
    <h2>Enregistrer un nouvel patient</h2>
    <form id="form-apprenant" action="patient.php" method="POST" >
          <?php if ($patientAModifier): ?>
              <input type="hidden" name="id" value="<?= $patientAModifier['id'] ?>">
          <?php endif; ?>
<tr>
    <td>
      <div class="input-group">
        <i class="fas fa-id-card" style="color: rgb(55, 255, 0);"></i>
        <input type="text" name="identifiant" value="<?= $patientAModifier ? $patientAModifier['identifiant'] : '' ?>" placeholder="Votre identifiant" required>
      </div>
    </td>
    <td>
      <div class="input-group">
        <i class="fas fa-user" style="color: rgb(55, 255, 0);"></i>
        <input type="text" name="prenom" value="<?= $patientAModifier ? $patientAModifier['prenom'] : '' ?>" placeholder="Votre prénom" required>
      </div>
    </td>
 </tr>
 <tr>
    <td>
      <div class="input-group">
        <i class="fas fa-users" style="color: rgb(55, 255, 0);"></i>
        <input type="text" name="nom" value="<?= $patientAModifier ? $patientAModifier['nom'] : '' ?>" placeholder="Votre nom" required>
      </div>
    </td>
    <td>
      <div class="input-group">
        <i class="fas fa-envelope" style="color: rgb(55, 255, 0);"></i>
        <input type="email"  name="email" value="<?= $patientAModifier ? $patientAModifier['email'] : '' ?>"  placeholder="Email@gmail.com" required>
      </div>
    </td>
 </tr>
 <tr>
    <td>
        <div class="input-group">
        <i class="fas fa-calendar-alt" style="color: rgb(55, 255, 0);"></i>
        <input type="date"  name="date_naissance" value="<?= $patientAModifier ? $patientAModifier['date_naissance'] : '' ?>" required>
      </div>
    </td>
    <td>
      <div class="input-group">
        <i class="fas fa-venus-mars" style="color: rgb(55, 255, 0);"></i>
        <label><input type="radio" name="sexe" value="Homme" value="<?= $patientAModifier ? $patientAModifier['sexe'] : '' ?>" required> Homme</label>
        <label><input type="radio" name="sexe" value="Femme" value="<?= $patientAModifier ? $patientAModifier['sexe'] : '' ?>"> Femme</label>
      </div>
    </td>
 </tr>
 <tr>
    <td>
      <div class="input-group">
        <i class="fas fa-phone" style="color: rgb(55, 255, 0);"></i>
        <input type="text" name="telephone" value="<?= $patientAModifier ? $patientAModifier['telephone'] : '' ?>" placeholder="Numéro de téléphone" required>
      </div>
    </td>
    <td>
      <div class="input-group">
        <i class="far fa-heart" style="color: rgb(55, 255, 0);"></i>
        <input type="text" name="groupe_sanguin" value="<?= $patientAModifier ? $patientAModifier['groupe_sanguin'] : '' ?>" placeholder="Groupe sanguin" required>
      </div>
    </td>
 </tr>
<tr>
    <td colspan="2">
      <div class="input-group">
        <i class="fas fa-home" style="color: rgb(55, 255, 0);"></i>
        <input type="text" name="adresse" value="<?= $patientAModifier ? $patientAModifier['adresse'] : '' ?>" placeholder="Saisir votre adresse" required>
      </div>
    </td>
</tr>   
<tr>
            <td></td>
    <td >
      <div class="buttons">
        <?php if ($patientAModifier): ?>
            <button type="submit" name="modifier" class="envoyer">
                <i class="fas fa-edit"></i> Modifier
            </button>
        <?php else: ?>
            <button type="submit" name="ajouter" class="envoyer">
                <i class="fas fa-paper-plane"></i> Enregistrer
            </button>
        <?php endif; ?>
        <button type="reset" class="effacer"><i class="fas fa-eraser"></i> Effacer</button>
        <button onclick="window.print()" class="imprimer"><i class="fas fa-print"></i> imprimer</button>

      </div>
    </td>
</tr>
</table>
</form>
 <form method="GET" style="display: flex; gap: 10px;">
          <div class="search-container" id="searchBox">
              <input type="search" name="recherche"  value="<?= isset($_GET['recherche']) ? $_GET['recherche'] : '' ?>" placeholder="Tapez votre recherche...">
          </div>
    <button style="background-color: black;" type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Rechercher
    </button>
  </form>
  <table id="utilisateurTable">
    <thead>
      <tr>
        <th>ID</th>
        <th>Identifiant</th>
        <th>Nom Prénom</th>
        <th>Email</th>
        <th>Date</th>
        <th>Genre</th>
        <th>tele</th>
        <th>Groupe sanguin</th>
        <th>address</th>
        <th>Actions</th>
      </tr>
    </thead>
            <tbody>
                <?php foreach ($patients as $patient): ?>
                <tr id="row-<?= $patient['id'] ?>">
                    <td><?= $patient['id'] ?></td>
                    <td><?= $patient['identifiant'] ?></td>
                    <td><?= $patient['prenom'] . ' ' . $patient['nom'] ?></td>
                    <td><?= $patient['email'] ?></td>
                    <td><?= $patient['date_naissance'] ?></td>
                    <td><?= $patient['sexe'] ?></td>
                    <td><?= $patient['telephone'] ?></td>

                    <td><?= $patient['groupe_sanguin'] ?></td>
                    <td><?= $patient['adresse'] ?></td>
        <td >
          <a href="?supprimer=<?= $patient['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce patient ?')">
              <button class="delete-btn"><i class="fas fa-trash"></i></button>
          </a>

          <a href="patient.php?modifier_id=<?= $patient['id'] ?>">
              <button class="edit-btn"><i class="fas fa-edit"></i></button>
          </a>
        </td>
                </tr>
                <?php endforeach; ?>
            </tbody>

  </table>
          <?php if (empty($patients)): ?>
            <p style="text-align: center; margin-top: 20px; color: #666;">
                <i class="fas fa-info-circle"></i> Aucun patient trouvé.
            </p>
        <?php endif; ?>
</div>
</div>
</div>



</body>
</html>

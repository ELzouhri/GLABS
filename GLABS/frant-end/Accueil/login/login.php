<?php
session_start();

// Classe de connexion a la base de donnees
class Database {
    private $pdo;

    public function __construct() {
        try {
            $host = 'localhost';
            $dbname = 'glabs';
            $user = 'root';
            $pass = '';

            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $this->pdo = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}

// Fonction pour nettoyer les entrees
function cleanInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = cleanInput($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $error = "Veuillez remplir tous les champs.";
    } else {
        try {
            $db = new Database();
            $pdo = $db->getConnection();

            // Requete vers la table "utilisateurs"
            $stmt = $pdo->prepare("SELECT id, prenom, nom, email, mot_de_passe, roles FROM utilisateurs WHERE email = :email LIMIT 1");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['mot_de_passe'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['prenom'] = $user['prenom'];
                $_SESSION['nom'] = $user['nom'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['roles'] = $user['roles'];
                $_SESSION['login_time'] = time();
                
            if ($user['roles'] === 'Administrateur') {
                header('Location: http://localhost/GLABS/frant-end/respo/gestion%20des%20utilisateurs/utilisateurs.php');
                exit();
            } elseif ($user['roles'] === 'biologiste') {
                header('Location: http://localhost/GLABS/frant-end/biologiste/gestion%20des%20patients/patient.php');
                exit();
            } else {
                $error = "Rôle non reconnu.";
            }

            } else {
                $error = "Email ou mot de passe incorrect.";
            }
        } catch (PDOException $e) {
            $error = "Erreur du serveur. Veuillez réessayer.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #3498db, #8e44ad);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
    }
    .login-container {
      background-color: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
      width: 100%;
      max-width: 400px;
    }
    .form-icon {
      margin-right: 8px;
      color: #8e44ad;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <h3 class="text-center mb-4"><i class="bi bi-box-arrow-in-right"></i> Connexion</h3>

    <?php if (!empty($error)) : ?>
      <div class="alert alert-danger text-center"><?= $error ?></div>
    <?php endif; ?>

    <form action="login.php" method="POST" novalidate>
      <div class="mb-3">
        <label for="email" class="form-label"><i class="bi bi-envelope form-icon"></i>Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Entrez votre email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label"><i class="bi bi-lock form-icon"></i>Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">
        <i class="bi bi-box-arrow-in-right"></i> Se connecter
      </button>
      <div class="text-center mt-3">
        <a href="#">Mot de passe oublié ?</a><br>
      </div>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

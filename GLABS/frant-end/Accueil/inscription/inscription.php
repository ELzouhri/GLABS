<?php
session_start();

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
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}

function cleanInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = cleanInput($_POST['nom'] ?? '');
    $prenom = cleanInput($_POST['prenom'] ?? '');
    $email = cleanInput($_POST['email'] ?? '');
    $roles = cleanInput($_POST['roles'] ?? '');
    $mot_de_passe = $_POST['mot_de_passe'] ?? '';
    $mot_de_passe_confirm = $_POST['mot_de_passe_confirmer'] ?? '';

    if (empty($nom) || empty($prenom) || empty($email) || empty($mot_de_passe) || empty($mot_de_passe_confirm) || empty($roles)) {
        $error = "Veuillez remplir tous les champs.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email invalide.";
    } elseif (strlen($mot_de_passe) < 6) {
        $error = "Le mot de passe doit contenir au moins 6 caractères.";
    } elseif ($mot_de_passe !== $mot_de_passe_confirm) {
        $error = "Les mots de passe ne correspondent pas.";
    } else {
        try {
            $db = new Database();
            $pdo = $db->getConnection();

            $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->fetch()) {
                $error = "Cet email est déjà utilisé.";
            } else {
                $hashed_mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);

                $insertStmt = $pdo->prepare("INSERT INTO utilisateurs (prenom, nom, email, mot_de_passe, roles) VALUES (:prenom, :nom, :email, :mot_de_passe, :roles)");
                $insertStmt->bindParam(':prenom', $prenom);
                $insertStmt->bindParam(':nom', $nom);
                $insertStmt->bindParam(':email', $email);
                $insertStmt->bindParam(':mot_de_passe', $hashed_mot_de_passe);
                $insertStmt->bindParam(':roles', $roles);
                $insertStmt->execute();

                $success = "Inscription réussie. Vous pouvez maintenant vous connecter.";
            }
        } catch (PDOException $e) {
            $error = "Erreur lors de l'inscription.";
            error_log("Erreur PDO : " . $e->getMessage());
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="inscription.css">
</head>
<body>

<div class="section">
    <div class="scrollable-content">
        <div class="form-container">

            <h2>Inscription</h2>

            <form id="form-apprenant" action="inscription.php" method="POST">
                <table id="Ajouter-utilisateur">
                    <tr>
                        <td>
                            <div class="input-group">
                                <i class="fas fa-user"></i>
                                <input type="text" name="prenom" placeholder="Votre prénom" required>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <i class="fas fa-users"></i>
                                <input type="text" placeholder="Votre nom" name="nom" required>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <i class="fas fa-envelope"></i>
                                <input type="email" name="email" placeholder="Email@gmail.com" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="mot de passe" name="mot_de_passe" required>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="confirmer mot de passe" name="mot_de_passe_confirmer" required>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <i class="fas fa-user-shield"></i>
                                <select name="roles" required>
                                    <option value="">Rôle</option>
                                    <option value="Administrateur">Administrateur</option>
                                    <option value="biologiste">Biologiste</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                </table>

                <button type="submit">Enregistrer</button>
            </form>

            <?php if ($error): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php elseif ($success): ?>
                <p style="color: green;"><?php echo $success; ?></p>
            <?php endif; ?>

        </div>
    </div>
</div>

<script src="inscription.js"></script>
</body>
</html>

<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "freya");

// Vérifie la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Récupérer les données du formulaire
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['pass'];
$role = 'client'; // par défaut

// Vérifie si l'email existe déjà
$sql_check = "SELECT * FROM users WHERE email = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("s", $email);
$stmt_check->execute();
$result = $stmt_check->get_result();

if ($result->num_rows > 0) {
    echo "Cet email est déjà utilisé.";
} else {
    // Hacher le mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insérer dans la base
    $sql_insert = "INSERT INTO users (nom, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bind_param("ssss", $name, $email, $hashed_password, $role);

    if ($stmt->execute()) {
        echo "Inscription réussie. Vous pouvez maintenant vous connecter.";
        // Redirection possible : header("Location: login.html");
    } else {
        echo "Erreur : " . $stmt->error;
    }
}

$stmt_check->close();
$stmt->close();
$conn->close();
?>

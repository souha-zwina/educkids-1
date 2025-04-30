<?php
require_once 'config.php';
require_once 'functions.php';

// Nouveaux identifiants que vous souhaitez utiliser
$nouveau_username = 'professeur';  // Changez ceci selon votre préférence
$nouveau_password = 'prof2024';    // Changez ceci selon votre préférence
$email = 'prof@example.com';       // Changez ceci selon votre préférence

// Hasher le nouveau mot de passe
$password_hash = password_hash($nouveau_password, PASSWORD_DEFAULT);

// Vérifier si un utilisateur existe déjà dans la table
$sql = "SELECT * FROM users LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Un utilisateur existe, mettre à jour le premier utilisateur
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['id'];
    
    $sql = "UPDATE users SET username = '$nouveau_username', password = '$password_hash', email = '$email' WHERE id = $user_id";
    if (mysqli_query($conn, $sql)) {
        echo "Utilisateur mis à jour avec succès.<br>";
        echo "Nouveau nom d'utilisateur: $nouveau_username<br>";
        echo "Nouveau mot de passe: $nouveau_password<br>";
    } else {
        echo "Erreur lors de la mise à jour de l'utilisateur: " . mysqli_error($conn);
    }
} else {
    // Aucun utilisateur n'existe, en créer un nouveau
    $sql = "INSERT INTO users (username, password, email) VALUES ('$nouveau_username', '$password_hash', '$email')";
    if (mysqli_query($conn, $sql)) {
        echo "Nouvel utilisateur créé avec succès.<br>";
        echo "Nom d'utilisateur: $nouveau_username<br>";
        echo "Mot de passe: $nouveau_password<br>";
    } else {
        echo "Erreur lors de la création de l'utilisateur: " . mysqli_error($conn);
    }
}

// Afficher la structure de la table users pour diagnostic
echo "<hr>Structure de la table users:<br>";
$sql = "DESCRIBE users";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "<table border='1'><tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Erreur lors de l'affichage de la structure de la table: " . mysqli_error($conn);
}

// Afficher tous les utilisateurs existants
echo "<hr>Utilisateurs existants:<br>";
$sql = "SELECT id, username, email FROM users";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Username</th><th>Email</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>{$row['id']}</td><td>{$row['username']}</td><td>{$row['email']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "Aucun utilisateur trouvé ou erreur: " . mysqli_error($conn);
}
?>
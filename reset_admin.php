<?php
require_once 'config.php';

// Nouveau mot de passe admin
$username = 'admin';
$password = 'admin123';
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Mettre à jour le mot de passe
$sql = "UPDATE users SET password = '$hashed_password' WHERE username = '$username'";

if (mysqli_query($conn, $sql)) {
    echo "<h2>Réinitialisation du mot de passe réussie!</h2>";
    echo "<p>Nom d'utilisateur: admin</p>";
    echo "<p>Mot de passe: admin123</p>";
    echo "<p><a href='index.php?page=login'>Cliquez ici pour vous connecter</a></p>";
} else {
    echo "Erreur lors de la réinitialisation du mot de passe: " . mysqli_error($conn);
}
?> 
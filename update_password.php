<?php
require_once 'config.php';

// Générer un hash pour "admin123"
$password = 'admin123';
$hash = password_hash($password, PASSWORD_DEFAULT);

echo "Hash généré: " . $hash . "<br>";

// Mettre à jour la base de données
$sql = "UPDATE users SET password = '$hash' WHERE username = 'admin'";
if (mysqli_query($conn, $sql)) {
    echo "Mot de passe mis à jour avec succès!";
} else {
    echo "Erreur: " . mysqli_error($conn);
}
?>
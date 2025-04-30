<?php
require_once 'config.php';

// Vérifier si la table users existe
$check_table = "SHOW TABLES LIKE 'users'";
$table_exists = mysqli_query($conn, $check_table);

if (mysqli_num_rows($table_exists) == 0) {
    // Créer la table users si elle n'existe pas
    $create_table = "CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    if (mysqli_query($conn, $create_table)) {
        echo "Table users créée avec succès.<br>";
    } else {
        die("Erreur lors de la création de la table: " . mysqli_error($conn));
    }
}

// Créer l'utilisateur admin
$username = 'admin';
$password = 'admin123';
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Vérifier si l'utilisateur existe déjà
$check_user = "SELECT * FROM users WHERE username = '$username'";
$user_exists = mysqli_query($conn, $check_user);

if (mysqli_num_rows($user_exists) == 0) {
    // Insérer le nouvel utilisateur
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Utilisateur admin créé avec succès!<br>";
        echo "Nom d'utilisateur: admin<br>";
        echo "Mot de passe: admin123<br>";
    } else {
        echo "Erreur lors de la création de l'utilisateur: " . mysqli_error($conn);
    }
} else {
    echo "L'utilisateur admin existe déjà.<br>";
    echo "Nom d'utilisateur: admin<br>";
    echo "Mot de passe: admin123<br>";
}
?>

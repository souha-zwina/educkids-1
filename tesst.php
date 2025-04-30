<?php
// Afficher toutes les erreurs PHP
ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "Test de base : Si vous voyez ce message, PHP fonctionne correctement.";

// Tester la connexion à la base de données
require_once 'config.php';
echo "<br>Test de connexion à la base de données : ";
if (isset($conn) && $conn) {
    echo "Connexion établie.";
    
    // Vérifier si la table users existe
    $result = mysqli_query($conn, "SHOW TABLES LIKE 'users'");
    if (mysqli_num_rows($result) > 0) {
        echo "<br>La table 'users' existe.";
    } else {
        echo "<br>La table 'users' n'existe pas.";
        
        // Créer la table users si elle n'existe pas
        $sql = "CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(64) NOT NULL UNIQUE,
            email VARCHAR(120) NOT NULL,
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        
        if (mysqli_query($conn, $sql)) {
            echo "<br>Table 'users' créée avec succès.";
        } else {
            echo "<br>Erreur lors de la création de la table 'users': " . mysqli_error($conn);
        }
    }
    
    // Informations de connexion pour test
    $test_username = 'test';
    $test_password = 'test123';
    $test_email = 'test@example.com';
    $test_password_hash = password_hash($test_password, PASSWORD_DEFAULT);
    
    // Insérer un utilisateur de test
    $sql = "INSERT INTO users (username, email, password) VALUES ('$test_username', '$test_email', '$test_password_hash')";
    if (mysqli_query($conn, $sql)) {
        echo "<br>Utilisateur de test créé : username='$test_username', password='$test_password'";
    } else {
        // Si l'insertion échoue, c'est peut-être parce que l'utilisateur existe déjà
        echo "<br>Erreur ou utilisateur existe déjà: " . mysqli_error($conn);
    }
    
} else {
    echo "Échec de la connexion.";
}

// Vérifier si les fichiers de session fonctionnent
echo "<br>Test de session : ";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$_SESSION['test'] = 'test_value';
if (isset($_SESSION['test']) && $_SESSION['test'] === 'test_value') {
    echo "Les sessions fonctionnent correctement.";
} else {
    echo "Problème avec les sessions.";
}
?>
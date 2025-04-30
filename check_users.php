<?php
require_once 'config.php';

// Afficher tous les utilisateurs
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

echo "<h2>Liste des utilisateurs dans la base de données :</h2>";

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row['id'] . "<br>";
        echo "Username: " . $row['username'] . "<br>";
        echo "Password Hash: " . $row['password'] . "<br>";
        echo "Created at: " . $row['created_at'] . "<br>";
        echo "<hr>";
    }
} else {
    echo "Aucun utilisateur trouvé dans la base de données.";
}

// Vérifier si la table users existe
$check_table = "SHOW TABLES LIKE 'users'";
$table_exists = mysqli_query($conn, $check_table);

echo "<h2>Vérification de la table users :</h2>";
if (mysqli_num_rows($table_exists) > 0) {
    echo "La table users existe.";
} else {
    echo "La table users n'existe pas.";
}
?> 
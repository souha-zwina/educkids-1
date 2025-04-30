<?php
// Test de password_verify()
$password = 'admin123';
$stored_hash = '$2y$10$rRuV0JUzSN/8bXkFo3TbKuyFFa2HrM.PZm/a8Ic3TUNnXJdq3ZjXi';

echo "PHP Version: " . PHP_VERSION . "<br>";
echo "Testing password_verify with:<br>";
echo "- Password: $password<br>";
echo "- Hash: $stored_hash<br>";
echo "Result: " . (password_verify($password, $stored_hash) ? 'SUCCESS' : 'FAILURE') . "<br>";

// Générer un nouveau hash
$new_hash = password_hash($password, PASSWORD_DEFAULT);
echo "<br>Nouveau hash généré: $new_hash<br>";
echo "Vérification avec le nouveau hash: " . (password_verify($password, $new_hash) ? 'SUCCESS' : 'FAILURE') . "<br>";
?>
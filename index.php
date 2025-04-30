<?php
// Activer l'affichage des erreurs
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Démarrer la session avant tout output
session_start();

require_once 'config.php';
require_once 'functions.php';

// Get all categories for navbar
$categories = getCategories();

// Determine which page to load
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Traiter le login avant d'afficher quoi que ce soit
if ($page === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (login($username, $password)) {
        setMessage('Connexion réussie!', 'success');
        redirect('admin.php');
        exit;
    } else {
        setMessage('Nom d\'utilisateur ou mot de passe incorrect.', 'error');
    }
}

// Include header
include 'templates/header.php';

// Load page
switch ($page) {
    case 'home':
        include 'templates/home.php';
        break;
    case 'category':
        $categoryId = isset($_GET['id']) ? $_GET['id'] : 0;
        $category = getCategoryById($categoryId);
        $elements = getElementsByCategory($categoryId);
        include 'templates/category.php';
        break;
    case 'login':
        include 'templates/login.php';
        break;
    case 'logout':
        logout();
        setMessage('Vous avez été déconnecté.', 'success');
        redirect('index.php');
        break;
    default:
        include 'templates/404.php';
        break;
}

// Include footer
include 'templates/footer.php';
?>
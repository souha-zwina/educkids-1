<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Get all categories
function getCategories() {
    global $conn;
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($conn, $sql);
    $categories = [];
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
        }
    }
    
    return $categories;
}

// Get single category by ID
function getCategoryById($id) {
    global $conn;
    $sql = "SELECT * FROM categories WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }
    
    return null;
}

// Get elements by category ID
function getElementsByCategory($categoryId) {
    global $conn;
    $sql = "SELECT * FROM elements WHERE category_id = $categoryId";
    $result = mysqli_query($conn, $sql);
    $elements = [];
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $elements[] = $row;
        }
    }
    
    return $elements;
}

function login($username, $password) {
    // Version temporaire pour le test
    if ($username === 'admin' && $password === 'admin123') {
        // Définir les variables de session
        $_SESSION['user_id'] = 1;
        $_SESSION['username'] = 'admin';
        $_SESSION['is_logged_in'] = true;
        
        return true;
    }
    
    return false;
}
function isLoggedIn() {
    return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true;
}

// Log out user
function logout() {
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
}

// Set message
function setMessage($message, $type = 'success') {
    $_SESSION['message'] = $message;
    $_SESSION['message_type'] = $type;
}
function redirect($url) {
    header('Location: ' . $url);
    exit;
}
?>
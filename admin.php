<?php
require_once 'config.php';
require_once 'functions.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Check if user is logged in
if (!isLoggedIn()) {
    setMessage('You must be logged in to access this page.', 'error');
    redirect('index.php?page=login');
}

// Process current page
$section = $_GET['section'] ?? 'dashboard';
$action = $_GET['action'] ?? '';
$id = $_GET['id'] ?? '';

// Include necessary functions
if (!function_exists('countCategories')) {
    function countCategories() {
        global $conn;
        $sql = "SELECT COUNT(*) as count FROM categories";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['count'];
    }
}

if (!function_exists('countElements')) {
    function countElements() {
        global $conn;
        $sql = "SELECT COUNT(*) as count FROM elements";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['count'];
    }
}

if (!function_exists('getAllCategories')) {
    function getAllCategories() {
        return getCategories();
    }
}

if (!function_exists('getAllElements')) {
    function getAllElements() {
        global $conn;
        $sql = "SELECT e.*, c.name as category_name FROM elements e 
                JOIN categories c ON e.category_id = c.id";
        $result = mysqli_query($conn, $sql);
        $elements = [];
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $elements[] = $row;
            }
        }
        
        return $elements;
    }
}

if (!function_exists('getElementById')) {
    function getElementById($id) {
        global $conn;
        $sql = "SELECT * FROM elements WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        }
        
        return null;
    }
}

if (!function_exists('addCategory')) {
    function addCategory($data) {
        global $conn;
        $name = mysqli_real_escape_string($conn, $data['name']);
        $description = mysqli_real_escape_string($conn, $data['description']);
        $image_url = mysqli_real_escape_string($conn, $data['image_url']);
        
        $sql = "INSERT INTO categories (name, description, image_url) VALUES ('$name', '$description', '$image_url')";
        return mysqli_query($conn, $sql);
    }
}

if (!function_exists('updateCategory')) {
    function updateCategory($id, $data) {
        global $conn;
        $name = mysqli_real_escape_string($conn, $data['name']);
        $description = mysqli_real_escape_string($conn, $data['description']);
        $image_url = mysqli_real_escape_string($conn, $data['image_url']);
        
        $sql = "UPDATE categories SET name = '$name', description = '$description', image_url = '$image_url' WHERE id = $id";
        return mysqli_query($conn, $sql);
    }
}

if (!function_exists('deleteCategory')) {
    function deleteCategory($id) {
        global $conn;
        $sql = "DELETE FROM categories WHERE id = $id";
        return mysqli_query($conn, $sql);
    }
}

if (!function_exists('addElement')) {
    function addElement($data) {
        global $conn;
        $title = mysqli_real_escape_string($conn, $data['title']);
        $description = mysqli_real_escape_string($conn, $data['description']);
        $image_url = mysqli_real_escape_string($conn, $data['image_url']);
        $audio_url = mysqli_real_escape_string($conn, $data['audio_url']);
        $video_url = mysqli_real_escape_string($conn, $data['video_url']);
        $category_id = (int)$data['category_id'];
        
        $sql = "INSERT INTO elements (title, description, image_url, audio_url, video_url, category_id) 
                VALUES ('$title', '$description', '$image_url', '$audio_url', '$video_url', $category_id)";
        return mysqli_query($conn, $sql);
    }
}

if (!function_exists('updateElement')) {
    function updateElement($id, $data) {
        global $conn;
        $title = mysqli_real_escape_string($conn, $data['title']);
        $description = mysqli_real_escape_string($conn, $data['description']);
        $image_url = mysqli_real_escape_string($conn, $data['image_url']);
        $audio_url = mysqli_real_escape_string($conn, $data['audio_url']);
        $video_url = mysqli_real_escape_string($conn, $data['video_url']);
        $category_id = (int)$data['category_id'];
        
        $sql = "UPDATE elements SET title = '$title', description = '$description', 
                image_url = '$image_url', audio_url = '$audio_url', video_url = '$video_url',
                category_id = $category_id WHERE id = $id";
        return mysqli_query($conn, $sql);
    }
}

if (!function_exists('deleteElement')) {
    function deleteElement($id) {
        global $conn;
        $sql = "DELETE FROM elements WHERE id = $id";
        return mysqli_query($conn, $sql);
    }
}

// Handle admin section
switch ($section) {
    case 'dashboard':
        $categories_count = countCategories();
        $elements_count = countElements();
        
        include 'templates/admin/header.php';
        include 'templates/admin/dashboard.php';
        include 'templates/admin/footer.php';
        break;

    case 'categories':
        if ($action == 'add') {
            include 'templates/admin/category_form.php';
        } elseif ($action == 'edit' && $id) {
            include 'templates/admin/category_form.php';
        } else {
            $categories = getAllCategories();
            
            include 'templates/admin/header.php';
            include 'templates/admin/categories.php';
            include 'templates/admin/footer.php';
        }
        break;

    case 'elements':
        if ($action == 'add') {
            include 'templates/admin/element_form.php';
        } elseif ($action == 'edit' && $id) {
            include 'templates/admin/element_form.php';
        } else {
            $elements = getAllElements();
            
            include 'templates/admin/header.php';
            include 'templates/admin/elements.php';
            include 'templates/admin/footer.php';
        }
        break;

    default:
        include 'templates/admin/header.php';
        include 'templates/404.php';
        include 'templates/admin/footer.php';
        break;
}
?>

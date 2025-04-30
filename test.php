<?php
// Inclusion minimale pour afficher les données
require_once 'config.php';
require_once 'functions.php';
$categories = getCategories();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduKids - Test</title>
    <style>
        /* STYLES INTÉGRÉS POUR ÉVITER LES PROBLÈMES DE FICHIERS EXTERNES */
        body {
            font-family: 'Comic Sans MS', 'Chalkboard SE', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        
        .navbar {
            background-color: #6A5ACD;
            padding: 10px 0;
            color: white;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        
        .navbar-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .navbar-brand {
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
            font-size: 24px;
            font-weight: bold;
        }
        
        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }
        
        .nav-links {
            display: flex;
        }
        
        .nav-links a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-size: 18px;
        }
        
        .header-banner {
            background-color: #FFD700;
            padding: 40px 0;
            text-align: center;
            margin-bottom: 30px;
        }
        
        .header-banner h1 {
            font-size: 48px;
            margin-bottom: 10px;
            color: #333;
        }
        
        .header-banner p {
            font-size: 24px;
            color: #333;
        }
        
        .section-title {
            text-align: center;
            font-size: 36px;
            margin: 30px 0;
            color: #333;
        }
        
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -15px;
        }
        
        .col-md-4 {
            width: 33.33%;
            padding: 0 15px;
            margin-bottom: 30px;
        }
        
        .category-card {
            border: 2px solid #6A5ACD;
            border-radius: 10px;
            overflow: hidden;
            background-color: white;
            height: 100%;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s;
        }
        
        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .category-card img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
        }
        
        .card-content {
            padding: 20px;
            text-align: center;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        
        .category-card h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }
        
        .category-card p {
            color: #666;
            margin-bottom: 15px;
            flex-grow: 1;
        }
        
        .btn {
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            padding: 10px 25px;
            border-radius: 30px;
            display: inline-block;
            font-weight: bold;
            align-self: center;
        }
        
        .btn:hover {
            background-color: #0056b3;
        }
        
        footer {
            background-color: #6A5ACD;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 40px;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .col-md-4 {
                width: 50%;
            }
        }
        
        @media (max-width: 768px) {
            .col-md-4 {
                width: 100%;
            }
            
            .navbar-content {
                flex-direction: column;
            }
            
            .nav-links {
                margin-top: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .nav-links a {
                margin: 5px 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <div class="navbar-content">
                <a href="index.php" class="navbar-brand">
                    <img src="./static/images/logo.png" alt="EduKids">
                    EduKids
                </a>
                <div class="nav-links">
                    <a href="index.php">Home</a>
                    <?php foreach ($categories as $cat): ?>
                        <a href="index.php?page=category&id=<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></a>
                    <?php endforeach; ?>
                    <a href="index.php?page=login">Login</a>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Header Banner -->
    <div class="header-banner">
        <div class="container">
            <h1>EduKids</h1>
            <p>Fun Learning for Children</p>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="container">
        <h2 class="section-title">Educational Categories</h2>
        
        <div class="row">
            <?php foreach ($categories as $category): ?>
            <div class="col-md-4">
                <div class="category-card">
                    <img src="<?php echo $category['image_url']; ?>" alt="<?php echo $category['name']; ?>">
                    <div class="card-content">
                        <h3><?php echo $category['name']; ?></h3>
                        <p><?php echo $category['description']; ?></p>
                        <a href="index.php?page=category&id=<?php echo $category['id']; ?>" class="btn">Explore</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> EduKids - Fun Learning for Children</p>
        </div>
    </footer>
</body>
</html>
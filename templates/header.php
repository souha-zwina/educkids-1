<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/static/css/style.css">
    <style>
        /* GENERAL */
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f9ff;
        }

        /* NAVBAR */
        .navbar {
            background: linear-gradient(45deg, #ff9a9e, #fad0c4);
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .nav-content {
            display: flex;
            align-items: center;
        }

        .brand {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .brand img {
            height: 50px;
            margin-right: 10px;
            animation: bounce 2s infinite;
        }

        .brand-text {
            color: white;
            font-size: 28px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .nav-links {
            display: flex;
            margin-left: auto;
            gap: 10px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 0.8rem 1.2rem;
            border-radius: 25px;
            transition: all 0.3s ease;
            background-color: rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-links a:hover {
            background-color: rgba(255,255,255,0.2);
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .nav-links i {
            font-size: 1.2rem;
        }

        /* BANNER */
        .banner {
            background: linear-gradient(45deg, #a8e6cf, #dcedc1);
            padding: 3rem 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .banner::before {
            content: '🎨';
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 3rem;
            animation: float 3s infinite;
        }

        .banner::after {
            content: '🎵';
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 3rem;
            animation: float 3s infinite 1.5s;
        }

        .banner h1 {
            font-size: 3.5rem;
            color: #333;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .banner p {
            font-size: 1.8rem;
            color: #666;
        }

        /* Color Palette Dropdown */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-toggle {
            cursor: pointer;
            background-color: #ff6b6b !important;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 300px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 15px;
            padding: 15px;
            top: 100%;
            left: 0;
        }

        .dropdown:hover .dropdown-menu {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .color-item {
            padding: 15px;
            text-decoration: none;
            color: white;
            text-align: center;
            border-radius: 10px;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
        }

        .color-item:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .color-item span {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-content {
                flex-direction: column;
            }
            .nav-links {
                margin-top: 1rem;
                flex-wrap: wrap;
                justify-content: center;
            }
            .dropdown-menu {
                left: 50%;
                transform: translateX(-50%);
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="container">
            <div class="nav-content">
                <a href="index.php" class="brand">
                    <img src="./static/images/logo.png" alt="EduKids">
                    <span class="brand-text">EduKids</span>
                </a>
                <div class="nav-links">
                    <a href="index.php"><i class="fas fa-home"></i> Home</a>
                    <?php foreach ($categories as $cat): ?>
                        <a href="index.php?page=category&id=<?php echo $cat['id']; ?>">
                            <?php
                            $icon = '';
                            $emoji = '';
                            switch($cat['name']) {
                                case 'Les Couleurs':
                                    $icon = 'fa-palette';
                                    $emoji = '🎨';
                                    break;
                                case 'Les Animaux':
                                    $icon = 'fa-paw';
                                    $emoji = '🐾';
                                    break;
                                case 'Mathématiques':
                                    $icon = 'fa-calculator';
                                    $emoji = '🔢';
                                    break;
                                case 'Musique':
                                    $icon = 'fa-music';
                                    $emoji = '🎵';
                                    break;
                                case 'Sciences':
                                    $icon = 'fa-flask';
                                    $emoji = '🔬';
                                    break;
                            }
                            ?>
                            <i class="fas <?php echo $icon; ?>"></i> <?php echo $emoji . ' ' . str_replace(['Les Couleurs', 'Les Animaux', 'Mathématiques', 'Musique', 'Sciences'], ['Colors', 'Animals', 'Math', 'Music', 'Science'], $cat['name']); ?>
                        </a>
                    <?php endforeach; ?>
                    <?php if (isLoggedIn()): ?>
                        <a href="admin.php"><i class="fas fa-user-shield"></i> Dashboard</a>
                    <?php else: ?>
                        <a href="index.php?page=login"><i class="fas fa-sign-in-alt"></i> Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <?php if (!isset($page) || $page === 'home'): ?>
    <!-- Banner -->
    <div class="banner">
        <div class="container">
            <h1>EduKids</h1>
            <p>Learning is Fun! 🎨 🎵 🔢</p>
        </div>
    </div>
    <?php endif; ?>
    
    <!-- Content -->
    <div class="content">
        <div class="container">
            <?php if (isset($_SESSION['message'])): ?>
                <div class="alert alert-<?php echo $_SESSION['message_type']; ?>">
                    <?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    unset($_SESSION['message_type']);
                    ?>
                </div>
            <?php endif; ?>
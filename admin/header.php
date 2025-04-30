<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar {
            min-height: calc(100vh - 56px);
            background-color: #343a40;
            color: white;
        }
        
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
        }
        
        .sidebar .nav-link:hover {
            color: white;
        }
        
        .sidebar .nav-link.active {
            color: white;
            background-color: #6a5acd;
        }
        
        main {
            padding: 20px;
        }
        
        .admin-navbar {
            background-color: #6a5acd;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark admin-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin.php">
                <i class="fas fa-cogs me-2"></i>
                <?php echo SITE_NAME; ?> Admin
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php" target="_blank">
                            <i class="fas fa-external-link-alt me-1"></i> View Site
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=logout">
                            <i class="fas fa-sign-out-alt me-1"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 p-0">
                <div class="sidebar p-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?php echo $section === 'dashboard' ? 'active' : ''; ?>" href="admin.php">
                                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $section === 'categories' ? 'active' : ''; ?>" href="admin.php?section=categories">
                                <i class="fas fa-folder me-2"></i> Categories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $section === 'elements' ? 'active' : ''; ?>" href="admin.php?section=elements">
                                <i class="fas fa-cube me-2"></i> Elements
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-lg-10">
                <main>
                <?php
        // Ou si vous utilisez un système de messages stockés en session
        if (isset($_SESSION['message']) && !empty($_SESSION['message'])): 
            $messageClass = $_SESSION['message_type'] ?? 'info';
        ?>
            <div class="alert alert-<?php echo $messageClass; ?>">
                <?php echo $_SESSION['message']; ?>
            </div>
        <?php
            // Important : effacer le message après l'avoir affiché
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
        endif;
        ?>
        
        <!-- Le reste du contenu de la page sera placé ici -->



 
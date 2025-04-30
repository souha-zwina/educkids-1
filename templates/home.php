<?php
// Récupérer toutes les catégories
$categories = getCategories();
?>

<div class="container">
    <div class="welcome-section">
        <h1>Welcome to EduKids!</h1>
        <p>Discover the world in a fun and interactive way!</p>
    </div>
    <div class="categories-grid">
        <?php foreach ($categories as $category): ?>
            <div class="category-card same-border">
                <?php if (!empty($category['image_url'])): ?>
                    <div class="category-image">
                        <?php
                        // Nettoyer et normaliser le chemin de l'image
                        $image_url = $category['image_url'];
                        
                        // Vérifier si c'est une URL complète ou un chemin local
                        if (strpos($image_url, 'http') === 0) {
                            // C'est une URL complète
                            $final_url = $image_url;
                        } else {
                            // C'est un chemin local, extraire le nom du fichier
                            $filename = basename($image_url);
                            
                            // Construire le chemin correct
                            $final_url = "/edukids/static/images/{$filename}";
                            
                            // Si le chemin contient déjà 'static/images', le laisser tel quel
                            if (strpos($image_url, 'static/images') !== false) {
                                $final_url = "/edukids/{$image_url}";
                            }
                        }
                        ?>
                        <img src="<?php echo $final_url; ?>" alt="<?php echo htmlspecialchars($category['name']); ?>">
                    </div>
                <?php else: ?>
                    <div class="category-image default-image">
                        <!-- Image par défaut si aucune image n'est disponible -->
                        <div class="category-icon <?php echo strtolower($category['name']); ?>-icon"></div>
                    </div>
                <?php endif; ?>
                <div class="category-content">
                    <h2><?php echo htmlspecialchars($category['name']); ?></h2>
                    <div class="description">
                        <p><?php echo htmlspecialchars($category['description']); ?></p>
                    </div>
                    <div class="button-container">
                        <a href="?page=category&id=<?php echo $category['id']; ?>" class="btn">
                            Discover
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Le reste du code reste inchangé -->

    <div class="features-section">
        <h2>Why EduKids?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <i class="fas fa-paint-brush"></i>
                <h3>Fun Learning</h3>
                <p>Learn while having fun with interactive activities!</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-music"></i>
                <h3>Varied Content</h3>
                <p>Discover many exciting topics!</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-star"></i>
                <h3>Progression</h3>
                <p>Track your progress and earn rewards!</p>
            </div>
        </div>
    </div>
</div>

<style>
.welcome-section {
    text-align: center;
    padding: 2rem;
    background: linear-gradient(45deg, #ff9a9e, #fad0c4);
    border-radius: 15px;
    margin-bottom: 2rem;
}

.welcome-section h1 {
    font-size: 2.5rem;
    color: #333;
    margin-bottom: 1rem;
}

.categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.category-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
    height: 350px; /* Hauteur fixe augmentée */
}

.category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0,0,0,0.15);
}

.category-image {
    width: 100%;
    height: 180px; /* Hauteur fixe pour toutes les images */
    overflow: hidden;
    background-color: #f8f9fa; /* Couleur de fond pour les images manquantes */
    display: flex;
    justify-content: center;
    align-items: center;
}

.category-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.category-card:hover .category-image img {
    transform: scale(1.05);
}

.default-image {
    background-color: #eef2f7;
}

.category-icon {
    font-size: 60px;
    color: #4ecdc4;
}

.category-content {
    padding: 1.2rem;
    display: flex;
    flex-direction: column;
    height: 170px; /* Hauteur fixe pour le contenu */
}

.category-card h2 {
    margin-top: 0;
    color: #333;
    font-size: 1.5rem;
    margin-bottom: 0.8rem;
    height: 30px; /* Hauteur fixe pour le titre */
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}

.description {
    height: 80px; /* Hauteur fixe pour la description */
    overflow: hidden;
    margin-bottom: 1rem;
}

.category-card p {
    color: #666;
    margin: 0;
    display: -webkit-box;
    -webkit-line-clamp: 3; /* Limite à 3 lignes */
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

.button-container {
    height: 40px; /* Hauteur fixe pour le bouton */
    display: flex;
    align-items: flex-end;
}

.category-card .btn {
    padding: 0.6rem 1.2rem;
    background-color: #4ecdc4;
    color: white;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.category-card .btn:hover {
    background-color: #45b7af;
}

/* Styles spécifiques par catégorie */


.animals-icon::before {
    content: "\f1b0"; /* Icône d'animal (patte) */
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
}



.transport-icon::before {
    content: "\f1b9"; /* Icône de voiture */
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
}



.numbers-icon::before {
    content: "\f1ec"; /* Icône de calculatrice */
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
}



.colors-icon::before {
    content: "\f53f"; /* Icône de palette */
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
}



.shapes-icon::before {
    content: "\f5fd"; /* Icône de formes */
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
}

.features-section {
    text-align: center;
    padding: 2rem;
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.feature-card {
    padding: 1.5rem;
    background-color: #f8f9fa;
    border-radius: 10px;
    transition: transform 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-5px);
}

.feature-card i {
    font-size: 2rem;
    color: #4ecdc4;
    margin-bottom: 1rem;
}

@media (max-width: 768px) {
    .categories-grid {
        grid-template-columns: 1fr;
    }
    
    .features-grid {
        grid-template-columns: 1fr;
    }
}
</style>
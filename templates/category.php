<h2><?php echo $category['name']; ?></h2>
<p style="text-align: center; margin-bottom: 30px;"><?php echo $category['description']; ?></p>

<?php if (empty($elements)): ?>
    <div style="padding: 15px; background-color: #d1ecf1; border: 1px solid #bee5eb; border-radius: 4px; color: #0c5460;">
        No elements in this category yet.
    </div>
<?php else: ?>
    <div class="cards">
        <?php foreach ($elements as $element): ?>
        <div class="card">
            <?php if (!empty($element['image_url'])): ?>
                <?php
                // Nettoyer le chemin de l'image
                $image_path = $element['image_url'];
                
                // Si le chemin contient déjà "static/images", ne pas l'ajouter à nouveau
                if (strpos($image_path, 'static/images') !== false) {
                    $image_src = "/edukids/{$image_path}";
                } else {
                    // Sinon, extraire le nom du fichier et construire le chemin correct
                    $image_src = "/edukids/static/images/" . basename($image_path);
                }
                ?>
                <img src="<?php echo $image_src; ?>" alt="<?php echo $element['title']; ?>">
            <?php else: ?>
                <div class="placeholder-image">
                    <i class="fas fa-image"></i>
                </div>
            <?php endif; ?>
            <div class="card-body">
                <h3><?php echo $element['title']; ?></h3>
                <p><?php echo $element['description']; ?></p>
                
                <?php if (!empty($element['audio_url'])): ?>
                <div style="margin: 15px 0;">
                    <?php
                    // Nettoyer le chemin de l'audio comme pour les images
                    $audio_path = $element['audio_url'];
                    
                    // Si le chemin contient déjà "static/audio", ne pas l'ajouter à nouveau
                    if (strpos($audio_path, 'static/audio') !== false) {
                        $audio_src = "/edukids/{$audio_path}";
                    } else {
                        // Sinon, extraire le nom du fichier et construire le chemin correct
                        $audio_src = "/edukids/static/audio/" . basename($audio_path);
                    }
                    ?>
                    <audio controls style="width: 100%;">
                        <source src="<?php echo $audio_src; ?>" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($element['video_url'])): ?>
                <div style="margin: 15px 0;">
                    <iframe width="100%" height="200" src="<?php echo $element['video_url']; ?>" frameborder="0" allowfullscreen></iframe>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div style="margin-top: 20px; text-align: center;">
    <a href="index.php" class="btn">&laquo; Back to Home</a>
</div>

<style>
.cards {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.card {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
}

.card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.placeholder-image {
    width: 100%;
    height: 200px;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
}

.placeholder-image i {
    font-size: 50px;
    color: #cccccc;
}

.card-body {
    padding: 15px;
}

.card h3 {
    margin-top: 0;
    color: #333;
}

.card p {
    color: #666;
}

.btn {
    display: inline-block;
    padding: 8px 16px;
    background-color: #4ecdc4;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #3dbdb4;
}
</style>
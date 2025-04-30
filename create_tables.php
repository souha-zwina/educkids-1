<?php
require_once 'config.php';

// Create categories table if it doesn't exist
$create_categories = "CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $create_categories)) {
    echo "Categories table created or already exists.<br>";
} else {
    echo "Error creating categories table: " . mysqli_error($conn) . "<br>";
}

// Create elements table if it doesn't exist
$create_elements = "CREATE TABLE IF NOT EXISTS elements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    image_url VARCHAR(255),
    audio_url VARCHAR(255),
    video_url VARCHAR(255),
    category_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id)
)";

if (mysqli_query($conn, $create_elements)) {
    echo "Elements table created or already exists.<br>";
} else {
    echo "Error creating elements table: " . mysqli_error($conn) . "<br>";
}

// Add some sample data if tables are empty
$check_categories = mysqli_query($conn, "SELECT COUNT(*) as count FROM categories");
$categories_count = mysqli_fetch_assoc($check_categories)['count'];

if ($categories_count == 0) {
    $sample_categories = [
        ["Animals", "Learn about different animals from around the world", "static/images/animals.jpg"],
        ["Transport", "Discover various modes of transportation", "static/images/transport.jpg"],
        ["Numbers", "Learn to count and recognize numbers", "static/images/numbers.jpg"]
    ];

    foreach ($sample_categories as $cat) {
        $sql = "INSERT INTO categories (name, description, image_url) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $cat[0], $cat[1], $cat[2]);
        mysqli_stmt_execute($stmt);
    }
    
    echo "Sample categories added.<br>";
}

// Check if elements table is empty
$check_elements = mysqli_query($conn, "SELECT COUNT(*) as count FROM elements");
$elements_count = mysqli_fetch_assoc($check_elements)['count'];

if ($elements_count == 0) {
    $sample_elements = [
        ["Lion", "The king of the jungle", "static/images/elements/lion.jpg", 1],
        ["School Bus", "A vehicle for transporting students", "static/images/elements/bus.jpg", 2],
        ["Number One", "The first number", "static/images/elements/one.jpg", 3]
    ];

    foreach ($sample_elements as $elem) {
        $sql = "INSERT INTO elements (title, description, image_url, category_id) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssi", $elem[0], $elem[1], $elem[2], $elem[3]);
        mysqli_stmt_execute($stmt);
    }
    
    echo "Sample elements added.<br>";
}

echo "Database setup completed!";
?> 
-- Mise à jour des catégories existantes
UPDATE categories SET name = 'Colors' WHERE name = 'Les Couleurs';
UPDATE categories SET name = 'Animals' WHERE name = 'Les Animaux';
UPDATE categories SET name = 'Math' WHERE name = 'Mathématiques';
UPDATE categories SET name = 'Music' WHERE name = 'Musique';
UPDATE categories SET name = 'Science' WHERE name = 'Sciences';

-- Ajout de nouvelles catégories
INSERT INTO categories (name, description) VALUES
('Mathématiques', 'Apprendre les bases des mathématiques de manière amusante'),
('Musique', 'Découvrir les sons et les instruments de musique'),
('Sciences', 'Explorer le monde qui nous entoure');

-- Ajout d'éléments pour la catégorie Couleurs
INSERT INTO elements (category_id, name, description, image_url) VALUES
(1, 'Red', 'The color of fire and apples', 'static/images/colors/red.jpg'),
(1, 'Blue', 'The color of sky and ocean', 'static/images/colors/blue.jpg'),
(1, 'Green', 'The color of trees and grass', 'static/images/colors/green.jpg'),
(1, 'Yellow', 'The color of sun and bananas', 'static/images/colors/yellow.jpg'),
(1, 'Orange', 'The color of oranges and carrots', 'static/images/colors/orange.jpg'),
(1, 'Purple', 'The color of grapes and violets', 'static/images/colors/purple.jpg'),
(1, 'Pink', 'The color of flowers and cotton candy', 'static/images/colors/pink.jpg'),
(1, 'Brown', 'The color of chocolate and trees', 'static/images/colors/brown.jpg'),
(1, 'Black', 'The color of night and coal', 'static/images/colors/black.jpg'),
(1, 'White', 'The color of snow and clouds', 'static/images/colors/white.jpg'),
(1, 'Gray', 'The color of elephants and rocks', 'static/images/colors/gray.jpg'),
(1, 'Gold', 'The color of stars and treasure', 'static/images/colors/gold.jpg');

-- Ajout d'éléments pour la catégorie Animaux
INSERT INTO elements (category_id, name, description, image_url) VALUES
(2, 'Lion', 'Le roi de la jungle', 'static/images/animals/lion.jpg'),
(2, 'Éléphant', 'Le plus grand animal terrestre', 'static/images/animals/elephant.jpg'),
(2, 'Girafe', 'L\'animal au plus long cou', 'static/images/animals/girafe.jpg'),
(2, 'Singe', 'L\'animal le plus proche de l\'homme', 'static/images/animals/singe.jpg'),
(2, 'Panda', 'L\'ours noir et blanc de Chine', 'static/images/animals/panda.jpg'),
(2, 'Dauphin', 'Le mammifère marin le plus intelligent', 'static/images/animals/dauphin.jpg'),
(2, 'Papillon', 'L\'insecte aux ailes colorées', 'static/images/animals/papillon.jpg'),
(2, 'Chat', 'Le meilleur ami de l\'homme', 'static/images/animals/chat.jpg');

-- Ajout d'éléments pour la catégorie Mathématiques
INSERT INTO elements (category_id, name, description, image_url) VALUES
(3, 'Numbers 1-10', 'Learn to count from 1 to 10', 'static/images/math/numbers1-10.jpg'),
(3, 'Addition', 'Learn to add numbers', 'static/images/math/addition.jpg'),
(3, 'Subtraction', 'Learn to subtract numbers', 'static/images/math/subtraction.jpg'),
(3, 'Multiplication', 'Learn to multiply numbers', 'static/images/math/multiplication.jpg'),
(3, 'Division', 'Learn to divide numbers', 'static/images/math/division.jpg'),
(3, 'Shapes', 'Learn about different shapes', 'static/images/math/shapes.jpg'),
(3, 'Patterns', 'Learn about number patterns', 'static/images/math/patterns.jpg'),
(3, 'Time', 'Learn to tell time', 'static/images/math/time.jpg'),
(3, 'Money', 'Learn about coins and bills', 'static/images/math/money.jpg'),
(3, 'Fractions', 'Learn about parts of a whole', 'static/images/math/fractions.jpg'),
(3, 'Measurement', 'Learn about length and weight', 'static/images/math/measurement.jpg'),
(3, 'Geometry', 'Learn about 2D and 3D shapes', 'static/images/math/geometry.jpg');

-- Ajout d'éléments pour la catégorie Musique
INSERT INTO elements (category_id, name, description, image_url) VALUES
(4, 'Musical Notes', 'Learn about musical notes', 'static/images/music/notes.jpg'),
(4, 'Piano', 'Learn about the piano', 'static/images/music/piano.jpg'),
(4, 'Guitar', 'Learn about the guitar', 'static/images/music/guitar.jpg'),
(4, 'Drums', 'Learn about drums', 'static/images/music/drums.jpg'),
(4, 'Flute', 'Learn about the flute', 'static/images/music/flute.jpg'),
(4, 'Violin', 'Learn about the violin', 'static/images/music/violin.jpg'),
(4, 'Rhythm', 'Learn about musical rhythm', 'static/images/music/rhythm.jpg'),
(4, 'Melody', 'Learn about musical melody', 'static/images/music/melody.jpg'),
(4, 'Singing', 'Learn to sing', 'static/images/music/singing.jpg'),
(4, 'Dancing', 'Learn to dance to music', 'static/images/music/dancing.jpg'),
(4, 'Musical Instruments', 'Learn about different instruments', 'static/images/music/instruments.jpg'),
(4, 'Music Theory', 'Learn basic music theory', 'static/images/music/theory.jpg');

-- Ajout d'éléments pour la catégorie Sciences
INSERT INTO elements (category_id, name, description, image_url) VALUES
(5, 'Plants', 'Learn about different plants', 'static/images/science/plants.jpg'),
(5, 'Animals', 'Learn about different animals', 'static/images/science/animals.jpg'),
(5, 'Weather', 'Learn about weather', 'static/images/science/weather.jpg'),
(5, 'Solar System', 'Learn about planets', 'static/images/science/solar-system.jpg'),
(5, 'Human Body', 'Learn about body parts', 'static/images/science/body.jpg'),
(5, 'Magnetism', 'Learn about magnets', 'static/images/science/magnets.jpg'),
(5, 'Light', 'Learn about light and colors', 'static/images/science/light.jpg'),
(5, 'Sound', 'Learn about sound waves', 'static/images/science/sound.jpg'),
(5, 'Water Cycle', 'Learn about water cycle', 'static/images/science/water-cycle.jpg'),
(5, 'Food Chain', 'Learn about food chain', 'static/images/science/food-chain.jpg'),
(5, 'Seasons', 'Learn about seasons', 'static/images/science/seasons.jpg'),
(5, 'Simple Machines', 'Learn about simple machines', 'static/images/science/machines.jpg'); 
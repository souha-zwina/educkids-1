-- Update animals with their sounds
UPDATE elements 
SET audio_url = 'static/audio/animals/lion.mp3'
WHERE title = 'Lion' AND category_id = (SELECT id FROM categories WHERE name = 'Animals');

UPDATE elements 
SET audio_url = 'static/audio/animals/elephant.mp3'
WHERE title = 'Éléphant' AND category_id = (SELECT id FROM categories WHERE name = 'Animals');

UPDATE elements 
SET audio_url = 'static/audio/animals/giraffe.mp3'
WHERE title = 'Girafe' AND category_id = (SELECT id FROM categories WHERE name = 'Animals');

UPDATE elements 
SET audio_url = 'static/audio/animals/bird.mp3'
WHERE title = 'Papillon' AND category_id = (SELECT id FROM categories WHERE name = 'Animals');

UPDATE elements 
SET audio_url = 'static/audio/animals/cat.mp3'
WHERE title = 'Chat' AND category_id = (SELECT id FROM categories WHERE name = 'Animals');

UPDATE elements 
SET audio_url = 'static/audio/animals/panda.mp3'
WHERE title = 'Panda' AND category_id = (SELECT id FROM categories WHERE name = 'Animals');

-- Also update the animal names to English
UPDATE elements 
SET title = 'Elephant'
WHERE title = 'Éléphant' AND category_id = (SELECT id FROM categories WHERE name = 'Animals');

UPDATE elements 
SET title = 'Giraffe'
WHERE title = 'Girafe' AND category_id = (SELECT id FROM categories WHERE name = 'Animals');

UPDATE elements 
SET title = 'Bird'
WHERE title = 'Papillon' AND category_id = (SELECT id FROM categories WHERE name = 'Animals');

UPDATE elements 
SET title = 'Cat'
WHERE title = 'Chat' AND category_id = (SELECT id FROM categories WHERE name = 'Animals'); 
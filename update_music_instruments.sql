-- Update music instruments titles and add audio paths
UPDATE elements 
SET title = 'Piano',
    audio_url = 'static/audio/music/piano.mp3'
WHERE title = 'Piano' AND category_id = (SELECT id FROM categories WHERE name = 'Music');

UPDATE elements 
SET title = 'Violin',
    audio_url = 'static/audio/music/violin.mp3'
WHERE title = 'Violin' AND category_id = (SELECT id FROM categories WHERE name = 'Music');

UPDATE elements 
SET title = 'Drums',
    audio_url = 'static/audio/music/drums.mp3'
WHERE title = 'Drums' AND category_id = (SELECT id FROM categories WHERE name = 'Music');

UPDATE elements 
SET title = 'Flute',
    audio_url = 'static/audio/music/flute.mp3'
WHERE title = 'Flute' AND category_id = (SELECT id FROM categories WHERE name = 'Music');

UPDATE elements 
SET title = 'Guitar',
    audio_url = 'static/audio/music/guitar.mp3'
WHERE title = 'Guitar' AND category_id = (SELECT id FROM categories WHERE name = 'Music'); 
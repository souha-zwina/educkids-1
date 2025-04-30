-- Update music instruments with child-friendly descriptions
UPDATE elements 
SET description = 'The piano is like a magical box with black and white keys. When you press them, little hammers inside make beautiful sounds. It can play both high notes like bird songs and low notes like a bear''s growl!'
WHERE title = 'Piano' AND category_id = (SELECT id FROM categories WHERE name = 'Music');

UPDATE elements 
SET description = 'The violin is a wooden instrument that makes music with strings and a bow. When you slide the bow across the strings, it sings like a sweet voice. It can sound happy, sad, or even like a dancing butterfly!'
WHERE title = 'Violin' AND category_id = (SELECT id FROM categories WHERE name = 'Music');

UPDATE elements 
SET description = 'Drums are fun instruments you can hit with sticks or your hands to make exciting beats! They come in different sizes - some are big like a table and others small like a book. Drums help make the rhythm that makes us want to dance!'
WHERE title = 'Drums' AND category_id = (SELECT id FROM categories WHERE name = 'Music');

UPDATE elements 
SET description = 'The flute is a shiny tube with holes that makes music when you blow into it. It sounds like a gentle breeze or a bird singing in the morning. You can make high notes and low notes by covering different holes!'
WHERE title = 'Flute' AND category_id = (SELECT id FROM categories WHERE name = 'Music');

UPDATE elements 
SET description = 'The guitar has six strings that you can pluck or strum to make music. It''s like having a whole band in one instrument! You can play soft, gentle songs or rock out with loud, exciting tunes. Many of your favorite songs use guitars!'
WHERE title = 'Guitar' AND category_id = (SELECT id FROM categories WHERE name = 'Music'); 
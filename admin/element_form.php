<div class="container-fluid">
    <h1 class="mb-4">
        <?php echo isset($element) ? 'Edit Element: ' . $element['title'] : 'Add New Element'; ?>
    </h1>
    
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <?php if (empty($categories)): ?>
        <div class="alert alert-warning">
            You need to create at least one category before adding elements.
            <a href="admin.php?section=categories&action=add" class="btn btn-sm btn-primary ms-2">Add Category</a>
        </div>
    <?php else: ?>
        <div class="card">
            <div class="card-body">
                <form method="post" action="<?php echo isset($element) ? 'admin.php?section=elements&action=edit&id=' . $element['id'] : 'admin.php?section=elements&action=add'; ?>">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($element) ? $element['title'] : ''; ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required><?php echo isset($element) ? $element['description'] : ''; ?></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            <option value="">Select a category</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category['id']; ?>" <?php echo (isset($element) && $element['category_id'] == $category['id']) ? 'selected' : ''; ?>>
                                    <?php echo $category['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="image_url" class="form-label">Image URL</label>
                        <input type="text" class="form-control" id="image_url" name="image_url" value="<?php echo isset($element) ? $element['image_url'] : ''; ?>">
                        <div class="form-text">Enter a URL for the element image. Leave blank for no image.</div>
                        
                        <?php if (isset($element) && !empty($element['image_url'])): ?>
                            <div class="mt-2">
                                <label class="form-label">Current Image:</label>
                                <img src="<?php echo $element['image_url']; ?>" alt="<?php echo $element['title']; ?>" style="max-width: 200px; max-height: 200px; display: block; margin-top: 10px;">
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="mb-3">
                        <label for="audio_url" class="form-label">Audio File</label>
                        <input type="text" class="form-control" id="audio_url" name="audio_url" value="<?php echo isset($element) ? $element['audio_url'] : ''; ?>">
                        <div class="form-text">Enter the path to the audio file (e.g., static/audio/animals/lion.mp3)</div>
                        
                        <?php if (isset($element) && !empty($element['audio_url'])): ?>
                            <div class="mt-2">
                                <label class="form-label">Current Audio:</label>
                                <audio controls style="width: 100%;">
                                    <source src="<?php echo $element['audio_url']; ?>" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="mb-3">
                        <label for="video_url" class="form-label">Video URL (YouTube Embed)</label>
                        <input type="text" class="form-control" id="video_url" name="video_url" value="<?php echo isset($element) ? $element['video_url'] : ''; ?>">
                        <div class="form-text">Enter a YouTube embed URL. Leave blank for no video.</div>
                        
                        <?php if (isset($element) && !empty($element['video_url'])): ?>
                            <div class="mt-2">
                                <label class="form-label">Current Video:</label>
                                <div class="ratio ratio-16x9" style="max-width: 400px; margin-top: 10px;">
                                    <iframe src="<?php echo $element['video_url']; ?>" allowfullscreen></iframe>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="admin.php?section=elements" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">
                            <?php echo isset($element) ? 'Update Element' : 'Add Element'; ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?>
</div>
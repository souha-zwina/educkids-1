<div class="container-fluid">
    <h1 class="mb-4">
        <?php echo isset($category) ? 'Edit Category: ' . $category['name'] : 'Add New Category'; ?>
    </h1>
    
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <div class="card">
        <div class="card-body">
            <form method="post" action="<?php echo isset($category) ? 'admin.php?section=categories&action=edit&id=' . $category['id'] : 'admin.php?section=categories&action=add'; ?>">
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($category) ? $category['name'] : ''; ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required><?php echo isset($category) ? $category['description'] : ''; ?></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="image_url" class="form-label">Image URL</label>
                    <input type="text" class="form-control" id="image_url" name="image_url" value="<?php echo isset($category) ? $category['image_url'] : ''; ?>">
                    <div class="form-text">Enter a URL for the category image. Leave blank for no image.</div>
                </div>
                
                <div class="mb-3">
                    <?php if (isset($category) && !empty($category['image_url'])): ?>
                        <div class="mt-2">
                            <label class="form-label">Current Image:</label>
                            <img src="<?php echo $category['image_url']; ?>" alt="<?php echo $category['name']; ?>" style="max-width: 200px; max-height: 200px; display: block; margin-top: 10px;">
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="d-flex justify-content-between">
                    <a href="admin.php?section=categories" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        <?php echo isset($category) ? 'Update Category' : 'Add Category'; ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Categories</h1>
        <a href="admin.php?section=categories&action=add" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> Add New Category
        </a>
    </div>
    
    <?php if (empty($categories)): ?>
        <div class="alert alert-info">
            No categories found. Please add a new category.
        </div>
    <?php else: ?>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $category): ?>
                                <tr>
                                    <td><?php echo $category['id']; ?></td>
                                    <td>
                                        <?php if (!empty($category['image_url'])): ?>
                                            <img src="<?php echo $category['image_url']; ?>" alt="<?php echo $category['name']; ?>" style="width: 50px; height: 50px; object-fit: cover;">
                                        <?php else: ?>
                                            <span class="badge bg-secondary">No Image</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $category['name']; ?></td>
                                    <td><?php echo substr($category['description'], 0, 100); ?>...</td>
                                    <td><?php echo $category['created_at']; ?></td>
                                    <td>
                                        <a href="admin.php?section=categories&action=edit&id=<?php echo $category['id']; ?>" class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form method="post" action="admin.php?section=categories&action=delete&id=<?php echo $category['id']; ?>" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this category? This will also delete all elements in this category.');">
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                        <a href="index.php?page=category&id=<?php echo $category['id']; ?>" class="btn btn-sm btn-secondary" target="_blank">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
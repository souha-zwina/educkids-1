<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Elements</h1>
        <a href="admin.php?section=elements&action=add" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> Add New Element
        </a>
    </div>
    
    <?php if (empty($elements)): ?>
        <div class="alert alert-info">
            No elements found. Please add a new element.
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
                                <th>Title</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Media</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($elements as $element): ?>
                                <tr>
                                    <td><?php echo $element['id']; ?></td>
                                    <td>
                                        <?php if (!empty($element['image_url'])): ?>
                                            <img src="<?php echo $element['image_url']; ?>" alt="<?php echo $element['title']; ?>" style="width: 50px; height: 50px; object-fit: cover;">
                                        <?php else: ?>
                                            <span class="badge bg-secondary">No Image</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $element['title']; ?></td>
                                    <td><?php echo substr($element['description'], 0, 100); ?>...</td>
                                    <td><?php echo $element['category_name']; ?></td>
                                    <td>
                                        <?php if (!empty($element['audio_url'])): ?>
                                            <span class="badge bg-success">Audio</span>
                                        <?php endif; ?>
                                        
                                        <?php if (!empty($element['video_url'])): ?>
                                            <span class="badge bg-primary">Video</span>
                                        <?php endif; ?>
                                        
                                        <?php if (empty($element['audio_url']) && empty($element['video_url'])): ?>
                                            <span class="badge bg-secondary">None</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="admin.php?section=elements&action=edit&id=<?php echo $element['id']; ?>" class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form method="post" action="admin.php?section=elements&action=delete&id=<?php echo $element['id']; ?>" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this element?');">
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
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
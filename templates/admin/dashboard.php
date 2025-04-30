<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</h1>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-folder me-2"></i>Categories</h5>
            </div>
            <div class="card-body">
                <h2 class="display-4 text-center"><?php echo countCategories(); ?></h2>
                <p class="text-center mb-0">Total Categories</p>
            </div>
            <div class="card-footer bg-transparent border-0">
                <a href="admin.php?section=categories" class="btn btn-outline-primary w-100">
                    <i class="fas fa-eye me-2"></i>View Categories
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-cube me-2"></i>Elements</h5>
            </div>
            <div class="card-body">
                <h2 class="display-4 text-center"><?php echo countElements(); ?></h2>
                <p class="text-center mb-0">Total Elements</p>
            </div>
            <div class="card-footer bg-transparent border-0">
                <a href="admin.php?section=elements" class="btn btn-outline-success w-100">
                    <i class="fas fa-eye me-2"></i>View Elements
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Quick Actions</h5>
            </div>
            <div class="card-body">
                <a href="admin.php?section=categories&action=add" class="btn btn-outline-primary w-100 mb-2">
                    <i class="fas fa-plus me-2"></i>Add Category
                </a>
                <a href="admin.php?section=elements&action=add" class="btn btn-outline-success w-100">
                    <i class="fas fa-plus me-2"></i>Add Element
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-folder me-2"></i>Latest Categories</h5>
            </div>
            <div class="card-body">
                <div class="list-group">
                    <?php
                    $categories = array_slice(getCategories(), 0, 5);
                    if (!empty($categories)):
                        foreach ($categories as $category):
                    ?>
                        <a href="admin.php?section=categories&action=edit&id=<?php echo $category['id']; ?>" class="list-group-item list-group-item-action">
                            <?php echo $category['name']; ?>
                        </a>
                    <?php
                        endforeach;
                    else:
                    ?>
                        <div class="text-center text-muted">No categories found</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-cube me-2"></i>Latest Elements</h5>
            </div>
            <div class="card-body">
                <div class="list-group">
                    <?php
                    $elements = array_slice(getAllElements(), 0, 5);
                    if (!empty($elements)):
                        foreach ($elements as $element):
                    ?>
                        <a href="admin.php?section=elements&action=edit&id=<?php echo $element['id']; ?>" class="list-group-item list-group-item-action">
                            <?php echo $element['title']; ?>
                            <small class="text-muted">(<?php echo $element['category_name']; ?>)</small>
                        </a>
                    <?php
                        endforeach;
                    else:
                    ?>
                        <div class="text-center text-muted">No elements found</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div> 
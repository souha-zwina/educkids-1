<div class="container-fluid">
    <h1 class="mb-4">Dashboard</h1>
    
    <div class="row">
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card border-primary">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Categories</h5>
                            <h2 class="card-text"><?php echo $categories_count; ?></h2>
                        </div>
                        <i class="fas fa-folder fa-3x text-primary"></i>
                    </div>
                    <a href="admin.php?section=categories" class="btn btn-sm btn-primary mt-3">Manage Categories</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card border-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Elements</h5>
                            <h2 class="card-text"><?php echo $elements_count; ?></h2>
                        </div>
                        <i class="fas fa-cube fa-3x text-success"></i>
                    </div>
                    <a href="admin.php?section=elements" class="btn btn-sm btn-success mt-3">Manage Elements</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card mt-4">
        <div class="card-header">
            <h5>Quick Actions</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <a href="admin.php?section=categories&action=add" class="btn btn-outline-primary mb-2 w-100">
                        <i class="fas fa-plus me-2"></i> Add New Category
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="admin.php?section=elements&action=add" class="btn btn-outline-success mb-2 w-100">
                        <i class="fas fa-plus me-2"></i> Add New Element
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card mt-4">
        <div class="card-header">
            <h5>Website Information</h5>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Website Name
                    <span class="badge bg-primary rounded-pill"><?php echo SITE_NAME; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Description
                    <span class="badge bg-primary rounded-pill"><?php echo SITE_DESCRIPTION; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Admin Username
                    <span class="badge bg-primary rounded-pill"><?php echo ADMIN_USERNAME; ?></span>
                </li>
            </ul>
        </div>
    </div>
</div>
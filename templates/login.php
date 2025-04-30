<h2>Login</h2>

<div style="max-width: 500px; margin: 0 auto;">
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?php echo $_SESSION['message_type']; ?>">
            <?php 
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
            ?>
        </div>
    <?php endif; ?>

    <form method="post" action="index.php?page=login">
        <div style="margin-bottom: 15px;">
            <label for="username" style="display: block; margin-bottom: 5px;">Username</label>
            <input type="text" name="username" id="username" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;" required>
        </div>
        
        <div style="margin-bottom: 15px;">
            <label for="password" style="display: block; margin-bottom: 5px;">Password</label>
            <input type="password" name="password" id="password" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;" required>
        </div>
        
        <div style="text-align: center;">
            <button type="submit" class="btn">Login</button>
        </div>
    </form>
</div>
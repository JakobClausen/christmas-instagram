<?php
require __DIR__.'/app/autoload.php';
require __DIR__.'/app/redirect.php';
require __DIR__.'/views/header-upload.php';

?>

<link rel="stylesheet" href="/assets/styles/main.css">
<link rel="stylesheet" href="/assets/styles/profile/change-settings.css">

<div class="change-cointainer">

    <form class="change-form" action="app/users/change-password.php" method="post">

        <div>
            <label for="current">Current password</label>
            <input type="password" name="current" required>
        </div>

        <div>
            <label for="new">New password</label>
            <input type="password" name="new" required>
        </div>

        <div>
            <label for="confirm">Confirm password</label>
            <input type="password" name="confirm" required>
        </div>

        <button type="submit" class="btn">Change password</button>
    </form>
</div>

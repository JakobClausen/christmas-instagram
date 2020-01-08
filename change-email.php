<?php
require __DIR__.'/app/autoload.php';
require __DIR__.'/app/redirect.php';
require __DIR__.'/views/header-upload.php';



?>

<link rel="stylesheet" href="/assets/styles/main.css">
<link rel="stylesheet" href="/assets/styles/change-settings.css">


<div class="change-cointainer">

    <form class="change-form" action="app/users/change-email.php" method="post">
        <div>
            <label for="current">Current email</label>
            <input type="email" name="current" required>

        </div>
        <div>
            <label for="new">New email</label>
            <input type="email" name="new" required>

        </div>

        <div>
            <label for="confirm">Confirm email</label>
            <input type="email" name="confirm" required>

        </div>

        <button type="submit" class="btn">Change password</button>


    </form>

</div>

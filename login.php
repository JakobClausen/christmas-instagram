<?php

require __DIR__.'/views/header.php'; ?>

<link rel="stylesheet" href="assets/styles/startscreen.css">
<link rel="stylesheet" href="assets/styles/login.css">

<h1 class="logo-log-in">FLIPU<span class="logo-p">P</span></h1>

<div class="log-in-cointainer">

    <form class="sign-in-form" action="app/users/login.php" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" required>

        </div><!-- /form-group -->

        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" required>

        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Login</button>

        <p>First time here?<a href="signup.php"> Sign up</a></p>

    </form>

</div>


<?php require __DIR__.'/views/footer.php'; ?>

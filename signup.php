<?php

 ?>
<link rel="stylesheet" href="assets/styles/startscreen.css">
<link rel="stylesheet" href="assets/styles/signup.css">



<a href="login.php"><img src="/assets/img/arrow.svg" alt=""></a>

    <h1 class="logo-log-in">SIGN U<span class="logo-p">P</span></h1>

    <div class="log-in-cointainer">

    <form class="sign-in-form" action="app/users/signup.php" method="post">

    <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" required>

        </div><!-- /form-group -->

        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" required>

        </div><!-- /form-group -->

        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" required>

        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">SIGN UP</button>

    </form>

</div>


<?php  ?>

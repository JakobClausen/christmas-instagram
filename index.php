<?php
require __DIR__.'/app/autoload.php';
require __DIR__.'/app/redirect.php';


?>


<?php echo 'Hello ' . $_SESSION['user']['username'] . '!'; ?>




<a href="/app/users/logout.php">Logout</a>



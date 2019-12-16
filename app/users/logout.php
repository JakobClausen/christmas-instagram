<?php
require __DIR__.'/../autoload.php';

session_destroy();

header('Location: /../../../login.php');
exit;

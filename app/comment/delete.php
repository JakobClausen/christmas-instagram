<?php
declare(strict_types=1);
require __DIR__.'/../autoload.php';

if (isset($_POST['id'])) {
    $commentId = (int) filter_var($_POST['id'], FILTER_SANITIZE_STRING);

    $statement=$pdo->prepare("DELETE FROM comment WHERE id = :commentId");
    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }
    $statement->bindParam(':commentId', $commentId, PDO::PARAM_STR);
    $statement->execute();
}
header('Location: /../../index.php');
exit;

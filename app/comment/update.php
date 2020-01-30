<?php
declare(strict_types=1);
require __DIR__.'/../autoload.php';

if(isset($_POST['comment'], $_POST['id'])){
    $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
    $commentId = (int) filter_var($_POST['id'], FILTER_SANITIZE_STRING);

    $statement=$pdo->prepare("UPDATE comment SET comment = :comment WHERE id = :commentId");
    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }
    $statement->bindParam(':commentId', $commentId, PDO::PARAM_INT);
    $statement->bindParam(':comment', $comment, PDO::PARAM_STR);
    $statement->execute();

}
header('Location: /../../index.php');
exit;

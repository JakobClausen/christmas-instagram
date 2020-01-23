<?php
declare(strict_types=1);
require __DIR__.'/../autoload.php';

if(isset($_POST['comment'], $_POST['id'])){
    $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
    $userId = $_SESSION['user']['user_id'];
    $postId = (int) filter_var($_POST['id'], FILTER_SANITIZE_STRING);

    $statement=$pdo->prepare("INSERT INTO comment (user_id, post_id, comment) VALUES (:userId, :postId, :comment)");
    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }
    $statement->bindParam(':userId', $userId, PDO::PARAM_INT);
    $statement->bindParam(':postId', $postId, PDO::PARAM_INT);
    $statement->bindParam(':comment', $comment, PDO::PARAM_STR);
    $statement->execute();

}

header('Location: /../../index.php');
exit;

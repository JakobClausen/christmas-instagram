<?php
declare(strict_types=1);


if (isset($_POST['like-id'])) {
   $postId = $_POST['like-id'];

    $statement = $pdo->prepare('SELECT `post_likes` FROM posts4 WHERE ID = :post_id');
    $statement->bindParam(':post_id', $postId);
    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }
    $statement->execute();
    $postLikes = $statement->fetch(PDO::FETCH_ASSOC);
    $updatedLikes = $postLikes['post_likes'] + 1;





    $query = "UPDATE `posts4` SET post_likes = :post_likes WHERE ID = :post_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':post_likes', $updatedLikes, PDO::PARAM_STR);
    $stmt->bindParam(':post_id', $postId);
    $stmt->execute();
}


// header('Location: /../../../index.php');
// exit;

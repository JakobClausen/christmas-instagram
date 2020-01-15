<?php
declare(strict_types=1);
require __DIR__.'/../autoload.php';

if (isset($_POST['post_id'])) {
   $postId = $_POST['post_id'];
   $userId = $_SESSION['user']['user_id'];

   $statement = $pdo->prepare('SELECT * FROM likes WHERE post_id = :postId');
    $statement->bindParam(':postId', $postId, PDO::PARAM_STR);
    $statement->execute();
    $post = $statement->fetch(PDO::FETCH_ASSOC);

    $statement = $pdo->prepare('SELECT `post_likes` FROM posts4 WHERE ID = :post_id');
        $statement->bindParam(':post_id', $postId);
        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }
        $statement->execute();
        $postLikes = $statement->fetch(PDO::FETCH_ASSOC);
        $updatedLikes = $postLikes['post_likes'];;

    if ($postId == $post['post_id'] && $userId == $post['user_id']) {

        $query = ('DELETE FROM likes WHERE user_id = :userId AND post_id = :postId');
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':postId', $postId);
        if (!$stmt) {
            die(var_dump($pdo->errorInfo()));
        }
        $stmt->execute();

        $updatedLikes = $updatedLikes - 1;

        $query = "UPDATE `posts4` SET post_likes = :post_likes WHERE ID = :post_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':post_likes', $updatedLikes, PDO::PARAM_STR);
        $stmt->bindParam(':post_id', $postId);
        $stmt->execute();

        echo $updatedLikes;


    }else{
        $query = "INSERT INTO `likes` (user_id, post_id) VALUES(:userId, :postId)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':postId', $postId);
        $stmt->execute();

            $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        $updatedLikes = $updatedLikes + 1;

        $query = "UPDATE `posts4` SET post_likes = :post_likes WHERE ID = :post_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':post_likes', $updatedLikes, PDO::PARAM_STR);
        $stmt->bindParam(':post_id', $postId);
        $stmt->execute();

        echo $updatedLikes;
    }
}




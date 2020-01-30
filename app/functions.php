<?php
declare(strict_types=1);

function countFollowers(int $chosenProfileId, PDO $pdo): int
{
    $statement=$pdo->prepare('SELECT COUNT(*) FROM follow WHERE user_id_1 = :userId');
    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }
    $statement->bindParam(':userId', $chosenProfileId, PDO::PARAM_INT);
    $statement->execute();
    $followers = $statement->fetch(PDO::FETCH_ASSOC);

    return (int)$followers['COUNT(*)'];
}

function getFollowById(int $userId, int $chosenProfileId, PDO $pdo){
    $statement=$pdo->prepare('SELECT * FROM follow WHERE user_id_0 = :userId AND user_id_1 = :chosenProfileId ');
    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }
    $statement->bindParam(':userId', $userId, PDO::PARAM_INT);
    $statement->bindParam(':chosenProfileId', $chosenProfileId, PDO::PARAM_INT);
    $statement->execute();
    $hasFollowed = $statement->fetch(PDO::FETCH_ASSOC);

    return $hasFollowed;

}

function getPostsByFollow(PDO $pdo){
    $statement=$pdo->prepare('SELECT * FROM posts4 INNER JOIN follow ON post_id = user_id_1 INNER JOIN users ON post_id = user_id ORDER BY upload_time DESC');
    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }
    $statement->execute();
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

    if($posts){
        return $posts;
    }
}

function getCommentById (int $postId, PDO $pdo){
    $statement=$pdo->prepare('SELECT * FROM comment INNER JOIN posts4 ON comment.post_id = posts4.ID WHERE posts4.ID = :postId');
    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }
    $statement->bindParam(':postId', $postId, PDO::PARAM_INT);
    $statement->execute();
    $comments = $statement->fetchAll(PDO::FETCH_ASSOC);

    if($comments){
        return $comments;
    }
}

function getCreatorById (int $commentCreatorId, PDO $pdo){
    $statement=$pdo->prepare('SELECT username, comment.user_id FROM comment INNER JOIN users ON comment.user_id = users.user_id WHERE comment.user_id = :commentCreatorId');
    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }
    $statement->bindParam(':commentCreatorId', $commentCreatorId, PDO::PARAM_INT);
    $statement->execute();
    $creator = $statement->fetch(PDO::FETCH_ASSOC);

    if($creator){
        return $creator;
    }
}


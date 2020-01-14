<?php


if (isset($_POST['id'])) {
    $postId = $_POST['id'];

    $query = ('SELECT * FROM posts4 JOIN users ON post_id = user_id WHERE post_id = :id ORDER BY upload_time DESC');
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $postId);
    if (!$stmt) {
        die(var_dump($pdo->errorInfo()));
    }

    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);


}




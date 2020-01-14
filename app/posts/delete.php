<?php
require __DIR__.'/../autoload.php';

if (isset($_POST['post-id'])) {
    $postId = $_POST['post-id'];

    $query = ('DELETE FROM posts4 WHERE ID = :postId');
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':postId', $postId);
    if (!$stmt) {
        die(var_dump($pdo->errorInfo()));
    }
    $stmt->execute();
 }

 header('Location: /../../../my-profile.php');
 exit;

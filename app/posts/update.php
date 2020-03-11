<?php
require __DIR__.'/../autoload.php';

if (isset($_POST['biography'], $_POST['post-id'])) {
    $newDescription = $_POST['biography'];
    $id = $_POST['post-id'];

    $query = "UPDATE `posts4` SET description = :newDescription WHERE ID = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':newDescription', $newDescription);
    $stmt->execute();
}

header('Location: /../../../my-profile.php');
exit;

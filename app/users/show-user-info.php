<?php


$userId = $_SESSION['user']['user_id'];


    $query = ('SELECT * FROM users WHERE user_id = :id');
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $userId);
    if (!$stmt) {
        die(var_dump($pdo->errorInfo()));
    }

    $stmt->execute();
    $info = $stmt->fetchAll(PDO::FETCH_ASSOC);



<?php





    $query = ("SELECT image FROM posts4 ORDER BY RANDOM() LIMIT 6");
    $stmt = $pdo->prepare($query);
    if (!$stmt) {
        die(var_dump($pdo->errorInfo()));
    }
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    shuffle($posts);





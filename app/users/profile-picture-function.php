<?php
declare(strict_types=1);

if (isset($_FILES['image'])) {
   $image =  $_FILES['image'];
   $id = $_SESSION['user']['user_id'];

   $destination = '../../assets/img/'.date('ymd').'-'.$image['name'];


    move_uploaded_file($image['tmp_name'], $destination);

    $query = "UPDATE `users` SET profile_picture = :image WHERE user_id = :id";
    $stmt = $pdo->prepare($query);
    if (!$stmt) {
        die(var_dump($pdo->errorInfo()));
    }
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':image', $destination);
    $stmt->execute();

}

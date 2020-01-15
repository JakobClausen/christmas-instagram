<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';



if (isset($_FILES['image'], $_POST['biography'])) {
   $image =  $_FILES['image'];
   $biography = $_POST['biography'];
   $id = $_SESSION['user']['user_id'];
   $dateTime = date("Y/m/d-H/i/s");
   $likes = 0;


   $destination = '../../assets/img/'.date('ymd').'-'.$image['name'];

    move_uploaded_file($image['tmp_name'], $destination);

    $query = "INSERT INTO `posts4` (post_id, image, description, upload_time, post_likes) VALUES(:post_id, :image, :description, :upload_time, :post_likes)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':post_id', $id);
    $stmt->bindParam(':image', $destination);
    $stmt->bindParam(':description', $biography);
    $stmt->bindParam(':upload_time', $dateTime);
    $stmt->bindParam(':post_likes', $likes);
    $stmt->execute();







    header('Location: /../../../index.php');
    exit;





}

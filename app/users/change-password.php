<?php
require __DIR__.'/../autoload.php';
require __DIR__.'/show-user-info.php';



if (isset($_POST['current'], $_POST['new'], $_POST['confirm'])) {
    $current = trim($_POST['current']);
    $new = trim($_POST['new']);
    $confirm = trim($_POST['confirm']);


    if (password_verify($current, $info[0]['password_hash'])) {
        if ($new === $confirm) {

            $hash = password_hash($new, PASSWORD_DEFAULT, array("cost" => 10));

            $query = "UPDATE `users` SET password_hash = :password_hash WHERE user_id = :id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id', $userId, PDO::PARAM_STR);
            $stmt->bindParam(':password_hash', $hash);
            $stmt->execute();
        }
    }
}

header('Location: /../../../settings.php');
exit;

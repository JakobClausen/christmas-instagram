<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';


if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {

    $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $hash = password_hash($password, PASSWORD_DEFAULT, array("cost" => 10));


    $query = "INSERT INTO `users` (username, email, password_hash) VALUES(:username, :email, :password_hash)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password_hash', $hash);
    $stmt->execute();

    $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);




    $_SESSION['user'] = $user;
    header('location: ../../add-profile-picture.php');
    exit;





}


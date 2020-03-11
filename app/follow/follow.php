<?php
declare(strict_types=1);
require __DIR__.'/../autoload.php';

if (isset($_POST['user_id'])) {
    $userId = (int) $_SESSION['user']['user_id'];
    $chosenProfileId = (int) filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);

    if ($userId !== $chosenProfileId) {
        $statement=$pdo->prepare("SELECT * FROM follow WHERE user_id_0 = :userId AND user_id_1 = :chosenProfileId");
        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }
        $statement->bindParam(':userId', $userId, PDO::PARAM_INT);
        $statement->bindParam(':chosenProfileId', $chosenProfileId, PDO::PARAM_INT);
        $statement->execute();

        $followed = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$followed) {
            $statement=$pdo->prepare("INSERT INTO follow (user_id_0, user_id_1) VALUES (:userId, :chosenProfileId)");
            $statement->bindParam(':userId', $userId, PDO::PARAM_INT);
            $statement->bindParam(':chosenProfileId', $chosenProfileId, PDO::PARAM_INT);
            $statement->execute();
        }
    }
}

header('Location: /../../index.php');
exit;

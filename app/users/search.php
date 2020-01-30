<?php
require __DIR__.'/../autoload.php';

if (isset($_POST['searchval'])) {
    $search = filter_var(trim($_POST['searchval']), FILTER_SANITIZE_STRING);
    $search = preg_replace("#[^0-9a-z]#i", "", $search);




    $query = ("SELECT * FROM users WHERE username LIKE '%$search%'");
    $stmt = $pdo->prepare($query);
    if (!$stmt) {
        die(var_dump($pdo->errorInfo()));
    }
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($users as $key => $user) {
        $profilePicture = $user['profile_picture'];
        $username = $user['username'];
        $profilePage = "/other-profile.php";
        $id = $user['user_id'];

             echo "<form action='$profilePage' method='post'>
             <label>
             <input style='display: none;' type='submit' name='id' value='$id'/>
             <div class='result-user'>
                <img src='$profilePicture' alt=''>
            <p>$username</p> <br>
            </div>
            </label>
            </form>";

    };

};

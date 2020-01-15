<?php
require __DIR__.'/app/autoload.php';
require __DIR__.'/app/redirect.php';
require __DIR__.'/views/header-upload.php';
require __DIR__.'/app/users/show-user-info.php';

echo $userId;

?>

<link rel="stylesheet" href="/assets/styles/main.css">
<link rel="stylesheet" href="/assets/styles/profile/settings.css">


<div class="settings-container">

    <div class="image-flex">
        <div class="img-container">
            <img src="<?php echo $info[0]['profile_picture'] ?>" alt="">
        </div>
    </div>

    <a class="link" href="/change-profile-pic.php"><div class="button-structure"><p>Change profile picture</p></div></a>

    <a class="link" href="/change-email.php"><div class="button-structure"><p>Change Email</p></div></a>

    <a class="link" href="/change-password.php"><div class="button-structure"><p>Change Password</p></div></a>

    <div class="button-flex">
    <a class="link" href="/app/users/logout.php"><div class="button-structure logout"><p>Log out</p></div></a>
    </div>

</div>


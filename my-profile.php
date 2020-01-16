<?php
require __DIR__.'/app/autoload.php';
require __DIR__.'/app/redirect.php';
require __DIR__.'/views/header-profile.php';
require __DIR__.'/app/users/feedcontent.php';
require __DIR__.'/app/users/show-user-info.php';




?>

<link rel="stylesheet" href="/assets/styles/main.css">
<link rel="stylesheet" href="/assets/styles/profile/my-profile.css">


<div class="profile-container">

    <div class="profil-information-container">
        <div class="profil-flex">
            <div class="profile-img-container">
                <img src="<?php echo $info[0]['profile_picture'] ?>" alt="">
            </div>
    </div>
    <div class="profile-username profil-flex">
        <p><?php echo $_SESSION['user']['username'] ?></p>
    </div>
    <div class="profile-followers profil-flex">
        <p>100 followers</p>
        </div>
    </div>

    <div class="images-container">

    <?php foreach ($posts as $post): ?>

        <div class="post-container" id="<?php echo $post["ID"] ?>">

            <div class="img-container">
                <img src="<?php echo $post['image']; ?>" alt="img" class="img">
            </div>

            <p class="Description">Description</p>

            <div class="biography-section">
                <p><?php echo $post['description'] ?></p>
            </div>
        </div>


    <?php endforeach; ?>


    </div>
    <form action="/edit.php" method="post">
        <input style="display:none;" id="input-edit" type="text" name="post-id" value="">
        <div class="button-container">
        <button type="submit">Edit</button>
        </div>
        </form>


</div>


<script src="/assets/scripts/edit.js"></script>

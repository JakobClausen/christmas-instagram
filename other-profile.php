<?php
require __DIR__.'/app/autoload.php';
require __DIR__.'/app/redirect.php';
require __DIR__.'/views/header-upload.php';
require __DIR__.'/app/users/feedcontent.php';


?>

<link rel="stylesheet" href="/assets/styles/main.css">
<link rel="stylesheet" href="/assets/styles/other-profile.css">


<div class="profile-container">

    <div class="profil-information-container">
        <div class="profil-flex">
        <img src="/assets/img/profile-pic.jpg" alt="">
    </div>

    <div class="profile-username profil-flex">
        <p><?php echo $_SESSION['user']['username'] ?></p>
    </div>

    <div class="profile-followers profil-flex">
        <p>100 followers</p>
    </div>

    <div class="profil-flex">
    <div class="follow-button"><p>Follow</p></div>
    </div>


    </div>

    <div class="images-container">

    <?php foreach ($posts as $post): ?>

            <div class="post-container">
                <img src="<?php echo $post['image']; ?>" alt="img" class="img">



                <p class="Description">Description</p>

                <div class="biography-section">
                <p><?php echo $post['description'] ?></p>
                </div>
                </div>


    <?php endforeach; ?>


    </div>


</div>

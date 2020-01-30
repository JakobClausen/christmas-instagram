<?php
require __DIR__.'/app/autoload.php';
require __DIR__.'/app/redirect.php';
require __DIR__.'/views/header-upload.php';
require __DIR__.'/app/users/other-profile.php';

$userId = (int) $_SESSION['user']['user_id'];
$chosenProfileId = $posts[0]['user_id'];
$hasFollowed = getFollowById($userId, $chosenProfileId, $pdo);
$followers = countFollowers($chosenProfileId, $pdo);
?>

<link rel="stylesheet" href="/assets/styles/main.css">
<link rel="stylesheet" href="/assets/styles/profile/other-profile.css">

<div class="profile-container">

    <div class="profil-information-container">
        <div class="profil-flex">
        <img src="<?php echo $posts[0]['profile_picture'] ?>" alt="">
    </div>

    <div class="profile-username profil-flex">
        <p><?php echo $posts[0]['username'] ?></p>
    </div>

    <div class="profile-followers profil-flex">
    <?php if($followers === 0): ?>
            <p>Waiting for followers!</p>
    <?php elseif($followers === 1): ?>
            <p><?php echo $followers ; ?> follower</p>
    <?php elseif($followers > 1): ?>
            <p><?php echo $followers ; ?> followers</p>
    <?php endif;?>
    </div>

    <div class="profil-flex">
    <?php if($hasFollowed):?>
            <form action="/app/follow/unfollow.php" method="post">
                <input type="hidden" name="user_id" value="<?php echo $chosenProfileId;?>">
                <input type="submit" value="Unfollow" class="follow-button"></input>
            </form>
    <?php else: ?>
            <form action="/app/follow/follow.php" method="post">
                <input type="hidden" name="user_id" value="<?php echo $chosenProfileId; ?>">
                <input type="submit" value="Follow" class="follow-button"></input>
            </form>
    <?php endif; ?>
    </div>


    </div>

    <div class="images-container">

    <?php foreach ($posts as $post): ?>

            <div class="post-container">
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
</div>

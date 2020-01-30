<?php
declare(strict_types=1);
require __DIR__.'/app/autoload.php';
require __DIR__.'/app/redirect.php';
require __DIR__.'/views/header.php';
// require __DIR__.'/app/users/feedcontent.php';
// require __DIR__.'/app/users/show-user-info.php';


$posts = getPostsByFollow($pdo);
?>

<link rel="stylesheet" href="/assets/styles/like-animation.css">
<link rel="stylesheet" href="/assets/styles/index.css">
<link rel="stylesheet" href="/assets/styles/main.css">
<link rel="stylesheet" href="assets/styles/comment.css">


<div class="posts" >
<?php foreach ($posts as $post):
$postId = (int) $post['ID'];
$userId = $_SESSION['user']['user_id'];
$comments = getCommentById($postId, $pdo);
?>
    <div class="post-container slide">

        <div class="img-container">
            <img class="img-post" src="<?php echo $post['image']; ?>" alt="img" class="img">
        </div>

        <div class="like-container">
            <form action="index.php" method="post" class="like-form">
                <div class="like-img hover" onclick="like_add('<?php echo $post['ID'];?>')">
                    <input style="display: none;" class="like-id">
                    <img class="like-heart-img" src="/assets/img/heart-empty.svg" alt="">
                    <img class="bookmark-img" src="/assets/img/bookmark.svg" alt="">
                </div>
                <p id="likes-value_<?php echo $post['ID'];?>" class="post-likes"><?php echo $post['post_likes'];?> likes</p>
                </form>

            </div>

            <div class="profile-container">
                <div class="profile-left-container">
                    <img src="<?php echo $post['profile_picture']?>" alt="profile picture">

        <div class="profile-container">
            <div class="profile-left-container">
                <img src="<?php echo $info[0]['profile_picture'] ?>" alt="">
                    <div class="followers">
                        <p><?php echo $post['username'];?></p>
                    </div>
                </div>
            </div>

        <div class="follow-button"><p>Follow</p></div></div>

                <p class="Description">Description</p>
                <div class="biography-section">
                    <p><?php echo $post['description'] ?></p>
                </div>

                <?php if($comments):?>
                    <?php foreach ($comments as $comment): ?>
                        <?php
                        $commentCreatorId = (int) $comment['user_id'];
                        $commentCreator = getCreatorById($commentCreatorId, $pdo);
                        ?>
                <div class="comment-section">
                    <form action="app/comment/update.php" method="post" class="grey form">
                        <div class="comment-container">
                            <p class="grey bold"><?php echo $commentCreator['username'];?></p>
                            <textarea type="text" class="textarea" name="comment" cols="30" rows="2"><?php echo $comment['comment']; ?></textarea>
                        </div> <!-- /comment-container -->
                        <?php if ($userId === $comment['user_id']): ?>
                        <div class="edit-delete-button">
                            <input type="hidden" name="id" value="<?php echo $comment['id'];?>">
                            <input type="submit" value="Edit" class="comment-button edit"></input>
                        </form>

                        <form action="app/comment/delete.php" method="post" class="grey">
                            <input type="hidden" name="id" value="<?php echo $comment['id'];?>">
                            <input type="submit" value="Delete" class="comment-button"></input>
                        </div> <!-- /edit-delete-button -->
                        <?php endif; ?>
                    </form>
                </div> <!-- /comment-section -->
                <?php endforeach; ?>
                <?php endif ;?>

                <form action="app/comment/store.php" method="post" class="comment-section">
                    <textarea type="text" name="comment" placeholder="Add a comment..." cols="30" rows="5" class="textarea"></textarea>
                    <input type="hidden" name="id" value="<?php echo $post['ID'];?>">
                    <input type="submit" value="Post" class="comment-button"></input>
                </form>
    </div>
<?php endforeach; ?>

</div>

<section class="button-container"><a href="/upload.php"><button>+</button></a></section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="/assets/scripts/like.js"></script>
<script src="/assets/scripts/like-update.js"></script>



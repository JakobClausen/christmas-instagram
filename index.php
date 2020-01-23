<?php
declare(strict_types=1);
require __DIR__.'/app/autoload.php';
require __DIR__.'/app/redirect.php';
require __DIR__.'/views/header.php';
// require __DIR__.'/app/users/feedcontent.php';
require __DIR__.'/app/users/show-user-info.php';


$posts = getPostsByFollow($pdo);
$comment = getCommentById($pdo);
?>

<link rel="stylesheet" href="/assets/styles/like-animation.css">
<link rel="stylesheet" href="/assets/styles/index.css">
<link rel="stylesheet" href="/assets/styles/main.css">


<div class="posts" >
<?php foreach ($posts as $post): ?>
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
                    <img src="<?php echo $info[0]['profile_picture'] ?>" alt="">

                    <div class="followers">
                        <p><?php echo $post['username'];?></p>
                    </div>
                </div>
            </div>

                <p class="Description">Description</p>
                <div class="biography-section">
                    <p><?php echo $post['description'] ?></p>
                </div>

                <?php if($comment):?>
                <div class="biography-section">
                    <form action="app/comment/update.php" method="post" >
                        <label for="comment">Comment</label>
                        <div>
                            <textarea type="text" name="comment" placeholder="Add a comment..." cols="30" rows="5"><?php echo $comment['comment']; ?></textarea>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $comment['id'];?>">
                        <input type="submit" value="Edit"></input>
                    </form>

                    <form action="app/comment/delete.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $comment['id'];?>">
                        <input type="submit" value="Delete"></input>
                    </form>
                </div> <!-- /biography-section -->
                <?php endif ;?>

                <form action="app/comment/store.php" method="post" class="biography-section">
                    <label for="comment">Comment</label>
                    <div>
                        <textarea type="text" name="comment" placeholder="Add a comment..." cols="30" rows="5"></textarea>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $post['ID'];?>">
                    <input type="submit" value="Post"></input>
                </form>






    </div>
<?php endforeach; ?>

</div>

<section class="button-container"><a href="/upload.php"><button>+</button></a></section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="/assets/scripts/like.js"></script>
<script src="/assets/scripts/like-update.js"></script>



<?php
declare(strict_types=1);
require __DIR__.'/app/autoload.php';
require __DIR__.'/app/redirect.php';
require __DIR__.'/views/header-upload.php';
require __DIR__.'/app/users/edit.php';

?>



<link rel="stylesheet" href="/assets/styles/main.css">
<link rel="stylesheet" href="/assets/styles/profile/edit.css">


<div class="settings-container">

<div class="post-container" id="<?php echo $posts[0]['ID'] ?>">
                <img src="<?php echo $posts[0]['image']; ?>" alt="img" class="img">

                <form action="/app/posts/update.php" method="post">
                    <div class="textarea-container">
                        <input style="display: none;" type="text" value="<?php echo $posts[0]['ID'] ?>" name="post-id">
                        <label class="description" for="biography"> Description:</label>
                        <textarea class="biography" name="biography"><?php echo $posts[0]['description']; ?></textarea>
                    </div>
                        <button type="submit" class="btn btn-change">CHANGE POST</button>
                </form>

                <form action="/app/posts/delete.php" method="post">
                <input style="display: none;" type="text" value="<?php echo $posts[0]['ID'] ?>" name="post-id">
                <button type="submit" class="btn btn-delete">DELETE POST</button>
                </form>



</div>

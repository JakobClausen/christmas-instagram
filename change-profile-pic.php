<?php
require __DIR__.'/app/autoload.php';
require __DIR__.'/app/redirect.php';
require __DIR__.'/views/header-upload.php';
require __DIR__.'/app/users/show-user-info.php';




?>

<link rel="stylesheet" href="/assets/styles/main.css">
<link rel="stylesheet" href="/assets/styles/profile/change-profile-pic.css">


<div class="settings-container">

<form action="/app/users/redirect-settings.php" method="post" enctype="multipart/form-data">

<label class="custom-file-upload">
            <input type="file" name="image" onChange="displayImage(this)" id="profileImage" / >
            <div class="image-flex">
        <img src="<?php echo $info[0]['profile_picture'] ?>" alt="" onClick="triggerClick()" id="profileDisplay">
        <h1>+</h1>
    </div>

</label>

<div class="button-bottom">
        <div class="button-flex">
       <button type="submit" class="button-structure logout"><p>Change</p></button>
        </div>
    </div>
</form>

</div>


<script src="/assets/scripts/picture-preview.js"></script>

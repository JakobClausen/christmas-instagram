<?php

require __DIR__.'/app/autoload.php';




?>

<link rel="stylesheet" href="/assets/styles/main.css">
<link rel="stylesheet" href="/assets/styles/add-profile-picture.css">


<div class="settings-container">

<form action="/app/users/redirect-index.php" method="post" enctype="multipart/form-data" id="userform">


            <label class="custom-file-upload">
            <input type="file" name="image" onChange="displayImage(this)" id="profileImage" / >
            <div class="image-flex upload-img">
        <img src="/assets/img/default-profile.jpg" alt="" onClick="triggerClick()" id="profileDisplay">
        <h1>+</h1>
    </div>
            </label>


            <div class="button-bottom">
        <div class="button-flex">
       <button type="submit" class="button-structure logout"><p>Add</p></button>
        </div>
    </div>
            </form>
</div>

<script src="/assets/scripts/picture-preview.js"></script>

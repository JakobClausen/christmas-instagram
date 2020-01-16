<?php
declare(strict_types=1);
require __DIR__.'/app/autoload.php';
require __DIR__.'/app/redirect.php';
require __DIR__.'/views/header-upload.php';
echo $_SESSION['user']['user_id'];
?>

<link rel="stylesheet" href="/assets/styles/main.css">
<link rel="stylesheet" href="/assets/styles/upload.css">

<div class="upload-container">

    <form action="/app/users/upload.php" method="post" enctype="multipart/form-data" id="userform">


            <label class="custom-file-upload">
            <input type="file" name="image" onChange="displayImage(this)" id="profileImage" / >
            <div class="upload-img" id="hide-div" >
            <h1>+</h1>
            </div>
            <img class="upload-img hide-img" src="#" alt=""  onClick="triggerClick()" id="profileDisplay">
            </label>



    </form>
    <div class="textarea-container">
    <label class="description" for="biography"> Description:</label>
    <textarea class="biography" name="biography" form="userform"></textarea>
    <button type="submit" class="btn btn-primary" form="userform">UPLOAD POST</button>
    </div>



</div>

<script src="/assets/scripts/upload-preview.js"></script>

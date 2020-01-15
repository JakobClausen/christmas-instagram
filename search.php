<?php
declare(strict_types=1);
require __DIR__.'/app/autoload.php';
require __DIR__.'/views/header-search.php';
require __DIR__.'/app/users/search-feed.php';


?>
<link rel="stylesheet" href="/assets/styles/main.css">
<link rel="stylesheet" href="/assets/styles/search.css">



<div class="search-container">
<form action="search.php" method="post">
    <input class="search-field" type="text" name="search" placeholder="search" autocomplete="off" onkeydown="searchq();">
</form>
</div>


<div class="result-container" id="output">

</div>



<div class="random-images-container">
    <?php foreach ($posts as $post): ?>
        <div class="image-container">
            <img src="<?php echo $post['image']?>" alt="">
        </div>

    <?php endforeach; ?>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css">
<script src="/assets/scripts/search.js"></script>



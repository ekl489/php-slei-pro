<?php
    // retrieve $forumn
    require_once 'models/forumn.model.php';
    $posts = $forumn->getPosts();

    // show view
    include_once 'views/forumn.view.php';
?>

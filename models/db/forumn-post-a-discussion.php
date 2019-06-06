<?php
    // require 
    require_once '../forumn.model.php';

    $author = $_POST["author"];
    $body = $_POST["body"];

    if(isset($author) && isset($body)){
        $forumn->addPost(new ForumnPost(0, $author, $body));
    } else {
        die("Error");
    }

    header('Location: /forumn');

?>
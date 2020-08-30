<?php
require_once 'classes/ShortUrl.php';

if(isset($_GET)) {
    $shortUrl = new ShortUrl();
    $code = $_GET['code'];

    if($url = $shortUrl->getUrl($code)) {
        header("Location: {$url}");
        die();
    }
}

header('Location: /');
<?php
session_start();
require_once 'classes/ShortUrl.php';
require_once 'classes/Records.php';

$shortUrl = new ShortUrl();
$records = new Records();

if(isset($_POST['url'])) {
    $url = $_POST['url'];
    $date = $_POST['date'];
    if($code = $shortUrl->makeCode($url, $date)) {
        $_SESSION['success'] = "Generated and added to table! Your shor URL is: <a href=\"http://$_SERVER[HTTP_HOST]/{$code}\">http://$_SERVER[HTTP_HOST]/{$code}</a>";
    } else {
        $_SESSION['error'] = "URL already exist!";
    }
}

if(isset($_POST['del_user'])) {
    $records->deleteRecord($_POST['del_user']);
}

if(isset($_POST['uri'])) {
    $code = parse_url($_POST['uri'], PHP_URL_PATH );
    $code = substr($code, 1);
    $records->addCount($code);
}

header('Location: /');
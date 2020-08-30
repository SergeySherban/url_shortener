<?php

require_once "Connection.php";

class ShortUrl
{
    protected function generateCode($num) {
        return base_convert($num, 10, 36);
    }

    public function makeCode($url, $date) {
        $url = trim($url);
        $url = htmlspecialchars($url);
        if(!filter_var($url, FILTER_VALIDATE_URL)) {
            return '';
        }
        //check URL
        $existUrl = Connection::conn()->prepare("SELECT `code` FROM `short_url` WHERE `url` = :url");
        $existUrl->execute(['url'=>$url]);

        if($existUrl->fetchObject()->code) {
            return $existUrl->fetchObject()->code;
        } else {
            //Insert new record with unique url
            $code = $this->generateCode(mt_rand());
            $newUrl = Connection::conn()->prepare("INSERT INTO `short_url` (`url`, `code`, `created`, `expiration`) VALUES (:url, :code, NOW(), :date)");
            $newUrl->execute(['url'=>$url, 'code'=>$code, 'date'=>$date]);
            return $code;
        }
    }

    public function getUrl($code) {
        $uri = Connection::conn()->prepare("SELECT `url` FROM `short_url` WHERE `code` = :code");
        $uri->execute(['code'=>$code]);

        if($uri->rowCount()) {
            return $uri->fetchObject()->url;
        }
        return '';
    }
}
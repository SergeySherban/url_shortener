<?php

class Connection {
    public static function conn()
    {
        $configs = include('config.php');
        $servername = $configs['host'];
        $dbname = $configs['dbname'];
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $configs['username'], $configs['password']);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}



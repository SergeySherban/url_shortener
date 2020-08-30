<?php

require_once "Connection.php";

class Records
{
    public function getRecords()
    {
        $dataRecords = Connection::conn()->prepare('SELECT * FROM `short_url` ORDER BY `id` DESC');
        $dataRecords->execute();
        $data = $dataRecords->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function deleteRecord($id)
    {
        $deleteRecord = Connection::conn()->prepare('DELETE FROM `short_url` WHERE `id` = :id');
        $deleteRecord->execute(['id'=>$id]);
    }

    public function addCount($code) {
        $addClick = Connection::conn()->prepare('UPDATE `short_url` SET `count` = `count` + 1 WHERE `code` = :code');
        $addClick->execute(['code'=>$code]);
        $count = Connection::conn()->prepare('SELECT `count` FROM `short_url` WHERE `code` = :code');
        $count->execute(['code'=>$code]);
        $data = $count->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
}

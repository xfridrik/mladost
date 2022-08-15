<?php
require_once "MyPDO.php";

if(isset($_GET["id"]) && isset($_GET["name"])){
    try {
        $sql = "INSERT INTO people (nickname, room_id) VALUES (:name, :room)";
        $stmt = MyPDO::instance()->prepare($sql);
        $stmt->execute([":name"=>$_GET["name"], ":room"=>$_GET["id"]]);
    }catch (Exception $e){}
}
header('Location: ' . $_SERVER['HTTP_REFERER']);

die();

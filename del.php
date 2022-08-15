<?php
require_once "MyPDO.php";

if(isset($_POST["id"])){
    try {
        $sql = "DELETE FROM people where id = :id";
        $stmt = MyPDO::instance()->prepare($sql);
        $stmt->execute([":id"=>$_POST["id"]]);
    } catch (Exception $e){
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);

die();

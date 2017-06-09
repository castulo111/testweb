<?php
    const SQL_SHOW="N";
    include ("mysqlilib.php");
    $db = new StockDB('localhost','root','','test');
    $message_id = $_POST['message_id'];

    $sql = "DELETE FROM message WHERE message_id = '$message_id'";
    $db -> query($sql);

 ?>
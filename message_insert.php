<?php
    const SQL_SHOW="N";
    include ("mysqlilib.php");
    $db = new StockDB('localhost','root','','test');

    $product_id = $_POST['product_id'];
    $message_name = $_POST['message_name'];
    $message_content = $_POST['message_content'];
    date_default_timezone_set('Asia/Taipei');
    $date =  date("Y-m-d H:i:s");

    $sql = "INSERT INTO message(product_id,name,message,date) VALUES ('$product_id' , '$message_name' , ' $message_content' , '$date')";
    $db->query($sql);

 ?>
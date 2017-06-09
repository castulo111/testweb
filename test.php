<?php
   // include ("mysql.class.php");
    const SQL_SHOW="N";
    include ("mysqlilib.php");
    $db = new StockDB('localhost:3306','root','','test');
    $sql = "select * from login";
    $db->query($sql);
    while ($db->next_record()) {
        $r = $db->record;
        echo $db->f("user_id")."<br>";
        echo $r["user_id"]."<br>";


    }
    print_r($r);
?>
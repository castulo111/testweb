<?php
    ini_set("display_errors", "On");
    require_once "libs/Smarty.class.php";
    $smarty = new Smarty();
    const SQL_SHOW="N";
    include ("mysqlilib.php");
    $db = new StockDB('localhost','root','','test');

    $sql = "select * from login ";
    $db->query($sql);

    $i = 0;
    while ($db->next_record()){
        $r = $db->record;
        $user[$i] = $r;
        $i++;
    }

    $j = 0;


    $sql2 = "select * from product";
    $db->query($sql2);
    while ($db->next_record()){
        $r = $db->record;
        $product_array[$j] = $r;
        $j++;
    }





    $smarty->assign("title", "首頁");
    $smarty->assign("user", $user);
    $smarty->assign("product_array", $product_array);
    $smarty->display('index.html');
 ?>
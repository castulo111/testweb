<?php
    ini_set("display_errors", "On");
    require_once "libs/Smarty.class.php";
    $smarty = new Smarty();
    $product_id = $_GET["product_id"];
    //本頁資料
    const SQL_SHOW="N";
    include ("mysqlilib.php");
    $db = new StockDB('localhost','root','','test');
    $sql = "select * from product where product_id = ' $product_id' ";
    $db -> query($sql);
    $i = 0;
    while ($db->next_record()){
        $r = $db->record;
        $product_array[$i] = $r;
        $i++;
    }

    $sql2 = "select * from product where product_id = ' $product_id' ";
    $db -> query($sql2);
    while ($db->next_record()){
        $r = $db->record;
        $user_id= $r['user_id'];
    }

    $sql3 = "select * from login where user_id = ' $user_id' ";
    $db -> query($sql3);
    while ($db->next_record()){
        $r = $db->record;
        $user= $r['user'];
    }
    $n=0;
    $sql4 = "select * from message where product_id = '$product_id' ";
    $db -> query($sql4);
    while ($db->next_record()){
        $r = $db->record;
        $message_array[$n] = $r;
        $n++;
    }





    //列表資料
    $sql = "select * from login ";
    $db->query($sql);
    $i = 0;
    while ($db->next_record()){
        $r = $db->record;
        $user2[$i] = $r;
        $i++;
    }
    $j = 0;
    $sql2 = "select * from product";
    $db->query($sql2);
    while ($db->next_record()){
        $r = $db->record;
        $product_array2[$j] = $r;
        $j++;
    }




    $smarty->assign("title", "商品內容");
    $smarty->assign("user", $user);
    $smarty->assign("product_id", $product_id);
    $smarty->assign("product_array", $product_array);
    $smarty->assign("user2", $user2);
    $smarty->assign("product_array2", $product_array2);
    if(isset($message_array)){$smarty->assign("message_array", $message_array);}
    $smarty->display('index_message.html');
 ?>
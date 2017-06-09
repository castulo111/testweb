<?php
    ini_set("display_errors", "On");
    require_once "libs/Smarty.class.php";
    $smarty = new Smarty();
    $smarty->assign("title", "商品詳細內容");

    session_start();
    $user_id = $_SESSION['user_id'];
    $product_id = $_GET['product_id'];

    const SQL_SHOW="N";
    include ("mysqlilib.php");
    $db = new StockDB('localhost','root','','test');
    $sql = "select * from product where user_id = '$user_id' AND product_id = '$product_id' ";
    $db -> query($sql);
    $i = 0;
    while ( $db -> next_record()){
        $r = $db ->record;
        $product_array[$i] = $r;
        $i++;
    }

    $sql3 = "select * from login where user_id = ' $user_id' ";
    $db -> query($sql3);
    while ($db->next_record()){
        $r = $db->record;
        $user= $r['user'];
    }

    $n=0;
    $sql = "select * from message where product_id = '$product_id' ";
    $db -> query($sql);
    while ($db->next_record()){
        $r = $db->record;
        $message_array[$n] = $r;
        $n++;
    }



    $smarty->assign("user",$user);
    $smarty->assign("product_array",$product_array);
    if(isset($message_array)){$smarty->assign("message_array", $message_array);}
    $smarty->display('backend_productcheck.html');

?>
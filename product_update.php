<?php
    ini_set("display_errors", "On");
    require_once "libs/Smarty.class.php";
    $smarty = new Smarty();
    $smarty->assign("title", "修改商品");

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

    $smarty->assign("product_array",$product_array);











    $smarty->display('product_update.html');

?>
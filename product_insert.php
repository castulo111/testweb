<?php
    ini_set("display_errors", "On");
    require_once "libs/Smarty.class.php";
    $smarty = new Smarty();
    $smarty->assign("title", "新增商品");

    session_start();
    $user_id = $_SESSION['user_id'];
    $smarty->assign("user_id", $user_id);



    $smarty->display('product_insert.html');
 ?>
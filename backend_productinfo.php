<?php

	ini_set("display_errors", "On");
	require_once "libs/Smarty.class.php";
	$smarty = new Smarty();
	
	session_start();
	if(isset($_SESSION['account']) && $_SESSION['account'] == true){
        $account = $_SESSION['account'];
        $password = $_SESSION['password'];
	}
    else{
        header("Location: login.php");
    }


    const SQL_SHOW="N";
    include ("mysqlilib.php");
    $db = new StockDB('localhost','root','','test');
	$sql = "select * from login where account = '$account' AND password = '$password'";
	$db -> query($sql);
	while ($db -> next_record()){
	    $r = $db ->record;
	    $id = $r['user_id'];
		$user = $r['user'];
	}
    $_SESSION['user_id'] = $id;

    $sql = "select * from product where user_id = '$id' ";
    $db -> query($sql);
    $i = 0;
    while ($db -> next_record()){
        $r = $db ->record;
        $product_array[$i] = $r;
        $_SESSION['product_' . $i] = $product_array[$i] ['product_id'];
        $i++;
    }
    $_SESSION['product_sum'] = $i;

	$smarty->assign("title", "後臺介面");
	$smarty->assign("account", $account);
	$smarty->assign("password", $password);
	$smarty->assign("user", $user);
    $smarty->assign("id",$id);
    $smarty->assign("product_array",$product_array);


	$smarty->display('backend_productinfo.html');
 ?>
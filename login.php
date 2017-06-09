<?php
	ini_set("display_errors", "On");
	require_once "libs/Smarty.class.php";
	$smarty = new Smarty();
	$smarty->assign("title", "登入頁面");


    session_start();
    if(isset($_SESSION['msg'])){
        if($_SESSION['msg'] == "帳號密碼有誤"){
            $msg = $_SESSION['msg'];
            $smarty->assign("msg",$msg);
            unset($_SESSION["msg"]);
        }
    }

    if((isset($_SESSION['account']) && ($_SESSION['account'] != "")) && (isset($_SESSION['password']) && ($_SESSION['password'] != ""))){
        header("Location:backend.php");
    }


	
	
	
	
	
	
	$smarty->display('login.html');
 ?>
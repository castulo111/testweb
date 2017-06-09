<?php
    const SQL_SHOW="N";
    include ("mysqlilib.php");
    $db = new StockDB('localhost','root','','test');
	$account = $_POST['account'];
	$password = $_POST['password'];
	$sql = "select * from login where account = '$account' AND password = '$password'";
	$db -> query($sql);
	while ($db ->next_record()){
        $r = $db->record;
		$account1 = $r['account'];
		$password1 = $r['password'];
	}
	
	
	
	if((isset($account) && ($account != "")) && (isset($password) && ($password != ""))){
		if($account ==  $account1 && $password == $password1){
				session_start();
				$_SESSION['account'] = $account;
				$_SESSION['password'] = $password;
				header("Location:backend.php");
			}else{
                session_start();
                $_SESSION['msg'] = "帳號密碼有誤";
				header("Location:login.php");
			}
	}else{
        session_start();
        $_SESSION['msg'] = "帳號密碼有誤";
		header("Location:login.php");
	}
?>
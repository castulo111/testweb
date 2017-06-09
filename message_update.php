<?php
    $user_id = $_POST['user_id'];
	$user = $_POST['user'];
    $account = $_POST['account'];
    $password = $_POST['password'];

    const SQL_SHOW="N";
    include ("mysqlilib.php");
    $db = new StockDB('localhost','root','','test');
    $sql = "UPDATE login SET user = '$user' , password = '$password' WHERE  user_id = '$user_id'";
    $db -> query($sql);
    mysqli_close($conn);

    session_start();
    $_SESSION['account'] = $account;
    $_SESSION['password'] = $password;

?>
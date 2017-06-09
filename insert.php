<?php
    const SQL_SHOW="N";
    include ("mysqlilib.php");
    $db = new StockDB('localhost','root','','test');


    $a=$_POST['a'];
    session_start();




    if($a != ""){
        $user_id = $_SESSION['user_id'];
        $product_name = $_POST['product_name'];
        $product_content = $_POST['product_content'];

        $sql = "INSERT INTO product(product_name,product_content,user_id) VALUES ('$product_name' , '$product_content' , ' $user_id')";
        $db -> query($sql);

        $sql = "select * from product where product_name = '$product_name' AND product_content = '$product_content'";
        $db -> query($sql);
        while ($db->next_record()){
            $r = $db -> record;
            $product_id = $r['product_id'];
        }

        if($_SESSION['img1'] != ""){
            $img1 = "img/" . $_SESSION['img1'];
            $sql = "UPDATE product SET product_img1 = '$img1' WHERE  product_id = '$product_id'";
            $db -> query($sql);
            unset($_SESSION['img1']);
            if($_SESSION['img2'] != ""){
                $img2 = "img/" . $_SESSION['img2'];
                $sql = "UPDATE product SET product_img2 = '$img2' WHERE  product_id = '$product_id'";
                $db -> query($sql);
                unset($_SESSION['img2']);
            }
        }
    }

    $ds = DIRECTORY_SEPARATOR;
    $storeFolder = 'img';
    if (!empty($_FILES)) {
        $tempFile = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
        $targetFile =  $targetPath. $_FILES['file']['name'];
        move_uploaded_file($tempFile,$targetFile);
        if($_SESSION['img1'] == ""){
            $_SESSION['img1'] = $fileName;
        }elseif($_SESSION['img1'] != "" && $_SESSION['img2'] == ""){
            $_SESSION['img2'] = $fileName;
        }
    }


    mysqli_close($conn);
?>
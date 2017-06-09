<?php
    const SQL_SHOW="N";
    include ("mysqlilib.php");
    $db = new StockDB('localhost','root','','test');
    session_start();

    if($_POST['product_id'] != ""){
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_content = $_POST['product_content'];

        $sql = "UPDATE product SET product_name = '$product_name' , product_content = '$product_content' WHERE  product_id = '$product_id'";
        $db -> query($sql);
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

    if($_POST['product_id2'] != ""){
        $product_id = $_POST['product_id2'];

        $sql = "DELETE FROM product WHERE product_id = '$product_id'";
        $db -> query($sql);
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
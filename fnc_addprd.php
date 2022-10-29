<?php
    $db = mysqli_connect("localhost","root", "", "web_phukien");
    $msg = "";
    if(isset($_POST['upload'])){
        $target = "anh/".basename($_FILES['image']['name']);
    }
    $name = $_POST['name'];
    $originalPrice = $_POST['originalPrice'];
    // $promotionPrice = $_POST['promotionPrice'];
    // $cateId = $_POST['cateId'];
    $des = $_POST['des'];
    $qty = $_POST['qty'];

    $image = $_FILES['image']['name'];

    $sql = "insert into sanpham (name, price, image, qty, description) values ('$name', '$originalPrice', '$image', '$qty', '$des')";
    mysqli_query($db, $sql);
    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        $msg = "Thêm thành công";
        header('Location:add_product.php');
    }else{
        $msg = "Thêm không thành công";
    }
?>
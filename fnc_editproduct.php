<?php
    $db = mysqli_connect("localhost","root", "", "web_phukien");
    $msq ="";
    if(isset($_POST['update_btn']))
    {
        $target = "anh/".basename($_FILES['image']['name']);

        $edit_id = $_POST['edit_id'];
        $edit_name = $_POST['edit_name'];
        $edit_price = $_POST['edit_price'];
        $edit_description = $_POST['edit_des'];
        $edit_qty = $_POST['edit_qty'];
        $edit_image = $_FILES['image']['name'];

        $query= "UPDATE sanpham SET name='$edit_name', price='$edit_price', image='$edit_image', qty='$edit_qty', description='$edit_description' WHERE id='$edit_id'";
        $query_run = mysqli_query($db, $query);

        if($query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            header("Location: trangchu_admin.php");
        }else
            {
                echo "Thất bại";
            }
    }
?>
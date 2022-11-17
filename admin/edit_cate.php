<?php
            $db = mysqli_connect("localhost","root", "", "web_phukien");
            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                $edit_name = $_POST['name'];
                $query= "UPDATE categories SET name='$edit_name'WHERE id= $id";
                $query_run = mysqli_query($db, $query);

                if($query_run)
                {
                    header("Location: ./danhmuc.php");
                }else
                    {
                        echo "Thất bại";
                    }
            }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://use.fontawesome.com/2145adbb48.js"></script>
    <script src="https://kit.fontawesome.com/a42aeb5b72.js" crossorigin="anonymous"></script>
    <title>Chỉnh sửa danh mục</title>
</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">ADMIN</label>
        <ul>
            <li><a href="./trangchu_admin.php">Quản lý Sản phẩm</a></li>
            <li><a href="./danhmuc.php" class="active">Quản lý danh mục</a></li>
            <!-- <li><a href="orderlist.php">Quản lý Đơn hàng</a></li> -->
        </ul>
    </nav>
    <div class="title">
        <h1>Chỉnh sửa danh mục</h1>
    </div>
    <div class="container">
        <div class="form-add">
        <?php
            if(isset($_POST['edit_data_btn']))
                {
                    $db = mysqli_connect("localhost","root", "", "web_phukien");
                    $id = $_POST['edit_id'];
                    $query = "select * from categories where id = '$id' and status = 1";
                    $query_run = mysqli_query($db, $query);
                    foreach($query_run as $row)
                    {
            ?>
                <form action="./edit_cate.php?id=<?= $row['id'] ?>" method="post" enctype="multipart/form-data">
                    <input type="text" hidden name="id" style="display: none;" value="<?=$row['id'] ?>">
                    <label for="name">Tên danh mục</label>
                    <input type="text" id="name" name="name" placeholder="Tên danh mục.." value="<?= $row['name'] ?>">

                    <input type="submit" value="Lưu" name="submit">
                </form>
        <?php 
            } 
                }?>
        </div>
    </div>
    </div>
    
    <footer>
        <p class="copyright">PHỤ KIỆN ONLINE @ 2022</p>
    </footer>
</body>

</html>
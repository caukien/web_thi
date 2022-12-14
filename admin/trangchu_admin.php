<?php
        session_start();
    // session_destroy();
        if(!isset($_SESSION['username'])){
           header('location:login.php');
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://use.fontawesome.com/2145adbb48.js"></script>
    <script src="https://kit.fontawesome.com/a42aeb5b72.js" crossorigin="anonymous"></script>

    <title>Danh sách sản phẩm</title>
</head>

<body>

    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">Trang quản trị</label>
        <ul>
            <li><a href="./header.php" >Hồ sơ</a></li>
            <li><a href="trangchu_admin.php" class="active">Quản lý Sản phẩm</a></li>
            <li><a href="danhmuc.php" >Quản lý danh mục</a></li>
            <li><a href="donhang.php">Quản lý Đơn hàng</a></li>
        </ul>
    </nav>
    <div class="title">
        <h1>Danh sách sản phẩm</h1>
    </div>
    <div class="addNew">
        <a href="add_product.php">Thêm mới</a>
    </div>
    <div class="container">
    <table class="list">
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Mô tả</th>
                    <th>Chức năng</th>
                </tr>
        <?php 
            $db = mysqli_connect("localhost", "root", "", "web_phukien");
            $sql = "select * from sanpham";
            $result = mysqli_query($db, $sql);
            while($row = mysqli_fetch_array($result)){
            ?>
                <tr>
                    <td><?= $row['id'];?></td>
                    <td><?= $row['name'];?></td>
                    <td><?= "<img src='anh/".$row['image']."'>";?></td>
                    <td><?= number_format($row['price'], 0, '', ',') ?> VND</td>
                    <td><?= $row['qty'];?></td>
                    <td><?= $row['description'];?></td>
                    <td>
                        <form action="edit_product.php" method="POST">
                            <input type="hidden" name="edit_id" value="<?= $row['id']?>" >
                            <button type="submit" class="css_btn" name="edit_data_btn"><span>Chỉnh sửa</span></button>
                        </form>
                        <form action="deletecode.php" method="POST">
                            <input type="hidden" name="delete_id" value="<?= $row['id']?>" >
                            <button type="submit" class="css_btn deletebtn" name="delete_data_btn" style="background-color: red;"><span>Xóa</span></button>
                        </form>
                    </td>
                </tr>
                <?php
            }
        ?>
    </div>
    </div>
</body>

</html>
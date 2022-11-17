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
    <link rel="stylesheet" href="./css_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://use.fontawesome.com/2145adbb48.js"></script>
    <script src="https://kit.fontawesome.com/a42aeb5b72.js" crossorigin="anonymous"></script>

    <title>Trang ADMIN</title>
</head>

<body>

    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">Trang quản trị</label>
        <ul>
            <li><a href="./header.php" class="active">Hồ sơ</a></li>
            <li><a href="./trangchu_admin.php">Quản lý Sản phẩm</a></li>
            <li><a href="./danhmuc.php">Quản lý Danh mục</a></li>
            <!-- <li><a href="orderlist.php">Quản lý Đơn hàng</a></li> -->
        </ul>
    </nav>
    <div style="min-height: 100vh;
                background-color: #eee;
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
                padding-bottom: 80px;">
        <div style="width: 700px;">
            <h3>Xin chào!</h3>
            <p style="font-size: 20px;padding:10px 0;"> ADMIN : <span style="color:crimson;"><?php echo $_SESSION['username']; ?></span></p>
            <a href="logout.php" style="display: inline-block;
                                        padding:10px 35px;
                                        font-size: 20px;
                                        margin-top: 10px;
                                        background-color: #000;
                                        color:#fff;" >logout</a>
        </div>
    </div>
</body>

</html>
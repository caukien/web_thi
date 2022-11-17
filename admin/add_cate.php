<?php
    $db = mysqli_connect("localhost", "root", "", "web_phukien");
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $query = "INSERT INTO categories(name) VALUES ('$name')";
        $result = mysqli_query($db, $query);
        if($result){
            header('Loaction: ./add_cate.php');
        }
        else{
            return;
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
    <title>Thêm mới danh mục</title>
</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">ADMIN</label>
        <ul>
            <li><a href="trangchu_admin.php" >Quản lý Sản phẩm</a></li>
            <li><a href="danhmuc.php" class="active" >Quản lý danh mục</a></li>
            <!-- <li><a href="orderlist.php">Quản lý Đơn hàng</a></li> -->
        </ul>
    </nav>
    <div class="title">
        <h1>Thêm mới danh mục</h1>
    </div>
    <div class="container">
        <div class="form-add">
            <form action="./add_cate.php" method="post">
                <label for="name">Tên danh mục</label>
                <input type="text" id="name" name="name" placeholder="Tên danh mục.." required>

                <input type="submit" value="Lưu" name="submit">
            </form>
        </div>
    </div>
    </div>
</body>

</html>
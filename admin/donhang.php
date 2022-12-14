<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/css_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://use.fontawesome.com/2145adbb48.js"></script>
    <script src="https://kit.fontawesome.com/a42aeb5b72.js" crossorigin="anonymous"></script>
    <title>Quản lý đơn đặt hàng</title>
</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">ADMIN</label>
        <ul>
            <li><a href="./header.php" >Hồ sơ</a></li>
            <li><a href="trangchu_admin.php">Quản lý Sản phẩm</a></li>
            <li><a href="danhmuc.php">Quản lý Danh mục</a></li>
            <li><a href="donhang.php" class="active">Quản lý Đơn hàng</a></li>
        </ul>
    </nav>
    <div class="title">
        <h1>Danh sách đơn đặt hàng</h1>
    </div>
    <div class="container">
        <div id="Processing" class="tabcontent">
            <?php
                session_start();
                    if(!isset($_SESSION['username'])){
                       header('location:login.php');
                    }
                //@include '../config.php';
                $conn = mysqli_connect('localhost','root','','web_phukien');
                $query= "SELECT * FROM `order`";
                $row = mysqli_query($conn, $query);
                $count = 1;
                while($value = mysqli_fetch_assoc($row)){
            ?>
                <table class="list">
                    <tr>
                        <th>STT</th>
                        <th>Tên người đặt</th>
                        <th>SĐT</th>
                        <th>Email</th>
                        <th>Phương thức thanh toán</th>
                        <th>Địa chỉ</th>
                        <th>Phường</th>
                        <th>Tổng tiền</th>
                    </tr>
                        <tr>
                            <td><?= $count++ ?></td>
                            <!-- <td><?= $value['id'] ?></td> -->
                            <td><?= $value['name'] ?></td>
                            <td><?= $value['number'] ?></td>
                            <td><?= $value['email'] ?></td>
                            <td><?= $value['method'] ?></td>
                            <td><?= $value['diachi'] ?></td>
                            <td><?= $value['phuong'] ?></td>
                            <td><?= $value['total_price'] ?></td>
                            <td>
                                <!-- <a href="orderlistdetail.php?orderId=<?= $value['id'] ?>">Chi tiết</a> -->
                                <a href="#">Chi tiết</a>
                            </td>
                        </tr>
                </table>
            <?php }
            ?>
        </div>
    </div>
</body>

</html>
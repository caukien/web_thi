<?php
    @include 'config.php';
    if(isset($_POST['update_update_btn'])){
        $update_value = $_POST['update_quantity'];
        $update_id = $_POST['update_qty_id'];
        $update_quantity_query = mysqli_query($conn, "UPDATE cart SET qty = '$update_value' WHERE id = '$update_id'");
        if($update_quantity_query){
           header('location:checkout.php');
        };
     };
     if(isset($_GET['remove'])){
        $remove_id = $_GET['remove'];
        mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
        header('location:checkout.php');
     };
     
    //  if(isset($_GET['delete_all'])){
    //     mysqli_query($conn, "DELETE FROM `cart`");
    //     header('location:cart.php');
    //  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://use.fontawesome.com/2145adbb48.js"></script>
    <script src="https://kit.fontawesome.com/a42aeb5b72.js" crossorigin="anonymous"></script>
    <title>Giỏ hàng</title>
</head>

<body>
    <nav>
        <label class="logo" id="logo">STORENOW</label>
        <ul>
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="danhsach.php">Sản phẩm</a></li>
            <?php
            if (isset($_SESSION['username']) && $_SESSION['username']) { ?>
                <li><a href="logout.php" id="signin">Đăng xuất</a></li>
            <?php } else { ?>
                <li><a href="register_form.php" id="signup">Đăng ký</a></li>
                <li><a href="login_form.php" id="signin">Đăng nhập</a></li>
            <?php } ?>
            <li>
            <?php
                $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
                $row_count = mysqli_num_rows($select_rows);
                ?>
                <a href="checkout.php" class="active">
                    <i class="fa fa-shopping-bag"></i>
                    <span class="sumItem">
                        <?= ($row_count) ? $row_count : "0" ?>
                    </span>
                </a>
            </li>
        </ul>
    </nav>
    <section class="banner"></section>
    <div class="featuredProducts">
        <h1>Giỏ hàng</h1>
    </div>
    <div class="container-single">
        <table class="order">
            <tr>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Thao tác</th>
            </tr>
            <?php
                $select_cart = mysqli_query($conn, "SELECT * FROM cart");
                $grand_total=0;
                $tong=0;
                if(mysqli_num_rows($select_cart) > 0){
                    while($value = mysqli_fetch_assoc($select_cart)){
                        $tong = $value['price'] * $value['qty'];
                        $grand_total += $value['price'] * $value['qty'];
                        ?>
                        <tr>
                            <td><?= $value['name'] ?></td>
                            <td><img class="image-cart" src="admin/anh/<?= $value['image'] ?>" style="height:150px; width:150px"></td>
                            <td><?= number_format($value['price'], 0, '', ',') ?>VND </td>
                            <td>
                                <form action="" method="POST">
                                    <input type="hidden" name="update_qty_id" value="<?=$value['id']?>">
                                    <input type="number" min=1 value="<?= $value['qty'] ?>" name="update_quantity">
                                    <input type="submit" value="cập nhật" name="update_update_btn" style="width:100px;">
                                </form>
                            </td>
                            <td><?= $tong = number_format($tong, 0, '', ',')?>VND</td>
                            <td>
                                <a href="checkout.php?remove=<?= $value['id'] ?>" style="color:red">Xóa</a>
                            </td>
                        </tr>
                <?php };
                }; ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Tổng tiền</td>
                    <td><?= number_format($grand_total, 0, '', ',')?>VND</td>
                    <td>
                        <a href="infor.php" class="" <?= ($grand_total > 1)?'':'disabled'; ?>>Thông tin nhận hàng</a>
                    </td>
                </tr>
        </table>
    </div>
    </div>
    <footer>
        <div class="social">
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </div>
        <ul class="list">
            <li>
                <a href="./">Trang Chủ</a>
            </li>
            <li>
                <a href="danhsach.php">Sản Phẩm</a>
            </li>
        </ul>
        <p class="copyright">PHỤ KIỆN ONLINE @ 2022</p>
    </footer>
</body>
</html>
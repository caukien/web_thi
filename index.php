<?php
// session_destroy();
@include 'config.php';
    if(isset($_POST['add_to_cart'])){
        $product_name = $_POST['name'];
        $product_price = $_POST['price'];
        $product_img = $_POST['image'];
        $product_qty = 1;
        $query = mysqli_query($conn, "SELECT * FROM cart WHERE name='$product_name' ");
        if(mysqli_num_rows($query) > 0){
            echo"Đã có trong giỏ";
        }else{
            $insert = mysqli_query($conn, "INSERT INTO cart(name, price, image, qty) VALUES('$product_name', '$product_price', '$product_img', '$product_qty') ");
            echo"Da them san pham";
        }
    }

//session_start();

// if(!isset($_SESSION['username'])){
//    header('location:login_form.php');
// }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://use.fontawesome.com/2145adbb48.js"></script>
    <script src="https://kit.fontawesome.com/a42aeb5b72.js" crossorigin="anonymous"></script>
    <title>Trang chủ</title>
</head>

<body>
    <nav>
        <label class="logo">PHỤ KIỆN KIENADMIN</label>
        <ul>
            <li><a href="index.php" class="active">Trang chủ</a></li>
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
                <a href="checkout.php">
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
        <h1>Sản phẩm nổi bật</h1>
    </div>
    <div class="container">
        <?php
            // $db = mysqli_connect("localhost", "root", "", "web_phukien");
            $sql = "select * from sanpham order by rand() limit 0,9";
            $result = mysqli_query($conn, $sql);
            while($value = mysqli_fetch_array($result))
            {
                ?>
                <form action="" method="POST">
                    <div class="card">
                        <div class="imgBx">
                            <a href="chitiet.php?id=<?= $value['id'] ?>"><img src="admin/anh/<?= $value['image'] ?>" alt=""></a>
                            <input type="hidden" value="<?= $value['image'];?>" name="image">
                        </div>
                        <div class="content">
                            <div class="productName">
                                <a href="detail.php?id=<?= $value['id'] ?>">
                                    <h3><?= $value['name']?></h3>
                                    <input type="hidden" value="<?= $value['name'];?>" name="name">
                                </a>
                            </div>
                            <div class="price">
                                Giá bán: <?= number_format($value['price'], 0, '', ',') ?>VND
                                <input type="hidden" value="<?=$value['price'];?>" name="price">
                            </div>
                            <div class="action">
                                <!-- <a class="add-cart" href="add_cart.php?id=<?= $value['id'] ?>" name="add-to-cart">Thêm vào giỏ</a> -->
                                <input type="submit" name="add_to_cart" class="add-cart" value="Thêm vào giỏ" style="height:40px; margin-top:0; align-items:center;font-family:Mitr;padding-top:5px;">
                                <a class="detail" href="chitiet.php?id=<?= $value['id'] ?>">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                </form>
            <?php
            }
        ?>

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
                <a href="productList.php">Sản Phẩm</a>
            </li>
        </ul>
        <p class="copyright">KIENADMIN @ 2022</p>
    </footer>
</body>
</html>
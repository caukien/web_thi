<?php

@include 'config.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['qty'] .') ';
         $product_price = $product_item['price'] * $product_item['qty'];
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `order`(name, number, email, method, diachi, phuong, thanhpho, total_products, total_price) VALUES('$name','$number','$email','$method','$flat','$street','$city','$total_product','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>Cảm ơn bạn đã đặt mua!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> Tổng : ".$price_total."VND  </span>
         </div>
         <div class='customer-details'>
            <p> Họ tên : <span>".$name."</span> </p>
            <p> SĐT : <span>".$number."</span> </p>
            <p> email : <span>".$email."</span> </p>
            <p> Địa chỉ nhân hàng : <span>".$flat.", ".$street.", ".$city."</span> </p>
            <p> phương thức thanh toán : <span>".$method."</span> </p>
            <p>(*Thanh toán khi nhận hàng*)</p>
         </div>
            <a href='index.php' class='btn'>Tiếp tục mua</a>
         </div>
      </div>
      ";
   }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/css_infor.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://use.fontawesome.com/2145adbb48.js"></script>
    <script src="https://kit.fontawesome.com/a42aeb5b72.js" crossorigin="anonymous"></script>
    <title>Thông tin nhận hàng</title>
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
        <h1>Thông tin nhận hàng</h1>
    </div>
    <section class="checkout-form">

   <h1 class="heading">Hoàn thành đơn hàng của bạn</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
      @include'config.php';
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = $fetch_cart['price'] * $fetch_cart['qty'];
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['name']; ?>-SL(<?= $fetch_cart['qty']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> Tổng tiền :<?= $grand_total =number_format($grand_total, 0, '', ','); ?>VND </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>Họ và tên</span>
            <input type="text" placeholder="Họ tên" name="name" required>
         </div>
         <div class="inputBox">
            <span>Số điện thoại</span>
            <input type="number" placeholder="Số điện thoại" name="number" required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="Nhập email của bạn" name="email" required>
         </div>
         <div class="inputBox">
            <span>Phương thức thanh toán</span>
            <select name="method">
               <option value="cash on delivery" selected>Thanh toán khi nhận hàng</option>
               <option value="credit cart">Thanh toán qua thẻ</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Địa chỉ nhận</span>
            <input type="text" placeholder="Vd: số nhà" name="flat" required>
         </div>
         <div class="inputBox">
            <span>Xã-Phường</span>
            <input type="text" placeholder="Tên xã hoặc phường" name="street" required>
         </div>
         <div class="inputBox">
            <span>Tỉnh-TP</span>
            <input type="text" placeholder="Tên tỉnh hoặc thành phố" name="city" required>
         </div>
      </div>
      <input type="submit" value="Đặt hàng ngay" name="order_btn" class="btn">
   </form>

</section>

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
        <p class="copyright">STORENOW @ 2021</p>
    </footer>
</body>
</html>
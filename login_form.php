<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
    $username = $_POST['username'];
   // $email = mysqli_real_escape_string($conn, $_POST['usermail']);
   $pass = $_POST['password'];

   $select = " SELECT * FROM user WHERE username = '$username' && password = '$pass'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $_SESSION['username'] = $username;
      header('location:index.php');
   }else{
      $error[] = 'Tài khoản hoặc mật khẩu không đúng.';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style_login.css">
    <title>Đăng nhập</title>
</head>
<body>
    
<div class="form-container" style="background: linear-gradient(-45deg, #00483D, #f5d020);">

    <form action="" method="post" style="border-radius:30px; background-color: rgba(255,255,255,0.13); backdrop-filter:blur(10px); box-shadow: -16px 0 44px 13px rgba(0,0,0,0.1); border:none">
        <h3 class="title">Đăng nhập</h3>
        <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }
         }
      ?>
        <input type="" name="username" placeholder="Tên đăng nhập" class="box" required style="border: none; border-radius:20px">
        <input type="password" name="password" placeholder="Mật khẩu" class="box" required style="border: none; border-radius:20px">
        <input type="submit" value="Đăng nhập" class="form-btn" name="submit" style="border-radius:50px; background-color:#00483D;">
        <p>Bạn chưa có tài khoản? <a href="register_form.php">Đăng ký ngay!</a></p>
    </form>

</div>

</body>
</html>
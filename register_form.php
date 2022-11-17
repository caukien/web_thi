<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
   $username = $_POST['username'];
   $email = mysqli_real_escape_string($conn, $_POST['usermail']);
   $pass = $_POST['password'];
   $cpass = $_POST['cpassword'];

   $select = " SELECT * FROM user WHERE username = '$pass' &&  password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'Người dùng đã tồn tại';
   }else{
      if($pass != $cpass){
         $error[] = 'Mật khẩu không đúng!';
      }else{
         $insert = "INSERT INTO user(username, email, password) VALUES('$username', '$email','$pass')";
         mysqli_query($conn, $insert);
         header('location:index.php');
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style_login.css">
   <title>Đăng ký</title>
</head>
<body>
    
<div class="form-container" style="background: linear-gradient(-45deg, #00483D, #f5d020); ">

   <form action="" method="post" style="border-radius:30px; background:inherit; box-shadow: -16px 0 44px 13px rgba(0,0,0,0.1);border:none;">
      <h3 class="title">Đăng ký ngay</h3>
      <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }
         }
      ?>
      <input name="username" placeholder="Tên đăng nhập" class="box" required style="border: none; border-radius:20px">
      <input type="email" name="usermail" placeholder="Nhập email" class="box" required style="border: none; border-radius:20px">
      <input type="password" name="password" placeholder="Nhập password" class="box" required style="border: none; border-radius:20px">
      <input type="password" name="cpassword" placeholder="Nhập lại mật khẩu" class="box" required style="border: none; border-radius:20px">
      <input type="submit" value="Đăng ký" class="form-btn" name="submit" style="border-radius:50px; background-color:#00483D;">
      <p>Bạn đã có tài khoản? <a href="login_form.php">Đăng nhập ngay!</a></p>
   </form>

</div>

</body>
</html>
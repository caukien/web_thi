<?php
  @include '../config.php';

  session_start();

  if(isset($_POST['dangnhap'])){
      $username = $_POST['username'];
    // $email = mysqli_real_escape_string($conn, $_POST['usermail']);
    $pass = $_POST['password'];

    $select = " SELECT * FROM member WHERE username = '$username' && password = '$pass'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $_SESSION['username'] = $username;
        header('Location:header.php');
    }else{
        $error[] = 'Tài khoản hoặc mật khẩu không đúng.';
    }

  }
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form action ="" method="POST">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="Tên đăng nhập">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="Mật khẩu">
      <input type="submit" class="fadeIn fourth" value="Log In" name="dangnhap">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
</body>
</html>


<!------ Include the above in your HEAD tag ---------->


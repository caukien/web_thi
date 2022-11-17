<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['username'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    
<div class="container">
   <div class="content">
      <h3>Ohh yeah!</h3>
      <p>Chao xìn : <span><?php echo $_SESSION['username']; ?></span></p>
      <a href="logout.php" class="logout">Đăng xuất khỏi sever</a>
   </div>
</div>

</body>
</html>
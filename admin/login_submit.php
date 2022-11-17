<?php
  $u = $_POST['username'];
  $p = $_POST['password'];
  $conn = mysqli_connect("localhost", "root", "", "web_phukien");
    //kiem tra ket noi
    $sql = "select * from member where username= '$u' and password='$p'";

    $rs = mysqli_query($conn, $sql);

    if(mysqli_num_rows($rs) > 0){
      header("Location: trangchu_admin.php");
    }else{
      echo "That bai";
      // require_once 'login.html';
    }
?>
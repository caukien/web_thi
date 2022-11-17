<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'web_phukien');

if(isset($_POST['delete_data_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM sanpham WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Da xoa"); </script>';
        header("Location:trangchu_admin.php");
    }
    else
    {
        echo '<script> alert("That bai"); </script>';
    }
}

?>
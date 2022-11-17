<?php
$connection = mysqli_connect("localhost","root","", "web_phukien");
if(isset($_POST['delete_data_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM categories WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Da xoa"); </script>';
        header("Location:./danhmuc.php");
    }
    else
    {
        echo '<script> alert("That bai"); </script>';
    }
}

?>
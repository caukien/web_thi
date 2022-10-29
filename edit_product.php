
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://use.fontawesome.com/2145adbb48.js"></script>
    <script src="https://kit.fontawesome.com/a42aeb5b72.js" crossorigin="anonymous"></script>
    <title>Chỉnh sửa sản phẩm</title>
</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">ADMIN</label>
        <ul>
            <li><a href="trangchu_admin.php" class="active">Quản lý Sản phẩm</a></li>
            <!-- <li><a href="categoriesList.php">Quản lý Danh mục</a></li>
            <li><a href="orderlist.php">Quản lý Đơn hàng</a></li> -->
        </ul>
    </nav>
    <div class="title">
        <h1>Chỉnh sửa sản phẩm</h1>
    </div>
    <div class="container">
        <div class="form-add">
            <?php
                $db = mysqli_connect("localhost","root", "", "web_phukien");
                if(isset($_POST['edit_data_btn']))
                {
                    $id = $_POST['edit_id'];
                    $query = "select * from sanpham where id = '$id' ";
                    $query_run = mysqli_query($db, $query);
                    foreach($query_run as $row)
                    {
            ?>

                <form action="fnc_editproduct.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="edit_id" value= "<?= $row['id']?>" >
                <label for="name">Tên sản phẩm</label>
                <input type="text" id="name" name="edit_name" placeholder="Tên sản phẩm.." value="<?= $row['name'] ?>">

                <label for="originalPrice">Giá gốc</label>
                <input type="number" id="originalPrice" name="edit_price" value="<?= $row['price'] ?>">

                <!-- <label for="image">Hình ảnh</label>
                <img src="anh/<?= $row['image'] ?>" style="height: 200px;" id="image" name="image"> <br> -->

                <label for="imageNew">Chọn hình ảnh mới</label>
                <input type="file" id="imageNew" name="image" value="<?= $row['image']?>" >

                <!-- <label for="cateId">Loại sản phẩm</label>
                <select id="cateId" name="cateId">
                    <?php foreach ($categoriesList as $key => $value) {
                        if ($value['id'] == $productUpdate['cateId']) { ?>
                            <option selected value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                        <?php  } else { ?>
                            <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                        <?php   } ?>
                    <?php } ?>
                </select> -->

                <label for="qty">Số lượng</label>
                <input type="number" id="qty" name="edit_qty" value="<?= $row['qty'] ?>">

                <label for="des">Mô tả</label>
                <textarea name="edit_des" id="des" cols="30" rows="10"><?= $row['description'] ?></textarea>

                <input type="submit" value="Cập nhật" name="update_btn">
            </form>

            <?php
                    }
                }
            ?>
        </div>
    </div>
    </div>
</body>

</html>
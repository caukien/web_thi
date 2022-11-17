<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://use.fontawesome.com/2145adbb48.js"></script>
    <script src="https://kit.fontawesome.com/a42aeb5b72.js" crossorigin="anonymous"></script>
    <title>Danh sách danh mục</title>
</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">ADMIN</label>
        <ul>
            <li><a href="trangchu_admin.php" >Quản lý Sản phẩm</a></li>
            <li><a href="categoriesList.php" class="active">Quản lý danh mục</a></li>
            <!-- <li><a href="orderlist.php" id="order">Quản lý Đơn hàng</a></li> -->
        </ul>
    </nav>
    <div class="title">
        <h1>Danh sách danh mục</h1>
    </div>
    <div class="addNew">
        <a href="add_cate.php">Thêm mới</a>
    </div>
    <div class="container">
        <table class="list">
                <tr>
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    <th>Thao tác</th>
                </tr>
                <?php
                    $db = mysqli_connect("localhost", "root", "", "web_phukien");
                    $sql = "select * from categories";
                    $result = mysqli_query($db, $sql);
                    while($value = mysqli_fetch_array($result))
                    {
                      ?>  
                    <tr>
                        <td><?= $value['id']; ?></td>
                        <td><?= $value['name'] ?></td>
                        <td>
                        <form action="./edit_cate.php" method="POST">
                            <input type="hidden" name="edit_id" value="<?= $value['id']?>" >
                            <button type="submit" class="css_btn" name="edit_data_btn"><span>Chỉnh sửa</span></button>
                        </form>
                        <form action="./delete_cate.php" method="POST">
                            <input type="hidden" name="delete_id" value="<?= $value['id']?>" >
                            <button type="submit" class="css_btn deletebtn" name="delete_data_btn" style="background-color: red;"><span>Xóa</span></button>
                        </form>
                    </td>
                    </tr>
                    <?php } ?>
            </table>
    </div>
    </div>
</body>

</html>
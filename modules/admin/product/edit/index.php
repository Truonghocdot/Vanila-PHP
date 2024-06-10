<?php
    include 'C:/xampp/htdocs/pdo_full/config.php';
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $id = $_GET['id'];
        try{
            $sql = 'SELECT * FROM products WHERE id = ?';
            $stmt = $conn->prepare($sql) ;
            $success = $stmt->execute([$id]) ;
            if($success){
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                if($data){
                    $thumbnail = $data['thumbnail'];
                    $title = $data['title'];
                    $cat = $data['cat'];
                    $quantity = $data['quantity'];
                    $description = $data['description'];
                    $price = $data['price'];
                }else{
                    echo 'Sản phẩm không tồn tại!';
                }
            }else{
                echo 'có lỗi khi truy vấn!';
            }
        }catch(PDOException $e){
            echo ('Có lỗi khi truy vấn: ' . $e->getMessage());
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <?php include '/xampp/htdocs/pdo_full/layouts/partials/head.php' ?>
    <style>
        .list-group{
            border-right: 1px solid #ccc;
            }
        .nav-link{
            color: #000;
            text-decoration: none;
        }
        .row{
            width: 100vw;
        }
    </style>
<body>
    <div class="row">
        <div class="col-lg-3">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="">
                        <img src="/pdo_full/assets/icons/logo.svg" alt="">
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="http://localhost/pdo_full/modules/admin?pagination=products" class="nav-link">
                        Quản lý sản phẩm
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="http://localhost/pdo_full/modules/admin?pagination=user" class="nav-link">
                        Quản lý người dùng
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="http://localhost/pdo_full/modules/admin?pagination=orders" class="nav-link">
                        Quản lý đơn hàng
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="" class="nav-link">
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-lg-6">
            <form method="post" name="create" action="/pdo_full/modules/admin/product/edit/edit.php?id=<?php echo $id ?>" enctype="multipart/form-data" >
                <h2 class="mt-5">Cập nhật sản phẩm</h2>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="title" id="exampleInputEmail1" value="<?php echo $title ?>" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Giá sản phẩm</label>
                    <input type="number" class="form-control" value="<?php echo $price ?>" name="price" id="exampleInputPassword1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Miêu tả sản phẩm</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" value="<?php echo $title ?>" name="description" rows="3" required></textarea>
                </div>
                <select class="form-select form-select-lg mb-3" name="cat" aria-label=".form-select-lg example" required>
                    <option selected>Danh mục</option>
                    <option value="kids">Trẻ con</option>"
                    <option value="men">Nam</option>"
                    <option value="women">Nữ</option>"
                    <option value="infant">Trẻ sơ sinh</option>"
                </select>
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Hình ảnh sản phẩm</label>
                    <input class="form-control" value="<?php echo $thumbnail ?>" name="thumbnail" type="file" required id="formFileMultiple" multiple>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Số lượng sản phẩm</label>
                    <input type="number" value="<?php echo $quantity ?>" class="form-control" name="quantity" required id="exampleInputPassword1">
                </div>
                <div class="d-flex w-50 justify-content-between">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="http://localhost/pdo_full/modules/admin?pagination=products" class="btn btn-danger">Hủy</a>
                </div>
            </form>
        </div>
        <div class="col-lg-3">
        </div>
    </div>
</body>
</html>
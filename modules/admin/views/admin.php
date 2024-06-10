<!DOCTYPE html>
<html lang="en">
<?php
    include 'C:/xampp/htdocs/pdo_full/layouts/partials/head.php';
?>
<style>
    .list-group{
        border-right: 1px solid #ccc;
    }
    .nav-link{
        color: #000;
        text-decoration: none;
    }
</style>
<body>
    <div class="container-fluid">
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
                <h2><?php
                    if($pagination == ''|| $pagination == 'products'){
                        echo 'Quản lý sản phẩm';    
                    }else if($pagination == 'user'){
                        echo 'Quản lý người dùng';    
                    }
                ?> </h2>
                <table class="table">
                    <thead>
                        <tr>
                        <?php
                            if($pagination == ''||$pagination == 'products'){
                                echo '
                                <th scope="col">#</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Miêu tả sản phẩm</th>
                                <th scope="col">Số lượng sản phẩm</th>
                                <th scope="col">Giá sản phẩm</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Ảnh sản phẩm</th>
                                <th scope="col">Action</th>'
                                ;
                            }else if($pagination == 'user'){
                                echo '
                                <th scope="col">#</th>
                                <th scope="col">Tên tài khoản</th>
                                <th scope="col">Email</th>
                                <th scope="col">Avatar</th>
                                ';
                            }
                        ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($pagination == ''||$pagination == 'products'){
                                foreach($data as $product){
                                    echo "<tr>
                                    <th scope='row'>{$product['id']}</th>
                                        <td>{$product['title']}</td>
                                        <td>{$product['description']}</td>
                                        <td>{$product['quantity']}</td>
                                        <td>{$product['price']}</td>
                                        <td>{$product['cat']}</td>
                                        <td><img width='160' src='/pdo_full/assets/images/products/{$product['cat']}/{$product['thumbnail']}' alt='ảnh'></td>
                                        <td>
                                            <a href='/pdo_full/modules/admin/product/edit?id={$product['id']}' class='my-3 btn btn-primary'>Sửa</a>
                                            <a href='' class='btn btn-danger'>Xóa</a>
                                        </td>
                                    </tr>";
                                }
                            }else if($pagination == 'user'){
                                foreach($data as $product){
                                    echo "<tr>
                                    <th scope='row'>{$product['id']}</th>
                                        <td>{$product['username']}</td>
                                        <td>{$product['email']}</td>
                                        <td>
                                            <img width='40' src='/pdo_full/assets/images/{$product['avatar']}' alt=''>
                                        </td>
                                    </tr>";
                                }
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
            <div class="col-lg-3">
                <?php 
                    $form_create = $pagination == 'products' || $pagination == '' ? '
                    <form method="post" name="create" action="/pdo_full/modules/admin/product/upload/index.php" enctype="multipart/form-data" >
                    <h2 class="mt-5">Thêm mới sản phẩm</h2>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Giá sản phẩm</label>
                        <input type="number" class="form-control" name="price" id="exampleInputPassword1" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Miêu tả sản phẩm</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" required></textarea>
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
                        <input class="form-control" name="thumbnail" type="file" required id="formFileMultiple" multiple>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Số lượng sản phẩm</label>
                        <input type="number" class="form-control" name="quantity" required id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </form>
                            
                    ' : '';
                    echo $form_create;        
                ?>
                
            </div>
        </div>
    </div>
</body>
</html>
<?php 
    include './template.php';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'C:/xampp/htdocs/pdo_full/layouts/partials/head.php' ?>
    <style>
        .form-login{
            border: 1px solid #ccc;
            padding: 24px;
        }
        .container {
            position: relative;
        }
        .container .break-line{
            height: 1px;
            left: -300px;
            background-color: #ccc;
            position: absolute;
            width: calc(99vw - 2px);
        }
        .btn-register{
            border: 1px solid #ccc;
            background-color: #000;
            color: #ccc;
        }
        .btn-register:hover{
            background-color: #fff;
            color: #000;
            transition: all 0.3s;
        }
    </style>
<body>
    <div class="container">
        <?php include 'C:/xampp/htdocs/pdo_full/layouts/header.php'?>
        <div class="break-line "></div>
        <div class="form-login my-5">
            <div class="row">
                <div class="col-lg-6">
                    <form method="post">
                        <h2 class="text-uppercase fw-bold">Đăng nhập</h2>
                        <p>Đăng nhập bằng email và mật khẩu của bạn</p>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label text-uppercase fw-bold">địa chỉ email</label>
                            <input name="user-name" type="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label text-uppercase fw-bold ">mật khẩu</label>
                            <input name="password" type="password" required class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3 ">
                            <input onclick="togglePasswordVisibility()" type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Hiển thị mật khẩu</label>
                        </div>
                        <?php if($errMessage){
                            echo "
                                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    $errMessage
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>
                            ";
                        } ?>
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    </form>
                </div>
                <div class="col-lg-6">
                    <h2 class="text-uppercase">TẠO MỘT TÀI KHOẢN</h2>
                    <p>Hãy tạo tài khoản ngay ! Bạn có thể nhận được các dịch vụ đặc biệt cho riêng bạn như kiểm tra lịch sử mua hàng và nhận phiếu giảm giá cho thành viên. Đăng ký miễn phí ngay hôm nay!</p>
                    <a href="/pdo_full/modules/authenticator/register/" class="btn-register btn text-uppercase">tạo tài khoản</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        var password = document.getElementById('exampleInputPassword1');
        var togglePasswordVisibility = () => {
            if(password.type === 'password'){
                password.type = 'text';
            }else{
                password.type = 'password';
            }
        }
    </script>
</body>
</html>
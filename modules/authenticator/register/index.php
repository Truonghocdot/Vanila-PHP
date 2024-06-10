<?php 
    include './template.php'
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
                        <h2 class="text-uppercase fw-bold">tạo một tài khoản</h2>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label text-uppercase fw-bold">tên tài khoản</label>
                            <input name="username" type="text" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label text-uppercase fw-bold">địa chỉ email</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label text-uppercase fw-bold ">mật khẩu</label>
                            <input name="password" type="password" class="form-control" required id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label text-uppercase fw-bold ">xác nhận mật khẩu</label>
                            <input name="password-verify" type="password" class="form-control" required id="exampleInputPassword2">
                        </div>
                        <?php if($errMessage){
                            echo "
                                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    $errMessage
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>
                            ";
                        } ?>
                        <button type="submit" class="btn btn-dark">Đăng ký</button>
                        <p>Bạn đã có tài khoản rồi? <a href="/pdo_full/modules/authenticator/login/">Đăng nhập</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>